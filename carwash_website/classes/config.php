<?php
// ================== Database Class ==================
class Config {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbname = "carwash";
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if ($this->conn->connect_error) {
            die("Database connection failed: " . $this->conn->connect_error);
        }
    }
}
?>