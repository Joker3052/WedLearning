<?php
require_once ('dbhelper.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>nhanvien</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	
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
				<a class="btn btn-success" href="login.php?linklogin=1">login</a>
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
			 Thông tin nhân viên
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>STT</th>
							<th>Họ và Tên</th>
							<th>Phòng Ban</th>
							<th>Địa chỉ</th>
						</tr>
					</thead>
					<tbody>
<?php
$s_IDPB='';
if (isset($_REQUEST['IDPB'])) {
	$s_IDPB = $_REQUEST['IDPB'];
}

if($s_IDPB != '')
{
	$sql = "SELECT nhanvien.IDNV,nhanvien.Hoten,phongban.Tenpb,nhanvien.Diachi from nhanvien,phongban
	where nhanvien.IDPB = phongban.IDPB AND phongban.IDPB = $s_IDPB";
}
	else
	{
		$sql = 'SELECT nhanvien.IDNV,nhanvien.Hoten,phongban.Tenpb,nhanvien.Diachi
	FROM nhanvien
   INNER JOIN phongban
   ON nhanvien.IDPB = phongban.IDPB';
	}
$studentList = executeResult($sql);

$index = 1;
foreach ($studentList as $std) {
	echo '<tr>
			<td>'.($index++).'</td>
			<td>'.$std['Hoten'].'</td>
			<td>'.$std['Tenpb'].'</td>
			<td>'.$std['Diachi'].'</td>
		</tr>';
}
?>				</tbody>
				</table>
			</div>
		</div>
	</div>

	
</body>
</html>