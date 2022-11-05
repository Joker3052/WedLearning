<!DOCTYPE html>
<html>
<body>
    <div class="box">
    <?php
        //get id phong ban
        $searchtxt = $_REQUEST['searchtxt'];
        $searchmethod = $_REQUEST['searchmethod'];


        //Khai báo kết nối
        $link = mysqli_connect("localhost","root","") or die
        ("Không thể kết nối đến CSDL MySQL");
        //Lựa chọn cơ sở dữ liệu
        mysqli_select_db($link,"dulieu");

        //query
        $sql="Select * from nhanvien where $searchmethod like '%$searchtxt%'";
        $result=mysqli_query($link,$sql);
       
        //display
        echo '<h1 style=text-align:center>Tim kiem</h1>';
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