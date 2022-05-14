<?php
/**First include the constants.php file. */
include('../config/constants.php');

// Get id of the user to be deleted.
$id = $_GET['id'];

$query = "DELETE FROM user WHERE user_id = $id;";
$res = mysqli_query($conn, $query);
if($res == true){
    $_SESSION['delete'] = "<div class = 'success'> User deleted successfuly. </div>";
    header('Location:'.HOMEURL.'admin/manage-admin.php');
} else {
    $_SESSION['delete'] = "<div class = 'error'> Failed to delete user. </div>";
    header('Location:'.HOMEURL.'admin/manage-admin.php');
}

?>