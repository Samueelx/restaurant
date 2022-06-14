<?php
include('./partials/menu.php');

if($_SESSION['isAdmin'] != 1){
    header("Location:".HOMEURL.'admin/index.php?error=unauthorizedaccess');
}
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

            if (isset($_SESSION['delete'])) {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }

            if (isset($_SESSION['update'])) {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }

            if (isset($_SESSION['user-not-found'])) {
                echo $_SESSION['user-not-found'];
                unset($_SESSION['user-not-found']);
            }

            if (isset($_SESSION['input-not-matching'])) {
                echo $_SESSION['input-not-matching'];
                unset($_SESSION['input-not-matching']);
            }

            if (isset($_SESSION['change-password'])) {
                echo $_SESSION['change-password'];
                unset($_SESSION['change-password']);
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
                <th>Role</th>
                <th>Admin</th>
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
                        $role = $rows['role'];
                        $admin = $rows['isAdmin'];

                        if($admin == 0){
                            $admin = "No";
                        } else {
                            $admin = "Yes";
                        }

                        /**Display the values: */
            ?>

                        <tr>
                            <td><?php echo $username; ?></td>
                            <td><?php echo $firstname; ?></td>
                            <td><?php echo $lastname; ?></td>
                            <td> <?php echo $email; ?> </td>
                            <td><?php echo $role; ?></td>
                            <td> <?php echo $admin; ?> </td>
                            <td>
                                <a href="<?php echo HOMEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                                <a href="<?php echo HOMEURL; ?>admin/update-user.php?id=<?php echo $id; ?>" class="btn-secondary">Update User</a>
                                <a href="<?php echo HOMEURL; ?>admin/delete-user.php?id=<?php echo $id; ?>" class="btn-danger">Delete User</a>
                            </td>
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
<!--Main Content Ends Here-->

<?php
include('./partials/footer.php');
?>