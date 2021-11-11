-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 11. Nov 2021 um 18:52
-- Server-Version: 10.4.21-MariaDB
-- PHP-Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `db_hotel_booking`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `hotels`
--

CREATE TABLE `hotels` (
  `hotel_id` int(11) NOT NULL,
  `hotel_name` varchar(30) NOT NULL,
  `address` varchar(60) NOT NULL,
  `price` int(11) NOT NULL,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `hotels`
--

INSERT INTO `hotels` (`hotel_id`, `hotel_name`, `address`, `price`, `picture`) VALUES
(2, 'Hotel Traube', 'Gasse 2, Wien, Zip2, Aut', 55, '618d5684e7287.jpg'),
(4, 'Rio Grande', 'boulevard 33, LA, 11000, USA', 100, 'default-pic.jpg'),
(5, 'Neue Post Gmbh', 'rosengasse 12, wien,1100,Aut', 70, 'default-pic.jpg'),
(6, 'Hotel Test', 'teststrasse 5, wien, 1190,Aut', 28, '618d55dd5fd5c.jpg');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`hotel_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `hotels`
--
ALTER TABLE `hotels`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
