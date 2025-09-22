<?php

$pro = "simpan";
$gambar0 = "avatar.jpg";
//$PATH="ypathcss";
?>

<script type="text/javascript">
	function PRINT(pk) {
		win = window.open('user/user_print.php?pk=' + pk, 'win', 'width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, id_user=0');
	}
</script>

<script language="JavaScript">
	function buka(url) {
		window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');
	}
</script>

<?php
$kd = "PMB";

$sql = "SELECT `id_user` FROM `$tbuser` WHERE `id_user` LIKE '$kd%' ORDER BY CAST(SUBSTRING(id_user, 4) AS UNSIGNED) DESC LIMIT 1";
$d = getField($conn, $sql);

if ($d) {
    $num = intval(substr($d['id_user'], 3)) + 1;
} else {
    $num = 1;
}

$id_user = $kd . str_pad($num, 2, "0", STR_PAD_LEFT);
?>

<?php
$nama_user = "";
$level = "";
$email = "";
$telepon = "";
$username = "";
$password = "";
$status = "";
$keterangan = "";

if (isset($_GET["pro"]) && $_GET["pro"] == "ubah") {
	$id_user = $_GET["kode"];
	$sql = "select * from `$tbuser` where `id_user`='$id_user'";
	$d = getField($conn, $sql);
	$id_user = $d["id_user"];
	$id_user0 = $d["id_user"];
	$nama_user = $d["nama_user"];
	$level = $d["level"];
	$email = $d["email"];
	$telepon = $d["telepon"];
	$username = $d["username"];
	$password = $d["password"];
	$status = $d["status"];
	$keterangan = $d["keterangan"];
	$pro = "ubah";
}
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
		<h3 class="mb-4"><?= $translations['titpage_panitia']; ?></h3>
		<div>

			<form action="" method="post" enctype="multipart/form-data">
				<div class="table-responsive">
					<table class="table table-striped" id="tableMode">
						<tr>
							<th width="20%"><label for="id_user"><?= $translations['id_panitia']; ?></label>
							<th width="1%">:
							<th colspan="2"><b><?php echo $id_user; ?></b>
						</tr>

						<tr>
							<td height="24"><label for="nama_user"><?= $translations['nama_panitia']; ?></label>
							<td>:
							<td><input required name="nama_user" class="form-control" type="text" id="nama_user" value="<?php echo $nama_user; ?>" size="25" /></td>
						</tr>

						<tr>
							<td height="24"><label for="level"><?= $translations['level']; ?></label>
							<td>:
							<td colspan="2">
								<input type="radio" name="level" id="level" value="Admin" style="margin-right: 5px;" <?php if ($level == "Admin") {
																															echo "checked";
																														} ?> />Admin
								<input type="radio" name="level" id="level" checked="checked" value="Panitia" style="margin-right: 5px; margin-left: 10px;" <?php if ($level == "Panitia") {
																																								echo "checked";
																																							} ?> /><?= $translations['panitia']; ?>
							</td>
						</tr>

						<tr>
							<td height="24"><label for="email">E-mail</label>
							<td>:
							<td><input required name="email" type="email" class="form-control" id="email" value="<?php echo $email; ?>" size="25" />
							</td>
						</tr>

						<tr>
							<td height="24"><label for="telepon"><?= $translations['telepon']; ?></label>
							<td>:
							<td><input required name="telepon" type="number" class="form-control" id="telepon" value="<?php echo $telepon; ?>" size="25" />
							</td>
						</tr>

						<tr>
							<td height="24"><label for="username">Username</label>
							<td>:
							<td><input required name="username" type="text" class="form-control" id="username" value="<?php echo $username; ?>" size="25" />
							</td>
						</tr>

						<tr>
							<td height="24"><label for="password">Password</label>
							<td>:
							<td><input required name="password" type="password" class="form-control" id="password" value="<?php echo $password; ?>" size="25" />
							</td>
						</tr>

						<tr>
							<td height="24"><label for="status">Status</label>
							<td>:
							<td colspan="2">
								<input type="radio" name="status" id="status" checked="checked" value="Aktif" style="margin-right: 5px;" <?php if ($status == "Aktif") {
																																				echo "checked";
																																			} ?> /><?= $translations['aktif']; ?>
								<input type="radio" name="status" id="status" value=" Tidak Aktif" style="margin-right: 5px; margin-left: 10px;" <?php if ($status == " Tidak Aktif") {
																																						echo "checked";
																																					} ?> /><?= $translations['nonaktif']; ?>
							</td>
						</tr>

						<tr>
							<td height="24"><label for="keterangan"><?= $translations['keterangan']; ?></label>
							<td>:
							<td>
								<textarea name="keterangan" class="form-control" cols="55" rows="2"><?php echo $keterangan; ?></textarea>
							</td>
						</tr>

						<tr class="float-right">
							<td>
							<td>
							<td colspan="2" class="float-right d-flex justify-content-end gap-2"><input name="Simpan" type="submit" id="Simpan" value="<?= $translations['simpan']; ?>" class="btn btn-primary" />
								<input name="pro" type="hidden" id="pro" value="<?php echo $pro; ?>" />
								<input name="id_user" type="hidden" id="id_user" value="<?php echo $id_user; ?>" />
								<input name="id_user0" type="hidden" id="id_user0" value="<?php echo $id_user0; ?>" />
								<a href="?mnu=id_user"><input name="Batal" type="button" id="Batal" value="<?= $translations['batal']; ?>" class="btn btn-danger" /></a>
							</td>
						</tr>
					</table>
				</div>
			</form>
			<br />
		</div>

		<?php
		$sqlc = "select distinct(`status`) from `$tbuser` order by `status` desc";
		$jumc = getJum($conn, $sqlc);
		if ($jumc < 1) {
			echo "<h1>Maaf, data Pengguna belum tersedia</h1>";
		}
		$arrc = getData($conn, $sqlc);
		foreach ($arrc as $dc) {
			$status = $dc["status"];
		?>
			<h3><?= $translations['data_panitia']; ?> (<?php echo $status ?>) :</h3>
			<div>

				| <img src='ypathicon/print.png' title='PRINT' OnClick="PRINT('<?php echo $status; ?>')"> |
				<br>

				<div class="table-responsive">
					<table class="table table-striped" id="tableMode">
						<tr>
							<th width="3%">No</td>
							<th width="10%"><?= $translations['id_panitia']; ?></td>
							<th width="10%"><?= $translations['nama_panitia']; ?></td>
							<th width="10%"><?= $translations['level']; ?></td>
							<th width="10%">E-mail</td>
							<th width="10%"><?= $translations['telepon']; ?></td>
							<th width="10%"><?= $translations['keterangan']; ?></td>
							<th width="5%"><?= $translations['aksi']; ?></td>
						</tr>
						<?php
						$sql = "select * from `$tbuser` where  `status`='$status' order by `id_user` desc";
						$jum = getJum($conn, $sql);
						if ($jum > 0) {
							$no = 1;
							$arr = getData($conn, $sql);
							foreach ($arr as $d) {
								$id_user = $d["id_user"];
								$nama_user = $d["nama_user"];
								$level = $d["level"];
								$email = $d["email"];
								$telepon = $d["telepon"];
								$username = $d["username"];
								$password = $d["password"];
								$status = $d["status"];
								$keterangan = $d["keterangan"];


								$color = "#dddddd";
								if ($no % 2 == 0) {
									$color = "#eeeeee";
								}
								echo "<tr bgcolor='$color'>
				<td>$no</td>
				<td>$id_user</td>
				<td>$nama_user</td>
				<td>$level</td>
				<td><a href='mailto:$email'>$email</a></td>
				<td>$telepon</td>
				<td>$keterangan</td>
				<td><div align='center'>
					<a href='?mnu=user&pro=ubah&kode=$id_user'><img src='ypathicon/ub.png' title='ubah'></a>
					<a href='?mnu=user&pro=hapus&kode=$id_user&nama_user=$nama_user'><img src='ypathicon/ha.png' title='hapus' 
					onClick='return confirm(\"Apakah Anda benar-benar akan menghapus data \"$nama_user\" pada data id_user ?..\")'></a></div></td>
				</tr>";

								$no++;
							} //for dalam
						} //if
						else {
							echo "<tr><td colspan='6'><blink>Maaf, Data User belum tersedia...</blink></td></tr>";
						}
						?>
					</table>
				</div>

			<?php
			$jmldata = $jum;
			echo "<p align=center>Total data <b>$jmldata</b> item</p>";

			echo "</div>";
		} //for atas
			?>

			</div>

			<?php
			if (isset($_POST["Simpan"])) {
				$pro = strip_tags($_POST["pro"]);

				$nama_user = strip_tags($_POST["nama_user"]);
				$email = strip_tags($_POST["email"]);
				$telepon = strip_tags($_POST["telepon"]);
				$username = strip_tags($_POST["username"]);
				$password = strip_tags($_POST["password"]);
				$level = strip_tags($_POST["level"]);
				$status = strip_tags($_POST["status"]);
				$keterangan = strip_tags($_POST["keterangan"]);

				if ($pro == "simpan") {
					$sql = "INSERT INTO `$tbuser` (
					`nama_user` ,
					`level` ,
					`email` ,
					`telepon` ,
					`username` ,
					`password` ,
					`status` ,
					`keterangan`
				) VALUES (
					'$nama_user',
					'$level',
					'$email',
					'$telepon',
					'$username',
					'$password',
					'$status',
					'$keterangan'
				)";

					$simpan = process($conn, $sql);
					if ($simpan) {
						echo "<script>alert('Data \"$nama_user\" berhasil disimpan !');document.location.href='?mnu=user';</script>";
					} else {
						echo "<script>alert('Data \"$nama_user\" gagal disimpan...');document.location.href='?mnu=user';</script>";
					}
				} else {
					$sql = "update `$tbuser` SET 
				`nama_user`='$nama_user',
				`email`='$email' ,
				`telepon`='$telepon',
				`username`='$username',
				`password`='$password',
				`level`='$level',
				`status`='$status',
				`keterangan`='$keterangan'
				where `id_user`='$id_user0'";
					$ubah = process($conn, $sql);
					if ($ubah) {
						echo "<script>alert('Data \"$nama_user\" berhasil diubah !');document.location.href='?mnu=user';</script>";
					} else {
						echo "<script>alert('Data \"$nama_user\" gagal diubah...');document.location.href='?mnu=user';</script>";
					}
				} //else simpan
			}
			?>

			<?php
			if (isset($_GET["pro"]) && $_GET["pro"] == "hapus") {
				$id_user = $_GET["kode"];
				$nama_user = $_GET["nama_user"];
				$sql = "delete from `$tbuser` where `id_user`='$id_user'";
				$hapus = process($conn, $sql);
				if ($hapus) {
					echo "<script>alert('Data \"$nama_user\" berhasil dihapus !');document.location.href='?mnu=user';</script>";
				} else {
					echo "<script>alert('Data \"$nama_user\" gagal dihapus...');document.location.href='?mnu=user';</script>";
				}
			}
			?>

	</div>
</div>