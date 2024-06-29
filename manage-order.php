<?php include("../admin/partials/menu.php") ?>


<div class="main-content">
    <div class="wrapper">
        <h1>Manage Order</h1>
        <br>
        <?php 
        if(isset($_SESSION['update'])){
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        ?>
        <br>
        <table class="w-full my-5">
            <tr class="border-b-2 border-indigo-600 ">
                <th>Serial Number</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Customer Name</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
            <?php
            $sn = 1; //serial number
            //get all the orders from db
            $sql = "SELECT * FROM tbl_order ORDER BY id DESC";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            if ($count > 0) {
                //order available
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
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
                
            ?>
                <tr>
                    <td class="px-2 text-center"><?php echo $sn++ ?></td>
                    <td class="px-2 text-center"><?php echo $product ?></td>
                    <td class="px-2 text-center"><?php echo '৳'.$price ?></td>
                    <td class="px-2 text-center"><?php echo $qty ?></td>
                    <td class="px-2 text-center"><?php echo '৳'.$total ?></td>
                    <td class="px-2 text-center"><?php echo $order_date ?></td>

                    <td class="px-2 text-center">

                       <?php
                       if($status == "Ordered"){
                        echo "<label style='color:purple'>$status</label>";
                       }
                       elseif($status == "On Delivery"){
                        echo "<label style='color:orange'>$status</label>";
                       }
                       elseif($status == "Delivered"){
                        echo "<label style='color:green'>$status</label>";
                       }
                       elseif($status == "Cancelled"){
                        echo "<label style='color:red'>$status</label>";
                       }
                       
                       ?>
                    
                    </td>

                    <td class="px-2 text-center"><?php echo $customer_name ?></td>
                    <td class="px-2 text-center"><?php echo $customer_contact ?></td>
                    <td class="px-2 text-center"><?php echo $customer_email ?></td>
                    <td class="px-2 text-center"><?php echo $customer_address ?></td>
                    <td class="px-2 py-1 text-center">
                        <a href="<?php echo SITEURL?>admin/update-order.php?id=<?php echo $id ?>" class="btn btn-success">Update Order</a>
                    </td>
                </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='12'>Order Not Available</td></tr>";
            }
            ?>


        </table>
    </div>
</div>



<?php include("../admin/partials/footer.php") ?>
