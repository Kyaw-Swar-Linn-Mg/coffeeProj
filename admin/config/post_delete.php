<?php
include ('user_config.php');
$id=$_GET['id'];
$deleteUser=new UserDb();
$deleteUser->deleteUser($id);

header("location:../../admin/manage-users.php");
?>