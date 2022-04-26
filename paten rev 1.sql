-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2022 at 03:24 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paten`
--

-- --------------------------------------------------------

--
-- Table structure for table `disposisi`
--

CREATE TABLE `disposisi` (
  `id_disposisi` int(11) NOT NULL,
  `tgl_penyelesaian` date DEFAULT NULL,
  `dari` varchar(100) NOT NULL,
  `perihal` varchar(50) NOT NULL,
  `tgl_surat` date NOT NULL,
  `no` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `disposisi`
--

INSERT INTO `disposisi` (`id_disposisi`, `tgl_penyelesaian`, `dari`, `perihal`, `tgl_surat`, `no`) VALUES
(2, '2022-02-04', 'sdf asdf asdf', 'asdf', '2022-02-28', '123');

-- --------------------------------------------------------

--
-- Table structure for table `ektp`
--

CREATE TABLE `ektp` (
  `id_ektp` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `nik` varchar(20) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ektp`
--

INSERT INTO `ektp` (`id_ektp`, `tgl`, `nik`, `keterangan`) VALUES
(2, '2022-02-05', '123', 'asdf asdf');

-- --------------------------------------------------------

--
-- Table structure for table `kk`
--

CREATE TABLE `kk` (
  `id_kk` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `alamat` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kk`
--

INSERT INTO `kk` (`id_kk`, `tgl`, `nik`, `alamat`, `keterangan`) VALUES
(2, '2022-02-05', '123', 'asdfg', 'asdf');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

CREATE TABLE `penduduk` (
  `nik` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tgl` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`nik`, `nama`, `tempat_lahir`, `tgl_lahir`, `alamat`, `status`, `jenis_kelamin`, `tgl`) VALUES
('123', 'Dr. Ir. Muhammad Hudori, M.Si', 'Karawang', '2022-02-12', 'asdfg', 'asdf', 'Laki-laki', '2022-03-01');

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

CREATE TABLE `proposal` (
  `id_proposal` int(11) NOT NULL,
  `nama_lembaga` varchar(100) NOT NULL,
  `tgl_surat` date NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `tgl_penerimaan` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sktm`
--

CREATE TABLE `sktm` (
  `id_sktm` int(11) NOT NULL,
  `nomor_surat` varchar(50) NOT NULL,
  `tgl_surat` date NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sktm`
--

INSERT INTO `sktm` (`id_sktm`, `nomor_surat`, `tgl_surat`, `nama`, `tempat_lahir`, `tgl_lahir`, `alamat`, `keterangan`) VALUES
(1, '422.5/07/ocd/2022', '2022-02-11', 'Dr. Ir. Muhammad Hudori, M.Si.', 'Karawang.', '1964-02-07', 'Karawang.', 'Ini Keterangan.');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_surat_keluar` int(11) NOT NULL,
  `tgl_surat` date NOT NULL,
  `no_surat` varchar(30) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `tujuan_surat` varchar(100) NOT NULL,
  `tgl_pengiriman` date NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `tgl_surat` date NOT NULL,
  `no_surat` varchar(30) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `asal_surat` varchar(100) NOT NULL,
  `tgl_terima` date NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`tgl_surat`, `no_surat`, `perihal`, `asal_surat`, `tgl_terima`, `keterangan`) VALUES
('2022-02-28', '123', 'asdf', 'sdf asdf asdf', '2022-02-05', 'Ini Keterangan asdf');

-- --------------------------------------------------------

--
-- Table structure for table `surat_pencaker`
--

CREATE TABLE `surat_pencaker` (
  `id_surat_pencaker` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `pendidikan` varchar(20) NOT NULL,
  `tahun_lulus` varchar(4) NOT NULL,
  `tgl_pembuatan` date NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat_pencaker`
--

INSERT INTO `surat_pencaker` (`id_surat_pencaker`, `nik`, `pendidikan`, `tahun_lulus`, `tgl_pembuatan`, `keterangan`) VALUES
(2, '123', 'SMA/SMK', '2022', '2022-02-27', 'ini keterangan');

-- --------------------------------------------------------

--
-- Table structure for table `surat_pindah`
--

CREATE TABLE `surat_pindah` (
  `id_surat_pindah` int(11) NOT NULL,
  `no_surat` varchar(30) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `nik` varchar(20) NOT NULL,
  `alamat_asal` varchar(100) NOT NULL,
  `tujuan_pindah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat_pindah`
--

INSERT INTO `surat_pindah` (`id_surat_pindah`, `no_surat`, `tgl_masuk`, `nik`, `alamat_asal`, `tujuan_pindah`) VALUES
(2, 'asdf123', '2022-02-02', '123', 'asdf', 'asdf');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(4) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `avatar` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `status` int(4) NOT NULL DEFAULT 0,
  `telp` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nip`, `email`, `password`, `nama_user`, `avatar`, `role`, `status`, `telp`, `alamat`) VALUES
(1, 'admin', 'admin@mail.com', '$2y$10$HNIF2nCdz4lNSE8dCiG14e7fVYVETP6vxzq/zgHxTX3yqRhTxvuuW', 'Admin', 'default.jpg', 'admin', 0, '(021) 898 8989', 'Jln. Kaki seribu no 12.'),
(5, '123123', 'sekcam@mail.com', '$2y$10$p.4qxnASjn/201jAQoLt8u0cKAcYC53C7FTzIUaSuMoi4pg.Ddn8O', 'Dr. Ir. Muhammad Hudori, M.Si', 'default.jpg', 'sekcam', 0, '0987654444', 'Ini Alamat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id_disposisi`),
  ADD KEY `dis_sus` (`no`);

--
-- Indexes for table `ektp`
--
ALTER TABLE `ektp`
  ADD PRIMARY KEY (`id_ektp`),
  ADD KEY `ektp_pdk` (`nik`);

--
-- Indexes for table `kk`
--
ALTER TABLE `kk`
  ADD PRIMARY KEY (`id_kk`),
  ADD KEY `kk_pddk` (`nik`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`id_proposal`);

--
-- Indexes for table `sktm`
--
ALTER TABLE `sktm`
  ADD PRIMARY KEY (`id_sktm`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_surat_keluar`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`no_surat`);

--
-- Indexes for table `surat_pencaker`
--
ALTER TABLE `surat_pencaker`
  ADD PRIMARY KEY (`id_surat_pencaker`),
  ADD KEY `pckr_pddk` (`nik`);

--
-- Indexes for table `surat_pindah`
--
ALTER TABLE `surat_pindah`
  ADD PRIMARY KEY (`id_surat_pindah`),
  ADD KEY `sp_pdk` (`nik`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id_disposisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ektp`
--
ALTER TABLE `ektp`
  MODIFY `id_ektp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kk`
--
ALTER TABLE `kk`
  MODIFY `id_kk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `proposal`
--
ALTER TABLE `proposal`
  MODIFY `id_proposal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sktm`
--
ALTER TABLE `sktm`
  MODIFY `id_sktm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_surat_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `surat_pencaker`
--
ALTER TABLE `surat_pencaker`
  MODIFY `id_surat_pencaker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `surat_pindah`
--
ALTER TABLE `surat_pindah`
  MODIFY `id_surat_pindah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD CONSTRAINT `dis_sus` FOREIGN KEY (`no`) REFERENCES `surat_masuk` (`no_surat`);

--
-- Constraints for table `ektp`
--
ALTER TABLE `ektp`
  ADD CONSTRAINT `ektp_pdk` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`);

--
-- Constraints for table `kk`
--
ALTER TABLE `kk`
  ADD CONSTRAINT `kk_pddk` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`);

--
-- Constraints for table `surat_pencaker`
--
ALTER TABLE `surat_pencaker`
  ADD CONSTRAINT `pckr_pddk` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`);

--
-- Constraints for table `surat_pindah`
--
ALTER TABLE `surat_pindah`
  ADD CONSTRAINT `sp_pdk` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
