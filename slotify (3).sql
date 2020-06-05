-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1:3306
-- 產生時間： 
-- 伺服器版本： 10.1.38-MariaDB
-- PHP 版本： 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `slotify`
--

-- --------------------------------------------------------

--
-- 資料表結構 `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `title` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `artist` int(11) NOT NULL,
  `genre` int(11) NOT NULL,
  `artworkPath` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `albums`
--

INSERT INTO `albums` (`id`, `title`, `artist`, `genre`, `artworkPath`) VALUES
(1, 'Bacon and Eggs', 2, 4, 'assets/images/artwork/s1.jpg'),
(2, 'Pizza head', 5, 10, 'assets/images/artwork/s2.jpg'),
(3, 'Summer Hits', 3, 1, 'assets/images/artwork/s3.jpg'),
(4, 'The movie soundtrack', 2, 9, 'assets/images/artwork/s4.jpg'),
(5, 'Best of the Worst', 1, 3, 'assets/images/artwork/s5.jpg'),
(6, 'Hello World', 3, 6, 'assets/images/artwork/s6.jpg'),
(7, 'Best beats', 4, 7, 'assets/images/artwork/s7.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `artists`
--

CREATE TABLE `artists` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `artists`
--

INSERT INTO `artists` (`id`, `name`) VALUES
(1, 'Mickey Mouse '),
(2, 'Goofy'),
(3, 'Bart Simpson'),
(4, 'Homer'),
(5, 'Bruce Lee');

-- --------------------------------------------------------

--
-- 資料表結構 `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `genres`
--

INSERT INTO `genres` (`id`, `name`) VALUES
(1, 'Rock'),
(2, 'Pop'),
(3, 'Hip-Hop'),
(4, 'Rap'),
(5, 'R&B'),
(6, 'Classical'),
(7, 'Techno'),
(8, 'Jazz'),
(9, 'Folk'),
(10, 'Country');

-- --------------------------------------------------------

--
-- 資料表結構 `lyric`
--

CREATE TABLE `lyric` (
  `id` int(250) NOT NULL,
  `songId` int(250) NOT NULL,
  `time` decimal(65,6) NOT NULL,
  `word` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `lyric`
--

INSERT INTO `lyric` (`id`, `songId`, `time`, `word`) VALUES
(1, 27, '1.000000', 'book'),
(2, 27, '9.000000', 'face'),
(3, 27, '16.000000', 'stu');

-- --------------------------------------------------------

--
-- 資料表結構 `playlists`
--

CREATE TABLE `playlists` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dateCreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `playlists`
--

INSERT INTO `playlists` (`id`, `name`, `owner`, `dateCreated`) VALUES
(3, 'suckcat', 'm12345', '2020-05-06 00:00:00'),
(9, '😋😋😋😋😋', 'm12345', '2020-05-08 00:00:00'),
(10, '✿🌸🌼🌷✿', 'm12345', '2020-05-12 00:00:00'),
(17, 'lunch', 'm12345', '2020-05-13 00:00:00'),
(20, 'aaa', 'a12345', '2020-06-02 00:00:00'),
(21, 'dddd', 'a12345', '2020-06-02 00:00:00'),
(22, 'ffff', 'a12345', '2020-06-02 00:00:00'),
(23, 'aaaa', 'a12345', '2020-06-02 00:00:00'),
(24, '4852', 'a12345', '2020-06-02 00:00:00'),
(25, '1q3we5a3wertrse', 'a12345', '2020-06-02 00:00:00'),
(26, '123456789', 'a12345', '2020-06-02 00:00:00'),
(27, '', 'a12345', '2020-06-02 00:00:00'),
(28, 'jijiji', 'a12345', '2020-06-02 00:00:00'),
(29, 'hey', 'a12345', '2020-06-02 00:00:00'),
(30, 'aaaaappp', 'a12345', '2020-06-02 00:00:00'),
(31, 'abc2123', 'a12345', '2020-06-02 00:00:00'),
(32, '3456', 'a12345', '2020-06-02 00:00:00'),
(33, 'cc', 'a12345', '2020-06-02 00:00:00'),
(34, '00', 'a12345', '2020-06-02 00:00:00'),
(35, '1', 'a12345', '2020-06-02 00:00:00'),
(36, '12', 'a12345', '2020-06-02 00:00:00'),
(37, '1', 'a12345', '2020-06-02 00:00:00'),
(38, '33333333+++++++', 'a12345', '2020-06-02 00:00:00'),
(39, 'nnnnnnnnn', 'a12345', '2020-06-02 00:00:00'),
(40, 'zzz', 'a12345', '2020-06-02 00:00:00'),
(41, 'z', 'a12345', '2020-06-02 00:00:00'),
(42, 'hello', 'hihicherry', '2020-06-04 00:00:00'),
(43, 'dd', 'hihicherry', '2020-06-04 00:00:00'),
(44, '12314', 'debbie2', '2020-06-04 00:00:00'),
(45, 'ji3', 'debbie2', '2020-06-04 00:00:00');

-- --------------------------------------------------------

--
-- 資料表結構 `playlistsongs`
--

CREATE TABLE `playlistsongs` (
  `id` int(11) NOT NULL,
  `songId` int(11) NOT NULL,
  `playlistId` int(11) NOT NULL,
  `playlistOrder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `playlistsongs`
--

INSERT INTO `playlistsongs` (`id`, `songId`, `playlistId`, `playlistOrder`) VALUES
(9, 6, 10, 1),
(10, 11, 10, 2),
(36, 9, 3, 3),
(39, 6, 21, 1),
(40, 8, 21, 2),
(41, 6, 23, 1),
(46, 23, 20, 1),
(47, 17, 42, 1),
(48, 16, 43, 1),
(50, 21, 0, 1),
(61, 1, 44, 3),
(62, 7, 44, 4),
(63, 8, 44, 5),
(64, 6, 45, 1),
(65, 6, 44, 6),
(66, 24, 44, 7),
(67, 25, 44, 8),
(68, 25, 0, 2),
(69, 23, 44, 9),
(70, 24, 45, 2),
(71, 1, 45, 3),
(72, 3, 45, 4),
(73, 3, 44, 10),
(74, 5, 44, 11),
(75, 22, 44, 12),
(76, 20, 44, 13);

-- --------------------------------------------------------

--
-- 資料表結構 `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `title` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `artist` int(11) NOT NULL,
  `album` int(11) NOT NULL,
  `genre` int(11) NOT NULL,
  `duration` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `albumOrder` int(11) NOT NULL,
  `plays` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `songs`
--

INSERT INTO `songs` (`id`, `title`, `artist`, `album`, `genre`, `duration`, `path`, `albumOrder`, `plays`) VALUES
(1, 'Acoustic Breeze', 1, 5, 8, '2:37', 'assets/music/bensound-acousticbreeze.mp3', 1, 94),
(2, 'A new beginning', 1, 5, 1, '2:35', 'assets/music/bensound-anewbeginning.mp3', 2, 76),
(3, 'Better Days', 1, 5, 2, '2:33', 'assets/music/bensound-betterdays.mp3', 3, 53),
(4, 'Buddy', 1, 5, 3, '2:02', 'assets/music/bensound-buddy.mp3', 4, 79),
(5, 'Clear Day', 1, 5, 4, '1:29', 'assets/music/bensound-clearday.mp3', 5, 57),
(6, 'Going Higher', 2, 1, 1, '4:04', 'assets/music/bensound-goinghigher.mp3', 1, 99),
(7, 'Funny song', 2, 4, 2, '3:07', 'assets/music/bensound-funnysong.mp3', 2, 91),
(8, 'Funky Element', 2, 1, 3, '3:08', 'assets/music/bensound-funkyelement.mp3', 2, 78),
(9, 'Extreme Action', 2, 1, 4, '8:03', 'assets/music/bensound-extremeaction.mp3', 3, 75),
(10, 'Epic', 2, 4, 5, '2:58', 'assets/music/bensound-epic.mp3', 3, 102),
(11, 'Energy', 2, 1, 6, '2:59', 'assets/music/bensound-energy.mp3', 4, 87),
(12, 'Dubstep', 2, 1, 7, '2:03', 'assets/music/bensound-dubstep.mp3', 5, 61),
(13, 'Happiness', 3, 6, 8, '4:21', 'assets/music/bensound-happiness.mp3', 5, 78),
(14, 'Happy Rock', 3, 6, 9, '1:45', 'assets/music/bensound-happyrock.mp3', 4, 88),
(15, 'Jazzy Frenchy', 3, 6, 10, '1:44', 'assets/music/bensound-jazzyfrenchy.mp3', 3, 72),
(16, 'Little Idea', 3, 6, 1, '2:49', 'assets/music/bensound-littleidea.mp3', 2, 81),
(17, 'Memories', 3, 6, 2, '3:50', 'assets/music/bensound-memories.mp3', 1, 82),
(18, 'Moose', 4, 7, 1, '2:43', 'assets/music/bensound-moose.mp3', 5, 73),
(19, 'November', 4, 7, 2, '3:32', 'assets/music/bensound-november.mp3', 4, 72),
(20, 'Of Elias Dream', 4, 7, 3, '4:58', 'assets/music/bensound-ofeliasdream.mp3', 3, 75),
(21, 'Pop Dance', 4, 7, 2, '2:42', 'assets/music/bensound-popdance.mp3', 2, 87),
(22, 'Retro Soul', 4, 7, 5, '3:36', 'assets/music/bensound-retrosoul.mp3', 1, 77),
(23, 'Sad Day', 5, 2, 1, '2:28', 'assets/music/bensound-sadday.mp3', 1, 92),
(24, 'Sci-fi', 5, 2, 2, '4:44', 'assets/music/bensound-scifi.mp3', 2, 93),
(25, 'Slow Motion', 5, 2, 3, '3:26', 'assets/music/bensound-slowmotion.mp3', 3, 59),
(27, '慢慢喜歡你', 2, 1, 1, '5:43', 'assets/music/mo-wen-wei-man-man-xi-huan-ni.mp3', 6, 114);

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `signUpDate` datetime NOT NULL,
  `profilePic` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`id`, `username`, `firstName`, `lastName`, `email`, `password`, `signUpDate`, `profilePic`) VALUES
(1, 'Debbie', 'Yi', 'Lin', '410112018@gms.ndhu.edu.tw', '1c63129ae9db9c60c3e8aa94d3e00495', '2020-04-23 00:00:00', '-Pic'),
(2, 'Amanda', 'Two', 'Lin', '410112017@gms.ndhu.edu.tw', 'e10adc3949ba59abbe56e057f20f883e', '2020-04-23 00:00:00', '-Pic'),
(3, 'Apple', 'Three', 'Lin', '4101120@gms.ndhu.edu.tw', '827ccb0eea8a706c4c34a16891f84e7b', '2020-04-23 00:00:00', '-Pic'),
(4, 'm12345', 'Ykkkk', 'Wu', 'B12345@yahoo.com.tw', 'ea16f6597913ed751d4bd8f503ec4ff1', '2020-04-23 00:00:00', '-Pic'),
(5, 'm24680', 'Ykkkk', 'Ykkkk', 'Bb@yahoo.com.tw', '9256f177e09e1f3f6f860a86373b3aad', '2020-04-23 00:00:00', '-Pic'),
(6, 'JingHao', 'Huang', 'Jinghao', 'I_dont_know@gmail.com', '1c63129ae9db9c60c3e8aa94d3e00495', '2020-04-30 00:00:00', '-Pic'),
(7, 'deatpeant', 'Natsume', 'Yohane', 'A78459111@hotmail.com', 'fcea920f7412b5da7be0cf42b8c93759', '2020-05-04 00:00:00', '-Pic'),
(8, 'Debbie1', 'Yi-xian', 'Lin', '4101120161@gms.ndhu.edu.tw', 'c4bb98da9aaf4898534f664a1eee5993', '2020-05-14 00:00:00', '-Pic'),
(9, 'Debbie2', 'Debbie', 'Lin', '41011201811@gms.ndhu.edu.tw', '6832815e8e70c7fd0c39d8e49d4a0e77', '2020-05-14 00:00:00', '-Pic'),
(10, 'cherrybae', 'Cherry', 'Chung', 'Bubibuuu@gmail.com', '25d55ad283aa400af464c76d713c07ad', '2020-05-22 00:00:00', '-Pic'),
(11, 'a12345', 'A12345', 'A12345', 'Admin2@admin.com', 'af8f9dffa5d420fbc249141645b962ee', '2020-06-02 00:00:00', '-Pic'),
(12, 'hihicherry', 'Cherry', 'Chung', 'Cherry@gmail.com', '25d55ad283aa400af464c76d713c07ad', '2020-06-04 00:00:00', '-Pic');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `lyric`
--
ALTER TABLE `lyric`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `playlistsongs`
--
ALTER TABLE `playlistsongs`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動增長(AUTO_INCREMENT)
--

--
-- 使用資料表自動增長(AUTO_INCREMENT) `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `lyric`
--
ALTER TABLE `lyric`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `playlistsongs`
--
ALTER TABLE `playlistsongs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
