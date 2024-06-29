<?php include('config/constants.php'); ?>
<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Krishi Banijjo</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.11.1/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full">
    <!-- Navbar Section Starts Here -->
    <nav class="bg-gray-800">
        <div class="container mx-auto px-4 py-3 flex items-center justify-between">
            <div class="logo flex">
                <a href="<?php echo SITEURL; ?>" title="Logo">
                    <img src="images/logo.png" alt="Krishi Banijjo Logo" class="h-8">
                </a>
                <a href="<?php echo SITEURL; ?>">
                    <h1 class="text-white ml-1">কৃষি বানিজ্য</h1>
                </a>
            </div>
            <div class="menu">
                <ul class="flex space-x-4 text-white">
                    <li>
                        <a href="<?php echo SITEURL; ?>" class="hover:text-gray-300">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>categories.php" class="hover:text-gray-300">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>products.php" class="hover:text-gray-300">Products</a>
                    </li>
                    <li>
                        <a href="contact.php" class="hover:text-gray-300">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar Section Ends Here -->
</body>

</html>