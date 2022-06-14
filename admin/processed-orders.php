<?php
include('./partials/menu.php');

if($_SESSION['isAdmin'] != 1){
    header("Location:".HOMEURL.'admin/index.php?error=unauthorizedaccess');
}
?>

<!--Main Content-->
<div class="main-content">
    <div class="wrapper">
        <h1>Processed Orders</h1>

        <br>

        <table class="tbl-full tbl-order">
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Item</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Date Ordered</th>
                <th>Status</th>
                <th>Processed by</th>
                <th>Time Processed</th>
            </tr>

            <?php
            
            $query = "SELECT customer.username, customer.email, name, quantity, total_amount, order_status, order_date, user.username AS user, time_processed  FROM customer INNER JOIN orders ON customer.customer_id = orders.customer_id  INNER JOIN Menu ON Menu.item_id = orders.menu_id  INNER JOIN user ON user.user_id = orders.processed_by ORDER BY time_processed DESC;";
            $res = mysqli_query($conn, $query);
            if($res == true){
                $count = mysqli_num_rows($res);
                if($count > 0){
                    while($rows = mysqli_fetch_assoc($res)){
                        /**individual values */
                        $username = $rows['username'];
                        $email = $rows['email'];
                        $name = $rows['name'];
                        $quantity = $rows['quantity'];
                        $total_amount = $rows['total_amount'];
                        $date_ordered = $rows['order_date'];
                        $status = $rows['order_status'];
                        $user = $rows['user'];
                        $time_processed = $rows['time_processed'];

                        /**Display the values */
                        ?>
                        <tr>
                            <td><?php echo $username; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $quantity; ?></td>
                            <td>KES <?php echo $total_amount; ?></td>
                            <td><?php echo $date_ordered; ?></td>
                            <td>
                                <?php
                                if($status == 'dispatched'){
                                    echo "<label style='color:#55A630;'> $status; </label>";
                                } elseif($status == 'cancelled'){
                                    echo "<label style='color:#D00000;'> $status; </label>";
                                }
                                ?>
                            </td>
                            <td><?php echo $user; ?></td>
                            <td><?php echo $time_processed; ?></td>
                        </tr>

                        <?php
                    }
                } else {

                }
            }
            ?>
        </table>
    </div>
</div>

<?php
include('./partials/footer.php');
?>