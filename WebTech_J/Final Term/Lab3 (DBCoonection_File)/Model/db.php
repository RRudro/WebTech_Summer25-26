<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

class db{
    function connection()
    {
        $db_host="localhost";
        $db_user="root";
        $db_password="";
        $db_name="Section_J";
        try{
            $connection= new mysqli($db_host, $db_user, $db_password, $db_name);
        }
        catch(mysqli_sql_exception $error){
            throw new RuntimeException("Database connection failed: ".$error->getMessage(), 0, $error);
        }
    return $connection;
    }

    function signup($connection,$tablename,$username,$password,$file)
    {
        $sql="INSERT INTO ".$tablename."(username, password, file) VALUES ('".$username."', '".$password."', '".$file."')";
        try{
            $result=$connection-> query($sql);
        }
        catch(mysqli_sql_exception $error){
            throw new RuntimeException("Sign up failed: ".$error->getMessage(), 0, $error);
        }
        return $result;
    }
    function signin($connection,$tablename,$username,$password)
    {
        $sql="SELECT * FROM ".$tablename." WHERE username ='".$username."' AND password ='".$password."'";
        try{
            $result=$connection->query($sql);
        }
        catch(mysqli_sql_exception $error){
            throw new RuntimeException("Sign in failed: ".$error->getMessage(), 0, $error);
        }
        return $result;
    }

}

?>
