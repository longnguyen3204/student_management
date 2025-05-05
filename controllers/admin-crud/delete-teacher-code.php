<?php
$title = 'Xóa giảng viên'; // Title of the page
session_start(); // Start the session

include dirname(__DIR__, 2) . '/includes/config.php'; // Include configuration settings

include BASE_PATH . '/includes/DatabaseConnection.php'; // Include the database connection file
include BASE_PATH . '/includes/DatabaseFunction.php'; // Include the database functions file

// Check if the form is submitted to delete a teacher
if(isset($_POST['btn_delete_teacher'])){
    
    // Call the deleteAccount function to remove the teacher from the database
    $run = deleteAccount($pdo, $_POST['id']);
    
    if($run) {
        $_SESSION['status'] = 'Xóa tài khoản thành công!'; // Success message
        header('location: teacher-manage-code.php'); // Redirect back to the teacher management page
        exit(); // Exit the script
    } else {
        $_SESSION['status'] = 'Có lỗi đã xảy ra!'; // Error message if deletion fails
    }
}

// Include the layout template
include BASE_PATH . '/templates/admin-layout.html.php';
?>
