<?php 
require_once 'controllers/Controller.php';
class NhanVienController extends Controller {
    function __construct() {
    }
    
    function Index($args = []){
        $model = $this->model('NhanVienModel');
        $data = $model->getList($args);
        require_once 'views/NhanVien/danhSachNhanVien.php';
    }

    function Create(){
        $model = $this->model('PhongBanModel');
        $data = $model->getList();
        require_once 'views/NhanVien/themNhanVien.php';
    }

    function HandelCreate($args){
        $model = $this->model('NhanVienModel');
        $model->create($args);
    }

    function Edit($idnv = 1) {
        $model = $this->model('PhongBanModel');
        $data = $model->getList();
        $model2 = $this->model('NhanVienModel');
        $nhanvien = $model2->getDetail($idnv);
        require_once 'views/NhanVien/chinhSuaNhanVien.php';
    }

    function HandelEdit($args){
        $model = $this->model('NhanVienModel');
        $model->edit($args);
    }

    function Delete($idnv = 1) {
        $model = $this->model('NhanVienModel');
        $nhanvien = $model->getDetail($idnv);
        require_once 'views/NhanVien/xoaNhanVien.php';
    }

    function HandelDelete($idnv){
        $model = $this->model('NhanVienModel');
        $model->delete($idnv);
    }

    function Choices(){
        $model = $this->model('NhanVienModel');
        $data = $model->getList();
        require_once 'views/NhanVien/chonNhieu.php';
    }

    function HandelDeleteAll($args){
        $model = $this->model('NhanVienModel');
        $data = $model->deleteAll($args);
    }
}
?>