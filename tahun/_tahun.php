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
		<h3>Data Calon Mahasiswa :</h3>

		| <img src='ypathicon/print.png' title='PRINT' OnClick="PRINT()"> |
		<br>

		<div class="table-responsive">
			<table class="table table-striped">
				<tr bgcolor="#cccccc">
					<th width="3%">No</td>
					<th width="10%">ID Tahun</td>
					<th width="30%">Nama Tahun</td>
					<th width="55%">Deskripsi</td>
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
</div>