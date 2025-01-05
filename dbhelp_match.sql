-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2025 at 07:12 PM
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
-- Database: `dbhelp_match`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `user_id`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(9, 2, 'farabi@gmail.com', '08124125155', 'Kebon Jeruk, Jakarta Barat', '2025-01-02 13:43:42', '2025-01-02 13:43:42'),
(13, 4, 'nowaf@gmail.com', '082132148483', 'Jagakarsa, Jakarta Selatan', '2025-01-02 15:03:19', '2025-01-02 15:03:19'),
(14, 10, 'tes@gmail.com', '232532523', 'sdfsd', '2025-01-03 17:06:40', '2025-01-03 17:06:40'),
(15, 11, 'fikri@gmail.com', '0812412414', 'Tebet, Jakarta Selatan', '2025-01-03 18:07:38', '2025-01-03 18:07:38');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `jobs`
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
-- Table structure for table `job_batches`
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `provider_id` int(11) DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `provider_service_id` int(11) NOT NULL,
  `status` enum('pending','accepted','completed','cancelled') DEFAULT 'pending',
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `user_id`, `provider_id`, `payment_id`, `provider_service_id`, `status`, `order_date`) VALUES
(8, NULL, 4, 4, NULL, 2, 'completed', '2025-01-02 22:54:59'),
(9, NULL, 4, 2, NULL, 1, 'completed', '2025-01-03 13:38:16'),
(10, NULL, 2, 5, NULL, 5, 'completed', '2025-01-03 15:18:06'),
(11, NULL, 4, 1, NULL, 5, 'completed', '2025-01-03 21:35:10'),
(12, NULL, 4, 4, NULL, 3, 'completed', '2025-01-03 21:39:15'),
(13, NULL, 4, 5, NULL, 1, 'completed', '2025-01-03 22:11:19'),
(19, NULL, 4, 4, NULL, 4, 'completed', '2025-01-04 00:54:11'),
(20, NULL, 11, NULL, NULL, 3, 'pending', '2025-01-04 01:08:15');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `payment_type` enum('BCA','DANA','GOPAY','SPAY','COD') NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_date` datetime DEFAULT current_timestamp(),
  `status` enum('pending','paid','failed') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `user_id`, `payment_type`, `amount`, `payment_date`, `status`) VALUES
(8, NULL, 4, 'GOPAY', 122000.00, '2025-01-02 23:29:00', 'paid'),
(9, NULL, 4, 'DANA', 90000.00, '2025-01-03 13:38:00', 'paid'),
(10, NULL, 2, 'BCA', 30000.00, '2025-01-03 15:18:00', 'paid'),
(11, NULL, 4, 'BCA', 333.00, '2025-01-03 21:35:00', 'paid'),
(12, NULL, 4, 'BCA', 555.00, '2025-01-03 21:39:00', 'paid'),
(13, NULL, 4, 'COD', 120000.00, '2025-01-03 22:12:00', 'pending'),
(15, NULL, 4, 'COD', 130000.00, '2025-01-04 00:54:00', 'pending'),
(16, NULL, 11, 'COD', 130000.00, '2025-01-04 01:08:00', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `provider`
--

CREATE TABLE `provider` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `provider`
--

INSERT INTO `provider` (`id`, `user_id`, `email`, `phone`, `address`, `description`, `created_at`, `updated_at`) VALUES
(1, 5, 'andi.wijaya@example.com', '081234567890', 'Jl. Mawar No. 45, Jakarta', 'Specialist in Cleaning Service with 3 years of experience.', '2024-12-31 14:54:30', '2025-01-03 02:38:38'),
(2, 6, 'siti.aisyah@example.com', '081298765432', 'Jl. Melati No. 10, Bandung', 'Plumbing expert offering reliable and affordable services.', '2024-12-31 14:54:30', '2025-01-03 02:40:22'),
(3, 7, 'rudi.hartono@example.com', '081377788899', 'Jl. Kenanga No. 88, Surabaya', 'Professional Electric Repair service provider.', '2024-12-31 14:54:30', '2025-01-03 02:41:31'),
(4, 8, 'dewi.kartika@example.com', '081322233344', 'Jl. Anggrek No. 12, Yogyakarta', 'Experienced in Gardening and Landscaping services.', '2024-12-31 14:54:30', '2025-01-03 02:42:32'),
(5, 9, 'budi.santoso@example.com', '081399988877', 'Jl. Flamboyan No. 7, Medan', 'Efficient and secure Moving Service expert.', '2024-12-31 14:54:30', '2025-01-03 02:43:16');

-- --------------------------------------------------------

--
-- Table structure for table `providers_services`
--

CREATE TABLE `providers_services` (
  `id` int(11) NOT NULL,
  `provider_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `providers_services`
--

INSERT INTO `providers_services` (`id`, `provider_id`, `service_id`, `price`, `description`) VALUES
(1, 1, 1, 75000.00, 'Andi Wijaya provides expert cleaning service.'),
(2, 2, 2, 120000.00, 'Siti Aisyah offers affordable plumbing solutions.'),
(3, 3, 3, 90000.00, 'Rudi Hartono specializes in reliable electrical repair.'),
(4, 4, 4, 150000.00, 'Dewi Kartika is experienced in gardening and landscaping.'),
(5, 5, 5, 250000.00, 'Budi Santoso provides efficient moving and packing services.');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `review_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `order_id`, `user_id`, `rating`, `comment`, `review_date`) VALUES
(12, 19, 4, 4, 'Good Service!', '2025-01-03 17:56:18');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price_range` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `price_range`, `created_at`, `updated_at`) VALUES
(1, 'Cleaning Service', 'Professional house and office cleaning service.', '50.000 - 100.000', '2024-12-31 11:56:04', '2024-12-31 11:56:57'),
(2, 'Plumbing', 'Expert plumbing services for your home and office.', '30.000 - 150.000', '2024-12-31 11:56:04', '2024-12-31 11:57:10'),
(3, 'Electric Repair', 'Fast and reliable electrical repair services.', '40.000 - 120.000', '2024-12-31 11:56:04', '2024-12-31 11:57:54'),
(4, 'Gardening', 'Quality gardening and landscaping services.', '60.000 - 200.000', '2024-12-31 11:56:04', '2024-12-31 11:58:06'),
(5, 'Moving Service', 'Efficient and secure moving and packing services.', '80.000 - 300.000', '2024-12-31 11:56:04', '2024-12-31 11:58:16');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
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
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('b7ZWNwvriLWy3GQqzJPpC0dai5qXbrsIKmzsvtEX', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN3R5Mmp4RkpOQVlNbUl3NHNIVEZGQnQ1RGFzbzdvZU1QVlN5bW96diI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fX0=', 1735927791),
('g8bUeJ2rV3vAuqSWyxL56LuwXCfxtRttxJ46SK3P', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMHVqYU0wajE5QWtMb3QyOWQ0dVlEVXo2SkN6dEFBS0JvTXdpQm9jUyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fX0=', 1735927465);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'customer',
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Falah', 'provider', 'falah@gmail.com', NULL, '$2y$12$wKIpZsCUVFZSyeaD/vubzuEirBzpC9/EQBAERDhC6HilCmKehVMti', NULL, '2025-01-02 01:04:04', '2025-01-02 01:04:04'),
(2, 'farabi', 'customer', 'farabi@gmail.com', NULL, '$2y$12$z0ehhh6H1FlCzzRk3t71IepioIVMFtUvX9eRszJc7qOW7fIUbGTcu', NULL, '2025-01-02 05:53:04', '2025-01-02 05:53:04'),
(4, 'Nowaf', 'customer', 'nowaf@gmail.com', NULL, '$2y$12$KutTwkpGDxyz5BSl10JWfuaW9y0pmmQ8yqFC56TMmOmUVxGZsSFQ.', NULL, '2025-01-02 08:02:14', '2025-01-02 08:02:14'),
(5, 'Andi Wijaya', 'provider', 'andi@gmail.com', NULL, '$2y$12$7oo2rx9/ssA.lCSzhSEAJ.AkN3Bx/EiszM7Yl7HFofmObLgIucplm', NULL, '2025-01-02 19:36:57', '2025-01-02 19:36:57'),
(6, 'Siti Aisyah', 'provider', 'siti@gmail.com', NULL, '$2y$12$zNjdOwRYjLa9c5dowJhn2O.p5Rw5M1cyNJEbRH5msS7wAry0XL2hG', NULL, '2025-01-02 19:39:06', '2025-01-02 19:39:06'),
(7, 'Rudi Hartono', 'customer', 'rudi@gmail.com', NULL, '$2y$12$UGfmV/5NqOB0DMnSQ2a/1.fEux4Bn57yj01bjEh..G9BUNilyvKp2', NULL, '2025-01-02 19:41:07', '2025-01-02 19:41:07'),
(8, 'Dewi Kartika', 'customer', 'dewi@gmail.com', NULL, '$2y$12$kFiu.SCyFtj2APDmwPsx9uEYrTdLa.xcx8CMU8GzlPfjEa/4Yh4s.', NULL, '2025-01-02 19:41:52', '2025-01-02 19:41:52'),
(9, 'Budi Santoso', 'customer', 'budi@gmail.com', NULL, '$2y$12$ljy1Cq1QYNAZ0ope3VfFVeHfb1bvVbVtDdBh/WBMpUtGxTslHCA0a', NULL, '2025-01-02 19:42:53', '2025-01-02 19:42:53'),
(11, 'fikri', 'customer', 'fikri@gmail.com', NULL, '$2y$12$BB49w/iwHrkrmboYOw.K6e7nq39sfcug71REtzJjN0ofbttOeR/ou', NULL, '2025-01-03 11:07:13', '2025-01-03 11:07:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `provider_service_id` (`provider_service_id`),
  ADD KEY `fk_payment_id` (`payment_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `providers_services`
--
ALTER TABLE `providers_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `provider_id` (`provider_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `provider`
--
ALTER TABLE `provider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `providers_services`
--
ALTER TABLE `providers_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_payment_id` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`provider_service_id`) REFERENCES `providers_services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `providers_services`
--
ALTER TABLE `providers_services`
  ADD CONSTRAINT `providers_services_ibfk_1` FOREIGN KEY (`provider_id`) REFERENCES `provider` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `providers_services_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
