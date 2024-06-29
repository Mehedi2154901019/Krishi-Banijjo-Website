<?php include('../admin/partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1> <br>
        <br>

        <?php
        //check whether the id is set or not
        if (isset($_GET['id'])) {
            //get the id and all other details
            $id = $_GET['id'];
            //create sql to get all details
            $sql = "SELECT * FROM tbl_category WHERE id=$id";
            //execute the query
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            if ($count == 1) {
                //get all the data
                $row = mysqli_fetch_assoc($res);
                $title = $row['title'];
                $current_image = $row['image_name'];
                $featured = $row['featured'];
                $active = $row['active'];
            } else {
                // redirect to manage-category
                $_SESSION['no-category-found'] = "<div>Category Not Found</div>";
                header('location:' . SITEURL . 'admin/manage-category.php');
            }
        } else {
            //redirect to manage-category
            header('location:' . SITEURL . 'admin/manage-category.php');
        }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" id="" value="<?php echo $title; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Current Image:</td>
                    <td>
                        <?php
                        if ($current_image != "") {
                            //display the img
                        ?>
                            <img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image; ?>" width="150px" height="150px">


                        <?php
                        } else {
                            //display msg
                            echo "<div>Image not added</div>";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>New Image:</td>
                    <td>
                        <input type="file" name="image" id="">
                    </td>
                </tr>
                <tr>
                    <td>Featured:</td>
                    <td>
                        <input <?php if ($featured == "Yes") {
                                    echo "checked";
                                } ?> type="radio" name="featured" value="Yes" id=""> Yes
                        <input <?php if ($featured == "No") {
                                    echo "checked";
                                } ?> type="radio" name="featured" value="No" id=""> No
                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input <?php if ($active == "Yes") {
                                    echo "checked";
                                } ?> type="radio" name="active" value="Yes" id=""> Yes
                        <input <?php if ($active == "No") {
                                    echo "checked";
                                } ?> type="radio" name="active" value="No" id=""> No
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="current_image" id="" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Category" class="btn btn-primary" id="">
                    </td>
                </tr>
            </table>
        </form>

        <?php

        if (isset($_POST['submit'])) {
            // echo "Clickeed";
            //1. get all the values from our form
            $id = $_POST['id'];
            $title = $_POST['title'];
            $current_image = $_POST['current_image'];
            $featured = $_POST['featured'];
            $active = $_POST['active'];

            //2. Updating new img if selected
            //check whether the img is selected or not
            if (isset($_FILES['image']['name'])) {
                //get the img details
                $image_name = $_FILES['image']['name'];
                //check whether img is available or not
                if ($image_name != "") {
                    //image available
                    //upload the new img
                    //auto rename our images
                    // get the extension of our image (jpg,png,gif) e.g pizza1.jpg
                    $ext = end(explode('.', $image_name));
                    $image_name = "product_Category_" . rand(000, 9999) . '.' . $ext;  //e.g product_category_989.jpg 



                    $source_path = $_FILES['image']['tmp_name'];
                    $destination_path = "../images/category/" . $image_name;
                    //upload the img
                    $upload = move_uploaded_file($source_path, $destination_path);

                    //check whether the img is uploaded or not 
                    // and if the img is not uploaded then we will stop the process and redirect with error
                    if ($upload == false) {
                        //set msg
                        $_SESSION['upload'] = "<div>
                    Failed to upload image.
                    </div>";
                        header('location:' . SITEURL . 'admin/manage-category.php');
                        die();
                    }
                    //remove the current img if available
                    if ($current_image != "") {
                        $remove_path = "../images/category/" . $current_image;

                        $remove = unlink($remove_path);
                        //check whether img is removed or not
                        //if failed to remove display msg and stop the process
                        if ($remove == false) {
                            //failed to remove img
                            $_SESSION['failed-remove'] = "<div> Failed to remove current image</div>";
                            header('location:' . SITEURL . 'admin/manage-category.php');
                            die();
                        }
                    }
                } else {
                    $image_name = $current_image;
                }
            } else {
                $image_name = $current_image;
            }



            //3. update the db
            $sql2 = "UPDATE tbl_category SET 
            title='$title',
            image_name ='$image_name',
            featured='$featured',
            active='$active'
            WHERE id =$id
            ";

            //execute query
            $res2 = mysqli_query($conn, $sql2);

            //4. reidrect to amnage category with msg

            //check whether executed or not
            if ($res2 == true) {
                //category updated
                $_SESSION['update'] = "<div class='text-green-700'>Category Updated Successfully</div>";
                header('location:' . SITEURL . 'admin/manage-category.php');
            } else {
                $_SESSION['update'] = "<div class='text-red-700'>Category Update Failed </div>";
                header('location:' . SITEURL . 'admin/manage-category.php');
            }
        }
        ?>

    </div>
</div>




<?php include('../admin/partials/footer.php') ?>