-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 06, 2023 at 03:22 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medical`
--

-- --------------------------------------------------------

--
-- Table structure for table `ad`
--

CREATE TABLE `ad` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ad`
--

INSERT INTO `ad` (`id`, `email`, `password`, `img`, `created_at`, `updated_at`) VALUES
(1, 'admin@mail.com', '1122', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `creports`
--

CREATE TABLE `creports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rid` bigint(20) UNSIGNED NOT NULL,
  `fid` int(11) DEFAULT NULL,
  `rdetails` longtext NOT NULL,
  `docid` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `creports`
--

INSERT INTO `creports` (`id`, `rid`, `fid`, `rdetails`, `docid`, `created_at`, `updated_at`) VALUES
(9, 9, 6, 'Bony thorax: Reveals no abnormality;\r\n\r\n\r\nDiaphragm : Normal in position, contour & definition contour & definition;', 8, '2023-03-05 09:00:56', '2023-03-05 09:00:56');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `department` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department`, `creationDate`, `updationDate`) VALUES
(1, 'Gynecologist', '2016-12-28 06:37:25', '2022-11-14 09:02:53'),
(2, 'General Physician', '2016-12-28 06:38:12', '2022-11-12 06:47:32'),
(3, 'Dermatologist', '2016-12-28 06:38:48', '2022-11-12 06:47:27'),
(4, 'Homeopath', '2016-12-28 06:39:26', '2022-11-12 06:47:24'),
(6, 'Dentist', '2016-12-28 06:40:08', '2022-11-12 06:47:41'),
(7, 'Neurosciences', '2016-12-28 06:41:18', '2022-11-12 06:47:50'),
(10, 'Orthopedics', '2017-01-07 08:07:53', '2022-11-12 06:47:45'),
(12, 'Gastroenterology', '2019-11-10 18:36:36', '2022-11-12 06:47:56');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `did` bigint(20) UNSIGNED NOT NULL,
  `dname` varchar(255) NOT NULL,
  `demail` varchar(255) NOT NULL,
  `dpass` varchar(255) NOT NULL,
  `dphn` varchar(255) DEFAULT NULL,
  `dhospital` varchar(255) DEFAULT NULL,
  `dposition` varchar(255) DEFAULT NULL,
  `bmcd` varchar(255) DEFAULT NULL,
  `dimg` varchar(255) DEFAULT NULL,
  `degree` varchar(255) DEFAULT NULL,
  `special` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `hverify` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`did`, `dname`, `demail`, `dpass`, `dphn`, `dhospital`, `dposition`, `bmcd`, `dimg`, `degree`, `special`, `status`, `hverify`, `created_at`, `updated_at`) VALUES
(8, 'Demo Doctor', 'demo@gmail.com', '112233', '01712345678', 'X - Hospital', '10', '85745', '167800484713.jpg', 'Demo Doctor', NULL, 1, '', '2023-03-05 02:18:32', '2023-03-05 02:32:31'),
(9, 'Demo 2', 'demo2@gmail.com', '112233', '01412345777', 'X - Hospital', '3', '23423', '16780275453.jpg', 'MBBS', NULL, 1, '', '2023-03-05 07:44:44', '2023-03-05 08:55:56');

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
-- Table structure for table `formats`
--

CREATE TABLE `formats` (
  `fid` bigint(20) UNSIGNED NOT NULL,
  `format_id` varchar(20) NOT NULL,
  `type` varchar(255) NOT NULL,
  `docid` int(11) NOT NULL,
  `department` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `details` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `formats`
--

INSERT INTO `formats` (`fid`, `format_id`, `type`, `docid`, `department`, `title`, `details`, `created_at`, `updated_at`) VALUES
(6, '640453d49b73e', '1', 8, '10', 'CHEST AP VIEW', 'Bony thorax: Reveals no abnormality.\r\nDiaphragm : Normal in position, contour & definition contour & definition', '2023-03-05 02:33:24', '2023-03-05 02:33:43'),
(7, '6404ade13e154', '5', 9, '3', 'Screen Rash Problem', 'Terms : Details......\r\n Terms: Details...\r\n  ....', '2023-03-05 08:57:37', '2023-03-05 08:57:37');

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `hid` bigint(20) UNSIGNED NOT NULL,
  `hname` varchar(255) NOT NULL,
  `hemail` varchar(255) NOT NULL,
  `hphn` varchar(191) DEFAULT NULL,
  `hpass` varchar(255) NOT NULL,
  `haddress` varchar(255) DEFAULT NULL,
  `hlocation` varchar(255) DEFAULT NULL,
  `hstatus` int(11) NOT NULL DEFAULT 0,
  `hverify` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`hid`, `hname`, `hemail`, `hphn`, `hpass`, `haddress`, `hlocation`, `hstatus`, `hverify`, `created_at`, `updated_at`) VALUES
(5, 'TEST  HOSPITAL', 'demoHospital@email.com', '01734567891', '112233', 'room # 313, (annex building), supreme court bar association building, 1000', 'https://goo.gl/maps/xdcUR73z3QbELkPQ7', 1, '', '2023-03-05 02:34:48', '2023-03-05 06:08:36');

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_02_02_042709_create_hospitals_table', 1),
(5, '2023_02_02_043834_create_reports_table', 2),
(6, '2023_02_02_045102_create_doctors_table', 2),
(7, '2023_02_02_045834_create_formats_table', 2),
(8, '2023_02_02_050257_create_creports_table', 2),
(9, '2023_02_02_050820_create_creports_table', 3),
(10, '2023_02_11_041848_create_ad_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `rid` bigint(20) UNSIGNED NOT NULL,
  `rpid` varchar(255) NOT NULL,
  `auth` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL,
  `docid` int(11) NOT NULL,
  `department` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`rid`, `rpid`, `auth`, `title`, `pname`, `gender`, `docid`, `department`, `type`, `age`, `img`, `status`, `created_at`, `updated_at`) VALUES
(8, '6404879995684', 5, 'Cheest Ap View', 'Md  Salam hossian', 1, 8, '10', '1', '34', '167801845798.jpg', 0, '2023-03-05 06:14:17', '2023-03-05 06:14:17'),
(9, '6404924ba1bd5', 5, 'Leg View', 'Md Shakil', 1, 8, '10', '1', '31', '167802119570.jpg', 1, '2023-03-05 06:59:55', '2023-03-05 09:00:56'),
(10, '6404ae730535d', 5, 'Screen problem', 'Ms Liza', 2, 9, '3', '5', '22', '16780284036.jpg', 0, '2023-03-05 09:00:03', '2023-03-05 09:00:03');

-- --------------------------------------------------------

--
-- Table structure for table `rtypes`
--

CREATE TABLE `rtypes` (
  `tid` bigint(20) UNSIGNED NOT NULL,
  `did` bigint(20) UNSIGNED NOT NULL,
  `tname` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rtypes`
--

INSERT INTO `rtypes` (`tid`, `did`, `tname`, `created_at`, `updated_at`) VALUES
(1, 10, 'X-RAY', NULL, NULL),
(2, 1, 'Ultrasonography', '2023-02-12 18:00:00', '2023-02-12 18:00:00'),
(3, 2, 'Ultrasonography', '2023-02-12 18:00:00', '2023-02-12 18:00:00'),
(4, 6, 'Periodontal', NULL, NULL),
(5, 3, 'skin rashes', NULL, NULL),
(6, 12, 'Achalasia', NULL, NULL),
(7, 12, 'GERD', NULL, NULL),
(8, 4, 'asthma', NULL, NULL),
(9, 7, 'epilepsy', NULL, NULL),
(10, 7, 'brain tumors', NULL, NULL),
(11, 10, 'Arthritis', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ad`
--
ALTER TABLE `ad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `creports`
--
ALTER TABLE `creports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creports_rid_foreign` (`rid`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `formats`
--
ALTER TABLE `formats`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`hid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `rtypes`
--
ALTER TABLE `rtypes`
  ADD PRIMARY KEY (`tid`),
  ADD KEY `did` (`did`),
  ADD KEY `did_2` (`did`),
  ADD KEY `did_3` (`did`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ad`
--
ALTER TABLE `ad`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `creports`
--
ALTER TABLE `creports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `did` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `formats`
--
ALTER TABLE `formats`
  MODIFY `fid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `hid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `rid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rtypes`
--
ALTER TABLE `rtypes`
  MODIFY `tid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `creports`
--
ALTER TABLE `creports`
  ADD CONSTRAINT `creports_rid_foreign` FOREIGN KEY (`rid`) REFERENCES `reports` (`rid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
