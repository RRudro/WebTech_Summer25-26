<?php
$name="";
$password="";

if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $name=trim($_POST["name"] ?? "");
        $password=trim($_POST["password"] ?? "");
        if(!empty($name) && strlen($name)>=5)
            {
                echo "User Name: ".$name;
                echo "<br>";
            }
            else{
                echo "User Name Must be at least 5 Charectar";
            }
        if(!empty($password) && strlen($password)>=5)
            {
                echo "Password: ".$password;
                echo "<br>";
            }
            else{
               echo "Password Must be at least 5 Charectar";
            }
    }




?>