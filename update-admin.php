<?php include('../admin/partials/menu.php') ?>
<div class="main-content">
    <div class="wrapper">
        <h1 class="text-3xl font-bold mb-4 text-center">Update Admin</h1>

        <?php
        //get the id of selected admin
        $id = $_GET['id'];

        //create sql query
        $sql = "SELECT * FROM tbl_admin WHERE id=$id";

        //execute sql
        $res = mysqli_query($conn, $sql);

        //check the query
        if ($res == TRUE) {
            //check whether the data is available or not
            $count = mysqli_num_rows($res);

            //check whether we have admin data or not
            if ($count == 1) {
                //get the details
                $row = mysqli_fetch_assoc($res);
                $full_name = $row['full_name'];
                $username = $row['username'];
            } else {
                //redirect to manage-admin page
                header('location:' . SITEURL . 'admin/manage-admin.php');
            }
        }
        ?>

        <form action="" method="POST" class="max-w-md mx-auto">
            <div class="mb-4">
                <label for="full_name" class="block text-gray-700 font-bold mb-2">Full Name:</label>
                <input type="text" name="full_name" id="full_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?php echo $full_name ?>">
            </div>

            <div class="mb-4">
                <label for="username" class="block text-gray-700 font-bold mb-2">Username:</label>
                <input type="text" name="username" id="username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?php echo $username ?>">
            </div>

            <div class="flex justify-center">
                <input type="hidden" name="id" id="" value="<?php echo $id ?>">
                <input type="submit" name="submit" value="Update Admin" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            </div>
        </form>
    </div>
</div>

<?php
//check whether the submit button is clicked or not
if (isset($_POST['submit'])) {
    //get all the values from form to update
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];

    //create sql to update
    $sql = "UPDATE tbl_admin SET full_name='$full_name', username='$username' WHERE id='$id'";

    //execute query
    $res = mysqli_query($conn, $sql);

    //check if the query is executed or not
    if ($res == true) {
        //query executed and admin updated
        $_SESSION['update'] = "<div class='bg-green-500 text-white p-4 mb-4 rounded'>Admin Updated Successfully</div>";
        header('location:' . SITEURL . 'admin/manage-admin.php');
    } else {
        //Failed to update
        $_SESSION['update'] = "<div class='bg-red-500 text-white p-4 mb-4 rounded'>Failed to update admin</div>";
        header('location:' . SITEURL . 'admin/manage-admin.php');
    }
}
?>

<?php include('../admin/partials/footer.php') ?>