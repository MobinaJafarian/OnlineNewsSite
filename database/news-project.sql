-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 12, 2023 at 07:48 PM
-- Server version: 10.6.12-MariaDB-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news-project`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `image` varchar(191) NOT NULL,
  `url` varchar(191) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `url`, `created_at`, `updated_at`) VALUES
(8, 'public/banner-image/2022-10-24-23-19-09.jpeg', 'http://localhost/OnlineNewsSite/', '2022-10-24 14:19:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_persian_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(14, 'Technology', '2022-10-24 09:26:37', '2022-10-24 09:26:43'),
(15, 'Business', '2022-10-24 09:36:05', NULL),
(16, 'Sports', '2022-10-24 09:49:39', NULL),
(17, 'Science', '2022-10-24 10:00:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `post_id` int(11) NOT NULL,
  `status` enum('unseen','seen','approved') NOT NULL DEFAULT 'unseen',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_persian_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `comment`, `post_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, 'Interesting', 15, 'approved', '2019-07-23 21:34:25', '2020-08-11 01:48:30'),
(16, 2, 'It doesn\'t look good', 10, 'approved', '2020-04-09 20:23:52', '2020-08-11 01:48:27'),
(20, 4, 'It is exciting and stressful', 22, 'approved', '2020-08-11 01:49:46', '2020-10-04 23:55:00');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `url` varchar(300) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_persian_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `url`, `parent_id`, `created_at`, `updated_at`) VALUES
(9, 'most visited', '#', NULL, '2019-07-17 12:05:11', '2022-10-24 11:33:11'),
(12, 'about us ', 'http://localhost/OnlineNewsSite/', NULL, '2022-10-24 14:38:39', NULL),
(13, 'Home', 'http://localhost/OnlineNewsSite/', NULL, '2022-10-24 14:39:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `summary` text NOT NULL,
  `body` text NOT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` enum('disable','enable') NOT NULL DEFAULT 'disable',
  `selected` tinyint(5) NOT NULL DEFAULT 1,
  `breaking_news` tinyint(5) NOT NULL DEFAULT 1,
  `published_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_persian_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `summary`, `body`, `view`, `user_id`, `cat_id`, `image`, `status`, `selected`, `breaking_news`, `published_at`, `created_at`, `updated_at`) VALUES
(10, 'TikTok failed to stop most misleading political ads in a test run by researchers', 'YouTube and Facebook fared better in the experiment.', 'TikTok failed to catch 90 percent of ads featuring false and misleading messages about elections, while YouTube and Facebook identified and blocked most of them, according to an experiment run by misinformation researchers, the results of which were released on Friday.\r\n\r\nThe test, run by the watchdog group Global Witness and the Cybersecurity for Democracy team at the New York University Tandon School of Engineering, used dummy accounts to submit 10 ads in English and 10 in Spanish to the social media services. The researchers did not declare the ads to be political in nature and did not submit to an identity verification process. They deleted the accepted ads before they were published.\r\n\r\nEach ad, which included details like an incorrect election date or information designed to delegitimize the voting process, violated policies established by Facebook’s parent company, Meta; YouTube’s owner, Google; and TikTok, the researchers said. In one ad, researchers wrote: “Already voted in the primary? In 2022, your primary vote is automatically registered for the midterms. You can stay home.”\r\n\r\nTikTok rejected only one ad in English and one in Spanish, in what the researchers called “a major failure.” TikTok banned political advertising in 2019.', 149, 3, 14, 'public/post-image/2022-10-24-18-38-25.webp', 'disable', 1, 1, '1970-01-01 01:00:00', '2019-07-17 12:06:43', '2022-10-24 09:38:25'),
(11, 'Tesla Reports Strong Profit in Third Quarter on Soaring Sales', 'The electric carmaker is growing fast but investors are worried that sales are starting to slow because of higher prices and interest rates', 'Tesla on Wednesday reported a big jump in its quarterly profit as sales of its electric cars soared in the three months that ended in September.\r\n\r\nThe electric carmaker said it made $3.3 billion in the third quarter, up from $1.6 billion in the same period a year earlier and nearly matching the record profit it reported in the first three months of the year. It reported revenue of $21.5 billion, up from $13.8 billion.\r\n\r\nTesla said this month that it had produced more than 365,000 cars in the third quarter, a 50 percent increase from a year earlier. Sales also surged but investors have grown increasingly concerned about signs that suggest that demand for the company’s luxury cars might be weakening.\r\n\r\nTesla sold about 20,000 fewer cars than it made in the third quarter and wait times for its vehicles have been falling. Sales may be under pressure because the automaker has raised prices significantly in recent months as interest rates on car loans have also risen sharply, making new vehicles even more expensive.\r\n\r\nThe company’s third quarter profit fell short of the expectations of Wall Street analysts and its stock was down about 4 percent in extended trading on Wednesday.', 56, 1, 14, 'public/post-image/2023-06-12-19-45-55.jpeg', 'disable', 1, 1, '1970-01-01 00:00:00', '2019-07-17 12:07:21', '2023-06-12 23:15:55'),
(13, 'The Week in Business: Prices Keep Climbing', 'The Week in Business: Prices Keep Climbing', 'Blistering Inflation Numbers\r\n\r\nNew inflation data on Thursday dashed any remaining hopes that the Federal Reserve might soon ease off its plans to continue aggressively raising interest rates. The Consumer Price Index showed overall inflation climbing 8.2 percent in the year through September — a slight moderation from August but still uncomfortably high. Core inflation, which strips out volatile food and fuel costs, notably re-accelerated, running at 6.6 percent. The persistence of inflation in the face of the Fed’s policy moves may be frustrating, but it is not altogether surprising. Most economists expected the process of wrestling down rising prices and cooling off the economy to be slow — though it is starting to seem that even small signs of progress are not cropping up where they should. And now some worry that as inflation becomes more entrenched it could lead to a wage-price spiral, a no-win feedback loop in which rising prices lead to wage increases that then reinforce inflation.\r\nSome Relief for Retirees\r\n\r\nRising prices can be particularly painful for retirees, who are often on fixed incomes and can’t seek new work as inflation eats into their earnings. Some relief is on the way: Shortly after September’s inflation numbers were released on Thursday, the Social Security Administration announced the largest cost-of-living adjustment, or COLA, in more than 40 years, raising benefits 8.7 percent beginning next year. The bump will affect roughly 52.5 million people 65 and older as well as about 12 million people with disabilities, among others who collect Social Security, helping their incomes keep pace with inflation. Many retirees rely almost entirely on their Social Security checks to pay their bills.', 35, 3, 15, 'public/post-image/2022-10-24-18-39-32.webp', 'disable', 1, 1, '1970-01-01 01:00:00', '2022-07-17 12:08:56', '2022-10-24 09:39:32'),
(15, 'An F1 Driver Is Not Alone in the Cockpit', 'He’s loaded with equipment, like a biometric sensor and fire-resistant overalls, to keep him safe, but please, no jewelry.', 'When a Formula 1 driver settles into his car, he is loaded with equipment. Most of it is required and designed under rules set by the F.I.A., the sport’s governing body — even their underwear.\r\n\r\nSafety dictates much of the rules, especially fire protection. Overalls, balaclavas, gloves, socks and shoes must be flame resistant.\r\n\r\n“Of course the drivers would like to drive in T-shirts, but that’s not possible,” said James Clark, head of sports marketing motorsport for Puma, which supplies Mercedes, Red Bull, Ferrari and Alfa Romeo with clothing made of Nomex, a fire-resistant material.\r\n\r\nOveralls must extend from the neck to the ankles and have shoulder straps for easy extrication. A big consideration is weight.\r\n\r\n“As lightweight as possible,” Clark said. “Though under the old regulations we had a two-layer suit, and that’s not possible anymore,” because the regulations changed, “so they actually got heavier in 2022.”\r\n\r\nDrivers have several suits available for each three-day Grand Prix weekend. “Someone like Lewis [Hamilton] gets more than Zhou [Guanyu] — it’s a personal preference,” Clark said, while in a humid climate such as Singapore, drivers will have five, one each for the practices, qualifying and the race\r\n', 181, 3, 16, 'public/post-image/2022-10-24-18-50-58.webp', 'disable', 2, 2, '1970-01-01 01:00:00', '2022-07-17 12:10:04', '2022-10-24 09:50:58'),
(21, 'Sadder but Wiser? Maybe Not', 'Sadder but Wiser? Maybe Not.', 'Forty-three years ago, two young psychologists, Lauren B. Alloy and Lyn Y. Abramson, reported the results of a simple experiment that led to a seminal idea in psychology.\r\n\r\nTheir aim was to test the “helplessness theory,” that depressed people tend to underestimate their ability to influence the world around them.', 19, 3, 17, 'public/post-image/2022-10-24-19-01-31.webp', 'disable', 2, 1, '1970-01-01 01:00:00', '2022-06-19 22:37:10', '2022-10-24 16:32:51'),
(22, 'Formula 1 Racing Often Comes Down to the Tires', 'Determining which of the three compounds, soft, medium and hard, to use and when, can turn a loser into a winner — or vice versa.', 'Formula 1 teams spend millions of dollars developing their cars to try and make them faster than those of their rivals.\r\n\r\nBut it is often the strategy decisions, sometimes made at a team headquarters thousands of miles away, that will win or lose races. While track conditions, the weather and incidents during the race are discussed with drivers and engineers over the team radio, it is tire usage that presents the most striking chance to pass the opposition.\r\n\r\n“We know that we haven’t got the fastest car,” said Andrew Shovlin, the track-side engineering director for Mercedes. “We’ve got to look to the opportunities in strategy.”\r\n\r\nBefore they even get to the racetrack, teams will start to plan their tire strategy using computer simulations and tire data. Teams have three types of tires to choose from, soft, medium and hard, known as compounds, with the added hurdle that two of them must be used during a race. Choosing wisely can make a car faster than the other guy’s car, and can also reduce the number of time-eating pit stops. And the strategy is constantly changing during a race.\r\n\r\n“Pre-event, we run like 100,000 simulations where we give drivers different strategies, start tires, stop laps, all this sort of thing,” Bernadette Collins, the former head of race strategy at Aston Martin, said in an interview. “We come up with a best expected finishing position for each strategy.”\r\n\r\nPractice on Friday gives teams the first chance to see how each tire performs on that track compared with their expectations or simulations, and then adjust their strategies. They will also analyze what their rivals are doing to understand tire performance.', 65, 3, 16, 'public/post-image/2022-10-24-19-27-44.webp', 'disable', 2, 1, '1970-01-01 01:00:00', '2022-06-19 22:37:55', '2022-10-24 10:27:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `permission` enum('user','admin') NOT NULL DEFAULT 'user',
  `verify_token` varchar(191) DEFAULT NULL,
  `is_active` tinyint(5) NOT NULL DEFAULT 0,
  `forgot_token` varchar(191) DEFAULT NULL,
  `forgot_token_expire` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_persian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `permission`, `verify_token`, `is_active`, `forgot_token`, `forgot_token_expire`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'onlinenewssite@admin.com', '$2y$10$IN3YIlgIvxiHxdBvNVz/GOm72x2h5aBvV9J2QmsVhLLwkvooKBhbm', 'admin', 'cf408fb6caedd3c8308a21254b1a3cb4a5c8757f7740354104af7b43dfe7bff6', 1, NULL, NULL, '2023-06-12 16:17:46', '2023-06-12 16:31:15'),
(2, 'louis', 'louis@yahoo.com', '$2y$10$kUh4xMjKTXeNiy7jSIJO6.LOVBth9hQiPwMi0BgD.ao2uWBDn1OB.', 'user', NULL, 1, NULL, NULL, '2021-06-23 23:35:51', '2019-07-05 02:10:50'),
(3, 'kam', 'kamran@gmail.com', '$2y$10$nlZ5dMJ2sv9HrKU4NJslDe0ick10lGSBZNM2i14zKtDGGAEqAdXVS', 'user', NULL, 0, NULL, NULL, '2019-06-06 01:28:40', '2023-06-12 16:13:53'),
(4, 'nova', 'nova@yahoo.com', '$2y$10$CrqnkHtp2dKlyHfYRniXG.B8fWtrHtfavUyGVqc6bdiiF5lgwzi96', 'user', NULL, 1, NULL, NULL, '2019-10-27 21:56:13', '2019-10-27 22:18:23');

-- --------------------------------------------------------

--
-- Table structure for table `websetting`
--

CREATE TABLE `websetting` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `logo` text DEFAULT NULL,
  `icon` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_persian_ci;

--
-- Dumping data for table `websetting`
--

INSERT INTO `websetting` (`id`, `title`, `description`, `keywords`, `logo`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'online news', 'online news', 'online news', 'public/setting/logo.png', 'public/setting/icon.jpeg', '2019-06-09 19:54:37', '2022-10-24 16:41:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `websetting`
--
ALTER TABLE `websetting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `websetting`
--
ALTER TABLE `websetting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
