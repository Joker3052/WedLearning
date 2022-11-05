<?php
include_once "config.php";
$IDNV =  $_POST['IDNV'];
$Hoten =  $_POST['Hoten'];
$IDPB =  $_POST['IDPB'];
$Diachi =  $_POST['Diachi'];
if(!empty($IDNV) && !empty($Hoten) && !empty($IDPB) && !empty($Diachi))
 {
    $sql="INSERT INTO nhanvien (IDNV, Hoten, IDPB,Diachi)
    VALUES ('$IDNV','$Hoten','$IDPB','$Diachi')";
    if (mysqli_query($conn, $sql)){
        echo 1;
     }
     else
     {
        echo 2;
     }
 }
 else{
    echo 3;
 }
// echo "111";
?>