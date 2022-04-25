-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 25 avr. 2022 à 10:52
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hypnos`
--

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220321132941', '2022-03-21 14:29:49', 108),
('DoctrineMigrations\\Version20220321133405', '2022-03-21 14:34:12', 101),
('DoctrineMigrations\\Version20220321133608', '2022-03-21 14:36:15', 97),
('DoctrineMigrations\\Version20220321133712', '2022-03-21 14:37:19', 93),
('DoctrineMigrations\\Version20220321133904', '2022-03-21 14:39:11', 328),
('DoctrineMigrations\\Version20220321134012', '2022-03-21 14:40:19', 345),
('DoctrineMigrations\\Version20220321134110', '2022-03-21 14:41:15', 551),
('DoctrineMigrations\\Version20220321134153', '2022-03-21 14:41:59', 619),
('DoctrineMigrations\\Version20220321134248', '2022-03-21 14:42:54', 397),
('DoctrineMigrations\\Version20220321163135', '2022-03-21 17:39:01', 149),
('DoctrineMigrations\\Version20220321164218', '2022-03-21 17:42:26', 91),
('DoctrineMigrations\\Version20220321164458', '2022-03-21 17:45:07', 355),
('DoctrineMigrations\\Version20220331183158', '2022-03-31 20:32:11', 1374),
('DoctrineMigrations\\Version20220413185950', '2022-04-13 21:00:02', 893),
('DoctrineMigrations\\Version20220414193738', '2022-04-14 21:37:49', 471),
('DoctrineMigrations\\Version20220414193929', '2022-04-14 21:39:37', 390),
('DoctrineMigrations\\Version20220415103114', '2022-04-15 12:31:24', 343),
('DoctrineMigrations\\Version20220415103231', '2022-04-15 12:32:39', 393);

-- --------------------------------------------------------

--
-- Structure de la table `establishments`
--

CREATE TABLE `establishments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `establishments`
--

INSERT INTO `establishments` (`id`, `name`, `city`, `address`, `description`, `user_id`) VALUES
(1, 'Dream Hotel', 'Lyon', '10 Rue des fleurs 69000 LYON', 'Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.', 2),
(2, 'Enchanted garden', 'Paris', '5 Rue des capucines 75000 PARIS', 'Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.', NULL),
(3, 'Welcome Hotel', 'Nantes', '6 Boulevard Kennedy 44000 NANTES', 'Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.', NULL),
(4, 'Always Welcome', 'Nice', '150 Avenue Maurice 06000 NICE', 'Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.', NULL),
(5, 'Resort Hotel', 'Lille', '1 Rue Emile Zola 59000 LILLE', 'Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.', NULL),
(6, 'Charm Hotel', 'Rennes', '8 Avenue Janvier, 35000 RENNES', 'Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.', NULL),
(7, 'Yellow Hotel', 'Bordeaux', '4 Boulevard Napoléon 33000 BORDEAUX', 'Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `images_establishments`
--

CREATE TABLE `images_establishments` (
  `id` int(11) NOT NULL,
  `establishment_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `images_establishments`
--

INSERT INTO `images_establishments` (`id`, `establishment_id`, `name`) VALUES
(2, 1, '6c84c225296adc6b1cb117daf2059f1c.jpg'),
(3, 2, '6c84c225296adc6b1cb117daf2059f1c.jpg'),
(4, 3, '6c84c225296adc6b1cb117daf2059f1c.jpg'),
(5, 4, '6c84c225296adc6b1cb117daf2059f1c.jpg'),
(6, 6, '6c84c225296adc6b1cb117daf2059f1c.jpg'),
(7, 7, '6c84c225296adc6b1cb117daf2059f1c.jpg'),
(8, 2, '206ad0797676ff66a50b4916ab2360d6.jpg'),
(9, 2, 'd7a90a3b73ba34900c9881c3984c9969.jpg'),
(10, 2, '8c0b6847d0b9e7ba7909211ee01caffd.jpg'),
(11, 3, '97dcda08898d683ab1e65b8c3ae1a234.jpg'),
(12, 3, '954bec80d8238b7a6bab4e98e660c2e2.jpg'),
(13, 3, '47999aa69752b3ad493fb53595bfb332.jpg'),
(14, 3, '7352c1ac9cb047bfdf47323567abc874.jpg'),
(15, 3, '7e457f7fdf18071984cf5bdd701d9f88.jpg'),
(16, 3, '90737161bf700ff738c04b6f407bca63.jpg'),
(17, 4, '623c567db73b724d1a3d11d5d4548ae7.jpg'),
(18, 5, '6c84c225296adc6b1cb117daf2059f1c.jpg'),
(19, 1, 'ba6bbb16aeb4221731d33ffc9b44ff13.jpg'),
(20, 1, 'f7a62b62a98273104ec105426454e948.jpg'),
(21, 1, 'ee5f83150468b611ca9ce61e722f6815.jpg'),
(22, 1, '579c7d88ed92642f78a61bcd654ed42d.jpg'),
(23, 1, 'dc4be2ee52926db2e09b36bb7fe2371a.jpg'),
(24, 1, '0f741580f2e56bfb47773ead2b29ddb5.jpg'),
(25, 1, '2f9e181a8ed6f5bcec26be2ffc67fbaa.jpg'),
(26, 1, 'b9cd6cb422bb69a320846bd984285a58.jpg'),
(27, 5, 'bd997923729a21f815b352bdbfbcc6ef.jpg'),
(28, 5, '9564785be8f55033f9ae51b2687f10bd.webp'),
(29, 5, '2a464c7bc646588bcd1393129b6d06a7.jpg'),
(30, 5, 'c10e2d3c372115862d6e217954fa6c00.jpg'),
(31, 5, '354af7767fcec05298790d9de87b1ba7.jpg'),
(32, 5, 'daadddc49074a0a6b6b52be94ea5587a.jpg'),
(33, 5, '235f346b929c99c28fadc5a8dddff515.jpg'),
(34, 5, '458afce72164b4dc4e2b3995df039a90.jpg'),
(35, 6, 'c272f213037118fc126c402b855c90dd.jpg'),
(36, 6, '15c42632f2976161209e09ccf9b2e582.jpg'),
(37, 6, '28559f2168703630b0eb33fb3b0a3ad9.jpg'),
(38, 6, '5d8ecab892f099a934e3426e45b6d08a.jpg'),
(39, 6, 'cfa29f8ff12003ca081481617cd84111.jpg'),
(40, 6, '07b4d3e4da534942ffb621dc10cdf96c.jpg'),
(41, 6, 'a73f523a6c6515d8619d83c65b53b7e0.jpg'),
(42, 6, '52aeed3afde4a93ba7df8bbad493db7d.jpg'),
(43, 6, '22b18c63f662d2357213211c6e2db256.jpg'),
(44, 6, '1daf5fdd67a08c26e62053395ce9621e.jpg'),
(45, 7, '35369e0aa8c9248d576687deeff47292.webp'),
(46, 7, '42cfff1909e50169fd15453d6cc86056.jpg'),
(47, 7, '09141539eab55b36315e2ae1f8d56b77.jpg'),
(48, 7, '835a6a0f14c702dc8689bfdf36658515.jpg'),
(49, 7, 'd9e0619c970ef1a4a3a5382fa9e67dcc.jpg'),
(50, 7, 'fa9d80fb1b054bd15f6cd7e8a36d92c9.jpg'),
(51, 7, 'a85a8c9fd08dfa834a432c8255f5ff2d.jpg'),
(52, 7, 'd1226ba91e34380377f9806d8742aa8e.jpg'),
(53, 7, 'aced84546ed344c12774251958735ef5.jpg'),
(54, 7, '57a4694c2273cc786da8b3c0dc693b05.jpg'),
(55, 7, '79c5f1cf6becd26c1113a21dcf7cd52b.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `images_suites`
--

CREATE TABLE `images_suites` (
  `id` int(11) NOT NULL,
  `suite_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `images_suites`
--

INSERT INTO `images_suites` (`id`, `suite_id`, `name`) VALUES
(1, 1, '88ffea9884aa37d29795e229a6aa8dea.jpg'),
(2, 1, '857e7b579ca31ffffd86b24920ef69ad.jpg'),
(3, 1, '258d06cbda7423dcf53e1d775c0d8190.jpg'),
(4, 1, 'd361fa04231db1326d07c8a78d47705b.jpg'),
(5, 1, '249f919ef0b0c3c79dc131ae99a0fc5a.jpg'),
(6, 2, 'f763cb0c2cc45dfb3be625668ea8fec0.webp'),
(7, 2, '4a9f2796542a27bc88d4f9e94b54b89d.jpg'),
(8, 2, 'b43f4a777e79f42c7191e50f8bf83a25.jpg'),
(9, 2, '7570a77a7cd1f5d3432c9fe88831d21e.jpg'),
(10, 2, 'a7cb0f69a9874b035cf2a5296b7c0d79.jpg'),
(11, 2, 'e0f4f5239ddb527ce4cdc9d9d9ce6463.jpg'),
(12, 2, 'f67a0fdeb467a20b2b6e598803cfda53.jpg'),
(13, 3, '763ba405e9cec6c49cdd56acea2d3ce6.webp'),
(14, 3, '21b4923a7b583d21878688b8822cfb4e.jpg'),
(15, 3, 'a7adf3ec17bb8a24da441940eb3a9417.jpg'),
(16, 3, 'fa04b0705ede3d745fa8569bfff1b550.jpg'),
(17, 3, 'f6099c7ba410f4544c00380f5cddaeac.jpg'),
(18, 3, 'a62150c494fcf6ed7e094df85d6a40ce.jpg'),
(19, 3, 'c1a4bdb4e21c5e87f7e3c495922acdea.jpg'),
(20, 3, 'bcde86e8c6d9dbe544ce0278d581e8a7.jpg'),
(21, 3, '4b4faa1110039053d28a567c63ecafc0.jpg'),
(22, 4, '9ed69d6645e3766a2bd5fc1320d79200.jpg'),
(23, 4, 'fc9f13c7717cdf1cca1a3a4f029a6d07.jpg'),
(24, 4, '10fb868a0791395a7d83649031689537.jpg'),
(25, 4, 'd2c4eadc3b4cc578f499b7b3bd6f4b29.jpg'),
(26, 4, '3fe474eb85c034a4dd29546fc74e9609.jpg'),
(27, 4, 'b6273f3a77f23e36e4aef0e1f3145fee.jpg'),
(28, 4, '97c89752521f84386aef7a1e662e058c.jpg'),
(29, 4, '1acfb31c241dae71b252f0835607d7ea.jpg'),
(30, 4, 'dcfcb2ac10f4c707faeab57a21b7ba45.jpg'),
(31, 4, 'c6e4a318b356ad98d016e857baf9c249.jpg'),
(32, 4, 'da2b69b65599830665abb6132439f0d0.jpg'),
(33, 5, '7624fd9b90038fce03db22241473d499.jpg'),
(34, 5, '3534345ea15444eee91e63026cffcfad.jpg'),
(35, 5, 'ff5dde71b5284075f1546e5eb58fc664.jpg'),
(36, 5, 'f3a60c4f30b4a1f83e31f21e813bd6a8.jpg'),
(37, 5, '8d8a1d91b8c835870064926adfbf4529.jpg'),
(38, 5, 'c00d19267a3ff6b1ec05b779ef82d34e.jpg'),
(39, 5, '3465dea3f951e73f489910e93a94291d.jpg'),
(40, 5, '5daf5c88cccac0203764df78f0ecad78.jpg'),
(41, 6, '93087505f2b40c471d3f6f832bad9263.jpg'),
(42, 6, '9c75f2dea1603bf847b8ba39458af96d.jpg'),
(43, 6, '428c818bb2d88854d6b144c7fdb31cf4.jpg'),
(44, 6, 'bf097b7738f4e5ae0956e7264fd5074a.jpg'),
(45, 6, '3ee96c08d6be45c20f85ff82bac103b8.jpg'),
(46, 6, 'bd6fc015250a07476cf4f1c15001159a.jpg'),
(47, 6, '43bc32186d1de1f3ff67842b70cae065.jpg'),
(48, 6, '040773add02f98f5abc919dfee2f9924.jpg'),
(49, 6, 'b9776358abe43430d3f8bb001834956a.jpg'),
(50, 6, '8d2a9723ef9e12986177ff345d72930a.jpg'),
(51, 7, '9837cd9333b1b68b41cba1c7f3980dd4.jpg'),
(52, 7, 'd38fbca868fdd2c371722a7a4a84892e.jpg'),
(53, 7, 'eb26fc5b59d74b17cc0c882a313a6185.jpg'),
(54, 7, '16d5c7d6457d3867aecf8ff66a6a787a.jpg'),
(55, 7, 'ed4aa98deb177056867c8240e5fac5fc.jpg'),
(56, 7, 'd04acc95d7272c2f77b59f5a26eef907.jpg'),
(57, 7, 'dd25f2bc58e887593c5538a88d8e5be6.jpg'),
(58, 7, '64deb4ed68ff7b30c23060a47d9681eb.jpg'),
(59, 8, 'fd240ece32d8da8e9a2f0be7fb911c11.jpg'),
(60, 8, '53e8cb01a1a3d1ded5022d29b79d29a2.jpg'),
(61, 8, '9d35d248f79f231f8f0ef6cb74603e32.jpg'),
(62, 8, '5e51ee61d7d41516f4d2717b2f9cea42.jpg'),
(63, 8, '2f5eaf9673aa42fdbfc0277eef1b95ce.jpg'),
(64, 8, 'e78925f6c52769c21cdf21cab3eae67a.jpg'),
(65, 8, '3fe47fa5e3656d652a372ab5163fb9a4.jpg'),
(66, 8, '1e227f7ce0c4953cefa742019d848a87.jpg'),
(67, 8, '62cea636f85368d28abd3af86cecf85d.jpg'),
(68, 8, 'ee6fe020fd741e5e9048527866c4c078.jpg'),
(69, 8, 'c23d561d83b4733ff4bfda90f4e7abb7.jpg'),
(70, 9, 'd29585fd40e9764e2d0e43145aa52b2d.jpg'),
(71, 9, '0dde092d7453b299b223d7255f89a98e.jpg'),
(72, 9, 'a681010e0be61878161e4c919e62bab1.jpg'),
(73, 9, '872345af8ba1a161d06a957929573c71.jpg'),
(74, 9, '758ff83a6a3ce17bc5ed06239a2acafd.jpg'),
(75, 9, 'a9437653cd1ca8302281ee389305f4d3.jpg'),
(76, 9, 'da1ec16b9674aece4585a6642fb858ba.jpg'),
(77, 9, '8475ed8e82d304387645998569300dd3.jpg'),
(78, 10, '4ad1241ac03204fda2f9db0987dbba13.jpg'),
(79, 10, 'e0ba19fbcd60466d3af8f4f9056729a3.jpg'),
(80, 10, 'd171fe466809a56ea0bbb8a67e525280.jpg'),
(81, 10, '334dc6a2b8ec008a3f7e970808146207.jpg'),
(82, 10, '9486c4ab0ff8ea0cc93701e4aa3b2d64.jpg'),
(83, 10, 'd64911d0805de8316d15cf0f7a1b59c1.jpg'),
(84, 10, 'aa4606ac27ac3b1fec5067cb6c19611b.jpg'),
(85, 10, '2855cf8a351315f561a73ecf534bd24a.jpg'),
(86, 10, '5641a49d95aea244631a6c0b0ebe4b4b.jpg'),
(87, 10, 'd5ff878459d7f943e62c272cd8dc819e.jpg'),
(88, 10, '957b63310a4cfcc7faa66b480fa7ea39.jpg'),
(89, 10, '81218509dd4fd4b7e6fa6f9923c3966b.jpg'),
(90, 10, 'c76326f55638b5e4b0968c51063b8209.jpg'),
(91, 10, 'cde9cc5af704d7a9f2ef7b903a580a76.jpg'),
(92, 10, '8397ed20ed5e0487af0a8527e3fb79e2.jpg'),
(93, 11, '616fd870762d83f57b167e7cfb3ce6f7.jpg'),
(94, 11, 'e94275029dbb8ce49a705a3043839f58.jpg'),
(95, 11, '0d3e1979552c2825137f6a6a3c375cad.jpg'),
(96, 11, '47564e8d1bc422a5d68a9e3b532743bf.jpg'),
(97, 11, '48fc96faf13f87a13dd2a94381aa0f6e.jpg'),
(98, 11, 'beee08cff7db6121b2cd147d8cfde795.jpg'),
(99, 12, 'b187bed6d314dd26c4151b800253c1ec.jpg'),
(100, 12, 'e2117fb4696a515519aed71688336a1f.jpg'),
(101, 12, '88de67955f35d7afb00d15bfd6f8ff23.jpg'),
(102, 12, '1cf66fcc0130ef92c8b208c190b2717d.jpg'),
(103, 12, 'bc68d5050c9da4157a3641a2b053e9e8.jpg'),
(104, 12, 'ab45a321e593f3042c6b3e51affd7f6d.jpg'),
(105, 12, '535e7d620d3aa8e2b13779ed1e037088.jpg'),
(106, 13, '25eda0d0264c7b8e273e280d19990cc5.jpg'),
(107, 13, '2b29b292eb424d9b3110626a4bff2f40.jpg'),
(108, 13, '44543f533b43aedf9aa05eb2afed0700.jpg'),
(109, 13, '26bad5d802fa6fc6e6d28ab5f8a4273d.jpg'),
(110, 13, '850b18441e0762bf64d2800f48286122.jpg'),
(111, 13, '9f3ed3241a8370796170b83f6d6bba49.jpg'),
(112, 13, '5fce9aa25dad11e97342f7962ffa4f2c.jpg'),
(113, 13, 'fbb163e5028f0382e5977535a658c0a4.jpg'),
(114, 14, '2b874911f85d5f2a970904effe879968.jpg'),
(115, 14, 'a33a4c64ac7be9f588b5d95a031f25d3.jpg'),
(116, 14, 'fb406aa1e5a0bc743b4e8089578b3d51.jpg'),
(117, 14, '186634d09107437330d09ac92556856e.jpg'),
(118, 14, 'e596a1635f7d6e6d7f713cdc42c6a442.jpg'),
(119, 14, 'e36ae46a1d2892cd4cfa717c894b5485.jpg'),
(120, 14, 'd1a6f7e2aebb353111a88c7f11839514.jpg'),
(121, 14, '06369b707aa3d1ed0d12edee201e49b7.jpg'),
(122, 14, '7f85a375866fb3c41d200c349d687af5.jpg'),
(123, 14, 'adc09a8b6a2404fec41da4d78a9716b1.jpg'),
(124, 15, '49da06ae51a42527266837217c046eef.jpg'),
(125, 15, '8062525621a7a1d20ed5f3f08784fb8f.jpg'),
(126, 15, '2cf0cb9c808c818afd920e584a127209.jpg'),
(127, 15, '9679e5b3aae384ccea5adb3a34658673.jpg'),
(128, 15, '4916e96ba0370cc17940905a0bca6d40.jpg'),
(129, 15, '5908a54b5c43eae92648b99fac3ffbc0.jpg'),
(130, 15, '7094546fe9488ddb9bfc4940f994c4dd.jpg'),
(131, 15, 'a7c87577525100c4221e10a81766bbc9.jpg'),
(132, 15, '659f89aec7611bf64eb8ea1d494f295d.jpg'),
(133, 15, 'f3e951546b1f4dfdeab49b4f701ccf44.jpg'),
(134, 15, '87c768bf487e0bcd0211313d56a6eb70.jpg'),
(135, 16, 'b3b17ac695843af5a7b8b5fc418879fe.jpg'),
(136, 16, 'e8510b998648ac34731b4216808ef46d.jpg'),
(137, 16, '58d9d4fd40ed3a9ed5c5e222e2a88206.jpg'),
(138, 16, 'e3219c8ac3833a4d8dc56409b5f3c554.jpg'),
(139, 16, '8e6ebde750a9e221c06f8cf1df8df169.jpg'),
(140, 16, 'f59eb2a344a9131b0dde714d33623071.jpg'),
(141, 16, '611390754af7e4b874fcf915efd57630.jpg'),
(142, 16, 'c918621d8779a30168d2b4f0c75afa6f.jpg'),
(143, 16, '2369ca6603a329e8aec75dfff2abc0ad.jpg'),
(144, 16, '2bf267c2ba0e0e2332bb9ec86f828df7.jpg'),
(145, 16, '8a173fc6d7716e65b60b9a908968823d.jpg'),
(146, 16, 'a3bef2008a059f0e2af985e2183818d6.jpg'),
(147, 16, 'dd8bdbf5e8530801ae5650fb8165f17d.jpg'),
(148, 16, '9f3d54c889b7b135129cc2fa5719a511.jpg'),
(149, 17, '715df77706a0b8b852a9dd551a7170d7.jpg'),
(150, 17, '13e20f091968cea36dcc3f468fd29cd9.jpg'),
(151, 17, '3aafb621267d2c1af9f382866c981801.jpg'),
(152, 17, '47633b98c06e044ab38c07e334c32156.jpg'),
(153, 17, '5eb4578b993f69248c2418a567aa093d.jpg'),
(154, 17, 'c7a3fa953694fcdb777ebb5a90c55bae.jpg'),
(155, 17, '803b4c55262fa82a511f6101c9b432e1.jpg'),
(156, 17, 'c3e5d9706ecc809b69997ae35d94f599.jpg'),
(157, 17, '5c4e8b64676350525424c73c30f10a02.jpg'),
(158, 18, '6ccfac1806e24c6f6deb42428ec25442.jpg'),
(159, 18, '148244a59a44d5135a76de466dd4b458.jpg'),
(160, 18, 'c4c0e831fd2b6c1f3954567f9c31344e.jpg'),
(161, 18, '5793bb5368ba104528af05caf8514a37.jpg'),
(162, 18, 'eef043166b5d5d1fbdca5bd1aeac1b98.jpg'),
(163, 18, '273a864e4b85ca831bfc5f1c2089f8bf.jpg'),
(164, 18, 'd5058a316a092fa04a48c2fea53bf9c2.jpg'),
(165, 18, 'cd7edf796892c2b837f43166f19bf6f7.jpg'),
(166, 19, '4f25286421647ecd6a0db0b48ba0a7a2.jpg'),
(167, 19, '8b332ded9b4ab8b88f0c628d1b3993dd.webp'),
(168, 19, '38870cfd0e0e97f3026754f7cb9ed11f.jpg'),
(169, 19, '480898d8b4925fbd86494589e9cf6b41.jpg'),
(170, 19, '864418b11f90faa94deb25df3207b1d1.jpg'),
(171, 19, '7f02e1dc14fe90f9e9259e1eb7e0f9b8.jpg'),
(172, 19, '6c1425ee4622e3163c06216cf968c98b.jpg'),
(173, 19, 'dd277b1cb4dc250db62f41e2f9a64db9.jpg'),
(174, 19, 'c52f014b55b6cf473f1ec1a6a44a4f44.jpg'),
(175, 19, 'c9b49eb08d73cbb700a28057b49df62c.jpg'),
(176, 19, 'e9942fabaa97eedb80868ea23530a049.jpg'),
(177, 19, '94efa0a93f2cae2394224d16ed49dd10.jpg'),
(178, 19, '2400ae59e0b20f503089ff92e2297b4e.jpg'),
(179, 20, 'c4eb11f4a124083c53367c45e9251c91.jpg'),
(180, 20, '6aaa1004961d085adada5dc3e54ab504.jpg'),
(181, 20, '7dd426117f1a26dd173ab5a91c010f48.jpg'),
(182, 20, '765b578e15c6a6da5db29d7e7a6d198a.jpg'),
(183, 20, '941904e731bd33f75a06609c0084bb29.jpg'),
(184, 20, 'c9c1c7e286dcec085034232ee19c42ac.jpg'),
(185, 20, '59e52254a0e667aa70439bd6151081a7.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `arrival_date` date NOT NULL,
  `departure_date` date NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `establishment_id` int(11) DEFAULT NULL,
  `suite_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `arrival_date`, `departure_date`, `user_id`, `establishment_id`, `suite_id`) VALUES
(14, '2022-04-07', '2022-04-08', 1, 1, 14),
(16, '2022-04-13', '2022-04-16', 1, 2, 9),
(18, '2022-04-05', '2022-04-07', NULL, 1, 12),
(19, '2022-04-22', '2022-04-24', NULL, 1, 15),
(20, '2022-04-26', '2022-04-30', 1, 1, 12),
(21, '2022-04-05', '2022-04-06', 28, 1, 15),
(23, '2022-04-23', '2022-04-27', 28, 1, 12),
(24, '2022-04-23', '2022-04-27', 28, 1, 12),
(25, '2022-04-12', '2022-04-08', 24, 1, 14),
(26, '2022-04-12', '2022-04-29', 24, 1, 15),
(27, '2022-05-24', '2022-05-25', 28, 1, 5);

-- --------------------------------------------------------

--
-- Structure de la table `suites`
--

CREATE TABLE `suites` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `establishment_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `suites`
--

INSERT INTO `suites` (`id`, `title`, `description`, `price`, `picture`, `establishment_id`) VALUES
(1, 'Littel LLC', 'Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.', '120.00', '', 2),
(2, 'Graham, O\'Keefe and Tremblay', 'Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.Cum socii', '120.00', '', 7),
(3, 'Koch, Kub and Goyette', 'Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictum', '120.00', '', 4),
(4, 'Herman-Fisher', 'Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.Duis consequat dui nec nisi volutpat eleifend.', '120.00', '', 6),
(5, 'VON RUEDEN', 'Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.', '120.00', '', 1),
(6, 'Huels, Kohler and Koelpin', 'Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nulla', '120.00', '', 6),
(7, 'Johnston, Kozey and Gusikowski', 'Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.', '120.00', '', 3),
(8, 'Morissette-Emard', 'Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.', '120.00', '', 4),
(9, 'Mante, O\'Kon and Morar', 'Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.', '120.00', '', 2),
(10, 'Mills, Roob and Deckow', 'Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.Phasellus in felis. Donec semper sapien a libero. Nam dui.', '120.00', '', 6),
(11, 'Dickinson-Cartwright', 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.', '120.00', '', 3),
(12, 'Ondricka-Bergstrom', 'Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.', '120.00', '', 1),
(13, 'Luettgen Inc', 'Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictum', '120.00', '', 6),
(14, 'Hermann and Sons', 'Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.', '120.00', '', 1),
(15, 'Kuhic-Bauch', 'Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.', '120.00', '', 1),
(16, 'Boehm Inc', 'Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultri', '120.00', '', 1),
(17, 'Prosacco Group', 'Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.', '120.00', '', 2),
(18, 'Smitham and Sons', 'Phasellus in felis. Donec semper sapien a libero. Nam dui.', '120.00', '', 2),
(19, 'Stark-Lemke', 'Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.', '120.00', '', 5),
(20, 'Dickens, Kemmer and Leffler', 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec', '120.00', '', 3);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `lastname`, `firstname`) VALUES
(1, 'nadia.epivent@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$iLoyo9V6lNRKyc7gbUx6I.Mxhi6UPBdz2PF9VVfesw/us68zVTza2', 'EPIVENT', 'Nadia'),
(2, 'nadia.epivent@hotmail.fr', '[\"ROLE_MANAGER\"]', '$2y$13$MHOE/a07GpxZf3Klh4MDeOGobrF/ka1Lh1SDpxYp.zP1SyxHIt7z6', 'EPIVENT', 'Nadia'),
(10, 'pbuxy9@latimes.com', '', '$2y$10$I9Z/crf.nt4dTcgohkciOO0DucKGOIq0LkppO23DLiBnzIiN4/S8K', 'Buxy', 'Pavel'),
(11, 'kseamonsa@tinyurl.com', '', '$2y$10$dv.H2lLco1NdZX33yc/V2eLpFEEjXwp0xmQ5xRp72o3l7kH6hxdgu', 'Seamons', 'Kyle'),
(12, 'dtyresb@studiopress.com', '', '$2y$10$yeKtK6vlaPNtTH/LAT0V3ukmkKgeCdOz06PIrTRYpWSvqWpkSMoEe', 'Tyres', 'Dedra'),
(14, 'bmcreedyd@pagesperso-orange.fr', '', '$2y$10$Ex.DY6oejOcNzSt64wsHQeCNeaFOKm13x8o.kleSmkbyNqhTraHum', 'McReedy', 'Budd'),
(15, 'ygreenlesse@technorati.com', '', '$2y$10$Ex.DY6oejOcNzSt64wsHQeCNeaFOKm13x8o.kleSmkbyNqhTraHum', 'Greenless', 'Yorke'),
(16, 'wbountifff@myspace.com', '', '$2y$10$Ex.DY6oejOcNzSt64wsHQeCNeaFOKm13x8o.kleSmkbyNqhTraHum', 'Bountiff', 'Winifield'),
(17, 'ncorroyerg@theatlantic.com', '', '$2y$10$Ex.DY6oejOcNzSt64wsHQeCNeaFOKm13x8o.kleSmkbyNqhTraHum', 'Corroyer', 'Niels'),
(18, 'amccarverh@businessinsider.com', '', '$2y$10$Ex.DY6oejOcNzSt64wsHQeCNeaFOKm13x8o.kleSmkbyNqhTraHum', 'McCarver', 'Angelita'),
(19, 'ktillsi@biglobe.ne.jp', '', '$2y$10$Ex.DY6oejOcNzSt64wsHQeCNeaFOKm13x8o.kleSmkbyNqhTraHum', 'Tills', 'Kylen'),
(20, 'sraikesj@amazon.de', '', '$2y$10$Ex.DY6oejOcNzSt64wsHQeCNeaFOKm13x8o.kleSmkbyNqhTraHum', 'Raikes', 'Sunny'),
(23, 'test2@test2.com', '[\"ROLE_USER\"]', '$2y$13$P5HPU2yLkgYVIyeO.dvd5.qtrG4idslmF4qZpv1bByMv7Jh55USk6', 'TEST2', 'TEST2'),
(24, 'nadia.epivent@test.fr', '[\"ROLE_USER\"]', '$2y$13$MbG5gJyLe2M4AlebKNKze.TcMrlOP57TCdb6Ii1IR3Agf12/h9OZK', 'EPIVENT', 'nadia'),
(27, 'nadia.epivent@user.com', '[\"ROLE_USER\"]', '$2y$13$xCGq36DX9J0Sonsyq9JbZuwogrMUDF7xnyDIvKgPQSXpiiycW2ZjS', 'User', 'nadia'),
(28, 'user@user.com', '[\"ROLE_USER\"]', '$2y$13$riv/gERnsnyXh3Jy7Y7w0eA05SINZ4CEVPU8uKXqfFS3fxjCemdfK', 'usertest', 'usertest');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `establishments`
--
ALTER TABLE `establishments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5C67EFC5A76ED395` (`user_id`);

--
-- Index pour la table `images_establishments`
--
ALTER TABLE `images_establishments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9DF3046E8565851` (`establishment_id`);

--
-- Index pour la table `images_suites`
--
ALTER TABLE `images_suites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_BECB1544FFCB518` (`suite_id`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_4DA239A76ED395` (`user_id`),
  ADD KEY `IDX_4DA2398565851` (`establishment_id`),
  ADD KEY `IDX_4DA2394FFCB518` (`suite_id`);

--
-- Index pour la table `suites`
--
ALTER TABLE `suites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C91676128565851` (`establishment_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `establishments`
--
ALTER TABLE `establishments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `images_establishments`
--
ALTER TABLE `images_establishments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT pour la table `images_suites`
--
ALTER TABLE `images_suites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `suites`
--
ALTER TABLE `suites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `establishments`
--
ALTER TABLE `establishments`
  ADD CONSTRAINT `FK_5C67EFC5A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `images_establishments`
--
ALTER TABLE `images_establishments`
  ADD CONSTRAINT `FK_9DF3046E8565851` FOREIGN KEY (`establishment_id`) REFERENCES `establishments` (`id`);

--
-- Contraintes pour la table `images_suites`
--
ALTER TABLE `images_suites`
  ADD CONSTRAINT `FK_BECB1544FFCB518` FOREIGN KEY (`suite_id`) REFERENCES `suites` (`id`);

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `FK_4DA2394FFCB518` FOREIGN KEY (`suite_id`) REFERENCES `suites` (`id`),
  ADD CONSTRAINT `FK_4DA2398565851` FOREIGN KEY (`establishment_id`) REFERENCES `establishments` (`id`),
  ADD CONSTRAINT `FK_4DA239A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `suites`
--
ALTER TABLE `suites`
  ADD CONSTRAINT `FK_C91676128565851` FOREIGN KEY (`establishment_id`) REFERENCES `establishments` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
