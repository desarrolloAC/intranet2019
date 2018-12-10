-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-11-2018 a las 16:12:08
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reserva`
--

DELIMITER $$
--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `nextval` (`seq_name` VARCHAR(100)) RETURNS BIGINT(20) BEGIN
DECLARE cur_val bigint;

SELECT
cur_value INTO cur_val
FROM
sequence
WHERE
name = seq_name;

IF cur_val IS NOT NULL THEN
UPDATE
sequence
SET
cur_value = IF (
(cur_value + increment) > max_value OR (cur_value + increment) < min_value, IF ( cycle = TRUE, IF ( (cur_value + increment) > max_value,
min_value,
max_value
),
NULL
),
cur_value + increment
)
WHERE
name = seq_name;
END IF;
RETURN cur_val;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `availability`
--

CREATE TABLE `availability` (
  `availability_id` int(10) NOT NULL,
  `isactive` varchar(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Y',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `space` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `days` int(10) NOT NULL,
  `moth` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `yeart` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `availability`
--

INSERT INTO `availability` (`availability_id`, `isactive`, `created`, `updated`, `space`, `days`, `moth`, `yeart`) VALUES
(4, 'Y', '2018-11-22 08:26:11', '2018-11-22 08:26:11', 'Sala Alkes', 2, 'Enero', '2018');

--
-- Disparadores `availability`
--
DELIMITER $$
CREATE TRIGGER `create_reservations` AFTER INSERT ON `availability` FOR EACH ROW BEGIN
    INSERT INTO reservation(reservation_id,isactive,created,updated,cince,until,user,isreserved,availability_id) VALUES
    (DEFAULT,DEFAULT,DEFAULT,DEFAULT,'8:00 am','9:00 am','-',DEFAULT,NEW.availability_id),
    (DEFAULT,DEFAULT,DEFAULT,DEFAULT,'9:00 am','10:00 am','-',DEFAULT,NEW.availability_id),
    (DEFAULT,DEFAULT,DEFAULT,DEFAULT,'10:00 am','11:00 am','-',DEFAULT,NEW.availability_id),
    (DEFAULT,DEFAULT,DEFAULT,DEFAULT,'11:00 am','12:00 am','-',DEFAULT,NEW.availability_id),
    (DEFAULT,DEFAULT,DEFAULT,DEFAULT,'12:00 am','1:00 am','-',DEFAULT,NEW.availability_id),
    (DEFAULT,DEFAULT,DEFAULT,DEFAULT,'1:00 am','2:00 am','-',DEFAULT,NEW.availability_id),
    (DEFAULT,DEFAULT,DEFAULT,DEFAULT,'2:00 am','3:00 am','-',DEFAULT,NEW.availability_id),
    (DEFAULT,DEFAULT,DEFAULT,DEFAULT,'3:00 am','4:00 am','-',DEFAULT,NEW.availability_id),
    (DEFAULT,DEFAULT,DEFAULT,DEFAULT,'4:00 am','5:00 am','-',DEFAULT,NEW.availability_id);
  END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(10) NOT NULL,
  `isactive` varchar(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Y',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cince` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `until` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `user` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `isreserved` varchar(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'N',
  `availability_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `isactive`, `created`, `updated`, `cince`, `until`, `user`, `isreserved`, `availability_id`) VALUES
(10, 'Y', '2018-11-22 08:26:11', '2018-11-22 08:26:11', '8:00 am', '9:00 am', '-', 'N', 4),
(11, 'Y', '2018-11-22 08:26:11', '2018-11-22 08:26:11', '9:00 am', '10:00 am', '-', 'N', 4),
(12, 'Y', '2018-11-22 08:26:11', '2018-11-22 08:26:11', '10:00 am', '11:00 am', '-', 'N', 4),
(13, 'Y', '2018-11-22 08:26:11', '2018-11-22 08:26:11', '11:00 am', '12:00 am', '-', 'N', 4),
(14, 'Y', '2018-11-22 08:26:11', '2018-11-22 08:26:11', '12:00 am', '1:00 am', '-', 'N', 4),
(15, 'Y', '2018-11-22 08:26:11', '2018-11-22 08:26:11', '1:00 am', '2:00 am', '-', 'N', 4),
(16, 'Y', '2018-11-22 08:26:11', '2018-11-22 08:26:11', '2:00 am', '3:00 am', '-', 'N', 4),
(17, 'Y', '2018-11-22 08:26:11', '2018-11-22 08:26:11', '3:00 am', '4:00 am', '-', 'N', 4),
(18, 'Y', '2018-11-22 08:26:11', '2018-11-22 08:26:11', '4:00 am', '5:00 am', '-', 'N', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sequence`
--

CREATE TABLE `sequence` (
  `name` varchar(100) NOT NULL,
  `increment` int(11) NOT NULL DEFAULT '1',
  `min_value` int(11) NOT NULL DEFAULT '1',
  `max_value` bigint(20) NOT NULL DEFAULT '9223372036854775807',
  `cur_value` bigint(20) DEFAULT '1',
  `cycle` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sequence`
--

INSERT INTO `sequence` (`name`, `increment`, `min_value`, `max_value`, `cur_value`, `cycle`) VALUES
('availability_seq', 1, 1, 9223372036854775807, 5, 0),
('reservation_seq', 1, 1, 9223372036854775807, 4, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `availability`
--
ALTER TABLE `availability`
  ADD PRIMARY KEY (`availability_id`) USING BTREE;

--
-- Indices de la tabla `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`) USING BTREE,
  ADD KEY `reservation_availability_fkey` (`availability_id`);

--
-- Indices de la tabla `sequence`
--
ALTER TABLE `sequence`
  ADD PRIMARY KEY (`name`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `availability`
--
ALTER TABLE `availability`
  MODIFY `availability_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_availability_fkey` FOREIGN KEY (`availability_id`) REFERENCES `availability` (`availability_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
