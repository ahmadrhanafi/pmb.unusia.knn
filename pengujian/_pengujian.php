<?php

$pro="simpan";
$gambar0="avatar.jpg";
//$PATH="ypathcss";
?>
  

<script type="text/javascript"> 
function PRINT(pk){ 
win=window.open('pengujian/pengujian_print.php?pk='+pk,'win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, id_pengujian=0'); } 

</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<?php

$nama_pengujian="";
$id_user="";
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
$harga_permeter="";
$total_pembelian="";
$rekapitulasi="";
$kategori="";
$keterangan="";
				
				
if(isset($_GET["pro"]) && $_GET["pro"]=="ubah"){
	$id_pengujian=$_GET["kode"];
	$sql="select * from `$tbpengujian` where `id_pengujian`='$id_pengujian'";
	$d=getField($conn,$sql);
				$id_pengujian=$d["id_pengujian"];
				$id_pengujian0=$d["id_pengujian"];
				$id_toko=$d["id_toko"];
				$nama_pengujian=$d["nama_pengujian"];
				$id_user=$d["id_user"];
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
				$rekapitulasi=$d["rekapitulasi"];
				$kategori=$d["kategori"];
				$keterangan=$d["keterangan"];
				$pro="ubah";		
}
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
  <h3>Masukan Data pengujian</h3>
  <div>
			
<form action="" method="post" enctype="multipart/form-data">
<table class="table table-striped">

<tr>
<td>
<label for="id_toko">Pilih Toko</label>
<td>:<td colspan="5"><select name="id_toko" required class="form-control" id="id_toko">
  <?php  
  echo"<option value='$id_toko' ";echo">$id_toko</option>";
  
  $sql="select * from `$tbtoko`";
$arr=getData($conn,$sql);
		foreach($arr as $d) {							
				$id_toko0=$d["id_toko"];
				$nama_toko=$d["nama_toko"];
		echo"<option value='$id_toko0' ";if($id_toko0==$id_toko){echo"selected";} echo">$nama_toko ($id_toko0)</option>";
		}
?>
</select></td>
</tr>
<tr>
<td ><label for="nama_pengujian">Nama Pengujian</label>
<td>:<td  colspan="5"><input required  name="nama_pengujian" type="text" class="form-control" id="nama_pengujian" value="<?php echo $nama_pengujian;?>" size="25" /></td>
</tr>


<tr>
<td height="24"><label for="p1"><?php echo $kp1;?></label>
<td>:<td><input  required name="p1" type="text" class="form-control" id="p1" value="<?php echo $p1;?>" size="25" />
</td> 
<td height="24"><label for="p2"><?php echo $kp2;?></label>
<td>:<td><input  required name="p2" type="text" class="form-control" id="p2" value="<?php echo $p2;?>" size="25" />
</td>
</tr>

<tr>
<td height="24"><label for="p3"><?php echo $kp3;?></label>
<td>:<td><input  required name="p3" type="text" class="form-control" id="p3" value="<?php echo $p3;?>" size="25" />
</td> 
<td height="24"><label for="p4"><?php echo $kp4;?></label>
<td>:<td><input  required name="p4" type="text" class="form-control" id="p4" value="<?php echo $p4;?>" size="25" />
</td>
</tr>

<tr>
<td height="24"><label for="p5"><?php echo $kp5;?></label>
<td>:<td><input  required name="p5" type="text" class="form-control" id="p5" value="<?php echo $p5;?>" size="25" />
</td> 
<td height="24"><label for="p6"><?php echo $kp6;?></label>
<td>:<td><input  required name="p6" type="text" class="form-control" id="p6" value="<?php echo $p6;?>" size="25" />
</td>
</tr>

<tr>
<td height="24"><label for="p7"><?php echo $kp7;?></label>
<td>:<td><input  required name="p7" type="text" class="form-control" id="p7" value="<?php echo $p7;?>" size="25" />
</td> 
<td height="24"><label for="p8"><?php echo $kp8;?></label>
<td>:<td><input  required name="p8" type="text" class="form-control" id="p8" value="<?php echo $p8;?>" size="25" />
</td>
</tr>

<tr>
<td height="24"><label for="p9"><?php echo $kp9;?></label>
<td>:<td><input  required name="p9" type="text" class="form-control" id="p9" value="<?php echo $p9;?>" size="25" />
</td> 
<td height="24"><label for="p10"><?php echo $kp10;?></label>
<td>:<td><input  required name="p10" type="text" class="form-control" id="p10" value="<?php echo $p10;?>" size="25" />
</td>
</tr>

<tr>
<td height="24"><label for="p11"><?php echo $kp11;?></label>
<td>:<td><input  required name="p11" type="text" class="form-control" id="p11" value="<?php echo $p11;?>" size="25" />
</td> 
<td height="24"><label for="p12"><?php echo $kp12;?></label>
<td>:<td><input  required name="p12" type="text" class="form-control" id="p12" value="<?php echo $p12;?>" size="25" />
</td>
</tr>

 
 

<tr>
<td><label for="keterangan">Keterangan</label>
<td>:<td colspan="5">
<textarea name="keterangan" class="form-control" cols="55" rows="2"><?php echo $keterangan;?></textarea>
</td>
</tr>

<tr>
<td>
<td>
<td colspan="2">
<input name="Simpan" type="submit" id="Simpan" value="Simpan" />
<input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />

<input name="id_pengujian" type="hidden" id="id_pengujian" value="<?php echo $id_pengujian;?>" />
<input name="id_pengujian0" type="hidden" id="id_pengujian0" value="<?php echo $id_pengujian0;?>" />
<a href="?mnu=pengujian"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>
<br />
</div>



<?php  
$IDU=$_SESSION["cid"];
  $sqlc="select distinct(`id_toko`) from `$tbpengujian` where `id_user`='$IDU' order by `id_toko` asc";
  $jumc=getJum($conn,$sqlc);
		if($jumc <1){
		echo"<h1>Maaf data pengujian belum tersedia</h1>";
		}
	$arrc=getData($conn,$sqlc);
		foreach($arrc as $dc) {						
				$id_toko=$dc["id_toko"];
				?>
<h3>Data Pengujian Toko <?php echo getToko($conn,$id_toko)."|$id_toko"?>:</h3>
<div>				
 
| <img src='ypathicon/print.png' title='PRINT' OnClick="PRINT('<?php echo $id_toko;?>')"> |
<br>

<table class="table table-striped">
  <tr bgcolor="#cccccc">
    <th width="3%">No</td>
    <th width="20%">Nama Pengujian</td>
	<th width="5%"><?php echo $ks1;?></td>
	<th width="5%"><?php echo $ks2;?></td>
    <th width="5%"><?php echo $ks3;?></td>
    <th width="5%"><?php echo $ks4;?></td>
	<th width="5%"><?php echo $ks5;?></td>
	<th width="5%"><?php echo $ks6;?></td>
	<th width="5%"><?php echo $ks7;?></td>
	<th width="5%"><?php echo $ks8;?></td>
	<th width="5%"><?php echo $ks9;?></td>
	<th width="5%"><?php echo $ks10;?></td>
	<th width="5%"><?php echo $ks11;?></td>
    <th width="5%"><?php echo $ks12;?></td>
	<th width="10%">Kategori</td> 
	<th width="5%">Menu</td>
  </tr>
<?php  
  $sql="select * from `$tbpengujian` where  `id_toko`='$id_toko' and `id_user`='$IDU'  order by `kategori` asc";
  $jum=getJum($conn,$sql);
		if($jum > 0){
//--------------------------------------------------------------------------------------------
$batas   = 10;
$page = $_GET['page'];
if(empty($page)){$posawal  = 0;$page = 1;}
else{$posawal = ($page-1) * $batas;}

$sql2 = $sql." LIMIT $posawal,$batas";
$no = $posawal+1;
//--------------------------------------------------------------------------------------------									
	$arr=getData($conn,$sql2);
		foreach($arr as $d) {						
				$id_pengujian=$d["id_pengujian"];
				
				$id_user=$d["id_user"];
				$tanggal=WKTP($d["tanggal"]);
				$jam=$d["jam"];
				$nama_pengujian=$d["nama_pengujian"];
				$nama_user=getUser($conn,$d["id_user"]);
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
				$rekapitulasi=$d["rekapitulasi"];
				$kategori=$d["kategori"];
				$keterangan=$d["keterangan"];
			
				$color="#dddddd";		
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
		<td><small><i>$nama_pengujian, $tanggal $jam Wib</small></i></td>
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
				<td>$kategori</td>
				<td><div align='center'>
<a href='?mnu=knn&id=$id_pengujian'><img src='ypathicon/xls.png' title='Proses KNN $nama_pengujian'></a><br>
<a href='?mnu=pengujian&pro=ubah&kode=$id_pengujian'><img src='ypathicon/ub.png' title='ubah'></a>
<a href='?mnu=pengujian&pro=hapus&kode=$id_pengujian&nama_pengujian=$nama_pengujian'><img src='ypathicon/ha.png' title='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus data \"$nama_pengujian\" pada data id_pengujian ?..\")'></a></div></td>
				</tr>";
				
			$no++;
			}//for dalam
		}//if
		else{echo"<tr><td colspan='6'><blink>Maaf, Data pengujian belum tersedia...</blink></td></tr>";}
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=pengujian'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=pengujian'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=pengujian'>Next »</a></span>";
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

<?php
if(isset($_POST["Simpan"])){
	$pro=strip_tags($_POST["pro"]);
	$id_toko=strip_tags($_POST["id_toko"]);
	$nama_pengujian=strip_tags($_POST["nama_pengujian"]);
	$id_user=strip_tags($_SESSION["cid"]);
	$p1=strip_tags($_POST["p1"]);
	$p2=strip_tags($_POST["p2"]);
	$p3=strip_tags($_POST["p3"]);
	$p4=strip_tags($_POST["p4"]);
	$p5=strip_tags($_POST["p5"]);
	$p7=strip_tags($_POST["p7"]);
	$p8=strip_tags($_POST["p8"]);
	$p9=strip_tags($_POST["p9"]);
	$p10=strip_tags($_POST["p10"]);
	$p11=strip_tags($_POST["p11"]);
	$p12=strip_tags($_POST["p12"]);
	$jumlah_persediaan= $p1+$p2+$p3+$p4+$p5+$p6+$p7+$p8+$p9+$p10+$p11+$p12;
	$rekapitulasi="";
	$kategori="";
	$keterangan="";
	
	
if($pro=="simpan"){
  $sql=" INSERT INTO `$tbpengujian` (
`nama_pengujian` ,
`id_user` ,
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
`id_toko`,
`rekapitulasi`,
`kategori`,`tanggal`,`jam`,
`keterangan`
) VALUES (
'$nama_pengujian',
'".$_SESSION['cid']."', 
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
'$id_toko',
'',
'','".date("Y-m-d")."','".date("H:i:s")."',
'$keterangan'
)";
	
$simpan=process($conn,$sql);
	if($simpan) {
		
		$sql="select `id_pengujian` from `$tbpengujian` order by `id_pengujian` desc";
		$d=getField($conn,$sql);
		$id_pengujian=$d["id_pengujian"];
				
		echo "<script>alert('Data \"$nama_pengujian\" berhasil disimpan !');document.location.href='?mnu=knn&id=$id_pengujian';</script>";}
		else{echo"<script>alert('Data \"$nama_pengujian\" gagal disimpan...');document.location.href='?mnu=pengujian';</script>";}
	}
	else{
			$id_pengujian=strip_tags($_POST["id_pengujian"]);
	$id_pengujian0=strip_tags($_POST["id_pengujian0"]);
	
	$sql="update `$tbpengujian` set 
	`nama_pengujian`='$nama_pengujian',
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
	`keterangan`='$keterangan'
	 where `id_pengujian`='$id_pengujian0'";
	$ubah=process($conn,$sql);
		if($ubah) {echo "<script>alert('Data berhasil diubah !');document.location.href='?mnu=knn&id=$id_pengujian';</script>";}
		else{echo"<script>alert('Data  gagal diubah...');document.location.href='?mnu=pengujian';</script>";}
	}//else simpan
}
?>

<?php
if(isset($_GET["pro"]) && $_GET["pro"]=="hapus"){
$id_pengujian=$_GET["kode"];
$nama_pengujian=$_GET["nama_pengujian"];
$sql="delete from `$tbpengujian` where `id_pengujian`='$id_pengujian'";
$hapus=process($conn,$sql);
	if($hapus) {echo "<script>alert('Data berhasil dihapus !');document.location.href='?mnu=pengujian';</script>";}
	else{echo"<script>alert('Data gagal dihapus...');document.location.href='?mnu=pengujian';</script>";}
}
?>

