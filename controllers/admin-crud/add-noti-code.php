<?php
$title = 'Thêm thông báo'; // Set page title
session_start(); // Start session

if(!isset($_SESSION['authenticated'])){ // Check login
    $_SESSION['status'] = 'Bạn cần đăng nhập để đăng thông báo!';
    header('Location: ../auth/signin-code.php');
    exit(0);
}

include dirname(__DIR__, 2) . '/includes/config.php'; // Load config

ob_start();
include BASE_PATH . '/includes/DatabaseConnection.php'; // Connect to database
include BASE_PATH . '/includes/DatabaseFunction.php'; // Load database functions

if(isset($_POST['btn_add_notification'])){ // If add notification button clicked

    // Check if required fields are empty
    if (empty(trim($_POST['notification_title'])) || empty(trim($_POST['notification_text']))) {
        $_SESSION['status'] = 'Các trường là bắt buộc!';
        header('location: add-noti-code.php');
        exit();
    } else {
        // Add notification to database
        $run = addNotification($pdo, $_POST['notification_title'], $_POST['notification_text'], $_SESSION['auth_account']['email']);

        if($run) { // Check if notification was successfully added
            $_SESSION['status'] = 'Đăng tải thông báo thành công!';
            header('Location: noti-manage-code.php');
            exit();
        } else {
            $_SESSION['status'] = 'Có lỗi đã xảy ra!'; // Error message
        }
    }
} 

include BASE_PATH . '/templates/admin-temp/add-notification.html.php'; // Load add notification page
$output = ob_get_clean();
include BASE_PATH . '/templates/admin-layout.html.php'; // Load layout
?>
