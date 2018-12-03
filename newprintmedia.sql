-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2018 at 02:50 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newprintmedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `pm0_loginregister`
--

CREATE TABLE `pm0_loginregister` (
  `pm0_loginregister_id` int(11) NOT NULL,
  `pm0_loginregister_email` varchar(50) NOT NULL,
  `pm0_loginregister_ip` varchar(20) NOT NULL,
  `pm0_loginregister_browser` varchar(25) NOT NULL,
  `pm0_loginregister_os` varchar(25) NOT NULL,
  `pm0_loginregister_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pm0_loginregister_information` varchar(10) NOT NULL,
  `pm0_loginregister_session` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pm1_auth`
--

CREATE TABLE `pm1_auth` (
  `pm1_auth_id` int(11) NOT NULL,
  `pm1_auth_email` varchar(50) NOT NULL,
  `pm1_auth_password` varchar(255) NOT NULL,
  `pm1_auth_level` varchar(10) NOT NULL,
  `pm1_auth_token` varchar(50) NOT NULL,
  `pm1_auth_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pm1_auth_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pm0_loginregister`
--
ALTER TABLE `pm0_loginregister`
  ADD PRIMARY KEY (`pm0_loginregister_id`),
  ADD KEY `pm0_loginregister_email` (`pm0_loginregister_email`);

--
-- Indexes for table `pm1_auth`
--
ALTER TABLE `pm1_auth`
  ADD PRIMARY KEY (`pm1_auth_id`),
  ADD UNIQUE KEY `pm1_auth_email` (`pm1_auth_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pm0_loginregister`
--
ALTER TABLE `pm0_loginregister`
  MODIFY `pm0_loginregister_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pm1_auth`
--
ALTER TABLE `pm1_auth`
  MODIFY `pm1_auth_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
