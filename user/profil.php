<?php

$tanggal = WKT(date("Y-m-d"));
$pro = "simpan";
$gambar0 = "avatar.jpg";
$status = "Aktif";
//$PATH="ypathcss";
?>
<link type="text/css" href="<?php echo "$PATH/base/"; ?>ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo "$PATH/"; ?>jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/"; ?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/"; ?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/"; ?>ui/i18n/ui.datepicker-id.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $("#tanggal").datepicker({
      dateFormat: "dd MM yy",
      changeMonth: true,
      changeYear: true
    });
  });
</script>

<script type="text/javascript">
  function PRINT(pk) {
    win = window.open('user/user_print.php?pk=' + pk, 'win', 'width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0');
  }
</script>

<script language="JavaScript">
  function buka(url) {
    window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');
  }
</script>

<?php
$id_user = $_SESSION["cid"];
$sql = "select * from `$tbuser` where `id_user`='$id_user'";
$d = getField($conn, $sql);
$id_user = $d["id_user"];
$id_user0 = $d["id_user"];
$nama_user = $d["nama_user"];
$level = $d["level"];
$username = $d["username"];
$password = $d["password"];
$telepon = $d["telepon"];
$email = $d["email"];
$status = $d["status"];
$keterangan = $d["keterangan"];
$pro = "ubah";

?>
<link rel="stylesheet" href="jsacordeon/jquery-ui.css">
<link rel="stylesheet" href="resources/demos/style.css">
<script src="jsacordeon/jquery-1.12.4.js"></script>
<script src="jsacordeon/jquery-ui.js"></script>
<script>
  $(function() {
    $("#accordion").accordion({
      collapsible: true
    });
  });
</script>

<div class="container" style="margin-top: 80px;">
  <div id="accordion">
    <h3 class="mb-4"><?= $translations['titpage_profil']; ?></h3>
    <div class="table-responsive">
      <table class="table table-bordered">
        <tr>
          <th width="20%"><label for="id_user"><?= $translations['id_panitia']; ?></label>
          <th width="1%">:
          <th colspan="2"><b><?php echo $id_user; ?></b>
        </tr>
        <tr>
          <td><label for="nama_user"><?= $translations['nama_panitia']; ?></label>
          <td>:
          <td width="213"><?php echo $nama_user; ?>
          </td>
        </tr>

        <tr>
          <td><label for="level"><?= $translations['level']; ?></label>
          <td>:
          <td colspan="2"><?php echo $level; ?>
          </td>
        </tr>

        <tr>
          <td height="24"><label for="username">Username</label>
          <td>:
          <td><?php echo md5($username); ?></td>
        </tr>

        <tr>
          <td height="24"><label for="password">Password</label>
          <td>:
          <td><?php echo md5($password); ?></td>
        </tr>


        <tr>
          <td height="24"><label for="telepon"><?= $translations['telepon']; ?></label>
          <td>:
          <td><?php echo $telepon; ?>
          </td>
        </tr>

        <tr>
          <td height="24"><label for="email">E-mail</label>
          <td>:
          <td><?php echo $email; ?>
          </td>
        </tr>

        <tr>
          <td><label for="status">Status</label>
          <td>:
          <td colspan="2"><?php echo $status; ?>
          </td>
        </tr>

        <tr>
          <td height="24"><label for="keterangan"><?= $translations['keterangan']; ?></label>
          <td>:
          <td><?php echo $keterangan; ?>
          </td>
        </tr>

        <tr>
          <td>
          <td>
          <td colspan="2">
            <a href="?mnu=profil2"><input name="Batal" type="button" class="btn btn-primary btn-sm me-2" id="Update" value="Update" /></a>
            <!-- <a href="?mnu=profil"><input name="Batal" type="button" class="btn btn-danger btn-sm" id="Batal" value="<?= $translations['batal']; ?>" /></a> -->
          </td>
        </tr>
      </table>
    </div>
  </div>
  <br />
</div>
</div>