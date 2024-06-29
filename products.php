<?php include('partials-front/menu.php'); ?>
<!-- Product Search Section Starts Here -->
<section class="product-search text-center bg-gray-100 py-10">
    <div class="container mx-auto">
        <form action="<?php echo SITEURL ?>product-search.php" method="POST" class="flex justify-center">
            <input type="search" name="search" placeholder="Search for Product.." required class="w-64 border border-gray-300 rounded-l px-2 py-1">
            <input type="submit" name="submit" value="Search" class="btn btn-primary rounded">
        </form>
    </div>
</section>
<!-- Product Search Section Ends Here -->

<!-- Product Menu Section Starts Here -->
<section class="product-menu py-16">
    <div class="container mx-auto">
        <h2 class="text-center font-bold text-3xl mb-10">Product Menu</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            // Display products that are active
            $sql = "SELECT * FROM tbl_product WHERE active='Yes'";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);

            if ($count > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $image_name = $row['image_name'];
                    $description = $row['description'];
            ?>
                    <div class="card w-96 bg-base-100 shadow-xl">
                        <a href="<?php echo SITEURL ?>product-details.php?product_id=<?php echo $id ?>">
                            <figure><?php
                                    if ($image_name == "") {
                                        echo "Image Not Available";
                                    } else {
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/product/<?php echo $image_name ?>" class="w-full h-96 rounded-md">
                                <?php
                                    }
                                ?>
                            </figure>
                            <div class="card-body">
                                <h2 class="card-title">
                                    <?php echo $title ?>
                                    <div class="badge badge-secondary"><?php echo '৳' . $price ?></div>
                                </h2>
                                <p><?php echo $description ?></p>
                                <div class="card-actions justify-end">
                                    <a href="<?php echo SITEURL ?>order.php?product_id=<?php echo $id ?>" class="btn btn-primary">Order Now</a>
                                </div>
                            </div>
                        </a>

                    </div>
            <?php
                }
            } else {
                echo "<div>Product Not Available</div>";
            }
            ?>
        </div>
    </div>
</section>
<!-- Product Menu Section Ends Here -->
<?php include('partials-front/footer.php'); ?>