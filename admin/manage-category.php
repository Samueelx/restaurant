<?php
include('./partials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>

        <br /> <br />

        <div class="response">
            <?php
            if (isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if (isset($_SESSION['delete'])){
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
            ?>
        </div>

        <br/><br/>

        <!--Button to add category-->
        <a href="<?php echo HOMEURL; ?>admin/add-category.php" class="btn-primary">Add Category</a>

        <br /> <br /> <br />
        <table class="tbl-full">
            <tr>
                <th>Title</th>
                <th>Active</th>
                <th>Last Modified</th>
                <th>Actions</th>
            </tr>

            <?php

            $query = "SELECT * FROM menu_type;";
            $res = mysqli_query($conn, $query);

            $count = mysqli_num_rows($res);

            if ($count > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $active = $row['active'];
                    $modified = $row['created_at'];

                    if($active == 0){
                        $active = "No";
                    } else {
                        $active = "Yes";
                    }

            ?>

                    <tr>
                        <td> <?php echo $title; ?></td>
                        <td> <?php echo $active; ?></td>
                        <td> <?php echo $modified; ?> </td>
                        <td>
                            <a href="#" class="btn-secondary">Update Category</a>
                            <a href="<?php echo HOMEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>" class="btn-danger">Delete Category</a>
                        </td>
                    </tr>

                <?php

                }
            } else {


                ?>

                <tr>
                    <td colspan="4">
                        <div class="error">No categories added.</div>
                    </td>
                </tr>

            <?php
            }
            ?>

        </table>
    </div>
</div>

<?php
include('./partials/footer.php');
?>