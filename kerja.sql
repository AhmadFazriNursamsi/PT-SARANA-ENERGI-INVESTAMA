-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 03, 2022 at 10:36 PM
-- Server version: 8.0.30-0ubuntu0.22.04.1
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kerja`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `nama`, `email`, `telepon`) VALUES
(1, 'Ahmad', 'ahmad@gmail.com', '0895359470789');

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `id_division` int NOT NULL,
  `division_name` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` int NOT NULL DEFAULT '1',
  `flag_delete` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`id_division`, `division_name`, `created_at`, `updated_at`, `active`, `flag_delete`) VALUES
(1, 'IT', '2022-04-30 10:00:00', '2022-04-30 10:00:00', 1, 0),
(2, 'Design', '2022-04-30 10:00:00', '2022-04-30 10:00:00', 1, 0),
(3, 'Gudang', '2022-04-30 10:00:00', '2022-04-30 10:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item_penawaran`
--

CREATE TABLE `item_penawaran` (
  `item_id` int DEFAULT NULL,
  `nama_item` varchar(255) NOT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `harga` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `item_penawaran`
--

INSERT INTO `item_penawaran` (`item_id`, `nama_item`, `quantity`, `harga`) VALUES
(1, 'Pepsodent', '899', '3000');

-- --------------------------------------------------------

--
-- Table structure for table `list_access`
--

CREATE TABLE `list_access` (
  `id_access` int NOT NULL,
  `name_access` varchar(100) DEFAULT NULL,
  `name_url` varchar(100) DEFAULT NULL,
  `flag_delete` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list_access`
--

INSERT INTO `list_access` (`id_access`, `name_access`, `name_url`, `flag_delete`) VALUES
(1, 'users', 'users', 1),
(2, 'divisi', 'division', 0),
(3, 'role', 'role', 0),
(4, 'product', 'product', 0),
(5, 'listaccess', 'listaccess', 0),
(6, 'coba', 'coba', 0),
(7, 'coba2', 'coba2', 0),
(8, 'customer', 'customer', 0),
(9, 'penawaran', 'penawaran', 0);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `penawaran`
--

CREATE TABLE `penawaran` (
  `user_id` int DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `customer_id` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `no_offer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int NOT NULL,
  `role_name` varchar(100) DEFAULT NULL,
  `flag_delete` int NOT NULL DEFAULT '0',
  `active` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `role_name`, `flag_delete`, `active`, `created_at`, `updated_at`) VALUES
(1, 'admin', 0, 1, '2022-05-26 10:00:00', '2022-05-26 10:00:00'),
(2, 'user', 0, 1, '2022-05-26 10:00:00', '2022-05-26 10:00:00'),
(3, 'guest', 0, 1, '2022-05-26 10:00:00', '2022-05-26 10:00:00'),
(99, 'superadmin', 0, 1, '2022-05-26 10:00:00', '2022-05-26 10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user-id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user-id`, `nama`, `nik`) VALUES
(1, 'Eric', '3216021804089');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_division` int NOT NULL DEFAULT '1',
  `join_date` datetime DEFAULT NULL,
  `mobile` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` int NOT NULL DEFAULT '1',
  `id_role` int NOT NULL DEFAULT '3',
  `flag_delete` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `id_division`, `join_date`, `mobile`, `active`, `id_role`, `flag_delete`) VALUES
(1, 'superuser', 'superuser', 'superuser@admin.com', NULL, '$2y$10$SFwa85IFn61XbJGjjg5P3uTOY4hSWY..aqhJaPoFL2BUeZULECfjS', NULL, '2022-05-26 23:22:29', '2022-05-25 23:22:29', 1, '2022-05-25 00:00:00', '08775884515', 1, 99, 0),
(2, 'Joko', 'admin1', 'admin1@admin.com', NULL, '$2y$10$SFwa85IFn61XbJGjjg5P3uTOY4hSWY..aqhJaPoFL2BUeZULECfjS', NULL, '2022-05-26 23:22:29', '2022-06-01 19:46:35', 2, '2022-05-25 00:00:00', '08775884515', 1, 1, 1),
(3, 'Budi', 'itbudi', 'it1@admin.com', NULL, '$2y$10$r.xdlZp5pOa58e631UFNd./h5LDhO9rZpwbEgqpWfEcPgKDMVGw5m', NULL, '2022-05-26 23:22:29', '2022-06-01 19:47:00', 3, '2022-05-25 00:00:00', '08775884515', 1, 1, 0),
(4, 'IcTc', 'adminx1', 'adminx1@admin11.com', NULL, '$2y$10$SFwa85IFn61XbJGjjg5P3uTOY4hSWY..aqhJaPoFL2BUeZULECfjS', NULL, '2022-06-01 03:21:31', '2022-06-01 03:21:31', 1, NULL, '0809199204012', 1, 1, 0),
(5, 'IctIlmi', 'IctIlmi', 'IctIlmi@gmail.com', NULL, '$2y$10$1RARxqPb23O/c86uX5XPd.lzlZwf2utQ0NicOB3Csnse/QZ6SuUEq', NULL, '2022-06-01 03:27:29', '2022-06-01 03:27:29', 1, NULL, '087887918595', 1, 2, 0),
(6, 'Eric', 'Eric', 'eric@gmail.com', NULL, '$2y$10$S/1jPTjo8zPkrkOMwuyBwOrQgtwZPQ3ACECZi/hw4PN1kTFrHYoSe', NULL, '2022-10-02 21:52:55', '2022-10-03 07:10:28', 3, NULL, '0895359470789', 1, 1, 0),
(7, 'Eric', 'Eric', 'eric@gmail.com', NULL, '$2y$10$ZARvYMqBqQXMXlqAKki1qOHuH6054YqdOU/OgM09rFNCCvHqBnOmm', NULL, '2022-10-02 21:54:04', '2022-10-03 07:05:29', 3, NULL, '0895359470789', 1, 1, 0),
(8, 'Ahmad', 'ahmad', 'ahmad@gmail.com', NULL, '$2y$10$b49YDzlOZrv2SKyXH0CFZ.fUMKxbInNNLAWxcAN3Z98L3P3/rwylW', NULL, '2022-10-03 07:06:21', '2022-10-03 07:06:21', 3, NULL, '089535947078912', 1, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_access`
--

CREATE TABLE `user_access` (
  `id_access` int NOT NULL,
  `id_users` int DEFAULT '0',
  `name_access` varchar(100) DEFAULT NULL,
  `key_access` varchar(10) DEFAULT NULL,
  `val_access` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access`
--

INSERT INTO `user_access` (`id_access`, `id_users`, `name_access`, `key_access`, `val_access`) VALUES
(1, 2, 'users', 'view', '1'),
(2, 2, 'users', 'add', '1'),
(3, 2, 'users', 'edit', '1'),
(4, 2, 'users', 'delete', '1'),
(5, 2, 'users', 'import', '1'),
(6, 2, 'users', 'export', '1'),
(7, 3, 'users', 'view', '1'),
(8, 3, 'users', 'add', '1'),
(9, 3, 'users', 'edit', '0'),
(10, 3, 'users', 'delete', '1'),
(11, 3, 'users', 'import', '1'),
(12, 3, 'users', 'export', '1'),
(13, 2, 'divisi', 'view', '1'),
(14, 2, 'divisi', 'add', '1'),
(15, 2, 'divisi', 'edit', '1'),
(16, 2, 'divisi', 'delete', '1'),
(17, 2, 'divisi', 'import', '1'),
(18, 2, 'divisi', 'export', '1'),
(19, 3, 'divisi', 'view', '1'),
(20, 3, 'divisi', 'add', '1'),
(21, 3, 'divisi', 'edit', '0'),
(22, 3, 'divisi', 'delete', '1'),
(23, 3, 'divisi', 'import', '1'),
(24, 3, 'divisi', 'export', '1'),
(25, 2, 'role', 'add', '1'),
(26, 2, 'role', 'view', '1'),
(27, 3, 'role', 'export', '1'),
(28, 3, 'role', 'import', '0'),
(29, 3, 'role', 'delete', '0'),
(30, 3, 'role', 'edit', '1'),
(31, 3, 'role', 'add', '1'),
(32, 3, 'role', 'view', '1'),
(33, 2, 'role', 'export', '1'),
(34, 2, 'role', 'import', '1'),
(35, 2, 'role', 'delete', '1'),
(36, 2, 'role', 'edit', '1'),
(49, 4, 'divisi', 'view', '1'),
(50, 4, 'divisi', 'add', '1'),
(51, 4, 'divisi', 'edit', '1'),
(52, 4, 'divisi', 'delete', '1'),
(53, 4, 'divisi', 'import', '1'),
(54, 4, 'divisi', 'export', '1'),
(55, 4, 'role', 'view', '1'),
(56, 4, 'role', 'add', '1'),
(57, 4, 'role', 'edit', '1'),
(58, 4, 'role', 'delete', '1'),
(59, 4, 'role', 'import', '1'),
(60, 4, 'role', 'export', '1'),
(61, 4, 'users', 'view', '0'),
(62, 4, 'users', 'add', '0'),
(63, 4, 'users', 'edit', '0'),
(64, 4, 'users', 'delete', '0'),
(65, 4, 'users', 'import', '0'),
(66, 4, 'users', 'export', '0'),
(67, 5, 'divisi', 'view', '1'),
(68, 5, 'divisi', 'add', '1'),
(69, 5, 'divisi', 'edit', '0'),
(70, 5, 'divisi', 'delete', '0'),
(71, 5, 'divisi', 'import', '0'),
(72, 5, 'divisi', 'export', '0'),
(73, 5, 'role', 'view', '1'),
(74, 5, 'role', 'add', '1'),
(75, 5, 'role', 'edit', '0'),
(76, 5, 'role', 'delete', '0'),
(77, 5, 'role', 'import', '0'),
(78, 5, 'role', 'export', '0'),
(79, 5, 'users', 'view', '1'),
(80, 5, 'users', 'add', '1'),
(81, 5, 'users', 'edit', '0'),
(82, 5, 'users', 'delete', '0'),
(83, 5, 'users', 'import', '0'),
(84, 5, 'users', 'export', '0'),
(85, 7, 'divisi', 'view', '0'),
(86, 7, 'divisi', 'add', '0'),
(87, 7, 'divisi', 'edit', '0'),
(88, 7, 'divisi', 'delete', '0'),
(89, 7, 'divisi', 'import', '0'),
(90, 7, 'divisi', 'export', '0'),
(91, 7, 'role', 'view', '1'),
(92, 7, 'role', 'add', '1'),
(93, 7, 'role', 'edit', '1'),
(94, 7, 'role', 'delete', '1'),
(95, 7, 'role', 'import', '1'),
(96, 7, 'role', 'export', '1'),
(97, 7, 'product', 'view', '0'),
(98, 7, 'product', 'add', '0'),
(99, 7, 'product', 'edit', '0'),
(100, 7, 'product', 'delete', '0'),
(101, 7, 'product', 'import', '0'),
(102, 7, 'product', 'export', '0'),
(103, 7, 'listaccess', 'view', '0'),
(104, 7, 'listaccess', 'add', '0'),
(105, 7, 'listaccess', 'edit', '0'),
(106, 7, 'listaccess', 'delete', '0'),
(107, 7, 'listaccess', 'import', '0'),
(108, 7, 'listaccess', 'export', '0'),
(109, 7, 'coba', 'view', '0'),
(110, 7, 'coba', 'add', '0'),
(111, 7, 'coba', 'edit', '0'),
(112, 7, 'coba', 'delete', '0'),
(113, 7, 'coba', 'import', '0'),
(114, 7, 'coba', 'export', '0'),
(115, 7, 'coba2', 'view', '0'),
(116, 7, 'coba2', 'add', '0'),
(117, 7, 'coba2', 'edit', '0'),
(118, 7, 'coba2', 'delete', '0'),
(119, 7, 'coba2', 'import', '0'),
(120, 7, 'coba2', 'export', '0'),
(121, 7, 'customer', 'view', '1'),
(122, 7, 'customer', 'add', '1'),
(123, 7, 'customer', 'edit', '1'),
(124, 7, 'customer', 'delete', '1'),
(125, 7, 'customer', 'import', '1'),
(126, 7, 'customer', 'export', '1'),
(127, 7, 'penawaran', 'view', '1'),
(128, 7, 'penawaran', 'add', '1'),
(129, 7, 'penawaran', 'edit', '1'),
(130, 7, 'penawaran', 'delete', '1'),
(131, 7, 'penawaran', 'import', '1'),
(132, 7, 'penawaran', 'export', '1'),
(133, 8, 'divisi', 'view', '0'),
(134, 8, 'divisi', 'add', '0'),
(135, 8, 'divisi', 'edit', '0'),
(136, 8, 'divisi', 'delete', '0'),
(137, 8, 'divisi', 'import', '0'),
(138, 8, 'divisi', 'export', '0'),
(139, 8, 'role', 'view', '0'),
(140, 8, 'role', 'add', '0'),
(141, 8, 'role', 'edit', '0'),
(142, 8, 'role', 'delete', '0'),
(143, 8, 'role', 'import', '0'),
(144, 8, 'role', 'export', '0'),
(145, 8, 'product', 'view', '0'),
(146, 8, 'product', 'add', '0'),
(147, 8, 'product', 'edit', '0'),
(148, 8, 'product', 'delete', '0'),
(149, 8, 'product', 'import', '0'),
(150, 8, 'product', 'export', '0'),
(151, 8, 'listaccess', 'view', '0'),
(152, 8, 'listaccess', 'add', '0'),
(153, 8, 'listaccess', 'edit', '0'),
(154, 8, 'listaccess', 'delete', '0'),
(155, 8, 'listaccess', 'import', '0'),
(156, 8, 'listaccess', 'export', '0'),
(157, 8, 'coba', 'view', '0'),
(158, 8, 'coba', 'add', '0'),
(159, 8, 'coba', 'edit', '0'),
(160, 8, 'coba', 'delete', '0'),
(161, 8, 'coba', 'import', '0'),
(162, 8, 'coba', 'export', '0'),
(163, 8, 'coba2', 'view', '0'),
(164, 8, 'coba2', 'add', '0'),
(165, 8, 'coba2', 'edit', '0'),
(166, 8, 'coba2', 'delete', '0'),
(167, 8, 'coba2', 'import', '0'),
(168, 8, 'coba2', 'export', '0'),
(169, 8, 'customer', 'view', '0'),
(170, 8, 'customer', 'add', '0'),
(171, 8, 'customer', 'edit', '0'),
(172, 8, 'customer', 'delete', '0'),
(173, 8, 'customer', 'import', '0'),
(174, 8, 'customer', 'export', '0'),
(175, 8, 'penawaran', 'view', '1'),
(176, 8, 'penawaran', 'add', '1'),
(177, 8, 'penawaran', 'edit', '1'),
(178, 8, 'penawaran', 'delete', '1'),
(179, 8, 'penawaran', 'import', '1'),
(180, 8, 'penawaran', 'export', '1'),
(181, 6, 'divisi', 'view', '0'),
(182, 6, 'divisi', 'add', '0'),
(183, 6, 'divisi', 'edit', '0'),
(184, 6, 'divisi', 'delete', '0'),
(185, 6, 'divisi', 'import', '0'),
(186, 6, 'divisi', 'export', '0'),
(187, 6, 'role', 'view', '0'),
(188, 6, 'role', 'add', '0'),
(189, 6, 'role', 'edit', '0'),
(190, 6, 'role', 'delete', '0'),
(191, 6, 'role', 'import', '0'),
(192, 6, 'role', 'export', '0'),
(193, 6, 'product', 'view', '0'),
(194, 6, 'product', 'add', '0'),
(195, 6, 'product', 'edit', '0'),
(196, 6, 'product', 'delete', '0'),
(197, 6, 'product', 'import', '0'),
(198, 6, 'product', 'export', '0'),
(199, 6, 'listaccess', 'view', '0'),
(200, 6, 'listaccess', 'add', '0'),
(201, 6, 'listaccess', 'edit', '0'),
(202, 6, 'listaccess', 'delete', '0'),
(203, 6, 'listaccess', 'import', '0'),
(204, 6, 'listaccess', 'export', '0'),
(205, 6, 'coba', 'view', '0'),
(206, 6, 'coba', 'add', '0'),
(207, 6, 'coba', 'edit', '0'),
(208, 6, 'coba', 'delete', '0'),
(209, 6, 'coba', 'import', '0'),
(210, 6, 'coba', 'export', '0'),
(211, 6, 'coba2', 'view', '0'),
(212, 6, 'coba2', 'add', '0'),
(213, 6, 'coba2', 'edit', '0'),
(214, 6, 'coba2', 'delete', '0'),
(215, 6, 'coba2', 'import', '0'),
(216, 6, 'coba2', 'export', '0'),
(217, 6, 'customer', 'view', '1'),
(218, 6, 'customer', 'add', '1'),
(219, 6, 'customer', 'edit', '1'),
(220, 6, 'customer', 'delete', '1'),
(221, 6, 'customer', 'import', '1'),
(222, 6, 'customer', 'export', '1'),
(223, 6, 'penawaran', 'view', '1'),
(224, 6, 'penawaran', 'add', '1'),
(225, 6, 'penawaran', 'edit', '1'),
(226, 6, 'penawaran', 'delete', '1'),
(227, 6, 'penawaran', 'import', '1'),
(228, 6, 'penawaran', 'export', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `list_access`
--
ALTER TABLE `list_access`
  ADD PRIMARY KEY (`id_access`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user-id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access`
--
ALTER TABLE `user_access`
  ADD PRIMARY KEY (`id_access`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `list_access`
--
ALTER TABLE `list_access`
  MODIFY `id_access` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_access`
--
ALTER TABLE `user_access`
  MODIFY `id_access` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
