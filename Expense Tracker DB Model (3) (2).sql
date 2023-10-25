--
-- Database: `trading_project_db`
--
CREATE DATABASE IF NOT EXISTS expense_tracker_db;

USE expense_tracker_db;

CREATE TABLE IF NOT EXISTS `user` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `user_id` varchar(50) UNIQUE NOT NULL,
  `fullname` varchar(255),
  `date_created` date NOT NULL DEFAULT current_date(),
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
);

CREATE TABLE `account` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `user_id` varchar(50) NOT NULL,
  `balance` DECIMAL(10, 2) NOT NULL DEFAULT 0,
  `income` DECIMAL(10, 2) NOT NULL DEFAULT 0,
  `expense` DECIMAL(10, 2) NOT NULL DEFAULT 0
);

CREATE TABLE IF NOT EXISTS `budgets` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` varchar(50) NOT NULL,
    category VARCHAR(255) NOT NULL,
    monthly VARCHAR(255) NOT NULL,
    descriptioned VARCHAR(255) NOT NULL,
    limit_amount DECIMAL(10, 2) NOT NULL,
    `date_created` date NOT NULL DEFAULT current_date()
);

CREATE TABLE IF NOT EXISTS `expense` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` varchar(50) NOT NULL,
    `type`  varchar(50),
    comodity VARCHAR(255) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL
);

CREATE TABLE IF NOT EXISTS `trackers` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `user_id` varchar(50) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` enum("Pending", "Approved", "Completed") NOT NULL DEFAULT "Pending",
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `wallet_addr` varchar(255) NOT NULL,
  `image` varchar(255),
  `network` varchar(255),
  `coin` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL
);



ALTER TABLE `trackers` ADD FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
ALTER TABLE `budgets` ADD FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
ALTER TABLE `expense` ADD FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
ALTER TABLE `account` ADD FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
    
