<?php
include "../Controller/RegistrationValidation.php";
?>

<!DOCTYPE html>
<html>
    <head> 
        <title> Login Page </title>
        <script>
            function collect_data()
            {
                let name= document.getElementById("username").value.trim();
                let password= document.getElementById("password").value.trim();
                let valid=true;
                let message="";
                if(name.length<5)
                {
                    message+="User Name Must be 5 Char";
                    valid=false;
                }
                if(password.length<5)
                {
                    message+="Password Must be 5 Char";
                    valid=false;
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
        <form enctype="multipart/form-data" method="post" action="" onsubmit="return collect_data()">
            <table> 
                <tr>
                    <td> <label for="username"> User Name: </label></td> 
                <td> <input type="text" id="username" name="username" placeholder="Enter Your Name">
            </td>
                </tr>

                <tr>
                    <td> <label for="password"> Password: </label></td>
                <td> <input type="password" id="password" name="password">
                </td>
                </tr>

                <tr>
                    <td>

                    </td>
                    <td>
                        <input type="file" id="file" name="file">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="checkbox" id="rememberuser" name="rememberuser" value="1" <?php echo $remember ? 'checked' : ''; ?>>
                        <label for="rememberuser"> Remember Me</label>

                    </td>
                </tr>
                
                <tr>
                    <td colspan="2"> 
                    <input type = "Submit" id ="submit" name = "submit" value="LogIn">
                    <input type = "reset" id ="reset" name = "reset">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
