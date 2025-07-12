<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/png" href="assets/img/logo_sensor.png" />

    <!-- Core Css -->
    <link rel="stylesheet" href="assets_modern/css/styles.css" />
    <link rel="stylesheet" href="assets_modern/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" />
    <link href="assets/css/demo.css" rel="stylesheet" />

    <title>BATIK</title>
</head>

<body>

<?php
if (version_compare(phpversion(), "5.3.0", ">=")  == 1)
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
  error_reporting(E_ALL & ~E_NOTICE);
?>
<?php
session_start();
//error_reporting(0);
require_once "konmysqli.php";

$mnu = "";
if (isset($_GET["mnu"])) {
  $mnu = $_GET["mnu"];
}

date_default_timezone_set("Asia/Jakarta");


if (!isset($_SESSION["cid"])) {
  die("<script>location.href='login.php'</script>");
}

$kp1 = "Januari";
$kp2 = "Februari";
$kp3 = "Maret";
$kp4 = "April";
$kp5 = "Mei";
$kp6 = "Juni";
$kp7 = "Juli";
$kp8 = "Agustus";
$kp9 = "September";
$kp10 = "Oktober";
$kp11 = "November";
$kp12 = "Desember";

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

?>


<?php function RP($rupiah)
{
  return number_format($rupiah, "2", ",", ".");
} ?>
<?php
function WKT($sekarang)
{
  $tanggal = substr($sekarang, 8, 2) + 0;
  $bulan = substr($sekarang, 5, 2);
  $tahun = substr($sekarang, 0, 4);

  $judul_bln = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
  $wk = $tanggal . " " . $judul_bln[(int) $bulan] . " " . $tahun;
  return $wk;
}
?>
<?php
function WKTP($sekarang)
{
  $tanggal = substr($sekarang, 8, 2) + 0;
  $bulan = substr($sekarang, 5, 2);
  $tahun = substr($sekarang, 2, 2);

  $judul_bln = array(1 => "Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des");
  $wk = $tanggal . " " . $judul_bln[(int) $bulan] . "'" . $tahun;
  return $wk;
}
?>
<?php
function BAL($tanggal)
{
  $arr = explode(" ", $tanggal);
  if ($arr[1] == "Januari" || $arr[1] == "January") {
    $bul = "01";
  } else if ($arr[1] == "Februari" || $arr[1] == "February") {
    $bul = "02";
  } else if ($arr[1] == "Maret" || $arr[1] == "March") {
    $bul = "03";
  } else if ($arr[1] == "April") {
    $bul = "04";
  } else if ($arr[1] == "Mei" || $arr[1] == "May") {
    $bul = "05";
  } else if ($arr[1] == "Juni" || $arr[1] == "June") {
    $bul = "06";
  } else if ($arr[1] == "Juli" || $arr[1] == "July") {
    $bul = "07";
  } else if ($arr[1] == "Agustus" || $arr[1] == "August") {
    $bul = "08";
  } else if ($arr[1] == "September") {
    $bul = "09";
  } else if ($arr[1] == "Oktober" || $arr[1] == "October") {
    $bul = "10";
  } else if ($arr[1] == "November") {
    $bul = "11";
  } else if ($arr[1] == "Nopember") {
    $bul = "11";
  } else if ($arr[1] == "Desember" || $arr[1] == "December") {
    $bul = "12";
  }
  return "$arr[2]-$bul-$arr[0]";
}
?>


<?php
function BALP($tanggal)
{
  $arr = split(" ", $tanggal);
  if ($arr[1] == "Jan") {
    $bul = "01";
  } else if ($arr[1] == "Feb") {
    $bul = "02";
  } else if ($arr[1] == "Mar") {
    $bul = "03";
  } else if ($arr[1] == "Apr") {
    $bul = "04";
  } else if ($arr[1] == "Mei") {
    $bul = "05";
  } else if ($arr[1] == "Jun") {
    $bul = "06";
  } else if ($arr[1] == "Jul") {
    $bul = "07";
  } else if ($arr[1] == "Agu") {
    $bul = "08";
  } else if ($arr[1] == "Sep") {
    $bul = "09";
  } else if ($arr[1] == "Okt") {
    $bul = "10";
  } else if ($arr[1] == "Nov") {
    $bul = "11";
  } else if ($arr[1] == "Nop") {
    $bul = "11";
  } else if ($arr[1] == "Des") {
    $bul = "12";
  }
  return "$arr[2]-$bul-$arr[0]";
}
?>


<?php
function process($conn, $sql)
{
  $s = false;
  $conn->autocommit(FALSE);
  try {
    $rs = $conn->query($sql);
    if ($rs) {
      $conn->commit();
      $last_inserted_id = $conn->insert_id;
      $affected_rows = $conn->affected_rows;
      $s = true;
    }
  } catch (Exception $e) {
    echo 'fail: ' . $e->getMessage();
    $conn->rollback();
  }
  $conn->autocommit(TRUE);
  return $s;
}

function getJum($conn, $sql)
{

  $rs = $conn->query($sql);
  $jum = $rs->num_rows;
  $rs->free();
  return $jum;
}

function getField($conn, $sql)
{
  $rs = $conn->query($sql);
  $rs->data_seek(0);
  $d = $rs->fetch_assoc();
  $rs->free();
  return $d;
}

function getData($conn, $sql)
{
  $rs = $conn->query($sql);
  $rs->data_seek(0);
  $arr = $rs->fetch_all(MYSQLI_ASSOC);
  //foreach($arr as $row) {
  //  echo $row['nama_kelas'] . '*<br>';
  //}

  $rs->free();
  return $arr;
}


function getUser($conn, $kode)
{
  $field = "nama_user";
  $sql = "SELECT `$field` FROM `tb_user` where `id_user`='$kode'";
  $rs = $conn->query($sql);
  $rs->data_seek(0);
  $row = $rs->fetch_assoc();
  $rs->free();
  return $row[$field];
}


function getToko($conn, $kode)
{
  $field = "nama_toko";
  $sql = "SELECT `$field` FROM `tb_toko` where `id_toko`='$kode'";
  $rs = $conn->query($sql);
  $rs->data_seek(0);
  $row = $rs->fetch_assoc();
  $rs->free();
  return $row[$field];
}

function getIToko($conn, $kode)
{
  $kode = trim($kode);
  $kode = str_replace("Data dari Toko ", "", $kode);
  $kode = trim($kode);

  $field = "id_toko";
  $sql = "SELECT `$field` FROM `tb_toko` where `nama_toko` like '%$kode%'";
  $ada = getJum($conn, $sql);
  if ($ada < 1) {
    $ar = explode(" ", $kode);
    $jml = count($ar) - 1;
    $kode = $ar[$jml];
    $sql = "SELECT `$field` FROM `tb_toko` where `nama_toko` like '%$kode%'";
  }
  $rs = $conn->query($sql);
  $rs->data_seek(0);
  $row = $rs->fetch_assoc();
  $rs->free();
  return $row[$field];
}
?>

