<?php
include "database.php";
$db = new Database();

$data = [
    'nim' => $_POST['nim'],
    'nama' => $_POST['nama'],
    'alamat' => $_POST['alamat']
];

$simpan = $db->insert("mahasiswa", $data);

if($simpan) {
    echo "<script>alert('Data berhasil disimpan'); window.location='list_mahasiswa.php';</script>";
} else {
    echo "<script>alert('Gagal menyimpan data'); window.location='form_input.php';</script>";
}
?>