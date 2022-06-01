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

    <link rel="shortcut icon" href="./resources/icons/codechef.svg" type="image/x-icon">
    <script src="./javascript/menu.js" defer></script>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/menu.css">
    <title>Search Results</title>
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
            <!--<button class="order-btn">Order</button>-->
        </nav>
    </header>

    <main>
        <section>
            <div class="menu">
                <div class="heading">
                    <h2>&mdash; Search Results &mdash;</h2>
                </div>

                <?php
                $search = mysqli_real_escape_string($conn, $_POST['search']);
                if ($search == "") {
                    $_SESSION['empty'] = "<div class='error'>Search input is empty!</div>";
                    header("Location:" . HOMEURL . 'menu.php');
                    die();
                }
                $query = "SELECT * FROM Menu WHERE name LIKE '%$search%' OR description LIKE '%$search%';";
                $res = mysqli_query($conn, $query);

                $count = mysqli_num_rows($res);
                if ($count > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        $id = $row['item_id'];
                        $name = $row['name'];
                        $description = $row['description'];
                        $image_name = $row['photo'];
                        $price = $row['price'];

                ?>
                        <div class="food-items">
                            <?php
                            if ($image_name == "") {
                                echo "<div> Image not available! </div>";
                            } else {
                            ?>
                                <img src="<?php echo HOMEURL; ?>resources/images/food/<?php echo $image_name; ?>" alt="Ramen" class="item-image">
                            <?php
                            }
                            ?>
                            <div class="details">
                                <div class="details-sub">
                                    <h5 class="title"><?php echo $name; ?></h5>
                                    <h5 class="price"><?php echo "KES " . $price; ?></h5>
                                </div>
                                <p><?php echo $description; ?></p>
                                <button class="add-to-cart">Add To Cart</button>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "<div class='error'> Food not found! </div>";
                }
                ?>


            </div>
        </section>

        <section class="container content-section">
            <h2 class="section-header">CART</h2>
            <div class="cart-row">
                <span class="cart-item cart-header cart-column">ITEM</span>
                <span class="cart-price cart-header cart-column">PRICE</span>
                <span class="cart-quantity cart-header cart-column">QUANTITY</span>
            </div>
            <div class="cart-items">

            </div>

            <div class="cart-total">
                <strong class="cart-total-title">Total</strong>
                <span class="cart-total-price">KES 0</span>
            </div>
            <button class="btn btn-primary btn-purchase">PURCHASE</button>
        </section>
    </main>

    <?php include('./partials-front/footer.php'); ?>