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
                    <h2>&mdash; Menu &mdash;</h2>
                </div>
                <div class="menu-type">
                    <h3>Main Meal</h3>
                    <hr>
                </div>
                <div class="food-items">
                    <img src="./resources/images/peperoni-pizza.jpg" alt="pepperoni pizza" class="item-image">
                    <div class="details">
                        <div class="details-sub">
                            <h5 class="title">Pepperoni Pizza</h5>
                            <h5 class="price">KES 1200</h5>
                        </div>
                        <p>Pepperoni is one of the most popular pizza toppings. This thinly sliced American salami is typically used for pizza, but sandwiches and wraps are also delicious when stuffed with this tasty cured meat.</p>
                        <button class="add-to-cart">Add To Cart</button>
                    </div>
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

                <div class="menu-type">
                    <h3>Breakfast & Snacks</h3>
                    <hr>
                </div>
                <div class="food-items">
                    <img src="./resources/images/bread-and-coffee.jpg" alt="Bread and Coffee" class="item-image">
                    <div class="details">
                        <div class="details-sub">
                            <h5 class="title">Bread and Coffee</h5>
                            <h5 class="price">KES 300</h5>
                        </div>
                        <p>Having a nice cup of coffee with some artisan bread will make you feel happy, but it can also make your brain function more efficiently.</p>
                        <button class="add-to-cart">Add To Cart</button>
                    </div>
                </div>

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

                <div class="menu-type">
                    <h3>Drinks</h3>
                    <hr>
                </div>

                <div class="food-items">
                    <img src="./resources/images/lemonade.jpg" alt="Lemonade" class="item-image">
                    <div class="details">
                        <div class="details-sub">
                            <h5 class="title">Lemonade</h5>
                            <h5 class="price">KES 200</h5>
                        </div>
                        <p>Classic sweet lemonade. Lemonade is a simple beverage characterized by its lemon flavor.</p>
                        <button class="add-to-cart">Add To Cart</button>
                    </div>
                </div>

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