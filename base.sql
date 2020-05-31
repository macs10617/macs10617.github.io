-- phpMyAdmin SQL Dump
-- version 4.0.0-rc2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Май 24 2013 г., 02:18
-- Версия сервера: 5.1.63-0+squeeze1
-- Версия PHP: 5.3.3-7+squeeze14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `test-hyip`
--

-- --------------------------------------------------------

--
-- Структура таблицы `online`
--

CREATE TABLE IF NOT EXISTS `online` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ip` varchar(20) NOT NULL DEFAULT '0',
  `unix` varchar(60) NOT NULL DEFAULT '',
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `online`
--

INSERT INTO `online` (`id`, `ip`, `unix`) VALUES
(14, '', '1367968279');

-- --------------------------------------------------------

--
-- Структура таблицы `online_list`
--

CREATE TABLE IF NOT EXISTS `online_list` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) DEFAULT NULL,
  `uniq_id` varchar(255) DEFAULT NULL,
  `last_time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2472 ;

--
-- Дамп данных таблицы `online_list`
--

INSERT INTO `online_list` (`id`, `ip`, `uniq_id`, `last_time`) VALUES
(2471, '90.188.98.24', '519e6a3a7402e', '1369336378');

-- --------------------------------------------------------

--
-- Структура таблицы `tb_ban`
--

CREATE TABLE IF NOT EXISTS `tb_ban` (
  `user` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `tb_bl_ip`
--

CREATE TABLE IF NOT EXISTS `tb_bl_ip` (
  `ip` varchar(160) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `tb_chat`
--

CREATE TABLE IF NOT EXISTS `tb_chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(360) NOT NULL,
  `date` varchar(21) NOT NULL,
  `login` varchar(25) NOT NULL,
  `user_id` int(11) NOT NULL,
  `img` varchar(4) NOT NULL,
  `flag` tinyint(1) NOT NULL,
  `moder` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `tb_chat2`
--

CREATE TABLE IF NOT EXISTS `tb_chat2` (
  `name` int(11) NOT NULL,
  `fi` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `tb_config`
--

CREATE TABLE IF NOT EXISTS `tb_config` (
  `id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `site_name` varchar(160) NOT NULL,
  `money` varchar(5) NOT NULL,
  `min` float(9,2) NOT NULL,
  `money_ref` float(9,2) NOT NULL,
  `ar_money` float(9,2) NOT NULL,
  `ar_money2` float(9,2) NOT NULL,
  `mail` float(9,3) NOT NULL,
  `mail2` float(9,3) NOT NULL,
  `mail_max` float(9,3) NOT NULL,
  `mail2_max` float(9,3) NOT NULL,
  `mail_money` float(9,2) NOT NULL,
  `mail2_money` float(9,2) NOT NULL,
  `gl_money` float(9,2) NOT NULL,
  `gl_money2` float(9,2) NOT NULL,
  `limit_money` float(9,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `tb_config`
--

INSERT INTO `tb_config` (`id`, `site_name`, `money`, `min`, `money_ref`, `ar_money`, `ar_money2`, `mail`, `mail2`, `mail_max`, `mail2_max`, `mail_money`, `mail2_money`, `gl_money`, `gl_money2`, `limit_money`) VALUES
(1, 'http://test-hyip.eurhost.ru/', 'руб.', 0.00, 0.00, 0.00, 0.00, 0.000, 0.000, 0.000, 0.000, 0.00, 0.00, 0.00, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Структура таблицы `tb_history`
--

CREATE TABLE IF NOT EXISTS `tb_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(25) NOT NULL,
  `text` varchar(160) NOT NULL,
  `money` float(9,2) NOT NULL,
  `date` varchar(21) NOT NULL,
  `flag` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=21037 ;

--
-- Дамп данных таблицы `tb_history`
--

INSERT INTO `tb_history` (`id`, `login`, `text`, `money`, `date`, `flag`) VALUES
(20978, 'sav2112', 'Процент с вклада вашего реферала andree197111 (13%)', 130.00, '2013-05-23 20:19:42', 0),
(20977, 'andree197111', 'Инвестиция на срок 36 часа(ов)', 1000.00, '2013-05-23 20:19:42', 1),
(20976, 'sav2112', 'Процент с вклада вашего реферала slava1010 (13%)', 130.00, '2013-05-23 20:19:02', 0),
(20975, 'slava1010', 'Инвестиция на срок 36 часа(ов)', 1000.00, '2013-05-23 20:19:02', 1),
(20974, 'sav2112', 'Процент с вклада вашего реферала megaprofit777 (13%)', 156.00, '2013-05-23 20:04:34', 0),
(20973, 'megaprofit777', 'Инвестиция на срок 36 часа(ов)', 1200.00, '2013-05-23 20:04:34', 1),
(20972, 'megaprofit777', 'Пополнение баланса Perfect Money', 1200.00, '2013-05-23 20:04:20', 0),
(20979, 'miron66', 'Инвестиция на срок 48 часа(ов)', 1000.00, '2013-05-23 20:20:37', 1),
(20980, 'kjiebep', 'Процент с вклада вашего реферала miron66 (13%)', 130.00, '2013-05-23 20:20:37', 0),
(20981, 'nazarevich2', 'Инвестиция на срок 12 часа(ов)', 1000.00, '2013-05-23 20:21:08', 1),
(20982, 'milena', 'Процент с вклада вашего реферала nazarevich2 (13%)', 130.00, '2013-05-23 20:21:08', 0),
(20983, 'kadissa', 'Пополнение баланса', 1000.00, '23.05.2013 г. в 20:24', 0),
(20984, 'kadissa', 'Инвестиция на срок 24 часа(ов)', 2000.00, '2013-05-23 20:24:43', 1),
(20985, 'sav2112', 'Процент с вклада вашего реферала kadissa (13%)', 260.00, '2013-05-23 20:24:43', 0),
(20986, 'electronics', 'Инвестиция на срок 12 часа(ов)', 100.00, '2013-05-23 20:25:14', 1),
(20987, 'miron66', 'Процент с вклада вашего реферала electronics (13%)', 13.00, '2013-05-23 20:25:14', 0),
(20988, 'electronics', 'Инвестиция на срок 12 часа(ов)', 900.00, '2013-05-23 20:26:09', 1),
(20989, 'miron66', 'Процент с вклада вашего реферала electronics (13%)', 117.00, '2013-05-23 20:26:09', 0),
(20990, 'megaprofit777', 'Инвестиция на срок 24 часа(ов)', 1000.00, '2013-05-23 20:28:08', 1),
(20991, 'sav2112', 'Процент с вклада вашего реферала megaprofit777 (13%)', 130.00, '2013-05-23 20:28:08', 0),
(20992, 'Янивс', 'Инвестиция на срок 12 часа(ов)', 1000.00, '2013-05-23 20:29:14', 1),
(20993, 'electronics', 'Пополнение баланса Qiwi', 100.00, '2013-05-23 20:37:23', 0),
(20994, 'electronics', 'Инвестиция на срок 12 часа(ов)', 100.00, '2013-05-23 20:38:16', 1),
(20995, 'miron66', 'Процент с вклада вашего реферала electronics (13%)', 13.00, '2013-05-23 20:38:16', 0),
(20996, 'nazarevich2', 'Инвестиция на срок 48 часа(ов)', 3000.00, '2013-05-23 20:44:24', 1),
(20997, 'milena', 'Процент с вклада вашего реферала nazarevich2 (13%)', 390.00, '2013-05-23 20:44:24', 0),
(20998, 'sekasa', 'Пополнение баланса Qiwi', 1000.00, '2013-05-23 20:50:19', 0),
(20999, 'millioner_online', 'Инвестиция на срок 12 часа(ов)', 1000.00, '2013-05-23 20:50:22', 1),
(21000, 'kjiebep', 'Процент с вклада вашего реферала millioner_online (13%)', 130.00, '2013-05-23 20:50:22', 0),
(21001, 'kadissa', 'Пополнение баланса Qiwi', 2000.00, '2013-05-23 20:50:23', 0),
(21002, 'slava1010', 'Пополнение баланса Qiwi', 1000.00, '2013-05-23 20:50:43', 0),
(21003, 'sharanina', 'Пополнение баланса Perfect Money', 600.00, '2013-05-23 20:53:18', 0),
(21004, 'sharanina', 'Инвестиция на срок 12 часа(ов)', 600.00, '2013-05-23 20:53:52', 1),
(21005, 'maksim25051995', 'Пополнение баланса Perfect Money', 216.00, '2013-05-23 20:55:49', 0),
(21006, 'maksim25051995', 'Инвестиция на срок 24 часа(ов)', 216.00, '2013-05-23 20:56:27', 1),
(21007, 'unibotss', 'Процент с вклада вашего реферала maksim25051995 (13%)', 28.08, '2013-05-23 20:56:27', 0),
(21008, 'duh771', 'Пополнение баланса Qiwi', 100.00, '2013-05-23 21:01:36', 0),
(21009, 'evstart0656', 'Пополнение баланса Perfect Money', 750.00, '2013-05-23 21:02:02', 0),
(21010, 'evstart0656', 'Инвестиция на срок 48 часа(ов)', 750.00, '2013-05-23 21:03:19', 1),
(21011, 'mazik235', 'Процент с вклада вашего реферала evstart0656 (13%)', 97.50, '2013-05-23 21:03:19', 0),
(21012, 'duh771', 'Инвестиция на срок 12 часа(ов)', 100.00, '2013-05-23 21:06:39', 1),
(21013, 'killi', 'Процент с вклада вашего реферала duh771 (13%)', 13.00, '2013-05-23 21:06:39', 0),
(21014, 'sekasa', 'Инвестиция на срок 12 часа(ов)', 500.00, '2013-05-23 21:07:04', 1),
(21015, 'bella', 'Процент с вклада вашего реферала sekasa (13%)', 65.00, '2013-05-23 21:07:04', 0),
(21016, 'parovoz2233', 'Пополнение баланса Perfect Money', 360.00, '2013-05-23 21:08:44', 0),
(21017, 'parovoz2233', 'Инвестиция на срок 12 часа(ов)', 360.00, '2013-05-23 21:09:54', 1),
(21018, 'maxim34771РІРѕС‚СЃРµРіРѕР', 'Процент с вклада вашего реферала parovoz2233 (13%)', 46.80, '2013-05-23 21:09:54', 0),
(21019, 'vlada', 'Пополнение баланса Qiwi', 500.00, '2013-05-23 21:20:37', 0),
(21020, 'gribov', 'Пополнение баланса Qiwi', 100.00, '2013-05-23 21:20:56', 0),
(21021, 'gribov', 'Инвестиция на срок 12 часа(ов)', 100.00, '2013-05-23 21:21:59', 1),
(21022, 'kjiebep', 'Процент с вклада вашего реферала gribov (13%)', 13.00, '2013-05-23 21:21:59', 0),
(21023, 'miron66', 'Инвестиция на срок 12 часа(ов)', 143.00, '2013-05-23 21:24:10', 1),
(21024, 'kjiebep', 'Процент с вклада вашего реферала miron66 (13%)', 18.59, '2013-05-23 21:24:10', 0),
(21025, 'kjiebep', 'Пополнение баланса', 3000.00, '23.05.2013 г. в 21:24', 0),
(21026, 'kjiebep', 'Инвестиция на срок 36 часа(ов)', 3000.00, '2013-05-23 21:25:09', 1),
(21027, 'sqaer', 'Пополнение баланса Perfect Money', 210.00, '2013-05-23 21:25:52', 0),
(21028, 'sqaer', 'Инвестиция на срок 24 часа(ов)', 210.00, '2013-05-23 21:27:17', 1),
(21029, 'vlada', 'Инвестиция на срок 12 часа(ов)', 500.00, '2013-05-23 21:28:56', 1),
(21030, 'millioner_online', 'Процент с вклада вашего реферала vlada (13%)', 65.00, '2013-05-23 21:28:56', 0),
(21031, 'admin', 'Инвестиция на срок 24 часа(ов)', 1000.00, '2013-05-23 21:31:53', 1),
(21032, 'ultrakillerss', 'Пополнение баланса', 1500.00, '23.05.2013 г. в 21:40', 0),
(21033, 'ultrakillerss', 'Инвестиция на срок 12 часа(ов)', 1500.00, '2013-05-23 21:41:37', 1),
(21034, 'ultra', 'Процент с вклада вашего реферала ultrakillerss (13%)', 195.00, '2013-05-23 21:41:37', 0),
(21035, 'electronics', 'Пополнение баланса Qiwi', 100.00, '2013-05-23 22:20:02', 0),
(21036, 'lexa73', 'Пополнение баланса Qiwi', 100.00, '2013-05-23 22:38:32', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `tb_inv`
--

CREATE TABLE IF NOT EXISTS `tb_inv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(25) NOT NULL,
  `money` float(9,0) NOT NULL,
  `money2` float(9,0) NOT NULL,
  `pr` float(9,0) NOT NULL,
  `date` varchar(21) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=19778 ;

-- --------------------------------------------------------

--
-- Структура таблицы `tb_massmail`
--

CREATE TABLE IF NOT EXISTS `tb_massmail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(160) NOT NULL,
  `text` text NOT NULL,
  `users` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Структура таблицы `tb_news`
--

CREATE TABLE IF NOT EXISTS `tb_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL,
  `text` text NOT NULL,
  `date` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=37 ;

--
-- Дамп данных таблицы `tb_news`
--

INSERT INTO `tb_news` (`id`, `title`, `text`, `date`) VALUES
(36, 'Открытие проекта', 'Открытие проекта состоится 23 мая 2013 года в 20:00 по Московскому времени!', '22.05.2013');

-- --------------------------------------------------------

--
-- Структура таблицы `tb_news_cm`
--

CREATE TABLE IF NOT EXISTS `tb_news_cm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(25) NOT NULL,
  `text` varchar(360) NOT NULL,
  `text2` varchar(360) NOT NULL,
  `date` varchar(21) NOT NULL,
  `num` int(11) NOT NULL,
  `flag` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=958 ;

-- --------------------------------------------------------

--
-- Структура таблицы `tb_online_chat`
--

CREATE TABLE IF NOT EXISTS `tb_online_chat` (
  `user` int(11) NOT NULL,
  `login` varchar(25) NOT NULL,
  `img` varchar(4) NOT NULL,
  `time` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `tb_online_chat`
--

INSERT INTO `tb_online_chat` (`user`, `login`, `img`, `time`) VALUES
(572, 'fucker', '', '1369331944'),
(1, 'admin', '', '1369336497');

-- --------------------------------------------------------

--
-- Структура таблицы `tb_payme`
--

CREATE TABLE IF NOT EXISTS `tb_payme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(25) NOT NULL,
  `summa` float(9,2) NOT NULL,
  `text` varchar(160) NOT NULL,
  `op` tinyint(3) NOT NULL,
  `date` varchar(21) NOT NULL,
  `flag` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=49744 ;

-- --------------------------------------------------------

--
-- Структура таблицы `tb_qiwi`
--

CREATE TABLE IF NOT EXISTS `tb_qiwi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(25) NOT NULL,
  `money` float(9,0) NOT NULL,
  `date` varchar(21) NOT NULL,
  `payid` varchar(21) NOT NULL,
  `phone` varchar(21) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=19690 ;

-- --------------------------------------------------------

--
-- Структура таблицы `tb_stat`
--

CREATE TABLE IF NOT EXISTS `tb_stat` (
  `id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `users` int(11) NOT NULL,
  `ru` int(11) NOT NULL,
  `ua` int(11) NOT NULL,
  `kz` int(11) NOT NULL,
  `byr` int(11) NOT NULL,
  `allr` int(11) NOT NULL,
  `inv` int(11) NOT NULL,
  `sinv` float(9,2) NOT NULL,
  `vinv` float(9,2) NOT NULL,
  `online` int(11) NOT NULL,
  `money` float(9,2) NOT NULL,
  `money2` float(9,2) NOT NULL,
  `date` varchar(15) NOT NULL,
  `payme` float(9,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `tb_stat`
--

INSERT INTO `tb_stat` (`id`, `users`, `ru`, `ua`, `kz`, `byr`, `allr`, `inv`, `sinv`, `vinv`, `online`, `money`, `money2`, `date`, `payme`) VALUES
(1, 1, 1, 0, 0, 0, 0, 0, 0.00, 0.00, 0, 0.00, 0.00, '1369335213', 0.00);

-- --------------------------------------------------------

--
-- Структура таблицы `tb_theme`
--

CREATE TABLE IF NOT EXISTS `tb_theme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user1` varchar(25) NOT NULL,
  `user` varchar(25) NOT NULL,
  `title` varchar(160) NOT NULL,
  `text` longtext NOT NULL,
  `date` int(10) NOT NULL,
  `active` tinyint(3) NOT NULL,
  `flag` tinyint(3) NOT NULL,
  `flag2` tinyint(3) NOT NULL,
  `theme` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `active` (`active`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=2083 ;

-- --------------------------------------------------------

--
-- Структура таблицы `tb_theme2`
--

CREATE TABLE IF NOT EXISTS `tb_theme2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(25) NOT NULL,
  `num` int(10) NOT NULL,
  `text` longtext NOT NULL,
  `date` int(10) NOT NULL,
  `adm` tinyint(3) NOT NULL,
  `flag` tinyint(3) NOT NULL,
  `foto` varchar(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `num` (`num`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=4181 ;

-- --------------------------------------------------------

--
-- Структура таблицы `tb_users`
--

CREATE TABLE IF NOT EXISTS `tb_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` varchar(150) NOT NULL,
  `wmid` varchar(12) NOT NULL,
  `referer` varchar(25) NOT NULL,
  `visits` mediumint(8) NOT NULL DEFAULT '0',
  `money` float(9,2) NOT NULL DEFAULT '0.00',
  `sinv` float(9,2) NOT NULL DEFAULT '0.00',
  `vinv` float(9,2) NOT NULL DEFAULT '0.00',
  `agent` longtext NOT NULL,
  `img` varchar(4) NOT NULL,
  `all_view` int(11) NOT NULL,
  `all_view_money` float(9,3) NOT NULL,
  `all_ref` int(11) NOT NULL,
  `all_ref_money` float(9,3) NOT NULL,
  `all_ref_money2` float(9,3) NOT NULL,
  `all_ads` int(11) NOT NULL,
  `all_ads_money` float(9,3) NOT NULL,
  `all_task` int(11) NOT NULL,
  `all_task_money` float(9,2) NOT NULL,
  `all_ip` longtext NOT NULL,
  `http_referer` varchar(160) NOT NULL,
  `online` varchar(15) NOT NULL,
  `chat_mod` tinyint(1) NOT NULL,
  `click` float(9,3) NOT NULL,
  `click2` float(9,3) NOT NULL,
  `click3` float(9,3) NOT NULL,
  `ads_pc` float(9,2) NOT NULL,
  `task_pc` float(9,2) NOT NULL,
  `money_ref` float(9,2) NOT NULL,
  `refbek` float(9,3) NOT NULL,
  `country` varchar(3) NOT NULL,
  `bl` tinyint(1) NOT NULL,
  `bl_text` varchar(160) NOT NULL,
  `no_bl` tinyint(1) NOT NULL,
  `text_all` longtext NOT NULL,
  `status` tinyint(1) NOT NULL,
  `folder` tinyint(1) NOT NULL,
  `folder2` varchar(15) NOT NULL,
  `folder3` varchar(15) NOT NULL,
  `news` int(11) NOT NULL,
  `rris` tinyint(1) NOT NULL,
  `action` int(11) NOT NULL,
  `action_pc` float(9,1) NOT NULL,
  `action_money_all` float(9,4) NOT NULL,
  `sec_flag` tinyint(1) NOT NULL,
  `sec_md` varchar(32) NOT NULL,
  `ar_ref` int(11) NOT NULL,
  `fs` float(9,2) NOT NULL,
  `fs_no` float(9,2) NOT NULL,
  `fs_ok` float(9,2) NOT NULL,
  `rb` int(11) NOT NULL,
  `rb_money` float(9,4) NOT NULL,
  `rb_date` varchar(10) NOT NULL,
  `bonus` float(9,3) NOT NULL,
  `bonus2` float(9,3) NOT NULL,
  `bonus_all` int(11) NOT NULL,
  `bonus_money` float(9,3) NOT NULL,
  `bonus_time` varchar(15) NOT NULL,
  `vip` varchar(15) NOT NULL,
  `vip_test` tinyint(1) NOT NULL,
  `ref_lease` float(9,3) NOT NULL,
  `mail_flag` tinyint(1) NOT NULL,
  `mail_wait` varchar(32) NOT NULL,
  `online_page` varchar(60) NOT NULL,
  `mail` float(9,3) NOT NULL,
  `mail2` float(9,3) NOT NULL,
  `all_view_mail` int(11) NOT NULL,
  `all_view_mail_money` float(9,3) NOT NULL,
  `flag_pay` tinyint(1) NOT NULL,
  `update_date` varchar(15) NOT NULL,
  `mail_in` int(11) NOT NULL,
  `ads_in` int(11) NOT NULL,
  `test_dr` tinyint(1) NOT NULL,
  `gl2_money` float(9,2) NOT NULL,
  `gl2_all` int(11) NOT NULL,
  `gl_vip` int(11) NOT NULL,
  `gl_all` int(11) NOT NULL,
  `gl_flag` tinyint(1) NOT NULL,
  `gl_users` text NOT NULL,
  `bj_flag` tinyint(1) NOT NULL,
  `bj_flag2` tinyint(1) NOT NULL,
  `bj_money` float(9,2) NOT NULL,
  `bj_ok_all` int(11) NOT NULL,
  `bj_ok_money` float(9,2) NOT NULL,
  `bj_time` varchar(15) NOT NULL,
  `bj_time2` varchar(15) NOT NULL,
  `limit1` varchar(15) NOT NULL,
  `limit2` varchar(15) NOT NULL,
  `limit_all` int(11) NOT NULL,
  `yanm` varchar(14) NOT NULL,
  `pmnm` varchar(8) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `gls` float(9,2) NOT NULL,
  `gls2` float(9,2) NOT NULL,
  `credit_money` float(9,2) NOT NULL,
  `credit_proc` float(9,2) NOT NULL,
  `contest_ads` float(9,2) NOT NULL,
  `contest_click` int(11) NOT NULL,
  `contest_ref` int(11) NOT NULL,
  `contest_inv` float(9,2) NOT NULL,
  `credit_vz` float(9,2) NOT NULL,
  `credit_vr` float(9,2) NOT NULL,
  `credit_date` varchar(15) NOT NULL,
  `theme_bl` tinyint(1) NOT NULL,
  `ref_text` varchar(2000) NOT NULL,
  `ip` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`login`),
  KEY `password` (`password`),
  KEY `referer` (`referer`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=583 ;

--
-- Дамп данных таблицы `tb_users`
--

INSERT INTO `tb_users` (`id`, `login`, `password`, `email`, `wmid`, `referer`, `visits`, `money`, `sinv`, `vinv`, `agent`, `img`, `all_view`, `all_view_money`, `all_ref`, `all_ref_money`, `all_ref_money2`, `all_ads`, `all_ads_money`, `all_task`, `all_task_money`, `all_ip`, `http_referer`, `online`, `chat_mod`, `click`, `click2`, `click3`, `ads_pc`, `task_pc`, `money_ref`, `refbek`, `country`, `bl`, `bl_text`, `no_bl`, `text_all`, `status`, `folder`, `folder2`, `folder3`, `news`, `rris`, `action`, `action_pc`, `action_money_all`, `sec_flag`, `sec_md`, `ar_ref`, `fs`, `fs_no`, `fs_ok`, `rb`, `rb_money`, `rb_date`, `bonus`, `bonus2`, `bonus_all`, `bonus_money`, `bonus_time`, `vip`, `vip_test`, `ref_lease`, `mail_flag`, `mail_wait`, `online_page`, `mail`, `mail2`, `all_view_mail`, `all_view_mail_money`, `flag_pay`, `update_date`, `mail_in`, `ads_in`, `test_dr`, `gl2_money`, `gl2_all`, `gl_vip`, `gl_all`, `gl_flag`, `gl_users`, `bj_flag`, `bj_flag2`, `bj_money`, `bj_ok_all`, `bj_ok_money`, `bj_time`, `bj_time2`, `limit1`, `limit2`, `limit_all`, `yanm`, `pmnm`, `phone`, `gls`, `gls2`, `credit_money`, `credit_proc`, `contest_ads`, `contest_click`, `contest_ref`, `contest_inv`, `credit_vz`, `credit_vr`, `credit_date`, `theme_bl`, `ref_text`, `ip`) VALUES
(1, 'admin', 'admin', 'admin@huyp.ru', '', '', 0, 0.00, 0.00, 0.00, '', '', 0, 0.000, 0, 0.000, 0.000, 0, 0.000, 0, 0.00, '', '', '1369336650', 1, 0.000, 0.000, 0.000, 0.00, 0.00, 0.00, 0.000, 'ru', 0, '', 1, '', 2, 0, 'Рефы 1', 'Рефы 2', 35, 0, 0, 0.0, 0.0000, 0, '', 0, 0.00, 0.00, 0.00, 0, 0.0000, '', 0.000, 0.000, 0, 0.000, '', '', 1, 0.000, 1, '', '/top.php', 0.000, 0.000, 0, 0.000, 0, '1369336625', 0, 0, 0, 0.00, 0, 0, 0, 0, '', 0, 1, 0.00, 0, 0.00, '', '1357455469', '', '', 0, '', '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0.00, 0.00, 0.00, '', 0, '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `useronline`
--

CREATE TABLE IF NOT EXISTS `useronline` (
  `timestamp` int(15) NOT NULL DEFAULT '0',
  `ip` varchar(40) NOT NULL,
  `file` varchar(100) NOT NULL,
  PRIMARY KEY (`timestamp`),
  KEY `ip` (`ip`),
  KEY `file` (`file`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `useronline`
--

INSERT INTO `useronline` (`timestamp`, `ip`, `file`) VALUES
(1369154322, '90.188.98.24', '/index.php'),
(1369154336, '90.188.98.24', '/chat.php'),
(1369154344, '90.188.98.24', '/account.php'),
(1369154673, '90.188.98.24', '/index.php'),
(1369154679, '90.188.98.24', '/sendmail.php'),
(1369154685, '90.188.98.24', '/mess.php'),
(1369154738, '90.188.98.24', '/account.php'),
(1369154809, '90.188.98.24', '/adv.php'),
(1369154824, '90.188.98.24', '/sendmail.php'),
(1369154827, '90.188.98.24', '/chat.php'),
(1369154836, '90.188.98.24', '/user_pay.php'),
(1369154839, '90.188.98.24', '/rules.php'),
(1369154845, '90.188.98.24', '/index.php'),
(1369154856, '90.188.98.24', '/adv.php'),
(1369154865, '90.188.98.24', '/pay_qiwi.php'),
(1369154867, '90.188.98.24', '/pay_pm.php'),
(1369154869, '90.188.98.24', '/pay_qiwi.php'),
(1369154872, '90.188.98.24', '/pay_pm.php'),
(1369154874, '90.188.98.24', '/pay_qiwi.php'),
(1369154880, '90.188.98.24', '/pay_pm.php'),
(1369154894, '90.188.98.24', '/pay_pm.php'),
(1369155004, '79.136.191.146', '/index.php'),
(1369155036, '88.208.16.209', '/index.php'),
(1369155060, '79.136.191.146', '/index.php'),
(1369155079, '79.136.191.146', '/index.php'),
(1369155088, '79.136.191.146', '/inv.php'),
(1369155093, '79.136.191.146', '/chat.php'),
(1369155095, '79.136.191.146', '/sendmail.php'),
(1369155096, '79.136.191.146', '/user_pay.php'),
(1369155104, '79.136.191.146', '/faq.php'),
(1369155105, '79.136.191.146', '/news.php'),
(1369155106, '79.136.191.146', '/top.php'),
(1369155108, '95.163.105.100', '/index.php'),
(1369155111, '79.136.191.146', '/top.php'),
(1369155179, '90.188.98.24', '/pay_pm.php'),
(1369155275, '90.188.98.24', '/pay_pm.php'),
(1369155281, '79.136.191.146', '/index.php'),
(1369155285, '79.136.191.146', '/registration.php'),
(1369155292, '90.188.98.24', '/pay_pm.php'),
(1369155294, '79.136.191.146', '/index.php'),
(1369155304, '90.188.98.24', '/pay_pm.php'),
(1369155306, '90.188.98.24', '/pay_pm.php'),
(1369155368, '79.136.191.146', '/index.php'),
(1369155371, '79.136.191.146', '/index.php'),
(1369155538, '90.188.98.24', '/pay_pm.php'),
(1369155541, '90.188.98.24', '/pay_pm.php'),
(1369155544, '90.188.98.24', '/pay_pm.php'),
(1369155621, '79.136.191.146', '/index.php');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
