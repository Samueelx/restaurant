<?php
include('./partials/menu.php');

if($_SESSION['isAdmin'] != 1){
    header("Location:".HOMEURL.'admin/index.php?error=unauthorizedaccess');
}
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Registered Customers</h1>

        <!--Customer Search-->
        <div class="form-container">
            <form action="<?php echo HOMEURL?>admin/search-customer.php" method="POST" class="form">
                <input type="text" name="user_search" id="search" class="input" placeholder="Search...">
                <input type="submit" value="search" name="submit" id="submit">
            </form>
        </div>

        <br>

        <table class="tbl-full">
            <tr>
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>

            <?php
            $query = "SELECT * FROM customer;";
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

                        /**Display the values */
                        ?>
                        <tr>
                            <td><?php echo $username; ?></td>
                            <td><?php echo $firstname; ?></td>
                            <td><?php echo $lastname; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo "0".$phone; ?></td>
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