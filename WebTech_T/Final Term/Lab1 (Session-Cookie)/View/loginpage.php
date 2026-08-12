<?php
include "../Controller/LoginValidation.php";
?>

<!DOCTYPE html>
<html>
    <head> 
        <title> Login Page </title>
        <script>
            function collect_data()
            {
                let name= document.getElementById("username").value.trim();
                let Password= document.getElementById("Password").value.trim();
                let valid=true;
                let message="";
                if(name.length<5)
                {
                    message+="User Name Must be 5 Char";
                    valid=false;
                }
                if(Password.length<5)
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
        <form method="post" action="" onsubmit="return collect_data()">
            <table> 
                <tr>
                    <td> <label for="UserName"> User Name: </label></td> 
                  
                <td> <input type="text" id="username" name="username" placeholder="Enter Your Name">
                <?php echo $name; ?>    
            </td>
                </tr>

                <tr>
                    <td> <label for="Password"> Password: </label></td>
                <td> <input type="password" id="Password" name="Password">
                <?php echo $password; ?>
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
