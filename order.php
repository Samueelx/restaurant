<?php include('./config/constants.php'); ?>

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
                    <a href="<?php echo HOMEURL; ?>login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo HOMEURL; ?>signup.php">Sign Up</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo HOMEURL; ?>menu.php">Menu</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo HOMEURL; ?>about.php">About</a>
                </li>
            </ul>
            <button class="order-btn">Order</button>
        </nav>
    </header>

    <main>
        <section class="food-search">
            <div class="container">
                <h2 class="text-center text-white">Fill this form to comlete your order.</h2>

                <form action="#" class="order">
                    <fieldset>
                        <legend>Selected Food</legend>

                        <div class="food-menu-image">
                            <img src="./resources/images/peperoni-pizza.jpg" alt="Pepperoni Pizza" class="menu-item-image">
                        </div>

                        <div class="food-menu-description">
                            <h3>Food Title</h3>
                            <p class="food-price">KES 1200</p>

                            <div class="order-label">Quantity</div>
                            <input type="number" name="qty" id="qty" class="input-responsive" value="1">
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>Delivery details</legend>
                        <div class="order-label">Username</div>
                        <input type="text" name="username" id="username" placeholder="Username" class="input-responsive">
                        
                        <div class="order-label">Phone number</div>
                        <input type="text" name="phone" id="phone" placeholder="Phone number" class="input-responsive">

                        <div class="order-label">Email</div>
                        <input type="text" name="email" id="email" placeholder="Email" class="input-responsive">

                        <div class="order-label">Street/Address</div>
                        <textarea name="address" id="address" cols="30" rows="10" placeholder="Street or Address" class="input-responsive"></textarea>

                        <br>
                        <input type="submit" value="Confirm-order" name="submit" id="menu-button">
                    </fieldset>
                </form>
            </div>
        </section>
    </main>

<?php include('./partials-front/footer.php'); ?>