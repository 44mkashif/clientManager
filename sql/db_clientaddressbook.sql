-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2019 at 09:42 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_clientaddressbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(40) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `notes` text,
  `userId` int(11) UNSIGNED NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `phone`, `address`, `company`, `notes`, `userId`, `date_added`) VALUES
(3, 'John Doe', 'johndoe@gmail.com', '1234561223', 'New York', 'john corporation', 'Lorem Ipsum Dolor Sit Amet...', 6, '2019-05-30 15:33:59'),
(4, 'Muhammad Ahsen', 'ahsen@gmail.com', '123456789', 'Isalamabad, Pakistan', 'Ahsen Corporation', 'Lorem Ipsum Notes...', 7, '2019-05-30 15:59:27'),
(5, 'Ahsen Jamil', 'ahsenjamil@example.com', '987654321', 'Karachi, Pakistan', 'Jamil Corporation', 'LOREM IPSUM CONTENT...', 7, '2019-05-30 16:00:13'),
(6, 'Muhammad Kashif', 'u2017287@giki.edu.pk', '+646464646+4', 'Ghulam Ishaq Khan Institute of Engineering Sciences and Technology, Topi Swabi, Pakistan', 'Ghulam Ishaq Khan Institute of Engineering Sciences and Technology', 'sfg hsf hf hf h', 5, '2019-05-30 16:00:28'),
(8, 'asd', 'asd', '', '', '', '', 5, '2019-05-31 11:56:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`) VALUES
(5, 'kashi@gmail.com', 'Kashif', '$2y$10$xr0WGybMl4dTEiszPaioQOr2dNAFXTYV/7KzYe97iJOtobvg02Aii'),
(6, 'u2017287@giki.edu.pk', 'u2017287', '$2y$10$82jIY1XDP7gNZtxCFDmrxOHU87r.XgwzZYcBSeRmvQzVb2p8gbD3q'),
(7, 'guest@gmail.com', 'Guest', '$2y$10$r9fS6I9GC7YvYrUUYXV1mO0alqAPdKm2JjfyuFght4P3914Mu/pcO'),
(8, 'abc@abc.com', 'abc', '$2y$10$Mg/CoyutbnpQ7QL/jSc4ie.YOTlPyrwTlmO0nET/0B2N3VEXcwxzK'),
(9, 'acf@a.com', 'asd', '$2y$10$IC2N0DUeznF/w2IJo3sWU.Hm8gHhlSwi5UKXzzmWMFC1OQOr6TDTi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
