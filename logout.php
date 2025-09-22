<?php
session_destroy();
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  Swal.fire({
    title: 'Logout Berhasil',
    text: 'Terima kasih atas kunjungannya sampai jumpa lagi!',
    icon: 'success',
    confirmButtonText: 'OK',
    confirmButtonColor: '#28a745'
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = 'index.php?mnu=home';
    }
  });
</script>