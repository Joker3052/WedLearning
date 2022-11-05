<?php
session_start();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a href="/" class="navbar-brand">Trang chủ</a>
        
        <form action="" method="post" class="d-flex">
            <?php
            if ($_SESSION['adminId'] == "") echo "<button type='submit' name='dangNhap' class='btn btn-success'>Đăng nhập</button>";
            else echo "<button type='submit' name='dangXuat' class='btn btn-danger'>Đăng xuất</button>";
            ?>
        </form>

    </div>

</nav>