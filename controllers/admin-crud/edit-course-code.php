<?php
$title = 'Chỉnh sửa môn học'; // Title of the page
session_start(); // Start the session

include dirname(__DIR__, 2) . '/includes/config.php'; // Include configuration settings

ob_start(); // Start output buffering

include BASE_PATH . '/includes/DatabaseConnection.php'; // Include the database connection file
include BASE_PATH . '/includes/DatabaseFunction.php'; // Include the database functions file

$course = getCoursebyID($pdo, $_GET['id']);

if(isset($_POST['btn_edit_course'])){

    // Validate that the new course name is not empty
    if (empty(trim($_POST['new_course']))) {
        $_SESSION['status'] = 'Các trường là bắt buộc!'; // Set error message if fields are empty
        header('location: course-manage-code.php'); // Redirect back to the course management page
        exit(); // Exit the script
    } else {
        // Check if the course already exists in the database
        $check_course = checkCourse($pdo, $_POST['new_course']);
        
        if ($check_course > 0) {
            $_SESSION['status'] = 'Môn học đã tồn tại!'; // Set error message if course already exists
            header('location: edit-course-code.php?id=' . $course['id']); // Redirect back
            exit(); // Exit the script
        } else {
            // Proceed to update the course in the database
            $run = updateCourse($pdo, $_POST['course_id'], $_POST['new_course']);
            
            if($run) {
                $_SESSION['status'] = 'Chỉnh sửa môn học thành công!'; // Success message
                header('location: course-manage-code.php'); // Redirect to course management page
                exit(); // Exit the script
            } else {
                $_SESSION['status'] = 'Có lỗi đã xảy ra!'; // Error message
                header('location: edit-course-code.php?id=' . $course['id']); // Redirect back
                exit(); // Exit the script
            }
        }
    }
} 
    


// Include the course edit form template
include BASE_PATH . '/templates/admin-temp/course-edit.html.php';
$output = ob_get_clean(); // Get the buffered content
include BASE_PATH . '/templates/admin-layout.html.php'; // Include the admin layout template
?>
