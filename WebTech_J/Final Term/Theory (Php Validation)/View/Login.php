<?php
include "../Controller/Loginvaliadation.php";
?>
<!DOCTYPE html>
<html>
    <head>
    <title>LogIn Page</title>
    <script>
        function collect_data()
        {
            let name = document.getElementById("name").value.trim();
            let password = document.getElementById("password").value.trim();
            let valid= true;
            let message ="";

            if(name.length<5)
            {
                message+="User Name Must Be 5 charecter";
                valid=false;
            }
            if(password.length<5)
            {
                message+="password Must Be 5 charecter";
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
    <form method="post" onsubmit="return collect_data()" action="">
    <table>
        <tr>
            <td>
                <label for="Username"> User Name: </label>
            </td>
            <td> 
                <input type ="text" id="name" name="name">
                <?php echo $name; ?>
            </td>
        </tr>
        <tr>
            <td> <label for="pass"> Password: </label></td>
            <td> <input type ="password" id="password" name="password">
            <?php echo $password; ?>
        </td> 
        </tr>
        <tr>
            <td>
                <input type="submit" id="submit" name="submit" value="LogIn">
                <input type="reset" id="reset" name="reset">

            </td>
        </tr>
    </table> 

    </form>
    </body>
</html>
