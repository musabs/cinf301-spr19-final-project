-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2019 at 06:50 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `facebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=166 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `post_id`, `user_id`, `comment`, `time`) VALUES
(141, 14, 1, 'hfghfhf', '2019-05-05 04:19:45'),
(142, 13, 1, 'aaaaaa', '2019-05-05 04:19:59'),
(143, 14, 1, 'ghghhg', '2019-05-05 04:58:30'),
(144, 14, 1, 'ghghhg', '2019-05-05 04:58:35'),
(145, 14, 1, 'ghghhg', '2019-05-05 04:58:36'),
(146, 14, 1, 'ghghhg', '2019-05-05 04:58:37'),
(147, 14, 1, 'ghghhg', '2019-05-05 04:58:38'),
(148, 14, 1, 'ghghhg', '2019-05-05 04:58:39'),
(149, 14, 1, 'ghghhg', '2019-05-05 04:58:40'),
(150, 14, 1, 'ghghhg', '2019-05-05 04:58:41'),
(151, 14, 1, 'ghghhg', '2019-05-05 04:58:42'),
(152, 14, 1, 'ghghhg', '2019-05-05 04:58:43'),
(153, 14, 1, 'ghghhg', '2019-05-05 04:58:44'),
(154, 14, 1, 'ghghhg', '2019-05-05 04:58:45'),
(155, 14, 1, 'ghjgjjhjhj', '2019-05-05 04:58:47'),
(156, 14, 1, 'ghjgjjhjhj', '2019-05-05 04:58:48'),
(157, 14, 1, 'ghjgjjhjhj', '2019-05-05 04:58:49'),
(158, 14, 1, 'trt', '2019-05-05 04:59:16'),
(159, 13, 1, 'ttttttttttttt', '2019-05-05 04:59:29'),
(160, 0, 1, '', '2019-05-05 05:58:06'),
(161, 14, 1, 'lovely', '2019-05-05 06:37:52'),
(162, 13, 1, 'OSM', '2019-05-05 06:38:29'),
(163, 53, 7, 'ok', '2019-05-05 06:40:38'),
(164, 53, 0, 'ddsdasd', '2019-05-05 21:24:51'),
(165, 53, 1, 'sasasas', '2019-05-05 21:33:15');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `friends_id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`friends_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`friends_id`, `sender_id`, `receiver_id`, `status`) VALUES
(1, 7, 2, 1),
(2, 1, 2, 1),
(3, 2, 1, 1),
(4, 8, 2, 1),
(5, 5, 1, 1),
(6, 5, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `friend_request`
--

CREATE TABLE IF NOT EXISTS `friend_request` (
  `req_id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`req_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `friend_request`
--

INSERT INTO `friend_request` (`req_id`, `sender_id`, `receiver_id`, `status`) VALUES
(9, 1, 2, 1),
(10, 2, 1, 1),
(11, 3, 2, 0),
(12, 2, 4, 1),
(13, 2, 5, 1),
(14, 7, 2, 1),
(15, 8, 2, 1),
(16, 1, 4, 1),
(17, 1, 5, 1),
(18, 8, 1, 1),
(19, 5, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `like`
--

CREATE TABLE IF NOT EXISTS `like` (
  `like_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  PRIMARY KEY (`like_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `like`
--

INSERT INTO `like` (`like_id`, `post_id`, `likes`) VALUES
(11, 10, 3),
(12, 14, 11),
(13, 13, 11),
(14, 12, 1),
(15, 8, 1),
(16, 9, 1),
(17, 46, 4),
(19, 53, 15);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `upload_id` int(11) NOT NULL,
  `video` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `post_text` text NOT NULL,
  `post_time` datetime NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `upload_id`, `video`, `image`, `post_text`, `post_time`) VALUES
(8, 1, '#RamzanMubarak        2019 Ramzan Naat StatusðŸ’•Special Ramzan StatusðŸ’•Specia.mp4', '5409Koala.jpg', 'sdadadadddsdsadadada', '2019-05-03 04:05:02'),
(9, 1, 'ðŸ’•Ramzan Status 2019â¤ ll Special Status Ringtone ll Mahe Ramzan Yun Aagya.mp4', '8125Hydrangeas.jpg', 'dfgggggggggggggggggggggggggggggggggggggggggggggggggg\r\njghjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj\r\nkhkhjkhjkjjkj', '2019-05-03 04:57:35'),
(10, 1, 'ðŸ’•Ramzan Status 2019â¤ ll Special Status Ringtone ll Mahe Ramzan Yun Aagya.mp4', '2223Hydrangeas.jpg', 'dfgggggggggggggggggggggggggggggggggggggggggggggggggg\r\njghjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj\r\nkhkhjkhjkjjkj', '2019-05-03 04:58:36'),
(11, 1, 'video.mp4', '5714cmp-icon3.png', 'We added some code to the PHP so that only certain types of files can be uploaded. This allows the upload form to only accept files that are video files. For this video upload form, we do not want other types of files, such as image files or pdfs to allowed to be uploaded. We only want files that are videos; thus, they will have video extensions. For example, certain files are always videos, such as .mov, .mp4, and .avi. Other type of files such as text files (.txt), pdf files ', '2019-05-03 21:22:05'),
(12, 1, 'ðŸ’•Ramzan Status 2019â¤ ll Special Status Ringtone ll Mahe Ramzan Yun Aagya.mp4', '2903The Net Rider 2.JPG', 'We added some code to the PHP so that only certain types of files can be uploaded. This allows the upload form to only accept files that are video files. For this video upload form, we do not want other types of files, such as image files or pdfs to allowed to be uploaded. We only want files that are videos; thus, they will have video extensions. For example, certain files are always videos, such as .mov, .mp4, and .avi. Other type of files such as text files (.txt), pdf files ', '2019-05-03 21:23:26'),
(13, 1, 'ðŸ’•Ramzan Status 2019â¤ ll Special Status Ringtone ll Mahe Ramzan Yun Aagya.mp4', '3111The Net Rider 2.JPG', 'We added some code to the PHP so that only certain types of files can be uploaded. This allows the upload form to only accept files that are video files. For this video upload form, we do not want other types of files, such as image files or pdfs to allowed to be uploaded. We only want files that are videos; thus, they will have video extensions. For example, certain files are always videos, such as .mov, .mp4, and .avi. Other type of files such as text files (.txt), pdf files ', '2019-05-03 21:23:51'),
(14, 4, 'jQuery_Advanced_Tutorials_in_Urdu_Hindi_Part_19_-_Removing_Elements.mp4', '4940p3.jpg', 'We added some code to the PHP so that only certain types of files can be uploaded. This allows the upload form to only accept files that are video files. For this video upload form, we do not want other types of files, such as image files or pdfs to allowed to be uploaded. We only want files that are videos; thus, they will have video extensions. For example, certain files are always videos, such as .mov, .mp4, and .avi. Other type of files such as text files (.txt), pdf files ', '2019-05-03 21:26:51'),
(53, 7, 'No', 'No', 'Hay every one.....', '2019-05-05 06:40:08');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `reg_id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(100) NOT NULL,
  `f_name` text NOT NULL,
  `surname` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `db` date NOT NULL,
  `gander` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`reg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`reg_id`, `image`, `f_name`, `surname`, `email`, `password`, `db`, `gander`, `status`) VALUES
(1, '4615download (2).jpg', 'fatima', 'fddf', 'fatima.abdulla@ibm.com', 'fatima', '2019-05-25', 'female', 0),
(2, '4075bca-logo.jpg', 'ahmed', 'asdf', 'fatima.abdulla@gmail.com', 'ahmed', '2019-05-25', 'female', 0),
(3, '2425download (1).jpg', 'admin', 'ahmed', 'junaid@gmail.com', 'admin', '1997-07-04', 'male', 0),
(4, '99931548051125_tmp_IMG_20190121_105631_opt.jpg', 'junaid', 'ahmed', 'junaid70@gmail.com', 'junaid', '2019-04-06', 'male', 0),
(5, '8419Junaidahmed.jpg', 'Junaid', 'ali', 'abdulla@ibm.com', 'Junaid', '2019-04-05', 'male', 0),
(7, '8360cmp-icon6.png', 'ali', 'asad', 'ali@gmail.com', 'ali', '2019-05-17', 'male', 0),
(8, '6137cmp-icon5.png', 'saif', 'saif', 'saif@gmail.com', 'saif', '2019-05-10', 'male', 0),
(9, '6117Penguins.jpg', 'Aleem', 'Shahidun', 'aleem@gmail.com', 'aleem', '1999-06-07', 'male', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
