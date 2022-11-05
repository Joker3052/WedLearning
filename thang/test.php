<?php
$string = $_SERVER['PHP_SELF']; 
echo $string;
$arr = explode('/', $string);
foreach ($arr as $key => $value) {
    echo $value."<br/>";
}

require_once 'models/NhanVienModel.php';
$model = new NhanVienModel();
$data = $model->getList();
foreach ($data as $key => $value) {
    foreach ($value as $key => $value) {
        echo $value."<br/>";
    }
}
$nhanvien = $model->getNhanVien(3);
foreach ($nhanvien as $key => $value) {
    echo $value;
}
?>