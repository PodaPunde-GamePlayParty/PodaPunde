-- phpMyAdmin SQL Dump
<<<<<<< HEAD
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2020 at 09:36 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
=======
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 20 sep 2020 om 15:56
-- Serverversie: 10.1.38-MariaDB
-- PHP-versie: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
>>>>>>> origin/bob
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gameplayparty`
--
<<<<<<< HEAD
=======
CREATE DATABASE IF NOT EXISTS `gameplayparty` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `gameplayparty`;
>>>>>>> origin/bob

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- Table structure for table `cinemas`
=======
-- Tabelstructuur voor tabel `cinemas`
>>>>>>> origin/bob
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

<<<<<<< HEAD
--
-- Dumping data for table `cinemas`
--

INSERT INTO `cinemas` (`Cinema_ID`, `Hall_ID`, `name`, `adress`, `city`, `zipcode`, `province`) VALUES
(1, 1, 'Pathé Rembrant', 'Oudegracht 73', 'Utrecht', '3511A', 'Utrecht'),
(2, 2, 'Pathé Groningen', 'Gedempte Zuiderdiep 78', 'Groningen', '9711H', 'Groningen'),
(3, 3, 'Kineplis Almere', 'Forum 16', 'Almere', '1315T', 'Flevoland'),
(4, 4, 'Pathé Arena', 'ArenA Boulevard 600', 'Amsterdam', '1101D', 'Noord-Holland'),
(5, 5, 'Fulcotheater', 'Overtoom 3', 'Ijsselstein', '3401B', 'Utrecht'),
(6, 6, 'Vue Nijmegen', 'Plein 1944 28', 'Nijmegen', '6511J', 'Gelderland'),
(7, 7, 'Euroscoop Tilburg', 'Olympiaplein 2', 'Tilburg', '5502D', 'Noord-Brabant');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
=======
-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `customers`
>>>>>>> origin/bob
--

CREATE TABLE `customers` (
  `Customer_ID` int(11) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `preposition` varchar(10) NOT NULL,
  `lastName` varchar(40) NOT NULL,
  `phoneNumber` int(11) NOT NULL,
  `adress` varchar(80) NOT NULL,
  `city` varchar(40) NOT NULL,
  `zipcode` varchar(5) NOT NULL,
  `province` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

<<<<<<< HEAD
--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`Customer_ID`, `firstname`, `preposition`, `lastName`, `phoneNumber`, `adress`, `city`, `zipcode`, `province`) VALUES
(1, 'John', '', 'Smith', 625123451, 'Motellaan 2', 'Nijmegen', '2321V', 'Gelderland'),
(2, 'Don', '', 'Corleone', 612345678, 'Marktlaan 2', 'Rotterdam', '5231D', 'Zuid-Holland'),
(3, 'Donkey', '', 'Kong', 62312341, 'BanananenBerg 4', 'Arnhem', '3401B', 'Gelderland'),
(4, 'Boudewijn', '', 'Billymans', 621212121, 'Marktplaats 5', 'Eindhoven', '6511J', 'Den Bosch'),
(5, 'Bandana', '', 'Broeder', 614231242, 'Fagotlaan 4', 'Nieuwegein', '3438C', 'Utrecht');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
=======
-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `facilities`
>>>>>>> origin/bob
--

CREATE TABLE `facilities` (
  `Hall_ID` int(11) NOT NULL,
  `facility` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

<<<<<<< HEAD
--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`Hall_ID`, `facility`) VALUES
(1, 'Surroundsound'),
(2, '3D'),
(3, 'massage stoel'),
(4, 'Surround sound'),
(5, 'massage stoel'),
(6, '3D'),
(7, 'Deep imersion');

-- --------------------------------------------------------

--
-- Table structure for table `halls`
=======
-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `halls`
>>>>>>> origin/bob
--

CREATE TABLE `halls` (
  `Hall_ID` int(11) NOT NULL,
  `hallNumber` int(11) NOT NULL,
  `quantityChairs` int(11) NOT NULL,
  `wheelchairAccessible` varchar(5) NOT NULL,
  `screenSize` varchar(20) NOT NULL,
  `version` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

<<<<<<< HEAD
--
-- Dumping data for table `halls`
--

INSERT INTO `halls` (`Hall_ID`, `hallNumber`, `quantityChairs`, `wheelchairAccessible`, `screenSize`, `version`) VALUES
(1, 1, 50, 'ja', '15x30', ''),
(2, 2, 25, 'no', '15x30', ''),
(3, 2, 50, 'ja', '15x30', ''),
(4, 3, 25, 'nee', '15x30', ''),
(5, 5, 90, 'ja', '15x50', ''),
(6, 2, 25, 'no', '20x80', ''),
(7, 3, 69, 'no', '20x80', '');

-- --------------------------------------------------------

--
-- Table structure for table `prices`
=======
-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `prices`
>>>>>>> origin/bob
--

CREATE TABLE `prices` (
  `Service_ID` int(11) NOT NULL,
  `service` varchar(30) NOT NULL,
  `servicePrice` decimal(4,2) NOT NULL,
  `regularPrice` decimal(2,2) NOT NULL,
  `surcharges` decimal(2,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

<<<<<<< HEAD
--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`Service_ID`, `service`, `servicePrice`, `regularPrice`, `surcharges`) VALUES
(1, 'All you can drink', '25.00', '0.99', '0.99'),
(2, 'Online gaming', '10.00', '0.99', '0.99'),
(3, 'Cloud Save', '5.00', '0.99', '0.99');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
=======
-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reservations`
>>>>>>> origin/bob
--

CREATE TABLE `reservations` (
  `Reservation_ID` int(11) NOT NULL,
  `Customer_ID` int(11) NOT NULL,
  `Service_ID` int(11) NOT NULL,
  `Cinema_ID` int(11) NOT NULL,
  `reservationDate` date NOT NULL,
<<<<<<< HEAD
  `reservationTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cinemas`
=======
  `reservationTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `cinemas`
>>>>>>> origin/bob
--
ALTER TABLE `cinemas`
  ADD PRIMARY KEY (`Cinema_ID`);

--
<<<<<<< HEAD
-- Indexes for table `customers`
=======
-- Indexen voor tabel `customers`
>>>>>>> origin/bob
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`Customer_ID`);

--
<<<<<<< HEAD
-- Indexes for table `halls`
=======
-- Indexen voor tabel `halls`
>>>>>>> origin/bob
--
ALTER TABLE `halls`
  ADD PRIMARY KEY (`Hall_ID`);

--
<<<<<<< HEAD
-- Indexes for table `prices`
=======
-- Indexen voor tabel `prices`
>>>>>>> origin/bob
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`Service_ID`);

--
<<<<<<< HEAD
-- Indexes for table `reservations`
=======
-- Indexen voor tabel `reservations`
>>>>>>> origin/bob
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`Reservation_ID`);

--
<<<<<<< HEAD
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cinemas`
--
ALTER TABLE `cinemas`
  MODIFY `Cinema_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `Customer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `halls`
--
ALTER TABLE `halls`
  MODIFY `Hall_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `Service_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reservations`
=======
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
>>>>>>> origin/bob
--
ALTER TABLE `reservations`
  MODIFY `Reservation_ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
