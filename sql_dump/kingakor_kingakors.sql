-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 19, 2020 at 12:52 AM
-- Server version: 10.2.26-MariaDB-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kingakor_kingakors`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
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
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `pass`, `nama`, `no_telp`, `email`) VALUES
('1', 'admin', 'admin', 'admin', 2147483647, 'admin01@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `alamat_pengiriman`
--

CREATE TABLE `alamat_pengiriman` (
  `id_al_peng` int(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_tlpn` char(15) NOT NULL,
  `id_prov` varchar(20) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `kecamatan` varchar(20) NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `id_pelanggan` int(20) DEFAULT NULL,
  `status` enum('ready','no ready') NOT NULL DEFAULT 'ready'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alamat_pengiriman`
--

INSERT INTO `alamat_pengiriman` (`id_al_peng`, `nama`, `no_tlpn`, `id_prov`, `kota`, `kecamatan`, `alamat_lengkap`, `id_pelanggan`, `status`) VALUES
(11, 'lisa', '2147483647', 'PRO-01', 'KAB-001', 'KEC-001', 'jalan diponegoro no 12 rt02 rw 03', 25, 'ready'),
(18, 'sinur coba', '081234567891', 'PRO-03', 'KAB-018', 'KEC-082', 'kos pak sapto', 33, 'ready'),
(19, 'apriyan', '081916060045', 'PRO-01', 'KAB-001', 'KEC-002', 'jjjjj', 34, 'ready');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(20) NOT NULL,
  `merek` varchar(30) DEFAULT NULL,
  `diskripsi` tinytext DEFAULT NULL,
  `gambar` varchar(150) DEFAULT NULL,
  `gambar1` varchar(150) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `id_kategori` varchar(20) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `merek`, `diskripsi`, `gambar`, `gambar1`, `harga`, `stok`, `id_kategori`, `tanggal_masuk`) VALUES
('BR-0003', 'Rk01', 'Jenis kayu : Blokbord/multiplek, \r\nUkuran       : 140 cm x 180 cm, \r\nFinishing    : HPL TACO', 'compress_20200102033452.jpeg', 'compress_gambar2_20200102033452.jpeg', 2750000, 1, '3', '2020-01-17'),
('BR-0004', 'Rk02', 'Jenis kayu : Blokbord / multiplek, \r\nUkuran       : 120 cm x  180 cm, \r\nFinishing    : Hpl Taco', 'compress_20200102033657.jpeg', 'compress_gambar2_20200102033657.jpeg', 2500000, 2, '3', '2020-01-17'),
('BR-0005', 'Rk03', 'Jenis kayu : Blokbord / multiplex, \r\nUkuran       : 100 cm  x 160 cm, \r\nFinishing    : Hpl taco', 'compress_20200102033814.jpeg', 'compress_gambar2_20200102033814.jpeg', 2750000, 3, '3', '2020-01-17'),
('BR-0006', 'Rak multi fungsi siku', 'Jenis kayu : Blokbord/multiplex, \r\nUkuran       : 100 cm x 120 cm, \r\nFinishing    : Hpl taco ', 'compress_20200102033943.jpeg', 'compress_gambar2_20200102033943.jpeg', 2500000, 0, '3', '2020-01-17'),
('BR-0007', 'Rak hias', 'Jenis kayu : Blokbord/multiplek\r\nUkuran       : 40 cm x 100 cm', 'compress_20191231102032.jpeg', 'compress_gambar2_20191231102032.jpeg', 1250000, 1, '3', '2020-01-17'),
('BR-0008', 'Rk04', 'Jenis kayu : Blokbord / multiplek\r\nUkuran       : 50 cm x 150 cm', 'compress_20191231102330.jpeg', 'compress_gambar2_20191231102330.jpeg', 1250000, 2, '3', '2020-01-17'),
('BR-0009', 'Rk05', 'Jenis kayu : Blokbord ,\r\nUkuran       : 120 cm x 120 cm', 'compress_20191231102611.jpeg', 'compress_gambar2_20191231102611.jpeg', 1250000, 1, '3', '2020-01-17'),
('BR-0010', 'Rk06', 'Jenis kayu : Blokbord, \r\nUkuran       : 60 cm x 60 cm', 'compress_20191231102746.jpeg', 'compress_gambar2_20191231102746.jpeg', 850000, 1, '3', '2020-01-17'),
('BR-0011', 'Ornamen / rak hias', 'Jenis kayu : Blokbord, \r\nUkuran       : 60 cm x 60 cm , 40 cm x 40 cm , 25 cm x 25 cm ,\r\nJumlah       : 6 buah', 'compress_20191231103212.jpeg', 'compress_gambar2_20191231103212.jpeg', 1500000, 1, '3', '2020-01-17'),
('BR-0012', 'Rak minimalis', 'Jenis kayu : Blokbord,\r\nUkuran      : 100 cm x 200 cm', 'compress_20191231103405.jpeg', 'compress_gambar2_20191231103405.jpeg', 2500000, 2, '3', '2020-01-17'),
('BR-0013', 'RK07', 'Jenis kayu : Blokbord,\r\nUkuran       : 120 cm x 200 cm.', 'compress_20191231103826.jpeg', 'compress_gambar2_20191231103826.jpeg', 2500000, 2, '3', '2020-01-17'),
('BR-0014', 'Rak multi fungsi', 'Jenis kayu : blokbord ,\r\nUkuran       : 120 cm x 200 xm', 'compress_20191231104101.jpeg', 'compress_gambar2_20191231104101.jpeg', 2750000, 2, '3', '2020-01-17'),
('BR-0015', 'Partisi / penyekat ', 'Jenis kayu : Blokbord / multiplek,\r\nUkuran       : 120 cm x 210 cm', 'compress_20191231105304.jpeg', 'compress_gambar2_20191231105304.jpeg', 4250000, 2, '3', '2020-01-17'),
('BR-0016', 'Partisi / penyekat 1', 'Jenis kayu : Blokbord / multiplek,\r\nUkuran       : 120 cm x 210 cm', 'compress_20191231105601.jpeg', 'compress_gambar2_20191231105601.jpeg', 4250000, 2, '3', '2020-01-17'),
('BR-0017', 'Almari pakaian 3 pintu / sledi', 'Jenis kayu : Blokbord / multiplek,\r\nWarna        : Costum HPL Taco, Kaca cermin / bening, rel extention (black),\r\nUkuran       : 180 cm x 220 cm\r\n', 'compress_20191231124723.jpeg', 'compress_gambar2_20191231124723.jpeg', 6500000, 2, '2', '2020-01-17'),
('BR-0018', 'Alumni sleding 2 pintu', 'Jenis kayu : Blokbord / multiplek\r\nWarna        : Costum hpl Taco, Rel extention (black).\r\nUkuran       : 160 cm x 220 cm', 'compress_20191231125119.jpeg', 'compress_gambar2_20191231125119.jpeg', 5750000, 1, '2', '2020-01-17'),
('BR-0019', 'Almari pakaian 2 pintu / sledi', 'Jenis kayu : Blokbord / multiplek,\r\nWarna        : Black / red (hpl Taco),\r\nUkuran       : 120 cm x 220 cm', 'compress_20191231125423.jpeg', 'compress_gambar2_20191231125423.jpeg', 4250000, 1, '2', '2020-01-17'),
('BR-0020', 'Almari hias 2 pintu swing', 'Jenis kayu : Blokbord / multiplek,\r\nWarna        : Grey hpl taco,\r\nUkuran       : 100 cm x 200 cm', 'compress_20191231125730.jpeg', 'compress_gambar2_20191231125730.jpeg', 3250000, 2, '2', '2020-01-17'),
('BR-0021', 'Almari sleding 2 pintu ', 'Jenis kayu : Blokbord / multiplek, \r\nJenis kaca : Kaca cermin / bening,\r\nWarna        : Coklat / cream,\r\nUkuran       : 120 cm x 220 cm', 'compress_20191231130214.jpeg', 'compress_gambar2_20191231130214.jpeg', 4250000, 2, '2', '2020-01-17'),
('BR-0022', 'Almari sleding', 'Jenis kayu : Blokbord , \r\nJenis kaca : kaca cermin, \r\nWarna        : white Hpl Taco, \r\nUkuran       : 180 cm x 220 cm', 'compress_20191231130612.jpeg', 'compress_gambar2_20191231130612.jpeg', 6500000, 2, '2', '2020-01-17'),
('BR-0023', 'Almari susun', 'Jenis kayu : Blokbord, \r\nJenis kaca : kaca cermin, \r\nWarna        : white, \r\nUkuran       : 160 cm x 280 cm\r\n', 'compress_20191231130823.jpeg', 'compress_gambar2_20191231130823.jpeg', 7150000, 2, '2', '2020-01-17'),
('BR-0024', 'Almari 2 pintu 1', 'Jenis kayu : Blokbord,\r\nJenis kaca : Kaca cermin, \r\nWarna        : White, \r\nUkuran       : 100 cm x 200 cm', 'compress_20191231131225.jpeg', 'compress_gambar2_20191231131225.jpeg', 3250000, 2, '2', '2020-01-17'),
('BR-0025', 'Almari pakaian 4 pintu / swing', 'Jenis kayu : Blokbord,\r\nJenis kaca : kaca cermin,\r\nWarna        : White / Black, \r\nUkuran       : 220 cm x 200 cm', 'compress_20191231131531.jpeg', 'compress_gambar2_20191231131531.jpeg', 7850000, 1, '2', '2020-01-17'),
('BR-0026', 'Almari full cermin', 'Jenis kayu : Blokbord, \r\nWarna        : Coklat kayu, \r\nUkuran       : 120 cm x 200 cm', 'compress_20191231131923.jpeg', 'compress_gambar2_20191231131923.jpeg', 4500000, 1, '2', '2020-01-17'),
('BR-0027', 'Lemari sleding 1', 'Jenis kayu : Blokbord, \r\nWarna        : White, \r\nUkuran       : 100 cm x 200 cm', 'compress_20191231132328.jpeg', 'compress_gambar2_20191231132328.jpeg', 2800000, 2, '2', '2020-01-17'),
('BR-0028', 'Sofa L2', 'Jenis Kain : Hanesy / Pandora /  Midili,\r\nJenis Busa : high Density 23/32,\r\nUkuran     : 220 x 185 cm,\r\nGaransi    : 2 Th', 'compress_20200102084958.jpeg', 'compress_gambar2_20200102084958.jpeg', 4800000, 1, '1', '2020-01-17'),
('BR-0029', 'Sofa Bed Motive Kitty', 'Jenis Kain : Hanesy  ,\r\nJenis Busa : high Density 23/32,\r\nUkuran     : 156 x 285 cm,\r\nGaransi    : 2 Tahun', 'compress_20200102085444.jpeg', 'compress_gambar2_20200102085444.jpeg', 2500000, 2, '1', '2020-01-17'),
('BR-0030', 'Sofa S', 'Jenis Kain : Oscar, \r\nJenis Busa : high Density 23/32, \r\nUkuran     : 2 + 2 + 1 (seat), \r\nGaransi    : 2 Tahun', 'compress_20200102085710.jpeg', 'compress_gambar2_20200102085710.jpeg', 6750000, 2, '1', '2020-01-17'),
('BR-0031', 'Sofa L1', 'Jenis Kain : Hanesy , \r\nJenis Busa : high Density 23/32,\r\nUkuran     : 180 x 220 cm,\r\nGaransi    : 2 Tahun', 'compress_20200102085926.jpeg', 'compress_gambar2_20200102085926.jpeg', 4500000, 2, '1', '2020-01-17'),
('BR-0032', 'Sofa S1', 'Jenis Kain : Oscar,\r\nJenis Busa : High Density 23/32,\r\nUkuran     : 2 + 1 + meja,\r\nGaransi    : 2 Tahun', 'compress_20200102090346.jpeg', 'compress_gambar2_20200102090346.jpeg', 5500000, 1, '1', '2020-01-17'),
('BR-0033', 'sofa L12', 'Jenis Kain : Hanesy , \r\nJenis Busa : high Density 23/32,\r\nUkuran     : 185 x 220 cm,\r\nGaransi    : 2 Tahun', 'compress_20200102090613.jpeg', 'compress_gambar2_20200102090613.jpeg', 4800000, 2, '1', '2020-01-17'),
('BR-0035', 'Sofa Bed Polos', 'Jenis Kain  : Hanesy / midili,\r\nJenis Busa : high Density 23/32,\r\nUkuran       : 156 x 285 cm,\r\nGaransi      : 2 Tahun', 'compress_20200102091352.jpeg', 'compress_gambar2_20200102091352.jpeg', 2500000, 2, '1', '2020-01-17'),
('BR-0036', 'Sofa L3', 'Jenis Kain  : Midili /  Oscar,\r\nJenis Busa : high Density 23/32,\r\nUkuran       : 280 x 180 x 180 cm,\r\nGaransi      : 2 Tahun', 'compress_20200102091552.jpeg', 'compress_gambar2_20200102091552.jpeg', 8750000, 0, '1', '2020-01-17'),
('BR-0037', 'Sofa M1', 'Jenis Kain : Hanesy, \r\nJenis Busa : high Density 23/32,\r\nUkuran     : 80 x 160 cm,\r\nGaransi    : 2 Tahun', 'compress_20200102092039.jpeg', 'compress_gambar2_20200102092039.jpeg', 2300000, 1, '1', '2020-01-17'),
('BR-0038', 'Sofa Indachi', 'Jenis Kain : Oscar ,\r\nJenis Busa : High Density 23/32,\r\nUkuran     : 75 x 150 cm,\r\nGaransi    : 2 Tahun', 'compress_20200102092316.jpeg', 'compress_gambar2_20200102092316.jpeg', 2400000, 2, '1', '2020-01-17');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemesanan`
--

CREATE TABLE `detail_pemesanan` (
  `id_det_pem` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_pesan` varchar(20) DEFAULT NULL,
  `id_barang` varchar(20) DEFAULT NULL,
  `jumlah_pesan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pemesanan`
--

INSERT INTO `detail_pemesanan` (`id_det_pem`, `id_pelanggan`, `id_pesan`, `id_barang`, `jumlah_pesan`) VALUES
(1, 25, 'FNR01282020-001', 'BR-0006', 1),
(2, 25, 'FNR01282020-002', 'BR-0035', 1),
(3, 25, 'FNR01282020-003', 'BR-0037', 1),
(6, 25, 'FNR01282020-004', 'BR-0008', 1),
(7, 25, 'FNR01282020-005', 'BR-0003', 1),
(10, 25, 'FNR01302020-007', 'BR-0035', 1),
(11, 25, 'FNR01302020-007', 'BR-0011', 1),
(15, 34, 'FNR02032020-009', 'BR-0036', 1),
(18, 25, 'FNR02152020-010', 'BR-0006', 1),
(20, 25, NULL, 'BR-0004', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(20) NOT NULL,
  `nama_kat` varchar(30) NOT NULL,
  `gambar` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kat`, `gambar`) VALUES
('1', 'Sofa', 'compress_gambar_20191113125629.png'),
('2', 'Lemari', 'compress_gambar_20191113124959.png'),
('3', 'Rak Buku', 'compress_gambar_20191113125945.png');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kec` varchar(20) NOT NULL,
  `id_kota` varchar(20) DEFAULT NULL,
  `nm_kec` varchar(50) DEFAULT NULL,
  `jarak` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kec`, `id_kota`, `nm_kec`, `jarak`, `harga`) VALUES
('KEC-001', 'KAB-001', 'Banjarsari', 5, 4000),
('KEC-002', 'KAB-001', 'Jebres', 5, 4000),
('KEC-003', 'KAB-001', 'Laweyan', 6, 4000),
('KEC-004', 'KAB-001', 'Pasar Kliwon', 2, 4000),
('KEC-005', 'KAB-001', 'Serengan', 1, 4000),
('KEC-006', 'KAB-002', 'Argomulyo', 4, 4000),
('KEC-007', 'KAB-002', 'Sidorejo', 4, 4000),
('KEC-008', 'KAB-002', 'Sidomukti', 4, 4000),
('KEC-009', 'KAB-002', 'Tingkir', 1, 4000),
('KEC-010', 'KAB-003', 'Tembarak', 7, 4000),
('KEC-011', 'KAB-003', 'Selompang', 9, 4000),
('KEC-012', 'KAB-004', 'Kartasuro', 0, 4000),
('KEC-013', 'KAB-004', 'Bendosari', 0, 4000),
('KEC-014', 'KAB-004', 'Nguter', 0, 4000),
('KEC-015', 'KAB-005', 'Gemolong', 0, 4000),
('KEC-016', 'KAB-005', 'Gesi', 0, 4000),
('KEC-017', 'KAB-005', 'Gondang', 0, 4000),
('KEC-018', 'KAB-005', 'Karangmalang', 0, 4000),
('KEC-019', 'KAB-005', 'Masaran', 0, 4000),
('KEC-020', 'KAB-005', 'Mondokan', 0, 4000),
('KEC-021', 'KAB-005', 'Plupuh', 0, 4000),
('KEC-022', 'KAB-005', 'Sidoharjo', 0, 4000),
('KEC-023', 'KAB-005', 'Sragen', 0, 4000),
('KEC-024', 'KAB-005', 'Sukodono', 0, 4000),
('KEC-025', 'KAB-005', 'Tangen', 0, 4000),
('KEC-026', 'KAB-005', 'Tanon', 0, 4000),
('KEC-027', 'KAB-005', 'Sumberlawang', 0, 4000),
('KEC-028', 'KAB-006', 'Borobudor', 19, 4000),
('KEC-029', 'KAB-006', 'Muntilan', 16, 4000),
('KEC-030', 'KAB-006', 'Tegalrejo', 5, 4000),
('KEC-031', 'KAB-006', 'Mertoyudan', 5, 4000),
('KEC-032', 'KAB-007', 'Prambanan', 21, 4000),
('KEC-033', 'KAB-007', 'Delanggu', 18, 4000),
('KEC-034', 'KAB-007', 'Jatinom', 20, 4000),
('KEC-035', 'KAB-007', 'Karanganom', 16, 4000),
('KEC-036', 'KAB-007', 'Kebonarum', 15, 4000),
('KEC-037', 'KAB-008', 'Tawangmangu', 21, 4000),
('KEC-038', 'KAB-008', 'Mojogedang', 13, 4000),
('KEC-039', 'KAB-008', 'Kebakkramat', 17, 4000),
('KEC-040', 'KAB-008', 'Karangpandan', 10, 4000),
('KEC-041', 'KAB-008', 'Gondangrejo', 25, 4000),
('KEC-042', 'KAB-008', 'Tasikmadu', 8, 4000),
('KEC-043', 'KAB-009', 'selo', 24, 4000),
('KEC-044', 'KAB-009', 'Cepogo', 10, 4000),
('KEC-045', 'KAB-009', 'Musuk', 11, 4000),
('KEC-046', 'KAB-009', 'Sambi', 13, 4000),
('KEC-047', 'KAB-010', 'Purwodadi', 12, 4),
('KEC-048', 'KAB-011', 'Ngawi', 0, 4000),
('KEC-049', 'KAB-011', 'Geneng', 12, 4000),
('KEC-050', 'KAB-011', 'Kendal', 15, 4000),
('KEC-051', 'KAB-011', 'Paron', 5, 4000),
('KEC-052', 'KAB-011', 'Widodaren', 16, 4000),
('KEC-053', 'KAB-012', 'Bagor', 9, 4000),
('KEC-054', 'KAB-012', 'Pace', 11, 4000),
('KEC-055', 'KAB-012', 'Nganjuk', 0, 4000),
('KEC-056', 'KAB-012', 'Sukomoro', 8, 4000),
('KEC-057', 'KAB-013', 'Karas', 13, 4000),
('KEC-058', 'KAB-013', 'Maospati', 16, 4000),
('KEC-059', 'KAB-013', 'Magetan', 0, 4000),
('KEC-060', 'KAB-013', 'Panekan', 13, 4000),
('KEC-061', 'KAB-013', 'Parang', 15, 4000),
('KEC-062', 'KAB-013', 'Sidorejo', 8, 4000),
('KEC-063', 'KAB-013', 'Sukomoro', 7, 4000),
('KEC-064', 'KAB-014', 'Kasihan', 8, 4000),
('KEC-065', 'KAB-014', 'Sewon', 8, 4000),
('KEC-066', 'KAB-014', 'Imogiri', 11, 4000),
('KEC-067', 'KAB-014', 'Banguntapan', 15, 4000),
('KEC-068', 'KAB-015', 'Wonosari', 10, 4000),
('KEC-069', 'KAB-016', 'wates', 5, 4000),
('KEC-070', 'KAB-016', 'Pengasih', 3, 4000),
('KEC-071', 'KAB-016', 'Temon', 16, 4000),
('KEC-072', 'KAB-016', 'Kokap', 12, 4000),
('KEC-073', 'KAB-016', 'Sentolo', 12, 4000),
('KEC-074', 'KAB-017', 'Turi', 13, 4000),
('KEC-075', 'KAB-017', 'Tempel', 9, 4000),
('KEC-076', 'KAB-017', 'Sleman', 0, 4000),
('KEC-077', 'KAB-017', 'Seyegan', 5, 4000),
('KEC-078', 'KAB-017', 'Pakem', 16, 4000),
('KEC-079', 'KAB-017', 'Ngemplak', 17, 4000),
('KEC-080', 'KAB-017', 'Cangkringan', 23, 4000),
('KEC-081', 'KAB-017', 'Depok', 11, 4000),
('KEC-082', 'KAB-017', 'Gamping', 10, 4000),
('KEC-083', 'KAB-017', 'Godean', 9, 4000),
('KEC-084', 'KAB-017', 'Mlati', 3, 4000),
('KEC-085', 'KAB-017', 'Kalasan', 21, 4000),
('KEC-086', 'KAB-017', 'Mlati', 3, 4000),
('KEC-087', 'KAB-018', 'Danurejan', 1, 4000),
('KEC-088', 'KAB-018', 'Gendongtengen', 2, 4000),
('KEC-089', 'KAB-018', 'Gondokusuman', 3, 4000),
('KEC-090', 'KAB-018', 'Gondomanan', 1, 4000),
('KEC-091', 'KAB-018', 'Jetis', 3, 4000),
('KEC-092', 'KAB-018', 'Kotagede', 5, 4000),
('KEC-093', 'KAB-018', 'Kraton', 2, 4000),
('KEC-094', 'KAB-018', 'Mantrijeron', 5, 4000),
('KEC-095', 'KAB-018', 'Mergangsan', 2, 4000),
('KEC-096', 'KAB-018', 'Ngampilan', 2, 4000),
('KEC-097', 'KAB-018', 'Pakualaman', 1, 4000),
('KEC-098', 'KAB-018', 'Tegalrejo', 4, 4000),
('KEC-099', 'KAB-018', 'Umbulharjo', 7, 4000),
('KEC-100', 'KAB-018', 'Wirobrajan', 4, 4000);

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id_kota` varchar(20) NOT NULL,
  `id_prov` varchar(20) DEFAULT NULL,
  `nm_kota` varchar(50) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `id_prov`, `nm_kota`, `biaya`) VALUES
('KAB-001', 'PRO-01', 'Surakarta', 50000),
('KAB-002', 'PRO-01', 'Salatiga', 80000),
('KAB-003', 'PRO-01', 'Temanggung', 130000),
('KAB-004', 'PRO-01', 'Sukoharjo', 50000),
('KAB-005', 'PRO-01', 'Sragen', 0),
('KAB-006', 'PRO-01', 'Magelang', 130000),
('KAB-007', 'PRO-01', 'Klaten', 120000),
('KAB-008', 'PRO-01', 'Karanganyar', 30000),
('KAB-009', 'PRO-01', 'Boyolali', 80000),
('KAB-010', 'PRO-01', 'Grobongan', 70000),
('KAB-011', 'PRO-02', 'Ngawi', 50000),
('KAB-012', 'PRO-02', 'Nganjuk', 130000),
('KAB-013', 'PRO-02', 'Magetan', 80000),
('KAB-014', 'PRO-03', 'Bantul', 130000),
('KAB-015', 'PRO-03', 'Gunung Kidul', 130000),
('KAB-016', 'PRO-03', 'Kulon Progo', 150000),
('KAB-017', 'PRO-03', 'Sleman', 130000),
('KAB-018', 'PRO-03', 'Yogyakarta', 130000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(20) NOT NULL,
  `nama_pel` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_telp` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pel`, `username`, `pass`, `email`, `no_telp`) VALUES
(25, 'lisa', 'lisa', 'lisa', 'hanisetiani26@gmail.com', '2147483647'),
(33, 'sinur coba', 'cobasinur', 'cobasinur', 'tryscm@gmail.com', '081234567891'),
(34, 'apriyan', 'apriyan', 'apriyan123', 'apriyan.pranata.ti@gmail.com', '081916060045');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` varchar(20) NOT NULL,
  `id_pesan` varchar(20) DEFAULT NULL,
  `jumlah_uang` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `verifikasi` enum('belum bayar','dikirim','selesai','kadaluarsa','pengemasan') NOT NULL,
  `id_pelanggan` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pesan`, `jumlah_uang`, `tgl_bayar`, `verifikasi`, `id_pelanggan`) VALUES
('BYR01282020-001', 'FNR01282020-001', 2570000, '2020-01-28', 'kadaluarsa', 25),
('BYR01282020-002', 'FNR01282020-002', 2570000, '2020-01-28', 'selesai', 25),
('BYR01282020-003', 'FNR01282020-003', 2370000, '2020-01-28', 'kadaluarsa', 25),
('BYR01282020-004', 'FNR01282020-004', 1320000, '2020-01-28', 'selesai', 25),
('BYR01282020-005', 'FNR01282020-005', 2820000, '2020-01-28', 'kadaluarsa', 25),
('BYR02032020-006', 'FNR02032020-009', 8820000, '2020-02-03', 'kadaluarsa', 34),
('BYR02152020-007', 'FNR02152020-010', 2570000, '2020-02-15', 'selesai', 25);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pesan` varchar(20) NOT NULL,
  `tgl_pesan` date DEFAULT NULL,
  `ongkir` int(11) DEFAULT NULL,
  `total_harga_barang` int(11) DEFAULT NULL,
  `id_al_peng` int(20) DEFAULT NULL,
  `id_pelanggan` int(20) DEFAULT NULL,
  `external_id` char(64) DEFAULT NULL,
  `invoice_url` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pesan`, `tgl_pesan`, `ongkir`, `total_harga_barang`, `id_al_peng`, `id_pelanggan`, `external_id`, `invoice_url`) VALUES
('FNR01282020-001', '2020-01-28', 70000, 2500000, 11, 25, '5e2f67e5f8a4d24146f5a746', 'https://invoice-staging.xendit.co/web/invoices/5e2f67e5f8a4d24146f5a746'),
('FNR01282020-002', '2020-01-28', 70000, 2500000, 11, 25, '5e2f695ff8a4d24146f5a758', 'https://invoice-staging.xendit.co/web/invoices/5e2f695ff8a4d24146f5a758'),
('FNR01282020-003', '2020-01-28', 70000, 2300000, 11, 25, '5e2f7345f8a4d24146f5a7a7', 'https://invoice-staging.xendit.co/web/invoices/5e2f7345f8a4d24146f5a7a7'),
('FNR01282020-004', '2020-01-28', 70000, 1250000, 11, 25, '5e2f849cf8a4d24146f5a83f', 'https://invoice-staging.xendit.co/web/invoices/5e2f849cf8a4d24146f5a83f'),
('FNR01282020-005', '2020-01-28', 70000, 2750000, 11, 25, '5e2ff524f8a4d24146f5ad74', 'https://invoice-staging.xendit.co/web/invoices/5e2ff524f8a4d24146f5ad74'),
('FNR01302020-007', '2020-01-30', 70000, 4000000, 11, 25, '5e31ee2fedaa736d0ea69fab', 'https://invoice-staging.xendit.co/web/invoices/5e31ee2fedaa736d0ea69fab'),
('FNR01302020-008', '2020-01-30', 70000, 4000000, 11, 25, '5e31ee37edaa736d0ea69fac', 'https://invoice-staging.xendit.co/web/invoices/5e31ee37edaa736d0ea69fac'),
('FNR02152020-010', '2020-02-15', 70000, 2500000, 11, 25, '5e4804709138ca030f533f41', 'https://invoice-staging.xendit.co/web/invoices/5e4804709138ca030f533f41'),
('FNR02032020-009', '2020-02-03', 70000, 8750000, 19, 34, '5e3763a79138ca030f52d34e', 'https://invoice-staging.xendit.co/web/invoices/5e3763a79138ca030f52d34e');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id_prov` varchar(20) NOT NULL,
  `nama_prov` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id_prov`, `nama_prov`) VALUES
('PRO-01', 'Jawa Tengah'),
('PRO-02', 'Jawa Timur'),
('PRO-03', 'Yogyakarta');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `alamat_pengiriman`
--
ALTER TABLE `alamat_pengiriman`
  ADD PRIMARY KEY (`id_al_peng`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD PRIMARY KEY (`id_det_pem`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kec`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_prov`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alamat_pengiriman`
--
ALTER TABLE `alamat_pengiriman`
  MODIFY `id_al_peng` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  MODIFY `id_det_pem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
