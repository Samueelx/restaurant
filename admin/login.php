<?php
include('./partials/login-imports.php');
?>

<body>
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