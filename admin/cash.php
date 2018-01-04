
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../bootstrap/js/Jquery.js"></script>
    <title>Cash | Junior Coffee</title>

</head>
<body>
<?php
include('../public/db_config.php');
$id=$_GET['id'];
$chCash=new SecondDb();
$chCash->changeCashStatus($id);

$shCh=new SecondDb();
$moreShCk=$shCh->showCheckOutForCash($id);
$row=$moreShCk->fetch(PDO::FETCH_ASSOC);


?>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <h3 class="text text-center">KSLM Coffee House</h3>
            <p class="text-center"><span class="glyphicon glyphicon-phone"></span> : 007</p>
            <h4 class="text-center"><?php echo $row['table_number'] ?></h4>
            <p class="text-center"><?php echo date('d/m/Y : h:i A', strtotime($row['created_at'])); ?></p>
            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Amount</th>
                </tr>
                <?php
                $totalAmount=0;
                $checkout_id=$row['id'];
                $orders=new SecondDb();
                $myOrder=$orders->showOrders($checkout_id);
                foreach ($myOrder as $order):
                    $totalAmount += $order['price'] * $order['quantity'];
                    ?>
                    <tr>
                        <td><?php echo $order['order_name'] ?></td>
                        <td><?php echo $order['price'] ?></td>
                        <td><?php echo $order['quantity'] ?></td>
                        <td><?php echo $order['price'] * $order['quantity'] ?></td>
                    </tr>

                    <?php
                endforeach;

                ?>
                <tr>
                    <td colspan="3">Total Amount</td>
                    <td><?php echo $totalAmount ?></td>
                </tr>
                <tr>
                    <td colspan="3">Gov Tax (5%)</td>
                    <td>
                        <?php
                        $tax=$totalAmount * 5 /100;
                        echo $tax;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">Grand Total Amount</td>
                    <td><?php echo $totalAmount + $tax ?></td>
                </tr>
            </table>
            <p>Thank Very much.</p>
        </div>

    </div>
</div>



<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../bootstrap/js/Jquery.js"></script>
</body>
</html>