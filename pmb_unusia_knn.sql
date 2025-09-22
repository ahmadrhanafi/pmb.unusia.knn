-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Sep 2025 pada 16.20
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pmb_unusia_knn`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengujian`
--

CREATE TABLE `tb_pengujian` (
  `id_pengujian` int(8) NOT NULL,
  `nama_pengujian` varchar(100) NOT NULL,
  `id_tahun` varchar(15) NOT NULL,
  `id_user` varchar(15) NOT NULL,
  `jalur_pendaftaran` int(8) NOT NULL,
  `gelombang` int(8) NOT NULL,
  `sistem_kuliah` int(8) NOT NULL,
  `jenis_kelamin` int(8) NOT NULL,
  `nilai_lulusan` int(8) NOT NULL,
  `tahun_lulus` int(8) NOT NULL,
  `jenjang_pendidikan` int(8) NOT NULL,
  `jurusan_sekolah` int(8) NOT NULL,
  `tanggal_daftar` int(8) NOT NULL,
  `prodi_diterima` int(8) NOT NULL,
  `jenis_institusi` int(8) NOT NULL,
  `provinsi_institusi` int(8) NOT NULL,
  `jumlah` int(8) NOT NULL,
  `rekapitulasi` text NOT NULL,
  `kategori` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pengujian`
--

INSERT INTO `tb_pengujian` (`id_pengujian`, `nama_pengujian`, `id_tahun`, `id_user`, `jalur_pendaftaran`, `gelombang`, `sistem_kuliah`, `jenis_kelamin`, `nilai_lulusan`, `tahun_lulus`, `jenjang_pendidikan`, `jurusan_sekolah`, `tanggal_daftar`, `prodi_diterima`, `jenis_institusi`, `provinsi_institusi`, `jumlah`, `rekapitulasi`, `kategori`, `tanggal`, `jam`, `keterangan`) VALUES
(1, 'Pengujian Rutin Bulanan', 'TKO01', 'USR02', 50, 60, 90, 80, 75, 0, 85, 45, 60, 65, 80, 90, 780, '<ol><li>sqrt((50-50)&lt;sup&gt;2&lt;/sup&gt;+(45-60)&lt;sup&gt;2&lt;/sup&gt;+(80-90)&lt;sup&gt;2&lt;/sup&gt;+(50-80)&lt;sup&gt;2&lt;/sup&gt;+(55-75)&lt;sup&gt;2&lt;/sup&gt;+(25-0)&lt;sup&gt;2&lt;/sup&gt;+(75-90)&lt;sup&gt;2&lt;/sup&gt;+(60-80)&lt;sup&gt;2&lt;/sup&gt;+(60-85)&lt;sup&gt;2&lt;/sup&gt;+(40-45)&lt;sup&gt;2&lt;/sup&gt;+(60-60)&lt;sup&gt;2&lt;/sup&gt;+(90-65)&lt;sup&gt;2&lt;/sup&gt;) => sqrt(0+225+100+900+400+625+225+400+625+25+0+625) => 64.420493633626 #rendah</li><li>sqrt((50-50)&lt;sup&gt;2&lt;/sup&gt;+(60-60)&lt;sup&gt;2&lt;/sup&gt;+(90-90)&lt;sup&gt;2&lt;/sup&gt;+(80-80)&lt;sup&gt;2&lt;/sup&gt;+(75-75)&lt;sup&gt;2&lt;/sup&gt;+(70-0)&lt;sup&gt;2&lt;/sup&gt;+(90-90)&lt;sup&gt;2&lt;/sup&gt;+(80-80)&lt;sup&gt;2&lt;/sup&gt;+(85-85)&lt;sup&gt;2&lt;/sup&gt;+(45-45)&lt;sup&gt;2&lt;/sup&gt;+(60-60)&lt;sup&gt;2&lt;/sup&gt;+(65-65)&lt;sup&gt;2&lt;/sup&gt;) => sqrt(0+0+0+0+0+4900+0+0+0+0+0+0) => 70 #rendah</li><li>sqrt((55-50)&lt;sup&gt;2&lt;/sup&gt;+(60-60)&lt;sup&gt;2&lt;/sup&gt;+(90-90)&lt;sup&gt;2&lt;/sup&gt;+(95-80)&lt;sup&gt;2&lt;/sup&gt;+(65-75)&lt;sup&gt;2&lt;/sup&gt;+(45-0)&lt;sup&gt;2&lt;/sup&gt;+(55-90)&lt;sup&gt;2&lt;/sup&gt;+(60-80)&lt;sup&gt;2&lt;/sup&gt;+(75-85)&lt;sup&gt;2&lt;/sup&gt;+(70-45)&lt;sup&gt;2&lt;/sup&gt;+(80-60)&lt;sup&gt;2&lt;/sup&gt;+(85-65)&lt;sup&gt;2&lt;/sup&gt;) => sqrt(25+0+0+225+100+2025+1225+400+100+625+400+400) => 74.330343736593 #tinggi</li><li>sqrt((45-50)&lt;sup&gt;2&lt;/sup&gt;+(60-60)&lt;sup&gt;2&lt;/sup&gt;+(90-90)&lt;sup&gt;2&lt;/sup&gt;+(80-80)&lt;sup&gt;2&lt;/sup&gt;+(85-75)&lt;sup&gt;2&lt;/sup&gt;+(65-0)&lt;sup&gt;2&lt;/sup&gt;+(70-90)&lt;sup&gt;2&lt;/sup&gt;+(80-80)&lt;sup&gt;2&lt;/sup&gt;+(80-85)&lt;sup&gt;2&lt;/sup&gt;+(45-45)&lt;sup&gt;2&lt;/sup&gt;+(25-60)&lt;sup&gt;2&lt;/sup&gt;+(55-65)&lt;sup&gt;2&lt;/sup&gt;) => sqrt(25+0+0+0+100+4225+400+0+25+0+1225+100) => 78.102496759067 #sedang</li><li>sqrt((40-50)&lt;sup&gt;2&lt;/sup&gt;+(50-60)&lt;sup&gt;2&lt;/sup&gt;+(60-90)&lt;sup&gt;2&lt;/sup&gt;+(55-80)&lt;sup&gt;2&lt;/sup&gt;+(70-75)&lt;sup&gt;2&lt;/sup&gt;+(60-0)&lt;sup&gt;2&lt;/sup&gt;+(65-90)&lt;sup&gt;2&lt;/sup&gt;+(80-80)&lt;sup&gt;2&lt;/sup&gt;+(65-85)&lt;sup&gt;2&lt;/sup&gt;+(35-45)&lt;sup&gt;2&lt;/sup&gt;+(65-60)&lt;sup&gt;2&lt;/sup&gt;+(55-65)&lt;sup&gt;2&lt;/sup&gt;) => sqrt(100+100+900+625+25+3600+625+0+400+100+25+100) => 81.24038404636 #tinggi</li></ol>Status Dominan 5 KNN (2:2:1) = <u>TINGGI (77.785364)</u>', 'tinggi', '2021-12-27', '06:00:55', 'Kategori 5-> tinggi : 77.785363891476'),
(2, 'Hanya testing saja', '2021', '1', 12, 12, 12, 12, 12, 0, 12, 12, 12, 12, 12, 12, 132, '', '', '2025-09-22', '09:50:01', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pmb`
--

CREATE TABLE `tb_pmb` (
  `id_pmb` int(8) NOT NULL,
  `id_tahun` varchar(15) NOT NULL,
  `minat_jurusan` varchar(30) NOT NULL,
  `jalur_pendaftaran` int(10) NOT NULL,
  `gelombang` int(10) NOT NULL,
  `sistem_kuliah` int(10) NOT NULL,
  `jenis_kelamin` int(10) NOT NULL,
  `nilai_lulusan` int(10) NOT NULL,
  `tahun_lulus` int(10) NOT NULL,
  `jenjang_pendidikan` int(10) NOT NULL,
  `jurusan_sekolah` int(10) NOT NULL,
  `tanggal_daftar` int(10) NOT NULL,
  `prodi_diterima` int(10) NOT NULL,
  `jenis_institusi` int(10) NOT NULL,
  `provinsi_institusi` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `kategori` varchar(15) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pmb`
--

INSERT INTO `tb_pmb` (`id_pmb`, `id_tahun`, `minat_jurusan`, `jalur_pendaftaran`, `gelombang`, `sistem_kuliah`, `jenis_kelamin`, `nilai_lulusan`, `tahun_lulus`, `jenjang_pendidikan`, `jurusan_sekolah`, `tanggal_daftar`, `prodi_diterima`, `jenis_institusi`, `provinsi_institusi`, `jumlah`, `kategori`, `keterangan`) VALUES
(65, '2024', 'S1 - Psikologi', 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 144, 'Sedang', ''),
(66, '2025', 'S1 - Sosiologi', 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 144, 'Sedang', ''),
(67, '2023', 'S1 - Ilmu Hukum', 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 144, 'Sedang', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tahun`
--

CREATE TABLE `tb_tahun` (
  `id_tahun` varchar(15) NOT NULL,
  `nama_tahun` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_tahun`
--

INSERT INTO `tb_tahun` (`id_tahun`, `nama_tahun`, `deskripsi`) VALUES
('2020', '', ''),
('2021', '', ''),
('2022', '', ''),
('2023', '', ''),
('2024', '', ''),
('2025', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `kode_user` varchar(10) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `kode_user`, `nama_user`, `email`, `telepon`, `username`, `password`, `level`, `status`, `keterangan`) VALUES
(1, '', 'Abdus', '', '084564645512', 'a', 's', 'Admin', 'Aktif', ''),
(2, '', 'Salam', 'salam@gmail.com', '084131548925', 's', 'a', 'Panitia', 'Aktif', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_pengujian`
--
ALTER TABLE `tb_pengujian`
  ADD PRIMARY KEY (`id_pengujian`);

--
-- Indeks untuk tabel `tb_pmb`
--
ALTER TABLE `tb_pmb`
  ADD PRIMARY KEY (`id_pmb`);

--
-- Indeks untuk tabel `tb_tahun`
--
ALTER TABLE `tb_tahun`
  ADD PRIMARY KEY (`id_tahun`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_pengujian`
--
ALTER TABLE `tb_pengujian`
  MODIFY `id_pengujian` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_pmb`
--
ALTER TABLE `tb_pmb`
  MODIFY `id_pmb` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
