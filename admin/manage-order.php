<?php
include('./partials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Order</h1>


        <br /> <br /> <br />
        <table class="tbl-full tbl-order">
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Food Item</th>
                <th>Amount</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Status</th>
                <th>Order Date</th>
                <th>Address</th>
                <th>Town</th>
                <th>Action</th>
            </tr>

            <?php
            $data = "SELECT username, email, phone, name, amount, quantity, total_amount, order_status, order_date, street, town FROM customer INNER JOIN orders ON customer.customer_id = orders.customer_id INNER JOIN Menu ON Menu.item_id = orders.menu_id ORDER BY order_date DESC;";
            $res = mysqli_query($conn, $data);

            $count = mysqli_num_rows($res);
            if ($count > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $username = $row['username'];
                    $email = $row['email'];
                    $phone = $row['phone'];
                    $name = $row['name'];
                    $amount = $row['amount'];
                    $quantity = $row['quantity'];
                    $total = $row['total_amount'];
                    $status = $row['order_status'];
                    $order_date = $row['order_date'];
                    $address = $row['street'];
                    $town = $row['town'];

            ?>
                    <tr>
                        <td><?php echo $username; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $amount; ?></td>
                        <td><?php echo $quantity; ?></td>
                        <td><?php echo $total; ?></td>
                        <td><?php echo $status; ?></td>
                        <td><?php echo $order_date; ?></td>
                        <td><?php echo $address; ?></td>
                        <td><?php echo $town; ?></td>
                        <td style="min-width: 100px;">
                            <a href="#" class="btn-secondary">Update Order</a>
                        </td>
                    </tr>

            <?php
                }
            } else {
                echo "<tr><td colspan='12' class='error'> Orders not available </td></tr>";
            }
            ?>


        </table>
    </div>
</div>

<?php
include('./partials/footer.php');
?>