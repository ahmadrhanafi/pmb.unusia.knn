<?php
include "templete/head.php";
include "templete/sidebar.php";
?>
<div class="container-fluid">

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

<?php

include "templete/script.php";
?>
<?php
include "templete/footer.php";
?>