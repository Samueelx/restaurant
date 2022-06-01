<?php

function emptyInputSignup($firstname, $lastname, $username, $email, $phone, $password, $pwdRepeat){
   $result = true; 
   if(empty($firstname) || empty($lastname) || empty($username) || empty($email) || empty($phone) || empty($password) || empty($pwdRepeat)){
       $result = true;
   } else {
       $result = false;
   }

   return $result;
}

function invalidUid($username){
    $result = true;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    $result = true;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function pwdMatch($password, $pwdRepeat) {
    $result = true;
    if($password !== $pwdRepeat){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function uidExists($conn, $username, $email){
    $sql = "SELECT * FROM customer WHERE username = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:".HOMEURL.'signup.php?stmtfailed');
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $username, $firstname, $lastname, $email, $phone, $password){
    $sql = "INSERT INTO customer (username, first_name, last_name, email, phone, passwordHash, registered_at) VALUES (?, ?, ?, ?, ?, ?, NOW());";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location:".HOMEURL.'signup.php?stmtfailed');
        exit();
    }

    $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssssis", $username, $firstname, $lastname, $email, $phone, $hashedpwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("Location:".HOMEURL.'signup.php?error=none');
    exit();

}

function emptyInputLogin($username, $password){
    $result = true;
    if(empty($username) || empty($password)){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $password){
    $uidExists = uidExists($conn, $username, $username);

    if($uidExists === false){
        header("Location:".HOMEURL.'login.php?error=wronglogin');
        exit();
    }

    $pwdHashed = $uidExists['passwordHash'];
    $checkpwd = password_verify($password, $pwdHashed);

    if($checkpwd === false){
        header("Location:".HOMEURL.'login.php?error=wronglogin');
        exit();
    } elseif($checkpwd === true){
        /**Log in the customer */
        $_SESSION['customerid'] = $uidExists['customer_id'];
        $_SESSION['customeruid'] = $uidExists['username'];
        header("Location:".HOMEURL.'index.php');
        exit();
    }
}