<?php
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
                $_SESSION["logged_in"]=true;
                $_SESSION["username"]=$name;
                $message="Log In Successful! Session Created";

                if($remember){
                    setcookie("remember_user", $name, time() + 60*60*24*7, "/");
                }
                else{
                    setcookie("remember_user", "", time() - 3600, "/");
                }
            }


    }

?>