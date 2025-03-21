<?php
session_start();

// Import classes using namespaces
use Backend\Config;
use Frontend\Navbar;

// Include Composer's autoloader
require_once '../vendor/autoload.php';

// Verify the Config class is loaded
if (!class_exists(Config::class)) {
    die("Error: Config class not found. Check your autoloading setup.");
}

// Redirect already logged in users to the dashboard
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}

// Establish a database connection using the Config class
$dbConnection = Config::getDbConnection();
if (!$dbConnection) {
    die("Error: Failed to connect to the database.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Muruugi Primary Schools - Home</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="index-page">
  <?php
  // Render the external navbar if it exists
  if (class_exists('Frontend\Navbar')) {
      Navbar::render();
  } else {
      echo "<p style='color: red;'>Error: Navbar class not found.</p>";
  }
  ?>

  <div class="container">
    <header>
      <div class="logo-container">
        <a href="index.php" class="logo">
          <img src="assets/image/logo.png" alt="Muruugi Logo">
        </a>
      </div>
      <marquee class="marquee"><span>MURUUGI PRIMARY SCHOOL</span></marquee>
      <div class="dropdown-container">
        <div class="dropdown">
          <button class="dropbtn">
            <img src="assets/image/toogle-icon.png" alt="Menu Toggle">
          </button>
          <div class="dropdown-content">
            <a href="index.php">Home</a>
            <a href="about.php">About</a>
            <a href="courses.php">Courses</a>
            <a href="admissions.php">Admission</a>
            <a href="contact.php">Contact</a>
            <a href="admin_login.php">HEADTEACHER LOGIN</a>
          </div>
        </div>
      </div>
      <h1>Welcome to Muruugi Primary Schools</h1>
      <p>Empowering young minds through excellence in education.</p>
    </header>

    <section id="home-content">
      <p>
        Our website provides information on our curriculum, admissions, fee payment, and performance reports. Explore our pages to learn more!
      </p>
    </section>

    <main>
      <section>
        <h2 id="enrol">
          ENROLMENT ONGOING: KINDERGARTEN, PRIMARY &amp; INTERNATIONAL SCHOOL – BOOK YOUR SLOT NOW FOR THE 2024 INTAKE
        </h2>
        <h1 id="welcome">WELCOME TO MURUUGI PRIMARY SCHOOL</h1>
        <div class="video-container">
          <video id="bg-video" autoplay loop muted>
            <source src="assets/image/WhatsApp Video 2024-03-24 at 17.13.28_9ae85719.mp4" type="video/mp4">
            Your browser does not support the video tag.
          </video>
        </div>
        <section class="ethos-section">
          <h1 id="ethos">Our Ethos</h1>
          <p id="ethos-p">
            Our unwavering dedication lies in fostering significant academic progress and learner well-being while maintaining affordability. We leverage data-driven insights and cutting-edge technology to ensure every learner reaches their full potential.
          </p>
          <div class="ethos-boxes">
            <div class="box box1">
              <h3>Significant Academic Progress</h3>
              <p>
                Leveraging data-driven insights, we ensure incremental competency development using global standards in curriculum delivery.
              </p>
            </div>
            <div class="box box2">
              <h3>Pastoral Care</h3>
              <p>
                We prioritize learner happiness by instilling discipline, leadership, and strong moral values in a nurturing environment.
              </p>
            </div>
            <div class="box box3">
              <h3>Affordability</h3>
              <p>
                Efficient operations and aspirational amenities enable us to provide high-quality education at an affordable cost.
              </p>
            </div>
          </div>
        </section>
      </section>

      <div class="mid">
        <h4>Primary Education</h4>
        <div class="mid-img">
          <img src="assets/image/img-4.png" alt="Primary Education">
        </div>
        <p id="mid-s">
          Grade One to Five: Nurturing young hearts and minds for a promising future. Join us for an enriching Upper Primary journey.
        </p>

        <h4>Why Choose Us?</h4>
        <div class="mid-img">
          <img src="assets/image/img-4.png" alt="Why Choose Us">
        </div>
        <p id="mid-s">
          Our commitment ensures thriving learners through essential life skills, co-curricular activities, and a supportive learning environment.
        </p>

        <h4>Our Learning Approach</h4>
        <div class="mid-img">
          <img src="assets/image/img-4.png" alt="Learning Approach">
        </div>
        <p id="mid-s">
          Blending academics with values, co-curricular activities, and ICT integration, we offer a comprehensive educational experience.
        </p>
      </div>
    </main>

    <footer>
      <div class="handles">
        <ul>
          <li><a href="#"><img src="assets/image/instagram-icon.png" alt="Instagram"></a></li>
          <li><a href="#"><img src="assets/image/twitter-icon.png" alt="Twitter"></a></li>
          <li><a href="#"><img src="assets/image/fb-icon.png" alt="Facebook"></a></li>
        </ul>
      </div>
      <p>&copy; 2025 Muruugi Primary Schools. All rights reserved.</p>
    </footer>
  </div>

  <script src="assets/js/main.js"></script>
  <script>
    // Disable video controls and picture-in-picture
    var video = document.getElementById("bg-video");
    video.controls = false;
    video.disablePictureInPicture = true;
  </script>
</body>
</html>
