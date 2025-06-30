<?php
require_once __DIR__ . '/../config.php'; // pastikan path tepat
$koneksi = getMysqliConnection();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hapus dari tabel
    $query = "DELETE FROM ceklab WHERE id = $id";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>alert('Data berhasil dihapus.'); window.location.href='regisceklab.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data.'); window.location.href='regisceklab.php';</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan.'); window.location.href='regisceklab.php';</script>";
}

mysqli_close($koneksi);
?>
