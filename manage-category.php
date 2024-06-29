<?php include("../admin/partials/menu.php") ?>

<div class="main-content">
    <div class="wrapper">
        <h1 class="text-2xl font-bold mb-4">Manage Category</h1>

        <?php
        if (isset($_SESSION['add'])) {
            echo '<div class="bg-green-500 text-white p-4 mb-4 rounded">' . $_SESSION['add'] . '</div>';
            unset($_SESSION['add']);
        }

        if (isset($_SESSION['remove'])) {
            echo '<div class="bg-green-500 text-white p-4 mb-4 rounded">' . $_SESSION['remove'] . '</div>';
            unset($_SESSION['remove']);
        }

        if (isset($_SESSION['delete'])) {
            echo '<div class="bg-red-500 text-white p-4 mb-4 rounded">' . $_SESSION['delete'] . '</div>';
            unset($_SESSION['delete']);
        }

        if (isset($_SESSION['no-category-found'])) {
            echo '<div class="bg-yellow-500 text-white p-4 mb-4 rounded">' . $_SESSION['no-category-found'] . '</div>';
            unset($_SESSION['no-category-found']);
        }

        if (isset($_SESSION['update'])) {
            echo '<div class="bg-green-500 text-white p-4 mb-4 rounded">' . $_SESSION['update'] . '</div>';
            unset($_SESSION['update']);
        }

        if (isset($_SESSION['upload'])) {
            echo '<div class="bg-green-500 text-white p-4 mb-4 rounded">' . $_SESSION['upload'] . '</div>';
            unset($_SESSION['upload']);
        }

        if (isset($_SESSION['failed-remove'])) {
            echo '<div class="bg-red-500 text-white p-4 mb-4 rounded">' . $_SESSION['failed-remove'] . '</div>';
            unset($_SESSION['failed-remove']);
        }
        ?>

        <a href="<?php echo SITEURL; ?>admin/add-category.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Category</a>

        <table class="w-full my-5 border-collapse">
            <thead>
                <tr class="border-b-2 border-indigo-600">
                    <th class="px-2 py-2">Serial Number</th>
                    <th class="px-2 py-2">Title</th>
                    <th class="px-2 py-2">Image</th>
                    <th class="px-2 py-2">Featured</th>
                    <th class="px-2 py-2">Active</th>
                    <th class="px-2 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM tbl_category";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                $sn = 1;

                if ($count > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        $id = $row['id'];
                        $image_name = $row['image_name'];
                        $featured = $row['featured'];
                        $active = $row['active'];
                        $title = $row['title'];
                ?>
                        <tr class="border-b">
                            <td class="px-2 py-2 text-center"><?php echo $sn++ ?></td>
                            <td class="px-2 py-2 text-center"><?php echo $title ?></td>
                            <td class="px-2 py-2 text-center">
                                <?php
                                if ($image_name != "") {
                                ?>
                                    <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" width="100px" class="mx-auto">
                                <?php
                                } else {
                                    echo "No Images";
                                }
                                ?>
                            </td>
                            <td class="px-2 py-2 text-center"><?php echo $featured ?></td>
                            <td class="px-2 py-2 text-center"><?php echo $active ?></td>
                            <td class="px-2 py-2 text-center">
                                <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id ?>" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-2">Update Category</a>
                                <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id ?>&image_name=<?php echo $image_name ?>" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete Category</a>
                            </td>
                        </tr>
                    <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="6" class="text-center py-4">
                            <div class="text-red-500">No category added</div>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include("../admin/partials/footer.php") ?>