-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 23 dec 2017 om 21:35
-- Serverversie: 10.1.26-MariaDB
-- PHP-versie: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `example`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `invoices`
--

CREATE TABLE `invoices` (
  `invoiceId` int(11) NOT NULL,
  `invoiceDate` datetime NOT NULL,
  `invoicePrice` float(11,2) NOT NULL DEFAULT '0.00',
  `invoicePaid` int(1) NOT NULL DEFAULT '0' COMMENT '0 = Niet betaald, 1 = betaald',
  `invoiceUserId` int(11) NOT NULL,
  `invoiceCustomer` varchar(63) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `invoices`
--

INSERT INTO `invoices` (`invoiceId`, `invoiceDate`, `invoicePrice`, `invoicePaid`, `invoiceUserId`, `invoiceCustomer`) VALUES
(1, '2017-11-08 10:31:21', 5.50, 0, 75, 'Niels rook'),
(2, '2017-11-20 17:16:43', 18.50, 1, 75, 'Piet petersen');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `roles`
--

CREATE TABLE `roles` (
  `rolesId` int(4) NOT NULL,
  `rolesName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `roles`
--

INSERT INTO `roles` (`rolesId`, `rolesName`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `teams`
--

CREATE TABLE `teams` (
  `teamId` int(11) NOT NULL,
  `teamName` text NOT NULL,
  `teamDescription` text NOT NULL,
  `teamGames` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `teams`
--

INSERT INTO `teams` (`teamId`, `teamName`, `teamDescription`, `teamGames`) VALUES
(1, 'Henkers', 'Alleen Henk mag hier in', 'Henkerwatch'),
(2, '123', '456', '789'),
(9, 'Test', '123', 'Hallo'),
(10, '1', '2', '3'),
(11, '3', '4', '5'),
(12, '0', '9', '8');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tournaments`
--

CREATE TABLE `tournaments` (
  `tournamentsId` int(3) NOT NULL,
  `tournamentsName` varchar(255) NOT NULL,
  `tournamentsGame` varchar(255) NOT NULL,
  `tournamentsStartingTime` time NOT NULL,
  `tournamentsTeams` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tournaments`
--

INSERT INTO `tournaments` (`tournamentsId`, `tournamentsName`, `tournamentsGame`, `tournamentsStartingTime`, `tournamentsTeams`) VALUES
(2, 'test', 'test', '00:00:00', 12),
(8, 'csgo - toernooi', 'csgo', '00:00:00', 12),
(10, '', '', '00:00:00', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userEmail` varchar(256) NOT NULL,
  `userPassword` varchar(256) NOT NULL,
  `userFName` varchar(256) NOT NULL,
  `userLName` varchar(256) NOT NULL,
  `userRoleId` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`userId`, `userEmail`, `userPassword`, `userFName`, `userLName`, `userRoleId`) VALUES
(92, 'example@gmail.com', 'geqgeqgqe', 'qeggqeqge', 'geqgeqgeq', 1),
(93, 'test@gmail.com', 'test', 'Example2', 'example2', 2),
(100, 'test3@gmail.com', '$2y$10$WYp45Q2FkTqF4tU6oynuP.4fM3ryZeuJew4a5Hc1BLpO5QzlVd5QW', 'Wollie', 'Donk', 1);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoiceId`);

--
-- Indexen voor tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`rolesId`);

--
-- Indexen voor tabel `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`teamId`);

--
-- Indexen voor tabel `tournaments`
--
ALTER TABLE `tournaments`
  ADD PRIMARY KEY (`tournamentsId`),
  ADD UNIQUE KEY `tournamentsName` (`tournamentsName`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD KEY `users_ibfk_1` (`userRoleId`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoiceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT voor een tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `rolesId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT voor een tabel `teams`
--
ALTER TABLE `teams`
  MODIFY `teamId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT voor een tabel `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `tournamentsId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`userRoleId`) REFERENCES `roles` (`rolesId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
