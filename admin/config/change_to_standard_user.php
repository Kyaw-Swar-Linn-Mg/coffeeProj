<?php

include ('user_config.php');
$id=$_GET['id'];

$user=new UserDb();
$user->changeToStandardUser($id);