<?php
namespace Backend;

require_once 'config.php'; // Include the database configuration
use Backend\Config;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Establish a database connection
        $pdo = Config::getDbConnection();

        // Validate required fields
        if (
            empty($_POST["student_name"]) ||
            empty($_POST["dob"]) ||
            empty($_POST["class"]) ||
            empty($_POST["username"]) ||  // Ensure username is provided
            empty($_POST["password"])    // Ensure password is provided
        ) {
            throw new \Exception("All fields are required.");
        }

        // Sanitize input
        $studentName = htmlspecialchars($_POST["student_name"]);
        $dob = $_POST["dob"];
        $class = $_POST["class"];
        $username = htmlspecialchars($_POST["username"]);
        $password = $_POST["password"];

        // Hash the password for security
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Check if the username already exists
        $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->execute([$username]);
        if ($stmt->fetch()) {
            throw new \Exception("Username already exists. Please choose another.");
        }

        // Insert user data into the users table
        $stmt = $pdo->prepare("
            INSERT INTO users (username, password, role, name) 
            VALUES (?, ?, 'student', ?)
        ");
        $stmt->execute([$username, $hashedPassword, $studentName]);
        $userId = $pdo->lastInsertId(); // Get the newly created user ID

        // Handle file upload
        $uploadDir = __DIR__ . "/uploads/";
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true); // Create the directory if it doesn't exist
        }

        $birthCertPath = null; // Initialize the file path

        if (!empty($_FILES["document"]["name"])) {
            $fileName = basename($_FILES["document"]["name"]);
            $targetFilePath = $uploadDir . $fileName;
            $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

            // Allowed file types
            $allowedTypes = ["pdf", "jpg", "jpeg", "png"];
            if (!in_array($fileType, $allowedTypes)) {
                throw new \Exception("Only PDF, JPG, JPEG, and PNG files are allowed.");
            }

            if (move_uploaded_file($_FILES["document"]["tmp_name"], $targetFilePath)) {
                // Save the relative path for storing in the database
                $birthCertPath = "uploads/" . $fileName;
            } else {
                throw new \Exception("File upload failed.");
            }
        }

        // Insert the student data into the students table with the user_id
        $stmt = $pdo->prepare("
            INSERT INTO students (user_id, student_name, dob, class, birth_certificate) 
            VALUES (?, ?, ?, ?, ?)
        ");
        $stmt->execute([$userId, $studentName, $dob, $class, $birthCertPath]);

        // Redirect to admissions page with a success flag
        header("Location: ../public/admissions.php?success=1");
        exit();

    } catch (\Exception $e) {
        // Display an error message (for debugging purposes)
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request method.";
}
?>
