<?php
session_start();
$_SESSION['login1'][2]= 'thanhphuong';
header('location: index.php');
?>