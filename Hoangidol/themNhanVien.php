<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Them Nhan Vien</title>
</head>
<body>

    <form method="POST" class="form">
        <h2>Create</h2>
        <label>Ten nhan vien</label>
        <input type="text" name="Hoten"/>
        <br/>
        
        <label>Id phong ban</label>
        <select name="Idpb" id="Idpb">
        <?php
            include_once('connect.php');
            $sql = "SELECT * FROM $dbname.phongban";
            $result = $conn->query($sql);

            while($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['Idpb'] . "'> " . $row['Tenpb'] . "</option>";
            }
        ?>
        </select>
        <br/>
        
        <label>Dia chi</label>
        <input type="text" name="Diachi"/>
        <br/>
        
        <input type="submit" value="Create" name="create_user">  
        <a href="./">Back</a>

    </form>
    
    <?php
        if (isset($_POST['create_user']))
        {
            $Hoten=$_POST['Hoten'];
            $Idpb=$_POST['Idpb'];
            $Diachi=$_POST['Diachi'];

            $sql = "INSERT INTO $dbname.nhanvien VALUES (NULL ,'$Hoten', '$Idpb', '$Diachi')";

            if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully";
                header("Location: http://localhost/cn_web/chuong_php/QLNV/");
            } else {
                echo "Error updating record: " . $conn->error;
            }

            $conn->close();
        }
    ?>
</body>
</html>