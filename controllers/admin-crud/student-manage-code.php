<?php
$title = 'Quản lý sinh viên'; // Set page title
session_start(); // Start the session

include dirname(__DIR__, 2) . '/includes/config.php'; // Include config file

include BASE_PATH . '/includes/DatabaseConnection.php'; // Include DB connection
include BASE_PATH . '/includes/DatabaseFunction.php'; // Include DB functions

// Fetch all accounts from the database
$accounts = allStudent($pdo);

ob_start(); // Start output buffering
include BASE_PATH . '/templates/admin-temp/student-manage.html.php'; // Include the student management template
$output = ob_get_clean(); // Get the buffered content
include BASE_PATH . '/templates/admin-layout.html.php'; // Include the admin layout template

?>
