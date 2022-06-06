<?php
include('./partials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update User</h1>
        <br /><br />

        <?php
        /**Get id of the selected user*/
        $id = $_GET['id'];

        $query = "SELECT * FROM user WHERE user_id = $id;";
        $res = mysqli_query($conn, $query);

        if ($res == true) {
            /**Check whether data is available */
            $count = mysqli_num_rows($res);
            if ($count == 1) {
                $row = mysqli_fetch_assoc($res);

                $id = $row['user_id'];
                $username = $row['username'];
                $firstname = $row['first_name'];
                $lastname = $row['last_name'];
                $email = $row['email'];
                $phone = $row['phone'];
                $admin = $row['isAdmin'];
            } else {
                header('Location:' . HOMEURL . 'admin/manage-admin.php');
            }
        }
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" value="<?php echo $username; ?>" id="username">
                    </td>
                </tr>

                <tr>
                    <td>First Name:</td>
                    <td>
                        <input type="text" name="firstname" id="firstname" value="<?php echo $firstname; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Last Name:</td>
                    <td>
                        <input type="text" name="lastname" id="lastname" value="<?php echo $lastname; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Email: </td>
                    <td>
                        <input type="text" name="email" id="email" value="<?php echo $email; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Phone: </td>
                    <td>
                        <input type="text" name="phone" id="phone" value="<?php echo $phone ?>">
                    </td>
                </tr>

                <tr>
                    <td>Admin?</td>
                    <td>
                        <div class="radio">
                            <label for="Yes">
                                <input <?php if ($admin == 1) {
                                            echo "checked";
                                        } ?> type="radio" name="admin" id="" value="1">
                                Yes
                            </label>
                        </div>

                        <div class="radio">
                            <label for="No">
                                <input <?php if ($admin == 0) {
                                            echo "checked";
                                        } ?> type="radio" name="admin" id="" value="0">
                                No
                            </label>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" value="Update user" name="submit" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>

        <?php
        if (isset($_GET['error'])) {
            if ($_GET['error'] == 'emptyinput') {
                echo "<p class='error'> Input field cannot be empty </p>";
            } elseif ($_GET['error'] == 'invalidemail') {
                echo "<p class='error'> Email is invalid! Please enter correct email address. </p>";
            }
        }
        ?>
    </div>
</div>

<?php
if (isset($_POST['submit'])) {
    /**Get all the values from the form: */
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $admin = mysqli_real_escape_string($conn, $_POST['admin']);

    /**Some validations */
    include_once('./includes/functions.inc.php');
    if (emptyInputUser($firstname, $lastname, $username, $email, $phone) !== false) {
        header("Location:" . HOMEURL . "admin/update-user.php?id=$id&error=emptyinput");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("Location:" . HOMEURL . "admin/update-user.php?id=$id&error=invalidemail");
        exit();
    }

    /**Query to Update user: */
    $query = "UPDATE user SET 
    username = '$username', first_name = '$firstname', last_name = '$lastname', 
    email = '$email', phone = '$phone', isAdmin = '$admin' 
    WHERE user_id = '$id';";

    $res = mysqli_query($conn, $query);

    if ($res == true) {
        $_SESSION['update'] = "<div class='success'> User updated successfully </div>";
        header("Location:" . HOMEURL . 'admin/manage-admin.php');
    } else {
        $_SESSION['update'] = "<div class='error'> User update failed. Try again later. </div>";
        header("Location:" . HOMEURL . 'admin/manage-admin.php');
    }
}
?>



<?php
include('./partials/footer.php');
?>