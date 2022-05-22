<?php
include('./partials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Food</h1>

        <br /> <br />

        <!--Button to add admin-->
        <a href="<?php echo HOMEURL; ?>admin/add-food.php" class="btn-primary">Add Food</a>

        <br /> <br /> <br />
        <table class="tbl-full">
            <tr>
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Actions</th>
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

            <tr>
                <td>fancynancy</td>
                <td>Fancy</td>
                <td>Nancy</td>
                <td>
                    <a href="#" class="btn-secondary">Update Admin</a>
                    <a href="#" class="btn-danger">Delete Admin</a>
                </td>
            </tr>
        </table>
    </div>
</div>

<?php
include('./partials/footer.php');
?>