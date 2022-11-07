<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style>
        .btn-danger:hover{
            color: #006400;
        }
        .btn-danger
        {
            padding-top: 25px;
        }
    </style>
</head>
<body>
    <div class="list-group">
    <button class="btn btn-danger" onclick="Delete()">Delete All</button>
       
    </div>
    <script type="text/javascript">
        function  Delete() {
			<?php
            session_start();
			if (isset($_SESSION['login'])) {
				//header("Location: index.php?idLogin=$idLogin");
			?>
				option = confirm('Bạn có chắc là muốn XÓA TẤT CẢ')
			if(!option) {
				return;
			}
			$.post('delete.php', function(data) {
				alert(data);
				// location.reload();
                location.href = 'nhanvien.php';
			})
			<?php
			} else {
			?>
				option = confirm('CẦN ĐĂNG NHẬP');
				if (!option) {
					return;
				} else {
					location.href = 'login.php';
				}

			<?php  } ?>
		}
	</script>
</body>
</html>
