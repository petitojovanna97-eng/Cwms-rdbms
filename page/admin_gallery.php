<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Car Wash Admin Dashboard</title>

  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

  <style>
    body { background: #f4f6f9; font-family: 'Segoe UI', sans-serif; }
    .sidebar { width: 260px; background: #1e1e2d; height: 100vh; }
    .sidebar a { color: #ccc; padding: 12px; display: block; border-radius: 8px; text-decoration: none; }
    .sidebar a:hover { background: #343454; color: #fff; }
    .sidebar .active { background: #d4a938; color: #fff; font-weight: bold; }
    .navbar { background: linear-gradient(90deg, #1e1e2d, #d4a938); }
    .navbar-brand, .navbar-nav .nav-link { color: #fff !important; }
    .logo img {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      object-fit: cover;
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
      <a class="nav-link text-white" href="../page/logout.php" data-bs-toggle="modal" data-bs-target="#logoutModal">
        <i class="fa-solid fa-arrow-right-from-bracket"></i> Sign out
      </a>
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
    <a href="../page/admin_gallery.php" class="active"><i class="fa-solid fa-image me-2"></i> Gallery</a>
    <a href="../page/admin_messages.php"><i class="fa-solid fa-envelope me-2"></i> Messages</a>
    <a href="../page/admin_reports.php"><i class="fa-solid fa-chart-bar me-2"></i> Reports</a>
    <a href="../page/admin_settings.php"><i class="fa-solid fa-cog me-2"></i> Settings</a>
  </aside>

  <!-- Main Content -->
  <div class="main-content p-4 flex-grow-1">
    <h2 class="mb-4">🖼 Gallery</h2>

    <!-- Upload Button -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#uploadModal">
      📤 Upload New Media
    </button>

    <!-- Gallery Grid -->
    <div class="row g-3">
      <!-- Image 1 -->
      <div class="col-md-4 col-sm-6">
        <div class="card shadow-sm">
          <img src="https://www.ricksautodetailing.com/wp-content/uploads/2021/06/before-after-exterior-e1659991222178.jpg" class="card-img-top" alt="Car Wash Image" data-bs-toggle="modal" data-bs-target="#mediaModal1">
          <div class="card-body text-center">
            <p class="card-text">Before & After Wash</p>
            <button class="btn btn-sm btn-danger">🗑 Delete</button>
          </div>
        </div>
      </div>

      <!-- Image 2 -->
      <div class="col-md-4 col-sm-6">
        <div class="card shadow-sm">
          <img src="https://surfnshine.com/wp-content/uploads/2023/10/interior-detailing-1024x576.jpg" class="card-img-top" alt="Car Wash Image" data-bs-toggle="modal" data-bs-target="#mediaModal2">
          <div class="card-body text-center">
            <p class="card-text">Interior Cleaning</p>
            <button class="btn btn-sm btn-danger">🗑 Delete</button>
          </div>
        </div>
      </div>

      <!-- Image 3 -->
      <div class="col-md-4 col-sm-6">
        <div class="card shadow-sm">
          <img src="https://www.detailingdevils.com/assets/images/products/maintenance/fomawash/foam-wash.webp" class="card-img-top" alt="Car Wash Image" data-bs-toggle="modal" data-bs-target="#mediaModal3">
          <div class="card-body text-center">
            <p class="card-text">Foam Wash</p>
            <button class="btn btn-sm btn-danger">🗑 Delete</button>
          </div>
        </div>
      </div>

      <!-- Image 4 -->
      <div class="col-md-4 col-sm-6">
        <div class="card shadow-sm">
          <img src="https://s.garasi.id/q80/store_products/4cf7cdee-e3c2-4d9b-a0ff-44568e29ffd7.jpg" class="card-img-top" alt="Car Wash Image" data-bs-toggle="modal" data-bs-target="#mediaModal4">
          <div class="card-body text-center">
            <p class="card-text">Premium Wax</p>
            <button class="btn btn-sm btn-danger">🗑 Delete</button>
          </div>
        </div>
      </div>

      <!-- Image 5 -->
      <div class="col-md-4 col-sm-6">
        <div class="card shadow-sm">
          <img src="https://d2hucwwplm5rxi.cloudfront.net/wp-content/uploads/2021/08/05102743/degrease-car-engine-080520210317-1024x640.jpg" class="card-img-top" alt="Car Wash Image" data-bs-toggle="modal" data-bs-target="#mediaModal5">
          <div class="card-body text-center">
            <p class="card-text">Engine Detailing</p>
            <button class="btn btn-sm btn-danger">🗑 Delete</button>
          </div>
        </div>
      </div>

      <!-- Image 6 -->
      <div class="col-md-4 col-sm-6">
        <div class="card shadow-sm">
          <img src="https://surfnshine.com/wp-content/uploads/2023/10/interior-detailing-1024x576.jpg" class="card-img-top" alt="Car Wash Image" data-bs-toggle="modal" data-bs-target="#mediaModal6">
          <div class="card-body text-center">
            <p class="card-text">Interior Shine</p>
            <button class="btn btn-sm btn-danger">🗑 Delete</button>
          </div>
        </div>
      </div>

      <!-- Video 1 -->
      <div class="col-md-4 col-sm-6">
        <div class="card shadow-sm">
          <div class="ratio ratio-16x9" data-bs-toggle="modal" data-bs-target="#mediaModal7">
            <iframe src="https://www.youtube.com/embed/abc123xyz" title="Car Wash Video" allowfullscreen></iframe>
          </div>
          <div class="card-body text-center">
            <p class="card-text">Detailing Tutorial</p>
            <button class="btn btn-sm btn-danger">🗑 Delete</button>
          </div>
        </div>
      </div>

      <!-- Video 2 -->
      <div class="col-md-4 col-sm-6">
        <div class="card shadow-sm">
          <div class="ratio ratio-16x9" data-bs-toggle="modal" data-bs-target="#mediaModal8">
            <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="Car Wash Video" allowfullscreen></iframe>
          </div>
          <div class="card-body text-center">
            <p class="card-text">Customer Review</p>
            <button class="btn btn-sm btn-danger">🗑 Delete</button>
          </div>
        </div>
      </div>

      <!-- Video 3 -->
      <div class="col-md-4 col-sm-6">
        <div class="card shadow-sm">
          <div class="ratio ratio-16x9" data-bs-toggle="modal" data-bs-target="#mediaModal7">
            <iframe src="https://www.youtube.com/embed/abc123xyz" title="Car Wash Video" allowfullscreen></iframe>
          </div>
          <div class="card-body text-center">
            <p class="card-text">Detailing Tutorial</p>
            <button class="btn btn-sm btn-danger">🗑 Delete</button>
          </div>
        </div>
      </div>


      
<!-- Upload Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">📤 Upload Media</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data">
          <div class="mb-3">
            <label class="form-label">Select File</label>
            <input type="file" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Caption</label>
            <input type="text" class="form-control" placeholder="Enter caption for this media">
          </div>
          <button type="submit" class="btn btn-success">Upload</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Media Modals (1-9) -->
<div class="modal fade" id="mediaModal1" tabindex="-1"><div class="modal-dialog modal-lg modal-dialog-centered"><div class="modal-content"><div class="modal-body text-center"><img src="https://www.ricksautodetailing.com/wp-content/uploads/2021/06/before-after-exterior-e1659991222178.jpg" class="img-fluid rounded"><p class="mt-2">Before & After Wash</p></div></div></div></div>
<div class="modal fade" id="mediaModal2" tabindex="-1"><div class="modal-dialog modal-lg modal-dialog-centered"><div class="modal-content"><div class="modal-body text-center"><img src="https://surfnshine.com/wp-content/uploads/2023/10/interior-detailing-1024x576.jpg" class="img-fluid rounded"><p class="mt-2">Interior Cleaning</p></div></div></div></div>
<div class="modal fade" id="mediaModal3" tabindex="-1"><div class="modal-dialog modal-lg modal-dialog-centered"><div class="modal-content"><div class="modal-body text-center"><img src="https://cdn.pixabay.com/photo/2017/03/27/14/56/car-wash-2179221_1280.jpg" class="img-fluid rounded"><p class="mt-2">Foam Wash</p></div></div></div></div>
<div class="modal fade" id="