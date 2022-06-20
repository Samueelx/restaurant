<?php include('./config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./resources/icons/codechef.svg" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/login.css">
    <script src="./javascript/validation.js" defer></script>
    <title>Login</title>
</head>

<body>
    <header style="height: 10vh; padding: 1.5rem;">
        <nav class="navigation">
            <div>
                <h2 id="heading" style="float: none;">Online Food Ordering</h2>
            </div>
        </nav>
    </header>



    <main>
        <div class="positioning">
            <div class="center">
                <?php
                /**check and grab the tokens inside the url */
                $selector = $_GET['selector'];
                $validator = $_GET['validator'];

                if (empty($selector) || empty($validator)) {
                    header("Location:" . HOMEURL . 'reset-password.php?error=emptytokens');
                } else {
                    /**Check whether these tokens are in fact hexadecimal tokens */
                    if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {

                ?>

                        <h1>Create new password</h1>
                        <form action="./includes/reset-password.inc.php" method="POST">
                            <div class="txt_field error">
                                <input type="hidden" name="selector" value="<?php echo $selector; ?>">
                                <input type="hidden" name="validator" value="<?php echo $validator; ?>">

                                <input type="password" name="pwd" id="password">
                                <span></span>
                                <label for="username">Enter new password</label>
                                <small></small>
                            </div>
                            <div class="txt_field success">
                                <input type="password" name="pwd-repeat" id="password">
                                <span></span>
                                <label for="password">Confirm Password</label>
                                <small></small>
                            </div>
                            <div class="pass">
                                <a href="<?php echo HOMEURL; ?>reset-password.php">Forgot Password?</a>
                            </div>
                            <input type="submit" value="Reset Password" id="signup" name="reset-password-submit">
                            <div class="signup_link">
                                Not a member? <a href="./signup.php">Sign Up</a>
                            </div>
                        </form>


                <?php
                    }
                }

                ?>
            </div>
        </div>
    </main>
</body>

</html>