<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $tittle; ?></title>
  <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
  <link href="assets/css/font-awesome.css" rel="stylesheet">
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/css/slick.css">
  <link rel="stylesheet" href="assets/css/jquery.fancybox.css" type="text/css" media="screen" />
  <link id="switcher" href="assets/css/theme-color/default-theme.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">

  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,300,300italic,500,700' rel='stylesheet' type='text/css'>

</head>

<body>

  <a class="scrollToTop" href="#">
    <i class="fa fa-angle-up"></i>
  </a>

  <header id="mu-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="mu-header-area">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="mu-header-top-left">
                  <div class="mu-top-email">
                    <i class="fa fa-envelope"></i>
                    <span>info@email.com</span>
                  </div>
                  <div class="mu-top-phone">
                    <i class="fa fa-phone"></i>
                    <span>(+62) 21-7872772</span>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="mu-header-top-right">
                  <nav>
                    <ul class="mu-top-social-nav">
                      <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                      <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                      <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                      <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
                      <li><a href="#"><span class="fa fa-youtube"></span></a></li>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <section id="mu-menu">
    <nav class="navbar navbar-default" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Menu Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php?mnu=home"><i class="fa fa-university"></i><span>Web Motif</span></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
            <?php
            if ($_SESSION["cstatus"] == "Super Admin") {
              echo "
	  <li ";
              if ($mnu == "home") {
                echo "class='active'";
              }
              echo "><a href='index.php?mnu=home'>Home</a></li>
      <li ";
              if ($mnu == "user") {
                echo "class='active'";
              }
              echo "><a href='index.php?mnu=user'>Pengguna</a></li>
	   <li ";
              if ($mnu == "toko") {
                echo "class='active'";
              }
              echo "><a href='index.php?mnu=toko'>Toko</a></li>
	   <li ";
              if ($mnu == "penjualan") {
                echo "class='active'";
              }
              echo "><a href='index.php?mnu=penjualan'>Penjualan</a></li> 
	   <li ";
              if ($mnu == "pengujian") {
                echo "class='active'";
              }
              echo "><a href='index.php?mnu=pengujian'>Pengujian</a></li> 
	   <li ";
              if ($mnu == "knn") {
                echo "class='active'";
              }
              echo "><a href='index.php?mnu=knn'>Analisa</a></li> 
      <li ";
              if ($mnu == "logout") {
                echo "class='active'";
              }
              echo "><a href='index.php?mnu=logout'>Logout</a></li>";
            } else if ($_SESSION["cstatus"] == "Staf Admin") {
              echo "
	  <li ";
              if ($mnu == "home") {
                echo "class='active'";
              }
              echo "><a href='index.php?mnu=home'>Home</a></li>
      <li ";
              if ($mnu == "profil") {
                echo "class='active'";
              }
              echo "><a href='index.php?mnu=profil'>Profil Pengguna</a></li>
	   <li ";
              if ($mnu == "_toko") {
                echo "class='active'";
              }
              echo "><a href='index.php?mnu=_toko'>Toko</a></li>
	   <li ";
              if ($mnu == "_penjualan") {
                echo "class='active'";
              }
              echo "><a href='index.php?mnu=_penjualan'>Penjualan</a></li> 
	   <li ";
              if ($mnu == "_pengujian") {
                echo "class='active'";
              }
              echo "><a href='index.php?mnu=_pengujian'>Pengujian</a></li> 
      <li ";
              if ($mnu == "logout") {
                echo "class='active'";
              }
              echo "><a href='index.php?mnu=logout'>Logout</a></li>";
            } else {
              echo "<li><a href='index.php?mnu=home'>Home</a></li>";
              echo "<li><a href='login.php'>Login</a></li>";
            }
            ?>
          </ul>
        </div>
        <!--/.nav-collapse -->
      </div>
    </nav>
  </section>
  <!-- End menu -->
  <!-- Start search box -->
  <div id="mu-search">
    <div class="mu-search-area">
      <button class="mu-search-close"><span class="fa fa-close"></span></button>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <form class="mu-search-form">
              <input type="search" placeholder="Type Your Keyword(s) & Hit Enter">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End search box -->
  <!-- Start Slider --><?php if ($mnu == "home" || $mnu == "") { ?>
    <section id="mu-slider">
      <!-- Start single slider item -->
      <div class="mu-slider-single">
        <div class="mu-slider-img">
          <figure>
            <img src="assets/img/slider/knn1.png" alt="img">
          </figure>
        </div>
        <div class="mu-slider-content">
          <h4>Aplikasi Klasifikasi Motif Kain yg Paling Diminati</h4>
          <span></span>
          <h2></h2>
          <p></p>
        </div>
      </div>
      <!-- Start single slider item -->
      <!-- Start single slider item -->
      <div class="mu-slider-single">
        <div class="mu-slider-img">
          <figure>
            <img src="assets/img/slider/knn1.png" alt="img">
          </figure>
        </div>
        <div class="mu-slider-content">
          <h4>Aplikasi Klasifikasi Motif Kain yg Paling Diminati</h4>
          <span></span>
          <h2></h2>
          <p></p>
        </div>
      </div>
      <!-- Start single slider item -->
      <!-- Start single slider item -->
      <div class="mu-slider-single">
        <div class="mu-slider-img">
          <figure>
            <img src="assets/img/slider/knn1.png" alt="img">
          </figure>
        </div>
        <div class="mu-slider-content">
          <h4>Aplikasi Klasifikasi Motif Kain yg Paling Diminati</h4>
          <span></span>
          <h2></h2>
          <p></p>
        </div>
      </div>
      <!-- Start single slider item -->
    </section>
    <!-- End Slider -->
    <!-- Start service  -->
    <section id="mu-service">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <div class="mu-service-area">
              <!-- Start single service -->
              <div class="mu-service-single">
                <span class="fa fa-book"></span>
                <h3>Learn Online</h3>
                <p></p>
              </div>
              <!-- Start single service -->
              <!-- Start single service -->
              <div class="mu-service-single">
                <span class="fa fa-users"></span>
                <h3>Expert Teachers</h3>
                <p></p>
              </div>
              <!-- Start single service -->
              <!-- Start single service -->
              <div class="mu-service-single">
                <span class="fa fa-table"></span>
                <h3>Best Classrooms</h3>
                <p></p>
              </div>
              <!-- Start single service -->
            </div>
          </div>
        </div>
      </div>
    </section>



  <?php } ?>
  <!-- End service  -->

  <!-- Start about us -->
  <section id="mu-about-us">
    <div class="container">
      <?php


      if ($mnu == "user") {
        require_once "user/user.php";
      } else if ($mnu == "profil") {
        require_once "user/profil.php";
      } else if ($mnu == "profil2") {
        require_once "user/profil2.php";
      } else if ($mnu == "toko") {
        require_once "toko/toko.php";
      } else if ($mnu == "penjualan") {
        require_once "penjualan/penjualan.php";
      } else if ($mnu == "pengujian") {
        require_once "pengujian/pengujian.php";
      } else if ($mnu == "_toko") {
        require_once "toko/_toko.php";
      } else if ($mnu == "_penjualan") {
        require_once "penjualan/_penjualan.php";
      } else if ($mnu == "_pengujian") {
        require_once "pengujian/_pengujian.php";
      } else if ($mnu == "login") {
        require_once "login.php";
      } else if ($mnu == "logout") {
        require_once "logout.php";
      } else if ($mnu == "knn") {
        require_once "knn.php";
      } else {
        require_once "home.php";
      }


      ?>
    </div>
  </section>
  <footer id="mu-footer">
    <div class="mu-footer-bottom">
      <div class="container">
        <div class="mu-footer-bottom-area">
          <p>&copy; All Right Reserved. Designed by <a href="http://www.markups.io/" rel="nofollow">MarkUps.io</a></p>
        </div>
      </div>
    </div>
  </footer>

  <!-- jQuery library --><?php if ($mnu == "home" || $mnu == "") { ?>
    <script src="assets/js/jquery.min.js"></script> <?php } ?>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="assets/js/bootstrap.js"></script>
  <!-- Slick slider -->
  <script type="text/javascript" src="assets/js/slick.js"></script>
  <!-- Counter -->
  <script type="text/javascript" src="assets/js/waypoints.js"></script>
  <script type="text/javascript" src="assets/js/jquery.counterup.js"></script>
  <!-- Mixit slider -->
  <script type="text/javascript" src="assets/js/jquery.mixitup.js"></script>
  <!-- Add fancyBox -->
  <script type="text/javascript" src="assets/js/jquery.fancybox.pack.js"></script>


  <!-- Custom js -->
  <script src="assets/js/custom.js"></script>

</body>

</html>

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