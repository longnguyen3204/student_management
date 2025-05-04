<?php
$title = 'Public Notification'; // Title of the page
session_start(); // Start the session

include dirname(__DIR__, 2) . '/includes/config.php'; // Include the config file for global settings

include BASE_PATH . '/includes/DatabaseConnection.php'; // Include database connection
include BASE_PATH . '/includes/DatabaseFunction.php'; // Include database functions

if(!isset($_SESSION['authenticated'])){ // Check if user is logged in
    $_SESSION['status'] = 'Sinh viên phải đăng nhập để xem thông báo!';
    header('Location: ../../index.php'); // Redirect if not logged in
    exit(0);
}
// Fetch all notifications using the function `allNotifications()` defined in DatabaseFunction.php
$notifications = allNotification($pdo);

// Start output buffering to capture the page content
ob_start();

// Include the template for displaying the notifications in the admin layout
include BASE_PATH . '/templates/student-temp/notifications.html.php';

// Capture the output and store it in the `$output` variable
$output = ob_get_clean();

// Include the main layout template that will wrap the content (header, footer, etc.)
include BASE_PATH . '/templates/student-layout.html.php';
?>
