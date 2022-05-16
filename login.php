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


    <script src="./javascript/validation.js" defer></script>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/login.css">
    <title>Login</title>
</head>

<body>
    <header>
        <nav class="navigation">
            <div>
                <h2 id="heading">Online Food Ordering</h2>
            </div>
            <ul id="navigation-list" class="navigation-list">
                <li class="nav-item">
                    <a href="./index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a href="./login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a href="./signup.php">Sign Up</a>
                </li>
                <li class="nav-item">
                    <a href="./menu.php">Menu</a>
                </li>
                <li class="nav-item">
                    <a href="./about.php">About</a>
                </li>
            </ul>
            <button class="order-btn">Order</button>
        </nav>
    </header>



    <main>
        <div class="positioning">
            <div class="center">
                <h1>Login</h1>
                <form action="" method="POST">
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
        </div>
    </main>
</body>

</html>