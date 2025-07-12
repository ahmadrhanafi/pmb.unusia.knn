<?php

$pro = "simpan";
$gambar0 = "avatar.jpg";
//$PATH="ypathcss";
?>


<script type="text/javascript">
	function PRINT(pk) {
		win = window.open('penjualan/penjualan_print.php?pk=' + pk, 'win', 'width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, id_penjualan=0');
	}
</script>
<script language="JavaScript">
	function buka(url) {
		window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');
	}
</script>

<?php

$id_toko = "";
$motif = "";
$p1 = "";
$p2 = "";
$p3 = "";
$p4 = "";
$p5 = "";
$p6 = "";
$p7 = "";
$p8 = "";
$p9 = "";
$p10 = "";
$p11 = "";
$p12 = "";
$jumlah_persediaan = "";
$kategori = "";
$keterangan = "";


if (isset($_GET["pro"]) && $_GET["pro"] == "ubah") {
	$id_penjualan = $_GET["kode"];
	$sql = "select * from `$tbpenjualan` where `id_penjualan`='$id_penjualan'";
	$d = getField($conn, $sql);
	$id_penjualan = $d["id_penjualan"];
	$id_penjualan0 = $d["id_penjualan"];
	$id_toko = $d["id_toko"];
	$motif = $d["motif"];
	$p1 = $d["p1"];
	$p2 = $d["p2"];
	$p3 = $d["p3"];
	$p4 = $d["p4"];
	$p5 = $d["p5"];
	$p6 = $d["p6"];
	$p7 = $d["p7"];
	$p8 = $d["p8"];
	$p9 = $d["p9"];
	$p10 = $d["p10"];
	$p11 = $d["p11"];
	$p12 = $d["p12"];
	$jumlah_persediaan = $d["jumlah_persediaan"];
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


<div id="accordion">
	<h3>Masukan Data Penjualan</h3>
	<div>
		<form name="import_export_form" method="post" action="" enctype="multipart/form-data">
			<table class="table">
				<tr>
					<td><label for="import">Import File Excel Data Latih</label>
					<td><input type="file" required name="excelfile" /><br>
					<td><input type="submit" id="import" class="btn btn-primary" value="IMPORT" name="IMPORT" />
						<a href="downloadget.php?nf=Semua_datalatih.xls">
							<input type="button" id="import" class="btn btn-danger" value="DOWNLOAD" name="DOWNLOAD" /></a>
					</td>
				</tr>
			</table>
		</form>
		<hr>

		<form action="" method="post" enctype="multipart/form-data">
			<table class="table table-striped">


				<tr>
					<td>
						<label for="id_toko">Pilih Toko</label>
					<td>:
					<td colspan="5"><select name="id_toko" class="form-control" id="id_toko">
							<?php
							echo "<option value='$id_toko' ";
							echo ">$id_toko</option>";

							$sql = "select * from `$tbtoko`";
							$arr = getData($conn, $sql);
							foreach ($arr as $d) {
								$id_toko0 = $d["id_toko"];
								$nama_toko = $d["nama_toko"];
								echo "<option value='$id_toko0' ";
								if ($id_toko0 == $id_toko) {
									echo "selected";
								}
								echo ">$nama_toko ($id_toko0)</option>";
							}
							?>
						</select></td>
				</tr>


				<tr>
					<td valign="top"><label for="motif">Motif</label>
					<td valign="top">:
					<td colspan="7">
						<select name="motif" class="form-control" id="motif">
							<option value="-">Pilih Motif</option>
							<option value="Sari Gading" <?php if ($motif == "Sari Gading") {
															echo "selected";
														} ?>>Sari Gading</option>
							<option value="Kulat Karikit" <?php if ($motif == "Kulat Karikit") {
																echo "selected";
															} ?>>Kulat Karikit</option>
							<option value="Bintang Berhambur" <?php if ($motif == "Bintang Berhambur") {
																	echo "selected";
																} ?>>Bintang Berhambur</option>
							<option value="Bintang Berhambur" <?php if ($motif == "Bintang Berhambur") {
																	echo "selected";
																} ?>>Bintang Berhambur</option>
							<option value="Bayam Raja" <?php if ($motif == "Bayam Raja") {
															echo "selected";
														} ?>>Bayam Raja</option>
							<option value="Awan Beriring" <?php if ($motif == "Awan Beriring") {
																echo "selected";
															} ?>>Awan Beriring</option>
							<option value="Getas" <?php if ($motif == "Getas") {
														echo "selected";
													} ?>>Getas</option>
							<option value="Jumputan" <?php if ($motif == "Jumputan") {
															echo "selected";
														} ?>>Jumputan</option>
							<option value="Gigi Haruan" <?php if ($motif == "Gigi Haruan") {
															echo "selected";
														} ?>>Gigi Haruan</option>
						</select>
					</td>
				</tr>


				<tr>
					<td width="10"><label for="p1"><?php echo $kp1; ?></label>
					<td width="1">:
					<td width="39"><input required name="p1" type="text" class="form-control" id="p1" value="<?php echo $p1; ?>" size="25" />
					</td>

					<td width="10"><label for="p2"><?php echo $kp2; ?></label>
					<td width="1">:
					<td width="39"><input required name="p2" type="text" class="form-control" id="p2" value="<?php echo $p2; ?>" size="25" />
					</td>
				</tr>

				<tr>
					<td><label for="p3"><?php echo $kp3; ?></label>
					<td>:
					<td><input required name="p3" type="text" class="form-control" id="p3" value="<?php echo $p3; ?>" size="25" />
					</td>
					<td><label for="p4"><?php echo $kp4; ?></label>
					<td>:
					<td><input required name="p4" type="text" class="form-control" id="p4" value="<?php echo $p4; ?>" size="25" />
					</td>
				</tr>

				<tr>
					<td><label for="p5"><?php echo $kp5; ?></label>
					<td>:
					<td><input required name="p5" type="text" class="form-control" id="p5" value="<?php echo $p5; ?>" size="25" />
					</td>
					<td><label for="p6"><?php echo $kp6; ?></label>
					<td>:
					<td><input required name="p6" type="text" class="form-control" id="p6" value="<?php echo $p6; ?>" size="25" />
					</td>
				</tr>

				<tr>
					<td><label for="p7"><?php echo $kp7; ?></label>
					<td>:
					<td><input required name="p7" type="text" class="form-control" id="p7" value="<?php echo $p7; ?>" size="25" />
					</td>
					<td><label for="p8"><?php echo $kp8; ?></label>
					<td>:
					<td><input required name="p8" type="text" class="form-control" id="p8" value="<?php echo $p8; ?>" size="25" />
					</td>
				</tr>

				<tr>
					<td><label for="p9"><?php echo $kp9; ?></label>
					<td>:
					<td><input required name="p9" type="text" class="form-control" id="p9" value="<?php echo $p9; ?>" size="25" />
					</td>
					<td><label for="p10"><?php echo $kp10; ?></label>
					<td>:
					<td><input required name="p10" type="text" class="form-control" id="p10" value="<?php echo $p10; ?>" size="25" />
					</td>
				</tr>

				<tr>
					<td><label for="p11"><?php echo $kp11; ?></label>
					<td>:
					<td><input required name="p11" type="text" class="form-control" id="p11" value="<?php echo $p11; ?>" size="25" />
					</td>
					<td><label for="p12"><?php echo $kp12; ?></label>
					<td>:
					<td><input required name="p12" type="text" class="form-control" id="p12" value="<?php echo $p12; ?>" size="25" />
					</td>
				</tr>




				<tr>
					<td><label for="kategori">Kategori Penjualan</label>
					<td>:
					<td colspan="5">
						<input type="radio" name="kategori" id="kategori" checked="checked" value="rendah" <?php if ($kategori == "rendah") {
																												echo "checked";
																											} ?> />Rendah
						<input type="radio" name="kategori" id="kategori" value="Sedang" <?php if ($kategori == "Sedang") {
																								echo "checked";
																							} ?> />Sedang
						<input type="radio" name="kategori" id="kategori" value="tinggi" <?php if ($kategori == "tinggi") {
																								echo "checked";
																							} ?> />Tinggi

					</td>
				</tr>



				<tr>
					<td><label for="keterangan">Keterangan</label>
					<td>:
					<td><input name="keterangan" type="text" class="form-control" id="keterangan" value="<?php echo $keterangan; ?>" />
					</td>
				</tr>
				<tr>
					<td>
					<td>
					<td colspan="5">
						<input name="Simpan" type="submit" class="btn btn-primary" id="Simpan" value="Simpan" />
						<input name="pro" type="hidden" id="pro" value="<?php echo $pro; ?>" />

						<input name="id_penjualan" type="hidden" id="id_penjualan" value="<?php echo $id_penjualan; ?>" />
						<input name="id_penjualan0" type="hidden" id="id_penjualan0" value="<?php echo $id_penjualan0; ?>" />
						<a href="?mnu=id_penjualan"><input name="Batal" class="btn btn-warning" type="button" id="Batal" value="Batal" /></a>
					</td>
				</tr>
			</table>
		</form>
		<br />
	</div>



	<?php
	$sqlc = "select distinct(`id_toko`) from `$tbpenjualan` order by `id_toko` asc";
	$jumc = getJum($conn, $sqlc);
	if ($jumc < 1) {
		echo "<h1>Maaf data penjualan belum tersedia</h1>";
	}
	$arrc = getData($conn, $sqlc);
	foreach ($arrc as $dc) {
		$id_toko = $dc["id_toko"];
	?>
		<h3>Data Penjualan Toko <?php echo getToko($conn, $id_toko) . "|$id_toko" ?>:</h3>
		<div>

			| <img src='ypathicon/print.png' title='PRINT' OnClick="PRINT('<?php echo $id_toko; ?>')"> |
			<br>

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
					<th width="10%">Menu</td>
				</tr>
				<?php
				$sql = "select * from `$tbpenjualan` where  `id_toko`='$id_toko' order by `kategori` asc";
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
						$id_penjualan = $d["id_penjualan"];
						$motif = $d["motif"];
						$p1 = $d["p1"];
						$p2 = $d["p2"];
						$p3 = $d["p3"];
						$p4 = $d["p4"];
						$p5 = $d["p5"];
						$p6 = $d["p6"];
						$p7 = $d["p7"];
						$p8 = $d["p8"];
						$p9 = $d["p9"];
						$p10 = $d["p10"];
						$p11 = $d["p11"];
						$p12 = $d["p12"];
						$jumlah_persediaan = $d["jumlah_persediaan"];
						$kategori = $d["kategori"];
						$keterangan = $d["keterangan"];


						$color = "#dddddd";
						if ($no % 2 == 0) {
							$color = "#eeeeee";
						}
						echo "<tr bgcolor='$color'>
				<td>$no</td>
				<td><small>$motif</small></td>
				<td>$p1</td>
				<td>$p2</td>
				<td>$p3</td>
				<td>$p4</td>
				<td>$p5</td>
				<td>$p6</td>
				<td>$p7</td>
				<td>$p8</td>
				<td>$p9</td>
				<td>$p10</td>
				<td>$p11</td>
				<td>$p12</td>
				<td>$jumlah_persediaan</td>
				<td>$kategori</td>
				<td><div align='center'>
<a href='?mnu=penjualan&pro=ubah&kode=$id_penjualan'><img src='ypathicon/ub.png' title='ubah'></a>
<a href='?mnu=penjualan&pro=hapus&kode=$id_penjualan&id_toko=$id_toko'><img src='ypathicon/ha.png' title='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus data \"$id_toko\" pada data id_penjualan ?..\")'></a></div></td>
				</tr>";

						$no++;
					} //for dalam
				} //if
				else {
					echo "<tr><td colspan='6'><blink>Maaf, Data penjualan belum tersedia...</blink></td></tr>";
				}
				?>
			</table>

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
				echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=penjualan'>« Prev</a></span> ";
			} else {
				echo "<span class=disabled>« Prev</span> ";
			}

			for ($i = 1; $i <= $jmlhal; $i++)
				if ($i != $page) {
					echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=penjualan'>$i</a> ";
				} else {
					echo " <span class=current>$i</span> ";
				}

			if ($page < $jmlhal) {
				$next = $page + 1;
				echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=penjualan'>Next »</a></span>";
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
		<?php
		if (isset($_POST['IMPORT'])) {
			$sql = "Truncate `$tbpenjualan`";
			$hapus = process($conn, $sql);


			require_once 'Excel/reader.php';
			$data = new Spreadsheet_Excel_Reader();
			$data->setOutputEncoding('CP1251');
			$filename = $_FILES['excelfile']['tmp_name'];
			$nf = $_FILES['excelfile']['name'];

			$data->read($filename);
			$jumSheet = 30;
			for ($k = 0; $k < $jumSheet; $k++) {
				$n = 0;
				$toko = $data->sheets[$k]["cells"][1][1];
				$id_toko = getIToko($conn, $toko);

				for ($x = 6; $x < count($data->sheets[$k]["cells"]); $x++) {
					$motif = $data->sheets[$k]["cells"][$x][2];
					$p1 = $data->sheets[$k]["cells"][$x][3];
					$p2 = $data->sheets[$k]["cells"][$x][4];
					$p3 = $data->sheets[$k]["cells"][$x][5];
					$p4 = $data->sheets[$k]["cells"][$x][6];
					$p5 = $data->sheets[$k]["cells"][$x][7];
					$p6 = $data->sheets[$k]["cells"][$x][8];
					$p7 = $data->sheets[$k]["cells"][$x][9];
					$p8 = $data->sheets[$k]["cells"][$x][10];
					$p9 = $data->sheets[$k]["cells"][$x][11];
					$p10 = $data->sheets[$k]["cells"][$x][12];
					$p11 = $data->sheets[$k]["cells"][$x][13];
					$p12 = $data->sheets[$k]["cells"][$x][14];

					$kategori = strtolower($data->sheets[$k]["cells"][$x][15]);
					$keterangan = $data->sheets[$k]["cells"][$x][16] . "-$toko";
					$jumlah_persediaan = $p1 + $p2 + $p3 + $p4 + $p5 + $p6 + $p7 + $p8 + $p9 + $p10 + $p11 + $p12;
					$n++;
					$sql = " INSERT INTO `$tbpenjualan` (
`id_toko` ,
`motif` ,
`p1` ,
`p2` ,
`p3` ,
`p4` ,
`p5` ,
`p6`,
`p7`,
`p8`,
`p9`,
`p10`,
`p11`,
`p12`,
`jumlah_persediaan`,
`kategori`,
`keterangan`
) VALUES (
'$id_toko',
'$motif', 
'$p1',
'$p2',
'$p3', 
'$p4',
'$p5',
'$p6',
'$p7',
'$p8',
'$p9',
'$p10',
'$p11',
'$p12',
'$jumlah_persediaan',
'$kategori',
'$keterangan'
)";
					$simpan = process($conn, $sql);
				} //for
			}
			echo "<script>alert('Import Data Latih Sebanyak $jumSheet Sheets @ $n Item berhasil...');document.location.href='?mnu=penjualan';</script>";
		} //isset
		?>


		<?php
		if (isset($_POST['IMPORTSATUAN'])) {
			$sql = "Truncate `$tbpenjualan`";
			$hapus = process($conn, $sql);


			require_once 'Excel/reader.php';
			$data = new Spreadsheet_Excel_Reader();
			$data->setOutputEncoding('CP1251');
			$filename = $_FILES['excelfile']['tmp_name'];
			$nf = $_FILES['excelfile']['name'];

			$data->read($filename);
			$n = 0;
			$toko = $data->sheets[0]["cells"][1][1];
			$id_toko = getIToko($conn, $toko);

			for ($x = 6; $x < count($data->sheets[0]["cells"]); $x++) {
				$motif = $data->sheets[0]["cells"][$x][2];
				$p1 = $data->sheets[0]["cells"][$x][3];
				$p2 = $data->sheets[0]["cells"][$x][4];
				$p3 = $data->sheets[0]["cells"][$x][5];
				$p4 = $data->sheets[0]["cells"][$x][6];
				$p5 = $data->sheets[0]["cells"][$x][7];
				$p6 = $data->sheets[0]["cells"][$x][8];
				$p7 = $data->sheets[0]["cells"][$x][9];
				$p8 = $data->sheets[0]["cells"][$x][10];
				$p9 = $data->sheets[0]["cells"][$x][11];
				$p10 = $data->sheets[0]["cells"][$x][12];
				$p11 = $data->sheets[0]["cells"][$x][13];
				$p12 = $data->sheets[0]["cells"][$x][14];

				$jumlah_persediaan = $p1 + $p2 + $p3 + $p4 + $p5 + $p6 + $p7 + $p8 + $p9 + $p10 + $p11 + $p12;
				$kategori = "";
				$keterangan = "$nf";

				$n++;
				$sql = " INSERT INTO `$tbpenjualan` (
`id_toko` ,
`motif` ,
`p1` ,
`p2` ,
`p3` ,
`p4` ,
`p5` ,
`p6`,
`p7`,
`p8`,
`p9`,
`p10`,
`p11`,
`p12`,
`jumlah_persediaan`, 
`kategori`,
`keterangan`
) VALUES (
'$id_toko',
'$motif', 
'$p1',
'$p2',
'$p3', 
'$p4',
'$p5',
'$p6',
'$p7',
'$p8',
'$p9',
'$p10',
'$p11',
'$p12',
'$jumlah_persediaan', 
'$kategori',
'$keterangan'
)";
				$simpan = process($conn, $sql);
			} //for
			echo "<script>alert('Import Data Latih Sebanyak $n berhasil...');document.location.href='?mnu=penjualan';</script>";
		} //isset
		?>
		<?php
		if (isset($_POST["Simpan"])) {
			$pro = strip_tags($_POST["pro"]);
			$id_penjualan = strip_tags($_POST["id_penjualan"]);
			$id_penjualan0 = strip_tags($_POST["id_penjualan0"]);
			$id_toko = strip_tags($_POST["id_toko"]);
			$motif = strip_tags($_POST["motif"]);
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
			$kategori = strip_tags($_POST["kategori"]);
			$keterangan = strip_tags($_POST["keterangan"]);


			if ($pro == "simpan") {
				$sql = " INSERT INTO `$tbpenjualan` (
`id_toko` ,
`motif` ,
`p1` ,
`p2` ,
`p3` ,
`p4` ,
`p5` ,
`p6`,
`p7`,
`p8`,
`p9`,
`p10`,
`p11`,
`p12`,
`jumlah_persediaan`,
`kategori`,
`keterangan`
) VALUES (
'$id_toko',
'$motif', 
'$p1',
'$p2',
'$p3',
'$p4',
'$p5',
'$p6',
'$p7',
'$p8',
'$p9',
'$p10',
'$p11',
'$p12',
'$jumlah_persediaan',
'$kategori',
'$keterangan'
)";

				$simpan = process($conn, $sql);
				if ($simpan) {
					echo "<script>alert('Data \"$id_toko\" berhasil disimpan !');document.location.href='?mnu=penjualan';</script>";
				} else {
					echo "<script>alert('Data \"$id_toko\" gagal disimpan...');document.location.href='?mnu=penjualan';</script>";
				}
			} else {
				$sql = "update `$tbpenjualan` set 
	`id_toko`='$id_toko',
	`motif`='$motif',
	`p1`='$p1' ,
	`p2`='$p2',
	`p3`='$p3',
	`p4`='$p4',
	`p5`='$p5',
	`p6`='$p6',
	`p7`='$p7',
	`p8`='$p8',
	`p9`='$p9',
	`p10`='$p10',
	`p11`='$p11',
	`p12`='$p12',
	`jumlah_persediaan`='$jumlah_persediaan',
	`kategori`='$kategori',
	`keterangan`='$keterangan'
	 where `id_penjualan`='$id_penjualan0'";
				$ubah = process($conn, $sql);
				if ($ubah) {
					echo "<script>alert('Data berhasil diubah !');document.location.href='?mnu=penjualan';</script>";
				} else {
					echo "<script>alert('Data  gagal diubah...');document.location.href='?mnu=penjualan';</script>";
				}
			} //else simpan
		}
		?>

		<?php
		if (isset($_GET["pro"]) && $_GET["pro"] == "hapus") {
			$id_penjualan = $_GET["kode"];
			$id_toko = $_GET["id_toko"];
			$sql = "delete from `$tbpenjualan` where `id_penjualan`='$id_penjualan'";
			$hapus = process($conn, $sql);
			if ($hapus) {
				echo "<script>alert('Data berhasil dihapus !');document.location.href='?mnu=penjualan';</script>";
			} else {
				echo "<script>alert('Data gagal dihapus...');document.location.href='?mnu=penjualan';</script>";
			}
		}
		?>