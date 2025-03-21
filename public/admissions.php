<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admission - Muruugi Primary Schools</title>
  <link rel="stylesheet" href="assets/css/admission.css">
</head>
<body>
  <?php 
    // Include the navigation bar from the frontend.
    include '../frontend/navbar.php'; 
  ?>

  <header>
    <h1 id="welcome">WELCOME TO MURUUGI PRIMARY SCHOOL</h1>
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
    <!-- Admission Information Section -->
    <section class="admission-info">
      <h2>Admission Process</h2>
      <div class="box-adm">
        <p>
          For those who would like their daughters to join Muruugi Primary in Grade 1, please provide the following documents:<hr>
          <br>
          1. A filled in application form (downloadable from our website).<br>
          2. An application letter.<br>
          3. A copy of your daughter’s birth certificate.<br>
          4. A school report or recommendation letter from her previous school or Kindergarten Head Teacher.<br>
          5. One recent passport photograph of your daughter.<br>
          6. A copy of the receipt for payment of a non-refundable application fee (Ksh. 2000/=).
        </p>
      </div>
      <?php
        // Display a success message if the URL flag is set
        if (isset($_GET['success']) && $_GET['success'] == 1) {
          echo "<p class='success-message'>You are successfully registered!</p>";
        }
      ?>
    </section>

    <!-- Admission Application Form Section -->
    <section class="admission-form">
      <h2>Apply Now</h2>
      <p>Enrollment is open for Kindergarten and Primary levels. Please follow the steps below to apply:</p>
      <ol>
        <li>Download and complete the admission form.</li>
        <li>Attach the required documents (birth certificate, previous school records, etc.).</li>
        <li>Submit the application online or at the school office.</li>
      </ol>
      <form action="../backend/register_student.php" method="POST" enctype="multipart/form-data">
        <label for="student_name">Student Name:</label>
        <input type="text" id="student_name" name="student_name" required>
        
        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required>
        
        <label for="class">Class:</label>
        <select id="class" name="class" required>
          <option value="Kindergarten">Kindergarten</option>
          <option value="Primary">Primary</option>
        </select>
  
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
  
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
  
        <label for="document">Upload Document (Birth Certificate):</label>
        <input type="file" id="document" name="document" required>
        
        <button type="submit">Submit Application</button>
      </form>
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
