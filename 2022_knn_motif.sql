-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2021 at 05:53 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2022_knn_motif`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengujian`
--

CREATE TABLE `tb_pengujian` (
  `id_pengujian` int(8) NOT NULL,
  `nama_pengujian` varchar(100) NOT NULL,
  `id_toko` varchar(15) NOT NULL,
  `id_user` varchar(15) NOT NULL,
  `p1` int(8) NOT NULL,
  `p2` int(8) NOT NULL,
  `p3` int(8) NOT NULL,
  `p4` int(8) NOT NULL,
  `p5` int(8) NOT NULL,
  `p6` int(8) NOT NULL,
  `p7` int(8) NOT NULL,
  `p8` int(8) NOT NULL,
  `p9` int(8) NOT NULL,
  `p10` int(8) NOT NULL,
  `p11` int(8) NOT NULL,
  `p12` int(8) NOT NULL,
  `jumlah_persediaan` int(8) NOT NULL,
  `rekapitulasi` text NOT NULL,
  `kategori` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengujian`
--

INSERT INTO `tb_pengujian` (`id_pengujian`, `nama_pengujian`, `id_toko`, `id_user`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `p10`, `p11`, `p12`, `jumlah_persediaan`, `rekapitulasi`, `kategori`, `tanggal`, `jam`, `keterangan`) VALUES
(1, 'Pengujian Rutin Bulanan', 'TKO01', 'USR02', 50, 60, 90, 80, 75, 0, 90, 80, 85, 45, 60, 65, 780, '<ol><li>sqrt((50-50)<sup>2</sup>+(60-60)<sup>2</sup>+(90-90)<sup>2</sup>+(80-80)<sup>2</sup>+(75-75)<sup>2</sup>+(70-0)<sup>2</sup>+(90-90)<sup>2</sup>+(80-80)<sup>2</sup>+(85-85)<sup>2</sup>+(45-45)<sup>2</sup>+(60-60)<sup>2</sup>+(65-65)<sup>2</sup>) => sqrt(0+0+0+0+0+4900+0+0+0+0+0+0) => 70 #rendah</li><li>sqrt((25-50)<sup>2</sup>+(45-60)<sup>2</sup>+(60-90)<sup>2</sup>+(90-80)<sup>2</sup>+(80-75)<sup>2</sup>+(85-0)<sup>2</sup>+(60-90)<sup>2</sup>+(65-80)<sup>2</sup>+(75-85)<sup>2</sup>+(60-45)<sup>2</sup>+(65-60)<sup>2</sup>+(95-65)<sup>2</sup>) => sqrt(625+225+900+100+25+7225+900+225+100+225+25+900) => 107.12142642814 #tinggi</li><li>sqrt((85-50)<sup>2</sup>+(60-60)<sup>2</sup>+(110-90)<sup>2</sup>+(65-80)<sup>2</sup>+(75-75)<sup>2</sup>+(80-0)<sup>2</sup>+(70-90)<sup>2</sup>+(85-80)<sup>2</sup>+(80-85)<sup>2</sup>+(90-45)<sup>2</sup>+(90-60)<sup>2</sup>+(80-65)<sup>2</sup>) => sqrt(1225+0+400+225+0+6400+400+25+25+2025+900+225) => 108.85770528539 #sedang</li><li>sqrt((35-50)<sup>2</sup>+(60-60)<sup>2</sup>+(115-90)<sup>2</sup>+(125-80)<sup>2</sup>+(60-75)<sup>2</sup>+(90-0)<sup>2</sup>+(95-90)<sup>2</sup>+(65-80)<sup>2</sup>+(75-85)<sup>2</sup>+(70-45)<sup>2</sup>+(65-60)<sup>2</sup>+(80-65)<sup>2</sup>) => sqrt(225+0+625+2025+225+8100+25+225+100+625+25+225) => 111.46748404804 #rendah</li><li>sqrt((80-50)<sup>2</sup>+(75-60)<sup>2</sup>+(80-90)<sup>2</sup>+(90-80)<sup>2</sup>+(90-75)<sup>2</sup>+(95-0)<sup>2</sup>+(125-90)<sup>2</sup>+(60-80)<sup>2</sup>+(90-85)<sup>2</sup>+(95-45)<sup>2</sup>+(85-60)<sup>2</sup>+(65-65)<sup>2</sup>) => sqrt(900+225+100+100+225+9025+1225+400+25+2500+625+0) => 123.89511693364 #rendah</li></ol>Status Dominan 5 KNN (1:3:1) = <u>RENDAH (101.78753366056)</u>', 'rendah', '2021-12-27', '06:00:55', 'Kategori 5-> rendah : 101.78753366056');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `id_penjualan` int(8) NOT NULL,
  `id_toko` varchar(15) NOT NULL,
  `motif` varchar(30) NOT NULL,
  `p1` int(10) NOT NULL,
  `p2` int(10) NOT NULL,
  `p3` int(10) NOT NULL,
  `p4` int(10) NOT NULL,
  `p5` int(10) NOT NULL,
  `p6` int(10) NOT NULL,
  `p7` int(10) NOT NULL,
  `p8` int(10) NOT NULL,
  `p9` int(10) NOT NULL,
  `p10` int(10) NOT NULL,
  `p11` int(10) NOT NULL,
  `p12` int(10) NOT NULL,
  `jumlah_persediaan` int(10) NOT NULL,
  `kategori` varchar(15) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`id_penjualan`, `id_toko`, `motif`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `p10`, `p11`, `p12`, `jumlah_persediaan`, `kategori`, `keterangan`) VALUES
(1, 'TKO30', 'Sari Gading', 45, 40, 45, 35, 50, 55, 75, 60, 40, 50, 65, 55, 615, 'rendah', '3-Data dari Toko Nayla Sasirangan'),
(2, 'TKO30', 'Kulat Karikit', 40, 35, 45, 60, 55, 50, 65, 75, 70, 65, 60, 45, 665, 'sedang', '2-Data dari Toko Nayla Sasirangan'),
(3, 'TKO30', 'Bintang Berhambur', 45, 55, 60, 65, 65, 60, 50, 50, 45, 55, 55, 60, 665, 'rendah', '3-Data dari Toko Nayla Sasirangan'),
(4, 'TKO30', 'Kangkung Kaombakan', 35, 40, 35, 55, 60, 45, 60, 50, 55, 70, 65, 50, 620, 'sedang', '2-Data dari Toko Nayla Sasirangan'),
(5, 'TKO30', 'Bayam Raja', 50, 45, 50, 60, 65, 55, 50, 60, 50, 75, 45, 65, 670, 'sedang', '2-Data dari Toko Nayla Sasirangan'),
(6, 'TKO30', 'Awan Beriring', 55, 60, 55, 60, 65, 70, 75, 60, 60, 80, 40, 70, 750, 'sedang', '2-Data dari Toko Nayla Sasirangan'),
(7, 'TKO29', 'Sari Gading', 45, 50, 60, 55, 40, 35, 45, 50, 65, 60, 55, 50, 610, 'sedang', '2-Data dari Toko Nirmala Sasirangan'),
(8, 'TKO29', 'Kulat Karikit', 40, 45, 55, 70, 60, 50, 55, 45, 65, 60, 70, 45, 660, 'rendah', '3-Data dari Toko Nirmala Sasirangan'),
(9, 'TKO29', 'Bintang Berhambur', 55, 55, 60, 65, 60, 40, 45, 55, 50, 55, 45, 60, 645, 'sedang', '2-Data dari Toko Nirmala Sasirangan'),
(10, 'TKO29', 'Kangkung Kaombakan', 50, 40, 65, 50, 60, 55, 65, 60, 50, 60, 40, 55, 650, 'sedang', '2-Data dari Toko Nirmala Sasirangan'),
(11, 'TKO29', 'Bayam Raja', 45, 60, 55, 75, 60, 55, 60, 50, 45, 50, 55, 60, 670, 'sedang', '2-Data dari Toko Nirmala Sasirangan'),
(12, 'TKO29', 'Awan Beriring', 35, 45, 40, 55, 65, 60, 65, 70, 75, 45, 60, 75, 690, 'sedang', '2-Data dari Toko Nirmala Sasirangan'),
(13, 'TKO29', 'Sari Gading', 45, 50, 60, 55, 40, 35, 45, 50, 65, 60, 55, 50, 610, 'rendah', '3-Data dari Toko Nirmala Sasirangan'),
(14, 'TKO29', 'Kulat Karikit', 40, 45, 55, 70, 60, 50, 55, 45, 65, 60, 70, 45, 660, 'rendah', '3-Data dari Toko Nirmala Sasirangan'),
(15, 'TKO29', 'Bintang Berhambur', 55, 55, 60, 65, 60, 40, 45, 55, 50, 55, 45, 60, 645, 'sedang', '2-Data dari Toko Nirmala Sasirangan'),
(16, 'TKO29', 'Kangkung Kaombakan', 50, 40, 65, 50, 60, 55, 65, 60, 50, 60, 40, 55, 650, 'sedang', '2-Data dari Toko Nirmala Sasirangan'),
(17, 'TKO29', 'Bayam Raja', 45, 60, 55, 75, 60, 55, 60, 50, 45, 50, 55, 60, 670, 'sedang', '2-Data dari Toko Nirmala Sasirangan'),
(18, 'TKO29', 'Awan Beriring', 35, 45, 40, 55, 65, 60, 65, 70, 75, 45, 60, 75, 690, 'sedang', '2-Data dari Toko Nirmala Sasirangan'),
(19, 'TKO27', 'Sari Gading', 15, 20, 10, 15, 25, 20, 15, 10, 10, 15, 20, 20, 195, 'sedang', '2-Data dari Toko Siska Sasirangan'),
(20, 'TKO27', 'Kulat Karikit', 10, 25, 15, 10, 20, 20, 25, 15, 10, 20, 15, 15, 200, 'sedang', '2-Data dari Toko Siska Sasirangan'),
(21, 'TKO27', 'Bintang Berhambur', 15, 30, 40, 15, 35, 25, 20, 20, 15, 20, 25, 20, 280, 'tinggi', '1-Data dari Toko Siska Sasirangan'),
(22, 'TKO27', 'Kangkung Kaombakan', 20, 15, 30, 20, 30, 25, 30, 25, 20, 25, 20, 25, 285, 'sedang', '2-Data dari Toko Siska Sasirangan'),
(23, 'TKO27', 'Bayam Raja', 20, 20, 35, 25, 35, 30, 35, 25, 20, 30, 35, 20, 330, 'tinggi', '1-Data dari Toko Siska Sasirangan'),
(24, 'TKO27', 'Awan Beriring', 25, 15, 25, 30, 25, 20, 25, 30, 25, 20, 25, 25, 290, 'sedang', '2-Data dari Toko Siska Sasirangan'),
(25, 'TKO26', 'Sari Gading', 45, 60, 65, 75, 85, 90, 70, 65, 55, 65, 50, 45, 770, 'sedang', '2-Data dari Toko Zaidan Sasirangan'),
(26, 'TKO26', 'Kulat Karikit', 40, 55, 50, 60, 75, 65, 80, 85, 60, 80, 55, 55, 760, 'sedang', '2-Data dari Toko Zaidan Sasirangan'),
(27, 'TKO26', 'Bintang Berhambur', 50, 55, 60, 75, 70, 80, 65, 75, 75, 70, 60, 65, 800, 'tinggi', '1-Data dari Toko Zaidan Sasirangan'),
(28, 'TKO26', 'Kangkung Kaombakan', 55, 60, 65, 70, 75, 80, 85, 65, 65, 60, 75, 75, 830, 'tinggi', '1-Data dari Toko Zaidan Sasirangan'),
(29, 'TKO26', 'Bayam Raja', 45, 65, 70, 65, 70, 75, 80, 60, 75, 75, 65, 65, 810, 'sedang', '2-Data dari Toko Zaidan Sasirangan'),
(30, 'TKO26', 'Awan Beriring', 50, 65, 70, 60, 55, 60, 65, 75, 70, 85, 60, 60, 775, 'tinggi', '1-Data dari Toko Zaidan Sasirangan'),
(31, 'TKO25', 'Sari Gading', 85, 75, 70, 60, 65, 85, 80, 75, 70, 80, 60, 65, 870, 'tinggi', '1-Data dari Toko Zahra Sasirangan'),
(32, 'TKO25', 'Kulat Karikit', 60, 55, 60, 75, 70, 80, 85, 90, 65, 70, 80, 75, 865, 'sedang', '2-Data dari Toko Zahra Sasirangan'),
(33, 'TKO25', 'Bintang Berhambur', 75, 80, 75, 80, 85, 90, 70, 65, 65, 70, 75, 80, 910, 'tinggi', '1-Data dari Toko Zahra Sasirangan'),
(34, 'TKO25', 'Kangkung Kaombakan', 45, 55, 60, 55, 65, 60, 70, 70, 75, 80, 75, 85, 795, 'rendah', '3-Data dari Toko Zahra Sasirangan'),
(35, 'TKO25', 'Bayam Raja', 60, 50, 65, 60, 70, 70, 75, 80, 75, 65, 80, 95, 845, 'tinggi', '1-Data dari Toko Zahra Sasirangan'),
(36, 'TKO25', 'Awan Beriring', 55, 60, 65, 70, 65, 65, 70, 75, 80, 80, 75, 70, 830, 'sedang', '2-Data dari Toko Zahra Sasirangan'),
(37, 'TKO24', 'Sari Gading', 105, 75, 80, 90, 95, 115, 205, 145, 160, 95, 90, 120, 1375, 'tinggi', '1-Data dari Toko Yupi Sasirangan'),
(38, 'TKO24', 'Kulat Karikit', 90, 95, 100, 85, 90, 75, 80, 95, 100, 75, 80, 115, 1080, 'sedang', '2-Data dari Toko Yupi Sasirangan'),
(39, 'TKO24', 'Bintang Berhambur', 95, 100, 125, 75, 80, 90, 95, 75, 80, 95, 75, 75, 1060, 'rendah', '3-Data dari Toko Yupi Sasirangan'),
(40, 'TKO24', 'Kangkung Kaombakan', 80, 75, 70, 80, 90, 95, 100, 90, 85, 80, 60, 80, 985, 'rendah', '3-Data dari Toko Yupi Sasirangan'),
(41, 'TKO24', 'Bayam Raja', 100, 125, 90, 95, 75, 70, 90, 85, 90, 100, 90, 90, 1100, 'tinggi', '1-Data dari Toko Yupi Sasirangan'),
(42, 'TKO24', 'Awan Beriring', 80, 75, 80, 90, 95, 75, 70, 80, 95, 105, 95, 75, 1015, 'sedang', '2-Data dari Toko Yupi Sasirangan'),
(43, 'TKO23', 'Sari Gading', 45, 60, 65, 55, 50, 40, 35, 30, 25, 40, 45, 50, 540, 'sedang', '2-Data dari Toko Yono Sasirangan'),
(44, 'TKO23', 'Kulat Karikit', 35, 35, 40, 40, 45, 55, 50, 45, 60, 65, 45, 25, 540, 'rendah', '3-Data dari Toko Yono Sasirangan'),
(45, 'TKO23', 'Bintang Berhambur', 40, 45, 45, 55, 65, 60, 75, 60, 45, 55, 55, 35, 635, 'sedang', '2-Data dari Toko Yono Sasirangan'),
(46, 'TKO23', 'Kangkung Kaombakan', 50, 55, 45, 60, 75, 70, 65, 55, 50, 40, 60, 45, 670, 'tinggi', '1-Data dari Toko Yono Sasirangan'),
(47, 'TKO23', 'Bayam Raja', 65, 50, 45, 60, 75, 60, 65, 75, 60, 45, 65, 40, 705, 'tinggi', '1-Data dari Toko Yono Sasirangan'),
(48, 'TKO23', 'Awan Beriring', 40, 50, 60, 55, 70, 60, 65, 80, 65, 35, 65, 55, 700, 'tinggi', '1-Data dari Toko Yono Sasirangan'),
(49, 'TKO22', 'Sari Gading', 115, 175, 105, 215, 145, 110, 125, 205, 245, 230, 185, 200, 2055, 'sedang', '2-Data dari Toko Diyang Kinjut'),
(50, 'TKO22', 'Kulat Karikit', 275, 235, 115, 105, 125, 205, 215, 105, 245, 175, 180, 175, 2155, 'tinggi', '1-Data dari Toko Diyang Kinjut'),
(51, 'TKO22', 'Bintang Berhambur', 235, 175, 180, 190, 205, 195, 305, 175, 160, 165, 205, 205, 2395, 'tinggi', '1-Data dari Toko Diyang Kinjut'),
(52, 'TKO22', 'Kangkung Kaombakan', 180, 205, 175, 155, 160, 185, 170, 190, 185, 205, 303, 125, 2238, 'sedang', '2-Data dari Toko Diyang Kinjut'),
(53, 'TKO22', 'Bayam Raja', 165, 175, 180, 145, 160, 155, 175, 180, 165, 175, 195, 170, 2040, 'rendah', '3-Data dari Toko Diyang Kinjut'),
(54, 'TKO22', 'Awan Beriring', 205, 180, 195, 200, 215, 235, 205, 205, 145, 125, 205, 155, 2270, 'tinggi', '1-Data dari Toko Diyang Kinjut'),
(55, 'TKO21', 'Sari Gading', 35, 45, 40, 55, 45, 30, 25, 45, 50, 60, 75, 60, 565, 'tinggi', '1-Data dari Toko Yaya Sasirangan'),
(56, 'TKO21', 'Kulat Karikit', 15, 20, 45, 30, 35, 40, 25, 65, 55, 50, 45, 55, 480, 'sedang', '2-Data dari Toko Yaya Sasirangan'),
(57, 'TKO21', 'Bintang Berhambur', 20, 15, 25, 30, 45, 55, 60, 55, 45, 25, 20, 45, 440, 'tinggi', '1-Data dari Toko Yaya Sasirangan'),
(58, 'TKO21', 'Kangkung Kaombakan', 25, 25, 15, 20, 25, 45, 40, 15, 35, 25, 40, 60, 370, 'sedang', '2-Data dari Toko Yaya Sasirangan'),
(59, 'TKO21', 'Bayam Raja', 30, 30, 25, 20, 30, 35, 45, 40, 55, 30, 35, 65, 440, 'rendah', '3-Data dari Toko Yaya Sasirangan'),
(60, 'TKO21', 'Awan Beriring', 35, 15, 25, 35, 40, 45, 45, 35, 45, 45, 30, 45, 440, 'rendah', '3-Data dari Toko Yaya Sasirangan'),
(61, 'TKO20', 'Sari Gading', 10, 15, 5, 20, 25, 15, 10, 5, 20, 10, 10, 15, 160, 'tinggi', '1-Data dari Toko Budi Sasirangan'),
(62, 'TKO20', 'Kulat Karikit', 5, 15, 20, 5, 5, 25, 30, 15, 10, 5, 5, 10, 150, 'sedang', '2-Data dari Toko Budi Sasirangan'),
(63, 'TKO20', 'Bintang Berhambur', 10, 15, 10, 5, 10, 5, 5, 30, 5, 5, 10, 20, 130, 'sedang', '2-Data dari Toko Budi Sasirangan'),
(64, 'TKO20', 'Kangkung Kaombakan', 15, 5, 5, 10, 5, 10, 10, 5, 15, 10, 15, 15, 120, 'rendah', '3-Data dari Toko Budi Sasirangan'),
(65, 'TKO20', 'Bayam Raja', 15, 10, 5, 5, 10, 15, 20, 25, 5, 10, 10, 25, 155, 'rendah', '3-Data dari Toko Budi Sasirangan'),
(66, 'TKO20', 'Awan Beriring', 5, 10, 5, 5, 20, 5, 15, 10, 5, 10, 5, 5, 100, 'rendah', '3-Data dari Toko Budi Sasirangan'),
(67, 'TKO19', 'Sari Gading', 95, 45, 60, 95, 105, 90, 95, 45, 60, 70, 85, 80, 925, 'tinggi', '1-Data dari Toko Firdaus Sasirangan'),
(68, 'TKO19', 'Kulat Karikit', 60, 105, 75, 80, 95, 70, 85, 65, 65, 90, 65, 55, 910, 'tinggi', '1-Data dari Toko Firdaus Sasirangan'),
(69, 'TKO19', 'Bintang Berhambur', 90, 200, 45, 60, 90, 95, 75, 60, 70, 65, 70, 60, 980, 'tinggi', '1-Data dari Toko Firdaus Sasirangan'),
(70, 'TKO19', 'Kangkung Kaombakan', 95, 90, 65, 70, 85, 95, 75, 75, 95, 85, 90, 90, 1010, 'tinggi', '1-Data dari Toko Firdaus Sasirangan'),
(71, 'TKO19', 'Bayam Raja', 75, 45, 60, 65, 85, 95, 95, 70, 90, 90, 85, 80, 935, 'sedang', '2-Data dari Toko Firdaus Sasirangan'),
(72, 'TKO19', 'Awan Beriring', 70, 45, 60, 90, 55, 60, 90, 45, 85, 60, 70, 85, 815, 'sedang', '2-Data dari Toko Firdaus Sasirangan'),
(73, 'TKO18', 'Sari Gading', 25, 30, 45, 40, 45, 50, 55, 45, 40, 35, 25, 30, 465, 'tinggi', '1-Data dari Toko Rubiah Sasirangan'),
(74, 'TKO18', 'Kulat Karikit', 30, 45, 35, 40, 25, 20, 20, 30, 35, 40, 25, 20, 365, 'rendah', '3-Data dari Toko Rubiah Sasirangan'),
(75, 'TKO18', 'Bintang Berhambur', 25, 25, 35, 30, 45, 40, 25, 30, 35, 35, 45, 25, 395, 'rendah', '3-Data dari Toko Rubiah Sasirangan'),
(76, 'TKO18', 'Kangkung Kaombakan', 45, 30, 40, 40, 45, 35, 40, 45, 40, 35, 40, 45, 480, 'tinggi', '1-Data dari Toko Rubiah Sasirangan'),
(77, 'TKO18', 'Bayam Raja', 40, 45, 25, 25, 40, 35, 30, 40, 25, 40, 40, 40, 425, 'tinggi', '1-Data dari Toko Rubiah Sasirangan'),
(78, 'TKO18', 'Awan Beriring', 25, 35, 55, 20, 55, 20, 25, 35, 25, 25, 35, 35, 390, 'sedang', '2-Data dari Toko Rubiah Sasirangan'),
(79, 'TKO17', 'Sari Gading', 25, 20, 20, 15, 25, 15, 30, 25, 30, 15, 30, 25, 275, 'rendah', '3-Data dari Toko Roos Sasirangan'),
(80, 'TKO17', 'Kulat Karikit', 15, 25, 25, 30, 35, 30, 45, 40, 35, 30, 25, 20, 355, 'sedang', '2-Data dari Toko Roos Sasirangan'),
(81, 'TKO17', 'Bintang Berhambur', 20, 15, 15, 10, 25, 20, 25, 30, 35, 20, 25, 15, 255, 'rendah', '3-Data dari Toko Roos Sasirangan'),
(82, 'TKO17', 'Kangkung Kaombakan', 25, 20, 15, 25, 20, 20, 30, 35, 20, 40, 45, 40, 335, 'tinggi', '1-Data dari Toko Roos Sasirangan'),
(83, 'TKO17', 'Bayam Raja', 15, 15, 25, 65, 45, 30, 30, 55, 35, 40, 25, 35, 415, 'tinggi', '1-Data dari Toko Roos Sasirangan'),
(84, 'TKO17', 'Awan Beriring', 15, 20, 35, 45, 40, 35, 30, 25, 25, 15, 20, 25, 330, 'tinggi', '1-Data dari Toko Roos Sasirangan'),
(85, 'TKO16', 'Sari Gading', 15, 30, 25, 20, 45, 40, 35, 30, 15, 25, 30, 25, 335, 'tinggi', '1-Data dari Toko Putri Sasirangan'),
(86, 'TKO16', 'Kulat Karikit', 20, 15, 30, 35, 25, 20, 15, 40, 5, 10, 20, 15, 250, 'sedang', '2-Data dari Toko Putri Sasirangan'),
(87, 'TKO16', 'Bintang Berhambur', 10, 5, 15, 10, 35, 20, 25, 20, 35, 25, 35, 25, 260, 'rendah', '3-Data dari Toko Putri Sasirangan'),
(88, 'TKO16', 'Kangkung Kaombakan', 15, 10, 5, 15, 10, 25, 20, 10, 25, 40, 30, 5, 210, 'rendah', '3-Data dari Toko Putri Sasirangan'),
(89, 'TKO16', 'Bayam Raja', 25, 25, 10, 25, 5, 20, 15, 10, 20, 15, 45, 15, 230, 'sedang', '2-Data dari Toko Putri Sasirangan'),
(90, 'TKO16', 'Awan Beriring', 20, 30, 25, 15, 20, 10, 5, 15, 20, 25, 20, 20, 225, 'sedang', '2-Data dari Toko Putri Sasirangan'),
(91, 'TKO15', 'Sari Gading', 55, 45, 60, 90, 50, 65, 60, 95, 75, 80, 85, 65, 825, 'sedang', '2-Data dari Toko Lina Sasirangan'),
(92, 'TKO15', 'Kulat Karikit', 45, 60, 55, 45, 35, 40, 55, 60, 90, 65, 75, 55, 680, 'sedang', '2-Data dari Toko Lina Sasirangan'),
(93, 'TKO15', 'Bintang Berhambur', 60, 55, 60, 45, 65, 75, 70, 80, 85, 95, 90, 40, 820, 'sedang', '2-Data dari Toko Lina Sasirangan'),
(94, 'TKO15', 'Kangkung Kaombakan', 75, 60, 55, 75, 70, 90, 85, 70, 75, 65, 60, 90, 870, 'tinggi', '1-Data dari Toko Lina Sasirangan'),
(95, 'TKO15', 'Bayam Raja', 60, 55, 45, 60, 75, 80, 95, 85, 60, 75, 90, 95, 875, 'rendah', '3-Data dari Toko Lina Sasirangan'),
(96, 'TKO15', 'Awan Beriring', 50, 45, 55, 60, 75, 60, 90, 65, 55, 75, 75, 65, 770, 'rendah', '3-Data dari Toko Lina Sasirangan'),
(97, 'TKO14', 'Sari Gading', 55, 60, 90, 95, 60, 80, 75, 60, 75, 45, 55, 65, 815, 'tinggi', '1-Data dari Toko Koprinka Sasirangan Bayam Raja'),
(98, 'TKO14', 'Kulat Karikit', 45, 60, 65, 60, 70, 85, 75, 55, 90, 65, 75, 60, 805, 'tinggi', '1-Data dari Toko Koprinka Sasirangan Bayam Raja'),
(99, 'TKO14', 'Bintang Berhambur', 55, 60, 90, 80, 85, 65, 60, 75, 70, 90, 65, 90, 885, 'sedang', '2-Data dari Toko Koprinka Sasirangan Bayam Raja'),
(100, 'TKO14', 'Kangkung Kaombakan', 60, 95, 65, 45, 60, 75, 70, 85, 75, 45, 60, 95, 830, 'rendah', '3-Data dari Toko Koprinka Sasirangan Bayam Raja'),
(101, 'TKO14', 'Bayam Raja', 75, 65, 60, 70, 80, 90, 85, 60, 90, 55, 90, 60, 880, 'tinggi', '1-Data dari Toko Koprinka Sasirangan Bayam Raja'),
(102, 'TKO14', 'Awan Beriring', 45, 60, 95, 45, 60, 95, 85, 80, 65, 60, 75, 75, 840, 'sedang', '2-Data dari Toko Koprinka Sasirangan Bayam Raja'),
(103, 'TKO13', 'Sari Gading', 95, 65, 70, 90, 75, 60, 85, 65, 70, 90, 85, 55, 905, 'tinggi', '1-Data dari Toko Ferri Sasirangan'),
(104, 'TKO13', 'Kulat Karikit', 45, 50, 55, 60, 90, 85, 60, 75, 90, 75, 45, 75, 805, 'rendah', '3-Data dari Toko Ferri Sasirangan'),
(105, 'TKO13', 'Bintang Berhambur', 60, 90, 45, 65, 55, 70, 90, 75, 70, 45, 60, 90, 815, 'sedang', '2-Data dari Toko Ferri Sasirangan'),
(106, 'TKO13', 'Kangkung Kaombakan', 90, 95, 60, 85, 60, 75, 50, 45, 85, 50, 90, 60, 845, 'tinggi', '1-Data dari Toko Ferri Sasirangan'),
(107, 'TKO13', 'Bayam Raja', 65, 60, 55, 60, 45, 65, 70, 65, 90, 90, 95, 85, 845, 'tinggi', '1-Data dari Toko Ferri Sasirangan'),
(108, 'TKO13', 'Awan Beriring', 45, 65, 60, 55, 60, 90, 85, 50, 60, 65, 75, 90, 800, 'sedang', '2-Data dari Toko Ferri Sasirangan'),
(109, 'TKO12', 'Sari Gading', 55, 60, 90, 95, 65, 45, 55, 60, 75, 70, 80, 85, 835, 'tinggi', '1-Data dari Toko Damayanti Sasirangan'),
(110, 'TKO12', 'Kulat Karikit', 60, 90, 80, 45, 55, 65, 75, 70, 90, 65, 60, 60, 815, 'rendah', '3-Data dari Toko Damayanti Sasirangan'),
(111, 'TKO12', 'Bintang Berhambur', 35, 60, 75, 70, 90, 95, 75, 80, 65, 70, 45, 90, 850, 'sedang', '2-Data dari Toko Damayanti Sasirangan'),
(112, 'TKO12', 'Kangkung Kaombakan', 50, 75, 65, 50, 55, 75, 60, 55, 35, 45, 55, 85, 705, 'sedang', '2-Data dari Toko Damayanti Sasirangan'),
(113, 'TKO12', 'Bayam Raja', 60, 60, 90, 45, 55, 60, 55, 60, 55, 55, 70, 65, 730, 'rendah', '3-Data dari Toko Damayanti Sasirangan'),
(114, 'TKO12', 'Awan Beriring', 70, 65, 45, 55, 70, 95, 45, 90, 45, 60, 90, 55, 785, 'rendah', '3-Data dari Toko Damayanti Sasirangan'),
(115, 'TKO11', 'Sari Gading', 45, 40, 35, 60, 65, 70, 80, 75, 65, 45, 55, 60, 695, 'rendang', '3-Data dari Toko Ciptasari Sasirangan'),
(116, 'TKO11', 'Kulat Karikit', 30, 35, 40, 90, 85, 65, 60, 75, 45, 60, 45, 75, 705, 'rendah', '3-Data dari Toko Ciptasari Sasirangan'),
(117, 'TKO11', 'Bintang Berhambur', 55, 55, 45, 50, 75, 60, 75, 50, 55, 45, 60, 60, 685, 'rendah', '2-Data dari Toko Ciptasari Sasirangan'),
(118, 'TKO11', 'Kangkung Kaombakan', 60, 35, 45, 55, 50, 45, 50, 65, 45, 55, 75, 65, 645, 'sedang', '2-Data dari Toko Ciptasari Sasirangan'),
(119, 'TKO11', 'Bayam Raja', 45, 60, 70, 85, 70, 75, 70, 45, 65, 60, 85, 80, 810, 'tinggi', '1-Data dari Toko Ciptasari Sasirangan'),
(120, 'TKO11', 'Awan Beriring', 35, 45, 60, 90, 95, 60, 65, 60, 30, 35, 90, 55, 720, 'tinggi', '1-Data dari Toko Ciptasari Sasirangan'),
(121, 'TKO10', 'Sari Gading', 50, 45, 60, 80, 90, 70, 75, 60, 90, 80, 85, 55, 840, 'sedang', '2-Data dari Toko Amay Sasirangan'),
(122, 'TKO10', 'Kulat Karikit', 45, 60, 55, 60, 65, 80, 85, 60, 80, 60, 80, 90, 820, 'tinggi', '1-Data dari Toko Amay Sasirangan'),
(123, 'TKO10', 'Bintang Berhambur', 55, 70, 60, 70, 55, 65, 75, 65, 55, 70, 55, 60, 755, 'tinggi', '1-Data dari Toko Amay Sasirangan'),
(124, 'TKO10', 'Kangkung Kaombakan', 30, 65, 70, 95, 60, 55, 60, 55, 45, 75, 40, 80, 730, 'rendah', '3-Data dari Toko Amay Sasirangan'),
(125, 'TKO10', 'Bayam Raja', 90, 60, 75, 115, 50, 50, 75, 60, 30, 55, 35, 75, 770, 'sedang', '2-Data dari Toko Amay Sasirangan'),
(126, 'TKO10', 'Awan Beriring', 80, 55, 65, 75, 90, 70, 90, 80, 70, 45, 80, 60, 860, 'tinggi', '1-Data dari Toko Amay Sasirangan'),
(127, 'TKO09', 'Sari Gading', 5, 25, 45, 30, 55, 25, 20, 15, 5, 15, 10, 20, 270, 'sedang', '2-Data dari Toko Nia Sasirangan '),
(128, 'TKO09', 'Kulat Karikit', 10, 20, 15, 5, 25, 35, 30, 45, 30, 25, 15, 25, 280, 'tinggi', '1-Data dari Toko Nia Sasirangan '),
(129, 'TKO09', 'Bintang Berhambur', 25, 15, 25, 45, 5, 25, 45, 55, 60, 15, 5, 55, 375, 'tinggi', '1-Data dari Toko Nia Sasirangan '),
(130, 'TKO09', 'Kangkung Kaombakan', 45, 5, 15, 10, 10, 15, 5, 35, 20, 45, 45, 40, 290, 'rendah', '3-Data dari Toko Nia Sasirangan '),
(131, 'TKO09', 'Bayam Raja', 55, 45, 45, 25, 15, 20, 30, 45, 20, 20, 55, 35, 410, 'rendah', '3-Data dari Toko Nia Sasirangan '),
(132, 'TKO09', 'Awan Beriring', 20, 40, 55, 45, 25, 20, 35, 45, 55, 25, 25, 15, 405, 'sedang', '2-Data dari Toko Nia Sasirangan '),
(133, 'TKO08', 'Sari Gading', 15, 5, 10, 25, 20, 15, 5, 10, 10, 20, 25, 15, 175, 'rendah', '3-Data dari Toko Rahman Sasirangan '),
(134, 'TKO08', 'Kulat Karikit', 10, 15, 5, 10, 20, 25, 15, 10, 15, 5, 10, 10, 150, 'rendah', '3-Data dari Toko Rahman Sasirangan '),
(135, 'TKO08', 'Bintang Berhambur', 5, 30, 35, 40, 55, 40, 15, 5, 25, 25, 15, 15, 305, 'sedang', '2-Data dari Toko Rahman Sasirangan '),
(136, 'TKO08', 'Kangkung Kaombakan', 10, 15, 20, 20, 25, 30, 35, 40, 15, 20, 5, 5, 240, 'rendah', '3-Data dari Toko Rahman Sasirangan '),
(137, 'TKO08', 'Bayam Raja', 15, 20, 25, 40, 35, 25, 15, 25, 20, 45, 5, 20, 290, 'sedang', '2-Data dari Toko Rahman Sasirangan '),
(138, 'TKO08', 'Awan Beriring', 30, 25, 30, 35, 40, 25, 20, 20, 10, 40, 10, 35, 320, 'sedang', '2-Data dari Toko Rahman Sasirangan '),
(139, 'TKO07', 'Sari Gading', 45, 60, 10, 45, 55, 45, 40, 70, 75, 60, 65, 45, 615, 'sedang', '2-Data dari Toko Sasirangan Kayuh Baimbai'),
(140, 'TKO07', 'Kulat Karikit', 15, 25, 20, 45, 40, 60, 65, 45, 30, 35, 15, 55, 450, 'rendah', '3-Data dari Toko Sasirangan Kayuh Baimbai'),
(141, 'TKO07', 'Bintang Berhambur', 10, 10, 25, 60, 85, 60, 75, 45, 35, 30, 25, 60, 520, 'rendah', '3-Data dari Toko Sasirangan Kayuh Baimbai'),
(142, 'TKO07', 'Kangkung Kaombakan', 25, 35, 45, 45, 45, 60, 55, 50, 90, 45, 20, 90, 605, 'rendah', '3-Data dari Toko Sasirangan Kayuh Baimbai'),
(143, 'TKO07', 'Bayam Raja', 25, 40, 40, 50, 30, 90, 85, 60, 65, 55, 15, 80, 635, 'rendah', '3-Data dari Toko Sasirangan Kayuh Baimbai'),
(144, 'TKO07', 'Awan Beriring', 30, 45, 25, 90, 4560, 55, 90, 85, 55, 15, 10, 85, 5145, 'tinggi', '1-Data dari Toko Sasirangan Kayuh Baimbai'),
(145, 'TKO06', 'Sari Gading', 25, 45, 60, 90, 90, 80, 85, 60, 65, 110, 95, 45, 850, 'tinggi', '1-Data dari Toko Iwan Sasirangan'),
(146, 'TKO06', 'Kulat Karikit', 60, 80, 65, 80, 90, 90, 95, 70, 75, 45, 60, 55, 865, 'tinggi', '1-Data dari Toko Iwan Sasirangan'),
(147, 'TKO06', 'Bintang Berhambur', 45, 90, 80, 55, 60, 90, 80, 85, 60, 65, 95, 60, 865, 'tinggi', '1-Data dari Toko Iwan Sasirangan'),
(148, 'TKO06', 'Kangkung Kaombakan', 60, 85, 90, 45, 60, 80, 90, 95, 65, 55, 115, 75, 915, 'tinggi', '1-Data dari Toko Iwan Sasirangan'),
(149, 'TKO06', 'Bayam Raja', 90, 70, 85, 45, 65, 40, 25, 20, 45, 45, 110, 80, 720, 'rendah', '3-Data dari Toko Iwan Sasirangan'),
(150, 'TKO06', 'Awan Beriring', 80, 75, 45, 15, 65, 90, 125, 95, 60, 60, 80, 90, 880, 'sedang', '2-Data dari Toko Iwan Sasirangan'),
(151, 'TKO01', 'Sari Gading', 50, 60, 90, 80, 75, 70, 90, 80, 85, 45, 60, 65, 850, 'rendah', '3-Data dari Toko Citra Sasirangan'),
(152, 'TKO01', 'Kulat Karikit', 45, 60, 90, 80, 75, 120, 115, 45, 60, 95, 65, 70, 920, 'rendah', '3-Data dari Toko Citra Sasirangan'),
(153, 'TKO01', 'Bintang Berhambur', 35, 60, 115, 125, 60, 90, 95, 65, 75, 70, 65, 80, 935, 'rendah', '3-Data dari Toko Citra Sasirangan'),
(154, 'TKO01', 'Kangkung Kaombakan', 80, 75, 80, 90, 90, 95, 125, 60, 90, 95, 85, 65, 1030, 'rendah', '3-Data dari Toko Citra Sasirangan'),
(155, 'TKO01', 'Bayam Raja', 90, 65, 45, 120, 90, 90, 115, 50, 90, 95, 80, 90, 1020, 'rendah', '3-Data dari Toko Citra Sasirangan'),
(156, 'TKO01', 'Awan Beriring', 85, 60, 110, 65, 75, 80, 70, 85, 80, 90, 90, 80, 970, 'sedang', '2-Data dari Toko Citra Sasirangan'),
(157, 'TKO01', 'Sari Gading', 25, 45, 60, 90, 80, 85, 60, 65, 75, 60, 65, 95, 805, 'tinggi', '1-Data dari Toko Irma Sasirangan'),
(158, 'TKO01', 'Kulat Karikit', 35, 45, 70, 80, 75, 60, 90, 15, 15, 20, 25, 40, 570, 'sedang', '2-Data dari Toko Irma Sasirangan'),
(159, 'TKO01', 'Bintang Berhambur', 25, 20, 30, 15, 20, 25, 15, 10, 15, 25, 30, 45, 275, 'rendah', '3-Data dari Toko Irma Sasirangan'),
(160, 'TKO01', 'Kangkung Kaombakan', 15, 20, 25, 15, 10, 5, 10, 10, 5, 15, 20, 20, 170, 'rendah', '3-Data dari Toko Irma Sasirangan'),
(161, 'TKO01', 'Bayam Raja', 10, 5, 10, 15, 15, 25, 60, 20, 15, 10, 25, 25, 235, 'rendah', '3-Data dari Toko Irma Sasirangan'),
(162, 'TKO01', 'Awan Beriring', 35, 15, 20, 30, 35, 15, 30, 10, 5, 15, 10, 15, 235, 'rendah', '3-Data dari Toko Irma Sasirangan'),
(163, 'TKO03', 'Sari Gading', 20, 25, 45, 40, 30, 35, 15, 60, 90, 80, 70, 60, 570, 'tinggi', '1-Data dari Toko Sahabat Sasirangan'),
(164, 'TKO03', 'Kulat Karikit', 15, 20, 35, 60, 80, 90, 90, 80, 60, 50, 60, 70, 710, 'rendah', '3-Data dari Toko Sahabat Sasirangan'),
(165, 'TKO03', 'Bintang Berhambur', 45, 60, 90, 80, 80, 70, 45, 60, 80, 90, 60, 50, 810, 'sedang', '2-Data dari Toko Sahabat Sasirangan'),
(166, 'TKO03', 'Kangkung Kaombakan', 25, 55, 45, 50, 80, 60, 70, 60, 50, 50, 35, 60, 640, 'rendah', '3-Data dari Toko Sahabat Sasirangan'),
(167, 'TKO03', 'Bayam Raja', 15, 45, 35, 30, 15, 25, 45, 60, 80, 70, 90, 45, 555, 'tinggi', '1-Data dari Toko Sahabat Sasirangan'),
(168, 'TKO03', 'Awan Beriring', 45, 60, 90, 80, 85, 65, 70, 80, 80, 45, 25, 55, 780, 'sedang', '2-Data dari Toko Sahabat Sasirangan'),
(169, 'TKO02', 'Sari Gading', 40, 50, 60, 40, 60, 80, 80, 100, 80, 60, 75, 45, 770, 'rendah', '3-Data dari Toko Ady Sasirangan'),
(170, 'TKO02', 'Kulat Karikit', 60, 50, 55, 25, 70, 90, 70, 40, 30, 60, 85, 30, 665, 'sedang', '2-Data dari Toko Ady Sasirangan'),
(171, 'TKO02', 'Bintang Berhambur', 25, 60, 40, 50, 30, 45, 85, 60, 80, 120, 50, 50, 695, 'tinggi', '1-Data dari Toko Ady Sasirangan'),
(172, 'TKO02', 'Kangkung Kaombakan', 45, 40, 60, 30, 25, 50, 50, 80, 70, 60, 95, 60, 665, 'rendah', '2-Data dari Toko Ady Sasirangan'),
(173, 'TKO02', 'Bayam Raja', 50, 45, 80, 50, 55, 25, 75, 60, 60, 40, 60, 90, 690, 'rendah', '3-Data dari Toko Ady Sasirangan'),
(174, 'TKO02', 'Awan Beriring', 60, 35, 40, 60, 80, 60, 40, 50, 40, 70, 80, 60, 675, 'sedang', '2-Data dari Toko Ady Sasirangan'),
(175, 'TKO01', 'Sari Gading', 40, 60, 40, 20, 40, 20, 50, 20, 40, 60, 80, 20, 490, 'tinggi', '1-Data dari Toko Benny Sasirangan'),
(176, 'TKO01', 'Kulat Karikit', 20, 40, 60, 40, 20, 30, 20, 10, 20, 40, 40, 30, 370, 'sedang', '2-Data dari Toko Benny Sasirangan'),
(177, 'TKO01', 'Bintang Berhambur', 40, 20, 40, 60, 10, 50, 50, 40, 20, 20, 40, 50, 440, 'tinggi', '1-Data dari Toko Benny Sasirangan'),
(178, 'TKO01', 'Kangkung Kaombakan', 20, 40, 20, 20, 40, 40, 25, 20, 60, 80, 40, 20, 425, 'sedang', '2-Data dari Toko Benny Sasirangan'),
(179, 'TKO01', 'Bayam Raja', 20, 20, 40, 15, 50, 40, 20, 20, 40, 50, 10, 60, 385, 'rendah', '3-Data dari Toko Benny Sasirangan'),
(180, 'TKO01', 'Awan Beriring', 40, 60, 15, 40, 20, 20, 15, 30, 80, 45, 25, 40, 430, 'tinggi', '1-Data dari Toko Benny Sasirangan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_toko`
--

CREATE TABLE `tb_toko` (
  `id_toko` varchar(15) NOT NULL,
  `nama_toko` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_toko`
--

INSERT INTO `tb_toko` (`id_toko`, `nama_toko`, `deskripsi`) VALUES
('TKO01', 'Benny Sasirangan', ''),
('TKO02', 'Ady Sasirangan ', ''),
('TKO03', 'Sahabat Sasirangan', ''),
('TKO04', 'Irma Sasisarangan', ''),
('TKO05', 'Citra Sasisarangan', ''),
('TKO06', 'Iwan Sasirangan', ''),
('TKO07', 'Sasirangan Kayuh Baimbai', ''),
('TKO08', 'Rahman Sasirangan ', ''),
('TKO09', 'Nia Sasirangan', ''),
('TKO10', 'Amay Sasirangan', ''),
('TKO11', 'Ciptasari Sasirangan', ''),
('TKO12', 'Damayanti Sasirangan', ''),
('TKO13', 'Ferri Sasirangan', ''),
('TKO14', 'Koprinka Sasirangan Bayam Raja', ''),
('TKO15', 'Lina Sasirangan', ''),
('TKO16', 'Putri Sasirangan', ''),
('TKO17', 'Roos Sasirangan', ''),
('TKO18', 'Rubiah Sasirangan', ''),
('TKO19', 'Firdaus Sasirangan', ''),
('TKO20', 'Budi Sasirangan', ''),
('TKO21', 'Yaya Sasirangan', ''),
('TKO22', 'Diyang Kinjut', ''),
('TKO23', 'Yono Sasirangan', ''),
('TKO24', 'Yupi Sasirangan', ''),
('TKO25', 'Zahra Sasirangan', ''),
('TKO26', 'Zaidan Sasirangan', ''),
('TKO27', 'Siska Sasirangan', ''),
('TKO28', 'Mawar Sasirangan', ''),
('TKO29', 'Nirmala Sasirangan', ''),
('TKO30', 'Nayla Sasirangan', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(15) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `email`, `telepon`, `username`, `password`, `level`, `status`, `keterangan`) VALUES
('USR01', 'Admin Utama', 'adsam@gmail.com', '08973653432', 'a', 'a', 'Super Admin', 'Aktif', 'Admin Utama'),
('USR02', 'Kim Tae Hee', 'ccsa6789@gmail.com', '082111476069', 'p1', '123', 'Staf Admin', 'Aktif', 'Pengguna baik'),
('USR03', 'Shin Min Ah, SKOM', 'ccsa6789@gmail.com', '082111476069', 'p2', '123', 'Staf Admin', 'Aktif', 'Pengguna Baik'),
('USR04', 'Kim Hyun Joo', 'ccsa6789@gmail.com', '082111476069', 'p3', '123', 'Staf Admin', ' Tidak Aktif', 'Pengguna baik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_pengujian`
--
ALTER TABLE `tb_pengujian`
  ADD PRIMARY KEY (`id_pengujian`);

--
-- Indexes for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `tb_toko`
--
ALTER TABLE `tb_toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_pengujian`
--
ALTER TABLE `tb_pengujian`
  MODIFY `id_pengujian` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `id_penjualan` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
