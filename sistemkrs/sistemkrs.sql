-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jun 2022 pada 20.03
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistemkrs`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_dosen`
--

CREATE TABLE `detail_dosen` (
  `dosen_id` int(11) DEFAULT NULL,
  `matkul_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_mahasiswa`
--

CREATE TABLE `detail_mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `matkul_id` int(11) DEFAULT NULL,
  `konfirmasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_mahasiswa`
--

INSERT INTO `detail_mahasiswa` (`id_mahasiswa`, `matkul_id`, `konfirmasi`) VALUES
(1, 1, 1),
(1, 2, 1),
(1, 3, 1),
(1, 6, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_ruang`
--

CREATE TABLE `detail_ruang` (
  `id_jadwal` int(11) NOT NULL,
  `hari` varchar(100) DEFAULT NULL,
  `jam` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_ruang`
--

INSERT INTO `detail_ruang` (`id_jadwal`, `hari`, `jam`) VALUES
(2, 'Senin', '12:42:57'),
(3, 'Selasa', '10:00:00'),
(4, 'Selasa', '14:00:00'),
(5, 'Rabu', '10:49:57'),
(6, 'Rabu', '08:00:00'),
(7, 'Kamis', '10:50:00'),
(8, 'Kamis', '08:00:00'),
(9, 'Jumat', '10:50:00'),
(10, 'Jumat', '08:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(10) NOT NULL,
  `nama_dosen` varchar(30) DEFAULT NULL,
  `nip` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nama_dosen`, `nip`, `password`) VALUES
(4, 'Kurniawan', '0991', '123'),
(5, 'Andy', '0992', '123'),
(6, 'Rinci', '0993', '1'),
(7, 'Dian', '0994', '1'),
(8, 'Amar', '0995', '1'),
(9, 'Rama', '0996', '1'),
(10, 'Dani', '0997', '1'),
(11, 'Dina', '0998', '1'),
(12, 'Doni', '0999', '1'),
(13, 'Aldi', '1000', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(12) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jurusan` varchar(50) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `npm` int(11) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') DEFAULT NULL,
  `No_telp` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nama`, `jurusan`, `password`, `npm`, `alamat`, `jenis_kelamin`, `No_telp`) VALUES
(1, 'amaryan', 'Teknik Informatika', '123', 7772, NULL, NULL, NULL),
(2, 'Faiz', 'Teknik Informatika', '123', 7778, NULL, NULL, NULL),
(5, 'Rendy', 'Teknik Informatika', '1', 7251, NULL, NULL, NULL),
(12, 'Raihan', 'Teknik Informatika', '123', 8222, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `matkul`
--

CREATE TABLE `matkul` (
  `id_matkul` int(10) NOT NULL,
  `id_jadwal` int(10) DEFAULT NULL,
  `id_ruang` int(10) DEFAULT NULL,
  `nama_matkul` varchar(30) DEFAULT NULL,
  `sks` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `matkul`
--

INSERT INTO `matkul` (`id_matkul`, `id_jadwal`, `id_ruang`, `nama_matkul`, `sks`) VALUES
(1, 2, 1, 'Matematik', 3),
(2, 2, 2, 'Sistem Operasi', 4),
(3, 3, 3, 'Fisika', 3),
(4, 4, 4, 'RPL', 3),
(5, 5, 5, 'Otomata', 3),
(6, 6, 6, 'Basis Data', 4),
(7, 7, 7, 'Jaringan Komputer', 4),
(8, 8, 8, 'Bahasa Inggris', 2),
(9, 9, 9, 'Kecerdasan Buatan', 3),
(10, 10, 10, 'Statkom', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang`
--

CREATE TABLE `ruang` (
  `id_ruang` int(10) NOT NULL,
  `nama_ruang` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `nama_ruang`) VALUES
(1, 'G-201'),
(2, 'F-202'),
(3, 'F-204'),
(4, 'F-306'),
(5, 'G-201'),
(6, 'G-301'),
(7, 'A-401'),
(8, 'A-204'),
(9, 'A-302'),
(10, 'F-302');

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp_mengambil`
--

CREATE TABLE `temp_mengambil` (
  `temp_mengambil_id` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_matkul` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_mahasiswa`
--
ALTER TABLE `detail_mahasiswa`
  ADD KEY `matkul_id` (`matkul_id`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`);

--
-- Indeks untuk tabel `detail_ruang`
--
ALTER TABLE `detail_ruang`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD UNIQUE KEY `npm` (`npm`);

--
-- Indeks untuk tabel `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`id_matkul`),
  ADD KEY `id_jadwal` (`id_jadwal`),
  ADD KEY `id_ruang` (`id_ruang`);

--
-- Indeks untuk tabel `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indeks untuk tabel `temp_mengambil`
--
ALTER TABLE `temp_mengambil`
  ADD PRIMARY KEY (`temp_mengambil_id`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`),
  ADD KEY `id_matkul` (`id_matkul`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `matkul`
--
ALTER TABLE `matkul`
  MODIFY `id_matkul` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id_ruang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `temp_mengambil`
--
ALTER TABLE `temp_mengambil`
  MODIFY `temp_mengambil_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_mahasiswa`
--
ALTER TABLE `detail_mahasiswa`
  ADD CONSTRAINT `detail_mahasiswa_ibfk_2` FOREIGN KEY (`matkul_id`) REFERENCES `matkul` (`id_matkul`),
  ADD CONSTRAINT `detail_mahasiswa_ibfk_3` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`);

--
-- Ketidakleluasaan untuk tabel `matkul`
--
ALTER TABLE `matkul`
  ADD CONSTRAINT `matkul_ibfk_1` FOREIGN KEY (`id_jadwal`) REFERENCES `detail_ruang` (`id_jadwal`),
  ADD CONSTRAINT `matkul_ibfk_2` FOREIGN KEY (`id_ruang`) REFERENCES `ruang` (`id_ruang`);

--
-- Ketidakleluasaan untuk tabel `temp_mengambil`
--
ALTER TABLE `temp_mengambil`
  ADD CONSTRAINT `temp_mengambil_ibfk_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`),
  ADD CONSTRAINT `temp_mengambil_ibfk_2` FOREIGN KEY (`id_matkul`) REFERENCES `matkul` (`id_matkul`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
