<?php
include('./config/constants.php');
$customer_id = $_SESSION['customerid'];
if (!isset($customer_id)) {
    header("Location:" . HOMEURL . 'index.php');
    exit();
}

if(isset($_POST['update-profile'])){
    $update_name = mysqli_real_escape_string($conn, $_POST['update-name']);
    $update_firstname = mysqli_real_escape_string($conn, $_POST['update-firstname']);
    $update_lastname = mysqli_real_escape_string($conn, $_POST['update-lastname']);
    $update_email = mysqli_real_escape_string($conn, $_POST['update-email']);
    $update_phone = mysqli_real_escape_string($conn, $_POST['update-phone']);

    $query = "UPDATE customer SET username = ?, first_name = ?, last_name = ?, email = ?, phone = ? WHERE customer_id = ?;";
    $statement = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($statement, $query)){
        header("Location:".HOMEURL.'update-profile.php?error=stmtfailed');
        exit();
    }

    mysqli_stmt_bind_param($statement, "ssssii", $update_name, $update_firstname, $update_lastname, $update_email, $update_phone, $customer_id);
    mysqli_stmt_execute($statement);
    header("Location:".HOMEURL.'update-profile.php?error=none');

    $old_password = $_POST['old-pass'];
    $update_password = mysqli_real_escape_string($conn, $_POST['update-pass']);
    $new_password = mysqli_real_escape_string($conn, $_POST['new-pass']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm-pass']);

    if(!empty($update_password) || !empty($new_password) || !empty($confirm_password)){

        function pwdMatch($password, $pwdRepeat) {
            $result = true;
            if($password !== $pwdRepeat){
                $result = true;
            } else {
                $result = false;
            }
            return $result;
        }
        // $hashed_old_password = password_hash($update_password, PASSWORD_DEFAULT);
        $checkpassword = password_verify($update_password, $old_password);
        if($checkpassword == false){
            header("Location:".HOMEURL.'update-profile.php?error=wrongoldpassword');
            exit();
        } elseif(pwdMatch($new_password, $confirm_password) === true){
            header("Location:".HOMEURL.'update-profile.php?error=confirmpasswordnotmatched');
            exit();
        } else {
            $new_hashedpwd = password_hash($new_password, PASSWORD_DEFAULT);

            $query2 = "UPDATE customer SET passwordHash = '$new_hashedpwd' WHERE customer_id = $customer_id;";
            $res = mysqli_query($conn, $query2);
            if($res == false){
                header("Location:".HOMEURL.'update-profile.php?error=queryfailed');
                exit();
            }
            header("Location:".HOMEURL.'update-profile.php?error=none');
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./resources/icons/font-awesome-4.7.0/css/font-awesome.min.css">

    <link rel="shortcut icon" href="./resources/icons/codechef.svg" type="image/x-icon">
    <script src="./javascript/menu.js" defer></script>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/profile.css">
    <title>Profile</title>
</head>

<body>
    <header>
        <nav class="navigation">
            <div>
                <h2 id="heading">Online Food Ordering</h2>
            </div>
            <ul id="navigation-list" class="navigation-list">
                <li class="nav-item">
                    <a href="<?php echo HOMEURL; ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo HOMEURL; ?>menu.php">Menu</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo HOMEURL; ?>about.php">About</a>
                </li>
                <?php
                if (isset($_SESSION['customeruid'])) {
                ?>
                    <li class="nav-item">
                        <a href="<?php echo HOMEURL; ?>profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo HOMEURL; ?>includes/logout.inc.php">Log out</a>
                    </li>
                <?php

                } else {
                ?>
                    <li class="nav-item">
                        <a href="<?php echo HOMEURL; ?>login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo HOMEURL; ?>signup.php">Sign Up</a>
                    </li>
                <?php

                }
                ?>
            </ul>
            <!-- <button class="order-btn">Order</button> -->
        </nav>
    </header>

    <main>
        <div class="update-profile">
            <?php
            $select = "SELECT * FROM customer WHERE customer_id = ?;";
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $select)) {
                header("Location:" . HOMEURL . 'login.php?error=stmtfailed');
                exit();
            }

            mysqli_stmt_bind_param($stmt, "i", $customer_id);
            mysqli_stmt_execute($stmt);
            $result_data = mysqli_stmt_get_result($stmt);
            $fetch = mysqli_fetch_assoc($result_data);
            ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <img src="./resources/icons/default-avatar.png" alt="Default Avatar">
                <div class="flex">
                    <div class="inputBox">
                        <span>Username: </span>
                        <input type="text" name="update-name" id="" value="<?php echo $fetch['username']; ?>" class="box">
                        <span>First Name: </span>
                        <input type="text" name="update-firstname" id="" value="<?php echo $fetch['first_name']; ?>" class="box">
                        <span>Last Name: </span>
                        <input type="text" name="update-lastname" id="" value="<?php echo $fetch['last_name']; ?>" class="box">
                        <span>Your Email: </span>
                        <input type="text" name="update-email" id="" value="<?php echo $fetch['email']; ?>" class="box">
                    </div>
                    <div class="inputBox">
                        <input type="hidden" name="old-pass" value="<?php echo $fetch['passwordHash']; ?>">
                        <span>Phone: </span>
                        <input type="text" name="update-phone" id="" value="<?php echo $fetch['phone']; ?>" class="box">
                        <span>Old Password: </span>
                        <input type="password" name="update-pass" id="" placeholder="Enter Previous password..." class="box">
                        <span>New Password: </span>
                        <input type="password" name="new-pass" id="" placeholder="Enter New password..." class="box">
                        <span>Confirm Password: </span>
                        <input type="password" name="confirm-pass" id="" placeholder="Confirm New password..." class="box">
                    </div>
                </div>
                <input type="submit" value="Update Profile" name="update-profile" class="btn">
                <a href="<?php HOMEURL; ?>profile.php" class="delete-btn">Go back</a>
            </form>
        </div>
    </main>
</body>