-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3306
-- 生成日時: 
-- サーバのバージョン： 5.7.24
-- PHP のバージョン: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_member_table`
--

CREATE TABLE `gs_member_table` (
  `id` int(12) NOT NULL,
  `mailaddress` varchar(256) CHARACTER SET utf8 NOT NULL,
  `password` varchar(64) CHARACTER SET utf8 NOT NULL,
  `grade` int(12) DEFAULT NULL,
  `family` int(12) DEFAULT NULL,
  `inputdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- テーブルのデータのダンプ `gs_member_table`
--

INSERT INTO `gs_member_table` (`id`, `mailaddress`, `password`, `grade`, `family`, `inputdate`) VALUES
(34, 'yamada@gmail.com', '20130525', 3, 1, '2020-10-30 21:56:07'),
(35, 'tanaka@gmail.com', '20130525', NULL, 1, '2020-10-31 00:31:02'),
(36, 'sato@gmail.com', '20130525', NULL, NULL, '2020-10-31 01:19:37'),
(37, 'suzuki@gmail.com', '20130525', NULL, NULL, '2020-10-31 11:36:53'),
(38, 'ito@gmail.com', '20130525', NULL, NULL, '2020-10-31 11:37:29'),
(39, 'kato@gmail.com', '20130525', NULL, NULL, '2020-10-31 11:37:54'),
(40, 'otake@gmail.com', '20000101', NULL, 1, '2020-10-31 13:41:15'),
(41, 'ran@gmail.com', '00000000', NULL, NULL, '2020-10-31 13:58:07'),
(42, 'maru@oo.com', '33333333', NULL, NULL, '2020-10-31 14:02:52'),
(43, 'kk@ll.com', '12345678', NULL, NULL, '2020-10-31 14:03:51'),
(44, 'pp@pp.com', '12345678', NULL, 1, '2020-10-31 14:05:00'),
(45, 'sasa@kk.com', '12345678', NULL, 1, '2020-10-31 14:13:22');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_member_table`
--
ALTER TABLE `gs_member_table`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `gs_member_table`
--
ALTER TABLE `gs_member_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
