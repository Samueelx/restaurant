<?php include('./config/constants.php');
$customer_id = $_SESSION['customerid'];
if (!isset($customer_id)) {
    header("Location:" . HOMEURL . 'login.php?error=loggedout');
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
    <link rel="stylesheet" href="./css/order.css">
    <link rel="shortcut icon" href="./resources/icons/codechef.svg" type="image/x-icon">
    <title>Order</title>
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
        </nav>
    </header>

    <main>
        <?php
        /**Get details about selected food item */
        if(isset($_GET['food_id'])){
            $food_id = $_GET['food_id'];

            $sql = "SELECT * FROM Menu WHERE item_id = $food_id;";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);

            if($count == 1){
                $row = mysqli_fetch_assoc($res);
                $item_id = $row['item_id'];
                $name = $row['name'];
                $price = $row['price'];
                $image_name = $row['photo'];
            } else {
                header("Location:".HOMEURL.'menu.php?error=foodnotavailable');
            }
        } else {
            header("Location:".HOMEURL.'menu.php?error=fooditemmissing');
        }

        ?>
        <section class="food-search">
            <div class="container">
                <h2 class="text-center text-white">Fill this form to comlete your order.</h2>

                <form action="" method="POST" class="order">
                    <fieldset>
                        <legend>Selected Food</legend>

                        <div class="food-menu-image">
                            <?php
                            if($image_name == ""){
                                echo "<p class='error'> Image is not available </p>";
                            } else {
                                ?>
                                <img src="<?php echo HOMEURL ?>resources/images/food/<?php echo $image_name; ?>" alt="Pepperoni Pizza" class="menu-item-image">
                                <?php
                            }
                            ?>
                            
                        </div>

                        <div class="food-menu-description">
                            <h3><?php echo $name; ?></h3>

                            <input type="hidden" name="name" value="<?php echo $name; ?>">
                            <input type="hidden" name="menu_id" value="<?php echo $item_id; ?>">
                            <input type="hidden" name="customer_id" id="" value="<?php echo $customer_id; ?>">

                            <p class="food-price">KES <?php echo $price; ?></p>
                            <input type="hidden" name="amount" value="<?php echo $price; ?>">

                            <div class="order-label">Quantity</div>
                            <input type="number" name="qty" id="qty" class="input-responsive" value="1">
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>Delivery details</legend>
                        <!--
                        <div class="order-label">Username</div>
                        <input type="text" name="username" id="username" placeholder="Username" class="input-responsive"> -->

                        <!--
                        <div class="order-label">Phone number</div>
                        <input type="text" name="phone" id="phone" placeholder="Phone number" class="input-responsive"> -->

                        <!--
                        <div class="order-label">Email</div>
                        <input type="text" name="email" id="email" placeholder="Email" class="input-responsive"> -->

                        <div class="order-label">Street/Address</div>
                        <textarea name="address" id="address" cols="30" rows="10" placeholder="Street or Address" class="input-responsive"></textarea>

                        <div class="order-label">Town</div>
                        <select name="town" id="" class="input-responsive">
                            <option value="Nairobi">Nairobi</option>
                        </select>

                        <br>
                        <input type="submit" value="Confirm-order" name="submit" id="menu-button">
                    </fieldset>
                </form>

                <?php
                if(isset($_POST['submit'])){
                    $customer_id = mysqli_real_escape_string($conn , $_POST['customer_id']);
                    $menu_id = mysqli_real_escape_string($conn, $_POST['menu_id']);
                    $amount = mysqli_real_escape_string($conn, $_POST['amount']);
                    $quantity = mysqli_real_escape_string($conn, $_POST['qty']);
                    $total_amount = floatval($amount) * floatval($quantity);
                    $order_status = mysqli_real_escape_string($conn, "pending");
                    $street = mysqli_real_escape_string($conn, $_POST['address']);
                    $town = mysqli_real_escape_string($conn, $_POST['town']);

                    $query = "INSERT INTO orders (customer_id, menu_id, order_date, amount, total_amount, order_status, quantity, street, town) VALUES ($customer_id, $menu_id, NOW(), $amount, $total_amount, '$order_status', $quantity, '$street', '$town');";
                    $response = mysqli_query($conn, $query);

                    if($response == true){
                        header("Location:".HOMEURL.'menu.php?error=ordersuccessful');
                    } else {
                        header("Location:".HOMEURL.'menu.php?error=ordernotsuccessful');
                    }
                }
                ?>
            </div>
        </section>
    </main>

    <?php include('./partials-front/footer.php'); ?>