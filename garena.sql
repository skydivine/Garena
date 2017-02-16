-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2017 at 04:13 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `garena`
--

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `name` varchar(20) NOT NULL,
  `namacaptain` varchar(250) NOT NULL,
  `teleponcaptain` varchar(250) NOT NULL,
  `gendercaptain` varchar(250) NOT NULL,
  `namaanggota` varchar(250) NOT NULL,
  `teleponanggota` varchar(250) NOT NULL,
  `genderanggota` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`name`, `namacaptain`, `teleponcaptain`, `gendercaptain`, `namaanggota`, `teleponanggota`, `genderanggota`) VALUES
('asdasf', 'dasd', '12412515', 'pria', 'asd', '1341254125', 'pria'),
('asdddfg', 'fafsg', '1245', 'pria', 'asfgghgh', '2134', 'wanita');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `telepon` varchar(200) DEFAULT NULL,
  `gender` varchar(200) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `isRegis` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `name`, `email`, `telepon`, `gender`, `alamat`, `isRegis`) VALUES
('alireza23', 'alireza23', 'Ali Reza Syariati', 'ali.reza13@yahoo.com', '0888888888', 'pria', 'tes', 'true'),
('skydivine13', 'asdasdasd', 'asdll', 'asd@ad.ad', '123412', 'pria', '  asdd', 'true'),
('skydivine231', 'asdasdasd', 'asdasdasd', 'asd@asd.asd', '123123123', 'pria', 'asdasd', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`name`),
  ADD UNIQUE KEY `namacaptain` (`namacaptain`),
  ADD UNIQUE KEY `namaanggota` (`namaanggota`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
