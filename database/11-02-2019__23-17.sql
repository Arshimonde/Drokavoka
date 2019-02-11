-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 11 fév. 2019 à 23:16
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.3.1

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
-- Structure de la table `avocat`
--

CREATE TABLE `avocat` (
  `id` int(11) NOT NULL,
  `gender` varchar(30) DEFAULT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `address` varchar(160) DEFAULT NULL,
  `city` varchar(60) DEFAULT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(60) NOT NULL,
  `gsm` varchar(30) DEFAULT NULL,
  `fix` varchar(30) DEFAULT NULL,
  `fax` varchar(30) DEFAULT NULL,
  `photo` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `avocat`
--

INSERT INTO `avocat` (`id`, `gender`, `first_name`, `last_name`, `address`, `city`, `email`, `password`, `gsm`, `fix`, `fax`, `photo`) VALUES
(8, 'mr', 'Oualid', 'El Abdii', 'Hay El Alaouine Rue El moussell', 'Temara', 'oualidelabdi@gmail.com', '1234', '060000000', NULL, NULL, 'public/lawyers_images/fogg-waiting-2.png'),
(35, 'mr', 'Lucky', 'Luck', '123 street church', 'toronto', 'test@gmail.com', '123', '60000000', NULL, NULL, 'public/lawyers_images/ex-trump-lawyer.jpg'),
(36, 'mr', 'John', 'Kyosaki', '123 street church', 'Las vegas', 'Arshimonde@gmail.com', '123', '60000000', NULL, NULL, 'public/lawyers_images/sign-up-lawyer-bg.png'),
(41, 'mr', 'Karim', 'Karim', '123 street church', 'Las vegas', 'Karim@gmail.com', '123', '60000000', NULL, NULL, 'public/lawyers_images/my_image.png');

-- --------------------------------------------------------

--
-- Structure de la table `avocat_specialite`
--

CREATE TABLE `avocat_specialite` (
  `id_avocat` int(11) NOT NULL,
  `id_specialite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `avocat_specialite`
--

INSERT INTO `avocat_specialite` (`id_avocat`, `id_specialite`) VALUES
(8, 14),
(8, 16),
(8, 17),
(35, 14),
(35, 16),
(35, 18),
(36, 12),
(36, 14),
(36, 18),
(41, 14),
(41, 17),
(41, 18);

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `type` varchar(80) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(120) DEFAULT NULL,
  `checked` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `notification`
--

INSERT INTO `notification` (`id`, `type`, `title`, `description`, `checked`) VALUES
(5, 'lawyer_insert', 'Nouveau avocat', 'John El Abdii Ã  rejoindre la communautÃ© de Drokavoka', 1),
(6, 'lawyer_insert', 'Nouveau avocat', '<b>Lucky Luck</b> Ã  rejoindre la communautÃ© de Drokavoka', 1),
(7, 'lawyer_insert', 'Nouveau avocat', '<b>Lucky Kyosaki</b> Ã  rejoindre la communautÃ© de Drokavoka', 1),
(8, 'lawyer_insert', 'Nouveau avocat', '<b>Lucky Luck</b> Ã  rejoindre la communautÃ© de Drokavoka', 1),
(9, 'lawyer_insert', 'Nouveau avocat', '<b>John Kyosaki</b> Ã  rejoindre la communautÃ© de Drokavoka', 1),
(10, 'lawyer_insert', 'Nouveau avocat', '<b>Karim Karim</b> Ã  rejoindre la communautÃ© de Drokavoka', 1);

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
(14, 'Droit administratif', 'Service public,\r\nContentieux,\r\nPole emploi,\r\nExcÃ¨s de pouvoir,\r\nCertificat de nationalitÃ©,\r\nSanctions administratives,\r\nSanctions disciplinaires,\r\nRecours plein,\r\nContrats publics,\r\nDroit administratif des biens,\r\nChangement de nom/prÃ©nom,\r\nAppels dâ€™offres,\r\nVisa,'),
(16, 'Droit de la santÃ©', 'Erreur mÃ©dicale,\r\nIndemnisation des victimes,\r\nDossier mÃ©dical,\r\nComplÃ©mentaire santÃ©,\r\nResponsabilitÃ©,\r\nPerte de salaire,\r\nInvaliditÃ©,\r\nSecret mÃ©dical,\r\nTraumatisme,\r\nMaladie,\r\nAssurance,\r\nObligation de moyens /rÃ©sultat,\r\nRÃ©siliation assurance,\r\nInformation des patients,\r\nRisques sanitaire'),
(17, 'Droit de l\'immobilier', 'PropriÃ©taires,\r\nLocataires,\r\nLocations,\r\nConstruction,\r\nTrouble du voisinage,\r\nTravaux,\r\nMalfaÃ§ons,\r\nBaux commerciaux,\r\nBaux,\r\nDroit de passage,\r\nServitude,\r\nPrÃ©avis,\r\nPermis de construire,\r\nSaisies immobiliÃ¨res,'),
(18, 'Droit de la consommation', 'Protection du consommateur,\r\nLitiges,\r\nPrÃªt Ã  la consommation,\r\nEscroquerie,\r\nClauses abusives,\r\nRÃ©siliation,\r\nRÃ©tractation,\r\nRecouvrement,\r\nE-Commerce,\r\nContrat,\r\nvente Ã  distance,\r\nArnaques,\r\nInternet,\r\nAbus de faiblesses,\r\nDÃ©marchage Ã  domicile,\r\nJeu et loterie,'),
(19, 'Droit du travail', 'Prud\'homme,\r\nRupture de contrat,\r\nContrat de travail,\r\nLicenciement,\r\nLicenciement Ã©conomique,\r\nMaladies & accidents,\r\nLicenciement pour faute,\r\nHarcÃ¨lement,\r\nDÃ©mission forcÃ©e,\r\nDÃ©mission,\r\nSalaire,\r\nLicenciement nÃ©gociÃ©,\r\nPrÃ©avis,\r\nRetraite,\r\nChÃ´mage,\r\nEmbauche,\r\nTemps de travail,\r\nAbsence'),
(20, 'Droit des entreprises', 'Redressement judiciaire,\r\nLiquidation,\r\nDroit des sociÃ©tÃ©s,\r\nAssociation,\r\nCrÃ©ation d\'entreprise,\r\nPropriÃ©tÃ© intellectuelle,\r\nSARL,\r\nFranchises,\r\nStatuts,\r\nDÃ©pÃ´t de bilan,\r\nContrat de travail,\r\nCession,\r\nParts sociales,\r\nRecouvrement,\r\nEURL,\r\nConcurrence,\r\nAuto-entrepreneur,\r\nFraude,\r\nRÃ©glem'),
(21, 'Droit commercial', 'Bail commercial,\r\nContrat,\r\nFonds de commerce,\r\nContrats avec un particulier,\r\nConcurrence dÃ©loyale/illicite,\r\nContrats entre professionnels,\r\nPaiement,\r\nCession de fonds de commerce,\r\nContrefaÃ§on,\r\nCession de clientÃ¨le,\r\nConditions gÃ©nÃ©rales de vente,\r\nDÃ©sÃ©quilibre contractuel,\r\nClientÃ¨le,\r'),
(22, 'Droit des assurances', 'Accident de la route,\r\nResponsabilitÃ© civile,\r\nRÃ©siliation,\r\nAssurance automobile,\r\nAssurance habitation,\r\nSinistre,\r\nFausse dÃ©claration,\r\nIncendies,\r\nAssurance emprunteur,\r\nRisques,\r\nDÃ©gradations,\r\nMutuelle,'),
(23, 'Droit routier', 'Code de la route,\r\nAlcools & drogues,\r\nExcÃ¨s de vitesse,\r\nDÃ©lit de fuite,\r\nRÃ©tention/suspension de permis,\r\nContester une amende,\r\nAccidents de la route,\r\nStupÃ©fiant,\r\nPermis Ã  points,\r\nVictimes,\r\nRefus d\'obtempÃ©rer,\r\nInfractions,\r\nAmendes (classes/montant),\r\nOrdonnance pÃ©nale,\r\nRÃ©cupÃ©rer d'),
(24, 'Droit de la propriÃ©tÃ© intellectuelle', 'Droit dâ€™auteur,\r\nINPI,\r\nContrefaÃ§on,\r\nLicence,\r\nCession,\r\nDÃ©pÃ´t de marque,\r\nDroit des marques,\r\nConcurrence dÃ©loyale,\r\nPlagiat,\r\nInternet,\r\nConstat d\'huissier,\r\nDroit moraux et patrimoniaux,\r\nVente de droit d\'auteur,\r\nNoms de domaine,\r\nDÃ©nomination,\r\nRoyalties,\r\nCopyright,\r\nInvention,'),
(25, 'Droit des nouvelles technologies', 'E-Commerce,\r\nLicences logiciels,\r\nLitige,\r\nCNIL,\r\nContrat en ligne,\r\nSite Internet,\r\nConstat d\'huissier,\r\nAdresses IP,\r\nMentions lÃ©gales,\r\nArnaque,\r\nNom de domaine,\r\nValiditÃ© dâ€™un site,\r\nDonnÃ©es personnels,\r\nHÃ©bergeur,\r\nÃ©diteur,\r\nFournisseur d\'accÃ¨s (FAI),\r\nHADOPI,\r\nParasitisme,\r\nHÃ©bergeurs'),
(26, 'Droit de l\'image & presse', 'Diffamation,\r\nVie privÃ©e,\r\nPhoto,\r\nLibertÃ© dâ€™expression,\r\nInternet,\r\nInjures,'),
(27, 'Droit des Ã©trangers', 'Titre de sÃ©jour,\r\nNaturalisation,\r\nImmigration,\r\nRegroupement familial,\r\nCarte de rÃ©sident,\r\nMariage blanc,\r\nReconduite aux frontiÃ¨res,\r\nAsile,\r\nTravailler en France,\r\nTravailler Ã  l\'Ã©tranger,\r\nPasseport,\r\nConsulat,'),
(28, 'Droit comptable & fiscal', 'ImpÃ´t sur la fortune (ISF),\r\nImpÃ´t sur le revenu,\r\nContrÃ´le fiscal,\r\nImpÃ´t sur les sociÃ©tÃ©s,\r\nDroits dâ€™enregistrement,\r\nDÃ©claration,\r\nStock option,\r\nTVA,\r\nRecouvrement,\r\nMajoration,'),
(29, 'Droit bancaire', 'PrÃªt,\r\nObligation d\'information,\r\nDroit du crÃ©dit,\r\nDevoir de conseil,\r\nRecouvrement,\r\nComptes en banques,\r\nSecret bancaire,\r\nFinancement,\r\nAgios,'),
(30, 'Droit des transports', 'Transport aÃ©rien,\r\nAffaires maritimes,\r\nContrat de transport,\r\nTransport terrestre,\r\nCadre juridique,\r\nObligations & responsabilitÃ©s,\r\nTransport maritime,\r\nImport/export,\r\nIndemnitÃ©s forfaitaires,\r\nAssureurs maritimes,\r\nAffrÃ¨tements,\r\nPorts,\r\nArmateurs,\r\nRisk manager,\r\nAgent courtiers maritimes,');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `avocat`
--
ALTER TABLE `avocat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `avocat_specialite`
--
ALTER TABLE `avocat_specialite`
  ADD PRIMARY KEY (`id_avocat`,`id_specialite`),
  ADD KEY `avocat_specialite_fk2` (`id_specialite`);

--
-- Index pour la table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `specialite`
--
ALTER TABLE `specialite`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `avocat`
--
ALTER TABLE `avocat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pour la table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `specialite`
--
ALTER TABLE `specialite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avocat_specialite`
--
ALTER TABLE `avocat_specialite`
  ADD CONSTRAINT `avocat_specialite_fk1` FOREIGN KEY (`id_avocat`) REFERENCES `avocat` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `avocat_specialite_fk2` FOREIGN KEY (`id_specialite`) REFERENCES `specialite` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
