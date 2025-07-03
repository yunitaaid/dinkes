<?php
// Ambil path dari URL
$request = $_SERVER['REQUEST_URI'];
$path = parse_url($request, PHP_URL_PATH);

// Routing sederhana berdasarkan path
switch ($path) {
    
    case '/':
    case '/dashboard':
        require 'dashboard.php';
        break;
        
    case '/pinjamalat':
        require 'pinjamalat.php';
        break;

    case '/ceklab':
        require 'ceklab.php';
        break;
    
    case '/penyakit':
        require 'penyakit.php';
        break;
    
    case '/printceklab':
        require 'printceklab.php';
        break;
    
    case '/printpenyakit':
        require 'printpenyakit.php';
        break;
    
    case '/printpinjam':
        require 'printpinjam.php';
        break;

    case '/admin':
        require 'admin/login.php';
        break;

    // Tambahkan kasus lain sesuai dengan file yang ada
    default:
        header("HTTP/1.0 404 Not Found");
        require '404.php'; // Pastikan Anda memiliki halaman 404
        break;
}
?>
