<?php include("../admin/partials/menu.php") ?>
<div class="main-content">
    <div class="wrapper">
        <h1 class="text-3xl font-bold mb-4 text-center">Change Password</h1>

        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        ?>

        <form action="" method="POST" class="max-w-md mx-auto">
            <div class="mb-4">
                <label for="current_password" class="block text-gray-700 font-bold mb-2">Current Password:</label>
                <input type="password" name="current_password" id="current_password" placeholder="Current Password" class="shadow border rounded w-full py-2 px-3 text-gray-700 ">
            </div>

            <div class="mb-4">
                <label for="new_password" class="block text-gray-700 font-bold mb-2">New Password:</label>
                <input type="password" name="new_password" id="new_password" placeholder="New Password" class="shadow border rounded w-full py-2 px-3 text-gray-700 ">
            </div>

            <div class="mb-4">
                <label for="confirm_password" class="block text-gray-700 font-bold mb-2">Confirm Password:</label>
                <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" class="shadow border rounded w-full py-2 px-3 text-gray-700 ">
            </div>

            <div class="flex justify-center">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit" name="submit" value="Change Password">
            </div>
        </form>
    </div>
</div>

<?php
//check whether the submit button is clicked or not
if (isset($_POST['submit'])) {
    //get data from form
    $id = $_POST['id'];
    $current_password = md5($_POST['current_password']);
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);

    //check whether the user with current id and password exist or not
    $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password= '$current_password' ";

    //execute the query
    $res = mysqli_query($conn, $sql);

    if ($res == true) {
        //check if data is available
        $count = mysqli_num_rows($res);
        if ($count == 1) {
            //user exist & pass can be changed
            //check whether the new pass and confirm pass matches or not
            if ($new_password == $confirm_password) {
                //update the pass
                $sql2 = "UPDATE tbl_admin SET 
                password='$new_password'
                WHERE id =$id
                ";
                $res2 = mysqli_query($conn, $sql2);
                if ($res2 == true) {
                    //redirect to manage-admin page with success msg
                    $_SESSION['change-pwd'] = "<div class='bg-green-500 text-white p-4 mb-4 rounded'>
                Password changed successfully. 
                </div>";
                    //redirect the user
                    header('location:' . SITEURL . 'admin/manage-admin.php');
                } else {
                    $_SESSION['change-pwd'] = "<div class='bg-red-500 text-white p-4 mb-4 rounded'>
                    Failed to change password 
                </div>";
                    //redirect the user
                    header('location:' . SITEURL . 'admin/manage-admin.php');
                }
            } else {
                //redirect to manage-admin page with error msg
                $_SESSION['pwd-not-matched'] = "<div class='bg-red-500 text-white p-4 mb-4 rounded'>
            Password didn't match   
            </div>";
                //redirect the user
                header('location:' . SITEURL . 'admin/manage-admin.php');
            }
        } else {
            //user doesn't exist , send msg and redirect
            $_SESSION['user-not-found'] = "<div class='bg-red-500 text-white p-4 mb-4 rounded'>
            User not found
            </div>";
            //redirect the user
            header('location:' . SITEURL . 'admin/manage-admin.php');
        }
    }
}
?>

<?php include("../admin/partials/footer.php") ?>