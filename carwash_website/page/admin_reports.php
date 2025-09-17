<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Car Wash Admin Dashboard</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <!-- ✅ Bootstrap JS (includes Popper for modals, tooltips, etc.) -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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
                .logo img {
                    width: 60px;
                    height: 60px;
                    border-radius: 50%;
                    object-fit: cover;
                }

                /* 🎨 Fancy Buttons */
                .action-btn {
                    border: none;
                    border-radius: 50px;
                    padding: 12px 20px;
                    font-weight: 600;
                    font-size: 15px;
                    display: flex;
                    align-items: center;
                    gap: 8px;
                    transition: all 0.3s ease;
                    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
                }
                .action-btn i {
                    font-size: 18px;
                }
                .action-btn:hover {
                    transform: translateY(-3px) scale(1.05);
                    box-shadow: 0 6px 18px rgba(0,0,0,0.25);
                }
                .btn-add {
                    background: linear-gradient(45deg, #007bff, #00c6ff);
                    color: #fff;
                }
                .btn-service {
                    background: linear-gradient(45deg, #28a745, #5ddf80);
                    color: #fff;
                }
                .btn-reply {
                    background: linear-gradient(45deg, #ffc107, #ffdd57);
                    color: #000;
                }
                .btn-report {
                    background: linear-gradient(45deg, #dc3545, #ff6b6b);
                    color: #fff;
                }
            </style>
        </head>
        <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="#">
                    <div class="logo">
                        <img src="https://scontent.fceb2-1.fna.fbcdn.net/v/t1.15752-9/541048493_759763299993588_5287248317119606726_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=9f807c&_nc_eui2=AeGjLdhUiHYcxF9CWG2USm2lzNlzN3dmbanM2XM3d2ZtqUbpGyjhYEUtsZYmWyATRHhXdGWmZ_8k_iT1VLi4gN5H&_nc_ohc=9fK3_MuBOS4Q7kNvwF9_P4O&_nc_oc=AdmMqVoN31IkBPmCTQlDhR05KqL6f4VgJp1UNI9BUOYumzk5-JaRgrx4f55H6DXLd6s&_nc_zt=23&_nc_ht=scontent.fceb2-1.fna&oh=03_Q7cD3AF56HPcJZg4HcGmMFRvhHZAAhjhofCyR3gcN_ySeNkQuQ&oe=68DC5DCF" alt="Car Wash Logo">
                    </div>
                    🚘 CarWash Dashboard
                </a>
                <div class="ms-auto d-flex align-items-center gap-3">
                    <a href="#" class="text-white"><i class="fa-solid fa-bell"></i></a>
                    <a href="#" class="text-white"><i class="fa-solid fa-user-circle"></i> Admin</a>
                    <li class="nav-item text-nowrap">
            <a class="nav-link" href="../page/logout.php" data-bs-toggle="modal" data-bs-target="#logoutModal">
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
                <a href="../page/admin_dashboard.php"><i class="fa-solid fa-home me-2"></i> Dashboard</a>
                <a href="../page/admin_bookings.php"><i class="fa-solid fa-calendar-check me-2"></i> Bookings</a>
                <a href="../page/admin_services.php"><i class="fa-solid fa-tags me-2"></i> Services</a>
                <a href="../page/admin_customers.php"><i class="fa-solid fa-users me-2"></i> Customers</a>
                <a href="../page/admin_staff.php"><i class="fa-solid fa-user-tie me-2"></i> Staff</a>
                <a href="../page/admin_reviews.php"><i class="fa-solid fa-star me-2"></i> Reviews</a>
                <a href="../page/admin_gallery.php"><i class="fa-solid fa-image me-2"></i> Gallery</a>
                <a href="../page/admin_messages.php"><i class="fa-solid fa-envelope me-2"></i> Messages</a>
                <a href="../page/admin_reports.php" class="active"><i class="fa-solid fa-chart-bar me-2"></i> Reports</a>
                <a href="../page/admin_settings.php"><i class="fa-solid fa-cog me-2"></i> Settings</a>
            </aside>
<div class="main-content p-4">
  <h2 class="text-2xl font-bold mb-4">📊 Reports & Analytics</h2>

  <!-- Filter Section -->
  <div class="card shadow-sm p-3 mb-4">
    <form class="row g-3 align-items-end">
      <div class="col-md-4">
        <label class="form-label">Start Date</label>
        <input type="date" class="form-control">
      </div>
      <div class="col-md-4">
        <label class="form-label">End Date</label>
        <input type="date" class="form-control">
      </div>
      <div class="col-md-4">
        <button class="btn btn-primary w-100">📅 Generate Report</button>
      </div>
    </form>
  </div>

  <!-- Summary Cards -->
  <div class="row g-3 mb-4">
    <div class="col-md-3">
      <div class="card text-white bg-primary shadow-sm">
        <div class="card-body">
          <h5>Total Bookings</h5>
          <h2>152</h2>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card text-white bg-success shadow-sm">
        <div class="card-body">
          <h5>Completed Services</h5>
          <h2>138</h2>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card text-white bg-warning shadow-sm">
        <div class="card-body">
          <h5>Pending Bookings</h5>
          <h2>14</h2>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card text-white bg-danger shadow-sm">
        <div class="card-body">
          <h5>Total Revenue</h5>
          <h2>₱245,000</h2>
        </div>
      </div>
    </div>
  </div>

  <!-- Charts Section -->
  <div class="row g-4 mb-4">
    <div class="col-md-6">
      <div class="card shadow-sm p-3">
        <h5 class="mb-3">📈 Monthly Revenue</h5>
        <canvas id="revenueChart" height="150"></canvas>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card shadow-sm p-3">
        <h5 class="mb-3">🚘 Service Popularity</h5>
        <canvas id="serviceChart" height="150"></canvas>
      </div>
    </div>
  </div>

  <!-- Table Reports -->
  <div class="card shadow-sm p-3 mb-4">
    <h5 class="mb-3">📑 Detailed Report</h5>
    <table class="table table-bordered table-striped align-middle">
      <thead class="table-dark">
        <tr>
          <th>#</th>
          <th>Booking ID</th>
          <th>Customer</th>
          <th>Service</th>
          <th>Status</th>
          <th>Date</th>
          <th>Revenue</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>#BK20250901</td>
          <td>Ana Reyes</td>
          <td>Premium Wash</td>
          <td><span class="badge bg-success">Completed</span></td>
          <td>2025-09-01</td>
          <td>₱1,500</td>
        </tr>
        <tr>
          <td>2</td>
          <td>#BK20250830</td>
          <td>Mark Villanueva</td>
          <td>Interior Cleaning</td>
          <td><span class="badge bg-warning">Pending</span></td>
          <td>2025-08-30</td>
          <td>₱1,000</td>
        </tr>
        <tr>
          <td>3</td>
          <td>#BK20250828</td>
          <td>Jenny Cruz</td>
          <td>Full Detailing</td>
          <td><span class="badge bg-success">Completed</span></td>
          <td>2025-08-28</td>
          <td>₱3,000</td>
        </tr>
      </tbody>
    </table>

    <div class="mt-3 d-flex justify-content-end gap-2">
      <button class="btn btn-danger">⬇ Export PDF</button>
      <button class="btn btn-success">⬇ Export Excel</button>
    </div>
  </div>
</div>

<!-- Charts Script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // Revenue Chart
  const ctx1 = document.getElementById('revenueChart');
  new Chart(ctx1, {
    type: 'line',
    data: {
      labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep'],
      datasets: [{
        label: 'Revenue (₱)',
        data: [20000, 25000, 30000, 28000, 32000, 35000, 40000, 37000, 42000],
        borderWidth: 2,
        borderColor: 'blue',
        backgroundColor: 'rgba(0,0,255,0.2)',
        fill: true,
      }]
    }
  });

  // Service Popularity
  const ctx2 = document.getElementById('serviceChart');
  new Chart(ctx2, {
    type: 'doughnut',
    data: {
      labels: ['Premium Wash', 'Interior Cleaning', 'Full Detailing', 'Waxing'],
      datasets: [{
        label: 'Service Count',
        data: [45, 30, 20, 15],
        backgroundColor: ['#007bff', '#28a745', '#ffc107', '#dc3545']
      }]
    }
  });
</script>
</div> <!-- end of card-custom -->

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>