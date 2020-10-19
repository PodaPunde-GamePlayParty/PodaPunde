-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 19 okt 2020 om 12:28
-- Serverversie: 10.1.38-MariaDB
-- PHP-versie: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gameplayparty`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cinemas`
--

CREATE TABLE `cinemas` (
  `cinema_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(20) NOT NULL,
  `adress` varchar(60) NOT NULL,
  `city` varchar(40) NOT NULL,
  `zipcode` varchar(6) NOT NULL,
  `province` varchar(20) NOT NULL,
  `images` text,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `cinemas`
--

INSERT INTO `cinemas` (`cinema_id`, `user_id`, `name`, `adress`, `city`, `zipcode`, `province`, `images`, `description`) VALUES
(1, 4, 'Kinepolis Jaarbeurs', 'Jaarbeursboulevard 300', 'Utrecht', '3521BC', 'Utrecht', 'kinepolis_jaarbeurs_utrecht.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec magna tortor. Duis metus nunc, varius et dolor non, ultricies pulvinar tortor. Aenean non auctor nibh, et dignissim libero. Aliquam erat volutpat. Nulla pulvinar hendrerit magna eget malesuada. Donec non turpis sapien. Duis venenatis ante a arcu varius condimentum sit amet eget tortor. Nam eget nibh sit amet metus pulvinar dictum. Donec eu velit vitae nisl ullamcorper volutpat.  In hac habitasse platea dictumst. Fusce odio lacus, porttitor nec rutrum a, blandit non dui. Sed at vestibulum purus. Nulla in finibus tortor. Nunc vehicula lorem ut dictum molestie. Pellentesque laoreet nisi sapien, faucibus bibendum risus tempus sit amet. Phasellus nulla massa, lacinia at sapien et, sagittis eleifend arcu. Interdum et malesuada fames ac ante ipsum primis in faucibus. Morbi ac orci vitae leo rhoncus imperdiet. In hac habitasse platea dictumst. Nulla facilisi. Donec ullamcorper consequat mi, et pellentesque odio blandit sit amet.  Ut dictum, dui sit amet placerat lobortis, nisi lacus consectetur dui, non ultricies lacus leo ut dui. Ut hendrerit felis at nunc tincidunt, quis placerat enim dictum. Nulla aliquet fringilla orci, vitae placerat purus tincidunt a. Ut ullamcorper risus dolor, placerat gravida orci bibendum sed. Ut tincidunt est at imperdiet volutpat. Suspendisse potenti. Aliquam a fringilla est, in auctor eros. Duis auctor urna justo, eget faucibus sapien tristique egestas. Donec at eros vel metus pharetra euismod ac a nibh. Aenean luctus neque eleifend pulvinar egestas. Aliquam efficitur, metus vel laoreet pulvinar, urna sem tincidunt libero, ac tristique nisl nisi viverra turpis. Proin egestas tortor ut vehicula consequat. Etiam porta elit id ultrices auctor.'),
(2, 5, 'Kinepolis Almere', 'Forum 16', 'Almere', '1315TH', 'Flevoland', 'kinepolis_almere.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec magna tortor. Duis metus nunc, varius et dolor non, ultricies pulvinar tortor. Aenean non auctor nibh, et dignissim libero. Aliquam erat volutpat. Nulla pulvinar hendrerit magna eget malesuada. Donec non turpis sapien. Duis venenatis ante a arcu varius condimentum sit amet eget tortor. Nam eget nibh sit amet metus pulvinar dictum. Donec eu velit vitae nisl ullamcorper volutpat.  In hac habitasse platea dictumst. Fusce odio lacus, porttitor nec rutrum a, blandit non dui. Sed at vestibulum purus. Nulla in finibus tortor. Nunc vehicula lorem ut dictum molestie. Pellentesque laoreet nisi sapien, faucibus bibendum risus tempus sit amet. Phasellus nulla massa, lacinia at sapien et, sagittis eleifend arcu. Interdum et malesuada fames ac ante ipsum primis in faucibus. Morbi ac orci vitae leo rhoncus imperdiet. In hac habitasse platea dictumst. Nulla facilisi. Donec ullamcorper consequat mi, et pellentesque odio blandit sit amet.  Ut dictum, dui sit amet placerat lobortis, nisi lacus consectetur dui, non ultricies lacus leo ut dui. Ut hendrerit felis at nunc tincidunt, quis placerat enim dictum. Nulla aliquet fringilla orci, vitae placerat purus tincidunt a. Ut ullamcorper risus dolor, placerat gravida orci bibendum sed. Ut tincidunt est at imperdiet volutpat. Suspendisse potenti. Aliquam a fringilla est, in auctor eros. Duis auctor urna justo, eget faucibus sapien tristique egestas. Donec at eros vel metus pharetra euismod ac a nibh. Aenean luctus neque eleifend pulvinar egestas. Aliquam efficitur, metus vel laoreet pulvinar, urna sem tincidunt libero, ac tristique nisl nisi viverra turpis. Proin egestas tortor ut vehicula consequat. Etiam porta elit id ultrices auctor.'),
(3, 6, 'Kinepolis Breda', 'Bavelseparklaan 4', 'Breda', '4817ZX', 'Brabant', 'kinepolis_breda.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec magna tortor. Duis metus nunc, varius et dolor non, ultricies pulvinar tortor. Aenean non auctor nibh, et dignissim libero. Aliquam erat volutpat. Nulla pulvinar hendrerit magna eget malesuada. Donec non turpis sapien. Duis venenatis ante a arcu varius condimentum sit amet eget tortor. Nam eget nibh sit amet metus pulvinar dictum. Donec eu velit vitae nisl ullamcorper volutpat.  In hac habitasse platea dictumst. Fusce odio lacus, porttitor nec rutrum a, blandit non dui. Sed at vestibulum purus. Nulla in finibus tortor. Nunc vehicula lorem ut dictum molestie. Pellentesque laoreet nisi sapien, faucibus bibendum risus tempus sit amet. Phasellus nulla massa, lacinia at sapien et, sagittis eleifend arcu. Interdum et malesuada fames ac ante ipsum primis in faucibus. Morbi ac orci vitae leo rhoncus imperdiet. In hac habitasse platea dictumst. Nulla facilisi. Donec ullamcorper consequat mi, et pellentesque odio blandit sit amet.  Ut dictum, dui sit amet placerat lobortis, nisi lacus consectetur dui, non ultricies lacus leo ut dui. Ut hendrerit felis at nunc tincidunt, quis placerat enim dictum. Nulla aliquet fringilla orci, vitae placerat purus tincidunt a. Ut ullamcorper risus dolor, placerat gravida orci bibendum sed. Ut tincidunt est at imperdiet volutpat. Suspendisse potenti. Aliquam a fringilla est, in auctor eros. Duis auctor urna justo, eget faucibus sapien tristique egestas. Donec at eros vel metus pharetra euismod ac a nibh. Aenean luctus neque eleifend pulvinar egestas. Aliquam efficitur, metus vel laoreet pulvinar, urna sem tincidunt libero, ac tristique nisl nisi viverra turpis. Proin egestas tortor ut vehicula consequat. Etiam porta elit id ultrices auctor.'),
(4, 7, 'Kinepolis Groningen', 'Boumaboulevard 53', 'Groningen', '9723ZS', 'Groningen', 'kinepolis_groningen.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec magna tortor. Duis metus nunc, varius et dolor non, ultricies pulvinar tortor. Aenean non auctor nibh, et dignissim libero. Aliquam erat volutpat. Nulla pulvinar hendrerit magna eget malesuada. Donec non turpis sapien. Duis venenatis ante a arcu varius condimentum sit amet eget tortor. Nam eget nibh sit amet metus pulvinar dictum. Donec eu velit vitae nisl ullamcorper volutpat.  In hac habitasse platea dictumst. Fusce odio lacus, porttitor nec rutrum a, blandit non dui. Sed at vestibulum purus. Nulla in finibus tortor. Nunc vehicula lorem ut dictum molestie. Pellentesque laoreet nisi sapien, faucibus bibendum risus tempus sit amet. Phasellus nulla massa, lacinia at sapien et, sagittis eleifend arcu. Interdum et malesuada fames ac ante ipsum primis in faucibus. Morbi ac orci vitae leo rhoncus imperdiet. In hac habitasse platea dictumst. Nulla facilisi. Donec ullamcorper consequat mi, et pellentesque odio blandit sit amet.  Ut dictum, dui sit amet placerat lobortis, nisi lacus consectetur dui, non ultricies lacus leo ut dui. Ut hendrerit felis at nunc tincidunt, quis placerat enim dictum. Nulla aliquet fringilla orci, vitae placerat purus tincidunt a. Ut ullamcorper risus dolor, placerat gravida orci bibendum sed. Ut tincidunt est at imperdiet volutpat. Suspendisse potenti. Aliquam a fringilla est, in auctor eros. Duis auctor urna justo, eget faucibus sapien tristique egestas. Donec at eros vel metus pharetra euismod ac a nibh. Aenean luctus neque eleifend pulvinar egestas. Aliquam efficitur, metus vel laoreet pulvinar, urna sem tincidunt libero, ac tristique nisl nisi viverra turpis. Proin egestas tortor ut vehicula consequat. Etiam porta elit id ultrices auctor.');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `customerreservations`
--

CREATE TABLE `customerreservations` (
  `reservation_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `customerreservations`
--

INSERT INTO `customerreservations` (`reservation_id`, `customer_id`) VALUES
(1, 2),
(2, 3),
(3, 8),
(4, 1),
(5, 9),
(6, 5),
(6, 4),
(7, 3),
(8, 7),
(9, 6),
(10, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `preposition` varchar(10) DEFAULT NULL,
  `lastname` varchar(40) NOT NULL,
  `phonenumber` int(11) DEFAULT NULL,
  `adress` varchar(80) NOT NULL,
  `city` varchar(40) NOT NULL,
  `zipcode` varchar(6) NOT NULL,
  `province` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `customers`
--

INSERT INTO `customers` (`customer_id`, `firstname`, `preposition`, `lastname`, `phonenumber`, `adress`, `city`, `zipcode`, `province`) VALUES
(1, 'Bob', NULL, 'Nab', NULL, 'Voorbeeld 1', 'VB1', '1234AB', 'Voorbeeld 1'),
(2, 'Dyon', 'van', 'Raaij', NULL, 'Voorbeeld 2', 'VB2', '4321ZY', 'Voorbeeld 2'),
(3, 'Harisan', NULL, 'Nades', NULL, 'Voorbeeld 3', 'VB3', '0000AA', 'Voorbeeld 3'),
(4, 'Haitam', NULL, 'Bacha', NULL, 'Voorbeeld 4', 'VB4', '9999ZZ', 'Voorbeeld 4'),
(5, 'Falco', NULL, 'Koop', NULL, 'Voorbeeld 5', 'VB5', '0109AZ', 'Voorbeeld 5'),
(6, 'Max', NULL, 'Verstappen', NULL, 'Spa-Francochamps', 'Spa', '0123AA', 'Limburg'),
(7, 'Lewis', NULL, 'Hamilton', NULL, 'Silverstone', 'Oxford', '8520MN', 'Engenland'),
(8, 'Buurman', 'en', 'Buurman', NULL, 'Bij de Buurman', 'Bij de Buurman', '7899OP', 'Bij de Buurman'),
(9, 'Ernst', 'en de rest', 'Bobbie', NULL, 'Bij boer Harm', 'NPO3', '7899OP', 'Zappelin');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `facilities`
--

CREATE TABLE `facilities` (
  `hall_id` int(11) DEFAULT NULL,
  `facility` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `facilities`
--

INSERT INTO `facilities` (`hall_id`, `facility`) VALUES
(1, 'Snacks'),
(1, 'Frisdrank'),
(1, 'Film'),
(2, 'Snacks'),
(2, 'Frisdrank'),
(2, 'Film'),
(3, 'Snacks'),
(3, 'Frisdrank'),
(3, 'Film'),
(4, 'Snacks'),
(4, 'Frisdrank'),
(4, 'Film'),
(5, 'Snacks'),
(5, 'Frisdrank'),
(5, 'Film'),
(6, 'Snacks'),
(6, 'Frisdrank'),
(6, 'Film'),
(7, 'Snacks'),
(7, 'Frisdrank'),
(7, 'Film'),
(8, 'Snacks'),
(8, 'Frisdrank'),
(8, 'Film'),
(9, 'Snacks'),
(9, 'Frisdrank'),
(9, 'Film'),
(10, 'Snacks'),
(10, 'Frisdrank'),
(10, 'Film'),
(11, 'Snacks'),
(11, 'Frisdrank'),
(11, 'Film'),
(12, 'Snacks'),
(12, 'Frisdrank'),
(12, 'Film');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `halls`
--

CREATE TABLE `halls` (
  `hall_id` int(11) NOT NULL,
  `cinema_id` int(11) DEFAULT NULL,
  `hall_number` int(11) NOT NULL,
  `quantity_chairs` int(11) NOT NULL,
  `wheelchair_accessible` varchar(5) NOT NULL,
  `screen_size` varchar(20) NOT NULL,
  `version` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `halls`
--

INSERT INTO `halls` (`hall_id`, `cinema_id`, `hall_number`, `quantity_chairs`, `wheelchair_accessible`, `screen_size`, `version`) VALUES
(1, 1, 1, 100, '5', '1900x1080', '1'),
(2, 1, 2, 100, '2', '1900x1080', '1'),
(3, 1, 3, 108, '8', '1900x1080', '2'),
(4, 2, 1, 100, '5', '1900x1080', '7.9'),
(5, 2, 2, 78, '3', '1900x1080', '2'),
(6, 2, 3, 44, '4', '1900x1080', '3'),
(7, 3, 1, 205, '5', '1900x1080', '6'),
(8, 3, 2, 207, '2', '1900x1080', '10.0.5'),
(9, 3, 3, 250, '10', '1900x1080', '10.1.7'),
(10, 4, 1, 52, '2', '1900x1080', '1'),
(11, 4, 2, 58, '3', '1900x1080', '3'),
(12, 4, 3, 64, '4', '1900x1080', '0.8');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `prices`
--

CREATE TABLE `prices` (
  `service_id` int(11) NOT NULL,
  `service` varchar(30) NOT NULL,
  `service_price` decimal(6,2) NOT NULL,
  `regular_price` decimal(4,2) NOT NULL,
  `surcharges` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `prices`
--

INSERT INTO `prices` (`service_id`, `service`, `service_price`, `regular_price`, `surcharges`) VALUES
(1, 'Toeslag film 135 min en langer', '0.50', '0.50', '0.50'),
(2, '3D excl. bril', '1.50', '1.50', '1.50'),
(3, '3D incl. Bril', '2.60', '2.60', '2.60'),
(4, 'Dolby Atmos', '1.50', '1.50', '1.50'),
(5, 'Laser Ultra', '2.50', '2.50', '2.50'),
(6, 'Cosy', '2.50', '2.50', '2.50');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reservationcinemas`
--

CREATE TABLE `reservationcinemas` (
  `reservation_id` int(11) DEFAULT NULL,
  `cinema_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `reservationcinemas`
--

INSERT INTO `reservationcinemas` (`reservation_id`, `cinema_id`) VALUES
(1, 2),
(2, 3),
(3, 4),
(4, 1),
(5, 2),
(6, 4),
(7, 3),
(8, 1),
(9, 4),
(10, 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reservationprices`
--

CREATE TABLE `reservationprices` (
  `reservation_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `reservationprices`
--

INSERT INTO `reservationprices` (`reservation_id`, `service_id`) VALUES
(1, 2),
(1, 4),
(1, 5),
(2, 3),
(2, 6),
(3, 4),
(5, 5),
(3, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` int(11) NOT NULL,
  `reservation_date` date NOT NULL,
  `reservation_time` time NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `reservation_date`, `reservation_time`, `date`) VALUES
(1, '2020-10-05', '11:47:00', '2020-10-05 11:46:28'),
(2, '2020-10-12', '18:16:17', '2020-10-06 09:11:11'),
(3, '2020-12-12', '21:08:00', '2020-10-06 09:11:35'),
(4, '2021-06-10', '14:02:00', '2020-10-06 09:12:03'),
(5, '2019-06-10', '09:30:15', '2020-10-06 09:12:21'),
(6, '2018-11-12', '12:45:00', '2020-10-06 09:12:59'),
(7, '2020-10-24', '13:13:16', '2020-10-06 09:46:47'),
(8, '2020-10-09', '23:17:15', '2020-10-06 09:47:03'),
(9, '2020-10-21', '15:10:00', '2020-10-06 09:47:12'),
(10, '2020-10-11', '08:07:00', '2020-10-06 09:47:20');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(80) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `preposition` varchar(10) DEFAULT NULL,
  `lastname` varchar(40) NOT NULL,
  `authority_level` int(11) NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `firstname`, `preposition`, `lastname`, `authority_level`, `creation_date`) VALUES
(1, 'bobnab', '61f279253021bbff55c54e977eff50277d0fb1ba', 'boskaboutertje@outlook.com', 'Bob', NULL, 'Nab', 1, '2020-10-05 11:45:38'),
(2, 'dyonvanraaij', '\'e8367be53c7d9d1d1aca99f756ef227a9f7af41c', 'dyon.a.van.raaij@gmail.com', 'Dyon', 'Van', 'Raaij', 1, '2020-10-06 09:45:13'),
(3, 'podapunde', '1ed279193c21815131fb97798f3f7e9ef4c9cb69', 'podapunde@gameplayparties.nl', 'Poda', NULL, 'Punde', 1, '2020-10-14 13:39:51'),
(4, 'kinpolisurecht', '1b1f41d618e4f868e1c3499f5576e23a466683ea', 'jaarbeursutrecht@kinepolis.nl', 'Kinepolis', NULL, 'Jaarbeurs Utrecht', 2, '2020-10-15 14:07:45'),
(5, 'kinepolisalmere', '1b1f41d618e4f868e1c3499f5576e23a466683ea', 'almere@kinepolis.nl', 'Kinepolis', NULL, 'almere', 2, '2020-10-15 14:10:24'),
(6, 'kinepolisbreda', '1b1f41d618e4f868e1c3499f5576e23a466683ea', 'breda@kinepolis.nl', 'Kinepolis', NULL, 'Breda', 2, '2020-10-15 15:41:03'),
(7, 'kinepolisgroningen', '1b1f41d618e4f868e1c3499f5576e23a466683ea', 'groningen@kinepolis.nl', 'Kinepolis', NULL, 'groningen', 2, '2020-10-15 15:42:03');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `cinemas`
--
ALTER TABLE `cinemas`
  ADD PRIMARY KEY (`cinema_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexen voor tabel `customerreservations`
--
ALTER TABLE `customerreservations`
  ADD KEY `Reservation_ID` (`reservation_id`),
  ADD KEY `Customer_ID` (`customer_id`);

--
-- Indexen voor tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexen voor tabel `facilities`
--
ALTER TABLE `facilities`
  ADD KEY `Hall_ID` (`hall_id`);

--
-- Indexen voor tabel `halls`
--
ALTER TABLE `halls`
  ADD PRIMARY KEY (`hall_id`),
  ADD KEY `cinema_id` (`cinema_id`);

--
-- Indexen voor tabel `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexen voor tabel `reservationcinemas`
--
ALTER TABLE `reservationcinemas`
  ADD KEY `Reservation_ID` (`reservation_id`),
  ADD KEY `Cinema_ID` (`cinema_id`);

--
-- Indexen voor tabel `reservationprices`
--
ALTER TABLE `reservationprices`
  ADD KEY `Reservation_ID` (`reservation_id`),
  ADD KEY `Service_ID` (`service_id`);

--
-- Indexen voor tabel `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `cinemas`
--
ALTER TABLE `cinemas`
  MODIFY `cinema_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `halls`
--
ALTER TABLE `halls`
  MODIFY `hall_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT voor een tabel `prices`
--
ALTER TABLE `prices`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `cinemas`
--
ALTER TABLE `cinemas`
  ADD CONSTRAINT `cinemas_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Beperkingen voor tabel `customerreservations`
--
ALTER TABLE `customerreservations`
  ADD CONSTRAINT `customerreservations_ibfk_1` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`reservation_id`),
  ADD CONSTRAINT `customerreservations_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Beperkingen voor tabel `facilities`
--
ALTER TABLE `facilities`
  ADD CONSTRAINT `facilities_ibfk_1` FOREIGN KEY (`hall_id`) REFERENCES `halls` (`hall_id`);

--
-- Beperkingen voor tabel `halls`
--
ALTER TABLE `halls`
  ADD CONSTRAINT `halls_ibfk_1` FOREIGN KEY (`cinema_id`) REFERENCES `cinemas` (`cinema_id`);

--
-- Beperkingen voor tabel `reservationcinemas`
--
ALTER TABLE `reservationcinemas`
  ADD CONSTRAINT `reservationcinemas_ibfk_1` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`reservation_id`),
  ADD CONSTRAINT `reservationcinemas_ibfk_2` FOREIGN KEY (`cinema_id`) REFERENCES `cinemas` (`cinema_id`);

--
-- Beperkingen voor tabel `reservationprices`
--
ALTER TABLE `reservationprices`
  ADD CONSTRAINT `reservationprices_ibfk_1` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`reservation_id`),
  ADD CONSTRAINT `reservationprices_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `prices` (`service_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
