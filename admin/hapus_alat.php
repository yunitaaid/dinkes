<?php
require_once __DIR__ . '/../config.php'; // pastikan path tepat
$koneksi = getMysqliConnection();

$id = $_GET['id'] ?? null;

if ($id) {
    $id = mysqli_real_escape_string($koneksi, $id);
    $query = "DELETE FROM daftar_alat WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>alert('Data berhasil dihapus'); window.location.href='daftaralkes.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan'); window.history.back();</script>";
}

mysqli_close($koneksi);
?>
