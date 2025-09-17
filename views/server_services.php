<?php
include '../nav/topnav.php';
include '../nav/server_sidebar.php';
include_once '../model/BookingModel.php';
$model = new BookingModel();
$services = $model->get_service();

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
                <a href="../page/admin_services.php" class="active"><i class="fa-solid fa-tags me-2"></i> Services</a>
                <a href="../page/admin_customers.php"><i class="fa-solid fa-users me-2"></i> Customers</a>
                <a href="../page/admin_staff.php"><i class="fa-solid fa-user-tie me-2"></i> Staff</a>
                <a href="../page/admin_reviews.php"><i class="fa-solid fa-star me-2"></i> Reviews</a>
                <a href="../page/admin_gallery.php"><i class="fa-solid fa-image me-2"></i> Gallery</a>
                <a href="../page/admin_messages.php"><i class="fa-solid fa-envelope me-2"></i> Messages</a>
                <a href="../page/admin_reports.php"><i class="fa-solid fa-chart-bar me-2"></i> Reports</a>
                <a href="../page/admin_settings.php"><i class="fa-solid fa-cog me-2"></i> Settings</a>
            </aside>

<div class="main-content p-4">
  <h2 class="text-2xl font-bold mb-4">🚗 Car Wash Services</h2>

  <!-- Add Service Button -->
  <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addServiceModal">
    ➕ Add New Service
  </button>

  <!-- Services Table -->
  <div class="card shadow-sm p-3 bg-white rounded">
    <table class="table table-hover">
      <thead class="table-dark">
        <tr>
          <th>#</th>
          <th>Service Name</th>
          <th>Description</th>
          <th>Price</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td><strong>Basic Wash</strong></td>
          <td>Exterior wash with eco-friendly shampoo</td>
          <td><span class="badge bg-success">$15</span></td>
          <td><span class="badge bg-primary">Active</span></td>
          <td>
            <button class="btn btn-sm btn-warning">✏ Edit</button>
            <button class="btn btn-sm btn-danger">🗑 Delete</button>
          </td>
        </tr>
        <tr>
          <td>2</td>
          <td><strong>Premium Wash</strong></td>
          <td>Full exterior + interior vacuum & wipe</td>
          <td><span class="badge bg-success">$30</span></td>
          <td><span class="badge bg-primary">Active</span></td>
          <td>
            <button class="btn btn-sm btn-warning">✏ Edit</button>
            <button class="btn btn-sm btn-danger">🗑 Delete</button>
          </td>
        </tr>
        <tr>
          <td>3</td>
          <td><strong>Detailing</strong></td>
          <td>Deep clean + waxing & polishing</td>
          <td><span class="badge bg-success">$60</span></td>
          <td><span class="badge bg-secondary">Inactive</span></td>
          <td>
            <button class="btn btn-sm btn-warning">✏ Edit</button>
            <button class="btn btn-sm btn-danger">🗑 Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<!-- Add Service Modal -->
<div class="modal fade" id="addServiceModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">➕ Add New Service</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label class="form-label">Service Name</label>
            <input type="text" class="form-control" placeholder="Enter service name">
          </div>
          <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" rows="3" placeholder="Enter service details"></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" class="form-control" placeholder="Enter price">
          </div>
          <div class="mb-3">
            <label class="form-label">Status</label>
            <select class="form-select">
              <option value="1">Active</option>
              <option value="0">Inactive</option>
            </select>
          </div>
          <button type="submit" class="btn btn-success">Save Service</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div> <!-- end of card-custom -->

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>