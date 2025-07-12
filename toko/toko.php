<?php

$pro="simpan";
$gambar0="avatar.jpg";
//$PATH="ypathcss";
?>
  

<script type="text/javascript"> 
function PRINT(){ 
win=window.open('toko/toko_print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, id_toko=0'); } 

</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<?php
  $sql="select `id_toko` from `$tbtoko` order by `id_toko` desc";
  $jum= getJum($conn,$sql);
  $kd="TKO";
		if($jum > 0){
				$d=getField($conn,$sql);
    			$idmax=$d['id_toko'];	
				$urut=substr($idmax,3,2)+1;//01
				if($urut<10){$idmax="$kd"."0".$urut;}
				else{$idmax="$kd".$urut;}
			}
		else{$idmax="$kd"."01";}
  $id_toko=$idmax;
?>
<?php

$nama_toko="";
$deskripsi="";
				
if(isset($_GET["pro"]) && $_GET["pro"]=="ubah"){
	$id_toko=$_GET["kode"];
	$sql="select * from `$tbtoko` where `id_toko`='$id_toko'";
	$d=getField($conn,$sql);
				$id_toko=$d["id_toko"];
				$id_toko0=$d["id_toko"];
				$nama_toko=$d["nama_toko"];
				$deskripsi=$d["deskripsi"];
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
  <h3>Masukan Data Toko</h3>
  <div>
			
<form action="" method="post" enctype="multipart/form-data">
<table class="table table-striped">
<tr>
<th width="20%"><label for="id_toko">ID Toko</label>
<th width="1%">:
<th colspan="2"><b><?php echo $id_toko;?></b></tr>


<tr>
<td height="24"><label for="nama_toko">Nama Toko</label>
<td>:<td><input required class="form-control" name="nama_toko" type="text" id="nama_toko" value="<?php echo $nama_toko;?>" size="25" /></td>
</tr>

<tr>
<td height="24"><label for="deskripsi">Deskripsi</label>
<td>:<td>
<textarea name="deskripsi" class="form-control" cols="55" rows="2"><?php echo $deskripsi;?></textarea>
</td>
</tr>

<tr>
<td>
<td>
<td colspan="2"><input name="Simpan" type="submit" id="Simpan" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
       
        <input name="id_toko" type="hidden" id="id_toko" value="<?php echo $id_toko;?>" />
        <input name="id_toko0" type="hidden" id="id_toko0" value="<?php echo $id_toko0;?>" />
        <a href="?mnu=id_toko"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>
<br />
</div>

<h3>Data Toko:</h3>
<div>				
 
| <img src='ypathicon/print.png' title='PRINT' OnClick="PRINT()"> |
<br>

<table class="table table-striped">
  <tr bgcolor="#cccccc">
    <th width="3%">No</td>
    <th width="10%">ID toko</td>
    <th width="30%">Nama toko</td>
	<th width="55%">Deskripsi</td>
	<th width="15%">Menu</td>
  </tr>
<?php  
  $sql="select * from `$tbtoko` order by `id_toko` desc";
  $jum=getJum($conn,$sql);
		if($jum > 0){ 		
$no=1;		
	$arr=getData($conn,$sql);
		foreach($arr as $d) {						
				$id_toko=$d["id_toko"];
				$nama_toko=$d["nama_toko"];
				$deskripsi=$d["deskripsi"];
				
			
				$color="#dddddd";		
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>$id_toko</td>
				<td>$nama_toko</td>
				<td>$deskripsi</td>
				<td><div align='center'>
<a href='?mnu=toko&pro=ubah&kode=$id_toko'><img src='ypathicon/ub.png' title='ubah'></a>
<a href='?mnu=toko&pro=hapus&kode=$id_toko&nama_toko=$nama_toko'><img src='ypathicon/ha.png' title='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus data \"$nama_toko\" pada data id_toko ?..\")'></a></div></td>
				</tr>";
				
			$no++;
			}//for dalam
		}//if
		else{echo"<tr><td colspan='6'><blink>Maaf, Data toko belum tersedia...</blink></td></tr>";}
?>
</table>

<?php 
$jmldata = $jum;
echo "<p align=center>Total data <b>$jmldata</b> item</p>";

echo"</div>";
?>


</div>

<?php
if(isset($_POST["Simpan"])){
	$pro=strip_tags($_POST["pro"]);
	$id_toko=strip_tags($_POST["id_toko"]);
	$id_toko0=strip_tags($_POST["id_toko0"]);
	$nama_toko=strip_tags($_POST["nama_toko"]);
	$deskripsi=strip_tags($_POST["deskripsi"]);
	
	
if($pro=="simpan"){
  $sql=" INSERT INTO `$tbtoko` (
`id_toko` ,
`nama_toko` ,
`deskripsi`
) VALUES (
'$id_toko', 
'$nama_toko',
'$deskripsi'
)";
	
$simpan=process($conn,$sql);
	if($simpan) {echo "<script>alert('Data \"$nama_toko\" berhasil disimpan !');document.location.href='?mnu=toko';</script>";}
		else{echo"<script>alert('Data \"$nama_toko\" gagal disimpan...');document.location.href='?mnu=toko';</script>";}
	}
	else{
	$sql="update `$tbtoko` set 
	`nama_toko`='$nama_toko',
	`deskripsi`='$deskripsi'
	 where `id_toko`='$id_toko0'";
	$ubah=process($conn,$sql);
		if($ubah) {echo "<script>alert('Data \"$nama_toko\" berhasil diubah !');document.location.href='?mnu=toko';</script>";}
		else{echo"<script>alert('Data \"$nama_toko\" gagal diubah...');document.location.href='?mnu=toko';</script>";}
	}//else simpan
}
?>

<?php
if(isset($_GET["pro"]) && $_GET["pro"]=="hapus"){
$id_toko=$_GET["kode"];
$nama_toko=$_GET["nama_toko"];
$sql="delete from `$tbtoko` where `id_toko`='$id_toko'";
$hapus=process($conn,$sql);
	if($hapus) {echo "<script>alert('Data \"$nama_toko\" berhasil dihapus !');document.location.href='?mnu=toko';</script>";}
	else{echo"<script>alert('Data \"$nama_toko\" gagal dihapus...');document.location.href='?mnu=toko';</script>";}
}
?>

