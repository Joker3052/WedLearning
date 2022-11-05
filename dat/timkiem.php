<!DOCTYPE html>
<html>
<body>
    <div class="box">
            <form name="form1" action="./hienthitimkiem.php" method="post" >
                <div>
                    <h1>Tìm kiếm thông tin nhân viên</h1>
                    <input type="radio" name="searchmethod"  id="id" value="IDNV">
                    <label for="id">ID nhân viên</label><br>
                    
                    <input type="radio" name="searchmethod" checked="checked" id="name" value="Hoten">
                    <label for="name">Họ tên</label><br>
                    
                    <input type="radio" name="searchmethod" id="address" value="Diachi">
                    <label for="address">Địa chỉ</label><br>
                </div>

                <div>
                        <label for="searchtxt">Nhập thông tin:</label>
                        <input type="text" name="searchtxt" value="" id="searchtxt">
                </div>

                <div class="center-row">
                    <input type="submit" name="btnOk" value="Ok" onclick="checkExist()">
                    <input type="button" name="btnReset" value="Reset" onclick="reset()">
                </div>
            </form>
    </div>
    <script>
            let reset = () =>{
                let upcase = document.getElementById("fname");
                document.form1.username.value = "";
                document.form1.password.value = "";
            }

            let checkExist = () =>{
                let searchtxt = document.form1.searchtxt.value;
                (!searchtxt)?alert("Bạn chưa nhập đủ thông tin!"):true
            }
    </script>
</body>
</html>