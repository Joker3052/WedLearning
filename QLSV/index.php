<?php
require_once('dbhelp.php');
// session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Student Management</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> -->

	<!-- Latest compiled JavaScript -->
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> -->
</head>

<body>
	<div class="container">
		<div class="panel panel-primary">
			<?php
			$idLogin = '';
			if (isset($_GET['idLogin'])) {
				$idLogin = $_GET['idLogin'];
			}
			if (isset($_SESSION['login'][$idLogin])) {
			?>
				<a href="logout.php">logout</a>
			<?php
			} else {
			?>
				<a href="login.php">login</a>

			<?php
			}
			?>

			<?php

			if (isset($_SESSION['login'][$idLogin])) {
				echo "hi <b>" . $_SESSION['login'][$idLogin] . "</b>";
			} else {
				echo 'pl login';
			}
			?>
			<div class="panel-heading">
				Quản lý thông tin sinh viên
				<form method="get">
					<input type="text" name="s" class="form-control" style="margin-top: 15px; margin-bottom: 15px;" placeholder="Tìm kiếm theo tên">
				</form>
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>STT</th>
							<th>Họ & Tên</th>
							<th>Tuổi</th>
							<th>Địa chỉ</th>
							<th width="60px"></th>
							<th width="60px"></th>
						</tr>
					</thead>
					<tbody>
						<?php
						if (isset($_GET['s']) && $_GET['s'] != '') {
							$sql = 'select * from student where fullname like "%' . $_GET['s'] . '%"';
						} else {
							$sql = 'select * from student';
						}

						$studentList = executeResult($sql);

						$index = 1;
						foreach ($studentList as $std) {
							echo '<tr>
			<td>' . ($index++) . '</td>
			<td>' . $std['fullname'] . '</td>
			<td>' . $std['age'] . '</td>
			<td>' . $std['address'] . '</td>
			<td><button class="btn btn-warning" onclick="editStudent(' . $std['id'] . ',' . $idLogin . ')">Edit</button></td>
			<td><button class="btn btn-danger" onclick="deleteStudent(' . $std['id'] . ')">Delete</button></td>
		</tr>';
						}
						// echo $idLogin;
						// <td><button class="btn btn-warning" onclick=\'window.open("input.php?id='.$std['id'].'","_self")\'>Edit</button></td>
						?>

					</tbody>
				</table>
				<button class="btn btn-success" onclick="addStudent(<?= $idLogin ?>)">Add Student</button>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		function addStudent(id) {
			<?php
			if (isset($_SESSION['login'][$idLogin])) {
				//header("Location: index.php?idLogin=$idLogin");
			?>
				location.href = "input.php?idLogin=" + id;
				// console.log('id is :'+id);
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

		function editStudent(id, idLogin) {
			<?php
			if (isset($_SESSION['login'][$idLogin])) {
				//header("Location: index.php?idLogin=$idLogin");
			?>
				location.href = "input.php?idEdit=" + id + "&idLogin=" + idLogin;
				// console.log('id is :'+id);
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

		function deleteStudent(id) {
			<?php
			if (isset($_SESSION['login'][$idLogin])) { ?>
				option = confirm('Bạn có muốn xoá sinh viên này không')
				if (!option) {
					return;
				}

				console.log(id)
				$.post('delete_student.php', {
					'id': id
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
					location.href = 'login.php';
				}

			<?php  } ?>
		}
	</script>
</body>

</html>