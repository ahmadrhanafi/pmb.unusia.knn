<style>
    nav {
        margin: 0px;
        padding: 0px;
    }

    .dropdown-menu {
        z-index: 2000;
    }

    .profile-link:hover h6 {
        color: #28a745 !important;
        transition: color 0.3s;
    }

    .sidebartoggler:hover i {
        background-color: #28f75554 !important;
        color: #28a745 !important;
        transition: color 0.3s ease;
        border-radius: 50%;
        padding: 8px;
    }

    .nav-link:hover i {
        background-color: #28f75554 !important;
        color: #28a745 !important;
        transition: color 0.3s ease;
        border-radius: 50%;
        padding: 8px;
    }
</style>

<!-- Header / Topbar -->
<header class="topbar border-bottom shadow-sm">
    <div class="with-vertical">
        <nav class="navbar navbar-expand-lg p-0" style="margin-right: -20px; margin-left: -20px;">
            <ul class="navbar-nav">
                <?php if ($mnu != "pencarian"): ?>
                    <!-- Toggle Sidebar -->
                    <li class="nav-item">
                        <button class="sidebartoggler btn nav-link ms-n3"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#navbarNav"
                            aria-controls="navbarNav"
                            aria-expanded="false"
                            aria-label="Toggle navigation">
                            <i class="ti ti-menu-2" style="margin-left: 15px;"></i>
                        </button>
                    </li>

                    <!-- Search -->
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="javascript:void(0)" type="button"
                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="ti ti-search"></i>
                        </a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <div class="ms-2">
                            <a href="index.php?mnu=home">
                                <img src="assets/img/logo/unusia.png" width="50" alt="Logo UNUSIA" />
                            </a>
                        </div>
                    </li>
                <?php endif; ?>
            </ul>

            <?php if ($mnu != "pencarian"): ?>
                <!-- Logo Mobile -->
                <div class="d-block d-lg-none">
                    <a href="index.php?mnu=home">
                        <img src="assets/img/logo/unusia.png" width="50" alt="" />
                    </a>
                </div>
            <?php endif; ?>

            <button class="navbar-toggler p-0 border-0" type="button"
                data-bs-toggle="collapse" data-bs-target="#topbarNav"
                aria-controls="topbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="ti ti-dots fs-7" style="margin-right: 15px;"></i>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="topbarNav">
                <div class="d-flex align-items-center justify-content-between gap-3 px-3">
                    <a class="nav-link d-flex d-lg-none align-items-center justify-content-center" href="javascript:void(0)" type="button"
                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="ti ti-search fs-7"></i>
                    </a>

                    <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                        <!-- ------------------------------- -->
                        <!--     Start Language Dropdown     -->
                        <!-- ------------------------------- -->
                        <li class="nav-item dropdown d-none d-sm-block">
                            <a class="nav-link dropdown-toggle" role="button" href="javascript:void(0)" title="Ubah Bahasa" id="langDrop" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ti ti-language me-2"></i>
                                <span class="d-none d-lg-inline"><?= $translations['bahasa']; ?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="langDrop">
                                <li>
                                    <a class="dropdown-item" href="?lang=id">
                                        <img src="assets_modern/images/lang/flag-id.png" alt="ID" width="20" height="20" class="rounded me-2" />
                                        <span class="lang ms-1 d-inline d-sm-inline"><b>ID</b>&nbsp;&nbsp;&nbsp;(Indonesia)</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="?lang=en">
                                        <img src="assets_modern/images/lang/flag-en.png" alt="EN" width="20" height="20" class="rounded me-2" />
                                        <span class="lang ms-1 d-inline d-sm-inline"><b>EN</b>&nbsp;&nbsp;&nbsp;(English)</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- ------------------------------- -->
                        <!--      End language Dropdown      -->
                        <!-- ------------------------------- -->


                        <!-- ------------------------------- -->
                        <!--     Start Profile Dropdown      -->
                        <!-- ------------------------------- -->
                        <li class="nav-item dropdown">
                            <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <div class="user-profile-img">
                                        <img src="uploads/user/<?php echo $_SESSION['gambar_user'] ?? 'default.png'; ?>" class="rounded-circle" width="30" height="30" alt="" />
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop1">
                                <div class="profile-dropdown position-relative" data-simplebar style="max-height: 400px;">
                                    <div class="py-3 px-7 pb-0">
                                        <h5 class="mb-0 fs-5 fw-semibold"><?= $translations['profil_saya']; ?></h5>
                                    </div>
                                    <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                        <img src="uploads/user/<?php echo $_SESSION['gambar_user'] ?? 'default.png'; ?>" class="rounded-circle" width="80" height="80" alt="" />
                                        <div class="ms-3">
                                            <h5 class="mb-1 fs-3"><?php echo $_SESSION['cnama'] ?? 'Guest'; ?></h5>
                                            <span class="mb-1 d-block"><?php echo $_SESSION['cstatus'] ?? 'Visitor'; ?></span>
                                            <p class="mb-0 d-flex align-items-center gap-2">
                                                <i class="ti ti-mail fs-4"></i> <?php echo $_SESSION['email'] ?? '<style> i.ti.ti-mail { display: none; } </style>'; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="message-body">
                                        <a href="index.php?mnu=profil"
                                            class="py-8 px-7 mt-8 d-flex align-items-center profile-link">
                                            <span class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6 px-3">
                                                <i class="fa-solid fa-user" style="color: #28a745;"></i>
                                            </span>
                                            <div class="w-75 d-inline-block v-middle ps-3">
                                                <h6 class="mb-1 fs-3 fw-semibold lh-base"><?= $translations['profil']; ?></h6>
                                                <span class="fs-2 d-block text-body-secondary"><?= $translations['akun']; ?></span>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0)" type="button"
                                            class="py-8 px-7 mt-8 d-flex align-items-center profile-link" id="darkModeToggle">
                                            <span class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6 px-3 py-2">
                                                <i id="darkModeIcon" style="color: #28a745;"></i>
                                            </span>
                                            <div class="w-75 d-inline-block v-middle ps-3">
                                                <h6 class="mb-1 fs-3 fw-semibold lh-base"><?= $translations['tema']; ?></h6>
                                                <span class="fs-2 d-block text-body-secondary"><?= $translations['mode']; ?></span>
                                            </div>
                                        </a>
                                        <div class="d-block d-lg-none py-4 px-7" aria-labelledby="langDrop">
                                            <h6 class="mb-2 fs-3 fw-semibold"><?= $translations['bahasa']; ?></h6>
                                            <a class="dropdown-item py-2" href="?lang=id">
                                                <img src="assets_modern/images/lang/flag-id.png" alt="ID" width="20" height="20" class="rounded me-2" />
                                                ID &nbsp; (Indonesia)
                                            </a>
                                            <a class="dropdown-item py-2" href="?lang=en">
                                                <img src="assets_modern/images/lang/flag-en.png" alt="EN" width="20" height="20" class="rounded me-2" />
                                                EN &nbsp; (English)
                                            </a>
                                        </div>
                                    </div>
                                    <div class="d-grid py-4 px-7 pt-8">
                                        <div class="upgrade-plan position-relative overflow-hidden rounded-4 p-4 mb-9" style="background-color: #28f75554">
                                            <div class="row">
                                                <a href="index.php?mnu=logout" class="btn" style="color: #28a745; border-color: #28a745;"><?= $translations['logout']; ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- ------------------------------- -->
                        <!--       End Profile Dropdown      -->
                        <!-- ------------------------------- -->
                    </ul>
                </div>
            </div>
        </nav>

        <!--  Search Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="false">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content rounded-1">
                    <div class="modal-header border-bottom">
                        <form method="get" action="index.php" class="d-flex w-100">
                            <input type="hidden" name="mnu" value="pencarian">
                            <input type="search"
                                name="keyword"
                                class="form-control fs-3"
                                placeholder="<?= $translations['cari']; ?>"
                                required>
                            <button type="submit" class="btn btn-sm fs-5 border">
                                <i class="ti ti-search"></i>
                            </button>
                        </form>

                        <a href="javascript:void(0)" data-bs-dismiss="modal" class="lh-1">
                            <i class="ti ti-x fs-5 ms-3"></i>
                        </a>
                    </div>

                    <div class="modal-body message-body" data-simplebar="">
                        <h5 class="mb-0 fs-5 p-1 fw-bolder"><?= $translations['tauhace']; ?></h5>
                        <ul class="list mb-0 py-2">
                            <li class="p-1 mb-1 search-option">
                                <a href="#">
                                    <span class="fs-3 text-dark fw-normal d-block">Modern</span>
                                    <span class="fs-3 text-muted d-block">/dashboards/dashboard1</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 search-option">
                                <a href="#">
                                    <span class="fs-3 text-dark fw-normal d-block">Dashboard</span>
                                    <span class="fs-3 text-muted d-block">/dashboards/dashboard2</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 search-option">
                                <a href="#" class="search-option">
                                    <span class="fs-3 text-dark fw-normal d-block">Contacts</span>
                                    <span class="fs-3 text-muted d-block">/apps/contacts</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 search-option">
                                <a href="#">
                                    <span class="fs-3 text-dark fw-normal d-block">Posts</span>
                                    <span class="fs-3 text-muted d-block">/apps/blog/posts</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 search-option">
                                <a href="#">
                                    <span class="fs-3 text-dark fw-normal d-block">Detail</span>
                                    <span class="fs-3 text-muted d-block">/apps/blog/detail/streaming-video-way-before-it-was-cool-go-dark-tomorrow</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 search-option">
                                <a href="#">
                                    <span class="fs-3 text-dark fw-normal d-block">Shop</span>
                                    <span class="fs-3 text-muted d-block">/apps/ecommerce/shop</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 search-option">
                                <a href="#">
                                    <span class="fs-3 text-dark fw-normal d-block">Modern</span>
                                    <span class="fs-3 text-muted d-block">/dashboards/dashboard1</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 search-option">
                                <a href="#">
                                    <span class="fs-3 text-dark fw-normal d-block">Dashboard</span>
                                    <span class="fs-3 text-muted d-block">/dashboards/dashboard2</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 search-option">
                                <a href="#">
                                    <span class="fs-3 text-dark fw-normal d-block">Contacts</span>
                                    <span class="fs-3 text-muted d-block">/apps/contacts</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 search-option">
                                <a href="#">
                                    <span class="fs-3 text-dark fw-normal d-block">Posts</span>
                                    <span class="fs-3 text-muted d-block">/apps/blog/posts</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 search-option">
                                <a href="#">
                                    <span class="fs-3 text-dark fw-normal d-block">Detail</span>
                                    <span class="fs-3 text-muted d-block">/apps/blog/detail/streaming-video-way-before-it-was-cool-go-dark-tomorrow</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 search-option">
                                <a href="#">
                                    <span class="fs-3 text-dark fw-normal d-block">Shop</span>
                                    <span class="fs-3 text-muted d-block">/apps/ecommerce/shop</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- ---------------------------------- -->
        <!-- End Vertical Layout Header -->
        <!-- ---------------------------------- -->
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleBtn = document.getElementById('darkModeToggle');
        const icon = document.getElementById('darkModeIcon');

        // fallback: jika tidak ada tombol, stop
        if (!toggleBtn) return;

        // helper untuk set theme
        function applyTheme(isDark) {
            // gunakan document.documentElement (html) sebagai tempat class agar konsisten
            const root = document.documentElement;
            root.classList.toggle('dark-mode', !!isDark);

            // icon
            if (icon) {
                icon.innerHTML = isDark ? '<i class="fa solid fa-sun fs-3"></i>' : '<i class="fa-solid fa-moon fs-3"></i>';
            }

            // update semua tabel Bootstrap di halaman agar berubah ke table-dark pada dark mode
            document.querySelectorAll('table').forEach(t => {
                // jika ingin hanya mengubah tabel tertentu gunakan selector khusus
                if (isDark) {
                    t.classList.add('table-dark');
                } else {
                    t.classList.remove('table-dark');
                }
            });

            // simpan pilihan agar persist across pages
            try {
                localStorage.setItem('theme', isDark ? 'dark' : 'light');
            } catch (e) {}
        }

        // Inisialisasi dari localStorage (default light)
        let saved = null;
        try {
            saved = localStorage.getItem('theme');
        } catch (e) {
            saved = null;
        }
        if (saved === 'dark') applyTheme(true);
        else applyTheme(false);

        // Toggle saat diklik (pastikan tombol type="button" agar tidak submit form)
        toggleBtn.addEventListener('click', function(e) {
            e.preventDefault();
            const isDarkNow = document.documentElement.classList.contains('dark-mode');
            applyTheme(!isDarkNow);
        });
    });
</script>