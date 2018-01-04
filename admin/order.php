<?php
include('config/auth_config.php');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../bootstrap/js/Jquery.js" type="text/javascript"></script>
    <title>Order | My Coffee House</title>
</head>
<body>

<div class="container">
    <?php include('../nav_bar.php');?>
    <div class="row">
        <?php
        include('../public/db_config.php');
        $ck_out=new SecondDb();
        $myCk_out=$ck_out->showChechout();
        foreach ($myCk_out as $checkOut):
            ?>
            <div class="panel <?php if($checkOut['cash_status']=='0') { echo "panel-warning"; } else { echo "panel-success"; } ?>">
                <div class="panel-heading"><?php echo $checkOut['table_number'] ?></div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Amount</th>
                        </tr>

                        <?php
                        $totalAmount=0;
                        $checkout_id=$checkOut['id'];
                        $myOrder=new SecondDb();
                        $ourOrder=$myOrder->showOrders($checkout_id);
                        foreach ($ourOrder as $order):
                            $totalAmount +=$order['price'] * $order['quantity'];
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
                    </table>
                </div>
                <div class="panel panel-footer">
                    <a href="cash.php?id=<?php echo $checkOut['id'] ?>" target="_blank" class="btn btn-primary"><span class="glyphicon glyphicon-print"></span> Cash</a>
                </div>
            </div>
            <?php
        endforeach;
        ?>
    </div>
</div>



<script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../bootstrap/js/Jquery.js" type="text/javascript"></script>
</body>
</html>