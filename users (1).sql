-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 11 mars 2024 à 08:48
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `portfolio_kenza`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `numero_telephone` int NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `carte_didentite` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `date_de_naissance` date NOT NULL,
  `genre` enum('Mr','Mme') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `description_dutilisateur` text NOT NULL,
  `metier` varchar(255) NOT NULL,
  `nationalite` varchar(255) NOT NULL,
  `verificationUser` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'En Attente',
  `role` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'ROLE_USER',
  `numero_siret` int NOT NULL,
  `is_deleted` tinyint DEFAULT NULL,
  `ville` varchar(255) NOT NULL,
  `code_postal` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `nom`, `email`, `password_hash`, `numero_telephone`, `adresse`, `created_at`, `carte_didentite`, `date_de_naissance`, `genre`, `photo`, `description_dutilisateur`, `metier`, `nationalite`, `verificationUser`, `role`, `numero_siret`, `is_deleted`, `ville`, `code_postal`) VALUES
(26, 'kenza', 'sedrati', 'kenzasedrati380@gmail.com', '$2y$10$9Fvl01depNA.dTLOKVMjT.Tr7fexmWp/Ola3rL5j4npcwWh44rM3G', 0, '', '2024-02-16 09:35:28', 'acceuilFR.jpg', '1999-02-08', '', 'acceuilFR.jpg', 'jkjb', '', 'francaise', '1', '', 0, NULL, '', 0),
(27, 'dsgdfghft', 'hfghfc', 'dgidfjghio@gmail.com', '$2y$10$9MC.apkWSU14GDYTKp50POuOKFsir09gdbDOywIPH/l7Pa9a034ai', 0, '', '2024-02-16 09:39:00', 'Cv Web Developer Resume.jpg', '2024-01-31', '', 'Cv Web Developer Resume.jpg', '$*pm^*$', '', 'russe', '1', '', 0, NULL, '', 0),
(28, 'fghgfh', 'hjgjg', 'fdfhfj@gmauil.com', '$2y$10$NNTg9XspLitrXfqE0e2U5uOq5hb8FmpqjxHhL59Av5MLMPBELeZuK', 0, '', '2024-02-16 09:39:57', 'pexels-rachel-claire-5531004.jpg', '2024-02-03', '', 'pexels-rachel-claire-5531004.jpg', 'kjhkhkh', '', 'indienne', '1', '', 0, NULL, '', 0),
(29, 'yhrtfr', 'ghjutgfj', 'gyjgyj@gmail.com', '$2y$10$eLtqrbQF5d8CrapjQNIpO.odomJsoUIm03iRRzmm4OEv.Tm72anDK', 0, '', '2024-02-16 09:45:42', 'change stage.jpg', '2024-02-14', '', 'change stage.jpg', 'gkj', '', 'mexicaine', '1', '', 0, NULL, '', 0),
(30, 'etery', 'ryrty', 'tyryh@gmail.com', '$2y$10$MefM/GO.EZoaxYbqp9fBheuMLnNplRuOo8PYruBEFcZhUa0lA6tYq', 0, '', '2024-02-16 09:51:14', 'logooo.avif', '2024-02-03', '', 'logooo.avif', 'jkljl', '', 'indienne', '1', '', 0, NULL, '', 0),
(31, 'lhjl', 'jklhl', 'jlhjl@gmail.com', '$2y$10$zm13OxKTTo2u9vdyuEh6R.ROMJbAz05EPEY6SMdniCfDatfjXwQ6S', 0, '', '2024-02-16 09:52:34', 'acceuilFR.jpg', '2024-02-09', '', 'acceuilFR.jpg', '*ml*', '', 'indienne', '1', '', 0, NULL, '', 0),
(32, 'hdrfhdff', 'gfhfghf', 'hghgjgj@gmail.com', '$2y$10$olzqbgr39miAoXZtksTBZubJWyUESsPgGRnbHFg2NaNBqoIjcVJB.', 0, '', '2024-02-16 09:55:22', 'ferrer.jpg', '2024-02-13', '', 'ferrer.jpg', 'gjgfjg', '', 'bresilienne', '1', '', 0, NULL, '', 0),
(33, 'jghj', 'jg', 'jgvs@gmail.com', '$2y$10$MjQBF5R.Gg7tF1blKVkUOeYijLce9nuOxBQhzdcvoHZSLG3.bHMpi', 0, '', '2024-02-16 10:00:05', 'acceuilFR.jpg', '2024-02-07', '', 'acceuilFR.jpg', 'hgfhfc', '', 'russe', '1', '', 0, NULL, '', 0),
(34, 'gszqcgh', 'sqc', 'site@gmail.com', '$2y$10$i6IcklO5IHs61APNnL4l..UM4DNDq5uSACqwBaaShYVlR11hn4SsS', 0, '', '2024-02-16 10:14:35', 'logooo.avif', '2024-02-15', '', 'logooo.avif', 'a', '', 'danoise', '1', '', 0, NULL, '', 0),
(35, 'sitetest', 'sedrati', 'kenzasedrati380@gmail.com', '$2y$10$x7SAdjZnevfMx2sYyBj7kuaPM929LYoGK7ApegdZ5WqCVPGgXgB6q', 0, '', '2024-02-16 10:23:21', 'logooo.avif', '2024-02-03', '', 'logooo.avif', 'q', '', 'norvegienne', '1', '', 0, NULL, '', 0),
(36, 'test', 'kenza sedrati', 'kenzasedratie@gmail.com', '$2y$10$RF6Df.hQZXH1gsvUU9u5KOXibXMckXu2ut3YmRYIHrijrZhHykoau', 0, '', '2024-02-16 10:29:31', 'logoEssaye.jpg', '2024-02-02', '', 'logoEssaye.jpg', 'd', '', 'danoise', '0', '', 0, NULL, '', 0),
(37, 'test2', 'test2', 'test2@gmail.com', '$2y$10$SwTp80QiL4wo0ZplUrc31efIEmCkVoZzbHBXAuDrpO5K1jNiXMGdO', 0, '', '2024-02-16 10:35:29', 'ferrer.jpg', '2024-02-22', '', 'ferrer.jpg', 'uygjytij', '', 'espagnole', '0', '', 0, NULL, '', 0),
(38, 'tuftgutgu', 'yuitgtyiyhi', 'tyiyuiyuhioyi@fhytfuj.com', '$2y$10$hTR0tdfGA1qTL1RmsOcETOZfzYuywIoObuRnL2q9ZZoPACiF8elNm', 0, '', '2024-02-16 10:39:00', 'logoEssaye.jpg', '2024-02-06', '', 'logoEssaye.jpg', 'ghkgh,', '', 'mexicaine', '0', '', 0, NULL, '', 0),
(39, 'tugyjgybijgb', 'gyikyhki', 'yhikugkihyi@hikjiyuho.com', '$2y$10$aktmGilmu6nB43jYxbZsLuTYj5.HnNQ/ce0G74ysaSq2kvRgTL86G', 0, '', '2024-02-16 10:39:56', 'logoEssaye.jpg', '2024-02-07', '', 'logoEssaye.jpg', 'hfgvjgj', '', 'bresilienne', '0', '', 0, NULL, '', 0),
(40, 'fghjfgj', 'gjgfj', 'jghjkghk@jutyij.fr', '$2y$10$Xb14vz8ZAi/rt4CoaX9knuofaWTLkNKsfUaqBbyzXKedPmyUce3eS', 0, '', '2024-02-16 10:48:19', 'pexels-rachel-claire-5531004.jpg', '2024-02-22', '', 'pexels-rachel-claire-5531004.jpg', 'ghfh', '', 'indienne', '0', '', 0, NULL, '', 0),
(41, 'gjghj', 'ghjkg', 'ghkghksalimou@gmail.com', '$2y$10$votvdM99gwWMuQW17sv1ruC5zZWJ3v16sOwpgZcdae9r3hlUxoD7S', 0, '', '2024-02-16 10:48:47', 'project-1.jpg', '2024-02-16', '', 'project-1.jpg', 'hjfvnjv', '', 'indienne', '0', '', 0, NULL, '', 0),
(42, 'hfgj', 'gj', 'dgsdhgsalimou@gmail.com', '$2y$10$EtnlhW.xFW.68cuACupIj.KfZTfsU5SBurlZD3611hFrXproe5pDq', 0, '', '2024-02-16 10:52:14', 'IMG_0135.jpeg', '2024-02-23', '', 'IMG_0135.jpeg', 'fgjghjk', '', 'chinoise', '0', '', 0, NULL, '', 0),
(43, 'salimou', 'kenza sedra', 'kenzasedratie@gmail.com', '$2y$10$VExZgQqlM/uuM8yUmBTYruCGbQM..ehvUl8T8hfX5drQc85LNz.U2', 0, '', '2024-02-16 10:56:49', 'pexels-rachel-claire-5531004.jpg', '2024-02-01', '', 'pexels-rachel-claire-5531004.jpg', 'gh', '', 'norvegienne', '0', '', 0, NULL, '', 0),
(44, 'salimou', 'sedrati', 'kenzasedrati380@gmail.com', '$2y$10$oe8waFjpSjq8LKCPJUmng.hkTB8qGcWjDY4ltYr12Mm7QDzDaQBx.', 0, '', '2024-02-16 11:00:55', 'pexels-rachel-claire-5531004.jpg', '2024-02-01', '', 'pexels-rachel-claire-5531004.jpg', 'yd', '', 'suedoise', '0', '', 0, NULL, '', 0),
(45, 'uoujàjçàum', 'ouiouio', 'iuioujiosalimou@gmail.com', '$2y$10$UwtPWmIiRbWOnVKYR.Fl/OnPC4YILMDKbRP7GyJVjUCfKHzd7wW7S', 0, '', '2024-02-16 11:02:54', 'logooo.avif', '2024-02-06', '', 'logooo.avif', 'ihui', '', 'norvegienne', '0', '', 0, NULL, '', 0),
(46, 'salimou', 'kenza sedrati', 'kenzasedratie@gmail.com', '$2y$10$ccHzcCc4FRlo1KTe2NAq6.QR3LsNsDk.c..30AT9L7KJhC124wubq', 0, '', '2024-02-16 11:06:21', 'pexels-rachel-claire-5531004.jpg', '2024-02-01', '', 'pexels-rachel-claire-5531004.jpg', 'ju', '', 'danoise', '0', '', 0, NULL, '', 0),
(47, 'salimo', 'kenza sedrati', 'kenzasedratie@gmail.com', '$2y$10$G4rhikYmOz1SHm0k8zDmx.J.z5u40QDAGLcgrCT33aOny8UUfOMg2', 0, '', '2024-02-16 11:13:56', 'logooo.avif', '2252-05-04', '', 'logooo.avif', '^p', '', 'russe', '0', '', 0, NULL, '', 0),
(48, 'salim', 'dgvdfg', 'gjyhjgvbhhsalimou@gmail.com', '$2y$10$r6Q/NsP9VjSpscwYfPPpSeI5m7qd5KYA.COYtB0O/9oAYdDIl7.lS', 0, '', '2024-02-16 11:15:08', 'acceuilFR.jpg', '2024-02-20', '', 'acceuilFR.jpg', ',hn,jhk,', '', 'mexicaine', '0', '', 0, NULL, '', 0),
(49, 'salimou@gmail.com', 'givyig', 'ghigyisalimou@gmail.com', '$2y$10$JH1s7SVsnprESjdM5DN0GuaNiSe0W5Ra4Hh8GPYkAMc99px8NHMc.', 0, '', '2024-02-16 11:24:34', 'change stage.jpg', '2024-02-10', '', 'change stage.jpg', 'fhfch', '', 'australienne', '0', '', 0, NULL, '', 0),
(50, 'hukhksdfsdsqf', 'qf', 'fsqfs@gmail.com', '$2y$10$jszBf59huXM2jmRB0sbTw.lcdVf3/AryED/.JsjNhcifxiQfdMuuW', 0, '', '2024-02-26 13:25:04', NULL, '2024-02-03', '', NULL, 'sqdfsf', '', 'portugaise', '0', '', 0, NULL, '', 0),
(51, 'nina', 'ninan', 'nina@gmail.com', '$2y$10$dxJ7Os8kYJIhplJjqycuku2DxPgX7vbmbYIn69Lz8zbmtutTgbSwq', 0, '', '2024-02-26 13:33:53', NULL, '2024-02-23', '', NULL, 'description', '', 'portugaise', '0', '', 0, NULL, '', 0),
(52, 'zear', 'azs', 'qwsdfq@gmail.com', '$2y$10$ctlpAvjVWg9TWJUPenfQDuvInqlzU0IR6/EnMeY4u/L4r9PSa0SHW', 0, '', '2024-02-26 13:47:17', NULL, '2024-02-01', '', NULL, 'hgxjgfvj', '', 'mexicaine', '0', '', 0, NULL, '', 0),
(53, 'niin', 'niina', 'niina@gmail.com', '$2y$10$eA3bPLLicBnlaD6UMcGR0ufOp.2QcZj4x4fDFgkWL9TPa2Ge1c8Z.', 0, '', '2024-02-26 15:21:37', NULL, '2024-02-29', '', NULL, 'ghjgkgju', '', 'portugaise', '0', '', 0, NULL, '', 0),
(54, 'niin', 'niina', 'niina@gmail.com', '$2y$10$2ZKITCgxaz70uRSqzpehK.He5NSStGYjber67EQ6aun0Q74tezhKW', 0, '', '2024-02-26 15:23:40', NULL, '2024-02-29', '', NULL, 'ghjgkgju', '', 'portugaise', '0', '', 0, NULL, '', 0),
(55, 'iniii', 'niina', 'iniii@gmail.com', '$2y$10$OuFA.PLNlGlCVAiltoUzNeZo0pp51O7Kl5Ede.WR9/5ZVPeQExer.', 0, '', '2024-02-26 15:26:38', NULL, '2024-02-29', '', NULL, 'ghjgkgju', '', 'portugaise', '0', '', 0, NULL, '', 0),
(56, 'innnn', 'uyu', 'nina@gmail.com', '$2y$10$qmRJO5bzSDvq3SlfLlq86eNA56njyrbCZLEl06MtAnKCbi1JJWTRK', 0, '', '2024-02-26 15:29:11', NULL, '2024-02-01', '', NULL, 'hgtjy', '', 'portugaise', '0', '', 0, NULL, '', 0),
(57, 'selma', 'sedrati', 'selmasedrati@gmail.com', '$2y$10$xe8PJAzwtrDSMyyU8ID90ufrTSKWKPUGYG04pPgFjwQ1uCBT4JDYy', 0, '', '2024-02-26 16:20:06', NULL, '2014-02-04', '', NULL, 'je m\'appelle selma', '', 'francaise', '0', '', 0, NULL, '', 0),
(58, 'hanas', 'sedrati', 'hana@gmail.com', '$2y$10$OdcmAr1sna3/iCs0bT6uMOrpSkFAM9mqi7Ve99KTx6.oZJtKu9xQm', 0, '', '2024-02-26 19:27:57', NULL, '2024-02-23', '', NULL, 'ieoa', '', 'portugaise', '0', '', 0, NULL, '', 0),
(59, 'selma', 'fdqsf', 'dsf@gmail.com', '$2y$10$X6t1tyjU7T26cvyKjtKiP.OSVMJ.yW8dTakt0wuH6iqbiHT2.0c8C', 0, '', '2024-02-27 08:17:08', NULL, '2024-02-09', '', NULL, 'sfg', '', 'suedoise', '0', '', 0, NULL, '', 0),
(60, 'admine', 'admine', 'admine@gmail.com', '$2y$10$aIgxls8Jc0BO2h5oRdJRbOtllPkUbI868smRmLe3lIniJYrHCj/VW', 0, '', '2024-02-27 14:37:32', NULL, '2024-03-02', '', NULL, 'admine', '', 'portugaise', '0', '', 0, NULL, '', 0),
(61, 'admine', 'trh', 'selmatsedrati@gmail.com', '$2y$10$ENQfkYFplj3FC4f7IW0rouexGq1R0KzjrlL2BysZlL9c9titx1IZG', 0, '', '2024-02-29 08:54:04', NULL, '2024-02-09', '', NULL, 'tr', '', 'portugaise', '0', '', 0, NULL, '', 0),
(62, 'fdhfh', 'fgffgch', 'selmfdgdfghasedrati@gmail.com', '$2y$10$g.VS/7hLtuP/OEvwau63mee6YUeaWKR7BZs0dfhm.JqDMkx9aZ3sa', 0, '', '2024-02-29 09:02:49', NULL, '2024-02-08', '', NULL, 'ghfvh', '', 'indienne', '0', '', 0, NULL, '', 0),
(63, 'admine', 'jkjl', 'admine@gmail.com', '$2y$10$giaRD3Xe2d7GwxomMlr0jOt1/U7KMpgWCe1vgiryshhSABDyUT30q', 0, '', '2024-02-29 09:06:24', NULL, '2024-02-21', '', NULL, '26', '', 'indienne', '0', 'ROLE_USER', 0, NULL, '', 0),
(64, 'entreprise', 'entreprise', 'entreprise@gmail.com', '$2y$10$MXy0wTVJZsZD1Nil00Rp3e5QPot4p1HRByycGSKcHaa3NHWCmUhe2', 0, '', '2024-02-29 09:24:58', NULL, '2024-02-02', '', NULL, 'sg', '', 'danoise', '0', 'ROLE_ENTREPRISE', 0, NULL, '', 0),
(65, 'adminfbe', 'vsd', 'gfcfwn@gmail.com', '$2y$10$CNf4arAaNGV/RIJM/D7M2.ImKNDpq.XZHtzrraFZh9Gv3cICEeOh.', 644823789, '', '2024-02-29 10:15:33', NULL, '2024-02-10', '', NULL, 'fddf', '', 'danoise', '0', 'ROLE_ENTREPRISE', 1454546547, NULL, '', 0),
(66, 'kenza', 'kenza', 'kenza@gmail.com', '$2y$10$GzWLfut.6KgAZtQtLBE1.u9DTQl.TKFtzxftxgPFXd6Oy4sOApEK6', 25110, '', '2024-02-29 10:35:51', NULL, '2024-02-03', 'Mme', NULL, 'sdwvsd', '', 'danoise', '0', 'ROLE_USER', 34646, NULL, '', 0),
(67, 'entreprise_ad', 'ad', 'adminEntreprise@gmail.com', '$2y$10$CI/I8fg3vswQLPcN.E46BuuOJKzrZGwY2s3lWoyjR4agYAT4gsTka', 5869876, '', '2024-02-29 11:01:18', NULL, '2024-02-02', 'Mme', NULL, 'fsgb', '', 'portugaise', '0', 'ROLE_ENTREPRISE', 145361, NULL, '', 0),
(68, 'trueAdmin', 'sedrati', 'trueAdmin@gmail.com', '$2y$10$Gf/hjhN5uKQdg5wjAjVDg.gXyLmvzfpz8mWbEK4WWTgebXMglfq9C', 7858765, '', '2024-02-29 12:13:16', NULL, '2024-02-09', 'Mr', NULL, 'erd', '', 'portugaise', 'En Attente', 'ROLE_ADMIN', 85863865, NULL, '', 0),
(69, 'hwds', 'xhsf', 'k@gmail.com', '$2y$10$xlDax4e96ejJ/sjkGcAFeegMCpDne8HSw13PeiEqKOsSR/TmGLhf.', 12, '', '2024-03-04 08:39:51', NULL, '2024-03-16', 'Mme', NULL, 'chg', '', 'norvegienne', 'En Attente', 'ROLE_ADMIN', 331321, NULL, '', 0),
(70, 'GIlles', 'Minkoa', 'rgilles@gmail.com', '$2y$10$97qvNYCBQuyvPWa9RM3Uu.gbXnsVx1c6qmGCJWJ6LK.4fNY3Bkktu', 644823789, '', '2024-03-04 13:44:23', NULL, '2024-03-16', 'Mr', NULL, 'oihj', '', 'danoise', 'En Attente', 'ROLE_USER', 454536, NULL, '', 0),
(71, 'GIlles', 'Minkoa', 'rgilles@gmail.com', '$2y$10$m8g5MREeFqbnK4zL.eDPseuPTcAG/E0VYtwTFhAWKgVSH8cEg8YPO', 644823789, '', '2024-03-04 13:51:42', NULL, '2024-03-16', 'Mr', NULL, 'oihj', '', 'danoise', 'En Attente', 'ROLE_USER', 454536, NULL, '', 0),
(72, 'admine', 'nora benikass', 'tru6952252eAdmin@gmail.com', '$2y$10$ijxtpoj4nVeg4ie0cjN96uDvpd4HYZ3q4Vt01VK5QlypT4Ccm4Emy', 644823789, '', '2024-03-04 13:57:47', NULL, '2024-03-26', 'Mr', NULL, '585145', '', 'indienne', 'En Attente', 'ROLE_ENTREPRISE', 454536, NULL, '', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
