-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 11 mei 2022 om 14:46
-- Serverversie: 10.4.24-MariaDB
-- PHP-versie: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `taste1`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestelling`
--

CREATE TABLE `bestelling` (
  `bestelling_id` int(50) NOT NULL,
  `tafel_nr` int(50) NOT NULL DEFAULT 1,
  `Eten` varchar(200) NOT NULL DEFAULT 'Hamburger',
  `drinken` varchar(200) NOT NULL DEFAULT 'Cola',
  `prijs_eten` varchar(50) NOT NULL DEFAULT '05.00',
  `prijs_drinken` varchar(50) NOT NULL DEFAULT '02.00',
  `bestel_tijd` time NOT NULL,
  `totaal_prijs` int(50) NOT NULL DEFAULT 7
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `bestelling`
--

INSERT INTO `bestelling` (`bestelling_id`, `tafel_nr`, `Eten`, `drinken`, `prijs_eten`, `prijs_drinken`, `bestel_tijd`, `totaal_prijs`) VALUES
(8, 1, 'biefstuk', 'Water', '05.00', '02.00', '00:10:00', 7),
(9, 2, 'kip', 'Fanta', '05.00', '02.00', '00:10:00', 7),
(10, 1, 'Geen', 'Cola', 'Geen', '02.00', '00:10:00', 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `medewerkers`
--

CREATE TABLE `medewerkers` (
  `medewerker_id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `user_type` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `medewerkers`
--

INSERT INTO `medewerkers` (`medewerker_id`, `user`, `email`, `pwd`, `user_type`) VALUES
(1, 'admin', 'admin@hotmail.com', '$2y$10$CfLmXzd2oOimcuG1Uq2Qm.QRznnQsuCl1igwxyn9sssQc48hdpQk6', 'user'),
(2, 'user', 'user@hotmail.com', '$2y$10$S9M04F7.Nih6S21cpTsqKuZqT1t84op1X031ILnH3PvfZWKqo8lSy', 'user');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(50) NOT NULL,
  `eten` varchar(200) NOT NULL,
  `drinken` varchar(200) NOT NULL,
  `prijs` int(200) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `menu`
--

INSERT INTO `menu` (`menu_id`, `eten`, `drinken`, `prijs`) VALUES
(2, 'Biefstuk', '', 5),
(3, 'Kip', '', 5),
(7, 'Hamburger', '', 5),
(8, '', 'Cola', 2),
(9, '', 'fanta', 2),
(10, '', 'water', 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reserveren`
--

CREATE TABLE `reserveren` (
  `reserver_id` int(50) NOT NULL,
  `dag` date NOT NULL,
  `klantnaam` varchar(200) NOT NULL,
  `klantemail` varchar(200) NOT NULL,
  `telefoon` varchar(255) NOT NULL,
  `aantal_personen` int(50) NOT NULL,
  `reserver_tijd` time NOT NULL,
  `jarige` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `reserveren`
--

INSERT INTO `reserveren` (`reserver_id`, `dag`, `klantnaam`, `klantemail`, `telefoon`, `aantal_personen`, `reserver_tijd`, `jarige`) VALUES
(3, '2022-05-30', 'Moreno', 'morenomartins70@gmail.com', '0612345678', 40, '22:00:00', 'Nee');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `voorraad`
--

CREATE TABLE `voorraad` (
  `voorraad_id` int(50) NOT NULL,
  `aantal` int(50) NOT NULL,
  `product` varchar(200) NOT NULL,
  `type_product` varchar(200) NOT NULL DEFAULT 'voedsel'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `voorraad`
--

INSERT INTO `voorraad` (`voorraad_id`, `aantal`, `product`, `type_product`) VALUES
(1, 150, 'Hamburgers', 'voedsel'),
(2, 150, 'kip', 'voedsel'),
(3, 150, 'biefstuk', 'voedsel'),
(4, 60, 'cola', 'dranken'),
(5, 150, 'fanta', 'dranken'),
(6, 60, 'water', 'dranken');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `bestelling`
--
ALTER TABLE `bestelling`
  ADD PRIMARY KEY (`bestelling_id`);

--
-- Indexen voor tabel `medewerkers`
--
ALTER TABLE `medewerkers`
  ADD PRIMARY KEY (`medewerker_id`);

--
-- Indexen voor tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexen voor tabel `reserveren`
--
ALTER TABLE `reserveren`
  ADD PRIMARY KEY (`reserver_id`);

--
-- Indexen voor tabel `voorraad`
--
ALTER TABLE `voorraad`
  ADD PRIMARY KEY (`voorraad_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `bestelling`
--
ALTER TABLE `bestelling`
  MODIFY `bestelling_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `medewerkers`
--
ALTER TABLE `medewerkers`
  MODIFY `medewerker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT voor een tabel `reserveren`
--
ALTER TABLE `reserveren`
  MODIFY `reserver_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `voorraad`
--
ALTER TABLE `voorraad`
  MODIFY `voorraad_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;