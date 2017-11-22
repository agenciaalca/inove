-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 14-Nov-2017 às 17:40
-- Versão do servidor: 10.0.33-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo_inove`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `about`
--

CREATE TABLE `about` (
  `id` int(11) UNSIGNED NOT NULL,
  `content` longtext CHARACTER SET utf8,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `about`
--

INSERT INTO `about` (`id`, `content`, `created_at`, `updated_at`) VALUES
(1, '<p>A Inove Gôndolas busca promover soluções criativas e versáteis para melhor exposição dos produtos nos pontos de venda.</p>', '2017-05-25 00:53:36', '2017-09-23 14:10:49');

-- --------------------------------------------------------

--
-- Estrutura da tabela `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `subtitle` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `cover` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `banners`
--

INSERT INTO `banners` (`id`, `title`, `subtitle`, `slug`, `cover`, `order`, `status`, `created_at`, `updated_at`) VALUES
(3, '1', NULL, '1', '9620e11e3fcc22c6a5c35b5b27ddb273.jpg', 1, 0, '2017-09-25 15:37:02', '2017-09-25 15:37:02'),
(4, '2', NULL, '2', 'a5aa0eee1a27b38767bcb4c995ef5162.jpg', 2, 0, '2017-09-25 15:37:29', '2017-09-25 15:37:29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `configs`
--

CREATE TABLE `configs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `subtitle` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `about` longtext CHARACTER SET utf8,
  `cnpj` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `ie` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `district` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `state` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `zipcode` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `contry` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `cell` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `opening` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `logo` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `configs`
--

INSERT INTO `configs` (`id`, `title`, `subtitle`, `about`, `cnpj`, `ie`, `address`, `city`, `district`, `state`, `zipcode`, `contry`, `phone`, `cell`, `email`, `opening`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Inove', 'Gôndolas, Expositores e Check-outs em Goiânia e Região', NULL, NULL, NULL, 'Rua 52, Qd. 03, Lt. 08 s/n - Setor Santos Dumont', 'Goiânia', NULL, NULL, '', NULL, '(62) 3581-1117', '', 'contato@inovegondolas.com.br', NULL, NULL, '2017-05-25 00:53:36', '2017-09-06 13:41:48');

-- --------------------------------------------------------

--
-- Estrutura da tabela `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `site` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `text` text COLLATE utf8_unicode_ci,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `order` int(10) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `customers`
--

INSERT INTO `customers` (`id`, `title`, `site`, `text`, `name`, `position`, `logo`, `order`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Big Lar Utilidades e Presentes ', NULL, '<p>Cliente estratégico pra empresa, tendo 11 filiais em Goiânia e Aparecida de Goiânia .</p><p>A Inove Gôndolas faz parte do crescimento deste cliente.</p><p><br></p>', 'S.r Rosivan / Sr.Evandro', 'Proprietários ', '55e805b4cf4a0f290177f9d6b64b91e7.jpg', 1, NULL, '2017-09-21 15:02:46', '2017-09-21 15:02:46'),
(4, 'Rede Festa', NULL, '<p>A rede Festa atua no segmento de festas e Presentes, &nbsp;com 10 filiais&nbsp;</p>', 'Sr.Valter ', 'Proprietário ', 'fe32239de09645ea6b8d0d0c6d38203a.jpg', 2, NULL, '2017-09-21 15:18:20', '2017-09-21 15:18:20'),
(5, 'Suoermercado Supervi ', NULL, 'Cliente estratégico pra nossa empresa&nbsp;', 'Sr.Alex', 'Proprietário ', '1d572a6ff8adf7e28367e6c9eecf549c.jpg', 3, NULL, '2017-09-21 19:45:46', '2017-09-21 19:45:46');

-- --------------------------------------------------------

--
-- Estrutura da tabela `groups`
--

CREATE TABLE `groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `groups`
--

INSERT INTO `groups` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin (admin)', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(2, 'Administrador (admin)', '2017-05-25 00:53:36', '2017-05-25 00:53:36');

-- --------------------------------------------------------

--
-- Estrutura da tabela `group_modules`
--

CREATE TABLE `group_modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `group_modules`
--

INSERT INTO `group_modules` (`id`, `group_id`, `module_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11),
(12, 1, 12),
(13, 1, 13),
(14, 1, 14),
(15, 1, 15),
(16, 1, 16),
(17, 1, 17),
(18, 1, 18),
(19, 1, 19),
(20, 1, 20),
(21, 1, 21),
(22, 1, 22),
(23, 1, 23),
(24, 1, 24),
(25, 1, 25),
(26, 1, 26),
(27, 1, 27),
(28, 1, 28),
(29, 1, 29),
(30, 1, 30),
(31, 1, 31),
(32, 1, 32),
(33, 1, 33),
(34, 1, 34),
(35, 1, 35),
(36, 1, 36),
(37, 1, 37),
(38, 1, 38),
(39, 1, 39),
(40, 1, 40),
(41, 1, 41),
(42, 1, 42),
(43, 1, 43),
(44, 1, 44),
(45, 1, 45),
(46, 1, 46),
(47, 1, 47),
(48, 1, 48),
(49, 1, 49),
(50, 1, 50),
(51, 1, 51),
(52, 1, 52),
(53, 1, 53),
(54, 1, 54),
(55, 1, 55),
(56, 1, 56),
(57, 1, 57),
(58, 1, 58),
(59, 1, 59),
(60, 1, 60),
(61, 1, 61),
(62, 1, 62),
(63, 1, 63),
(64, 1, 64),
(65, 1, 65),
(66, 1, 66),
(67, 1, 67),
(68, 1, 68),
(69, 1, 69),
(70, 1, 70),
(71, 1, 71),
(72, 1, 72),
(73, 1, 73),
(74, 1, 74),
(75, 1, 75),
(76, 1, 76),
(77, 1, 77),
(78, 1, 78),
(79, 1, 79),
(80, 1, 80),
(81, 1, 81),
(82, 1, 82),
(83, 1, 83),
(84, 1, 84),
(85, 1, 85),
(86, 1, 86),
(87, 1, 87),
(88, 1, 88),
(89, 1, 89),
(90, 1, 90),
(91, 1, 91),
(92, 1, 92),
(93, 1, 93),
(94, 1, 94),
(95, 1, 95),
(96, 1, 96),
(97, 1, 97),
(98, 1, 98),
(99, 1, 99),
(100, 1, 100),
(101, 1, 101),
(102, 1, 102),
(103, 1, 103),
(104, 1, 104),
(105, 1, 105),
(106, 1, 106),
(107, 1, 107),
(108, 1, 108),
(109, 1, 109),
(110, 1, 110),
(111, 1, 111),
(112, 1, 112),
(113, 1, 113),
(114, 1, 114),
(115, 1, 115),
(116, 1, 116),
(117, 1, 117),
(118, 1, 118),
(119, 1, 119),
(120, 1, 120),
(121, 1, 121),
(122, 1, 122),
(123, 1, 123),
(124, 1, 124),
(125, 1, 125),
(126, 1, 126),
(127, 1, 127),
(128, 1, 128),
(129, 1, 129),
(130, 1, 130),
(131, 1, 131),
(132, 1, 132),
(133, 1, 133),
(134, 1, 134),
(135, 1, 135),
(136, 1, 136),
(137, 1, 137),
(138, 1, 138),
(139, 1, 139),
(140, 1, 140),
(141, 1, 141),
(142, 1, 142),
(143, 1, 143),
(144, 1, 144),
(145, 1, 145),
(146, 1, 146),
(147, 1, 147),
(148, 1, 148),
(149, 1, 149),
(150, 1, 150),
(151, 1, 151),
(152, 1, 152),
(153, 1, 153),
(154, 1, 154),
(155, 1, 155),
(156, 1, 156),
(157, 1, 157),
(158, 1, 158),
(159, 1, 159),
(160, 1, 160),
(161, 1, 161),
(162, 1, 162),
(163, 1, 163),
(164, 1, 164),
(165, 1, 165),
(166, 1, 166),
(167, 1, 167),
(168, 1, 168),
(169, 1, 169),
(170, 1, 170),
(171, 1, 171),
(172, 1, 172),
(173, 1, 173),
(174, 1, 174),
(175, 1, 175),
(176, 1, 176),
(177, 1, 177),
(178, 1, 178),
(179, 1, 179),
(180, 1, 180),
(181, 1, 181),
(182, 1, 182),
(183, 1, 183),
(184, 1, 184),
(185, 1, 185),
(186, 1, 186),
(187, 1, 187),
(188, 1, 188),
(189, 1, 189),
(190, 1, 190),
(191, 1, 191),
(192, 1, 192),
(193, 1, 193),
(194, 1, 194),
(195, 1, 195),
(196, 1, 196),
(197, 1, 197),
(198, 1, 198),
(199, 1, 199),
(200, 1, 200),
(201, 1, 201),
(202, 1, 202),
(203, 1, 203),
(204, 1, 204),
(205, 1, 205),
(206, 1, 206),
(207, 1, 207),
(208, 1, 208),
(209, 1, 209),
(210, 1, 210),
(211, 1, 211),
(212, 1, 212),
(213, 1, 213),
(214, 1, 214),
(215, 1, 215),
(216, 1, 216),
(217, 1, 217),
(218, 1, 218),
(219, 1, 219),
(220, 1, 220),
(221, 1, 221),
(222, 1, 222),
(223, 1, 223),
(224, 1, 224),
(225, 1, 225),
(226, 1, 226),
(227, 1, 227),
(228, 1, 228),
(229, 1, 229),
(230, 1, 230),
(231, 1, 231),
(232, 1, 232),
(233, 1, 233),
(234, 1, 234),
(235, 1, 235),
(236, 1, 236),
(237, 1, 237),
(238, 1, 238),
(239, 1, 239),
(240, 1, 240),
(241, 1, 241),
(242, 1, 242),
(243, 1, 243),
(244, 1, 244),
(245, 1, 245),
(246, 1, 246),
(247, 1, 247),
(248, 1, 248),
(249, 1, 249),
(250, 1, 250),
(251, 1, 251),
(252, 1, 252),
(253, 1, 253),
(254, 1, 254),
(255, 1, 255),
(256, 1, 256),
(257, 1, 257),
(258, 1, 258),
(259, 1, 259),
(260, 1, 260),
(265, 1, 265),
(266, 1, 266),
(267, 1, 267),
(268, 1, 268),
(269, 1, 269),
(270, 1, 270),
(271, 1, 271),
(272, 1, 272),
(273, 1, 273),
(274, 1, 274),
(275, 1, 275),
(276, 1, 276),
(277, 1, 277),
(278, 1, 278),
(279, 1, 279),
(280, 1, 280),
(281, 1, 281),
(282, 1, 282),
(283, 1, 283),
(284, 1, 284),
(285, 1, 285),
(286, 1, 286),
(287, 1, 287),
(288, 1, 288),
(289, 1, 289),
(290, 1, 290),
(291, 1, 291),
(292, 1, 292),
(293, 1, 293),
(294, 1, 294),
(295, 1, 295),
(296, 1, 296),
(297, 1, 297),
(298, 1, 298),
(299, 1, 299),
(300, 1, 300),
(301, 1, 301),
(302, 1, 302),
(303, 1, 303),
(304, 1, 304),
(305, 1, 305),
(306, 1, 306),
(307, 1, 307),
(308, 1, 308),
(309, 1, 309),
(310, 1, 310),
(311, 1, 311),
(312, 1, 312),
(313, 1, 314),
(314, 1, 315),
(315, 1, 313),
(316, 1, 316),
(317, 1, 317),
(318, 1, 318),
(319, 1, 319),
(320, 1, 320),
(321, 1, 321),
(322, 1, 322),
(323, 1, 323),
(324, 1, 324),
(325, 1, 325),
(326, 1, 326),
(327, 1, 327),
(328, 1, 328),
(333, 2, 271),
(334, 2, 1),
(335, 2, 2),
(336, 2, 3),
(337, 2, 5),
(338, 2, 11),
(339, 2, 21),
(340, 2, 22),
(341, 2, 23),
(342, 2, 24),
(343, 2, 317),
(344, 2, 318),
(345, 2, 319),
(346, 2, 320),
(347, 2, 321),
(348, 2, 322),
(349, 2, 323),
(350, 2, 324),
(351, 2, 325),
(352, 2, 326),
(353, 2, 327),
(354, 2, 328),
(355, 2, 315),
(356, 2, 314),
(357, 2, 313),
(358, 2, 316),
(359, 2, 51),
(360, 2, 52),
(361, 2, 53),
(362, 2, 54),
(363, 2, 61),
(364, 2, 62),
(365, 2, 151),
(366, 2, 152),
(367, 2, 153),
(368, 2, 154),
(369, 2, 161),
(370, 2, 162),
(371, 2, 163),
(372, 2, 164);

-- --------------------------------------------------------

--
-- Estrutura da tabela `modules`
--

CREATE TABLE `modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` int(11) DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `class` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `method` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `modules`
--

INSERT INTO `modules` (`id`, `category`, `title`, `class`, `method`, `created_at`, `updated_at`) VALUES
(1, 1, 'Listar Banners', 'BannerController', 'index', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(2, 1, 'Criar Banner', 'BannerController', 'create', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(3, 1, 'Editar Banner', 'BannerController', 'edit', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(5, 1, 'Remover Banner', 'BannerController', 'destroy', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(11, 2, 'Editar Configurações', 'ConfigController', 'index', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(21, 3, 'Listar Clientes', 'CustomerController', 'index', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(22, 3, 'Criar Cliente', 'CustomerController', 'create', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(23, 3, 'Editar Cliente', 'CustomerController', 'edit', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(24, 3, 'Remover Cliente', 'CustomerController', 'destroy', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(31, 5, 'Listar Galerias', 'GalleryController', 'index', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(32, 5, 'Criar Galeria', 'GalleryController', 'create', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(33, 5, 'Editar Galeria', 'GalleryController', 'edit', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(34, 5, 'Remover Galeria', 'GalleryController', 'destroy', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(41, 5, 'Listar Imagens da Galeria', 'GalleryImageController', 'index', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(42, 5, 'Criar Imagens da Galeria', 'GalleryImageController', 'create', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(43, 5, 'Remover Imagens da Galeria', 'GalleryImageController', 'destroy', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(51, 6, 'Listar Grupos', 'GroupController', 'index', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(52, 6, 'Criar Grupo', 'GroupController', 'create', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(53, 6, 'Editar Grupo', 'GroupController', 'edit', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(54, 6, 'Remover Grupo', 'GroupController', 'destroy', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(61, 6, 'Listar Permissões do Grupo', 'GroupModuleController', 'index', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(62, 6, 'Remover Permissões do Grupo', 'GroupModuleController', 'destroy', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(71, 7, 'Listar Permissões', 'ModuleController', 'index', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(72, 7, 'Criar Permissão', 'ModuleController', 'create', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(73, 7, 'Editar Permissão', 'ModuleController', 'edit', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(74, 7, 'Remover Permissão', 'ModuleController', 'destroy', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(151, 11, 'Listar Usuários', 'UserController', 'index', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(152, 11, 'Criar Usuário', 'UserController', 'create', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(153, 11, 'Editar Usuário', 'UserController', 'edit', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(154, 11, 'Remover Usuário', 'UserController', 'destroy', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(161, 11, 'Adicionar Grupo de Usuário', 'UserGroupController', 'store', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(162, 11, 'Remover Grupo de Usuário', 'UserGroupController', 'destroy', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(163, 11, 'Adicionar Permissão de Usuário', 'UserModuleController', 'store', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(164, 11, 'Remover Permissão de Usuário', 'UserModuleController', 'destroy', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(171, 7, 'Listar Módulos', 'ModuleCategoryController', 'index', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(172, 7, 'Criar Módulo', 'ModuleCategoryController', 'create', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(173, 7, 'Editar Módulo', 'ModuleCategoryController', 'edit', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(174, 7, 'Remover Módulo', 'ModuleCategoryController', 'destroy', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(261, 18, 'Listar Parceiros', 'PartnerController', 'index', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(262, 18, 'Criar Parceiro', 'PartnerController', 'create', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(263, 18, 'Editar Parceiro', 'PartnerController', 'edit', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(264, 18, 'Remover Parceiro', 'PartnerController', 'destroy', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(271, 19, 'Editar Institucional', 'AboutController', 'edit', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(301, 22, 'Listar Serviços', 'ServiceController', 'index', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(302, 22, 'Criar Serviço', 'ServiceController', 'create', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(303, 22, 'Editar Serviço', 'ServiceController', 'edit', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(304, 22, 'Remover Serviço', 'ServiceController', 'destroy', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(305, 23, 'Listar Postagens', 'BlogController', 'index', '2017-06-25 19:17:28', '2017-06-25 19:17:28'),
(306, 23, 'Criar Postagem', 'BlogController', 'create', '2017-06-25 19:18:20', '2017-06-25 19:18:20'),
(307, 23, 'Editar Postagem', 'BlogController', 'edit', '2017-06-25 19:18:39', '2017-06-25 19:18:39'),
(308, 23, 'Remover Postagem', 'BlogController', 'destroy', '2017-06-25 19:19:06', '2017-06-25 19:19:06'),
(309, 23, 'Listar Categorias Blog', 'BlogCategoryController', 'index', '2017-06-27 21:52:13', '2017-06-27 21:52:13'),
(310, 23, 'Criar Categoria Blog', 'BlogCategoryController', 'create', '2017-06-27 21:52:40', '2017-06-27 21:52:40'),
(311, 23, 'Editar Categoria Blog', 'BlogCategoryController', 'edit', '2017-06-27 21:52:58', '2017-06-27 21:52:58'),
(312, 23, 'Remover Categoria Blog', 'BlogCategoryController', 'destroy', '2017-06-27 21:53:16', '2017-06-27 21:53:16'),
(313, 24, 'Listar Dicas', 'TipController', 'index', '2017-08-25 23:11:45', '2017-08-25 23:11:45'),
(314, 24, 'Criar Dica', 'TipController', 'create', '2017-08-25 23:12:12', '2017-08-25 23:12:26'),
(315, 24, 'Editar Dica', 'TipController', 'edit', '2017-08-25 23:12:43', '2017-08-25 23:12:43'),
(316, 24, 'Remover Dica', 'TipController', 'destroy', '2017-08-25 23:13:00', '2017-08-25 23:13:00'),
(317, 25, 'Listar Produtos', 'ProductController', 'index', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(318, 25, 'Criar Produto', 'ProductController', 'create', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(319, 25, 'Editar Produto', 'ProductController', 'edit', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(320, 25, 'Remover Produto', 'ProductController', 'destroy', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(321, 25, 'Listar Categorias Produtos', 'ProductCategoryController', 'index', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(322, 25, 'Criar Categoria Produto', 'ProductCategoryController', 'create', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(323, 25, 'Editar Categoria Produto', 'ProductCategoryController', 'edit', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(324, 25, 'Remover Categoria Produto', 'ProductCategoryController', 'destroy', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(325, 25, 'Listar Imagens Produtos', 'ProductGalleryController', 'index', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(326, 25, 'Criar Imagens Produto', 'ProductGalleryController', 'create', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(327, 25, 'Editar Imagens Produto', 'ProductGalleryController', 'edit', '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(328, 25, 'Remover Imagens Produto', 'ProductGalleryController', 'destroy', '2017-05-25 00:53:36', '2017-05-25 00:53:36');

-- --------------------------------------------------------

--
-- Estrutura da tabela `module_categories`
--

CREATE TABLE `module_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `module_categories`
--

INSERT INTO `module_categories` (`id`, `title`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Banners', 'banners', 1, '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(2, 'Configurações', 'configs', 1, '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(3, 'Clientes', 'customers', 1, '2017-05-25 00:53:36', '2017-08-25 23:00:16'),
(5, 'Galerias', 'galleries', 0, '2017-05-25 00:53:36', '2017-08-25 23:00:37'),
(6, 'Grupos', 'groups', 1, '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(7, 'Permissões', 'modules', 1, '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(11, 'Usuários', 'users', 1, '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(18, 'Parceiros', 'partners', 0, '2017-05-25 00:53:36', '2017-06-27 22:14:41'),
(19, 'Institucional', 'about', 1, '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(22, 'Serviços', 'services', 0, '2017-05-25 00:53:36', '2017-06-25 19:06:05'),
(23, 'Blog', 'blog', 0, '2017-06-25 19:10:23', '2017-08-25 23:00:14'),
(24, 'Dicas', 'tips', 1, '2017-08-25 23:11:05', '2017-08-25 23:13:09'),
(25, 'Produtos', 'products', 1, '2017-08-26 00:00:21', '2017-08-26 00:00:21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `content` longtext CHARACTER SET utf8,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` int(11) DEFAULT NULL,
  `subcategory` int(11) DEFAULT NULL,
  `code` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `subtitle` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` longtext CHARACTER SET utf8,
  `slug` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `cover` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `price` decimal(11,2) DEFAULT '0.00',
  `offer` decimal(11,2) DEFAULT NULL,
  `offer_start` datetime DEFAULT NULL,
  `offer_end` datetime DEFAULT NULL,
  `inventory` int(11) DEFAULT '-1',
  `height` decimal(11,2) DEFAULT NULL,
  `width` decimal(11,2) DEFAULT NULL,
  `depth` decimal(11,2) DEFAULT NULL,
  `weight` decimal(11,2) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id`, `category`, `subcategory`, `code`, `title`, `subtitle`, `description`, `slug`, `cover`, `price`, `offer`, `offer_start`, `offer_end`, `inventory`, `height`, `width`, `depth`, `weight`, `status`, `created_at`, `updated_at`) VALUES
(28, NULL, NULL, NULL, 'GÔNDOLA LATERAL PERFUMARIA ', NULL, '<p>ESTA GONDOLA CONTE.....................</p>', 'gondola-lateral-perfumaria-', '2e99fd7a756d30ce32d2880ea6910743.jpg', '0.00', NULL, NULL, NULL, -1, NULL, NULL, NULL, NULL, 0, '2017-09-25 18:35:28', '2017-09-25 18:35:28'),
(30, NULL, NULL, NULL, 'GÔNDOLA LATERAL MEDICAMENTOS ', NULL, '<p>VENHO.....................</p>', 'gondola-lateral-medicamentos-', 'cfab8ad91f5fc149ace2c134eb751cad.jpg', '0.00', NULL, NULL, NULL, -1, NULL, NULL, NULL, NULL, 0, '2017-09-25 18:40:26', '2017-09-25 18:40:26'),
(31, NULL, NULL, NULL, 'GONDOLA CENTRAL ', NULL, '<p>KJKJJGGG</p>', 'gondola-central-', '26123cbfddd6a5dd259dd82f8e13ad7d.jpg', '0.00', NULL, NULL, NULL, -1, NULL, NULL, NULL, NULL, 0, '2017-09-25 18:59:09', '2017-09-25 18:59:09'),
(32, NULL, NULL, NULL, 'Linha Armazenagem', NULL, '<p>HLHHKHKH</p>', 'linha-armazenagem', 'e78b5b6c55a89bff708bbd6c75d37265.jpg', '0.00', NULL, NULL, NULL, -1, NULL, NULL, NULL, NULL, 0, '2017-09-25 19:02:37', '2017-09-25 19:02:37'),
(34, NULL, NULL, NULL, 'Gôndola lateral ', NULL, '<p>GOFFWFWERGFRWG</p>', 'gondola-lateral-', 'f3c8f384558fe0f2c3e65162fed12590.jpg', '0.00', NULL, NULL, NULL, -1, NULL, NULL, NULL, NULL, 0, '2017-10-04 17:46:37', '2017-10-04 17:46:37');

-- --------------------------------------------------------

--
-- Estrutura da tabela `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `product_categories`
--

INSERT INTO `product_categories` (`id`, `parent`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(6, 18, 'GÔNDOLA LATERAL MEDICAMENTOS ', 'gondola-lateral-medicamentos-', '2017-08-27 18:03:52', '2017-09-25 14:52:49'),
(8, 0, 'Linha Eletro', 'linha-eletro', '2017-08-27 18:04:07', '2017-08-27 18:04:07'),
(10, 0, 'Linha Armazenagem', 'linha-armazenagem', '2017-09-06 13:07:16', '2017-09-06 13:07:16'),
(11, 0, 'Linha Festa', 'linha-festa', '2017-09-06 13:07:35', '2017-09-06 13:07:35'),
(12, 0, 'Linha Home', 'linha-home', '2017-09-06 13:08:11', '2017-09-06 13:08:11'),
(18, 0, 'Linha Farma', 'linha-farma', '2017-09-23 13:57:42', '2017-09-23 13:57:42'),
(19, 0, 'Linha Super', 'linha-super', '2017-09-23 14:08:48', '2017-09-23 14:08:48'),
(20, 18, 'GÔNDOLA LATERAL PERFUMARIA ', 'gondola-lateral-perfumaria-', '2017-09-25 18:29:21', '2017-09-25 18:29:21'),
(21, 18, 'GÔNDOLA CENTRAL ', 'gondola-central-', '2017-09-25 18:29:52', '2017-09-25 18:29:52'),
(22, 18, 'PONTA DE GÔNDOLA MEIA LUA ', 'ponta-de-gondola-meia-lua-', '2017-09-25 18:30:02', '2017-09-25 18:30:02'),
(23, 10, 'Linha Armazenagem', 'linha-armazenagem', '2017-09-25 19:01:37', '2017-09-25 19:01:37'),
(24, 8, 'Linha Eletro', 'linha-eletro', '2017-10-04 17:44:12', '2017-10-04 17:44:12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `product_galleries`
--

CREATE TABLE `product_galleries` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `product_galleries`
--

INSERT INTO `product_galleries` (`id`, `product_id`, `title`, `slug`, `image`, `order`, `created_at`, `updated_at`) VALUES
(5, 1, NULL, NULL, '272acc96b9063c9c72ce15f1ba82977b.jpg', NULL, '2017-08-30 11:27:23', '2017-08-30 11:27:23'),
(6, 1, NULL, NULL, 'ee9db09e085c71b460781d2e6f418bd7.jpg', NULL, '2017-08-30 11:27:24', '2017-08-30 11:27:24'),
(7, 1, NULL, NULL, 'ee9db09e085c71b460781d2e6f418bd7.jpg', NULL, '2017-08-30 11:27:24', '2017-08-30 11:27:24'),
(8, 1, NULL, NULL, 'ee9db09e085c71b460781d2e6f418bd7.jpg', NULL, '2017-08-30 11:27:25', '2017-08-30 11:27:25'),
(9, 1, NULL, NULL, '64cf4db259ddb22b838333beb9caaace.jpg', NULL, '2017-08-30 11:27:25', '2017-08-30 11:27:25'),
(10, 1, NULL, NULL, '64cf4db259ddb22b838333beb9caaace.jpg', NULL, '2017-08-30 11:27:25', '2017-08-30 11:27:25'),
(11, 1, NULL, NULL, '64cf4db259ddb22b838333beb9caaace.jpg', NULL, '2017-08-30 11:27:26', '2017-08-30 11:27:26'),
(12, 2, NULL, NULL, 'e61c0842adaedd9e8b42d488ec749f9b.jpg', NULL, '2017-09-06 13:17:19', '2017-09-06 13:17:19'),
(13, 2, NULL, NULL, '2f9912fe83d19df8121292fb8193e3f9.jpg', NULL, '2017-09-06 13:17:20', '2017-09-06 13:17:20'),
(14, 4, NULL, NULL, 'f21723dc4a80e43229b8c9e89717dbf7.jpg', NULL, '2017-09-21 19:25:59', '2017-09-21 19:25:59'),
(15, 4, NULL, NULL, 'f21723dc4a80e43229b8c9e89717dbf7.jpg', NULL, '2017-09-21 19:26:00', '2017-09-21 19:26:00'),
(16, 4, NULL, NULL, 'e3c1412bb56b57f07020dc5e87e4d363.jpg', NULL, '2017-09-21 19:26:00', '2017-09-21 19:26:00'),
(17, 4, NULL, NULL, 'e3c1412bb56b57f07020dc5e87e4d363.jpg', NULL, '2017-09-21 19:26:01', '2017-09-21 19:26:01'),
(18, 4, NULL, NULL, '80446a25adbd56e6a11391894a1d51b6.jpg', NULL, '2017-09-21 19:26:01', '2017-09-21 19:26:01'),
(19, 4, NULL, NULL, '80446a25adbd56e6a11391894a1d51b6.jpg', NULL, '2017-09-21 19:26:01', '2017-09-21 19:26:01'),
(20, 4, NULL, NULL, '80446a25adbd56e6a11391894a1d51b6.jpg', NULL, '2017-09-21 19:26:02', '2017-09-21 19:26:02'),
(23, 16, NULL, NULL, 'acc3a569f4306ef3679926c1c82ebd1b.jpg', NULL, '2017-09-23 14:18:50', '2017-09-23 14:18:50'),
(24, 16, NULL, NULL, '9b787d544fd193fa6966aa186afd9d82.jpg', NULL, '2017-09-23 14:20:42', '2017-09-23 14:20:42'),
(25, 16, NULL, NULL, '8ed6e6941ec03a628f5461decc7a9491.jpg', NULL, '2017-09-23 14:22:25', '2017-09-23 14:22:25'),
(26, 16, NULL, NULL, '74ef7ee29eea07061c10db2f3cc13161.jpg', NULL, '2017-09-23 14:22:28', '2017-09-23 14:22:28'),
(27, 16, NULL, NULL, '39d6cc9a5f232b8f72603a7283214cc1.jpg', NULL, '2017-09-23 14:25:56', '2017-09-23 14:25:56'),
(28, 8, NULL, NULL, 'f672e228fb348b8510c1623dd04ab062.jpg', NULL, '2017-09-23 14:33:31', '2017-09-23 14:33:31'),
(29, 8, NULL, NULL, '62feb0393d94ecd8144c2c35fe18bcdc.jpg', NULL, '2017-09-23 14:34:34', '2017-09-23 14:34:34'),
(30, 8, NULL, NULL, '92b6df2fb06dffea3af1505cd22d8840.jpg', NULL, '2017-09-23 14:35:16', '2017-09-23 14:35:16'),
(31, 8, NULL, NULL, 'ab447b088fad8a699968b8fe7343aaed.jpg', NULL, '2017-09-23 14:35:21', '2017-09-23 14:35:21'),
(32, 8, NULL, NULL, '925e6fce4e47af96dfebbd491926215b.jpg', NULL, '2017-09-23 14:38:08', '2017-09-23 14:38:08'),
(33, 8, NULL, NULL, '39d7dbaf1e3fdf6afa5746cfb8fc31da.jpg', NULL, '2017-09-23 14:38:10', '2017-09-23 14:38:10'),
(34, 8, NULL, NULL, 'dbe4f4bc5cd70c2f944c1d8386df80da.jpg', NULL, '2017-09-23 14:38:18', '2017-09-23 14:38:18'),
(36, 28, NULL, NULL, '8b438d424a43965de4b044be1254f050.jpg', NULL, '2017-09-25 18:36:07', '2017-09-25 18:36:07'),
(37, 28, NULL, NULL, 'fe8e6c221d7b07b89074d89fe635724d.jpg', NULL, '2017-09-25 18:36:19', '2017-09-25 18:36:19'),
(38, 28, NULL, NULL, '06e07ca4869ed0d701990c4df9643ccf.jpg', NULL, '2017-09-25 18:36:54', '2017-09-25 18:36:54'),
(39, 28, NULL, NULL, 'ecae5c337f44e366b5644a22ef573cc6.jpg', NULL, '2017-09-25 18:37:59', '2017-09-25 18:37:59'),
(40, 28, NULL, NULL, '5e100e17c405e640846d1c1af5e6b71c.jpg', NULL, '2017-09-25 18:39:06', '2017-09-25 18:39:06'),
(41, 31, NULL, NULL, '291e28b4c9e6c0471c675541f6aa3876.jpg', NULL, '2017-09-25 18:59:53', '2017-09-25 18:59:53');

-- --------------------------------------------------------

--
-- Estrutura da tabela `product_has_categories`
--

CREATE TABLE `product_has_categories` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `product_has_categories`
--

INSERT INTO `product_has_categories` (`product_id`, `category_id`) VALUES
(30, 6),
(28, 20),
(31, 21),
(32, 23),
(34, 24);

-- --------------------------------------------------------

--
-- Estrutura da tabela `socials`
--

CREATE TABLE `socials` (
  `id` int(10) UNSIGNED NOT NULL,
  `facebook` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `google` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `youtube` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `instagram` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `twitter` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `skype` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `keywords` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `socials`
--

INSERT INTO `socials` (`id`, `facebook`, `google`, `youtube`, `instagram`, `twitter`, `skype`, `description`, `keywords`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, 'Gôndolas, Expositores, Check-outs em Goiânia e Região. O melhor preço da região.', 'gondolas, gondola, expositores, prateleiras, pratileiras, goiania, reformas, instalação, consultoria, farmarcias', '2017-05-25 00:53:36', '2017-09-06 13:41:24');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tips`
--

CREATE TABLE `tips` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` longtext CHARACTER SET utf8,
  `status` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tips`
--

INSERT INTO `tips` (`id`, `title`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Como manter sua gondolas limpas', 'como-manter-sua-gondolas-limpas', 'Use <b><u>apenas </u></b>sabão<span style=\"font-size: 18px;\"> bla bla</span>&nbsp;', 0, '2017-09-06 13:05:41', '2017-09-06 13:05:41'),
(5, 'Limpeza de gôndolas ', 'limpeza-de-gondolas-', 'Faça a limpeza de suas gôndolas com pano úmido.', 0, '2017-09-21 15:41:16', '2017-09-21 15:41:16');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `photo` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `about` text CHARACTER SET utf8,
  `address` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `token` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `photo`, `about`, `address`, `phone`, `status`, `token`, `created_at`, `updated_at`) VALUES
(1, 'Danilo Monteiro', 'dmonteiro.souza@gmail.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', NULL, NULL, NULL, NULL, 1, NULL, '2017-05-25 00:53:36', '2017-05-25 00:53:36'),
(2, 'Guilherme Nuevo', 'contato@kodev.com.br', '2a66f69283ad61b4937e09dbdacd93f7a5ee57323e0d59d5e33c07af4278b4c547a535a481f4987e723e2cc2245d682e63259b864ae49eb420126b77beb447bf', NULL, NULL, NULL, NULL, 0, '3y8UfGVSYeuC2LdZuW', '2017-06-28 05:55:47', '2017-08-27 17:47:58'),
(3, 'Alex', 'inovegondolas@gmail.com', 'bc29a7ed02546575066eae02ce20f1b4a97b51638414642d718d7931f4f98fe2859a1546c93bb34cf6771fca9a15f18d079dba731a4edb779b4582437da88fa9', NULL, NULL, NULL, NULL, 0, NULL, '2017-09-06 13:51:23', '2017-09-06 14:03:11');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `user_groups`
--

INSERT INTO `user_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_modules`
--

CREATE TABLE `user_modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_modules`
--
ALTER TABLE `group_modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_categories`
--
ALTER TABLE `module_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tips`
--
ALTER TABLE `tips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_modules`
--
ALTER TABLE `user_modules`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `group_modules`
--
ALTER TABLE `group_modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=373;
--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=329;
--
-- AUTO_INCREMENT for table `module_categories`
--
ALTER TABLE `module_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `product_galleries`
--
ALTER TABLE `product_galleries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tips`
--
ALTER TABLE `tips`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_modules`
--
ALTER TABLE `user_modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
