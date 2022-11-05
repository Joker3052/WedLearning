<?php
$conn = mysqli_connect('localhost', 'root', '', 'dulieu') or die ('Không thể kết nối tới database');
    $rs = mysqli_query($conn,"SELECT * FROM nhanvien");
echo '<table boder = "1" width="100%">';
echo '<caption>Du lieu bang Nhan vien</Caption>';
//Tieu de cua bang chua du lieu tren web
echo '<TR>
      <TH>IDNV</TH>
      <TH>Ho ten</TH>
      <TH>IDPB</TH>
      <TH>Dia Chi</TH>
      </TR>';
while($row = mysqli_fetch_array($rs)) {
    echo '<TR>
          <TD>'.$row['IDNV'].'</TD>
          <TD>'.$row['Hoten'].'</TD>
          <TD>'.$row['IDPB'].'</TD>
          <TD>'.$row['Diachi'].'</TD>
          </TR>';
}
echo '</TABLE>';
    mysqli_free_result($rs);
    mysqli_close($conn);
?>