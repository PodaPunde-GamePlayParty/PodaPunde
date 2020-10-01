-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 28 sep 2020 om 11:54
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
  `Hall_ID` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `adress` varchar(80) NOT NULL,
  `city` varchar(40) NOT NULL,
  `zipcode` varchar(5) NOT NULL,
  `province` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `customers`
--

CREATE TABLE `customers` (
  `Customer_ID` int(11) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `preposition` varchar(10) NOT NULL,
  `lastName` varchar(40) NOT NULL,
  `phoneNumber` int(11) NOT NULL,
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
  `Hall_ID` int(11) NOT NULL,
  `facility` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `halls`
--

CREATE TABLE `halls` (
  `Hall_ID` int(11) NOT NULL,
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
  `servicePrice` decimal(4,2) NOT NULL,
  `regularPrice` decimal(2,2) NOT NULL,
  `surcharges` decimal(2,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reservations`
--

CREATE TABLE `reservations` (
  `Reservation_ID` int(11) NOT NULL,
  `Customer_ID` int(11) NOT NULL,
  `Service_ID` int(11) NOT NULL,
  `Cinema_ID` int(11) NOT NULL,
  `reservationDate` date NOT NULL,
  `reservationTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
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
-- Indexen voor tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`Customer_ID`);

--
-- Indexen voor tabel `halls`
--
ALTER TABLE `halls`
  ADD PRIMARY KEY (`Hall_ID`);

--
-- Indexen voor tabel `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`Service_ID`);

--
-- Indexen voor tabel `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`Reservation_ID`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
