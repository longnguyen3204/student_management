<?php
$title = 'Chỉnh sửa giảng viên'; // Title of the page
session_start(); // Start the session

include dirname(__DIR__, 2) . '/includes/config.php'; // Include configuration settings

ob_start(); // Start output buffering

include BASE_PATH . '/includes/DatabaseConnection.php'; // Include the database connection file
include BASE_PATH . '/includes/DatabaseFunction.php'; // Include the database functions file

// Retrieve the account details based on the teacher ID passed through the URL
$account = getAccountbyID($pdo, $_GET['id']);

// Check if the form is submitted to edit the teacher
if(isset($_POST['btn_edit_teacher'])){

    // Validate that all necessary fields are filled
    if (empty(trim($_POST['new_username'])) || empty(trim($_POST['new_email'])) || empty(trim($_POST['new_phone']))) {
        $_SESSION['status'] = 'Các trường là bắt buộc!'; // Set an error message
        header('location: edit-teacher-code.php?id=' . $account['id']); // Redirect back to the teacher management page
        exit(); // Exit the script
    }elseif (strlen(trim($_POST['new_phone'])) != 10) {
        $_SESSION['status'] = 'Số điện thoại phải chứa 10 kí tự số.'; // Set error message if fields are empty
        header('location: edit-teacher-code.php?id=' . $account['id']);
        exit();
    } else {
        // Check if the new email already exists in the system for a different teacher
        $check_email = checkMail($pdo, $_POST['new_email'], $_GET['id']);
        if ($check_email > 0) {
            $_SESSION['status'] = 'Email đã tồn tại!'; // Set error message if email already exists
            header('location: edit-teacher-code.php?id=' . $account['id']); // Redirect back to the teacher management page
            exit(); // Exit the script
        } else {
            // Proceed to update the teacher account in the database
            $run = updateAccount($pdo, $_POST['account_id'], $_POST['new_username'], $_POST['new_email'], $_POST['new_gender'], $_POST['new_phone']);
            
            if($run) {
                $_SESSION['status'] = 'Cập nhật tài khoản thành công!'; // Success message
                header('location: teacher-manage-code.php'); // Redirect to the teacher management page
                exit(); // Exit the script
            } else {
                $_SESSION['status'] = 'Bạn cần phải chỉnh sửa!'; // Error message
                header('location: edit-teacher-code.php?id=' . $account['id']); // Redirect back
                exit();
            }
        }
    }
}

// Include the teacher edit form template
include BASE_PATH . '/templates/admin-temp/teacher-edit.html.php';
$output = ob_get_clean(); // Get the buffered content
include BASE_PATH . '/templates/admin-layout.html.php'; // Include the admin layout template
?>
