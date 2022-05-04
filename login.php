<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./resources/icons/codechef.svg" type="image/x-icon">
    <script src="./javascript/validation.js" defer></script>
    <link rel="stylesheet" href="./css/login.css">
    <title>Login</title>
</head>
<body>
    <main>
        <div class="center">
            <h1>Login</h1>
            <form action="" method="post">
                <div class="txt_field error">
                    <input type="text" name="username" id="username">
                    <span></span>
                    <label for="username">Username</label>
                    <small></small>
                </div>
                <div class="txt_field success">
                    <input type="password" name="password" id="password">
                    <span></span>
                    <label for="password">Password</label>
                    <small></small>
                </div>
                <div class="pass">Forgot Password?</div>
                <input type="submit" value="Login" id="signup">
                <div class="signup_link">
                    Not a member? <a href="./signup.php">Sign Up</a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>