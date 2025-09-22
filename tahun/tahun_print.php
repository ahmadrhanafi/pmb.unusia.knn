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
	?>




	<table width="98%" border="0">
		<tr>
			<th width="3%">No</td>
			<th width="10%">ID Tahun</td>
			<th width="30%">Nama Tahun</td>
			<th width="45%">Deskripsi</td>
		</tr>
		<?php
		$sql = "select * from `$tbtahun` order by `id_tahun` desc";
		$jum = getJumM($conn, $sql);
		$no = 0;
		if ($jum > 0) {
			$arr = getDataM($conn, $sql);
			foreach ($arr as $d) {
				$no++;
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
				</tr>";
			}
		} //if
		else {
			echo "<tr><td colspan='7'><blink>Maaf, data belum tersedia...</blink></td></tr>";
		}

		echo "</table>";
		?>