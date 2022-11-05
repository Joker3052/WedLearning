<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QLNV</title>
</head>
<body>
    <form action="quanLyNhanVien.php" method="post">       
        <input type="text" name="information" placeholder="Noi dung can tim">
        <select name="selection" id="selection" >
            <option value="">Noi dung can tim</option>
            <option value="Hoten">Ten</option>
            <option value="Tenpb">Ten phong ban</option>
            <option value="Diachi">Dia chi</option>
        </select>
        <button type="submit">Tim kiem</button>
    </form>

    <hr/>

    <h2>Danh sach nhan vien</h2>
    <table style="width:100%;">
        <thead style="text-align:left;">
            <tr>
                <th>Id</th>
                <th>Ho va Ten</th>
                <th>Ten phong ban</th>
                <th>Dia chi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once('connect.php');
            
            $sql = "SELECT * FROM $dbname.nhanvien 
            INNER JOIN $dbname.phongban ON $dbname.nhanvien.Idpb=$dbname.phongban.Idpb";
            try {
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                        <td>" . $row['Idnv'] . "</td>
                        <td>" . $row['Hoten'] . "</td>
                        <td>" . $row['Tenpb'] . "</td>
                        <td>" . $row['Diachi'] . "</td>
                        <td>
                            <a href='editNhanVien.php?id=". $row['Idnv'] ."'>Edit</a> |
                            <a href='deleteNhanVien.php?id=". $row['Idnv'] ."'>Delete</a>
                        </td>
                        </tr>";
                    }
                } else {
                    echo "0 results";
                }
            } catch (Exception $e) {
                echo "$sql; ";
                echo $e;
            }
                  
            // Close connect      
            $conn->close;
            ?>
        </tbody>
    </table>
    
    <hr/>

    <form action="xemPhongBan.php" method="post">
        <button type="submit">Xem phong ban</button>
    </form>

    <form action="themNhanVien.php" method="post">
        <button type="submit">Them nhan vien</button>
    </form>
</body>
</html>