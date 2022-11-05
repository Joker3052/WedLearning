<?php
session_start();
?>
<form action="" method="post" class="container">
    <input class="btn btn-link" type="submit" value="Danh sách nhân viên" name="danhSachNhanVien">
    <input class="btn btn-link" type="submit" value="Xem phòng ban" name="xemPhongBan">
    <?php
        if ($_SESSION['adminId'] != "") 
            echo '<input class="btn btn-link" type="submit" value="Thêm nhân viên" name="themNhanVien"/>
            <input class="btn btn-link" type="submit" value="Xóa nhiều" name="chonNhieu">';
    ?>
</form>