<?php
include('../config/constants.php');


if(isset($_GET['id']) && isset($_GET['image_name'])){
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    /**Remove/Delete image if it's available */
    $path = "../resources/images/food/".$image_name;
    $remove = unlink($path);

    if($remove == false){
        $_SESSION['upload'] = "<div class='error'> Failed to remove image file! </div>";
        header("Location:".HOMEURL.'admin/manage-food.php');
        die();
    }

    /**Delete menu item from database. */
    $sql = "DELETE FROM Menu WHERE item_id=$id;";
    $res = mysqli_query($conn, $sql);

    if($res == true){
        $_SESSION['delete'] = "<div class='success'> Food Item deleted successfully! </div>";
        header("Location:".HOMEURL.'admin/manage-food.php');
    } else {
        $_SESSION['delete'] = "<div class='error'> Failed to delete food item. </div>";
        header("Location:".HOMEURL.'admin/manage-food.php');
    }

} else {
    $_SESSION['unauthorize'] = "<div class='error'> Unauthorized Access! </div>";
    header("Location:".HOMEURL.'admin/manage-food.php');
}
?>