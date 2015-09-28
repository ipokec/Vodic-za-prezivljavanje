-- phpMyAdmin SQL Dump
-- version 3.3.7deb7
-- http://www.phpmyadmin.net
--
-- Računalo: localhost
-- Vrijeme generiranja: Lip 10, 2015 u 11:44 PM
-- Verzija poslužitelja: 5.0.51
-- PHP verzija: 5.3.3-7+squeeze19

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza podataka: `WebDiP2014x052`
--

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `clanak`
--

CREATE TABLE IF NOT EXISTS `clanak` (
  `idclanak` int(11) NOT NULL auto_increment,
  `podrucje` int(11) NOT NULL,
  `korisnik` int(11) NOT NULL,
  `naziv` varchar(200) character set cp1250 collate cp1250_croatian_ci default NULL,
  `opis` varchar(500) character set cp1250 collate cp1250_croatian_ci default NULL,
  `kreiran` datetime default NULL,
  PRIMARY KEY  (`idclanak`,`podrucje`,`korisnik`),
  KEY `fk_clanak_podrucje1_idx` (`podrucje`),
  KEY `fk_clanak_korisnik1_idx` (`korisnik`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Izbacivanje podataka za tablicu `clanak`
--

INSERT INTO `clanak` (`idclanak`, `podrucje`, `korisnik`, `naziv`, `opis`, `kreiran`) VALUES
(1, 4, 5, 'Predivna Aljaska', 'Aljaska je predivan dio svijeta i pun mira. Trebate posijeti', '2015-03-31 17:23:24'),
(2, 3, 3, 'B.A.S.E. komplet za preživljavljavanje', 'B.A.S.E. (osnovni set za preživljavanje ) komplet 1.0', '2015-06-10 21:53:54'),
(3, 2, 3, 'Preživljavanje kraljevskih pin', 'Kraljevski pingvin nastanjuje najsjevernije dijelove Antarkt', '2015-03-31 17:31:00'),
(4, 3, 5, 'How to Survive in the Amazon R', 'The Amazon rain forest encompasses more than a billion acres', '2015-03-09 20:24:56'),
(5, 3, 3, 'Surviving in the Amazon Jungle', 'Last week, my brother and I spent four days in the Amazon ju', '2015-03-10 20:25:01'),
(6, 3, 5, 'Surviving the Amazon Jungle', 'Amazon Jungle Survival Tips', '2015-03-06 20:25:04'),
(7, 3, 3, 'Surviving a Shooting in the Am', 'Two months and a third of the way in, he was attacked and le', '2015-03-01 20:25:08'),
(8, 3, 5, 'Stranded and alone', 'Amazon explorer Ed Stafford survives 60 days on his own on a', '2015-03-06 20:25:13'),
(9, 3, 5, 'How to kill and get rid off mo', 'How do natives or tribes deal with mosquitoes in the Amazon', '2015-03-03 20:25:17'),
(10, 3, 3, 'Kako prezivjeti u dungli', 'najbolji savjeti', '2015-03-06 20:25:20');

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `dnevnik`
--

CREATE TABLE IF NOT EXISTS `dnevnik` (
  `iddnevnik` int(11) NOT NULL auto_increment,
  `korisnik` int(11) NOT NULL,
  `tipAktivnosti` int(11) NOT NULL,
  `opis` varchar(60) default NULL,
  `upit` varchar(60) default NULL,
  `vrijeme` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`iddnevnik`,`korisnik`,`tipAktivnosti`),
  KEY `fk_prijava_korisnik1_idx` (`korisnik`),
  KEY `fk_dnevnik_tipAktivnosti1_idx` (`tipAktivnosti`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Izbacivanje podataka za tablicu `dnevnik`
--

INSERT INTO `dnevnik` (`iddnevnik`, `korisnik`, `tipAktivnosti`, `opis`, `upit`, `vrijeme`) VALUES
(1, 1, 1, 'prijava u sustav', NULL, '2015-03-31 19:52:46'),
(2, 1, 7, 'kreira podrucje aljaska', 'kreira', '2015-03-31 19:58:34'),
(3, 1, 8, 'dodjeljuje podrucje moderatoru', 'dodjeljuje', '2015-03-31 19:58:34'),
(4, 1, 2, 'administrator se odjavljuje', 'odjava', '2015-03-31 19:58:34'),
(5, 3, 5, 'pise novi clanak', 'kreira', '2015-03-31 19:58:34'),
(6, 3, 5, 'pise novi clanak', 'kreira', '2015-03-31 19:58:34'),
(7, 3, 6, 'moderator dodaje slike clanku', 'dodaje', '2015-03-31 19:58:34'),
(8, 3, 6, 'moderator dodaje video', 'dodaje', '2015-03-31 19:58:34'),
(9, 3, 6, 'moderator dodaje dokumente', 'dodaje', '2015-03-31 19:58:34'),
(10, 3, 6, 'moderator dodaje slike', 'dodaje', '2015-03-31 19:58:34'),
(11, 3, 6, 'moderator dodaje video', 'dodaje', '2015-03-31 19:58:34');

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `dokumenti`
--

CREATE TABLE IF NOT EXISTS `dokumenti` (
  `iddokumenti` int(11) NOT NULL auto_increment,
  `clanak` int(11) NOT NULL,
  `naziv` varchar(20) default NULL,
  `opis` varchar(50) default NULL,
  `dokument` varchar(500) character set cp1250 collate cp1250_croatian_ci default NULL,
  PRIMARY KEY  (`iddokumenti`,`clanak`),
  KEY `fk_dokumenti_clanak1_idx` (`clanak`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Izbacivanje podataka za tablicu `dokumenti`
--

INSERT INTO `dokumenti` (`iddokumenti`, `clanak`, `naziv`, `opis`, `dokument`) VALUES
(1, 2, 'B.A.S.E.', 'sve informacije o ovom proizvodu', 'http://elisatrgovina.hr/base-kit.html'),
(2, 1, 'Trazis Aljasku', 'Sve o Aljasci', 'https://marimarister.files.wordpress.com'),
(3, 3, 'Emperor Penguin', 'opis kraljevskih pingvina', 'http://animals.nationalgeographic.com/an'),
(4, 4, 'Savjeti za prezivlja', 'nekoliko brzih savjeta za prezivljavanje', 'http://traveltips.usatoday.com/amazon-ra'),
(5, 5, 'Savjeti', 'najbolji savjeti za prezivljavanje', 'http://www.shortlist.com/shortlists/top-'),
(6, 6, 'Najbolji savjeti', 'opis kako najlase prezivjeti u Amazonskoj prasumi', 'http://www.trails.com/how_6992_amazon-ra'),
(7, 7, 'Ispovijest covjeka k', 'Ostavljen u sumi da umre', 'http://www.outsideonline.com/1917726/sur'),
(8, 8, 'Prezivio', 'Kako izgleda kad se zamijeni Amazona za pusti otok', 'http://www.dailymail.co.uk/home/moslive/'),
(9, 9, 'Kako ubiti komarce', 'savjeti za ubijanje komaraca', 'http://amazonascolombia.info/kill-get-ri'),
(10, 10, 'Savjeti za lov', 'Kako najlakse doci do rucka', 'http://www.ultimatesurvivalskills.com/su'),
(12, 2, NULL, NULL, 'http://arka.foi.hr/WebDiP/2014_projekti/'),
(13, 2, NULL, NULL, 'http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x052/ostalo/2/Vodi? za preživljavanje.pdf');

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `komentari`
--

CREATE TABLE IF NOT EXISTS `komentari` (
  `korisnik` int(11) NOT NULL,
  `clanak` int(11) NOT NULL,
  `komentar` varchar(60) character set cp1250 collate cp1250_croatian_ci default NULL,
  `vrijeme` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  `idkomentar` bigint(20) unsigned NOT NULL auto_increment,
  PRIMARY KEY  (`idkomentar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Izbacivanje podataka za tablicu `komentari`
--

INSERT INTO `komentari` (`korisnik`, `clanak`, `komentar`, `vrijeme`, `status`, `idkomentar`) VALUES
(4, 2, 'Ovo je super. Gdi se moze nabavit?', '2015-03-31 18:53:27', 0, 1),
(4, 4, 'Hvala za super savjete', '2015-03-31 21:24:11', 0, 2),
(4, 5, 'Hvala za savjet', '2015-03-31 21:24:11', 0, 3),
(4, 7, 'Puno vam hvala', '2015-03-31 21:24:11', 0, 4),
(4, 9, 'Ima i boljih nacina za ubijanje komaraca', '2015-03-31 21:24:11', 0, 5),
(7, 2, 'I mene zanima', '2015-03-31 18:53:49', 0, 6),
(7, 5, 'Ovi savjeti su zakon', '2015-03-31 21:24:11', 0, 7),
(7, 8, 'Te ribe nisu jestive', '2015-03-31 21:24:11', 0, 8),
(8, 6, 'Ima nejasnih stvari koje ste napisali', '2015-03-31 21:24:11', 0, 9),
(8, 10, 'Svaka cast', '2015-03-31 21:24:11', 0, 10),
(14, 2, '''Ma to je glupost', '2015-03-31 18:54:09', 0, 11),
(12, 2, 'dobro je', '2015-06-03 17:38:03', 1, 12),
(2, 3, 'dobro je', '2015-06-05 17:24:40', 0, 13),
(2, 3, 'dobro je', '2015-06-03 17:42:52', 1, 14),
(3, 3, 'dobar članak', '2015-06-03 17:58:52', 1, 15),
(2, 3, 'komentar', '2015-06-03 18:23:44', 1, 23),
(2, 3, 'komentar', '2015-06-03 18:23:59', 1, 24),
(3, 2, 'to sam ja napisao', '2015-06-09 17:28:24', 1, 25),
(20, 2, 'moj novi komant', '2015-06-10 14:22:29', 1, 26),
(3, 2, 'Hvala ljudi', '2015-06-10 21:55:59', 1, 27);

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `korisnik`
--

CREATE TABLE IF NOT EXISTS `korisnik` (
  `idkorisnik` int(11) NOT NULL auto_increment,
  `tipKorisnika` int(11) NOT NULL,
  `ime` varchar(20) character set cp1250 collate cp1250_croatian_ci default NULL,
  `prezime` varchar(30) character set cp1250 collate cp1250_croatian_ci default NULL,
  `slika` varchar(50) default NULL,
  `zupanija` int(11) NOT NULL,
  `grad` varchar(40) character set cp1250 collate cp1250_croatian_ci default NULL,
  `adresa` varchar(60) character set cp1250 collate cp1250_croatian_ci NOT NULL,
  `email` varchar(20) default NULL,
  `korisnicko` varchar(20) default NULL,
  `lozinka` varchar(20) default NULL,
  `telefon` varchar(20) default NULL,
  `roden` date default NULL,
  `spol` varchar(10) default NULL,
  `newsletter` varchar(2) NOT NULL,
  `status` int(11) NOT NULL,
  `aktivacijskiKod` varchar(50) NOT NULL,
  `kreiran` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `brojPrijava` int(11) NOT NULL,
  PRIMARY KEY  (`idkorisnik`,`tipKorisnika`,`zupanija`,`status`),
  KEY `fk_korisnik_tipKorisnika1_idx` (`tipKorisnika`),
  KEY `fk_korisnik_zupanija1_idx` (`zupanija`),
  KEY `fk_korisnik_status1_idx` (`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Izbacivanje podataka za tablicu `korisnik`
--

INSERT INTO `korisnik` (`idkorisnik`, `tipKorisnika`, `ime`, `prezime`, `slika`, `zupanija`, `grad`, `adresa`, `email`, `korisnicko`, `lozinka`, `telefon`, `roden`, `spol`, `newsletter`, `status`, `aktivacijskiKod`, `kreiran`, `brojPrijava`) VALUES
(1, 1, 'Ivan', 'Pokec', 'http://arka.foi.hr/~ipokec/img/ipokec.jpg', 5, 'Varaždin', 'asdfasdfd', 'nesto@foi.hr', 'admin', 'admin', '111 1111111', '2015-04-29', 'M', 'da', 2, '', '0000-00-00 00:00:00', 0),
(2, 2, 'Petard', 'Šimun', 'http://arka.foi.hr/~ipokec/img/psimunic.jpg', 5, 'Koprivnica', 'Trg Prodavi?a 5', 'ipoke@foi.hr', 'psimunic', 'psimunicpsimunic', '098 7863452', '1994-06-15', 'M', 'ne', 4, '25', '2015-05-04 00:00:00', 0),
(3, 3, 'Vesna', 'Cener', 'http://arka.foi.hr/~ipokec/img/vcener.jpg', 4, 'Varazdin', 'Augusta Cesarca 5', 'vcener@foi.hr', 'vcener', '12345678', '099 7536542', '1992-09-20', 'M', 'da', 2, '10', '2015-05-05 12:21:37', 0),
(4, 2, 'Martina', 'Maric', 'http://arka.foi.hr/~ipokec/img/mmaric.jpg', 4, 'Varaždin', 'Trakoš?anska 5a', 'mmaric@foi.hr', 'mmaric', '12345678', '091 7569844', '1992-06-10', 'Z', 'da', 3, '', '0000-00-00 00:00:00', 0),
(5, 3, 'Tomislav', 'Kos', 'http://arka.foi.hr/~ipokec/img/tkos.jpg', 4, 'Varaždin', 'Basari?ekova 35', 'tkos@foi.hr', 'tkos', '12345678', '098 7852453', '1990-08-25', 'M', '', 2, '', '0000-00-00 00:00:00', 0),
(6, 3, 'Josip', 'Musli', 'http://arka.foi.hr/~ipokec/img/jmusli.jpg', 4, 'Varaždin', 'Tituša Brezova?kog 12', 'jmusli@foi.hr', 'jmusli', '87654321', '091 2653254', '1985-12-25', 'M', '', 2, '', '0000-00-00 00:00:00', 0),
(7, 2, 'Marko', 'Mati?', 'http://arka.foi.hr/~ipokec/img/mmatic.jpg', 13, 'Karlovac', 'Vrazova 3', 'mmatic@foi.hr', 'mmatic', 'abcd1234', '095 7896251', '1993-05-03', 'M', '', 3, '', '2015-05-05 16:36:20', 0),
(8, 2, 'Luka', 'Kosian', 'http://arka.foi.hr/~ipokec/img/lkosian.jpg', 20, 'Pula', 'Proljetna 6', 'lkosian@foi.hr', 'lkosian', 'abcd4321', '091 4521543', '1989-06-10', 'M', '', 1, '', '0000-00-00 00:00:00', 0),
(9, 3, 'Zoran', 'Pokos', 'http://arka.foi.hr/~ipokec/img/zpokos.jpg', 4, 'Varaždin', 'Zagreba?ka 56', 'zpokos@foi.hr', 'zpokos', '12345678', '095 7855564', '1991-09-10', 'M', 'da', 2, '', '0000-00-00 00:00:00', 0),
(10, 2, 'Marija', 'Bunic', 'http://arka.foi.hr/~ipokec/img/mbunic.jpg', 1, 'Zagreb', 'Frankopanska 68', 'mbunic@foi.hr', 'mbunic', 'dcba1234', '091 9984255', '1987-05-26', 'Z', '', 2, '', '0000-00-00 00:00:00', 0),
(11, 2, 'Josipa', 'Petric', 'http://arka.foi.hr/~ipokec/img/jpetric.jpg', 4, 'Varaždin', 'Koprivni?ka 79', 'jpetric@foi.hr', 'jpetric', '12345678', '099 7886641', '1990-11-15', 'M', 'ne', 2, '', '0000-00-00 00:00:00', 0),
(12, 3, 'Ana', 'Cuzek', 'http://arka.foi.hr/~ipokec/img/acuzek.jpg', 11, 'Osijek', 'Augusta Senoe 152', 'acuzek@foi.hr', 'acuzek', '12345678', '092 8886525', '1986-04-12', 'Z', 'da', 2, '', '0000-00-00 00:00:00', 0),
(13, 2, 'Emanuela', 'Batini', 'http://arka.foi.hr/~ipokec/img/ebatinic.jpg', 7, 'Bjelovar', 'Miroslava Krleže 23', 'ebatinic@foi.hr', 'ebatinic', '12345678', '095 7896541', '1988-06-29', 'Z', 'ne', 3, '', '0000-00-00 00:00:00', 0),
(14, 2, 'Vjekoslav', 'Herceg', 'http://arka.foi.hr/~ipokec/img/vherceg.jpg', 13, 'Ogulin', 'Petra Preradovi?a 19', 'vherceg@foi.hr', 'vherceg', '87654321', '092 2552553', '1984-07-16', 'M', '', 2, '', '0000-00-00 00:00:00', 0),
(15, 2, 'Tajana', 'Grivi?', 'http://arka.foi.hr/~ipokec/img/tgivic.jpg', 17, 'Zadar', 'Gradine 84', 'ipoke@foi.hr', 'tgivic', '43218765', '091 4411257', '1985-01-26', 'Z', '', 1, '', '0000-00-00 00:00:00', 1),
(16, 2, 'Ivan', 'Pokeč', '', 3, 'Vara??din', 'bfgb', 'dsfvdfv@foi.hr', 'dvd', 'mldmfMDFKMVD12315', '0959078960', '0000-00-00', 'M', 'da', 4, '443556857', '0000-00-00 00:00:00', 0),
(18, 3, 'Ivan', 'Ipoke', '', 3, 'Vara??din', 'dvscds', 'ipoke@foi.hr', 'iosd', 'jnvdMDFNVKDF23121', '0959078960', '0000-00-00', 'M', 'da', 3, '1447586282', '0000-00-00 00:00:00', 0),
(19, 2, 'Jurica', 'Ševa', '', 3, 'Varaždin', 'asdfasdfd', 'jseva@foi.hr', 'korime', 'Lozinka112233', '111 1111111', '2015-04-29', 'M', 'da', 3, '1070827304', '2015-05-19 13:30:11', 0),
(20, 2, 'Ivan', 'Pokec', '', 4, 'Virje', 'Ljudevita gaja 34', 'ipokec@foi.hr', 'ipokec', 'ndkNDKSJ123456789', '095 1234567', '1993-02-02', 'M', 'da', 4, '669322626', '2015-06-10 11:45:24', 0);

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `moderira`
--

CREATE TABLE IF NOT EXISTS `moderira` (
  `korisnik` int(11) NOT NULL,
  `podrucje` int(11) NOT NULL,
  PRIMARY KEY  (`korisnik`,`podrucje`),
  KEY `fk_korisnik_has_podrucje_podrucje1_idx` (`podrucje`),
  KEY `fk_korisnik_has_podrucje_korisnik1_idx` (`korisnik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Izbacivanje podataka za tablicu `moderira`
--

INSERT INTO `moderira` (`korisnik`, `podrucje`) VALUES
(3, 1),
(5, 1),
(3, 2),
(5, 2),
(3, 3),
(5, 3),
(3, 4),
(5, 4),
(6, 5),
(6, 6),
(9, 7),
(12, 8),
(18, 9),
(5, 10);

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `ocijene`
--

CREATE TABLE IF NOT EXISTS `ocijene` (
  `korisnik` int(11) NOT NULL,
  `clanak` int(11) NOT NULL,
  `ocijena` int(11) default NULL,
  PRIMARY KEY  (`korisnik`,`clanak`),
  KEY `fk_korisnik_has_clanak_clanak1_idx` (`clanak`),
  KEY `fk_korisnik_has_clanak_korisnik1_idx` (`korisnik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Izbacivanje podataka za tablicu `ocijene`
--

INSERT INTO `ocijene` (`korisnik`, `clanak`, `ocijena`) VALUES
(2, 1, 5),
(2, 2, 3),
(2, 3, 5),
(4, 1, 2),
(7, 1, 3),
(8, 2, 5),
(10, 2, 4),
(11, 2, 4),
(13, 3, 1),
(14, 3, 2),
(15, 3, 3),
(20, 2, 5);

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `podrucje`
--

CREATE TABLE IF NOT EXISTS `podrucje` (
  `idpodrucje` int(11) NOT NULL auto_increment,
  `naziv` varchar(45) default NULL,
  `specificnost` varchar(45) default NULL,
  PRIMARY KEY  (`idpodrucje`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Izbacivanje podataka za tablicu `podrucje`
--

INSERT INTO `podrucje` (`idpodrucje`, `naziv`, `specificnost`) VALUES
(1, 'sahara', 'jako suho podrucje'),
(2, 'antartik', 'jako hladno podrucje'),
(3, 'amazona', 'vlazno podrucje'),
(4, 'aljaska', 'podrucje puno planina'),
(5, 'mt. everest', 'najvisi vrh svijeta'),
(6, 'dolina rijeke nil', 'kombinacija suhe klime i vode'),
(7, 'serengeti', 'prepun divljih zivotinja'),
(8, 'sibir', 'dosta hladan teren s malim sumama'),
(9, 'indonezija', 'mnostvo otoka'),
(10, 'australija', 'puno cudnih zivotinja');

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `pomak`
--

CREATE TABLE IF NOT EXISTS `pomak` (
  `id` int(11) NOT NULL auto_increment,
  `vrijeme` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Izbacivanje podataka za tablicu `pomak`
--

INSERT INTO `pomak` (`id`, `vrijeme`) VALUES
(1, '2015-06-10 14:20:21');

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `pretplate`
--

CREATE TABLE IF NOT EXISTS `pretplate` (
  `podrucje` int(11) NOT NULL,
  `korisnik` int(11) NOT NULL,
  `od_kad` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `do_kad` date default NULL,
  PRIMARY KEY  (`podrucje`,`korisnik`),
  KEY `fk_pretplate_korisnik1_idx` (`korisnik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Izbacivanje podataka za tablicu `pretplate`
--

INSERT INTO `pretplate` (`podrucje`, `korisnik`, `od_kad`, `do_kad`) VALUES
(1, 2, '2015-03-31 17:11:01', NULL),
(1, 15, '2015-03-31 17:14:36', NULL),
(2, 2, '2015-03-31 17:11:44', NULL),
(2, 20, '2015-06-10 14:21:46', NULL),
(3, 2, '2015-06-08 21:17:04', NULL),
(3, 4, '2015-03-31 17:14:36', NULL),
(3, 7, '2015-03-31 17:14:36', NULL),
(3, 8, '2015-03-31 17:14:36', '2015-04-15'),
(3, 14, '2015-03-31 17:14:36', NULL),
(3, 20, '2015-06-10 14:21:50', NULL),
(4, 2, '2015-06-03 22:41:54', NULL),
(4, 10, '2015-03-31 17:14:36', NULL),
(5, 11, '2015-03-31 17:14:36', NULL),
(5, 14, '2015-03-31 17:14:36', NULL),
(7, 15, '2015-03-31 17:14:36', NULL),
(8, 13, '2015-03-31 17:14:36', NULL);

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `slika`
--

CREATE TABLE IF NOT EXISTS `slika` (
  `idslika` int(11) NOT NULL auto_increment,
  `clanak` int(11) NOT NULL,
  `naziv` varchar(20) default NULL,
  `opis` varchar(50) default NULL,
  `slika` varchar(500) character set cp1250 collate cp1250_croatian_ci default NULL,
  PRIMARY KEY  (`idslika`,`clanak`),
  KEY `fk_slika_clanak_idx` (`clanak`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Izbacivanje podataka za tablicu `slika`
--

INSERT INTO `slika` (`idslika`, `clanak`, `naziv`, `opis`, `slika`) VALUES
(1, 2, 'B.A.S.E. komplet ', 'osnovni set za prezivljavanje', 'http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x052/img/2/Neki od najbitnijih alata prezivljavanja.jpg'),
(2, 2, 'B.A.S.E. komplet ', 'osnovni set za prezivljavanje', 'http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x052/img/2/Neki od najbitnijih alata prezivljavanja.jpg'),
(3, 2, 'B.A.S.E. komplet za ', 'osnovni set za prezivljavanje', 'http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x052/img/2/Neki od najbitnijih alata prezivljavanja.jpg'),
(4, 2, 'B.A.S.E. komplet ', 'osnovni set za prezivljavanje', 'http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x052/img/2/Neki od najbitnijih alata prezivljavanja.jpg'),
(5, 2, 'B.A.S.E. komplet ', 'osnovni set za prezivljavanje', 'http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x052/img/2/Neki od najbitnijih alata prezivljavanja.jpg'),
(6, 1, 'Aljaska krajolik', 'spoj suma, jezera i snijega', 'http://as1.wdpromedia.com/media/abd/north-america/alaska-vacations/denali-national-park.jpg'),
(7, 1, 'Aljaska i zivotinje', 'Prikaz medvjeda', 'http://www.fairsharecommonheritage.org/wp-content/uploads/2011/08/alaskaimage2.jpg'),
(9, 1, 'Polarna svijetlost', 'boje koje se prelijevaju na nebu', 'http://genealogytrails.com/alaska/alaska_pic_1.jpg'),
(10, 1, 'Medvjedi', 'Cest su prizor pogotovo kad je sezona lososa', 'http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x052/img/2/10945336_10205636741695031_937111269_n.jpg'),
(11, 3, 'Kraljevski pingvini', 'sakupljanje oblutaka', 'http://www.24sata.hr/image/prezivljavanje-kraljevskih-pingvina-na-antarktici-504x335-20070417-201010'),
(12, 3, 'Spretni plivaci', 'plivanje kraljevskih ppingvina', 'http://dalje.com/slike/slike_3/r2/g2009/m01/y134193801996631231_1.jpg'),
(13, 3, 'Sakupljanje', 'sakupljaju se kako im nebi bilo hladno', 'http://i305.photobucket.com/albums/nn228/lavittoria/art_emperor_group.jpg'),
(14, 3, 'Roditelji', 'roditelji vode brigu o svojoj djeci', 'http://svijetzivotinja.com/wp-content/uploads/2014/12/pingvini-najbolji-roditelji-5.jpg'),
(15, 3, 'Pingvini u lovu', 'pingvini idu skupno u lov na ribu', 'http://www.nationalgeographic.com.hr/Slike/2009/10/12/9188959.JPG'),
(17, 2, NULL, NULL, 'http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x052/img/2/images.jpg'),
(18, 2, NULL, NULL, 'http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x052/img/2/Neki od najbitnijih alata prezivljavanja.jpg'),
(19, 2, NULL, NULL, 'http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x052/img/2/survival_kit.jpg');

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `idstatus` int(11) NOT NULL auto_increment,
  `naziv` varchar(30) default NULL,
  PRIMARY KEY  (`idstatus`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Izbacivanje podataka za tablicu `status`
--

INSERT INTO `status` (`idstatus`, `naziv`) VALUES
(1, 'ne potvrdeni'),
(2, 'potvrdeni'),
(3, 'blokirani'),
(4, 'samostalno potvr?en');

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `tipAktivnosti`
--

CREATE TABLE IF NOT EXISTS `tipAktivnosti` (
  `idtipAktivnosti` int(11) NOT NULL auto_increment,
  `naziv` varchar(80) default NULL,
  PRIMARY KEY  (`idtipAktivnosti`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Izbacivanje podataka za tablicu `tipAktivnosti`
--

INSERT INTO `tipAktivnosti` (`idtipAktivnosti`, `naziv`) VALUES
(1, 'prijava'),
(2, 'odjava'),
(3, 'pretplata'),
(4, 'komentar'),
(5, 'novi clanak'),
(6, 'umetanje materijala'),
(7, 'kreira podrucje'),
(8, 'dodjeljuje moderatora za podrucje'),
(9, 'odblokiranje korisnika'),
(10, 'brisanje korisnika');

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `tipKorisnika`
--

CREATE TABLE IF NOT EXISTS `tipKorisnika` (
  `idtipKorisnika` int(11) NOT NULL auto_increment,
  `naziv` varchar(45) NOT NULL,
  PRIMARY KEY  (`idtipKorisnika`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Izbacivanje podataka za tablicu `tipKorisnika`
--

INSERT INTO `tipKorisnika` (`idtipKorisnika`, `naziv`) VALUES
(1, 'administrator'),
(2, 'registrirani korisnik'),
(3, 'moderator');

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `idvideo` int(11) NOT NULL auto_increment,
  `clanak` int(11) NOT NULL,
  `naziv` varchar(20) default NULL,
  `opis` varchar(50) default NULL,
  `video_link` varchar(500) character set cp1250 collate cp1250_croatian_ci default NULL,
  PRIMARY KEY  (`idvideo`,`clanak`),
  KEY `fk_video_clanak1_idx` (`clanak`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Izbacivanje podataka za tablicu `video`
--

INSERT INTO `video` (`idvideo`, `clanak`, `naziv`, `opis`, `video_link`) VALUES
(1, 2, 'How to Build a Survi', 'In this episode, we show you the items we feel is ', 'http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x052/video/What It''s Like To Live In Alaska.mp4'),
(2, 2, 'SOL Origin Survival ', ' Is it the best Grab and Go Survival Kit for the m', 'http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x052/video/What It''s Like To Live In Alaska.mp4'),
(3, 1, 'Survival in Alaska e', 'prezivljavanje u opakim uvjetima', 'http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x052/video/What It''s Like To Live In Alaska.mp4'),
(4, 1, 'What It''s Like To Li', 'kako je to zapravo zivjeti na aljasci', 'http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x052/video/What It''s Like To Live In Alaska.mp4'),
(5, 3, 'Emperor penguins', 'The Greatest Wildlife Show on Earth', 'http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x052/video/What It''s Like To Live In Alaska.mp4'),
(6, 3, 'Emperor Penguins in ', NULL, 'http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x052/video/What It''s Like To Live In Alaska.mp4'),
(7, 4, 'Survival in the Amaz', 'prezivljavanje u Amazonskoj prasumi', 'http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x052/video/What It''s Like To Live In Alaska.mp4'),
(8, 4, 'Jungle Survival - Am', 'neki savjeti za prezivljavanje', 'http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x052/video/What It''s Like To Live In Alaska.mp4'),
(9, 5, 'Jungle survival - Co', 'kako najbolje skuhati ribu u nemogucim uvjetima', 'http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x052/video/What It''s Like To Live In Alaska.mp4'),
(10, 5, 'Survival Zone: Jungl', 'Survival expert Mayke Hawke shows us why a machete', 'http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x052/video/What It''s Like To Live In Alaska.mp4'),
(11, 6, 'Amazon Jungle Surviv', 'kako napraviti zamku za ptice', 'http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x052/video/What It''s Like To Live In Alaska.mp4'),
(12, 6, 'Life In The Amazon J', 'kako koristiti macetu u dungli', 'http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x052/video/What It''s Like To Live In Alaska.mp4'),
(13, 7, 'Man vs. Wild - Eatin', 'Kako najlakse doci do hrane u sumi', 'http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x052/video/What It''s Like To Live In Alaska.mp4'),
(14, 7, 'Clever Fishing ', 'savjeti za pripremu ribe i koje ribe su jestive', 'http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x052/video/What It''s Like To Live In Alaska.mp4'),
(15, 8, 'Dangerous animals in', 'najopasnije zivotinje u amazonskoj prasumi', 'http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x052/video/What It''s Like To Live In Alaska.mp4'),
(16, 8, 'Snake Bites Bear', 'Kako prezivjeti ugriz zmije', 'http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x052/video/What It''s Like To Live In Alaska.mp4'),
(17, 9, 'Hiking in the jungle', 'Ray Mears gives some pointers on how to look after', 'http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x052/video/What It''s Like To Live In Alaska.mp4'),
(18, 9, 'Mosquito Attack in t', 'kad komarci napadnu', 'http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x052/video/What It''s Like To Live In Alaska.mp4'),
(19, 10, 'Termiti', 'kako se najlakse rijesiti termita', 'http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x052/video/2/Mosquito killed by a Laser.mp4'),
(20, 10, 'Into the Jungle', 'najbolji savjeti kako prezivjeti u dungli kraj ins', 'http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x052/video/2/Mosquito killed by a Laser.mp4'),
(22, 2, NULL, NULL, 'http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x052/video/2/Mosquito killed by a Laser.mp4'),
(23, 10, NULL, NULL, 'http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x052/video/10/Mosquito killed by a Laser.mp4');

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `zabrana`
--

CREATE TABLE IF NOT EXISTS `zabrana` (
  `korisnik` int(11) NOT NULL,
  `clanak` int(11) NOT NULL,
  `razlog` varchar(40) default NULL,
  PRIMARY KEY  (`korisnik`,`clanak`),
  KEY `fk_korisnik_has_clanak_clanak2_idx` (`clanak`),
  KEY `fk_korisnik_has_clanak_korisnik2_idx` (`korisnik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Izbacivanje podataka za tablicu `zabrana`
--

INSERT INTO `zabrana` (`korisnik`, `clanak`, `razlog`) VALUES
(8, 10, 'neprimjereni komentar'),
(9, 2, NULL),
(14, 2, 'neprimjereni komentari'),
(14, 3, 'neprimjereni komentari'),
(14, 4, 'neprimjereni komentari'),
(14, 5, 'neprimjereni komentari'),
(14, 6, 'neprimjereni komentari'),
(14, 7, 'neprimjereni komentari'),
(14, 8, 'neprimjereni komentari'),
(14, 9, 'neprimjereni komentari'),
(14, 10, 'neprimjereni komentari');

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `zupanija`
--

CREATE TABLE IF NOT EXISTS `zupanija` (
  `idzupanija` int(11) NOT NULL auto_increment,
  `naziv` varchar(45) default NULL,
  PRIMARY KEY  (`idzupanija`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Izbacivanje podataka za tablicu `zupanija`
--

INSERT INTO `zupanija` (`idzupanija`, `naziv`) VALUES
(1, 'Grad Zagreb'),
(2, 'Zagreba?ka županija'),
(3, 'Krapinsko-zagorska županija'),
(4, 'Varaždinska županiju'),
(5, 'Koprivni?ko-križeva?ka županija'),
(6, 'Me?imurska županija'),
(7, 'Bjelovarsko-bilogorska županija'),
(8, 'Viroviti?ko-podravska županija'),
(9, 'Požeško-slavonska županija'),
(10, 'Brodsko-posavska županija'),
(11, 'Osje?ko-baranjska županija'),
(12, 'Vukovarsko-srijemska županija'),
(13, 'Karlova?ka županija'),
(14, 'Sisa?ko-moslava?ka županija'),
(15, 'Primorsko-goranska županija'),
(16, 'Li?ko-senjska županija'),
(17, 'Zadarska županija'),
(18, 'Šibensko-kninska županija'),
(19, 'Splitsko-dalmatinska županija'),
(20, 'Istarska županija'),
(21, 'Dubrova?ko-neretvanska županija');

--
-- Ograničenja za izbačene tablice
--

--
-- Ograničenja za tablicu `clanak`
--
ALTER TABLE `clanak`
  ADD CONSTRAINT `fk_clanak_korisnik1` FOREIGN KEY (`korisnik`) REFERENCES `korisnik` (`idkorisnik`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_clanak_podrucje1` FOREIGN KEY (`podrucje`) REFERENCES `podrucje` (`idpodrucje`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograničenja za tablicu `dnevnik`
--
ALTER TABLE `dnevnik`
  ADD CONSTRAINT `fk_dnevnik_tipAktivnosti1` FOREIGN KEY (`tipAktivnosti`) REFERENCES `tipAktivnosti` (`idtipAktivnosti`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prijava_korisnik1` FOREIGN KEY (`korisnik`) REFERENCES `korisnik` (`idkorisnik`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograničenja za tablicu `dokumenti`
--
ALTER TABLE `dokumenti`
  ADD CONSTRAINT `fk_dokumenti_clanak1` FOREIGN KEY (`clanak`) REFERENCES `clanak` (`idclanak`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograničenja za tablicu `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `fk_korisnik_status1` FOREIGN KEY (`status`) REFERENCES `status` (`idstatus`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_korisnik_tipKorisnika1` FOREIGN KEY (`tipKorisnika`) REFERENCES `tipKorisnika` (`idtipKorisnika`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_korisnik_zupanija1` FOREIGN KEY (`zupanija`) REFERENCES `zupanija` (`idzupanija`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograničenja za tablicu `moderira`
--
ALTER TABLE `moderira`
  ADD CONSTRAINT `fk_korisnik_has_podrucje_korisnik1` FOREIGN KEY (`korisnik`) REFERENCES `korisnik` (`idkorisnik`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_korisnik_has_podrucje_podrucje1` FOREIGN KEY (`podrucje`) REFERENCES `podrucje` (`idpodrucje`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograničenja za tablicu `ocijene`
--
ALTER TABLE `ocijene`
  ADD CONSTRAINT `fk_korisnik_has_clanak_clanak1` FOREIGN KEY (`clanak`) REFERENCES `clanak` (`idclanak`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_korisnik_has_clanak_korisnik1` FOREIGN KEY (`korisnik`) REFERENCES `korisnik` (`idkorisnik`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograničenja za tablicu `pretplate`
--
ALTER TABLE `pretplate`
  ADD CONSTRAINT `fk_pretplate_korisnik1` FOREIGN KEY (`korisnik`) REFERENCES `korisnik` (`idkorisnik`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pretplate_podrucje1` FOREIGN KEY (`podrucje`) REFERENCES `podrucje` (`idpodrucje`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograničenja za tablicu `slika`
--
ALTER TABLE `slika`
  ADD CONSTRAINT `fk_slika_clanak` FOREIGN KEY (`clanak`) REFERENCES `clanak` (`idclanak`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograničenja za tablicu `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `fk_video_clanak1` FOREIGN KEY (`clanak`) REFERENCES `clanak` (`idclanak`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograničenja za tablicu `zabrana`
--
ALTER TABLE `zabrana`
  ADD CONSTRAINT `fk_korisnik_has_clanak_clanak2` FOREIGN KEY (`clanak`) REFERENCES `clanak` (`idclanak`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_korisnik_has_clanak_korisnik2` FOREIGN KEY (`korisnik`) REFERENCES `korisnik` (`idkorisnik`) ON DELETE NO ACTION ON UPDATE NO ACTION;
