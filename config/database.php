<?php

class Database
{
    private $dsn = null;
    private $username = "root";
    private $password = "Hani.123!@#";
    private $conn;

    public function connect()
    {
        $this->conn = null;
        $this->dsn = "mysql:host=localhost;dbname=myBookStore";
        try {
            $this->conn = new PDO($this->dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $err) {
            die("Connection Error: " . $err->getMessage());
        }
        return $this->conn;
    }
}
