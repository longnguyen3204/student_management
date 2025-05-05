<?php
$title = 'Sign In'; // Page title
session_start(); // Start session

ob_start(); // Start output buffering

if(isset($_POST['btn_sign_in'])){

    $email = $_POST['email']; // Get email input
    $password = $_POST['password']; // Get password input

    include ('includes/DatabaseConnection.php') ; // Include DB connection
    include ('includes/DatabaseFunction.php') ; // Include DB functions
    
    if(!empty(trim($email)) && !empty(trim($password))) {

        $account = selectMail($pdo, $email); // Get account details

        // Verify password with stored hash
        if (password_verify($password, $account["password_hash"])) {
            $_SESSION['authenticated'] = TRUE; // Set authentication flag
            $_SESSION['auth_account'] = [ // Store account data in session
                'username' => $account['username'],
                'email' => $account['email'],
            ];

            $_SESSION['status'] = 'Đăng nhập thành công!'; // Set success message

            // Redirect based on user role
            switch ($account['role']) {
                case 'admin':
                    header('Location: /student_management/controllers/admin-crud/noti-manage-code.php');
                    break;
                case 'teacher':
                    header('Location: /student_management/controllers/teacher/manage-noti-code.php');
                    break;
                default:
                    header('Location: /student_management/controllers/student/profile-code.php');
            }
            exit(); // Exit after redirect
        } else {
            $_SESSION['status'] = 'Sai email hoặc mật khẩu!'; // Invalid credentials
        }
    } else {
        $_SESSION['status'] = 'Các trường là bắt buộc!'; // Missing input
    }
}

include ('templates/auth-temp/signin.html.php'); // Include sign-in template
$output = ob_get_clean(); // Clean output buffer
include ('templates/student-layout.html.php'); // Include layout template
?>
