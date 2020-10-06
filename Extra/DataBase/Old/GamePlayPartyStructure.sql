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

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cinemas`
--

CREATE TABLE `cinemas` (
  `Cinema_ID` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `adress` varchar(60) NOT NULL,
  `city` varchar(40) NOT NULL,
  `zipcode` varchar(6) NOT NULL,
  `province` varchar(20) NOT NULL,
  `images` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `customerreservations`
--

CREATE TABLE `customerreservations` (
  `Reservation_ID` int(11) DEFAULT NULL,
  `Customer_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `customers`
--

CREATE TABLE `customers` (
  `Customer_ID` int(11) NOT NULL,
  `firstName` varchar(40) NOT NULL,
  `preposition` varchar(10) DEFAULT NULL,
  `lastName` varchar(40) NOT NULL,
  `phoneNumber` int(11) DEFAULT NULL,
  `adress` varchar(80) NOT NULL,
  `city` varchar(40) NOT NULL,
  `zipcode` varchar(6) NOT NULL,
  `province` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `facilities`
--

CREATE TABLE `facilities` (
  `Hall_ID` int(11) DEFAULT NULL,
  `facility` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `halls`
--

CREATE TABLE `halls` (
  `Hall_ID` int(11) NOT NULL,
  `Cinema_ID` int(11) DEFAULT NULL,
  `hallNumber` int(11) NOT NULL,
  `quantityChairs` int(11) NOT NULL,
  `wheelchairAccessible` varchar(5) NOT NULL,
  `screenSize` varchar(20) NOT NULL,
  `version` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `prices`
--

CREATE TABLE `prices` (
  `Service_ID` int(11) NOT NULL,
  `service` varchar(30) NOT NULL,
  `servicePrice` decimal(6,2) NOT NULL,
  `regularPrice` decimal(4,2) NOT NULL,
  `surcharges` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reservationcinemas`
--

CREATE TABLE `reservationcinemas` (
  `Reservation_ID` int(11) DEFAULT NULL,
  `Cinema_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reservationprices`
--

CREATE TABLE `reservationprices` (
  `Reservation_ID` int(11) DEFAULT NULL,
  `Service_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reservations`
--

CREATE TABLE `reservations` (
  `Reservation_ID` int(11) NOT NULL,
  `ReservationDate` date NOT NULL,
  `ReservationTime` time NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `User_ID` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(80) NOT NULL,
  `firstName` varchar(40) NOT NULL,
  `preposition` varchar(10) DEFAULT NULL,
  `lastName` varchar(40) NOT NULL,
  `authority_level` int(11) NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `cinemas`
--
ALTER TABLE `cinemas`
  ADD PRIMARY KEY (`Cinema_ID`);

--
-- Indexen voor tabel `customerreservations`
--
ALTER TABLE `customerreservations`
  ADD KEY `Reservation_ID` (`Reservation_ID`),
  ADD KEY `Customer_ID` (`Customer_ID`);

--
-- Indexen voor tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`Customer_ID`);

--
-- Indexen voor tabel `facilities`
--
ALTER TABLE `facilities`
  ADD KEY `Hall_ID` (`Hall_ID`);

--
-- Indexen voor tabel `halls`
--
ALTER TABLE `halls`
  ADD PRIMARY KEY (`Hall_ID`),
  ADD KEY `Cinema_ID` (`Cinema_ID`);

--
-- Indexen voor tabel `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`Service_ID`);

--
-- Indexen voor tabel `reservationcinemas`
--
ALTER TABLE `reservationcinemas`
  ADD KEY `Reservation_ID` (`Reservation_ID`),
  ADD KEY `Cinema_ID` (`Cinema_ID`);

--
-- Indexen voor tabel `reservationprices`
--
ALTER TABLE `reservationprices`
  ADD KEY `Reservation_ID` (`Reservation_ID`),
  ADD KEY `Service_ID` (`Service_ID`);

--
-- Indexen voor tabel `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`Reservation_ID`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `cinemas`
--
ALTER TABLE `cinemas`
  MODIFY `Cinema_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `Customer_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `halls`
--
ALTER TABLE `halls`
  MODIFY `Hall_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `prices`
--
ALTER TABLE `prices`
  MODIFY `Service_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `reservations`
--
ALTER TABLE `reservations`
  MODIFY `Reservation_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `customerreservations`
--
ALTER TABLE `customerreservations`
  ADD CONSTRAINT `customerreservations_ibfk_1` FOREIGN KEY (`Reservation_ID`) REFERENCES `reservations` (`Reservation_ID`),
  ADD CONSTRAINT `customerreservations_ibfk_2` FOREIGN KEY (`Customer_ID`) REFERENCES `customers` (`Customer_ID`);

--
-- Beperkingen voor tabel `facilities`
--
ALTER TABLE `facilities`
  ADD CONSTRAINT `facilities_ibfk_1` FOREIGN KEY (`Hall_ID`) REFERENCES `halls` (`Hall_ID`);

--
-- Beperkingen voor tabel `halls`
--
ALTER TABLE `halls`
  ADD CONSTRAINT `halls_ibfk_1` FOREIGN KEY (`Cinema_ID`) REFERENCES `cinemas` (`Cinema_ID`);

--
-- Beperkingen voor tabel `reservationcinemas`
--
ALTER TABLE `reservationcinemas`
  ADD CONSTRAINT `reservationcinemas_ibfk_1` FOREIGN KEY (`Reservation_ID`) REFERENCES `reservations` (`Reservation_ID`),
  ADD CONSTRAINT `reservationcinemas_ibfk_2` FOREIGN KEY (`Cinema_ID`) REFERENCES `cinemas` (`Cinema_ID`);

--
-- Beperkingen voor tabel `reservationprices`
--
ALTER TABLE `reservationprices`
  ADD CONSTRAINT `reservationprices_ibfk_1` FOREIGN KEY (`Reservation_ID`) REFERENCES `reservations` (`Reservation_ID`),
  ADD CONSTRAINT `reservationprices_ibfk_2` FOREIGN KEY (`Service_ID`) REFERENCES `prices` (`Service_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
