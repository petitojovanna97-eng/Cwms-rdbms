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

//====================== HOME INFO ======================================
class HomeInfo {
    private $conn;

    public function __construct($dbConn) {
        $this->conn; $dbConn;
    }

    public function homeInfo($ist_title, $ist_desc, $ist_img) {
        $info_result =$this->conn->query("SELECT * FROM info_st_tb ORDER BY ist_id ASC");
        if (!$info_result) {
            return "Error preparing info result: " . $this->conn->error;
        }
    }
}

class header {
    private $logo;
    private $navItems;

    public function __construct($logo, $navItems) {
        $this->logo = $logo;
        $this->navItems = $navItems;
    }

    public function render() {
        echo '<header>
        <div class="logo"><img src="https://scontent.fceb2-1.fna.fbcdn.net/v/t1.15752-9/541048493_759763299993588_5287248317119606726_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=9f807c&_nc_eui2=AeGjLdhUiHYcxF9CWG2USm2lzNlzN3dmbanM2XM3d2ZtqUbpGyjhYEUtsZYmWyATRHhXdGWmZ_8k_iT1VLi4gN5H&_nc_ohc=9fK3_MuBOS4Q7kNvwF9_P4O&_nc_oc=AdmMqVoN31IkBPmCTQlDhR05KqL6f4VgJp1UNI9BUOYumzk5-JaRgrx4f55H6DXLd6s&_nc_zt=23&_nc_ht=scontent.fceb2-1.fna&oh=03_Q7cD3AF56HPcJZg4HcGmMFRvhHZAAhjhofCyR3gcN_ySeNkQuQ&oe=68DC5DCF" alt="carwash logo"</div>
        <nav><ul>';
        foreach ($this->navItems as $name => $link) {
            $active = (basename($_SERVER['PHP_SELF']) == $link) ? "class='active'" : "";
            echo "<li $active><a href='$link'>$name</a></li>";
        }
        echo '</ul></nav>
            </header>';
    }
}

class homeVideo {
    private $video;
    private $videoBtn;

    public function __construct($video, $videoBtn) {
        $this->video = $video;
        $this->videoBtn = $videoBtn;
    }
}
// ================== Include View ==================
include("../views/index.php");
?>