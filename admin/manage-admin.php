<?php
include('./partials/menu.php');
?>

<!--Main Content starts Here-->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Admin</h1>
        <br /> <br />

        <!--Button to add admin-->
        <a href="./add-admin.php" class="btn-primary">Add Admin</a>

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
<!--Main Content Ends Here-->

<?php
include('./partials/footer.php');
?>