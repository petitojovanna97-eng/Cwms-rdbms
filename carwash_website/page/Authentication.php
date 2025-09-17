<?php
// Start the session
session_start();

// ✅ If already logged in, prevent reopening login page
if (isset($_SESSION['user_id'])) {
    header("Location: ../page/admin_dashboard.php");
    exit();
}

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

// ================== Auth Class ==================
class Auth {
    private $conn;

    public function __construct($dbConn) {
        $this->conn = $dbConn;
    }

    public function login($username, $password) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = ? LIMIT 2");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($user = $result->fetch_assoc()) {
            // ✅ Verify password hash
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id']  = $user['id'];
                $_SESSION['username'] = $user['username'];
                return true;
            }
        }
        return false;
    }
}

// ================== Initialize Classes ==================
$db = new Database();
$auth = new Auth($db->conn);

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if ($auth->login($username, $password)) {
        header("Location: ../page/admin_dashboard.php");
        exit();
    } else {    
        $message = "Invalid username or password.";
    }
}

// ✅ Hand over to the view
include('../views/login_view.php');