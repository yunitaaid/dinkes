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
$layanan         = $_POST['layanan'];
$tanggal_pelaksanaan = $_POST['tanggal_pelaksanaan'];
$lokasi         = $_POST['lokasi'];
$keterangan        = $_POST['keterangan'];
$temp            = date("Y-m-d"); // tanggal hari ini

// ✅ Cek jumlah pendaftar untuk tanggal yang dipilih
$sql_check = "SELECT COUNT(*) as total FROM penyakit WHERE layanan = ? && tanggal_pelaksanaan = ?";
$stmt_check = $conn->prepare($sql_check);
$stmt_check->bind_param("ss", $layanan, $tanggal_pelaksanaan);
$stmt_check->execute();
$result = $stmt_check->get_result();
$data = $result->fetch_assoc();
$total = $data['total'];
$stmt_check->close();

if ($total >= 2) {
    echo "Kuota pendaftar untuk tanggal tersebut sudah penuh. Silakan pilih tanggal lain.";
    exit;
}

// ✅ Simpan data ke database
$sql = "INSERT INTO penyakit (nama, nik, alamat, telepon, layanan, tanggal_pelaksanaan, lokasi, keterangan, temp)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssss", $nama, $nik, $alamat, $telepon, $layanan, $tanggal_pelaksanaan, $lokasi, $keterangan, $temp);

if ($stmt->execute()) {
    $last_id = $conn->insert_id;
    echo "OK_REDIRECT:$last_id";
} else {
    echo "ERROR: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
