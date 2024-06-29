<?php include('../config/constants.php'); 
include('login-check.php');
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Krishi Banijjo - Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.10.1/dist/full.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../css/admin.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <!-- ----- Menu -----  -->
    <div class="menu text-center">
        <div class="wrapper">
            <ul class="flex">
                <li><a href="index.php">Home</a></li>
                <li><a href="manage-admin.php">Admin</a></li>
                <li><a href="manage-category.php">Category</a></li>
                <li><a href="manage-product.php">Product</a></li>
                <li><a href="manage-order.php">Order</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>