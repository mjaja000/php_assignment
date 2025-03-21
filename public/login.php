<?php
// public/login.php
session_start();
session_regenerate_id(true);
require_once('../backend/config.php');
require_once('../backend/auth.php'); // Contains the loginUser function

// Process login form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve username and password from form input
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    
    // Attempt to log in using the backend authentication function
    $user = loginUser($username, $password);
    
    if ($user) {
        // Store user info in session variables upon successful login
        $_SESSION['user_id'] = $user['id'];
       
        $_SESSION['name'] = $user['name']; // Store the user's name
        $_SESSION['role'] = $user['role'];

        header("Location: dashboard.php"); // Redirect to dashboard
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Muruugi Primary Schools</title>
  <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
  <?php include '../frontend/navbar.php'; ?>
  <div class="login-container">
    <h2>Login</h2>
    <?php if(isset($error)) { echo "<p class='error'>$error</p>"; } ?>
    <form action="login.php" method="POST">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>
      
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
      
      <button type="submit">Login</button>
    </form>
  </div>
  <script src="assets/js/main.js"></script>
</body>
</html>
