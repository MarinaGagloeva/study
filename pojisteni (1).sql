-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2023 at 05:23 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pojisteni`
--

-- --------------------------------------------------------

--
-- Table structure for table `pojistenci`
--

CREATE TABLE `pojistenci` (
  `pojistenec_id` int(11) NOT NULL,
  `jmeno` text NOT NULL,
  `prijmeni` text NOT NULL,
  `vek` int(11) NOT NULL,
  `telefonni_cislo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `pojistenci`
--

INSERT INTO `pojistenci` (`pojistenec_id`, `jmeno`, `prijmeni`, `vek`, `telefonni_cislo`) VALUES
(1, 'Josef', 'Švejk', 33, '666666666'),
(2, 'Magdalena', 'Novotná', 55, '987567688'),
(3, 'Jury', 'Stsefanishyn', 48, '9987666766'),
(4, 'Marina', 'Gagloeva', 50, '777777777'),
(5, 'Evžen', 'Oněgin', 28, '887652234'),
(6, 'Anna', 'Karenina', 22, '877776122'),
(7, 'Holden', 'Caulfield', 18, '446008222'),
(8, 'Jan ', 'Dítě', 45, '889657000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pojistenci`
--
ALTER TABLE `pojistenci`
  ADD PRIMARY KEY (`pojistenec_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pojistenci`
--
ALTER TABLE `pojistenci`
  MODIFY `pojistenec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
