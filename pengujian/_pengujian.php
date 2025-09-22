<?php

$pro = "simpan";
$gambar0 = "avatar.jpg";
//$PATH="ypathcss";
?>


<script type="text/javascript">
	function PRINT(pk) {
		win = window.open('pengujian/pengujian_print.php?pk=' + pk, 'win', 'width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, id_pengujian=0');
	}
</script>
<script language="JavaScript">
	function buka(url) {
		window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');
	}
</script>

<?php

$nama_pengujian = "";
$id_user = "";
$jalur_pendaftaran = "";
$gelombang = "";
$sistem_kuliah = "";
$jenis_kelamin = "";
$nilai_lulusan = "";
$tahun_lulus = "";
$jenjang_pendidikan = "";
$jurusan_sekolah = "";
$tanggal_daftar = "";
$prodi_diterima = "";
$jenis_institusi = "";
$provinsi_institusi = "";
$jumlah = "";
$harga_permeter = "";
$total_pembelian = "";
$rekapitulasi = "";
$kategori = "";
$keterangan = "";


if (isset($_GET["pro"]) && $_GET["pro"] == "ubah") {
	$id_pengujian = $_GET["kode"];
	$sql = "select * from `$tbpengujian` where `id_pengujian`='$id_pengujian'";
	$d = getField($conn, $sql);
	$id_pengujian = $d["id_pengujian"];
	$id_pengujian0 = $d["id_pengujian"];
	$id_tahun = $d["id_tahun"];
	$nama_pengujian = $d["nama_pengujian"];
	$id_user = $d["id_user"];
	$jalur_pendaftaran = $d["jalur_pendaftaran"];
	$gelombang = $d["gelombang"];
	$sistem_kuliah = $d["sistem_kuliah"];
	$jenis_kelamin = $d["jenis_kelamin"];
	$nilai_lulusan = $d["nilai_lulusan"];
	$tahun_lulus = $d["tahun_lulus"];
	$jenjang_pendidikan = $d["jenjang_pendidikan"];
	$jurusan_sekolah = $d["jurusan_sekolah"];
	$tanggal_daftar = $d["tanggal_daftar"];
	$prodi_diterima = $d["prodi_diterima"];
	$jenis_institusi = $d["jenis_institusi"];
	$provinsi_institusi = $d["provinsi_institusi"];
	$jumlah = $d["jumlah"];
	$rekapitulasi = $d["rekapitulasi"];
	$kategori = $d["kategori"];
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
		<h3 class="mb-4">Masukan Data Pengujian</h3>
		<div class="table-responsive">

			<form action="" method="post" enctype="multipart/form-data">
				<table class="table table-striped">

					<tr>
						<td>
							<label for="id_tahun">Pilih Tahun</label>
						<td>:
						<td colspan="5">
							<select name="id_tahun" required class="form-control" id="id_tahun">
								<option value="">-- Pilih Tahun --</option>
								<?php
								$id_tahun = isset($_GET['id_tahun']) ? $_GET['id_tahun'] : '';
								echo "<option value='$id_tahun' ";
								echo ">$id_tahun</option>";

								$sql = "select * from `$tbtahun`";
								$arr = getData($conn, $sql);
								foreach ($arr as $d) {
									$id_tahun0 = $d["id_tahun"];
									$nama_tahun = $d["nama_tahun"];
									echo "<option value='$id_tahun0' ";
									if ($id_tahun0 == $id_tahun) {
										echo "selected";
									}
									echo ">$nama_tahun ($id_tahun0)</option>";
								}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td><label for="nama_pengujian">Nama Pengujian</label>
						<td>:
						<td colspan="5"><input required name="nama_pengujian" type="text" class="form-control" id="nama_pengujian" value="<?php echo $nama_pengujian; ?>" size="25" /></td>
					</tr>

					<tr>
						<td height="24"><label for="jalur_pendaftaran"><?php echo $kp1; ?></label>
						<td>:
						<td><input required name="jalur_pendaftaran" type="text" class="form-control" id="jalur_pendaftaran" value="<?php echo $jalur_pendaftaran; ?>" size="25" />
						</td>
						<td height="24"><label for="gelombang"><?php echo $kp2; ?></label>
						<td>:
						<td><input required name="gelombang" type="text" class="form-control" id="gelombang" value="<?php echo $gelombang; ?>" size="25" />
						</td>
					</tr>

					<tr>
						<td height="24"><label for="sistem_kuliah"><?php echo $kp3; ?></label>
						<td>:
						<td><input required name="sistem_kuliah" type="text" class="form-control" id="sistem_kuliah" value="<?php echo $sistem_kuliah; ?>" size="25" />
						</td>
						<td height="24"><label for="jenis_kelamin"><?php echo $kp4; ?></label>
						<td>:
						<td><input required name="jenis_kelamin" type="text" class="form-control" id="jenis_kelamin" value="<?php echo $jenis_kelamin; ?>" size="25" />
						</td>
					</tr>

					<tr>
						<td height="24"><label for="nilai_lulusan"><?php echo $kp5; ?></label>
						<td>:
						<td><input required name="nilai_lulusan" type="text" class="form-control" id="nilai_lulusan" value="<?php echo $nilai_lulusan; ?>" size="25" />
						</td>
						<td height="24"><label for="tahun_lulus"><?php echo $kp6; ?></label>
						<td>:
						<td><input required name="tahun_lulus" type="text" class="form-control" id="tahun_lulus" value="<?php echo $tahun_lulus; ?>" size="25" />
						</td>
					</tr>

					<tr>
						<td height="24"><label for="jenjang_pendidikan"><?php echo $kp9; ?></label>
						<td>:
						<td><input required name="jenjang_pendidikan" type="text" class="form-control" id="jenjang_pendidikan" value="<?php echo $jenjang_pendidikan; ?>" size="25" />
						</td>
						<td height="24"><label for="jurusan_sekolah"><?php echo $kp10; ?></label>
						<td>:
						<td><input required name="jurusan_sekolah" type="text" class="form-control" id="jurusan_sekolah" value="<?php echo $jurusan_sekolah; ?>" size="25" />
						</td>
					</tr>

					<tr>
						<td height="24"><label for="tanggal_daftar"><?php echo $kp11; ?></label>
						<td>:
						<td><input required name="tanggal_daftar" type="text" class="form-control" id="tanggal_daftar" value="<?php echo $tanggal_daftar; ?>" size="25" />
						</td>
						<td height="24"><label for="prodi_diterima"><?php echo $kp12; ?></label>
						<td>:
						<td><input required name="prodi_diterima" type="text" class="form-control" id="prodi_diterima" value="<?php echo $prodi_diterima; ?>" size="25" />
						</td>
					</tr>

					<tr>
						<td height="24"><label for="jenis_institusi"><?php echo $kp8; ?></label>
						<td>:
						<td><input required name="jenis_institusi" type="text" class="form-control" id="jenis_institusi" value="<?php echo $jenis_institusi; ?>" size="25" />
						</td>
						<td height="24"><label for="provinsi_institusi"><?php echo $kp7; ?></label>
						<td>:
						<td><input required name="provinsi_institusi" type="text" class="form-control" id="provinsi_institusi" value="<?php echo $provinsi_institusi; ?>" size="25" />
						</td>
					</tr>

					<tr>
						<td><label for="keterangan">Keterangan</label>
						<td>:
						<td colspan="5">
							<textarea name="keterangan" class="form-control" cols="55" rows="2"><?php echo $keterangan; ?></textarea>
						</td>
					</tr>

					<tr>
						<td>
						<td>
						<td colspan="2">
							<input name="Simpan" type="submit" id="Simpan" value="Simpan" />
							<input name="pro" type="hidden" id="pro" value="<?php echo $pro; ?>" />

							<input name="id_pengujian" type="hidden" id="id_pengujian" value="<?php echo $id_pengujian; ?>" />
							<input name="id_pengujian0" type="hidden" id="id_pengujian0" value="<?php echo $id_pengujian0; ?>" />
							<a href="?mnu=pengujian"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
						</td>
					</tr>
				</table>
			</form>
			<br />
		</div>



		<?php
		$IDU = $_SESSION["cid"];
		$sqlc = "select distinct(`id_tahun`) from `$tbpengujian` where `id_user`='$IDU' order by `id_tahun` asc";
		$jumc = getJum($conn, $sqlc);
		if ($jumc < 1) {
			echo "<h1>Maaf data pengujian belum tersedia</h1>";
		}
		$arrc = getData($conn, $sqlc);
		foreach ($arrc as $dc) {
			$id_tahun = $dc["id_tahun"];
		?>
			<h3>Data Pengujian tahun <?php echo gettahun($conn, $id_tahun) . "|$id_tahun" ?>:</h3>
			<div>

				| <img src='ypathicon/print.png' title='PRINT' OnClick="PRINT('<?php echo $id_tahun; ?>')"> |
				<br>

				<div class="table-responsive">
					<table class="table table-striped">
						<tr bgcolor="#cccccc">
							<th width="3%">No</td>
							<th width="20%">Nama Pengujian</td>
							<th width="5%"><?php echo $ks1; ?></td>
							<th width="5%"><?php echo $ks2; ?></td>
							<th width="5%"><?php echo $ks3; ?></td>
							<th width="5%"><?php echo $ks4; ?></td>
							<th width="5%"><?php echo $ks5; ?></td>
							<th width="5%"><?php echo $ks6; ?></td>
							<th width="5%"><?php echo $ks7; ?></td>
							<th width="5%"><?php echo $ks8; ?></td>
							<th width="5%"><?php echo $ks9; ?></td>
							<th width="5%"><?php echo $ks10; ?></td>
							<th width="5%"><?php echo $ks11; ?></td>
							<th width="5%"><?php echo $ks12; ?></td>
							<th width="10%">Kategori</td>
							<th width="5%">Menu</td>
						</tr>

						<?php
						$sql = "select * from `$tbpengujian` where  `id_tahun`='$id_tahun' and `id_user`='$IDU'  order by `kategori` asc";
						$jum = getJum($conn, $sql);
						if ($jum > 0) {
							//--------------------------------------------------------------------------------------------
							$batas   = 10;
							$page = isset($_GET['page']) ? $_GET['page'] : '';
							if (empty($page)) {
								$posawal  = 0;
								$page = 1;
							} else {
								$posawal = ($page - 1) * $batas;
							}

							$sql2 = $sql . " LIMIT $posawal,$batas";
							$no = $posawal + 1;
							//--------------------------------------------------------------------------------------------									
							$arr = getData($conn, $sql2);
							foreach ($arr as $d) {
								$id_pengujian = $d["id_pengujian"];

								$id_user = $d["id_user"];
								$tanggal = WKTP($d["tanggal"]);
								$jam = $d["jam"];
								$nama_pengujian = $d["nama_pengujian"];
								$nama_user = getUser($conn, $d["id_user"]);
								$jalur_pendaftaran = $d["jalur_pendaftaran"];
								$gelombang = $d["gelombang"];
								$sistem_kuliah = $d["sistem_kuliah"];
								$jenis_kelamin = $d["jenis_kelamin"];
								$nilai_lulusan = $d["nilai_lulusan"];
								$tahun_lulus = $d["tahun_lulus"];
								$jenjang_pendidikan = $d["jenjang_pendidikan"];
								$jurusan_sekolah = $d["jurusan_sekolah"];
								$tanggal_daftar = $d["tanggal_daftar"];
								$prodi_diterima = $d["prodi_diterima"];
								$jenis_institusi = $d["jenis_institusi"];
								$provinsi_institusi = $d["provinsi_institusi"];
								$jumlah = $d["jumlah"];
								$rekapitulasi = $d["rekapitulasi"];
								$kategori = $d["kategori"];
								$keterangan = $d["keterangan"];

								$color = "#dddddd";
								if ($no % 2 == 0) {
									$color = "#eeeeee";
								}
								echo "<tr bgcolor='$color'>
				<td>$no</td>
				<td><small><i>$nama_pengujian, $tanggal $jam Wib</small></i></td>
				<td>$jalur_pendaftaran</td>
				<td>$gelombang</td>
				<td>$sistem_kuliah</td>
				<td>$jenis_kelamin</td>
				<td>$nilai_lulusan</td>
				<td>$tahun_lulus</td>
				<td>$jenjang_pendidikan</td>
				<td>$jurusan_sekolah</td>
				<td>$tanggal_daftar</td>
				<td>$prodi_diterima</td>
				<td>$jenis_institusi</td>
				<td>$provinsi_institusi</td>
				<td>$kategori</td>
				<td><div align='center'>
					<a href='?mnu=knn&id=$id_pengujian'><img src='ypathicon/xls.png' title='Proses KNN $nama_pengujian'></a><br>
					<a href='?mnu=pengujian&pro=ubah&kode=$id_pengujian'><img src='ypathicon/ub.png' title='ubah'></a>
					<a href='?mnu=pengujian&pro=hapus&kode=$id_pengujian&nama_pengujian=$nama_pengujian'><img src='ypathicon/ha.png' title='hapus' 
					onClick='return confirm(\"Apakah Anda benar-benar akan menghapus data \"$nama_pengujian\" pada data id_pengujian ?..\")'></a></div></td>
				</tr>";

								$no++;
							} //for dalam
						} //if
						else {
							echo "<tr><td colspan='6'><blink>Maaf, Data pengujian belum tersedia...</blink></td></tr>";
						}
						?>
					</table>
				</div>

			<?php
			$jmldata = $jum;
			if ($jmldata > 0) {
				if ($batas < 1) {
					$batas = 1;
				}
				$jmlhal  = ceil($jmldata / $batas);
				echo "<div class=paging>";
				if ($page > 1) {
					$prev = $page - 1;
					echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=pengujian'>« Prev</a></span> ";
				} else {
					echo "<span class=disabled>« Prev</span> ";
				}

				for ($i = 1; $i <= $jmlhal; $i++)
					if ($i != $page) {
						echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=pengujian'>$i</a> ";
					} else {
						echo " <span class=current>$i</span> ";
					}

				if ($page < $jmlhal) {
					$next = $page + 1;
					echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=pengujian'>Next »</a></span>";
				} else {
					echo "<span class=disabled>Next »</span>";
				}
				echo "</div>";
			} //if jmldata

			$jmldata = $jum;
			echo "<p align=center>Total data <b>$jmldata</b> item</p>";

			echo "</div>";
		} //for atas
			?>


			</div>
	</div>

	<?php
	if (isset($_POST["Simpan"])) {
		$pro = strip_tags($_POST["pro"]);
		$id_tahun = strip_tags($_POST["id_tahun"]);
		$nama_pengujian = strip_tags($_POST["nama_pengujian"]);
		$id_user = strip_tags($_SESSION["cid"]);
		$p1 = strip_tags($_POST["p1"]);
		$p2 = strip_tags($_POST["p2"]);
		$p3 = strip_tags($_POST["p3"]);
		$p4 = strip_tags($_POST["p4"]);
		$p5 = strip_tags($_POST["p5"]);
		$p7 = strip_tags($_POST["p7"]);
		$p8 = strip_tags($_POST["p8"]);
		$p9 = strip_tags($_POST["p9"]);
		$p10 = strip_tags($_POST["p10"]);
		$p11 = strip_tags($_POST["p11"]);
		$p12 = strip_tags($_POST["p12"]);
		$jumlah_persediaan = $p1 + $p2 + $p3 + $p4 + $p5 + $p6 + $p7 + $p8 + $p9 + $p10 + $p11 + $p12;
		$rekapitulasi = "";
		$kategori = "";
		$keterangan = "";


		if ($pro == "simpan") {
			$sql = " INSERT INTO `$tbpengujian` (
`nama_pengujian` ,
`id_user` ,
`jalur_pendaftaran` ,
`gelombang` ,
`sistem_kuliah` ,
`jenis_kelamin` ,
`nilai_lulusan` ,
`tahun_lulus`,
`jenjang_pendidikan`,
`jurusan_sekolah`,
`tanggal_daftar`,
`prodi_diterima`,
`jenis_institusi`,
`provinsi_institusi`,
`jumlah`,
`id_tahun`,
`rekapitulasi`,
`kategori`,`tanggal`,`jam`,
`keterangan`
) VALUES (
'$nama_pengujian',
'" . $_SESSION['cid'] . "', 
'$jalur_pendaftaran',
'$gelombang',
'$sistem_kuliah',
'$jenis_kelamin',
'$nilai_lulusan',
'$tahun_lulus',
'$jenjang_pendidikan',
'$jurusan_sekolah',
'$tanggal_daftar',
'$prodi_diterima',
'$jenis_institusi',
'$provinsi_institusi',
'$jumlah',
'$id_tahun',
'',
'','" . date("Y-m-d") . "','" . date("H:i:s") . "',
'$keterangan'
)";

			$simpan = process($conn, $sql);
			if ($simpan) {

				$sql = "select `id_pengujian` from `$tbpengujian` order by `id_pengujian` desc";
				$d = getField($conn, $sql);
				$id_pengujian = $d["id_pengujian"];

				echo "<script>alert('Data \"$nama_pengujian\" berhasil disimpan !');document.location.href='?mnu=knn&id=$id_pengujian';</script>";
			} else {
				echo "<script>alert('Data \"$nama_pengujian\" gagal disimpan...');document.location.href='?mnu=pengujian';</script>";
			}
		} else {
			$id_pengujian = strip_tags($_POST["id_pengujian"]);
			$id_pengujian0 = strip_tags($_POST["id_pengujian0"]);

			$sql = "update `$tbpengujian` set 
	`nama_pengujian`='$nama_pengujian',
	`nama_pengujian`='$nama_pengujian',
	`jalur_pendaftaran`='$jalur_pendaftaran' ,
	`gelombang`='$gelombang',
	`sistem_kuliah`='$sistem_kuliah',
	`jenis_kelamin`='$jenis_kelamin',
	`nilai_lulusan`='$nilai_lulusan',
	`tahun_lulus`='$tahun_lulus',
	`jenjang_pendidikan`='$jenjang_pendidikan',
	`jurusan_sekolah`='$jurusan_sekolah',
	`tanggal_daftar`='$tanggal_daftar',
	`prodi_diterima`='$prodi_diterima',
	`jenis_institusi`='$jenis_institusi',
	`provinsi_institusi`='$provinsi_institusi',
	`jumlah`='$jumlah',
	`keterangan`='$keterangan'
	 where `id_pengujian`='$id_pengujian0'";
			$ubah = process($conn, $sql);
			if ($ubah) {
				echo "<script>alert('Data berhasil diubah !');document.location.href='?mnu=knn&id=$id_pengujian';</script>";
			} else {
				echo "<script>alert('Data  gagal diubah...');document.location.href='?mnu=pengujian';</script>";
			}
		} //else simpan
	}
	?>

	<?php
	if (isset($_GET["pro"]) && $_GET["pro"] == "hapus") {
		$id_pengujian = $_GET["kode"];
		$nama_pengujian = $_GET["nama_pengujian"];
		$sql = "delete from `$tbpengujian` where `id_pengujian`='$id_pengujian'";
		$hapus = process($conn, $sql);
		if ($hapus) {
			echo "<script>alert('Data berhasil dihapus !');document.location.href='?mnu=pengujian';</script>";
		} else {
			echo "<script>alert('Data gagal dihapus...');document.location.href='?mnu=pengujian';</script>";
		}
	}
	?>