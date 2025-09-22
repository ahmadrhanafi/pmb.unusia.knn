<div class="container-fluid" style="margin-top: 80px;">

    <style>
        html,
        body {
            max-width: 100%;
            overflow-x: hidden;
        }

        .table-responsive {
            max-width: 100%;
            overflow-x: auto;
        }

        .table td {
            word-break: break-word;
            white-space: normal;
        }
    </style>

    <?php
    if (!isset($conn)) {
        die("Koneksi database tidak tersedia.");
    }

    $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
    $results = [];

    // Konfigurasi pagination
    $limit = 10;
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    if ($page < 1) $page = 1;
    $offset = ($page - 1) * $limit;

    $totalData = 0;

    if ($keyword !== '') {
        $like = "%$keyword%";

        // Hitung total data
        $sql_count = "
            SELECT COUNT(*) as total FROM (
                SELECT id_user FROM tb_user WHERE nama_user LIKE ? OR email LIKE ? OR level LIKE ?
                UNION ALL
                SELECT id_pmb FROM tb_pmb WHERE minat_jurusan LIKE ? OR jalur_pendaftaran LIKE ? OR keterangan LIKE ?
            ) AS all_results
        ";
        $stmt_count = $conn->prepare($sql_count);
        $stmt_count->bind_param("ssssss", $like, $like, $like, $like, $like, $like);
        $stmt_count->execute();
        $res_count = $stmt_count->get_result();
        $row_count = $res_count->fetch_assoc();
        $totalData = $row_count['total'];
        $totalPages = ceil($totalData / $limit);

        // Query gabungan dengan LIMIT
        $sql = "
            SELECT * FROM (
                SELECT 'User' AS sumber, id_user AS id, nama_user AS nama, email AS detail, keterangan 
                FROM tb_user WHERE nama_user LIKE ? OR email LIKE ? OR level LIKE ?
                UNION ALL
                SELECT 'PMB' AS sumber, id_pmb AS id, minat_jurusan AS nama, jalur_pendaftaran AS detail, keterangan 
                FROM tb_pmb WHERE minat_jurusan LIKE ? OR jalur_pendaftaran LIKE ? OR keterangan LIKE ?
            ) AS all_results
            LIMIT ? OFFSET ?
        ";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssii", $like, $like, $like, $like, $like, $like, $limit, $offset);
        $stmt->execute();
        $res = $stmt->get_result();
        while ($row = $res->fetch_assoc()) {
            $results[] = $row;
        }
    }
    ?>


    <h3 class="fw-bold text-center mb-4"><?= $translations['hasil_pencarian']; ?></h3>
    <p><?= $translations['kata_kunci']; ?> <b><?= htmlspecialchars($keyword) ?></b></p>

    <?php if (!empty($results)) : ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped mt-2 table-sm">
                <thead class="table-dark">
                    <tr>
                        <th>Sumber</th>
                        <th>ID</th>
                        <th>Nama / Minat</th>
                        <th>Detail</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $row) : ?>
                        <tr>
                            <td><?= htmlspecialchars($row['sumber']); ?></td>
                            <td><?= htmlspecialchars($row['id']); ?></td>
                            <td><?= htmlspecialchars($row['nama']); ?></td>
                            <td><?= htmlspecialchars($row['detail'] ?? '-'); ?></td>
                            <td><?= htmlspecialchars($row['keterangan'] ?? '-'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <?php
        $jmldata = $totalData;
        $batas   = $limit;

        if ($jmldata > 0) {
            if ($batas < 1) $batas = 1;
            $jmlhal = ceil($jmldata / $batas);

            echo "<div class='paging text-center mt-2'>";

            // Tombol Prev
            if ($page > 1) {
                $prev = $page - 1;
                echo "<a class='btn btn-sm me-1' style='border-color: #28a745;' href='?mnu=pencarian&keyword=" . urlencode($keyword) . "&page=$prev'>«</a>";
            } else {
                echo "<span class='btn btn-sm me-1 disabled'>«</span>";
            }

            // Window (halaman sekitar aktif)
            $window = 1;
            $startPage = max(1, $page - $window);
            $endPage   = min($jmlhal, $page + $window);

            if ($startPage > 1) {
                echo "<a class='btn btn-sm me-1' style='border-color: #28a745;' href='?mnu=pencarian&keyword=" . urlencode($keyword) . "&page=1'>1</a>";
                if ($startPage > 2) {
                    echo "<span class='btn btn-sm disabled me-1'>...</span>";
                }
            }

            // Nomor halaman aktif
            for ($i = $startPage; $i <= $endPage; $i++) {
                if ($i == $page) {
                    echo "<span class='btn btn-sm me-1' style='border-color: #28a745; background-color: #28a745;'>$i</span>";
                } else {
                    echo "<a class='btn btn-sm me-1' style='border-color: #28a745;' href='?mnu=pencarian&keyword=" . urlencode($keyword) . "&page=$i'>$i</a>";
                }
            }

            // Kalau endPage < jmlhal, tampilkan "..." + halaman terakhir
            if ($endPage < $jmlhal) {
                if ($endPage < $jmlhal - 1) {
                    echo "<span class='btn btn-sm disabled me-1'>...</span>";
                }
                echo "<a class='btn btn-sm' style='border-color: #28a745;' href='?mnu=pencarian&keyword=" . urlencode($keyword) . "&page=$jmlhal'>$jmlhal</a>";
            }

            // Tombol Next
            if ($page < $jmlhal) {
                $next = $page + 1;
                echo "<a class='btn btn-sm ms-1' style='border-color: #28a745;' href='?mnu=pencarian&keyword=" . urlencode($keyword) . "&page=$next'>»</a>";
            } else {
                echo "<span class='btn btn-sm ms-1 disabled'>»</span>";
            }

            echo "</div>";
            echo "<p class='text-center mt-3'>Total data <b>$jmldata</b> item</p>";
        }
        ?>

    <?php else : ?>
        <div class="alert border mt-4 mb-5">
            <?= $translations['tidak_ada']; ?> <b><?= htmlspecialchars($keyword) ?></b>.
        </div>
    <?php endif; ?>
</div>
</div>