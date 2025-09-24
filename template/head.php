<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme">

<head>
  <!-- Required meta tags -->
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Favicon icon-->
  <link rel="shortcut icon" type="image/png" href="assets/img/unusia.png" />

  <link rel="stylesheet" href="assets_modern/css/styles.css" />
  <link rel="stylesheet" href="assets_modern/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link href="assets/css/demo.css" rel="stylesheet" />

  <title><?= getTitle($mnu, $translations); ?></title>
</head>

<style>
  /* Light Mode */
  body {
    background-color: #ffffff;
    color: #212529;
    transition: all 0.3s ease;
  }

  .fa-brands {
    color: #ffffff !important;
  }

  .fa-brands:hover {
    color: #1e1e1e !important;
  }

  li.search-option:hover {
    background-color: #28f75554 !important;
    border-radius: 8px;
  }

  /* Dark Mode */
  .dark-mode,
  .dark-mode body {
    background-color: #121212 !important;
    color: #e9ecef !important;
  }

  .dark-mode .card,
  .dark-mode .navbar,
  .dark-mode .topbar,
  .dark-mode .left-sidebar,
  .dark-mode .page-wrapper,
  .dark-mode .modal-content {
    background-color: #1e1e1e !important;
    color: #e9ecef !important;
  }

  .dark-mode .ti-menu-2,
  .dark-mode .ti-dots,
  .dark-mode p,
  .dark-mode h1,
  .dark-mode h2,
  .dark-mode h3,
  .dark-mode h4,
  .dark-mode h5,
  .dark-mode h6,
  .dark-mode small,
  .dark-mode .level,
  .dark-mode span {
    color: #f1f1f1 !important;
  }

  .dark-mode h6.hlink,
  .dark-mode .ilink {
    color: #28a745 !important;
  }

  .dark-mode a,
  .dark-mode label,
  .dark-mode label,
  .dark-mode select {
    color: #f1f1f1 !important;
  }

  .dark-mode .fa-brands {
    color: #1e1e1e !important;
  }

  .dark-mode .fa-brands:hover {
    color: #f1f1f1 !important;
  }

  .dark-mode option,
  .dark-mode optgroup {
    background-color: #1e1e1e !important;
  }

  .dark-mode .dropdown-menu,
  .dark-mode .modal-header,
  .dark-mode .simplebar-content {
    background-color: #1e1e1e !important;
    color: #f1f1f1;
  }

  .dark-mode span.lang,
  .dark-mode .dropdown-item {
    color: #f1f1f1 !important;
  }

  .dark-mode span.lang:hover,
  .dark-mode .dropdown-item:hover {
    background-color: #1e1e1e !important;
    color: #28a745 !important;
  }

  .dark-mode li.search-option:hover {
    background-color: #28f75554 !important;
    border-radius: 8px;
  }

  .dark-mode a:hover {
    color: #28a745 !important;
  }

  .table.table-dark {
    background-color: #1e1e1e;
    color: #e9ecef;
  }

  .dark-mode h2#swal2-title {
    color: #1e1e1e !important;
  }
</style>

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

  $kp1 = "Jalur Pendaftaran";
  $kp2 = "Tanggal Daftar";
  $kp3 = "Gelombang";
  $kp4 = "Sistem Kuliah";
  $kp5 = "Jenis Kelamin";
  $kp6 = "Nilai Lulusan";
  $kp7 = "Tahun Lulus";
  $kp8 = "Jenjang Pendidikan";
  $kp9 = "Jenis Institusi";
  $kp10 = "Jurusan Sekolah";
  $kp11 = "Provinsi Institusi";
  $kp12 = "Prodi Diterima";

  $ks1  = "Jalur Pendaftaran";
  $ks2 = "Tanggal Daftar";
  $ks3  = "Gelombang";
  $ks4  = "Sistem Kuliah";
  $ks5  = "Jenis Kelamin";
  $ks6  = "Nilai Lulusan";
  $ks7  = "Tahun Lulus";
  $ks8  = "Jenjang Pendidikan";
  $ks9  = "Jenis Institusi";
  $ks10 = "Jurusan Sekolah";
  $ks11  = "Provinsi Institusi";
  $ks12 = "Prodi Diterima";

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
    $arr = explode(" ", $tanggal);
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
    $sql = "SELECT `$field` FROM `tb_user` WHERE `id_user` = '$kode' LIMIT 1";
    $rs = $conn->query($sql);

    if ($rs && $rs->num_rows > 0) {
      $row = $rs->fetch_assoc();
      $rs->free();
      return $row[$field];
    } else {
      return null;
    }
  }

  function getTahun($conn, $kode)
  {
    $field = "nama_tahun";
    $sql = "SELECT `$field` FROM `tb_tahun` WHERE `id_tahun`='$kode'";
    $rs = $conn->query($sql);

    if ($rs && $rs->num_rows > 0) {
      $row = $rs->fetch_assoc();
      $rs->free();
      return $row[$field];
    } else {
      return "";
    }
  }

  function getITahun($conn, $kode)
  {
    $kode = trim($kode);
    $kode = str_replace("Data berdasarkan Tahun ", "", $kode);
    $kode = trim($kode);

    $field = "id_tahun";
    $sql = "SELECT `$field` FROM `tb_tahun` WHERE `nama_tahun` LIKE '%$kode%'";
    $ada = getJum($conn, $sql);

    if ($ada < 1) {
      $ar = explode(" ", $kode);
      $jml = count($ar) - 1;
      $kode = $ar[$jml];
      $sql = "SELECT `$field` FROM `tb_tahun` WHERE `nama_tahun` LIKE '%$kode%'";
    }

    $rs = $conn->query($sql);
    if ($rs && $rs->num_rows > 0) {
      $row = $rs->fetch_assoc();
      $rs->free();
      return $row[$field];
    } else {
      return null;
    }
  }

  ?>

</body>