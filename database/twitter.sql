-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2025 at 06:20 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

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
(19, 9, 119, 'post', '2025-05-11 18:51:29', '2025-05-11 18:51:29'),
(30, 9, 171, 'post', '2025-05-11 18:58:33', '2025-05-11 18:58:33'),
(33, 9, 202, 'post', '2025-05-11 21:06:29', '2025-05-11 21:06:29'),
(35, 9, 118, 'post', '2025-05-11 21:08:24', '2025-05-11 21:08:24'),
(38, 9, 48, 'post', '2025-05-11 21:16:37', '2025-05-11 21:16:37');

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
  `total_comments` varchar(255) DEFAULT NULL,
  `total_likes` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `twitter_posts`
--

INSERT INTO `twitter_posts` (`id`, `user_id`, `content`, `media`, `total_comments`, `total_likes`, `created_at`, `updated_at`) VALUES
(46, 9, 'Hey... this is my first post...!', 'audi1746623394.png', '0', '0', '2025-05-07 13:09:54', '2025-05-07 13:09:54'),
(47, 9, 'Hello...!', NULL, '0', '0', '2025-05-07 13:12:15', '2025-05-07 13:12:15'),
(48, 9, 'New iphone...', 'iphone151746623864.png', '0', '0', '2025-05-07 13:17:44', '2025-05-07 13:17:44'),
(85, 9, 'Hi Everyone...', NULL, '0', '0', '2025-05-08 10:03:19', '2025-05-08 10:03:19'),
(87, 9, 'Hello Guys...! My name is Ravi Mali', NULL, '0', '0', '2025-05-08 12:02:27', '2025-05-08 12:02:27'),
(118, 9, 'I am going to Home', NULL, '0', '0', '2025-05-08 14:02:59', '2025-05-08 14:02:59'),
(119, 9, 'Good Morning...!', NULL, '0', '0', '2025-05-09 04:25:27', '2025-05-09 04:25:27'),
(171, 9, 'Hello', NULL, '0', '0', '2025-05-09 11:36:55', '2025-05-09 11:36:55'),
(202, 9, 'I am here...!', NULL, '0', '0', '2025-05-11 08:27:46', '2025-05-11 08:27:46');

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
(14, 'Vishal Mali', 'vishal', 'vishal@gmail.com', 'dd4b21e9ef71e1291183a46b913ae6f2', '2000-01-05', NULL, '', '', 'May 2025', '2025-05-09 05:43:41', '2025-05-09 05:43:41'),
(15, 'Kamlesh Mali', 'kamlesh', 'kamlesh@gmail.com', 'dd4b21e9ef71e1291183a46b913ae6f2', '1999-11-13', NULL, '', '', 'May 2025', '2025-05-09 05:44:20', '2025-05-09 05:44:20'),
(16, 'Vikram Mali', 'vikram', 'vikram@gmail.com', 'dd4b21e9ef71e1291183a46b913ae6f2', '2002-05-10', NULL, '', '', 'May 2025', '2025-05-09 05:44:51', '2025-05-09 05:44:51'),
(17, 'Jagdish Mali', 'jagdish', 'jagdish@gmail.com', 'dd4b21e9ef71e1291183a46b913ae6f2', '1998-01-01', NULL, '', '', 'May 2025', '2025-05-09 05:45:26', '2025-05-09 05:45:26'),
(19, 'Kishan Lal', 'kishanlal', 'kishanlal@gmail.com', 'dd4b21e9ef71e1291183a46b913ae6f2', '1975-01-01', NULL, '', '', 'May 2025', '2025-05-09 05:46:56', '2025-05-09 05:46:56'),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `twitter_followers`
--
ALTER TABLE `twitter_followers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `twitter_likes`
--
ALTER TABLE `twitter_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `twitter_notifications`
--
ALTER TABLE `twitter_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `twitter_posts`
--
ALTER TABLE `twitter_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

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
