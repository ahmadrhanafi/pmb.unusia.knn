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
?>

<div id="main-wrapper">

    <!-- Sidebar Start -->
    <aside class="left-sidebar with-vertical">
        <div>
            <!-- Logo -->
            <div class="brand-logo d-flex align-items-center justify-content-between p-3">
                <a href="index.php" class="text-nowrap logo-img">
                    <img src="assets/img/logounusia.png" alt="Logo UNUSIA" class="img-fluid" style="max-height: 80px; margin-left: 8px;" />
                </a>

                <a href="javascript:void(0)" class="sidebartoggler ms-auto d-xl-none mb-5">
                    <i class="ti ti-x fs-5"></i>
                </a>
            </div>

            <!-- Sidebar Menu -->
            <nav class="sidebar-nav scroll-sidebar" data-simplebar>
                <ul id="sidebarnav">
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu p-2"><?= $translations['menu_utama']; ?></span>
                    </li>

                    <style>
                        .sidebar-item .sidebar-link:hover {
                            background-color: #28f75554 !important;
                            color: #28a745 !important;
                        }

                        .sidebar-item.active .sidebar-link {
                            background-color: #28a745 !important;
                            color: #fff !important;
                        }
                    </style>

                    <?php
                    function renderMenu($mnu, $menuName, $displayName, $iconClass)
                    {
                        $activeClass = ($mnu == $menuName) ? "active" : "";
                        return "
              <li class='sidebar-item $activeClass'>
                <a class='sidebar-link' href='index.php?mnu=$menuName'>
                  <span><i class='$iconClass'></i></span>
                  <span class='hide-menu'>$displayName</span>
                </a>
              </li>
            ";
                    }

                    if ($_SESSION["cstatus"] == "Admin") {
                        echo renderMenu($mnu, "home", $translations['dashboard'], "ti ti-home");
                        echo renderMenu($mnu, "user", $translations['kelola_panitia'], "ti ti-users");
                        echo renderMenu($mnu, "tahun", $translations['tahun_daftar'], "ti ti-calendar");
                        echo renderMenu($mnu, "pmb", $translations['data_pmb'], "ti ti-database");
                        echo renderMenu($mnu, "latih", $translations['data_lth'], "ti ti-brain");
                        echo renderMenu($mnu, "pengujian", $translations['pengujian'], "ti ti-file-analytics");
                        echo renderMenu($mnu, "knn", $translations['analisa'], "ti ti-activity");
                        echo renderMenu($mnu, "bantuan", $translations['bantuan'], "ti ti-help");
                        // echo renderMenu($mnu, "logout", "Logout", "ti ti-logout");
                    } elseif ($_SESSION["cstatus"] == "Panitia") {
                        echo renderMenu($mnu, "home", $translations['dashboard'], "ti ti-home");
                        echo renderMenu($mnu, "profil", $translations['profil_panitia'], "ti ti-user");
                        echo renderMenu($mnu, "_tahun", $translations['tahun_daftar'], "ti ti-calendar");
                        echo renderMenu($mnu, "_pmb", $translations['data_pmb'], "ti ti-database");
                        echo renderMenu($mnu, "_pengujian", $translations['pengujian'], "ti ti-file-analytics");
                        echo renderMenu($mnu, "bantuan", $translations['bantuan'], "ti ti-help");
                        // echo renderMenu($mnu, "logout", "Logout", "ti ti-logout");
                    } else {
                        echo renderMenu($mnu, "home", "Dashboard", "ti ti-home");
                        echo "
              <li class='sidebar-item'>
                <a class='sidebar-link' href='login.php'>
                  <i class='ti ti-login'></i>
                  <span class='hide-menu'>Login</span>
                </a>
              </li>
            ";
                    }
                    ?>
                </ul>
            </nav>

            <!-- User Info di Sidebar -->
            <div class="fixed-profile p-3 mx-3 mb-5 rounded sidebar-ad" style="background-color: #28f75554 ;">
                <div class="hstack gap-3 align-items-center">
                    <div class="john-img">
                        <img src="uploads/user/<?php echo $_SESSION['gambar_user'] ?? 'default.png'; ?>"
                            class="rounded-circle" width="40" height="40" alt="User" />
                    </div>
                    <div class="john-title">
                        <h6 class="mb-0 fs-3 fw-semibold">
                            <?php echo $_SESSION['cnama'] ?? 'Guest'; ?>
                        </h6>
                        <span class="level fs-2 text-muted">
                            <?php echo $_SESSION['cstatus'] ?? 'Pengunjung'; ?>
                        </span>
                    </div>
                    <a href="index.php?mnu=logout"
                        class="border-0 bg-transparent ms-auto" style="color: #28a745;"
                        data-bs-toggle="tooltip" data-bs-placement="top" title="Logout">
                        <i class="ti ti-power fs-6"></i>
                    </a>
                </div>
            </div>
        </div>
    </aside>
    <!-- Sidebar End -->

    <!-- Page Wrapper Start -->
    <div class="page-wrapper">

        <style>
            aside {
                z-index: 1;
            }
        </style>