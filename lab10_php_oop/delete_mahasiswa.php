<?php
include "database.php";
$db = new Database();

$nim = $_GET['nim'];
if($db->delete("mahasiswa", "WHERE nim='$nim'")) {
    header("Location: list_mahasiswa.php");
} else {
    echo "Gagal menghapus data";
}
?>