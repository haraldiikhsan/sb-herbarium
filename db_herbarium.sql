-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 07, 2019 at 03:33 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `db_herbarium`
--

-- --------------------------------------------------------

--
-- Table structure for table `familia`
--

CREATE TABLE `familia` (
  `id_familia` int(11) UNSIGNED NOT NULL,
  `familia` varchar(255) NOT NULL,
  `total_herbarium` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `id_user` int(11) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `familia`
--

INSERT INTO `familia` (`id_familia`, `familia`, `total_herbarium`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'Olacaceae', 0, 2, '2019-08-20 00:00:00', '2019-09-05 21:49:47'),
(2, 'Primulaceae', 0, 2, '2019-08-20 00:00:00', '2019-08-20 00:00:00'),
(3, 'Rhizophoraceae', 1, 2, '2019-08-20 00:00:00', '2019-09-05 20:53:34'),
(4, 'Rubiaceae', 0, 2, '2019-08-20 00:00:00', '2019-09-01 22:40:13'),
(5, 'Urticaceae', 1, 2, '2019-08-20 00:00:00', '2019-09-05 21:48:53'),
(6, 'Ebenaceae', 0, 2, '2019-08-20 00:00:00', '2019-09-01 22:40:17'),
(7, 'Euphorbiaceae', 3, 2, '2019-08-20 00:00:00', '2019-09-05 21:01:22'),
(8, 'Fabaceae', 0, 2, '2019-08-20 00:00:00', '2019-09-04 07:59:41'),
(9, 'Malvaceae', 1, 2, '2019-08-20 00:00:00', '2019-09-03 09:17:41'),
(10, 'Myrtaceae', 0, 2, '2019-08-20 00:00:00', '2019-08-25 13:39:39'),
(11, 'Dipterocarpaceae', 0, 2, '2019-08-20 00:00:00', '2019-08-20 00:00:00'),
(12, 'Acanthaceae', 0, 2, '2019-08-20 00:00:00', '2019-08-25 16:15:55'),
(13, 'Achariaceae', 0, 2, '2019-08-20 00:00:00', '2019-09-06 11:06:02'),
(14, 'Anacardiaceae', 0, 2, '2019-08-20 00:00:00', '2019-08-26 22:17:23'),
(15, 'Annonaceae', 0, 2, '2019-08-20 00:00:00', '2019-08-25 13:07:16'),
(16, 'Combretaceae', 1, 2, '2019-08-20 00:00:00', '2019-09-05 21:49:47');

-- --------------------------------------------------------

--
-- Table structure for table `herbarium`
--

CREATE TABLE `herbarium` (
  `id_herbarium` int(11) NOT NULL,
  `id_familia` int(11) UNSIGNED NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL,
  `genus` varchar(255) NOT NULL DEFAULT '-',
  `species` varchar(255) NOT NULL DEFAULT '-',
  `local_name` varchar(255) NOT NULL DEFAULT '-',
  `herbarium_pic` varchar(255) NOT NULL,
  `real_pic` varchar(255) NOT NULL,
  `leaf_morphology` varchar(255) NOT NULL DEFAULT '-',
  `collection_num` varchar(255) NOT NULL DEFAULT '-',
  `collection_date` varchar(255) NOT NULL DEFAULT '-',
  `location` text NOT NULL,
  `habitat_type` varchar(255) NOT NULL DEFAULT '-',
  `collector` varchar(255) NOT NULL DEFAULT '-',
  `identifier` varchar(255) NOT NULL DEFAULT '-',
  `notes` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `herbarium`
--

INSERT INTO `herbarium` (`id_herbarium`, `id_familia`, `id_user`, `genus`, `species`, `local_name`, `herbarium_pic`, `real_pic`, `leaf_morphology`, `collection_num`, `collection_date`, `location`, `habitat_type`, `collector`, `identifier`, `notes`, `created_at`, `updated_at`) VALUES
(3, 7, 2, 'Cleistanthus ', 'Cleistanthus Sumatranus', '-', 'herb_CleistanthusSumatranus.jpg', 'real_CleistanthusSumatranus.jpeg', 'Jajowaty', 'OBI-039', '-', 'ada', 'Hutan Sekunder, Area Pinggiran Sungai', 'Zakaria Al Anshori', 'Ismail Rahman', 'ada', '2019-09-04 02:47:13', '2019-09-05 14:27:22'),
(5, 7, 2, 'Cleistanthus ', 'Cleistanthus Sumatranus', '-', '', '', '-', '-', '-', '', '-', '-', '-', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 7, 2, 'Cleistanthus ', 'Cleistanthus Sumatranus', '-', '', '', '-', '-', '-', '', '-', '-', '-', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 16, 2, 'Cleistanthus ', 'Cleistanthus Sumatranus', '-', 'herb_5d70defa46846_CleistanthusSumatranus.jpg', 'default.jpg', '-', '-', '-', '', '-', '-', '-', '', '2019-09-05 10:10:02', '2019-09-05 14:49:47'),
(8, 5, 2, 'Cleistanthus ', 'Cleistanthus Sumatranus', '-', 'default.jpg', 'default.jpg', '-', '-', '-', '', '-', '-', '-', '', '2019-09-05 10:18:37', '2019-09-05 10:18:37'),
(10, 3, 2, 'Cleistanthus ', 'Cleistanthus Sumatranus', '-', 'default.jpg', 'default.jpg', '-', '-', '-', '', '-', '-', '-', '', '2019-09-05 13:53:34', '2019-09-05 13:53:34'),
(12, 7, 2, 'Cleistanthus ', 'Cleistanthus Sumatranus', '', 'default.jpg', 'default.jpg', '', '', '-', '', '', '', '', '', '2019-09-05 14:01:22', '2019-09-05 14:01:31');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) UNSIGNED NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `role`, `created_at`, `updated_at`) VALUES
(1, 'super admin', '2019-08-01 00:00:00', '2019-08-08 00:00:00'),
(2, 'admin', '2019-08-01 00:00:00', '2019-08-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) UNSIGNED NOT NULL,
  `id_role` int(11) UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_role`, `is_active`, `is_delete`, `username`, `password`, `name`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 0, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'aku', '2019-08-01 00:00:00', '2019-08-29 00:00:00'),
(4, 2, 0, 1, 'admin1', 'e00cf25ad42683b3df678c61f42c6bda', 'Admin 1', '2019-09-06 04:07:30', '2019-09-06 12:49:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `familia`
--
ALTER TABLE `familia`
  ADD PRIMARY KEY (`id_familia`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `herbarium`
--
ALTER TABLE `herbarium`
  ADD PRIMARY KEY (`id_herbarium`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_familia` (`id_familia`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `familia`
--
ALTER TABLE `familia`
  MODIFY `id_familia` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `herbarium`
--
ALTER TABLE `herbarium`
  MODIFY `id_herbarium` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `familia`
--
ALTER TABLE `familia`
  ADD CONSTRAINT `fk_familia_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `herbarium`
--
ALTER TABLE `herbarium`
  ADD CONSTRAINT `fk_herbarium_familia` FOREIGN KEY (`id_familia`) REFERENCES `familia` (`id_familia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_herbarium_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);
