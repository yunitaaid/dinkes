<?php
require_once __DIR__ . '/../config.php'; // pastikan path tepat
$koneksi = getMysqliConnection();

if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = intval($_GET['id']);
    $status = intval($_GET['status']);

    $query = "UPDATE penyakit SET status = $status WHERE id = $id";
    mysqli_query($koneksi, $query);

    header("Location: permohonanlayanan.php"); // ubah sesuai file tujuan
    exit;
}
?>