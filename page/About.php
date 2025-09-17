<?php
// --- Page Class ---
class Page {
    private $title;
    private $sections = [];

    public function __construct($title) {
        $this->title = $title;
    }

    public function addSection($section) {
        $this->sections[] = $section;
    }
  }

// --- Section Class ---
class Section {
    private $title;
    private $content;

    public function __construct($title, $content) {
        $this->title = $title;
        $this->content = $content;
    }

    public function render() {
        return "
        <section>
          <h2>{$this->title}</h2>
          {$this->content}
        </section>";
    }
}

// --- Create About Us Page ---
$page = new Page("About Us - Car Wash");

// Add Story Section
$storyContent = '
  <img src="https://www.goodsight.com.au/wp-content/uploads/2022/08/car-wash-installation-parkes-1d.jpg" alt="Car wash facility" class="main-photo">
  <div class="story-box"><p>We started our journey with a mission to provide eco-friendly and high-quality car wash services. Our values focus on customer satisfaction, reliability, and innovation.</p></div>
  <div class="story-box"><p>Our philosophy is simple: if we wouldn’t be proud to drive it, it’s not done yet. Each car is treated with attention to detail, from the wheels to the windshield. Our team is trained not only in the latest cleaning techniques but also in customer service, ensuring every visit is worth your time.</p></div>
  <div class="story-box"><p>Our journey began with a simple idea: every car deserves care, and every customer deserves respect. From our very first wash, we committed to providing a service that goes beyond cleaning we aim to create a positive experience. Over the years, we’ve built strong relationships with our customers by listening to their needs, maintaining consistent quality, and always delivering with a smile.</p></div>
  <div class="story-box"><p>At the heart of our car wash is a commitment to the environment. We introduced water-saving technologies and eco-friendly cleaning products that minimize waste without compromising results. Every wash you choose with us helps conserve water and reduce harmful chemical use, making your clean car part of a cleaner future.</p></div>
  <div class="story-box"><p>What started as a small neighborhood car wash has grown into a trusted brand in the community. Our success is built on the support of our loyal customers and the dedication of our hardworking team. We continue to innovate and expand our services, but we never lose sight of our roots being a friendly, reliable, and affordable car wash that feels like family.</p></div>
  <div class="story-box"><p>We’re not just washing cars we’re building a brand that represents quality, trust, and sustainability. As we look ahead, we aim to introduce more advanced technologies, expand our services, and continue leading the way in eco-friendly car care. Our vision is to set a new standard for car wash services in the industry.</p></div> 
  ';
$page->addSection(new Section("Our Story", $storyContent));

// Add Team Section
$teamContent = '
  <div class="team-members">
    <div class="team-member-card">
      <img src="https://cdn.pixabay.com/photo/2023/02/07/10/49/ai-generated-7773820_1280.jpg" alt="Team Member 1">
      <h3>Beyen Bargola</h3>
      <p>Founder & CEO</p>
    </div>
    <div class="team-member-card">
      <img src="https://cdn.pixabay.com/photo/2023/01/22/11/49/girl-7736189_1280.jpg" alt="Team Member 2">
      <h3>Jovanna Petito</h3>
      <p>Operations Manager</p>
    </div>
  </div>
';
$page->addSection(new Section("Meet the Team", $teamContent));

// Add Facility Section
$facilityContent = '
  <div class="facility-photos">
    <img src="https://gophoenixclean.com/wp-content/uploads/Car-Wash-Cleaning.jpg" alt="Car wash bay">
    <img src="https://rightlook.com/wp-content/uploads/2022/07/rightlook_supplies_equipment_callout_hero.png" alt="Cleaning equipment">
  </div>
  <p>Our facility is equipped with the latest technology to ensure your vehicle gets the best care possible.</p>
  <p>From advanced cleaning systems to professional-grade tools, our facility is designed to deliver a spotless finish every time.</p>
  <p>Our state-of-the-art facility combines modern equipment with eco-friendly practices, giving your car the care it deserves.</p>
';
$page->addSection(new Section("Our Facility", $facilityContent));
     

include '../views/about.php';
?>