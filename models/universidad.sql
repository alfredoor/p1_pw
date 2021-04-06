-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 06-04-2021 a las 00:29:29
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `universidad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

DROP TABLE IF EXISTS `alumno`;
CREATE TABLE IF NOT EXISTS `alumno` (
  `DNI` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CURSO` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `GRADO` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MATRICULADO` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  UNIQUE KEY `DNI` (`DNI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`DNI`, `CURSO`, `GRADO`, `MATRICULADO`) VALUES
('11223344I', '2', 'GITI', 'POO,POO,POO,POO,POO,POO,POO,,,,'),
('11234554R', '2', 'GII', 'POO,POO,POO,POO,POO,POO,POO,,,,'),
('44565443R', '2', 'INEF', 'qwerqwer,qwerqwer,qwerqwer,qwerqwer,qwerqwer,qwerqwer,qwerqwer,,,,');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

DROP TABLE IF EXISTS `asignatura`;
CREATE TABLE IF NOT EXISTS `asignatura` (
  `IDASIG` int(20) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `CURSOASIG` int(20) NOT NULL,
  `GRADO` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`IDASIG`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `asignatura`
--

INSERT INTO `asignatura` (`IDASIG`, `NOMBRE`, `CURSOASIG`, `GRADO`) VALUES
(1, 'PW', 2, '1'),
(2, 'AS', 3, 'INFOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examenes`
--

DROP TABLE IF EXISTS `examenes`;
CREATE TABLE IF NOT EXISTS `examenes` (
  `CODEX` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FECHA` date NOT NULL,
  `DNI` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IDPREG` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `RESP` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ASIG` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TEMA` int(10) NOT NULL,
  KEY `PREG` (`IDPREG`),
  KEY `DNI` (`DNI`),
  KEY `CODEX` (`CODEX`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `examenes`
--

INSERT INTO `examenes` (`CODEX`, `FECHA`, `DNI`, `IDPREG`, `RESP`, `ASIG`, `TEMA`) VALUES
('1', '2021-04-04', '11223344I', '1', 'Bien', '1', 0),
('1', '2021-04-04', '11223344I', '7', 'Bien', '1', 0),
('2', '2021-04-04', '11234554R', '1', 'Bien', '1', 0),
('2', '2021-04-04', '11234554R', '7', 'Bien', '1', 0),
('2', '2021-04-04', '11234554R', '8', 'Mal', '1', 0),
('3', '2021-04-04', '44565443R', '3', 'Bien', '1', 0),
('3', '2021-04-04', '44565443R', '3', 'Bien', '1', 0),
('3', '2021-04-04', '44565443R', '3', 'Bien', '1', 0),
('3', '2021-04-04', '44565443R', '3', 'Bien', '1', 0),
('1', '2021-04-04', '11234554R', '3', 'Bien', '5', 0),
('1', '2021-04-04', '11234554R', '2', 'Mal', '5', 0),
('1', '2021-04-04', '11234554R', '2', 'Mal', '5', 0),
('3', '2021-04-04', '44565443R', '', 'Mal', '1', 0),
('3', '2021-04-04', '44565443R', '', 'Mal', '1', 0),
('3', '2021-04-04', '44565443R', '', 'Mal', '1', 0),
('3', '2021-04-04', '44565443R', '7', 'Mal', '1', 0),
('3', '2021-04-04', '44565443R', '7', 'Mal', '1', 0),
('3', '2021-04-04', '44565443R', '7', 'Mal', '1', 0),
('3', '2021-04-04', '44565443R', '7', 'Mal', '1', 0),
('3', '2021-04-04', '44565443R', '7', 'Mal', '1', 0),
('3', '2021-04-04', '44565443R', '7', 'Mal', '1', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

DROP TABLE IF EXISTS `persona`;
CREATE TABLE IF NOT EXISTS `persona` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `APELLIDOS` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TIPO` enum('ALUMNO','PROFESOR','ADMIN') COLLATE utf8mb4_unicode_ci NOT NULL,
  `DNI` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PASS` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `USER` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FOTO` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `DNI` (`DNI`,`USER`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`ID`, `NOMBRE`, `APELLIDOS`, `TIPO`, `DNI`, `PASS`, `USER`, `FOTO`) VALUES
(2, 'Juan jose', 'profe   ', 'PROFESOR', '44353321I', 'prof   ', 'profesor   ', 'default.jpg'),
(3, 'admin   ', 'admin   ', 'ADMIN', '45611234T', 'admin ', 'administrador   ', ''),
(7, 'gonzalo ', 'Ulibarri Garcia ', 'ALUMNO', '44345445T', 'asdf ', 'GonzaloUli ', ''),
(15, 'jj', 'rodriguez colorado', 'ALUMNO', '11223344I', 'qwer', 'xac', ''),
(18, 'Pablo', 'Dodero', 'ALUMNO', '44565443R', 'rayo', 'zanda', 'default.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

DROP TABLE IF EXISTS `preguntas`;
CREATE TABLE IF NOT EXISTS `preguntas` (
  `IDPREG` int(20) NOT NULL AUTO_INCREMENT,
  `ENUNCIADO` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `RESP1` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `RESP2` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `RESP3` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `RESP4` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `RESP` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IDASIG` int(20) NOT NULL,
  `TEMA` int(10) NOT NULL,
  PRIMARY KEY (`IDPREG`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`IDPREG`, `ENUNCIADO`, `RESP1`, `RESP2`, `RESP3`, `RESP4`, `RESP`, `IDASIG`, `TEMA`) VALUES
(1, 'ï¿½En que aï¿½o se fundo...?  ', '2000  ', '2001  ', '2011  ', '2020  ', 'resp1  ', 1, 0),
(7, 'Esta pagina esta hecha en PHP y HTML    ', 'Verdadero     ', 'Falso ', '     ', '     ', 'resp1     ', 1, 0),
(8, 'Buenas  ', 'Hola  ', 'Si  ', 'No  ', 'Depende  ', 'resp4  ', 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

DROP TABLE IF EXISTS `profesor`;
CREATE TABLE IF NOT EXISTS `profesor` (
  `ASIGASOC` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DNI` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IDASIG` int(10) NOT NULL,
  UNIQUE KEY `DNI` (`DNI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`ASIGASOC`, `DNI`, `IDASIG`) VALUES
('PW', '44353321I', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas`
--

DROP TABLE IF EXISTS `temas`;
CREATE TABLE IF NOT EXISTS `temas` (
  `ID` int(11) NOT NULL,
  `CURSO` int(10) NOT NULL,
  `NOMBRE` varchar(1500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NUM_TEMA` int(10) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `temas`
--

INSERT INTO `temas` (`ID`, `CURSO`, `NOMBRE`, `NUM_TEMA`) VALUES
(1, 3, 'Practica 1', 0),
(2, 3, 'Practica 1', 5),
(3, 3, 'PW', 0),
(4, 3, 'PW', 0);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `examenes`
--
ALTER TABLE `examenes`
  ADD CONSTRAINT `examenes_ibfk_1` FOREIGN KEY (`DNI`) REFERENCES `alumno` (`DNI`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
