<?php include('partials-front/menu.php'); ?>

<?php
// Check whether order_id is set or not
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    // Get the details of the selected order
    $sql = "SELECT * FROM tbl_order WHERE id=$order_id";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);

    if ($count == 1) {
        // We have data
        $row = mysqli_fetch_assoc($res);
        $product = $row['product'];
        $price = $row['price'];
        $qty = $row['qty'];
        $total = $row['total'];
        $order_date = $row['order_date'];
        $status = $row['status'];
        $customer_name = $row['customer_name'];
        $customer_contact = $row['customer_contact'];
        $customer_email = $row['customer_email'];
        $customer_address = $row['customer_address'];
    } else {
        // Order not available
        header('location:' . SITEURL);
    }
} else {
    header('location:' . SITEURL);
}
?>

<section class="cash-memo bg-gray-200 py-20">
    <div class="container">
        <h2 class="text-center font-semibold text-3xl text-black">Cash Memo</h2>
        <div class="memo-content p-4 bg-white shadow-lg">
            <h3 class="text-xl font-semibold">Order Details</h3>
            <p><strong>Order ID:</strong> <?php echo $order_id; ?></p>
            <p><strong>Order Date:</strong> <?php echo $order_date; ?></p>
            <p><strong>Status:</strong> <?php echo $status; ?></p>
            <hr class="my-4">
            <h3 class="text-xl font-semibold">Product Details</h3>
            <p><strong>Product:</strong> <?php echo $product; ?></p>
            <p><strong>Price:</strong> ৳<?php echo $price; ?></p>
            <p><strong>Quantity:</strong> <?php echo $qty; ?></p>
            <p><strong>Total:</strong> ৳<?php echo $total; ?></p>
            <hr class="my-4">
            <h3 class="text-xl font-semibold">Customer Details</h3>
            <p><strong>Name:</strong> <?php echo $customer_name; ?></p>
            <p><strong>Contact:</strong> <?php echo $customer_contact; ?></p>
            <p><strong>Email:</strong> <?php echo $customer_email; ?></p>
            <p><strong>Address:</strong> <?php echo nl2br($customer_address); ?></p>
            <hr class="my-4">
            <a href="<?php echo SITEURL; ?>generate-pdf.php?order_id=<?php echo $order_id; ?>" class="btn btn-primary">Download PDF</a>
        </div>
    </div>
</section>

<?php include('partials-front/footer.php'); ?>
