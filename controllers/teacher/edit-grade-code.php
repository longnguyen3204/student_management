<?php
$title = 'Edit Course'; // Title of the page
session_start(); // Start the session

include dirname(__DIR__, 2) . '/includes/config.php'; // Include configuration settings

ob_start(); // Start output buffering

include BASE_PATH . '/includes/DatabaseConnection.php'; // Include the database connection file
include BASE_PATH . '/includes/DatabaseFunction.php'; // Include the database functions file

$grade = getGradebyID($pdo, $_GET['id']);
$accounts = allStudent($pdo);
$courses = allCourse($pdo);

if(isset($_POST['btn_edit_grade'])){

    // Validate that the new grade name is not empty
    if (empty(trim($_POST['new_grade']))) {
        $_SESSION['status'] = 'Các trường là bắt buộc!'; // Set error message if fields are empty
        header('location: grade-manage-code.php'); // Redirect back to the grade management page
        exit(); // Exit the script
    } else {
        
            $run = updateGrade($pdo, $_POST['grade_id'], $_POST['new_grade'], $_POST['student_name'], $_POST['course_name']);
            
            if($run) {
                $_SESSION['status'] = 'Thêm điểm thành công!'; // Success message
                header('location: grade-manage-code.php'); // Redirect to grade management page
                exit(); // Exit the script
            } elseif (!is_numeric($_POST['new_grade']) || $_POST['new_grade'] <= 0 || $_POST['new_grade'] >= 10) {
                $_SESSION['status'] = 'Điểm phải là số lớn hơn 0 và nhỏ hơn 10!';
            } else {
                $_SESSION['status'] = 'Có lỗi đã xảy ra!'; // Error message
                header('location: edit-grade-code.php?id=' . $grade['id']); // Redirect back
                exit(); // Exit the script
            }
        }
    }
 
    


// Include the course edit form template
include BASE_PATH . '/templates/admin-temp/grade-edit.html.php';
$output = ob_get_clean(); // Get the buffered content
include BASE_PATH . '/templates/teacher-layout.html.php'; // Include the admin layout template
?>
