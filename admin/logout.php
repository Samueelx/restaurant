<?php
include('../config/constants.php');
/**Destroy the session and redirect to the login page. */

session_destroy();
header("Location:".HOMEURL.'admin/login.php');
?>