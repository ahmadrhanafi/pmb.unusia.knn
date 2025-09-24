<?php
session_start();
require_once "konmysqli.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme">

<head>
	<!-- Required meta tags -->
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- Favicon icon-->
	<link rel="shortcut icon" type="image/png" href="assets/img/logo/unusia.png" />
	
	<!-- Core Css -->
	<link rel="stylesheet" href="assets_modern/css/styles.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

	<title>Login | Klasifikasi PMB UNUSIA</title>
</head>

<style>
	body {
		background-color: #ddd;
	}
</style>

<body>
	<!-- Preloader -->
	<div class="preloader">
		<img src="assets/img/unusia.png" alt="loader" class="lds-ripple img-fluid" />
	</div>
	<div id="main-wrapper">
		<div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100">
			<div class="position-relative z-index-5">
				<div class="row">
					<div class="col-xl-7 col-xxl-8">
						<a href="index.php" class="text-nowrap logo-img d-block px-4 py-9 w-100">
							<img src="assets/img/logo/logounusia.png" class="dark-logo" alt="Logo-Dark" style="height: 60px; width: 80px;" />
							<img src="assets/img/logo/logounusia.png" class="light-logo" alt="Logo-light" style="height: 100px; width: 130px;" />
						</a>
						<div class="d-none d-xl-flex align-items-center justify-content-center" style="height: calc(80vh - 80px);">
							<img src="assets/img/logo/logounusia.png" alt="" class="img-fluid" width="500">
						</div>
					</div>
					<div class="col-xl-5 col-xxl-4">
						<div class="authentication-login min-vh-100 row justify-content-center align-items-center p-4"
							style="background: url('assets/img/bg/pattern-unusia.jpg') no-repeat center; background-size: cover;">

							<div class="col-sm-8 col-md-6 col-xl-9">
								<div class="mb-3">
									<h3 class="mb-2 fw-bolder text-dark text-center">
										Selamat Datang di
									</h3>
									<h3 class="mb-5 fw-bolder text-dark text-center">
										KLASIFIKASI PMB UNUSIA
									</h3>

									<div class="card p-4 shadow-lg">
										<form method="post">
											<div class="mb-3">
												<label for="exampleInputEmail1" class="form-label fs-4">Username</label>
												<input type="text" class="form-control" name="user" id="user" aria-describedby="emailHelp">
											</div>
											<div class="mb-4">
												<label for="exampleInputPassword1" class="form-label fs-4">Password</label>
												<input type="password" class="form-control" name="pass" id="pass">
												<span class="position-absolute top-50 end-0 translate-middle-y"
													style="cursor:pointer; margin-top: 12px; margin-right: 42px;" onclick="togglePassword()">
													<i class="fa fa-eye" id="toggleIcon"></i>
												</span>
											</div>
											<button type="submit"
												class="btn btn-lg text-white w-100 py-8 mb-4 rounded-2"
												name="Login" id="Login"
												style="background-color: #28a745;">Sign In</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
	<div class="dark-transparent sidebartoggler"></div>
	<!-- Import Js Files -->

	<script src="assets_modern/libs/jquery/dist/jquery.min.js"></script>
	<script src="assets_modern/js/app.min.js"></script>
	<script src="assets_modern/js/app.init.js"></script>
	<script src="assets_modern/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="assets_modern/libs/simplebar/dist/simplebar.min.js"></script>

	<script src="assets_modern/js/sidebarmenu.js"></script>
	<script src="assets_modern/js/theme.js"></script>

	<script src="login/js/main.js"></script>


</body>


</html>

<?php
if (isset($_POST["Login"])) {
	$usr = $_POST["user"];
	$pas = $_POST["pass"];

	$sql1 = "select * from `$tbuser` where `username`='$usr' and `password`='$pas' and `status`='Aktif'";

	if (getJum($conn, $sql1) > 0) {
		$d = getField($conn, $sql1);
		$kode = $d["id_user"];
		$nama = $d["nama_user"];
		$level = $d["level"];
		$_SESSION["cid"] = $kode;
		$_SESSION["cnama"] = $nama;
		$_SESSION["cstatus"] = $level;
		echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Login Berhasil!',
        html: 'Otentikasi {$_SESSION['cnama']} sebagai {$_SESSION['cstatus']}',
        showConfirmButton: true,
		confirmButtonText: 'Enter',
    	confirmButtonColor: '#28a745',
      }).then(() => {
        window.location.href = 'index.php?mnu=home';
      });
    </script>
    ";
	} else {
		session_destroy();
		echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Login Gagal!',
        text: 'Silakan cek data Anda kembali...',
        confirmButtonText: 'Coba Lagi'
      }).then(() => {
        window.location.href = 'login.php';
      });
    </script>
    ";
	}
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

?>

<script>
	function togglePassword() {
		const passField = document.getElementById("pass");
		const icon = document.getElementById("toggleIcon");

		if (passField.type === "password") {
			passField.type = "text";
			icon.classList.remove("fa-eye");
			icon.classList.add("fa-eye-slash");
		} else {
			passField.type = "password";
			icon.classList.remove("fa-eye-slash");
			icon.classList.add("fa-eye");
		}
	}
</script>