-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Nov 2019 pada 16.16
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furniture`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_telp` int(12) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `pass`, `nama`, `no_telp`, `email`) VALUES
('1', 'admin', 'admin', 'admin', 2147483647, 'admin01@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamat_pengiriman`
--

CREATE TABLE `alamat_pengiriman` (
  `id_al_peng` int(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_tlpn` int(11) NOT NULL,
  `id_prov` varchar(20) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `kecamatan` varchar(20) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `id_pelanggan` int(20) DEFAULT NULL,
  `status` enum('ready','no ready') NOT NULL DEFAULT 'ready'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alamat_pengiriman`
--

INSERT INTO `alamat_pengiriman` (`id_al_peng`, `nama`, `no_tlpn`, `id_prov`, `kota`, `kecamatan`, `kode_pos`, `alamat_lengkap`, `id_pelanggan`, `status`) VALUES
(3, 'lisa', 2147483647, 'PRO-01', 'KOT-003', 'KEC-006', 55231, 'rt 08 rw 07', 1, 'ready'),
(4, 'lala', 2147483647, 'PRO-02', 'KOT-007', 'KEC-020', 55231, 'RT 06 RW 3 kota ', 2, 'ready'),
(5, 'dani', 986, 'PRO-01', 'KOT-004', 'KEC-008', 8456, 'RT 06 RW 3 kota surabaya', 3, 'ready');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(20) NOT NULL,
  `merek` varchar(30) DEFAULT NULL,
  `diskripsi` text,
  `gambar` varchar(150) DEFAULT NULL,
  `gambar1` varchar(150) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `id_kategori` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `merek`, `diskripsi`, `gambar`, `gambar1`, `harga`, `stok`, `id_kategori`) VALUES
('1', 'Sofa Bed Straight Rod', 'Bahan Kain : Oscar,\r\nJenis Busa : Abu abu, kekenyalan 23\r\nJenis Kayu : Mahoni,\r\nWarna : Maroon\r\nGaransi : 1 minggu', 'compress_20191017182445.JPG', 'compress_gambar2_20191017182445.JPG', 2500000, 6, '3'),
('5', 'Lemari Siantano LP WINDSOR 288', 'Ukuran : W. 100 x D.60 x H.200 cm\r\npaper sheet : grey ashtree\r\nTerbuat dari partcleboard dan MDF finishing.', 'compress_20191003194545.jpeg', 'compress_gambar2_20191003194545.jpeg', 2094000, 0, '2'),
('6', 'Lemari Activ LP Spin SL 80', 'Ukuran : W.120 x D.60 x H.200 cm\r\nLemari terbuat : particleboard dan MDF finishing\r\npenambahan variasi cermin', 'compress_20191003195319.jpeg', 'compress_gambar2_20191003195319.jpeg', 860000, 2, '2'),
('8', 'Sofa Lobby CHITOSE FUJI - DS', 'Spesifikasi\r\n-Panjang : 130 cm\r\n-Lebar : 91 cm\r\n-Tinggi : 1000 Centimeter\r\n-Berat : 24,6 kilogram\r\n-Warna : putih', 'compress_20191003200615.jpeg', NULL, 2860000, 8, '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pemesanan`
--

CREATE TABLE `detail_pemesanan` (
  `id_det_pem` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_pesan` varchar(20) DEFAULT NULL,
  `id_barang` varchar(20) DEFAULT NULL,
  `jumlah_pesan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pemesanan`
--

INSERT INTO `detail_pemesanan` (`id_det_pem`, `id_pelanggan`, `id_pesan`, `id_barang`, `jumlah_pesan`) VALUES
(8, 1, 'FNR10142019-003', '5', 1),
(17, 1, 'FNR10182019-004', '1', 1),
(18, 1, 'FNR10182019-005', '6', 1),
(19, 1, 'FNR10182019-006', '6', 1),
(20, 1, 'FNR10212019-007', '5', 1),
(21, 1, 'FNR10222019-008', '5', 10),
(24, 1, 'FNR10222019-009', '6', 1),
(25, 1, 'FNR10222019-010', '6', 1),
(27, 1, 'FNR10242019-012', '6', 1),
(28, 1, 'FNR10242019-011', '6', 1),
(29, 3, NULL, '1', 1),
(30, 3, 'FNR11032019-014', '6', 1),
(32, 1, 'FNR11032019-015', '8', 1),
(33, 1, 'FNR11032019-016', '1', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(20) NOT NULL,
  `nama_kat` varchar(30) NOT NULL,
  `gambar` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kat`, `gambar`) VALUES
('1', 'Meja', 'compress_gambar_20191010045034.png'),
('2', 'Lemari ', 'compress_gambar_20191010044725.png'),
('3', 'Sofa', 'compress_gambar_20191010045051.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kec` varchar(20) NOT NULL,
  `id_kota` varchar(20) DEFAULT NULL,
  `nm_kec` varchar(50) DEFAULT NULL,
  `jarak` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id_kec`, `id_kota`, `nm_kec`, `jarak`, `harga`) VALUES
('', NULL, NULL, NULL, NULL),
('KEC-001', 'KOT-001', 'Srandakan', 16, 5000),
('KEC-002', 'KOT-001', 'Sanden', 15, 5000),
('KEC-003', 'KOT-002', 'Gendangsari', 35, 5000),
('KEC-004', 'KOT-002', 'Girisubo', 31, 5000),
('KEC-005', 'KOT-002', 'Karangmojo', 15, 5000),
('KEC-006', 'KOT-003', 'Galur', 20, 5000),
('KEC-007', 'KOT-004', 'Berbah', 23, 5000),
('KEC-008', 'KOT-004', 'Depok', 12, 5000),
('KEC-009', 'KOT-004', 'Cangkringan', 19, 5000),
('KEC-010', 'KOT-004', 'Gamping', 14, 5000),
('KEC-011', 'KOT-004', 'Godean', 14, 5000),
('KEC-012', 'KOT-004', 'Kalasan', 19, 5000),
('KEC-013', 'KOT-005', 'Danurejan', 1, 5000),
('KEC-014', 'KOT-005', 'Gondokusuman', 2, 5000),
('KEC-015', 'KOT-005', 'Jetis', 3, 5000),
('KEC-016', 'KOT-005', 'Kotagede', 5, 5000),
('KEC-017', 'KOT-005', 'Kraton', 2, 5000),
('KEC-018', 'KOT-005', 'Mergangsan', 2, 5000),
('KEC-019', 'KOT-007', 'Bayat', 17, 5000),
('KEC-020', 'KOT-007', 'Jatinom', 12, 5000),
('KEC-021', 'KOT-007', 'Delanggu', 7, 5000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `id_kota` varchar(20) NOT NULL,
  `id_prov` varchar(20) DEFAULT NULL,
  `nm_kota` varchar(50) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id_kota`, `id_prov`, `nm_kota`, `biaya`) VALUES
('', NULL, NULL, NULL),
('KOT-001', 'PRO-01', 'Kabupaten Bantul', 50000),
('KOT-002', 'PRO-01', 'Kabupaten Gunung Kidul', 50000),
('KOT-003', 'PRO-01', 'Kabupaten Kulon Progo', 50000),
('KOT-004', 'PRO-01', 'Kabupaten Sleman', 0),
('KOT-005', 'PRO-01', 'Kota Yogyakarta', 0),
('KOT-006', 'PRO-02', 'Kabupaten Sukoharjo', 150000),
('KOT-007', 'PRO-02', 'Kabupaten Klaten', 100000),
('KOT-008', 'PRO-02', 'Kabupaten Semarang', 200000),
('KOT-009', 'PRO-02', 'Kabupaten Sragen', 200000),
('KOT-010', 'PRO-02', 'Kota Surakarta', 150000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `metode_pembayaran`
--

CREATE TABLE `metode_pembayaran` (
  `id_met_pem` varchar(20) NOT NULL,
  `Jenis_Pembayaran` varchar(20) NOT NULL,
  `No_rek` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `metode_pembayaran`
--

INSERT INTO `metode_pembayaran` (`id_met_pem`, `Jenis_Pembayaran`, `No_rek`) VALUES
('1', 'Bayar Langsung(Toko)', ''),
('2', 'Transfer Bank', 'BRI(0998888888)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(20) NOT NULL,
  `nama_pel` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_telp` int(12) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pel`, `username`, `pass`, `email`, `no_telp`, `alamat`) VALUES
(1, 'Lisa', 'lisa', 'lisa', 'lisasaraswati@gmail.com', 2147483647, 'solo'),
(2, 'ayu', 'aaa', '1234', 'dwirhy342@gmail.com', 897654187, 'jogja'),
(3, 'saya', 'saya', 'saya', 'harrisrizky28@gmail.com', 4869478, 'cilacap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` varchar(20) NOT NULL,
  `id_pesan` varchar(20) DEFAULT NULL,
  `id_met_pem` varchar(20) DEFAULT NULL,
  `jumlah_uang` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `verifikasi` enum('belum bayar','dikirim','selesai') NOT NULL,
  `id_pelanggan` int(20) DEFAULT NULL,
  `bukti_transfer` varchar(150) DEFAULT NULL,
  `nama_peng` varchar(50) DEFAULT NULL,
  `no_rek_peng` int(11) DEFAULT NULL,
  `jumlah_tf` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pesan`, `id_met_pem`, `jumlah_uang`, `tgl_bayar`, `verifikasi`, `id_pelanggan`, `bukti_transfer`, `nama_peng`, `no_rek_peng`, `jumlah_tf`) VALUES
('BYR10032019-001', 'FNR10032019-001', '2', 2150000, '2019-10-03', 'belum bayar', 1, '', '', 0, 0),
('BYR10072019-002', 'FNR10072019-002', '2', 5315000, '2019-10-07', 'belum bayar', 1, '', '', 0, 0),
('BYR10142019-003', 'FNR10142019-003', '1', 2144000, '2019-10-14', 'belum bayar', 1, 'compress_pembayaran_20191107150136.JPG', 'kiki', 2147483647, 24444400),
('BYR10182019-004', 'FNR10182019-004', '2', 2550000, '2019-10-18', 'belum bayar', 1, '', '', 0, 0),
('BYR10182019-005', 'FNR10182019-005', '2', 910000, '2019-10-18', 'belum bayar', 1, '', '', 0, 0),
('BYR10182019-006', 'FNR10182019-006', '2', 910000, '2019-10-18', 'belum bayar', 1, '', '', 0, 0),
('BYR10212019-007', 'FNR10212019-007', '2', 2244000, '2019-10-21', 'belum bayar', 1, '', '', 0, 0),
('BYR10222019-008', 'FNR10222019-008', '2', 21090000, '2019-10-22', 'belum bayar', 1, '', '', 0, 0),
('BYR10222019-009', 'FNR10222019-009', '2', 1010000, '2019-10-22', 'belum bayar', 1, '', '', 0, 0),
('BYR10222019-010', 'FNR10222019-010', '2', 1010000, '2019-10-22', 'belum bayar', 1, '', '', 0, 0),
('BYR10242019-011', 'FNR10242019-011', '2', 1010000, '2019-10-24', 'belum bayar', 1, '', '', 0, 0),
('BYR10242019-012', 'FNR10242019-012', '2', 1010000, '2019-10-24', 'belum bayar', 1, '', '', 0, 0),
('BYR10272019-013', 'FNR10272019-013', '2', 2650000, '2019-10-27', 'belum bayar', 1, '', '', 0, 0),
('BYR11032019-014', 'FNR11032019-014', '2', 920000, '2019-11-03', 'belum bayar', 3, NULL, NULL, NULL, NULL),
('BYR11032019-015', 'FNR11032019-015', '2', 3010000, '2019-11-03', 'belum bayar', 1, NULL, NULL, NULL, NULL),
('BYR11032019-016', 'FNR11032019-016', '2', 2650000, '2019-11-03', 'belum bayar', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pesan` varchar(20) NOT NULL,
  `tgl_pesan` date DEFAULT NULL,
  `ongkir` int(11) DEFAULT NULL,
  `total_harga_barang` int(11) DEFAULT NULL,
  `id_al_peng` int(20) DEFAULT NULL,
  `id_pelanggan` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pesan`, `tgl_pesan`, `ongkir`, `total_harga_barang`, `id_al_peng`, `id_pelanggan`) VALUES
('FNR10032019-001', '2019-10-03', 150000, 2000000, 3, 1),
('FNR10072019-002', '2019-10-07', 50000, 5265000, 3, 1),
('FNR10142019-003', '2019-10-14', 50000, 2094000, 3, 1),
('FNR10182019-004', '2019-10-18', 50000, 2500000, 3, 1),
('FNR10182019-005', '2019-10-18', 50000, 860000, 3, 1),
('FNR10182019-006', '2019-10-18', 50000, 860000, 3, 1),
('FNR10212019-007', '2019-10-21', 150000, 2094000, 3, 1),
('FNR10222019-008', '2019-10-22', 150000, 20940000, 3, 1),
('FNR10222019-009', '2019-10-22', 150000, 860000, 3, 1),
('FNR10222019-010', '2019-10-22', 150000, 860000, 3, 1),
('FNR10242019-011', '2019-10-24', 150000, 860000, 3, 1),
('FNR10242019-012', '2019-10-24', 150000, 860000, 3, 1),
('FNR10272019-013', '2019-10-27', 150000, 2500000, 3, 1),
('FNR11032019-014', '2019-11-03', 60000, 860000, 5, 3),
('FNR11032019-015', '2019-11-03', 150000, 2860000, 3, 1),
('FNR11032019-016', '2019-11-03', 150000, 2500000, 3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

CREATE TABLE `provinsi` (
  `id_prov` varchar(20) NOT NULL,
  `nama_prov` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `provinsi`
--

INSERT INTO `provinsi` (`id_prov`, `nama_prov`) VALUES
('PRO-01', 'Yogyakarta'),
('PRO-02', 'Jawa Tengah');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `alamat_pengiriman`
--
ALTER TABLE `alamat_pengiriman`
  ADD PRIMARY KEY (`id_al_peng`),
  ADD KEY `al_peng2` (`id_prov`),
  ADD KEY `al_peng3` (`kota`),
  ADD KEY `al_peng4` (`kecamatan`),
  ADD KEY `peng3` (`id_pelanggan`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `barang` (`id_kategori`);

--
-- Indeks untuk tabel `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD PRIMARY KEY (`id_det_pem`),
  ADD KEY `det1` (`id_pelanggan`),
  ADD KEY `det2` (`id_pesan`),
  ADD KEY `det3` (`id_barang`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kec`),
  ADD KEY `kot` (`id_kota`);

--
-- Indeks untuk tabel `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`),
  ADD KEY `prov` (`id_prov`);

--
-- Indeks untuk tabel `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  ADD PRIMARY KEY (`id_met_pem`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `pembayaran` (`id_pesan`),
  ADD KEY `pembayaran1` (`id_met_pem`),
  ADD KEY `pemb2` (`id_pelanggan`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pesan`),
  ADD KEY `pem3` (`id_pelanggan`),
  ADD KEY `pem4` (`id_al_peng`);

--
-- Indeks untuk tabel `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_prov`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alamat_pengiriman`
--
ALTER TABLE `alamat_pengiriman`
  MODIFY `id_al_peng` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  MODIFY `id_det_pem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `alamat_pengiriman`
--
ALTER TABLE `alamat_pengiriman`
  ADD CONSTRAINT `al_peng2` FOREIGN KEY (`id_prov`) REFERENCES `provinsi` (`id_prov`),
  ADD CONSTRAINT `peng3` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD CONSTRAINT `det1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `det2` FOREIGN KEY (`id_pesan`) REFERENCES `pemesanan` (`id_pesan`),
  ADD CONSTRAINT `det3` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD CONSTRAINT `kec1` FOREIGN KEY (`id_kota`) REFERENCES `kota` (`id_kota`);

--
-- Ketidakleluasaan untuk tabel `kota`
--
ALTER TABLE `kota`
  ADD CONSTRAINT `kot1` FOREIGN KEY (`id_prov`) REFERENCES `provinsi` (`id_prov`);

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pemb2` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `pembayaran` FOREIGN KEY (`id_pesan`) REFERENCES `pemesanan` (`id_pesan`),
  ADD CONSTRAINT `pembayaran1` FOREIGN KEY (`id_met_pem`) REFERENCES `metode_pembayaran` (`id_met_pem`);

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pem3` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `pem4` FOREIGN KEY (`id_al_peng`) REFERENCES `alamat_pengiriman` (`id_al_peng`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
