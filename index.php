<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="bootstrap/css/style.css" rel="stylesheet">
    <script src="bootstrap/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/jquery.js" type="text/javascript"></script>

    <title>KSLM Coffee House</title>
</head>
<body>

<div class="container">
    <?php include('nav_bar.php');?>
    <?php include('cat_bar.php');?>
    <div class="row">
        <?php
        $q=$_GET['q'];
        $category=$_GET['category'];
        $datas=new SecondDb();
        $data=$datas->showDataForPublic($category, $q);
        foreach ($data as $myData):
            ?>
        <table class="table" id="myTable">
            <thead>
            <tr>
                <th>Categories</th>
            </tr>
            </thead>
            <tr>

                <td>

                    <div class="col-sm-4 col-md-3">

                <div class="thumbnail">
                    <a href="#" data-toggle="modal" data-target="#<?php echo $myData['id'] ?>"><img src="admin/data/images/<?php echo $myData['data_image'] ?>" class="img-rounded" width="50%" height="50%"></a>
                    <div class="caption clearfix">
                        <h3><?php echo $myData['data_name'] ?></h3>
                        <p><?php echo $myData['price'] ?> Ks</p>

                        <?php if($_SESSION['login@2017']){
                        ?>
                            <p><a href="public/add_to_cart.php?id=<?php echo $myData['id'] ?>" class="btn btn-primary btn-sm pull-right"><span class="glyphicon glyphicon-shopping-cart"></span> Add To Cart</a></p>
                        <?php
                        }?>


                    </div>
                </div>


                    </div>
                </td>

            </tr>


        </table>

            <!-- Modal -->
            <div class="modal fade" id="<?php echo $myData['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel"><?php echo $myData['data_name'] ?></h4>
                        </div>
                        <div class="modal-body">

                            <div class="thumbnail">
                                <img src="admin/data/images/<?php echo $myData['data_image'] ?>" class="img-rounded" width="50%" height="50%">
                                <div class="caption clearfix">
                                    <h3><?php echo $myData['data_name'] ?></h3>
                                    <p><?php echo $myData['price'] ?> Ks</p>

                                    <?php if($_SESSION['login@2017']){
                                        ?>

                                        <?php
                                    }?>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <?php
        endforeach;
        ?>


    </div>
</div>
<script src="bootstrap/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="bootstrap/js/jquery.js" type="text/javascript"></script>
<script>
    $("#myTable").dataTable();
</script>

</body>
</html>