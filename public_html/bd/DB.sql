
-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 25, 2013 at 03:50 AM
-- Server version: 5.1.57
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `a7599453_enterpr`
--

-- --------------------------------------------------------

--
-- Table structure for table `acceso`
--

CREATE TABLE `acceso` (
  `id` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Users ID',
  `username` varchar(25) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombres de usuarios',
  `password` varchar(19) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Claves',
  `type` char(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'u' COMMENT 'Tipo de usurio',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Autenticacion de  usuarios' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `acceso`
--

INSERT INTO `acceso` VALUES(1, 'user', 'ee5ZZAg.T/1YM', 'u');
INSERT INTO `acceso` VALUES(2, 'empleado', '08sqBXPrctEys', 'e');
INSERT INTO `acceso` VALUES(3, 'admin', '21YJ.FGrwabtY', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `cliente_factura`
--

CREATE TABLE `cliente_factura` (
  `id` int(5) NOT NULL,
  `rfcid` int(3) NOT NULL,
  `fecha` date NOT NULL,
  `cantidad` float NOT NULL,
  `ventaid` int(5) NOT NULL,
  `fecha_pago` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rfcid` (`rfcid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Info de Facturacion de clientes';

--
-- Dumping data for table `cliente_factura`
--


-- --------------------------------------------------------

--
-- Table structure for table `cliente_rfc`
--

CREATE TABLE `cliente_rfc` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `rfc` varchar(19) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `ciudad` varchar(19) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(19) COLLATE utf8_spanish_ci NOT NULL,
  `alta` date NOT NULL,
  `fechaFact` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `rfc` (`rfc`),
  KEY `nombre` (`nombre`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='rfc de facturacion' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cliente_rfc`
--


-- --------------------------------------------------------

--
-- Table structure for table `compra`
--

CREATE TABLE `compra` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `provedorid` int(2) NOT NULL,
  `productoid` int(1) NOT NULL,
  `cantidad` int(2) NOT NULL,
  `total` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `provedorid` (`provedorid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='compras' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `compra`
--


-- --------------------------------------------------------

--
-- Table structure for table `compra_factura`
--

CREATE TABLE `compra_factura` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `compraid` int(5) NOT NULL,
  `fechapago` date NOT NULL,
  `formapagoid` int(1) NOT NULL,
  `transaccion` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='facturas de compraas' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `compra_factura`
--


-- --------------------------------------------------------

--
-- Table structure for table `contacto`
--

CREATE TABLE `contacto` (
  `id` int(3) NOT NULL AUTO_INCREMENT COMMENT 'id del contacto',
  `userid` varchar(25) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre de usuarios',
  `rfcid` int(3) NOT NULL,
  `instalacionid` int(3) NOT NULL COMMENT 'tipo de sistema',
  `paqueteid` int(2) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `paterno` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `materno` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='nombre de contactos' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `contacto`
--


-- --------------------------------------------------------

--
-- Table structure for table `contacto_email`
--

CREATE TABLE `contacto_email` (
  `contactoID` int(3) NOT NULL COMMENT 'id del contacto',
  `email` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  KEY `contactoID` (`contactoID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='email de contactos';

--
-- Dumping data for table `contacto_email`
--


-- --------------------------------------------------------

--
-- Table structure for table `contacto_tel`
--

CREATE TABLE `contacto_tel` (
  `contactoID` int(3) NOT NULL COMMENT 'id del usuario',
  `tipo` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'tipo de telefono',
  `numero` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  KEY `contactoID` (`contactoID`)
) ENGINE=MyISAM DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish_ci COMMENT='telefonos de contactos';

--
-- Dumping data for table `contacto_tel`
--


-- --------------------------------------------------------

--
-- Table structure for table `departamento`
--

CREATE TABLE `departamento` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nombre` (`nombre`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='departamentos' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `departamento`
--


-- --------------------------------------------------------

--
-- Table structure for table `empleados`
--

CREATE TABLE `empleados` (
  `id` int(3) NOT NULL,
  `departid` int(2) NOT NULL,
  `puestoid` int(2) NOT NULL,
  `ingreso` date NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `paterno` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `materno` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `numero` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `ext` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `departid` (`departid`,`puestoid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='empleados';

--
-- Dumping data for table `empleados`
--


-- --------------------------------------------------------

--
-- Table structure for table `forma_pago`
--

CREATE TABLE `forma_pago` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(19) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tipo` (`tipo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='forma de pago' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `forma_pago`
--


-- --------------------------------------------------------

--
-- Table structure for table `instalacion`
--

CREATE TABLE `instalacion` (
  `id` int(4) NOT NULL,
  `contactoid` int(3) NOT NULL,
  `ventaid` int(5) NOT NULL,
  `instaladorid` int(3) NOT NULL,
  `listadematerialid` int(5) NOT NULL,
  `fecha` date NOT NULL,
  `direccion` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `ciudad` varchar(19) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(19) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `facturaid` (`contactoid`,`ventaid`,`instaladorid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='instalaciones';

--
-- Dumping data for table `instalacion`
--


-- --------------------------------------------------------

--
-- Table structure for table `lista_entrega`
--

CREATE TABLE `lista_entrega` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `facturaid` int(5) NOT NULL,
  `instalacionid` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `facturaid` (`facturaid`,`instalacionid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='lista de entrega' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `lista_entrega`
--


-- --------------------------------------------------------

--
-- Table structure for table `lista_recepcion`
--

CREATE TABLE `lista_recepcion` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `compraid` int(5) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `compraid` (`compraid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='lista de recepcion de materiales' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `lista_recepcion`
--


-- --------------------------------------------------------

--
-- Table structure for table `material_entrega`
--

CREATE TABLE `material_entrega` (
  `listaentregaid` int(5) NOT NULL,
  `productoid` int(2) NOT NULL,
  `numerodeserie` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  KEY `listaentregaid` (`listaentregaid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='materiales instalados';

--
-- Dumping data for table `material_entrega`
--


-- --------------------------------------------------------

--
-- Table structure for table `material_recepcion`
--

CREATE TABLE `material_recepcion` (
  `listarecepcionid` int(5) NOT NULL,
  `productoid` int(2) NOT NULL,
  `numerodeserie` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  KEY `listarecepcionid` (`listarecepcionid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='material rcibido';

--
-- Dumping data for table `material_recepcion`
--


-- --------------------------------------------------------

--
-- Table structure for table `paquete`
--

CREATE TABLE `paquete` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `precio` float NOT NULL,
  `no_camaras` int(2) NOT NULL,
  `productoid` int(2) NOT NULL,
  `storage` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nombre` (`nombre`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Paquetes' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `paquete`
--


-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `modelo` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `modelo` (`modelo`),
  KEY `descripcion` (`descripcion`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='productos' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `producto`
--


-- --------------------------------------------------------

--
-- Table structure for table `provedor`
--

CREATE TABLE `provedor` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `rfc` varchar(19) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `contacto` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `puesto` varchar(19) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `formapago` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `rfc` (`rfc`),
  KEY `nombre` (`nombre`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='provedor' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `provedor`
--


-- --------------------------------------------------------

--
-- Table structure for table `puesto`
--

CREATE TABLE `puesto` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `sueldoid` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nombre` (`nombre`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='puestod' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `puesto`
--


-- --------------------------------------------------------

--
-- Table structure for table `sueldo`
--

CREATE TABLE `sueldo` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nombre` (`nombre`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='sueldos' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sueldo`
--


-- --------------------------------------------------------

--
-- Table structure for table `ventas`
--

CREATE TABLE `ventas` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `vendedorid` int(2) NOT NULL,
  `paqueteid` int(1) NOT NULL,
  `total` float NOT NULL,
  `clienteid` int(3) NOT NULL,
  `formapago` int(1) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `vendedorid` (`vendedorid`,`clienteid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='venta de paquetes' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ventas`
--

