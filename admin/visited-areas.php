<?php
include ('./partials/menu.php');

if($_SESSION['isAdmin'] != 1){
    header("Location:".HOMEURL.'admin/index.php?error=unauthorizedaccess');
}
?>

<div class="main-content">
    <div class="wrapper">
        <h2> Areas where orders are frequently dispatched </h2>
        <br>

        <table class="tbl-full">
            <tr>
                <th>Town</th>
                <th>Frequency</th>
            </tr>

            <?php
            $query = "SELECT town, COUNT(town) AS frequency FROM orders WHERE order_status = 'dispatched' GROUP BY town;";
            $res = mysqli_query($conn, $query);
            $count = mysqli_num_rows($res);

            if($count > 0){
                while($row = mysqli_fetch_assoc($res)){
                    $town = $row['town'];
                    $frequency = $row['frequency'];

                    ?>
                    <tr>
                        <td><?php echo $town; ?></td>
                        <td><?php echo $frequency; ?></td>
                    </tr>
                    <?php
                }
            } else {

            }
            ?>
        </table>
    </div>
</div>



<?php
include('./partials/footer.php');
?>