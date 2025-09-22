<title> <?php echo $tahun_title; ?> </title>

<?php
$pro = "simpan";
$gambar0 = "avatar.jpg";
//$PATH="ypathcss";
?>


<script type="text/javascript">
	function PRINT() {
		win = window.open('tahun/tahun_print.php', 'win', 'width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, id_tahun=0');
	}
</script>
<script language="JavaScript">
	function buka(url) {
		window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');
	}
</script>

<?php
$sql = "select `id_tahun` from `$tbtahun` order by `id_tahun` desc";
$jum = getJum($conn, $sql);
$kd = "TKO";
if ($jum > 0) {
	$d = getField($conn, $sql);
	$idmax = $d['id_tahun'];
	$urut = substr($idmax, 3, 2) + 1; //01
	if ($urut < 10) {
		$idmax = "$kd" . "0" . $urut;
	} else {
		$idmax = "$kd" . $urut;
	}
} else {
	$idmax = "$kd" . "01";
}
$id_tahun = $idmax;
?>
<?php

$nama_tahun = "";
$deskripsi = "";

if (isset($_GET["pro"]) && $_GET["pro"] == "ubah") {
	$id_tahun = $_GET["kode"];
	$sql = "select * from `$tbtahun` where `id_tahun`='$id_tahun'";
	$d = getField($conn, $sql);
	$id_tahun = $d["id_tahun"];
	$id_tahun0 = $d["id_tahun"];
	$nama_tahun = $d["nama_tahun"];
	$deskripsi = $d["deskripsi"];
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
		<h3 class="mb-4"><?= $translations['titpage_tahun']; ?></h3>
		<div>

			<form action="" method="post" enctype="multipart/form-data">
				<table class="table table-striped">
					<tr>
						<td>
							<label for="id_tahun"><?= $translations['pilih_tahun']; ?></label>
						<td>:
						<td colspan="5">
							<select name="id_tahun" class="form-control" id="tahun">
								<option value="">-- <?= $translations['pilih_tahun']; ?> --</option>
								<?php
								$tahunSekarang = date("Y");
								$tahunMulai = 2020;

								for ($i = $tahunSekarang; $i >= $tahunMulai; $i--) {
									echo "<option value='$i'>$i</option>";
								}
								?>
							</select>
						</td>
					</tr>


					<tr>
						<td height="24"><label for="nama_tahun"><?= $translations['nama_camaba']; ?></label>
						<td>:
						<td><input required class="form-control" name="nama_tahun" type="text" id="nama_tahun" value="<?php echo $nama_tahun; ?>" size="25" /></td>
					</tr>

					<tr>
						<td height="24"><label for="deskripsi"><?= $translations['deskripsi_tahun']; ?></label>
						<td>:
						<td>
							<textarea name="deskripsi" class="form-control" cols="55" rows="2"><?php echo $deskripsi; ?></textarea>
						</td>
					</tr>

					<tr>
						<td>
						<td>
						<td colspan="2" class="float-right d-flex justify-content-end gap-2">
							<input name="Simpan" type="submit" id="Simpan" value="<?= $translations['simpan']; ?>" class="btn btn-primary" />
							<input name="pro" type="hidden" id="pro" value="<?php echo $pro; ?>" />
							<input name="id_tahun" type="hidden" id="id_tahun" value="<?php echo $id_tahun; ?>" />
							<input name="id_tahun0" type="hidden" id="id_tahun0" value="<?php echo $id_tahun0; ?>" />
							<a href="?mnu=id_tahun"><input name="Batal" type="button" id="Batal" value="<?= $translations['batal']; ?>" class="btn btn-danger" /></a>
						</td>
					</tr>
				</table>
			</form>
			<br />
		</div>

		<h3><?= $translations['data_camaba']; ?> :</h3>
		<div>

			| <img src='ypathicon/print.png' title='PRINT' OnClick="PRINT()"> |
			<br>

			<div class="table-responsive">
				<table class="table table-striped">
					<tr bgcolor="#cccccc">
						<th width="3%">No</td>
						<th width="10%"><?= $translations['tahun']; ?></td>
						<th width="30%"><?= $translations['nama_camaba']; ?></td>
						<th width="55%"><?= $translations['deskripsi_tahun']; ?></td>
						<th width="15%"><?= $translations['aksi']; ?></td>
					</tr>
					<?php
					$sql = "select * from `$tbtahun` order by `id_tahun` desc";
					$jum = getJum($conn, $sql);
					if ($jum > 0) {
						$no = 1;
						$arr = getData($conn, $sql);
						foreach ($arr as $d) {
							$id_tahun = $d["id_tahun"];
							$nama_tahun = $d["nama_tahun"];
							$deskripsi = $d["deskripsi"];


							$color = "#dddddd";
							if ($no % 2 == 0) {
								$color = "#eeeeee";
							}
							echo "<tr bgcolor='$color'>
				<td>$no</td>
				<td>$id_tahun</td>
				<td>$nama_tahun</td>
				<td>$deskripsi</td>
				<td><div align='center'>
					<a href='?mnu=tahun&pro=ubah&kode=$id_tahun'><img src='ypathicon/ub.png' title='ubah'></a>
					<a href='?mnu=tahun&pro=hapus&kode=$id_tahun&nama_tahun=$nama_tahun'><img src='ypathicon/ha.png' title='hapus' 
					onClick='return confirm(\"Apakah Anda benar-benar akan menghapus data \"$nama_tahun\" pada data id_tahun ?..\")'></a></div></td>
				</tr>";

							$no++;
						} //for dalam
					} //if
					else {
						echo "<tr><td colspan='6'><blink>Maaf, Data tahun belum tersedia...</blink></td></tr>";
					}
					?>
				</table>
			</div>

			<?php
			$jmldata = $jum;
			echo "<p align=center>Total data <b>$jmldata</b> item</p>";

			echo "</div>";
			?>
		</div>

		<?php
		if (isset($_POST["Simpan"])) {
			$pro = strip_tags($_POST["pro"]);
			$id_tahun = strip_tags($_POST["id_tahun"]);
			$id_tahun0 = strip_tags($_POST["id_tahun0"]);
			$nama_tahun = strip_tags($_POST["nama_tahun"]);
			$deskripsi = strip_tags($_POST["deskripsi"]);

			if ($pro == "simpan") {
				$sql = " INSERT INTO `$tbtahun` (
			`id_tahun` ,
			`nama_tahun` ,
			`deskripsi`
			) VALUES (
			'$id_tahun', 
			'$nama_tahun',
			'$deskripsi'
			)";

				$simpan = process($conn, $sql);
				if ($simpan) {
					echo "<script>alert('Data \"$nama_tahun\" berhasil disimpan !');document.location.href='?mnu=tahun';</script>";
				} else {
					echo "<script>alert('Data \"$nama_tahun\" gagal disimpan...');document.location.href='?mnu=tahun';</script>";
				}
			} else {
				$sql = "update `$tbtahun` set 
			`nama_tahun`='$nama_tahun',
			`deskripsi`='$deskripsi'
			where `id_tahun`='$id_tahun0'";
				$ubah = process($conn, $sql);
				if ($ubah) {
					echo "<script>alert('Data \"$nama_tahun\" berhasil diubah !');document.location.href='?mnu=tahun';</script>";
				} else {
					echo "<script>alert('Data \"$nama_tahun\" gagal diubah...');document.location.href='?mnu=tahun';</script>";
				}
			} //else simpan
		}
		?>

		<?php
		if (isset($_GET["pro"]) && $_GET["pro"] == "hapus") {
			$id_tahun = $_GET["kode"];
			$nama_tahun = $_GET["nama_tahun"];
			$sql = "delete from `$tbtahun` where `id_tahun`='$id_tahun'";
			$hapus = process($conn, $sql);
			if ($hapus) {
				echo "<script>alert('Data \"$nama_tahun\" berhasil dihapus !');document.location.href='?mnu=tahun';</script>";
			} else {
				echo "<script>alert('Data \"$nama_tahun\" gagal dihapus...');document.location.href='?mnu=tahun';</script>";
			}
		}
		?>

	</div>
</div>