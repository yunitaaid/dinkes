<?php
include 'koneksi.php';

if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = intval($_GET['id']);
    $status = intval($_GET['status']);

    $query = "UPDATE penyakit SET status = $status WHERE id = $id";
    mysqli_query($koneksi, $query);

    header("Location: permohonanlayanan.php"); // ubah sesuai file tujuan
    exit;
}
?>