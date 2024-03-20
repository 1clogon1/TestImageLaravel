-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 20 2024 г., 21:58
-- Версия сервера: 10.4.28-MariaDB
-- Версия PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `laravelimagetest`
--

-- --------------------------------------------------------

--
-- Структура таблицы `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `image`
--

INSERT INTO `image` (`id`, `image`, `created_at`, `updated_at`, `name`) VALUES
(138, 'rdV2QQOjBwqxqSHlAzTpnYAVrJOjvT21tPrVBeDO.jpg', '2024-03-20 17:47:49', '2024-03-20 17:47:49', '123'),
(139, 'EYDZSkGcWVHuKQouhBnry2dXmvuAv2aCXfpmGjg5.jpg', '2024-03-20 17:47:49', '2024-03-20 17:47:49', '234'),
(140, 'dptn6s7Qoiktu3YxPtLNNQ7ACfJUPG7iuFEuy6pj.jpg', '2024-03-20 17:47:49', '2024-03-20 17:47:49', '2345'),
(141, 'qEZYtOMcMpC8zUpFficyjYgnvRtYpAErQiZApN0o.jpg', '2024-03-20 17:47:49', '2024-03-20 17:47:49', '345345'),
(142, '4XxvWz2riSl5Op57xo04ZHuonh4UfQ6rLKTCye7O.jpg', '2024-03-20 17:47:49', '2024-03-20 17:47:49', '765567');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
