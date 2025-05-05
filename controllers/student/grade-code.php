<?php
$title = 'Kết quả học tập'; // Title of the page
session_start(); // Start the session


if(!isset($_SESSION['authenticated'])){ // Check if student is logged in
    $_SESSION['status'] = 'Sinh viên phải đăng nhập để xem điểm!';
    header('Location: ../../index.php'); // Redirect if not logged in
    exit(0);
}

include dirname(__DIR__, 2) . '/includes/config.php'; // Include the config file for global settings

include BASE_PATH . '/includes/DatabaseConnection.php'; // Include database connection
include BASE_PATH . '/includes/DatabaseFunction.php'; // Include database functions

$grades = allGradebyEmail($pdo, $_SESSION['auth_account']['email']);

ob_start();

include BASE_PATH . '/templates/student-temp/grade.html.php';

// Capture the output and store it in the `$output` variable
$output = ob_get_clean();

// Include the main layout template that will wrap the content (header, footer, etc.)
include BASE_PATH . '/templates/student-layout.html.php';
?>
