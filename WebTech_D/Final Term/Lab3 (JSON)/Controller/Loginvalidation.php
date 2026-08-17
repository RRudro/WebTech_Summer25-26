<?php
session_start();

$name="";
$password="";
$message="";
$remember=false;
if(isset($_COOKIE["remember_user"]))
    {
        $name = $_COOKIE["remember_user"];
        $remember = true;
    }

$valid=true;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = trim($_POST["name"] ?? "");
    $password = trim($_POST["password"] ?? "");
    $remember = isset($_POST["remember"]) && $_POST["remember"] === "1";
    if(empty($name) || strlen($name)<5){
        $message="User Name Must be at least 5 Char";
        $valid=false;
    }

    if(empty($password) || strlen($password)<5){
        $message="Password Must be at least 5 Char";
        $valid=false;
    }
    
    if($valid)
        {
            session_regenerate_id(true);
            $_SESSION["logged_in"] = true;
            $_SESSION["username"] = $name;
            $message= "Session Created";
            if($remember)
                {
                    setcookie("remember_user", $name, ["expires" => time()+ 86400*30, "path" => "/", "httponly" => true, "samesite" => "Lax", "secure" => !empty($_SERVER["HTTPS"])]);
                }
                else{
                    setcookie("remember_user", "", ["expires" => time()-3600, "path" => "/", "httponly" => true, "samesite" => "Lax", "secure" => !empty($_SERVER["HTTPS"])]);
                }
        $jsonfile="../Model/user.json";
        $users =[];
        if(file_exists($jsonfile)){
            $jsonData= file_get_contents($jsonfile);
            $users=json_decode($jsonData, true) ?? [];
           
            $users []=[
                'username' => $name,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'timestamp' => time()
            ];
        file_put_contents($jsonfile, json_encode($users, JSON_PRETTY_PRINT));
        }
        }

}

?>