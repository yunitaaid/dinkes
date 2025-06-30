<?php
// Ambil path dari URL
$request = $_SERVER['REQUEST_URI'];
$path = parse_url($request, PHP_URL_PATH);

// Routing sederhana berdasarkan path
switch ($path) {
    
    case '/dinkes/':
    case '/dinkes/dashboard':
        require 'dashboard.php';
        break;
        
    case '/dinkes/pinjamalat':
        require 'pinjamalat.php';
        break;

    case '/dinkes/ceklab':
        require 'ceklab.php';
        break;
    
    case '/dinkes/penyakit':
        require 'penyakit.php';
        break;
    
    case '/dinkes/printceklab':
        require 'printceklab.php';
        break;
    
    case '/dinkes/printpenyakit':
        require 'printpenyakit.php';
        break;
    
    case '/dinkes/printpinjam':
        require 'printpinjam.php';
        break;

    case '/dinkes/admin':
        require 'admin/login.php';
        break;

    // Tambahkan kasus lain sesuai dengan file yang ada
    default:
        header("HTTP/1.0 404 Not Found");
        require '404.php'; // Pastikan Anda memiliki halaman 404
        break;
}
?>
