<?php
$title = 'Public Notification'; // Title of the page
session_start(); // Start the session

include dirname(__DIR__, 2) . '/includes/config.php'; // Include the config file for global settings

include BASE_PATH . '/includes/DatabaseConnection.php'; // Include database connection
include BASE_PATH . '/includes/DatabaseFunction.php'; // Include database functions

$grades = allGrade($pdo);

ob_start();

include BASE_PATH . '/templates/admin-temp/grade-manage.html.php';

// Capture the output and store it in the `$output` variable
$output = ob_get_clean();

// Include the main layout template that will wrap the content (header, footer, etc.)
include BASE_PATH . '/templates/teacher-layout.html.php';
?>
