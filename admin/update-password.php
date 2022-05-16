<?php
include('./partials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br /><br />

        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }

        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Current Password:</td>
                    <td><input type="password" name="current_password" id="" placeholder="Current Password"></td>
                </tr>

                <tr>
                    <td>New Password:</td>
                    <td>
                        <input type="password" name="new_password" id="" placeholder="New Password">
                    </td>
                </tr>

                <tr>
                    <td>Confirm Password:</td>
                    <td>
                        <input type="password" name="confirm_password" id="" placeholder="Confirm Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" value="Change Password" name="submit" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>


    </div>
</div>


<?php
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $current_password = sha1($_POST['current_password']);
    $new_password = sha1($_POST['new_password']);
    $confirm_password = sha1($_POST['confirm_password']);

    /**Check whether the user exists: */
    $sql = "SELECT * FROM user WHERE user_id = $id AND passwordHash = '$current_password';";

    $res = mysqli_query($conn, $sql);
    if ($res == true) {
        $count = mysqli_num_rows($res);

        if ($count == 1) {
            if ($new_password == $confirm_password) {

                $query = "UPDATE user SET passwordHash = '$new_password' 
                WHERE user_id = $id;";

                $response = mysqli_query($conn, $query);

                if ($response == true) {
                    $_SESSION['change-password'] = "<div class='success'> Password changed successfully. </div>";
                    header("Location:" . HOMEURL . 'admin/manage-admin.php');
                } else {
                    $_SESSION['change-password'] = "<div class='error'> Failed to change password! </div>";
                    header("Location:" . HOMEURL . 'admin/manage-admin.php');
                }
            } else {
                $_SESSION['input-not-matching'] = "<div class='error'> Password inputs do not match! </div>";
                header("Location:" . HOMEURL . 'admin/manage-admin.php');
            }
        } else {
            $_SESSION['user-not-found'] = "<div class='error'> User not found! </div>";
            header("Location:" . HOMEURL . 'admin/manage-admin.php');
        }
    }
}
?>


<?php
include('./partials/footer.php');
?>