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