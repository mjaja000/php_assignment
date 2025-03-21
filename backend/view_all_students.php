<?php
require_once 'config.php';
use Backend\Config;

$pdo = Config::getDbConnection();

$stmt = $pdo->prepare("SELECT students.id, students.student_name, students.class, users.username FROM students JOIN users ON students.user_id = users.id");
$stmt->execute();
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>All Students Performance</title>
</head>
<body>
    <h2>All Students</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Class</th>
            <th>Username</th>
        </tr>
        <?php foreach ($students as $student): ?>
            <tr>
                <td><?= $student['id'] ?></td>
                <td><?= htmlspecialchars($student['student_name']) ?></td>
                <td><?= htmlspecialchars($student['class']) ?></td>
                <td><?= htmlspecialchars($student['username']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
