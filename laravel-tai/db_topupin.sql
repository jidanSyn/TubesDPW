-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jun 2023 pada 03.28
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_topupin`
--

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
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `foto` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `games`
--

INSERT INTO `games` (`id`, `name`, `slug`, `foto`, `banner`, `created_at`, `updated_at`) VALUES
(1, 'Mobile Legend', 'mobile-legend', 'mobilelegend.jpg', 'banner-ml.jpeg', '2023-06-21 08:05:03', '2023-06-21 08:05:03'),
(2, 'Genshin', 'genshin', 'genshin.jpg', 'banner-genshin.png', '2023-06-21 08:05:03', '2023-06-21 08:05:03'),
(3, 'Honkai Star Rail', 'honkai-star-rail', 'honkai-star-rail.jpg', 'banner-hsr.jpg', '2023-06-21 08:05:03', '2023-06-21 09:49:49'),
(4, 'Free Fire', 'free-fire', 'free-fire.png', 'free-fire-banner.jpg', '2023-06-21 08:05:22', '2023-06-21 08:05:34'),
(5, 'Valorant', 'valorant', 'valorant.png', 'valorant-banner.jpg', '2023-06-21 09:15:42', '2023-06-21 09:15:42'),
(6, 'Call of Duty Mobile', 'call-of-duty-mobile', 'call-of-duty-mobile.jpg', 'call-of-duty-mobile-banner.jpg', '2023-06-21 09:30:10', '2023-06-21 09:51:26'),
(7, 'League of Legends Wild Rift', 'league-of-legends-wild-rift', 'league-of-legends-wild-rift.jpg', 'league-of-legends-wild-rift-banner.png', '2023-06-21 09:36:58', '2023-06-21 09:54:13'),
(8, 'PUBG Mobile', 'pubg-mobile', 'pubg-mobile.jpg', 'pubg-mobile-banner.jpg', '2023-06-21 09:39:21', '2023-06-21 09:39:21'),
(9, 'Stumble Guys', 'stumble-guys', 'stumble-guys.png', 'stumble-guys-banner.png', '2023-06-21 09:41:17', '2023-06-21 09:41:17'),
(10, 'Arena of Valor', 'arena-of-valor', 'arena-of-valor.jpg', 'arena-of-valor-banner.png', '2023-06-21 09:43:33', '2023-06-21 09:43:33'),
(11, 'Honkai Impact 3', 'honkai-impact-3', 'honkai-impact-3.jpg', 'honkai-impact-3-banner.png', '2023-06-21 09:46:13', '2023-06-21 09:46:13'),
(12, 'Steam Wallet', 'steam-wallet', 'steam-wallet.jpg', 'steam-wallet-banner.png', '2023-06-21 09:48:19', '2023-06-21 09:48:19');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_19_124040_create_games_table', 1),
(6, '2023_06_19_124514_create_products_table', 1),
(7, '2023_06_19_131028_create_transactions_table', 1),
(8, '2023_06_21_044401_create_pembayarans_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayarans`
--

CREATE TABLE `pembayarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pembayarans`
--

INSERT INTO `pembayarans` (`id`, `name`, `slug`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Dana', 'dana', 'dana.png', '2023-06-21 08:05:03', '2023-06-21 08:05:03'),
(2, 'Gopay', 'gopay', 'gopay.png', '2023-06-21 08:05:03', '2023-06-21 08:05:03'),
(3, 'Qris', 'qris', 'qris.png', '2023-06-21 08:05:03', '2023-06-21 08:05:03');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `game_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `foto` varchar(255) NOT NULL,
  `harga` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `game_id`, `name`, `slug`, `foto`, `harga`, `created_at`, `updated_at`) VALUES
(1, 1, '90 Diamond', '90-diamond', 'diamond_ml.jpg', '30000.00', '2023-06-21 08:05:03', '2023-06-21 08:05:03'),
(2, 1, '900 Diamond', '900-diamond', 'diamond_ml.jpg', '300000.00', '2023-06-21 08:05:03', '2023-06-21 08:05:03'),
(3, 2, '120 primo', '120-primo', 'primo_genshin.jpg', '40000.00', '2023-06-21 08:05:03', '2023-06-21 08:05:03'),
(4, 2, '200 primo', '200-primo', 'primo_genshin.jpg', '90000.00', '2023-06-21 08:05:03', '2023-06-21 08:05:03'),
(5, 3, '80 crystal', '80-crystal', 'crystal.jpg', '27000.00', '2023-06-21 08:05:03', '2023-06-21 08:05:03'),
(6, 3, '180 crystal', '180-crystal', 'crystal.jpg', '200000.00', '2023-06-21 08:05:03', '2023-06-21 08:05:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `purchased_on` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `is_admin`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jidan Abdurahman Aufan', 'jidan_', 'ark@akmail.com', 1, NULL, '$2y$10$w/B2MtgiTJsGaT1QldK/PeJHL517jIJkq3dJgU0E7ca4rSSq95YSu', NULL, '2023-06-21 08:05:03', '2023-06-21 08:05:03'),
(2, 'Repan Dhia Nararya', 'repan_', 'ark1@akmail.com', 1, NULL, '$2y$10$O6CPvTgEdUnqbWiSEt1ukel2.8eZz9Z6Q22ug9R/E/m.zf.umOx1C', NULL, '2023-06-21 08:05:03', '2023-06-21 08:05:03');

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
-- Indeks untuk tabel `games`
--
ALTER TABLE `games`
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
-- Indeks untuk tabel `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
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
-- AUTO_INCREMENT untuk tabel `games`
--
ALTER TABLE `games`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pembayarans`
--
ALTER TABLE `pembayarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
