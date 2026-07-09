-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2026 at 03:19 PM
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
-- Database: `mental_health_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`) VALUES
(1, 'Ali', 'Ali90@gmail.com', '$2y$12$JhXeash2MuTw9XEG14LwtOchH1qlolzgxWZRJrdytbNcaiMLFJ7zW'),
(2, 'faseeh', 'faseeh@gmail.com', '$2y$12$wf24bB2AU50SO1l5KCkjzu3aOBVFK.yiyYvYmHAsNGHOXrLDWesMG');

-- --------------------------------------------------------

--
-- Table structure for table `availability`
--

CREATE TABLE `availability` (
  `availability_id` int(11) NOT NULL,
  `therapist_id` int(11) NOT NULL,
  `availability_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `availability`
--

INSERT INTO `availability` (`availability_id`, `therapist_id`, `availability_date`, `start_time`, `end_time`) VALUES
(1, 1, '0000-00-00', '00:00:02', '00:00:04'),
(2, 1, '2026-05-18', '00:00:02', '00:00:04'),
(3, 1, '2026-02-23', '12:00:00', '19:30:00'),
(4, 2, '2026-11-20', '07:00:00', '13:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mood_log`
--

CREATE TABLE `mood_log` (
  `log_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `mood_level` varchar(50) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `log_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mood_log`
--

INSERT INTO `mood_log` (`log_id`, `patient_id`, `mood_level`, `notes`, `log_date`) VALUES
(1, 1, 'anxious', 'better', '2025-04-12'),
(2, 1, 'anxious', 'not good', '2026-07-05');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `date_of_birth` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `admin_id`, `first_name`, `last_name`, `email`, `phone`, `password`, `date_of_birth`) VALUES
(1, NULL, 'Ahmad', 'Khan', 'Ahmad12@gmail.com', '03007658764', '$2y$12$.LWKm4A6ozkb2apo/y0FRetixIoRXcjs4lxS6QlvyrZk2C1yfwNx2', '0000-00-00'),
(3, 1, 'jamal', 'Khan', 'jamal11@gmail.com', '03007657651', '$2y$12$Y.VcEgVN2lAkJwxTa24XkOXtAPaK/zfKboYPXkahXW.uS3fTgb5kW', '0000-00-00'),
(8, NULL, 'warisha', 'Ahmad', 'warisha90@gmail.com', '03700304030', '$2y$12$gDioxeP6Qvu2FTeDHyrqsuxs2RF2awwzvtugD43du9iiXma0jf66e', '2009-08-23'),
(9, NULL, 'ashlina', 'khan', 'ashlinahere@gmail.com', '1234567', '$2y$12$fSj0afQXCAh003ghOaR0ceBKbA.vT07lYCrCglfkAoCHB2Lap5D8m', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `progress_report`
--

CREATE TABLE `progress_report` (
  `report_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `therapist_id` int(11) NOT NULL,
  `encrypted_report` text DEFAULT NULL,
  `report_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `progress_report`
--

INSERT INTO `progress_report` (`report_id`, `session_id`, `therapist_id`, `encrypted_report`, `report_date`) VALUES
(1, 3, 1, 'eyJpdiI6IktmT1pKUytxOGpybVB3V1dzL0c3NkE9PSIsInZhbHVlIjoiVVpiQ1hHU2VDRHF0REVSb2JBVmNJZz09IiwibWFjIjoiNTkzZjc1NzI2ZGY5Yzg0YTY1ZWQxNWY4OGQ2ZDg2NjRkYmYzYzQ2Y2ZlMzgxOWZmYmQ2NzA5ZTAzZDM0ZTdlZSIsInRhZyI6IiJ9', '2026-07-05'),
(2, 3, 1, 'eyJpdiI6ImdEWGxodkZ5OFltR1grTkZncmtuTFE9PSIsInZhbHVlIjoiUExVZ2ttQm02YlNwTzhnWkh1SUZkZz09IiwibWFjIjoiYWI3YjE0MDVjMzk0Mzk0YmM0OTU1YjgzOTYyMjAzZjY1YWRkOWQ2MDNmMWEyNDdjNmVlNjljNzk4MTFkYWIyYyIsInRhZyI6IiJ9', '2026-07-05');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `session_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `therapist_id` int(11) NOT NULL,
  `followup_session_id` int(11) DEFAULT NULL,
  `session_date` date DEFAULT NULL,
  `session_time` time DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`session_id`, `patient_id`, `therapist_id`, `followup_session_id`, `session_date`, `session_time`, `status`) VALUES
(2, 1, 1, NULL, '2025-05-12', '30:12:04', 'completed'),
(3, 1, 1, NULL, '2026-12-03', '12:00:00', 'cancelled'),
(4, 1, 3, NULL, '2026-11-20', '07:00:00', 'scheduled'),
(5, 1, 3, NULL, '2026-11-20', '07:00:00', 'cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('KkyvewKe15SfAadETbHnvyDBiFnF0HH9qKeUCUdC', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQnRLVmZITlpNME5nMTdLUXpnTlEzMWZ2aHdkcGpwTzJaTTFwT3hmZyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbiI7czo1OiJyb3V0ZSI7czoxNToiYWRtaW4uZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJhdXRoX3VzZXIiO2E6Mzp7czo0OiJyb2xlIjtzOjU6ImFkbWluIjtzOjI6ImlkIjtpOjE7czo0OiJuYW1lIjtzOjM6IkFsaSI7fX0=', 1783256996);

-- --------------------------------------------------------

--
-- Table structure for table `session_note`
--

CREATE TABLE `session_note` (
  `note_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `therapist_id` int(11) NOT NULL,
  `encrypted_note` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `session_note`
--

INSERT INTO `session_note` (`note_id`, `session_id`, `therapist_id`, `encrypted_note`, `created_at`) VALUES
(1, 3, 1, 'eyJpdiI6Im44MGoyK2RucnludXdtMEdtckdFdVE9PSIsInZhbHVlIjoiaVVFWUxoMFNPQ1puWlUxM2NISzVrN051Wlg5b2FhcnNnSkwwTVo4UTA3MFJzVzJhS05TektCdDRmdjFGMEZMMyIsIm1hYyI6IjUyNGI3NTUzYzE0YTVkNGIxYThkMjFlYTlmZWVkYTM5MDcxOTZiMDBmMjcxYWQwODE3ZmVjNTZhMDk2YTMwNmEiLCJ0YWciOiIifQ==', '2026-07-05 17:56:52');

-- --------------------------------------------------------

--
-- Table structure for table `specialization`
--

CREATE TABLE `specialization` (
  `specialization_id` int(11) NOT NULL,
  `specialization_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `specialization`
--

INSERT INTO `specialization` (`specialization_id`, `specialization_name`, `description`) VALUES
(1, 'Mental_health', 'depression_anxiety'),
(2, 'Anxiety Disorders', 'Panic attacks, phobias, OCD'),
(3, 'Depression', 'Mood disorders, grief counseling'),
(4, 'Trauma & PTSD', 'Abuse recovery, PTSD treatment'),
(5, 'Child Psychology', 'Behavioral issues in children'),
(6, 'Addiction Counseling', 'Substance abuse recovery'),
(7, 'Relationship Therapy', 'Couples and family counseling');

-- --------------------------------------------------------

--
-- Table structure for table `therapist`
--

CREATE TABLE `therapist` (
  `therapist_id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `license_no` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `therapist`
--

INSERT INTO `therapist` (`therapist_id`, `admin_id`, `first_name`, `last_name`, `email`, `phone`, `license_no`, `password`) VALUES
(1, 1, 'Dr', 'Amjad', 'Amjad40@gmail.com', '03034658770', '78', '$2y$12$I7/eDhO.06olCyFi5ZuaVuK/MnG84dCzfY2QSf44Tcw.mdGD28QKC'),
(2, 1, 'zakin', 'khan', 'zakinkhan@gmail.com', '64727672', '76376278', '$2y$12$4tdT2r2p2XmFyWqO5/9n3ezmc7tm/zqq79Q.4yaME.L6ZtZK1JwOq'),
(3, 2, 'ismail', 'ali', 'ismail@gmail.com', '46772389128', '5673628', '$2y$12$R4BQTkNuX1M04QbBKvnXL.uEFJAH7WPr/R4lcfl3t.shP5R3NBbTu');

-- --------------------------------------------------------

--
-- Table structure for table `therapist_specialization`
--

CREATE TABLE `therapist_specialization` (
  `therapist_id` int(11) NOT NULL,
  `specialization_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `therapist_specialization`
--

INSERT INTO `therapist_specialization` (`therapist_id`, `specialization_id`) VALUES
(1, 1),
(2, 1),
(3, 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `availability`
--
ALTER TABLE `availability`
  ADD PRIMARY KEY (`availability_id`),
  ADD KEY `therapist_id` (`therapist_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mood_log`
--
ALTER TABLE `mood_log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `progress_report`
--
ALTER TABLE `progress_report`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `session_id` (`session_id`),
  ADD KEY `therapist_id` (`therapist_id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `therapist_id` (`therapist_id`),
  ADD KEY `followup_session_id` (`followup_session_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `session_note`
--
ALTER TABLE `session_note`
  ADD PRIMARY KEY (`note_id`),
  ADD KEY `session_id` (`session_id`),
  ADD KEY `therapist_id` (`therapist_id`);

--
-- Indexes for table `specialization`
--
ALTER TABLE `specialization`
  ADD PRIMARY KEY (`specialization_id`);

--
-- Indexes for table `therapist`
--
ALTER TABLE `therapist`
  ADD PRIMARY KEY (`therapist_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `license_no` (`license_no`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `therapist_specialization`
--
ALTER TABLE `therapist_specialization`
  ADD PRIMARY KEY (`therapist_id`,`specialization_id`),
  ADD KEY `specialization_id` (`specialization_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `availability`
--
ALTER TABLE `availability`
  MODIFY `availability_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mood_log`
--
ALTER TABLE `mood_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `progress_report`
--
ALTER TABLE `progress_report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `session_note`
--
ALTER TABLE `session_note`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `specialization`
--
ALTER TABLE `specialization`
  MODIFY `specialization_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `therapist`
--
ALTER TABLE `therapist`
  MODIFY `therapist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `availability`
--
ALTER TABLE `availability`
  ADD CONSTRAINT `availability_ibfk_1` FOREIGN KEY (`therapist_id`) REFERENCES `therapist` (`therapist_id`);

--
-- Constraints for table `mood_log`
--
ALTER TABLE `mood_log`
  ADD CONSTRAINT `mood_log_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `progress_report`
--
ALTER TABLE `progress_report`
  ADD CONSTRAINT `progress_report_ibfk_1` FOREIGN KEY (`session_id`) REFERENCES `session` (`session_id`),
  ADD CONSTRAINT `progress_report_ibfk_2` FOREIGN KEY (`therapist_id`) REFERENCES `therapist` (`therapist_id`);

--
-- Constraints for table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`),
  ADD CONSTRAINT `session_ibfk_2` FOREIGN KEY (`therapist_id`) REFERENCES `therapist` (`therapist_id`),
  ADD CONSTRAINT `session_ibfk_3` FOREIGN KEY (`followup_session_id`) REFERENCES `session` (`session_id`);

--
-- Constraints for table `session_note`
--
ALTER TABLE `session_note`
  ADD CONSTRAINT `session_note_ibfk_1` FOREIGN KEY (`session_id`) REFERENCES `session` (`session_id`),
  ADD CONSTRAINT `session_note_ibfk_2` FOREIGN KEY (`therapist_id`) REFERENCES `therapist` (`therapist_id`);

--
-- Constraints for table `therapist`
--
ALTER TABLE `therapist`
  ADD CONSTRAINT `therapist_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `therapist_specialization`
--
ALTER TABLE `therapist_specialization`
  ADD CONSTRAINT `therapist_specialization_ibfk_1` FOREIGN KEY (`therapist_id`) REFERENCES `therapist` (`therapist_id`),
  ADD CONSTRAINT `therapist_specialization_ibfk_2` FOREIGN KEY (`specialization_id`) REFERENCES `specialization` (`specialization_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
