<?php
include('../config/constants.php');
if(isset($_GET['id']) && isset($_GET['image_name']) ){
    //process to delete
    //1.get id and img name
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    //2.delete image if available
    if($image_name!=""){
        //it has image and need to remove
        $path = "../images/product/".$image_name;

        //remove img file from folder
        $remove = unlink($path);
        //$remove will have boolean value

        //check whether the img is removed or not
        if($remove == false){
            //failed to remove
            $_SESSION['upload']="<div>Failed to remove image file</div>";
            header('location:'.SITEURL.'admin/manage-product.php');
            //stop the process
            die();
        }
    }
    //3.delete from db
    $sql = "DELETE FROM tbl_product WHERE id=$id";
    $res = mysqli_query($conn,$sql);
    
    //4.redierct to manage-product with session msg
    if($res == true){
        //product deleted
        $_SESSION['delete']="<div class='text-green-700'>Product Deleted Successfully</div>";
        header('location:'.SITEURL.'admin/manage-product.php');
    }
    else {
        //redirect to manage product
        $_SESSION['delete']="<div class='text-red-700'>Product Deleted Successfully</div>";
        header('location:'.SITEURL.'admin/manage-product.php');
    }

}
else{
    //redirect to manage-product page
    $_SESSION['unauthorize']="<div class='text-red-700'>Unauthorized Access</div>";
    header('location:'.SITEURL.'admin/manage-product.php');
}

?>
