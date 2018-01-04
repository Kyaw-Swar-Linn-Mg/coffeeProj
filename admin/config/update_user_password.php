<?php
include ('user_config.php');

$id=$_POST['id'];
$password=$_POST['password'];

$user=new UserDb();
$user->updateUserPassword($id, $password);