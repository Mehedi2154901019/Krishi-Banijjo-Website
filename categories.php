<?php include('partials-front/menu.php'); ?>
<!-- CAtegories Section Starts Here -->
<section class="categories py-12">
  <div class="container mx-auto">
    <h2 class="text-center text-3xl font-bold mb-8">Explore products</h2>
    <?php
    //display all the categories that are active
    $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);
    if ($count > 0) {
      while ($row = mysqli_fetch_assoc($res)) {
        $id = $row['id'];
        $title = $row['title'];
        $image_name = $row['image_name'];
    ?>
        <a href="<?php echo SITEURL ?>category-products.php?category_id=<?php echo $id ?>" class="block">
          <div class="box-3 float-container relative mb-6">
            <?php
            if ($image_name == "") {
              echo "<div class='text-red-700'>Image Not Available</div>";
            } else {
              //image available
            ?>
              <img src="<?php echo SITEURL ?>images/category/<?php echo $image_name; ?>" class="img-responsive img-curve h-64 w-full object-cover">
            <?php
            }
            ?>
            <h3 class="float-text text-white absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 p-4"><?php echo $title ?></h3>
          </div>
        </a>
    <?php
      }
    } else {
      //category not available
      echo "<div class='text-red-700'>Category Not Found</div>";
    }
    ?>
    <div class="clearfix"></div>
  </div>
</section>
<!-- Categories Section Ends Here -->
<?php include('partials-front/footer.php'); ?>