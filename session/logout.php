<?php
session_start();
ob_start();
unset($_SESSION['login1']);
header('location: index.php');
?>