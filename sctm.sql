-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-08-2013 a las 15:02:48
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sctm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE IF NOT EXISTS `cargos` (
  `idcargo` int(8) NOT NULL AUTO_INCREMENT,
  `nombreCargo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idcargo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_materiales`
--

CREATE TABLE IF NOT EXISTS `cat_materiales` (
  `idcatmaterial` int(8) NOT NULL,
  `nombres` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idcatmaterial`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_servicios`
--

CREATE TABLE IF NOT EXISTS `cat_servicios` (
  `idcatservicio` int(8) NOT NULL,
  `nombres` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idcatservicio`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `cedula` int(12) NOT NULL,
  `rif` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(75) COLLATE utf8_spanish_ci NOT NULL,
  `telefono1` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `telefono2` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`cedula`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE IF NOT EXISTS `empleados` (
  `cedula` int(12) NOT NULL,
  `nombres` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(75) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `fnac` date NOT NULL,
  `profesion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `idcargo` int(8) NOT NULL,
  `rif` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `fcontrato` date NOT NULL,
  `sexo` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`cedula`),
  KEY `idcargo` (`idcargo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE IF NOT EXISTS `facturas` (
  `idfactura` int(8) NOT NULL AUTO_INCREMENT,
  `idoservicio` int(8) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`idfactura`),
  KEY `idoservicio` (`idoservicio`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE IF NOT EXISTS `inventario` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `idmaterial` int(8) NOT NULL,
  `existencia` int(12) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idmaterial` (`idmaterial`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales`
--

CREATE TABLE IF NOT EXISTS `materiales` (
  `idmaterial` int(8) NOT NULL,
  `nombres` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `idcatmaterial` int(8) NOT NULL,
  `idumedida` int(8) NOT NULL,
  `imagen` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `precio` float NOT NULL,
  PRIMARY KEY (`idmaterial`),
  KEY `idcatmaterial` (`idcatmaterial`,`idumedida`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oservicio`
--

CREATE TABLE IF NOT EXISTS `oservicio` (
  `idoservicio` int(8) NOT NULL AUTO_INCREMENT,
  `idempleado` int(8) NOT NULL,
  `idservicio` int(8) NOT NULL,
  `idsextra` int(8) NOT NULL,
  `idmaterial` int(8) NOT NULL,
  `iva` float NOT NULL,
  `total` float NOT NULL,
  PRIMARY KEY (`idoservicio`),
  KEY `idempleado` (`idempleado`,`idservicio`,`idsextra`),
  KEY `idmaterial` (`idmaterial`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE IF NOT EXISTS `proveedores` (
  `rif` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `nombres` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `rsocial` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(75) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`rif`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recepcionm`
--

CREATE TABLE IF NOT EXISTS `recepcionm` (
  `idrecepcionm` int(11) NOT NULL AUTO_INCREMENT,
  `idproveedor` int(11) NOT NULL,
  PRIMARY KEY (`idrecepcionm`),
  KEY `idproveedor` (`idproveedor`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE IF NOT EXISTS `servicios` (
  `idservicio` int(8) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `idcatservicio` int(8) NOT NULL,
  PRIMARY KEY (`idservicio`),
  KEY `idcatservicio` (`idcatservicio`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sextra`
--

CREATE TABLE IF NOT EXISTS `sextra` (
  `idsextra` int(8) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) NOT NULL,
  `precio` float NOT NULL,
  PRIMARY KEY (`idsextra`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `umedida`
--

CREATE TABLE IF NOT EXISTS `umedida` (
  `idumedida` int(8) NOT NULL,
  `nombres` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idumedida`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
