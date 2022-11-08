<?php
require_once('dbhelper.php');
?>
<!DOCTYPE html>
<html>

<head>
	<title>Update</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>
	<div class="container">
		<div class="panel panel-primary">
			<?php
			if (isset($_SESSION['login'])) {
			?>
				<a class="btn btn-success" href="logout.php">logout</a>
				<!-- <a href="logout.php">logout</a> -->
			<?php
			} else {
			?>
				<a class="btn btn-success" href="login.php?linklogin=3">login</a>
				<!-- <a href="login.php">login</a> -->

			<?php
			}
			?>

			<?php
			if (isset($_SESSION['login'])) {
				echo " <b>" . $_SESSION['login'] . "</b>";
			} else { ?>
				<div class="badge bg-primary text-wrap" style="width: 6rem;">
					Please login
				</div>
			<?php }
			?>
			<div class="panel-heading">
				Quản lý thông tin nhân viên
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>STT</th>
							<th>Họ và Tên</th>
							<th>Phòng Ban</th>
							<th>Địa chỉ</th>
							<th width="60px"></th>
							<th width="60px"></th>
						</tr>
					</thead>
					<tbody>
						<?php
						if (isset($_GET['s']) && $_GET['s'] != '') {
							$sql = 'select * from nhanvien where Hoten like "%' . $_GET['s'] . '%"';
						} else {
							$sql = 'SELECT nhanvien.IDNV,nhanvien.Hoten,phongban.Tenpb,nhanvien.Diachi
	FROM nhanvien
   INNER JOIN phongban
   ON nhanvien.IDPB = phongban.IDPB';
						}

						$studentList = executeResult($sql);

						$index = 1;
						foreach ($studentList as $std) {
							echo '<tr>
			<td>' . ($index++) . '</td>
			<td>' . $std['Hoten'] . '</td>
			<td>' . $std['Tenpb'] . '</td>
			<td>' . $std['Diachi'] . '</td>
			<td><button class="btn btn-warning" onclick="edit(' . $std['IDNV'] . ')">Edit</button></td>
			<td><button class="btn btn-danger" onclick="Delete(' . $std['IDNV'] . ')">Delete</button></td>
		</tr>';
						}
						?>

					</tbody>
				</table>
				<button class="btn btn-success" onclick="add()">Thêm Nhân Viên</button>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		function add() {
			<?php
			if (isset($_SESSION['login'])) {
				//header("Location: index.php?idLogin=$idLogin");
			?>
				location.href = "input.php";
				// console.log('id is :'+id);
			<?php
			} else {
			?>
				option = confirm('CẦN ĐĂNG NHẬP');
				if (!option) {
					return;
				} else {
					location.href = 'login.php?linklogin=3"';
				}

			<?php  } ?>
		}


		function edit(id) {
			<?php
			if (isset($_SESSION['login'])) {
				//header("Location: index.php?idLogin=$idLogin");
			?>
				location.href = "input.php?idEdit=" + id;
				// console.log('id is :'+id);
			<?php
			} else {
			?>
				option = confirm('CẦN ĐĂNG NHẬP');
				if (!option) {
					return;
				} else {
					location.href = 'login.php?linklogin=3"';
				}

			<?php  } ?>
		}

		function Delete(id) {
			<?php
			if (isset($_SESSION['login'])) { ?>
				option = confirm('Bạn có muốn xoá sinh viên này không')
				if (!option) {
					return;
				}

				console.log(id)
				$.post('delete.php', {
					'IDNV': id
				}, function(data) {
					alert(data)
					location.reload()
				})
			<?php
			} else {
			?>
				option = confirm('CẦN ĐĂNG NHẬP');
				if (!option) {
					return;
				} else {
					location.href = 'login.php?linklogin=3"';
				}

			<?php  } ?>
		}
	</script>
</body>

</html>