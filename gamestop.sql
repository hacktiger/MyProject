-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 30, 2018 lúc 09:15 AM
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
('Age of Empire', 'age-of-empire', 0.0, '<p>Play as different races in ancient time and defeat your enemy</p>', 1997, 'none.com', 'age-of-empires-hd-edition_1523966846.jpg', 'Ensemble Studios', 0, 0, '2018-04-17 05:07:26', '2018-04-29 12:47:28', 'Read'),
('BioShock : Infinite', 'bioshock-infinite', 0.0, '<p>BioShock is a first-person shooter video game series developed by Irrational Games&mdash;the first under the name 2K Boston/2K Australia&mdash;and designed by Ken Levine</p>', 2013, 'none.com', '3121022-trailer_bioshockinfinite_letsplay_20160826_1523966962.jpg', 'Irrational Games', 40, 0, '2018-04-17 05:09:22', '2018-04-29 12:47:28', 'Read'),
('BioShock 1 Remastered', 'bioshock-1-remastered', 0.0, '<p>BioShock is a first-person shooter video game developed by 2K Boston and 2K Australia, and published by 2K Games</p>', 2007, 'none.com', 'BioShock-1-Re_1523967924.jpg', '2K Game', 10, 0, '2018-04-17 05:25:24', '2018-04-29 12:47:28', 'Read'),
('BioShock 2 Remastered', 'bioshock-2-remastered', 0.0, '<p>BioShock 2 is a first-person shooter video game developed by 2K Marin and published by 2K Games. It is the sequel to the 2007 video game BioShock and was released worldwide for Microsoft Windows, the ...</p>', 2010, 'none.com', 'BioShock2-Re_1523967976.jpg', '2K Game', 15, 0, '2018-04-17 05:26:17', '2018-04-29 12:47:28', 'Read'),
('BlazBlue : Central Fiction', 'blazeblue-central-fiction', 0.0, '<p>BlazBlue: Central Fiction, released in Japan as BlazBlue: Centralfiction is a 2-D fighting video game developed by Arc System Works. It is the fourth game in the BlazBlue series, and is set after the events of BlazBlue: Chrono Phantasma.</p>', 2015, 'none yet', 'discovering-blazblue-central-fiction-thumbnail_1523967685.png', 'Arc System Works', 20, 0, '2018-04-17 04:56:38', '2018-04-29 12:47:28', 'Read'),
('BlazBlue : Chronophantasma', 'blazblue-chronophantasma', 0.0, 'BlazBlue: Chrono Phantasma, released in Japan as BlazBlue: Chronophantasma (ブレイブルー クロノファンタズマ BureiBurū Kuronofantazuma), is a 2-D fighting game developed by Arc System Works. It is the third game of the Blazblue series, set after the events of BlazBlue: Continuum Shift. The game was originally to be released first as an arcade game in the early fourth quarter of 2012,[3] which was later pushed forward to November 2012.[4] A PlayStation 3 version of the game was released in Japan on October 24, 2013,[5] while it was released in the United States on March 25, 2014. Due to limited hardware and disc space the game was not released on the Xbox 360.[6] An updated version of the game titled BlazBlue: Chrono Phantasma Extend (ブレイブルー クロノファンタズマ エクステンド BureiBurū: Kuronofantazuma Ekusutendo, BlazBlue: Chronophantasma Extend), dubbed as BlazBlue: Chrono Phantasma 2.0 (ブレイブルー クロノファンタズマ ２.０ BureiBurū: Kuronofantazuma 2.0, BlazBlue: Chronophantasma 2.0) in the Arcade version, was originally released for Arcades in October 2014, and for the PlayStation 3, PlayStation Vita, PlayStation 4, and Xbox One in April 2015.[7] It was released on June 30, 2015 in North America,[8] with the European region version releasing on October 23, 2015.[9]', 2013, 'none.yet', 'chrono_1524493864.jpg', 'Arc System Works', 12, 0, '2018-04-23 07:31:04', '2018-04-29 12:47:28', 'Read'),
('Counter-Strike : Global Offensive', 'counter-strike-global-offensive', 4.0, '<p>The online version of the legendary counter-strike game franchise</p>', 2010, 'none.yet', 'CSGO-Logo_1523967330.jpg', 'Valve', 40, 0, '2018-04-17 05:15:30', '2018-04-29 12:54:36', 'Read'),
('Fifa 18', 'fifa-18', 0.0, 'FIFA 18 is a football simulation video game in the FIFA series of video games, developed and published by Electronic Arts and was released worldwide on 29 September 2017 for Microsoft Windows, PlayStation 3, PlayStation 4, Xbox 360, Xbox One and Nintendo Switch. It is the 25th instalment in the FIFA series. Real Madrid forward Cristiano Ronaldo appears as the cover athlete of the regular edition. Ronaldo Nazario appears on the icon edition of the game.', 2017, 'none.yet', 'fifa18-homepage-topterhero-bg-xs_1524493916.jpg', 'EA Sports', 30, 0, '2018-04-23 07:31:56', '2018-04-29 12:47:28', 'Read'),
('For Honor', 'for-honor', 0.0, 'For Honor is a video game developed and published by Ubisoft for Microsoft Windows, PlayStation 4, and Xbox One. The game allows players to play the roles of historical forms of soldiers and warriors, including knights, samurai, and vikings within a medieval setting, controlled using a third-person perspective\r\n\r\nAnnounced at Electronic Entertainment Expo 2015, the game was developed primarily by Ubisoft\'s studio in Montreal, and released worldwide on February 14, 2017. Reception of the game was generally positive, with criticism mostly directed at the multiplayer matchmaking and the many technical issues regarding it. The game has also been criticized for excessive microtransactions.[1]', 2017, 'none.com', 'for honor_1524493804.jpg', 'Ubisoft', 40, 5, '2018-04-23 07:30:04', '2018-04-29 12:47:28', 'Read'),
('Guilty Gear 2: Overture', 'guilty-gear-2-overture', 0.0, 'Guilty Gear 2: Overture (ギルティギア2オーヴァチュア Giruti Gia Tsū Ōvachua) is a video game in the Guilty Gear series made by Arc System Works for the Xbox 360. Unlike previous Guilty Gear titles, this installment makes use of 3D graphics. The Xbox Live demo of Guilty Gear 2 describes the game as, \"a mix between the action and real-time strategy genre.\" A playable demo featuring three modes of gameplay was released in Japan via Xbox Live on 30 October 2007. A North American version was released on October 7, 2008 released by Aksys Games.[2] A port for Microsoft Windows was released on March 31, 2016 worldwide by Arc System Works.', 2008, 'none.yet', 'overture guilty_1524493554.jpg', 'Arc System Works', 5, 0, '2018-04-23 07:25:54', '2018-04-29 12:47:28', 'Read'),
('Guilty Gear Xrd', 'guilty-gear-xrd', 0.0, 'Guilty Gear Xrd[a] (Japanese: ギルティギア イグザード Hepburn: Giruti Gia Iguzādo) is a fighting video game developed by Arc System Works. The 5th main (16th overall) installment in the Guilty Gear series, Guilty Gear Xrd was developed using Unreal Engine 3, with cel-shaded graphics in place of the series traditional hand drawn sprites. Following the storyline of the last game in the series, Guilty Gear 2: Overture, it introduced four new characters.', 2014, 'none.com', 'xrd_1524493485.jpg', 'Arc System Works', 20, 0, '2018-04-23 07:24:46', '2018-04-29 12:47:28', 'Read'),
('Hearthstone', 'hearthstone', 0.0, 'Hearthstone, originally Hearthstone: Heroes of Warcraft, is a free-to-play online collectible card video game developed and published by Blizzard Entertainment. Having been released worldwide on March 11, 2014, Hearthstone builds upon the already existing lore of the Warcraft series by using the same elements, characters, and relics. It was first released for Microsoft Windows and macOS, with support for iOS and Android devices being added later. The game features cross-platform play, allowing players on any supported device to compete with each other, restricted only by geographical region account limits.', 2014, 'none.com', 'hearth_1524493700.jpg', 'Blizzard Entertainment', 0, 0, '2018-04-23 07:28:20', '2018-04-29 12:47:28', 'Read'),
('Metal Gear Rising : Revengeance', 'metal-gear-rising-revengeance', 0.0, '<p><em><strong>Metal Gear Rising: Revengeance</strong></em>&nbsp;is an&nbsp;<a href=\"https://en.wikipedia.org/wiki/Action_game\">action</a>&nbsp;<a href=\"https://en.wikipedia.org/wiki/Hack_and_slash\">hack and slash</a>&nbsp;<a href=\"https://en.wikipedia.org/wiki/Video_game\">video game</a>&nbsp;developed by&nbsp;<a href=\"https://en.wikipedia.org/wiki/PlatinumGames\">PlatinumGames</a>&nbsp;and published by&nbsp;<a href=\"https://en.wikipedia.org/wiki/Konami_Digital_Entertainment\">Konami Digital Entertainment</a>. Released for the&nbsp;<a href=\"https://en.wikipedia.org/wiki/PlayStation_3\">PlayStation 3</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Xbox_360\">Xbox 360</a>&nbsp;and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Microsoft_Windows\">Microsoft Windows</a>, it is a spin-off in the&nbsp;<em><a href=\"https://en.wikipedia.org/wiki/Metal_Gear\">Metal Gear</a></em>series, and is set four years after the events of&nbsp;<em><a href=\"https://en.wikipedia.org/wiki/Metal_Gear_Solid_4:_Guns_of_the_Patriots\">Metal Gear Solid 4: Guns of the Patriots</a></em>. In the game, players control&nbsp;<a href=\"https://en.wikipedia.org/wiki/Raiden_(Metal_Gear)\">Raiden</a>, a cyborg who confronts the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Private_military_company\">private military company</a>&nbsp;Desperado Enforcement, with the gameplay focusing on fighting enemies using a sword and other weapons to perform combos and counterattacks. Through the use of Blade Mode, Raiden can dismember cyborgs in slow motion and steal parts stored in their bodies. The series&#39; usual stealth elements are also optional to reduce combat.</p>', 2013, 'none.com', 'MGS_1523960666.jpg', 'PlatinumGames', 40, 0, '2018-04-17 03:24:26', '2018-04-29 12:47:28', 'Read'),
('Nier: Automata', 'nier-automata', 0.0, '<p>Nier: Automata is an action role-playing game developed by PlatinumGames and published by Square Enix for PlayStation 4 and Microsoft Windows. The game was released in Japan in February 2017, and worldwide the following month</p>', 2017, 'none.com', 'neir_automata_1523966111.jpg', 'PlatinumGames', 60, 0, '2018-04-17 04:55:12', '2018-04-29 12:47:28', 'Read'),
('Slither', 'slither', 0.0, '<p>Slither.io is a massively multiplayer browser game developed by Steve Howse. Players control an avatar resembling a worm, which consumes multicolored pellets, both from other players and ones that ...</p>', 2016, 'slither.io', '6-Popular-Game-Apps-That-Teach-Us-Real-Life-Lessons-1_1523967825.jpg', 'Lowtech Studio', 0, 0, '2018-04-17 05:23:45', '2018-04-29 12:47:28', 'Read'),
('StarCraft 2 : Legacy of the Void', 'starcraft-2-legacy-of-the-void', 0.0, '<p>StarCraft II: Legacy of the Void is a standalone expansion pack to the military science fiction real-time strategy game StarCraft II: Wings of Liberty, and the third and final part of the StarCraft II trilogy developed by Blizzard Entertainment.</p>', 2015, 'none.com', 'starcraft-ii-legacy-of-the-void-18_1523968132.jpg', 'Blizzard Entertainment', 35, 0, '2018-04-17 05:28:52', '2018-04-29 12:47:28', 'Read'),
('The Escapists 2', 'the-escapists-2', 0.0, '<p>Just try and escape.. If you can lol</p>', 2017, 'none.com', 'The-Escapists-2_1523968039.jpg', 'Team17', 5, 0, '2018-04-17 05:27:19', '2018-04-29 12:47:28', 'Read'),
('The Witcher 2: Assassins of Kings', 'the-witcher-2-assassins-of-kings', 0.0, 'The Witcher 2: Assassins of Kings (Polish: Wiedźmin 2: Zabójcy królów) is an action role-playing hack and slash video game developed by CD Projekt Red for Microsoft Windows, Xbox 360, OS X, and Linux.[7] The game was released for Microsoft Windows in May 2011, for Xbox 360 and OS X in 2012, and for Linux in 2014.', 2011, 'none.com', 'witcher-2-game-wallpaper-1280x720_1524493647.jpg', 'CD Projekt Red', 10, 0, '2018-04-23 07:27:27', '2018-04-29 12:47:28', 'Read'),
('Warcraft III: The Frozen Throne', 'warcraft-iii-the-frozen-throne', 0.0, 'Warcraft III: The Frozen Throne is the expansion pack to Warcraft III: Reign of Chaos, a real-time strategy video game by Blizzard Entertainment.[1] Released worldwide on July 1, 2003,[2] it includes new units for each race, two new auxiliary races, four campaigns, five neutral heroes (an additional neutral hero was added April 2004 and two more were added in August 2004),[3] the ability to build a shop and other improvements such as the ability to queue upgrades. Sea units were reintroduced; they had been present in Warcraft II: Tides of Darkness but were absent in Reign of Chaos. Blizzard Entertainment has released patches for the game to fix bugs, extend the scripting system, and balance multiplayer', 2003, 'none.com', 'frozen_1524493752.jpg', 'Blizzard Entertainment', 0, 0, '2018-04-23 07:29:12', '2018-04-29 12:47:28', 'Read'),
('Wolfenstein II: The New Colossus', 'wolfenstein-ii-the-new-colossus', 0.0, 'Wolfenstein II: The New Colossus is an action-adventure first-person shooter video game developed by MachineGames and published by Bethesda Softworks. It was released on 27 October 2017 for Microsoft Windows, PlayStation 4, and Xbox One, and is scheduled for release in 2018 for Nintendo Switch. The game is the eighth main entry in the Wolfenstein series and the sequel to 2014\'s Wolfenstein: The New Order, set in an alternate history 1961 following the Nazi victory of the Second World War. The story follows war veteran William \"B.J.\" Blazkowicz and his efforts to fight against the Nazi regime in America.\r\n\r\nThe game is played from a first-person perspective and most of its levels are navigated on foot. The story is arranged in chapters, which players complete in order to progress. A binary choice in the prologue alters the game\'s entire storyline; some characters and small plot points are replaced throughout the timelines. The game features a variety of weapons, most of which can be dual wielded. A cover system is also present. Continuing from The New Order, the development team aimed to characterize Blazkowicz for players to adopt his personality.', 2017, 'none.com', 'wolf_1524493990.jpg', 'MachineGames', 20, 0, '2018-04-23 07:33:10', '2018-04-29 12:47:28', 'Read');

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
(12, '2018_04_28_104730_add_price_to_sales_log', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notification`
--

CREATE TABLE `notification` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(11) NOT NULL,
  `imange` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

--
-- Đang đổ dữ liệu cho bảng `rating`
--

INSERT INTO `rating` (`game_title`, `user_id`, `rating`) VALUES
('Counter-Strike : Global Offensive', 1, 4),
('Nier: Automata', 1, 1),
('Age of Empire', 1, 0),
('BioShock : Infinite', 1, 5);

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

--
-- Đang đổ dữ liệu cho bảng `sales_log`
--

INSERT INTO `sales_log` (`id`, `game_title`, `price`, `user_id`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Counter-Strike : Global Offensive', 40.00, 42, '2015-05-22 17:00:00', '2018-04-29 13:01:49', 'Read'),
(2, 'StarCraft 2 : Legacy of the Void', 35.00, 30, '2015-05-18 17:00:00', '2018-04-29 13:01:49', 'Read'),
(3, 'Nier: Automata', 60.00, 25, '2015-05-12 17:00:00', '2018-04-29 13:01:49', 'Read'),
(4, 'Counter-Strike : Global Offensive', 40.00, 3, '2015-05-25 17:00:00', '2018-04-29 13:01:49', 'Read'),
(5, 'StarCraft 2 : Legacy of the Void', 35.00, 5, '2015-05-21 17:00:00', '2018-04-29 13:01:49', 'Read'),
(6, 'Nier: Automata', 60.00, 12, '2015-05-16 17:00:00', '2018-04-29 13:01:49', 'Read'),
(7, 'Counter-Strike : Global Offensive', 40.00, 49, '2015-05-25 17:00:00', '2018-04-29 13:01:49', 'Read'),
(8, 'StarCraft 2 : Legacy of the Void', 35.00, 50, '2015-05-23 17:00:00', '2018-04-29 13:01:49', 'Read'),
(9, 'Nier: Automata', 60.00, 2, '2015-05-22 17:00:00', '2018-04-29 13:01:49', 'Read'),
(10, 'Counter-Strike : Global Offensive', 40.00, 39, '2015-05-25 17:00:00', '2018-04-29 13:01:49', 'Read'),
(11, 'StarCraft 2 : Legacy of the Void', 35.00, 48, '2015-05-20 17:00:00', '2018-04-29 13:01:49', 'Read'),
(12, 'Nier: Automata', 60.00, 27, '2015-05-17 17:00:00', '2018-04-29 13:01:49', 'Read'),
(13, 'Counter-Strike : Global Offensive', 40.00, 35, '2015-05-25 17:00:00', '2018-04-29 13:01:49', 'Read'),
(14, 'StarCraft 2 : Legacy of the Void', 35.00, 17, '2015-05-24 17:00:00', '2018-04-29 13:01:49', 'Read'),
(15, 'Nier: Automata', 60.00, 22, '2015-05-19 17:00:00', '2018-04-29 13:01:49', 'Read'),
(16, 'Counter-Strike : Global Offensive', 40.00, 20, '2015-05-26 17:00:00', '2018-04-29 13:01:49', 'Read'),
(17, 'StarCraft 2 : Legacy of the Void', 35.00, 38, '2015-05-20 17:00:00', '2018-04-29 13:01:49', 'Read'),
(18, 'Nier: Automata', 60.00, 11, '2015-05-16 17:00:00', '2018-04-29 13:01:49', 'Read'),
(19, 'Counter-Strike : Global Offensive', 40.00, 16, '2015-05-21 17:00:00', '2018-04-29 13:01:49', 'Read'),
(20, 'StarCraft 2 : Legacy of the Void', 35.00, 7, '2015-05-18 17:00:00', '2018-04-29 13:01:49', 'Read'),
(21, 'Nier: Automata', 60.00, 2, '2015-05-16 17:00:00', '2018-04-29 13:01:49', 'Read'),
(22, 'Counter-Strike : Global Offensive', 40.00, 14, '2015-05-26 17:00:00', '2018-04-29 13:01:49', 'Read'),
(23, 'StarCraft 2 : Legacy of the Void', 35.00, 44, '2015-05-21 17:00:00', '2018-04-29 13:01:49', 'Read'),
(24, 'Nier: Automata', 60.00, 47, '2015-05-20 17:00:00', '2018-04-29 13:01:49', 'Read'),
(25, 'Counter-Strike : Global Offensive', 40.00, 34, '2015-05-23 17:00:00', '2018-04-29 13:01:49', 'Read'),
(26, 'StarCraft 2 : Legacy of the Void', 35.00, 44, '2015-05-22 17:00:00', '2018-04-29 13:01:49', 'Read'),
(27, 'Nier: Automata', 60.00, 32, '2015-05-19 17:00:00', '2018-04-29 13:01:49', 'Read'),
(28, 'Counter-Strike : Global Offensive', 40.00, 45, '2015-05-25 17:00:00', '2018-04-29 13:01:49', 'Read'),
(29, 'StarCraft 2 : Legacy of the Void', 35.00, 49, '2015-05-22 17:00:00', '2018-04-29 13:01:49', 'Read'),
(30, 'Nier: Automata', 60.00, 17, '2015-05-21 17:00:00', '2018-04-29 13:01:49', 'Read'),
(31, 'Counter-Strike : Global Offensive', 40.00, 13, '2015-05-21 17:00:00', '2018-04-29 13:01:49', 'Read'),
(32, 'StarCraft 2 : Legacy of the Void', 35.00, 22, '2015-05-19 17:00:00', '2018-04-29 13:01:49', 'Read'),
(33, 'Nier: Automata', 60.00, 32, '2015-05-14 17:00:00', '2018-04-29 13:01:49', 'Read'),
(34, 'Counter-Strike : Global Offensive', 40.00, 25, '2015-05-25 17:00:00', '2018-04-29 13:01:49', 'Read'),
(35, 'StarCraft 2 : Legacy of the Void', 35.00, 28, '2015-05-22 17:00:00', '2018-04-29 13:01:49', 'Read'),
(36, 'Nier: Automata', 60.00, 40, '2015-05-20 17:00:00', '2018-04-29 13:01:49', 'Read'),
(37, 'Counter-Strike : Global Offensive', 40.00, 41, '2015-05-21 17:00:00', '2018-04-29 13:01:49', 'Read'),
(38, 'StarCraft 2 : Legacy of the Void', 35.00, 2, '2015-05-15 17:00:00', '2018-04-29 13:01:49', 'Read'),
(39, 'Nier: Automata', 60.00, 28, '2015-05-14 17:00:00', '2018-04-29 13:01:49', 'Read'),
(40, 'Counter-Strike : Global Offensive', 40.00, 45, '2015-05-22 17:00:00', '2018-04-29 13:01:49', 'Read'),
(41, 'StarCraft 2 : Legacy of the Void', 35.00, 43, '2015-05-20 17:00:00', '2018-04-29 13:01:49', 'Read'),
(42, 'Nier: Automata', 60.00, 47, '2015-05-15 17:00:00', '2018-04-29 13:01:49', 'Read'),
(43, 'Counter-Strike : Global Offensive', 40.00, 5, '2015-05-26 17:00:00', '2018-04-29 13:01:49', 'Read'),
(44, 'StarCraft 2 : Legacy of the Void', 35.00, 44, '2015-05-25 17:00:00', '2018-04-29 13:01:49', 'Read'),
(45, 'Nier: Automata', 60.00, 26, '2015-05-23 17:00:00', '2018-04-29 13:01:49', 'Read'),
(46, 'Counter-Strike : Global Offensive', 40.00, 31, '2015-05-26 17:00:00', '2018-04-29 13:01:49', 'Read'),
(47, 'StarCraft 2 : Legacy of the Void', 35.00, 1, '2015-05-24 17:00:00', '2018-04-29 13:01:49', 'Read'),
(48, 'Nier: Automata', 60.00, 2, '2015-05-18 17:00:00', '2018-04-29 13:01:49', 'Read'),
(49, 'Counter-Strike : Global Offensive', 40.00, 5, '2015-05-21 17:00:00', '2018-04-29 13:01:49', 'Read'),
(50, 'StarCraft 2 : Legacy of the Void', 35.00, 42, '2015-05-19 17:00:00', '2018-04-29 13:01:49', 'Read'),
(51, 'Nier: Automata', 60.00, 32, '2015-05-13 17:00:00', '2018-04-29 13:01:49', 'Read'),
(52, 'Counter-Strike : Global Offensive', 40.00, 3, '2015-05-22 17:00:00', '2018-04-29 13:01:49', 'Read'),
(53, 'StarCraft 2 : Legacy of the Void', 35.00, 40, '2015-05-18 17:00:00', '2018-04-29 13:01:49', 'Read'),
(54, 'Nier: Automata', 60.00, 20, '2015-05-15 17:00:00', '2018-04-29 13:01:49', 'Read'),
(55, 'Counter-Strike : Global Offensive', 40.00, 28, '2015-05-24 17:00:00', '2018-04-29 13:01:49', 'Read'),
(56, 'StarCraft 2 : Legacy of the Void', 35.00, 33, '2015-05-21 17:00:00', '2018-04-29 13:01:49', 'Read'),
(57, 'Nier: Automata', 60.00, 20, '2015-05-20 17:00:00', '2018-04-29 13:01:49', 'Read'),
(58, 'Counter-Strike : Global Offensive', 40.00, 2, '2015-05-25 17:00:00', '2018-04-29 13:01:49', 'Read'),
(59, 'StarCraft 2 : Legacy of the Void', 35.00, 22, '2015-05-20 17:00:00', '2018-04-29 13:01:49', 'Read'),
(60, 'Nier: Automata', 60.00, 23, '2015-05-14 17:00:00', '2018-04-29 13:01:49', 'Read'),
(61, 'Counter-Strike : Global Offensive', 40.00, 46, '2018-04-23 17:00:00', '2018-04-29 13:03:56', 'Read'),
(62, 'StarCraft 2 : Legacy of the Void', 35.00, 33, '2018-04-22 17:00:00', '2018-04-29 13:03:56', 'Read'),
(63, 'Nier: Automata', 60.00, 27, '2018-04-21 17:00:00', '2018-04-29 13:03:56', 'Read'),
(64, 'Counter-Strike : Global Offensive', 40.00, 28, '2018-04-27 17:00:00', '2018-04-29 13:03:56', 'Read'),
(65, 'StarCraft 2 : Legacy of the Void', 35.00, 5, '2018-04-23 17:00:00', '2018-04-29 13:03:56', 'Read'),
(66, 'Nier: Automata', 60.00, 22, '2018-04-18 17:00:00', '2018-04-29 13:03:56', 'Read'),
(67, 'Counter-Strike : Global Offensive', 40.00, 28, '2018-04-25 17:00:00', '2018-04-29 13:03:56', 'Read'),
(68, 'StarCraft 2 : Legacy of the Void', 35.00, 48, '2018-04-21 17:00:00', '2018-04-29 13:03:56', 'Read'),
(69, 'Nier: Automata', 60.00, 15, '2018-04-17 17:00:00', '2018-04-29 13:03:56', 'Read'),
(70, 'Counter-Strike : Global Offensive', 40.00, 31, '2018-04-28 17:00:00', '2018-04-29 13:03:56', 'Read'),
(71, 'StarCraft 2 : Legacy of the Void', 35.00, 4, '2018-04-27 17:00:00', '2018-04-29 13:03:56', 'Read'),
(72, 'Nier: Automata', 60.00, 39, '2018-04-22 17:00:00', '2018-04-29 13:03:56', 'Read'),
(73, 'Counter-Strike : Global Offensive', 40.00, 33, '2018-04-28 17:00:00', '2018-04-29 13:03:56', 'Read'),
(74, 'StarCraft 2 : Legacy of the Void', 35.00, 50, '2018-04-24 17:00:00', '2018-04-29 13:03:56', 'Read'),
(75, 'Nier: Automata', 60.00, 48, '2018-04-20 17:00:00', '2018-04-29 13:03:56', 'Read'),
(76, 'Counter-Strike : Global Offensive', 40.00, 15, '2018-04-27 17:00:00', '2018-04-29 13:03:56', 'Read'),
(77, 'StarCraft 2 : Legacy of the Void', 35.00, 32, '2018-04-21 17:00:00', '2018-04-29 13:03:56', 'Read'),
(78, 'Nier: Automata', 60.00, 17, '2018-04-18 17:00:00', '2018-04-29 13:03:56', 'Read'),
(79, 'Counter-Strike : Global Offensive', 40.00, 9, '2018-04-28 17:00:00', '2018-04-29 13:03:56', 'Read'),
(80, 'StarCraft 2 : Legacy of the Void', 35.00, 20, '2018-04-24 17:00:00', '2018-04-29 13:03:56', 'Read'),
(81, 'Nier: Automata', 60.00, 28, '2018-04-23 17:00:00', '2018-04-29 13:03:56', 'Read'),
(82, 'Counter-Strike : Global Offensive', 40.00, 34, '2018-04-25 17:00:00', '2018-04-29 13:03:56', 'Read'),
(83, 'StarCraft 2 : Legacy of the Void', 35.00, 47, '2018-04-20 17:00:00', '2018-04-29 13:03:56', 'Read'),
(84, 'Nier: Automata', 60.00, 17, '2018-04-15 17:00:00', '2018-04-29 13:03:56', 'Read'),
(85, 'Counter-Strike : Global Offensive', 40.00, 30, '2018-04-24 17:00:00', '2018-04-29 13:03:56', 'Read'),
(86, 'StarCraft 2 : Legacy of the Void', 35.00, 1, '2018-04-22 17:00:00', '2018-04-29 13:03:56', 'Read'),
(87, 'Nier: Automata', 60.00, 34, '2018-04-21 17:00:00', '2018-04-29 13:03:56', 'Read'),
(88, 'Counter-Strike : Global Offensive', 40.00, 20, '2018-04-24 17:00:00', '2018-04-29 13:03:56', 'Read'),
(89, 'StarCraft 2 : Legacy of the Void', 35.00, 6, '2018-04-19 17:00:00', '2018-04-29 13:03:56', 'Read'),
(90, 'Nier: Automata', 60.00, 48, '2018-04-17 17:00:00', '2018-04-29 13:03:56', 'Read'),
(91, 'Counter-Strike : Global Offensive', 40.00, 3, '2018-04-28 17:00:00', '2018-04-29 13:03:56', 'Read'),
(92, 'StarCraft 2 : Legacy of the Void', 35.00, 17, '2018-04-27 17:00:00', '2018-04-29 13:03:56', 'Read'),
(93, 'Nier: Automata', 60.00, 2, '2018-04-26 17:00:00', '2018-04-29 13:03:56', 'Read'),
(94, 'Counter-Strike : Global Offensive', 40.00, 20, '2018-04-26 17:00:00', '2018-04-29 13:03:56', 'Read'),
(95, 'StarCraft 2 : Legacy of the Void', 35.00, 8, '2018-04-22 17:00:00', '2018-04-29 13:03:56', 'Read'),
(96, 'Nier: Automata', 60.00, 49, '2018-04-21 17:00:00', '2018-04-29 13:03:56', 'Read'),
(97, 'Counter-Strike : Global Offensive', 40.00, 36, '2018-04-25 17:00:00', '2018-04-29 13:03:56', 'Read'),
(98, 'StarCraft 2 : Legacy of the Void', 35.00, 40, '2018-04-21 17:00:00', '2018-04-29 13:03:56', 'Read'),
(99, 'Nier: Automata', 60.00, 11, '2018-04-20 17:00:00', '2018-04-29 13:03:56', 'Read'),
(100, 'Counter-Strike : Global Offensive', 40.00, 25, '2018-04-27 17:00:00', '2018-04-29 13:03:56', 'Read'),
(101, 'StarCraft 2 : Legacy of the Void', 35.00, 24, '2018-04-26 17:00:00', '2018-04-29 13:03:56', 'Read'),
(102, 'Nier: Automata', 60.00, 41, '2018-04-20 17:00:00', '2018-04-29 13:03:56', 'Read'),
(103, 'Counter-Strike : Global Offensive', 40.00, 24, '2018-04-28 17:00:00', '2018-04-29 13:03:56', 'Read'),
(104, 'StarCraft 2 : Legacy of the Void', 35.00, 46, '2018-04-22 17:00:00', '2018-04-29 13:03:56', 'Read'),
(105, 'Nier: Automata', 60.00, 44, '2018-04-19 17:00:00', '2018-04-29 13:03:56', 'Read'),
(106, 'Counter-Strike : Global Offensive', 40.00, 29, '2018-04-26 17:00:00', '2018-04-29 13:03:56', 'Read'),
(107, 'StarCraft 2 : Legacy of the Void', 35.00, 39, '2018-04-25 17:00:00', '2018-04-29 13:03:56', 'Read'),
(108, 'Nier: Automata', 60.00, 30, '2018-04-20 17:00:00', '2018-04-29 13:03:56', 'Read'),
(109, 'Counter-Strike : Global Offensive', 40.00, 33, '2018-04-25 17:00:00', '2018-04-29 13:03:56', 'Read'),
(110, 'StarCraft 2 : Legacy of the Void', 35.00, 30, '2018-04-24 17:00:00', '2018-04-29 13:03:56', 'Read'),
(111, 'Nier: Automata', 60.00, 33, '2018-04-23 17:00:00', '2018-04-29 13:03:56', 'Read'),
(112, 'Counter-Strike : Global Offensive', 40.00, 11, '2018-04-27 17:00:00', '2018-04-29 13:03:56', 'Read'),
(113, 'StarCraft 2 : Legacy of the Void', 35.00, 27, '2018-04-24 17:00:00', '2018-04-29 13:03:56', 'Read'),
(114, 'Nier: Automata', 60.00, 29, '2018-04-18 17:00:00', '2018-04-29 13:03:56', 'Read'),
(115, 'Counter-Strike : Global Offensive', 40.00, 16, '2018-04-28 17:00:00', '2018-04-29 13:03:56', 'Read'),
(116, 'StarCraft 2 : Legacy of the Void', 35.00, 38, '2018-04-25 17:00:00', '2018-04-29 13:03:56', 'Read'),
(117, 'Nier: Automata', 60.00, 23, '2018-04-21 17:00:00', '2018-04-29 13:03:56', 'Read'),
(118, 'Counter-Strike : Global Offensive', 40.00, 20, '2018-04-26 17:00:00', '2018-04-29 13:03:56', 'Read'),
(119, 'StarCraft 2 : Legacy of the Void', 35.00, 17, '2018-04-25 17:00:00', '2018-04-29 13:03:56', 'Read'),
(120, 'Nier: Automata', 60.00, 11, '2018-04-21 17:00:00', '2018-04-29 13:03:56', 'Read');

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

--
-- Đang đổ dữ liệu cho bảng `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Puzzle', '2018-04-30 06:57:35', '2018-04-30 06:57:36', 'Read'),
(3, 'Action', '2018-04-30 07:01:26', '2018-04-30 07:01:26', 'Read'),
(4, '2 Player', '2018-04-30 07:01:35', '2018-04-30 07:01:35', 'Read'),
(5, 'Strategy', '2018-04-30 07:01:39', '2018-04-30 07:01:39', 'Read'),
(6, 'Sport', '2018-04-30 07:01:44', '2018-04-30 07:01:44', 'Read'),
(7, 'Adventure', '2018-04-30 07:01:50', '2018-04-30 07:01:51', 'Read'),
(8, 'RPG', '2018-04-30 07:01:53', '2018-04-30 07:01:54', 'Read'),
(9, 'Horror', '2018-04-30 07:02:12', '2018-04-30 07:02:12', 'Read'),
(10, 'FPS', '2018-04-30 07:02:20', '2018-04-30 07:02:21', 'Read');

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
(1, 'admin', 'admin@gmail.com', '$2y$10$cDkhQ2zvKjZgsLyiiJGP.e2UyX2BDnIFBpph/TKkSjArWglhoAt9O', 'none', 1000.00, 'admin', NULL, '2018-04-28 11:35:45', '2018-04-29 12:47:34', 'Read', NULL),
(2, 'Po9SfhQxTc', 'GNJttDXxWb@gmail.com', '$2y$10$KTaMqW/22aztue8S6Ro0OuidsI/D9TPqmw3Mq1XyS8rEvms1/HKEu', 'none', 16.54, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(3, 'eb93rqLluD', 'S1y81WVUcq@gmail.com', '$2y$10$O2j/ZsiypZoE/ehV/BGTh.1yUSo4eRv49zmvvtgY1ooEzrEGuJo/S', 'none', 60.17, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(4, 'isjZIO17ry', 'pLv4dEqBbx@gmail.com', '$2y$10$BaCLammmls3eCLVaVXWdPuGjiiTj.wryarQ1fL7EQU.vlH.U2aTwW', 'none', 72.96, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(5, '4GzqMnkEXG', '7HOLPlreo4@gmail.com', '$2y$10$y2kr9PVbT7ETcL4IAwo0tub7/0Ag1nHF3.ZwwJZ/fAyC8jAcqEfju', 'none', 88.17, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(6, 'nhil1odYEW', '1rqQlYaGFk@gmail.com', '$2y$10$bXOsCan03r0.1twfMTpeA.ES5pAHx72q.9O2IXOgDSJ4OQakSzTMK', 'none', 30.30, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(7, 'nTVNEzWEjg', 'WsvTtahtTW@gmail.com', '$2y$10$qofdCDOCaGEdFD.HRbhO9udjDZktm6weC.ygCtRUx/zA7Ov9ARBJS', 'none', 77.71, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(8, 'rRpj8sCros', 'j6gjlcyjEb@gmail.com', '$2y$10$t1An7eb.jGU3qUEAJXtowOjWKRGOITTeRdBleqsySeSNDfON9jata', 'none', 87.42, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(9, 'EVmtBpQ7Wm', 'rVKVU6srr5@gmail.com', '$2y$10$v7lk6g7bvw6Eo/cU6IOHJeM5cg7ZaW9FEdHIrnPd.scN2AuHcRbBq', 'none', 62.45, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(10, 'pxXTPSuj7f', 'zjewmI5bQO@gmail.com', '$2y$10$mjal.AiQ2fAPqcAVXWpDveNUZb2hAB5wp9rFEk2btp8AeRaGkVwXi', 'none', 40.19, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(11, 'UnEBZetXLS', 'Pxj8MrrV4W@gmail.com', '$2y$10$Hxi8OcJ907u11xu20A0jzO1PI5B.AbYTGK4/1BS8MxJCViaAdOySG', 'none', 59.95, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(12, 'dVVIbaCTmM', 'aXocOBYYJu@gmail.com', '$2y$10$ZUkl1L3g8m8h4nw8uzbQBerersDCtm8JxbCQFzfMZOMOK0zXGCmKK', 'none', 68.25, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(13, 'LyvfKi5rAA', 'EKX9n0Zz2m@gmail.com', '$2y$10$Cz6yyHa4FRdAMwWjqC3O4.o6R3se/1o.bv28NP4YwPPe5aQyKR0wO', 'none', 90.45, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(14, 'NLJ4p5RHYC', '7BecsLrNWk@gmail.com', '$2y$10$L16lxnbDX8GWwQGWmqLPSOmGQnjA5o/SCYWhoB/NKFY3agjfE4T0q', 'none', 28.50, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(15, 'TrJDkT8ekL', 'X8UzNtTM2Q@gmail.com', '$2y$10$k8Sh6YE7SOSOB5nI46Fcb.I8WkG6zFXxI4tAp268rohFJGggFMEAi', 'none', 54.04, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(16, 'rMr2I1npmx', 'f8esay1Am8@gmail.com', '$2y$10$PK5qLePYS4vlVFX6ez5rXez/gQVGxQL42ZDOJPT309QKXNRMcImd2', 'none', 57.53, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(17, 'e5Ity1O3s6', 'Qp8oW4CsMl@gmail.com', '$2y$10$R1Vl2ITaI5/V1lQRtrJ8p.JMa1y3l7VF7odagzxwFNf7vIYO5n3lC', 'none', 74.24, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(18, 'DNavhxzREI', 'pYXPolzNjl@gmail.com', '$2y$10$21/MUz/l5/.dPsZfIhJpru3jNam1fXCTuLEoGOxmAGD7bmys87F22', 'none', 72.30, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(19, 'TmdL0ud86p', 'wQQqICNDKg@gmail.com', '$2y$10$.TYCdwH0DZB9fzIZniDVROrewvuPjS0NCXW9OTwG6HgQs8ujcBs1e', 'none', 66.45, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(20, '3Q1INWz0sv', 'WVwRQxuCJM@gmail.com', '$2y$10$G0iS65QHRffxPKeQfBln6eHiErXsSvWtFHSRBTeGs5Er7AYZATncq', 'none', 46.72, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(21, 'bDlgfC8zhm', '51rU9rxhqy@gmail.com', '$2y$10$3C1xZlE/dFr9/s2iGRvW2OY9KbqfMjO2vMQOZYRjT6Scx//ICu25u', 'none', 39.87, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(22, 'qKSKeuOO5t', 'nNRNE1VmzT@gmail.com', '$2y$10$YuJ8CFW0b6AKM24qS8j7wOfFtEqGlVMXzIGtinI6DpKcvv4.RRKVu', 'none', 45.17, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(23, '54M0GfZeAU', 'JCuWEfCogX@gmail.com', '$2y$10$sYyHtwFB4m.N03qBykPZ7.wEalpj4LGIR3uQiL6Tm1MylNMTDr3B.', 'none', 16.60, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(24, 'Gn9ZpVqJyW', 'ejH4IDqm3t@gmail.com', '$2y$10$Bz5mb5hMmfu7DIt0an9LmO2Vc4E0bH6eEDZbX87uNrcUPM5fVS6BO', 'none', 78.64, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(25, 'GPwj3h8Hz2', 'WCeSR3MTi3@gmail.com', '$2y$10$adSJdyzc7peLOqKinjsNNufwBoeoCO5xVMeKjWildquM72f2vAvvO', 'none', 33.45, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(26, 'TZigAkScHG', '3Ug3wUfsMe@gmail.com', '$2y$10$ptgFgHhIzQtv9GoldjqRCeUhyZypZFJegbawJRjWC1ASQsGshJVcC', 'none', 43.40, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(27, 'tzfw8hAtL3', 'Jn6EHRLWra@gmail.com', '$2y$10$/0dytfoHzJjU40rJ4HrOXOJ2AXpWNhdkJIAzJ5hyhkk5KtV13rb.y', 'none', 77.26, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(28, 'eEahcYcNbQ', 'jTRi0gd545@gmail.com', '$2y$10$KcTWYdb8yAvk7IIv0vcEuuxsU/iEME4oB8TIINh7POIVzMJj.JJJ2', 'none', 58.24, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(29, 'WrCq7xix7C', 'U06TIROWIP@gmail.com', '$2y$10$xsvUWfXCe7t7SQudX0Sq8.EVeIcfsnm2raBsslaBst.WYxixBD2ZW', 'none', 36.53, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(30, 'iZG91I4fPD', 'hgzSQwwT7t@gmail.com', '$2y$10$VvCYR8XSeyKE9nA0cCgLdOFJ208H7vLz/ZO/RlUaAhMi1ns8C1W4e', 'none', 86.79, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(31, 'w20HLcAFdY', 'MCsNnB5bO2@gmail.com', '$2y$10$asY3Tsfggi8e.g76ly138Oxe6cjyptEKlDGFc2iY0/769BevajMv6', 'none', 86.03, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(32, 'EcGPDVVZcv', '58eeDz0xPK@gmail.com', '$2y$10$NVhxSc4pRfqIRgy6DmBVXe2.rifk9isezAiobKVmeNNJk2dRPNi12', 'none', 64.66, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(33, 'fHH4xJmDi2', 'TH5vwaJKMD@gmail.com', '$2y$10$byODM6ZN8Ga0vj.pyt/0DuMWxOcTb35vIaaXiheneGhcP.mzbqxRC', 'none', 20.38, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(34, 'X1F8TBMXqN', 'ugQ5L0ktR7@gmail.com', '$2y$10$3s4n9HK3b6o6bs63gLDr.eUJns6AiPQiM8aGhpwhsv.2iryrlp7Rm', 'none', 85.22, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(35, '8gd5MpwmFN', 'cTfWmyvltt@gmail.com', '$2y$10$Rpp/39CQ6D2Sa3WvNX16Ru1RMJKc1jxInjkYCbwmvT3oKxR0jNf8.', 'none', 40.44, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(36, 'OSuk8CXFrL', 'DtCehdkTi2@gmail.com', '$2y$10$kuA7phl5WZKn7hcGcDrME.VC3NHZLQYUxxjmaPx0Jsq5yVs2Bdw7O', 'none', 18.91, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(37, 'oPfeiDHNbm', '8zs7UuIB1c@gmail.com', '$2y$10$bdTADp7.vn.l.CaBZH/JSeHJXbJWLizKlNhZm7r3d7OVkKXLaCGSe', 'none', 88.20, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(38, 'lJdQDuDMsH', 'fSWQ1YYIjQ@gmail.com', '$2y$10$Nn/gKiwGESRUQZEW1e84uua7IMTj2L69bDEDZ53sKZUS186OOwfB.', 'none', 72.99, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(39, 'TqFVHayuSN', 'yslNSSBOI7@gmail.com', '$2y$10$IYJr3WiXXM84msv1w4.KkOrjUpDkZCR0ZpfPAWDjYI2N4LFXtHnv2', 'none', 15.30, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(40, 'actzjsR9hT', 'e6C5iccDpf@gmail.com', '$2y$10$RAkRrkDm2Phxf4ClghMSZebFpEAlTvo0lE.LYZXMMewgj3xPH6Mem', 'none', 50.76, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(41, 'BtxbIjIAbB', 'LaMPm49vbn@gmail.com', '$2y$10$ky3gKcN6xpBVxm.jqmRojuAbxsOOT0.FuOhBmg7J.lYT47Lq2saje', 'none', 81.89, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(42, 'tIh6XxUsqJ', 'CEEu5ahUw3@gmail.com', '$2y$10$rDOEf1CkV7C9tuQ31mHAxOAD90COvJCfDJPRUMQjd58RWliHK/IMK', 'none', 56.30, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(43, 'dX66q9iKNi', 'Czf15Y3kj9@gmail.com', '$2y$10$OqQb/yDmNMPHDMM7bH5GguskQ/rNW6S9eEUPVWSXmi9eAsT49MoqO', 'none', 13.29, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(44, 'AXLkF8BsSg', 'XEaHY6GXGv@gmail.com', '$2y$10$A1WC0XR0Hvcxo9W9kVRN4uUQGcnafb4/D1qZA1vb9Zmw6eQoPLg4W', 'none', 75.07, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(45, 'WlKYn7BKyn', '42aU0efXIn@gmail.com', '$2y$10$LFVqyGKz8NnBhEWszJBBhehLWqpp9hesd9xmjMlGQAaUKgBcq7Id6', 'none', 67.69, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(46, 'OSVf7oHNh4', 'bOFAjST58z@gmail.com', '$2y$10$aVIEzja/m8vHKKsSDqD7vO6V98rDQuEnzP2cTkxLe2Mw5pz18i4TC', 'none', 13.97, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(47, 'sRO5e7yNMM', '4OCVm9Xjhk@gmail.com', '$2y$10$YV05PkdgwUxx9oW7412DC.BveDbgACjoKT7yqzCKdPUV4EM.sqeKW', 'none', 73.12, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(48, '88rrNYU9eZ', 'ptZ4mIAZXI@gmail.com', '$2y$10$UsNELbP1Z2eVvFuINsLut.lr1I6KiJ/yy/tGxAF9PixX0pW3tIfJq', 'none', 32.57, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(49, 'FX4sMDuyif', 'lIImvjfpGb@gmail.com', '$2y$10$0Plcnmsbtx7tdcC9bBOM5ORnDaminMEfPLMd.974jzoAV8oEihA72', 'none', 73.19, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(50, 'KeuOW26DA5', '9L0rYycXOZ@gmail.com', '$2y$10$KJs9EYjiey17N.q0xaN4p.P8mT9gS3uPyN93./DimqzujQeZBuK.S', 'none', 60.92, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(51, 'LRnscv0poL', 'AzNPSkTGwG@gmail.com', '$2y$10$/bXcowm9kvtRQDH915aVheZXoQn3h/gt9uU4euYmRcb6MEk9vUinC', 'none', 64.70, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(52, 'qYczFhphL2', 'Ej3MHN08Hs@gmail.com', '$2y$10$KDNXhMAuWIY8948XsfqlUuQYmuJRJL1kcOcVtWSubjD/T1ez4vkZm', 'none', 24.99, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(53, 'nMmcavSIuJ', 'AAC8b3P2JX@gmail.com', '$2y$10$nJ8pCRngsI1ofLgzywxUSuPbZageru5bpVuuGi1SDZZWcv45GU7nu', 'none', 62.06, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(54, 'Uiwkkc0u08', 'QemiR3nFsO@gmail.com', '$2y$10$XW0b0iCMUhgjNMxWeybt3ehLzsJQANdP6kbeqjGgmSZqnZ7jA0i4m', 'none', 11.20, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(55, 'Q9jYOdNxCy', 'Kxh9vRcikv@gmail.com', '$2y$10$9uGjVS3uD1XMRU.ap3FIIub1Oa724WqkNjJZqrcRyqgFs8xjSjj6W', 'none', 50.26, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(56, 'znly4u6eNI', '3ty89J0swy@gmail.com', '$2y$10$11M5sFs2CBcqWCr4C.wpw.vcc7BvnaGunAfGoJpYXi4ROwW2p93FO', 'none', 63.17, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(57, '5FVmdBhBds', '3fImXtDp4N@gmail.com', '$2y$10$eDNiPpS1t7w35Y10xNUDkeibOwpRAeHzoQTZoqCb./2OOhfxzQz1q', 'none', 65.66, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(58, 'UZhKR9yPot', 'f4RcPiH3SH@gmail.com', '$2y$10$PiOOZ3kaiA.0TCQnd9xHd.QUC.KNUf4qT0sFdoJme7fDOJxZcRybC', 'none', 34.34, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(59, 'PnBBMRWrP1', 'GNjQhGWu7k@gmail.com', '$2y$10$RTVAyL646Pl216QnoLpSzOVI.KiefeG/KrwIQr9DmcluWs6AmzDim', 'none', 40.42, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(60, 'RcX1rPhIFz', 'A5PeER1jM8@gmail.com', '$2y$10$KYVjsPZ2Gw6hRQpogE1XaO7QLPHRgc726J3KecRXD62lvzb613MsO', 'none', 92.50, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(61, 'mfm4yFOnRu', '3TlIAQqXPb@gmail.com', '$2y$10$V9boSzt2MArFaEkbUfGep.AE69/3KqC9B7jJbDUr3SMVWECSzD0za', 'none', 18.88, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(62, 'qAHiXUJlx7', 'cMVsyx3fhf@gmail.com', '$2y$10$kGcfySMxXcmIPSlpn3lLB.WsGH9/SBq41pBL4vw6FpyM7LWd9eU46', 'none', 64.22, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(63, 'Se1jYjPugm', 'RLkWZzhIwy@gmail.com', '$2y$10$/Uz2tTBan6KBrHz.WfUQle941vRzqbnlHvkktXPmfq/1W9apbDT3O', 'none', 98.10, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(64, 'rLrEecbbcQ', 'jUsXOOArLV@gmail.com', '$2y$10$cQEGOeZeCcHrhj4Bm4Qm4OyHLQrV6a7Jyt3KVltfTPI9Xtaw9uBZm', 'none', 64.70, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(65, '8bJPQzT0vX', 'N2er2evsQb@gmail.com', '$2y$10$f//157dxWDC3NyCI2.DVO.qm8lvZPAVqqAJ4UPnb6MrLdeWfOv0pe', 'none', 71.74, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(66, 'eEgZtBfrOM', 'vOv9e5bbk6@gmail.com', '$2y$10$H5GccCUn6ud3sTZ80m4GcuPBD0HvBn84ND4N3PCiaIuoPH466GfiS', 'none', 94.18, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(67, 'T7oxXbKjkN', 'rkFj4u78N2@gmail.com', '$2y$10$ormFlbR2SBzkjSC.UrfPo.mmgcZ20QBiLMHwlSNHcInBQFMCfNcBu', 'none', 83.17, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(68, 'Ej2k4kZaiJ', 'j78Naf771y@gmail.com', '$2y$10$K/iIzcYw1PTC43QeOO5Nbe4VLuvhGBPXgcc23nGDx451Jh6FVqo6S', 'none', 91.89, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(69, 'UVs1YkWEPO', 'BC1FuDK69d@gmail.com', '$2y$10$yKdgWq3dV5YOeQqUdOfB8exlyLOZRNDBwkqOQu6tdWibMSa/4TuZS', 'none', 22.39, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(70, '6QT03ZFw70', 'Hhac258ZRQ@gmail.com', '$2y$10$oHyvIhMSBtGqcrZe2cH5GuKuXK8pZh2aRHVbyzVR8NCFSXCwfX0CG', 'none', 73.08, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(71, 'tzRAJ71J4r', '7E1FxJzsHF@gmail.com', '$2y$10$Ip5WDwtofUZHDmgCDTeu/eaxzpOar9sWEmQeVmFUaLkMJV9aZJX26', 'none', 17.79, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(72, 'dtv17MSx3w', 'kbVVCXvXkh@gmail.com', '$2y$10$7uZQeaRK4FWtxxkiWvz./uSA/w9umaK3pGNv6jZYNirBi/elTLBHm', 'none', 64.43, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(73, '9wLZZWC9cY', 'RYfhbSP6MZ@gmail.com', '$2y$10$CT0XpFMsu7djQdJlRAb51Oy6pWW88SvzKmpgNFs9yUlYa2VmouTSG', 'none', 55.18, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(74, 'x4Y0FH4bxs', 'acPRti8wvY@gmail.com', '$2y$10$0XGdUQKoxXGhKy243el7Je.jj2e33wKbkFzfm4F3zEPLW1y4E/xmG', 'none', 18.35, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(75, '38lTqAS4Zb', 'bPjCOpi3bG@gmail.com', '$2y$10$JzNyuaodJDVEdSkkfjXDPu0oHhwOoeV3MPDOZkmAIyFw/8h1T2AaO', 'none', 88.01, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(76, '1BlyzgoeJq', 'Ej69BW5H76@gmail.com', '$2y$10$/.nX6SW4crcLMM0cjwd39uhZh9xlBsnSIVrObkR2RbfZ5IcIGiUdW', 'none', 21.87, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(77, 'uYHggy5qbK', 'b6nssyKiup@gmail.com', '$2y$10$hvh88vcamvgBa6eIySBjhOpLXfoZ05B40550e2nlWMdceSIPB.YTu', 'none', 29.55, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(78, 'HjOJE6KeDs', 'wHaQ6y1J9M@gmail.com', '$2y$10$dgcy3xgpfk7KroYJ4tT9iOBjO.VW52JyOxy7Po9amFVYUQpelj4ly', 'none', 27.83, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(79, '7pUafpdM5Z', '5hcO5DTPRn@gmail.com', '$2y$10$kXVE.kj5vrdarg7pY8kwW.fuwyVwImYhWlMUgQ421PJACWaYbdWma', 'none', 96.86, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(80, 'v2ZBpxo6Gj', 'gLB8eWK494@gmail.com', '$2y$10$X0PSkT26GGEMo3He3cFuAOPqP1ZPR6.OsT316tLT5RIFt0XKWC8rm', 'none', 40.92, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(81, 'EUkG99GsX5', '2edXGxZdgA@gmail.com', '$2y$10$70Fu3NC3Ml97O5s.qvDFIeeYQleUxGn7qO4qHQPQ8/.XipvElFb7C', 'none', 21.48, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(82, 'MPC81oaPS0', 'BQYME6upYw@gmail.com', '$2y$10$YJ3IW5WWpkQVKP5lpVnB5.iAPebr7uUn/ne7Gtqug3AzApfaMjCvK', 'none', 93.24, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(83, 'ycvsyijXzq', 'EQADrkWU5o@gmail.com', '$2y$10$FuTip15AGgzxi7zEYMzRAuaKmfhCuOKev4VYTonLuWxE0EA3z8lc6', 'none', 92.90, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(84, 'Kl6hxR9wlE', 'IixBlbgH5o@gmail.com', '$2y$10$W3aDkmbUtxUmjfS3puGAoeOPB57M48RBSAqBOHwKxhdtXpX8GyWG.', 'none', 98.90, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(85, 'hb9OqnsbYN', 'b3HXliMns4@gmail.com', '$2y$10$ksWXhX/eYEmAgg7qJc.pxezPtiPghb59jlIrw9FbJxKAr7n/TW7YW', 'none', 63.30, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(86, '4hDFmUI4f4', 'qW3HwwgiJv@gmail.com', '$2y$10$RnMiHW6QIQeN7DwHZa6GM.GyQys4DJNOfKBzGH4Penc6cd2ijp05G', 'none', 54.39, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(87, 'UhHoGNRkqS', 'HlCWpNcgzd@gmail.com', '$2y$10$AJriuqjN.qpVKj.mSvKbLeQbZak6SB.GpAP7Kxvn4e4upDMVHW..W', 'none', 13.98, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(88, 'lNxBm4XnJT', '1u8EyArsmQ@gmail.com', '$2y$10$utBNcw37t.xhtDTspN7UfuEPnCOq2RlDXHj.z9DdhV43BcdYqfxKG', 'none', 16.99, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(89, '4ajuaQXtWK', '2rey3Lx0GU@gmail.com', '$2y$10$oUU81lD3NnMbp1oOaK.QWOeNgffsydVYfkQqzxknLgnuO1O8VKcyG', 'none', 66.66, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(90, 'bjTJIqh3ry', '0VJTcnFXI6@gmail.com', '$2y$10$gREbsC6yrhB2NkRYL3f66.PsSz7kr.WrEwUFRq05FL3wYvC0GmHPK', 'none', 77.49, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(91, 'Rp734LQ0Gm', 'wzcxE8drzc@gmail.com', '$2y$10$06V4FD35TMTJPQX/Squ.MuTjcvXVbi.X6BCfj9IC442tIw0ORdm9W', 'none', 76.46, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(92, 'qRrrFuBez2', '4EiyA0pi2O@gmail.com', '$2y$10$FnoG8GR2JxNU5xCIftamYeQ3LvS2g.UgG8puLJviaW1lV1xHa0xDm', 'none', 51.86, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(93, 'p4Dg9GG0Hs', 'kl3vw1pWqE@gmail.com', '$2y$10$8hK1PmROzkKqRydpTScdC./TsWcyUPIyDd3kW8e8Uk0Gza.ipfWqe', 'none', 30.06, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(94, 'ePEdtLiQaO', 'NubS3I8b1Q@gmail.com', '$2y$10$l0GY5Gp09KGKLY5BLXUScuoX9sNW83T6eHwe/wkrTxkLD4a0oZXj2', 'none', 95.57, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(95, 'gpll6UZL0X', 'uEGChGrDB0@gmail.com', '$2y$10$s19n7qZIpO6gPTK6oojkmu9cLf.iuA/KOISLlDhg7vyELeykLEj4i', 'none', 39.61, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(96, 'w0j8RIUdg3', 'DteeHpxDkC@gmail.com', '$2y$10$Rw84mt/Dex1/LJTNwLKHbupe.oE.fPwe1JF75seAUtCDboVgggqUS', 'none', 74.10, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(97, '0dJf88Vriy', 'VBqmZxKAp3@gmail.com', '$2y$10$EHcsUgzX9NzHwT2Q5mDepe/ZzUV6tqtSiFULxCEfm7j.InGF2uf0.', 'none', 19.62, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(98, 'mGCYK4Cgng', 'D5EU1fqAPH@gmail.com', '$2y$10$ZxH5tGb2lp47pu.TqBm3W.ngAjdrMqmW7XLq5dyjsSCff29E9KKcm', 'none', 18.02, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(99, 'FXs5zCPDXx', 'Lglif5WO5s@gmail.com', '$2y$10$O5qnffobGIDJ/WaZu8qwW.oUSTEUXgcZJr8ePK9vghDCnPWK2TTLe', 'none', 83.32, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(100, 'XAC9jX7XFE', 'ZiI9l1VbYI@gmail.com', '$2y$10$a1IXHzWng2QTr3AD7yHH1OtT6Kjz3xAYxJPkBgka9DuiNRUjhd7Y.', 'none', 21.23, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(101, '4u8yyBcghE', 'qFZZwPB5p7@gmail.com', '$2y$10$mz6iOniHbbXhtjEYHnOhAehft.Q0BM2VTbq1/lzBuESVUqY1Q5.DG', 'none', 37.94, 'casual', NULL, NULL, '2018-04-29 13:01:55', 'Read', NULL),
(102, 'ANCU1e2S1E', 'acsbYviszU@gmail.com', '$2y$10$HZ2/uX0epkemtkcORapsnuycSEgV6XXoOU1tA7wBjYo6fyPLIU8Hi', 'none', 32.72, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(103, '7CGtp7Ird6', 'wvKRHZKGYG@gmail.com', '$2y$10$v03I/Flvvg0TsT60HHHSreGfJlpkem0YbQ4qVcersAGHrkp4vjG9u', 'none', 41.76, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(104, 'gAF69ilWFH', 'wABKg0hbrB@gmail.com', '$2y$10$m34JmCfTawGn8h1WiAMrOeZ8z2okeZLA.7OV4s5/ld5AHx77/kH7y', 'none', 23.83, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(105, 'VYfROSsacC', 'Ti8IU1th3X@gmail.com', '$2y$10$R1RMPgeOUwqsbwaTbxLhnOm9Tp7eo9xavebcVWythdftY3kGGinFi', 'none', 43.72, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(106, 'qgdAn8Lm8Z', '3Sl7tyKvDF@gmail.com', '$2y$10$lFtZdS1JpuGAKPKSjk.rLefN.nJtwPdUT7vU6Ih4ub53odMnBBoD2', 'none', 92.03, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(107, 'tDUOfnoDpe', 'KeX5hBA3j4@gmail.com', '$2y$10$LyWpbCsrKx/ZPoPs1yub0OVBeoh1aoQpLYwVQ7yTEoTyEqzpfw5qi', 'none', 47.85, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(108, 'wnMq557EXE', 'xsTduNEV5j@gmail.com', '$2y$10$va48XYCDc50ZbtEw1ATV0eVPz40bfAuE9FmJaoUe6N9lq5qI4TCbW', 'none', 29.81, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(109, 'vl1Kc5fKmc', 'bbYOqqcyWA@gmail.com', '$2y$10$SMWr/70wEdaUdl8UeA8Bg.xRbRLHImYuCoi9BiZqDor5aTBOLx7Xi', 'none', 36.34, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(110, 'oUhO2p66x6', '5cP5nThAn9@gmail.com', '$2y$10$Ps.H6cYkoK8MAcHCEpGs4u7IDuBrhSUwDiXJMO282y/wgsg7NoywC', 'none', 76.96, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(111, 'mlypsU97wy', 'XxyUMG2zYc@gmail.com', '$2y$10$6eex/QhgCeiyB0VrnhN5oeYu7XhrrjbrOWD6iE.ePwOmRSuK.l6ya', 'none', 18.39, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(112, 'TqvTLbdTvP', 'HV7ChWHuVL@gmail.com', '$2y$10$lCfjXYxGOOzP7SKGTCxVKuTglVOuRCdggHQswxI6Ma9IK6RUr3eQS', 'none', 84.39, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(113, 'Qhyk0zihsW', 'DhkhL44w4S@gmail.com', '$2y$10$MbKXPAvFePvBiiSEo1oSied3kHYKpGBqYK8scAESw6cN03EfB8JbW', 'none', 90.72, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(114, 'QqlVIBDior', 'jPXdnxHoar@gmail.com', '$2y$10$d4M15AMDH99BrAj3D9y9ueGkhpnNB26S2xYWQ1B4ZPlyTn8EsGLXm', 'none', 48.14, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(115, '0b3nxgkiPi', 'vrBkteItKk@gmail.com', '$2y$10$aCvEvr4nV6LypsF/o7CZC.pN0itDct2fm3NnaeLBhEzoCCAgQHoXa', 'none', 75.37, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(116, 'Pojxoxw7oG', 'iY2uYUiHpd@gmail.com', '$2y$10$p0OzDEmUrV5ZAMoizNtQsOhXLvwOKOj0JMeVFxodGeMmO724pL86m', 'none', 34.11, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(117, 'clHWZiYmZd', 'zK5B4XbpL0@gmail.com', '$2y$10$rT4NHX8PJybppjdRatQja.t2dz5uxHNR0PFDhVU18IIGMhaU1IHwa', 'none', 88.11, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(118, 'EVqo9NravD', '3DZzxsvpAx@gmail.com', '$2y$10$l56io.WQVLksWVLbcINR6eE3RKImMw2XVFhZbwZgyJXeIfo37GRru', 'none', 41.04, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(119, 'CQIUgtYWzj', 'nfASIUAhEr@gmail.com', '$2y$10$T4kccz.KGvuJ9hSjO3TxHO4m.uQdC7nJ5eFD6zGaSPYnDBCDQZxDy', 'none', 74.62, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(120, 'b9gSFUTbLJ', 'jxPLRZdjRf@gmail.com', '$2y$10$fUlIQM7DN32rsKvp7P8IDuankAcpfklcRZo4uSeuuS4dkeknZ3F/a', 'none', 30.64, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(121, 'NAI7tT6tB3', 'Y907u51LYO@gmail.com', '$2y$10$PaW2ve//G939RZlHaguAzu82iP4k1Ak2DPV6bTBD/2KCFMBb25WQ6', 'none', 19.12, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(122, 'lPWa0nhwRZ', 'Ukp3rK6gDt@gmail.com', '$2y$10$4KSzGbL4ctW6aaS5TRlWtuq.WMiwgnsHg5SAvm6kztT8SXcuLjIcq', 'none', 27.22, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(123, '3aPn1SDTH5', 'ksfdVQyV4F@gmail.com', '$2y$10$ITQvdAmBWgD9/DN6eD9VNOW1pI5EwCRqpMS.QJkkCVw2v7.3oKpvy', 'none', 28.22, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(124, 'ngPp5XSXbD', 'W4h8TyzQFX@gmail.com', '$2y$10$me4qNufp2Gcj6ea3CQrb1.TdxMFmV/81LpwFEzvZuvZlRov5Elxwq', 'none', 19.09, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(125, 'QICeEdksJc', 'EVUsjr1eEU@gmail.com', '$2y$10$11YhhApBYmI5YsNIkUiPmObtd6nYoJO4I49YDPtMdnCEglZCARqHO', 'none', 39.58, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(126, 'A5DClEoZl6', 'vnZ1g2I1zU@gmail.com', '$2y$10$uRNoOFMZshHy2SwoknT.d.YPTJG7UZG8Rxfv0gT9CLWuJ7Hizb.wS', 'none', 64.20, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(127, 'bh5zcK8ycY', 'TlkGFLQxYL@gmail.com', '$2y$10$PHXcYmr8IMqXEf8Vj8Pd.u7OoJIaS/p0L09/5WvjwIw4HpwDNppay', 'none', 76.44, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(128, 't5EJjXa3DW', 'mBoE6WMjeG@gmail.com', '$2y$10$C.POgpxLEEyEUxTD3LjoCOLX918N2pl6q5NptNCc3/Sid.p20jDDe', 'none', 71.84, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(129, 'RXtcNQRELx', 'mLQ72WHj5Y@gmail.com', '$2y$10$L4kDYemSADGpUtSQE6yerOZJc1c5OXYSmoObMB.ld8vw.NMe/q5ey', 'none', 44.98, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(130, 'JUl7lAj1qt', 'YlgVx75Tx4@gmail.com', '$2y$10$A8plYCnG1VCoV3t4n20mE..d1k26VbXu2r1Jmh7aizHl7xiI26n/q', 'none', 91.85, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(131, 'jlGCW2W4l3', 'CoAmB6gIFu@gmail.com', '$2y$10$PjYXx1zxAthFqzUvNpGzeOPvQ3IGeXlBdCfymaihtQv1znDLuFeQS', 'none', 10.65, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(132, 'tIRpXo8e8g', 'zOKP9GtIP1@gmail.com', '$2y$10$ZUsIjgjW65bpOvTHpb3Rxeq4sgatYMYULebMRSj/QV9cfjg8ozCkq', 'none', 75.84, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(133, 'MjkYDijalk', '7cGeGWqlVo@gmail.com', '$2y$10$.hQ6ais8AbaDFYxM5LDgrOS0ZgzsRK08mlaTGslYIyT71wwzQNr1W', 'none', 91.68, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(134, 'vU5JSsdHMC', 'CvhSXzV3eu@gmail.com', '$2y$10$xRdyBnv2Xv1sHbmDF8NB3u28/qJXCeKjJQshf.7XeO3Y46cmcmxMe', 'none', 88.93, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(135, 'xqWBhgthUM', 'igAGmqvIaP@gmail.com', '$2y$10$DOwDZ/yHaNFpuG.IB/yubuYhKwroQqLUxxCIrdAAnYcHXpgfgZlb2', 'none', 50.61, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(136, 'm3yavryK8Y', 'bVENYo7vqD@gmail.com', '$2y$10$wYnZFMYBEV.WeKmUTS8KZ.AKYZlHUSgRes4SiIHZlQYMtHjsJupD6', 'none', 58.84, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(137, 'RHhxwTtqHV', 'JGyuyKpv1f@gmail.com', '$2y$10$CYocy2LCR5oAUzKMxHEtdOGbcH940Qq9kJucl7jm9pwF9s5LTNCbS', 'none', 61.00, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(138, '64kpLZUoiH', '1JmPvOzvTM@gmail.com', '$2y$10$JHN6O6u5gZKjTgftwN6JeuZ3C/zMgOOUB7KDzWTTBf7wh4YoIdbb.', 'none', 50.51, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(139, 'dCDxP0xvWR', 'PXTJ7AGrMe@gmail.com', '$2y$10$NTSaJ.ddqEtuZ7xN1/kgJu6NkJxq6gRV2sSYC2ybEUObHDhguf5y2', 'none', 92.35, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(140, 'YXjoi1jpJG', '994xbmkPvy@gmail.com', '$2y$10$gWQ..bFllci9cTpY7YP0uetV4FjTxYtQUy0b..6/NBsbhUopW.2NO', 'none', 63.61, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(141, 'jdopeoxgfQ', '9kjcV2OqsP@gmail.com', '$2y$10$drQetmmSbcfB9ZmKK7cVnO0yd.fqL7b7nmZVpNaVJvZNwucFSqpWq', 'none', 16.81, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(142, '1UrkDRzXpY', '6gBEcjeIZB@gmail.com', '$2y$10$TQTn32htO2hbUdxh90scdeuc2m0xbgI90TxySppE18PCUqUdDfJcW', 'none', 23.60, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(143, 'LORC2ywpOg', 'CzXb1OP6La@gmail.com', '$2y$10$SGlWtAfVzwGNECQ758Nqf.d9dV8qiaKmWJfzSnPIX5RB8AeHGHO8G', 'none', 47.60, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(144, 'uhZpoJRwHF', 'eEXtZDVOYs@gmail.com', '$2y$10$nnCk6H/HwRErK/rUu5Vk7./CudMkRzDA1RYOVXunDbcm0TTUOIUd2', 'none', 90.87, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(145, 'Totz7n5zr8', 'PGnZZWytCz@gmail.com', '$2y$10$d1Y7tn73txea4jMe6lykH.d263r5MXyIhX04PTnI9E3/kc/L7g3Oe', 'none', 11.11, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(146, 'iiHkU4Q6rC', 'hT0837NKco@gmail.com', '$2y$10$2PQfwwG3zyWkSdsm.sxKDeIG5VZ3nvXmxGd5IsQ9bDQF1f0.FHUj.', 'none', 17.67, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(147, 'qCsDck5MEU', 'AO9Y5lscK7@gmail.com', '$2y$10$exzdjCbURCtvn7d1Td0OXeMmshXxbWnH3CR3.mqFiliKZ3X2YvYaa', 'none', 52.76, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(148, 'jnJG1h8bTU', '3brDIn4Evj@gmail.com', '$2y$10$6o6j2m1AtCnSoocsJLmlquoqHLyLoCaNpE/N7/3MnGRHf6hO1uEeK', 'none', 81.23, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(149, '41ehSRYSaz', 'xcxWwxfuld@gmail.com', '$2y$10$QvbhbcZ/TND93f0ONYPwEuZsqUzFeT7Zml/HjEUWd6H880qSke68i', 'none', 60.46, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(150, '6qHb1bmadp', '3U9W2Bmhva@gmail.com', '$2y$10$.6V3CYvuUvUQDdENUpuTm.NLXSS6VU7yIxuaEdM4XwLXzxM3RRLsy', 'none', 25.01, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL),
(151, 'UtF5AqBGxN', 'DrgyyZ4NrL@gmail.com', '$2y$10$iebR0P9XEa5v8Xr1kUCQIu26uh8PRkZgz/XLZZxjYzuUrJBwvskk6', 'none', 28.39, 'casual', NULL, NULL, '2018-04-29 13:03:58', 'Read', NULL);

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
-- Đang đổ dữ liệu cho bảng `wallet_history`
--

INSERT INTO `wallet_history` (`id`, `user_id`, `amount`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 1000.00, '2018-04-29 12:49:12', '2018-04-29 13:01:54', 'Read');

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
-- Chỉ mục cho bảng `notification`
--
ALTER TABLE `notification`
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
-- AUTO_INCREMENT cho bảng `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `report`
--
ALTER TABLE `report`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `sales_log`
--
ALTER TABLE `sales_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT cho bảng `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT cho bảng `wallet_history`
--
ALTER TABLE `wallet_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
