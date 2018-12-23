-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 23 déc. 2018 à 23:04
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `drokavoka`
--

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

CREATE TABLE `specialite` (
  `id` int(11) NOT NULL,
  `specialite_name` varchar(60) DEFAULT NULL,
  `specialite_desc` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `specialite`
--

INSERT INTO `specialite` (`id`, `specialite_name`, `specialite_desc`) VALUES
(12, 'Droit civil & familial', 'Divorce & infidÃ©litÃ©,\r\nGarde des enfants,\r\nSuccession & patrimoine,\r\nPension alimentaire,\r\nChangement de nom/prÃ©nom,\r\nSuccessions,\r\nReconnaissance de paternitÃ©,\r\nVie privÃ©e,\r\nProcÃ©dure civile,\r\nContrat,\r\nResponsabilitÃ©,\r\nMariage,\r\nAdoption,\r\nVoisinage,\r\nBiens,\r\nVoies d\'execution,\r\nIndivisions'),
(13, 'Droit pÃ©nal', 'Escroquerie,\r\nAlcool & drogue,\r\nCoups & blessures,\r\nAbus de confiance,\r\nDroit pÃ©nal routier,\r\nCasier judiciaire,\r\nAtteinte aux personnes,\r\nVols,\r\nDÃ©lit,\r\nCour dâ€™assise,\r\nJuge des libertÃ©s et de la dÃ©tention,\r\nDroit pÃ©nal des affaires,\r\nJuge dâ€™instruction,\r\nVie privÃ©e,\r\nAtteinte aux biens,\r'),
(14, 'Droit administratif', 'Service public,\r\nContentieux,\r\nPole emploi,\r\nExcÃ¨s de pouvoir,\r\nCertificat de nationalitÃ©,\r\nSanctions administratives,\r\nSanctions disciplinaires,\r\nRecours plein,\r\nContrats publics,\r\nDroit administratif des biens,\r\nChangement de nom/prÃ©nom,\r\nAppels dâ€™offres,\r\nVisa,');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `specialite`
--
ALTER TABLE `specialite`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `specialite`
--
ALTER TABLE `specialite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
