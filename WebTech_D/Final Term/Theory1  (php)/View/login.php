<?php
echo "<h1> Hello Web Tech [D] </h1>";
?>


<!DOCTYPE html>
<html>
    <head>
        <title> Login Page </title>
    </head>
    <body>
        <table> 
            <tr>
                <td> <label for="UserName"> User Name: </label></td>
                <td> <input type ="text" id="name" name="name"></td>
            </tr>

            <tr>
                <td> <label for="Password"> Password: </label></td>
                <td> <input type ="password" id="pass" name="pass"></td>
            </tr>
        </table>
        <input type ="submit" id="submit" name="submit" value="LogIn">
        <input type ="reset" id="Reset" name="reset" value="Reset">
        <br>
    </body>
</html>
<?php
$text1="Hello World";
echo $text1;
echo "<br>";
$number1 = 10;
$number2 = 23.5;
echo $number1+$number2;
echo "<h3> Hello Web Tech [D] </h>";
echo '<h3>' .$text1. '</h3>';
if($number1>=10)
    {
        $number1++;
    }
    else{
        $number1--;
        $number2+=$number1;
    }
echo "Number 2: $number2";
echo "<br>";
$cars = array("ABC","DEF","GHI");
var_dump($cars);
echo "<br>";
$cars2 = array("Brand"=>"Aarong", "Shop"=>"Uttara");
echo $cars2["Brand"];
echo "<br>";
echo $cars2["Shop"];


?>