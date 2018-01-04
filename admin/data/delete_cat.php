<?php
include ('data_config.php');

$cat_name=$_GET['name'];

$cat=new DataDb();
$cat->deleteCat($cat_name);