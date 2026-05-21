-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2026 at 07:38 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `Id_Anggota` int(100) NOT NULL,
  `Nama_Anggota` varchar(100) NOT NULL,
  `Alamat` text NOT NULL,
  `Jenis_Kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`Id_Anggota`, `Nama_Anggota`, `Alamat`, `Jenis_Kelamin`, `Email`, `Password`) VALUES
(1, 'Asep', 'Jakarta', 'Laki-laki', 'Asep969@gmail.com', '12345'),
(3, 'Acad', 'Legoso', 'Perempuan', 'Acad123@gmail.com', '12345'),
(4, 'Faiz', 'Gaplex', 'Laki-laki', 'Faiz123@gmail.com', '54321'),
(6, 'Jamal', 'Ciputat', 'Laki-laki', 'Jamal123@gmail.com', '12345'),
(7, 'Susi', 'Legoso', 'Perempuan', 'Susi123@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `Id_Buku` int(100) NOT NULL,
  `Judul_Buku` varchar(100) NOT NULL,
  `Pengarang` varchar(100) NOT NULL,
  `Penerbit` varchar(100) NOT NULL,
  `Tahun_Terbit` varchar(100) NOT NULL,
  `Foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`Id_Buku`, `Judul_Buku`, `Pengarang`, `Penerbit`, `Tahun_Terbit`, `Foto`) VALUES
(1, 'Si Kancil', 'Redaksi', 'Griya Pustaka Utama', '2013', '1776918064_kancil.jpg'),
(3, 'Dilan 1990', 'Joko Anwar', 'Tim Dilan ', '2015', '1776918819_dilan.jpg'),
(4, 'One Piece', 'Oda', 'Oda', '2000', '1776918875_op1.jpg'),
(5, 'One Piece Vol 1', 'Oda', 'Oda', '2011', '1776916870_69e9998612404.jpg'),
(6, 'Pulang Pergi', 'Tere Liye', 'Tim Redaksi', '2019', '1779254486_6a0d44d6075e7.jpeg'),
(7, 'Hujan', 'Tere Liye', 'Tim Redaksi', '2019', '1779254625_6a0d4561548f4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `Id_Peminjaman` int(100) NOT NULL,
  `Id_Anggota` int(100) NOT NULL,
  `Id_Buku` int(100) NOT NULL,
  `Tanggal_Pinjam` varchar(100) NOT NULL,
  `Tanggal_Kembali` varchar(100) NOT NULL,
  `Status` enum('Dipinjam','Dikembalikan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`Id_Peminjaman`, `Id_Anggota`, `Id_Buku`, `Tanggal_Pinjam`, `Tanggal_Kembali`, `Status`) VALUES
(1, 1, 1, '2026-05-18', '2026-05-21', 'Dikembalikan'),
(4, 3, 3, '2026-05-19', '', 'Dipinjam'),
(5, 6, 6, '2026-05-19', '2026-05-21', 'Dikembalikan'),
(6, 7, 7, '2026-05-01', '2026-05-21', 'Dikembalikan'),
(7, 4, 4, '2026-05-01', '', 'Dipinjam');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id_User` int(100) NOT NULL,
  `Nama_User` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Role` enum('Admin','Petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id_User`, `Nama_User`, `Email`, `Password`, `Role`) VALUES
(1, 'Pasep', 'Pasep969@gmail.com', '12345', 'Admin'),
(2, 'Fahri', 'Fahrix@gmail.com', '12345', 'Petugas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`Id_Anggota`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`Id_Buku`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`Id_Peminjaman`),
  ADD KEY `Id_Anggota` (`Id_Anggota`),
  ADD KEY `Id_Buku` (`Id_Buku`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id_User`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `Id_Anggota` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `Id_Buku` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `Id_Peminjaman` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id_User` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`Id_Anggota`) REFERENCES `anggota` (`Id_Anggota`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`Id_Buku`) REFERENCES `buku` (`Id_Buku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
