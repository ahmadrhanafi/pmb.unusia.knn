<?php
$pro = "simpan";
$gambar0 = "avatar.jpg";
//$PATH="ypathcss";

$autoloadPath = __DIR__ . '/../vendor/autoload.php';
if (!file_exists($autoloadPath)) {
	die("ERROR: vendor/autoload.php tidak ditemukan. Jalankan 'composer require phpoffice/phpspreadsheet' di folder project.");
}

require $autoloadPath;
?>

<script type="text/javascript">
	function PRINT(pk) {
		win = window.open('pmb/pmb_print.php?pk=' + pk, 'win', 'width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, id_pmb=0');
	}
</script>
<script language="JavaScript">
	function buka(url) {
		window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');
	}
</script>

<?php

$id_tahun = "";
$minat_jurusan = "";
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
$kategori = "";
$keterangan = "";


if (isset($_GET["pro"]) && $_GET["pro"] == "ubah") {
	$id_pmb = $_GET["kode"];
	$sql = "select * from `$tbpmb` where `id_pmb`='$id_pmb'";
	$d = getField($conn, $sql);
	$id_pmb = $d["id_pmb"];
	$id_pmb0 = $d["id_pmb"];
	$id_tahun = $d["id_tahun"];
	$minat_jurusan = $d["minat_jurusan"];
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
		<h3 class="mb-4">Masukan Data PMB</h3>

		<form name="import_export_form" method="post" action="" enctype="multipart/form-data">
			<div class="table-responsive">
				<table class="table table-responsive" id="tableMode">
					<tr>
						<td colspan="7">
							<label for="import" class="mt-2">Import File Excel Data Latih</label>
						<td><input type="file" class="form-control" name="excelfile" required />
					</tr>
					<tr>
						<td colspan="7">
						<td class="d-flex justify-content-end">
							<input type="submit" id="import" class="btn btn-primary me-2" value="IMPORT" name="IMPORT" />
							<a href="downloadget.php?nf=data_latih.xls">
								<input type="button" id="download" class="btn btn-danger" value="DOWNLOAD" name="DOWNLOAD" />
							</a>
						</td>
						</td>
					</tr>
				</table>
			</div>
		</form>


		<?php

		?>

		<form action="" method="post" enctype="multipart/form-data">
			<div class="table-responsive">
				<table class="table table-striped">
					<tr>
						<td>
							<label for="id_tahun">Pilih Tahun</label>
						<td>:
						<td colspan="5">
							<select name="id_tahun" class="form-control" id="tahun">
								<option value="">-- Pilih Tahun --</option>
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
						<td valign="top"><label for="minat_jurusan">Minat Jurusan</label>
						<td valign="top">:
						<td colspan="7">
							<select name="minat_jurusan" class="form-control" id="minat_jurusan">
								<option value="-">-- Pilih Jurusan --</option>
								<optgroup label="Program S1">
									<option value="S1 - Akuntansi" <?php if ($minat_jurusan == "S1 - Akuntansi") {
																		echo "selected";
																	} ?>>S1 - Akuntansi</option>
									<option value="S1 - Ekonomi Syariah" <?php if ($minat_jurusan == "S1 - Ekonomi Syariah") {
																				echo "selected";
																			} ?>>S1 - Ekonomi Syariah</option>
									<option value="S1 - Hukum Keluarga" <?php if ($minat_jurusan == "S1 - Hukum Keluarga") {
																			echo "selected";
																		} ?>>S1 - Hukum Keluarga</option>
									<option value="S1 - Ilmu Hukum" <?php if ($minat_jurusan == "S1 - Ilmu Hukum") {
																		echo "selected";
																	} ?>>S1 - Ilmu Hukum</option>
									<option value="S1 - Pendidikan Agama Islam" <?php if ($minat_jurusan == "S1 - Pendidikan Agama Islam") {
																					echo "selected";
																				} ?>>S1 - Pendidikan Agama Islam</option>
									<option value="S1 - Pendidikan Anak Usia Dini" <?php if ($minat_jurusan == "S1 - Pendidikan Anak Usia Dini") {
																						echo "selected";
																					} ?>>S1 - Pendidikan Anak Usia Dini</option>
									<option value="S1 - Pendidikan Guru Madrasah Ibtidaiyah" <?php if ($minat_jurusan == "S1 - Pendidikan Guru Madrasah Ibtidaiyah") {
																									echo "selected";
																								} ?>>S1 - Pendidikan Guru Madrasah Ibtidaiyah</option>
									<option value="S1 - Pendidikan Bahasa Inggris" <?php if ($minat_jurusan == "S1 - Pendidikan Bahasa Inggris") {
																						echo "selected";
																					} ?>>S1 - Pendidikan Bahasa Inggris</option>
									<option value="S1 - Psikologi" <?php if ($minat_jurusan == "S1 - Psikologi") {
																		echo "selected";
																	} ?>>S1 - Psikologi</option>
									<option value="S1 - Sejarah Peradaban Islam" <?php if ($minat_jurusan == "S1 - Sejarah Peradaban Islam") {
																						echo "selected";
																					} ?>>S1 - Sejarah Peradaban Islam</option>
									<option value="S1 - Sistem Informasi" <?php if ($minat_jurusan == "S1 - Sistem Informasi") {
																				echo "selected";
																			} ?>>S1 - Sistem Informasi</option>
									<option value="S1 - Sosiologi" <?php if ($minat_jurusan == "S1 - Sosiologi") {
																		echo "selected";
																	} ?>>S1 - Sosiologi</option>
									<option value="S1 - Teknik Informatika" <?php if ($minat_jurusan == "S1 - Teknik Informatika") {
																				echo "selected";
																			} ?>>S1 - Teknik Informatika</option>
									<option value="S1 - Teknologi Agroindustri" <?php if ($minat_jurusan == "S1 - Teknologi Agroindustri") {
																					echo "selected";
																				} ?>>S1 - Teknologi Agroindustri</option>
								</optgroup>

								<optgroup label="Program S2">
									<option value="S2 - Pendidikan Agama Islam (S2)" <?php if ($minat_jurusan == "S2 - Pendidikan Agama Islam (S2)") {
																							echo "selected";
																						} ?>>S2 - Pendidikan Agama Islam (S2)</option>
									<option value="S2 - Sejarah Peradaban Islam (S2)" <?php if ($minat_jurusan == "S2 - Sejarah Peradaban Islam (S2)") {
																							echo "selected";
																						} ?>>S2 - Sejarah Peradaban Islam (S2)</option>
								</optgroup>

								<optgroup label="Program S3">
									<option value="S3 - Sejarah Peradaban Islam (S3)" <?php if ($minat_jurusan == "S3 - Sejarah Peradaban Islam (S3)") {
																							echo "selected";
																						} ?>>S3 - Sejarah Peradaban Islam (S3)</option>
								</optgroup>
							</select>
						</td>
					</tr>

					<tr>
						<td width="10"><label for="jalur_pendaftaran"><?php echo $kp1; ?></label>
						<td width="1">:
						<td width="39"><input required name="jalur_pendaftaran" type="number" class="form-control" id="jalur_pendaftaran" value="<?php echo $jalur_pendaftaran; ?>" size="25" />
						</td>

						<td width="10"><label for="gelombang"><?php echo $kp2; ?></label>
						<td width="1">:
						<td width="39"><input required name="gelombang" type="number" class="form-control" id="gelombang" value="<?php echo $gelombang; ?>" size="25" />
						</td>
					</tr>

					<tr>
						<td><label for="sistem_kuliah"><?php echo $kp3; ?></label>
						<td>:
						<td><input required name="sistem_kuliah" type="number" class="form-control" id="sistem_kuliah" value="<?php echo $sistem_kuliah; ?>" size="25" />
						</td>
						<td><label for="jenis_kelamin"><?php echo $kp4; ?></label>
						<td>:
						<td><input required name="jenis_kelamin" type="number" class="form-control" id="jenis_kelamin" value="<?php echo $jenis_kelamin; ?>" size="25" />
						</td>
					</tr>

					<tr>
						<td><label for="nilai_lulusan"><?php echo $kp5; ?></label>
						<td>:
						<td><input required name="nilai_lulusan" type="number" class="form-control" id="nilai_lulusan" value="<?php echo $nilai_lulusan; ?>" size="25" />
						</td>
						<td><label for="tahun_lulus"><?php echo $kp6; ?></label>
						<td>:
						<td><input required name="tahun_lulus" type="number" class="form-control" id="tahun_lulus" value="<?php echo $tahun_lulus; ?>" size="25" />
						</td>
					</tr>

					<tr>
						<td><label for="jenjang_pendidikan"><?php echo $kp7; ?></label>
						<td>:
						<td><input required name="jenjang_pendidikan" type="number" class="form-control" id="jenjang_pendidikan" value="<?php echo $jenjang_pendidikan; ?>" size="25" />
						</td>
						<td><label for="jurusan_sekolah"><?php echo $kp8; ?></label>
						<td>:
						<td><input required name="jurusan_sekolah" type="number" class="form-control" id="jurusan_sekolah" value="<?php echo $jurusan_sekolah; ?>" size="25" />
						</td>
					</tr>

					<tr>
						<td><label for="tanggal_daftar"><?php echo $kp9; ?></label>
						<td>:
						<td><input required name="tanggal_daftar" type="number" class="form-control" id="tanggal_daftar" value="<?php echo $tanggal_daftar; ?>" size="25" />
						</td>
						<td><label for="prodi_diterima"><?php echo $kp10; ?></label>
						<td>:
						<td><input required name="prodi_diterima" type="number" class="form-control" id="prodi_diterima" value="<?php echo $prodi_diterima; ?>" size="25" />
						</td>
					</tr>

					<tr>
						<td><label for="jenis_institusi"><?php echo $kp11; ?></label>
						<td>:
						<td><input required name="jenis_institusi" type="number" class="form-control" id="jenis_institusi" value="<?php echo $jenis_institusi; ?>" size="25" />
						</td>
						<td><label for="provinsi_institusi"><?php echo $kp12; ?></label>
						<td>:
						<td><input required name="provinsi_institusi" type="number" class="form-control" id="provinsi_institusi" value="<?php echo $provinsi_institusi; ?>" size="25" />
						</td>
					</tr>

					<tr>
						<td><label for="kategori">Kategori</label>
						<td>:
						<td colspan="5">
							<input type="radio" name="kategori" id="kategori" checked="checked" value="rendah" style="margin-right: 5px;" <?php if ($kategori == "rendah") {
																																				echo "checked";
																																			} ?> />Rendah
							<input type="radio" name="kategori" id="kategori" value="Sedang" style="margin-right: 5px; margin-left: 10px;" <?php if ($kategori == "Sedang") {
																																				echo "checked";
																																			} ?> />Sedang
							<input type="radio" name="kategori" id="kategori" value="tinggi" style="margin-right: 5px; margin-left: 10px;" <?php if ($kategori == "tinggi") {
																																				echo "checked";
																																			} ?> />Tinggi
						</td>
					</tr>

					<tr>
						<td>
							<label for="keterangan">Keterangan</label>
						<td>:
						<td colspan="5">
							<input name="keterangan" type="text" class="form-control" id="keterangan" value="<?php echo $keterangan; ?>" />
						</td>
					</tr>

					<tr>
						<td>
						<td>
						<td>
						<td>
						<td>
						<td colspan="5" class="d-flex justify-content-end gap-2">
							<input name="Simpan" type="submit" class="btn btn-primary" id="Simpan" value="Simpan" />
							<input name="pro" type="hidden" id="pro" value="<?php echo $pro; ?>" />

							<input name="id_pmb" type="hidden" id="id_pmb" value="<?php echo $id_pmb; ?>" />
							<input name="id_pmb0" type="hidden" id="id_pmb0" value="<?php echo $id_pmb0; ?>" />
							<a href="?mnu=id_pmb"><input name="Batal" class="btn btn-danger" type="button" id="Batal" value="Batal" /></a>
						</td>
					</tr>
				</table>
			</div>
		</form>
	</div>
</div>

<?php
$sqlc = "select distinct(`id_tahun`) from `$tbpmb` order by `id_tahun` asc";
$jumc = getJum($conn, $sqlc);
if ($jumc < 1) {
	echo "<h1>Maaf data PMB belum tersedia</h1>";
}
$arrc = getData($conn, $sqlc);
foreach ($arrc as $dc) {
	$id_tahun = $dc["id_tahun"];
?>

	<div class="container mt-4">
		<div id="accordion">
			<h3>Data PMB Berdasarkan Tahun : <?php echo getTahun($conn, $id_tahun) . "$id_tahun" ?></h3>

			| <img src='ypathicon/print.png' title='PRINT' OnClick="PRINT()"> |
			<br>

			<div class="table-responsive">
				<table class="table table-striped">
					<tr bgcolor="#cccccc">
						<th width="3%">No</td>
						<th width="15%">Minat Jurusan</td>
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
						<th width="5%">Jumlah</td>
						<th width="15%">Kategori</td>
						<th width="10%">Aksi</td>
					</tr>
					<?php
					$sql = "select * from `$tbpmb` where  `id_tahun`='$id_tahun' order by `kategori` asc";
					$jum = getJum($conn, $sql);
					if ($jum > 0) {
						//--------------------------------------------------------------------------------------------
						$batas   = 50;
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
							$id_pmb = $d["id_pmb"];
							$minat_jurusan = $d["minat_jurusan"];
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
							$kategori = $d["kategori"];
							$keterangan = $d["keterangan"];


							$color = "#dddddd";
							if ($no % 2 == 0) {
								$color = "#eeeeee";
							}
							echo "<tr bgcolor='$color'>
					<td>$no</td>
					<td><small>$minat_jurusan</small></td>
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
					<td>$jumlah</td>
					<td>$kategori</td>
					<td><div align='center'>
						<a href='?mnu=pmb&pro=ubah&kode=$id_pmb'><img src='ypathicon/ub.png' title='ubah'></a>
						<a href='?mnu=pmb&pro=hapus&kode=$id_pmb&id_tahun=$id_tahun'><img src='ypathicon/ha.png' title='hapus' 
						onClick='return confirm(\"Apakah Anda benar-benar akan menghapus data \"$id_tahun\" pada data id_pmb ?..\")'></a></div></td>
					</tr>";

							$no++;
						} //for dalam
					} //if
					else {
						echo "<tr><td colspan='6'><blink>Maaf, data PMB belum tersedia...</blink></td></tr>";
					}
					?>
				</table>
			</div>
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
			echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=pmb'>« Prev</a></span> ";
		} else {
			echo "<span class=disabled>« Prev</span> ";
		}

		for ($i = 1; $i <= $jmlhal; $i++)
			if ($i != $page) {
				echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=pmb'>$i</a> ";
			} else {
				echo " <span class=current>$i</span> ";
			}

		if ($page < $jmlhal) {
			$next = $page + 1;
			echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=pmb'>Next »</a></span>";
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

	<?php

	use PhpOffice\PhpSpreadsheet\IOFactory;

	if (isset($_POST['IMPORT'])) {
		$sql = "TRUNCATE `$tbpmb`";
		$hapus = process($conn, $sql);

		// ambil file upload
		$filename = $_FILES['excelfile']['tmp_name'];
		$originalName = $_FILES['excelfile']['name'];
		$ext = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

		if ($ext === 'xls') {
			// === MODE XLS (Excel lama, 97-2003) ===
			require_once 'Excel/reader.php';

			if (!class_exists('Spreadsheet_Excel_Reader')) {
				die("Class Spreadsheet_Excel_Reader tidak ditemukan. Cek file reader.php");
			}

			$data = new Spreadsheet_Excel_Reader();
			$data->setOutputEncoding('CP1251');
			$data->read($filename);

			$jumSheet = count($data->sheets);
			for ($k = 0; $k < $jumSheet; $k++) {
				$tahun = $data->sheets[$k]["cells"][1][1];
				$id_tahun = getITahun($conn, $tahun);

				for ($x = 6; $x < count($data->sheets[$k]["cells"]); $x++) {
					$minat_jurusan      = $data->sheets[$k]["cells"][$x][2] ?? '';
					$jalur_pendaftaran  = $data->sheets[$k]["cells"][$x][3] ?? 0;
					$gelombang          = $data->sheets[$k]["cells"][$x][4] ?? 0;
					$sistem_kuliah      = $data->sheets[$k]["cells"][$x][5] ?? 0;
					$jenis_kelamin      = $data->sheets[$k]["cells"][$x][6] ?? 0;
					$nilai_lulusan      = $data->sheets[$k]["cells"][$x][7] ?? 0;
					$tahun_lulus        = $data->sheets[$k]["cells"][$x][8] ?? 0;
					$jenjang_pendidikan = $data->sheets[$k]["cells"][$x][11] ?? '';
					$jurusan_sekolah    = $data->sheets[$k]["cells"][$x][12] ?? '';
					$tanggal_daftar     = $data->sheets[$k]["cells"][$x][13] ?? '';
					$prodi_diterima     = $data->sheets[$k]["cells"][$x][14] ?? '';
					$jenis_institusi    = $data->sheets[$k]["cells"][$x][10] ?? '';
					$provinsi_institusi = $data->sheets[$k]["cells"][$x][9] ?? '';
					$kategori           = strtolower($data->sheets[$k]["cells"][$x][15] ?? '');
					$keterangan         = ($data->sheets[$k]["cells"][$x][16] ?? '') . "-$tahun";

					$jumlah = $jalur_pendaftaran + $gelombang + $sistem_kuliah +
						$jenis_kelamin + $nilai_lulusan + $tahun_lulus;

					$sql = "INSERT INTO `$tbpmb`
                        (id_tahun, minat_jurusan, jalur_pendaftaran, gelombang, sistem_kuliah,
                         jenis_kelamin, nilai_lulusan, tahun_lulus, provinsi_institusi, jenis_institusi,
                         jenjang_pendidikan, jurusan_sekolah, tanggal_daftar, prodi_diterima, jumlah, kategori, keterangan)
                        VALUES
                        ('$id_tahun','$minat_jurusan','$jalur_pendaftaran','$gelombang','$sistem_kuliah',
                         '$jenis_kelamin','$nilai_lulusan','$tahun_lulus','$provinsi_institusi','$jenis_institusi',
                         '$jenjang_pendidikan','$jurusan_sekolah','$tanggal_daftar','$prodi_diteirma',
                         '$jumlah','$kategori','$keterangan')";
					process($conn, $sql);
				}
			}
			echo "<script>alert('✅ Import XLS berhasil');document.location.href='?mnu=pmb';</script>";
		} elseif ($ext === 'xlsx') {
			// === MODE XLSX (Excel modern) ===
			require 'vendor/autoload.php';

			$spreadsheet = IOFactory::load($filename);
			$sheet = $spreadsheet->getActiveSheet();
			$rows = $sheet->toArray();

			$tahun = $rows[0][0] ?? '';
			$id_tahun = getITahun($conn, $tahun);

			for ($x = 5; $x < count($rows); $x++) {
				$minat_jurusan      = $rows[$x][1] ?? '';
				$jalur_pendaftaran  = $rows[$x][2] ?? 0;
				$gelombang          = $rows[$x][3] ?? 0;
				$sistem_kuliah      = $rows[$x][4] ?? 0;
				$jenis_kelamin      = $rows[$x][5] ?? 0;
				$nilai_lulusan      = $rows[$x][6] ?? 0;
				$tahun_lulus        = $rows[$x][7] ?? 0;
				$jenjang_pendidikan = $rows[$x][10] ?? '';
				$jurusan_sekolah    = $rows[$x][11] ?? '';
				$tanggal_daftar     = $rows[$x][12] ?? '';
				$prodi_diterima     = $rows[$x][13] ?? '';
				$jenis_institusi     = $rows[$x][9] ?? '';
				$provinsi_institusi = $rows[$x][8] ?? '';
				$kategori           = strtolower($rows[$x][14] ?? '');
				$keterangan         = ($rows[$x][15] ?? '') . "-$tahun";

				$jumlah = $jalur_pendaftaran + $gelombang + $sistem_kuliah +
					$jenis_kelamin + $nilai_lulusan + $tahun_lulus;

				$sql = "INSERT INTO `$tbpmb`
                    (id_tahun, minat_jurusan, jalur_pendaftaran, gelombang, sistem_kuliah,
                     jenis_kelamin, nilai_lulusan, tahun_lulus, provinsi_institusi, jenis_institusi,
                     jenjang_pendidikan, jurusan_sekolah, tanggal_daftar, prodi_diterima, jumlah, kategori, keterangan)
                    VALUES
                    ('$id_tahun','$minat_jurusan','$jalur_pendaftaran','$gelombang','$sistem_kuliah',
                     '$jenis_kelamin','$nilai_lulusan','$tahun_lulus','$provinsi_institusi','$jenis_institusi',
                     '$jenjang_pendidikan','$jurusan_sekolah','$tanggal_daftar','$prodi_diterima',
                     '$jumlah','$kategori','$keterangan')";
				process($conn, $sql);
			}
			echo "<script>alert('✅ Import XLSX berhasil');document.location.href='?mnu=pmb';</script>";
		} else {
			echo "<script>alert('❌ Format file tidak didukung (hanya .xls atau .xlsx)');</script>";
		}
	}
	?>

	<?php
	// Import Data PMB Satuan dari Excel
	if (isset($_POST["IMPORTSATUAN"])) {
		$k = 0; // sheet pertama
		$x = intval($_POST["row"]); // baris data Excel yang dipilih

		$id_tahun           = trim($_POST["id_tahun"]); // varchar
		$minat_jurusan      = trim($data->sheets[$k]["cells"][$x][2]);
		$jalur_pendaftaran  = intval($data->sheets[$k]["cells"][$x][3]);
		$gelombang          = intval($data->sheets[$k]["cells"][$x][4]);
		$sistem_kuliah      = intval($data->sheets[$k]["cells"][$x][5]);
		$jenis_kelamin      = intval($data->sheets[$k]["cells"][$x][6]);
		$nilai_lulusan      = intval($data->sheets[$k]["cells"][$x][7]);
		$tahun_lulus        = intval($data->sheets[$k]["cells"][$x][8]);
		$jenjang_pendidikan = intval($data->sheets[$k]["cells"][$x][11]);
		$jurusan_sekolah    = intval($data->sheets[$k]["cells"][$x][12]);
		$tanggal_daftar     = intval($data->sheets[$k]["cells"][$x][13]);
		$prodi_diterima     = intval($data->sheets[$k]["cells"][$x][14]);
		$kota_institusi     = intval($data->sheets[$k]["cells"][$x][10]);
		$provinsi_institusi = intval($data->sheets[$k]["cells"][$x][9]);

		$kategori   = strtolower(trim($data->sheets[$k]["cells"][$x][15]));
		$keterangan = trim($data->sheets[$k]["cells"][$x][16]) . "-$tahun";

		$jumlah = $jalur_pendaftaran + $gelombang + $sistem_kuliah +
			$jenis_kelamin + $nilai_lulusan + $tahun_lulus +
			$provinsi_institusi + $jenis_institusi + $jenjang_pendidikan +
			$jurusan_sekolah + $tanggal_daftar + $prodi_diterima;

		$sql = "INSERT INTO tb_pmb 
        (id_tahun, minat_jurusan, jalur_pendaftaran, gelombang, sistem_kuliah,
         jenis_kelamin, nilai_lulusan, tahun_lulus, provinsi_institusi,
         jenis_institusi, jenjang_pendidikan, jurusan_sekolah, tanggal_daftar,
         prodi_diterima, jumlah, kategori, keterangan)
        VALUES (
         '$id_tahun','$minat_jurusan',$jalur_pendaftaran,$gelombang,$sistem_kuliah,
         $jenis_kelamin,$nilai_lulusan,$tahun_lulus,$provinsi_institusi,
         $jenis_institusi,$jenjang_pendidikan,$jurusan_sekolah,$tanggal_daftar,
         $prodi_diteirma,$jumlah,'$kategori','$keterangan')";

		if (process($conn, $sql)) {
			echo "<script>alert('✅ Data berhasil diimport!');document.location='index.php?mnu=pmb';</script>";
		} else {
			echo "<script>alert('❌ Gagal import data!');</script>";
		}
	}
	?>

	</div>

	<?php
	if (isset($_POST["Simpan"])) {
		$pro = $_POST["pro"];
		$id_pmb = $_POST["id_pmb"];
		$id_pmb0 = $_POST["id_pmb0"];
		$id_tahun = $_POST["id_tahun"];
		$minat_jurusan = $_POST["minat_jurusan"];
		$jalur_pendaftaran = $_POST["jalur_pendaftaran"];
		$gelombang = $_POST["gelombang"];
		$sistem_kuliah = $_POST["sistem_kuliah"];
		$jenis_kelamin = $_POST["jenis_kelamin"];
		$nilai_lulusan = $_POST["nilai_lulusan"];
		$tahun_lulus = $_POST["tahun_lulus"];
		$jenjang_pendidikan = $_POST["jenjang_pendidikan"];
		$jurusan_sekolah = $_POST["jurusan_sekolah"];
		$tanggal_daftar = $_POST["tanggal_daftar"];
		$prodi_diterima = $_POST["prodi_diterima"];
		$jenis_institusi = $_POST["jenis_institusi"];
		$provinsi_institusi = $_POST["provinsi_institusi"];
		$kategori = $_POST["kategori"];

		$jumlah = $jalur_pendaftaran + $gelombang + $sistem_kuliah +
			$jenis_kelamin + $nilai_lulusan + $tahun_lulus +
			$provinsi_institusi + $jenis_institusi + $jenjang_pendidikan +
			$jurusan_sekolah + $tanggal_daftar + $prodi_diterima;

		if ($pro == "simpan") {
			$sql = "INSERT INTO tb_pmb (id_tahun, minat_jurusan, jalur_pendaftaran, gelombang, sistem_kuliah,
             jenis_kelamin, nilai_lulusan, tahun_lulus, provinsi_institusi,
             jenis_institusi, jenjang_pendidikan, jurusan_sekolah, tanggal_daftar,
             prodi_diterima, jumlah, kategori)
            VALUES ('$id_tahun','$minat_jurusan','$jalur_pendaftaran','$gelombang','$sistem_kuliah',
             '$jenis_kelamin','$nilai_lulusan','$tahun_lulus','$provinsi_institusi',
             '$jenis_institusi','$jenjang_pendidikan','$jurusan_sekolah','$tanggal_daftar',
             '$prodi_diterima','$jumlah','$kategori')";
		} else {
			$sql = "UPDATE tb_pmb SET 
              id_tahun='$id_tahun',
              minat_jurusan='$minat_jurusan',
              jalur_pendaftaran='$jalur_pendaftaran',
              gelombang='$gelombang',
              sistem_kuliah='$sistem_kuliah',
              jenis_kelamin='$jenis_kelamin',
              nilai_lulusan='$nilai_lulusan',
              tahun_lulus='$tahun_lulus',
              jenjang_pendidikan='$jenjang_pendidikan',
              jurusan_sekolah='$jurusan_sekolah',
              tanggal_daftar='$tanggal_daftar',
              prodi_diterima='$prodi_diterima',
              jenis_institusi='$jenis_institusi',
              provinsi_institusi='$provinsi_institusi',
              jumlah='$jumlah',
              kategori='$kategori'
            WHERE id_pmb='$id_pmb0'";
		}
		process($conn, $sql);
		echo "<script>alert('Data berhasil disimpan');document.location='index.php?mnu=pmb';</script>";
	}

	?>

	<?php
	if (isset($_GET["pro"]) && $_GET["pro"] == "hapus") {
		$id_pmb = $_GET["kode"];
		$id_tahun = $_GET["id_tahun"];
		$sql = "delete from `$tbpmb` where `id_pmb`='$id_pmb'";
		$hapus = process($conn, $sql);
		if ($hapus) {
			echo "<script>alert('Data berhasil dihapus !');document.location.href='?mnu=pmb';</script>";
		} else {
			echo "<script>alert('Data gagal dihapus...');document.location.href='?mnu=pmb';</script>";
		}
	}
	?>

	</div>