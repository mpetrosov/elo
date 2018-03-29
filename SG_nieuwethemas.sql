-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 29 mrt 2018 om 10:12
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
-- Tabelstructuur voor tabel `lesson`
--

CREATE TABLE `lesson` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gameid` int(11) NOT NULL,
  `Opdracht` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `lesson`
--

INSERT INTO `lesson` (`id`, `name`, `gameid`, `Opdracht`) VALUES
(1, 'Dieren uit Afrika', 1, 'Wat is de naam van dit dier?'),
(2, 'Huisdieren', 1, 'Wat is de naam van dit huisdier?'),
(3, 'sport', 1, 'Hoe heet deze sport?'),
(4, 'verkeer', 1, 'Wat is de naam van dit vervoermiddel?');

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
(0, 2, 'cavia', 'thema/huisdieren/cavia.jpg', 'Cavia\'s eten groenvoer, fruit en zaden, maar voornamelijk gras en paardenbloemen.'),
(0, 3, 'basketbal', 'thema/sport/basketbal.jpg', 'Bij basketbal moet de bal in de basket. Het is erg populair in de VS en lange mensen zijn er vaak heel goed in.'),
(0, 4, 'auto', 'thema/verkeer/auto.png', 'Een auto kan heel hard rijden. Ze vervuilen het milieu en ontsieren het straatbeeld.'),
(1, 1, 'cheetah', 'thema/dierenafrika/cheetah.jpg', 'De cheetah wordt ook wel jachtluipaard genoemd. Het is een soort van grote kat. De cheetah is heel snel. Hij kan wel 100 km per uur halen.'),
(1, 2, 'hamster', 'thema/huisdieren/hamster.jpg', 'Hamsters eten vooral zaden en andere plantaardige voedingsstoffen, maar ook dierlijke eiwitten zijn zeer belangrijk aangezien ze in de natuur ook insecten eten. '),
(1, 3, 'hardlopen', 'thema/sport/hardlopen.jpg', 'Het gaat er om wie het snelste een bepaald traject kan afleggen. Je hebt lange afstanden voor duurlopers en korte afstanden voor sprinters.'),
(1, 4, 'bus', 'thema/verkeer/bus.jpg', 'Met de bus kunnen een hele boel mensen tegelijkertijd worden vervoerd.'),
(2, 1, 'gazelle', 'thema/dierenafrika/gazelle.jpg', 'Gazelles zijn een soort van antilopes. Het zijn hoefdieren net als herten paarden. Ze eten gras.'),
(2, 2, 'hond', 'thema/huisdieren/hond.jpg', 'De hond is van nature een vleeseter, met een spijsverteringsstelsel dat bijna identiek is aan dat van wilde honden en wolven.'),
(2, 3, 'hockey', 'thema/sport/hockey.jpg', 'Hockey is een sport voor rijke mensen. '),
(2, 4, 'luchtballon', 'thema/verkeer/luchtballon.jpg', 'De luchtballon zweeft door de lucht. Dat hij blijft zweven komt omdat warme lucht lichter is dan koelere lucht. '),
(3, 1, 'giraffe', 'thema/dierenafrika/giraffe.jpg', 'De giraffe is heel lang. Soms wel 6 meter. Zo kan hij de blaadjes eten van bomen waar andere dieren niet bij kunnen.'),
(3, 2, 'konijn', 'thema/huisdieren/konijn.jpg', 'Het konijn leeft van een grote variatie aan plantaardig voedsel: grassen, kruiden, loten, knollen, bast en akkergewassen als graan en kool. '),
(3, 3, 'kaatsen', 'thema/sport/kaatsen.jpg', 'Kaatsen wordt voornamelijk door Friezen beoefend. Daarbuiten is er niemand die de sport begrijpt.'),
(3, 4, 'raket', 'thema/verkeer/raket.jpg', 'Een raket brengt je in een baan om de aarde. '),
(4, 1, 'gnoe', 'thema/dierenafrika/gnoe.jpg', 'De gnoe komt voor in grote groepen. Soms maakt hij lange tochten om gebieden te bereiken met vers gras.'),
(4, 2, 'muis', 'thema/huisdieren/muis.jpg', 'De naam muis wordt gebruikt voor allerlei kleine zoogdieren, in het bijzonder de huismuis.'),
(4, 3, 'korfbal', 'thema/sport/korfbal.jpg', 'Bij korfbal moet de bal in de korf. Het is een gemengde sport. D.w.z. dat er zowel jongens als meisjes in een  team zitten.'),
(4, 4, 'tram', 'thema/verkeer/tram.jpg', 'Een tram is een voertuig dat rijdt op sporen, net als een trein of een metro. Vergeleken met de trein zijn de eisen waaraan de voertuigen en de infrastructuur moeten voldoen lager.'),
(5, 1, 'leeuw', 'thema/dierenafrika/leeuw.jpg', 'De leeuw wordt wel de koning van de savanne genoemd. Alle andere dieren zijn bang voor hem. Het is een gevaarlijk roofdier.'),
(5, 2, 'papegaai', 'thema/huisdieren/papegaai.jpg', 'Papegaaien eten een gevarieerd dieet. Zaden en vruchten zijn belangrijk, maar ook nectar, stuifmeel en ongewervelde dieren worden gegeten.'),
(5, 3, 'schaatsen', 'thema/sport/schaatsen.jpg', 'Schaatsen is een echte wintersport. Meestal gebeurt het op een kunstijsbaan van 400 meter.'),
(5, 4, 'fiets', 'thema/verkeer/fiets.png', 'De fiets is het ideale vervoermiddel als het vlak is de en afstanden beperkt.'),
(6, 1, 'gorilla', 'thema/dierenafrika/gorilla.jpg', 'Gorilla\'s komen voor in de bergen van Centraal-Afrika. Ze zien er heel gevaarlijk uit maar het zijn planteneters.'),
(6, 2, 'parkiet', 'thema/huisdieren/parkiet.jpg', 'Parkieten zijn kleine papegaaiachtigen met een lange staart ten opzichte van de lichaamslengte.'),
(6, 3, 'schaken', 'thema/sport/schaken.jpg', 'Schaken is een denksport die wereldwijd wordt beoefend. Al in de Middeleeuwen was schaken populair onder de adel.'),
(6, 4, 'taxi', 'thema/verkeer/taxi.png', 'De taxi is ook een auto maar je hebt dan een chaufeeur die je moet betalen.'),
(7, 1, 'krokodil', 'thema/dierenafrika/krokodil.jpg', 'Krokodillen leven in de rivieren in Afrika. Het zijn gevaarlijke beesten die andere dieren aanvallen als ze aan het drinken zijn.'),
(7, 2, 'poes', 'thema/huisdieren/poes.jpg', 'Katten zijn erg beweeglijk: ze kunnen snel korte afstanden afleggen en het zijn goede klimmers.'),
(7, 3, 'tennis', 'thema/sport/tennis.jpg', 'Tennis doe je door met een racket de bal steeds over het net te spelen. '),
(7, 4, 'trein', 'thema/verkeer/trein.jpg', 'Een getrokken trein is een operationele combinatie van een of meer rijtuigen zonder voortbewegingsinstallatie in combinatie met een locomotief (of andere krachtbron met cabine). '),
(8, 1, 'neushoorn', 'thema/dierenafrika/neushoorn.jpg', 'De neushoorn komt voor op de savanne. Sommige mensen doden neushoorns vanwege de grote hoorn. Hierdoor zijn neushoorns heel zeldzaam geworden en moeten ze worden beschemd.'),
(8, 2, 'rat', 'thema/huisdieren/rat.jpg', 'De bruine rat is een intelligent en sociaal dier dat een groot aanpassingsvermogen heeft.'),
(8, 3, 'voetbal', 'thema/sport/voetbal.jpg', 'Voetbal is de populairste sport ter wereld. Als je er goed in bent kun je er een hoop geld mee verdienen. Je mag de bal alleen met de voet of het hoofd aanraken en niet met de handen. Behalve bij een ingooi of als je keeper bent.'),
(8, 4, 'vliegtuig', 'thema/verkeer/vliegtuig.jpg', 'Een vliegtuig is een luchtvaartuig dat een hogere dichtheid heeft dan lucht en in staat is een gecontroleerde vlucht te maken. Het maakt hierbij gebruik van de opwaartse kracht, lift genoemd. '),
(9, 1, 'nijlpaard', 'thema/dierenafrika/nijlpaard.jpg', 'Nijlpaarden komen ook voor in de rivieren. Ze zijn als enige niet bang voor krokodillen. Het zijn plateneters.'),
(9, 2, 'schildpad', 'thema/huisdieren/schildpad.jpg', 'Schildpadden hebben naast een groot en stevig schild een eivormige, duidelijk te onderscheiden kop en altijd vier poten en een staart. '),
(9, 3, 'wielrennen', 'thema/sport/wielrennen.jpg', 'Wielrennen doe je op een racefiets en gewoon op de weg. Je kan er zelfs mee over bergen gaan. De belangrijkste wedstrijd is de Tour de France.'),
(9, 4, 'vrachtwagen', 'thema/verkeer/vrachtwagen.jpg', 'Een vrachtauto of vrachtwagen (in het Belgisch-Nederlands ook wel camion) is een motorvoertuig gemaakt voor het vervoeren van goederen en waarvan de toegestane maximale massa meer dan 3500 kilogram bedraagt. '),
(10, 1, 'olifant', 'thema/dierenafrika/olifant.jpg', 'De olifant is het grootste dier dat op het land leeft. Hij heeft een hele lange slurf die hij heel handig gebruikt.'),
(11, 1, 'stokstaartje', 'thema/dierenafrika/stokstaartje.jpg', 'Stokstaartjes zijn een soort van kleine roofdiertjes. Ze eten insekten en andere kleine diertjes.'),
(12, 1, 'struisvogel', 'thema/dierenafrika/struisvogel.jpg', 'De struisvogel is een grote loopvogel. Hij kan niet vliegen. Ze kunnen wel heel hard lopen.'),
(13, 1, 'zebra', 'thema/dierenafrika/zebra.jpg', 'De zebra is een hoefdier en lijkt op een paard. Het zebrapad is genoemd naar dit dier.');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `lesson`
--
ALTER TABLE `lesson`
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
