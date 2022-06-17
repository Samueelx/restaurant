<?php
include('./partials/menu.php');

if($_SESSION['isAdmin'] != 1){
    header("Location:".HOMEURL.'admin/index.php?error=unauthorizedaccess');
}
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Food Item Rankings</h1>
        <br>

        <table class="tbl-full">
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Amount</th>
                <th>Revenue Generated</th>
                <th>Rankings</th>
            </tr>

            <?php
            $sn = 0;


            $query = "SELECT name, amount, SUM(total_amount) AS total, DENSE_RANK() OVER (ORDER BY total DESC) AS rankings  FROM Menu INNER JOIN orders ON orders.menu_id = Menu.item_id WHERE order_status = 'dispatched' GROUP BY name ORDER BY rankings;";
            $res = mysqli_query($conn, $query);
            if($res == true){
                $count = mysqli_num_rows($res);
                if($count > 0){
                    while($row = mysqli_fetch_assoc($res)){
                        $sn++;
                        $name = $row['name'];
                        $amount = $row['amount'];
                        $total = $row['total'];
                        $rank = $row['rankings'];

                        ?>
                        <tr>
                            <td><?php echo $sn; ?></td>
                            <td><?php echo $name; ?></td>
                            <td><?php echo "KES ".$amount; ?></td>
                            <td><?php echo "KES ".$total; ?></td>
                            <td><?php echo $rank; ?></td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='5' class='error'> Data not available </td></tr>";
                }
            }
            ?>
        </table>
    </div>
</div>

<?php
include('./partials/footer.php');
?>