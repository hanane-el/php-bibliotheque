-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 23 avr. 2020 à 13:33
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `librairie`
--

-- --------------------------------------------------------

--
-- Structure de la table `emprunts`
--

CREATE TABLE `emprunts` (
  `empnum` char(255) NOT NULL,
  `empdate` date DEFAULT NULL,
  `empdateret` date DEFAULT NULL,
  `empcodelivre` char(255) DEFAULT NULL,
  `empnumlect` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `emprunts`
--

INSERT INTO `emprunts` (`empnum`, `empdate`, `empdateret`, `empcodelivre`, `empnumlect`) VALUES
('11Wa', '2020-04-23', '2020-04-28', 'WaAlRo37', '111');

-- --------------------------------------------------------

--
-- Structure de la table `lecteurs`
--

CREATE TABLE `lecteurs` (
  `lecnum` char(16) NOT NULL,
  `lecnom` char(16) DEFAULT NULL,
  `lecprenom` char(16) DEFAULT NULL,
  `lecadresse` char(80) DEFAULT NULL,
  `lecville` char(16) DEFAULT NULL,
  `leccodepostal` char(10) DEFAULT NULL,
  `lecmotdepasse` char(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `lecteurs`
--

INSERT INTO `lecteurs` (`lecnum`, `lecnom`, `lecprenom`, `lecadresse`, `lecville`, `leccodepostal`, `lecmotdepasse`) VALUES
('000', 'tester', 'hanane', 'jjjjjjjjjjjj', 'jjjjjjjjjjjjj', '80000', 'hhhh'),
('111', 'test', 'hanane', 'jjjjjjjjjjjj', 'jjjjjjjjjjjjj', '80000', 'hhhh'),
('216', 'Lamy', 'Elena', '7 rue du Paradis', 'Paris', '75012', 'Elena'),
('221', 'Theos', 'Pablo', '3 passage Secret', 'Paris', '75004', 'Pablo'),
('342', 'Camden', 'Nicolas', '24 av du Papillon', 'Paris', '75013', 'Nicolas'),
('528', 'Line', 'Margo', '22 rue de la Liberté', 'Paris', '75005', 'Margo');

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

CREATE TABLE `livres` (
  `livcode` char(255) NOT NULL,
  `livnomaut` char(255) DEFAULT NULL,
  `livprenomaut` char(255) DEFAULT NULL,
  `livtitre` char(255) DEFAULT NULL,
  `livcategorie` char(255) DEFAULT NULL,
  `livISBN` char(255) DEFAULT NULL,
  `livdejareserve` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`livcode`, `livnomaut`, `livprenomaut`, `livtitre`, `livcategorie`, `livISBN`, `livdejareserve`) VALUES
('AsIsSc08', 'Asimov', 'Isaac', 'Fondation', 'Science-fiction', '2070415708', 1),
('BaJaJu63', 'Barrie', 'James M.', 'Peter Pan', 'Junior', '2290333263', 0),
('DiPhSc43', 'Dick', 'Philip K.', 'Blade Runner', 'Science-fiction', '2290314943', 1),
('KaElRo58', 'Kazan', 'Elia', 'L’arrangement', 'Roman', '2234023858', 1),
('KuMiRo38', 'Kundera', 'Milan', 'La plaisanterie', 'Roman', '2070703738', 0),
('VeJuRo22', 'Verne', 'Jules', 'L île mysterieuse', 'Roman', '0812966422', 0),
('WaAlRo37', 'Walker', 'Alice', 'La couleur pourpre', 'Roman', '2290021237', 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `emprunts`
--
ALTER TABLE `emprunts`
  ADD PRIMARY KEY (`empnum`);

--
-- Index pour la table `lecteurs`
--
ALTER TABLE `lecteurs`
  ADD PRIMARY KEY (`lecnum`);

--
-- Index pour la table `livres`
--
ALTER TABLE `livres`
  ADD PRIMARY KEY (`livcode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
