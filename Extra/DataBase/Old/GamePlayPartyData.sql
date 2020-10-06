-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 06 okt 2020 om 09:22
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

--
-- Gegevens worden geëxporteerd voor tabel `cinemas`
--

INSERT INTO `cinemas` (`Cinema_ID`, `name`, `adress`, `city`, `zipcode`, `province`, `images`) VALUES
(1, 'Kinepolis Jaarbeurs', 'Jaarbeursboulevard 300', 'Utrecht', '3521BC', 'Utrecht', ''),
(2, 'Kinepolis Almere', 'Forum 16', 'Almere', '1315TH', 'Flevoland', ''),
(3, 'Kinepolis Breda', 'Bavelseparklaan 4', 'Breda', '4817ZX', 'Brabant', ''),
(4, 'Kinepolis Groningen', 'Boumaboulevard 53', 'Groningen', '9723ZS', 'Groningen', '');

--
-- Gegevens worden geëxporteerd voor tabel `customerreservations`
--

INSERT INTO `customerreservations` (`Reservation_ID`, `Customer_ID`) VALUES
(1, 1);

--
-- Gegevens worden geëxporteerd voor tabel `customers`
--

INSERT INTO `customers` (`Customer_ID`, `firstName`, `preposition`, `lastName`, `phoneNumber`, `adress`, `city`, `zipcode`, `province`) VALUES
(1, 'Bob', NULL, 'Nab', NULL, 'Voorbeeld 1', 'VB1', '1234AB', 'Voorbeeld 1'),
(2, 'Dyon', 'van', 'Raaij', NULL, 'Voorbeeld 2', 'VB2', '4321ZY', 'Voorbeeld 2'),
(3, 'Harisan', NULL, 'Nades', NULL, 'Voorbeeld 3', 'VB3', '0000AA', 'Voorbeeld 3'),
(4, 'Haitam', NULL, 'Bacha', NULL, 'Voorbeeld 4', 'VB4', '9999ZZ', 'Voorbeeld 4'),
(5, 'Falco', NULL, 'Koop', NULL, 'Voorbeeld 5', 'VB5', '0109AZ', 'Voorbeeld 5'),
(6, 'Max', NULL, 'Verstappen', NULL, 'Spa-Francochamps', 'Spa', '0123AA', 'Limburg'),
(7, 'Lewis', NULL, 'Hamilton', NULL, 'Silverstone', 'Oxford', '8520MN', 'Engenland'),
(8, 'Buurman', 'en', 'Buurman', NULL, 'Bij de Buurman', 'Bij de Buurman', '7899OP', 'Bij de Buurman'),
(9, 'Ernst', 'en de rest', 'Bobbie', NULL, 'Bij boer Harm', 'NPO3', '7899OP', 'Zappelin');

--
-- Gegevens worden geëxporteerd voor tabel `facilities`
--

INSERT INTO `facilities` (`Hall_ID`, `facility`) VALUES
(1, 'Snacks'),
(NULL, 'Frisdrank'),
(1, 'Film');

--
-- Gegevens worden geëxporteerd voor tabel `halls`
--

INSERT INTO `halls` (`Hall_ID`, `Cinema_ID`, `hallNumber`, `quantityChairs`, `wheelchairAccessible`, `screenSize`, `version`) VALUES
(1, 1, 15, 100, '5', '1900x1080', '1');

--
-- Gegevens worden geëxporteerd voor tabel `prices`
--

INSERT INTO `prices` (`Service_ID`, `service`, `servicePrice`, `regularPrice`, `surcharges`) VALUES
(1, 'Toeslag film 135 min en langer', '0.50', '0.50', '0.50'),
(2, '3D excl. bril', '1.50', '1.50', '1.50'),
(3, '3D incl. Bril', '2.60', '2.60', '2.60'),
(4, 'Dolby Atmos', '1.50', '1.50', '1.50'),
(5, 'Laser Ultra', '2.50', '2.50', '2.50'),
(6, 'Cosy', '2.50', '2.50', '2.50');

--
-- Gegevens worden geëxporteerd voor tabel `reservationcinemas`
--

INSERT INTO `reservationcinemas` (`Reservation_ID`, `Cinema_ID`) VALUES
(1, 1);

--
-- Gegevens worden geëxporteerd voor tabel `reservations`
--

INSERT INTO `reservations` (`Reservation_ID`, `ReservationDate`, `ReservationTime`, `Date`) VALUES
(1, '2020-10-05', '11:47:00', '2020-10-05 11:46:28'),
(2, '2020-10-12', '18:16:17', '2020-10-06 09:11:11'),
(3, '2020-12-12', '21:08:00', '2020-10-06 09:11:35'),
(4, '2021-06-10', '14:02:00', '2020-10-06 09:12:03'),
(5, '2019-06-10', '09:30:15', '2020-10-06 09:12:21'),
(6, '2018-11-12', '12:45:00', '2020-10-06 09:12:59');

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`User_ID`, `username`, `password`, `email`, `firstName`, `preposition`, `lastName`, `authority_level`, `creation_date`) VALUES
(1, 'bobnab', '1234', 'boskaboutertje@outlook.com', 'Bob', NULL, 'Nab', 3, '2020-10-05 11:45:38');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
