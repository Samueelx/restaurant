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
                <h1>Login</h1>
                <form action="./includes/login.inc.php" method="POST">
                    <div class="txt_field error">
                        <input type="text" name="username" id="username">
                        <span></span>
                        <label for="username">Username or Email</label>
                        <small></small>
                    </div>
                    <div class="txt_field success">
                        <input type="password" name="password" id="password">
                        <span></span>
                        <label for="password">Password</label>
                        <small></small>
                    </div>
                    <div class="pass">Forgot Password?</div>
                    <input type="submit" value="Login" id="signup" name="submit">
                    <div class="signup_link">
                        Not a member? <a href="./signup.php">Sign Up</a>
                    </div>
                </form>

                <?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == "emptyinput") {
                        echo "<p> Fill in all the fields! </p>";
                    } elseif ($_GET['error'] == "wronglogin") {
                        echo "<p> Incorrect login information! </p>";
                    } elseif ($_GET['error'] == "stmtfailed") {
                        echo "<p> Something went wrong! Please try again. </p>";
                    } elseif ($_GET['error'] == "loggedout"){
                        echo "<p> Please login to access the page. </p>";
                    }
                }
                ?>
            </div>
        </div>
    </main>
</body>

</html>