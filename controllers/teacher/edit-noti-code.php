<?php
$title = 'Edit Notification'; // Set page title
session_start(); // Start session

include dirname(__DIR__, 2) . '/includes/config.php'; // Load config
ob_start(); // Start output buffering

include BASE_PATH . '/includes/DatabaseConnection.php'; // Connect to database
include BASE_PATH . '/includes/DatabaseFunction.php'; // Load database functions

$notification = getNotificationforEdit($pdo, $_GET['id']);
if(isset($_POST['btn_save'])){ // If save button clicked
    // Update notification
    $run = updateNotification($pdo, $_POST['notification_id'], $_POST['notification_title'], $_POST['notification_text']);

    if($run) {
        $_SESSION['status'] = 'Cập nhật thông báo thành công!';
        header('location: noti-manage-code.php');
        exit();
    } else {
        $_SESSION['status'] = 'Có lỗi đã xảy ra!';
        header('location: edit-noti-code.php?id=' . $notification['id']);
        exit();
    }
}

include BASE_PATH . '/templates/admin-temp/edit-notification.html.php'; // Load edit notification template
$output = ob_get_clean(); // Store buffered content
include BASE_PATH . '/templates/teacher-layout.html.php'; // Load layout
?>
