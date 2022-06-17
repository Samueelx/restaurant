<?php
include('./partials/menu.php');

if($_SESSION['isAdmin'] != 1){
    header("Location:".HOMEURL.'admin/index.php?error=unauthorizedaccess');
}
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Orders per Customer</h1>
        <br>

        <table class="tbl-full">
            <tr>
                <th>username</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Orders</th>
            </tr>

            <?php
            $query = "SELECT username, first_name, last_name, email, COUNT(username) AS frequency  FROM customer INNER JOIN orders ON customer.customer_id = orders.customer_id WHERE order_status = 'dispatched'  GROUP BY customer.username ORDER BY frequency DESC;";
            $res = mysqli_query($conn, $query);
            if($res == true){
                $count = mysqli_num_rows($res);
                if($count > 0){
                    while($row = mysqli_fetch_assoc($res)){
                        $username = $row['username'];
                        $firstname = $row['first_name'];
                        $lastname = $row['last_name'];
                        $email = $row['email'];
                        $frequency = $row['frequency'];

                        ?>
                        <tr>
                            <td><?php echo $username; ?></td>
                            <td><?php echo $firstname; ?></td>
                            <td><?php echo $lastname; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $frequency; ?></td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='5' class='error'> Data not available! </td></tr>";
                }
            }
            ?>
        </table>
    </div>
</div>


<?php
include('./partials/footer.php');
?>