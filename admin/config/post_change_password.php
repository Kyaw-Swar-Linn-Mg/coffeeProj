<?php
include('user_config.php');

$old_password=$_POST['old_password'];
$new_password=$_POST['new_password'];
$confirm_new_password=$_POST['confirm_new_password'];

$user=new UserDb();
$user->changeUserPassword($old_password, $new_password, $confirm_new_password);