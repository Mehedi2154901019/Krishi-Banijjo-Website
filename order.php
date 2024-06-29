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
        $title = $row['title'];
        $price = $row['price'];
        $image_name = $row['image_name'];
    } else {
        // product not available
        header('location:' . SITEURL);
    }
} else {
    header('location:' . SITEURL);
}
?>

<?php
if (isset($_POST['submit'])) {
    $product = $_POST['product'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $total = $price * $qty;
    $order_date = date("Y-m-d h:i:sa");
    $status = "Ordered";
    $customer_name = $_POST['full-name'];
    $customer_contact = $_POST['contact'];
    $customer_email = $_POST['email'];
    $customer_address = $_POST['address'];

    // Save the order in db
    $sql2 = "INSERT INTO tbl_order SET
    product = '$product',
    price = $price,
    qty=$qty,
    total = $total,
    order_date = '$order_date',
    status = '$status',
    customer_name = '$customer_name',
    customer_contact = '$customer_contact',
    customer_email = '$customer_email',
    customer_address = '$customer_address'";

    $res2 = mysqli_query($conn, $sql2);
    if ($res2 == true) {
        // Query executed and order saved
        $order_id = mysqli_insert_id($conn); // Get the ID of the inserted order
        $_SESSION['order'] = "<div class='text-green-700'>Product Ordered Successfully</div>";
        header('location:' . SITEURL . 'cash-memo.php?order_id=' . $order_id); // Redirect to cash memo page
        exit;
    } else {
        // Failed to save order
        $_SESSION['order'] = "<div class='text-red-700'>Product Order Failed</div>";
        header('location:' . SITEURL);
        exit;
    }
}
?>

<section class="product-search bg-gray-200 py-20">
    <div class="container">

        <h2 class="text-center font-semibold text-3xl text-black">Fill this form to confirm your order.</h2>

        <form action="" method="POST" class="order">
            <fieldset class="mb-6 p-4">
                <legend class="text-2xl text-black font-semibold">Selected product</legend>

                <div class="product-menu-img">
                    <?php
                    if ($image_name == "") {
                        echo "Image Not Available";
                    } else {
                    ?>
                        <img src="<?php echo SITEURL ?>images/product/<?php echo $image_name ?>" class="img-responsive img-curve w-full h-52">
                    <?php
                    }
                    ?>
                </div>

                <div class="product-menu-desc ">
                    <h3 class="text-xl font-semibold"><?php echo $title ?></h3>
                    <input type="hidden" name="product" id="" value="<?php echo $title ?>">
                    <p class="product-price text-xl font-semibold">৳<?php echo $price ?></p>
                    <input type="hidden" name="price" id="" value="<?php echo $price ?>">
                    <div class="order-label">Quantity</div>
                    <input type="number" name="qty" class="input-responsive" value="1" required>
                </div>
            </fieldset>

            <fieldset class="p-4">
                <legend class="text-2xl text-black font-semibold">Delivery Details</legend>
                <div class="order-label">Full Name</div>
                <input type="text" name="full-name" placeholder="Enter Your Full Name" class="input-responsive" required>

                <div class="order-label">Phone Number</div>
                <input type="tel" name="contact" placeholder="Enter Your Phone Number" class="input-responsive" required>

                <div class="order-label">Email</div>
                <input type="email" name="email" placeholder="Enter Your Email Address" class="input-responsive" required>

                <div class="order-label">Address</div>
                <textarea name="address" rows="10" placeholder="Enter Your Address" class="input-responsive" required></textarea>

                <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
            </fieldset>
        </form>
    </div>
</section>

<?php include('partials-front/footer.php'); ?>
