<?php include('partials/menu.php'); ?>

<?php
if (isset($_GET['id'])) {
    //get all the details
    $id = $_GET['id'];
    $sql2 = "SELECT * FROM tbl_product WHERE id=$id";
    $res2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($res2);

    //get the individual values of selected product
    $title = $row2['title'];
    $description = $row2['description'];
    $price = $row2['price'];
    $current_image = $row2['image_name'];
    $current_category = $row2['category_id'];
    $featured = $row2['featured'];
    $active = $row2['active'];
} else {
    header('location:' . SITEURL . 'admin/manage-product.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //1. get all the details from form
    $id = $_POST['id'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $current_image = $_POST['current_image'];
    $category = $_POST['category'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];

    //2. upload the img if selected
    //check whether upload btn is clicked
    if (isset($_FILES['image']['name'])) {
        $image_name = $_FILES['image']['name'];

        //check whether the file is available or not
        if ($image_name != "") {
            //image is available
            //rename the img
            $ext = end(explode('.', $image_name));
            $image_name = "product-Name" . rand(0000, 99999) . '.' . $ext;
            //get the src and dst path
            $src_path = $_FILES['image']['tmp_name'];
            $dst_path = "../images/product/" . $image_name;

            //upload the img
            $upload = move_uploaded_file($src_path, $dst_path);

            if ($upload == false) {
                //failed to up 
                $_SESSION['upload'] = "<div class='text-red-700'>Failed to upload image</div>";
                header('location:' . SITEURL . 'admin/manage-product.php');
                die();
            }

            //3. remove the img if new img is uploaded and current img exists
            if ($current_image != "") {
                //current img achee
                $remove_path = "../images/product/" . $current_image;
                $remove = unlink($remove_path);
                if ($remove == false) {
                    //failed to remove current img
                    $_SESSION['remove-failed'] = "<div>Failed to remove current image</div>";
                    header('location:' . SITEURL . 'admin/manage-product.php');
                    die();
                }
            }
        } else {
            //default img when img is not selected
            $image_name = $current_image;
        }
    } else {
        //default img when button is not clicked
        $image_name = $current_image;
    }

    //4. upload the product in db
    //4. upload the product in db
    $sql3 = "UPDATE tbl_product SET
title = '$title',
description = '$description',
price=$price,
image_name = '$image_name',
category_id = '$category',
featured='$featured',
active='$active'
WHERE id = $id
";

    $res3 = mysqli_query($conn, $sql3);
    if ($res3 == true) {
        $_SESSION['update'] = "<div class='text-green-700'>product Updated Successfully</div>";
        header('location:' . SITEURL . 'admin/manage-product.php');
    } else {
        $_SESSION['update'] = "<div class='text-red-700'>product Updated Failed</div>";
        header('location:' . SITEURL . 'admin/manage-product.php');
    }
}
?>

<div class="main-content">
    <div class="wrapper">
        <h1 class="text-3xl font-semibold mb-4">Update Product</h1>
        <br>
        <br>
        <form action="" method="POST" enctype="multipart/form-data" class="max-w-lg mx-auto">
            <table class="w-full">
                <tr>
                    <td class="py-2">Title:</td>
                    <td class="py-2">
                        <input type="text" name="title" id="" class="border border-gray-300 rounded px-2 py-1 w-full" value="<?php echo $title; ?>">
                    </td>
                </tr>
                <tr>
                    <td class="py-2">Description:</td>
                    <td class="py-2">
                        <textarea name="description" id="" cols="30" rows="10" class="border border-gray-300 rounded px-2 py-1 w-full"><?php echo htmlspecialchars($description); ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td class="py-2">Price:</td>
                    <td class="py-2">
                        <input type="number" name="price" id="" class="border border-gray-300 rounded px-2 py-1 w-full" value="<?php echo $price; ?>">
                    </td>
                </tr>
                <tr>
                    <td class="py-2">Current Image</td>
                    <td class="py-2">
                        <?php
                        if ($current_image == "") {
                            //img not available
                            echo "<div class='text-red-700'> Image not Available </div>";
                        } else {
                            //img available
                        ?>
                            <img width="150" src="<?php echo SITEURL; ?>images/product/<?php echo $current_image; ?>">
                        <?php
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="py-2">Select New Image</td>
                    <td class="py-2">
                        <input type="file" name="image" id="">
                    </td>
                </tr>

                <tr>
                    <td class="py-2">Category:</td>
                    <td class="py-2">
                        <select name="category" id="" class="border border-gray-300 rounded px-2 py-1 w-full">
                            <?php
                            $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
                            $res = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($res);
                            if ($count > 0) {
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $category_title = $row['title'];
                                    $category_id = $row['id'];

                                    // Use the option value and text properly
                                    // Add selected attribute to the option if it matches the current category
                            ?>
                                    <option <?php if ($current_category == $category_id) {
                                                echo "selected";
                                            } ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                            <?php
                                }
                            } else {
                                echo "<option value='0'>Category not available</option>";
                            }
                            ?>
                        </select>

                    </td>
                </tr>
                <tr>
                    <td class="py-2">Featured:</td>
                    <td class="py-2">
                        <input type="radio" <?php
                                            if ($featured == "Yes") {
                                                echo "checked";
                                            }
                                            ?> name="featured" value="Yes" id="" class="mr-2">
                        <label for="featured" class="mr-4">Yes</label>
                        <input type="radio" <?php
                                            if ($featured == "No") {
                                                echo "checked";
                                            }
                                            ?> name="featured" value="No" id="" class="mr-2">
                        <label for="featured">No</label>
                    </td>
                </tr>
                <tr>
                    <td class="py-2">Active:</td>
                    <td class="py-2">
                        <input type="radio" <?php if ($active == "Yes") {
                                                echo "checked";
                                            } ?> name="active" value="Yes" id="" class="mr-2">
                        <label for="active" class="mr-4">Yes</label>
                        <input type="radio" <?php if ($active == "No") {
                                                echo "checked";
                                            } ?> name="active" value="No" id="" class="mr-2">
                        <label for="active">No</label>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>" id="">
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>" id="">
                        <input type="submit" name="submit" value="Update product" class="btn btn-primary py-2 px-4 rounded bg-blue-500 text-white">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>