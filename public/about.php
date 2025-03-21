<?php
// public/about.php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About - Muruugi Primary Schools</title>
  <link rel="stylesheet" href="assets/css/about.css">
</head>
<body>
  <?php include '../frontend/navbar.php'; ?>

  <header>
    <h1 id="welcome">WELCOME TO MURUUGI PRIMARY</h1>
    <div class="nbar">
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
    <nav class="navbar">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="courses.php">Courses</a></li>
        <li><a href="admissions.php">Admission</a></li>
        <li><a href="contact.php">Contact</a></li>
        <a href="admin_login.php">HEADTEACHER LOGIN</a>
      </ul>
    </nav>
  </header>

  <main>
    <!-- About Information Section -->
    <section class="about-info">
      <h2>About</h2>
      <p id="mid-s">
        Muruugi Primary is a public boys and girls primary school located in Central Imenti Constituency, Meru County. 
        Ownership: Public School. Gender: Mixed School. Accommodation: Day School.<br>
        Have in Thy Keeping, O Lord, Our God, This School, That Its work May be Thorough and its life Joyful. 
        That from it may Go Out, strong in body, mind and character, men who in thy name and power, will serve their fellows faithfully, 
        through Jesus Christ our Lord. Amen.<br>
        Have in Thy Keeping, O Lord, Our God, This School, That Its work May be Thorough and its life Joyful. 
        That from it may Go Out, strong in body, mind and character, men who in thy name and power, will serve their fellows faithfully, 
        through Jesus Christ our Lord. Amen.
      </p>
      <p id="mid-s">
        Our mission is to graduate students who are strong in body, mind and character, to serve their fellows faithfully in Africa and beyond.
      </p>
      <p id="mid-s">
        For more information, please visit the office of the Deputy Headteacher.
      </p>
    </section>

    <!-- Audio Section -->
    <section class="audio-section">
      <audio controls>
        <source src="assets/image/Chelsea FC Anthem - Blue is the Colour.mp3" type="audio/mp3">
        Your browser does not support the audio element.
      </audio>
      <p class="audio-label">School Anthem</p>
    </section>

    <!-- Additional About Content -->
    <section class="content-container">
      <h1>About Muruugi Primary Schools</h1>
      <p>
        Muruugi Primary Schools in Meru County, Kenya, are dedicated to providing quality education using the Competency‑Based Curriculum (CBC). 
        We focus on continuous assessment, practical learning, and holistic development to empower our students for future leadership.
      </p>
      <p>
        Our vision is to nurture every student to achieve their fullest potential in a nurturing and innovative environment.
      </p>
    </section>

    <!-- Marquee Gallery Section -->
    <section class="gallery-section">
      <marquee behavior="" direction="">
        <div class="gallery">
          <img src="assets/image/WhatsApp Image 2024-03-24 at 17.11.36_7abd764e.jpg" alt="Gallery Image">
          <img src="assets/image/WhatsApp Image 2024-03-24 at 17.11.37_a2a8eb50.jpg" alt="Gallery Image">
          <img src="assets/image/WhatsApp Image 2024-03-24 at 16.51.29_34bffec6.jpg" alt="Gallery Image">
          <img src="assets/image/WhatsApp Image 2024-03-24 at 16.51.27_5aa631d2.jpg" alt="Gallery Image">
          <img src="assets/image/WhatsApp Image 2024-03-24 at 17.11.38_f629c404.jpg" alt="Gallery Image">
          <img src="assets/image/WhatsApp Image 2024-03-24 at 17.11.39_50b6ba8c.jpg" alt="Gallery Image">
          <img src="assets/image/WhatsApp Image 2024-03-24 at 17.11.38_52b705d9.jpg" alt="Gallery Image">
        </div>
      </marquee>
    </section>
  </main>

  <!-- Footer Appears at the End -->
  <footer>
    <div class="handles">
      <ul>
        <li><a href="#"><img src="assets/image/instagram-icon.png" alt="Instagram"></a></li>
        <li><a href="#"><img src="assets/image/twitter-icon.png" alt="Twitter"></a></li>
        <li><a href="#"><img src="assets/image/fb-icon.png" alt="Facebook"></a></li>
      </ul>
    </div>
    <p>&copy; 2025 Muruugi Primary</p>
  </footer>

  <script src="assets/js/main.js"></script>
</body>
</html>
