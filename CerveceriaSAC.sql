-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 29, 2019 at 08:43 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cerveceriasac`
--

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `ClienteID` int(11) NOT NULL AUTO_INCREMENT,
  `NombreComercial` varchar(256) COLLATE latin1_spanish_ci NOT NULL,
  `RazonSocial` varchar(256) COLLATE latin1_spanish_ci NOT NULL,
  `RFC` varchar(256) COLLATE latin1_spanish_ci NOT NULL,
  `Direccion` varchar(256) COLLATE latin1_spanish_ci NOT NULL,
  `Telefono` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `HorarioEntrega` varchar(256) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`ClienteID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`ClienteID`, `NombreComercial`, `RazonSocial`, `RFC`, `Direccion`, `Telefono`, `HorarioEntrega`) VALUES
(1, 'Salo', 'asfhs', 'fjdlsi', 'asfjkl', '453', '*-45'),
(2, 'morra', 'esadf', 'sdf', 'asdf', 'sf', 'd');

-- --------------------------------------------------------

--
-- Stand-in structure for view `clientesmascompradores`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `clientesmascompradores`;
CREATE TABLE IF NOT EXISTS `clientesmascompradores` (
`NombreComercial` varchar(256)
,`Ventas` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `diasconmasventas`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `diasconmasventas`;
CREATE TABLE IF NOT EXISTS `diasconmasventas` (
`fecha` datetime
,`Ventas` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `empleado`
--

DROP TABLE IF EXISTS `empleado`;
CREATE TABLE IF NOT EXISTS `empleado` (
  `EmpleadoID` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `HorasxSem` float DEFAULT NULL,
  `PagoxHrs` float DEFAULT NULL,
  `UserID` int(11) NOT NULL,
  PRIMARY KEY (`EmpleadoID`),
  KEY `UserID` (`UserID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `empleado`
--

INSERT INTO `empleado` (`EmpleadoID`, `Nombre`, `HorasxSem`, `PagoxHrs`, `UserID`) VALUES
(1, 'Andrés Rafael Ramírez Nava', 60, 64, 1),
(2, 'Rogelio', 40, 18, 2);

-- --------------------------------------------------------

--
-- Table structure for table `fechaconsulta`
--

DROP TABLE IF EXISTS `fechaconsulta`;
CREATE TABLE IF NOT EXISTS `fechaconsulta` (
  `FechaConsultaID` int(11) NOT NULL AUTO_INCREMENT,
  `FechaInicio` datetime NOT NULL,
  `FechaFin` datetime NOT NULL,
  PRIMARY KEY (`FechaConsultaID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `insumo`
--

DROP TABLE IF EXISTS `insumo`;
CREATE TABLE IF NOT EXISTS `insumo` (
  `InsumoID` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `UnidadPresentacionID` int(11) NOT NULL,
  `Stock` double DEFAULT NULL,
  `PrecioXUnidad` float NOT NULL,
  `ProveedorID` int(11) DEFAULT NULL,
  PRIMARY KEY (`InsumoID`),
  KEY `UnidadPresentacionID` (`UnidadPresentacionID`),
  KEY `ProveedorID` (`ProveedorID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `insumo`
--

INSERT INTO `insumo` (`InsumoID`, `Descripcion`, `UnidadPresentacionID`, `Stock`, `PrecioXUnidad`, `ProveedorID`) VALUES
(1, 'dfs', 1, 1.5, 3, 1),
(2, 'avena', 1, -1.5, 0, 1),
(3, 'whatrsadf', 1, -10.3, 3, 1),
(4, 'Algo', 1, 8986.5, 60, 2);

-- --------------------------------------------------------

--
-- Stand-in structure for view `insumoentrada`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `insumoentrada`;
CREATE TABLE IF NOT EXISTS `insumoentrada` (
`PedidoProvID` int(11)
,`ProveedorID` int(11)
,`Fecha` datetime
,`Total` float
,`InsumoID` int(11)
,`Descripcion` varchar(255)
,`Cantidad` float
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `insumosalida`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `insumosalida`;
CREATE TABLE IF NOT EXISTS `insumosalida` (
`InsumoID` int(11)
,`FechaInicio` datetime
,`UnidadXLote` float
);

-- --------------------------------------------------------

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `PedidoID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductoID` int(11) NOT NULL,
  `UnidadXLote` float NOT NULL,
  `FechaInicio` datetime NOT NULL,
  `FechaFin` datetime NOT NULL,
  `Status` bit(1) DEFAULT NULL,
  `FechaStatusFin` datetime DEFAULT NULL,
  PRIMARY KEY (`PedidoID`),
  KEY `pedido_ibfk_1` (`ProductoID`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `pedido`
--

INSERT INTO `pedido` (`PedidoID`, `ProductoID`, `UnidadXLote`, `FechaInicio`, `FechaFin`, `Status`, `FechaStatusFin`) VALUES
(2, 3, 100, '2019-11-06 00:00:00', '2019-11-20 00:00:00', NULL, '2019-11-29 00:00:00'),
(3, 3, 100, '2019-10-29 00:00:00', '2019-12-05 00:00:00', b'0', '2019-11-29 00:00:00'),
(4, 3, 100, '2019-10-29 00:00:00', '2019-12-11 00:00:00', b'0', '2019-11-29 00:00:00'),
(5, 3, 100, '2019-11-06 00:00:00', '2019-11-22 00:00:00', b'0', '2019-11-29 00:00:00'),
(6, 3, 100, '2019-10-29 00:00:00', '2019-11-30 00:00:00', b'0', '2019-11-29 00:00:00'),
(7, 3, 110, '2019-11-04 00:00:00', '2019-11-22 00:00:00', b'0', '2019-11-29 00:00:00'),
(8, 3, 100, '2019-10-29 00:00:00', '2019-12-05 00:00:00', b'0', '2019-11-29 00:00:00'),
(9, 3, 100, '2019-11-05 00:00:00', '2019-11-29 00:00:00', b'1', NULL),
(10, 3, 110, '2019-11-14 00:00:00', '2019-12-07 00:00:00', b'1', NULL),
(11, 3, 100, '2019-11-06 00:00:00', '2019-12-11 00:00:00', b'1', NULL),
(12, 3, 100, '2019-11-07 00:00:00', '2019-11-19 00:00:00', b'1', NULL),
(13, 3, 100, '2019-11-08 00:00:00', '2019-11-28 00:00:00', b'1', NULL),
(14, 3, 100, '2019-11-20 00:00:00', '2019-11-02 00:00:00', b'1', NULL),
(15, 3, 100, '2019-11-07 00:00:00', '2019-11-29 00:00:00', b'1', NULL),
(16, 3, 110, '2019-11-07 00:00:00', '2019-11-28 00:00:00', b'1', NULL),
(17, 3, 110, '2019-11-08 00:00:00', '2019-11-29 00:00:00', b'1', NULL),
(18, 3, 110, '2019-10-28 00:00:00', '2019-12-06 00:00:00', b'1', NULL),
(19, 3, 110, '2019-10-29 00:00:00', '2019-11-29 00:00:00', b'1', NULL),
(20, 3, 110, '2019-11-15 00:00:00', '2019-11-20 00:00:00', b'1', NULL),
(21, 3, 100, '2019-11-28 00:00:00', '2019-12-06 00:00:00', b'0', '2019-11-29 00:00:00'),
(22, 3, 110, '2019-11-20 00:00:00', '2019-12-11 00:00:00', b'1', NULL),
(23, 3, 110, '2019-11-12 00:00:00', '2019-11-23 00:00:00', b'1', NULL),
(24, 3, 110, '2019-11-07 00:00:00', '2019-11-20 00:00:00', b'1', NULL),
(25, 3, 110, '2019-11-14 00:00:00', '2019-11-27 00:00:00', b'1', NULL),
(26, 3, 110, '2019-11-07 00:00:00', '2019-11-27 00:00:00', b'1', NULL),
(27, 3, 110, '2019-10-28 00:00:00', '2019-11-22 00:00:00', b'1', NULL),
(28, 3, 110, '2019-11-15 00:00:00', '2019-11-20 00:00:00', b'1', NULL),
(29, 3, 110, '2019-10-28 00:00:00', '2019-11-28 00:00:00', b'1', NULL),
(30, 2, 100, '2019-11-01 00:00:00', '2019-12-06 00:00:00', b'1', NULL),
(31, 1, 200, '2019-11-08 00:00:00', '2019-11-30 00:00:00', b'1', NULL),
(32, 1, 200, '2019-11-20 00:00:00', '2019-11-29 00:00:00', b'1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pedidoprov`
--

DROP TABLE IF EXISTS `pedidoprov`;
CREATE TABLE IF NOT EXISTS `pedidoprov` (
  `PedidoProvID` int(11) NOT NULL AUTO_INCREMENT,
  `ProveedorID` int(11) NOT NULL,
  `Fecha` datetime NOT NULL,
  `Total` float NOT NULL,
  PRIMARY KEY (`PedidoProvID`),
  KEY `ProveedorID` (`ProveedorID`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `pedidoprov`
--

INSERT INTO `pedidoprov` (`PedidoProvID`, `ProveedorID`, `Fecha`, `Total`) VALUES
(1, 1, '2019-11-14 00:00:00', 12),
(2, 1, '2019-11-12 00:00:00', 6),
(3, 1, '2019-11-15 00:00:00', 6),
(4, 1, '2019-11-06 00:00:00', 6),
(5, 1, '2019-11-23 00:00:00', 12),
(6, 1, '2019-11-06 00:00:00', 6),
(7, 1, '2019-11-21 00:00:00', 360),
(8, 1, '2019-11-14 00:00:00', 360),
(9, 1, '2019-11-08 00:00:00', 18),
(10, 1, '2019-11-23 00:00:00', 18),
(11, 1, '2019-11-23 00:00:00', 18),
(12, 1, '2019-11-23 00:00:00', 18),
(13, 1, '2019-11-22 00:00:00', 18),
(14, 1, '2019-11-21 00:00:00', 360),
(15, 1, '2019-11-22 00:00:00', 0),
(16, 1, '2019-11-22 00:00:00', 0),
(17, 1, '2019-11-15 00:00:00', 0),
(18, 1, '2019-11-08 00:00:00', 0),
(19, 2, '2019-11-04 00:00:00', 180000),
(20, 1, '2019-11-20 00:00:00', 0),
(21, 2, '2019-11-09 00:00:00', 180000),
(22, 2, '2019-11-05 00:00:00', 180000),
(23, 2, '2019-11-14 00:00:00', 60);

-- --------------------------------------------------------

--
-- Table structure for table `pedidoprovlista`
--

DROP TABLE IF EXISTS `pedidoprovlista`;
CREATE TABLE IF NOT EXISTS `pedidoprovlista` (
  `PedidoProvListaID` int(11) NOT NULL AUTO_INCREMENT,
  `PedidoProvID` int(11) NOT NULL,
  `InsumoID` int(11) NOT NULL,
  `Cantidad` float NOT NULL,
  `ImportePorPieza` float NOT NULL,
  PRIMARY KEY (`PedidoProvListaID`),
  KEY `PedidoProvID` (`PedidoProvID`),
  KEY `InsumoID` (`InsumoID`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `pedidoprovlista`
--

INSERT INTO `pedidoprovlista` (`PedidoProvListaID`, `PedidoProvID`, `InsumoID`, `Cantidad`, `ImportePorPieza`) VALUES
(1, 1, 3, 4, 3),
(2, 2, 3, 2, 3),
(3, 3, 3, 2, 3),
(4, 4, 1, 2, 3),
(5, 5, 1, 2, 3),
(6, 5, 3, 2, 3),
(7, 6, 3, 2, 3),
(8, 7, 4, 6, 60),
(9, 8, 4, 6, 60),
(10, 9, 3, 6, 3),
(11, 10, 3, 6, 3),
(12, 11, 3, 6, 3),
(13, 12, 3, 6, 3),
(14, 13, 3, 6, 3),
(15, 14, 4, 6, 60),
(16, 15, 2, 6, 0),
(17, 16, 2, 9, 0),
(18, 17, 2, 16, 0),
(19, 18, 2, 16, 0),
(20, 19, 4, 3000, 60),
(21, 20, 2, 3000, 0),
(22, 21, 4, 3000, 60),
(23, 22, 4, 3000, 60),
(24, 23, 4, 1, 60);

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `ProductoID` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(256) COLLATE latin1_spanish_ci NOT NULL,
  `Cantidad` float NOT NULL,
  `Precio` float NOT NULL,
  `Stock` int(11) NOT NULL,
  PRIMARY KEY (`ProductoID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`ProductoID`, `Nombre`, `Cantidad`, `Precio`, `Stock`) VALUES
(1, 'sad', 231, 231, 32),
(2, 'sales', 635, 500, 5),
(3, 'what', 100, 500, 1212);

-- --------------------------------------------------------

--
-- Stand-in structure for view `productosalida`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `productosalida`;
CREATE TABLE IF NOT EXISTS `productosalida` (
`VentaID` int(11)
,`Fecha` datetime
,`Total` float
,`Descuento` float
,`ClienteID` int(11)
,`ProductoID` int(11)
,`Nombre` varchar(256)
,`Cantidad` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `productosmasvendidos`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `productosmasvendidos`;
CREATE TABLE IF NOT EXISTS `productosmasvendidos` (
`Nombre` varchar(256)
,`ven` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE IF NOT EXISTS `proveedor` (
  `ProveedorID` int(11) NOT NULL AUTO_INCREMENT,
  `NombreComercial` varchar(256) COLLATE latin1_spanish_ci NOT NULL,
  `RazonSocial` varchar(256) COLLATE latin1_spanish_ci NOT NULL,
  `RFC` varchar(256) COLLATE latin1_spanish_ci NOT NULL,
  `Telefono` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `CorreoElectronico` varchar(256) COLLATE latin1_spanish_ci NOT NULL,
  `Direccion` varchar(256) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`ProveedorID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `proveedor`
--

INSERT INTO `proveedor` (`ProveedorID`, `NombreComercial`, `RazonSocial`, `RFC`, `Telefono`, `CorreoElectronico`, `Direccion`) VALUES
(1, 'fds', 'sad', 'fsd', 'dfs', 'dfs', 'dfs'),
(2, 'Otro', 'kash', 'ildf', '34', 'anf', 'df');

-- --------------------------------------------------------

--
-- Table structure for table `receta`
--

DROP TABLE IF EXISTS `receta`;
CREATE TABLE IF NOT EXISTS `receta` (
  `RecetaID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductoID` int(11) NOT NULL,
  `InsumoID` int(11) NOT NULL,
  `Cantidad` float NOT NULL,
  PRIMARY KEY (`RecetaID`),
  KEY `ProductoID` (`ProductoID`),
  KEY `InsumoID` (`InsumoID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `receta`
--

INSERT INTO `receta` (`RecetaID`, `ProductoID`, `InsumoID`, `Cantidad`) VALUES
(1, 1, 4, 4),
(2, 2, 3, 3),
(3, 2, 2, 3),
(4, 3, 3, 4),
(5, 3, 4, 3);

-- --------------------------------------------------------

--
-- Stand-in structure for view `reporte`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `reporte`;
CREATE TABLE IF NOT EXISTS `reporte` (
`VentaID` int(11)
,`Fecha` datetime
,`Total` float
,`Descuento` float
,`ClienteID` int(11)
,`NombreComercial` varchar(256)
,`RazonSocial` varchar(256)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `reporte1`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `reporte1`;
CREATE TABLE IF NOT EXISTS `reporte1` (
`DetVentaID` int(11)
,`VentaID` int(11)
,`ProductoID` int(11)
,`Cantidad` int(11)
,`PrecioVenta` float
,`Fecha` datetime
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `reporte2`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `reporte2`;
CREATE TABLE IF NOT EXISTS `reporte2` (
`InsumoID` int(11)
,`Descripcion` varchar(255)
,`ProveedorID` int(11)
,`NombreComercial` varchar(256)
,`Fecha` datetime
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `reporte3`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `reporte3`;
CREATE TABLE IF NOT EXISTS `reporte3` (
`PedidoID` int(11)
,`ProductoID` int(11)
,`Status` bit(1)
);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `RoleID` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(256) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`RoleID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`RoleID`, `Nombre`) VALUES
(1, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `unidadpresentacion`
--

DROP TABLE IF EXISTS `unidadpresentacion`;
CREATE TABLE IF NOT EXISTS `unidadpresentacion` (
  `UnidadPresentacionID` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(256) COLLATE latin1_spanish_ci NOT NULL,
  `cantidadMlGInd` float NOT NULL,
  PRIMARY KEY (`UnidadPresentacionID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `unidadpresentacion`
--

INSERT INTO `unidadpresentacion` (`UnidadPresentacionID`, `Nombre`, `cantidadMlGInd`) VALUES
(1, 'Litro', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `auth_Key` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `accessToken` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `auth_Key`, `accessToken`) VALUES
(1, 'ndswii', '123', '', ''),
(2, 'chompdron', 'ANDRESKIRITo4', ' 0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `RoleID` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `UserID` (`UserID`),
  KEY `RoleID` (`RoleID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `UserID`, `RoleID`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `venta`
--

DROP TABLE IF EXISTS `venta`;
CREATE TABLE IF NOT EXISTS `venta` (
  `VentaID` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha` datetime NOT NULL,
  `Total` float NOT NULL,
  `Descuento` float DEFAULT NULL,
  `ClienteID` int(11) NOT NULL,
  PRIMARY KEY (`VentaID`),
  KEY `ClienteID` (`ClienteID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `venta`
--

INSERT INTO `venta` (`VentaID`, `Fecha`, `Total`, `Descuento`, `ClienteID`) VALUES
(1, '2019-11-22 00:00:00', 608155, NULL, 1),
(2, '2019-11-22 00:00:00', 231, NULL, 2),
(3, '2019-10-31 00:00:00', 5555500, NULL, 2),
(4, '2027-05-12 00:00:00', 0, NULL, 2),
(5, '2017-05-11 00:00:00', 2500, NULL, 1),
(6, '2019-11-21 00:00:00', 500, NULL, 2),
(7, '2019-11-13 00:00:00', 500, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ventalista`
--

DROP TABLE IF EXISTS `ventalista`;
CREATE TABLE IF NOT EXISTS `ventalista` (
  `DetVentaID` int(11) NOT NULL AUTO_INCREMENT,
  `VentaID` int(11) NOT NULL,
  `ProductoID` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `PrecioVenta` float NOT NULL,
  PRIMARY KEY (`DetVentaID`),
  KEY `VentaID` (`VentaID`),
  KEY `ProductoID` (`ProductoID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `ventalista`
--

INSERT INTO `ventalista` (`DetVentaID`, `VentaID`, `ProductoID`, `Cantidad`, `PrecioVenta`) VALUES
(1, 1, 2, 1214, 500),
(2, 1, 1, 5, 231),
(3, 2, 1, 1, 231),
(4, 3, 2, 11111, 500),
(5, 5, 2, 5, 500),
(6, 6, 3, 1, 500),
(7, 7, 3, 1, 500);

-- --------------------------------------------------------

--
-- Structure for view `clientesmascompradores`
--
DROP TABLE IF EXISTS `clientesmascompradores`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `clientesmascompradores`  AS  select `cliente`.`NombreComercial` AS `NombreComercial`,count(`venta`.`VentaID`) AS `Ventas` from (`cliente` join `venta` on((`venta`.`ClienteID` = `cliente`.`ClienteID`))) group by `cliente`.`NombreComercial` ;

-- --------------------------------------------------------

--
-- Structure for view `diasconmasventas`
--
DROP TABLE IF EXISTS `diasconmasventas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `diasconmasventas`  AS  select `venta`.`Fecha` AS `fecha`,count(`venta`.`VentaID`) AS `Ventas` from `venta` group by `venta`.`Fecha` ;

-- --------------------------------------------------------

--
-- Structure for view `insumoentrada`
--
DROP TABLE IF EXISTS `insumoentrada`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `insumoentrada`  AS  (select `pedidoprov`.`PedidoProvID` AS `PedidoProvID`,`pedidoprov`.`ProveedorID` AS `ProveedorID`,`pedidoprov`.`Fecha` AS `Fecha`,`pedidoprov`.`Total` AS `Total`,`insumo`.`InsumoID` AS `InsumoID`,`insumo`.`Descripcion` AS `Descripcion`,`pedidoprovlista`.`Cantidad` AS `Cantidad` from ((`pedidoprov` join `pedidoprovlista` on((`pedidoprov`.`PedidoProvID` = `pedidoprovlista`.`PedidoProvID`))) join `insumo` on((`insumo`.`InsumoID` = `pedidoprovlista`.`InsumoID`)))) ;

-- --------------------------------------------------------

--
-- Structure for view `insumosalida`
--
DROP TABLE IF EXISTS `insumosalida`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `insumosalida`  AS  (select `insumo`.`InsumoID` AS `InsumoID`,`pedido`.`FechaInicio` AS `FechaInicio`,`pedido`.`UnidadXLote` AS `UnidadXLote` from ((`insumo` join `receta` on((`insumo`.`InsumoID` = `receta`.`InsumoID`))) join `pedido` on((`receta`.`ProductoID` = `pedido`.`ProductoID`)))) ;

-- --------------------------------------------------------

--
-- Structure for view `productosalida`
--
DROP TABLE IF EXISTS `productosalida`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `productosalida`  AS  (select `venta`.`VentaID` AS `VentaID`,`venta`.`Fecha` AS `Fecha`,`venta`.`Total` AS `Total`,`venta`.`Descuento` AS `Descuento`,`venta`.`ClienteID` AS `ClienteID`,`producto`.`ProductoID` AS `ProductoID`,`producto`.`Nombre` AS `Nombre`,`ventalista`.`Cantidad` AS `Cantidad` from ((`venta` join `ventalista` on((`venta`.`VentaID` = `ventalista`.`VentaID`))) join `producto` on((`producto`.`ProductoID` = `ventalista`.`ProductoID`)))) ;

-- --------------------------------------------------------

--
-- Structure for view `productosmasvendidos`
--
DROP TABLE IF EXISTS `productosmasvendidos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `productosmasvendidos`  AS  select `producto`.`Nombre` AS `Nombre`,sum(`ventalista`.`Cantidad`) AS `ven` from ((`ventalista` join `producto` on((`producto`.`ProductoID` = `ventalista`.`ProductoID`))) join `venta` on((`venta`.`VentaID` = `ventalista`.`DetVentaID`))) group by `producto`.`Nombre` ;

-- --------------------------------------------------------

--
-- Structure for view `reporte`
--
DROP TABLE IF EXISTS `reporte`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reporte`  AS  (select `venta`.`VentaID` AS `VentaID`,`venta`.`Fecha` AS `Fecha`,`venta`.`Total` AS `Total`,`venta`.`Descuento` AS `Descuento`,`venta`.`ClienteID` AS `ClienteID`,`cliente`.`NombreComercial` AS `NombreComercial`,`cliente`.`RazonSocial` AS `RazonSocial` from (`venta` join `cliente` on((`venta`.`ClienteID` = `cliente`.`ClienteID`)))) ;

-- --------------------------------------------------------

--
-- Structure for view `reporte1`
--
DROP TABLE IF EXISTS `reporte1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reporte1`  AS  (select `ventalista`.`DetVentaID` AS `DetVentaID`,`ventalista`.`VentaID` AS `VentaID`,`ventalista`.`ProductoID` AS `ProductoID`,`ventalista`.`Cantidad` AS `Cantidad`,`ventalista`.`PrecioVenta` AS `PrecioVenta`,`venta`.`Fecha` AS `Fecha` from (`ventalista` join `venta` on((`ventalista`.`VentaID` = `venta`.`VentaID`)))) ;

-- --------------------------------------------------------

--
-- Structure for view `reporte2`
--
DROP TABLE IF EXISTS `reporte2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reporte2`  AS  (select `insumo`.`InsumoID` AS `InsumoID`,`insumo`.`Descripcion` AS `Descripcion`,`proveedor`.`ProveedorID` AS `ProveedorID`,`proveedor`.`NombreComercial` AS `NombreComercial`,`pedidoprov`.`Fecha` AS `Fecha` from (((`insumo` join `pedidoprovlista` on((`insumo`.`InsumoID` = `pedidoprovlista`.`InsumoID`))) join `pedidoprov` on((`pedidoprovlista`.`PedidoProvID` = `pedidoprov`.`PedidoProvID`))) join `proveedor` on((`pedidoprov`.`ProveedorID` = `proveedor`.`ProveedorID`)))) ;

-- --------------------------------------------------------

--
-- Structure for view `reporte3`
--
DROP TABLE IF EXISTS `reporte3`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reporte3`  AS  (select `pedido`.`PedidoID` AS `PedidoID`,`pedido`.`ProductoID` AS `ProductoID`,`pedido`.`Status` AS `Status` from `pedido`) ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
