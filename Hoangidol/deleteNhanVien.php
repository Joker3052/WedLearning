<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xoa Nhan Vien</title>
</head>
<body>
    <?php
        include_once('connect.php');
        
        $id = $_GET['id'];
        
        $sql="SELECT * FROM $dbname.nhanvien 
        INNER JOIN $dbname.phongban ON $dbname.nhanvien.Idpb=$dbname.phongban.Idpb
        WHERE Idnv='$id'";         
        
        $result = $conn->query($sql);
        $record = $result->fetch_assoc();
    ?>

    <form method="POST" class="form">
        <h2>Ban muon xoa ban ghi nay?</h2>
        <label>Ten nhan vien</label>
        <input type="text" value="<?php echo $record['Hoten']; ?>" name="Hoten" readonly/>
        <br/>
        <label>Id phong ban</label>
        <input type="text" value="<?php echo $record['Tenpb']; ?>" name="Tenpb" readonly/>
        <br/>
        <label>Dia chi</label>
        <input type="text" value="<?php echo $record['Diachi']; ?>" name="Diachi" readonly/>
        <br/>
        
        <input type="submit" value="Delete" name="delete_user">
        <a href="./">Back</a>
    
    </form>
    
    <?php
        if (isset($_POST['delete_user']))
        {
            include_once('connect.php');

            $sql = "DELETE FROM $dbname.nhanvien WHERE Idnv='$id'";

            if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully";
                header("Location: http://localhost/chuong_php/QLNV/");
            } else {
                echo "Error updating record: " . $conn->error;
            }

            $conn->close();
        }
    ?>
</body>
</html>