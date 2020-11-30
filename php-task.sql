-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 30 2020 г., 23:15
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `php-task`
--

-- --------------------------------------------------------

--
-- Структура таблицы `record`
--

CREATE TABLE `record` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `idUser` int(11) NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `record`
--

INSERT INTO `record` (`id`, `title`, `text`, `active`, `idUser`, `link`, `data`) VALUES
(18, 'test link', 'link', 0, 7, 'e479dd1dca11b99fde6b4da599a225605fc3c84945c203.40240343', '2020-11-29'),
(19, 'dfdsfdsfdsffsdfsd', 'sdfdssdsdfdssdddff\n ddffdf f f f f\nf f f f ', 1, 7, 'c6157ba7bd2fdc0cd5a18952af969f025fc3d67066bed4.83564024', '2020-11-29'),
(20, 'sdf', 'sdf', 1, 7, 'e7ced3ca7cfbdca507db404cb4c60bee5fc3d8fcdf0271.47875015', '2020-11-29'),
(21, 'sdf', 'eeqwewqew', 1, 7, '035ca7bf33078f09d9717fe01a0d2bdc5fc3d90255a1b7.06055810', '2020-11-29');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `password`) VALUES
(1, 'Admin', '123'),
(2, 'test', '123'),
(3, 'name', '123'),
(4, 'testAdd', '1'),
(5, 'valerasobco@gmail.com', '1'),
(6, 'testreg', 'Admin335'),
(7, 'Valera', 'Valera335');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idUser_2` (`idUser`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `record`
--
ALTER TABLE `record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
