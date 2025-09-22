<style type="text/css">
	body {
		width: 100%;
	}
</style>

<body OnLoad="window.print()" OnFocus="window.close()">
	<?php
	include "../konmysqli.php";
	echo "<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
	$YPATH = "../ypathfile/";
	$pk = "";
	$field = "id_tahun";
	$TB = $tbpmb;
	$item = "PMB";

	$ks1  = "Jalur Pendaftaran";
	$ks2  = "Gelombang";
	$ks3  = "Sistem Kuliah";
	$ks4  = "Jenis Kelamin";
	$ks5  = "Nilai Lulusan";
	$ks6  = "Tahun Lulus";
	$ks7  = "Provinsi Institusi";
	$ks8  = "Kota Institusi";
	$ks9  = "Jenjang Pendidikan";
	$ks10 = "Jurusan";
	$ks11 = "Tanggal Daftar";
	$ks12 = "Tempat Lahir";

	$sql = "select * from `$TB` order by `$field` asc";
	if (isset($_GET["pk"])) {
		$pk = $_GET["pk"];
		$sql = "select * from `$TB` where `$field`='$pk' order by `$field` asc";
	}

	echo "<h3><center>Laporan Data  $item Tahun " . getTahun($conn, $pk) . "</h3>";
	?>

	<table width="98%" border="0">
		<tr>
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
			<th width="5%"><?php echo $ks5; ?></td>
			<th width="5%"><?php echo $ks11; ?></td>
			<th width="5%"><?php echo $ks12; ?></td>
			<th width="5%">Jumlah</td>
			<th width="15%">Kategori</td>
		</tr>
		<?php
		$jum = getJumM($conn, $sql);
		$no = 0;
		if ($jum > 0) {
			$arr = getDataM($conn, $sql);
			foreach ($arr as $d) {
				$no++;
				$id_penjualan = $d["id_penjualan"];
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
			}
		} //if
		else {
			echo "<tr><td colspan='7'><blink>Maaf, data $item belum tersedia...</blink></td></tr>";
		}

		echo "</table>";
		?>

		<?php
		function getTahun($conn, $kode)
		{
			$field = "nama_tahun";
			$sql = "SELECT `$field` FROM `tb_tahun` where `id_tahun`='$kode'";
			$rs = $conn->query($sql);
			$rs->data_seek(0);
			$row = $rs->fetch_assoc();
			$rs->free();
			return $row[$field];
		}
		?>