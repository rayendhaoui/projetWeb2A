-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2023 at 06:34 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `animali`
--

-- --------------------------------------------------------

--
-- Table structure for table `livraison`
--

CREATE TABLE `livraison` (
  `idliv` int(30) NOT NULL,
  `idcmd` int(30) NOT NULL,
  `etat` varchar(30) NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `livraison`
--

INSERT INTO `livraison` (`idliv`, `idcmd`, `etat`, `adresse`, `date`) VALUES
(5, 18745, 'EMNA', 'BARDO KHAZNADAR', '2023-04-27'),
(7, 540000, 'En Attente', '58 rue du parc POELICAL BAME', '2023-06-08');

-- --------------------------------------------------------

--
-- Table structure for table `livreur`
--

CREATE TABLE `livreur` (
  `Nom` varchar(30) NOT NULL,
  `Prenom` varchar(30) NOT NULL,
  `Daten` date NOT NULL,
  `CIN` int(20) NOT NULL,
  `Adresse` varchar(30) NOT NULL,
  `Email` varchar(70) NOT NULL,
  `ID` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `livreur`
--

INSERT INTO `livreur` (`Nom`, `Prenom`, `Daten`, `CIN`, `Adresse`, `Email`, `ID`) VALUES
('Hassen', 'Marzoug', '2023-04-06', 14774147, '04 rue baghdadie cite des sous', 'hassen.marzoug@esprit.com', 1477),
('Folda', 'Maru', '2023-04-12', 23456789, '02 rue de l\'ancienne comedie', 'hASSEN@gmail.com', 14772),
('Emir', 'Lnr', '2023-05-30', 1236036, '43, Rue de Verdun', 'zoowixxg2a@gmail.com', 69123);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `role` varchar(50) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `image` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `role`, `login`, `password`, `image`) VALUES
(1, 'Hassen', 'Marzoug', 'livraison', 'hassen', '2001', 'img\\avatars\\hassen.png'),
(14, 'Emir', 'ln', 'livraison', 'emir', '1999', 'img\\avatars\\emir.png'),
(13, '4', 'malek1', 'commande', 'malek1', '123', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `livraison`
--
ALTER TABLE `livraison`
  ADD PRIMARY KEY (`idliv`);

--
-- Indexes for table `livreur`
--
ALTER TABLE `livreur`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `livraison`
--
ALTER TABLE `livraison`
  MODIFY `idliv` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `livreur`
--
ALTER TABLE `livreur`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69124;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
