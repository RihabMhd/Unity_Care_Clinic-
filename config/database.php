<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "hospitalmanagement";
    public $conn;

    public function connect() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Erreur de connexion : " . $this->conn->connect_error);
        }
        $this->conn->set_charset("utf8mb4");
        return $this->conn;
    }
}
