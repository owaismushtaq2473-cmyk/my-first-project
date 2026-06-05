<?php
// Database configuration
$host = "localhost";
$db_user = "root"; 
$db_pass = ""; 
$db_name = "student_db";

// Establish connection
$conn = new mysqli($host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if (isset($_POST['submit'])) {
    // Collect and sanitize inputs
    $student_name = trim($_POST['student_name']);
    $father_name  = trim($_POST['father_name']);
    $student_id   = trim($_POST['student_id']);
    $email        = trim($_POST['email']);

    // Prepare SQL Statement to insert data securely
    $stmt = $conn->prepare("INSERT INTO registrations (student_name, father_name, student_id, email) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $student_name, $father_name, $student_id, $email);

    if ($stmt->execute()) {
        // Redirect to the success display page with the student ID
        header("Location: display.php?id=" . urlencode($student_id));
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>