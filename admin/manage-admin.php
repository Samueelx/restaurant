<?php
include('./partials/menu.php');
?>

<!--Main Content starts Here-->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage User</h1>
        <br /> <br />

        <div class="response">
            <?php
            /**Upon successful addition of a user: */
            if (isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if (isset($_SESSION['delete'])){
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }

            if (isset($_SESSION['update'])){
                echo $_SESSION['update'];
                unset ($_SESSION['update']);
            }

            ?>
        </div>

        <br />

        <!--Button to add admin-->
        <a href="./add-admin.php" class="btn-primary">Add User</a>

        <br /> <br /> <br />
        <table class="tbl-full">
            <tr>
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>

            <?php
            $query = "SELECT * FROM user;";

            $res = mysqli_query($conn, $query);
            if ($res == true) {
                $count = mysqli_num_rows($res);
                if ($count > 0) {
                    while ($rows = mysqli_fetch_assoc($res)) {
                        /**Get individual data: */
                        $id = $rows['user_id'];
                        $username = $rows['username'];
                        $firstname = $rows['first_name'];
                        $lastname = $rows['last_name'];
                        $email = $rows['email'];

                        /**Display the values: */
            ?>

                        <tr>
                            <td><?php echo $username; ?></td>
                            <td><?php echo $firstname; ?></td>
                            <td><?php echo $lastname; ?></td>
                            <td> <?php echo $email;?> </td>
                            <td>
                                <a href="<?php echo HOMEURL; ?>admin/update-user.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                <a href="<?php echo HOMEURL; ?>admin/delete-user.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                            </td>
                        </tr>

            <?php
                    }
                } else {
                }
            }
            ?>
            <!--
            <tr>
                <td>fancynancy</td>
                <td>Fancy</td>
                <td>Nancy</td>
                <td>
                    <a href="#" class="btn-secondary">Update Admin</a>
                    <a href="#" class="btn-danger">Delete Admin</a>
                </td>
            </tr>

            <tr>
                <td>fancynancy</td>
                <td>Fancy</td>
                <td>Nancy</td>
                <td>
                    <a href="#" class="btn-secondary">Update Admin</a>
                    <a href="#" class="btn-danger">Delete Admin</a>
                </td>
            </tr>

            <tr>
                <td>fancynancy</td>
                <td>Fancy</td>
                <td>Nancy</td>
                <td>
                    <a href="#" class="btn-secondary">Update Admin</a>
                    <a href="#" class="btn-danger">Delete Admin</a>
                </td>
            </tr>
        -->
        </table>

    </div>
</div>
<!--Main Content Ends Here-->

<?php
include('./partials/footer.php');
?>