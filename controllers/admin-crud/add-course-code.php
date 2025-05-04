<?php
$title = 'Add Course'; // Set the page title
session_start(); // Start the session to manage session data

// Include the configuration file and start output buffering
include dirname(__DIR__, 2) . '/includes/config.php';
ob_start(); // Start output buffering

// Check if the form is submitted to add a course
if(isset($_POST['btn_add_course'])){
    // Include necessary database connection and functions
    include BASE_PATH . '/includes/DatabaseConnection.php';
    include BASE_PATH . '/includes/DatabaseFunction.php';

    // Retrieve the course name from the form input
    $course = $_POST['course_name'];

    // Validate the form field
    if (empty(trim($course))) {
        $_SESSION['status'] = 'Các trường là bắt buộc!'; // Set a session message if the field is empty
    } else {
        // Check if the course already exists in the database
        $check_course = checkCourse($pdo, $course);
        if ($check_course > 0) {
            $_SESSION['status'] = 'Môn học đẫ tồn tại!'; // If the course exists, set a session message
        } else {
            // Add the new course to the database
            $run = addCourse($pdo, $course);

            if($run){
                $_SESSION['status'] = 'Thêm môn học thành công!'; // Set a success message if the course is added
                header('location: course-manage-code.php'); // Redirect to the course management page
                exit(); // Stop further code execution
            } else{
                $_SESSION['status'] = 'Thêm môn học không thành công!'; // Set a failure message if the course could not be added
            }
        } 
    }
}

// Include the course-add template to display the form
include BASE_PATH . '/templates/admin-temp/course-add.html.php';
$output = ob_get_clean(); // Capture the output of the template

// Include the admin layout template to render the page
include BASE_PATH . '/templates/admin-layout.html.php';
?>
