<?php
session_start();
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] != 'headteacher') {
//    header("Location: ");
//    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management Dashboard - Muruugi Primary School</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <?php include '../frontend/navbar.php'; ?>

    <div class="dashboard-section">
        <h2>Management Dashboard</h2>
        <?php
        if (isset($_GET['success']) && $_GET['success'] == 1) {
            echo "<p style='color: green; font-weight: bold;'>Operation successful!</p>";
        }
        ?>

        <ul>
            <li><a href="../backend/register_student.php">Register New Student</a></li>
            <li><a href="../backend/register_teacher.php">Register Teacher</a></li>
            <li><a href="../backend/deregister_teacher.php">Deregister Teacher</a></li>
            <li><a href="../backend/view_all_students.php">View All Student Performance</a></li>
        </ul>
    </div>
</body>
</html>
