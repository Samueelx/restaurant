<?php
include('./partials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add User</h1>

        <br><br>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" placeholder="Enter Username">
                    </td>
                </tr>

                <tr>
                    <td>First Name:</td>
                    <td>
                        <input type="text" name="first-name" id="" placeholder="Enter First Name">
                    </td>
                </tr>

                <tr>
                    <td>Last Name:</td>
                    <td>
                        <input type="text" name="last-name" id="" placeholder="Enter Last Name">
                    </td>
                </tr>

                <tr>
                    <td>Email: </td>
                    <td>
                        <input type="text" name="email" id="" placeholder="Enter Email">
                    </td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" id="" placeholder="Enter Password">
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

?>