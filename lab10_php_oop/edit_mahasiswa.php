<?php
include "database.php";
$db = new Database();
$nim = $_GET['nim'];
$data = $db->get("mahasiswa", "nim='$nim'");

ob_start();
?>

<div class="card col-md-6 mx-auto">
    <div class="card-header bg-warning">
        Edit Data Mahasiswa
    </div>
    <div class="card-body">
        <form action="proses_edit.php" method="POST">
            <input type="hidden" name="nim_asli" value="<?= $data['nim'] ?>">
            <div class="mb-3">
                <label>NIM</label>
                <input type="text" name="nim" value="<?= $data['nim'] ?>" class="form-control" readonly>
            </div>
            <div class="mb-3">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" value="<?= $data['nama'] ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control" rows="3"><?= $data['alamat'] ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">Update Data</button>
            <a href="list_mahasiswa.php" class="btn btn-secondary w-100 mt-2">Batal</a>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
include "layout.php";
?>