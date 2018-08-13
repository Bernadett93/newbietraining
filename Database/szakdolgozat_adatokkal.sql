-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2018. Jún 05. 10:36
-- Kiszolgáló verziója: 10.1.28-MariaDB
-- PHP verzió: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `szakdolgozat`
--
CREATE DATABASE IF NOT EXISTS `szakdolgozat` DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
USE `szakdolgozat`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `dolgozo`
--

CREATE TABLE `dolgozo` (
  `id` int(11) NOT NULL,
  `nev` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `szuletesi_ido` date NOT NULL,
  `szuletesi_hely` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `mobilszam` varchar(15) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `belepes_kezdete` date NOT NULL,
  `terulet_id` int(11) NOT NULL,
  `pozicio` varchar(100) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `dolgozo`
--

INSERT INTO `dolgozo` (`id`, `nev`, `szuletesi_ido`, `szuletesi_hely`, `mobilszam`, `email`, `belepes_kezdete`, `terulet_id`, `pozicio`) VALUES
(1, 'Szenti Bernadett', '1993-02-01', 'Szeged', '+36301234567', 'szenti.bernadett@email.cim', '2012-12-05', 1, 'Mentor'),
(2, 'Sample Gizi', '1982-11-04', 'Budapest', '+36701234567', 'sample.gizi@email.cim', '2017-12-05', 1, 'Operátor'),
(3, 'Teszt Elek', '1996-05-01', 'Kecskemét', '+36201234567', 'teszt.elek@email.cim', '2017-07-04', 2, 'Operátor'),
(4, 'Nagy József', '1988-06-20', 'Cegléd', '+36201663467', 'nagy.jozsef@email.cim', '2016-04-15', 2, 'Mentor'),
(5, 'Kis Ilona', '1990-04-30', 'Szeged', '+36704569231', 'kis.ilona@email.cim', '2016-03-28', 3, 'Mentor'),
(6, 'Kovács Géza', '1992-08-12', 'Szeged', '+36308521346', 'kovacs.geza@email.cim', '2018-01-05', 3, 'Operátor'),
(7, 'Tóth Zoltán', '1995-10-28', 'Szeged', '+36207091597', 'toth.zoltan@email.cim', '2014-02-26', 1, 'Mentor'),
(8, 'Szabó Erika', '1995-07-17', 'Hódmezővásárhely', '+36304638075', 'szabo.erika@email.cim', '2015-11-20', 2, 'Mentor'),
(9, 'Fazekas Gergő', '1995-03-22', 'Makó', '+36305314423', 'fazekas.gergo@email.cim', '2016-05-24', 3, 'Mentor'),
(10, 'Horváth Péter', '1994-12-29', 'Szeged', '+36306156517', 'horvath.peter@email.cim', '2017-12-05', 1, 'Operátor'),
(11, 'Kis Elemér', '1992-04-06', 'Ásotthalom', '+36704106406', 'kis.elemer@email.cim', '2017-12-05', 1, 'Operátor'),
(12, 'Nagy Béla', '1991-07-24', 'Szeged', '+36209953375', 'nagy.bela@email.cim', '2017-12-05', 1, 'Operátor'),
(13, 'Szabó Dóra', '1994-02-22', 'Gödöllo', '+36201076469', 'szabo.dora@email.cim', '2017-12-05', 1, 'Operátor'),
(14, 'Kovács Adrienn', '1992-12-30', 'Budapest', '+36708285484', 'kovacs.adrienn@email.cim', '2017-12-05', 1, 'Operátor'),
(15, 'Kerekes Veronika', '1997-05-28', 'Pécs', '+36303880064', 'kerekes.veronika@email.cim', '2018-01-10', 1, 'Operátor'),
(16, 'Barna Abigél', '1995-04-10', 'Szentes', '+36308014673', 'barna.abigel@email.cim', '2018-01-10', 1, 'Operátor'),
(17, 'Nagy István', '1995-02-04', 'Gyula', '+36307860571', 'nagy.istvan@email.cim', '2018-01-10', 1, 'Operátor'),
(18, 'Tóth Emőke', '1989-01-11', 'Orosháza', '+36207888350', 'toth.emoke@email.cim', '2018-01-10', 1, 'Operátor'),
(19, 'Rácz Ádám', '1992-02-23', 'Szeged', '+36301368802', 'racz.adam@email.cim', '2018-01-10', 1, 'Operátor'),
(20, 'László Dávid', '1994-04-15', 'Szentes', '+36702782419', 'laszlo.david@email.cim', '2018-01-10', 1, 'Operátor'),
(21, 'Molnár Nóra', '1991-05-05', 'Hódmezővásárhely', '+36206461111', 'molnar.nora@email.cim', '2017-07-04', 2, 'Operátor'),
(22, 'Takács Réka', '1997-12-13', 'Békéscsaba', '+36206610820', 'takacs.reka@email.cim', '2017-07-04', 2, 'Operátor'),
(23, 'Rácz József', '1996-01-11', 'Gyula', '+36304834249', 'racz.joszef@email.cim', '2017-07-04', 2, 'Operátor'),
(24, 'Fekete István', '1988-09-06', 'Baja', '+36204601814', 'fekete.istvan@email.cim', '2017-07-04', 2, 'Operátor'),
(25, 'Kocsis Gertrúd', '1988-04-29', 'Kecskemét', '+36707784240', 'kocsis.gertrud@email.cim', '2017-07-04', 2, 'Operátor'),
(26, 'Mezei Alexandra', '1991-07-03', 'Budapest', '+36305160587', 'mezei.alexandra@email.cim', '2017-10-28', 2, 'Operátor'),
(27, 'Márton Renátó', '1990-01-03', 'Szentes', '+36301485810', 'marton.renato@email.cim', '2017-10-28', 2, 'Operátor'),
(28, 'Csonka Zita', '1990-11-29', 'Szeged', '+36205022562', 'csonka.zita@email.cim', '2017-10-28', 2, 'Operátor'),
(29, 'Lengyel Enikő', '1991-06-22', 'Orosháza', '+36705084899', 'lengyel.eniko@email.cim', '2017-10-28', 2, 'Operátor'),
(30, 'Németh Bence', '1989-07-07', 'Cegléd', '+36704463233', 'nemeth.bence@email.cim', '2017-10-28', 2, 'Operátor'),
(31, 'Mészáros Máté', '1990-03-30', 'Cegléd', '+36205834714', 'meszaros.mate@email.cim', '2017-10-28', 2, 'Operátor'),
(32, 'Nagy Dávid', '1995-08-08', 'Hódmezővásárhely', '+36201437654', 'nagy.david@email.cim', '2018-01-05', 3, 'Operátor'),
(33, 'Horváth Bernadett', '1990-09-30', 'Cserkeszőlő', '+36708983257', 'horvath.bernadett@email.cim', '2018-01-05', 3, 'Operátor'),
(34, 'Török Vivien', '1995-09-28', 'Szentes', '+36208242851', 'torok.vivien@email.cim', '2018-01-05', 3, 'Operátor'),
(35, 'Szűcs Sándor', '1993-12-29', 'Budapest', '+36302463217', 'szucs.sandor@email.cim', '2018-01-05', 3, 'Operátor'),
(36, 'Hegedűs Ferenc', '1996-01-06', 'Baja', '+36708796714', 'hegedus.ferenc@email.cim', '2018-01-05', 3, 'Operátor'),
(37, 'Sipos Valéria', '1992-11-25', 'Békéscsaba', '+36204361341', 'sipos.valeria@email.cim', '2018-02-05', 3, 'Operátor'),
(38, 'Szalai Attila', '1989-11-18', 'Baja', '+36705653688', 'szalai.attila@email.cim', '2018-02-05', 3, 'Operátor'),
(39, 'Takács Zsófia', '1991-07-23', 'Kecskemét', '+36305941144', 'takacs.zsofia@email.cim', '2018-02-05', 3, 'Operátor'),
(40, 'Kocsis Ottó', '1996-12-08', 'Szentes', '+36702467018', 'kocsis.otto@email.cim', '2018-02-05', 3, 'Operátor'),
(41, 'Balla Viktória', '1988-11-27', 'Baja', '+36205825016', 'balla.viktoria@email.cim', '2018-02-05', 3, 'Operátor'),
(42, 'Deák Éva', '1996-04-16', 'Budapest', '+36204521823', 'deak.eva@email.cim', '2018-02-05', 3, 'Operátor');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kompetenciak_teljesitese`
--

CREATE TABLE `kompetenciak_teljesitese` (
  `dolgozo_id` int(11) NOT NULL,
  `kompetencia_id` int(11) NOT NULL,
  `teljesitve` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `kompetenciak_teljesitese`
--

INSERT INTO `kompetenciak_teljesitese` (`dolgozo_id`, `kompetencia_id`, `teljesitve`) VALUES
(2, 1, 1),
(2, 2, 1),
(2, 3, 1),
(2, 4, 1),
(10, 1, 1),
(10, 2, 1),
(10, 3, 1),
(10, 4, 1),
(11, 1, 1),
(11, 2, 1),
(11, 3, 1),
(11, 4, 1),
(12, 1, 1),
(12, 2, 1),
(12, 3, 1),
(12, 4, 1),
(13, 1, 1),
(13, 2, 1),
(13, 3, 1),
(13, 4, 1),
(14, 1, 1),
(14, 2, 1),
(14, 3, 1),
(14, 4, 1),
(15, 1, 1),
(15, 2, 1),
(15, 3, 1),
(15, 4, 1),
(16, 1, 1),
(16, 2, 1),
(16, 3, 1),
(16, 4, 1),
(17, 1, 1),
(17, 2, 1),
(17, 3, 1),
(17, 4, 1),
(18, 1, 1),
(18, 2, 1),
(18, 3, 1),
(18, 4, 1),
(19, 1, 1),
(19, 2, 1),
(19, 3, 1),
(19, 4, 1),
(20, 1, 1),
(20, 2, 1),
(20, 3, 1),
(20, 4, 1),
(3, 5, 1),
(3, 6, 1),
(3, 7, 1),
(3, 8, 1),
(21, 5, 1),
(21, 6, 1),
(21, 7, 1),
(21, 8, 1),
(22, 5, 1),
(22, 6, 1),
(22, 7, 1),
(22, 8, 1),
(23, 5, 1),
(23, 6, 1),
(23, 7, 1),
(23, 8, 1),
(24, 5, 1),
(24, 6, 1),
(24, 7, 1),
(24, 8, 1),
(25, 5, 1),
(25, 6, 1),
(25, 7, 1),
(25, 8, 1),
(26, 5, 1),
(26, 6, 1),
(26, 7, 1),
(26, 8, 1),
(27, 5, 1),
(27, 6, 1),
(27, 7, 1),
(27, 8, 1),
(28, 5, 1),
(28, 6, 1),
(28, 7, 1),
(28, 8, 1),
(29, 5, 1),
(29, 6, 1),
(29, 7, 1),
(29, 8, 1),
(30, 5, 1),
(30, 6, 1),
(30, 7, 1),
(30, 8, 1),
(31, 5, 1),
(31, 6, 1),
(31, 7, 1),
(31, 8, 1),
(6, 9, 1),
(6, 10, 1),
(6, 11, 1),
(6, 12, 1),
(32, 9, 1),
(32, 10, 1),
(32, 11, 1),
(32, 12, 1),
(33, 9, 1),
(33, 10, 1),
(33, 11, 1),
(33, 12, 1),
(34, 9, 1),
(34, 10, 1),
(34, 11, 1),
(34, 12, 1),
(35, 9, 1),
(35, 10, 1),
(35, 11, 1),
(35, 12, 1),
(36, 9, 1),
(36, 10, 1),
(36, 11, 1),
(36, 12, 1),
(37, 9, 1),
(37, 10, 1),
(37, 11, 1),
(37, 12, 0),
(38, 9, 1),
(38, 10, 1),
(38, 11, 1),
(38, 12, 0),
(39, 9, 1),
(39, 10, 1),
(39, 11, 1),
(39, 12, 0),
(40, 9, 1),
(40, 10, 1),
(40, 11, 1),
(40, 12, 0),
(41, 9, 1),
(41, 10, 1),
(41, 11, 1),
(41, 12, 0),
(42, 9, 1),
(42, 10, 1),
(42, 11, 1),
(42, 12, 0);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `ment_oper_kapcs`
--

CREATE TABLE `ment_oper_kapcs` (
  `mentor_id` int(11) NOT NULL,
  `oper_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `ment_oper_kapcs`
--

INSERT INTO `ment_oper_kapcs` (`mentor_id`, `oper_id`) VALUES
(1, 2),
(1, 10),
(1, 11),
(7, 12),
(7, 13),
(7, 14),
(1, 15),
(1, 16),
(1, 17),
(7, 18),
(7, 19),
(7, 20),
(4, 3),
(4, 21),
(4, 22),
(8, 23),
(8, 24),
(8, 25),
(4, 26),
(4, 27),
(4, 28),
(8, 29),
(8, 30),
(8, 31),
(5, 6),
(5, 32),
(5, 33),
(9, 34),
(9, 35),
(9, 36),
(5, 37),
(5, 38),
(5, 39),
(9, 40),
(9, 41),
(9, 42);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `oktatasianyagok`
--

CREATE TABLE `oktatasianyagok` (
  `id` int(11) NOT NULL,
  `filename` varchar(500) COLLATE utf8_hungarian_ci NOT NULL,
  `name` varchar(500) COLLATE utf8_hungarian_ci NOT NULL,
  `path` varchar(500) COLLATE utf8_hungarian_ci NOT NULL,
  `title` varchar(200) COLLATE utf8_hungarian_ci NOT NULL,
  `terulet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `oktatasianyagok`
--

INSERT INTO `oktatasianyagok` (`id`, `filename`, `name`, `path`, `title`, `terulet_id`) VALUES
(1, 'Internet.pdf', 'Internet', './segedanyagok/Internet.pdf', 'Internet hibakezelés', 1),
(2, 'Tv.pdf', 'Tv', './segedanyagok/Tv.pdf', 'TV hibakezelés', 1),
(3, 'Telefonos.pdf', 'Telefonos', './segedanyagok/Telefonos.pdf', 'Telefonos hibakezelés', 1),
(4, 'Mobilos.pdf', 'Mobilos', './segedanyagok/Mobilos.pdf', 'Mobilos hibakezelés', 1),
(5, 'Megrendelés_otthoni.pdf', 'Megrendelés_otthoni', './segedanyagok/Megrendelés_otthoni.pdf', 'Megrendelések otthoni', 2),
(6, 'számlák_otthoni.pdf', 'számlák_otthoni', './segedanyagok/számlák_otthoni.pdf', 'Számlák otthoni', 2),
(7, 'értékesítés_otthoni.pdf', 'értékesítés_otthoni', './segedanyagok/értékesítés_otthoni.pdf', 'Értékesítés otthoni', 2),
(8, 'kommunikáció_otthoni.pdf', 'kommunikáció_otthoni', './segedanyagok/kommunikáció_otthoni.pdf', 'Kommunikációs tréning otthoni', 2),
(9, 'megrendelések_mobil.pdf', 'megrendelések_mobil', './segedanyagok/megrendelések_mobil.pdf', 'Megrendelések mobil', 3),
(10, 'számlák_mobil.pdf', 'számlák_mobil', './segedanyagok/számlák_mobil.pdf', 'Számlák mobil', 3),
(11, 'értékesítés_mobil.pdf', 'értékesítés_mobil', './segedanyagok/értékesítés_mobil.pdf', 'Értékesítés mobil', 3),
(12, 'kommunikáció_mobil.pdf', 'kommunikáció_mobil', './segedanyagok/kommunikáció_mobil.pdf', 'Kommunikációs tréning mobil', 3);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `oktatasok`
--

CREATE TABLE `oktatasok` (
  `id` int(11) NOT NULL,
  `mentor_id` int(11) NOT NULL,
  `oper_id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `komp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `oktatasok`
--

INSERT INTO `oktatasok` (`id`, `mentor_id`, `oper_id`, `datum`, `komp_id`) VALUES
(1, 1, 2, '2017-12-12', 1),
(2, 1, 10, '2017-12-12', 1),
(3, 1, 11, '2017-12-12', 1),
(4, 1, 2, '2018-01-04', 2),
(5, 1, 10, '2018-01-04', 2),
(6, 1, 11, '2018-01-04', 2),
(7, 1, 2, '2018-02-01', 3),
(8, 1, 10, '2018-02-01', 3),
(9, 1, 11, '2018-02-01', 3),
(10, 1, 2, '2018-03-02', 4),
(11, 1, 10, '2018-03-02', 4),
(12, 1, 11, '2018-03-02', 4),
(13, 7, 12, '2017-12-20', 1),
(14, 7, 13, '2017-12-20', 1),
(15, 7, 14, '2017-12-20', 1),
(16, 7, 12, '2018-01-22', 2),
(17, 7, 13, '2018-01-22', 2),
(18, 7, 14, '2018-01-22', 2),
(19, 7, 12, '2018-02-19', 3),
(20, 7, 13, '2018-02-19', 3),
(21, 7, 14, '2018-02-19', 3),
(22, 7, 12, '2018-03-13', 4),
(23, 7, 13, '2018-03-13', 4),
(24, 7, 14, '2018-03-13', 4),
(25, 1, 15, '2018-02-07', 1),
(26, 1, 16, '2018-02-07', 1),
(27, 1, 17, '2018-02-07', 1),
(28, 1, 15, '2018-03-08', 2),
(29, 1, 16, '2018-03-08', 2),
(30, 1, 17, '2018-03-08', 2),
(31, 1, 15, '2018-04-09', 3),
(32, 1, 16, '2018-04-09', 3),
(33, 1, 17, '2018-04-09', 3),
(34, 1, 15, '2018-05-10', 4),
(35, 1, 16, '2018-05-10', 4),
(36, 1, 17, '2018-05-10', 4),
(37, 7, 18, '2018-01-25', 1),
(38, 7, 19, '2018-01-25', 1),
(39, 7, 20, '2018-01-25', 1),
(40, 7, 18, '2018-02-21', 2),
(41, 7, 19, '2018-02-21', 2),
(42, 7, 20, '2018-02-21', 2),
(43, 7, 18, '2018-03-21', 3),
(44, 7, 19, '2018-03-21', 3),
(45, 7, 20, '2018-03-21', 3),
(46, 7, 18, '2018-04-18', 4),
(47, 7, 19, '2018-04-18', 4),
(48, 7, 20, '2018-04-18', 4),
(49, 4, 3, '2017-08-03', 5),
(50, 4, 21, '2017-08-03', 5),
(51, 4, 22, '2017-08-03', 5),
(52, 4, 3, '2017-09-05', 6),
(53, 4, 21, '2017-09-05', 6),
(54, 4, 22, '2017-09-05', 6),
(55, 4, 3, '2017-10-09', 7),
(56, 4, 21, '2017-10-09', 7),
(57, 4, 22, '2017-10-09', 7),
(58, 4, 3, '2017-11-08', 8),
(59, 4, 21, '2017-11-08', 8),
(60, 4, 22, '2017-11-08', 8),
(61, 8, 23, '2017-08-08', 5),
(62, 8, 24, '2017-08-08', 5),
(63, 8, 25, '2017-08-08', 5),
(64, 8, 23, '2017-09-11', 6),
(65, 8, 24, '2017-09-11', 6),
(66, 8, 25, '2017-09-11', 6),
(67, 8, 23, '2017-10-12', 7),
(68, 8, 24, '2017-10-12', 7),
(69, 8, 25, '2017-10-12', 7),
(70, 8, 23, '2017-11-16', 8),
(71, 8, 24, '2017-11-16', 8),
(72, 8, 25, '2017-11-16', 8),
(73, 4, 26, '2017-11-29', 5),
(74, 4, 27, '2017-11-29', 5),
(75, 4, 28, '2017-11-29', 5),
(76, 4, 26, '2018-01-03', 6),
(77, 4, 27, '2018-01-03', 6),
(78, 4, 28, '2018-01-03', 6),
(79, 4, 26, '2018-02-05', 7),
(80, 4, 27, '2018-02-05', 7),
(81, 4, 28, '2018-02-05', 7),
(82, 4, 26, '2018-03-07', 8),
(83, 4, 27, '2018-03-07', 8),
(84, 4, 28, '2018-03-07', 8),
(85, 8, 29, '2017-11-21', 5),
(86, 8, 30, '2017-11-21', 5),
(87, 8, 31, '2017-11-21', 5),
(88, 8, 29, '2017-12-18', 6),
(89, 8, 30, '2017-12-18', 6),
(90, 8, 31, '2017-12-18', 6),
(91, 8, 29, '2018-01-17', 7),
(92, 8, 30, '2018-01-17', 7),
(93, 8, 31, '2018-01-17', 7),
(94, 8, 29, '2018-02-15', 8),
(95, 8, 30, '2018-02-15', 8),
(96, 8, 31, '2018-02-15', 8),
(97, 5, 6, '2018-02-05', 9),
(98, 5, 32, '2018-02-05', 9),
(99, 5, 33, '2018-02-05', 9),
(100, 5, 6, '2018-03-05', 10),
(101, 5, 32, '2018-03-05', 10),
(102, 5, 33, '2018-03-05', 10),
(103, 5, 6, '2018-04-05', 11),
(104, 5, 32, '2018-04-05', 11),
(105, 5, 33, '2018-04-05', 11),
(106, 9, 34, '2018-02-07', 9),
(107, 9, 35, '2018-02-07', 9),
(108, 9, 36, '2018-02-07', 9),
(109, 9, 34, '2018-03-05', 10),
(110, 9, 35, '2018-03-05', 10),
(111, 9, 36, '2018-03-05', 10),
(112, 5, 37, '2018-03-07', 9),
(113, 5, 38, '2018-03-07', 9),
(114, 5, 39, '2018-03-07', 9),
(115, 9, 40, '2018-03-12', 9),
(116, 9, 41, '2018-03-12', 9),
(117, 9, 42, '2018-03-12', 9),
(118, 9, 34, '2018-04-09', 11),
(119, 9, 35, '2018-04-09', 11),
(120, 9, 36, '2018-04-09', 11),
(121, 9, 40, '2018-04-12', 10),
(122, 9, 41, '2018-04-12', 10),
(123, 9, 42, '2018-04-12', 10),
(124, 5, 37, '2018-04-10', 10),
(125, 5, 38, '2018-04-10', 10),
(126, 5, 39, '2018-04-10', 10),
(130, 5, 37, '2018-05-14', 11),
(131, 5, 38, '2018-05-14', 11),
(132, 5, 39, '2018-05-14', 11),
(133, 9, 40, '2018-05-10', 11),
(134, 9, 41, '2018-05-10', 11),
(135, 9, 42, '2018-05-10', 11),
(136, 5, 6, '2018-05-04', 12),
(137, 5, 32, '2018-05-04', 12),
(138, 5, 33, '2018-05-04', 12),
(139, 9, 34, '2018-05-09', 12),
(140, 9, 35, '2018-05-09', 12),
(141, 9, 36, '2018-05-09', 12);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `osszes_kompetencia`
--

CREATE TABLE `osszes_kompetencia` (
  `id` int(11) NOT NULL,
  `nev` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `terulet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `osszes_kompetencia`
--

INSERT INTO `osszes_kompetencia` (`id`, `nev`, `terulet_id`) VALUES
(1, 'Internet hibakezelés', 1),
(2, 'TV hibakezelés', 1),
(3, 'Telefon hibakezelés', 1),
(4, 'Mobil hibakezelés', 1),
(5, 'Megrendelés otthoni', 2),
(6, 'Számlák otthoni', 2),
(7, 'Értékesítés otthoni', 2),
(8, 'Kommunikációs tréning otthoni', 2),
(9, 'Megrendelés mobil', 3),
(10, 'Számlák mobil', 3),
(11, 'Értékesítés mobil', 3),
(12, 'Kommunikációs tréning mobil', 3);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `terulet`
--

CREATE TABLE `terulet` (
  `id` int(11) NOT NULL,
  `nev` varchar(100) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `terulet`
--

INSERT INTO `terulet` (`id`, `nev`) VALUES
(1, 'Helpdesk'),
(2, 'Otthoni'),
(3, 'Mobil');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `userek`
--

CREATE TABLE `userek` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `userek`
--

INSERT INTO `userek` (`id`, `username`, `password`) VALUES
(1, 'szentibernadett', '$2y$10$BUsDGPWDojV.5WyD8uVCc.HnsH507edxmS/UuN6fykXaaOYjeNMV2'),
(2, 'samplegizi', '$2a$06$APxn1geapTSTgD06KEtsOOmX.7O1rcG6lZlxmc4yGQfqnwwug.O4i'),
(3, 'tesztelek', '$2a$06$riHSIkGST9luCDaOQogv2O0QjwPGVQ//oswqIEuZv7NoJyZyw4bNu'),
(4, 'nagyjózsef', '$2a$06$1g7a7vMg3lAO8GLqS2eqnO8olG7VSDDq5mv26UEx84hqhaRigTPz.'),
(5, 'kisilona', '$2a$06$RIop21aT5eDW1I9rMf3OeupbFLi3axeDZOIaQ0sLBOQ5DEytM5Sja'),
(6, 'kovácsgéza', '$2a$06$Ryk8p8Z4T/vGZ1mBFzI7GufEkLN/yiLijk1.idpnwGbxvI0qqhUbG'),
(7, 'tóthzoltán', '$2a$06$kgcvHnu4QVLMBfbv.26ciO/df1uX6cCu.84cxJY4S.HJxn9fbv8Ym'),
(8, 'szabóerika', '$2a$06$FaxN2BKiES2fPpBXyPNRLOSbJwtY3M3LLC1ODRaxFGjaMJCtylxxq'),
(9, 'fazekasgergo', '$2a$06$phzQ/lYa7EsuUToOUtCBwesX5kFNYiDMU.eDBuDmsMsp3TOUKSe0a'),
(10, 'horváthpéter', '$2a$06$KQOHanHHVbbCcmlV5rWq3utyfdx3L5Yd94bzUWxUc6dv8b0nTDeCq'),
(11, 'kiselemér', '$2a$06$w0V7vVAEp5Isi3UJI/v6iOJHj3VXUKGPRaeCxxi6b4ro9pAkXWB.y'),
(12, 'nagybéla', '$2a$06$hAne7Xt8ZJ3wKSur1RoAkONBD8DZCIYTh1xyeR2mZikq3A12h3NeK'),
(13, 'szabódóra', '$2a$06$PM5iECMCV8t6GVJuihS3b.2FP73DEjSLJdE7GGxBMt8n4ncItXwK.'),
(14, 'kovácsadrienn', '$2a$06$Il6AADBlsqki.ADqMun58.QxB/mk.gB7a7Xf2uSnZTqXnn9hZc17a'),
(15, 'kerekesveronika', '$2a$06$wlkgND2ddRGualC5st/3Le1xQ3QU8Uq7kqImB2ZGZUa9SkZmo02bu'),
(16, 'barnaabigél', '$2a$06$iKQus0kY2vNXLe4imm6tNeka2CuKbBacp8Jj1s2gdkQKzysgQsEKW'),
(17, 'nagyistván', '$2a$06$VDWf.8TgYfXNuAS7F7dAaeLl0dgSQNGzDryrGLwMjCvjfVNS4rQDm'),
(18, 'tóthemoke', '$2a$06$JlGDabI3gqbw7Fq2qLPhkucWikPOta1uS3kuYk8.T3RSVIGQDKf46'),
(19, 'ráczádám', '$2a$06$4ahbSA1dZ0sebimLSg3njevfdniQGiuKaUVx0PccOZiyV9//BsGNy'),
(20, 'lászlódávid', '$2a$06$Vp4LhnzDBfjLt.WQscGNWu59OVNFIUqOOg4/x1liEWHrHBAQ8aBaS'),
(21, 'molnárnóra', '$2a$06$rFWwvwfjyUN/KmU9wnhzze8.Kt76QHi8iQFMQ1U356pefVKDFJcX2'),
(22, 'takácsréka', '$2a$06$Y.Fbcdu.4VRPiLyUKCGC8OKYl1JXUhnmN2vRF/roanFrBo8daxS4C'),
(23, 'ráczjózsef', '$2a$06$Wu0CfjOubl53Ge3GiCZECe7xWgjMv6p2NcAtHRhdLU8lYT34wXTgm'),
(24, 'feketeistván', '$2a$06$NTULMtZlJZqX11tNio/NiuG6UurCOi2jL2.x5N0pETrASz0xoi0lq'),
(25, 'kocsisgertrúd', '$2a$06$6HusglZxYjtZXDwmCR4w7OKcYzfZZsLf0Ftoa/pMp7rFR98HwEJxi'),
(26, 'mezeialexandra', '$2a$06$iCDGz78IdZYsHxjFN/TvtueoveERevpKFwcnuSdCWidhCsvN8HKx.'),
(27, 'mártonrenátó', '$2a$06$gtF8qlxts.qXzx6UWKSh8OfLGBT/BUlbas.dhkcH/NqTR7kKdVsGu'),
(28, 'csonkazita', '$2a$06$UgGLFX0aB3mrqYF8UCpGsupPHs2g1FvVOC3KBdfcQPUxF9vmbApYm'),
(29, 'lengyeleniko', '$2a$06$C4.GMTjL6qINthc1Q09ZmeACA9Hi1JAH.LeLG7kFPEG9qbKXIXY1i'),
(30, 'némethbence', '$2a$06$wXBtgKMX4h6kSrxPK8.0oeTgxSijdVAtJcoo5GcwuGW5OB1wk9PkK'),
(31, 'mészárosmáté', '$2a$06$CMoOPuN9yCIpfu08fmQ7XeuKEFP6oiFAAzGiVO7ggKj02LYQwwiTW'),
(32, 'nagydávid', '$2a$06$krJOta4hauJWPVzKnliZ7OWkwXeC8fK2Jqs5PAx.Me0HEiqEeOG7G'),
(33, 'horváthbernadett', '$2a$06$93wyw69rpavdJS88dQqAbe.KjWkgwT6l.gwzfHSV7s/hIAqJlBcSi'),
(34, 'törökvivien', '$2a$06$RPyrIvsGVbyP9pLQTHN69O/VW28C4H.41Jtjvl8z24IMu51SKq27a'),
(35, 'szucssándor', '$2a$06$LN21plI7gepRRsdEBdFhHeQhV2UYOLpblmMtHumqPXtejgz7oGS6C'),
(36, 'hegedusferenc', '$2a$06$L6tV2xaKVI3EgyerSjS/w.LJqgtTHrDIF9iiu7w2NLcDEPrUGhiWe'),
(37, 'siposvaléria', '$2a$06$HlYCDypKD6NZEtWQXYxHpObW4.LitPP1M2dSlqETxvUTB55L8V0oG'),
(38, 'szalaiattila', '$2a$06$a03atyHe9DZgc27l8iMkJuSsWkYx5YfdzngIq05P6XYRCU/0ckGNe'),
(39, 'takácszsófia', '$2a$06$JZIiRV6Lz85TChGYiGp6beW6zjoFZKr6Huinc4xtAjH15SyoYz97S'),
(40, 'kocsisottó', '$2a$06$venykGlHJe1rxz1zSM5gluY11UVrKj9jWNAyRCn59r1FM4Ma2FT/6'),
(41, 'ballaviktória', '$2a$06$LVqwAcsP9sDPpZEnyo5RzOI4ld78DObNbg3B.na.U2vYPwSbvjTW.'),
(42, 'deákéva', '$2a$06$Qr1pO3aWZxQGDGOcLdmbne64w80bRmBno9lJBKDv0fD5EfQagIYPy');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `dolgozo`
--
ALTER TABLE `dolgozo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sample` (`terulet_id`);

--
-- A tábla indexei `kompetenciak_teljesitese`
--
ALTER TABLE `kompetenciak_teljesitese`
  ADD KEY `dolgozo_id` (`dolgozo_id`),
  ADD KEY `kompetencia_id` (`kompetencia_id`);

--
-- A tábla indexei `ment_oper_kapcs`
--
ALTER TABLE `ment_oper_kapcs`
  ADD KEY `mentor_id` (`mentor_id`),
  ADD KEY `oper_id` (`oper_id`);

--
-- A tábla indexei `oktatasianyagok`
--
ALTER TABLE `oktatasianyagok`
  ADD PRIMARY KEY (`id`),
  ADD KEY `terulet_id` (`terulet_id`);

--
-- A tábla indexei `oktatasok`
--
ALTER TABLE `oktatasok`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mentor_id` (`mentor_id`),
  ADD KEY `oper_id` (`oper_id`),
  ADD KEY `komp_id` (`komp_id`);

--
-- A tábla indexei `osszes_kompetencia`
--
ALTER TABLE `osszes_kompetencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `terulet_id` (`terulet_id`);

--
-- A tábla indexei `terulet`
--
ALTER TABLE `terulet`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `userek`
--
ALTER TABLE `userek`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `dolgozo`
--
ALTER TABLE `dolgozo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT a táblához `oktatasianyagok`
--
ALTER TABLE `oktatasianyagok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT a táblához `oktatasok`
--
ALTER TABLE `oktatasok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT a táblához `osszes_kompetencia`
--
ALTER TABLE `osszes_kompetencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT a táblához `terulet`
--
ALTER TABLE `terulet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `dolgozo`
--
ALTER TABLE `dolgozo`
  ADD CONSTRAINT `sample` FOREIGN KEY (`terulet_id`) REFERENCES `terulet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `kompetenciak_teljesitese`
--
ALTER TABLE `kompetenciak_teljesitese`
  ADD CONSTRAINT `kompetenciak_teljesitese_ibfk_1` FOREIGN KEY (`dolgozo_id`) REFERENCES `dolgozo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kompetenciak_teljesitese_ibfk_2` FOREIGN KEY (`kompetencia_id`) REFERENCES `osszes_kompetencia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `ment_oper_kapcs`
--
ALTER TABLE `ment_oper_kapcs`
  ADD CONSTRAINT `ment_oper_kapcs_ibfk_1` FOREIGN KEY (`mentor_id`) REFERENCES `dolgozo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ment_oper_kapcs_ibfk_2` FOREIGN KEY (`oper_id`) REFERENCES `dolgozo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `oktatasianyagok`
--
ALTER TABLE `oktatasianyagok`
  ADD CONSTRAINT `oktatasianyagok_ibfk_1` FOREIGN KEY (`terulet_id`) REFERENCES `terulet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `oktatasok`
--
ALTER TABLE `oktatasok`
  ADD CONSTRAINT `oktatasok_ibfk_1` FOREIGN KEY (`mentor_id`) REFERENCES `dolgozo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `oktatasok_ibfk_2` FOREIGN KEY (`oper_id`) REFERENCES `dolgozo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `oktatasok_ibfk_3` FOREIGN KEY (`komp_id`) REFERENCES `osszes_kompetencia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `osszes_kompetencia`
--
ALTER TABLE `osszes_kompetencia`
  ADD CONSTRAINT `osszes_kompetencia_ibfk_1` FOREIGN KEY (`terulet_id`) REFERENCES `terulet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `userek`
--
ALTER TABLE `userek`
  ADD CONSTRAINT `userek_ibfk_1` FOREIGN KEY (`id`) REFERENCES `dolgozo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
