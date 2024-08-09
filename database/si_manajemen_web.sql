-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2024 at 10:35 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_manajemen_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosens`
--

CREATE TABLE `dosens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kode_dosen` int(11) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `name` varchar(100) NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dosens`
--

INSERT INTO `dosens` (`id`, `user_id`, `kelas_id`, `kode_dosen`, `nip`, `name`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 19234, 'kd9923972398', 'kaprodi admin', 1, '2024-08-08 06:33:02', '2024-08-08 06:33:02'),
(4, 7, 4, 123, '123', 'Ahmad Baihaqi S.KOM, Meng', 2, '2024-08-09 00:35:23', '2024-08-09 00:35:23'),
(5, 8, 0, 124, '124', 'Dr. Ahmad Mujib', 2, '2024-08-09 00:36:02', '2024-08-09 00:36:02'),
(6, 9, 6, 125, '125', 'Haikal Wahyu Skom, Mkom', 2, '2024-08-09 00:36:31', '2024-08-09 00:36:31'),
(7, 10, 0, 126, '126', 'Dr. Muhaimin S.Kom', 2, '2024-08-09 00:37:24', '2024-08-09 00:37:24'),
(8, 11, 0, 127, '127', 'Ahmad Zainuddin S.Kom, Meng', 2, '2024-08-09 00:38:14', '2024-08-09 00:38:14');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `kapasitas` int(11) NOT NULL DEFAULT 10,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `name`, `kapasitas`, `created_at`, `updated_at`) VALUES
(0, '', 10, NULL, NULL),
(4, 'Peternakan', 10, '2024-08-08 06:35:17', '2024-08-08 06:35:17'),
(6, 'Pertanian', 10, '2024-08-08 06:35:55', '2024-08-09 00:34:07');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswas`
--

CREATE TABLE `mahasiswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nim` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `birth_place` varchar(100) NOT NULL,
  `birth_date` varchar(10) NOT NULL,
  `edit_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mahasiswas`
--

INSERT INTO `mahasiswas` (`id`, `user_id`, `kelas_id`, `nim`, `name`, `birth_place`, `birth_date`, `edit_status`, `created_at`, `updated_at`) VALUES
(1, 4, 4, 'E41210578', 'Ahmad Rizar', 'Nganjuk', '2024-08-08', 0, '2024-08-08 06:50:33', '2024-08-09 01:13:25'),
(2, 5, 6, 'E41210578', 'Putra R', 'Nganjuk', '2024-08-08', 0, '2024-08-08 06:51:21', '2024-08-09 01:12:09'),
(3, 6, 6, 'E41210579', 'Rizal M', 'Nganjuk', '2024-08-08', 0, '2024-08-08 06:51:33', '2024-08-09 01:12:09'),
(4, 12, 4, 'E41210576', 'Deky Reza', 'Nganjuk', '2024-08-09', 0, '2024-08-09 00:40:49', '2024-08-09 01:13:25'),
(5, 13, 6, 'E41210512', 'Prasetyo M', 'Nganjuk', '2024-08-09', 0, '2024-08-09 00:42:04', '2024-08-09 01:12:09'),
(6, 14, 4, 'E41210511', 'Putri Rahayu', 'Nganjuk', '2024-08-09', 0, '2024-08-09 00:42:33', '2024-08-09 01:13:25'),
(7, 15, 6, 'E41210555', 'Ahmad Rozaki', 'Nganjuk', '2024-08-09', 0, '2024-08-09 00:43:03', '2024-08-09 01:12:09'),
(8, 16, 4, 'E41210533', 'Muhammad Rafi', 'Nganjuk', '2024-08-09', 0, '2024-08-09 00:43:34', '2024-08-09 01:13:25'),
(9, 17, 6, 'E41210544', 'Muhammad Jaki', 'Nganjuk', '2024-08-09', 0, '2024-08-09 00:44:04', '2024-08-09 01:12:09'),
(10, 18, 4, 'E41210544', 'Ahmad Putra', 'Nganjuk', '2024-08-09', 0, '2024-08-09 00:46:23', '2024-08-09 01:13:25'),
(11, 19, 6, 'E41210532', 'Muhammad Akbar', 'Nganjuk', '2024-08-09', 0, '2024-08-09 00:48:23', '2024-08-09 01:12:09'),
(12, 20, 4, 'E41210567', 'Ahmad Yudha', 'Nganjuk', '2024-08-09', 0, '2024-08-09 00:48:51', '2024-08-09 01:13:25'),
(13, 21, 6, 'E41210519', 'Ahmad Tegar', 'Nganjuk', '2024-08-09', 0, '2024-08-09 00:49:23', '2024-08-09 01:12:09'),
(14, 22, 4, 'E41210555', 'Ahmad Yanuar', 'Nganjuk', '2024-08-09', 0, '2024-08-09 00:50:03', '2024-08-09 01:13:25'),
(15, 23, 6, 'E41210534', 'Ahmad Edzam', 'Nganjuk', '2024-08-09', 0, '2024-08-09 00:50:35', '2024-08-09 01:12:09'),
(16, 24, 4, 'E41210589', 'Ahmad Laksono', 'Nganjuk', '2024-08-09', 0, '2024-08-09 00:51:18', '2024-08-09 01:13:25'),
(17, 25, 6, 'E41210543', 'Ahmad Rizal', 'Nganjuk', '2024-08-09', 0, '2024-08-09 00:53:05', '2024-08-09 01:12:09'),
(19, 27, 4, 'E41210522', 'Muhammad Robi', 'Nganjuk', '2024-08-09', 0, '2024-08-09 00:54:34', '2024-08-09 01:13:25'),
(20, 28, 4, 'E41210556', 'Muhammad Tio', 'Nganjuk', '2024-08-09', 0, '2024-08-09 00:55:44', '2024-08-09 01:13:25'),
(21, 29, 6, 'E41210587', 'Muhammad Yasin', 'Nganjuk', '2024-08-09', 0, '2024-08-09 00:56:21', '2024-08-09 01:12:09');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2024_08_05_065725_create_roles_table', 1),
(3, '2024_08_05_070731_create_users_table', 1),
(4, '2024_08_05_071109_create_kelas_table', 1),
(5, '2024_08_05_075313_create_mahasiswas_table', 1),
(6, '2024_08_05_075401_create_req_update_data_table', 1),
(7, '2024_08_05_081609_create_dosens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `req_update_data`
--

CREATE TABLE `req_update_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `mahasiswa_id` bigint(20) UNSIGNED NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(1, 'kaprodi', NULL),
(2, 'dosen', NULL),
(3, 'mahasiswa', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'kaprodi@gmail.com', 'kaprodiAdmin', '$2y$10$CPvgT/MbTXg0AkIMN6AhA.kwUVqTDhMz5Tz8pp7GLgi6y0I/opSMa', 1, '2024-08-08 06:33:02', '2024-08-08 06:33:02'),
(4, 'ahmad@gmail.com', 'ahmad', '$2y$12$XiM2Pk8d1M/xSuZN3G2JA.9oQUgZy3ZJqw7fa1EQZRQo95CrPW8gy', 3, '2024-08-08 06:50:33', '2024-08-08 06:50:33'),
(5, 'tmoen@gmail.com', 'sfsdf', '$2y$10$CPvgT/MbTXg0AkIMN6AhA.kwUVqTDhMz5Tz8pp7GLgi6y0I/opSMa', 3, '2024-08-08 06:51:21', '2024-08-08 06:51:21'),
(6, 'leonie72@gmail.com', 'enola88', '$2y$12$U1hdFpT3kf2oEZa1PWsUQegFtjjqbOZFa7WNtsb9XUt012fDa376q', 3, '2024-08-08 06:51:33', '2024-08-08 06:51:33'),
(7, 'baihaqi@gmail.com', 'baihaqi', '$2y$12$FMArE8OaskvaVsy826rCJeqn.ykM6r3VBtfG7H8WC6FI3KYJZVfhC', 2, '2024-08-09 00:35:23', '2024-08-09 00:35:23'),
(8, 'mujib@gmail.com', 'mujib', '$2y$12$t1hPz/h/.1E4jlQskCz4Bue03xN0010tGAL0C5ifX83tfNbGe7eQ6', 2, '2024-08-09 00:36:02', '2024-08-09 00:36:02'),
(9, 'haikal@gmail.com', 'haikal', '$2y$12$5O0GRndD25bVIPK/x5h69eqC.wcW00Kyuwvjaxshf/P9kIM9Lh7Oq', 2, '2024-08-09 00:36:31', '2024-08-09 00:36:31'),
(10, 'muhaimin@gmail.com', 'muhaimin', '$2y$12$XxaRpgW5PsSM4IeT6bcUs.G.UhiNaaMaTRiIIE.IxAAXI28ENnvDi', 2, '2024-08-09 00:37:24', '2024-08-09 00:37:24'),
(11, 'zainuddin@gmail.com', 'zainuddin', '$2y$12$pUUmmYNNigmxVNXd6J9/kee9oqIhBibqgdjXTVjhge.WJETU.VefG', 2, '2024-08-09 00:38:14', '2024-08-09 00:38:14'),
(12, 'dekyreza@gmail.com', 'dekyreza', '$2y$12$bQhhAK6i9HvnJAVCKgs65.uzw.94DdRdB5Ormuh3X/0Ln6xFMZHoG', 3, '2024-08-09 00:40:49', '2024-08-09 00:40:49'),
(13, 'prasetyo@gmail.com', 'prasetyo', '$2y$12$KqGW.c52TstVKTtBKZl0I.Yju79EOk/9ZMNSLWer/sHjIh5tig9MO', 3, '2024-08-09 00:42:04', '2024-08-09 00:42:04'),
(14, 'rahayu@gmail.com', 'rahayu', '$2y$12$73bTMEy/qsA8vwangV6vz.qw6SHI4JJ/3CILnIFJcvsoXc9JqhVyi', 3, '2024-08-09 00:42:33', '2024-08-09 00:42:33'),
(15, 'rozaki@gmail.com', 'rozaki', '$2y$12$MOK1bHv7MJNErpjDNrxDFew3vFgnGZyt0GJnj5/T9rAsUjKle.17q', 3, '2024-08-09 00:43:03', '2024-08-09 00:43:03'),
(16, 'rafi@gmail.com', 'rafi', '$2y$12$9KhZdUkGVh0kcgoJB1BnbuCTVvE9w4oVbXxQ/X3SSw1YioJXNwTMu', 3, '2024-08-09 00:43:34', '2024-08-09 00:43:34'),
(17, 'jaki@gmail.com', 'jaki', '$2y$12$82xTbU1pxqwaf4RF9mcu3.lYDf2NjZjDABp0luv4QPjCsZPOtX00u', 3, '2024-08-09 00:44:04', '2024-08-09 00:44:04'),
(18, 'ahmadputra@gmail.com', 'ahmadputra', '$2y$12$ae7SPRwX1EI0DzDla3IkQ.6lJnsMhblGfjU4C/7fxPskrWiHoKmke', 3, '2024-08-09 00:46:23', '2024-08-09 00:46:23'),
(19, 'akbar@gmail.com', 'akbar', '$2y$12$O3OYVKonnYgEKuoyYdcNauMM2OtNJ2kRao/oomtJYByohtfe3bzFe', 3, '2024-08-09 00:48:23', '2024-08-09 00:48:23'),
(20, 'yudha@gmail.com', 'yudha', '$2y$12$WUwMPObJMyKlzzNsppFJl.Y.0EgFVjt061IZGfoN7dXy8.zP02k7e', 3, '2024-08-09 00:48:51', '2024-08-09 00:48:51'),
(21, 'tegar@gmail.com', 'tegar', '$2y$12$4d3Ospy/Oy3csqMUAQj1AelKkKz8bGgFXJieImeCBk/dP7YwLtTrG', 3, '2024-08-09 00:49:23', '2024-08-09 00:49:23'),
(22, 'yanuar@gmail.com', 'yanuar', '$2y$12$MjnhhMKfx4yJtl2IHmsUkepezgopcpIIUUfuufF2i77IFnIuF9Diq', 3, '2024-08-09 00:50:03', '2024-08-09 00:50:03'),
(23, 'edzam@gmail.com', 'edzam', '$2y$12$bgfcXSMLo9hz2q0rVbnwNur8HKOXJzidCrTUXy6NVbeLiq3i0NGbe', 3, '2024-08-09 00:50:35', '2024-08-09 00:50:35'),
(24, 'laksono@gmail.com', 'laksono', '$2y$12$IUyv1PIGrcok0I5EQhUpb.enZuKb0a2X92yTApFioee0JHuz15QRa', 3, '2024-08-09 00:51:18', '2024-08-09 00:51:18'),
(25, 'rizal@gmail.com', 'rizal', '$2y$12$IVVJaGl08Z9GGHZVso9g8uUOklq1OmR/g07cn5v3rb3SaZL1sNwq6', 3, '2024-08-09 00:53:05', '2024-08-09 00:53:05'),
(27, 'robi@gmail.com', 'robi', '$2y$12$67zUgZsAQhuV8VXHXXj9ZeOkDtDrs6326fX5pXZemURQw2XsErsF2', 3, '2024-08-09 00:54:34', '2024-08-09 00:54:34'),
(28, 'tio12345@gmail.com', 'tio12345', '$2y$12$ZNp8cH.urdwfipdds4GusO4qNUd/WfBYAGp2ePWeEGJRTEUBTKzl6', 3, '2024-08-09 00:55:44', '2024-08-09 00:55:44'),
(29, 'Yasin@gmail.com', 'Yasin', '$2y$12$vGpyvaxQl8aMReUi0WsKn./NrfyFvbNQEN7w9nuzef9qu/ud8LELi', 3, '2024-08-09 00:56:21', '2024-08-09 00:56:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosens`
--
ALTER TABLE `dosens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dosens_user_id_foreign` (`user_id`),
  ADD KEY `dosens_kelas_id_foreign` (`kelas_id`),
  ADD KEY `dosens_role_id_foreign` (`role_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mahasiswas_user_id_foreign` (`user_id`),
  ADD KEY `mahasiswas_kelas_id_foreign` (`kelas_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `req_update_data`
--
ALTER TABLE `req_update_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `req_update_data_kelas_id_foreign` (`kelas_id`),
  ADD KEY `req_update_data_mahasiswa_id_foreign` (`mahasiswa_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosens`
--
ALTER TABLE `dosens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `req_update_data`
--
ALTER TABLE `req_update_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dosens`
--
ALTER TABLE `dosens`
  ADD CONSTRAINT `dosens_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `dosens_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `dosens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  ADD CONSTRAINT `mahasiswas_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `mahasiswas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `req_update_data`
--
ALTER TABLE `req_update_data`
  ADD CONSTRAINT `req_update_data_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `req_update_data_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswas` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
