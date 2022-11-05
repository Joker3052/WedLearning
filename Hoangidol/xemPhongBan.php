<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phong ban</title>
</head>
<body>
    <form action="quanLyNhanVien.php" method="post">       
        <input type="text" name="information" placeholder="Noi dung can tim">
        <select name="selection" id="selection" >
            <option value="">Noi dung can tim</option>
            <option value="Hoten">Ten</option>
            <option value="Idpb">Idpb</option>
            <option value="Diachi">Dia chi</option>
        </select>
        <button type="submit">Tim kiem</button>
    </form>
    <h1 id="title">Ket qua tim kiem</h1>
    <table style="width:100%;">
        <thead style="text-align:left;">
            <tr>
                <th>Idpb</th>
                <th>Ten phong ban</th>
                <th>Mo ta</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include_once('connect.php');
            
            $sql = "SELECT * FROM $dbname.phongban";
            try {
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                        <td>" . $row['Idpb'] . "</td>
                        <td>" . $row['Tenpb'] . "</td>
                        <td>" . $row['Mota'] . "</td>
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
    <a href="./">Back</a>

</body>
</html>