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
    <title>Cart | My Coffee House</title>
</head>
<body>

<div class="container">
    <?php include('../nav_bar.php');?>
    <div class="row">

        <div class="col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading">Cart Info <a href="../public/clear_cart.php" class="pull-right text-warning">Clear Cart</a></div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Amount</th>
                        </tr>
                        <?php
                        session_start();
                        include('../public/db_config.php');
                        foreach ($_SESSION['cart'] as $id=>$qty){
                            $cart=new SecondDb();
                            $carts=$cart->cart($id);
                            foreach ($carts as $row):
                                ?>
                                <tr>
                                    <td><?php echo $row['data_name'] ?></td>
                                    <td><?php echo $row['price'] ?></td>
                                    <td><?php echo $qty ?></td>
                                    <td><?php echo $row['price'] * $qty ?></td>
                                </tr>
                                <?php

                            endforeach;
                        }
                        ?>
                    </table>

                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading">Order Form</div>
                <div class="panel-body">
                    <form method="post" action="../public/make_checkout.php">
                        <div class="form-group">
                            <label for="table_number" class="control-label">Table Number</label>
                            <select name="table_number" id="table_number" class="form-control">
                                <option value="TB1">TB1</option>
                                <option value="TB2">TB2</option>
                                <option value="TB3">TB3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">CheckOut</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../bootstrap/js/Jquery.js" type="text/javascript"></script>
</body>
</html>