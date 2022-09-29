-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2022 at 07:08 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_yusnani`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_ahli_waris_detail`
--

CREATE TABLE `tb_ahli_waris_detail` (
  `id` bigint(20) NOT NULL,
  `nomor` varchar(10) NOT NULL,
  `nik` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ahli_waris_detail`
--

INSERT INTO `tb_ahli_waris_detail` (`id`, `nomor`, `nik`) VALUES
(61, '1', '1208265509000008'),
(62, '1', '1208265710100009'),
(63, '2', '1208260101030004'),
(64, '2', '1208260101030007'),
(65, '3', '1208260101030003'),
(66, '4', '1208260101030005'),
(67, '5', '1208260101030004'),
(68, '5', '1208260101030007');

-- --------------------------------------------------------

--
-- Table structure for table `tb_data_lahir`
--

CREATE TABLE `tb_data_lahir` (
  `id_lahir` int(11) NOT NULL,
  `nama_bayi` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `agama` varchar(30) NOT NULL,
  `hubungan_keluarga` varchar(30) NOT NULL,
  `id_kk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_data_lahir`
--

INSERT INTO `tb_data_lahir` (`id_lahir`, `nama_bayi`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `agama`, `hubungan_keluarga`, `id_kk`) VALUES
(1, 'ddddd', 'ffff', 'aaaaaaaaaa', '0000-00-00', '', '', '', 0),
(2, 'dfsadf', 'erewrer', 'ssewee', '0000-00-00', 'dfgdgdf', 'gdfgdfg', 'gdfgdfgd', 322);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kartu_keluarga`
--

CREATE TABLE `tb_kartu_keluarga` (
  `nomor_kk` varchar(20) NOT NULL,
  `nama_kepala_keluarga` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kartu_keluarga`
--

INSERT INTO `tb_kartu_keluarga` (`nomor_kk`, `nama_kepala_keluarga`) VALUES
('1208260101030016', 'Dikta'),
('1208261607090012', 'Rikwan'),
('1208261607090013', 'Angga'),
('1208261607090014', 'Alvin'),
('1208261607090030', 'Andri');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kepala_desa`
--

CREATE TABLE `tb_kepala_desa` (
  `nik` varchar(20) NOT NULL,
  `nomor_kk` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `kode_pos` varchar(15) NOT NULL,
  `rt_rw` varchar(30) NOT NULL,
  `kelurahan` varchar(30) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `kabupaten` varchar(30) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `agama` varchar(30) NOT NULL,
  `status_perkawinan` varchar(30) NOT NULL,
  `kewarganegaraan` varchar(30) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `status` varchar(20) NOT NULL,
  `kata_sandi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kepala_desa`
--

INSERT INTO `tb_kepala_desa` (`nik`, `nomor_kk`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `kode_pos`, `rt_rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `agama`, `status_perkawinan`, `kewarganegaraan`, `telepon`, `status`, `kata_sandi`) VALUES
('1208260405770001', '1208261607090012', 'Maskan Tarigan ', 'Laki-laki', 'Saran Padang', '1996-09-23', 'Perasmian Kecamatan Dolok Silau kabupaten Simalungun ', '21168', '0/0', 'Perasmian', 'Dolok Silau', 'Simalungun', 'Sumatera Utara', 'Khatolik', 'Menikah', 'Indonesia', '082298348139', 'Aktif', '1208260405770001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penduduk`
--

CREATE TABLE `tb_penduduk` (
  `nik` varchar(20) NOT NULL,
  `nomor_kk` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `kode_pos` varchar(15) NOT NULL,
  `rt_rw` varchar(30) NOT NULL,
  `kelurahan` varchar(30) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `kabupaten` varchar(30) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `agama` varchar(30) NOT NULL,
  `status_perkawinan` varchar(30) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `kewarganegaraan` varchar(30) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `hubungan_keluarga` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  `kata_sandi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penduduk`
--

INSERT INTO `tb_penduduk` (`nik`, `nomor_kk`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `kode_pos`, `rt_rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `agama`, `status_perkawinan`, `pekerjaan`, `kewarganegaraan`, `telepon`, `hubungan_keluarga`, `status`, `kata_sandi`) VALUES
('1208260100000001', '1208261607090030', 'Andri', 'Laki-laki', 'Perasmian', '1987-07-23', 'Perasmian Kecamatan Dolok Silau kabupaten Simalugun', '21168', '0/0', 'Perasmian', 'Dolok Silau', 'Simalungun', 'Sumatera Utara', 'Khatolik', 'Menikah', 'Petani', 'Indonesia', '082298348136', 'Kepala Keluarga', 'Aktif', '1208260100000001'),
('1208260101000001', '1208261607090013', 'Angga', 'Laki-laki', 'Medan', '1986-07-23', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun', '21168', '0/0', 'Perasmian', 'Dolok Silau', 'Simalungun', 'Sumatera Utara', 'Khatolik', 'Menikah', 'Petani', 'Indonesia', '082298348137', 'Kepala Keluarga', 'Aktif', '1208260101000001'),
('1208260101020001', '1208261607090030', 'Andriani', 'Perempuan', 'Medan', '1978-06-21', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun', '21168', '0/0', 'Perasmian', 'Dolok Silau', 'Simalungun', 'Sumatera Utara', 'Khatolik', 'Menikah', 'Petani', 'Indonesia', '082298348132', 'Istri', 'Aktif', '1208260000000001'),
('1208260101030001', '1208260101030016', 'Dikta', 'Laki-laki', 'Perasmian', '1994-07-22', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun', '21168', '0/0', 'Perasmian', 'Dolok Silau', 'Simalungun', 'Sumatera Utara', 'Khatolik', 'Menikah', 'Petani', 'Indonesia', '082298348138', 'Kepala Keluarga', 'Aktif', '1208260101030050'),
('1208260101030003', '1208261607090012', 'Rikwan', 'Laki-laki', 'Kabanjahe', '2003-01-01', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun ', '21168', '0/0', 'Perasmian', 'Dolok Silau', 'Simalungun', 'Sumatera Utara', 'Khatolik', 'Belum Menikah', 'Mahasiswa', 'Indonesia', '082298348134', 'Kepala Keluarga', 'Aktif', '1208260101030003'),
('1208260101030004', '1208261607090012', 'anna', 'Perempuan', 'Jambi', '1999-08-10', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun ', '21168', '0/0', 'Perasmian', 'Dolok Silau', 'Simalungun', 'Sumatera Utara', 'Khatolik', 'Belum Menikah', 'Mahasiswa', 'Indonesia', '082298348135', 'Istri', 'Aktif', '1208260101030004'),
('1208260101030005', '1208261607090012', 'andik', 'Laki-laki', 'Binjai', '1997-05-23', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun', '21168', '0/0', 'Perasmian', 'Dolok Silau', 'Simalungun', 'Sumatera Utara', 'Khatolik', 'Menikah', 'Petani', 'Indonesia', '082298348136', 'Anak', 'Aktif', '1208260101030005'),
('1208260101030006', '1208260101030016', 'Mei', 'Perempuan', 'Saran Padang', '1999-09-03', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun', '21168', '0/0', 'Perasmian', 'Dolok Silau', 'Simalungun', 'Sumatera Utara', 'Kristen Protestan', 'Belum Menikah', 'Mahasiswa', 'Indonesia', '082298348137', 'Istri', 'Aktif', '1208260101030006'),
('1208260101030007', '1208261607090012', 'anne', 'Perempuan', 'Perasmian', '2000-09-16', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun', '21168', '0/0', 'Perasmian', 'Dolok Silau', 'Simalungun', 'Sumatera Utara', 'Kristen Protestan', 'Belum Menikah', 'Mahasiswa', 'Indonesia', '082298348138', 'Anak', 'Aktif', '1208260101030007'),
('1208260101030011', '1208261607090012', 'Tasya', 'Perempuan', 'Berastagi', '2003-01-01', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun ', '21168', '0/0', 'Perasmian', 'Dolok Silau', 'Simalungun', 'Sumatera Utara', 'Khatolik', 'Belum Menikah', 'Mahasiswa', 'Indonesia', '082298348139', 'Anak', 'Aktif', '1208260101030011'),
('1208260101030012', '1208261607090012', 'Eben', 'Laki-laki', 'Perasmian', '2014-09-09', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun', '21168', '0/0', 'Perasmian', 'Dolok Silau', 'Simalungun', 'Sumatera Utara', 'Khatolik', 'Belum Menikah', 'Pelajar', 'Indonesia', '082298348131', 'Anak', 'Aktif', '1208260101030012'),
('1208260101030013', '1208261607090012', 'Sarthika', 'Perempuan', 'Perasmian', '2001-09-01', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun', '21168', '0/0', 'Perasmian', 'Dolok Silau', 'Simalungun', 'Sumatera Utara', 'Kristen Protestan', 'Belum Menikah', 'Mahasiswa', 'Indonesia', '082298348132', 'Anak', 'Aktif', '1208260101030013'),
('1208260101030014', '1208261607090014', 'Alvin', 'Laki-laki', 'Sembahe', '2000-08-09', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun', '21168', '0/0', 'Perasmian', 'Dolok Silau', 'Simalungun', 'Sumatera Utara', 'Khatolik', 'Belum Menikah', 'Mahasiswa', 'Indonesia', '082298348133', 'Kepala Keluarga', 'Aktif', '1208260101030014'),
('1208260101030015', '1208261607090014', 'Marubah', 'Laki-laki', 'Medan', '1960-09-23', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun', '21168', '0/0', 'Perasmian', 'Dolok Silau', 'Simalungun', 'Sumatera Utara', 'Kristen Protestan', 'Menikah', 'Petani', 'Indonesia', '082298348134', 'Istri', 'Aktif', '1208260101030015'),
('1208260101030020', '1208261607090014', 'selvia', 'Perempuan', 'Medan', '2004-08-09', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun ', '21168', '0/0', 'Perasmian', 'Dolok Silau', 'Simalungun', 'Sumatera Utara', 'Khatolik', 'Belum Menikah', 'Pelajar', 'Indonesia', '082298348134', 'Anak', 'Aktif', '1208260101030020'),
('1208260101030021', '1208261607090014', 'Ucok', 'Laki-laki', 'Medan', '1675-08-11', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun ', '21168', '0/0', 'Perasmian', 'Dolok Silau', 'Simalungun', 'Sumatera Utara', 'Khatolik', 'Menikah', 'Petani', 'Indonesia', '082298348134', 'Anak', 'Aktif', '1208260101030021'),
('1208260101030030', '1208261607090030', 'andra', 'Perempuan', 'Medan', '1675-08-11', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun ', '21168', '0/0', 'Perasmian', 'Dolok Silau', 'Simalungun', 'Sumatera Utara', 'Khatolik', 'Menikah', 'Petani', 'Indonesia', '082298348134', 'Anak', 'Aktif', '1208260101030030'),
('1208260101030031', '1208261607090030', 'andre', 'Laki-laki', 'Medan', '2001-08-11', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun ', '21168', '0/0', 'Perasmian', 'Dolok Silau', 'Simalungun', 'Sumatera Utara', 'Khatolik', 'Menikah', 'Mahasiswa', 'Indonesia', '082298348134', 'Anak', 'Aktif', '1208260101030031'),
('1208265509000008', '1208261607090013', 'Yusnani ', 'Perempuan', 'Perasmian', '2000-09-15', 'Perasmian Kecamtan Dolok Silau Kabupaten Simalungun', '21168', '0/0', 'Perasmian', 'Dolok Silau', 'Simalungun', 'Sumatera Utara', 'Khatolik', 'Belum Menikah', 'Petani', 'Indonesia', '082298348139', 'Istri', 'Aktif', '1208265509000008'),
('1208265710100009', '1208261607090013', 'Yolanda ', 'Perempuan', 'Sibolangit', '2010-10-18', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun ', '21168', '0/0', 'Perasmian', 'Dolok Silau', 'Simalungun', 'Sumatera Utara', 'Khatolik', 'Belum Menikah', 'Pelajar', 'Indonesia', '082298348139', 'Anak', 'Aktif', '1208265710100009'),
('1208266305970010', '1208261607090013', 'Rita', 'Perempuan', 'Perasmian', '1997-05-23', 'Perasmian Kecamtan Dolok Silau Kabupaten Simalungun', '21168', '0/0', 'Perasmian', 'Dolok Silau', 'Simalungun', 'Sumatera Utara', 'Khatolik', 'Menikah', 'Petani', 'Indonesia', '082298348139', 'Anak', 'Aktif', '1208266305970010'),
('15092000', '1208260101030016', 'butet', 'Perempuan', 'Perasmian', '2022-10-08', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun', '21168', '0/0', 'Perasmian', 'Dolok Silau', 'Simalungun', 'Sumatera Utara', 'Khatolik', 'Belum Menikah', 'tidak ada', 'Indonesia', '082298348134', 'Anak', 'Aktif', '15092000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sekretaris_desa`
--

CREATE TABLE `tb_sekretaris_desa` (
  `nik` varchar(20) NOT NULL,
  `nomor_kk` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `kode_pos` varchar(15) NOT NULL,
  `rt_rw` varchar(30) NOT NULL,
  `kelurahan` varchar(30) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `kabupaten` varchar(30) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `agama` varchar(30) NOT NULL,
  `status_perkawinan` varchar(30) NOT NULL,
  `kewarganegaraan` varchar(30) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `status` varchar(20) NOT NULL,
  `kata_sandi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sekretaris_desa`
--

INSERT INTO `tb_sekretaris_desa` (`nik`, `nomor_kk`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `kode_pos`, `rt_rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `agama`, `status_perkawinan`, `kewarganegaraan`, `telepon`, `status`, `kata_sandi`) VALUES
('1208265412690002', '1208261607090012', 'Kompil Malau', 'Laki-laki', 'Saran Padang', '1969-12-12', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun', '21168', '0/0', 'Perasmian', 'Dolok Silau', 'Simalungun', 'Sumatera Utara', 'Kristen Protestan', 'Menikah', 'Indonesia', '082298348139', 'Aktif', '1208265412690002');

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat_ahli_waris`
--

CREATE TABLE `tb_surat_ahli_waris` (
  `nomor` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `nik` varchar(20) NOT NULL,
  `pemilik` varchar(20) NOT NULL,
  `tanggal_disetujui` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_surat_ahli_waris`
--

INSERT INTO `tb_surat_ahli_waris` (`nomor`, `tanggal`, `nik`, `pemilik`, `tanggal_disetujui`, `status`) VALUES
('1', '2022-08-09', '1208260101030003', '1208260101030003', '2022-08-09', 'Telah Divalidasi'),
('2', '2022-08-09', '1208265412690002', '1208265509000008', '0000-00-00', 'Belum Divalidasi'),
('3', '2022-08-09', '1208265412690002', '1208266305970010', '0000-00-00', 'Belum Divalidasi'),
('4', '2022-08-09', '1208265412690002', '1208260101030004', '0000-00-00', 'Belum Divalidasi'),
('5', '2022-08-10', '1208265412690002', '1208260101030006', '2022-08-10', 'Telah Divalidasi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat_belum_menikah`
--

CREATE TABLE `tb_surat_belum_menikah` (
  `nomor` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `nik` varchar(20) NOT NULL,
  `alamat` longtext NOT NULL,
  `pekerjaan` varchar(60) NOT NULL,
  `lama` int(3) NOT NULL,
  `tanggal_disetujui` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_surat_belum_menikah`
--

INSERT INTO `tb_surat_belum_menikah` (`nomor`, `tanggal`, `nik`, `alamat`, `pekerjaan`, `lama`, `tanggal_disetujui`, `status`) VALUES
('1', '2022-08-09', '1208260101030003', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun ', 'Mahasiswa', 0, '2022-08-09', 'Telah Divalidasi'),
('2', '2022-08-09', '1208265509000008', 'Perasmian Kecamtan Dolok Silau Kabupaten Simalungun', 'Mahasiswa', 0, '0000-00-00', 'Belum Divalidasi'),
('3', '2022-08-09', '1208260101030004', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun ', 'Mahasiswa', 0, '0000-00-00', 'Belum Divalidasi'),
('4', '2022-08-09', '1208260101030007', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun', 'Mahasiswa', 0, '0000-00-00', 'Belum Divalidasi'),
('5', '2022-08-09', '1208260101030004', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun ', 'Mahasiswa', 0, '0000-00-00', 'Belum Divalidasi'),
('6', '2022-08-09', '1208266305970010', 'Perasmian Kecamtan Dolok Silau Kabupaten Simalungun', 'Petani', 0, '0000-00-00', 'Belum Divalidasi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat_berkelakuan_baik`
--

CREATE TABLE `tb_surat_berkelakuan_baik` (
  `nomor` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `nik` varchar(20) NOT NULL,
  `alamat` longtext NOT NULL,
  `pekerjaan` varchar(60) NOT NULL,
  `lama` int(3) NOT NULL,
  `tanggal_disetujui` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_surat_berkelakuan_baik`
--

INSERT INTO `tb_surat_berkelakuan_baik` (`nomor`, `tanggal`, `nik`, `alamat`, `pekerjaan`, `lama`, `tanggal_disetujui`, `status`) VALUES
('1', '2022-08-09', '1208260101030003', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun ', 'Mahasiswa', 0, '2022-08-09', 'Telah Divalidasi'),
('2', '2022-08-09', '1208265509000008', 'Perasmian Kecamtan Dolok Silau Kabupaten Simalungun', 'Mahasiswa', 0, '0000-00-00', 'Belum Divalidasi'),
('3', '2022-08-09', '1208260101030005', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun', 'Mahasiswa', 0, '0000-00-00', 'Belum Divalidasi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat_domisili`
--

CREATE TABLE `tb_surat_domisili` (
  `nomor` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `nik` varchar(20) NOT NULL,
  `alamat` longtext NOT NULL,
  `pekerjaan` varchar(60) NOT NULL,
  `lama` int(3) NOT NULL,
  `tanggal_disetujui` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_surat_domisili`
--

INSERT INTO `tb_surat_domisili` (`nomor`, `tanggal`, `nik`, `alamat`, `pekerjaan`, `lama`, `tanggal_disetujui`, `status`) VALUES
(1, '2022-08-09', '1208260101030003', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun ', 'Mahasiswa', 1, '2022-08-09', 'Telah Divalidasi'),
(2, '2022-08-09', '1208265509000008', 'Perasmian Kecamtan Dolok Silau Kabupaten Simalungun', 'Mahasiswa', 1, '0000-00-00', 'Belum Divalidasi'),
(4, '2022-08-09', '1208260101030012', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun', 'Pelajar', 1, '0000-00-00', 'Belum Divalidasi'),
(5, '2022-08-09', '1208260101030006', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun', 'Mahasiswa', 1, '0000-00-00', 'Belum Divalidasi'),
(6, '2022-08-10', '1208265710100009', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun ', 'Pelajar', 1, '2022-08-10', 'Telah Divalidasi'),
(7, '2022-08-10', '1208260101030003', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun ', 'Mahasiswa', 1, '2022-08-10', 'Telah Divalidasi'),
(8, '2022-08-11', '1208260101030003', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun ', 'Mahasiswa', 1, '0000-00-00', 'Belum Divalidasi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat_kematian`
--

CREATE TABLE `tb_surat_kematian` (
  `nomor` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `nik` varchar(20) NOT NULL,
  `alamat` longtext NOT NULL,
  `tanggal_meninggal` date NOT NULL,
  `di` varchar(30) NOT NULL,
  `disebabkan` varchar(60) NOT NULL,
  `tanggal_disetujui` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `pemohon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_surat_kematian`
--

INSERT INTO `tb_surat_kematian` (`nomor`, `tanggal`, `nik`, `alamat`, `tanggal_meninggal`, `di`, `disebabkan`, `tanggal_disetujui`, `status`, `pemohon`) VALUES
(1, '2022-08-09', '1208260101030003', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun ', '2022-08-05', 'rumah kediamannya', 'sakit', '2022-08-09', 'Telah Divalidasi', '1208260101030003'),
(2, '2022-08-09', '1208265509000008', 'Perasmian Kecamtan Dolok Silau Kabupaten Simalungun', '2022-06-10', 'rumah sakit', 'sakit', '0000-00-00', 'Belum Divalidasi', '1208265412690002'),
(3, '2022-08-09', '1208260101030004', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun ', '2022-08-01', 'rumah sakit', 'sakit', '0000-00-00', 'Belum Divalidasi', '1208265412690002');

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat_kurang_mampu`
--

CREATE TABLE `tb_surat_kurang_mampu` (
  `nomor` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `nik` varchar(20) NOT NULL,
  `alamat` longtext NOT NULL,
  `pekerjaan` varchar(60) NOT NULL,
  `penghasilan_keluarga` bigint(20) NOT NULL,
  `tanggal_disetujui` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_surat_kurang_mampu`
--

INSERT INTO `tb_surat_kurang_mampu` (`nomor`, `tanggal`, `nik`, `alamat`, `pekerjaan`, `penghasilan_keluarga`, `tanggal_disetujui`, `status`) VALUES
('1', '2022-08-09', '1208260101030003', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun ', 'Mahasiswa', 100000, '2022-08-09', 'Telah Divalidasi'),
('2', '2022-08-09', '1208265509000008', 'Perasmian Kecamtan Dolok Silau Kabupaten Simalungun', 'Mahasiswa', 1000000, '0000-00-00', 'Belum Divalidasi'),
('3', '2022-08-09', '1208260101030005', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun', 'Petani', 1000000, '0000-00-00', 'Belum Divalidasi'),
('4', '2022-08-09', '1208260101030015', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun', 'Petani', 2000000, '0000-00-00', 'Belum Divalidasi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat_menikah`
--

CREATE TABLE `tb_surat_menikah` (
  `nomor` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `nik` varchar(20) NOT NULL,
  `alamat` longtext NOT NULL,
  `pekerjaan` varchar(60) NOT NULL,
  `nama_pasangan` varbinary(30) NOT NULL,
  `keterangan` longtext NOT NULL,
  `nama_pasangan_terdahulu` varchar(30) NOT NULL,
  `tanggal_disetujui` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_surat_menikah`
--

INSERT INTO `tb_surat_menikah` (`nomor`, `tanggal`, `nik`, `alamat`, `pekerjaan`, `nama_pasangan`, `keterangan`, `nama_pasangan_terdahulu`, `tanggal_disetujui`, `status`) VALUES
('1', '2022-08-09', '1208260101030003', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun ', 'Mahasiswa', 0x616e6e65, 'Perawan', 'tidak ada', '2022-08-09', 'Telah Divalidasi'),
('2', '2022-08-09', '1208265509000008', 'Perasmian Kecamtan Dolok Silau Kabupaten Simalungun', 'Mahasiswa', 0x616e64696b, 'Perjaka', 'tidak ada', '0000-00-00', 'Belum Divalidasi'),
('3', '2022-08-09', '1208260101030005', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun', 'Petani', 0x616e6e61, 'Perawan', 'tidak ada', '0000-00-00', 'Belum Divalidasi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat_pengganti_ktp`
--

CREATE TABLE `tb_surat_pengganti_ktp` (
  `nomor` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `nik` varchar(20) NOT NULL,
  `alamat` longtext NOT NULL,
  `pekerjaan` varchar(60) NOT NULL,
  `lokasi_hilang` varchar(200) NOT NULL,
  `tanggal_disetujui` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_surat_pengganti_ktp`
--

INSERT INTO `tb_surat_pengganti_ktp` (`nomor`, `tanggal`, `nik`, `alamat`, `pekerjaan`, `lokasi_hilang`, `tanggal_disetujui`, `status`) VALUES
('1', '2022-08-09', '1208260101030003', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun ', 'Mahasiswa', 'di luar kota', '2022-08-09', 'Telah Divalidasi'),
('2', '2022-08-09', '1208265509000008', 'Perasmian Kecamtan Dolok Silau Kabupaten Simalungun', 'Mahasiswa', 'liburan ke bali', '0000-00-00', 'Belum Divalidasi'),
('3', '2022-08-09', '1208260101030005', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun', 'Petani', 'Luar kota', '0000-00-00', 'Belum Divalidasi'),
('4', '2022-08-09', '1208260101030013', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun', 'Mahasiswa', 'Luar kota', '0000-00-00', 'Belum Divalidasi'),
('5', '2022-08-09', '1208260101030014', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun', 'Mahasiswa', 'Luar kota', '0000-00-00', 'Belum Divalidasi'),
('6', '2022-08-10', '1208260101030021', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun ', 'Petani', 'luar kota', '2022-08-10', 'Telah Divalidasi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat_pindah`
--

CREATE TABLE `tb_surat_pindah` (
  `nomor` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `nik` varchar(20) NOT NULL,
  `alamat` longtext NOT NULL,
  `pekerjaan` varchar(60) NOT NULL,
  `alamat_pindah` varchar(200) NOT NULL,
  `tanggal_disetujui` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_surat_pindah`
--

INSERT INTO `tb_surat_pindah` (`nomor`, `tanggal`, `nik`, `alamat`, `pekerjaan`, `alamat_pindah`, `tanggal_disetujui`, `status`) VALUES
('1', '2022-08-09', '1208260101030003', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun ', 'Mahasiswa', 'Saran Padang', '2022-08-09', 'Telah Divalidasi'),
('2', '2022-08-09', '1208265509000008', 'Perasmian Kecamtan Dolok Silau Kabupaten Simalungun', 'Mahasiswa', 'Panribuan', '0000-00-00', 'Belum Divalidasi'),
('3', '2022-08-09', '1208260101030011', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun ', 'Mahasiswa', 'Saran Padang', '0000-00-00', 'Belum Divalidasi'),
('4', '2022-08-09', '1208260101030007', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun', 'Mahasiswa', 'Panribuan', '0000-00-00', 'Belum Divalidasi'),
('5', '2022-08-11', '1208260101030003', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun ', 'Mahasiswa', 'Saran Padang', '0000-00-00', 'Belum Divalidasi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat_usaha`
--

CREATE TABLE `tb_surat_usaha` (
  `nomor` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `nik` varchar(20) NOT NULL,
  `alamat` longtext NOT NULL,
  `pekerjaan` varchar(60) NOT NULL,
  `nama_usaha` longtext NOT NULL,
  `tanggal_disetujui` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_surat_usaha`
--

INSERT INTO `tb_surat_usaha` (`nomor`, `tanggal`, `nik`, `alamat`, `pekerjaan`, `nama_usaha`, `tanggal_disetujui`, `status`) VALUES
('1', '2022-08-09', '1208260101030003', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun ', 'Mahasiswa', 'usaha sawit 25 Ha', '2022-08-09', 'Telah Divalidasi'),
('2', '2022-08-09', '1208265509000008', 'Perasmian Kecamtan Dolok Silau Kabupaten Simalungun', 'Mahasiswa', 'cabai 25 Ha', '0000-00-00', 'Belum Divalidasi'),
('3', '2022-08-10', '1208260101030021', 'Perasmian Kecamatan Dolok Silau Kabupaten Simalungun ', 'Petani', 'usaha sawit 25 Ha', '2022-08-10', 'Telah Divalidasi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_waris`
--

CREATE TABLE `tb_waris` (
  `id_waris` bigint(20) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `pemilik` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_waris`
--

INSERT INTO `tb_waris` (`id_waris`, `nik`, `pemilik`) VALUES
(51, '1208265509000008', '1208260101030003'),
(52, '1208265710100009', '1208260101030003'),
(53, '1208260101030004', '1208265509000008'),
(54, '1208260101030007', '1208265509000008'),
(55, '1208260101030003', '1208266305970010'),
(56, '1208260101030005', '1208260101030004'),
(57, '1208260101030004', '1208260101030006'),
(58, '1208260101030007', '1208260101030006');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_ahli_waris_detail`
--
ALTER TABLE `tb_ahli_waris_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_data_lahir`
--
ALTER TABLE `tb_data_lahir`
  ADD PRIMARY KEY (`id_lahir`);

--
-- Indexes for table `tb_kartu_keluarga`
--
ALTER TABLE `tb_kartu_keluarga`
  ADD PRIMARY KEY (`nomor_kk`);

--
-- Indexes for table `tb_kepala_desa`
--
ALTER TABLE `tb_kepala_desa`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `tb_penduduk`
--
ALTER TABLE `tb_penduduk`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `tb_sekretaris_desa`
--
ALTER TABLE `tb_sekretaris_desa`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `tb_surat_ahli_waris`
--
ALTER TABLE `tb_surat_ahli_waris`
  ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `tb_surat_belum_menikah`
--
ALTER TABLE `tb_surat_belum_menikah`
  ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `tb_surat_berkelakuan_baik`
--
ALTER TABLE `tb_surat_berkelakuan_baik`
  ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `tb_surat_domisili`
--
ALTER TABLE `tb_surat_domisili`
  ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `tb_surat_kematian`
--
ALTER TABLE `tb_surat_kematian`
  ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `tb_surat_kurang_mampu`
--
ALTER TABLE `tb_surat_kurang_mampu`
  ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `tb_surat_menikah`
--
ALTER TABLE `tb_surat_menikah`
  ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `tb_surat_pengganti_ktp`
--
ALTER TABLE `tb_surat_pengganti_ktp`
  ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `tb_surat_pindah`
--
ALTER TABLE `tb_surat_pindah`
  ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `tb_surat_usaha`
--
ALTER TABLE `tb_surat_usaha`
  ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `tb_waris`
--
ALTER TABLE `tb_waris`
  ADD PRIMARY KEY (`id_waris`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_ahli_waris_detail`
--
ALTER TABLE `tb_ahli_waris_detail`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `tb_data_lahir`
--
ALTER TABLE `tb_data_lahir`
  MODIFY `id_lahir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_waris`
--
ALTER TABLE `tb_waris`
  MODIFY `id_waris` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
