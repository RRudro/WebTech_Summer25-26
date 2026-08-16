<?php
class db{
    function connection()
    {
        $db_host="localhost";
        $db_user="root";
        $db_password="";
        $db_name="Section_D";
        $connection= new mysqli($db_host, $db_user, $db_password, $db_name);
        if($connection->connect_error)
            {
                die("Please connect the Database");
            }
    return $connection;
    }

    function signup($connection,$tablename,$username, $password, $file)
    {
        $sql="INSERT INTO ".$tablename."(username, password, file) VALUES ('".$username."', '".$password."', '".$file."')";
        $result=$connection->query($sql);
        return $result;
    }

}

?>