<?php
include('../config/constants.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "DELETE FROM menu_type WHERE id = $id;";
    $res = mysqli_query($conn, $query);

    if($res == true){
        $_SESSION['delete'] = "<div class='success'> Category deleted successfully. </div>";
        header("Location:".HOMEURL.'admin/manage-category.php');
    } else {
        $_SESSION['delete'] = "<div class='error'> Failed to delete category! </div>";
        header("Location:".HOMEURL.'admin/manage-category.php');
    }
} else {
    header("Location:".HOMEURL.'admin/manage-category.php');
}
?>