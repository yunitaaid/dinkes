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
$tanggal_periksa = $_POST['tanggal_periksa'];
$temp            = date("Y-m-d"); // tanggal hari ini

// Fungsi untuk membuat kode unik 8 karakter (huruf + angka)
function generateKode($length = 8) {
    $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $kode = '';
    for ($i = 0; $i < $length; $i++) {
        $kode .= $chars[rand(0, strlen($chars) - 1)];
    }
    return $kode;
}

$kode = generateKode(); // hasil misal: 4F9TZ7LQ

// ✅ Cek jumlah pendaftar untuk tanggal yang dipilih
$sql_check = "SELECT COUNT(*) as total FROM ceklab WHERE tanggal_periksa = ?";
$stmt_check = $conn->prepare($sql_check);
$stmt_check->bind_param("s", $tanggal_periksa);
$stmt_check->execute();
$result = $stmt_check->get_result();
$data = $result->fetch_assoc();
$total = $data['total'];
$stmt_check->close();

if ($total >= 15) {
    echo "Kuota pendaftar untuk tanggal tersebut sudah penuh. Silakan pilih tanggal lain.";
    exit;
}

// ✅ Simpan data ke database
$sql = "INSERT INTO ceklab (nama, nik, alamat, telepon, tanggal_periksa, temp, kode)
        VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss", $nama, $nik, $alamat, $telepon, $tanggal_periksa, $temp, $kode);

if ($stmt->execute()) {
    $last_id = $conn->insert_id;
    echo "OK_REDIRECT:$last_id";
} else {
    echo "ERROR: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
