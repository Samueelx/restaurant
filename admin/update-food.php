<?php
include('./partials/menu.php');
?>

<?php

if(isset($_GET['id'])){
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
    header("Location:".HOMEURL.'admin/manage-food.php');
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
                        if($current_image_name == ""){
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

                            if($count>0){
                                while($row=mysqli_fetch_assoc($res)){
                                    $category_title = $row['title'];
                                    $category_id = $row['id'];

                                    ?>
                                    <option <?php if($current_category == $category_id){echo "selected";} ?> value="<?php echo $category_id; ?>"> <?php echo $category_title; ?> </option>
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
                                <input <?php if($status == 1){echo "checked";} ?> type="radio" name="status" id="" value="1">
                                Available
                            </label>
                        </div>

                        <div class="radio">
                            <label for="No">
                                <input <?php if($status == 0){echo "checked";} ?> type="radio" name="status" id="" value="0">
                                Not Available
                            </label>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" value="Update Food" name="submit" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>





<?php include('./partials/footer.php'); ?>