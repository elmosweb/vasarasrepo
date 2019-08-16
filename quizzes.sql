-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 16, 2019 at 08:35 AM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.3.7-2+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizzes`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) UNSIGNED NOT NULL,
  `text` varchar(41) DEFAULT NULL,
  `question_id` int(10) UNSIGNED DEFAULT NULL,
  `is_correct` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `text`, `question_id`, `is_correct`) VALUES
(1, 'Egils Levits', 1, 1),
(2, 'Raimonds Vējonis', 1, 0),
(3, 'Valdis Zatlers', 1, 0),
(4, 'Guntis Ulmanis', 1, 0),
(5, '1925', 2, 0),
(6, '1918', 2, 1),
(7, '1986', 2, 0),
(8, '1881', 2, 0),
(9, 'Jā', 4, 1),
(10, 'Nē', 4, 0),
(11, 'Nē', 4, 0),
(12, 'Nē', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `attempts`
--

CREATE TABLE `attempts` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `quiz_id` int(10) UNSIGNED NOT NULL,
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attempts`
--

INSERT INTO `attempts` (`user_id`, `quiz_id`, `id`) VALUES
(28, 1, 1),
(28, 1, 2),
(28, 1, 3),
(28, 1, 4),
(28, 1, 5),
(28, 1, 6),
(28, 1, 7),
(28, 1, 8),
(28, 1, 9),
(28, 1, 10),
(28, 1, 11),
(28, 1, 12),
(28, 1, 13),
(28, 1, 14),
(28, 1, 15),
(28, 1, 16),
(28, 1, 17),
(28, 1, 18),
(28, 1, 19),
(28, 1, 20),
(28, 1, 21),
(28, 1, 22),
(28, 1, 23),
(28, 1, 24),
(28, 1, 25),
(28, 1, 26),
(28, 1, 27),
(28, 1, 28),
(28, 1, 29),
(28, 1, 30),
(28, 1, 31),
(28, 1, 32),
(28, 1, 33),
(28, 1, 34),
(28, 1, 35),
(28, 1, 36),
(28, 1, 37),
(28, 1, 38),
(28, 2, 39),
(28, 1, 40),
(28, 1, 41),
(28, 1, 42),
(28, 1, 43),
(28, 1, 44),
(28, 1, 45),
(28, 1, 46),
(28, 1, 47),
(28, 1, 48),
(28, 1, 49),
(28, 1, 50),
(28, 1, 51),
(28, 1, 52),
(28, 1, 53),
(28, 1, 54),
(28, 1, 55),
(28, 1, 56),
(28, 1, 57),
(28, 1, 58),
(28, 1, 59),
(28, 1, 60),
(28, 1, 61),
(28, 1, 62),
(28, 1, 63),
(28, 1, 64),
(28, 1, 65),
(28, 1, 66),
(28, 1, 67),
(28, 1, 68),
(28, 1, 69),
(28, 1, 70),
(28, 1, 71),
(28, 1, 72),
(28, 1, 73),
(28, 1, 74),
(28, 1, 75),
(28, 1, 76),
(28, 1, 77),
(28, 1, 78),
(28, 1, 79),
(28, 1, 80),
(28, 1, 81),
(28, 1, 82),
(28, 1, 83),
(28, 1, 84),
(28, 1, 85),
(28, 1, 86),
(28, 1, 87),
(28, 1, 88),
(28, 1, 89),
(28, 1, 90),
(28, 1, 91),
(28, 1, 92),
(28, 1, 93),
(28, 1, 94),
(28, 1, 95),
(28, 1, 96),
(28, 1, 97),
(28, 1, 98),
(28, 1, 99),
(28, 1, 100),
(28, 1, 101),
(28, 1, 102),
(28, 1, 103),
(28, 1, 104),
(28, 1, 105),
(28, 1, 106),
(28, 1, 107),
(28, 1, 108),
(28, 1, 109),
(28, 1, 110),
(28, 1, 111),
(28, 1, 112),
(28, 1, 113),
(28, 1, 114),
(28, 1, 115),
(28, 1, 116),
(28, 1, 117),
(28, 1, 118),
(28, 1, 119),
(28, 1, 120),
(28, 1, 121),
(28, 1, 122),
(28, 1, 123),
(28, 1, 124),
(28, 1, 125),
(28, 1, 126),
(28, 1, 127),
(28, 1, 128),
(28, 1, 129),
(28, 1, 130),
(28, 1, 131),
(28, 1, 132),
(28, 1, 133),
(28, 1, 134),
(28, 1, 135),
(28, 1, 136),
(28, 1, 137),
(28, 1, 138),
(28, 1, 139),
(28, 1, 140),
(28, 1, 141),
(28, 1, 142),
(28, 1, 143),
(28, 1, 144),
(28, 1, 145),
(28, 1, 146),
(28, 1, 147),
(28, 1, 148),
(28, 1, 149),
(28, 1, 150),
(28, 1, 151),
(28, 1, 152),
(28, 1, 153),
(28, 1, 154),
(28, 1, 155),
(28, 1, 156),
(28, 1, 157),
(28, 1, 158),
(28, 1, 159),
(28, 2, 160),
(28, 2, 161),
(28, 2, 162),
(28, 1, 163),
(28, 1, 164);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) UNSIGNED NOT NULL,
  `text` varchar(50) NOT NULL,
  `quiz_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `text`, `quiz_id`) VALUES
(1, 'Kas ir Latvijas prezidents?', 1),
(2, 'Kurā gadā ir dibināta Latvijas republika?', 1),
(4, 'Vai sanāca ko izveidot?', 2);

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `title`) VALUES
(1, 'Tests par Latviju'),
(2, 'Tests par progresu');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(28, 'abc', 'abc@abc.com', '$2y$10$PMyQjcmtpjjK8hQyJTtbDuvBUgb2AXM4OgA.fPna8Anv/3nvLpoJG'),
(29, 'elmars', 'abc2@abc.com', '$2y$10$N/EnUG.3fV5B67NUiuThOOY4a.zyOnJUrW1CeE61QR5vXS34/QwK6'),
(30, 'elmars', 'elmars@elmars.com', '$2y$10$cxi4ZZPEekhVXE.8yT5MJeBHwgYVbZ8N215nEf0FkeSpxniLhLTBS'),
(31, 'abc', 'eineraa@inbox.lv', '$2y$10$AA00924EjUsiX9S4YXHwf.gh9nTg7og6O7BySS3hGSbcslRgG0w.e');

-- --------------------------------------------------------

--
-- Table structure for table `user_answers`
--

CREATE TABLE `user_answers` (
  `id` int(11) UNSIGNED NOT NULL,
  `answer_id` int(10) UNSIGNED NOT NULL,
  `attempt_id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_answers`
--

INSERT INTO `user_answers` (`id`, `answer_id`, `attempt_id`, `question_id`) VALUES
(13, 1, 1, 1),
(14, 5, 1, 2),
(15, 1, 2, 1),
(16, 5, 2, 2),
(17, 1, 4, 1),
(18, 5, 4, 2),
(19, 1, 5, 1),
(20, 5, 5, 2),
(21, 1, 6, 1),
(22, 5, 6, 2),
(23, 4, 7, 1),
(24, 5, 7, 2),
(25, 1, 8, 1),
(26, 5, 8, 2),
(27, 4, 9, 1),
(28, 1, 10, 1),
(29, 5, 10, 2),
(30, 4, 11, 1),
(31, 5, 11, 2),
(32, 1, 12, 1),
(33, 5, 12, 2),
(34, 1, 13, 1),
(35, 5, 13, 2),
(36, 1, 14, 1),
(37, 5, 14, 2),
(38, 1, 15, 1),
(39, 5, 15, 2),
(40, 1, 17, 1),
(41, 5, 17, 2),
(42, 1, 18, 1),
(43, 5, 18, 2),
(44, 1, 19, 1),
(45, 5, 19, 2),
(46, 1, 20, 1),
(47, 5, 20, 2),
(48, 1, 21, 1),
(49, 5, 21, 2),
(50, 1, 38, 1),
(51, 5, 38, 2),
(52, 1, 40, 1),
(53, 1, 60, 1),
(54, 5, 60, 2),
(55, 1, 64, 1),
(56, 5, 64, 2),
(57, 1, 65, 1),
(58, 5, 65, 2),
(59, 3, 70, 1),
(60, 1, 88, 1),
(61, 5, 88, 2),
(62, 1, 90, 1),
(63, 5, 90, 2),
(64, 1, 91, 1),
(65, 5, 91, 2),
(66, 1, 92, 1),
(67, 5, 92, 2),
(68, 1, 95, 1),
(69, 5, 95, 2),
(70, 1, 96, 1),
(71, 5, 96, 2),
(72, 1, 98, 1),
(73, 5, 98, 2),
(74, 3, 99, 1),
(75, 7, 99, 2),
(76, 1, 100, 1),
(77, 5, 100, 2),
(78, 1, 102, 1),
(79, 5, 102, 2),
(80, 1, 103, 1),
(81, 5, 103, 2),
(82, 1, 104, 1),
(83, 5, 104, 2),
(84, 1, 105, 1),
(85, 5, 105, 2),
(86, 1, 106, 1),
(87, 5, 106, 2),
(88, 3, 107, 1),
(89, 7, 107, 2),
(90, 1, 108, 1),
(91, 7, 108, 2),
(92, 1, 109, 1),
(93, 5, 109, 2),
(94, 1, 110, 1),
(95, 5, 110, 2),
(96, 1, 111, 1),
(97, 5, 111, 2),
(98, 1, 113, 1),
(99, 5, 113, 2),
(100, 3, 114, 1),
(101, 7, 114, 2),
(102, 1, 115, 1),
(103, 6, 115, 2),
(104, 1, 116, 1),
(105, 5, 116, 2),
(106, 1, 125, 1),
(107, 5, 125, 2),
(108, 1, 135, 1),
(109, 6, 135, 2),
(110, 1, 136, 1),
(111, 6, 136, 2),
(112, 1, 137, 1),
(113, 5, 137, 2),
(114, 1, 138, 1),
(115, 6, 138, 2),
(116, 1, 139, 1),
(117, 6, 139, 2),
(118, 1, 142, 1),
(119, 5, 142, 2),
(120, 1, 143, 1),
(121, 5, 143, 2),
(122, 1, 144, 1),
(123, 5, 144, 2),
(124, 1, 145, 1),
(125, 5, 145, 2),
(126, 1, 146, 1),
(127, 5, 146, 2),
(128, 1, 147, 1),
(129, 5, 147, 2),
(130, 1, 148, 1),
(131, 5, 148, 2),
(132, 1, 149, 1),
(133, 5, 149, 2),
(134, 1, 150, 1),
(135, 5, 150, 2),
(136, 1, 151, 1),
(137, 5, 151, 2),
(138, 1, 152, 1),
(139, 5, 152, 2),
(140, 1, 153, 1),
(141, 5, 153, 2),
(142, 1, 154, 1),
(143, 5, 154, 2),
(144, 2, 155, 1),
(145, 6, 155, 2),
(146, 1, 156, 1),
(147, 6, 156, 2),
(148, 1, 157, 1),
(149, 6, 157, 2),
(150, 1, 158, 1),
(151, 6, 158, 2),
(152, 1, 159, 1),
(153, 5, 159, 2),
(154, 9, 160, 4),
(155, 1, 163, 1),
(156, 6, 163, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answers_questions_id_fk` (`question_id`);

--
-- Indexes for table `attempts`
--
ALTER TABLE `attempts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attempts_quizzes_id_fk` (`quiz_id`),
  ADD KEY `attempts_users_id_fk` (`user_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_quizzes_id_fk` (`quiz_id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_uindex` (`email`);

--
-- Indexes for table `user_answers`
--
ALTER TABLE `user_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_answers_answers_id_fk` (`answer_id`),
  ADD KEY `user_answers_questions_id_fk` (`question_id`),
  ADD KEY `user_answers_attempts_fk` (`attempt_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `attempts`
--
ALTER TABLE `attempts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user_answers`
--
ALTER TABLE `user_answers`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_questions_id_fk` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`);

--
-- Constraints for table `attempts`
--
ALTER TABLE `attempts`
  ADD CONSTRAINT `attempts_quizzes_id_fk` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`),
  ADD CONSTRAINT `attempts_users_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_quizzes_id_fk` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`);

--
-- Constraints for table `user_answers`
--
ALTER TABLE `user_answers`
  ADD CONSTRAINT `user_answers_answers_id_fk` FOREIGN KEY (`answer_id`) REFERENCES `answers` (`id`),
  ADD CONSTRAINT `user_answers_attempts_fk` FOREIGN KEY (`attempt_id`) REFERENCES `attempts` (`id`),
  ADD CONSTRAINT `user_answers_questions_id_fk` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
