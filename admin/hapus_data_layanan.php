<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hapus dari tabel
    $query = "DELETE FROM penyakit WHERE id = $id";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>alert('Data berhasil dihapus.'); window.location.href='permohonanlayanan.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data.'); window.location.href='permohonanlayanan.php';</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan.'); window.location.href='permohonanlayanan.php';</script>";
}

mysqli_close($koneksi);
?>
