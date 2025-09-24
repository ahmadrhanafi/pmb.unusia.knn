<?php
$k_value = 5;
$time_start = microtime(true);
$_SESSION["gab"] = "";
$hasilprint = "";
?>

<script type="text/javascript">
	function PRINTME() {
		win = window.open('knnprint.php', 'win', 'width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0');
	}
</script>


<script language="JavaScript">
	function buka(url) {
		window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');
	}
</script>

<?php

$COL1 = "jalur_pendaftaran";
$COL2 = "gelombang";
$COL3 = "sistem_kuliah";
$COL4 = "jenis_kelamin";
$COL5 = "nilai_lulusan";
$COL6 = "tahun_lulus";
$COL7 = "jenjang_pendidikan";
$COL8 = "jurusan_sekolah";
$COL9 = "tanggal_daftar";
$COL10 = "prodi_diterima";
$COL11 = "jenis_institusi";
$COL12 = "provinsi_institusi";
$CLASS = "kategori";


$sql = "select * from `$tbpengujian` order by `id_pengujian` desc";
if (isset($_GET["id"])) {
	$id_pengujian = $_GET["id"];
	$sql = "select * from `$tbpengujian` where `id_pengujian`='$id_pengujian'";
}

$d = getField($conn, $sql);
$id_pengujian = $d["id_pengujian"];
$id_tahun = $d["id_tahun"];
$nama_pengujian = $d["nama_pengujian"];
$nama_tahun = getTahun($conn, $id_tahun);
$NM = $nama_pengujian;
$IDUJI = $id_pengujian;
$id_user = $d["id_user"];
$nama_user = getUser($conn, $id_user);
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
$arUji[0] = $jalur_pendaftaran;
$arUji[1] = $gelombang;
$arUji[2] = $sistem_kuliah;
$arUji[3] = $jenis_kelamin;
$arUji[4] = $nilai_lulusan;
$arUji[5] = $tahun_lulus;
$arUji[6] = $jenjang_pendidikan;
$arUji[7] = $jurusan_ssekolah;
$arUji[8] = $tanggal_daftar;
$arUji[9] = $prodi_diterima;
$arUji[10] = $jenis_institusi;
$arUji[11] = $provinsi_institusi;


$jumlah = $d["jumlah"];
$rekapitulasi = $d["rekapitulasi"];
$kategori = $d["kategori"];
$keterangan = $d["keterangan"];
$tanggal = WKT($d["tanggal"]);
$jam = $d["jam"];

$DES = "Nama Tahun $nama_tahun";

$lap = "
$ks1: $jalur_pendaftaran,
$ks2: $gelombang,
$ks3: $sistem_kuliah,
$ks4: $jenis_kelamin,
$ks5: $nilai_lulusan,
$ks6: $tahun_lulus,
$ks7: $jenjang_pendidikan,
$ks8: $jurusan_sekolah,
$ks9: $tanggal_daftar,
$ks10: $prodi_diterima,
$ks11: $jenis_institusi,
$ks12: $provinsi_institusi";

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

<div class="container" style="margin-top: 40px;">
	<div id="accordion">
		<h3 class="mb-4">Analisa Algoritma KNN</h3>
		<hr>
		<?php
		$time_start = microtime(true);
		?>
		<div>
			<h3 class="mb-4">Analisa Data Pengujian</h3>
			<div class="table-responsive">
				<table class="table table-bordered" style="font-size: 12px; width: auto;">

					<th width="30%"><label for="id_user">ID pengujian</label>
					<th width="1%">:
					<th colspan="2"><?php echo $id_pengujian; ?></tr>

						<tr>
							<td height="24"><label for="nama">Nama pengujian</label>
							<td>:
							<td><?php echo $NM . " <i></i>"; ?>
							</td>
						</tr>

						<tr>
							<td height="24"><label for="deskripsi">Deskripsi</label>
							<td>:
							<td><?php echo $DES; ?>
							</td>
						</tr>

						<tr>
							<td height="24"><label for="deskripsi">PJ Bimbingan</label>
							<td>:
							<td><?php echo "$nama_user /$id_user Waktu: $tanggal $jam WIB"; ?>
							</td>
						</tr>

						<tr>
							<td height="24"><label for="keterangan">Transaksi Penjualan*</label>
							<td>:
							<td><?php echo $lap; ?>
							</td>
						</tr>

						<tr>
							<td height="24"><label for="keterangan">Catatan PJ Bimbingan*</label>
							<td>:
							<td><?php echo $keterangan; ?>
							</td>
						</tr>
				</table>
			</div>

			<br>
			<hr>

			<h3 class="mb-4">Data Latih Berdasarkan Tahun : <?php echo $nama_tahun . $id_tahun; ?></h3>
			<div class="table table-responsive">
				<table class="table table-striped" id="tableMode">
					<tr bgcolor="#333">
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
						<th width="10%">Jumlah</td>
						<th width="15%">Kategori</td>
						<th width="7%">Hapus</td>
					</tr>
					<?php
					$sql = "select * from `$tbpmb` where  `id_tahun`='$id_tahun' order by `id_pmb` asc";
					$jpmb = getJum($conn, $sql);
					if ($jpmb > 0) {
						$no = 1;
						$arr = getData($conn, $sql);
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

							$i = $no - 1;
							$arIS[$i] = $id_pmb;
							$arNS[$i] = $minat_jurusan;
							$arKAT[$i] = $kategori;
							$arVS[$i] = "$ks1: $jalur_pendaftaran,
								$ks2: $gelombang,
								$ks3: $sistem_kuliah,
								$ks4: $jenis_kelamin,
								$ks5: $nilai_lulusan,
								$ks6: $tahun_lulus,
								$ks7: $jenjang_pendidikan,
								$ks8: $jurusan_sekolah,
								$ks9: $tanggal_daftar,
								$ks10: $prodi_diterima,
								$ks11: $jenis_institusi,
								$ks12: $provinsi_institusi";

							$arA[$i][0] = $jalur_pendaftaran;
							$arA[$i][1] = $gelombang;
							$arA[$i][2] = $sistem_kuliah;
							$arA[$i][3] = $jenis_kelamin;
							$arA[$i][4] = $nilai_lulusan;
							$arA[$i][5] = $tahun_lulus;
							$arA[$i][6] = $jenjang_pendidikan;
							$arA[$i][7] = $jurusan_sekolah;
							$arA[$i][8] = $tanggal_daftar;
							$arA[$i][9] = $prodi_diterima;
							$arA[$i][10] = $jenis_institusi;
							$arA[$i][11] = $provinsi_institusi;

							$color = "#dddddd";
							if ($no % 2 == 0) {
								$color = "#eeeeee";
							}
							echo "<tr bgcolor='$color'>
				<td>$no</td>
				<td>$minat_jurusan</td>
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
						<a href='?mnu=knn&pro=hapus&kode=$id_pengujian&id_pengujian=$id_pengujian'>
						<img src='ypathicon/ha.png' title='hapus' 
						onClick='return confirm(\"Apakah Anda benar-benar akan menghapus data \"$minat_jurusan\" pada data pengujian $nama_tahun?..\")'></a></div></td>
					</tr>";

							$no++;
						} //for dalam
					} //if
					else {
						echo "<tr><td colspan='18'><blink>Maaf, data pengujian belum tersedia ...</blink></td></tr>";
					}

					?>
				</table>
			</div>
			<br>
			<?php
			$i = 0;

			?>

			<!------------------------->
			<!--    DATA TRAINING    -->
			<!------------------------->
			<?php
			$TBL = "$tbpmb";
			$pk = "id_pmb";
			$M = 0;
			$dist = 0;
			$sqlv = "select distinct(`$CLASS`) from `$TBL` where `id_tahun`='$id_tahun' order by `$CLASS` asc";
			$jumv = getJum($conn, $sqlv);
			if ($jumv < 1) {
				echo "<h5>Maaf, data training belum tersedia ...</h5>";
			}
			$arrv = getData($conn, $sqlv);
			$arD = array();
			foreach ($arrv as $dv) {
				$KTG = $dv["$CLASS"];
				$ARM[$dist] = $KTG;
				$dist++;

				$sql = "select * from `$TBL` where `$CLASS`='$KTG' and  `id_tahun`='$id_tahun'  order by `$pk` asc";
				$jumvv = getJum($conn, $sql);
			?>

				<h4>Tabel Data PMB Kategori "<?php echo ("$KTG") . " ($jumvv Item)"; ?>"</h4>
				<h4>Tabel Data PMB Kategori "<?php echo htmlspecialchars("$KTG") . " ($jumvv Item)"; ?>"</h4>
				<div class="table-responsive">
					<table class="table table-striped">
						<tr bgcolor="#036">
							<td width="3%">
								<center>
									<font color="white">No</font>
								</center>
							</td>
							<td width="20%">
								<center>
									<font color="white">Minat Jurusan</font>
								</center>
							</td>
							<th width="5%">
								<center>
									<font color="white"><?php echo $ks1; ?></font>
								</center>
							</th>
							<th width="5%">
								<center>
									<font color="white"><?php echo $ks2; ?></font>
								</center>
							</th>
							<th width="5%">
								<center>
									<font color="white"><?php echo $ks3; ?></font>
								</center>
							</th>
							<th width="5%">
								<center>
									<font color="white"><?php echo $ks4; ?></font>
								</center>
							</th>
							<th width="5%">
								<center>
									<font color="white"><?php echo $ks5; ?></font>
								</center>
							</th>
							<th width="5%">
								<center>
									<font color="white"><?php echo $ks6; ?></font>
								</center>
							</th>
							<th width="5%">
								<center>
									<font color="white"><?php echo $ks7; ?></font>
								</center>
							</th>
							<th width="5%">
								<center>
									<font color="white"><?php echo $ks8; ?></font>
								</center>
							</th>
							<th width="5%">
								<center>
									<font color="white"><?php echo $ks9; ?></font>
								</center>
							</th>
							<th width="5%">
								<center>
									<font color="white"><?php echo $ks10; ?></font>
								</center>
							</th>
							<th width="5%">
								<center>
									<font color="white"><?php echo $ks11; ?></font>
								</center>
							</th>
							<th width="5%">
								<center>
									<font color="white"><?php echo $ks12; ?></font>
								</center>
							</th>
						</tr>
						<?php
						// Safe init
						$no = 1;
						$M = 0;
						$arr = getData($conn, $sql); // pastikan $sql sudah terdefinisi sebelum block ini
						if (!is_array($arr)) $arr = [];

						foreach ($arr as $d) {
							$id_pmb = $d["id_pmb"] ?? '';
							// PERBAIKAN: ambil field nama jurusan langsung
							$minat_jurusan = $d["minat_jurusan"] ?? '';
							$jalur_pendaftaran = $d["jalur_pendaftaran"] ?? '';
							$gelombang = $d["gelombang"] ?? '';
							$sistem_kuliah = $d["sistem_kuliah"] ?? '';
							$jenis_kelamin = $d["jenis_kelamin"] ?? '';
							$nilai_lulusan = $d["nilai_lulusan"] ?? '';
							$tahun_lulus = $d["tahun_lulus"] ?? '';
							$jenjang_pendidikan = $d["jenjang_pendidikan"] ?? '';
							$jurusan_sekolah = $d["jurusan_sekolah"] ?? '';
							$tanggal_daftar = $d["tanggal_daftar"] ?? '';
							$prodi_diterima = $d["prodi_diterima"] ?? '';
							$jenis_institusi = $d["jenis_institusi"] ?? '';
							$provinsi_institusi = $d["provinsi_institusi"] ?? '';

							$jumlah = $d["jumlah"] ?? '';
							$kategori = $d["kategori"] ?? '';
							$keterangan = $d["keterangan"] ?? '';

							$color = ($no % 2 == 0) ? "#eeeeee" : "#dddddd";

							echo "<tr bgcolor='" . $color . "'>
                <td>$no</td>
                <td>" . htmlspecialchars($minat_jurusan) . "</td>
                <td>" . htmlspecialchars($jalur_pendaftaran) . "</td>
                <td>" . htmlspecialchars($gelombang) . "</td>
                <td>" . htmlspecialchars($sistem_kuliah) . "</td>
                <td>" . htmlspecialchars($jenis_kelamin) . "</td>
                <td>" . htmlspecialchars($nilai_lulusan) . "</td>
                <td>" . htmlspecialchars($tahun_lulus) . "</td>
                <td>" . htmlspecialchars($jenjang_pendidikan) . "</td>
                <td>" . htmlspecialchars($jurusan_sekolah) . "</td>
                <td>" . htmlspecialchars($tanggal_daftar) . "</td>
                <td>" . htmlspecialchars($prodi_diterima) . "</td>
                <td>" . htmlspecialchars($jenis_institusi) . "</td>
                <td>" . htmlspecialchars($provinsi_institusi) . "</td>
            </tr>";

							$no++;
							$M++;
						}
						?>
					</table>
				</div>

				<div class="table-responsive">
				<?php
			} // distinct

			// jika tidak ada data latih, hentikan proses KNN dengan pesan informatif
			if (!isset($arNS) || !is_array($arNS) || count($arNS) === 0) {
				echo "<p><strong>Tidak ada data latih untuk melakukan KNN.</strong></p>";
			} else {
				// inisialisasi aman
				$hasilprint = "";
				$arBobot = $arSBobot1 = $arSBobot2 = $arSKat = $arIKat = array();

				$gab1 = "<h4>Hitung Jarak Euclidean Data '" . htmlspecialchars($nama_tahun ?? '') . " | " . htmlspecialchars($id_tahun ?? '') . "'</h4>
            <b><i>" . htmlspecialchars($lap ?? '') . "</i></b>
        
			<table width='auto' style='margin-top=20px;'>
            <tr bgcolor='#036'>
              <th width='3%'><center><font color='#ffffff'>No</font></center></th>
              <th width='17%'><center><font color='#ffffff'>Kategori</font></center></th>
              <th width='70%'><center><font color='#ffffff'>Formula</font></center></th>
              <th width='5%'><center><font color='#ffffff'>Bobot</font></center></th>
            </tr>";

				$size = count($arNS);

				for ($k = 0; $k < $size; $k++) {
					$id_data = $arIS[$k] ?? null;
					$nama_data = $arNS[$k] ?? '';
					$valus_data = $arVS[$k] ?? null;
					$KAT = $arKAT[$k] ?? '';

					$no = $k + 1;

					// ambil atribut latih (bisa array kosong jika tidak ada)
					$atts = $arA[$k] ?? array();

					// panggil getECC jika ada — hasil diharapkan array( bobot, sb1, sb2, sb3 )
					$ar = array(0, 0, 0, 0);
					if (function_exists('getECC')) {
						try {
							$tmp = getECC($atts, $arUji ?? array());
							if (is_array($tmp) && count($tmp) >= 4) $ar = $tmp;
						} catch (Exception $e) {
							// tetap lanjut dengan bobot = 0
							$ar = array(0, 0, 0, 0);
						}
					}

					$bobot = $ar[0];
					$sbobot1 = $ar[1];
					$sbobot2 = $ar[2];
					$sbobot3 = $ar[3];

					$arBobot[$k]    = $bobot;
					$arSBobot1[$k]  = $sbobot1;
					$arSBobot2[$k]  = $sbobot2;
					$arSKat[$k]     = $KAT;
					$arIKat[$k]     = $id_data; // SIMPAN id sample latih (bukan id_pengujian)

					$color = ($no % 2 == 0) ? "#eeeeee" : "#dddddd";

					$gab1 .= "<tr bgcolor='{$color}'>
            <td valign='top'>{$no}</td>
            <td valign='top' align='left'>" . htmlspecialchars($KAT) . "</td>
            <td valign='top' align='left'><small><i>" . htmlspecialchars($sbobot1) . " = " . htmlspecialchars($sbobot2) . " = " . htmlspecialchars($sbobot3) . "</i></small></td>
            <td valign='top' align='left'><small><i>" . htmlspecialchars($bobot) . "</i></small></td>
        </tr>";
				} // end for
				$gab1 .= "</table>";

				// Jika ada data, urutkan berdasarkan bobot ascending — gunakan array_multisort (lebih andal)
				if (count($arBobot) > 0) {
					array_multisort($arBobot, SORT_ASC, SORT_NUMERIC, $arSBobot1, $arSBobot2, $arSKat, $arIKat);
				}

				// siapkan gab2 (hasil KNN terendah)
				$gab2 = "<h3>KNN KValue " . (int)($k_value ?? 1) . " Terendah</h3>";
				$gab2 .= "<table width=\"95%\">
      <tr bgcolor=\"#036\">
        <th width=\"3%\"><center><font color=\"#ffffff\">No</font></center></th>
        <th width=\"15%\"><center><font color=\"#ffffff\">Klasifikasi</font></center></th>
        <th width=\"70%\"><center><font color=\"#ffffff\">Formula</font></center></th>
        <th width=\"5%\"><center><font color=\"#ffffff\">Bobot</font></center></th>
      </tr>";

				// counters
				$j1 = $j2 = $j3 = 0;
				$tot1 = $tot2 = $tot3 = 0;
				$ARM = array("tinggi", "rendah", "sedang");

				$rekapitulasi = "<ol>";

				// pastikan k_value valid dan tidak melebihi jumlah data
				$k_value_safe = max(1, intval($k_value ?? 1));
				$k_loop = min($k_value_safe, count($arBobot));

				for ($m = 0; $m < $k_loop; $m++) {
					$no = $m + 1;
					$KAT = strtolower($arSKat[$m] ?? '');
					$idkat = $arIKat[$m] ?? null;
					$bobot = $arBobot[$m] ?? 0;
					$sbobot1 = $arSBobot1[$m] ?? '';
					$sbobot2 = $arSBobot2[$m] ?? '';

					if ($KAT == $ARM[0]) {
						$j1++;
						$tot1 += $bobot;
					} elseif ($KAT == $ARM[1]) {
						$j2++;
						$tot2 += $bobot;
					} elseif ($KAT == $ARM[2]) {
						$j3++;
						$tot3 += $bobot;
					}

					$rekapitulasi .= "<li>" . htmlspecialchars($sbobot1) . " => " . htmlspecialchars($sbobot2) . " => " . htmlspecialchars($bobot) . " #$KAT</li>";

					$color = ($no % 2 == 0) ? "#eeeeee" : "#dddddd";
					$gab2 .= "<tr bgcolor=\"{$color}\">
            <td valign=\"top\">{$no}</td>
            <td valign=\"top\" align=\"left\">#" . htmlspecialchars($KAT) . "</td>
            <td valign=\"top\" align=\"left\"><small><i>" . htmlspecialchars($sbobot1) . " = " . htmlspecialchars($sbobot2) . "</i></small></td>
            <td valign=\"top\" align=\"left\"><small><i>" . htmlspecialchars($bobot) . "</i></small></td>
        </tr>";
				} // end for m
				$gab2 .= "</table>";

				// tentukan status dominan, hati-hati pembagian nol
				$shasil = "?";
				$bobot_final = 0.0;
				if ($j1 >= $j2 && $j1 >= $j3 && $j1 > 0) {
					$shasil = $ARM[0];
					$bobot_final = $tot1 / $j1;
				} elseif ($j2 >= $j1 && $j2 >= $j3 && $j2 > 0) {
					$shasil = $ARM[1];
					$bobot_final = $tot2 / $j2;
				} elseif ($j3 >= $j1 && $j3 >= $j2 && $j3 > 0) {
					$shasil = $ARM[2];
					$bobot_final = $tot3 / $j3;
				}

				$rekapitulasi .= "</ol>Status Dominan $k_value_safe KNN ($j1:$j2:$j3) = <u>" . strtoupper($shasil) . " (" . number_format($bobot_final, 6) . ")</u>";
				$gab2 .= "<h4>status Dominan $k_value_safe KNN ($j1:$j2:$j3) = <u>" . strtoupper($shasil) . " (" . number_format($bobot_final, 6) . ")</u></h4>";

				$hasil = "<h3>Analisa KNN an \"" . htmlspecialchars($NM ?? '') . "\" Dengan $k_value_safe KNN ($j1:$j2:$j3) => " . strtoupper($shasil) . " (" . number_format($bobot_final, 6) . ")</h3><div>$gab1 $gab2 </div>";
				if (!isset($_SESSION["gab"])) $_SESSION["gab"] = "";
				$_SESSION["gab"] .= $hasil;

				$hasilprint = "<h3>Analisa KNN an \"" . htmlspecialchars($NM ?? '') . "\" Dengan KNN $k_value_safe ($j1:$j2:$j3) => " . strtoupper($shasil) . " (" . number_format($bobot_final, 6) . ")</h3><div>$gab1 $gab2</div>";

				// update ke DB - gunakan escaping untuk keamanan
				if (isset($id_pengujian)) {
					$rekap_safe = $conn->real_escape_string($rekapitulasi);
					$kat_safe = $conn->real_escape_string($shasil);
					$ket_safe = $conn->real_escape_string("Kategori $k_value_safe-> $shasil : $bobot_final");
					$sql = "UPDATE `$tbpengujian` SET `rekapitulasi`='{$rekap_safe}', `kategori`='{$kat_safe}', `keterangan`='{$ket_safe}' WHERE `id_pengujian`='" . $conn->real_escape_string($id_pengujian) . "'";
					$ubah = process($conn, $sql);
				}

				echo $hasilprint;
				$img = "<div align=\"right\"><img src=\"ypathicon/print.bmp\" width=\"50\" height=\"50\" title=\"PRINT\" OnClick=\"PRINTME()\"></div>";
				echo $img;

				// simpan id pengujian ke session bila ada
				if (isset($id_pengujian)) $_SESSION["IDUJI"] = $id_pengujian;
			} // end else arNS tersedia
				?>
				</div>
		</div>



		<?php

		$time_end = microtime(true);
		$durasi = ($time_end - $time_start) * 1000;
		$waktu = "<br><i>Waktu Proses $durasi ms</i>";
		echo $waktu;

		?>

		<?php
		function swap(&$arr, $a, $b)
		{
			$tmp = $arr[$a];
			$arr[$a] = $arr[$b];
			$arr[$b] = $tmp;
		}

		?>

		<?php
		function getECC($arrA, $arrB)
		{
			$c = count($arrA);
			$h = 0;
			$vs1 = "";
			$vs2 = "";
			for ($i = 0; $i < $c; $i++) {
				$a = $arrA[$i];
				$b = $arrB[$i];
				$v = pow(($a - $b), 2);
				$h += $v;
				$vs1 .= "($a-$b)<sup>2</sup>+";
				$vs2 .= "$v+";
			}
			$vs1 = substr($vs1, 0, strlen($vs1) - 1);
			$vs2 = substr($vs2, 0, strlen($vs2) - 1);
			$vs3 = "sqrt($h)";

			$h = sqrt($h);
			$vs1 = "sqrt($vs1)";
			$vs2 = "sqrt($vs2)";

			$ar = array();
			$ar[0] = $h;
			$ar[1] = $vs1;
			$ar[2] = $vs2;
			$ar[3] = $vs3;
			return $ar;
		}

		function getV($ar, $v)
		{
			$h = 0;
			for ($i = 0; $i < count($ar); $i++) {
				if (strtolower($ar[$i]) == strtolower($v)) {
					$h = $i + 1;
					break;
				}
			}

			return $h;
		}

		function getDistinct($conn, $kolom)
		{
			$ar = array();
			$sql = "select distinct(`$kolom`) from `tb_pmb` order by `$kolom` asc";
			$arr = getData($conn, $sql);
			$i = 0;
			foreach ($arr as $d) {
				$value = $d["$kolom"];
				if ($value == 42) {
					$value = "N/A";
				}
				$ar[$i] = $value;
				$i++;
			}
			return $ar;
		}

		?>

	</div>
</div>