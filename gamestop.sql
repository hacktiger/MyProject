-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 20, 2018 lúc 06:22 AM
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
(1, 'StarCraft 2 : Legacy of the Void');

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
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
('BioShock : Infinite', 'bioshock-infinite', 1.0, '<p>BioShock is a first-person shooter video game series developed by Irrational Games&mdash;the first under the name 2K Boston/2K Australia&mdash;and designed by Ken Levine</p>', 2013, 'none.com', '3121022-trailer_bioshockinfinite_letsplay_20160826_1523966962.jpg', 'Irrational Games', 40, 0, '2018-04-17 12:09:22', '2018-04-17 12:09:22'),
('BioShock 1 Remastered', 'bioshock-1-remastered', 0.0, '<p>BioShock is a first-person shooter video game developed by 2K Boston and 2K Australia, and published by 2K Games</p>', 2007, 'none.com', 'BioShock-1-Re_1523967924.jpg', '2K Game', 10, 0, '2018-04-17 12:25:24', '2018-04-17 12:25:24'),
('BioShock 2 Remastered', 'bioshock-2-remastered', 0.0, '<p>BioShock 2 is a first-person shooter video game developed by 2K Marin and published by 2K Games. It is the sequel to the 2007 video game BioShock and was released worldwide for Microsoft Windows, the ...</p>', 2010, 'none.com', 'BioShock2-Re_1523967976.jpg', '2K Game', 15, 0, '2018-04-17 12:26:17', '2018-04-17 12:26:17'),
('BlazeBlue : Central Fiction', 'blazeblue-central-fiction', 1.0, '<p>BlazBlue: Central Fiction, released in Japan as BlazBlue: Centralfiction is a 2-D fighting video game developed by Arc System Works. It is the fourth game in the BlazBlue series, and is set after the events of BlazBlue: Chrono Phantasma.</p>', 2015, 'none yet', 'discovering-blazblue-central-fiction-thumbnail_1523967685.png', 'Arc System Works', 20, 0, '2018-04-17 11:56:38', '2018-04-17 12:21:25'),
('Counter-Strike : Global Offensive', 'counter-strike-global-offensive', 0.0, '<p>The online version of the legendary counter-strike game franchise</p>', 2010, 'none.yet', 'CSGO-Logo_1523967330.jpg', 'Valve', 0, 0, '2018-04-17 12:15:30', '2018-04-17 12:15:30'),
('Metal Gear Rising : Revengeance', 'metal-gear-rising-revengeance', 5.0, '<p><em><strong>Metal Gear Rising: Revengeance</strong></em>&nbsp;is an&nbsp;<a href=\"https://en.wikipedia.org/wiki/Action_game\">action</a>&nbsp;<a href=\"https://en.wikipedia.org/wiki/Hack_and_slash\">hack and slash</a>&nbsp;<a href=\"https://en.wikipedia.org/wiki/Video_game\">video game</a>&nbsp;developed by&nbsp;<a href=\"https://en.wikipedia.org/wiki/PlatinumGames\">PlatinumGames</a>&nbsp;and published by&nbsp;<a href=\"https://en.wikipedia.org/wiki/Konami_Digital_Entertainment\">Konami Digital Entertainment</a>. Released for the&nbsp;<a href=\"https://en.wikipedia.org/wiki/PlayStation_3\">PlayStation 3</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Xbox_360\">Xbox 360</a>&nbsp;and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Microsoft_Windows\">Microsoft Windows</a>, it is a spin-off in the&nbsp;<em><a href=\"https://en.wikipedia.org/wiki/Metal_Gear\">Metal Gear</a></em>series, and is set four years after the events of&nbsp;<em><a href=\"https://en.wikipedia.org/wiki/Metal_Gear_Solid_4:_Guns_of_the_Patriots\">Metal Gear Solid 4: Guns of the Patriots</a></em>. In the game, players control&nbsp;<a href=\"https://en.wikipedia.org/wiki/Raiden_(Metal_Gear)\">Raiden</a>, a cyborg who confronts the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Private_military_company\">private military company</a>&nbsp;Desperado Enforcement, with the gameplay focusing on fighting enemies using a sword and other weapons to perform combos and counterattacks. Through the use of Blade Mode, Raiden can dismember cyborgs in slow motion and steal parts stored in their bodies. The series&#39; usual stealth elements are also optional to reduce combat.</p>', 2013, 'none.com', 'MGS_1523960666.jpg', 'PlatinumGames', 40, 0, '2018-04-17 10:24:26', '2018-04-17 10:24:26'),
('Nier: Automata', 'nier-automata', 0.0, '<p>Nier: Automata is an action role-playing game developed by PlatinumGames and published by Square Enix for PlayStation 4 and Microsoft Windows. The game was released in Japan in February 2017, and worldwide the following month</p>', 2017, 'none.com', 'neir_automata_1523966111.jpg', 'PlatinumGames', 60, 0, '2018-04-17 11:55:12', '2018-04-17 11:55:12'),
('Slither', 'slither', 0.0, '<p>Slither.io is a massively multiplayer browser game developed by Steve Howse. Players control an avatar resembling a worm, which consumes multicolored pellets, both from other players and ones that ...</p>', 2016, 'slither.io', '6-Popular-Game-Apps-That-Teach-Us-Real-Life-Lessons-1_1523967825.jpg', 'Lowtech Studio', 0, 0, '2018-04-17 12:23:45', '2018-04-17 12:23:45'),
('StarCraft 2 : Legacy of the Void', 'starcraft-2-legacy-of-the-void', 4.0, '<p>StarCraft II: Legacy of the Void is a standalone expansion pack to the military science fiction real-time strategy game StarCraft II: Wings of Liberty, and the third and final part of the StarCraft II trilogy developed by Blizzard Entertainment.</p>', 2015, 'none.com', 'starcraft-ii-legacy-of-the-void-18_1523968132.jpg', 'Blizzard Entertainment', 35, 0, '2018-04-17 12:28:52', '2018-04-17 12:28:52'),
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
(10, 'Counter-Strike : Global Offensive', 1),
(11, 'Counter-Strike : Global Offensive', 2),
(12, 'BlazeBlue : Central Fiction', 1),
(13, 'Slither', 3),
(14, 'BioShock 1 Remastered', 2),
(15, 'BioShock 1 Remastered', 5),
(16, 'BioShock 2 Remastered', 1),
(17, 'BioShock 2 Remastered', 2),
(18, 'The Escapists 2', 3),
(19, 'The Escapists 2', 4),
(20, 'StarCraft 2 : Legacy of the Void', 1),
(21, 'StarCraft 2 : Legacy of the Void', 4);

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
(9, '2018_04_08_151042_create_rating_table', 2);

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
('admin@gmail.com', '$2y$10$QK3RznVpcM8NodtZIfreOOP/94aI/U8flPDEIS9WUhpR3YU7OSm6O', '2018-04-19 14:21:35');

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
('Metal Gear Rising : Revengeance', 1, 5),
('BioShock : Infinite', 1, 1),
('StarCraft 2 : Legacy of the Void', 1, 3),
('BlazeBlue : Central Fiction', 1, 1),
('StarCraft 2 : Legacy of the Void', 2, 5),
('StarCraft 2 : Legacy of the Void', 1, 4),
('StarCraft 2 : Legacy of the Void', 2, 5),
('StarCraft 2 : Legacy of the Void', 3, 5),
('StarCraft 2 : Legacy of the Void', 4, 4),
('StarCraft 2 : Legacy of the Void', 5, 2),
('StarCraft 2 : Legacy of the Void', 6, 1),
('StarCraft 2 : Legacy of the Void', 7, 2),
('StarCraft 2 : Legacy of the Void', 8, 4),
('StarCraft 2 : Legacy of the Void', 9, 4),
('StarCraft 2 : Legacy of the Void', 10, 1),
('StarCraft 2 : Legacy of the Void', 11, 4),
('StarCraft 2 : Legacy of the Void', 12, 2),
('StarCraft 2 : Legacy of the Void', 13, 3),
('StarCraft 2 : Legacy of the Void', 14, 3),
('StarCraft 2 : Legacy of the Void', 15, 1),
('StarCraft 2 : Legacy of the Void', 16, 4),
('StarCraft 2 : Legacy of the Void', 17, 2),
('StarCraft 2 : Legacy of the Void', 18, 2),
('StarCraft 2 : Legacy of the Void', 19, 3),
('StarCraft 2 : Legacy of the Void', 20, 2),
('StarCraft 2 : Legacy of the Void', 21, 2),
('StarCraft 2 : Legacy of the Void', 22, 1),
('StarCraft 2 : Legacy of the Void', 23, 0),
('StarCraft 2 : Legacy of the Void', 24, 4),
('StarCraft 2 : Legacy of the Void', 25, 3),
('StarCraft 2 : Legacy of the Void', 26, 2),
('StarCraft 2 : Legacy of the Void', 27, 4),
('StarCraft 2 : Legacy of the Void', 28, 2),
('StarCraft 2 : Legacy of the Void', 29, 3),
('StarCraft 2 : Legacy of the Void', 30, 3),
('StarCraft 2 : Legacy of the Void', 31, 2),
('StarCraft 2 : Legacy of the Void', 32, 0),
('StarCraft 2 : Legacy of the Void', 33, 4),
('StarCraft 2 : Legacy of the Void', 34, 4),
('StarCraft 2 : Legacy of the Void', 35, 0),
('StarCraft 2 : Legacy of the Void', 36, 2),
('StarCraft 2 : Legacy of the Void', 37, 2),
('StarCraft 2 : Legacy of the Void', 38, 1),
('StarCraft 2 : Legacy of the Void', 39, 0),
('StarCraft 2 : Legacy of the Void', 40, 1),
('StarCraft 2 : Legacy of the Void', 41, 0),
('StarCraft 2 : Legacy of the Void', 42, 3),
('StarCraft 2 : Legacy of the Void', 43, 3),
('StarCraft 2 : Legacy of the Void', 44, 0),
('StarCraft 2 : Legacy of the Void', 45, 1),
('StarCraft 2 : Legacy of the Void', 46, 3),
('StarCraft 2 : Legacy of the Void', 47, 0),
('StarCraft 2 : Legacy of the Void', 48, 1),
('StarCraft 2 : Legacy of the Void', 49, 4),
('StarCraft 2 : Legacy of the Void', 50, 1),
('Nier: Automata', 1, 3),
('Age of Empire', 1, 0),
('BioShock : Infinite', 1, 0),
('BlazeBlue : Central Fiction', 1, 4),
('Nier: Automata', 2, 4),
('Age of Empire', 2, 5),
('BioShock : Infinite', 2, 2),
('BlazeBlue : Central Fiction', 2, 5),
('Nier: Automata', 3, 4),
('Age of Empire', 3, 4),
('BioShock : Infinite', 3, 0),
('BlazeBlue : Central Fiction', 3, 1),
('Nier: Automata', 4, 1),
('Age of Empire', 4, 3),
('BioShock : Infinite', 4, 3),
('BlazeBlue : Central Fiction', 4, 5),
('Nier: Automata', 5, 2),
('Age of Empire', 5, 0),
('BioShock : Infinite', 5, 1),
('BlazeBlue : Central Fiction', 5, 5),
('Nier: Automata', 6, 3),
('Age of Empire', 6, 1),
('BioShock : Infinite', 6, 1),
('BlazeBlue : Central Fiction', 6, 4),
('Nier: Automata', 7, 1),
('Age of Empire', 7, 0),
('BioShock : Infinite', 7, 4),
('BlazeBlue : Central Fiction', 7, 3),
('Nier: Automata', 8, 4),
('Age of Empire', 8, 1),
('BioShock : Infinite', 8, 4),
('BlazeBlue : Central Fiction', 8, 0),
('Nier: Automata', 9, 2),
('Age of Empire', 9, 5),
('BioShock : Infinite', 9, 2),
('BlazeBlue : Central Fiction', 9, 0),
('Nier: Automata', 10, 0),
('Age of Empire', 10, 0),
('BioShock : Infinite', 10, 4),
('BlazeBlue : Central Fiction', 10, 3),
('Nier: Automata', 11, 0),
('Age of Empire', 11, 5),
('BioShock : Infinite', 11, 0),
('BlazeBlue : Central Fiction', 11, 5),
('Nier: Automata', 12, 5),
('Age of Empire', 12, 0),
('BioShock : Infinite', 12, 5),
('BlazeBlue : Central Fiction', 12, 0),
('Nier: Automata', 13, 2),
('Age of Empire', 13, 0),
('BioShock : Infinite', 13, 1),
('BlazeBlue : Central Fiction', 13, 5),
('Nier: Automata', 14, 4),
('Age of Empire', 14, 5),
('BioShock : Infinite', 14, 1),
('BlazeBlue : Central Fiction', 14, 0),
('Nier: Automata', 15, 2),
('Age of Empire', 15, 2),
('BioShock : Infinite', 15, 4),
('BlazeBlue : Central Fiction', 15, 3),
('Nier: Automata', 16, 2),
('Age of Empire', 16, 3),
('BioShock : Infinite', 16, 3),
('BlazeBlue : Central Fiction', 16, 3),
('Nier: Automata', 17, 4),
('Age of Empire', 17, 5),
('BioShock : Infinite', 17, 5),
('BlazeBlue : Central Fiction', 17, 1),
('Nier: Automata', 18, 5),
('Age of Empire', 18, 0),
('BioShock : Infinite', 18, 0),
('BlazeBlue : Central Fiction', 18, 1),
('Nier: Automata', 19, 1),
('Age of Empire', 19, 5),
('BioShock : Infinite', 19, 3),
('BlazeBlue : Central Fiction', 19, 3),
('Nier: Automata', 20, 2),
('Age of Empire', 20, 1),
('BioShock : Infinite', 20, 0),
('BlazeBlue : Central Fiction', 20, 3),
('Nier: Automata', 21, 3),
('Age of Empire', 21, 3),
('BioShock : Infinite', 21, 0),
('BlazeBlue : Central Fiction', 21, 2),
('Nier: Automata', 22, 0),
('Age of Empire', 22, 2),
('BioShock : Infinite', 22, 5),
('BlazeBlue : Central Fiction', 22, 5),
('Nier: Automata', 23, 1),
('Age of Empire', 23, 1),
('BioShock : Infinite', 23, 0),
('BlazeBlue : Central Fiction', 23, 0),
('Nier: Automata', 24, 3),
('Age of Empire', 24, 1),
('BioShock : Infinite', 24, 3),
('BlazeBlue : Central Fiction', 24, 0),
('Nier: Automata', 25, 3),
('Age of Empire', 25, 5),
('BioShock : Infinite', 25, 5),
('BlazeBlue : Central Fiction', 25, 4),
('Nier: Automata', 26, 1),
('Age of Empire', 26, 3),
('BioShock : Infinite', 26, 5),
('BlazeBlue : Central Fiction', 26, 1),
('Nier: Automata', 27, 5),
('Age of Empire', 27, 1),
('BioShock : Infinite', 27, 5),
('BlazeBlue : Central Fiction', 27, 3),
('Nier: Automata', 28, 1),
('Age of Empire', 28, 0),
('BioShock : Infinite', 28, 1),
('BlazeBlue : Central Fiction', 28, 2),
('Nier: Automata', 29, 3),
('Age of Empire', 29, 2),
('BioShock : Infinite', 29, 0),
('BlazeBlue : Central Fiction', 29, 3),
('Nier: Automata', 30, 4),
('Age of Empire', 30, 5),
('BioShock : Infinite', 30, 0),
('BlazeBlue : Central Fiction', 30, 4),
('Nier: Automata', 31, 3),
('Age of Empire', 31, 0),
('BioShock : Infinite', 31, 4),
('BlazeBlue : Central Fiction', 31, 0),
('Nier: Automata', 32, 2),
('Age of Empire', 32, 4),
('BioShock : Infinite', 32, 0),
('BlazeBlue : Central Fiction', 32, 4),
('Nier: Automata', 33, 3),
('Age of Empire', 33, 4),
('BioShock : Infinite', 33, 1),
('BlazeBlue : Central Fiction', 33, 3),
('Nier: Automata', 34, 3),
('Age of Empire', 34, 0),
('BioShock : Infinite', 34, 2),
('BlazeBlue : Central Fiction', 34, 4),
('Nier: Automata', 35, 1),
('Age of Empire', 35, 1),
('BioShock : Infinite', 35, 2),
('BlazeBlue : Central Fiction', 35, 0),
('Nier: Automata', 36, 3),
('Age of Empire', 36, 0),
('BioShock : Infinite', 36, 1),
('BlazeBlue : Central Fiction', 36, 3),
('Nier: Automata', 37, 5),
('Age of Empire', 37, 4),
('BioShock : Infinite', 37, 1),
('BlazeBlue : Central Fiction', 37, 3),
('Nier: Automata', 38, 5),
('Age of Empire', 38, 5),
('BioShock : Infinite', 38, 0),
('BlazeBlue : Central Fiction', 38, 4),
('Nier: Automata', 39, 4),
('Age of Empire', 39, 4),
('BioShock : Infinite', 39, 4),
('BlazeBlue : Central Fiction', 39, 5),
('Nier: Automata', 40, 3),
('Age of Empire', 40, 3),
('BioShock : Infinite', 40, 4),
('BlazeBlue : Central Fiction', 40, 3),
('Nier: Automata', 41, 5),
('Age of Empire', 41, 2),
('BioShock : Infinite', 41, 3),
('BlazeBlue : Central Fiction', 41, 5),
('Nier: Automata', 42, 0),
('Age of Empire', 42, 0),
('BioShock : Infinite', 42, 5),
('BlazeBlue : Central Fiction', 42, 1),
('Nier: Automata', 43, 0),
('Age of Empire', 43, 0),
('BioShock : Infinite', 43, 4),
('BlazeBlue : Central Fiction', 43, 1),
('Nier: Automata', 44, 3),
('Age of Empire', 44, 3),
('BioShock : Infinite', 44, 0),
('BlazeBlue : Central Fiction', 44, 0),
('Nier: Automata', 45, 0),
('Age of Empire', 45, 1),
('BioShock : Infinite', 45, 0),
('BlazeBlue : Central Fiction', 45, 5),
('Nier: Automata', 46, 5),
('Age of Empire', 46, 2),
('BioShock : Infinite', 46, 5),
('BlazeBlue : Central Fiction', 46, 2),
('Nier: Automata', 47, 4),
('Age of Empire', 47, 3),
('BioShock : Infinite', 47, 5),
('BlazeBlue : Central Fiction', 47, 5),
('Nier: Automata', 48, 4),
('Age of Empire', 48, 4),
('BioShock : Infinite', 48, 3),
('BlazeBlue : Central Fiction', 48, 2),
('Nier: Automata', 49, 3),
('Age of Empire', 49, 2),
('BioShock : Infinite', 49, 2),
('BlazeBlue : Central Fiction', 49, 1),
('Nier: Automata', 50, 5),
('Age of Empire', 50, 3),
('BioShock : Infinite', 50, 4),
('BlazeBlue : Central Fiction', 50, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `report`
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
-- Cấu trúc bảng cho bảng `sales_log`
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
-- Cấu trúc bảng cho bảng `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(8, '2 Person', '2018-04-17 12:21:53', '2018-04-17 12:21:53');

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
  `auth_level` enum('admin','developer','casual') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'casual',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `avatar`, `wallet`, `auth_level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$bu1/afJgVxVTcpbCDGpnUuQWKv7dv8N4PrBi5pgno9qIpztTalENm', 'none', 0.00, 'admin', 't3KB3qPCQMH9xbLVaF2xBDxCUxDYJb8S7pFC5PDaiGgXz7o5nDbmDDaBjmkA', '2018-04-17 10:18:22', '2018-04-17 10:18:22'),
(2, 'user 2', '2@gmail.com', '$2y$10$uEcTmIijBswIhqN27J5mh.qVDazMaawd2SCHFZciINT1hGrsqE3We', 'none', 0.00, 'casual', 'c2GqUrfZUfAmqKu3fPmkMVOpQhRXoRII4O0EqlNHoA0zadL9EgmgK8OzgBRe', '2018-04-20 02:37:20', '2018-04-20 02:37:20'),
(3, 'w4sqn19bbr', 'SthZkYdzhU@gmail.com', '$2y$10$gkaNdJYKjrA2WrpiaLFkmuZsMGoxPZTfM6LZehJp6Ef6CFqTrT1em', 'none', 1.65, 'casual', NULL, NULL, NULL),
(4, 'uPauNaIWEC', 's8gWtWSM2y@gmail.com', '$2y$10$pDmYFwEw1ENCHtSyp/SeLeeeIZNv/RsBoo8py/EiSORPFYT2C6kLq', 'none', 5.02, 'casual', NULL, NULL, NULL),
(5, 'wTOYTyJbbJ', 'XiRjXWnSPS@gmail.com', '$2y$10$zN2KL0OUJMF6t7hYa1KMJ.KoDuOSBFJ0tz.z5YKBXDo9bvoNps7vu', 'none', 3.95, 'casual', NULL, NULL, NULL),
(6, '18KihrnNHz', 'HMfb9dYGlD@gmail.com', '$2y$10$ON7Uz/jpbCGT0InNsCAX3.pbyUau91uBPoFquYFHvhGOZwAQAmb3q', 'none', 5.32, 'casual', NULL, NULL, NULL),
(7, 'K2fBWvqi1l', '2wNLWPfg9C@gmail.com', '$2y$10$kar2qpH12hZleZ.qqG0EE.6VyCM4/qohnjqRtFfyD48FwAsFD6LKi', 'none', 7.62, 'casual', NULL, NULL, NULL),
(8, 'umLGp37afG', 'IoJv9r6A43@gmail.com', '$2y$10$6AxRaKsRg8xd7iAHwpfNru46.1jiI32V.zkakEftavemUbrCujexG', 'none', 3.88, 'casual', NULL, NULL, NULL),
(9, 'vuwIYHrMQ2', 'BhXizWS4nh@gmail.com', '$2y$10$HQPUfE.3K3A8jDhxC.JJuegnhUMYVwfxCO661NMfXB5AZR7K5Bn42', 'none', 0.92, 'casual', NULL, NULL, NULL),
(10, 'eZunqfNUd2', 'MMM0EG3cAw@gmail.com', '$2y$10$cyqt3UqgQZimd5OnJSjLeOtXmsVlxG1NxoZMVmk0sruzFSf/FNBjW', 'none', 9.42, 'casual', NULL, NULL, NULL),
(11, 'f4UMmJYRia', 'XfyZvqhzYO@gmail.com', '$2y$10$pnVkVmVNuluWCpPOd2rGBOPtnykBizEcpr/ZcfYmJZNflGUAOI276', 'none', 4.26, 'casual', NULL, NULL, NULL),
(12, '7XagsyffyE', 'smZJdvNlkl@gmail.com', '$2y$10$yFla1QMaTk9iq2vFkUvAFerysj4kxPEZbx2TUFcCQrzALKUSxuWoy', 'none', 8.66, 'casual', NULL, NULL, NULL),
(13, 'XWxuZC5hA1', 'OwBRxbgVUp@gmail.com', '$2y$10$xaDRHg2x0SDePI7emS5aneJ3dF286zDsU1wNFMsNrtsiNDhazlbdm', 'none', 5.84, 'casual', NULL, NULL, NULL),
(14, 'Cpnfz7MMu8', '5hbDVJsNpA@gmail.com', '$2y$10$b2uQeqiV5BXJEtdlozOcEOkoUqLsNTuG4Aof2k6c/6v//I0xdxAlG', 'none', 2.57, 'casual', NULL, NULL, NULL),
(15, 'dQIivoNgxe', '8Y20UpW6iU@gmail.com', '$2y$10$wwl/dx/x5R51GjfRToJhJusfaqzMNVKnNmvy/TbQnz5HdYmDeCu6W', 'none', 4.77, 'casual', NULL, NULL, NULL),
(16, 'RooqcwDUqT', 'jU15kfPeU4@gmail.com', '$2y$10$iJNIjJE1XQ7eh8Sdg8Askue.BgPZ/b5LUL.0wohRVHXVsFhN9MKx.', 'none', 5.52, 'casual', NULL, NULL, NULL),
(17, '3sRicmfgmN', 'Xf7Xsm98oX@gmail.com', '$2y$10$aDfh6Fjufv/fzC86ofPSeudWKm0ntziaTjtSVp/ddWqqKN6HJlyzC', 'none', 2.46, 'casual', NULL, NULL, NULL),
(18, 'sxNnC9HKva', 'gMK9FrJnQg@gmail.com', '$2y$10$RPH8p4qIgKeTN4MEhBEkhOKwKv2pF1Y4dF0pMQyxxaLZHM0SDCjVe', 'none', 8.78, 'casual', NULL, NULL, NULL),
(19, 'OfCy5IpxbR', 'Wx1tGOkP3u@gmail.com', '$2y$10$Msw2LET3YLwvoIBieKRa7eyQ9/owucCePMQ82GrCXFhYurtLYuq/y', 'none', 3.55, 'casual', NULL, NULL, NULL),
(20, 'p4Mg2yD3WR', 'RjGHpCeMIx@gmail.com', '$2y$10$4VbJImgb7iczGAUaVB5YuePqhTkaK4ejyYR..Ui/0ivezS8hfMTSC', 'none', 4.68, 'casual', NULL, NULL, NULL),
(21, 'NRczyfyR4x', 'ZSZ9eGeXzI@gmail.com', '$2y$10$iIJMII3YeBERyt6oiEx/3Omd7C51.1dxhzHGe//Z/l4UgrCPb4tR6', 'none', 1.10, 'casual', NULL, NULL, NULL),
(22, '2kipjUgqdF', '7wlQQILY5z@gmail.com', '$2y$10$wU7BVkzrON8ouOqntj3F4.hlRvq98P9RCgIigl4QI2zdfS7dEMz62', 'none', 6.43, 'casual', NULL, NULL, NULL),
(23, '3n28kQe0qq', 'nxQ9N1oLrM@gmail.com', '$2y$10$Hfa6t13dVzSrZaKi7E1oAexe3Kc.ttstQAwYLmwy97cZV5pA3g1qW', 'none', 8.48, 'casual', NULL, NULL, NULL),
(24, 'xK7rGxmRwY', 'u7GpLsMr2l@gmail.com', '$2y$10$.hZO.vcgnCtoLB1LU6RbZexzYaeyy6DvfYfsvEU.QRZsHVi4iBmEy', 'none', 2.81, 'casual', NULL, NULL, NULL),
(25, 'ZCnR23yquf', '8LIaFhDK5h@gmail.com', '$2y$10$w46nNBD3bqD3U0XkdVoRvOShl5ri.zjQTfSY4QETy5X.hJmudJvPC', 'none', 9.43, 'casual', NULL, NULL, NULL),
(26, 'X1tfhrWlz0', 'o6eGS2NJpy@gmail.com', '$2y$10$09fHNhXEalaWhN4CB73U8e6f34v7D25jJffIXhk2.iQrYysW72DHi', 'none', 8.72, 'casual', NULL, NULL, NULL),
(27, 'P1UI7m5fhL', 'EOyBqkQwMj@gmail.com', '$2y$10$4Vb8P.a5hEIonLw2krrJo.L68sUX2dzj/.mZId9Nhj5GvsiKgyT42', 'none', 0.65, 'casual', NULL, NULL, NULL),
(28, 'odTeNsrOVa', 'wACEatc657@gmail.com', '$2y$10$l4RaGF9j6WayblS/pI6IR.19WlLkO0csJAiYfdS9WA406FVBsFvS6', 'none', 1.72, 'casual', NULL, NULL, NULL),
(29, 'ZvuCq0F60W', 'Fittcz23kq@gmail.com', '$2y$10$mpd.z9/GV6ua.ab0FPs/9ehruR54YiDonjZz5beu8NPjTPIJ84Kwu', 'none', 9.40, 'casual', NULL, NULL, NULL),
(30, 'nHFNGEOBVx', 'jYa7lbm4GS@gmail.com', '$2y$10$jQAHch0LYqOBRGonJ1NbSeDkiKUtSPgB2km7kJrdkTUFXyU3GBynS', 'none', 3.62, 'casual', NULL, NULL, NULL),
(31, 'T8lDNjSbjP', 'rPamLMMTTi@gmail.com', '$2y$10$iSga0teoZqVLhgARufRMvuDma98YN.mO1JVijl1Fr5kPdJEJpuXLW', 'none', 7.05, 'casual', NULL, NULL, NULL),
(32, 'xB8yGYRoCP', 'a7xyuZpD7w@gmail.com', '$2y$10$.u.fgDO4KddL9kYT3OGNROYw2byiWo.4GtoXzMxHdlXopacxv4742', 'none', 6.79, 'casual', NULL, NULL, NULL),
(33, 'Ocu6XYBtNL', 'YBIEV3BaRn@gmail.com', '$2y$10$SRQ8Xb3F6kPNCQy.UxvwTOOhlGFDkcgn.S.huKz79qWjBBTZuUJE2', 'none', 2.08, 'casual', NULL, NULL, NULL),
(34, 'SnmX0LNk0G', 'CqM8fhzuX7@gmail.com', '$2y$10$PtUMkFWtrTNr1wyZsFcrLuRKfWCTtkr/myr8RrKyABK8DD.y2bm0a', 'none', 1.12, 'casual', NULL, NULL, NULL),
(35, 'YS1KPTwuly', 'UdRAM5ifhK@gmail.com', '$2y$10$1xudBr6Zzrt6eCbQs6/fM.acuGMLMtQaxL3ZQq58GUOt/IcV44nrq', 'none', 1.51, 'casual', NULL, NULL, NULL),
(36, 'TYc1M94IfX', 'dTZusvBheF@gmail.com', '$2y$10$x0fHudV6aZ7Nk.TkdBZ/RuQNru4tv8j419kZlvTckmm7mmec4KjhS', 'none', 3.38, 'casual', NULL, NULL, NULL),
(37, 'HMAn2AvaOm', 'Q44JVnC1lV@gmail.com', '$2y$10$nBhx.EYBlipRWGrx5G/8NeRLAxMihhXuN.FTMEYHMnRg87G6oCF.6', 'none', 0.41, 'casual', NULL, NULL, NULL),
(38, '47A2pVzy3q', 'cTmhJd40IN@gmail.com', '$2y$10$mrH3LX6.25EA/M99FubycekZ0rh2t2fuk.HXlfrnGB0t8v8sW3SUe', 'none', 6.98, 'casual', NULL, NULL, NULL),
(39, '093xwS0q6c', 'gk2BDn7toL@gmail.com', '$2y$10$IUCdQ7/PEVtvcf/DdbJDiuXt7kaPt4XuRrQADnZvBVZluggJ3AUV6', 'none', 7.71, 'casual', NULL, NULL, NULL),
(40, 'kzrRad3Nrn', '20TJDhAHXN@gmail.com', '$2y$10$298OplXFgDYsZtnj0wijpOZv4RRwfuR1fiwM9Ha0foe6DVdEhjwO6', 'none', 0.01, 'casual', NULL, NULL, NULL),
(41, 'pSbXspl6np', 'bby8ouYtNP@gmail.com', '$2y$10$Hul1msmS7FWc96lWCjBe5.3.dt4ugZj0ONkxk.bT3mx8w97I1bRd2', 'none', 5.63, 'casual', NULL, NULL, NULL),
(42, '6UIaNIN3Sf', 'XrHXhQ6pE2@gmail.com', '$2y$10$RpNtTyBdfkP4ubuBcYuLrOgdwaKiTVd6.tDqCe.lZMI9xfOOBPNyy', 'none', 4.10, 'casual', NULL, NULL, NULL),
(43, 'HXytv0HUrR', '0crV1EXCjN@gmail.com', '$2y$10$PLoapMVzhDPV928cyRLu9uYcYkpWq0WT/mugdSHj5uFCTICsbYuwu', 'none', 8.43, 'casual', NULL, NULL, NULL),
(44, 'KI5h6adjiQ', 'EmwV8cJs8X@gmail.com', '$2y$10$9lZeJPbGAFym6JM5/hNeLOE3fm9ONomzMhDFQeEQKn2hwYtY.sfeq', 'none', 8.59, 'casual', NULL, NULL, NULL),
(45, 'rlV8NercK7', 'QD8xiyCTG4@gmail.com', '$2y$10$wQhUztiA5E0Ki/FBe6VS2O6clBKZI3Xxo0rkSpJiHm4RNPFCV4AxK', 'none', 6.28, 'casual', NULL, NULL, NULL),
(46, 'eA7CKhcnoA', 'ylQ2klctK6@gmail.com', '$2y$10$vwqs7Sjmxr/E9MuSbW1czu5Oba9AQMMG2uOxIFBFGbNe1WIe3U.EG', 'none', 5.34, 'casual', NULL, NULL, NULL),
(47, 'LFJ7X0hm7Q', 'vxaQM1LDkg@gmail.com', '$2y$10$tO8X5hcAFv3hvz41We6l8eIqKu9qHLYsORUDCy8IISFX3uohz1pLu', 'none', 4.88, 'casual', NULL, NULL, NULL),
(48, '3uERmSZCEu', 'J5s8QqquyA@gmail.com', '$2y$10$0wW731U8FdEXKJJH/gspaOi1/oEEcyw5R/.PYV.Oc.OueLJKJfdTC', 'none', 2.64, 'casual', NULL, NULL, NULL),
(49, 'O12ZxsMPPX', 'NfEfoKpX7M@gmail.com', '$2y$10$fttkAA80jCz5rEMFM.FOuukeJ88iOF7jyy0xEE7jZtvYuOZR8ADnO', 'none', 4.35, 'casual', NULL, NULL, NULL),
(50, 'VKLTbsqCfI', 'YIcX7dz0xB@gmail.com', '$2y$10$aRX048GGpsIWYVm29m6MmeWlWlpf.J1Ybi9HL22ZBgefeXH8ddVxy', 'none', 6.10, 'casual', NULL, NULL, NULL),
(51, 'w06HPHLg0i', 'r8J0XnEE0D@gmail.com', '$2y$10$FaRQ9jH80pJhEMUyzG.2I.VkRierug6Ck.PsoRDQ4X4eoQkjhCjF6', 'none', 8.69, 'casual', NULL, NULL, NULL),
(52, 'FsWKysqZwA', 'QYwYqPy3LM@gmail.com', '$2y$10$aA.3esDglXu21a3GKAI9De0CDOIxamp6.4qR0Z5l9vrFQ1sy4oiOS', 'none', 2.22, 'casual', NULL, NULL, NULL);

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
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `games_tags`
--
ALTER TABLE `games_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `report`
--
ALTER TABLE `report`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `sales_log`
--
ALTER TABLE `sales_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

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
-- Các ràng buộc cho bảng `sales_log`
--
ALTER TABLE `sales_log`
  ADD CONSTRAINT `sales_log_game_title_foreign` FOREIGN KEY (`game_title`) REFERENCES `games` (`title`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_log_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
