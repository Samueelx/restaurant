<?php 
include('./config/constants.php'); 
$customer_id = $_SESSION['customerid'];
if(!isset($customer_id)){
    header("Location:".HOMEURL.'login.php?error=loggedout');
    exit();
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

    <link rel="stylesheet" href="./css/style.css">
    <!-- <link rel="stylesheet" href="./css/menu.css"> -->
    <link rel="shortcut icon" href="./resources/icons/codechef.svg" type="image/x-icon">
    <title>Pimo</title>
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