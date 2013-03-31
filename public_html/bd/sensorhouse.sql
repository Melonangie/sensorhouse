-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 31, 2013 at 01:25 AM
-- Server version: 5.6.10
-- PHP Version: 5.4.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sensorhouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `acceso`
--

CREATE TABLE IF NOT EXISTS `acceso` (
  `idacceso` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'Id del username',
  `id_cliente` tinyint(4) NOT NULL COMMENT 'Id del cliente',
  `username` varchar(45) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Un usuario por cliente',
  `password` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `admin` enum('no','si') COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'no' COMMENT 'Es administrador',
  `activo` enum('no','si') COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'si',
  PRIMARY KEY (`idacceso`),
  UNIQUE KEY `usuario_UNIQUE` (`username`),
  UNIQUE KEY `id_cliente_UNIQUE` (`id_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `acceso`
--

INSERT INTO `acceso` (`idacceso`, `id_cliente`, `username`, `password`, `admin`, `activo`) VALUES
(1, 1, 'administrador', '$2a$08$lZlcekkuKeGJVJj2iNGhaenKrnRu.gE54MgBKAzhiXaOdjNpLdGFa', 'si', 'si'),
(2, 2, 'usuario', '$2a$08$2mVuD0lDEGSJwaYzil1xHeXTRG1PyFYHaCkP1tmTSk2OqhEqFAUwi', 'no', 'si');

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `idcliente` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'id del client que factura',
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'fecha de alta',
  `empresa` enum('no','si') COLLATE utf8_spanish2_ci NOT NULL COMMENT 'es  empresa',
  `activo` enum('no','si') COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'si',
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`idcliente`, `fecha`, `empresa`, `activo`) VALUES
(1, '2013-03-30 15:00:00', 'si', 'si'),
(2, '2013-03-30 16:47:10', 'no', 'si');

-- --------------------------------------------------------

--
-- Table structure for table `cliente_email`
--

CREATE TABLE IF NOT EXISTS `cliente_email` (
  `idcliente_email` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'Id del email',
  `id_cliente` tinyint(4) NOT NULL COMMENT 'Id del contacto',
  `email` varchar(95) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `activo` enum('no','si') COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'si',
  PRIMARY KEY (`idcliente_email`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_cliente_email_cliente_idx` (`id_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cliente_email`
--

INSERT INTO `cliente_email` (`idcliente_email`, `id_cliente`, `email`, `descripcion`, `activo`) VALUES
(1, 1, 'sensorhouse@gmail.com', 'correo oficial', 'si'),
(2, 2, 'arabelera@gmail.com', 'personal', 'si');

-- --------------------------------------------------------

--
-- Table structure for table `cliente_empresa`
--

CREATE TABLE IF NOT EXISTS `cliente_empresa` (
  `idcliente_empresa` tinyint(4) NOT NULL AUTO_INCREMENT,
  `id_cliente` tinyint(4) NOT NULL,
  `rfc` varchar(13) COLLATE utf8_spanish2_ci NOT NULL,
  `razon_social` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `NIF` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`idcliente_empresa`),
  UNIQUE KEY `id_cliente_UNIQUE` (`id_cliente`),
  UNIQUE KEY `rfc_UNIQUE` (`rfc`),
  KEY `fk_cliente_empresa_cliente_idx` (`id_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cliente_empresa`
--

INSERT INTO `cliente_empresa` (`idcliente_empresa`, `id_cliente`, `rfc`, `razon_social`, `NIF`) VALUES
(1, 1, 'HOIS071012R79', 'sensor house inc', '1234567891011');

-- --------------------------------------------------------

--
-- Table structure for table `cliente_fotos`
--

CREATE TABLE IF NOT EXISTS `cliente_fotos` (
  `idcliente_fotos` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'Id de la foto',
  `id_cliente` tinyint(4) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `descripcion` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `activo` enum('no','si') COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'si',
  PRIMARY KEY (`idcliente_fotos`),
  KEY `fk_cliente_fotos_cliente_idx` (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cliente_instalacion`
--

CREATE TABLE IF NOT EXISTS `cliente_instalacion` (
  `idcliente_instalacion` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'Id de la instalacion',
  `id_cliente_plan` tinyint(4) NOT NULL COMMENT 'Id del plan del cliente que se instalo',
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de la instalacion',
  `calle` varchar(55) COLLATE utf8_spanish2_ci NOT NULL,
  `colonia` varchar(55) COLLATE utf8_spanish2_ci NOT NULL,
  `ciudad` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `pais` varchar(45) COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'Mexico',
  PRIMARY KEY (`idcliente_instalacion`),
  UNIQUE KEY `id_plan_UNIQUE` (`id_cliente_plan`),
  KEY `fk_cliente_instalacion_cliente_plan_idx` (`id_cliente_plan`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cliente_instalacion`
--

INSERT INTO `cliente_instalacion` (`idcliente_instalacion`, `id_cliente_plan`, `fecha`, `calle`, `colonia`, `ciudad`, `estado`, `pais`) VALUES
(1, 1, '2013-03-30 16:45:38', 'Carretera libre Tijuana-Tecate km 10', 'fraccionamiento El refugio quintas campestre', 'Tijuana', 'Baja California', 'Mexico'),
(2, 2, '2013-03-30 16:48:58', 'Paseo Centenario 17-10', 'Paseo Centenario', 'Tijuana', 'Baja California', 'Mexico');

-- --------------------------------------------------------

--
-- Table structure for table `cliente_persona`
--

CREATE TABLE IF NOT EXISTS `cliente_persona` (
  `idcliente_contacto` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'id del contacto',
  `id_cliente` tinyint(4) NOT NULL COMMENT 'id del cliente',
  `curp` varchar(18) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `paterno` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `materno` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`idcliente_contacto`),
  UNIQUE KEY `id_cliente_UNIQUE` (`id_cliente`),
  UNIQUE KEY `curp_UNIQUE` (`curp`),
  KEY `fk_cliente_cliente_idx` (`id_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cliente_persona`
--

INSERT INTO `cliente_persona` (`idcliente_contacto`, `id_cliente`, `curp`, `nombre`, `paterno`, `materno`) VALUES
(1, 2, 'RAMA811127', 'Maria', 'Rabelero', 'Campos');

-- --------------------------------------------------------

--
-- Table structure for table `cliente_plan`
--

CREATE TABLE IF NOT EXISTS `cliente_plan` (
  `idcliente_plan` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'Id del plan del  cliente',
  `id_cliente` tinyint(4) NOT NULL COMMENT 'Id del cliente',
  `id_plan` tinyint(4) NOT NULL COMMENT 'Id del plan',
  `id_pago` tinyint(4) NOT NULL COMMENT 'Id del tipo de pago',
  `activo` enum('no','si') COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'si',
  PRIMARY KEY (`idcliente_plan`),
  KEY `fk_cliente_plan_cliente_idx` (`id_cliente`),
  KEY `fk_cliente_plan_pago_idx` (`id_pago`),
  KEY `fk_cliente_plan_plan_idx` (`id_plan`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cliente_plan`
--

INSERT INTO `cliente_plan` (`idcliente_plan`, `id_cliente`, `id_plan`, `id_pago`, `activo`) VALUES
(1, 1, 3, 2, 'si'),
(2, 2, 2, 1, 'si');

-- --------------------------------------------------------

--
-- Table structure for table `cliente_telefono`
--

CREATE TABLE IF NOT EXISTS `cliente_telefono` (
  `idcliente_telefono` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'Id del telefono',
  `id_cliente` tinyint(4) NOT NULL,
  `numero` varchar(55) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `activo` enum('no','si') COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'si',
  PRIMARY KEY (`idcliente_telefono`),
  UNIQUE KEY `numero_UNIQUE` (`numero`),
  KEY `fk_cliente_telefono_cliente_idx` (`id_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cliente_telefono`
--

INSERT INTO `cliente_telefono` (`idcliente_telefono`, `id_cliente`, `numero`, `tipo`, `activo`) VALUES
(1, 1, '6649694700', 'residencial', 'si'),
(2, 1, '018007880949', 'pago', 'si'),
(3, 2, '6649732205', 'residencial', 'si');

-- --------------------------------------------------------

--
-- Table structure for table `cliente_videos`
--

CREATE TABLE IF NOT EXISTS `cliente_videos` (
  `idcliente_videos` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'Id del video',
  `id_cliente` tinyint(4) NOT NULL COMMENT 'Id del cliente',
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `descripcion` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `activo` enum('no','si') COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'si',
  PRIMARY KEY (`idcliente_videos`),
  KEY `fk_cliente_videos_cliente_idx` (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE IF NOT EXISTS `material` (
  `idmaterial` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'id del producto',
  `modelo` varchar(45) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'nombre o modelo del producto',
  `descripcion` varchar(255) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Descripcion de producto',
  `foto` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`idmaterial`),
  UNIQUE KEY `modelo_UNIQUE` (`modelo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`idmaterial`, `modelo`, `descripcion`, `foto`) VALUES
(1, 'Central Receptora', 'Modulo central del sistema de proteccion. ', '../img/productos/central.jpg'),
(2, 'Easy Home Sentinel', 'La cámara incorpora unos rotores mecánicos internos que pueden controlarse a distancia a través de la red', '../img/productos/EasyHomeSentinel.jpg'),
(3, 'Gran Cámara Motorizada Wifi', 'Cámara IP de vigilancia con software interno de gestión para visión de imágenes, grabación gestión multicámaras, activación de alarmas por detección de movimiento,', '../img/productos/GranCamaraMotorizadaWifi.jpg'),
(4, 'Mini Camara', 'La Mini Camara es una solución de vigilancia única y versátil para el hogar o la pequeña oficina.', '../img/productos/MiniCamara.jpg'),
(5, 'Camara para Exterior Motorizada', 'Camara para Exterior Motorizada', '../img/productos/CamaraExteriorMotorizada.jpg'),
(6, 'Sensores', 'Kit de 3 sensores para interior', '../img/productos/sensores.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pago`
--

CREATE TABLE IF NOT EXISTS `pago` (
  `idpago` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'id del tipo de pago',
  `forma` varchar(20) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Tipo de pago',
  PRIMARY KEY (`idpago`),
  UNIQUE KEY `descripcion_UNIQUE` (`forma`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pago`
--

INSERT INTO `pago` (`idpago`, `forma`) VALUES
(2, 'Credito'),
(5, 'Cheque'),
(1, 'Efectivo'),
(3, 'Tarjeta de Credito'),
(4, 'Tarjeta de Debito'),
(6, 'Vales');

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE IF NOT EXISTS `plan` (
  `idplan` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'id del plan',
  `nombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Nombre del plan',
  `precio` float NOT NULL COMMENT 'Precio del plan',
  `storage` decimal(1,0) NOT NULL COMMENT 'Capacidad de almacenamiento',
  PRIMARY KEY (`idplan`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`idplan`, `nombre`, `precio`, `storage`) VALUES
(1, 'Proteccion Basica', 1500, '1'),
(2, 'Proteccion Plus', 2500, '5'),
(3, 'Proteccion Gold', 3000, '8');

-- --------------------------------------------------------

--
-- Table structure for table `plan_materiales`
--

CREATE TABLE IF NOT EXISTS `plan_materiales` (
  `idplan_material` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'Id de un producto en un plan',
  `id_plan` tinyint(4) NOT NULL COMMENT 'Id del plan',
  `id_material` tinyint(4) NOT NULL COMMENT 'ID el material',
  `cantidad` tinyint(4) NOT NULL COMMENT 'Cantdad de materiales en el plan',
  PRIMARY KEY (`idplan_material`),
  KEY `fk_plan_materiales_plan_idx` (`id_plan`),
  KEY `id_material` (`id_material`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `plan_materiales`
--

INSERT INTO `plan_materiales` (`idplan_material`, `id_plan`, `id_material`, `cantidad`) VALUES
(1, 1, 1, 1),
(2, 1, 6, 3),
(6, 2, 1, 1),
(7, 2, 2, 3),
(8, 2, 6, 2),
(9, 3, 3, 2),
(10, 3, 6, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `acceso`
--
ALTER TABLE `acceso`
  ADD CONSTRAINT `fk_cliente_usuario_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cliente_email`
--
ALTER TABLE `cliente_email`
  ADD CONSTRAINT `fk_cliente_email_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cliente_empresa`
--
ALTER TABLE `cliente_empresa`
  ADD CONSTRAINT `fk_cliente_empresa_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cliente_fotos`
--
ALTER TABLE `cliente_fotos`
  ADD CONSTRAINT `fk_cliente_fotos_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cliente_instalacion`
--
ALTER TABLE `cliente_instalacion`
  ADD CONSTRAINT `fk_cliente_instalacion_cliente_plan` FOREIGN KEY (`id_cliente_plan`) REFERENCES `cliente_plan` (`idcliente_plan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cliente_persona`
--
ALTER TABLE `cliente_persona`
  ADD CONSTRAINT `fk_cliente_contacto_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cliente_plan`
--
ALTER TABLE `cliente_plan`
  ADD CONSTRAINT `fk_cliente_plan_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cliente_plan_pago` FOREIGN KEY (`id_pago`) REFERENCES `pago` (`idpago`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cliente_plan_plan` FOREIGN KEY (`id_plan`) REFERENCES `plan` (`idplan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cliente_telefono`
--
ALTER TABLE `cliente_telefono`
  ADD CONSTRAINT `fk_cliente_telefono_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cliente_videos`
--
ALTER TABLE `cliente_videos`
  ADD CONSTRAINT `fk_cliente_videos_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `plan_materiales`
--
ALTER TABLE `plan_materiales`
  ADD CONSTRAINT `fk_plan_materiales_plan` FOREIGN KEY (`id_plan`) REFERENCES `plan` (`idplan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_plan_material_material` FOREIGN KEY (`id_material`) REFERENCES `material` (`idmaterial`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
