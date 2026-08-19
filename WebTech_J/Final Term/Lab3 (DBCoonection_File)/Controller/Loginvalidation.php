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
        $database=new db();
        $connection=$database->connection();
        $result=$database->signin($connection, "users", $name, $password);
        if($result === true)
            {
                session_regenerate_id(true);
                $_SESSION["logged_in"]=true;
                $_SESSION["username"]=$name;
                $message="Log In Successful! Session Created";

            if($remember){
                    setcookie("remember_user", $name, ["expires" => time() + 60*60*24*7, "path" => "/", "httponly" => true, "samesite" => "Lax", "secure" => !empty($_SERVER["HTTPS"])]);
            }
            else{
                    setcookie("remember_user", "", ["expires" => time() - 3600, "path" => "/", "httponly" => true, "samesite" => "Lax", "secure" => !empty($_SERVER["HTTPS"])]);
            }

                Header("Location:../View/Dashboard.php");
            }
            else{
                $message="Invalid User Name or Password";
            }
            
        }
}
?>