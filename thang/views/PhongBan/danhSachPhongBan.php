<div class="container">
    <form action="" method="post">       
        <input type="text" name="information" placeholder="Tìm phòng ban">
        <button type="submit" name="search_pb">Tìm kiếm</button>
    </form>
    <h1 id="title">Danh sách phòng ban</h1>
    <table style="width:100%;">
        <thead style="text-align:left;">
            <tr>
                <th>idpb</th>
                <th>Tên phòng ban</th>
                <th>Mô tả</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data as $key => $arr) {
                echo "<tr>";
                foreach ($arr as $key => $value) {
                    echo "<td>$value</td>";
                }
                echo "<td><form action='' method='post'>"
                ."<input type='hidden' name='idpb' value={$arr['idpb']}>"
                ."<input class='btn btn-secondary' type='submit' value='xxx' name='nhanVienPhongBan'>"
                ."</form></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <hr/>
    <a class="btn btn-outline-primary" href="./">Back</a>
</div>