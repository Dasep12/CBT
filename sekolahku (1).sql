-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Agu 2020 pada 16.13
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolahku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `nisn` varchar(60) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role_id` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id`, `username`, `nisn`, `password`, `role_id`) VALUES
(20, 'ADMIN', '807', 'admin', 1),
(22, 'Dasep Depiyawan', '1910001', '123', 3),
(23, 'AFAN WIJAYA ', '2015', 'guru', 2),
(24, 'ahmad', '1945', '123', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank_soal`
--

CREATE TABLE `bank_soal` (
  `id` int(11) NOT NULL,
  `id_soal` int(3) DEFAULT NULL,
  `bentuk_ujian` varchar(100) DEFAULT NULL,
  `kode_soal` varchar(25) DEFAULT NULL,
  `mata_pelajaran` varchar(60) DEFAULT NULL,
  `kode_guru` varchar(60) DEFAULT NULL,
  `nama_guru` varchar(70) DEFAULT NULL,
  `kelas` varchar(3) DEFAULT NULL,
  `soal` text DEFAULT NULL,
  `a` varchar(255) DEFAULT NULL,
  `b` varchar(255) DEFAULT NULL,
  `c` varchar(255) DEFAULT NULL,
  `d` varchar(255) DEFAULT NULL,
  `jawaban` varchar(1) DEFAULT NULL,
  `tanggal_ujian` varchar(100) DEFAULT NULL,
  `mulai` varchar(100) DEFAULT NULL,
  `selesai` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_tugas`
--

CREATE TABLE `daftar_tugas` (
  `id` int(11) NOT NULL,
  `kode_tugas` varchar(60) DEFAULT NULL,
  `nama_siswa` varchar(60) DEFAULT NULL,
  `kelas` varchar(60) DEFAULT NULL,
  `nisn` varchar(60) DEFAULT NULL,
  `prodi` varchar(60) DEFAULT NULL,
  `jawaban_siswa` text DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` varchar(30) DEFAULT NULL,
  `file_tugas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `file_materi`
--

CREATE TABLE `file_materi` (
  `id` int(60) NOT NULL,
  `kode_materi` varchar(250) DEFAULT NULL,
  `file` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `nipn` int(25) DEFAULT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(250) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `gelar` varchar(100) DEFAULT NULL,
  `no_hp` varchar(100) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id`, `nipn`, `nama`, `status`, `gender`, `tempat_lahir`, `tgl_lahir`, `alamat`, `email`, `gelar`, `no_hp`, `photo`) VALUES
(9, 807, 'ADMIN', 'Staf', 'Laki-Laki', NULL, NULL, NULL, 'dwiputra@gmail.com', NULL, '081809064032', 'admin2.png'),
(11, 2015, 'Lisnawati', 'Pengajar', 'Perempuan', 'Jakarta', '1980-11-26', 'Jakarta Utara', 'lisna@gmail.com', 'S,Kom M.Hum', '081809064000', 'lisnawattt_16_20200801_170640_0.jpg'),
(12, 1945, 'ahmad', 'Staf', 'Laki-Laki', NULL, NULL, NULL, NULL, NULL, NULL, '6.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_ujian`
--

CREATE TABLE `jadwal_ujian` (
  `id` int(11) NOT NULL,
  `kode_soal` varchar(100) NOT NULL,
  `mata_pelajaran` varchar(255) DEFAULT NULL,
  `hari` date DEFAULT NULL,
  `jam` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban`
--

CREATE TABLE `jawaban` (
  `id` int(11) NOT NULL,
  `id_soal` int(60) DEFAULT NULL,
  `bentuk_ujian` varchar(10) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `nisn` varchar(100) DEFAULT NULL,
  `jawaban` varchar(1) DEFAULT NULL,
  `prodi` varchar(100) DEFAULT NULL,
  `kelas` varchar(12) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `mata_pelajaran` varchar(100) DEFAULT NULL,
  `kode_soal` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `kode_jurusan` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id`, `jurusan`, `kode_jurusan`) VALUES
(7, 'IPA', 'A1'),
(8, 'IPS', 'A2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kumpul_tugas`
--

CREATE TABLE `kumpul_tugas` (
  `id` int(11) NOT NULL,
  `kode_tugas` varchar(60) DEFAULT NULL,
  `nama_siswa` varchar(60) DEFAULT NULL,
  `nisn` varchar(60) DEFAULT NULL,
  `jawaban` text DEFAULT NULL,
  `file_jawaban` varchar(255) DEFAULT NULL,
  `tgl_diserahkan` date DEFAULT NULL,
  `jam_diserahkan` varchar(60) DEFAULT NULL,
  `nilai` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id` int(11) NOT NULL,
  `mata_pelajaran` varchar(250) DEFAULT NULL,
  `kode_mapel` varchar(250) DEFAULT NULL,
  `kode_pengajar` varchar(30) DEFAULT NULL,
  `pengajar` varchar(150) DEFAULT NULL,
  `kode_prodi` varchar(200) DEFAULT NULL,
  `prodi` varchar(60) DEFAULT NULL,
  `kelas` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id`, `mata_pelajaran`, `kode_mapel`, `kode_pengajar`, `pengajar`, `kode_prodi`, `prodi`, `kelas`) VALUES
(13, 'Sejarah', 'SJ12', '2015', 'Lisnawati S,Kom M.Hum', 'A1', 'IPA', 'X');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `id` int(11) NOT NULL,
  `judul_materi` varchar(100) DEFAULT NULL,
  `keterangan_materi` text DEFAULT NULL,
  `kode_materi` varchar(60) DEFAULT NULL,
  `jam_post` varchar(60) DEFAULT NULL,
  `tgl_post` date DEFAULT NULL,
  `mata_pelajaran` varchar(100) DEFAULT NULL,
  `kode_mapel` varchar(60) DEFAULT NULL,
  `nama_guru` varchar(100) DEFAULT NULL,
  `kode_guru` varchar(100) DEFAULT NULL,
  `kelas` varchar(100) DEFAULT NULL,
  `prodi` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nisn` int(25) DEFAULT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `kelas` varchar(10) DEFAULT NULL,
  `prodi` varchar(60) DEFAULT NULL,
  `tgl_lahir` varchar(60) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nisn`, `nama`, `kelas`, `prodi`, `tgl_lahir`, `tempat_lahir`, `alamat`, `photo`) VALUES
(26, 1910001, 'Dasep Depiyawan', 'XI', 'A1', '1999-04-13', 'Bandung', 'Kp Japat  Jl Lodal Dalam II C', 'siswa.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
--

CREATE TABLE `tugas` (
  `id` int(11) NOT NULL,
  `kode_guru` varchar(10) DEFAULT NULL,
  `nama_guru` varchar(100) DEFAULT NULL,
  `mata_pelajaran` varchar(100) DEFAULT NULL,
  `kode_mapel` varchar(10) DEFAULT NULL,
  `kelas` varchar(3) DEFAULT NULL,
  `prodi` varchar(60) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` varchar(25) DEFAULT NULL,
  `file_tugas` varchar(255) DEFAULT NULL,
  `judul_tugas` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `kode_tugas` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `uas`
--

CREATE TABLE `uas` (
  `id` int(11) NOT NULL,
  `kode_soal` varchar(60) DEFAULT NULL,
  `mata_pelajaran` varchar(60) DEFAULT NULL,
  `guru` varchar(60) DEFAULT NULL,
  `kelas` varchar(60) DEFAULT NULL,
  `kode_guru` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `uts`
--

CREATE TABLE `uts` (
  `id` int(11) NOT NULL,
  `kode_soal` varchar(30) DEFAULT NULL,
  `mata_pelajaran` varchar(40) DEFAULT NULL,
  `guru` varchar(100) DEFAULT NULL,
  `kelas` varchar(60) DEFAULT NULL,
  `kode_guru` varchar(60) DEFAULT NULL,
  `tanggal` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bank_soal`
--
ALTER TABLE `bank_soal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `daftar_tugas`
--
ALTER TABLE `daftar_tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `file_materi`
--
ALTER TABLE `file_materi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwal_ujian`
--
ALTER TABLE `jadwal_ujian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kumpul_tugas`
--
ALTER TABLE `kumpul_tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `uas`
--
ALTER TABLE `uas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `uts`
--
ALTER TABLE `uts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `bank_soal`
--
ALTER TABLE `bank_soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT untuk tabel `daftar_tugas`
--
ALTER TABLE `daftar_tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `file_materi`
--
ALTER TABLE `file_materi`
  MODIFY `id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `jadwal_ujian`
--
ALTER TABLE `jadwal_ujian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kumpul_tugas`
--
ALTER TABLE `kumpul_tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `uas`
--
ALTER TABLE `uas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `uts`
--
ALTER TABLE `uts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
