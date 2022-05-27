<?php
include('../config/constants.php');
include('./partials/login-check.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../resources/icons/font-awesome-4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="../css/admin.css">
    <link rel="shortcut icon" href="../resources/icons/codechef.svg" type="image/x-icon">
    <title>Food Ordering - Admin Panel</title>
</head>

<body>
    <!--Menu Starts Here-->
    <div class="menu">
        <div class="wrapper">
            <ul>
                <li><a href="./index.php">Home</a></li>
                <li><a href="./manage-admin.php">Admin</a></li>
                <li><a href="./manage-category.php">Category</a></li>
                <li><a href="./manage-food.php">Food</a></li>
                <li><a href="./manage-order.php">Order</a></li>
                <li><a href="./logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
    <!--Menu Ends Here-->