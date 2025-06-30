<?php
session_start();
require_once __DIR__ . '/../config.php'; // pastikan path tepat
$koneksi = getMysqliConnection();

$username = $_POST['email'] ?? ''; // email form = input[name=email]
$password = $_POST['password'] ?? '';

$username = mysqli_real_escape_string($koneksi, $username);
$password = mysqli_real_escape_string($koneksi, $password);

// Cek data dari database
$query = "SELECT * FROM login WHERE username = '$username' AND password = '$password' LIMIT 1";
$result = mysqli_query($koneksi, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    $_SESSION['logged_in'] = true;
    $_SESSION['username'] = $user['username'];
    
    header("Location: dashboard.php");
    exit;
} else {
    echo "<script>alert('Username atau Password salah'); window.location.href='index.php';</script>";
    exit;
}
?>
