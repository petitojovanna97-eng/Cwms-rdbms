<?php
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $database = new Database();
    $db = $database->getConnection(); // ✅ Now using getter

    $auth = new Auth($db);

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if ($auth->login($username, $password)) {
        // Redirect to dashboard if login successful
        header("Location: ../page/dashboard.php");
        exit();
    } else {
        $message = "Invalid username or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Admin Login</title>

  <!-- Fonts & Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <style>
    :root{
      --brand:#0aa53b;
      --border:#dcdfe4;
    }
    body{
      margin:0;
      font-family:"Inter",sans-serif;
      display:flex;
      justify-content:center;
      align-items:center;
      min-height:100vh;
      background: linear-gradient(120deg, #1f1c2c, #928dab);
    }
    .login-card{
      width: 420px;
      background:#fff;
      border:1px solid #ccc;
      border-radius:16px;
      overflow:hidden;
      box-shadow:0 8px 24px rgba(0,0,0,.2);
      animation: fadeIn 1s ease-in-out;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .top-img img{
      display:block;
      width:100%;
      height:200px;
      object-fit:cover;
    }

    .title{
      text-align:center;
      font-weight:bold;
      padding:20px;
      font-size:20px;
      border-top:1px solid #ccc;
      border-bottom:1px solid #ccc;
      background: linear-gradient(270deg, blue, red, yellow, white, green);
      background-size: 800% 800%;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      animation: colorShift 8s ease infinite;
    }
    @keyframes colorShift {
      0%{background-position:0% 50%;}
      50%{background-position:100% 50%;}
      100%{background-position:0% 50%;}
    }

    form{ padding:20px; }
    .field{
      margin-bottom:18px;
      position:relative;
    }
    .field input{
      width:100%;
      padding:12px 14px;
      border:1px solid var(--border);
      border-radius:10px;
      transition:0.3s;
    }
    .field input:focus{
      border-color:#007bff;
      box-shadow:0 0 8px rgba(0,123,255,.4);
      outline:none;
    }

    .toggle-pass{
      position:absolute;
      right:10px;
      top:50%;
      transform:translateY(-50%);
      border:none;
      background:transparent;
      cursor:pointer;
      color:#666;
      font-size:18px;
    }
    .btn-close{
      position:absolute;
      right:-90px;
      top:50%;
      transform:translateY(-50%);
      padding:8px 14px;
      background:#ff4d4d;
      border:none;
      border-radius:8px;
      color:#fff;
      cursor:pointer;
      font-size:13px;
      transition:all .3s ease;
    }
    .btn-close:hover{
      background:#cc0000;
      transform:translateY(-50%) scale(1.05);
    }

    button.login-btn{
      width:100%;
      padding:14px;
      background:linear-gradient(135deg, #007bff, #00d084);
      color:#fff;
      font-weight:bold;
      border:none;
      border-radius:12px;
      cursor:pointer;
      font-size:16px;
      box-shadow:0 4px 12px rgba(0,0,0,.2);
      transition: all .3s ease;
    }
    button.login-btn:hover{
      transform: scale(1.05);
      box-shadow:0 6px 18px rgba(0,0,0,.3);
    }

    .extras{
      display:flex;
      justify-content:space-between;
      align-items:center;
      font-size:14px;
      margin-top:12px;
    }
    .extras a{
      color:#007bff;
      text-decoration:none;
    }
    .extras a:hover{
      text-decoration:underline;
    }

    .signup{
      text-align:center;
      margin-top:15px;
      font-size:14px;
    }
    .signup a{ 
      color:#ff6600; 
      font-weight:bold;
      text-decoration:none; 
    }
    .signup a:hover{ 
      text-decoration:underline; 
    }
  </style>
</head>
<body>

<div class="login-card">

  <!-- Carwash Image -->
  <div class="top-img">
    <img src="https://scontent.fceb6-3.fna.fbcdn.net/v/t1.15752-9/541218467_1292119009050103_8926888087627129792_n.png?_nc_cat=106&ccb=1-7&_nc_sid=9f807c&_nc_eui2=AeEKro9GNRPZ-YvxzHlh7F_kX5Ou5Oe54c9fk67k57nhz7Gjm6a55XZdvsuU06KDrJ95rSiFnRjXvAhHGXP1yYFr&_nc_ohc=-5Kx93sjX0IQ7kNvwEcIB0g&_nc_oc=AdlL2ObNr8nT13_NRYewEAJHKYY7fhpVk4gA-vZoKkpHP7RZVM34Laj4y0gpWMC2lAU&_nc_zt=23&_nc_ht=scontent.fceb6-3.fna&oh=03_Q7cD3QHDWoGleQxZmdGfcVggwkjTAK2km6gsrC9zOk-ZKFvAvw&oe=68DF1F6A" alt="Carwash Image">
  </div>

  <!-- Title -->
  <div class="title">LOGIN TO ADMIN DASHBOARD</div>
  <?php if (!empty($message)): ?>
      <p style="color:red; text-align:center;"><?php echo htmlspecialchars($message); ?></p>
  <?php endif; ?>

  <!-- Form -->
  <form action="../server/dashboard.php" method="post">
    <div class="field">
      <input type="text" name="username" placeholder="USERNAME" required>
    </div>
    <div class="field">
      <input type="password" name="password" id="password" placeholder="PASSWORD" required>
      <button type="button" class="toggle-pass" id="togglePass"><i class="fa-regular fa-eye"></i></button>
      <button type="button" class="btn-close" onclick="window.location.href='../page/Home.php'">Cancel</button>
    </div>
    <button type="submit" class="login-btn">LOGIN</button>

    <div class="extras">
      <label><input type="checkbox"> Remember Me</label>
      <a href="#">Forgot Password</a>
    </div>
    <div class="signup">
      Not a Member? <a href="#">Signup</a>
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