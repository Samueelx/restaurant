<?php
include('./partials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add User</h1>

        <br><br>

        <?php
        /**I don't think this will work because of the die() function in line 113*/
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" placeholder="Enter Username" id="username">
                    </td>
                </tr>

                <tr>
                    <td>First Name:</td>
                    <td>
                        <input type="text" name="firstname" id="firstname" placeholder="Enter First Name">
                    </td>
                </tr>

                <tr>
                    <td>Last Name:</td>
                    <td>
                        <input type="text" name="lastname" id="lastname" placeholder="Enter Last Name">
                    </td>
                </tr>

                <tr>
                    <td>Email: </td>
                    <td>
                        <input type="text" name="email" id="email" placeholder="Enter Email">
                    </td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" id="password" placeholder="Enter Password">
                    </td>
                </tr>

                <tr>
                    <td>Phone: </td>
                    <td>
                        <input type="text" name="phone" id="phone" placeholder="Enter Email">
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
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = sha1($_POST['password']);
    $phone = $_POST['phone'];
    $admin = $_POST['admin'];

    //query to save data to our database
    $sql = "INSERT INTO user (username, first_name, last_name, email, passwordHash, phone, isAdmin) 
    values ('$username', '$firstname', '$lastname', '$email', '$password', '$phone', '$admin');";
    $res = mysqli_query($conn, $sql) ? true : die(mysqli_error($conn));
    
    /**
     * For some reason, the below code isn't working => 1:17:00.
     * It's working now, after adding ob_start() in my constants.php
     */
    if($res == true){
        $_SESSION['add'] = "Admin added successfully";
        header("location:".HOMEURL.'admin/manage-admin.php');
    } else {
        $_SESSION['add'] = "Query to add user failed";
        header("location:".HOMEURL.'admin/add-admin.php');
    }
}
?>