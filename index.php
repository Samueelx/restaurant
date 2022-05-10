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

    <script src="./javascript/jquery-3.6.0.js" crossorigin="anonymous" defer></script>
    <script src="./javascript/script.js" defer></script>

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
                    <a href="./index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a href="./login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a href="./signup.php">Sign Up</a>
                </li>
                <li class="nav-item">
                    <a href="./menu.php">Menu</a>
                </li>
                <li class="nav-item">
                    <a href="./about.php">About</a>
                </li>
            </ul>
            <button class="order-btn">Order</button>
        </nav>
    </header>

    <main>
        <section>
            <div class="home" id="home">
                <h3>PLACE YOUR ORDER AND HAVE IT DELIVERED!!</h3>
            </div>
        </section>

        <section>
            <div class="services">
                <h3>Popular Dishes</h3>
                <p>The easiest way to your favourite food.</p>
            </div>
            <hr>
            <div class="container">
                <div class="menu">
                    <h4 class="menu-group-heading">
                        Here are some of our most popular dishes
                    </h4>
                    <div class="menu-group">
                        <div class="menu-item">
                            <img src="./resources/images/peperoni-pizza.jpg" alt="peperoni pizza" class="menu-item-image">
                            <div class="menu-item-text">
                                <h3 class="menu-item-heading">
                                    <span class="menu-item-name">Peperoni Pizza</span>
                                    <span class="menu-item-price">KES 1200</span>
                                </h3>
                                <p class="menu-item-description">
                                    Pepperoni is one of the most popular pizza toppings. This thinly sliced American salami is typically used for pizza, but sandwiches and wraps are also delicious when stuffed with this tasty cured meat.
                                </p>
                            </div>
                        </div>
                        <div class="menu-item">
                            <img src="./resources/images/beef-steak.jpg" alt="Beef Steak" class="menu-item-image">
                            <div class="menu-item-text">
                                <h3 class="menu-item-heading">
                                    <span class="menu-item-name">Beef Steak</span>
                                    <span class="menu-item-price">KES 350</span>
                                </h3>
                                <p class="menu-item-description">
                                    Enjoy these grilled beef steaks sprinkled with salt and pepper that’s ready in just 20 minutes – perfect for a dinner.
                                </p>
                            </div>
                        </div>
                        <div class="menu-item">
                            <img src="./resources/images/grilled-pork.jpg" alt="Grilled Pork" class="menu-item-image">
                            <div class="menu-item-text">
                                <h3 class="menu-item-heading">
                                    <span class="menu-item-name">Grilled Pork</span>
                                    <span class="menu-item-price">KES 450</span>
                                </h3>
                                <p class="menu-item-description">
                                    These quick and easy chops are marinated in a simple mixture of soy sauce, mustard, and brown sugar.
                                </p>
                            </div>
                        </div>
                        <div class="menu-item">
                            <img src="./resources/images/sushi.jpg" alt="Sushi" class="menu-item-image">
                            <div class="menu-item-text">
                                <h3 class="menu-item-heading">
                                    <span class="menu-item-name">Sushi</span>
                                    <span class="menu-item-price">KES 900</span>
                                </h3>
                                <p class="menu-item-description">
                                    Sushi, a staple rice dish of Japanese cuisine, consisting of cooked rice flavoured with vinegar and a variety of vegetable, egg, or raw seafood garnishes and served cold.
                                </p>
                            </div>
                        </div>
                    </div>

                    <button class="menu-button" id="menu-button">Menu</button>

                </div>
            </div>
        </section>

        <section>

        </section>

    </main>

    <footer class="footer">
        <div class="footer-heading">
            <h2 id="heading">Online Food Ordering</h2>
        </div>
        <div class="payment-options">
            <h3>Payment Options</h3>
            <p>Cash on delivery</p>
        </div>
        <div class="address">
            <h3>Address</h3>
            <p>We are at Exit 7 on Thika Superhighway, 
                only a few minutes away from USIU and 
                Safaricom International Sports Stadium Kasarani.
            </p>
        </div>
        <div class="socials">
            <h3>Visit our socials</h3>
        <a href="https://twitter.com"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
        <a href="https://instagram.com"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        <a href="https://facebook.com"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
        </div>
    </footer>

</body>

</html>