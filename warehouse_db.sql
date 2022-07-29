-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2022 at 09:07 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warehouse_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `gender` text NOT NULL,
  `contactnumber` text NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `firstname`, `lastname`, `email`, `password`, `gender`, `contactnumber`, `address`) VALUES
(1, 'Admini', 'Strator', 'admin@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'Male', '09608663386', '25 Horizon Street'),
(2, 'F_name_client1', 'L_name_client1', 'client1@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'Female', '09175662335', '27 Vertical Street'),
(3, 'F_name_client2', 'L_name_client2', 'client2@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'Male', '09745211699', '360 Unit High Rise 5 Diagonal St.'),
(4, 'F_name_client3', 'L_name_client3', 'client3@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'Male', '09366258421', '45 Roll Down Contry St.'),
(16, 'Karl Vincent', 'Siapno', 'karl@gmail.com', '9dfa0fff2f094b6f9572a5b5eb1f6e8f', 'Male', '09317551136', '27 Galaxy Street'),
(17, 'Gio Allanson', 'Mangaoang', 'giomangaoang215@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'Male', '09608663386', '25 Horizon Street SSS Village Marikina City Concepcion Dos'),
(18, 'Dummy', 'Doe', 'dummyaccount1@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'Male', '09603355744', 'Dummy Street');

-- --------------------------------------------------------

--
-- Table structure for table `customer_messages`
--

CREATE TABLE `customer_messages` (
  `message_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `message_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_messages`
--

INSERT INTO `customer_messages` (`message_id`, `sender_id`, `receiver_id`, `message_timestamp`, `message_content`) VALUES
(1, 1, 2, '2022-06-20 20:42:29', 'hello client1'),
(2, 2, 1, '2022-06-20 20:42:59', 'hello Admin'),
(3, 1, 2, '2022-06-20 20:43:46', 'how are you?'),
(4, 2, 1, '2022-06-20 20:44:20', 'I\'m fine'),
(5, 3, 1, '2022-06-20 20:45:16', 'wassup Admin!'),
(6, 1, 3, '2022-06-20 20:45:59', 'Quite informal, but yes I\'m ok.'),
(7, 3, 1, '2022-06-20 20:46:44', 'sorry about that I\'ll do better next time.'),
(8, 1, 3, '2022-06-20 20:47:44', 'I believe you can do better :)'),
(9, 2, 4, '2022-06-20 20:48:48', 'I have some interest in your inventory may we do some transaction Client3?'),
(10, 4, 2, '2022-06-20 20:49:21', 'Sure lets make it happen.'),
(11, 2, 4, '2022-07-03 13:36:36', 'Great!'),
(12, 2, 3, '2022-07-03 13:36:59', 'Hello Client My name is Client 1.'),
(27, 2, 11, '2022-07-09 08:59:43', 'May I introduce myself'),
(28, 2, 11, '2022-07-09 08:59:52', 'My name is client1'),
(29, 11, 2, '2022-07-09 09:02:02', 'Hello client1, my name is Gio and this is my sample message'),
(31, 11, 2, '2022-07-09 09:19:10', 'I gotta say this messaging system is a lot smoother'),
(32, 1, 2, '2022-07-13 07:39:28', 'hello again'),
(33, 16, 1, '2022-07-14 14:31:30', 'Hello'),
(34, 16, 1, '2022-07-14 14:32:06', 'I am Karl'),
(37, 2, 4, '2022-07-16 16:05:40', 'nice');

-- --------------------------------------------------------

--
-- Table structure for table `in_storage`
--

CREATE TABLE `in_storage` (
  `item_id` int(11) NOT NULL,
  `item_name` text NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `fragility` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `expiration` date NOT NULL,
  `date_in` date NOT NULL,
  `date_order` date NOT NULL,
  `admin_confirm` int(11) NOT NULL,
  `client_confirm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `in_storage`
--

INSERT INTO `in_storage` (`item_id`, `item_name`, `sender_id`, `receiver_id`, `fragility`, `quantity`, `expiration`, `date_in`, `date_order`, `admin_confirm`, `client_confirm`) VALUES
(1, 'Unicorndog Toy', 2, 2, 'No', 10, '1111-11-11', '2022-04-06', '2022-07-03', 1, 1),
(4, 'Tuna Cans', 2, 2, 'Yes', 20, '2023-06-07', '2022-04-06', '2022-07-08', 1, 1),
(5, 'Poodle Dog Foods', 2, 4, 'No', 5, '2024-06-01', '2022-06-02', '2022-06-06', 1, 0),
(7, 'DVD exclusive cases', 2, 1, 'Yes', 65, '1111-11-11', '2022-07-07', '2022-07-28', 1, 0),
(9, 'Chili Cans', 2, 16, 'Yes', 10, '2022-07-27', '2022-07-08', '2022-07-28', 1, 0),
(10, 'Morgan Jelly Beans', 2, 1, 'No', 78, '2022-07-26', '2022-07-13', '1111-11-11', 0, 0),
(11, 'Cpu Processors', 16, 1, 'Yes', 10, '1111-11-11', '2022-07-14', '1111-11-11', 1, 0),
(12, 'Gaming consoles', 16, 1, 'No', 32, '1111-11-11', '2022-07-14', '1111-11-11', 1, 0),
(13, 'Ice Cream Ice Packets Powder', 16, 1, 'No', 100, '2022-07-18', '2022-07-14', '1111-11-11', 0, 0),
(14, 'Box Glass Container', 16, 1, 'No', 42, '1111-11-11', '2022-07-14', '1111-11-11', 0, 0),
(15, 'Encrypter', 2, 1, 'No', 75, '1111-11-11', '2022-07-16', '1111-11-11', 0, 0),
(16, 'decrypter papers', 2, 1, 'No', 145, '1111-11-11', '2022-07-16', '1111-11-11', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_messages`
--
ALTER TABLE `customer_messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `in_storage`
--
ALTER TABLE `in_storage`
  ADD PRIMARY KEY (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `customer_messages`
--
ALTER TABLE `customer_messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `in_storage`
--
ALTER TABLE `in_storage`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
