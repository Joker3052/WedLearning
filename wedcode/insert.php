<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="wrapper">
        <section class="insert" >
            <header>thêm thông tin</header>
            <form action="#" >        
                <div class="error-txt"></div>
                    <div class="input">
                        <label >IDNV</label>
                        <input type="text" name="IDNV" placeholder="Enter your IDNV" required>
                    </div>
                    <div class="input">
                        <label >Họ Tên</label>
                        <input type="text" name="Hoten" placeholder="Enter your name" required>
                    </div>
                    <div class="input">
                        <label >IDPB</label>
                        <input type="text" name="IDPB" placeholder="Enter your IDPB" required>
                    </div>
                    <div class="input">
                        <label >Địa chỉ</label>
                        <input type="text" name="Diachi" placeholder="Enter your address" required>
                    </div>
                    <div class="button">
                        <input type="submit" value="insert">
                    </div>              
            </form>
        </section>
    </div>
    <script src="javascript/insert.js"></script>
</body>
</html>