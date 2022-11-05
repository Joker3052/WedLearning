<div class="container">
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
            <form action="" method="post">
                <?php
                foreach ($data as $index => $arr) {
                    echo "<tr>";
                    foreach ($arr as $key => $value) {
                        echo "<td>{$value}</td>";
                    }
                    echo "<td>"
                    ."<input type='checkbox' name='st[]' value='{$arr['idnv']}'>"
                    ."</td>";
                    echo "</tr>";
                } 
                ?>
                <input class="btn btn-danger" type="submit" value="Xóa" name="delete_all">
                <input class="btn btn-warning" type="reset" value="Bỏ chọn tất cả">
                <a class="btn btn-success" href="./">Trở về</a>
            </form>
        </tbody>
    </table> 
</div>
