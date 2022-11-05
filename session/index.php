<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
session_start();
    ?>
    <?php
if(isset($_SESSION['login1']['username']))
{
    ?>
    <a href="logout.php">logout</a>
    <?php
}

else{
    ?>
    <a href="login.php">login</a>
 
<?php
}
?>
    
   
   
    <hr>
    <h1>unitop.vn</h1>
    <a href="index.php">home</a>
    <a href="course.php">course</a>
    <a href="account.php">account</a>
    <hr>
    <p>home</p>
    <?php

    if(isset($_SESSION['login1']['username']))
    {
     echo "hi <b>".$_SESSION['login1']['username']."</b>";
    }
   else{
    echo 'pl login';
   }
       

    
    ?>
</body>
</html>