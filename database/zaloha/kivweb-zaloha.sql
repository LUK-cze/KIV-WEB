-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pon 18. pro 2023, 15:09
-- Verze serveru: 10.4.27-MariaDB
-- Verze PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `kivweb`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `hry`
--

CREATE TABLE `hry` (
  `id_hry` int(11) NOT NULL,
  `nazev_hry` varchar(50) NOT NULL,
  `zanr` varchar(30) NOT NULL,
  `foto_hry` varchar(50) DEFAULT NULL,
  `popisek_hry` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `hry`
--

INSERT INTO `hry` (`id_hry`, `nazev_hry`, `zanr`, `foto_hry`, `popisek_hry`) VALUES
(1, 'Star Wars Jedi Academy', 'Akce', NULL, 'Star Wars Jedi Academy přináší vzrušující akční zážitek ve světě Star Wars. Trénujte s Jedi rytíři, plňte misi a čelte temné hrozbě Impéria. S autentickým prostředím a poutavým příběhem nabízí hra jedinečný pohled do Star Wars vesmíru.'),
(2, 'Star Wars Jedi Outcast', 'Akce', 'jedi_outcast.jpeg', 'Star Wars Jedi Outcast vás zavede do napínavého příběhu plného akce a dobrodružství. Jako Kyle Katarn čelte temným sílám a používejte své Jedi dovednosti k porážce nepřátel. S atmosférou Star Wars a poutavým hratelným stylem je hra nezapomenutelným zážitkem.'),
(3, 'Star Wars Battlefront 2 (2005)', 'Akční', 'StarWarsBattlefront2005.jpg', 'Star Wars Battlefront 2 (2005) je klasická akční hra, která vás vtáhne do masivních bitev ve světě Star Wars. Bojujte za Republiku nebo Impérium a zažijte epické momenty ze slavného sci-fi universa.'),
(4, 'God of War Ragnarok', 'Akční', NULL, 'God of War Ragnarok je pokračováním epického příběhu Kratose, boha války. S novým dobrodružstvím, boji a poutavým příběhem přináší hra nezapomenutelný zážitek pro fanoušky série.'),
(5, 'Ghost of Tsushima', 'Akční', NULL, 'Ghost of Tsushima vás zavede do feudálního Japonska během mongolské invaze. Hrajte jako samuraj Jin Sakai a bojujte za osvobození svého ostrova. S otevřeným světem, nádhernou krajinou a poutavým příběhem nabízí hra nezapomenutelný zážitek.'),
(6, 'Uncharted 4', 'Akční', NULL, 'Uncharted 4 je dobrodružná hra, která vás zavede na lov po pokladech a do exotických lokalit. S poutavým příběhem, skvělými postavami a akčními scénami nabízí hra nezapomenutelný zážitek.'),
(7, 'Guns Gore and Canolli', 'Akční', NULL, 'Guns Gore and Canolli je akční střílečka odehrávající se v éře prohibice. S vtipným stylem, výbušnými akčními scénami a poutavým příběhem nabízí hra jedinečný zážitek.'),
(810, 'Red Dead Redemption 2', 'Akční', 'RedDead2.jpeg', 'Red Dead Redemption 2 je epický westernový příběh od tvůrců Grand Theft Auto. Prozkoumejte rozlehlý otevřený svět, budujte vztahy a čelte nebezpečí Divokého západu.'),
(811, 'Battlefield 3', 'FPS', NULL, 'Battlefield 3 přináší realistický válečný zážitek v podobě intenzivních bitev a mnoha misí. S ohromující grafikou a taktickým přístupem nabízí hra nezapomenutelný zážitek.'),
(812, 'Cyberpunk 2077', 'RPG', NULL, 'Cyberpunk 2077 je RPG odehrávající se ve futuristickém světě plném intrik a nebezpečí. S možností volby vlastní cesty a hlubokým příběhem nabízí hra nezapomenutelný zážitek.'),
(813, 'Call of Duty World at War', 'FPS', NULL, 'Call of Duty World at War je válečná střílečka, která vás zavede do druhé světové války. S realistickými bitvami, silným příběhem a skvělým multiplayerem nabízí hra nezapomenutelný zážitek.'),
(814, 'Hell Let Loose', 'FPS', NULL, 'Hell Let Loose je realistický válečný simulátor odehrávající se během druhé světové války. S masivními bitevními polemi a taktickým přístupem nabízí hra unikátní zážitek.'),
(815, 'Mafia 1', 'Akční', NULL, 'Mafia 1 vás zavede do světa mafie v 30. letech. S poutavým příběhem, autentickým prostředím a silnými postavami nabízí hra nezapomenutelný zážitek.'),
(816, 'Roblox', 'Sandbox', NULL, 'Roblox je kreativní herna, kde můžete vytvářet vlastní hry, sdílet je s ostatními hráči a objevovat nekonečné možnosti.'),
(817, 'Minecraft', 'Sandbox', 'minecraft.jpg', 'Minecraft je ikonická sandbox hra, kde můžete tvořit svět podle svých představ. S nekonečnými možnostmi stavění a objevování nabízí hra nezapomenutelný zážitek.'),
(818, 'Alan Wake 2', 'Horror', 'alanwake2.jpg', 'Alan Wake 2 je hororová hra od tvůrců prvního dílu. S temnou atmosférou, napínavým příběhem a hratelností plnou akce nabízí hra unikátní zážitek.'),
(819, 'Chivalry 2', 'Akční', 'Chivalry2.jpg', 'Chivalry 2 je akční hra odehrávající se ve středověkém světě. S masivními bitvami, taktickým bojem a realistickým designem nabízí hra nezapomenutelný zážitek.'),
(820, 'Subnautica', 'Survival', NULL, 'Subnautica je survival hra s podvodní tematikou. Prozkoumejte oceán, sbírejte zdroje a přežijte v nebezpečném podmořském světě.'),
(821, 'Spiderman 2', 'Akční', NULL, 'Spiderman 2 vás vtáhne do akčního světa Spider-Mana. S otevřeným městem, skvělým pohybovým systémem a poutavým příběhem nabízí hra nezapomenutelný zážitek.'),
(822, 'Spider-Man 2', 'Akční', NULL, 'Spider-Man 2 vás vtáhne do akčního světa Spider-Mana. S otevřeným městem, skvělým pohybovým systémem a poutavým příběhem nabízí hra nezapomenutelný zážitek.'),
(823, 'Far Cry 5', 'FPS', NULL, 'Far Cry 5 přináší akční dobrodružství v otevřeném světě plném nebezpečí a exotických lokalit. S bohatým příběhem a možností volby nabízí hra nezapomenutelný zážitek.'),
(824, 'War Thunder', 'Vojenský', NULL, 'War Thunder je válečná hra zaměřená na vojenské konflikty. S rozsáhlým arzenálem vozidel a realistickými bitvami nabízí hra autentický zážitek.'),
(825, 'Enlisted', 'Vojenský', NULL, 'Enlisted je válečná hra, která vás zavede do akcí druhé světové války. S masivními bitvami a taktickým přístupem nabízí hra realistický zážitek.'),
(826, 'Assassin\'s Creed Syndicate', 'Akční', NULL, 'Assassin\'s Creed Syndicate vás přenese do viktoriánského Londýna. S otevřeným světem, historickým prostředím a akčním příběhem nabízí hra nezapomenutelný zážitek.'),
(827, 'Assassin\'s Creed Black Flag', 'Akční', NULL, 'Assassin\'s Creed Black Flag je dobrodružná hra odehrávající se v období pirátství. S otevřeným mořem, bohatým příběhem a pirátským prostředím nabízí hra nezapomenutelný zážitek.'),
(828, 'Assassin\'s Creed Unity', 'Akční', NULL, 'Assassin\'s Creed Unity vás zavede do Paříže během francouzské revoluce. S detailním městem, historickým prostředím a bohatým příběhem nabízí hra nezapomenutelný zážitek.'),
(829, 'Doom', 'FPS', NULL, 'Doom je legendární střílečka, která vás zavede do pekelných sfér. S rychlým tempem, brutální akcí a poutavým designem levelů nabízí hra nekompromisní zážitek.'),
(830, 'Star Wars: Lego Complete Saga', 'Akční', NULL, 'Star Wars: Lego Complete Saga vám přináší nezapomenutelný zážitek z vesmírné ságy v podání Lego. S humorem, skvělým designem a kooperativním módem nabízí hra zábavu pro všechny věkové kategorie.'),
(831, 'Minecraft Dungeons', 'RPG', NULL, 'Minecraft Dungeons je akční RPG odehrávající se ve světě Minecraftu. S poutavým bojem, procedurálně generovanými úrovněmi a možností spolupráce nabízí hra unikátní zážitek.'),
(832, 'Valiant Hearts', 'Puzzle', NULL, 'Valiant Hearts je dojemná hra odehrávající se během první světové války. S poutavým příběhem, kouzelným designem a hádankami nabízí hra nezapomenutelný zážitek.'),
(833, 'Hearts of Iron 4', 'Strategie', 'hoi4.jpg', 'Hearts of Iron 4 je strategická hra, která vás zavede do období druhé světové války. S hlubokými možnostmi politiky, vývoje a vojenské taktiky nabízí hra autentický zážitek.'),
(834, 'Resident Evil 4', 'Horror', NULL, 'Resident Evil 4 je hororová hra s napínavým příběhem a akčním zážitkem. S atmosférickým prostředím a chytlavým designem nabízí hra nekompromisní zážitek.'),
(835, 'Grand Theft Auto V', 'Akční', NULL, 'Grand Theft Auto V vám přináší otevřený svět plný akce, kriminálních intrik a možností. S poutavým příběhem a bohatým obsahem nabízí hra nezapomenutelný zážitek.'),
(836, 'Wolfenstein: The New Order', 'FPS', NULL, 'Wolfenstein: The New Order vás vtáhne do alternativní historie, kde nacisté vyhráli druhou světovou válku. S akčním stylem, poutavým příběhem a intenzivním gameplayem nabízí hra nekompromisní zážitek.'),
(837, 'The Elder Scrolls V: Skyrim', 'RPG', NULL, 'The Elder Scrolls V: Skyrim je epické RPG, které vás zavede do fantastického světa plného dobrodružství. S otevřeným světem, nekonečnými možnostmi a poutavým příběhem nabízí hra nezapomenutelný zážitek.'),
(838, 'Middle-earth: Shadow of War', 'Akční', NULL, 'Middle-earth: Shadow of War je akční hra odehrávající se ve světě Pána prstenů. S epickými bitvami, otevřeným světem a možností ovládání armády nabízí hra nekompromisní zážitek.'),
(839, 'Breakfest', 'RPG', NULL, 'Breakfest je kreativní RPG, kde se hráči dostanou do světa snů a příběhů. S poutavým příběhem, jedinečným stylem a neobvyklými postavami nabízí hra nezapomenutelný zážitek.'),
(840, 'Flatout', 'Závodní', NULL, 'Flatout je adrenalinová závodní hra, kde se hráči utkají v různých disciplínách. S destruktivním prostředím a poutavým stylem nabízí hra nekompromisní zážitek.'),
(841, 'Fallout 4', 'RPG', NULL, 'Fallout 4 vás zavede do postapokalyptického světa plného nebezpečí a příběhů. S otevřeným světem, možností budování a bohatým příběhem nabízí hra nezapomenutelný zážitek.'),
(842, 'Vermintide 2', 'Akční', NULL, 'Vermintide 2 je akční hra odehrávající se ve světě Warhammer Fantasy. S kooperativním přístupem, masivními bitvami a různými postavami nabízí hra unikátní zážitek.'),
(843, 'Dying Light', 'Horror', NULL, 'Dying Light je zombie akční hra, kde se hráči snaží přežít v otevřeném světě plném nebezpečí. S parkourovým pohybem, den/nočním cyklem a intenzivním bojem nabízí hra nezapomenutelný zážitek.'),
(844, 'UFC', 'Sportovní', NULL, 'UFC je simulátor smíšených bojových umění, kde se hráči mohou utkat ve slavných oktagonech. S realistickým bojem a možností vytvoření vlastního bojovníka nabízí hra autentický zážitek.'),
(845, 'FIFA', 'Sportovní', NULL, 'FIFA přináší nejlepší simulaci fotbalu s licencovanými týmy, reálnými hráči a stadiony. S autentickým herním stylem a možností multiplayeru nabízí hra nezapomenutelný zážitek.'),
(846, 'Fall Guys: Ultimate Knockout', 'Battle Royale', NULL, 'Fall Guys: Ultimate Knockout je veselá hra, kde se hráči utkávají ve zábavných soutěžích. S vtipným designem a jednoduchým ovládáním nabízí hra nekompromisní zábavu.'),
(847, 'Among Us', 'Party', 'amongus.jpeg', 'Among Us je multiplayerová hra, kde tým hráčů spolupracuje na vesmírné lodi. S tajnými intrikami, lžemi a detektivním přístupem nabízí hra nezapomenutelný zážitek.'),
(848, 'Lethal Company', 'FPS', NULL, 'Lethal Company je akční střílečka s prvky strategie, kde se hráči utkávají v taktických bitvách. S různými postavami a možností vylepšení nabízí hra nezapomenutelný zážitek.'),
(849, 'Days Gone', 'Akční', NULL, 'Days Gone je akční hra odehrávající se v postapokalyptickém světě plném zombie. S dynamickým počasím, rozsáhlým prostředím a silným příběhem nabízí hra nezapomenutelný zážitek.'),
(850, 'Ghostrunner', 'Akční', NULL, 'Ghostrunner je akční hra s prvky parkouru, kde se hráči pohybují po futuristickém městě. S rychlým tempem, intenzivním bojem a poutavým designem nabízí hra nekompromisní zážitek.'),
(851, 'Battlefield 4', 'FPS', NULL, 'Battlefield 4 přináší realistický válečný zážitek s mnoha vozidly, mapami a možnostmi. S rozsáhlými bitvami a taktickým přístupem nabízí hra autentický zážitek.'),
(852, 'Star Wars: Battlefront II', 'Akční', 'StarWarsBattlefront2.jpg', 'Star Wars: Battlefront II je akční hra odehrávající se ve světě Star Wars. S epickými bitvami, ikonickými postavami a možností prožít vlastní příběh nabízí hra nezapomenutelný zážitek.'),
(853, 'The Forest', 'Survival', NULL, 'The Forest je survival hra, kde se hráči snaží přežít na opuštěném ostrově plném nebezpečí. S možností stavění, prozkoumávání a bojem nabízí hra nekompromisní zážitek.'),
(854, 'Tom Clancy\'s Ghost Recon: Wildlands', 'Taktický', NULL, 'Tom Clancy\'s Ghost Recon: Wildlands vás zavede do otevřeného světa plného misí a taktických operací. S možností spolupráce a různými postavami nabízí hra autentický zážitek.'),
(855, 'Sniper Elite 4', 'FPS', NULL, 'Sniper Elite 4 je střílečka z pohledu ostřelovače odehrávající se během druhé světové války. S realistickou balistikou, prostředím a možností eliminace nepřátel nabízí hra autentický zážitek.'),
(856, 'Star Wars: Republic Commando', 'FPS', NULL, 'Star Wars: Republic Commando vás zavede do světa Star Wars jako člena elitní speciální jednotky. S taktickým přístupem, epickými misemi a atmosférou galaktické války nabízí hra nezapomenutelný zážitek.'),
(857, 'Kingdom Come: Deliverance', 'RPG', NULL, 'Kingdom Come: Deliverance je realistické RPG odehrávající se ve středověké Böhmen. S otevřeným světem, historickou věrností a hlubokým příběhem nabízí hra unikátní zážitek.'),
(858, 'Cities: Skylines', 'Simulace', NULL, 'Cities: Skylines je simulátor budování města, kde hráči mohou vytvořit a spravovat své vlastní město. S rozsáhlými možnostmi plánování a vývoje nabízí hra nekompromisní zážitek.'),
(859, 'Need for Speed: Most Wanted', 'Závodní', NULL, 'Need for Speed: Most Wanted je adrenalinová závodní hra, kde se hráči snaží stát se nejvyhledávanějším závodníkem. S rychlými auty, policí a otevřeným světem nabízí hra nezapomenutelný zážitek.'),
(860, 'Far Cry 4', 'FPS', NULL, 'Far Cry 4 přináší dobrodružství v otevřeném světě himálajského království plného nebezpečí a exotických zvířat. S možností volby a rozmanitými misemi nabízí hra nezapomenutelný zážitek.'),
(861, 'Payday 2', 'Akční', NULL, 'Payday 2 je kooperativní akční hra, kde hráči plánují a provádějí loupeže. S taktickým přístupem, různými misemi a možností výběru týmových rolí nabízí hra autentický zážitek.'),
(862, 'Verdun', 'FPS', NULL, 'Verdun je válečná hra odehrávající se během první světové války. S realistickými bitvami, historickým prostředím a taktickým přístupem nabízí hra autentický zážitek.'),
(863, 'CounterSpy', 'Akční', NULL, 'CounterSpy je akční hra v Cold War stylu, kde se hráči snaží zabránit globálnímu konfliktu. S unikátním uměleckým stylem a špionážní tematikou nabízí hra nezapomenutelný zážitek.'),
(864, 'Guns, Gore and Cannoli', 'Akční', NULL, 'Guns, Gore and Cannoli je akční hra, která vás zavede do světa mafiánských konfliktů. S brutální akcí, humorem a atmosférou 20. let nabízí hra nekompromisní zážitek.'),
(865, 'Assassin\'s Creed III', 'Akční', NULL, 'Assassin\'s Creed III vás zavede do období Americké revoluce, kde se střetáte s templáři a asasíny. S historickým prostředím, otevřeným světem a bohatým příběhem nabízí hra nezapomenutelný zážitek.'),
(866, 'Assassin\'s Creed Odyssey', 'Akční', NULL, 'Assassin\'s Creed Odyssey vás zavede do starověkého Řecka, kde se vypravíte na epické dobrodružství. S otevřeným světem, bohatým příběhem a rozhodnutími, která ovlivní příběh, nabízí hra unikátní zážitek.'),
(867, 'Doom Eternal', 'FPS', NULL, 'Doom Eternal je brutální střílečka, kde se hráči postaví démonickým silám. S rychlým tempem, ničivými zbraněmi a adrenalinovou akcí nabízí hra nekompromisní zážitek.'),
(868, 'Tales of Iron', 'RPG', NULL, 'Tales of Iron je RPG odehrávající se ve světě antropomorfních krys. S poutavým příběhem, kouzelným prostředím a taktickým bojem nabízí hra unikátní zážitek.'),
(869, 'My Friend Pedro', 'Akční', NULL, 'My Friend Pedro je akční střílečka plná akrobatických kousků a nekompromisní akce. S originálním přístupem a kreativním designem nabízí hra nezapomenutelný zážitek.'),
(870, 'Call of Duty Ghost', 'FPS', NULL, 'Call of Duty: Ghosts je first-person střílečka zavedená v nepříliš vzdálené budoucnosti. Příběh sleduje skupinu elitních vojáků známých jako Ghosts, kteří se snaží zachránit Ameriku před invazí. S vynikající grafikou a poutavým příběhem nabízí úžasný herní zážitek.'),
(871, 'Watch Dogs', 'Akční', NULL, 'Watch Dogs je akční adventura, která uvedla hráče do role hackera jménem Aiden Pearce. V otevřeném světě města Chicago můžete ovládat infrastrukturu města a manipulovat s elektronikou. Unikátní koncept hackování a dynamický příběh dělají z Watch Dogs nezapomenutelný zážitek.'),
(872, 'Testovací hra -----------------', 'TEST ', 'nevim.jpg', 'TESTIIKK');

-- --------------------------------------------------------

--
-- Struktura tabulky `pravo`
--

CREATE TABLE `pravo` (
  `id_pravo` int(11) NOT NULL,
  `nazev` varchar(45) NOT NULL,
  `vaha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `pravo`
--

INSERT INTO `pravo` (`id_pravo`, `nazev`, `vaha`) VALUES
(1, 'SuperAdmin', 20),
(2, 'Admin', 15),
(3, 'Autor', 10),
(4, 'Recenzert', 5);

-- --------------------------------------------------------

--
-- Struktura tabulky `recenze`
--

CREATE TABLE `recenze` (
  `id_recenze` int(11) NOT NULL,
  `id_hry` int(11) NOT NULL,
  `id_uzivatel` int(11) NOT NULL,
  `hodnoceni` int(11) NOT NULL,
  `recenze_text` varchar(2000) NOT NULL,
  `datum` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `recenze`
--

INSERT INTO `recenze` (`id_recenze`, `id_hry`, `id_uzivatel`, `hodnoceni`, `recenze_text`, `datum`) VALUES
(1, 836, 15, 5, 'Super Gameska hraju ji porad vis co', '2023-12-17 17:49:46'),
(2, 836, 15, 5, 'Super Gameska hraju ji porad vis co', '2023-12-17 17:55:17');

-- --------------------------------------------------------

--
-- Struktura tabulky `uzivatele`
--

CREATE TABLE `uzivatele` (
  `id_uzivatel` int(11) NOT NULL,
  `id_pravo` int(11) NOT NULL,
  `id_recenze` int(11) DEFAULT NULL,
  `jmeno` varchar(50) NOT NULL,
  `prijmeni` varchar(45) NOT NULL,
  `login` varchar(30) NOT NULL,
  `heslo` varchar(255) NOT NULL,
  `email` varchar(45) NOT NULL,
  `foto` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `uzivatele`
--

INSERT INTO `uzivatele` (`id_uzivatel`, `id_pravo`, `id_recenze`, `jmeno`, `prijmeni`, `login`, `heslo`, `email`, `foto`) VALUES
(1, 1, NULL, 'Hlavní správce', 'admin', 'admin', '$2y$10$g8r3hL4HYD7y1VYov1HflefRgGlII6.EEwOWac.ZMohIagp.i6obe', 'SuperAdmin@seznam.cz', NULL),
(2, 3, NULL, 'Pokusný recenzent', 'recenzent', 'recenzent1', 'recenzent1', 'Recenzent@seznam.cz', NULL),
(3, 4, NULL, 'Pokusný autor', 'autor', 'autor1', 'autor', 'Autor@seznam.cz', NULL),
(4, 1, NULL, 'Matěj', 'Putík', 'LUK', '$2y$10$DiTGpbz0hpwlvxwjz6l8m.otBWnNLF/xZAGu73MPDOGvYCJvGLgba', 'DUKEczech@seznam.cz', NULL),
(6, 1, NULL, 'Zdenek', 'Omacka', 'Zdenicek', '$2y$10$IOtYpiMUoMq0hZXJoKOtb.tthqAZhLA3g2O0jQ3fXXrGDSqY/WArS', 'Zdenovnik@seznam.cz', NULL),
(12, 2, NULL, 'ales', 'alesovnik', 'ALESEK', '$2y$10$LLGbNhzS.KY1050c70CntuuzXoLsU4E7PuyeAP6MQIpymN7yQEPpa', 'Alesek@email.cz', NULL),
(15, 1, NULL, 'Jan', 'Novák', 'Test', '$2y$10$5XmOulMycRpo3wIkiCUSAO07NorahNF7V6qJ1FP7pNeA.t9j6COBy', 'Janek@seznam.cz', 'maul.jpg'),
(16, 1, NULL, 'asa', 'Novák', 'asa', '$2y$10$Er9Jc4uvn9lUjVS8yBEeueVsiwRmIL4m8S5SFZdvhYenAzYoJ8Uhi', 'nevim.email@nevim.cz', 'vader.jpeg');

-- --------------------------------------------------------

--
-- Struktura tabulky `zanry`
--

CREATE TABLE `zanry` (
  `id_zanry` int(11) NOT NULL,
  `nazev_zanru` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `hry`
--
ALTER TABLE `hry`
  ADD PRIMARY KEY (`id_hry`),
  ADD UNIQUE KEY `id_hry_UNIQUE` (`id_hry`),
  ADD UNIQUE KEY `nazev_hry_UNIQUE` (`nazev_hry`),
  ADD UNIQUE KEY `foto_hry_UNIQUE` (`foto_hry`);

--
-- Indexy pro tabulku `pravo`
--
ALTER TABLE `pravo`
  ADD PRIMARY KEY (`id_pravo`),
  ADD UNIQUE KEY `id_pravo_UNIQUE` (`id_pravo`),
  ADD UNIQUE KEY `nazev_UNIQUE` (`nazev`),
  ADD UNIQUE KEY `vaha_UNIQUE` (`vaha`);

--
-- Indexy pro tabulku `recenze`
--
ALTER TABLE `recenze`
  ADD PRIMARY KEY (`id_recenze`),
  ADD UNIQUE KEY `id_recenze_UNIQUE` (`id_recenze`),
  ADD KEY `fk_recenze_hry_id_hry_idx` (`id_hry`),
  ADD KEY `fk_recenze_uzivatele_id_uzivatel_idx` (`id_uzivatel`);

--
-- Indexy pro tabulku `uzivatele`
--
ALTER TABLE `uzivatele`
  ADD PRIMARY KEY (`id_uzivatel`),
  ADD UNIQUE KEY `iduzivatele_UNIQUE` (`id_uzivatel`),
  ADD UNIQUE KEY `nick_UNIQUE` (`login`),
  ADD UNIQUE KEY `foto_UNIQUE` (`foto`),
  ADD KEY `fk_uzivatel_pravo_id_pravo_idx` (`id_pravo`),
  ADD KEY `fk_uzivatel_rezenze_id_rezenze_idx` (`id_recenze`);

--
-- Indexy pro tabulku `zanry`
--
ALTER TABLE `zanry`
  ADD PRIMARY KEY (`id_zanry`),
  ADD UNIQUE KEY `id_zanry_UNIQUE` (`id_zanry`),
  ADD UNIQUE KEY `nazev_zanru_UNIQUE` (`nazev_zanru`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `hry`
--
ALTER TABLE `hry`
  MODIFY `id_hry` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=876;

--
-- AUTO_INCREMENT pro tabulku `pravo`
--
ALTER TABLE `pravo`
  MODIFY `id_pravo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pro tabulku `recenze`
--
ALTER TABLE `recenze`
  MODIFY `id_recenze` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pro tabulku `uzivatele`
--
ALTER TABLE `uzivatele`
  MODIFY `id_uzivatel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pro tabulku `zanry`
--
ALTER TABLE `zanry`
  MODIFY `id_zanry` int(11) NOT NULL AUTO_INCREMENT;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `recenze`
--
ALTER TABLE `recenze`
  ADD CONSTRAINT `fk_recenze_hry_id_hry` FOREIGN KEY (`id_hry`) REFERENCES `hry` (`id_hry`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_recenze_uzivatele_id_uzivatel` FOREIGN KEY (`id_uzivatel`) REFERENCES `uzivatele` (`id_uzivatel`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Omezení pro tabulku `uzivatele`
--
ALTER TABLE `uzivatele`
  ADD CONSTRAINT `fk_uzivatel_pravo_id_pravo` FOREIGN KEY (`id_pravo`) REFERENCES `pravo` (`id_pravo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_uzivatel_rezenze_id_rezenze` FOREIGN KEY (`id_recenze`) REFERENCES `recenze` (`id_recenze`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
