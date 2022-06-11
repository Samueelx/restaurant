<?php
include('./partials/menu.php');
?>

<!--Main Content starts Here-->
<div class="main-content">
    <div class="wrapper">
        <h1>Dashboard</h1>
        <br/><br/>

        <?php
        if (isset($_SESSION['login'])) {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        ?>
        <br>

        <div class="col-4">
            <?php
            $categories = "SELECT COUNT(*) FROM menu_type;";
            $res = mysqli_query($conn, $categories);
            $cats = mysqli_fetch_assoc($res);
            ?>
            <h1><?php echo $cats['COUNT(*)']; ?></h1>
            <br>
            <p>Categories</p>
        </div>

        <div class="col-4">
            <?php
            $menu_items = "SELECT COUNT(*) FROM Menu;";
            $res = mysqli_query($conn, $menu_items);
            $items = mysqli_fetch_assoc($res);
            ?>
            <h1><?php echo $items['COUNT(*)']; ?></h1>
            <br>
            <p>Food Items</p>
        </div>

        <div class="col-4">
            <?php
            $orders = "SELECT COUNT(*) FROM orders;";
            $res = mysqli_query($conn, $orders);
            $num_of_orders = mysqli_fetch_assoc($res);
            ?>
            <h1><?php echo $num_of_orders['COUNT(*)']; ?></h1>
            <br>
            <p>Total Orders</p>
        </div>

        <div class="col-4">
            <?php
            $total = "SELECT SUM(total_amount) AS 'total' FROM orders WHERE order_status = 'dispatched';";
            $res = mysqli_query($conn, $total);
            $total_revenue = mysqli_fetch_assoc($res);
            ?>
            <h1><?php echo "KES ". $total_revenue['total']; ?></h1>
            <br>
            <p>Revenue Generated</p>
        </div>

        <div class="clearfix"></div>
    </div>
</div>
<!--Main Content Ends Here-->

<?php
include('./partials/footer.php');
?>