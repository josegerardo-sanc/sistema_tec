-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-09-2020 a las 21:35:48
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mapeosat`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `idactividad` int(5) NOT NULL,
  `actividad` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`idactividad`, `actividad`) VALUES
(1, 'PLANTA BAJA'),
(2, 'PLANTA ALTA'),
(3, 'MEZANINE'),
(4, 'VACIO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administracion`
--

CREATE TABLE `administracion` (
  `idadministracion` int(5) NOT NULL,
  `administracion` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administracion`
--

INSERT INTO `administracion` (`idadministracion`, `administracion`) VALUES
(1, 'ADA'),
(2, 'ADAFF'),
(3, 'ADCTI'),
(4, 'ADJ'),
(5, 'ADR'),
(6, 'ADRS'),
(7, 'ADSC'),
(8, 'EXTERNO'),
(9, 'VACIO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `idarea` int(5) NOT NULL,
  `area` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`idarea`, `area`) VALUES
(1, 'Recursos y Servicios'),
(2, 'Subadministrador'),
(3, 'Humanos'),
(4, 'Financiero'),
(5, 'Materiales'),
(6, 'Recaudacion'),
(7, 'Juridica'),
(8, 'Capacitación'),
(9, 'Oficialia de Parte'),
(10, 'Vigilancia P Baja'),
(11, 'Biometrico'),
(12, 'Abogados'),
(13, 'Sala de Internet'),
(14, 'Servicio al contribuyente'),
(15, 'Módulo alterno'),
(16, 'Diligenciacion'),
(17, 'Aula TV SAT'),
(18, 'Recaudacion'),
(19, 'Control'),
(20, 'Notificacion'),
(21, 'Ejecución'),
(22, 'CAyAS'),
(23, 'Auditoria'),
(24, 'Devoluciones'),
(25, 'Legales'),
(26, 'Cumplimiento'),
(27, 'AGE'),
(28, 'Vigilancia P/A'),
(29, 'Acces Point'),
(30, 'Aplicadora de Examen'),
(31, 'Programacion'),
(32, 'Sindicato'),
(33, 'Archivo'),
(34, 'Tecnologia'),
(35, 'Firma Electronica'),
(36, 'Abogados'),
(37, 'Atencion colectiva '),
(38, 'Turnos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mapeosat`
--

CREATE TABLE `mapeosat` (
  `idno` int(5) NOT NULL,
  `nomenclaturanodo` varchar(30) DEFAULT NULL,
  `idubicacionswitch` int(5) DEFAULT NULL,
  `idnopatchpanel` int(5) DEFAULT NULL,
  `nopuertopatchpanel` varchar(5) DEFAULT NULL,
  `idnoswitch` int(5) DEFAULT NULL,
  `idserieswitch` int(5) DEFAULT NULL,
  `puertoswitch` varchar(5) DEFAULT NULL,
  `idtipoequipo` int(5) DEFAULT NULL,
  `idadministracion` int(5) DEFAULT NULL,
  `idarea` int(5) DEFAULT NULL,
  `idvlan` int(5) DEFAULT NULL,
  `idactividad` int(5) DEFAULT NULL,
  `observaciones` varchar(200) DEFAULT NULL,
  `idsituacionnodo` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mapeosat`
--

INSERT INTO `mapeosat` (`idno`, `nomenclaturanodo`, `idubicacionswitch`, `idnopatchpanel`, `nopuertopatchpanel`, `idnoswitch`, `idserieswitch`, `puertoswitch`, `idtipoequipo`, `idadministracion`, `idarea`, `idvlan`, `idactividad`, `observaciones`, `idsituacionnodo`) VALUES
(6, '4update', 1, 1, '2.1', 1, 1, '2.2', 1, 1, 1, 1, 1, '4update', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nopatchpanel`
--

CREATE TABLE `nopatchpanel` (
  `idnopatchpanel` int(5) NOT NULL,
  `nopatchpanel` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nopatchpanel`
--

INSERT INTO `nopatchpanel` (`idnopatchpanel`, `nopatchpanel`) VALUES
(1, 'PP1'),
(2, 'PP2'),
(3, 'PP3'),
(4, 'PP4'),
(5, 'PP5'),
(6, 'PP6'),
(7, 'PP7'),
(8, 'PP8'),
(9, 'PP9'),
(10, 'PP10'),
(11, 'PP11'),
(12, 'PP12'),
(13, 'PP13'),
(14, 'PP14'),
(15, 'PP15'),
(16, 'PP16'),
(17, 'PP17'),
(18, 'PP18'),
(19, 'PP19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noswitch`
--

CREATE TABLE `noswitch` (
  `idnoswitch` int(5) NOT NULL,
  `noswitch` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `noswitch`
--

INSERT INTO `noswitch` (`idnoswitch`, `noswitch`) VALUES
(1, '1-IDF-P/B'),
(2, '2-IDF-P/B'),
(3, '3-IDF-P/B'),
(4, '4-IDF-P/B'),
(5, '1-MDF-MZN'),
(6, '2-MDF-MZN'),
(7, '3-MDF-MZN'),
(8, '1-IDF-P/A'),
(9, '2-IDF-P/A'),
(10, '3-IDF-P/A'),
(11, '4-IDF-P/A'),
(12, '5-IDF-P/A'),
(13, '6-IDF-P/A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serieswitch`
--

CREATE TABLE `serieswitch` (
  `idserieswitch` int(5) NOT NULL,
  `serieswitch` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `serieswitch`
--

INSERT INTO `serieswitch` (`idserieswitch`, `serieswitch`) VALUES
(1, 'FDO1522R1YM'),
(2, 'FDO1522R1Y1'),
(3, 'FDO1548R07G'),
(4, 'FDO1548P0UU'),
(5, 'CAT1015Z1QN'),
(6, 'FDOC541R1UC'),
(7, 'FOC1007Z3NR'),
(8, 'FDO1522V1F7'),
(9, 'FDO1522P1E5'),
(10, 'FOC2130U1UJ'),
(11, 'FCO1447X1CR'),
(12, 'FOC1007X4QW'),
(13, 'FDO1548K0QJ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `situacionnodo`
--

CREATE TABLE `situacionnodo` (
  `idsituacionnodo` int(5) NOT NULL,
  `situacionnodo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `situacionnodo`
--

INSERT INTO `situacionnodo` (`idsituacionnodo`, `situacionnodo`) VALUES
(1, 'OCUPADO'),
(2, 'VACIO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoequipo`
--

CREATE TABLE `tipoequipo` (
  `idtipoequipo` int(5) NOT NULL,
  `tipoequipo` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipoequipo`
--

INSERT INTO `tipoequipo` (`idtipoequipo`, `tipoequipo`) VALUES
(1, 'VOZ/DATOS'),
(2, 'VOZ'),
(3, 'DATOS'),
(4, 'IMPRESORA'),
(5, 'VACIO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `idtipousuario` int(5) NOT NULL,
  `tipousuario` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`idtipousuario`, `tipousuario`) VALUES
(1, 'Administrador'),
(2, 'Enlace');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacionswitch`
--

CREATE TABLE `ubicacionswitch` (
  `idubicacionswitch` int(5) NOT NULL,
  `ubicacionswitch` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ubicacionswitch`
--

INSERT INTO `ubicacionswitch` (`idubicacionswitch`, `ubicacionswitch`) VALUES
(1, 'IDF1'),
(2, 'MDF'),
(3, 'IDF2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuarios` int(5) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `contraseña` varchar(8) DEFAULT NULL,
  `idtipousuario` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuarios`, `nombre`, `email`, `contraseña`, `idtipousuario`) VALUES
(1, 'Francisco Angel Ruiz Alvarado', 'Francisco.Angel@sat.gob.mx', '12345', 1),
(2, 'Ismael Zarrazaga Concepcion', 'Ismael.Zarrazaga@sat.gob.mx', '12345', 1),
(3, 'Yareny Fuentes de Jesus', 'Yareni.Fuentes@sat.gob.mx', 'itachi20', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vlan`
--

CREATE TABLE `vlan` (
  `idvlan` int(5) NOT NULL,
  `vlan` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vlan`
--

INSERT INTO `vlan` (`idvlan`, `vlan`) VALUES
(1, '12'),
(2, '16'),
(3, '20'),
(4, '24'),
(5, '40'),
(6, '340'),
(7, '401');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_actividad`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vw_actividad` (
`idactividad` int(5)
,`actividad` varchar(30)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_administracion`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vw_administracion` (
`idadministracion` int(5)
,`administracion` varchar(25)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_area`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vw_area` (
`idarea` int(5)
,`area` varchar(40)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vw_noswitch`
--

CREATE TABLE `vw_noswitch` (
  `idnoswitch` int(5) DEFAULT NULL,
  `noswitch` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vw_serieswitch`
--

CREATE TABLE `vw_serieswitch` (
  `idserieswitch` int(5) DEFAULT NULL,
  `serieswitch` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vw_situacionnodo`
--

CREATE TABLE `vw_situacionnodo` (
  `idsituacionnodo` int(5) DEFAULT NULL,
  `situacionnodo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vw_tipoequipo`
--

CREATE TABLE `vw_tipoequipo` (
  `idtipoequipo` int(5) DEFAULT NULL,
  `tipoequipo` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vw_ubicacionswitch`
--

CREATE TABLE `vw_ubicacionswitch` (
  `idubicacionswitch` int(5) DEFAULT NULL,
  `ubicacionswitch` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vw_vlan`
--

CREATE TABLE `vw_vlan` (
  `idvlan` int(5) DEFAULT NULL,
  `vlan` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_actividad`
--
DROP TABLE IF EXISTS `vw_actividad`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_actividad`  AS  select `actividad`.`idactividad` AS `idactividad`,`actividad`.`actividad` AS `actividad` from `actividad` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_administracion`
--
DROP TABLE IF EXISTS `vw_administracion`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_administracion`  AS  select `administracion`.`idadministracion` AS `idadministracion`,`administracion`.`administracion` AS `administracion` from `administracion` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_area`
--
DROP TABLE IF EXISTS `vw_area`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_area`  AS  select `area`.`idarea` AS `idarea`,`area`.`area` AS `area` from `area` ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mapeosat`
--
ALTER TABLE `mapeosat`
  ADD PRIMARY KEY (`idno`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mapeosat`
--
ALTER TABLE `mapeosat`
  MODIFY `idno` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
