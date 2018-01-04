<?php
include ('user_config.php');

$userName=$_POST['userName'];
$password=$_POST['password'];

$user=new UserDb();
$user->loginUser($userName , $password);

