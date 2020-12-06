-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Des 2020 pada 19.04
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kokeru`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `images`
--

INSERT INTO `images` (`id`, `name`, `image_path`, `created_at`, `updated_at`) VALUES
(1, '[\"1.PNG\",\"2.PNG\",\"3.PNG\",\"4.PNG\"]', '[\"1.PNG\",\"2.PNG\",\"3.PNG\",\"4.PNG\"]', '2020-12-06 05:02:50', '2020-12-06 05:02:50'),
(2, '[\"1.PNG\",\"2.PNG\",\"3.PNG\",\"4.PNG\"]', '[\"1.PNG\",\"2.PNG\",\"3.PNG\",\"4.PNG\"]', '2020-12-06 05:24:20', '2020-12-06 05:24:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_12_02_145318_create_rooms_table', 2),
(5, '2020_12_06_111429_create_images_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rooms`
--

CREATE TABLE `rooms` (
  `id_ruang` bigint(20) UNSIGNED NOT NULL,
  `nama_ruang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gedung` char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `petugas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_ruang` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_bukti` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rooms`
--

INSERT INTO `rooms` (`id_ruang`, `nama_ruang`, `gedung`, `status`, `petugas`, `foto_ruang`, `foto_bukti`, `created_at`, `updated_at`) VALUES
(5, 'A1', 'D', 'BELUM', 'Andra Nugraha', 'A1.png', '1607266798.jpg', NULL, '2020-12-06 08:03:37'),
(6, 'A2', 'A', 'BELUM', 'Dyan Azka', 'A2.png', NULL, NULL, '2020-12-06 01:24:45'),
(7, 'B1', 'B', 'BELUM', 'Dyan Azka', 'B1.png\r\n', '1607237303.png', NULL, '2020-12-06 03:08:51'),
(8, 'B2', 'B', 'BELUM', 'Dyan Azka', 'B2.png', NULL, NULL, NULL),
(9, 'C1', 'C', 'SUDAH', 'Andien Dwi', 'C1.png', '1607266042.PNG', NULL, '2020-12-06 07:47:22'),
(10, 'C2', 'C', 'SUDAH', 'Andien Dwi', 'C2.png', '1607252200.jpg', NULL, '2020-12-06 03:56:40'),
(11, 'D1', 'D', 'BELUM', 'Aditya Rahmat', 'D1.png', NULL, NULL, NULL),
(12, 'D2', 'D', 'BELUM', 'Aditya Rahmat', 'D2.png', NULL, NULL, NULL),
(13, 'E1', 'E', 'BELUM', 'Andra Nugraha', 'E1.png', NULL, NULL, NULL),
(14, 'E2', 'E', 'BELUM', 'Andra Nugraha', 'E2.png', NULL, NULL, NULL),
(15, 'F1', 'F', 'BELUM', 'Yos Sudarso', 'f1.png', NULL, NULL, NULL),
(16, 'F2', 'F', 'BELUM', 'Muhammad Bagus', 'f2.png', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `is_admin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'aa@aa', NULL, 1, '$2y$10$j83xgVxdjWCb9vCs5DH4EuG0JcyH7wyZprX9VN0bYsNqpUeywA42m', NULL, '2020-12-02 00:32:38', '2020-12-02 00:32:38'),
(2, 'User', 'uu@uu', NULL, 0, '$2y$10$1BT/sxvu/.kjRjjtTFZyFe3nKcmPURiFOiFjNtTtCtBUE8DE9p7GS', NULL, '2020-12-02 00:32:38', '2020-12-02 00:32:38'),
(11, 'Dyan Azka', 'dyanazka@gmail.com', NULL, NULL, '$2y$10$4RtHoII568qAxvtISwMOdOBlxRDlqxwFi0mcc/kNGeJSVhiNM/7t2', NULL, '2020-12-04 13:47:40', '2020-12-04 13:47:40'),
(12, 'Gamas Adi', 'gamasadi@gmail.com', NULL, NULL, '$2y$10$XMLaSRYmC9LJF4rIzPCILuoMbuDM55p9PcTcTBDGInkJxeVvjUwEG', NULL, '2020-12-04 13:48:44', '2020-12-04 13:48:44'),
(13, 'Andien Dwi', 'andien@gmail.com', NULL, NULL, '$2y$10$Mom51JSrIhy2QI77OhLMwuNCb06G8XEQ.IajUVrmqIC.7Tqwpsa/m', NULL, '2020-12-04 13:50:08', '2020-12-04 13:50:08'),
(14, 'Aditya Rahmat', 'adit@gmail.com', NULL, NULL, '$2y$10$VOviypHuL8IDyFmF3XLUjeVmvgCFta1GP.xTpcWLYndvLyxrCY7ja', NULL, '2020-12-04 13:50:45', '2020-12-04 13:50:45'),
(15, 'Andra Nugraha', 'andra@gmail.com', NULL, NULL, '$2y$10$guTyEd6WU1YySMsbjbQhuuf6df7XEYj6GqpQoAW6RDR7CD2V5iraK', NULL, '2020-12-04 13:51:34', '2020-12-04 13:51:34'),
(16, 'Aziiza Yvelliechia', 'aziza@gmail.com', NULL, NULL, '$2y$10$c1Mg2A0FXfjxMDDyaO560eRaWWMsBA7lpdPz76KNKT6KcDTn89Xya', NULL, '2020-12-04 13:52:08', '2020-12-04 13:52:08'),
(17, 'Yos Sudarso', 'yos@gmail.com', NULL, NULL, '$2y$10$d28MtDNBBm8I8xyNjUM3We51ADGNdQp1ibQCEV1LF7eovPGQD55C2', NULL, '2020-12-04 13:53:20', '2020-12-04 13:53:20'),
(18, 'Benny Bagus', 'benny@gmail.com', NULL, NULL, '$2y$10$mkNX1s3/HjIJe9k74Hs0beNaZZ3eUqNdezwr2uY..P2U3FDfdMHMG', NULL, '2020-12-04 13:54:04', '2020-12-04 13:54:04'),
(19, 'Muhammad Bagus', 'bagus@gmail.com', NULL, NULL, '$2y$10$mCEnZrfScCSJZz3gIiugsevTYIM2bhc/z/xWSd6EfcXKQ4tc2ubaW', NULL, '2020-12-04 13:55:05', '2020-12-04 13:55:05'),
(20, 'Anak Agung', 'anak@gmail.com', NULL, NULL, '$2y$10$76b2pHidgxcsB9lg.manW.B1StsapiGry6Q1yRcHhnGMeCoG5Tmp2', NULL, '2020-12-04 13:55:49', '2020-12-04 13:55:49'),
(21, 'Admin', 'admin@gmail.com', NULL, 1, '$2y$10$5M925eq1hyXmZyrX28Eyoee2AgnVYXZimj8ndARi8QOh.eGFCmJ8C', NULL, '2020-12-04 13:56:24', '2020-12-04 13:56:24');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id_ruang`);

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
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id_ruang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
