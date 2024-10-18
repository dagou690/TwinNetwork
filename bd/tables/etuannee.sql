-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 18 oct. 2024 à 16:54
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `twinnetwork`
--

-- --------------------------------------------------------

--
-- Structure de la table `etuannee`
--

CREATE TABLE `etuannee` (
  `idEtuAnnee` int(11) NOT NULL,
  `photoEtuAnnee` varchar(255) DEFAULT NULL,
  `nomEtuAnnee` varchar(100) DEFAULT NULL,
  `prenomEtuAnnee` varchar(100) DEFAULT NULL,
  `mgaEtuAnnee` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etuannee`
--

INSERT INTO `etuannee` (`idEtuAnnee`, `photoEtuAnnee`, `nomEtuAnnee`, `prenomEtuAnnee`, `mgaEtuAnnee`) VALUES
(1, 'student-fort-02 twin 3-02', 'KOUADIO', 'Josue', '18'),
(2, 'student-fort-02 twin2-02', 'KOUADIO', 'JOSUE NOEL YAO', '20'),
(3, '', NULL, NULL, NULL),
(4, 'student-fort-02 twin2-02', 'KOUADIO', 'JOSUE NOEL YAO', '20');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `etuannee`
--
ALTER TABLE `etuannee`
  ADD PRIMARY KEY (`idEtuAnnee`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `etuannee`
--
ALTER TABLE `etuannee`
  MODIFY `idEtuAnnee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
