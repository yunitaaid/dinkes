<?php 
require_once 'config.php';
$conn = getMysqliConnection();

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

function generateAlat() {
    global $conn;

    // Ambil semua alat dari daftar_alat
    $query = mysqli_query($conn, "SELECT DISTINCT id, nama,
        CASE
            WHEN status = 'dipinjam' THEN 'dipinjam'
            ELSE 'tersedia'
        END as status,
        kondisi
        FROM daftar_alat
        WHERE available = 'enable' && kondisi = 'BAIK'
        ORDER BY id ASC");

    // Ambil nama alat yang sedang dipakai (status = 0 atau 1) dari tabel alat
    $query_in_use = mysqli_query($conn, "SELECT alat FROM alat WHERE status IN (0, 1)");
    $alat_terpakai = [];
    while ($row = mysqli_fetch_assoc($query_in_use)) {
        $alat_terpakai[] = $row['alat'];
    }

    echo '<select name="alat" id="dataDropdown" style="width: 100%" class="form-control">';
    echo '<option value="">-- Pilih Alat --</option>'; 

    while ($result = mysqli_fetch_assoc($query)) {
        $namaAlat = htmlspecialchars($result['nama']);
        $isTerpakai = in_array($result['nama'], $alat_terpakai);
        $isDipinjam = $result['status'] === 'dipinjam';
        $isRusak = strtoupper($result['kondisi']) === 'RUSAK';

        if ($isTerpakai || $isDipinjam || $isRusak) {
            echo '<option value="' . $namaAlat . '" disabled>' . $namaAlat . ' (Tidak Tersedia)</option>';
        } else {
            echo '<option value="' . $namaAlat . '">' . $namaAlat . '</option>';
        }
    }

    echo '</select>';
}

?>
