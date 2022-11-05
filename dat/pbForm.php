<!DOCTYPE html>
<html>
<body>
    <div class="box">
    <?php
        //Khai báo kết nối
        $link = mysqli_connect("localhost","root","") or die
        ("Khong the ket noi den CSDL MySQL");
        //Lựa chọn cơ sở dữ liệu
        mysqli_select_db($link,"dulieu");
        $sql="Select * from phongban";
        $result=mysqli_query($link,$sql);
        echo '<h1 style=text-align:center>Danh sách phòng ban</h1>';
        echo '<table border="1" width="100%">';
        echo "<TR><TH>MS</TH><TH>Tên phòng ban</TH><TH>Mô tả</TH><TH>Xem DS nhân viên</TH></TR>";
        while ( $row = mysqli_fetch_array($result) ) {
            echo '<TR><TD>'.$row['IDPB'].'</TD><TD>'.$row['Tenpb'].'</TD><TD>'.$row['Mota'].'</TD><TD><a href=./nvpbForm.php?id_pb='.$row["IDPB"].'>Xem DS</a></TD></TR>';
        }
        echo '</TABLE>';
        mysqli_free_result($result);
        mysqli_close($link);
    ?>
    </div>
</body>
</html>