<?php
// Konfigurasi koneksi database
$host = "localhost";
$user = "root";
$password = "";
$database = "dinkes";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Tangkap data dari form
$nama            = $_POST['nama'];
$nik             = $_POST['nik'];
$alamat          = $_POST['alamat'];
$telepon         = $_POST['telepon'];
$alat         = $_POST['alat'];
$tanggal_pinjam = $_POST['tanggal_pinjam'];
$tanggal_kembali = $_POST['tanggal_kembali'];
$akomodasi         = $_POST['akomodasi'];
$keterangan        = $_POST['keterangan'];
$temp            = date("Y-m-d"); // tanggal hari ini

// ✅ Simpan data ke database
$sql = "INSERT INTO alat (nama, nik, alamat, telepon, alat, tanggal_pinjam, tanggal_kembali, akomodasi, keterangan, temp)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssssss", $nama, $nik, $alamat, $telepon, $alat, $tanggal_pinjam, $tanggal_kembali, $akomodasi, $keterangan, $temp);

if ($stmt->execute()) {
    $last_id = $conn->insert_id;
    echo "OK_REDIRECT:$last_id";
} else {
    echo "ERROR: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
