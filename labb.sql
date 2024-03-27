-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 27 2024 г., 17:41
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `labb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `meetings`
--

CREATE TABLE `meetings` (
                            `id` int(11) NOT NULL,
                            `title` varchar(100) NOT NULL,
                            `description` text DEFAULT '\'-\'',
                            `place_where` varchar(100) NOT NULL,
                            `date_when` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
                            `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `meetings`
--

INSERT INTO `meetings` (`id`, `title`, `description`, `place_where`, `date_when`, `created_at`) VALUES
                                                                                                    (1, 'sxdf', ' xc', 'zxzcz', '0000-00-00 00:00:00', '2024-03-27 06:42:29'),
                                                                                                    (2, 'ZX', ' ZX', 'ZX', '0000-00-00 00:00:00', '2024-03-27 06:43:18'),
                                                                                                    (3, 'asd', ' sad', 'sad', '2024-04-05 17:00:00', '2024-03-27 06:43:44'),
                                                                                                    (4, 'asd', ' sad', 'asd', '2024-04-06 17:00:00', '2024-03-27 06:46:06'),
                                                                                                    (5, 'asd', ' sad', 'asd', '2024-04-06 17:00:00', '2024-03-27 07:04:30'),
                                                                                                    (6, 'asdsad', ' asdsad', 'asdsad', '2024-04-07 13:30:00', '2024-03-27 07:24:36'),
                                                                                                    (7, 'asdsad', ' asdsad', 'asdsad', '2024-04-04 13:30:00', '2024-03-27 07:24:42'),
                                                                                                    (8, 'asdsad', ' asdsad', 'asdsad', '2024-04-04 13:30:00', '2024-03-27 07:25:17'),
                                                                                                    (9, 'sdfdsf', ' ', 'fffffff', '2024-04-05 11:29:00', '2024-03-27 07:25:29'),
                                                                                                    (10, 'sdfdsf', ' ', 'fffffff', '2024-04-05 11:29:00', '2024-03-27 07:26:18'),
                                                                                                    (11, 'sdfdsf', ' ', 'fffffff', '2024-04-05 11:29:00', '2024-03-27 07:28:50'),
                                                                                                    (12, 'sdfdsf', ' ', 'fffffff', '2024-04-05 11:29:00', '2024-03-27 07:33:12'),
                                                                                                    (13, 'sdfdsf', NULL, 'fffffff', '2024-03-27 07:39:45', '2024-03-27 07:35:04'),
                                                                                                    (14, 'sdfdsf', ' -', 'fffffff', '2024-03-27 07:45:37', '2024-03-27 07:39:56'),
                                                                                                    (15, 'sdfdsf', ' ', 'fffffff', '2024-04-05 11:29:00', '2024-03-27 07:45:42'),
                                                                                                    (16, 'фффф', ' фффф', 'фыфы', '2024-03-31 08:21:00', '2024-03-27 08:22:00'),
                                                                                                    (17, 'fzcxz', ' cxzcxzc', 'xzcxzc', '2024-04-05 08:22:00', '2024-03-27 08:22:36'),
                                                                                                    (18, 'dfg', ' sdfg', 'fdg', '2024-04-07 08:23:00', '2024-03-27 08:23:48'),
                                                                                                    (19, 'dfg', ' sdfg', 'fdg', '2024-04-07 08:23:00', '2024-03-27 08:37:56'),
                                                                                                    (20, 'ZXZ', ' ZXZX', 'ZXz', '2024-03-30 08:50:00', '2024-03-27 08:50:25'),
                                                                                                    (21, 'asdasd', ' sadsad', 'asdsa', '2024-04-07 08:52:00', '2024-03-27 08:52:30'),
                                                                                                    (22, 'фыв', ' ыфв', 'фыв', '2024-03-31 08:58:00', '2024-03-27 08:58:49'),
                                                                                                    (23, 'фыв', ' ыфв', 'фыв', '2024-03-31 08:58:00', '2024-03-27 09:03:54'),
                                                                                                    (24, 'фыв', ' ыфв', 'фыв', '2024-03-31 08:58:00', '2024-03-27 09:08:58'),
                                                                                                    (25, 'фыв', ' ыфв', 'фыв', '2024-03-31 08:58:00', '2024-03-27 15:26:57');

-- --------------------------------------------------------

--
-- Структура таблицы `meetings_in_timetable`
--

CREATE TABLE `meetings_in_timetable` (
                                         `meeting_id` int(11) NOT NULL,
                                         `timetable_id` int(11) NOT NULL,
                                         `day_of_week` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
                                         `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `notes`
--

CREATE TABLE `notes` (
                         `id` int(11) NOT NULL,
                         `title` varchar(100) NOT NULL,
                         `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `notes`
--

INSERT INTO `notes` (`id`, `title`, `description`) VALUES
                                                       (1, 'jfjajfjafj', 'kafkakfkafkafkkaf'),
                                                       (2, 'fff', 'aaaa'),
                                                       (3, 'fff', 'aaaa'),
                                                       (4, 'fff', 'aaaa'),
                                                       (5, 'fff', 'aaaa'),
                                                       (6, 'fff', 'aaaa'),
                                                       (7, 'fff', 'aaaa'),
                                                       (8, 'fff', 'aaaa'),
                                                       (9, 'fff', 'aaaa'),
                                                       (10, 'fff', 'aaaa'),
                                                       (11, 'fff', 'aaaa'),
                                                       (12, 'fff', 'aaaa'),
                                                       (13, 'fff', 'aaaa'),
                                                       (14, 'sasha', 'loh');

-- --------------------------------------------------------

--
-- Структура таблицы `timetable`
--

CREATE TABLE `timetable` (
                             `id` int(11) NOT NULL,
                             `description` text NOT NULL,
                             `name_day_of_week` varchar(10) NOT NULL,
                             `day_of_week` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `timetable`
--

INSERT INTO `timetable` (`id`, `description`, `name_day_of_week`, `day_of_week`) VALUES
                                                                                     (1, '', '', '2024-03-27'),
                                                                                     (2, '', '', '2024-03-27'),
                                                                                     (3, '', '', '2024-03-27'),
                                                                                     (4, '', '', '2024-03-27'),
                                                                                     (5, '', '', '2024-03-27'),
                                                                                     (6, '', '', '2024-03-27'),
                                                                                     (7, '', '', '2024-03-27'),
                                                                                     (8, '', ' Понедельн', '2024-03-27'),
                                                                                     (9, '', 'Вторник', '2024-03-27'),
                                                                                     (10, '', 'Среда', '2024-03-27'),
                                                                                     (11, '', 'Четверг', '2024-03-27'),
                                                                                     (12, '', 'Пятница', '2024-03-27'),
                                                                                     (13, '', 'Суббота', '2024-03-27'),
                                                                                     (14, '', 'Воскресень', '2024-03-27');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
                         `id` int(11) NOT NULL,
                         `login` varchar(50) NOT NULL,
                         `first_name` varchar(50) NOT NULL,
                         `last_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `first_name`, `last_name`) VALUES
                                                                   (1, 'vvv', 'Иван', ' Иванов'),
                                                                   (2, 'pipi', '', ''),
                                                                   (3, 'lala', 'вавава', 'ррлрлрл');

-- --------------------------------------------------------

--
-- Структура таблицы `users_meetings`
--

CREATE TABLE `users_meetings` (
                                  `user_id` int(11) NOT NULL,
                                  `meeting_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users_meetings`
--

INSERT INTO `users_meetings` (`user_id`, `meeting_id`) VALUES
                                                           (2, 6),
                                                           (2, 7),
                                                           (2, 8),
                                                           (2, 9),
                                                           (2, 10),
                                                           (2, 11),
                                                           (2, 12),
                                                           (2, 13),
                                                           (2, 14),
                                                           (2, 15),
                                                           (1, 19),
                                                           (1, 20),
                                                           (1, 21),
                                                           (1, 22),
                                                           (1, 23),
                                                           (1, 24),
                                                           (1, 25);

-- --------------------------------------------------------

--
-- Структура таблицы `users_notes`
--

CREATE TABLE `users_notes` (
                               `user_id` int(11) NOT NULL,
                               `note_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users_notes`
--

INSERT INTO `users_notes` (`user_id`, `note_id`) VALUES
    (1, 14);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `meetings`
--
ALTER TABLE `meetings`
    ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `meetings_in_timetable`
--
ALTER TABLE `meetings_in_timetable`
    ADD PRIMARY KEY (`meeting_id`,`timetable_id`),
  ADD KEY `timetable_id` (`timetable_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `notes`
--
ALTER TABLE `notes`
    ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `timetable`
--
ALTER TABLE `timetable`
    ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users_meetings`
--
ALTER TABLE `users_meetings`
    ADD KEY `meeting_id` (`meeting_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users_notes`
--
ALTER TABLE `users_notes`
    ADD KEY `note_id` (`note_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `meetings`
--
ALTER TABLE `meetings`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `notes`
--
ALTER TABLE `notes`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `timetable`
--
ALTER TABLE `timetable`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `meetings_in_timetable`
--
ALTER TABLE `meetings_in_timetable`
    ADD CONSTRAINT `meetings_in_timetable_ibfk_1` FOREIGN KEY (`meeting_id`) REFERENCES `meetings` (`id`),
  ADD CONSTRAINT `meetings_in_timetable_ibfk_2` FOREIGN KEY (`timetable_id`) REFERENCES `timetable` (`id`),
  ADD CONSTRAINT `meetings_in_timetable_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `users_meetings`
--
ALTER TABLE `users_meetings`
    ADD CONSTRAINT `users_meetings_ibfk_1` FOREIGN KEY (`meeting_id`) REFERENCES `meetings` (`id`),
  ADD CONSTRAINT `users_meetings_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `users_notes`
--
ALTER TABLE `users_notes`
    ADD CONSTRAINT `users_notes_ibfk_1` FOREIGN KEY (`note_id`) REFERENCES `notes` (`id`),
  ADD CONSTRAINT `users_notes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
