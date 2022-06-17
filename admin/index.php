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

        if(isset($_GET['error'])){
            if($_GET['error'] == 'unauthorizedaccess'){
                echo "<p class='error'> You don't have authorization to visit that page! </p>";
            }
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
            $customers = "SELECT COUNT(*) FROM customer;";
            $res = mysqli_query($conn, $customers);
            $num_of_customers = mysqli_fetch_assoc($res);
            ?>
            <h1><?php echo $num_of_customers['COUNT(*)']; ?></h1>
            <br>
            <a href="<?php echo HOMEURL ?>admin/registered-customers.php">Registered Customers</a>
        </div>

        <div class="col-4">
            <?php
            $total = "SELECT SUM(total_amount) AS 'total' FROM orders WHERE order_status = 'dispatched';";
            $res = mysqli_query($conn, $total);
            $total_revenue = mysqli_fetch_assoc($res);
            ?>
            <h1><?php echo "KES ". $total_revenue['total']; ?></h1>
            <br>
            <a href="#">Revenue Generated</a>
        </div>

        <div class="col-4">
            <?php
            $processed = "SELECT COUNT(*) FROM orders WHERE order_status != 'pending';";
            $res = mysqli_query($conn, $processed);
            $processed_orders = mysqli_fetch_assoc($res);
            ?>
            <h1><?php echo $processed_orders['COUNT(*)']; ?></h1>
            <br>
            <a href="<?php echo HOMEURL ?>admin/processed-orders.php">Processed Orders</a>
        </div>

        <div class="col-4">
            <?php
            $set = "SELECT username, first_name, last_name, email, COUNT(username) AS frequency  FROM customer INNER JOIN orders ON customer.customer_id = orders.customer_id WHERE order_status = 'dispatched'  GROUP BY customer.username ORDER BY frequency DESC;";
            $res = mysqli_query($conn, $set);
            $rows = mysqli_num_rows($res);
            ?>
            <h1><?php echo $rows; ?></h1>
            <br>
            <a href="<?php echo HOMEURL; ?>admin/orders-per-customer.php">Orders per Customer</a>
        </div>

        <div class="col-4">
            <?php
            $foods = "SELECT name FROM Menu INNER JOIN orders ON orders.menu_id = Menu.item_id  WHERE order_status = 'dispatched' GROUP BY name";
            $res = mysqli_query($conn, $foods);
            $rows = mysqli_num_rows($res);
            ?>
            <h1><?php echo $rows; ?></h1>
            <br>
            <a href="<?php echo HOMEURL; ?>admin/food-ranking.php">Food ranking by Revenue</a>
        </div>

        <div class="col-4">
            <br>
            <a href="<?php echo HOMEURL; ?>admin/customer-expense.php">Customer Expenditure</a>
        </div>

        <div class="col-4">
            <br>
            <a href="<?php echo HOMEURL; ?>admin/frequent-orders.php">Frequently Ordered Foods</a>
        </div>

        <div class="col-4">
            <br>
            <a href="<?php echo HOMEURL; ?>admin/orders-per-user.php">Orders processed per user</a>
        </div>

        <div class="clearfix"></div>
    </div>
</div>
<!--Main Content Ends Here-->

<?php
include('./partials/footer.php');
?>