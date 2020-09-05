-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Sep 2020 pada 06.02
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
(20, 'ADMIN', '807', '123', 1),
(22, 'Dasep Depiyawan', '1910001', '321', 3),
(23, 'Lisnawati', '2015', '9090', 2),
(32, 'Pandji', '1945', '123', 3),
(33, 'Febri Hartanto', '1910003', '123', 3),
(34, 'Andi Gunawan', '1910004', '123', 3);

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
  `gelar` varchar(60) DEFAULT NULL,
  `prodi` varchar(150) DEFAULT NULL,
  `kode_prodi` varchar(250) DEFAULT NULL,
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

--
-- Dumping data untuk tabel `bank_soal`
--

INSERT INTO `bank_soal` (`id`, `id_soal`, `bentuk_ujian`, `kode_soal`, `mata_pelajaran`, `kode_guru`, `nama_guru`, `gelar`, `prodi`, `kode_prodi`, `kelas`, `soal`, `a`, `b`, `c`, `d`, `jawaban`, `tanggal_ujian`, `mulai`, `selesai`) VALUES
(147, 1, 'UTS', 'A001', 'Sejarah', '2015', 'Lisnawati', 'S,Kom M.Hum', 'IPA', 'A1', 'X', 'Presiden Pertama RI', 'Soekarno', 'Soeharto', 'Yondaime', 'Naruto', 'A', '08 31 2020', '16:00:00', '17:00:00'),
(148, 2, 'UTS', 'A001', 'Sejarah', '2015', 'Lisnawati', 'S,Kom M.Hum', 'IPA', 'A1', 'X', 'Ibukota Indonesia', 'Jakarta', 'Bandung', 'Lampung', 'Medan', 'A', '08 31 2020', '16:00:00', '17:00:00'),
(149, 3, 'UTS', 'A001', 'Sejarah', '2015', 'Lisnawati', 'S,Kom M.Hum', 'IPA', 'A1', 'X', 'Indonesia Bagian dari Benua', 'Eropa', 'Antartika', 'Asia', 'Afrika', 'C', '08 31 2020', '16:00:00', '17:00:00'),
(150, 4, 'UTS', 'A001', 'Sejarah', '2015', 'Lisnawati', 'S,Kom M.Hum', 'IPA', 'A1', 'X', '1 Jam sama dengan', '2 menit', '50 detik', '40 detik', '60 menit', 'D', '08 31 2020', '16:00:00', '17:00:00'),
(151, 5, 'UTS', 'A001', 'Sejarah', '2015', 'Lisnawati', 'S,Kom M.Hum', 'IPA', 'A1', 'X', 'Hokage Konoha ke 1', 'Yondaime', 'Hashirama', 'Kakashi', 'Naruto', 'B', '08 31 2020', '16:00:00', '17:00:00'),
(162, 1, 'UAS', 'A002', 'Sejarah', '2015', 'Lisnawati', 'S,Kom M.Hum', 'IPA', 'A1', 'X', 'Presiden Pertama RI', 'Soekarno', 'Soeharto', 'Yondaime', 'Naruto', 'A', '08 31 2020', '19:00:00', '20:00:00'),
(163, 2, 'UAS', 'A002', 'Sejarah', '2015', 'Lisnawati', 'S,Kom M.Hum', 'IPA', 'A1', 'X', 'Presiden Pertama RI', 'Soekarno', 'Soeharto', 'Yondaime', 'Naruto', 'A', '08 31 2020', '19:00:00', '20:00:00'),
(164, 3, 'UAS', 'A002', 'Sejarah', '2015', 'Lisnawati', 'S,Kom M.Hum', 'IPA', 'A1', 'X', 'Presiden Pertama RI', 'Soekarno', 'Soeharto', 'Yondaime', 'Naruto', 'A', '08 31 2020', '19:00:00', '20:00:00'),
(165, 4, 'UAS', 'A002', 'Sejarah', '2015', 'Lisnawati', 'S,Kom M.Hum', 'IPA', 'A1', 'X', 'Presiden Pertama RI', 'Soekarno', 'Soeharto', 'Yondaime', 'Naruto', 'A', '08 31 2020', '19:00:00', '20:00:00'),
(166, 5, 'UAS', 'A002', 'Sejarah', '2015', 'Lisnawati', 'S,Kom M.Hum', 'IPA', 'A1', 'X', 'Presiden Pertama RI', 'Soekarno', 'Soeharto', 'Yondaime', 'Naruto', 'A', '08 31 2020', '19:00:00', '20:00:00'),
(167, 6, 'UAS', 'A002', 'Sejarah', '2015', 'Lisnawati', 'S,Kom M.Hum', 'IPA', 'A1', 'X', 'Presiden Pertama RI', 'Soekarno', 'Soeharto', 'Yondaime', 'Naruto', 'A', '08 31 2020', '19:00:00', '20:00:00'),
(168, 7, 'UAS', 'A002', 'Sejarah', '2015', 'Lisnawati', 'S,Kom M.Hum', 'IPA', 'A1', 'X', 'Presiden Pertama RI', 'Soekarno', 'Soeharto', 'Yondaime', 'Naruto', 'A', '08 31 2020', '19:00:00', '20:00:00'),
(169, 8, 'UAS', 'A002', 'Sejarah', '2015', 'Lisnawati', 'S,Kom M.Hum', 'IPA', 'A1', 'X', 'Presiden Pertama RI', 'Soekarno', 'Soeharto', 'Yondaime', 'Naruto', 'A', '08 31 2020', '19:00:00', '20:00:00'),
(170, 9, 'UAS', 'A002', 'Sejarah', '2015', 'Lisnawati', 'S,Kom M.Hum', 'IPA', 'A1', 'X', 'Presiden Pertama RI', 'Soekarno', 'Soeharto', 'Yondaime', 'Naruto', 'A', '08 31 2020', '19:00:00', '20:00:00'),
(171, 10, 'UAS', 'A002', 'Sejarah', '2015', 'Lisnawati', 'S,Kom M.Hum', 'IPA', 'A1', 'X', 'Presiden Pertama RI', 'Soekarno', 'Soeharto', 'Yondaime', 'Naruto', 'A', '08 31 2020', '19:00:00', '20:00:00');

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
(9, 807, 'ADMIN', 'Staf', 'Laki-Laki', NULL, NULL, NULL, 'dwiputra@gmail.com', NULL, '081809064032', 'guru.jpg'),
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
  `kode_mapel` varchar(255) DEFAULT NULL,
  `hari` date DEFAULT NULL,
  `jam_mulai` varchar(100) DEFAULT NULL,
  `jam_selesai` varchar(100) DEFAULT NULL,
  `kelas` varchar(100) DEFAULT NULL,
  `kode_prodi` varchar(100) DEFAULT NULL,
  `prodi` varchar(100) DEFAULT NULL,
  `guru` varchar(100) DEFAULT NULL,
  `kode_guru` varchar(100) DEFAULT NULL
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

--
-- Dumping data untuk tabel `jawaban`
--

INSERT INTO `jawaban` (`id`, `id_soal`, `bentuk_ujian`, `nama`, `nisn`, `jawaban`, `prodi`, `kelas`, `tanggal`, `mata_pelajaran`, `kode_soal`) VALUES
(131, 1, 'UTS', 'Dasep Depiyawan', '1910001', 'A', 'IPA', 'X', '2020-08-31', 'Sejarah', 'A001'),
(132, 2, 'UTS', 'Dasep Depiyawan', '1910001', 'B', 'IPA', 'X', '2020-08-31', 'Sejarah', 'A001'),
(133, 3, 'UTS', 'Dasep Depiyawan', '1910001', 'D', 'IPA', 'X', '2020-08-31', 'Sejarah', 'A001'),
(134, 4, 'UTS', 'Dasep Depiyawan', '1910001', 'A', 'IPA', 'X', '2020-08-31', 'Sejarah', 'A001'),
(135, 5, 'UTS', 'Dasep Depiyawan', '1910001', 'A', 'IPA', 'X', '2020-08-31', 'Sejarah', 'A001'),
(136, 1, 'UAS', 'Dasep Depiyawan', '1910001', 'A', 'IPA', 'X', '2020-08-31', 'Sejarah', 'A002'),
(137, 2, 'UAS', 'Dasep Depiyawan', '1910001', 'A', 'IPA', 'X', '2020-08-31', 'Sejarah', 'A002'),
(138, 3, 'UAS', 'Dasep Depiyawan', '1910001', 'A', 'IPA', 'X', '2020-08-31', 'Sejarah', 'A002'),
(139, 4, 'UAS', 'Dasep Depiyawan', '1910001', 'A', 'IPA', 'X', '2020-08-31', 'Sejarah', 'A002'),
(140, 5, 'UAS', 'Dasep Depiyawan', '1910001', 'A', 'IPA', 'X', '2020-08-31', 'Sejarah', 'A002'),
(141, 6, 'UAS', 'Dasep Depiyawan', '1910001', 'A', 'IPA', 'X', '2020-08-31', 'Sejarah', 'A002'),
(142, 7, 'UAS', 'Dasep Depiyawan', '1910001', 'A', 'IPA', 'X', '2020-08-31', 'Sejarah', 'A002'),
(143, 8, 'UAS', 'Dasep Depiyawan', '1910001', 'A', 'IPA', 'X', '2020-08-31', 'Sejarah', 'A002'),
(144, 9, 'UAS', 'Dasep Depiyawan', '1910001', 'A', 'IPA', 'X', '2020-08-31', 'Sejarah', 'A002'),
(145, 10, 'UAS', 'Dasep Depiyawan', '1910001', 'A', 'IPA', 'X', '2020-08-31', 'Sejarah', 'A002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `judul`
--

CREATE TABLE `judul` (
  `id` int(11) NOT NULL,
  `nama_sekolah` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `judul`
--

INSERT INTO `judul` (`id`, `nama_sekolah`) VALUES
(1, 'SMKN 45');

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
  `nilai` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kumpul_tugas`
--

INSERT INTO `kumpul_tugas` (`id`, `kode_tugas`, `nama_siswa`, `nisn`, `jawaban`, `file_jawaban`, `tgl_diserahkan`, `jam_diserahkan`, `nilai`) VALUES
(12, 'jjVQLdiH', 'Dasep Depiyawan', '1910001', 'Ok bu sudah di kerjakan', '4j.jpg', '2020-08-30', '19:10:25', 90),
(13, '8dzUYNO9', 'Dasep Depiyawan', '1910001', 'Baik Pak Bu Sudah saya kirim dan kerjakan', 'satudin.png', '2020-09-01', '15:11:38', 0);

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
  `kode_prodi` varchar(40) DEFAULT NULL,
  `prodi` varchar(60) DEFAULT NULL,
  `tgl_lahir` varchar(60) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `gender` varchar(200) DEFAULT NULL,
  `tahun_ajaran` varchar(200) DEFAULT NULL,
  `angkatan` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nisn`, `nama`, `kelas`, `kode_prodi`, `prodi`, `tgl_lahir`, `tempat_lahir`, `alamat`, `photo`, `gender`, `tahun_ajaran`, `angkatan`) VALUES
(26, 1910001, 'Dasep Depiyawan', 'X', 'A1', 'IPA', '1999-04-13', 'Bandung', 'Kp Japat  Jl Lodal Dalam II C', 'siswa.jpg', 'Laki-Laki', NULL, NULL),
(46, 1945, 'Pandji', 'XI', 'A1', 'IPA', '1980-11-26', 'Bandung Barat', '1', NULL, 'Laki-Laki', '2020/2021', 'V'),
(47, 1910003, 'Febri Hartanto', 'X', 'TKJ', 'Teknik Komputer dan Jaringan', '1999-04-13', 'Bandung', 'Jl Lodan II C Kp Japat', NULL, 'Laki-Laki', '2020/2021', '5'),
(48, 1910004, 'Andi Gunawan', 'X', 'TKJ', 'Teknik Komputer dan Jaringan', '1997-02-14', 'Lampung', 'Jl Lodan II C Kp Japat', NULL, 'Laki-Laki', '2020/2021', '5');

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

--
-- Dumping data untuk tabel `tugas`
--

INSERT INTO `tugas` (`id`, `kode_guru`, `nama_guru`, `mata_pelajaran`, `kode_mapel`, `kelas`, `prodi`, `tanggal`, `jam`, `file_tugas`, `judul_tugas`, `keterangan`, `kode_tugas`) VALUES
(33, '2015', 'Lisnawati', 'Sejarah', 'SJ12', 'X', 'IPA', '2020-09-01', '15:11:10', 'Sistem_basisdata_rabu_(1)1.docx', 'Tugas 1', 'Kerjakan', '8dzUYNO9');

-- --------------------------------------------------------

--
-- Struktur dari tabel `uas`
--

CREATE TABLE `uas` (
  `id` int(11) NOT NULL,
  `kode_soal` varchar(60) DEFAULT NULL,
  `mata_pelajaran` varchar(60) DEFAULT NULL,
  `guru` varchar(60) DEFAULT NULL,
  `prodi` varchar(150) DEFAULT NULL,
  `kode_prodi` varchar(60) DEFAULT NULL,
  `kelas` varchar(60) DEFAULT NULL,
  `kode_guru` varchar(60) DEFAULT NULL,
  `tanggal` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `uas`
--

INSERT INTO `uas` (`id`, `kode_soal`, `mata_pelajaran`, `guru`, `prodi`, `kode_prodi`, `kelas`, `kode_guru`, `tanggal`) VALUES
(4, 'A002', 'Sejarah', 'Lisnawati', 'IPA', 'A1', 'X', '2015', '08 31 2020 20:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `uts`
--

CREATE TABLE `uts` (
  `id` int(11) NOT NULL,
  `kode_soal` varchar(30) DEFAULT NULL,
  `mata_pelajaran` varchar(40) DEFAULT NULL,
  `guru` varchar(100) DEFAULT NULL,
  `kode_prodi` varchar(140) DEFAULT NULL,
  `prodi` varchar(150) DEFAULT NULL,
  `kelas` varchar(60) DEFAULT NULL,
  `kode_guru` varchar(60) DEFAULT NULL,
  `tanggal` varchar(150) DEFAULT NULL,
  `gelar` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `uts`
--

INSERT INTO `uts` (`id`, `kode_soal`, `mata_pelajaran`, `guru`, `kode_prodi`, `prodi`, `kelas`, `kode_guru`, `tanggal`, `gelar`) VALUES
(25, 'A001', 'Sejarah', 'Lisnawati', 'A1', 'IPA', 'X', '2015', '08 31 2020 17:00:00', NULL);

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
-- Indeks untuk tabel `judul`
--
ALTER TABLE `judul`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `bank_soal`
--
ALTER TABLE `bank_soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT untuk tabel `daftar_tugas`
--
ALTER TABLE `daftar_tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `file_materi`
--
ALTER TABLE `file_materi`
  MODIFY `id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `jadwal_ujian`
--
ALTER TABLE `jadwal_ujian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT untuk tabel `judul`
--
ALTER TABLE `judul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kumpul_tugas`
--
ALTER TABLE `kumpul_tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `uas`
--
ALTER TABLE `uas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `uts`
--
ALTER TABLE `uts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
