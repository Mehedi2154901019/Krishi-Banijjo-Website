<?php
ob_start(); // Start output buffering
include('partials/menu.php');
?>
<div class="main-content">
    <div class="wrapper">
        <h1 class="text-3xl font-semibold mb-4">Add Product</h1>
        <br>

        <?php
        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']); // Clear the session variable
        }

        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']); // Clear the session variable
        }
        ?>

        <form action="" method="POST" enctype="multipart/form-data" class="space-y-4">
            <div>
                <label for="title" class="block font-medium">Title:</label>
                <input type="text" name="title" id="title" placeholder="Title of the product" class="w-full border border-gray-300 rounded px-2 py-1">
            </div>
            <div>
                <label for="description" class="block font-medium">Description:</label>
                <textarea name="description" id="description" cols="30" rows="10" placeholder="Description" class="w-full border border-gray-300 rounded px-2 py-1"></textarea>
            </div>
            <div>
                <label for="price" class="block font-medium">Price:</label>
                <input type="number" name="price" id="price" class="w-full border border-gray-300 rounded px-2 py-1">
            </div>
            <div>
                <label for="image" class="block font-medium">Select Image:</label>
                <input type="file" name="image" id="image" class="w-full border border-gray-300 rounded px-2 py-1">
            </div>
            <div>
                <label for="video" class="block font-medium">Select Video:</label>
                <input type="file" name="video" id="video" class="w-full border border-gray-300 rounded px-2 py-1">
            </div>
            <div>
                <label for="category" class="block font-medium">Category:</label>
                <select name="category" id="category" class="w-full border border-gray-300 rounded px-2 py-1">
                    <?php
                    //create php code to display categories from db
                    //create sql query to get all active categories from db
                    $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
                    //execute sql
                    $res = mysqli_query($conn, $sql);
                    //count the rows to see whether we have categories or not
                    $count = mysqli_num_rows($res);
                    //if $count>0 then we have categories
                    if ($count > 0) {
                        //has categories
                        while ($row = mysqli_fetch_assoc($res)) {
                            //get the details of categories
                            $id = $row['id'];
                            $title = $row['title'];
                            ?>
                            <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                        <?php
                        }
                    } else {
                        //don't have categories
                        ?>
                        <option value="0">No Category Found</option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="flex items-center">
                <label for="featured" class="block font-medium mr-2">Featured:</label>
                <div class="flex items-center">
                    <input type="radio" name="featured" value="Yes" id="featured-yes" class="mr-1">
                    <label for="featured-yes" class="mr-4">Yes</label>
                    <input type="radio" name="featured" value="No" id="featured-no" class="mr-1">
                    <label for="featured-no">No</label>
                </div>
            </div>
            <div class="flex items-center">
                <label for="active" class="block font-medium mr-2">Active:</label>
                <div class="flex items-center">
                    <input type="radio" name="active" value="Yes" id="active-yes" class="mr-1">
                    <label for="active-yes" class="mr-4">Yes</label>
                    <input type="radio" name="active" value="No" id="active-no" class="mr-1">
                    <label for="active-no">No</label>
                </div>
            </div>
            <div>
                <input type="submit" name="submit" value="Add product" class="btn btn-primary py-2 px-4 rounded bg-blue-500 text-white">
            </div>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category = $_POST['category'];
            //check whether radio btn for featured and active are checked or not 
            if (isset($_POST['featured'])) {
                $featured = $_POST['featured'];
            } else {
                $featured = "No";
            }
            if (isset($_POST['active'])) {
                $active = $_POST['active'];
            } else {
                $active = "No";
            }

            //upload the image if selected
            //check whether the select image is clicked or not and upload the image only if the image is selected
            if (isset($_FILES['image']['name'])) {
                //get the details of selected image
                $image_name = $_FILES['image']['name'];
                //check whether image is selected or not and upload image only if selected
                if ($image_name != "") {
                    //image is selected
                    //rename the image
                    //get the extension 
                    $ext = end(explode('.', $image_name));
                    $image_name = "Product-Name-" . rand(0, 99999) . "." . $ext;

                    //upload the image 
                    //get the source and destination path
                    $src = $_FILES['image']['tmp_name'];
                    $dst = "../images/product/" . $image_name;

                    //finally upload the image
                    $upload = move_uploaded_file($src, $dst);

                    //check whether uploaded or not 
                    if ($upload == false) {
                        $_SESSION['upload'] = "<div>Failed to upload image</div>";
                        header('location:' . SITEURL . 'admin/add-product.php');
                        exit();
                    }
                }
            } else {
                $image_name = "";
            }

            //upload the video if selected
            //check whether the select video is clicked or not and upload the video only if the video is selected
            if (isset($_FILES['video']['name'])) {
                //get the details of selected video
                $video_name = $_FILES['video']['name'];
                //check whether video is selected or not and upload video only if selected
                if ($video_name != "") {
                    //video is selected
                    //rename the video
                    //get the extension 
                    $ext = end(explode('.', $video_name));
                    $video_name = "Product-Video-" . rand(0, 99999) . "." . $ext;

                    //upload the video 
                    //get the source and destination path
                    $src = $_FILES['video']['tmp_name'];
                    $dst = "../videos/" . $video_name;

                    //finally upload the video
                    $upload = move_uploaded_file($src, $dst);

                    //check whether uploaded or not 
                    if ($upload == false) {
                        $_SESSION['upload'] = "<div>Failed to upload video</div>";
                        header('location:' . SITEURL . 'admin/add-product.php');
                        exit();
                    }
                }
            } else {
                $video_name = "";
            }

            //insert into db
            //create sql to save or add product
            $sql2 = "INSERT INTO tbl_product SET
            title = '$title',
            description = '$description',
            image_name = '$image_name',
            video_name = '$video_name',
            category_id = $category,
            price = $price,
            featured = '$featured',
            active = '$active'
            ";

            //execute the sql
            $res2 = mysqli_query($conn, $sql2);

            if ($res2 == true) {
                $_SESSION['add'] = "<div>Product Added successfully </div>";
                if (!headers_sent()) {
                    header('Location: ' . SITEURL . 'admin/manage-product.php');
                    exit;
                } else {
                    echo "Cannot redirect because headers have already been sent.";
                }
            } else {
                $_SESSION['add'] = "<div>Product Added failed </div>";
                if (!headers_sent()) {
                    header('Location: ' . SITEURL . 'admin/manage-product.php');
                    exit;
                } else {
                    echo "Cannot redirect because headers have already been sent.";
                }
            }
        }
        ?>
    </div>
</div>

<?php
ob_end_flush(); // Flush the output buffer
include('partials/footer.php');
?>
