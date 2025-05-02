-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2025 at 04:00 PM
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
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `reply_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(2, 2, 'Hello, how are you?', 'x1746104049.avif', '2025-05-01 12:48:12', '2025-05-01 12:48:12'),
(3, 2, 'Twitter', 'x1746104049.avif', '2025-05-01 12:54:09', '2025-05-01 12:54:09'),
(4, 2, NULL, 'twitter1746104120.png', '2025-05-01 12:55:20', '2025-05-01 12:55:20'),
(5, 1, 'Hello', NULL, '2025-05-01 12:59:36', '2025-05-01 12:59:36'),
(6, 2, 'Hii', 'bag1746162484.png', '2025-05-02 05:08:04', '2025-05-02 05:08:04'),
(7, 2, 'My new Car', 'audi1746164123.png', '2025-05-02 05:35:23', '2025-05-02 05:35:23'),
(8, 1, 'Iphone', 'iphone151746165334.png', '2025-05-02 05:55:34', '2025-05-02 05:55:34'),
(9, 1, 'New User', 'user1746165532.jpg', '2025-05-02 05:58:52', '2025-05-02 05:58:52'),
(10, 2, NULL, 'iphone151746166315.png', '2025-05-02 06:11:55', '2025-05-02 06:11:55'),
(11, 2, NULL, 'Capture1746166452.PNG', '2025-05-02 06:14:12', '2025-05-02 06:14:12'),
(12, 2, NULL, 'verified1746166782.png', '2025-05-02 06:19:42', '2025-05-02 06:19:42'),
(13, 2, NULL, 'grok1746166799.png', '2025-05-02 06:19:59', '2025-05-02 06:19:59'),
(14, 2, NULL, 'happy1746166821.png', '2025-05-02 06:20:21', '2025-05-02 06:20:21'),
(15, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit expedita consequuntur fugiat in, optio soluta consequatur nesciunt enim omnis animi perferendis labore quos? Maiores at sit earum rem voluptatem itaque quo molestiae vero consequatur ipsa ', 'bag1746170880.png', '2025-05-02 07:28:00', '2025-05-02 07:28:00'),
(16, 3, 'Karan Singh', NULL, '2025-05-02 09:08:45', '2025-05-02 09:08:45'),
(17, 3, 'New car', 'audi1746176951.png', '2025-05-02 09:09:11', '2025-05-02 09:09:11'),
(18, 3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit expedita consequuntur fugiat in, optio soluta consequatur nesciunt enim omnis animi perferendis labore quos? Maiores at sit earum rem voluptatem itaque quo molestiae vero consequatur ipsa ', 'user1746177412.jpg', '2025-05-02 09:16:52', '2025-05-02 09:16:52'),
(19, 2, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Asperiores, explicabo illo ea veritatis saepe ducimus fuga nobis voluptate laboriosam ipsam eum alias voluptas nisi. At natus odit quidem aliquam non placeat earum commodi ex quasi autem, amet dign', 'profile_pic1746183661.png', '2025-05-02 11:01:01', '2025-05-02 11:01:01'),
(20, 4, 'Hi, this is Rajesh Kumar', 'loader1746185985.gif', '2025-05-02 11:39:45', '2025-05-02 11:39:45'),
(21, 1, NULL, 'illustration_unmention1746188278.png', '2025-05-02 12:17:58', '2025-05-02 12:17:58');

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
(1, 'Ravi Mali', 'ravimali', 'ravimali@gmail.com', 'dd4b21e9ef71e1291183a46b913ae6f2', '2003-04-02', NULL, '', '', 'May 2025', '2025-05-01 12:12:59', '2025-05-01 12:12:59'),
(2, 'Ravi', 'ravi', 'ravi@gmail.com', 'dd4b21e9ef71e1291183a46b913ae6f2', '2003-04-02', 'Web Developer', '', '', 'May 2025', '2025-05-01 12:22:53', '2025-05-01 12:22:53'),
(3, 'Karan Singh', 'karan', 'karan@gmail.com', 'dd4b21e9ef71e1291183a46b913ae6f2', '2000-02-11', NULL, '', '', 'May 2025', '2025-05-02 05:01:20', '2025-05-02 05:01:20'),
(4, 'Rajesh Kumar', 'rajesh', 'rajesh@gmail.com', 'dd4b21e9ef71e1291183a46b913ae6f2', '2002-06-02', NULL, '', '', 'May 2025', '2025-05-02 11:39:06', '2025-05-02 11:39:06');

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
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `reply_id` (`reply_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `twitter_notifications`
--
ALTER TABLE `twitter_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `twitter_posts`
--
ALTER TABLE `twitter_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `twitter_replies`
--
ALTER TABLE `twitter_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `twitter_users`
--
ALTER TABLE `twitter_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  ADD CONSTRAINT `twitter_likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `twitter_users` (`id`),
  ADD CONSTRAINT `twitter_likes_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `twitter_posts` (`id`),
  ADD CONSTRAINT `twitter_likes_ibfk_3` FOREIGN KEY (`comment_id`) REFERENCES `twitter_comments` (`id`),
  ADD CONSTRAINT `twitter_likes_ibfk_4` FOREIGN KEY (`reply_id`) REFERENCES `twitter_replies` (`id`);

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
