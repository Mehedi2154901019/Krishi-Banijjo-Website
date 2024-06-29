<?php include("../admin/partials/menu.php") ?>
<!-- ----- Main ----- -->
<div class="main-content">
    <div class="wrapper">
        <h1 class="my-2 text-2xl font-bold">MANAGE ADMIN</h1>
        <?php
        if (isset($_SESSION['add'])) {
            echo '<div class="bg-green-500 text-white p-4 mb-4 rounded">' . $_SESSION['add'] . '</div>';
            unset($_SESSION['add']);
        }
        if (isset($_SESSION['delete'])) {
            echo '<div class="bg-red-500 text-white p-4 mb-4 rounded">' . $_SESSION['delete'] . '</div>';
            unset($_SESSION['delete']);
        }
        if (isset($_SESSION['update'])) {
            echo '<div class="bg-yellow-500 text-white p-4 mb-4 rounded">' . $_SESSION['update'] . '</div>';
            unset($_SESSION['update']);
        }
        if (isset($_SESSION['user-not-found'])) {
            echo '<div class="bg-red-500 text-white p-4 mb-4 rounded">' . $_SESSION['user-not-found'] . '</div>';
            unset($_SESSION['user-not-found']);
        }
        if (isset($_SESSION['pwd-not-matched'])) {
            echo '<div class="bg-red-500 text-white p-4 mb-4 rounded">' . $_SESSION['pwd-not-matched'] . '</div>';
            unset($_SESSION['pwd-not-matched']);
        }
        if (isset($_SESSION['change-pwd'])) {
            echo '<div class="bg-green-500 text-white p-4 mb-4 rounded">' . $_SESSION['change-pwd'] . '</div>';
            unset($_SESSION['change-pwd']);
        }
        ?>
        <br>
        <br>
        <a href="add-admin.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Admin</a>
        <table class="w-full my-5 border-collapse">
            <thead>
                <tr class="border-b-2 border-indigo-600">
                    <th class="px-2 py-2">Serial Number</th>
                    <th class="px-2 py-2">Fullname</th>
                    <th class="px-2 py-2">Username</th>
                    <th class="px-2 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //Query to get all admins
                $sql = 'SELECT * from tbl_admin';
                $res = mysqli_query($conn, $sql);
                if ($res == TRUE) {
                    //count the rows to check whether we have data in db or not
                    $count = mysqli_num_rows($res);
                    $sn = 1;
                    //check the num of rows
                    if ($count > 0) {
                        //we have data in db
                        while ($rows = mysqli_fetch_assoc($res)) {
                            //using while loop to get all the data
                            // get individual data
                            $id = $rows['id'];
                            $full_name = $rows['full_name'];
                            $username = $rows['username'];
                            //display the values in our table
                            ?>
                            <tr class="border-b">
                                <td class="px-2 py-2 text-center"><?php echo $sn++; ?></td>
                                <td class="px-2 py-2 text-center"><?php echo $full_name; ?></td>
                                <td class="px-2 py-2 text-center"><?php echo $username; ?></td>
                                <td class="px-2 py-2 text-center">
                                    <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Change Password</a>
                                    <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-2">Update Admin</a>
                                    <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete Admin</a>
                                </td>
                            </tr>
                        <?php
                        }
                    }
                } else {
                    //we don't have data in db
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<!-- ----- Footer ----- -->
<?php include("../admin/partials/footer.php") ?>