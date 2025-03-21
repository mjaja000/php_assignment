<?php
// backend/auth.php
require_once 'config.php';  // Ensure the database config is loaded

use Backend\Config;

function loginUser($username, $password) {
    // Get the database connection from Config class
    $pdo = Config::getDbConnection();

    if (!$pdo) {
        die("Error: Database connection not established.");
    }

    // Fetch user details including 'name'
    $stmt = $pdo->prepare("SELECT id, username, password, role, name FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verify the password using PHP's password_verify
    if ($user && password_verify($password, $user['password'])) {
        return $user;  // Return user details
    }
    return false;
}
?>
