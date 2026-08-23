<?php
$name="";
$password="";
$validpassword="";

if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $name=trim($_POST["name"] ?? "");
        $password=trim($_POST["password"] ?? "");
        if(!empty($name) && strlen($name)>=5)
            {
               // echo "User Name".$name;
            }
        else{
            echo "User Name Must be at least 5 char";
        }
        if(!empty($password) && strlen($password) >=5 )
            {
               // echo "Password: ".$password;
            }
        else{
            echo "Password must be 5 char";
        }

    }




?>