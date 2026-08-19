<?php
include "../Model/db.php";
session_start();
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
        $name = trim($_POST["username"]?? "");
        $password = trim($_POST["password"]?? "");
        $remember = isset($_POST["rememberuser"]) && $_POST["rememberuser"] ==="1";
        if(empty($name) || strlen($name)<5)
            {
                $message="User Name Must be at least 5 Char";
                $valid=false;
            }
        if(empty($password) || strlen($password)<5)
            {
                $message="Password must be 5 char";
                $valid=false;
            }
        if($valid)
            {
                $_SESSION["logged_In"] = true;
                $_SESSION["username"] = $name;
                $message="Log In Successful! Session Created";

                if($remember)
                    {
                        setcookie("remember_user", $name, time()+86400*30, "/");
                    }
                    else{
                        setcookie("remember_user", "", time()-3600, "/");
                    }
            $jsonfile="../Model/user.json";
            $users =[];
            if(file_exists($jsonfile))
                {
                    $jsonData=file_get_contents($jsonfile);
                    $users=json_decode($jsonData, true) ?? [];
                    $users[]=[
                        'username'=> $name,
                        'password'=> password_hash($password, PASSWORD_DEFAULT),
                        'timestamp'=> time()
                    ];
                file_put_contents($jsonfile, json_encode($users, JSON_PRETTY_PRINT));
                }

            $database = new db();
            $connection = $database->connection();
            $result=$database->signin($connection, "users", $name, $password);
            if($result!==false && $result->num_rows ==1)
                {
                    Header("Location:../View/Dashboard.php");
                }



            }
        
    }
?>