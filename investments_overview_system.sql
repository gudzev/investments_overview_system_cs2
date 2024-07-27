-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2024 at 01:07 PM
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
-- Database: `investments_overview_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_url` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `item_image_url` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_url`, `item_name`, `created_at`, `item_image_url`) VALUES
(1, 'https://steamcommunity.com/market/priceoverview/?country=DE&currency=3&appid=730&market_hash_name=Paris%202023%20Legends%20Sticker%20Capsule', 'Paris 2023 Legends Sticker Capsule', '2024-07-27', 'https://community.akamai.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXU5A1PIYQNqhpOSV-fRPasw8rsQEl9Jg9SpIW1KgRr7OPJYzRRvozkx7-HkvDxPb_C2GpXsZEo0ryTo46kjAXj80dpY2Cmd4GTdAVrZw2GqFm3kLq-gsK_tJTXiSw0PgRQD7c/'),
(3, 'https://steamcommunity.com/market/priceoverview/?country=DE&currency=3&appid=730&market_hash_name=Trapper%20|%20Guerrilla%20Warfare', 'Trapper | Guerrilla Warfare', '2024-07-27', 'https://community.akamai.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXA6Q1NL4kmrAlOA0_FVPCi2t_fUkRxNztDu4WvPgln3_b3YzxL6Nmkq5aKhf71Pa_XxCVQ7Z1wjr_H9Nmm2g3trUFoZDj3cdLGdQc-aFvR_VO7le_ugZLutJ6c1zI97ccDnNzc/360fx360f'),
(4, 'https://steamcommunity.com/market/priceoverview/?country=DE&currency=3&appid=730&market_hash_name=Dreams%20%26%20Nightmares%20Case', 'Dreams & Nightmares Case', '2024-07-27', 'https://community.akamai.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXU5A1PIYQNqhpOSV-fRPasw8rsUFJ5KBFZv668FFQwnfCcJmxDv9rhwIHZwqP3a-uGwz9Xv8F0j-qQrI3xiVLkrxVuZW-mJoWLMlhpWhFkc9M/360fx360f'),
(5, 'https://steamcommunity.com/market/priceoverview/?country=DE&currency=3&appid=730&market_hash_name=Number%20K%20|%20The%20Professionals', 'Number K | The Professionals', '2024-07-27', 'https://community.akamai.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXA6Q1NL4kmrAlOA0_FVPCi2t_fUkRxNztDu4W1OQhm1uDbeDJM7dCJgoGZnrmma7rTwT4J7cZyjLyR9I-t2gDhr0VlMDiiIoGSIwA_Z1DYq1G8l73qm9bi63cyi3Zu/360fx36'),
(6, 'https://steamcommunity.com/market/priceoverview/?country=DE&currency=3&appid=730&market_hash_name=Sticker%20|%20MOUZ%20(Holo)%20|%20Paris%202023', 'Sticker | MOUZ (Holo) | Paris 2023', '2024-07-27', 'https://community.akamai.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXQ9QVcJY8gulRNTV7ZVLb9hZycXlJhPztfubaqZVQzi6ORJGxB7YnjldXclvPyZ-3Xzj0Dvp0n0rqWpdz30FKx_UpqNT_tZNjCn8bv-yU/360fx360f');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_items`
--

CREATE TABLE `user_items` (
  `user_item_id` int(11) NOT NULL,
  `item_quantity` varchar(255) NOT NULL,
  `item_price_paid_for` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `item_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_items`
--
ALTER TABLE `user_items`
  ADD PRIMARY KEY (`user_item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_items`
--
ALTER TABLE `user_items`
  MODIFY `user_item_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
