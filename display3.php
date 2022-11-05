<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    IDNV: <input type="int" name="IDNV">
    Họ tên: <input type="text" name="Hoten">
    IDPB: 
    <select name="IDPB">
        <option value="1">Ban kế toán</option>
        <option value="2">Ban quản lý</option>
        <option value="3">Ban chính trị</option>
    </select>
    Địa chỉ: <input type="text" name="Diachi">
    <button type="submit" name="insert">insert</button>
</form>
<form action="" method="post">
    IDNV: <input type="int" name="IDNVd">
    <button type="submit" name="delete">delete</button>
</form>
<?php  
// if(($_POST["IDNV"])&&($_POST["Hoten"])&&($_POST["IDPB"])&&($_POST["Diachi"]))

// if(($_POST["IDNVd"])) { echo $_POST["IDNVd"]; } ?>
<?php
// Kết nối CSDL và lưu vào biến kết nối
// Các tham số gồm:
// - localhost: là tên server, thường mặc định là localhost luôn
// - root: là tên đăng nhập vào database
// - vertrigo: là mật khẩu đăng nhập vào database
// - demo: Là database sẽ xử lý
$conn = mysqli_connect('localhost', 'root', '', 'dulieu') or die ('Không thể kết nối tới database');
// Câu truy vấn
 $sql ='SELECT nhanvien.IDNV,nhanvien.Hoten,phongban.Tenpb,nhanvien.Diachi
  FROM nhanvien
 INNER JOIN phongban
 ON nhanvien.IDPB = phongban.IDPB';
 //insert//////////////////////////////////////////////
//  if(count(["IDNV"]) == 0){
// echo 'that bai';
//  }
 if (isset($_POST['insert']))
 {
    $IDNVi=(($_POST["IDNV"]));
 $Hoteni=(($_POST["Hoten"]));
 $IDPBi=(($_POST["IDPB"]));
 $Diachii=(($_POST["Diachi"]));
$sql1="INSERT INTO nhanvien (IDNV, Hoten, IDPB,Diachi)
VALUES ('$IDNVi','$Hoteni','$IDPBi','$Diachii')";
if (mysqli_query($conn, $sql1)){
    echo 'thêm thành công';
}
else
{
    echo' thất bại11';
}
 }

 //update/////////////////////////////////////////////////
 $sql2 = 'UPDATE nhanvien SET Hoten = "Lê Lam Phương" where IDNV = 2';
// if (mysqli_query($conn, $sql2)){
//     echo 'update thành công';
// }
// else
// {
//     echo' thất bại11';
// }
 //delete
 if(isset($_POST['delete']))
 {
    $IDNVd= ($_POST["IDNVd"]);
 $sql3="DELETE FROM nhanvien WHERE IDNV ='$IDNVd'";
if (mysqli_query($conn, $sql3)){
    echo 'delete thành công';
}
else
{
    echo' thất bại1';
}
 }
// Thực hiện câu truy vấn, hàm này truyền hai tham số vào là biến kết nối và câu truy vấn
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
    // echo '<TR><TD>'.$row['maso'].'</TD><TD>'.$row['hoten'].'/TD><TD>'.$row['ngaysinh'].'</TD><TD>'.$row['nghenghiep'].'</TD></TR>';
  echo "<tr><td>$IDNV</td><td>$Hoten</td><td>$Tenpb</td><td>$Diachi</td>";
}
 
// Xóa kết quả khỏi bộ nhớ
mysqli_free_result($result);
 
// Sau khi thực thi xong thì ngắt kết nối database
mysqli_close($conn);
?>
</body>
</html>
