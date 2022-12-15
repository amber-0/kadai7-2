-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2022-12-15 15:47:47
-- サーバのバージョン： 10.4.27-MariaDB
-- PHP のバージョン: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `ichimi_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `ichimi_data_table`
--

CREATE TABLE `ichimi_data_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `eval` int(12) NOT NULL,
  `container` varchar(64) NOT NULL,
  `seller` varchar(64) NOT NULL,
  `quantity` varchar(64) NOT NULL,
  `review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `ichimi_data_table`
--

INSERT INTO `ichimi_data_table` (`id`, `name`, `eval`, `container`, `seller`, `quantity`, `review`) VALUES
(2, 'ギノ', 3, '個包装', 'テスト', 'テスト', 'テスト'),
(3, 'テスト3', 4, '個包装', 'テスト3', 'テスト3', 'テスト3'),
(4, 'タバスコ', 4, '瓶', 'アメリカ', '50ml', '酸っぱさの中に辛みがありおいしい'),
(5, 'テスト3', 4, '袋', 'アメリカ', 'テスト3', 'テスト3'),
(6, 'まいこさんヒイヒイ', 3, '袋', 'ギノ', '120g', 'とにかく辛すぎる');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `ichimi_data_table`
--
ALTER TABLE `ichimi_data_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `ichimi_data_table`
--
ALTER TABLE `ichimi_data_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
