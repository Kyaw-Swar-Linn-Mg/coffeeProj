<?php
session_start();
unset($_SESSION['login@2017']);
header("location: ../login.php");