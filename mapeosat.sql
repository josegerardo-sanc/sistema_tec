-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-09-2020 a las 23:56:31
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
(1, 'IDF10-01-D89', 1, 2, '89', 2, 3, '14', 1, 6, 5, 1, 1, 'sinobservacion', 1),
(2, 'IDF10-01-D88', 1, 1, '88', 2, 2, '33', 1, 6, 5, 2, 1, NULL, 1),
(3, 'IDF10-01-D136', 1, 2, '136', 2, 1, '5', 3, 6, 4, 1, 1, '', 1),
(4, 'IDF10-01-D111', 1, 1, '111', 3, 2, '27', 1, 6, 5, 2, 1, '', 1),
(5, 'IDF10-01-D131', 1, 2, 'VACIO', 3, 1, 'VACIO', 5, 9, 2, 3, 4, '', 2),
(6, 'IDF10-01-D37', 1, 1, 'VACIO', 2, 2, 'VACIO', 5, 9, 7, 3, 4, '', 2),
(7, 'IDF10-01-D95', 1, 3, 'VACIO', 1, 1, 'VACIO', 5, 9, 3, 3, 4, NULL, 2),
(8, 'MDF1MZA-01-D101', 1, 1, '101', 1, 2, '46', 3, 7, 2, 3, 3, NULL, 1),
(9, 'MDF1MZA-01-D102', 1, 2, '102', 2, 3, '16', 3, 7, 2, 3, 3, NULL, 1),
(10, 'MDF1MZA-01-D100', 1, 1, '100', 3, 3, '11', 3, 7, 2, 2, 3, NULL, 1),
(11, 'MDF1MZA-01-D107', 1, 2, 'VACIO', 2, 2, 'VACIO', 5, 9, 1, 2, 4, NULL, 2),
(12, 'MDF1MZA-01-D125', 1, 3, 'VACIO', 1, 1, 'VACIO', 5, 9, 1, 2, 4, NULL, 2),
(13, 'MDF1MZA-01-D130', 1, 1, 'VACIO', 1, 3, 'VACIO', 5, 9, 2, 3, 4, NULL, 2),
(14, 'IDF11-02-D10', 1, 1, '10', 2, 1, '5', 3, 5, 3, 1, 2, NULL, 1),
(15, 'IDF11-02-D11', 1, 2, '11', 3, 1, '10', 3, 2, 4, 1, 2, NULL, 1),
(16, 'IDF11-02-D12', 1, 2, '12', 3, 2, '4', 1, 5, 5, 1, 2, NULL, 1),
(17, 'IDF11-02-D251', 1, 1, 'VACIO', 3, 2, 'VACIO', 5, 9, 6, 1, 4, NULL, 2),
(18, 'IDF11-02-D350', 1, 3, 'VACIO', 3, 3, 'VACIO', 5, 9, 7, 2, 4, NULL, 2);

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
-- Estructura Stand-in para la vista `vw_mapeosat`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vw_mapeosat` (
`idno` int(5)
,`nomenclaturanodo` varchar(30)
,`ubicacionswitch` varchar(6)
,`nopatchpanel` varchar(5)
,`nopuertopatchpanel` varchar(5)
,`noswitch` varchar(15)
,`serieswitch` varchar(15)
,`puertoswitch` varchar(5)
,`tipoequipo` varchar(25)
,`administracion` varchar(25)
,`area` varchar(40)
,`vlan` char(5)
,`actividad` varchar(30)
,`observaciones` varchar(200)
,`situacionnodo` varchar(20)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_nopatchpanel`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vw_nopatchpanel` (
`idnopatchpanel` int(5)
,`nopatchpanel` varchar(5)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_noswitch`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vw_noswitch` (
`idnoswitch` int(5)
,`noswitch` varchar(15)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_serieswitch`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vw_serieswitch` (
`idserieswitch` int(5)
,`serieswitch` varchar(15)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_situacionnodo`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vw_situacionnodo` (
`idsituacionnodo` int(5)
,`situacionnodo` varchar(20)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_tipoequipo`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vw_tipoequipo` (
`idtipoequipo` int(5)
,`tipoequipo` varchar(25)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_ubicacionswitch`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vw_ubicacionswitch` (
`idubicacionswitch` int(5)
,`ubicacionswitch` varchar(6)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_vlan`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vw_vlan` (
`idvlan` int(5)
,`vlan` char(5)
);

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

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_mapeosat`
--
DROP TABLE IF EXISTS `vw_mapeosat`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_mapeosat`  AS  select `idno` AS `idno`,`nomenclaturanodo` AS `nomenclaturanodo`,`ubicacionswitch`.`ubicacionswitch` AS `ubicacionswitch`,`nopatchpanel`.`nopatchpanel` AS `nopatchpanel`,`nopuertopatchpanel` AS `nopuertopatchpanel`,`noswitch`.`noswitch` AS `noswitch`,`serieswitch`.`serieswitch` AS `serieswitch`,`puertoswitch` AS `puertoswitch`,`tipoequipo`.`tipoequipo` AS `tipoequipo`,`administracion`.`administracion` AS `administracion`,`area`.`area` AS `area`,`vlan`.`vlan` AS `vlan`,`actividad`.`actividad` AS `actividad`,`observaciones` AS `observaciones`,`situacionnodo`.`situacionnodo` AS `situacionnodo` from ((((((((((`mapeosat` join `ubicacionswitch` on(`idubicacionswitch` = `ubicacionswitch`.`idubicacionswitch`)) join `nopatchpanel` on(`idnopatchpanel` = `nopatchpanel`.`idnopatchpanel`)) join `noswitch` on(`idnoswitch` = `noswitch`.`idnoswitch`)) join `serieswitch` on(`idserieswitch` = `serieswitch`.`idserieswitch`)) join `tipoequipo` on(`idtipoequipo` = `tipoequipo`.`idtipoequipo`)) join `administracion` on(`idadministracion` = `administracion`.`idadministracion`)) join `area` on(`idarea` = `area`.`idarea`)) join `vlan` on(`idvlan` = `vlan`.`idvlan`)) join `actividad` on(`idactividad` = `actividad`.`idactividad`)) join `situacionnodo` on(`idsituacionnodo` = `situacionnodo`.`idsituacionnodo`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_nopatchpanel`
--
DROP TABLE IF EXISTS `vw_nopatchpanel`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_nopatchpanel`  AS  select `nopatchpanel`.`idnopatchpanel` AS `idnopatchpanel`,`nopatchpanel`.`nopatchpanel` AS `nopatchpanel` from `nopatchpanel` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_noswitch`
--
DROP TABLE IF EXISTS `vw_noswitch`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_noswitch`  AS  select `noswitch`.`idnoswitch` AS `idnoswitch`,`noswitch`.`noswitch` AS `noswitch` from `noswitch` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_serieswitch`
--
DROP TABLE IF EXISTS `vw_serieswitch`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_serieswitch`  AS  select `serieswitch`.`idserieswitch` AS `idserieswitch`,`serieswitch`.`serieswitch` AS `serieswitch` from `serieswitch` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_situacionnodo`
--
DROP TABLE IF EXISTS `vw_situacionnodo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_situacionnodo`  AS  select `situacionnodo`.`idsituacionnodo` AS `idsituacionnodo`,`situacionnodo`.`situacionnodo` AS `situacionnodo` from `situacionnodo` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_tipoequipo`
--
DROP TABLE IF EXISTS `vw_tipoequipo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_tipoequipo`  AS  select `tipoequipo`.`idtipoequipo` AS `idtipoequipo`,`tipoequipo`.`tipoequipo` AS `tipoequipo` from `tipoequipo` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_ubicacionswitch`
--
DROP TABLE IF EXISTS `vw_ubicacionswitch`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_ubicacionswitch`  AS  select `ubicacionswitch`.`idubicacionswitch` AS `idubicacionswitch`,`ubicacionswitch`.`ubicacionswitch` AS `ubicacionswitch` from `ubicacionswitch` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_vlan`
--
DROP TABLE IF EXISTS `vw_vlan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_vlan`  AS  select `vlan`.`idvlan` AS `idvlan`,`vlan`.`vlan` AS `vlan` from `vlan` ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`idactividad`);

--
-- Indices de la tabla `administracion`
--
ALTER TABLE `administracion`
  ADD PRIMARY KEY (`idadministracion`);

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`idarea`);

--
-- Indices de la tabla `mapeosat`
--
ALTER TABLE `mapeosat`
  ADD PRIMARY KEY (`idno`),
  ADD KEY `idadministracion` (`idadministracion`),
  ADD KEY `idtipoequipo` (`idtipoequipo`),
  ADD KEY `idactividad` (`idactividad`),
  ADD KEY `idsituacionnodo` (`idsituacionnodo`),
  ADD KEY `idubicacionswitch` (`idubicacionswitch`) USING BTREE,
  ADD KEY `idnopatchpanel` (`idnopatchpanel`),
  ADD KEY `idnoswitch` (`idnoswitch`),
  ADD KEY `idserieswitch` (`idserieswitch`),
  ADD KEY `idvlan` (`idvlan`),
  ADD KEY `idarea` (`idarea`);

--
-- Indices de la tabla `nopatchpanel`
--
ALTER TABLE `nopatchpanel`
  ADD PRIMARY KEY (`idnopatchpanel`);

--
-- Indices de la tabla `noswitch`
--
ALTER TABLE `noswitch`
  ADD PRIMARY KEY (`idnoswitch`);

--
-- Indices de la tabla `serieswitch`
--
ALTER TABLE `serieswitch`
  ADD PRIMARY KEY (`idserieswitch`);

--
-- Indices de la tabla `situacionnodo`
--
ALTER TABLE `situacionnodo`
  ADD PRIMARY KEY (`idsituacionnodo`);

--
-- Indices de la tabla `tipoequipo`
--
ALTER TABLE `tipoequipo`
  ADD PRIMARY KEY (`idtipoequipo`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`idtipousuario`);

--
-- Indices de la tabla `ubicacionswitch`
--
ALTER TABLE `ubicacionswitch`
  ADD PRIMARY KEY (`idubicacionswitch`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuarios`),
  ADD KEY `idtipousuario` (`idtipousuario`);

--
-- Indices de la tabla `vlan`
--
ALTER TABLE `vlan`
  ADD PRIMARY KEY (`idvlan`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `idactividad` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `administracion`
--
ALTER TABLE `administracion`
  MODIFY `idadministracion` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `idarea` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `mapeosat`
--
ALTER TABLE `mapeosat`
  MODIFY `idno` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `nopatchpanel`
--
ALTER TABLE `nopatchpanel`
  MODIFY `idnopatchpanel` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `noswitch`
--
ALTER TABLE `noswitch`
  MODIFY `idnoswitch` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `serieswitch`
--
ALTER TABLE `serieswitch`
  MODIFY `idserieswitch` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `situacionnodo`
--
ALTER TABLE `situacionnodo`
  MODIFY `idsituacionnodo` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipoequipo`
--
ALTER TABLE `tipoequipo`
  MODIFY `idtipoequipo` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `idtipousuario` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuarios` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `vlan`
--
ALTER TABLE `vlan`
  MODIFY `idvlan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `mapeosat`
--
ALTER TABLE `mapeosat`
  ADD CONSTRAINT `mapeosat_ibfk_1` FOREIGN KEY (`idadministracion`) REFERENCES `administracion` (`idadministracion`),
  ADD CONSTRAINT `mapeosat_ibfk_10` FOREIGN KEY (`idarea`) REFERENCES `area` (`idarea`),
  ADD CONSTRAINT `mapeosat_ibfk_2` FOREIGN KEY (`idtipoequipo`) REFERENCES `tipoequipo` (`idtipoequipo`),
  ADD CONSTRAINT `mapeosat_ibfk_3` FOREIGN KEY (`idactividad`) REFERENCES `actividad` (`idactividad`),
  ADD CONSTRAINT `mapeosat_ibfk_4` FOREIGN KEY (`idsituacionnodo`) REFERENCES `situacionnodo` (`idsituacionnodo`),
  ADD CONSTRAINT `mapeosat_ibfk_5` FOREIGN KEY (`idubicacionswitch`) REFERENCES `ubicacionswitch` (`idubicacionswitch`),
  ADD CONSTRAINT `mapeosat_ibfk_6` FOREIGN KEY (`idnopatchpanel`) REFERENCES `nopatchpanel` (`idnopatchpanel`),
  ADD CONSTRAINT `mapeosat_ibfk_7` FOREIGN KEY (`idnoswitch`) REFERENCES `noswitch` (`idnoswitch`),
  ADD CONSTRAINT `mapeosat_ibfk_8` FOREIGN KEY (`idserieswitch`) REFERENCES `serieswitch` (`idserieswitch`),
  ADD CONSTRAINT `mapeosat_ibfk_9` FOREIGN KEY (`idvlan`) REFERENCES `vlan` (`idvlan`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idtipousuario`) REFERENCES `tipousuario` (`idtipousuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
