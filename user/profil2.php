<?php

$tanggal = WKT(date("Y-m-d"));
$pro = "simpan";
$gambar0 = "avatar.jpg";
$status = "Aktif";
//$PATH="ypathcss";
?>
<link type="text/css" href="<?php echo "$PATH/base/"; ?>ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo "$PATH/"; ?>jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/"; ?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/"; ?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/"; ?>ui/i18n/ui.datepicker-id.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$("#tanggal").datepicker({
			dateFormat: "dd MM yy",
			changeMonth: true,
			changeYear: true
		});
	});
</script>

<script type="text/javascript">
	function PRINT(pk) {
		win = window.open('user/user_print.php?pk=' + pk, 'win', 'width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0');
	}
</script>
<script language="JavaScript">
	function buka(url) {
		window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');
	}
</script>

<?php
$id_user = $_SESSION["cid"];
$sql = "select * from `$tbuser` where `id_user`='$id_user'";
$d = getField($conn, $sql);
$id_user = $d["id_user"];
$id_user0 = $d["id_user"];
$nama_user = $d["nama_user"];
$level = $d["level"];
$username = $d["username"];
$password = $d["password"];
$telepon = $d["telepon"];
$email = $d["email"];
$status = $d["status"];
$keterangan = $d["keterangan"];
$pro = "ubah";

?>
<link rel="stylesheet" href="jsacordeon/jquery-ui.css">
<link rel="stylesheet" href="resources/demos/style.css">
<script src="jsacordeon/jquery-1.12.4.js"></script>
<script src="jsacordeon/jquery-ui.js"></script>
<script>
	$(function() {
		$("#accordion").accordion({
			collapsible: true
		});
	});
</script>

<div class="container" style="margin-top: 80px;">
	<div id="accordion">
		<h3 class="mb-4"><?= $translations['titpage_profil2']; ?></h3>
		<div class="table-responsive">
			<form action="" method="post" enctype="multipart/form-data">
				<table class="table table-bordered">
					<tr>
						<th width="20%"><label for="id_user"><?= $translations['id_panitia']; ?></label>
						<th width="1%">:
						<th colspan="2"><b><?php echo $id_user; ?></b>
					</tr>
					<tr>
						<td><label for="nama_user"><?= $translations['nama_panitia']; ?></label>
						<td>:
						<td width="213"><?php echo $nama_user; ?>
						</td>
					</tr>

					<tr>
						<td><label for="level"><?= $translations['level']; ?></label>
						<td>:
						<td colspan="2"><?php echo $level; ?>
						</td>
					</tr>

					<tr>
						<td height="24"><label for="username">Username</label>
						<td>:
						<td><input required name="username" class="form-control" type="text" id="username" value="<?php echo $username; ?>" size="25" /></td>
					</tr>

					<tr>
						<td height="24"><label for="password">Password</label>
						<td>:
						<td><input required name="password" class="form-control" type="password" id="password" value="<?php echo $password; ?>" size="25" /></td>
					</tr>


					<tr>
						<td height="24"><label for="telepon"><?= $translations['telepon']; ?></label>
						<td>:
						<td><input required name="telepon" class="form-control" type="number" id="telepon" value="<?php echo $telepon; ?>" size="25" />
						</td>
					</tr>

					<tr>
						<td height="24"><label for="email">E-mail</label>
						<td>:
						<td><input disabled name="email" class="form-control" type="email" id="email" value="<?php echo $email; ?>" size="25" />
						</td>
					</tr>

					<tr>
						<td><label for="status">Status</label>
						<td>:
						<td colspan="2"><?php echo $status; ?>
						</td>
					</tr>

					<tr>
						<td height="24"><label for="keterangan"><?= $translations['keterangan']; ?></label>
						<td>:
						<td><?php echo $keterangan; ?>
						</td>
					</tr>

					<tr>
						<td>
						<td>
						<td colspan="2"><input name="Simpan" type="submit" id="Simpan" class="btn btn-primary btn-sm me-2" value="<?= $translations['simpan']; ?>" />
							<a href="?mnu=profil"><input name="Batal" type="button" class="btn btn-danger btn-sm" id="Batal" value="<?= $translations['batal']; ?>" /></a>
						</td>
					</tr>
				</table>
			</form>
			<br />
			</div>
		</div>
	</div>
</div>

<?php
if (isset($_POST["Simpan"])) {
	$id_user0 = strip_tags($_SESSION["cid"]);
	$username = strip_tags($_POST["username"]);
	$password = strip_tags($_POST["password"]);
	$telepon = strip_tags($_POST["telepon"]);
	$email = strip_tags($_POST["email"]);
	$sql = "update `$tbuser` set 
	`username`='$username',
	`password`='$password',
	`telepon`='$telepon' ,
	`email`='$email'
	 where `id_user`='$id_user0'";
	$ubah = process($conn, $sql);
	if ($ubah) {
		echo "<script>alert('Data $nama_user berhasil diubah !');document.location.href='?mnu=profil';</script>";
	} else {
		echo "<script>alert('Data $nama_user gagal diubah...');document.location.href='?mnu=profil';</script>";
	}
}
?>