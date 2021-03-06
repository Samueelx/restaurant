<?php
include('../config/constants.php');

if (isset($_POST['reset-password-submit'])) {
    $selector = $_POST['selector'];
    $validator = $_POST['validator'];
    $password = mysqli_real_escape_string($conn, $_POST['pwd']);
    $passwordRepeat = mysqli_real_escape_string($conn, $_POST['pwd-repeat']);

    if (empty($password) || empty($passwordRepeat)) {
        header("Location:" . HOMEURL . 'reset-password.php?error=emptyinput');
        exit();
    } elseif ($password != $passwordRepeat) {
        header("Location:" . HOMEURL . 'reset-password.php?error=passwordsdontmatch');
        exit();
    }

    $currentDate = date("U");

    /**Select the token from the database */
    $sql = "SELECT * FROM pwdreset WHERE pwdResetSelector = ? AND pwdResetExpires >= $currentDate;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:" . HOMEURL . 'login.php?error=stmtfailed');
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $selector);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        if (!$row = mysqli_fetch_assoc($result)) {
            header("Location:" . HOMEURL . 'reset-password.php?error=resubmit');
            exit();
        } else {
            /**Match the token we have in the db with the token we got from the form(url).
             * Convert the token from our form to binary format - the one in the db is in binary format
             */

            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $row['pwdResetToken']);

            if ($tokenCheck === false) {
                header("Location:" . HOMEURL . 'reset-password.php?error=resubmit');
                exit();
            } elseif ($tokenCheck === true) {
                $tokenEmail = $row['pwdResetEmail'];

                $sql = "SELECT * FROM cutomer WHERE email = ?;";

                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location:" . HOMEURL . 'login.php?error=stmtfailed');
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                    mysqli_stmt_execute($stmt);

                    $result = mysqli_stmt_get_result($stmt);
                    if (!$row = mysqli_fetch_assoc($result)) {
                        header("Location:" . HOMEURL . 'reset-password.php?error=resubmit');
                        exit();
                    } else {
                        /**update the customer table */
                        $sql = "UPDATE customer SET passwordHash = ? WHERE email = ?";

                        $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt, $sql)){
                            header("Location:" . HOMEURL . 'login.php?error=stmtfailed');
                            exit();
                        } else {
                            $newPwdHash = password_hash($password, PASSWORD_DEFAULT);

                            mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail);
                            mysqli_stmt_execute($stmt);



                            /**Delete the token that we created when the customer wanted to reset the password.
                             * We don't always want to have too many tokens inside the db, for the 
                             * same users.
                            */

                            $sql = "DELETE FROM pwdreset WHERE pwdResetEmail = ?";
                            $stmt = mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt, $sql)){
                                header("Location:" . HOMEURL . 'login.php?error=deletestmtfailed');
                                exit(); 
                            } else {
                                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                mysqli_stmt_execute($stmt);
                                header("Location:".HOMEURL.'login.php?newpwd=passwordupdated');
                            }

                        }
                    }
                }
            }
        }
    }
} else {
    header("Location:" . HOMEURL . 'login.php');
}
