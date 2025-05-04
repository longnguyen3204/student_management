<?php
$title = 'Delete Course'; // Title of the page
session_start(); // Start the session

include dirname(__DIR__, 2) . '/includes/config.php'; // Include the configuration settings

include BASE_PATH . '/includes/DatabaseConnection.php'; // Include the database connection file
include BASE_PATH . '/includes/DatabaseFunction.php'; // Include the database functions file

// Check if the form is submitted to delete a course
if(isset($_POST['btn_delete_course'])){
    
    // Call the deleteCourse function to remove the course from the database
    $run = deleteCourse($pdo, $_POST['id']);
    
    if($run) {
        $_SESSION['status'] = 'Xóa môn học thành côngcông!'; // Success message
        header('location: course-manage-code.php'); // Redirect to course management page
        exit(); // Exit the script
    } else {
        $_SESSION['status'] = 'Có lỗi đã xảy ra!'; // Error message if deletion fails
    }
}

// Include the layout template
include BASE_PATH . '/templates/admin-layout.html.php';
?>
