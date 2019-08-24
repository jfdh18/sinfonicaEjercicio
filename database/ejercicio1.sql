-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 24-08-2019 a las 03:49:34
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ejercicio1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

DROP TABLE IF EXISTS `estudiantes`;
CREATE TABLE IF NOT EXISTS `estudiantes` (
  `id_Estudiante` int(11) NOT NULL AUTO_INCREMENT,
  `Identificacion` int(10) DEFAULT NULL,
  `Nombre` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Apellido` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Direccion` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Acudiente` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Telefono` int(10) DEFAULT NULL,
  `Foto` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_Estudiante`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id_Estudiante`, `Identificacion`, `Nombre`, `Apellido`, `Direccion`, `Acudiente`, `Telefono`, `Foto`) VALUES
(3, 100320, 'Hit', 'man', 'Carrera 12-11', 'Diana', 32144234, '../../Images');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sinfonica`
--

DROP TABLE IF EXISTS `sinfonica`;
CREATE TABLE IF NOT EXISTS `sinfonica` (
  `id_Sinfonica` int(11) NOT NULL AUTO_INCREMENT,
  `documento` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `apellido` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instrumento` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `direccion` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `acudiente` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono` int(10) DEFAULT NULL,
  `foto` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_Sinfonica`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `sinfonica`
--

INSERT INTO `sinfonica` (`id_Sinfonica`, `documento`, `nombre`, `apellido`, `instrumento`, `direccion`, `acudiente`, `telefono`, `foto`) VALUES
(1, '1029208', 'caleb', 'lopez', 'guitarra', 'carrera', 'luis', 8371839, 'foto'),
(3, '123456', 'Marcos', '', 'Guitarra', 'Carreara 12', 'Luis', 322322, ''),
(4, '123456', 'Marcos', 'Arenas', 'Guitarra', 'Carreara 12', 'Luis', 322322, '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
