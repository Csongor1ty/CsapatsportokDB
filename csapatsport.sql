-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2021. Dec 09. 20:03
-- Kiszolgáló verziója: 10.4.18-MariaDB
-- PHP verzió: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `csapatsport`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `csapat`
--

CREATE TABLE `csapat` (
  `csapatID` int(5) NOT NULL,
  `csapatnév` varchar(60) COLLATE utf8_hungarian_ci NOT NULL,
  `csoportID` int(5) NOT NULL,
  `csarnoknév` varchar(60) COLLATE utf8_hungarian_ci NOT NULL,
  `csarnokcím` varchar(60) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `csapat`
--

INSERT INTO `csapat` (`csapatID`, `csapatnév`, `csoportID`, `csarnoknév`, `csarnokcím`) VALUES
(13, 'DEAC KA U16/A', 1, 'Nyíregyházi Sportcentrum', 'Nyíregyháza, Géza u. 8-16, 4400'),
(14, 'Vasas Akadémia/B', 1, 'Vasas Kubala Akadémia', 'Budapest, Hajdú u. 42, 1139'),
(15, 'Szegedi KE/A', 2, 'Szegedi Kosárlabda Egylet', 'Szeged, Széchenyi tér, 6720'),
(16, 'Bajai NKK/A', 2, 'Bajai Női Kosárlabda Klub', 'Baja Szent Antal utca 85. 6500'),
(17, 'NKA Pécs/B', 3, 'Nemzeti Kosárlabda Akadémia', 'Pécs, Megyeri út, 7631'),
(18, 'Egri VSI KOK/A', 3, 'Egri Kék Oroszlánok Kosársuli', 'Eger, Mária u., 3300'),
(19, 'Kanizsai Vadmacskák SE', 4, 'Kanizsa Diákkosárlabda Klub', 'Platán sor 12 Nagykanizsa, 8800'),
(20, 'Török Flóris - Törekvés SE/A', 4, 'Törekvés Sport Egyesület', 'Budapest Bihari utca 23 1107'),
(21, 'Atomerőmű SE U20', 6, 'Atomerőmű Sportegyesület', 'Paks, Gesztenyés utca 2 7030'),
(22, 'Nyíregyháza Blue Sharks U20', 6, 'Continental Arena', 'Nyíregyháza, Géza u. 8-16. 4400'),
(23, 'Csata Diáksport Egyesület', 5, 'Csata Csarnok', 'Budapest Csata utca 20. 1135'),
(24, 'DEAC KA NB I.', 5, 'DEAC Sportcsarnok', 'Debrecen, Dóczy József u. 9, 4032'),
(252, 'Kaposvári KK U20', 6, 'Kaposvári Kosárlabda Klub', 'Kaposvár Arany J. utca 97. 7400'),
(278, 'Békéscsabai KK', 7, 'Békéscsabai Kosárlabda Klub', 'Békéscsaba, Lajta u. 49, 5600'),
(279, 'Nagykőrösi Sólymok KE', 7, 'Nagykőrösi Sólymok Kosárlabda Egyesület', 'Nagykőrös, Hunyadi u. 5. 2750'),
(280, 'Sunshine-NYIKSE', 7, 'Nyíregyházi Kosárlabdát Szeretõk Közhasznú Sportegyesülete', 'Nyíregyháza Muskotály utca 25/b 4481'),
(281, 'MEAFC-Miskolc', 7, 'Miskolci Egyetemi Atlétikai és Futball Club', 'Miskolc-Egyetemváros 1., Körcsarnok 3515'),
(282, 'Honvéd Ludovika', 7, 'Magyar Királyi Honvéd Ludovika Akadémia', 'Budapest, Ludovika tér 2. 1083'),
(283, 'ELTE Fortis', 8, 'ELTE BEAC Csarnok', 'Budapest, Bogdánfy utca 10 1117'),
(284, 'Sportdarázs-SMAFC', 8, 'Darazsak Sportakadémia', 'Sopron, Lackner Kristóf utca 48. 9400'),
(285, 'Kecskeméti KC', 8, 'Mercedes-Benz Sport Akadémia', 'Kecskemét, Olimpia u. 1, 6000'),
(286, 'SZPA-HSE', 8, 'SZPA HSE Kosárlabda Szakosztály', 'Budapest, Gergely u. 81, 1103'),
(287, 'RADOBASKET', 8, 'Komló Városi Sportcsarnok', 'Komló, Eszperantó tér 1, 7300'),
(288, 'BME-MAFC-NK', 9, 'Műegyetemi Atlétikai és Football Club', 'Budapest Műegyetem rakpart 3. 1111'),
(289, 'Közgáz SC és DSK', 9, 'Közgáz SC és DSK/A', 'Budapest Fővám tér 8. 1093'),
(290, 'Szegedi RSC-NK', 9, 'Szegedi Rekreációs Sport Club', 'Szeged Topolya sor 2. 6725'),
(291, 'Nyíregyházi Egyetemi SE', 9, 'Nyíregyházi Egyetemi Sportegyesület', 'Nyíregyháza Sóstói út 31/b 4400'),
(292, 'Ludovika Csata', 9, 'Nemzeti Közszolgálati Egyetem Sportegyesület', 'Budapest Orczy út 1. 1089'),
(293, 'Eszterházy SC', 10, 'Eszterházy Károly Egyetem Diák - és Szabadidősport Club', 'Eger Leányka út 6 3300'),
(294, 'DEAC', 10, 'Debreceni Egyetemi Atlétikai Club', 'Debrecen Dóczy József utca 9 4032'),
(295, 'DMSE', 10, 'DE Klinika Campus Tornaterem', 'Debrecen, Móricz Zsigmond körút 22. 4032'),
(296, 'Szegedi RSC-FK', 10, 'Szegedi Rekreációs Sport Club', 'Szeged, Topolya sor 2. 6725'),
(297, 'BME-MAFC-FK', 10, 'Tüskecsarnok \"A\" Terem', 'Budapest, Magyar tudósok körút 7. 1117'),
(298, 'Semmelweis Egyetem', 11, 'Semmelweis Egyetem Sporttelepe', 'Budapest, Zágrábi utca 14. 1107'),
(299, 'TFSE', 11, 'Testnevelési Egyetem SE E-terem', 'Budapest, Alkotás utca 44. 1123'),
(300, 'SMAFC', 11, 'Krasznai Ferenc Sportcsarnok', 'Sopron, Ady Endre út 5. 9400'),
(301, 'PTE-PEAC-NN', 11, 'PTE TTK Sportcsarnok', 'Pécs, Ifjúság út 6. 7624'),
(302, 'UNI GYŐR SZESE', 11, 'Győr Városi Egyetemi Edző Csarnok', 'Győr, Vásárhelyi Pál utca 58. 9026'),
(303, 'VESC', 12, 'Egyetemi Tornacsarnok', 'Veszprém, Egyetem utca 10. 8200'),
(304, 'MOGAAC', 12, 'Bauer Rudolf Egyetemi Sportcsarnok', 'Mosonmagyaróvár, Gazdász utca 12. 9200'),
(305, 'Szombathelyi Egyetemi Sportegyesület', 12, 'ELTE Savaria Egyetemi Központ Egyetemi Csarnok', 'Szombathely, Károlyi Gáspár tér 4. 9700'),
(306, 'ELTE BEAC', 12, 'Tüskecsarnok \"A\" Terem', 'Budapest, Magyar tudósok körút 7. 1117'),
(307, 'PTE-PEAC-FN', 12, 'PTE TTK Sportcsarnok', 'Pécs, Ifjúság út 6. 7624');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `csoport`
--

CREATE TABLE `csoport` (
  `csoportID` int(5) NOT NULL,
  `csoportnév` varchar(60) COLLATE utf8_hungarian_ci NOT NULL,
  `korosztály` varchar(60) COLLATE utf8_hungarian_ci NOT NULL,
  `nem` varchar(1) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `csoport`
--

INSERT INTO `csoport` (`csoportID`, `csoportnév`, `korosztály`, `nem`) VALUES
(1, 'Fiú Kadett / U15-U16', '14-15', 'F'),
(2, 'Lány Kadett / U15-16', '14-15', 'N'),
(3, 'Fiú Junior / U18', '17 éves', 'F'),
(4, 'Lány Junior / U18', '17 éves', 'N'),
(5, 'Női amatőr NB I.', '23+', 'N'),
(6, 'Férfi U20', '18-19', 'F'),
(7, 'HEPP Férfi', '18+', 'F'),
(8, 'HEPP Női', '18+', 'N'),
(9, 'Lány Egyetemi, Kelet', '18+', 'N'),
(10, 'Fiú Egyetemi, Kelet', '18+', 'F'),
(11, 'Lány Egyetemi, Nyugat', '18+', 'N'),
(12, 'Fiú Egyetemi, Nyugat', '18+', 'F');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `edző`
--

CREATE TABLE `edző` (
  `sportoloID` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `edző`
--

INSERT INTO `edző` (`sportoloID`) VALUES
(12133),
(23321),
(24234),
(36513),
(47773),
(53232),
(67774),
(74228);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `játszik`
--

CREATE TABLE `játszik` (
  `ID` int(3) NOT NULL,
  `csapatID` int(5) DEFAULT NULL,
  `meccsID` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `játszik`
--

INSERT INTO `játszik` (`ID`, `csapatID`, `meccsID`) VALUES
(1, 13, 1),
(2, 14, 3),
(3, 14, 4),
(4, 16, 6),
(5, 19, 8),
(6, 20, 9),
(7, 23, 10),
(8, 21, 11),
(9, 24, 5),
(10, 24, 2),
(11, 18, 7),
(13, 15, 12),
(14, 15, 13),
(15, 15, 14),
(17, 15, 15),
(18, 15, 16);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `játékos`
--

CREATE TABLE `játékos` (
  `sportoloID` int(5) DEFAULT NULL,
  `poszt` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `magasság` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `játékos`
--

INSERT INTO `játékos` (`sportoloID`, `poszt`, `magasság`) VALUES
(12132, 'Dobóhátvéd', 185),
(22322, 'Alacsonybedobó', 183),
(22323, 'Erőcsatár', 192),
(32133, 'Center', 198),
(33233, 'Irányító', 188),
(42421, 'Dobóhátvéd', 179),
(42466, 'Alacsonybedobó', 187),
(51111, 'Erőcsatár', 190),
(51212, 'Center', 201),
(61616, 'Irányító', 187),
(62222, 'Dobóhátvéd', 182),
(80177, 'Alacsonybedobó', 188),
(42851, 'Irányító', 186),
(91509, 'Center', 198),
(75731, 'Erőcsatár', 180),
(79050, 'Erőcsatár', 179);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `mérkőzés`
--

CREATE TABLE `mérkőzés` (
  `meccsID` int(8) NOT NULL,
  `dobott_pontok` int(3) NOT NULL,
  `kapott_pontok` int(3) NOT NULL,
  `mikor` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `mérkőzés`
--

INSERT INTO `mérkőzés` (`meccsID`, `dobott_pontok`, `kapott_pontok`, `mikor`) VALUES
(1, 98, 83, '2021-12-01'),
(2, 77, 77, '2021-12-03'),
(3, 52, 82, '2021-12-04'),
(4, 88, 98, '2021-12-02'),
(5, 112, 91, '2021-12-01'),
(6, 98, 85, '2021-12-06'),
(7, 77, 88, '2021-11-19'),
(8, 88, 87, '2021-11-20'),
(9, 100, 98, '2021-11-20'),
(10, 80, 84, '2021-11-22'),
(11, 56, 77, '2021-11-27'),
(12, 100, 91, '2021-12-09'),
(13, 89, 78, '2020-10-23'),
(14, 97, 98, '2021-12-04'),
(15, 88, 78, '2020-12-30'),
(16, 92, 88, '2021-11-21');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `sportember`
--

CREATE TABLE `sportember` (
  `sportoloID` int(5) NOT NULL,
  `név` varchar(60) COLLATE utf8_hungarian_ci NOT NULL,
  `születési év` int(60) NOT NULL,
  `csapatID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `sportember`
--

INSERT INTO `sportember` (`sportoloID`, `név`, `születési év`, `csapatID`) VALUES
(12132, 'BALOGH Ádám', 2007, 13),
(12133, 'GIPSZ Jakab', 1995, 13),
(22322, 'TATAI Gréta', 2008, 15),
(22323, 'TATAI Fanni', 2008, 15),
(23321, 'KÁROLYI Gróf', 1977, 15),
(24234, 'DRÁGA Irén', 1965, 19),
(32133, 'DRÁVAI Szabolcs', 1974, 17),
(33233, 'FÜZESI András', 2005, 17),
(36513, 'JUHÁSZ Dániel', 2005, 17),
(42421, 'DARÁZSI Dóra', 2006, 20),
(42466, 'BAGDI Hajnalka', 2004, 20),
(42851, 'TAMÁS Márió', 1996, 299),
(47773, 'FORGÁCS Laura', 1995, 21),
(51111, 'BÁTOR Előd', 1990, 21),
(51212, 'NAGY Roland', 2005, 21),
(52729, 'TARJÁNYI Csongor', 1995, 21),
(53232, 'FARKAS János', 2003, 21),
(61616, 'BALOGH Liza', 2005, 23),
(62222, 'KAS Dóra', 2003, 23),
(67774, 'HARCOS Lídia', 1985, 23),
(74228, 'Balázs Dominik', 1976, 304),
(75731, 'Hegedüs Blanka', 1999, 284),
(79050, 'Dudás Lilla', 2000, 301),
(80177, 'LAKATOS Barnabás', 1998, 283),
(91509, 'NÉMETH Gyula', 1997, 304);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `csapat`
--
ALTER TABLE `csapat`
  ADD PRIMARY KEY (`csapatID`),
  ADD KEY `csoportID` (`csoportID`);

--
-- A tábla indexei `csoport`
--
ALTER TABLE `csoport`
  ADD PRIMARY KEY (`csoportID`);

--
-- A tábla indexei `edző`
--
ALTER TABLE `edző`
  ADD KEY `sportoloID` (`sportoloID`);

--
-- A tábla indexei `játszik`
--
ALTER TABLE `játszik`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `csapatID` (`csapatID`),
  ADD KEY `meccsID` (`meccsID`);

--
-- A tábla indexei `játékos`
--
ALTER TABLE `játékos`
  ADD KEY `sportoloID` (`sportoloID`);

--
-- A tábla indexei `mérkőzés`
--
ALTER TABLE `mérkőzés`
  ADD PRIMARY KEY (`meccsID`);

--
-- A tábla indexei `sportember`
--
ALTER TABLE `sportember`
  ADD PRIMARY KEY (`sportoloID`),
  ADD KEY `csapatID` (`csapatID`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `csapat`
--
ALTER TABLE `csapat`
  MODIFY `csapatID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=308;

--
-- AUTO_INCREMENT a táblához `csoport`
--
ALTER TABLE `csoport`
  MODIFY `csoportID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT a táblához `játszik`
--
ALTER TABLE `játszik`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT a táblához `mérkőzés`
--
ALTER TABLE `mérkőzés`
  MODIFY `meccsID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `csapat`
--
ALTER TABLE `csapat`
  ADD CONSTRAINT `csapat_ibfk_1` FOREIGN KEY (`csoportID`) REFERENCES `csoport` (`csoportID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Megkötések a táblához `edző`
--
ALTER TABLE `edző`
  ADD CONSTRAINT `edző_ibfk_1` FOREIGN KEY (`sportoloID`) REFERENCES `sportember` (`sportoloID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Megkötések a táblához `játszik`
--
ALTER TABLE `játszik`
  ADD CONSTRAINT `játszik_ibfk_1` FOREIGN KEY (`meccsID`) REFERENCES `mérkőzés` (`meccsID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `játszik_ibfk_2` FOREIGN KEY (`csapatID`) REFERENCES `csapat` (`csapatID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Megkötések a táblához `játékos`
--
ALTER TABLE `játékos`
  ADD CONSTRAINT `játékos_ibfk_1` FOREIGN KEY (`sportoloID`) REFERENCES `sportember` (`sportoloID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Megkötések a táblához `sportember`
--
ALTER TABLE `sportember`
  ADD CONSTRAINT `sportember_ibfk_1` FOREIGN KEY (`csapatID`) REFERENCES `csapat` (`csapatID`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
