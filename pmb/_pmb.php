<?php

$pro = "simpan";
$gambar0 = "avatar.jpg";
//$PATH="ypathcss";
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

		<?php
		$sqlc = "select distinct(`id_tahun`) from `$tbpmb` order by `id_tahun` asc";
		$jumc = getJum($conn, $sqlc);
		if ($jumc < 1) {
			echo "<h1>Maaf, data PMB belum tersedia</h1>";
		}
		$arrc = getData($conn, $sqlc);
		foreach ($arrc as $dc) {
			$id_tahun = $dc["id_tahun"];
		?>
			<h3>Data PMB Berdasarkan Tahun <?php echo gettahun($conn, $id_tahun) . "$id_tahun" ?>:</h3>

			| <img src='ypathicon/print.png' title='PRINT' OnClick="PRINT('<?php echo $id_tahun; ?>')"> |
			<br>

			<div class="table-responsive">
				<table class="table table-striped">
					<tr bgcolor="#cccccc">
						<th width="3%">No</td>
						<th width="15%">Motif</td>
						<th width="5%"><?php echo $ks1; ?></td>
						<th width="5%"><?php echo $ks2; ?></td>
						<th width="5%"><?php echo $ks3; ?></td>
						<th width="5%"><?php echo $ks4; ?></td>
						<th width="5%"><?php echo $ks5; ?></td>
						<th width="5%"><?php echo $ks6; ?></td>
						<th width="5%"><?php echo $ks7; ?></td>
						<th width="5%"><?php echo $ks8; ?></td>
						<th width="5%"><?php echo $ks9; ?></td>
						<th width="5%"><?php echo $ks5; ?></td>
						<th width="5%"><?php echo $ks11; ?></td>
						<th width="5%"><?php echo $ks12; ?></td>
						<th width="5%">Jumlah</td>
						<th width="15%">Kategori</td>
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
					echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=_pmb'>« Prev</a></span> ";
				} else {
					echo "<span class=disabled>« Prev</span> ";
				}

				for ($i = 1; $i <= $jmlhal; $i++)
					if ($i != $page) {
						echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=_pmb'>$i</a> ";
					} else {
						echo " <span class=current>$i</span> ";
					}

				if ($page < $jmlhal) {
					$next = $page + 1;
					echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=_pmb'>Next »</a></span>";
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