<?php
include('./partials-front/header.php');
?>

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
                    <?php
                    /**Getting food items from database */
                    $sql = "SELECT * FROM Menu WHERE status = 1 ORDER BY RAND() LIMIT 4;";
                    $res = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res);

                    if ($count > 0) {
                        while ($row = mysqli_fetch_assoc($res)) {
                            $id = $row['item_id'];
                            $name = $row['name'];
                            $description = $row['description'];
                            $image_name = $row['photo'];
                            $price = $row['price'];

                    ?>
                            <div class="menu-item">
                                <?php
                                if ($image_name == "") {
                                    echo "<div class='error'> Image not available. </div>";
                                } else {
                                ?>
                                    <img src="<?php echo HOMEURL; ?>resources/images/food/<?php echo $image_name; ?>" alt="peperoni pizza" class="menu-item-image">
                                <?php
                                }
                                ?>

                                <div class="menu-item-text">
                                    <h3 class="menu-item-heading">
                                        <span class="menu-item-name"><?php echo $name; ?></span>
                                        <span class="menu-item-price"><?php echo "KES " . $price; ?></span>
                                    </h3>
                                    <p class="menu-item-description">
                                        <?php echo $description; ?>
                                    </p>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo "<div class='error'> Food Items not available! </div>";
                    }
                    ?>

                    <!--
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
-->
                </div>

                <button class="menu-button" id="menu-button">Menu</button>

            </div>
        </div>
    </section>

    <section>

    </section>

</main>

<?php include('./partials-front/footer.php'); ?>