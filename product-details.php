<?php include('partials-front/menu.php'); ?>
<?php
// Check whether product_id is set or not
if (isset($_GET['product_id'])) {
    // Get the product id and details of the selected product
    $product_id = $_GET['product_id'];
    // Get the details of the selected product
    $sql = "SELECT * FROM tbl_product WHERE id=$product_id";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);
    if ($count == 1) {
        // We have data
        $row = mysqli_fetch_assoc($res);
        $id = $row['id'];
        $title = $row['title'];
        $price = $row['price'];
        $description = $row['description'];
        $image_name = $row['image_name'];
        $video_name = $row['video_name']; // Added to fetch video name
    } else {
        // product not available
        header('location:' . SITEURL);
    }
} else {
    header('location:' . SITEURL);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <div class="bg-white rounded-lg overflow-hidden shadow-lg">
            <div class="relative">
                <?php
                if ($image_name == "") {
                    echo "<div class='text-red-700 p-4'>Image Not Available</div>";
                } else {
                ?>
                    <img src="<?php echo SITEURL ?>images/product/<?php echo $image_name ?>" style="height: 500px;" class="w-full object-cover">
                <?php
                }
                ?>

                <!-- Add video if available -->
                <?php if ($video_name != ""): ?>
                    <div class="flex justify-center items-center py-4">
                        <video controls class="w-2/3 h-auto">
                            <source src="<?php echo SITEURL ?>videos/<?php echo $video_name ?>" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                <?php endif; ?>
            </div>
            <div class="p-6">
                <h2 class="text-2xl font-bold mb-2"><?php echo $title ?></h2>
                <p class="text-gray-600 mb-4">৳<?php echo $price ?></p>
                <p class="text-gray-700 mb-4"><?php echo $description ?></p>
                <a href="<?php echo SITEURL ?>order.php?product_id=<?php echo $id ?>" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 hover:text-white">Order Now</a>
            </div>
        </div>
    </div>
</body>
</html>

<?php include('partials-front/footer.php') ?>
