-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2025 at 04:37 AM
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
-- Database: `ireply`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `resume_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `first_name`, `last_name`, `email`, `phone`, `resume`, `submitted_at`, `resume_path`) VALUES
(1, 'Fritz Andrew', 'Flores', 'flores.fritzandrew@gmail.com', '(+63) 966 412 0796', 'uploads/resume_686e02b8dad6d7.51457993.pdf', '2025-07-09 05:48:40', NULL),
(3, 'Ralph Michael', 'De La Torre', 'ralphmichealdelatorre@gmail.com', '0956346622', 'uploads/resume_686e03cac18fb7.73461776.pdf', '2025-07-09 05:53:14', NULL),
(4, 'Danilo', 'Aloquina', 'daniloaloquina@yahoo.com', '09878657364', 'uploads/resume_686e05a6742087.98326118.pdf', '2025-07-09 06:01:10', NULL),
(5, 'Syron', 'Viason', 'syronviason@gmail.com', '09453457828', NULL, '2025-07-09 06:57:42', 'uploads/resume_686e12e65be660.30843040.pdf'),
(6, 'Jinky', 'Guillergan', 'jinkeypaqaioa@gmail.com', '094324234384', NULL, '2025-07-09 07:15:11', 'uploads/resume_686e16ff0fb115.82254250.pdf'),
(7, 'Baron', 'Jared', 'barod@yaoo.com', '4535834975', NULL, '2025-07-09 07:17:36', 'uploads/resume_686e1790989cb9.59498186.pdf'),
(8, 'Sron', 'Agi', 'fdskfj@gmail.com', '09439084', NULL, '2025-07-10 04:52:53', 'uploads/resume_686f4725e49ac1.15304998.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
