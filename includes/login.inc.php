<?php
include('../config/constants.php');
include('./functions.inc.php');

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(emptyInputLogin($username, $password) !== false){
        header("Location:".HOMEURL.'login.php?error=emptyinput');
        exit();
    }

    loginUser($conn, $username, $password);
} else {
    header("Location:".HOMEURL.'login.php');
    exit();
}