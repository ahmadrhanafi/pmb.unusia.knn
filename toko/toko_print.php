<style type="text/css">body {width: 100%;} </style> 
<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
include "../konmysqli.php";
echo"<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
$YPATH="../ypathfile/";
  ?>


 

<table width="98%" border="0">
  <tr>
    <th width="3%">No</td>
     <th width="10%">ID toko</td>
    <th width="30%">Nama toko</td>
	<th width="45%">Deskripsi</td>
  </tr>
<?php  
 $sql="select * from `$tbtoko` order by `id_toko` desc";
  $jum=getJumM($conn,$sql);
  $no=0;
		if($jum > 0){
	$arr=getDataM($conn,$sql);
		foreach($arr as $d) {								
		$no++;
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
				</tr>";
				}
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data  belum tersedia...</blink></td></tr>";}
	
	echo"</table>";
	?>