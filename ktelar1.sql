-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-06-2024 a las 00:20:48
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ktelar1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `codigoCliente` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `cliente` varchar(50) NOT NULL,
  `calle` varchar(100) NOT NULL,
  `noExterior` int(10) NOT NULL,
  `noInterior` int(10) NOT NULL,
  `colonia` varchar(250) NOT NULL,
  `cp` int(5) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `telefono1` int(11) NOT NULL,
  `telefono2` int(11) NOT NULL,
  `correo` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`codigoCliente`, `foto`, `cliente`, `calle`, `noExterior`, `noInterior`, `colonia`, `cp`, `ciudad`, `estado`, `pais`, `telefono1`, `telefono2`, `correo`) VALUES
(3, '', 'COMERCIALIZADORA KETER, S.A. DE C.V.', 'ALFREDO CASTILLO AVILA', 23, 0, 'BO DE CHIGNAULINGO', 73820, 'TEZIUTLAN ', 'PUEBLA', 'MÉXICO ', 123456789, 123456789, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `codigoEmpleado` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidoPaterno` varchar(50) NOT NULL,
  `apellidoMaterno` varchar(50) NOT NULL,
  `planta` enum('','Matriz Comercializadora Keter','Teñido - Comercializadora Keter','Tejido - Comercializadora Keter') NOT NULL,
  `puesto` varchar(60) NOT NULL,
  `telefono` int(11) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`codigoEmpleado`, `foto`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `planta`, `puesto`, `telefono`, `email`) VALUES
(3, '', 'Sofia', '', '', 'Teñido - Comercializadora Keter', '*****', 2147483647, 'usuario@gmail.com'),
(6, '', 'Laura', '', '', 'Matriz Comercializadora Keter', '', 1234567890, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hilos`
--

CREATE TABLE `hilos` (
  `codigoHilo` int(11) NOT NULL,
  `proveedor` enum('','CODIPSA','FILAFIL','MARIE LOU','TAURO TEXTIL') NOT NULL,
  `hilo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `hilos`
--

INSERT INTO `hilos` (`codigoHilo`, `proveedor`, `hilo`) VALUES
(1, 'MARIE LOU', '18/1'),
(2, 'MARIE LOU', '28/1'),
(4, 'TAURO TEXTIL', '30/1'),
(5, 'FILAFIL', '30/1'),
(6, 'CODIPSA', '28/1'),
(7, 'CODIPSA', '30/1'),
(8, 'CODIPSA', '30/1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laps`
--

CREATE TABLE `laps` (
  `codigoLapdik` int(11) NOT NULL,
  `tela` enum('','JERSEY','RIB 1X1','RIB 2X1','PIQUE') NOT NULL,
  `composicion` enum('','100% ALGODÓN','99% ALGODÓN/ 1% POLIÉSTER','95% ALGODÓN/ 5% SPANDEX','65/35','60% ALGODÓN/40% POLIÉSTER','50% ALGODÓN/50% POLIÉSTER','48% ALGODÓN/ 48% POLIÉSTER/ 4% SPANDEX') NOT NULL,
  `codigoTono` int(11) NOT NULL,
  `fechaRealizacion` date NOT NULL,
  `A` varchar(255) DEFAULT NULL,
  `formulaA` int(11) DEFAULT NULL,
  `B` varchar(255) DEFAULT NULL,
  `formulaB` int(11) DEFAULT NULL,
  `C` varchar(255) NOT NULL,
  `formulaC` int(11) DEFAULT NULL,
  `D` varchar(255) DEFAULT NULL,
  `formulaD` int(11) DEFAULT NULL,
  `letraAutorizada` enum('','A','B','C','D') DEFAULT NULL,
  `fechaAutorizacion` date DEFAULT NULL,
  `autorizo` varchar(80) DEFAULT NULL,
  `comentarios` varchar(80) DEFAULT NULL,
  `estatus` enum('NO AUTORIZADO','AUTORIZADO','IGUALADO') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `laps`
--

INSERT INTO `laps` (`codigoLapdik`, `tela`, `composicion`, `codigoTono`, `fechaRealizacion`, `A`, `formulaA`, `B`, `formulaB`, `C`, `formulaC`, `D`, `formulaD`, `letraAutorizada`, `fechaAutorizacion`, `autorizo`, `comentarios`, `estatus`) VALUES
(1, 'JERSEY', '100% ALGODÓN', 2, '2024-03-14', 'pantone.jpg', 1, 'pantone-4177e.jpg', 2, 'pantone-04eec.jpg', 3, 'pantone-08e14.jpg', 4, 'A', '2024-05-16', 'Sofia', 'Ninguno', 'AUTORIZADO'),
(5, 'JERSEY', '50% ALGODÓN/50% POLIÉSTER', 1, '2024-04-16', 'pantone-d1f77.jpg', 1, 'pantone-d0b88.jpg', 2, 'pantone-c3dfc.jpg', 3, 'pantone-d3387.jpg', 4, 'A', '2024-05-14', 'Sofia', '1', 'AUTORIZADO'),
(20, 'JERSEY', '50% ALGODÓN/50% POLIÉSTER', 10, '2024-05-03', '1-4accc.jpg', 3, '1-a1318.jpg', 4, '1-41452.jpg', 6, '1-b5822.jpg', 8, 'C', '2024-05-03', 'Sofia', '6', 'AUTORIZADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lotes`
--

CREATE TABLE `lotes` (
  `codigoLote` int(11) NOT NULL,
  `lote` varchar(80) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `lotes`
--

INSERT INTO `lotes` (`codigoLote`, `lote`, `fecha`) VALUES
(4, '23', '2024-04-04'),
(5, '300', '2024-05-06'),
(6, '300', '2024-05-06'),
(7, '300', '2024-05-06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquinas`
--

CREATE TABLE `maquinas` (
  `codigoMaquina` int(11) NOT NULL,
  `maquina` enum('JET 1','JET 2','JET 3') NOT NULL,
  `orden` int(10) NOT NULL,
  `codigoPartida` int(11) NOT NULL,
  `tela` enum('SHIFON','RIB','SHIFON/ RIB') NOT NULL,
  `fecha` date DEFAULT NULL,
  `fase` enum('TELA PLEGADA','FÓRMULA','TEÑIDO','PRIMERA REVISIÓN','SEGUNDA REVISIÓN','TEÑIDO AUTORIZADO','ABRIDORA','RAMA','ENROLLADO Y ETIQUETADO','TELA ENTREGADA') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `maquinas`
--

INSERT INTO `maquinas` (`codigoMaquina`, `maquina`, `orden`, `codigoPartida`, `tela`, `fecha`, `fase`) VALUES
(1, 'JET 1', 1, 8, 'SHIFON/ RIB', '2024-05-20', 'TELA ENTREGADA'),
(5, 'JET 2', 1, 3, 'SHIFON', '2024-05-20', 'TELA ENTREGADA'),
(6, 'JET 3', 1, 2, 'SHIFON/ RIB', '2024-05-13', 'FÓRMULA'),
(7, 'JET 1', 2, 9, 'SHIFON/ RIB', NULL, 'TELA PLEGADA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medidas`
--

CREATE TABLE `medidas` (
  `codigoMedida` int(11) NOT NULL,
  `composicion` enum('100% ALGODÓN','99% ALGODÓN/ 1% POLIÉSTER','95% ALGODÓN/ 5% SPANDEX','65/35','60% ALGODÓN/40% POLIÉSTER','50% ALGODÓN/50% POLIÉSTER','48% ALGODÓN/ 48% POLIÉSTER/ 4% SPANDEX') NOT NULL,
  `LMJersey` int(10) DEFAULT NULL,
  `pesoAcabadoJersey` int(10) DEFAULT NULL,
  `LMRib` int(10) DEFAULT NULL,
  `pesoAcabadoRib` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medidas`
--

INSERT INTO `medidas` (`codigoMedida`, `composicion`, `LMJersey`, `pesoAcabadoJersey`, `LMRib`, `pesoAcabadoRib`) VALUES
(1, '100% ALGODÓN', 335, 200, NULL, NULL),
(2, '100% ALGODÓN', 335, 200, 270, 200),
(3, '100% ALGODÓN', 265, 140, 265, 180),
(4, '100% ALGODÓN', NULL, NULL, 285, 180),
(5, '100% ALGODÓN', 285, 140, 280, 180),
(6, '99% ALGODÓN/ 1% POLIÉSTER', 280, 140, 280, 180),
(7, '99% ALGODÓN/ 1% POLIÉSTER', 285, 140, 280, 180),
(8, '95% ALGODÓN/ 5% SPANDEX', 270, 200, NULL, NULL),
(9, '65/35', 279, 140, NULL, NULL),
(10, '50% ALGODÓN/50% POLIÉSTER', NULL, NULL, NULL, NULL),
(11, '48% ALGODÓN/ 48% POLIÉSTER/ 4% SPANDEX', NULL, NULL, NULL, NULL),
(12, '48% ALGODÓN/ 48% POLIÉSTER/ 4% SPANDEX', 270, 182, 308, 180);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidas`
--

CREATE TABLE `partidas` (
  `codigoPartida` int(11) NOT NULL,
  `partida` int(10) NOT NULL,
  `codigoPedido` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `codigoHilo` int(11) NOT NULL,
  `codigoTono` int(10) DEFAULT NULL,
  `totalRollos` int(20) NOT NULL,
  `telaRib` enum('','RIB 1X1','RIB 2X1') DEFAULT NULL,
  `diametro` int(10) DEFAULT NULL,
  `anchoTotal` float DEFAULT NULL,
  `anchoUtil` float DEFAULT NULL,
  `notaJersey` varchar(200) NOT NULL,
  `notaRib` varchar(200) NOT NULL,
  `totalRollosJersey` int(10) NOT NULL,
  `totalRollosRib` int(10) NOT NULL,
  `kgsJersey` float NOT NULL,
  `kgsRib` float NOT NULL,
  `kgsPique` float NOT NULL,
  `totalKgs` float NOT NULL,
  `totalKgsF` float NOT NULL,
  `estatus` enum('TELA RECIBIDA','PARTIDA ENTREGADA') DEFAULT NULL,
  `codigoMedida` int(10) NOT NULL,
  `entrego` varchar(100) NOT NULL,
  `recibio` varchar(100) NOT NULL,
  `fechaMuestra` date DEFAULT NULL,
  `tipoTejido` enum('','JERSEY/RIB','JERSEY','RIB','PIQUE') NOT NULL,
  `pesoReal` float NOT NULL,
  `noRollo` int(11) NOT NULL,
  `ancho` float NOT NULL,
  `largo` float NOT NULL,
  `torsion` float NOT NULL,
  `rendimiento` float NOT NULL,
  `metrosJersey` float NOT NULL,
  `ydJersey` float NOT NULL,
  `metrosRib` float NOT NULL,
  `ydRib` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `partidas`
--

INSERT INTO `partidas` (`codigoPartida`, `partida`, `codigoPedido`, `fecha`, `codigoHilo`, `codigoTono`, `totalRollos`, `telaRib`, `diametro`, `anchoTotal`, `anchoUtil`, `notaJersey`, `notaRib`, `totalRollosJersey`, `totalRollosRib`, `kgsJersey`, `kgsRib`, `kgsPique`, `totalKgs`, `totalKgsF`, `estatus`, `codigoMedida`, `entrego`, `recibio`, `fechaMuestra`, `tipoTejido`, `pesoReal`, `noRollo`, `ancho`, `largo`, `torsion`, `rendimiento`, `metrosJersey`, `ydJersey`, `metrosRib`, `ydRib`) VALUES
(2, 240326, 3, '2024-04-01', 6, 2, 15, 'RIB 1X1', 300, 150, 145, 'Tela abierta', 'Tela abierta sin corte en la orilla', 5, 0, 15, 40, 22, 106.6, 0, 'TELA RECIBIDA', 2, 'Sofia', 'Laura', '2024-05-16', 'PIQUE', 0, 0, 0, 0, 0, 0, 266.7, 264.7, 0, 0),
(3, 240327, 3, '2024-04-10', 6, 1, 2, 'RIB 1X1', 300, 167, 159, 'Tela abierta', 'Tela abierta', 6, 0, 109.8, 0, 0, 44.4, 0, 'PARTIDA ENTREGADA', 3, 'Sofia', 'Ámbar', '2024-05-16', 'JERSEY', 140, 2, 5.4, 5.6, 4, 120, 19, 20.7787, 19, 20.7787),
(8, 240328, 2, '2024-05-02', 1, 2, 0, NULL, NULL, NULL, NULL, '', '', 0, 0, 0, 0, 0, 789.3, 0, 'PARTIDA ENTREGADA', 1, '', '', NULL, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 240329, 8, '2024-05-03', 2, 10, 20, 'RIB 1X1', 30, 150, 143, 'Tela abierta', 'Tela abierta sin corte en la orilla', 14, 6, 289.4, 122.7, 0, 412.3, 0, 'TELA RECIBIDA', 10, 'Sofia', 'Ámbar', '2024-05-20', 'JERSEY/RIB', 140, 3, 7.19, 6.07, 4.65, 4.42, 821.7, 898.62, 357.8, 391.29);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partida_lote`
--

CREATE TABLE `partida_lote` (
  `idPartidaLote` int(10) NOT NULL,
  `codigoPartida` int(10) DEFAULT NULL,
  `codigoLote` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `partida_lote`
--

INSERT INTO `partida_lote` (`idPartidaLote`, `codigoPartida`, `codigoLote`) VALUES
(1, 5, 2),
(2, 5, 3),
(6, 3, 4),
(7, 6, 4),
(8, 6, 6),
(9, 2, 4),
(11, 9, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partida_rollo`
--

CREATE TABLE `partida_rollo` (
  `codPartidaRollo` int(10) NOT NULL,
  `codigoPartida` int(10) DEFAULT NULL,
  `codigoRollo` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `partida_rollo`
--

INSERT INTO `partida_rollo` (`codPartidaRollo`, `codigoPartida`, `codigoRollo`) VALUES
(5, 2, 4),
(7, 2, 3),
(8, 2, 5),
(9, 5, 3),
(10, 5, 4),
(11, 5, 5),
(12, 5, 6),
(13, 2, 6),
(14, 2, 7),
(15, 2, 8),
(16, 3, 5),
(17, 3, 6),
(18, 6, 3),
(19, 6, 4),
(20, 6, 5),
(21, 6, 6),
(22, 6, 7),
(23, 9, 3),
(24, 9, 4),
(25, 9, 5),
(26, 9, 6),
(27, 9, 7),
(28, 9, 8),
(29, 9, 9),
(30, 9, 10),
(31, 9, 11),
(32, 9, 12),
(33, 9, 13),
(34, 9, 14),
(35, 9, 15),
(36, 9, 16),
(37, 9, 17),
(38, 9, 18),
(39, 9, 19),
(40, 9, 20),
(41, 9, 21),
(42, 9, 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `codigoPedido` int(11) NOT NULL,
  `fechaActivacion` date NOT NULL,
  `pedido` varchar(10) DEFAULT NULL,
  `estatus` enum('','REVISADO','APROBADO','NO REVISADO','CANCELADO') DEFAULT NULL,
  `codigoPinterno` int(11) NOT NULL,
  `codigoPexterno` int(11) NOT NULL,
  `codigoCliente` int(11) DEFAULT NULL,
  `descripcionA` varchar(150) DEFAULT NULL,
  `kgsA` int(10) DEFAULT NULL,
  `descripcionB` varchar(150) DEFAULT NULL,
  `kgsB` int(10) DEFAULT NULL,
  `precioUnitario` float DEFAULT NULL,
  `fechaEntrega` date DEFAULT NULL,
  `codigoEmpleado` int(11) NOT NULL,
  `kgsEntregados` float NOT NULL,
  `proceso` enum('','EN PROCESO','FINALIZADO') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`codigoPedido`, `fechaActivacion`, `pedido`, `estatus`, `codigoPinterno`, `codigoPexterno`, `codigoCliente`, `descripcionA`, `kgsA`, `descripcionB`, `kgsB`, `precioUnitario`, `fechaEntrega`, `codigoEmpleado`, `kgsEntregados`, `proceso`) VALUES
(2, '2024-05-20', 'TK-K00499', 'APROBADO', 6, 4, 3, '2', 390, NULL, 15, 6.5, '2024-04-10', 6, 0, 'EN PROCESO'),
(3, '2024-05-16', 'TK-K00498', 'APROBADO', 6, 4, 3, '50%/ 50% polyester jersey color river side 17-4028tcx 140grs', 280, '50%/ 50% polyester jersey color state blu 17-4028tcx 140grs', 110, 15.5, '2024-04-19', 6, 500, 'FINALIZADO'),
(8, '2024-05-20', 'TK-K00500', 'APROBADO', 6, 4, 3, '50% algodón 50% poliéster jersey color riverside 17-4028TCX de 140 gms', 280, '50% algodón 50% poliéster rib 1x1 color riverside 17-4028TCX de 180 gms', 110, 6.5, '2024-05-06', 6, 412.3, 'FINALIZADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_partida`
--

CREATE TABLE `pedido_partida` (
  `idPedidoPartida` int(11) NOT NULL,
  `codigoPartida` int(11) NOT NULL,
  `codigoPedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedorexterno`
--

CREATE TABLE `proveedorexterno` (
  `codigoPexterno` int(10) NOT NULL,
  `proveedor` varchar(50) DEFAULT NULL,
  `calle` varchar(50) NOT NULL,
  `noExterior` int(5) NOT NULL,
  `noInterior` int(5) NOT NULL,
  `colonia` varchar(50) NOT NULL,
  `cp` int(5) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `telefono1` int(11) NOT NULL,
  `telefono2` int(11) NOT NULL,
  `correo` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedorexterno`
--

INSERT INTO `proveedorexterno` (`codigoPexterno`, `proveedor`, `calle`, `noExterior`, `noInterior`, `colonia`, `cp`, `ciudad`, `estado`, `pais`, `telefono1`, `telefono2`, `correo`) VALUES
(2, 'KETER TEXTIL', 'MANUEL AVILA CAMACHO', 17, 0, 'BARRIO DE IXTLAHUACA', 73968, 'TEZIUTLAN', 'PUEBLA', 'MÉXICO', 2147483647, 2147483647, 'usuario@gmail.com '),
(4, NULL, '', 0, 0, '', 0, '', '', '', 0, 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedorinterno`
--

CREATE TABLE `proveedorinterno` (
  `codigoPinterno` int(11) NOT NULL,
  `proveedor` varchar(50) DEFAULT NULL,
  `calle` varchar(50) DEFAULT NULL,
  `noExterior` int(5) DEFAULT NULL,
  `noInterior` int(5) NOT NULL,
  `colonia` varchar(50) NOT NULL,
  `cp` int(5) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `telefono1` int(11) NOT NULL,
  `telefono2` int(11) NOT NULL,
  `correo` varchar(80) NOT NULL,
  `codigoHilo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedorinterno`
--

INSERT INTO `proveedorinterno` (`codigoPinterno`, `proveedor`, `calle`, `noExterior`, `noInterior`, `colonia`, `cp`, `ciudad`, `estado`, `pais`, `telefono1`, `telefono2`, `correo`, `codigoHilo`) VALUES
(6, 'KETER TEXTIL', 'MANUEL ÁVILA CAMACHO ', 17, 0, 'BARRIO DE IXTLAHUACA,', 73968, 'TEZIUTLÁN', 'PUEBLA', 'MÉXICO ', 123456789, 123456789, '', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rollos`
--

CREATE TABLE `rollos` (
  `codigoRollo` int(11) NOT NULL,
  `rolloCreado` date DEFAULT NULL,
  `codigo` varchar(20) DEFAULT NULL,
  `KgInicial` float DEFAULT NULL,
  `codigoTela` int(11) DEFAULT NULL,
  `KgFinal` float NOT NULL,
  `metros` float NOT NULL,
  `yardas` float NOT NULL,
  `comentarios` varchar(50) NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rollos`
--

INSERT INTO `rollos` (`codigoRollo`, `rolloCreado`, `codigo`, `KgInicial`, `codigoTela`, `KgFinal`, `metros`, `yardas`, `comentarios`, `fecha`) VALUES
(3, '2024-05-03', 'A-001', 22, 3, 21.2, 59.3, 64.85, '', '2024-05-05'),
(4, '2024-05-03', 'A-002', 20.9, 3, 20.3, 55, 60.15, '', '2024-05-16'),
(5, '2024-05-03', 'A-003', 22.6, 3, 21.1, 56.5, 61.79, '', '2024-05-15'),
(6, '2024-05-03', 'A-004', 22.6, 3, 21.1, 56.5, 61.79, '', '2024-05-15'),
(7, '2024-05-03', 'A-005', 22.6, 3, 21.1, 56.5, 61.79, '', '2024-05-16'),
(8, '2024-05-03', 'A-006', 22.6, 3, 21.1, 56.5, 61.79, '', '2024-05-16'),
(9, '2024-05-03', 'A-007', 21, 3, 20.6, 64.7, 70.76, '', NULL),
(10, '2024-05-03', 'A-008', 21, 3, 20.6, 64.7, 70.76, '', NULL),
(11, '2024-05-03', 'A-009', 21, 3, 20.3, 55, 60.15, '', NULL),
(12, '2024-05-03', 'A-010', 22.4, 3, 21.7, 65, 71.08, '', NULL),
(13, '2024-05-03', 'A-011', 22.1, 3, 21.5, 64.2, 70.21, '', NULL),
(14, '2024-05-03', 'A-012', 16.6, 3, 15.3, 43.3, 47.35, '', NULL),
(15, '2024-05-03', 'A-013', 22.3, 3, 21.7, 62, 67.8, '', NULL),
(16, '2024-05-03', 'A-014', 22.5, 3, 21.8, 62.5, 68.35, '', NULL),
(17, '2024-05-03', 'B-001', 19.3, 20, 18.2, 59.3, 64.85, '', NULL),
(18, '2024-05-03', 'B-002', 21, 20, 20.6, 61, 66.71, '', NULL),
(19, '2024-05-03', 'B-003', 21.7, 20, 21, 60, 65.62, '', NULL),
(20, '2024-05-03', 'B-004', 21.7, 20, 20.9, 58.7, 64.2, '', NULL),
(21, '2024-05-03', 'B-005', 22.4, 20, 21.4, 59.7, 65.29, '', NULL),
(22, '2024-05-03', 'B-006', 22, 20, 20.6, 59.1, 64.63, '', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telas`
--

CREATE TABLE `telas` (
  `codigoTela` int(11) NOT NULL,
  `tipo` enum('','JERSEY','RIB 1X1','RIB 2X1','PIQUE') DEFAULT NULL,
  `composicion` enum('','100% ALGODÓN','99% ALGODÓN/ 1% POLIÉSTER','95% ALGODÓN/ 5% SPANDEX','65/35','60% ALGODÓN/40% POLIÉSTER','50% ALGODÓN/50% POLIÉSTER','48% ALGODÓN/ 48% POLIÉSTER/ 4% SPANDEX') DEFAULT NULL,
  `pesoGrs` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `telas`
--

INSERT INTO `telas` (`codigoTela`, `tipo`, `composicion`, `pesoGrs`) VALUES
(1, 'JERSEY', '100% ALGODÓN', 140),
(2, 'JERSEY', '99% ALGODÓN/ 1% POLIÉSTER', 180),
(3, 'JERSEY', '50% ALGODÓN/50% POLIÉSTER', 140),
(4, 'JERSEY', '65/35', 180),
(20, 'RIB 1X1', '50% ALGODÓN/50% POLIÉSTER', 180);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tonos`
--

CREATE TABLE `tonos` (
  `codigoTono` int(11) NOT NULL,
  `color` varchar(80) DEFAULT NULL,
  `codigo` varchar(50) DEFAULT NULL,
  `foto` varchar(255) NOT NULL,
  `tonalidad` enum('BLANCO','CLARO','MEDIO','OSCURO','ESPECIAL') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tonos`
--

INSERT INTO `tonos` (`codigoTono`, `color`, `codigo`, `foto`, `tonalidad`) VALUES
(1, 'TINSEL', '160945', '', 'CLARO'),
(2, 'Roasted Russet', '191541', '', 'OSCURO'),
(10, 'Riverside', '174028', 'pantone-color-17-4028-tcx-757b4.jpg', 'OSCURO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(10) NOT NULL,
  `Nombre` varchar(60) NOT NULL,
  `ApellidoPaterno` varchar(60) NOT NULL,
  `ApellidoMaterno` varchar(60) NOT NULL,
  `CorreoElectronico` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Creado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `Nombre`, `ApellidoPaterno`, `ApellidoMaterno`, `CorreoElectronico`, `Password`, `Creado`, `Rol`) VALUES
(7, 'Administrador', '', '', 'administrador@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2024-04-30 19:07:07', 'Administrador'),
(8, 'Gerente', '', '', 'gerente@gmail.com', 'f8a41bcba1561a84f10af0d5851ce93b', '2024-04-30 19:07:51', 'Gerente'),
(9, 'Empleado', '', '', 'empleado@gmail.com', '350c9d901b7f1c73a481e240ec1b7c0b', '2024-04-30 19:08:43', 'Empleado'),
(10, 'SOFIA', '', '', 'sofia12@gmail.com', 'c44a471bd78cc6c2fea32b9fe028d30a', '2024-05-07 03:35:12', 'Empleado'),
(11, 'Encargado', '', '', 'encargado@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2024-05-20 02:45:56', 'Gerente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`codigoCliente`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`codigoEmpleado`);

--
-- Indices de la tabla `hilos`
--
ALTER TABLE `hilos`
  ADD PRIMARY KEY (`codigoHilo`);

--
-- Indices de la tabla `laps`
--
ALTER TABLE `laps`
  ADD PRIMARY KEY (`codigoLapdik`);

--
-- Indices de la tabla `lotes`
--
ALTER TABLE `lotes`
  ADD PRIMARY KEY (`codigoLote`);

--
-- Indices de la tabla `maquinas`
--
ALTER TABLE `maquinas`
  ADD PRIMARY KEY (`codigoMaquina`);

--
-- Indices de la tabla `medidas`
--
ALTER TABLE `medidas`
  ADD PRIMARY KEY (`codigoMedida`);

--
-- Indices de la tabla `partidas`
--
ALTER TABLE `partidas`
  ADD PRIMARY KEY (`codigoPartida`);

--
-- Indices de la tabla `partida_lote`
--
ALTER TABLE `partida_lote`
  ADD PRIMARY KEY (`idPartidaLote`);

--
-- Indices de la tabla `partida_rollo`
--
ALTER TABLE `partida_rollo`
  ADD PRIMARY KEY (`codPartidaRollo`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`codigoPedido`);

--
-- Indices de la tabla `pedido_partida`
--
ALTER TABLE `pedido_partida`
  ADD PRIMARY KEY (`idPedidoPartida`);

--
-- Indices de la tabla `proveedorexterno`
--
ALTER TABLE `proveedorexterno`
  ADD PRIMARY KEY (`codigoPexterno`);

--
-- Indices de la tabla `proveedorinterno`
--
ALTER TABLE `proveedorinterno`
  ADD PRIMARY KEY (`codigoPinterno`);

--
-- Indices de la tabla `rollos`
--
ALTER TABLE `rollos`
  ADD PRIMARY KEY (`codigoRollo`);

--
-- Indices de la tabla `telas`
--
ALTER TABLE `telas`
  ADD PRIMARY KEY (`codigoTela`);

--
-- Indices de la tabla `tonos`
--
ALTER TABLE `tonos`
  ADD PRIMARY KEY (`codigoTono`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `codigoCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `codigoEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `hilos`
--
ALTER TABLE `hilos`
  MODIFY `codigoHilo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `laps`
--
ALTER TABLE `laps`
  MODIFY `codigoLapdik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `lotes`
--
ALTER TABLE `lotes`
  MODIFY `codigoLote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `maquinas`
--
ALTER TABLE `maquinas`
  MODIFY `codigoMaquina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `medidas`
--
ALTER TABLE `medidas`
  MODIFY `codigoMedida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `partidas`
--
ALTER TABLE `partidas`
  MODIFY `codigoPartida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `partida_lote`
--
ALTER TABLE `partida_lote`
  MODIFY `idPartidaLote` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `partida_rollo`
--
ALTER TABLE `partida_rollo`
  MODIFY `codPartidaRollo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `codigoPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `pedido_partida`
--
ALTER TABLE `pedido_partida`
  MODIFY `idPedidoPartida` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedorexterno`
--
ALTER TABLE `proveedorexterno`
  MODIFY `codigoPexterno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `proveedorinterno`
--
ALTER TABLE `proveedorinterno`
  MODIFY `codigoPinterno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `rollos`
--
ALTER TABLE `rollos`
  MODIFY `codigoRollo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `telas`
--
ALTER TABLE `telas`
  MODIFY `codigoTela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `tonos`
--
ALTER TABLE `tonos`
  MODIFY `codigoTono` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
