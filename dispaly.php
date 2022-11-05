<?php
// Kết nối CSDL và lưu vào biến kết nối
// Các tham số gồm:
// - localhost: là tên server, thường mặc định là localhost luôn
// - root: là tên đăng nhập vào database
// - vertrigo: là mật khẩu đăng nhập vào database
// - demo: Là database sẽ xử lý
$conn = mysqli_connect('localhost', 'root', '', 'dulieu') or die ('Không thể kết nối tới database');
// Câu truy vấn
$sql = 'SELECT * FROM nhanvien
INNER JOIN phongban
ON nhanvien.IDPB = phongban.IDPB';

// Thực hiện câu truy vấn, hàm này truyền hai tham số vào là biến kết nối và câu truy vấn
$result = mysqli_query($conn, $sql);
 
// Nếu thực thi không được thì thông báo truy vấn bị sai
if (!$result){
    die ('Câu truy vấn bị sai');
}
echo'<table border="1" width="100%"';
echo'<caption>Du lieu bang nhan vien </caption>';

echo "<TR><TH>IDNV</TH><TH>Hoten</TH><TH>IDPB</TH><TH>Diachi</TH><TH>IDPB</TH><TH>Tenpb</TH><TH>Mota</TH></TR>";
while($row=mysqli_fetch_array($result))


{
    $IDNV= $row{'IDNV'};
    $Hoten=$row{"Hoten"};
    $IDPB=$row{"IDPB"};
    $Diachi=$row{"Diachi"};
    $IDPB=$row{"IDPB"};
    $Tenpb=$row{"Tenpb"};
    $Mota=$row{"Mota"};
    // echo '<TR><TD>'.$row['maso'].'</TD><TD>'.$row['hoten'].'/TD><TD>'.$row['ngaysinh'].'</TD><TD>'.$row['nghenghiep'].'</TD></TR>';
  echo "<tr><td>$IDNV</td><td>$Hoten</td><td>$IDPB</td><td>$Diachi</td><td>IDPB</td><td>Tenpb</td><td>Mota</td>";
}

// Xóa kết quả khỏi bộ nhớ
mysqli_free_result($result);
// Sau khi thực thi xong thì ngắt kết nối database
mysqli_close($conn);
?>