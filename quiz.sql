-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 27 Février 2019 à 21:09
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `quiz`
--

-- --------------------------------------------------------

--
-- Structure de la table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `question` int(11) NOT NULL,
  `answer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `success` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `answers`
--

INSERT INTO `answers` (`id`, `user`, `question`, `answer`, `timestamp`, `success`) VALUES
(1, 1, 50, 'be', '2019-02-27 16:57:18', 1),
(2, 1, 51, 'shi', '2019-02-27 16:57:56', 0),
(3, 1, 1, 'shi', '2019-02-27 16:59:09', 0),
(4, 1, 2, 'man', '2019-02-27 16:59:18', 1),
(5, 1, 1, 'nan2 ren2 ', '2019-02-27 17:51:39', 0),
(6, 1, 2, 'man', '2019-02-27 17:51:50', 1),
(7, 1, 3, 'man', '2019-02-27 17:52:07', 1),
(8, 1, 4, 'nan2 ren2', '2019-02-27 17:52:15', 1),
(9, 1, 5, 'nv3 ren2', '2019-02-27 17:52:32', 1),
(10, 1, 1, 'nan2 ren2', '2019-02-27 19:02:05', 1),
(11, 1, 2, 'man', '2019-02-27 19:02:47', 0),
(12, 1, 3, '', '2019-02-27 19:02:51', 0),
(13, 1, 4, 'nan2 ren2', '2019-02-27 19:03:08', 1),
(14, 1, 1, 'nan2 ren2', '2019-02-27 19:51:38', 1);

-- --------------------------------------------------------

--
-- Structure de la table `chineseskills`
--

CREATE TABLE `chineseskills` (
  `id` int(11) NOT NULL,
  `simplified` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pin1yin1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pinyin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `english` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `french` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `chineseskills`
--

INSERT INTO `chineseskills` (`id`, `simplified`, `pin1yin1`, `pinyin`, `english`, `french`) VALUES
(1, '男人', 'nan2 ren2', 'nán rén', 'man', 'homme'),
(2, '奴人', 'nv3 ren2', 'nǚ rén', 'woman', 'femme'),
(3, '男孩', 'nan2 hai2', 'nán hái', 'boy', 'garçon'),
(4, '奴孩', 'nv3 hai2', 'nǚ hái', 'girl', 'fille'),
(5, '我', 'wo3', 'wǒ', 'I', 'je'),
(6, '他', 'ta1', 'tā', 'he', 'il'),
(7, '她', 'ta1', 'tā', 'she', 'elle'),
(8, '你', 'ni3', 'nǐ', 'you', 'tu'),
(9, '桃', 'tao2', 'táo', 'peach', 'pèche'),
(10, '黎', 'li2', 'lí', 'pear', 'poire'),
(11, '吃桃', 'shui3 guo3', 'shuǐ guǒ', 'fruit', 'fruit'),
(12, '们', 'men', 'men', '(plural)', '(pluriel)'),
(13, '是', 'shi4', 'shì', 'be', 'être'),
(14, '吃', 'chi1', 'chī', 'eat', 'manger'),
(15, '在', 'zai4', 'zài', '(ing)', '(en train)'),
(16, '和', 'he1', 'hē', 'drink', 'boire'),
(17, '酒', 'jiu3', 'jiǔ', 'wine', 'vin'),
(18, '緑', 'lv4', 'lǜ', 'green', 'vert'),
(19, '红', 'hong2', 'hóng', 'red', 'rouge'),
(20, '黄', 'huan2', 'huán', 'yellow', 'jaune');

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question_cat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `question_val` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reponse_cat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reponse_val` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `questions`
--

INSERT INTO `questions` (`id`, `question_cat`, `question_val`, `reponse_cat`, `reponse_val`) VALUES
(1, 'simplified', '男人', 'pin1yin1', 'nan2 ren2'),
(2, 'pin1yin1', 'nan2 ren2', 'english', 'man'),
(3, 'simplified', '男人', 'english', 'man'),
(4, 'english', 'man', 'pin1yin1', 'nan2 ren2'),
(5, 'simplified', '奴人', 'pin1yin1', 'nv3 ren2'),
(6, 'pin1yin1', 'nv3 ren2', 'english', 'woman'),
(7, 'simplified', '奴人', 'english', 'woman'),
(8, 'english', 'woman', 'pin1yin1', 'nv3 ren2'),
(9, 'simplified', '男孩', 'pin1yin1', 'nan2 hai2'),
(10, 'pin1yin1', 'nan2 hai2', 'english', 'boy'),
(11, 'simplified', '男孩', 'english', 'boy'),
(12, 'english', 'boy', 'pin1yin1', 'nan2 hai2'),
(13, 'simplified', '奴孩', 'pin1yin1', 'nv3 hai2'),
(14, 'pin1yin1', 'nv3 hai2', 'english', 'girl'),
(15, 'simplified', '奴孩', 'english', 'girl'),
(16, 'english', 'girl', 'pin1yin1', 'nv3 hai2'),
(17, 'simplified', '我', 'pin1yin1', 'wo3'),
(18, 'pin1yin1', 'wo3', 'english', 'I'),
(19, 'simplified', '我', 'english', 'I'),
(20, 'english', 'I', 'pin1yin1', 'wo3'),
(21, 'simplified', '他', 'pin1yin1', 'ta1'),
(22, 'pin1yin1', 'ta1', 'english', 'he'),
(23, 'simplified', '他', 'english', 'he'),
(24, 'english', 'he', 'pin1yin1', 'ta1'),
(25, 'simplified', '她', 'pin1yin1', 'ta1'),
(26, 'pin1yin1', 'ta1', 'english', 'she'),
(27, 'simplified', '她', 'english', 'she'),
(28, 'english', 'she', 'pin1yin1', 'ta1'),
(29, 'simplified', '你', 'pin1yin1', 'ni3'),
(30, 'pin1yin1', 'ni3', 'english', 'you'),
(31, 'simplified', '你', 'english', 'you'),
(32, 'english', 'you', 'pin1yin1', 'ni3'),
(33, 'simplified', '桃', 'pin1yin1', 'tao2'),
(34, 'pin1yin1', 'tao2', 'english', 'peach'),
(35, 'simplified', '桃', 'english', 'peach'),
(36, 'english', 'peach', 'pin1yin1', 'tao2'),
(37, 'simplified', '黎', 'pin1yin1', 'li2'),
(38, 'pin1yin1', 'li2', 'english', 'pear'),
(39, 'simplified', '黎', 'english', 'pear'),
(40, 'english', 'pear', 'pin1yin1', 'li2'),
(41, 'simplified', '吃桃', 'pin1yin1', 'shui3 guo3'),
(42, 'pin1yin1', 'shui3 guo3', 'english', 'fruit'),
(43, 'simplified', '吃桃', 'english', 'fruit'),
(44, 'english', 'fruit', 'pin1yin1', 'shui3 guo3'),
(45, 'simplified', '们', 'pin1yin1', 'men'),
(46, 'pin1yin1', 'men', 'english', '(plural)'),
(47, 'simplified', '们', 'english', '(plural)'),
(48, 'english', '(plural)', 'pin1yin1', 'men'),
(49, 'simplified', '是', 'pin1yin1', 'shi4'),
(50, 'pin1yin1', 'shi4', 'english', 'be'),
(51, 'simplified', '是', 'english', 'be'),
(52, 'english', 'be', 'pin1yin1', 'shi4'),
(53, 'simplified', '吃', 'pin1yin1', 'chi1'),
(54, 'pin1yin1', 'chi1', 'english', 'eat'),
(55, 'simplified', '吃', 'english', 'eat'),
(56, 'english', 'eat', 'pin1yin1', 'chi1'),
(57, 'simplified', '在', 'pin1yin1', 'zai4'),
(58, 'pin1yin1', 'zai4', 'english', '(ing)'),
(59, 'simplified', '在', 'english', '(ing)'),
(60, 'english', '(ing)', 'pin1yin1', 'zai4'),
(61, 'simplified', '和', 'pin1yin1', 'he1'),
(62, 'pin1yin1', 'he1', 'english', 'drink'),
(63, 'simplified', '和', 'english', 'drink'),
(64, 'english', 'drink', 'pin1yin1', 'he1'),
(65, 'simplified', '酒', 'pin1yin1', 'jiu3'),
(66, 'pin1yin1', 'jiu3', 'english', 'wine'),
(67, 'simplified', '酒', 'english', 'wine'),
(68, 'english', 'wine', 'pin1yin1', 'jiu3'),
(69, 'simplified', '緑', 'pin1yin1', 'lv4'),
(70, 'pin1yin1', 'lv4', 'english', 'green'),
(71, 'simplified', '緑', 'english', 'green'),
(72, 'english', 'green', 'pin1yin1', 'lv4'),
(73, 'simplified', '红', 'pin1yin1', 'hong2'),
(74, 'pin1yin1', 'hong2', 'english', 'red'),
(75, 'simplified', '红', 'english', 'red'),
(76, 'english', 'red', 'pin1yin1', 'hong2'),
(77, 'simplified', '黄', 'pin1yin1', 'huan2'),
(78, 'pin1yin1', 'huan2', 'english', 'yellow'),
(79, 'simplified', '黄', 'english', 'yellow'),
(80, 'english', 'yellow', 'pin1yin1', 'huan2');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `registrationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `registrationDate`) VALUES
(1, 'firstUser', 'firstPassword', '2019-02-26 23:00:00');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `chineseskills`
--
ALTER TABLE `chineseskills`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id1` (`id`);

--
-- Index pour la table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `chineseskills`
--
ALTER TABLE `chineseskills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
