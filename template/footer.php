<style>
    .hylink:hover {
        color: #055f19ff !important;
    }

    .ilink {
        color: #28a745 !important;
    }

    .hlink {
        color: #28a745 !important;
    }

    .fa-brands {
        background-color: #28a745 !important;
    }

    #hubungiAdminBtn {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 1050;
        width: 45px;
        height: 45px;
        display: flex;
        border-style: none;
        align-items: center;
        justify-content: center;
        background-color: #28a745;
    }

    #hubungiAdminBtn:hover {
        background-color: #055f19ff;
    }
</style>

<footer class="border rounded mt-auto p-4 w-100 shadow-lg">
    <div class="container">
        <div class="row gy-4">
 
            <!-- Logo & Title -->
            <div class="col-12 col-md-4 d-flex align-items-start">
                <img src="assets/img/unusia.png" alt="Logo UNUSIA" width="50" height="50" class="me-3">
                <div>
                    <h6 class="fw-bold text-bg-secondary-subtle fs-2 mb-1 mt-2"><?= $translations['sistem']; ?></h6>
                    <small class="fw-bolder text-secondary-emphasis">
                        <b><?= $translations['unusia']; ?></b>
                    </small>

                    <div class="d-flex gap-3 mt-3 mb-3">
                        <a href="https://twitter.com/unuindonesia"><i class="fa-brands fa-twitter rounded-circle text-white p-2"></i></a>
                        <a href="https://www.instagram.com/unuindonesia/?hl=id"><i class="fa-brands fa-instagram rounded-circle text-white p-2"></i></a>
                        <a href="https://www.facebook.com/unusiajakarta"><i class="fa-brands fa-facebook rounded-circle text-white p-2"></i></a>
                    </div>
                </div>
            </div>

            <!-- Kontak -->
            <div class="col-6 col-md-4" style="margin-left: 0px;">
                <h6 class="hlink fw-bolder mb-2 mt-1"><?= $translations['kontak']; ?></h6>
                <ul class="list-unstyled mb-0 mt-4">
   
                    <li class="d-flex align-items-start mb-3">
                        <i class="fa-solid fa-location-dot me-2 mt-1"></i>
                        <span><?= $translations['alamat']; ?></span>
                    </li>

                    <li class="d-flex align-items-center mb-3">
                        <i class="fa-solid fa-envelope me-2"></i>
                        <span>humas@unusia.ac.id</span>
                    </li>

                    <li class="d-flex align-items-center mb-3">
                        <i class="fa-solid fa-phone me-2"></i>
                        <span>(+62) 813-8483-1926</span>
                    </li>
                </ul>
            </div>

            <!-- Tautan -->
            <div class="col-6 col-md-4">
                <h6 class="hlink fw-bolder mb-2 mt-1"><?= $translations['tautan']; ?></h6>
                <ul class="list-unstyled mb-0 mt-4">
                    <li><a href="https://pmb.unusia.ac.id" class="hylink text-decoration-none text-dark">PMB Unusia</a></li><br>
                    <li><a href="https://sianas.unusia.ac.id/" class="hylink text-decoration-none text-dark">SIANAS</a></li><br>
                    <li><a href="https://www.youtube.com/channel/UC6OR58gjdfMr-KOY3OCtx1w" class="hylink text-decoration-none text-dark">Unusia TV</a></li><br>
                    <li><a href="https://pddikti.kemdiktisaintek.go.id/detail-pt/new-otDuBHqgVPrv_9tTpKGHVF2yK5zo3lp4Xy4_9czs10rTX_Tkkzfq7VHpTbiIHyrcjA==" class="hylink text-decoration-none text-dark">PDDikti</a></li>
                </ul>
            </div>

        </div>

        <div class="mt-5 text-center">
            <a href="https://unusia.ac.id" target="_blank" class="ilink text-decoration-none me-3">
                <i class="ti ti-world fs-5"></i>
            </a>
            <a href="mailto:humas@unusia.ac.id" class="ilink text-decoration-none me-3">
                <i class="ti ti-mail-opened fs-5"></i>
            </a>
            <a href="index.php?mnu=bantuan" class="ilink text-decoration-none">
                <i class="ti ti-help fs-5"></i>
            </a>
        </div>

        <hr class="my-2">

        <!-- Social & Copyright -->
        <div class="text-center">
            <small class="text-muted">
               <?= $translations['hak_cipta']; ?>
            </small>
        </div>

        <a href="https://wa.me/+6281384831926"
            class="btn btn-primary btn-lg rounded-circle shadow text-white"
            id="hubungiAdminBtn" data-bs-toggle="tooltip" data-bs-placement="top"
            title="Hubungi Admin">
            <i class="fas fa-headset"></i>
        </a>
    </div>
</footer>