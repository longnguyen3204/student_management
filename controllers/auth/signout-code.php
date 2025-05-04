<?php

session_start(); // Start session
unset($_SESSION['authenticated']); // Remove authentication flag
unset($_SESSION['auth_account']); // Remove user account data

$_SESSION['status'] = 'Đăng xuất thành công!'; // Set sign out message

header('location: ../../index.php'); // Redirect to sign-in page
exit(); // Exit script
?>
