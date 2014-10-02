-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2014 at 06:54 AM
-- Server version: 5.5.36
-- PHP Version: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `laraveltest`
--

-- --------------------------------------------------------

--
-- Table structure for table `quizz_answer`
--

CREATE TABLE IF NOT EXISTS `quizz_answer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `answer_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `question_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `answer_question_id_foreign` (`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=72 ;

--
-- Dumping data for table `quizz_answer`
--

INSERT INTO `quizz_answer` (`id`, `answer_title`, `question_id`, `created_at`, `updated_at`) VALUES
(5, 'a. Prevent pollution of global scope ', 1, '2014-08-13 03:55:09', '2014-08-13 03:55:09'),
(6, 'b. Encapsulation', 1, '2014-08-13 03:55:27', '2014-08-18 02:38:04'),
(13, 'a. fn.apply(this, stringsArray)', 3, '2014-08-13 05:54:53', '2014-08-13 05:54:53'),
(14, 'b. fn.call(this, stringsArray)', 3, '2014-08-13 05:55:05', '2014-08-13 05:55:05'),
(15, 'c. fn.bind(this, stringsArray)', 3, '2014-08-13 05:55:18', '2014-08-13 05:55:18'),
(24, 'a. <div> and <span>', 2, '2014-08-13 09:18:36', '2014-08-13 09:18:36'),
(25, 'b. <tr> and <td>', 2, '2014-08-13 09:18:55', '2014-08-13 09:18:55'),
(26, 'c. <ul> and <li>', 2, '2014-08-13 09:19:13', '2014-08-13 09:19:13'),
(27, 'd. <p> and <br>', 2, '2014-08-13 09:19:35', '2014-08-13 09:19:35'),
(28, 'f.  none of these', 2, '2014-08-13 09:19:52', '2014-08-13 09:19:52'),
(29, 'e.  all of these', 2, '2014-08-13 09:20:08', '2014-08-20 04:47:20'),
(31, 'a. getElementById("outer").children[0]', 5, '2014-08-13 09:25:19', '2014-08-13 09:25:19'),
(32, 'b. getElementsByClassName("inner")[0]', 5, '2014-08-13 09:25:33', '2014-08-13 09:25:33'),
(33, 'a. 1', 6, '2014-08-13 09:29:00', '2014-08-13 09:29:00'),
(34, 'b. 2', 6, '2014-08-13 09:29:10', '2014-08-13 09:29:10'),
(35, 'c. 3', 6, '2014-08-13 09:29:21', '2014-08-13 09:29:21'),
(37, 'a. <ul> and <li>', 4, '2014-08-13 12:47:28', '2014-08-13 12:47:28'),
(38, 'b. <tr> and <td>', 4, '2014-08-13 12:47:51', '2014-08-13 12:47:51'),
(39, 'c. <div> and <span>', 4, '2014-08-13 12:48:10', '2014-08-13 12:48:10'),
(59, 'c. Private properties and methods', 1, '2014-08-16 06:40:49', '2014-08-16 06:51:59'),
(60, 'd. Allow conditional use of ‘strict mode’', 1, '2014-08-16 06:52:16', '2014-08-16 06:52:54'),
(63, 'a. I''m Vibol', 8, '2014-08-17 01:00:08', '2014-08-17 01:00:08'),
(64, 'b. I''am Dara', 8, '2014-08-17 01:00:35', '2014-08-17 01:02:30'),
(66, 'c. I Citha', 8, '2014-08-17 01:02:08', '2014-08-17 01:02:40'),
(67, 'a. I am 28 years old.', 9, '2014-08-17 01:03:55', '2014-08-17 01:03:55'),
(68, 'b. I''m 28 year old.', 9, '2014-08-17 01:04:29', '2014-08-17 01:04:29'),
(69, 'c. I 28 years old.', 9, '2014-08-17 01:04:52', '2014-08-17 01:04:52'),
(70, 'ss', 20, '2014-08-22 02:09:14', '2014-08-22 02:09:14'),
(71, 'dd', 20, '2014-08-22 02:09:19', '2014-08-22 02:09:19');

-- --------------------------------------------------------

--
-- Table structure for table `quizz_migrations`
--

CREATE TABLE IF NOT EXISTS `quizz_migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quizz_migrations`
--

INSERT INTO `quizz_migrations` (`migration`, `batch`) VALUES
('2014_08_12_051032_create_users_table', 1),
('2014_08_12_051032_create_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quizz_question`
--

CREATE TABLE IF NOT EXISTS `quizz_question` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `topic` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `correct_answer` smallint(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `quizz_question`
--

INSERT INTO `quizz_question` (`id`, `topic`, `correct_answer`, `created_at`, `updated_at`) VALUES
(1, 'Which is not an advantage of using a closure ?', 6, '2014-08-13 03:44:31', '2014-08-17 08:26:41'),
(2, 'To create a columned list of two­line email subjects and dates for a master­detail view, which are the most semantically correct? ', 25, '2014-08-13 04:04:28', '2014-08-13 09:20:25'),
(3, 'To pass an array of strings to a function, you should not use...', 14, '2014-08-13 05:54:41', '2014-08-13 05:55:24'),
(4, '____ and ____ would be the HTML tags you would use to display a menu item and its description.', 37, '2014-08-13 09:21:00', '2014-08-13 12:48:18'),
(5, 'Given <div id="outer"><div id="inner"></div></div>, which of these two is the most performant way to select the inner div?', 31, '2014-08-13 09:24:42', '2014-08-13 09:25:57'),
(6, 'Given this :\r\nangular.module(‘myModule’,[]).service(‘myService’,(function() {\r\nvar message = “Message one!”\r\nvar getMessage = function() {\r\nreturn this.message\r\n}\r\nthis.message = “Message two!”\r\nthis.getMessage = function() { return message }\r\nreturn function() {\r\nreturn {\r\ngetMessage: getMessage, message: “Message three!”\r\n}\r\n}\r\n})())\r\nWhich message will be returned by  injecting this service and executing “myService.getMessage()”', 34, '2014-08-13 09:27:55', '2014-08-13 10:28:37'),
(8, 'what is your name?\r\n', 63, '2014-08-17 00:59:37', '2014-08-17 01:02:55'),
(9, 'how old are you?', 67, '2014-08-17 01:03:21', '2014-08-17 01:04:58');

-- --------------------------------------------------------

--
-- Table structure for table `quizz_results`
--

CREATE TABLE IF NOT EXISTS `quizz_results` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `score` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `question_quizzler_answer` longtext COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `results_user_id_foreign` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=93 ;

--
-- Dumping data for table `quizz_results`
--

INSERT INTO `quizz_results` (`id`, `user_id`, `score`, `question_quizzler_answer`, `active`, `created_at`, `updated_at`) VALUES
(80, 5, '100', '{"1":"6","2":"25","3":"14","4":"37","5":"31","6":"34","8":"63","9":"67"}', 0, '2014-08-18 01:54:36', '2014-08-22 02:28:19'),
(88, 4, '75', '{"9":"67","8":"63","6":"34","5":"31","4":"38","3":"14","2":"25","1":"59"}', 0, '2014-08-22 01:32:08', '2014-08-22 01:32:09'),
(92, 1, '75', '{"9":"67","8":"64","6":"34","5":"31","4":"37","3":"13","2":"25","1":"6"}', 1, '2014-08-22 05:27:05', '2014-08-22 05:27:06');

-- --------------------------------------------------------

--
-- Table structure for table `quizz_users`
--

CREATE TABLE IF NOT EXISTS `quizz_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'uploads/users/facepic.png',
  `firstname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_role_id` int(10) unsigned NOT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sex` smallint(6) NOT NULL,
  `age` smallint(6) NOT NULL,
  `date_birth` date NOT NULL,
  `about` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` text COLLATE utf8_unicode_ci NOT NULL,
  `link_in` text COLLATE utf8_unicode_ci NOT NULL,
  `skype` text COLLATE utf8_unicode_ci NOT NULL,
  `google_plus` text COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  KEY `users_user_role_id_foreign` (`user_role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `quizz_users`
--

INSERT INTO `quizz_users` (`id`, `username`, `email`, `picture`, `firstname`, `lastname`, `password`, `address`, `user_role_id`, `city`, `country`, `phone`, `sex`, `age`, `date_birth`, `about`, `facebook`, `link_in`, `skype`, `google_plus`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'younsinkim@yahoo.com', 'uploads/users/facepic.png', 'Sinkim', 'Yun', '$2y$10$lqVGiOwz.8dDvki63QubB.HghQrqFm7ngPLihlWZ03VU7FIr.lWb.', 'Phnom Penh', 2, '', '', '', 1, 27, '0000-00-00', '', '', '', '', '', 1, 'O1LlxwpZCY1dC2NvrC0miWkXVJJPCb9jIvWfAHIGxATxkBL6kDJMJOo9kqac', '2014-08-12 20:43:22', '2014-09-30 03:59:52'),
(4, 'user', 'dara.chan@yahoo.com', 'uploads/users/facepic.png', 'Dara', 'Chan', '$2y$10$3ALIdLStmpNO2H1GSDToKuE6lmkAxAuI8QU6KNALtjb4gI8VWDPga', 'PP cambodia', 1, '', 'AL', '', 0, 0, '0000-00-00', '', '', '', '', '', 1, 'f7kgsxioObStFKV0kgELXYFN4DL4T2RVdIMBRXoMwto6LqMicWN7bWFZpApv', '2014-08-13 11:58:10', '2014-09-30 03:01:51'),
(5, 'vibol', 'vibol.yun@yahoo.com', 'uploads/users/facepic.png', 'Vibol', 'Yun', '$2y$10$rK7lG9Sym3IGPSKpqYSxXuvnxjntg7oapFAtD0DDjM/o3unUmdHZy', 'phnom penh', 1, '', 'DZ', '', 0, 0, '0000-00-00', '', '', '', '', '', 1, 'dkp9TaLRdqGjDCmzNgNGPRFf7KB4NfiQiBizt9tBuTvcTSgpWaf95zEYh8ZX', '2014-08-18 01:04:38', '2014-08-22 02:26:45'),
(6, 'kimlai', 'kimlai.heang@yahoo.com', 'uploads/users/facepic.png', 'kimlai', 'heang', '$2y$10$HHstXcCxpdCLgM11AAgifuZtuXPvdMTZE7bwg7Gcexscs2zgXBqCe', 'Battambang', 1, '', 'DZ', '', 0, 0, '0000-00-00', '', '', '', '', '', 1, 'lP2Q9XIuaPTtouAf5uNkv8iubZ8KbTdRaQYezqx7urTziqb3cE5aBMMTwYwc', '2014-08-18 01:56:30', '2014-08-22 01:35:16'),
(7, 'theara', 'theara.sgnoun@hotmail.com', 'uploads/users/facepic.png', 'theara', 'sgnoun', '$2y$10$fQsuTlrMJekL9yz1c7Ac9eA0g/HcqwYY7vSpWFs4VQk0oLZJR/BoS', 'pp', 1, '', 'AL', '', 0, 0, '0000-00-00', '', '', '', '', '', 1, 'K8MQmNMez0VSkGQp2CGPURE4kbK9nIDm3tsKOWzBWokE3OLoiZnrlrZY6kR1', '2014-08-22 01:36:28', '2014-08-22 01:36:57');

-- --------------------------------------------------------

--
-- Table structure for table `quizz_users_role`
--

CREATE TABLE IF NOT EXISTS `quizz_users_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_role_name_unique` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `quizz_users_role`
--

INSERT INTO `quizz_users_role` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Quizzler', '2014-08-12 17:00:00', '2014-08-12 17:00:00'),
(2, 'Admin', '2014-08-12 17:00:00', '2014-08-12 17:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
