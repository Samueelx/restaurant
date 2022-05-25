<?php
include('./partials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Food</h1>

        <br /> <br />

        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if(isset($_SESSION['delete'])){
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }

        if(isset($_SESSION['upload'])){
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }

        if(isset($_SESSION['unauthorize'])){
            echo $_SESSION['unauthorize'];
            unset($_SESSION['unauthorize']);
        }

        if(isset($_SESSION['update'])){
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        ?>

        <br /> <br />

        <!--Button to add admin-->
        <a href="<?php echo HOMEURL; ?>admin/add-food.php" class="btn-primary">Add Food</a>

        <br /> <br /> <br />
        <table class="tbl-full">
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Available</th>
                <th>Actions</th>
            </tr>

            <?php

            $query = "SELECT * FROM Menu;";
            $res = mysqli_query($conn, $query);

            $count = mysqli_num_rows($res);
            if ($count > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['item_id'];
                    $name = $row['name'];
                    $image_name = $row['photo'];
                    $price = $row['price'];
                    $status = $row['status'];

                    if($status == 0){
                        $status = "No";
                    } else {
                        $status = "Yes";
                    }

            ?>

                    <tr>
                        <td><?php echo $name; ?></td>
                        <td>KES <?php echo $price; ?></td>
                        <td>
                            <?php
                            if($image_name == ""){
                                echo "<div class='error'> Image not available in database table. </div>";
                            } else {
                                ?>
                                <img src="<?php echo HOMEURL; ?>resources/images/food/<?php echo $image_name; ?>" height="100px" width="150px">
                                <?php
                            }
                            ?>
                        </td>
                        <td><?php echo $status; ?></td>
                        <td>
                            <a href="<?php echo HOMEURL; ?>admin/update-food.php?id=<?php echo $id; ?>" class="btn-secondary">Update Item</a>
                            <a href="<?php echo HOMEURL; ?>admin/delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Item</a>
                        </td>
                    </tr>

            <?php
                }
            } else {
                echo "<tr> <td colspan='5' class='error'> Food items not yet added to database. <td> </tr>";
            }
            ?>

        </table>
    </div>
</div>

<?php
include('./partials/footer.php');
?>