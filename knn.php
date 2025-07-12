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

$COL1 = "p1";
$COL2 = "p2";
$COL3 = "p3";
$COL4 = "p4";
$COL5 = "p5";
$COL6 = "p6";
$COL7 = "p7";
$COL8 = "p8";
$COL9 = "p9";
$COL10 = "p10";
$COL11 = "p11";
$COL12 = "p12";
$CLASS = "kategori";


$sql = "select * from `$tbpengujian` order by `id_pengujian` desc";
if (isset($_GET["id"])) {
	$id_pengujian = $_GET["id"];
	$sql = "select * from `$tbpengujian` where `id_pengujian`='$id_pengujian'";
}

$d = getField($conn, $sql);
$id_pengujian = $d["id_pengujian"];
$id_toko = $d["id_toko"];
$nama_pengujian = $d["nama_pengujian"];
$nama_toko = getToko($conn, $id_toko);
$NM = $nama_pengujian;
$IDUJI = $id_pengujian;
$id_user = $d["id_user"];
$nama_user = getUser($conn, $id_user);
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
$arUji[0] = $p1;
$arUji[1] = $p2;
$arUji[2] = $p3;
$arUji[3] = $p4;
$arUji[4] = $p5;
$arUji[5] = $p6;
$arUji[6] = $p7;
$arUji[7] = $p8;
$arUji[8] = $p9;
$arUji[9] = $p10;
$arUji[10] = $p11;
$arUji[11] = $p12;

$jumlah_persediaan = $d["jumlah_persediaan"];
$rekapitulasi = $d["rekapitulasi"];
$kategori = $d["kategori"];
$keterangan = $d["keterangan"];
$tanggal = WKT($d["tanggal"]);
$jam = $d["jam"];

$DES = "Nama Toko $nama_toko";

$lap = "$ks1: $p1, $ks2: $p2, $ks3: $p3, $ks4: $p4, $ks5: $p5, $ks6: $p6, $ks7: $p7, $ks8: $p8, $ks9: $p9, $ks10: $p10, $ks11: $p11, $ks12: $p12 ";

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


<h3>Analisa Algoritma KNN</h3>
<div id="accordion">
	<?php
	$time_start = microtime(true);
	?>
	<h4>Analisa Algoritma KNN</h4>
	<div>

		<h3>Analisa Data pengujian</h3>
		<table CLASS="table table-bordered">

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

		<br>
		<hr>

		<h2>Data Latih Toko <?php echo $nama_toko . "|" . $id_toko; ?></h2>
		<table width="98%" border="0">
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
				<th width="10%">Persediaan</td>
				<th width="15%">Kategori</td>
				<th width="7%">Hapus</td>
			</tr>
			<?php
			$sql = "select * from `$tbpenjualan` where  `id_toko`='$id_toko' order by `id_penjualan` asc";
			$jpenjualan = getJum($conn, $sql);
			if ($jpenjualan > 0) {
				$no = 1;
				$arr = getData($conn, $sql);
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

					$i = $no - 1;
					$arIS[$i] = $id_penjualan;
					$arNS[$i] = $motif;
					$arKAT[$i] = $kategori;
					$arVS[$i] = "$ks1: $p1, $ks2: $p2, $ks3: $p3, $ks4: $p4, $ks5: $p5, $ks6: $p6, $ks7: $p7, $ks8: $p8, $ks9: $p9, $ks10: $p10, $ks11: $p11, $ks12: $p12 ";

					$arA[$i][0] = $p1;
					$arA[$i][1] = $p2;
					$arA[$i][2] = $p3;
					$arA[$i][3] = $p4;
					$arA[$i][4] = $p5;
					$arA[$i][5] = $p6;
					$arA[$i][6] = $p7;
					$arA[$i][7] = $p8;
					$arA[$i][8] = $p9;
					$arA[$i][9] = $p10;
					$arA[$i][10] = $p11;
					$arA[$i][11] = $p12;

					$color = "#dddddd";
					if ($no % 2 == 0) {
						$color = "#eeeeee";
					}
					echo "<tr bgcolor='$color'>
				<td>$no</td>
				<td>$motif</td>
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
<a href='?mnu=knn&pro=hapus&kode=$id_pengujian&id_pengujian=$id_pengujian'>
<img src='ypathicon/ha.png' title='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus data \"$motif\" pada data pengujian $nama_toko?..\")'></a></div></td>
</tr>";

					$no++;
				} //for dalam
			} //if
			else {
				echo "<tr><td colspan='6'><blink>Maaf, Data pengujian belum tersedia...</blink></td></tr>";
			}

			?>
		</table>
		<br>
		<?php
		$jdatalatih = $i;

		?>
		<h2>DEFINISI DAN PROSES KNN</h2>
		<div CLASS="section layout_padding theme_bg">
			<div CLASS="container">
				<div CLASS="row">

					<div CLASS="col-lg-6 col-md-6 col-sm-11 white_fonts">
						<h3 CLASS="small_heading">Algoritma k-Nearest Neighbors (k-NN) </h3>
						<p>sistemnya menggunakan klasifikasi ketetanggaan (neighbor) sebagai nilai prediksi dari query instance yang baru. Algoritma ini sederhana, bekerja berdasarkan jarak terpendek dari query instance ke training sample untuk menentukan ketetanggaannya.
					</div>
					<br><br>
					<div CLASS="col-lg-6 col-md-6 col-sm-12 text_align_center">
						<div CLASS="full"><br><br>
							<img CLASS="img-responsive" src="ypathfile/knn.png" alt="#" />
						</div>
					</div>
				</div>
			</div>
		</div>
		<div CLASS="section layout_padding">
			<div CLASS="container">

				<div CLASS="row">
					<div CLASS="col-md-12">
						<div CLASS="full center margin-bottom_30">
							<div CLASS="heading_main text_align_center">
								<h2><span CLASS="theme_color">Tahapan Langkah Algoritma K-NN</h2>
								<p CLASS="large">Resume</p>
							</div>
						</div>
					</div>
				</div>

				<div CLASS="row">
					<div CLASS="col-lg-11">
						<ol>
							<li>Menentukan parameter k (jumlah tetangga paling dekat).
							<li>Menghitung kuadrat jarak eucliden objek terhadap data training yang diberikan.
							<li>Mengurutkan hasil no 2 secara ascending (berurutan dari nilai tinggi ke rendah)
							<li>Mengumpulkan kategori Y (Klasifikasi nearest neighbor berdasarkan nilai k)
							<li>Dengan menggunakan kategori nearest neighbor yang paling mayoritas maka dapat dipredisikan kategori objek.
						</ol>
					</div>

					<div CLASS="col-lg-11">
						<p><i>Jadi, Untuk mengklasifikasi instance x menggunakan k-NN, kita cukup mendefinisikan fungsi untuk menghitung jarak antar-instance, menghitung jarak x dengan semua instance lainnya berdasarkan fungsi tersebut, dan menentukan kelas x sebagai kelas yang paling banyak muncul dalam k instance terdekat</i></p>
					</div>

				</div>
				<div CLASS="col-lg-6 col-md-6 col-sm-12 text_align_center">
					<div CLASS="full">
						<img CLASS="img-responsive" src="ypathfile/ecc.png" alt="#" />
					</div>
				</div>
			</div>
		</div>

		<?php
		$TBL = "$tbpenjualan";
		$pk = "id_penjualan";
		$M = 0;
		$dist = 0;
		$sqlv = "select distinct(`$CLASS`) from `$TBL` where `id_toko`='$id_toko' order by `$CLASS` asc";
		$jumv = getJum($conn, $sqlv);
		if ($jumv < 1) {
			echo "<h1>Maaf Data Training belum tersedia</h1>";
		}
		$arrv = getData($conn, $sqlv);
		$arD = array();
		foreach ($arrv as $dv) {
			$KTG = $dv["$CLASS"];
			$ARM[$dist] = $KTG;
			$dist++;

			$sql = "select * from `$TBL` where `$CLASS`='$KTG' and  `id_toko`='$id_toko'  order by `$pk` asc";
			$jumvv = getJum($conn, $sql);
		?>

			<h4>Tabel Penjualan Kategori "<?php echo ("$KTG") . " ($jumvv Item)"; ?>"</h4>
			<div>
				<table width="95%">
					<tr bgcolor="#036">
						<td width="3%">
							<center>
								<font color="white">No
						</td>
						<td width="20%">
							<center>
								<font color="white">Motif
						</td>
						<th width="5%">
							<center>
								<font color="white"><?php echo $ks1; ?></td>
						<th width="5%">
							<center>
								<font color="white"><?php echo $ks2; ?></td>
						<th width="5%">
							<center>
								<font color="white"><?php echo $ks3; ?></td>
						<th width="5%">
							<center>
								<font color="white"><?php echo $ks4; ?></td>
						<th width="5%">
							<center>
								<font color="white"><?php echo $ks5; ?></td>
						<th width="5%">
							<center>
								<font color="white"><?php echo $ks6; ?></td>
						<th width="5%">
							<center>
								<font color="white"><?php echo $ks7; ?></td>
						<th width="5%">
							<center>
								<font color="white"><?php echo $ks8; ?></td>
						<th width="5%">
							<center>
								<font color="white"><?php echo $ks9; ?></td>
						<th width="5%">
							<center>
								<font color="white"><?php echo $ks10; ?></td>
						<th width="5%">
							<center>
								<font color="white"><?php echo $ks11; ?></td>
						<th width="5%">
							<center>
								<font color="white"><?php echo $ks12; ?></td>
					</tr>
					<?php
					$no = 1;
					$arr = getData($conn, $sql);
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
				<td>$motif</td>
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
				</tr>";
						$no++;
						$M++;
					} //while
					?>
				</table>
			</div>
		<?php
		} //distinct 


		$gab1 = "<h4>Hitung Jarak Eccludean Distance data '$nama_toko | $id_toko'</h4>
<b><i>$lap</b></i>
<table width='95%'>
  <tr bgcolor='#036'>
    <th width='3%'><center><font color='#ffffff'>No</td>
	 <th width='17%'><center><font color='#ffffff'>Kategori</td>
    <th width='70%'><center><font color='#ffffff'>Formula</td>
	<th width='5%'><center><font color='#ffffff'>Bobot</font></td>
  </tr>";
		$size = count($arNS);
		for ($k = 0; $k < $size; $k++) {
			$id_data = $arIS[$k];
			$nama_data = $arNS[$k];
			$valus_data = $arVS[$k];
			$KAT = $arKAT[$k];

			$no = $k + 1;
			$ar = getECC($arA[$k], $arUji);
			$bobot = $ar[0];
			$sbobot1 = $ar[1];
			$sbobot2 = $ar[2];
			$sbobot3 = $ar[3];
			$arBobot[$k] = $bobot;
			$arSBobot1[$k] = $sbobot1;
			$arSBobot2[$k] = $sbobot2;
			$arSKat[$k] = $KAT;
			$arIKat[$k] = $id_pengujian;

			$color = "#dddddd";
			if ($no % 2 == 0) {
				$color = "#eeeeee";
			}
			$gab1 .= "<tr bgcolor='$color'>
				<td valign='top'>$no</td>
				<td valign='top' align='left'>$KAT
				<td valign='top' align='left'><small><i>$sbobot1 = $sbobot2 =$sbobot3</small></i>
				<td valign='top' align='left'><small><i>$bobot</small></i>
				</tr>";
		}
		$gab1 .= "</table>";


		for ($i = 0; $i < $size; $i++) {
			for ($j = 0; $j < $size - 1 - $i; $j++) {
				if ($arBobot[$j + 1] < $arBobot[$j]) { //>ambil tertinggi, <ambil terendah
					swap($arBobot, $j, $j + 1);
					swap($arSBobot1, $j, $j + 1);
					swap($arSBobot2, $j, $j + 1);
					swap($arSKat, $j, $j + 1);
					swap($arIKat, $j, $j + 1);
				}
			}
		}

		$gab2 = "<h3>KNN KValue $k_value Terendah</h3>";
		$gab2 .= "<table width=\"95%\">
  <tr bgcolor=\"#036\">
    <th width=\"3%\"><center><font color=\"#ffffff\">No</td>
	 <th width=\"15%\"><center><font color=\"#ffffff\">Klasifikasi</td>
    <th width=\"70%\"><center><font color=\"#ffffff\">Formula</td>
	<th width=\"5%\"><center><font color=\"#ffffff\">Bobot</font></td>
  </tr>";
		$j1 = 0;
		$j2 = 0;
		$j3 = 0;

		$tot1 = 0;
		$tot2 = 0;
		$tot3 = 0;

		$ARM[0] = "tinggi";
		$ARM[1] = "rendah";
		$ARM[2] = "sedang";

		$rekapitulasi = "<ol>";
		for ($m = 0; $m < $k_value; $m++) {
			$no = $m + 1;
			$KAT = strtolower($arSKat[$m]);
			$idkat = $arIKat[$m];
			$bobot = $arBobot[$m];
			$sbobot1 = $arSBobot1[$m];
			$sbobot2 = $arSBobot2[$m];

			if ($KAT == $ARM[0]) {
				$j1++;
				$tot1 += $bobot;
			} //kat1
			else if ($KAT == $ARM[1]) {
				$j2++;
				$tot2 += $bobot;
			} //kat2
			else if ($KAT == $ARM[2]) {
				$j3++;
				$tot3 += $bobot;
			} //kat2

			$rekapitulasi .= "<li>$sbobot1 => $sbobot2 => $bobot #$KAT</li>";
			$color = "#dddddd";
			if ($no % 2 == 0) {
				$color = "#eeeeee";
			}
			$gab2 .= "<tr bgcolor=\"$color\">
				<td valign=\"top\">$no</td>
				<td valign=\"top\" align=\"left\">#" . $KAT . "
				<td valign=\"top\" align=\"left\"><small><i>$sbobot1 = $sbobot2</small></i>
				<td valign=\"top\" align=\"left\"><small><i>$bobot </small></i>
				</tr>";
		} //for
		$gab2 .= "</table>";

		$shasil = "?";
		$bobot = 0;
		if ($j1 >= $j2 && $j1 >= $j3) {
			$shasil = $ARM[0];
			$bobot = $tot1 / $j1;
		} else if ($j2 >= $j1 && $j2 >= $j3) {
			$shasil = $ARM[1];
			$bobot = $tot2 / $j2;
		} else if ($j3 >= $j1 && $j3 >= $j2) {
			$shasil = $ARM[2];
			$bobot = $tot3 / $j3;
		}

		$rekapitulasi .= "</ol>Status Dominan $k_value KNN ($j1:$j2:$j3) = <u>" . strtoupper($shasil) . " ($bobot)</u>";
		$gab2 .= "<h4>status Dominan $k_value KNN ($j1:$j2:$j3) = <u>" . strtoupper($shasil) . " ($bobot)</u></h4>";

		$hasil = "<h3>Analisa KNN an \"$NM\"  Dengan $k_value KNN ($j1:$j2:$j3)=>" . strtoupper($shasil) . "  ($bobot)</h3><div>$gab1 $gab2 </div>";
		$_SESSION["gab"] .= $hasil;


		//======================================================

		$hasilprint .= "<h3>Analisa an \"$NM\"  Dengan KNN $k_value KNN ($j1:$j2:$j3) =>" . strtoupper($shasil) . " ($bobot)</h3><div>$gab1 $gab2</div>";

		$sql = "update `$tbpengujian` set 
	`rekapitulasi`='$rekapitulasi',`kategori`='$shasil',`keterangan`='Kategori $k_value-> $shasil : $bobot'
	 where `id_pengujian`='$id_pengujian'";
		$ubah = process($conn, $sql);

		echo $hasilprint;
		$img = "<div align=\"right\"><img src=\"ypathicon/print.bmp\" width=\"50\" height=\"50\" title=\"PRINT\" OnClick=\"PRINTME()\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>";
		echo $img;
		$_SESSION["IDUJI"] = $IDUJI;
		?>

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
		$sql = "select distinct(`$kolom`) from `tb_penjualan` order by `$kolom` asc";
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