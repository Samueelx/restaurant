<?php
/**Authorization - Access control */
if(!isset($_SESSION['user'])){
    $_SESSION['no-login-message'] = "<div class='error'> Please login to access your dashboard. </div>";
    header("Location:".HOMEURL.'admin/login.php');
}
