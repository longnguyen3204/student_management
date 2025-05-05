<?php
$title = 'Xóa thông báo'; // Set page title
session_start(); // Start session

include dirname(__DIR__, 2) . '/includes/config.php'; // Load config
include BASE_PATH . '/includes/DatabaseConnection.php'; // Connect to database
include BASE_PATH . '/includes/DatabaseFunction.php'; // Load database functions

if(isset($_POST['btn_delete'])){ // If delete button clicked

    $run = deleteNotification($pdo, $_POST['id']); // Delete notification

    if($run) {
        $_SESSION['status'] = 'Xóa thông báo thành công!';
        header('location: noti-manage-code.php');
        exit();
    } else {
        $_SESSION['status'] = 'Có lỗi đã xảy ra!';
    }
}

include BASE_PATH . '/templates/admin-layout.html.php'; // Load layout
?>
