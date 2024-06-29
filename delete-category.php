<?php
include('../config/constants.php');
// Check whether id and image_name value is set or not
if (isset($_GET['id']) && isset($_GET['image_name'])) {
    // Get the id and image_name from GET parameters
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    // Remove the physical image file if available 
    if ($image_name != "") {
        // Image is available, so remove it
        $path = "../images/category/" . $image_name;
        // Remove the image
        $remove = unlink($path);
        // If failed to remove image, add an error message and stop the process
        if ($remove == false) {
            // Set the session message
            $_SESSION['remove'] = "<div>Failed to remove category image</div>";
            // Redirect to manage category page
            header('location:' . SITEURL . 'admin/manage-category.php');
            // Stop the process
            die();
        }
    }

    // Delete data from the database
    $sql = "DELETE FROM tbl_category WHERE id=$id";
    $res = mysqli_query($conn, $sql);
    if ($res == true) {
        $_SESSION['delete'] = "<div>Category deleted successfully</div>";
        header('location:' . SITEURL . 'admin/manage-category.php');
    } else {
        $_SESSION['delete'] = "<div>Category deletion failed</div>";
        header('location:' . SITEURL . 'admin/manage-category.php');
    }
} else {
    // Redirect to manage category page if id or image_name is not set
    header('location:' . SITEURL . 'admin/manage-category.php');
}
?>
