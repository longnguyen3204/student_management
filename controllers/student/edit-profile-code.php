<?php
$title = 'Edit Profile'; // Title of the page
session_start(); // Start the session

include dirname(__DIR__, 2) . '/includes/config.php'; // Include configuration settings

ob_start(); // Start output buffering

include BASE_PATH . '/includes/DatabaseConnection.php'; // Include the database connection file
include BASE_PATH . '/includes/DatabaseFunction.php'; // Include the database functions file

$account = getAccountbyID($pdo, $_GET['id']);

if(isset($_POST['btn_edit_profile'])){

    // Validate that the new grade name is not empty
    if (empty(trim($_POST['new_name'])) || (empty(trim($_POST['new_email'])) || (empty(trim($_POST['new_gender'])) || (empty(trim($_POST['new_phone'])))))) {
        $_SESSION['status'] = 'All fields are mandatory!'; // Set error message if fields are empty
        header('location: edit-profile-code.php?id=' . $account['id']); // Redirect back to the grade management page
        exit(); // Exit the script
    
    }elseif (strlen(trim($_POST['new_phone'])) != 10) {
        $_SESSION['status'] = 'Số điện thoại phải có 10 kí tự.'; // Set error message if fields are empty
        header('location: edit-profile-code.php?id=' . $account['id']);
        exit();
    } else {
        
        $check_email = checkMail($pdo, $_POST['new_email'], $_GET['id']);
        if ($check_email > 0) {
            $_SESSION['status'] = 'Email đã tồn tại!'; // Set error message if email already exists
            header('location: edit-profile-code.php?id=' . $account['id']); // Redirect back to the user management page
            exit(); // Exit the script
        } else {
            // Proceed to update the user account in the database
            $run = updateAccount($pdo, $_POST['profile_id'],$_POST['new_name'], $_POST['new_email'], $_POST['new_gender'], $_POST['new_phone']);
            
            if($run) {
                $_SESSION['status'] = 'Thay đổi tài khoản thành công!'; // Success message
                header('location: profile-code.php'); // Redirect to the user management page
                exit(); // Exit the script
            } else {
                $_SESSION['status'] = 'Bạn cần phải chỉnh sửa!'; // Error message
                header('location: edit-profile-code.php?id=' . $account['id']); // Redirect back
                exit();
            }
        }
        }
    }

// Include the course edit form template
include BASE_PATH . '/templates/student-temp/profile-edit.html.php';
$output = ob_get_clean(); // Get the buffered content
include BASE_PATH . '/templates/student-layout.html.php'; // Include the admin layout template
?>
