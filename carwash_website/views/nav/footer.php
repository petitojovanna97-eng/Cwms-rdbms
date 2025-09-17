<footer id="footer" class="footer light-background">

<div class="footer-top">
  <div class="container">
    <div class="row gy-4">
      <div class="col-lg-5 col-md-12 footer-about">
        <a href="index.html" class="logo d-flex align-items-center">
          <span class="sitename">Car Wash</span>
        </a>
        <p>Experience the best car wash service to make your car shine like new. Fast, affordable, and high-quality cleaning.</p>
        <div class="social-links d-flex mt-4">
          <a href=""><i class="bi bi-twitter-x"></i></a>
          <a href=""><i class="bi bi-facebook"></i></a>
          <a href=""><i class="bi bi-instagram"></i></a>
          <a href=""><i class="bi bi-linkedin"></i></a>
        </div>
      </div>

      <div class="col-lg-2 col-6 footer-links">
        <h4>Useful Links</h4>
        <ul>
          <li><a href="home.php">Home</a></li>
          <li><a href="about.php">About us</a></li>
          <li><a href="services.php">Services</a></li>
          <li><a href="booking.php">Booking</a></li>
        </ul>
      </div>

      <div class="col-lg-2 col-6 footer-links">
        <h4>Our Services</h4>
        <ul>
          <li><a href="#">Web Design</a></li>
          <li><a href="#">Web Development</a></li>
          <li><a href="#">Product Management</a></li>
          <li><a href="#">Marketing</a></li>
          <li><a href="#">Graphic Design</a></li>
        </ul>
      </div>

      <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
        <h4>Contact Us</h4>
        <p>6501 Palo,Leyte</p>
        <p>New York, NY 535022</p>
        <p>United States</p>
        <p class="mt-4"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
        <p><strong>Email:</strong> <span>info@example.com</span></p>
      </div>

    </div>
  </div>
</div>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <!-- Fonts & Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<style>
/* ========== Footer Styling ========== */
.site-footer {
  background-color: #1a1a1a; /* fallback if .footer-bg-color not set */
  color: #f1f1f1; /* fallback if .footer-text-color not set */
  padding: 3rem 0 1.5rem;
  font-size: 15px;
  line-height: 1.6;
}

.site-footer a {
  color: inherit;
  text-decoration: none;
  transition: all 0.3s ease-in-out;
}

.site-footer a:hover {
  color: #007bff; /* Accent color */
  text-decoration: underline;
}

/* Headings */
.site-footer .h1,
.site-footer .h3,
.site-footer .h4 {
  font-weight: 700;
  letter-spacing: 1px;
}

.site-footer .h6 {
  font-size: 0.9rem;
  color: #ccc;
}

/* Subscribe Section */
#footer-subscribe .h1 {
  font-size: 1.8rem;
}

#footer-subscribe .h6 {
  font-size: 1rem;
}

#footer-subscribe-btn,
#footer-renew-btn {
  font-size: 0.85rem;
  padding: 0.8rem 1.5rem;
  border-radius: 50px;
  transition: all 0.3s ease-in-out;
}

#footer-subscribe-btn:hover {
  background-color: #0056b3;
  color: #fff;
}

#footer-renew-btn:hover {
  background-color: #007bff;
  color: #fff;
  border-color: #007bff;
}

/* Brands Section */
.brands-hr {
  border-top: 1px solid #444;
}

.monogram-logos {
  list-style: none;
}

.monogram img {
  filter: brightness(0) invert(1); /* white logos */
  transition: transform 0.3s ease-in-out;
}

.monogram img:hover {
  transform: scale(1.1);
}

/* Contact & Info Section */
.footer-logo {
  max-width: 220px;
  height: auto;
}

.footer-location ul {
  margin: 0;
  padding: 0;
}

.footer-location li {
  margin-bottom: 4px;
}

/* About Links */
#menu-about li a {
  color: #ccc;
  font-size: 0.9rem;
}

#menu-about li a:hover {
  color: #fff;
}

/* Social Icons */
.footer-connect .monogram {
  width: 35px;
  height: 35px;
  border-radius: 50%;
  background: #fff;
  transition: all 0.3s ease;
}

.footer-connect .monogram a {
  font-size: 1rem;
}

.footer-connect .monogram:hover {
  background: #007bff;
}

.footer-connect .monogram:hover a {
  color: #fff !important;
}

/* Related Links */
.be-ix-link-block {
  margin-top: 2rem;
  padding-top: 1rem;
  border-top: 1px solid #444;
}

.be-label {
  font-weight: bold;
  margin-bottom: 0.5rem;
}

.be-list {
  list-style: none;
  padding: 0;
  margin: 0;
}

.be-list li {
  margin-bottom: 0.5rem;
}

.be-related-link {
  color: #bbb;
  transition: all 0.3s ease;
}

.be-related-link:hover {
  color: #fff;
  text-decoration: underline;
}

/* Bottom Border */
.site-footer .w-100 {
  margin-top: 1.5rem;
  border-color: #007bff !important;
}

/* Responsive */
@media (max-width: 767px) {
  .site-footer {
    text-align: center;
  }

  #footer-subscribe-btn,
  #footer-renew-btn {
    width: 100%;
    margin: 0.3rem 0;
  }

  .footer-connect .monogram-logos {
    justify-content: center;
  }

  .footer-logo {
    margin: 0 auto 1rem;
  }
}
</style>
<footer class="site-footer roboto-condensed footer-bg-color footer-text-color" id="colophon">
  <div class="wrapper pb-0" id="wrapper-footer">
    <div class="container">

      <!-- Subscribe Section -->
      <div class="row">
        <div class="col-lg-6 col-12">
          <div id="footer-subscribe" class="footer-subscribe widget-area">
            <div class="h1 text-uppercase mb-1 lh-1">Subscribe to our Newsletter</div>
            <div class="h6 fw-normal mb-1 lh-1">Get the latest update from our eNewsletters</div>
          </div>
        </div>
        <div class="col-lg-6 col-12 text-lg-end">
          <a id="footer-subscribe-btn" class="btn subscribe-bg-color subscribe-text-color btn-xl w-175 text-uppercase" href="../page/About.php">Subscribe</a>
          <a id="footer-renew-btn" class="btn border border-2 renew-bg-color renew-text-color btn-xl w-175 ms-3 text-uppercase" href="../page/Contact.php">Renew</a>
        </div>
      </div>

      <hr>

      <!-- Brands Section -->
      <div class="row mt-2 mb-2">
        <div class="col-12 text-center">
          <div class="brands-hr py-2">
            <div id="footer-brands" class="footer-brands widget-area">
              <div class="h3 text-uppercase mb-1 lh-1">Our Brands</div>
              <div class="h6 fw-normal mb-1 lh-1">Visit our other Brands to drive your success</div>
            </div> 
      <hr>

      <!-- Related Links -->
      <div class="row mt-3">
        <div class="be-ix-link-block">
          <div class="be-related-link-container container">
            <div class="be-label">Also of Interest</div>
            <p class="be-list">
              <p><a class="be-related-link" href="">Blogs</a></p>
              <p><a class="be-related-link" href="">6 Factors Impacting Wash Quality At A Modern Carwash</a></p>
          </p>
          </div>
        </div>
      </div>
      <p>&copy; <?php echo date("Y-d-m");?> Car Wash. All Rights Reserved.</p>
    <p>Made with ❤️ in Leyte | <a href="../page/Home.php">Back to Home</a></p>

    </div><!-- container -->
  </div><!-- wrapper -->

  <div class="w-100 mt-2 border border-2 border-primary"></div>
</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="../assets/dist/vendor2/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/dist/vendor2/php-email-form/validate.js"></script>
<script src="../assets/dist/vendor2/aos/aos.js"></script>
<script src="../assets/dist/vendor2/glightbox/js/glightbox.min.js"></script>
<script src="../assets/dist/vendor2/swiper/swiper-bundle.min.js"></script>
<script src="../assets/dist/vendor2/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="../assets/dist/vendor2/isotope-layout/isotope.pkgd.min.js"></script>

<!-- Main JS File -->
<script src="../assets/dist/js/main2.js"></script>


</body>

</html>