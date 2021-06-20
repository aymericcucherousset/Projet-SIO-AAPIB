-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 20 juin 2021 à 16:03
-- Version du serveur :  10.4.19-MariaDB
-- Version de PHP : 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `intranet`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id_article` int(11) NOT NULL,
  `titre_article` varchar(200) NOT NULL,
  `contenu_article` text NOT NULL,
  `image_article` varchar(200) DEFAULT NULL,
  `date_article` date NOT NULL,
  `id_auteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_article`, `titre_article`, `contenu_article`, `image_article`, `date_article`, `id_auteur`) VALUES
(1, 'Artcile de test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse metus tellus, ultrices at dui eu, dictum egestas erat. Ut ullamcorper nec neque non euismod. Maecenas sit amet hendrerit mi. Ut sed consectetur lectus. Nulla maximus tempus pulvinar. Integer vel nisl sem. Proin et tempor lacus. Vestibulum euismod nibh nec venenatis dignissim. Phasellus nulla lectus, posuere vitae interdum at, fringilla id lectus. Nullam convallis ligula varius magna condimentum, at gravida lacus venenatis. Morbi tristique est est, varius finibus tortor accumsan in. Donec facilisis placerat ex ut posuere. ', NULL, '2021-06-01', 1),
(4, 'dhqshndqsjclsd,c', 'odjisocsidkcosdcpldscs\r\ndsqqcscqc', NULL, '2021-06-20', 1),
(5, 'testdsfdsfs', 'dsvdvdfiokvskdnzjksndv', NULL, '2021-06-20', 1),
(6, 'udqbsiuxsquidjsqin', 'zjdsndsjcsdcds', NULL, '2021-06-20', 1),
(7, 'dsjnskcnsjndcibqncqisncqsc', 'sqcqsiwjc,ksoiscodisdiclkxwkc,ksdcqsdq', NULL, '2021-06-20', 1),
(8, 'ccbbbuzcbbbbbbbbbb', 'bbbbb', 'http://localhost/intranet/uploads_article_picture/8.jpg', '2021-06-21', 1);

-- --------------------------------------------------------

--
-- Structure de la table `job_label`
--

CREATE TABLE `job_label` (
  `job_id` int(11) NOT NULL,
  `job_label` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `job_label`
--

INSERT INTO `job_label` (`job_id`, `job_label`) VALUES
(1, 'Technicien');

-- --------------------------------------------------------

--
-- Structure de la table `job_member`
--

CREATE TABLE `job_member` (
  `job_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `job_member`
--

INSERT INTO `job_member` (`job_id`, `user_id`, `status`) VALUES
(1, 1, 1),
(1, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `job_status`
--

CREATE TABLE `job_status` (
  `id_status` int(11) NOT NULL,
  `label_satus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `job_status`
--

INSERT INTO `job_status` (`id_status`, `label_satus`) VALUES
(1, 'En fonction'),
(2, 'Mi temps'),
(3, 'HF');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `id_service` int(11) NOT NULL,
  `name_service` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`id_service`, `name_service`) VALUES
(1, 'Service Informatique');

-- --------------------------------------------------------

--
-- Structure de la table `service_member`
--

CREATE TABLE `service_member` (
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `service_member`
--

INSERT INTO `service_member` (`user_id`, `service_id`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `image_path` varchar(75) DEFAULT 'https://via.placeholder.com/400/09f/fff.png',
  `join_date` date DEFAULT NULL,
  `disabled` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `last_name`, `first_name`, `email`, `image_path`, `join_date`, `disabled`) VALUES
(1, 'Cucherousset', 'Aymeric', 'aymeric.cucherousset@gmail.com', 'http://localhost/intranet/uploads_user_picture/1.jpg', '2021-06-10', 0),
(2, 'Lefebvre', 'Antoine', NULL, 'https://via.placeholder.com/400/09f/fff.png', '2021-06-17', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`),
  ADD KEY `fk_article_user` (`id_auteur`);

--
-- Index pour la table `job_label`
--
ALTER TABLE `job_label`
  ADD PRIMARY KEY (`job_id`);

--
-- Index pour la table `job_member`
--
ALTER TABLE `job_member`
  ADD PRIMARY KEY (`job_id`,`user_id`),
  ADD KEY `fk_jlabel_user` (`user_id`),
  ADD KEY `fk_jobStatus_jobMember` (`status`);

--
-- Index pour la table `job_status`
--
ALTER TABLE `job_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id_service`);

--
-- Index pour la table `service_member`
--
ALTER TABLE `service_member`
  ADD PRIMARY KEY (`user_id`,`service_id`),
  ADD KEY `fk_service_service_member` (`service_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `job_label`
--
ALTER TABLE `job_label`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `job_status`
--
ALTER TABLE `job_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `id_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_article_user` FOREIGN KEY (`id_auteur`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `job_member`
--
ALTER TABLE `job_member`
  ADD CONSTRAINT `fk_jlabel_jmember` FOREIGN KEY (`job_id`) REFERENCES `job_label` (`job_id`),
  ADD CONSTRAINT `fk_jlabel_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fk_jobStatus_jobMember` FOREIGN KEY (`status`) REFERENCES `job_status` (`id_status`);

--
-- Contraintes pour la table `service_member`
--
ALTER TABLE `service_member`
  ADD CONSTRAINT `fk_service_service_member` FOREIGN KEY (`service_id`) REFERENCES `service` (`id_service`),
  ADD CONSTRAINT `fk_user_service_member` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
