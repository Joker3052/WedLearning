<?php
 include_once "php/config.php";
 $sql ='SELECT nhanvien.IDNV,nhanvien.Hoten,phongban.Tenpb,nhanvien.Diachi
  FROM nhanvien
 INNER JOIN phongban
 ON nhanvien.IDPB = phongban.IDPB';
$result = mysqli_query($conn, $sql);
// Nếu thực thi không được thì thông báo truy vấn bị sai
if (!$result){
    die ('Câu truy vấn bị sai');
}
echo'<table border="1" width="100%"';
echo'<caption>Du lieu bang nhan vien </caption>';

echo "<TR><TH>IDNV</TH><TH>Hoten</TH><TH>Tenpb</TH><TH>Diachi</TH></TR>";
while($row=mysqli_fetch_array($result))
{
    $IDNV= $row{'IDNV'};
    $Hoten=$row{"Hoten"};
    $Tenpb=$row{"Tenpb"};
    $Diachi=$row{"Diachi"};
  echo "<tr><td>$IDNV</td><td>$Hoten</td><td>$Tenpb</td><td>$Diachi</td>";
}
 
// Xóa kết quả khỏi bộ nhớ
mysqli_free_result($result);
 
// Sau khi thực thi xong thì ngắt kết nối database
mysqli_close($conn);
?>