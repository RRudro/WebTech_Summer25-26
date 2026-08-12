<?php
$name="";
$password="";
$message="";
$remember=false;
if(isset($_COOKIE["remember_user"]))
    {
        $name = $_COOKIE["remember_user"];
        $remember=true;
    }
$valid=true;
if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $name = trim($_POST["name"]?? "");
        $password = trim($_POST["password"]?? "");
        $remember = isset($_POST["rememberuser"]) && $_POST["rememberuser"] ==="1";
        if(empty($name) || strlen($name)<=5)
            {
                $message="User Name Must be at least 5 Char";
                $valid=false;
            }
        if(empty($password) || strlen($password)<=5)
            {
                $message="Password must be 5 char";
                $valid=false;
            }
        if($valid)
            {
                $_SESSION["logged_In"] = true;
                $_SESSION["username"] = $name;
                if($remember)
                    {
                        setcookie("remember_user", $name, time()+86400*30, "/");
                    }
                    else{
                        setcookie("remember_user", "", time()-3600);
                    }
            }
        
    }
?>