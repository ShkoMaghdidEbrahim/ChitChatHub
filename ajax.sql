-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2024 at 10:48 PM
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
-- Database: `ajax`
--

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `messageID` int(11) NOT NULL,
  `sendID` int(11) NOT NULL,
  `receiveID` int(11) NOT NULL,
  `messageContent` text NOT NULL,
  `dateOfSend` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`messageID`, `sendID`, `receiveID`, `messageContent`, `dateOfSend`) VALUES
(28, 7, 9, 'slaw Areen', '2024-03-14 00:43:56'),
(29, 9, 7, 'slaw Abdulla', '2024-03-14 00:44:27'),
(30, 7, 9, 'cht peya?', '2024-03-14 00:44:41'),
(31, 9, 7, 'شەپکە دار ئەدی ئەتوو؟', '2024-03-14 00:52:58'),
(32, 7, 9, 'shapka dar', '2024-03-14 00:53:22'),
(33, 9, 7, 'بگۆڕینەوە؟', '2024-03-14 00:53:34'),
(35, 7, 9, 'day', '2024-03-14 00:56:43'),
(36, 7, 8, 'slaw', '2024-03-14 22:00:29'),
(37, 7, 8, 'choni', '2024-03-14 22:01:01'),
(38, 9, 7, 'ها بگرە ئەو تۆپەی', '2024-03-15 12:55:55'),
(39, 7, 9, 'ها بگرە ئەو کۆترەی', '2024-03-15 21:33:21'),
(40, 8, 7, 'slaw', '2024-03-28 13:22:01'),
(41, 7, 20, '! سڵاو، ئێستا ئێمە هاوڕێین', '2024-03-31 20:17:49'),
(49, 20, 7, 'بەجدی؟', '2024-03-31 21:49:37'),
(51, 20, 7, 'نەمزانیبوو!', '2024-03-31 22:04:37'),
(56, 20, 7, 'بەداخەوە', '2024-03-31 22:09:15'),
(60, 7, 20, 'بەداخەوە', '2024-03-31 22:15:52'),
(61, 23, 7, '! سڵاو، ئێستا ئێمە هاوڕێین', '2024-04-20 18:40:42'),
(62, 23, 7, 'hello', '2024-04-20 18:40:46'),
(63, 7, 23, 'Hola', '2024-04-20 18:40:54'),
(65, 23, 10, '! سڵاو، ئێستا ئێمە هاوڕێین', '2024-04-20 18:43:27'),
(68, 25, 26, '! سڵاو، ئێستا ئێمە هاوڕێین', '2024-04-20 18:56:09'),
(69, 25, 26, 'why', '2024-04-20 18:56:18'),
(70, 26, 25, 'Barast', '2024-04-20 18:56:44'),
(71, 25, 26, 'a lo chya ?', '2024-04-20 18:56:51'),
(72, 26, 25, 'کورە کوو ئەمن زۆر موهیمم', '2024-04-20 18:57:07'),
(73, 25, 26, 'chang bo nmuna ?', '2024-04-20 18:57:15'),
(74, 26, 25, 'یەک کیلۆ', '2024-04-20 18:57:26'),
(75, 25, 26, 'zor nya', '2024-04-20 18:57:33'),
(76, 26, 25, 'بۆ نا', '2024-04-20 18:57:40'),
(77, 25, 26, 'dazany ch esta', '2024-04-20 18:57:55'),
(78, 25, 26, 'ba', '2024-04-20 18:57:56'),
(79, 25, 26, 'xaray dalem', '2024-04-20 18:58:01'),
(80, 25, 26, 'blockt ka', '2024-04-20 18:58:05'),
(81, 26, 25, 'بە جدی چت نە کردیە بیکە', '2024-04-20 18:58:18'),
(82, 26, 25, 'قەشمەر', '2024-04-20 18:58:22'),
(83, 26, 25, 'ئەتوو چێی', '2024-04-20 18:58:26'),
(84, 25, 26, 'ba shkot lo bang nakam', '2024-04-20 18:58:35'),
(85, 25, 26, 'hatim', '2024-04-20 18:58:38'),
(86, 25, 26, 'bayak kalay datkata', '2024-04-20 18:58:51'),
(87, 25, 26, 'shfty , parcha parchat daka', '2024-04-20 18:59:03'),
(88, 7, 10, '! سڵاو، ئێستا ئێمە هاوڕێین', '2024-05-09 10:02:19'),
(89, 7, 10, 'Bamn ch', '2024-05-09 10:02:38'),
(90, 10, 7, 'halaw', '2024-05-09 10:03:01'),
(91, 7, 10, 'Halawen', '2024-05-09 10:03:07'),
(92, 9, 22, '! سڵاو، ئێستا ئێمە هاوڕێین', '2024-05-09 10:05:47'),
(93, 22, 9, 'Nawala', '2024-05-09 10:05:58'),
(94, 9, 22, 'kura dabro fshakar', '2024-05-09 10:06:04'),
(95, 10, 7, 'karazl', '2024-05-09 10:06:13'),
(96, 22, 9, 'Wala shtaki jana', '2024-05-09 10:06:15'),
(97, 22, 9, 'Bzhin', '2024-05-09 10:06:21'),
(98, 22, 9, 'Amnish damawe', '2024-05-09 10:06:34'),
(99, 9, 22, 'chawmani', '2024-05-09 10:06:55'),
(100, 9, 22, 'datdame', '2024-05-09 10:06:59'),
(101, 9, 22, 'wara', '2024-05-09 10:07:02');

-- --------------------------------------------------------

--
-- Table structure for table `sendrequest`
--

CREATE TABLE `sendrequest` (
  `sendRequestID` int(11) NOT NULL,
  `requestID` int(11) NOT NULL,
  `responseID` int(11) NOT NULL,
  `isAccept` int(11) NOT NULL,
  `sendRequestDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `sendrequest`
--

INSERT INTO `sendrequest` (`sendRequestID`, `requestID`, `responseID`, `isAccept`, `sendRequestDate`) VALUES
(1, 8, 7, 1, '2024-03-01 11:36:21'),
(2, 7, 9, 1, '2024-03-03 23:36:36'),
(3, 10, 7, 0, '2024-05-11 16:31:20'),
(23, 20, 7, 1, '2024-03-31 21:36:10'),
(24, 11, 10, 0, '2024-03-31 20:36:43'),
(25, 12, 11, 0, '2024-03-31 20:37:09'),
(26, 12, 8, 0, '2024-03-31 20:37:24'),
(27, 7, 23, 1, '2024-04-20 18:40:42'),
(28, 10, 23, 1, '2024-04-20 18:43:27'),
(29, 25, 24, 0, '2024-04-20 18:52:28'),
(30, 26, 25, 1, '2024-04-20 18:56:09'),
(31, 22, 9, 1, '2024-05-09 10:05:47'),
(32, 22, 12, 0, '2024-05-09 10:05:07');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` int(11) NOT NULL,
  `userDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `age`, `gender`, `userDate`) VALUES
(7, 'abdulla', 'a@gmail.com', '8a19de2e756035a3ece48cd01260b89ec36a510d9e18066e64ffc4d379c6e457', 20, 1, '2023-06-15 08:45:20'),
(8, 'nashwan', 'n@gmail.com', '8a19de2e756035a3ece48cd01260b89ec36a510d9e18066e64ffc4d379c6e457', 25, 1, '2024-03-04 14:00:53'),
(9, 'areen', 'a@gmail.com', '8a19de2e756035a3ece48cd01260b89ec36a510d9e18066e64ffc4d379c6e457', 20, 1, '2024-03-14 14:46:14'),
(10, 'hanas', 'h@gmail.com', '30535609778666ca45fb6a19181232caf46689f9d12501476aadc97357552c99', 20, 2, '2024-02-29 16:23:22'),
(11, 'shko', 'sh@gmail.com', '8a19de2e756035a3ece48cd01260b89ec36a510d9e18066e64ffc4d379c6e457', 20, 1, '2023-08-30 01:47:05'),
(12, 'ayub', 'ay@gmail.com', '8a19de2e756035a3ece48cd01260b89ec36a510d9e18066e64ffc4d379c6e457', 20, 2, '2023-10-11 05:50:27'),
(20, 'ahmed', 'ahmed@gmail.com', '8a19de2e756035a3ece48cd01260b89ec36a510d9e18066e64ffc4d379c6e457', 20, 1, '0000-00-00 00:00:00'),
(22, 'mohammed', 'm@gmail.com', '8a19de2e756035a3ece48cd01260b89ec36a510d9e18066e64ffc4d379c6e457', 23, 1, '0000-00-00 00:00:00'),
(23, 'OneAboveAll', 'shkoma.ranya@gmail.com', '76046b3744fe40698d9a9b64c10c6aa17b916a88ecedf8626d0635e59de3d1f2', 21, 1, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`messageID`);

--
-- Indexes for table `sendrequest`
--
ALTER TABLE `sendrequest`
  ADD PRIMARY KEY (`sendRequestID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `messageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `sendrequest`
--
ALTER TABLE `sendrequest`
  MODIFY `sendRequestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
