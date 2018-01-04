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
    <title>Main Data | My Coffee House</title>
</head>
<body>

<div class="container">
    <?php include('../nav_bar.php');?>
    <div class="row">
        <div class="col-sm-4">
            <div class="panel panel-primary">
                <div class="panel-heading">New Data</div>
                <div class="panel-body">
                    <form method="post" action="data/post_data.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="data_name" class="control-label">Data Name</label>
                            <input required type="text" name="data_name" id="data_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="price" class="control-label">Prices</label>
                            <input required type="number" name="price" id="price" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="cat_id" class="control-label">Category</label>
                            <select required name="cat_id" id="cat_id" class="form-control">
                                <option>--Select Category</option>
                                <?php
                                include('data/data_config.php');
                                $cat=new DataDb();
                                $cats=$cat->showCat();
                                foreach ($cats as $myCat):
                                    ?>
                                    <option value="<?php echo $myCat['category_id'] ?>"><?php echo $myCat['category_name'] ?></option>
                                    <?php
                                endforeach;
                                ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="data_image" class="control-label">Data Image</label>
                            <input type="file" name="data_image" id="data_image" class="btn btn-sm btn-warning form-control">
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
                <div class="panel-heading">Data List</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table  table-hover">
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Images</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            <?php

                            $datas=new DataDb();
                            $myData=$datas->showData();
                            foreach ($myData as $row):
                                ?>
                                <tr>
                                    <td><?php echo $row['data_name'] ?></td>
                                    <td><?php echo $row['price'] ?> Ks</td>
                                    <td><img src="data/images/<?php echo $row['data_image'] ?>" class="img-rounded" width="50px"></td>
                                    <td><a href="#" class="text-primary"><span class="glyphicon glyphicon-edit"></span> Edit</a></td>
                                    <td><a href="#" class="text-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>
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
</div>



<script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../bootstrap/js/Jquery.js" type="text/javascript"></script>
</body>
</html>