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
-- Structure de la table `actualite`
--

CREATE TABLE `actualite` (
  `idActualite` int(11) NOT NULL,
  `photoActualite` varchar(255) DEFAULT NULL,
  `titreActualite` varchar(200) DEFAULT NULL,
  `descripActualite` text DEFAULT NULL,
  `dateActualite` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `actualite`
--

INSERT INTO `actualite` (`idActualite`, `photoActualite`, `titreActualite`, `descripActualite`, `dateActualite`) VALUES
(1, 'actualite-02', 'Lancement du nouveau programme TWIN', 'L\'ESATIC inaugure son programme innovant en Technologies Web et Intelligence artificielle, ouvrant de nouvelles perspectives pour les étudiants en informatique.', '0000-00-00'),
(2, 'actualite-02', 'Lancement du nouveau programme TWIN', 'L\'ESATIC inaugure son programme innovant en Technologies Web et Intelligence artificielle, ouvrant de nouvelles perspectives pour les étudiants en informatique.', '0000-00-00'),
(3, 'actualite-02', 'Lancement du nouveau programme TWIN', 'L\'ESATIC inaugure son programme innovant en Technologies Web et Intelligence artificielle, ouvrant de nouvelles perspectives pour les étudiants en informatique.', '2024-10-17'),
(4, 'actualite-02', 'Lancement du nouveau programme TWIN', 'L\'ESATIC inaugure son programme innovant en Technologies Web et Intelligence artificielle, ouvrant de nouvelles perspectives pour les étudiants en informatique.', '2024-10-17'),
(5, 'image/actualite-02.png', 'Poulet ', 'Poulet rappeur', '2024-10-17'),
(6, NULL, 'Poulet ', 'Poulet rappeur', '2024-10-17'),
(7, 'actualite-02.png', 'Cabri', 'C\'est le cabri', '2024-10-18'),
(8, 'actualite-02', 'Cabri', 'Oui !!!', '2024-10-18'),
(9, 'actualite-02', 'Cabri', 'loehugigbssvcejgu', '2024-10-18');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actualite`
--
ALTER TABLE `actualite`
  ADD PRIMARY KEY (`idActualite`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actualite`
--
ALTER TABLE `actualite`
  MODIFY `idActualite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
