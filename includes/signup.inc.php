<?php
include('../config/constants.php');
include('./functions.inc.php');

if(isset($_POST['submit'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $pwdRepeat = $_POST['pwdrepeat'];

    if (emptyInputSignup($firstname, $lastname, $username, $email, $phone, $password, $pwdRepeat) !== false) {
        header("Location:".HOMEURL.'signup.php?error=emptyinput');
        exit();
    }
    if (invalidUid($username) !== false) {
        header("Location:".HOMEURL.'signup.php?error=invaliduid');
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("Location:".HOMEURL.'signup.php?error=invalidemail');
        exit();
    }
    if (pwdMatch($password, $pwdRepeat) !== false) {
        header("Location:".HOMEURL.'signup.php?error=passwordsdontmatch');
        exit();
    }
    if (uidExists($conn, $username, $email) !== false) {
        header("Location:".HOMEURL.'signup.php?error=usernametaken');
        exit();
    }

    createUser($conn, $username, $firstname, $lastname, $email, $phone, $password);
} else {
    header("Location:".HOMEURL.'signup.php');
    exit();
}