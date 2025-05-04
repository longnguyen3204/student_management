<?php
include dirname(__DIR__, 2) . '/includes/config.php';
ob_start(); // Start output buffering

include BASE_PATH . '/templates/admin-temp/home.html.php';
$output = ob_get_clean(); // Capture the output of the template

// Include the admin layout template to render the page
include BASE_PATH . '/templates/admin-layout.html.php';

?>

