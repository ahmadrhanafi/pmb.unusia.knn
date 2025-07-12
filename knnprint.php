<style type="text/css">body {width: 100%;} </style> 
<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
session_start();
require_once"konmysqli.php";
$css="greenblack.css";//greenblack flickr
echo"<link href='ypathcss/$css' rel='stylesheet' type='text/css' />";
$YPATH="ypathfile/";
 

	$id_penilaian=$_SESSION["IDUJI"];
	
$ks1 = "Jan";
$ks2 = "Feb";
$ks3 = "Mar";
$ks4 = "Apr";
$ks5 = "Mei";
$ks6 = "Jun";
$ks7 = "Jul";
$ks8 = "Agu";
$ks9 = "Sep";
$ks10 = "Okt";
$ks11 = "Nov";
$ks12 = "Des";	

$sql="select * from `$tbpengujian` order by `id_pengujian` desc";
if(isset($_GET["id"])){
	$id_pengujian=$_GET["id"];
	$sql="select * from `$tbpengujian` where `id_pengujian`='$id_pengujian'";
}

	$d=getFieldM($conn,$sql);
				$id_pengujian=$d["id_pengujian"];
				$id_toko=$d["id_toko"];
				$nama_pengujian=$d["nama_pengujian"];
				$nama_toko=getTokoM($conn,$id_toko);
				$NM=$nama_pengujian;
				$IDUJI=$id_pengujian;
				$id_user=$d["id_user"];
				$nama_user=getUserM($conn,$id_user);
				$p1=$d["p1"];
				$p2=$d["p2"];
				$p3=$d["p3"];
				$p4=$d["p4"];
				$p5=$d["p5"];
				$p6=$d["p6"];
				$p7=$d["p7"];
				$p8=$d["p8"];
				$p9=$d["p9"];
				$p10=$d["p10"];
				$p11=$d["p11"];
				$p12=$d["p12"];
					$arUji[0]=$p1;
					$arUji[1]=$p2;
					$arUji[2]=$p3;
					$arUji[3]=$p4;
					$arUji[4]=$p5;
					$arUji[5]=$p6;
					$arUji[6]=$p7;
					$arUji[7]=$p8;
					$arUji[8]=$p9;
					$arUji[9]=$p10;
					$arUji[10]=$p11;
					$arUji[11]=$p12;
				
				$jumlah_persediaan=$d["jumlah_persediaan"];
				$rekapitulasi=$d["rekapitulasi"];
				$kategori=$d["kategori"];
				$keterangan=$d["keterangan"];
				$tanggal=WKTM($d["tanggal"]);
				$jam=$d["jam"];
				
				$DES="Nama Toko $nama_toko";
				
				$lap="$ks1: $p1, $ks2: $p2, $ks3: $p3, $ks4: $p4, $ks5: $p5, $ks6: $p6, $ks7: $p7, $ks8: $p8, $ks9: $p9, $ks10: $p10, $ks11: $p11, $ks12: $p12 ";
				
	?>

<h3>Analisa Data penilaian</h3>

<table width="60%">

<th width="30%"><label for="id_user">ID pengujian</label>
<th width="1%">:
<th colspan="2"><?php echo $id_pengujian;?></tr>

<tr>
<td height="24"><label for="nama">Nama pengujian</label>
<td>:<td><?php echo $NM." <i></i>";?>
</td>
</tr>

<tr>
<td height="24"><label for="deskripsi">Deskripsi</label>
<td>:<td><?php echo $DES;?>
</td>
</tr>

<tr>
<td height="24"><label for="deskripsi">PJ Bimbingan</label>
<td>:<td><?php echo "$nama_user /$id_user Waktu: $tanggal $jam WIB";?>
</td>
</tr>

<tr>
<td height="24"><label for="keterangan">Transaksi Penjualan*</label>
<td>:<td><?php echo $lap;?>
</td>
</tr>


<tr>
<td height="24"><label for="keterangan">Catatan PJ Bimbingan*</label>
<td>:<td><?php echo $keterangan;?>
</td>
</tr>



</table>

<br>
<hr>
<?php

echo $_SESSION["gab"]; 


function getUserM($conn,$kode){
$field="nama_user";
$sql="SELECT `$field` FROM `tb_user` where `id_user`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}


function getTokoM($conn,$kode){
$field="nama_toko";
$sql="SELECT `$field` FROM `tb_toko` where `id_toko`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}	
	
	
	?>