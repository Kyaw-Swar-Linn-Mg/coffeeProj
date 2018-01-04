<?php session_start();
$userName=$_SESSION['login@2017'];
include('user_config.php');
$user=new UserDb();
$users=$user->checkRole($userName);
$userRole=$users->fetch(PDO::FETCH_ASSOC);

if(!$userRole['user_role']=='0'){
    header("location: ../../admin/profile.php");
}

?>