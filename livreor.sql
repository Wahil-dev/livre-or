-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 18 fév. 2023 à 15:06
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `livreor`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `commentaire` text NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `id_utilisateur`, `date`) VALUES
(5, '&lt;link rel=&quot;stylesheet&quot; href=&quot;&lt;?php echo $pathLien?&gt;assets/css/style.css&quot;&gt;', 1, '2023-02-14 12:51:08'),
(6, 'waWahil@12Wahil@12Wahil@12', 4, '2023-02-14 12:51:47'),
(7, 'karim', 4, '2023-02-14 13:12:30'),
(8, 'riyad', 4, '2023-02-14 13:15:00'),
(9, '\'&quot;(&quot;\'\'é&quot;\'&quot;0\'+94é&quot;\'&quot;é\'(\'&quot;&quot;', 4, '2023-02-14 13:15:21'),
(11, 'Commentaire', 4, '2023-02-14 13:16:25'),
(12, 'Wahil@12Wahil@', 1, '2023-02-14 13:19:15'),
(13, 'Kamal@12', 7, '2023-02-14 13:27:16'),
(14, 'Kamal@123Kamal@123', 8, '2023-02-14 13:28:08'),
(15, 'esqfdhhfvd', 5, '2023-02-18 14:31:10'),
(16, 'sfdgchjcgfdsf', 5, '2023-02-18 14:31:21'),
(17, 'esfgdhjgfdsqf', 9, '2023-02-18 14:34:41'),
(18, 'je m\'appel wahil chettouf', 5, '2023-02-18 14:51:32');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(1, 'Wahil@12', 'Wahil@12Wahil@12'),
(2, 'bvbvv', 'Wahil@12'),
(3, 'bvb', 'Wahil@12'),
(4, 'wahil-dev', 'Wahil@12'),
(5, 'Wahil@12', 'Wahil@12'),
(6, 'Wahil@12Wahil@12', 'Wahil@12'),
(7, 'Kamal@12', 'Kamal@12'),
(8, 'Kamal@123', 'Kamal@123'),
(9, 'sami', 'Sami@1234');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
