-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Nov 2021 pada 15.54
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_saw`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buat_akun`
--

CREATE TABLE `buat_akun` (
  `nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buat_akun`
--

INSERT INTO `buat_akun` (`nama`, `username`, `password`) VALUES
('Desta', 'desta', 'destaa'),
('none', 'nonaman', 'nonaman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan_saw`
--

CREATE TABLE `karyawan_saw` (
  `id_karyawan` int(11) NOT NULL,
  `nama_karyawan` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan_saw`
--

INSERT INTO `karyawan_saw` (`id_karyawan`, `nama_karyawan`, `alamat`) VALUES
(1, 'Galaxy', 'Jakarta'),
(2, 'Iphone', 'Bandung'),
(3, 'BB', 'Kudus'),
(4, 'Lumia', 'Demak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria_saw`
--

CREATE TABLE `kriteria_saw` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(30) NOT NULL,
  `jenis` enum('cost','benefit') NOT NULL,
  `bobot` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria_saw`
--

INSERT INTO `kriteria_saw` (`id_kriteria`, `nama_kriteria`, `jenis`, `bobot`) VALUES
(1, 'Harga', 'cost', 0.2),
(2, 'Kwalitas', 'benefit', 0.25),
(3, 'Fitur', 'benefit', 0.2),
(4, 'Populer', 'benefit', 0.125),
(5, 'Purna Jual', 'benefit', 0.125),
(6, 'Keawetan', 'benefit', 0.1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_admin`
--

CREATE TABLE `login_admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login_admin`
--

INSERT INTO `login_admin` (`username`, `password`) VALUES
('admin1', 'e00cf25ad42683b3df678c61f42c6bda');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_saw`
--

CREATE TABLE `nilai_saw` (
  `id_nilai` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai_saw`
--

INSERT INTO `nilai_saw` (`id_nilai`, `id_kriteria`, `id_karyawan`, `nilai`) VALUES
(1, 1, 1, 3500),
(2, 1, 2, 4500),
(3, 1, 3, 4000),
(4, 1, 4, 4000),
(6, 2, 1, 70),
(7, 2, 2, 90),
(8, 2, 3, 80),
(9, 2, 4, 70),
(11, 3, 1, 10),
(12, 3, 2, 10),
(13, 3, 3, 9),
(14, 3, 4, 8),
(16, 4, 1, 8),
(17, 4, 2, 6),
(18, 4, 3, 9),
(19, 4, 4, 5),
(21, 5, 1, 3000),
(22, 5, 2, 2500),
(23, 5, 3, 2000),
(24, 5, 4, 1500),
(26, 6, 1, 36),
(27, 6, 2, 48),
(28, 6, 3, 48),
(29, 6, 4, 60);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buat_akun`
--
ALTER TABLE `buat_akun`
  ADD KEY `nama` (`nama`);

--
-- Indeks untuk tabel `karyawan_saw`
--
ALTER TABLE `karyawan_saw`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `kriteria_saw`
--
ALTER TABLE `kriteria_saw`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `nilai_saw`
--
ALTER TABLE `nilai_saw`
  ADD PRIMARY KEY (`id_nilai`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `karyawan_saw`
--
ALTER TABLE `karyawan_saw`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kriteria_saw`
--
ALTER TABLE `kriteria_saw`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `nilai_saw`
--
ALTER TABLE `nilai_saw`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
