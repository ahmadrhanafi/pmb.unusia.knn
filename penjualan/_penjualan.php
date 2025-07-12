<?php

$pro="simpan";
$gambar0="avatar.jpg";
//$PATH="ypathcss";
?>
  

<script type="text/javascript"> 
function PRINT(pk){ 
win=window.open('penjualan/penjualan_print.php?pk='+pk,'win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, id_penjualan=0'); } 

</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<?php

$id_toko="";
$motif="";
$p1="";
$p2="";
$p3="";
$p4="";
$p5="";
$p6="";
$p7="";
$p8="";
$p9="";
$p10="";
$p11="";
$p12="";
$jumlah_persediaan="";
$kategori="";
$keterangan="";
				 
?>
 <link rel="stylesheet" href="jsacordeon/jquery-ui.css">
  <link rel="stylesheet" href="resources/demos/style.css">
<script src="jsacordeon/jquery-1.12.4.js"></script>
  <script src="jsacordeon/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#accordion" ).accordion({
      collapsible: true
    });
  } );
  </script>
	
	
    <div id="accordion"> 

<?php  
  $sqlc="select distinct(`id_toko`) from `$tbpenjualan` order by `id_toko` asc";
  $jumc=getJum($conn,$sqlc);
		if($jumc <1){
		echo"<h1>Maaf data penjualan belum tersedia</h1>";
		}
	$arrc=getData($conn,$sqlc);
		foreach($arrc as $dc) {						
				$id_toko=$dc["id_toko"];
				?>
<h3>Data Penjualan Toko <?php echo getToko($conn,$id_toko)."|$id_toko"?>:</h3>
<div>				
 
| <img src='ypathicon/print.png' title='PRINT' OnClick="PRINT('<?php echo $id_toko;?>')"> |
<br>

<table class="table table-striped">
  <tr bgcolor="#cccccc">
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
  $sql="select * from `$tbpenjualan` where  `id_toko`='$id_toko' order by `kategori` asc";
  $jum=getJum($conn,$sql);
		if($jum > 0){
//--------------------------------------------------------------------------------------------
$batas   = 50;
$page = $_GET['page'];
if(empty($page)){$posawal  = 0;$page = 1;}
else{$posawal = ($page-1) * $batas;}

$sql2 = $sql." LIMIT $posawal,$batas";
$no = $posawal+1;
//--------------------------------------------------------------------------------------------									
	$arr=getData($conn,$sql2);
		foreach($arr as $d) {						
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
				
			$no++;
			}//for dalam
		}//if
		else{echo"<tr><td colspan='6'><blink>Maaf, Data penjualan belum tersedia...</blink></td></tr>";}
?>
</table>

<?php
$jmldata = $jum;
if($jmldata>0){
	if($batas<1){$batas=1;}
	$jmlhal  = ceil($jmldata/$batas);
	echo "<div class=paging>";
	if($page > 1){
		$prev=$page-1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=_penjualan'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=_penjualan'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=_penjualan'>Next »</a></span>";
	}
	else{ echo "<span class=disabled>Next »</span>";}
	echo "</div>";
	}//if jmldata

$jmldata = $jum;
echo "<p align=center>Total data <b>$jmldata</b> item</p>";

echo"</div>";
}//for atas
?>


</div>