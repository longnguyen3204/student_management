<?php
// Import necessary classes from the PHPMailer library
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer class files
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Create a new PHPMailer instance
$mail = new PHPMailer();
$title = 'Contact Us';

// Start a session to store session variables
session_start();

// Check if the user is authenticated (logged in)
if(!isset($_SESSION['authenticated'])){ 
    $_SESSION['status'] = 'You need to login to contact us!'; // If not authenticated, set an error message and redirect to the login page
    header('Location: ../controllers/auth/signin-code.php');
    exit(0);
}

ob_start(); // Start output buffering to capture any output generated
    if(isset($_POST['message'])){ // Check if the form has been submitted (i.e., message is set)

         // Get the subject and message from the POST data
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        if(empty(trim($subject)) || empty(trim($message))) // Check if any required fields are empty
            $_SESSION['status'] = 'All fields are mandetory'; // Set session error if fields are empty
        else{
            try {
    
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
    
                $mail->Username = 'huongnsgch230101@fpt.edu.vn';
                $mail->Password = 'sutntyrwgfgyomzh'; 
    
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
                $mail->Port = 587; 
                
                $mail->setFrom('huongnsgch230101@fpt.edu.vn', 'Klein Nguyen'); // Set sender email and name
                $mail->addAddress('nguyenhuong150905@gmail.com', 'Huong Nguyen'); // Set recipient email and name
    
                // $mail->addAddress('ellen@example.com');               //Name is optional
                // $mail->addReplyTo('info@example.com', 'Information');
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');
    
                //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
                
                $mail->isHTML(true);
                $mail->Subject = ''.$subject.''; 
                $mail->Body = ''.$message.''; 
                // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                
                $mail->send(); // Send the email
    
                $_SESSION['status'] = 'Your message sent successful!'; // Set success message in session
    
            } catch (Exception $e) { 
                $_SESSION['status'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; // Catch any errors during the email sending process and set the error message
            }
        }
    } 
    
include '../templates/contact.html.php'; // Include the contact form HTML template
$output = ob_get_clean(); // Capture the output and store it in the $output variable
include '../templates/layout.html.php'; // Include the layout template that contains the page structure
?>