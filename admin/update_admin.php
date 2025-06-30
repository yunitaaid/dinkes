<?php
include 'koneksi.php';

$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];

$query = "UPDATE login SET username = '$username', password = '$password' WHERE id = '$id'";
if (mysqli_query($koneksi, $query)) {
    echo "<script>alert('Data berhasil diperbarui'); window.location.href='daftaradmin.php';</script>";
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>
