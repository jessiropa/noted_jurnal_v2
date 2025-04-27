-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27 Apr 2025 pada 17.37
-- Versi Server: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `noted_jurnal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `nj_kategori`
--

CREATE TABLE IF NOT EXISTS `nj_kategori` (
  `ID_KATEGORI` varchar(255) DEFAULT NULL,
  `NAMA_KATEGORI` varchar(255) DEFAULT NULL,
  `WAKTU_INSERT` datetime DEFAULT NULL,
  `USER_INSERT` varchar(255) DEFAULT NULL,
  `WAKTU_UPDATE` datetime DEFAULT NULL,
  `USER_UPDATE` datetime DEFAULT NULL,
  `ID_USERS` varchar(255) DEFAULT NULL,
  `STATUS_SIMPAN` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nj_kategori`
--

INSERT INTO `nj_kategori` (`ID_KATEGORI`, `NAMA_KATEGORI`, `WAKTU_INSERT`, `USER_INSERT`, `WAKTU_UPDATE`, `USER_UPDATE`, `ID_USERS`, `STATUS_SIMPAN`) VALUES
('KT0001', 'link skripsi', '2025-03-11 20:15:05', 'admin', NULL, NULL, '1', 'BARU'),
('KT0002', 'link bab 1', '2025-03-11 20:21:59', 'admin', '2025-04-18 00:28:52', '0000-00-00 00:00:00', '1', 'HAPUS'),
('KT0003', 'link bab 2', '2025-03-11 20:22:07', 'admin', '2025-04-18 00:28:46', '0000-00-00 00:00:00', '1', 'HAPUS'),
('KT0004', 'Link bab 3', '2025-03-13 07:07:10', 'admin', NULL, NULL, '1', 'BARU'),
('KT0005', 'LINK BAB 1', '2025-03-24 19:38:45', 'admin', '2025-04-17 06:18:37', '0000-00-00 00:00:00', '1', 'REVISI'),
('KT0006', 'LINK BAB 1 TEST YA', '2025-04-17 06:13:05', 'admin', '2025-04-18 00:28:40', '0000-00-00 00:00:00', '1', 'HAPUS'),
('KT0007', 'LINK BAB 1 harusnya bisa', '2025-04-17 06:15:40', 'admin', '2025-04-18 00:28:34', '0000-00-00 00:00:00', '1', 'HAPUS'),
('KT0005', 'LINK BAB 1 test', '2025-04-17 06:18:37', 'admin', '2025-04-17 06:25:31', '0000-00-00 00:00:00', '1', 'REVISI'),
('KT0005', 'LINK BAB 1 ', '2025-04-17 06:25:31', 'admin', '2025-04-18 00:28:27', '0000-00-00 00:00:00', '1', 'HAPUS'),
('KT0008', 'LINK UJI COBA', '2025-04-18 00:29:05', 'admin', NULL, NULL, '1', 'BARU');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nj_link`
--

CREATE TABLE IF NOT EXISTS `nj_link` (
  `ID_LINK` varchar(255) DEFAULT NULL,
  `ID_KATEGORI` varchar(255) DEFAULT NULL,
  `JUDUL_LINK` varchar(255) DEFAULT NULL,
  `URL` text,
  `WAKTU_INSERT` datetime DEFAULT NULL,
  `USER_INSERT` varchar(255) DEFAULT NULL,
  `WAKTU_UPDATE` datetime DEFAULT NULL,
  `USER_UPDATE` varchar(255) DEFAULT NULL,
  `STATUS_SIMPAN` varchar(255) DEFAULT NULL,
  `ID_USERS` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nj_link`
--

INSERT INTO `nj_link` (`ID_LINK`, `ID_KATEGORI`, `JUDUL_LINK`, `URL`, `WAKTU_INSERT`, `USER_INSERT`, `WAKTU_UPDATE`, `USER_UPDATE`, `STATUS_SIMPAN`, `ID_USERS`) VALUES
('LNK0001', 'KT0003', 'Bootstrap 4.6', 'https://getbootstrap.com/docs/4.6/getting-started/introduction/', '2025-03-13 07:04:54', 'admin', '2025-04-17 06:36:56', 'admin', 'HAPUS', '1'),
('LNK0001', 'KT0003', 'Perulangan php', 'https://www.malasngoding.com/belajar-php-perulangan-for-pada-php/', '2025-03-13 07:06:08', 'admin', '2025-04-17 06:36:56', 'admin', 'HAPUS', '1'),
('LNK0001', 'KT0004', 'Contoh program menggunakan php', 'https://mycoding.id/blog/source-code-web-implementasi-sistem-pakar-php-mysql#google_vignette', '2025-03-13 07:07:37', 'admin', '2025-04-17 06:36:56', 'admin', 'HAPUS', '1'),
('LNK0001', 'KT0004', 'Pengertian Laravel', 'https://primakara.ac.id/blog/info-teknologi/laravel', '2025-03-13 07:37:30', 'admin', '2025-04-17 06:36:56', 'admin', 'HAPUS', '1'),
('LNK0001', 'KT0005', 'BELAJAR REACT JS', 'https://github.com/jessiropa/learn-react-js', '2025-03-24 19:40:22', 'admin', '2025-04-17 06:35:18', 'admin', 'HAPUS', '1'),
('LNK0001', 'KT0004', 'ini github jessi', 'https://github.com/jessiropa', '2025-04-17 06:38:19', 'admin', NULL, NULL, 'HAPUS', '1'),
('LNK0001', 'KT0002', 'Bootstrap 4.6', 'https://getbootstrap.com/docs/4.6/getting-started/introduction/', '2025-04-17 06:50:46', 'admin', NULL, NULL, 'HAPUS', '1'),
('LNK00001', 'KT0003', 'test', 'test', '2025-04-17 06:59:34', 'admin', NULL, NULL, 'HAPUS', '1'),
('LNK0002', 'KT0001', 'github jessi ', 'https://github.com/jessiropa', '2025-04-17 07:04:18', 'admin', NULL, NULL, 'BARU', '1'),
('LNK0003', 'KT0004', 'belajar react js', 'https://github.com/jessiropa/learn-react-js', '2025-04-17 07:05:02', 'admin', '2025-04-17 07:06:22', 'admin', 'HAPUS', '1'),
('LNK0004', 'KT0004', 'belajar laravel 10', 'https://santrikoding.com/tutorial-set/tutorial-laravel-10-untuk-pemula', '2025-04-17 23:15:04', 'admin', NULL, NULL, 'BARU', '1'),
('LNK0005', 'KT0004', 'test input', 'tessssst', '2025-04-17 23:17:28', 'admin', '2025-04-17 23:17:35', 'admin', 'HAPUS', '1'),
('LNK0006', 'KT0004', 'belajar dokter untuk pemula', 'https://docker-curriculum.com/', '2025-04-18 00:12:53', 'admin', '2025-04-18 00:13:05', 'admin', 'REVISI', '1'),
('LNK0006', 'KT0004', 'belajar dokter untuk pemula oke ya', 'https://docker-curriculum.com/', '2025-04-18 00:13:05', 'admin', '2025-04-18 00:13:27', 'admin', 'HAPUS', '1'),
('LNK0007', 'KT0008', 'DOCKER OFFICIAL', 'https://docker-curriculum.com/', '2025-04-18 00:29:26', 'admin', NULL, NULL, 'BARU', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nj_project`
--

CREATE TABLE IF NOT EXISTS `nj_project` (
  `ID_PROJECTS` varchar(255) DEFAULT NULL,
  `NAMA_PROJECT` varchar(255) DEFAULT NULL,
  `ID_USERS` int(11) DEFAULT NULL,
  `WAKTU_INSERT` datetime DEFAULT NULL,
  `USER_INSERT` varchar(255) DEFAULT NULL,
  `STATUS_SIMPAN` varchar(255) DEFAULT NULL,
  `DESKRIPSI_PROJECT` varchar(500) DEFAULT NULL,
  `STATUS_PROJECT` varchar(255) NOT NULL,
  `DEADLINE` date DEFAULT NULL,
  `WAKTU_UPDATE` datetime DEFAULT NULL,
  `USER_UPDATE` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nj_project`
--

INSERT INTO `nj_project` (`ID_PROJECTS`, `NAMA_PROJECT`, `ID_USERS`, `WAKTU_INSERT`, `USER_INSERT`, `STATUS_SIMPAN`, `DESKRIPSI_PROJECT`, `STATUS_PROJECT`, `DEADLINE`, `WAKTU_UPDATE`, `USER_UPDATE`) VALUES
('PJ0001', 'jessi project', 1, '2025-03-07 22:27:39', 'admin', 'HAPUS', NULL, 'TUNDA', NULL, '2025-03-10 04:49:59', 'admin'),
('PJ0002', 'Hallo project', 1, '2025-03-07 22:30:02', 'admin', 'REVISI', NULL, 'SELESAI', NULL, '2025-03-09 04:38:48', 'admin'),
('PJ0003', 'rival project gas', 1, '2025-03-07 22:30:17', 'admin', 'REVISI', NULL, 'PROSES', NULL, '2025-03-09 02:51:57', 'admin'),
('PJ0003', 'Rival Project', 1, '2025-03-09 02:51:57', 'admin', 'REVISI', 'uji coba edit dulu ya', 'SELESAI', '2025-03-10', '2025-03-09 02:58:56', 'admin'),
('PJ0003', 'Rival Project', 1, '2025-03-09 02:58:56', 'admin', 'REVISI', 'uji coba edit dulu ya 1 dulu', 'SELESAI', '2025-03-10', '2025-03-09 03:00:14', 'admin'),
('PJ0003', 'Rival Project', 1, '2025-03-09 03:00:14', 'admin', 'REVISI', 'uji coba edit dulu ya 1 lagi', 'PROSES', '2025-03-10', '2025-03-09 03:00:38', 'admin'),
('PJ0003', 'Rival Project', 1, '2025-03-09 03:00:38', 'admin', 'HAPUS', 'uji coba edit dulu ya 1 ', 'PROSES', '2025-03-10', '2025-03-10 04:50:55', 'admin'),
('PJ0002', 'Hallo project', 1, '2025-03-09 04:38:48', 'admin', 'BARU', 'ini adalah project pertamaku', 'PROSES', '2025-03-13', NULL, NULL),
('PJ0004', 'PROJECT SKRIPSI', 1, '2025-03-11 17:00:01', 'admin', 'REVISI', NULL, '', NULL, '2025-04-17 06:26:30', 'admin'),
('PJ0004', 'PROJECT SKRIPSI', 1, '2025-04-17 06:26:30', 'admin', 'REVISI', '', 'PROSES', '2025-04-24', '2025-04-24 20:17:34', 'admin'),
('PJ0004', 'PROJECT SKRIPSI', 1, '2025-04-24 20:17:34', 'admin', 'BARU', 'INI ADALAH PROJECT KESEKIAN KALI YANG SUDAH AKU BUAT. SEMOGA BISA SELESAI YA', 'PROSES', '2025-04-26', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nj_tasks`
--

CREATE TABLE IF NOT EXISTS `nj_tasks` (
  `ID_TASK` varchar(255) DEFAULT NULL,
  `ID_PROJECTS` varchar(255) DEFAULT NULL,
  `JUDUL_TASK` varchar(255) DEFAULT NULL,
  `DESKRIPSI` text,
  `KATEGORI_TASK` varchar(255) DEFAULT NULL,
  `PRIORITAS` varchar(255) DEFAULT NULL,
  `PROGRES` varchar(255) DEFAULT NULL,
  `STATUS_SIMPAN` varchar(255) DEFAULT NULL,
  `WAKTU_INSERT` datetime DEFAULT NULL,
  `USER_INSERT` varchar(255) DEFAULT NULL,
  `WAKTU_UPDATE` datetime DEFAULT NULL,
  `USER_UPDATE` varchar(255) DEFAULT NULL,
  `FILE` varchar(255) DEFAULT NULL,
  `DEADLINE` date DEFAULT NULL,
  `ID_USERS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nj_tasks`
--

INSERT INTO `nj_tasks` (`ID_TASK`, `ID_PROJECTS`, `JUDUL_TASK`, `DESKRIPSI`, `KATEGORI_TASK`, `PRIORITAS`, `PROGRES`, `STATUS_SIMPAN`, `WAKTU_INSERT`, `USER_INSERT`, `WAKTU_UPDATE`, `USER_UPDATE`, `FILE`, `DEADLINE`, `ID_USERS`) VALUES
('TS0001', 'PJ0002', 'task pertama', 'deskripsi task pertama', 'Penulisan', 'Sedang', 'Belum Dikerjakan', 'REVISI', '2025-03-09 11:38:42', 'admin', '2025-03-10 04:00:11', 'admin', NULL, '2025-03-09', 1),
('TS0002', 'PJ0002', 'task kedua', 'deskripsi task kedua', 'Penelitian', 'Tinggi', 'Sedang Dikerjakan', 'HAPUS', '2025-03-09 11:39:13', 'admin', '2025-03-10 11:01:50', 'admin', NULL, '2025-03-09', 1),
('TS0003', 'PJ0002', 'task ketiga', 'deskripsi task ketiga uji coba ya', 'Revisi', 'Sedang', 'Sedang Dikerjakan', 'HAPUS', '2025-03-09 11:41:31', 'admin', '2025-03-09 14:27:42', 'admin', NULL, '2025-03-11', 1),
('TS0004', 'PJ0002', 'task keempat', 'deskripsi task ke empat uji coba ', 'Penulisan', 'Tinggi', 'Sedang Dikerjakan', 'HAPUS', '2025-03-09 11:41:57', 'admin', '2025-03-09 14:27:46', 'admin', NULL, '2025-03-10', 1),
('TS0005', 'PJ0002', 'task kelima', 'ini sedang di coba untuk task kelima', 'Penelitian', 'Tinggi', 'Sedang Dikerjakan', 'HAPUS', '2025-03-09 13:13:42', 'admin', '2025-03-09 14:27:29', 'admin', NULL, '2025-03-13', 1),
('TS0006', 'PJ0002', 'TASK ENAM', 'ini aku buat baru lagi task keenam untuk uji coba', NULL, NULL, NULL, 'HAPUS', '2025-03-09 13:47:57', 'admin', '2025-03-09 14:27:27', 'admin', NULL, '0000-00-00', 1),
('TS0007', 'PJ0002', 'task ketujuh', 'hallo ini task ku hari ini', 'Penelitian', 'Sedang', 'Sedang Dikerjakan', 'HAPUS', '2025-03-09 13:48:47', 'admin', '2025-03-09 14:27:44', 'admin', NULL, '2025-03-10', 1),
('TS0008', 'PJ0002', 'task kedelapan', 'ini test aja ya', 'Penelitian', 'Sedang', 'Selesai', 'HAPUS', '2025-03-09 13:49:53', 'admin', '2025-03-10 11:01:54', 'admin', NULL, '2025-03-12', 1),
('TS0009', 'PJ0002', 'task kesembilan', 'ini mau coba untuk modal tambah task baru ini ketutup kalo berhasil', 'Penelitian', 'Sedang', 'Belum Dikerjakan', 'HAPUS', '2025-03-09 13:53:38', 'admin', '2025-03-09 14:27:33', 'admin', NULL, '2025-03-09', 1),
('TS0010', 'PJ0002', 'sepuluh', 'ini percobaan berikutnya untuk hapus modal ini', 'Penulisan', 'Sedang', 'Sedang Dikerjakan', 'HAPUS', '2025-03-09 13:55:23', 'admin', '2025-03-11 15:27:06', 'admin', NULL, '2025-03-09', 1),
('TS0011', 'PJ0002', 'sepuluh1', 'ini percobaan berikutnya untuk hapus modal ini', 'Penulisan', 'Sedang', 'Sedang Dikerjakan', 'HAPUS', '2025-03-09 13:56:26', 'admin', '2025-03-11 15:25:18', 'admin', NULL, '2025-03-09', 1),
('TS0012', 'PJ0002', 'task 11', 'ini uji coba kesekian kali untuk modal', 'Penulisan', 'Sedang', 'Sedang Dikerjakan', 'REVISI', '2025-03-09 13:59:10', 'admin', '2025-03-11 16:11:37', 'admin', NULL, '2025-03-09', 1),
('TS0013', 'PJ0002', 'task 12', 'ini coba lagi ya', 'Penelitian', 'Sedang', 'Selesai', 'HAPUS', '2025-03-09 14:11:35', 'admin', '2025-04-18 01:48:32', 'admin', NULL, '2025-03-10', 1),
('TS0014', 'PJ0002', 'task 13', 'coba kesekian kalinya', 'Penelitian', 'Sedang', 'Sedang Dikerjakan', 'HAPUS', '2025-03-09 14:24:45', 'admin', '2025-04-18 01:48:41', 'admin', NULL, '2025-03-09', 1),
('TS0015', 'PJ0002', 'task15', 'lagi lagi dan lagi', 'Penelitian', 'Sedang', 'Selesai', 'HAPUS', '2025-03-09 14:26:04', 'admin', '2025-04-18 01:47:04', 'admin', NULL, '2025-03-09', 1),
('TS0001', 'PJ0002', 'task pertama1', 'deskripsi task pertama', 'Penulisan', 'Tinggi', 'Belum Dikerjakan', 'HAPUS', '2025-03-10 04:00:11', 'admin', '2025-04-18 01:48:37', 'admin', NULL, '2025-03-11', 1),
('TS0016', 'PJ0003', 'test task pertama dari rival project', 'ini uji coba hapus project ya', 'Revisi', 'Rendah', 'Sedang Dikerjakan', 'BARU', '2025-03-10 04:50:40', 'admin', '2025-03-10 04:50:55', 'admin', NULL, '2025-03-10', 1),
('TS0017', 'PJ0002', 'kerjain bab 1', 'target :\ndsfsgsgsgdf', 'Penulisan', 'Rendah', 'Sedang Dikerjakan', 'REVISI', '2025-03-10 10:57:22', 'admin', '2025-03-10 10:57:44', 'admin', NULL, '2025-03-10', 1),
('TS0017', 'PJ0002', 'kerjain bab 1', 'target :\ndsfsgsgsgdf', 'Penulisan', 'Rendah', 'Selesai', 'HAPUS', '2025-03-10 10:57:44', 'admin', '2025-04-18 01:47:27', 'admin', NULL, '2025-03-10', 1),
('TS0012', 'PJ0002', 'task 11 12', 'ini uji coba kesekian kali untuk modal', 'Penulisan', 'Sedang', 'Sedang Dikerjakan', 'HAPUS', '2025-03-11 16:11:37', 'admin', '2025-04-18 01:48:27', 'admin', NULL, '2025-03-09', 1),
('TS0018', 'PJ0004', 'kerjain revisi bab 1', 'hallo ini uji coba kok', 'Penelitian', 'Sedang', 'Sedang Dikerjakan', 'HAPUS', '2025-03-11 17:02:39', 'admin', '2025-04-18 01:47:33', 'admin', NULL, '2025-03-11', 1),
('TS0019', 'PJ0004', '18', 'ini adalah task ke sekian', 'Penelitian', 'Sedang', 'Selesai', 'HAPUS', '2025-03-11 17:21:14', 'admin', '2025-04-18 01:47:17', 'admin', NULL, '2025-03-19', 1),
('TS0020', 'PJ0002', 'uji coba todo list task', 'ini lagi mau coba penambahan todo list dalam ask', 'Penelitian', 'Sedang', 'Sedang Dikerjakan', 'REVISI', '2025-04-18 01:50:18', 'admin', '2025-04-19 00:28:11', 'admin', NULL, '2025-04-20', 1),
('TS0020', 'PJ0002', 'uji coba todo list task', 'ini lagi mau coba penambahan todo list dalam ask', 'Penelitian', 'Sedang', 'Sedang Dikerjakan', 'REVISI', '2025-04-19 00:28:11', 'admin', '2025-04-19 00:42:43', 'admin', NULL, '2025-04-20', 1),
('TS0020', 'PJ0002', 'uji coba todo list task', 'ini lagi mau coba penambahan todo list dalam ask', 'Penelitian', 'Sedang', 'Sedang Dikerjakan', 'BARU', '2025-04-19 00:42:43', 'admin', '2025-04-19 00:44:25', 'admin', NULL, '2025-04-20', 1),
('TS0021', 'PJ0004', 'ini uji coba ya', 'todolist udah bisa di croscheck loh', 'Penulisan', 'Sedang', 'Sedang Dikerjakan', 'REVISI', '2025-04-23 20:50:30', 'admin', '2025-04-23 22:50:25', 'admin', NULL, '2025-04-23', 1),
('TS0021', 'PJ0004', 'ini uji coba ya', 'todolist udah bisa di croscheck loh', 'Penulisan', 'Sedang', 'Sedang Dikerjakan', 'REVISI', '2025-04-23 22:50:25', 'admin', '2025-04-23 22:50:36', 'admin', NULL, '2025-04-23', 1),
('TS0021', 'PJ0004', 'ini uji coba ya', 'todolist udah bisa di croscheck loh', 'Penulisan', 'Sedang', 'Sedang Dikerjakan', 'BARU', '2025-04-23 22:50:36', 'admin', NULL, NULL, NULL, '2025-04-23', 1),
('TS0022', 'PJ0004', 'test task lagi', 'hallo ini test ke sekian', 'Penelitian', 'Tinggi', 'Sedang Dikerjakan', 'REVISI', '2025-04-23 22:52:39', 'admin', '2025-04-23 22:54:25', 'admin', NULL, '2025-04-24', 1),
('TS0022', 'PJ0004', 'test task lagi', 'hallo ini test ke sekian', 'Penelitian', 'Tinggi', 'Sedang Dikerjakan', 'REVISI', '2025-04-23 22:54:25', 'admin', '2025-04-24 19:46:49', 'admin', NULL, '2025-04-24', 1),
('TS0023', 'PJ0002', 'hallo project', 'ini lagi uji coba juga', 'Penelitian', NULL, NULL, 'REVISI', '2025-04-23 22:56:12', 'admin', '2025-04-23 22:58:54', 'admin', NULL, '2025-04-24', 1),
('TS0024', 'PJ0002', 'test test', 'hallo hai hello', 'Revisi', 'Rendah', 'Sedang Dikerjakan', 'BARU', '2025-04-23 22:58:35', 'admin', NULL, NULL, NULL, '2025-04-23', 1),
('TS0023', 'PJ0002', 'hallo project', 'ini lagi uji coba juga', 'Penelitian', 'Sedang', 'Belum Dikerjakan', 'REVISI', '2025-04-23 22:58:54', 'admin', '2025-04-24 19:59:25', 'admin', NULL, '2025-04-24', 1),
('TS0022', NULL, 'test task lagi', 'hallo ini test ke sekian', 'Penelitian', 'Tinggi', 'Sedang Dikerjakan', 'REVISI', '2025-04-23 23:13:16', 'admin', '2025-04-24 19:46:49', 'admin', NULL, '2025-04-24', 1),
('TS0022', NULL, 'test task lagi', 'hallo ini test ke sekian', 'Penelitian', 'Tinggi', 'Sedang Dikerjakan', 'REVISI', '2025-04-23 23:17:08', 'admin', '2025-04-24 19:46:49', 'admin', NULL, '2025-04-24', 1),
('TS0025', NULL, 'test task uji coba', 'mau mengecek inputan task untuk tersimpan di database', 'Penulisan', 'Sedang', 'Sedang Dikerjakan', 'BARU', '2025-04-23 23:23:09', 'admin', NULL, NULL, NULL, '2025-04-24', 1),
('TS0026', 'PJ0002', 'TASK PART PROJECT', 'Memperbaiki bagian task yang ada di menu project', 'Penulisan', 'Sedang', 'Sedang Dikerjakan', 'REVISI', '2025-04-24 19:17:01', 'admin', '2025-04-24 19:30:39', 'admin', NULL, '2025-04-24', 1),
('TS0026', 'PJ0002', 'TASK PART PROJECT', 'Memperbaiki bagian task yang ada di menu project', 'Penulisan', 'Sedang', 'Sedang Dikerjakan', 'REVISI', '2025-04-24 19:30:39', 'admin', '2025-04-24 19:44:21', 'admin', NULL, '2025-04-24', 1),
('TS0026', 'PJ0002', 'TASK PART PROJECT', 'Memperbaiki bagian task yang ada di menu project', 'Penulisan', 'Sedang', 'Sedang Dikerjakan', 'REVISI', '2025-04-24 19:30:39', 'admin', '2025-04-24 19:44:21', 'admin', NULL, '2025-04-24', 1),
('TS0026', 'PJ0002', 'TASK PART PROJECT', 'Memperbaiki bagian task yang ada di menu project', 'Penulisan', 'Sedang', 'Sedang Dikerjakan', 'REVISI', '2025-04-24 19:44:21', 'admin', '2025-04-24 19:45:16', 'admin', NULL, '2025-04-24', 1),
('TS0026', 'PJ0002', 'TASK PART PROJECT', 'Memperbaiki bagian task yang ada di menu project', 'Penulisan', 'Sedang', 'Sedang Dikerjakan', 'REVISI', '2025-04-24 19:44:21', 'admin', '2025-04-24 19:45:16', 'admin', NULL, '2025-04-24', 1),
('TS0026', 'PJ0002', 'TASK PART PROJECT', 'Memperbaiki bagian task yang ada di menu project', 'Penulisan', 'Sedang', 'Sedang Dikerjakan', 'REVISI', '2025-04-24 19:45:16', 'admin', '2025-04-24 19:45:49', 'admin', NULL, '2025-04-24', 1),
('TS0026', 'PJ0002', 'TASK PART PROJECT', 'Memperbaiki bagian task yang ada di menu project', 'Penulisan', 'Sedang', 'Sedang Dikerjakan', 'REVISI', '2025-04-24 19:45:16', 'admin', '2025-04-24 19:45:49', 'admin', NULL, '2025-04-24', 1),
('TS0026', 'PJ0002', 'TASK PART PROJECT', 'Memperbaiki bagian task yang ada di menu project', 'Penulisan', 'Sedang', 'Sedang Dikerjakan', 'HAPUS', '2025-04-24 19:45:49', 'admin', '2025-04-24 19:58:58', 'admin', NULL, '2025-04-24', 1),
('TS0026', 'PJ0002', 'TASK PART PROJECT', 'Memperbaiki bagian task yang ada di menu project', 'Penulisan', 'Sedang', 'Sedang Dikerjakan', 'HAPUS', '2025-04-24 19:45:49', 'admin', '2025-04-24 19:58:58', 'admin', NULL, '2025-04-24', 1),
('TS0022', 'PJ0004', 'test task lagi', 'hallo ini test ke sekian', 'Penelitian', 'Tinggi', 'Sedang Dikerjakan', 'BARU', '2025-04-24 19:46:49', 'admin', NULL, NULL, NULL, '2025-04-24', 1),
('TS0022', 'PJ0004', 'test task lagi', 'hallo ini test ke sekian', 'Penelitian', 'Tinggi', 'Sedang Dikerjakan', 'BARU', '2025-04-24 19:46:49', 'admin', NULL, NULL, NULL, '2025-04-24', 1),
('TS0027', 'PJ0004', 'harusnya bisa si', 'ini coba id todolist yang belum beres', NULL, NULL, NULL, 'REVISI', '2025-04-24 19:48:15', 'admin', '2025-04-24 19:55:55', 'admin', NULL, '2025-04-24', 1),
('TS0027', 'PJ0004', 'harusnya bisa si', 'ini coba id todolist yang belum beres', 'Penulisan', 'Tinggi', 'Sedang Dikerjakan', 'BARU', '2025-04-24 19:55:55', 'admin', NULL, NULL, NULL, '2025-04-24', 1),
('TS0027', 'PJ0004', 'harusnya bisa si', 'ini coba id todolist yang belum beres', 'Penulisan', 'Tinggi', 'Sedang Dikerjakan', 'BARU', '2025-04-24 19:55:55', 'admin', NULL, NULL, NULL, '2025-04-24', 1),
('TS0023', 'PJ0002', 'hallo project', 'ini lagi uji coba juga', 'Penelitian', 'Sedang', 'Belum Dikerjakan', 'REVISI', '2025-04-24 19:59:25', 'admin', '2025-04-24 20:03:58', 'admin', NULL, '2025-04-24', 1),
('TS0023', NULL, 'hallo project', 'ini lagi uji coba juga', 'Penelitian', 'Sedang', 'Belum Dikerjakan', 'REVISI', '2025-04-24 19:59:25', 'admin', '2025-04-24 20:03:58', 'admin', NULL, '2025-04-24', 1),
('TS0023', 'PJ0002', 'hallo project', 'ini lagi uji coba juga', 'Penelitian', 'Sedang', 'Belum Dikerjakan', 'REVISI', '2025-04-24 20:03:58', 'admin', '2025-04-24 20:05:36', 'admin', NULL, '2025-04-24', 1),
('TS0023', 'PJ0002', 'hallo project', 'ini lagi uji coba juga', 'Penelitian', 'Sedang', 'Sedang Dikerjakan', 'REVISI', '2025-04-24 20:05:36', 'admin', '2025-04-24 20:06:39', 'admin', NULL, '2025-04-24', 1),
('TS0023', 'PJ0002', 'hallo project', 'ini lagi uji coba juga', 'Penelitian', 'Sedang', 'Sedang Dikerjakan', 'REVISI', '2025-04-24 20:06:39', 'admin', '2025-04-24 20:07:10', 'admin', NULL, '2025-04-24', 1),
('TS0023', 'PJ0002', 'hallo project', 'ini lagi uji coba juga', 'Penelitian', 'Sedang', 'Sedang Dikerjakan', 'REVISI', '2025-04-24 20:07:10', 'admin', '2025-04-24 20:08:27', 'admin', NULL, '2025-04-24', 1),
('TS0023', 'PJ0002', 'hallo project', 'ini lagi uji coba juga', 'Penelitian', 'Sedang', 'Sedang Dikerjakan', 'REVISI', '2025-04-24 20:08:27', 'admin', '2025-04-24 20:08:48', 'admin', NULL, '2025-04-24', 1),
('TS0023', 'PJ0002', 'hallo project', 'ini lagi uji coba juga', 'Penelitian', 'Sedang', 'Sedang Dikerjakan', 'REVISI', '2025-04-24 20:08:48', 'admin', '2025-04-24 20:09:18', 'admin', NULL, '2025-04-24', 1),
('TS0023', 'PJ0002', 'hallo project', 'ini lagi uji coba juga', 'Penelitian', 'Sedang', 'Sedang Dikerjakan', 'REVISI', '2025-04-24 20:09:18', 'admin', '2025-04-24 21:26:52', 'admin', NULL, '2025-04-24', 1),
('TS0028', 'PJ0004', 'APAKAH TASK INI URUTAN PERTAMA ?', 'Ini untuk mencoba urutan all task apakah berurutan sesuai waktu insert atau tidak', 'Penelitian', 'Tinggi', 'Sedang Dikerjakan', 'REVISI', '2025-04-24 20:16:01', 'admin', '2025-04-24 20:16:29', 'admin', NULL, '2025-04-26', 1),
('TS0028', 'PJ0004', 'APAKAH TASK INI URUTAN PERTAMA ? OKE BERHASIL URUTAN PERTAMA', 'Ini untuk mencoba urutan all task apakah berurutan sesuai waktu insert atau tidak', 'Penelitian', 'Tinggi', 'Sedang Dikerjakan', 'REVISI', '2025-04-24 20:16:29', 'admin', '2025-04-24 21:21:56', 'admin', NULL, '2025-04-26', 1),
('TS0028', 'PJ0004', 'APAKAH TASK INI URUTAN PERTAMA ? OKE BERHASIL URUTAN PERTAMA', 'Ini untuk mencoba urutan all task apakah berurutan sesuai waktu insert atau tidak', 'Penelitian', 'Tinggi', 'Selesai', 'BARU', '2025-04-24 21:21:56', 'admin', NULL, NULL, NULL, '2025-04-26', 1),
('TS0023', 'PJ0002', 'hallo project', 'ini lagi uji coba juga', 'Penelitian', 'Sedang', 'Selesai', 'BARU', '2025-04-24 21:26:52', 'admin', NULL, NULL, NULL, '2025-04-24', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nj_todolist`
--

CREATE TABLE IF NOT EXISTS `nj_todolist` (
  `ID_TODO_TASK` varchar(255) DEFAULT NULL,
  `ID_TASK` varchar(255) DEFAULT NULL,
  `NAMA_TODO` text,
  `IS_DONE` int(11) DEFAULT '0',
  `WAKTU_INSERT` datetime DEFAULT NULL,
  `USER_INSERT` varchar(255) DEFAULT NULL,
  `WAKTU_UPDATE` datetime DEFAULT NULL,
  `USER_UPDATE` varchar(255) DEFAULT NULL,
  `ID_USER` varchar(255) DEFAULT NULL,
  `STATUS_SIMPAN` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nj_todolist`
--

INSERT INTO `nj_todolist` (`ID_TODO_TASK`, `ID_TASK`, `NAMA_TODO`, `IS_DONE`, `WAKTU_INSERT`, `USER_INSERT`, `WAKTU_UPDATE`, `USER_UPDATE`, `ID_USER`, `STATUS_SIMPAN`) VALUES
('TD0001', 'TS0020', 'melakukan perubahan pada setting user', 0, '2025-04-18 01:50:18', 'admin', '2025-04-19 00:28:11', 'admin', '1', 'REVISI'),
('TD0002', 'TS0020', 'merombak rancangan todolist', 0, '2025-04-18 01:50:18', 'admin', '2025-04-19 00:28:11', 'admin', '1', 'REVISI'),
('TD0001', 'TS0020', 'melakukan perubahan pada setting user', 0, '2025-04-19 00:28:11', 'admin', '2025-04-19 00:42:43', 'admin', '1', 'REVISI'),
('TD0002', 'TS0020', 'merombak rancangan todolist', 0, '2025-04-19 00:28:11', 'admin', '2025-04-19 00:42:43', 'admin', '1', 'REVISI'),
('TD0001', 'TS0020', 'melakukan perubahan pada setting user', 1, '2025-04-19 00:42:43', 'admin', '2025-04-19 00:44:25', 'admin', '1', 'BARU'),
('TD0002', 'TS0020', 'merombak rancangan todolist', 0, '2025-04-19 00:42:43', 'admin', '2025-04-19 00:44:25', 'admin', '1', 'BARU'),
('TD0003', 'TS0021', 'todolist harus bisa disimpan saat simpan task', 0, '2025-04-23 20:50:30', 'admin', '2025-04-23 22:50:25', 'admin', '1', 'REVISI'),
('TD0004', 'TS0021', 'garis saat todolist selesai harus muncul', 1, '2025-04-23 20:50:30', 'admin', '2025-04-23 22:50:25', 'admin', '1', 'REVISI'),
('TD0005', 'TS0021', 'checkbox todolist harus bisa muncul', 1, '2025-04-23 20:50:30', 'admin', '2025-04-23 22:50:25', 'admin', '1', 'REVISI'),
('TD0003', 'TS0021', 'ini test nambah todo list di edit', 0, '2025-04-23 22:50:25', 'admin', '2025-04-23 22:50:36', 'admin', '1', 'REVISI'),
('TD0004', 'TS0021', 'todolist harus bisa disimpan saat simpan task', 1, '2025-04-23 22:50:25', 'admin', '2025-04-23 22:50:36', 'admin', '1', 'REVISI'),
('TD0005', 'TS0021', 'garis saat todolist selesai harus muncul', 1, '2025-04-23 22:50:25', 'admin', '2025-04-23 22:50:36', 'admin', '1', 'REVISI'),
('TD0003', 'TS0021', 'ini test nambah todo list di edit', 1, '2025-04-23 22:50:36', 'admin', NULL, NULL, '1', 'BARU'),
('TD0004', 'TS0021', 'todolist harus bisa disimpan saat simpan task', 1, '2025-04-23 22:50:36', 'admin', NULL, NULL, '1', 'BARU'),
('TD0005', 'TS0021', 'garis saat todolist selesai harus muncul', 1, '2025-04-23 22:50:36', 'admin', NULL, NULL, '1', 'BARU'),
('TD0006', 'TS0027', 'todolist kedua harusnya berurutan', 0, '2025-04-24 19:48:15', 'admin', '2025-04-24 19:55:55', 'admin', '1', 'REVISI'),
('TD0007', 'TS0027', 'ini todolist ke sekian harusnya ID nya bisa si', 1, '2025-04-24 19:48:15', 'admin', '2025-04-24 19:55:55', 'admin', '1', 'REVISI'),
('TD0006', 'TS0027', 'bisa dong akhirnya', 1, '2025-04-24 19:55:55', 'admin', NULL, NULL, '1', 'BARU'),
('TD0007', 'TS0027', 'todolist kedua harusnya berurutan', 1, '2025-04-24 19:55:55', 'admin', NULL, NULL, '1', 'BARU'),
('TD0008', 'TS0027', 'ini todolist ke sekian harusnya ID nya bisa si', 1, '2025-04-24 19:55:55', 'admin', NULL, NULL, '1', 'BARU'),
('TD0009', 'TS0023', 'ini coba lagi dari project', 0, '2025-04-24 19:59:25', 'admin', '2025-04-24 20:03:58', 'admin', '1', 'REVISI'),
('TD0009', 'TS0023', 'ini id pj nya sudah di temukan permasalahannya', 1, '2025-04-24 20:03:58', 'admin', '2025-04-24 20:05:36', 'admin', '1', 'REVISI'),
('TD0010', 'TS0023', 'ini coba lagi dari project', 1, '2025-04-24 20:03:58', 'admin', '2025-04-24 20:05:36', 'admin', '1', 'REVISI'),
('TD0009', 'TS0023', 'ini lagi uji coba simpan edit task', 0, '2025-04-24 20:05:36', 'admin', '2025-04-24 20:06:39', 'admin', '1', 'REVISI'),
('TD0010', 'TS0023', 'ini id pj nya sudah di temukan permasalahannya', 1, '2025-04-24 20:05:36', 'admin', '2025-04-24 20:06:39', 'admin', '1', 'REVISI'),
('TD0011', 'TS0023', 'ini coba lagi dari project', 1, '2025-04-24 20:05:36', 'admin', '2025-04-24 20:06:39', 'admin', '1', 'REVISI'),
('TD0009', 'TS0023', 'ini lagi uji coba simpan edit task', 1, '2025-04-24 20:06:39', 'admin', '2025-04-24 20:07:10', 'admin', '1', 'REVISI'),
('TD0010', 'TS0023', 'ini id pj nya sudah di temukan permasalahannya', 1, '2025-04-24 20:06:39', 'admin', '2025-04-24 20:07:10', 'admin', '1', 'REVISI'),
('TD0009', 'TS0023', 'ini lagi uji coba simpan edit task', 0, '2025-04-24 20:07:10', 'admin', '2025-04-24 20:08:27', 'admin', '1', 'REVISI'),
('TD0010', 'TS0023', 'ini id pj nya sudah di temukan permasalahannya', 1, '2025-04-24 20:07:10', 'admin', '2025-04-24 20:08:27', 'admin', '1', 'REVISI'),
('TD0009', 'TS0023', 'ini lagi uji coba simpan edit task', 1, '2025-04-24 20:08:27', 'admin', '2025-04-24 20:08:48', 'admin', '1', 'REVISI'),
('TD0010', 'TS0023', 'ini id pj nya sudah di temukan permasalahannya', 1, '2025-04-24 20:08:27', 'admin', '2025-04-24 20:08:48', 'admin', '1', 'REVISI'),
('TD0009', 'TS0023', 'ini id pj nya sudah di temukan permasalahannya', 1, '2025-04-24 20:08:48', 'admin', '2025-04-24 20:09:18', 'admin', '1', 'REVISI'),
('TD0012', 'TS0028', 'aku mau buat lagi', 0, '2025-04-24 20:16:01', 'admin', '2025-04-24 20:16:29', 'admin', '1', 'REVISI'),
('TD0013', 'TS0028', 'haiii ini kesekian kalinya aku buat todolist disini', 1, '2025-04-24 20:16:01', 'admin', '2025-04-24 20:16:29', 'admin', '1', 'REVISI'),
('TD0012', 'TS0028', 'aku mau buat lagi', 1, '2025-04-24 20:16:29', 'admin', '2025-04-24 21:21:56', 'admin', '1', 'REVISI'),
('TD0013', 'TS0028', 'haiii ini kesekian kalinya aku buat todolist disini', 1, '2025-04-24 20:16:29', 'admin', '2025-04-24 21:21:56', 'admin', '1', 'REVISI'),
('TD0012', 'TS0028', 'aku mau buat lagi', 1, '2025-04-24 21:21:56', 'admin', NULL, NULL, '1', 'BARU'),
('TD0013', 'TS0028', 'haiii ini kesekian kalinya aku buat todolist disini', 1, '2025-04-24 21:21:56', 'admin', NULL, NULL, '1', 'BARU');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nj_users`
--

CREATE TABLE IF NOT EXISTS `nj_users` (
  `ID_USER` int(11) NOT NULL,
  `NAMA` varchar(255) DEFAULT NULL,
  `USERNAME` varchar(255) DEFAULT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  `LEVEL` int(11) DEFAULT NULL,
  `TGL_INSERT` datetime DEFAULT NULL,
  `TGL_UPDATE` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nj_users`
--

INSERT INTO `nj_users` (`ID_USER`, `NAMA`, `USERNAME`, `PASSWORD`, `LEVEL`, `TGL_INSERT`, `TGL_UPDATE`) VALUES
(1, 'Jessi Kristin', 'jessjess', '$2y$10$ZSbSx3vnC16jrgW93U2bw.pq4OCCrtZPjotmS8H4I1UZCE7nc41wC', 1, NULL, NULL),
(2, 'user1', 'user1', '$2y$10$ZSbSx3vnC16jrgW93U2bw.pq4OCCrtZPjotmS8H4I1UZCE7nc41wC', 2, NULL, NULL),
(3, 'Karin Fujiyoshi', 'karinkarin', '$2y$10$8LSVgmb13Cn1b3JoZgFcV.Qiyxj8.EklZ7858z6AhGZG8HopgH0UW', 2, '2025-04-27 15:53:39', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nj_users`
--
ALTER TABLE `nj_users`
  ADD PRIMARY KEY (`ID_USER`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nj_users`
--
ALTER TABLE `nj_users`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
