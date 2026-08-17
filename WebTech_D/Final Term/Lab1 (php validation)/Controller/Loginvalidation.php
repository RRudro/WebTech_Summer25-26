<?php
$name="";
$password="";

if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $name=trim($_POST["name"] ?? "");
        $password=trim($_POST["password"] ?? "");
        if(!empty($name) && strlen($name)>=5)
            {
                echo "User Name: ".htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
                echo "<br>";
            }
            else{
                echo "User Name Must be at least 5 Charectar";
            }
        if(!empty($password) && strlen($password)>=5)
            {
                echo "Password accepted";
                echo "<br>";
            }
            else{
               echo "Password Must be at least 5 Charectar";
            }
    }




?>