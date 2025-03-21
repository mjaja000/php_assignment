<?php
require_once('../backend/config.php');
use Backend\Config;

$pdo = Config::getDbConnection();
if (!$pdo) {
    die("Error: Database connection not established.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and assign form values
    $name = trim($_POST['teacher_name']);
    $subject = trim($_POST['subject']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert into teachers table
    $stmt = $pdo->prepare("INSERT INTO teachers (name, subject, email) VALUES (?, ?, ?)");
    $teacherInserted = $stmt->execute([$name, $subject, $email]);

    // Insert into users table with role 'teacher'
    $stmt = $pdo->prepare("INSERT INTO users (username, password, role, name) VALUES (?, ?, 'teacher', ?)");
    $userInserted = $stmt->execute([$email, $hashedPassword, $name]);

    if ($teacherInserted && $userInserted) {
        header("Location: ../public/dashboard_management.php?success=1");
        exit();
    } else {
        echo "Error registering teacher.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register Teacher</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <h2>Register New Teacher</h2>
    <form action="register_teacher.php" method="POST">
        <label>Teacher Name:</label>
        <input type="text" name="teacher_name" required>

        <label>Subject:</label>
        <input type="text" name="subject" required>

        <label>Email (Username):</label>
        <input type="email" name="email" required>

        <label>Password:</label>
        <input type="password" name="password" required>

        <button type="submit">Register Teacher</button>
    </form>
</body>
</html>
