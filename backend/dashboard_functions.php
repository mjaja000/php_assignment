<?php
// backend/dashboard_functions.php

// Example: Fetch all student performance data (for management dashboard)
function getAllStudentPerformance() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM student_grades");
    return $stmt->fetchAll();
}

// Fetch performance data for a teacher's class
function getTeacherClassPerformance($teacher_id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM student_grades WHERE teacher_id = ?");
    $stmt->execute([$teacher_id]);
    return $stmt->fetchAll();
}

// Fetch performance data for a specific student (for parents)
function getStudentPerformance($student_id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM student_grades WHERE student_id = ?");
    $stmt->execute([$student_id]);
    return $stmt->fetchAll();
}
?>
