<?php
ob_start();
?>

<div class="card col-md-6 mx-auto">
    <div class="card-header bg-success text-white">
        Tambah Data Mahasiswa
    </div>
    <div class="card-body">
        <form action="proses_input.php" method="POST">
            <div class="mb-3">
                <label>NIM</label>
                <input type="text" name="nim" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">Simpan Data</button>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
include "layout.php";
?>