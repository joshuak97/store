-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-05-2021 a las 10:27:41
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `store`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abono`
--

CREATE TABLE `abono` (
  `idAbono` int(10) NOT NULL,
  `idVentaC` int(10) NOT NULL,
  `fechaAbono` varchar(20) NOT NULL,
  `abono` decimal(30,2) NOT NULL,
  `restante` decimal(30,2) NOT NULL,
  `proximoAbono` varchar(70) NOT NULL,
  `statusCuenta` varchar(20) NOT NULL,
  `idSucursal` int(11) NOT NULL,
  `idVendedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `abono`
--

INSERT INTO `abono` (`idAbono`, `idVentaC`, `fechaAbono`, `abono`, `restante`, `proximoAbono`, `statusCuenta`, `idSucursal`, `idVendedor`) VALUES
(1, 10, '2020-01-09 00:00:00', '259.72', '779.17', '2020-02-09 ', 'abonada', 1, 0),
(2, 11, '2020-01-09 00:00:00', '284.69', '854.08', '2020-02-09 ', 'abonada', 1, 0),
(3, 12, '2020-01-09 00:00:00', '391.50', '1566.00', '2020-02-09 ', 'abonada', 1, 0),
(4, 13, '2020-01-09 00:00:00', '339.54', '1697.71', '2020-02-09 ', 'abonada', 1, 0),
(5, 14, '2020-01-09 00:00:00', '43.50', '130.50', '2020-02-09 ', 'abonada', 1, 0),
(6, 15, '2020-01-09 00:00:00', '8.70', '34.80', '2020-02-09 ', 'abonada', 1, 0),
(7, 16, '2020-01-09 00:00:00', '326.25', '326.25', '2020-02-09 ', 'abonada', 1, 0),
(8, 10, '2020-01-13 00:00:00', '100.00', '679.17', '02-3-09 ', 'abonada', 1, 0),
(9, 10, '2020-01-13 00:00:00', '700.00', '-20.83', '3-4-09 ', 'abonada', 1, 0),
(10, 10, '2020-01-13 00:00:00', '700.00', '0.00', '4-5-09 ', 'pagada', 1, 0),
(11, 17, '2020-01-15 00:00:00', '438.28', '1753.10', '2020-02-15 ', 'abonada', 1, 0),
(12, 16, '2020-01-15 00:00:00', '100.00', '226.25', '2020-03-09 ', 'abonada', 1, 0),
(13, 17, '2020-01-15 00:00:00', '500.00', '1253.10', '2020-03-15 ', 'abonada', 1, 0),
(14, 17, '0000-00-00 00:00:00', '100.00', '1153.10', '2020-04-15 ', 'abonada', 1, 0),
(15, 17, '0000-00-00 00:00:00', '150.00', '1003.10', '2020-05-15 ', 'abonada', 1, 0),
(16, 17, '2020-01-15 13:27:01', '600.00', '403.10', '2020-06-15 ', 'abonada', 1, 0),
(17, 17, '2020-01-15 00:00:00', '500.00', '0.00', '2020-07-15 ', 'pagada', 1, 0),
(18, 16, '2020-01-15 , 13:31:1', '100.00', '126.25', '2020-04-09 ', 'abonada', 1, 0),
(19, 16, '2020-01-15 , 13:32:2', '200.00', '0.00', '2020-05-09 ', 'pagada', 1, 0),
(20, 15, '2020-01-15 , 13:36:2', '34.80', '0.00', '2020-03-09 ', 'pagada', 1, 0),
(21, 18, '2020-01-15 , 16:18:4', '575.25', '1725.74', '2020-02-15 ', 'abonada', 1, 0),
(22, 19, '2020-01-16 , 18:30:1', '50.00', '199.98', '2020-02-16 ', 'abonada', 2, 0),
(23, 20, '2020-01-16 , 19:06:4', '435.00', '1305.00', '2020-02-16 ', 'abonada', 2, 0),
(24, 21, '2020-01-16 , 19:15:0', '150.80', '603.20', '2020-02-16 ', 'abonada', 2, 0),
(25, 22, '2020-01-17 , 17:56:4', '1663.50', '6653.99', '2020-02-17 ', 'abonada', 4, 0),
(26, 24, '2020-01-20 , 10:05:3', '453.50', '453.50', '2020-02-20 ', 'abonada', 2, 0),
(27, 25, '2020-01-20 , 10:17:2', '326.25', '326.25', '2020-02-20 ', 'abonada', 1, 0),
(28, 26, '2020-01-20 , 10:20:0', '1095.49', '1095.49', '2020-02-20 ', 'abonada', 2, 0),
(29, 27, '2020-01-20 , 10:30:3', '423.24', '423.24', '2020-02-20 ', 'abonada', 1, 0),
(30, 28, '2020-01-20 , 10:44:5', '54.16', '108.33', '2020-02-20 ', 'abonada', 2, 0),
(31, 29, '2020-01-20 , 10:48:0', '474.88', '474.88', '2020-02-20 ', 'abonada', 2, 0),
(32, 30, '2020-01-20 , 10:53:2', '1703.75', '1703.75', '2020-02-20 ', 'abonada', 1, 0),
(33, 31, '2020-01-20 , 10:54:5', '97.88', '97.88', '2020-02-20 ', 'abonada', 3, 0),
(34, 32, '2020-01-20 , 10:56:2', '232.50', '232.50', '2020-02-20 ', 'abonada', 3, 0),
(35, 33, '2020-01-20 , 10:58:0', '663.22', '663.22', '2020-02-20 ', 'abonada', 1, 0),
(36, 38, '2020-01-20 , 14:16:2', '0.00', '594.50', '2020-02-20 ', 'abonada', 2, 0),
(37, 39, '2020-01-20 , 14:31:0', '0.00', '699.97', '2020-02-20 ', 'abonada', 2, 0),
(38, 40, '2020-01-21 , 09:45:5', '0.00', '943.24', '2020-02-21 ', 'abonada', 2, 0),
(39, 40, '2020-01-23 , 13:16:1', '100.00', '843.24', '2020-03-21 ', 'abonada', 1, 0),
(40, 40, '2020-01-23 , 18:40:3', '300.00', '543.24', '2020-04-21 ', 'abonada', 1, 0),
(41, 40, '2020-01-23 , 18:44:4', '100.00', '443.24', '2020-05-21 ', 'abonada', 1, 0),
(42, 38, '2020-01-23 , 18:46:1', '100.00', '494.50', '2020-03-20 ', 'abonada', 1, 0),
(43, 41, '2020-01-24 , 13:13:5', '0.00', '943.24', '2020-02-24 ', 'abonada', 2, 0),
(50, 50, '2020-01-31 , 14:19:1', '0.00', '6260.00', '2020-03-02 ', 'abonada', 2, 0),
(51, 47, '2020-02-04 , 09:53:3', '0.00', '0.00', '-01-', 'pagada', 1, 0),
(52, 41, '2020-02-04 , 09:55:3', '500.00', '443.24', '2020-03-24 ', 'abonada', 1, 0),
(53, 41, '2020-02-04 , 10:04:0', '100.00', '343.24', '2020-04-24 ', 'abonada', 1, 10),
(54, 51, '2020-02-04 , 10:04:5', '0.00', '442.25', '2020-03-04 ', 'abonada', 1, 10),
(55, 51, '2020-02-04 , 10:05:4', '300.00', '142.25', '2020-04-04 ', 'abonada', 1, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `baja_falla`
--

CREATE TABLE `baja_falla` (
  `idBaja` int(11) NOT NULL,
  `idProd` int(11) NOT NULL,
  `fechaBaja` varchar(30) CHARACTER SET latin1 NOT NULL,
  `descripcionBaja` varchar(300) CHARACTER SET latin1 NOT NULL,
  `cantidadBaja` int(11) NOT NULL,
  `usuarioBaja` int(11) NOT NULL,
  `idSucursalBaja` int(11) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `baja_falla`
--

INSERT INTO `baja_falla` (`idBaja`, `idProd`, `fechaBaja`, `descripcionBaja`, `cantidadBaja`, `usuarioBaja`, `idSucursalBaja`, `estado`) VALUES
(1, 43, '2019-12-17 09:56:24', 'efdsdfe', 1, 5, 3, ''),
(2, 0, '2019-12-17 10:36:15', 'fsdfsff', 1, 5, 3, ''),
(3, 14, '2019-12-17 10:39:09', 'sfsdfds', 1, 5, 3, 'Rechazado'),
(4, 23, '2019-12-23 17:22:23', 'roto', 1, 5, 3, 'Aprobado'),
(5, 13, '2019-12-23 17:31:28', 'roto', 1, 5, 3, 'Aprobado'),
(6, 174, '2019-12-23 17:33:42', 'roto', 1, 10, 1, 'Aprobado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(10) NOT NULL,
  `descripcionCat` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `descripcionCat`) VALUES
(1, 'ACCESORIOS'),
(2, 'CCTV'),
(3, 'CONSUMIBLES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(10) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `NombreCompleto` varchar(100) NOT NULL,
  `Apellido` varchar(70) NOT NULL,
  `RFC` varchar(30) NOT NULL,
  `Calle` varchar(200) NOT NULL,
  `noExterior` varchar(10) NOT NULL,
  `noInterior` varchar(20) NOT NULL,
  `colonia` varchar(10) NOT NULL,
  `municipio` varchar(60) NOT NULL,
  `estado` varchar(60) NOT NULL,
  `pais` varchar(20) NOT NULL,
  `codigoPostal` varchar(10) NOT NULL,
  `Telefono` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `Nombre`, `NombreCompleto`, `Apellido`, `RFC`, `Calle`, `noExterior`, `noInterior`, `colonia`, `municipio`, `estado`, `pais`, `codigoPostal`, `Telefono`, `Email`) VALUES
(1, 'CAMARA NACIONAL DE COMERCIO', 'CAMARA NACIONAL DE COMERCIO Y SERVICIOS DE TUXPAM', 'Y SERVICIOS DE TUXPAM', 'CNC41114737', 'BOULEVARD JESUS REYES HEROLES  ', '9', 'ALTOS ', 'CENTRO', 'TUXPAM ', 'Veracruz-Llave', 'Mexico', '92800', '78341645', ':)'),
(2, 'Josue', 'Josue Cruz Santiago', 'Cruz Santiago', 'CUSJ9707119E7', 'Magnolia ', '1', 'altos', 'Centro', 'Alamo, Temapache', 'Veracruz-Llave', 'Mexico', '92730', '7658335568', 'j_cruz1997@outlook.es');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes_online`
--

CREATE TABLE `clientes_online` (
  `idClienteO` int(11) NOT NULL,
  `emailO` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `nombreO` varchar(50) NOT NULL,
  `apellidosO` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `complementos_pagos`
--

CREATE TABLE `complementos_pagos` (
  `idComplementoP` int(11) NOT NULL,
  `folio_complemento` int(11) NOT NULL,
  `numero_pago` int(11) NOT NULL,
  `forma_pago` varchar(20) NOT NULL,
  `total_pago` decimal(30,2) NOT NULL,
  `idAbono` int(11) NOT NULL,
  `folio_fiscalCP` text NOT NULL,
  `urlAbono` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cortecaja`
--

CREATE TABLE `cortecaja` (
  `idCorte` int(11) NOT NULL,
  `fecha` varchar(30) NOT NULL,
  `monto` decimal(30,2) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cortecaja`
--

INSERT INTO `cortecaja` (`idCorte`, `fecha`, `monto`, `estado`, `idUsuario`) VALUES
(1, '2019-08-05 , 10:00:14', '300.00', 'abierta', 5),
(2, '2019-08-05 , 10:00:28', '300.00', 'cerrada', 5),
(3, '2019-08-05 , 10:00:52', '0.00', 'abierta', 5),
(4, '2019-08-05 , 10:02:04', '20.00', 'cerrada', 5),
(6, '2019-08-06 , 12:11:51', '1000.00', 'abierta', 4),
(7, '2019-08-06 , 12:27:58', '0.00', 'abierta', 5),
(8, '2019-08-23 , 09:58:58', '1.00', 'abierta', 10),
(9, '2019-11-22 , 14:17:48', '100.00', 'abierta', 9),
(10, '2019-11-22 , 14:22:24', '1679.48', 'cerrada', 9),
(11, '2020-01-27 , 09:45:43', '100.00', 'abierta', 9),
(12, '2020-01-31 , 16:12:50', '411510.64', 'cerrada', 10),
(13, '2020-01-31 , 16:13:43', '100.00', 'abierta', 10),
(14, '2020-02-04 , 10:12:50', '1130.00', 'cerrada', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion`
--

CREATE TABLE `cotizacion` (
  `idCotizacion` int(10) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `idProd` varchar(1000) NOT NULL,
  `FechaCot` varchar(150) NOT NULL,
  `subTotal` decimal(30,2) NOT NULL,
  `idVendedor` int(10) NOT NULL,
  `estatus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cotizacion`
--

INSERT INTO `cotizacion` (`idCotizacion`, `titulo`, `idProd`, `FechaCot`, `subTotal`, `idVendedor`, `estatus`) VALUES
(1, 'MIGUEL', '88,1', '2019-03-29 , 13:59:00', '245.00', 0, 'Pendiente'),
(2, 'prueba', '114,1', '2019-04-01 , 13:42:20', '1160.00', 0, 'Pendiente'),
(3, 'Prueba2', '159,1', '2019-04-29 , 11:25:53', '480.00', 0, 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentaspagar`
--

CREATE TABLE `cuentaspagar` (
  `folio_concepto` varchar(150) NOT NULL,
  `idCuentaP` int(11) NOT NULL,
  `concepto` varchar(20) NOT NULL,
  `costoCompra` decimal(30,2) NOT NULL,
  `comprobante_compra` varchar(200) NOT NULL,
  `fecha_compra` varchar(50) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idProveedor` int(11) NOT NULL,
  `estado_cuentaP` varchar(15) NOT NULL,
  `idSucursal` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuentaspagar`
--

INSERT INTO `cuentaspagar` (`folio_concepto`, `idCuentaP`, `concepto`, `costoCompra`, `comprobante_compra`, `fecha_compra`, `fecha_registro`, `idProveedor`, `estado_cuentaP`, `idSucursal`, `idUsuario`) VALUES
('87897', 11, 'nota', '530.72', 'nota-87897.png', '2020-01-21', '2020-01-21 06:00:00', 5, 'pagado', 1, 5),
('989', 12, 'nota', '419.99', 'nota-989.jpg', '2020-01-24', '2020-01-24 06:00:00', 4, 'pagado', 1, 10),
('89080', 13, 'factura', '80.00', '', '2020-01-03', '2020-01-03 06:00:00', 9, 'pagado', 1, 10),
('789789', 14, 'factura', '969.98', 'factura-789789.jpeg', '2020-01-03', '0000-00-00 00:00:00', 7, 'pagado', 1, 10),
('9789', 15, 'nota', '140.00', 'nota-9789.jpg', '2020-01-15', '2020-01-03 20:44:35', 7, 'pagado', 1, 10),
('89899', 16, 'nota', '350.00', '', '2020-01-03', '2020-01-03 20:46:29', 4, 'pagado', 1, 10),
('456783', 17, 'nota', '1127.68', 'nota-456783.pdf', '2020-01-13', '2020-01-06 16:57:30', 8, 'pagado', 1, 5),
('7897987', 18, 'nota', '132.68', '', '2020-01-10', '2020-01-11 00:09:25', 6, 'pagado', 1, 5),
('79897', 19, 'nota', '132.68', '', '2020-01-10', '2020-01-11 00:14:26', 4, 'pagado', 1, 5),
('8989089', 20, 'nota', '452.68', '', '2020-01-10', '2020-01-11 00:18:14', 4, 'pagado', 1, 5),
('7980', 21, 'nota', '439.99', '', '2020-01-10', '2020-01-11 00:56:59', 4, 'pagado', 1, 10),
('89080', 22, 'nota', '65.00', '', '2020-01-10', '2020-01-11 01:15:40', 4, 'pagado', 1, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devoluciones`
--

CREATE TABLE `devoluciones` (
  `idDevolucion` int(11) NOT NULL,
  `folioVenta` varchar(20) NOT NULL,
  `fechaDevolucion` varchar(40) NOT NULL,
  `descripcion` text NOT NULL,
  `costoDevolucion` decimal(3,2) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `idSucursal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `devoluciones`
--

INSERT INTO `devoluciones` (`idDevolucion`, `folioVenta`, `fechaDevolucion`, `descripcion`, `costoDevolucion`, `usuario`, `idSucursal`) VALUES
(1, '191210164837', '2019-12-16 , 11:50:54', '493,1', '9.99', 'prueba', 1),
(2, '191122141752', '2019-12-16 , 13:57:53', '335,1 185,1 197,1 ', '9.99', 'prueba', 1),
(3, '190612111546', '2019-12-16 , 16:44:32', '', '0.00', 'prueba', 1),
(4, '190528120403', '2019-12-16 , 16:53:44', '', '0.00', 'prueba', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devoluciones_por_fallas`
--

CREATE TABLE `devoluciones_por_fallas` (
  `idDevolucionFalla` int(11) NOT NULL,
  `folioVentaDF` varchar(20) NOT NULL,
  `fechaDevolucionDF` varchar(40) NOT NULL,
  `descripcionDF` text NOT NULL,
  `costoDevolucionDF` decimal(3,2) NOT NULL,
  `usuarioDF` int(30) NOT NULL,
  `idSucursalDF` int(11) NOT NULL,
  `estadoDF` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones_clientes`
--

CREATE TABLE `direcciones_clientes` (
  `idDireccion` int(11) NOT NULL,
  `direccionO` int(11) NOT NULL,
  `idClienteO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada_producto`
--

CREATE TABLE `entrada_producto` (
  `idEntrada` int(11) NOT NULL,
  `idCuentaP` int(11) NOT NULL,
  `idProd` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `entrada_producto`
--

INSERT INTO `entrada_producto` (`idEntrada`, `idCuentaP`, `idProd`, `cantidad`) VALUES
(24, 17, 218, 3),
(25, 17, 233, 4),
(26, 17, 241, 5),
(27, 18, 218, 4),
(28, 19, 218, 4),
(29, 20, 218, 4),
(30, 20, 226, 2),
(31, 21, 167, 4),
(32, 21, 184, 3),
(33, 22, 174, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equivalencia`
--

CREATE TABLE `equivalencia` (
  `idEquivalencia` int(10) NOT NULL,
  `equivalencia` longtext NOT NULL,
  `desEquivalencia` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `idEstado` int(11) NOT NULL,
  `ubicacionpaisid` int(11) DEFAULT NULL,
  `estadonombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`idEstado`, `ubicacionpaisid`, `estadonombre`) VALUES
(1, 3, 'Azerbaijan'),
(2, 3, 'Nargorni Karabakh'),
(3, 3, 'Nakhichevanskaya Region'),
(4, 4, 'Anguilla'),
(5, 7, 'Brestskaya obl.'),
(6, 7, 'Vitebskaya obl.'),
(7, 7, 'Gomelskaya obl.'),
(8, 7, 'Grodnenskaya obl.'),
(9, 7, 'Minskaya obl.'),
(10, 7, 'Mogilevskaya obl.'),
(11, 8, 'Belize'),
(12, 10, 'Hamilton'),
(13, 15, 'Dong Bang Song Cuu Long'),
(14, 15, 'Dong Bang Song Hong'),
(15, 15, 'Dong Nam Bo'),
(16, 15, 'Duyen Hai Mien Trung'),
(17, 15, 'Khu Bon Cu'),
(18, 15, 'Mien Nui Va Trung Du'),
(19, 15, 'Thai Nguyen'),
(20, 16, 'Artibonite'),
(21, 16, 'Grand&#039;Anse'),
(22, 16, 'North West'),
(23, 16, 'West'),
(24, 16, 'South'),
(25, 16, 'South East'),
(26, 17, 'Grande-Terre'),
(27, 17, 'Basse-Terre'),
(28, 21, 'Abkhazia'),
(29, 21, 'Ajaria'),
(30, 21, 'Georgia'),
(31, 21, 'South Ossetia'),
(32, 23, 'Al Q├ä┬ühira'),
(33, 23, 'Aswan'),
(34, 23, 'Asyut'),
(35, 23, 'Beni Suef'),
(36, 23, 'Gharbia'),
(37, 23, 'Damietta'),
(38, 24, 'Southern District'),
(39, 24, 'Central District'),
(40, 24, 'Northern District'),
(41, 24, 'Haifa'),
(42, 24, 'Tel Aviv'),
(43, 24, 'Jerusalem'),
(44, 25, 'Bangala'),
(45, 25, 'Chhattisgarh'),
(46, 25, 'Karnataka'),
(47, 25, 'Uttaranchal'),
(48, 25, 'Andhara Pradesh'),
(49, 25, 'Assam'),
(50, 25, 'Bihar'),
(51, 25, 'Gujarat'),
(52, 25, 'Jammu and Kashmir'),
(53, 25, 'Kerala'),
(54, 25, 'Madhya Pradesh'),
(55, 25, 'Manipur'),
(56, 25, 'Maharashtra'),
(57, 25, 'Megahalaya'),
(58, 25, 'Orissa'),
(59, 25, 'Punjab'),
(60, 25, 'Pondisheri'),
(61, 25, 'Rajasthan'),
(62, 25, 'Tamil Nadu'),
(63, 25, 'Tripura'),
(64, 25, 'Uttar Pradesh'),
(65, 25, 'Haryana'),
(66, 25, 'Chandigarh'),
(67, 26, 'Azarbayjan-e Khavari'),
(68, 26, 'Esfahan'),
(69, 26, 'Hamadan'),
(70, 26, 'Kordestan'),
(71, 26, 'Markazi'),
(72, 26, 'Sistan-e Baluches'),
(73, 26, 'Yazd'),
(74, 26, 'Kerman'),
(75, 26, 'Kermanshakhan'),
(76, 26, 'Mazenderan'),
(77, 26, 'Tehran'),
(78, 26, 'Fars'),
(79, 26, 'Horasan'),
(80, 26, 'Husistan'),
(81, 30, 'Aktyubinskaya obl.'),
(82, 30, 'Alma-Atinskaya obl.'),
(83, 30, 'Vostochno-Kazahstanskaya obl.'),
(84, 30, 'Gurevskaya obl.'),
(85, 30, 'Zhambylskaya obl. (Dzhambulskaya obl.)'),
(86, 30, 'Dzhezkazganskaya obl.'),
(87, 30, 'Karagandinskaya obl.'),
(88, 30, 'Kzyl-Ordinskaya obl.'),
(89, 30, 'Kokchetavskaya obl.'),
(90, 30, 'Kustanaiskaya obl.'),
(91, 30, 'Mangystauskaya (Mangyshlakskaya obl.)'),
(92, 30, 'Pavlodarskaya obl.'),
(93, 30, 'Severo-Kazahstanskaya obl.'),
(94, 30, 'Taldy-Kurganskaya obl.'),
(95, 30, 'Turgaiskaya obl.'),
(96, 30, 'Akmolinskaya obl. (Tselinogradskaya obl.)'),
(97, 30, 'Chimkentskaya obl.'),
(98, 31, 'Littoral'),
(99, 31, 'Southwest Region'),
(100, 31, 'North'),
(101, 31, 'Central'),
(102, 33, 'Government controlled area'),
(103, 33, 'Turkish controlled area'),
(104, 34, 'Issik Kulskaya Region'),
(105, 34, 'Kyrgyzstan'),
(106, 34, 'Narinskaya Region'),
(107, 34, 'Oshskaya Region'),
(108, 34, 'Tallaskaya Region'),
(109, 37, 'al-Jahra'),
(110, 37, 'al-Kuwait'),
(111, 38, 'Latviya'),
(112, 39, 'Tarabulus'),
(113, 39, 'Bengasi'),
(114, 40, 'Litva'),
(115, 43, 'Moldova'),
(116, 45, 'Auckland'),
(117, 45, 'Bay of Plenty'),
(118, 45, 'Canterbury'),
(119, 45, 'Gisborne'),
(120, 45, 'Hawke&#039;s Bay'),
(121, 45, 'Manawatu-Wanganui'),
(122, 45, 'Marlborough'),
(123, 45, 'Nelson'),
(124, 45, 'Northland'),
(125, 45, 'Otago'),
(126, 45, 'Southland'),
(127, 45, 'Taranaki'),
(128, 45, 'Tasman'),
(129, 45, 'Waikato'),
(130, 45, 'Wellington'),
(131, 45, 'West Coast'),
(132, 49, 'Saint-Denis'),
(133, 50, 'Altaiskii krai'),
(134, 50, 'Amurskaya obl.'),
(135, 50, 'Arhangelskaya obl.'),
(136, 50, 'Astrahanskaya obl.'),
(137, 50, 'Bashkiriya obl.'),
(138, 50, 'Belgorodskaya obl.'),
(139, 50, 'Bryanskaya obl.'),
(140, 50, 'Buryatiya'),
(141, 50, 'Vladimirskaya obl.'),
(142, 50, 'Volgogradskaya obl.'),
(143, 50, 'Vologodskaya obl.'),
(144, 50, 'Voronezhskaya obl.'),
(145, 50, 'Nizhegorodskaya obl.'),
(146, 50, 'Dagestan'),
(147, 50, 'Evreiskaya obl.'),
(148, 50, 'Ivanovskaya obl.'),
(149, 50, 'Irkutskaya obl.'),
(150, 50, 'Kabardino-Balkariya'),
(151, 50, 'Kaliningradskaya obl.'),
(152, 50, 'Tverskaya obl.'),
(153, 50, 'Kalmykiya'),
(154, 50, 'Kaluzhskaya obl.'),
(155, 50, 'Kamchatskaya obl.'),
(156, 50, 'Kareliya'),
(157, 50, 'Kemerovskaya obl.'),
(158, 50, 'Kirovskaya obl.'),
(159, 50, 'Komi'),
(160, 50, 'Kostromskaya obl.'),
(161, 50, 'Krasnodarskii krai'),
(162, 50, 'Krasnoyarskii krai'),
(163, 50, 'Kurganskaya obl.'),
(164, 50, 'Kurskaya obl.'),
(165, 50, 'Lipetskaya obl.'),
(166, 50, 'Magadanskaya obl.'),
(167, 50, 'Marii El'),
(168, 50, 'Mordoviya'),
(169, 50, 'Moscow &amp; Moscow Region'),
(170, 50, 'Murmanskaya obl.'),
(171, 50, 'Novgorodskaya obl.'),
(172, 50, 'Novosibirskaya obl.'),
(173, 50, 'Omskaya obl.'),
(174, 50, 'Orenburgskaya obl.'),
(175, 50, 'Orlovskaya obl.'),
(176, 50, 'Penzenskaya obl.'),
(177, 50, 'Permskiy krai'),
(178, 50, 'Primorskii krai'),
(179, 50, 'Pskovskaya obl.'),
(180, 50, 'Rostovskaya obl.'),
(181, 50, 'Ryazanskaya obl.'),
(182, 50, 'Samarskaya obl.'),
(183, 50, 'Saint-Petersburg and Region'),
(184, 50, 'Saratovskaya obl.'),
(185, 50, 'Saha (Yakutiya)'),
(186, 50, 'Sahalin'),
(187, 50, 'Sverdlovskaya obl.'),
(188, 50, 'Severnaya Osetiya'),
(189, 50, 'Smolenskaya obl.'),
(190, 50, 'Stavropolskii krai'),
(191, 50, 'Tambovskaya obl.'),
(192, 50, 'Tatarstan'),
(193, 50, 'Tomskaya obl.'),
(195, 50, 'Tulskaya obl.'),
(196, 50, 'Tyumenskaya obl. i Hanty-Mansiiskii AO'),
(197, 50, 'Udmurtiya'),
(198, 50, 'Ulyanovskaya obl.'),
(199, 50, 'Uralskaya obl.'),
(200, 50, 'Habarovskii krai'),
(201, 50, 'Chelyabinskaya obl.'),
(202, 50, 'Checheno-Ingushetiya'),
(203, 50, 'Chitinskaya obl.'),
(204, 50, 'Chuvashiya'),
(205, 50, 'Yaroslavskaya obl.'),
(206, 51, 'Ahuachapan'),
(207, 51, 'Cuscatlan'),
(208, 51, 'La Libertad'),
(209, 51, 'La Paz'),
(210, 51, 'La Union'),
(211, 51, 'San Miguel'),
(212, 51, 'San Salvador'),
(213, 51, 'Santa Ana'),
(214, 51, 'Sonsonate'),
(215, 54, 'Paramaribo'),
(216, 56, 'Gorno-Badakhshan Region'),
(217, 56, 'Kuljabsk Region'),
(218, 56, 'Kurgan-Tjube Region'),
(219, 56, 'Sughd Region'),
(220, 56, 'Tajikistan'),
(221, 57, 'Ashgabat Region'),
(222, 57, 'Krasnovodsk Region'),
(223, 57, 'Mary Region'),
(224, 57, 'Tashauz Region'),
(225, 57, 'Chardzhou Region'),
(226, 58, 'Grand Turk'),
(227, 59, 'Bartin'),
(228, 59, 'Bayburt'),
(229, 59, 'Karabuk'),
(230, 59, 'Adana'),
(231, 59, 'Aydin'),
(232, 59, 'Amasya'),
(233, 59, 'Ankara'),
(234, 59, 'Antalya'),
(235, 59, 'Artvin'),
(236, 59, 'Afion'),
(237, 59, 'Balikesir'),
(238, 59, 'Bilecik'),
(239, 59, 'Bursa'),
(240, 59, 'Gaziantep'),
(241, 59, 'Denizli'),
(242, 59, 'Izmir'),
(243, 59, 'Isparta'),
(244, 59, 'Icel'),
(245, 59, 'Kayseri'),
(246, 59, 'Kars'),
(247, 59, 'Kodjaeli'),
(248, 59, 'Konya'),
(249, 59, 'Kirklareli'),
(250, 59, 'Kutahya'),
(251, 59, 'Malatya'),
(252, 59, 'Manisa'),
(253, 59, 'Sakarya'),
(254, 59, 'Samsun'),
(255, 59, 'Sivas'),
(256, 59, 'Istanbul'),
(257, 59, 'Trabzon'),
(258, 59, 'Corum'),
(259, 59, 'Edirne'),
(260, 59, 'Elazig'),
(261, 59, 'Erzincan'),
(262, 59, 'Erzurum'),
(263, 59, 'Eskisehir'),
(264, 60, 'Jinja'),
(265, 60, 'Kampala'),
(266, 61, 'Andijon Region'),
(267, 61, 'Buxoro Region'),
(268, 61, 'Jizzac Region'),
(269, 61, 'Qaraqalpaqstan'),
(270, 61, 'Qashqadaryo Region'),
(271, 61, 'Navoiy Region'),
(272, 61, 'Namangan Region'),
(273, 61, 'Samarqand Region'),
(274, 61, 'Surxondaryo Region'),
(275, 61, 'Sirdaryo Region'),
(276, 61, 'Tashkent Region'),
(277, 61, 'Fergana Region'),
(278, 61, 'Xorazm Region'),
(279, 62, 'Vinnitskaya obl.'),
(280, 62, 'Volynskaya obl.'),
(281, 62, 'Dnepropetrovskaya obl.'),
(282, 62, 'Donetskaya obl.'),
(283, 62, 'Zhitomirskaya obl.'),
(284, 62, 'Zakarpatskaya obl.'),
(285, 62, 'Zaporozhskaya obl.'),
(286, 62, 'Ivano-Frankovskaya obl.'),
(287, 62, 'Kievskaya obl.'),
(288, 62, 'Kirovogradskaya obl.'),
(289, 62, 'Krymskaya obl.'),
(290, 62, 'Luganskaya obl.'),
(291, 62, 'Lvovskaya obl.'),
(292, 62, 'Nikolaevskaya obl.'),
(293, 62, 'Odesskaya obl.'),
(294, 62, 'Poltavskaya obl.'),
(295, 62, 'Rovenskaya obl.'),
(296, 62, 'Sumskaya obl.'),
(297, 62, 'Ternopolskaya obl.'),
(298, 62, 'Harkovskaya obl.'),
(299, 62, 'Hersonskaya obl.'),
(300, 62, 'Hmelnitskaya obl.'),
(301, 62, 'Cherkasskaya obl.'),
(302, 62, 'Chernigovskaya obl.'),
(303, 62, 'Chernovitskaya obl.'),
(304, 68, 'Estoniya'),
(305, 69, 'Cheju'),
(306, 69, 'Chollabuk'),
(307, 69, 'Chollanam'),
(308, 69, 'Chungcheongbuk'),
(309, 69, 'Chungcheongnam'),
(310, 69, 'Incheon'),
(311, 69, 'Kangweon'),
(312, 69, 'Kwangju'),
(313, 69, 'Kyeonggi'),
(314, 69, 'Kyeongsangbuk'),
(315, 69, 'Kyeongsangnam'),
(316, 69, 'Pusan'),
(317, 69, 'Seoul'),
(318, 69, 'Taegu'),
(319, 69, 'Taejeon'),
(320, 69, 'Ulsan'),
(321, 70, 'Aichi'),
(322, 70, 'Akita'),
(323, 70, 'Aomori'),
(324, 70, 'Wakayama'),
(325, 70, 'Gifu'),
(326, 70, 'Gunma'),
(327, 70, 'Ibaraki'),
(328, 70, 'Iwate'),
(329, 70, 'Ishikawa'),
(330, 70, 'Kagawa'),
(331, 70, 'Kagoshima'),
(332, 70, 'Kanagawa'),
(333, 70, 'Kyoto'),
(334, 70, 'Kochi'),
(335, 70, 'Kumamoto'),
(336, 70, 'Mie'),
(337, 70, 'Miyagi'),
(338, 70, 'Miyazaki'),
(339, 70, 'Nagano'),
(340, 70, 'Nagasaki'),
(341, 70, 'Nara'),
(342, 70, 'Niigata'),
(343, 70, 'Okayama'),
(344, 70, 'Okinawa'),
(345, 70, 'Osaka'),
(346, 70, 'Saga'),
(347, 70, 'Saitama'),
(348, 70, 'Shiga'),
(349, 70, 'Shizuoka'),
(350, 70, 'Shimane'),
(351, 70, 'Tiba'),
(352, 70, 'Tokyo'),
(353, 70, 'Tokushima'),
(354, 70, 'Tochigi'),
(355, 70, 'Tottori'),
(356, 70, 'Toyama'),
(357, 70, 'Fukui'),
(358, 70, 'Fukuoka'),
(359, 70, 'Fukushima'),
(360, 70, 'Hiroshima'),
(361, 70, 'Hokkaido'),
(362, 70, 'Hyogo'),
(363, 70, 'Yoshimi'),
(364, 70, 'Yamagata'),
(365, 70, 'Yamaguchi'),
(366, 70, 'Yamanashi'),
(368, 73, 'Hong Kong'),
(369, 74, 'Indonesia'),
(370, 75, 'Jordan'),
(371, 76, 'Malaysia'),
(372, 77, 'Singapore'),
(373, 78, 'Taiwan'),
(374, 30, 'Kazahstan'),
(375, 62, 'Ukraina'),
(376, 25, 'India'),
(377, 23, 'Egypt'),
(378, 106, 'Damascus'),
(379, 131, 'Isle of Man'),
(380, 30, 'Zapadno-Kazahstanskaya obl.'),
(381, 50, 'Adygeya'),
(382, 50, 'Hakasiya'),
(383, 93, 'Dubai'),
(384, 50, 'Chukotskii AO'),
(385, 99, 'Beirut'),
(386, 137, 'Tegucigalpa'),
(387, 138, 'Santo Domingo'),
(388, 139, 'Ulan Bator'),
(389, 23, 'Sinai'),
(390, 140, 'Baghdad'),
(391, 140, 'Basra'),
(392, 140, 'Mosul'),
(393, 141, 'Johannesburg'),
(394, 104, 'Morocco'),
(395, 104, 'Tangier'),
(396, 50, 'Yamalo-Nenetskii AO'),
(397, 122, 'Tunisia'),
(398, 92, 'Thailand'),
(399, 117, 'Mozambique'),
(400, 84, 'Korea'),
(401, 87, 'Pakistan'),
(402, 142, 'Aruba'),
(403, 80, 'Bahamas'),
(404, 69, 'South Korea'),
(405, 132, 'Jamaica'),
(406, 93, 'Sharjah'),
(407, 93, 'Abu Dhabi'),
(409, 24, 'Ramat Hagolan'),
(410, 115, 'Nigeria'),
(411, 64, 'Ain'),
(412, 64, 'Haute-Savoie'),
(413, 64, 'Aisne'),
(414, 64, 'Allier'),
(415, 64, 'Alpes-de-Haute-Provence'),
(416, 64, 'Hautes-Alpes'),
(417, 64, 'Alpes-Maritimes'),
(418, 64, 'Ard&egrave;che'),
(419, 64, 'Ardennes'),
(420, 64, 'Ari&egrave;ge'),
(421, 64, 'Aube'),
(422, 64, 'Aude'),
(423, 64, 'Aveyron'),
(424, 64, 'Bouches-du-Rh&ocirc;ne'),
(425, 64, 'Calvados'),
(426, 64, 'Cantal'),
(427, 64, 'Charente'),
(428, 64, 'Charente Maritime'),
(429, 64, 'Cher'),
(430, 64, 'Corr&egrave;ze'),
(431, 64, 'Dordogne'),
(432, 64, 'Corse'),
(433, 64, 'C&ocirc;te d&#039;Or'),
(434, 64, 'Sa&ocirc;ne et Loire'),
(435, 64, 'C&ocirc;tes d&#039;Armor'),
(436, 64, 'Creuse'),
(437, 64, 'Doubs'),
(438, 64, 'Dr&ocirc;me'),
(439, 64, 'Eure'),
(440, 64, 'Eure-et-Loire'),
(441, 64, 'Finist&egrave;re'),
(442, 64, 'Gard'),
(443, 64, 'Haute-Garonne'),
(444, 64, 'Gers'),
(445, 64, 'Gironde'),
(446, 64, 'Herault'),
(447, 64, 'Ille et Vilaine'),
(448, 64, 'Indre'),
(449, 64, 'Indre-et-Loire'),
(450, 64, 'Is├¿re'),
(451, 64, 'Jura'),
(452, 64, 'Landes'),
(453, 64, 'Loir-et-Cher'),
(454, 64, 'Loire'),
(455, 64, 'Rh&ocirc;ne'),
(456, 64, 'Haute-Loire'),
(457, 64, 'Loire Atlantique'),
(458, 64, 'Loiret'),
(459, 64, 'Lot'),
(460, 64, 'Lot-et-Garonne'),
(461, 64, 'Loz&egrave;re'),
(462, 64, 'Maine et Loire'),
(463, 64, 'Manche'),
(464, 64, 'Marne'),
(465, 64, 'Haute-Marne'),
(466, 64, 'Mayenne'),
(467, 64, 'Meurthe-et-Moselle'),
(468, 64, 'Meuse'),
(469, 64, 'Morbihan'),
(470, 64, 'Moselle'),
(471, 64, 'Ni&egrave;vre'),
(472, 64, 'Nord'),
(473, 64, 'Oise'),
(474, 64, 'Orne'),
(475, 64, 'Pas-de-Calais'),
(476, 64, 'Puy-de-D&ocirc;me'),
(477, 64, 'Pyrenees-Atlantiques'),
(478, 64, 'Hautes-Pyrenees'),
(479, 64, 'Pyrenees-Orientales'),
(480, 64, 'Bas Rhin'),
(481, 64, 'Haut Rhin'),
(482, 64, 'Haute-Sa&ocirc;ne'),
(483, 64, 'Sarthe'),
(484, 64, 'Savoie'),
(485, 64, 'Paris'),
(486, 64, 'Seine-Maritime'),
(487, 64, 'Seine-et-Marne'),
(488, 64, 'Yvelines'),
(489, 64, 'Deux-S&egrave;vres'),
(490, 64, 'Somme'),
(491, 64, 'Tarn'),
(492, 64, 'Tarn-et-Garonne'),
(493, 64, 'Var'),
(494, 64, 'Vaucluse'),
(495, 64, 'Vendee'),
(496, 64, 'Vienne'),
(497, 64, 'Haute-Vienne'),
(498, 64, 'Vosges'),
(499, 64, 'Yonne'),
(500, 64, 'Territoire de Belfort'),
(501, 64, 'Essonne'),
(502, 64, 'Hauts-de-Seine'),
(503, 64, 'Seine-Saint-Denis'),
(504, 64, 'Val-de-Marne'),
(505, 64, 'Val-d&#039;Oise'),
(506, 29, 'Piemonte - Torino'),
(507, 29, 'Piemonte - Alessandria'),
(508, 29, 'Piemonte - Asti'),
(509, 29, 'Piemonte - Biella'),
(510, 29, 'Piemonte - Cuneo'),
(511, 29, 'Piemonte - Novara'),
(512, 29, 'Piemonte - Verbania'),
(513, 29, 'Piemonte - Vercelli'),
(514, 29, 'Valle d&#039;Aosta - Aosta'),
(515, 29, 'Lombardia - Milano'),
(516, 29, 'Lombardia - Bergamo'),
(517, 29, 'Lombardia - Brescia'),
(518, 29, 'Lombardia - Como'),
(519, 29, 'Lombardia - Cremona'),
(520, 29, 'Lombardia - Lecco'),
(521, 29, 'Lombardia - Lodi'),
(522, 29, 'Lombardia - Mantova'),
(523, 29, 'Lombardia - Pavia'),
(524, 29, 'Lombardia - Sondrio'),
(525, 29, 'Lombardia - Varese'),
(526, 29, 'Trentino Alto Adige - Trento'),
(527, 29, 'Trentino Alto Adige - Bolzano'),
(528, 29, 'Veneto - Venezia'),
(529, 29, 'Veneto - Belluno'),
(530, 29, 'Veneto - Padova'),
(531, 29, 'Veneto - Rovigo'),
(532, 29, 'Veneto - Treviso'),
(533, 29, 'Veneto - Verona'),
(534, 29, 'Veneto - Vicenza'),
(535, 29, 'Friuli Venezia Giulia - Trieste'),
(536, 29, 'Friuli Venezia Giulia - Gorizia'),
(537, 29, 'Friuli Venezia Giulia - Pordenone'),
(538, 29, 'Friuli Venezia Giulia - Udine'),
(539, 29, 'Liguria - Genova'),
(540, 29, 'Liguria - Imperia'),
(541, 29, 'Liguria - La Spezia'),
(542, 29, 'Liguria - Savona'),
(543, 29, 'Emilia Romagna - Bologna'),
(544, 29, 'Emilia Romagna - Ferrara'),
(545, 29, 'Emilia Romagna - Forl├¼-Cesena'),
(546, 29, 'Emilia Romagna - Modena'),
(547, 29, 'Emilia Romagna - Parma'),
(548, 29, 'Emilia Romagna - Piacenza'),
(549, 29, 'Emilia Romagna - Ravenna'),
(550, 29, 'Emilia Romagna - Reggio Emilia'),
(551, 29, 'Emilia Romagna - Rimini'),
(552, 29, 'Toscana - Firenze'),
(553, 29, 'Toscana - Arezzo'),
(554, 29, 'Toscana - Grosseto'),
(555, 29, 'Toscana - Livorno'),
(556, 29, 'Toscana - Lucca'),
(557, 29, 'Toscana - Massa Carrara'),
(558, 29, 'Toscana - Pisa'),
(559, 29, 'Toscana - Pistoia'),
(560, 29, 'Toscana - Prato'),
(561, 29, 'Toscana - Siena'),
(562, 29, 'Umbria - Perugia'),
(563, 29, 'Umbria - Terni'),
(564, 29, 'Marche - Ancona'),
(565, 29, 'Marche - Ascoli Piceno'),
(566, 29, 'Marche - Macerata'),
(567, 29, 'Marche - Pesaro - Urbino'),
(568, 29, 'Lazio - Roma'),
(569, 29, 'Lazio - Frosinone'),
(570, 29, 'Lazio - Latina'),
(571, 29, 'Lazio - Rieti'),
(572, 29, 'Lazio - Viterbo'),
(573, 29, 'Abruzzo - L┬┤Aquila'),
(574, 29, 'Abruzzo - Chieti'),
(575, 29, 'Abruzzo - Pescara'),
(576, 29, 'Abruzzo - Teramo'),
(577, 29, 'Molise - Campobasso'),
(578, 29, 'Molise - Isernia'),
(579, 29, 'Campania - Napoli'),
(580, 29, 'Campania - Avellino'),
(581, 29, 'Campania - Benevento'),
(582, 29, 'Campania - Caserta'),
(583, 29, 'Campania - Salerno'),
(584, 29, 'Puglia - Bari'),
(585, 29, 'Puglia - Brindisi'),
(586, 29, 'Puglia - Foggia'),
(587, 29, 'Puglia - Lecce'),
(588, 29, 'Puglia - Taranto'),
(589, 29, 'Basilicata - Potenza'),
(590, 29, 'Basilicata - Matera'),
(591, 29, 'Calabria - Catanzaro'),
(592, 29, 'Calabria - Cosenza'),
(593, 29, 'Calabria - Crotone'),
(594, 29, 'Calabria - Reggio Calabria'),
(595, 29, 'Calabria - Vibo Valentia'),
(596, 29, 'Sicilia - Palermo'),
(597, 29, 'Sicilia - Agrigento'),
(598, 29, 'Sicilia - Caltanissetta'),
(599, 29, 'Sicilia - Catania'),
(600, 29, 'Sicilia - Enna'),
(601, 29, 'Sicilia - Messina'),
(602, 29, 'Sicilia - Ragusa'),
(603, 29, 'Sicilia - Siracusa'),
(604, 29, 'Sicilia - Trapani'),
(605, 29, 'Sardegna - Cagliari'),
(606, 29, 'Sardegna - Nuoro'),
(607, 29, 'Sardegna - Oristano'),
(608, 29, 'Sardegna - Sassari'),
(609, 28, 'Las Palmas'),
(610, 28, 'Soria'),
(611, 28, 'Palencia'),
(612, 28, 'Zamora'),
(613, 28, 'Cadiz'),
(614, 28, 'Navarra'),
(615, 28, 'Ourense'),
(616, 28, 'Segovia'),
(617, 28, 'Guip&uacute;zcoa'),
(618, 28, 'Ciudad Real'),
(619, 28, 'Vizcaya'),
(620, 28, 'alava'),
(621, 28, 'A Coru├▒a'),
(622, 28, 'Cantabria'),
(623, 28, 'Almeria'),
(624, 28, 'Zaragoza'),
(625, 28, 'Santa Cruz de Tenerife'),
(626, 28, 'Caceres'),
(627, 28, 'Guadalajara'),
(628, 28, 'avila'),
(629, 28, 'Toledo'),
(630, 28, 'Castellon'),
(631, 28, 'Tarragona'),
(632, 28, 'Lugo'),
(633, 28, 'La Rioja'),
(634, 28, 'Ceuta'),
(635, 28, 'Murcia'),
(636, 28, 'Salamanca'),
(637, 28, 'Valladolid'),
(638, 28, 'Jaen'),
(639, 28, 'Girona'),
(640, 28, 'Granada'),
(641, 28, 'Alacant'),
(642, 28, 'Cordoba'),
(643, 28, 'Albacete'),
(644, 28, 'Cuenca'),
(645, 28, 'Pontevedra'),
(646, 28, 'Teruel'),
(647, 28, 'Melilla'),
(648, 28, 'Barcelona'),
(649, 28, 'Badajoz'),
(650, 28, 'Madrid'),
(651, 28, 'Sevilla'),
(652, 28, 'Val&egrave;ncia'),
(653, 28, 'Huelva'),
(654, 28, 'Lleida'),
(655, 28, 'Leon'),
(656, 28, 'Illes Balears'),
(657, 28, 'Burgos'),
(658, 28, 'Huesca'),
(659, 28, 'Asturias'),
(660, 28, 'Malaga'),
(661, 144, 'Afghanistan'),
(662, 210, 'Niger'),
(663, 133, 'Mali'),
(664, 156, 'Burkina Faso'),
(665, 136, 'Togo'),
(666, 151, 'Benin'),
(667, 119, 'Angola'),
(668, 102, 'Namibia'),
(669, 100, 'Botswana'),
(670, 134, 'Madagascar'),
(671, 202, 'Mauritius'),
(672, 196, 'Laos'),
(673, 158, 'Cambodia'),
(674, 90, 'Philippines'),
(675, 88, 'Papua New Guinea'),
(676, 228, 'Solomon Islands'),
(677, 240, 'Vanuatu'),
(678, 176, 'Fiji'),
(679, 223, 'Samoa'),
(680, 206, 'Nauru'),
(681, 168, 'Cote D&#039;Ivoire'),
(682, 198, 'Liberia'),
(683, 187, 'Guinea'),
(684, 189, 'Guyana'),
(685, 98, 'Algeria'),
(686, 147, 'Antigua and Barbuda'),
(687, 127, 'Bahrain'),
(688, 149, 'Bangladesh'),
(689, 128, 'Barbados'),
(690, 152, 'Bhutan'),
(691, 155, 'Brunei'),
(692, 157, 'Burundi'),
(693, 159, 'Cape Verde'),
(694, 130, 'Chad'),
(695, 164, 'Comoros'),
(696, 112, 'Congo (Brazzaville)'),
(697, 169, 'Djibouti'),
(698, 171, 'East Timor'),
(699, 173, 'Eritrea'),
(700, 121, 'Ethiopia'),
(701, 180, 'Gabon'),
(702, 181, 'Gambia'),
(703, 105, 'Ghana'),
(704, 197, 'Lesotho'),
(705, 125, 'Malawi'),
(706, 200, 'Maldives'),
(707, 205, 'Myanmar (Burma)'),
(708, 107, 'Nepal'),
(709, 213, 'Oman'),
(710, 217, 'Rwanda'),
(711, 91, 'Saudi Arabia'),
(712, 120, 'Sri Lanka'),
(713, 232, 'Sudan'),
(714, 234, 'Swaziland'),
(715, 101, 'Tanzania'),
(716, 236, 'Tonga'),
(717, 239, 'Tuvalu'),
(718, 242, 'Western Sahara'),
(719, 243, 'Yemen'),
(720, 116, 'Zambia'),
(721, 96, 'Zimbabwe'),
(722, 66, 'Aargau'),
(723, 66, 'Appenzell Innerrhoden'),
(724, 66, 'Appenzell Ausserrhoden'),
(725, 66, 'Bern'),
(726, 66, 'Basel-Landschaft'),
(727, 66, 'Basel-Stadt'),
(728, 66, 'Fribourg'),
(729, 66, 'Gen&egrave;ve'),
(730, 66, 'Glarus'),
(731, 66, 'Graub├╝nden'),
(732, 66, 'Jura'),
(733, 66, 'Luzern'),
(734, 66, 'Neuch&acirc;tel'),
(735, 66, 'Nidwalden'),
(736, 66, 'Obwalden'),
(737, 66, 'Sankt Gallen'),
(738, 66, 'Schaffhausen'),
(739, 66, 'Solothurn'),
(740, 66, 'Schwyz'),
(741, 66, 'Thurgau'),
(742, 66, 'Ticino'),
(743, 66, 'Uri'),
(744, 66, 'Vaud'),
(745, 66, 'Valais'),
(746, 66, 'Zug'),
(747, 66, 'Z├╝rich'),
(749, 48, 'Aveiro'),
(750, 48, 'Beja'),
(751, 48, 'Braga'),
(752, 48, 'Braganca'),
(753, 48, 'Castelo Branco'),
(754, 48, 'Coimbra'),
(755, 48, 'Evora'),
(756, 48, 'Faro'),
(757, 48, 'Madeira'),
(758, 48, 'Guarda'),
(759, 48, 'Leiria'),
(760, 48, 'Lisboa'),
(761, 48, 'Portalegre'),
(762, 48, 'Porto'),
(763, 48, 'Santarem'),
(764, 48, 'Setubal'),
(765, 48, 'Viana do Castelo'),
(766, 48, 'Vila Real'),
(767, 48, 'Viseu'),
(768, 48, 'Azores'),
(769, 55, 'Armed Forces Americas'),
(770, 55, 'Armed Forces Europe'),
(771, 55, 'Alaska'),
(772, 55, 'Alabama'),
(773, 55, 'Armed Forces Pacific'),
(774, 55, 'Arkansas'),
(775, 55, 'American Samoa'),
(776, 55, 'Arizona'),
(777, 55, 'California'),
(778, 55, 'Colorado'),
(779, 55, 'Connecticut'),
(780, 55, 'District of Columbia'),
(781, 55, 'Delaware'),
(782, 55, 'Florida'),
(783, 55, 'Federated States of Micronesia'),
(784, 55, 'Georgia'),
(786, 55, 'Hawaii'),
(787, 55, 'Iowa'),
(788, 55, 'Idaho'),
(789, 55, 'Illinois'),
(790, 55, 'Indiana'),
(791, 55, 'Kansas'),
(792, 55, 'Kentucky'),
(793, 55, 'Louisiana'),
(794, 55, 'Massachusetts'),
(795, 55, 'Maryland'),
(796, 55, 'Maine'),
(797, 55, 'Marshall Islands'),
(798, 55, 'Michigan'),
(799, 55, 'Minnesota'),
(800, 55, 'Missouri'),
(801, 55, 'Northern Mariana Islands'),
(802, 55, 'Mississippi'),
(803, 55, 'Montana'),
(804, 55, 'North Carolina'),
(805, 55, 'North Dakota'),
(806, 55, 'Nebraska'),
(807, 55, 'New Hampshire'),
(808, 55, 'New Jersey'),
(809, 55, 'New Mexico'),
(810, 55, 'Nevada'),
(811, 55, 'New York'),
(812, 55, 'Ohio'),
(813, 55, 'Oklahoma'),
(814, 55, 'Oregon'),
(815, 55, 'Pennsylvania'),
(816, 246, 'Puerto Rico'),
(817, 55, 'Palau'),
(818, 55, 'Rhode Island'),
(819, 55, 'South Carolina'),
(820, 55, 'South Dakota'),
(821, 55, 'Tennessee'),
(822, 55, 'Texas'),
(823, 55, 'Utah'),
(824, 55, 'Virginia'),
(825, 55, 'Virgin Islands'),
(826, 55, 'Vermont'),
(827, 55, 'Washington'),
(828, 55, 'West Virginia'),
(829, 55, 'Wisconsin'),
(830, 55, 'Wyoming'),
(831, 94, 'Greenland'),
(832, 18, 'Brandenburg'),
(833, 18, 'Baden-W├╝rttemberg'),
(834, 18, 'Bayern'),
(835, 18, 'Hessen'),
(836, 18, 'Hamburg'),
(837, 18, 'Mecklenburg-Vorpommern'),
(838, 18, 'Niedersachsen'),
(839, 18, 'Nordrhein-Westfalen'),
(840, 18, 'Rheinland-Pfalz'),
(841, 18, 'Schleswig-Holstein'),
(842, 18, 'Sachsen'),
(843, 18, 'Sachsen-Anhalt'),
(844, 18, 'Th├╝ringen'),
(845, 18, 'Berlin'),
(846, 18, 'Bremen'),
(847, 18, 'Saarland'),
(848, 13, 'Scotland North'),
(849, 13, 'England - East'),
(850, 13, 'England - West Midlands'),
(851, 13, 'England - South West'),
(852, 13, 'England - North West'),
(853, 13, 'England - Yorks &amp; Humber'),
(854, 13, 'England - South East'),
(855, 13, 'England - London'),
(856, 13, 'Northern Ireland'),
(857, 13, 'England - North East'),
(858, 13, 'Wales South'),
(859, 13, 'Wales North'),
(860, 13, 'England - East Midlands'),
(861, 13, 'Scotland Central'),
(862, 13, 'Scotland South'),
(863, 13, 'Channel Islands'),
(864, 13, 'Isle of Man'),
(865, 2, 'Burgenland'),
(866, 2, 'K├ñrnten'),
(867, 2, 'Nieder├Âsterreich'),
(868, 2, 'Ober├Âsterreich'),
(869, 2, 'Salzburg'),
(870, 2, 'Steiermark'),
(871, 2, 'Tirol'),
(872, 2, 'Vorarlberg'),
(873, 2, 'Wien'),
(874, 9, 'Bruxelles'),
(875, 9, 'West-Vlaanderen'),
(876, 9, 'Oost-Vlaanderen'),
(877, 9, 'Limburg'),
(878, 9, 'Vlaams Brabant'),
(879, 9, 'Antwerpen'),
(880, 9, 'Li├ä┬ìge'),
(881, 9, 'Namur'),
(882, 9, 'Hainaut'),
(883, 9, 'Luxembourg'),
(884, 9, 'Brabant Wallon'),
(887, 67, 'Blekinge Lan'),
(888, 67, 'Gavleborgs Lan'),
(890, 67, 'Gotlands Lan'),
(891, 67, 'Hallands Lan'),
(892, 67, 'Jamtlands Lan'),
(893, 67, 'Jonkopings Lan'),
(894, 67, 'Kalmar Lan'),
(895, 67, 'Dalarnas Lan'),
(897, 67, 'Kronobergs Lan'),
(899, 67, 'Norrbottens Lan'),
(900, 67, 'Orebro Lan'),
(901, 67, 'Ostergotlands Lan'),
(903, 67, 'Sodermanlands Lan'),
(904, 67, 'Uppsala Lan'),
(905, 67, 'Varmlands Lan'),
(906, 67, 'Vasterbottens Lan'),
(907, 67, 'Vasternorrlands Lan'),
(908, 67, 'Vastmanlands Lan'),
(909, 67, 'Stockholms Lan'),
(910, 67, 'Skane Lan'),
(911, 67, 'Vastra Gotaland'),
(913, 46, 'Akershus'),
(914, 46, 'Aust-Agder'),
(915, 46, 'Buskerud'),
(916, 46, 'Finnmark'),
(917, 46, 'Hedmark'),
(918, 46, 'Hordaland'),
(919, 46, 'More og Romsdal'),
(920, 46, 'Nordland'),
(921, 46, 'Nord-Trondelag'),
(922, 46, 'Oppland'),
(923, 46, 'Oslo'),
(924, 46, 'Ostfold'),
(925, 46, 'Rogaland'),
(926, 46, 'Sogn og Fjordane'),
(927, 46, 'Sor-Trondelag'),
(928, 46, 'Telemark'),
(929, 46, 'Troms'),
(930, 46, 'Vest-Agder'),
(931, 46, 'Vestfold'),
(933, 63, '&ETH;&bull;land'),
(934, 63, 'Lapland'),
(935, 63, 'Oulu'),
(936, 63, 'Southern Finland'),
(937, 63, 'Eastern Finland'),
(938, 63, 'Western Finland'),
(940, 22, 'Arhus'),
(941, 22, 'Bornholm'),
(942, 22, 'Frederiksborg'),
(943, 22, 'Fyn'),
(944, 22, 'Kobenhavn'),
(945, 22, 'Staden Kobenhavn'),
(946, 22, 'Nordjylland'),
(947, 22, 'Ribe'),
(948, 22, 'Ringkobing'),
(949, 22, 'Roskilde'),
(950, 22, 'Sonderjylland'),
(951, 22, 'Storstrom'),
(952, 22, 'Vejle'),
(953, 22, 'Vestsjalland'),
(954, 22, 'Viborg'),
(956, 65, 'Hlavni Mesto Praha'),
(957, 65, 'Jihomoravsky Kraj'),
(958, 65, 'Jihocesky Kraj'),
(959, 65, 'Vysocina'),
(960, 65, 'Karlovarsky Kraj'),
(961, 65, 'Kralovehradecky Kraj'),
(962, 65, 'Liberecky Kraj'),
(963, 65, 'Olomoucky Kraj'),
(964, 65, 'Moravskoslezsky Kraj'),
(965, 65, 'Pardubicky Kraj'),
(966, 65, 'Plzensky Kraj'),
(967, 65, 'Stredocesky Kraj'),
(968, 65, 'Ustecky Kraj'),
(969, 65, 'Zlinsky Kraj'),
(971, 114, 'Berat'),
(972, 114, 'Diber'),
(973, 114, 'Durres'),
(974, 114, 'Elbasan'),
(975, 114, 'Fier'),
(976, 114, 'Gjirokaster'),
(977, 114, 'Korce'),
(978, 114, 'Kukes'),
(979, 114, 'Lezhe'),
(980, 114, 'Shkoder'),
(981, 114, 'Tirane'),
(982, 114, 'Vlore'),
(984, 145, 'Canillo'),
(985, 145, 'Encamp'),
(986, 145, 'La Massana'),
(987, 145, 'Ordino'),
(988, 145, 'Sant Julia de Loria'),
(989, 145, 'Andorra la Vella'),
(990, 145, 'Escaldes-Engordany'),
(992, 6, 'Aragatsotn'),
(993, 6, 'Ararat'),
(994, 6, 'Armavir'),
(995, 6, 'Geghark&#039;unik&#039;'),
(996, 6, 'Kotayk&#039;'),
(997, 6, 'Lorri'),
(998, 6, 'Shirak'),
(999, 6, 'Syunik&#039;'),
(1000, 6, 'Tavush'),
(1001, 6, 'Vayots&#039; Dzor'),
(1002, 6, 'Yerevan'),
(1004, 79, 'Federation of Bosnia and Herzegovina'),
(1005, 79, 'Republika Srpska'),
(1007, 11, 'Mikhaylovgrad'),
(1008, 11, 'Blagoevgrad'),
(1009, 11, 'Burgas'),
(1010, 11, 'Dobrich'),
(1011, 11, 'Gabrovo'),
(1012, 11, 'Grad Sofiya'),
(1013, 11, 'Khaskovo'),
(1014, 11, 'Kurdzhali'),
(1015, 11, 'Kyustendil'),
(1016, 11, 'Lovech'),
(1017, 11, 'Montana'),
(1018, 11, 'Pazardzhik'),
(1019, 11, 'Pernik'),
(1020, 11, 'Pleven'),
(1021, 11, 'Plovdiv'),
(1022, 11, 'Razgrad'),
(1023, 11, 'Ruse'),
(1024, 11, 'Shumen'),
(1025, 11, 'Silistra'),
(1026, 11, 'Sliven'),
(1027, 11, 'Smolyan'),
(1028, 11, 'Sofiya'),
(1029, 11, 'Stara Zagora'),
(1030, 11, 'Turgovishte'),
(1031, 11, 'Varna'),
(1032, 11, 'Veliko Turnovo'),
(1033, 11, 'Vidin'),
(1034, 11, 'Vratsa'),
(1035, 11, 'Yambol'),
(1037, 71, 'Bjelovarsko-Bilogorska'),
(1038, 71, 'Brodsko-Posavska'),
(1039, 71, 'Dubrovacko-Neretvanska'),
(1040, 71, 'Istarska'),
(1041, 71, 'Karlovacka'),
(1042, 71, 'Koprivnicko-Krizevacka'),
(1043, 71, 'Krapinsko-Zagorska'),
(1044, 71, 'Licko-Senjska'),
(1045, 71, 'Medimurska'),
(1046, 71, 'Osjecko-Baranjska'),
(1047, 71, 'Pozesko-Slavonska'),
(1048, 71, 'Primorsko-Goranska'),
(1049, 71, 'Sibensko-Kninska'),
(1050, 71, 'Sisacko-Moslavacka'),
(1051, 71, 'Splitsko-Dalmatinska'),
(1052, 71, 'Varazdinska'),
(1053, 71, 'Viroviticko-Podravska'),
(1054, 71, 'Vukovarsko-Srijemska'),
(1055, 71, 'Zadarska'),
(1056, 71, 'Zagrebacka'),
(1057, 71, 'Grad Zagreb'),
(1059, 143, 'Gibraltar'),
(1060, 20, 'Evros'),
(1061, 20, 'Rodhopi'),
(1062, 20, 'Xanthi'),
(1063, 20, 'Drama'),
(1064, 20, 'Serrai'),
(1065, 20, 'Kilkis'),
(1066, 20, 'Pella'),
(1067, 20, 'Florina'),
(1068, 20, 'Kastoria'),
(1069, 20, 'Grevena'),
(1070, 20, 'Kozani'),
(1071, 20, 'Imathia'),
(1072, 20, 'Thessaloniki'),
(1073, 20, 'Kavala'),
(1074, 20, 'Khalkidhiki'),
(1075, 20, 'Pieria'),
(1076, 20, 'Ioannina'),
(1077, 20, 'Thesprotia'),
(1078, 20, 'Preveza'),
(1079, 20, 'Arta'),
(1080, 20, 'Larisa'),
(1081, 20, 'Trikala'),
(1082, 20, 'Kardhitsa'),
(1083, 20, 'Magnisia'),
(1084, 20, 'Kerkira'),
(1085, 20, 'Levkas'),
(1086, 20, 'Kefallinia'),
(1087, 20, 'Zakinthos'),
(1088, 20, 'Fthiotis'),
(1089, 20, 'Evritania'),
(1090, 20, 'Aitolia kai Akarnania'),
(1091, 20, 'Fokis'),
(1092, 20, 'Voiotia'),
(1093, 20, 'Evvoia'),
(1094, 20, 'Attiki'),
(1095, 20, 'Argolis'),
(1096, 20, 'Korinthia'),
(1097, 20, 'Akhaia'),
(1098, 20, 'Ilia'),
(1099, 20, 'Messinia'),
(1100, 20, 'Arkadhia'),
(1101, 20, 'Lakonia'),
(1102, 20, 'Khania'),
(1103, 20, 'Rethimni'),
(1104, 20, 'Iraklion'),
(1105, 20, 'Lasithi'),
(1106, 20, 'Dhodhekanisos'),
(1107, 20, 'Samos'),
(1108, 20, 'Kikladhes'),
(1109, 20, 'Khios'),
(1110, 20, 'Lesvos'),
(1112, 14, 'Bacs-Kiskun'),
(1113, 14, 'Baranya'),
(1114, 14, 'Bekes'),
(1115, 14, 'Borsod-Abauj-Zemplen'),
(1116, 14, 'Budapest'),
(1117, 14, 'Csongrad'),
(1118, 14, 'Debrecen'),
(1119, 14, 'Fejer'),
(1120, 14, 'Gyor-Moson-Sopron'),
(1121, 14, 'Hajdu-Bihar'),
(1122, 14, 'Heves'),
(1123, 14, 'Komarom-Esztergom'),
(1124, 14, 'Miskolc'),
(1125, 14, 'Nograd'),
(1126, 14, 'Pecs'),
(1127, 14, 'Pest'),
(1128, 14, 'Somogy'),
(1129, 14, 'Szabolcs-Szatmar-Bereg'),
(1130, 14, 'Szeged'),
(1131, 14, 'Jasz-Nagykun-Szolnok'),
(1132, 14, 'Tolna'),
(1133, 14, 'Vas'),
(1134, 14, 'Veszprem'),
(1135, 14, 'Zala'),
(1136, 14, 'Gyor'),
(1150, 14, 'Veszprem'),
(1152, 126, 'Balzers'),
(1153, 126, 'Eschen'),
(1154, 126, 'Gamprin'),
(1155, 126, 'Mauren'),
(1156, 126, 'Planken'),
(1157, 126, 'Ruggell'),
(1158, 126, 'Schaan'),
(1159, 126, 'Schellenberg'),
(1160, 126, 'Triesen'),
(1161, 126, 'Triesenberg'),
(1162, 126, 'Vaduz'),
(1163, 41, 'Diekirch'),
(1164, 41, 'Grevenmacher'),
(1165, 41, 'Luxembourg'),
(1167, 85, 'Aracinovo'),
(1168, 85, 'Bac'),
(1169, 85, 'Belcista'),
(1170, 85, 'Berovo'),
(1171, 85, 'Bistrica'),
(1172, 85, 'Bitola'),
(1173, 85, 'Blatec'),
(1174, 85, 'Bogdanci'),
(1175, 85, 'Bogomila'),
(1176, 85, 'Bogovinje'),
(1177, 85, 'Bosilovo'),
(1179, 85, 'Cair'),
(1180, 85, 'Capari'),
(1181, 85, 'Caska'),
(1182, 85, 'Cegrane'),
(1184, 85, 'Centar Zupa'),
(1187, 85, 'Debar'),
(1188, 85, 'Delcevo'),
(1190, 85, 'Demir Hisar'),
(1191, 85, 'Demir Kapija'),
(1195, 85, 'Dorce Petrov'),
(1198, 85, 'Gazi Baba'),
(1199, 85, 'Gevgelija'),
(1200, 85, 'Gostivar'),
(1201, 85, 'Gradsko'),
(1204, 85, 'Jegunovce'),
(1205, 85, 'Kamenjane'),
(1207, 85, 'Karpos'),
(1208, 85, 'Kavadarci'),
(1209, 85, 'Kicevo'),
(1210, 85, 'Kisela Voda'),
(1211, 85, 'Klecevce'),
(1212, 85, 'Kocani'),
(1214, 85, 'Kondovo'),
(1217, 85, 'Kratovo'),
(1219, 85, 'Krivogastani'),
(1220, 85, 'Krusevo'),
(1223, 85, 'Kumanovo'),
(1224, 85, 'Labunista'),
(1225, 85, 'Lipkovo'),
(1228, 85, 'Makedonska Kamenica'),
(1229, 85, 'Makedonski Brod'),
(1234, 85, 'Murtino'),
(1235, 85, 'Negotino'),
(1238, 85, 'Novo Selo'),
(1240, 85, 'Ohrid'),
(1242, 85, 'Orizari'),
(1245, 85, 'Petrovec'),
(1248, 85, 'Prilep'),
(1249, 85, 'Probistip'),
(1250, 85, 'Radovis'),
(1252, 85, 'Resen'),
(1253, 85, 'Rosoman'),
(1256, 85, 'Saraj'),
(1260, 85, 'Srbinovo'),
(1262, 85, 'Star Dojran'),
(1264, 85, 'Stip'),
(1265, 85, 'Struga'),
(1266, 85, 'Strumica'),
(1267, 85, 'Studenicani'),
(1268, 85, 'Suto Orizari'),
(1269, 85, 'Sveti Nikole'),
(1270, 85, 'Tearce'),
(1271, 85, 'Tetovo'),
(1273, 85, 'Valandovo'),
(1275, 85, 'Veles'),
(1277, 85, 'Vevcani'),
(1278, 85, 'Vinica'),
(1281, 85, 'Vrapciste'),
(1286, 85, 'Zelino'),
(1289, 85, 'Zrnovci'),
(1291, 86, 'Malta'),
(1292, 44, 'La Condamine'),
(1293, 44, 'Monaco'),
(1294, 44, 'Monte-Carlo'),
(1295, 47, 'Biala Podlaska'),
(1296, 47, 'Bialystok'),
(1297, 47, 'Bielsko'),
(1298, 47, 'Bydgoszcz'),
(1299, 47, 'Chelm'),
(1300, 47, 'Ciechanow'),
(1301, 47, 'Czestochowa'),
(1302, 47, 'Elblag'),
(1303, 47, 'Gdansk'),
(1304, 47, 'Gorzow'),
(1305, 47, 'Jelenia Gora'),
(1306, 47, 'Kalisz'),
(1307, 47, 'Katowice'),
(1308, 47, 'Kielce'),
(1309, 47, 'Konin'),
(1310, 47, 'Koszalin'),
(1311, 47, 'Krakow'),
(1312, 47, 'Krosno'),
(1313, 47, 'Legnica'),
(1314, 47, 'Leszno'),
(1315, 47, 'Lodz'),
(1316, 47, 'Lomza'),
(1317, 47, 'Lublin'),
(1318, 47, 'Nowy Sacz'),
(1319, 47, 'Olsztyn'),
(1320, 47, 'Opole'),
(1321, 47, 'Ostroleka'),
(1322, 47, 'Pila'),
(1323, 47, 'Piotrkow'),
(1324, 47, 'Plock'),
(1325, 47, 'Poznan'),
(1326, 47, 'Przemysl'),
(1327, 47, 'Radom'),
(1328, 47, 'Rzeszow'),
(1329, 47, 'Siedlce'),
(1330, 47, 'Sieradz'),
(1331, 47, 'Skierniewice'),
(1332, 47, 'Slupsk'),
(1333, 47, 'Suwalki'),
(1335, 47, 'Tarnobrzeg'),
(1336, 47, 'Tarnow'),
(1337, 47, 'Torun'),
(1338, 47, 'Walbrzych'),
(1339, 47, 'Warszawa'),
(1340, 47, 'Wloclawek'),
(1341, 47, 'Wroclaw'),
(1342, 47, 'Zamosc'),
(1343, 47, 'Zielona Gora'),
(1344, 47, 'Dolnoslaskie'),
(1345, 47, 'Kujawsko-Pomorskie'),
(1346, 47, 'Lodzkie'),
(1347, 47, 'Lubelskie'),
(1348, 47, 'Lubuskie'),
(1349, 47, 'Malopolskie'),
(1350, 47, 'Mazowieckie'),
(1351, 47, 'Opolskie'),
(1352, 47, 'Podkarpackie'),
(1353, 47, 'Podlaskie'),
(1354, 47, 'Pomorskie'),
(1355, 47, 'Slaskie'),
(1356, 47, 'Swietokrzyskie'),
(1357, 47, 'Warminsko-Mazurskie'),
(1358, 47, 'Wielkopolskie'),
(1359, 47, 'Zachodniopomorskie'),
(1361, 72, 'Alba'),
(1362, 72, 'Arad'),
(1363, 72, 'Arges'),
(1364, 72, 'Bacau'),
(1365, 72, 'Bihor'),
(1366, 72, 'Bistrita-Nasaud'),
(1367, 72, 'Botosani'),
(1368, 72, 'Braila'),
(1369, 72, 'Brasov'),
(1370, 72, 'Bucuresti'),
(1371, 72, 'Buzau'),
(1372, 72, 'Caras-Severin'),
(1373, 72, 'Cluj'),
(1374, 72, 'Constanta'),
(1375, 72, 'Covasna'),
(1376, 72, 'Dambovita'),
(1377, 72, 'Dolj'),
(1378, 72, 'Galati'),
(1379, 72, 'Gorj'),
(1380, 72, 'Harghita'),
(1381, 72, 'Hunedoara'),
(1382, 72, 'Ialomita'),
(1383, 72, 'Iasi'),
(1384, 72, 'Maramures'),
(1385, 72, 'Mehedinti'),
(1386, 72, 'Mures'),
(1387, 72, 'Neamt'),
(1388, 72, 'Olt'),
(1389, 72, 'Prahova'),
(1390, 72, 'Salaj'),
(1391, 72, 'Satu Mare'),
(1392, 72, 'Sibiu'),
(1393, 72, 'Suceava'),
(1394, 72, 'Teleorman'),
(1395, 72, 'Timis'),
(1396, 72, 'Tulcea'),
(1397, 72, 'Vaslui'),
(1398, 72, 'Valcea'),
(1399, 72, 'Vrancea'),
(1400, 72, 'Calarasi'),
(1401, 72, 'Giurgiu'),
(1404, 224, 'Acquaviva'),
(1405, 224, 'Chiesanuova'),
(1406, 224, 'Domagnano'),
(1407, 224, 'Faetano'),
(1408, 224, 'Fiorentino'),
(1409, 224, 'Borgo Maggiore'),
(1410, 224, 'San Marino'),
(1411, 224, 'Monte Giardino'),
(1412, 224, 'Serravalle'),
(1413, 52, 'Banska Bystrica'),
(1414, 52, 'Bratislava'),
(1415, 52, 'Kosice'),
(1416, 52, 'Nitra'),
(1417, 52, 'Presov'),
(1418, 52, 'Trencin'),
(1419, 52, 'Trnava'),
(1420, 52, 'Zilina'),
(1423, 53, 'Beltinci'),
(1425, 53, 'Bohinj'),
(1426, 53, 'Borovnica'),
(1427, 53, 'Bovec'),
(1428, 53, 'Brda'),
(1429, 53, 'Brezice'),
(1430, 53, 'Brezovica'),
(1432, 53, 'Cerklje na Gorenjskem'),
(1434, 53, 'Cerkno'),
(1436, 53, 'Crna na Koroskem'),
(1437, 53, 'Crnomelj'),
(1438, 53, 'Divaca'),
(1439, 53, 'Dobrepolje'),
(1440, 53, 'Dol pri Ljubljani'),
(1443, 53, 'Duplek'),
(1447, 53, 'Gornji Grad'),
(1450, 53, 'Hrastnik'),
(1451, 53, 'Hrpelje-Kozina'),
(1452, 53, 'Idrija'),
(1453, 53, 'Ig'),
(1454, 53, 'Ilirska Bistrica'),
(1455, 53, 'Ivancna Gorica'),
(1462, 53, 'Komen'),
(1463, 53, 'Koper-Capodistria'),
(1464, 53, 'Kozje'),
(1465, 53, 'Kranj'),
(1466, 53, 'Kranjska Gora'),
(1467, 53, 'Krsko'),
(1469, 53, 'Lasko'),
(1470, 53, 'Ljubljana'),
(1471, 53, 'Ljubno'),
(1472, 53, 'Logatec'),
(1475, 53, 'Medvode'),
(1476, 53, 'Menges'),
(1478, 53, 'Mezica'),
(1480, 53, 'Moravce'),
(1482, 53, 'Mozirje'),
(1483, 53, 'Murska Sobota'),
(1487, 53, 'Nova Gorica'),
(1489, 53, 'Ormoz'),
(1491, 53, 'Pesnica'),
(1494, 53, 'Postojna'),
(1497, 53, 'Radece'),
(1498, 53, 'Radenci'),
(1500, 53, 'Radovljica'),
(1502, 53, 'Rogaska Slatina'),
(1505, 53, 'Sencur'),
(1506, 53, 'Sentilj'),
(1508, 53, 'Sevnica'),
(1509, 53, 'Sezana'),
(1511, 53, 'Skofja Loka'),
(1513, 53, 'Slovenj Gradec'),
(1514, 53, 'Slovenske Konjice'),
(1515, 53, 'Smarje pri Jelsah'),
(1521, 53, 'Tolmin'),
(1522, 53, 'Trbovlje'),
(1524, 53, 'Trzic'),
(1526, 53, 'Velenje'),
(1528, 53, 'Vipava'),
(1531, 53, 'Vrhnika'),
(1532, 53, 'Vuzenica'),
(1533, 53, 'Zagorje ob Savi'),
(1535, 53, 'Zelezniki'),
(1536, 53, 'Ziri'),
(1537, 53, 'Zrece'),
(1539, 53, 'Domzale'),
(1540, 53, 'Jesenice'),
(1541, 53, 'Kamnik'),
(1542, 53, 'Kocevje'),
(1544, 53, 'Lenart'),
(1545, 53, 'Litija'),
(1546, 53, 'Ljutomer'),
(1550, 53, 'Maribor'),
(1552, 53, 'Novo Mesto'),
(1553, 53, 'Piran'),
(1554, 53, 'Preddvor'),
(1555, 53, 'Ptuj'),
(1556, 53, 'Ribnica'),
(1558, 53, 'Sentjur pri Celju'),
(1559, 53, 'Slovenska Bistrica'),
(1560, 53, 'Videm'),
(1562, 53, 'Zalec'),
(1564, 109, 'Seychelles'),
(1565, 108, 'Mauritania'),
(1566, 135, 'Senegal'),
(1567, 154, 'Road Town'),
(1568, 165, 'Congo'),
(1569, 166, 'Avarua'),
(1570, 172, 'Malabo'),
(1571, 175, 'Torshavn'),
(1572, 178, 'Papeete'),
(1573, 184, 'St George&#039;s'),
(1574, 186, 'St Peter Port'),
(1575, 188, 'Bissau'),
(1576, 193, 'Saint Helier'),
(1577, 201, 'Fort-de-France'),
(1578, 207, 'Willemstad'),
(1579, 208, 'Noumea'),
(1580, 212, 'Kingston'),
(1581, 215, 'Adamstown'),
(1582, 216, 'Doha'),
(1583, 218, 'Jamestown'),
(1584, 219, 'Basseterre'),
(1585, 220, 'Castries'),
(1586, 221, 'Saint Pierre'),
(1587, 222, 'Kingstown'),
(1588, 225, 'San Tome'),
(1589, 226, 'Belgrade'),
(1590, 227, 'Freetown'),
(1591, 229, 'Mogadishu'),
(1592, 235, 'Fakaofo'),
(1593, 237, 'Port of Spain'),
(1594, 241, 'Mata-Utu'),
(1596, 89, 'Amazonas'),
(1597, 89, 'Ancash'),
(1598, 89, 'Apurimac'),
(1599, 89, 'Arequipa'),
(1600, 89, 'Ayacucho'),
(1601, 89, 'Cajamarca'),
(1602, 89, 'Callao'),
(1603, 89, 'Cusco'),
(1604, 89, 'Huancavelica'),
(1605, 89, 'Huanuco'),
(1606, 89, 'Ica'),
(1607, 89, 'Junin'),
(1608, 89, 'La Libertad'),
(1609, 89, 'Lambayeque'),
(1610, 89, 'Lima'),
(1611, 89, 'Loreto'),
(1612, 89, 'Madre de Dios'),
(1613, 89, 'Moquegua'),
(1614, 89, 'Pasco'),
(1615, 89, 'Piura'),
(1616, 89, 'Puno'),
(1617, 89, 'San Martin'),
(1618, 89, 'Tacna'),
(1619, 89, 'Tumbes'),
(1620, 89, 'Ucayali'),
(1622, 110, 'Alto Parana'),
(1623, 110, 'Amambay'),
(1624, 110, 'Boqueron'),
(1625, 110, 'Caaguaz&uacute;'),
(1626, 110, 'Caazapa'),
(1627, 110, 'Central'),
(1628, 110, 'Concepcion'),
(1629, 110, 'Cordillera'),
(1630, 110, 'Guaira'),
(1631, 110, 'Itap&uacute;a'),
(1632, 110, 'Misiones'),
(1633, 110, 'Neembuc&uacute;'),
(1634, 110, 'Paraguari'),
(1635, 110, 'Presidente Hayes'),
(1636, 110, 'San Pedro'),
(1637, 110, 'Alto Paraguay'),
(1638, 110, 'Canindey&uacute;'),
(1639, 110, 'Chaco'),
(1642, 111, 'Artigas'),
(1643, 111, 'Canelones'),
(1644, 111, 'Cerro Largo'),
(1645, 111, 'Colonia'),
(1646, 111, 'Durazno'),
(1647, 111, 'Flores'),
(1648, 111, 'Florida'),
(1649, 111, 'Lavalleja'),
(1650, 111, 'Maldonado'),
(1651, 111, 'Montevideo'),
(1652, 111, 'Paysand&uacute;'),
(1653, 111, 'Rio Negro'),
(1654, 111, 'Rivera'),
(1655, 111, 'Rocha'),
(1656, 111, 'Salto'),
(1657, 111, 'San Jose'),
(1658, 111, 'Soriano'),
(1659, 111, 'Tacuarembo'),
(1660, 111, 'Treinta y Tres'),
(1662, 81, 'Region de Tarapaca'),
(1663, 81, 'Region de Antofagasta'),
(1664, 81, 'Region de Atacama'),
(1665, 81, 'Region de Coquimbo'),
(1666, 81, 'Region de Valparaiso'),
(1667, 81, 'Region del Libertador General Bernardo O&#039;Higgins'),
(1668, 81, 'Region del Maule'),
(1669, 81, 'Region del Bio Bio'),
(1670, 81, 'Region de La Araucania'),
(1671, 81, 'Region de Los Lagos'),
(1672, 81, 'Region Aisen del General Carlos Iba├▒ez del Campo'),
(1673, 81, 'Region de Magallanes y de la Antartica Chilena'),
(1674, 81, 'Region Metropolitana de Santiago'),
(1676, 185, 'Alta Verapaz'),
(1677, 185, 'Baja Verapaz'),
(1678, 185, 'Chimaltenango'),
(1679, 185, 'Chiquimula'),
(1680, 185, 'El Progreso'),
(1681, 185, 'Escuintla'),
(1682, 185, 'Guatemala'),
(1683, 185, 'Huehuetenango'),
(1684, 185, 'Izabal'),
(1685, 185, 'Jalapa'),
(1686, 185, 'Jutiapa'),
(1687, 185, 'Peten'),
(1688, 185, 'Quetzaltenango'),
(1689, 185, 'Quiche'),
(1690, 185, 'Retalhuleu'),
(1691, 185, 'Sacatepequez'),
(1692, 185, 'San Marcos'),
(1693, 185, 'Santa Rosa'),
(1694, 185, 'Solola'),
(1695, 185, 'Suchitepequez'),
(1696, 185, 'Totonicapan'),
(1697, 185, 'Zacapa'),
(1699, 82, 'Amazonas'),
(1700, 82, 'Antioquia'),
(1701, 82, 'Arauca'),
(1702, 82, 'Atlantico'),
(1703, 82, 'Caqueta'),
(1704, 82, 'Cauca'),
(1705, 82, 'Cesar'),
(1706, 82, 'Choco'),
(1707, 82, 'Cordoba'),
(1708, 82, 'Guaviare'),
(1709, 82, 'Guainia'),
(1710, 82, 'Huila'),
(1711, 82, 'La Guajira'),
(1712, 82, 'Meta'),
(1713, 82, 'Narino'),
(1714, 82, 'Norte de Santander'),
(1715, 82, 'Putumayo'),
(1716, 82, 'Quindio'),
(1717, 82, 'Risaralda'),
(1718, 82, 'San Andres y Providencia'),
(1719, 82, 'Santander'),
(1720, 82, 'Sucre'),
(1721, 82, 'Tolima'),
(1722, 82, 'Valle del Cauca'),
(1723, 82, 'Vaupes'),
(1724, 82, 'Vichada'),
(1725, 82, 'Casanare'),
(1726, 82, 'Cundinamarca'),
(1727, 82, 'Distrito Especial'),
(1730, 82, 'Caldas'),
(1731, 82, 'Magdalena'),
(1733, 42, 'Aguascalientes'),
(1734, 42, 'Baja California'),
(1735, 42, 'Baja California Sur'),
(1736, 42, 'Campeche'),
(1737, 42, 'Chiapas'),
(1738, 42, 'Chihuahua'),
(1739, 42, 'Coahuila de Zaragoza'),
(1740, 42, 'Colima'),
(1741, 42, 'Distrito Federal'),
(1742, 42, 'Durango'),
(1743, 42, 'Guanajuato'),
(1744, 42, 'Guerrero'),
(1745, 42, 'Hidalgo'),
(1746, 42, 'Jalisco'),
(1747, 42, 'Mexico'),
(1748, 42, 'Michoacan de Ocampo'),
(1749, 42, 'Morelos'),
(1750, 42, 'Nayarit'),
(1751, 42, 'Nuevo Leon'),
(1752, 42, 'Oaxaca'),
(1753, 42, 'Puebla'),
(1754, 42, 'Queretaro de Arteaga'),
(1755, 42, 'Quintana Roo'),
(1756, 42, 'San Luis Potosi'),
(1757, 42, 'Sinaloa'),
(1758, 42, 'Sonora'),
(1759, 42, 'Tabasco'),
(1760, 42, 'Tamaulipas'),
(1761, 42, 'Tlaxcala'),
(1762, 42, 'Veracruz-Llave'),
(1763, 42, 'Yucatan'),
(1764, 42, 'Zacatecas'),
(1766, 124, 'Bocas del Toro'),
(1767, 124, 'Chiriqui'),
(1768, 124, 'Cocle'),
(1769, 124, 'Colon'),
(1770, 124, 'Darien'),
(1771, 124, 'Herrera'),
(1772, 124, 'Los Santos'),
(1773, 124, 'Panama'),
(1774, 124, 'San Blas'),
(1775, 124, 'Veraguas'),
(1777, 123, 'Chuquisaca'),
(1778, 123, 'Cochabamba'),
(1779, 123, 'El Beni'),
(1780, 123, 'La Paz'),
(1781, 123, 'Oruro'),
(1782, 123, 'Pando'),
(1783, 123, 'Potosi'),
(1784, 123, 'Santa Cruz'),
(1785, 123, 'Tarija'),
(1787, 36, 'Alajuela'),
(1788, 36, 'Cartago'),
(1789, 36, 'Guanacaste'),
(1790, 36, 'Heredia'),
(1791, 36, 'Limon'),
(1792, 36, 'Puntarenas'),
(1793, 36, 'San Jose'),
(1795, 103, 'Galapagos'),
(1796, 103, 'Azuay'),
(1797, 103, 'Bolivar'),
(1798, 103, 'Canar'),
(1799, 103, 'Carchi'),
(1800, 103, 'Chimborazo'),
(1801, 103, 'Cotopaxi'),
(1802, 103, 'El Oro'),
(1803, 103, 'Esmeraldas'),
(1804, 103, 'Guayas'),
(1805, 103, 'Imbabura'),
(1806, 103, 'Loja'),
(1807, 103, 'Los Rios'),
(1808, 103, 'Manabi'),
(1809, 103, 'Morona-Santiago'),
(1810, 103, 'Pastaza'),
(1811, 103, 'Pichincha'),
(1812, 103, 'Tungurahua'),
(1813, 103, 'Zamora-Chinchipe'),
(1814, 103, 'Sucumbios'),
(1815, 103, 'Napo'),
(1816, 103, 'Orellana'),
(1818, 5, 'Buenos Aires'),
(1819, 5, 'Catamarca'),
(1820, 5, 'Chaco'),
(1821, 5, 'Chubut'),
(1822, 5, 'Cordoba'),
(1823, 5, 'Corrientes'),
(1824, 5, 'Distrito Federal'),
(1825, 5, 'Entre Rios'),
(1826, 5, 'Formosa'),
(1827, 5, 'Jujuy'),
(1828, 5, 'La Pampa'),
(1829, 5, 'La Rioja'),
(1830, 5, 'Mendoza'),
(1831, 5, 'Misiones'),
(1832, 5, 'Neuquen'),
(1833, 5, 'Rio Negro'),
(1834, 5, 'Salta'),
(1835, 5, 'San Juan'),
(1836, 5, 'San Luis'),
(1837, 5, 'Santa Cruz'),
(1838, 5, 'Santa Fe'),
(1839, 5, 'Santiago del Estero'),
(1840, 5, 'Tierra del Fuego'),
(1841, 5, 'Tucuman'),
(1843, 95, 'Amazonas'),
(1844, 95, 'Anzoategui'),
(1845, 95, 'Apure'),
(1846, 95, 'Aragua'),
(1847, 95, 'Barinas'),
(1848, 95, 'Bolivar'),
(1849, 95, 'Carabobo'),
(1850, 95, 'Cojedes'),
(1851, 95, 'Delta Amacuro'),
(1852, 95, 'Falcon'),
(1853, 95, 'Guarico'),
(1854, 95, 'Lara'),
(1855, 95, 'Merida'),
(1856, 95, 'Miranda'),
(1857, 95, 'Monagas'),
(1858, 95, 'Nueva Esparta'),
(1859, 95, 'Portuguesa'),
(1860, 95, 'Sucre'),
(1861, 95, 'Tachira'),
(1862, 95, 'Trujillo'),
(1863, 95, 'Yaracuy'),
(1864, 95, 'Zulia'),
(1865, 95, 'Dependencias Federales'),
(1866, 95, 'Distrito Capital'),
(1867, 95, 'Vargas'),
(1869, 209, 'Boaco'),
(1870, 209, 'Carazo'),
(1871, 209, 'Chinandega'),
(1872, 209, 'Chontales'),
(1873, 209, 'Esteli'),
(1874, 209, 'Granada'),
(1875, 209, 'Jinotega'),
(1876, 209, 'Leon'),
(1877, 209, 'Madriz'),
(1878, 209, 'Managua'),
(1879, 209, 'Masaya'),
(1880, 209, 'Matagalpa'),
(1881, 209, 'Nueva Segovia'),
(1882, 209, 'Rio San Juan'),
(1883, 209, 'Rivas'),
(1884, 209, 'Zelaya'),
(1886, 113, 'Pinar del Rio'),
(1887, 113, 'Ciudad de la Habana'),
(1888, 113, 'Matanzas'),
(1889, 113, 'Isla de la Juventud'),
(1890, 113, 'Camaguey'),
(1891, 113, 'Ciego de Avila'),
(1892, 113, 'Cienfuegos'),
(1893, 113, 'Granma'),
(1894, 113, 'Guantanamo'),
(1895, 113, 'La Habana'),
(1896, 113, 'Holguin'),
(1897, 113, 'Las Tunas'),
(1898, 113, 'Sancti Spiritus'),
(1899, 113, 'Santiago de Cuba'),
(1900, 113, 'Villa Clara'),
(1901, 12, 'Acre'),
(1902, 12, 'Alagoas'),
(1903, 12, 'Amapa'),
(1904, 12, 'Amazonas'),
(1905, 12, 'Bahia'),
(1906, 12, 'Ceara'),
(1907, 12, 'Distrito Federal'),
(1908, 12, 'Espirito Santo'),
(1909, 12, 'Mato Grosso do Sul'),
(1910, 12, 'Maranhao'),
(1911, 12, 'Mato Grosso'),
(1912, 12, 'Minas Gerais'),
(1913, 12, 'Para'),
(1914, 12, 'Paraiba'),
(1915, 12, 'Parana'),
(1916, 12, 'Piaui'),
(1917, 12, 'Rio de Janeiro'),
(1918, 12, 'Rio Grande do Norte'),
(1919, 12, 'Rio Grande do Sul'),
(1920, 12, 'Rondonia'),
(1921, 12, 'Roraima'),
(1922, 12, 'Santa Catarina'),
(1923, 12, 'Sao Paulo'),
(1924, 12, 'Sergipe'),
(1925, 12, 'Goias'),
(1926, 12, 'Pernambuco'),
(1927, 12, 'Tocantins'),
(1930, 83, 'Akureyri'),
(1931, 83, 'Arnessysla'),
(1932, 83, 'Austur-Bardastrandarsysla'),
(1933, 83, 'Austur-Hunavatnssysla'),
(1934, 83, 'Austur-Skaftafellssysla'),
(1935, 83, 'Borgarfjardarsysla'),
(1936, 83, 'Dalasysla'),
(1937, 83, 'Eyjafjardarsysla'),
(1938, 83, 'Gullbringusysla'),
(1939, 83, 'Hafnarfjordur'),
(1943, 83, 'Kjosarsysla'),
(1944, 83, 'Kopavogur'),
(1945, 83, 'Myrasysla'),
(1946, 83, 'Neskaupstadur'),
(1947, 83, 'Nordur-Isafjardarsysla'),
(1948, 83, 'Nordur-Mulasysla'),
(1949, 83, 'Nordur-Tingeyjarsysla'),
(1950, 83, 'Olafsfjordur'),
(1951, 83, 'Rangarvallasysla'),
(1952, 83, 'Reykjavik'),
(1953, 83, 'Saudarkrokur'),
(1954, 83, 'Seydisfjordur'),
(1956, 83, 'Skagafjardarsysla'),
(1957, 83, 'Snafellsnes- og Hnappadalssysla'),
(1958, 83, 'Strandasysla'),
(1959, 83, 'Sudur-Mulasysla'),
(1960, 83, 'Sudur-Tingeyjarsysla'),
(1961, 83, 'Vestmannaeyjar'),
(1962, 83, 'Vestur-Bardastrandarsysla'),
(1964, 83, 'Vestur-Isafjardarsysla'),
(1965, 83, 'Vestur-Skaftafellssysla'),
(1966, 35, 'Anhui'),
(1967, 35, 'Zhejiang'),
(1968, 35, 'Jiangxi'),
(1969, 35, 'Jiangsu'),
(1970, 35, 'Jilin'),
(1971, 35, 'Qinghai'),
(1972, 35, 'Fujian'),
(1973, 35, 'Heilongjiang'),
(1974, 35, 'Henan'),
(1975, 35, 'Hebei'),
(1976, 35, 'Hunan'),
(1977, 35, 'Hubei'),
(1978, 35, 'Xinjiang'),
(1979, 35, 'Xizang'),
(1980, 35, 'Gansu'),
(1981, 35, 'Guangxi'),
(1982, 35, 'Guizhou'),
(1983, 35, 'Liaoning'),
(1984, 35, 'Nei Mongol'),
(1985, 35, 'Ningxia'),
(1986, 35, 'Beijing'),
(1987, 35, 'Shanghai'),
(1988, 35, 'Shanxi'),
(1989, 35, 'Shandong'),
(1990, 35, 'Shaanxi'),
(1991, 35, 'Sichuan'),
(1992, 35, 'Tianjin'),
(1993, 35, 'Yunnan'),
(1994, 35, 'Guangdong'),
(1995, 35, 'Hainan'),
(1996, 35, 'Chongqing'),
(1997, 97, 'Central'),
(1998, 97, 'Coast'),
(1999, 97, 'Eastern'),
(2000, 97, 'Nairobi Area'),
(2001, 97, 'North-Eastern'),
(2002, 97, 'Nyanza'),
(2003, 97, 'Rift Valley'),
(2004, 97, 'Western'),
(2006, 195, 'Gilbert Islands'),
(2007, 195, 'Line Islands'),
(2008, 195, 'Phoenix Islands'),
(2010, 1, 'Australian Capital Territory'),
(2011, 1, 'New South Wales'),
(2012, 1, 'Northern Territory'),
(2013, 1, 'Queensland'),
(2014, 1, 'South Australia'),
(2015, 1, 'Tasmania'),
(2016, 1, 'Victoria'),
(2017, 1, 'Western Australia'),
(2018, 27, 'Dublin'),
(2019, 27, 'Galway'),
(2020, 27, 'Kildare'),
(2021, 27, 'Leitrim'),
(2022, 27, 'Limerick'),
(2023, 27, 'Mayo'),
(2024, 27, 'Meath'),
(2025, 27, 'Carlow'),
(2026, 27, 'Kilkenny'),
(2027, 27, 'Laois'),
(2028, 27, 'Longford'),
(2029, 27, 'Louth'),
(2030, 27, 'Offaly'),
(2031, 27, 'Westmeath'),
(2032, 27, 'Wexford'),
(2033, 27, 'Wicklow'),
(2034, 27, 'Roscommon'),
(2035, 27, 'Sligo'),
(2036, 27, 'Clare'),
(2037, 27, 'Cork'),
(2038, 27, 'Kerry'),
(2039, 27, 'Tipperary'),
(2040, 27, 'Waterford'),
(2041, 27, 'Cavan'),
(2042, 27, 'Donegal'),
(2043, 27, 'Monaghan'),
(2044, 50, 'Karachaeva-Cherkesskaya Respublica'),
(2045, 50, 'Raimirskii (Dolgano-Nenetskii) AO'),
(2046, 50, 'Respublica Tiva'),
(2047, 32, 'Newfoundland'),
(2048, 32, 'Nova Scotia'),
(2049, 32, 'Prince Edward Island'),
(2050, 32, 'New Brunswick'),
(2051, 32, 'Quebec'),
(2052, 32, 'Ontario'),
(2053, 32, 'Manitoba'),
(2054, 32, 'Saskatchewan'),
(2055, 32, 'Alberta'),
(2056, 32, 'British Columbia'),
(2057, 32, 'Nunavut'),
(2058, 32, 'Northwest Territories'),
(2059, 32, 'Yukon Territory'),
(2060, 19, 'Drenthe'),
(2061, 19, 'Friesland'),
(2062, 19, 'Gelderland'),
(2063, 19, 'Groningen'),
(2064, 19, 'Limburg'),
(2065, 19, 'Noord-Brabant'),
(2066, 19, 'Noord-Holland'),
(2067, 19, 'Utrecht'),
(2068, 19, 'Zeeland'),
(2069, 19, 'Zuid-Holland'),
(2071, 19, 'Overijssel'),
(2072, 19, 'Flevoland'),
(2073, 138, 'Duarte'),
(2074, 138, 'Puerto Plata'),
(2075, 138, 'Valverde'),
(2076, 138, 'Maria Trinidad Sanchez'),
(2077, 138, 'Azua'),
(2078, 138, 'Santiago'),
(2079, 138, 'San Cristobal'),
(2080, 138, 'Peravia'),
(2081, 138, 'Elias Pi├▒a'),
(2082, 138, 'Barahona'),
(2083, 138, 'Monte Plata'),
(2084, 138, 'Salcedo'),
(2085, 138, 'La Altagracia'),
(2086, 138, 'San Juan'),
(2087, 138, 'Monse├▒or Nouel'),
(2088, 138, 'Monte Cristi'),
(2089, 138, 'Espaillat'),
(2090, 138, 'Sanchez Ramirez'),
(2091, 138, 'La Vega'),
(2092, 138, 'San Pedro de Macoris'),
(2093, 138, 'Independencia'),
(2094, 138, 'Dajabon'),
(2095, 138, 'Baoruco'),
(2096, 138, 'El Seibo'),
(2097, 138, 'Hato Mayor'),
(2098, 138, 'La Romana'),
(2099, 138, 'Pedernales'),
(2100, 138, 'Samana'),
(2101, 138, 'Santiago Rodriguez'),
(2102, 138, 'San Jose de Ocoa'),
(2103, 70, 'Chiba'),
(2104, 70, 'Ehime'),
(2105, 70, 'Oita'),
(2106, 85, 'Skopje'),
(2108, 35, 'Schanghai'),
(2109, 35, 'Hongkong'),
(2110, 35, 'Neimenggu'),
(2111, 35, 'Aomen'),
(2112, 92, 'Amnat Charoen'),
(2113, 92, 'Ang Thong'),
(2114, 92, 'Bangkok'),
(2115, 92, 'Buri Ram'),
(2116, 92, 'Chachoengsao'),
(2117, 92, 'Chai Nat'),
(2118, 92, 'Chaiyaphum'),
(2119, 92, 'Chanthaburi'),
(2120, 92, 'Chiang Mai'),
(2121, 92, 'Chiang Rai'),
(2122, 92, 'Chon Buri'),
(2124, 92, 'Kalasin'),
(2126, 92, 'Kanchanaburi'),
(2127, 92, 'Khon Kaen'),
(2128, 92, 'Krabi'),
(2129, 92, 'Lampang'),
(2131, 92, 'Loei'),
(2132, 92, 'Lop Buri'),
(2133, 92, 'Mae Hong Son'),
(2134, 92, 'Maha Sarakham'),
(2137, 92, 'Nakhon Pathom'),
(2139, 92, 'Nakhon Ratchasima'),
(2140, 92, 'Nakhon Sawan'),
(2141, 92, 'Nakhon Si Thammarat'),
(2143, 92, 'Narathiwat'),
(2144, 92, 'Nong Bua Lam Phu'),
(2145, 92, 'Nong Khai'),
(2146, 92, 'Nonthaburi'),
(2147, 92, 'Pathum Thani'),
(2148, 92, 'Pattani'),
(2149, 92, 'Phangnga'),
(2150, 92, 'Phatthalung'),
(2154, 92, 'Phichit'),
(2155, 92, 'Phitsanulok'),
(2156, 92, 'Phra Nakhon Si Ayutthaya'),
(2157, 92, 'Phrae'),
(2158, 92, 'Phuket'),
(2159, 92, 'Prachin Buri'),
(2160, 92, 'Prachuap Khiri Khan'),
(2162, 92, 'Ratchaburi'),
(2163, 92, 'Rayong'),
(2164, 92, 'Roi Et'),
(2165, 92, 'Sa Kaeo'),
(2166, 92, 'Sakon Nakhon'),
(2167, 92, 'Samut Prakan'),
(2168, 92, 'Samut Sakhon'),
(2169, 92, 'Samut Songkhran'),
(2170, 92, 'Saraburi'),
(2172, 92, 'Si Sa Ket'),
(2173, 92, 'Sing Buri'),
(2174, 92, 'Songkhla'),
(2175, 92, 'Sukhothai'),
(2176, 92, 'Suphan Buri'),
(2177, 92, 'Surat Thani'),
(2178, 92, 'Surin'),
(2180, 92, 'Trang'),
(2182, 92, 'Ubon Ratchathani'),
(2183, 92, 'Udon Thani'),
(2184, 92, 'Uthai Thani'),
(2185, 92, 'Uttaradit'),
(2186, 92, 'Yala'),
(2187, 92, 'Yasothon'),
(2188, 69, 'Busan'),
(2189, 69, 'Daegu'),
(2191, 69, 'Gangwon'),
(2192, 69, 'Gwangju'),
(2193, 69, 'Gyeonggi'),
(2194, 69, 'Gyeongsangbuk'),
(2195, 69, 'Gyeongsangnam'),
(2196, 69, 'Jeju'),
(2201, 25, 'Delhi'),
(2202, 81, 'Region de Los Rios'),
(2203, 81, 'Region de Arica y Parinacota');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `id_factura` int(11) NOT NULL,
  `numero_factura` int(11) NOT NULL,
  `fecha_factura` varchar(30) NOT NULL,
  `idProveedor` int(11) NOT NULL,
  `idProd` varchar(1000) NOT NULL,
  `total_compra` decimal(30,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

CREATE TABLE `gastos` (
  `idGasto` int(11) NOT NULL,
  `descripcion` varchar(80) NOT NULL,
  `comprobante` varchar(20) NOT NULL,
  `folio_gasto` varchar(80) NOT NULL,
  `fecha_gasto` varchar(20) NOT NULL,
  `fecha_registro` varchar(20) NOT NULL,
  `monto` decimal(30,2) NOT NULL,
  `idSucursal` int(11) NOT NULL,
  `idVendedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `gastos`
--

INSERT INTO `gastos` (`idGasto`, `descripcion`, `comprobante`, `folio_gasto`, `fecha_gasto`, `fecha_registro`, `monto`, `idSucursal`, `idVendedor`) VALUES
(1, 'fjsdlakfjdl', 'nota', '8978kj', '2020-01-15', '2020-01-15 , 13:42:1', '500.00', 1, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `idMarca` int(10) NOT NULL,
  `CodigoMarca` varchar(30) NOT NULL,
  `NombreMarca` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`idMarca`, `CodigoMarca`, `NombreMarca`) VALUES
(3, '0001', 'GENERICO'),
(4, '0002', 'SAMSUNG'),
(5, '0003', '¡7S'),
(6, '004', 'JBL'),
(7, '009', 'ONIX'),
(8, '00010', 'LINKEDPRO'),
(9, '00011', 'SAXXON'),
(10, '009', 'EPCOM TITANIUM'),
(11, '008', 'TP-LINK'),
(12, '00013', 'Dahua'),
(13, '009', 'SFIRE'),
(14, '998', 'EPCOM POWER LINE'),
(15, '880', 'ADATA'),
(16, '2451', 'ACTECK'),
(17, '488', 'JHETA'),
(18, '0978', 'SILIMEX'),
(19, '005', 'UBIQUITI NETWORKS'),
(20, '004', 'EPSON'),
(21, '002', 'VORAGO'),
(22, '748', 'HINK VISION'),
(23, '789', 'MANHATTAN'),
(24, '892', 'SEAGATE'),
(25, '892', 'SEAGATE'),
(26, '892', 'SEAGATE'),
(27, '892', 'SEAGATE'),
(28, '892', 'TOSHIBA'),
(29, '563', 'MERCUSYS'),
(30, '03', 'TRUEBASIX'),
(31, '05', 'GREEN LEAF'),
(32, '08', 'BIOSTAR'),
(33, '010', 'KINGSTON '),
(34, 'OVALTECH', 'OVALTECH'),
(35, 'EPCOM', 'EPCOM'),
(36, 'EDGE', 'EDGE'),
(37, 'MIKRO TIK', 'MIKRO TIK'),
(38, 'LENOVO', 'LENOVO'),
(39, 'HP', 'HP'),
(40, 'ACCESSPRO', 'ACCESSPRO'),
(41, 'ICOM', 'ICOM'),
(42, 'THORSMAN', 'THORSMAN'),
(43, 'INTELLINE', 'INTELLINET'),
(44, 'SCHNEIDER', 'SCHNEIDER ELECTRIC'),
(45, 'XMR', 'XMR'),
(46, 'XUPERTONE', 'XUPERTONER'),
(47, 'SIN MARCA', 'SIN MARCA'),
(48, 'RANK REMI', 'RANKREMIX'),
(49, 'TICON POW', 'TICON POWER'),
(50, 'CATRIDGE', 'CATRIDGE'),
(51, '002', 'kingston'),
(52, 'BT-RECEIV', 'BT-RECEIVER'),
(53, 'ON TENCK', 'ON TENCK'),
(54, 'SAMSUNG', 'SAMSUNG'),
(55, 'WIRELESS', 'WIRELESS'),
(56, 'WIRELESS', 'WIRELESS'),
(57, 'WIRELESS', 'WIRELESS'),
(58, 'WIRELESS', 'WIRELESS'),
(59, 'WIRELESS', 'WIRELESS'),
(60, 'SUMEX', 'SUMEX'),
(61, 'APPLE', 'APPLE'),
(62, '5852', 'LG'),
(63, '1540', 'SUMEX'),
(64, '198411', 'BLOCKBOX'),
(65, '745', 'SUMEX'),
(66, '99', 'STEREN'),
(67, '98', 'MITZU'),
(68, '97', 'MOTOROLA'),
(69, 'EL', 'EASY LINE'),
(70, 'AC', 'ACER'),
(71, 'CD', 'CARTRIDGE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mis_facturas`
--

CREATE TABLE `mis_facturas` (
  `idFact` int(11) NOT NULL,
  `folio_factura` int(11) NOT NULL,
  `fecha_emision` varchar(30) NOT NULL,
  `idVenta` int(11) NOT NULL,
  `tipoVenta` varchar(20) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idVendedor` int(11) NOT NULL,
  `total_factura` decimal(30,2) NOT NULL,
  `documento` varchar(50) NOT NULL,
  `folio_fiscal` text NOT NULL,
  `url` text NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mis_facturas`
--

INSERT INTO `mis_facturas` (`idFact`, `folio_factura`, `fecha_emision`, `idVenta`, `tipoVenta`, `idCliente`, `idVendedor`, `total_factura`, `documento`, `folio_fiscal`, `url`, `status`) VALUES
(1, 1, '02/01/2020 , 15:06:34', 73, 'contado', 2, 10, '184.99', '', '', '', ''),
(2, 2, '02/01/2020 , 15:07:01', 73, 'contado', 2, 10, '184.99', '', '', '', ''),
(3, 3, '02/01/2020 , 15:07:27', 73, 'contado', 2, 10, '184.99', '', '', '', ''),
(4, 4, '02/01/2020 , 15:09:24', 74, 'contado', 2, 10, '500.00', '', '', '', ''),
(5, 5, '02/01/2020 , 15:14:46', 75, 'contado', 2, 10, '554.35', '', '', '', ''),
(6, 6, '02/01/2020 , 15:15:13', 75, 'contado', 2, 10, '554.35', '', '', '', ''),
(7, 7, '02/01/2020 , 15:15:39', 75, 'contado', 2, 10, '554.35', '', '', '', ''),
(8, 8, '02/01/2020 , 15:19:14', 75, 'contado', 2, 10, '554.35', '', '', '', ''),
(9, 9, '02/01/2020 , 15:19:40', 75, 'contado', 2, 10, '554.35', '', '', '', ''),
(10, 10, '02/01/2020 , 15:23:29', 76, 'contado', 1, 10, '2588.70', '', '', '', ''),
(11, 11, '02/01/2020 , 15:24:35', 76, 'contado', 2, 10, '2588.70', '', '', '', ''),
(12, 12, '15/01/2020 , 16:20:08', 87, 'contado', 2, 10, '10000.00', '', '', '', ''),
(13, 13, '15/01/2020 , 16:21:28', 88, 'contado', 2, 10, '24000.00', '', '', '', ''),
(14, 14, '15/01/2020 , 16:26:44', 88, 'contado', 2, 10, '24000.00', '', '', '', ''),
(15, 15, '15/01/2020 , 16:27:26', 88, 'contado', 2, 10, '24000.00', '', '', '', ''),
(16, 16, '15/01/2020 , 16:27:59', 88, 'contado', 2, 10, '24000.00', '', '', '', ''),
(17, 17, '15/01/2020 , 16:28:27', 88, 'contado', 2, 10, '24000.00', '', '', '', ''),
(18, 18, '15/01/2020 , 16:34:47', 89, 'contado', 2, 10, '36000.00', '', '', '', ''),
(19, 19, '15/01/2020 , 16:35:06', 89, 'contado', 2, 10, '36000.00', '', '', '', ''),
(20, 20, '15/01/2020 , 16:35:19', 89, 'contado', 2, 10, '36000.00', '', '', '', ''),
(21, 21, '16/01/2020 , 09:22:33', 90, 'contado', 2, 10, '47990.00', '', 'D3338CF0-2128-4F89-B4F2-BFF723616202', '', ''),
(22, 22, '16/01/2020 , 09:22:54', 90, 'contado', 2, 10, '47990.00', '', 'D3338CF0-2128-4F89-B4F2-BFF723616202', '', ''),
(23, 23, '16/01/2020 , 09:39:48', 90, 'contado', 2, 10, '47990.00', '', 'D3338CF0-2128-4F89-B4F2-BFF723616202', '', ''),
(24, 24, '16/01/2020 , 09:54:28', 91, 'contado', 2, 10, '34990.00', '', '3A594BB9-3ABB-46E2-BF2B-1748B3FA8383', '', ''),
(25, 25, '16/01/2020 , 12:00:56', 96, 'contado', 2, 10, '945.40', '', '', '', ''),
(26, 26, '16/01/2020 , 12:01:49', 96, 'contado', 2, 10, '945.40', '', '', '', ''),
(27, 27, '16/01/2020 , 12:02:39', 96, 'contado', 2, 10, '945.40', '', '', '', ''),
(28, 28, '16/01/2020 , 18:11:06', 97, 'contado', 2, 5, '387.00', '', 'B4126560-68F3-4908-9DB9-9DB3E0E82D2E', '', ''),
(29, 29, '16/01/2020 , 18:13:01', 98, 'contado', 2, 5, '2690.00', '', '9A2AE46F-307D-4D99-AA0D-D446C1A66060', '', ''),
(30, 30, '20/01/2020 , 10:06:50', 24, 'credito', 2, 5, '906.99', '', '447F61DD-B375-4104-8052-A70DC4AB8AEC', '', ''),
(31, 31, '20/01/2020 , 10:17:35', 25, 'credito', 2, 5, '652.50', '', '', '', ''),
(32, 32, '20/01/2020 , 10:20:15', 26, 'credito', 2, 5, '2190.98', '', 'FD6490E9-FD77-4849-A8AC-E727F17CB0FF', '', ''),
(33, 33, '20/01/2020 , 10:30:47', 27, 'credito', 2, 5, '846.48', '', '', '', ''),
(34, 34, '20/01/2020 , 10:31:58', 27, 'credito', 2, 5, '846.48', '', '', '', ''),
(35, 35, '20/01/2020 , 10:36:27', 27, 'credito', 2, 5, '846.48', '', '', '', ''),
(36, 36, '20/01/2020 , 10:37:53', 27, 'credito', 2, 5, '846.48', '', '', '', ''),
(37, 37, '20/01/2020 , 10:38:18', 27, 'credito', 2, 5, '846.48', '', '', '', ''),
(38, 38, '20/01/2020 , 10:40:41', 27, 'credito', 2, 5, '846.48', '', '', '', ''),
(39, 39, '20/01/2020 , 10:44:02', 27, 'credito', 2, 5, '846.48', '', '', '', ''),
(40, 40, '20/01/2020 , 10:45:07', 28, 'credito', 2, 5, '162.49', '', '0D5D17FF-D2FA-42DC-ACF5-986FE593BB29', '', ''),
(41, 41, '20/01/2020 , 10:48:15', 29, 'credito', 2, 5, '949.75', '', 'C73D7F20-193E-493A-BCFE-78DBBB5A5FE4', '', ''),
(42, 42, '20/01/2020 , 10:53:31', 30, 'credito', 2, 5, '3407.50', '', 'B43ACB68-B812-48DB-B96F-445AD99C4BD3', '', ''),
(43, 43, '20/01/2020 , 10:55:06', 31, 'credito', 2, 5, '195.75', '', '5ED84583-D17E-4D2D-8B28-A1CC1B5855BB', '', ''),
(44, 44, '20/01/2020 , 10:56:34', 32, 'credito', 2, 5, '464.99', '', 'E59B7177-8EA7-4640-88DF-F8C4B0943199', '', ''),
(45, 45, '20/01/2020 , 10:58:11', 33, 'credito', 2, 5, '1326.43', '', '43179BCA-58E2-4D0D-897C-F63A31784BE7', 'https://app.facturadigital.com.mx/docs/pdf/43179BCA-58E2-4D0D-897C-F63A31784BE7/43179BCA-58E2-4D0D-897C-F63A31784BE7.pdf', ''),
(46, 46, '20/01/2020 , 11:05:36', 33, 'credito', 2, 5, '1326.43', '', '43179BCA-58E2-4D0D-897C-F63A31784BE7', 'https://app.facturadigital.com.mx/docs/pdf/43179BCA-58E2-4D0D-897C-F63A31784BE7/43179BCA-58E2-4D0D-897C-F63A31784BE7.pdf', ''),
(47, 47, '20/01/2020 , 11:06:39', 33, 'credito', 2, 5, '1326.43', '', '43179BCA-58E2-4D0D-897C-F63A31784BE7', 'https://app.facturadigital.com.mx/docs/pdf/43179BCA-58E2-4D0D-897C-F63A31784BE7/43179BCA-58E2-4D0D-897C-F63A31784BE7.pdf', ''),
(48, 48, '20/01/2020 , 12:40:45', 33, 'credito', 2, 5, '1326.43', '', '43179BCA-58E2-4D0D-897C-F63A31784BE7', 'https://app.facturadigital.com.mx/docs/pdf/43179BCA-58E2-4D0D-897C-F63A31784BE7/43179BCA-58E2-4D0D-897C-F63A31784BE7.pdf', ''),
(49, 49, '20/01/2020 , 12:44:50', 33, 'credito', 2, 5, '1326.43', '', '43179BCA-58E2-4D0D-897C-F63A31784BE7', 'https://app.facturadigital.com.mx/docs/pdf/43179BCA-58E2-4D0D-897C-F63A31784BE7/43179BCA-58E2-4D0D-897C-F63A31784BE7.pdf', ''),
(50, 50, '20/01/2020 , 12:47:26', 33, 'credito', 2, 5, '1326.43', '', '43179BCA-58E2-4D0D-897C-F63A31784BE7', 'https://app.facturadigital.com.mx/docs/pdf/43179BCA-58E2-4D0D-897C-F63A31784BE7/43179BCA-58E2-4D0D-897C-F63A31784BE7.pdf', ''),
(51, 51, '20/01/2020 , 12:48:04', 33, 'credito', 2, 5, '1326.43', '', '43179BCA-58E2-4D0D-897C-F63A31784BE7', 'https://app.facturadigital.com.mx/docs/pdf/43179BCA-58E2-4D0D-897C-F63A31784BE7/43179BCA-58E2-4D0D-897C-F63A31784BE7.pdf', ''),
(52, 52, '20/01/2020 , 12:51:10', 33, 'credito', 2, 5, '1326.43', '', '43179BCA-58E2-4D0D-897C-F63A31784BE7', 'https://app.facturadigital.com.mx/docs/pdf/43179BCA-58E2-4D0D-897C-F63A31784BE7/43179BCA-58E2-4D0D-897C-F63A31784BE7.pdf', ''),
(53, 53, '20/01/2020 , 12:52:44', 33, 'credito', 2, 5, '1326.43', '', '43179BCA-58E2-4D0D-897C-F63A31784BE7', 'https://app.facturadigital.com.mx/docs/pdf/43179BCA-58E2-4D0D-897C-F63A31784BE7/43179BCA-58E2-4D0D-897C-F63A31784BE7.pdf', ''),
(54, 54, '20/01/2020 , 12:53:01', 33, 'credito', 2, 5, '1326.43', '', '43179BCA-58E2-4D0D-897C-F63A31784BE7', 'https://app.facturadigital.com.mx/docs/pdf/43179BCA-58E2-4D0D-897C-F63A31784BE7/43179BCA-58E2-4D0D-897C-F63A31784BE7.pdf', ''),
(55, 55, '20/01/2020 , 12:56:38', 33, 'credito', 2, 5, '1326.43', '', '43179BCA-58E2-4D0D-897C-F63A31784BE7', 'https://app.facturadigital.com.mx/docs/pdf/43179BCA-58E2-4D0D-897C-F63A31784BE7/43179BCA-58E2-4D0D-897C-F63A31784BE7.pdf', ''),
(56, 56, '20/01/2020 , 12:58:18', 33, 'credito', 2, 5, '1326.43', '', '43179BCA-58E2-4D0D-897C-F63A31784BE7', 'https://app.facturadigital.com.mx/docs/pdf/43179BCA-58E2-4D0D-897C-F63A31784BE7/43179BCA-58E2-4D0D-897C-F63A31784BE7.pdf', ''),
(57, 57, '20/01/2020 , 12:59:06', 33, 'credito', 2, 5, '1326.43', '', '43179BCA-58E2-4D0D-897C-F63A31784BE7', 'https://app.facturadigital.com.mx/docs/pdf/43179BCA-58E2-4D0D-897C-F63A31784BE7/43179BCA-58E2-4D0D-897C-F63A31784BE7.pdf', ''),
(58, 58, '20/01/2020 , 12:59:50', 33, 'credito', 2, 5, '1326.43', '', '43179BCA-58E2-4D0D-897C-F63A31784BE7', 'https://app.facturadigital.com.mx/docs/pdf/43179BCA-58E2-4D0D-897C-F63A31784BE7/43179BCA-58E2-4D0D-897C-F63A31784BE7.pdf', ''),
(59, 59, '20/01/2020 , 13:11:21', 33, 'credito', 2, 5, '1326.43', '', '43179BCA-58E2-4D0D-897C-F63A31784BE7', 'https://app.facturadigital.com.mx/docs/pdf/43179BCA-58E2-4D0D-897C-F63A31784BE7/43179BCA-58E2-4D0D-897C-F63A31784BE7.pdf', ''),
(60, 60, '20/01/2020 , 13:12:21', 33, 'credito', 2, 5, '1326.43', '', '43179BCA-58E2-4D0D-897C-F63A31784BE7', 'https://app.facturadigital.com.mx/docs/pdf/43179BCA-58E2-4D0D-897C-F63A31784BE7/43179BCA-58E2-4D0D-897C-F63A31784BE7.pdf', ''),
(61, 61, '20/01/2020 , 13:29:29', 34, 'credito', 2, 5, '1893.44', '', '7C5FBE66-C384-4F4B-BE99-A4AA21CBD3D8', '', ''),
(62, 62, '20/01/2020 , 13:35:17', 34, 'credito', 2, 5, '1893.44', '', '', '', ''),
(63, 63, '20/01/2020 , 13:37:04', 34, 'credito', 2, 5, '1893.44', '', '', '', ''),
(64, 64, '20/01/2020 , 13:38:27', 35, 'credito', 2, 5, '2426.06', '', '9FD963D3-F144-4AB8-B635-4CA1E9335A72', '', ''),
(65, 65, '20/01/2020 , 13:39:15', 35, 'credito', 2, 5, '2426.06', '', '9FD963D3-F144-4AB8-B635-4CA1E9335A72', '', ''),
(66, 66, '20/01/2020 , 13:39:57', 35, 'credito', 2, 5, '2426.06', '', '9FD963D3-F144-4AB8-B635-4CA1E9335A72', '', ''),
(67, 67, '20/01/2020 , 13:40:32', 35, 'credito', 2, 5, '2426.06', '', '9FD963D3-F144-4AB8-B635-4CA1E9335A72', '', ''),
(68, 68, '20/01/2020 , 13:41:13', 35, 'credito', 2, 5, '2426.06', '', '9FD963D3-F144-4AB8-B635-4CA1E9335A72', '', ''),
(69, 69, '20/01/2020 , 13:41:33', 35, 'credito', 2, 5, '2426.06', '', '9FD963D3-F144-4AB8-B635-4CA1E9335A72', '', ''),
(70, 70, '20/01/2020 , 13:41:46', 35, 'credito', 2, 5, '2426.06', '', '9FD963D3-F144-4AB8-B635-4CA1E9335A72', '', ''),
(71, 71, '20/01/2020 , 13:42:12', 35, 'credito', 2, 5, '2426.06', '', '9FD963D3-F144-4AB8-B635-4CA1E9335A72', '', ''),
(72, 72, '20/01/2020 , 13:44:11', 35, 'credito', 2, 5, '2426.06', '', '9FD963D3-F144-4AB8-B635-4CA1E9335A72', '', ''),
(73, 73, '20/01/2020 , 13:50:22', 36, 'credito', 2, 5, '1589.97', '', '6B44C613-1E80-4631-9CCE-9B81E5E20686', '', ''),
(74, 74, '20/01/2020 , 13:57:09', 37, 'credito', 2, 5, '8939.77', '', 'B7FF6980-A668-44E4-A599-570CE7911EDC', '', ''),
(75, 75, '20/01/2020 , 14:17:00', 38, 'credito', 2, 5, '594.50', '', '9C9E7A5C-9276-4249-84B0-4848B24D4DD0', '', ''),
(77, 77, '20/01/2020 , 14:32:03', 39, 'credito', 2, 5, '699.97', '', '', '', ''),
(78, 78, '21/01/2020 , 09:46:03', 40, 'credito', 2, 5, '943.24', '', 'ABCE7A2F-F762-4CD5-B45C-E0CACFE2FFE8', 'https://app.facturadigital.com.mx/docs/pdf/ABCE7A2F-F762-4CD5-B45C-E0CACFE2FFE8/ABCE7A2F-F762-4CD5-B45C-E0CACFE2FFE8.pdf', ''),
(79, 79, '21/01/2020 , 10:35:27', 101, 'contado', 2, 5, '680.00', '', '28157CA3-1103-48D0-9070-5AC7ED798AFA', 'https://app.facturadigital.com.mx/docs/pdf/28157CA3-1103-48D0-9070-5AC7ED798AFA/28157CA3-1103-48D0-9070-5AC7ED798AFA.pdf', ''),
(80, 80, '21/01/2020 , 14:12:57', 33, 'credito', 2, 5, '1326.43', '', '43179BCA-58E2-4D0D-897C-F63A31784BE7', 'https://app.facturadigital.com.mx/docs/pdf/43179BCA-58E2-4D0D-897C-F63A31784BE7/43179BCA-58E2-4D0D-897C-F63A31784BE7.pdf', ''),
(81, 81, '23/01/2020 , 10:02:09', 16, 'credito', 2, 5, '652.50', '', '9247D3B3-FDE3-4C99-83E4-64B9DFADEFFE', 'https://app.facturadigital.com.mx/docs/pdf/9247D3B3-FDE3-4C99-83E4-64B9DFADEFFE/9247D3B3-FDE3-4C99-83E4-64B9DFADEFFE.pdf', ''),
(82, 82, '24/01/2020 , 13:14:11', 41, 'credito', 2, 5, '943.24', '', 'ED8EA370-DF7C-4E0D-B943-BF55FE761B92', 'https://app.facturadigital.com.mx/docs/pdf/ED8EA370-DF7C-4E0D-B943-BF55FE761B92/ED8EA370-DF7C-4E0D-B943-BF55FE761B92.pdf', ''),
(83, 83, '27/01/2020 , 13:19:18', 106, 'contado', 2, 9, '660.00', '', '', '', ''),
(84, 83, '27/01/2020 , 13:19:46', 106, 'contado', 2, 9, '660.00', '', '', '', ''),
(85, 83, '27/01/2020 , 13:20:39', 106, 'contado', 2, 9, '660.00', '', '', '', ''),
(86, 83, '27/01/2020 , 13:25:55', 107, 'contado', 2, 9, '789.80', '', '0192B7C9-BDAC-4612-ADE9-AABFE5D3BB4A', 'https://app.facturadigital.com.mx/docs/pdf/0192B7C9-BDAC-4612-ADE9-AABFE5D3BB4A/0192B7C9-BDAC-4612-ADE9-AABFE5D3BB4A.pdf', ''),
(87, 84, '27/01/2020 , 13:56:12', 108, 'contado', 2, 9, '570.00', '', '64E98D81-5C71-4A6C-8AA5-31D94CD96474', 'https://app.facturadigital.com.mx/docs/pdf/64E98D81-5C71-4A6C-8AA5-31D94CD96474/64E98D81-5C71-4A6C-8AA5-31D94CD96474.pdf', ''),
(88, 85, '27/01/2020 , 13:58:49', 108, 'contado', 2, 9, '570.00', '', '64E98D81-5C71-4A6C-8AA5-31D94CD96474', 'https://app.facturadigital.com.mx/docs/pdf/64E98D81-5C71-4A6C-8AA5-31D94CD96474/64E98D81-5C71-4A6C-8AA5-31D94CD96474.pdf', ''),
(89, 86, '28/01/2020 , 19:45:39', 109, 'contado', 2, 10, '700.00', '', '222F908C-6CFD-4FC0-B8C4-0D4FB7A39C15', 'https://app.facturadigital.com.mx/docs/pdf/222F908C-6CFD-4FC0-B8C4-0D4FB7A39C15/222F908C-6CFD-4FC0-B8C4-0D4FB7A39C15.pdf', ''),
(90, 87, '28/01/2020 , 19:51:18', 109, 'contado', 2, 10, '700.00', '', '222F908C-6CFD-4FC0-B8C4-0D4FB7A39C15', 'https://app.facturadigital.com.mx/docs/pdf/222F908C-6CFD-4FC0-B8C4-0D4FB7A39C15/222F908C-6CFD-4FC0-B8C4-0D4FB7A39C15.pdf', ''),
(91, 88, '28/01/2020 , 19:54:38', 109, 'contado', 2, 10, '700.00', '', '222F908C-6CFD-4FC0-B8C4-0D4FB7A39C15', 'https://app.facturadigital.com.mx/docs/pdf/222F908C-6CFD-4FC0-B8C4-0D4FB7A39C15/222F908C-6CFD-4FC0-B8C4-0D4FB7A39C15.pdf', ''),
(92, 89, '28/01/2020 , 19:56:26', 109, 'contado', 2, 10, '700.00', '', '222F908C-6CFD-4FC0-B8C4-0D4FB7A39C15', 'https://app.facturadigital.com.mx/docs/pdf/222F908C-6CFD-4FC0-B8C4-0D4FB7A39C15/222F908C-6CFD-4FC0-B8C4-0D4FB7A39C15.pdf', ''),
(93, 90, '28/01/2020 , 20:01:53', 109, 'contado', 2, 10, '700.00', '', '222F908C-6CFD-4FC0-B8C4-0D4FB7A39C15', 'https://app.facturadigital.com.mx/docs/pdf/222F908C-6CFD-4FC0-B8C4-0D4FB7A39C15/222F908C-6CFD-4FC0-B8C4-0D4FB7A39C15.pdf', ''),
(94, 91, '31/01/2020 , 14:19:45', 110, 'contado', 2, 5, '6260.00', '', '8EAAB8E0-C8C1-43EF-A08B-4413C12AC304', 'https://app.facturadigital.com.mx/docs/pdf/8EAAB8E0-C8C1-43EF-A08B-4413C12AC304/8EAAB8E0-C8C1-43EF-A08B-4413C12AC304.pdf', ''),
(95, 92, '31/01/2020 , 14:20:06', 110, 'contado', 2, 5, '6260.00', '', '8EAAB8E0-C8C1-43EF-A08B-4413C12AC304', 'https://app.facturadigital.com.mx/docs/pdf/8EAAB8E0-C8C1-43EF-A08B-4413C12AC304/8EAAB8E0-C8C1-43EF-A08B-4413C12AC304.pdf', ''),
(96, 93, '31/01/2020 , 14:21:00', 110, 'contado', 2, 5, '6260.00', '', '8EAAB8E0-C8C1-43EF-A08B-4413C12AC304', 'https://app.facturadigital.com.mx/docs/pdf/8EAAB8E0-C8C1-43EF-A08B-4413C12AC304/8EAAB8E0-C8C1-43EF-A08B-4413C12AC304.pdf', ''),
(97, 94, '31/01/2020 , 14:21:22', 110, 'contado', 2, 5, '6260.00', '', '8EAAB8E0-C8C1-43EF-A08B-4413C12AC304', 'https://app.facturadigital.com.mx/docs/pdf/8EAAB8E0-C8C1-43EF-A08B-4413C12AC304/8EAAB8E0-C8C1-43EF-A08B-4413C12AC304.pdf', ''),
(98, 95, '01/05/2021 , 03:26:02', 112, 'contado', 2, 5, '765.00', '', '77B2839A-F1A3-409C-A607-B1913DD9C41D', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `idNota` int(11) NOT NULL,
  `folioNota` varchar(30) NOT NULL,
  `idProd` varchar(20) NOT NULL,
  `costoTotal` decimal(30,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`idNota`, `folioNota`, `idProd`, `costoTotal`) VALUES
(1, '0679', ' 120,1 495,8 120,1 4', '683.60');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `idPais` int(11) NOT NULL,
  `paisnombre` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`idPais`, `paisnombre`) VALUES
(1, 'Australia'),
(2, 'Austria'),
(3, 'Azerbaiyan'),
(4, 'Anguilla'),
(5, 'Argentina'),
(6, 'Armenia'),
(7, 'Bielorrusia'),
(8, 'Belice'),
(9, 'Belgica'),
(10, 'Bermudas'),
(11, 'Bulgaria'),
(12, 'Brasil'),
(13, 'Reino Unido'),
(14, 'Hungria'),
(15, 'Vietnam'),
(16, 'Haiti'),
(17, 'Guadalupe'),
(18, 'Alemania'),
(19, 'Paises Bajos, Holanda'),
(20, 'Grecia'),
(21, 'Georgia'),
(22, 'Dinamarca'),
(23, 'Egipto'),
(24, 'Israel'),
(25, 'India'),
(26, 'Iran'),
(27, 'Irlanda'),
(28, 'Espa├▒a'),
(29, 'Italia'),
(30, 'Kazajstan'),
(31, 'Camerun'),
(32, 'Canada'),
(33, 'Chipre'),
(34, 'Kirguistan'),
(35, 'China'),
(36, 'Costa Rica'),
(37, 'Kuwait'),
(38, 'Letonia'),
(39, 'Libia'),
(40, 'Lituania'),
(41, 'Luxemburgo'),
(42, 'Mexico'),
(43, 'Moldavia'),
(44, 'Monaco'),
(45, 'Nueva Zelanda'),
(46, 'Noruega'),
(47, 'Polonia'),
(48, 'Portugal'),
(49, 'Reunion'),
(50, 'Rusia'),
(51, 'El Salvador'),
(52, 'Eslovaquia'),
(53, 'Eslovenia'),
(54, 'Surinam'),
(55, 'Estados Unidos'),
(56, 'Tadjikistan'),
(57, 'Turkmenistan'),
(58, 'Islas Turcas y Caicos'),
(59, 'Turquia'),
(60, 'Uganda'),
(61, 'Uzbekistan'),
(62, 'Ucrania'),
(63, 'Finlandia'),
(64, 'Francia'),
(65, 'Republica Checa'),
(66, 'Suiza'),
(67, 'Suecia'),
(68, 'Estonia'),
(69, 'Corea del Sur'),
(70, 'Japon'),
(71, 'Croacia'),
(72, 'Rumania'),
(73, 'Hong Kong'),
(74, 'Indonesia'),
(75, 'Jordania'),
(76, 'Malasia'),
(77, 'Singapur'),
(78, 'Taiwan'),
(79, 'Bosnia y Herzegovina'),
(80, 'Bahamas'),
(81, 'Chile'),
(82, 'Colombia'),
(83, 'Islandia'),
(84, 'Corea del Norte'),
(85, 'Macedonia'),
(86, 'Malta'),
(87, 'Pakistan'),
(88, 'Papua-Nueva Guinea'),
(89, 'Peru'),
(90, 'Filipinas'),
(91, 'Arabia Saudita'),
(92, 'Tailandia'),
(93, 'Emiratos arabes Unidos'),
(94, 'Groenlandia'),
(95, 'Venezuela'),
(96, 'Zimbabwe'),
(97, 'Kenia'),
(98, 'Algeria'),
(99, 'Libano'),
(100, 'Botsuana'),
(101, 'Tanzania'),
(102, 'Namibia'),
(103, 'Ecuador'),
(104, 'Marruecos'),
(105, 'Ghana'),
(106, 'Siria'),
(107, 'Nepal'),
(108, 'Mauritania'),
(109, 'Seychelles'),
(110, 'Paraguay'),
(111, 'Uruguay'),
(112, 'Congo (Brazzaville)'),
(113, 'Cuba'),
(114, 'Albania'),
(115, 'Nigeria'),
(116, 'Zambia'),
(117, 'Mozambique'),
(119, 'Angola'),
(120, 'Sri Lanka'),
(121, 'Etiopia'),
(122, 'Tunez'),
(123, 'Bolivia'),
(124, 'Panama'),
(125, 'Malawi'),
(126, 'Liechtenstein'),
(127, 'Bahrein'),
(128, 'Barbados'),
(130, 'Chad'),
(131, 'Man, Isla de'),
(132, 'Jamaica'),
(133, 'Mali'),
(134, 'Madagascar'),
(135, 'Senegal'),
(136, 'Togo'),
(137, 'Honduras'),
(138, 'Republica Dominicana'),
(139, 'Mongolia'),
(140, 'Irak'),
(141, 'Sudafrica'),
(142, 'Aruba'),
(143, 'Gibraltar'),
(144, 'Afganistan'),
(145, 'Andorra'),
(147, 'Antigua y Barbuda'),
(149, 'Bangladesh'),
(151, 'Benin'),
(152, 'Butan'),
(154, 'Islas Virgenes Britanicas'),
(155, 'Brunei'),
(156, 'Burkina Faso'),
(157, 'Burundi'),
(158, 'Camboya'),
(159, 'Cabo Verde'),
(164, 'Comores'),
(165, 'Congo (Kinshasa)'),
(166, 'Cook, Islas'),
(168, 'Costa de Marfil'),
(169, 'Djibouti, Yibuti'),
(171, 'Timor Oriental'),
(172, 'Guinea Ecuatorial'),
(173, 'Eritrea'),
(175, 'Feroe, Islas'),
(176, 'Fiyi'),
(178, 'Polinesia Francesa'),
(180, 'Gabon'),
(181, 'Gambia'),
(184, 'Granada'),
(185, 'Guatemala'),
(186, 'Guernsey'),
(187, 'Guinea'),
(188, 'Guinea-Bissau'),
(189, 'Guyana'),
(193, 'Jersey'),
(195, 'Kiribati'),
(196, 'Laos'),
(197, 'Lesotho'),
(198, 'Liberia'),
(200, 'Maldivas'),
(201, 'Martinica'),
(202, 'Mauricio'),
(205, 'Myanmar'),
(206, 'Nauru'),
(207, 'Antillas Holandesas'),
(208, 'Nueva Caledonia'),
(209, 'Nicaragua'),
(210, 'Niger'),
(212, 'Norfolk Island'),
(213, 'Oman'),
(215, 'Isla Pitcairn'),
(216, 'Qatar'),
(217, 'Ruanda'),
(218, 'Santa Elena'),
(219, 'San Cristobal y Nevis'),
(220, 'Santa Lucia'),
(221, 'San Pedro y Miquelon'),
(222, 'San Vincente y Granadinas'),
(223, 'Samoa'),
(224, 'San Marino'),
(225, 'San Tom├® y Principe'),
(226, 'Serbia y Montenegro'),
(227, 'Sierra Leona'),
(228, 'Islas Salomon'),
(229, 'Somalia'),
(232, 'Sudan'),
(234, 'Swazilandia'),
(235, 'Tokelau'),
(236, 'Tonga'),
(237, 'Trinidad y Tobago'),
(239, 'Tuvalu'),
(240, 'Vanuatu'),
(241, 'Wallis y Futuna'),
(242, 'Sahara Occidental'),
(243, 'Yemen'),
(246, 'Puerto Rico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `idPedido` int(11) NOT NULL,
  `folioPedido` varchar(25) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idDireccion` int(11) NOT NULL,
  `totalPedido` decimal(30,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_productos`
--

CREATE TABLE `pedido_productos` (
  `idPedProd` int(11) NOT NULL,
  `idPedido` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precios`
--

CREATE TABLE `precios` (
  `idPrecio` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  `porcentaje` decimal(30,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `precios`
--

INSERT INTO `precios` (`idPrecio`, `descripcion`, `porcentaje`) VALUES
(1, 'Precio de Contado', '1.35'),
(2, 'Precio a Credito', '1.45'),
(3, 'Pago con tarjeta', '1.40'),
(4, 'Precio especial', '1.25'),
(5, 'Iva', '1.16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProd` int(11) NOT NULL,
  `idProveedor` int(10) NOT NULL,
  `idMarca` int(10) NOT NULL,
  `codProd` varchar(30) NOT NULL,
  `codigoSat` varchar(20) NOT NULL,
  `nombreProd` varchar(30) NOT NULL,
  `precioCosto` decimal(30,2) NOT NULL,
  `precioVenta` decimal(30,2) NOT NULL,
  `existencia` int(20) NOT NULL,
  `Imagen` varchar(150) NOT NULL,
  `desProd` varchar(30) NOT NULL,
  `idSucursal` int(11) NOT NULL,
  `siniva` int(11) NOT NULL,
  `stockDanado` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProd`, `idProveedor`, `idMarca`, `codProd`, `codigoSat`, `nombreProd`, `precioCosto`, `precioVenta`, `existencia`, `Imagen`, `desProd`, `idSucursal`, `siniva`, `stockDanado`, `idCategoria`) VALUES
(12, 4, 3, '208336', '52161514', 'Audifono on teck rojo', '35.00', '90.00', 497, 'audifonos-rojo.jpg', 'Audifonos rojos', 3, 1, 1, 1),
(13, 4, 3, 'MLS-001', '52161514', 'Manos libre blancos SM', '55.00', '110.00', 500, 'ATF3Q.png', 'Manos libres blancos Samsung 2', 3, 1, 2, 1),
(14, 4, 4, 'MLS-002', '52161514', 'Manos libres negros SM', '55.00', '110.00', 500, '1080637329.jpg', 'Manos libres negros', 3, 1, 1, 1),
(15, 4, 3, 'HS3303', '52161514', 'Audifono ML J5 ', '10.00', '45.00', 497, 'remax-auricular-manos-libres-301-candy-negros.jpg', 'Audifonos blancos ML', 3, 1, 0, 1),
(16, 4, 5, '20997', '52161514', 'Airpods blancos', '115.00', '230.00', 500, 'AirPods.jpg', 'Airpods blancos BT', 3, 1, 0, 1),
(17, 4, 6, '21022', '52161514', 'Audiculares casco BT Azul', '270.00', '400.00', 500, 'auriculares-diadema-serie-life-color-azul-volten.jpg', 'Audiculares casco BT azul', 3, 1, 0, 1),
(18, 4, 6, '21014', '52161514', 'Auriculares casco BT negro', '270.00', '420.00', 500, '1540-1.jpg', 'Auriculares casco negro BT', 3, 1, 0, 1),
(19, 4, 6, '21017', '52161514', 'Auriculares casco BT Blanco', '270.00', '430.00', 500, '1187472-1505-1-800x800.jpg', 'Auriculares casco blancos BT', 3, 1, 0, 1),
(20, 4, 3, '20990', '52161512', 'Bocina mini BT Dorado', '80.00', '170.00', 500, 'descarga.jpg', 'Bocina BT dorado ', 3, 1, 0, 1),
(21, 4, 3, '20991', '52161512', 'Bocina mini BT Dorado', '80.00', '170.00', 500, 'descarga (1).jpg', 'Bocina BT Dorado ', 3, 1, 0, 1),
(22, 4, 3, '20992', '52161512', 'Bocina mini BT azul', '80.00', '170.00', 500, 'jpg.jpg', 'Bocina mini BT azul', 3, 1, 0, 1),
(23, 4, 6, '20968', '52161512', 'Altavoces BT rojo', '150.00', '300.00', 500, 'descarga (2).jpg', 'Altavoces rojo BT', 3, 1, 2, 1),
(24, 4, 6, '20967', '52161512', 'Altavoces BT azul', '150.00', '300.00', 500, 'jbl-flip4-waterproof-portable-bluetooth-speaker-blue.jpg', 'Altavoces azul BT', 3, 1, 0, 1),
(25, 4, 6, '20969', '52161512', 'Altavoces BT verde', '150.00', '300.00', 500, 'ec68a5b00ce1666a30c5b6d530dd1dc2c603bc37.jpg', 'Altavoces BT verde', 3, 1, 0, 1),
(26, 4, 4, '20919', '43191600', 'Cargador Samsung blanco', '50.00', '150.00', 500, 'S_624221-MLV20742291106_052016-O.jpg', 'Cargador blanco Samsung', 3, 1, 0, 1),
(27, 4, 3, '21122', '43191600', 'Cargador de carro negro', '35.00', '70.00', 500, '79132-515ftw.gif', 'Cargador de carro negro', 3, 1, 0, 1),
(28, 4, 3, 'MD814CH', '43191600', 'Cargador de IPhone blanco', '60.00', '150.00', 500, 'cargador-iphone-5-5s-6-6s-7-original-cubo-5w-cable-apple-D_NQ_NP_913403-MCO26008563223_092017-F.jpg', 'Cargador blanco Iphone', 3, 1, 0, 1),
(29, 4, 3, '20819', '43191600', 'Cable V8 negro', '30.00', '80.00', 500, 'cable-v8.jpg', 'Cable para cargar V8 negro', 3, 1, 0, 1),
(30, 4, 3, '20818', '43191600', 'Cable Iphone azul', '30.00', '80.00', 500, '1540-1.jpg', 'Cable de cargador Iphone azul', 3, 1, 0, 1),
(31, 4, 3, 'CB-Bi001', '43191600', 'Cable plano Iphone blanco', '18.00', '38.00', 500, 'descarga (3).jpg', 'Cable plano  suelto blanco Iph', 3, 1, 0, 1),
(32, 4, 3, 'CB-T001', '43191600', 'Cable universal transparente', '15.00', '35.00', 500, '1000204156_sd.jpg', 'Cable universal transparente s', 3, 1, 0, 1),
(33, 4, 3, 'CB-AV8-001', '43191600', 'Cable cargador V8  azul', '15.00', '35.00', 500, 'sku_464790_1.jpg', 'Cable suelto V8 azul', 3, 1, 0, 1),
(34, 4, 3, 'CB-BV8002', '43191600', 'Cable cargador V8 blanco', '15.00', '35.00', 500, 'cable-v8-blanco-reforzado-con-filtro-mayoreo-D_NQ_NP_679342-MLM26558369853_122017-F.jpg', 'Cable v8 suelto blanco', 3, 1, 0, 1),
(35, 4, 3, 'CB-Aip001', '43191600', 'Cable cargador  Iphone azul', '15.00', '35.00', 500, '904166_656A06_portrait_HD_2.jpg', 'Cable cargador suelto azul', 3, 1, 0, 1),
(37, 4, 3, '20889', '43191600', 'Receptor de red tarjeta inalam', '55.00', '110.00', 500, '81pgqTX+mWL._SX466_.jpg', 'Receptor de red tarjeta inalam', 3, 1, 0, 1),
(38, 4, 3, '21128', '26111701', 'Bateria portatil', '90.00', '190.00', 500, 'descarga (4).jpg', 'bateria portatil blanca ', 3, 1, 0, 1),
(39, 4, 3, 'HBS-730', '52161514', 'Audifonos BT blancos ', '73.00', '160.00', 500, '23219558023c28f2b2f6a97aea5cf224-product.jpg', 'Audifonos BT blancos ', 3, 1, 0, 1),
(40, 4, 3, 'BT2105', '52161514', 'Audifonos para ejercicio gris', '117.00', '230.00', 500, 'D_NP_941431-MLM28701089630_112018-Q.jpg', 'Audifonos gris ejercicio ', 3, 1, 0, 1),
(41, 4, 3, 'BTS2106', '52161514', 'Audifonos para ejercicio rosa', '117.00', '230.00', 500, 'f0a32c85fb21dd0ca65e83087fd0d387-product.jpg', 'Audifonos para ejercicio rosa', 3, 1, 0, 1),
(42, 4, 3, 'YX26', '52161512', 'Bocina portatil azul BT', '60.00', '140.00', 500, '714FtNS515L._SX425_.jpg', 'Bocina azul portatil BT', 3, 1, 0, 1),
(43, 4, 3, 'YX27', '52161512', 'Bocina portatil rosa BT', '60.00', '140.00', 500, 'Portable-Subwoofer-Shower-Waterproof-Wireless-Bluetooth-Speaker-Car-Handsfree-Receive-Call-Music-Suction-Phone-Mic-For_1_grande.jpg', 'Bocina portatil rosa BT', 3, 1, 1, 1),
(44, 4, 3, 'D-015', '52161512', 'Bocinas duo negro BT', '45.00', '90.00', 500, 'cornetas-mini-pc-speaker-d015-g105-20-laptop-celular-D_NQ_NP_691142-MLV25980323664_092017-F.jpg', 'Bocinas duo negro BT', 3, 1, 0, 1),
(45, 4, 3, 'JL-08', '52161514', 'Audifonos cadete azul', '21.00', '50.00', 500, '2077093-1.jpg', 'Audifonos azul cadete', 3, 1, 0, 1),
(46, 4, 3, 'JL-08N', '52161514', 'Audifono cadete negro', '21.00', '50.00', 500, 'descarga.png', 'Audifono cadete negro', 3, 1, 0, 1),
(47, 4, 3, 'JL-08A', '52161514', 'Audifonos cadete amarillo', '21.00', '50.00', 500, 'descarga (5).jpg', 'Audifonos cadete amarillo', 3, 1, 0, 1),
(48, 4, 3, 'EAR-110', '52161514', 'Audifonos rosa', '27.00', '60.00', 500, 'descarga (6).jpg', 'Audifonos rosa  extra bass', 3, 1, 0, 1),
(49, 4, 3, 'EAR-110G', '52161514', 'Audifonos gris', '27.00', '60.00', 500, 'images (1).jpg', 'Audifonos gris extra bass', 3, 1, 0, 1),
(50, 4, 3, '0003ADICIERRE', '52161514', 'ADUDIFONO ZIPPER', '17.00', '38.00', 500, 'descarga (7).jpg', 'Audifono de cierre negro', 3, 1, 0, 1),
(51, 4, 3, '0003ADICIERREA', '52161514', 'Audifono cierre zipper azul', '17.00', '38.00', 500, '41ub2ku2DBL.jpg', 'Audifono cierre azul cierre', 3, 1, 0, 1),
(52, 4, 3, 'HQ001', '43191600', 'Cargador genérico blanco', '12.00', '40.00', 500, 'cargador-motorola-100-original-blanco-1a-original-c-p56-D_NQ_NP_797834-MLM26913803010_022018-F.jpg', 'Cargador genérico blanco unive', 3, 1, 0, 1),
(53, 4, 3, 'CDB017', '43191600', 'Cargador inalambrico fantasy', '45.00', '100.00', 500, 'descarga (8).jpg', 'Cargador inalambrico blanco fa', 3, 1, 0, 1),
(54, 4, 3, 'SB01', '43211708', 'Mouse negro inalambrico', '60.00', '125.00', 500, 'descarga (9).jpg', 'Mouse negro inalambrico 2.4 Gh', 3, 1, 0, 1),
(55, 4, 3, 'SB01R', '43211708', 'Mouse inalambrico rosa', '60.00', '125.00', 500, '1540-1 (1).jpg', 'Mouse inalambrico rosa 2.4 Ghz', 3, 1, 0, 1),
(56, 4, 3, 'TJ-9', '43211708', 'Led mouse negro', '45.00', '90.00', 500, 'descarga (10).jpg', 'Led mouse negro ', 3, 1, 0, 1),
(57, 4, 3, '18-8620BL', '43211708', 'Mouse multicolor azul alambric', '38.00', '72.00', 500, '18-8620BL-4.jpg', 'Mouse multicolor azul con led ', 3, 1, 0, 1),
(58, 4, 3, '18-8620SL', '43211708', 'Mouse multicolor gris alambric', '38.00', '72.00', 500, '800900284B-1.jpg', 'Mouse gris multicolor alambric', 3, 1, 0, 1),
(59, 4, 3, '18-8620RD', '43211708', 'Mouse multicolor rojo alambric', '38.00', '72.00', 500, '18-8620RD-4.jpg', 'Mouse multicolor rojo con led ', 3, 1, 0, 1),
(60, 4, 3, 'YD59', '2111701', 'Pila solar negra', '77.00', '150.00', 500, 'images (2).jpg', 'Pila solar negra ', 3, 1, 0, 1),
(61, 4, 3, '5228', '27111728', 'Juego de desarmadores de coler', '35.00', '75.00', 500, 'D_NP_822834-MLM28007891212_082018-Q.jpg', 'Juego de desarmadores de color', 3, 1, 0, 1),
(62, 4, 3, '13PCS', '27111728', 'Juego de desarmadores naranja ', '34.00', '75.00', 500, 'kit-desarmador-de-precision-8-puntas-para-celular-des1030-D_NQ_NP_960719-MLM28274238987_102018-F.jpg', 'Juego de desarmadores naranja ', 3, 1, 0, 1),
(63, 4, 3, '971835790180', '39122227', 'Mobile game controller', '160.00', '350.00', 500, '61bPONXW6sL._SX569_.jpg', 'Control para celular de videoj', 3, 1, 0, 1),
(65, 4, 3, 'JKX-001', '43191600', 'Cable USB de carga rapida negr', '29.00', '70.00', 500, 'descarga (12).jpg', 'Cable USB de carga rapida negr', 3, 1, 1, 1),
(67, 4, 3, 'USB48', '43201402', 'OTG adaptador', '5.00', '25.00', 500, 'descarga (13).jpg', 'OTG adaptador de tarjeta', 3, 1, 0, 1),
(68, 4, 3, 'CB-iPH003', '43191600', 'Cable USB Iphone blanco suelto', '10.00', '28.00', 500, 'descarga (14).jpg', 'Cable USB Iphone blanco sueltp', 3, 1, 0, 1),
(69, 4, 3, 'CAM-001', '52161605', 'Cable auxiliar metalico', '9.00', '25.00', 500, 'rBVaI1h_e4uAOygSAAG-096kcoI626.jpg', 'Cable auxiliar metalico varios', 3, 1, 0, 1),
(70, 4, 3, 'AUX-001', '52161605', 'Cable auxiliar cabete ', '8.00', '22.00', 500, '080-053_570x570_crop_top.jpg', 'Cable auxiiar cabete negro c/r', 3, 1, 0, 1),
(71, 4, 3, 'CUN_001', '43191600', 'Cable USB universal ', '11.00', '25.00', 500, 'USB-2-0-cable-0-3-m-1-5-m-3-M-5-M-macho-hembra.jpg_640x640.jpg', 'Cable USB universal suelto de ', 3, 1, 0, 1),
(72, 4, 3, 'CIG-208', '43191600', 'Cargador para carro metalico ', '15.00', '38.00', 500, 'cargador-auto-accesorios-D_NQ_NP_826500-MLM28265817017_092018-O.jpg', 'Cargador para carro colores me', 3, 1, 0, 1),
(73, 5, 7, 'A06', '43191600', 'Cargador  HP punta amarilla', '130.00', '350.00', 500, 'cargador-hp-de-185v-35a-65w-punta-amarilla.jpg', 'Cargador para computadora HP p', 3, 1, 0, 1),
(74, 4, 3, '20825', '43191610', 'Poket ring stent  metalico', '5.00', '20.00', 500, 'jewelry-box-accessories-gold-ring-stent-with-hook-909556252712_2400x.jpg', 'Poket ring stent rectangular m', 3, 1, 0, 1),
(76, 4, 3, '20996', '43191610', 'Poket c/luces', '10.00', '30.00', 500, 'Popular-Phone-Holder-Round-Pocket-Hand-Grip-Mount-Stand-Holder-Mobile-Phone-Stone-Marble-Pattern-Finger.jpg_220x220xz.jpg', 'Poket con luces varios modelos', 3, 1, 0, 1),
(77, 4, 3, '3110', '45121602', 'Tripie plata', '100.00', '250.00', 500, '1226-Tripode-para-Cámaras-y-Celulares-3110_488_1-1.png', 'Tripie color plata para celula', 3, 1, 0, 1),
(78, 4, 3, 'PC-002', '43191610', 'Pocker duo', '7.00', '17.00', 500, 'images (4).jpg', 'Poket duo varios modelos', 3, 1, 0, 1),
(79, 5, 7, 'F3-Z', '43191600', 'Cargador HP punta azul', '150.00', '400.00', 500, 'images (3).jpg', 'Cargador HP punta azul para co', 3, 1, 0, 1),
(80, 5, 7, 'CT-59', '43191600', 'Cargador HP  punta aguja', '130.00', '350.00', 500, 'cargador-hpcompaq-185v35a-punta-amarilla-o-punta-aguja-D_NQ_NP_16986-MPE20129496265_072014-O.jpg', 'Cargador HP punta aguja para c', 3, 1, 0, 1),
(81, 5, 7, 'N193', '43191600', 'Cargador TOSHIBA', '130.00', '350.00', 500, 'cargador-original-toshiba-satellite-l645d-sp400-19v-342a-D_NQ_NP_12957-MLM20069747932_032014-F.jpg', 'Cargador THOSIBA para computad', 3, 1, 0, 1),
(82, 5, 7, '11S-45', '43191600', 'Cargador LENOVO punta cuadrada', '170.00', '430.00', 500, 'descarga (15).jpg', 'Cargador LENOVO  punta cuadrad', 3, 1, 0, 1),
(83, 4, 3, 'MG-06', '52161512', 'Bocina de hongo', '85.00', '198.00', 500, '6529105-1.jpg', 'Bocina pequeña con forma de ho', 3, 1, 0, 1),
(84, 4, 3, '99252', '45111800', 'Video juego Sup game box plus', '270.00', '450.00', 500, 'rBVaWFwXJtaAIylkAAK3iIhj3_g688.jpg', 'Consola de video jugo Sup game', 3, 1, 0, 1),
(85, 4, 3, 'yxb-11', '39122227', 'Contro de videojuego BT', '160.00', '370.00', 500, 'images (5).jpg', 'Control de videojuego para cel', 3, 1, 0, 1),
(86, 4, 3, 'S3L', '45111800', 'Videojuego Sup  c/ control ', '350.00', '750.00', 500, '400-videojuegos-sup-game-box-mini-consola-10pzs-2jugadores-D_NQ_NP_650210-MLM29475226421_022019-F.jpg', 'Videojuego Sup con control ', 3, 1, 0, 1),
(87, 4, 3, 'AUT081', '52161514', 'Audifonos BT Sports', '45.00', '115.00', 500, 'descarga (16).jpg', 'Audifonos BT sports sound ster', 3, 1, 0, 1),
(88, 4, 3, 'AK-16', '39122227', 'Control para celular  PUBG', '120.00', '245.00', 500, 'descarga (17).jpg', 'Control para celular PUBG rosa', 3, 1, 0, 1),
(89, 4, 3, 'PDC-51', '23271718', 'Protector para cable de goma ', '25.00', '50.00', 500, 'descarga (18).jpg', 'Protector para cable de goma,d', 3, 1, 0, 1),
(90, 4, 3, 'R11', '39122227', 'Gatillo R11', '60.00', '100.00', 500, '65155001_144030103343062_7686638033356460383_n.jpg', 'Gatillo R11 para celular', 3, 1, 0, 1),
(91, 4, 3, 'BUG05', '39122227', 'Gatillo BUG', '60.00', '100.00', 500, 'descarga (19).jpg', 'Gatillo BUG para celular ', 3, 1, 0, 1),
(92, 4, 3, 'XYW-20', '23151821', 'Adaptador dos funciones Iphone', '15.00', '45.00', 500, 'descarga (20).jpg', 'Adaptadores dos funciones Ipho', 3, 1, 0, 1),
(93, 4, 3, 'A1510', '43191600', 'Cable Iphone para cargador 2m ', '40.00', '100.00', 500, 'descarga (21).jpg', 'Cable para Iphone 2 metros bla', 3, 1, 0, 1),
(94, 4, 3, 'MD818ZM', '43191600', 'Cable cargador Iphone ', '35.00', '70.00', 500, 'descarga (22).jpg', 'Cable de cargdor para Iphone b', 3, 1, 0, 1),
(96, 6, 8, 'SYS-PROCAT6B', '43222600', 'BOBINA DE CABLE DE 305 M (1000', '1113.50', '1830.00', 500, 'PROCAT6B-p.PNG', 'BOBINA DE CABLE DE 305 M (1000', 3, 1, 0, 1),
(97, 6, 9, 'OUTP5ECCA305G', '43222600', 'BOBINA SAXXON GRIS CATEGORIA 5', '620.00', '900.00', 500, 'D_NP_765997-MLM29488374511_022019-Q.jpg', 'BOBINA SAXXON GRIS CATEGORIA 5', 3, 1, 0, 1),
(98, 4, 3, '21048', '27112813', 'Extension negra  1.5 mts ', '15.00', '40.00', 500, 'descarga (23).jpg', 'Extension negra 1.5 metros ', 3, 1, 0, 1),
(99, 4, 3, '21046', '43191600', 'Extension USB macho 1.5 mts ne', '15.00', '40.00', 500, 'descarga (12).jpg', 'Extension USB macho 1.5 mts ne', 3, 1, 0, 1),
(100, 4, 3, 'WI.02', '43191600', 'Cable HDMI 1.5 Mtrs', '35.00', '60.00', 500, 'descarga (24).jpg', 'Cable HDMI 1.5 Mtrs rojo con n', 3, 1, 0, 1),
(101, 4, 3, 'ELEWI02', '43191600', 'Cable HDMI de 15 mtrs', '250.00', '450.00', 500, 'descarga (24).jpg', 'Cable HDMI de 15 mtrs negro co', 3, 1, 0, 1),
(102, 7, 10, 'TT101FTURBOZ', '46171611', 'Kit de Transceptores', '61.00', '88.00', 500, 'TT101FTURBOZ-l.PNG', 'Kit de Transceptores (Balluns)', 3, 1, 0, 1),
(103, 7, 10, 'S04-TURBO-L', '46171621', 'DVR 1080p Lite Pentahibrido / ', '715.00', '1400.00', 500, 'S04TURBOL-l.PNG', 'DVR 1080p Lite Pentahibrido / ', 3, 1, 0, 1),
(104, 7, 10, ' LE7-TURBO-WP', '46171610', 'Turret TURBOHD 720p', '205.00', '297.00', 500, 'LE7TURBOWP-l.PNG', 'Turret TURBOHD 720p / Gran Ang', 3, 1, 0, 1),
(105, 7, 10, 'PS-12-DC-4C', '39121009', 'Larga distancia fuente de alim', '289.00', '420.00', 500, 'PS12DC4C-AD-2-l.PNG', 'Larga distancia fuente de alim', 3, 1, 0, 1),
(106, 7, 10, 'JR-52', '32151909', 'Adaptador tipo Jack de 3.5 mm ', '13.00', '18.00', 500, 'JR52det.jpg', 'Adaptador tipo Jack de 3.5 mm ', 3, 1, 0, 1),
(107, 7, 11, 'TL-SF1005D', '43222610', 'Switch de escritorio 5 puertos', '175.00', '254.00', 500, 'TLSF1005D-p.PNG', 'Switch de escritorio 5 puertos', 3, 1, 0, 1),
(116, 7, 13, ' PS-D-1202-D', '39121006', 'Fuente de Poder 12 Vcd / 2 A /', '117.00', '290.00', 500, 'PSD1202D-p.png', 'Fuente de Poder 12 Vcd / 2 A /', 3, 1, 0, 1),
(117, 7, 14, 'PL-DC-1000', '39121006', 'Fuente de Poder de 12Vcd / 1A ', '79.00', '199.00', 500, 'PLDC1000-p.PNG', 'Fuente de Poder de 12Vcd / 1A ', 3, 1, 0, 1),
(119, 6, 15, 'AUV220-32G-RBKBL', '43202000', 'MEMORIA USB ADATA 32GB USB', '67.50', '179.00', 500, 'memoria-adata-usb-20-32gb-negroazul-auv220-32g-rbkbl-D_NQ_NP_621738-MLM28555517927_112018-F.jpg', 'MEMORIA USB ADATA 32GB USB 2.0', 3, 1, 0, 1),
(120, 6, 15, 'AUV330-64G-RBK', '43202000', '	 MEMORIA USB ADATA UV330 64GB', '133.87', '220.00', 500, 'AUV33064GRBK_1.jpg', 'MEMORIA USB ADATA UV330 64GB, ', 3, 1, 0, 1),
(121, 6, 16, 'AC-01015', '43211706', 'TECLADO NUMERICO  ALAMBRICO ', '67.50', '105.00', 500, 'AK-AC-01015_1.jpg', 'TECLADO NUMERICO ACTECK ALAMBR', 3, 1, 0, 1),
(122, 6, 16, 'AUBO-014', '52161512', ' BOCINAS ACTECK MULTIMEDIA', '115.00', '175.00', 500, 'AK-AUBO-014_1.png', 'AX2500, BOCINAS ACTECK MULTIME', 3, 1, 0, 1),
(123, 6, 16, 'ES-05002', '39121006', 'FUENTE DE PODER ACTECK MICRO', '290.00', '600.00', 500, 'AK-ES-05002_1.jpg', 'FUENTE DE PODER ACTECK MICRO A', 3, 1, 0, 1),
(124, 6, 17, 'NEO500LED', '391201011', ' CONTACTOS ( REGULADOR Y RESPA', '599.00', '980.00', 500, 'JHE-NEO500LED_1.png', 'NO BREAK JHETA 500VA / 240W , ', 3, 1, 0, 1),
(125, 6, 18, 'SLM COMPUTOALLA', '43211600', 'TOALLAS SILIMEX HUMEDAS', '0.00', '50.00', 500, 'SLM COMPUTOALLA_1.jpg', 'TOALLAS SILIMEX HUMEDAS PARA L', 3, 1, 0, 1),
(126, 6, 18, 'SLM ALCOESI', '43211600', 'ALCOHOL ISOPROPILICO', '68.00', '110.00', 496, 'SLM ALCOESI_1.jpg', 'ALCOHOL ISOPROPILICO DE 1 LITR', 3, 1, 0, 1),
(127, 6, 18, 'SLM AEROJETDUO ', '43211600', 'AIRE SILIMEX COMPRIMIDO REMOVE', '84.25', '140.00', 500, 'SLM AEROJETDUO_1.jpg', 'AIRE SILIMEX COMPRIMIDO DUO EM', 3, 1, 0, 1),
(128, 6, 19, 'LOCOM5', '43222640', 'LOCO M5 AIRMAX CON ANTENA DE P', '1204.67', '3032.00', 500, 'SYS-LOCOM5_3.jpg', '\r\nPUNTO DE ACCESO A LA RED CON', 3, 1, 0, 1),
(129, 6, 19, 'LOCOM2', '43222640', 'LOCO M2 AIRMAX CON ANTENA DE P', '966.12', '2270.00', 500, 'SYS-LOCOM2.png', '\r\nPUNTO DE ACCESO A LA RED DE ', 3, 1, 0, 1),
(130, 6, 15, ' ASU650SS-240GT', '43201803', 'DISCO DURO INTERNO SSD ADATA D', '538.01', '900.00', 500, 'disco-solido-ssd-adata-su650-240gb-lap-y-pc-asu650ss-240gt-r-D_NQ_NP_606968-MLM28706157393_112018-F.jpg', 'DISCO DURO INTERNO SSD ADATA D', 3, 1, 0, 1),
(131, 6, 16, 'AK-AC-916493', '43211706', 'TECLADO INALAMBRICO USB NEGRO', '140.50', '180.00', 500, 'teclado-inalambrico-multimedia-usb-negro-pclaptrabajocasa-D_NQ_NP_954916-MLM29886266418_042019-F.jpg', 'TECLADO INALAMBRICO MULTIMEDIA', 3, 1, 0, 1),
(132, 6, 20, 'T664220', '44103100', 'TINTA CYAN EPSON ', '124.00', '185.00', 500, 'EP-T664220-AL_1.jpg', 'TINTA CYAN EPSON PARA L200 / L', 3, 1, 0, 1),
(133, 6, 20, 'EP-T664320-AL', '44103100', 'TINTA MAGENTA EPSON ', '124.00', '185.00', 500, 'EP-T664320-AL_1.jpg', 'TINTA MAGENTA EPSON PARA L200 ', 3, 1, 0, 1),
(134, 6, 20, ' EP-T664420-AL ', '44103100', 'TINTA AMARILLA EPSON ', '124.00', '185.00', 500, 'EP-T664420-AL.jpg', 'TINTA AMARILLA EPSON PARA L200', 3, 1, 0, 1),
(135, 6, 15, 'ADUSBUD230BK32G', '43202000', 'MEMORIA USB ADATA 32G COLOR NE', '68.90', '179.00', 500, 'ae5dd82badd2dd6ffaeb6ef56bdbb64c.jpg', '	\r\nMEMORIA USB ADATA DE 32GB U', 3, 1, 0, 1),
(136, 6, 15, 'ADUSBUV220PK16G', '43202000', 'MEMORIA USB ADATA DE 16GB  COL', '49.64', '139.00', 500, 'memoria-usb-20-16gb-verdeturquesa-auv220-16g-rgnpk-D_NQ_NP_933720-MLM28555835403_112018-F.jpg', 'MEMORIA USB ADATA DE 16GB UV22', 3, 1, 0, 1),
(137, 6, 15, 'KUSBADC008BK/16', '43202000', 'MEMORIA USB ADATA DE 16 GB COL', '49.64', '139.00', 500, 'KUSBADC008BK16.jpg', 'MEMORIA USB ADATA DE 16 GB C00', 3, 1, 0, 1),
(138, 6, 15, 'AUV128-32G-RBE', '43202000', 'MEMORIA USB ADATA COLOR NEGRO/', '71.32', '179.00', 500, 'image.png', '	\r\nMEMORIA USB ADATA UV128 32G', 3, 1, 0, 1),
(139, 6, 15, 'AUV220-8G-RGNPK', '43202000', 'MEMORIA USB ADATA DE 8GB COLOR', '47.55', '99.00', 500, 'descarga.jpg', 'MEMORIA USB ADATA DE 8GB UV220', 3, 1, 0, 1),
(140, 6, 15, 'AUV220-8G-RBLNV', '43202000', 'MEMORIA USB ADATA DE 8GB COLOR', '47.55', '99.00', 500, 'descarga.jpg', 'MEMORIA USB ADATA DE 8GB UV220', 3, 1, 0, 1),
(141, 6, 15, 'AUV220-16G-RBLNV', '43202000', 'MEMORIA USB ADATA DE 16GB  COL', '49.62', '139.00', 500, '1000211394_sa.jpg', 'MEMORIA USB ADATA DE 16GB UV22', 3, 1, 0, 1),
(142, 6, 16, 'AC-916608', '43211706', 'TECLADO ESTANDAR ACTECK ALAMBR', '75.50', '180.00', 500, 'TEC-AL-ACTECK-AC-916608.jpg', 'TECLADO ESTANDAR ACTECK ALAMBR', 3, 1, 0, 1),
(143, 6, 21, ' VOR-AC-415873-1', '43211708', 'MOUSE VORAGO  NEGRO OPTICO ALA', '51.80', '85.00', 500, '0002407_mouse-vorago-mo-206-negro-2400-dpi-us_510.jpeg', 'MOUSE VORAGO MO-102 NEGRO OPTI', 3, 1, 0, 1),
(144, 6, 3, 'EWRI-001', '43222640', 'REPETIDOR DE SEÑAL INALÁMBRICO', '379.00', '599.03', 500, 'alarm_wireless_signal_repeater.jpg', 'REPETIDOR DE SEÑAL INÁLAMBRICO', 3, 1, 0, 1),
(145, 8, 3, 'ES - 626 ', '46171606', 'Sirena ES - 626 115db', '499.00', '599.13', 500, 'sirenhorn01.jpg', 'Este producto es una sirena de', 3, 1, 0, 1),
(146, 8, 3, 'EWD-009', '46171608', 'SENSOR DE MOVIMIENTO PARA ALAR', '149.00', '226.79', 500, '180924230647_dual-passive-infrared-detector-pir-sensor-1.jpg', 'SENSOR DE MOVIMIENTO PARA ALAR', 3, 1, 0, 1),
(147, 8, 3, 'EWD008', '46171600', 'Barreras Infrarrojas Inalámbri', '799.00', '958.79', 500, 'images.jpg', 'Barreras Infrarrojas Inalámbri', 3, 1, 0, 1),
(148, 8, 3, 'EWSE-002', '46171608', 'SENSOR DE PUERTA /VENTANA  INA', '89.00', '106.79', 500, '5800PIROD-p.png', 'SENSOR DE PUERTA /VENTANA  INA', 3, 1, 0, 1),
(149, 8, 3, 'EW-SDA', '46171600', 'SISTEMA DE ALARMA GSM ', '999.00', '1438.86', 500, 'images (1).jpg', 'SISTEMA DE ALRMA GSM CASA NEGO', 3, 1, 0, 1),
(150, 7, 11, 'TL-WR840N', '43222609', 'Router Inalámbrico WISP, 2.4 G', '288.73', '649.00', 500, 'TLWR840N-p.png', '    \r\nRouter Inalámbrico WISP,', 3, 1, 0, 1),
(151, 7, 22, 'DS-1H18S/E', '46171611', 'Kit de Trasceptor (Balluns) Tu', '59.15', '85.78', 500, 'DS1H18SE-FRENTE-p.png', 'Kit de Trasceptor (Balluns) Tu', 3, 1, 0, 1),
(152, 7, 8, 'LP-UT3-050-BU', '43223303', 'Cable de parcheo UTP azul', '24.34', '35.29', 498, 'LPUT3050BUdet.jpg', 'Cable de parcheo UTP Cat5e - 0', 3, 1, 0, 1),
(153, 6, 23, '432528', '26111711', ' BATERIA CMOS 3V', '31.09', '50.00', 500, 'IC-432528_1.jpg', 'BATERIA CMOS 3V, 2 PIEZAS, CR ', 3, 1, 0, 1),
(154, 7, 10, 'LB7-TURBO-WP', '46171610', '     Bullet TURBOHD 720p ', '270.66', '392.45', 500, 'LB7TURBOWP-p.png', 'Bullet TURBOHD 720p / CLIMAS E', 3, 1, 0, 1),
(155, 7, 10, 'LX360TURBO15X', '46171610', 'PTZ TURBO HD 1080P', '4.00', '6719.32', 500, 'LX360TURBO15X-p.png', 'PTZ TURBO HD 1080P / 15X Zoom ', 3, 1, 0, 1),
(156, 7, 10, 'B8-TURBOX-G2', '46171610', 'Bala TURBOHD 1080p / METÁLICA ', '401.20', '581.74', 500, 'B8TURBOXG2-p.png', 'Resolución máxima: 1920 x 1080', 3, 1, 0, 1),
(157, 7, 10, 'S08TURBOL', '46171621', 'DVR 8 Canales 1080p Lite', '781.77', '1133.56', 500, 'S08TURBOL-p.png', 'DVR 8 Canales 1080p Lite / 8 C', 3, 1, 0, 1),
(158, 6, 28, 'MQ04ABF100', '43201827', 'DISCO DURO INTERNO TOSHIBA DE ', '938.00', '1360.00', 500, '81P--PVd6fL._SX425_.jpg', 'DISCO DURO INTERNO TOSHIBA DE ', 3, 1, 0, 1),
(159, 6, 16, 'DD-500GB-NEWP', '43201827', 'DISCO DURO INTERNO NEW PULL DE', '330.00', '480.00', 500, 'DD-500GB-NEWP_1.jpg', 'DISCO DURO INTERNO NEW PULL DE', 3, 1, 0, 1),
(160, 7, 10, ' LB7-TURBO-WP', '46171610', 'CAMARA Bullet TURBOHD 720p / C', '269.00', '390.00', 500, 'LB7TURBOWP-p (1).png', 'Bullet TURBOHD 720p / CLIMAS E', 3, 1, 0, 1),
(164, 6, 3, 'AUT08134', '52161514', 'Sports stereo ', '45.00', '115.00', 500, 'WCKD1Black1_large.jpg', 'Audifono BT negros', 3, 1, 0, 1),
(165, 4, 16, '99252R', '45111800', 'SUP GAME BOX', '260.00', '450.00', 500, 'sup-game-box-consola-de-videojuegos-retro-portatil-400-juego-D_NQ_NP_891718-MLM28690457537_112018-F.jpg', 'CONSOLA MINI CON 400 JUEGOS AN', 3, 1, 0, 1),
(166, 9, 6, 'BT6699', '52161514', 'SPORTS HEAD PHONE', '180.00', '360.00', 498, 'audifonos-manoslibres-jbl_sport-mj6699.jpg', 'AUDIFONOS BT JBL/UNDER ARMOUR ', 1, 1, 0, 1),
(167, 4, 3, '20820', '431916000', 'CABLE DE CARGA ENTRADA TIPO C ', '30.00', '80.00', 497, 'descarga.jpg', 'CABLE DE CARGA RAPIDA ENTRADA ', 1, 1, 6, 1),
(168, 9, 3, '3032016N9', '431916000', 'CARGADOR SAMUNG GALAXY S9', '65.00', '150.00', 500, 'cargador-samsung-original-s9-note-turbo-tipo-c-D_NQ_NP_939059-MLA26095307371_092017-F.jpg', 'CARGADOR SAMUNG GALAXY S9 BLAN', 3, 1, 0, 1),
(169, 9, 3, '62019MN', '52161512', 'BOCINA A11 BT ', '250.00', '380.00', 500, 'homepod-echo-home-ku9E-U601545288171SgH-624x385@El Correo.jpg', 'BOCINA A11 ESTAMPADO NEGRO Y M', 3, 1, 0, 1),
(170, 9, 6, 'JBLE13', '52161514', 'AUDIFONOS  JBL/UNDER ARMOUR E1', '28.00', '90.00', 500, 'audifonos-jbl-war-wars-under-armour.jpg', 'AUDIFONOS  JBL/UNDER ARMOUR E1', 3, 1, 0, 1),
(171, 9, 3, 'CTS15', '431916000', 'USB CABLE MICRO 1.5', '10.00', '60.00', 500, 'descarga (1).jpg', 'USB CABLE MICRO 1.5 BLANCO ', 3, 1, 0, 1),
(172, 4, 3, '20878', '23151821', 'EXTERNAL CASE', '80.00', '160.00', 500, 'descarga (2).jpg', 'ADAPTADOR PARA DISCO DURO EXTE', 3, 1, 0, 1),
(173, 9, 3, 'BT-RECEIVER', '23151821', 'ADAPTADOR PARA BLUETOOTH', '50.00', '100.00', 500, 'receptor-bluetooth-portatil-wireless-receiver-D_NQ_NP_820703-MLM27794826264_072018-F.jpg', 'ADAPTADOR PARA BLUETOOTH WIREL', 3, 1, 0, 1),
(174, 4, 3, '20842', '431916000', 'CABLE TYPE-C', '18.00', '65.00', 500, 'usb-cable-2-0-usb-a-to-usb-c-usb-type-c-data-charge-cable-6-feet-white_NID0012092.jpeg', 'CABLE TYPE-C BLANCO 1.5 MTRS', 1, 1, 1, 1),
(175, 9, 3, 'AUX-COLOR', '52161605', 'AUXILIARES LARGOS COLORES', '10.00', '35.00', 500, 'descarga (3).jpg', 'AUXILIARES DE COLORES LARGOS S', 3, 1, 0, 1),
(176, 4, 3, '20877', '23151821', 'CONVERSOR DE HDMI', '95.00', '200.00', 500, 'adaptador-cable-de-conversion-hdmi-a-vga-audio-hd-D_NQ_NP_666147-MLC27320478717_052018-F.jpg', 'CONVERTIDOR HDMI ', 3, 1, 0, 1),
(177, 9, 3, 'EAR-AKG', '52161514', 'AUDIFONOS SAMSUNG S9', '28.00', '80.00', 500, 'descarga (4).jpg', 'AUDIFONOS SAMSUNG S9 NEGROS', 3, 1, 0, 1),
(178, 9, 3, 'SMW-001', '54111605', 'SMART WACH ', '180.00', '399.00', 500, 'images.jpg', 'SMART WACH COLOR BLANCO Y AZUL', 3, 1, 0, 1),
(179, 9, 3, '20895', '23151821', 'ADAPTADOR DE MEMORIA', '10.00', '35.00', 500, 'images (1).jpg', 'ADAPTADORDE TARJETA', 3, 1, 0, 1),
(180, 6, 29, '849439000409', '43222609', 'ROUTER  PARA RED INALAMBRICA', '253.46', '350.00', 500, 'router-mercusys-mw305r-tp-link-limitado-a-2-pzs-por-compra-D_NQ_NP_996113-MLM30502776238_052019-O.webp', 'WIRELESS N ROUTER 300MBPS  1 P', 1, 0, 0, 1),
(181, 6, 29, '849439000423', '43222609', 'MW325R', '251.88', '549.99', 500, 'MW325R-h_470x.png', 'Router Inalámbrico N 2.4 GHz d', 1, 0, 6, 1),
(182, 6, 15, '4713435796061', '43202000', 'DDR3 1600', '363.50', '549.99', 500, 'memoria-ram-ddr3l-8gb-1600-adata-laptop-garantia-pc3l-12800-D_NQ_NP_616556-MLM29629308050_032019-O.webp', 'MEMORIA RAM ADATA S-DIMM 4GB 1', 1, 0, 0, 1),
(183, 6, 16, '7502213300531', '43211612', 'AK3-2700', '289.00', '419.99', 500, 'kit-teclado-mouse-D_NQ_NP_798606-MLM27173437725_042018-O.webp', 'KIT DE TECLADO, MAUSE, BOCINA ', 1, 0, 0, 1),
(184, 6, 30, '7506215909549', '43211706', 'TB-01005', '65.50', '119.99', 500, 'AK-TB-01005_1.jpg', 'TECLADO ACTECK ESTANDAR USB. S', 1, 0, 0, 1),
(185, 6, 16, '1760055087073', '43211706', 'AT-2700,', '92.00', '150.00', 500, 'AK-TB-01005_1.jpg', ' TECLADO ESTANDAR ACTECK USB\r\n', 1, 0, 0, 1),
(186, 6, 30, '7506215909433', '43211708', 'TB-01001', '50.50', '89.99', 500, 'AK-TB-01001_1.jpg', 'MOUSE OPTICO ACTECK ALAMBRICO ', 1, 0, 1, 1),
(187, 6, 31, '7506086637909', '43222609', '18-8842BK', '129.31', '174.00', 500, '7506086637909.jpg', 'MINI MAUSE INALAMBRICO ', 1, 0, 0, 1),
(188, 6, 15, '4713218465368', '43202000', 'AUV240-16G-RBK', '46.00', '140.00', 500, 'AUV240_20Negro-1_f701ce88-6307-4b96-92d9-4d6e29c9c1fa_1200x1200.jpg', 'MEMORIA USB ADATA DE 16GB UV24', 1, 0, 0, 1),
(189, 6, 15, '11580074', '43202000', 'AC008-32G-RKD', '64.00', '179.00', 500, 'KUSBADC008BK32_1.jpg', 'MEMORIA USB ADATA DE 32 GB C00', 1, 0, 0, 1),
(190, 6, 20, '010343885318', '44103100', 'T664320', '124.00', '186.99', 500, 'EP-T664320-AL_1.jpg', 'TINTA MAGENTA EPSON PARA L200 ', 1, 0, 0, 1),
(191, 6, 20, '010343885301', '44103100', 'T664220', '124.00', '186.99', 500, 'EP-T664220-AL_2.jpg', 'TINTA CYAN EPSON PARA L200 / L', 1, 0, 0, 1),
(192, 6, 20, '010343885325', '44103100', 'T664420', '124.00', '186.99', 500, 'EP-T664420-AL_3.jpg', 'TINTA AMARILLA EPSON PARA L200', 1, 0, 0, 1),
(193, 6, 18, '7503002196632', '43211600', 'AEROJET', '168.50', '254.99', 500, 'SLM AEROJETDUO_1.jpg', 'AIRE SILIMEX COMPRIMIDO DUO EM', 1, 0, 0, 1),
(194, 6, 18, '7503002196502', '43211600', 'ALCOHOL ISOPROPILICO', '68.00', '109.99', 500, 'alcohol-silimex-alcohol-isopropilico-para-limpieza-de-equipos-de-video_218863.jpg', 'ALCOHOL ISOPROPILICO DE 1 LITR', 1, 0, 0, 1),
(195, 6, 11, '845973020071', '43222600', 'TL-SF1008D', '145.50', '325.00', 500, 'productos32_4727.jpg', 'SWITCH TPLINK DE 8 PUERTOS FAS', 1, 1, 0, 1),
(196, 6, 11, '845973020064', ' 43222610', 'TL-SF1005D', '125.00', '255.19', 500, 'switch-tplink-de-escritorio-5-puertos-10100-mbps-tl-sf1005d-D_NQ_NP_964847-MLM26983105815_032018-F.webp', 'SWITCH TPLINK DE 5 PUERTOS FAS', 1, 0, 0, 1),
(197, 6, 32, '4712960681613', '43222600', 'J3060NH', '844.00', '1279.48', 500, 'OEMMBBIOJ3060NH_1.jpg', 'TARJETA DE RED TPLINK INALAMBR', 1, 0, 0, 1),
(198, 6, 33, '740617173741', '43201800', 'SDC4/16GB', '48.50', '129.99', 500, 'memoria-micro-sd-kingston-16-gb-clase-4-sdc416gb-D_NQ_NP_627092-MLM29307722113_022019-F.jpg', 'MEMORIA MICRO SDHC KINGSTON DE', 1, 0, 0, 1),
(199, 6, 33, '740617274707', '43201800', 'SDCS/32GB', '73.00', '249.99', 500, '71VSbWZmXpL._SL1500_.jpg', 'MEMORIA MICRO SDHC CANVAS SELE', 1, 0, 0, 1),
(200, 6, 34, '812772007329', '26111704', 'OTAC-E50', '267.00', '402.64', 500, 'ov-otac-e50_4.jpg', 'CARGADOR OVALTECH DE 65W COMPA', 1, 0, 0, 1),
(201, 6, 35, '888181202A03369', '39121009', 'PS12DC4C', '228.00', '343.82', 500, 'SYS-PS12DC4C_1.png', 'FUENTE DE ALIMENTACION EPCOM P', 1, 0, 0, 1),
(202, 7, 35, 'C31735482', '46171610', 'LB7TURBOWP', '454.08', '526.73', 500, 'LB7TURBOWP-p.png', 'Bullet TURBOHD 720p / CLIMAS E', 1, 0, 0, 1),
(203, 7, 22, '6954273628543', '46171610', 'DS-2CE56D0T-IRM', '756.80', '877.89', 500, 'DS2CE56D0TIRM-p.png', 'Eyeball TURBOHD 1080p / Gran A', 1, 0, 0, 1),
(204, 7, 35, 'C15220621', '46171610', 'LE7-TURBO-WP36', '405.92', '470.87', 500, 'LE7TURBOWP36-p.png', 'Turret TURBOHD 720p / Gran Cob', 1, 0, 0, 1),
(205, 7, 35, 'C45860341', '46171610', 'LB7-TURBO-G2P', '430.00', '498.80', 500, 'LB7TURBOWP-p.png', 'Bullet TURBOHD 720p / CLIMAS E', 1, 0, 0, 1),
(206, 6, 36, '1760957138222', '39121000', 'ES-05001', '364.73', '550.00', 500, '500w-acteck-fuente-poder-D_NQ_NP_727409-MLM27771746188_072018-O.webp', 'FUENTE DE PODER ACTECK ATX 500', 1, 1, 0, 1),
(207, 6, 23, '766623432528', '26111702', 'CR 2032 ', '32.50', '50.01', 500, 'IC-432528_1 (1).jpg', 'BATERIA CMOS 3V, 2 PIEZAS, CR ', 1, 0, 0, 1),
(208, 7, 35, '34356024485', '46171610', 'XMR-DOME', '1810.76', '2100.48', 500, 'XMRDOME-p.png', 'Domo Analógico 800TVL, Antivan', 1, 1, 0, 1),
(209, 7, 37, '52BC05F8D619', '43222640', 'SXT LITE2', '1801.64', '2089.90', 500, 'RBSXT2NDR2-FRENTE-p.png', '(SXT Lite2) Cliente (CPE) en 2', 1, 0, 0, 1),
(210, 6, 30, '7506215909563', '39121000', 'TB-05003', '160.00', '241.28', 500, 'AK-TB-05003_1.jpg', 'FUENTE DE PODER 480W/24PIN/2 S', 1, 0, 0, 1),
(211, 7, 19, '810354025051', '43222640', 'ROCKETM5', '3.00', '3.48', 500, 'ROCKETM5-p.png', 'Radio Estación Base airMAX Roc', 1, 0, 0, 1),
(212, 7, 35, 'C75285872', '46171621', 'S04TURBOL', '1.00', '1.16', 500, 'S04TURBOL-AD-3-p.png', 'DVR 1080p Lite Pentahibrido / ', 1, 0, 0, 1),
(213, 9, 19, '687251885336', '43222640', 'BULLETM2-HP', '3.00', '3.48', 500, 'BULLETM2HP-p.png', 'Radio airMAX Bullet-M2HP, hast', 1, 0, 0, 1),
(214, 6, 23, '766623303033', '43211617', '303033', '73.50', '110.84', 500, 'IC-303033_1.jpg', 'CABLE IMPRESORA BITRONICS 1.8M', 1, 0, 0, 1),
(215, 9, 38, '11s36200284ZZ10045M7E1', '43211600', 'ADLX45NCC2A', '320.00', '320.00', 500, 'LENOVO_042019-F.webp', 'CARGADOR PARA COMPUTADORA ', 1, 1, 0, 1),
(216, 9, 39, '592C40CLLUAHVB', '43211600', 'N18152', '500.00', '500.00', 500, 'HP.webp', 'CARGADOR HP', 1, 1, 0, 1),
(217, 9, 28, 'AQOW0544A15159', '43211600', 'SADP-65KBA', '490.00', '490.00', 500, 'TOSHIBA.webp', 'CARGADOR TOSHIBA', 1, 1, 0, 1),
(218, 7, 40, 'EWORKSOLUTIONS01', '32101617', 'PRORELAY', '114.38', '132.68', 482, 'PRORELAYdet.jpg', 'Módulo de relevador\r\n', 1, 0, 0, 1),
(219, 7, 41, 'JRF52', '32151909', 'JRF52', '80.06', '92.87', 498, 'JRF51det.jpg', 'Cable con conector jack hembra', 1, 0, 0, 1),
(220, 7, 42, 'TMK1020EE', '39131714', 'TMK1020EE', '21.73', '25.21', 500, 'TMK1020EE.jpg', 'Esquinero exterior blanco de P', 1, 0, 0, 1),
(221, 9, 43, '766623163293', '43223307', '163293', '50.00', '50.00', 500, 'tapa-para-caja-faceplate-163293-montaje-al-ras-intellinet-D_NQ_NP_115115-MLM25180582593_112016-F.webp', 'TAPA (FACEPLATE) 2 PERFORACION', 1, 1, 0, 1),
(222, 9, 44, '3606480501784', '43223307', 'MWD64904', '89.00', '89.00', 500, '16500X.jpg', 'PLACA 1 JACK TELEF RJ11 MISTIC', 1, 1, 0, 1),
(223, 7, 45, 'WM167031S000030', '46171621', 'XMR401SAHD', '5.00', '5.80', 500, 'XMR401AHD-p.png', 'Vídeo Grabador Móvil Tríbrido,', 1, 0, 0, 1),
(224, 9, 46, 'EWORKSOLUTIONS02', '44101700', 'GPR-22', '450.00', '450.00', 496, 'NPG32-GPR22-CEXV18-Toner-Cartridge-for-Canon.jpg_350x350.jpg', 'CIUNDRO FOTOCONDUCTOR COMPATIB', 1, 1, 0, 1),
(225, 9, 46, '131512112443', '44101700', 'Q2612A', '120.00', '120.00', 500, 'NPG32-GPR22-CEXV18-Toner-Cartridge-for-Canon.jpg_350x350.jpg', 'CIUNDRO FOTO CONDUCTOR COMPATI', 1, 1, 0, 1),
(226, 9, 46, 'EWORKSOLUTIONS03', '44101700', 'AL-1000', '320.00', '320.00', 500, 'NPG32-GPR22-CEXV18-Toner-Cartridge-for-Canon.jpg_350x350.jpg', 'CIUNDRO FOTOCONDUCTOR COMPATIB', 1, 1, 0, 1),
(227, 9, 47, 'EWORKSOLUTIONS04', '44101700', '04433', '550.00', '550.00', 497, 'NPG32-GPR22-CEXV18-Toner-Cartridge-for-Canon.jpg_350x350.jpg', 'CIUNDRO  FOTO CONDUCTOR P/IR20', 1, 1, 0, 1),
(228, 9, 48, 'FILD117', '44101700', 'FILD117', '400.00', '400.00', 500, 'NPG32-GPR22-CEXV18-Toner-Cartridge-for-Canon.jpg_350x350.jpg', 'FILDA DELGADA CANON D 320/320/', 1, 1, 0, 1),
(229, 4, 49, 'S/N:177000477 ARC09', '26111500', 'SYSPOE1224', '3.00', '3.48', 500, 'SYSPOE1224-p.png', 'Controlador solar con PoE 12 V', 1, 0, 0, 1),
(230, 7, 35, '34597004858', '26121606', 'XMREXT15MV2', '423.61', '491.39', 500, 'XMREXT7Mdet.jpg', 'Cable extensor con conector ti', 1, 0, 0, 1),
(231, 7, 47, 'EWORKSOLUTIONS06', '26121606', 'BNC VIDEO', '222.73', '258.37', 492, 'DIY20MHD-p.png', 'Cable Coaxial armado con conec', 1, 0, 0, 1),
(232, 7, 47, 'EWORKSOLUTIONS05', '39121414', 'CONECTOR', '72.24', '83.80', 500, 'RFU501.jpg', ' 39121000', 1, 0, 0, 1),
(233, 9, 47, 'EWORKSOLUTIONS07', '39121000', 'NSK-AUG0S', '545.00', '545.00', 500, 'teclados.jpg', 'TECLADO', 1, 1, 0, 1),
(234, 9, 47, 'AEZH9P00110CSP21113030', '39121000', 'ZH9', '500.00', '500.00', 500, 'TECLADO.webp', 'TECLADO ZH9', 1, 1, 0, 1),
(235, 9, 47, 'EWORKSOLUTIONS08', '39121000', 'C076', '500.00', '500.00', 499, 'TECLADO.webp', 'TECLADO C076', 1, 1, 0, 1),
(236, 9, 47, 'C0606070151', '44101700', 'JCT1BLA62', '420.00', '420.00', 500, 'teclado-gris-espanol-dell-inspiron-710m-0wf024-det023-D_NQ_NP_253211-MLM20512506544_122015-F.jpg', 'TECLADO', 1, 1, 0, 1),
(237, 6, 18, '1119', '12191601', 'Alcohol etílico ', '68.00', '110.00', 500, 'SLM ALCOESI_1.jpg', 'alcohol isoprilico de ,limpiad', 3, 1, 0, 1),
(238, 6, 18, 'ctoalla', '12163800', 'COMPUTOALLAS', '30.50', '50.00', 500, 'SLM COMPUTOALLA_1.jpg', 'COMPUTOALLAS   toallas  húmeda', 3, 1, 0, 1),
(239, 6, 18, '1416', '44102904', 'Aire comprimido', '87.50', '140.00', 500, 'SLM AEROJET_1.jpg', 'Aire comprimido removedor de p', 3, 1, 0, 1),
(240, 9, 50, 'EWORKSOLUTIONS011', '43221709', 'TN-720', '520.00', '520.00', 500, '720.jpg', 'TONER', 1, 1, 0, 1),
(241, 9, 50, 'EWORKSOLUTIONS012', '43221709', '7115A', '450.00', '450.00', 500, 'HP.jpg', 'TONER', 1, 1, 0, 1),
(242, 9, 50, 'EWORKSOLUTIONS013', '43221709', 'THCE311A', '600.00', '600.00', 500, 'TONER.webp', 'TONER', 1, 1, 0, 1),
(243, 9, 50, 'EWORKSOLUTIONS014', '43221709', 'THCE312A', '600.00', '600.00', 500, 'TONER.webp', 'TONER AMARILLO', 1, 1, 0, 1),
(244, 9, 50, 'EWORKSOLUTIONS015', '43221709', 'THCE313A', '600.00', '600.00', 500, 'TONER.webp', 'TONER MAGENTA', 1, 1, 0, 1),
(245, 9, 50, 'EWORKSOLUTIONS016', '43221709', 'SL01A0', '450.00', '450.00', 500, 'TONER.webp', 'TONER', 1, 1, 0, 1),
(246, 9, 50, 'EWORKSOLUTIONS017', '43221709', '289AC', '450.00', '450.00', 500, 'TONER.webp', 'TONER', 1, 1, 0, 1),
(247, 9, 50, 'EWORKSOLUTIONS018', '43221709', 'UNIV01AC', '450.00', '450.00', 500, 'TONER.webp', 'TONER', 1, 1, 0, 1),
(248, 9, 50, 'EWORKSOLUTIONS019', '43221709', 'TN-750', '520.00', '520.00', 500, 'TONER.webp', 'TONER', 1, 1, 0, 1),
(249, 9, 50, 'EWORKSOLUTIONS020', '43221709', '278AC', '500.00', '500.00', 500, 'TONER.webp', 'TONER', 1, 1, 0, 1),
(250, 9, 50, 'EWORKSOLUTIONS021', '43221709', 'TNL060', '650.00', '650.00', 497, 'TONER.webp', 'TONER', 1, 1, 0, 1),
(251, 9, 50, 'EWORKSOLUTIONS022', '43221709', 'SLA1AO', '450.00', '450.00', 500, 'TONER.webp', 'TONER', 1, 1, 0, 1),
(252, 9, 50, 'EWORKSOLUTIONS23', '43221709', '278AC', '500.00', '500.00', 499, 'TONER.webp', 'TONER', 1, 1, 0, 1),
(253, 9, 50, 'EWORKSOLUTIONS023', '43221709', 'Sl01AO', '450.00', '450.00', 497, 'TONER.webp', 'TONER', 1, 1, 0, 1),
(254, 9, 50, 'EWORKSOLUTIONS024', '43221709', '278AC', '500.00', '500.00', 498, 'TONER.webp', 'TONER', 1, 1, 0, 1),
(255, 9, 50, 'EWORKSOLUTIONS025', '43221709', '12AO', '450.00', '450.00', 500, 'TONER.webp', 'TONER', 1, 1, 0, 1),
(256, 9, 50, 'EWORKSOLUTIONS026', '43221709', '12AC', '450.00', '450.00', 500, 'TONER.webp', 'TONER', 1, 1, 0, 1),
(257, 6, 51, 'KUSBDTSE9H/16G', '43202000', 'MEMORIA USB KINGSTON DE 16 GB ', '58.50', '139.00', 500, 'KUSBDTSE9H16G_1.jpg', 'MEMORIA USB KINGSTON DE 16 GB ', 3, 1, 0, 1),
(258, 6, 51, 'KUSBDT100G3/16G', '43202000', 'MEMORIA USB KINGSTON DE 16 GB', '53.00', '139.00', 500, 'KUSBDT100G316G_1.jpg', 'MEMORIA USB KINGSTON DE 16 GB ', 3, 1, 0, 1),
(259, 6, 51, 'KUSBDT106/16GB', '43202000', 'MEMORIA USB KINGSTON DE 16GB', '53.00', '139.00', 500, 'kingston-usb-16gb-datatraveler-dt10616gb-negrorojo-D_NQ_NP_709446-MLM28255858676_092018-F.jpg', 'MEMORIA USB KINGSTON DE 16GB D', 1, 1, 0, 1),
(260, 6, 51, 'KUSBDTIG4/16GB', '43202000', 'MEMORIA USB KINGSTON DE 16GB D', '53.00', '139.00', 500, 'KUSBDTIG416GB_1.jpg', 'MEMORIA USB KINGSTON DE 16GB D', 3, 1, 0, 1),
(261, 6, 51, 'KUSBDTSE9H/32GB', '43202000', 'MEMORIA USB KINGSTON DE 32 GB ', '88.00', '179.00', 500, 'KUSBDTSE9H32GB_1.jpg', 'MEMORIA USB KINGSTON DE 32 GB ', 3, 1, 0, 1),
(262, 6, 51, 'KUSBDT106/32GB', '43202000', 'MEMORIA USB KINGSTON 32 GB,', '73.50', '179.00', 500, 'DT106-32GB.EMPAQUE-300x300.jpg', 'MEMORIA USB KINGSTON 32 GB, DA', 3, 1, 0, 1),
(263, 6, 51, 'KUSBDT100G3/32G', '43202000', 'MEMORIA USB KINGSTON DE 32 GB ', '73.50', '179.00', 500, 'KUSBDT100G332G_2.jpg', 'MEMORIA USB KINGSTON DE 32 GB ', 3, 1, 0, 1),
(264, 6, 51, 'KUSBDTIG4/32GB', '43202000', 'MEMORIA USB KINGSTON DE 32G', '73.50', '179.00', 500, 'KUSBDTIG432GB_1.jpg', 'MEMORIA USB KINGSTON DE 32G DA', 3, 1, 0, 1),
(265, 6, 23, 'IC-506731', '43201410', 'Tarjeta Red 10/100 USB V2.0', '213.00', '400.00', 500, 'IC-506731_1.jpg', 'Tarjeta Red 10/100 USB V2.0', 1, 1, 0, 1),
(266, 9, 40, 'GANOS9', '4319160000', 'CARGADOR SAMSUNG GALAXY S9', '65.00', '150.00', 500, 'Original-Samsung-S9-más-rápido-cargador-cable-usb-tipo-c-qc2-0-12-v-1-5a.jpg_350x350.jpg', 'CARGADOR SAMSUNG GALAXY S9', 1, 1, 0, 1),
(267, 9, 40, 'USBIRON2', '43202000', 'MEMORIA USB IRON MAN', '130.00', '230.00', 500, 'memoria-usb-20-iron-man-32gb-articulada-ilumina.jpg', 'MEMORIA USB IRON MAN 8GB ', 1, 1, 0, 1),
(268, 9, 52, 'EWORKSOLUTIONS027', '44101700', 'PJ068', '60.00', '150.00', 500, '64402715_613367102506081_4575337817575522304_n.jpg', 'SUPPORTS WIRELESS HANDS FREE ', 1, 1, 0, 1),
(269, 9, 53, '8820181208956', '43221709', '20895', '10.00', '60.00', 500, '64880541_195325508065931_1303031522135113728_n.jpg', 'ADAPTADOR DE MICRO SD A USB', 1, 1, 0, 1),
(270, 9, 54, '6999969795659', '43221709', 'GALAXY S9', '28.00', '90.00', 500, '64317289_1043735855820420_703403007567462400_n.jpg', 'AUDIFONOS SAMSUNG S9', 1, 1, 0, 1),
(271, 6, 20, '010343942004', '44103100', 'T5444', '132.00', '200.00', 500, 'AMARILLA 544.jpg', 'TINTA AMARILLA EPSON PARA L311', 1, 1, 0, 1),
(272, 6, 20, '010343941977', '44103100', 'T544/120', '132.00', '200.00', 500, 'NEGRA 544.jpg', 'TINTA NEGRA EPSON PARA L3110', 1, 1, 0, 1),
(273, 6, 20, '010343941984', '44103100', 'T544220-ALL', '132.00', '200.00', 500, 'TITA AZUL 544.webp', 'TINTA CIAN EPSON PARA L3110', 1, 1, 0, 1),
(274, 6, 20, '010343941991', '44103100', 'T544320-AL', '132.00', '200.00', 500, 'TINTA ROSA.webp', 'TINTA MAGENTA EPSON PARA L3110', 1, 1, 0, 1),
(275, 6, 11, '845973051419', '43222600', 'TP-LINK ', '401.50', '560.00', 500, 'TP-WA801ND_2.jpg', 'ACCESS POINT TPLINK INALAMBRIC', 1, 1, 0, 1),
(277, 9, 57, '2920181200006', '45111713', 'J006C', '150.00', '290.00', 500, 'WhatsApp Image 2019-07-17 at 4.22.33 PM.jpeg', 'BOCINA ROJA ', 1, 1, 0, 1),
(278, 9, 56, '6201903000019', '45111713', 'Q19', '135.00', '320.00', 500, 'WhatsApp Image 2019-07-17 at 4.21.53 PM (1).jpeg', 'BOCINA BLANCA ', 1, 1, 0, 1),
(279, 9, 59, 'EWORKSOLUTIONS030', '45111713', 'MINI WIRELESS', '70.00', '170.00', 500, 'B-HONGO.png', 'Mini Bocina Bluetooth Portátil', 1, 1, 0, 1),
(280, 9, 57, 'EWORKSOLUTIONS031', '45111713', 'BOC009', '55.00', '130.00', 500, '714FtNS515L._SX425_.jpg', 'BOCINA DE BAÑO', 1, 1, 0, 1),
(281, 9, 60, '2020190101152', '26121666', 'USB CABLE QUALITY', '24.00', '60.00', 500, 'WhatsApp Image 2019-07-17 at 4.21.57 PM.jpeg', 'USB UNIVERSAL PARA IPHONE', 1, 1, 0, 1),
(282, 9, 60, '2020190101147', '26121666', 'CAB-1147', '30.00', '60.00', 500, 'WhatsApp Image 2019-07-17 at 4.21.47 PM.jpeg', 'CABLE USB FAST TIPO C', 1, 1, 0, 1),
(283, 9, 60, '6955727784334', '46171600', 'WIRELESS MOUSE', '69.50', '160.00', 500, 'WhatsApp Image 2019-07-17 at 4.21.49 PM (1).jpeg', 'MOUSE INALAMBRICO ', 1, 1, 0, 1),
(284, 9, 57, '32018727000504', '39112403', 'CHA504', '49.50', '180.00', 500, 'Cargador-inalámbrico.jpg', 'CARGADOR INALAMBRICO QI TRANSP', 1, 1, 0, 1),
(285, 9, 58, '6968132001019', '39112403', 'CDQ-973', '19.00', '50.00', 500, 'WhatsApp Image 2019-07-17 at 4.21.42 PM.jpeg', 'CARGADOR ', 1, 1, 0, 1),
(286, 9, 59, 'EWORKSOLUTIONS032', '39112403', 'YD59', '65.00', '180.00', 500, 'BATERIA SOLAR.png', 'SOLAR POWER BOX', 1, 1, 0, 1),
(287, 9, 59, '2920181200091', '45111713', 'SLC-091', '135.00', '320.00', 500, 'speaker-SLC-091.1.jpg', 'BOCINA RADIO FM BLUETOOTH', 1, 1, 0, 1),
(288, 9, 60, '3303282009140', '39112403', 'M-699', '30.00', '80.00', 500, 'WhatsApp Image 2019-07-17 at 4.21.37 PM (1).jpeg', 'CARGADOR UNIVERSAL', 1, 1, 0, 1),
(289, 9, 59, '1120190100893', '45111713', 'YST-893', '79.50', '189.90', 500, 'jpg.jpg', 'BOCINA RADIO FM AZUL', 1, 1, 0, 1),
(290, 9, 56, 'EWORKSOLUTIONS033', '45111713', 'ZJ86', '30.00', '60.00', 500, 'WhatsApp Image 2019-07-17 at 4.21.43 PM (1).jpeg', 'MULTIFUNCTIONAL UNIVERSAL PHON', 1, 1, 0, 1),
(291, 9, 58, 'EWORKSOLUTIONS034', '26121660', 'X CABLE', '60.00', '130.00', 500, 'WhatsApp Image 2019-07-17 at 4.22.34 PM (1).jpeg', 'CABLE USB MULTIFUNCIONAL DE IM', 1, 1, 0, 1),
(292, 9, 61, '190198001733', '43191510', 'A1748', '85.00', '199.90', 498, 'WhatsApp Image 2019-07-17 at 4.21.55 PM.jpeg', 'AUDIFONOS IPHONE ', 1, 1, 0, 1),
(293, 9, 55, 'R11', '43191510', 'GATILLOS', '60.00', '130.00', 497, 'SER.png', 'GATILLOS  PARA CELULAR .', 1, 1, 0, 1),
(294, 9, 55, 'EWORKSOLUTIONS039', '43191510', 'K10', '120.00', '280.00', 500, 'Sin título.png', 'BASTON DE SELFIE, CON BLUETOOT', 1, 1, 0, 1),
(296, 9, 61, '885909627233', '39112403', 'CARGADOR IPHONE ', '55.00', '130.00', 493, 'WhatsApp Image 2019-07-17 at 4.21.52 PM.jpeg', 'CARGADOR IPHONE ', 1, 1, 0, 1),
(297, 4, 3, '200877', '23151821', 'CONVERSOR DE HDMI', '95.00', '200.00', 500, 'cable-adaptador-hdmi-a-vga.jpg', 'Cable hdmi conversor a usb', 3, 1, 0, 1),
(298, 9, 3, 'CBC-001', '431916000', 'Cubo chico ', '9.00', '20.00', 500, 'adaptador-usb-cubo-de-carga-apple-md810ea.jpg', 'CUBO CHICO  DE UN PUERTO', 3, 1, 0, 1),
(299, 9, 3, 'CBG-001', '431916000', 'CUBO GRANDE CARGA RAPÍDA', '20.00', '40.00', 500, 'cargador-de-pared-usb-best4one-3-pack-2-1a.jpg', 'CUBO GRANDE CON DOS PUERTOS CA', 3, 1, 0, 1),
(300, 9, 4, '9999-A59', '52161514', 'AUDIFONOS SAMSUNG AKG', '30.00', '80.00', 500, 'images.jpg', 'AUDIFONOS SAMSUNG AKG COLOR NE', 3, 1, 0, 1),
(301, 9, 3, 'FY6C', '23271718', 'FUNDA DE HUAWEI Y6', '55.00', '200.00', 500, 'funda-huawei-y7-2018-y72018-rosa-cerdito-protector-mica--D_NQ_NP_991940-MLM28453480470_102018-F.jpg', 'FUNDA HUAWEI DE COCHINO CON MI', 3, 1, 0, 1),
(302, 9, 3, '52170', '52161514', 'CABLE HDMI DE 1.5 MTRS', '20.00', '60.00', 500, 'cable-hdmi-a-hdmi-15mts-1080-hd-video-audio-lcd-ps3-xbox-pc-D_NQ_NP_15885-MLA20110801478_062014-F.jpg', 'CABLE HDMI DE 1.5 MTRS ', 3, 1, 0, 1),
(303, 9, 3, 'M6D-S9', '23271718', 'MICA DE CRISTAL PARA SAMSUNG S', '35.00', '120.00', 500, 'mica-6d-full-cover-expl-proof-s7s7-s8s8-s9s9-s10-D_NQ_NP_673152-MLM30089412455_042019-Q.jpg', 'MICA DE CRISTAL PARA SAMSUNG S', 3, 1, 0, 1),
(304, 9, 3, 'M6D-S8', '23271718', 'MICA DE CRISTAL PARA SAMSUNG S', '35.00', '120.00', 500, 'mica-6d-full-cover-expl-proof-s7s7-s8s8-s9s9-s10-D_NQ_NP_673152-MLM30089412455_042019-Q.jpg', 'MICA DE CRISTAL PARA SAMSUNG S', 3, 1, 0, 1),
(305, 9, 3, 'M6D-S8+', '23271718', 'MICA DE CRISTAL PARA SAMSUNG S', '35.00', '120.00', 500, 'mica-6d-full-cover-expl-proof-s7s7-s8s8-s9s9-s10-D_NQ_NP_673152-MLM30089412455_042019-Q.jpg', 'MICA DE CRISTAL PARA SAMSUNG S', 3, 1, 0, 1),
(306, 9, 3, 'M6D-S7', '23271718', 'MICA DE CRISTAL PARA SAMSUNG S', '35.00', '120.00', 500, 'mica-6d-full-cover-expl-proof-s7s7-s8s8-s9s9-s10-D_NQ_NP_673152-MLM30089412455_042019-Q.jpg', 'MICA DE CRISTAL PARA SAMSUNG S', 3, 1, 0, 1),
(307, 6, 18, '0419', '12191601', 'ALCOHOL ISOPROPILICO ', '60.00', '110.00', 491, 'SLM ALCOESI_1.jpg', 'ALCOHOL ISOPROPILICO  1LT', 1, 1, 0, 1),
(308, 6, 18, 'TS01', '47131502', 'TOALLITAS SLIMEX ', '30.00', '50.00', 500, 'SLM COMPUTOALLA_1.jpg', 'TOALLITAS SLIMEX  50 PZ', 3, 1, 0, 1),
(309, 9, 3, '¡12', '52161514', 'AUDIFONOS  BT ¡12', '240.00', '480.00', 500, '1528485157_781612_1528496773_noticia_normal.jpg', 'AUDIFONOS BT COLOR BLANCO ¡12', 3, 1, 0, 1),
(310, 9, 62, 'C-LG1', '431916000', 'CARGADOR LG ', '50.00', '120.00', 500, 's-l800.jpg', 'CARGADOR BLANCO LG (CARGA RAPI', 1, 1, 0, 1),
(311, 9, 3, 'BT-450', '52161605', 'WIRELESS RECEIVER', '45.00', '130.00', 500, 'descarga (1).jpg', 'RECEPTOR PARA FORMAR SEÑAL BT ', 3, 1, 0, 1),
(312, 9, 54, 'SM19500YTO', '431916000', 'CARGADOR SAMUNG ', '70.00', '150.00', 500, 'cargador-samsung.jpg', 'CARGADOR SAMSUNG BLANCO ENTRAD', 3, 1, 0, 1),
(313, 9, 60, 'RF-6220', '43211708', 'MOUSE INALAMBRICO', '60.00', '160.00', 500, '673819-MLM26664348333_012018-O.jpg', 'MOUSE ROJO CON NEGRO MEDIANO I', 1, 1, 0, 1),
(314, 9, 60, 'RF-622', '43211708', 'MOUSE ROJO CON NEGRO', '70.00', '160.00', 500, '673819-MLM26664348333_012018-O.jpg', 'MOUSE ROJO CON NEGRO INALAMBRI', 3, 1, 0, 1),
(315, 9, 3, 'BT-SOLAR', '2111701', 'BATERIA SOLAR', '65.00', '150.00', 500, 'BATERIA-SOLAR003.jpg', 'BATERIA SOLAR  POWER BOX', 3, 1, 0, 1),
(316, 9, 3, 'CI-RDN', '431916000', 'CARGADOR INALAMBRICO ', '55.00', '120.00', 500, 'productos34_16890.jpg', 'CARGADOR INALAMBRICO REDONDO', 3, 1, 0, 1),
(317, 9, 3, 'BCA-009', '52161512', 'BOCINA REDONDA', '60.00', '130.00', 500, '714FtNS515L._SX466_.jpg', 'BOCINA REDONDA CONTRA EL AGUA ', 3, 1, 0, 1),
(318, 9, 3, 'BC-HONGO', '52161512', 'BOCINA DE HONGUITO', '85.00', '170.00', 500, 'descarga (2).jpg', 'BOCINA DE HONGUITO COLOR VERDE', 3, 1, 0, 1),
(319, 9, 4, 'CARG-SM-I', '431916000', 'CARGADOR INALAMBRICO SAMSUNG', '400.00', '580.00', 500, 'PP.jpg', 'CARGADOR INALAMBRICO SAMSUNG N', 3, 1, 1, 1),
(320, 9, 3, 'M-699', '431916000', 'CARGADOR D1CIEMZRE 3.1A', '45.00', '80.00', 500, 'kit-entrada-v8-y-cubo-cargador-usb-mayoreo-modelo-m-699-D_NQ_NP_772951-MLM29508543362_022019-F.jpg', 'CARGADOR DE 3.1A COLOR BLANCO', 3, 1, 0, 1),
(321, 9, 3, 'CIG-116', '431916000', 'CARGADOR 5100mA', '45.00', '80.00', 500, 'rBVaI1jZx8iAc86LAASktPBb6JI035.jpg', 'CARGADOR COMPLETO CON PUERTOS ', 3, 1, 0, 1),
(322, 9, 3, 'SPT-001', '52161514', 'SPORTS HEADSET', '50.00', '115.00', 500, 'ÑO.jpg', 'AUDIFONOS BT COLOR NEGRO CON I', 3, 1, 0, 1),
(323, 9, 3, 'X-360', '52161605', 'X-CABLE', '75.00', '130.00', 500, 'cable-magnetico-360-gradosno-te-enredestipo-c-D_NQ_NP_607158-MLM26079678831_092017-F.jpg', 'CABLE CON ENTRADA MAGNÉTICA TR', 3, 1, 0, 1),
(324, 9, 64, 'BM003', '52161514', 'AUDIFONOS BLOCKBOK', '30.00', '75.00', 500, 'audifono-int-c-mic-negro-tcm55-panasonic.jpg', 'AUDIFONOS BLOCKBOK DIFERENTES ', 3, 1, 0, 1),
(325, 9, 3, 'K10', '45121602', 'PALO SERLFIE', '180.00', '280.00', 500, 'bluetooth-extendable-selfie-stick-tripod.jpg', 'PALO SELFIE PARA CONVERTIRSE E', 1, 1, 0, 1),
(326, 9, 4, 'CA-S7', '43191600', 'CARGADOR SAMSUNG S7', '80.00', '150.00', 500, 'descarga (3).jpg', 'CARGADOR SAMSUNG S7 COLOR NEGR', 3, 1, 0, 1),
(327, 9, 3, 'CT-R11', '39122227', 'GATILLOS R11', '45.00', '100.00', 500, 'r11-tel-fono-gamepad-gatillo-bot-n-de-fuego.jpg', 'GATILLOS R11 PEQUEÑOS COLOR PL', 1, 1, 0, 1),
(328, 9, 3, 'TWS-1', '52161514', 'AUDIFONOS BT TWS', '230.00', '480.00', 500, '8322f7f15552cead597932340290e66c-product.jpg', 'AUDIFONOS BT TWS COLOR BLANCO ', 3, 1, 0, 1),
(329, 9, 63, 'CAB-1152', '52161605', 'CABLE PARA IPHONE SUMEX', '30.00', '60.00', 500, 'descarga (4).jpg', 'CABLE PARA IPHONE SUMEX CARGA ', 3, 1, 0, 1),
(330, 9, 3, 'bc-hg', '52161512', 'BOCINA DE HONGUITO *', '70.00', '170.00', 500, 'hongo3.jpg', 'BOCINAS DE HONGO VERDE Y AZUL', 3, 1, 0, 1),
(331, 9, 3, 'B-LATA', '52161512', 'BOCINA DE LATA', '125.00', '190.00', 500, 'TEC-44-19PLA.jpg', 'BOCINA TIPO LATA GDE AZUL', 3, 1, 0, 1),
(332, 9, 62, 'CHAR-LG', '43191600', 'CARGADO LG', '60.00', '120.00', 500, 's-l800.jpg', 'CARGADOR LG DE CAJA BLANCO', 3, 1, 0, 1),
(333, 9, 4, 'CARG.S7', '43191600', 'CARGADOR SAMSUNG S7', '80.00', '150.00', 500, 'descarga (3).jpg', 'CARGADOR SAMSUNG CAJA NEGRA  S', 3, 1, 0, 1),
(334, 9, 3, 'CARG-FANTASY', '43191600', 'CARGADOR INALÁMBRICO FANTASY', '55.00', '120.00', 495, 'productos34_16890.jpg', 'CARGADOR INALÁMBRICO FANTASY P', 1, 1, 0, 1),
(335, 9, 3, 'BT-SLAR', '2111701', 'BATERIA SOLAR', '65.00', '150.00', 495, 'BATERIA-SOLAR003.jpg', 'BATERIA SOLAR AZUL', 1, 1, 0, 1),
(336, 9, 3, 'BC-A11', '52161512', 'BOCINA A11', '170.00', '380.00', 500, 'PP-SBT103_SKY_20BLUE_PERF.jpg', 'BOCINA A11 BT COLOR ROJO Y AZU', 3, 1, 0, 1),
(337, 9, 62, 'AU-LG', '52161514', 'AUDIFONOS LG', '60.00', '115.00', 500, 'd8f4d1edbbc4f6fe7aacf71328432171-product.jpg', 'AUDIFONOS LG', 3, 1, 0, 1),
(341, 7, 11, '845973030506', '43222600', 'TL-POE150S', '430.20', '530.00', 500, 'TL-POE150S-3.0-05.jpg', 'Inyector PoE Gigabit 802.3 af ', 2, 0, 0, 1),
(342, 7, 11, '845973070533', '43222609', 'TL-WR840N', '480.00', '590.00', 500, 'TL-WR840N(UN)3.0-D-01_1478135691141t.jpg', 'Router Inalámbrico N', 2, 0, 0, 1);
INSERT INTO `producto` (`idProd`, `idProveedor`, `idMarca`, `codProd`, `codigoSat`, `nombreProd`, `precioCosto`, `precioVenta`, `existencia`, `Imagen`, `desProd`, `idSucursal`, `siniva`, `stockDanado`, `idCategoria`) VALUES
(343, 7, 11, '845973050719', '83121703', 'Adaptador USB Nano inalámbrico', '165.84', '280.00', 500, 'adaptador-usb-nano-tp-link-tl-wn725n.jpg', 'Adaptador USB Nano inalámbrico', 2, 1, 0, 1),
(344, 7, 11, '845973050511', '83121703', 'TL-WN781ND', '202.00', '300.00', 500, 'TL-WN781ND_01.png', 'Adaptador Inalámbrico PCI Expr', 2, 0, 0, 1),
(345, 7, 11, '845973050535', '83121703', 'TL-WN7200ND', '185.00', '270.00', 500, 'tp-link-tl-wn7200nd-wireless-150-adapter-usb-hipwr.jpg', 'Adaptador USB Inalámbrico de A', 2, 0, 0, 1),
(347, 7, 29, '849439000709', '81112501', 'MW305R', '280.00', '430.00', 500, 'MW305R-l.png', 'Router Inalámbrico N 2.4 GHz d', 2, 0, 0, 1),
(348, 7, 19, '810354023552', '43222600', 'POE-24-24W-G', '549.37', '630.00', 500, 'fuente-poe-24v-05a-ubiquiti-poe-24-12w-boton-reset-original-D_NQ_NP_624909-MLA27465548748_052018-Q.jpg', 'Adaptador PoE Ubiquiti de 24 V', 2, 0, 0, 1),
(349, 9, 66, '7501483157081', '32101500', 'BOS-800', '274.00', '380.00', 500, 'amplificador-de-se-al-booster-de-35-db.jpg', 'Amplificador de señal Booster ', 2, 0, 0, 1),
(350, 6, 33, '740617175011', '32101622', 'SDC4/32GB', '70.00', '285.00', 500, 'MICRO-SD-32GB-KINGSTON-PCMARK.jpg', 'Memoria Micro SDHC Kingston de', 2, 0, 0, 1),
(351, 6, 33, '740617274646', '32101622', 'SDCS/16GB', '60.00', '170.00', 500, 'MEMORIA-MICRO-SD-16GB-KINGSTON-CLASE-4.jpg', 'Memoria Micro SDHC Kingston de', 2, 0, 0, 1),
(352, 6, 33, '740617128147', '32101622', 'SDC4/8GB', '58.00', '90.00', 500, 'memoria-micro-sd-8gb-clase-4-con-adaptador-kingston-D_NQ_NP_974525-MLM30893409102_052019-Q.jpg', 'Memoria Micro SDHC Kingston de', 2, 0, 0, 1),
(353, 6, 15, '4712366969483', '43202005', 'AC008-16G-RBO', '60.00', '150.00', 500, 'KUSBADC008BO16_1.jpg', 'MEMORIA USB ADATA DE 16 GB C00', 2, 0, 0, 1),
(354, 6, 15, '4718050609642', '43202005', 'AC008-16G-RWE', '60.00', '150.00', 500, 'CP-ADATA-AC008-16G-RWE-2.jpg', 'MEMORIA USB ADATA DE 16 GB C00', 2, 0, 0, 1),
(355, 6, 15, '4713218462879', '43202005', 'AUV230-16G-RBL', '60.00', '150.00', 500, 'timthumb.jpg', 'MEMORIA USB ADATA DE 16GB UV23', 2, 0, 0, 1),
(356, 6, 15, '4718050609604', '43202005', 'AC008-16G-RKD', '60.00', '150.00', 500, 'Almacenamiento-Unidades-Flash-USB-A-DATA-AC008-16G-RKD-75353-ptcu25frlRZ5MFZ1.jpg', 'MEMORIA USB ADATA DE 16 GB C00', 2, 0, 0, 1),
(357, 6, 15, '4718050609635', '43202005', 'AC008-8G-RWE', '58.00', '130.00', 500, 'Almacenamiento-Unidades-Flash-USB-A-DATA-AC008-8G-RWE-72217-ynDSD5Cf52bYeqWB.jpg', 'MEMORIA USB ADATA, 8GB, C008, ', 2, 0, 0, 1),
(358, 6, 15, '4713218465382', '43202005', 'AUV240-32G-RBK', '82.00', '260.00', 500, 'usb_adata_auv240-32g-rbk_203424_har_1.jpg', 'MEMORIA USB ADATA 32GB UV240, ', 2, 0, 0, 1),
(359, 6, 15, '4718050609666', '43202005', 'AC008-32G-RWE', '82.00', '260.00', 500, '2645-medium_default.jpg', 'MEMORIA USB ADATA 32GB, 2.0, W', 2, 0, 0, 1),
(360, 6, 15, '4713218463159', '43202005', 'AUV220-8G-RGNPK', '48.00', '130.00', 500, 'CP-ADATA-AUV220-8G-RGNPK-2.jpg', 'MEMORIA USB ADATA DE 8GB UV220', 2, 0, 0, 1),
(362, 9, 3, 'MGX2751CR', '43202005', 'LECTOR ADAPTADOR USB PARA MICR', '25.00', '30.00', 500, '20190913_094449.jpg', 'Card Reader MGX2751CR', 2, 1, 0, 1),
(364, 6, 20, '010343885295', '44103100', 'TINTA NEGRA EPSON', '144.00', '210.00', 500, 'f3b6ec56b7cfa07c519c7d770ef442b1-catalog.jpg', 'TINTA NEGRA EPSON PARA L200 / ', 2, 1, 0, 1),
(366, 6, 18, '7503002196724', '47131502', 'SLM COMPUTOALLA', '36.00', '55.00', 500, '(X)SIL-LIM-TOALLA.jpg', 'TOALLAS SILIMEX HUMEDAS', 2, 0, 0, 1),
(367, 9, 3, '6955555698124', '43191606', 'EAR-133', '80.00', '110.00', 500, '1568391095463.png', 'AUDIFONOS SUPER BASS', 2, 0, 0, 1),
(368, 9, 3, '7506086632041', '43191606', 'MH-2062WH', '80.00', '150.00', 500, '20190913_112622.jpg', 'AUDIFONOS MITZU BLANCOS', 2, 0, 0, 1),
(369, 9, 3, '094922425133', '43191606', 'VEP-003-360Z1-P', '60.00', '150.00', 500, '71Yhs9iY3+L._SL1500_.jpg', 'AUDIFONOS VEHO ROSAS', 2, 0, 0, 1),
(371, 9, 3, '7506086648110', '43191606', 'MH-5040RD', '150.00', '300.00', 500, '20190913_120213.jpg', 'AUDIFONOS MANOS LIBRES', 2, 0, 0, 1),
(372, 9, 68, '8435330622110', '43191606', 'MJ6688', '151.00', '180.00', 500, 'manos-libres-bluetooth-para-motorola-wireless-headset-mj6688-D_NQ_NP_989937-MLM28542500319_102018-F.jpg', 'AUDIFONOS MOTOROLA BLUETOOTH', 2, 0, 0, 1),
(373, 9, 3, '7201901000016', '43191606', 'EX-16AP', '58.00', '69.99', 500, '20190913_124538.jpg', 'MANOS LIBRES ', 2, 0, 0, 1),
(374, 9, 3, '1820190200027', '43191606', 'CY-027', '58.00', '69.99', 500, '20190913_125709.jpg', 'MANOS LIBRES', 2, 0, 0, 1),
(375, 9, 6, '6870156250031', '43191606', 'TWS-03', '378.00', '450.00', 500, '20190913_163331.jpg', 'TRULY WIRELESS IN-EAR HEADPHON', 2, 0, 0, 1),
(376, 9, 6, '6842356465584', '43191606', 'EVEREST 300', '470.00', '560.00', 500, '164d044aa64dfb6f471707a44bdf6249-product.jpg', 'WIRELESS HEADPHONES', 2, 0, 0, 1),
(378, 6, 16, '7502213293093', '43211607', 'BOCINAS ACTECK MULTIMEDIA 2.0 ', '191.00', '350.00', 500, 'bocinas-acteck-multimedia-1.jpg', 'BOCINAS MULTIMEDIA AK-AUBO-014', 2, 1, 0, 1),
(379, 6, 69, '615604993995', '43211607', 'Bocinas Easy Line USB 2.0 EL-9', '145.00', '190.00', 500, 'EL993995_4.jpg', 'BOCINAS USB 2.0', 2, 1, 0, 1),
(380, 9, 3, '670739021159', '43211607', 'BS-106', '50.00', '120.00', 500, 'bocina-contra-el-agua-envio-gratis-D_NQ_NP_791376-MLM28828506977_112018-F.jpg', 'WATERPROOF WIRELESS SPEAKER', 2, 0, 0, 1),
(381, 6, 30, '7506215909518', '43211607', 'TB-02005', '78.00', '115.00', 500, 'AK-TB-02005_1.jpg', 'BOCINAS MULTIMEDIA 2.0 NEGRO', 2, 0, 0, 1),
(383, 9, 3, '1100000000001', '43211607', 'MG-06', '100.00', '198.00', 500, 'Mini-Wireless-Bluetooth-Speaker-Portable-Universal-Mushroom-Stereo-subwoofer-Bluetooth-Speaker-for-Mobile-Phone-Tablet-computer.jpg', 'MINI WIRELESS SPEAKER ', 2, 1, 0, 1),
(386, 9, 3, 'A1748', '52161514', 'Earpods IPHX', '135.00', '200.00', 500, 's-l300.jpg', 'AUDIFONOS PARA IPHONE X DE CAJ', 3, 1, 0, 1),
(387, 9, 3, 'SLC-091', '52161512', 'BOCINA AMARILLA', '135.00', '320.00', 500, 'SLC.jpg', ' BOCINA CUADRADA AMARILLA', 3, 1, 0, 1),
(388, 9, 3, 'AK-66', '39122227', 'CONTROL 4 GATILLOS', '180.00', '380.00', 500, 'descarga.jpg', 'CONTROL PUBG NEGRO DE 4 GATILL', 3, 1, 0, 1),
(389, 9, 63, 'CBIPH SUMEX', '43191600', 'CABLE DE IPHONE SUMEX', '35.00', '60.00', 500, 'D_NQ_NP_776137-MLM32084595384_092019-V.jpg', 'CABLE DE IPH. SUMEX COLOR BRON', 3, 1, 0, 1),
(390, 9, 3, 'SMWT', '54111501', 'SMART WATCH NEGRO', '250.00', '390.00', 500, 'smartwatch-pulsera-inteligente-letture-reloj-inteligente-d-D_NQ_NP_915595-MLM31956394669_082019-F.jpg', 'SMART WATCH C/BATERIA EXTRA', 3, 1, 0, 1),
(391, 9, 3, 'CHARG CAR', '431619000', 'CARGADOR PARA CARRO', '15.00', '30.00', 500, '226-Cargador-Triple-Para-Carro.jpg', 'CARGADOR PARA CARRO CUADRADO D', 3, 1, 0, 1),
(392, 9, 3, 'BM-003', '52161514', 'AUDIFONOS BLACKBOX', '30.00', '75.00', 500, 'D_NQ_NP_729793-MLM31972980695_082019-O.jpg', 'AUDIFONOS BM-0003', 3, 1, 0, 1),
(393, 9, 3, 'AUX_C P', '52161605', 'AUXILIAR CORTO DE PLASTICO', '15.00', '25.00', 500, 'paquete-con-500-cables-auxiliar-plastico-transparente-color-D_NQ_NP_773939-MLM26738339548_012018-F.jpg', 'AUXILIAR CORTO DE PLASTICO DIF', 3, 1, 0, 1),
(394, 9, 3, 'CB-MT', '43191600', 'CABLE DE CARGA METALICO', '15.00', '30.00', 500, 'cable-usb-carga-y-datos-reforzado-metalico-usb-lightning-D_NQ_NP_919709-MLM29451671662_022019-F.jpg', 'CABLE DE CARGA METALICO CORTO', 3, 1, 0, 1),
(395, 9, 3, 'CB-CUERDA', '431916000', 'CABLE DE CARGA CUERDA', '20.00', '35.00', 500, 'images.jpg', 'CABLE DE CARGA LARGO DE CUERDA', 3, 1, 0, 1),
(396, 9, 3, 'BT-4502', '23151821', 'WIRELESS RECEIVER', '55.00', '120.00', 500, 'rBVaI1oU_5WAAX5mAAXyqUZzsDQ473.jpg', 'ADAPTADOR PARA ESTEREO ', 3, 1, 0, 1),
(397, 9, 62, 'EWS', '43', 'AUDIFONOS BLUETOOTH', '155.17', '180.00', 500, '7d1c.jpg', 'HEADSET BLUETOOTH LG', 2, 1, 0, 1),
(398, 9, 3, 'EWSMTZ00002', '43191606', 'SPORTS HEADSET', '129.00', '150.00', 500, '2168375c46a6a806b2d30fffc326ec4e-product.jpg', 'BLUETOOTH FREESTYLE HEADSET MI', 2, 1, 0, 1),
(399, 9, 3, 'EWSMTZ00003', '43191606', 'I12', '413.79', '480.00', 500, '1adb15_c54e830e8a4a4d098767ae12ff045b18~mv2.png', 'WIRELESS EARPHONE', 2, 1, 0, 1),
(400, 9, 3, '6968132003044', '26121636', 'CDQ-961', '51.72', '60.00', 500, 'images546.jpg', 'XH TRAVEL CHARGER', 2, 1, 0, 1),
(401, 9, 3, 'EWSMTZ00004', '26121636', 'CDQ-973', '43.10', '50.00', 500, 'para-celular-cargador-D_NQ_NP_781290-MLM32318690313_092019-F.jpg', 'XH TRAVEL CHARGER (LED-CHARGER', 2, 1, 0, 1),
(402, 9, 3, 'EWSMTZ00005', '26121636', 'M-699', '68.96', '80.00', 500, 'cargador-d1ciemzre-v8-turbo-m-699.jpg', 'SMART CHARGER WITH USB CABLE', 2, 1, 0, 1),
(403, 6, 30, '1760943036238', '43211708', 'MOUSE ÓPTICO USB TB-01001', '73.27', '85.00', 500, 'AK-TB-01001_1.jpg', 'MOUSE OPTICO ACTECK ALAMBRICO ', 2, 1, 0, 1),
(404, 9, 47, 'EWSMTZ00006', '43211705', 'GAME CONTROLLER', '344.82', '400.00', 500, 'd0a1f18598c8bec7e81ca5fcd1b7e3ae.jpg', 'MOBILE GAME CONTROLLER', 2, 1, 0, 1),
(405, 9, 47, '2050010100001', '43211705', 'YXB-11', '474.13', '550.00', 500, 'gamepad-560-yxb-11-compatible-con-dispositivos-mobiles-pc-D_NQ_NP_711332-MLM31984511796_082019-F.jpg', 'WIRELESS CONTROLLER', 2, 1, 0, 1),
(406, 9, 47, 'EWSMTZ00007', '43211705', 'AK-66', '301.72', '350.00', 500, 'IMG_5019-1000x1000.jpg', 'PUBG MOBILE CONTROLLER', 2, 1, 0, 1),
(407, 9, 3, 'EWSMTZ00008', '43191606', 'BLOCKBOX', '68.96', '80.00', 500, 'D_NQ_NP_729793-MLM31972980695_082019-O.jpg', 'AUDIFONOS BLOCKBOX (BLANCO Y N', 2, 1, 0, 1),
(408, 9, 3, '69925292318', '43211705', 'SUP GAME BOX', '387.93', '450.00', 500, 'freeshipping-game-box-300-1-retro-handheld-game-pad-console-flashtrend-1810-01-Flashtrend@3.jpg', 'Sup Game Box 300 In 1 Retro Ha', 2, 1, 0, 1),
(409, 9, 47, 'EWSMTZ00009', '43191610', 'K10', '241.37', '280.00', 500, 'rBVaVVzeTFKAPmTXAAQNdK6h_uE176.jpg', 'SELFIE STICK INTEGRATED TRIPOD', 2, 1, 0, 1),
(411, 9, 47, 'EWSMTZ000010', '43191610', 'K07', '241.37', '280.00', 500, 'images165465.jpg', 'SELFIE STICK INTEGRATED TRIPOD', 2, 1, 0, 1),
(412, 9, 3, 'EWSMTZ000011', '43191606', 'J5', '43.10', '50.00', 500, 'imagesB.jpg', 'HEADSET/ ECOUTER', 2, 1, 0, 1),
(413, 9, 3, 'EWSMTZ000012', '43191606', 'J5', '43.10', '50.00', 500, 'A.jpg', 'HEADSET/ ECOUTER ', 2, 1, 0, 1),
(414, 9, 47, 'EWSMTZ000013', '43191606', 'AirPods', '387.93', '450.00', 500, 'airpods2.jpg', 'AIRPODS 350mAh', 2, 1, 0, 1),
(415, 9, 3, 'EWSMTZ000014', '43191606', 'S-750', '301.72', '350.00', 500, 'images124.jpg', 'HEADPHONES DYNAMIC STEREO SOUN', 2, 1, 0, 1),
(416, 9, 3, '0306546585033', '43191606', 'URBEATS WIRELESS', '224.13', '260.00', 500, 'audifonos-urbeats-3-wireless-mj-6699-beats-by-drdre-D_NQ_NP_814293-MLM31810818217_082019-F.jpg', 'WIRELESS EARPHONES WITH CARRYI', 2, 1, 0, 1),
(417, 9, 3, '4875915635328', '43191606', 'M8', '241.37', '280.00', 500, 'images1.jpg', 'SPORT WIRELESS', 2, 1, 0, 1),
(418, 9, 3, '670739020497', '22111701', 'MA-12A', '82.20', '100.00', 500, 'PB-22-R.jpg', 'POWER BANK PORTABLE 1200mAh PO', 2, 1, 0, 1),
(420, 9, 3, 'EWSMTZ000015', '43211607', 'J006C', '240.00', '290.00', 500, 'images.jpg', 'BOCINA RADIO FM', 2, 1, 0, 1),
(421, 9, 3, 'EWSMTZ000016', '43211607', 'A11', '344.82', '400.00', 500, 'A11.jpg', 'BOCINA RADIO FM (ROJA)', 2, 1, 0, 1),
(422, 9, 3, 'EWSMTZ000017', '43211607', 'SLC-091', '215.51', '250.00', 500, '254b55ece17254b39907fb2036826e0f.jpg', 'BOCINA RADIO FM', 2, 1, 0, 1),
(423, 9, 47, 'EWSMTZ000018', '22111701', 'YD59', '189.65', '220.00', 500, 'solar-waterproof-power-bank-5000mah-black-or-blue-1.jpg', 'BATERIA RECARGABLE SOLAR (AZUL', 2, 1, 0, 1),
(424, 9, 47, '3201827000504', '22111701', 'FANTASY WIRELESS CHARGER', '129.31', '150.00', 500, 'rBVaSFrHCpyAC2ahAALoOQNTqpc804.jpg', 'CARGADOR DE BATERIAS', 2, 1, 0, 1),
(425, 9, 54, '6935152052000', '26121636', 'TRAVEL ADAPTER', '215.51', '250.00', 500, '1208478543_w640_h640_setevoe-zaryadnoe-ustrojstvo.jpg', 'SAMSUNG TRAVEL ADAPTER', 2, 1, 0, 1),
(426, 9, 62, '6959668935688', '26121636', 'USB TRAVEL CHARGER', '129.31', '150.00', 500, 'cargador-lg-original-carga-rapida-tipo-c-v20-g6-g5-v30-g7-D_NQ_NP_840346-MLM32085358167_092019-F.jpg', 'CARGADOR LG ', 2, 1, 0, 1),
(427, 9, 68, 'EWSMTZ000019', '26121636', 'TRAVEL ADAPTER', '129.31', '150.00', 500, 'db92634bccbee655658097f67d823801-product.jpg', 'TRAVEL ADAPTER FAST CHARGE USB', 2, 1, 0, 1),
(428, 9, 47, '8569828756312', '26121636', 'TRAVEL CHARGER USB', '129.31', '150.00', 500, 'WhatsApp Image 2019-10-25 at 11.40.53.jpeg', '3USB PORT TRAVEL CHARGER', 2, 1, 0, 1),
(429, 9, 54, '8801643105549', '26121636', 'WIRELESS CHARGER', '500.00', '580.00', 500, 'a.jpg', 'WIRELESS CHARGER STAND SAMSUNG', 2, 1, 0, 1),
(430, 9, 47, 'EWSMTZ000020', '26121636', 'CUBO PARA CENICERO DEL AUTO ', '25.86', '30.00', 500, 'images2.jpg', 'CARGADOR PARA AUTO USB 3 PUERT', 2, 1, 0, 1),
(431, 9, 47, 'EWSMTZ000021', '26121636', 'X- CABLE J-009', '112.06', '130.00', 500, 'índice1.jpg', 'METAL MAGNETIC CABLE 360° 1Mts', 2, 1, 0, 1),
(432, 9, 47, '6854851217414', '26121636', 'X-CABLE ', '129.31', '150.00', 500, 'índice.jpg', 'X-CABLE METAL MAGNETIC CABLE 3', 2, 1, 0, 1),
(433, 9, 63, 'EWSMTZ000023', '43211600', 'USB CABLE QUALITY CAB-1154', '68.96', '80.00', 500, 'índice2.jpg', 'USB UNIVERSAL CHARGER ', 2, 1, 0, 1),
(434, 9, 65, '2020190101154', '43211600', 'USB CABLE QUALITY CAB-1152', '51.72', '60.00', 500, 'índice3.jpg', 'USB UNIVERSAL CHARGER', 2, 1, 0, 1),
(435, 9, 60, '1720150301081', '43211600', '2 IN 1 PAREJAS DE CABLE DE AUD', '43.10', '50.00', 500, 'índice4.jpg', 'CABLE DE AUDIO ', 2, 1, 0, 1),
(436, 9, 3, 'EWSMTZ000022', '43211600', 'CABLE AUXILIAR 1.30 MTS', '30.17', '35.00', 500, 'índice6.jpg', 'CABLE AUXILIAR ANARANJADO', 2, 1, 0, 1),
(437, 9, 3, 'EWSMTZ00001', '43211600', 'CABLE AUXILIAR 1.40 MTS', '30.17', '35.00', 500, 'índice7.jpg', 'CABLE AUXILIAR VERDE', 2, 1, 0, 1),
(438, 9, 3, 'EWSMTZ000024', '43211600', 'CABLE AUXILIAR', '21.55', '25.00', 500, 'índice5.jpg', 'CABLE AUXILIAR ', 2, 1, 0, 1),
(439, 9, 3, 'EWSMTZ000025', '43211600', 'CABLE AUXILIAR 1.5 MTS', '30.17', '35.00', 500, 'índice8.jpg', 'CABLE AUXILIAR MORADO', 2, 1, 0, 1),
(440, 9, 3, 'EWSMTZ000026', '43211600', 'CABLE AUXILIAR ', '25.86', '30.00', 500, 'índice21.jpg', 'CABLE AUXILIAR METÁLICO/VERDE', 2, 1, 0, 1),
(441, 9, 3, 'EWSMTZ000027', '43211600', 'CABLE USB 1M', '30.17', '35.00', 500, 'índice.jpg', 'CABLE USB MORADO/ VERDE 1mts', 2, 1, 0, 1),
(442, 9, 3, 'EWSMTZ000028', '43211600', 'CABLE USB', '51.72', '60.00', 500, 'índice20.jpg', 'CABLE USB METALICO-AZUL', 2, 1, 0, 1),
(443, 9, 3, 'EWSMTZ000029', '43211600', 'CABLE USB 1M', '25.86', '30.00', 500, 'índice22.jpg', 'CABLE USB ROJO 1M', 2, 1, 0, 1),
(444, 9, 3, '4607014057004', '55121505', 'LLAVERO AVENGERS', '137.93', '160.00', 500, 'llavero-metalico-guantelete-iron-man-avengers-endgame-fotocaja-tienda-geek-11-0077e632d015329f8015633855511882-640-0.jpg', 'NANO GUANTELETE IRON MAN', 2, 1, 0, 1),
(445, 9, 3, 'EWSMTZ000030', '43211600', 'FUNDA PARA TABLET', '155.17', '180.00', 500, 's-l1600.jpg', 'FUNDA PARA TABLET PROTEUS', 2, 1, 0, 1),
(446, 9, 3, 'EWSMTZ000031', '43211802', 'MOUSE PAD', '21.55', '25.00', 500, '07100015_4-500x500.jpg', 'MOUSE PAD ANIMALS', 2, 1, 0, 1),
(447, 9, 3, 'EWSMTZ000032', '43211802', 'MOUSE PAD', '43.10', '50.00', 500, 'images.jpg', 'MOUSE PAD ERGONOMICO', 2, 1, 0, 1),
(448, 9, 3, 'EWSMTZ000033', '43211802', 'MOUSE PAD', '21.55', '25.00', 500, '07100014_4-500x500.jpg', 'MOUSE PAD COLORS', 2, 1, 0, 1),
(449, 9, 3, 'EWSMTZ000034', '43211802', 'MOUSE PAD', '21.55', '25.00', 500, 'índice23.jpg', 'MOUSE PAD VIEWS', 2, 1, 0, 1),
(450, 9, 3, '1100225632273', '43211708', 'GAMING MOUSE', '86.20', '116.00', 500, 'mouse-gamer-6-botones-led-gaming-ridgeway-mou-22-mayoreo-D_NQ_NP_713448-MLM29573140913_032019-F.jpg', 'MOUSE GAMER MOU-22', 2, 0, 0, 1),
(451, 9, 3, '1100225632259', '43211708', 'OPTICAL MOUSE MOU-20', '68.96', '80.00', 500, 'images.jpg', 'MOUSE OPTICO', 2, 1, 0, 1),
(452, 6, 69, '615604993377', '43211708', 'MOUSE OPTICO EL-993377', '103.44', '120.00', 500, 'EL-993377_1.jpg', 'MOUSE OPTICO ALAMBRICO COMPATI', 2, 1, 0, 1),
(453, 6, 69, '615604993315', '43211708', 'MOUSE OPTICO EL-993315', '112.06', '130.00', 500, '81pPkKy6PhL._SY679_.jpg', 'MOUSE OPTICO ROJO', 2, 1, 0, 1),
(454, 9, 60, '9201705001595', '43211708', 'MOUSE OPTICO G-159', '103.44', '120.00', 500, 'índice25.jpg', '3D OPTICAL MOUSE', 2, 1, 0, 1),
(455, 6, 16, '7506215916554', '43211708', 'MOUSE OPTICO AC-916554', '129.31', '150.00', 500, 'images90.jpg', 'MOUSE OPTICO ACTECK INALAMBRIC', 2, 1, 0, 1),
(456, 9, 3, 'EWSMTZ000038', '43211708', 'WIRELESS MOUSE', '129.31', '150.00', 500, '1.jpg', 'Ratón inalámbrico moderno colo', 2, 1, 0, 1),
(457, 6, 30, '7506215909556', '43211612', 'KIT DE TECLADO Y MOUSE USB', '159.48', '185.00', 500, 'AK-TB-01006_1.jpg', 'KIT TECLADO Y MOUSE ACTECK EST', 2, 1, 0, 1),
(458, 6, 16, 'EWSMTZ000039', '43211612', 'KIT 3 EN 1 TECLADO USB, MOUSE ', '313.92', '365.00', 500, 'AK-WKTE-006_1.jpg', 'KEYBOARD, MOUSE, 2.0 SPEAKERS ', 2, 1, 0, 1),
(459, 6, 16, '7506215916493', '43211706', 'TECLADO INALAMBRICO MULTIMEDIA', '198.27', '230.00', 500, 'AC-916493.jpg', 'TECLADO INALAMBRICO ACTECK MUL', 2, 1, 0, 1),
(460, 9, 3, '9625832566886', '43211705', '3IN 1 GAME CONTROLLERS', '258.62', '300.00', 500, 'índice30.jpg', 'ALL- IN- ONE GAME CONTROLLERS ', 2, 1, 0, 1),
(461, 9, 3, '6923787400006', '43211600', 'CANDADO DE SEGURIDAD', '172.41', '200.00', 500, 'images86.jpg', 'CANDADO DE SEGURIDAD PARA COMP', 2, 1, 0, 1),
(462, 9, 39, '557C60BM5PF3CL', '26121636', 'CARGADOR PARA LAPTOP', '362.06', '420.00', 500, '110ce8aab8c4544489145b.jpg', 'CARGADOR HP', 2, 1, 0, 1),
(463, 9, 28, 'AQOW0544A16123', '26121636', 'CARGADOR PARA LAPTOP', '387.93', '450.00', 500, 'images87.jpg', 'CARGADOR TOSHIBA', 2, 1, 0, 1),
(464, 9, 70, '660904351', '26121636', 'CARGADOR PARA LAPTOP', '413.79', '480.00', 500, 'images88.jpg', 'CARGADOR ACER', 2, 1, 0, 1),
(465, 9, 23, 'EWSMTZ000040', '26111701', 'BATERIA CMOS', '43.10', '50.00', 500, 'BATERIA CMOS.jpg', 'PAQUETE DE BATERIAS', 2, 1, 0, 1),
(466, 9, 67, '7506086600712', '26111701', 'BATERÍA LITIO', '21.55', '25.00', 500, 'MP-CR2032-2.jpg', 'BATERÍA LITIO TIPO BOTÓN', 2, 1, 0, 1),
(467, 6, 33, '740617219787', '43201401', 'MEMORIA RAM 4GB', '560.35', '650.00', 500, 'memoria-ram-kingston-4gb-sodimm-ddr3-pc12800.jpg', 'MEMORIA RAM KINGSTON DDR3, SOD', 2, 1, 0, 1),
(468, 6, 33, '740617228267', '43201401', 'MEMORIA RAM 2GB', '387.93', '450.00', 500, 'KVR13S9S62.jpg', 'MEMORIA RAM KINGSTON ', 2, 1, 0, 1),
(469, 6, 30, 'EWSMTZ000041', '39121635', 'FUENTE DE PODER TB-05003', '413.79', '480.00', 500, 'TB-05003.jpg', 'FUENTE DE PODER 480W/24PIN/2 S', 2, 1, 0, 1),
(470, 9, 21, '14620217', '39121635', 'FUENTE DE PODER PSU-101', '474.13', '550.00', 500, 'PSU-101.jpg', 'FUENTE DE PODER VORAGO PSU-101', 2, 1, 0, 1),
(471, 6, 23, '76662370166', '32131008', 'PASTA TERMICA PARA VENTILADOR ', '47.41', '55.00', 500, 'IC-701662.jpg', 'VENT. CPU, PASTA TERMICA JERIN', 2, 1, 0, 1),
(472, 6, 18, 'EWSMTZ000042', '44102904', 'REMOVEDOR DE POLVO', '137.93', '160.00', 500, 'AIRE COMPRIMIDO SILIMEX 660ML.jpg', 'Aire Comprimido 660ml', 2, 1, 0, 1),
(473, 6, 20, 'EWSMTZ000043', '44103105', 'TINTA MAGENTA EPSON', '181.03', '210.00', 500, 'EP-T664320-AL.jpg', 'TINTA MAGENTA EPSON PARA L200 ', 2, 1, 0, 1),
(474, 6, 20, 'EWSMTZ000044', '44103105', 'TINTA AMARILLA EPSON', '181.03', '210.00', 500, 'EP-T664420-AL.jpg', 'TINTA AMARILLA EPSON PARA L200', 2, 1, 0, 1),
(475, 6, 20, 'EWSMTZ000045', '44103105', 'TINTA CYAN EPSON', '181.03', '210.00', 500, 'EP-T664220-AL.jpg', 'TINTA CYAN EPSON PARA L200 / L', 2, 1, 0, 1),
(476, 6, 71, 'EWSMTZ000046', '44103103', 'TONER UNIV01AC', '387.93', '450.00', 500, '2019-10-29.png', 'TONER CARTRIDGE', 2, 1, 0, 1),
(477, 7, 3, 'EWSMTZ000047', '25173100', 'Localizador GPS 2G', '3318.96', '3850.00', 500, 'MVT600.jpg', 'LOCALIZADOR VEHICULAR VIA CELU', 2, 1, 0, 1),
(478, 7, 3, 'EWSMTZ000049', '25173100', 'Localizador Vehicular 3G', '206.89', '240.00', 500, 'ECO4LIGHT3G-p.PNG', 'Localizador Vehicular 3G compa', 2, 1, 0, 1),
(479, 9, 23, '766623342650', '43211600', 'CABLE USB A-B 1.8M', '24.13', '28.00', 500, 'cable-usb-20-impresora-manhattan-ab-18-metros-342650-D_NQ_NP_751955-MLM31216129316_062019-F.jpg', 'Cable USB para Impresora y Esc', 2, 1, 0, 1),
(480, 4, 3, '8820181208772', '26121604', 'HDMI A AUDIO VGA', '241.37', '280.00', 498, '20877.jpg', 'Cable Adaptador HDMI a VGA con', 2, 1, 0, 1),
(481, 7, 3, '782980502483', '39121634', 'PROTECTOR DE CÁMARAS FIJAS ', '1637.93', '1900.00', 497, 'DTKPVP27B-p.PNG', 'Protección para alimentación y', 2, 1, 0, 1),
(482, 7, 43, '766623210737', '39121462', 'JACK CAT 6 DE IMPACTO', '68.96', '80.00', 500, 'JACK CAT6.jpg', 'JACK CAT 6 DE IMPACTO AZUL', 2, 1, 0, 1),
(483, 9, 65, '8745405658884', '39121522', 'MULTICONTACTOS ', '51.72', '60.00', 499, '723585-MLM28242121476_092018-Y.jpg', 'TOMACORRIENTE DE 6 CONTACTOS', 2, 1, 0, 1),
(484, 7, 40, 'EWSMTZ000050', '32101617', 'RELEVADOR CON CONTACTO NC/N', '60.34', '70.00', 499, 'PRORELAYdet.jpg', 'Módulo de relevador', 2, 1, 0, 1),
(485, 7, 40, '34598000477', '46171619', 'CAJA DE METAL P/BOTÓN ', '155.17', '180.00', 500, 'PRO800BOX.jpg', 'Caja cromada para instalación ', 2, 1, 0, 1),
(486, 7, 40, '20180606942', '46171619', 'METAL PUSH-TO-EXIT BUTTON', '181.03', '207.00', 495, 'PRO800B.jpg', 'Botón de petición de Salida / ', 2, 1, 0, 1),
(487, 9, 43, '766623163286', '39121704', 'TAPA 1 PERFORACIÓN ', '30.17', '35.00', 494, '163286.jpg', 'Placa de pared vertical, salid', 2, 1, 0, 1),
(488, 7, 23, '766623342766', '26121600', 'CABLE CORRIENTE INT. HDD SATA', '38.79', '45.00', 499, '342766.jpg', 'CABLE D/ALIMENT.P/DISCO DURO H', 2, 1, 0, 1),
(489, 7, 3, 'EWSMTZ000051', '26121604', 'CABLE HDMI', '110.00', '720.00', 497, 'HDMI 10 MTS.jpg', 'CABLE HDMI DE 10MTS', 2, 1, 0, 1),
(490, 7, 11, 'EWSMTZ000052', '43222608', 'Extensor de Rango Inalámbrico ', '360.00', '530.00', 487, 'TL-WA850RE.jpg', 'Repetidor / Extensor de Cobert', 2, 1, 0, 1),
(491, 7, 11, 'EWSMTZ000053', '43222610', 'Switch 8 Puertos TL-SF1008D ', '215.51', '250.00', 483, 'TLSF1008D-p.PNG', 'Switch de escritorio 8 puertos', 2, 1, 0, 1),
(492, 7, 11, 'EWSMTZ000054', '43222610', 'Switch de 5 puertos TL-SF1005D', '145.00', '220.00', 477, 'TL-SF1005D-01.jpg', 'Switch de escritorio 5 puertos', 2, 1, 0, 1),
(493, 7, 41, 'EWSMTZ000055', '32151909', 'CONECTOR 12VCD PARA ALIMENTAR ', '40.00', '80.00', 477, 'JRF51det.jpg', 'Cable con conector jack hembra', 2, 1, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_prod` int(11) NOT NULL,
  `nomb_prod` varchar(100) NOT NULL,
  `tipo_prod` varchar(50) NOT NULL,
  `precio_unit` float NOT NULL,
  `precio_dist` float NOT NULL,
  `fecha_reg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_prod`, `nomb_prod`, `tipo_prod`, `precio_unit`, `precio_dist`, `fecha_reg`) VALUES
(21, 'Aceite Capri', 'enlatados', 18, 7, '2014-12-08'),
(23, 'Mayonesa Hellmans', 'otros', 5, 4, '2014-11-11'),
(24, 'Gaseosa KR', 'otros', 5, 4, '2014-09-30'),
(25, 'Mantequilla Laive', 'otros', 6, 5, '2014-09-03'),
(26, 'Galletas Margaritas', 'otros', 2, 1, '2014-08-15'),
(27, 'Arroz la Paisana', 'otros', 6, 3, '2015-02-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `idProveedor` int(10) NOT NULL,
  `NombreProveedor` varchar(60) NOT NULL,
  `RFC` varchar(30) NOT NULL,
  `Direccion` varchar(200) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `Telefono` int(20) NOT NULL,
  `PaginaWeb` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`idProveedor`, `NombreProveedor`, `RFC`, `Direccion`, `correo`, `Telefono`, `PaginaWeb`) VALUES
(4, 'on tenck', 'aaaa000000111', 'calle del carmen 69 local a-1', 'nt', 2147483647, 'nt'),
(5, 'ONIX', '000456L', 'Lázaro Cárdenas no.54 local 9', 'onixsoporte@gmail.com', 55122702, 'www.onix.com'),
(6, 'LeTech', 'LTM1503202P1', 'HIDALGO 310 ALTOS COL.LOMA BONITA, CP.89325 TAMPICO,TAMAULIPAS', 'administrador@letech.com.mx', 2147483647, 'www.letech.mx'),
(7, 'SYSCOM', 'RSSC - 840823 - JT3', '20 DE NOVIEMBRE NUM. 805 COL. CENTRO', 'WWW.WEBMASTER@SYSCOM.COM', 2147483647, 'WWW.SYSCOM.MX'),
(8, 'MAYORTEC', 'MSC090115BS8', 'Av. Deza y Ulloa #4523 Col. Unidad Presidentes, Chihuahua, Chih. M?xico ', ' ventas@mayortec.mx', 614, 'https://www.mayortec.mx'),
(9, 'CHINOS ', 'NO EXISTENTE', 'PLAZA TERESA LOCAL 95', 'NO EXISTENTE', 5350, 'NO EXISTENTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salida_producto`
--

CREATE TABLE `salida_producto` (
  `idSalida` int(11) NOT NULL,
  `idConcepto` varchar(100) NOT NULL,
  `concepto` varchar(50) NOT NULL,
  `idProd` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_salida` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idSucursal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `salida_producto`
--

INSERT INTO `salida_producto` (`idSalida`, `idConcepto`, `concepto`, `idProd`, `cantidad`, `fecha_salida`, `idSucursal`) VALUES
(6, '200107113313', 'Venta contado', 218, 4, '2020-01-07 17:37:11', 1),
(7, '200107113313', 'Venta contado', 233, 2, '2020-01-07 17:37:11', 1),
(8, '200107113313', 'Venta contado', 241, 2, '2020-01-07 17:37:11', 1),
(9, '200107113906', 'Venta contado', 218, 3, '2020-01-07 17:39:06', 1),
(10, '200107113906', 'Venta contado', 226, 1, '2020-01-07 17:39:06', 1),
(11, '200108192826', 'Venta contado', 241, 4, '2020-01-09 01:28:26', 1),
(12, '200108192826', 'Venta contado', 251, 1, '2020-01-09 01:28:26', 1),
(13, '200108192826', 'Venta contado', 286, 2, '2020-01-09 01:28:26', 1),
(14, '200108193330', 'Venta contado', 218, 1, '2020-01-09 01:33:30', 1),
(15, '200108193330', 'Venta contado', 294, 1, '2020-01-09 01:33:30', 1),
(16, '200109133831', 'Venta credito', 218, 1, '2020-01-09 19:38:31', 1),
(17, '200109133831', 'Venta credito', 235, 1, '2020-01-09 19:38:31', 1),
(18, '200109133831', 'Venta credito', 232, 1, '2020-01-09 19:38:31', 1),
(19, '200109134912', 'Venta credito', 218, 2, '2020-01-09 19:49:12', 1),
(20, '200109134912', 'Venta credito', 240, 1, '2020-01-09 19:49:12', 1),
(21, '200109135341', 'Venta credito', 224, 3, '2020-01-09 19:53:41', 1),
(22, '200109135942', 'Venta credito', 255, 3, '2020-01-09 19:59:42', 1),
(23, '200109135942', 'Venta credito', 280, 1, '2020-01-09 19:59:42', 1),
(24, '200109140106', 'Venta credito', 268, 1, '2020-01-09 20:01:06', 1),
(25, '200109140106', 'Venta credito', 291, 1, '2020-01-09 20:01:06', 1),
(26, '200109140247', 'Venta credito', 290, 1, '2020-01-09 20:02:47', 1),
(27, '200109140346', 'Venta credito', 251, 1, '2020-01-09 20:03:46', 1),
(28, '200110193402', 'Venta contado', 496, 1, '2020-01-11 01:34:02', 1),
(29, '200110194355', 'Venta contado', 495, 1, '2020-01-11 01:43:55', 1),
(30, '200110195142', 'Venta contado', 325, 1, '2020-01-11 01:51:42', 1),
(31, '200110195314', 'Venta contado', 496, 1, '2020-01-11 01:53:14', 1),
(32, '200115123604', 'Venta credito', 180, 4, '2020-01-15 18:36:04', 1),
(33, '200115123604', 'Venta credito', 183, 1, '2020-01-15 18:36:04', 1),
(34, '200115161848', 'Venta credito', 496, 3, '2020-01-15 22:18:48', 1),
(35, '200115161915', 'Venta contado', 327, 1, '2020-01-15 22:19:17', 1),
(36, '200115162112', 'Venta contado', 310, 2, '2020-01-15 22:21:12', 1),
(37, '200115163432', 'Venta contado', 166, 1, '2020-01-15 22:34:32', 1),
(38, '200116092217', 'Venta contado', 325, 1, '2020-01-16 15:22:17', 1),
(39, '200116092217', 'Venta contado', 292, 1, '2020-01-16 15:22:18', 1),
(40, '200116095409', 'Venta contado', 289, 1, '2020-01-16 15:54:09', 1),
(41, '200116095409', 'Venta contado', 288, 2, '2020-01-16 15:54:09', 1),
(42, '200116101608', 'Venta contado', 496, 1, '2020-01-16 16:16:08', 1),
(43, '200116101608', 'Venta contado', 495, 3, '2020-01-16 16:16:08', 1),
(44, '200116105510', 'Venta contado', 496, 1, '2020-01-16 16:55:10', 1),
(45, '200116105510', 'Venta contado', 495, 3, '2020-01-16 16:55:10', 1),
(46, '200116105535', 'Venta contado', 496, 1, '2020-01-16 16:55:35', 1),
(47, '200116105535', 'Venta contado', 495, 3, '2020-01-16 16:55:35', 1),
(48, '200116105544', 'Venta contado', 496, 1, '2020-01-16 16:55:44', 1),
(49, '200116105544', 'Venta contado', 495, 3, '2020-01-16 16:55:44', 1),
(50, '200116120040', 'Venta contado', 496, 1, '2020-01-16 18:00:40', 1),
(51, '200116120040', 'Venta contado', 495, 3, '2020-01-16 18:00:40', 1),
(52, '200116181008', 'Venta contado', 486, 1, '2020-01-17 00:10:08', 2),
(53, '200116181008', 'Venta contado', 485, 1, '2020-01-17 00:10:08', 2),
(54, '200116181232', 'Venta contado', 489, 3, '2020-01-17 00:12:33', 2),
(55, '200116181232', 'Venta contado', 490, 1, '2020-01-17 00:12:33', 2),
(56, '200116183010', 'Venta credito', 483, 1, '2020-01-17 00:30:10', 2),
(57, '200116183010', 'Venta credito', 484, 2, '2020-01-17 00:30:10', 2),
(58, '200116190642', 'Venta credito', 493, 3, '2020-01-17 01:06:42', 2),
(59, '200116190642', 'Venta credito', 490, 3, '2020-01-17 01:06:43', 2),
(60, '200116191507', 'Venta credito', 493, 4, '2020-01-17 01:15:07', 2),
(61, '200116191507', 'Venta credito', 490, 1, '2020-01-17 01:15:07', 2),
(62, '200117175647', 'Venta credito', 499, 5, '2020-01-17 23:56:48', 4),
(63, '200118094926', 'Venta credito', 491, 3, '2020-01-18 15:49:26', 2),
(64, '200118094926', 'Venta credito', 492, 2, '2020-01-18 15:49:26', 2),
(65, '200120100533', 'Venta credito', 493, 3, '2020-01-20 16:05:34', 2),
(66, '200120100533', 'Venta credito', 492, 2, '2020-01-20 16:05:34', 2),
(67, '200120100533', 'Venta credito', 491, 1, '2020-01-20 16:05:34', 2),
(68, '200120101727', 'Venta credito', 167, 3, '2020-01-20 16:17:27', 1),
(69, '200120101727', 'Venta credito', 166, 2, '2020-01-20 16:17:27', 1),
(70, '200120102006', 'Venta credito', 490, 3, '2020-01-20 16:20:06', 2),
(71, '200120102006', 'Venta credito', 491, 2, '2020-01-20 16:20:06', 2),
(72, '200120103039', 'Venta credito', 218, 3, '2020-01-20 16:30:40', 1),
(73, '200120103039', 'Venta credito', 219, 2, '2020-01-20 16:30:40', 1),
(74, '200120104459', 'Venta credito', 484, 1, '2020-01-20 16:44:59', 2),
(75, '200120104459', 'Venta credito', 483, 1, '2020-01-20 16:44:59', 2),
(76, '200120104806', 'Venta credito', 492, 3, '2020-01-20 16:48:06', 2),
(77, '200120104806', 'Venta credito', 489, 2, '2020-01-20 16:48:06', 2),
(78, '200120105324', 'Venta credito', 253, 3, '2020-01-20 16:53:24', 1),
(79, '200120105324', 'Venta credito', 254, 2, '2020-01-20 16:53:24', 1),
(80, '200120105453', 'Venta credito', 12, 3, '2020-01-20 16:54:53', 3),
(81, '200120105453', 'Venta credito', 15, 3, '2020-01-20 16:54:53', 3),
(82, '200120105624', 'Venta credito', 126, 4, '2020-01-20 16:56:24', 3),
(83, '200120105624', 'Venta credito', 152, 2, '2020-01-20 16:56:24', 3),
(84, '200120105803', 'Venta credito', 218, 3, '2020-01-20 16:58:03', 1),
(85, '200120105803', 'Venta credito', 231, 2, '2020-01-20 16:58:04', 1),
(86, '200120131449', 'Venta contado', 218, 3, '2020-01-20 19:14:49', 1),
(87, '200120132829', 'Venta credito', 218, 4, '2020-01-20 19:28:29', 1),
(88, '200120132829', 'Venta credito', 231, 3, '2020-01-20 19:28:29', 1),
(89, '200120133812', 'Venta credito', 218, 3, '2020-01-20 19:38:12', 1),
(90, '200120133812', 'Venta credito', 231, 3, '2020-01-20 19:38:12', 1),
(91, '200120133812', 'Venta credito', 235, 1, '2020-01-20 19:38:12', 1),
(92, '200120135002', 'Venta credito', 493, 4, '2020-01-20 19:50:02', 2),
(93, '200120135002', 'Venta credito', 492, 2, '2020-01-20 19:50:02', 2),
(94, '200120135002', 'Venta credito', 491, 3, '2020-01-20 19:50:02', 2),
(95, '200120135557', 'Venta credito', 224, 4, '2020-01-20 19:55:58', 1),
(96, '200120135557', 'Venta credito', 218, 2, '2020-01-20 19:55:58', 1),
(97, '200120135557', 'Venta credito', 227, 3, '2020-01-20 19:55:58', 1),
(98, '200120135557', 'Venta credito', 250, 3, '2020-01-20 19:55:58', 1),
(99, '200120135557', 'Venta credito', 252, 1, '2020-01-20 19:55:58', 1),
(100, '200120141629', 'Venta credito', 493, 3, '2020-01-20 20:16:29', 2),
(101, '200120141629', 'Venta credito', 492, 2, '2020-01-20 20:16:29', 2),
(102, '200120143101', 'Venta credito', 487, 4, '2020-01-20 20:31:01', 2),
(103, '200120143101', 'Venta credito', 486, 2, '2020-01-20 20:31:01', 2),
(104, '200121094554', 'Venta credito', 492, 3, '2020-01-21 15:45:54', 2),
(105, '200121094554', 'Venta credito', 491, 1, '2020-01-21 15:45:55', 2),
(106, '200121103442', 'Venta contado', 493, 3, '2020-01-21 16:34:42', 2),
(107, '200121103442', 'Venta contado', 492, 2, '2020-01-21 16:34:42', 2),
(108, '200121103502', 'Venta contado', 493, 3, '2020-01-21 16:35:03', 2),
(109, '200121103502', 'Venta contado', 492, 2, '2020-01-21 16:35:03', 2),
(110, '200124131356', 'Venta credito', 492, 3, '2020-01-24 19:13:56', 2),
(111, '200124131356', 'Venta credito', 491, 1, '2020-01-24 19:13:56', 2),
(112, '200124171112', 'Venta contado', 491, 3, '2020-01-24 23:11:13', 2),
(113, '200124171112', 'Venta contado', 492, 2, '2020-01-24 23:11:13', 2),
(114, '200125102130', 'Venta contado', 486, 3, '2020-01-25 16:21:30', 2),
(115, '200125102130', 'Venta contado', 487, 2, '2020-01-25 16:21:30', 2),
(116, '200125102352', 'Venta contado', 490, 3, '2020-01-25 16:23:53', 2),
(117, '200125102352', 'Venta contado', 491, 1, '2020-01-25 16:23:53', 2),
(118, '200125102600', 'Venta contado', 490, 3, '2020-01-25 16:26:00', 2),
(119, '200125102600', 'Venta contado', 491, 2, '2020-01-25 16:26:01', 2),
(120, '200127094548', 'Venta contado', 335, 2, '2020-01-27 15:45:49', 1),
(121, '200127094548', 'Venta contado', 334, 3, '2020-01-27 15:45:49', 1),
(122, '200127132534', 'Venta contado', 293, 3, '2020-01-27 19:25:34', 1),
(123, '200127132534', 'Venta contado', 292, 2, '2020-01-27 19:25:34', 1),
(124, '200127135536', 'Venta contado', 307, 4, '2020-01-27 19:55:36', 1),
(125, '200127135536', 'Venta contado', 296, 1, '2020-01-27 19:55:36', 1),
(126, '200128194513', 'Venta contado', 307, 4, '2020-01-29 01:45:13', 1),
(127, '200128194513', 'Venta contado', 296, 2, '2020-01-29 01:45:13', 1),
(128, '200131141918', 'Venta contado', 481, 3, '2020-01-31 20:19:18', 2),
(129, '200131141918', 'Venta contado', 480, 2, '2020-01-31 20:19:18', 2),
(130, '200131161349', 'Venta contado', 296, 4, '2020-01-31 22:13:49', 1),
(131, '200131161349', 'Venta contado', 307, 1, '2020-01-31 22:13:49', 1),
(132, '200204100458', 'Venta credito', 335, 3, '2020-02-04 16:04:58', 1),
(133, '200204100458', 'Venta credito', 334, 2, '2020-02-04 16:04:58', 1),
(134, '210501032522', 'Venta contado', 489, 1, '2021-05-01 08:25:23', 2),
(135, '210501032522', 'Venta contado', 488, 1, '2021-05-01 08:25:23', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `idSucursal` int(10) NOT NULL,
  `nombreSucursal` varchar(30) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `favicon` varchar(50) NOT NULL,
  `fondoSuc` varchar(100) NOT NULL,
  `color` varchar(10) NOT NULL,
  `horaCorte` varchar(30) NOT NULL,
  `idTipoSucursal` int(11) NOT NULL,
  `idUbicacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`idSucursal`, `nombreSucursal`, `direccion`, `logo`, `favicon`, `fondoSuc`, `color`, `horaCorte`, `idTipoSucursal`, `idUbicacion`) VALUES
(1, 'Ework Solutions', 'Calle 16 de Septiembre col. Centro', 'CONTORNO.png', '', 'CIRCULO.png', '#4462bb', '19:30', 1, 1),
(2, 'Martinez', 'Conocida', 'logoews.png', '', 'logosa1.png', '#929292', '19:30', 2, 3),
(3, 'Tehuacan', '3 Sur #541 ', 'CONTORNO.png', '', '', '#434343', '19:30', 2, 4),
(4, 'Papeleria Federal 1', 'Conocido', 'logo-sysfood.png', '', 'images.jfif', '#000000', '', 2, 1),
(5, 'Pepeleria Federal 2', 'Conocido', '', '', '', '', '', 2, 1),
(6, 'Papeleria CETMAR', 'Conocido', '', '', '', '', '', 2, 1),
(7, 'Clientes Online', '', '', '', '', '', '', 3, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_sucursal`
--

CREATE TABLE `tipo_sucursal` (
  `idTipoSucursal` int(10) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_sucursal`
--

INSERT INTO `tipo_sucursal` (`idTipoSucursal`, `descripcion`) VALUES
(1, 'Matriz'),
(2, 'Sucursal'),
(3, 'Clientes Online');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `idTipoU` int(10) NOT NULL,
  `descripcionUsuario` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`idTipoU`, `descripcionUsuario`) VALUES
(1, 'SuperAdministrador'),
(2, 'Administrador'),
(3, 'Vendedor'),
(5, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE `ubicacion` (
  `idUbicacion` int(11) NOT NULL,
  `nombreUbicacion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ubicacion`
--

INSERT INTO `ubicacion` (`idUbicacion`, `nombreUbicacion`) VALUES
(1, 'Tuxpan de Rodriguez Cano'),
(3, 'Martinez de la Torre'),
(4, 'Tehuacan'),
(5, 'Tienda Online');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `userlogs`
--

CREATE TABLE `userlogs` (
  `idLog` int(11) NOT NULL,
  `fechaHora` varchar(30) NOT NULL,
  `accion` varchar(20) NOT NULL,
  `estadoCaja` varchar(40) NOT NULL,
  `monto` decimal(30,2) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(10) NOT NULL,
  `user` varchar(30) NOT NULL,
  `pass` text NOT NULL,
  `idTipoU` int(10) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Apellido` varchar(70) NOT NULL,
  `Direccion` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `idSucursal` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `user`, `pass`, `idTipoU`, `Nombre`, `Apellido`, `Direccion`, `email`, `idSucursal`) VALUES
(2, 'VentasTehuacan', '0604f003eaa22fe9af78fb6f8b064e56', 3, 'Ventas', 'Tehuacan', 'Conocida', '', 3),
(4, 'MiguelARM', 'ab6cc1a8aa8a6c86d4150c0914c24684', 1, 'Miguel Angel', 'Rivera Martinez', 'Beda Sanchez #8 Col Jesus Reyes Heroles', 'miguel.rivera@eworksolutions.com.mx', 1),
(5, 'prueba', '21232f297a57a5a743894a0e4a801fc3', 1, 'prueba', 'conocido', 'conocida', 'conocido', 1),
(9, 'VentasTuxpan', '0604f003eaa22fe9af78fb6f8b064e56', 3, 'Guadalupe', 'Aguilar Morales', 'Conocida', 'ventas@eworksolutions.com.mx', 1),
(10, 'AdmonTuxpan', '0604f003eaa22fe9af78fb6f8b064e56', 2, 'Keila Jamileth ', 'Aguilar Morales', 'Conocida', 'keila.aguilar@eworksolutions.com.mx', 1),
(11, 'AdmonMtz', '0604f003eaa22fe9af78fb6f8b064e56', 2, 'Claudia Michelle', 'Morales Rivera', 'Conocida', 'claudia.morales@eworksolutions.com.mx', 2),
(12, 'AdmonTehuacan', '0604f003eaa22fe9af78fb6f8b064e56', 2, 'Pamela', 'Galicia', 'Conocida', '', 3),
(15, 'joshuak500', '11294b8a68ffa84cb92e21caec0e0f34', 5, 'Josue', 'Cruz Santiago', '.', '.', 7),
(16, 'papeleria', '927103457851d19a809f15b37ae2ca43', 2, 'prueba', 'conocido', 'conocido', 'j_cruz1997@outlook.es', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `fecha_venta` date NOT NULL,
  `monto_venta` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_contado`
--

CREATE TABLE `venta_contado` (
  `idVenta` int(10) NOT NULL,
  `idProd` varchar(1000) NOT NULL,
  `NumFolio` varchar(30) NOT NULL,
  `Fecha` varchar(150) NOT NULL,
  `tipoPago` varchar(20) NOT NULL,
  `totalPagar` decimal(30,2) NOT NULL,
  `idVendedor` int(10) NOT NULL,
  `idCliente` int(10) NOT NULL,
  `idSucursal` int(11) NOT NULL,
  `descuento` decimal(30,2) NOT NULL,
  `parcialidades` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `venta_contado`
--

INSERT INTO `venta_contado` (`idVenta`, `idProd`, `NumFolio`, `Fecha`, `tipoPago`, `totalPagar`, `idVendedor`, `idCliente`, `idSucursal`, `descuento`, `parcialidades`) VALUES
(1, '6,3', '190325192540', '2019-03-25 , 19:25:40', '', '293.70', 1, 0, 3, '0.00', 0),
(2, '4,4', '190325192906', '2019-03-25 , 19:29:06', '', '2444313.60', 1, 0, 3, '0.00', 0),
(3, '6,3', '190325193156', '2019-03-25 , 19:31:56', '', '257.00', 1, 0, 3, '0.00', 0),
(4, '6,1', '190325193303', '2019-03-25 , 19:33:03', '', '-801.00', 1, 0, 3, '0.00', 0),
(5, '6,1', '190325193531', '2019-03-25 , 19:35:31', '', '80.10', 1, 0, 3, '0.00', 0),
(6, '6,1', '190325194614', '2019-03-25 , 19:46:14', '', '80.10', 1, 0, 3, '0.00', 0),
(7, '6,1', '190325194712', '2019-03-25 , 19:47:12', '', '80.10', 1, 0, 3, '0.00', 0),
(8, '5,5', '190325194846', '2019-03-25 , 19:48:46', '', '5562.00', 1, 0, 3, '0.00', 0),
(9, '5,3', '190325195054', '2019-03-25 , 19:50:54', '', '3337.20', 1, 0, 3, '0.00', 0),
(10, '6,1', '190325195315', '2019-03-25 , 19:53:15', '', '80.10', 1, 0, 3, '0.00', 0),
(11, '6,1', '190325195714', '2019-03-25 , 19:57:14', '', '80.10', 1, 0, 3, '0.00', 0),
(12, '26,1', '190401113707', '2019-04-01 , 11:37:07', '', '150.00', 2, 0, 3, '0.00', 0),
(25, '52,1', '190402133649', '2019-04-02 , 13:36:49', '', '40.00', 2, 0, 3, '0.00', 0),
(26, '91,2', '190402133953', '2019-04-02 , 13:39:53', '', '200.00', 2, 0, 3, '0.00', 0),
(27, '50,1', '190402183153', '2019-04-02 , 18:31:53', '', '38.00', 2, 0, 3, '0.00', 0),
(28, '56,1', '190403094910', '2019-04-03 , 09:49:10', '', '90.00', 2, 0, 3, '0.00', 0),
(29, '57,1', '190403104328', '2019-04-03 , 10:43:28', '', '72.00', 2, 0, 3, '0.00', 0),
(30, '52,1', '190403104400', '2019-04-03 , 10:44:00', '', '40.00', 2, 0, 3, '0.00', 0),
(31, '8,1', '190411171439', '2019-04-11 , 17:14:39', '', '180.00', 2, 0, 3, '0.00', 0),
(32, '29,1 30,1', '190411171847', '2019-04-11 , 17:18:47', '', '160.00', 2, 0, 3, '0.00', 0),
(33, '70,1', '190411171957', '2019-04-11 , 17:19:57', '', '22.00', 2, 0, 3, '0.00', 0),
(34, '89,1', '190411172122', '2019-04-11 , 17:21:22', '', '50.00', 2, 0, 3, '0.00', 0),
(35, '32,1', '190412131609', '2019-04-12 , 13:16:09', '', '35.00', 2, 0, 3, '0.00', 0),
(36, '71,1', '190412131654', '2019-04-12 , 13:16:54', '', '25.00', 2, 0, 3, '0.00', 0),
(37, '22,1', '190418142514', '2019-04-18 , 14:25:14', '', '149.60', 2, 0, 3, '0.00', 0),
(38, '37,1', '190418162104', '2019-04-18 , 16:21:04', '', '0.00', 2, 0, 3, '0.00', 0),
(39, '84,1', '190418162246', '2019-04-18 , 16:22:46', '', '450.00', 2, 0, 3, '0.00', 0),
(40, '84,2', '190418162858', '2019-04-18 , 16:28:58', '', '855.00', 2, 0, 3, '0.00', 0),
(41, '87,1', '190418170111', '2019-04-18 , 17:01:11', '', '115.00', 2, 0, 3, '0.00', 0),
(42, '87,1', '190418170135', '2019-04-18 , 17:01:35', '', '115.00', 2, 0, 3, '0.00', 0),
(43, '91,1', '190418174915', '2019-04-18 , 17:49:15', '', '100.00', 2, 0, 3, '0.00', 0),
(44, '69,1', '190422182211', '2019-04-22 , 18:22:11', '', '25.00', 2, 0, 3, '0.00', 0),
(45, '69,1', '190422182636', '2019-04-22 , 18:26:36', '', '25.00', 2, 0, 3, '0.00', 0),
(46, '24,1', '190502112350', '2019-05-02 , 11:23:50', '', '300.00', 2, 0, 3, '0.00', 0),
(47, '32,1', '190502112452', '2019-05-02 , 11:24:52', '', '35.00', 2, 0, 3, '0.00', 0),
(48, '74,1', '190502112717', '2019-05-02 , 11:27:17', '', '20.00', 2, 0, 3, '0.00', 0),
(49, '27,1', '190503102833', '2019-05-03 , 10:28:33', '', '70.00', 2, 0, 3, '0.00', 0),
(50, '65,1', '190503102935', '2019-05-03 , 10:29:35', '', '70.00', 2, 0, 3, '0.00', 0),
(51, '102,7', '190508125158', '2019-05-08 , 12:51:58', '', '0.00', 2, 0, 3, '0.00', 0),
(52, '17,1', '190508125407', '2019-05-08 , 12:54:07', '', '400.00', 2, 0, 3, '0.00', 0),
(53, '139,1', '190508125506', '2019-05-08 , 12:55:06', '', '99.00', 2, 0, 3, '0.00', 0),
(54, '', '190516121623', '2019-05-16 , 12:16:23', '', '0.00', 2, 0, 0, '0.00', 0),
(55, '', '190516134444', '2019-05-16 , 13:44:44', '', '186.12', 2, 0, 0, '0.00', 0),
(56, '', '190516134636', '2019-05-16 , 13:46:36', '', '80.00', 2, 0, 0, '0.00', 0),
(57, '', '190516134731', '2019-05-16 , 13:47:31', '', '150.00', 2, 0, 0, '0.00', 0),
(58, '', '190516134758', '2019-05-16 , 13:47:58', '', '150.00', 2, 0, 0, '0.00', 0),
(59, '', '190516134920', '2019-05-16 , 13:49:20', '', '150.00', 2, 0, 0, '0.00', 0),
(60, '', '190523131956', '2019-05-23 , 13:19:56', '', '150.00', 2, 0, 0, '0.00', 0),
(62, '130,1', '190528120403', '2019-05-28 , 12:04:03', '0', '900.00', 2, 0, 3, '0.00', 0),
(63, '43,1', '190612111404', '2019-06-12 , 11:14:04', '0', '140.00', 2, 0, 3, '0.00', 0),
(64, '15,1', '190612111546', '2019-06-12 , 11:15:46', '0', '45.00', 2, 0, 3, '0.00', 0),
(68, '318,2 319,1', '190806122805', '2019-08-06 , 12:28:05', '0', '920.00', 5, 2, 3, '0.00', 0),
(69, '167,2 181,1', '191122140827', '2019-11-22 , 14:08:27', '0', '709.99', 5, 0, 1, '0.00', 0),
(70, '335,1 185,1 197,1', '191122141752', '2019-11-22 , 14:17:52', '0', '1579.48', 9, 0, 1, '0.00', 0),
(71, '167,1 186,1 174,1', '191122171952', '2019-11-22 , 17:19:52', '0', '234.99', 5, 0, 1, '0.00', 0),
(72, '493,1', '191210164837', '2019-12-10 , 16:48:37', '0', '80.00', 5, 0, 2, '0.00', 0),
(73, '174,1 184,1', '200102150555', '2020-01-02 , 15:05:55', '0', '184.99', 10, 2, 1, '0.00', 0),
(74, '180,1 185,1', '200102150908', '2020-01-02 , 15:09:08', '0', '500.00', 10, 2, 1, '0.00', 0),
(75, '204,1 213,1 167,1', '200102151429', '2020-01-02 , 15:14:29', '0', '554.35', 10, 2, 1, '30.00', 0),
(76, '209,1 205,1', '200102152312', '2020-01-02 , 15:23:12', '0', '2588.70', 10, 2, 1, '0.00', 0),
(77, '218,3 231,1 227,1', '200107110531', '2020-01-07 , 11:05:31', '0', '1206.41', 5, 0, 1, '0.00', 0),
(78, '233,3 279,1', '200107111805', '2020-01-07 , 11:18:05', '0', '1805.00', 5, 0, 1, '0.00', 0),
(79, '218,4 233,2 241,2', '200107113313', '2020-01-07 , 11:33:13', '0', '2520.72', 5, 0, 1, '0.00', 0),
(80, '218,3 226,1', '200107113906', '2020-01-07 , 11:39:06', '0', '718.04', 5, 0, 1, '0.00', 0),
(81, '241,4 251,1 286,2', '200108192826', '2020-01-08 , 19:28:26', '0', '2.61', 5, 0, 1, '0.00', 0),
(82, '218,1 294,1', '200108193330', '2020-01-08 , 19:33:30', '0', '41268.00', 5, 0, 1, '0.00', 0),
(83, '496,1', '200110193402', '2020-01-10 , 19:34:02', '0', '58000.00', 10, 0, 1, '0.00', 0),
(84, '495,1', '200110194355', '2020-01-10 , 19:43:55', '0', '12180.00', 10, 0, 1, '0.00', 0),
(85, '325,1', '200110195142', '2020-01-10 , 19:51:42', '0', '28000.00', 10, 0, 1, '0.00', 0),
(86, '496,1', '200110195314', '2020-01-10 , 19:53:14', '0', '58000.00', 10, 0, 1, '0.00', 0),
(87, '327,1', '200115161915', '2020-01-15 , 16:19:15', '0', '10000.00', 10, 2, 1, '0.00', 0),
(88, '310,2', '200115162112', '2020-01-15 , 16:21:12', '0', '24000.00', 10, 2, 1, '30.00', 0),
(89, '166,1', '200115163432', '2020-01-15 , 16:34:32', '0', '36000.00', 10, 2, 1, '30.00', 0),
(90, '325,1 292,1', '200116092217', '2020-01-16 , 09:22:17', '0', '47990.00', 10, 2, 1, '0.00', 0),
(91, '289,1 288,2', '200116095409', '2020-01-16 , 09:54:09', '0', '34990.00', 10, 2, 1, '0.00', 0),
(92, '496,1 495,3', '200116101608', '2020-01-16 , 10:16:08', '0', '94540.00', 10, 0, 1, '0.00', 0),
(93, '496,1 495,3', '200116105510', '2020-01-16 , 10:55:10', '0', '945.40', 10, 0, 1, '0.00', 0),
(94, '496,1 495,3', '200116105535', '2020-01-16 , 10:55:35', '0', '945.40', 10, 0, 1, '0.00', 0),
(95, '496,1 495,3', '200116105544', '2020-01-16 , 10:55:44', '0', '945.40', 10, 0, 1, '0.00', 0),
(96, '496,1 495,3', '200116120040', '2020-01-16 , 12:00:40', '1', '945.40', 10, 2, 1, '0.00', 0),
(97, '486,1 485,1', '200116181008', '2020-01-16 , 18:10:08', '1', '387.00', 5, 2, 2, '0.00', 0),
(98, '489,3 490,1', '200116181232', '2020-01-16 , 18:12:32', '1', '2690.00', 5, 2, 2, '30.00', 0),
(99, '218,3', '200120131449', '2020-01-20 , 13:14:49', '1', '398.04', 5, 0, 1, '0.00', 0),
(100, '493,3 492,2', '200121103442', '2020-01-21 , 10:34:42', '1', '680.00', 5, 0, 2, '0.00', 0),
(101, '493,3 492,2', '200121103502', '2020-01-21 , 10:35:02', '1', '680.00', 5, 2, 2, '0.00', 0),
(102, '491,3 492,2', '200124171112', '2020-01-24 , 17:11:12', '1', '1190.00', 5, 0, 2, '0.00', 0),
(103, '486,3 487,2', '200125102130', '2020-01-25 , 10:21:30', '1', '691.00', 5, 0, 2, '0.00', 0),
(104, '490,3 491,1', '200125102352', '2020-01-25 , 10:23:52', '1', '1840.00', 5, 0, 2, '0.00', 0),
(105, '490,3 491,2', '200125102600', '2020-01-25 , 10:26:00', '1', '2090.00', 5, 2, 2, '0.00', 0),
(106, '335,2 334,3', '200127094548', '2020-01-27 , 09:45:48', '1', '660.00', 9, 2, 1, '0.00', 0),
(107, '293,3 292,2', '200127132534', '2020-01-27 , 13:25:34', '1', '789.80', 9, 2, 1, '0.00', 0),
(108, '307,4 296,1', '200127135536', '2020-01-27 , 13:55:36', '1', '570.00', 9, 2, 1, '30.00', 1),
(109, '307,4 296,2', '200128194513', '2020-01-28 , 19:45:13', '1', '700.00', 10, 2, 1, '0.00', 0),
(110, '481,3 480,2', '200131141918', '2020-01-31 , 14:19:18', '1', '6260.00', 5, 2, 2, '0.00', 1),
(111, '296,4 307,1', '200131161349', '2020-01-31 , 16:13:49', '1', '630.00', 10, 0, 1, '0.00', 0),
(112, '489,1 488,1', '210501032522', '2021-05-01 , 03:25:22', '1', '765.00', 5, 2, 2, '2.00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_credito`
--

CREATE TABLE `venta_credito` (
  `idVentaC` int(10) NOT NULL,
  `idVendedor` int(10) NOT NULL,
  `idCliente` int(10) NOT NULL,
  `idProd` varchar(1000) NOT NULL,
  `NumFolioC` varchar(25) NOT NULL,
  `FechaC` varchar(150) NOT NULL,
  `tipoPagoC` varchar(20) NOT NULL,
  `meses` int(2) NOT NULL,
  `totalPagar` decimal(30,2) NOT NULL,
  `idSucursal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `venta_credito`
--

INSERT INTO `venta_credito` (`idVentaC`, `idVendedor`, `idCliente`, `idProd`, `NumFolioC`, `FechaC`, `tipoPagoC`, `meses`, `totalPagar`, `idSucursal`) VALUES
(1, 5, 2, '218,1 224,1 235,1', '200108193812', '2020-01-08 , 19:38:12', '2', 5, '1569.89', 1),
(2, 5, 2, '218,1 224,1 235,1', '200108193838', '2020-01-08 , 19:38:38', '2', 2, '1569.89', 1),
(3, 5, 2, '218,1 224,1 235,1', '200108195104', '2020-01-08 , 19:51:04', '2', 4, '1569.89', 1),
(4, 5, 2, '218,1 235,1 232,1', '200109132320', '2020-01-09 , 13:23:20', '2', 2, '1038.89', 1),
(5, 5, 2, '218,1 235,1 232,1', '200109132613', '2020-01-09 , 13:26:13', '2', 4, '1038.89', 1),
(6, 5, 2, '218,1 235,1 232,1', '200109132828', '2020-01-09 , 13:28:28', '2', 5, '1038.89', 1),
(7, 5, 2, '218,1 235,1 232,1', '200109132943', '2020-01-09 , 13:29:43', '2', 4, '1038.89', 1),
(8, 5, 2, '218,1 235,1 232,1', '200109133015', '2020-01-09 , 13:30:15', '2', 6, '1038.89', 1),
(9, 5, 2, '218,1 235,1 232,1', '200109133118', '2020-01-09 , 13:31:18', '2', 5, '1038.89', 1),
(10, 5, 2, '218,1 235,1 232,1', '200109133831', '2020-01-09 , 13:38:31', '2', 4, '1038.89', 1),
(11, 5, 2, '218,2 240,1', '200109134912', '2020-01-09 , 13:49:12', '2', 4, '1138.77', 1),
(12, 5, 2, '224,3', '200109135341', '2020-01-09 , 13:53:41', '2', 5, '1957.50', 1),
(13, 5, 2, '255,3 280,1', '200109135942', '2020-01-09 , 13:59:42', '2', 6, '2037.25', 1),
(14, 5, 2, '268,1 291,1', '200109140106', '2020-01-09 , 14:01:06', '2', 4, '174.00', 1),
(15, 5, 2, '290,1', '200109140247', '2020-01-09 , 14:02:47', '2', 5, '43.50', 1),
(16, 5, 2, '251,1', '200109140346', '2020-01-09 , 14:03:46', '2', 2, '652.50', 1),
(17, 10, 2, '180,4 183,1', '200115123604', '2020-01-15 , 12:36:04', '2', 5, '2191.38', 1),
(18, 10, 2, '496,3', '200115161848', '2020-01-15 , 16:18:48', '2', 4, '2300.98', 1),
(19, 5, 2, '483,1 484,2', '200116183010', '2020-01-16 , 18:30:10', '2', 5, '249.98', 2),
(20, 5, 2, '493,3 490,3', '200116190642', '2020-01-16 , 19:06:42', '2', 4, '1740.00', 2),
(21, 5, 2, '493,4 490,1', '200116191507', '2020-01-16 , 19:15:07', '2', 5, '754.00', 2),
(22, 5, 2, '499,5', '200117175647', '2020-01-17 , 17:56:47', '2', 5, '8317.49', 4),
(23, 5, 2, '491,3 492,2', '200118094926', '2020-01-18 , 09:49:26', '2', 5, '1357.97', 2),
(24, 5, 2, '493,3 492,2 491,1', '200120100533', '2020-01-20 , 10:05:33', '2', 2, '906.99', 2),
(25, 5, 2, '167,3 166,2', '200120101727', '2020-01-20 , 10:17:27', '2', 2, '652.50', 1),
(26, 5, 2, '490,3 491,2', '200120102006', '2020-01-20 , 10:20:06', '2', 2, '2190.98', 2),
(27, 5, 2, '218,3 219,2', '200120103039', '2020-01-20 , 10:30:39', '2', 2, '846.48', 1),
(28, 5, 2, '484,1 483,1', '200120104459', '2020-01-20 , 10:44:59', '2', 3, '162.49', 2),
(29, 5, 2, '492,3 489,2', '200120104806', '2020-01-20 , 10:48:06', '2', 2, '949.75', 2),
(30, 5, 2, '253,3 254,2', '200120105324', '2020-01-20 , 10:53:24', '2', 2, '3407.50', 1),
(31, 5, 2, '12,3 15,3', '200120105453', '2020-01-20 , 10:54:53', '2', 2, '195.75', 3),
(32, 5, 2, '126,4 152,2', '200120105624', '2020-01-20 , 10:56:24', '2', 2, '464.99', 3),
(33, 5, 2, '218,3 231,2', '200120105803', '2020-01-20 , 10:58:03', '2', 2, '1326.43', 1),
(34, 5, 2, '218,4 231,3', '200120132829', '2020-01-20 , 13:28:29', '2', 2, '1893.44', 1),
(35, 5, 2, '218,3 231,3 235,1', '200120133812', '2020-01-20 , 13:38:12', '2', 2, '2426.06', 1),
(36, 5, 2, '493,4 492,2 491,3', '200120135002', '2020-01-20 , 13:50:02', '2', 2, '1589.97', 2),
(37, 5, 2, '224,4 218,2 227,3 250,3 252,1', '200120135557', '2020-01-20 , 13:55:57', '2', 2, '8939.77', 1),
(38, 5, 2, '493,3 492,2', '200120141629', '2020-01-20 , 14:16:29', '2', 2, '594.50', 2),
(39, 5, 2, '487,4 486,2', '200120143101', '2020-01-20 , 14:31:01', '2', 2, '699.97', 2),
(40, 5, 2, '492,3 491,1', '200121094554', '2020-01-21 , 09:45:54', '2', 3, '943.24', 2),
(41, 5, 2, '492,3 491,1', '200124131356', '2020-01-24 , 13:13:56', '2', 2, '943.24', 2),
(46, 10, 2, '307,4 296,2', '200128194513', '2020-01-28 , 19:45:13', '2', 1, '700.00', 1),
(47, 5, 2, '481,3 480,2', '200131141918', '2020-01-31 , 14:19:18', '2', 1, '6260.00', 2),
(48, 5, 2, '481,3 480,2', '200131141918', '2020-01-31 , 14:19:18', '2', 1, '6260.00', 2),
(49, 5, 2, '481,3 480,2', '200131141918', '2020-01-31 , 14:19:18', '2', 1, '6260.00', 2),
(50, 5, 2, '481,3 480,2', '200131141918', '2020-01-31 , 14:19:18', '2', 1, '6260.00', 2),
(51, 10, 2, '335,3 334,2', '200204100458', '2020-02-04 , 10:04:58', '2', 2, '442.25', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `abono`
--
ALTER TABLE `abono`
  ADD PRIMARY KEY (`idAbono`),
  ADD KEY `idVentaC` (`idVentaC`),
  ADD KEY `idSucursal` (`idSucursal`),
  ADD KEY `idVendedor` (`idVendedor`);

--
-- Indices de la tabla `baja_falla`
--
ALTER TABLE `baja_falla`
  ADD PRIMARY KEY (`idBaja`),
  ADD KEY `usuarioBaja` (`usuarioBaja`),
  ADD KEY `idProd` (`idProd`),
  ADD KEY `idSucursalBaja` (`idSucursalBaja`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `clientes_online`
--
ALTER TABLE `clientes_online`
  ADD PRIMARY KEY (`idClienteO`);

--
-- Indices de la tabla `complementos_pagos`
--
ALTER TABLE `complementos_pagos`
  ADD PRIMARY KEY (`idComplementoP`),
  ADD KEY `idAbono` (`idAbono`);

--
-- Indices de la tabla `cortecaja`
--
ALTER TABLE `cortecaja`
  ADD PRIMARY KEY (`idCorte`);

--
-- Indices de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  ADD PRIMARY KEY (`idCotizacion`),
  ADD KEY `idVendedor` (`idVendedor`);

--
-- Indices de la tabla `cuentaspagar`
--
ALTER TABLE `cuentaspagar`
  ADD PRIMARY KEY (`idCuentaP`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idSucursal` (`idSucursal`);

--
-- Indices de la tabla `devoluciones`
--
ALTER TABLE `devoluciones`
  ADD PRIMARY KEY (`idDevolucion`),
  ADD KEY `idSucursal` (`idSucursal`);

--
-- Indices de la tabla `devoluciones_por_fallas`
--
ALTER TABLE `devoluciones_por_fallas`
  ADD PRIMARY KEY (`idDevolucionFalla`),
  ADD KEY `idSucursalDF` (`idSucursalDF`);

--
-- Indices de la tabla `direcciones_clientes`
--
ALTER TABLE `direcciones_clientes`
  ADD PRIMARY KEY (`idDireccion`),
  ADD KEY `idClienteO` (`idClienteO`);

--
-- Indices de la tabla `entrada_producto`
--
ALTER TABLE `entrada_producto`
  ADD PRIMARY KEY (`idEntrada`);

--
-- Indices de la tabla `equivalencia`
--
ALTER TABLE `equivalencia`
  ADD PRIMARY KEY (`idEquivalencia`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`idEstado`),
  ADD KEY `IDX_4786469191104EC2` (`ubicacionpaisid`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id_factura`),
  ADD KEY `idProveedor` (`idProveedor`);

--
-- Indices de la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`idGasto`),
  ADD KEY `idSucursal` (`idSucursal`,`idVendedor`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`idMarca`);

--
-- Indices de la tabla `mis_facturas`
--
ALTER TABLE `mis_facturas`
  ADD PRIMARY KEY (`idFact`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`idNota`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`idPais`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idDireccion` (`idDireccion`);

--
-- Indices de la tabla `pedido_productos`
--
ALTER TABLE `pedido_productos`
  ADD PRIMARY KEY (`idPedProd`),
  ADD KEY `idProducto` (`idProducto`),
  ADD KEY `idPedido` (`idPedido`);

--
-- Indices de la tabla `precios`
--
ALTER TABLE `precios`
  ADD PRIMARY KEY (`idPrecio`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProd`),
  ADD KEY `idMarca` (`idMarca`),
  ADD KEY `idProveedor` (`idProveedor`),
  ADD KEY `idSucursal` (`idSucursal`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_prod`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`idProveedor`);

--
-- Indices de la tabla `salida_producto`
--
ALTER TABLE `salida_producto`
  ADD PRIMARY KEY (`idSalida`),
  ADD KEY `idProd` (`idProd`),
  ADD KEY `idConcepto` (`idConcepto`),
  ADD KEY `idSucursal` (`idSucursal`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`idSucursal`),
  ADD KEY `idTipoSucursal` (`idTipoSucursal`),
  ADD KEY `idUbicacion` (`idUbicacion`);

--
-- Indices de la tabla `tipo_sucursal`
--
ALTER TABLE `tipo_sucursal`
  ADD PRIMARY KEY (`idTipoSucursal`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`idTipoU`);

--
-- Indices de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD PRIMARY KEY (`idUbicacion`);

--
-- Indices de la tabla `userlogs`
--
ALTER TABLE `userlogs`
  ADD PRIMARY KEY (`idLog`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idTipoU` (`idTipoU`),
  ADD KEY `idSucursal` (`idSucursal`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`);

--
-- Indices de la tabla `venta_contado`
--
ALTER TABLE `venta_contado`
  ADD PRIMARY KEY (`idVenta`),
  ADD KEY `idProd` (`idProd`(767)),
  ADD KEY `idVendedor` (`idVendedor`),
  ADD KEY `idCliente` (`idCliente`);

--
-- Indices de la tabla `venta_credito`
--
ALTER TABLE `venta_credito`
  ADD PRIMARY KEY (`idVentaC`),
  ADD KEY `idProd` (`idProd`(767)),
  ADD KEY `idVendedor` (`idVendedor`),
  ADD KEY `idCliente` (`idCliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `abono`
--
ALTER TABLE `abono`
  MODIFY `idAbono` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `baja_falla`
--
ALTER TABLE `baja_falla`
  MODIFY `idBaja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `clientes_online`
--
ALTER TABLE `clientes_online`
  MODIFY `idClienteO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `complementos_pagos`
--
ALTER TABLE `complementos_pagos`
  MODIFY `idComplementoP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `cortecaja`
--
ALTER TABLE `cortecaja`
  MODIFY `idCorte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  MODIFY `idCotizacion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cuentaspagar`
--
ALTER TABLE `cuentaspagar`
  MODIFY `idCuentaP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `devoluciones`
--
ALTER TABLE `devoluciones`
  MODIFY `idDevolucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `devoluciones_por_fallas`
--
ALTER TABLE `devoluciones_por_fallas`
  MODIFY `idDevolucionFalla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `direcciones_clientes`
--
ALTER TABLE `direcciones_clientes`
  MODIFY `idDireccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `entrada_producto`
--
ALTER TABLE `entrada_producto`
  MODIFY `idEntrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `idEstado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2204;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `gastos`
--
ALTER TABLE `gastos`
  MODIFY `idGasto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `idMarca` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `mis_facturas`
--
ALTER TABLE `mis_facturas`
  MODIFY `idFact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `idNota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `idPais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedido_productos`
--
ALTER TABLE `pedido_productos`
  MODIFY `idPedProd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `precios`
--
ALTER TABLE `precios`
  MODIFY `idPrecio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=502;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `idProveedor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `salida_producto`
--
ALTER TABLE `salida_producto`
  MODIFY `idSalida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `idSucursal` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tipo_sucursal`
--
ALTER TABLE `tipo_sucursal`
  MODIFY `idTipoSucursal` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `idTipoU` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  MODIFY `idUbicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `userlogs`
--
ALTER TABLE `userlogs`
  MODIFY `idLog` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `venta_contado`
--
ALTER TABLE `venta_contado`
  MODIFY `idVenta` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT de la tabla `venta_credito`
--
ALTER TABLE `venta_credito`
  MODIFY `idVentaC` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `abono`
--
ALTER TABLE `abono`
  ADD CONSTRAINT `abono_ibfk_1` FOREIGN KEY (`idVentaC`) REFERENCES `venta_credito` (`idVentaC`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `estado`
--
ALTER TABLE `estado`
  ADD CONSTRAINT `FK_4786469191104EC2` FOREIGN KEY (`ubicacionpaisid`) REFERENCES `pais` (`idPais`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_7` FOREIGN KEY (`idMarca`) REFERENCES `marca` (`idMarca`) ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_8` FOREIGN KEY (`idProveedor`) REFERENCES `proveedor` (`idProveedor`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD CONSTRAINT `sucursal_ibfk_1` FOREIGN KEY (`idTipoSucursal`) REFERENCES `tipo_sucursal` (`idTipoSucursal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sucursal_ibfk_2` FOREIGN KEY (`idUbicacion`) REFERENCES `ubicacion` (`idUbicacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idTipoU`) REFERENCES `tipo_usuario` (`idTipoU`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`idSucursal`) REFERENCES `sucursal` (`idSucursal`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
