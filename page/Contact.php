<?php
session_start(); // ✅ Always start session at the very top

// ================== Database Class ==================
class Database {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbname = "cwms_db";
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if ($this->conn->connect_error) {
            die(" Connection failed: " . $this->conn->connect_error);
        }
    }
}

// ================== Contact Manager ==================
class ContactManager {
    private $conn;

    public function __construct($dbConn) {
        $this->conn = $dbConn;
    }

    public function saveMessage($name, $message, $email, $contact) {
        $stmt = $this->conn->prepare("INSERT INTO contact_messages_tb (name, message, email, contact_number) VALUES (?, ?, ?, ?)");
        if (!$stmt) {
            return "Error preparing statement: " . $this->conn->error;
        }

        $stmt->bind_param("ssss", $name, $message, $email, $contact);
        if ($stmt->execute()) {
            return "Message sent successfully!";
        } else {
            return "Error: " . $stmt->error;
        }
    }
}
class ContactPage {
    private $title;

    public function __construct($title = "Contact Us - Car Wash") {
        $this->title = $title;
    }

    // --- Header Section ---
    private function renderHeader() {
        return <<<HTML
        <header>
            <div class="logo">
                <img src="https://scontent.fceb2-1.fna.fbcdn.net/v/t1.15752-9/541048493_759763299993588_5287248317119606726_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=9f807c&_nc_eui2=AeGjLdhUiHYcxF9CWG2USm2lzNlzN3dmbanM2XM3d2ZtqUbpGyjhYEUtsZYmWyATRHhXdGWmZ_8k_iT1VLi4gN5H&_nc_ohc=9fK3_MuBOS4Q7kNvwF9_P4O&_nc_oc=AdmMqVoN31IkBPmCTQlDhR05KqL6f4VgJp1UNI9BUOYumzk5-JaRgrx4f55H6DXLd6s&_nc_zt=23&_nc_ht=scontent.fceb2-1.fna&oh=03_Q7cD3AF56HPcJZg4HcGmMFRvhHZAAhjhofCyR3gcN_ySeNkQuQ&oe=68DC5DCF" alt="Car Wash Logo">
            </div>
            <nav>
                <ul>
                    <li><a href="Home.php">Home</a></li>
                    <li><a href="Services.php">Services</a></li>
                    <li><a href="Pricing.php">Pricing</a></li>
                    <li class="active"><a href="Contact.php">Contact</a></li>
                    <li><a href="About.php">About Us</a></li>
                    <li><a href="../page/Authentication.php">Login</a></li>
                </ul>
            </nav>
        </header>
        HTML;
    }

    // --- Contact Info Panel ---
    private function renderContactInfo() {
        return <<<HTML
        <div class="contact-info-panel">
            <h2>Get in Touch</h2>
            <p><i class="fas fa-map-marker-alt"></i> 6501 Carwash Street, Palo Leyte, Philippines</p>
            <p><i class="fas fa-phone"></i> +63 909 652 8736</p>
            <p><i class="fas fa-envelope"></i> info@carwash.com</p>
            <p><i class="fas fa-clock"></i> Mon - Sun: 8AM - 8PM</p>
            <hr>
            <h2>Contact Us (via)</h2>
            <p><i class="fas fa-envelope"></i> email:</p>
            <p><i class="fas fa-phone"></i> +63 909 652 8736</p>
            <p><i class="fas fa-envelope"></i> vannauries07@gmail.com</p>
            <p><i class="fas fa-clock"></i> Mon - Sun: 8AM - 8PM</p>
            <p>or</p>
            <p><i class="fas fa-envelope"></i> email:</p>
            <p><i class="fas fa-phone"></i> +63 876 675 9845</p>
            <p><i class="fas fa-envelope"></i> celda46@gmail.com</p>
            <p><i class="fas fa-clock"></i> Mon - Sun: 8AM - 8PM</p>
        </div>
        HTML;
    }

    // --- Contact Form Panel ---
    private function renderContactForm() {
        return <<<HTML
        <div class="contact-form-panel">
            <h3>Send Us a Message</h3>
            <form action="#" method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Your full name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="you@example.com" required>

                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" placeholder="09xx-xxx-xxxx">

                <label for="message">Message:</label>
                <textarea id="message" name="message" placeholder="Write your message..." required></textarea>

                <button type="submit" class="send-message-btn">📨 Send Message</button>
            </form>
        </div>
        HTML;
    }

    // --- Contact Ratings ---
    private function renderContactRatings() {
        return <<<HTML
        <div class="contact-rating's-panel">
        <h2>Client's Rating</h2>
        <div class="review">
          <p>"Best car wash in town! My car looks brand new every time."</p>
          <div class="stars">⭐⭐⭐⭐⭐</div>
          <small>- Juan D.</small>
        </div>
        <div class="review">
          <p>"Amazing service! My car looks spotless and smells great!"</p>
          <div class="stars">⭐⭐⭐⭐⭐</div>
          <small>- Maria S.</small>
        </div>
        <div class="review">
          <p>"Fast, friendly, and affordable. Highly recommend!"</p>
          <div class="stars">⭐⭐⭐⭐</div>
          <small>- Carlo P.</small>
        </div>
        </div>
        HTML;
    }

    // --- Google Map Section ---
    private function renderMap() {
        return <<<HTML
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
        HTML;
    }

    // --- Full Page Renderer ---
    public function renderPage() {
        echo <<<HTML
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>{$this->title}</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
            <link rel="stylesheet" href="../styles/contact.css"> <!-- External CSS for styling -->
        </head>
        <body>
            {$this->renderHeader()}
            <main>
                <section class="contact-section">
                    {$this->renderContactInfo()}
                    {$this->renderContactForm()}
                </section>
                {$this->renderMap()}
            </main>
            {$this->renderFooter()}
        </body>
        </html>
        HTML;
    }
}

// ================== Initialize ==================
$db = new Database();

$msg = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name    = $_POST['name'] ?? '';
    $message = $_POST['message'] ?? '';
    $email   = $_POST['email'] ?? '';
    $contact = $_POST['contact'] ?? '';

}
// ================== Include View ==================
include("../views/contact.php");
?>