<?php
include "database.php";
$db = new Database();
// Mengambil jumlah total mahasiswa
$hasil = $db->query("SELECT COUNT(*) AS total FROM mahasiswa");
$total = $hasil->fetch_assoc()['total'];

ob_start();
?>

<div class="row">
    <div class="col-md-12">
        <div class="alert alert-info">
            Selamat Datang di <strong>Sistem Akademik Kampus</strong>.
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-primary mb-3">
            <div class="card-header">Total Mahasiswa</div>
            <div class="card-body">
                <h1 class="card-title text-center" style="font-size: 4rem;">
                    <?= $total ?>
                </h1>
                <p class="card-text text-center">Mahasiswa Terdaftar</p>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
include "layout.php";
?>