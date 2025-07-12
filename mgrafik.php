<?php  
$kolom="kategori";
$mydata="";
 $sqlc="select distinct(`$kolom`) from `$tbpenjualan` ";
 	$arrc=getData($conn,$sqlc);
		foreach($arrc as $dc) {	
		$var=$dc["$kolom"];
			 $sql="select `$kolom` from `$tbpenjualan` where `$kolom`='$var'";
				$jum=getJum($conn,$sql);
			
			$mydata.="['$var',$jum],";
			$nom++;
		}//for
$mydata=substr($mydata,0,strlen($mydata)-1);
//echo $mydata;
?> 

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Basis Data', 'Jumlah'],
          <?php echo $mydata;?>
        ]);

        var options = {
          title: 'Sebaran Data Berdasarkan XYZ',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
  </body>
</html>

<hr>


<?php  
$kolom="kategori";
$kolom2="id_toko";

$mydata="";
$nom=0;
 $sqlc="select distinct(`$kolom`) from `$tbpenjualan` ";
 	$arrc=getData($conn,$sqlc);
		$nom=0;
		foreach($arrc as $dc) {	
		$var=$dc["$kolom"];
			 $sql="select `$kolom` from `$tbpenjualan` where  `$kolom`='$var' and `$kolom2`='X'";
				$jum1=getJum($conn,$sql);
				$arJ[$nom][0]=$jum1;
			
				$sql="select `$kolom` from `$tbpenjualan` where  `$kolom`='$var' and `$kolom2`='Y'";
				$jum2=getJum($conn,$sql);
				$arJ[$nom][1]=$jum2;
				
				$sql="select `$kolom` from `$tbpenjualan` where  `$kolom`='$var' and `$kolom2`='Z'";
				$jum3=getJum($conn,$sql);
				$arJ[$nom][2]=$jum3;
				
				$sql="select `$kolom` from `$tbpenjualan` where  `$kolom`='$var' and `$kolom2`='ABC'";
				$jum4=getJum($conn,$sql);
				$arJ[$nom][3]=$jum4; 
				
				$mydata.="['$kolom',$jum1,$jum2,$jum3,$jum4],";
			$nom++;
		}//for
$mydata=substr($mydata,0,strlen($mydata)-1);
//echo $mydata;
?> 
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['BASISDATA', 'POS+POS', 'POS+NEG', 'NEG+POS','NEG+NEG'],<?php echo $mydata;?>
        ]);

        var options = {
          chart: {
            title: 'Grafik Sebaran Data  <?php echo $nom;?>',
            subtitle: 'Data Valid 2021',
          },
          bars: 'horizontal' 
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="barchart_material" style="width: 900px; height: 500px;"></div>
  </body>
</html>
