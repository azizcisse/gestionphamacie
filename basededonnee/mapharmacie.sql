-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 28 août 2022 à 12:28
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mapharmacie`
--

-- --------------------------------------------------------

--
-- Structure de la table `boncommande`
--

CREATE TABLE `boncommande` (
  `idboncommande` int(11) NOT NULL,
  `numerobon` bigint(20) NOT NULL,
  `nomboncom` varchar(50) DEFAULT NULL,
  `quantitecommande` double NOT NULL,
  `dateboncom` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idutilisateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `boncommande`
--

INSERT INTO `boncommande` (`idboncommande`, `numerobon`, `nomboncom`, `quantitecommande`, `dateboncom`, `idutilisateur`) VALUES
(1, 63, 'Paracetamol', 18, '2022-08-27 19:06:23', 1);

-- --------------------------------------------------------

--
-- Structure de la table `echange`
--

CREATE TABLE `echange` (
  `idechange` int(11) NOT NULL,
  `nompharmacie` varchar(50) DEFAULT NULL,
  `medicament` varchar(50) DEFAULT NULL,
  `typechange` varchar(50) DEFAULT NULL,
  `quantite` double NOT NULL,
  `datecreation` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idmedicament` int(11) DEFAULT NULL,
  `idutilisateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `echange`
--

INSERT INTO `echange` (`idechange`, `nompharmacie`, `medicament`, `typechange`, `quantite`, `datecreation`, `idmedicament`, `idutilisateur`) VALUES
(1, 'De La Garde', 'Dafalgan', 'Enfant', 100, '2022-08-27 19:05:40', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `medicament`
--

CREATE TABLE `medicament` (
  `idmedica` int(11) NOT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `numeromed` bigint(20) DEFAULT NULL,
  `nomedica` varchar(50) DEFAULT 'NULL',
  `typemedica` varchar(45) DEFAULT NULL,
  `quantite` double DEFAULT NULL,
  `prixpopulaire` double DEFAULT NULL,
  `conditionnement` varchar(50) DEFAULT NULL,
  `datecreation` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dateexpiration` date DEFAULT NULL,
  `idutilisateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `medicament`
--

INSERT INTO `medicament` (`idmedica`, `photo`, `numeromed`, `nomedica`, `typemedica`, `quantite`, `prixpopulaire`, `conditionnement`, `datecreation`, `dateexpiration`, `idutilisateur`) VALUES
(1, 'images.jpg', 10, 'Dafalgan', 'Adulte', 20, 850, 'Midi', '2022-08-27 17:31:23', '2023-06-22', 1),
(2, 'téléchargement.jfif', 12, 'Doliprane', 'Adulte', 120, 1500, 'Midi', '2022-08-27 18:46:07', '2024-08-20', 2);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idutilisateur` int(11) NOT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `age` date DEFAULT NULL,
  `sexe` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `etat` int(1) DEFAULT NULL,
  `login` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `idmedicament` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idutilisateur`, `prenom`, `nom`, `age`, `sexe`, `type`, `etat`, `login`, `email`, `password`, `idmedicament`) VALUES
(1, 'Khadija', 'Kamara', '1995-08-18', 'Feminin', 'Administrateur', 1, 'dikha', 'dikha@gmail.com', '123456', 1),
(2, 'Aziz', 'Sarr', '1994-10-18', 'Masculin', 'Employe', 0, 'aziz', 'aziz@gmail.com', '123456', 1),
(3, 'Abdou', 'Kamara', '1998-08-10', 'Masculin', 'Employe', 1, 'abdou', 'abdou@gmail.com', '123456', 1);

-- --------------------------------------------------------

--
-- Structure de la table `vente`
--

CREATE TABLE `vente` (
  `idvente` int(11) NOT NULL,
  `nomedic` varchar(50) DEFAULT NULL,
  `typmedic` varchar(50) DEFAULT NULL,
  `quantite` double DEFAULT NULL,
  `conditionnement` varchar(45) DEFAULT NULL,
  `prixmed` double DEFAULT NULL,
  `datecreation` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idmedicament` int(11) DEFAULT NULL,
  `idutilisateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `vente`
--

INSERT INTO `vente` (`idvente`, `nomedic`, `typmedic`, `quantite`, `conditionnement`, `prixmed`, `datecreation`, `idmedicament`, `idutilisateur`) VALUES
(1, 'Doliprane', 'Enfant', 14, 'Matin', 500, '2022-08-27 18:49:02', NULL, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `boncommande`
--
ALTER TABLE `boncommande`
  ADD PRIMARY KEY (`idboncommande`),
  ADD KEY `idutilisateur` (`idutilisateur`);

--
-- Index pour la table `echange`
--
ALTER TABLE `echange`
  ADD PRIMARY KEY (`idechange`),
  ADD KEY `idmedicament` (`idmedicament`),
  ADD KEY `idutilisateur` (`idutilisateur`);

--
-- Index pour la table `medicament`
--
ALTER TABLE `medicament`
  ADD PRIMARY KEY (`idmedica`),
  ADD KEY `idutilisateur` (`idutilisateur`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idutilisateur`),
  ADD KEY `idmedicament` (`idmedicament`);

--
-- Index pour la table `vente`
--
ALTER TABLE `vente`
  ADD PRIMARY KEY (`idvente`),
  ADD KEY `idmedicament` (`idmedicament`),
  ADD KEY `idutilisateur` (`idutilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `boncommande`
--
ALTER TABLE `boncommande`
  MODIFY `idboncommande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `echange`
--
ALTER TABLE `echange`
  MODIFY `idechange` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `medicament`
--
ALTER TABLE `medicament`
  MODIFY `idmedica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idutilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `vente`
--
ALTER TABLE `vente`
  MODIFY `idvente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `boncommande`
--
ALTER TABLE `boncommande`
  ADD CONSTRAINT `boncommande_ibfk_1` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`);

--
-- Contraintes pour la table `echange`
--
ALTER TABLE `echange`
  ADD CONSTRAINT `echange_ibfk_1` FOREIGN KEY (`idmedicament`) REFERENCES `medicament` (`idmedica`),
  ADD CONSTRAINT `echange_ibfk_2` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`);

--
-- Contraintes pour la table `medicament`
--
ALTER TABLE `medicament`
  ADD CONSTRAINT `medicament_ibfk_1` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`idmedicament`) REFERENCES `medicament` (`idmedica`);

--
-- Contraintes pour la table `vente`
--
ALTER TABLE `vente`
  ADD CONSTRAINT `vente_ibfk_1` FOREIGN KEY (`idmedicament`) REFERENCES `medicament` (`idmedica`),
  ADD CONSTRAINT `vente_ibfk_2` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
