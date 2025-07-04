-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jul 2025 pada 03.50
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dinkes`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alat`
--

CREATE TABLE `alat` (
  `id` int(8) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `alat` varchar(255) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `akomodasi` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `temp` date NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `alat`
--

INSERT INTO `alat` (`id`, `nama`, `nik`, `alamat`, `telepon`, `alat`, `tanggal_pinjam`, `tanggal_kembali`, `akomodasi`, `keterangan`, `temp`, `status`) VALUES
(4, 'Yunita Isna Damayanti', '3322194306990002', 'Lamper Tengah', '085643467152', 'kursi roda', '2025-07-02', '2025-07-03', 'antar', '', '2025-07-01', 0),
(5, 'Candra', '33412764592344', 'Semarang', '085678543452', 'kasur', '2025-07-16', '2025-07-12', 'ambil', '', '2025-07-01', 0),
(6, 'Imam Candra Dimas Anggoro', '3322194306990002', 'Ngaliyan', '085678543452', 'tongkat', '2025-07-17', '2025-07-25', 'ambil', '', '2025-07-01', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ceklab`
--

CREATE TABLE `ceklab` (
  `id` int(8) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `tanggal_periksa` date NOT NULL,
  `kode` varchar(8) NOT NULL,
  `temp` date NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ceklab`
--

INSERT INTO `ceklab` (`id`, `nik`, `nama`, `alamat`, `telepon`, `tanggal_periksa`, `kode`, `temp`, `status`) VALUES
(32, '3322194306990002', 'Yunita Isna Damayanti', 'Ngaliyan', '085643467152', '2025-07-02', 'THU8HC50', '2025-07-01', 0),
(33, '3322194306990002', 'Imam Candra Dimas Anggoro', 'Semarang', '085643467152', '2025-07-18', 'A9TN863T', '2025-07-01', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_alat`
--

CREATE TABLE `daftar_alat` (
  `id` int(8) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `available` varchar(255) NOT NULL,
  `kondisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `daftar_alat`
--

INSERT INTO `daftar_alat` (`id`, `nama`, `status`, `available`, `kondisi`) VALUES
(1, 'kursi roda', 'tersedia', 'enable', 'BAIK'),
(2, 'kasur', 'tersedia', 'enable', 'BAIK'),
(3, 'tongkat', '', 'enable', 'BAIK'),
(5, 'Infus', '', 'enable', 'BAIK'),
(7, 'suntik', '', 'enable', 'RUSAK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cred` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `cred`) VALUES
(1, 'admin@semarangkota.go.id', 'admin', 'admin'),
(3, 'yunita@gmail.com', 'yunita', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit`
--

CREATE TABLE `penyakit` (
  `id` int(8) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `layanan` varchar(255) NOT NULL,
  `tanggal_pelaksanaan` date NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `temp` date NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penyakit`
--

INSERT INTO `penyakit` (`id`, `nama`, `nik`, `alamat`, `telepon`, `layanan`, `tanggal_pelaksanaan`, `lokasi`, `keterangan`, `temp`, `status`) VALUES
(7, 'Yunita Isna Damayanti', '3322194306990002', 'Mijen', '085643467152', 'fogging', '2025-07-02', 'Mijen', '', '2025-07-01', 0),
(8, 'Imam Candra Dimas Anggoro', '33412764592344', 'Mangkang', '085643467152', 'sosialisasi', '2025-07-23', 'Semarang', '', '2025-07-01', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ceklab`
--
ALTER TABLE `ceklab`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `daftar_alat`
--
ALTER TABLE `daftar_alat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alat`
--
ALTER TABLE `alat`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `ceklab`
--
ALTER TABLE `ceklab`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `daftar_alat`
--
ALTER TABLE `daftar_alat`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
