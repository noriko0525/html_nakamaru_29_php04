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
-- テーブルの構造 `gs_item_table`
--

CREATE TABLE `gs_item_table` (
  `id` int(11) NOT NULL,
  `title` varchar(16) CHARACTER SET utf8 NOT NULL,
  `age` int(16) NOT NULL,
  `place` varchar(36) CHARACTER SET utf8 NOT NULL,
  `image` varchar(182) COLLATE utf32_unicode_ci NOT NULL,
  `comment` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `secretmesto` varchar(360) COLLATE utf32_unicode_ci DEFAULT NULL,
  `secretmes` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `inputdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- テーブルのデータのダンプ `gs_item_table`
--

INSERT INTO `gs_item_table` (`id`, `title`, `age`, `place`, `image`, `comment`, `secretmesto`, `secretmes`, `inputdate`) VALUES
(25, 'おやつの時間', 6, 'おうち', 'file/46850155-9186-4DA6-A4F0-8AC5D6E34ACC (1).jpg', 'おやつのじかんに上手にぶどうをおさらに盛る', '', '', '2020-10-31 12:34:15'),
(26, 'おやつの時間', 6, 'おうち', 'file/1592127708895 (1).jpg', 'おやつのじかんに上手にぶどうをおさらに盛る', '', '', '2020-10-31 12:47:21'),
(27, 'めるちゃんおやすみ', 5, 'おうち', 'file/IMG_1174.JPG', 'よくねていますね！', '', '', '2020-10-31 13:07:06'),
(28, 'めるちゃんおやすみ', 5, 'おうち', 'file/IMG_1237.JPG', 'たのしそう', '', '', '2020-10-31 13:43:25'),
(29, 'めるちゃんおやすみ', 5, 'おうち', 'file/IMG_1302 (1).JPG', '', '', '', '2020-10-31 14:14:43'),
(30, 'めるちゃんおやすみ２', 29, 'おうち', 'file/IMG_0932.JPG', '', '', '', '2020-10-31 14:17:22'),
(31, 'ねずみちゃん', 10, 'おうち', 'file/DSC_0209 (1).JPG', '', '', '', '2020-10-31 18:05:01'),
(32, 'めるちゃんおやすみ', 5, 'おうち', 'file/IMG_0863.JPG', '', '', '', '2020-11-04 03:03:01'),
(33, 'レゴ', 6, 'おうち', 'file/DSC_0283.JPG', 'すみっこぐらしとレゴ', '', '', '2020-11-05 00:03:02'),
(34, 'おふろで楽しむ', 6, 'おうち', 'file/490E4C65-440E-4AC9-8831-C913E487CE2B.jpg', '日本の名湯を入れて楽しみました！', '', '', '2020-11-05 23:18:43'),
(35, 'おやつの時間', 6, 'おうち', 'file/', 'おやつのじかんに上手にぶどうをおさらに盛る', '', '', '2020-11-05 23:26:39'),
(36, 'キャンプで焚火', 29, 'おうち', 'file/', '', '', '', '2020-11-05 23:27:02');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_item_table`
--
ALTER TABLE `gs_item_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `gs_item_table`
--
ALTER TABLE `gs_item_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
