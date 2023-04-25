-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Apr 2023 pada 18.54
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppl`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `nomertlp` int(14) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `name`, `email`, `password`, `image`, `nomertlp`, `alamat`) VALUES
(1, 'admin', 'admin@gmail.com', '12345', 'eko.PNG', 812398, 'mojokerto'),
(3, 'admin 2', 'admin2@gmail.com', '742f31d48ebf2a73f9c5599ba29dc672', 'Screenshot (6).png', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `formulir`
--

CREATE TABLE `formulir` (
  `id_form` int(11) NOT NULL,
  `id_mitra` int(100) NOT NULL,
  `id_Agro` int(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nomertlp` int(14) NOT NULL,
  `alasan` text NOT NULL,
  `tgldibuat` date NOT NULL,
  `tglsetuju` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `formulir`
--

INSERT INTO `formulir` (`id_form`, `id_mitra`, `id_Agro`, `nama`, `alamat`, `nomertlp`, `alasan`, `tgldibuat`, `tglsetuju`) VALUES
(6, 4, 3, 'fara', 'sumolawang', 8965412, 'sadqw', '2023-04-11', 1),
(7, 4, 3, 'mnmansd', 'ajdhkqwkjh', 12412314, 'askdbqkjb', '2023-04-15', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mitra`
--

CREATE TABLE `mitra` (
  `id_mitra` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `namausaha` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `visimisi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mitra`
--

INSERT INTO `mitra` (`id_mitra`, `name`, `email`, `password`, `namausaha`, `image`, `visimisi`) VALUES
(5, 'admin 1', 'ad@gmail.com', '3fc0a7acf087f549ac2b266baf94b8b1', '', 'Screenshot (6).png', ''),
(6, 'paijo', 'admin2@gmail.com', '0d0cbc57b162e09538aac9a2a394d73f', '', 'Screenshot (51).png', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelakuagro`
--

CREATE TABLE `pelakuagro` (
  `id_agro` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(50) NOT NULL,
  `namausaha` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelakuagro`
--

INSERT INTO `pelakuagro` (`id_agro`, `name`, `email`, `password`, `image`, `namausaha`, `deskripsi`) VALUES
(8, 'tukiyem', 't@gmail.com', '5416d7cd6ef195a0f7622a9c56b55e84', 'profile.JPG', 'tukiyem collection', 'merupakan usaha di bidang pertanian kangkung'),
(9, 'paijo', 'admin2@gmail.com', '8aa426e98a29e5f7c7e4ac3c72567a72', '987654321', '', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `formulir`
--
ALTER TABLE `formulir`
  ADD PRIMARY KEY (`id_form`);

--
-- Indeks untuk tabel `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id_mitra`);

--
-- Indeks untuk tabel `pelakuagro`
--
ALTER TABLE `pelakuagro`
  ADD PRIMARY KEY (`id_agro`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `formulir`
--
ALTER TABLE `formulir`
  MODIFY `id_form` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id_mitra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pelakuagro`
--
ALTER TABLE `pelakuagro`
  MODIFY `id_agro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
