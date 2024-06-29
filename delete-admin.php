<?php
//include constants.php here
include('../config/constants.php');
//get the id of the admin to be deleted
$id = $_GET['id'];

//create sql query to delete admin
$sql = "DELETE FROM tbl_admin WHERE id=$id";
//redirect to Manage Admin page with msg 
$res = mysqli_query($conn, $sql);

//check if the query executed successfully
if ($res == TRUE) {
    //query executed successfully & admin deleted
    // echo "Admin deleted";
    //Create session variable to display msg 
    $_SESSION['delete'] = "<div class='text-green-800 text-3xl'>Admin deleted successfully</div>";
    header('location:' . SITEURL . 'admin/manage-admin.php');
} else {
    //failed to delete admin
    // echo "Failed to delte admin";
    $_SESSION['delete'] = "Failed to delete admin";
    header('location:' . SITEURL . 'admin/manage-admin.php');
}
