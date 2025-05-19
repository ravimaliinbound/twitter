-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2025 at 03:59 PM
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
(12, 15, 214, 'Yess', '2025-05-12 12:53:36', '2025-05-12 12:53:36'),
(13, 9, 222, 'Hello', '2025-05-13 04:35:16', '2025-05-13 04:35:16'),
(29, 9, 221, 'yes', '2025-05-13 05:26:09', '2025-05-13 05:26:09'),
(30, 9, 220, 'No...!', '2025-05-13 05:26:29', '2025-05-13 05:26:29'),
(31, 9, 217, 'Hello', '2025-05-13 05:26:40', '2025-05-13 05:26:40'),
(32, 9, 220, 'How are you', '2025-05-13 05:27:58', '2025-05-13 05:27:58'),
(33, 9, 218, 'I am good, how are you', '2025-05-13 05:28:24', '2025-05-13 05:28:24'),
(34, 9, 218, 'Good', '2025-05-13 05:28:41', '2025-05-13 05:28:41'),
(39, 9, 217, 'Hi', '2025-05-13 08:27:31', '2025-05-13 08:27:31'),
(40, 9, 216, 'dc', '2025-05-13 08:45:52', '2025-05-13 08:45:52'),
(41, 9, 216, 'Hello', '2025-05-13 08:51:51', '2025-05-13 08:51:51'),
(42, 9, 215, 'Hello', '2025-05-13 08:57:04', '2025-05-13 08:57:04'),
(47, 9, 239, 'Congratulations', '2025-05-13 13:49:23', '2025-05-13 13:49:23'),
(53, 9, 251, 'efrer', '2025-05-14 10:26:41', '2025-05-14 10:26:41'),
(54, 9, 251, 'dfdfv', '2025-05-14 10:26:45', '2025-05-14 10:26:45'),
(55, 9, 251, 'dfdfv', '2025-05-14 10:26:45', '2025-05-14 10:26:45'),
(56, 9, 244, 'cdcdc', '2025-05-14 11:25:16', '2025-05-14 11:25:16'),
(57, 9, 244, 'sdsdc', '2025-05-14 11:25:22', '2025-05-14 11:25:22'),
(58, 9, 244, 'sdcdfc', '2025-05-14 11:25:25', '2025-05-14 11:25:25'),
(67, 9, 277, 'Good evening', '2025-05-15 13:53:08', '2025-05-15 13:53:08'),
(68, 9, 235, 'Nice...', '2025-05-15 13:54:03', '2025-05-15 13:54:03'),
(69, 15, 277, 'Hii, good evening..!', '2025-05-15 13:54:37', '2025-05-15 13:54:37'),
(70, 17, 244, 'ddfvdfvfv', '2025-05-15 14:01:00', '2025-05-15 14:01:00'),
(71, 17, 277, 'fdvdfv', '2025-05-16 10:06:36', '2025-05-16 10:06:36'),
(72, 17, 261, 'Hello', '2025-05-16 10:09:23', '2025-05-16 10:09:23'),
(73, 14, 235, 'Nice', '2025-05-16 10:46:30', '2025-05-16 10:46:30'),
(81, 14, 278, 'Hello Ravi', '2025-05-16 11:38:22', '2025-05-16 11:38:22'),
(83, 9, 259, 'Hello Suresh', '2025-05-16 11:50:06', '2025-05-16 11:50:06'),
(84, 9, 259, 'Hii', '2025-05-16 11:50:30', '2025-05-16 11:50:30'),
(85, 21, 259, 'Myself', '2025-05-16 11:52:32', '2025-05-16 11:52:32'),
(87, 9, 259, 'Hi Suresh , how are you', '2025-05-16 16:00:53', '2025-05-16 16:00:53'),
(110, 9, 274, 'cdcdc', '2025-05-17 09:30:48', '2025-05-17 09:30:48'),
(115, 9, 277, 'hello jagdish', '2025-05-17 11:57:48', '2025-05-17 11:57:48'),
(116, 17, 286, 'ff', '2025-05-17 11:59:29', '2025-05-17 11:59:29'),
(117, 17, 286, 'Congratulations', '2025-05-17 12:00:07', '2025-05-17 12:00:07'),
(118, 9, 277, 'dfvdfv', '2025-05-19 05:18:28', '2025-05-19 05:18:28'),
(119, 9, 219, 'YJTY', '2025-05-19 06:25:46', '2025-05-19 06:25:46'),
(120, 9, 219, 'DRTUDRTUDJH', '2025-05-19 06:25:52', '2025-05-19 06:25:52'),
(121, 9, 258, 'DTFHDFTJHT', '2025-05-19 06:26:07', '2025-05-19 06:26:07'),
(124, 15, 286, 'rfr', '2025-05-19 07:05:42', '2025-05-19 07:05:42'),
(131, 9, 286, 'dccdc', '2025-05-19 09:25:22', '2025-05-19 09:25:22'),
(132, 9, 235, 'dddd', '2025-05-19 09:31:06', '2025-05-19 09:31:06'),
(133, 9, 46, 'Nice', '2025-05-19 09:36:28', '2025-05-19 09:36:28'),
(134, 9, 286, 'kkkkkkkkkk', '2025-05-19 09:52:22', '2025-05-19 09:52:22'),
(135, 9, 286, 'fvfvfv', '2025-05-19 10:48:08', '2025-05-19 10:48:08'),
(136, 9, 286, 'fffc', '2025-05-19 10:48:48', '2025-05-19 10:48:48'),
(137, 14, 286, 'Nice', '2025-05-19 10:55:40', '2025-05-19 10:55:40'),
(138, 9, 286, 'ee', '2025-05-19 10:58:44', '2025-05-19 10:58:44'),
(139, 9, 256, 'ff', '2025-05-19 11:02:59', '2025-05-19 11:02:59'),
(140, 9, 285, 'hello', '2025-05-19 12:13:33', '2025-05-19 12:13:33'),
(144, 9, 286, 'Hello ...', '2025-05-19 13:13:22', '2025-05-19 13:13:22'),
(147, 19, 286, 'Good job...!', '2025-05-19 13:50:01', '2025-05-19 13:50:01'),
(151, 19, 286, 'Amazing...!', '2025-05-19 13:55:42', '2025-05-19 13:55:42');

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

--
-- Dumping data for table `twitter_followers`
--

INSERT INTO `twitter_followers` (`id`, `follower_id`, `following_id`, `created_at`, `updated_at`) VALUES
(284, 16, 9, '2025-05-15 04:27:36', '2025-05-15 04:27:36'),
(326, 17, 9, '2025-05-15 13:51:35', '2025-05-15 13:51:35'),
(328, 17, 15, '2025-05-15 13:51:42', '2025-05-15 13:51:42'),
(330, 17, 16, '2025-05-15 13:52:12', '2025-05-15 13:52:12'),
(350, 17, 19, '2025-05-16 10:07:28', '2025-05-16 10:07:28'),
(387, 14, 16, '2025-05-19 04:19:05', '2025-05-19 04:19:05'),
(388, 14, 9, '2025-05-19 04:21:48', '2025-05-19 04:21:48'),
(543, 15, 21, '2025-05-19 06:22:35', '2025-05-19 06:22:35'),
(572, 15, 9, '2025-05-19 12:29:36', '2025-05-19 12:29:36'),
(582, 19, 17, '2025-05-19 13:50:38', '2025-05-19 13:50:38'),
(583, 19, 9, '2025-05-19 13:50:39', '2025-05-19 13:50:39'),
(590, 9, 21, '2025-05-19 13:53:34', '2025-05-19 13:53:34'),
(591, 9, 16, '2025-05-19 13:53:35', '2025-05-19 13:53:35'),
(592, 9, 17, '2025-05-19 13:53:35', '2025-05-19 13:53:35'),
(593, 9, 14, '2025-05-19 13:53:36', '2025-05-19 13:53:36'),
(594, 9, 15, '2025-05-19 13:53:36', '2025-05-19 13:53:36'),
(595, 9, 19, '2025-05-19 13:53:37', '2025-05-19 13:53:37');

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
(507, 17, 244, 'post', '2025-05-15 19:30:53', '2025-05-15 19:30:53'),
(508, 17, 225, 'post', '2025-05-16 15:39:12', '2025-05-16 15:39:12'),
(510, 14, 278, 'post', '2025-05-16 16:53:42', '2025-05-16 16:53:42'),
(513, 21, 278, 'post', '2025-05-16 18:28:10', '2025-05-16 18:28:10'),
(523, 9, 230, 'post', '2025-05-16 22:32:44', '2025-05-16 22:32:44'),
(524, 9, 229, 'post', '2025-05-16 22:32:47', '2025-05-16 22:32:47'),
(525, 16, 278, 'post', '2025-05-16 22:50:31', '2025-05-16 22:50:31'),
(526, 16, 235, 'post', '2025-05-16 22:55:29', '2025-05-16 22:55:29'),
(527, 16, 234, 'post', '2025-05-16 22:55:32', '2025-05-16 22:55:32'),
(531, 15, 281, 'post', '2025-05-16 23:10:01', '2025-05-16 23:10:01'),
(533, 15, 283, 'post', '2025-05-16 23:36:33', '2025-05-16 23:36:33'),
(534, 14, 284, 'post', '2025-05-16 23:37:58', '2025-05-16 23:37:58'),
(537, 15, 286, 'post', '2025-05-17 10:48:34', '2025-05-17 10:48:34'),
(538, 14, 286, 'post', '2025-05-17 10:48:54', '2025-05-17 10:48:54'),
(539, 9, 235, 'post', '2025-05-17 11:01:47', '2025-05-17 11:01:47'),
(545, 9, 274, 'post', '2025-05-17 15:47:12', '2025-05-17 15:47:12'),
(559, 9, 216, 'post', '2025-05-17 15:56:33', '2025-05-17 15:56:33'),
(569, 9, 252, 'post', '2025-05-17 16:01:45', '2025-05-17 16:01:45'),
(571, 9, 277, 'post', '2025-05-17 17:28:08', '2025-05-17 17:28:08'),
(572, 17, 286, 'post', '2025-05-17 17:29:56', '2025-05-17 17:29:56'),
(573, 17, 285, 'post', '2025-05-17 17:34:09', '2025-05-17 17:34:09'),
(574, 9, 202, 'post', '2025-05-17 17:36:45', '2025-05-17 17:36:45'),
(575, 9, 46, 'post', '2025-05-19 10:49:18', '2025-05-19 10:49:18'),
(576, 15, 288, 'post', '2025-05-19 11:49:27', '2025-05-19 11:49:27'),
(578, 9, 257, 'post', '2025-05-19 11:53:42', '2025-05-19 11:53:42'),
(579, 9, 256, 'post', '2025-05-19 11:53:45', '2025-05-19 11:53:45'),
(580, 15, 285, 'post', '2025-05-19 11:54:14', '2025-05-19 11:54:14'),
(581, 15, 278, 'post', '2025-05-19 11:54:15', '2025-05-19 11:54:15'),
(582, 15, 261, 'post', '2025-05-19 11:54:16', '2025-05-19 11:54:16'),
(583, 15, 225, 'post', '2025-05-19 11:54:18', '2025-05-19 11:54:18'),
(584, 15, 210, 'post', '2025-05-19 11:54:19', '2025-05-19 11:54:19'),
(585, 15, 258, 'post', '2025-05-19 11:55:00', '2025-05-19 11:55:00'),
(586, 15, 257, 'post', '2025-05-19 11:55:04', '2025-05-19 11:55:04'),
(587, 15, 256, 'post', '2025-05-19 11:55:16', '2025-05-19 11:55:16'),
(588, 15, 255, 'post', '2025-05-19 11:55:18', '2025-05-19 11:55:18'),
(589, 15, 254, 'post', '2025-05-19 11:55:21', '2025-05-19 11:55:21'),
(590, 15, 253, 'post', '2025-05-19 11:55:30', '2025-05-19 11:55:30'),
(591, 15, 221, 'post', '2025-05-19 11:55:31', '2025-05-19 11:55:31'),
(592, 15, 220, 'post', '2025-05-19 11:55:32', '2025-05-19 11:55:32'),
(593, 15, 219, 'post', '2025-05-19 11:55:33', '2025-05-19 11:55:33'),
(608, 9, 259, 'post', '2025-05-19 15:39:20', '2025-05-19 15:39:20'),
(613, 9, 258, 'post', '2025-05-19 16:36:05', '2025-05-19 16:36:05'),
(614, 20, 258, 'post', '2025-05-19 16:36:36', '2025-05-19 16:36:36'),
(616, 9, 261, 'post', '2025-05-19 16:41:23', '2025-05-19 16:41:23'),
(617, 9, 285, 'post', '2025-05-19 16:41:28', '2025-05-19 16:41:28'),
(621, 9, 132, 'comment', '2025-05-19 17:11:57', '2025-05-19 17:11:57'),
(622, 9, 234, 'post', '2025-05-19 17:13:21', '2025-05-19 17:13:21'),
(623, 14, 132, 'comment', '2025-05-19 17:13:59', '2025-05-19 17:13:59'),
(625, 14, 68, 'comment', '2025-05-19 17:14:45', '2025-05-19 17:14:45'),
(653, 9, 116, 'comment', '2025-05-19 17:45:43', '2025-05-19 17:45:43'),
(654, 9, 117, 'comment', '2025-05-19 17:45:44', '2025-05-19 17:45:44'),
(655, 9, 124, 'comment', '2025-05-19 17:45:45', '2025-05-19 17:45:45'),
(665, 9, 138, 'comment', '2025-05-19 17:54:00', '2025-05-19 17:54:00'),
(670, 14, 138, 'comment', '2025-05-19 17:57:47', '2025-05-19 17:57:47'),
(671, 14, 137, 'comment', '2025-05-19 17:57:48', '2025-05-19 17:57:48'),
(672, 14, 136, 'comment', '2025-05-19 17:57:48', '2025-05-19 17:57:48'),
(673, 14, 135, 'comment', '2025-05-19 17:57:58', '2025-05-19 17:57:58'),
(674, 14, 134, 'comment', '2025-05-19 17:57:59', '2025-05-19 17:57:59'),
(677, 16, 286, 'post', '2025-05-19 17:58:20', '2025-05-19 17:58:20'),
(678, 16, 138, 'comment', '2025-05-19 17:58:21', '2025-05-19 17:58:21'),
(679, 16, 137, 'comment', '2025-05-19 17:58:22', '2025-05-19 17:58:22'),
(680, 16, 136, 'comment', '2025-05-19 17:58:23', '2025-05-19 17:58:23'),
(681, 16, 135, 'comment', '2025-05-19 17:58:24', '2025-05-19 17:58:24'),
(682, 15, 138, 'comment', '2025-05-19 17:58:40', '2025-05-19 17:58:40'),
(683, 15, 137, 'comment', '2025-05-19 17:58:41', '2025-05-19 17:58:41'),
(684, 15, 136, 'comment', '2025-05-19 17:58:42', '2025-05-19 17:58:42'),
(685, 15, 135, 'comment', '2025-05-19 17:58:42', '2025-05-19 17:58:42'),
(686, 9, 137, 'comment', '2025-05-19 18:02:04', '2025-05-19 18:02:04'),
(690, 9, 73, 'comment', '2025-05-19 18:23:01', '2025-05-19 18:23:01'),
(693, 9, 135, 'comment', '2025-05-19 18:25:11', '2025-05-19 18:25:11'),
(695, 9, 136, 'comment', '2025-05-19 18:25:20', '2025-05-19 18:25:20'),
(699, 9, 144, 'comment', '2025-05-19 18:43:36', '2025-05-19 18:43:36'),
(700, 19, 286, 'post', '2025-05-19 19:19:50', '2025-05-19 19:19:50'),
(701, 19, 148, 'comment', '2025-05-19 19:21:04', '2025-05-19 19:21:04'),
(702, 19, 147, 'comment', '2025-05-19 19:21:05', '2025-05-19 19:21:05'),
(703, 9, 148, 'comment', '2025-05-19 19:21:22', '2025-05-19 19:21:22'),
(704, 9, 147, 'comment', '2025-05-19 19:21:22', '2025-05-19 19:21:22'),
(705, 9, 278, 'post', '2025-05-19 19:22:26', '2025-05-19 19:22:26'),
(706, 19, 278, 'post', '2025-05-19 19:22:49', '2025-05-19 19:22:49'),
(707, 19, 151, 'comment', '2025-05-19 19:25:45', '2025-05-19 19:25:45'),
(710, 9, 286, 'post', '2025-05-19 19:27:25', '2025-05-19 19:27:25'),
(712, 9, 151, 'comment', '2025-05-19 19:28:31', '2025-05-19 19:28:31');

-- --------------------------------------------------------

--
-- Table structure for table `twitter_notifications`
--

CREATE TABLE `twitter_notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `type` enum('follow','like','comment') NOT NULL,
  `message` text DEFAULT NULL,
  `comment_content` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `twitter_notifications`
--

INSERT INTO `twitter_notifications` (`id`, `user_id`, `from_user_id`, `post_id`, `type`, `message`, `comment_content`, `created_at`, `updated_at`) VALUES
(16, 9, 16, NULL, 'follow', '@vikram started to following you.', NULL, '2025-05-15 09:57:36', '2025-05-15 09:57:36'),
(32, 16, 9, NULL, 'comment', '@ravi commented on your post.', 'dcdcsdc', '2025-05-15 15:08:15', '2025-05-15 15:08:15'),
(41, 9, 17, NULL, 'comment', '@jagdish commented on your post.', 'Good afternoon...!', '2025-05-15 15:29:49', '2025-05-15 15:29:49'),
(63, 9, 17, NULL, 'follow', '@jagdish started to following you.', NULL, '2025-05-15 19:21:35', '2025-05-15 19:21:35'),
(65, 15, 17, NULL, 'follow', '@jagdish started to following you.', NULL, '2025-05-15 19:21:42', '2025-05-15 19:21:42'),
(67, 16, 17, NULL, 'follow', '@jagdish started to following you.', NULL, '2025-05-15 19:22:12', '2025-05-15 19:22:12'),
(68, 17, 9, NULL, 'comment', '@ravi commented on your post.', 'Good evening', '2025-05-15 19:23:08', '2025-05-15 19:23:08'),
(70, 14, 9, NULL, 'comment', '@ravi commented on your post.', 'Nice...', '2025-05-15 19:24:03', '2025-05-15 19:24:03'),
(71, 17, 15, NULL, 'comment', '@kamlesh commented on your post.', 'Hii, good evening..!', '2025-05-15 19:24:37', '2025-05-15 19:24:37'),
(92, 19, 17, NULL, 'follow', '@jagdish started to following you.', NULL, '2025-05-16 15:37:28', '2025-05-16 15:37:28'),
(93, 9, 17, NULL, 'comment', '@jagdish commented on your post.', 'Hello', '2025-05-16 15:39:23', '2025-05-16 15:39:23'),
(94, 14, 14, NULL, 'comment', '@vishal commented on your post.', 'Nice', '2025-05-16 16:16:30', '2025-05-16 16:16:30'),
(97, 9, 9, NULL, 'comment', '@ravi commented on your post.', 'Nice  Car', '2025-05-16 16:26:05', '2025-05-16 16:26:05'),
(98, 9, 14, NULL, 'comment', '@vishal commented on your post.', 'Nice', '2025-05-16 16:52:37', '2025-05-16 16:52:37'),
(99, 9, 14, NULL, 'comment', '@vishal commented on your post.', 'Hiii', '2025-05-16 16:53:47', '2025-05-16 16:53:47'),
(101, 9, 9, NULL, 'comment', '@ravi commented on your post.', 'Good Morning', '2025-05-16 16:56:08', '2025-05-16 16:56:08'),
(102, 9, 14, NULL, 'comment', '@vishal commented on your post.', 'Hello Ravi', '2025-05-16 17:08:22', '2025-05-16 17:08:22'),
(104, 21, 9, NULL, 'comment', '@ravi commented on your post.', 'Hello Suresh', '2025-05-16 17:20:06', '2025-05-16 17:20:06'),
(105, 21, 9, NULL, 'comment', '@ravi commented on your post.', 'Hii', '2025-05-16 17:20:30', '2025-05-16 17:20:30'),
(106, 21, 21, NULL, 'comment', '@suresh commented on your post.', 'Myself', '2025-05-16 17:22:32', '2025-05-16 17:22:32'),
(123, 16, 9, NULL, 'comment', '@ravi commented on your post.', 'Wow', '2025-05-16 18:59:25', '2025-05-16 18:59:25'),
(124, 21, 9, NULL, 'comment', '@ravi commented on your post.', 'Hi Suresh , how are you', '2025-05-16 21:30:53', '2025-05-16 21:30:53'),
(143, 16, 9, NULL, 'comment', '@ravi commented on your post.', 'Are baap re', '2025-05-16 22:48:46', '2025-05-16 22:48:46'),
(146, 9, 16, NULL, 'like', '@vikram liked your post.', NULL, '2025-05-16 22:50:31', '2025-05-16 22:50:31'),
(147, 14, 16, NULL, 'like', '@vikram liked your post.', NULL, '2025-05-16 22:55:29', '2025-05-16 22:55:29'),
(148, 14, 16, NULL, 'like', '@vikram liked your post.', NULL, '2025-05-16 22:55:32', '2025-05-16 22:55:32'),
(151, 9, 15, NULL, 'like', '@kamlesh liked your post.', NULL, '2025-05-16 23:10:02', '2025-05-16 23:10:02'),
(159, 9, 15, 286, 'like', '@kamlesh liked your post.', NULL, '2025-05-17 10:48:34', '2025-05-17 10:48:34'),
(160, 9, 15, 286, 'comment', '@kamlesh commented on your post.', 'Congratulations', '2025-05-17 10:48:42', '2025-05-17 10:48:42'),
(161, 9, 14, 286, 'like', '@vishal liked your post.', NULL, '2025-05-17 10:48:54', '2025-05-17 10:48:54'),
(163, 14, 9, 235, 'like', '@ravi liked your post.', NULL, '2025-05-17 11:01:48', '2025-05-17 11:01:48'),
(164, 16, 9, 274, 'comment', '@ravi commented on your post.', 'sdcsdcsdcsdc', '2025-05-17 14:50:56', '2025-05-17 14:50:56'),
(165, 16, 9, 274, 'comment', '@ravi commented on your post.', 'asxasas', '2025-05-17 14:50:59', '2025-05-17 14:50:59'),
(167, 16, 9, 274, 'comment', '@ravi commented on your post.', 'sdcsdcsdcd', '2025-05-17 14:51:30', '2025-05-17 14:51:30'),
(168, 16, 9, 274, 'comment', '@ravi commented on your post.', 'sdcsdc', '2025-05-17 14:51:34', '2025-05-17 14:51:34'),
(169, 16, 9, 240, 'comment', '@ravi commented on your post.', 'sdcsdcd', '2025-05-17 14:51:37', '2025-05-17 14:51:37'),
(170, 16, 9, 240, 'comment', '@ravi commented on your post.', 'dddsdcsdcsd', '2025-05-17 14:51:40', '2025-05-17 14:51:40'),
(171, 16, 9, 274, 'comment', '@ravi commented on your post.', 'scsdcsdc', '2025-05-17 14:53:42', '2025-05-17 14:53:42'),
(172, 16, 9, 274, 'comment', '@ravi commented on your post.', 'sdcsdcdcsdcsd', '2025-05-17 14:53:47', '2025-05-17 14:53:47'),
(173, 16, 9, 274, 'comment', '@ravi commented on your post.', 'dcsdcsdcsdc', '2025-05-17 14:53:50', '2025-05-17 14:53:50'),
(174, 16, 9, 274, 'comment', '@ravi commented on your post.', 'sdcsdcsdcsdcsdcsdcsdcdd', '2025-05-17 14:53:54', '2025-05-17 14:53:54'),
(175, 16, 9, 274, 'comment', '@ravi commented on your post.', 'cdcdc', '2025-05-17 15:00:48', '2025-05-17 15:00:48'),
(182, 16, 9, 274, 'like', '@ravi liked your post.', NULL, '2025-05-17 15:47:12', '2025-05-17 15:47:12'),
(183, 15, 9, 216, 'like', '@ravi liked your post.', NULL, '2025-05-17 15:56:33', '2025-05-17 15:56:33'),
(192, 19, 9, 252, 'like', '@ravi liked your post.', NULL, '2025-05-17 16:01:45', '2025-05-17 16:01:45'),
(193, 17, 9, 277, 'comment', '@ravi commented on your post.', 'hello jagdish', '2025-05-17 17:27:48', '2025-05-17 17:27:48'),
(194, 17, 9, 277, 'like', '@ravi liked your post.', NULL, '2025-05-17 17:28:08', '2025-05-17 17:28:08'),
(195, 9, 17, 286, 'comment', '@jagdish commented on your post.', 'ff', '2025-05-17 17:29:29', '2025-05-17 17:29:29'),
(196, 9, 17, 286, 'like', '@jagdish liked your post.', NULL, '2025-05-17 17:29:56', '2025-05-17 17:29:56'),
(197, 9, 17, 286, 'comment', '@jagdish commented on your post.', 'Congratulations', '2025-05-17 17:30:07', '2025-05-17 17:30:07'),
(198, 9, 17, 285, 'like', '@jagdish liked your post.', NULL, '2025-05-17 17:34:09', '2025-05-17 17:34:09'),
(200, 16, 14, NULL, 'follow', '@vishal started to following you.', NULL, '2025-05-19 09:49:05', '2025-05-19 09:49:05'),
(201, 9, 14, NULL, 'follow', '@vishal started to following you.', NULL, '2025-05-19 09:51:48', '2025-05-19 09:51:48'),
(226, 17, 9, 277, 'comment', '@ravi commented on your post.', 'dfvdfv', '2025-05-19 10:48:28', '2025-05-19 10:48:28'),
(346, 21, 15, NULL, 'follow', '@kamlesh started to following you.', NULL, '2025-05-19 11:52:35', '2025-05-19 11:52:35'),
(348, 20, 9, 257, 'like', '@ravi liked your post.', NULL, '2025-05-19 11:53:42', '2025-05-19 11:53:42'),
(349, 20, 9, 256, 'like', '@ravi liked your post.', NULL, '2025-05-19 11:53:45', '2025-05-19 11:53:45'),
(350, 9, 15, 285, 'like', '@kamlesh liked your post.', NULL, '2025-05-19 11:54:14', '2025-05-19 11:54:14'),
(351, 9, 15, 278, 'like', '@kamlesh liked your post.', NULL, '2025-05-19 11:54:15', '2025-05-19 11:54:15'),
(352, 9, 15, 261, 'like', '@kamlesh liked your post.', NULL, '2025-05-19 11:54:16', '2025-05-19 11:54:16'),
(353, 9, 15, 225, 'like', '@kamlesh liked your post.', NULL, '2025-05-19 11:54:18', '2025-05-19 11:54:18'),
(354, 9, 15, 210, 'like', '@kamlesh liked your post.', NULL, '2025-05-19 11:54:19', '2025-05-19 11:54:19'),
(355, 20, 15, 258, 'like', '@kamlesh liked your post.', NULL, '2025-05-19 11:55:00', '2025-05-19 11:55:00'),
(356, 20, 15, 257, 'like', '@kamlesh liked your post.', NULL, '2025-05-19 11:55:04', '2025-05-19 11:55:04'),
(357, 20, 15, 256, 'like', '@kamlesh liked your post.', NULL, '2025-05-19 11:55:16', '2025-05-19 11:55:16'),
(358, 20, 15, 255, 'like', '@kamlesh liked your post.', NULL, '2025-05-19 11:55:18', '2025-05-19 11:55:18'),
(359, 20, 15, 254, 'like', '@kamlesh liked your post.', NULL, '2025-05-19 11:55:21', '2025-05-19 11:55:21'),
(360, 20, 15, 253, 'like', '@kamlesh liked your post.', NULL, '2025-05-19 11:55:30', '2025-05-19 11:55:30'),
(361, 20, 15, 221, 'like', '@kamlesh liked your post.', NULL, '2025-05-19 11:55:31', '2025-05-19 11:55:31'),
(362, 20, 15, 220, 'like', '@kamlesh liked your post.', NULL, '2025-05-19 11:55:32', '2025-05-19 11:55:32'),
(363, 20, 15, 219, 'like', '@kamlesh liked your post.', NULL, '2025-05-19 11:55:33', '2025-05-19 11:55:33'),
(364, 20, 9, 219, 'comment', '@ravi commented on your post.', 'YJTY', '2025-05-19 11:55:46', '2025-05-19 11:55:46'),
(365, 20, 9, 219, 'comment', '@ravi commented on your post.', 'DRTUDRTUDJH', '2025-05-19 11:55:52', '2025-05-19 11:55:52'),
(366, 20, 9, 258, 'comment', '@ravi commented on your post.', 'DTFHDFTJHT', '2025-05-19 11:56:07', '2025-05-19 11:56:07'),
(367, 9, 15, 286, 'comment', '@kamlesh commented on your post.', 'rfr', '2025-05-19 12:35:42', '2025-05-19 12:35:42'),
(377, 14, 9, 235, 'comment', '@ravi commented on your post.', 'dddd', '2025-05-19 15:01:06', '2025-05-19 15:01:06'),
(381, 21, 9, 259, 'like', '@ravi liked your post.', NULL, '2025-05-19 15:39:20', '2025-05-19 15:39:20'),
(401, 9, 14, 286, 'comment', '@vishal commented on your post.', 'Nice', '2025-05-19 16:25:40', '2025-05-19 16:25:40'),
(404, 20, 9, 258, 'like', '@ravi liked your post.', NULL, '2025-05-19 16:36:05', '2025-05-19 16:36:05'),
(405, 14, 9, 234, 'like', '@ravi liked your post.', NULL, '2025-05-19 17:13:21', '2025-05-19 17:13:21'),
(427, 17, 9, 116, 'like', '@ravi liked your comment.', NULL, '2025-05-19 17:45:43', '2025-05-19 17:45:43'),
(428, 17, 9, 117, 'like', '@ravi liked your comment.', NULL, '2025-05-19 17:45:44', '2025-05-19 17:45:44'),
(429, 15, 9, 124, 'like', '@ravi liked your comment.', NULL, '2025-05-19 17:45:45', '2025-05-19 17:45:45'),
(430, 9, 14, 138, 'like', '@vishal liked your comment.', NULL, '2025-05-19 17:57:47', '2025-05-19 17:57:47'),
(431, 9, 14, 136, 'like', '@vishal liked your comment.', NULL, '2025-05-19 17:57:48', '2025-05-19 17:57:48'),
(432, 9, 14, 135, 'like', '@vishal liked your comment.', NULL, '2025-05-19 17:57:58', '2025-05-19 17:57:58'),
(433, 9, 14, 134, 'like', '@vishal liked your comment.', NULL, '2025-05-19 17:57:59', '2025-05-19 17:57:59'),
(436, 9, 16, 286, 'like', '@vikram liked your post.', NULL, '2025-05-19 17:58:20', '2025-05-19 17:58:20'),
(437, 9, 16, 138, 'like', '@vikram liked your comment.', NULL, '2025-05-19 17:58:21', '2025-05-19 17:58:21'),
(438, 14, 16, 137, 'like', '@vikram liked your comment.', NULL, '2025-05-19 17:58:22', '2025-05-19 17:58:22'),
(439, 9, 16, 136, 'like', '@vikram liked your comment.', NULL, '2025-05-19 17:58:23', '2025-05-19 17:58:23'),
(440, 9, 16, 135, 'like', '@vikram liked your comment.', NULL, '2025-05-19 17:58:24', '2025-05-19 17:58:24'),
(441, 9, 15, 138, 'like', '@kamlesh liked your comment.', NULL, '2025-05-19 17:58:40', '2025-05-19 17:58:40'),
(442, 14, 15, 137, 'like', '@kamlesh liked your comment.', NULL, '2025-05-19 17:58:41', '2025-05-19 17:58:41'),
(443, 9, 15, 136, 'like', '@kamlesh liked your comment.', NULL, '2025-05-19 17:58:42', '2025-05-19 17:58:42'),
(444, 9, 15, 135, 'like', '@kamlesh liked your comment.', NULL, '2025-05-19 17:58:42', '2025-05-19 17:58:42'),
(445, 9, 15, NULL, 'follow', '@kamlesh started to following you.', NULL, '2025-05-19 17:59:36', '2025-05-19 17:59:36'),
(448, 14, 9, 137, 'like', '@ravi liked your comment.', NULL, '2025-05-19 18:02:04', '2025-05-19 18:02:04'),
(450, 14, 9, 73, 'like', '@ravi liked your comment.', NULL, '2025-05-19 18:23:01', '2025-05-19 18:23:01'),
(455, 9, 19, 286, 'like', '@kishanlal liked your post.', NULL, '2025-05-19 19:19:50', '2025-05-19 19:19:50'),
(456, 9, 19, 286, 'comment', '@kishanlal commented on your post.', 'Good job...!', '2025-05-19 19:20:01', '2025-05-19 19:20:01'),
(460, 17, 19, NULL, 'follow', '@kishanlal started to following you.', NULL, '2025-05-19 19:20:38', '2025-05-19 19:20:38'),
(461, 9, 19, NULL, 'follow', '@kishanlal started to following you.', NULL, '2025-05-19 19:20:39', '2025-05-19 19:20:39'),
(462, 9, 19, 286, 'comment', '@kishanlal commented on your post.', 'Amazing...!', '2025-05-19 19:21:02', '2025-05-19 19:21:02'),
(463, 19, 9, 148, 'like', '@ravi liked your comment.', NULL, '2025-05-19 19:21:22', '2025-05-19 19:21:22'),
(464, 19, 9, 147, 'like', '@ravi liked your comment.', NULL, '2025-05-19 19:21:22', '2025-05-19 19:21:22'),
(465, 9, 19, 278, 'like', '@kishanlal liked your post.', NULL, '2025-05-19 19:22:49', '2025-05-19 19:22:49'),
(472, 21, 9, NULL, 'follow', '@ravi started to following you.', NULL, '2025-05-19 19:23:34', '2025-05-19 19:23:34'),
(473, 16, 9, NULL, 'follow', '@ravi started to following you.', NULL, '2025-05-19 19:23:35', '2025-05-19 19:23:35'),
(474, 17, 9, NULL, 'follow', '@ravi started to following you.', NULL, '2025-05-19 19:23:35', '2025-05-19 19:23:35'),
(475, 14, 9, NULL, 'follow', '@ravi started to following you.', NULL, '2025-05-19 19:23:36', '2025-05-19 19:23:36'),
(476, 15, 9, NULL, 'follow', '@ravi started to following you.', NULL, '2025-05-19 19:23:36', '2025-05-19 19:23:36'),
(477, 19, 9, NULL, 'follow', '@ravi started to following you.', NULL, '2025-05-19 19:23:37', '2025-05-19 19:23:37'),
(478, 9, 19, 286, 'comment', '@kishanlal commented on your post.', 'Amazing...!', '2025-05-19 19:25:42', '2025-05-19 19:25:42'),
(480, 19, 9, 151, 'like', '@ravi liked your comment.', NULL, '2025-05-19 19:28:31', '2025-05-19 19:28:31');

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
(222, 17, 'Hi this is Jagdish Mali', NULL, '2025-05-12 13:03:02', '2025-05-12 13:03:02'),
(225, 9, 'Good Morning', NULL, '2025-05-13 04:16:02', '2025-05-13 04:16:02'),
(227, 15, 'Hello, how are you..?', 'x1747128764.avif', '2025-05-13 09:32:44', '2025-05-13 09:32:44'),
(228, 15, NULL, 'user1747128775.jpg', '2025-05-13 09:32:55', '2025-05-13 09:32:55'),
(229, 15, NULL, 'bag1747128782.png', '2025-05-13 09:33:02', '2025-05-13 09:33:02'),
(230, 15, NULL, 'audi1747128786.png', '2025-05-13 09:33:06', '2025-05-13 09:33:06'),
(231, 15, NULL, 'iphone151747128792.png', '2025-05-13 09:33:12', '2025-05-13 09:33:12'),
(232, 14, NULL, 'x1747128840.avif', '2025-05-13 09:34:00', '2025-05-13 09:34:00'),
(233, 14, NULL, 'Capture1747128847.PNG', '2025-05-13 09:34:07', '2025-05-13 09:34:07'),
(234, 14, NULL, 'Screenshot (3)1747128853.png', '2025-05-13 09:34:13', '2025-05-13 09:34:13'),
(235, 14, NULL, 'bag1747128861.png', '2025-05-13 09:34:21', '2025-05-13 09:34:21'),
(236, 16, NULL, 'twitter1747128918.png', '2025-05-13 09:35:18', '2025-05-13 09:35:18'),
(237, 16, NULL, 'x1747128922.avif', '2025-05-13 09:35:22', '2025-05-13 09:35:22'),
(238, 16, NULL, 'bag1747128930.png', '2025-05-13 09:35:30', '2025-05-13 09:35:30'),
(239, 16, NULL, 'iphone151747128940.png', '2025-05-13 09:35:40', '2025-05-13 09:35:40'),
(240, 16, NULL, 'audi1747128950.png', '2025-05-13 09:35:50', '2025-05-13 09:35:50'),
(241, 17, NULL, 'iphone151747129009.png', '2025-05-13 09:36:49', '2025-05-13 09:36:49'),
(242, 17, 'wwdcsdcdc', 'twitter1747129016.png', '2025-05-13 09:36:56', '2025-05-13 09:36:56'),
(243, 17, NULL, 'bag1747129021.png', '2025-05-13 09:37:01', '2025-05-13 09:37:01'),
(244, 17, NULL, 'user1747129026.jpg', '2025-05-13 09:37:06', '2025-05-13 09:37:06'),
(245, 19, 'Hello', 'twitter (1)1747129122.png', '2025-05-13 09:38:42', '2025-05-13 09:38:42'),
(246, 19, 'Good Noon', 'bag1747129132.png', '2025-05-13 09:38:52', '2025-05-13 09:38:52'),
(247, 19, NULL, 'iphone151747129138.png', '2025-05-13 09:38:58', '2025-05-13 09:38:58'),
(248, 19, NULL, 'audi1747129145.png', '2025-05-13 09:39:05', '2025-05-13 09:39:05'),
(249, 19, NULL, 'Capture1747129169.PNG', '2025-05-13 09:39:29', '2025-05-13 09:39:29'),
(250, 19, NULL, 'Screenshot (2)1747129177.png', '2025-05-13 09:39:37', '2025-05-13 09:39:37'),
(251, 19, NULL, 'Screenshot (3)1747129183.png', '2025-05-13 09:39:43', '2025-05-13 09:39:43'),
(252, 19, NULL, 'Screenshot (4)1747129192.png', '2025-05-13 09:39:52', '2025-05-13 09:39:52'),
(253, 20, NULL, 'Screenshot (2)1747129364.png', '2025-05-13 09:42:44', '2025-05-13 09:42:44'),
(254, 20, NULL, 'Screenshot (4)1747129368.png', '2025-05-13 09:42:48', '2025-05-13 09:42:48'),
(255, 20, NULL, 'Screenshot (8)1747129410.png', '2025-05-13 09:43:30', '2025-05-13 09:43:30'),
(256, 20, NULL, 'Screenshot (1)1747129414.png', '2025-05-13 09:43:34', '2025-05-13 09:43:34'),
(257, 20, NULL, 'Screenshot (2)1747129421.png', '2025-05-13 09:43:41', '2025-05-13 09:43:41'),
(258, 20, NULL, 'Screenshot (4)1747129424.png', '2025-05-13 09:43:44', '2025-05-13 09:43:44'),
(259, 21, 'Hello...!', NULL, '2025-05-13 09:50:00', '2025-05-13 09:50:00'),
(261, 9, 'Good Morning...!', NULL, '2025-05-14 04:07:58', '2025-05-14 04:07:58'),
(274, 16, 'I am working at 10:22 PM', NULL, '2025-05-14 16:52:27', '2025-05-14 16:52:27'),
(277, 17, 'Good Evening...!', NULL, '2025-05-15 13:52:42', '2025-05-15 13:52:42'),
(278, 9, 'Hello', NULL, '2025-05-16 11:23:25', '2025-05-16 11:23:25'),
(285, 9, 'Its 11:40 PM and I am still working', NULL, '2025-05-16 18:10:19', '2025-05-16 18:10:19'),
(286, 9, 'New iphone', 'iphone151747459100.png', '2025-05-17 05:18:20', '2025-05-17 05:18:20');

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
(9, 'Ravi', 'ravi', 'ravi@gmail.com', 'dd4b21e9ef71e1291183a46b913ae6f2', '2003-04-02', 'Web Developer', 'verified1747475194.png', 'Capture1747475194.PNG', 'May 2025', '2025-05-07 12:33:11', '2025-05-07 12:33:11'),
(14, 'Vishal Mali', 'vishal', 'vishal@gmail.com', 'dd4b21e9ef71e1291183a46b913ae6f2', '2000-01-05', '', 'iphone151747054065.png', 'audi1747054065.png', 'May 2025', '2025-05-09 05:43:41', '2025-05-09 05:43:41'),
(15, 'Kamlesh Mali', 'kamlesh', 'kamlesh@gmail.com', 'dd4b21e9ef71e1291183a46b913ae6f2', '1999-11-13', 'Welcome to my profile', 'user1747054348.jpg', 'Capture1747054348.PNG', 'May 2025', '2025-05-09 05:44:20', '2025-05-09 05:44:20'),
(16, 'Vikram Mali', 'vikram', 'vikram@gmail.com', 'dd4b21e9ef71e1291183a46b913ae6f2', '2002-05-10', '', 'happy1747416317.png', 'Capture1747054575.PNG', 'May 2025', '2025-05-09 05:44:51', '2025-05-09 05:44:51'),
(17, 'Jagdish Mali', 'jagdish', 'jagdish@gmail.com', 'dd4b21e9ef71e1291183a46b913ae6f2', '1998-01-01', 'Agrawal Kitchen Solutions', 'grok1747055000.png', 'background1747055000.PNG', 'May 2025', '2025-05-09 05:45:26', '2025-05-09 05:45:26'),
(19, 'Kishan Lal', 'kishanlal', 'kishanlal@gmail.com', 'dd4b21e9ef71e1291183a46b913ae6f2', '1975-01-01', '', 'bag1747663162.png', 'Capture1747054706.PNG', 'May 2025', '2025-05-09 05:46:56', '2025-05-09 05:46:56'),
(20, 'Ravi Mali', 'ravimali', 'ravimali@gmail.com', 'dd4b21e9ef71e1291183a46b913ae6f2', '2003-04-02', 'BCA Gold Medalist, Science day 1st Rank on district level ', 'user1746769874.jpg', 'Capture1746769812.PNG', 'May 2025', '2025-05-09 05:47:58', '2025-05-09 05:47:58'),
(21, 'Suresh Mali', 'suresh', 'suresh@gmail.com', 'dd4b21e9ef71e1291183a46b913ae6f2', '2000-01-01', '', '', '', 'May 2025', '2025-05-13 05:59:33', '2025-05-13 05:59:33');

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
  ADD KEY `user_id` (`user_id`),
  ADD KEY `from_user_id` (`from_user_id`),
  ADD KEY `fk_notifications_post` (`post_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `twitter_followers`
--
ALTER TABLE `twitter_followers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=596;

--
-- AUTO_INCREMENT for table `twitter_likes`
--
ALTER TABLE `twitter_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=713;

--
-- AUTO_INCREMENT for table `twitter_notifications`
--
ALTER TABLE `twitter_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=481;

--
-- AUTO_INCREMENT for table `twitter_posts`
--
ALTER TABLE `twitter_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=289;

--
-- AUTO_INCREMENT for table `twitter_replies`
--
ALTER TABLE `twitter_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `twitter_users`
--
ALTER TABLE `twitter_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `twitter_comments`
--
ALTER TABLE `twitter_comments`
  ADD CONSTRAINT `twitter_comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `twitter_users` (`id`),
  ADD CONSTRAINT `twitter_comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `twitter_posts` (`id`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `twitter_notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `twitter_users` (`id`) ON DELETE CASCADE;

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
