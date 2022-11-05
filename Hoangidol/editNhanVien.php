<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sua Nhan Vien</title>
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
        <h2>Edit</h2>
        <label>Ten nhan vien</label>
        <input type="text" value="<?php echo $record['Hoten']; ?>" name="Hoten"/>
        <br/>

        <label>Phong ban</label>
        <select name="Idpb" id="Idpb">
        <?php
            include_once('connect.php');
            $sql = "SELECT * FROM $dbname.phongban";
            $result = $conn->query($sql);

            while($row = $result->fetch_assoc()) {
                if ($record['Idpb'] == $row['Idpb'])
                echo "<option selected value='" . $row['Idpb'] . "'> " . $row['Tenpb'] . "</option>";
                else 
                echo "<option value='" . $row['Idpb'] . "'> " . $row['Tenpb'] . "</option>";
            }
        ?>
        </select>
        <br/>

        <label>Dia chi</label>
        <input type="text" value="<?php echo $record['Diachi']; ?>" name="Diachi"/>
        <br/>
        
        <input type="submit" value="Update" name="update_user">
        <a href="./">Back</a>

    </form>
    
    <?php
        if (isset($_POST['update_user']))
        {
            $Hoten = $_POST['Hoten'];
            $Idpb = $_POST['Idpb'];
            $Diachi = $_POST['Diachi'];

            $sql = "UPDATE $dbname.nhanvien SET Hoten='$Hoten', Idpb='$Idpb', Diachi='$Diachi' WHERE Idnv='$id'";

            if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }

            $conn->close();
        }
    ?>
</body>
</html>