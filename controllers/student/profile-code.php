<?php 
$title = 'Thông tin cá nhân'; // Set page title

session_start(); // Start session

if(!isset($_SESSION['authenticated'])){ // Check if student is logged in
    $_SESSION['status'] = 'Sinh viên phải đăng nhập để xem thông tin!';
    header('Location: ../../index.php'); // Redirect if not logged in
    exit(0);
}

include dirname(__DIR__, 2) . '/includes/config.php'; // Load config

include BASE_PATH . '/includes/DatabaseConnection.php'; // Connect to database
include BASE_PATH . '/includes/DatabaseFunction.php'; // Load database functions

$accounts = getAccountbyEmail($pdo, $_SESSION['auth_account']['email']); // Get student's notifications

ob_start(); // Start output buffering
include BASE_PATH . '/templates/student-temp/profile.html.php'; // Load notification template
$output = ob_get_clean(); // Store buffered content

include BASE_PATH . '/templates/student-layout.html.php'; // Load layout
?>
