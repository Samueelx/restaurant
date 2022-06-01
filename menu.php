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
    <title>Menu</title>
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
        <section>
            <div class="menu">
                <div class="heading">
                    <h2>&mdash; Menu &mdash;</h2>
                </div>

                <!--Food Search Section-->

                <div class="form-container">
                    <form action="<?php echo HOMEURL; ?>food-search.php" method="POST" class="form">
                        <input type="text" id="search" class="input" name="search" placeholder="Search..." />
                        <input type="submit" value="search" name="submit" id="submit">
                    </form>

                    <?php
                    if (isset($_SESSION['empty'])) {
                        echo $_SESSION['empty'];
                        unset($_SESSION['empty']);
                    }
                    ?>
                </div>
                <div class="results-container">
                    <ul class="results-list" id="list">

                    </ul>
                </div>

                <!--Food Search Section ends here-->


                <div class="menu-type">
                    <h3>Main Meal</h3>
                    <hr>
                </div>
                <?php
                /**Display food items that belong in the Main Meal Category */
                $main = "SELECT * FROM Menu WHERE type_id = 4 AND status = 1 LIMIT 9;";
                $res = mysqli_query($conn, $main);
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
                            /**Check whether image is available */
                            if ($image_name == "") {
                                echo "<div class='error'> Image not available! </div>";
                            } else {
                            ?>
                                <img src="<?php echo HOMEURL; ?>resources/images/food/<?php echo $image_name; ?>" alt="pepperoni pizza" class="item-image">
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
                    echo "<div class='error'> Food not found </div>";
                }
                ?>

                <!--
                <div class="food-items">
                    <img src="./resources/images/ramen.jpg" alt="Ramen" class="item-image">
                    <div class="details">
                        <div class="details-sub">
                            <h5 class="title">Ramen</h5>
                            <h5 class="price">KES 1200</h5>
                        </div>
                        <p>Ramen is a Japanese noodle soup, with a combination of a rich flavoured broth, one of a variety of types of noodle and a selection of meats or vegetables, often topped with a boiled egg.</p>
                        <button class="add-to-cart">Add To Cart</button>
                    </div>
                </div>
                <div class="food-items">
                    <img src="./resources/images/beef-steak.jpg" alt="Beef Steak" class="item-image">
                    <div class="details">
                        <div class="details-sub">
                            <h5 class="title">Beef Steak</h5>
                            <h5 class="price">KES 1200</h5>
                        </div>
                        <p>Enjoy these grilled beef steaks sprinkled with salt and pepper that’s ready in just 20 minutes – perfect for a dinner.</p>
                        <button class="add-to-cart">Add To Cart</button>
                    </div>
                </div>
                <div class="food-items">
                    <img src="./resources/images/rice-with-beef.jpg" alt="Rice with Beef" class="item-image">
                    <div class="details">
                        <div class="details-sub">
                            <h5 class="title">Rice with Beef</h5>
                            <h5 class="price">KES 1200</h5>
                        </div>
                        <p>Beef fried rice is probably one of my favorite dishes on a standard Chinese takeout menu.</p>
                        <button class="add-to-cart">Add To Cart</button>
                    </div>
                </div>
                <div class="food-items">
                    <img src="./resources/images/grilled-pork.jpg" alt="Grilled Pork" class="item-image">
                    <div class="details">
                        <div class="details-sub">
                            <h5 class="title">Grilled Pork</h5>
                            <h5 class="price">KES 1200</h5>
                        </div>
                        <p>These quick and easy chops are marinated in a simple mixture of soy sauce, mustard, and brown sugar.</p>
                        <button class="add-to-cart">Add To Cart</button>
                    </div>
                </div>
                <div class="food-items">
                    <img src="./resources/images/sushi.jpg" alt="Sushi" class="item-image">
                    <div class="details">
                        <div class="details-sub">
                            <h5 class="title">Sushi</h5>
                            <h5 class="price">KES 1200</h5>
                        </div>
                        <p>Sushi, a staple rice dish of Japanese cuisine, consisting of cooked rice flavoured with vinegar and a variety of vegetable, egg, or raw seafood garnishes and served cold.</p>
                        <button class="add-to-cart">Add To Cart</button>
                    </div>
                </div>
-->

                <div class="menu-type">
                    <h3>Breakfast & Snacks</h3>
                    <hr>
                </div>
                <?php
                $sql = "SELECT * FROM Menu WHERE type_id = 3 AND status = 1 LIMIT 9;";
                $response = mysqli_query($conn, $sql);
                $num_of_rows = mysqli_num_rows($response);

                if ($num_of_rows > 0) {
                    while ($row2 = mysqli_fetch_assoc($response)) {
                        $id = $row2['item_id'];
                        $name = $row2['name'];
                        $description = $row2['description'];
                        $image_name = $row2['photo'];
                        $price = $row2['price'];

                ?>
                        <div class="food-items">
                            <?php
                            /**Check whether image is available */
                            if ($image_name == "") {
                                echo "<div class='error'> Image not available! </div>";
                            } else {
                            ?>
                                <img src="<?php echo HOMEURL; ?>resources/images/food/<?php echo $image_name; ?>" alt="Bread and Coffee" class="item-image">
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
                    echo "<div class='error'> Food items not available! </div>";
                }
                ?>

                <!--
                <div class="food-items">
                    <img src="./resources/images/pie.jpg" alt="Meat Pie" class="item-image">
                    <div class="details">
                        <div class="details-sub">
                            <h5 class="title">Meat Pie</h5>
                            <h5 class="price">KES 150</h5>
                        </div>
                        <p>These individual Meat Pies have a buttery crisp top and bottom crust with a delicious filling of ground pork and beef, along with lots of vegetables.</p>
                        <button class="add-to-cart">Add To Cart</button>
                    </div>
                </div>

                <div class="food-items">
                    <img src="./resources/images/pancakes.jpg" alt="Pancakes" class="item-image">
                    <div class="details">
                        <div class="details-sub">
                            <h5 class="title">Pancakes</h5>
                            <h5 class="price">KES 120</h5>
                        </div>
                        <p>These Pancakes are light and fluffy with a soft crust and spongy texture.</p>
                        <button class="add-to-cart">Add To Cart</button>
                    </div>
                </div>

                <div class="food-items">
                    <img src="./resources/images/chapati.jpg" alt="Chapati" class="item-image">
                    <div class="details">
                        <div class="details-sub">
                            <h5 class="title">Chapati</h5>
                            <h5 class="price">KES 100</h5>
                        </div>
                        <p>Chapati is the quintessence of the Indian cuisine so much so that no meal is complete without this Indian flatbread.</p>
                        <button class="add-to-cart">Add To Cart</button>
                    </div>
                </div>

                <div class="food-items">
                    <img src="./resources/images/icecream.jpg" alt="Ice cream" class="item-image">
                    <div class="details">
                        <div class="details-sub">
                            <h5 class="title">Ice Cream</h5>
                            <h5 class="price">KES 180</h5>
                        </div>
                        <p>Craving for something sweet? Why not order the most delectable pint of ice cream in town!</p>
                        <button class="add-to-cart">Add To Cart</button>
                    </div>
                </div>

                <div class="food-items">
                    <img src="./resources/images/black-coffee.jpg" alt="Coffee" class="item-image">
                    <div class="details">
                        <div class="details-sub">
                            <h5 class="title">Coffee</h5>
                            <h5 class="price">KES 120</h5>
                        </div>
                        <p>Black coffee has plenty of health benefits and also aids in weight loss.</p>
                        <button class="add-to-cart">Add To Cart</button>
                    </div>
                </div>
            -->

                <div class="menu-type">
                    <h3>Drinks</h3>
                    <hr>
                </div>

                <?php
                $query = "SELECT * FROM Menu WHERE type_id = 5 AND status = 1 LIMIT 9;";
                $result = mysqli_query($conn, $query);
                $rows = mysqli_num_rows($result);

                if ($rows > 0) {
                    while ($row3 = mysqli_fetch_assoc($result)) {
                        $id = $row3['item_id'];
                        $name = $row3['name'];
                        $description = $row3['description'];
                        $image_name = $row3['photo'];
                        $price = $row3['price'];

                ?>
                        <div class="food-items">
                            <?php
                            /**Check whether image is available */
                            if ($image_name == "") {
                                echo "<div> Image is not available! </div>";
                            } else {
                            ?>
                                <img src="<?php echo HOMEURL; ?>resources/images/food/<?php echo $image_name; ?>" alt="Food Item Image" class="item-image">
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
                    echo "<div> Food items not available </div>";
                }
                ?>

                <!--
                <div class="food-items">
                    <img src="./resources/images/Milkshake.jpg" alt="Milkshake" class="item-image">
                    <div class="details">
                        <div class="details-sub">
                            <h5 class="title">MilkShake</h5>
                            <h5 class="price">KES 200</h5>
                        </div>
                        <p>Whizz up a refreshing milkshake for a quick breakfast or treat. We've got indulgent chocolate, banana and strawberry flavours, plus fruity exercise shakes.</p>
                        <button class="add-to-cart">Add To Cart</button>
                    </div>
                </div>

                <div class="food-items">
                    <img src="./resources/images/Soda.jpg" alt="Soda" class="item-image">
                    <div class="details">
                        <div class="details-sub">
                            <h5 class="title">Soda</h5>
                            <h5 class="price">KES 150</h5>
                        </div>
                        <p>Enjoy a cold canned soda.</p>
                        <button class="add-to-cart">Add To Cart</button>
                    </div>
                </div>

                <div class="food-items">
                    <img src="./resources/images/mango-juice.jpg" alt="Mango Juice" class="item-image">
                    <div class="details">
                        <div class="details-sub">
                            <h5 class="title">Mango Juice</h5>
                            <h5 class="price">KES 200</h5>
                        </div>
                        <p>This mango juice is sweet, refreshing and has a full-on mango flavor.</p>
                        <button class="add-to-cart">Add To Cart</button>
                    </div>
                </div>

                <div class="food-items">
                    <img src="./resources/images/strawberry-smoothy.jpg" alt="Strawberry Smoothie" class="item-image">
                    <div class="details">
                        <div class="details-sub">
                            <h5 class="title">Strawberry Smoothie</h5>
                            <h5 class="price">KES 180</h5>
                        </div>
                        <p>This Strawberry Smoothie is a thick, creamy and healthy fruit drink made with fresh or frozen strawberries, yogurt and milk.</p>
                        <button class="add-to-cart">Add To Cart</button>
                    </div>
                </div>

                <div class="food-items">
                    <img src="./resources/images/black-coffee.jpg" alt="Coffee" class="item-image">
                    <div class="details">
                        <div class="details-sub">
                            <h5 class="title">Coffee</h5>
                            <h5 class="price">KES 120</h5>
                        </div>
                        <p>Black coffee has plenty of health benefits and also aids in weight loss.</p>
                        <button class="add-to-cart">Add To Cart</button>
                    </div>
                </div>
            -->
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