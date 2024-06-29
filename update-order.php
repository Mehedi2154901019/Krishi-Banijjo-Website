<?php
include("../admin/partials/menu.php");

if(isset($_POST['submit'])){
    // Handle form submission
    $id = $_POST['id'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $total = $price * $qty; // Calculate total
    $status = $_POST['status'];
    $customer_name = $_POST['customer_name'];
    $customer_contact = $_POST['customer_contact'];
    $customer_email = $_POST['customer_email'];
    $customer_address = $_POST['customer_address'];

    $sql2 = "UPDATE tbl_order SET
    qty =$qty,
    total=$total,
    status='$status',
    customer_name ='$customer_name',
    customer_contact = '$customer_contact',
    customer_address = '$customer_address'
    WHERE id=$id
    ";
    $res2 = mysqli_query($conn,$sql2);
    if($res2 == true){
        //updated
        $_SESSION['update'] ="<div class='text-green-700'>Order Updated Successfully</div>";
        header('location:'.SITEURL.'admin/manage-order.php');
        exit(); // Terminate script execution after redirection
    }
    else {
        //failed to update
        $_SESSION['update'] ="<div class='text-red-700'>Order Updated Failed</div>";
        header('location:'.SITEURL.'admin/manage-order.php');
        exit(); // Terminate script execution after redirection
    }
}

// Fetch order details for display
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tbl_order WHERE id=$id";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);
    if ($count == 1) {
        //details available
        $row = mysqli_fetch_assoc($res);
        $product = $row['product'];
        $price = $row['price'];
        $qty = $row['qty'];
        $status = $row['status'];
        $customer_name = $row['customer_name'];
        $customer_contact = $row['customer_contact'];
        $customer_email = $row['customer_email'];
        $customer_address = $row['customer_address'];
    } else {
        header('location:' . SITEURL . 'admin/manage-order.php');
        exit(); // Terminate script execution after redirection
    }
} else {
    header('location:' . SITEURL . 'admin/manage-order.php');
    exit(); // Terminate script execution after redirection
}
?>
<div class="main-content">
    <div class="wrapper">
        <h1 class="text-3xl font-semibold mb-4">Update Order</h1>
        <form action="" method="POST">
            <table class="border-collapse border border-gray-300">
                <tr>
                    <td class="py-2 px-4 border border-gray-300 font-semibold">product Name</td>
                    <td class="py-2 px-4 border border-gray-300"><b><?php echo $product ?></b></td>
                </tr>
                <tr>
                    <td class="py-2 px-4 border border-gray-300 font-semibold">Price</td>
                    <td class="py-2 px-4 border border-gray-300"><b><?php echo '৳'.$price ?></b></td>
                </tr>
                <tr>
                    <td class="py-2 px-4 border border-gray-300 font-semibold">Qty</td>
                    <td class="py-2 px-4 border border-gray-300">
                        <input type="number" name="qty" value="<?php echo $qty ?>" class="border border-gray-300 rounded px-2 py-1 w-32"> 
                    </td>
                </tr>
                <tr>
                    <td class="py-2 px-4 border border-gray-300 font-semibold">Status</td>
                    <td class="py-2 px-4 border border-gray-300">
                        <select name="status" class="border border-gray-300 rounded px-2 py-1">
                            <option <?php if($status == "Ordered"){echo "selected";} ?>value="Ordered">Ordered</option>
                            <option <?php if($status == "On Delivery"){echo "selected";} ?> value="On Delivery">On Delivery</option>
                            <option <?php if($status == "Delivered"){echo "selected";} ?>value="Delivered">Delivered</option>
                            <option <?php if($status == "Cancelled"){echo "selected";} ?>value="Cancelled">Cancelled</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="py-2 px-4 border border-gray-300 font-semibold">Customer Name</td>
                    <td class="py-2 px-4 border border-gray-300">
                        <input type="text" name="customer_name" class="border border-gray-300 rounded px-2 py-1 w-full" value="<?php echo $customer_name ?>" >
                    </td>
                </tr>
                <tr>
                    <td class="py-2 px-4 border border-gray-300 font-semibold">Customer Contact</td>
                    <td class="py-2 px-4 border border-gray-300">
                        <input type="text" name="customer_contact" class="border border-gray-300 rounded px-2 py-1 w-full" value="<?php echo $customer_contact ?>">
                    </td>
                </tr>
                <tr>
                    <td class="py-2 px-4 border border-gray-300 font-semibold">Customer Email</td>
                    <td class="py-2 px-4 border border-gray-300">
                        <input type="text" name="customer_email" class="border border-gray-300 rounded px-2 py-1 w-full" value="<?php echo $customer_email ?>">
                    </td>
                </tr>
                <tr>
                    <td class="py-2 px-4 border border-gray-300 font-semibold">Customer Address</td>
                    <td class="py-2 px-4 border border-gray-300">
                        <textarea name="customer_address" class="border border-gray-300 rounded px-2 py-1 w-full" cols="30" rows="5" ><?php echo $customer_address ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="py-2 px-4 border border-gray-300">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <input type="hidden" name="price" value="<?php echo $price ?>">
                        <input class="btn btn-success py-2 px-4 rounded bg-green-500 text-white" type="submit" name="submit" value="Update Order">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include("../admin/partials/footer.php") ?>
