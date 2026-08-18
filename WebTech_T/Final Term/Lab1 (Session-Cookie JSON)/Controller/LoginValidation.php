<?php
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
            $users=[];
            if(file_exists($jsonfile))
                {
                    $jsonData=file_get_contents($jsonfile);
                    if($jsonData === false)
                        {
                            $message="Could not read ".$jsonfile;
                            $valid=false;
                        }
                    elseif(trim($jsonData) !== "")
                        {
                            $users=json_decode($jsonData, true);
                            if(!is_array($users))
                                {
                                    $message="Could not read ".$jsonfile.": ".json_last_error_msg();
                                    $valid=false;
                                    $users=[];
                                }
                        }
                }
            if($valid)
                {
                    $users[]=[
                        'username'=> $name,
                        'password'=> password_hash($password, PASSWORD_DEFAULT),
                        'timestamp'=> time()
                    ];
                    $encoded=json_encode($users, JSON_PRETTY_PRINT);
                    if($encoded === false)
                        {
                            $message="Could not encode the user list: ".json_last_error_msg();
                            $valid=false;
                        }
                    elseif(file_put_contents($jsonfile, $encoded, LOCK_EX) === false)
                        {
                            $message="Could not write ".$jsonfile;
                            $valid=false;
                        }
                }



            }
        
    }
?>