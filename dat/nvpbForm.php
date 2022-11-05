<!DOCTYPE html>
<html>
<body>
    <div class="box">
    <?php
        //get id phong ban
        $id_pb = $_GET['id_pb'];

        //Khai báo kết nối
        $link = mysqli_connect("localhost","root","") or die
        ("Không thể kết nối đến CSDL MySQL");
        //Lựa chọn cơ sở dữ liệu
        mysqli_select_db($link,"dulieu");

        //query
        $sql="Select * from nhanvien where id_pb='$id_pb'";
        $result=mysqli_query($link,$sql);
        $sql="Select tenpb from phongban where id_pb='$id_pb'";
        $tenpbresult=mysqli_query($link,$sql);
        $tenpb = mysqli_fetch_assoc($tenpbresult);
        //display
        echo '<h1 style=text-align:center>Danh sách nhân viên phòng" '.$tenpb['Tenpb'].'"</h1>';
        echo '<table border="1" width="100%">';
        echo "<TR><TH>MS</TH><TH>Tên nhân viên</TH><TH>Địa chỉ</TH></TR>";
        while ( $row = mysqli_fetch_array($result) ) {
            echo '<TR><TD>'.$row['IDNV'].'</TD><TD>'.$row['Hoten'].'</TD><TD>'.$row['Diachi'].'</TD></TR>';
        }
        echo '</TABLE>';

        //close query
        mysqli_free_result($result);
        mysqli_close($link);
    ?>
    </div>
</body>
</html>