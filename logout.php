<?php 
//siteurl er jnno constants.php anlam
include('../config/constants.php');
//Delete all the session 
session_destroy(); //unsets $SESSION['user']

//Redirect to login page
header('location:'.SITEURL.'admin/login.php');

?>