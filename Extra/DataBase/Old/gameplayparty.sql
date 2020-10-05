-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2020 at 11:48 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`Customer_ID`, `firstname`, `preposition`, `lastName`, `phoneNumber`, `adress`, `city`, `zipcode`, `province`) VALUES
(1, 'John', '', 'Smith', 625123451, 'Motellaan 2', 'Nijmegen', '2321V', 'Gelderland'),
(2, 'Don', '', 'Corleone', 612345678, 'Marktlaan 2', 'Rotterdam', '5231D', 'Zuid-Holland'),
(3, 'Donkey', '', 'Kong', 62312341, 'BanananenBerg 4', 'Arnhem', '3401B', 'Gelderland'),
(4, 'Boudewijn', '', 'Billymans', 621212121, 'Marktplaats 5', 'Eindhoven', '6511J', 'Den Bosch'),
(5, 'Bandana', '', 'Broeder', 614231242, 'Fagotlaan 4', 'Nieuwegein', '3438C', 'Utrecht');

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

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`Service_ID`, `service`, `servicePrice`, `regularPrice`, `surcharges`) VALUES
(1, 'All you can drink', '25.00', '0.99', '0.99'),
(2, 'Online gaming', '10.00', '0.99', '0.99'),
(3, 'Cloud Save', '5.00', '0.99', '0.99');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
