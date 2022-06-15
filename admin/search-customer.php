<?php
include('./partials/menu.php');

if ($_SESSION['isAdmin'] != 1) {
    header("Location:" . HOMEURL . 'admin/index.php?error=unauthorizedaccess');
}
?>

<div class="main-content">
    <div class="wrapper">
        <h1>&mdash; Results &mdash;</h1>

        <table class="tbl-full">
            <tr>
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>



            <?php
            $search = mysqli_real_escape_string($conn, $_POST['user_search']);
            $query = "SELECT * FROM customer WHERE username LIKE '%$search%' OR first_name LIKE '%$search%' OR last_name LIKE '%$search%';";
            $res = mysqli_query($conn, $query);
            $count = mysqli_num_rows($res);

            if ($count > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $username = $row['username'];
                    $firstname = $row['first_name'];
                    $lastname = $row['last_name'];
                    $email = $row['email'];
                    $phone = $row['phone'];

                    /**Display the data */
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
            } else {
                echo "<tr> <td colspan='5' class='error'> No user by that name! </td> </tr>";

            }
            ?>
        </table>
    </div>
</div>



<?php
include('./partials/footer.php');
?>