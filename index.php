<?php include('partials-front/menu.php') ?>

<!-- product sEARCH Section Starts Here -->
<section class="bg-gray-100 py-16">
  <div class="container mx-auto">
    <form action="<?php echo SITEURL ?>product-search.php" method="POST" class="flex justify-center">
      <input type="search" name="search" placeholder="Search for Product..." required class="px-4 w-96 py-2 border border-gray-300 rounded-l">
      <input type="submit" name="submit" value="Search" class="px-4 py-2 bg-blue-500 text-white rounded-r hover:bg-blue-600">
    </form>
  </div>
</section>
<!-- product sEARCH Section Ends Here -->
<?php
if (isset($_SESSION['order'])) {
  echo $_SESSION['order'];
  unset($_SESSION['order']);
}
?>

<!-- CAtegories Section Starts Here -->
<section class="py-16">
  <div class="container mx-auto">
    <h2 class="text-2xl font-bold text-center mb-8">Explore Products</h2>
    <?php
    //create sql to display categories from db
    $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3";
    //execute the query
    $res = mysqli_query($conn, $sql);
    //count rows to check whether the category is available or not\
    $count = mysqli_num_rows($res);

    if ($count > 0) {
      //category available
      while ($row = mysqli_fetch_assoc($res)) {
        //get the values like id ,title ,image_name
        $id = $row['id'];
        $title = $row['title'];
        $image_name = $row['image_name'];
    ?>

        <a href="<?php echo SITEURL ?>category-products.php?category_id=<?php echo $id ?>" class="block mx-auto mb-8 relative group">
          <div class="bg-gray-900 text-white rounded-lg overflow-hidden">
            <?php
            if ($image_name == "") {
              echo "<div class='text-red-700 p-4'>Image Not Available</div>";
            } else {
              //image available
            ?>
              <img src="<?php echo SITEURL ?>images/category/<?php echo $image_name; ?>" class="w-full h-64 object-cover">
            <?php
            }
            ?>

            <h3 class="absolute inset-0 flex items-center justify-center text-3xl font-bold uppercase group-hover:bg-gray-800 group-hover:bg-opacity-50 transition duration-300"><?php echo $title; ?></h3>
          </div>
        </a>

    <?php
      }
    } else {
      //category not available
      echo "<div class='text-red-700'>Category Not Available</div>";
    }
    ?>
  </div>
  <p class="text-center mt-8">
    <a href="<?php echo SITEURL; ?>categories.php" class="text-blue-500 hover:text-blue-600">See All Categories</a>
  </p>
</section>
<!-- Categories Section Ends Here -->

<!-- product MEnu Section Starts Here -->
<section class="bg-gray-100 py-16">
  <div class="container mx-auto">
    <h2 class="text-2xl font-bold text-center mb-8">Product Menu</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <?php
      //getting products from db that are active and featured
      $sql2 = "SELECT * FROM tbl_product WHERE active='Yes'AND featured='Yes' LIMIT 6";
      $res2 = mysqli_query($conn, $sql2);
      $count2 = mysqli_num_rows($res);

      if ($count2 > 0) {
        //product available
        while ($row2 = mysqli_fetch_assoc($res2)) {
          $id = $row2['id'];
          $title = $row2['title'];
          $price = $row2['price'];
          $description = $row2['description'];
          $image_name = $row2['image_name'];
      ?>
          <div class="bg-white rounded-lg overflow-hidden shadow-md">
            <a href="<?php echo SITEURL ?>product-details.php?product_id=<?php echo $id ?>">
              <div class="relative">
                <?php
                if ($image_name == "") {
                  echo "<div class='text-red-700 p-4'>Image Not Available</div>";
                } else {
                ?>
                  <img src="<?php echo SITEURL; ?>images/product/<?php echo $image_name ?>" class="w-full h-48 object-cover">
                <?php
                }
                ?>
              </div>
              <div class="p-4">
                <h4 class="text-xl font-bold mb-2"><?php echo $title ?></h4>
                <p class="text-gray-600 mb-4">৳ <?php echo $price ?></p>
                <p class="text-gray-700 mb-4">
                  <?php echo $description ?>
                </p>
                <a href="<?php echo SITEURL ?>order.php?product_id=<?php echo $id ?>" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 hover:text-white">Order Now</a>
              </div>
            </a>

          </div>
      <?php
        }
      } else {
        //product not available
        echo "<div class='text-red-700'>Product Not Available</div>";
      }
      ?>
    </div>
  </div>

  <p class="text-center mt-8">
    <a href="<?php echo SITEURL; ?>products.php" class="text-blue-500 hover:text-blue-600">See All Products</a>
  </p>
</section>
<!-- product Menu Section Ends Here -->

<?php include('partials-front/footer.php'); ?>