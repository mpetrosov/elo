-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 20 mrt 2018 om 13:45
-- Serverversie: 10.1.29-MariaDB
-- PHP-versie: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Spelgoed`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `game`
--

CREATE TABLE `game` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `game`
--

INSERT INTO `game` (`id`, `Name`) VALUES
(1, 'Spelling woorden');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `lesson`
--

CREATE TABLE `lesson` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gameid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `lesson`
--

INSERT INTO `lesson` (`id`, `name`, `gameid`) VALUES
(1, 'Dieren uit Afrika', 1),
(2, 'Huisdieren', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `MadeLessons`
--

CREATE TABLE `MadeLessons` (
  `studentid` int(11) NOT NULL,
  `lessonid` int(11) NOT NULL,
  `score` int(11) DEFAULT NULL,
  `finished` tinyint(1) DEFAULT NULL,
  `datefinished` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `MadeLessons`
--

INSERT INTO `MadeLessons` (`studentid`, `lessonid`, `score`, `finished`, `datefinished`) VALUES
(1, 1, 0, 0, '2018-03-19 14:00:19'),
(1, 2, 0, 0, '2018-03-20 10:18:42'),
(2, 1, 0, 0, '2018-03-19 23:01:49');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `madetasks`
--

CREATE TABLE `madetasks` (
  `taskid` int(11) NOT NULL,
  `lessonid` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `taskfinished` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `madetasks`
--

INSERT INTO `madetasks` (`taskid`, `lessonid`, `studentid`, `score`, `taskfinished`) VALUES
(0, 1, 1, 0, '2018-03-19 22:53:46'),
(0, 1, 2, 0, '2018-03-19 23:02:48'),
(1, 1, 1, 1, '2018-03-19 22:53:59'),
(1, 1, 2, 1, '2018-03-19 23:02:59'),
(2, 1, 1, 1, '2018-03-19 22:54:12'),
(2, 1, 2, 0, '2018-03-20 10:21:29'),
(3, 1, 1, 1, '2018-03-19 22:54:25'),
(3, 1, 2, 0, '2018-03-20 11:20:48'),
(4, 1, 1, 0, '2018-03-19 22:54:33'),
(4, 1, 2, 0, '2018-03-20 11:21:05'),
(5, 1, 1, 0, '2018-03-19 23:00:14'),
(5, 1, 2, 0, '2018-03-20 11:46:20'),
(6, 1, 1, 1, '2018-03-19 23:00:24'),
(7, 1, 1, 0, '2018-03-19 23:01:01'),
(8, 1, 1, 1, '2018-03-20 10:17:52'),
(9, 1, 1, 0, '2018-03-20 10:18:01');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `student`
--

INSERT INTO `student` (`id`, `name`, `score`) VALUES
(1, 'Jeroen', 0),
(2, 'Peter', 0),
(3, 'Sandra', 0),
(4, 'Ingrid', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tasks`
--

CREATE TABLE `tasks` (
  `taskid` int(11) NOT NULL,
  `lessonid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `taskinfo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tasks`
--

INSERT INTO `tasks` (`taskid`, `lessonid`, `name`, `path`, `taskinfo`) VALUES
(0, 1, 'baviaan', 'thema/dierenafrika/baviaan.jpg', 'Een baviaan is een soort aap. Ze komen voor op de savanne in Afrika. Ze leven daar in grote groepen.'),
(1, 1, 'cheetah', 'thema/dierenafrika/cheetah.jpg', 'De cheetah wordt ook wel jachtluipaard genoemd. Het is een soort van grote kat. De cheetah is heel snel. Hij kan wel 100 km per uur halen.'),
(2, 1, 'gazelle', 'thema/dierenafrika/gazelle.jpg', 'Gazelles zijn een soort van antilopes. Het zijn hoefdieren net als herten paarden. Ze eten gras.'),
(3, 1, 'giraffe', 'thema/dierenafrika/giraffe.jpg', 'De giraffe is heel lang. Soms wel 6 meter. Zo kan hij de blaadjes eten van bomen waar andere dieren niet bij kunnen.'),
(4, 1, 'gnoe', 'thema/dierenafrika/gnoe.jpg', 'De gnoe komt voor in grote groepen. Soms maakt hij lange tochten om gebieden te bereiken met vers gras.'),
(5, 1, 'leeuw', 'thema/dierenafrika/leeuw.jpg', 'De leeuw wordt wel de koning van de savanne genoemd. Alle andere dieren zijn bang voor hem. Het is een gevaarlijk roofdier.'),
(6, 1, 'gorilla', 'thema/dierenafrika/gorilla.jpg', 'Gorilla\'s komen voor in de bergen van Centraal-Afrika. Ze zien er heel gevaarlijk uit maar het zijn planteneters.'),
(7, 1, 'krokodil', 'thema/dierenafrika/krokodil.jpg', 'Krokodillen leven in de rivieren in Afrika. Het zijn gevaarlijke beesten die andere dieren aanvallen als ze aan het drinken zijn.'),
(8, 1, 'neushoorn', 'thema/dierenafrika/neushoorn.jpg', 'De neushoorn komt voor op de savanne. Sommige mensen doden neushoorns vanwege de grote hoorn. Hierdoor zijn neushoorns heel zeldzaam geworden en moeten ze worden beschemd.'),
(9, 1, 'nijlpaard', 'thema/dierenafrika/nijlpaard.jpg', 'Nijlpaarden komen ook voor in de rivieren. Ze zijn als enige niet bang voor krokodillen. Het zijn plateneters.'),
(10, 1, 'olifant', 'thema/dierenafrika/olifant.jpg', 'De olifant is het grootste dier dat op het land leeft. Hij heeft een hele lange slurf die hij heel handig gebruikt.'),
(11, 1, 'stokstaartje', 'thema/dierenafrika/stokstaartje.jpg', 'Stokstaartjes zijn een soort van kleine roofdiertjes. Ze eten insekten en andere kleine diertjes.'),
(12, 1, 'struisvogel', 'thema/dierenafrika/struisvogel.jpg', 'De struisvogel is een grote loopvogel. Hij kan niet vliegen. Ze kunnen wel heel hard lopen.'),
(13, 1, 'zebra', 'thema/dierenafrika/zebra.jpg', 'De zebra is een hoefdier en lijkt op een paard. Het zebrapad is genoemd naar dit dier.');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `MadeLessons`
--
ALTER TABLE `MadeLessons`
  ADD PRIMARY KEY (`studentid`,`lessonid`);

--
-- Indexen voor tabel `madetasks`
--
ALTER TABLE `madetasks`
  ADD PRIMARY KEY (`taskid`,`lessonid`,`studentid`);

--
-- Indexen voor tabel `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`taskid`,`lessonid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
