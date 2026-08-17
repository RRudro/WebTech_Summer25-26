<?php
require "../Controller/Loginvalidation.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Login Page </title>
        <script>
            function collect_data()
            {
                let name = document.getElementById("name").value.trim();
                let password = document.getElementById("password").value.trim();
                let valid = true;
                let message="";
                if(name.length <5)
                {
                    message+="User Name Should be 5 Char";
                    valid = false;
                }
                if(password.length <5)
                {
                    message+="Password Must be 5 Char";
                    valid = false;
                }
                if(!valid)
                {
                    alert(message);
                }
                return valid;

            }
        </script>
    </head>
    <body>
       <form method="post" action="" onsubmit="return collect_data()"> 
        <table>
            <tr>
                <td> <label for="username"> User Name: </label></td>
                <td> <input type="text" id="name" name="name">
                <?php echo $name ?>
            </td>
            </tr>

             <tr>
                <td> <label for="pass"> Password: </label></td>
                <td> <input type="password" id="password" name="password">
                <?php echo $password ?>
            </td>
            </tr>

            <tr>
                <td>
                    <input type="submit" id="submit" value="LogIn">
                    <input type="reset" id="reset">
                </td>
            </tr>
        </table>
       </form>
    </body>
</html>
