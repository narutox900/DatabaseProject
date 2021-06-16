-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2021 at 04:11 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` double NOT NULL,
  `number_of_review` int(11) DEFAULT 0,
  `publisher` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail_address` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bookPDF` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `title`, `author`, `description`, `rating`, `number_of_review`, `publisher`, `thumbnail_address`, `bookPDF`) VALUES
(14, 'Sapiens: A Brief History of Humankind', 'Yuval Noah Harari', 'A Summer Reading Pick for President Barack Obama, Bill Gates, and Mark Zuckerberg', 0, 0, 'Harper', 'fileupload/thumbnail/841ede7008f16592c073384acf61dbc2.jpg', 'fileupload/bookPDF/7e51148422b0ce950e04df599d32b801.pdf'),
(15, '21 Lessons for the 21st Century', 'Yuval Noah Harari', 'An Amazon Best Book of September 2018', 0, 0, 'Harper', 'fileupload/thumbnail/84ed450b396794192a21d0cbc9692464.jpg', 'fileupload/bookPDF/66af5399873d1e78f2fb1dc5f8dc88d5.pdf'),
(16, 'The Alchemist', ' Paulo Coelho', 'This story, dazzling in its simplicity and wisdom, is about an Andalusian shepherd boy named Santiago who travels from his homeland in Spain to the Egyptian desert in search of treasure buried in the Pyramids. ', 0, 0, 'Harper', 'fileupload/thumbnail/41ad675002ef81596d27a0ac86bef59d.jpg', 'fileupload/bookPDF/7817cfcf186a9437565570e7473dfa6f.pdf'),
(22, 'SAPIENS: A GRAPHIC HISTORY, VOLUME I', 'Yuval Noah Harari', 'Sapiens: A Graphic History is an epic, radical adaptation of Yuval Noah Harari’s bestselling book, bursting with wit, humor, and colorful illustrations.', 0, 0, 'Albin Michel Publishing', 'fileupload/thumbnail/bb79d13fb89687c3504e457eec940ea3.jpg', 'fileupload/bookPDF/f6c2e0ab503298ad003e076c1ceb4391.pdf'),
(23, 'The Subtle Art of Not Giving a Fuck', 'Mark Manson', 'In my life, I have given a fuck about many people and many things. I have also not given a fuck about many people and many things. ', 0, 0, 'Albin Michel Publishing', 'fileupload/thumbnail/cd2b31156bcd3351dee98215aca10e89.jpg', 'fileupload/bookPDF/e71f192b6be1bf13beadeae889848f4d.pdf'),
(25, 'Mastering Bitcoin', 'Andreas M. Antonopoulos', 'Join the technological revolution that’s taking the world of finance by storm. Mastering Bitcoin is your guide through the seemingly complex world of bitcoin, providing the knowledge you need to participate in the internet of money.', 0, 0, 'OReilly', 'fileupload/thumbnail/1255df0792a731a64d20fd43c0c32f01.jpg', 'fileupload/bookPDF/0a0977bf20a05367aff422d8ec929518.pdf'),
(27, 'Mastering Ethereum', 'Gavin Wood', 'Mastering Ethereum is a book for developers, offering a guide to the operation and use of the Ethereum, Ethereum Classic, RootStock (RSK) and other compatible EVM-based open blockchains', 0, 0, 'OReilly', 'fileupload/thumbnail/11b545e54dfa4fe3fc13ffd0906e7e45.png', 'fileupload/bookPDF/7d11bdb535345e63c77630a569f6a175.pdf'),
(28, ' Guide to Stoicism: Tools for Emotional Resilience', 'Matthew Van Natta', 'Being a stoic means embracing positivity and self-control through the ability to accept the uncertainty of outcomes.', 0, 0, 'Harper', 'fileupload/thumbnail/1361718c13a1e04fc08d396ff2bcbc78.jpg', 'fileupload/bookPDF/075b5dffd466f32a63c1da329ea2419b.pdf'),
(29, '13 Reasons Why', 'JAY ASHER', 'The theme behind the book is bullying and in some ways also the stigma related to suicide.', 0, 0, 'Harper', 'fileupload/thumbnail/7cd8a4c6cfb6cc439b0280c934bca51a.jpeg', 'fileupload/bookPDF/e880c5caaaf14a1e50a4b27bccc2bd60.pdf'),
(30, 'The Old Man And The Sea', 'Ernest Hemingway', 'This tale of an aged Cuban fisherman going head-to-head (or hand-to-fin) with a magnificent marlin encapsulates Hemingway’s favorite motifs of physical and moral challenge.', 0, 0, 'Penguin Random House US', 'fileupload/thumbnail/887e208f078beac4e69987340f8a8fb8.jpg', 'fileupload/bookPDF/4356ae3cbbf0ad7cc07375fb050be23c.pdf'),
(31, 'Twenty Thousand Leagues Under The Sea', 'Jules Verne ', 'Vingt mille lieues sous les mers. English', 0, 0, 'Penguin Random House US', 'fileupload/thumbnail/6dfe4a5976111c09d7bdcf37deb36101.jpg', 'fileupload/bookPDF/006e2d1a1ebd587acb58ed3fcc9e9ac2.pdf'),
(32, 'Nobodys boy', 'Hector Malot', 'Story of a young boy who discovers, at the age of eight, that he was a foundling. When his foster father sends him away he must find a way to survive and also discover his true identity', 0, 0, ' University of Illinois Urbana-Champaign', 'fileupload/thumbnail/58165b75fbf86dc583300ea8bf75ab40.jpg', 'fileupload/bookPDF/57b4c046a2edf94c098e366c8a4cf7ce.pdf'),
(33, 'Uncle Toms Cabin', 'Hammatt Billings', 'Uncle Toms Cabin tells the story of Uncle Tom, depicted as a saintly, dignified slave. While being transported by boat to auction in New Orleans, Tom saves the life of Little Eva, whose grateful father then purchases Tom.', 0, 0, 'Penguin Random House US', 'fileupload/thumbnail/568810374a970a61ad30846882c9c503.jpg', 'fileupload/bookPDF/e5bbafe887e189fccc70b74e9bb5ff06.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `bookcategory`
--

CREATE TABLE `bookcategory` (
  `book_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookcategory`
--

INSERT INTO `bookcategory` (`book_id`, `category_id`) VALUES
(22, 9),
(23, 8),
(25, 12),
(27, 12),
(28, 1),
(28, 9),
(28, 12),
(29, 9),
(29, 13),
(30, 1),
(30, 9),
(30, 12),
(31, 1),
(31, 9),
(31, 12),
(32, 9),
(32, 12),
(33, 9),
(33, 12);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'History'),
(8, 'Entertainment'),
(9, 'Social Science'),
(10, 'Sport'),
(12, 'Education'),
(13, 'Romatic'),
(14, 'Horror');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `salt` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `email`, `name`, `password`, `role_id`, `salt`) VALUES
(1, 'admin@gmail.com', 'admin', '7ca5f60595c92613c127995592c1a7abd2a925e7493d77b8ae7536bd769b6571', 1, 'IdxVcp05vp5m8GktioBwIdxVcp05vp5m'),
(2, 'user@gmail.com', 'user', '53a96b198cf0c22fc034fe7c5156b6ff418ba014adacced2fa44b8a79bd6abf9', 2, 'cJPH7lhD9ZE0iKzXTy5jcJPH7lhD9ZE0'),
(3, 'dpth@gmail.com', 'dpth', 'c0ca52f231e9ce67f8036990b091864b6d0eca9e6829b37c6dc305e471beaac4', 2, '7557a3b6572174c406d8fa177ec30ad0'),
(4, 'ntmchau2202@gmail.com', 'Minh Chau', 'd2c8132d80acad85ea03653e4ed63f31a738e2dfaead21f9e375e73f8a58975d', 2, '3055bb562bf22cf19ea49a09d1e0e3ac'),
(5, 'linh@gmail.com', 'linh', '0c59a0527c6114bb20f12624d5e591964866280c4bf1e0a15e884455de6f2e66', 2, '621553c7281b9743ffebdbd1ebd13cda');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `book_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `rold_id` int(11) NOT NULL,
  `rold_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`rold_id`, `rold_name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `subcribelist`
--

CREATE TABLE `subcribelist` (
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcribelist`
--

INSERT INTO `subcribelist` (`email`) VALUES
('dat122@gmail.com'),
('dpth@gmail.com'),
('linh@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `bookcategory`
--
ALTER TABLE `bookcategory`
  ADD PRIMARY KEY (`book_id`,`category_id`),
  ADD KEY `fk_category_book_category` (`category_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_client_role_id` (`role_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`book_id`,`client_id`),
  ADD KEY `fk_client_review` (`client_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`rold_id`);

--
-- Indexes for table `subcribelist`
--
ALTER TABLE `subcribelist`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `rold_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookcategory`
--
ALTER TABLE `bookcategory`
  ADD CONSTRAINT `fk_book_book_category` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_category_book_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `fk_client_role_id` FOREIGN KEY (`role_id`) REFERENCES `role` (`rold_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `fk_book_review` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_client_review` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
