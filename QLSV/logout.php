<?php
session_start();
ob_start();
unset($_SESSION['idLogout']);
header('location: index.php');
?>