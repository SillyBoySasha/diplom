SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `Requests` (
  `id` int(11) NOT NULL,
  `FIO` text COLLATE cp1251_general_cs NOT NULL,
  `Email` text COLLATE cp1251_general_cs NOT NULL,
  `Phone` text COLLATE cp1251_general_cs NOT NULL,
  `Comment` text COLLATE cp1251_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251 COLLATE=cp1251_general_cs;


INSERT INTO `Requests` (`id`, `FIO`, `Email`, `Phone`, `Comment`) VALUES
(1, 'Чагин Максим Викторович', 'maksim3746664@gmail.com', '+77777777777', 'test'),
(2, 'TEST', 'TEST@mail.ru', '+77777777777', 'test message');


ALTER TABLE `Requests`
  ADD PRIMARY KEY (`id`);
COMMIT;
