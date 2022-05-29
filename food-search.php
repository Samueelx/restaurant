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
        <section>
            <div class="menu">
                <div class="heading">
                    <h2>&mdash; Search Results &mdash;</h2>
                </div>

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