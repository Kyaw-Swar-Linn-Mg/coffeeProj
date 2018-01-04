<?php
session_start();
if(!$_SESSION['login@2017']){
    header("location: ../../login.php");
}