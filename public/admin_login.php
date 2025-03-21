<?php
session_start();
session_regenerate_id(true);

require_once('../backend/config.php'); // Database configuration
use Backend\Config;

// Connect to the database
$pdo = Config::getDbConnection();
if (!$pdo) {
    die("Error: Database connection not established.");
}

$errors = [];
$success = "";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if we're registering a new management user
    if (isset($_POST['register'])) {
        $name = trim($_POST['name']);
        $username = trim($_POST['username']);
        $password = $_POST['password'];

        // Check if the username already exists
        $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $existingUser = $stmt->fetch();

        if ($existingUser) {
            $errors[] = "Username already taken. Please choose another.";
        } else {
            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert user with role = 'management'
            $stmt = $pdo->prepare("INSERT INTO users (username, password, role, name)
                                   VALUES (?, ?, 'head_teacher', ?)");
            $inserted = $stmt->execute([$username, $hashedPassword, $name]);

            if ($inserted) {
                $success = "Management account registered successfully. You can now log in.";
            } else {
                $errors[] = "Registration failed. Please try again.";
            }
        }
    }

    // Check if we're logging in as a management user
    if (isset($_POST['login'])) {
        $username = trim($_POST['username']);
        $password = $_POST['password'];

        // Only look for users with role = 'management'
        $stmt = $pdo->prepare("SELECT id, username, password, role, name
                               FROM users
                               WHERE username = ? AND role = 'head_teacher'");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Valid login
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['role'] = $user['role'];

            header("Location: dashboard_managment.php");
            exit();
        } else {
            $errors[] = "Invalid management credentials.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Login - Muruugi Primary School</title>
  <link rel="stylesheet" href="assets/css/admi_login.css">
</head>
<body>
  <?php include '../frontend/navbar.php'; ?>

  <div class="admin-login-container">
    <h2>Management Login & Registration</h2>

    <?php
      // Display any error messages
      if (!empty($errors)) {
          echo "<ul class='error-messages'>";
          foreach ($errors as $err) {
              echo "<li>$err</li>";
          }
          echo "</ul>";
      }
      // Display success message
      if (!empty($success)) {
          echo "<p class='success-message'>$success</p>";
      }
    ?>

    <div class="forms-wrapper">
      <!-- Registration Form -->
      <div class="register-form">
        <h3>Register Management Account</h3>
        <form action="admin_login.php" method="POST">
          <!-- Hidden field to indicate registration -->
          <input type="hidden" name="register" value="1">

          <label for="name">Full Name:</label>
          <input type="text" name="name" id="name" required>

          <label for="username">Username:</label>
          <input type="text" name="username" id="username" required>

          <label for="password">Password:</label>
          <input type="password" name="password" id="password" required>

          <button type="submit">Register</button>
        </form>
      </div>

      <!-- Login Form -->
      <div class="login-form">
        <h3>Login (Management Only)</h3>
        <form action="admin_login.php" method="POST">
          <!-- Hidden field to indicate login -->
          <input type="hidden" name="login" value="1">

          <label for="username">Username:</label>
          <input type="text" name="username" id="username" required>

          <label for="password">Password:</label>
          <input type="password" name="password" id="password" required>

          <button type="submit">Login</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
