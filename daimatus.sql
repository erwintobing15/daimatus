-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2021 at 07:26 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `daimatus`
--

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `grade_id` int(12) NOT NULL,
  `sub_topic` varchar(300) NOT NULL,
  `student_name` varchar(250) NOT NULL,
  `student_id` int(12) NOT NULL,
  `student_class` varchar(250) NOT NULL,
  `grade` int(3) NOT NULL,
  `matpel_id` int(12) NOT NULL,
  `topic_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `materi_id` int(12) NOT NULL,
  `sub_topic` varchar(250) NOT NULL,
  `video` varchar(250) NOT NULL,
  `matpel_id` int(12) NOT NULL,
  `topic_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`materi_id`, `sub_topic`, `video`, `matpel_id`, `topic_id`) VALUES
(1, 'Menjelaskan dan mengidentifikasi pecahan-pecahan senilai dengan gambar dan model konkret', 'pecahan.mp4', 28, 1);

-- --------------------------------------------------------

--
-- Table structure for table `matpel`
--

CREATE TABLE `matpel` (
  `matpel_id` int(12) NOT NULL,
  `name` varchar(50) NOT NULL,
  `img` varchar(50) NOT NULL,
  `grade` varchar(4) NOT NULL,
  `active` int(1) NOT NULL,
  `user_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matpel`
--

INSERT INTO `matpel` (`matpel_id`, `name`, `img`, `grade`, `active`, `user_id`) VALUES
(28, 'Matematika', 'matematika.png', 'IVA', 1, 101),
(29, 'IPA', 'ipa.png', 'IVA', 1, 101);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `quiz_id` int(12) NOT NULL,
  `sub_topic` varchar(300) NOT NULL,
  `img` varchar(150) NOT NULL,
  `question` varchar(300) NOT NULL,
  `choice_a` varchar(200) NOT NULL,
  `choice_b` varchar(200) NOT NULL,
  `choice_c` varchar(200) NOT NULL,
  `choice_d` varchar(200) NOT NULL,
  `answer` char(1) NOT NULL,
  `matpel_id` int(12) NOT NULL,
  `topic_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quiz_id`, `sub_topic`, `img`, `question`, `choice_a`, `choice_b`, `choice_c`, `choice_d`, `answer`, `matpel_id`, `topic_id`) VALUES
(1, 'Menjelaskan dan mengidentifikasi pecahan-pecahan senilai dengan gambar dan model konkret', '', 'Pada pecahan, bilangan yang berada diatas, disebut...', 'Pembilang', 'Penyebut', 'Pembagi', 'Pemfaktor', 'a', 28, 1),
(6, 'Menjelaskan dan mengidentifikasi pecahan-pecahan senilai dengan gambar dan model konkret', 'wallpaper.png', 'test', 'test', 'test', 'tes', 'test', 'c', 28, 1);

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `topic_id` int(12) NOT NULL,
  `topic_name` varchar(200) NOT NULL,
  `matpel_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`topic_id`, `topic_name`, `matpel_id`) VALUES
(1, 'BAB 1 PECAHAN', 28),
(3, 'BAB 2 SATUAN UKUR', 28),
(6, 'BAB 3 KELILING BANGUN DATAR', 28),
(7, 'BAB 4 SIMETRI LIPAT', 28),
(8, 'BAB 5 KELIPATAN DAN FAKTOR', 28),
(9, 'BAB 6 LUAS BANGUNAN', 28),
(10, 'BAB 01 - RANGKA DAN PANCA INDERA MANUSIA', 29);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(12) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `super` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `super`) VALUES
(101, 'daimatus-admin', '06835d77786db196490e24e9807e42b0', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`materi_id`);

--
-- Indexes for table `matpel`
--
ALTER TABLE `matpel`
  ADD PRIMARY KEY (`matpel_id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `grade_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `materi_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `matpel`
--
ALTER TABLE `matpel`
  MODIFY `matpel_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quiz_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `topic_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
