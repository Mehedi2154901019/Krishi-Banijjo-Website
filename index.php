<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

    <?php
    // Database connection code goes here
    include("../admin/partials/menu.php");
    ?>

    <!-- Main Content -->
    <div class="main-content">
        <div class="wrapper">
            <h1 class="text-3xl font-semibold mb-4">DASHBOARD</h1>
            <br>
            <?php
            if (isset($_SESSION['login'])) {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            ?>
            <br>

            <!-- Grid for data -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-gray-100 p-4 rounded-lg text-center">
                    <?php
                    $sql = "SELECT * FROM tbl_category";
                    $res = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res);
                    ?>
                    <h1 class="text-2xl font-bold"><?php echo $count ?></h1>
                    <br>
                    Categories
                </div>
                <div class="bg-gray-100 p-4 rounded-lg text-center">
                    <?php
                    $sql2 = "SELECT * FROM tbl_product";
                    $res2 = mysqli_query($conn, $sql2);
                    $count2 = mysqli_num_rows($res2);
                    ?>
                    <h1 class="text-2xl font-bold"><?php echo $count2 ?></h1>
                    <br>
                    Products
                </div>
                <div class="bg-gray-100 p-4 rounded-lg text-center">
                    <?php
                    $sql3 = "SELECT * FROM tbl_order";
                    $res3 = mysqli_query($conn, $sql3);
                    $count3 = mysqli_num_rows($res3);
                    ?>
                    <h1 class="text-2xl font-bold"><?php echo $count3 ?></h1>
                    <br>
                    Total Orders
                </div>
                <div class="bg-gray-100 p-4 rounded-lg text-center">
                    <?php
                    $sql4 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status='Delivered'";
                    $res4 = mysqli_query($conn, $sql4);
                    $row4 = mysqli_fetch_assoc($res4);
                    $total_revenue = $row4['Total'];
                    ?>
                    <h1 class="text-2xl font-bold"><?php echo '৳' . $total_revenue ?></h1>
                    <br>
                    Revenue Generated
                </div>
            </div>

            <!-- Chart Container -->
            <div>
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include("../admin/partials/footer.php") ?>

    <!-- Chart.js Script -->
    <script>
        // Fetch data from PHP
        var categories = <?php echo $count; ?>;
        var products = <?php echo $count2; ?>;
        var orders = <?php echo $count3; ?>;
        var revenue = <?php echo $total_revenue; ?>;

        // Create the chart data
        var data = {
            labels: ["Categories", "Products", "Orders", "Revenue"],
            datasets: [{
                label: "Dashboard Data",
                data: [categories, products, orders, revenue],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        };

        // Create the chart configuration
        var options = {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        };

        // Create the chart
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: data,
            options: options
        });
    </script>

</body>

</html>