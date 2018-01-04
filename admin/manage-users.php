<?php include('config/check_role.php'); ?>
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
    <title>Manage Users | My Coffee House</title>
</head>
<body>

<div class="container">
    <?php include('../nav_bar.php');?>
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">Manage Users</div>
            <div class="panel-body">
                <table class="table table-hover">
                    <tr>
                        <th>User Name</th>
                        <th>Email Address</th>
                        <th>Account Role</th>
                        <th>Created Date</th>
                        <th>Reset Password</th>
                        <th>Delete</th>
                    </tr>
                    <?php
                    $myUsers=new UserDb();
                    $myUser=$myUsers->showUsers();
                    foreach ($myUser as $row):
                    ?>
                        <tr>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td>
                                   <span class="btn-group">
                                    <button class="btn btn-default btn-sm" data-toggle="dropdown"><span class="caret"></span></button>
                                    <ul class="dropdown-menu dropdown-menu-left">
                                        <?php
                                            if($row['user_role']=='1'){
                                                ?>
                                                <li><a href="config/change_to_standard_user.php?id=<?php echo $row['id'] ?>">Level Down To Standard User</a></li>
                                        <?php
                                            }elseif($row['user_role']=='2'){
                                                ?>
                                                <li><a href="config/change_to_manager.php?id=<?php echo $row['id'] ?>">Level Up To Manager</a></li>
                                        <?php
                                            }else{
                                                ?>
                                                <li>Cannot Change Admin Account Role</li>
                                        <?php
                                            }
                                        ?>
                                    </ul>
                                </span>
                                <?php
                                if($row['user_role']=='0'){
                                    echo "Administrator";
                                }else if($row['user_role']=='1'){
                                    echo "Manager Role";
                                }else{
                                    echo "Standard User";
                                }

                                ?>


                            </td>
                            <td>
                                <?php echo date('d/m/Y : h:i A', strtotime($row['created_at'])); ?>
                            </td>
                            <td>
                                <form class="navbar-form navbar-left" method="post" action="config/update_user_password.php">
                                    <div class="form-group">
                                        <input type="hidden" name="id" id="id" value="<?php echo $row['id'] ?>">
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>

                            </td>
                            <td>
                                <a href="config/post_delete.php?id=<?php echo $row['id'] ?>" class="text-danger">Delete</a>
                            </td>
                        </tr>

                    <?php
                    endforeach;
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>



<script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../bootstrap/js/Jquery.js" type="text/javascript"></script>
</body>
</html>