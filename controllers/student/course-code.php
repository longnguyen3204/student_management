<?php
$title = 'Your Course'; // Set the page title
session_start(); // Start the session

if(!isset($_SESSION['authenticated'])){ // Check if user is logged in
    $_SESSION['status'] = 'Sinh viên phải đăng nhập để xem môn học!';
    header('Location: ../../index.php'); // Redirect if not logged in
    exit(0);
}

include dirname(__DIR__, 2) . '/includes/config.php'; // Include the configuration file

include BASE_PATH . '/includes/DatabaseConnection.php'; // Include the database connection file
include BASE_PATH . '/includes/DatabaseFunction.php'; // Include the database functions file

// Fetch all courses from the database
$courses = allCourse($pdo);

ob_start(); // Start output buffering
include BASE_PATH . '/templates/student-temp/course.html.php'; // Include the course management template
$output = ob_get_clean(); // Get the buffered content
include BASE_PATH . '/templates/student-layout.html.php'; // Include the admin layout template

?>
