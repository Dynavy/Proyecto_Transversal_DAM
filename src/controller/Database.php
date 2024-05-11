<?php
session_start();
// Database connection
class Database {
    private $conn;

    public function __construct()
    {
        $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $dbname = "ProyectoBD";
        $db_port = 3306;

        try {
            $dsn = "mysql:host=$servername;dbname=$dbname;port=$db_port";
            $this->conn = new PDO($dsn, $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Succesfully connected";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}

?>