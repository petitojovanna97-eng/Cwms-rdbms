<?php

// ================== Database Class ==================
class Database {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbname = "carwash";
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
}

// ================== Inquiry Manager Class ==================
class Inquiry {
    private $conn;

    public function __construct($dbConn) {
        $this->conn = $dbConn;
    }

    public function getAll() {
        $sql = "SELECT * FROM contact_tb ORDER BY cont_id DESC";
        $result = $this->conn->query($sql);
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM contact_tb WHERE cont_id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function count() {
        $sql = "SELECT * FROM contact_tb ORDER BY cont_id DESC";
        $result = $this->conn->query($sql);
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }
}
//========= classes ==========
class DashboardData{
    private $conn;

    public function __construct($dbConn) {
        $this->conn= $dbConn;
    }

    public function getTotalBookings() {
        $sql = "SELECT COUNT(*) as total FROM booking";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc()['total'] ?? 0;   
    }

    public function getActiveCustomers() {
        $sql = "SELECT COUNT(*) as total FROM customers";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc()['total'] ?? 0;  
    }

    public function getRevenueThisMonth() {
        $sql = "SELECT SUM(amount) as revenue 
        FROM payment 
        WHERE MONTH(payment_date) = MONTH(CURRENT_DATE()) 
        AND YEAR(payment_date) = YEAR(CURRENT_DATE())";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc()['revenue'] ?? 0;  
    }

    public function getRecentBookings() {
        $limit = (int)$limit;

        $sql = "SELECT booking_id, customer_name AS customer, services_name, booking_status
                FROM booking 
                LEFT JOIN  customers ON customer_id 
                LEFT JOIN services ON  service_id 
                ORDER BY booking_id DESC 
                LIMIT $limit";

        $result = $this->conn->query($sql);
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }
}
// ================== Initialize Classes ==================
$db = new Database();
$inquiry = new Inquiry($db->conn);
$dashboard = new DashboardData($db->conn);

// ✅ Handle Deletion
if (isset($_GET['delete_id'])) {
    $inquiry->delete((int) $_GET['delete_id']);
    header("Location: ../page/admin_dashboard.php?deleted=1");
    exit();
}

// ✅ Fetch All DATA
$inquiries = $inquiry->getAll();
$totalBookings = $dashboard->getTotalBookings();
$activeCustomers = $dashboard->getActiveCustomers();
$monthlyRevenue = $dashboard->getRevenueThisMonth();

?>
