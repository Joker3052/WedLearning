<?php
include_once "config.php";
$IDNV = mysqli_real_escape_string($conn, $_POST['IDNVd']);
if(!empty($IDNV) )
 {
    $sql="DELETE FROM nhanvien WHERE IDNV ='$IDNV'";
if (mysqli_query($conn, $sql)){
    echo "success";
 }
 else
 {
    echo "failed";
 }
}
 else{
    echo 'requied';
 }
?>