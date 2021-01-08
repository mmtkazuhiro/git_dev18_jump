-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3306
-- 生成日時: 2021 年 1 月 08 日 14:50
-- サーバのバージョン： 5.7.30
-- PHP のバージョン: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- データベース: `gs_kadai`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_table`
--

CREATE TABLE `gs_bm_table` (
  `id` int(12) NOT NULL,
  `first` text NOT NULL,
  `second` text NOT NULL,
  `third` text NOT NULL,
  `comment` text NOT NULL,
  `favorite` varchar(64) NOT NULL,
  `url` text NOT NULL,
  `post` text NOT NULL,
  `address1` text NOT NULL,
  `address2` text NOT NULL,
  `tel` text NOT NULL,
  `name` text NOT NULL,
  `age` text NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`id`, `first`, `second`, `third`, `comment`, `favorite`, `url`, `post`, `address1`, `address2`, `tel`, `name`, `age`, `indate`) VALUES
(0, '一番目に面白かったマンガのタイトル', '二番目に面白かったマンガのタイトル', '三番目に面白かったマンガのタイトル', '今回の感想', '今おすすめのマンガ', 'おすすめのマンガのURL', '郵便番号', '住所1', '住所2', '電話番号', '氏名', '年齢', '1111-11-11 11:11:11'),
(1, 'ONE PIECE', '呪術廻戦', 'チェンソーマン', '面白かった。', '神之塔', 'https://manga.line.me/product/periodic?id=Z0000197', '0000000', '東京', '新宿区', '00000000000', 'test', '15', '2021-01-08 23:31:24');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
