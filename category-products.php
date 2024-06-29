<?php include('partials-front/menu.php'); ?>
<?php
if (isset($_GET['category_id'])) {
    //category id is set and get the id
    $category_id = $_GET['category_id'];
    //get the category title based on id
    $sql = "SELECT title FROM tbl_category WHERE id = $category_id";
    $res = mysqli_query($conn, $sql);
    //get the value from db
    $row = mysqli_fetch_assoc($res);
    //get the title
    $category_title = $row['title'];
} else {
    //category id is not passed
    //redirect to home page
    header('location:' . SITEURL);
}
?>

<section class="product-search text-center py-12">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold">Products on <span href="#" class="text-black">"<?php echo $category_title ?>"</span></h2>
    </div>
</section>

<!-- product Menu Section Starts Here -->
<section class="product-menu py-12">
    <div class="container mx-auto">
        <h2 class="text-center text-3xl font-bold mb-8">Product Menu</h2>
        <?php
        //create sql query to get product based on selected category
        $sql2 = "SELECT * FROM tbl_product WHERE category_id=$category_id";
        $res2 = mysqli_query($conn, $sql2);
        $count2 = mysqli_num_rows($res2);
        if ($count2 > 0) {
            //product available
            while ($row2 = mysqli_fetch_assoc($res2)) {
                $id = $row2['id'];
                $title = $row2['title'];
                $price = $row2['price'];
                $description = $row2['description'];
                $image_name = $row2['image_name'];
        ?>
                <div class="product-menu-box flex mb-8">
                    <div class="product-menu-img w-1/3 mr-6">
                        <?php
                        if ($image_name == "") {
                            echo "<div>Image Not Available</div>";
                        } else {
                        ?>
                            <img src="<?php echo SITEURL ?>images/product/<?php echo $image_name ?>" class="img-responsive img-curve h-64 w-full object-cover">
                        <?php
                        }
                        ?>
                    </div>
                    <div class="product-menu-desc w-2/3">
                        <h4 class="text-2xl font-bold mb-2"><?php echo $title ?></h4>
                        <p class="product-price text-xl font-bold mb-2">৳<?php echo $price ?></p>
                        <p class="product-detail mb-4"><?php echo $description ?></p>
                        <a href="<?php echo SITEURL ?>order.php?product_id=<?php echo $id ?>" class="btn btn-primary inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-4 px-4 rounded">Order Now</a>
                    </div>
                </div>
        <?php
            }
        } else {
            //product not available
            echo "Product Not Available";
        }
        ?>
        <div class="clearfix"></div>
    </div>
</section>
<!-- product Menu Section Ends Here -->
<?php include('partials-front/footer.php'); ?>