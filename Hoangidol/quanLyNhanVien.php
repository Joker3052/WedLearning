<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSDL</title>
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
    <h1 id="title">Ket qua tim kiem</h1>
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

            $search_content = $_POST['information'];
            $search_type = $_POST['selection'];
            if (!$search_type) $search_type = "Hoten";
            
            $sql = "SELECT * FROM $dbname.nhanvien 
            INNER JOIN $dbname.phongban ON $dbname.nhanvien.Idpb=$dbname.phongban.Idpb";
            if ($search_content == 0 || $search_content) $sql .= " WHERE $search_type LIKE '%$search_content%'";
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
                            <a href='editNhanVien.php?id=". $row['Idnv'] . "'>Edit</a> |
                            <a href='deleteNhanVien.php?id=" . $row['Idnv'] . "'>Delete</a>
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
</body>
</html>