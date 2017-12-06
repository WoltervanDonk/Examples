<?php
class DBconn
{
    private $conn;

    public function __construct()
    {

    }

    public function openConnection()
    {
        include_once "../../Includes/config.php";
        try
        {
            $this->conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USERNAME, PASSWORD);
        }
        catch(PDOException $exception)
        {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }

    public function CloseConnection()
    {
        return $this->conn = null;
    }

    /**
     * @return mixed
     */
    public function getConn()
    {
        return $this->conn;
    }

    /**
     * @param mixed $conn
     */
    public function setConn($conn)
    {
        $this->conn = $conn;
    }
}
?>