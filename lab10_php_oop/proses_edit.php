<?php
include "database.php";
$db = new Database();

$data = [
    'nama' => $_POST['nama'],
    'alamat' => $_POST['alamat']
];

$update = $db->update("mahasiswa", $data, "nim='{$_POST['nim_asli']}'");

if($update) {
    echo "<script>alert('Data berhasil diupdate'); window.location='list_mahasiswa.php';</script>";
} else {
    echo "Gagal update data";
}
?>