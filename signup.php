<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./javascript/validation.js" defer></script>
    <title>Sign Up</title>
</head>
<body>
    <main>
        <div class="center">
            <h1>Signup</h1>
            <form action="" method="post" id="signup" class="form">
                <div class="txt_field">
                <label for="firstname">
                    <input type="text" name="firstname" id="firstname">
                First Name</label> 
                </div> 
                
                <div class="txt_field">
                    <label for="lastname">
                        <input type="text" name="lastname" id="lastname">
                    Last Name</label>
                </div>

                <div class="txt_field">
                    <label for="username">
                        <input type="text" name="username" id="username">
                    Username</label>
                </div>

                <div class="txt_field">
                    <label for="phone">
                        <input type="text" name="phone" id="phone">
                    Phone Number</label>
                </div>

                <div class="txt_field">
                    <label for="password">
                        <input type="password" name="password" id="password">
                    Password</label>
                </div>

                <div class="txt_field">
                    <label for="street">
                        <input type="text" name="street" id="street">
                    Street</label>
                </div>

                <div class="txt_field">
                    <label for="town">
                        <input type="text" name="town" id="town">
                    Town</label>
                </div>

                <input type="submit" value="Signup">
            </form>
        </div>
    </main>
</body>
</html>