<div class="container" style="margin-top: 80px;">
  <div align="center">
    <h2 class="mb-4 fs-6"> <b><i>K</i>-Nearest Neighbor (<i>K</i>-NN) </b></h2>
    <p align="justify"><?= $translations['knn_home']; ?></p>
  </div>

  <?php
  $jml_dataset   = getJum($conn, "SELECT * FROM tb_tahun");
  $jml_pengujian = getJum($conn, "SELECT * FROM tb_pengujian");
  $jml_user      = getJum($conn, "SELECT * FROM tb_user");

  // Ambil prediksi terakhir
  $sql_last = "SELECT * FROM tb_pengujian ORDER BY id_pengujian DESC LIMIT 1";
  $last_pred = getField($conn, $sql_last);
  ?>

  <!-- Statistik -->
  <div class="row g-4 mt-4 mb-5">
    <div class="col-12 col-md-4">
      <div class="card border-2 text-light shadow-lg h-100">
        <div class="card-body text-center">
          <h3 class="text-dark mt-2"><?= $jml_dataset; ?></h3>
          <p class="text-dark mb-0"><?= $translations['data_latihan']; ?></p>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-4">
      <div class="card border-2 text-light shadow-lg h-100">
        <div class="card-body text-center">
          <h3 class="text-dark mt-2"><?= $jml_pengujian; ?></h3>
          <p class="text-dark mb-0"><?= $translations['data_pengujian']; ?></p>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-4">
      <div class="card border-2 text-light shadow-lg h-100">
        <div class="card-body text-center">
          <h3 class="text-dark mt-2"><?= $jml_user; ?></h3>
          <p class="text-dark mb-0"><?= $translations['user_terdaftar']; ?></p>
        </div>
      </div>
    </div>
  </div>
</div>
</div>