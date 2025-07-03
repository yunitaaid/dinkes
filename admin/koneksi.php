<?php
// Fungsi untuk membaca file .env
function loadEnv($path) {
    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $env = [];

    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue;
        list($key, $value) = explode('=', $line, 2);
        $env[trim($key)] = trim($value);
    }

    return $env;
}

function getMysqliConnection() {
    static $conn = null;

    if ($conn === null) {
        $env = loadEnv(__DIR__ . '/../.env');

        $host = $env['DB_HOST'];
        $user = $env['DB_USER'];
        $pass = $env['DB_PASS'];
        $db   = $env['DB_NAME'];

        $conn = new mysqli($host, $user, $pass, $db);
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }
    }

    return $conn;
}
