<?php
// public/courses.php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Courses - Muruugi Primary Schools</title>
  <link rel="stylesheet" href="assets/css/courses.css">
</head>
<body>
  <?php include '../frontend/navbar.php'; ?>

  <header>
    <h1><p id="welcome">WELCOME TO MURUUGI PRIMARY SCHOOL</p></h1>
    <div class="nbar">
      <div class="dropdown">
        <button class="dropbtn"></button>
        <img src="assets/image/toogle-icon.png" alt="Menu Toggle">
        <div class="dropdown-content">
          <a href="index.php">Home</a>
          <a href="about.php">About</a>
          <a href="courses.php">Courses</a>
          <a href="admissions.php">Admission</a>
          <a href="contact.php">Contact</a>
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
      </ul>
    </nav>
  </header>

  <main>
    <section>
      <h2>Courses Offered</h2>
      <div class="box-cos">
        <ul>
          <li>MATHEMATICS</li>
          <li>ENGLISH</li>
          <li>KISWAHILI</li>
          <li>SCIENCE</li>
          <li>SOCIAL STUDIES AND CRE</li>
        </ul>
        <p>For more detailed information about courses offered, please visit the office of the Deputy Headteacher.</p>
      </div>
    </section>
  </main>

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
