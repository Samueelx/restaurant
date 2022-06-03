<?php
include('./partials/menu.php');
?>

<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql2 = "SELECT * FROM Menu WHERE item_id=$id;";
    $res2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($res2);

    $name = $row2['name'];
    $description = $row2['description'];
    $current_image_name = $row2['photo'];
    $price = $row2['price'];
    $current_category = $row2['type_id'];
    $status = $row2['status'];
} else {
    header("Location:" . HOMEURL . 'admin/manage-food.php');
}

?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Food</h1>
        <br /> <br />

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Name: </td>
                    <td>
                        <input type="text" name="name" id="" value="<?php echo $name; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" id="" cols="30" rows="5"> <?php echo $description; ?> </textarea>
                    </td>
                </tr>

                <tr>
                    <td>Current Image: </td>
                    <td>
                        <?php
                        if ($current_image_name == "") {
                            echo "<div> Image is not available! </div>";
                        } else {
                        ?>
                            <img src="<?php echo HOMEURL; ?>resources/images/food/<?php echo $current_image_name; ?>" alt="" height="150px" width="200px">
                        <?php
                        }

                        ?>
                    </td>
                </tr>

                <tr>
                    <td>Select New Image: </td>
                    <td>
                        <input type="file" name="image" id="">
                    </td>
                </tr>

                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price" id="" value="<?php echo $price; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Category: </td>
                    <td>
                        <select name="category" id="">

                            <?php
                            $sql = "SELECT * FROM menu_type WHERE active=1;";
                            $res = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($res);

                            if ($count > 0) {
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $category_title = $row['title'];
                                    $category_id = $row['id'];

                            ?>
                                    <option <?php if ($current_category == $category_id) {
                                                echo "selected";
                                            } ?> value="<?php echo $category_id; ?>"> <?php echo $category_title; ?> </option>
                            <?php
                                }
                            } else {
                                echo "<option value='0'> Category not available </option>";
                            }
                            ?>


                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Status: </td>
                    <td>
                        <div class="radio">
                            <label for="Yes">
                                <input <?php if ($status == 1) {
                                            echo "checked";
                                        } ?> type="radio" name="status" id="" value="1">
                                Available
                            </label>
                        </div>

                        <div class="radio">
                            <label for="No">
                                <input <?php if ($status == 0) {
                                            echo "checked";
                                        } ?> type="radio" name="status" id="" value="0">
                                Not Available
                            </label>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="current_image" value="<?php echo $current_image_name; ?>">
                        <input type="submit" value="Update Food" name="submit" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

        <?php
        if(isset($_POST['submit'])){
            $id = mysqli_real_escape_string($conn, $_POST['id']);
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $description = mysqli_real_escape_string($conn, $_POST['description']);
            $current_image = $_POST['current_image'];
            $price = mysqli_real_escape_string($conn, $_POST['price']);
            $category = $_POST['category'];
            $status = $_POST['status'];
            

            /**Check whether the upload button is seleced. */
            if($_FILES['image']['name'] != ""){
                $image_name = $_FILES['image']['name'];

                /**Check whether the image file is available */
                if($image_name != ""){
                    /**Rename the image */
                    //$ext = end(explode('.', $image_name));
                    $image_info = explode(".", $image_name);
                    $ext = end($image_info);
                    $image_name = "Food-Item-".rand(0000, 9999).".".$ext;

                    /**Upload the image */
                    $source_path = $_FILES['image']['tmp_name'];
                    $destination_path = "../resources/images/food/".$image_name;

                    $upload = move_uploaded_file($source_path, $destination_path);
                    if($upload == false){
                        $_SESSION['upload'] = "<div class='error'> Failed to upload new image </div>";
                        header("Location:".HOMEURL.'admin/manage-food.php');
                        die();
                    }

                    /**Remove current image if it's available. */
                    if($current_image != ""){
                        $remove_path = "../resources/images/food/".$current_image;
                        $remove = unlink($remove_path);

                        if($remove == false){
                            $_SESSION['remove-failed'] = "<div> Failed to remove the current image. </div>";
                            header("Location:".HOMEURL.'admin/manage-food.php');

                            die();
                        }
                    }
                } else {
                    /**Default image when new image is not selected. */
                    $image_name = $current_image;   
                }


            } else {
                /**Default image when add file/image button is not clicked */
                $image_name = $current_image;
            }

            /**Update database table */
            $query = "UPDATE Menu SET name = '$name', description = '$description', photo = '$image_name', price = $price, type_id = $category, status = $status WHERE item_id = $id;";
            $response = mysqli_query($conn, $query);
            if($response == true){
                $_SESSION['update'] = "<div class='success'> Food updated successfully. </div>";
                header("Location:".HOMEURL.'admin/manage-food.php');
            } else {
                $_SESSION['update'] = "<div class='error'> Failed to update food item. </div>";
                header("Location:".HOMEURL.'admin/manage-food.php');
            }

        }


        ?>
    </div>
</div>





<?php include('./partials/footer.php'); ?>