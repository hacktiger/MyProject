-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 28, 2018 lúc 10:23 AM
-- Phiên bản máy phục vụ: 10.1.30-MariaDB
-- Phiên bản PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `gamestop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `favorites`
--

CREATE TABLE `favorites` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `game_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `favorites`
--

INSERT INTO `favorites` (`user_id`, `game_title`) VALUES
(1, 'Metal Gear Rising : Revengeance'),
(1, 'BioShock : Infinite'),
(1, 'StarCraft 2 : Legacy of the Void'),
(54, 'BlazeBlue : Central Fiction'),
(53, 'BlazeBlue : Central Fiction'),
(53, 'BioShock 2 Remastered'),
(53, 'StarCraft 2 : Legacy of the Void'),
(53, 'Metal Gear Rising : Revengeance'),
(53, 'BioShock 1 Remastered'),
(53, 'Nier: Automata');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `games`
--

CREATE TABLE `games` (
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avg_rating` double(2,1) NOT NULL DEFAULT '0.0',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `release` smallint(5) UNSIGNED NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL DEFAULT '0',
  `sales` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `games`
--

INSERT INTO `games` (`title`, `slug`, `avg_rating`, `description`, `release`, `link`, `image`, `upload_by`, `price`, `sales`, `created_at`, `updated_at`) VALUES
('Age of Empire', 'age-of-empire', 0.0, '<p>Play as different races in ancient time and defeat your enemy</p>', 1997, 'none.com', 'age-of-empires-hd-edition_1523966846.jpg', 'Ensemble Studios', 0, 0, '2018-04-17 12:07:26', '2018-04-17 12:07:26'),
('BioShock : Infinite', 'bioshock-infinite', 5.0, '<p>BioShock is a first-person shooter video game series developed by Irrational Games&mdash;the first under the name 2K Boston/2K Australia&mdash;and designed by Ken Levine</p>', 2013, 'none.com', '3121022-trailer_bioshockinfinite_letsplay_20160826_1523966962.jpg', 'Irrational Games', 40, 0, '2018-04-17 12:09:22', '2018-04-17 12:09:22'),
('BioShock 1 Remastered', 'bioshock-1-remastered', 5.0, '<p>BioShock is a first-person shooter video game developed by 2K Boston and 2K Australia, and published by 2K Games</p>', 2007, 'none.com', '1_1524236715.png', '2K Game', 10, 0, '2018-04-17 12:25:24', '2018-04-20 15:05:15'),
('BioShock 2 Remastered', 'bioshock-2-remastered', 3.0, '<p><strong>BioShock </strong>2 is a first-person shooter video game developed by 2K Marin and published by 2K Games. It is the sequel to the 2007 video game BioShock and was released worldwide for Microsoft Windows, the ...</p>', 2010, 'none.com', 'BioShock2-Re_1523967976.jpg', '2K Game', 15, 12, '2018-04-17 12:26:17', '2018-04-24 13:23:30'),
('BlazeBlue : Central Fiction', 'blazeblue-central-fiction', 0.0, '<p>BlazBlue: Central Fiction, released in Japan as BlazBlue: Centralfiction is a 2-D fighting video game developed by Arc System Works. It is the fourth game in the BlazBlue series, and is set after the events of BlazBlue: Chrono Phantasma.</p>', 2015, 'none yet', 'discovering-blazblue-central-fiction-thumbnail_1523967685.png', 'Arc System Works', 20, 12, '2018-04-17 11:56:38', '2018-04-17 12:21:25'),
('Metal Gear Rising : Revengeance', 'metal-gear-rising-revengeance', 5.0, '<p><em><strong>Metal Gear Rising: Revengeance</strong></em>&nbsp;is an&nbsp;<a href=\"https://en.wikipedia.org/wiki/Action_game\">action</a>&nbsp;<a href=\"https://en.wikipedia.org/wiki/Hack_and_slash\">hack and slash</a>&nbsp;<a href=\"https://en.wikipedia.org/wiki/Video_game\">video game</a>&nbsp;developed by&nbsp;<a href=\"https://en.wikipedia.org/wiki/PlatinumGames\">PlatinumGames</a>&nbsp;and published by&nbsp;<a href=\"https://en.wikipedia.org/wiki/Konami_Digital_Entertainment\">Konami Digital Entertainment</a>. Released for the&nbsp;<a href=\"https://en.wikipedia.org/wiki/PlayStation_3\">PlayStation 3</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Xbox_360\">Xbox 360</a>&nbsp;and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Microsoft_Windows\">Microsoft Windows</a>, it is a spin-off in the&nbsp;<em><a href=\"https://en.wikipedia.org/wiki/Metal_Gear\">Metal Gear</a></em>series, and is set four years after the events of&nbsp;<em><a href=\"https://en.wikipedia.org/wiki/Metal_Gear_Solid_4:_Guns_of_the_Patriots\">Metal Gear Solid 4: Guns of the Patriots</a></em>. In the game, players control&nbsp;<a href=\"https://en.wikipedia.org/wiki/Raiden_(Metal_Gear)\">Raiden</a>, a cyborg who confronts the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Private_military_company\">private military company</a>&nbsp;Desperado Enforcement, with the gameplay focusing on fighting enemies using a sword and other weapons to perform combos and counterattacks. Through the use of Blade Mode, Raiden can dismember cyborgs in slow motion and steal parts stored in their bodies. The series&#39; usual stealth elements are also optional to reduce combat.</p>', 2013, 'none.com', 'MGS_1523960666.jpg', 'PlatinumGames', 40, 5, '2018-04-17 10:24:26', '2018-04-17 10:24:26'),
('Nier: Automata', 'nier-automata', 5.0, '<p>Nier: Automata is an action role-playing game developed by PlatinumGames and published by Square Enix for PlayStation 4 and Microsoft Windows. The game was released in Japan in February 2017, and worldwide the following month</p>', 2017, 'none.com', 'neir_automata_1523966111.jpg', 'PlatinumGames', 60, 4, '2018-04-17 11:55:12', '2018-04-17 11:55:12'),
('StarCraft 2 : Legacy of the Void', 'starcraft-2-legacy-of-the-void', 0.0, '<p>StarCraft II: Legacy of the Void is a standalone expansion pack to the military science fiction real-time strategy game StarCraft II: Wings of Liberty, and the third and final part of the StarCraft II trilogy developed by <b>Blizzard Entertainment</b>.</p>\r\n\r\nasd', 2015, 'none.com', '1_1524301082.png', 'Blizzard', 35, 10, '2018-04-17 12:28:52', '2018-04-25 18:09:58'),
('The Escapists 2', 'the-escapists-2', 0.0, '<p>Just try and escape.. If you can lol</p>', 2017, 'none.com', 'The-Escapists-2_1523968039.jpg', 'Team17', 5, 0, '2018-04-17 12:27:19', '2018-04-17 12:27:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `games_tags`
--

CREATE TABLE `games_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `games_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `games_tags`
--

INSERT INTO `games_tags` (`id`, `games_title`, `tags_id`) VALUES
(1, 'Metal Gear Rising : Revengeance', 1),
(2, 'Metal Gear Rising : Revengeance', 5),
(3, 'Nier: Automata', 1),
(4, 'Nier: Automata', 5),
(5, 'Age of Empire', 4),
(6, 'BioShock : Infinite', 1),
(7, 'BioShock : Infinite', 2),
(8, 'BioShock : Infinite', 3),
(9, 'BioShock : Infinite', 5),
(12, 'BlazeBlue : Central Fiction', 1),
(14, 'BioShock 1 Remastered', 2),
(15, 'BioShock 1 Remastered', 5),
(16, 'BioShock 2 Remastered', 1),
(17, 'BioShock 2 Remastered', 2),
(18, 'The Escapists 2', 3),
(19, 'The Escapists 2', 4),
(20, 'StarCraft 2 : Legacy of the Void', 1),
(21, 'StarCraft 2 : Legacy of the Void', 4),
(23, 'BioShock 1 Remastered', 1),
(24, 'StarCraft 2 : Legacy of the Void', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_03_26_060538_create_games_table', 1),
(4, '2018_04_04_142926_create_sales_log_table', 1),
(5, '2018_04_07_082712_create_tag_table', 1),
(6, '2018_04_07_084539_create_games_tags_table', 1),
(7, '2018_04_08_095145_create_report_table', 1),
(8, '2018_04_08_113430_create_favorites_table', 1),
(9, '2018_04_08_151042_create_rating_table', 2),
(10, '2018_04_21_085111_add_description_to_users', 3),
(12, '2018_04_28_090517_wallet_history_table', 4),
(13, '2018_04_28_104730_add_price_to_sales_log', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$10$QK3RznVpcM8NodtZIfreOOP/94aI/U8flPDEIS9WUhpR3YU7OSm6O', '2018-04-19 14:21:35'),
('gobanme.pierro@gmail.com', '$2y$10$6MmvWPbpL2Z5YEhDjOBHxOZ7cf4jdg7c5W8/FbN121.D4JV2F8iuG', '2018-04-25 12:27:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rating`
--

CREATE TABLE `rating` (
  `game_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `rating` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rating`
--

INSERT INTO `rating` (`game_title`, `user_id`, `rating`) VALUES
('Nier: Automata', 53, 5),
('Metal Gear Rising : Revengeance', 53, 5),
('BioShock 2 Remastered', 53, 3),
('BioShock : Infinite', 53, 5),
('BioShock 1 Remastered', 53, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `report`
--

CREATE TABLE `report` (
  `id` int(10) UNSIGNED NOT NULL,
  `reporter` int(10) UNSIGNED NOT NULL,
  `Impropriate` tinyint(1) NOT NULL DEFAULT '0',
  `Fraud` tinyint(1) NOT NULL DEFAULT '0',
  `Plagarism` tinyint(1) NOT NULL DEFAULT '0',
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sales_log`
--

CREATE TABLE `sales_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `game_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(6,2) DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sales_log`
--

INSERT INTO `sales_log` (`id`, `game_title`, `price`, `user_id`, `created_at`, `updated_at`) VALUES
(21, 'BlazeBlue : Central Fiction', NULL, 53, '2018-04-21 10:34:28', '2018-04-21 10:34:28'),
(22, 'BioShock 2 Remastered', NULL, 53, '2018-04-21 11:39:33', '2018-04-21 11:39:33'),
(23, 'Age of Empire', NULL, 53, '2018-04-21 12:53:56', '2018-04-21 12:53:56'),
(24, 'The Escapists 2', NULL, 53, '2018-04-23 11:57:28', '2018-04-23 11:57:28'),
(25, 'StarCraft 2 : Legacy of the Void', NULL, 53, '2018-04-23 13:33:35', '2018-04-23 13:33:35'),
(26, 'Metal Gear Rising : Revengeance', NULL, 53, '2018-04-23 13:35:32', '2018-04-23 13:35:32'),
(28, 'BioShock : Infinite', NULL, 53, '2018-04-24 17:18:45', '2018-04-24 17:18:45'),
(29, 'StarCraft 2 : Legacy of the Void', NULL, 1, '2018-04-28 08:10:35', '2018-04-28 08:10:35'),
(30, 'BioShock 2 Remastered', NULL, 1, '2018-04-28 08:13:46', '2018-04-28 08:13:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Action', '2018-04-17 10:19:13', '2018-04-17 10:19:13'),
(2, 'FPS', '2018-04-17 10:20:15', '2018-04-17 10:20:15'),
(3, 'Puzzle', '2018-04-17 10:20:45', '2018-04-17 10:20:45'),
(4, 'Strategy', '2018-04-17 10:20:52', '2018-04-17 10:20:52'),
(5, 'Adventure', '2018-04-17 10:21:03', '2018-04-17 10:21:03'),
(6, 'Fighting', '2018-04-17 12:21:35', '2018-04-17 12:21:35'),
(7, 'Horror', '2018-04-17 12:21:46', '2018-04-17 12:21:46'),
(8, '2 Person', '2018-04-17 12:21:53', '2018-04-17 12:21:53'),
(9, 'aa', '2018-04-27 09:58:14', '2018-04-27 09:58:14'),
(10, 'as', '2018-04-27 10:15:12', '2018-04-27 10:15:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `wallet` double(6,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `auth_level` enum('admin','developer','casual','banned') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'casual',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `avatar`, `wallet`, `auth_level`, `remember_token`, `created_at`, `updated_at`, `description`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$bu1/afJgVxVTcpbCDGpnUuQWKv7dv8N4PrBi5pgno9qIpztTalENm', 'none', 130.00, 'admin', 'k9aRkCRk9YKUXZmxaDGGkmnaDF0A8IXgSlitbEdf5RBAjlmJ8bEqs0FbcYsM', '2018-04-17 10:18:22', '2018-04-26 13:50:54', NULL),
(2, 'user 2', '2@gmail.com', '$2y$10$uEcTmIijBswIhqN27J5mh.qVDazMaawd2SCHFZciINT1hGrsqE3We', 'none', 0.00, 'casual', 'c2GqUrfZUfAmqKu3fPmkMVOpQhRXoRII4O0EqlNHoA0zadL9EgmgK8OzgBRe', '2018-04-20 02:37:20', '2018-04-20 02:37:20', NULL),
(30, 'nHFNGEOBVx', 'jYa7lbm4GS@gmail.com', '$2y$10$jQAHch0LYqOBRGonJ1NbSeDkiKUtSPgB2km7kJrdkTUFXyU3GBynS', 'none', 3.62, 'banned', NULL, NULL, '2018-04-26 13:07:58', NULL),
(50, 'VKLTbsqCfI', 'YIcX7dz0xB@gmail.com', '$2y$10$aRX048GGpsIWYVm29m6MmeWlWlpf.J1Ybi9HL22ZBgefeXH8ddVxy', 'none', 6.10, 'casual', NULL, NULL, NULL, NULL),
(51, 'w06HPHLg0i', 'r8J0XnEE0D@gmail.com', '$2y$10$FaRQ9jH80pJhEMUyzG.2I.VkRierug6Ck.PsoRDQ4X4eoQkjhCjF6', 'none', 8.69, 'casual', NULL, NULL, NULL, NULL),
(52, 'FsWKysqZwA', 'QYwYqPy3LM@gmail.com', '$2y$10$aA.3esDglXu21a3GKAI9De0CDOIxamp6.4qR0Z5l9vrFQ1sy4oiOS', 'none', 2.22, 'casual', NULL, NULL, NULL, NULL),
(53, 'hieu2102', 'gobanme.pierro@gmail.com', '$2y$10$Jv3WqnYRMj6bj6tEkdsJGeUt/zsLxyMDapwli4AD17shjsiN3gYQS', '1_1524592954.png', 9694.00, 'admin', 'djh5mEc84ak01OPPTBTH0wl8QqCwqTstm2q8TUzBpvGxhMLNKwVWrzWqUHes', '2018-04-20 04:57:45', '2018-04-24 18:02:34', '<p><em><strong>lkjclkzjd</strong></em></p>\r\n\r\n<p><em>poajsoajs</em></p>'),
(54, 'zc', 'asd@gmail.com', '$2y$10$zpimGz.nu6KfGkoFTqW0B.ylZWAF8.E8gfpBCJu3Y/yPwq5UxzZsi', 'none', 10.00, 'casual', 'ASnugj5JFakf99CCzhyAqSn0rprPRagT95Upe6pWVfSYXe0CEfmGxt7mgioX', '2018-04-21 09:33:07', '2018-04-21 09:33:07', NULL),
(55, 'asd', 'joei@gmail.com', '$2y$10$kr72.7tNyeVlUCfjCIVKAe1.gEkQLougto7auk9YSuakmmMJ1gK0.', 'none', 0.00, 'banned', 'ZsoRxTMGOfx1S1NzWlM2pn6Cd56fsTeP6AP79p5tX2h7xQF5iM4JYAp2fDc6', '2018-04-25 12:28:23', '2018-04-26 12:23:00', NULL),
(56, 'Blizzard', 'asd2@gmail.com', '$2y$10$weui6QFDWnUYLtvgNmtwlu3txAtcpx1CMvvwWhF2zQsav/jq6/H3W', 'none', 0.00, 'developer', NULL, '2018-04-25 17:17:52', '2018-04-25 18:09:58', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wallet_history`
--

CREATE TABLE `wallet_history` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `amount` double(6,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wallet_history`
--

INSERT INTO `wallet_history` (`id`, `user_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 12.00, NULL, NULL),
(2, 1, 12.00, '2018-04-28 08:21:47', NULL),
(3, 1, 12.00, '2018-04-28 08:22:10', NULL),
(4, 1, 6.00, '2018-04-28 08:22:33', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `favorites`
--
ALTER TABLE `favorites`
  ADD KEY `favorites_game_title_foreign` (`game_title`),
  ADD KEY `favorites_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`title`);

--
-- Chỉ mục cho bảng `games_tags`
--
ALTER TABLE `games_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `games_tags_games_title_foreign` (`games_title`),
  ADD KEY `games_tags_tags_id_foreign` (`tags_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `rating`
--
ALTER TABLE `rating`
  ADD KEY `rating_game_title_foreign` (`game_title`),
  ADD KEY `rating_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`),
  ADD KEY `upload_by` (`reporter`),
  ADD KEY `title` (`title`);

--
-- Chỉ mục cho bảng `sales_log`
--
ALTER TABLE `sales_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_log_game_title_foreign` (`game_title`),
  ADD KEY `sales_log_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `wallet_history`
--
ALTER TABLE `wallet_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wallet_history_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `games_tags`
--
ALTER TABLE `games_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `report`
--
ALTER TABLE `report`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `sales_log`
--
ALTER TABLE `sales_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `wallet_history`
--
ALTER TABLE `wallet_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_game_title_foreign` FOREIGN KEY (`game_title`) REFERENCES `games` (`title`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `games_tags`
--
ALTER TABLE `games_tags`
  ADD CONSTRAINT `games_tags_games_title_foreign` FOREIGN KEY (`games_title`) REFERENCES `games` (`title`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `games_tags_tags_id_foreign` FOREIGN KEY (`tags_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_game_title_foreign` FOREIGN KEY (`game_title`) REFERENCES `games` (`title`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`reporter`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `report_ibfk_2` FOREIGN KEY (`title`) REFERENCES `games` (`title`);

--
-- Các ràng buộc cho bảng `sales_log`
--
ALTER TABLE `sales_log`
  ADD CONSTRAINT `sales_log_game_title_foreign` FOREIGN KEY (`game_title`) REFERENCES `games` (`title`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_log_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `wallet_history`
--
ALTER TABLE `wallet_history`
  ADD CONSTRAINT `wallet_history_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
