<?php
class db{
    function connection()
    {
        $db_host=getenv("DB_HOST") ?: "localhost";
        $db_user=getenv("DB_USER") ?: "root";
        $db_password=getenv("DB_PASSWORD") ?: "";
        $db_name=getenv("DB_NAME") ?: "Section_J";
        $connection= new mysqli($db_host, $db_user, $db_password, $db_name);
        if($connection->connect_error)
            {
                die("Please Connect The Database");
            }
    return $connection;
    }

    private function quotedTable($tablename)
    {
        if(!preg_match('/^[A-Za-z0-9_]+$/', $tablename))
            {
                throw new InvalidArgumentException("Invalid table name");
            }
        return "`".$tablename."`";
    }

    function signup($connection,$tablename,$username,$password,$file)
    {
        $sql="INSERT INTO ".$this->quotedTable($tablename)."(username, password, file) VALUES (?, ?, ?)";
        $statement=$connection->prepare($sql);
        if($statement===false)
            {
                return false;
            }
        $hash=password_hash($password, PASSWORD_DEFAULT);
        $statement->bind_param("sss", $username, $hash, $file);
        $result=$statement->execute();
        $statement->close();
        return $result;
    }
    function signin($connection,$tablename,$username,$password)
    {
        $sql="SELECT password FROM ".$this->quotedTable($tablename)." WHERE username = ? LIMIT 1";
        $statement=$connection->prepare($sql);
        if($statement===false)
            {
                return false;
            }
        $statement->bind_param("s", $username);
        $statement->execute();
        $user=$statement->get_result()->fetch_assoc();
        $statement->close();
        if(!$user)
            {
                return false;
            }
        return password_verify($password, $user["password"]);
    }

}

?>
