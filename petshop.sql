-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июн 13 2017 г., 18:24
-- Версия сервера: 5.7.17
-- Версия PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `petshop` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `petshop`;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `petshop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `News`
--

CREATE TABLE `News` (
  `ID` int(11) NOT NULL,
  `ParticipantId` int(11) NOT NULL,
  `NewsTitle` varchar(255) NOT NULL,
  `NewsMessage` text NOT NULL,
  `LikesCounter` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `News`
--

INSERT INTO `News` (`ID`, `ParticipantId`, `NewsTitle`, `NewsMessage`, `LikesCounter`) VALUES
(1, 2, 'New agenda!', 'Please visit our site!', 0),
(4, 1, '123', '222', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `Participant`
--

CREATE TABLE `Participant` (
  `ID` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Participant`
--

INSERT INTO `Participant` (`ID`, `Email`, `Name`) VALUES
(1, 'airmail@code-pilots.com', 'The first user'),
(2, 'airmaild@code-pilots.com', 'The second user');

-- --------------------------------------------------------

--
-- Структура таблицы `Session`
--

CREATE TABLE `Session` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `TimeOfEvent` datetime NOT NULL,
  `Description` text NOT NULL,
  `places` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Session`
--

INSERT INTO `Session` (`ID`, `Name`, `TimeOfEvent`, `Description`, `places`) VALUES
(1, 'Event 1', '2017-06-01 05:15:25', 'Description of Event 1', 5),
(2, 'Event 2', '2017-06-01 05:15:25', 'Description of Event 2', 10);

-- --------------------------------------------------------

--
-- Структура таблицы `SessionParticipants`
--

CREATE TABLE `SessionParticipants` (
  `ID` int(11) NOT NULL,
  `SessionId` int(11) NOT NULL,
  `ParticipantId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `SessionParticipants`
--

INSERT INTO `SessionParticipants` (`ID`, `SessionId`, `ParticipantId`) VALUES
(1, 1, 2),
(2, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `SessionSpeakers`
--

CREATE TABLE `SessionSpeakers` (
  `ID` int(11) NOT NULL,
  `SessionId` int(11) NOT NULL,
  `SpeakerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `SessionSpeakers`
--

INSERT INTO `SessionSpeakers` (`ID`, `SessionId`, `SpeakerId`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `Speaker`
--

CREATE TABLE `Speaker` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Speaker`
--

INSERT INTO `Speaker` (`ID`, `Name`) VALUES
(1, 'Watson'),
(2, 'Arnold');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `News`
--
ALTER TABLE `News`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `Participant`
--
ALTER TABLE `Participant`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `Session`
--
ALTER TABLE `Session`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `SessionParticipants`
--
ALTER TABLE `SessionParticipants`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `SessionSpeakers`
--
ALTER TABLE `SessionSpeakers`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `Speaker`
--
ALTER TABLE `Speaker`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `News`
--
ALTER TABLE `News`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `Participant`
--
ALTER TABLE `Participant`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `Session`
--
ALTER TABLE `Session`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `SessionParticipants`
--
ALTER TABLE `SessionParticipants`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `SessionSpeakers`
--
ALTER TABLE `SessionSpeakers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `Speaker`
--
ALTER TABLE `Speaker`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
