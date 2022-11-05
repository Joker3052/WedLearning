<?php
session_start();
    $layout = 'layouts/defaultLayout.php';
    $title = 'Home';
    require_once 'app.php';
    require_once $layout;
?>