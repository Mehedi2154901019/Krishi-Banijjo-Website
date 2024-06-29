<?php
include('config/constants.php');
require_once __DIR__ . '/vendor/autoload.php';

// Check if the order_id is set
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

        // Create a new mPDF instance
        $mpdf = new \Mpdf\Mpdf();

        // Generate the HTML content for the PDF
        $html = '
            <h1 style="text-align: center;">Cash Memo</h1>
            <h3>Order Details</h3>
            <p><strong>Order ID:</strong> ' . $order_id . '</p>
            <p><strong>Order Date:</strong> ' . $order_date . '</p>
            <p><strong>Status:</strong> ' . $status . '</p>
            <hr>
            <h3>Product Details</h3>
            <p><strong>Product:</strong> ' . $product . '</p>
            <p><strong>Price:</strong> Tk ' . $price . '</p>
            <p><strong>Quantity:</strong> ' . $qty . '</p>
            <p><strong>Total:</strong> Tk ' . $total . '</p>
            <hr>
            <h3>Customer Details</h3>
            <p><strong>Name:</strong> ' . $customer_name . '</p>
            <p><strong>Contact:</strong> ' . $customer_contact . '</p>
            <p><strong>Email:</strong> ' . $customer_email . '</p>
            <p><strong>Address:</strong> ' . nl2br($customer_address) . '</p>
        ';

        // Write the HTML content to the PDF file
        $mpdf->WriteHTML($html);

        // Output the PDF file
        $mpdf->Output('cash_memo.pdf', 'D');
    } else {
        // Order not available
        header('Location: ' . SITEURL);
        exit;
    }
} else {
    // Order ID not set
    header('Location: ' . SITEURL);
    exit;
}
?>