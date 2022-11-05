<?php
 include_once "php/config.php";
 $sql ='SELECT phongban.Tenpb,phongban.Mota FROM phongban ';
$result = mysqli_query($conn, $sql);
if (!$result){
    die ('Câu truy vấn bị sai');
}
echo'<table border="1" width="100%"';
echo'<caption>Du lieu bang phongban </caption>';

echo "<TR><TH>Tenpb</TH><TH>Mota</TH><TH>DSNV</TH></TR>";
while($row=mysqli_fetch_array($result))
{
    $Tenpb=$row{"Tenpb"};
    $Mota=$row{"Mota"};
  echo "<tr><td>$Tenpb</td><td>$Mota</td><td></td>";
}
 
// Xóa kết quả khỏi bộ nhớ
mysqli_free_result($result);
 
// Sau khi thực thi xong thì ngắt kết nối database
mysqli_close($conn);
?>