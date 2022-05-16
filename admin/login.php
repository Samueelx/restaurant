<?php
include('./partials/login-imports.php');
?>

<body>
    <main>
        <div class="positioning">
            <div class="center">
                <h1>Login</h1>

                <?php
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
                ?>

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
                    <input type="submit" value="Login" name="submit" id="signup">
                    <div class="signup_link">
                        Not a member? <a href="./signup.php">Sign Up</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>

<?php

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = sha1($_POST['password']);

    $query = "SELECT * FROM user WHERE username = '$username' AND passwordHash = '$password';";

    $res = mysqli_query($conn, $query);

    /**Check whether user exists: */
    $count = mysqli_num_rows($res);
    if($count == 1){
        $_SESSION['login'] = "<div class='success'> Login Successfull! </div>";
        header("Location:".HOMEURL.'admin/');
    } else {
        $_SESSION['login'] = "<div class='error'> Login attempt failed! Username and Password do not match. </div>";
        header("Location:".HOMEURL.'admin/login.php');
    }
}

?>