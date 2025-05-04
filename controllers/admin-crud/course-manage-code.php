<?php
$title = 'Course Management'; // Set the page title
session_start(); // Start the session

include dirname(__DIR__, 2) . '/includes/config.php'; // Include the configuration file

include BASE_PATH . '/includes/DatabaseConnection.php'; // Include the database connection file
include BASE_PATH . '/includes/DatabaseFunction.php'; // Include the database functions file

// Fetch all courses from the database
$courses = allCourse($pdo);

ob_start(); // Start output buffering
include BASE_PATH . '/templates/admin-temp/course-manage.html.php'; // Include the course management template
$output = ob_get_clean(); // Get the buffered content
include BASE_PATH . '/templates/admin-layout.html.php'; // Include the admin layout template

?>
