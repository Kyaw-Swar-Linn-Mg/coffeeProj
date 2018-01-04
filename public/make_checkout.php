<?php
session_start();
include('db_config.php');

$table_number=$_POST['table_number'];

$checkout=new SecondDb();
$checkout->checkOut($table_number);