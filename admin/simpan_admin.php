<?php
require_once __DIR__ . '/../config.php'; // pastikan path tepat
$koneksi = getMysqliConnection();

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Simpan ke database
$query = "INSERT INTO login (username, password) VALUES ('$username', '$password')";
$result = mysqli_query($koneksi, $query);

if ($result) {
    echo "<script>alert('Admin berhasil ditambahkan'); window.location.href='daftaradmin.php';</script>";
} else {
    echo "<script>alert('Gagal menambahkan alat'); window.history.back();</script>";
}
?>
