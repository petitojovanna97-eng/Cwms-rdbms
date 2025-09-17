<?php
class ServicesManager {
    private $conn;

    public function __construct($dbconn) {
        $this->conn = $dbconn;
    }

    public function saveServices($name, $price) {
        $stmt = $this->conn->prepare("SELECT FROM services (name, price) VALUES (?, ?)")

        if ($stmt === false) {
            return "Something went wrong: " . htmlspecialchars($this->conn->error);
        }

        $stmt->bind_param("ss", $name, $price);
    }
}

?>