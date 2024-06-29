<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1 class="text-2xl font-bold mb-4 text-center">Add Category</h1>

        <?php
        if (isset($_SESSION['add'])) {
            echo '<div class="bg-green-500 text-white p-4 mb-4 rounded">' . $_SESSION['add'] . '</div>';
            unset($_SESSION['add']);
        }
        if (isset($_SESSION['upload'])) {
            echo '<div class="bg-red-500 text-white p-4 mb-4 rounded">' . $_SESSION['upload'] . '</div>';
            unset($_SESSION['upload']);
        }
        ?>

        <!-- Add category start -->
        <form action="" enctype="multipart/form-data" method="POST" class="max-w-md mx-auto">
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-bold mb-2">Title:</label>
                <input type="text" name="title" id="title" placeholder="Category Title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700 font-bold mb-2">Select Images:</label>
                <input type="file" name="image" id="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Featured:</label>
                <div class="flex items-center">
                    <input type="radio" name="featured" value="Yes" class="mr-2">
                    <label for="featured" class="mr-4">Yes</label>
                    <input type="radio" name="featured" value="No" class="mr-2">
                    <label for="featured">No</label>
                </div>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Active:</label>
                <div class="flex items-center">
                    <input type="radio" name="active" value="Yes" class="mr-2">
                    <label for="active" class="mr-4">Yes</label>
                    <input type="radio" name="active" value="No" class="mr-2">
                    <label for="active">No</label>
                </div>
            </div>
            <div class="flex justify-center">
                <input type="submit" name="submit" value="Add Category" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            </div>
        </form>

        <!-- Add category end -->
        <?php
        //check submit btn is clicked
        if (isset($_POST['submit'])) {
            // 1. Get the values from the form 
            $title = $_POST['title'];
            // For radio input type we need to check whether the btn is selected or not
            if (isset($_POST['featured'])) {
                //get the value from form
                $featured = $_POST['featured'];
            } else {
                //set the default value
                $featured = "No";
            }
            if (isset($_POST['active'])) {
                //get the value from form
                $active = $_POST['active'];
            } else {
                //set the default value
                $active = "No";
            }
            //check img is selected or not , set value for img name
            if (isset($_FILES['image']['name'])) {
                //upload the img
                //to upload img we need img name , source path and destination path
                $image_name = $_FILES['image']['name'];
                //upload the image only if image is selected
                if ($image_name != "") {

                    //auto rename our images
                    // get the extension of our image (jpg,png,gif) e.g pizza1.jpg
                    $ext = end(explode('.', $image_name));
                    $image_name = "Product_Category_" . rand(000, 9999) . '.' . $ext;  //e.g product_category_989.jpg 

                    $source_path = $_FILES['image']['tmp_name'];
                    $destination_path = "../images/category/" . $image_name;
                    //upload the img
                    $upload = move_uploaded_file($source_path, $destination_path);

                    //check whether the img is uploaded or not 
                    // and if the img is not uploaded then we will stop the process and redirect with error
                    if ($upload == false) {
                        //set msg
                        $_SESSION['upload'] = "<div>Failed to upload image.</div>";
                        header('location:' . SITEURL . 'admin/add-category.php');
                        die();
                    }
                }
            } else {
                //don't upload img and set image_name as blank
                $image_name = "";
            }

            // 2. create sql query to insert data in db 
            $sql = "INSERT INTO tbl_category SET 
                    title='$title',
                    image_name='$image_name',
                    featured='$featured',
                    active='$active'
                ";
            // 3. execute the query and save in db
            $res = mysqli_query($conn, $sql);

            //4. Check whether the  query executed or not and data added or not
            if ($res == true) {
                // query executed and category added
                $_SESSION['add'] = "<div>Category added successfully.</div>";
                header('location:' . SITEURL . 'admin/manage-category.php');
            } else {
                // failed to add category 
                $_SESSION['add'] = "<div>Category added failed.</div>";
                header('location:' . SITEURL . 'admin/add-category.php');
            }
        }
        ?>
    </div>
</div>

<?php include('partials/footer.php') ?>