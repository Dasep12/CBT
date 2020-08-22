-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Agu 2020 pada 15.41
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
(1, 'Dasep', '1910001', '123', 3),
(2, 'Ayu', '1910002', '123', 3),
(3, 'Dede Irfan', '2015', '123', 2),
(4, 'Kiki', '2014', '123', 2),
(5, 'Asep Rochmat', '1945', '123', 2),
(6, 'Rima', '1920001', '123', 3),
(7, 'Murry', '1930001', '123', 3),
(8, 'Anita', '1920002', '123', 3),
(9, 'Ramlan', '1920005', '123', 3),
(10, 'Rizal', '1920004', '123', 3),
(11, 'Satudin', '1910004', '123', 3);

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

--
-- Dumping data untuk tabel `bank_soal`
--

INSERT INTO `bank_soal` (`id`, `id_soal`, `bentuk_ujian`, `kode_soal`, `mata_pelajaran`, `kode_guru`, `nama_guru`, `kelas`, `soal`, `a`, `b`, `c`, `d`, `jawaban`, `tanggal_ujian`, `mulai`, `selesai`) VALUES
(87, 1, 'UTS', 'A001', 'Matematika', '1945', 'Asep Rochmat', 'XII', 'Presiden Pertama RI', 'Soekarno', 'Soeharto', 'Yondaime', 'Naruto', 'A', NULL, NULL, NULL),
(88, 2, 'UTS', 'A001', 'Matematika', '1945', 'Asep Rochmat', 'XII', 'Ibukota Indonesia', 'Jakarta', 'Bandung', 'Lampung', 'Medan', 'A', NULL, NULL, NULL),
(89, 3, 'UTS', 'A001', 'Matematika', '1945', 'Asep Rochmat', 'XII', 'Indonesia Bagian dari Benua', 'Eropa', 'Antartika', 'Asia', 'Afrika', 'C', NULL, NULL, NULL),
(90, 4, 'UTS', 'A001', 'Matematika', '1945', 'Asep Rochmat', 'XII', '1 Jam sama dengan', '2 menit', '50 detik', '40 detik', '60 menit', 'D', NULL, NULL, NULL),
(91, 5, 'UTS', 'A001', 'Matematika', '1945', 'Asep Rochmat', 'XII', 'Hokage Konoha ke 1', 'Yondaime', 'Hashirama', 'Kakashi', 'Naruto', 'B', NULL, NULL, NULL);

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

--
-- Dumping data untuk tabel `daftar_tugas`
--

INSERT INTO `daftar_tugas` (`id`, `kode_tugas`, `nama_siswa`, `kelas`, `nisn`, `prodi`, `jawaban_siswa`, `tanggal`, `jam`, `file_tugas`) VALUES
(16, 'ByqGDK6H', 'Dasep Depiyawan', 'XII', '1910001', 'TKJ', NULL, NULL, NULL, 'ppppp.png'),
(18, '91UjjTt0', 'Dasep Depiyawan', 'XII', '1910001', 'TKJ', NULL, NULL, NULL, 'pdf1-2.JPG'),
(20, 'wgYFVc8v', 'Dasep Depiyawan', 'XII', '1910001', 'TKJ', NULL, NULL, NULL, '3.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `file_materi`
--

CREATE TABLE `file_materi` (
  `id` int(60) NOT NULL,
  `kode_materi` varchar(250) DEFAULT NULL,
  `file` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `file_materi`
--

INSERT INTO `file_materi` (`id`, `kode_materi`, `file`) VALUES
(43, '2aA8wk', 'Report.xlsx'),
(44, 'BvnRni', '19101051_Dasep_Depiyawan.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `nipn` int(25) DEFAULT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(250) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `gelar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id`, `nipn`, `nama`, `status`, `tempat_lahir`, `tgl_lahir`, `alamat`, `email`, `gelar`) VALUES
(1, 2015, 'Dede Irfan', 'Pengajar', 'Bandung', '1996-05-06', 'Bandung Barat', 'dede@gmail.com', 'S,Kom'),
(2, 2014, 'Kiki Wianjana', 'Pengajar', 'Bandung', '1996-08-19', 'Bandung Barat', 'kiki@gmail.com', 'S,Pd'),
(3, 1945, 'Asep Rochmat', 'Pengajar', 'Bandung', '1976-04-13', 'Bandung Barat', 'asep@gmail.com', 'S,Pd'),
(4, 1896, 'Dika', 'Pengajar', 'Jakarta', '1979-01-19', 'Jakarta Barat', 'dika@gmail.ciom', 'S,Pd');

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

--
-- Dumping data untuk tabel `jadwal_ujian`
--

INSERT INTO `jadwal_ujian` (`id`, `kode_soal`, `mata_pelajaran`, `hari`, `jam`) VALUES
(1, 'A001', 'Matematika', '2020-08-22', '1'),
(2, 'A002', 'Pendidikan Agama Islam', '2020-07-24', '2'),
(3, 'A003', 'Matematika', '2020-07-24', '2');

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

--
-- Dumping data untuk tabel `kumpul_tugas`
--

INSERT INTO `kumpul_tugas` (`id`, `kode_tugas`, `nama_siswa`, `nisn`, `jawaban`, `file_jawaban`, `tgl_diserahkan`, `jam_diserahkan`, `nilai`) VALUES
(9, 'ByqGDK6H', 'Adien', '1910004', 'Ok bubos', 'tanggapan.png', '2020-08-21', '19:21:43', 75),
(10, '91UjjTt0', 'Adien', '1910004', 'Ok', '4j.jpg', '2020-08-21', '19:22:42', 60),
(11, 'wgYFVc8v', 'Adien', '1910004', 'SIap bubos', 'oplj.jpg', '2020-08-21', '19:23:08', 90);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id` int(11) NOT NULL,
  `mata_pelajaran` varchar(250) DEFAULT NULL,
  `kode_mapel` varchar(250) DEFAULT NULL,
  `pengajar` varchar(30) DEFAULT NULL,
  `prodi` varchar(60) DEFAULT NULL,
  `kelas` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id`, `mata_pelajaran`, `kode_mapel`, `pengajar`, `prodi`, `kelas`) VALUES
(1, 'IPA', '119', '2015', 'TKJ', 'XII'),
(2, 'Sejarah', '120', '1896', 'TKJ', 'XII'),
(3, 'Pendidikan Kewarganegaraan', '111', '2014', 'TKJ', 'XII'),
(4, 'Matematika', '122', '1945', 'TKJ', 'XII'),
(5, 'Pendidikan Agama Islam', '123', '1945', 'TKJ', 'XII'),
(6, 'Matematika', '303', '1945', 'AKP', 'XII'),
(7, 'Matematika', '334', '1945', 'TKR', 'XII'),
(8, 'Pendidikan Agama Islam', '439', '2015', 'AKP', 'XII'),
(9, 'Pendidikan Agama Islam', '003', '1896', 'TKR', 'XII');

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

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id`, `judul_materi`, `keterangan_materi`, `kode_materi`, `jam_post`, `tgl_post`, `mata_pelajaran`, `kode_mapel`, `nama_guru`, `kode_guru`, `kelas`, `prodi`) VALUES
(27, 'Fotosintesis', 'Lanjutan dari BAB 2', '2aA8wk', '16:00:31', '2020-08-20', 'IPA', '119', 'Dede Irfan', '2015', 'XII', 'TKJ'),
(28, 'Pengertian Agama', 'BAB 1', 'BvnRni', '16:07:19', '2020-08-20', 'Pendidikan Agama Islam', '123', 'Asep Rochmat', '1945', 'XII', 'TKJ');

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
  `alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nisn`, `nama`, `kelas`, `prodi`, `tgl_lahir`, `tempat_lahir`, `alamat`) VALUES
(1, 1910001, 'Dasep Depiyawan', 'XII', 'TKJ', '1999-04-13', 'Bandung Barat', 'Japat Jl Lodan Dalam II C'),
(2, 1910002, 'Ayu Safitri', 'XII', 'AKP', '1997-05-12', 'Bandung Jakarta Surabaya', 'Jakarta Utara Muara Baru'),
(3, 1910003, 'Murry', 'XII', 'TKR', '1998-02-14', 'Jakarta', 'Jakarta Utara'),
(4, 1910004, 'Adien', 'XII', 'TKJ', '1998-02-14', 'Jakarta', 'Jakarta Utara'),
(5, 1910005, 'Rizki', 'XII', 'AKP', '1998-03-14', 'Jakarta', 'Jakarta Utara'),
(6, 1910006, 'Brian', 'XII', 'TKR', '1999-01-14', 'Jakarta', 'Jakarta Utara'),
(7, 1920001, 'Rima', 'X', 'AKP', NULL, NULL, NULL),
(8, 1920002, 'Anita', 'X', 'AKP', NULL, NULL, NULL),
(9, 1920003, 'Renata', 'X', 'AKP', NULL, NULL, NULL),
(10, 1920004, 'Rizal', 'X', 'TKJ', NULL, NULL, NULL),
(11, 1920005, 'Ramlan', 'X', 'TKJ', NULL, NULL, NULL),
(12, 1920006, 'Ruslan', 'X', 'TKJ', NULL, NULL, NULL),
(13, 1920007, 'Rustam', 'X', 'TKR', NULL, NULL, NULL),
(14, 1920008, 'Iwang', 'X', 'TKR', NULL, NULL, NULL),
(15, 1920009, 'Genjo', 'X', 'TKR', NULL, NULL, NULL),
(16, 1930001, 'Murry', 'XI', 'TKJ', NULL, NULL, NULL);

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
(27, '1945', 'Asep Rochmat', 'Matematika', '122', 'XII', 'TKJ', '2020-08-21', '19:15:37', 'ppppp.png', 'Tugas 1', 'kerjakan', 'ByqGDK6H'),
(28, '1945', 'Asep Rochmat', 'Matematika', '122', 'XII', 'TKJ', '2020-08-21', '19:16:05', 'pdf1-2.JPG', 'Tugas 2', 'Buat kerja kelompok', '91UjjTt0'),
(29, '1945', 'Asep Rochmat', 'Pendidikan Agama Islam', '123', 'XII', 'TKJ', '2020-08-21', '19:18:18', '3.jpg', 'Tugas 1', 'Kerjakan !', 'wgYFVc8v');

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
-- Dumping data untuk tabel `uts`
--

INSERT INTO `uts` (`id`, `kode_soal`, `mata_pelajaran`, `guru`, `kelas`, `kode_guru`, `tanggal`) VALUES
(13, 'A001', 'Matematika', 'Asep Rochmat', 'XII', '1945', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `bank_soal`
--
ALTER TABLE `bank_soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jadwal_ujian`
--
ALTER TABLE `jadwal_ujian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT untuk tabel `kumpul_tugas`
--
ALTER TABLE `kumpul_tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
