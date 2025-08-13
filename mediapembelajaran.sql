-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Agu 2025 pada 16.17
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mediapembelajaran`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensis`
--

CREATE TABLE `absensis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_sesi` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `absensis`
--

INSERT INTO `absensis` (`id`, `nama_sesi`, `tanggal`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'senin', '2025-06-25', 1, '2025-06-25 09:41:07', '2025-06-25 09:41:07'),
(2, 'dsadasdasdasda', '2025-06-26', 1, '2025-06-25 11:19:35', '2025-06-25 11:19:35'),
(3, 'ambil absen', '2025-06-27', 1, '2025-06-25 11:46:29', '2025-06-25 11:46:29'),
(4, 'absen matematika', '2025-07-11', 1, '2025-07-10 18:13:47', '2025-07-10 18:13:47'),
(5, 'sadasdasda', '2025-07-12', 1, '2025-07-10 18:15:52', '2025-07-10 18:15:52'),
(6, 'dasdas', '2025-07-13', 1, '2025-07-10 18:16:37', '2025-07-10 18:16:37'),
(7, 'dsadasdasd', '2025-07-14', 1, '2025-07-10 18:20:26', '2025-07-10 18:20:26'),
(8, 'ini adalah absen buat malam hari', '2025-07-23', 1, '2025-07-23 06:15:31', '2025-07-23 06:15:31'),
(9, 'malam', '2025-08-12', 1, '2025-08-12 05:45:35', '2025-08-12 05:45:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `agenda_sekolahs`
--

CREATE TABLE `agenda_sekolahs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aktivitas`
--

CREATE TABLE `aktivitas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aktivitas_siswas`
--

CREATE TABLE `aktivitas_siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `aksi` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `aktivitas_siswas`
--

INSERT INTO `aktivitas_siswas` (`id`, `user_id`, `aksi`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kerjakan Kuis', 'Menyelesaikan kuis: ss', '2025-07-10 05:31:23', '2025-07-10 05:31:23'),
(2, 1, 'Kerjakan Kuis', 'Menyelesaikan kuis: bdsadasdasdasda', '2025-07-10 06:48:19', '2025-07-10 06:48:19'),
(3, 1, 'Kerjakan Kuis', 'Menyelesaikan kuis: bdsadasdasdasda', '2025-07-10 06:50:16', '2025-07-10 06:50:16'),
(4, 1, 'Kerjakan Kuis', 'Menyelesaikan kuis: bdsadasdasdasda', '2025-07-10 07:18:53', '2025-07-10 07:18:53'),
(5, 2, 'Buka Kuis', 'Membuka kuis: ss', '2025-07-10 07:23:20', '2025-07-10 07:23:20'),
(6, 2, 'Buka Kuis', 'Membuka kuis: bdsadasdasdasda', '2025-07-10 07:23:28', '2025-07-10 07:23:28'),
(7, 2, 'Kerjakan Kuis', 'Menyelesaikan kuis: bdsadasdasdasda', '2025-07-10 07:23:36', '2025-07-10 07:23:36'),
(8, 2, 'Buka Kuis', 'Membuka kuis: ini adalah judul kuis', '2025-07-10 10:18:48', '2025-07-10 10:18:48'),
(9, 2, 'Kerjakan Kuis', 'Menyelesaikan kuis: ini adalah judul kuis', '2025-07-10 10:18:53', '2025-07-10 10:18:53'),
(10, 2, 'Buka Tugas', 'Melihat tugas: sssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', '2025-07-10 17:21:27', '2025-07-10 17:21:27'),
(11, 2, 'Buka Tugas', 'Melihat tugas: sssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', '2025-07-10 17:38:31', '2025-07-10 17:38:31'),
(12, 2, 'Buka Tugas', 'Melihat tugas: sssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', '2025-07-10 17:38:45', '2025-07-10 17:38:45'),
(13, 2, 'Buka Tugas', 'Melihat tugas: sssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', '2025-07-10 17:38:53', '2025-07-10 17:38:53'),
(14, 2, 'Buka Tugas', 'Melihat tugas: sssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', '2025-07-10 17:39:38', '2025-07-10 17:39:38'),
(15, 2, 'Buka Tugas', 'Melihat tugas: sssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', '2025-07-10 17:42:31', '2025-07-10 17:42:31'),
(16, 2, 'Kumpul Tugas', 'Mengumpulkan tugas: sssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', '2025-07-10 17:42:37', '2025-07-10 17:42:37'),
(17, 2, 'Buka Tugas', 'Melihat tugas: sssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', '2025-07-10 17:42:38', '2025-07-10 17:42:38'),
(18, 2, 'Buka Tugas', 'Melihat tugas: sssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', '2025-07-10 17:42:52', '2025-07-10 17:42:52'),
(19, 2, 'Buka Tugas', 'Melihat tugas: sssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', '2025-07-10 17:44:03', '2025-07-10 17:44:03'),
(20, 2, 'Buka Tugas', 'Melihat tugas: sssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', '2025-07-10 17:44:13', '2025-07-10 17:44:13'),
(21, 2, 'Buka Tugas', 'Melihat tugas: sssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', '2025-07-10 17:44:34', '2025-07-10 17:44:34'),
(22, 2, 'Buka Tugas', 'Melihat tugas: dsad', '2025-07-10 17:44:40', '2025-07-10 17:44:40'),
(23, 2, 'Kumpul Tugas', 'Mengumpulkan tugas: dsad', '2025-07-10 17:44:47', '2025-07-10 17:44:47'),
(24, 2, 'Absen', 'Mengisi absensi sesi: absen matematika', '2025-07-10 18:27:30', '2025-07-10 18:27:30'),
(25, 2, 'Buka Kuis', 'Membuka kuis: ini adalah judul kuis', '2025-07-10 21:16:10', '2025-07-10 21:16:10'),
(26, 2, 'Buka Materi', 'Membuka materi: assssssss', '2025-07-11 01:07:42', '2025-07-11 01:07:42'),
(27, 2, 'Buka Materi', 'Membuka materi: assssssss', '2025-07-11 01:38:35', '2025-07-11 01:38:35'),
(28, 2, 'Buka Materi', 'Membuka materi: assssssss', '2025-07-11 01:39:51', '2025-07-11 01:39:51'),
(29, 2, 'Buka Kuis', 'Membuka kuis: ini adalah judul kuis', '2025-07-11 03:01:00', '2025-07-11 03:01:00'),
(30, 2, 'Buka Kuis', 'Membuka kuis: ini adalah judul kuis', '2025-07-11 03:34:22', '2025-07-11 03:34:22'),
(31, 2, 'Buka Kuis', 'Membuka kuis: ini adalah judul kuis', '2025-07-11 03:36:35', '2025-07-11 03:36:35'),
(32, 2, 'Kerjakan Kuis', 'Menyelesaikan kuis: ini adalah judul kuis', '2025-07-11 03:37:58', '2025-07-11 03:37:58'),
(33, 2, 'Kerjakan Kuis', 'Menyelesaikan kuis: ini adalah judul kuis', '2025-07-11 03:46:49', '2025-07-11 03:46:49'),
(34, 2, 'Kerjakan Kuis', 'Menyelesaikan kuis: ini adalah judul kuis', '2025-07-11 03:46:55', '2025-07-11 03:46:55'),
(35, 2, 'Buka Kuis', 'Membuka kuis: ini adalah judul kuis', '2025-07-11 03:48:00', '2025-07-11 03:48:00'),
(36, 2, 'Kerjakan Kuis', 'Menyelesaikan kuis: ini adalah judul kuis', '2025-07-11 03:48:09', '2025-07-11 03:48:09'),
(37, 2, 'Kerjakan Kuis', 'Menyelesaikan kuis: ini adalah judul kuis', '2025-07-11 03:49:07', '2025-07-11 03:49:07'),
(38, 2, 'Kerjakan Kuis', 'Menyelesaikan kuis: ini adalah judul kuis', '2025-07-11 03:50:36', '2025-07-11 03:50:36'),
(39, 2, 'Buka Kuis', 'Membuka kuis: bdsadasdasdasda', '2025-07-11 03:50:58', '2025-07-11 03:50:58'),
(40, 2, 'Buka Kuis', 'Membuka kuis: ini adalah judul kuis', '2025-07-11 04:01:43', '2025-07-11 04:01:43'),
(41, 2, 'Kerjakan Kuis', 'Menyelesaikan kuis: ini adalah judul kuis', '2025-07-11 04:03:14', '2025-07-11 04:03:14'),
(42, 2, 'Buka Tugas', 'Melihat tugas: dd', '2025-07-11 17:58:34', '2025-07-11 17:58:34'),
(43, 2, 'Buka Kuis', 'Membuka kuis: ini adalah judul kuis', '2025-07-11 23:41:25', '2025-07-11 23:41:25'),
(44, 2, 'Buka Kuis', 'Membuka kuis: ini adalah judul kuis', '2025-07-11 23:42:38', '2025-07-11 23:42:38'),
(45, 2, 'Buka Kuis', 'Membuka kuis: ini adalah judul kuis', '2025-07-11 23:42:44', '2025-07-11 23:42:44'),
(46, 2, 'Kerjakan Kuis', 'Menyelesaikan kuis: ini adalah judul kuis', '2025-07-11 23:42:52', '2025-07-11 23:42:52'),
(47, 2, 'Kerjakan Kuis', 'Menyelesaikan kuis: ini adalah judul kuis', '2025-07-11 23:43:49', '2025-07-11 23:43:49'),
(48, 2, 'Buka Kuis', 'Membuka kuis: ini adalah judul kuis', '2025-07-11 23:44:18', '2025-07-11 23:44:18'),
(49, 2, 'Kerjakan Kuis', 'Menyelesaikan kuis: ini adalah judul kuis', '2025-07-11 23:44:25', '2025-07-11 23:44:25'),
(50, 2, 'Buka Tugas', 'Melihat tugas: ss', '2025-07-12 00:09:33', '2025-07-12 00:09:33'),
(51, 2, 'Buka Tugas', 'Melihat tugas: ss', '2025-07-12 00:11:10', '2025-07-12 00:11:10'),
(52, 2, 'Buka Tugas', 'Melihat tugas: ss', '2025-07-12 00:11:31', '2025-07-12 00:11:31'),
(53, 2, 'Kumpul Tugas', 'Mengumpulkan tugas: ss', '2025-07-12 00:11:46', '2025-07-12 00:11:46'),
(54, 2, 'Absen', 'Mengisi absensi sesi: sadasdasda', '2025-07-12 02:54:15', '2025-07-12 02:54:15'),
(55, 2, 'Buka Kuis', 'Membuka kuis: ini adalah judul kuis', '2025-07-12 03:25:52', '2025-07-12 03:25:52'),
(56, 2, 'Buka Kuis', 'Membuka kuis: ini adalah judul kuis', '2025-07-12 03:26:10', '2025-07-12 03:26:10'),
(57, 2, 'Buka Kuis', 'Membuka kuis: ini adalah judul kuis', '2025-07-12 05:44:01', '2025-07-12 05:44:01'),
(58, 2, 'Kerjakan Kuis', 'Menyelesaikan kuis: ini adalah judul kuis', '2025-07-12 05:44:08', '2025-07-12 05:44:08'),
(59, 2, 'Buka Tugas', 'Melihat tugas: s', '2025-07-12 05:44:32', '2025-07-12 05:44:32'),
(60, 2, 'Kumpul Tugas', 'Mengumpulkan tugas: s', '2025-07-12 05:44:54', '2025-07-12 05:44:54'),
(61, 2, 'Absen', 'Mengisi absensi sesi: ini adalah absen buat malam hari', '2025-07-23 06:16:03', '2025-07-23 06:16:03'),
(62, 2, 'Buka Kuis', 'Membuka kuis: ini adalah judul kuis', '2025-07-23 08:10:26', '2025-07-23 08:10:26'),
(63, 2, 'Buka Tugas', 'Melihat tugas: s', '2025-07-23 08:10:49', '2025-07-23 08:10:49'),
(64, 2, 'Buka Kuis', 'Membuka kuis: ini adalah judul kuis', '2025-07-27 18:25:37', '2025-07-27 18:25:37'),
(65, 2, 'Buka Kuis', 'Membuka kuis: ini adalah judul kuis', '2025-07-27 18:25:50', '2025-07-27 18:25:50'),
(66, 2, 'Kerjakan Kuis', 'Menyelesaikan kuis: ini adalah judul kuis', '2025-07-27 18:25:58', '2025-07-27 18:25:58'),
(67, 2, 'Buka Tugas', 'Melihat tugas: s', '2025-07-27 18:27:08', '2025-07-27 18:27:08'),
(68, 2, 'Buka Kuis', 'Membuka kuis: ini adalah judul kuis', '2025-08-03 19:36:18', '2025-08-03 19:36:18'),
(69, 2, 'Buka Tugas', 'Melihat tugas: s', '2025-08-08 23:27:58', '2025-08-08 23:27:58'),
(70, 2, 'Buka Tugas', 'Melihat tugas: s', '2025-08-08 23:31:28', '2025-08-08 23:31:28'),
(71, 2, 'Buka Kuis', 'Membuka kuis: ini adalah judul kuis', '2025-08-10 01:49:33', '2025-08-10 01:49:33'),
(72, 2, 'Buka Kuis', 'Membuka kuis: kuis 1', '2025-08-10 23:45:07', '2025-08-10 23:45:07'),
(73, 2, 'Kerjakan Kuis', 'Menyelesaikan kuis: kuis 1', '2025-08-10 23:46:30', '2025-08-10 23:46:30'),
(74, 2, 'Buka Kuis', 'Membuka kuis: kuis 1', '2025-08-11 02:52:45', '2025-08-11 02:52:45'),
(75, 2, 'Kerjakan Kuis', 'Menyelesaikan kuis: kuis 1', '2025-08-11 02:53:15', '2025-08-11 02:53:15'),
(76, 1, 'Kerjakan Kuis', 'Menyelesaikan kuis: dsaddsadasdas', '2025-08-12 04:23:36', '2025-08-12 04:23:36'),
(77, 2, 'Buka Tugas', 'Melihat tugas: Tugas Individu', '2025-08-12 05:45:14', '2025-08-12 05:45:14'),
(78, 2, 'Absen', 'Mengisi absensi sesi: malam', '2025-08-12 05:45:40', '2025-08-12 05:45:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `games`
--

CREATE TABLE `games` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawabans`
--

CREATE TABLE `jawabans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pertanyaan_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `jawaban_dipilih` varchar(255) NOT NULL,
  `benar` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jawabans`
--

INSERT INTO `jawabans` (`id`, `pertanyaan_id`, `user_id`, `jawaban_dipilih`, `benar`, `created_at`, `updated_at`) VALUES
(92, 63, 2, 'A', 0, '2025-08-10 23:46:30', '2025-08-10 23:46:30'),
(93, 64, 2, 'A', 0, '2025-08-10 23:46:30', '2025-08-10 23:46:30'),
(94, 65, 2, 'B', 1, '2025-08-10 23:46:30', '2025-08-10 23:46:30'),
(95, 66, 2, 'D', 1, '2025-08-10 23:46:30', '2025-08-10 23:46:30'),
(96, 67, 2, 'B', 1, '2025-08-10 23:46:30', '2025-08-10 23:46:30'),
(97, 68, 2, 'A', 0, '2025-08-10 23:46:30', '2025-08-10 23:46:30'),
(98, 69, 2, 'A', 0, '2025-08-10 23:46:30', '2025-08-10 23:46:30'),
(99, 70, 2, 'B', 0, '2025-08-10 23:46:30', '2025-08-10 23:46:30'),
(100, 71, 2, 'B', 1, '2025-08-10 23:46:30', '2025-08-10 23:46:30'),
(101, 72, 2, 'B', 1, '2025-08-10 23:46:30', '2025-08-10 23:46:30'),
(102, 63, 2, 'D', 0, '2025-08-11 02:53:15', '2025-08-11 02:53:15'),
(103, 64, 2, 'B', 0, '2025-08-11 02:53:15', '2025-08-11 02:53:15'),
(104, 65, 2, 'B', 1, '2025-08-11 02:53:15', '2025-08-11 02:53:15'),
(105, 66, 2, 'B', 0, '2025-08-11 02:53:15', '2025-08-11 02:53:15'),
(106, 67, 2, 'A', 0, '2025-08-11 02:53:15', '2025-08-11 02:53:15'),
(107, 68, 2, 'B', 1, '2025-08-11 02:53:15', '2025-08-11 02:53:15'),
(108, 69, 2, 'A', 0, '2025-08-11 02:53:15', '2025-08-11 02:53:15'),
(109, 70, 2, 'A', 1, '2025-08-11 02:53:15', '2025-08-11 02:53:15'),
(110, 71, 2, 'B', 1, '2025-08-11 02:53:15', '2025-08-11 02:53:15'),
(111, 72, 2, 'B', 1, '2025-08-11 02:53:15', '2025-08-11 02:53:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama`, `created_at`, `updated_at`, `icon`) VALUES
(6, 'Matematika', '2025-08-03 19:46:53', '2025-08-03 19:46:53', 'fas fa-square-root-alt'),
(7, 'Bahasa Indonesia', '2025-08-03 19:46:53', '2025-08-03 19:46:53', 'fas fa-book'),
(8, 'IPA', '2025-08-03 19:46:53', '2025-08-03 19:46:53', 'fas fa-flask'),
(9, 'IPS', '2025-08-03 19:46:53', '2025-08-03 19:46:53', 'fas fa-globe-asia'),
(10, 'Bahasa Inggris', '2025-08-03 19:46:53', '2025-08-03 19:46:53', 'fas fa-language');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kehadirans`
--

CREATE TABLE `kehadirans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `absensi_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `waktu_hadir` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kehadirans`
--

INSERT INTO `kehadirans` (`id`, `absensi_id`, `user_id`, `waktu_hadir`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2025-06-25 09:42:26', '2025-06-25 09:42:26', '2025-06-25 09:42:26'),
(2, 2, 2, '2025-06-25 21:12:08', '2025-06-25 21:12:08', '2025-06-25 21:12:08'),
(4, 4, 2, '2025-07-10 18:27:30', '2025-07-10 18:27:30', '2025-07-10 18:27:30'),
(5, 5, 2, '2025-07-12 02:54:15', '2025-07-12 02:54:15', '2025-07-12 02:54:15'),
(6, 8, 2, '2025-07-23 06:16:03', '2025-07-23 06:16:03', '2025-07-23 06:16:03'),
(7, 9, 2, '2025-08-12 05:45:40', '2025-08-12 05:45:40', '2025-08-12 05:45:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentars`
--

CREATE TABLE `komentars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `materi_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `isi` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuis`
--

CREATE TABLE `kuis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kuis`
--

INSERT INTO `kuis` (`id`, `judul`, `deskripsi`, `user_id`, `created_at`, `updated_at`, `link`) VALUES
(8, 'kuis 4', 'Silahkankerjakan kuis dibawah ini dengan benar!', 1, '2025-08-10 08:28:23', '2025-08-10 08:28:23', NULL),
(9, 'Kuis 3', 'Silahkan dijawab dengan benar!', 1, '2025-08-10 08:35:53', '2025-08-10 08:35:53', NULL),
(10, 'Kuis 2', 'Silahkan jawab dengan benar kuis ini!', 1, '2025-08-10 08:43:03', '2025-08-12 05:25:43', NULL),
(11, 'kuis 1', 'Silahkan jawab dengan benar kuis dibawah ini!', 1, '2025-08-10 08:48:52', '2025-08-11 23:15:23', NULL),
(27, 'Kuis asik 1', 'Silahkan mainkan game dibawah ini dengan menjawab pertanyaan dengan benar!', 1, '2025-08-12 06:40:34', '2025-08-12 06:40:34', 'https://quiz.zep.us/id/play/AOPB35'),
(28, 'Kuis asik 2', 'Silahakan mainkan game ini dengan menjawab soal dengan benar!', 1, '2025-08-12 06:41:25', '2025-08-12 06:41:25', 'https://quiz.zep.us/id/play/mkxRZq');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materis`
--

CREATE TABLE `materis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `link_wordwall` varchar(255) DEFAULT NULL,
  `kategori_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `poin_penting` text DEFAULT NULL,
  `kesimpulan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `materis`
--

INSERT INTO `materis` (`id`, `judul`, `deskripsi`, `link_wordwall`, `kategori_id`, `user_id`, `created_at`, `updated_at`, `icon`, `poin_penting`, `kesimpulan`) VALUES
(34, 'D. Melakukan Pemeliharaan Alat Ukur dalam Lingkup Pekerjaan Teknik Jaringan Komputer dan Telekomunikasi', 'Capaian Pembelajaran:\r\nPada akhir fase E, peserta didik mampu menggunakan alat ukur, termasuk pemeliharaan alat ukur untuk seluruh jaringan komputer dan sistem telekomunikasi\r\n\r\nTujuan Pembelajaran:\r\nMenerapkan pemeliharaan alat ukur untuk sistem telekomunikasi', NULL, NULL, 1, '2025-08-10 04:29:09', '2025-08-12 07:13:09', 'icons/icons_689b4bf565dc8.png', 'Poin Penting dari Materi “Pemeliharaan Alat Ukur”\r\n\r\n1. Pengetahuan Dasar\r\n   a. Pemeliharaan diperlukan agar alat ukur tetap awet, akurat, dan siap digunakan.\r\n   b. Jenis pemeliharaan: preventif, korektif, dan prediktif.\r\n   c. Ikuti prosedur dari buku manual alat saat merawat alat ukur.\r\n   d. Penyimpanan di tempat yang aman: hindari suhu ekstrem, kelembapan tinggi, medan magnet, dan getaran      berlebih.\r\n   e. Pemeriksaan kondisi alat sebelum digunakan sangat penting.\r\n\r\n2. Keterampilan yang Dibutuhkan\r\n    a. Melaksanakan tugas rutin sesuai prosedur.\r\n    b. Mampu bekerja mandiri tanpa arahan langsung.\r\n    c. Mengatur pekerjaan kompleks dan bertanggung jawab terhadap hasil kerja tim.\r\n\r\n3. Sikap Kerja\r\n   a. Cermat saat menggunakan alat, terutama yang berhubungan dengan listrik.\r\n   b. Pastikan kabel/probe dalam kondisi baik.\r\n   c. Alat harus dikalibrasi dengan benar.\r\n   d. Perhatikan keselamatan kerja untuk mencegah kecelakaan.\r\n   e. Gunakan catuan sesuai spesifikasi alat.\r\n   f.  Update perangkat lunak alat ukur bila diperlukan.\r\n\r\n4. Praktik dan Uji Kompetensi\r\n   a. Pengukuran konektivitas kabel LAN dengan LAN tester.\r\n   b. Pengukuran tegangan DC, arus DC, dan resistansi dengan multimeter.\r\n   c. Pengukuran grounding dengan earth tester.\r\n   e. Pengukuran daya optik dengan Optical Power Meter (OPM).\r\n   f. Pengukuran jarak gangguan pada kabel optik dengan OTDR.\r\n   g. Semua praktik disertai prosedur kerja, tabel hasil pengukuran, dan kesimpulan.', 'Pemeliharaan alat ukur adalah kegiatan penting untuk memastikan peralatan tetap dalam kondisi optimal, akurat, dan aman digunakan, baik di sekolah maupun di dunia kerja. Hal ini melibatkan pengetahuan teknis, keterampilan praktik, dan sikap kerja yang baik. Prosesnya meliputi perawatan sesuai manual, penyimpanan yang benar, pemeriksaan sebelum digunakan, dan pelaksanaan prosedur pengukuran yang tepat pada berbagai jenis alat ukur. Dengan pemeliharaan yang baik, produktivitas kerja dapat terjaga dan risiko kerusakan alat berkurang.'),
(41, 'C. Penggunaan Alat Ukur dalam Lingkup Pekerjaan Teknik Jaringan Komputer dan Telekomunikasi', 'Capaian Pembelajaran:\r\nPada akhir fase E, peserta didik mampu menggunakan alat ukur, termasuk pemeliharaan alat ukur untuk seluruh jaringan komputer dan sistem telekomunikasi\r\n\r\nTujuan pembelajaran:\r\nMenerapkan penggunaan alat ukur untuk jaringan komputer dan sistem telekomunikasi', NULL, NULL, 1, '2025-08-10 07:44:17', '2025-08-12 07:11:22', 'icons/icons_689b4b8a43f65.png', '1. Prinsip Umum\r\n  a. Pastikan paham keselamatan kerja sebelum menggunakan alat ukur.\r\n  b. Praktik dapat dilakukan menggunakan alat asli atau simulator.\r\n  c. Pemahaman prosedur penting untuk mencegah kerusakan alat dan hasil pengukuran yang keliru.\r\n\r\n2. Jenis Alat Ukur & Penggunaannya\r\n  a. LAN Tester: Menguji konektivitas kabel LAN (straight/cross) dan RJ11; indikator lampu menunjukkan urutan koneksi.\r\n  b. Multimeter: Mengukur tegangan DC/AC, arus DC, dan resistansi; tersedia versi analog & digital, memerlukan pengaturan skala yang tepat.\r\n  c. Earth Tester: Mengukur tahanan pentanahan (grounding) sesuai standar ≤ 5 Ω; perlu pengecekan berkala.\r\n  d. Optical Power Meter (OPM): Mengukur level daya optik, baik pada jaringan offline (dengan OLS) maupun online.\r\n  e. OTDR (Optical Time Domain Reflectometer): Mengidentifikasi letak gangguan pada kabel optik dengan parameter panjang gelombang, jarak, dan durasi pulsa. \r\n  f. Wi-Fi Analyzer: Aplikasi untuk menganalisis kekuatan sinyal Wi-Fi di sekitar.\r\n  g. Speed Test: Mengukur kecepatan unduh dan unggah koneksi internet.\r\n  h.Ping Test: Menguji konektivitas jaringan; dapat mendeteksi masalah seperti General Failure, Destination Host Unreachable, atau Request Timed Out.\r\n\r\n3. Prosedur Penting\r\n  a. Gunakan alat sesuai fungsi dan batas ukur.\r\n  b. Perhatikan polaritas (untuk DC) dan gunakan probe sesuai posisi.\r\n  c. Lakukan pembersihan konektor sebelum pengukuran optik.\r\n  d. Catat hasil pengukuran untuk evaluasi dan dokumentasi.\r\n  e. Ikuti panduan troubleshooting jika terjadi error pada pengujian jaringan.', 'Penggunaan alat ukur di bidang teknik jaringan komputer dan telekomunikasi memerlukan kombinasi keterampilan teknis, pemahaman prosedur, dan penerapan keselamatan kerja. Mulai dari pengujian kabel LAN hingga analisis jaringan optik, setiap alat memiliki metode penggunaan dan standar hasil yang berbeda. Pemilihan alat yang tepat dan interpretasi hasil yang akurat sangat penting untuk memastikan kualitas jaringan dan mencegah kerusakan peralatan.'),
(42, 'B. Menganalisis Penggunaan Alat Ukur yang Tepat dalam Lingkup Teknik Jaringan Komputer dan Telekomunikasi', 'Capaian Pembelajaran:\r\nPada akhir fase E, peserta didik mampu memahami tentang jenis alat ukur dan penggunaannya dalam pemeliharaan jaringan komputer dan sistem telekomunikasi\r\n\r\nTujuan Pembelajaran:\r\nMemahami penggunaan berbagai jenis alat ukur dalam pemeliharaan jaringan komputer dan sistem telekomunikasi.', NULL, NULL, 1, '2025-08-10 07:54:39', '2025-08-12 06:54:04', 'icons/icons_689b477cd9c1f.png', NULL, NULL),
(43, 'A. Fungsi Alat Ukur Teknik Jaringan Komputer dan Telekomunikasi', 'Capaian Pembelajaran:\r\nPada akhir fase E, peserta didik mampu memahami tentang jenis alat ukur dan penggunaannya dalam pemeliharaan jaringan komputer dan sistem telekomunikasi\r\n\r\nTujuan Pembelajaran:\r\nMemahami jenis alat ukur pada jaringan komputer dan telekomunikasi.', NULL, NULL, 1, '2025-08-10 08:17:17', '2025-08-12 06:50:49', 'icons/icons_689b46b9bca6c.png', '1. Perkembangan Teknologi Informasi dan Komunikasi (TIK)\r\n  a. TIK mencakup semua teknologi untuk mengelola informasi dan komunikasi, termasuk komputer, internet, dan jaringan telekomunikasi.\r\n  b.Teknologi ini berkembang pesat, memengaruhi berbagai sektor: pendidikan, industri, kesehatan, dan bisnis.\r\n\r\n2. Perangkat Keras Jaringan\r\n  a. Server & Client: Server menyediakan layanan/data, client mengaksesnya.\r\n  b. Switch & Hub: Menghubungkan perangkat dalam jaringan; switch lebih efisien karena mengirim data langsung ke tujuan.\r\n  c. Router: Mengarahkan data antarjaringan.\r\n  d. Access Point: Menghubungkan perangkat nirkabel ke jaringan kabel.\r\n  e. Kabel Jaringan: Jenis UTP, STP, fiber optik, dan coaxial.\r\n\r\n3. Topologi Jaringan\r\n  a. Bus, Ring, Star, Mesh, Tree, Hybrid – masing-masing memiliki kelebihan dan kekurangan.\r\n  b. Topologi star umum digunakan karena mudah dikonfigurasi dan lebih tahan terhadap kerusakan kabel.\r\n\r\n4. Jenis Jaringan Berdasarkan Wilayah\r\n  a. LAN (Local Area Network): Jarak terbatas, biasanya dalam satu gedung.\r\n  b. MAN (Metropolitan Area Network): Meliputi wilayah kota.\r\n  c. WAN (Wide Area Network): Jangkauan luas, mencakup negara atau dunia.\r\n\r\n5. Protokol Jaringan\r\n  a. TCP/IP: Protokol utama internet.\r\n  b. HTTP/HTTPS: Transfer data web.\r\n  c. FTP: Transfer file.\r\n  d. SMTP/POP3/IMAP: Email.\r\n\r\n6. Keselamatan Kerja\r\n  a. Gunakan APD (Alat Pelindung Diri) saat bekerja di instalasi jaringan.\r\n  b. Hindari kabel yang rusak dan tegangan listrik yang berbahaya.\r\n  c. Pastikan area kerja rapi untuk menghindari kecelakaan.', 'Dasar-dasar teknik jaringan komputer dan telekomunikasi mencakup pengetahuan perangkat keras, topologi, jenis jaringan, protokol komunikasi, dan prosedur keselamatan kerja. Pemahaman yang baik terhadap aspek-aspek ini penting untuk membangun, mengelola, dan memelihara jaringan yang handal, efisien, dan aman. Teknologi yang terus berkembang menuntut teknisi jaringan untuk selalu memperbarui keterampilan dan pengetahuannya.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2025_06_25_105412_create_personal_access_tokens_table', 1),
(4, '2025_06_25_110217_create_users_table', 1),
(5, '2025_06_25_111309_create_permission_tables', 1),
(6, '2025_06_25_115932_create_sessions_table', 2),
(7, '2025_06_25_120647_create_materis_table', 3),
(8, '2025_06_25_145133_create_komentars_table', 4),
(9, '2025_06_25_150028_create_kuis_table', 5),
(10, '2025_06_25_150037_create_pertanyaans_table', 5),
(11, '2025_06_25_150045_create_jawabans_table', 5),
(12, '2025_06_25_153129_create_tugas_table', 6),
(13, '2025_06_25_153141_create_pengumpulan_tugas_table', 6),
(14, '2025_06_25_161331_create_absensis_table', 7),
(15, '2025_06_25_161336_create_kehadirans_table', 7),
(16, '2025_06_25_172307_create_notifications_table', 8),
(17, '2025_06_26_031528_create_modul_pelajarans_table', 9),
(18, '2025_06_26_031550_create_agenda_sekolahs_table', 9),
(19, '2025_06_26_031604_create_aktivitas_siswas_table', 9),
(20, '2025_06_26_032602_create_kategori_table', 9),
(21, '2025_06_26_051145_create_kategoris_table', 10),
(22, '2025_06_26_091647_add_user_id_to_aktivitas_siswas_table', 11),
(23, '2025_06_26_093705_create_aktivitas_table', 12),
(25, '2025_07_10_082140_add_kategori_id_to_materis_table', 13),
(26, '2025_07_10_123013_create_aktivitas_siswas_table', 14),
(27, '2025_07_11_022844_alter_user_id_foreign_on_kehadirans_table', 15),
(28, '2025_08_04_014403_add_icon_to_materi_table', 16),
(29, '2025_08_04_024314_add_icon_to_kategoris_table', 17),
(30, '2025_08_10_062453_create_paragrafs_table', 18),
(31, '2025_08_10_062729_add_poin_penting_and_kesimpulan_to_materis_table', 19),
(32, '2025_08_10_062923_remove_file_pdf_from_materis_table', 20),
(33, '2025_08_12_055338_create_game_links_table', 21),
(34, '2025_08_12_070726_create_game_links_table', 22),
(35, '2025_08_12_073358_create_games_table', 23),
(36, '2025_08_12_102450_create_games_table', 24),
(37, '2025_08_12_104929_add_link_to_kuis_table', 25);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 10),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 9),
(2, 'App\\Models\\User', 11),
(2, 'App\\Models\\User', 12),
(2, 'App\\Models\\User', 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `modul_pelajarans`
--

CREATE TABLE `modul_pelajarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('0029f8b6-3f29-4101-85a6-63095cba8197', 'App\\Notifications\\TugasBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcc2 Tugas baru: ss\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/tugas\"}', NULL, '2025-07-11 22:29:18', '2025-07-11 22:29:18'),
('0206dabc-97f7-4cd1-b534-9996fea4e32a', 'App\\Notifications\\KuisBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83e\\udde0 Kuis baru: ccz\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/kuis\"}', NULL, '2025-08-12 00:20:15', '2025-08-12 00:20:15'),
('03028662-b1bc-4253-adb2-359e16dd85c3', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcda Materi baru: nnnn\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-10 01:27:24', '2025-08-10 01:27:24'),
('03ef894a-ecf4-4608-8aab-50c9934d2460', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83d\\udcda Materi baru: sadasdas\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-11 22:00:13', '2025-08-11 22:00:13'),
('05adca70-bb28-427f-8572-86342d1fb8b3', 'App\\Notifications\\TugasDikumpulkanNotification', 'App\\Models\\User', 1, '{\"title\":\"Tugas Dikumpulkan\",\"body\":\"Siswa telah mengumpulkan tugas \\\"sssssssssssssssssssssssssssssssssssssssssssssssssssssssssss\\\".\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/tugas\\/8\\/penilaian\",\"siswa_id\":2,\"tugas_id\":8}', NULL, '2025-07-10 17:42:38', '2025-07-10 17:42:38'),
('065a7fc3-cc45-47a3-aaeb-65c269b77dc1', 'App\\Notifications\\TugasBaruNotification', 'App\\Models\\User', 3, '{\"pesan\":\"\\ud83d\\udcc2 Tugas baru: asdsad\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/tugas\"}', '2025-06-26 02:18:56', '2025-06-25 22:24:03', '2025-06-26 02:18:56'),
('0a1c741f-83c1-44fe-b010-9190ab9602b6', 'App\\Notifications\\KuisBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83e\\udde0 Kuis baru: bdsadasdasdasda\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/kuis\"}', '2025-07-11 01:22:21', '2025-07-10 03:46:07', '2025-07-11 01:22:21'),
('0a263a57-26e3-4dad-9d8d-822e47140071', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83d\\udcda Materi baru: asdasdads\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-11 22:14:30', '2025-08-11 22:14:30'),
('0c27b899-0579-4523-9307-74b9b63f3cca', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83d\\udcda Materi baru: D. Melakukan Pemeliharaan Alat Ukur dalam Lingkup Pekerjaan Teknik Jaringan Komputer dan Telekomunikasi\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-10 04:29:09', '2025-08-10 04:29:09'),
('0d6b13f4-1819-4596-98f8-a43df0d6dd84', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcda Materi baru: dad\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', '2025-07-11 01:22:21', '2025-07-10 02:50:13', '2025-07-11 01:22:21'),
('0d84fc70-6a2f-49f7-acd2-e122a150d147', 'App\\Notifications\\TugasBaruNotification', 'App\\Models\\User', 3, '{\"pesan\":\"\\ud83d\\udcc2 Tugas baru: ssssssssssssssssssssssssssssssss\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/tugas\"}', NULL, '2025-07-10 10:43:10', '2025-07-10 10:43:10'),
('0e358382-bb9a-4368-99b1-3a6b79e5b007', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcda Materi baru: D. Melakukan Pemeliharaan Alat Ukur dalam Lingkup Pekerjaan Teknik Jaringan Komputer dan Telekomunikasi\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-10 04:29:09', '2025-08-10 04:29:09'),
('0eb1ad81-7ef7-43b6-a227-7e92a7c05cf6', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83d\\udcda Materi baru: ghghgghghghh\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-10 03:34:15', '2025-08-10 03:34:15'),
('0efd5532-99b9-4d0f-81e1-cb2dfb3ce8d6', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcda Materi baru: shandra\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-11 20:34:58', '2025-08-11 20:34:58'),
('105346cd-a539-4d49-baad-6497958d1580', 'App\\Notifications\\TugasBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcc2 Tugas baru: dd\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/tugas\"}', '2025-07-11 04:41:44', '2025-07-11 02:43:49', '2025-07-11 04:41:44'),
('1397a503-5ddf-4c36-b5f6-45a8feac100e', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcda Materi baru: a\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', '2025-07-11 01:22:21', '2025-07-10 02:50:37', '2025-07-11 01:22:21'),
('1850b6b0-5841-42c3-ae43-001d88de6a89', 'App\\Notifications\\KuisBaruNotification', 'App\\Models\\User', 3, '{\"pesan\":\"\\ud83e\\udde0 Kuis baru: ss\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/kuis\"}', NULL, '2025-07-10 03:47:44', '2025-07-10 03:47:44'),
('1892fb74-d675-4db0-a118-794acc5cd705', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83d\\udcda Materi baru: Fungsi Alat Ukur Teknik Jaringan Komputer dan Telekomunikasi1.\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-10 04:08:34', '2025-08-10 04:08:34'),
('1c11c499-d697-4285-bb44-7b0a012c4dca', 'App\\Notifications\\TugasBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83d\\udcc2 Tugas baru: dd\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/tugas\"}', NULL, '2025-07-11 02:43:49', '2025-07-11 02:43:49'),
('1cb2bafe-f407-43c7-924e-258c19c54bcc', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83d\\udcda Materi baru: marten\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-03 18:53:47', '2025-08-03 18:53:47'),
('1d465768-b126-43a7-b4bf-b92233fe2666', 'App\\Notifications\\TugasBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83d\\udcc2 Tugas baru: ss\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/tugas\"}', NULL, '2025-07-11 22:29:18', '2025-07-11 22:29:18'),
('22292fc5-05cc-4dee-96a3-3ac4879c28e0', 'App\\Notifications\\KuisBaruNotification', 'App\\Models\\User', 3, '{\"pesan\":\"\\ud83e\\udde0 Kuis baru: sss\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/kuis\"}', NULL, '2025-07-10 09:21:00', '2025-07-10 09:21:00'),
('223a7799-c800-4967-8772-5ad84f7ff32d', 'App\\Notifications\\TugasBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcc2 Tugas baru: ssssssssssssssssssssssssssssssss\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/tugas\"}', '2025-07-11 01:22:21', '2025-07-10 10:43:10', '2025-07-11 01:22:21'),
('23a88da0-faca-4fb4-b819-3ca179490b4b', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 3, '{\"pesan\":\"\\ud83d\\udcda Materi baru: dasd\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-07-10 02:45:40', '2025-07-10 02:45:40'),
('25a75acf-edb3-49f9-a0fc-3a139e34bfb2', 'App\\Notifications\\TugasDikumpulkanNotification', 'App\\Models\\User', 1, '{\"title\":\"Tugas Dikumpulkan\",\"body\":\"Siswa telah mengumpulkan tugas \\\"ss\\\".\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/tugas\\/14\\/penilaian\",\"siswa_id\":2,\"tugas_id\":14}', NULL, '2025-07-12 00:11:49', '2025-07-12 00:11:49'),
('26dde894-bba8-4b73-9f2f-fed9c4f04075', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83d\\udcda Materi baru: aaaaaaaaaaaaaaaaaaaaaaaaa\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-10 03:23:52', '2025-08-10 03:23:52'),
('285805fa-d4dc-40ca-8cc1-ca853213bd29', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83d\\udcda Materi baru: B. Menganalisis Penggunaan Alat Ukur yang Tepat dalam Lingkup Teknik Jaringan Komputer dan Telekomunikasi\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-10 07:54:39', '2025-08-10 07:54:39'),
('2b93120d-0b7c-478e-99b5-7a9a365acb46', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcda Materi baru: dsada\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-07-12 05:42:25', '2025-07-12 05:42:25'),
('2be05e1e-9497-4cb2-be9f-06c6841b6226', 'App\\Notifications\\TugasBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcc2 Tugas baru: buatkan saya pidato\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/tugas\"}', '2025-07-11 01:22:21', '2025-07-10 10:41:45', '2025-07-11 01:22:21'),
('2c9bf1e6-089b-4d4c-b7e8-00c044e39cfa', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcda Materi baru: judul materi\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-10 01:06:48', '2025-08-10 01:06:48'),
('2d79ec3a-de96-496e-b817-7604eac6e96a', 'App\\Notifications\\TugasBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcc2 Tugas baru: ss\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/tugas\"}', '2025-07-11 21:44:46', '2025-07-11 21:44:42', '2025-07-11 21:44:46'),
('2df21d57-df78-4c6b-945d-493e3a2fbea7', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcda Materi baru: B. Menganalisis Penggunaan Alat Ukur yang Tepat dalam Lingkup Teknik Jaringan Komputer dan Telekomunikasi\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-10 07:54:39', '2025-08-10 07:54:39'),
('2e2d957d-e586-4e83-930f-8ff4e1c9c8ad', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83d\\udcda Materi baru: aa\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-10 06:10:55', '2025-08-10 06:10:55'),
('2e4e6114-5fd8-4144-b205-f631b320e5b6', 'App\\Notifications\\KuisBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83e\\udde0 Kuis baru: Kuis 3\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/kuis\"}', NULL, '2025-08-10 08:35:53', '2025-08-10 08:35:53'),
('323a8ba8-5f0c-4a39-8197-c00a60a6001a', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 3, '{\"pesan\":\"\\ud83d\\udcda Materi baru: dad\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-07-10 02:46:08', '2025-07-10 02:46:08'),
('340957e5-a8b2-47de-82ba-98381564a1f5', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcda Materi baru: ghghgghghghh\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-10 03:34:15', '2025-08-10 03:34:15'),
('3461cf95-c57c-45ad-946d-52f6c3b2cf6c', 'App\\Notifications\\TugasBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"Tugas baru: dsadasdasdasdas\"}', '2025-07-10 01:29:29', '2025-06-25 11:26:16', '2025-07-10 01:29:29'),
('34e1ce87-0860-48b5-8e60-39fec6bb63b6', 'App\\Notifications\\TugasBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"Tugas baru: s\",\"kategori\":\"tugas\",\"tugas_id\":17,\"guru\":\"Guru\"}', NULL, '2025-07-12 06:05:33', '2025-07-12 06:05:33'),
('34e765f0-8f75-48c6-b2d6-eaea4665a0b6', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83d\\udcda Materi baru: dfsdf\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-11 20:11:42', '2025-08-11 20:11:42'),
('35270186-ad2a-408a-8e5a-9bfbecb4872a', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcda Materi baru: ddddddddd\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-09 07:07:25', '2025-08-09 07:07:25'),
('35cb5690-aa75-449c-915a-89e8357c4190', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcda Materi baru: aa\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-10 07:13:07', '2025-08-10 07:13:07'),
('39873949-6581-4ef1-896d-f1444294446b', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcda Materi baru: asdasdads\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-11 22:14:30', '2025-08-11 22:14:30'),
('3a035bf2-5a61-4249-ae91-0d7a0005ffc5', 'App\\Notifications\\TugasBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcc2 Tugas baru: dsadasda\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/tugas\"}', '2025-07-10 01:29:29', '2025-06-25 11:46:53', '2025-07-10 01:29:29'),
('3a9a5b00-1525-4c23-ac49-e5fcde5e55b1', 'App\\Notifications\\KuisBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83e\\udde0 Kuis baru: dasd\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/kuis\"}', NULL, '2025-08-12 04:19:05', '2025-08-12 04:19:05'),
('3e116ce1-9328-4aa4-95b5-464c4c9f80ba', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83d\\udcda Materi baru: C. Penggunaan Alat Ukur dalam Lingkup Pekerjaan Teknik Jaringan Komputer dan Telekomunikasi\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-10 05:28:26', '2025-08-10 05:28:26'),
('3e54bd45-41d3-4d16-b957-9d8edebd4e55', 'App\\Notifications\\TugasBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"Tugas baru: s\",\"kategori\":\"tugas\",\"tugas_id\":17,\"guru\":\"Guru\"}', NULL, '2025-07-12 06:05:33', '2025-07-12 06:05:33'),
('3e61f582-2d78-4d63-8e2e-16e93b3ca916', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcda Materi baru: sadasdas\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-11 22:00:13', '2025-08-11 22:00:13'),
('3f2c0b4a-995e-4040-98eb-71c4a3bdd6ca', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83d\\udcda Materi baru: xx\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-10 06:18:17', '2025-08-10 06:18:17'),
('3f385dec-471f-45d6-878c-1770bffc326b', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcda Materi baru: dfsdf\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-11 20:11:42', '2025-08-11 20:11:42'),
('41b77028-9ed8-4444-a3ad-f7a9f6dddb62', 'App\\Notifications\\TugasBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcc2 Tugas baru: asdsad\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/tugas\"}', '2025-07-10 01:29:29', '2025-06-25 22:24:03', '2025-07-10 01:29:29'),
('44791f03-81a3-4d67-bfc6-2590ca787974', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83d\\udcda Materi baru: ILMU PENGETAHUAN ALAM\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-03 20:15:52', '2025-08-03 20:15:52'),
('45b0c853-905d-4c8d-ac5a-bc31565e865d', 'App\\Notifications\\KuisBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83e\\udde0 Kuis baru: dasd\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/kuis\"}', NULL, '2025-08-12 04:19:05', '2025-08-12 04:19:05'),
('45d7ee9d-87cc-420a-a38c-53b9634384de', 'App\\Notifications\\KuisBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83e\\udde0 Kuis baru: Kuis 2\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/kuis\"}', NULL, '2025-08-10 08:43:04', '2025-08-10 08:43:04'),
('45fd3547-d7ef-429e-aa64-96f941dc27bc', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcda Materi baru: fdsfsd\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-11 18:41:38', '2025-08-11 18:41:38'),
('464617fa-1733-4f1c-983e-bc1730439f06', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 3, '{\"pesan\":\"\\ud83d\\udcda Materi baru: dasd\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-07-10 02:14:37', '2025-07-10 02:14:37'),
('46604040-b2d7-4bf7-8613-fca86af73c59', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83d\\udcda Materi baru: A. Fungsi Alat Ukur Teknik Jaringan Komputer dan Telekomunikasi\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-10 08:17:17', '2025-08-10 08:17:17'),
('467b1458-7de5-493c-8557-27e2ecf93129', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcda Materi baru: Fungsi Alat Ukur Teknik Jaringan Komputer dan Telekomunikasi\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-10 02:42:30', '2025-08-10 02:42:30'),
('468907da-37ae-4724-9252-c768e99401f2', 'App\\Notifications\\KuisBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83e\\udde0 Kuis baru: dsa\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/kuis\"}', NULL, '2025-08-12 00:26:45', '2025-08-12 00:26:45'),
('49ada40f-df38-4b9b-b283-bbb7b34b2363', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcda Materi baru: dasdad\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-11 22:20:01', '2025-08-11 22:20:01'),
('4ce7e226-ed68-4b7e-b8cb-b32c8357d54c', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 3, '{\"pesan\":\"\\ud83d\\udcda Materi baru: dad\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-07-10 02:50:13', '2025-07-10 02:50:13'),
('4d06442d-6585-4e03-8e92-886807fa0467', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 3, '{\"pesan\":\"\\ud83d\\udcda Materi baru: sda\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-07-10 01:26:14', '2025-07-10 01:26:14'),
('5231afe3-f1c0-4eb2-ae12-eac9d2a1de5e', 'App\\Notifications\\TugasBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83d\\udcc2 Tugas baru: ss\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/tugas\"}', NULL, '2025-07-11 21:44:42', '2025-07-11 21:44:42'),
('532a9c77-5cd7-4588-834a-d9d60db6a201', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcda Materi baru: aaaaaaaaaaaaaaaaaaaaaaaaa\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-10 03:23:52', '2025-08-10 03:23:52'),
('53818c48-158e-4558-9773-11083a414ec9', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcda Materi baru: Fungsi Alat Ukur Teknik Jaringan Komputer dan Telekomunikasi1.\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-10 04:08:34', '2025-08-10 04:08:34'),
('59369941-3132-4c6f-a158-05c4fa259f07', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcda Materi baru: aa\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-10 06:57:25', '2025-08-10 06:57:25'),
('59e47634-16b5-4eb7-8bbf-e92712fb4505', 'App\\Notifications\\KuisBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83e\\udde0 Kuis baru: Kuis Eksternal\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/kuis\"}', NULL, '2025-08-12 05:00:32', '2025-08-12 05:00:32'),
('5a9a6244-d28b-4a51-acea-c43a5880db87', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcda Materi baru: sda\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', '2025-07-10 01:29:29', '2025-07-10 01:26:14', '2025-07-10 01:29:29'),
('5ace8335-172d-4e35-bbb7-3a89d8064e73', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcda Materi baru: dsada\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-03 18:53:16', '2025-08-03 18:53:16'),
('5e13654b-35f2-4525-aecd-be458d502024', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83d\\udcda Materi baru: fdsfsd\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-11 18:41:38', '2025-08-11 18:41:38'),
('5ec2540a-9b0d-42bf-b650-e696f42be557', 'App\\Notifications\\TugasBaruNotification', 'App\\Models\\User', 3, '{\"pesan\":\"\\ud83d\\udcc2 Tugas baru: dsad\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/tugas\"}', NULL, '2025-07-10 17:44:26', '2025-07-10 17:44:26'),
('6001bc0a-355e-4ec5-854f-aea734cae610', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcda Materi baru: dasd\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', '2025-07-11 01:22:21', '2025-07-10 02:45:40', '2025-07-11 01:22:21'),
('61e841db-f922-4dc2-b7da-f5864cc8e445', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcda Materi baru: marten\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-10 00:58:24', '2025-08-10 00:58:24'),
('626f7cf1-14d6-497e-b3e3-2c79af4804bc', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcda Materi baru: marten\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', '2025-07-11 01:22:21', '2025-07-10 02:10:54', '2025-07-11 01:22:21'),
('634c3ad3-115b-4a7e-a6aa-b8de49f36fe5', 'App\\Notifications\\TugasBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"Tugas baru: Tugas Individu\",\"kategori\":\"tugas\",\"tugas_id\":19,\"guru\":\"Guru\"}', NULL, '2025-08-10 08:59:40', '2025-08-10 08:59:40'),
('65cbb46b-354d-48e0-99b9-d79428871fba', 'App\\Notifications\\TugasBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcc2 Tugas baru: ddd\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/tugas\"}', '2025-07-11 21:59:22', '2025-07-11 21:59:15', '2025-07-11 21:59:22'),
('69f4f949-499c-4059-97dc-d3f9435bff91', 'App\\Notifications\\KuisBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83e\\udde0 Kuis baru: sss\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/kuis\"}', '2025-07-11 01:22:21', '2025-07-10 09:21:00', '2025-07-11 01:22:21'),
('6ae0ebb5-b9c0-4827-8681-80ec10c255c4', 'App\\Notifications\\KuisBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83e\\udde0 Kuis baru: Kuis 3\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/kuis\"}', NULL, '2025-08-10 08:35:53', '2025-08-10 08:35:53'),
('6b0ce249-b497-41ed-acf3-903fc907140b', 'App\\Notifications\\TugasBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcc2 Tugas baru: sssssssssssssssssssssssssssssssssssssssssssssssssssssssssss\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/tugas\"}', '2025-07-11 01:22:21', '2025-07-10 17:18:49', '2025-07-11 01:22:21'),
('71fdc68b-b913-47a3-ac64-501f82472ba9', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83d\\udcda Materi baru: C. Penggunaan Alat Ukur dalam Lingkup Pekerjaan Teknik Jaringan Komputer dan Telekomunikasi\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-10 07:44:18', '2025-08-10 07:44:18'),
('738b0431-eec5-4ae7-ada8-cbdc7f05d632', 'App\\Notifications\\KuisBaruNotification', 'App\\Models\\User', 3, '{\"pesan\":\"\\ud83e\\udde0 Kuis baru: bdsadasdasdasda\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/kuis\"}', NULL, '2025-07-10 03:46:07', '2025-07-10 03:46:07'),
('74befffb-1d8c-4987-952c-ef6bfa740e2e', 'App\\Notifications\\TugasBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcc2 Tugas baru: s\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/tugas\"}', NULL, '2025-07-12 00:25:31', '2025-07-12 00:25:31'),
('74f907ec-bd8b-4b98-8bb4-9ddd8aee661e', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcda Materi baru: xx\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-10 06:18:17', '2025-08-10 06:18:17'),
('79ca005b-18c3-4968-922f-88bf5517ce40', 'App\\Notifications\\TugasBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"Tugas baru: Tugas Individu\",\"kategori\":\"tugas\",\"tugas_id\":19,\"guru\":\"Guru\"}', NULL, '2025-08-10 08:59:40', '2025-08-10 08:59:40'),
('7ed72625-47fb-4ac6-aed2-7cefc9b17e3e', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83d\\udcda Materi baru: topan\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-03 20:02:40', '2025-08-03 20:02:40'),
('7f3fd30f-d7de-4ae5-a502-2f1bac9abb17', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcda Materi baru: dsada\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-09 23:30:03', '2025-08-09 23:30:03'),
('812efb16-9cae-4c07-9184-b161aa3a2cf2', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcda Materi baru: Penerimaan Siswa Baru 2025\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', '2025-07-11 01:22:21', '2025-07-10 02:34:47', '2025-07-11 01:22:21'),
('831ed393-ce4a-4653-ab6e-f50204be7521', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcda Materi baru: aaa\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-10 06:10:09', '2025-08-10 06:10:09'),
('836d48ea-23bb-4933-ac8f-6df50b535c5b', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 13, '{\"pesan\":\"\\ud83d\\udcda Materi baru: ddddddddd\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-09 07:07:25', '2025-08-09 07:07:25'),
('842dd218-f074-49fa-a903-cdc19767598e', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcda Materi baru: aaaaaa\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-10 03:12:38', '2025-08-10 03:12:38'),
('862b5836-4d61-4804-ad40-d11c5054faa0', 'App\\Notifications\\KuisBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83e\\udde0 Kuis baru: Kuis Eksternal\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/kuis\"}', NULL, '2025-08-12 05:00:32', '2025-08-12 05:00:32'),
('870c522a-8f4d-4be1-8910-b5cbdc8c68ee', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83d\\udcda Materi baru: marten\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-11 20:11:16', '2025-08-11 20:11:16'),
('89fa2995-01f0-44ba-a3a0-6fbc0cbb6802', 'App\\Notifications\\KuisBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83e\\udde0 Kuis baru: kuis 4\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/kuis\"}', NULL, '2025-08-10 08:28:23', '2025-08-10 08:28:23'),
('8b86fc69-6be7-493b-af94-d9bfc1d4e456', 'App\\Notifications\\TugasBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"Tugas baru: Tugas Kelompok\",\"kategori\":\"tugas\",\"tugas_id\":18,\"guru\":\"Guru\"}', NULL, '2025-08-10 08:57:38', '2025-08-10 08:57:38'),
('8e69e497-346b-442e-b31e-04a72dda2337', 'App\\Notifications\\KuisBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83e\\udde0 Kuis baru: dsa\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/kuis\"}', NULL, '2025-08-12 00:26:45', '2025-08-12 00:26:45'),
('8eba51b6-ea7c-4785-a9a5-0022c20b832d', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83d\\udcda Materi baru: dasdad\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-11 22:20:01', '2025-08-11 22:20:01'),
('9176767f-7409-4e68-8d22-861b788730bf', 'App\\Notifications\\KuisBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83e\\udde0 Kuis baru: ccz\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/kuis\"}', NULL, '2025-08-12 00:20:15', '2025-08-12 00:20:15'),
('9312a7e0-b69b-47c3-8953-cb5d4a31795a', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83d\\udcda Materi baru: ddddddddd\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-09 07:07:25', '2025-08-09 07:07:25'),
('9aa6a747-c899-47ba-ab61-b2bf69af97c0', 'App\\Notifications\\KuisBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83e\\udde0 Kuis baru: dsad\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/kuis\"}', NULL, '2025-08-12 02:01:51', '2025-08-12 02:01:51'),
('9bdc15a1-3699-4dd8-a762-3e446f46443d', 'App\\Notifications\\KuisBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83e\\udde0 Kuis baru: dsad\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/kuis\"}', NULL, '2025-08-12 02:01:51', '2025-08-12 02:01:51'),
('9d418a7b-226c-4dde-8fd6-b17c286095dc', 'App\\Notifications\\TugasBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcc2 Tugas baru: s\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/tugas\"}', '2025-07-11 21:58:03', '2025-07-11 21:57:54', '2025-07-11 21:58:03'),
('a1569dbd-2d14-4552-9469-d372fc002a3e', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83d\\udcda Materi baru: aa\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-10 06:57:25', '2025-08-10 06:57:25'),
('a4c1134a-67ae-4000-acbc-a6d56561969e', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcda Materi baru: C. Penggunaan Alat Ukur dalam Lingkup Pekerjaan Teknik Jaringan Komputer dan Telekomunikasi\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-10 07:44:18', '2025-08-10 07:44:18'),
('a5f14ed0-90ce-437f-bb98-3a3eff60ab83', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 3, '{\"pesan\":\"\\ud83d\\udcda Materi baru: a\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-07-10 02:50:37', '2025-07-10 02:50:37'),
('aa8c0d13-f83d-4a2e-9bb2-091c71b60e9a', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcda Materi baru: aa\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-10 06:10:55', '2025-08-10 06:10:55'),
('ac600157-e6c5-4968-9032-f390fcbb36d4', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcda Materi baru: Alat Ukur dan Pengukuran Teknik Jaringan Akses Telekomunikasi\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-10 01:16:16', '2025-08-10 01:16:16'),
('ace9a65a-446f-47c7-a634-659f19fb383b', 'App\\Notifications\\TugasBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"Tugas baru: Tugas Kelompok\",\"kategori\":\"tugas\",\"tugas_id\":18,\"guru\":\"Guru\"}', NULL, '2025-08-10 08:57:38', '2025-08-10 08:57:38'),
('ae52eeee-dd7d-4675-86fe-a0d78d18b932', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcda Materi baru: wdasdas\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', '2025-07-10 01:29:29', '2025-06-25 11:49:11', '2025-07-10 01:29:29'),
('afc677de-e3ed-44c6-892f-cc7f37e07a42', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83d\\udcda Materi baru: Alat Ukur dan Pengukuran Teknik Jaringan Akses Telekomunikasi\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-10 01:16:16', '2025-08-10 01:16:16'),
('b1226413-99d4-4718-90e9-aa532f59f11b', 'App\\Notifications\\KuisBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83e\\udde0 Kuis baru: Kuis Eksternal\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/kuis\"}', NULL, '2025-08-12 04:40:33', '2025-08-12 04:40:33'),
('b19b3e02-e31d-4e0a-a4b6-7ee9459ff28c', 'App\\Notifications\\KuisBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83e\\udde0 Kuis baru: ss\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/kuis\"}', '2025-07-11 01:22:21', '2025-07-10 03:47:44', '2025-07-11 01:22:21'),
('b253f485-3df3-44bb-9a65-2584559b6b9f', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83d\\udcda Materi baru: dasdasd\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-12 05:42:24', '2025-08-12 05:42:24'),
('b386c940-4370-4ea3-ad66-2b65e2867573', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcda Materi baru: topan\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-03 20:02:40', '2025-08-03 20:02:40'),
('b456dc17-7623-4a41-bebc-557e45d01f10', 'App\\Notifications\\TugasBaruNotification', 'App\\Models\\User', 3, '{\"pesan\":\"\\ud83d\\udcc2 Tugas baru: buatkan saya pidato\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/tugas\"}', NULL, '2025-07-10 10:41:45', '2025-07-10 10:41:45'),
('b61205ff-5521-45bc-9313-b0e3c22e3e44', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83d\\udcda Materi baru: shandra\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-11 20:34:58', '2025-08-11 20:34:58'),
('b61b1d8d-19fc-4d8b-bf55-55b5f99e1536', 'App\\Notifications\\KuisBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83e\\udde0 Kuis baru: dsad\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/kuis\"}', NULL, '2025-08-11 23:39:27', '2025-08-11 23:39:27'),
('b76df99f-6769-4d18-9a90-80817e30cfa1', 'App\\Notifications\\TugasBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83d\\udcc2 Tugas baru: s\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/tugas\"}', NULL, '2025-07-11 21:57:54', '2025-07-11 21:57:54'),
('b94f16b4-25ab-4340-9560-61cdc775ac23', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcda Materi baru: marten\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-11 20:11:16', '2025-08-11 20:11:16'),
('b97137bd-30ac-44d6-9380-a17e7b2ad945', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcda Materi baru: aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-10 03:32:32', '2025-08-10 03:32:32'),
('bb917ca9-29a4-4738-b7d3-dbc79644d5de', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83d\\udcda Materi baru: Fungsi Alat Ukur Teknik Jaringan Komputer dan Telekomunikasi\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-10 02:42:30', '2025-08-10 02:42:30'),
('bf335cff-2510-4c24-b991-ce75ba1fcfce', 'App\\Notifications\\KuisBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83e\\udde0 Kuis baru: Kuis Eksternal\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/kuis\"}', NULL, '2025-08-12 04:40:33', '2025-08-12 04:40:33'),
('c30549b8-260b-4cf1-905f-f19b1426d6a2', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83d\\udcda Materi baru: aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-10 03:32:32', '2025-08-10 03:32:32'),
('c351fcfd-8690-4004-a164-79f5896681f6', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83d\\udcda Materi baru: dasdasdd\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-11 18:20:05', '2025-08-11 18:20:05'),
('c49b60ca-9364-4446-b3e0-abe212dae7bc', 'App\\Notifications\\KuisBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83e\\udde0 Kuis baru: Kuis 2\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/kuis\"}', NULL, '2025-08-10 08:43:04', '2025-08-10 08:43:04'),
('c56c6d83-29e9-4fab-bff3-3ef303029650', 'App\\Notifications\\TugasDikumpulkanNotification', 'App\\Models\\User', 1, '{\"title\":\"Tugas Dikumpulkan\",\"body\":\"Siswa telah mengumpulkan tugas \\\"dsad\\\".\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/tugas\\/9\\/penilaian\",\"siswa_id\":2,\"tugas_id\":9}', NULL, '2025-07-10 17:44:47', '2025-07-10 17:44:47'),
('c6022370-20c5-46f7-a7aa-6bd8f4d7fc1f', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83d\\udcda Materi baru: nnnn\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-10 01:27:24', '2025-08-10 01:27:24'),
('cbf58920-8d2e-4e19-85df-38127c2ad830', 'App\\Notifications\\KuisBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83e\\udde0 Kuis baru: kuis 4\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/kuis\"}', NULL, '2025-08-10 08:28:23', '2025-08-10 08:28:23'),
('cc41ae6f-34c1-4771-b363-b0207b762943', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcda Materi baru: C. Penggunaan Alat Ukur dalam Lingkup Pekerjaan Teknik Jaringan Komputer dan Telekomunikasi\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-10 05:28:26', '2025-08-10 05:28:26'),
('cd6625a6-9a5b-4370-9137-2ae870e46710', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83d\\udcda Materi baru: dddddd\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-03 18:58:56', '2025-08-03 18:58:56'),
('d0cd9cbe-3b73-4a30-836e-adfa67d3f454', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcda Materi baru: dddddd\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-03 18:58:56', '2025-08-03 18:58:56'),
('d2b40cf6-9218-4c23-baf2-4d6778737718', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83d\\udcda Materi baru: aa\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-10 07:13:07', '2025-08-10 07:13:07'),
('d2e1864a-7b94-4b92-93cb-a63a428ffd0e', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcda Materi baru: A. Fungsi Alat Ukur Teknik Jaringan Komputer dan Telekomunikasi\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-10 08:17:17', '2025-08-10 08:17:17'),
('d5fb939f-9aa4-4298-ac44-b3f1e32799a5', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 3, '{\"pesan\":\"\\ud83d\\udcda Materi baru: Penerimaan Siswa Baru 2025\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-07-10 02:34:47', '2025-07-10 02:34:47'),
('d790990d-64cf-4535-ac23-6033d38c9af8', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcda Materi baru: dasd\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', '2025-07-11 01:22:21', '2025-07-10 02:14:37', '2025-07-11 01:22:21'),
('da0b857b-3ec2-4719-a3af-6e357a2ec4c6', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcda Materi baru: ILMU PENGETAHUAN ALAM\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-03 20:15:52', '2025-08-03 20:15:52'),
('dc81b3da-339f-4aff-b686-0f3bf8311f2d', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83d\\udcda Materi baru: aaa\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-10 06:10:09', '2025-08-10 06:10:09'),
('dd33b079-94b6-4105-8ce0-558d6746b6db', 'App\\Notifications\\KuisBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83e\\udde0 Kuis baru: kuis 1\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/kuis\"}', NULL, '2025-08-10 08:48:52', '2025-08-10 08:48:52'),
('e226f655-ba9f-4744-b41c-e7fbaca0e3dc', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 3, '{\"pesan\":\"\\ud83d\\udcda Materi baru: marten\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-07-10 02:10:54', '2025-07-10 02:10:54'),
('e280827c-ee07-48ec-9f42-dd6126a567df', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcda Materi baru: dasdasd\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-12 05:42:24', '2025-08-12 05:42:24'),
('e42b964a-0887-49bc-85b7-e3b4825191c9', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83d\\udcda Materi baru: aaaaaa\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-10 03:12:38', '2025-08-10 03:12:38'),
('e43fc827-a122-41f3-a59b-8a791720b155', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcda Materi baru: dasdasdd\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-11 18:20:05', '2025-08-11 18:20:05'),
('e5145975-4f64-43de-a853-c19c4431d25e', 'App\\Notifications\\TugasBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcc2 Tugas baru: dsad\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/tugas\"}', '2025-07-11 01:22:21', '2025-07-10 17:44:26', '2025-07-11 01:22:21'),
('e52669a3-c932-44c8-9b18-e1e90dc7062b', 'App\\Notifications\\TugasBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83d\\udcc2 Tugas baru: ddd\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/tugas\"}', NULL, '2025-07-11 21:59:15', '2025-07-11 21:59:15'),
('e65d77dd-ecb7-45c6-9f23-81c046034fec', 'App\\Notifications\\KuisBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83e\\udde0 Kuis baru: dsad\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/kuis\"}', NULL, '2025-08-11 23:39:27', '2025-08-11 23:39:27'),
('e99e1663-8759-4a96-9c64-9085c9cca3ad', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83d\\udcda Materi baru: dsada\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-09 23:30:03', '2025-08-09 23:30:03'),
('eafdbfec-8e34-4da9-b064-226e58cc3345', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83d\\udcda Materi baru: judul materi\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-10 01:06:48', '2025-08-10 01:06:48'),
('ed8168a0-55dc-441f-bc20-22beb93fe736', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83d\\udcda Materi baru: dsada\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-03 18:53:16', '2025-08-03 18:53:16'),
('efd1d93d-2401-40ce-9ad4-b004e5c2e4f2', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcda Materi baru: marten\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-03 18:53:47', '2025-08-03 18:53:47'),
('f8736a5a-ce04-46c2-816e-601a909b0335', 'App\\Notifications\\TugasDikumpulkanNotification', 'App\\Models\\User', 1, '{\"title\":\"Tugas Dikumpulkan\",\"body\":\"Siswa telah mengumpulkan tugas \\\"s\\\".\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/tugas\\/15\\/penilaian\",\"siswa_id\":2,\"tugas_id\":15}', NULL, '2025-07-12 05:44:54', '2025-07-12 05:44:54'),
('f9bc16cb-2dd3-4f99-8a11-ec9f805c712a', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83d\\udcda Materi baru: marten\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-08-10 00:58:24', '2025-08-10 00:58:24'),
('f9dc30e7-c97c-4978-8c8d-6dbfe8823641', 'App\\Notifications\\TugasBaruNotification', 'App\\Models\\User', 3, '{\"pesan\":\"\\ud83d\\udcc2 Tugas baru: sssssssssssssssssssssssssssssssssssssssssssssssssssssssssss\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/tugas\"}', NULL, '2025-07-10 17:18:49', '2025-07-10 17:18:49'),
('fbf918f9-9571-454c-98eb-89fbd7335ed1', 'App\\Notifications\\TugasBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83d\\udcc2 Tugas baru: s\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/tugas\"}', NULL, '2025-07-12 00:25:31', '2025-07-12 00:25:31'),
('fd9cbdca-ad89-4707-a38f-8ae479f96a0d', 'App\\Notifications\\KuisBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83e\\udde0 Kuis baru: kuis 1\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/kuis\"}', NULL, '2025-08-10 08:48:52', '2025-08-10 08:48:52'),
('fe8ab110-dbd1-45d8-8b3b-b928c3d29a71', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 2, '{\"pesan\":\"\\ud83d\\udcda Materi baru: dad\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', '2025-07-11 01:22:21', '2025-07-10 02:46:08', '2025-07-11 01:22:21'),
('ff1182da-b8ec-4326-815b-b948bbe7e017', 'App\\Notifications\\MateriBaruNotification', 'App\\Models\\User', 12, '{\"pesan\":\"\\ud83d\\udcda Materi baru: dsada\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/materi\"}', NULL, '2025-07-12 05:42:25', '2025-07-12 05:42:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paragrafs`
--

CREATE TABLE `paragrafs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `materi_id` bigint(20) UNSIGNED NOT NULL,
  `teks` text NOT NULL,
  `video` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `paragrafs`
--

INSERT INTO `paragrafs` (`id`, `materi_id`, `teks`, `video`, `gambar`, `created_at`, `updated_at`) VALUES
(651, 43, '1. LAN Tester\r\n\r\nLAN tester adalah salah satu alat bantu dalam instalasi jaringan komputer yang berfungsi untuk mengecek koneksi kabel LAN RJ45 dan RJ11. LAN tester dilengkapi dengan lampu indikator, tombol pengatur kecepatan, dan pengecekan. LAN tester dapat digunakan untuk melakukan pengecekan kabel jenis cross dan straight. Adakalanya LAN tester dilengkapi dengan tone checker yang berfungsi untuk mengetahui letak kerusakan/putus dari kabel LAN, bahkan pada merek tertentu, memiliki fungsi yang disatukan dengan alat ukur multimeter.', NULL, NULL, '2025-08-12 06:50:49', '2025-08-12 06:50:49'),
(652, 43, 'LAN Tester', NULL, 'materi_gambar/materi_gambar_689b46ba0a309.png', '2025-08-12 06:50:50', '2025-08-12 06:50:50'),
(653, 43, 'Agar lebih paham silahkan tonton video dibawah ini!', 'https://youtu.be/3RvO9_Dcy5s?si=1Nw_WOsPSNcrDBhg', NULL, '2025-08-12 06:50:50', '2025-08-12 06:50:50'),
(654, 43, '2. Multimeter\r\n\r\nMultimeter merupakan alat ukur yang sering digunakan dalam bidang elektronika. Ada dua jenis multimeter, yaitu multimeter analog dan multimeter digital. Untuk menggunakan multimeter analog dibutuhkan\r\nketerampilan khusus dalam pembacaan skala, berbeda dengan multimeter digital yang langsung memunculkan hasil ketika pengukuran dilakukan', NULL, NULL, '2025-08-12 06:50:50', '2025-08-12 06:50:50'),
(655, 43, 'a. Multimeter Analog\r\n\r\nMultimeter analog merupakan jenis multimeter yang menggunakan displai ukur (meter) dengan tipe jarum penunjuk. Dengan demikian, kita harus melihat posisi jarum penunjuk pada meter dan posisi sakelar selector pada posisi batas ukur, kemudian melakukan perhitungan secara manual untuk mendapatkan hasil ukurnya. Kondisi atau proses pembacaan hasil ukur yang masih manual inilah yang menyebabkan multimeter atau multitester jenis ini dinamakan sebagai multimeter analog.', NULL, 'materi_gambar/materi_gambar_689b46ba74fc1.jpg', '2025-08-12 06:50:50', '2025-08-12 06:50:50'),
(656, 43, 'b. Multimeter Digital\r\n\r\nSelain multimeter analog, kita juga dapat memanfaatkan multimeter digital untuk mengukur besaran arus, tegangan, dan hambatan listrik. Hasil pengukuran menggunakan multimeter jenis digital ini dapat langsung kita ketahui karena angka akan langsung muncul pada layar multimeter. Beberapa multimeter digital memiliki kemampuan untuk melakukan pengukuran kapasitans dan frekuensi.', NULL, 'materi_gambar/materi_gambar_689b46bac98e2.jpg', '2025-08-12 06:50:51', '2025-08-12 06:50:51'),
(657, 43, 'ini perbedaan fisik multimetrer analog dan digital', NULL, 'materi_gambar/materi_gambar_689b46bb110ff.png', '2025-08-12 06:50:51', '2025-08-12 06:50:51'),
(658, 43, 'agar lebih paham silahkan tonton video dibawah ini!', 'https://youtu.be/7h5McYNQy98?si=myB6THBQ6BDG-73o', NULL, '2025-08-12 06:50:51', '2025-08-12 06:50:51'),
(659, 43, '3. Earth Tester\r\n\r\nEarth tester merupakan alat ukur yang berfungsi untuk mengukur nilai pada sebuah instalasi grounding. Instalasi grounding ini biasanya dipasang pada gedung dan perangkat elektronik, seperti perangkat-perangkat komputer jaringan dan telekomunikasi. Dengan melakukan pengukuran nilai grounding, kita dapat mengetahui seberapa aman instalasi grounding yang sudahterpasang. Earth tester memiliki dua tipe, yaitu earth tester analog dan earth tester digital, seperti tipe pada multimeter.', NULL, NULL, '2025-08-12 06:50:51', '2025-08-12 06:50:51'),
(660, 43, 'Earth Tester', NULL, 'materi_gambar/materi_gambar_689b46bb34dae.jpg', '2025-08-12 06:50:51', '2025-08-12 06:50:51'),
(661, 43, 'agar lebih paham silahkan tonton video dibawah ini!', 'https://youtu.be/Wwt68t8jGZQ?si=GOWrszERsl3cyV_y', NULL, '2025-08-12 06:50:51', '2025-08-12 06:50:51'),
(662, 43, '4. Optical Power Meter (OPM)\r\n\r\nPower meter adalah salah satu peralatan utama dalam pengukuran saluran fiber optik yang berfungsi untuk mengetahui level daya penerima. Level daya adalah sebuah kekuatan sinyal optik yang digunakan untuk\r\nmembawa informasi dari satu tempat ke tempat lain melalui sebuah media transmisi, yaitu fiber optik. Definisi lain terkait power level atau level daya adalah besarnya daya yang dihasilkan oleh sumber optik, baik LED\r\nmaupun LASER. Satuan level daya dalam sistem komunikasi serat optik (SKSO) adalah dBm (desibel miliwatt).', NULL, NULL, '2025-08-12 06:50:51', '2025-08-12 06:50:51'),
(663, 43, 'Optical Power Meter', NULL, 'materi_gambar/materi_gambar_689b46bb51f7a.jpg', '2025-08-12 06:50:51', '2025-08-12 06:50:51'),
(664, 43, '5. Optical Time Domain Reflectometer (OTDR)\r\n\r\nOTDR merupakan salah satu alat ukur penting yang digunakan untuk mengukur saluran optik, baik dalam kegiatan instalasi maupun saat pemeliharaan saluran fiber optik. Alat ini dipakai untuk mendapatkan visualisasi dari redaman fiber optik sepanjang saluran optik yang ditampilkan pada sebuah layar CRT, dengan jarak pada sumbu X dan level daya pada sumbu Y. Redaman merupakan selisih daya sehingga sering kali terjadi salah\r\npersepsi yang mengira bahwa sumbu Y sebagai redaman.\r\n\r\nDengan menggunakan OTDR, sebuah link optik dapat diukur dari satu ujung. Pada sebuah uji terima saluran optik, pengukuran menggunakan OTDR dilakukan dari dua arah, sedangkan pengukuran pada jaringan yang\r\nmenggunakan splitter dilakukan dengan sistem per segmen.\r\n\r\nSecara umum, OTDR memiliki fungsi untuk mengukur besar redaman fiber optik, mengukur redaman riil sambungan hasil fusion dan mekanik, mengukur loss antartitik yang diinginkan, mengukur panjang kabel atau\r\nsaluran optik, dan menangani gangguan pada fiber optik. Besarnya redaman atau loss yang terukur pada saluran dapat diketahui dengan melihat layar OTDR.', NULL, NULL, '2025-08-12 06:50:51', '2025-08-12 06:50:51'),
(665, 43, 'Optical Time Domain Reflectometer (OTDR)', NULL, 'materi_gambar/materi_gambar_689b46bb69534.jpg', '2025-08-12 06:50:51', '2025-08-12 06:50:51'),
(666, 43, 'Agar lebih paham silahkan tonton video dibawah ini!', 'https://youtu.be/N_QUh2WpIZk?si=eHPukFyGDV9A0gTh', NULL, '2025-08-12 06:50:51', '2025-08-12 06:50:51'),
(667, 43, '6. Speed Test\r\n\r\nSetelah kita mengenal beberapa alat ukur yang digunakan untuk menguji kondisi fisik pada sebuah media transmisi, sekarang kita akan mempelajari perangkat lunak yang digunakan untuk mengetahui kondisi jaringan\r\nkomputer, khususnya internet.\r\n\r\nSpeed test adalah sebuah layanan berbentuk aplikasi berbasis web yang digunakan untuk menguji kecepatan performa koneksi internet, baik kabel, seluler, maupun Wi-Fi. Kapasitas maksimal jaringan internet yang kita gunakan untuk mengunggah dan mengunduh data dapat dilakukan menggunakan aplikasi ini. Dengan melakukan pengetesan, kita akan mengetahui besarnya bandwidth dari koneksi internet yang sedang digunakan.', NULL, NULL, '2025-08-12 06:50:51', '2025-08-12 06:50:51'),
(668, 43, 'Contoh Speed Test', NULL, 'materi_gambar/materi_gambar_689b46bb90987.jpg', '2025-08-12 06:50:51', '2025-08-12 06:50:51'),
(669, 43, 'Agar lebih paham silahkan tonton video dibawah ini!', 'https://youtu.be/enrM3O8N9p0?si=eTDMDKrdnq58MHlO', NULL, '2025-08-12 06:50:51', '2025-08-12 06:50:51'),
(670, 43, '7. Wi-Fi Analyzer\r\n\r\nWi-Fi Analyzer merupakan sebuah aplikasi yang dapat digunakan untuk mengetahui kekuatan sinyal Wi-Fi yang terletak pada suatu lokasi tertentu. Dengan menggunakan aplikasi ini, kita dapat memeriksa kualitas jaringan\r\nyang diterima oleh perangkat yang digunakan. Saat ini, sudah banyak aplikasi semacam ini yang dapat kita unduh dengan mudah untuk digunakan pada perangkat telepon seluler atau komputer.', NULL, NULL, '2025-08-12 06:50:51', '2025-08-12 06:50:51'),
(671, 43, 'Contoh Tampilan Wi-Fi Analyzer', NULL, 'materi_gambar/materi_gambar_689b46bbb1e1c.jpg', '2025-08-12 06:50:51', '2025-08-12 06:50:51'),
(672, 43, '8. Ping Test\r\n\r\nPing adalah singkatan dari Packet Internet Network Groper. Perintah ping digunakan untuk menguji kecepatan koneksi pada jaringan komputer kita. Jaringan komputer yang diperiksa tidak harus terhubung dengan internet.\r\nKita dapat memasukkan perintah ping berikut pada Command Prompt di komputer', NULL, NULL, '2025-08-12 06:50:51', '2025-08-12 06:50:51'),
(673, 43, 'Contoh Tampilan Ping Test', NULL, 'materi_gambar/materi_gambar_689b46bbc7453.jpg', '2025-08-12 06:50:51', '2025-08-12 06:50:51'),
(674, 42, 'Permasalahan yang muncul pada saat melakukan instalasi dan pemeliharaanmjaringan sangatlah beragam. Penyelesaian permasalahan yang melibatkan penggunaan alat ukur juga memerlukan pertimbangan khusus terkait alat ukur mana yang sebaiknya digunakan. Pengetahuan yang mendalam mengenai spesifikasi parameter yang terdapat pada setiap alat ukur, wajib dipahami oleh seorang teknisi jaringan komputer dan telekomunikasi. Hal tersebut merupakan perwujudan tanggung jawab terhadap hasil kerja yang akan dilaporkan keperusahaan.\r\n\r\nPada pembelajaran kali ini, kalian akan diajak untuk mengenal berbagai spesifikasi dari alat ukur yang umum digunakan dalam lingkup pekerjaan Teknik Jaringan Komputer dan Telekomunikasi. Sebagai contoh, di bawah ini ditampilkan jenis alat ukur beserta spesifikasinya.', NULL, NULL, '2025-08-12 06:54:04', '2025-08-12 06:54:04'),
(675, 42, 'Spesifikasi:\r\na. Penggunaan untuk kabel UTP, FTP, RJ11, dan coaxial.\r\nb. Panjang kabel maksimal 300m (UTP, FTP, dan RJ11).\r\nc. Panjang kabel maksimal 500m (BNC).\r\nd. Mampu mendeteksi kabel putus di tengah.\r\ne. LCD untuk tampilan hasil.\r\nf. Remote unit untuk tes kabel berjauhan.\r\ng. Catu daya baterai 9 volt 2 buah.', NULL, 'materi_gambar/materi_gambar_689b477d10af9.jpg', '2025-08-12 06:54:05', '2025-08-12 06:54:05'),
(676, 42, 'AKTIVITAS KELOMPOK!\r\nBuatlah kelompok dengan beranggotakan tiga peserta didik! Setiap kelompok mencari spesifikasi alat ukur sebanyak tiga spesifikasi/merek/tipe yang berbeda. Bagilah tugas dalam kelompok agar pekerjaan dapat diselesaikan dengan cepat dan tepat!\r\n\r\nTujuan dari aktivitas ini adalah agar kalian memiliki banyak referensi tentang alat ukur jaringan komputer dan telekomunikasi. Sangat disarankan bahwa alat ukur yang akan kalian cari spesifikasinya, merupakan alat yang ada di laboratorium peralatan sekolah.', NULL, NULL, '2025-08-12 06:54:05', '2025-08-12 06:54:05'),
(677, 42, 'Contoh Tabel Spesifikasi Alat Ukur', NULL, 'materi_gambar/materi_gambar_689b477d30754.png', '2025-08-12 06:54:05', '2025-08-12 06:54:05'),
(678, 42, 'AKTIVITAS INDIVIDU!\r\nSelesaikan setiap permasalahan berikut! Kalian dapat menulis jawabannya pada buku tulis atau sesuai dengan petunjuk guru.\r\n1. Untuk melakukan pengukuran saluran optik aktif arah downlink pada salah satu provider telekomunikasi, dibutuhkan panjang gelombang sebesar 1.490 nm. Dari beberapa merek OPM yang sudah kalian temukan spesifikasinya pada Aktivitas Kelompok 2.1, OPM mana saja yang dapat digunakan dalam pengukuran tersebut?\r\n\r\n2. Sebuah jaringan optik dengan panjang 260 km membentang dari Kota A ke Kota B. Dalam rangka melakukan pemeliharaan pada saluran optik tersebut, pengukuran secara rutin diperlukan tanpa mematikan koneksi dari jaringan yang sedang online. Pilihlah OTDR yang dapat digunakan untuk mendukung terlaksananya kegiatan tersebut!\r\n\r\n3. Seorang teknisi jaringan komputer sedang melakukan penanganan gangguan yang terjadi pada kabel LAN. Teknisi tersebut sudah menyiapkan LAN tester untuk melakukan pengecekan kondisi kabel. Apabila dilihat dari penampakan fisik, semua kabel dalam kondisi normal, namun ada beberapa saluran yang tidak dapat digunakan (tidak terjadi koneksi). Berikan rekomendasi kalian terkait dengan LAN tester yang dapat digunakan untuk mendeteksi letak kabel LAN yang putus tersebut!\r\n\r\n4. Salah satu menara telekomunikasi di wilayah X sedang dalam tahap pemeliharaan rutin untuk memastikan kondisi tahanan pentanahan di wilayah tersebut dalam keadaan baik. Standar yang ditetapkan untuk perangkat telekomunikasi di menara tersebut maksimal 1 ohm. Teknisi yang akan melakukan pengukuran masih dalam masa training. Apabila kalian diminta membimbing teknisi baru tersebut untuk melakukan pengukuran tahanan pentanahan, alat mana yang akan kalian rekomendasikan? Mengapa?\r\n\r\n5. Seorang teknisi listrik sedang melakukan perbaikan pada jaringan yang ada di rumah pelanggan. Bekal peralatan yang dibawa, antara lain tang meter dan multimeter digital. Hasil analisis sementara, terjadi ketidakstabilan frekuensi saluran. Untuk mengecek frekuensi yang tidak stabil, teknisi mempergunakan\r\nmultimeter digital. Dari beberapa spesifikasi multimeter yang sudah kalian cari pada kegiatan sebelumnya, apakah ada yang dapat digunakan pada pengukuran tersebut? Apabila tidak ada, berikan rekomendasi terkait\r\nspesifikasi multimeter yang dapat mendukung pekerjaan yang sedang dilakukan oleh teknisi listrik ini!\r\n\r\n6. Pada mata pelajaran Dasar-Dasar Teknik Jaringan Komputer dan Telekomunikasi, kalian diminta untuk menyurvei kekuatan jaringan Wi-Fi di sekolah. Hasil survei tersebut akan dijadikan sebagai dasar teknisi jaringan\r\ndalam melakukan optimasi kekuatan sinyal pada titik tertentu yang dinyatakan lemah. Berbekal aplikasi yang dapat digunakan di HP, berikan rekomendasi kalian mengenai aplikasi terbaik yang dapat mendukung kegiatan ini!', NULL, NULL, '2025-08-12 06:54:05', '2025-08-12 06:54:05'),
(679, 41, 'Setelah kalian mempelajari fungsi dan menu/tombol pada alat ukur, sekarang\r\nsaatnya kalian mencoba untuk melakukan praktik menggunakan alat-alat\r\nukur yang sudah dipelajari sebelumnya. Praktikum dapat dilakukan dengan\r\nmenggunakan peralatan riil atau simulator, bergantung pada kondisi sekolah\r\nmasing-masing.\r\n\r\nSebelum melaksanakan praktikum yang akan dikemas dalam aktivitas\r\npembelajaran, pastikan kalian sudah memahami keselamatan kerja penggunaan alat\r\ndi lingkungan tempat praktik kalian. Hal tersebut sudah dibahas pada bab\r\nsebelumnya.\r\n\r\nBerikut penjelasan singkat tentang hal-hal yang perlu diperhatikan pada\r\nsaat melakukan pengukuran menggunakan alat ukur jaringan komputer dan\r\ntelekomunikasi.', NULL, NULL, '2025-08-12 07:11:22', '2025-08-12 07:11:22'),
(680, 41, '1. LAN Tester\r\n\r\nCara menggunakan alat ini sangat mudah karena pada umumnya, LAN tester\r\nhanya terdiri dari sakelar dan port konektor. Akan tetapi, produk LAN tester\r\nsaat ini (untuk beberapa merek) sudah dilengkapi dengan fasilitas lain,\r\nseperti yang sudah dibahas pada subbab sebelumnya. Secara fisik, alat ini\r\nterdiri dari dua bagian yang dapat dipisahkan sehingga dapat dipergunakan\r\nsecara berjauhan, namun tetap menguji satu kabel yang sama.\r\n\r\nSetiap LAN tester memiliki delapan lampu indikator plus G. Lampu\r\nindikator tersebut akan menyala secara bergantian sesuai dengan urutan\r\natau acak, bergantung pada jenis kabel yang diukur. Jika digunakan untuk\r\nmengukur kabel cross, lampu indikator akan menyala dengan urutan:\r\n➤ nomor 1 dengan nomor 3,\r\n➤ nomor 2 dengan nomor 6,\r\n➤ nomor 4 dengan nomor 4,\r\n➤ nomor 5 dengan nomor 5,\r\n➤ nomor 7 dengan nomor 7, dan\r\n➤ nomor 8 dengan nomor 8.\r\nAdapun untuk kabel jenis straight, lampu akan menyala secara berurutan\r\nmulai dari nomor 1 sampai dengan 8, baik sisi kanan maupun sisi kiri.\r\nAda dua cara yang dapat digunakan untuk mengukur kabel LAN\r\nmenggunakan LAN tester, yaitu sebagai berikut.\r\n\r\na. Menggunakan Satu Sisi LAN Tester\r\nLangkah-langkah kerjanya sebagai berikut.\r\n1) Pasang satu ujung kabel ke dalam port eternet yang aktif dan ujung\r\nlain dimasukkan ke port LAN tester.\r\n2) Nyalakan sakelar on/off pada alat ukur.\r\n3) Apabila kondisi kabel normal, lampu indikator pada LAN tester\r\nakan menyala secara bergantian', NULL, NULL, '2025-08-12 07:11:22', '2025-08-12 07:11:22'),
(681, 41, 'Pengetesan Kabel LAN dengan Bantuan Hub/Switch', NULL, 'materi_gambar/materi_gambar_689b4b8ab25b4.png', '2025-08-12 07:11:22', '2025-08-12 07:11:22'),
(682, 41, 'b. Menggunakan Dua Sisi LAN Tester\r\nLangkah-langkah kerjanya sebagai berikut.\r\n1) Pasang ujung kabel LAN ke dalam port RJ45 yang sudah ada di\r\nkedua sisi alat.\r\n2) Nyalakan sakelar on/off pada alat ukur.\r\n3) Apabila kondisi kabel normal, lampu indikator pada alat ukur akan\r\nmenyala secara bergantian sesuai dengan ketentuan yang sudah\r\ndijelaskan sebelumnya.', NULL, NULL, '2025-08-12 07:11:22', '2025-08-12 07:11:22'),
(683, 41, 'Pengetesan Kabel LAN Straight dan Cross', NULL, 'materi_gambar/materi_gambar_689b4b8acb8d6.png', '2025-08-12 07:11:22', '2025-08-12 07:11:22'),
(684, 41, 'Selain digunakan untuk mengukur konektivitas kabel LAN (UTP), LAN\r\ntester juga dapat digunakan untuk mengukur kabel RJ11 atau kabel telepon.\r\nKabel RJ11 terbagi menjadi dua macam, yaitu 2 pin dan 4 pin. Pada kabel\r\ndengan banyak kabel 2 pin, lampu indikator akan menyala bersamaan pada\r\nLED nomor 3 dan 5. Adapun untuk kabel dengan 4 pin, lampu LED akan\r\nmenyala bersamaan pada nomor 3 dan 4, lalu 2 dan 5.', NULL, NULL, '2025-08-12 07:11:22', '2025-08-12 07:11:22'),
(685, 41, 'Pengukuran Kabel RJ11', NULL, 'materi_gambar/materi_gambar_689b4b8aee3c5.png', '2025-08-12 07:11:23', '2025-08-12 07:11:23'),
(686, 41, '2. Multimeter\r\n\r\nMultimeter atau multitester memiliki fungsi yang cukup beragam (kalian\r\nsudah mengetahuinya pada materi fungsi alat ukur). Pemahaman terhadap cara\r\npemakaian alat ini sangat dibutuhkan agar tidak terjadi kesalahan\r\npembacaan dan kerusakan pada alat ukur, terutama pada multimeter analog.\r\nKalian harus mengetahui cara melakukan pembacaan terhadap skala meter yang menunjukkan hasil pengukuran. Berikut merupakan gambar skala\r\nmeter pada multimeter analog.', NULL, NULL, '2025-08-12 07:11:23', '2025-08-12 07:11:23'),
(687, 41, 'Skala Meter pada Multimeter Analog', NULL, 'materi_gambar/materi_gambar_689b4b8b11393.png', '2025-08-12 07:11:23', '2025-08-12 07:11:23'),
(688, 41, 'Sebelum melakukan pengoperasian multimeter, kalian wajib melakukan\r\npersiapan berikut agar memperoleh hasil yang sesuai.\r\na. Pastikan posisi jarum penunjuk berada pada angka nol multimeter\r\npada papan skala sebelah kiri.', NULL, NULL, '2025-08-12 07:11:23', '2025-08-12 07:11:23'),
(689, 41, 'Posisi Jarum pada Nol Meter', NULL, 'materi_gambar/materi_gambar_689b4b8b2cae3.png', '2025-08-12 07:11:23', '2025-08-12 07:11:23'),
(690, 41, 'b. Apabila belum menunjuk angka nol, aturlah posisi jarum dengan cara\r\nmemutar sekrup (zero adjust screw) dengan obeng minus kecil sampai\r\nposisi pas pada angka nol.\r\nc. Pilihlah cakupan atau skala pengukuran yang sesuai.\r\nCara menggunakan multimeter analog dan multimeter digital untuk\r\nbeberapa jenis pengukuran dapat kalian simak pada materi berikut ini.\r\na. Cara Mengukur Tegangan DC Menggunakan Multimeter Analog\r\nLangkah-langkah kerjanya sebagai berikut.\r\n1) Atur posisi sakelar pemilih (selector) pada posisi DCV.\r\n2) Pilihlah batas ukur mulai dari yang paling besar.\r\n3) Apabila kalian sudah mengetahui tegangan dari catu daya yang\r\nakan diukur, misalnya 1,5 volt, arahkan sakelar pada posisi 3 volt.\r\n4) Hubungkan probe ke terminal tegangan yang akan diukur. Probe\r\nmerah pada polaritas positif dan probe hitam pada polaritas negatif.\r\n5) Baca gerakan jarum pada posisi skala DCV.\r\n6) Apabila pergerakan jarum terlalu kecil dan sulit untuk dibaca,\r\nlakukan pemindahan sakelar pemilih ke nilai yang lebih kecil.\r\nApabila jarum bergerak ke arah kiri, itu berarti polaritas probe\r\nyang dihubungkan ke rangkaian terbalik.\r\n7) Baca hasil penunjukan jarum multimeter dan catat hasilnya.', NULL, NULL, '2025-08-12 07:11:23', '2025-08-12 07:11:23'),
(691, 41, 'Pengukuran Tegangan DC pada Roset Telepon', NULL, 'materi_gambar/materi_gambar_689b4b8b589ca.png', '2025-08-12 07:11:23', '2025-08-12 07:11:23'),
(692, 41, '8) Cara membaca hasil pengukuran multimeter analog', NULL, NULL, '2025-08-12 07:11:23', '2025-08-12 07:11:23'),
(693, 41, 'dapat menggunakan rumus berikut:', NULL, 'materi_gambar/materi_gambar_689b4b8b6855e.png', '2025-08-12 07:11:23', '2025-08-12 07:11:23'),
(694, 41, 'Keterangan:\r\n➤ batas ukur yang digunakan adalah 250 VDC\r\n➤ skala meter yang digunakan adalah 250\r\n➤ penunjukan jarum adalah 55 VDC\r\nDari data di atas, diperoleh hasil pengukuran tegangan DC\r\nmenggunakan multimeter analog sebesar 55 VDC.\r\nb. Cara Mengukur Tegangan DC Menggunakan Multimeter Digital', NULL, NULL, '2025-08-12 07:11:23', '2025-08-12 07:11:23'),
(695, 41, 'Pengukuran Tegangan DC Menggunakan Multimeter Digital', NULL, 'materi_gambar/materi_gambar_689b4b8b79ba2.png', '2025-08-12 07:11:23', '2025-08-12 07:11:23'),
(696, 41, 'Langkah-langkah kerjanya sebagai berikut.\r\n1) Atur posisi sakelar pemilih (selector) pada posisi DCV.\r\n2) Pilihlah batas ukur mulai dari yang paling besar.\r\n3) Apabila kalian sudah mengetahui tegangan dari catu daya yang\r\nakan diukur, misalnya 1,5 volt, arahkan sakelar pada posisi 3 volt.', NULL, NULL, '2025-08-12 07:11:23', '2025-08-12 07:11:23'),
(697, 41, '4) Hubungkan probe ke terminal tegangan yang akan diukur. Probe\r\nmerah pada polaritas positif dan probe hitam pada polaritas negatif.\r\n5) Baca hasil pengukuran yang muncul pada layar. Apabila hasilnya\r\nminus, itu berarti polaritas probe yang dihubungkan ke rangkaian\r\nterbalik.\r\n6) Hasil yang terlihat pada layar merupakan nilai hasil pengukuran.\r\n7) Baca dan catat hasilnya.\r\nc. Cara Mengukur Arus DC Menggunakan Multimeter Analog\r\nLangkah-langkah kerjanya sebagai berikut.\r\n1) Atur posisi sakelar pemilih (selector) pada posisi DCmA atau DCA.\r\n2) Pilihlah batas ukur pada cakupan yang tepat atau di atas cakupan\r\nyang diprediksi berdasarkan perhitungan arus secara teori.\r\n3) Hubungkan probe ke terminal tegangan yang akan diukur. Probe\r\nmerah pada polaritas positif dan probe hitam pada polaritas negatif.', NULL, NULL, '2025-08-12 07:11:23', '2025-08-12 07:11:23'),
(698, 41, 'Pengukuran Arus DC Menggunakan Multimeter Analog', NULL, 'materi_gambar/materi_gambar_689b4b8b95c3b.png', '2025-08-12 07:11:23', '2025-08-12 07:11:23'),
(699, 41, '4) Apabila pergerakan jarum terlalu kecil dan sulit untuk dibaca,\r\nlakukan pemindahan sakelar pemilih ke nilai yang lebih kecil.\r\nApabila jarum bergerak ke arah kiri, itu berarti polaritas probe\r\nyang dihubungkan ke rangkaian terbalik.', NULL, NULL, '2025-08-12 07:11:23', '2025-08-12 07:11:23'),
(700, 41, 'Penunjukan Jarum karena Salah Polarisasi', NULL, 'materi_gambar/materi_gambar_689b4b8bb0403.png', '2025-08-12 07:11:23', '2025-08-12 07:11:23'),
(701, 41, '5) Lakukan pembacaan hasil ukur pada skala DCmA atau A.\r\n6) Cara pembacaan hasil ukur arus DC sama dengan pada saat kalian\r\nmelakukan pengukuran tegangan DC.', NULL, NULL, '2025-08-12 07:11:23', '2025-08-12 07:11:23'),
(702, 41, 'Kalian dapat menggunakan rumus berikut:', NULL, 'materi_gambar/materi_gambar_689b4b8bdaa06.png', '2025-08-12 07:11:23', '2025-08-12 07:11:23'),
(703, 41, 'Keterangan:\r\n➤ batas ukur yang digunakan adalah 0,25 A\r\n➤ skala meter yang digunakan adalah 250\r\n➤ penunjukan jarum adalah VDC 25,5\r\nDari data di atas, diperoleh hasil pengukuran arus DC menggunakan\r\nmultimeter analog sebesar 0,0255 A atau 25,5 mA.\r\n7) Catat hasil pengukuran.', NULL, NULL, '2025-08-12 07:11:23', '2025-08-12 07:11:23'),
(704, 41, 'd. Cara Mengukur Arus DC Menggunakan Multimeter Digital\r\nLangkah-langkah kerjanya sebagai berikut.\r\n1) Atur posisi sakelar pemilih (selector) pada posisi DCmA atau DCA.\r\n2) Pilihlah batas ukur pada cakupan yang tepat atau di atas cakupan\r\nyang diprediksi berdasarkan perhitungan arus secara teori.\r\n3) Hubungkan probe ke terminal tegangan yang akan diukur. Probe\r\nmerah pada polaritas positif dan probe hitam pada polaritas negatif.\r\n4) Baca hasil pengukuran yang muncul pada layar. Apabila hasil minus,\r\nitu berarti polaritas probe yang dihubungkan ke rangkaian terbalik.\r\n5) Hasil yang terlihat pada layar merupakan nilai hasil pengukuran.\r\n6) Baca dan catat hasilnya.', NULL, NULL, '2025-08-12 07:11:23', '2025-08-12 07:11:23'),
(705, 41, 'Pengukuran Arus DC dengan Multimeter Digital', NULL, 'materi_gambar/materi_gambar_689b4b8befc4e.png', '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(706, 41, 'e. Cara Mengukur Tahanan Menggunakan Multimeter Analog\r\nLangkah-langkah kerjanya sebagai berikut.\r\n1) Putar arah sakelar pemilih pada posisi ohm.\r\n2) Usahakan sakelar pemilih sudah mengarah ke batas ukur yang\r\ntidak jauh dari nilai tahanan yang akan diukur (di atas nilai yang\r\nakan diukur). Jika ragu, arahkan ke batas ukur atau faktor kali\r\nyang bernilai paling besar.\r\n3) Hubungkan probe hitam dan probe merah, kemudian atur jarum\r\npenunjuk agar tepat pada nilai 0 ohm.', NULL, NULL, '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(707, 41, 'Pengaturan 0 Ohm', NULL, 'materi_gambar/materi_gambar_689b4b8c1cc29.png', '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(708, 41, '4) Jika pada pengukuran tegangan, skala hasil pengukuran dibaca dari\r\nkiri ke kanan, pada pengukuran tahanan, skala hasil pengukuran\r\ndibaca dari kanan ke kiri.\r\n5) Hubungkan kedua probe, hitam dan merah pada kaki resistor.\r\nUsahakan resistor tidak sedang terhubung pada catuan listrik.', NULL, NULL, '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(709, 41, 'Pengukuran Tahanan', NULL, 'materi_gambar/materi_gambar_689b4b8c3696e.png', '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(710, 41, '6) Baca jarum penunjuk pada skala ohm. Apabila pergerakan jauh ke\r\nkiri, naikkan batas ukur atau faktor kali dengan menggeser sakelar\r\npemilih. Perpindahan sakelar pemilih mengharuskan kalian untuk\r\nmengatur nilai nol ohm kembali.\r\n7) Baca dan catat hasilnya. Cara melakukan pembacaan hasil\r\npengukuran resistansi adalah dengan melihat angka yang\r\nditunjukkan jarum penunjuk pada skala meter dikali faktor pengali\r\nyang dipilih pada sakelar pemilih.\r\n8) Hasil pada multimeter menunjukkan jarum mendekati angka 9\r\npada skala pengukur. Jadi, hasil pengukurannya adalah 8,8 KΩ.\r\n\r\nf. Cara Mengukur Tahanan Menggunakan Multimeter Digital\r\nLangkah-langkah kerjanya sebagai berikut.\r\n1) Putar arah sakelar pemilih pada posisi ohm.\r\n2) Usahakan sakelar pemilih sudah mengarah ke batas ukur yang\r\ntidak jauh dari nilai tahanan yang akan diukur (di atas nilai yang\r\nakan diukur). Jika ragu, arahkan ke batas ukur atau faktor kali\r\nyang bernilai paling besar.\r\n3) Hubungkan kedua probe, hitam dan merah pada kaki resistor.\r\nUsahakan resistor tidak sedang terhubung pada catuan listrik.\r\n4) Apabila layar tidak menunjukkan hasil, kemungkinan batas ukur\r\nterlalu kecil. Pindahkan sakelar pemilih pada batas ukur yang\r\nlebih besar.\r\n5) Angka yang muncul pada layar merupakan hasil pengukuran.\r\n6) Baca dan catat hasilnya.', NULL, NULL, '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(711, 41, 'Pengukuran Tahanan dengan Multimeter Digital', NULL, 'materi_gambar/materi_gambar_689b4b8c560fa.png', '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(712, 41, 'g. Cara Mengukur Tegangan AC Menggunakan Multimeter Analog\r\nLangkah-langkah kerjanya sebagai berikut.\r\n1) Atur posisi sakelar pemilih (selector) pada posisi ACV.\r\n2) Pilihlah batas ukur mulai dari yang paling besar.\r\n3) Apabila kalian sudah mengetahui tegangan dari catu daya yang\r\nakan diukur, misalnya 220 volt, arahkan sakelar pada posisi 250 volt.', NULL, NULL, '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(713, 41, 'Pengukuran Tegangan AC pada Stop Kontak', NULL, 'materi_gambar/materi_gambar_689b4b8c73dc0.png', '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(714, 41, '4) Hubungkan probe ke terminal tegangan yang akan diukur. Untuk\r\ntegangan AC, tidak terdapat polaritas. Oleh karena itu, probe hitam\r\natau merah boleh dihubungkan ke terminal pengukuran secara\r\nbolak-balik.\r\n5) Baca gerakan jarum pada posisi skala ACV.', NULL, NULL, '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(715, 41, 'Hasil Pengukuran Tegangan AC', NULL, 'materi_gambar/materi_gambar_689b4b8c8a4d8.png', '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(716, 41, '6) Baca hasil penunjukan jarum multimeter. Lakukan perhitungan\r\nseperti pada pengukuran tegangan DC, kemudian catat hasilnya.\r\n7) Hasil pengukuran yang terlihat pada Gambar 5.27 menunjukkan\r\nnilai sebesar 230 VAC.', NULL, NULL, '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(717, 41, 'h. Cara Mengukur Tegangan AC Menggunakan Multimeter Digital\r\nLangkah-langkah kerjanya sebagai berikut.\r\n1) Atur posisi sakelar pemilih (selector) pada posisi ACV.\r\n2) Pilihlah batas ukur mulai dari yang paling besar.\r\n3) Apabila kalian sudah mengetahui tegangan dari catu daya yang\r\nakan diukur, misalnya 220 volt, arahkan sakelar pada posisi 250 volt.\r\n4) Hubungkan probe ke terminal tegangan yang akan diukur. Untuk\r\ntegangan AC, tidak terdapat polaritas. Oleh karena itu, probe hitam\r\natau merah boleh dihubungkan ke terminal pengukuran secara\r\nbolak-balik.\r\n5) Baca hasil pengukuran berupa angka yang muncul pada layar\r\nmultimeter digital, kemudian catat hasilnya.', NULL, NULL, '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(718, 41, 'Pengukuran Tegangan AC dengan Multimeter Digital', NULL, 'materi_gambar/materi_gambar_689b4b8ca78e4.png', '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(719, 41, '3. Earth Tester\r\n\r\nEarth tester memiliki fungsi memastikan nilai tahanan pentanahan\r\n(grounding) pada sebuah rangkaian sistem grounding bernilai kecil atau\r\nmendekati nol. Nilai tahanan (resistansi) yang kecil akan mempermudah\r\ntegangan atau arus berlebih—yang disebabkan oleh sambaran petir dan\r\nkebocoran kelistrikan—mengalir dengan cepat ke tanah. Dengan demikian,\r\nperalatan elektronik yang kita miliki akan lebih terjaga.\r\n\r\nPengukuran tahanan grounding perlu dilakukan secara berkala minimal\r\n1 tahun sekali. Jika nilai grounding sudah tidak standar, kita harus segera\r\nmelakukan perbaikan pada instalasinya. Nilai tahanan grounding yang\r\ndipersyaratkan berdasarkan National Fire Protection Association (NFPA)\r\ndan Institute of Electrical and Electronics Engineers (IEEE), maksimal adalah 5\r\nohm. Adapun Persyaratan Umum Instalasi Listrik (PUIL) menyatakan\r\nbahwa standar untuk nilai tahanan grounding adalah 5,0 ohm atau kurang.\r\n\r\nLangkah-langkah yang harus dilakukan pada proses pengukuran\r\ngrounding adalah sebagai berikut.\r\na. Tentukan lokasi pengukuran.\r\nb. Siapkan earth tester, palu, dan ampelas/sikat baja.\r\nc. Ampelas terlebih dahulu bagian grounding (batang atau plat) agar\r\nterbebas dari tanah. Hal ini bertujuan agar konektivitas antara probe\r\ndan instalasi grounding dapat lebih maksimal.\r\nd. Masukkan probe hijau, kuning, dan merah ke lubang yang terdapat pada\r\nearth tester.\r\ne. Hubungkan kabel warna hijau ke kabel atau batang grounding yang\r\nakan diukur.\r\n\r\nf. Sambungkan probe kuning ke besi/spike berbentuk T yang sudah\r\nditancapkan ke tanah dengan jarak 5–10 meter dari pusat grounding.\r\ng. Sambungkan probe merah ke besi/spike berbentuk T yang sudah\r\nditancapkan ke tanah dengan jarak 5–10 meter dari besi/spike pertama', NULL, NULL, '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(720, 41, 'Gambar Instalasi Pengukuran Grounding', NULL, 'materi_gambar/materi_gambar_689b4b8cc1352.png', '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(721, 41, 'h. Apabila menggunakan earth tester jenis analog, arahkan sakelar pemilih\r\n(knob) pada angka x1 atau x10 ohm. Jika menggunakan earth tester jenis\r\ndigital, arahkan pada batas ukur 20 ohm.\r\ni. Baca hasil pengukuran. Pada earth tester analog, hasil pengukuran\r\ndapat dilihat dari penunjukan jarum. Jika menggunakan x1, angka\r\nyang ditunjuk jarum dikalikan 1 Ω. Jika menggunakan x10, angka yang\r\nditunjuk jarum dikalikan 10 Ω. Adapun pada jenis earth tester digital,\r\nkalian cukup melihat angka yang muncul pada layar.', NULL, NULL, '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(722, 41, 'Hasil Pengukuran Earth Tester Digital', NULL, NULL, '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(723, 41, '4. Optical Power Meter (OPM)\r\n\r\nPower meter adalah alat yang wajib dimiliki dan dikuasai penggunaannya\r\noleh teknisi yang bekerja di bidang Fiber Optik. Alat ini umumnya digunakan\r\nuntuk uji terima pada akhir instalasi sebuah jaringan optik. Selain itu, alat\r\nini juga digunakan untuk membantu mendeteksi gangguan yang terjadi\r\npada saluran optik kabel optik dengan cara mengukur nilai level daya yang\r\nterletak pada titik terminasi tertentu\r\n\r\nPengukuran menggunakan power meter memiliki dua metode. Metode\r\npertama adalah pengukuran pada jaringan offliwe atau belum mendapatkan\r\ncatu daya dari Optical Line Terminal (sumber cahaya dari penyelenggara\r\ntelekomunikasi). Metode kedua adalah pengukuran pada saluran optik yang\r\nsudah online (mendapatkan catu daya dari Optical Line Terminal).', NULL, NULL, '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(724, 41, 'a. Cara Melakukan Pengukuran Menggunakan Optical Power Meter\r\npada Jaringan Offline\r\nLangkah-langkah kerjanya sebagai berikut.\r\n1) Siapkan Optical Light Source (OLS), Optical Power Meter (OPM),\r\nkacamata safety, one click cleaner, dan kabel yang akan diukur\r\n(misal patch cord, dummy cable, atau drop core).\r\n2) Gunakan kacamata safety sebelum melakukan pengukuran.\r\n3) Bersihkan ujung konektor dan lubang adaptor menggunakan one\r\nclick cleaner.\r\n4) Pasang kabel yang akan diukur pada OLS dan OPM.\r\n5) Nyalakan OLS dan atur panjang gelombangnya, misalkan 1.310 nm.\r\n6) Nyalakan OPM dan samakan panjang gelombang dengan yang diatur\r\npada OLS.\r\n7) Baca hasil pengukuran pada angka yang memiliki satuan dBm.\r\n8) Catat hasil pengukuran.', NULL, NULL, '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(725, 41, 'Hasil Pengukuran OPM pada Saluran Ofline (Patch Cord)', NULL, NULL, '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(726, 41, 'b. Cara Melakukan Pengukuran Menggunakan Optical Power Meter pada Jaringan Online\r\nLangkah-langkah kerjanya sebagai berikut.\r\n1) Siapkan Optical Power Meter (OPM), safety glasses, one click cleaner, dan titik terminasi yang akan diukur\r\n(misal roset optik).\r\n2) Gunakan kacamata safety sebelum melakukan pengukuran.\r\n3) Bersihkan ujung konektor dan lubang adaptor menggunakan one click cleaner.\r\n4) Nyalakan OPM dan atur lama sesuai dengan lama download yang digunakan oleh operator\r\ntelekomunikasinya, misalkan 1.490 nm.\r\n5) Baca hasil pengukuran yang memiliki satuan dBm.\r\n6) Catat hasil pengukuran.', NULL, NULL, '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(727, 41, 'Hasil Pengukuran OPM pada Saluran Online', NULL, NULL, '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(728, 41, '5. Optical Time Domain Reflectometer (OTDR)\r\n\r\nOTDR memiliki banyak fungsi seperti yang sudah dibahas pada materi awal\r\nbab ini. Sama halnya dengan OPM, alat ini digunakan untuk membantu\r\nmelakukan uji terima dan menganalisis letak gangguan pada sebuah saluran\r\noptik. Dengan menggunakan alat ini, teknisi akan lebih mudah mengetahui\r\nletak kerusakan (misal kabel putus) sehingga gangguan tersebut dapat\r\nsegera ditangani.', NULL, NULL, '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(729, 41, 'Langkah-langkah melakukan pengukuran menggunakan OTDR adalah\r\nsebagai berikut.\r\na. Siapkan OTDR, kacamata safety, one click cleaner, dan kabel yang akan\r\ndigunakan dalam pengukuran dengan panjang minimal 100 meter.\r\nb. Gunakan kacamata safety sebelum melakukan pengukuran.\r\nc. Bersihkan ujung konektor dan lubang adaptor menggunakan one click\r\ncleaner.\r\nd. Pasang ujung kabel yang akan diukur pada OTDR.\r\ne. Lakukan penyetelan parameter pada OTDR, meliputi panjang gelombang,\r\ndistance range, pulse width, duration, dan index of refraction.', NULL, NULL, '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(730, 41, 'Penyetelan Parameter OTDR', NULL, NULL, '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(731, 41, 'f. Lakukan pengukuran dengan menekan tombol Start.\r\ng. Baca hasil pengukuran pada kolom distance.', NULL, NULL, '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(732, 41, 'Hasil Pengukuran OTDR', NULL, NULL, '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(733, 41, 'h. Catat hasil pengukuran.', NULL, NULL, '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(734, 41, '6. Wi-Fi Analyzer\r\n\r\nWi-Fi Analyzer yang akan dibahas pada buku ini berupa aplikasi yang\r\ndapat diinstal pada ponsel kalian. Ada banyak produk yang dapat kalian\r\nakses di Play Store (App Store). Pilihlah aplikasi yang menurut kalian cocok\r\ndigunakan pada ponsel masing-masing!\r\n\r\nBerikut adalah salah satu cara menggunakan aplikasi Wi-Fi Analyzer.\r\na. Unduh aplikasi pada Play Store (App Store).', NULL, NULL, '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(735, 41, 'Gambar Pilihan Aplikasi Wi-Fi Analyzer', NULL, NULL, '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(736, 41, 'b. Lakukan instalasi aplikasi.\r\nc. Gunakan aplikasi untuk melakukan analisis Wi-Fi di sekitar kalian.', NULL, NULL, '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(737, 41, 'Gambar Tampilan Kekuatan Sinyal Wi-Fi', NULL, NULL, '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(738, 41, '7. Speed Test\r\n\r\nBeberapa alamat web tersedia untuk menguji kecepatan unduh (download) dan\r\nunggah (upload) pada saluran internet. Kalian dapat mencoba beberapa alamat\r\nyang sudah pernah kalian cari pada aktivitas sebelumnya. Pada\r\npembahasan kali ini, akan disampaikan cara melakukan speed test pada\r\nsatu alamat web saja. Kalian dapat mencoba pada alamat web lainnya pada saat\r\nmelakukan aktivitas individu dan kelompok.', NULL, NULL, '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(739, 41, 'Berikut ini langkah-langkah melakukan speed test.\r\na. Buka browser pada PC atau laptop masing-masing, kemudian ketikkan\r\nspeedtest.net pada kolom alamat browser', NULL, NULL, '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(740, 41, 'Tampilan Laman Web speedtest', NULL, NULL, '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(741, 41, 'b. Tunggu sampai muncul tampilan laman awal web speedtest.\r\nc. Jalankan dengan cara memilih tombol GO.', NULL, NULL, '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(742, 41, 'Proses Pengujian Kecepatan', NULL, NULL, '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(743, 41, 'd. Tunggu beberapa saat sampai muncul hasil pengujian pada laman\r\ntersebut.', NULL, NULL, '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(744, 41, 'Hasil Pengujian Kecepatan', NULL, NULL, '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(745, 41, '8. Ping Test\r\n\r\nPing test merupakan sebuah metode yang digunakan untuk mengetahui\r\nkonektivitas sebuah jaringan komputer baik jaringan lokal maupun yang\r\nterhubung ke internet. Dengan menggunakan ping test, kita dapat melihat\r\nseberapa cepat respons dari komputer lawan. Semakin cepat respons yang\r\ndiberikan, semakin bagus kondisi jaringannya, demikian sebaliknya.', NULL, NULL, '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(746, 41, 'Berikut langkah-langkah melakukan ping test.\r\na. Buka cmd atau Command Prompt pada laptop atau PC yang terhubung\r\nke sebuah jaringan komputer. Diperbolehkan terhubung menggunakan\r\nWi-Fi atau kabel.\r\nb. Ketikkan ping dilanjutkan alamat IP tujuan. Misalkan ping 10.212.64.1.\r\nc. Tunggu proses reply.\r\nd. Pastikan hasilnya seperti pada Gambar 5.40.', NULL, NULL, '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(747, 41, 'Tampilan Hasil Ping Test', NULL, NULL, '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(748, 41, 'e. Apabila terjadi beberapa hal berikut, segera lakukan perbaikan.\r\n\r\n1) General Failure\r\nKondisi ini terjadi saat sistem tidak dapat mengirimkan paket ping\r\nkarena suatu masalah berupa adanya blocking yang dilakukan oleh\r\nfirewall atau antivirus, atau kabel jaringan tidak terhubung ke\r\nkomputer/laptop.\r\nTindakan yang perlu dilakukan adalah mematikan firewall dan\r\nantivirus, kemudian memeriksa kabel jaringan dan slot LAN\r\nkomputer/laptop kalian. Periksa juga sambungan kabel yang berada\r\npada hub/switch, apakah lampu indikator LED sudah menyala.', NULL, NULL, '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(749, 41, 'Tampilan Error General Failure', NULL, NULL, '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(750, 41, '2) Destination Host Unreachable (DHU)\r\nKondisi ini terjadi karena tidak adanya respons dari host pada\r\nsaat melakukan perintah ping. Kondisi ini juga terjadi ketika host,\r\njaringan, port, atau komputer tertentu tidak dapat dijangkau.\r\nPenyebabnya adalah beberapa hal berikut.\r\n➤ Kabel jaringan/LAN card tidak terhubung dengan baik pada\r\nkomputer/laptop.\r\n➤ Status pada Local Area Connection dalam kondisi Disable.\r\nPengecekan dapat dilakukan pada Network Connection di\r\nControl Panel.\r\n➤ Hub/switch terlalu panas.\r\n➤ Terjadi ketidaksesuaian pada setting-an TCP/IP.\r\nTindakan yang perlu dilakukan, antara lain:\r\n➤ periksa kondisi port, kabel, dan konektor;\r\n➤ pastikan kondisi hub/switch sudah terkoneksi, terlihat dari\r\nlampu indikator; dan\r\n➤ aktifkan status Disable pada LAN Area Connection.', NULL, NULL, '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(751, 41, 'Tampilan Destination Host Unreachabl', NULL, NULL, '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(752, 41, '3) Request Timed Out (RTO)\r\nPenyebab terjadinya RTO, antara lain:\r\n➤ pemakaian bandwidth sudah penuh;\r\n➤ kualitas jaringan buruk;\r\n➤ koneksi IP terputus dapat dikarenakan koneksi Wi-Fi mati\r\natau kabel yang putus;\r\n➤ adanya firewall; dan\r\n➤ kesalahan konfigurasi pada firewall.\r\nTindakan yang perlu dilakukan, antara lain:\r\n➤ memeriksa kembali IP tujuan pada syntax ping;\r\n➤ memeriksa konektivitas kabel atau Wi-Fi;\r\n➤ melakukan disable firewall; dan\r\n➤ memeriksa Network ID pada komputer tujuan', NULL, NULL, '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(753, 41, 'Tampilan Request Timed Out (RTO)', NULL, NULL, '2025-08-12 07:11:24', '2025-08-12 07:11:24'),
(754, 34, '1. Pengetahuan yang Harus Dimiliki untuk Memelihara Alat Ukur\r\n\r\nAlat ukur yang kalian gunakan untuk praktikum di sekolah tentunya membutuhkan perawatan agar tetap awet dan selalu siap digunakan ketika dibutuhkan. Pada kenyataan di lapangan atau dunia kerja pun seperti itu,\r\nperawatan terhadap alat ukur dan alat lainnya wajib dilakukan. Peralatan yang selalu siap digunakan akan menjaga produktivitas dalam sebuah pekerjaan.', NULL, NULL, '2025-08-12 07:13:09', '2025-08-12 07:13:09'),
(755, 34, 'Perawatan merupakan sebuah kegiatan yang diperlukan untuk mempertahankan dan mengembalikan alat kerja ke suatu kondisi yang terbaik. Pemeliharaan secara umum dibedakan menjadi tiga jenis, yaitu sebagai berikut.\r\n\r\na. Preventif\r\nSebuah kegiatan pemeliharaan yang dilakukan sebelum terjadi kerusakan, pemeliharaan jenis ini biasanya dilakukan secara berkala\r\n\r\nb. Korektif\r\nSebuah kegiatan pemeliharaan yanng dilakukan setelah muncul gangguan atau kerusakan pada alat ukur. Apabila terjadi keruskan pada alat ukur, sebaiknya segera dilakukan perbaikan, terutama pada alat ukur yang diperlukan untuk menunjang pekerjaan sehari-hari\r\n\r\nc. Kualitatif\r\nPerawatan yang dilakukan dengan tujuan meningkatkan kualitas hasil pekerjaan yang dilakukan ketika menggunakan peralatan tersebut. Contohnya, update/upgrade perangkat lunak pada alat ukur OTDR menggunakan versi terbaru. Contoh lainnya mengganti alat ukur dengan fasilitas yang lebih lengkap dan mampu membaca hasil pengukuran secara lebih teliti', NULL, NULL, '2025-08-12 07:13:09', '2025-08-12 07:13:09'),
(756, 34, 'Cara melakukan perawatan terhadap alat ukur jaringan komputer dan telekomunikasi adalah dengan memperhatikan prosedur manufaktur atau prosedur operasi kerja pada buku manual yang turut disertakan ketika membeli alat tersebut.\r\n\r\nPenyimpanan peralatan pada tempat yang tepat akan membantu memperpanjang usia alat ukur. Penyimpanan alat ukur, seperti multimeter analog dan multimeter digital, harus selalu dipastikan dimulai dari mematikan sakelar pemilih. Tidak dianjurkan untuk melakukan penyimpanan alat pada ruangan dengan keadaan suhu ekstrem (terlalu panas atau terlalu dingin), kelembapan tinggi, dan tempat yang terlalu banyak medan magnet atau listrik statis.\r\n\r\nDalam penggunaan dan penyimpanan alat ukur, kalian harus menghindari getaran yang terlalu banyak dan terus-menerus walaupun hampir semua alat ukur analog sudah dilengkapi peredam.\r\n\r\nCara-cara tersebut bertujuan mempertahankan ketepatan dan ketelitian alat ukur, khususnya pada multimeter dan earth tester analog. Pemeriksaan kondisi alat ukur perlu dilakukan sebelum digunakan untuk memastikan alat tersebut dapat digunakan dan bekerja dengan baik.', NULL, NULL, '2025-08-12 07:13:09', '2025-08-12 07:13:09'),
(757, 34, '2. Keterampilan yang Dibutuhkan dalam Memelihara Alat Ukur\r\n\r\nKeterampilan yang dibutuhkan dalam memelihara alat ukur, antara lain:\r\na. melakukan tugas-tugas rutin berdasarkan prosedur yang ditetapkan;\r\nb. melakukan tugas-tugas yang lebih luas dan kompleks dengan cara meningkatkan kemampuan dalam bekerja mandiri tanpa arahan dari atasan; serta\r\nc. melakukan pekerjaan yang kompleks dan tidak rutin, yang diatur sendiri, serta bertanggung jawab atas pekerjaan orang lain.', NULL, NULL, '2025-08-12 07:13:09', '2025-08-12 07:13:09'),
(758, 34, '3. Sikap Kerja dalam Memelihara Alat Ukur\r\n\r\nBerikut ini beberapa sikap kerja yang harus diperhatikan untuk menunjang pemeliharaan alat ukur.\r\na. Selalu cermat ketika menggunakan alat ukur, terutama saat menggunakan besaran listrik, seperti tegangan listrik dan arus listrik.\r\nb. Memastikan kabel atau probe yang akan digunakan dalam kondisi baik, tidak terkelupas atau pelindung isolasinya hilang.\r\nc. Memastikan kalibrasi alat sudah dilakukan dengan benar.\r\nd. Memperhatikan keamanan kerja, baik bagi peralatan maupun bagi penggunanya. Keamanan bagi pengguna perlu diperhatikan agar tidak terjadi kecelakaan kerja pada saat menggunakan peralatan.\r\ne. Menggunakan catuan yang sesuai dengan ketentuan pada alat ukur.\r\nf. Melakukan update perangkat lunak alat ukur agar dapat digunakan dengan maksimal.\r\nSetelah kalian mempelajari materi tentang pemeliharaan alat ukur,', NULL, NULL, '2025-08-12 07:13:09', '2025-08-12 07:13:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumpulan_tugas`
--

CREATE TABLE `pengumpulan_tugas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tugas_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(255) NOT NULL,
  `nilai` int(11) DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengumpulan_tugas`
--

INSERT INTO `pengumpulan_tugas` (`id`, `tugas_id`, `user_id`, `file`, `nilai`, `catatan`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'tugas/Y1DgWoQuIlDCQ1PwjWJoUX361BXyCSNZTjDzc78w.pdf', 75, 'soalnya belum relevan', '2025-06-25 08:44:48', '2025-06-25 08:58:51'),
(2, 4, 2, 'tugas/NVjYNIi4wxOm5lBNYHht90ZCTtB3e3YENfBqBXAP.pdf', 60, 'ff', '2025-06-25 21:15:02', '2025-07-10 17:48:09'),
(3, 5, 2, 'tugas/q2rFMSWrXGQugOPUv9HNVr1hG5BsL21L3J00hPlJ.pdf', 21, 'fsfs', '2025-06-25 22:24:37', '2025-06-25 22:27:05'),
(5, 6, 2, 'tugas/3E7vLRCVlsbwMilo2mn09ecIAEp0VGdN87Z2gten.pdf', 90, 'sangat baik', '2025-07-10 10:44:30', '2025-07-10 17:32:53'),
(6, 7, 2, 'tugas/JgnSBDFhxLds1SNYoReRUV3uQMoo2PjDNcuGzcj8.pdf', 67, 'u', '2025-07-10 11:15:36', '2025-07-10 17:15:12'),
(7, 8, 2, 'tugas/s0MGIj1IzUmrPrnFdAYuEMjRgVlGxrThEHChjwHA.pdf', 79, 'fsdfsdf', '2025-07-10 17:42:37', '2025-07-10 17:45:05'),
(8, 9, 2, 'tugas/lJarTkHCo9BaZoejr9rZc9fRkCUfoPV5ZlcyA8z4.pdf', 70, 'afafsa', '2025-07-10 17:44:47', '2025-07-10 17:45:13'),
(9, 14, 2, 'tugas/enHJFSFNT4EagoL3zPxtTfkcy8fMmbnbLaBn3N9m.docx', 80, 'dfsfsdfs', '2025-07-12 00:11:46', '2025-07-12 00:13:09'),
(10, 15, 2, 'tugas/coPmkeYlRLC3wfsHuzHWwOGpJWXSVYZUsrn2Vblk.png', 22, '3', '2025-07-12 05:44:54', '2025-07-12 05:45:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertanyaans`
--

CREATE TABLE `pertanyaans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kuis_id` bigint(20) UNSIGNED NOT NULL,
  `soal` text NOT NULL,
  `opsi_a` varchar(255) NOT NULL,
  `opsi_b` varchar(255) NOT NULL,
  `opsi_c` varchar(255) NOT NULL,
  `opsi_d` varchar(255) NOT NULL,
  `kunci_jawaban` enum('A','B','C','D') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pertanyaans`
--

INSERT INTO `pertanyaans` (`id`, `kuis_id`, `soal`, `opsi_a`, `opsi_b`, `opsi_c`, `opsi_d`, `kunci_jawaban`, `created_at`, `updated_at`) VALUES
(33, 8, 'Tujuan utama melakukan pemeliharaan alat ukur adalah…', 'Agar alat terlihat seperti baru', 'Menghemat biaya pembelian alat baru', 'Mempertahankan kondisi terbaik dan ketepatan pengukuran', 'Mempermudah penyimpanan alat', 'C', '2025-08-10 08:28:23', '2025-08-10 08:28:23'),
(34, 8, 'Multimeter sebaiknya disimpan dalam ruangan dengan kondisi…', 'Suhu ekstrem agar awet', 'Kelembapan tinggi untuk menjaga komponen', 'Tidak terlalu panas atau dingin, dan bebas medan magnet', 'Dekat sumber listrik agar mudah digunakan', 'C', '2025-08-10 08:28:23', '2025-08-10 08:28:23'),
(35, 8, 'Dalam pemeliharaan, mematikan sakelar pemilih multimeter sebelum disimpan bertujuan untuk…', 'Menghemat baterai dan mencegah kerusakan internal', 'Menghindari kehilangan kabel', 'Mempercepat proses pengukuran', 'Membuat alat lebih ringan saat dibawa', 'A', '2025-08-10 08:28:23', '2025-08-10 08:28:23'),
(36, 8, 'Salah satu keterampilan penting dalam memelihara alat ukur adalah…', 'Menggunakan alat tanpa membaca buku manual', 'Melakukan tugas rutin sesuai prosedur yang ditetapkan', 'Menyalakan alat terus-menerus agar siap digunakan', 'Menyimpan alat di tempat terbuka', 'B', '2025-08-10 08:28:23', '2025-08-10 08:28:23'),
(37, 8, 'Kabel atau probe yang rusak pada alat ukur dapat menyebabkan…', 'Hasil pengukuran lebih akurat', 'Risiko keselamatan bagi pengguna', 'Konsumsi daya lebih rendah', 'Penggunaan alat lebih lama', 'B', '2025-08-10 08:28:23', '2025-08-10 08:28:23'),
(38, 8, 'Earth tester digunakan untuk mengukur…', 'Tegangan listrik', 'Tahanan grounding', 'Daya optik', 'Resistansi resistor', 'B', '2025-08-10 08:28:23', '2025-08-10 08:28:23'),
(39, 8, 'Optical Power Meter (OPM) digunakan untuk…', 'Mengukur jarak gangguan pada kabel serat optik', 'Mengukur level daya optik pada saluran online maupun offline', 'Menentukan panjang kabel LAN', 'Menguji kontinuitas kabel UTP', 'B', '2025-08-10 08:28:23', '2025-08-10 08:28:23'),
(40, 8, 'Saat menggunakan Optical Time Domain Reflectometer (OTDR), kita dapat mengetahui…', 'Jenis konektor kabel optik', 'Besar arus pada rangkaian listrik', 'Jarak titik gangguan pada kabel optik', 'Tahanan isolasi kabel', 'C', '2025-08-10 08:28:23', '2025-08-10 08:28:23'),
(41, 8, 'Mengapa update perangkat lunak pada alat ukur penting dilakukan?', 'Agar tampilan alat lebih menarik', 'Memastikan fitur dan akurasi pengukuran selalu optimal', 'Mengurangi berat alat', 'Membuat baterai lebih awet', 'B', '2025-08-10 08:28:23', '2025-08-10 08:28:23'),
(42, 8, 'Langkah pertama sebelum mengukur tegangan DC dengan multimeter adalah…', 'Menyentuh probe untuk memastikan berfungsi', 'Menentukan batas ukur/skala yang sesuai', 'Menghubungkan kabel ke sumber listrik langsung', 'Menyalakan semua alat di meja kerja', 'B', '2025-08-10 08:28:23', '2025-08-10 08:28:23'),
(43, 9, 'Jika ingin mengukur panjang kabel UTP yang digunakan dalam jaringan, spesifikasi apa yang paling penting diperhatikan pada LAN tester?', 'Kapasitas baterai', 'Panjang kabel maksimal yang bisa diukur', 'Jenis konektor yang digunakan', 'Bentuk layar tampilan', 'B', '2025-08-10 08:35:53', '2025-08-10 08:35:53'),
(44, 9, 'OPM dengan panjang gelombang kerja 1.490 nm diperlukan untuk…', 'Mengukur resistansi kabel LAN', 'Mengukur level daya optik arah downlink', 'Mengukur tahanan pentanahan', 'Menguji kontinuitas kabel coaxial', 'B', '2025-08-10 08:35:53', '2025-08-10 08:35:53'),
(45, 9, 'Jika kabel LAN terlihat utuh secara fisik tetapi ada jalur yang tidak terhubung, spesifikasi LAN tester yang harus dimiliki adalah…', 'Mampu menampilkan hasil di LCD', 'Mampu mendeteksi kabel putus di tengah', 'Mampu membaca panjang kabel maksimal 500 m', 'Menggunakan baterai 9 volt', 'B', '2025-08-10 08:35:53', '2025-08-10 08:35:53'),
(46, 9, 'Untuk pengukuran saluran optik 260 km yang tetap online, OTDR harus memiliki kemampuan…', 'Mengukur panjang kabel minimal 200 m', 'Melakukan pengukuran tanpa memutus koneksi', 'Menggunakan konektor RJ11', 'Menggunakan catu daya AC', 'B', '2025-08-10 08:35:53', '2025-08-10 08:35:53'),
(47, 9, 'Saat melakukan pengukuran tahanan pentanahan pada menara telekomunikasi, alat ukur yang tepat adalah…', 'Multimeter digital', 'Tang meter', 'Earth tester', 'Optical power meter', 'C', '2025-08-10 08:35:53', '2025-08-10 08:35:53'),
(48, 9, 'Standar tahanan pentanahan maksimal untuk perangkat telekomunikasi di menara adalah…', '1 ohm', '5 ohm', '10 ohm', '50 ohm', 'A', '2025-08-10 08:35:53', '2025-08-10 08:35:53'),
(49, 9, 'Seorang teknisi ingin mengukur frekuensi listrik yang tidak stabil. Spesifikasi multimeter yang harus ada adalah…', 'Fitur pengukuran arus DC', 'Fitur pengukuran frekuensi', 'Fitur pengukuran tahanan', 'Fitur pengukuran suhu', 'B', '2025-08-10 08:35:53', '2025-08-10 08:35:53'),
(50, 9, 'Untuk survei kekuatan Wi-Fi di sekolah menggunakan HP, aplikasi yang sesuai adalah…', 'Speedtest untuk PC', 'Wi-Fi Analyzer', 'OTDR Simulator', 'LAN Tester App', 'B', '2025-08-10 08:35:53', '2025-08-10 08:35:53'),
(51, 9, 'Spesifikasi “remote unit untuk tes kabel berjauhan” pada LAN tester berguna untuk…', 'Mengukur panjang kabel pendek', 'Menguji kabel dari dua lokasi yang terpisah', 'Menambah daya tahan baterai', 'Mempercepat hasil pengukuran', 'B', '2025-08-10 08:35:53', '2025-08-10 08:35:53'),
(52, 9, 'Mengapa pengetahuan spesifikasi alat ukur penting bagi teknisi jaringan?', 'Agar teknisi tidak salah membawa alat', 'Agar teknisi dapat memilih alat yang sesuai untuk hasil pengukuran akurat', 'Agar alat tidak cepat rusak', 'Agar pekerjaan lebih terlihat profesional', 'B', '2025-08-10 08:35:53', '2025-08-10 08:35:53'),
(53, 10, 'Jika ingin mengukur panjang kabel coaxial dengan LAN tester, berapa panjang maksimal kabel yang bisa diukur sesuai spesifikasi umum?', '100 m', '300 m', '500 m', '1.000 m', 'C', '2025-08-10 08:43:03', '2025-08-10 08:43:03'),
(54, 10, 'Fitur “mampu mendeteksi kabel putus di tengah” pada LAN tester sangat bermanfaat untuk…', 'Menghemat baterai alat', 'Mengetahui lokasi kerusakan kabel yang tidak terlihat', 'Menentukan jenis kabel yang digunakan', 'Menguji sinyal Wi-Fi', 'B', '2025-08-10 08:43:03', '2025-08-10 08:43:03'),
(55, 10, 'Untuk mengukur level daya optik arah downlink dengan panjang gelombang 1.490 nm, alat yang tepat digunakan adalah…', 'LAN Tester', 'Earth Tester', 'Optical Power Meter', 'Tang Ampere', 'C', '2025-08-10 08:43:03', '2025-08-10 08:43:03'),
(56, 10, 'Pengukuran saluran optik sejauh 260 km yang tetap online memerlukan OTDR dengan kemampuan…', 'Mengukur panjang kabel minimal 100 m', 'Melakukan pengukuran tanpa memutus koneksi', 'Mengukur tegangan AC dan DC', 'Menggunakan konektor RJ45', 'B', '2025-08-10 08:43:03', '2025-08-10 08:43:03'),
(57, 10, 'Untuk memeriksa tahanan pentanahan menara telekomunikasi dengan batas maksimal 1 ohm, teknisi harus menggunakan…', 'Multimeter Digital', 'Earth Tester', 'Optical Time Domain Reflectometer', 'Wi-Fi Analyzer', 'B', '2025-08-10 08:43:03', '2025-08-10 08:43:03'),
(58, 10, 'Jika multimeter digital yang digunakan teknisi tidak memiliki fungsi pengukuran frekuensi, maka…', 'Frekuensi bisa diukur dengan LAN Tester', 'Harus menggunakan multimeter dengan fitur pengukuran frekuensi', 'Bisa diganti dengan OPM', 'Frekuensi diukur menggunakan kabel UTP', 'B', '2025-08-10 08:43:03', '2025-08-10 08:43:03'),
(59, 10, 'Fitur “remote unit” pada LAN tester digunakan untuk…', 'Menyambungkan kabel ke internet', 'Menguji kabel dari jarak yang berjauhan', 'Menambah daya baterai', 'Mengukur daya optik', 'B', '2025-08-10 08:43:03', '2025-08-10 08:43:03'),
(60, 10, 'Untuk mengukur kekuatan sinyal Wi-Fi di sekolah dengan HP, aplikasi yang sesuai adalah…', 'LAN Test Mobile', 'OTDR Viewer', 'Wi-Fi Analyzer', 'Fiber Optic Checker', 'C', '2025-08-10 08:43:03', '2025-08-10 08:43:03'),
(61, 10, 'Mengapa pengetahuan tentang spesifikasi alat ukur penting bagi teknisi jaringan?', 'Agar tidak salah memilih alat yang sesuai kebutuhan pekerjaan', 'Agar teknisi bisa bekerja lebih cepat tanpa prosedur', 'Agar alat lebih awet meski tidak digunakan', 'Agar pekerjaan terlihat lebih modern', 'A', '2025-08-10 08:43:03', '2025-08-10 08:43:03'),
(62, 10, 'Seorang teknisi menemukan kabel LAN yang secara fisik utuh namun beberapa jalur tidak berfungsi. Spesifikasi alat ukur yang harus ada untuk mendeteksi masalah tersebut adalah…', 'Kapasitas baterai minimal 9 volt', 'Kemampuan mendeteksi kabel putus di tengah', 'Panjang kabel maksimal 300 m', 'LCD untuk menampilkan hasil', 'B', '2025-08-10 08:43:03', '2025-08-10 08:43:03'),
(63, 11, 'Fungsi utama LAN Tester adalah …', 'Mengukur tegangan listrik', 'Mengecek koneksi kabel LAN RJ45 dan RJ11', 'Mengukur kecepatan internet', 'Mendeteksi panjang kabel', 'B', '2025-08-10 08:48:52', '2025-08-10 08:48:52'),
(64, 11, 'Multimeter analog membutuhkan keterampilan khusus karena …', 'Menggunakan layar LCD', 'Hanya mengukur arus DC', 'Harus membaca skala jarum secara manual', 'Tidak memiliki selector', 'C', '2025-08-10 08:48:52', '2025-08-10 08:48:52'),
(65, 11, 'Fungsi Earth Tester adalah untuk …', 'Mengukur resistansi kabel LAN', 'Mengukur nilai instalasi grounding', 'Mengukur daya optik', 'Menguji koneksi Wi-Fi', 'B', '2025-08-10 08:48:52', '2025-08-10 08:48:52'),
(66, 11, 'Satuan level daya pada sistem komunikasi serat optik adalah …', 'Mbps', 'Ohm', 'Volt', 'dBm', 'D', '2025-08-10 08:48:52', '2025-08-10 08:48:52'),
(67, 11, 'Alat untuk mengukur redaman dan mendeteksi gangguan pada kabel optik adalah …', 'OPM', 'OTDR', 'LAN Tester', 'Speed Test', 'B', '2025-08-10 08:48:52', '2025-08-10 08:48:52'),
(68, 11, 'Speed Test digunakan untuk mengukur …', 'Kekuatan sinyal Wi-Fi', 'Bandwidth atau kecepatan internet', 'Panjang kabel fiber optik', 'Nilai grounding', 'B', '2025-08-10 08:48:52', '2025-08-10 08:48:52'),
(69, 11, 'Aplikasi untuk memeriksa kualitas jaringan Wi-Fi disebut …', 'OTDR', 'OPM', 'Wi-Fi Analyzer', 'LAN Tester', 'C', '2025-08-10 08:48:52', '2025-08-10 08:48:52'),
(70, 11, 'Ping adalah singkatan dari …', 'Packet Internet Network Groper', 'Packet Inter Node Generator', 'Protocol Internet Network Guide', 'Packet Interface Net Group', 'A', '2025-08-10 08:48:52', '2025-08-10 08:48:52'),
(71, 11, 'Multimeter digital memiliki keunggulan …', 'Membutuhkan perhitungan manual', 'Hasil pengukuran langsung muncul di layar', 'Tidak memerlukan baterai', 'Hanya bisa mengukur resistansi', 'B', '2025-08-10 08:48:52', '2025-08-10 08:48:52'),
(72, 11, 'LAN Tester dengan tone checker memiliki fungsi tambahan untuk …', 'Mengukur bandwidth', 'Mengetahui letak kerusakan kabel', 'Mengukur daya optik', 'Menguji kekuatan sinyal', 'B', '2025-08-10 08:48:52', '2025-08-10 08:48:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'guru', 'web', '2025-06-25 05:04:22', '2025-06-25 05:04:22'),
(2, 'siswa', 'web', '2025-06-25 05:04:23', '2025-06-25 05:04:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('is6SfwLaPjaxMylPgKEbAgoHzTVKyJC9kHKUsmgq', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoianJvbndPTUJRWWxCWkpXTlhnQUhlMGdERzRuN1FLMmxSS0pROUJhWCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1755002769),
('KCxvi27XINVekKsLGnuTuFC81QvMY1UOAgTI75aa', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVVIwUm1CVFg2Y3ZEVUlyd2doWkJvMFRPSlJFdVF0WEtaTG5qZW9qQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zdGF0aXN0aWsiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1755008088),
('sZyGpd4p9bOHqGya4XFiRhaL9uPm9Mkg2ZsbjqQ5', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibFllUjM2UWpwc1V0UFRHTVRxUENYMHB3RjdqOHZwWkVYNkE0VXlGViI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1755002778);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
--

CREATE TABLE `tugas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `deadline` date NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tugas`
--

INSERT INTO `tugas` (`id`, `judul`, `deskripsi`, `deadline`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'buatkan nama hewan yang bertelur', 'dasdasdasdasdasdasdasdas', '2025-06-25', 1, '2025-06-25 08:43:36', '2025-06-25 08:43:36'),
(2, 'dasdasd', 'dasdasdas', '2025-06-26', 1, '2025-06-25 11:05:19', '2025-06-25 11:05:19'),
(3, 'dsadasdasdasdas', 'dsadasdsadasd', '2025-06-26', 1, '2025-06-25 11:26:14', '2025-06-25 11:26:14'),
(4, 'dsadasda', 'sdasdasdasd', '2025-06-27', 1, '2025-06-25 11:46:53', '2025-06-25 11:46:53'),
(5, 'asdsad', 'asdasdasd', '2025-06-26', 1, '2025-06-25 22:24:03', '2025-06-25 22:24:03'),
(6, 'buatkan saya pidato', 'yang kreatif', '2025-07-13', 1, '2025-07-10 10:41:45', '2025-07-10 10:41:45'),
(7, 'ssssssssssssssssssssssssssssssss', 'ssssssssssssss', '2025-07-12', 1, '2025-07-10 10:43:10', '2025-07-10 10:43:10'),
(8, 'sssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', 'sssssssssssss', '2025-07-11', 1, '2025-07-10 17:18:49', '2025-07-10 17:18:49'),
(9, 'dsad', 'dasdsa', '2025-07-11', 1, '2025-07-10 17:44:26', '2025-07-10 17:44:26'),
(10, 'dd', 'dd', '2025-07-11', 1, '2025-07-11 02:43:46', '2025-07-11 02:43:46'),
(11, 'ss', 'ss', '2025-07-12', 1, '2025-07-11 21:44:41', '2025-07-11 21:44:41'),
(12, 's', 's', '2025-07-12', 1, '2025-07-11 21:57:53', '2025-07-11 21:57:53'),
(13, 'ddd', 'dd', '2025-07-12', 1, '2025-07-11 21:59:15', '2025-07-11 21:59:15'),
(14, 'ss', 'sss', '2025-07-12', 1, '2025-07-11 22:29:18', '2025-07-11 22:29:18'),
(15, 's', 's', '2025-07-12', 1, '2025-07-12 00:25:31', '2025-07-12 00:25:31'),
(16, 's', 's', '2025-07-12', 1, '2025-07-12 06:01:36', '2025-07-12 06:01:36'),
(17, 's', 's', '2025-07-12', 1, '2025-07-12 06:05:33', '2025-07-12 06:05:33'),
(18, 'Tugas Kelompok', 'Tugas Kelompok: “Creative Maintenance Project”\r\nTopik: Pemeliharaan dan Pengukuran Menggunakan Alat Ukur Jaringan Komputer & Telekomunikasi\r\nJumlah Anggota: 3–4 siswa per kelompok\r\n\r\nTujuan\r\nMelatih siswa melakukan pengamatan langsung pada alat ukur di laboratorium/sekitarnya.\r\n\r\nMengembangkan kreativitas siswa dalam menyajikan informasi.\r\n\r\nMelatih keterampilan kerja sama dan komunikasi kelompok.\r\n\r\nLangkah Tugas\r\nObservasi Lapangan\r\n\r\nPilih minimal 3 jenis alat ukur yang tersedia di laboratorium sekolah atau tempat kerja/industri terdekat.\r\n\r\nContoh alat: Multimeter, LAN Tester, Earth Tester, Optical Power Meter, OTDR.\r\n\r\nDokumentasi Kreatif\r\n\r\nAmbil foto asli alat yang diamati (bisa difoto oleh kelompok).\r\n\r\nBuat sketsa/gambar ilustrasi alat (manual atau digital).\r\n\r\nCatat data berikut:\r\n\r\nNama alat dan fungsinya\r\n\r\nJenis pemeliharaan yang dilakukan\r\n\r\nProsedur pemeliharaan (ringkas)\r\n\r\nSOP penggunaan yang aman\r\n\r\nTips kreatif agar alat lebih awet\r\n\r\nPraktik Pemeliharaan\r\n\r\nLakukan langkah pemeliharaan sesuai buku manual atau SOP (misalnya membersihkan alat, mengecek kabel, memastikan kalibrasi).\r\n\r\nRekam dalam bentuk video berdurasi 2–4 menit yang memperlihatkan proses pemeliharaan, disertai penjelasan singkat dari anggota kelompok.\r\n\r\nPenyajian Hasil\r\n\r\nSajikan hasil dalam salah satu bentuk berikut:\r\n\r\nInfografik (1 lembar ukuran A3)\r\n\r\nPoster digital\r\n\r\nMini-video dokumenter\r\n\r\nE-book mini (5–8 halaman)\r\n\r\nSertakan tabel data seperti contoh di materi, tapi desainnya bebas dan menarik.\r\n\r\nPresentasi Kreatif\r\n\r\nPresentasi 5–7 menit di depan kelas.\r\n\r\nGunakan media pendukung (PowerPoint, video, poster cetak, atau bahkan simulasi langsung).', '2025-08-30', 1, '2025-08-10 08:57:38', '2025-08-10 08:57:38'),
(19, 'Tugas Individu', 'Tujuan\r\nMengasah kemampuan memahami fungsi dan penggunaan alat ukur jaringan komputer dan telekomunikasi.\r\n\r\nMelatih keterampilan siswa dalam mencari informasi teknis dan menyajikannya secara runtut.\r\n\r\nMengembangkan keterampilan berpikir kritis terhadap kelebihan dan keterbatasan tiap alat ukur.\r\n\r\nInstruksi Tugas\r\nPilih 2 alat ukur fisik (hardware) dan 1 alat ukur berbasis perangkat lunak (software) dari daftar berikut:\r\n\r\nLAN Tester\r\n\r\nMultimeter (Analog/Digital)\r\n\r\nEarth Tester\r\n\r\nOptical Power Meter (OPM)\r\n\r\nOptical Time Domain Reflectometer (OTDR)\r\n\r\nSpeed Test\r\n\r\nWi-Fi Analyzer\r\n\r\nPing Test\r\n\r\nCari informasi detail untuk setiap alat yang dipilih, mencakup:\r\na. Fungsi utama alat\r\nb. Bagian-bagian/tombol penting dan fungsinya\r\nc. Cara penggunaan yang benar\r\nd. Contoh kasus penggunaan di dunia kerja\r\ne. Kelebihan dan kekurangannya\r\n\r\nVisualisasi Kreatif\r\n\r\nBuat 1 halaman infografik atau poster digital yang memuat ringkasan poin penting dari alat yang dipilih.\r\n\r\nGunakan gambar/foto alat asli atau ilustrasi buatan sendiri.\r\n\r\nRefleksi Pribadi\r\n\r\nTuliskan 1 paragraf berisi pendapat Anda:\r\n\r\nAlat mana yang menurut Anda paling penting di dunia kerja jaringan, dan alasannya.\r\n\r\nFormat Pengumpulan\r\nDokumen tertulis (PDF/Word) + file infografik/poster (PNG/JPG/PDF)\r\n\r\nMinimal 2 halaman isi (tidak termasuk cover)', '2025-08-30', 1, '2025-08-10 08:59:40', '2025-08-10 08:59:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Guru', 'guru@example.com', NULL, '$2y$12$SZLDujqhgUP3XKw33tcM5uGQNJ4.rPtDO6GsX8biIdLH6YhweJ1Mu', NULL, NULL, 'ZCYNdzos6vQq1inCpr3RBKfXVsnDBM0RDJh8LsXnsmWvuZAGYrNU3pMA7dMD', '2025-06-25 05:04:23', '2025-06-25 05:04:23'),
(2, 'Siswa', 'siswa@example.com', NULL, '$2y$12$VH8Amds0veAspdB1fXCGWuwoflLNOkaRPP.Lzrkg.WDG4vFA/BatG', NULL, NULL, NULL, '2025-06-25 05:04:23', '2025-06-25 05:04:23'),
(12, 's', 's@example.com', NULL, '$2y$12$c87d7QYmWIPnHO7ByUQ2Ouf.RoaMjLz.Xar4pb3slK6KqgQi6sTQ6', NULL, NULL, NULL, '2025-07-10 23:40:46', '2025-07-10 23:40:46');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensis`
--
ALTER TABLE `absensis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absensis_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `agenda_sekolahs`
--
ALTER TABLE `agenda_sekolahs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aktivitas`
--
ALTER TABLE `aktivitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aktivitas_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `aktivitas_siswas`
--
ALTER TABLE `aktivitas_siswas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aktivitas_siswas_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `games_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `jawabans`
--
ALTER TABLE `jawabans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jawabans_pertanyaan_id_foreign` (`pertanyaan_id`),
  ADD KEY `jawabans_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kehadirans`
--
ALTER TABLE `kehadirans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kehadirans_absensi_id_user_id_unique` (`absensi_id`,`user_id`),
  ADD KEY `kehadirans_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `komentars`
--
ALTER TABLE `komentars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `komentars_materi_id_foreign` (`materi_id`),
  ADD KEY `komentars_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `kuis`
--
ALTER TABLE `kuis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kuis_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `materis`
--
ALTER TABLE `materis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materis_kategori_id_foreign` (`kategori_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `modul_pelajarans`
--
ALTER TABLE `modul_pelajarans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indeks untuk tabel `paragrafs`
--
ALTER TABLE `paragrafs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paragrafs_materi_id_foreign` (`materi_id`);

--
-- Indeks untuk tabel `pengumpulan_tugas`
--
ALTER TABLE `pengumpulan_tugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengumpulan_tugas_tugas_id_foreign` (`tugas_id`),
  ADD KEY `pengumpulan_tugas_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `pertanyaans`
--
ALTER TABLE `pertanyaans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pertanyaans_kuis_id_foreign` (`kuis_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tugas_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensis`
--
ALTER TABLE `absensis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `agenda_sekolahs`
--
ALTER TABLE `agenda_sekolahs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `aktivitas`
--
ALTER TABLE `aktivitas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `aktivitas_siswas`
--
ALTER TABLE `aktivitas_siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `games`
--
ALTER TABLE `games`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jawabans`
--
ALTER TABLE `jawabans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `kehadirans`
--
ALTER TABLE `kehadirans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `komentars`
--
ALTER TABLE `komentars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `kuis`
--
ALTER TABLE `kuis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `materis`
--
ALTER TABLE `materis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `modul_pelajarans`
--
ALTER TABLE `modul_pelajarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `paragrafs`
--
ALTER TABLE `paragrafs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=759;

--
-- AUTO_INCREMENT untuk tabel `pengumpulan_tugas`
--
ALTER TABLE `pengumpulan_tugas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pertanyaans`
--
ALTER TABLE `pertanyaans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absensis`
--
ALTER TABLE `absensis`
  ADD CONSTRAINT `absensis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `aktivitas`
--
ALTER TABLE `aktivitas`
  ADD CONSTRAINT `aktivitas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `aktivitas_siswas`
--
ALTER TABLE `aktivitas_siswas`
  ADD CONSTRAINT `aktivitas_siswas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `games_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jawabans`
--
ALTER TABLE `jawabans`
  ADD CONSTRAINT `jawabans_pertanyaan_id_foreign` FOREIGN KEY (`pertanyaan_id`) REFERENCES `pertanyaans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jawabans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kehadirans`
--
ALTER TABLE `kehadirans`
  ADD CONSTRAINT `kehadirans_absensi_id_foreign` FOREIGN KEY (`absensi_id`) REFERENCES `absensis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kehadirans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `komentars`
--
ALTER TABLE `komentars`
  ADD CONSTRAINT `komentars_materi_id_foreign` FOREIGN KEY (`materi_id`) REFERENCES `materis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `komentars_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kuis`
--
ALTER TABLE `kuis`
  ADD CONSTRAINT `kuis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `materis`
--
ALTER TABLE `materis`
  ADD CONSTRAINT `materis_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `paragrafs`
--
ALTER TABLE `paragrafs`
  ADD CONSTRAINT `paragrafs_materi_id_foreign` FOREIGN KEY (`materi_id`) REFERENCES `materis` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengumpulan_tugas`
--
ALTER TABLE `pengumpulan_tugas`
  ADD CONSTRAINT `pengumpulan_tugas_tugas_id_foreign` FOREIGN KEY (`tugas_id`) REFERENCES `tugas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengumpulan_tugas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pertanyaans`
--
ALTER TABLE `pertanyaans`
  ADD CONSTRAINT `pertanyaans_kuis_id_foreign` FOREIGN KEY (`kuis_id`) REFERENCES `kuis` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD CONSTRAINT `tugas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
