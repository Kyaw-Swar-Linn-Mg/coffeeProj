<?php session_start(); ?>
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
    <title>Profile | My Coffee House</title>
</head>
<body>

<div class="container">
    <?php include('../nav_bar.php');?>
    <div class="row">
        <div class="col-sm-8">
            <div class="panel panel-primary">
                <div class="panel-heading"><?php echo $_SESSION['login@2017'] ?> ' Profile</div>
                <div class="panel-body">
                    <?php
                    include('config/user_config.php');
                    $userName=$_SESSION['login@2017'];
                    $users=new UserDb();
                    $user=$users->getProfile($userName)->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <div class="table-responsive">
                    <table class="table table-hover">
                        <tr>
                            <td>User Name</td>
                            <td><?php echo $user['name'] ?></td>
                        </tr>
                        <tr>
                            <td>Email Address</td>
                            <td><?php echo $user['email' ]?></td>
                        </tr>
                        <tr>
                            <td>Account Role</td>
                            <td><?php
                                if($user['user_role']=='0'){
                                    echo "Administrator";
                                }else if($user['user_role']=='1'){
                                    echo "Manager Role ";
                                }else{
                                    echo "Standard User";
                                }
                                ?></td>
                        </tr>
                        <tr>
                            <td>Created Date</td>
                            <td><?php echo date('d/m/Y : h:i A', strtotime($user['created_at'])); ?></td>
                        </tr>
                    </table>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-sm-4">
            <div class="panel panel-primary">
                <div class="panel-heading">Change Password</div>
                <div class="panel-body">
                    <?php
                    if($_SESSION['changePassword']){
                        $changePassword=$_SESSION['changePassword'];
                        ?>
                        <li class="alert alert-danger"><?php echo $changePassword ?></li>
                    <?php
                    }
                    unset($_SESSION['changePassword']);

                    if($_SESSION['changePasswordSuccess']){
                        $changePasswordSuccess=$_SESSION['changePasswordSuccess'];
                        ?>
                        <li class="alert alert-success"><?php echo $changePasswordSuccess ?></li>

                        <?php
                    }
                    unset($_SESSION['changePasswordSuccess']);
                    ?>

                    <form role="form" method="post" action="config/post_change_password.php">
                        <div class="form-group">
                            <label for="old_password" class="control-label">Old Password</label>
                            <input type="password" required name="old_password" id="old_password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="new_password" class="control-label">New Password</label>
                            <input type="password" required name="new_password" id="new_password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="confirm_new_password" class="control-label">Confirm New Password</label>
                            <input type="password" required name="confirm_new_password" id="confirm_new_password" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Save Change</button>
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