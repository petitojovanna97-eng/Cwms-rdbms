<?php
    include 'nav/header.php';
    include_once '../model/BookingModel.php';
    $model = new BookingModel();
    $services = $model->get_service();
 
?>


<body class="index-page">

  

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <img src="../img/wash.jpg" alt="" data-aos="fade-in">

      <div class="container">
        <div class="row">
          <div class="col-xl-4">
            <h1 data-aos="fade-up">
              <div class="text-image " style="position: relative; padding-top: 300px;">
                  <img src="../img/was.png" alt="">
              </div>
            </h1>
            
            <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            </div>
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- Why Us Section -->
    <section id="why-us" class="why-us section">

      <div class="container">

        <div class="row g-0">

          <div class="col-xl-5 img-bg" data-aos="fade-up" data-aos-delay="100">
            <video src="../img/video/cwms.mp4" loop autoplay muted playsinline></video> 
          </div>

          <div class="col-xl-7 slides position-relative" data-aos="fade-up" data-aos-delay="200">

            <div class="swiper init-swiper">
              <script type="application/json" class="swiper-config">
                {
                  "loop": true,
                  "speed": 600,
                  "autoplay": {
                    "delay": 5000
                  },
                  "slidesPerView": "auto",
                  "centeredSlides": true,
                  "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                  },
                  "navigation": {
                    "nextEl": ".swiper-button-next",
                    "prevEl": ".swiper-button-prev"
                  }
                }
              </script>
              <div class="swiper-wrapper">

              <div class="swiper-slide">
                <div class="item">
                  <h3 class="mb-3">Grow your car wash business with us</h3>
                  <h4 class="mb-3">Optimize your services and stand out in the competitive market.</h4>
                  <p>Running a successful car wash business requires attention to detail, top-notch service, and the ability to adapt to customer needs. By focusing on high-quality equipment, eco-friendly practices, and exceptional customer service, your business can become the go-to choice for every car owner in town.</p>
                </div>
              </div><!-- End slide item -->

              <div class="swiper-slide">
                <div class="item">
                  <h3 class="mb-3">Innovation drives your car wash growth</h3>
                  <h4 class="mb-3">Embrace new technologies and provide excellent customer care.</h4>
                  <p>Innovation and efficient technology are key in the car wash business. By integrating automated systems, optimizing water usage, and offering additional services like waxing or detailing, you can significantly boost customer satisfaction and improve operational efficiency.</p>
                </div>
              </div><!-- End slide item -->

              <div class="swiper-slide">
                <div class="item">
                  <h3 class="mb-3">Stand out in the competitive car wash industry</h3>
                  <h4 class="mb-3">Improve service offerings and keep customers coming back.</h4>
                  <p>To stand out in a competitive car wash industry, it’s essential to constantly improve your service offerings. By focusing on customer retention strategies, introducing loyalty programs, and keeping up with the latest trends in eco-friendly car care, you can ensure long-term success and growth.</p>
                </div>
              </div><!-- End slide item -->

              <div class="swiper-slide">
                <div class="item">
                  <h3 class="mb-3">Enhance customer experience for better results</h3>
                  <h4 class="mb-3">Provide fast, quality service in a clean, welcoming environment.</h4>
                  <p>Improving your car wash business also means improving customer experience. By offering personalized services, efficient turnarounds, and maintaining a clean, welcoming environment, you can enhance customer satisfaction and drive repeat business.</p>
                </div>
              </div><!-- End slide item -->


              </div>
              <div class="swiper-pagination"></div>
            </div>

            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
          </div>

        </div>

      </div>

    </section><!-- /Why Us Section -->
     
    

    </section><!-- /Services Section -->
  </main>
  <!-- Info Section -->
  <div class="container info-section">
    <div class="row">
      <div class="col-sm-4">
        <img src="https://erp.shineclean-kw.com/uploads/67e89a7863aa8.jpg" alt="Service 1">
        <h2>Fast Service</h2>
        <p>We provide quick and reliable car wash services.</p>
      </div>
      <div class="col-sm-4">
        <img src="https://washhounds.com/wp-content/uploads/221806110_m_normal_none.webp" alt="Service 2">
        <h2>Eco-Friendly</h2>
        <p>Our car wash is safe for the environment.</p>
      </div>
      <div class="col-sm-4">
        <img src="https://tse4.mm.bing.net/th/id/OIP.09JvCMO7E5mJSLxhSnz7qgHaE8?pid=Api&h=220&P=0" alt="Service 3">
        <h2>Interior Cleaning</h2>
        <p>Thorough cleaning for a spotless interior.</p>
      </div>
    </div>
  </div>

  <!-- Why Choose Us -->
  <div class="container info-section why-choose">
    <h2>Why Choose Us?</h2>
    <p style="max-width:800px; margin:auto;">
      At <strong>Car Wash</strong>, we take pride in delivering top-notch service with a smile. 
      From fast exterior washes to full interior detailing, our goal is to make your car look brand new every time.
    </p>
    <div class="row" style="margin-top:30px;">
      <div class="col-sm-3">
      <img src="https://washfactory.com/wp-content/uploads/2024/06/car-wash-roy-utah.jpg.webp" alt="Service 1">
        <i class="fas fa-users fa-2x"></i>
        <h4>Experienced Team</h4>
        <p>Our professional crew knows cars inside out.</p>
      </div>
      <div class="col-sm-3">
      <img src="https://hips.hearstapps.com/vader-prod.s3.amazonaws.com/1677510971-meguiar-s-1677510947.jpg?crop=0.669xw:1.00xh;0.176xw,0&resize=980:*" alt="Service 1">
        <i class="fas fa-leaf fa-2x"></i>
        <h4>Premium Products</h4>
        <p>We use only high-quality, eco-friendly cleaning solutions.</p>
      </div>
      <div class="col-sm-3">
      <img src="https://tse4.mm.bing.net/th/id/OIP.Vj6rpnhDqm9V1iFhttJswgHaDx?pid=Api&P=0&h=220" alt="Service 1">
        <i class="fas fa-tags fa-2x"></i>
        <h4>Affordable Pricing</h4>
        <p>Get a sparkling clean car without breaking the bank.</p>
      </div>
      <div class="col-sm-3">
      <img src="https://i.pinimg.com/736x/bc/c6/67/bcc667055bfbdd4a993e4478063c7c88.jpg" alt="Service 1">
        <i class="fas fa-star fa-2x"></i>
        <h4>Customer Satisfaction</h4>
        <p>Your happiness is our #1 priority, guaranteed!</p>
      </div>
    </div>
  </div>

  <!-- Call to Action -->
  <div class="info-section" style="background:#d4a938; color:white; padding:50px 20px; margin-top:50px;">
    <h2>Ready to Give Your Car a Shine?</h2>
    <p>Visit us today or book an appointment online to experience the best car wash service.</p>
    <script>
      $(document).on("click", "#LearnMoreBtn", function () {
        alert("Are You Sure, You Really Want To Learn More?...");
      })
    </script>
    <a href="../page/About.php" id="LearnMoreBtn" class="btn btn-dark btn-lg" style="background:#222; border:none; margin-top:15px;">
      Learn More!...
    </a>
  </div>


<!-- ✅ Bootstrap JS (needed for modal to work) -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

 <?php
    include 'nav/footer.php';
 ?>