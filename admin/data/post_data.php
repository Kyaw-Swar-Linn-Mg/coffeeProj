<?php
include ('data_config.php');

$data_name=$_POST['data_name'];
$price=$_POST['price'];
$cat_id=$_POST['cat_id'];
$data_image=$_FILES['data_image']['tmp_name'];

$data=new DataDb();
$data->insertData($data_name, $price, $cat_id, $data_image);