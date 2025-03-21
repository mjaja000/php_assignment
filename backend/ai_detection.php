<?php
// backend/ai_detection.php
// This script calls a Python script to perform AI-based anomaly detection.
$output = shell_exec("python ../ai_attack_detection.py");
echo $output;
?>
