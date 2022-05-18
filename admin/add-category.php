<?php
include('./partials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>

        <div class="response">
            <?php
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            ?>
        </div>

        <br />

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" id="" placeholder="Category Title">
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <div class="radio">
                            <label for="Yes">
                                <input type="radio" name="active" id="" value="1">
                                Yes
                            </label>
                        </div>

                        <div class="radio">
                            <label for="No">
                                <input type="radio" name="active" id="" value="0">
                                No
                            </label>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" value="Add Category" name="submit" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>

        <?php
        /**Process the data only after the button is clicked: */
        if(isset($_POST['submit'])){
            $title = $_POST['title'];

            if(isset($_POST['active'])){
                $active = $_POST['active'];
            } else {
                $active = 0;
            }

            $query = "INSERT INTO menu_type (title, active, created_at) VALUES ('$title', $active, NOW());";
            $res = mysqli_query($conn, $query);

            if($res == true){
                $_SESSION['add'] = "<div class='success'>Category added successfully!</div>";
                header("Location:".HOMEURL.'admin/manage-category.php');
            } else {
                $_SESSION['add'] = "<div class='error'>Category addition failed!</div>";
                header("Location:".HOMEURL.'admin/add-category.php');
            }

        }

        ?>
    </div>
</div>

<?php
include('./partials/footer.php');
?>