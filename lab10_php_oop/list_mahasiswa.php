<?php
include "database.php";
$db = new Database();
$result = $db->query("SELECT * FROM mahasiswa");

ob_start();
?>

<h3>Data Mahasiswa</h3>
<hr>
<div class="card p-3">
    <table class="table table-hover table-bordered">
        <thead class="table-dark"> <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th width="15%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $i=1;
            while($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $row['nim'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['alamat'] ?></td>
                <td>
                    <a href="edit_mahasiswa.php?nim=<?= $row['nim'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="delete_mahasiswa.php?nim=<?= $row['nim'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php
$content = ob_get_clean();
include "layout.php";
?>