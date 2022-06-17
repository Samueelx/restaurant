<?php
include('./partials/menu.php');

if($_SESSION['isAdmin'] != 1){
    header("Location:".HOMEURL.'admin/index.php?error=unauthorizedaccess');
}
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Orders processed per user</h1>
        <br>

        <table class="tbl-full">
            <tr>
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Orders Processed</th>
            </tr>

            <?php
            $query = "SELECT username, first_name, last_name, email, COUNT(username) AS freq FROM user  INNER JOIN orders ON user.user_id = orders.processed_by GROUP BY username ORDER BY freq DESC;";
            $res = mysqli_query($conn, $query);
            $count = mysqli_num_rows($res);

            if($count > 0){
                while($row = mysqli_fetch_assoc($res)){
                    $username = $row['username'];
                    $firstname = $row['first_name'];
                    $lastname = $row['last_name'];
                    $email = $row['email'];
                    $orders = $row['freq'];

                    ?>
                    <tr>
                        <td><?php echo $username; ?></td>
                        <td><?php echo $firstname; ?></td>
                        <td><?php echo $lastname; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $orders; ?></td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='5' class='error'> Orders not available </td></tr>";
            }
            ?>
        </table>
    </div>
</div>

<?php
include('./partials/footer.php');
?>