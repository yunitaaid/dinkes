<?php
include 'koneksi.php';

$id = $_GET['id'] ?? '';
$kondisi = $_GET['kondisi'] ?? '';

if ($id && in_array($kondisi, ['BAIK', 'RUSAK'])) {
    $query = "UPDATE daftar_alat SET kondisi = '$kondisi' WHERE id = '$id'";
    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Kondisi alat berhasil diperbarui'); window.location.href='daftaralkes.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui kondisi alat'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Parameter tidak valid'); window.history.back();</script>";
}
?>
