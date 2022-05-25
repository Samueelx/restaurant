<?php
include('./partials/menu.php');
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
                        <input type="text" name="name" id="">
                    </td>
                </tr>

                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" id="" cols="30" rows="5"></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Current Image: </td>
                    <td>
                        Display Image if available.
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
                        <input type="number" name="price" id="">
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
                                    <option value="<?php echo $category_id; ?>"> <?php echo $category_title; ?> </option>
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
                        <input type="submit" value="Update Food" name="submit" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>





<?php include('./partials/footer.php'); ?>