-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 20 juin 2023 à 04:35
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `datamarket`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

CREATE TABLE `annonce` (
  `id` int(11) NOT NULL,
  `titre` varchar(25) NOT NULL,
  `categorie_id` int(11) DEFAULT NULL,
  `auteur` int(11) DEFAULT NULL,
  `date_creation` date NOT NULL DEFAULT current_timestamp(),
  `prix` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`id`, `titre`, `categorie_id`, `auteur`, `date_creation`, `prix`, `description`) VALUES
(1, 'chaise en bois', 2, 6, '2023-06-06', 30, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sed aliquam massa. Nam ultrices interdum eros eu dignissim. Morbi est ex, rhoncus eu diam vitae, faucibus imperdiet velit. Cras elementum dui vitae molestie cursus.'),
(2, 'cable USB type-C', 6, 7, '2023-06-06', 7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sed aliquam massa. Nam ultrices interdum eros eu dignissim. Morbi est ex, rhoncus eu diam vitae, faucibus imperdiet velit. Cras elementum dui vitae molestie cursus.'),
(3, 'tapis 20X10 ', 2, 6, '2023-06-06', 25, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sed aliquam massa. Nam ultrices interdum eros eu dignissim. Morbi est ex, rhoncus eu diam vitae, faucibus imperdiet velit. Cras elementum dui vitae molestie cursus.'),
(4, 'Calculatrice', 7, 10, '2023-06-06', 54, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sed aliquam massa. Nam ultrices interdum eros eu dignissim. Morbi est ex, rhoncus eu diam vitae, faucibus imperdiet velit. Cras elementum dui vitae molestie cursus.'),
(5, 'Disque SSD 1', 5, 3, '2023-06-06', 65, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sed aliquam massa. Nam ultrices interdum eros eu dignissim. Morbi est ex, rhoncus eu diam vitae, faucibus imperdiet velit. Cras elementum dui vitae molestie cursus.'),
(7, 'lit', 2, 3, '2023-06-20', 150, 'Disponible en :\r\n140x190 cm, 160x200 cm, Sans sommier, Avec sommier, Sans matelas\r\n\r\nAvec sa tête de lit composée de rangements, ses 2 tiroirs, ses 2 niches latérales et son coffre en bout de lit, le lit LEANDRE allie l&#039;utile à l&#039;agréable en vou');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `titre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `titre`) VALUES
(1, 'AUTRE...'),
(2, 'MEUBLE'),
(3, 'VÊTEMENT	'),
(4, 'BRICOLAGE'),
(5, 'INFORMATIQUE'),
(6, 'ACCESSOIRE'),
(7, 'FOURNITURE'),
(8, 'BRICOLAGE'),
(9, 'CHAUSSURE'),
(10, 'SPORT');

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

CREATE TABLE `chat` (
  `message_id` int(11) NOT NULL,
  `user1_id` int(11) NOT NULL,
  `user2_id` int(11) NOT NULL,
  `message_user1` varchar(255) DEFAULT NULL,
  `message_user2` varchar(255) DEFAULT NULL,
  `send_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `chat`
--

INSERT INTO `chat` (`message_id`, `user1_id`, `user2_id`, `message_user1`, `message_user2`, `send_at`) VALUES
(1, 3, 6, 'bonjour je suis interessé', NULL, '2023-06-13 16:27:32'),
(2, 3, 6, NULL, 'trois autre personne son interessé par cette annonce', '2023-06-13 16:29:11'),
(3, 3, 6, 'je vous propose 5% de plus du prix', NULL, '2023-06-13 16:30:07'),
(4, 5, 10, 'bonjour de quel type est ce?', NULL, '2023-06-13 16:32:14'),
(5, 5, 10, NULL, 'une CASIO....', '2023-06-13 16:32:45'),
(6, 5, 10, NULL, 'avec une fonction matrix', '2023-06-13 17:06:39'),
(7, 3, 6, 'alors que dit vous?', NULL, '2023-06-17 21:49:43');

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `favoris_id` int(11) NOT NULL,
  `annonce_id` int(11) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `favoris`
--

INSERT INTO `favoris` (`favoris_id`, `annonce_id`, `user`) VALUES
(1, 1, 5),
(2, 4, 2),
(5, 4, 3),
(6, 5, 3),
(7, 5, 5),
(8, 1, 5),
(9, 2, 5),
(10, 3, 5),
(12, 7, 3);

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

CREATE TABLE `offre` (
  `offre_id` int(11) NOT NULL,
  `auteur_offre` int(11) NOT NULL,
  `proposition` int(11) NOT NULL,
  `annonce_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `offre`
--

INSERT INTO `offre` (`offre_id`, `auteur_offre`, `proposition`, `annonce_id`) VALUES
(4, 1, 40, 4),
(5, 1, 50, 4),
(6, 1, 15, 4),
(7, 1, 30, 4),
(8, 4, 40, 5),
(9, 4, 70, 5),
(10, 4, 80, 5),
(16, 6, 50, 4),
(17, 3, 10, 2),
(21, 3, 10, 2),
(24, 3, 55, 4),
(25, 3, 45, 4),
(26, 3, 60, 4),
(27, 3, 50, 4),
(28, 3, 30, 4),
(29, 3, 64, 4),
(30, 3, 30, 4);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'client'),
(2, 'Manager');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `id_role` int(11) NOT NULL DEFAULT 1,
  `date_inscription` datetime NOT NULL DEFAULT current_timestamp(),
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `passworld` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `codePostal` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `id_role`, `date_inscription`, `nom`, `prenom`, `pseudo`, `passworld`, `email`, `telephone`, `ville`, `codePostal`) VALUES
(1, 2, '2023-06-06 21:15:15', 'moi', 'moi', 'Admin', '21232f297a57a5a743894a0e4a801fc3', 'posuere.enim@hotmail.org', '02 64 85 43 ', 'Niort', '41422'),
(2, 1, '2023-06-06 21:15:15', 'Patience', 'Mcdaniel', 'Mcdoll', '99c2f9266f266c64b000fbfe082a0064', 'vel.est@google.net', '04 77 84 84 ', 'Clermont-Ferrand', '85557'),
(3, 1, '2023-06-06 21:15:15', 'Alisa', 'Vaughan', 'VerNo01', '1a2cb50d50fd051021a985998f5eba64', 'lorem.ut@outlook.com', '09 60 63 58 ', 'Strasbourg', '29481'),
(4, 1, '2023-06-06 21:15:15', 'Paul', 'Mcintosh', 'Polo502', '5ea479b4693a2c25cefd8c8d7b4c8901', 'leo@yahoo.org', '06 75 55 71 ', 'Thionville', '78734'),
(5, 1, '2023-06-06 21:15:15', 'Chaim', 'Cobb', 'Cobwo', '4f8a035ead291f7d64cbca7a423abcbd', 'risus.donec.egestas@google.org', '06 11 62 54 ', 'Vitry-sur-Seine', '18399'),
(6, 1, '2023-06-06 21:18:02', 'Richard', 'Dalton', 'Joh', '69abe26ccffcf207dec8a161b5df71e2', 'vel.turpis@icloud.com', '04 04 67 73 ', 'MONTREUIL', '93048'),
(7, 1, '2023-06-06 21:18:02', 'Laith', 'Carlson', 'Lay', '7c718c6da874ea6e4b27c6d70bc4e7e8', 'vehicula@icloud.net', '04 75 68 93 ', 'Rueil-Malmaison', '73628'),
(8, 1, '2023-06-06 21:18:02', 'Kameko', 'Joyce', 'Kamejo', 'aede4e09d94d2efaeda2c2a02f6c6f12', 'sit.amet@protonmail.org', '02 99 52 58 ', 'Troyes', '65258'),
(9, 1, '2023-06-06 21:18:02', 'Beatrice', 'Franks', 'Franken', 'd649bfdbf3f6372d6d30cc81004761fe', 'orci@icloud.com', '06 88 47 10 ', 'Brest', '66681'),
(10, 1, '2023-06-06 21:18:02', 'Sebastian', 'Moss', 'Mosso01', 'Franken', 'sociosqu.ad@protonmail.net', '02 73 22 89 ', 'Dijon', '85565'),
(12, 1, '2023-06-17 20:22:34', 'Ngolo', 'tobiase', 'tobola0770', 'a0ba18558906faf3378f32b9dbea797a', 'toboNgo@hot.cu', '07 85 54 52 42', 'melun', '77000'),
(13, 1, '2023-06-17 20:29:02', 'Okombaloto', 'breg', 'bredoko0', 'b95ccb0af7818fe3fea05cb6f560f8ac', 'bredoko@gmail.com', '06 85 24 26 66', 'Paris', '75500'),
(14, 1, '2023-06-19 03:41:49', 'Oshikyoji', 'zelda', 'zeldaoshi', '0d2a2d6575b7b816bc70c330bd87c347', 'zeldaosho@hot.com', '06 58 23 12 55', 'nemours', '77140');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auteur` (`auteur`),
  ADD KEY `categorie_id` (`categorie_id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `user1` (`user1_id`),
  ADD KEY `users2` (`user2_id`);

--
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`favoris_id`),
  ADD KEY `annonce_id` (`annonce_id`),
  ADD KEY `user` (`user`);

--
-- Index pour la table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`offre_id`),
  ADD KEY `annonce_id` (`annonce_id`),
  ADD KEY `auteur_offre` (`auteur_offre`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`id_role`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `chat`
--
ALTER TABLE `chat`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `favoris`
--
ALTER TABLE `favoris`
  MODIFY `favoris_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `offre`
--
ALTER TABLE `offre`
  MODIFY `offre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD CONSTRAINT `annonce_ibfk_1` FOREIGN KEY (`auteur`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `annonce_ibfk_2` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`user1_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`user2_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD CONSTRAINT `favoris_ibfk_1` FOREIGN KEY (`annonce_id`) REFERENCES `annonce` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favoris_ibfk_2` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `offre`
--
ALTER TABLE `offre`
  ADD CONSTRAINT `offre_ibfk_1` FOREIGN KEY (`annonce_id`) REFERENCES `annonce` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `offre_ibfk_2` FOREIGN KEY (`auteur_offre`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
