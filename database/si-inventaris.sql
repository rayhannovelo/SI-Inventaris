-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2018 at 05:10 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si-inventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang_inventaris`
--

CREATE TABLE `barang_inventaris` (
  `id_barang_inventaris` int(11) NOT NULL,
  `id_inventaris` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `kuantitas_awal` int(11) NOT NULL,
  `kuantitas_toko` int(11) NOT NULL,
  `kuantitas_pengawas` int(11) NOT NULL,
  `status_baik` int(11) NOT NULL,
  `status_rusak` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `barang_perbaikan`
--

CREATE TABLE `barang_perbaikan` (
  `barang_perbaikan` int(11) NOT NULL,
  `id_perbaikan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `kuantitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `barang_permintaan`
--

CREATE TABLE `barang_permintaan` (
  `id_barang_permintaan` int(11) NOT NULL,
  `id_permintaan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `kuantitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `daftar_barang`
--

CREATE TABLE `daftar_barang` (
  `id_barang` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `masa_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_barang`
--

INSERT INTO `daftar_barang` (`id_barang`, `id_kategori`, `nama_barang`, `merk`, `satuan`, `harga`, `masa_barang`) VALUES
(23, 1, 'Cash Drawer', '', 'Buah', 900000, 4),
(24, 1, 'CPU', '', 'Buah', 1200000, 5),
(25, 1, 'HUB', '', 'Buah', 2100000, 5),
(26, 1, 'Keyboard', '', 'Buah', 250000, 4),
(27, 1, 'Modem', '', 'Buah', 477257, 5),
(28, 1, 'Monitor', '', 'Buah', 800000, 5),
(29, 1, 'Mouse', '', 'Buah', 120000, 4),
(30, 1, 'Print Epson', 'Epson', 'Buah', 1450000, 6),
(31, 1, 'Printer kasir', '', 'Buah', 1248000, 5),
(32, 1, 'Scanner', '', 'Buah', 4131000, 5),
(33, 1, 'UPS', '', 'Buah', 770000, 5),
(35, 2, 'AC 1 pk', 'Panasonic', 'Buah', 2600000, 8),
(36, 2, 'AC 1,5 pk', 'Panasonic', 'Buah', 3600000, 8),
(37, 2, 'AC 2 pk', 'Panasonic', 'Buah', 3800000, 8),
(38, 2, 'Acrylic bumbu', '', 'Buah', 116000, 4),
(39, 2, 'Acrylic COC', '', 'Buah', 116000, 4),
(41, 2, 'Acrylic kamper', '', 'Buah', 116000, 4),
(42, 2, 'Acrylic kupon', '', 'Buah', 116000, 4),
(43, 2, 'Acrylic obat', '', 'Buah', 116000, 4),
(44, 2, 'Acrylic rokok', '', 'Buah', 116000, 4),
(45, 2, 'Acrylic sampul', '', 'Buah', 116000, 4),
(46, 2, 'Acrylic shampoo', '', 'Buah', 116000, 4),
(47, 2, 'Acrylic stationary', '', 'Buah', 116000, 4),
(48, 2, 'Acrylic under wear', '', 'Buah', 116000, 4),
(49, 2, 'Aquarium snack curah', '', 'Buah', 150000, 4),
(50, 2, 'Brankas', '', 'Buah', 3950000, 8),
(51, 2, 'COC tiang', '', 'Buah', 224000, 4),
(52, 2, 'Convex Mirror', '', 'Buah', 124000, 4),
(53, 2, 'Depositor', '', 'Buah', 450000, 4),
(54, 2, 'Display Cooler', 'GEA EXPO', 'Buah', 7750000, 8),
(55, 2, 'Filling Kabinet', '', 'Buah', 3200000, 8),
(56, 2, 'Gembok + Kunci pintu', '', 'Buah', 250000, 4),
(57, 2, 'Genset', 'Lioncin', 'Buah', 5600000, 8),
(58, 2, 'Kaca cermin dinding', '', 'Buah', 120000, 4),
(59, 2, 'Keranjang belanja', '', 'Buah', 86000, 4),
(60, 2, 'Keset merah', '', 'Buah', 210000, 4),
(61, 2, 'kursi plastik', '', 'Buah', 30000, 4),
(62, 2, 'Kursi Putar', '', 'Buah', 320000, 5),
(63, 2, 'Meja Kasir', '', 'Buah', 3300000, 8),
(64, 2, 'Meja Kasir Tipe L', '', 'Buah', 3600000, 8),
(65, 2, 'Meja Samping Kasir', '', 'Buah', 2400000, 4),
(66, 2, 'Pompa Air', '', 'Buah', 1300000, 4),
(67, 2, 'Radio tape recorder', '', 'Buah', 750000, 4),
(68, 2, 'Rak buah', '', 'Buah', 171600, 4),
(69, 2, 'Rak candies', '', 'Buah', 151000, 4),
(70, 2, 'Rak kertas kado', '', 'Buah', 121000, 4),
(71, 2, 'Rak majalah', '', 'Buah', 130000, 4),
(72, 2, 'Rak snack curah', '', 'Buah', 132000, 4),
(73, 2, 'Sepeda', '', 'Buah', 760000, 4),
(74, 2, 'Showcase cermin', '', 'Buah', 121000, 4),
(75, 2, 'Sign shop', '', 'Buah', 6350000, 8),
(76, 2, 'Single pool', '', 'Buah', 230000, 4),
(77, 2, 'Stempel alamat toko', '', 'Buah', 40000, 4),
(78, 2, 'Stempel toko', '', 'Buah', 40000, 4),
(79, 2, 'Televisi', '', 'Buah', 2100000, 5),
(80, 2, 'Timbangan buah', '', 'Buah', 750000, 5),
(81, 2, 'Termometer', '', 'Buah', 340000, 4),
(82, 3, 'Bag sealer', '', 'Buah', 165000, 4),
(83, 3, 'Bantal', '', 'Buah', 80000, 4),
(84, 3, 'Dispenser', '', 'Buah', 189500, 4),
(85, 3, 'Ember besar', '', 'Buah', 112000, 4),
(86, 3, 'Ember kecil', '', 'Buah', 80000, 4),
(87, 2, 'Emergency lamp', '', 'Buah', 450000, 5),
(88, 3, 'Exhaust fan', '', 'Buah', 220000, 4),
(89, 3, 'Garpu', '', 'Buah', 6000, 3),
(90, 3, 'Gayung', '', 'Buah', 15000, 2),
(91, 3, 'Gelas', '', 'Buah', 4000, 3),
(92, 3, 'Guling', '', 'Buah', 80000, 4),
(93, 3, 'Kasur busa', '', 'Buah', 230000, 4),
(94, 3, 'Kipas angin', '', 'Buah', 310000, 4),
(95, 3, 'Kompor minyak', '', 'Buah', 250000, 4),
(96, 3, 'Kursi lipat', '', 'Buah', 120000, 5),
(97, 3, 'Lampu deteksi uang palsu', '', 'Buah', 750000, 5),
(98, 3, 'Lemari karyawan', '', 'Buah', 2300000, 5),
(99, 3, 'Meja kepala toko', '', 'Buah', 2100000, 5),
(100, 3, 'Meja setrika', '', 'Buah', 125000, 4),
(101, 3, 'Panci enamel', '', 'Buah', 60000, 4),
(102, 3, 'Papan gilasan', '', 'Buah', 30000, 4),
(103, 3, 'Pesawat telepon', '', 'Buah', 311000, 4),
(104, 3, 'Piring', '', 'Buah', 15000, 3),
(105, 3, 'Price gun', '', 'Buah', 20000, 3),
(106, 3, 'Sendok', '', 'Buah', 4000, 3),
(107, 3, 'Setrika listrik', '', 'Buah', 230000, 4),
(108, 3, 'Sprei', '', 'Buah', 90000, 3),
(109, 3, 'Sutil', '', 'Buah', 30000, 3),
(110, 3, 'Tabung pemadam', '', 'Buah', 615000, 5),
(111, 3, 'Tangga aluminium', '', 'Buah', 416000, 5),
(112, 3, 'Teko bunyi', '', 'Buah', 120000, 4),
(113, 3, 'Tempat sampah kecil', '', 'Buah', 112000, 4),
(114, 3, 'Tempat sampah besar', '', 'Buah', 130000, 4),
(115, 3, 'Tikar', '', 'Buah', 115000, 4),
(116, 3, 'Wajan', '', 'Buah', 60000, 4),
(117, 4, 'Backmesh uk. 80x150', '', 'Buah', 108000, 4),
(118, 4, 'Backmesh uk. 90x170', '', 'Buah', 112000, 4),
(119, 4, 'Shelving + Bracket uk. 80x 35', '', 'Set', 40000, 4),
(120, 4, 'Shelving + Bracket uk. 90 x 20', '', 'Set', 35000, 4),
(121, 4, 'Shelving + Bracket uk. 90 x 35', '', 'Set', 38000, 4),
(122, 4, 'Shelving + Bracket uk. 90 x 40', '', 'Set', 36000, 4),
(123, 4, 'Shelving dasar uk. 80x40', '', 'Buah', 40000, 4),
(124, 4, 'Shelving dasar uk. 90x40', '', 'Buah', 45000, 4),
(125, 4, 'Tiang kaki single uk. 40x150', '', 'Btg', 55000, 4),
(126, 4, 'Tiang kaki single uk. 40x170', '', 'Btg', 60000, 4),
(127, 5, 'Backmesh uk. 90x150', '', 'Buah', 34000, 4),
(128, 5, 'Shelving + Bracket uk. 90 x 20', '', 'Set', 40000, 4),
(129, 5, 'Shelving + Bracket uk. 90 x 35', '', 'Set', 45000, 4),
(130, 5, 'Shelving dasar uk. 90x40', '', 'Buah', 46000, 4),
(131, 5, 'Tiang kaki double uk. 80 x 150', '', 'Btg', 160000, 4),
(132, 6, 'Backmesh uk. 90x120', '', 'Buah', 56000, 4),
(133, 6, 'Shelving + Bracket uk. 90 x 20', '', 'Set', 62000, 4),
(134, 6, 'Shelving dasar uk. 90 x 20', '', 'Buah', 43000, 4),
(135, 6, 'Tiang kaki single uk. 20x120', '', 'Btg', 120000, 4),
(136, 7, 'Backmesh uk. 90x170', '', 'Buah', 56000, 4),
(137, 7, 'Backmesh uk. 90x150', '', 'Buah', 52000, 4),
(138, 7, 'Backmesh uk. 90x120', '', 'Buah', 45000, 4),
(139, 7, 'Tiang kaki single uk. 60 x 170', '', 'Btg', 112000, 4),
(140, 7, 'Backmesh uk. 80 x 170', '', 'Buah', 115000, 4),
(142, 7, 'Shelving + Bracket uk. 35 x 80', '', 'Set', 56000, 4),
(143, 7, 'Shelving + Bracket uk. 40 x 80', '', 'Set', 65000, 4),
(144, 7, 'Shelving + Bracket uk. 60 x 80', '', 'Set', 67000, 4),
(146, 7, 'Shelving dasar uk. 60 x 80', '', 'Buah', 54000, 4),
(147, 7, 'Penyangga Reklame uk. 160 x 40', '', 'Buah', 134000, 4),
(148, 7, 'Data stript', '', 'Pcs', 123000, 4),
(149, 7, 'Page Hook Panjang 15 cm', '', 'Buah', 18750, 2),
(150, 7, 'Page Hook Panjang 20 cm', '', 'Buah', 19750, 2),
(151, 7, 'Page Hook Panjang 35 cm', '', 'Buah', 20750, 2),
(152, 7, 'Rak Gudang', '', 'Unit', 344000, 4),
(153, 7, 'Stackable basket', '', 'Buah', 69000, 3),
(154, 7, 'Standing POP', '', 'Buah', 341000, 3),
(155, 7, 'Wing stage', '', 'Unit', 314000, 3);

-- --------------------------------------------------------

--
-- Table structure for table `inventaris`
--

CREATE TABLE `inventaris` (
  `id_inventaris` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `kode_inventaris` varchar(255) NOT NULL,
  `asal_toko` int(11) DEFAULT NULL,
  `tanggal_inventaris` date NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `status_opname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_barang`
--

INSERT INTO `kategori_barang` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Peralatan Komputer'),
(2, 'Perlengkapan Toko'),
(3, 'Peralatan Rumah Tangga'),
(4, 'Rack Single'),
(5, 'Rack Double'),
(6, 'Rack Khusus'),
(7, 'Backmesh Bingkai');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `level`) VALUES
(1, 'pegawaiasset', 'pegawaiasset', '9cf4a70b76f97f37862c615e8699d660', 1),
(2, 'TUGU MULYO', 'tugumulyo', '00de5d7a1305f0ab6b21df3562900a58', 4),
(3, 'pimpinan', 'pimpinan', '90973652b88fe07d05a4304f0a945de8', 3),
(4, 'pegawaiga', 'pegawaiga', 'aecc8d7ec189b5bdba0709695cd05318', 2),
(8, 'TUGU MULYO 2', 'tugumulyo2', 'bebbbf4fb07c162c2d72fee1e0ca09ac', 4),
(11, 'LUBUK SEBERUK', 'lubukseberuk', '501a7c6b15a13e61f41d402652cbe3c1', 4),
(12, 'KAYU AGUNG', 'kayuagung', '661be3acc60539b0cb91540fe886441e', 4),
(13, 'KENTEN LAUT', 'kentenlaut', '58fbdd32e0a2f7ab26b74bc75c313c8d', 4),
(15, 'GELUMBANG', 'gelumbang', '220ed2fa8ddf15a5a9095b29e3a7ceb8', 4),
(17, 'PASAR JAHE', 'pasarjahe', '09debf58b08e023e74a64e4941fb771d', 4),
(18, 'DEMANG LEBAR DAUN', 'demanglebardaun', '1bd0c60b9ae8b9703589ea8b9a37e0d4', 4),
(19, 'RADIAL', 'radial', 'c4e286770386de8872f1f4775bad0dc6', 4),
(20, 'SKIP UJUNG', 'skipujung', 'f4abc1a215fae3c84cc8e9ed06fd0f70', 4),
(32, 'KOLONEL ATMO', 'kolonelatmo', '337786a31074d9e186fc5fa8a7edef1d', 4),
(33, 'TANAH MAS', 'tanahmas', '3055f54c09ccc95868a6daa814932ada', 4),
(35, 'SUKABANGUN 2-1', 'sukabangun2-1', '99554023f864fa24adacdcf4c2d9dac2', 4),
(36, 'ABUSAMAH-1', 'abusamah-1', '3c5911a583bfb87f4e95993d635fe874', 4),
(37, 'ANGKATAN 66-1', 'angkatan66-1', '58aa58146b69b5d3c9d867c1c8c9e849', 4),
(38, 'ANWAR SASTRO', 'anwarsastro', '8b352cd1fa37531640e68e3c048d522b', 4),
(39, 'ALI GATMIR', 'aligatmir', '7429537bbada484cb823b63c7bd5ab3e', 4),
(40, 'ANGKATAN 66-2', 'angkatan66-2', '320990b663179d83403659405ac13840', 4),
(41, 'GANDA SUBRATA', 'gandasubrata', 'e815b52e9e28349db369654074ff0e43', 4),
(42, 'PARAMESWARA', 'parameswara', 'b8b07f97529393919ed937897a87df94', 4),
(43, 'JEND. A YANI PLAJU', 'jend.ayaniplaju', 'ca3bf1c6699fce33abc378f0993dc8f4', 4),
(44, 'BATANG HARI', 'batanghari', 'fc9a03625bb27903812fcd0d4c1c28cd', 4),
(45, 'SULAIMAN AMIN', 'sulaimanamin', '5fa31631b25916507360f099ec22e9cb', 4),
(46, 'PLG PRABUMULIH KM.32', 'plgprabumulihkm.32', 'f66fcbeac7f8028d25895808317af5ab', 4),
(47, 'DI PANJAITAN', 'dipanjaitan', 'de00a09a0202a5d5b6cbab81240a5e0c', 4),
(48, 'KOPRAL ANWAR', 'kopralanwar', '2c5f71f97ebfeb6a7d832c17c9350218', 4),
(49, 'KAPT ABDULLAH PLAJU', 'kaptabdullahplaju', '24ff2369dcd778332eb651d5dfa00d75', 4),
(50, 'AHM DAHLAN TL SEMUT', 'ahmdahlantlsemut', '8093e3c4e35474a14dfb58ac52abee29', 4),
(51, 'DR M ISA', 'drmisa', '8093e3c4e35474a14dfb58ac52abee29', 4),
(52, 'KIRONGGO WIROSANTIKO', 'kironggowirosantiko', '80ac1f0a8bf5c5869b7697af09f3b2ac', 4),
(53, 'SYAKYAKIRTI', 'syakyakirti', 'e89a4f0dd533463b0c2c5d903a11123b', 4),
(54, 'A DAHLAN TL KELAPA', 'adahlanrtlkelapa', 'c666be79376307cdd236462864aa795b', 4),
(55, 'P SIDO ING LAUTAN', 'psidoinglautan', '61b38afcb74b8f802775ca7268fdff1f', 4),
(58, 'LETNAN MUROD 1', 'letnanmurod1', 'd1755dd7e1c55d4f8ef9febb367632fb', 4),
(59, 'SUKABANGUN2-2', 'sukabangun2-2', '4b557080f52241581a5f44209d762eeb', 4),
(60, 'SAPTA MARGA 1', 'saptamarga1', '4b557080f52241581a5f44209d762eeb', 4),
(61, 'SAPTA MARGA 2', 'saptamarga2', '9510013c8daf95d8df112ca3ad1deefd', 4),
(62, 'RA ABUSAMAH2', 'raabusamah2', '426cb2368d22d55614a8e4c24c4da962', 4),
(63, 'RPN-1', 'rpn-1', 'b143d07e4ea9c924346e0c8dfbf0d3e4', 4),
(65, 'JEND SUDIRMAN 2', 'jendsudirman2', '60ed9982a2d9beb826804996ce196811', 4),
(66, 'PERINDUSTRIAN 1', 'perindustrian1', '33a81e4024a1fb2ac13d4c541f39bc94', 4),
(67, 'PHDM2', 'phdm2', '33a81e4024a1fb2ac13d4c541f39bc94', 4),
(68, 'URIP SUMOHARJO', 'uripsumoharjo', 'b875dc0213dfea4845920d2402293624', 4),
(70, 'WAHID HASYIM', 'wahidhasyim', '8d5e6ec444047944a114e051a4eef77d', 4),
(71, 'HASAN KASIM', 'hasankasyim', '5cfb3faf16f1677a736721a775385862', 4),
(72, 'PERUM TL KELAPA', 'perumtlkelapa', 'e9820bd0556ae3a6f212db9a3e7cc4d1', 4),
(73, 'RE MARTADINATA', 'remartadinata', '8c5912c57b397aec11a494b3d970cfa0', 4),
(74, 'BAMBANG UTOYO 2', 'bambangutoyo', 'c06aa763968fe24f2e3f81fc978038b5', 4),
(75, 'KH M ASYIK', 'khmasyik', '43ed06dd560b55b5d602a648243f62d2', 4),
(76, 'SERSAN JUPRI', 'sersanjupri', '51265620644feac828358c6e369265ad', 4),
(77, 'RUKO EMIRANCE', 'rukoemirance', 'cbd61e17e0f25996964ea9f5909f030d', 4),
(85, 'MERDEKA TL SEMUT', 'merdekatlsemut', 'd6ddd4fa3a028683958b76fc5ed84321', 4),
(86, 'JL KAPTEN A RIVAI', 'jlkaptenarivai', '7c9106eb88c26064a755fceb07fb5b1b', 4),
(87, 'JL RATU SIANUM', 'jlratusianum', 'be81f9446cde8ab04b914bca365d1062', 4),
(88, 'JL KAPTEN CEK SYEH', 'jlkaptenceksyeh', '294e2a319f97ac87dd18af1b08e1c943', 4),
(89, 'KOL H BURLIAN KM9', 'kolhburliankm9', '4824bc8ce30d129e22c4cdd563f0c2a5', 4),
(90, 'PANGERAN SIDOING 2', 'pangeransidoing2', 'b044a3de41731e89cb7e236d37c363e4', 4),
(91, 'KIMAROGAN', 'kimarogan', '60e225dd68387add08e8dd61c81226e9', 4),
(92, 'SULTAN SYAHRIR', 'sultansyahrir', '33fc8841185ccd230e1ed4d268cff238', 4),
(93, 'PALEMBANG BETUNG', 'palembangbetung', '3e18e5d2bbfd4376c49cd051673c12ca', 4),
(94, 'SUKARDJO 7 ULU', 'sukardjo7ulu', '43e0859b900b4e23e4b0456c48e598db', 4),
(95, 'SOSIAL-GANDUS', 'sosial-gandus', '76941d50946df8f769216e7df74458c4', 4),
(96, 'KEDATON', 'kedaton', 'a94327771ca777bac130c710babcc4b9', 4),
(97, 'PNGR SIDOING KENYAN', 'pngrsidoingkenyan', 'ca447aff5bf6ab31e79b8b6934fb449c', 4),
(98, 'ANGKATAN 45', 'angkatan45', 'f9b994f94ac518c151ee8d505e77081d', 4),
(99, 'LETNAN MUROD 2', 'letnanmurod2', '5dcc4bd9ac5f559eb4a4a06e278733d3', 4),
(100, 'HBR MOTIK', 'hbrmotik', '7f3ea87e5de1b525ac972273c04c8456', 4),
(102, 'SEGARAN', 'segaran', '2e001e2f483b759588103672e0346950', 4),
(103, 'KOPKAR PT BUKIT ASAM', 'kopkarptbukitasam', '30df1e8d44596b398a4a4375c77b289c', 4),
(104, 'INSPEKTUR MARZUKI', 'inspekturmarzuki', '4f18026ba177559da77a3c26e8d5f4f1', 4),
(105, 'INDRALAYA KM.35', 'indralayakm.35', 'd832f0ca39f9e878d11d76ed3c21d930', 4),
(106, 'INDRALAYA KM. 36', 'indralayakm.36', 'dfc40a3af1d8de98c1ddae9af61aea86', 4),
(107, 'ROBANI KADIR', 'robanikadir', '4d0cc45dfd815d9548304c8a13ee9d9d', 4),
(108, 'SOSIAL', 'sosial', 'a035d37a6fdee1b452851d5dcffddc38', 4),
(109, 'TRIKORA', 'trikora', 'ff70f5ba616b9f9e29904ec55a2d2b0b', 4),
(110, 'TULUNG SELAPAN ILIR ', 'tulungselapanilir', 'b0dafd11aa2813880e7626463b7b82bf', 4),
(111, 'TANJUNG BATU', 'tanjungbatu', '572d048533887c2aa062b062e42c8710', 4),
(112, 'M ISA 2', 'misa2', 'c8d0a8c7c34eea34b607d6cf519a394f', 4),
(113, 'SUMPAH PEMUDA', 'sumpahpemuda', 'ea3b767d933b3f54f44709bd2bfbc6e0', 4),
(114, 'PERINTIS KEMERDEKAAN', 'perintiskemerdekaan', 'c7324edb15ca4f5ae6d3bdf4af0a7d98', 4),
(115, 'PERINDUSTRIAN 2', 'perindustrian2', '7416f25db77c73ac2cc50586d9f65452', 4),
(116, 'SIMPANG MERANJAT', 'simpangmeranjat', 'c4bff76779808155972d03c833aa1224', 4),
(117, 'KH. AZHARI 12 ULU', 'kh.azhari12ulu', 'b9cd61917bf6f4340f952e5a83468218', 4),
(118, 'INDRALAYA KM.33', 'indralayakm.33', '5cc4a0a02b2c643495d754c0af153317', 4),
(120, 'INDRALAYA KM.28', 'indralayakm.28', '686afa67e76768a4df3793d64824a86c', 4),
(121, 'MAYOR SANTOSO', 'mayorsantoso', 'd389aa5ba756a62934bfaaa738d6b26c', 4),
(122, 'LETDA A ROZAK', 'letdaarozak', 'eddea26e35e2fde4c56fc1a0027827a0', 4),
(124, 'RADIAL 2', 'radial2', '2d75f1571ff0e9a495bd5401972151c1', 4),
(125, 'JENSUD 2-PRABUMULIH', 'jensud2-prabumulih', '7538347dca2e09b8c5d80a9d140f8c87', 4),
(126, 'JENSUD-PRABUMULIH', 'jensud-prabumulih', '053cc8c312cbed4329a142e6865970f2', 4),
(127, 'SRINANTI', 'srinanti', 'aca36238645749fe4bddd286f36b1c3a', 4),
(128, 'MERDEKA BANGUN JAYA', 'mrdekabangunjaya', 'ed3a05d48789410cc5bf46f031afe889', 4),
(129, 'RE. MARTHADINATA2', 're.marthadinata2', 'ab8613119c245f550d3af0072868357c', 4),
(130, 'TUGU MULYO 3', 'tugumulyo3', '61007b62180fee61bed6ebb4e5cabac3', 4),
(131, 'HASAN KASIM 2', 'hasankasim2', '9309246e416d3e9e4f788406b48b8bb6', 4),
(132, 'TANJUNG RAJA', 'tanjungraja', '572d048533887c2aa062b062e42c8710', 4),
(133, 'BASUKI RAHMAT-PRABU', 'basukirahmat-prabu', 'c708affe5644909f5906693e8f7f08ef', 4),
(134, 'SRIJAYA NEGARA', 'srijayanegara', '1f519b98a4b62a98b1ffb642f7b4d2bb', 4),
(135, 'INSPEKTUR MARZUKI 2', 'inspekturmarzuki2', '23d5fb11708de3f8c0bcec814002461f', 4),
(136, 'JENSUD 3-PRABUMULIH', 'jensud3-prabumulih', 'd36a6726f92a9278948e71c73fe3c179', 4),
(137, 'BASUKI RAHMAT-PLG', 'basukirahmat-plg', 'bd8b93fdec4cfa6087842254e43caccc', 4),
(138, 'MANGKUNEGARA', 'mangkunegara', '5e898a468ea92fab5dfea43e51641d81', 4),
(139, 'KEBUN BUNGA', 'kebunbunga', 'fd88625aaa004bc9a76446ab332d5685', 4),
(140, 'JENSUD 3-PLG', 'jensud-3plg', 'fed4599105d1994ab7c99684283200bd', 4),
(141, 'PENDOPO', 'pendopo', '0a45b7a7dfc7611d86fe612202f2b3b1', 4),
(142, 'LEMBAK 2', 'lembak2', 'bd3c04f6c343138c39fc2b4da2edda5b', 4),
(143, 'SWADAYA', 'swadaya', '2f6e7b162e22d7365e89cd7571caac91', 4),
(144, 'A. YANI-PRABUMULIH', 'a.yani-prabumulih', '7a9ad49330418ad425914d9d09e0ea13', 4),
(145, 'KOL. BURLIAN KM.6', 'kol.burliankm.6', 'a799a1a1131e98b6a3f8a178773b2b73', 4),
(146, 'SIMPANG KIJANG', 'simpangkijang', '28a6404bc7fec11eb658eda2a0e305c1', 4),
(147, 'SKPD MESUJI', 'skpdmesuji', '1c33e1e9b04cdcd738ef95eecf747019', 4),
(149, 'ANWAR SASTRO 2', 'anwarsastro2', '8a46bfd511a69e698e461d37c73f6bdd', 4),
(155, 'BUKIT SIGUNTANG', 'bukitsiguntang', 'e42008bf46af15abdf46da0e76c88eb5', 4),
(157, 'JENSUD IV-PALEMBANG', 'jensudiv-palembang', '17de78df6b4fc2b431edde2b80f7d5db', 4),
(158, 'SP. PADANG', 'sp.padang', '107c9a8c2ef8da2675c3bc26f8ae90fa', 4),
(159, 'MAYJEN R RYACUDU', 'mayjenrryacudu', 'b04a88132989dd0949864fd12b95eb4f', 4),
(160, 'DI. PANJAITAN 2', 'di.panjaitan2', 'a61c906efe1fb569180796ffa59b2b6c', 4),
(169, 'SULTAN MANSYUR', 'sultanmansyur', '30135bac5ec9a7e45648658c714a77c9', 4),
(171, 'GELUMBANG 2', 'gelumbang2', 'c19e42bd9bdabe36e9a9b4349e7696f3', 4),
(173, 'A. YANI 3-PLG', 'a.yani3-plg', 'd2c36ad62264dfe6d68ad1fec9b8c5dd', 4),
(174, 'PAYARAMAN', 'payaraman', '9c7c5e1532ddd5f9ca4aec5f9c9fb3a0', 4),
(175, 'A. YANI 2-PALEMBANG', 'a.yani2-palembang', 'dd0ab5a6a172d003bd9f9a26da49f175', 4),
(184, 'SUNGAI PINANG', 'sungaipinang', '0662140339a83867ba6e406dc20c88af', 4),
(185, 'LETTU KARIM KADIR', 'lettukarimkadir', 'ab9cfa7d3868fdd373f118c3f5932df1', 4),
(187, 'SKIP PANGKAL', 'skippangkal', '87c31a1e99e8411f59e6c65256314a2f', 4),
(188, 'H.R. NAJAMUDDIN', 'h.r.najamuddin', '61944828817871abe9c6d846b5f45d96', 4),
(192, 'OPI RAYA2', 'opiraya2', '89cffe58e59c351edbb29f42ea3a3704', 4),
(193, 'JENSUD V-PRABU', 'jensudv-prabu', '0a2e28557262de7b8d29d5b04dd0fc24', 4),
(201, 'MUSI RAYA BARAT', 'musirayabarat', '8f6b1ed5254ee544de45fcaecf432b00', 4),
(202, 'KIMAROGAN 2', 'kimarogan2', 'f1091a6ecad1e1cb2c1e35e1ad287989', 4),
(203, 'R. SUKAMTO 1', 'r.sukamto1', '17a088bf9e7e11224ba89b538343e522', 4),
(204, 'RK ALANG-ALANG LEBAR', 'rkalang-alanglebar', '667153a338f071533466c86fa25f9fa1', 4),
(205, 'GELUMBANG 3', 'gelumbang3', 'ded7843929bbfaf987a56d39ec14a656', 4),
(206, 'M. YUSUF SINGADEKANE', 'm.yusufsingadekane', '76d9201bec513187a9eba17b827e437c', 4),
(207, 'KARANG ENDAH', 'karangendah', '2abe3269786886bb9077b60c492d8201', 4),
(208, 'MUCHTAR SALEH', 'muchtarsaleh', '7ead5aed57a5379c073819f4d97e9c8c', 4),
(210, 'TJ. SIAPI-API', 'tj.siapi-api', '8e562dba7ae7fa852c31479c4e661056', 4),
(211, 'KEBUN BUNGA 2', 'kebunbunga2', '49826fb6f3ad24bf916a9026ed9be186', 4),
(215, 'R. HAJI ABDUL ROZAK', 'r.hajiabdulrozak', '18c39c2f5cf7c7fb5050b7df294e5f34', 4),
(216, 'MATA MERAH', 'matamerah', 'bbab1f015d0f25694459df6ad9674f14', 4),
(218, 'KOMPLEK PUSRI', 'komplekpusri', '413704240e057e318022c916897eea5c', 4),
(219, 'PAMPANGAN 2', 'pampangan2', '6be29b7fee581dc55e4d53095661ef26', 4),
(220, 'TANJUNG LUBUK', 'tanjunglubuk', '9b2bb1257bed062c1c13ed11a8e31b04', 4),
(221, 'BASUKI RAHMAT 2-PLG', 'basukirahmat2-plg', 'cecd547f72849c8809e7a87dce99e6d5', 4),
(222, 'GUBERNUR H.BASTARI', 'gubernurh.bastari', 'p222', 4),
(223, 'SEMATANG BORANG', 'sematangborang', '7520cf28c196eb5721f6437104cc5771', 4),
(224, 'MAYOR ZEN', 'mayorzen', '13fe9d84310e77f13a6d184dbf1232f3', 4),
(225, 'LETKOL ISKANDAR', 'letkoliskandar', 'e240a5050767d56894a654a27dad2931', 4),
(226, 'MUSI RAYA', 'musiraya', '5d63cd886afbe2496c3c122147d593db', 4),
(231, 'CANDI WELANG', 'candiwelang', '6ad2e21cbb19de1dc88e69480bc5a6ff', 4),
(232, 'PERINDUSTRIAN 1-2', 'perindustrian1-2', 'adfde5c0a407b631de8e77e20986cdbe', 4),
(233, 'SUKABANGUN 2-4', 'sukabangun2-4', '36ed3de600c17a392a172958f813113a', 4),
(234, 'PAMPANGAN', 'pampangan', 'e740ed3c23d8fed03681328ad58f14aa', 4),
(236, 'KEBAN AGUNG', 'kebanagung', 'c0febac61149bcb76a855f38c8b99e6f', 4),
(237, 'SPBU DEMANG LEBAR DAUN', 'spbudemanglebardaun', '9c82da8155d82b874746b28e0d3c943a', 4),
(239, 'KS.TUBUN', 'ks.tubun', '14b8add2c2ef5815f65f684386fd2d41', 4),
(240, 'INDRALAYA KM.32-2', 'indralayakm.32-2', 'd7f644bb61aa4594f9fc8dba7d9f3306', 4),
(241, 'SRI KEMBANG', 'srikembang', '02072fae3101a7d925f2b87e9eaba395', 4),
(242, 'PELITA', 'pelita', 'cef6f402bdf80ba666d88ac42c72d4be', 4),
(243, 'TEMBOK BARU', 'tembokbaru', 'b2aa5b6d0731f8439e6cda585b383962', 4),
(251, 'PERUM AIR PAKU', 'perumairpaku', 'e66f74d82b62ab4ad7f44406a0d997c6', 4),
(252, 'TALANG KELAPA 2', 'talangkelapa2', '821ddb3dbba4647928b69974383fa8c9', 4),
(253, 'JENSUD V-PALEMBANG', 'jensudv-palembang', 'bb95314c5faee265b3891004197354d3', 4),
(254, 'SEKONJING', 'sekonjing', '2dd1b53a52db2d0f392a410d5aade9d6', 4),
(255, 'JENSUD IV-PRABUMULIH', 'jensudiv-prabumulih', 'ae04d2d37f881bc8bc57044ca69a359d', 4),
(256, 'JL. NIAS', 'jl.nias', '63a963a1d2d12fb358f2f457fe705e3f', 4),
(257, 'CINTA MANIS', 'cintamanis', 'e4cf79144e90152b641552c4ba4459cf', 4),
(258, 'KOTA RAYA', 'kotaraya', 'b363a968fec656acbc8861fb1a7d3fe0', 4),
(259, 'LET. AMIR HAMZAH-LAHAT', 'let.amirhamzah-lahat', 'a8c1b2f44466cad74ec42e6e6c70b8eb', 4),
(260, 'MAYOR RUSLAN-LAHAT', 'mayorruslan-lahat', 'ce0495ed72b89cb47a1beaf7f77586f7', 4),
(261, 'LETNAN ALAMSYAH-LAHAT', 'letnanalamsyah-lahat', '4ab75cd86f7c3e2ab941434ce88295af', 4),
(262, 'RAYA LUBAY', 'rayalubay', '86062440f82c5e823f656471ac26a437', 4),
(265, 'DI PANJAITAN 3', 'dipanjaitan3', 'efaa62c0cadda99544a49e9a56c1bf86', 4),
(266, 'PIPA REJA 2', 'pipareja2', '1b5d082ac606c2cd915979a11cfeba9e', 4),
(270, 'IRIGASI', 'irigasi', '70ba9db5f45e9d7ad2f6ab7ce901724a', 4),
(272, 'KEMANG INDAH', 'kemangindah', 'd86ef31da028f4a2eb854e16f535d9a7', 4),
(273, 'RAMAYANA', 'ramayana', '159f5e982713fd06a994c39836da923c', 4),
(274, 'TALANG-TALING(MRENEM)', 'talang-taling(mrnem)', 'p274', 4),
(275, 'OPI RAYA 3', 'opiraya3', '9cefcae437e4c448016671b33c2f6a34', 4),
(277, 'KERTA MUKTI', 'kertamukti', 'b4f3941a842585c16e68e30322aefa0a', 4),
(278, 'TALANG PANGERAN-OKI', 'talangpangeran-oki', '05cff4e4fbbfa2b01647ab058e37a80b', 4),
(279, 'DARNA JAMBI-OKI', 'darnajambi-oki', 'b8df611ebfa8349590ca61e017dc0c79', 4),
(280, 'SMB 3-MUARAENIM', 'smb3-muaraenim', 'd8e0a74573c10c0c502b368780eec20c', 4),
(281, 'RE. MARTHADINTA 2-LAHAT', 're.marthadinta2-lahat', '6b096cb0787b999d3f1bf7b20b55c7e4', 4),
(282, 'JENSUD VI-PALEMBANG', 'jensudvi-palembang', '64185fb9860f8e587e4717de17527e34', 4),
(283, 'KEMANG MANIS', 'kemangmanis', 'ac720188d1bd8fefa67dcf6ae79a595b', 4),
(284, 'MUARA KUANG', 'muarakuang', '54fc2edcb5d9a46ec6dcf207638b1516', 4),
(285, 'PUTRI RAMBUT SELAKO', 'putrirambutselako', 'b244a86717feb7e390511da1aa10096c', 4),
(286, 'LUBUK SIBERUK 2', 'lubuksiberuk2', '305e84286b419866da1f271f3aaef328', 4),
(288, 'SAKO SIARAN', 'sakosiaran', 'cf1095a7669817c3af4f165a767c775f', 4),
(296, 'TANJUNG RAJA 2', 'tanjungraja2', '5b7aaf3448a3dfa51db8550faef41501', 4),
(297, 'BUMI AGUNG', 'bumiagung', '5d9257feb6afbf4e89929bf66565c421', 4),
(298, 'PERTAHANAN', 'pertahanan', 'cfd76877e79d8e8cc6a76b596fd344e8', 4),
(299, 'SIMPANG IBA', 'simpangiba', 'b19416f0ab9ef21747cc123cf0d1503f', 4),
(303, 'ARJUNA RAYA', 'arjunaraya', '2e42a0821e4b9728eef0413d1f8109b6', 4),
(305, 'CUT NYAK DIEN', 'cutnyakdien', 'a22c2800ed9e6667245196d352b77551', 4),
(308, 'JAKSA AGUNG', 'jaksaagung', 'a22c2800ed9e6667245196d352b77551', 4),
(310, 'SERIGUNA-OKI', 'seriguna-oki', 'bf1657a16bc828f938d55cc8cf25abb3', 4),
(315, 'NAZAMUDDIN', 'nazamuddin', '571c575778364d9a7c723e1f929e15cf', 4),
(317, 'A. YANI-MUARAENIM', 'a.yani-muaraenim', 'f6838f9ef35083afea1df276146191c8', 4),
(318, 'HARUN SOHAR-PAGARALAM', 'harunsohar-pagaralam', '24959beca6dda6a14f02b2b60b7eb27d', 4),
(320, 'SEKIP JAYA', 'sekipjaya', '152992cd1e250d281552f92ff2a98c33', 4),
(321, 'KOL.H.BURLIAN KM.5.5', 'kol.h.burlianKM.5.5', 'c5507a68613129da05037e9ffc10d6c7', 4),
(322, 'JENSUD 2-MUARAENIM', 'jensud2-muaraenim', '11b9842e0a271ff252c1903e7132cd68', 4),
(324, 'KOL.H.BURLIN KM.7.5', 'kol.h.burliankm7.5', '518fd46dddb3f97e176198f08ec766d6', 4),
(325, 'KOL. H. BURLIAN KM.8', 'kol.h.burliankm.8', 'dd6598823f4fbc8507024ee0ea0c5f93', 4),
(327, 'SUNGAI LILIN', 'sungaililin', '4def1eae198838e2f5d696a1530cde2e', 4),
(332, 'ADE IRMA SURYANI', 'adeirmansuryani', '38797744cb921a494c812a900691fdba', 4),
(333, 'NENDAGUNG', 'nendagung', 'b591f6e3077fe53573572ade64ef83eb', 4),
(380, 'KOL.H.BURLIAN-LAHAT', 'kol.h.burlian-lahat', 'e7fce89aa332ae204555c71151c68f62', 4),
(381, 'MAJAPAHIT-LUBUK LINGGAU', 'majapahit-lubuklinggau', '2654792832aea3589330248a4dd31b32', 4),
(382, 'BATU URIP-LUBUKLINGGAU', 'batuurip-lubuklinggau', 'e184759c4cc29944b29f57fafff6337c', 4),
(383, 'TALANG JAMBE', 'talangjambe', '78d6f9eaad7822a2d85e72d769db4bf7', 4),
(385, 'MARGA RAHAYU', 'margarahayu', '213ef1bdb39018b31ec2dc6ed758410f', 4),
(386, 'INDRALAYA TIMBANGAN', 'indralaya-timbangan', 'd5b070899e24c3ddf91278042cfbf167', 4),
(387, 'TABA JEMEKEH1', 'tabajemekeh1', 'df94e7aec7a03404b4200b67b8282936', 4),
(388, 'SIMPANG PERIUK', 'simpangperiuk', 'bfe5d1a2da499ae943559666be7814a9', 4),
(389, 'MARGA RAHAYU 2', 'margarahayu2', '7cb28b3bb8e0726e3f94dd1a88e92aa2', 4),
(390, 'RIDING', 'riding', 'aee88679476783d655edd2e842aceb1c', 4),
(391, 'TUGU JAYA', 'tugujaya', 'bf8da4079a9af0081701b60a79ea6eac', 4),
(392, 'TANAH PERIUK', 'tanahperiuk', '71377d7ac338f37d7040e2189bd71020', 4),
(393, 'MM PEMKOT GANDUS', 'mmpemkotgandus', '27ffc89eaa58e04d8e493ea4e73650d1', 4),
(394, 'TALANG BULANG', 'talangbulang', '49bd18c52f334afc3faeacc8705ad6e8', 4),
(395, 'TABA KOJI', 'tabakoji', '947431765efd58c3ceaac0b9a5414fd1', 4),
(396, 'MAYOR SALIM BATUBARA', 'mayorsalimbatubara', '4b8e4eeaf7ee8e76cd0cdc2dd6bb840b', 4),
(397, 'TANJUNG SIAPI-API 3', 'tanjungsiapi-api3', 'a4d0af95e9579d777843da3d0d10fe0a', 4),
(398, 'VETERAN 2', 'veteran2', '03613b511ba4273138f42d9c7cb00f1b', 4),
(399, 'SMBII-PALEMBANG', 'smbii-palembang', '1fe380f5c97ab51c609685bd12cd195d', 4),
(401, 'A. YANI-LUBUKLINGGAU', 'a.yani-lubuklinggau', 'ad04b91e035337b5ea6118e6a8450232', 4),
(402, 'LEBUNG BATANG', 'lebungbatang', 'af20f423a45111be3d78fb8df26fae15', 4),
(403, 'PERINTIS KEMERDEKAAN 2', 'perintiskemerdekaan2', '7df332418ff7dfba84f9bec9ae014416', 4),
(404, 'TUGU MULYO IV', 'tugumulyoiv', 'fb5f12206238c77ffddb2aaab724e4a6', 4),
(405, 'MUARA BURNAI', 'muaraburnai', '879bbeac9927d3ba12a12a9f5fd22d3f', 4),
(407, 'WAHID HASYIM II', 'wahidhasyimii', '3c7cde6141e422538a26c5b779da3b96', 4),
(408, 'VETERAN 1', 'veteran1', '4f39cd0f976c1f712d9c2abe1b4706d9', 4),
(409, 'HASAN KASIM 3', 'hasankasim3', 'df316e976a445851b125e14b51d142eb', 4),
(411, 'MANGKUNEGARA 2', 'mangkunegara2', 'e088da492d765f482e9add3eaca52c5c', 4),
(412, 'TERMINAL ALANG2 LEBAR', 'terminalalang2lebar', '8f652c63cda416400b0c23025e336b20', 4),
(413, 'M. ISA 3', 'm.isa3', 'a4f44bc133e003ef675111b3c650a05a', 4),
(414, 'CITRA GRAND CITY', 'citragrandcity', 'e36516a68bb309cc02e372c67046b42e', 4),
(416, 'SUMBER HIDUP', 'sumberhidup', '02a5865df6eaa330674e7dea7390680f', 4),
(417, 'MUSI RAYA UTARA', 'musirayautara', '5b5f458f7b066146da0b2f90e8227b6b', 4),
(418, 'SEI RAMBANG', 'seirambang', 'ee5c1584017087025f99e0325b4a91a8', 4),
(419, 'LUNJUK JAYA', 'lunjukjaya', 'c999b5f5ad7c34d8b730c6d39c37e94c', 4),
(420, 'KAPTEN SANAP', 'kaptensanap', '5942b7aebcdce3299f17f7a795c9ec83', 4),
(422, 'A.YANI 4-PALEMBANG', 'a.yani4-palembang', '709960a7d2680c70d6ad17bbed0cd1c4', 4),
(423, 'KAPTEN ABDULLAH', 'kaptenabdullah', '2ecbccc32738947391aec1922a7be1d8', 4),
(424, 'MAYOR ZEN 2', 'mayorzen2', 'cb2103da9ff91378ff20a80be5aed47d', 4),
(425, 'INDRALAYA RAYA', 'indralayaraya', '4e5791534b932faf2a4e4a2b0a36c42e', 4),
(426, 'MAYOR SALIM BATUBR2', 'mayorsalimbatubr2', '0932be606a313e9b426c61b9197c0591', 4),
(427, 'KIMAROGAN 3', 'kimarogan3', 'e1f04e97de7a54f5e5ecbc80915b28b5', 4),
(428, 'SUNGAI LILIN 2', 'sungaililin2', 'd30a5b90b84adfec6147fc04700a0d8b', 4),
(431, 'KH.AZHARI 2', 'kh.azhari2', '23add0e901ffdd244cac5727ca4dfc91', 4),
(432, 'TALANG UBI SELATAN', 'talangubiselatan', '6d322c5666666632a5899a8a20a31021', 4),
(433, 'HANDAYANI MULIA-PALI', 'handayanimulia-pali', 'ed98bae3ed73ee83e2fa37f7d7ba229d', 4),
(434, 'PELITA PALI', 'pelitapali', '78e5b0ec303dbec6f2907b8c6e1c0f12', 4),
(435, 'MERDEKA PENDOPO-PALI', 'merdekapendopo-pali', '6763dcdc2773bf8fe88edc9eb3e48637', 4),
(437, 'JENSUD RAYA-MUARAENIM', 'jensudraya-muaraenim', '60e5c64581a46b888513810349f7004f', 4),
(438, 'KAYU ARA-MUBA', 'kayuara-muba', 'f3d496c1bc8819ddcbd61f86f47c400d', 4),
(447, 'PANCA USAHA', 'pancausaha', '996b2cc72b970e5bf2649b98308961ef', 4),
(448, 'LEBUNG GAJAH', 'lebunggajah', 'd2b89a82174e7af56b5ce36164280197', 4),
(450, 'SRIJAYA NEGARA 2', 'srijayanegara2', '0d046f08127096ae6819623c1fc798ab', 4),
(452, 'SUKOMORO', 'sukomoro', '33f4eaeb7b79d5bc7afd4f3c475376a2', 4),
(454, 'RAYA ALANG-ALANG LEBAR', 'rayaalang-alanglebar', 'b91621c18a4cebcec8f565ee8448d893', 4),
(455, 'JL. INDRA', 'jl.indra', '258448be9e5806656628486f72c289b0', 4),
(456, 'MERDEKA SEKAYU', 'merdekasekayu', '0cfaaefe88a4dda496bc110e402ca9d5', 4),
(457, 'DERMAGA POINT (BKB)', 'dermagapoint(bkb)', '5ca97332f4b781f5d4416acb1834f332', 4),
(458, 'WAHID UDIN-MUBA', 'wahidudin-muba', 'd199d5133c49b53c944733c8021c0df2', 4),
(459, 'PENGHIJAUAN-LAHAT', 'penghijauan-lahat', '5b0bbf0edbae78963c31c6cb7a74e6fa', 4),
(460, 'PRAJURIT NAZARUDDIN', 'prajuritnazaruddin', '86ba144962631b4ca3b43bfbb52dbec7', 4),
(461, 'RAYA PARAMESWARA', 'rayaparameswara', '25c7169da4008a02e0cf94e30016f268', 4),
(462, 'TANGGA TAKAT', 'tanggatakat', '3168df54576b8b47b7955f2c7e5ce3b6', 4),
(463, 'LINGGAU SELATAN', 'linggauselatan', '4a65cd3e5c9016a30d4b3db0282f9070', 4),
(465, 'PEMASYARAKATAN-PAKJO', 'pemasyarakatan-pakjo', 'dbda479a3ebfc082ae99eb706d854275', 4),
(466, 'RAYA WAHID HASYIM', 'rayawahidhasyim', '6279f015050e12efd2967c93978a23a6', 4),
(468, 'SEKIP', 'sekip', '230288526fb619c2f69500bd59e35192', 4),
(469, 'PLAJU ILIR', 'plajuilir', '94f9310fe30ed86300695bd2674e9067', 4),
(470, 'KOMPLEK PS', 'komplekps', '02360f5d39ee422d44fce8d3a994f951', 4),
(472, 'ANWAR ARSYAD 2', 'anwararsyad2', 'e3c4be731e1f4b5f50b091668b9ff3df', 4),
(473, 'SIMPANG PEMAYORAN', 'simpangpemayoran', '181f98ce4c4cc6a3aee668b89c81d9e3', 4),
(474, 'RAWAJAYA', 'rawajaya', 'c3da79cc37e95a2e9b17a5aa9e4fc1fa', 4),
(475, 'PATAL PUSRI', 'patalpusri', 'e77b62967e5dc00476bb5be66d5f6a6b', 4),
(478, 'SUNGAI LILIN 3', 'sungaililin3', 'd286153d11e618f69b0eca3803d36405', 4),
(479, 'RAYA PANJAITAN', 'rayapanjaitan', '5c69b9be133f01882e85631f17bfe191', 4),
(481, 'MERDEKA-CURUP', 'merdeka-curup', '230d29601e9befd61caed34fa0c9bc2d', 4),
(482, 'JENSUD-CURUP', 'jensud-curup', '7aedd5db333fcf9396f3e1259fd68ab4', 4),
(483, 'SUPRAPTO-CURUP', 'suprapto-curup', 'c381c5bc4dd5fc758fe6baef00e0a4e8', 4),
(484, 'KEPALA SIRING-CURUP', 'kepala-siring-curup', '5d71b62188e36ee09588eb147015967b', 4),
(485, 'BETUNG', 'betung', 'c519bffa2218a9a404be78a351d96e2f', 4),
(486, 'PENINGGALAN', 'peninggalan', 'f33612155f788f1fded94bf0ef8477cf', 4),
(487, 'SIMPANG SEKOJO', 'simpangsekojo', '2ec95e0d08a3e4c4e3614a224e96c9cb', 4),
(489, 'BUKIT BARU', 'bukitbaru', '7d15d0222cd7365a007923a896f35201', 4),
(490, 'ANGKATAN 45', 'angkatan45', '8c2a9a5892eaa988b6d469939c1a4398', 4),
(491, 'LIMA ILIR', 'limailir', 'afe645292d29c2059a0e62f2136e9b00', 4),
(492, 'SOAK SIMPUR', 'soaksimpur', '4f57f436ff4287d8805a101852ea2abb', 4),
(493, 'TELUK GELAM', 'telukgelam', 'b140b7fd9ae14d259a5b57b9c0347cc8', 4),
(494, 'KAPTEN ABDULLAH 4', 'kaptenabdullah4', '4e57e52cf5762c12e90abb139c1fafd2', 4),
(495, 'SAKO BARU', 'sakobaru', '4198185f5c2e6a44b387df97d84877dd', 4),
(496, 'SAKO PERUMNAS', 'sakoperumnas', '8af7b50074a14cd289c12afeb2e2934d', 4),
(497, 'TALANG KERAMAT', 'talangkeramat', '98e5d707cda6a075ff2f4c7fabda61ff', 4),
(498, 'BUNGARAN', 'bungaran', '83b0dd2eea2ff7c103dc09fd59168109', 4),
(499, 'PKKMART-MUBA', 'pkkmart-muba', '292fe33f32839cbbaa053b62d618c8fe', 4),
(500, 'BUKIT LAMA', 'bukitlama', 'cd7f3a95b5cf054af30a9516a461d3c5', 4),
(501, 'SP 6 LEMPUING', 'sp6lempuing', '828d2d77f56ac4da1fe833fde63b85c8', 4),
(502, 'CELENTANG', 'celentang', 'cb1c424dab5444019166a6272d9eb7ee', 4),
(503, 'ABIHASAN', 'abihasan', '4d743445bf2d23efea326b15edc2436e', 4),
(504, 'SUKAMAJU', 'sukamaju', 'aeedf292ce9e5790db51388bfd93f51f', 4),
(505, 'MANDI API', 'mandiapi', '611ea34f53641a429b890e1fa2234495', 4),
(506, 'HOTEL 929', 'hotel929', 'a79d34276c2eb9d8cf0eb8e871c75eed', 4),
(507, 'GARUDA', 'garuda', 'b9873f72339843ffae89a1cc625cd219', 4),
(508, 'INDRALAYA INDUK', 'indralayainduk', '8586ce0dde5d433f8b84813cfb78424b', 4),
(510, 'POLIGON', 'poligon', '1fedc17ea731def830cf4862c54eaa61', 4),
(511, 'TUGU INDRALAYA', 'tuguindralaya', '44494ac80912fe36b0ffd580d3570689', 4),
(512, 'MH.THAMRIN-CURUP', 'mh.thamrin-curup', '09b7600a6bc65ca2a42e70c549c85963', 4),
(513, 'CURUP KOTA', 'curupkota', '1b56df60a003df8f68d7c27a8ef43677', 4),
(514, 'HBR MOTIK 2', 'hbrmotik2', 'e7077220d410a426b987a5cd9436dd85', 4),
(515, 'SPBU KM. 6', 'spbukm.6', '2b1af18eaf37cf341032c491df27a6d8', 4),
(517, 'SPBU SEKAYU', 'spbusekayu', '97dbdf02261d86ac330753e0971dde08', 4),
(518, 'TALANG PUTRI', 'talangputri', '4baaa9fa7ac0435059f7e984f496a7a4', 4),
(520, 'SAKATIGA', 'sakatiga', '58d03a48195db3cdf666dc8230541159', 4),
(521, 'AIR PUTIH-CURUP', 'airputih-curup', '569056c1355ca983f0a9a1b7794af5a1', 4),
(522, 'TANAH ABANG UTARA', 'tanahabangutara', 'e3e4c14c7840ffc350e8922c3aa22a06', 4),
(523, 'TANAH ABANG JAYA', 'tanahabangjaya', 'ace4900994340eb5b95aa3da6bea0904', 4),
(524, 'MUARA BELITI', 'muarabeliti', '79e8ad9c5f98299efa8e0b6b1981251c', 4),
(525, 'SPBU NCS-MUBA', 'spbuncs-muba', 'b07a7c33c8c164207c87be2b6f847722', 4),
(526, 'SPBU BABAT SUPAT', 'spbubabatsupat', '149aec08d9344ad0139dc88ef470f5c8', 4),
(527, 'SRIJAYA', 'srijaya', '837a9f4e58662cf98c0f4d68eed66058', 4),
(528, 'HOTEL CITRA', 'hotelcitra', 'ee5df5124757a63631da2daeb14133ab', 4),
(529, 'PLG-BETUNG KM. 13', 'plg-betungkm.13', '7e57955e8a1f917edc98a47a0af36a01', 4),
(530, 'RE. MARTHADINATA', 're.marthadinata', '7fda0eed12891252cc7a115c243d9a1d', 4),
(531, 'KAPUAS RAYA', 'kapuasraya', 'a90d5626ec2e5b4c14f22bb711aca2d3', 4),
(532, 'SYAHRI WAHAB', 'syahriwahab', 'c170a9e79332ee399c4b15251748a475', 4),
(533, 'MEGANG SAKTI', 'MEGANG SAKTI', 'fe210de329ac205906652673d5e98732', 4),
(534, 'TALANG UBI', 'talangubi', 'fbd20304dfadf13c00d8bd6ee378fdb5', 4),
(535, 'WR.SUPRATMAN', 'wr.supratman', 'c10b54f63337c2a392af1f525908caa7', 4),
(536, 'KAPUAS INDAH', 'kapuasindah', '6973a3eed6f5ce8672ee3c92710d36a4', 4),
(537, 'MUSIUM', 'musium', '3c93e680f17fc99b8d960eac81c2f811', 4),
(538, 'BABAT PENUKAL', 'babatpenukal', '6a101cbf73cd4298d9a4459096e4d1b0', 4),
(541, 'PAHLAWAN AMIR', 'pahlawanamir', '4320e2e0363ef324bcbc08a68239fa15', 4),
(542, 'FLAMBOYAN', 'flamboyan', 'd3acb77a8f2702b51e666ea961d9b02c', 4),
(543, 'S. PARMAN', 's.parman', 'a5ea733f77e03f578b2b78dafc9876a1', 4),
(544, 'SIMPANG SEMAMBANG', 'simpangsemambang', 'e21f245cd5ca5ced1406a4209f41d3bf', 4),
(546, 'RE. MARTHADINATA2', 're.marthadinata2', 'd8cb754414dc5319d58585545f9650d9', 4),
(547, 'GRIYA DUTA MAS', 'griyadutamas', 'a142055caa4958a822e66e08ddb431c2', 4),
(548, 'KOP. BINA PRAJA', 'kop.binapraja', '170fb1001bfa367a73bde62f677110bf', 4),
(549, 'ADAM MALIK', 'adammalik', 'c009183362da838caef320ad1e7b40bb', 4),
(550, 'KALIMANTAN', 'kalimantan', 'ceaa45d04d49950045c0a2686f529fd1', 4),
(551, 'SUNGAI KEDUKAN', 'sungaikedukan', '743210987b9fbaf13e81c8d063e4346d', 4),
(552, 'MT.HARYONO', 'mt.haryono', '5cbcf8a7cdf9abb188a07018e1e3c146', 4),
(553, 'MANGGA RAYA', 'manggaraya', 'ad4e2d31b88c41bd9db5b1895ca64a58', 4),
(554, 'JL. BANGKA-BENGKULU', 'jl.bangka-bengkulu', '6ba41cfb9cdf85034622617a471c58a8', 4),
(555, 'LINGGA', 'lingga', '09e5d5f5c9a7abcf62b903ff50789435', 4),
(556, 'WATER FRONT', 'waterfront', 'b90eb83c13145b27687b98d8115b6106', 4),
(557, 'PAKJO-UJUNG', 'pakjo-ujung', '889808aee0fbedcb7c872c7c8ec6eb0e', 4),
(558, 'MAYOR ZURBY BUSTAM', 'mayorzurbybustam', 'bbf83e7065f575afb8417cebcf3e38c1', 4),
(559, 'MACAN LINDUNGAN', 'macanlindungan', '7407ea1775f82932482c7a813014d533', 4),
(560, 'SPBU KM. 12', 'spbukm.12', 'be5465ff4a9a1d26d049383de243fa77', 4),
(561, 'ASAHAN', 'asahan', '20cb73be15ba4f1abdb3ee6ce4aaa694', 4),
(562, 'SALAK', 'salak', '905e19b679b29ae7c92e40993df1ed23', 4),
(563, 'SOEPRAPTO', 'soeprapto', '4d3110c2f46298bf247a5a925d3adfa2', 4),
(564, 'SIMPANG MANAK', 'simpangmanak', '5d93d54ebad88ad86a5fe7c21925ccbc', 4),
(565, 'KOMBES H.UMAR', 'kombesh.umar', '53076b151b9044d5cf6ca60780ce20bd', 4),
(566, 'SPBU SOETTA', 'spbusoetta', 'a79d34276c2eb9d8cf0eb8e871c75eed', 4),
(568, 'RAWA MAKMUR', 'rawamakmur', '8f28c43cb43768af84b4313425b12cc4', 4),
(569, 'RPN-BUKIT LAMA', 'rpn-bukitlama', '292479b31fbb277b063ecb67c3b1f47b', 4),
(570, 'KENTEN CITY', 'kentencity', '9938cdede59b345a43bbf306b5be4bfd', 4),
(571, 'JENSUD-BENGKULU', 'jensud-bengkulu', '88e2c3ea122da1cec136840eb9112070', 4),
(572, 'OKI PULP & PAPER 2', 'okipulp&paper2', '8a416fb129bface902de605d805b6e79', 4),
(573, 'PETANANG', 'petanang', '8eb306227ef671527a1dd4f5b5c8fe52', 4),
(574, 'INDRALAYA INDAH', 'indralayindah', 'c841472ff976c49a169e0c751012c3b1', 4),
(575, 'OKI PULP & PAPER', 'okipulp&paper', '1ba0a2cd6a8539fad9ed2ec348aa403b', 4),
(576, 'BOOM BARU', 'boombaru', '939ce6dabb0d619e4302cfe5777f639e', 4),
(577, 'MAYJEN SUTOYO', 'mayjensutoyo', '6e9617f2de68364b9676a7fb1ea09984', 4),
(578, 'RAFFLESIA', 'rafflesia', 'ea4bed765b2cc855b6fcd952999f6961', 4),
(579, 'MAHAKAM', 'mahakam', 'b96694b6e41ac125c74fcbb4070ebe7c', 4),
(580, 'HIBRIDA', 'hibrida', 'd83b264ea5bc1b7c6961869a229ff4c5', 4),
(581, 'PLG-BETUNG KM.24', 'plg-betungkm.24', 'bd07ff7ea09a81373cb870bfacdc6565', 4),
(582, 'SPBU BETUNG', 'spbubetung', 'e8fdb0aa367b7033888b06c974bdc782', 4),
(583, 'SPBU C2 SUNGAI LILIN', 'spbuc2sungaililin', 'af656090e82d4ba1ed99866cff9635d7', 4),
(584, 'PLG-BETUNG KM.20', 'plg-betungkm20', '755578336755d78292c4bc9becf29aa5', 4),
(585, 'SIMPANG PANGABUAN', 'simpangpangabuan', '51250c8b02e91a8ad1ebd006a152d788', 4),
(586, 'GAJAH MADA', 'gajahmada', 'a9086ef6484ccfcea0a58e0e467d05a9', 4),
(587, 'RADEN KARNA', 'radenkarna', 'bfe780bfdbd8633edc7c3783870302dd', 4),
(588, 'LINTAS LEBONG', 'lintaslebong', '10109490328ad225e63f98a77a379b97', 4),
(589, 'TANJUNG AGUNG', 'tanjungagung', '9db38535649d1945cc1c6f012722bc15', 4),
(590, 'PARIWISATA', 'pariwisata', 'fae52455e9e6583067de8c9725202751', 4),
(591, 'MERDEKA', 'merdeka', '57fe4fcc42610cb6dbbc8151892dfada', 4),
(592, 'PANGERAN ZAINAL ABIDIN', 'pangeranzainalabidin', '1f9f9b90e7333929821f1b78a8698747', 4),
(593, 'MERAPI', 'merapi', '9dc6f41e026d42e44bfb6ca0b3fb33d3', 4),
(594, 'BINA DARMA KAMPUS C', 'binadarmakampusc', 'f11f91d6f65e8a05310bad20494a868a', 4),
(595, 'LINTAS RANDIK', 'lintasrandik', '24f5742dad33c9812b4138b06d2d31bf', 4),
(596, 'SIMPANG MERDEKA-PALI', 'simpangmerdeka-pali', 'e8f7c41d0b37c0819d194d3f6b27dbca', 4),
(597, 'LINTAS CURUP', 'lintascurup', '04a9535186cd0a66756c4f7103015840', 4),
(598, 'GASING', 'gasing', '74f98d1b7fc932a1f20d9ba5d11f85ef', 4),
(599, 'MARIANA ULU', 'marianaulu', '6f6e137ce38131399199035292688889', 4),
(600, 'SPBU KAYU AGUNG', 'spbukayuagung', 'c949f1867dc49d7510228f095ef3b942', 4),
(601, 'SPBU MUARA BURNAI', 'spbumuaraburnai', 'fb6ed59c58d93bcf39f16542e75191b5', 4),
(602, 'HALMAHERU SURABAYA', 'halmaherusurabaya', '25f6d77be499c596ad3886263d182fdc', 4),
(603, 'WR. SUPRATMAN 2', 'wr.supratman2', '07a5dbc364e15115d9a655dfee602a92', 4),
(604, 'SOEKARNO HATTA', 'soekarnohatta', '6c7772d8d1eeb03b5cb29067f5182709', 4),
(605, 'FATMAWATI', 'fatmawati', '831ee178cb654f7035c9c542cb666a80', 4),
(606, 'KARANG ANYAR', 'karanganyar', '6cfa262fb37ceff15a62eed6d8c726a0', 4),
(607, 'ZAINUL ARIFIN', 'zainalarifin', '4290e1557c0480eddb29be155e4bb2ea', 4),
(608, 'DP NEGARA', 'dpnegara', '93f9d5ae2a064ed3afdbf44c3acced35', 4),
(609, 'JATI RAYA TALANG KELAPA', 'jatirayatalangkelapa', '219ef4ea940f97ff3f19878274ee7c4f', 4),
(610, 'PANGERAN SUBEKTI', 'pangeransubekti', '58dcabdef36950624fd7431c97da544e', 4),
(611, 'DEPATI SAID', 'depatisaid', '73371d94562b7cef0ffb4c8a7b6695a7', 4),
(612, 'SIMPANG KANDIS', 'simpangkandis', 'cb6792f955cd06c024861aa4926c4f5f', 4),
(613, 'ADAM MALIK 2', 'adammalik2', '302a945151ad40e367bc3ae26948554b', 4),
(616, 'PALSIGUNUNG', 'palsigunung', 'a2874951c3668deba43eda79642fd144', 4);

-- --------------------------------------------------------

--
-- Table structure for table `perbaikan_barang`
--

CREATE TABLE `perbaikan_barang` (
  `id_perbaikan` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `tanggal_perbaikan` date NOT NULL,
  `status_perbaikan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `permintaan_barang`
--

CREATE TABLE `permintaan_barang` (
  `id_permintaan` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `tanggal_permintaan` date NOT NULL,
  `status_permintaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_inventaris`
--
ALTER TABLE `barang_inventaris`
  ADD PRIMARY KEY (`id_barang_inventaris`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_inventaris` (`id_inventaris`);

--
-- Indexes for table `barang_perbaikan`
--
ALTER TABLE `barang_perbaikan`
  ADD PRIMARY KEY (`barang_perbaikan`),
  ADD KEY `id_perbaikan` (`id_perbaikan`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `barang_permintaan`
--
ALTER TABLE `barang_permintaan`
  ADD PRIMARY KEY (`id_barang_permintaan`),
  ADD KEY `id_permintaan` (`id_permintaan`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `daftar_barang`
--
ALTER TABLE `daftar_barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id_inventaris`),
  ADD KEY `id_pengguna` (`id_pengguna`) USING BTREE,
  ADD KEY `asal_toko` (`asal_toko`);

--
-- Indexes for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `perbaikan_barang`
--
ALTER TABLE `perbaikan_barang`
  ADD PRIMARY KEY (`id_perbaikan`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `permintaan_barang`
--
ALTER TABLE `permintaan_barang`
  ADD PRIMARY KEY (`id_permintaan`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang_inventaris`
--
ALTER TABLE `barang_inventaris`
  MODIFY `id_barang_inventaris` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `barang_perbaikan`
--
ALTER TABLE `barang_perbaikan`
  MODIFY `barang_perbaikan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `barang_permintaan`
--
ALTER TABLE `barang_permintaan`
  MODIFY `id_barang_permintaan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `daftar_barang`
--
ALTER TABLE `daftar_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id_inventaris` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=617;

--
-- AUTO_INCREMENT for table `perbaikan_barang`
--
ALTER TABLE `perbaikan_barang`
  MODIFY `id_perbaikan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permintaan_barang`
--
ALTER TABLE `permintaan_barang`
  MODIFY `id_permintaan` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_inventaris`
--
ALTER TABLE `barang_inventaris`
  ADD CONSTRAINT `barang_inventaris_ibfk_1` FOREIGN KEY (`id_inventaris`) REFERENCES `inventaris` (`id_inventaris`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_inventaris_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `daftar_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `barang_perbaikan`
--
ALTER TABLE `barang_perbaikan`
  ADD CONSTRAINT `barang_perbaikan_ibfk_1` FOREIGN KEY (`id_perbaikan`) REFERENCES `perbaikan_barang` (`id_perbaikan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_perbaikan_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `daftar_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `barang_permintaan`
--
ALTER TABLE `barang_permintaan`
  ADD CONSTRAINT `barang_permintaan_ibfk_1` FOREIGN KEY (`id_permintaan`) REFERENCES `permintaan_barang` (`id_permintaan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_permintaan_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `daftar_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `daftar_barang`
--
ALTER TABLE `daftar_barang`
  ADD CONSTRAINT `daftar_barang_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_barang` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD CONSTRAINT `inventaris_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventaris_ibfk_2` FOREIGN KEY (`asal_toko`) REFERENCES `pengguna` (`id_pengguna`);

--
-- Constraints for table `perbaikan_barang`
--
ALTER TABLE `perbaikan_barang`
  ADD CONSTRAINT `perbaikan_barang_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permintaan_barang`
--
ALTER TABLE `permintaan_barang`
  ADD CONSTRAINT `permintaan_barang_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
