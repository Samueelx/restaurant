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

                </div>

                <button onclick="myFunc()" class="menu-button" id="menu-button">Menu</button>

                <script>
                    function myFunc() {
                        window.location.href = 'menu.php';
                    }
                </script>

            </div>
        </div>
    </section>

    <section>

    </section>

</main>

<?php include('./partials-front/footer.php'); ?>