<?php
session_start();

if (isset($_GET['lang'])) {
  $_SESSION['lang'] = $_GET['lang'];
}

if (!isset($_SESSION['lang'])) {
  $_SESSION['lang'] = 'id';
}

$lang = $_SESSION['lang'];
$translations = include "lang/$lang.php";

$mnu = isset($_GET['mnu']) ? $_GET['mnu'] : "";
$hideSidebar = ($mnu == "pencarian");

// title dinamis
function getTitle($mnu, $translations)
{
  switch ($mnu) {
    case "user":
      return $translations['judul_panitia'];
    case "profil":
      return $translations['judul_profil'];
    case "profil2":
      return $translations['judul_profil2'];
    case "tahun":
      return $translations['judul_tahun'];
    case "pmb":
      return $translations['judul_pmb'];
    case "pengujian":
      return $translations['judul_pengujian'];
    case "knn":
      return $translations['judul_knn'];
    case "pencarian":
      $keyword = isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : '';
      if ($keyword != '') {
        return sprintf($translations['judul_pencarian'], $keyword);
      } else {
        return str_replace('"%s"', '', $translations['judul_pencarian']);
      }
    case "login":
      return $translations['judul_login'];
    default:
      return $translations['judul_dashboard'];
  }
}

$title = getTitle($mnu, $translations);

include "template/head.php";
?>

<style>
  .no-sidebar .topbar {
    margin-left: 0 !important;
    width: 100% !important;
  }
</style>

<!-- Layout Wrapper -->
<div class="<?php echo $hideSidebar ? 'no-sidebar' : ''; ?>">

  <?php if (!$hideSidebar): ?>
    <?php include "template/sidebar.php"; ?>
  <?php endif; ?>

  <div class="flex-grow-1">
    <?php include "template/topbar.php"; ?>

    <!-- Body Wrapper -->
    <div class="body-wrapper flex-grow-1 p-4">
      <?php
      if ($mnu == "user") {
        require_once "user/user.php";
      } elseif ($mnu == "profil") {
        require_once "user/profil.php";
      } elseif ($mnu == "profil2") {
        require_once "user/profil2.php";
      } elseif ($mnu == "tahun") {
        require_once "tahun/tahun.php";
      } elseif ($mnu == "pmb") {
        require_once "pmb/pmb.php";
      } elseif ($mnu == "pengujian") {
        require_once "pengujian/pengujian.php";
      } elseif ($mnu == "_tahun") {
        require_once "tahun/_tahun.php";
      } elseif ($mnu == "_pmb") {
        require_once "pmb/_pmb.php";
      } elseif ($mnu == "_pengujian") {
        require_once "pengujian/_pengujian.php";
      } elseif ($mnu == "knn") {
        require_once "knn.php";
      } elseif ($mnu == "bantuan") {
        require_once "bantuan.php";
      } elseif ($mnu == "pencarian") {
        require_once "pencarian.php";
      } elseif ($mnu == "login") {
        require_once "login.php";
      } elseif ($mnu == "logout") {
        require_once "logout.php";
      } else {
        require_once "home.php";
      }
      ?>

      <?php
      include "template/script.php";
      include "template/footer.php";
      ?>
    </div>
  </div>
</div>