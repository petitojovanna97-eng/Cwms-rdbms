<?php
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
        $sql = "SELECT * FROM contact_messages_tb ORDER BY id DESC";
        $result = $this->conn->query($sql);
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM contact_messages_tb WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function count() {
        $sql = "SELECT COUNT(*) as total FROM contact_messages_tb";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc()['total'] ?? 0;
    }
}

// ================== Dashboard Data Class ==================
class DashboardData {
    private $conn;

    public function __construct($dbConn) {
        $this->conn = $dbConn;
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

    public function getRecentBookings($limit = 5) {
        // Force $limit to integer to prevent SQL injection
        $limit = (int)$limit;
    
        $sql = "SELECT booking_id, customer_name AS customer, services_name, booking_status 
                FROM booking b
                LEFT JOIN customers c ON b.customer_id = ""
                LEFT JOIN services s ON b.service_id = s.id
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
    header("Location: admin_dashboard.php?deleted=1");
    exit();
}

// ✅ Fetch Data
$totalBookings   = $dashboard->getTotalBookings();
$activeCustomers = $dashboard->getActiveCustomers();
$monthlyRevenue  = $dashboard->getRevenueThisMonth();
$pendingMessages = $inquiry->count();
$recentBookings  = $dashboard->getRecentBookings();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Wash Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { background: #f4f6f9; font-family: 'Segoe UI', sans-serif; }
        .sidebar { width: 260px; background: #1e1e2d; height: 100vh; }
        .sidebar a { color: #ccc; padding: 12px; display: block; border-radius: 8px; text-decoration: none; }
        .sidebar a:hover { background: #343454; color: #fff; }
        .sidebar .active { background: #d4a938; color: #fff; font-weight: bold; }
        .card-custom { background: #fff; border: none; border-radius: 15px; box-shadow: 0px 4px 15px rgba(0,0,0,0.1); }
        .card-custom h3 { color: #1e1e2d; }
        .navbar { background: linear-gradient(90deg, #1e1e2d, #d4a938); }
        .navbar-brand, .navbar-nav .nav-link { color: #fff !important; }
        .logo img { width: 60px; height: 60px; border-radius: 50%; object-fit: cover; }
    </style>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="#">
            <div class="logo">
                <img src="https://via.placeholder.com/60" alt="Car Wash Logo">
            </div>
            🚘 CarWash Dashboard
        </a>
        <div class="ms-auto d-flex align-items-center gap-3">
            <a href="#" class="text-white"><i class="fa-solid fa-bell"></i></a>
            <a href="#" class="text-white"><i class="fa-solid fa-user-circle"></i> Admin</a>
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="../page/logout.php">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i> Sign out
                </a>
            </li>
        </div>
    </div>
</nav>

<div class="d-flex">
    <!-- Sidebar -->
    <aside class="sidebar p-3">
        <h5 class="text-white mb-4">Navigation</h5>
        <a href="admin_dashboard.php" class="active"><i class="fa-solid fa-home me-2"></i> Dashboard</a>
        <a href="admin_bookings.php"><i class="fa-solid fa-calendar-check me-2"></i> Bookings</a>
        <a href="admin_services.php"><i class="fa-solid fa-tags me-2"></i> Services</a>
        <a href="admin_customers.php"><i class="fa-solid fa-users me-2"></i> Customers</a>
        <a href="admin_staff.php"><i class="fa-solid fa-user-tie me-2"></i> Staff</a>
        <a href="admin_reviews.php"><i class="fa-solid fa-star me-2"></i> Reviews</a>
        <a href="admin_gallery.php"><i class="fa-solid fa-image me-2"></i> Gallery</a>
        <a href="admin_messages.php"><i class="fa-solid fa-envelope me-2"></i> Messages</a>
        <a href="admin_reports.php"><i class="fa-solid fa-chart-bar me-2"></i> Reports</a>
        <a href="admin_settings.php"><i class="fa-solid fa-cog me-2"></i> Settings</a>
    </aside>

    <!-- Main Content -->
    <main class="flex-grow-1 p-4">
        <h2 class="fw-bold mb-4">📊 Dashboard Overview</h2>

        <!-- Stats -->
        <div class="row g-4">
            <div class="col-md-3">
                <div class="card card-custom text-center p-3">
                    <h5>Total Bookings</h5>
                    <h3><?= $totalBookings; ?></h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-custom text-center p-3">
                    <h5>Revenue (This Month)</h5>
                    <h3>$<?= number_format($monthlyRevenue, 2); ?></h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-custom text-center p-3">
                    <h5>Active Customers</h5>
                    <h3><?= $activeCustomers; ?></h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-custom text-center p-3">
                    <h5>Pending Messages</h5>
                    <h3><?= $pendingMessages; ?></h3>
                </div>
            </div>
        </div>

        <!-- Recent Bookings -->
        <div class="card card-custom p-3 mt-4">
            <h5 class="fw-bold">📝 Recent Bookings</h5>
            <table class="table table-striped align-middle">
                <thead class="table-dark">
                    <tr><th>ID</th><th>Customer</th><th>Service</th><th>Status</th></tr>
                </thead>
                <tbody>
                <?php if (!empty($recentBookings)): ?>
                    <?php foreach ($recentBookings as $row): ?>
                        <tr>
                            <td>#<?= $row['id']; ?></td>
                            <td><?= htmlspecialchars($row['customer']); ?></td>
                            <td><?= htmlspecialchars($row['service_name']); ?></td>
                            <td><span class="badge bg-info"><?= htmlspecialchars($row['status']); ?></span></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="4" class="text-center">No recent bookings</td></tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>
</div>
</body>
</html>