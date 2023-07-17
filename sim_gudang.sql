-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jul 2023 pada 10.31
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sim_gudang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `id_rak` int(11) NOT NULL,
  `kode_produk` varchar(50) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `unit_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `id_rak`, `kode_produk`, `nama_produk`, `unit_produk`) VALUES
(6, 13, 'T0001', 'Teh Walini', 10),
(7, 14, 'T0002', 'Teh Walini 2', 0),
(8, 15, 'T0003', 'Teh Walini 3', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang_keluar`
--

CREATE TABLE `tb_barang_keluar` (
  `id_keluar` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_store` varchar(100) NOT NULL,
  `cabang` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang_masuk`
--

CREATE TABLE `tb_barang_masuk` (
  `id_masuk` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_rak` int(11) NOT NULL,
  `id_lantai` int(11) NOT NULL,
  `id_papan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `tanggal_kadaluarsa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_barang_masuk`
--

INSERT INTO `tb_barang_masuk` (`id_masuk`, `id_barang`, `id_rak`, `id_lantai`, `id_papan`, `jumlah`, `tanggal_masuk`, `tanggal_kadaluarsa`) VALUES
(147, 6, 13, 32, 43, 10, '2023-07-29', '2023-07-26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lantai`
--

CREATE TABLE `tb_lantai` (
  `id_lantai` int(11) NOT NULL,
  `id_rak` int(11) NOT NULL,
  `kode_lantai` varchar(20) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `kapasitas_lantai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_lantai`
--

INSERT INTO `tb_lantai` (`id_lantai`, `id_rak`, `kode_lantai`, `no_urut`, `kapasitas_lantai`) VALUES
(32, 13, 'A1', 1, 432),
(33, 13, 'A2', 2, 432),
(34, 13, 'A3', 3, 432),
(35, 14, 'B1', 1, 432),
(36, 14, 'B2', 2, 432),
(37, 14, 'B3', 3, 432);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_laporan_keluar`
--

CREATE TABLE `tb_laporan_keluar` (
  `id_laporan_keluar` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_laporan_masuk`
--

CREATE TABLE `tb_laporan_masuk` (
  `id_laporan_masuk` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_laporan_masuk`
--

INSERT INTO `tb_laporan_masuk` (`id_laporan_masuk`, `id_barang`, `jumlah`, `tanggal`) VALUES
(7, 6, 50, '2023-07-05'),
(8, 6, 40, '2023-07-05'),
(9, 6, 50, '2023-06-29'),
(10, 6, 40, '2023-06-28'),
(11, 6, 7, '2023-07-05'),
(12, 6, 48, '2023-07-18'),
(13, 6, 10, '2023-07-11'),
(14, 6, 10, '2023-07-11'),
(15, 6, 10, '2023-07-20'),
(16, 6, 10, '2023-07-13'),
(17, 6, 10, '2023-07-18'),
(18, 6, 10, '2023-07-26'),
(19, 6, 10, '2023-07-20'),
(20, 6, 10, '2023-07-27'),
(21, 6, 10, '2023-07-29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_papan`
--

CREATE TABLE `tb_papan` (
  `id_papan` int(11) NOT NULL,
  `id_rak` int(11) NOT NULL,
  `id_lantai` int(11) NOT NULL,
  `kode_papan` varchar(30) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `kapasitas_papan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_papan`
--

INSERT INTO `tb_papan` (`id_papan`, `id_rak`, `id_lantai`, `kode_papan`, `no_urut`, `kapasitas_papan`) VALUES
(43, 13, 32, 'A1-1', 1, 48),
(44, 13, 32, 'A1-2', 2, 48),
(46, 13, 32, 'A1-3', 3, 48);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `no_telpon` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id`, `nama`, `role`, `no_telpon`, `email`, `password`, `alamat`) VALUES
(8, 'Moch Rifa Maulana N', 'Administrator', '120394857321', 'admin@gmail.com', '$2y$10$oO8CGoe3NJ.0iTg/Osg83OFMDWuEXH67blueUH2oH1sjBIHcbk14W', 'Tasikmalaya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_persediaan`
--

CREATE TABLE `tb_persediaan` (
  `id_persediaan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `kode_produk` varchar(10) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `tanggal_kadaluarsa` date NOT NULL,
  `rak` varchar(5) NOT NULL,
  `lantai` varchar(10) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_persediaan`
--

INSERT INTO `tb_persediaan` (`id_persediaan`, `id_barang`, `kode_produk`, `tanggal_masuk`, `tanggal_kadaluarsa`, `rak`, `lantai`, `jumlah`) VALUES
(25, 6, 'T0001', '2023-07-27', '2023-07-26', 'Rak A', 'A1', 10),
(26, 6, 'T0001', '2023-07-29', '2023-07-26', 'Rak A', 'A1', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_persetujuan`
--

CREATE TABLE `tb_persetujuan` (
  `id_persetujuan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_store` varchar(100) NOT NULL,
  `cabang` varchar(100) NOT NULL,
  `unit` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rak`
--

CREATE TABLE `tb_rak` (
  `id_rak` int(11) NOT NULL,
  `kode_rak` varchar(30) NOT NULL,
  `kapasitas` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_rak`
--

INSERT INTO `tb_rak` (`id_rak`, `kode_rak`, `kapasitas`) VALUES
(13, 'Rak A', 1296),
(14, 'Rak B', 1296),
(15, 'Rak C', 1296);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_stok_lantai`
--

CREATE TABLE `tb_stok_lantai` (
  `id_stok_lantai` int(11) NOT NULL,
  `id_rak` int(11) NOT NULL,
  `id_lantai` int(11) NOT NULL,
  `jumlah_ada` int(11) NOT NULL,
  `jumlah_kosong` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_stok_lantai`
--

INSERT INTO `tb_stok_lantai` (`id_stok_lantai`, `id_rak`, `id_lantai`, `jumlah_ada`, `jumlah_kosong`, `no_urut`) VALUES
(36, 13, 32, 30, 402, 1),
(37, 13, 33, 0, 432, 2),
(38, 13, 34, 0, 432, 3),
(39, 14, 35, 0, 432, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_stok_papan`
--

CREATE TABLE `tb_stok_papan` (
  `id_stok_papan` int(11) NOT NULL,
  `id_lantai` int(11) NOT NULL,
  `id_papan` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `jumlah_ada` int(11) NOT NULL,
  `jumlah_kosong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_stok_papan`
--

INSERT INTO `tb_stok_papan` (`id_stok_papan`, `id_lantai`, `id_papan`, `no_urut`, `jumlah_ada`, `jumlah_kosong`) VALUES
(91, 32, 43, 1, 30, 18),
(92, 32, 44, 2, 0, 48),
(93, 32, 46, 3, 0, 48);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tb_barang_keluar`
--
ALTER TABLE `tb_barang_keluar`
  ADD PRIMARY KEY (`id_keluar`);

--
-- Indeks untuk tabel `tb_barang_masuk`
--
ALTER TABLE `tb_barang_masuk`
  ADD PRIMARY KEY (`id_masuk`);

--
-- Indeks untuk tabel `tb_lantai`
--
ALTER TABLE `tb_lantai`
  ADD PRIMARY KEY (`id_lantai`);

--
-- Indeks untuk tabel `tb_laporan_keluar`
--
ALTER TABLE `tb_laporan_keluar`
  ADD PRIMARY KEY (`id_laporan_keluar`);

--
-- Indeks untuk tabel `tb_laporan_masuk`
--
ALTER TABLE `tb_laporan_masuk`
  ADD PRIMARY KEY (`id_laporan_masuk`);

--
-- Indeks untuk tabel `tb_papan`
--
ALTER TABLE `tb_papan`
  ADD PRIMARY KEY (`id_papan`);

--
-- Indeks untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_persediaan`
--
ALTER TABLE `tb_persediaan`
  ADD PRIMARY KEY (`id_persediaan`);

--
-- Indeks untuk tabel `tb_persetujuan`
--
ALTER TABLE `tb_persetujuan`
  ADD PRIMARY KEY (`id_persetujuan`);

--
-- Indeks untuk tabel `tb_rak`
--
ALTER TABLE `tb_rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indeks untuk tabel `tb_stok_lantai`
--
ALTER TABLE `tb_stok_lantai`
  ADD PRIMARY KEY (`id_stok_lantai`);

--
-- Indeks untuk tabel `tb_stok_papan`
--
ALTER TABLE `tb_stok_papan`
  ADD PRIMARY KEY (`id_stok_papan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_barang_keluar`
--
ALTER TABLE `tb_barang_keluar`
  MODIFY `id_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_barang_masuk`
--
ALTER TABLE `tb_barang_masuk`
  MODIFY `id_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT untuk tabel `tb_lantai`
--
ALTER TABLE `tb_lantai`
  MODIFY `id_lantai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `tb_laporan_keluar`
--
ALTER TABLE `tb_laporan_keluar`
  MODIFY `id_laporan_keluar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_laporan_masuk`
--
ALTER TABLE `tb_laporan_masuk`
  MODIFY `id_laporan_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tb_papan`
--
ALTER TABLE `tb_papan`
  MODIFY `id_papan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_persediaan`
--
ALTER TABLE `tb_persediaan`
  MODIFY `id_persediaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `tb_persetujuan`
--
ALTER TABLE `tb_persetujuan`
  MODIFY `id_persetujuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_rak`
--
ALTER TABLE `tb_rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_stok_lantai`
--
ALTER TABLE `tb_stok_lantai`
  MODIFY `id_stok_lantai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `tb_stok_papan`
--
ALTER TABLE `tb_stok_papan`
  MODIFY `id_stok_papan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
