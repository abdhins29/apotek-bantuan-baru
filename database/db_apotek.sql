-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jul 2019 pada 18.18
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_apotek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_jual`
--

CREATE TABLE `detail_jual` (
  `sub_faktur` varchar(5) NOT NULL,
  `id_tr` int(11) NOT NULL,
  `kd_exp` varchar(12) NOT NULL,
  `jml_jual` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_jual`
--

INSERT INTO `detail_jual` (`sub_faktur`, `id_tr`, `kd_exp`, `jml_jual`) VALUES
('SF001', 1, 'EXP00OBT0002', 2),
('SF001', 2, 'EXP00OBT0005', 4),
('SF002', 3, 'EXP00OBT0003', 4),
('SF002', 4, 'EXP00OBT0005', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_obat`
--

CREATE TABLE `detail_obat` (
  `kd_exp` varchar(12) NOT NULL,
  `tgl_exp` date NOT NULL,
  `kd_obat` varchar(5) NOT NULL,
  `harga_modal` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_obat`
--

INSERT INTO `detail_obat` (`kd_exp`, `tgl_exp`, `kd_obat`, `harga_modal`, `jumlah`) VALUES
('EXP00OBT0001', '2019-01-07', 'OB001', 1000000, 50),
('EXP00OBT0002', '2019-01-07', 'OB002', 380000, 25),
('EXP00OBT0003', '2019-01-07', 'OB003', 400000, 24),
('EXP00OBT0004', '2019-01-07', 'OB004', 800000, 2),
('EXP00OBT0005', '2019-01-07', 'OB005', 1500000, 500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `sub_transaksi` varchar(5) NOT NULL,
  `id_tr` int(11) NOT NULL,
  `kd_obat` varchar(5) NOT NULL,
  `jml_beli` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`sub_transaksi`, `id_tr`, `kd_obat`, `jml_beli`) VALUES
('SB001', 18, 'OB001', 6),
('SB001', 17, 'OB003', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kd_kategori` varchar(5) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kd_kategori`, `nama_kategori`) VALUES
('KT003', 'Antibiotik'),
('KT002', 'Salf'),
('KT001', 'Syrup');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `idkeranjang` varchar(5) NOT NULL,
  `kd_exp` varchar(12) NOT NULL,
  `kd_obat` varchar(5) NOT NULL,
  `tgl_jual` date NOT NULL,
  `jml_jual` int(11) NOT NULL,
  `total_jual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang_beli`
--

CREATE TABLE `keranjang_beli` (
  `idbeli` varchar(5) NOT NULL,
  `kd_suplier` varchar(5) NOT NULL,
  `kd_obat` varchar(5) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `jml_beli` int(11) NOT NULL,
  `total_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'kasir', 'kasir', 'kasir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `kd_obat` varchar(5) NOT NULL,
  `kd_kategori` varchar(5) NOT NULL,
  `nama_obat` varchar(30) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `total_jumlah` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`kd_obat`, `kd_kategori`, `nama_obat`, `harga_jual`, `total_jumlah`) VALUES
('OB002', 'KT003', 'Folic 400mcg Kaplet', 18000, 450000),
('OB003', 'KT002', 'Herocyn Powder 85 gr', 20000, 480000),
('OB001', 'KT003', 'Costan Forte Kaplet', 30000, 1500000),
('OB004', 'KT001', 'Medicated Oil 40 ml', 450000, 900000),
('OB005', 'KT001', 'Mirasic Syrup', 5000, 2500000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `suplier`
--

CREATE TABLE `suplier` (
  `kd_suplier` varchar(5) NOT NULL,
  `nama_suplier` varchar(30) NOT NULL,
  `kd_obat` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_tlp` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `suplier`
--

INSERT INTO `suplier` (`kd_suplier`, `nama_suplier`, `kd_obat`, `alamat`, `no_tlp`, `email`) VALUES
('SP001', 'PT. TALANG GUGUN SARI NUSANTAR', 'OB001', 'Jl. Alai Timur No. 41 Parak Kopi', '0751 4481375', 'talangugunsari@gmail.com'),
('SP002', 'PT. TALANG GUGUN SARI NUSANTAR', 'OB002', 'Jl. Alai Timur No. 41 Parak Kopi', '0751 4481375', 'talangugunsari@gmail.com'),
('SP003', 'KIMIA FARMA', 'OB003', 'Jl. Teknologi I No. 1 Siteba', '0751 446678', 'kimiafarmasiteba@gmail.com'),
('SP004', 'KIMIA FARMA', 'OB005', 'Jl. Teknologi I No. 1 Siteba', '0751 446678', 'kimiafarmasiteba@gmail.com'),
('SP005', 'KIMIA FARMA', 'OB001', 'Jl. Teknologi I No. 1 Siteba', '0751 446678', 'kimiafarmasiteba@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_beli`
--

CREATE TABLE `transaksi_beli` (
  `id_tr` int(11) NOT NULL,
  `no_transaksi` varchar(5) NOT NULL,
  `kd_suplier` varchar(5) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `total_transaksi` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_beli`
--

INSERT INTO `transaksi_beli` (`id_tr`, `no_transaksi`, `kd_suplier`, `tgl_transaksi`, `total_transaksi`) VALUES
(18, 'TB001', 'SP005', '2019-07-23', 180000),
(17, 'TB001', 'SP003', '2019-07-23', 60000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_jual`
--

CREATE TABLE `transaksi_jual` (
  `id_tr` int(11) NOT NULL,
  `no_faktur` varchar(5) NOT NULL,
  `kd_obat` varchar(5) NOT NULL,
  `tgl_jual` date NOT NULL,
  `total_jual` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_jual`
--

INSERT INTO `transaksi_jual` (`id_tr`, `no_faktur`, `kd_obat`, `tgl_jual`, `total_jual`) VALUES
(1, 'FK001', 'OB002', '2019-07-23', 36000),
(2, 'FK001', 'OB005', '2019-07-23', 20000),
(3, 'FK002', 'OB003', '2019-07-23', 80000),
(4, 'FK002', 'OB005', '2019-07-23', 20000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_obat`
--
ALTER TABLE `detail_obat`
  ADD PRIMARY KEY (`kd_exp`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kd_kategori`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`idkeranjang`);

--
-- Indeks untuk tabel `keranjang_beli`
--
ALTER TABLE `keranjang_beli`
  ADD PRIMARY KEY (`idbeli`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`kd_obat`);

--
-- Indeks untuk tabel `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`kd_suplier`);

--
-- Indeks untuk tabel `transaksi_beli`
--
ALTER TABLE `transaksi_beli`
  ADD PRIMARY KEY (`id_tr`);

--
-- Indeks untuk tabel `transaksi_jual`
--
ALTER TABLE `transaksi_jual`
  ADD PRIMARY KEY (`id_tr`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `transaksi_beli`
--
ALTER TABLE `transaksi_beli`
  MODIFY `id_tr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `transaksi_jual`
--
ALTER TABLE `transaksi_jual`
  MODIFY `id_tr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
