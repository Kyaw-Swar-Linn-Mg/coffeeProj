<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/Jquery.js" type="text/javascript"></script>
    <title>Login | KSLM Coffee House</title>
</head>
<body>

<div class="container">
    <?php include('nav_bar.php');?>
    <div class="row">
        <div class="col-xs-4 col-xs-offset-8">
            <?php
            session_start();
            if($_SESSION['loginInfo']){
                $loginInfo=$_SESSION['loginInfo'];
                ?>
                <li class="alert alert-danger"><?php echo $loginInfo ?></li>
                <?php
            }
            unset($_SESSION['loginInfo']);


            ?>


            <div class="panel panel-primary">
                <div class="panel panel-heading"><h2 class="text-center">Login</h2></div>

            <div class="panel-body">
                <form role="form" method="post" action="admin/config/post_login.php">
                    <div class="form-group">
                        <label for="userName" class="control-label">User Name</label>
                        <input type="text" name="userName" id="userName" required class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="password" class="control-label">Password</label>
                        <input type="password" name="password" id="password" required class="form-control">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>

                </form>

            </div>
            </div>
        </div>
    </div>

</div>



<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="bootstrap/js/Jquery.js" type="text/javascript"></script>
</body>
</html>