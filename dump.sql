-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 01 2023 г., 16:12
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `kurs`
--

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `date_start_column`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `date_start_column` (
`id` int
,`name_zayavki` varchar(45)
,`type` varchar(45)
,`info` varchar(45)
,`status` enum('done','not_done')
,`date_start` date
,`date_end` date
,`lico_id` int
,`fam` varchar(45)
,`im` varchar(45)
,`otch` varchar(45)
,`year_start` int
,`month_start` int
,`day_start` int
,`year_end` int
,`month_end` int
,`day_end` int
);

-- --------------------------------------------------------

--
-- Структура таблицы `job_title`
--

CREATE TABLE `job_title` (
  `id` int NOT NULL,
  `title` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='Должность';

--
-- Дамп данных таблицы `job_title`
--

INSERT INTO `job_title` (`id`, `title`) VALUES
(1, 'Back-end разработчик'),
(2, 'Front-end разработчик'),
(3, 'Full-stack разработчик'),
(4, 'HR - специалист'),
(5, 'SMM - специалист'),
(6, 'Администратор');

-- --------------------------------------------------------

--
-- Структура таблицы `lico`
--

CREATE TABLE `lico` (
  `id` int NOT NULL,
  `im` varchar(45) DEFAULT NULL,
  `fam` varchar(45) DEFAULT NULL,
  `otch` varchar(45) DEFAULT NULL,
  `login` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `job_title_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='Рабочее лицо';

--
-- Дамп данных таблицы `lico`
--

INSERT INTO `lico` (`id`, `im`, `fam`, `otch`, `login`, `password`, `job_title_id`) VALUES
(16, 'Иван', 'Петров', 'Иваныч', 'petyaGG', '123', 6),
(20, 'Иван', 'Иванов', 'Михайлович', 'ivan', '123', 6),
(22, 'Ульяна', 'Конькова', 'Васильевна', 'Ulya', '123', 2),
(24, 'Иван', 'Иванов', 'Иванович', 'test_Ivan', '123', 3),
(25, 'Иван', 'Галкин', 'Сергеевич', 'gal', '123', 3),
(29, 'МИХАИЛ', '%:*?:№;', 'александрович', 'ывалодыва', '24982а37ы', 3),
(30, 'Сергей', 'Титов', 'Александрович', 'Cerber', '2201', 6);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `login`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `login` (
`id` int
,`login` varchar(45)
,`password` varchar(45)
);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `man`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `man` (
`id` int
,`im` varchar(45)
,`otch` varchar(45)
,`title` varchar(45)
);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `otchet`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `otchet` (
`id` int
,`name_zayavki` varchar(45)
,`type` varchar(45)
,`info` varchar(45)
,`status` enum('done','not_done')
,`date_start` date
,`date_end` date
,`lico_id` int
,`fam` varchar(45)
,`im` varchar(45)
,`otch` varchar(45)
);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `tb_all`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `tb_all` (
`fam` varchar(45)
,`im` varchar(45)
,`id` int
,`name_zayavki` varchar(45)
,`type` varchar(45)
,`info` varchar(45)
,`status` enum('done','not_done')
,`date_start` date
,`date_end` date
,`lico_id` int
);

-- --------------------------------------------------------

--
-- Структура таблицы `zayavka`
--

CREATE TABLE `zayavka` (
  `id` int NOT NULL,
  `name_zayavki` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `info` varchar(45) DEFAULT NULL,
  `status` enum('done','not_done') DEFAULT 'not_done',
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `lico_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='Заявка';

--
-- Дамп данных таблицы `zayavka`
--

INSERT INTO `zayavka` (`id`, `name_zayavki`, `type`, `info`, `status`, `date_start`, `date_end`, `lico_id`) VALUES
(4, 'Установка винды', 'Установка', 'Мне нужна винда 10 прошка', 'not_done', '2023-04-12', NULL, 16),
(12, 'Ульяна Заболела', 'Ремонт', 'Поломка в области головы', 'done', '2023-03-01', '2023-03-02', 16),
(13, 'Сломался принтер', 'Ремонт', 'Начал съедать бумагу и плеваться краской', 'done', '2023-03-21', '2023-05-28', 22),
(14, 'Проверка', 'Ремонт', 'Проверяю данные', 'done', '2023-03-25', '2023-03-25', 16),
(15, 'Тестовые значения', 'Ремонт', 'Проверка работоспособности формы', 'not_done', '2023-03-21', NULL, 24),
(16, 'Дата', 'Ремонт', 'Проверяем даты', 'done', '2023-05-09', '2023-05-28', 16),
(17, 'Проверяем', 'Ремонт', 'ывларвыладывор', 'not_done', '2023-05-22', NULL, 16),
(18, 'Пробелмы с материнской платой', 'Установка', 'комп не включается из-за нее', 'done', '2023-05-24', '2023-05-28', 22),
(19, ':№*\"?;', 'Установка', 'АЫАВАВЫАЫВА', 'done', '2023-05-27', '2023-05-28', 16),
(20, 'Проверка Пагинации', 'Установка', 'Проверяем работу пагинации', 'not_done', '2023-05-28', NULL, 16);

-- --------------------------------------------------------

--
-- Структура для представления `date_start_column`
--
DROP TABLE IF EXISTS `date_start_column`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`127.0.0.1` SQL SECURITY DEFINER VIEW `date_start_column`  AS SELECT `otchet`.`id` AS `id`, `otchet`.`name_zayavki` AS `name_zayavki`, `otchet`.`type` AS `type`, `otchet`.`info` AS `info`, `otchet`.`status` AS `status`, `otchet`.`date_start` AS `date_start`, `otchet`.`date_end` AS `date_end`, `otchet`.`lico_id` AS `lico_id`, `otchet`.`fam` AS `fam`, `otchet`.`im` AS `im`, `otchet`.`otch` AS `otch`, year(`otchet`.`date_start`) AS `year_start`, month(`otchet`.`date_start`) AS `month_start`, dayofmonth(`otchet`.`date_start`) AS `day_start`, year(`otchet`.`date_end`) AS `year_end`, month(`otchet`.`date_end`) AS `month_end`, dayofmonth(`otchet`.`date_end`) AS `day_end` FROM `otchet``otchet`  ;

-- --------------------------------------------------------

--
-- Структура для представления `login`
--
DROP TABLE IF EXISTS `login`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`127.0.0.1` SQL SECURITY DEFINER VIEW `login`  AS SELECT `lico`.`id` AS `id`, `lico`.`login` AS `login`, `lico`.`password` AS `password` FROM `lico``lico`  ;

-- --------------------------------------------------------

--
-- Структура для представления `man`
--
DROP TABLE IF EXISTS `man`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`127.0.0.1` SQL SECURITY DEFINER VIEW `man`  AS SELECT `lico`.`id` AS `id`, `lico`.`im` AS `im`, `lico`.`otch` AS `otch`, `jt`.`title` AS `title` FROM (`lico` join `job_title` `jt` on((`lico`.`job_title_id` = `jt`.`id`)))  ;

-- --------------------------------------------------------

--
-- Структура для представления `otchet`
--
DROP TABLE IF EXISTS `otchet`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`127.0.0.1` SQL SECURITY DEFINER VIEW `otchet`  AS SELECT `zayavka`.`id` AS `id`, `zayavka`.`name_zayavki` AS `name_zayavki`, `zayavka`.`type` AS `type`, `zayavka`.`info` AS `info`, `zayavka`.`status` AS `status`, `zayavka`.`date_start` AS `date_start`, `zayavka`.`date_end` AS `date_end`, `zayavka`.`lico_id` AS `lico_id`, `l`.`fam` AS `fam`, `l`.`im` AS `im`, `l`.`otch` AS `otch` FROM (`zayavka` join `lico` `l` on((`zayavka`.`lico_id` = `l`.`id`)))  ;

-- --------------------------------------------------------

--
-- Структура для представления `tb_all`
--
DROP TABLE IF EXISTS `tb_all`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`127.0.0.1` SQL SECURITY DEFINER VIEW `tb_all`  AS SELECT `l`.`fam` AS `fam`, `l`.`im` AS `im`, `zayavka`.`id` AS `id`, `zayavka`.`name_zayavki` AS `name_zayavki`, `zayavka`.`type` AS `type`, `zayavka`.`info` AS `info`, `zayavka`.`status` AS `status`, `zayavka`.`date_start` AS `date_start`, `zayavka`.`date_end` AS `date_end`, `zayavka`.`lico_id` AS `lico_id` FROM (`zayavka` join `lico` `l` on((`zayavka`.`lico_id` = `l`.`id`))) ORDER BY `zayavka`.`date_start` AS `DESCdesc` ASC  ;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `job_title`
--
ALTER TABLE `job_title`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lico`
--
ALTER TABLE `lico`
  ADD PRIMARY KEY (`id`,`job_title_id`),
  ADD KEY `fk_lico_job_title1_idx` (`job_title_id`);

--
-- Индексы таблицы `zayavka`
--
ALTER TABLE `zayavka`
  ADD PRIMARY KEY (`id`,`lico_id`),
  ADD KEY `fk_zayavka_lico1_idx` (`lico_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `job_title`
--
ALTER TABLE `job_title`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `lico`
--
ALTER TABLE `lico`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `zayavka`
--
ALTER TABLE `zayavka`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `lico`
--
ALTER TABLE `lico`
  ADD CONSTRAINT `fk_lico_job_title1` FOREIGN KEY (`job_title_id`) REFERENCES `job_title` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `zayavka`
--
ALTER TABLE `zayavka`
  ADD CONSTRAINT `fk_zayavka_lico1` FOREIGN KEY (`lico_id`) REFERENCES `lico` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
