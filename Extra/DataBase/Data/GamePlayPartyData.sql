-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 06 okt 2020 om 11:04
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

INSERT INTO `cinemas` (`cinema_id`, `name`, `adress`, `city`, `zipcode`, `province`, `images`) VALUES
(1, 'Kinepolis Jaarbeurs', 'Jaarbeursboulevard 300', 'Utrecht', '3521BC', 'Utrecht', ''),
(2, 'Kinepolis Almere', 'Forum 16', 'Almere', '1315TH', 'Flevoland', ''),
(3, 'Kinepolis Breda', 'Bavelseparklaan 4', 'Breda', '4817ZX', 'Brabant', ''),
(4, 'Kinepolis Groningen', 'Boumaboulevard 53', 'Groningen', '9723ZS', 'Groningen', '');

--
-- Gegevens worden geëxporteerd voor tabel `customerreservations`
--

INSERT INTO `customerreservations` (`reservation_id`, `customer_id`) VALUES
(1, 1),
(2, 5),
(1, 8),
(7, 3),
(5, 1),
(10, 2),
(8, 4);

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

--
-- Gegevens worden geëxporteerd voor tabel `reservationcinemas`
--

INSERT INTO `reservationcinemas` (`reservation_id`, `cinema_id`) VALUES
(1, 1),
(4, 3),
(3, 4),
(8, 2),
(3, 4),
(4, 4);

--
-- Gegevens worden geëxporteerd voor tabel `reservationprices`
--

INSERT INTO `reservationprices` (`reservation_id`, `service_id`) VALUES
(1, 3),
(3, 2),
(4, 2),
(7, 3),
(8, 4),
(2, 5);

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

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `firstname`, `preposition`, `lastname`, `authority_level`, `creation_date`) VALUES
(1, 'bobnab', '1234', 'boskaboutertje@outlook.com', 'Bob', NULL, 'Nab', 3, '2020-10-05 11:45:38'),
(2, 'dyonvanraaij', '\'e8367be53c7d9d1d1aca99f756ef227a9f7af41c', 'dyon.a.van.raaij@gmail.com', 'Dyon', 'Van', 'Raaij', 1, '2020-10-06 09:45:13');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
