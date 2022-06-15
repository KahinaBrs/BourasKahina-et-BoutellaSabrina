-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 15 juin 2022 à 00:41
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bdd-site`
--

-- --------------------------------------------------------

--
-- Structure de la table `adminpassword`
--

CREATE TABLE `adminpassword` (
  `mdp` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `adminpassword`
--

INSERT INTO `adminpassword` (`mdp`) VALUES
('e6678008a4e7e88a8905daf695c76687');

-- --------------------------------------------------------

--
-- Structure de la table `alerte`
--

CREATE TABLE `alerte` (
  `id` int(100) NOT NULL,
  `nomanimal` varchar(100) CHARACTER SET utf8 NOT NULL,
  `animal` varchar(100) CHARACTER SET utf8 NOT NULL,
  `idmaitre` varchar(100) CHARACTER SET utf8 NOT NULL,
  `img` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `alerte`
--

INSERT INTO `alerte` (`id`, `nomanimal`, `animal`, `idmaitre`, `img`) VALUES
(19, 'princesse', 'chat', '1', 'z.33.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

CREATE TABLE `chat` (
  `id` int(100) NOT NULL,
  `nom` varchar(100) CHARACTER SET utf8 NOT NULL,
  `race` varchar(100) CHARACTER SET utf8 NOT NULL,
  `age` varchar(100) CHARACTER SET utf8 NOT NULL,
  `sexe` varchar(100) CHARACTER SET utf8 NOT NULL,
  `apropos` varchar(100) CHARACTER SET utf8 NOT NULL,
  `img` varchar(100) CHARACTER SET utf8 NOT NULL,
  `idchat` int(100) NOT NULL,
  `validationadmin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `chat`
--

INSERT INTO `chat` (`id`, `nom`, `race`, `age`, `sexe`, `apropos`, `img`, `idchat`, `validationadmin`) VALUES
(1, 'princesse', 'siamois', '1an', 'Femelle', 'elle aime bien jouer', 'z.33.jpg', 1, 1),
(13, 'michou', 'siamois', '1moi', 'Femelle', 'trop mimi', 'z.33.jpg', 17, 0),
(13, 'mimi', 'siamois', '1moi', 'Femelle', 'elle aime bien jouer ', 'chat23.png', 18, 1);

-- --------------------------------------------------------

--
-- Structure de la table `chien`
--

CREATE TABLE `chien` (
  `id` int(100) NOT NULL,
  `nom` varchar(100) CHARACTER SET utf8 NOT NULL,
  `race` varchar(100) CHARACTER SET utf8 NOT NULL,
  `age` varchar(100) CHARACTER SET utf8 NOT NULL,
  `sexe` varchar(100) CHARACTER SET utf8 NOT NULL,
  `apropos` varchar(100) CHARACTER SET utf8 NOT NULL,
  `img` varchar(100) CHARACTER SET utf8 NOT NULL,
  `idchien` int(100) NOT NULL,
  `validationadmin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `chien`
--

INSERT INTO `chien` (`id`, `nom`, `race`, `age`, `sexe`, `apropos`, `img`, `idchien`, `validationadmin`) VALUES
(9, 'vicky', 'chow-chow', '1an', 'Male', 'il bien la douche', 'z.53.jpg', 1, 1),
(1, 'Lilou', 'Pitbull', '1an', 'Male', 'il es bien dresser', 'z.56.jpg', 2, 1),
(11, 'koukitou', 'bergie', '2ans', 'Male', 'koukitou', '674710-4.jpg', 10, 1),
(11, 'chiwa', 'chiwawa', '1moi', 'Male', 'chiwawa gentil', 'z.3.png', 12, 1),
(11, 'kerby', 'caniche', '2mois', 'Male', 'il aime bien dormir', 'z.53.jpg', 13, 1);

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

CREATE TABLE `demande` (
  `nbr` int(100) NOT NULL,
  `nom` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `numero` varchar(100) CHARACTER SET utf8 NOT NULL,
  `animal` varchar(100) CHARACTER SET utf8 NOT NULL,
  `idanimal` int(100) NOT NULL,
  `idmaitre` int(100) NOT NULL,
  `msg` text CHARACTER SET utf8 NOT NULL,
  `adoptant` varchar(100) CHARACTER SET utf8 NOT NULL,
  `img` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `demande`
--

INSERT INTO `demande` (`nbr`, `nom`, `email`, `numero`, `animal`, `idanimal`, `idmaitre`, `msg`, `adoptant`, `img`) VALUES
(19, 'benhamadi malika', 'benhamadi.ml@gmail.com', '0772123605', 'chat', 1, 1, 'je veux vraiment adopter ', 'Oui', 'z.45.jpg'),
(20, 'lina', 'lina.am@gmail.com', '0666262805', 'chat', 18, 13, 'demande d\'adoption d\'un membre', 'Oui', 'chat23.png');

-- --------------------------------------------------------

--
-- Structure de la table `demande2`
--

CREATE TABLE `demande2` (
  `nbr` int(100) NOT NULL,
  `iddemande` int(100) NOT NULL,
  `animal` varchar(100) CHARACTER SET utf8 NOT NULL,
  `race` varchar(100) CHARACTER SET utf8 NOT NULL,
  `age` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `demande2`
--

INSERT INTO `demande2` (`nbr`, `iddemande`, `animal`, `race`, `age`) VALUES
(1, 12, '', 'angora', '1moi'),
(2, 11, '', 'bergie', '2ans'),
(3, 11, 'chien', 'bergie', '1moi'),
(5, 19, 'chat', 'siamois', '1an');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id` int(100) NOT NULL,
  `nom` varchar(100) CHARACTER SET utf8 NOT NULL,
  `prenom` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `numero` text CHARACTER SET utf8 NOT NULL,
  `genre` varchar(100) CHARACTER SET utf8 NOT NULL,
  `mdp` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id`, `nom`, `prenom`, `email`, `numero`, `genre`, `mdp`) VALUES
(11, 'lina', 'ammar', 'lina.am@gmail.com', '0666262805', 'Femme', '8aa6dcacb8636da7fc70670c1addfba8'),
(12, 'nesrine', 'bouras', 'nesrine.bou@gmail.com', '0666288001', 'Femme', '5b69d570c33c1ddf650dfd5d56d43810'),
(13, 'bouras', 'kahina', 'kahina.bou@gmail.com', '0666288005', 'Femme', 'e28b2a6c8700034048f3c5bb13130d6c'),
(14, 'boussaha', 'wassila', 'wassila.bsh@gmail.com', '0666288006', 'Femme', '85346efe2f018f77ffe62be9b0de5efe'),
(15, 'boutella', 'sabrina', 'sabrina.btl@gmail.com', '0666288002', 'Femme', '0e144ba4eaadd0d081fabef1fb303ab4'),
(16, 'bouras', 'fares', 'fares.bou@gmail.com', '0558006219', 'Homme', '8e323a7fe341e1219b08a09a87a7036b'),
(17, 'boumaaza', 'khawla', 'khawla.bmz@yahoo.com', '05502762701', 'Femme', 'b9be7ba71f0b26bdda350218433bbb56'),
(18, 'gaidi', 'haitem', 'haitem.gd@yahoo.com', '0550262704', 'Homme', '8a650f9c62cd323d74b5976029e28f54'),
(19, 'labiod', 'akram', 'akram.lb@yahoo.com', '0555288050', 'Homme', '3c2cceb450a1ef0c9975e3fadb5c0268'),
(20, 'merabet', 'mohamed', 'mohamed.mrt@yahoo.com', '0555288060', 'Homme', '551bbb7e3d6b4cfaeeb659ad4bc81445'),
(21, 'djafer', 'hamza', 'hamza.djf@gmail.com', '0666272802', 'Homme', 'a5780c0693c1fe790c92cf6530584a98');

-- --------------------------------------------------------

--
-- Structure de la table `oiseau`
--

CREATE TABLE `oiseau` (
  `id` int(100) NOT NULL,
  `nom` varchar(100) CHARACTER SET utf8 NOT NULL,
  `race` varchar(100) CHARACTER SET utf8 NOT NULL,
  `age` varchar(100) CHARACTER SET utf8 NOT NULL,
  `sexe` varchar(100) CHARACTER SET utf8 NOT NULL,
  `apropos` varchar(100) CHARACTER SET utf8 NOT NULL,
  `img` varchar(100) CHARACTER SET utf8 NOT NULL,
  `idoiseau` int(100) NOT NULL,
  `validationadmin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `oiseau`
--

INSERT INTO `oiseau` (`id`, `nom`, `race`, `age`, `sexe`, `apropos`, `img`, `idoiseau`, `validationadmin`) VALUES
(13, 'chouchou', 'chardonneret', '1moi', 'Male', 'il es calme', 'z.65.jpg', 6, 1);

-- --------------------------------------------------------

--
-- Structure de la table `poisson`
--

CREATE TABLE `poisson` (
  `id` int(100) NOT NULL,
  `nom` varchar(100) CHARACTER SET utf8 NOT NULL,
  `race` varchar(100) CHARACTER SET utf8 NOT NULL,
  `age` varchar(100) CHARACTER SET utf8 NOT NULL,
  `sexe` varchar(100) CHARACTER SET utf8 NOT NULL,
  `apropos` varchar(100) CHARACTER SET utf8 NOT NULL,
  `img` varchar(100) CHARACTER SET utf8 NOT NULL,
  `idpoisson` int(100) NOT NULL,
  `validationadmin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `poisson`
--

INSERT INTO `poisson` (`id`, `nom`, `race`, `age`, `sexe`, `apropos`, `img`, `idpoisson`, `validationadmin`) VALUES
(13, 'mimi', 'poisson rouge', '1moi', 'Femelle', 'elle est belle en aquarium ', 'z.86.jpg', 7, 1);

-- --------------------------------------------------------

--
-- Structure de la table `reptile`
--

CREATE TABLE `reptile` (
  `id` int(100) NOT NULL,
  `nom` varchar(100) CHARACTER SET utf8 NOT NULL,
  `race` varchar(100) CHARACTER SET utf8 NOT NULL,
  `age` varchar(100) CHARACTER SET utf8 NOT NULL,
  `sexe` varchar(100) CHARACTER SET utf8 NOT NULL,
  `apropos` varchar(100) CHARACTER SET utf8 NOT NULL,
  `img` varchar(100) CHARACTER SET utf8 NOT NULL,
  `idreptile` int(100) NOT NULL,
  `validationadmin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reptile`
--

INSERT INTO `reptile` (`id`, `nom`, `race`, `age`, `sexe`, `apropos`, `img`, `idreptile`, `validationadmin`) VALUES
(11, 'sisi', 'serpent ', '1moi', 'Femelle', 'elle bouge pas trop', 'h.4.jpg', 7, 0);

-- --------------------------------------------------------

--
-- Structure de la table `rongeur`
--

CREATE TABLE `rongeur` (
  `id` int(100) NOT NULL,
  `nom` varchar(100) CHARACTER SET utf8 NOT NULL,
  `race` varchar(100) CHARACTER SET utf8 NOT NULL,
  `age` varchar(100) CHARACTER SET utf8 NOT NULL,
  `sexe` varchar(100) CHARACTER SET utf8 NOT NULL,
  `apropos` varchar(100) CHARACTER SET utf8 NOT NULL,
  `img` varchar(100) CHARACTER SET utf8 NOT NULL,
  `idrongeur` int(100) NOT NULL,
  `validationadmin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adminpassword`
--
ALTER TABLE `adminpassword`
  ADD PRIMARY KEY (`mdp`);

--
-- Index pour la table `alerte`
--
ALTER TABLE `alerte`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`idchat`);

--
-- Index pour la table `chien`
--
ALTER TABLE `chien`
  ADD PRIMARY KEY (`idchien`);

--
-- Index pour la table `demande`
--
ALTER TABLE `demande`
  ADD PRIMARY KEY (`nbr`);

--
-- Index pour la table `demande2`
--
ALTER TABLE `demande2`
  ADD PRIMARY KEY (`nbr`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `oiseau`
--
ALTER TABLE `oiseau`
  ADD PRIMARY KEY (`idoiseau`);

--
-- Index pour la table `poisson`
--
ALTER TABLE `poisson`
  ADD PRIMARY KEY (`idpoisson`);

--
-- Index pour la table `reptile`
--
ALTER TABLE `reptile`
  ADD PRIMARY KEY (`idreptile`);

--
-- Index pour la table `rongeur`
--
ALTER TABLE `rongeur`
  ADD PRIMARY KEY (`idrongeur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chat`
--
ALTER TABLE `chat`
  MODIFY `idchat` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `chien`
--
ALTER TABLE `chien`
  MODIFY `idchien` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `demande`
--
ALTER TABLE `demande`
  MODIFY `nbr` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `demande2`
--
ALTER TABLE `demande2`
  MODIFY `nbr` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `oiseau`
--
ALTER TABLE `oiseau`
  MODIFY `idoiseau` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `poisson`
--
ALTER TABLE `poisson`
  MODIFY `idpoisson` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `reptile`
--
ALTER TABLE `reptile`
  MODIFY `idreptile` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `rongeur`
--
ALTER TABLE `rongeur`
  MODIFY `idrongeur` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
