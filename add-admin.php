<?php include("../admin/partials/menu.php"); ?>
<div class="main-content">
    <div class="wrapper">
        <h1 class="font-bold text-2xl mb-4 text-center">Add Admin</h1>
        <?php
        if (isset($_SESSION['add'])) {
            echo '<div class="bg-green-500 text-white p-4 mb-4 rounded">' . $_SESSION['add'] . '</div>';
            unset($_SESSION['add']);
        }
        ?>
        <form action="" method="POST" class="max-w-md mx-auto">
            <div class="mb-4">
                <label for="full_name" class="block text-gray-700 font-bold mb-2">Full Name:</label>
                <input type="text" name="full_name" id="full_name" placeholder="Enter Your Name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="username" class="block text-gray-700 font-bold mb-2">Username:</label>
                <input type="text" name="username" id="username" placeholder="Your Username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-bold mb-2">Password:</label>
                <input type="password" name="password" id="password" placeholder="Your Password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex items-center justify-between">
                <input type="submit" name="submit" value="Add Admin" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            </div>
        </form>
    </div>
</div>
<?php include("../admin/partials/footer.php"); ?>
<?php
//Process the value from the Form and save it in DB
//Check whether the submit button is clicked or not
if (isset($_POST['submit'])) {
    //Button clicked
    //Get the data from the form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    //SQL Query to save the data into DB
    $sql = "INSERT INTO tbl_admin SET full_name = '$full_name', username = '$username', password = '$password'";

    //executing query and saving data into DB
    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    //check whether the data is inserted or not and display appropriate msg
    if ($res == TRUE) {
        //data inserted
        //create a session var to display msg
        $_SESSION['add'] = "<div class='text-green-800 text-3xl'>Admin added successfully</div>";
        //redirect to manage admin page
        header("location:" . SITEURL . 'admin/manage-admin.php');
    } else {
        //fail to insert data
        //create a session var to display msg
        $_SESSION['add'] = "Admin Added Failed";
        //redirect to add admin page
        header("location:" . SITEURL . 'admin/add-admin.php');
    }
}
?>