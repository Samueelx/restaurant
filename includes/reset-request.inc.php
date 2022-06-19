<?php
include ('../config/constants.php');
include ('./functions.inc.php');

/**Check whether the user is runnung this script correctly: 
 * By clicking the `reset` button
 */
if(isset($_POST['reset-request-submit'])){
    function emptyInput($email) {
        $result = true;
        if(empty($email)){
            $result = true;
        } else {
            $result = false;
        }

        return $result;
    }

    $userEmail = mysqli_real_escape_string($conn, $_POST['email']);
    
    if(emptyInput($userEmail) !== false){
        header("Location:".HOMEURL.'reset-password.php?error=emptyinput');
        exit();
    }

    if (invalidEmail($userEmail) !== false){
        header("Location:".HOMEURL.'reset-password.php?error=invalidemail');
        exit();
    }

    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32); /**A token to authenticate the user */

    $url = HOMEURL."create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);

    $expires = date("U") + 1800;


    $sql = "DELETE FROM pwdreset WHERE pwdResetEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location:".HOMEURL.'login.php?error=stmtfailed');
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);
    }

    $sql = "INSERT INTO pwdreset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location:".HOMEURL.'login.php?error=insertstmtfailed');
        exit();
    } else {
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);

    /**Creating the password recovery e-mail */
    $to = $userEmail;
    $subject = 'Reset your password';

    $message = '<p> We received a password reset request. The link to reset your password is below. If 
    you did not make this request, you can ignore this email. </p>';
    $message .= '<p>Here is your password reset link: </br>';
    $message .= '<a href = "' . $url . '">' . $url . '</a></p>';

    /**Include the headers for the e-mail */
    $headers = "From: admin <gsammypimo@gmail.com>\r\n";
    $headers .= "Reply-To: gsammypimo@gmail.com\r\n";
    $headers .= "Content-type: text/html\r\n"; /**Allows HTML to be part of our e-mail */

    /**Now, send the email to the users */
    mail($to, $subject, $message, $headers);
    header("Location:".HOMEURL.'reset-password.php?reset=success');


} else {
    header("Location:".HOMEURL.'login.php');
}