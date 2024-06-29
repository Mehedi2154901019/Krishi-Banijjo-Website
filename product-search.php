<?php include('partials-front/menu.php'); ?>
<!-- product sEARCH Section Starts Here -->
<section class="product-search text-center">
    <div class="container">
        <?php

        //get the search keyword
        $search = $_POST['search'];
        ?>
        <h2 class="text-3xl text-color font-bold" >Products on Your Search <span class="text-green-700">"<?php echo $search ?>"</span></h2>
    </div>
</section>
<!-- product sEARCH Section Ends Here -->

<!-- product MEnu Section Starts Here -->
<section class="product-menu">
    <div class="container">
        <h2 class="text-center text-2xl font-semibold ">Product Menu</h2>
        <?php
        //sql query to get products based on search
        $sql = "SELECT * FROM tbl_product WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        if ($count > 0) {
            //product available
            while ($row = mysqli_fetch_assoc($res)) {
                //get the details
                $id = $row['id'];
                $title = $row['title'];
                $description = $row['description'];
                $price = $row['price'];
                $image_name = $row['image_name'];

        ?>
                <div class="product-menu-box">
                    <div class="product-menu-img">
                        <?php
                        if ($image_name == "") {
                            echo "<div>Image Not Available</div>";
                        } else {
                        ?>
                            <img src="<?php echo SITEURL ?>images/product/<?php echo $image_name ?>" class="img-responsive img-curve w-full h-52">
                        <?php
                        }


                        ?>
                    </div>

                    <div class="product-menu-desc">
                        <h4><?php echo $title ?></h4>
                        <p class="product-price">৳<?php echo $price ?></p>
                        <p class="product-detail">
                            <?php echo $description ?>
                        </p>
                        <br>
                        <a href="<?php echo SITEURL ?>order.php?product_id=<?php echo $id ?>" class="btn btn-primary">Order Now</a>
                    </div>
                </div>

        <?php
            }
        } else {
            //product not available
            echo "<div class='text-red-700 text-2xl font-semibold'>Product Not Found</div>";
        }

        ?>

        <div class="clearfix"></div>



    </div>

</section>
<!-- product Menu Section Ends Here -->

<?php include('partials-front/footer.php'); ?>