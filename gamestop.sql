-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 28, 2018 lúc 01:37 PM
-- Phiên bản máy phục vụ: 10.1.31-MariaDB
-- Phiên bản PHP: 7.2.3

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
-- Cấu trúc bảng cho bảng `admin_status`
--

CREATE TABLE `admin_status` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `game_manage` int(10) UNSIGNED NOT NULL,
  `sales_log` int(10) UNSIGNED NOT NULL,
  `wallet_history` int(10) UNSIGNED NOT NULL,
  `game_report` int(10) UNSIGNED NOT NULL,
  `tag_manage` int(10) UNSIGNED NOT NULL,
  `profile_manage` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `favorites`
--

CREATE TABLE `favorites` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `game_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('Read','Unread') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Unread'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `games`
--

INSERT INTO `games` (`title`, `slug`, `avg_rating`, `description`, `release`, `link`, `image`, `upload_by`, `price`, `sales`, `created_at`, `updated_at`, `status`) VALUES
('Age of Empire', 'age-of-empire', 2.4, '<p>Play as different races in ancient time and defeat your enemy</p>', 1997, 'none.com', 'age-of-empires-hd-edition_1523966846.jpg', 'Ensemble Studios', 0, 0, '2018-04-17 05:07:26', '2018-04-17 05:07:26', 'Unread'),
('BioShock : Infinite', 'bioshock-infinite', 2.8, '<p>BioShock is a first-person shooter video game series developed by Irrational Games&mdash;the first under the name 2K Boston/2K Australia&mdash;and designed by Ken Levine</p>', 2013, 'none.com', '3121022-trailer_bioshockinfinite_letsplay_20160826_1523966962.jpg', 'Irrational Games', 40, 0, '2018-04-17 05:09:22', '2018-04-17 05:09:22', 'Unread'),
('BioShock 1 Remastered', 'bioshock-1-remastered', 0.0, '<p>BioShock is a first-person shooter video game developed by 2K Boston and 2K Australia, and published by 2K Games</p>', 2007, 'none.com', 'BioShock-1-Re_1523967924.jpg', '2K Game', 10, 0, '2018-04-17 05:25:24', '2018-04-17 05:25:24', 'Unread'),
('BioShock 2 Remastered', 'bioshock-2-remastered', 0.0, '<p>BioShock 2 is a first-person shooter video game developed by 2K Marin and published by 2K Games. It is the sequel to the 2007 video game BioShock and was released worldwide for Microsoft Windows, the ...</p>', 2010, 'none.com', 'BioShock2-Re_1523967976.jpg', '2K Game', 15, 0, '2018-04-17 05:26:17', '2018-04-17 05:26:17', 'Unread'),
('BlazBlue : Central Fiction', 'blazeblue-central-fiction', 2.7, '<p>BlazBlue: Central Fiction, released in Japan as BlazBlue: Centralfiction is a 2-D fighting video game developed by Arc System Works. It is the fourth game in the BlazBlue series, and is set after the events of BlazBlue: Chrono Phantasma.</p>', 2015, 'none yet', 'discovering-blazblue-central-fiction-thumbnail_1523967685.png', 'Arc System Works', 20, 0, '2018-04-17 04:56:38', '2018-04-23 19:38:50', 'Unread'),
('BlazBlue : Chronophantasma', 'blazblue-chronophantasma', 2.6, 'BlazBlue: Chrono Phantasma, released in Japan as BlazBlue: Chronophantasma (ブレイブルー クロノファンタズマ BureiBurū Kuronofantazuma), is a 2-D fighting game developed by Arc System Works. It is the third game of the Blazblue series, set after the events of BlazBlue: Continuum Shift. The game was originally to be released first as an arcade game in the early fourth quarter of 2012,[3] which was later pushed forward to November 2012.[4] A PlayStation 3 version of the game was released in Japan on October 24, 2013,[5] while it was released in the United States on March 25, 2014. Due to limited hardware and disc space the game was not released on the Xbox 360.[6] An updated version of the game titled BlazBlue: Chrono Phantasma Extend (ブレイブルー クロノファンタズマ エクステンド BureiBurū: Kuronofantazuma Ekusutendo, BlazBlue: Chronophantasma Extend), dubbed as BlazBlue: Chrono Phantasma 2.0 (ブレイブルー クロノファンタズマ ２.０ BureiBurū: Kuronofantazuma 2.0, BlazBlue: Chronophantasma 2.0) in the Arcade version, was originally released for Arcades in October 2014, and for the PlayStation 3, PlayStation Vita, PlayStation 4, and Xbox One in April 2015.[7] It was released on June 30, 2015 in North America,[8] with the European region version releasing on October 23, 2015.[9]', 2013, 'none.yet', 'chrono_1524493864.jpg', 'Arc System Works', 12, 0, '2018-04-23 07:31:04', '2018-04-23 07:31:04', 'Unread'),
('Counter-Strike : Global Offensive', 'counter-strike-global-offensive', 0.0, '<p>The online version of the legendary counter-strike game franchise</p>', 2010, 'none.yet', 'CSGO-Logo_1523967330.jpg', 'Valve', 0, 0, '2018-04-17 05:15:30', '2018-04-17 05:15:30', 'Unread'),
('Fifa 18', 'fifa-18', 2.8, 'FIFA 18 is a football simulation video game in the FIFA series of video games, developed and published by Electronic Arts and was released worldwide on 29 September 2017 for Microsoft Windows, PlayStation 3, PlayStation 4, Xbox 360, Xbox One and Nintendo Switch. It is the 25th instalment in the FIFA series. Real Madrid forward Cristiano Ronaldo appears as the cover athlete of the regular edition. Ronaldo Nazario appears on the icon edition of the game.', 2017, 'none.yet', 'fifa18-homepage-topterhero-bg-xs_1524493916.jpg', 'EA Sports', 30, 0, '2018-04-23 07:31:56', '2018-04-23 07:31:56', 'Unread'),
('For Honor', 'for-honor', 2.9, 'For Honor is a video game developed and published by Ubisoft for Microsoft Windows, PlayStation 4, and Xbox One. The game allows players to play the roles of historical forms of soldiers and warriors, including knights, samurai, and vikings within a medieval setting, controlled using a third-person perspective\r\n\r\nAnnounced at Electronic Entertainment Expo 2015, the game was developed primarily by Ubisoft\'s studio in Montreal, and released worldwide on February 14, 2017. Reception of the game was generally positive, with criticism mostly directed at the multiplayer matchmaking and the many technical issues regarding it. The game has also been criticized for excessive microtransactions.[1]', 2017, 'none.com', 'for honor_1524493804.jpg', 'Ubisoft', 40, 5, '2018-04-23 07:30:04', '2018-04-23 07:30:04', 'Unread'),
('Guilty Gear 2: Overture', 'guilty-gear-2-overture', 0.0, 'Guilty Gear 2: Overture (ギルティギア2オーヴァチュア Giruti Gia Tsū Ōvachua) is a video game in the Guilty Gear series made by Arc System Works for the Xbox 360. Unlike previous Guilty Gear titles, this installment makes use of 3D graphics. The Xbox Live demo of Guilty Gear 2 describes the game as, \"a mix between the action and real-time strategy genre.\" A playable demo featuring three modes of gameplay was released in Japan via Xbox Live on 30 October 2007. A North American version was released on October 7, 2008 released by Aksys Games.[2] A port for Microsoft Windows was released on March 31, 2016 worldwide by Arc System Works.', 2008, 'none.yet', 'overture guilty_1524493554.jpg', 'Arc System Works', 5, 0, '2018-04-23 07:25:54', '2018-04-23 07:25:54', 'Unread'),
('Guilty Gear Xrd', 'guilty-gear-xrd', 2.5, 'Guilty Gear Xrd[a] (Japanese: ギルティギア イグザード Hepburn: Giruti Gia Iguzādo) is a fighting video game developed by Arc System Works. The 5th main (16th overall) installment in the Guilty Gear series, Guilty Gear Xrd was developed using Unreal Engine 3, with cel-shaded graphics in place of the series traditional hand drawn sprites. Following the storyline of the last game in the series, Guilty Gear 2: Overture, it introduced four new characters.', 2014, 'none.com', 'xrd_1524493485.jpg', 'Arc System Works', 20, 0, '2018-04-23 07:24:46', '2018-04-23 07:24:46', 'Unread'),
('Hearthstone', 'hearthstone', 2.5, 'Hearthstone, originally Hearthstone: Heroes of Warcraft, is a free-to-play online collectible card video game developed and published by Blizzard Entertainment. Having been released worldwide on March 11, 2014, Hearthstone builds upon the already existing lore of the Warcraft series by using the same elements, characters, and relics. It was first released for Microsoft Windows and macOS, with support for iOS and Android devices being added later. The game features cross-platform play, allowing players on any supported device to compete with each other, restricted only by geographical region account limits.', 2014, 'none.com', 'hearth_1524493700.jpg', 'Blizzard Entertainment', 0, 0, '2018-04-23 07:28:20', '2018-04-23 07:28:20', 'Unread'),
('Metal Gear Rising : Revengeance', 'metal-gear-rising-revengeance', 5.0, '<p><em><strong>Metal Gear Rising: Revengeance</strong></em>&nbsp;is an&nbsp;<a href=\"https://en.wikipedia.org/wiki/Action_game\">action</a>&nbsp;<a href=\"https://en.wikipedia.org/wiki/Hack_and_slash\">hack and slash</a>&nbsp;<a href=\"https://en.wikipedia.org/wiki/Video_game\">video game</a>&nbsp;developed by&nbsp;<a href=\"https://en.wikipedia.org/wiki/PlatinumGames\">PlatinumGames</a>&nbsp;and published by&nbsp;<a href=\"https://en.wikipedia.org/wiki/Konami_Digital_Entertainment\">Konami Digital Entertainment</a>. Released for the&nbsp;<a href=\"https://en.wikipedia.org/wiki/PlayStation_3\">PlayStation 3</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Xbox_360\">Xbox 360</a>&nbsp;and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Microsoft_Windows\">Microsoft Windows</a>, it is a spin-off in the&nbsp;<em><a href=\"https://en.wikipedia.org/wiki/Metal_Gear\">Metal Gear</a></em>series, and is set four years after the events of&nbsp;<em><a href=\"https://en.wikipedia.org/wiki/Metal_Gear_Solid_4:_Guns_of_the_Patriots\">Metal Gear Solid 4: Guns of the Patriots</a></em>. In the game, players control&nbsp;<a href=\"https://en.wikipedia.org/wiki/Raiden_(Metal_Gear)\">Raiden</a>, a cyborg who confronts the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Private_military_company\">private military company</a>&nbsp;Desperado Enforcement, with the gameplay focusing on fighting enemies using a sword and other weapons to perform combos and counterattacks. Through the use of Blade Mode, Raiden can dismember cyborgs in slow motion and steal parts stored in their bodies. The series&#39; usual stealth elements are also optional to reduce combat.</p>', 2013, 'none.com', 'MGS_1523960666.jpg', 'PlatinumGames', 40, 0, '2018-04-17 03:24:26', '2018-04-17 03:24:26', 'Unread'),
('Nier: Automata', 'nier-automata', 2.8, '<p>Nier: Automata is an action role-playing game developed by PlatinumGames and published by Square Enix for PlayStation 4 and Microsoft Windows. The game was released in Japan in February 2017, and worldwide the following month</p>', 2017, 'none.com', 'neir_automata_1523966111.jpg', 'PlatinumGames', 60, 0, '2018-04-17 04:55:12', '2018-04-17 04:55:12', 'Unread'),
('Slither', 'slither', 0.0, '<p>Slither.io is a massively multiplayer browser game developed by Steve Howse. Players control an avatar resembling a worm, which consumes multicolored pellets, both from other players and ones that ...</p>', 2016, 'slither.io', '6-Popular-Game-Apps-That-Teach-Us-Real-Life-Lessons-1_1523967825.jpg', 'Lowtech Studio', 0, 0, '2018-04-17 05:23:45', '2018-04-17 05:23:45', 'Unread'),
('StarCraft 2 : Legacy of the Void', 'starcraft-2-legacy-of-the-void', 3.0, '<p>StarCraft II: Legacy of the Void is a standalone expansion pack to the military science fiction real-time strategy game StarCraft II: Wings of Liberty, and the third and final part of the StarCraft II trilogy developed by Blizzard Entertainment.</p>', 2015, 'none.com', 'starcraft-ii-legacy-of-the-void-18_1523968132.jpg', 'Blizzard Entertainment', 35, 0, '2018-04-17 05:28:52', '2018-04-17 05:28:52', 'Unread'),
('The Escapists 2', 'the-escapists-2', 4.0, '<p>Just try and escape.. If you can lol</p>', 2017, 'none.com', 'The-Escapists-2_1523968039.jpg', 'Team17', 5, 0, '2018-04-17 05:27:19', '2018-04-17 05:27:19', 'Unread'),
('The Witcher 2: Assassins of Kings', 'the-witcher-2-assassins-of-kings', 2.7, 'The Witcher 2: Assassins of Kings (Polish: Wiedźmin 2: Zabójcy królów) is an action role-playing hack and slash video game developed by CD Projekt Red for Microsoft Windows, Xbox 360, OS X, and Linux.[7] The game was released for Microsoft Windows in May 2011, for Xbox 360 and OS X in 2012, and for Linux in 2014.', 2011, 'none.com', 'witcher-2-game-wallpaper-1280x720_1524493647.jpg', 'CD Projekt Red', 10, 0, '2018-04-23 07:27:27', '2018-04-23 07:27:27', 'Unread'),
('Warcraft III: The Frozen Throne', 'warcraft-iii-the-frozen-throne', 3.0, 'Warcraft III: The Frozen Throne is the expansion pack to Warcraft III: Reign of Chaos, a real-time strategy video game by Blizzard Entertainment.[1] Released worldwide on July 1, 2003,[2] it includes new units for each race, two new auxiliary races, four campaigns, five neutral heroes (an additional neutral hero was added April 2004 and two more were added in August 2004),[3] the ability to build a shop and other improvements such as the ability to queue upgrades. Sea units were reintroduced; they had been present in Warcraft II: Tides of Darkness but were absent in Reign of Chaos. Blizzard Entertainment has released patches for the game to fix bugs, extend the scripting system, and balance multiplayer', 2003, 'none.com', 'frozen_1524493752.jpg', 'Blizzard Entertainment', 0, 0, '2018-04-23 07:29:12', '2018-04-23 07:29:12', 'Unread'),
('Wolfenstein II: The New Colossus', 'wolfenstein-ii-the-new-colossus', 2.7, 'Wolfenstein II: The New Colossus is an action-adventure first-person shooter video game developed by MachineGames and published by Bethesda Softworks. It was released on 27 October 2017 for Microsoft Windows, PlayStation 4, and Xbox One, and is scheduled for release in 2018 for Nintendo Switch. The game is the eighth main entry in the Wolfenstein series and the sequel to 2014\'s Wolfenstein: The New Order, set in an alternate history 1961 following the Nazi victory of the Second World War. The story follows war veteran William \"B.J.\" Blazkowicz and his efforts to fight against the Nazi regime in America.\r\n\r\nThe game is played from a first-person perspective and most of its levels are navigated on foot. The story is arranged in chapters, which players complete in order to progress. A binary choice in the prologue alters the game\'s entire storyline; some characters and small plot points are replaced throughout the timelines. The game features a variety of weapons, most of which can be dual wielded. A cover system is also present. Continuing from The New Order, the development team aimed to characterize Blazkowicz for players to adopt his personality.', 2017, 'none.com', 'wolf_1524493990.jpg', 'MachineGames', 20, 0, '2018-04-23 07:33:10', '2018-04-23 07:33:10', 'Unread');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `games_tags`
--

CREATE TABLE `games_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `games_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(9, '2018_04_08_151042_create_rating_table', 1),
(10, '2018_04_21_085111_add_description_to_users', 1),
(11, '2018_04_28_090517_wallet_history_table', 1),
(12, '2018_04_28_104730_add_price_to_sales_log', 1),
(13, '2018_04_28_182119_create_table_admin_status', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rating`
--

CREATE TABLE `rating` (
  `game_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `rating` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `report`
--

CREATE TABLE `report` (
  `id` int(10) UNSIGNED NOT NULL,
  `upload_by` int(10) UNSIGNED NOT NULL,
  `game_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Impropriate` tinyint(1) NOT NULL DEFAULT '0',
  `Fraud` tinyint(1) NOT NULL DEFAULT '0',
  `Plagarism` tinyint(1) NOT NULL DEFAULT '0',
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Read','Unread') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Unread'
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
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('Read','Unread') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Unread'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('Read','Unread') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Unread'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `auth_level` enum('ban','admin','developer','casual') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'casual',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('Read','Unread') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Unread',
  `description` mediumtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `avatar`, `wallet`, `auth_level`, `remember_token`, `created_at`, `updated_at`, `status`, `description`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$cDkhQ2zvKjZgsLyiiJGP.e2UyX2BDnIFBpph/TKkSjArWglhoAt9O', 'none', 0.00, 'admin', NULL, '2018-04-28 11:35:45', '2018-04-28 11:35:45', 'Unread', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wallet_history`
--

CREATE TABLE `wallet_history` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `amount` double(6,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('Read','Unread') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Unread'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin_status`
--
ALTER TABLE `admin_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_status_admin_id_foreign` (`admin_id`);

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
  ADD UNIQUE KEY `report_game_title_unique` (`game_title`),
  ADD KEY `report_upload_by_foreign` (`upload_by`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_name_unique` (`name`);

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
-- AUTO_INCREMENT cho bảng `admin_status`
--
ALTER TABLE `admin_status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `games_tags`
--
ALTER TABLE `games_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `wallet_history`
--
ALTER TABLE `wallet_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `admin_status`
--
ALTER TABLE `admin_status`
  ADD CONSTRAINT `admin_status_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `report_game_title_foreign` FOREIGN KEY (`game_title`) REFERENCES `games` (`title`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `report_upload_by_foreign` FOREIGN KEY (`upload_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
