<?php

function controller($controllerName) {
    require_once "controllers/{$controllerName}.php";
    $controller = new $controllerName();
    return $controller;
}

// Dang Nhap
if (isset($_POST['dangNhap'])) {
    $AuthController = controller('AuthController');
    $AuthController->Login();
    $layout = " ";
}

else if (isset($_POST['login'])) {
    $AuthController = controller('AuthController');
    $args = array();
    $args['username'] = $_POST['username'];
    $args['password'] = $_POST['password'];
    $AuthController->HandelLogin($args);
    $layout = " ";
}

// Dang Xuat
else if (isset($_POST['dangXuat'])) {
    $AuthController = controller('AuthController');
    $AuthController->Logout();
}

// Xem Phong Ban
else if (isset($_POST['xemPhongBan'])) {
    $PhongBanController = controller('PhongBanController');
    $controller = $PhongBanController;
    $action = 'Index';
}

// Tim Kiem Phong Ban
else if (isset($_POST['search_pb'])) {
    $PhongBanController = controller('PhongBanController');
    $args = array();
    $args['information'] = $_POST['information'];

    $controller = $PhongBanController;
    $action = "Index";
}

// Xem Nhan Vien Co Trong Phong Ban
else if (isset($_POST['nhanVienPhongBan'])) {
    $PhongBanController = controller('PhongBanController');
    $controller = $PhongBanController;
    $action = 'Detail';
    $arg = $_POST['idpb'];
}

// Them Nhan Vien
else if (isset($_POST['themNhanVien'])) {
    $NhanVienController = controller("NhanVienController");
    $controller = $NhanVienController;
    $action = 'Create';
}

else if (isset($_POST['create'])) {
    $NhanVienController = controller("NhanVienController");
    $args = array();
    $args['tennv'] = $_POST['tennv'];
    $args['idpb'] = $_POST['idpb'];
    $args['diachi'] = $_POST['diachi'];

    $NhanVienController->HandelCreate($args);
}

// Tim Kiem Nhan Vien
else if (isset($_POST['search_nv'])) {
    $NhanVienController = controller("NhanVienController");
    $args = array();
    $args['information'] = $_POST['information'];
    $args['selection'] = $_POST['selection'];
    $controller = $NhanVienController;
    $action = "Index";
}

// Chinh Sua Nhan Vien
else if (isset($_POST['chinhSuaNhanVien'])) {
    $NhanVienController = controller("NhanVienController");
    $controller = $NhanVienController;
    $action = 'Edit';
    $arg = $_POST['idnv'];
}

else if (isset($_POST['edit'])) {
    $NhanVienController = controller("NhanVienController");
    $args = array();
    $args['idnv'] = $_POST['idnv'];
    $args['tennv'] = $_POST['tennv'];
    $args['idpb'] = $_POST['idpb'];
    $args['diachi'] = $_POST['diachi'];
    $NhanVienController->HandelEdit($args);
}
// Xoa Nhan Vien
else if (isset($_POST['xoaNhanVien'])) {
    $NhanVienController = controller("NhanVienController");
    $controller = $NhanVienController;
    $action = 'Delete';
    $arg = $_POST['idnv'];
}

else if (isset($_POST['delete'])) {
    $NhanVienController = controller("NhanVienController");
    $args = array();
    $args['idnv'] = $_POST['idnv'];
    $args['tennv'] = $_POST['tennv'];
    $args['idpb'] = $_POST['idpb'];
    $args['diachi'] = $_POST['diachi'];
    $NhanVienController->HandelDelete($args);
}

// Chon Nhieu Nhan Vien
else if (isset($_POST['chonNhieu'])) {
    $NhanVienController = controller("NhanVienController");
    $controller = $NhanVienController;
    $action = 'Choices';
}

else if (isset($_POST['delete_all'])) {
    $NhanVienController = controller("NhanVienController");
    $args = $_POST['st'];
    $NhanVienController->HandelDeleteAll($args);
}

// Danh Sach Nhan Vien
else {
    $NhanVienController = controller("NhanVienController");
    $controller = $NhanVienController;
    $action = 'Index';
}
?>