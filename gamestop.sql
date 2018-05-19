-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2018 at 12:04 PM
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
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `game_title` varchar(191) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `title` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avg_rating` double(3,2) NOT NULL DEFAULT '0.00',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `release` smallint(5) UNSIGNED NOT NULL,
  `link` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'khongCoImage_game.jpg',
  `upload_by` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(6,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `sales` decimal(6,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `approved` enum('N','Y') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`title`, `slug`, `avg_rating`, `description`, `release`, `link`, `image`, `upload_by`, `price`, `sales`, `created_at`, `updated_at`, `approved`) VALUES
('Batman™: Arkham Knight', 'batman-arkham-knight', 0.00, '<p>Batman&trade;: Arkham Knight brings the award-winning Arkham trilogy from Rocksteady Studios to its epic conclusion. Developed exclusively for New-Gen platforms, Batman: Arkham Knight introduces Rocksteady&#39;s uniquely designed version of the Batmobile. The highly anticipated addition of this legendary vehicle, combined with the acclaimed gameplay of the Arkham series, offers gamers the ultimate and complete Batman experience as they tear through the streets and soar across the skyline of the entirety of Gotham City. In this explosive finale, Batman faces the ultimate threat against the city that he is sworn to protect, as Scarecrow returns to unite the super criminals of Gotham and destroy the Batman forever.</p>\r\n\r\n<h2>Product Features:</h2>\r\n\r\n<ul>\r\n	<li>&ldquo;Be The Batman&rdquo; &ndash; Live the complete Batman experience as the Dark Knight enters the concluding chapter of Rocksteady&rsquo;s Arkham trilogy. Players will become The World&rsquo;s Greatest Detective like never before with the introduction of the Batmobile and enhancements to signature features such as FreeFlow Combat, stealth, forensics and navigation.&nbsp;<br />\r\n	&nbsp;</li>\r\n	<li>Introducing the Batmobile &ndash; The Batmobile is brought to life with a completely new and original design featuring a distinct visual appearance and a full range of on-board high-tech gadgetry. Designed to be fully drivable throughout the game world and capable of transformation from high speed pursuit mode to military grade battle mode, this legendary vehicle sits at the heart of the game&rsquo;s design and allows players to tear through the streets at incredible speeds in pursuit of Gotham City&rsquo;s most dangerous villains. This iconic vehicle also augments Batman&rsquo;s abilities in every respect, from navigation and forensics to combat and puzzle solving creating a genuine and seamless sense of the union of man and machine.<br />\r\n	&nbsp;</li>\r\n	<li>The Epic Conclusion to Rocksteady&rsquo;s Arkham Trilogy &ndash; Batman: Arkham Knight brings all-out war to Gotham City. The hit-and-run skirmishes of Batman: Arkham Asylum, which escalated into the devastating conspiracy against the inmates in Batman: Arkham City, culminates in the ultimate showdown for the future of Gotham. At the mercy of Scarecrow, the fate of the city hangs in the balance as he is joined by the Arkham Knight, a completely new and original character in the Batman universe, as well as a huge roster of other infamous villains including Harley Quinn, The Penguin, Two-Face and the Riddler.&nbsp;<br />\r\n	&nbsp;</li>\r\n	<li>Explore the entirety of Gotham City &ndash; For the first time, players have the opportunity to explore all of Gotham City in a completely open and free-roaming game world. More than five times that of Batman: Arkham City, Gotham City has been brought to life with the same level of intimate, hand-crafted attention to detail for which the Arkham games are known.&nbsp;<br />\r\n	&nbsp;</li>\r\n	<li>Most Wanted Side Missions &ndash; Players can fully immerse themselves in the chaos that is erupting in the streets of Gotham. Encounters with high-profile criminal masterminds are guaranteed while also offering gamers the opportunity to focus on and takedown individual villains or pursue the core narrative path.&nbsp;<br />\r\n	&nbsp;</li>\r\n	<li>New Combat and Gadget Features &ndash; Gamers have at their disposal more combat moves and high-tech gadgetry than ever before. The new &lsquo;gadgets while gliding&rsquo; ability allows Batman to deploy gadgets such as batarangs, the grapnel gun or the line launcher mid-glide while Batman&rsquo;s utility belt is once again upgraded to include all new gadgets that expand his range of forensic investigation, stealth incursion and combat skills.</li>\r\n</ul>', 2015, 'https://store.steampowered.com/app/208650/', 'khongCoImage_game.jpg', 'Rocksteady Studios', '10.00', '0.00', '2018-05-19 09:58:24', '2018-05-19 09:59:03', 'Y'),
('HITMAN™', 'hitman', 0.00, '<p>Experiment and have fun in the ultimate playground as Agent 47 to become the master assassin. Travel around the globe to exotic locations and eliminate your targets with everything from a katana or a sniper rifle to an exploding golf ball or some expired spaghetti sauce.<br />\r\n<br />\r\nThe HITMAN - Game of The Year Edition includes:<br />\r\n<br />\r\n- All missions &amp; locations from the award-winning first season of HITMAN<br />\r\n- &quot;Patient Zero&quot; Bonus campaign&nbsp;<br />\r\n- 3 new Themed Escalation Contracts<br />\r\n- 3 new Outfits<br />\r\n- 3 new Weapons</p>', 2016, 'https://store.steampowered.com/app/236870/', 'khongCoImage_game.jpg', 'Square Enix', '60.00', '0.00', '2018-05-19 10:00:41', '2018-05-19 10:02:39', 'Y'),
('PAYDAY 2', 'payday-2', 0.00, '<p><strong>PAYDAY 2: VR is now available!</strong><br />\r\nTo activate VR mode please download this free DLC:&nbsp;<a href=\"steam://openurl/http://store.steampowered.com/app/826090/PAYDAY_2_VR/\">PAYDAY 2: VR</a><br />\r\n<br />\r\nPAYDAY 2 is an action-packed, four-player co-op shooter that once again lets gamers don the masks of the original PAYDAY crew - Dallas, Hoxton, Wolf and Chains - as they descend on Washington DC for an epic crime spree.&nbsp;<br />\r\n<br />\r\nThe new CRIMENET network offers a huge range of dynamic contracts, and players are free to choose anything from small-time convenience store hits or kidnappings, to big league cyber-crime or emptying out major bank vaults for that epic PAYDAY. While in DC, why not participate in the local community, and run a few political errands?<br />\r\n<br />\r\nUp to four friends co-operate on the hits, and as the crew progresses the jobs become bigger, better and more rewarding. Along with earning more money and becoming a legendary criminal comes a new character customization and crafting system that lets crews build and customize their own guns and gear.</p>\r\n\r\n<h2>Key Features</h2>\r\n\r\n<ul>\r\n	<li>Rob Banks, Get Paid &ndash; Players must choose their crew carefully, because when the job goes down they will need the right mix of skills on their side.</li>\r\n	<li>CRIMENET &ndash; The dynamic contract database lets gamers pick and choose from available jobs by connecting with local contacts such as Vlad the Ukrainian, shady politician &quot;The Elephant&quot;, and South American drug trafficker Hector, all with their own agenda and best interests in mind.</li>\r\n	<li>PAYDAY Gun Play and Mechanics on a New Level &ndash; Firing weapons and zip tying civilians never felt so good.</li>\r\n	<li>Dynamic Scenarios &ndash; No heist ever plays out the same way twice. Every single scenario has random geometry or even rare events.</li>\r\n	<li>Choose Your Skills &ndash; As players progress they can invest in any of five special Skill Trees: Mastermind, Enforcer, Ghost, Technician and Fugitive. Each features a deep customization tree of associated skills and equipment to master, and they can be mixed and matched to create the ultimate heister.</li>\r\n	<li>More Masks than Ever &ndash; PAYDAY 2 features a completely new mask system, giving players the ability to craft their own unique mask together with a pattern and a color combination, resulting in millions of different combinations.&nbsp;</li>\r\n	<li>Weapons and Modifications &ndash; A brand new arsenal for the serious heister, covering everything from sniper and assault rifles to compact PDWs and SMGs. Once you&#39;ve settled for a favorite, you can modify it with optics, suppressors, fore grips, reticles, barrels, frames, stocks and more, all of which will affect the performance of your weapon. There are also purely aesthetic enhancements - why not go for the drug lord look with polished walnut grips for your nine?</li>\r\n	<li>Play It Your Way &ndash; Each job allows for multiple approaches, such as slow and stealthy ambushes, to running in guns blazing. Hit the target any way you want, and watch as the heist unfolds accordingly.</li>\r\n	<li>New Game Content All the Time &ndash; More than 70 updates since release and still going strong with new heists, characters, weapons and other gameplay features like driving cars and forklifts. Every month offers new free content and paid DLC as PAYDAY 2 continues to be developed by the OVERKILL crew until at least 2017.</li>\r\n</ul>', 2012, 'https://store.steampowered.com/app/218620/', 'khongCoImage_game.jpg', 'OVERKILL', '6.00', '0.00', '2018-05-19 10:02:17', '2018-05-19 10:02:37', 'Y'),
('The Witcher 3: Wild Hunt', 'the-witcher-3-wild-hunt', 0.00, '<p>The Witcher: Wild Hunt is a story-driven, next-generation open world role-playing game set in a visually stunning fantasy universe full of meaningful choices and impactful consequences. In The Witcher you play as the professional monster hunter, Geralt of Rivia, tasked with finding a child of prophecy in a vast open world rich with merchant cities, viking pirate islands, dangerous mountain passes, and forgotten caverns to explore.<br />\r\n<br />\r\n<strong>PLAY AS A HIGHLY TRAINED MONSTER SLAYER FOR HIRE</strong><br />\r\nTrained from early childhood and mutated to gain superhuman skills, strength and reflexes, witchers are a distrusted counterbalance to the monster-infested world in which they live.</p>\r\n\r\n<ul>\r\n	<li>Gruesomely destroy foes as a professional monster hunter armed with a range of upgradeable weapons, mutating potions and combat magic.</li>\r\n	<li>Hunt down a wide range of exotic monsters from savage beasts prowling the mountain passes to cunning supernatural predators lurking in the shadows of densely populated towns.</li>\r\n	<li>Invest your rewards to upgrade your weaponry and buy custom armour, or spend them away in horse races, card games, fist fighting, and other pleasures the night brings.</li>\r\n</ul>\r\n\r\n<p><br />\r\n<strong>EXPLORE A MORALLY INDIFFERENT FANTASY OPEN WORLD</strong><br />\r\nBuilt for endless adventure, the massive open world of The&nbsp; Witcher sets new standards in terms of size, depth and complexity.</p>\r\n\r\n<ul>\r\n	<li>Traverse a fantastical open world: explore forgotten ruins, caves and shipwrecks, trade with merchants and dwarven smiths in cities, and hunt across the open plains, mountains and seas.</li>\r\n	<li>Deal with treasonous generals, devious witches and corrupt royalty to provide dark and dangerous services.</li>\r\n	<li>Make choices that go beyond good &amp; evil, and face their far-reaching consequences.</li>\r\n</ul>\r\n\r\n<p><br />\r\n<strong>CHASE DOWN THE CHILD OF PROPHECY</strong><br />\r\nTake on the most important contract to track down the child of prophecy, a key to save or destroy this world.</p>\r\n\r\n<ul>\r\n	<li>In times of war, chase down the child of prophecy, a living weapon of power, foretold by ancient elven legends.</li>\r\n	<li>Struggle against ferocious rulers, spirits of the wilds and even a threat from beyond the veil &ndash; all hell-bent on controlling this world.</li>\r\n	<li>Define your destiny in a world that may not be worth saving.</li>\r\n</ul>\r\n\r\n<p><br />\r\n<strong>FULLY REALIZED NEXT GENERATION</strong></p>\r\n\r\n<ul>\r\n	<li>Built exclusively for next generation hardware, the REDengine&nbsp;3 renders the world of The Witcher visually nuanced and organic, a real true to life fantasy.</li>\r\n	<li>Dynamic weather systems and day/night cycles affect how the citizens of the towns and the monsters of the wilds behave.</li>\r\n	<li>Rich with storyline choices in both main and subplots, this grand open world is influenced by the player unlike ever before.</li>\r\n</ul>', 2015, 'https://store.steampowered.com/app/292030/The_Witcher_3_Wild_Hunt/', 'khongCoImage_game.jpg', 'CD Projekt Red', '20.00', '0.00', '2018-05-19 09:50:42', '2018-05-19 09:50:42', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `games_tags`
--

CREATE TABLE `games_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `games_title` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `tags_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2018_03_26_060538_create_games_table', 1),
(6, '2018_04_04_142926_create_sales_log_table', 1),
(7, '2018_04_07_082712_create_tag_table', 1),
(8, '2018_04_07_084539_create_games_tags_table', 1),
(9, '2018_04_08_095145_create_report_table', 1),
(10, '2018_04_08_113430_create_favorites_table', 1),
(11, '2018_04_08_151042_create_rating_table', 1),
(12, '2018_04_28_090517_wallet_history_table', 1),
(13, '2018_04_30_141238_create_notification_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('gobanme.pierro@gmail.com', '$2y$10$VN7CyYCLRQrVGdze1Wb6TeRT6cuHA.GcWonIQqhCMTHLf8Hha98RG', '2018-05-18 10:37:20');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(10) UNSIGNED NOT NULL,
  `game_title` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `rating` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(10) UNSIGNED NOT NULL,
  `upload_by` int(10) UNSIGNED NOT NULL,
  `game_title` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales_log`
--

CREATE TABLE `sales_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `game_title` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `price` decimal(6,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sales_log`
--

INSERT INTO `sales_log` (`id`, `game_title`, `user_id`, `price`, `created_at`, `updated_at`) VALUES
(14, 'The Witcher 3: Wild Hunt', 5, '0.00', '2018-05-19 09:50:42', '2018-05-19 09:50:42'),
(15, 'Batman™: Arkham Knight', 5, '0.00', '2018-05-19 09:58:24', '2018-05-19 09:58:24'),
(16, 'HITMAN™', 5, '0.00', '2018-05-19 10:00:41', '2018-05-19 10:00:41'),
(17, 'PAYDAY 2', 5, '0.00', '2018-05-19 10:02:17', '2018-05-19 10:02:17');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(5, 'action', '2018-05-17 15:29:30', '2018-05-17 15:29:30'),
(6, 'asdcxzkl', '2018-05-17 20:01:35', '2018-05-17 20:01:35'),
(7, 'fps', '2018-05-17 20:01:39', '2018-05-17 20:01:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'khongCoImage.jpg',
  `wallet` decimal(6,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `description` mediumtext COLLATE utf8_unicode_ci,
  `auth_level` enum('ban','admin','developer','casual') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'casual',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `avatar`, `wallet`, `description`, `auth_level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$rtrJqW/1pdCDO9KS5e0CC.RUnudW4RBeCDdtqgivjyjbwy1mCFUM2', 'khongCoImage.jpg', '2000.00', NULL, 'admin', 'zX3EwVWrJcfC2ONGfU3SeArGvyAFH9Si07bK03gd0iQnfsSa1vwttlMZwa4G', '2018-05-12 06:58:36', '2018-05-12 06:58:36'),
(2, 'user', 'user@gmail.com', '$2y$10$gNIyTinvlIhKWsgEbe/CceiBLYM6Fgf8cMzlC7ZG283/jz1FmYh2O', 'khongCoImage.jpg', '9964.99', NULL, 'admin', 'kDBrDQreU4UYxCSn5kQ66u1OzclSJMlFPWQX2AavhvWBqDWeK3CKPs8JR8XN', '2018-05-12 10:17:42', '2018-05-12 10:17:42'),
(3, 'user2', 'user2@gmail.com', '$2y$10$cnDKwQrw1zrL32vT4RguXuKvA877DJbu1hKLCLnHCHgTwZEvul4ZG', 'khongCoImage.jpg', '4207.00', NULL, 'casual', 'JddqVknDCZljwsYtsCEcf5Bl6UqA9IZASb6FOOw6SsXletKAN3VOaPIKE6dI', '2018-05-12 11:05:33', '2018-05-12 11:05:33'),
(4, 'user3', 'user3@gmail.com', '$2y$10$CGeBvTmZYFilPFVn06tMNO2z/hj5l/lQpYSU.IbV29d8mW89iauvS', 'khongCoImage.jpg', '2138.00', NULL, 'casual', NULL, '2018-05-12 11:11:06', '2018-05-12 11:11:06'),
(5, 'hieu2102', 'gobanme.pierro@gmail.com', '$2y$10$hK.NDRjWp/lbtoAIfgPVR.ChwEcLrcKmWNWytrVi5vKbyLupre25.', 'Untitled_1526622948.png', '9999.99', NULL, 'admin', 'fIkDiYsOFI4h1noS2yAwcADJYtIf3LxSOxoXc6aucPaxIwYWbPhl3dogWRsX', '2018-05-17 14:38:53', '2018-05-18 05:55:48'),
(6, 'CD Projekt Red', 'q@gmail.com', '$2y$10$/uT5UV2Wa/DysiVVYicgFO5J6m1vwEAJjO0bcravKZ6gIrDPyll1S', 'khongCoImage.jpg', '0.00', NULL, 'developer', 'I1I5i87pAcSzsIKX5o461U2iUqOpOvFsWpAhIWL8VEHl6GMz0nRfjVzmh2DS', '2018-05-19 09:52:27', '2018-05-19 09:52:27');

-- --------------------------------------------------------

--
-- Table structure for table `wallet_history`
--

CREATE TABLE `wallet_history` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `amount` decimal(6,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wallet_history`
--

INSERT INTO `wallet_history` (`id`, `user_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, '2000.00', '2018-05-12 10:12:21', NULL),
(2, 2, '9999.99', '2018-05-12 10:17:47', NULL),
(3, 3, '4242.00', '2018-05-12 11:05:37', NULL),
(4, 4, '2143.00', '2018-05-12 11:11:10', NULL),
(5, 5, '9999.99', '2018-05-17 15:58:11', NULL),
(6, 5, '9999.99', '2018-05-17 15:58:13', NULL),
(7, 5, '9999.99', '2018-05-17 22:12:13', NULL),
(8, 5, '9999.99', '2018-05-18 02:12:26', NULL),
(9, 5, '9999.99', '2018-05-18 05:26:05', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorites_game_title_foreign` (`game_title`),
  ADD KEY `favorites_user_id_foreign` (`user_id`);

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
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notification_admin_id_foreign` (`admin_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `report_game_title_unique` (`game_title`),
  ADD KEY `report_upload_by_foreign` (`upload_by`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_name_unique` (`name`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wallet_history`
--
ALTER TABLE `wallet_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wallet_history_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `games_tags`
--
ALTER TABLE `games_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales_log`
--
ALTER TABLE `sales_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wallet_history`
--
ALTER TABLE `wallet_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_game_title_foreign` FOREIGN KEY (`game_title`) REFERENCES `games` (`title`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `games_tags`
--
ALTER TABLE `games_tags`
  ADD CONSTRAINT `games_tags_games_title_foreign` FOREIGN KEY (`games_title`) REFERENCES `games` (`title`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `games_tags_tags_id_foreign` FOREIGN KEY (`tags_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_game_title_foreign` FOREIGN KEY (`game_title`) REFERENCES `games` (`title`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_game_title_foreign` FOREIGN KEY (`game_title`) REFERENCES `games` (`title`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `report_upload_by_foreign` FOREIGN KEY (`upload_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales_log`
--
ALTER TABLE `sales_log`
  ADD CONSTRAINT `sales_log_game_title_foreign` FOREIGN KEY (`game_title`) REFERENCES `games` (`title`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_log_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wallet_history`
--
ALTER TABLE `wallet_history`
  ADD CONSTRAINT `wallet_history_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
