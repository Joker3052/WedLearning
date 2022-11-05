<form action="" method="post">
    Họ tên: <input type="text" name="fullname" value="">
    <button type="submit">Gửi</button>
</form>
<?php if(isset($_POST["fullname"])) { echo $_POST["fullname"]; } ?>
///////////////////////
<form action="" method="post">
    Thành phố: <br>
    <select name="city">
        <option value="Hà Nội">Hà Nội</option>
        <option value="Hồ Chí Minh">Hồ Chí Minh</option>
        <option value="Đà Nẵng">Đà Nẵng</option>
        <option value="Cần Thơ">Cần Thơ</option>
    </select>
    <button type="submit">Gửi</button>
</form>
<?php if(isset($_POST["city"])) { echo $_POST["city"]; } ?>