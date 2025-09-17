<?php
// ================== ContactMessage Class ==================
class ContactMessage {
    private $conn;

    public function __construct($dbConn) {
        $this->conn = $dbConn;
    }

    public function saveMessage($name, $message, $email, $contact) {
        $stmt = $this->conn->prepare("INSERT INTO contact_tb (name, message, email, contact_number) VALUES (?, ?, ?, ?)");
        
        if ($stmt === false) {
            return "Something went wrong: " . htmlspecialchars($this->conn->error);
        }

        $stmt->bind_param("ssss", $name, $message, $email, $contact);

        if ($stmt->execute()) {
            $stmt->close();
            return "Feedback message was sent successfully.";
        } else {
            $error = "Error sending feedback: " . htmlspecialchars($stmt->error);
            $stmt->close();
            return $error;
        }
    }
}
?>