<?php
include ('data_config.php');

$cat_name=$_POST['cat_name'];

$cat=new DataDb();
$cat->insertCat($cat_name);

