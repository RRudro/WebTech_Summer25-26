<?php
include "../Controller/RegistrationValidation.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Registartion Page </title>
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

       <form enctype="multipart/form-data"  method="post" action="" onsubmit="return collect_data()"> 
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

                </td>
                <td>
                    <input type="file" name="file" id="file"> 
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="checkbox" id="remember" name="remember" value="1" <?php echo $remember ? 'checked' : ''; ?>>
                    <label for="remember"> Remember Me</label>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" id="submit" value="LogIn">
                    <input type="reset" id="reset">
                </td>
            </tr>
        </table>
       </form>
    </body>
</html>
