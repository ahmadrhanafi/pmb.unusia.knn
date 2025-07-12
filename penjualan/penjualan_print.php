<style type="text/css">body {width: 100%;} </style> 
<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
include "../konmysqli.php";
echo"<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
$YPATH="../ypathfile/";
$pk="";
$field="id_toko";
$TB=$tbpenjualan;
$item="Penjualan";

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


  $sql="select * from `$TB` order by `$field` asc";
  if(isset($_GET["pk"])){
	$pk=$_GET["pk"];
		$sql="select * from `$TB` where `$field`='$pk' order by `$field` asc";
  }

  echo "<h3><center>Laporan Data  $item Toko ".getToko($conn,$pk)."</h3>";
  ?>


 

<table width="98%" border="0">
  <tr>
     <th width="3%">No</td>
	<th width="15%">Motif</td>
	<th width="5%"><?php echo $ks1;?></td>
	<th width="5%"><?php echo $ks2;?></td>
    <th width="5%"><?php echo $ks3;?></td>
    <th width="5%"><?php echo $ks4;?></td>
	<th width="5%"><?php echo $ks5;?></td>
	<th width="5%"><?php echo $ks6;?></td>
	<th width="5%"><?php echo $ks7;?></td>
	<th width="5%"><?php echo $ks8;?></td>
	<th width="5%"><?php echo $ks9;?></td>
	<th width="5%"><?php echo $ks5;?></td>
	<th width="5%"><?php echo $ks11;?></td>
    <th width="5%"><?php echo $ks12;?></td>
	<th width="5%">Jumlah</td>
	<th width="15%">Kategori</td>
  </tr>
<?php  
  $jum=getJumM($conn,$sql);
  $no=0;
		if($jum > 0){
	$arr=getDataM($conn,$sql);
		foreach($arr as $d) {								
		$no++;
				$id_penjualan=$d["id_penjualan"];
				$motif=$d["motif"];
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
				$jumlah_persediaan=$d["jumlah_persediaan"];
				$kategori=$d["kategori"];
				$keterangan=$d["keterangan"];
				
			
				$color="#dddddd";		
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
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
				</tr>";
				}
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data $item belum tersedia...</blink></td></tr>";}
	
	echo"</table>";
	?>
	
    <?php
	function getToko($conn,$kode){
$field="nama_toko";
$sql="SELECT `$field` FROM `tb_toko` where `id_toko`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}	
	?>