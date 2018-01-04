<?php
include ('user_config.php');

$userName=$_POST['userName'];
$email=$_POST['email'];
$password=$_POST['password'];
$confirm_password=$_POST['confirm_password'];

$user=new UserDb();
$user->regUser($userName, $email, $password, $confirm_password);
