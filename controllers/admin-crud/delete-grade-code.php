<?php
$title = 'Xóa điểm'; // Title of the page
session_start(); // Start the session

include dirname(__DIR__, 2) . '/includes/config.php'; // Include the configuration settings

include BASE_PATH . '/includes/DatabaseConnection.php'; // Include the database connection file
include BASE_PATH . '/includes/DatabaseFunction.php'; // Include the database functions file

// Check if the form is submitted to delete a grade
if(isset($_POST['btn_delete_grade'])){
    
    // Call the deleteGrade function to remove the grade from the database
    $run = deleteGrade($pdo, $_POST['id']);
    
    if($run) {
        $_SESSION['status'] = 'Xóa điểm thành công!'; // Success message
        header('location: grade-manage-code.php'); // Redirect to grade management page
        exit(); // Exit the script
    } else {
        $_SESSION['status'] = 'Có lỗi đã xảy ra!'; // Error message if deletion fails
    }
}

// Include the layout template
include BASE_PATH . '/templates/admin-layout.html.php';
?>
