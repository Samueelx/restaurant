<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="./css/signup.css">
    <script src="./javascript/validation.js" defer></script>
    <title>Sign Up</title>
</head>

<body>
    <main>
        <div class="center">
            <h1>Signup</h1>
            <form action="" method="post" id="signup" class="form">
                <div class="txt_field">
                    <input type="text" name="firstname" id="firstname">
                    <span></span>
                    <label for="firstname">First Name</label>
                </div>

                <div class="txt_field">
                    <input type="text" name="lastname" id="lastname">
                    <span></span>
                    <label for="lastname">Last Name</label>
                </div>

                <div class="txt_field">
                    <input type="text" name="username" id="username">
                    <span></span>
                    <label for="username">Username</label>
                </div>

                <div class="txt_field">
                    <input type="text" name="phone" id="phone">
                    <span></span>
                    <label for="phone">Phone</label>
                </div>

                <div class="txt_field">
                    <input type="password" name="password" id="password">
                    <span></span>
                    <label for="password">Password</label>
                </div>

                <div class="txt_field">
                    <input type="text" name="street" id="street">
                    <span></span>
                    <label for="street">Street Name</label>
                </div>

                <div class="txt_field">
                    <input type="text" name="town" id="town">
                    <span></span>
                    <label for="town">Town</label>
                </div>

                <input type="submit" value="Signup">
            </form>
        </div>
    </main>
</body>

</html>