<?php
/**
 * MySQL access shared by the Final Term labs.
 *
 * Each lab keeps its own Model/db.php that extends this class and only sets
 * the section database name.
 */
class SharedDb
{
    protected $host = "localhost";
    protected $user = "root";
    protected $password = "";
    protected $databaseName = "";

    /**
     * Open a mysqli connection to the section database.
     */
    function connection()
    {
        $connection = new mysqli($this->host, $this->user, $this->password, $this->databaseName);
        if ($connection->connect_error) {
            die("Please connect the Database");
        }

        return $connection;
    }

    /**
     * Insert a new user row.
     */
    function signup($connection, $tablename, $username, $password, $file)
    {
        $sql = "INSERT INTO " . $tablename . "(username, password, file) VALUES ('" . $username . "', '" . $password . "', '" . $file . "')";

        return $connection->query($sql);
    }

    /**
     * Look up a user row by username and password.
     */
    function signin($connection, $tablename, $username, $password)
    {
        $sql = "SELECT * FROM " . $tablename . " WHERE username ='" . $username . "' AND password ='" . $password . "'";

        return $connection->query($sql);
    }
}
