-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2025 at 07:19 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `document_keywords`
--

CREATE TABLE `document_keywords` (
  `doc_id` int(11) NOT NULL,
  `keyword_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `doc_id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `dosen_id` int(11) DEFAULT NULL,
  `jenis_id` int(11) DEFAULT NULL,
  `th_doc` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `dosen_id` int(11) NOT NULL,
  `nidn` int(11) NOT NULL,
  `nama_dosen` varchar(100) NOT NULL,
  `email_dosen` varchar(100) NOT NULL,
  `prodi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_doc`
--

CREATE TABLE `jenis_doc` (
  `jenis_doc_id` int(11) NOT NULL,
  `nama_jenis` varchar(100) NOT NULL,
  `deskripsi_jenis` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE `keywords` (
  `keyword_id` int(11) NOT NULL,
  `keyword` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `mahasiswa_id` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `email_mahasiswa` varchar(100) NOT NULL,
  `prodi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `n_doc`
--

CREATE TABLE `n_doc` (
  `doc_id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `dosen_id` int(11) DEFAULT NULL,
  `jenis_doc_id` int(11) DEFAULT NULL,
  `file_doc` varchar(255) DEFAULT NULL,
  `th_doc` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` enum('admin','dosen','mahasiswa') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `role`, `created_at`) VALUES
(1, 'salman', '$2y$10$LUK8IghrEZFDE71igxj.kenGmjQWrakJiwDN0dvJF.MgFXNPL/LsG', 'salman@gmail.com', 'admin', '2025-12-26 18:05:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `document_keywords`
--
ALTER TABLE `document_keywords`
  ADD PRIMARY KEY (`doc_id`,`keyword_id`),
  ADD KEY `keyword_id` (`keyword_id`);

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`doc_id`),
  ADD KEY `dosen_id` (`dosen_id`),
  ADD KEY `jenis_id` (`jenis_id`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`dosen_id`);

--
-- Indexes for table `jenis_doc`
--
ALTER TABLE `jenis_doc`
  ADD PRIMARY KEY (`jenis_doc_id`);

--
-- Indexes for table `keywords`
--
ALTER TABLE `keywords`
  ADD PRIMARY KEY (`keyword_id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`mahasiswa_id`);

--
-- Indexes for table `n_doc`
--
ALTER TABLE `n_doc`
  ADD PRIMARY KEY (`doc_id`),
  ADD KEY `dosen_id` (`dosen_id`),
  ADD KEY `jenis_doc_id` (`jenis_doc_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `dosen_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_doc`
--
ALTER TABLE `jenis_doc`
  MODIFY `jenis_doc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keywords`
--
ALTER TABLE `keywords`
  MODIFY `keyword_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `mahasiswa_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `n_doc`
--
ALTER TABLE `n_doc`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `document_keywords`
--
ALTER TABLE `document_keywords`
  ADD CONSTRAINT `document_keywords_ibfk_1` FOREIGN KEY (`doc_id`) REFERENCES `n_doc` (`doc_id`),
  ADD CONSTRAINT `document_keywords_ibfk_2` FOREIGN KEY (`keyword_id`) REFERENCES `keywords` (`keyword_id`);

--
-- Constraints for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD CONSTRAINT `dokumen_ibfk_1` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`dosen_id`),
  ADD CONSTRAINT `dokumen_ibfk_2` FOREIGN KEY (`jenis_id`) REFERENCES `jenis_dokumen` (`jenis_id`);

--
-- Constraints for table `n_doc`
--
ALTER TABLE `n_doc`
  ADD CONSTRAINT `n_doc_ibfk_1` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`dosen_id`),
  ADD CONSTRAINT `n_doc_ibfk_2` FOREIGN KEY (`jenis_doc_id`) REFERENCES `jenis_doc` (`jenis_doc_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
