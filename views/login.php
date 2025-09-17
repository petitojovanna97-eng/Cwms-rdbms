<?php
    session_start();
    
    // Function to check if the user is already logged in (has an active session)
    function isLoggedIn() {
        return isset($_SESSION['user_id']); // Replace 'user_id' with your actual session variable
    }
    
    // Function to prevent direct URL access after the first visit
    function preventDirectAccess() {
        if (isset($_SESSION['page_visited'])) {
            header("Location: ../page/Authentication.php"); // Redirect to another page
            exit();
        } else {
            $_SESSION['page_visited'] = true; // Set the session variable
        }
    }
    
    // Check if the user is trying to access the page directly
    if (!isLoggedIn()) {
        preventDirectAccess();
    }
    
    // Logout Function
    function logout() {
        session_unset();
        session_destroy();
        header("Location: ../views/Authentication.php"); // Redirect to login page
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1" /> 
    <title>Login</title>
    <link rel="stylesheet" href="../model/style.css">
</head>
<body>
    <!-- Fonts & Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <style>
  </style>
</head>
<body>

<div class="login-card">

  <!-- Carwash Image -->
  <div class="top-img">
    <img src="https://scontent.fceb6-3.fna.fbcdn.net/v/t1.15752-9/541218467_1292119009050103_8926888087627129792_n.png?_nc_cat=106&ccb=1-7&_nc_sid=9f807c&_nc_eui2=AeEKro9GNRPZ-YvxzHlh7F_kX5Ou5Oe54c9fk67k57nhz7Gjm6a55XZdvsuU06KDrJ95rSiFnRjXvAhHGXP1yYFr&_nc_ohc=-5Kx93sjX0IQ7kNvwEcIB0g&_nc_oc=AdlL2ObNr8nT13_NRYewEAJHKYY7fhpVk4gA-vZoKkpHP7RZVM34Laj4y0gpWMC2lAU&_nc_zt=23&_nc_ht=scontent.fceb6-3.fna&oh=03_Q7cD3QHDWoGleQxZmdGfcVggwkjTAK2km6gsrC9zOk-ZKFvAvw&oe=68DF1F6A" alt="Carwash Image">
    <div class="socials">
      <a href="#"><i class="fab fa-facebook-f"></i></a>
      <a href="#"><i class="fab fa-twitter"></i></a>
    </div>
  </div>

  <!-- Title -->
  <div class="title">LOGIN TO ADMIN DASHBOARD</div>

  <!-- Form -->
  <form action="../page/admin_dashboard.php" method="post">
    <div class="field">
      <input type="text" name="username" placeholder="USERNAME" required>
    </div>
    <div class="field">
      <input type="password" name="password" id="password" placeholder="PASSWORD" required>
      <button type="button" class="toggle-pass" id="togglePass"><i class="fa-regular fa-eye"></i></button>
    </div>
    <button type="submit" class="login-btn">LOGIN</button>

    <div class="extras">
      <label><input type="checkbox"> Remember Me</label>
      <a href="#">Forgot Password</a>
    </div>
    <div class="signup">
      Not a Member? <a href="#">signup</a>
    </div>
  </form>

</div>

<script>
  const pass = document.getElementById('password');
  const toggle = document.getElementById('togglePass');
  toggle.addEventListener('click', () => {
    if(pass.type === 'password'){
      pass.type = 'text';
      toggle.innerHTML = '<i class="fa-regular fa-eye-slash"></i>';
    } else {
      pass.type = 'password';
      toggle.innerHTML = '<i class="fa-regular fa-eye"></i>';
    }
  });
</script>

</body>
</html>