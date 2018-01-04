<?php
session_start();
$totalQty=0;
if($_SESSION['cart']){
    foreach ($_SESSION['cart'] as $qty){
        $totalQty += $qty;
    }
}

?>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">

            <a class="navbar-brand" href="/">KSLM Coffee House</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

            </ul>

            <form class="navbar-form navbar-left" method="get" action="/">
                <div class="form-group">
                    <input type="search" name="q" id="q" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Search</button>
            </form>

            <ul class="nav navbar-nav navbar-right">
                <?php if($_SESSION['login@2017']){
                    ?>
                    <li><a href="../../admin/manage-users.php">Manage Users</a></li>
                    <li><a href="../../admin/cart.php">Cart[<?php echo $totalQty ?>]</a> </li>
                    <li><a href="../../admin/order.php">Order</a> </li>
                    <li><a href="../../admin/dashboard.php">Main_data</a></li>
                    <li><a href="../../admin/category.php">Category</a></li>
                    <li><a href="../../admin/profile.php"><?php echo $_SESSION['login@2017'] ?></a></li>
                    <li><a href="../../admin/logout.php">Logout</a></li>
                <?php
                } else {
                    ?>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Register</a></li>
                <?php
                } ?>

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>