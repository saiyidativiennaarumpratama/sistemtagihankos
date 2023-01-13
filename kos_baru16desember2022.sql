-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Des 2022 pada 04.46
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `level` enum('admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`, `level`) VALUES
(1, 'admin1', 'admin1', 'vienna', 'admin'),
(2, 'admin2', 'admin2', 'salma', 'admin'),
(3, 'zazaa', 'zazaa', 'zazaa', 'admin'),
(5, 'salmafarida', 'salmafarida', 'salmafarida', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` varchar(11) NOT NULL,
  `kapasitas` varchar(10) NOT NULL,
  `nominal` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `kapasitas`, `nominal`) VALUES
('001', '2', '1.800.000'),
('002', '2', '1.700.000'),
('003', '2', '1.700.000'),
('005', '2', '1.700.000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_tagihan` int(11) NOT NULL,
  `id_kamar` varchar(11) NOT NULL,
  `nominal` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_admin`, `nama`, `id_tagihan`, `id_kamar`, `nominal`) VALUES
(55, 1, 'saiyidati', 1, '003', '1.900.000'),
(56, 1, 'salma', 1, '003', '1.900.000'),
(57, 1, 'salma', 2, '003', '1.900.000'),
(58, 1, 'saiyidati', 2, '003', '1.900.000'),
(59, 1, 'asfi', 1, '003', '1.900.000'),
(60, 1, 'zaza', 1, '002', '1.700.000'),
(61, 1, 'saiyidati', 2, '003', '1.700.000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penghuni`
--

CREATE TABLE `penghuni` (
  `id_penghuni` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_kamar` varchar(11) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(14) NOT NULL,
  `tgl_registrasi` date NOT NULL,
  `level` enum('penghuni') NOT NULL,
  `id_tagihan` int(11) NOT NULL,
  `status` enum('belumbayar','sudahbayar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penghuni`
--

INSERT INTO `penghuni` (`id_penghuni`, `username`, `password`, `nama`, `id_kamar`, `alamat`, `no_telp`, `tgl_registrasi`, `level`, `id_tagihan`, `status`) VALUES
(2, 'rara', 'rara', 'rara', '001', 'Bojonegoro', '6285887606632', '2022-12-01', 'penghuni', 1, 'belumbayar'),
(6, 'nia', 'nia', 'nia', '001', 'Bojonegoro', '6285655164259', '2022-12-15', 'penghuni', 1, 'belumbayar'),
(7, 'asfi', 'asfi', 'asfi', '003', 'Jombang', '6285850406445', '2022-12-15', 'penghuni', 6, 'belumbayar'),
(8, 'saiyidati', 'saiyidati', 'saiyidati', '003', 'Bojonegoro', '6288228299820', '2022-12-15', 'penghuni', 2, 'sudahbayar'),
(9, 'salma', 'salma', 'salma', '003', 'Bojonegoro', '6285655164259', '2022-12-15', 'penghuni', 2, 'sudahbayar'),
(10, 'zaza', 'zaza', 'zaza', '002', 'Bojonegoro', '6288228299820', '2022-12-15', 'penghuni', 2, 'belumbayar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tagihan`
--

CREATE TABLE `tagihan` (
  `id_tagihan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tagihan`
--

INSERT INTO `tagihan` (`id_tagihan`, `tahun`) VALUES
(1, 2021),
(2, 2022),
(6, 2023);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_aktor` (`id_admin`),
  ADD KEY `id_tagihan` (`id_tagihan`),
  ADD KEY `id_kamar` (`id_kamar`);

--
-- Indeks untuk tabel `penghuni`
--
ALTER TABLE `penghuni`
  ADD PRIMARY KEY (`id_penghuni`),
  ADD KEY `id_kamar` (`id_kamar`),
  ADD KEY `id_tagihan` (`id_tagihan`);

--
-- Indeks untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id_tagihan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `penghuni`
--
ALTER TABLE `penghuni`
  MODIFY `id_penghuni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id_tagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_3` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `pembayaran_ibfk_5` FOREIGN KEY (`id_tagihan`) REFERENCES `tagihan` (`id_tagihan`);

--
-- Ketidakleluasaan untuk tabel `penghuni`
--
ALTER TABLE `penghuni`
  ADD CONSTRAINT `penghuni_ibfk_1` FOREIGN KEY (`id_tagihan`) REFERENCES `tagihan` (`id_tagihan`),
  ADD CONSTRAINT `penghuni_ibfk_2` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id_kamar`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
