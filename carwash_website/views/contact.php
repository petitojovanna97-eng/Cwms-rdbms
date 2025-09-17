<?php
    include 'nav/header.php'; 
    include '../classes/config.php';
    include '../page/ContactMessage.php';

    // ================== Handle Form Submission ==================
    $msg = "";
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $db = new Config();
        $contactManager = new ContactMessage($db->conn);
    
        $name    = $_POST['name'] ?? '';
        $message = $_POST['message'] ?? '';
        $email   = $_POST['email'] ?? '';
        $contact = $_POST['contact_number'] ?? '';
    
        $msg = $contactManager->saveMessage($name, $message, $email, $contact);
    
        $db->conn->close();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>CONTACT PAGE</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <link href="../images/img/favicon.png" rel="icon">
  <link href="../images/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="stylesheet" href="../styles/contact.css">


  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/dist/vendor2/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/dist/vendor2/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/dist/vendor2/aos/aos.css" rel="stylesheet">
  <link href="../assets/dist/vendor2/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/dist/vendor2/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="../assets/dist/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Nova
  * Template URL: https://bootstrapmade.com/nova-bootstrap-business-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="contact-page">

  <main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade" style="background-image: url(assets/img/contact-page-title-bg.jpg);">
      <div class="container">
        <h1>Contact</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="home.php">Home</a></li>
            <li class="current">Contact</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->
    
    <!-- Main Content -->
<main>
    <section class="contact-section">
      <!-- Info Panel -->
      <div class="contact-info-panel">
        <h2>Get in Touch</h2>
        <p><i class="fas fa-map-marker-alt"></i> 6501 Carwash Street, Palo Leyte, Philippines</p>
        <p><i class="fas fa-phone"></i> +63 909 652 8736</p>
        <p><i class="fas fa-envelope"></i> info@carwash.com</p>
        <p><i class="fas fa-clock"></i> Mon - Sun: 8AM - 8PM</p>
        <hr>
        <h2>Contact Us (via)</h2>
        <p><i class="fas fa-envelope"></i> vannauries07@gmail.com</p>
        <p><i class="fas fa-phone"></i> +63 909 652 8736</p>
        <p><i class="fab fa-facebook-f"></i> Zi Yhao Li</p>
        <p><i class="fab fa-twitter"></i> nana85643</p>
        <p><i class="fas fa-envelope"></i> celda46@gmail.com</p>
        <p><i class="fas fa-phone"></i> +63 976 675 9845</p>
        <p><i class="fab fa-facebook-f"></i> Beyen Bargola </p>
        <p><i class="fab fa-twitter"></i> yen73546w273</p>
      </div>

      <!-- Contact Form -->
      <div class="contact-form-panel">
        <?php if (!empty($msg)): ?>
          <p class="<?php echo (strpos($msg, 'successfully') !== false) ? 'success-msg' : 'error-msg'; ?>">
            <?php echo htmlspecialchars($msg); ?>
          </p>
        <?php endif; ?>

        <script>
          document.addEventListener('DOMContentLoaded', function () {
            const msgBox = document.querySelector('.success-msg, .error-msg');
            if (msgBox) {
              setTimeout(() => {
                msgBox.style.display = 'none';
              }, 3000);
            }
          });
        </script>

        <h3>Send Us a Message</h3>
        <form action="" method="POST">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" placeholder="Your full name" required>

          <label for="email">Email:</label>
          <input type="email" id="email" name="email" placeholder="you@example.com" required>

          <label for="contact_number">Phone Number:</label>
          <input type="tel" id="contact_number" name="contact_number" placeholder="09xx-xxx-xxxx">

          <label for="message">Message:</label>
          <textarea id="message" name="message" placeholder="Write your message..." required></textarea>

          <button type="submit" id="sendBtn" class="send-message-btn">📨 Send Message</button>
        </form>
        <!-- ⭐ Rating System -->
        <div class="rating-container">
          <p><strong>Rate Us:</strong></p>
          <div class="stars">
            <i class="fa-regular fa-star" data-value="1"></i>
            <i class="fa-regular fa-star" data-value="2"></i>
            <i class="fa-regular fa-star" data-value="3"></i>
            <i class="fa-regular fa-star" data-value="4"></i>
            <i class="fa-regular fa-star" data-value="5"></i>
          </div>
          <button class="send-rating-btn">⭐ Send Rating</button>
        </div>
      </div>
    </section>
      <script>
        const stars = document.querySelectorAll('.star');
        const result = document.getElementById('result');
        let rating = 0;
            
        stars.forEach(star => {
          star.addEventListener('click', () => {
            rating = star.getAttribute('data-value');
            result.textContent = Your rating: ${rating};
          
            // reset all stars
            stars.forEach(s => s.classList.remove('selected'));
          
            // color selected stars
            for (let i = 0; i < rating; i++) {
              stars[i].classList.add('selected');
            }
          });
        });
      </script>
      </section>     
    </div>

  </main>
  <!-- Map -->
    <div class="map-container">
      <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31307.505197212827!2d124.971!3d11.1585!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3307d866894e412b%3A0xc082c3e9eed24333!2sPalo%2C%20Leyte!5e0!3m2!1sen!2sph!4v1693600000000!5m2!1sen!2sph" 
        width="100%" 
        height="300" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade">
      </iframe>
    </div>
  </main>

<?php
	include 'nav/footer.php';
?>