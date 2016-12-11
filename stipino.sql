-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Dec 11, 2016 at 04:24 PM
-- Server version: 5.5.48-cll
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `culexvr_stipino`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `city` int(11) NOT NULL,
  `permalink` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=240 ;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id`, `name`, `city`, `permalink`, `created_at`, `updated_at`) VALUES
(1, 'Borova', 83, 'borova', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(2, 'Centar', 83, 'centar', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(3, 'Dionica', 83, 'dionica', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(4, 'Donji Grad', 83, 'donji-grad', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(5, 'Gornji Grad', 83, 'gornji-grad', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(6, 'Industrijska četvrt', 83, 'industrijska-cetvrt', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(7, 'Jug I', 83, 'jug-i', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(8, 'Jug II', 83, 'jug-ii', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(9, 'Našičko naselje', 83, 'nasicko-naselje', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(10, 'Pampas', 83, 'pampas', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(11, 'Pustara', 83, 'pustara', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(12, 'Retfala', 83, 'retfala', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(13, 'Sjenjak', 83, 'sjenjak', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(14, 'Stadionsko naselje', 83, 'stadionsko-naselje', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(15, 'Tvrđa', 83, 'tvrda', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(16, 'Zapadno predgrađe', 83, 'zapadno-predgrade', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(17, 'Zeleno polje', 83, 'zeleno-polje', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(18, 'Blato', 1, 'blato', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(19, 'Borongaj', 1, 'borongaj', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(20, 'Borovje', 1, 'borovje', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(21, 'Botinec', 1, 'botinec', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(22, 'Brestje', 1, 'brestje', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(23, 'Brezovica', 1, 'brezovica', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(24, 'Bukovac', 1, 'bukovac', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(25, 'Buzin', 1, 'buzin', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(26, 'Centar', 1, 'centar', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(27, 'Črnomerec', 1, 'crnomerec', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(28, 'Čulinec', 1, 'culinec', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(29, 'Cvjetno naselje', 1, 'cvjetno-naselje', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(30, 'Dubec', 1, 'dubec', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(31, 'Dubrava', 1, 'dubrava', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(32, 'Dugave', 1, 'dugave', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(33, 'Ferenščica', 1, 'ferenscica', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(34, 'Folnegovićevo', 1, 'folnegovicevo', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(35, 'Gajnice', 1, 'gajnice', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(36, 'Gračani', 1, 'gracani', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(37, 'Ivanja Reka', 1, 'ivanja-reka', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(38, 'Jakuševec', 1, 'jakusevec', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(39, 'Jankomir', 1, 'jankomir', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(40, 'Jarun', 1, 'jarun', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(41, 'Kajzerica', 1, 'kajzerica', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(42, 'Kanal', 1, 'kanal', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(43, 'Klara', 1, 'klara', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(44, 'Knežija', 1, 'knezija', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(45, 'Kruge', 1, 'kruge', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(46, 'Ksaver', 1, 'ksaver', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(47, 'Kustošija', 1, 'kustosija', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(48, 'Kvatrić', 1, 'kvatric', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(49, 'Lanište', 1, 'laniste', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(50, 'Lučko', 1, 'lucko', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(51, 'Ljubljanica', 1, 'ljubljanica', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(52, 'Maksimir', 1, 'maksimir', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(53, 'Malešnica', 1, 'malesnica', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(54, 'Markuševec', 1, 'markusevec', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(55, 'Medveščak', 1, 'medvescak', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(56, 'Mikulići', 1, 'mikulici', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(57, 'Mlinovi', 1, 'mlinovi', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(58, 'Peščenica', 1, 'pescenica', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(59, 'Podsused', 1, 'podsused', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(60, 'Poljanice', 1, 'poljanice', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(61, 'Prečko', 1, 'precko', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(62, 'Ravnice', 1, 'ravnice', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(63, 'Remete', 1, 'remete', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(64, 'Remetinec', 1, 'remetinec', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(65, 'Retkovec', 1, 'retkovec', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(66, 'Rudeš', 1, 'rudes', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(67, 'Savica', 1, 'savica', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(68, 'Savski gaj', 1, 'savski-gaj', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(69, 'Šestine', 1, 'sestine', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(70, 'Sesvete', 1, 'sesvete', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(71, 'Sigečica', 1, 'sigecica', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(72, 'Siget', 1, 'siget', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(73, 'Sloboština', 1, 'slobostina', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(74, 'Sopot', 1, 'sopot', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(75, 'Špansko', 1, 'spansko', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(76, 'Središće', 1, 'sredisce', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(77, 'Srednjaci', 1, 'srednjaci', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(78, 'Stenjevec', 1, 'stenjevec', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(79, 'Stupnik', 1, 'stupnik', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(80, 'Sveta Nedelja', 1, 'sveta-nedelja', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(81, 'Svetice', 1, 'svetice', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(82, 'Travno', 1, 'travno', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(83, 'Trešnjevka', 1, 'tresnjevka', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(84, 'Trnava', 1, 'trnava', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(85, 'Trnovčica', 1, 'trnovcica', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(86, 'Trnsko', 1, 'trnsko', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(87, 'Trnje', 1, 'trnje', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(88, 'Trokut', 1, 'trokut', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(89, 'Utrina', 1, 'utrina', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(90, 'Veliko Polje', 1, 'veliko-polje', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(91, 'Volovčica', 1, 'volovcica', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(92, 'Voltino', 1, 'voltino', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(93, 'Vrapče', 1, 'vrapce', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(94, 'Vrbani', 1, 'vrbani', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(95, 'Vrbik', 1, 'vrbik', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(96, 'Vukomerec', 1, 'vukomerec', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(97, 'Zapruđe', 1, 'zaprude', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(98, 'Zavrtnica', 1, 'zavrtnica', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(99, 'Žitnjak', 1, 'zitnjak', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(100, 'Bačvice', 103, 'bacvice', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(101, 'Bilice', 103, 'bilice', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(102, 'Blatine', 103, 'blatine', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(103, 'Bol', 103, 'bol', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(104, 'Brda', 103, 'brda', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(105, 'Dobri', 103, 'dobri', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(106, 'Dračevac', 103, 'dracevac', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(107, 'Dragovode', 103, 'dragovode', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(108, 'Dujilovo', 103, 'dujilovo', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(109, 'Dujmovača', 103, 'dujmovaca', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(110, 'Firule', 103, 'firule', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(111, 'Glavičine', 103, 'glavicine', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(112, 'Grad', 103, 'grad', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(113, 'Gripe', 103, 'gripe', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(114, 'Kacunar', 103, 'kacunar', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(115, 'Kila', 103, 'kila', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(116, 'Kman', 103, 'kman', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(117, 'Kopilica', 103, 'kopilica', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(118, 'Križine', 103, 'krizine', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(119, 'Lokve', 103, 'lokve', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(120, 'Lora', 103, 'lora', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(121, 'Lovret', 103, 'lovret', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(122, 'Lovrinac', 103, 'lovrinac', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(123, 'Lučac', 103, 'lucac', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(124, 'Manuš', 103, 'manus', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(125, 'Mejaši', 103, 'mejasi', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(126, 'Meje', 103, 'meje', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(127, 'Mertojak', 103, 'mertojak', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(128, 'Neslanovac', 103, 'neslanovac', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(129, 'Pazdigrad', 103, 'pazdigrad', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(130, 'Plokite', 103, 'plokite', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(131, 'Poljud', 103, 'poljud', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(132, 'Pujanke', 103, 'pujanke', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(133, 'Radunica', 103, 'radunica', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(134, 'Ravne njive', 103, 'ravne-njive', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(135, 'Sirobuja', 103, 'sirobuja', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(136, 'Skalice', 103, 'skalice', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(137, 'Škrape', 103, 'skrape', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(138, 'Smokovik', 103, 'smokovik', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(139, 'Smrdečac', 103, 'smrdecac', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(140, 'Spinut', 103, 'spinut', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(141, 'Stinice', 103, 'stinice', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(142, 'Sućidar', 103, 'sucidar', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(143, 'Sukojišan', 103, 'sukojisan', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(144, 'Sustipan', 103, 'sustipan', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(145, 'Table', 103, 'table', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(146, 'Trstenik', 103, 'trstenik', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(147, 'Veli Varoš', 103, 'veli-varos', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(148, 'Visoka', 103, 'visoka', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(149, 'Vranjic', 103, 'vranjic', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(150, 'Žnjan', 103, 'znjan', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(151, 'Zvončac', 103, 'zvoncac', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(152, 'Banderovo', 56, 'banderovo', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(153, 'Belveder', 56, 'belveder', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(154, 'Bivio', 56, 'bivio', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(155, 'Brajda', 56, 'brajda', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(156, 'Brašćine', 56, 'brascine', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(157, 'Bulevard', 56, 'bulevard', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(158, 'Centar', 56, 'centar', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(159, 'Donja Drenova', 56, 'donja-drenova', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(160, 'Gornja Drenova', 56, 'gornja-drenova', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(161, 'Gornja Vežica', 56, 'gornja-vezica', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(162, 'Grbci', 56, 'grbci', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(163, 'Grobnik', 56, 'grobnik', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(164, 'Kantrida', 56, 'kantrida', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(165, 'Kastav', 56, 'kastav', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(166, 'Kostrena', 56, 'kostrena', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(167, 'Kozala', 56, 'kozala', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(168, 'Krimeja', 56, 'krimeja', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(169, 'Krnjevo', 56, 'krnjevo', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(170, 'Martinkovac', 56, 'martinkovac', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(171, 'Matulji', 56, 'matulji', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(172, 'Mlaka', 56, 'mlaka', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(173, 'Orehovica', 56, 'orehovica', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(174, 'Pašac', 56, 'pasac', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(175, 'Pećine', 56, 'pecine', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(176, 'Pehlin', 56, 'pehlin', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(177, 'Podmurvice', 56, 'podmurvice', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(178, 'Podvežica', 56, 'podvezica', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(179, 'Potok', 56, 'potok', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(180, 'Pulac', 56, 'pulac', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(181, 'Rastočine', 56, 'rastocine', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(182, 'Rujevica', 56, 'rujevica', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(183, 'Školjić', 56, 'skoljic', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(184, 'Škurinje', 56, 'skurinje', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(185, 'Škurinjska Draga', 56, 'skurinjska-draga', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(186, 'Srdoči', 56, 'srdoci', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(187, 'Sušačka Draga', 56, 'susacka-draga', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(188, 'Sušak', 56, 'susak', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(189, 'Sv. Kuzam', 56, 'sv.-kuzam', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(190, 'Trsat', 56, 'trsat', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(191, 'Turnić', 56, 'turnic', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(192, 'Viškovo', 56, 'viskovo', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(193, 'Vojak', 56, 'vojak', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(194, 'Zamet', 56, 'zamet', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(195, 'Arbanasi', 77, 'arbanasi', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(196, 'Belafuža', 77, 'belafuza', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(197, 'Bili Brig', 77, 'bili-brig', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(198, 'Brodarica', 77, 'brodarica', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(199, 'Crvene Kuće', 77, 'crvene-kuce', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(200, 'Diklo', 77, 'diklo', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(201, 'Donji Brig', 77, 'donji-brig', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(202, 'Dražanica', 77, 'drazanica', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(203, 'Dražnice', 77, 'draznice', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(204, 'Gaj', 77, 'gaj', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(205, 'Gaženica', 77, 'gazenica', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(206, 'Gornji Bilig', 77, 'gornji-bilig', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(207, 'Jazine 1', 77, 'jazine-1', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(208, 'Jazine 2', 77, 'jazine-2', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(209, 'Kolovare', 77, 'kolovare', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(210, 'Martinovo', 77, 'martinovo', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(211, 'Maslina', 77, 'maslina', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(212, 'Mocire', 77, 'mocire', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(213, 'Novi Bokanjac', 77, 'novi-bokanjac', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(214, 'Petrić', 77, 'petric', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(215, 'Plovanija', 77, 'plovanija', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(216, 'Poluotok', 77, 'poluotok', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(217, 'Puntamika', 77, 'puntamika', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(218, 'Ravnice', 77, 'ravnice', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(219, 'Ričina', 77, 'ricina', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(220, 'Sinjoretovo', 77, 'sinjoretovo', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(221, 'Skročini', 77, 'skrocini', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(222, 'Smiljevac', 77, 'smiljevac', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(223, 'Špada', 77, 'spada', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(224, 'Stanovi', 77, 'stanovi', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(225, 'Stari Bokanjac', 77, 'stari-bokanjac', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(226, 'Višnjik', 77, 'visnjik', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(227, 'Voštarnica', 77, 'vostarnica', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(228, 'Čiče', 8, 'cice', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(229, 'Mraclin', 8, 'mraclin', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(230, 'Šćitarjevo', 8, 'scitarjevo', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(231, 'Velika Gorica', 8, 'velika-gorica', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(232, 'Velika Kosnica', 8, 'velika-kosnica', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(233, 'Velika Mlaka', 8, 'velika-mlaka', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(234, 'Vukomerić', 8, 'vukomeric', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(235, 'Ivanec', 34, 'ivanec', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(236, 'Ludbreg', 34, 'ludbreg', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(237, 'Novi Marof', 34, 'novi-marof', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(238, 'Varaždin', 34, 'varazdin', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(239, 'Varaždinske toplice', 34, 'varazdinske-toplice', '2016-11-23 18:25:37', '2016-11-23 18:25:37');

-- --------------------------------------------------------

--
-- Table structure for table `assigned_roles`
--

CREATE TABLE IF NOT EXISTS `assigned_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `assigned_roles_user_id_foreign` (`user_id`),
  KEY `assigned_roles_role_id_foreign` (`role_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `assigned_roles`
--

INSERT INTO `assigned_roles` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 357, 5, '2016-12-07 17:23:53', '2016-12-07 17:23:53');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `token` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cart_token_unique` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE IF NOT EXISTS `cart_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `permalink` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category_type` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `permalink`, `image`, `category_type`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Ocat', 'ocat', '', 'product', 'Kategorija proizvoda', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(2, 'Ajvar', 'ajvar', '', 'product', 'Kategorija proizvoda', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(3, 'Paradajz', 'paradajz', '', 'product', 'Kategorija proizvoda', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(4, 'Jabuka', 'jabuka', '', 'product', 'Kategorija proizvoda', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(5, 'Pekmez', 'pekmez', '', 'product', 'Kategorija proizvoda', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(6, 'Sok', 'sok', '', 'product', 'Kategorija proizvoda', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(7, 'Zaštita', 'zastita', '', 'blog', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(8, 'AKCIJA!', 'akcija', '', 'product', 'U ovoj kategoriji će biti proizvodi koji su na akciji', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(9, 'Orašasti plodovi', 'orasasti-plodovi', '', 'product', 'Orasi i lješnjaci', '2016-11-23 23:39:24', '2016-11-23 23:39:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `zip` int(10) unsigned NOT NULL,
  `permalink` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=129 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `zip`, `permalink`, `created_at`, `updated_at`) VALUES
(1, 'Zagreb', 10000, 'zagreb', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(2, 'Dugo Selo', 0, 'dugo-selo', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(3, 'Ivanić Grad', 0, 'ivanic-grad', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(4, 'Jastrebarsko', 0, 'jastrebarsko', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(5, 'Samobor', 0, 'samobor', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(6, 'Sveta Nedelja', 0, 'sveta-nedelja', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(7, 'Sveti Ivan Zelina', 0, 'sveti-ivan-zelina', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(8, 'Velika Gorica', 0, 'velika-gorica', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(9, 'Vrbovec', 0, 'vrbovec', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(10, 'Zaprešić', 0, 'zapresic', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(11, 'Donja Stubica', 0, 'donja-stubica', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(12, 'Klanjec', 0, 'klanjec', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(13, 'Krapina', 0, 'krapina', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(14, 'Oroslavje', 0, 'oroslavje', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(15, 'Pregrada', 0, 'pregrada', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(16, 'Zabok', 0, 'zabok', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(17, 'Zlatar', 0, 'zlatar', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(18, 'Glina', 0, 'glina', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(19, 'Hrvatska Kostajnica', 0, 'hrvatska-kostajnica', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(20, 'Kutina', 0, 'kutina', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(21, 'Novska', 0, 'novska', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(22, 'Petrinja', 0, 'petrinja', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(23, 'Popovača', 0, 'popovaca', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(24, 'Sisak', 0, 'sisak', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(25, 'Duga Resa', 0, 'duga-resa', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(26, 'Karlovac', 0, 'karlovac', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(27, 'Ogulin', 0, 'ogulin', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(28, 'Ozalj', 0, 'ozalj', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(29, 'Slunj', 0, 'slunj', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(30, 'Ivanec', 0, 'ivanec', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(31, 'Lepoglava', 0, 'lepoglava', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(32, 'Ludbreg', 0, 'ludbreg', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(33, 'Novi Marof', 0, 'novi-marof', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(34, 'Varaždin', 0, 'varazdin', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(35, 'Varaždinske Toplice', 0, 'varazdinske-toplice', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(36, 'Đurđevac', 0, 'durdevac', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(37, 'Koprivnica', 0, 'koprivnica', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(38, 'Križevci', 0, 'krizevci', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(39, 'Bjelovar', 0, 'bjelovar', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(40, 'Čazma', 0, 'cazma', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(41, 'Daruvar', 0, 'daruvar', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(42, 'Garešnica', 0, 'garesnica', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(43, 'Grubišno Polje', 0, 'grubisno-polje', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(44, 'Bakar', 0, 'bakar', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(45, 'Cres', 0, 'cres', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(46, 'Crikvenica', 0, 'crikvenica', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(47, 'Čabar', 0, 'cabar', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(48, 'Delnice', 0, 'delnice', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(49, 'Kastav', 0, 'kastav', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(50, 'Kraljevica', 0, 'kraljevica', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(51, 'Krk', 0, 'krk', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(52, 'Mali Lošinj', 0, 'mali-losinj', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(53, 'Novi Vinodolski', 0, 'novi-vinodolski', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(54, 'Opatija', 0, 'opatija', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(55, 'Rab', 0, 'rab', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(56, 'Rijeka', 0, 'rijeka', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(57, 'Vrbovsko', 0, 'vrbovsko', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(58, 'Gospić', 0, 'gospic', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(59, 'Novalja', 0, 'novalja', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(60, 'Otočac', 0, 'otocac', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(61, 'Senj', 0, 'senj', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(62, 'Orahovica', 0, 'orahovica', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(63, 'Slatina', 0, 'slatina', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(64, 'Virovitica', 0, 'virovitica', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(65, 'Kutjevo', 0, 'kutjevo', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(66, 'Lipik', 0, 'lipik', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(67, 'Pakrac', 0, 'pakrac', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(68, 'Pleternica', 0, 'pleternica', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(69, 'Požega', 0, 'pozega', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(70, 'Nova gradiška', 0, 'nova-gradiska', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(71, 'Slavonski Brod', 0, 'slavonski-brod', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(72, 'Benkovac', 0, 'benkovac', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(73, 'Biograd na Moru', 0, 'biograd-na-moru', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(74, 'Nin', 0, 'nin', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(75, 'Obrovac', 0, 'obrovac', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(76, 'Pag', 0, 'pag', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(77, 'Zadar', 0, 'zadar', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(78, 'Beli Manastir', 0, 'beli-manastir', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(79, 'Belišće', 0, 'belisce', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(80, 'Donji Miholjac', 0, 'donji-miholjac', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(81, 'Đakovo', 0, 'dakovo', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(82, 'Našice', 0, 'nasice', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(83, 'Osijek', 31000, 'osijek', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(84, 'Valpovo', 0, 'valpovo', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(85, 'Drniš', 0, 'drnis', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(86, 'Knin', 0, 'knin', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(87, 'Skradin', 0, 'skradin', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(88, 'Šibenik', 0, 'sibenik', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(89, 'Vodice', 0, 'vodice', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(90, 'Ilok', 0, 'ilok', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(91, 'Otok', 0, 'otok', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(92, 'Vinkovci', 0, 'vinkovci', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(93, 'Vukovar', 0, 'vukovar', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(94, 'Županja', 0, 'zupanja', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(95, 'Hvar', 0, 'hvar', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(96, 'Imotski', 0, 'imotski', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(97, 'Kaštela', 0, 'kastela', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(98, 'Komiža', 0, 'komiza', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(99, 'Makarska', 0, 'makarska', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(100, 'Omiš', 0, 'omis', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(101, 'Sinj', 0, 'sinj', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(102, 'Solin', 0, 'solin', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(103, 'Split', 0, 'split', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(104, 'Stari Grad', 0, 'stari-grad', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(105, 'Supetar', 0, 'supetar', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(106, 'Trilj', 0, 'trilj', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(107, 'Trogir', 0, 'trogir', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(108, 'Vis', 0, 'vis', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(109, 'Vrgorac', 0, 'vrgorac', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(110, 'Vrlika', 0, 'vrlika', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(111, 'Buje-Buie', 0, 'buje-buie', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(112, 'Buzet', 0, 'buzet', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(113, 'Labin', 0, 'labin', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(114, 'Novigrad', 0, 'novigrad', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(115, 'Pazin', 0, 'pazin', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(116, 'Poreč', 0, 'porec', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(117, 'Pula', 0, 'pula', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(118, 'Rovinj', 0, 'rovinj', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(119, 'Umag', 0, 'umag', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(120, 'Vodnjan', 0, 'vodnjan', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(121, 'Dubrovnik', 0, 'dubrovnik', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(122, 'Korčula', 0, 'korcula', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(123, 'Metković', 0, 'metkovic', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(124, 'Opuzen', 0, 'opuzen', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(125, 'Ploče', 0, 'ploce', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(126, 'Čakovec', 0, 'cakovec', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(127, 'Mursko Središće', 0, 'mursko-sredisce', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(128, 'Prelog', 0, 'prelog', '2016-11-23 18:25:37', '2016-11-23 18:25:37');

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE IF NOT EXISTS `cms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `permalink` varchar(255) NOT NULL,
  `intro` text NOT NULL,
  `content` text NOT NULL,
  `category` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `published` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `workshop_date` date DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `title`, `permalink`, `intro`, `content`, `category`, `type`, `published`, `image`, `workshop_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Prvi blog post stipino', 'ovo-je-moj-prvi-blog-post', '<p>Into tj. kratki opis za blog post</p>', '<p style="margin-bottom: 15px; padding: 0px; text-align: justify; font-family: " open="" sans",="" arial,="" sans-serif;"="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quam dolor, egestas sed sapien vel, eleifend porttitor dui. Morbi massa velit, dictum vitae condimentum id, placerat elementum urna. Nunc malesuada magna id erat imperdiet, eget congue ex ultrices. Nulla sit amet consectetur lorem. Sed rutrum lobortis purus, eu varius nisi porta at. Nulla vel est turpis. Pellentesque suscipit suscipit tellus a facilisis. Vestibulum placerat varius blandit. In viverra mauris eget purus iaculis, tristique blandit orci consectetur. Cras pharetra placerat magna, vitae interdum lorem dignissim vitae. Donec sit amet molestie quam. Aenean ipsum lorem, luctus a malesuada accumsan, dictum a libero. Ut dignissim, massa eu ultrices elementum, dolor erat ullamcorper magna, in tincidunt elit mauris non dui. Phasellus non sollicitudin est.</p><p style="margin-bottom: 15px; padding: 0px; text-align: justify; font-family: " open="" sans",="" arial,="" sans-serif;"="">Mauris et vehicula purus, nec imperdiet enim. Pellentesque varius mi arcu, ac scelerisque lacus tristique vel. Pellentesque lobortis hendrerit sapien eu sollicitudin. Phasellus accumsan, sem ac rhoncus ornare, erat tortor eleifend ipsum, non sodales nisi ante varius tortor. Proin mollis dapibus dolor sed scelerisque. Sed condimentum lobortis lorem, id dignissim lectus. Praesent fermentum enim vel neque hendrerit consequat. In sed malesuada metus, sit amet pretium enim. Praesent ac velit et elit auctor gravida. Proin iaculis condimentum commodo. Aliquam pharetra, metus gravida fermentum placerat, augue dui scelerisque est, sit amet pulvinar tellus quam ut dui.</p><p style="margin-bottom: 15px; padding: 0px; text-align: justify; font-family: " open="" sans",="" arial,="" sans-serif;"="">Curabitur nulla massa, molestie et tortor quis, imperdiet imperdiet lacus. Maecenas in tristique ligula. Cras semper non orci at lacinia. Quisque dapibus et tortor elementum molestie. Nam at imperdiet nisl. Pellentesque dignissim fringilla eros, nec feugiat odio aliquam at. Phasellus id tempor nisl, ac cursus metus. In hac habitasse platea dictumst. Sed sit amet sapien odio. Aenean at ipsum porttitor urna congue consequat at non sapien. Nullam varius lobortis arcu, non tempor augue euismod eu.</p>', 1, 'blog', 1, 'stipino_500x500.jpg', '0000-00-00', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(2, 'Drugi blog post stipino', 'ovo-je-moj-drugi-blog-post', '<p>Into tj. kratki opis za blog post</p>', '<p style="margin-bottom: 15px; padding: 0px; text-align: justify; font-family: " open="" sans",="" arial,="" sans-serif;"="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quam dolor, egestas sed sapien vel, eleifend porttitor dui. Morbi massa velit, dictum vitae condimentum id, placerat elementum urna. Nunc malesuada magna id erat imperdiet, eget congue ex ultrices. Nulla sit amet consectetur lorem. Sed rutrum lobortis purus, eu varius nisi porta at. Nulla vel est turpis. Pellentesque suscipit suscipit tellus a facilisis. Vestibulum placerat varius blandit. In viverra mauris eget purus iaculis, tristique blandit orci consectetur. Cras pharetra placerat magna, vitae interdum lorem dignissim vitae. Donec sit amet molestie quam. Aenean ipsum lorem, luctus a malesuada accumsan, dictum a libero. Ut dignissim, massa eu ultrices elementum, dolor erat ullamcorper magna, in tincidunt elit mauris non dui. Phasellus non sollicitudin est.</p><p style="margin-bottom: 15px; padding: 0px; text-align: justify; font-family: " open="" sans",="" arial,="" sans-serif;"="">Mauris et vehicula purus, nec imperdiet enim. Pellentesque varius mi arcu, ac scelerisque lacus tristique vel. Pellentesque lobortis hendrerit sapien eu sollicitudin. Phasellus accumsan, sem ac rhoncus ornare, erat tortor eleifend ipsum, non sodales nisi ante varius tortor. Proin mollis dapibus dolor sed scelerisque. Sed condimentum lobortis lorem, id dignissim lectus. Praesent fermentum enim vel neque hendrerit consequat. In sed malesuada metus, sit amet pretium enim. Praesent ac velit et elit auctor gravida. Proin iaculis condimentum commodo. Aliquam pharetra, metus gravida fermentum placerat, augue dui scelerisque est, sit amet pulvinar tellus quam ut dui.</p><p style="margin-bottom: 15px; padding: 0px; text-align: justify; font-family: " open="" sans",="" arial,="" sans-serif;"="">Curabitur nulla massa, molestie et tortor quis, imperdiet imperdiet lacus. Maecenas in tristique ligula. Cras semper non orci at lacinia. Quisque dapibus et tortor elementum molestie. Nam at imperdiet nisl. Pellentesque dignissim fringilla eros, nec feugiat odio aliquam at. Phasellus id tempor nisl, ac cursus metus. In hac habitasse platea dictumst. Sed sit amet sapien odio. Aenean at ipsum porttitor urna congue consequat at non sapien. Nullam varius lobortis arcu, non tempor augue euismod eu.</p>', 1, 'blog', 1, 'stipino_500x500.jpg', '0000-00-00', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(3, 'Treći blog post stipino', 'treci-blog-post-stipino', '<p>Into tj. kratki opis za blog post</p>', '<p style="margin-bottom: 15px; padding: 0px; text-align: justify; font-family: " open="" sans",="" arial,="" sans-serif;"="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quam dolor, egestas sed sapien vel, eleifend porttitor dui. Morbi massa velit, dictum vitae condimentum id, placerat elementum urna. Nunc malesuada magna id erat imperdiet, eget congue ex ultrices. Nulla sit amet consectetur lorem. Sed rutrum lobortis purus, eu varius nisi porta at. Nulla vel est turpis. Pellentesque suscipit suscipit tellus a facilisis. Vestibulum placerat varius blandit. In viverra mauris eget purus iaculis, tristique blandit orci consectetur. Cras pharetra placerat magna, vitae interdum lorem dignissim vitae. Donec sit amet molestie quam. Aenean ipsum lorem, luctus a malesuada accumsan, dictum a libero. Ut dignissim, massa eu ultrices elementum, dolor erat ullamcorper magna, in tincidunt elit mauris non dui. Phasellus non sollicitudin est.</p><p style="margin-bottom: 15px; padding: 0px; text-align: justify; font-family: " open="" sans",="" arial,="" sans-serif;"="">Mauris et vehicula purus, nec imperdiet enim. Pellentesque varius mi arcu, ac scelerisque lacus tristique vel. Pellentesque lobortis hendrerit sapien eu sollicitudin. Phasellus accumsan, sem ac rhoncus ornare, erat tortor eleifend ipsum, non sodales nisi ante varius tortor. Proin mollis dapibus dolor sed scelerisque. Sed condimentum lobortis lorem, id dignissim lectus. Praesent fermentum enim vel neque hendrerit consequat. In sed malesuada metus, sit amet pretium enim. Praesent ac velit et elit auctor gravida. Proin iaculis condimentum commodo. Aliquam pharetra, metus gravida fermentum placerat, augue dui scelerisque est, sit amet pulvinar tellus quam ut dui.</p><p style="margin-bottom: 15px; padding: 0px; text-align: justify; font-family: " open="" sans",="" arial,="" sans-serif;"="">Curabitur nulla massa, molestie et tortor quis, imperdiet imperdiet lacus. Maecenas in tristique ligula. Cras semper non orci at lacinia. Quisque dapibus et tortor elementum molestie. Nam at imperdiet nisl. Pellentesque dignissim fringilla eros, nec feugiat odio aliquam at. Phasellus id tempor nisl, ac cursus metus. In hac habitasse platea dictumst. Sed sit amet sapien odio. Aenean at ipsum porttitor urna congue consequat at non sapien. Nullam varius lobortis arcu, non tempor augue euismod eu.</p>', 1, 'blog', 1, 'stipino_500x500.jpg', '0000-00-00', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(4, 'Četvrti blog post stipino', 'ovo-je-moj-cetvrti-blog-post', '<p>Into tj. kratki opis za blog post</p>', '<p style="margin-bottom: 15px; padding: 0px; text-align: justify; font-family: " open="" sans",="" arial,="" sans-serif;"="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quam dolor, egestas sed sapien vel, eleifend porttitor dui. Morbi massa velit, dictum vitae condimentum id, placerat elementum urna. Nunc malesuada magna id erat imperdiet, eget congue ex ultrices. Nulla sit amet consectetur lorem. Sed rutrum lobortis purus, eu varius nisi porta at. Nulla vel est turpis. Pellentesque suscipit suscipit tellus a facilisis. Vestibulum placerat varius blandit. In viverra mauris eget purus iaculis, tristique blandit orci consectetur. Cras pharetra placerat magna, vitae interdum lorem dignissim vitae. Donec sit amet molestie quam. Aenean ipsum lorem, luctus a malesuada accumsan, dictum a libero. Ut dignissim, massa eu ultrices elementum, dolor erat ullamcorper magna, in tincidunt elit mauris non dui. Phasellus non sollicitudin est.</p><p style="margin-bottom: 15px; padding: 0px; text-align: justify; font-family: " open="" sans",="" arial,="" sans-serif;"="">Mauris et vehicula purus, nec imperdiet enim. Pellentesque varius mi arcu, ac scelerisque lacus tristique vel. Pellentesque lobortis hendrerit sapien eu sollicitudin. Phasellus accumsan, sem ac rhoncus ornare, erat tortor eleifend ipsum, non sodales nisi ante varius tortor. Proin mollis dapibus dolor sed scelerisque. Sed condimentum lobortis lorem, id dignissim lectus. Praesent fermentum enim vel neque hendrerit consequat. In sed malesuada metus, sit amet pretium enim. Praesent ac velit et elit auctor gravida. Proin iaculis condimentum commodo. Aliquam pharetra, metus gravida fermentum placerat, augue dui scelerisque est, sit amet pulvinar tellus quam ut dui.</p><p style="margin-bottom: 15px; padding: 0px; text-align: justify; font-family: " open="" sans",="" arial,="" sans-serif;"="">Curabitur nulla massa, molestie et tortor quis, imperdiet imperdiet lacus. Maecenas in tristique ligula. Cras semper non orci at lacinia. Quisque dapibus et tortor elementum molestie. Nam at imperdiet nisl. Pellentesque dignissim fringilla eros, nec feugiat odio aliquam at. Phasellus id tempor nisl, ac cursus metus. In hac habitasse platea dictumst. Sed sit amet sapien odio. Aenean at ipsum porttitor urna congue consequat at non sapien. Nullam varius lobortis arcu, non tempor augue euismod eu.</p>', 1, 'blog', 1, 'stipino_500x500.jpg', '0000-00-00', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(5, 'Peti blog post stipino', 'ovo-je-moj-peti-blog-post', '<p>Into tj. kratki opis za blog post</p>', '<p style="margin-bottom: 15px; padding: 0px; text-align: justify; font-family: " open="" sans",="" arial,="" sans-serif;"="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quam dolor, egestas sed sapien vel, eleifend porttitor dui. Morbi massa velit, dictum vitae condimentum id, placerat elementum urna. Nunc malesuada magna id erat imperdiet, eget congue ex ultrices. Nulla sit amet consectetur lorem. Sed rutrum lobortis purus, eu varius nisi porta at. Nulla vel est turpis. Pellentesque suscipit suscipit tellus a facilisis. Vestibulum placerat varius blandit. In viverra mauris eget purus iaculis, tristique blandit orci consectetur. Cras pharetra placerat magna, vitae interdum lorem dignissim vitae. Donec sit amet molestie quam. Aenean ipsum lorem, luctus a malesuada accumsan, dictum a libero. Ut dignissim, massa eu ultrices elementum, dolor erat ullamcorper magna, in tincidunt elit mauris non dui. Phasellus non sollicitudin est.</p><p style="margin-bottom: 15px; padding: 0px; text-align: justify; font-family: " open="" sans",="" arial,="" sans-serif;"="">Mauris et vehicula purus, nec imperdiet enim. Pellentesque varius mi arcu, ac scelerisque lacus tristique vel. Pellentesque lobortis hendrerit sapien eu sollicitudin. Phasellus accumsan, sem ac rhoncus ornare, erat tortor eleifend ipsum, non sodales nisi ante varius tortor. Proin mollis dapibus dolor sed scelerisque. Sed condimentum lobortis lorem, id dignissim lectus. Praesent fermentum enim vel neque hendrerit consequat. In sed malesuada metus, sit amet pretium enim. Praesent ac velit et elit auctor gravida. Proin iaculis condimentum commodo. Aliquam pharetra, metus gravida fermentum placerat, augue dui scelerisque est, sit amet pulvinar tellus quam ut dui.</p><p style="margin-bottom: 15px; padding: 0px; text-align: justify; font-family: " open="" sans",="" arial,="" sans-serif;"="">Curabitur nulla massa, molestie et tortor quis, imperdiet imperdiet lacus. Maecenas in tristique ligula. Cras semper non orci at lacinia. Quisque dapibus et tortor elementum molestie. Nam at imperdiet nisl. Pellentesque dignissim fringilla eros, nec feugiat odio aliquam at. Phasellus id tempor nisl, ac cursus metus. In hac habitasse platea dictumst. Sed sit amet sapien odio. Aenean at ipsum porttitor urna congue consequat at non sapien. Nullam varius lobortis arcu, non tempor augue euismod eu.</p>', 1, 'blog', 1, 'stipino_500x500.jpg', '0000-00-00', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(6, 'O nama', 'o-nama', '<p>Into tj. kratki opis za blog post</p>', '<section id="about-header">\n        <video id="bgvid" playsinline="" loop="">\n            <!-- WCAG general accessibility recommendation is that media such as background video play through only once. Loop turned on for the purposes of illustration; if removed, the end of the video will fade in the same way created by pressing the "Pause" button  -->\n            <source src="video/stipo.webm" type="video/webm">\n        </video>\n        <div class="about-title">\n            <h1>O nama</h1>\n        </div>\n        <a href="#" title="Play video" class="play"></a>\n    </section>\n    <section id="about-main-text">\n        <div class="container">\n            <div class="row">\n                <h2>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt. Aliquam elit ante, malesuada id, tempor eu, gravida id, odio.</h2>\n            </div>\n        </div>\n    </section>\n    <section id="about-story">\n        <div class="container">\n            <div class="row">\n                <h3 class="text-center">Kako je sve počelo?</h3>\n                <div class="col-md-6 text-center">\n                    <img src="img/frontend/blog/stipo-post.jpg">\n                </div>\n                <div class="col-md-6">\n                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt.\n                        <br>\n                        <br>Aliquam elit ante, malesuada id, tempor eu, gravida id, odio. Maecenas suscipit, risus et eleifend imperdiet. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt.\n                    </p>\n                </div>\n                <div class="col-md-12">\n                    <h3>Kako se nastavilo</h3>\n                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt.\n                        <br>\n                        <br>Aliquam elit ante, malesuada id, tempor eu, gravida id, odio. Maecenas suscipit, risus et eleifend imperdiet. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt.</p>\n                </div>\n                <div class="col-md-12">\n                    <h3>I onda je krenulo drukcije</h3>\n                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt.</p>\n                </div>\n                <div class="col-md-6">\n                    <div class="col-md-12 videowrapper">\n                        <iframe width="560" height="350" src="https://www.youtube.com/embed/9sEI1AUFJKw" frameborder="0" allowfullscreen=""></iframe>\n                    </div>\n                </div>\n                <div class="col-md-6">\n                    <div class="col-md-12 videowrapper">\n                        <iframe width="560" height="350" src="https://www.youtube.com/embed/e6EkA19TTis" frameborder="0" allowfullscreen=""></iframe>\n                    </div>\n                </div>\n                <div class="col-md-12">\n                    <p>Aliquam elit ante, malesuada id, tempor eu, gravida id, odio. Maecenas suscipit, risus et eleifend imperdiet. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt.</p>\n                </div>\n            </div>\n        </div>\n    </section>\n    <section id="about-videowell">\n        <div class="container-video">\n            <div class="row">\n                <div class="col-md-4">\n                    <div class="col-md-12 videowrapper">\n                        <iframe width="560" height="350" src="https://www.youtube.com/embed/9sEI1AUFJKw" frameborder="0" allowfullscreen=""></iframe>\n                    </div>\n                </div>\n                <div class="col-md-4">\n                    <div class="col-md-12 videowrapper">\n                        <iframe width="560" height="350" src="https://www.youtube.com/embed/e6EkA19TTis" frameborder="0" allowfullscreen=""></iframe>\n                    </div>\n                </div>\n                <div class="col-md-4">\n                    <div class="col-md-12 videowrapper">\n                        <iframe width="560" height="350" src="https://www.youtube.com/embed/9sEI1AUFJKw" frameborder="0" allowfullscreen=""></iframe>\n                    </div>\n                </div>\n            </div>\n        </div>\n    </section>\n    <section id="about-endword">\n        <div class="container">\n            <div class="row">\n                <div class="col-md-12">\n                    <p>Aliquam elit ante, malesuada id, tempor eu, gravida id, odio. Maecenas suscipit, risus et eleifend imperdiet. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt.</p>\n                </div>\n            </div>\n        </div>\n    </section>\n\n    <script>\n    var vid = document.getElementById("bgvid");\n    var pauseButton = document.querySelector("#about-header a");\n\n    function vidFade() {\n        vid.classList.add("stopfade");\n    }\n\n    vid.addEventListener("ended", function() {\n        // only functional if "loop" is removed \n        vid.pause();\n        // to capture IE10\n        vidFade();\n    });\n\n\n    pauseButton.addEventListener("click", function() {\n        vid.classList.toggle("stopfade");\n        if (vid.paused) {\n            vid.play();\n            pauseButton.innerHTML = "";\n        } else {\n            vid.pause();\n            pauseButton.innerHTML = "";\n        }\n    })\n    $(document).ready(function() {\n        var icon = $(".play");\n        icon.click(function() {\n            icon.toggleClass("active");\n            return false;\n        });\n    });\n    </script>', 0, 'page', 0, 'stipino_500x500.jpg', NULL, '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(7, 'Ovo je novija radionica', 'ovo-je-novija-radionica', 'Into tj. kratki opis za radionicu', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eu pellentesque odio, et ultrices dolor. Quisque iaculis iaculis nunc ut accumsan. Vivamus semper quam ac tortor auctor, nec dignissim quam tincidunt. Mauris maximus dolor eu quam eleifend congue. Nulla facilisi. Phasellus at est ac nunc vehicula egestas. </p>', 0, 'workshop', 0, 'stipino_500x500.jpg', '2016-11-10', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(8, 'Naslov ove radionice', 'poveznica-ove-radionice', 'Into tj. kratki opis za radionicu', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eu pellentesque odio, et ultrices dolor. Quisque iaculis iaculis nunc ut accumsan. Vivamus semper quam ac tortor auctor, nec dignissim quam tincidunt. Mauris maximus dolor eu quam eleifend congue. Nulla facilisi. Phasellus at est ac nunc vehicula egestas. </p>', 0, 'workshop', 1, 'stipino_500x500.jpg', '2016-11-23', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(9, 'Zadnja radionica', 'zadnja-radionica', 'Into tj. kratki opis za radionicu', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eu pellentesque odio, et ultrices dolor. Quisque iaculis iaculis nunc ut accumsan. Vivamus semper quam ac tortor auctor, nec dignissim quam tincidunt. Mauris maximus dolor eu quam eleifend congue. Nulla facilisi. Phasellus at est ac nunc vehicula egestas. </p>', 0, 'workshop', 0, 'stipino_500x500.jpg', '2016-12-05', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(10, 'Kontakt', 'kontakt', 'Kratki opis', '\n        <div class="contact-header-title">\n            <p>Kontakt</p>\n        </div>\n        <div class="container contact-form-position">\n            <div class="row  ">\n                <div class="col-md-8 contact-form-padding">\n                    <div>\n                        <input class="form-control" type="text" value="Ime i prezime" id="example-text-input">\n                    </div>\n                    <div>\n                        <input class="form-control" type="email" value="Email" id="example-email-input">\n                    </div>\n                    <div>\n                        <input class="form-control" type="tel" value="Broj telefona" id="example-tel-input">\n                    </div>\n                    <div>\n                        <input class="form-control contact-form-comment-input" type="text" value="Komentar" id="example-text-input">\n                    </div>\n                </div>\n                <div class="col-md-4 contact-form-padding contact-padding-top">\n                    <div class="row contact-icon-top-margin ">\n                        <div class="col-md-3 col-xs-3 contact-icons-size"><i style="padding-top:25px;" class="fa fa-map-signs" aria-hidden="true"></i></div>\n                        <div class="col-md-9 col-xs-9">\n                            <div>\n                                <p class="contact-icon-text-size">Adresa</p>\n                                <p class="contact-icon-top-margin contact-icon-text-discription">OPG Stjepan Dumancic Tomin Put 1, Ceminac 31325</p>\n                            </div>\n                        </div>\n                    </div>\n                    <div class="row contact-icon-top-margin ">\n                        <div class="col-md-3 col-xs-3 contact-icons-size"><i style="padding-left:5px;" class="fa fa-phone" aria-hidden="true"></i></div>\n                        <div class="col-md-9 col-xs-9">\n                            <div>\n                                <p class="contact-icon-text-size">Mobitel</p>\n                                <p class="contact-icon-top-margin contact-icon-text-discription">+385 99 817 3880</p>\n                            </div>\n                        </div>\n                    </div>\n                    <div class="row contact-icon-top-margin ">\n                        <div class="col-md-3 col-xs-3 contact-icons-size"><i class="fa fa-envelope" aria-hidden="true"></i></div>\n                        <div class="col-md-9 col-xs-9">\n                            <div>\n                                <p class="contact-icon-text-size">E-mail</p>\n                                <p class="contact-icon-top-margin contact-icon-text-discription">info@stipino.com</p>\n                            </div>\n                        </div>\n                    </div>\n                    <div class="row contact-icon-top-margin ">\n                        <div class="col-md-3 col-xs-3 contact-icons-size"><i class="fa fa-skype" aria-hidden="true"></i></div>\n                        <div class="col-md-9 col-xs-9">\n                            <div>\n                                <p class="contact-icon-text-size">Skype</p>\n                                <p class="contact-icon-top-margin contact-icon-text-discription">stjepan.dumancic</p>\n                            </div>\n                        </div>\n                    </div>\n                    <div class="row contact-icon-top-margin ">\n                        <div class="col-md-3 col-xs-3 contact-icons-size"><i class="fa fa-facebook-official" aria-hidden="true"></i> </div>\n                        <div class="col-md-9 col-xs-9">\n                            <div>\n                                <p class="contact-icon-text-size">FB fan page</p>\n                                <p class="contact-icon-top-margin contact-icon-text-discription">www.facebook.com/stipinooo</p>\n                            </div>\n                        </div>\n                    </div>\n                    <div class="row contact-icon-top-margin ">\n                        <div class="col-md-3 col-xs-3 contact-icons-size"><i style="padding-left:5px;" class="fa fa-map-marker" aria-hidden="true"></i> </div>\n                        <div class="col-md-9 col-xs-9">\n                            <div>\n                                <p class="contact-icon-text-size">Lokacija(lon,lat)</p>\n                                <p class="contact-icon-top-margin contact-icon-text-discription">https://goo.gl/AcpqIL</p>\n                            </div>\n                        </div>\n                    </div>\n                </div>\n            </div>\n            <div class="contact-button-div-margin">\n                <button class="contact-form-send-button">Pošalji!</button>\n            </div>\n        </div>\n        <div class="container">\n            <div id="map" class="contact-gm-size"></div>\n        </div>\n         <script>\n        (function(i, s, o, g, r, a, m) {\n            i["GoogleAnalyticsObject"] = r;\n            i[r] = i[r] || function() {\n                (i[r].q = i[r].q || []).push(arguments)\n            }, i[r].l = 1 * new Date();\n            a = s.createElement(o),\n                m = s.getElementsByTagName(o)[0];\n            a.async = 1;\n            a.src = g;\n            m.parentNode.insertBefore(a, m)\n        })(window, document, "script", "https://www.google-analytics.com/analytics.js", "ga");\n\n        ga("create", "UA-2555128-15", "auto");\n        ga("send", "pageview");\n        </script>\n         \n        <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>\n    </div>\n    <script>\n    function initMap() {\n        var uluru = {\n            lat: 45.6699994,\n            lng: 18.6730698\n        };\n        var map = new google.maps.Map(document.getElementById("map"), {\n            zoom: 16,\n            center: uluru\n        });\n        var marker = new google.maps.Marker({\n            position: uluru,\n            map: map\n        });\n    }\n    </script>\n    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1lTu-PZf-pmNGVuSvX4Dm7-svk6_MWOw&callback=initMap">\n    </script>', 0, 'page', 0, 'stipino_500x500.jpg', NULL, '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(11, 'Smještaj', 'smjestaj', '<p>Into tj. kratki opis za blog post</p>', '<section id="about-header">\n        <video id="bgvid" playsinline="" loop="">\n            <!-- WCAG general accessibility recommendation is that media such as background video play through only once. Loop turned on for the purposes of illustration; if removed, the end of the video will fade in the same way created by pressing the "Pause" button  -->\n            <source src="video/stipo.webm" type="video/webm">\n        </video><div class="container">\n        <div class="about-title">\n            <h1>Smještaj</h1>\n        </div></div>\n        <a href="#" title="Play video" class="play"></a>\n    </section>\n    <section id="about-main-text">\n        <div class="container">\n            <div class="row">\n                <h2>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt. Aliquam elit ante, malesuada id, tempor eu, gravida id, odio.</h2>\n            </div>\n        </div>\n    </section>\n    <section id="about-story">\n        <div class="container">\n            <div class="row">\n                <h3 class="text-center">Kako je sve počelo?</h3>\n                <div class="col-md-6 text-center">\n                    <img src="img/frontend/blog/stipo-post.jpg">\n                </div>\n                <div class="col-md-6">\n                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt.\n                        <br>\n                        <br>Aliquam elit ante, malesuada id, tempor eu, gravida id, odio. Maecenas suscipit, risus et eleifend imperdiet. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt.\n                    </p>\n                </div>\n                <div class="col-md-12">\n                    <h3>Kako se nastavilo</h3>\n                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt.\n                        <br>\n                        <br>Aliquam elit ante, malesuada id, tempor eu, gravida id, odio. Maecenas suscipit, risus et eleifend imperdiet. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt.</p>\n                </div>\n                <div class="col-md-12">\n                    <h3>I onda je krenulo drukcije</h3>\n                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt.</p>\n                </div>\n                <div class="col-md-6">\n                    <div class="col-md-12 videowrapper">\n                        <iframe width="560" height="350" src="https://www.youtube.com/embed/9sEI1AUFJKw" frameborder="0" allowfullscreen=""></iframe>\n                    </div>\n                </div>\n                <div class="col-md-6">\n                    <div class="col-md-12 videowrapper">\n                        <iframe width="560" height="350" src="https://www.youtube.com/embed/e6EkA19TTis" frameborder="0" allowfullscreen=""></iframe>\n                    </div>\n                </div>\n                <div class="col-md-12">\n                    <p>Aliquam elit ante, malesuada id, tempor eu, gravida id, odio. Maecenas suscipit, risus et eleifend imperdiet. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt.</p>\n                </div>\n            </div>\n        </div>\n    </section>\n    <section id="about-videowell">\n        <div class="container-video">\n            <div class="row">\n                <div class="col-md-4">\n                    <div class="col-md-12 videowrapper">\n                        <iframe width="560" height="350" src="https://www.youtube.com/embed/9sEI1AUFJKw" frameborder="0" allowfullscreen=""></iframe>\n                    </div>\n                </div>\n                <div class="col-md-4">\n                    <div class="col-md-12 videowrapper">\n                        <iframe width="560" height="350" src="https://www.youtube.com/embed/e6EkA19TTis" frameborder="0" allowfullscreen=""></iframe>\n                    </div>\n                </div>\n                <div class="col-md-4">\n                    <div class="col-md-12 videowrapper">\n                        <iframe width="560" height="350" src="https://www.youtube.com/embed/9sEI1AUFJKw" frameborder="0" allowfullscreen=""></iframe>\n                    </div>\n                </div>\n            </div>\n        </div>\n    </section>\n    <section id="about-endword">\n        <div class="container">\n            <div class="row">\n                <div class="col-md-12">\n                    <p>Aliquam elit ante, malesuada id, tempor eu, gravida id, odio. Maecenas suscipit, risus et eleifend imperdiet. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt.</p>\n                </div>\n            </div>\n        </div>\n    </section>\n\n    <script>\n    var vid = document.getElementById("bgvid");\n    var pauseButton = document.querySelector("#about-header a");\n\n    function vidFade() {\n        vid.classList.add("stopfade");\n    }\n\n    vid.addEventListener("ended", function() {\n        // only functional if "loop" is removed \n        vid.pause();\n        // to capture IE10\n        vidFade();\n    });\n\n\n    pauseButton.addEventListener("click", function() {\n        vid.classList.toggle("stopfade");\n        if (vid.paused) {\n            vid.play();\n            pauseButton.innerHTML = "";\n        } else {\n            vid.pause();\n            pauseButton.innerHTML = "";\n        }\n    })\n    $(document).ready(function() {\n        var icon = $(".play");\n        icon.click(function() {\n            icon.toggleClass("active");\n            return false;\n        });\n    });\n    </script>', 0, 'page', 0, 'stipino_500x500.jpg', NULL, '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(12, 'Ovo je prvi blitzpost', 'ovo-je-prvi-blitzpost', 'Ovo je uvod za prvi blitzpost', '', 0, 'blitzpost', 1, '', NULL, '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(13, 'Ovo je drugi blitzpost', 'ovo-je-drugi-blitzpost', 'Ovo je uvod za drugi blitzpost', '', 0, 'blitzpost', 1, '', NULL, '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(14, 'Ovo je treci blitzpost', 'ovo-je-treci-blitzpost', 'Ovo je uvod za treci blitzpost', '', 0, 'blitzpost', 1, '', NULL, '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `interactions`
--

CREATE TABLE IF NOT EXISTS `interactions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `price` float(8,2) NOT NULL,
  `note` text NOT NULL,
  `message` text NOT NULL,
  `order_date` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `interactions`
--

INSERT INTO `interactions` (`id`, `user_id`, `order_id`, `type`, `price`, `note`, `message`, `order_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, '', 'Napomena', 0.00, 'QWEQWE', '', '0000-00-00', '2016-11-23 22:28:20', '2016-11-23 22:28:20', NULL),
(2, 2, '', 'Napomena', 0.00, 'EEEEEEE', '', '0000-00-00', '2016-11-23 22:28:34', '2016-11-23 22:28:34', NULL),
(10, 2, '1', 'Prodaja', 1030.00, '', '', '2016-11-23', '2016-11-24 13:12:46', '2016-11-24 13:12:46', NULL),
(4, 2, '', 'Napomena', 0.00, 'Lorem ipsum somet ar hocem net sikuus profema. Lorem ipsum somet ar hocem net sikuus profema. Lorem ipsum somet ar hocem net sikuus profema. Lorem ipsum somet ar hocem net sikuus profema. Lorem ipsum somet ar hocem net sikuus profema. Lorem ipsum somet ar hocem net sikuus profema. Lorem ipsum somet ar hocem net sikuus profema. Lorem ipsum somet ar hocem net sikuus profema. Lorem ipsum somet ar hocem net sikuus profema. Lorem ipsum somet ar hocem net sikuus profema. Lorem ipsum somet ar hocem net sikuus profema. Lorem ipsum somet ar hocem net sikuus profema. Lorem ipsum somet ar hocem net sikuus profema.', '', '0000-00-00', '2016-11-23 22:31:15', '2016-11-23 22:31:15', NULL),
(5, 2, '', 'Napomena', 0.00, 'Lorem ipsum somet ar hocem net sikuus profema. Lorem ipsum somet ar hocem net sikuus profema. Lorem ipsum somet ar hocem net sikuus profema. Lorem ipsum somet ar hocem net siku', '', '0000-00-00', '2016-11-23 22:32:05', '2016-11-23 22:32:05', NULL),
(6, 2, '', 'Napomena', 0.00, 'asfsadf', '', '0000-00-00', '2016-11-23 22:32:27', '2016-11-23 22:32:27', NULL),
(11, 8, '2', 'Prodaja', 0.00, '', '', '2016-11-27', '2016-11-27 01:43:42', '2016-11-27 01:43:42', NULL),
(12, 88, '25', 'Prodaja', 1500.00, '', '', '2016-12-10', '2016-12-10 13:44:43', '2016-12-10 13:44:43', NULL),
(13, 6, '26', 'Prodaja', 2500.00, '', '', '2016-12-10', '2016-12-10 14:37:40', '2016-12-10 14:37:40', NULL),
(14, 2, '27', 'Prodaja', 1600.00, '', '', '2016-12-10', '2016-12-10 14:37:53', '2016-12-10 14:37:53', NULL),
(15, 2, '28', 'Prodaja', 3000.00, '', '', '2016-12-10', '2016-12-10 14:38:25', '2016-12-10 14:38:25', NULL),
(16, 371, '', 'Napomena', 0.00, 'Ovo je napomena', '', '0000-00-00', '2016-12-11 02:42:32', '2016-12-11 02:42:32', NULL),
(17, 371, '29', 'Prodaja', 30000.00, '', '', '2016-12-11', '2016-12-11 02:43:38', '2016-12-11 02:43:38', NULL),
(18, 371, '', 'Napomena', 0.00, 'Ovo je napomena', '', '0000-00-00', '2016-12-11 03:51:12', '2016-12-11 03:51:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `iso_tag` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `local_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `languages_iso_tag_unique` (`iso_tag`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `iso_tag`, `language`, `local_name`, `created_at`, `updated_at`) VALUES
(1, 'en', 'English', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(2, 'hr', 'Croatian', 'Hrvatski', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(3, 'de', 'German', 'Deutsch', '2016-11-23 18:25:37', '2016-11-23 18:25:37');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permalink` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `permalink`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '', 'b137fdd1f79d56c.jpg', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2016_06_28_165421_all_migrations', 1),
('2016_07_07_014132_create_session_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` float(8,2) NOT NULL,
  `shipping_way` varchar(255) NOT NULL,
  `payment_way` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `billing_address` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `order_date` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `user_id`, `price`, `shipping_way`, `payment_way`, `payment_status`, `shipping_address`, `billing_address`, `note`, `order_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(29, '4', 371, 30000.00, 'stipino', 'pouzecu', 'zavrseno', 'Savska 81, 10000 Zagreb', 'Savska 81, 10000 Zagreb', '', '2016-12-11', '2016-12-11 02:43:38', '2016-12-11 02:43:38', NULL),
(28, '3', 2, 3000.00, 'stipino', 'pouzecu', 'zavrseno', 'Srijemska 53, 31000 Osijek', 'Srijemska 53, 31000 Osijek', '', '2016-12-10', '2016-12-10 14:38:25', '2016-12-10 14:38:25', NULL),
(27, '2', 2, 1600.00, 'stipino', 'pouzecu', 'zavrseno', 'Srijemska 53, 31000 Osijek', 'Srijemska 53, 31000 Osijek', '', '2016-12-10', '2016-12-10 14:37:53', '2016-12-10 14:37:53', NULL),
(25, '0', 88, 1500.00, 'stipino', 'pouzecu', 'zavrseno', 'Vijenac Ivana Meštrovića 68a, 31000 Osijek', 'Vijenac Ivana Meštrovića 68a, 31000 Osijek', 'Ovo je napomena', '2016-12-10', '2016-12-10 13:44:43', '2016-12-10 13:44:43', NULL),
(26, '1', 6, 2500.00, 'stipino', 'pouzecu', 'zavrseno', 'Š. Petefija 11, 31000 Osijek', 'Š. Petefija 11, 31000 Osijek', '', '2016-12-10', '2016-12-10 14:37:40', '2016-12-10 14:37:40', NULL),
(30, '5', 6, 60.00, 'stipino', 'virman', 'procesuiranje', 'Zelena ulica 365, 31000 Osijek', 'Zelena ulica 365, 31000 Osijek', '', '2016-12-11', '2016-12-11 12:35:00', '2016-12-11 15:35:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE IF NOT EXISTS `orders_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float(8,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `orders_products`
--

INSERT INTO `orders_products` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(47, 29, 1, 1000, 30.00, '2016-12-11 02:43:38', '2016-12-11 02:43:38', NULL),
(46, 28, 11, 100, 30.00, '2016-12-10 14:38:25', '2016-12-10 14:38:25', NULL),
(45, 27, 12, 20, 50.00, '2016-12-10 14:37:53', '2016-12-10 14:37:53', NULL),
(44, 27, 3, 20, 30.00, '2016-12-10 14:37:53', '2016-12-10 14:37:53', NULL),
(43, 26, 8, 20, 50.00, '2016-12-10 14:37:40', '2016-12-10 14:37:40', NULL),
(42, 26, 1, 50, 30.00, '2016-12-10 14:37:40', '2016-12-10 14:37:40', NULL),
(41, 25, 1, 50, 30.00, '2016-12-10 13:44:43', '2016-12-10 13:44:43', NULL),
(49, 30, 5, 2, 30.00, '2016-12-11 15:35:11', '2016-12-11 15:35:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_links`
--

CREATE TABLE IF NOT EXISTS `password_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `permalink` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `password_reminders`
--

CREATE TABLE IF NOT EXISTS `password_reminders` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  KEY `password_reminders_email_index` (`email`),
  KEY `password_reminders_token_index` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE IF NOT EXISTS `permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_foreign` (`permission_id`),
  KEY `permission_role_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `permalink` varchar(255) NOT NULL,
  `product_weight` int(11) NOT NULL,
  `intro` text NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `sale_price` decimal(10,2) DEFAULT NULL,
  `manufacturing_price` decimal(10,2) NOT NULL,
  `onsale` int(11) DEFAULT NULL,
  `onstock` int(11) NOT NULL,
  `published` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `cover_image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `permalink`, `product_weight`, `intro`, `description`, `price`, `sale_price`, `manufacturing_price`, `onsale`, `onstock`, `published`, `image`, `cover_image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Gala Schnitzer Schniga', 'gala-schnitzer-schniga-4kg', 2, '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc pellentesque tortor sed nisi suscipit lobortis.', '30.00', NULL, '6.00', NULL, 0, 1, 'stipino_500x500.jpg', 'placeholder_1920x500.jpg', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(2, 'Top Red', 'top-red-8kg', 1, '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc pellentesque tortor sed nisi suscipit lobortis.', '50.00', NULL, '16.00', NULL, 0, 1, 'stipino_500x500.jpg', 'placeholder_1920x500.jpg', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(3, 'Fuji Kiku', 'fuji-kiku-8kg', 1, '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc pellentesque tortor sed nisi suscipit lobortis.', '50.00', NULL, '16.00', NULL, 0, 1, 'stipino_500x500.jpg', 'placeholder_1920x500.jpg', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(4, 'BiB 5L - Mutni', 'bib-5l-mutni-sok-5l', 3, '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc pellentesque tortor sed nisi suscipit lobortis.', '50.00', NULL, '25.00', NULL, 0, 1, 'stipino_500x500.jpg', 'placeholder_1920x500.jpg', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(5, 'BiB 5L - Bistri', 'bib-5l-bistri-sok-5l', 3, '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc pellentesque tortor sed nisi suscipit lobortis.', '50.00', NULL, '25.00', NULL, 0, 1, 'stipino_500x500.jpg', 'placeholder_1920x500.jpg', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(6, 'Gala Schnitzer Schniga', 'gala-schnitzer-schniga-8kg', 1, '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc pellentesque tortor sed nisi suscipit lobortis.', '50.00', NULL, '16.00', NULL, 0, 1, 'stipino_500x500.jpg', 'placeholder_1920x500.jpg', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(7, 'Fuji Kiku', 'fuji-kiku-4kg', 2, '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc pellentesque tortor sed nisi suscipit lobortis.', '30.00', NULL, '6.00', NULL, 0, 1, 'stipino_500x500.jpg', 'placeholder_1920x500.jpg', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(8, 'Top Red', 'top-red-4kg', 2, '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc pellentesque tortor sed nisi suscipit lobortis.', '30.00', NULL, '6.00', NULL, 0, 1, 'stipino_500x500.jpg', 'placeholder_1920x500.jpg', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(9, 'Prirodni jabučni ocat', 'prirodni-jabucni-ocat', 1, '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc pellentesque tortor sed nisi suscipit lobortis.', '25.00', NULL, '12.00', NULL, 0, 1, 'stipino_500x500.jpg', 'placeholder_1920x500.jpg', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(10, 'Pink Lady', 'pink-lady-1kg', 1, '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc pellentesque tortor sed nisi suscipit lobortis.', '65.00', NULL, '35.00', NULL, 1, 1, 'stipino_500x500.jpg', 'placeholder_1920x500.jpg', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(11, 'Orasi', 'orasi', 8, '<p>Domaći orasi, ručno oči&scaron;ćeni.</p>', '<p>Domaći orasi, ručno oči&scaron;ćeni.</p>', '50.00', '0.00', '25.00', 1, 1, 1, 'stipino_500x500.jpg', 'placeholder_1920x500.jpg', '2016-11-23 23:38:34', '2016-11-23 23:38:34', NULL),
(12, 'Lješnjaci', 'ljesnjaci', 8, '<p>Domaći i ručno či&scaron;ćeni lje&scaron;njaci.</p>', '<p>Domaći i ručno či&scaron;ćeni lje&scaron;njaci.</p>', '50.00', '0.00', '30.00', 1, 1, 1, 'stipino_500x500.jpg', 'placeholder_1920x500.jpg', '2016-11-23 23:40:41', '2016-11-23 23:40:41', NULL),
(13, 'Promo pekmez od jabuka DUO', 'promo-pekmez-od-jabuka-duo', 5, '<p>Dva prekrasna domaća pekmeza od jabuka. Svijetliji za svakodnevno kori&scaron;tenje, a tamniji je Božićno izdanje sa cimetom i dodanim mu&scaron;katnim ora&scaron;čićima.</p>', '<p>Dva prekrasna domaća pekmeza od jabuka. Svijetliji za svakodnevno kori&scaron;tenje, a tamniji je Božićno izdanje sa cimetom i dodanim mu&scaron;katnim ora&scaron;čićima.</p>', '30.00', '30.00', '7.00', 1, 1, 1, 'stipino_500x500.jpg', 'placeholder_1920x500.jpg', '2016-11-23 23:50:13', '2016-11-23 23:50:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products_categories`
--

CREATE TABLE IF NOT EXISTS `products_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_categories_product_id_foreign` (`product_id`),
  KEY `products_categories_category_id_foreign` (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_posts`
--

CREATE TABLE IF NOT EXISTS `product_posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `product_posts`
--

INSERT INTO `product_posts` (`id`, `product_id`, `blog_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(2, 1, 3, '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(3, 1, 5, '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(4, 2, 2, '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(5, 2, 3, '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(6, 3, 2, '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(7, 3, 3, '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(8, 3, 4, '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(9, 3, 5, '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(10, 4, 1, '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_weight`
--

CREATE TABLE IF NOT EXISTS `product_weight` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `product_weight` int(11) NOT NULL,
  `measure_unit` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `product_weight`
--

INSERT INTO `product_weight` (`id`, `title`, `product_weight`, `measure_unit`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '8 Kila', 8, 'kg', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(2, '4 Kila', 4, 'kg', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(3, 'BiB', 5, 'l', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(4, 'Teglica 314 ml', 314, 'ml', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(5, 'Teglica 370 ml', 370, 'ml', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(6, 'Teglica 212 ml', 212, 'ml', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(7, 'Boca 1 L', 1, 'l', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(8, '500 g', 500, 'g', '2016-11-23 23:36:49', '2016-11-23 23:36:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE IF NOT EXISTS `region` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `permalink` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `name`, `permalink`, `created_at`, `updated_at`) VALUES
(1, 'Zagrebačka županija', 'zagrebacka-zupanija', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(2, 'Krapinsko-zagorska županija', 'krapinsko-zagorska-zupanija', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(3, 'Sisačko-moslavačka županija', 'sisacko-moslavacka-zupanija', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(4, 'Karlovačka županija', 'karlovacka-zupanija', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(5, 'Varaždinska županija', 'varazdinska-zupanija', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(6, 'Koprivničko-križevačka županija', 'koprivnicko-krizevacka-zupanija', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(7, 'Bjelovarsko-bilogorska županija', 'bjelovarsko-bilogorska-zupanija', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(8, 'Primorsko-goranska županija', 'primorsko-goranska-zupanija', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(9, 'Ličko-senjska županija', 'licko-senjska-zupanija', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(10, 'Virovitičko-podravska županija', 'viroviticko-podravska-zupanija', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(11, 'Požeško-slavonska županija', 'pozesko-slavonska-zupanija', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(12, 'Brodsko-posavska županija', 'brodsko-posavska-zupanija', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(13, 'Zadarska županija', 'zadarska-zupanija', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(14, 'Osječko-baranjska županija', 'osjecko-baranjska-zupanija', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(15, 'Šibensko-kninska županija', 'sibensko-kninska-zupanija', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(16, 'Vukovarsko-srijemska županija', 'vukovarsko-srijemska-zupanija', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(17, 'Splitsko-dalmatinska županija', 'splitsko-dalmatinska-zupanija', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(18, 'Istarska županija', 'istarska-zupanija', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(19, 'Dubrovačko-neretvanska županija', 'dubrovacko-neretvanska-zupanija', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(20, 'Međimurska županija', 'medimurska-zupanija', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(21, 'Grad Zagreb', 'grad-zagreb', '2016-11-23 18:25:37', '2016-11-23 18:25:37');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(2, 'admin', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(3, 'manager', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(4, 'employee', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(5, 'user', '2016-11-23 18:25:37', '2016-11-23 18:25:37'),
(6, 'anonymous', '2016-11-23 18:25:37', '2016-11-23 18:25:37');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) NOT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `type` int(11) NOT NULL,
  `oib` int(11) NOT NULL,
  `block` varchar(50) NOT NULL,
  `contact_person` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `additional_phone` varchar(50) NOT NULL,
  `note` text NOT NULL,
  `permalink` varchar(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `user_group` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `additional_email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `city` int(11) NOT NULL,
  `region` int(11) NOT NULL,
  `date_of_birth` varchar(50) NOT NULL,
  `remember_token` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=372 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `type`, `oib`, `block`, `contact_person`, `phone`, `additional_phone`, `note`, `permalink`, `username`, `user_group`, `email`, `additional_email`, `password`, `address`, `area`, `city`, `region`, `date_of_birth`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Stipe', 'Dumančić', 0, 0, '', '', '', '', '', '', 'admin', 'admin', 'admin@gmail.com', '', '$2y$10$fETHDiyIQX6dW/2lMu4ms.m8UX.nfflcmL6X8.kmtUrqktty0wt8C', '', '', 0, 0, '', 'PmvTbiALIy1TV8Vm0ws4jUsc3Y2UXZOLKKrvqSLUvtTRT15hXoQaZYuIY1Yc', '2016-11-23 18:25:37', '2016-12-08 13:17:47', NULL),
(2, 'Dujo', 'Plazibat', 1, 0, '', '', '031 503 171', '', 'asfsadf', '', '', '1', '', '', '', 'Srijemska 53', '1', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 22:32:27', NULL),
(3, 'Marija', 'Luksar', 0, 0, '', '', '031212084', '', '', '', '', '', '', '', '', 'Trg Slobode 8', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(4, 'Ivan', 'Vajtner', 0, 0, '', '', '091 737 1664', '', '', '', '', '', 'ktominac@gmail.com', '', '', 'Gundulićeva 128', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(5, 'Juraj', 'Arambašić', 0, 0, '', '', '098420203', '', '', '', '', '', '', '', '', 'Ilirska 25', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(6, 'Davor', 'Alić', 0, 0, '', '', '098 229 878', '', '', '', '', '', 'davor.alic.os@gmail.com', '', '', 'Š. Petefija 11', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(7, 'Ksenija', 'Lugarić', 0, 0, '', '', '091/526-2616', '', '', '', '', '', '', '', '', 'Vladimira Nazora 6', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(8, 'Dina', 'Koprolčec', 0, 0, '', '', '098 711 840', '', '', '', '', '', 'dinaster5@gmail.com', '', '', 'Huttlerova 20 b', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(9, 'Dubravka', 'Šipoš', 0, 0, '', '', '099 271 7528', '', '', '', '', '', 'dubravka.sipos@gmail.com', '', '', 'Trogirska 11', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(10, 'Ana', 'Klasiček', 0, 0, '', '', '091 535 4432', '', '', '', '', '', '', '', '', 'Huttlerova 33 b', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(11, 'Antonija', 'Kristek-Janković', 0, 0, '', '', '095 8026469', '', '', '', '', '', 'antonijakj@gmail.com', '', '', 'Dubrovačka 10a', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(12, 'Danijela', 'Žugec', 0, 0, '', '', '091 551 9494', '', '', '', '', '', 'dnzugec@hotmail.com', '', '', 'Bogdanovačka 21', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(13, 'Alen', 'Linardic', 0, 2147483647, '', '', '091 567 4729', '', '', '', '', '', 'alen.linardic@hotmail.com', '', '', 'Mavrinci 24', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(14, 'Maja', 'Rogulja', 0, 0, '', '', '0917366140', '', '', '', '', '', '', '', '', 'Gunduliceva 23', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(15, 'Valent', 'Turković', 0, 0, '', '', '0913000606', '', '', '', '', '', '', '', '', 'Gundulićeva 5', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(16, 'Saša', 'Gvozdenović', 0, 0, '', '', '0995904075', '', '', '', '', '', 'sasa.gvozdenovic@os.t-com.hr', '', '', 'Kralja Petra Svačića 49', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(17, 'Ana', 'Brzica', 0, 0, '', '', '098 458 964', '', '', '', '', '', '', '', '', 'Sjenjak 49', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(18, 'Dario', 'Roguljić-Kompa', 0, 0, '', '', '095 199 9827', '', '', '', '', '', '', '', '', 'Osječka 178', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(19, 'Darija', 'Lukić', 0, 0, '', '', '099 200 97 05', '', '', '', '', '', 'lukicdarija@gmail.com', '', '', 'Vukovarska 42', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(20, 'ZORAN', 'VASILJ', 0, 0, '', '', '098 263 868', '', '', '', '', '', '', '', '', 'SV.ANE17', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(21, 'Josipa', 'Božić', 0, 0, '', '', '373-650', '', '', '', '', '', '', '', '', 'Ružina 15', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(22, 'Dubravka', 'Šipoš', 0, 0, '', '', '099 5045 790', '', '', '', '', '', 'dubravka.sipos@gmail.com', '', '', 'Trogirska 11', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(23, 'Katarina', 'Koščević', 0, 0, '', '', '0989647828', '', '', '', '', '', '', '', '', 'Sjenjak 101', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(24, 'Renata', 'Rikert', 0, 0, '', '', '0981876971', '', '', '', '', '', 'renata.rikert@gmail.com', '', '', 'Ilirska 95', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(25, 'Jurbina', 'Mama', 0, 0, '', '', '091 460 8150', '', '', '', '', '', '', '', '', 'Marjanska 49', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(26, 'Ivana', 'Frančić', 0, 0, '', '', '099 927 3392', '', '', '', '', '', 'francicka88@gmail.com', '', '', 'Prolaz Josipa Leovića 5', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(27, 'Darko', 'Boban', 0, 0, '', '', '098 200 121', '', '', '', '', '', '', '', '', 'Mlinska 60', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(28, 'Marin', 'Bašurić', 0, 0, '', '', '091 957 5836', '', '', '', '', '', '', '', '', 'Učka 8', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(29, 'Josipa', 'bogdan', 0, 0, '', '', '091 542 6197', '', '', '', '', '', 'Josipabogdan2402@gmail.com', '', '', 'Gornjodravska obala 98', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(30, 'Ivan', 'Kovač', 0, 0, '', '', '098 338 385', '', '', '', '', '', 'ivkovac@gmail.com', '', '', 'Bračka 86', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(31, 'Darija', 'Vrandečić', 0, 2147483647, '', '', '091 55 22 519', '', '', '', '', '', 'darija_vrandecic@net.hr', '', '', 'Put macela 21, Brač', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(32, 'Katalin', 'Juricne-Varnai', 0, 0, '', '', '099 406 76 46', '', '', '', '', '', 'varnaika@yahoo.com', '', '', 'Blatna 7 A', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(33, 'RENATA', 'HORVAT', 0, 0, '', '', '091 1790 242', '', '', '', '', '', 'renata.horvat2@gmail.com', '', '', 'OSJEČKA 48', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(34, 'ivan', 'brdar', 0, 2147483647, '', '', '095 90 455 32', '', '', '', '', '', 'i.brdar@rpv.hr', '', '', 'Vrh Martinšćice 43', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(35, 'Saša', 'Gvozdenović', 0, 0, '', '', '0913036036', '', '', '', '', '', 'sasa.gvozdenovic@os.t-com.hr', '', '', 'Kralja Petra Svačića 49', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(36, 'andreja', 'skugor', 0, 0, '', '', '091 507 1234', '', '', '', '', '', 'a.j.skugor@gmail.com', '', '', 'Dobra 34', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(37, 'NIKOLA', 'ŠULJUG', 0, 0, '', '', '099708 2267', '', '', '', '', '', '', '', '', 'ULICA JOHA 1', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(38, 'Marinko', 'Bašurić', 0, 0, '', '', '091 957 5836', '', '', '', '', '', 'marinko.basuric@gmail.com', '', '', 'Učka 8', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(39, 'Andrija', 'Vuković', 0, 0, '', '', '091 206 45 42', '', '', '', '', '', 'vukov777@gmail.com', '', '', 'Kestenova 12', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(40, 'Dejan', 'Labudović', 0, 0, '', '', '091 560 4814', '', '', '', '', '', 'dlabudov@gmail.com', '', '', 'J.J. Strossmayera 268', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(41, 'Dario', 'štimac', 0, 0, '', '', '098 376 087', '', '', '', '', '', 'dstimac@gmail.com', '', '', 'Dubrovačka 163', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(42, 'Jabuka', 'Lalić', 0, 0, '', '', '099 212 0012', '', '', '', '', '', '', '', '', 'Malin 30', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(43, 'Esad', 'Sejdić', 0, 0, '', '', '091 574 4800', '', '', '', '', '', 'esenzio@yahoo.com', '', '', 'Petefija 113', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(44, 'Damir', 'Ambrus', 0, 0, '', '', '091 177 7711', '', '', '', '', '', 'dambrus@lorijen.com', '', '', 'Gornjodravska 80', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(45, 'Daliborka', 'Veber', 0, 0, '', '', '099 696 1131', '', '', '', '', '', 'daciborka@gmail.com', '', '', 'Kralja Petra Svačića 16', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(46, 'Maja', 'Marinić', 0, 0, '', '', '091/569-88-66', '', '', '', '', '', '', '', '', 'Psunjska 109', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(47, 'Katarina', 'Majačić', 0, 0, '', '', '0989359805', '', '', '', '', '', 'katarina.majacic@gmail.com', '', '', 'Srijemska 67', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(48, 'Milan', 'Subotić', 0, 2147483647, '', '', '099 809 64 50', '', '', '', '', '', 'subotic.milan21@gmail.com', '', '', 'S.R.Njemačke 213', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(49, 'Ivan', 'Lozančić', 0, 0, '', '', '098 904 0151', '', '', '', '', '', 'Ilozancic@gmail.com', '', '', 'V.I.Mestrovica 23', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(50, 'Mirjana', 'Krnjaja', 0, 2147483647, '', '', '091 566 7799', '', '', '', '', '', 'thatgspot@gmail.com', '', '', 'Sukošanska 211', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(51, 'Helena', 'Frank', 0, 0, '', '', '095 300 0232', '', '', '', '', '', 'istvan.medjesi@gmail.com', '', '', 'Vatroslava Lisinskog 23', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(52, 'Tina', 'Javorović', 0, 0, '', '', '031565031', '', '', '', '', '', '', '', '', 'Trpanjska 11', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(53, 'IIvan', 'Gabrić', 0, 2147483647, '', '', '099 373 4316', '', '', '', '', '', 'ivan@gabric.hr', '', '', 'Bukovačka cesta 271', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(54, 'Lydia', 'Bilan', 0, 2147483647, '', '', '098 169 4349', '', '', '', '', '', 'lidija.bilan@hi.t-com.hr', '', '', 'Ive Čače 122', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(55, 'HNKmerketinga-i-prodaje)', 'u-Osijeku-(Služba-merketinga-i-prodaje)', 0, 0, '', '', '098 547 255', '', '', '', '', '', 'propaganda@hnk-osijek.hr', '', '', 'Županijska 9', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(56, 'ivana', 'hazenauer', 0, 0, '', '', '098 748 891', '', '', '', '', '', 'hazo.79@gmail.com', '', '', 'Kneza Trpimira 1a', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(57, 'Marijan', 'Kovač', 0, 0, '', '', '+385 98 9248 198', '', '', '', '', '', 'kovacarh@gmail.com', '', '', 'D.Cesarića 11a', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(58, 'Gabrijela', 'Bertić', 0, 0, '', '', '099 218 1512', '', '', '', '', '', '', '', '', 'Vukovarska 89', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(59, 'Donacije', 'podjela-jabuka', 0, 0, '', '', 'eqw', '', '', '', '', '', 'qwe', '', '', 'Vukovarska 22', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(60, 'sandra', 'rajc', 0, 0, '', '', '095-555-9918', '', '', '', '', '', 'ssklepic@net.hr', '', '', 'Divaltova 58', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(61, 'Velimir', 'Slovaček', 0, 0, '', '', '098 506 265', '', '', '', '', '', 'velimir.slovacek@odvjetnici.com', '', '', 'B. Kašića 34', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(62, 'Boris', 'Peterka', 0, 0, '', '', '091 210 3210', '', '', '', '', '', 'boris@studioat.hr', '', '', 'M. A. Reljkovića 1', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(63, 'Sanda', 'Ham', 0, 0, '', '', '091 510 1222', '', '', '', '', '', '', '', '', 'Europska Avenija 12', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(64, 'Frano', 'Pešut', 0, 0, '', '', '091 891 2725', '', '', '', '', '', 'frano.pesut@gmail.com', '', '', 'I. Gundulića 223', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(65, 'Snježana', 'Žiža', 0, 0, '', '', '031 573 050', '', '', '', '', '', '', '', '', 'Sjenjak 137', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(66, 'Vedran', 'Kurbalić', 0, 0, '', '', '091 569 0544', '', '', '', '', '', '', '', '', 'Sv.L.B. Mandića bb', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(67, 'Majda', 'Ukosić', 0, 0, '', '', '098 931 1879', '', '', '', '', '', '', '', '', 'G. Trombe bb', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(68, 'Sanja', 'Dogan', 0, 0, '', '', '098 93 44 308', '', '', '', '', '', 'sanja.dogan@gmail.com', '', '', 'Medulinska 5A', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(69, 'Drago', 'Kohn', 0, 0, '', '', '091 600 6319', '', '', '', '', '', '', '', '', 'I. Zajca 13', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(70, 'Katica', 'Mrkonjić', 0, 0, '', '', '099 251 5444', '', '', '', '', '', '', '', '', 'I. Zajca 9', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(71, 'Lidija', 'Prlić', 0, 0, '', '', '098 927 5198', '', '', '', '', '', '', '', '', 'Reisnerova 113', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(72, 'Ana', 'Martinović', 0, 0, '', '', '091 588 1508', '', '', '', '', '', 'martinovic.ana.os@gmail.com', '', '', 'Bračka 140', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(73, 'Marija', 'Karačić', 0, 0, '', '', '091 913 6567', '', '', '', '', '', 'kimcommerce1@net.hr', '', '', 'Vlašićka 19', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(74, 'Mirjana', 'Ferenčak', 0, 0, '', '', '0989795132', '', '', '', '', '', '', '', '', 'Županijska 1', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(75, 'Katarina', 'Bošnjak', 0, 0, '', '', '098372700', '', '', '', '', '', '', '', '', 'B. Radičevića 14', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(76, 'Tihana', 'Petrović', 0, 0, '', '', '098 185 3751', '', '', '', '', '', '', '', '', 'Sljemenska 62', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(77, 'Denis', 'Sušac', 0, 0, '', '', '091 762 6137', '', '', '', '', '', 'denis@mono.hr', '', '', 'Bihaćka 1d', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(78, 'Eduard', 'Kuzma', 0, 0, '', '', '099 225 5255', '', '', '', '', '', '', '', '', 'Našička 31a', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(79, 'Sanja', 'Klarić', 0, 0, '', '', '098 925 2567', '', '', '', '', '', '', '', '', 'Vij. V. Bukovca 10', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(80, 'Nikola', 'Šuljug', 0, 0, '', '', '099 708 2267', '', '', '', '', '', '', '', '', 'Joha 1', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(81, 'Maja', 'Diklić', 0, 0, '', '', '095 863 9018', '', '', '', '', '', 'majadiklic@gmail.com', '', '', 'Gundulićeva 103', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(82, 'Branka', 'Stipić', 0, 0, '', '', '098 547 255', '', '', '', '', '', 'branka.stipic@hnk-osijek.hr', '', '', 'Zvečevska 26', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(83, 'Lidija', 'Rancinger', 0, 0, '', '', '098 547 467', '', '', '', '', '', '', '', '', 'Dravska 6', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(84, 'Valentina', 'Grgić-Smoljo', 0, 0, '', '', '098 878 882', '', '', '', '', '', 'mody@net.hr', '', '', 'Franje Krežme 2', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(85, 'Andrej', 'Mlinarević', 0, 0, '', '', '095 514 7795', '', '', '', '', '', 'andrejmlinarevic@gmail.com', '', '', 'Vij. J. Gotovca 1', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(86, 'Ana', 'Lončarić', 0, 0, '', '', '098 339 005', '', '', '', '', '', 'aloncaric2000@yahoo.com', '', '', 'Krapinsko naselje 20', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(87, 'Ana', 'Bajić', 0, 0, '', '', '095 903 0156', '', '', '', '', '', 'mir.paci@gmail.com', '', '', 'Mlinska 84', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(88, 'Asja', 'Marolt', 0, 0, '', '', '098 936 9770', '', '', '', '', '', 'asja.marolt@gmail.com', '', '', 'Vijenac Ivana Meštrovića 68a', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(89, 'Anja', 'Grbić', 0, 0, '', '', '091 724 8942', '', '', '', '', '', 'anjagrbic4@net.hr', '', '', 'Krstova 27', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(90, 'Damir', 'Nađ', 0, 0, '', '', '091 576 7405', '', '', '', '', '', 'damir.nad@inet.hr', '', '', 'Dragonjska 10', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(91, 'Dino', 'Kačar', 0, 0, '', '', '091 922 9561', '', '', '', '', '', 'dino.kacar@gmail.com', '', '', 'Svetog Roka 25', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(92, 'Mihalj', 'Tompa', 0, 0, '', '', '095 904 7117', '', '', '', '', '', '', '', '', 'Banja lučka 4', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(93, 'Ljiljana', 'Krističević', 0, 0, '', '', '098 867 197', '', '', '', '', '', '', '', '', 'E. Kvaternika 3', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(94, 'Aleksandar', 'Opšenica', 0, 0, '', '', '092 299 4949', '', '', '', '', '', 'acosenj@yahoo.com', '', '', 'Barbat 124', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(95, 'Marina', 'Bartolac', 0, 0, '', '', '098 189 1389', '', '', '', '', '', '', '', '', 'Zamršje 29', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(96, 'Kristina', 'Ravlić', 0, 0, '', '', '091 731 8754', '', '', '', '', '', 'kristina.ravlic@porezna-uprava.hr', '', '', 'Trg dr. F. Tuđmana 4', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(97, 'Melita', 'Fišer', 0, 0, '', '', '098 986 5514', '', '', '', '', '', '', '', '', 'Ulica H. Republike 24', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(98, 'Dominik', 'Zec', 0, 0, '', '', '098 911 5745', '', '', '', '', '', '', '', '', 'Virska 29', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(99, 'Kristina', 'Tominac', 0, 0, '', '', '091 737 1664', '', '', '', '', '', 'ktominac@gmail.com', '', '', 'Delnička 29', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(100, 'Darja', 'Ergotić', 0, 2147483647, '', '', '098 966 7677', '', '', '', '', '', 'ajrad666@gmail.com', '', '', 'Bartola Kašića 8', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(101, 'Davor', 'Šotman', 0, 0, '', '', '091 788 9820', '', '', '', '', '', '', '', '', 'Vrbaska 13', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(102, 'Mirjana', 'Žilić', 0, 0, '', '', '091 213 1183', '', '', '', '', '', '', '', '', 'Vij. I. Meštrovića 1g', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(103, 'Suzana', 'Oroz', 0, 0, '', '', '091 559 8567', '', '', '', '', '', 'dino_pank@hotmail.com', '', '', 'Medulinska 5a', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(104, 'ivan', 'aleksi', 0, 0, '', '', '099 261 6657', '', '', '', '', '', 'ivan.aleksi@etfos.hr', '', '', 'Ljudevita Posavskog 31', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(105, 'Željka', 'Grujić', 0, 0, '', '', '099 634 7165', '', '', '', '', '', 'zeljkaos39@gmail.com', '', '', 'Sjenjak 1', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(106, 'Mario', 'Galić', 0, 0, '', '', '099 707 4740', '', '', '', '', '', 'mgalic@gfos.hr', '', '', 'Drinska 10', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(107, 'Dražen', 'Stojčić', 0, 0, '', '', '091 575 5425', '', '', '', '', '', 'drazen@romulic.com', '', '', 'Reisnerova 26', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(108, 'Nino', 'Vrbanić', 0, 0, '', '', '098 260 699', '', '', '', '', '', 'nino@rijekametali.hr', '', '', 'RIJEKA 11', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(109, 'HNKera)', 'U-OSIJEKU-(šifra-Gera)', 0, 0, '', '', '098 547 255', '', '', '', '', '', 'branka.stipic@hnk-osijek.hr', '', '', 'Županijska 9', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(110, 'Dubravka', 'Klikić-Matotek', 0, 0, '', '', '099 539 2588', '', '', '', '', '', 'dklikic@gmail.com', '', '', 'Voćinska 5', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(111, 'Zlatko', 'Vukušić', 0, 0, '', '', '098 547 231', '', '', '', '', '', 'zlatko.vukusic@os.htnet.hr', '', '', 'Požeška 40', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(112, 'Nataša', 'Karasek', 0, 0, '', '', '561 432', '', '', '', '', '', 'natasa.karasek@yahoo.com', '', '', 'Kaštelanska 49', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(113, 'Zeljko', 'Baotic', 0, 0, '', '', '01 29 0000 2', '', '', '', '', '', 'zbaotic@gmx.de', '', '', 'Maksimirska 282', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(114, 'Monika', 'Kaplan', 0, 0, '', '', '095 8142 890', '', '', '', '', '', 'monikakaplanzg@yahoo.com', '', '', 'Rudolfa Bićanića 32', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(115, 'Areta', 'Ćurković', 0, 0, '', '', '091 537 1270', '', '', '', '', '', 'aretacurkovic@gmail.com', '', '', 'Dragonjska 14', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(116, 'Renata', 'Borovac', 0, 0, '', '', '099 317 9906', '', '', '', '', '', 'renata.borovac@os.t-com.hr', '', '', 'Sjenjak 117', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(117, 'Ružica', 'Brajović', 0, 0, '', '', '091 600 0879', '', '', '', '', '', 'mirjana.brajovic031@gmail.com', '', '', 'Vijenac Paje Kolarića 4', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(118, 'Ivanka', 'Đeri', 0, 0, '', '', '098 167 37 45', '', '', '', '', '', 'ivanka.djeri@gmail.com', '', '', 'Divaltova 120', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(119, 'Draženaa)', 'Vrselja-(šifra-Gera)', 0, 0, '', '', '098 802 548', '', '', '', '', '', 'drazena.vrselja@hnk-osijek.hr', '', '', 'Lipička 1', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(120, 'Dario', 'Mandić', 0, 0, '', '', '098 878 919', '', '', '', '', '', 'dario.mandic@gmail.com', '', '', 'I.Kršnjavog 28', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(121, 'Tvrtka', 'Benašić', 0, 0, '', '', '091 533 6627', '', '', '', '', '', '', '', '', 'Zagrebačka 10 B', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(122, 'Damir', 'Pešić', 0, 0, '', '', '098 801 575', '', '', '', '', '', 'damir.pesic@net.hr', '', '', 'Stanka Vraza 17', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(123, 'Tanja', 'Mioković', 0, 0, '', '', '098 253 890', '', '', '', '', '', 'tatjana.miokovic@os.t-com', '', '', 'L. Jägera 6', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(124, 'Klara', 'Dumančić', 0, 0, '', '', '0997579570', '', '', '', '', '', '', '', '', 'Sjenjak 137', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(125, 'Svjetlana', 'Azenić-Mitrović', 0, 0, '', '', '091 377 6301', '', '', '', '', '', 'sazenic@inet.hr', '', '', 'Martina Divalta 923', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(126, 'Goran', 'Troskot', 0, 0, '', '', '099 297 09 061', '', '', '', '', '', 'gtroskot@gmail.hr', '', '', 'Rabska 22', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(127, 'Iva', 'Preradović', 0, 0, '', '', '099 232 8228', '', '', '', '', '', 'iva@adhoc.hr', '', '', 'Vukovarska 126a', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(128, 'Davor', 'Šterijev', 0, 0, '', '', '091 100 4988', '', '', '', '', '', 'davor.sterijev@gmail.com', '', '', 'Gornjodravska obala 86', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(129, 'Sanja', 'Milinković', 0, 0, '', '', '091 898 1680', '', '', '', '', '', 'sanja.milinkovic@euroherc.hr', '', '', 'Drinska 123', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(130, 'Dina', 'Begović', 0, 0, '', '', '099 211 9317', '', '', '', '', '', 'dina.begovic@hnk-osijek.hr', '', '', 'Maceljska 14', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(131, 'Dražena', 'Vršelja', 0, 0, '', '', '098 802 548', '', '', '', '', '', 'drazena.vrselja@hnk-osijek.hr', '', '', 'Lipička 1', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(132, 'Darko', 'Kučan', 0, 0, '', '', '098 974 6781', '', '', '', '', '', '', '', '', 'Josipa Huttlera 27', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(133, 'Marijana', 'Katušić', 0, 0, '', '', '031 303 842', '', '', '', '', '', 'marijana.katusic@gmail.com', '', '', 'Psunjska 55a', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(134, 'Nataša', 'Viola', 0, 0, '', '', '091 530 7762', '', '', '', '', '', 'natasa.viola@inet.hr', '', '', 'J. Gojkovića 6b', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(135, 'Ivica', 'Ercegovac', 0, 0, '', '', '099 251 6813', '', '', '', '', '', 'ivica.ercegovac@hf-group.com', '', '', 'Gornjodravska obala 84', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(136, 'Anđelina', 'Miloloža', 0, 0, '', '', '098 130 9116', '', '', '', '', '', 'andjelina.m@gmail.com', '', '', 'Vinogradska 75', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(137, 'Berislav', 'Marinić', 0, 0, '', '', '098 572 864', '', '', '', '', '', '', '', '', 'Kolodvorska 59', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(138, 'Snježana', 'Žiža', 0, 0, '', '', '091 929 3950', '', '', '', '', '', 'snjezana@integra-dundovic.hr', '', '', 'Sjenjak 137', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(139, 'Lidija', 'Komaromi', 0, 0, '', '', '0996701437', '', '', '', '', '', '', '', '', 'Županijska 45', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(140, 'nikola', 'šuljug', 0, 0, '', '', '280 156', '', '', '', '', '', '', '', '', 'Joha 1', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(141, 'Blaženka', 'Schmidt', 0, 0, '', '', '098 434 572', '', '', '', '', '', 'blazenka.schmidt@saponia.hr', '', '', 'Vijenac Vlahe Bukovca 12', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(142, 'Suzana', 'Tretinjak', 0, 0, '', '', '099 706 0669', '', '', '', '', '', 'suzana.tretinjak@obz.hr', '', '', 'Krbavska 243', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(143, 'Božana', 'Matoš', 0, 0, '', '', '099 214 4614', '', '', '', '', '', '', '', '', 'Bogdanovačka 9', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(144, 'Ivana', 'Špiranović', 0, 0, '', '', '099 800 9974', '', '', '', '', '', '', '', '', 'Šumska 13', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(145, 'Melita', 'Karakaš', 0, 0, '', '', '098 889 818', '', '', '', '', '', '', '', '', 'Vinkovačka 24', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(146, 'Ruža', 'Capić', 0, 0, '', '', '098 956 7361', '', '', '', '', '', '', '', '', 'Fruškogorska 8a', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(147, 'Biserka', 'Lučić', 0, 0, '', '', '091 538 6179', '', '', '', '', '', '', '', '', 'Psunjska 59', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(148, 'Josipa', 'Božić', 0, 0, '', '', '091 918 3903', '', '', '', '', '', 'josipabozic@inet.hr', '', '', 'Ružina 15', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(149, 'Goran', 'Milošević', 0, 0, '', '', '098 546 820', '', '', '', '', '', 'gmilosevic@ffos.hr', '', '', 'Vijenac Ivana Česmičkog 14', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(150, 'Marijan', 'Kovač', 0, 0, '', '', '098 924 8198', '', '', '', '', '', 'kovacarh@gmail.com', '', '', 'Dobriše Cesarića 11a', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(151, 'Sanda', 'Kajfeš', 0, 0, '', '', '095 880 5959', '', '', '', '', '', 'sanda.kajfes1@gmail.com', '', '', 'Bjelovarska 2', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(152, 'Mladen', 'Pavlovsky', 0, 0, '', '', '091 734 2084', '', '', '', '', '', 'mladenpavlovsky@gmail.com', '', '', 'J. Gojkovića 8', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(153, 'Marija', 'Čabaj', 0, 0, '', '', '098 561 434', '', '', '', '', '', 'stambukm@gmail.com', '', '', 'Vijenac I. Meštrovića 66', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(154, 'Nenad', 'Pavičič', 0, 0, '', '', '095 901 4952', '', '', '', '', '', 'nenadpavicic@hotmail.com', '', '', 'Frankopanska 91 b', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(155, 'Marijana', 'Grbić', 0, 0, '', '', '091 783 6479', '', '', '', '', '', 'anjagrbic5@gmail.com', '', '', 'Krstova 27', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(156, 'Dalibor', 'Šorda', 0, 0, '', '', '098 630 425', '', '', '', '', '', '', '', '', 'Hvarska 4', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(157, 'Jasna', 'Kovačević', 0, 0, '', '', '091 570 58 14', '', '', '', '', '', 'jacikak@gmail.com', '', '', 'Stadionsko naselje 74', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(158, 'Nada', 'Gabrić', 0, 0, '', '', '091 797 6000', '', '', '', '', '', 'gabric.nada@gmail.com', '', '', 'Frankopanska 128', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(159, 'Sonja', 'Paradžik', 0, 0, '', '', '098 233 873', '', '', '', '', '', 'sonja@ibl.hr', '', '', 'Josipa Kozarca 7', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(160, 'Željko', 'Polčić', 0, 0, '', '', '095 901 8995', '', '', '', '', '', 'debeli.debex@gmai.com', '', '', 'Dravska 35', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(161, 'Gabrijela', 'Marciuš', 0, 0, '', '', '031 752 233', '', '', '', '', '', '', '', '', 'Ribarska 20', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(162, 'Goran', 'Troskot', 0, 0, '', '', '099 297 9061', '', '', '', '', '', 'gtroskot@gmail.com', '', '', 'Rabska 22', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(163, 'RENATA', 'ZADRO', 0, 0, '', '', '091 307 23 04', '', '', '', '', '', 'renataz1977@gmail.com', '', '', 'PRENJSKA 16', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(164, 'Filip', 'Stević', 0, 0, '', '', '098 174 7062', '', '', '', '', '', 'fstevic@gmail.com', '', '', 'Antuna Barca 6A', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(165, 'Dalibor', 'Hocenski', 0, 0, '', '', '098 920 9149', '', '', '', '', '', 'hocenski@yahoo.com', '', '', 'Dubrovačka 113', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(166, 'Anton', 'Kristić', 0, 0, '', '', '095 517 1099', '', '', '', '', '', 'antonkristic@yahoo.com', '', '', 'Biševska 17', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(167, 'Sonja', 'Varvodić', 0, 0, '', '', '095 199 7065', '', '', '', '', '', '', '', '', 'Savska 116', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(168, 'Dalibor', 'Njari', 0, 0, '', '', '091 531 3400', '', '', '', '', '', 'dalibor.njari@gmail.com', '', '', 'Velaluška 3', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(169, 'stjepan', 'miletić', 0, 0, '', '', '098 286 296', '', '', '', '', '', 'stjepan.miletic1@st.t-com.hr', '', '', 'Vukovarska 141', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(170, 'Branka)', 'Stipić-(šifra-GERA)', 0, 0, '', '', '098 547 255', '', '', '', '', '', 'branka.stipic@hnk-osijek.hr', '', '', 'Zvečevska 26', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(171, 'Nives', 'Ledić', 0, 0, '', '', '099 5157 052', '', '', '', '', '', '', '', '', 'Kod Mia', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(172, 'Renataidović', 'Rikert-i-Damir-Hamidović', 0, 0, '', '', '098 187 6971', '', '', '', '', '', 'renata.rikert@gmail.com', '', '', 'Vijenac Ivana Meštrovića 20', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(173, 'Blaženka', 'Ileš', 0, 0, '', '', '095 901 8586', '', '', '', '', '', 'blazenka.iles@facebook.com', '', '', 'Psunjska 92', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(174, 'Mira', 'Jelčić', 0, 0, '', '', '098 792 896', '', '', '', '', '', 'kompost@os.t-com.hr', '', '', 'Psunjska 49', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(175, 'Borko', 'Bozic', 0, 0, '', '', '098 170 1455', '', '', '', '', '', 'bbozic36@gmail.com', '', '', 'Fran Krste Frenkopana 14', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(176, 'Nikica', 'Perković', 0, 0, '', '', '091 885 1910', '', '', '', '', '', 'nikiperk@inet.hr', '', '', 'Frankopanska 47', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(177, 'Vlatka', 'Jurković', 0, 0, '', '', '098 304 948', '', '', '', '', '', 'vlatkajurkovic@yahoo.com', '', '', 'Dobriše Cesarića 16', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(178, 'Mirjana', 'Brajović', 0, 0, '', '', '091 600 0879', '', '', '', '', '', 'mirjana.brajovic031@gmail.com', '', '', 'Psunjska 44', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(179, 'Mihael', 'Raff', 0, 0, '', '', '091 535 1711', '', '', '', '', '', 'mihaelraff@gmail.com', '', '', 'Krstova 17a', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(180, 'Darija', 'Kunić', 0, 0, '', '', '091 533 7111', '', '', '', '', '', 'darija.kunic@euroherc.hr', '', '', 'Drinska 123', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(181, 'Ivona', 'Balić', 0, 0, '', '', '098 767 364', '', '', '', '', '', 'ivonapb@gmail.com', '', '', 'Dobriše Cesarića 29', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(182, 'Željka', 'Rački-Kristić', 0, 0, '', '', '091 6300 092', '', '', '', '', '', '', '', '', 'Biševska 17', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(183, 'Miroslav', 'Grbeša', 0, 0, '', '', '098 1888 244', '', '', '', '', '', 'za pare ne pitaj', '', '', 'Omladinska 11', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(184, 'Vedran', 'Kotrba', 0, 0, '', '', '099 813 9302', '', '', '', '', '', 'vedran.kotrba@gmail.com', '', '', 'Ruzina 74', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(185, 'vedrana', 'urošević', 0, 0, '', '', '098 533 445', '', '', '', '', '', '', '', '', 'dragonjska 2', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(186, 'Ivica', 'Leko', 0, 0, '', '', '098 339 393', '', '', '', '', '', '', '', '', 'Stepinca 27', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(187, 'Jasmina', 'Dohnal', 0, 0, '', '', '098 192 9292', '', '', '', '', '', 'jasminadohnal@gmail.com', '', '', 'Banjalučka 41', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(188, 'Ivona', 'Lovas', 0, 0, '', '', '091 723 2940', '', '', '', '', '', 'irena_grgic@yahoo.com', '', '', 'Strossmayerova 188', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(189, 'zvonimir', 'forjan', 0, 0, '', '', '091 592 9120', '', '', '', '', '', 'zvone 1964@net.hr', '', '', 'Petrove gore 18', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(190, 'Vlatka', 'Dušanek', 0, 0, '', '', '098 187 5546', '', '', '', '', '', 'dvlatkadvlatka@gmail.com', '', '', 'Martina Divalta 64', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(191, 'Stjepan', 'Udovičić', 0, 0, '', '', '099 555 55 96', '', '', '', '', '', 'stjepan@udovicic.org', '', '', 'Psunjska 34', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(192, 'Martina', 'Valentić', 0, 0, '', '', '091 883 7520', '', '', '', '', '', 'martina_valentic@yahoo.com', '', '', 'Vijenac Paje Kolarića 6', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(193, 'Ivana', 'Frančić', 0, 0, '', '', '099 401 81 28', '', '', '', '', '', 'francicka88@gmail.com', '', '', 'Prolaz Josipa Leovića 5', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(194, 'Ana', 'Vila', 0, 0, '', '', '095 816 0448', '', '', '', '', '', 'vilana7@gmail.com', '', '', 'Trpanjska 11', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(195, 'Sanja', 'Vulić', 0, 0, '', '', '091 298 8737', '', '', '', '', '', 'sanjavulic7@gmail.com', '', '', 'Zapadno predgrađe 18', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(196, 'Suzana', 'Bračun', 0, 0, '', '', '098 638 585', '', '', '', '', '', 'sb0210@gmail.com', '', '', 'Istarska 1', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(197, 'Borko', 'prezime', 0, 0, '', '', '098 178 4356', '', '', '', '', '', '', '', '', 'Pija', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(198, 'Nina', 'Mance', 0, 0, '', '', '091 538 82 80', '', '', '', '', '', 'nina.mance@gmail.com', '', '', 'Vijenac Augusta Cesarca 30', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(199, 'Kristina', 'Babić', 0, 0, '', '', '097 1979 669', '', '', '', '', '', 'simfonija.pr.agencija@gmail.com', '', '', 'Trg bana Josipa Jelačića 18', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(200, 'Nada', 'Kožul', 0, 0, '', '', '098 373 167', '', '', '', '', '', 'OS571643@yahoo.com', '', '', 'Sjenjak 115', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(201, 'sasa', 'rapan', 0, 0, '', '', '098 880 0301', '', '', '', '', '', 'sasa.rapan@gmail.com', '', '', 'Belišće', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(202, 'Siniša', 'Sarkanjac', 0, 0, '', '', '095 900 2845', '', '', '', '', '', 'sinisa55@gmail.com', '', '', 'Ljudevita Posavskog 59', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(203, 'Helena', 'Ristić', 0, 0, '', '', '091 224 20 15', '', '', '', '', '', '', '', '', 'Franje Kuhača 31', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(204, 'Ivana', 'Majstorović', 0, 0, '', '', '098 601 024', '', '', '', '', '', 'ivana.majstorovic28@gmail.com', '', '', 'Medulinska 11', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(205, 'JeanPierre', 'Maričić', 0, 0, '', '', '098 372 446', '', '', '', '', '', 'jpmaricic@gmail.com', '', '', 'Sjenjak 101', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(206, 'Dubravka', 'Smajić', 0, 0, '', '', '098 919 4955', '', '', '', '', '', '', '', '', 'Matije Gupca 82a', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(207, 'Kristinka', 'Marković', 0, 0, '', '', '099 200 97 78', '', '', '', '', '', 'kristinka.fitness@gmail.com', '', '', 'Porečka 14', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(208, 'Vedran', 'Stipić', 0, 0, '', '', '095 51 76 798', '', '', '', '', '', 'vedran.stipic@gmail.com', '', '', 'Vij. P.Gore 20', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(209, 'Ivana', 'Slišković', 0, 0, '', '', '098 939 7609', '', '', '', '', '', 'ivanasliskov@gmail.com', '', '', 'Strossmayerova 217', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(210, 'Marko', 'Vukobratović', 0, 0, '', '', '098 93 90 500', '', '', '', '', '', 'marko.vukobratovic@gmail.com', '', '', 'Strossmayera 156', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(211, 'Daniela', 'Kuže', 0, 0, '', '', '098 986 50 16', '', '', '', '', '', 'daniela.kuze@gmail.com', '', '', 'Kupska 21', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(212, 'Jelena', 'Grgić', 0, 0, '', '', '091 203 1118', '', '', '', '', '', 'jelena.grgic83@gmail.com', '', '', 'K. A Stepinca 5', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(213, 'Andrea', 'Vekić', 0, 0, '', '', '091 795 5653', '', '', '', '', '', 'vekic.andrea@gmail.com', '', '', 'Dubrovačka 91', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(214, 'Bojana', 'Muačević-Gal', 0, 0, '', '', '098 18 19 813', '', '', '', '', '', 'bojana.ckt.gea@gmail.com', '', '', 'Šamačka 11', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(215, 'Siniša', 'Kraml', 0, 0, '', '', '098 252 934', '', '', '', '', '', '', '', '', 'Vodenicka 7', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(216, 'Marija', 'Leko', 0, 0, '', '', '099 706 6016', '', '', '', '', '', '', '', '', 'Sunčana', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(217, 'Vlatko', 'Vlahek', 0, 0, '', '', '098 688 672', '', '', '', '', '', '', '', '', 'Fran Krsto Frankopana 30', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(218, 'Ivana', 'Matković', 0, 0, '', '', '091 530 1323', '', '', '', '', '', 'ivana_zdilar@hotmail.com', '', '', 'J.J. Strossmayera 75', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(219, 'Centar', 'za-kompost', 0, 0, '', '', '098 792 896', '', '', '', '', '', 'kompost@os.t-com.hr', '', '', 'Ljudevita Posavskog 14 a', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(220, 'Tomislav', 'Peric', 0, 0, '', '', '099 287 8888', '', '', '', '', '', 'perozderotp@gmail.com', '', '', 'Josipa huttlera 49', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(221, 'Dino', 'Krupić', 0, 0, '', '', '098 252 681', '', '', '', '', '', 'dino.krupic@gmail.com', '', '', 'Š.Petofi 204', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(222, 'Dubravka', 'Perković-Brković', 0, 0, '', '', '099 4607 300', '', '', '', '', '', 'duby@inet.hr', '', '', 'Sljemenska 118 a', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(223, 'Dejan', 'Šimić', 0, 0, '', '', '099 25 25 707', '', '', '', '', '', 'marketing@kljuc13.com', '', '', 'Dobra 23', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(224, 'Miroslav', 'Varga', 0, 0, '', '', '098 25 25 20', '', '', '', '', '', 'miroslav.escape@gmail.com', '', '', 'Tvrđavica 175', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(225, 'Marijo', 'Lijić', 0, 0, '', '', '091 4855 238', '', '', '', '', '', 'marijolino@gmail.com', '', '', 'Petefijeva 99', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(226, 'Robert', 'Vučković', 0, 0, '', '', '099 367 0504', '', '', '', '', '', '', '', '', 'Zagrebačka 37', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(227, 'Ksenija', 'Vukušić', 0, 0, '', '', '098 9679 436', '', '', '', '', '', 'zlatko.vukusic@os.htnet.hr', '', '', 'Požeška 40', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(228, 'Vesna', 'Vrselja', 0, 0, '', '', '098 9822 507', '', '', '', '', '', 'vesna.vrselja@hnk-osijek.hr', '', '', 'Moslavačka 1 b', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(229, 'Mara', 'Šubarić', 0, 0, '', '', '098 851 745', '', '', '', '', '', '', '', '', 'Prijedorska 12', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(230, 'Anastazija', 'Dorešić', 0, 0, '', '', '098 949 7111', '', '', '', '', '', 'anastazija.doresic@gmail.com', '', '', 'Kapelska 22a', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(231, 'Antonija', 'Barišić-Lasović', 0, 0, '', '', '091 505 1127', '', '', '', '', '', 'antonijabl@gmail.com', '', '', 'Vodenička 14 b', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(232, 'Predrag', 'Dotlić', 0, 0, '', '', '031 368 042', '', '', '', '', '', 'pdotlic@gmail.com', '', '', 'Vij. G. Zobundžije 4', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(233, 'Dinko', 'Babić', 0, 0, '', '', '091 588 0400', '', '', '', '', '', 'dinko.babic@euroherc.hr', '', '', 'Novogradiška 17', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(234, 'Dario', 'Budimir', 0, 0, '', '', '095 555 9999', '', '', '', '', '', 'dario.budimir@gmail.com', '', '', 'Prenjska 49', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(235, 'Ana', 'Dagen', 0, 0, '', '', '091 570 1471', '', '', '', '', '', 'ana.dagen@gmail.com', '', '', 'J.J. Strossmayera 75', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(236, 'Marija', 'Orkić', 0, 0, '', '', '098 872 601', '', '', '', '', '', 'marija.orkic@gmail.com', '', '', 'Kalnička 22', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(237, 'Vedran', 'Stapić', 0, 0, '', '', '098 350 069', '', '', '', '', '', 'vstapic@gmail.com', '', '', 'Kestenova 54', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(238, 'Mario', 'Žaper', 0, 0, '', '', '095 909 73 53', '', '', '', '', '', 'zapermario@gmail.com', '', '', 'Zadarska 2a', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(239, 'Časlav', 'Livada', 0, 0, '', '', '091 224 6125', '', '', '', '', '', 'clivada@gmail.com', '', '', 'Vijenac Ivana Meštrovića 48', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(240, 'Boris', 'Wilhelm', 0, 0, '', '', '099 460 7303', '', '', '', '', '', 'b.wilhelm@overseas.hr', '', '', 'Sljemenska 58', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(241, 'Damir', 'Čačić', 0, 0, '', '', '091 2424 285', '', '', '', '', '', 'damircacic@ymail.com', '', '', 'Strossmayerova 198', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(242, 'Višnja', 'Kljaić', 0, 0, '', '', '091 792 9580', '', '', '', '', '', '', '', '', 'Vrtić mercator', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(243, 'Ljerka', 'Holeš', 0, 0, '', '', '098 165 0277', '', '', '', '', '', 'Hljerka@gmail.com', '', '', 'Crkvena 115 c', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(244, 'Mario', 'Romulić', 0, 0, '', '', '091 175 0421', '', '', '', '', '', 'Mario@romulic.com', '', '', 'Reisnerova 26', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(245, 'Igor', 'Dačić', 0, 0, '', '', '099 812 6969', '', '', '', '', '', 'igic.dacic@gmail.com', '', '', 'Gundulićeva 103', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(246, 'Sandra', 'Šokčić', 0, 0, '', '', '099 810 0090', '', '', '', '', '', 'sandra_ms74@yahoo.com', '', '', 'Vrbaska 15', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(247, 'Jasna', 'Novotni', 0, 0, '', '', '095 8596 418', '', '', '', '', '', 'jasna.0601@gmail.com', '', '', 'Vij. I. Meštrovića 50', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(248, 'Tanja', 'Miklavčić', 0, 0, '', '', '091 956 5326', '', '', '', '', '', 'Tanja.vujasinovic@zg.t-com.hr', '', '', 'Medulinska 13', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(249, 'Monika', 'Marković', 0, 0, '', '', '095 810 0032', '', '', '', '', '', 'Monika.Markovic@pfos.hr', '', '', 'Zmaj J. Jovanovića 19a', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(250, 'Branimira', 'Kandić-Splavski', 0, 0, '', '', '091 1565717', '', '', '', '', '', 'brana.amb@gmail.com', '', '', 'Gornjodravska 98', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(251, 'Olga', 'Rajs', 0, 0, '', '', '031 741 544', '', '', '', '', '', '', '', '', 'Đure Đakovića 25', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(252, 'Boris', 'Ocić', 0, 0, '', '', '091 518 0276', '', '', '', '', '', 'boris.ocic@gmail.com', '', '', 'Trg Lava Mirskog 2', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(253, 'Erich', 'Faller', 0, 0, '', '', '091 212 4400', '', '', '', '', '', 'erichfaller@yahoo.de', '', '', 'Vijenac Josipa Kozarca 17', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(254, 'Hale', 'prezime', 0, 0, '', '', '098 630 276', '', '', '', '', '', '', '', '', 'Kesten', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL);
INSERT INTO `users` (`id`, `first_name`, `last_name`, `type`, `oib`, `block`, `contact_person`, `phone`, `additional_phone`, `note`, `permalink`, `username`, `user_group`, `email`, `additional_email`, `password`, `address`, `area`, `city`, `region`, `date_of_birth`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(255, 'Tin', 'Kovačević', 0, 0, '', '', '095 861 6291', '', '', '', '', '', 'tin_vulgaris@yahoo.com', '', '', 'Divaltova 26', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(256, 'Željko', 'Prša', 0, 0, '', '', '091 151 2792', '', '', '', '', '', 'Zeljko.prsa@gmail.com', '', '', 'Vinkovačka 82', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(257, 'Kristina', 'Podobnik', 0, 0, '', '', '098 920 0224', '', '', '', '', '', 'kristina_podobnik@yahoo.com', '', '', 'Vrbaska 1b', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(258, 'Mirna', 'Lauc', 0, 0, '', '', '091 591 3846', '', '', '', '', '', 'Mlauc46@gmail.com', '', '', 'Savska 14', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(259, 'Ivan', 'Kapetanović', 0, 0, '', '', '091 785 5799', '', '', '', '', '', 'liftboy@gmail.com', '', '', 'Kralja Petra Svačića 4', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(260, 'KARMEN', 'PODNER', 0, 2147483647, '', '', '091 5520782', '', '', '', '', '', '', '', '', 'ISTARSKI PROLAZ 1', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(261, 'Ivan', 'Rešetar', 0, 0, '', '', '031570178', '', '', '', '', '', '', '', '', 'Vatrogasna 74', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(262, 'Nada', 'Bogdan', 0, 0, '', '', '031375542', '', '', '', '', '', '', '', '', 'Strossmayera 103', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(263, 'Tomislav', 'Dobrošević', 0, 0, '', '', '031571788', '', '', '', '', '', '', '', '', 'Sjenjak 101', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(264, 'Sava', 'Mijakić', 0, 0, '', '', '031561355', '', '', '', '', '', '', '', '', 'Velebitska 36 B', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(265, 'Ljubomir', 'Ninković', 0, 0, '', '', '031 580 413', '', '', '', '', '', '', '', '', 'Divaltova 96', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(266, 'Irena', 'Radan', 0, 0, '', '', '031 564 149', '', '', '', '', '', '', '', '', 'Porečka 31', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(267, 'Jasna', 'Folivarski', 0, 0, '', '', '031 207 259', '', '', '', '', '', '', '', '', 'D. Cesarića 13A', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(268, 'Stevo', 'Prelić', 0, 0, '', '', '098 354 250', '', '', '', '', '', '', '', '', 'Sv. Ane 57', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(269, 'Vlatka', 'Dušanek', 0, 0, '', '', '0981875546, ili 0989844515', '', '', '', '', '', 'dvlatkadvlatka@gmail.com', '', '', 'Divaltova 64', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(270, 'Mihael', 'Šilac', 0, 0, '', '', '091 253 9559', '', '', '', '', '', 'mihaelsilac@gmail.com', '', '', 'Psunjska 70', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(271, 'Božidar', 'Horvat', 0, 0, '', '', '091 531 4777', '', '', '', '', '', '', '', '', 'Županijska 5a', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(272, 'Lidija', 'Prlić', 0, 0, '', '', '0989275199', '', '', '', '', '', 'lidija.prlic@gmail.com', '', '', 'Reisnerova 113', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(273, 'Anna', 'Tuszynska', 0, 2147483647, '', '', '091 551 2716', '', '', '', '', '', '', '', '', 'Put Podstina 13', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(274, 'Iva', 'Jozić', 0, 0, '', '', '091 598 37 51', '', '', '', '', '', 'ivajoo@gmail.com', '', '', 'Sprečanska 31', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(275, 'Maja', 'Varga', 0, 0, '', '', '099 842 4883', '', '', '', '', '', 'maja.ruta@gmail.com', '', '', 'Tvrđavica 175', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(276, 'Larisao.', 'Radin-RadinR.-d.o.o.', 0, 0, '', '', '052.434.774 ili 091.434.7740', '', '', '', '', '', 'radin@radin-r.hr', '', '', 'Poslovna Zona Labinci bb', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(277, 'Hrvoje', 'Hanzer', 0, 0, '', '', '092 323 0134', '', '', '', '', '', 'hrvoje.hanzer@gmail.com', '', '', 'Savska 2', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(278, 'Tihomir', 'Ćurković', 0, 0, '', '', '091/512-4881', '', '', '', '', '', 'tihomir.curak@hotmail.com', '', '', 'Dragonjska 14', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(279, 'Natasa', 'Karasek', 0, 0, '', '', '095 9063331', '', '', '', '', '', 'natasa.karasek@yahoo.com', '', '', 'J. Kozarca 8', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(280, 'Miroslav', 'Vavrag', 0, 0, '', '', '098252520', '', '', '', '', '', 'miroslav.escape@gmail.com', '', '', 'Tvrđavica 175', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(281, 'Tibor', 'Bajus', 0, 0, '', '', '091/5473164', '', '', '', '', '', 'tbajus@gmail.com', '', '', 'Vatrogasna 123', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(282, 'Stanislava', 'Kondić', 0, 0, '', '', '099 703 2159', '', '', '', '', '', '', '', '', 'I.G. Kovačića 13', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(283, 'Jasmina', 'Tijan', 0, 2147483647, '', '', '098 632 632', '', '', '', '', '', 'racun@hi.t-com.hr', '', '', 'ANDRIJE KRSULA', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(284, 'darko', 'brkić', 0, 0, '', '', '098 594 090', '', '', '', '', '', 'darko.brkic@gmail.com', '', '', 'Banova 102', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(285, 'Robert', 'Godrijan', 0, 2147483647, '', '', '092 314 9750', '', '', '', '', '', 'robiheli@gmail.com', '', '', 'Mahatme Gandhija 21', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(286, 'Stjepan', 'Seleši', 0, 0, '', '', '0914691792', '', '', '', '', '', '', '', '', 'Ljudevita Posavskog 29', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(287, 'Roberta', 'Subjak', 0, 0, '', '', '0989396333', '', '', '', '', '', '', '', '', 'Pleternička 28', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(288, 'Tereza', 'Markotić', 0, 0, '', '', '098 479 015', '', '', '', '', '', '', '', '', 'V. I. Meštrovića 18', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(289, 'Martina', 'Katić', 0, 0, '', '', '098 174 8381', '', '', '', '', '', 'mkatic983@gmail.com', '', '', 'Ilirska 27', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(290, 'Zdravka', 'Krivdić', 0, 0, '', '', '091 514 2833', '', '', '', '', '', '', '', '', 'Divaltova 26', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(291, 'Filip', 'Španić', 0, 0, '', '', '099 720 0540', '', '', '', '', '', '', '', '', 'Zrinjevac bb', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(292, 'Branka', 'Ferić', 0, 2147483647, '', '', 'O91 552 5363', '', '', '', '', '', '', '', '', 'Žrtava Fašizma 63a', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(293, 'Krešimir', 'Milas', 0, 0, '', '', '0912503991', '', '', '', '', '', 'kreso.milas@gmail.com', '', '', 'Ilirska 27', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(294, 'Igor', 'Dacic', 0, 0, '', '', '091 612 6969', '', '', '', '', '', 'igic.dacic@gmail.com', '', '', 'Gunduliceva 103.', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(295, 'Marko', 'Buljan', 0, 0, '', '', '091 798 5360', '', '', '', '', '', 'mark.buljan@gmail.com', '', '', 'Bana Josipa Jelačića 29', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(296, 'Andrea', 'Ferenc', 0, 0, '', '', '099 226 5055', '', '', '', '', '', '', '', '', 'Vijenac Murse 1', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(297, 'Zorka', 'Uglik', 0, 0, '', '', '091 507 5971', '', '', '', '', '', '', '', '', 'Trpanjska 9', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(298, 'Vanja', 'Ostojic', 0, 0, '', '', '0912033045', '', '', '', '', '', 'Anjavostojic', '', '', 'Brijest sprecanska 15', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(299, 'Damir', 'Tivanovac', 0, 0, '', '', '095 813 4381', '', '', '', '', '', 'teevich@gmail.com', '', '', 'Novogradiška 45', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(300, 'Duje', 'Plazibat', 0, 0, '', '', '099 734 6832', '', '', '', '', '', '', '', '', 'Srijemska 53', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(301, 'KLARA', 'DUMANČIĆ', 0, 0, '', '', '099759570', '', '', '', '', '', 'klara165@gmail.com', '', '', 'SJENJAK 137 ', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(302, 'andreja', 'juricevic', 0, 0, '', '', '098 645 169', '', '', '', '', '', 'deja.juricevic@gmail.com', '', '', 'Vijenac Ivana Mestrovica 80', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(303, 'Davor', 'Petrović', 0, 0, '', '', '095 901 64 67', '', '', '', '', '', 'davorpet@gmail.com', '', '', 'L.Jagera 6', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(304, 'Vedran', 'Prister', 0, 0, '', '', '098 928 25 32', '', '', '', '', '', '2vedran.prister@gmail.com', '', '', 'I. G. Kovačića 1a', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(305, 'Silvija', 'Mihaljević', 0, 0, '', '', '098 534 778 580', '', '', '', '', '', '', '', '', 'Šamačka 1', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(306, 'Mirko', 'Balić', 0, 0, '', '', '098 984 4538', '', '', '', '', '', '', '', '', 'Delnička 29A', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(307, 'Zlatko', 'Pejić', 0, 0, '', '', '098 866 766', '', '', '', '', '', '', '', '', 'Ruđera Boškovića 12a', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(308, 'df', 'prezime', 0, 0, '', '', 'fdg', '', '', '', '', '', '', '', '', 'Šamačka 34', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(309, 'Dario', 'Soldić', 0, 0, '', '', '098 211 469', '', '', '', '', '', '', '', '', 'Divaltova 102', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(310, 'Dalibor', 'Borota', 0, 0, '', '', '099 333 6363', '', '', '', '', '', '', '', '', 'Caffe Bar Club', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(311, 'Milan', 'Vidačić', 0, 0, '', '', '098 953 9995', '', '', '', '', '', '', '', '', 'Sjenjak 55', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(312, 'zorin', 'radovancevic', 0, 0, '', '', '0915358693', '', '', '', '', '', 'zorin@escapestudio.hr', '', '', 'Europska avenija 20', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(313, 'Ivana', 'Mladinić', 0, 2147483647, '', '', '099 216 0540', '', '', '', '', '', 'ivanamladinic@net.hr', '', '', 'A.G. Matoša 8', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(314, 'Branimir', 'Keler', 0, 0, '', '', '098 984 3510', '', '', '', '', '', '', '', '', 'Reisnerova 30', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(315, 'Suzana', 'Biondić', 0, 0, '', '', '098636584', '', '', '', '', '', 'suzabiondic@yahoo.com', '', '', 'Lokrumska 34', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(316, 'Andrija', 'Šaban', 0, 2147483647, '', '', '098/9231717', '', '', '', '', '', 'andrija.saban@zg.t-com.hr', '', '', 'Listopadska 5', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(317, 'Krešo', 'Kuna', 0, 0, '', '', '098 252 070', '', '', '', '', '', '', '', '', 'Caffe bar Club', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(318, 'Gabrijela', 'Damjanović', 0, 0, '', '', '099 099 099', '', '', '', '', '', 'gabrijela.bacic@vk.t-com.hr', '', '', 'Cafe bar Kesten', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(319, 'Mirjana', 'Zorić', 0, 2147483647, '', '', '098 906 4999', '', '', '', '', '', 'bruno.zoric@gmail.com', '', '', 'Ilica 170', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(320, 'Mario', 'Danic', 0, 0, '', '', '0981744594', '', '', '', '', '', 'mario.danic@gmail.com', '', '', 'Josipa Jurja Strossmayera 91', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(321, 'Josip', 'Justinić', 0, 1, '', '', '098 942 2207', '', '', '', '', '', '', '', '', 'Kras 151', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(322, 'vedran', 'kralj', 0, 0, '', '', '091 1509813', '', '', '', '', '', 'vedran@trotoar.com', '', '', 'Jv. J. radnika 29', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(323, 'Igor', 'Stojić', 0, 2147483647, '', '', '091 516 3991', '', '', '', '', '', '', '', '', 'Bosutsko naselje 43', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(324, 'stjepan', 'mikulic', 0, 0, '', '', '0921721401', '', '', '', '', '', 'mika.stjepan @gmail.com', '', '', 'Naselje Miroslava Krleze 7', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(325, 'Hrvoje', 'Svetinovic', 0, 0, '', '', '095 2571517', '', '', '', '', '', 'hrvoje@orka.hr', '', '', 'Sjenjak 93', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(326, 'Renata', 'Klarić', 0, 0, '', '', '0958714672', '', '', '', '', '', '', '', '', 'Ulica Grada Vukovara 3', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(327, 'Marina', 'Peko', 0, 0, '', '', '0992200767', '', '', '', '', '', '', '', '', 'Ilirska 71', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(328, 'Aleksandra', 'Pipek', 0, 0, '', '', '099/589 - 59 - 07', '', '', '', '', '', 'aleksandra.kolev@gmail.com', '', '', 'B. J. Jelačića 91', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(329, 'marijana', 'piantanida', 0, 2147483647, '', '', '0989850182', '', '', '', '', '', 'marijanadbk@net.hr', '', '', 'Dalmatinska 18f', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(330, 'vanda', 'jelas', 0, 2147483647, '', '', '0919574442', '', '', '', '', '', 'vanda.jelas@gmail.com', '', '', 'Dalmatinska 43', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(331, 'LIDIJA', 'TERZIĆ', 0, 0, '', '', '098 362 208', '', '', '', '', '', 'lidija.blazevic@gmail.com', '', '', 'SJENJAK 28', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(332, 'Marija', 'Tomas', 0, 1, '', '', '098 580 319', '', '', '', '', '', '', '', '', 'Bakarska 13', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(333, 'Jasmina', 'Poznić', 0, 1, '', '', '098 580 319', '', '', '', '', '', '091 252 3834', '', '', 'Franjevačka 12', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(334, 'Ivana', 'Parađiković', 0, 0, '', '', '0992924000', '', '', '', '', '', 'ivana@agroklub.com', '', '', 'Paradžikova 28', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(335, 'Maruska', 'Schwengersbauer', 0, 2147483647, '', '', '095 911 67 05', '', '', '', '', '', 'maruska.schwengersbauer@gmail.com', '', '', 'Ulica mira 9', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(336, 'Danijel', 'Lasinger', 0, 0, '', '', '098 165 0237', '', '', '', '', '', '', '', '', 'Drinska 87', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(337, 'vlado', 'plentaj', 0, 0, '', '', '+385 91 155 5757', '', '', '', '', '', '', '', '', 'Marjanska 57', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(338, 'Marija', 'Tripolski', 0, 0, '', '', '098 437 097', '', '', '', '', '', '', '', '', 'I. Mažuranića 6', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(339, 'Renata', 'Petrović', 0, 0, '', '', '098 813 898', '', '', '', '', '', '', '', '', 'Sutlanska 1', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(340, 'Dina', 'Rechner', 0, 0, '', '', '099 320 0785', '', '', '', '', '', '', '', '', 'Gornjodravska 90b', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(341, 'Ines', 'Žugec', 0, 0, '', '', '091 505 8608', '', '', '', '', '', '', '', '', 'Daruvarska 62', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(342, 'Hrvoje', 'Cini', 0, 0, '', '', '0997923087', '', '', '', '', '', 'cini.hrvoje@gmail.com', '', '', 'Martina Divalta 120', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(343, 'Robert', 'Tot', 0, 0, '', '', '091 666 5556', '', '', '', '', '', '', '', '', 'Caprice 2', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(344, 'Rino', 'Pinchler', 0, 0, '', '', '099 311 7016', '', '', '', '', '', '', '', '', 'Kesten 12', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(345, 'Šlezak', 'prezime', 0, 0, '', '', '099 209 1019', '', '', '', '', '', '', '', '', 'Kesten 33', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(346, 'Rora', 'prezime', 0, 0, '', '', '098 570 359', '', '', '', '', '', '', '', '', 'Martina Divalta 144', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(347, 'Pavle', 'Vidaković', 0, 0, '', '', '098 690 771', '', '', '', '', '', '', '', '', 'Martina Divalta 230', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(348, 'Ivana', 'Pejić-Šmit', 0, 0, '', '', '0915015850', '', '', '', '', '', '', '', '', 'Hrv. Republike 31c', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(349, 'Tomo', 'Čizmadija', 0, 0, '', '', '091 203 1116', '', '', '', '', '', '', '', '', 'Murska 8', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(350, 'Lignjo', 'prezime', 0, 123, '', '', '23123231', '', '', '', '', '', '', '', '', 'Peppermint', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(351, 'Vanja', 'Ostojic', 0, 0, '', '', '031273022', '', '', '', '', '', '', '', '', 'Sprecanska 15', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(352, 'Irena', 'Krtić-Jobst', 0, 0, '', '', '098299842', '', '', '', '', '', '', '', '', 'Stepinčeva 20', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(353, 'Helen0a', 'Ppejić-Jukić', 0, 0, '', '', '0915339456', '', '', '', '', '', '', '', '', 'Ciglarska 9a', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(354, 'Danijel', 'Vrgoč', 0, 0, '', '', '123', '', '', '', '', '', '', '', '', 'Inchoo', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(355, 'Stipešević', 'Stipa', 0, 0, '', '', '099 379 0540', '', '', '', '', '', '', '', '', 'Huttlerova 20 b', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(356, 'Kristina', 'Bajus', 0, 1, '', '', '091 4580 508', '', '', '', '', '', '', '', '', 'Ciglarska 11a', '', 83, 14, '', '', '2016-11-23 18:25:37', '2016-11-23 18:25:37', NULL),
(371, 'Marko', 'Dujevski', 2, 987654321, '', 'Vedran Zezelj', '272654', '654272', 'Ovo je napomena', '', '', '1', 'iwan.javorovic@gmail.com', 've.zezelj@gmail.com', '', 'Savska 81', '18', 1, 1, '', '', '2016-12-11 02:42:32', '2016-12-11 03:51:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `workshops`
--

CREATE TABLE IF NOT EXISTS `workshops` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `permalink` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `workshops_entry`
--

CREATE TABLE IF NOT EXISTS `workshops_entry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `workshop_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
