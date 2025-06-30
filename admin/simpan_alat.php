<?php
require_once __DIR__ . '/../config.php'; // pastikan path tepat
$koneksi = getMysqliConnection();

$nama = $_POST['nama'] ?? '';
$kondisi = $_POST['kondisi'] ?? '';

// Simpan ke database
$query = "INSERT INTO daftar_alat (nama, kondisi, available) VALUES ('$nama', '$kondisi', 'enable')";
$result = mysqli_query($koneksi, $query);

if ($result) {
    echo "<script>alert('Alat berhasil ditambahkan'); window.location.href='daftaralkes.php';</script>";
} else {
    echo "<script>alert('Gagal menambahkan alat'); window.history.back();</script>";
}
?>
