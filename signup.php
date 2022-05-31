<?php include('./config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./resources/icons/codechef.svg" type="image/x-icon">
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="./css/signup.css">
    <script src="./javascript/validation.js" defer></script>
    <title>Sign Up</title>
</head>

<body>
    <main>
        <div class="center">
            <h1>Signup</h1>
            <form action="includes/signup.inc.php" method="POST" id="signup" class="form">
                <div class="txt_field error">
                    <input type="text" name="firstname" id="firstname">
                    <span></span>
                    <label for="firstname">First Name</label>
                    <small></small>
                </div>

                <div class="txt_field success">
                    <input type="text" name="lastname" id="lastname">
                    <span></span>
                    <label for="lastname">Last Name</label>
                    <small></small>
                </div>

                <div class="txt_field">
                    <input type="text" name="username" id="username">
                    <span></span>
                    <label for="username">Username</label>
                    <small></small>
                </div>

                <div class="txt_field">
                    <input type="text" name="email" id="email">
                    <span></span>
                    <label for="email">Email</label>
                    <small></small>
                </div>

                <div class="txt_field">
                    <input type="text" name="phone" id="phone">
                    <span></span>
                    <label for="phone">Phone</label>
                    <small></small>
                </div>

                <div class="txt_field">
                    <input type="password" name="password" id="password">
                    <span></span>
                    <label for="password">Password</label>
                    <small></small>
                </div>

                <div class="txt_field">
                    <input type="password" name="pwdrepeat" id="pwdrepeat">
                    <span></span>
                    <label for="town">Repeat Password</label>
                    <small></small>
                </div>

                <input type="submit" value="Signup" id="signup" name="submit">
            </form>

            <?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == "emptyinput") {
                    echo "<p> Fill in all the fields! </p>";
                } elseif ($_GET['error'] == "invaliduid") {
                    echo "<p> Choose a proper username </p>";
                } elseif ($_GET['error'] == "invalidemail") {
                    echo "<p> Email already in use! </p>";
                } elseif ($_GET['error'] == "passwordsdontmatch") {
                    echo "<p> Passwords don't match! </p>";
                } elseif ($_GET['error'] == "usernametaken") {
                    echo "<p> Username already taken! </p>";
                } elseif ($_GET['error'] == "stmtfailed") {
                    echo "<p> Something went wrong. </p>";
                } elseif ($_GET['error'] == "none") {
                    echo "<p>Nice! You have been signed up.</p>";
                }
            }
            ?>
        </div>
    </main>

</body>

</html>