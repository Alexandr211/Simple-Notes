-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 18 2018 г., 15:40
-- Версия сервера: 5.7.16
-- Версия PHP: 7.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `Yii2tab1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `access1`
--

CREATE TABLE `access1` (
  `id` int(20) NOT NULL,
  `note_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `calendr`
--

CREATE TABLE `calendr` (
  `id` int(20) NOT NULL,
  `text` text NOT NULL,
  `creator` int(20) NOT NULL,
  `date_event` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `calendr`
--

INSERT INTO `calendr` (`id`, `text`, `creator`, `date_event`) VALUES
(1, 'test, Alex for test1!', 14, '2018-11-09 12:29:17'),
(19, 'test111', 14, '2018-11-13 19:27:16'),
(21, 'Test, Dan.', 19, '2018-11-15 14:40:44'),
(24, '<p><span style=\"font-size: 14pt; color: #00ff00;\"><strong>test, Ben</strong></span></p>', 21, '2018-11-15 15:03:02'),
(26, '<p>Hello, world!</p>', 14, '2018-11-16 09:24:51'),
(27, '<p><span style=\"font-size: 14pt;\"><strong>Hi</strong>, <span style=\"color: #ff0000;\">World</span></span>!</p>', 14, '2018-11-16 09:25:38');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1542361368),
('m181116_080557_SigninHistory', 1542362266);

-- --------------------------------------------------------

--
-- Структура таблицы `signin_history`
--

CREATE TABLE `signin_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `date_time` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `signin_history`
--

INSERT INTO `signin_history` (`id`, `user_id`, `name`, `date_time`) VALUES
(8, 21, '', '2018-11-17 14:13:39'),
(9, 14, '', '2018-11-17 15:58:13'),
(10, 14, '', '2018-11-17 15:58:48'),
(11, 21, '', '2018-11-18 08:30:13'),
(12, 14, '', '2018-11-18 08:46:10'),
(13, 14, '', '2018-11-18 09:11:14'),
(14, 14, '', '2018-11-18 09:12:07'),
(15, 21, '', '2018-11-18 09:29:44'),
(16, 21, '', '2018-11-18 09:40:43'),
(17, 14, '', '2018-11-18 10:13:10'),
(18, 21, '', '2018-11-18 10:16:33'),
(19, 21, '', '2018-11-18 10:41:15'),
(20, 14, '', '2018-11-18 10:53:51'),
(21, 21, NULL, '2018-11-18 11:30:38'),
(22, 14, NULL, '2018-11-18 11:53:50'),
(23, 14, NULL, '2018-11-18 13:19:37'),
(24, 14, NULL, '2018-11-18 13:20:33'),
(25, 21, NULL, '2018-11-18 13:21:33'),
(26, 14, NULL, '2018-11-18 13:23:10'),
(27, 14, NULL, '2018-11-18 18:59:56'),
(28, 21, NULL, '2018-11-18 19:00:28');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `hashpass` varchar(100) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `hashpass`, `create_date`) VALUES
(14, 'Alex', 'alex@test.ru', '123456', '$2y$13$c8brPHi0jA5vCTBGemNpWOJGkgGpA.wx/luoUC7hKvQpKYsb8fzPu', '2018-11-07 13:23:46'),
(19, 'Dan', 'dan@test.ru', '123456', '$2y$13$84YnAj7KG.r2Xso8ll6Yp.IuwUkAVWxKKcUZV6HyEoMp/salgRgfe', '2018-11-15 14:40:10'),
(21, 'Ben', 'ben@test.com', '123456', '$2y$13$6K2wrzhCpmUf.viw8vQASON6IQHfsDzEkj6VrzP84hKcZppQN0K8W', '2018-11-15 15:01:39');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `access1`
--
ALTER TABLE `access1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_clndr_access_1_idx` (`note_id`),
  ADD KEY `fk_clndr_access_2_idx` (`user_id`);

--
-- Индексы таблицы `calendr`
--
ALTER TABLE `calendr`
  ADD PRIMARY KEY (`id`),
  ADD KEY `calendr_ibfk_1` (`creator`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `signin_history`
--
ALTER TABLE `signin_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `signin_history_ibfk_1` (`user_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `access1`
--
ALTER TABLE `access1`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `calendr`
--
ALTER TABLE `calendr`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT для таблицы `signin_history`
--
ALTER TABLE `signin_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `access1`
--
ALTER TABLE `access1`
  ADD CONSTRAINT `access1_ibfk_1` FOREIGN KEY (`note_id`) REFERENCES `calendr` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `access1_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `calendr`
--
ALTER TABLE `calendr`
  ADD CONSTRAINT `calendr_ibfk_1` FOREIGN KEY (`creator`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `signin_history`
--
ALTER TABLE `signin_history`
  ADD CONSTRAINT `signin_history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
