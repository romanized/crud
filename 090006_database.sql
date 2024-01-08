-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 08 jan 2024 om 01:06
-- Serverversie: 10.4.28-MariaDB
-- PHP-versie: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `090006_database`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `crud_agenda`
--

CREATE TABLE `crud_agenda` (
  `ID` int(11) NOT NULL COMMENT 'De key, auto nummering',
  `Onderwerp` varchar(30) NOT NULL COMMENT 'Titel',
  `Inhoud` text NOT NULL COMMENT 'Wat moet er allemaal gebeuren?',
  `Begindatum` date NOT NULL COMMENT 'Standaard de dag van vandaag',
  `Einddatum` date NOT NULL COMMENT 'Alleen datum, geen tijd',
  `Prioriteit` tinyint(4) NOT NULL COMMENT 'van 1 tot 5',
  `Status` enum('n','b','a') NOT NULL COMMENT '''niet begonnen'', ''bezig'', ''afgerond'''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `crud_agenda`
--

INSERT INTO `crud_agenda` (`ID`, `Onderwerp`, `Inhoud`, `Begindatum`, `Einddatum`, `Prioriteit`, `Status`) VALUES
(1, 'Teams meeting', 'Teams meeting voor school opdracht', '2023-12-21', '2023-12-21', 3, 'a'),
(2, 'Bootcamp', 'School bootcamp met opdrachten', '2023-12-24', '2023-12-29', 2, 'b'),
(3, 'Kerst vakantie', 'Vrij van school I.V.B feestdagen / nieuw jaar', '2023-12-25', '2024-01-08', 5, 'b'),
(4, 'Huisarts afspraak', 'Huisarts afspraak door erge keelpijn', '2023-12-27', '2023-12-27', 5, 'n'),
(6, 'Ortho', 'Controle beugel', '2023-12-22', '2023-12-22', 5, 'a'),
(7, 'Verjaardag', 'Verjaardag van broertje', '2024-02-18', '2024-02-18', 4, 'n'),
(8, 'OOP2', 'Opdracht 4.1 maken', '2023-12-24', '2023-12-24', 4, 'b');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'glr', '$2y$10$jf4jiTTy7yH1l7ecUfcmMOGDWBQvFKsYKFtdoSNjIUGD0.fxV/g42');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `crud_agenda`
--
ALTER TABLE `crud_agenda`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `crud_agenda`
--
ALTER TABLE `crud_agenda`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'De key, auto nummering', AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
