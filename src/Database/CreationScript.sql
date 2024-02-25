-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 25 fév. 2024 à 22:06
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `amicale`
--

-- --------------------------------------------------------

--
-- Structure de la table `offers`
--

CREATE TABLE `offers` (
                          `id` int(11) NOT NULL,
                          `id_agent` int(11) NOT NULL,
                          `price` float NOT NULL,
                          `description` text NOT NULL,
                          `title` varchar(350) DEFAULT NULL,
                          `valid` tinyint(1) NOT NULL DEFAULT 0,
                          `type` int(11) NOT NULL,
                          `image` text NOT NULL,
                          `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `offers`
--

INSERT INTO `offers` (`id`, `id_agent`, `price`, `description`, `title`, `valid`, `type`, `image`, `date`) VALUES
                                                                                                               (2, 1, 12000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore\n                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut\n                    aliquip ex ea commodo consequat.\n                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore\n                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut\n                    aliquip ex ea commodo consequat.\n                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore\n                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut\n                    aliquip ex ea commodo consequat.', 'annonce de voiture de fou !!!!!!!!', 1, 1, 'databaseImages/voiture.jpg', '2024-02-16'),
                                                                                                               (3, 1, 300, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore\n                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut\n                    aliquip ex ea commodo consequat.\n                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore\n                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut\n                    aliquip ex ea commodo consequat.\n                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore\n                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut\n                    aliquip ex ea commodo consequat.', 'ps4', 1, 3, 'databaseImages/ps4.png', '2024-02-14'),
                                                                                                               (4, 1, 500, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore\n                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut\n                    aliquip ex ea commodo consequat.\n                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore\n                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut\n                    aliquip ex ea commodo consequat.\n                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore\n                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut\n                    aliquip ex ea commodo consequat.', 'pc', 1, 2, 'databaseImages/pc.png', '2024-02-02');

-- --------------------------------------------------------

--
-- Structure de la table `type_annonce`
--

CREATE TABLE `type_annonce` (
                                `id` int(11) NOT NULL,
                                `nom` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `type_annonce`
--

INSERT INTO `type_annonce` (`id`, `nom`) VALUES
                                             (1, 'location'),
                                             (2, 'vente'),
                                             (3, 'troc');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
                         `id` int(11) NOT NULL,
                         `code_agent` varchar(6) NOT NULL,
                         `mail` varchar(255) NOT NULL,
                         `phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `code_agent`, `mail`, `phone`) VALUES
    (1, '000000', 'quentin161204@gmail.com', '0000000000');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `offers`
--
ALTER TABLE `offers`
    ADD PRIMARY KEY (`id`),
  ADD KEY `id_agent` (`id_agent`),
  ADD KEY `type` (`type`);

--
-- Index pour la table `type_annonce`
--
ALTER TABLE `type_annonce`
    ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `offers`
--
ALTER TABLE `offers`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `type_annonce`
--
ALTER TABLE `type_annonce`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `offers`
--
ALTER TABLE `offers`
    ADD CONSTRAINT `id_agent` FOREIGN KEY (`id_agent`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `type` FOREIGN KEY (`type`) REFERENCES `type_annonce` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
