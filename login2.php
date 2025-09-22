<?php
session_start();
?>

<table width=100% border=0 cellspacing=0 cellpadding=1 bgcolor=#B19B68>
  <tr>
    <td class=textp>&nbsp;&nbsp;Otentikasi</td>
  </tr>
  <tr>
    <td>
      <table width=100% cellspacing=5 cellpadding=0 bgcolor=#F8EED7>
        <tr>
          <td class=textblack>
            <b>Otentikasi Data </b>
            <form name="formLogin" method="post" action="">
              <table width="284" border="0">
                <tr>
                  <th colspan="2" bgcolor="#FF00FF">
                    <marquee>
                      Silakan Tulis Data Login Anda / Register untuk membuat Acoount Baru
                    </marquee>
                  </th>
                </tr>

                <tr>
                  <td width="67">Username</td>
                  <td width="207">:
                    <input type="text" name="user" id="user" />
                  </td>
                </tr>

                <tr>
                  <td>Password:</td>
                  <td>:
                    <input type="password" name="pass" id="pass">
                    <span class="position-absolute top-50 end-0 translate-middle-y me-3"
                      style="cursor:pointer;" onclick="togglePassword()">
                      <i class="fa fa-eye" id="toggleIcon"></i>
                    </span>
                  </td>
                </tr>

                <tr>
                  <td colspan="2" align="right" valign="middle">
                    <input type="submit" name="Login" id="Login" value="Login">
                    <input type="Reset" name="Reset" id="Reset" value="Reset">
                  </td>
                </tr>
              </table>
            </form>
      </table>
    </td>
  </tr>
</table><br>
<?php
if (isset($_POST["Login"])) {
  $usr = $_POST["user"];
  $pas = $_POST["pass"];

  $sql1 = "select * from `$tbuser` where `username`='$usr' and `password`='$pas' and `status`='Aktif'";

  if (getJum($conn, $sql1) > 0) {
    $d = getField($conn, $sql1);
    $kode = $d["id_user"];
    $nama = $d["nama_user"];
    $_SESSION["cid"] = $kode;
    $_SESSION["cnama"] = $nama;
    $_SESSION["cstatus"] = "Administrator";
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Login Berhasil!',
        html: 'Otentikasi {$_SESSION['cnama']} sebagai {$_SESSION['cstatus']}',
        showConfirmButton: false,
        timer: 5000
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

?>

<script>
  function togglePassword() {
    const passField = document.getElementById("pass");
    const icon = document.getElementById("toggleIcon");

    if (passField.type === "password") {
      passField.type = "text";
      icon.classList.remove("fa-eye");
      icon.classList.add("fa-eye-slash"); // ganti jadi mata tertutup
    } else {
      passField.type = "password";
      icon.classList.remove("fa-eye-slash");
      icon.classList.add("fa-eye"); // kembali jadi mata terbuka
    }
  }
</script>