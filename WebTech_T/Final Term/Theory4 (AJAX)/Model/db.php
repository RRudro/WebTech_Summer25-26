<?php 

class db{
    function connection()
    {
        $db_host="localhost";
        $db_user="root";
        $db_password="";
        $db_name="section_t";

        $connection= new mysqli($db_host, $db_user, $db_password, $db_name);
        if($connection->connect_error)
            {
                die("Please Connect the Database");
            }
        return $connection;
    }
    function signup($connection, $tablename, $username, $password, $file)
    {
        $sql="INSERT INTO ".$tablename."(username, password, file) VALUES ('".$username."', '".$password."', '".$file."')";
        $result=$connection->query($sql);
        return $result;
    }
    function signin($connection, $tablename, $username, $password)
    {
        $sql="SELECT * FROM ".$tablename." WHERE username = '".$username."' AND password ='".$password."'";
        $result=$connection->query($sql);
        return $result;
    }
    function CheckUser($connection, $tablename, $username)
    {
        $sql="SELECT * FROM ".$tablename. " WHERE username ='".$username."'";
        $result=$connection->query($sql);
        return $result;

    }
}


?>