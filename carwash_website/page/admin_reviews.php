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
                <a href="../page/admin_reviews.php" class="active"><i class="fa-solid fa-star me-2"></i> Reviews</a>
                <a href="../page/admin_gallery.php"><i class="fa-solid fa-image me-2"></i> Gallery</a>
                <a href="../page/admin_messages.php"><i class="fa-solid fa-envelope me-2"></i> Messages</a>
                <a href="../page/admin_reports.php"><i class="fa-solid fa-chart-bar me-2"></i> Reports</a>
                <a href="../page/admin_settings.php"><i class="fa-solid fa-cog me-2"></i> Settings</a>
            </aside>
<div class="main-content p-4">
  <h2 class="text-2xl font-bold mb-4">⭐ Customer Reviews</h2>

  <!-- Search & Filter -->
  <div class="d-flex justify-content-between mb-3">
    <form class="d-flex w-50">
      <input class="form-control me-2" type="search" placeholder="🔍 Search reviews..." aria-label="Search">
      <button class="btn btn-primary">Search</button>
    </form>
    <select class="form-select w-25">
      <option>All</option>
      <option>5 Stars</option>
      <option>4 Stars</option>
      <option>3 Stars</option>
      <option>2 Stars</option>
      <option>1 Star</option>
    </select>
  </div>

  <!-- Reviews Table -->
  <div class="card shadow-sm p-3 bg-white rounded">
    <table class="table table-hover align-middle">
      <thead class="table-dark">
        <tr>
          <th>#</th>
          <th>Customer</th>
          <th>Email</th>
          <th>Rating</th>
          <th>Review</th>
          <th>Date</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <!-- Review 1 -->
        <tr>
          <td>1</td>
          <td><strong>Juan Dela Cruz</strong></td>
          <td>juan@example.com</td>
          <td>
            ⭐⭐⭐⭐⭐
          </td>
          <td>
            <span class="text-truncate d-inline-block" style="max-width: 200px;">
              Excellent service! My car looks brand new after the detailing package.
            </span>
            <a href="#" data-bs-toggle="modal" data-bs-target="#reviewModal1">...see more</a>
          </td>
          <td>2025-09-01</td>
          <td><span class="badge bg-success">Published</span></td>
          <td>
            <button class="btn btn-sm btn-secondary">👁 Hide</button>
            <button class="btn btn-sm btn-danger">🗑 Delete</button>
          </td>
        </tr>

        <!-- Review 2 -->
        <tr>
          <td>2</td>
          <td><strong>Maria Santos</strong></td>
          <td>maria.santos@example.com</td>
          <td>
            ⭐⭐⭐⭐☆
          </td>
          <td>
            <span class="text-truncate d-inline-block" style="max-width: 200px;">
              Good service but took a little longer than expected.
            </span>
            <a href="#" data-bs-toggle="modal" data-bs-target="#reviewModal2">...see more</a>
          </td>
          <td>2025-08-29</td>
          <td><span class="badge bg-warning">Pending</span></td>
          <td>
            <button class="btn btn-sm btn-success">✅ Approve</button>
            <button class="btn btn-sm btn-danger">🗑 Delete</button>
          </td>
        </tr>

        <!-- Review 3 -->
        <tr>
          <td>3</td>
          <td><strong>Carlos Ramirez</strong></td>
          <td>carlos.ramirez@example.com</td>
          <td>
            ⭐⭐☆☆☆
          </td>
          <td>
            <span class="text-truncate d-inline-block" style="max-width: 200px;">
              Not satisfied. The interior cleaning was not thorough.
            </span>
            <a href="#" data-bs-toggle="modal" data-bs-target="#reviewModal3">...see more</a>
          </td>
          <td>2025-08-25</td>
          <td><span class="badge bg-danger">Hidden</span></td>
          <td>
            <button class="btn btn-sm btn-success">✅ Publish</button>
            <button class="btn btn-sm btn-danger">🗑 Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<!-- Review Modal 1 -->
<div class="modal fade" id="reviewModal1" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title">⭐ Review from Juan Dela Cruz</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p><strong>Email:</strong> juan@example.com</p>
        <p><strong>Rating:</strong> ⭐⭐⭐⭐⭐</p>
        <p><strong>Date:</strong> 2025-09-01</p>
        <p><strong>Review:</strong></p>
        <p>Excellent service! My car looks brand new after the detailing package. The staff was friendly and very professional.</p>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-danger">🗑 Delete</button>
      </div>
    </div>
  </div>
</div>

<!-- Review Modal 2 -->
<div class="modal fade" id="reviewModal2" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-warning text-dark">
        <h5 class="modal-title">⭐ Review from Maria Santos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p><strong>Email:</strong> maria.santos@example.com</p>
        <p><strong>Rating:</strong> ⭐⭐⭐⭐☆</p>
        <p><strong>Date:</strong> 2025-08-29</p>
        <p><strong>Review:</strong></p>
        <p>Good service but took a little longer than expected. Staff were accommodating though.</p>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success">✅ Approve</button>
        <button class="btn btn-danger">🗑 Delete</button>
      </div>
    </div>
  </div>
</div>

<!-- Review Modal 3 -->
<div class="modal fade" id="reviewModal3" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title">⭐ Review from Carlos Ramirez</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p><strong>Email:</strong> carlos.ramirez@example.com</p>
        <p><strong>Rating:</strong> ⭐⭐☆☆☆</p>
        <p><strong>Date:</strong> 2025-08-25</p>
        <p><strong>Review:</strong></p>
        <p>Not satisfied. The interior cleaning was not thorough and had to wait longer than promised.</p>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success">✅ Publish</button>
        <button class="btn btn-danger">🗑 Delete</button>
      </div>
    </div>
  </div>
</div>
</div> <!-- end of card-custom -->

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>