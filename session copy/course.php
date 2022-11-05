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
    <a href="">login</a>
    <hr>
    <h1>unitop.vn</h1>
    <a href="index.php">home</a>
    <a href="course.php">course</a>
    <a href="account.php">account</a>
    <hr>
    <p>course</p>
    <?php
     echo $_SESSION['login1']['username'];
    ?>
</body>
</html>