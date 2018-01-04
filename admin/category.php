<?php
include('config/auth_config.php');
include('config/check_role.php');
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
    <title>Category | My Coffee House</title>
</head>
<body>

<div class="container">
    <?php include('../nav_bar.php');?>
    <div class="row">
        <div class="col-sm-4">
            <div class="panel panel-primary">
                <div class="panel-heading">New Category</div>
                <div class="panel-body">
                    <form method="post" action="data/post_cat.php">
                        <div class="form-group">
                            <label for="cat_name" class="control-label">Category Name</label>
                            <input required type="text" name="cat_name" id="cat_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save Change</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="panel panel-primary">
                <div class="panel-heading">Category List</div>
                <div class="panel-body">
                    <table class="table  table-hover">
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Delete</th>
                        </tr>
                        <?php
                        include('data/data_config.php');
                        $cats=new DataDb();
                        $cat=$cats->showCat();

                        foreach ($cat as $row):
                            ?>
                            <tr>
                                <td><?php echo $row['category_id'] ?></td>
                                <td><?php echo $row['category_name'] ?></td>
                                <td><a href="data/delete_cat.php?name=<?php echo $row['category_name'] ?>" class="text-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>
                            </tr>

                            <?php
                        endforeach;

                        ?>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../bootstrap/js/Jquery.js" type="text/javascript"></script>
</body>
</html>