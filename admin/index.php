<?php
include('./partials/menu.php');
?>

<!--Main Content starts Here-->
<div class="main-content">
    <div class="wrapper">
        <h1>Dashboard</h1>
        <br/><br/>

        <?php
        if (isset($_SESSION['login'])) {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        ?>
        <br>

        <div class="col-4">
            <h1>5</h1>
            <br>
            <p>Categories</p>
        </div>

        <div class="col-4">
            <h1>5</h1>
            <br>
            <p>Categories</p>
        </div>

        <div class="col-4">
            <h1>5</h1>
            <br>
            <p>Categories</p>
        </div>

        <div class="col-4">
            <h1>5</h1>
            <br>
            <p>Categories</p>
        </div>

        <div class="clearfix"></div>
    </div>
</div>
<!--Main Content Ends Here-->

<?php
include('./partials/footer.php');
?>