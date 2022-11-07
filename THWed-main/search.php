<?php
require_once('dbhelper.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Search</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


</head>

<body>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Quản lý thông tin nhân viên
                <form method="get">
                    <input type="text" name="s" class="form-control" style="margin-top: 15px; margin-bottom: 15px;" >
                    <select name="c">
        <option value="1">Tìm kiếm theo tên</option>
        <option value="2">Tìm kiếm theo địa chỉ</option>
    </select>
                </form>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">

                    <?php
                    $s_c='';
                    if (isset($_GET['c'])) {
                        $s_c = $_GET['c'];
                    }
                
                    if (isset($_GET['s']) && $_GET['s'] != '') {
                        if($s_c==1)
                        {
                            $sql = 'SELECT nhanvien.IDNV,nhanvien.Hoten,phongban.Tenpb,nhanvien.Diachi from nhanvien,phongban
                            where nhanvien.IDPB = phongban.IDPB AND Hoten like "%' . $_GET['s'] . '%"';
                        }
                        if($s_c==2)
                        {
                            $sql = 'SELECT nhanvien.IDNV,nhanvien.Hoten,phongban.Tenpb,nhanvien.Diachi from nhanvien,phongban
                            where nhanvien.IDPB = phongban.IDPB AND Diachi like "%' . $_GET['s'] . '%"';
                        }
                       
                    ?>
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Họ và Tên</th>
                                <th>Phòng Ban</th>
                                <th>Địa chỉ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $studentList = executeResult($sql);
                            if ($studentList != null) {
                                $index = 1;
                                foreach ($studentList as $std) {
                                    echo '<tr>
                <td>' . ($index++) . '</td>
                <td>' . $std['Hoten'] . '</td>
                <td>' . $std['Tenpb'] . '</td>
                <td>' . $std['Diachi'] . '</td>
            </tr>';
                                }
                            } else {
                            ?>
                               <div class="" style="background-color: #DC143C; color:black;"> không tồn tại</div>
                            <?php
                            }
                            ?>
                        </tbody>
                    <?php
                    }
                    ?>

                </table>
            </div>
        </div>
    </div>


</body>

</html>