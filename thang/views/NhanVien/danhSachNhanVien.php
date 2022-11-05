<div class="container">
    <form action="" method="post">       
        <input type="text" name="information" placeholder="Tìm kiếm">
        <select name="selection" id="selection" >
            <option value="">Tìm theo ...</option>
            <option value="tennv">Tên</option>
            <option value="tenpb">Phòng ban</option>
            <option value="diachi">Địa chỉ</option>
        </select>
        <button type="submit" name="search_nv">Tìm kiếm</button>
    </form>
    <h2>Danh sách nhân viên</h2>
    <table style="width:100%;">
        <thead style="text-align:left;">
            <tr>
                <th>Id</th>
                <th>Họ và tên</th>
                <th>Phòng ban</th>
                <th>Địa chỉ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data as $key => $arr) {
                echo "<tr>";
                foreach ($arr as $key => $value) {
                    echo "<td>$value</td>";
                }

                echo "<td><form action='' method='post'>
                <input type='hidden' name='idnv' value={$arr['idnv']}>
                <input class='btn btn-success' type='submit' value='Edit' name='chinhSuaNhanVien'>
                <input class='btn btn-danger' type='submit' value='Delete' name='xoaNhanVien'>
                </form></td>";
                echo "</tr>";
            }
            ?>
            
        </tbody>
    </table>
</div>