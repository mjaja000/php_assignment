<?php
// backend/generate_pdf.php
require_once('tcpdf/tcpdf.php'); // Include TCPDF library
require_once('config.php');

if (!isset($_GET['student_id'])) {
    die("No student specified.");
}

$studentId = $_GET['student_id'];
$stmt = $pdo->prepare("SELECT * FROM students WHERE id = ?");
$stmt->execute([$studentId]);
$student = $stmt->fetch();

if (!$student) {
    die("Student not found.");
}

// Create a new PDF document instance
$pdf = new TCPDF();
$pdf->AddPage();

// Generate HTML content for the PDF
$html = '<h1>Fee Statement / Performance Report for ' . htmlspecialchars($student['name']) . '</h1>';
$html .= '<p>Class: ' . htmlspecialchars($student['class']) . '</p>';
$html .= '<p>Report generated on: ' . date('Y-m-d H:i:s') . '</p>';

// Write the HTML content to the PDF document
$pdf->writeHTML($html);
// Output the PDF inline in the browser
$pdf->Output('report.pdf', 'I');
?>
