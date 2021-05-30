-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 30-05-2021 a las 07:46:18
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
-- Base de datos: `escuela`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

DROP TABLE IF EXISTS `alumno`;
CREATE TABLE IF NOT EXISTS `alumno` (
  `idalumno` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `responsable` varchar(100) DEFAULT NULL,
  `emailresponsable` varchar(100) DEFAULT NULL,
  `condicion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idalumno`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`idalumno`, `nombre`, `apellidos`, `responsable`, `emailresponsable`, `condicion`) VALUES
(1, 'Jose', 'Bautista Cruz', 'Lorena Cruz Pérez ', 'lorena@gmail.com', '1'),
(2, 'Maria', 'Hernández López ', 'Pedro Hernández ', 'pedro@gmail.com', '1'),
(3, 'Jorge', 'Altamirano', 'Tania López ', 'tania@gmail.com', '1'),
(4, 'Alan ', 'Rodríguez Ruiz', 'Carlos Rodríguez ', 'carlos@gmail.com', '1'),
(5, 'Valeria', 'Martínez Juárez ', 'Víctor Martínez ', 'victor@gmail.com', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

DROP TABLE IF EXISTS `calificacion`;
CREATE TABLE IF NOT EXISTS `calificacion` (
  `idcalificacion` int(11) NOT NULL AUTO_INCREMENT,
  `idalumno` int(11) NOT NULL,
  `califuno` float DEFAULT NULL,
  `califdos` float DEFAULT NULL,
  `califtres` float DEFAULT NULL,
  `califcuatro` float DEFAULT NULL,
  `califcinco` float DEFAULT NULL,
  `promedio` float DEFAULT NULL,
  `condicion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idcalificacion`),
  KEY `idalumno` (`idalumno`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `calificacion`
--

INSERT INTO `calificacion` (`idcalificacion`, `idalumno`, `califuno`, `califdos`, `califtres`, `califcuatro`, `califcinco`, `promedio`, `condicion`) VALUES
(1, 1, 8, 9, 9, 9, 8, 8.6, '1'),
(2, 2, 5, 5, 5, 6, 6, 5.4, '1'),
(3, 3, 9, 8, 9, 9, 9, 8.8, '1'),
(4, 4, 5, 5, 5, 5, 6, 5.2, '1'),
(5, 5, 8, 7, 9, 9, 9, 8.4, '1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
