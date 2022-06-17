<?php
include('./partials/menu.php');

if($_SESSION['isAdmin'] != 1){
    header("Location:".HOMEURL.'admin/index.php?error=unauthorizedaccess');
}
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Order frequency</h1>
        <br>

        <table class="tbl-full">
        <tr>
            <th>Name</th>
            <th>Amount</th>
            <th>Total</th>
            <th>Frequency</th>
        </tr>

        <?php
        $query = "SELECT name, amount, SUM(total_amount) AS total, COUNT(name) AS frequency FROM Menu INNER JOIN orders ON orders.menu_id = Menu.item_id WHERE order_status = 'dispatched' GROUP BY name ORDER BY frequency DESC;";
        $res = mysqli_query($conn, $query);
        $count = mysqli_num_rows($res);

        if($count > 0){
            while($rows = mysqli_fetch_assoc($res)){
                $name = $rows['name'];
                $amount = $rows['amount'];
                $total = $rows['total'];
                $frequency = $rows['frequency'];

                ?>
                <tr>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $amount; ?></td>
                    <td><?php echo $total; ?></td>
                    <td><?php echo $frequency; ?></td>
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='4' class='error'> Data not available </td></tr>";
        }
        ?>
        </table>
    </div>
</div>

<?php
include('./partials/footer.php');
?>