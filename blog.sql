-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1:3306
-- 生成日期： 2023-12-26 09:41:03
-- 服务器版本： 5.7.26
-- PHP 版本： 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `blog`
--

-- --------------------------------------------------------

--
-- 表的结构 `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_title` text CHARACTER SET utf8,
  `post_content` text CHARACTER SET utf8,
  `post_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `post`
--

INSERT INTO `post` (`id`, `post_title`, `post_content`, `post_date`) VALUES
(2, '长相思', '山一程\r\n水一程\r\n身向榆关那畔行\r\n夜深千帐灯\r\n　　\r\n风一更\r\n雪一更\r\n聒碎乡心梦不成\r\n故园无此声', '2009-03-22 15:29:20'),
(3, '如梦令', '万帐穹庐人醉\r\n星影摇摇欲坠\r\n\r\n归梦隔狼河\r\n又被河声搅碎\r\n\r\n还睡\r\n还睡\r\n解道醒来无味', '2009-03-22 15:29:30'),
(4, '梦江南', '昏鸦尽\r\n小立恨因谁\r\n急雪乍翻香阁絮\r\n轻风吹到胆瓶梅\r\n心字已成灰', '2009-03-22 15:32:27'),
(6, '使至塞上', '单车欲问边，属国过居延。\r\n\r\n征蓬出汉塞，归雁入胡天。\r\n\r\n大漠孤烟直，长河落日圆。\r\n\r\n萧关逢候骑，都护在燕然。 \r\n', '2023-12-26 17:33:51');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, '张三', '123'),
(2, '李四', '123456');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
