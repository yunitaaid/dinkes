<?php
$koneksi = new mysqli("localhost", "root", "", "dinkes");
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>
