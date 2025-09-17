<?php
session_start(); // ✅ Always start session at the very top
include '../model/server.php';
include '../views/nav/topnav.php';
include '../views/nav/server_sidebar.php';
include '../views/nav/server_footer.php';
// ================== Database Class ==================
class Dashboard {
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
class Inquiries {
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
}

// ================== Initialize Classes ==================
$db = new Database();
$inquiry = new Inquiry($db->conn);

// ✅ Handle Deletion
if (isset($_GET['delete_id'])) {
    $inquiry->delete((int) $_GET['delete_id']);
    header("Location: ../page/admin_dashboard.php?deleted=1");
    exit();
}

// ✅ Fetch All Inquiries
$inquiries = $inquiry->getAll();
?>

<?php
class DashboardPage {
    public function render() {
        ?>
            <!-- Main Content -->
            <main class="flex-grow-1 p-4">
                <h2 class="fw-bold mb-4">📊 Dashboard Overview</h2>

                <!-- Stats -->
                <div class="row g-4">
                    <div class="col-md-3">
                        <div class="card card-custom text-center p-3">
                            <h5>Total Bookings</h5>
                            <h3>124</h3>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-custom text-center p-3">
                            <h5>Revenue (This Month)</h5>
                            <h3>$5,430</h3>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-custom text-center p-3">
                            <h5>Active Customers</h5>
                            <h3>86</h3>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-custom text-center p-3">
                            <h5>Pending Messages</h5>
                            <h3>7</h3>
                        </div>
                    </div>
                </div>

                <!-- Charts -->
                <div class="row g-4 mt-4">
                    <div class="col-md-8">
                        <div class="card card-custom p-3">
                            <h5 class="fw-bold">📈 Revenue Trends</h5>
                            <canvas id="revenueChart"></canvas>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-custom p-3">
                            <h5 class="fw-bold">🚗 Popular Services</h5>
                            <canvas id="serviceChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Recent Bookings & Reviews -->
                <div class="row g-4 mt-4">
                    <div class="col-md-6">
                        <div class="card card-custom p-3">
                            <h5 class="fw-bold">📝 Recent Bookings</h5>
                            <table class="table table-striped align-middle">
                                <thead class="table-dark">
                                    <tr><th>ID</th><th>Customer</th><th>Service</th><th>Status</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td>#1001</td><td>Maria S.</td><td>Interior Cleaning</td><td><span class="badge bg-success">Completed</span></td></tr>
                                    <tr><td>#1002</td><td>John D.</td><td>Full Wash</td><td><span class="badge bg-warning text-dark">Pending</span></td></tr>
                                    <tr><td>#1003</td><td>Alex T.</td><td>Wax + Polish</td><td><span class="badge bg-info text-dark">In Service</span></td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-custom p-3">
                            <h5 class="fw-bold">⭐ Latest Reviews</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">"Amazing service!" – <b>Maria</b> ⭐⭐⭐⭐⭐</li>
                                <li class="list-group-item">"Fast & affordable." – <b>John</b> ⭐⭐⭐⭐</li>
                                <li class="list-group-item">"Best car wash in town!" – <b>Alex</b> ⭐⭐⭐⭐⭐</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="card card-custom p-3 mt-4">
                    <h5 class="fw-bold">⚡ Quick Actions</h5>
                    <div class="d-flex flex-wrap gap-3">
                        <button class="action-btn btn-add"><i class="fa-solid fa-plus"></i> Add Booking</button>
                        <button class="action-btn btn-service"><i class="fa-solid fa-plus-circle"></i> Add Service</button>
                        <button class="action-btn btn-reply"><i class="fa-solid fa-reply"></i> Reply Message</button>
                        <button class="action-btn btn-report"><i class="fa-solid fa-download"></i> Generate Report</button>
                    </div>
                </div>

            </main>
        </div>

        <script>
        // Revenue Chart
        const ctx = document.getElementById('revenueChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug"],
                datasets: [{
                    label: 'Revenue ($)',
                    data: [3000, 4200, 3500, 5000, 6200, 5800, 7000, 7430],
                    borderColor: '#d4a938',
                    backgroundColor: 'rgba(212,169,56,0.2)',
                    fill: true,
                    tension: 0.4
                }]
            }
        });

        // Services Chart
        const ctx2 = document.getElementById('serviceChart').getContext('2d');
        new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: ["Full Wash", "Interior", "Wax + Polish", "Detailing"],
                datasets: [{
                    data: [40, 25, 20, 15],
                    backgroundColor: ["#1e90ff","#28a745","#d4a938","#ff4d4d"]
                }]
            }
        });
        </script>
        </body>
        </html>
        <?php
    }
}

$page = new DashboardPage();
$page->render();
?>