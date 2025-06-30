<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "dinkes";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die(json_encode(['error' => 'Koneksi gagal']));
}

$tanggal = $_GET['tanggal'] ?? date('Y-m-d');
$sql = "SELECT COUNT(*) as total FROM ceklab WHERE tanggal_periksa = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $tanggal);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

echo json_encode(['total' => $data['total'] ?? 0]);

$stmt->close();
$conn->close();
?>
