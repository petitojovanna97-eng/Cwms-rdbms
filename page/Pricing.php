<?php
class PricingCard {
    private $title;
    private $icon;
    private $price;
    private $features;
    private $color;
    private $highlight;

    public function __construct($title, $icon, $price, $features, $color, $highlight = false) {
        $this->title = $title;
        $this->icon = $icon;
        $this->price = $price;
        $this->features = $features;
        $this->color = $color;
        $this->highlight = $highlight;
    }
  }

class ServiceCard {
    private $icon;
    private $title;
    private $price;

    public function __construct($icon, $title, $price) {
        $this->icon = $icon;
        $this->title = $title;
        $this->price = $price;
    }

    public function render() {
        echo '<div class="service-card">
                <i class="fas ' . $this->icon . '"></i>
                <h3>' . $this->title . '</h3>
                <div class="price">₱' . $this->price . '</div>
              </div>';
    }
}

class FlipCard {
    private $title;
    private $price;
    private $desc;

    public function __construct($title, $price, $desc) {
        $this->title = $title;
        $this->price = $price;
        $this->desc = $desc;
    }

    public function render() {
        echo '<div class="flipcard-container">
                <div class="flipcard">
                  <div class="flipcard-front">
                    <h3>' . $this->title . '</h3>
                    <button class="btn btn-warning">₱' . $this->price . '</button>
                  </div>
                  <div class="flipcard-back">
                    <p>' . $this->desc . '</p>
                  </div>
                </div>
              </div>';
    }
}


// ========================
// Page Content
// ========================

$packages = [
    new PricingCard("Basic Wash", "fa-car", 150, ["Exterior Wash", "Tire Cleaning", "Quick Dry"], "linear-gradient(to right,#d4a938,#f0c54f)"),
    new PricingCard("Premium Wash", "fa-gem", 300, ["Exterior & Interior Wash", "Vacuuming", "Wax Finish"], "linear-gradient(to right,#333,#555)", true),
    new PricingCard("VIP Package", "fa-crown", 500, ["Full Detailing", "Interior Deep Clean", "Free Air Freshener"], "linear-gradient(to right,#444,#666)")
];

$services = [
    new ServiceCard("fa-spray-can", "Exterior Wash", 200),
    new ServiceCard("fa-wind", "Interior Vacuum", 300),
    new ServiceCard("fa-car-side", "Tire Shine", 150)
];

$flipcards = [
    new FlipCard("Waxing", 500, "Protect your car’s paint and give it a long-lasting shine."),
    new FlipCard("Headlight Restoration", 450, "Improve visibility and make headlights look brand new.")
];

  include '../views/pricing.php';
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>