<?php
if ($_SESSION["adminId"] == "") header("Location: http://localhost/chuong_php/QLNV/views/Auth/login");
?>
<form action="" method="post" class="container">
    <h2>Create</h2>
    <label>Họ tên</label>
    <input type="text" name="tennv"/>
    <br/>
    
    <label>Phòng ban</label>
    <select name="idpb" id="idpb">
        <?php
            foreach ($data as $key => $value) {
                echo "<option value='" . $value['idpb'] . "'> " . $value['tenpb'] . "</option>";
            }
        ?>
    </select>
    <br/>
    
    <label>Địa chỉ</label>
    <input type="text" name="diachi"/>
    <br/>
    
    <input class="btn btn-success" type="submit" value="Create" name="create">  
    <a class="btn btn-outline-primary" href="/">Back</a>

</form>