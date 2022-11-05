<?php
require_once 'controllers/Controller.php';
class AuthController extends Controller {
    public function __construct() {
    }

    public function Login() {
        require_once 'views/Auth/login.html';
    }

    public function HandelLogin($args) {
        $mode = $this->model('AdminModel');
        $data = $mode->getList();
        $username = $args['username'];
        $password = $args['password'];
        foreach ($data as $key => $row) {
            if ($row['username'] == $username and $row['password'] == $password) {
                $_SESSION['adminId'] = $row['id'];
                header("Location: http://localhost/chuong_php/QLNV");
            }            
        }
        if ($_SESSION["adminId"] == "") require_once 'views/Auth/login.html';
    }

    public function Logout() {
        $_SESSION['adminId'] = "";
        header("Location: http://localhost/chuong_php/QLNV/");
    }
}