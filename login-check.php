<?php 
// Authorization
// Check whether the user is logged in or not
if(!isset($_SESSION['user']) || empty($_SESSION['user'])) { // Check if user session is not set or empty
    // User is not logged in 
    // Redirect to login page with message
    $_SESSION['no-login-message'] = '<div>Please login to access Admin Panel</div>';
    // Redirect to login page
    header('location: ' . SITEURL . 'admin/login.php');
    exit(); // Stop further execution
}
?>
