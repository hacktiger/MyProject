-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2018 at 09:50 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gamestop`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `game_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `game_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `favorite` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`user_id`, `game_title`, `favorite`) VALUES
(52, 'dg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `release` int(11) NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upload_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL DEFAULT '0',
  `sales` int(11) NOT NULL DEFAULT '0',
  `upvote` int(11) NOT NULL DEFAULT '0',
  `downvote` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`title`, `description`, `release`, `link`, `image`, `upload_by`, `price`, `sales`, `upvote`, `downvote`, `created_at`, `updated_at`) VALUES
('12', '123', 1998, 'n', 'khongCoImage.jpg', '123', 213, 123, 0, 0, '2018-04-11 04:40:42', '2018-04-11 04:40:42'),
('Black Squad', 'a shooting game', 2012, 'none', 'khongCoImage.jpg', 'thai lam', 1, 123, 0, 0, '2018-04-11 04:53:29', '2018-04-11 04:53:29'),
('Black Squad 2', 'a shooting game', 2012, 'none', 'khongCoImage.jpg', 'thai lam', 1, 123, 0, 0, '2018-04-11 04:53:58', '2018-04-11 04:53:58'),
('Black Squad 3', 'a shooting game', 2012, 'none', 'khongCoImage.jpg', 'thai lam', 1, 123, 0, 0, '2018-04-11 04:54:35', '2018-04-11 04:54:35'),
('dg', 'asd', 2010, '123', '1_1523577821.png', 'asd', 1, 1, 0, 0, '2018-04-13 00:03:41', '2018-04-13 00:03:41');

-- --------------------------------------------------------

--
-- Table structure for table `games_tags`
--

CREATE TABLE `games_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `games_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `games_tags`
--

INSERT INTO `games_tags` (`id`, `games_title`, `tags_id`) VALUES
(2, 'Black Squad', 1),
(3, 'Black Squad', 3),
(4, 'Black Squad 2', 1),
(5, 'Black Squad 2', 3),
(6, 'Black Squad 3', 1),
(7, 'Black Squad 3', 3),
(8, 'dg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_03_26_060538_create_games_table', 1),
(4, '2018_04_04_142926_create_sales_log_table', 1),
(5, '2018_04_07_082712_create_tag_table', 1),
(6, '2018_04_07_082748_create_comments_table', 1),
(7, '2018_04_07_084539_create_games_tags_table', 1),
(8, '2018_04_08_095145_create_report_table', 1),
(9, '2018_04_08_113430_create_favorites_table', 1),
(10, '2018_04_08_151042_create_rating_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `owned_games`
--

CREATE TABLE `owned_games` (
  `id` int(10) UNSIGNED NOT NULL,
  `game_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `bought_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `owned_games`
--

INSERT INTO `owned_games` (`id`, `game_title`, `user_id`, `bought_at`) VALUES
(1, 'Black Squad', 52, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(10) UNSIGNED NOT NULL,
  `game_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `rating` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `game_title`, `user_id`, `rating`) VALUES
(4, 'Black Squad 3', 1, 2),
(16, 'Black Squad 3', 52, 5),
(18, 'dg', 52, 4);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(10) UNSIGNED NOT NULL,
  `upload_by` int(10) UNSIGNED NOT NULL,
  `Impropriate` tinyint(1) NOT NULL DEFAULT '0',
  `Fraud` tinyint(1) NOT NULL DEFAULT '0',
  `Plagarism` tinyint(1) NOT NULL DEFAULT '0',
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales_log`
--

CREATE TABLE `sales_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `game_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'FPS', '2018-04-11 04:45:16', '2018-04-11 04:45:16'),
(3, 'Action', '2018-04-11 04:47:33', '2018-04-11 04:47:33'),
(4, 'casual', '2018-04-11 10:33:32', '2018-04-11 10:33:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auth_level` enum('admin','developer','casual') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'casual',
  `rank` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'noob',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `auth_level`, `rank`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'thai lam', 'admin@gmail.com', '$2y$10$6ECvGhB5YwwVLo1xMJ9P1OQ03KXF8V92MJwPKNlN0GhGHpcIFauDm', 'admin', 'noob', NULL, '2018-04-11 04:42:41', '2018-04-11 04:42:41'),
(2, '5kQE7OiX5O', 'UiaStvETZb@gmail.com', '$2y$10$nANSBbolqO35ce7.NIKD2O.2k1t2./3hPUfjg8VqSTw/ZwaOGYPS.', 'casual', 'noob', NULL, NULL, NULL),
(3, 'fqz5VZ3PUz', 'nk7BDOILpa@gmail.com', '$2y$10$j5SaPJw.JqWj1hB.EzHlDeqBQjVpzEj6hl6qVe2qrnI.32nUWXke2', 'casual', 'noob', NULL, NULL, NULL),
(4, 'qRUEUIcbIQ', 'JTgM0LHTJz@gmail.com', '$2y$10$cSfsWDX7/GJgPz3ZfMUYfeoC4j694QLHw/rjQV2SNuePj7HaeTJeu', 'casual', 'noob', NULL, NULL, NULL),
(5, '5OS4IRoU2r', 'FCb5wk6HJW@gmail.com', '$2y$10$A3wmd6hOct3V90z2Z8TCiOOGO.OjFxNn0ijzCpmW.aVbikMSeWQiC', 'casual', 'noob', NULL, NULL, NULL),
(6, 'OpuapZDEVs', 'yX7uNQ7PoY@gmail.com', '$2y$10$tdqX2B6SjNv55jf7g/7QBuS7IySXERYWWAZcyInj99kiz4YdhzyOe', 'casual', 'noob', NULL, NULL, NULL),
(7, 'HKpTGxxz89', '3jUcq8pEzD@gmail.com', '$2y$10$lAaV/zTjlC3FAz9.y..Fte9laD06fuB5nXaWIyRh/o6r4r3ZlsBSm', 'casual', 'noob', NULL, NULL, NULL),
(8, 'lucD23B9D8', '4sDCytf9b5@gmail.com', '$2y$10$eClM560FtQZhprm53c9IYu/bwTjUcaEPnzxdpwPD6BbnR.you5uMm', 'casual', 'noob', NULL, NULL, NULL),
(9, 'VKNeAPzzpr', '8Ny7IFTKGw@gmail.com', '$2y$10$5FOtb0jGyXWP2YopuNOMRuxS4JFCYQl3sVdQikCj4M52iJKIMGEZ2', 'casual', 'noob', NULL, NULL, NULL),
(10, '3q6u15iYcD', 'A6e810U420@gmail.com', '$2y$10$pulV/7ANivQ0FvzLkAcUS.MyQFlUwh.iw3ZHCPhWMGF1pBADF9FPW', 'casual', 'noob', NULL, NULL, NULL),
(11, 'jbFCL9BFYy', '2k3z5NrIgM@gmail.com', '$2y$10$SoZPkb3fq9CAMi6U4AcjoOumsxojEBk5o3j5EiMvuG4P4PQGSPZ6S', 'casual', 'noob', NULL, NULL, NULL),
(12, 'R361hv5Nq8', '3ShdYyv1VR@gmail.com', '$2y$10$rMsVNBnrN49SeVpUNPU3cOtoeP70rAcCi.RspxQBothYVTqSlG4vu', 'casual', 'noob', NULL, NULL, NULL),
(13, 'q8QRnudw6u', '0khZHEtTxx@gmail.com', '$2y$10$.b8y98oLzvlHLwgQ4b1I/.tJbuxvQJOITw3YriQEaVJ1IRspbF3Em', 'casual', 'noob', NULL, NULL, NULL),
(14, 'JvwUI2N380', 'Ie3n8A91PF@gmail.com', '$2y$10$D.DW4Ki7VWs3xvC56GuHKenuYDAY7nvXXXiq1VeAFrPurbmYt/C5G', 'casual', 'noob', NULL, NULL, NULL),
(15, 'ahtm1Rixo8', 'hRD4oqaQxq@gmail.com', '$2y$10$kAtp6zakzmEK/rSEE36cBeT10cXTu.rRfuaLOSU0rebasKhIeonfS', 'casual', 'noob', NULL, NULL, NULL),
(16, 'GgN0GFh4h4', 'uoj06VQfPT@gmail.com', '$2y$10$mdlPd3wjmUKDUxrn9Prc5OQuuCGv3XJ24FE.PWEFb7PpmnE0muTbm', 'casual', 'noob', NULL, NULL, NULL),
(17, '86gpW6qQ8Z', 'LIC9Yiqk67@gmail.com', '$2y$10$8sVE0skkhn5OV0eN9xPf6.RsnxjTILPJj/f7b4VPPUoKscBeVBtgS', 'casual', 'noob', NULL, NULL, NULL),
(18, 'X8NBILber6', 'fu9bqSfbVi@gmail.com', '$2y$10$BOZnxJZiq3JU.V80bFvYhuyX/VrjnRVQmXCE/aqm4TFlWnG2DLO4.', 'casual', 'noob', NULL, NULL, NULL),
(19, 'wGIjALNNUR', 'Mj2SKZLS2S@gmail.com', '$2y$10$CSrtAKkQOtoAOICNQ8Whr.6pRdZns.scQmuc4cebxS.UWlgrXUQJS', 'casual', 'noob', NULL, NULL, NULL),
(20, 'l0Cb4MhoWm', 'ka21LKvEoZ@gmail.com', '$2y$10$VS.LJC69NEzQJ69hyc9uK.zr15eJBVrnGXhsc/3NxsECKlJ7ob8Ue', 'casual', 'noob', NULL, NULL, NULL),
(21, 'AtCYHZajp1', 'aXzoG5viDL@gmail.com', '$2y$10$jle/0HGhAiZoZNgoO4Yff.E2/pC8kbR4MXoCkvYkXhDSS0I27jjcO', 'casual', 'noob', NULL, NULL, NULL),
(22, 'i6FySKqODf', 'lQPXWruJrj@gmail.com', '$2y$10$VZxnIViKksOIYxpvoKQGCupJtM0bbaWArsioB.6btE46X9VT1o88q', 'casual', 'noob', NULL, NULL, NULL),
(23, 'E6nqh062DV', 'Pam3eDn6xu@gmail.com', '$2y$10$x7hrKZmGhlhSM3RpFvvDi.4Xhv0ZUO7ZbblZUccsdIEHwgzfejFOq', 'casual', 'noob', NULL, NULL, NULL),
(24, 'afHdGRkn3v', 'jMwTCPa1NR@gmail.com', '$2y$10$kiAI3MzjvTNjCOZV13iqrO1xlCqZWug8NR681xHfY6AitenzN.Oxm', 'casual', 'noob', NULL, NULL, NULL),
(25, 'N0Cjfr9cdd', 'Ls02kBzuLu@gmail.com', '$2y$10$MapnZXhk7C7pfCEFszv8yu27tVEcB65lPkRdoOj5XywomTDG9aJnS', 'casual', 'noob', NULL, NULL, NULL),
(26, 'bhVEYvx0RS', 'cMaj3oD2lu@gmail.com', '$2y$10$Cqv/9F6nhWOj5BNRA3oH4uzXKvwuRf3wEVKyvY5OtAY.xwJ5SMG3e', 'casual', 'noob', NULL, NULL, NULL),
(27, 'S0uLd3BCPR', 'YkbUh3oi6t@gmail.com', '$2y$10$fRnQxvBPVUDbaZDg0JAEMO1OymXFomkiah6ZYcqFQ8UDtZ196bXaW', 'casual', 'noob', NULL, NULL, NULL),
(28, 'PfnUm8eTIM', 'IvUIKFiO0j@gmail.com', '$2y$10$Kfu4i9WSCtevwnDgM7At8.7Ql5K6uGzF7q9TgNVHxRDf3yNnikTyG', 'casual', 'noob', NULL, NULL, NULL),
(29, 'bfAl4SNh25', '5ddB0BKXXV@gmail.com', '$2y$10$ds6K2qNXYbPo8/kmAJ1uiOFwsjqO/Xqv6m0QifHjcTde3MamgJrOq', 'casual', 'noob', NULL, NULL, NULL),
(30, '9HOFxwMy4x', 'RrWQPo8ivE@gmail.com', '$2y$10$PA3hg476.dsjsghEJ2pIvOQ8fYuO9dM66NSnoDIF4.ZYem2HOVUgC', 'casual', 'noob', NULL, NULL, NULL),
(31, '1BVwMlEPRM', 'RC4K5eM4hl@gmail.com', '$2y$10$eAqCoCZTQZK5A3gv7gpkY.r8ai6BeUu6mYmq8qQrK0ol7vShmT39S', 'casual', 'noob', NULL, NULL, NULL),
(32, 'xExkNrbxrx', 'q9UETbAdDc@gmail.com', '$2y$10$GB.EpcnzDM3/T0kYaI7kGuAugR12MAIugwUbNrPZYECMy3A6P.WGG', 'casual', 'noob', NULL, NULL, NULL),
(33, 'aGhh82lJxe', 'Nrd6bDUPvB@gmail.com', '$2y$10$B5oR3tmIbh9YVfHJU7n/NOTPagjjMROPM5ppVCFP6FPrqQ6pEhp4m', 'casual', 'noob', NULL, NULL, NULL),
(34, 'uFn36ecpQu', 'mVX60JI7na@gmail.com', '$2y$10$JMRez4zKAQygrc37GgSHbO1z66xT9MBDZwKyxEVxyf2JSMltd4POy', 'casual', 'noob', NULL, NULL, NULL),
(35, 'ytbnKDl7Rs', 'TDmxNhwJqr@gmail.com', '$2y$10$JYUdl/RpElmjHt8rD0cyvONrL8A028cpmKX0bQoWEUp/FriKH5.1S', 'casual', 'noob', NULL, NULL, NULL),
(36, 'qhne0fdw5v', '3Yutlzd5jt@gmail.com', '$2y$10$doXFCHaiqNWIfyQh8C0io.zohkqJAbHkctAS1XwhoyLLEjugEEKmK', 'casual', 'noob', NULL, NULL, NULL),
(37, 'kfpnS9eRmu', 'ehlp0MWwB0@gmail.com', '$2y$10$Nh4D70hwKDicgexqpNdUPOpmRLaXCAOXr27XB3z4ip3jRS6LHkBya', 'casual', 'noob', NULL, NULL, NULL),
(38, 'VUHhoDF40o', 'AIBgxbgBUZ@gmail.com', '$2y$10$gfqGnTjHWxv9qQmmeZDCbeD97/s4jm.pBHLauA/LmjJNTWX5VjkZS', 'casual', 'noob', NULL, NULL, NULL),
(39, '8OIwD9BRU9', 'PeBf73EjOb@gmail.com', '$2y$10$oTOj7J7pSMRHd3wA9pW87OOpx7P14miH.KAwd8TCWAlyVRL1VD2ui', 'casual', 'noob', NULL, NULL, NULL),
(40, 'Lh331EaSTW', '6dvV8Y5zKV@gmail.com', '$2y$10$6.XMhKnglFTns3/1LcIPGuWZMtnnK5iMUp9BdTcZWGp3LsyS3FsfK', 'casual', 'noob', NULL, NULL, NULL),
(41, 'tFpUO2NFBf', 'C2aYkRlAXO@gmail.com', '$2y$10$fmv6b5KjCcj0NYtnPq.9FudJxYXJXO/AKR8tPGbWjgipC0y61N13u', 'casual', 'noob', NULL, NULL, NULL),
(42, 'jDXpzS2u8j', 'mBcDGqpuJX@gmail.com', '$2y$10$qsB5gLVMSeUtnP65xKvGP.tOOSg.k5Fq/Hp6sGQiR1.9vqPARDmdi', 'casual', 'noob', NULL, NULL, NULL),
(43, '7P8hvoDld0', 'I8v0LtvT5q@gmail.com', '$2y$10$6/RkNNv6VyUynuHzY3qPLOu742TmdUooBMn77CIkAZdQs51mMiUO2', 'casual', 'noob', NULL, NULL, NULL),
(44, 'evP7fCxv4H', 'mSe2VjEjH5@gmail.com', '$2y$10$jwi.EXAKzydhdq7WdNlafuLTReaHEBoAG4L9EDz7JTyK6w1KldSiS', 'casual', 'noob', NULL, NULL, NULL),
(45, 'mcZ3JujEaD', 'hPYmdCya6k@gmail.com', '$2y$10$raBiXCHM55azS1Uos41r2uKTyxoOxr2/vrmK5o6ZtpJMU/WoehGJy', 'casual', 'noob', NULL, NULL, NULL),
(46, 'uF7l04aUy5', 'LyAarPG7qf@gmail.com', '$2y$10$Rsz7i9ZShpt2PLnB9GppB.O2aogLhRy42zmYlV5F6Y6ZSAAcge0m.', 'casual', 'noob', NULL, NULL, NULL),
(47, 'KHTcuAO7dt', '92tokmKHKC@gmail.com', '$2y$10$CvPDeO.pQBlwg2qKrDkuc.bwBlqvSxvtGSUyEQTgJngpX0h3h/./i', 'casual', 'noob', NULL, NULL, NULL),
(48, 'M1yXm0ex0T', 'ixUVWYnUrB@gmail.com', '$2y$10$mD8TE3/WRY./VCFGPc9yE.zdBybe3aFAbJg4xVYEd8AL30HhYeIwu', 'casual', 'noob', NULL, NULL, NULL),
(49, 'benDVbXbSE', 'Vvbb5DxgNK@gmail.com', '$2y$10$UXTLgXXNg3sNIR6daW9Qi.Jj3/ZZDOwZVq01F5tM8WBr2cLm10u4i', 'casual', 'noob', NULL, NULL, NULL),
(50, 'hO0yXIWoOb', 'keG755FT06@gmail.com', '$2y$10$z5VrNlNbIGexgWy/e0jgPu4IkicttcF9kI0oeuG.SZg6uKXRbKPJG', 'casual', 'noob', NULL, NULL, NULL),
(51, 'jGQKbpWumS', '1e4HsiAVhY@gmail.com', '$2y$10$96IK0bSUi1swUJMjvhDlC.Tm2p/A5jK4NLZUvsTj6nhDDXew3PK2G', 'casual', 'noob', NULL, NULL, NULL),
(52, 'hieu21-2', 'gobanme.pierro@gmail.com', '$2y$10$Ioc8kWTTlxpKsU/oc74gHeL42C2mMNldwFUmC0XiEh/J5tBJpAOUC', 'admin', 'noob', 'Rdv4E6Y7hRJqchRhXP9oQZQ6cWBjN5IOFXT9mB1egYKLJlYz75s6wXIT4EJH', '2018-04-12 09:32:23', '2018-04-12 09:32:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_game_title_foreign` (`game_title`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`title`);

--
-- Indexes for table `games_tags`
--
ALTER TABLE `games_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `games_tags_games_title_foreign` (`games_title`),
  ADD KEY `games_tags_tags_id_foreign` (`tags_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owned_games`
--
ALTER TABLE `owned_games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owned_games_game_title_foreign` (`game_title`),
  ADD KEY `owned_games_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rating_game_title_foreign` (`game_title`),
  ADD KEY `rating_user_id_foreign` (`user_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_log`
--
ALTER TABLE `sales_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_log_game_title_foreign` (`game_title`),
  ADD KEY `sales_log_user_id_foreign` (`user_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `games_tags`
--
ALTER TABLE `games_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `owned_games`
--
ALTER TABLE `owned_games`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_log`
--
ALTER TABLE `sales_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_game_title_foreign` FOREIGN KEY (`game_title`) REFERENCES `games` (`title`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `games_tags`
--
ALTER TABLE `games_tags`
  ADD CONSTRAINT `games_tags_games_title_foreign` FOREIGN KEY (`games_title`) REFERENCES `games` (`title`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `games_tags_tags_id_foreign` FOREIGN KEY (`tags_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `owned_games`
--
ALTER TABLE `owned_games`
  ADD CONSTRAINT `owned_games_game_title_foreign` FOREIGN KEY (`game_title`) REFERENCES `games` (`title`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `owned_games_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_game_title_foreign` FOREIGN KEY (`game_title`) REFERENCES `games` (`title`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales_log`
--
ALTER TABLE `sales_log`
  ADD CONSTRAINT `sales_log_game_title_foreign` FOREIGN KEY (`game_title`) REFERENCES `games` (`title`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_log_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
