<?php
// public/dashboard.php
session_start();

// Redirect to login if the user is not authenticated
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require_once('../backend/config.php');
require_once('../backend/dashboard_functions.php');

// Retrieve user information from session
$user_name = isset($_SESSION['name']) ? htmlspecialchars($_SESSION['name']) : 'User';
$role = isset($_SESSION['role']) ? $_SESSION['role'] : 'guest'; // Default to guest if role is missing
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - Muruugi Primary Schools</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <?php include '../frontend/navbar.php'; ?>

  <div class="dashboard-container">
    <h1>Dashboard</h1>
    <p>Welcome, <?php echo $user_name; ?>!</p>

     <!-- Back to Home Link -->
     <a href="../public/logout.php" class="back-button">← Back to Home & logout</a>


    <?php
    // Include the appropriate dashboard based on the user's role
    switch ($role) {
        case 'head_teacher':
        case 'deputy_head_teacher':
        case 'management':  
            include 'dashboard_managment.php';
            break;
        case 'teacher':
            include 'dashboard_teacher.php';
            break;
        case 'parent':
            include 'dashboard_parent.php';
            break;
        case 'student':
            include 'dashboard_student.php'; // Ensure this file exists
            break;
        default:
            echo "<p>No dashboard available for your role.</p>";
            break;
    }
    ?>
  </div>

  <script src="assets/js/main.js"></script>
</body>
</html>
