-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2018 at 10:24 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbchalk`
--

-- --------------------------------------------------------

--
-- Table structure for table `bcde`
--

CREATE TABLE `bcde` (
  `numbcde` int(11) NOT NULL,
  `datebcde` date NOT NULL,
  `numcli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `numcli` int(11) NOT NULL,
  `nomcli` varchar(255) COLLATE utf16_bin NOT NULL,
  `adressecli` varchar(255) COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`numcli`, `nomcli`, `adressecli`) VALUES
(24, 'mou', 'moi'),
(29, 'sqd', 'sqd'),
(32, 'ssdf', 'qSDF'),
(35, 'aZQESRDGFH', 'q<swdfcb'),
(36, 'wx', 'wx'),
(37, 'QSDF', 'WSDFG'),
(38, 'WDXFG', 'WXDFG'),
(39, 'QSDSGFG', 'QSDFG'),
(43, 'WX<WXCVBN', 'SD<XDGF'),
(44, 'QSDFG', '<WXF'),
(45, 'SDFG<SDFG', 'QSDF<qsd'),
(47, 'jsvq', 'jbwgh'),
(48, 'JKLJK', ' BHJBJ');

-- --------------------------------------------------------

--
-- Table structure for table `commander`
--

CREATE TABLE `commander` (
  `qtecmd` int(11) NOT NULL,
  `numbcde` int(11) NOT NULL,
  `codeprod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

-- --------------------------------------------------------

--
-- Table structure for table `couleur`
--

CREATE TABLE `couleur` (
  `codecoul` int(11) NOT NULL,
  `libcoul` varchar(255) COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `couleur`
--

INSERT INTO `couleur` (`codecoul`, `libcoul`) VALUES
(1, 'blanche');

-- --------------------------------------------------------

--
-- Table structure for table `facture`
--

CREATE TABLE `facture` (
  `numfact` int(11) NOT NULL,
  `numbcde` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

-- --------------------------------------------------------

--
-- Table structure for table `livraison`
--

CREATE TABLE `livraison` (
  `numliv` int(11) NOT NULL,
  `dateliv` date NOT NULL,
  `numfact` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `codeprod` int(11) NOT NULL,
  `libprod` varchar(255) COLLATE utf16_bin NOT NULL,
  `codecoul` int(11) NOT NULL,
  `codeqlt` int(11) NOT NULL,
  `pu` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`codeprod`, `libprod`, `codecoul`, `codeqlt`, `pu`) VALUES
(1, 'craie', 1, 1, 25);

-- --------------------------------------------------------

--
-- Table structure for table `qualité`
--

CREATE TABLE `qualité` (
  `codeqlt` int(11) NOT NULL,
  `libqlt` varchar(255) COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `qualité`
--

INSERT INTO `qualité` (`codeqlt`, `libqlt`) VALUES
(1, 'excellent');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf16_bin NOT NULL,
  `prenom` varchar(50) COLLATE utf16_bin NOT NULL,
  `password` varchar(50) COLLATE utf16_bin NOT NULL,
  `statut` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nom`, `prenom`, `password`, `statut`) VALUES
(1, 'DOGBEVI', 'Eliane', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 0),
(2, 'AMOUSSOU', 'Charlotte', 'b011585f518f86ac6adf7dd9de4f71447fdaec17', 0),
(3, 'DAVI', 'Miguel', 'cc6fffecd2290649e5a1e9572f0b79eebf865217', 0),
(4, 'ALI', 'Mouanz', 'nxsxbhjxbxjknqkshjbsjxnbwxnk', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bcde`
--
ALTER TABLE `bcde`
  ADD PRIMARY KEY (`numbcde`),
  ADD KEY `numcli` (`numcli`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`numcli`);

--
-- Indexes for table `commander`
--
ALTER TABLE `commander`
  ADD PRIMARY KEY (`qtecmd`),
  ADD KEY `numbcde` (`numbcde`),
  ADD KEY `codeprod` (`codeprod`);

--
-- Indexes for table `couleur`
--
ALTER TABLE `couleur`
  ADD PRIMARY KEY (`codecoul`);

--
-- Indexes for table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`numfact`),
  ADD KEY `numbcde` (`numbcde`);

--
-- Indexes for table `livraison`
--
ALTER TABLE `livraison`
  ADD PRIMARY KEY (`numliv`),
  ADD KEY `numfact` (`numfact`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`codeprod`),
  ADD KEY `codecoul` (`codecoul`),
  ADD KEY `codeqlt` (`codeqlt`);

--
-- Indexes for table `qualité`
--
ALTER TABLE `qualité`
  ADD PRIMARY KEY (`codeqlt`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bcde`
--
ALTER TABLE `bcde`
  MODIFY `numbcde` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `numcli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `commander`
--
ALTER TABLE `commander`
  MODIFY `qtecmd` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `couleur`
--
ALTER TABLE `couleur`
  MODIFY `codecoul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `facture`
--
ALTER TABLE `facture`
  MODIFY `numfact` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `livraison`
--
ALTER TABLE `livraison`
  MODIFY `numliv` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produit`
--
ALTER TABLE `produit`
  MODIFY `codeprod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `qualité`
--
ALTER TABLE `qualité`
  MODIFY `codeqlt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bcde`
--
ALTER TABLE `bcde`
  ADD CONSTRAINT `bcde_ibfk_1` FOREIGN KEY (`numcli`) REFERENCES `client` (`numcli`) ON DELETE CASCADE;

--
-- Constraints for table `commander`
--
ALTER TABLE `commander`
  ADD CONSTRAINT `commander_ibfk_2` FOREIGN KEY (`codeprod`) REFERENCES `produit` (`codeprod`),
  ADD CONSTRAINT `commander_ibfk_3` FOREIGN KEY (`numbcde`) REFERENCES `bcde` (`numbcde`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `facture_ibfk_1` FOREIGN KEY (`numbcde`) REFERENCES `bcde` (`numbcde`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `livraison`
--
ALTER TABLE `livraison`
  ADD CONSTRAINT `livraison_ibfk_1` FOREIGN KEY (`numfact`) REFERENCES `facture` (`numfact`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`codecoul`) REFERENCES `couleur` (`codecoul`),
  ADD CONSTRAINT `produit_ibfk_2` FOREIGN KEY (`codeqlt`) REFERENCES `qualité` (`codeqlt`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
