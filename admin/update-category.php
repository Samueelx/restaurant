<?php
include('./partials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>

        <br /><br />

        <?php

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $sql = "SELECT * FROM menu_type WHERE id = $id;";
            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows(($res));

            if ($count == 1) {
                $row = mysqli_fetch_assoc($res);

                $title = $row['title'];
                $active = $row['active'];
            } else {
                $_SESSION['no-category-found'] = "<div class='error'> Category not found! </div>";
                header("Location:".HOMEURL.'admin/manage-category.php');
            }
        } else {
            header("Location:" . HOMEURL . 'admin/manage-category.php');
        }

        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" id="" value="<?php echo $title; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <div class="radio">
                            <label for="Yes">
                                <input <?php if($active == 1){echo "checked";} ?> type="radio" name="active" id="" value="1">
                                Yes
                            </label>
                        </div>

                        <div class="radio">
                            <label for="No">
                                <input <?php if($active == 0){echo "checked";} ?> type="radio" name="active" id="" value="0">
                                No
                            </label>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" value="Update Category" name="submit" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>

        <?php
        
        if(isset($_POST['submit'])){
            $id = mysqli_real_escape_string($conn, $_POST['id']);
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $active = $_POST['active'];

            $query = "UPDATE menu_type SET title = '$title', active = '$active', created_at = NOW() WHERE id = $id;";
            $response = mysqli_query($conn, $query);

            if($response == true){
                $_SESSION['update'] = "<div class='success'> Category updated successfully </div>";
                header("Location:".HOMEURL.'admin/manage-category.php');
            } else {
                $_SESSION['update'] = "<div class='error'> Failed to update category! </div>";
                header("Location:".HOMEURL.'admin/manage-category.php');
            }

        }

        ?>

    </div>
</div>

<?php
include('./partials/footer.php');
?>