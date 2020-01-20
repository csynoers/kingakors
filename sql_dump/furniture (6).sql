-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jan 2020 pada 17.35
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
  `alamat_lengkap` text NOT NULL,
  `id_pelanggan` int(20) DEFAULT NULL,
  `status` enum('ready','no ready') NOT NULL DEFAULT 'ready'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alamat_pengiriman`
--

INSERT INTO `alamat_pengiriman` (`id_al_peng`, `nama`, `no_tlpn`, `id_prov`, `kota`, `kecamatan`, `alamat_lengkap`, `id_pelanggan`, `status`) VALUES
(6, 'risa', 988811, 'PRO-01', 'KAB-001', 'KEC-002', 'jalan patimura rt 06 rw 07', 12, 'ready');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(20) NOT NULL,
  `merek` varchar(30) DEFAULT NULL,
  `diskripsi` tinytext,
  `gambar` varchar(150) DEFAULT NULL,
  `gambar1` varchar(150) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `id_kategori` varchar(20) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `merek`, `diskripsi`, `gambar`, `gambar1`, `harga`, `stok`, `id_kategori`, `tanggal_masuk`) VALUES
('BR-0003', 'Rk01', 'Jenis kayu : Blokbord/multiplek, \r\nUkuran       : 140 cm x 180 cm, \r\nFinishing    : HPL TACO', 'compress_20200102033452.jpeg', 'compress_gambar2_20200102033452.jpeg', 2750000, 2, '3', '2020-01-17'),
('BR-0004', 'Rk02', 'Jenis kayu : Blokbord / multiplek, \r\nUkuran       : 120 cm x  180 cm, \r\nFinishing    : Hpl Taco', 'compress_20200102033657.jpeg', 'compress_gambar2_20200102033657.jpeg', 2500000, 0, '3', '2020-01-17'),
('BR-0005', 'Rk03', 'Jenis kayu : Blokbord / multiplex, \r\nUkuran       : 100 cm  x 160 cm, \r\nFinishing    : Hpl taco', 'compress_20200102033814.jpeg', 'compress_gambar2_20200102033814.jpeg', 2750000, 0, '3', '2020-01-17'),
('BR-0006', 'Rak multi fungsi siku', 'Jenis kayu : Blokbord/multiplex, \r\nUkuran       : 100 cm x 120 cm, \r\nFinishing    : Hpl taco ', 'compress_20200102033943.jpeg', 'compress_gambar2_20200102033943.jpeg', 2500000, 2, '3', '2020-01-17'),
('BR-0007', 'Rak hias', 'Jenis kayu : Blokbord/multiplek\r\nUkuran       : 40 cm x 100 cm', 'compress_20191231102032.jpeg', 'compress_gambar2_20191231102032.jpeg', 1250000, 1, '3', '2020-01-17'),
('BR-0008', 'Rk04', 'Jenis kayu : Blokbord / multiplek\r\nUkuran       : 50 cm x 150 cm', 'compress_20191231102330.jpeg', 'compress_gambar2_20191231102330.jpeg', 1250000, 2, '3', '2020-01-17'),
('BR-0009', 'Rk05', 'Jenis kayu : Blokbord ,\r\nUkuran       : 120 cm x 120 cm', 'compress_20191231102611.jpeg', 'compress_gambar2_20191231102611.jpeg', 1250000, 1, '3', '2020-01-17'),
('BR-0010', 'Rk06', 'Jenis kayu : Blokbord, \r\nUkuran       : 60 cm x 60 cm', 'compress_20191231102746.jpeg', 'compress_gambar2_20191231102746.jpeg', 850000, 2, '3', '2020-01-17'),
('BR-0011', 'Ornamen / rak hias', 'Jenis kayu : Blokbord, \r\nUkuran       : 60 cm x 60 cm , 40 cm x 40 cm , 25 cm x 25 cm ,\r\nJumlah       : 6 buah', 'compress_20191231103212.jpeg', 'compress_gambar2_20191231103212.jpeg', 1500000, 0, '3', '2020-01-17'),
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
('BR-0029', 'Sofa Bed Motive Kitty', 'Jenis Kain : Hanesy  ,\r\nJenis Busa : high Density 23/32,\r\nUkuran     : 156 x 285 cm,\r\nGaransi    : 2 Tahun', 'compress_20200102085444.jpeg', 'compress_gambar2_20200102085444.jpeg', 2500000, 0, '1', '2020-01-17'),
('BR-0030', 'Sofa S', 'Jenis Kain : Oscar, \r\nJenis Busa : high Density 23/32, \r\nUkuran     : 2 + 2 + 1 (seat), \r\nGaransi    : 2 Tahun', 'compress_20200102085710.jpeg', 'compress_gambar2_20200102085710.jpeg', 6750000, 2, '1', '2020-01-17'),
('BR-0031', 'Sofa L1', 'Jenis Kain : Hanesy , \r\nJenis Busa : high Density 23/32,\r\nUkuran     : 180 x 220 cm,\r\nGaransi    : 2 Tahun', 'compress_20200102085926.jpeg', 'compress_gambar2_20200102085926.jpeg', 4500000, 2, '1', '2020-01-17'),
('BR-0032', 'Sofa S1', 'Jenis Kain : Oscar,\r\nJenis Busa : High Density 23/32,\r\nUkuran     : 2 + 1 + meja,\r\nGaransi    : 2 Tahun', 'compress_20200102090346.jpeg', 'compress_gambar2_20200102090346.jpeg', 5500000, 2, '1', '2020-01-17'),
('BR-0033', 'sofa L12', 'Jenis Kain : Hanesy , \r\nJenis Busa : high Density 23/32,\r\nUkuran     : 185 x 220 cm,\r\nGaransi    : 2 Tahun', 'compress_20200102090613.jpeg', 'compress_gambar2_20200102090613.jpeg', 4800000, 2, '1', '2020-01-17'),
('BR-0035', 'Sofa Bed Polos', 'Jenis Kain  : Hanesy / midili,\r\nJenis Busa : high Density 23/32,\r\nUkuran       : 156 x 285 cm,\r\nGaransi      : 2 Tahun', 'compress_20200102091352.jpeg', 'compress_gambar2_20200102091352.jpeg', 2500000, 2, '1', '2020-01-17'),
('BR-0036', 'Sofa L3', 'Jenis Kain  : Midili /  Oscar,\r\nJenis Busa : high Density 23/32,\r\nUkuran       : 280 x 180 x 180 cm,\r\nGaransi      : 2 Tahun', 'compress_20200102091552.jpeg', 'compress_gambar2_20200102091552.jpeg', 8750000, 2, '1', '2020-01-17'),
('BR-0037', 'Sofa M1', 'Jenis Kain : Hanesy, \r\nJenis Busa : high Density 23/32,\r\nUkuran     : 80 x 160 cm,\r\nGaransi    : 2 Tahun', 'compress_20200102092039.jpeg', 'compress_gambar2_20200102092039.jpeg', 2300000, 2, '1', '2020-01-17'),
('BR-0038', 'Sofa Indachi', 'Jenis Kain : Oscar ,\r\nJenis Busa : High Density 23/32,\r\nUkuran     : 75 x 150 cm,\r\nGaransi    : 2 Tahun', 'compress_20200102092316.jpeg', 'compress_gambar2_20200102092316.jpeg', 2400000, 2, '1', '2020-01-17');

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
(45, 12, 'FNR01202020-001', 'BR-0029', 1);

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
('1', 'Sofa', 'compress_gambar_20191113125629.png'),
('2', 'Lemari', 'compress_gambar_20191113124959.png'),
('3', 'Rak Buku', 'compress_gambar_20191113125945.png');

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
-- Struktur dari tabel `metode_pembayaran`
--

CREATE TABLE `metode_pembayaran` (
  `id_met_pem` varchar(20) NOT NULL,
  `Transfer_Bank` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `metode_pembayaran`
--

INSERT INTO `metode_pembayaran` (`id_met_pem`, `Transfer_Bank`) VALUES
('1', ' Admin\r\nBCA (0988881122)');

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
(12, 'lisa', 'lisa', 'lisa', 'hanisetiani27@gmail.com', 98881123, 'jogja');

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
  `verifikasi` enum('belum bayar','dikirim','selesai','kadaluarsa') NOT NULL,
  `id_pelanggan` int(20) DEFAULT NULL,
  `bukti_transfer` varchar(150) DEFAULT NULL,
  `nama_peng` varchar(50) DEFAULT NULL,
  `kadaluarsa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pesan`, `id_met_pem`, `jumlah_uang`, `tgl_bayar`, `verifikasi`, `id_pelanggan`, `bukti_transfer`, `nama_peng`, `kadaluarsa`) VALUES
('BYR01202020-001', 'FNR01202020-001', '1', 2570000, '2020-01-20', 'belum bayar', 12, 'compress_pembayaran_20200120111929.png', 'lili', 1579493789);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pesan` varchar(20) NOT NULL,
  `tgl_pesan` int(11) DEFAULT NULL,
  `ongkir` int(11) DEFAULT NULL,
  `total_harga_barang` int(11) DEFAULT NULL,
  `id_al_peng` int(20) DEFAULT NULL,
  `id_pelanggan` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pesan`, `tgl_pesan`, `ongkir`, `total_harga_barang`, `id_al_peng`, `id_pelanggan`) VALUES
('FNR01202020-001', 2020, 70000, 2500000, 6, 12);

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
('PRO-01', 'Jawa Tengah'),
('PRO-02', 'Jawa Timur'),
('PRO-03', 'Yogyakarta');

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
  MODIFY `id_al_peng` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  MODIFY `id_det_pem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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

DELIMITER $$
--
-- Event
--
CREATE DEFINER=`root`@`localhost` EVENT `expired_pembayaran` ON SCHEDULE EVERY 1 MINUTE STARTS '2019-11-24 03:00:00' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
	    UPDATE `pembayaran` SET `verifikasi` = 'expired' WHERE tgl_bayar < (NOW() - INTERVAL 24 HOUR) AND bukti_transfer IS NULL;
	END$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
