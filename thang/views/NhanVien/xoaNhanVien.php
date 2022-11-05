<?php 
if ($_SESSION["adminId"] == "") header("Location: http://localhost/chuong_php/QLNV/views/Auth/login");

    $idnv = $nhanvien['idnv'];
    $tennv = $nhanvien['tennv'];    
    $tenpb = $nhanvien['tenpb'];
    $diachi = $nhanvien['diachi'];   
?>
<div class="container">
    <form action="" method="POST">
        <h2>DELETE</h2>
        <h4>Ban co chac chan muon xoa ban ghi nay?</h4>
        <input type="text" name="idnv" value=<?php echo $idnv; ?> readonly hidden/>
        
        <b>Họ và tên : </b>
        <span><?php echo $tennv; ?></span>
        <br/>
        
        <b>Phòng ban : </b>
        <span><?php echo $tenpb; ?></span>
        <br/>
        
        <b>Địa chỉ : </b>
        <span><?php echo $diachi; ?></span>
        <br/>

        <hr/>
        
        <input class="btn btn-danger" type="submit" value="Delete" name="delete">
        <a class="btn btn-outline-primary" href="./">Back</a>

    </form>
</div>