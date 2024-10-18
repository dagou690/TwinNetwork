-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 18 oct. 2024 à 17:35
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

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `publicationId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `comment` text NOT NULL,
  `date_comment` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `publicationId`, `userId`, `comment`, `date_comment`) VALUES
(1, 6, 2, 'waoooooooooo', '2024-10-18 01:58:31'),
(2, 6, 3, 'cool', '2024-10-18 02:05:17'),
(3, 8, 1, 'CHIC', '2024-10-18 11:03:36'),
(4, 7, 1, 'SUPER', '2024-10-18 11:03:45'),
(5, 8, 2, 'owwwwwww', '2024-10-18 13:34:48');

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

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `pseudo` text NOT NULL,
  `message` text NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `date_envoi` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `pseudo`, `message`, `userId`, `date_envoi`) VALUES
(0, '', 'salut', 2, '2024-10-18 15:34:19');

-- --------------------------------------------------------

--
-- Structure de la table `messagesprive`
--

CREATE TABLE `messagesprive` (
  `id` int(11) NOT NULL,
  `pseudo` text NOT NULL,
  `message` text NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `date_envoi` datetime DEFAULT current_timestamp(),
  `recipientId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `messagesprive`
--

INSERT INTO `messagesprive` (`id`, `pseudo`, `message`, `userId`, `date_envoi`, `recipientId`) VALUES
(0, '', 'bonsoir', 2, '2024-10-18 15:29:26', 1);

-- --------------------------------------------------------

--
-- Structure de la table `publications`
--

CREATE TABLE `publications` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date_pub` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `publications`
--

INSERT INTO `publications` (`id`, `userId`, `content`, `image`, `date_pub`) VALUES
(1, 2, 'Bonjour, je suis nouveau', 'uploads/1720171405513 .jpg', '2024-10-18 00:50:10'),
(2, 2, 'Bonjour, je suis nouveau', 'uploads/1720171405513 copie.jpg', '2024-10-18 00:54:14'),
(3, 2, 'Bonjour, je suis nouveau', 'uploads/1720171202654-copie.jpg', '2024-10-18 00:58:56'),
(4, 2, 'Bonjour, je suis nouveau', NULL, '2024-10-18 01:02:29'),
(5, 2, 'jj', 'uploads/logotwin&.png', '2024-10-18 01:40:19'),
(6, 2, 'jjj', 'téléchargement (3).jpeg', '2024-10-18 01:47:29'),
(7, 3, 'eede', 'téléchargement (2).jpeg', '2024-10-18 02:05:43'),
(8, 1, 'SALUT FAMLILLE', '1.png', '2024-10-18 11:03:28'),
(9, 2, 'jjeffef', 'compte.jpg', '2024-10-18 13:35:09');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `Nom` text NOT NULL,
  `Prenom` text NOT NULL,
  `Email` text NOT NULL,
  `motpasse` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idUser`, `Nom`, `Prenom`, `Email`, `motpasse`) VALUES
(1, 'TOURE', 'Wilfried', 'wilfried@gmail.com', 'geek'),
(2, 'KONAN', 'ERIC', 'konan@gmail.com', 'konan'),
(3, 'TANO', 'OKI', 'tano@gmail.com', 'tano');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actualite`
--
ALTER TABLE `actualite`
  ADD PRIMARY KEY (`idActualite`);

--
-- Index pour la table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`idAlumni`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `publicationId` (`publicationId`),
  ADD KEY `userId` (`userId`);

--
-- Index pour la table `etuannee`
--
ALTER TABLE `etuannee`
  ADD PRIMARY KEY (`idEtuAnnee`);

--
-- Index pour la table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actualite`
--
ALTER TABLE `actualite`
  MODIFY `idActualite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `idAlumni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `etuannee`
--
ALTER TABLE `etuannee`
  MODIFY `idEtuAnnee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `publications`
--
ALTER TABLE `publications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`publicationId`) REFERENCES `publications` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `user` (`idUser`);

--
-- Contraintes pour la table `publications`
--
ALTER TABLE `publications`
  ADD CONSTRAINT `publications_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
