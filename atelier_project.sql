-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 13 nov 2018 om 11:26
-- Serverversie: 5.6.38
-- PHP-versie: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atelier_project`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `borrowed`
--

CREATE TABLE `borrowed` (
  `id` int(11) NOT NULL,
  `student_number` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `borrowed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `borrowed_till` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `returned` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `for_what` text NOT NULL,
  `note_before` text NOT NULL,
  `note_after` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `borrowed`
--

INSERT INTO `borrowed` (`id`, `student_number`, `customer_name`, `customer_email`, `customer_phone`, `user_id`, `borrowed_at`, `borrowed_till`, `returned`, `product_id`, `for_what`, `note_before`, `note_after`) VALUES
(11, '', 'Stef Verstraten', 's.verstraten@sintlucasedu.nl', '0623661936', '', '2018-11-12 12:35:42', '2018-11-09 23:00:00', 'yes', 25, '', '', 'helemaal kut'),
(12, '37431', 'Stef', 's.verstraten@sintlucasedu.nl', '', '', '2018-11-12 13:34:48', '2018-11-22 23:00:00', 'no', 28, '', 'Dit product was al half kapot', ''),
(13, '372627', 'Gijs Vogels', 'gijs@hotmail.com', '623661936', '', '2018-11-08 19:51:33', '2018-11-15 23:00:00', 'no', 27, '', 'test', ''),
(14, '37431', 'Stef Verstraten', 's.verstraten@sintlucasedu.nl', '623661936', '', '2018-11-08 20:24:34', '2018-11-07 23:00:00', 'yes', 27, '', '', ''),
(15, '372627', 'Stef Verstraten', 's.verstraten@sintlucasedu.nl', '623661936', '', '2018-11-08 20:29:30', '2018-11-05 23:00:00', 'yes', 25, '', 'test', 'test'),
(16, '34234', 'Stef Verstraten', 's.verstraten@sintlucasedu.nl', '623661936', '', '2018-11-12 13:18:09', '2018-11-04 23:00:00', 'yes', 28, '', 'test', ''),
(17, '', 'Stef Verstraten', 's.verstraten@sintlucasedu.nl', '623661936', '', '2018-11-08 20:36:45', '2019-05-03 22:00:00', 'no', 28, '', '', ''),
(18, '372627', 'Stef Verstraten', 's.verstraten@sintlucasedu.nl', '623661936', '', '2018-11-12 13:35:54', '2019-03-14 23:00:00', 'no', 28, '', '', ''),
(19, '37431', 'test', 's.verstraten@sintlucasedu.nl', '623661936', '', '2018-11-12 14:11:00', '2018-11-14 23:00:00', 'yes', 28, 'presentatie', 'Deze student mag dit product lenen voor zijn of haar project', 'Netjes en in goede staat ingeleverd'),
(20, '3743§', 'Stef Verstraten', 's.verstraten@sintlucasedu.nl', '623661936', '', '2018-11-12 14:11:25', '2018-11-06 23:00:00', 'no', 28, '', '', ''),
(21, '37431', 'Stef Verstraten', 's.verstraten@sintlucasedu.nl', '623661936', '', '2018-11-13 09:34:11', '2018-11-14 23:00:00', 'no', 29, 'Tentoonstelling', '', '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`) VALUES
(7, 'Overig', 'Overig'),
(8, 'Projecten', 'Projecten');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `count` int(11) NOT NULL,
  `product_lent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `name`, `slug`, `body`, `created_at`, `count`, `product_lent`) VALUES
(28, 7, 'Arduino', 'Arduino', 'moi appaar', '2018-11-08 14:34:16', 50, 4),
(29, 8, 'ADHD Brein', 'ADHD-Brein', 'Project gemaakt door studenten', '2018-11-12 12:47:12', 1, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `borrowed`
--
ALTER TABLE `borrowed`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `borrowed`
--
ALTER TABLE `borrowed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT voor een tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
