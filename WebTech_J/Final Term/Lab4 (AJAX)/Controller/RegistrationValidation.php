<?php
include "../Model/db.php";
session_start();
$name="";
$password="";
$message="";
$remember=false;

if(isset($_COOKIE["remember_user"])){
    $name=$_COOKIE["remember_user"];
}
if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $name=trim($_POST["name"] ?? "");
        $password=trim($_POST["password"] ?? "");
        $file=$_FILES["file"] ?? [];
        $remember=isset($_POST["remember"]) && $_POST["remember"] == "1";
        
        $valid=true;
        if(empty($name) || strlen($name)<5){
            $message .= "User Name Must be Valid (atleast 5 char)";
            $valid=false;
        }
        if(empty($password) || strlen($password)<5){
            $message .= "Password Must be Valid (atleast 5 char)";
            $valid=false;
        }
        if($valid)
            {
                $_SESSION["logged_in"]=true;
                $_SESSION["username"]=$name;
                $message="Log In Successful! Session Created";

            if($remember){
                    setcookie("remember_user", $name, time() + 60*60*24*7, "/");
            }
            else{
                    setcookie("remember_user", "", time() - 3600, "/");
            }
        
        $jsonfile="../Model/user.json";
        $users=[];
        if(file_exists($jsonfile)){
            $jsonData=file_get_contents($jsonfile);
            $users = json_decode($jsonData, true) ?? [];
            $users []=[
                'username' =>$name,
                'password' =>password_hash($password, PASSWORD_DEFAULT),
                'timestamp' => time()
            ];
        file_put_contents($jsonfile, json_encode($users, JSON_PRETTY_PRINT));
        }
        
        $path="";
        if($file)
            {
                $uploaddirectory="../Uploads/";
                $path=$uploaddirectory.basename($file["name"]);
                move_uploaded_file($file["tmp_name"], $path);
            }

        }
        $database= new db();
        $connection=$database->connection();
        $result= $database->signup($connection,"users", $name, $password, $path);
        if($result)
            {
                Header("Location:../View/login.php");
            }
            else{
                echo "Please try again";
            }

}
?>