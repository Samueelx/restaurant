<?php
include('./partials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Order</h1>
        <br> <br>

        <?php
        if(isset($_GET['order_id'])){
            $order_id = $_GET['order_id'];
            $sql = "SELECT name, status FROM orders INNER JOIN Menu ON orders.menu_id = Menu.item_id WHERE order_id = $order_id;";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);

            if($count == 1){
                $row = mysqli_fetch_assoc($res);
                $name = $row['name'];
                $status = $row['status'];
            } else {
                header("Location".HOMEURL.'admin/manage-order.php?error=ordernotfound');
            }

        } else {
            header("Location:".HOMEURL.'admin/manage-order.php?error=ordermissing');
        }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Food Name: </td>
                    <td><b><?php echo $name; ?></b></td>
                </tr>

                <tr>
                    <td>Status: </td>
                    <td>
                        <select name="status" id="">
                            <option <?php if($status == 1){echo "selected";} ?> value="pending">pending</option>
                            <option <?php if($status == 2){echo "selected";} ?> value="dispatched">dispatched</option>
                            <option <?php if($status == 3){echo "selected";} ?> value="cancelled">cancelled</option>

                        </select>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
                        <input type="submit" name="submit" value="Update Order" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

        <?php
        if(isset($_POST['submit'])){
            $id = mysqli_real_escape_string($conn, $_POST['order_id']);
            $status = mysqli_real_escape_string($conn, $_POST['status']);

            $query = "UPDATE orders SET order_status = '$status' WHERE order_id = $id;";
            $response = mysqli_query($conn, $query);

            if($response == true){
                header("Location:".HOMEURL.'admin/manage-order.php?error=updatesuccessful');
            } else {
                header("Location:".HOMEURL.'admin/manage-order.php?error=updateunseccessful');
            }
        }
        ?>

    </div>
</div>

<?php include ('./partials/footer.php'); ?>