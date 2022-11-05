<?php
session_start();
$_SESSION['login1']['username']= 'thanhphuong';
header('location: index.php');
?>