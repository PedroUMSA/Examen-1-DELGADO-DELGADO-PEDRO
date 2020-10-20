-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 20-10-2020 a las 04:31:44
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `academico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `identificador`
--

CREATE TABLE IF NOT EXISTS `identificador` (
  `ci` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `fechanaci` date DEFAULT NULL,
  `recidencia` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ci`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `identificador`
--

INSERT INTO `identificador` (`ci`, `nombre`, `fechanaci`, `recidencia`) VALUES
(100, 'carlos sangalli cuarite', '1997-04-14', '02'),
(101, 'mary apaza quino', '1998-05-20', '02'),
(102, 'alison mamani torrez', '1999-01-08', '03'),
(103, 'daniel machante romeu', '1995-03-02', '03'),
(104, 'maria josefa sales escolano', '1991-10-10', '07'),
(105, 'luisa puebla soares', '1990-12-05', '07'),
(106, 'cristian vivancos peral', '1997-07-12', '08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota`
--

CREATE TABLE IF NOT EXISTS `nota` (
  `ci` int(11) NOT NULL,
  `materia` varchar(20) DEFAULT NULL,
  `nota` float DEFAULT NULL,
  KEY `ci` (`ci`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nota`
--

INSERT INTO `nota` (`ci`, `materia`, `nota`) VALUES
(100, '111', 60),
(100, '112', 40),
(101, '111', 30),
(101, '116', 80),
(102, '273', 55),
(102, '142', 30),
(103, '145', 53),
(103, '161', 90),
(104, '145', 30),
(104, '166', 100),
(105, '121', 30),
(105, '122', 10),
(106, '354', 60),
(106, '324', 70);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `nick` varchar(50) NOT NULL,
  `ci` int(11) DEFAULT NULL,
  `clave` varchar(50) NOT NULL,
  PRIMARY KEY (`nick`),
  KEY `ci` (`ci`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nick`, `ci`, `clave`) VALUES
('amt', 102, '123456'),
('csc', 100, '123456'),
('cvp', 106, '123456'),
('dmr', 103, '123456'),
('lps', 105, '123456'),
('maq', 101, '123456'),
('mjse', 104, '123456');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `nota_ibfk_1` FOREIGN KEY (`ci`) REFERENCES `identificador` (`ci`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`ci`) REFERENCES `identificador` (`ci`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
