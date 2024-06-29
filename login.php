<?php include('../config/constants.php'); ?>
<html>

<head>
    <title>Login - Krishi Banijjo</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-200 h-screen flex justify-center items-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-96">
        <h1 class="text-2xl font-semibold mb-4 text-center">Login</h1>
        <?php 
        if(isset($_SESSION['login'])){
            echo '<div class="text-red-500 mb-4">' . $_SESSION['login'] . '</div>';
            unset($_SESSION['login']);
        }
        if(isset($_SESSION['no-login-message'])){
            echo '<div class="text-red-500 mb-4">' . $_SESSION['no-login-message'] . '</div>';
            unset($_SESSION['no-login-message']);
        }        
        ?>
        <form action="" method="POST">
            <div class="mb-4">
                <label for="username" class="block text-gray-700">Username:</label>
                <input type="text" name="username" id="username" class="w-full px-3 py-2 border rounded-md">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password:</label>
                <input type="password" name="password" id="password" class="w-full px-3 py-2 border rounded-md">
            </div>
            <button type="submit" name="submit" class="w-full py-2 px-4 bg-green-500 text-white rounded-md">Login</button>
        </form>
    </div>
</body>

</html>

<?php
//check whether the submit btn is clicked or not

if (isset($_POST['submit'])) {
    //process for login
    //1.Get the data from login form
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    //2. check sql whether usernmae and pass exist or not
    $sql = "SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password'";

    //3. execute the query
    $res = mysqli_query($conn,$sql);

    //4. count the rows to check whether the user exist or not
    $count = mysqli_num_rows($res);

    if($count == 1){
        //user available & login success
        $_SESSION['login'] = "<div class='text-green-600'>Login Successful</div>";
        header("location:".SITEURL.'admin/');
        $_SESSION['user'] = $username; //to check whether the user is logged in or not and logged out will unset it
    }
    else {
        //user not available
        $_SESSION['login'] = "Login Failed. Username & Password didn't match.";
        header("location:".SITEURL.'admin/login.php');
    }
}
?>
