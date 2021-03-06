<?php
include('./partials/menu.php');

if($_SESSION['isAdmin'] != 1){
    header("Location:".HOMEURL.'admin/index.php?error=unauthorizedaccess');
}
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add User</h1>

        <br><br>

        <?php
        /**I don't think this will work because of the die() function in line  113*/
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>

        <form action="" method="POST" id="signup">
            <table class="tbl-30">
                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" placeholder="Enter Username" id="username">
                        <div class="message"><small></small></div>
                    </td>
                </tr>

                <tr>
                    <td>First Name:</td>
                    <td>
                        <input type="text" name="firstname" id="firstname" placeholder="Enter First Name">
                        <div class="message"><small></small></div>
                    </td>
                </tr>

                <tr>
                    <td>Last Name:</td>
                    <td>
                        <input type="text" name="lastname" id="lastname" placeholder="Enter Last Name">
                        <div class="message"><small></small></div>
                    </td>
                </tr>

                <tr>
                    <td>Email: </td>
                    <td>
                        <input type="text" name="email" id="email" placeholder="Enter Email">
                        <div class="message"><small>
                            <?php
                            if(isset($_GET['error'])){
                                if($_GET['error'] == 'invalidemail'){
                                    echo "Email is invalid";
                                }
                            }
                            ?>
                        </small></div>
                    </td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" id="password" placeholder="Enter Password">
                        <div class="message"><small></small></div>
                    </td>
                </tr>

                <tr>
                    <td>Phone: </td>
                    <td>
                        <input type="text" name="phone" id="phone" placeholder="Enter Email">
                        <div class="message"><small></small></div>
                    </td>
                </tr>

                <tr>
                    <td>Role: </td>
                    <td>
                        <select name="role" id="">
                            <option value="1">Manager</option>
                            <option value="2">Admin</option>
                            <option value="3">Delivery</option>
                            <option value="4" selected>Attendant</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Admin?</td>
                    <td>
                        <div class="radio">
                            <label for="Yes">
                                <input type="radio" name="admin" id="" value="1">
                                Yes
                            </label>
                        </div>

                        <div class="radio">
                            <label for="No">
                                <input type="radio" name="admin" id="" value="0">
                                No
                            </label>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" value="Add User" name="submit" class="btn-secondary add-user">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
include('./partials/footer.php');
?>

<?php
/**Process the data from form and save it in database */

/**Check whether the button is clicked or not. */
if (isset($_POST['submit'])) {
    //Get data from form:
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, sha1($_POST['password']));
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    $admin = mysqli_real_escape_string($conn, $_POST['admin']);

    /**Email Validation */

    function invalidEmail($email) {
        $result = true;
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    if (invalidEmail($email) !== false) {
        header("Location:".HOMEURL.'admin/add-admin.php?error=invalidemail');
        exit();
    }

    //query to save data to our database
    $sql = "INSERT INTO user (username, first_name, last_name, email, passwordHash, phone, role, isAdmin) 
    values ('$username', '$firstname', '$lastname', '$email', '$password', '$phone', $role, '$admin');";
    $res = mysqli_query($conn, $sql) ? true : die(mysqli_error($conn));
    
    /**
     * For some reason, the below code isn't working => 1:17:00.
     * It's working now, after adding ob_start() in my constants.php file
     */
    if($res == true){
        $_SESSION['add'] = "<div class = 'success'>User added successfully </div>";
        header("location:".HOMEURL.'admin/manage-admin.php');
    } else {
        $_SESSION['add'] = "<div class = 'error'> Query to add user failed. </div>";
        header("location:".HOMEURL.'admin/add-admin.php');
    }
}
?>