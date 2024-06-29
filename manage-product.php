<?php include("../admin/partials/menu.php") ?>
<div class="main-content">
    <div class="wrapper">
        <h1 class="text-2xl font-bold mb-4">Manage Product</h1>
        <a href="<?php echo SITEURL; ?>admin/add-product.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Add Product</a>

        <?php
        if (isset($_SESSION['add'])) {
            echo '<div class="bg-green-500 text-white p-4 mb-4 rounded">' . $_SESSION['add'] . '</div>';
            unset($_SESSION['add']);
        }
        if (isset($_SESSION['delete'])) {
            echo '<div class="bg-red-500 text-white p-4 mb-4 rounded">' . $_SESSION['delete'] . '</div>';
            unset($_SESSION['delete']);
        }
        if (isset($_SESSION['upload'])) {
            echo '<div class="bg-yellow-500 text-white p-4 mb-4 rounded">' . $_SESSION['upload'] . '</div>';
            unset($_SESSION['upload']);
        }
        if (isset($_SESSION['unauthorize'])) {
            echo '<div class="bg-red-500 text-white p-4 mb-4 rounded">' . $_SESSION['unauthorize'] . '</div>';
            unset($_SESSION['unauthorize']);
        }
        if (isset($_SESSION['update'])) {
            echo '<div class="bg-green-500 text-white p-4 mb-4 rounded">' . $_SESSION['update'] . '</div>';
            unset($_SESSION['update']);
        }
        ?>

        <table class="w-full my-5 border-collapse">
            <thead>
                <tr class="border-b-2 border-indigo-600">
                    <th class="px-2 py-2">Serial</th>
                    <th class="px-2 py-2">Title</th>
                    <th class="px-2 py-2">Price</th>
                    <th class="px-2 py-2">Image</th>
                    <th class="px-2 py-2">Featured</th>
                    <th class="px-2 py-2">Active</th>
                    <th class="px-2 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM tbl_product";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                $sn = 1;

                if ($count > 0) {
                    //get the products from db and display
                    while ($row = mysqli_fetch_assoc($res)) {
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        $featured = $row['featured'];
                        $active = $row['active'];
                ?>
                        <tr class="border-b">
                            <td class="px-2 py-2 text-center"><?php echo $sn++; ?></td>
                            <td class="px-2 py-2 text-center"><?php echo $title; ?></td>
                            <td class="px-2 py-2 text-center">৳<?php echo $price; ?></td>
                            <td class="px-2 py-2 text-center">
                                <?php
                                if ($image_name == "") {
                                    echo "<div class='text-red-700'>Image Not added</div>";
                                } else {
                                    //img achee
                                ?>
                                    <img width="100px" src="<?php echo SITEURL; ?>images/product/<?php echo $image_name ?>" alt="" class="mx-auto">
                                <?php
                                }
                                ?>
                            </td>
                            <td class="px-2 py-2 text-center"><?php echo $featured; ?></td>
                            <td class="px-2 py-2 text-center"><?php echo $active; ?></td>
                            <td class="px-2 py-2 text-center">
                                <a href="<?php echo SITEURL; ?>admin/update-product.php?id=<?php echo $id ?>" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-2">Update Product</a>
                                <a href="<?php echo SITEURL; ?>admin/delete-product.php?id=<?php echo $id ?>&image_name=<?php echo $image_name; ?>" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete Product</a>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-red-700 text-center py-4'>product not added yet</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include("../admin/partials/footer.php") ?>