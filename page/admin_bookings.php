<?php
include '../classes/inquiry.php';
// ================== Database Class ==================
class Database {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbname = "cwms_db";
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if ($this->conn->connect_error) {
            die(" Connection failed: " . $this->conn->connect_error);
        }
    }
}

// ================== Inquiry Manager Class ==================
class InquiryManager {
    private $conn;

    public function __construct($dbConn) {
        $this->conn = $dbConn;
    }

    // Get all inquiries
    public function getInquiries() {
        return $this->conn->query("SELECT * FROM contact_messages_tb ORDER BY id DESC");
    }

    // Get single inquiry
    public function getInquiryById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM contact_messages_tb WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Delete inquiry
    public function deleteInquiry($id) {
        $stmt = $this->conn->prepare("DELETE FROM contact_messages_tb WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}

// ================== Initialize Classes ==================
$db = new Database();
$inquiryManager = new InquiryManager($db->conn);

$messageData = null;

// Handle delete request
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    if ($inquiryManager->deleteInquiry($delete_id)) {
        header("Location: ../page/bookings.php?deleted=1");
        exit;
    }
}

// Fetch message data for modal view
if (isset($_GET['msg_id'])) {
    $messageData = $inquiryManager->getInquiryById(intval($_GET['msg_id']));
}

// Get all inquiries for table
$inquiries = $inquiryManager->getInquiries();
?>

<?php include('../views/booking.php'); ?>