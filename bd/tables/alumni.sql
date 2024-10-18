-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 18 oct. 2024 à 16:53
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
-- Structure de la table `alumni`
--

CREATE TABLE `alumni` (
  `idAlumni` int(11) NOT NULL,
  `photoAlumni` varchar(255) DEFAULT NULL,
  `nomAlumni` varchar(100) DEFAULT NULL,
  `prenomAlumni` varchar(100) DEFAULT NULL,
  `nbAnneeExpAlumni` int(11) DEFAULT NULL,
  `metier` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `alumni`
--

INSERT INTO `alumni` (`idAlumni`, `photoAlumni`, `nomAlumni`, `prenomAlumni`, `nbAnneeExpAlumni`, `metier`) VALUES
(1, 'alumni-picture-02', 'KOUADIO ', 'Josue', 30, ''),
(2, 'alumni-picture-02', 'KOUADIO', 'Josue', 15, 'Ingénieur Cyber Sécurité'),
(3, 'alumni-picture-02', 'TOURE', 'Wilfried', 50, 'E-Footballer mondial'),
(4, 'alumni-picture-02', 'TOURE', 'Wilfried', 50, 'E-Footballer mondial');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`idAlumni`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `idAlumni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
