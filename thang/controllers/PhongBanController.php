<?php 
require_once 'controllers/Controller.php';
class PhongBanController extends Controller {
    
    function __construct() {
    }
    
    function index($args = []){
        $model = $this->model('PhongBanModel');
        $data = $model->getList($args);
        require_once 'views/PhongBan/danhSachPhongBan.php';
    }

    function detail($idpb = 1) {
        $model = $this->model('PhongBanModel');
        $data = $model->getDetail($idpb);
        require_once 'views/PhongBan/nhanVienPhongBan.php';
    }
}
?>