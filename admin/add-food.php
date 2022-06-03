<?php
include('./partials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>

        <br /><br />

        <?php
        if(isset($_SESSION['upload'])){
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Name: </td>
                    <td>
                        <input type="text" name="name" id="" placeholder="Name of the food:">
                    </td>
                </tr>

                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" id="" cols="30" rows="5" placeholder="Description of the food:"></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image" id="">
                    </td>
                </tr>

                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price" id="">
                    </td>
                </tr>

                <tr>
                    <td>Category: </td>
                    <td>
                        <select name="category" id="">

                            <?php

                            $sql = "SELECT * FROM menu_type WHERE active = 1;";
                            $res = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($res);

                            if ($count > 0) {
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $id = $row['id'];
                                    $title = $row['title'];

                            ?>
                                    <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                                <?php
                                }
                            } else {
                                ?>
                                <option value="0">No Category Found</option>
                            <?php
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
                                <input type="radio" name="status" id="" value="1">
                                Available
                            </label>
                        </div>

                        <div class="radio">
                            <label for="No">
                                <input type="radio" name="status" id="" value="0">
                                Not Available
                            </label>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" value="Add Food" name="submit" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

        <?php
        if(isset($_POST['submit'])){
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $description = mysqli_real_escape_string($conn, $_POST['description']);
            $price = mysqli_real_escape_string($conn, $_POST['price']);
            $category = $_POST['category'];
            
            if(isset($_POST['status'])){
                $status = $_POST['status'];
            } else {
                $status = 0;
            }
            /**Check whether the select image is clicked or not. */
            if(isset($_FILES['image']['name'])){
                $image_name = $_FILES['image']['name'];

                /**check whether image is selected */
                if($image_name != ""){
                    /**Rename the image */
                    $image_info = explode(".", $image_name);
                    $ext = end($image_info);
                    $image_name = "Food-item-".rand(0000, 9999).".".$ext;

                    /**Upload image */
                    $src = $_FILES['image']['tmp_name'];
                    $dst = "../resources/images/food/".$image_name;

                    $upload = move_uploaded_file($src, $dst);
                    if($upload == false){
                        $_SESSION['upload'] = "<div class='error'> Failed to upload image! </div>";
                        header("Location:".HOMEURL.'admin/add-food.php');
                        die();
                    }
                }
            } else {
                $image_name = "";
            }

            $query = "INSERT INTO Menu (name, description, photo, price, created_at, type_id, status) VALUES ('$name', '$description', '$image_name', $price, NOW(), $category, $status);";
            $response = mysqli_query($conn, $query);
            
            if($response == true){
                $_SESSION['add'] = "<div class='success'> Food item added successfully! </div>";
                header("Location:".HOMEURL.'admin/manage-food.php');
            } else {
                $_SESSION['add'] = "<div class='error'> Failed to add food item! </div>";
                header("Location:".HOMEURL.'admin/manage-food.php');
            }
        }

        ?>
    </div>
</div>

<?php
include('./partials/footer.php');
?>