-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 26, 2019 at 09:39 PM
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
  `HorasxSem` float DEFAULT NULL,
  `PagoxHrs` float DEFAULT NULL,
  `UserID` int(11) NOT NULL,
  PRIMARY KEY (`EmpleadoID`),
  KEY `UserID` (`UserID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `empleado`
--

INSERT INTO `empleado` (`EmpleadoID`, `HorasxSem`, `PagoxHrs`, `UserID`) VALUES
(1, 60, 64, 1);

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
  `Stock` float NOT NULL,
  `PrecioXUnidad` float NOT NULL,
  `ProveedorID` int(11) DEFAULT NULL,
  PRIMARY KEY (`InsumoID`),
  KEY `UnidadPresentacionID` (`UnidadPresentacionID`),
  KEY `ProveedorID` (`ProveedorID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `insumo`
--

INSERT INTO `insumo` (`InsumoID`, `Descripcion`, `UnidadPresentacionID`, `Stock`, `PrecioXUnidad`, `ProveedorID`) VALUES
(1, 'dfs', 1, 12, 3, 1),
(2, 'avena', 1, 0, 0, 1),
(3, 'avena', 1, 12, 3, 1);

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
  `Status` bit(1) NOT NULL,
  `FechaStatusFin` datetime NOT NULL,
  PRIMARY KEY (`PedidoID`),
  KEY `pedido_ibfk_1` (`ProductoID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

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
(3, 'what', 100, 500, 9);

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `proveedor`
--

INSERT INTO `proveedor` (`ProveedorID`, `NombreComercial`, `RazonSocial`, `RFC`, `Telefono`, `CorreoElectronico`, `Direccion`) VALUES
(1, 'fds', 'sad', 'fsd', 'dfs', 'dfs', 'dfs');

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `receta`
--

INSERT INTO `receta` (`RecetaID`, `ProductoID`, `InsumoID`, `Cantidad`) VALUES
(1, 1, 1, 4),
(2, 2, 3, 3),
(3, 2, 2, 3);

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

ALTER TABLE insumo add column ProveedorID int

ALTER TABLE insumo add FOREIGN KEY (ProveedorID) REFERENCES Proveedor(ProveedorID)

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `auth_Key`, `accessToken`) VALUES
(1, 'ndswii', '123', '', '');

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `venta`
--

INSERT INTO `venta` (`VentaID`, `Fecha`, `Total`, `Descuento`, `ClienteID`) VALUES
(1, '2019-11-22 00:00:00', 608155, NULL, 1),
(2, '2019-11-22 00:00:00', 231, NULL, 2),
(3, '2019-10-31 00:00:00', 5555500, NULL, 2),
(4, '2027-05-12 00:00:00', 0, NULL, 2),
(5, '2017-05-11 00:00:00', 2500, NULL, 1),
(6, '2019-11-21 00:00:00', 500, NULL, 2);

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `ventalista`
--

INSERT INTO `ventalista` (`DetVentaID`, `VentaID`, `ProductoID`, `Cantidad`, `PrecioVenta`) VALUES
(1, 1, 2, 1214, 500),
(2, 1, 1, 5, 231),
(3, 2, 1, 1, 231),
(4, 3, 2, 11111, 500),
(5, 5, 2, 5, 500),
(6, 6, 3, 1, 500);

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




ALTER TABLE `empleado` ADD `Nombre` VARCHAR(255) NOT NULL AFTER `EmpleadoID`;

<<<<<<< Updated upstream
=======
ALTER TABLE insumo add column ProveedorID int

ALTER TABLE insumo add FOREIGN KEY (ProveedorID) REFERENCES Proveedor(ProveedorID)
>>>>>>> Stashed changes
