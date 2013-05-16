-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-03-2013 a las 10:14:08
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `facturacion2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE IF NOT EXISTS `bitacora` (
  `id` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `sql` text NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(20) NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcado de datos para la tabla `categorias`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_apellido` varchar(200) NOT NULL,
  `nacionalidad` varchar(1) NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `direccion` text NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `idParroquia` varchar(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idParroquia` (`idParroquia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcado de datos para la tabla `clientes`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE IF NOT EXISTS `facturas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nro_control` varchar(10) NOT NULL,
  `fecha_emision` date NOT NULL,
  `hora` time NOT NULL,
  `total_iva` float NOT NULL,
  `total_descuento` float NOT NULL,
  `total_neto` float NOT NULL,
  `forma_pago` varchar(20) NOT NULL,
  `estatus` varchar(50) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_cliente` (`id_cliente`,`id_usuario`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcado de datos para la tabla `facturas`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE IF NOT EXISTS `marcas` (
  `idMarca` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(20) NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`idMarca`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcado de datos para la tabla `marcas`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelos`
--

CREATE TABLE IF NOT EXISTS `modelos` (
  `idModelo` int(11) NOT NULL AUTO_INCREMENT,
  `modelo` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`idModelo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcado de datos para la tabla `modelos`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE IF NOT EXISTS `municipios` (
  `idMunicipio` varchar(5) NOT NULL COMMENT 'clave primaria',
  `municipio` varchar(30) NOT NULL COMMENT 'almacena el nombre de cada uno de los municipios del estado',
  PRIMARY KEY (`idMunicipio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Almacena los municipios del estado';

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`idMunicipio`, `municipio`) VALUES
('00001', 'San Felipe'),
('00002', 'Independencia'),
('00003', 'Cocorote'),
('00004', 'Bolivar'),
('00005', 'Bruzual'),
('00006', 'Manuel Monge'),
('00007', 'La Trinidad'),
('00008', 'Jose Antonio Paez'),
('00009', 'Sucre'),
('00010', 'Nirgua'),
('00011', 'Peña'),
('00012', 'Urachiche'),
('00013', 'Veroes'),
('00014', 'Aristides Bastidas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parroquias`
--

CREATE TABLE IF NOT EXISTS `parroquias` (
  `idParroquia` varchar(5) NOT NULL COMMENT 'clave principal',
  `parroquia` varchar(30) NOT NULL COMMENT 'almacena los nombres de todas las parroquias del estado yaracuy',
  `idMunicipio` varchar(5) NOT NULL COMMENT 'clave foranea para hacer la relacion con la tabla municipios',
  PRIMARY KEY (`idParroquia`),
  KEY `idMunicipio` (`idMunicipio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Amacena las parroquias del estado';

--
-- Volcado de datos para la tabla `parroquias`
--

INSERT INTO `parroquias` (`idParroquia`, `parroquia`, `idMunicipio`) VALUES
('00001', 'San Felipe', '00001'),
('00002', 'Albarico', '00001'),
('00003', 'San Javier', '00001'),
('00004', 'Independencia', '00002'),
('00005', 'Cocorote', '00003'),
('00006', 'Aroa', '00004'),
('00007', 'Chivacoa', '00005'),
('00008', 'Campo Elias', '00005'),
('00009', 'Yumare', '00006'),
('00010', 'Boraure', '00007'),
('00011', 'Sabana de Parra', '00008'),
('00012', 'Guama', '00009'),
('00013', 'Nirgua', '00010'),
('00014', 'Salom', '00010'),
('00015', 'Temerla', '00010'),
('00016', 'Yaritagua', '00011'),
('00017', 'San Andres', '00011'),
('00018', 'Urachiche', '00012'),
('00019', 'Farriar', '00013'),
('00020', 'El Guayabo', '00013'),
('00021', 'San Pablo', '00014');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) NOT NULL,
  `fecha_entrada` date NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `precio_compra` float NOT NULL,
  `precio_venta` float NOT NULL,
  `stock_minimo` int(11) NOT NULL,
  `existencia` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `idMarca` varchar(5) NOT NULL,
  `idModelo` varchar(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_proveedor` (`id_proveedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcado de datos para la tabla `productos`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_factura`
--

CREATE TABLE IF NOT EXISTS `productos_factura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_factura` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad_producto` int(11) NOT NULL,
  `iva_producto` float NOT NULL,
  `descuento_producto` float NOT NULL,
  `total_producto` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_factura` (`id_factura`),
  KEY `id_producto` (`id_producto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcado de datos para la tabla `productos_factura`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE IF NOT EXISTS `proveedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rif` varchar(20) NOT NULL,
  `razon_social` text NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `direccion` text NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcado de datos para la tabla `proveedores`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(36) NOT NULL,
  `rol` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcado de datos para la tabla `usuarios`
--



--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `parroquias`
--
ALTER TABLE `parroquias`
  ADD CONSTRAINT `parroquias_ibfk_1` FOREIGN KEY (`idMunicipio`) REFERENCES `municipios` (`idMunicipio`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
