<?php
include('./partials/menu.php');

if($_SESSION['isAdmin'] != 1){
    header("Location:".HOMEURL.'admin/index.php?error=unauthorizedaccess');
}
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Customer Expenditure</h1>

        <br>

        <table class="tbl-full">
            <tr>
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>User Expenditure</th>
            </tr>

            <?php

            $query = "SELECT username, first_name, last_name, email, phone, SUM(total_amount) AS expenditure FROM customer  INNER JOIN orders ON customer.customer_id = orders.customer_id WHERE orders.order_status = 'dispatched'  GROUP BY customer.username ORDER BY expenditure DESC;";
            $res = mysqli_query($conn, $query);
            if($res == true){
                $count = mysqli_num_rows($res);
                if($count > 0){
                    while($row = mysqli_fetch_assoc($res)){
                        $username = $row['username'];
                        $firstname = $row['first_name'];
                        $lastname = $row['last_name'];
                        $email = $row['email'];
                        $phone = $row['phone'];
                        $expenditure = $row['expenditure'];

                        /**Display values */
                        ?>
                        <tr>
                            <td><?php echo $username; ?></td>
                            <td><?php echo $firstname; ?></td>
                            <td><?php echo $lastname; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo "0".$phone; ?></td>
                            <td><?php echo "KES ".$expenditure; ?></td>
                        </tr>
                        <?php
                    }
                }
            }
            ?>
        </table>
    </div>
</div>

<?php
include('./partials/footer.php');
?>