<?php
include('./partials/menu.php');
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
                    </td>
                    <small></small>
                </tr>

                <tr>
                    <td>First Name:</td>
                    <td>
                        <input type="text" name="firstname" id="firstname" placeholder="Enter First Name">
                    </td>
                    <small></small>
                </tr>

                <tr>
                    <td>Last Name:</td>
                    <td>
                        <input type="text" name="lastname" id="lastname" placeholder="Enter Last Name">
                    </td>
                    <small></small>
                </tr>

                <tr>
                    <td>Email: </td>
                    <td>
                        <input type="text" name="email" id="email" placeholder="Enter Email">
                    </td>
                    <small></small>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" id="password" placeholder="Enter Password">
                    </td>
                    <small></small>
                </tr>

                <tr>
                    <td>Phone: </td>
                    <td>
                        <input type="text" name="phone" id="phone" placeholder="Enter Email">
                    </td>
                    <small></small>
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
    $admin = mysqli_real_escape_string($conn, $_POST['admin']);

    //query to save data to our database
    $sql = "INSERT INTO user (username, first_name, last_name, email, passwordHash, phone, isAdmin) 
    values ('$username', '$firstname', '$lastname', '$email', '$password', '$phone', '$admin');";
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