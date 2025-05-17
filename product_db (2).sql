-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2025 at 06:50 PM
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
-- Database: `product_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `email`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'admin123', 'superadmin@example.com', '2025-01-24 10:19:47', '2025-01-24 11:07:58'),
(2, 'admin1', 'adminpass', 'admin1@example.com', '2025-01-24 10:19:47', '2025-01-24 11:07:58'),
(3, 'admin2', 'password123', 'admin2@example.com', '2025-01-24 10:19:47', '2025-01-24 11:07:58'),
(4, 'manager1', 'managerpass', 'manager1@example.com', '2025-01-24 10:19:47', '2025-01-24 11:07:58'),
(5, 'support_admin', 'supportpass', 'support@example.com', '2025-01-24 10:19:47', '2025-01-24 11:07:58');

-- --------------------------------------------------------

--
-- Table structure for table `book_service`
--

CREATE TABLE `book_service` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_service`
--

INSERT INTO `book_service` (`booking_id`, `user_id`, `service_id`, `category`, `quantity`, `duration`, `price`, `total_price`, `booking_date`) VALUES
(1, 1, 1, 'Plumber', 2, 2, 1500, 3000, '2025-01-23 12:00:00'),
(2, 2, 2, 'Cleaner', 1, 3, 1200, 1200, '2025-01-24 12:00:00'),
(3, 2, 3, 'Carpenter', 1, 4, 2000, 2000, '2025-01-25 12:00:00'),
(4, 4, 4, 'Painter', 3, 5, 1800, 5400, '2025-01-26 12:00:00'),
(5, 5, 5, 'Electrician', 2, 2, 1700, 3400, '2025-01-27 12:00:00'),
(6, 6, 6, 'Furniture Moving', 1, 1, 150, 150, '2025-01-28 12:00:00'),
(36, 0, 0, 'Plumber', 3, 2, 1500, 9000, '2025-05-12 12:36:22'),
(37, 0, 0, 'Plumber', 1, 1, 1500, 1500, '2025-05-12 13:36:30'),
(38, 0, 0, 'Plumber', 1, 1, 1500, 1500, '2025-05-12 13:38:33'),
(39, 0, 0, 'Plumber', 1, 1, 1500, 1500, '2025-05-12 13:39:25'),
(40, 0, 0, 'Plumber', 1, 1, 1500, 1500, '2025-05-13 07:05:28'),
(41, 0, 0, 'Plumber', 2, 2, 1500, 3000, '2025-05-14 02:10:54'),
(42, 0, 0, 'Plumber', 1, 1, 1500, 1500, '2025-05-14 02:12:29'),
(43, 0, 0, 'Plumber', 2, 2, 1500, 3000, '2025-05-14 13:22:02'),
(44, 0, 0, 'Plumber', 2, 2, 1500, 3000, '2025-05-15 14:44:01'),
(45, 0, 0, 'Plumber', 2, 2, 1500, 3000, '2025-05-15 16:08:47'),
(46, 0, 0, 'Plumber', 3, 2, 1500, 4500, '2025-05-16 03:17:08'),
(47, 0, 0, 'Carpenter', 3, 1, 2000, 6000, '2025-05-16 03:17:21'),
(48, 0, 0, 'Carpenter', 1, 1, 2000, 2000, '2025-05-16 03:52:43'),
(49, 0, 0, 'Plumber', 2, 1, 1500, 3000, '2025-05-16 07:27:16'),
(50, 0, 0, 'Plumber', 2, 1, 1500, 3000, '2025-05-16 07:33:47'),
(51, 0, 0, 'Plumber', 2, 1, 1500, 3000, '2025-05-16 14:11:18');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `provider_id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`provider_id`, `category`) VALUES
(1, 'Plumber'),
(1, 'Cleaner'),
(2, 'Carpenter'),
(2, 'Plumber'),
(3, 'Painter'),
(3, 'Furniture Moving'),
(4, 'Furniture Moving'),
(5, 'Electrician'),
(5, 'Plumber'),
(6, 'Cleaner');

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`id`, `name`, `email`, `subject`, `message`, `submitted_at`) VALUES
(1, 'Nithin', 'nithinrafia@gmail.com', 'da', 'ww', '2025-05-16 14:11:57');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `provider_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `provider_id`, `service_id`, `rating`, `feedback`) VALUES
(11, 5, 0, 4, 'Good Service'),
(12, 2, 0, 3, 'fghghjj'),
(13, 1, 0, 4, 'dff'),
(14, 4, 0, 4, 'fdvfvd'),
(15, 3, 0, 4, 'Give Good service'),
(16, 3, 0, 3, 'Give good service. I love it.'),
(17, 1, 0, 3, 'Give Good service.'),
(18, 1, 0, 4, 'Give good Service.'),
(19, 1, 0, 3, 'Good service.\r\n'),
(20, 5, 0, 3, 'Give good Service'),
(21, 2, 0, 3, 'Give good service.'),
(22, 1, 0, 4, 'Give good service.'),
(23, 1, 0, 4, 'I love this service.'),
(24, 1, 0, 5, 'good\r\n'),
(25, 5, 0, 5, 'aa'),
(26, 1, 1, 3, 'Better'),
(27, 1, 2, 4, '11`');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `service_id` int(11) NOT NULL,
  `provider_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`service_id`, `provider_id`) VALUES
(1, 1),
(1, 5),
(1, 7),
(1, 17),
(1, 27),
(2, 1),
(2, 2),
(2, 6),
(2, 8),
(2, 18),
(2, 28),
(3, 2),
(3, 9),
(3, 19),
(3, 29),
(4, 3),
(4, 10),
(4, 20),
(4, 30),
(5, 5),
(5, 11),
(5, 21),
(5, 31),
(6, 3),
(6, 4),
(6, 12),
(6, 22),
(6, 32),
(7, 13),
(7, 23),
(7, 33),
(8, 14),
(8, 24),
(8, 34),
(9, 15),
(9, 25),
(9, 35),
(10, 6),
(10, 16),
(10, 26);

-- --------------------------------------------------------

--
-- Table structure for table `payment_transactions`
--

CREATE TABLE `payment_transactions` (
  `id` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `method` varchar(255) NOT NULL,
  `status` varchar(50) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_transactions`
--

INSERT INTO `payment_transactions` (`id`, `total_price`, `method`, `status`) VALUES
(1, 1500.00, 'Bkash', 'Success'),
(2, 3000.00, 'Bkash', 'Success'),
(3, 3000.00, 'Bkash', 'Success'),
(4, 3000.00, 'Bkash', 'Success'),
(5, 4500.00, 'Bkash', 'Success'),
(6, 6000.00, 'Bkash', 'Success'),
(7, 3000.00, 'Bkash', 'Success'),
(8, 3000.00, 'Bkash', 'Success'),
(9, 3000.00, 'Bkash', 'Success');

-- --------------------------------------------------------

--
-- Table structure for table `provider`
--

CREATE TABLE `provider` (
  `provider_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `present_address` text DEFAULT NULL,
  `permanent_address` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `Password` varchar(255) NOT NULL,
  `Phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `provider`
--

INSERT INTO `provider` (`provider_id`, `name`, `location`, `gender`, `present_address`, `permanent_address`, `email`, `Password`, `Phone`) VALUES
(1, 'Ahsan Habib', 'Dhaka', 'Male', 'House-15, Road-5, Gulshan', 'Village-10, Upazila-2, Barisal', 'ahsan.habib@example.com', '$2y$10$pBRRFd9tUA7Ek/ToWE7SIO5B5rWgcbvnQnW0VlacoAxwF/XE1XgQq', 1712345678),
(2, 'Farzana Rahman', 'Chattogram', 'Female', 'Flat-3A, Hillview Apartments', 'House-20, Ward-3, Sylhet', 'farzana.rahman@example.com', '$2y$10$Xqj72D.RsGI.50.1xzpVCe8OD1GbBzR.wkjI4MIcWWzZ1Rxg8L0k.', 1812345678),
(3, 'Jahidul Islam', 'Rajshahi', 'Male', 'Block-B, New Market Area', 'House-45, Ward-7, Khulna', 'jahidul.islam@example.com', '$2y$10$fZAKscHxVj.tusGnB7PGgOf0.axN9g2mzXQ5COLrPMzDqJS6B/zg6', 1912345678),
(4, 'Sumi Akter', 'Sylhet', 'Female', 'Apartment-12, Green Tower', 'House-7, Road-3, Mymensingh', 'sumi.akter@example.com', '123', 1612345678),
(5, 'Tareq Hasan', 'Khulna', 'Male', 'Plot-5, KDA Avenue', 'Village-15, Upazila-5, Rangpur', 'tareq.hasan@example.com', '123\r\n', 1512345678),
(6, 'Neha Rahman', 'Dhaka', 'Female', 'Shop-6, Gulshan 1', 'Village-15, Upazila-2, Barisal', 'neha.rahman@gmail.com', '$2y$10$abc123abc123abc123abc123abc123abc123abc123abc123abc123', 1712340006),
(7, 'Tanvir Ahmed', 'Dhaka', 'Male', 'Building 21, Banani', 'House-5, Ward-1, Khulna', 'tanvir.ahmed@gmail.com', '$2y$10$xyz123xyz123xyz123xyz123xyz123xyz123xyz123xyz123xyz123', 1712340007),
(8, 'Sadia Islam', 'Chattogram', 'Female', 'Shop 10, Halishahar', 'Village-3, Upazila-7, Sylhet', 'sadia.islam@gmail.com', '$2y$10$aaa123aaa123aaa123aaa123aaa123aaa123aaa123aaa123aaa123', 1712340008),
(9, 'Farzana Karim', 'Rajshahi', 'Female', 'House 12, Rajshahi Road', 'Village-9, Upazila-4, Mymensingh', 'farzana.karim@gmail.com', '$2y$10$bbb123bbb123bbb123bbb123bbb123bbb123bbb123bbb123bbb123', 1712340009),
(10, 'Hasan Chowdhury', 'Sylhet', 'Male', 'Shop 3, Station Road', 'House-2, Ward-5, Rangpur', 'hasan.chowdhury@gmail.com', '$2y$10$ccc123ccc123ccc123ccc123ccc123ccc123ccc123ccc123ccc123', 1712340010),
(11, 'Rina Akhter', 'Dhaka', 'Female', 'Flat 6B, Dhanmondi 27', 'Village-4, Upazila-3, Mymensingh', 'rina.akhter@gmail.com', '$2y$10$ddd123ddd123ddd123ddd123ddd123ddd123ddd123ddd123ddd123', 1712340011),
(12, 'Tariq Hossain', 'Dhaka', 'Male', 'Plot-8, Uttara Sector-13', 'Village-10, Upazila-2, Barisal', 'tariq.hossain@gmail.com', '$2y$10$eee123eee123eee123eee123eee123eee123eee123eee123eee123', 1712340012),
(13, 'Jannatul Ferdous', 'Chattogram', 'Female', 'Shop 22, CDA Avenue', 'Village-7, Upazila-4, Khulna', 'jannatul.ferdous@gmail.com', '$2y$10$fff123fff123fff123fff123fff123fff123fff123fff123fff123', 1712340013),
(14, 'Abir Rahman', 'Khulna', 'Male', 'Holding 3, Main Road', 'Village-5, Upazila-6, Rajshahi', 'abir.rahman@gmail.com', '$2y$10$ggg123ggg123ggg123ggg123ggg123ggg123ggg123ggg123ggg123', 1712340014),
(15, 'Afia Islam', 'Khulna', 'Female', 'Block A, Jashore Town', 'Village-8, Upazila-1, Sylhet', 'afia.islam@gmail.com', '$2y$10$hhh123hhh123hhh123hhh123hhh123hhh123hhh123hhh123hhh123', 1712340015),
(16, 'Nusrat Jahan', 'Dhaka', 'Female', 'House 9, Malibagh', 'Village-11, Upazila-3, Mymensingh', 'nusrat.jahan@gmail.com', '$2y$10$iii123iii123iii123iii123iii123iii123iii123iii123iii123', 1712340016),
(17, 'Ishtiaq Ahmed', 'Dhaka', 'Male', 'Plot-4, Bashundhara', 'Village-6, Upazila-5, Jamalpur', 'ishtiaq.ahmed@gmail.com', '$2y$10$jjj123jjj123jjj123jjj123jjj123jjj123jjj123jjj123jjj123', 1712340017),
(18, 'Mithila Haque', 'Sylhet', 'Female', 'Shop 6, Sylhet Center', 'Village-2, Upazila-8, Rangpur', 'mithila.haque@gmail.com', '$2y$10$kkk123kkk123kkk123kkk123kkk123kkk123kkk123kkk123kkk123', 1712340018),
(19, 'Rashidul Islam', 'Rajshahi', 'Male', 'Holding 23, Natore Bazar', 'Village-4, Upazila-2, Natore', 'rashidul.islam@gmail.com', '$2y$10$lll123lll123lll123lll123lll123lll123lll123lll123lll123', 1712340019),
(20, 'Afsana Nahar', 'Dhaka', 'Female', 'Flat-4C, Green Road', 'Village-12, Upazila-3, Mymensingh', 'afsana.nahar@gmail.com', '$2y$10$mmm123mmm123mmm123mmm123mmm123mmm123mmm123mmm123mmm123', 1712340020),
(21, 'Samiul Hasan', 'Chattogram', 'Male', 'Shop-12, Cox\'s Bazar Road', 'Village-13, Upazila-2, Cox\'s Bazar', 'samiul.hasan@gmail.com', '$2y$10$nnn123nnn123nnn123nnn123nnn123nnn123nnn123nnn123nnn123', 1712340021),
(22, 'Kawsar Ali', 'Chattogram', 'Male', 'Lane-5, Nasirabad', 'Village-5, Upazila-1, Chattogram', 'kawsar.ali@gmail.com', '$2y$10$ooo123ooo123ooo123ooo123ooo123ooo123ooo123ooo123ooo123', 1712340022),
(23, 'Asma Begum', 'Barisal', 'Female', 'Road-3, Barisal', 'Village-2, Upazila-6, Barisal', 'asma.begum@gmail.com', '$2y$10$ppp123ppp123ppp123ppp123ppp123ppp123ppp123ppp123ppp123', 1712340023),
(24, 'Shahina Akhter', 'Mymensingh', 'Female', 'House 7, Mymensingh Road', 'Village-3, Upazila-5, Mymensingh', 'shahina.akhter@gmail.com', '$2y$10$qqq123qqq123qqq123qqq123qqq123qqq123qqq123qqq123qqq123', 1712340024),
(25, 'Momena Khatun', 'Dhaka', 'Female', 'Flat 1A, Mohammadpur', 'Village-14, Upazila-2, Barisal', 'momena.khatun@gmail.com', '$2y$10$rrr123rrr123rrr123rrr123rrr123rrr123rrr123rrr123rrr123', 1712340025),
(35, 'Sohel Rana', 'Khulna', 'Male', 'Holding 7, Satkhira Road', 'Village-9, Upazila-7, Satkhira', 'sohel.rana@gmail.com', '$2y$10$sss123sss123sss123sss123sss123sss123sss123sss123sss123', 1712340035);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(300) NOT NULL,
  `availability` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `category`, `price`, `description`, `availability`) VALUES
(1, 'Plumber', 1500, 'Professional plumbing services including leak repairs and installations.', 'Available'),
(2, 'Cleaner', 1200, 'Thorough cleaning services for residential and commercial properties.', 'Available'),
(3, 'Carpenter', 2000, 'Custom furniture making, repairs, and wooden fittings.', 'Unavailable'),
(4, 'Painter', 1800, 'Interior and exterior painting services with quality finishes.', 'Available'),
(5, 'Electrician', 1700, 'Electrical repairs, wiring, and installation of appliances.', 'Available'),
(6, 'Furniture Moving', 150, 'Professional service for moving furniture safely and efficiently.', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` bigint(11) NOT NULL,
  `street` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zipcode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `password`, `phone`, `street`, `city`, `state`, `zipcode`) VALUES
(1, 'Kashful Alam', 'kashful.alam@example.com', '$2y$10$zm.Yyb2984BGk3JJaJ8KYe1ccpYyUgNlMYXdaUWBuKqh9jny/s/gG', 1712345678, '12 Green Road', 'Dhaka', 'Dhaka', 1215),
(2, 'Rahim Ahmed', 'rahim.ahmed@example.com', '$2y$10$pxoKDDu.V0mSmztfpkYpd.1nW5sNqzvtCJTOrZQbXxgCGH4MydfKm', 1556789012, '34/B Gulshan Avenue', 'Dhaka', 'Dhaka', 1229),
(3, 'Sharmin Akter', 'sharmin.akter@example.com', 'sharmin123', 1912345678, '56 Lake Road', 'Chattogram', 'Chattogram', 4000),
(4, 'Tanvir Hossain', 'tanvir.hossain@example.com', 'tanvir123', 1812345678, '78 Rajshahi Road', 'Rajshahi', 'Rajshahi', 6203),
(5, 'Nusrat Jahan', 'nusrat.jahan@example.com', 'nusrat123', 1612345678, '22 South Road', 'Sylhet', 'Sylhet', 3100),
(6, 'Rifat Mahmud', 'rifat@example.com', 'pass123', 1700000001, 'House-3, Road-4', 'Dhanmondi', 'Dhaka', 1209),
(7, 'Lamia Tabassum', 'lamia@example.com', 'pass123', 1700000002, 'House-7, Sector-10', 'Uttara', 'Dhaka', 1230),
(8, 'Jamil Ahmed', 'jamil@example.com', 'pass123', 1700000003, 'Building-5, Station Road', 'Agrabad', 'Chattogram', 4100),
(9, 'Shabnam Ferdous', 'shabnam@example.com', 'pass123', 1700000004, 'Holding-14, Main Road', 'Kushtia', 'Khulna', 7000),
(10, 'Rashidul Islam', 'rashidul@example.com', 'pass123', 1700000005, 'Plot-6, Hill View', 'Khulshi', 'Chattogram', 4203),
(11, 'Taslima Nasrin', 'taslima@example.com', 'pass123', 1700000006, 'House-8, Satmatha', 'Bogra', 'Rajshahi', 5800),
(12, 'Tariqul Haque', 'tariqul@example.com', 'pass123', 1700000007, 'Block-B, College Road', 'Shibganj', 'Rajshahi', 6300),
(13, 'Momena Khatun', 'momena@example.com', 'pass123', 1700000008, 'House-11, Main Bazar', 'Kurigram', 'Rangpur', 5600),
(14, 'Abdur Rahim', 'rahim@example.com', 'pass123', 1700000009, 'Holding-4, Jessore Sadar', 'Jessore', 'Khulna', 7400),
(15, 'Shakil Hossain', 'shakil@example.com', 'pass123', 1700000010, 'House-2, Rajshahi New Road', 'Rajshahi', 'Rajshahi', 6000),
(16, 'Sumaiya Haque', 'sumaiya@example.com', 'pass123', 1700000011, 'Lane-3, Kandirpar', 'Comilla', 'Chattogram', 3500),
(17, 'Ismail Hossain', 'ismail@example.com', 'pass123', 1700000012, 'Holding-9, College Gate', 'Brahmanbaria', 'Chattogram', 3400),
(18, 'Fatema Jahan', 'fatema@example.com', 'pass123', 1700000013, 'House-1, Town Hall Road', 'Mymensingh', 'Mymensingh', 2200),
(19, 'Kawsar Ahmed', 'kawsar@example.com', 'pass123', 1700000014, 'Flat-5B, Konabari', 'Gazipur', 'Dhaka', 1700),
(20, 'Afia Nahar', 'afia@example.com', 'pass123', 1700000015, 'Apartment-7A, Amberkhana', 'Sylhet', 'Sylhet', 3100),
(33, 'Nithin', 'nithinrafia@gmail.com', '112233', 1747082117, 'Road-7', 'banasree', 'dahka', 1219);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `book_service`
--
ALTER TABLE `book_service`
  ADD PRIMARY KEY (`booking_id`),
  ADD UNIQUE KEY `booking_id` (`booking_id`);

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`service_id`,`provider_id`);

--
-- Indexes for table `payment_transactions`
--
ALTER TABLE `payment_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`provider_id`),
  ADD UNIQUE KEY `provider_id` (`provider_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `book_service`
--
ALTER TABLE `book_service`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `payment_transactions`
--
ALTER TABLE `payment_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `provider`
--
ALTER TABLE `provider`
  MODIFY `provider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
