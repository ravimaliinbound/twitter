-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2025 at 04:02 PM
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
-- Database: `twitter`
--

-- --------------------------------------------------------

--
-- Table structure for table `twitter_comments`
--

CREATE TABLE `twitter_comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `twitter_comments`
--

INSERT INTO `twitter_comments` (`id`, `user_id`, `post_id`, `comment`, `created_at`, `updated_at`) VALUES
(5, 9, 203, 'Good Afternoon', '2025-05-12 08:27:29', '2025-05-12 08:27:29'),
(6, 9, 203, 'Hii', '2025-05-12 08:28:05', '2025-05-12 08:28:05'),
(7, 9, 203, 'Hello', '2025-05-12 08:28:16', '2025-05-12 08:28:16'),
(8, 9, 202, 'Hii', '2025-05-12 08:53:34', '2025-05-12 08:53:34'),
(9, 9, 171, 'Hi, how are you', '2025-05-12 08:56:32', '2025-05-12 08:56:32'),
(11, 14, 213, 'sscscc', '2025-05-12 12:17:26', '2025-05-12 12:17:26'),
(12, 15, 214, 'Yess', '2025-05-12 12:53:36', '2025-05-12 12:53:36');

-- --------------------------------------------------------

--
-- Table structure for table `twitter_followers`
--

CREATE TABLE `twitter_followers` (
  `id` int(11) NOT NULL,
  `follower_id` int(11) DEFAULT NULL,
  `following_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `twitter_likes`
--

CREATE TABLE `twitter_likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `liked_id` int(11) NOT NULL,
  `likeable_type` enum('post','comment','reply') NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `twitter_likes`
--

INSERT INTO `twitter_likes` (`id`, `user_id`, `liked_id`, `likeable_type`, `created_at`, `updated_at`) VALUES
(38, 9, 48, 'post', '2025-05-11 21:16:37', '2025-05-11 21:16:37'),
(40, 9, 118, 'post', '2025-05-12 10:11:56', '2025-05-12 10:11:56'),
(53, 9, 204, 'post', '2025-05-12 10:18:32', '2025-05-12 10:18:32'),
(76, 9, 119, 'post', '2025-05-12 13:46:49', '2025-05-12 13:46:49'),
(83, 9, 171, 'post', '2025-05-12 13:51:31', '2025-05-12 13:51:31'),
(86, 9, 203, 'post', '2025-05-12 14:30:07', '2025-05-12 14:30:07'),
(102, 14, 202, 'post', '2025-05-12 17:31:03', '2025-05-12 17:31:03'),
(106, 14, 203, 'post', '2025-05-12 17:47:42', '2025-05-12 17:47:42'),
(109, 14, 48, 'post', '2025-05-12 18:03:25', '2025-05-12 18:03:25'),
(115, 15, 213, 'post', '2025-05-12 18:24:12', '2025-05-12 18:24:12'),
(116, 15, 210, 'post', '2025-05-12 18:24:14', '2025-05-12 18:24:14'),
(117, 15, 203, 'post', '2025-05-12 18:24:14', '2025-05-12 18:24:14'),
(118, 15, 202, 'post', '2025-05-12 18:24:15', '2025-05-12 18:24:15'),
(119, 15, 171, 'post', '2025-05-12 18:24:16', '2025-05-12 18:24:16'),
(120, 15, 119, 'post', '2025-05-12 18:24:19', '2025-05-12 18:24:19'),
(121, 15, 118, 'post', '2025-05-12 18:24:21', '2025-05-12 18:24:21'),
(123, 15, 87, 'post', '2025-05-12 18:24:25', '2025-05-12 18:24:25'),
(124, 15, 85, 'post', '2025-05-12 18:24:27', '2025-05-12 18:24:27'),
(125, 15, 48, 'post', '2025-05-12 18:24:28', '2025-05-12 18:24:28'),
(126, 15, 47, 'post', '2025-05-12 18:24:29', '2025-05-12 18:24:29'),
(127, 15, 46, 'post', '2025-05-12 18:24:30', '2025-05-12 18:24:30'),
(139, 16, 85, 'post', '2025-05-12 18:25:39', '2025-05-12 18:25:39'),
(144, 19, 217, 'post', '2025-05-12 18:28:51', '2025-05-12 18:28:51'),
(145, 19, 216, 'post', '2025-05-12 18:28:52', '2025-05-12 18:28:52'),
(146, 19, 215, 'post', '2025-05-12 18:28:53', '2025-05-12 18:28:53'),
(147, 19, 214, 'post', '2025-05-12 18:28:55', '2025-05-12 18:28:55'),
(148, 19, 213, 'post', '2025-05-12 18:28:56', '2025-05-12 18:28:56'),
(149, 19, 210, 'post', '2025-05-12 18:28:57', '2025-05-12 18:28:57'),
(150, 19, 203, 'post', '2025-05-12 18:28:57', '2025-05-12 18:28:57'),
(151, 19, 202, 'post', '2025-05-12 18:28:59', '2025-05-12 18:28:59'),
(152, 19, 171, 'post', '2025-05-12 18:29:00', '2025-05-12 18:29:00'),
(153, 19, 119, 'post', '2025-05-12 18:29:01', '2025-05-12 18:29:01'),
(154, 19, 118, 'post', '2025-05-12 18:29:02', '2025-05-12 18:29:02'),
(155, 19, 87, 'post', '2025-05-12 18:29:03', '2025-05-12 18:29:03'),
(156, 19, 85, 'post', '2025-05-12 18:29:04', '2025-05-12 18:29:04'),
(157, 19, 48, 'post', '2025-05-12 18:29:05', '2025-05-12 18:29:05'),
(158, 19, 47, 'post', '2025-05-12 18:29:08', '2025-05-12 18:29:08'),
(159, 19, 46, 'post', '2025-05-12 18:29:09', '2025-05-12 18:29:09'),
(178, 20, 220, 'post', '2025-05-12 18:30:41', '2025-05-12 18:30:41'),
(179, 20, 221, 'post', '2025-05-12 18:30:55', '2025-05-12 18:30:55'),
(180, 17, 46, 'post', '2025-05-12 18:33:34', '2025-05-12 18:33:34'),
(181, 17, 48, 'post', '2025-05-12 18:33:36', '2025-05-12 18:33:36'),
(182, 9, 46, 'post', '2025-05-12 18:35:33', '2025-05-12 18:35:33'),
(183, 9, 47, 'post', '2025-05-12 18:37:16', '2025-05-12 18:37:16'),
(192, 9, 214, 'post', '2025-05-12 18:53:00', '2025-05-12 18:53:00'),
(207, 9, 202, 'post', '2025-05-12 19:07:27', '2025-05-12 19:07:27'),
(223, 9, 221, 'post', '2025-05-12 19:17:29', '2025-05-12 19:17:29'),
(227, 9, 217, 'post', '2025-05-12 19:17:37', '2025-05-12 19:17:37'),
(229, 9, 210, 'post', '2025-05-12 19:25:44', '2025-05-12 19:25:44'),
(233, 9, 222, 'post', '2025-05-12 19:32:20', '2025-05-12 19:32:20');

-- --------------------------------------------------------

--
-- Table structure for table `twitter_notifications`
--

CREATE TABLE `twitter_notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type` enum('like','follow','comment','reply') DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `twitter_posts`
--

CREATE TABLE `twitter_posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `media` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `twitter_posts`
--

INSERT INTO `twitter_posts` (`id`, `user_id`, `content`, `media`, `created_at`, `updated_at`) VALUES
(46, 9, 'Hey... this is my first post...!', 'audi1746623394.png', '2025-05-07 13:09:54', '2025-05-07 13:09:54'),
(47, 9, 'Hello...!', NULL, '2025-05-07 13:12:15', '2025-05-07 13:12:15'),
(48, 9, 'New iphone...', 'iphone151746623864.png', '2025-05-07 13:17:44', '2025-05-07 13:17:44'),
(85, 9, 'Hi Everyone...', NULL, '2025-05-08 10:03:19', '2025-05-08 10:03:19'),
(87, 9, 'Hello Guys...! My name is Ravi Mali', NULL, '2025-05-08 12:02:27', '2025-05-08 12:02:27'),
(118, 9, 'I am going to Home', NULL, '2025-05-08 14:02:59', '2025-05-08 14:02:59'),
(119, 9, 'Good Morning...!', NULL, '2025-05-09 04:25:27', '2025-05-09 04:25:27'),
(171, 9, 'Hello', NULL, '2025-05-09 11:36:55', '2025-05-09 11:36:55'),
(202, 9, 'I am here...!', NULL, '2025-05-11 08:27:46', '2025-05-11 08:27:46'),
(203, 9, 'Good Morning...!', NULL, '2025-05-12 04:48:08', '2025-05-12 04:48:08'),
(210, 9, 'assaasx', NULL, '2025-05-12 11:53:20', '2025-05-12 11:53:20'),
(213, 14, 'Hello', NULL, '2025-05-12 12:13:49', '2025-05-12 12:13:49'),
(214, 15, 'This is Kamlesh Mali', NULL, '2025-05-12 12:53:23', '2025-05-12 12:53:23'),
(215, 15, 'Good evening Guys...!', NULL, '2025-05-12 12:54:00', '2025-05-12 12:54:00'),
(216, 15, 'Hello', NULL, '2025-05-12 12:54:03', '2025-05-12 12:54:03'),
(217, 16, 'Hi I am Vikram Mali', NULL, '2025-05-12 12:55:58', '2025-05-12 12:55:58'),
(218, 19, 'Hi, how are you...?', NULL, '2025-05-12 12:58:41', '2025-05-12 12:58:41'),
(219, 20, 'Hi, I am unknown user...', NULL, '2025-05-12 13:00:03', '2025-05-12 13:00:03'),
(220, 20, 'Do you know me?', NULL, '2025-05-12 13:00:40', '2025-05-12 13:00:40'),
(221, 20, 'Its India vs Pakistan...', NULL, '2025-05-12 13:00:54', '2025-05-12 13:00:54'),
(222, 17, 'Hi this is Jagdish Mali', NULL, '2025-05-12 13:03:02', '2025-05-12 13:03:02');

-- --------------------------------------------------------

--
-- Table structure for table `twitter_replies`
--

CREATE TABLE `twitter_replies` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `reply` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `twitter_users`
--

CREATE TABLE `twitter_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `cover_pic` varchar(255) DEFAULT NULL,
  `joined_date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `twitter_users`
--

INSERT INTO `twitter_users` (`id`, `name`, `username`, `email`, `password`, `dob`, `bio`, `profile_pic`, `cover_pic`, `joined_date`, `created_at`, `updated_at`) VALUES
(9, 'Ravi', 'ravi', 'ravi@gmail.com', 'dd4b21e9ef71e1291183a46b913ae6f2', '2003-04-02', 'Web Developer', 'bag1746621245.png', 'Capture1746712207.PNG', 'May 2025', '2025-05-07 12:33:11', '2025-05-07 12:33:11'),
(14, 'Vishal Mali', 'vishal', 'vishal@gmail.com', 'dd4b21e9ef71e1291183a46b913ae6f2', '2000-01-05', '', 'iphone151747054065.png', 'audi1747054065.png', 'May 2025', '2025-05-09 05:43:41', '2025-05-09 05:43:41'),
(15, 'Kamlesh Mali', 'kamlesh', 'kamlesh@gmail.com', 'dd4b21e9ef71e1291183a46b913ae6f2', '1999-11-13', '', 'user1747054348.jpg', 'Capture1747054348.PNG', 'May 2025', '2025-05-09 05:44:20', '2025-05-09 05:44:20'),
(16, 'Vikram Mali', 'vikram', 'vikram@gmail.com', 'dd4b21e9ef71e1291183a46b913ae6f2', '2002-05-10', '', 'happy1747054575.png', 'Capture1747054575.PNG', 'May 2025', '2025-05-09 05:44:51', '2025-05-09 05:44:51'),
(17, 'Jagdish Mali', 'jagdish', 'jagdish@gmail.com', 'dd4b21e9ef71e1291183a46b913ae6f2', '1998-01-01', '', 'grok1747055000.png', 'background1747055000.PNG', 'May 2025', '2025-05-09 05:45:26', '2025-05-09 05:45:26'),
(19, 'Kishan Lal', 'kishanlal', 'kishanlal@gmail.com', 'dd4b21e9ef71e1291183a46b913ae6f2', '1975-01-01', '', 'verified1747054706.png', 'Capture1747054706.PNG', 'May 2025', '2025-05-09 05:46:56', '2025-05-09 05:46:56'),
(20, 'Ravi Mali', 'ravimali', 'ravimali@gmail.com', 'dd4b21e9ef71e1291183a46b913ae6f2', '2003-04-02', 'BCA Gold Medalist, Science day 1st Rank on district level ', 'user1746769874.jpg', 'Capture1746769812.PNG', 'May 2025', '2025-05-09 05:47:58', '2025-05-09 05:47:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `twitter_comments`
--
ALTER TABLE `twitter_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `twitter_followers`
--
ALTER TABLE `twitter_followers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `follower_id` (`follower_id`),
  ADD KEY `following_id` (`following_id`);

--
-- Indexes for table `twitter_likes`
--
ALTER TABLE `twitter_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `twitter_notifications`
--
ALTER TABLE `twitter_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `twitter_posts`
--
ALTER TABLE `twitter_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `twitter_replies`
--
ALTER TABLE `twitter_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `comment_id` (`comment_id`);

--
-- Indexes for table `twitter_users`
--
ALTER TABLE `twitter_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `twitter_comments`
--
ALTER TABLE `twitter_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `twitter_followers`
--
ALTER TABLE `twitter_followers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `twitter_likes`
--
ALTER TABLE `twitter_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;

--
-- AUTO_INCREMENT for table `twitter_notifications`
--
ALTER TABLE `twitter_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `twitter_posts`
--
ALTER TABLE `twitter_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT for table `twitter_replies`
--
ALTER TABLE `twitter_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `twitter_users`
--
ALTER TABLE `twitter_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `twitter_comments`
--
ALTER TABLE `twitter_comments`
  ADD CONSTRAINT `twitter_comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `twitter_users` (`id`),
  ADD CONSTRAINT `twitter_comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `twitter_posts` (`id`);

--
-- Constraints for table `twitter_followers`
--
ALTER TABLE `twitter_followers`
  ADD CONSTRAINT `twitter_followers_ibfk_1` FOREIGN KEY (`follower_id`) REFERENCES `twitter_users` (`id`),
  ADD CONSTRAINT `twitter_followers_ibfk_2` FOREIGN KEY (`following_id`) REFERENCES `twitter_users` (`id`);

--
-- Constraints for table `twitter_likes`
--
ALTER TABLE `twitter_likes`
  ADD CONSTRAINT `twitter_likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `twitter_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `twitter_notifications`
--
ALTER TABLE `twitter_notifications`
  ADD CONSTRAINT `twitter_notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `twitter_users` (`id`);

--
-- Constraints for table `twitter_posts`
--
ALTER TABLE `twitter_posts`
  ADD CONSTRAINT `twitter_posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `twitter_users` (`id`);

--
-- Constraints for table `twitter_replies`
--
ALTER TABLE `twitter_replies`
  ADD CONSTRAINT `twitter_replies_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `twitter_users` (`id`),
  ADD CONSTRAINT `twitter_replies_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `twitter_posts` (`id`),
  ADD CONSTRAINT `twitter_replies_ibfk_3` FOREIGN KEY (`comment_id`) REFERENCES `twitter_comments` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
