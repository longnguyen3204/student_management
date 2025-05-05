<?php
$title = 'Thêm điểm'; // Set the page title
session_start(); // Start the session to manage session data

if(!isset($_SESSION['authenticated'])){ // Check login
    $_SESSION['status'] = 'Bạn cần đăng nhập để thêm điểm!';
    header('Location: ../auth/signin-code.php');
    exit(0);
}

// Include the configuration file and start output buffering
include dirname(__DIR__, 2) . '/includes/config.php';
include BASE_PATH . '/includes/DatabaseConnection.php';
include BASE_PATH . '/includes/DatabaseFunction.php';

ob_start(); // Start output buffering

$courses = allCourse($pdo);
$accounts = allStudent($pdo);

if(isset($_POST['btn_add_grade'])){
    // Include necessary database connection and functions
    // Validate the form field
    if (empty($_POST['grade']) || empty($_POST['student_name']) || empty($_POST['course_name']) || $_POST['student_name'] === "Chọn học sinh" || $_POST['course_name'] === "Chọn môn học") {
        $_SESSION['status'] = 'Các trường là bắt buộc!'; // Set a session message if the field is empty

    } elseif (!is_numeric($_POST['grade']) || $_POST['grade'] <= 0 || $_POST['grade'] >= 10) {
        $_SESSION['status'] = 'Điểm phải là số lớn hơn 0 và nhỏ hơn 10!';
    } else {
        // Add the new grade to the database
        $run = addGrade($pdo, $_POST['grade'],$_POST['student_name'], $_POST['course_name']);

        if($run){
            $_SESSION['status'] = 'Thêm điểm thành công!'; // Set a success message if the grade is added
            header('location: grade-manage-code.php'); // Redirect to the grade management page
            exit(); // Stop further code execution
        } else{
            $_SESSION['status'] = 'Thêm điểm không thành công!'; // Set a failure message if the grade could not be added
        }
    }
}

// Include the grade-add template to display the form
include BASE_PATH . '/templates/admin-temp/grade-add.html.php';
$output = ob_get_clean(); // Capture the output of the template

// Include the admin layout template to render the page
include BASE_PATH . '/templates/admin-layout.html.php';
?>
