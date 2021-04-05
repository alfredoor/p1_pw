-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 05-04-2021 a las 18:47:18
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `universidad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE IF NOT EXISTS `alumno` (
  `DNI` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CURSO` int(1) NOT NULL,
  `GRADO` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  UNIQUE KEY `DNI` (`DNI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`DNI`, `CURSO`, `GRADO`) VALUES
('11223344I', 3, 'GII'),
('11234554R', 2, 'GII'),
('44565443R', 3, 'GII');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

CREATE TABLE IF NOT EXISTS `asignaturas` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CURSO` int(1) NOT NULL,
  `NOMBRE` varchar(3) NOT NULL,
  `GRADO` varchar(4) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `asignaturas`
--

INSERT INTO `asignaturas` (`ID`, `CURSO`, `NOMBRE`, `GRADO`) VALUES
(1, 3, 'PW', 'GII'),
(2, 3, 'ICR', 'GII');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examenes`
--

CREATE TABLE IF NOT EXISTS `examenes` (
  `CODEX` int(2) NOT NULL AUTO_INCREMENT,
  `FECHA` date NOT NULL,
  `TEMA` int(2) NOT NULL,
  `ASIGNATURA` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`CODEX`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `examenes`
--

INSERT INTO `examenes` (`CODEX`, `FECHA`, `TEMA`, `ASIGNATURA`) VALUES
(1, '2021-04-02', 1, 'PW'),
(3, '2021-04-04', 2, 'PW'),
(4, '2021-04-03', 5, 'ICR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expediente`
--

CREATE TABLE IF NOT EXISTS `expediente` (
  `DNI` varchar(9) NOT NULL,
  `ID_ASIG` int(11) NOT NULL,
  `NOMBRE` varchar(3) NOT NULL,
  `GRADO` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `expediente`
--

INSERT INTO `expediente` (`DNI`, `ID_ASIG`, `NOMBRE`, `GRADO`) VALUES
('44565443R', 1, 'PW', 'GII'),
('44565443R', 2, 'ICR', 'GII');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`ID`, `NOMBRE`, `APELLIDOS`, `TIPO`, `DNI`, `PASS`, `USER`, `FOTO`) VALUES
(2, 'Juan jose', 'profe   ', 'PROFESOR', '44353321I', 'prof   ', 'profesor   ', 'default.jpg'),
(3, 'admin  ', 'admin  ', 'ADMIN', '45611234T', 'admin', 'administrador  ', 'Foto0430.jpg'),
(7, 'gonzalo ', 'Ulibarri Garcia ', 'ALUMNO', '44345445T', 'asdf ', 'GonzaloUli ', ''),
(15, 'jj', 'rodriguez colorado', 'ALUMNO', '11223344I', 'qwer', 'xac', ''),
(18, 'Pablo', 'Dodero', 'ALUMNO', '44565443R', 'rayo', 'zanda', 'default.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE IF NOT EXISTS `preguntas` (
  `TEMA` int(1) NOT NULL,
  `ENUNCIADO` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `RESP1` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `RESP2` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `RESP3` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `RESP4` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CORRECTA` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ASIGNATURA` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`TEMA`, `ENUNCIADO`, `RESP1`, `RESP2`, `RESP3`, `RESP4`, `CORRECTA`, `ASIGNATURA`) VALUES
(5, 'TCP/IP se creo antes que OSI', 'Verdadero', 'Falso', '', NULL, 'resp1', 'ICR'),
(1, 'PHP es un lenguaje: ', 'Interpretado', 'Compilado', 'Ensamblador', 'Ninguna de las respuestas es correc', 'resp1', ''),
(5, 'El direccionamiento fisico pertenece a', 'Capa de Red', 'Capa de Enlace', 'Capa Fisica', 'Ninguna de las anteriores es correcta', 'resp2', 'ICR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE IF NOT EXISTS `profesor` (
  `ASIGASOC` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DNI` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  UNIQUE KEY `DNI` (`DNI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`ASIGASOC`, `DNI`) VALUES
('PW', '44353321I');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas`
--

CREATE TABLE IF NOT EXISTS `temas` (
  `ID_ASIG` int(11) NOT NULL,
  `CURSO` int(11) NOT NULL,
  `NOMBRE` varchar(30) NOT NULL,
  `NUM_TEMA` int(2) NOT NULL,
  PRIMARY KEY (`ID_ASIG`,`CURSO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `temas`
--

INSERT INTO `temas` (`ID_ASIG`, `CURSO`, `NOMBRE`, `NUM_TEMA`) VALUES
(1, 3, 'Practica 1', 1),
(2, 3, 'Practica 1', 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

