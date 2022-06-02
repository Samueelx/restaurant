<?php
include('./config/constants.php');
$customer_id = $_SESSION['customerid'];
if (!isset($customer_id)) {
    header("Location:" . HOMEURL . 'index.php');
    exit();
}


if(isset($_POST['update-profile'])){
    $update_name = mysqli_real_escape_string($conn, $_POST['update-name']);
    $update_firstname = mysqli_real_escape_string($conn, $_POST['update-firstname']);
    $update_lastname = mysqli_real_escape_string($conn, $_POST['update-lastname']);
    $update_email = mysqli_real_escape_string($conn, $_POST['update-email']);
    $update_phone = mysqli_real_escape_string($conn, $_POST['update-phone']);

    $query = "UPDATE customer SET username = ?, first_name = ?, last_name = ?, email = ?, phone = ? WHERE customer_id = ?;";
    $statement = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($statement, $query)){
        header("Location:".HOMEURL.'update-profile.php?error=stmtfailed');
        exit();
    }

    mysqli_stmt_bind_param($statement, "ssssii", $update_name, $update_firstname, $update_lastname, $update_email, $update_phone, $customer_id);
    mysqli_stmt_execute($statement);
    header("Location:".HOMEURL.'update-profile.php?error=none');

    $old_password = $_POST['old-pass'];
    $update_password = mysqli_real_escape_string($conn, $_POST['update-pass']);
    $new_password = mysqli_real_escape_string($conn, $_POST['new-pass']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm-pass']);

    if(!empty($update_password) || !empty($new_password) || !empty($confirm_password)){

        function pwdMatch($password, $pwdRepeat) {
            $result = true;
            if($password !== $pwdRepeat){
                $result = true;
            } else {
                $result = false;
            }
            return $result;
        }
        // $hashed_old_password = password_hash($update_password, PASSWORD_DEFAULT);
        $checkpassword = password_verify($update_password, $old_password);
        if($checkpassword == false){
            header("Location:".HOMEURL.'update-profile.php?error=wrongoldpassword');
            exit();
        } elseif(pwdMatch($new_password, $confirm_password) === true){
            header("Location:".HOMEURL.'update-profile.php?error=confirmpasswordnotmatched');
            exit();
        } else {
            $new_hashedpwd = password_hash($new_password, PASSWORD_DEFAULT);

            $query2 = "UPDATE customer SET passwordHash = '$new_hashedpwd' WHERE customer_id = $customer_id;";
            $res = mysqli_query($conn, $query2);
            if($res == false){
                header("Location:".HOMEURL.'update-profile.php?error=queryfailed');
                exit();
            }
            header("Location:".HOMEURL.'update-profile.php?error=none');
            exit();
        }
    }
}