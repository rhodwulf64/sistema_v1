-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-03-2016 a las 21:07:14
-- Versión del servidor: 5.1.41
-- Versión de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bd_cicpc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bien_nacional`
--

CREATE TABLE IF NOT EXISTS `bien_nacional` (
  `id_bien` int(11) NOT NULL AUTO_INCREMENT,
  `cod_bien` char(10) COLLATE utf8_spanish_ci NOT NULL,
  `id_tbien` int(11) NOT NULL,
  `serial_bien` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_marca` int(11) DEFAULT NULL,
  `modelo` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `des_bien` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_cond` int(11) NOT NULL,
  `precio` float NOT NULL,
  `fecha_ent` date NOT NULL,
  `status` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `observacion_bien` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_bien`),
  KEY `bien_nacional_tipo_bien_idx` (`id_tbien`),
  KEY `bien_nacional_condicion_idx` (`id_cond`),
  KEY `bien_nacional_marca_idx` (`id_marca`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=76 ;

--
-- Volcar la base de datos para la tabla `bien_nacional`
--

INSERT INTO `bien_nacional` (`id_bien`, `cod_bien`, `id_tbien`, `serial_bien`, `id_marca`, `modelo`, `des_bien`, `id_cond`, `precio`, `fecha_ent`, `status`, `observacion_bien`) VALUES
(72, '111', 1, '14521ASD', 3, 'ASD123', 'PROCESADOR DUAL CORE', 2, 250000, '2015-05-13', '1', 'Buen Estado'),
(73, '112', 1, 'N/A', 3, 'ASD123', 'PROCESADOR DUAL CORE', 2, 250000, '2015-05-13', '1', ''),
(74, '113', 1, 'N/A', 3, 'ASD123', 'PROCESADOR DUAL CORE', 1, 250000, '2015-05-13', '1', ''),
(75, '114', 1, 'N/A', 3, 'ASD123', 'PROCESADOR DUAL CORE', 1, 250000, '2015-05-13', '1', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE IF NOT EXISTS `cargo` (
  `id_car` int(11) NOT NULL AUTO_INCREMENT,
  `nom_car` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `status` char(1) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_car`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=13 ;

--
-- Volcar la base de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id_car`, `nom_car`, `status`) VALUES
(1, 'LICENCIADO', '1'),
(2, 'JEFE DE LA SUB DELEGACION', '1'),
(3, 'PRUEBA1', '1'),
(4, 'PRUEBA2', '1'),
(5, 'PRUEBA3', '1'),
(6, 'PRUEBA4', '1'),
(7, 'PRUEBA5', '1'),
(8, 'PRUEBA6', '1'),
(9, 'PRUEBA7', '1'),
(10, ' PRUEBA8', '1'),
(11, 'PRUEBA9', '1'),
(12, 'PRUEBA10', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nom_cat` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `status` char(1) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nom_cat`, `status`) VALUES
(1, 'EQUIPOS ELECTRONICOS', '1'),
(2, 'EQUIPOS DE TECNOLOGIA', '1'),
(3, 'EQUIPOS DE OFICINA', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condicion`
--

CREATE TABLE IF NOT EXISTS `condicion` (
  `id_cond` int(11) NOT NULL AUTO_INCREMENT,
  `nom_cond` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `status` char(1) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_cond`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `condicion`
--

INSERT INTO `condicion` (`id_cond`, `nom_cond`, `status`) VALUES
(1, 'DISPONIBLE', '1'),
(2, 'ASIGNADO', '1'),
(3, 'DESINCORPORADO', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE IF NOT EXISTS `departamento` (
  `id_dep` int(11) NOT NULL AUTO_INCREMENT,
  `nom_dep` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `id_sed` int(11) NOT NULL,
  `deposito` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `status` char(1) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_dep`),
  KEY `departamento_sede_idx` (`id_sed`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_dep`, `nom_dep`, `id_sed`, `deposito`, `status`) VALUES
(1, 'ASUNTOS ADMINISTRATIVOS', 1, '0', '1'),
(2, 'ALMACEN1', 1, '1', '1'),
(3, 'OPERACIONES', 1, '0', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_movimiento`
--

CREATE TABLE IF NOT EXISTS `detalle_movimiento` (
  `id_detalle_mov` int(11) NOT NULL AUTO_INCREMENT,
  `id_mov` int(11) NOT NULL,
  `id_bien` int(11) NOT NULL,
  `status` char(1) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_detalle_mov`),
  KEY `detalle_movimiento_movimiento_idx` (`id_mov`),
  KEY `detalle_movimiento_bien_nacional_idx` (`id_bien`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=150 ;

--
-- Volcar la base de datos para la tabla `detalle_movimiento`
--

INSERT INTO `detalle_movimiento` (`id_detalle_mov`, `id_mov`, `id_bien`, `status`) VALUES
(141, 117, 72, '1'),
(142, 117, 73, '1'),
(143, 117, 74, '1'),
(144, 117, 75, '1'),
(145, 118, 72, '1'),
(146, 119, 73, '1'),
(147, 120, 72, '1'),
(148, 121, 72, '1'),
(149, 122, 74, '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
  `id_est` int(11) NOT NULL AUTO_INCREMENT,
  `nom_est` char(255) COLLATE utf8_spanish_ci NOT NULL,
  `status` char(1) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_est`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_est`, `nom_est`, `status`) VALUES
(1, 'PORTUGUESA', '1'),
(2, 'CARABOBO', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE IF NOT EXISTS `marca` (
  `id_marca` int(11) NOT NULL AUTO_INCREMENT,
  `nom_marca` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'ninguna marca',
  `status` char(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT '2',
  PRIMARY KEY (`id_marca`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `marca`
--

INSERT INTO `marca` (`id_marca`, `nom_marca`, `status`) VALUES
(1, 'NINGUNA MARCA', '2'),
(2, 'OPERACIONES', '1'),
(3, 'HP', '1'),
(4, 'LG', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motivo_movimiento`
--

CREATE TABLE IF NOT EXISTS `motivo_movimiento` (
  `id_motivo_mov` int(11) NOT NULL AUTO_INCREMENT,
  `des_motivo_mov` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_motivo` char(35) COLLATE utf8_spanish_ci NOT NULL,
  `status` char(1) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_motivo_mov`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=19 ;

--
-- Volcar la base de datos para la tabla `motivo_movimiento`
--

INSERT INTO `motivo_movimiento` (`id_motivo_mov`, `des_motivo_mov`, `tipo_motivo`, `status`) VALUES
(1, 'DONACION', 'RECEPCIÃ“N', '1'),
(2, 'COMPRA', 'RECEPCIÃ“N', '1'),
(3, 'ERROR DE TRANSCRIPCION', 'ANULACIÃ“NRE', '1'),
(4, 'ME FALTO UN BIEN', 'ANULACIÃ“NRE', '1'),
(5, 'SOLICITUD', 'ASIGNACIÃ“N', '1'),
(6, 'LE TOCABA', 'ANULACIÃ“NAS', '1'),
(7, 'ERROR DE MOVIMIENTO', 'DESINCORPORACIÃ“N', '0'),
(8, 'BIENES NACIONALES DAÃ‘ADOS', 'DESINCORPORACIÃ“N', '1'),
(10, 'ERROR DE MOVIMIENTO', 'DEVOlUCIÃ“N', '1'),
(11, 'SOLICITUD EQUIVOCADA', 'DEVOlUCIÃ“N', '1'),
(12, 'NECESIDAD', 'ASIGNACIÃ“N', '1'),
(13, 'ERROR DE DESINCORPORACION', 'ANULACIÃ“NDES', '1'),
(14, 'DE VACACIONES', 'BLOQUEOUS', '1'),
(15, 'YA NO ES USUARIO', 'BLOQUEOUS', '1'),
(16, 'ERROR DE TRANSCRIPCION', 'ANULACIÃ“NDS', '1'),
(17, 'EQUIVOCACION DEDEVOLUCION', 'ANULACIÃ“NDV', '1'),
(18, 'EXPIRACION DE CLAVES', 'BLOQUEOUS', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento`
--

CREATE TABLE IF NOT EXISTS `movimiento` (
  `id_mov` int(11) NOT NULL AUTO_INCREMENT,
  `nro_document` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_reg` date NOT NULL,
  `hora_reg` time NOT NULL,
  `fecha_mov` date NOT NULL,
  `id_tipo_mov` int(11) NOT NULL,
  `id_prov` int(11) DEFAULT NULL,
  `id_per` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL COMMENT 'este campo representa el id del usuario que realizo el registro del movimiento',
  `id_motivo_mov` int(11) NOT NULL,
  `id_periodo` int(11) NOT NULL,
  `id_dep` int(11) DEFAULT NULL,
  `id_resp_dep` int(11) DEFAULT NULL,
  `observacion_mov` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_usuario_anulacion` int(11) DEFAULT NULL COMMENT 'este campo representa el id del usuario que realizo la anulacion del movimiento',
  `fecha_anulacion` date DEFAULT NULL,
  `id_motivo_anulacion` int(11) DEFAULT NULL,
  `status` char(1) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_mov`),
  KEY `movimiento_tipo_movimiento_idx` (`id_tipo_mov`),
  KEY `movimiento_proveedor_idx` (`id_prov`),
  KEY `movimiento_personal_idx` (`id_per`),
  KEY `movimiento_usuario_idx` (`id_usuario`),
  KEY `movimiento_motivo_movimiento_idx` (`id_motivo_mov`),
  KEY `movimiento_periodo_idx` (`id_periodo`),
  KEY `movimiento_departamento_idx` (`id_dep`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=123 ;

--
-- Volcar la base de datos para la tabla `movimiento`
--

INSERT INTO `movimiento` (`id_mov`, `nro_document`, `fecha_reg`, `hora_reg`, `fecha_mov`, `id_tipo_mov`, `id_prov`, `id_per`, `id_usuario`, `id_motivo_mov`, `id_periodo`, `id_dep`, `id_resp_dep`, `observacion_mov`, `id_usuario_anulacion`, `fecha_anulacion`, `id_motivo_anulacion`, `status`) VALUES
(117, 'RECE1', '2015-05-23', '01:39:25', '2015-05-13', 1, 2, 3, 1, 1, 6, 2, 0, 'OBSER RECEP', 0, '0000-00-00', 0, '1'),
(118, 'ASIG1', '2015-05-23', '01:40:27', '2015-05-15', 2, NULL, 3, 1, 5, 6, 1, 1, 'OBSER ASIG1', 0, '0000-00-00', 0, '1'),
(119, 'ASIG2', '2015-05-23', '01:41:04', '2015-05-19', 2, NULL, 11, 1, 12, 6, 3, 6, 'OBSER ASIG 2', 0, '0000-00-00', 0, '1'),
(120, 'DEV1', '2015-05-23', '01:42:11', '2015-05-22', 3, NULL, 2, 13, 11, 6, 1, 1, 'OBSER DEV 1', 0, '0000-00-00', 0, '1'),
(121, 'ASIG3', '2015-05-23', '01:43:05', '2015-05-21', 2, NULL, 5, 13, 5, 6, 1, 2, 'OBSER ASIG 3', 0, '0000-00-00', 0, '1'),
(122, 'DESIN1', '2015-05-23', '01:45:09', '2015-05-22', 4, NULL, 3, 1, 8, 6, NULL, 0, 'OBSER DESIN 1', 1, '2015-05-23', 16, '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE IF NOT EXISTS `municipio` (
  `id_mun` int(11) NOT NULL AUTO_INCREMENT,
  `nom_mun` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `id_est` int(11) NOT NULL,
  `status` char(1) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_mun`),
  KEY `municipio_estado_idx` (`id_est`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`id_mun`, `nom_mun`, `id_est`, `status`) VALUES
(1, 'PAEZ', 1, '1'),
(2, 'VALENCIA', 2, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `organizacion`
--

CREATE TABLE IF NOT EXISTS `organizacion` (
  `id_org` int(11) NOT NULL AUTO_INCREMENT,
  `cod_org` char(7) COLLATE utf8_spanish_ci NOT NULL,
  `nom_org` char(100) COLLATE utf8_spanish_ci NOT NULL,
  `cod_ud` char(5) COLLATE utf8_spanish_ci NOT NULL,
  `nom_ud` char(100) COLLATE utf8_spanish_ci NOT NULL,
  `status` char(1) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_org`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `organizacion`
--

INSERT INTO `organizacion` (`id_org`, `cod_org`, `nom_org`, `cod_ud`, `nom_ud`, `status`) VALUES
(1, '15', 'MINISTERIO DEL PODER POPULAR DE RELACIONES INTERIORES JUSTICIA Y PAZ', '9700', 'CUERPO DE INVESTIGACIONES CIENTIFICAS PENALES Y CRIMININALISTICAS', '1'),
(2, '15', 'MINISTERIO DEL PODER POPULAR PARA LAS RELACIONES INTERIORES JUSTICIA Y PAZ', '600', 'SERVICIO BOLIVARIANO DE INTELIGENCIA NACIONAL', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parroquia`
--

CREATE TABLE IF NOT EXISTS `parroquia` (
  `id_parroq` int(11) NOT NULL AUTO_INCREMENT,
  `nom_parroq` varchar(225) COLLATE utf8_spanish_ci NOT NULL,
  `id_mun` int(11) NOT NULL,
  `status` char(1) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_parroq`),
  KEY `parroquia_municipio_idx` (`id_mun`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `parroquia`
--

INSERT INTO `parroquia` (`id_parroq`, `nom_parroq`, `id_mun`, `status`) VALUES
(1, 'ACARIGUA', 1, '1'),
(2, 'BARRERA', 2, '0'),
(3, 'ARAURE', 2, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `idperfil` int(11) NOT NULL AUTO_INCREMENT,
  `nom_perfil` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `status` char(1) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idperfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`idperfil`, `nom_perfil`, `status`) VALUES
(1, 'ADMINISTRADOR', '1'),
(2, 'AXULIAR', '1'),
(3, 'JEFE DE DEPARTAMENTO', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo`
--

CREATE TABLE IF NOT EXISTS `periodo` (
  `id_periodo` int(11) NOT NULL AUTO_INCREMENT,
  `nom_periodo` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `status` char(1) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_periodo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=8 ;

--
-- Volcar la base de datos para la tabla `periodo`
--

INSERT INTO `periodo` (`id_periodo`, `nom_periodo`, `fecha_inicio`, `fecha_fin`, `status`) VALUES
(6, '2015', '2015-01-01', '2015-12-31', '2'),
(7, '2016', '2016-01-01', '2016-12-31', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE IF NOT EXISTS `personal` (
  `id_per` int(11) NOT NULL AUTO_INCREMENT,
  `ced_per` char(12) COLLATE utf8_spanish_ci NOT NULL,
  `nom_per` char(50) COLLATE utf8_spanish_ci NOT NULL,
  `ape_per` char(50) COLLATE utf8_spanish_ci NOT NULL,
  `tlf_per` char(12) COLLATE utf8_spanish_ci NOT NULL,
  `email_per` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `status` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `id_cargo` int(11) NOT NULL,
  `id_dep` int(11) NOT NULL,
  PRIMARY KEY (`id_per`),
  KEY `personal_cargo_idx` (`id_cargo`),
  KEY `personal_departamento_idx` (`id_dep`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=15 ;

--
-- Volcar la base de datos para la tabla `personal`
--

INSERT INTO `personal` (`id_per`, `ced_per`, `nom_per`, `ape_per`, `tlf_per`, `email_per`, `status`, `id_cargo`, `id_dep`) VALUES
(1, '12566019', 'JUAN JOSE', 'CAMACHO', '04126984567', 'JOSECAMCHO11@OUTLOOK.COM', '1', 2, 1),
(2, '23052336', 'DANIEL JOSE', 'GUDINO LOPEZ', '02556217820', 'HOLA@HOTMAIL.COM', '1', 1, 1),
(3, '17650483', 'MARYERLING CAROLINA', 'GUDIÃ‘O LOPEZ', '04268096475', '', '1', 1, 1),
(4, '24019450', 'NESTOR LUIS', 'INFANTE QUEVEDO', '04124034232', 'NESTORLINFANTE@GMAIL.COM', '1', 1, 3),
(5, '5949569', 'JOSE', 'PEREZ', '', '', '1', 1, 3),
(6, '22123321', 'MANUEL', 'INFANTE', '', '', '1', 3, 1),
(7, '1234567', 'JOSE', 'NEIRO', '', '', '1', 7, 3),
(8, '12345678', 'GGRRR', 'GGP', '', '', '1', 4, 3),
(9, '50505050', 'JUAN', 'ECHER', '', '', '1', 4, 3),
(10, '5555555', 'FELA', 'ALEGO', '', '', '1', 4, 1),
(11, '12264598', 'ROBERTO', 'OLMOS MUJICA', '04145943022', 'ROLMOSM@HOTMAIL.COM', '1', 3, 1),
(12, '11111111', 'HOLA', 'CHAO', '', '', '1', 5, 1),
(13, '585858', 'MARIE', 'MUJICA', '', '', '1', 2, 1),
(14, '565656', 'ROSA', 'PEREZ', '', '', '1', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntaseguridad`
--

CREATE TABLE IF NOT EXISTS `preguntaseguridad` (
  `idpreguntasSeguridad` int(11) NOT NULL AUTO_INCREMENT,
  `preg1` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `resp1` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `preg2` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `resp2` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`idpreguntasSeguridad`),
  KEY `preguntaSeguridad_usuario_idx` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=136 ;

--
-- Volcar la base de datos para la tabla `preguntaseguridad`
--

INSERT INTO `preguntaseguridad` (`idpreguntasSeguridad`, `preg1`, `resp1`, `preg2`, `resp2`, `id_usuario`) VALUES
(1, 'CUAL ES EL NOMBRE DE SU PRIMER COLEGIO', '$2y$10$tfnnpPIZsi1u/1V49kLl0uJL2YCIFi2UVvvhlLXt0EPOTFAJhGm02', 'HOLA NUEVA', '$2y$10$ki/Of8c5Q.2uPwIQpy832.uTxDvJuFdoC25IV8pp1cigicOvAcvha', 1),
(2, 'Â¿CUAL ES MI MAYOR LOGRO?', '$2y$10$lIRdPLqR4EBQtdPFgdwhqOfRm7Ge6axoPxIz.ASHAcPJDhpu0QCTu', 'MI PERRO SE LLAMA', '$2y$10$dKgwz0/w3nuv8HIKeUMtM.UlmtVqCnBxwtqWrWs5jLWqpnRJv6Jsy', 7),
(3, 'Â¿CUAL ES MI MAYOR LOGRO?', '$2y$10$3n5R1u/r/vmBM8sfIAzpWOIHgTcrx/.XhKBUElG1.106J5bbswh5y', 'MI PERRO SE LLAMA', '$2y$10$lna3ttB90uj8kpvPxgB0vexM5E12fGwDCsgMyBGMErXNwB73.UHXS', 7),
(4, 'Â¿CUAL ES MI MAYOR LOGRO?', '$2y$10$rM3MB6DjhWC/pjhxBkITB.bju5shcMXZc9XHRTSm.jmHit.zJvg2S', 'MI PERRO SE LLAMA', '$2y$10$JOuZvMMcASzgaGawGEMBqeIUuvlXaDHVegKx.Q8AeSPsIw0I5tX62', 7),
(5, 'Â¿CUAL ES MI MAYOR LOGRO?', '$2y$10$J6TgGF9RpSVXQolaxyAW..Z3cBPkbCAN4xNwpbRmFeZ1j/0vZqziS', 'MI PERRO SE LLAMA', '$2y$10$yFHUPjf9gnY6fR8fyvREcO49oETGSRmFih4tV7I9ma.jTCNNrzVoe', 7),
(6, 'Â¿CUAL ES MI MAYOR LOGRO?', '$2y$10$EDQ./UuFfZ6MWQXdLkq8l.t6LpJ2p0S5nbdMxHdcTT0mld7bgVHd2', 'MI PERRO SE LLAMA', '$2y$10$OTR83Znpi3S.mmodoLOUgee3nDOaSAcevQmLt71ZfbUqHfJj3AkuS', 7),
(7, 'Â¿CUAL ES MI MAYOR LOGRO?', '$2y$10$1/qwhT/OPOtAWbYEo.u8MeNpWHyU18RBhaFx1xTUa7IP/flRghXYq', 'MI PERRO SE LLAMA', '$2y$10$1L.Pvd7klTK9Cx8x1zvZSOGhwm.roGK3iv5l0cdMj52aYNlF3syY.', 7),
(8, 'Â¿CUAL ES MI MAYOR LOGRO?', '$2y$10$hpbUiLQdp0EtrIV3Xr6eWe8Qv8sGFZTR4wAq8L7tzBrpNQtsF4Nfq', 'MI PERRO SE LLAMA', '$2y$10$ubyHxqhbOD.x97KoxaBQrex8fYorWp1S3Fmfc43Hnrnpy5qJA3v.q', 7),
(9, 'Â¿CUAL ES MI MAYOR LOGRO?', '$2y$10$K2F8jE1g63QK4V7X1ge4POAudpkm61cyGp3pfAXDnwBnJ8immRsKm', 'MI PERRO SE LLAMA', '$2y$10$wCS5PXuTu0reSnaDHPdisO476aMr2ISTwNBKlbBOBH/Ex9fQ5PyPe', 7),
(10, 'Â¿CUAL ES MI MAYOR LOGRO?', '$2y$10$.MNy1IsSSgaj0/oAR0LLn.FKcVoSTUEL7jyiJ4jjURsXaflS/DYrG', 'MI PERRO SE LLAMA', '$2y$10$muHlSgaNRefzPdomfD3fzuKj4zE6pRD.t/hwZpciR8c9mz7NB.Asy', 7),
(11, 'Â¿CUAL ES MI MAYOR LOGRO?', '$2y$10$cEEj5q4ZVprRtHy5/8snjOE435mkUr9ntyNCvpYz5OxiuWVBOfYbK', 'MI PERRO SE LLAMA', '$2y$10$hk0XKp9wuNos7f7cFZ78luhOgQNNMJBGIpoPSl4yDdky7F6x4r44W', 7),
(12, 'Â¿CUAL ES MI MAYOR LOGRO?', '$2y$10$OaUWh16bZ5uvCjuX8ozOzuXt4cdUHh0p3uUWaW5S6lYAsznBvMGLW', 'MI PERRO SE LLAMA', '$2y$10$G4N.6LFHDWKODLTYUWX1x.r7G/0w1vaAa3hUxPAe/4p6TrBSR3UNu', 7),
(13, 'Â¿CUAL ES MI MAYOR LOGRO?', '$2y$10$xQ35ZAjyTeXy3Nf5YRuew.5CJFZQ3zyyeSnEVgnkzFWTcWl0sKv5a', 'MI PERRO SE LLAMA', '$2y$10$z/dmquZZRFAZJAB565gxPeR85Egrq21KpX3vfcFOmA.0JUC03BVzC', 7),
(14, 'Â¿CUAL ES MI MAYOR LOGRO?', '$2y$10$VkDAbp3UOyWtXfT0EU9l0OWtAPkgECNtmeDEh3kxFRtnxo.J8PB5C', 'MI PERRO SE LLAMA', '$2y$10$MFJkvSY5YjqYMuZ9I9iOE.k28I.a6nMGDK43BTzmt8wiPjZW14RXC', 7),
(15, 'Â¿CUAL ES MI MAYOR LOGRO?', '$2y$10$CvuFGIMNVXP7eI/.WEAVZOU9CAGuHotEEeBC0gZamoeH5LtrkEzly', 'MI PERRO SE LLAMA', '$2y$10$Wgeqb9TwBcDsv7vzaHMa6.EvQKRyzqwzhQ8DuyAA4RxXz/dAHIuO.', 7),
(16, 'Â¿CUAL ES MI MAYOR LOGRO?', '$2y$10$zDO7yhRx0UpBhUWokIz8ie.sOfPwDzW53hSoQYv3XjaijW7PaGwBu', 'MI PERRO SE LLAMA', '$2y$10$scJU5nvkF1m2EGaTWd5wxe5r68aof5sbvylV/8LpJUkk3WfmGc3Zu', 7),
(17, 'Â¿CUAL ES MI MAYOR LOGRO?', '$2y$10$.YpJRN0IPkCzSpFi5MUzgeVzZH33cFSvBf6NGm20H.dfm34yBl91G', 'MI PERRO SE LLAMA', '$2y$10$JdIbn.iodbHjKe0N7PwK/.UXz3AxKZLgGzsi7LHT1.2fRiaesc5Q6', 7),
(18, 'Â¿CUAL ES MI MAYOR LOGRO?', '$2y$10$JMadAIzcjbsl3ZLou1B6n.i3jipn/3ey6ULXSYsMCeOZ84v.gmakW', 'MI PERRO SE LLAMA', '$2y$10$Nw5RjBwLM0273b2.av7Ax.G5UtzS8xrPvwV96xMG/DnuzFPZHjxw2', 7),
(19, 'Â¿CUAL ES MI MAYOR LOGRO?', '$2y$10$57engWHQWPji6O517hJ7puMvewihqL5bZ1nDI0OC1TAQUlYuyzB4G', 'MI PERRO SE LLAMA', '$2y$10$zuzvewvlBfEY7kAjpWQxwOehskB6CLcpVWlFmlPQXACDTC3jm5S8S', 7),
(20, 'selec', '$2y$10$.fkZvGFOxwjpS8Aar7y9muCfDQB9NpRYSHwPDuspxHclm3zuFC2Tm', '', '$2y$10$qqw7IT9xRycRpQd.UyonP.QPPvqd3XYacOm1LubReL96UgJjgSXF2', 7),
(21, 'selec', '$2y$10$5bJPYyA3XfWOHeTdLmF3h.TmFJVGV5G7Gjfkb/SNAvQfmk5PgLifG', '', '$2y$10$uGQq01zAxOP1VZ.wj45jw.ii4xB67DLyGxX4rbT.dzoANW.qKZbj6', 7),
(22, 'selec', '$2y$10$l0coIertcl3.lptkxl.JJ.WTAQ7xd9W30z3.Ks52hokSLI6vP6W6a', '', '$2y$10$60FaV0xuSYlKK/EB7U7LNe3Al.XIoE.PhEgP40lDhNOAapykCNjjS', 7),
(23, 'selec', '$2y$10$o2vH5WeQtwli2NMMGxSF3etBfI62pcz4RodUP/D.l.rLtk5KHmFAG', '', '$2y$10$VD56KObO/ajAnVn2bx5lLO0ZsgdKe6PFiiQiWKPVUYRqxkmzCoNZS', 7),
(24, 'selec', '$2y$10$01WIXdzRKVbjBP/LzgqL.uVnbxapm6CsOsRqWmMnldDU.1NwqNvUi', '', '$2y$10$RAMy/rD/VuYJv3daKlDB8Oyvp/tF7JaLPxLV3QQi0PTB6IDCUeAjO', 7),
(25, 'selec', '$2y$10$VkS0lrbJR7.AWC0LTpQWSePOHAOlvHDS4HUHLlRUXvmZTLjk8.UbG', '', '$2y$10$K/ZH.KUwFQV5bX0l1BD6ZO4d6FhudOobWJGRzmpy67ZyFvEWS80Ey', 7),
(26, 'selec', '$2y$10$ZfM/xU.nsmvjtOjGm9M/l./Y67ikvh3ogkbkEUkGQQZm.yHXuVOhO', '', '$2y$10$umbJR1hsifF/vFc7vZ2CTutKNfzfXSKnyhqJApbjpLJnqdqngXCJG', 7),
(27, 'selec', '$2y$10$CfNiPCEmNUln0Y.Z.UEnoug7wY8kqSv652uZEu37Mh7zdWBK9xXEO', '', '$2y$10$bOxFf1iFj1O1P5iXycb27.UOhRiTPOH0Ta/0h5rOyGvxrGEqy0Gvy', 7),
(28, 'selec', '$2y$10$aMI4WVclcLLsmXlzrbe9R.VLQneKRwrJHlVmBsiR1RzbOPGrfZ436', '', '$2y$10$EWTyunBYA06qYTlsB9izw.pXJoSdG87RkRsN3HynrDHNsjjYvdZ8i', 7),
(29, 'selec', '$2y$10$xjUrEAkXrsUPQ8k1sIx12.N.sQ5/pPwM7OA3fMDzBnLtK203irrIa', '', '$2y$10$iUdF.x1/t/hKKooAdgBy9uVTfY0p8H98bIZ7eth1GNpukXPkS.RkW', 7),
(30, 'selec', '$2y$10$x08CSJnQ5Ec87sV3OEUKCONdRrB/y6hItcwQAygfV6pfMUQUB3VOS', '', '$2y$10$X.Q31gSyUVO8tISnVZVfDuZhkdV..v3zFTrKx3uqwVXSe7sv11qHS', 7),
(31, 'selec', '$2y$10$JANcEXWGjAK/NVwBXYmAMeEIMbqESbHijvCLSEqR7P8dfM9mS65lq', '', '$2y$10$clF2.rOF26tSJj4lfhmQFup132vGi8rYSgLRgIEn95uDO.dkEOyTm', 7),
(32, 'selec', '$2y$10$RFdDIjFQbkPgpf3YT83ad.zUK.GMfamObQVqAOu9udfsw9YZV13Sy', '', '$2y$10$4hsSbK8bNMAg7oKQQoy53eAkbC7KE1.IrlBrzw6QwALpgStwq3G9e', 7),
(33, 'selec', '$2y$10$JDROSHZeZVccfR9NPPSp7enjnrpGn5/UmuPeTORfanIyF5pNFdXAa', '', '$2y$10$t3oEiDSjpeyXsRdXnZQlIuht8iYwMadugnAoXD.HUCFAhTkfsF.gW', 7),
(34, 'selec', '$2y$10$OzF.wAjgzIsFHwG/GsQhROc33NjJM6Vzwxn8/S0R09wpXiqWagt/6', '', '$2y$10$0ZUSZIfAs2wRBtzSc0FvVukiFivLnIJOV3uygKHMNkUJTAfzdazDG', 7),
(35, 'selec', '$2y$10$JhbEAzViNth/dRvPg31Ca.hzynsAd9.jb3rslNDKvgEXtRA0nO0Gu', '', '$2y$10$S/j4VAiLvZOTOO/6//fs6eOymq3GoeSniUMhnJu1oeFmUH/0iE1cC', 7),
(36, 'Â¿CUAL ES EL NOMBRE DE SU PRIMER COLEGIO?', '$2y$10$pqzQlAT6.OT0.Z.TOsDH0.e4lb.jo4xEC5/2uX9X6xA..cb61dYH2', 'DDDD', '$2y$10$ryY9./GZ/VckuSQ11K64l.ivp5SLp5Xk16WTz39TyiW1f8sIRN28e', 7),
(37, 'Â¿CUAL ES EL NOMBRE DE SU PRIMER COLEGIO?', '$2y$10$HurnW/2F1XAG9GNctHUAtOpQdareJZ2hAsC3Y3QLs6cyuT6fOFHuy', 'DDDD', '$2y$10$vJibQy1W2ZaXWytMbm/gguVw3XS0OAEVVIsnLpPUraDQwCHPp21YS', 7),
(38, 'Â¿CUAL ES EL NOMBRE DE SU PRIMER COLEGIO?', '$2y$10$Tbbe0MGfjoEkkzo0CGth1ejZM39vTiVQ4RauZuFHkNElKdJipfRHK', 'DDDD', '$2y$10$1L00I1QyNCNx5Tr4yvSzU.VYIOE7L4YiFRAxOSmV6Tbo88kA2UYdq', 7),
(39, 'selec', '$2y$10$PoQp5AmCyXLr6uUH0aZxF.erPqBwwsTysHcd8a1BnDLYveR3ojNF6', '', '$2y$10$zfmXeVw/U2N4VidVmXMOkOm392FtOwkQehNzD4feJ5DIpvOfAV8Ve', 7),
(40, 'selec', '$2y$10$ijzdcDn6Gzx6LbseH7yIy.uGDus6zSBFb/0/GrWB7P7hV/5wq69Mq', '', '$2y$10$6kVNzZvsgWUnYpyIZ3useedNiEJB/MW46LjJ/dJn/7h9ZummP/wG2', 7),
(41, 'selec', '$2y$10$3L8fR8cnT88aHL0um4.3dew9Da/VhWL3fkfCpSnIPUMCvUYjlZTma', '', '$2y$10$IgVqIg.ylkfed./Gix3YCON/mQSPZUJdTQTRqgPZVxetGSsExjRdK', 7),
(42, 'selec', '$2y$10$wj5IonLGzsR519GR08zz7./ObmuZnKyTDCCqj3GNG6x/5jpbHWvBK', '', '$2y$10$USHLZGryRKarlC2vxJpXGOtm6j7C0z92n0knX/cZZF6maZsxU3pVq', 7),
(43, 'selec', '$2y$10$O0daFVU8ESwJ.0XlyeSNy.kBZnXYYQF.98Jg2Q8/hQ3PEAoz7x9gG', '', '$2y$10$fwGI2m.mzjWIE1ggg77ege3qWPS.p2M2Beew.o7t2LoDH/jPIC9b6', 7),
(44, 'selec', '$2y$10$Rrkwo8mhP4Akm9/XJ8v1fePvTYQnAKZwtpipKpIkk34Lw3xUqIIsq', '', '$2y$10$Yj7RK1m5eQvUieReiPEM1.LnFmrHeQG1qsWILTvEHROVxdfYecP3G', 7),
(45, 'selec', '$2y$10$o7je.n8CgszN..TCt/btme9fUjF793kFdjUH9EfsWcX4y4AlxrRT2', '', '$2y$10$RinfPyqoK2nKalETQFM48OrX9DpsyWJySwHanEj4KP./y7rmr.FEK', 7),
(46, 'selec', '$2y$10$e1iIS1PI80QCr.t.mL4g2emH1hCYdti310RZ64GkFSdSr.xjZJ1Wq', '', '$2y$10$Kz3Q3gaLd4OIqa2AvtG84e79M34mZMcU5cq5zOt18cz4MSK5x22z2', 7),
(47, 'selec', '$2y$10$5t/S1JOnePdP3xLU57n9B.r/j4YW9orWUgk5..apqV0g78DHyg5vO', '', '$2y$10$OfCC2JwcApuYj3ARQ2qdpuFvE3bJ3Z00RU/Iq5NOGPoi9i5i7Rmi6', 7),
(48, 'selec', '$2y$10$1sCm2a1vvGQJnuVFsYze.OjQdjDSthKnC/5qYtpfX3.Ka8IH4EiMC', '', '$2y$10$pFcPDaHp0/c7xxKeX5q/V.VldmjxPSe0etH51VhdRNjkhPoLoHScy', 7),
(49, 'selec', '$2y$10$ZVgAm3jtTrhFquTo5wZPXOoQStPxyHE4WtzyEmSXsnLN92czTsNQC', '', '$2y$10$PpnP8QRrOIs/nAxZLXUW4eiLfsYE2nhpikk5ttmBglIPC0X9W../6', 7),
(50, 'selec', '$2y$10$mnSKlulnKpo49HiKjn.NseJinq4imGMSfi3l4Hc07UUoL7/fHUd5e', '', '$2y$10$g1Zx0m5NwJ1ndIFns3G0tOABzFuloiXK83lZw73wMeIl9NeXniWci', 7),
(51, 'selec', '$2y$10$SkBpeSUQZQyMT06CDtsAoOkqDnBkbxqJoDZM6o8UXqGgf01Hmef4K', '', '$2y$10$57IHpS5G.lJz35XZovfCbeD94qZv3tjIQKFWK/nNoTRo.dIn4GCPa', 7),
(52, 'selec', '$2y$10$3igRi7RAagOqcuylN1YpT.xF5f.u9wsyGfN9.NkgKIXw4wMSCVWTS', '', '$2y$10$YXvNYBRr7OmtgjxC8eeoC.HGoiTxwXzSifh8RIKan4UDD9unAaDaC', 7),
(53, 'selec', '$2y$10$2IPzgQLUGTOkubRngPsp3eCpQ64PWKOXceOJXLFJok0dNU7ZYvJle', '', '$2y$10$N98AVAredZ5.203i1u7N1uXhGL57AHO3XIzXkL1GTu6BRS0wNfhRK', 7),
(54, 'selec', '$2y$10$SqSRWo40GuXVUaX67A/8We.aDaVTpXC7MljmDX107p22vyIvAYfV.', '', '$2y$10$nlJN8PHm3a7MbZ0.cp5ZbeSR6BC/mqTExe9/W2z5n2szN9f9dSIP.', 7),
(55, 'selec', '$2y$10$.ZV9r3mLDyOdKVmEHsrLBu5x8c5GwXxkUpT.tNBQWKVyVxl.o44oq', '', '$2y$10$V1AH2af2tEgADmgcClNkv.yahRaNmNSFqg8ws2EWKgCWKF8YLJt66', 7),
(56, 'Â¿CUAL ES EL NOMBRE DE SU PRIMER COLEGIO?', '$2y$10$T6ws5DJkq4ShOUXN6vmj..4bUZzrQk.mJ5XbEC/F.4pAH8.8dR0pS', 'PERRO', '$2y$10$MsRAVmgFQTJ0kBEvtTzMD.jEuGonq6pSzoY3odzM//z1O610HWtmu', 7),
(57, 'Â¿CUAL ES EL NOMBRE DE SU PRIMER COLEGIO?', '$2y$10$SuMPAS64Zn/g1PivsIBxWu2O10sznkOVDVTN8pLY9P1VBJexUfNJy', 'PERRO', '$2y$10$kmT919fnqmsLXUBne/QIuOb9guqUgiwNt3ffoEkfIceFRennlVwwa', 7),
(58, 'Â¿CUAL ES EL NOMBRE DE SU PRIMER COLEGIO?', '$2y$10$SLzuuMDYoIfyw/sqjmX5/evbI92fGaKIhBxM6j1twGGwWzgPLX.jO', 'PERRO', '$2y$10$xzhZ0XQy6BTpZRYVSfY61ei9jiue8Nnk5y4KYjKEvu.SQ8Tt4enXe', 7),
(59, 'Â¿CANCIÃ“N PREFERIDA?', '$2y$10$.hFFLKL58uIz2nOSIoxeh.UX0fhMZI1L3yPn9lXOkDPLcXiSPP/1K', 'PERRO', '$2y$10$E4jp1ZlhVVZYWEAfwscYluX.7gFXAlga.h6y9eUB8RmGzvs6Eb83S', 7),
(60, 'Â¿CANCIÃ“N PREFERIDA?', '$2y$10$UIP4houTOEjiyHmOitL6AeejHuky6Yoh0mCRohTXwfjZl0ukre.UK', 'PERRO', '$2y$10$65sqpmuRTPjoA2nUjqSkcuwD4rH.luEf.Ca6CBCsxOPjmhcRhN0xG', 7),
(61, 'Â¿UN lUGAR SECRETO?', '$2y$10$PCq5cX58IR.zR3mSGjQXr.y8BTx/b0BZc2VQnxakD.1j7xz4JzfjW', 'WW', '$2y$10$QF5O3MxZqpbOVR7u16UbT.59Pq2Gf8rbHE.aZ10UVsjZoQoA2Q4Y2', 7),
(62, 'Â¿UN lUGAR SECRETO?', '$2y$10$5ANohFNIE3DrvzwPRHBVpucpqyx2KHxjSmSBYycjLCJbkASfIrrIm', 'WW', '$2y$10$WkMeN.j5Z3KmD6inKrUvs.gNc59SfMTDoSubOOSW77AzyE3m8GA9e', 7),
(63, 'selec', '$2y$10$uRgmZtzFJVjBPlFEIcUY3OTgD1dI7D0ftU0vOP3EzMZt7x3QWWw1.', 'RT', '$2y$10$I4Ubh1pLhZuOmHgFYR6MauIZwv.KzJAxIFYvGgn5c1QzPzxlN8yUS', 7),
(64, 'Â¿UN LIBRO DE SU PREFERENCIA?', '$2y$10$txr7n23kDW8/Ceqfse3G2uyLSBHi5DI24HV5FgspWlIqPeGcq8aSG', 'RRR', '$2y$10$bN4oFwdZOJ0K4ocdDLbaou/ZU4Y32UgM8fz1aP6woc6tClaBzwUzO', 7),
(65, 'Â¿UN LIBRO DE SU PREFERENCIA?', '$2y$10$qAjgDwGEDSBSquMV0hdPZeQK96gyc5cG4LmZkfrCzJr/7zcZra07q', 'RRR', '$2y$10$cOeqpKxcIJPZrkZUfYW4Bep8nl.wQa4XmnxAcGnfRTzcSnpsJNSLm', 7),
(66, 'Â¿UN LIBRO DE SU PREFERENCIA?', '$2y$10$Y5YzX0gWTibja2z5YjweOu3WLK/L3OwCv6v7w1uAU3pMx90HIivvK', 'RRR', '$2y$10$6tynPyU1PG7Bslyn9e5g.OgUnDKEW0AyjbKoOrWnAJJIaf.tXQ21W', 7),
(67, 'Â¿UN LIBRO DE SU PREFERENCIA?', '$2y$10$3ksYbRBwaiPEIxsfh4qBiuCnKgDeqokog69gn1.5SlsX92q4AGXT.', 'RRR', '$2y$10$LqC8VlAPLVq0p9Q3wJgSqe3gBC09JoAbzdVYV5kBRcotvEpwH0hHS', 7),
(68, 'Â¿UN LIBRO DE SU PREFERENCIA?', '$2y$10$.QeEpa5eA9JUBuaPNDtopuJj.hloXcsg7uW0Z4GlGkuFZWITlXQ6q', 'RRR', '$2y$10$6rFcb1Zbf4pV6b9XsylG4.5YliY42i0mmrNW81hzJbVgokkhV4p2S', 7),
(69, 'Â¿UN LIBRO DE SU PREFERENCIA?', '$2y$10$B6/GGs940yfxOo.OUtudguokwKqe1.mROZmnbCpAmmi6PXUsMayf2', 'RRR', '$2y$10$xqUJhXccvxGETvbqTFQ1teOMNT1dc/vOyqPIJKGLyqsLQlEGv/EHe', 7),
(70, 'Â¿UN LIBRO DE SU PREFERENCIA?', '$2y$10$DpNIs8bVkDpykM02JuNKp.9gshExvmJABidooh2gSbRFq1w1kVV7G', 'RRR', '$2y$10$OQzB1VuGTnUpgx3MAE5PMue2QQDuajnJXl6QaTWFX5WlwV4Lo2c2O', 7),
(71, 'Â¿UN LIBRO DE SU PREFERENCIA?', '$2y$10$2oOzdDmHPVAVV1OP3POzN.aqMHnvXORStW.2Rx2rVWuc1.5gZmoTG', 'RRR', '$2y$10$FVy8XMbC2fmf4Wg1ZQJtpu460OeSH0ElVaVbTqEOjQtapB4VqCsMO', 7),
(72, 'Â¿UN LIBRO DE SU PREFERENCIA?', '$2y$10$YmbQgZLHyXRQ8GDPsC7/m.GAGQ/vEjJ8axY5pDMI7f6sZrZfruG2a', 'RRR', '$2y$10$0R7tPMH3smzB6elPBQYMAOb9/.ng1e4nmiCXsVSO94Xw5vod..fUC', 7),
(73, 'Â¿UN LIBRO DE SU PREFERENCIA?', '$2y$10$Ok95OZ89upJCJz2GVLln4uAHciC7THYDiOMzw19dlMpbkBC1hkB5K', 'RRR', '$2y$10$jrnBk4Pt7wLLBzLGd69kN.stymFIPW2iV68eO9Hab.vJ/KLtc6g8q', 7),
(74, 'Â¿UN LIBRO DE SU PREFERENCIA?', '$2y$10$z4z2fOsKFbRM.p2YLG4xuulpXSYPg6Hm/4oX4nQZb8ug1x6G1Sbaa', 'RRR', '$2y$10$aNDLU0Pq6xn9JQVKulMRVORZCJwLCzQwpljwL7bhd4oXUqFWvS81W', 7),
(75, 'Â¿UN LIBRO DE SU PREFERENCIA?', '$2y$10$gISexOoyt3gAdufwWs9zseoCD.tyjAMR6neXh8HitOqgzx9J/Sprm', 'RRR', '$2y$10$8vqBfMgDmvUcIuff2KzkLOAHDPmid/BC7Ty5xkXQTmXxNl5KitcZ2', 7),
(76, 'Â¿UN LIBRO DE SU PREFERENCIA?', '$2y$10$aq66RA0knUFxG.UlnAe3SuWoR.d16SYdZTw9Uvb7orelx1PTp25ee', 'RRR', '$2y$10$Fhr/X2tOtIumqwSpCsi97eNkKv6zswToHMzFywbqx.7M716EYTl0a', 7),
(77, 'Â¿UN LIBRO DE SU PREFERENCIA?', '$2y$10$qE5vgEq8TVv8fN8NPaVPIOj5CAx/EVs0K4bi46eXulYP.3KP1WCV.', 'RRR', '$2y$10$585rZ3CCpYBeQfrHq3O8wOGFALRUmW/k9.wdFrIPrjg9pFucCscqa', 7),
(78, 'Â¿UN LIBRO DE SU PREFERENCIA?', '$2y$10$HYZWT6TfE9r1AolPlwwBWeaQm6/dxvA/zqZ4u7Dho2svirQC8qCyu', 'RRR', '$2y$10$qSyLTK/hEoNBNp/cDpk17.AaRKwZIUVRksf8JIBhW7tZZegNwIKjm', 7),
(79, 'Â¿UN LIBRO DE SU PREFERENCIA?', '$2y$10$eCwzHrQIAaiBimQVOwiVCugChGVoul7KFWQt18AKBpYqAKbv3Wlby', 'RRR', '$2y$10$h9Xd9PBEA0ucm2u/z6tz9.WFG01Bk4iHoNOV1t9jdCCeMCjDT/9m6', 7),
(80, 'Â¿UN LIBRO DE SU PREFERENCIA?', '$2y$10$gPVpC1zCaQq4BwHbOMV/LOpXpoh2t5IFvCqYhGPo7QP5OTWg8gIQ2', 'RRR', '$2y$10$oSj3gAKVhuhpTbPhsqFrreaMGbV3QzjBgNEx5bSyTxmBIOtCmDcoC', 7),
(81, 'Â¿UN LIBRO DE SU PREFERENCIA?', '$2y$10$yVcixG/yB7FA1mD3/mga8OGglhNpxht3OqueUO0J/fQdn0PtYR6JS', 'RRR', '$2y$10$KJOqenxnV3/cp7aK..DHLOx/B.Hx02TAyctH7qFqSHPwIVXg2SQSm', 7),
(82, 'Â¿UN LIBRO DE SU PREFERENCIA?', '$2y$10$Pma93WsIIJQWbY99grg5red7VMzuwzrdZsqcgm7jZPvizBCJ8a/dC', 'RRR', '$2y$10$H7T/aI/FS/w9v6Hq6IibBuLGQ7XzgMOU9Uih4cuG57XtN/XrgN42a', 7),
(83, 'Â¿UN LIBRO DE SU PREFERENCIA?', '$2y$10$kJiaj6jit8oiOpxRK55/Fuhkq1dMSoRy3qYNZ0Q8UogcypyX9NCse', 'RRR', '$2y$10$yCCogvWmCy4qEY87f95bgOJ/LuxhRwHO8xAB3IzMbF2LDxh1XuxFW', 7),
(84, 'Â¿UN LIBRO DE SU PREFERENCIA?', '$2y$10$XcQKTFJNyNklqrY8GrJn9O1Esla2l1e1KJKpFtlOhqEGFzxbxP0/y', 'RRR', '$2y$10$OqjOYYJGKl633VIG6UDAZu2Q33GUawHqW2fHHxFAx/33HgV2jq.Mq', 7),
(85, 'Â¿UN LIBRO DE SU PREFERENCIA?', '$2y$10$iQFHrsWnRUIgxOA9pHibUOdrVHx/XuuflsdSNsi6ULGD0Bvf4sVlK', 'RRR', '$2y$10$20qEmfTB2BLaJCnyu9kYCurGe76GCpLNcQNsauMDg17rTPdhmUJf2', 7),
(86, 'Â¿UN LIBRO DE SU PREFERENCIA?', '$2y$10$pNWzKgA2n3arjH38ntbhr.8qjldYqbH1e0zetzCVzOV0.hPQYEVyq', 'RRR', '$2y$10$/cRatiJ5Vr3Bdij3IhRaUeQGLo6T17dNX4TK8/r8zfS1gtRNs50QG', 7),
(87, 'Â¿UN LIBRO DE SU PREFERENCIA?', '$2y$10$Y2pC/4M8BYw0AMkaNaRzL.uVTd1oa0aQqxJiUlAhM6/t.B30P9Dsu', 'RRR', '$2y$10$Y22Bq2R2ijFnyOkspiFLR.4PJkgxyN.ScUxK92NDE2TWL4SbGIJqG', 7),
(88, 'Â¿UN LIBRO DE SU PREFERENCIA?', '$2y$10$FPkwio62JGIBjFYVFsSF1.b9xyGZhEoiZwCRgS2MAtEvmwBBmT2/y', 'RRR', '$2y$10$.gbeorDQQDzR/327eS5vK.mRuE92g0fosfmhgfenvHXDJmOrJ/lua', 7),
(89, 'Â¿UN LIBRO DE SU PREFERENCIA?', '$2y$10$AUM.mmd2j/l72cfJjoB37O/R8HPtsN2GR6iv/I1hmEQSjCQVroPra', 'RRR', '$2y$10$8XCBhchPx2NV1Io31cOjUOqTxmk6C2F8yX6yCOz77tL7NuVcPZNm.', 7),
(90, 'selec', '$2y$10$85orwv2VWayxe/86Rhn9KeCJ42L6QQVC3Nwcy37CNR9GRfMEhQHCC', '', '$2y$10$M80UL7YtXlKjLwwPR2qsdOazwZAL3fqj0ydbo8ZMCkpM0Q/.rr8kK', 7),
(91, 'Â¿CUAL ES MI MAYOR LOGRO?', '$2y$10$bLXTXhLas0zYt6qI71hRAeU7nqgL2WQ9/Tp9Y66w9DVmM8EasxAuy', '', '$2y$10$fR96eQxbtP3EW8hf2rovjeEsoJDbNw6QoEYdH6pRSJQH81szOLiw2', 7),
(92, 'Â¿CUAL ES MI MAYOR LOGRO?', '$2y$10$PWF3G74xD3dqeIAF8HfNUOwF08pvi7.tJkgLzOUwLH5J6o6nSSFGS', '', '$2y$10$c3MAkfYA.v8y1rS4eYrxieD2Ehqoccv634iQKNM7ARjPc2XTkvnMq', 7),
(93, 'Â¿CUAL ES EL NOMBRE DE SU HÃ‰ROE CUANDO NIÃ‘O?', '$2y$10$XAX9qvMpBxmUlOg6IDZ0YuB1aC.7nkaqKTup3f0AIt2jsLlGVNdQe', 'HHH', '$2y$10$ykaQiursg1ACC3LlXgnetO/MgJtTddMOhX7r4q12Qxa82VwvQ76OO', 7),
(94, 'Â¿CUAL ES EL NOMBRE DE SU PRIMER NOVIA/NOVIO?', '$2y$10$xf5maU.e50apxGrceJb0j.xmn5rX1dVvu9eFOF6.bKinPyR8Dj.8i', 'HHH', '$2y$10$HPPX26dzzwFaJgDVXdYFzuv5o4Z3YtYYm.Dk5.UcpKMEbFaQDJkIi', 7),
(95, 'Â¿UN lUGAR SECRETO?', '$2y$10$Nuzn4QTJJqMhB2vLv.iuMOGiq1UhVyrMcOKpi.VJrrQRF5XfjxnXO', 'GG', '$2y$10$N.vft/RRq2D.FvaFSLUUpu7PkgOYqlWGKCbqK/TWQQ9LXQlAQXtyq', 7),
(96, 'Â¿UN lUGAR SECRETO?', '$2y$10$aqp.gh0BGciHgwI/J0tKT.veopb57iBpNqzuhf4COGVyjxfIDfQuG', 'GG', '$2y$10$lv415AWm3q4TCtaatFMoa.yzaNu.R8oIJMDWCulvwJ4nnyIw1xP6m', 7),
(97, 'Â¿UN lUGAR SECRETO?', '$2y$10$L.1F2LXaV1y/fa2z6QHwQe4BJ4TwM1yGIFWeWQhWPBYSPoYn.yHj6', 'GG', '$2y$10$m8K3Tim/0nwWjuzhWQmOne6CP3iF6euA0WisV7ffiKl28wLPP8.m6', 7),
(98, 'Â¿UN lUGAR SECRETO?', '$2y$10$9zu5gcJ09bRpPBl4..ZIs.cVIC3v3e2paIGjH/MNO5SZ876F96Z.e', 'GG', '$2y$10$ldKZDvUXyX5nMLcb870iaeDjlsX0u8IH.Rf5y8Z2ucv.67DQ1R4ly', 7),
(99, 'Â¿UN lUGAR SECRETO?', '$2y$10$Mz8/y7wazid2IVGxUOkNF.Y.BFNZDpVenh.0gtOOUFEuK5m0iEgie', 'GG', '$2y$10$Enp7y9BHp8Kgt19qakLJ9OswOAXw/O0EAQ1cO5HwIk2ujsbTftDOi', 7),
(100, 'Â¿UN lUGAR SECRETO?', '$2y$10$.lERZx4mn00Meq.InWjk/.Lz0csJ2FV8eh8u1Tgpi12Nakpv.LuiS', 'GG', '$2y$10$IXMz0Fm71UAaDbH6aLN6y.4ncIptidgi5Q2SxVRmir5r0yM3cz.sO', 7),
(101, 'Â¿UN lUGAR SECRETO?', '$2y$10$4pGmveNLlWD5/p4gJYZAZeqMaoej4CJCpf1fy/.WhavFdx8ubu2AC', 'GG', '$2y$10$UwMjGAOx2W7Y08m0VtF7COysZoZB3tyotTJWl.ZlfKaJqQAmRQmYy', 7),
(102, 'Â¿UN lUGAR SECRETO?', '$2y$10$8uaZX1QKa5jqbi9//w9UjeAsNDrYq20TAHJHQ.6u2PctsyeSV3tpe', 'GG', '$2y$10$EcfzfUn6awmu45ffy78Ru.eSxGzGr6qfB2VkRH7ilkZ6Ro8ZQjxxS', 7),
(103, 'Â¿UN lUGAR SECRETO?', '$2y$10$8IIK12S2jx0wKhq55A9cBudkmoC4yr7WxGZB/luctBrWbnx75DqHa', 'GG', '$2y$10$MzLQ.zNCN3/WskQuzwr03.9a/tDRjuXFzoOikTdTNIM1AvxCPY5NS', 7),
(104, 'Â¿UN lUGAR SECRETO?', '$2y$10$BEPhT9IrgnL7wOYQOBXNVeitGQUKO1WaZ.dbzHWmE3qU.KPPo8ZOy', 'GG', '$2y$10$/5EhVp4m5d8pU8mmj/q27uBBRmdYjg4Y94gxaw2DjBCT33uF3mfuy', 7),
(105, 'Â¿UN lUGAR SECRETO?', '$2y$10$kFkGx.y/cI.ceO64wI4L7O0O2cmiB3i5EZwn8Mav1gI/1uIrfvHlu', 'GG', '$2y$10$5iGkHQSH9p1NHGEGlrTpm.gsD1fscqHU19LZPk/fUy8hvma/R7PQm', 7),
(106, 'Â¿UN lUGAR SECRETO?', '$2y$10$/NFeqom0ZtWnUSAJcZ1Ldu8UsKbzyUC8y1JFtz4OvneJMwtoymmR6', 'GG', '$2y$10$oQ5sClfGVebsTeL9k7Y8hurOs7CaZnWDNBDXktVQOwLbUR/HTBwlW', 7),
(107, 'selec', '$2y$10$fYSWOYOXHMGpRVEcAdr1Heq88HAkzeMP.hZio0xN38PJvw9mGTq7a', '', '$2y$10$cU0dW5S.QXv8Inr0JE9a2OdMRhf7Ih6rQMFk.m2BsTle0ijhhfRnu', 7),
(108, 'selec', '$2y$10$F/Fs2Qp6aP.6I/6sZ53L3ePn4MRKrf83//PrU08dZUOMpiefTZbwK', '', '$2y$10$LSgTgMeouiUHajrNMbe56O25/L5eAtUDgesv8hqb0C7untPbH4Z1u', 7),
(109, 'selec', '$2y$10$whsQiKUfYp49gzdsb/b5DeztDSLxmEzmzcfzTh7532ixCnhvAEpmK', '', '$2y$10$sgW61Ah1d7ibCzjFXMAt8uxa.rCS7WF4/W5EhY1bXKc0gtNz3wNXK', 7),
(110, 'Â¿CUAL ES EL NOMBRE DE SU HÃ‰ROE CUANDO NIÃ‘O?', '$2y$10$HpitMD5srCRQOdjOSzzQ/OrVdjgi2IooRuo9vwi.zR.HnvczFMKle', 'BB', '$2y$10$VUn5gMoBZVs2h7OwplWYN..MD37K1fWFciVD09YCiJIkwEiqOrKL2', 7),
(111, 'Â¿CUAL ES EL NOMBRE DE SU HÃ‰ROE CUANDO NIÃ‘O?', '$2y$10$yQegKMT9y881pUIx6JgsOOaphaocMQwMRLo9tkT4V3VtdCIcD31Sy', 'BB', '$2y$10$qFEVtPt6wQsN7usmDw.Cd.g.sxcyiWv2.ZBtGtlX5jW.5DxO7eQbi', 7),
(112, 'Â¿CUAL ES EL NOMBRE DE SU HÃ‰ROE CUANDO NIÃ‘O?', '$2y$10$zfvP1Z3sIZGy/cmTOi6/geyfGoAKFBRlXLDNW1yJHI/3Mn/8J5O/W', 'BB', '$2y$10$0WnJYn7pnUEEBogjzeJV/OMSWjN4ntZUuJWQ4M0UNaEl.mAIE239i', 7),
(113, 'Â¿CUAL ES EL NOMBRE DE SU PRIMER COLEGIO?', '$2y$10$fhLsU9zfoFliWL9J64LsVe45Tqg5pB2Z6fXv1dMaizqpedJcCuQF.', 'GG', '$2y$10$n.GOcKL.25Pv571bowtlLOZowiL8IX0S3RMpzh6ZaGhpRwgTQs8Dm', 7),
(114, 'Â¿CUAL ES EL NOMBRE DE SU PRIMER COLEGIO?', '$2y$10$FhEj2NDcdwjb1gzZayoB6uvbZvpUCDeJYp23UtjBWNWpcsah12wSO', 'GG', '$2y$10$kVv4W3uxUqhocg5oA0UgrOXmHQsfWQBmWucFzWfRaUgpexJeC5Kvm', 7),
(115, 'Â¿CUAL ES EL NOMBRE DE SU PRIMER COLEGIO?', '$2y$10$zHeY7/EmDQ31Np4vD2.PsOV.8qzWi06D.fErAyLyG.kxAuMR2kMfK', 'GG', '$2y$10$O8zPNsJShhQnyyCxD5r5HuTvEv9UnKG8.f3Nnz46d50wfZKBlxfDW', 7),
(116, 'Â¿CUAL ES EL NOMBRE DE SU PRIMER COLEGIO?', '$2y$10$Ano2z81gdOYojMn2JvTR6e2iAHAdJoEma8Frg5wZsoloS6PypP0Q.', 'GG', '$2y$10$ow4eLt31fPjxyu9V2WE5nOmoc0VBygeo/VV.RC/TFe82sqUA7k.i2', 7),
(117, 'Â¿CUAL ES EL NOMBRE DE SU PRIMER COLEGIO?', '$2y$10$lv7Xh5xv7r3l46BO9P7PdePi85KzymYl.oO65szbQqkzqZ4.0tkDm', 'GG', '$2y$10$p1gKTg9ZNkj8fQs4Ivhu/uXyZZTZ/Iyzrg8O7mJjpY/klwVcoi7JS', 7),
(118, 'Â¿CUAL ES EL NOMBRE DE SU PRIMER COLEGIO?', '$2y$10$8tc9FdpAKx9yyEGIwDge0uNpBGSu3ineSK0sbcCLka/6Bfe4cSGeW', 'GG', '$2y$10$7gslJ/a.AkBkFwnOlyt/gOQvopxeVuXuZ3nZvDh5vg3sWAlOHchFi', 7),
(119, 'Â¿CUAL ES EL NOMBRE DE SU PRIMER COLEGIO?', '$2y$10$kH1h9jXCljtxS0ljQQZ/AOrE3wfppX.dWMBmKYYpVmp6Dvks1n/8q', 'GG', '$2y$10$Qks9taqzrk/eHox9PvctQuanX79D6OmbISYIelWCPckXXJQxLSed2', 7),
(120, 'Â¿CUAL ES EL NOMBRE DE SU PRIMER COLEGIO?', '$2y$10$jPLVUjOy6bTsnMQwFS1bMukqkjUvuZ8kzzv3/1oxfoEVqNEuXqXt2', 'GG', '$2y$10$XP1FtDBYPzZa.wGBj/lW7e0QA1xpjw3e1NjB/tRiUgiNd.zg5diO.', 7),
(121, 'Â¿CUAL ES EL NOMBRE DE SU PRIMER COLEGIO?', '$2y$10$SUW1GdmDiryZrWjJJKt1bOMasdAX61lcCWD/FmuoUvyADS1psvDpC', 'GG', '$2y$10$cfvQ9tqYHBJdyMxlpX6B6eoEsdlE6gd6.HyUuqJDJoM56L9vECDpm', 7),
(122, 'Â¿CUAL ES EL NOMBRE DE SU PRIMER COLEGIO?', '$2y$10$y03F./864eLS4Cx/QgFyAuBbah/Wco9kVv4XLItmKnhmVXxHvXBzG', 'GG', '$2y$10$CB7IjTv9ktG6xoHycTnMFu8lJOkzVnxPoPHmqaciHE/IqZguZeXIG', 7),
(123, 'Â¿CUAL ES EL NOMBRE DE SU PRIMER COLEGIO?', '$2y$10$zDqHSY0SUYj1Zr6dI9SJf.sGaIqOLzEA1tQX2mAprzDjjR5.9z4ki', 'GG', '$2y$10$0JHeuZbTPjVLsuZ0idzVqeOvT9lq35kRcMZ61Bi.S3SDoQAJwgZvu', 7),
(124, 'Â¿CUAL ES MI MAYOR LOGRO?', '$2y$10$QaERTFDj0rOAVOk41oenbuLebUFBlmydrPvDDNP6SZRfGY9E1BhHa', 'G', '$2y$10$yOJ6kIkUEo3iQjXGnfE2Y.8Yn.4uzW3BMF5NlEqeFqQ/Djkzu1OgC', 7),
(125, 'Â¿CUAL ES MI MAYOR LOGRO?', '$2y$10$wqOW5Hv95/TawrWFgqReN.NUVQJ6.TPe2UhxmAKTrDk0cgMAXc8w.', 'G', '$2y$10$2MpS5RrDwofAHGmqhp2BFOD9vLrYYMCWqE/YKhmR/7zJgM/Ex.HOW', 7),
(126, 'Â¿UN lUGAR SECRETO?', '$2y$10$w1wWKy/F32RZBwPkhSZu8Ou7xSnCWX7PNIzCE7hVVzzqGAo3BWb7u', 'G', '$2y$10$i3wGiJG9qmJp0cJzvKNT4uqjQRlGOi9ncFImMii3jF9PvrqrbsOfG', 7),
(127, 'Â¿CUAL ES MI MAYOR LOGRO?', '$2y$10$G2lT7gXxsvE/RAt2eoSiyeBjPuHmTsWsccr9Hw7zyeLekP3upM3R6', 'B', '$2y$10$UEdN8JwMlsPXnlzgzhnXFePlQAWARHiqSo16NDQjTlZNevFtlT2MG', 7),
(128, 'selec', '$2y$10$DpMqRPhzFVYZMe7kzqB10OTYkn.eL1SHdCQJdoy1XabO.IlQ72tBK', '', '$2y$10$ue4pZXJjuv8bvQvpFofI6e5N3pg/7OaCLYZ/DFSr0/SQTTPuW6MIu', 7),
(129, 'Â¿CANCIÃ“N PREFERIDA?', '$2y$10$eIV1olG9XxC1Q2wzs9ZQNOK/UHm3EOIPT9AKxZaG9g1Ip4ZHqiSWO', 'H', '$2y$10$hPPf0Elz5m/I268lKDH4TuFVSW7DZTx4kcFxKFQ8dXxaCdU/T8.Aa', 7),
(130, 'Â¿CUAL ES EL NOMBRE DE SU HÃ‰ROE CUANDO NIÃ‘O?', '$2y$10$HHjsf.OfhApZhHquWZiQre4E/C5q.fDQvBJoGGqwgr7cFt1qXn/fm', 'BBB', '$2y$10$KnUDnbnD1qVpPSigZaLqAe6.620Epi.qofayKuzrgCbBly6naW9I2', 7),
(131, 'Â¿CANCIÃ“N PREFERIDA?', '$2y$10$keM9H85qY4DxdigsbWQoweUwJq5sVIKYeZrXAaLs2dYgxAPaHK4Ne', 'NUMERO DE CASA', '$2y$10$KlRuzkNBEhr7vpIzeMHFUeddAJJMiU2kjJcUiNbZLfW6uTHMJZdH2', 9),
(132, 'Â¿CUAL ES SU FECHA DE GRADUACIÃ“N?(BACHILLERATO O UNIVERSITARIA)', '$2y$10$rky78p8rQapx4ESETAx4yu.KkaGg0ZLumREpKuJlMpKdmcgCBdN4G', 'H', '$2y$10$.506msUpHGUhSEjprqNexOuzvNat8GbNcbJBY0hCWfmU5r1OMPpWS', 10),
(133, 'Â¿CUAL ES SU FECHA DE GRADUACIÃ“N?(BACHILLERATO O UNIVERSITARIA)', '$2y$10$pKsZIw108iTYsWTDZkIAze75n7/q58OBf.MS2NakFkuIl6hkKxZle', 'NOMBRE DE MI MEJOR AMIGA', '$2y$10$sAfU0hfULSSlFh5oZoVXs.GdP6td4Pln6Oypk/dBQdU1kmZNWi1sa', 11),
(134, 'Â¿UN lUGAR SECRETO?', '$2y$10$mjnk3lJBboRCylW7ATM3KOnFaHeiOomW8R4gFhWIxodtahg7XLW3i', 'CON CUAL TE QUEDAS', '$2y$10$30sLqG4J9Cv582NFMxSJgelnNa.l/iC8qhfQeEceIQHKifsEngLGe', 14),
(135, 'Â¿CUAL ES EL NOMBRE DE SU PRIMER NOVIA/NOVIO?', '$2y$10$DVPSm6t8N7iNzJ5nFdDZ2ugdOhT2Jbreg4ExRR.mHft40WAmYAlOS', 'CON LAS 2', '$2y$10$0/n4YAIWcYCKV3jDEFbQwuWQQRunKOrgD0Pt7/yFxKVdAqfj8K5Rq', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE IF NOT EXISTS `proveedor` (
  `id_prov` int(11) NOT NULL AUTO_INCREMENT,
  `des_prov` char(100) COLLATE utf8_spanish_ci NOT NULL,
  `rif_prov` char(15) COLLATE utf8_spanish_ci NOT NULL,
  `status` char(1) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_prov`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=7 ;

--
-- Volcar la base de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_prov`, `des_prov`, `rif_prov`, `status`) VALUES
(1, 'COPOSA', '', '1'),
(2, 'ALCALDIA', '', '1'),
(3, 'BANCO OBRERO', '', '1'),
(4, 'PRUEBA154', 'J343', '1'),
(5, 'CORPOELEC', 'J-34534-0', '1'),
(6, 'IANCARINA', 'J-12345-1', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte`
--

CREATE TABLE IF NOT EXISTS `reporte` (
  `id_reporte` int(11) NOT NULL AUTO_INCREMENT,
  `nom_rep` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_rep` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `status` char(1) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_reporte`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=49 ;

--
-- Volcar la base de datos para la tabla `reporte`
--

INSERT INTO `reporte` (`id_reporte`, `nom_rep`, `tipo_rep`, `status`) VALUES
(1, 'DOCUMENTO DE RECEPCION', 'RECEPCION', '1'),
(2, 'LISTADO DE RECEPCIONES POR FECHA', 'RECEPCION', '1'),
(3, 'LISTADO DE RECEPCIONES POR PROVEEDOR', 'RECEPCION', '1'),
(4, 'LISTADO DE RECEPCIONES POR MOTIVO DE RECEPCION', 'RECEPCION', '1'),
(5, 'LISTADO DE RECEPCIONES POR CATEGORIA', 'RECEPCION', '1'),
(6, 'LISTADO DE ASIGNACION POR NUMERO', 'ASIGNACION', '1'),
(7, 'LISTADO DE ASIGNACION POR FECHA', 'ASIGNACION', '1'),
(8, 'LISTADO DE ASIGNACION POR DEPARTAMENTO', 'ASIGNACION', '1'),
(9, 'LISTADO DE ASIGNACION POR TIPO DE BIEN NACIONAL', 'ASIGNACION', '1'),
(10, 'LISTADO POR NUMERO DE DESINCORPORACION', 'DESINCORPORACION', '1'),
(11, 'LISTADO POR FECHA DE DESINCORPORACION', 'DESINCORPORACION', '1'),
(12, 'LISTADO POR MOTIVO DE DESINCORPORACION', 'DESINCORPORACION', '1'),
(13, 'LISTADO DE DESINCORPORACION POR TIPO DE BIEN NACIONAL', 'DESINCORPORACION', '1'),
(14, 'LISTADO POR NUMERO DE DEVOLUCION', 'DEVOLUCION', '1'),
(15, 'LISTADO POR FECHA DE DEVOLCION', 'DEVOLUCION', '1'),
(16, 'LISTADO POR DEPARTAMENTO', 'DEVOLUCION', '1'),
(17, 'LISTADO POR TIPO DE BIENES NACIONALES DEVUELTOS', 'DEVOLUCION', '1'),
(18, 'LISTADO BIENES NACIONALES', 'INVENTARIO', '1'),
(19, 'HISTORIAL DEL BIEN NACIONAL', 'INVENTARIO', '1'),
(20, 'LISTADO DE RECEPCIONES ANULADAS', 'RECEPCION', '1'),
(21, 'LISTADO DE RECEPCIONES ANULADAS POR FECHA', 'RECEPCION', '1'),
(22, 'LISTADO DE RECEPCIONES ANULADAS POR RESPONSABLE DE ANULACION', 'RECEPCION', '1'),
(23, 'LISTADO DE RECEPCIONES ANULADAS POR MOTIVO', 'RECEPCION', '1'),
(24, 'LISTADO DE ASIGNACIONES ANULADAS', 'ASIGNACION', '1'),
(25, 'LISTADO DE ASIGNACIONES ANULADAS POR FECHA', 'ASIGNACION', '1'),
(26, 'LISTADO DE ASIGNACIONES ANULADAS POR RESPONSABLE DE ANULACION', 'ASIGNACION', '1'),
(27, 'LISTADO DE ASIGNACIONES ANULADA POR MOTIVO', 'ASIGNACION', '1'),
(31, 'LISTADO DE DEVOLUCIONES ANULADAS', 'DEVOLUCION', '1'),
(32, 'LISTADO DE DEVOLCIONES ANULADAS POR FECHA', 'DEVOLUCION', '1'),
(33, 'LISTADO DE DEVOLUCIONES POR RESPONSABLE DE ANULACION', 'DEVOLUCION', '1'),
(34, 'LISTADO DE DEVOLUCIONES ANULADAS POR MOTIVO', 'DEVOLUCION', '1'),
(35, 'LISTADO DE DESINCORPORACIONES ANULADAS', 'DESINCORPORACION', '1'),
(36, 'LISTADO DE DESINCORPORACION ANULADAS POR FECHA', 'DESINCORPORACION', '1'),
(37, 'LISTADO DE DESINCORPORACIONES ANULADAS POR RESPONSABLE', 'DESINCORPORACION', '1'),
(38, 'LISTADO DE DESINCORPORACIONES ANULADAS POR MOTIVO', 'DESINCORPORACION', '1'),
(39, 'ESTADISTICAS POR FECHA', 'INVENTARIO', '1'),
(40, 'ESTADISTICAS DE MOVIMIENTOS', 'INVENTARIO', '1'),
(41, 'ASIGNACIONES AL DEPARTAMENTO', 'ASIGNACIONJD', '1'),
(42, 'ASIGNACIONES POR FECHA', 'ASIGNACIONJD', '1'),
(43, 'ASIGNACIONES POR TIPO DE BIEN', 'ASIGNACIONJD', '1'),
(44, 'DEVOLUCIONES POR DEPARTAMENTO', 'DEVOLUCIONJD', '1'),
(45, 'DEVOLUCIONES POR FECHA', 'DEVOLUCIONJD', '1'),
(46, 'DEVOLUCIONES POR TIPO DE BIEN', 'DEVOLUCIONJD', '1'),
(47, 'ASIGNACIONES POR MOTIVO', 'ASIGNACIONJD', '1'),
(48, 'DEVOLUCIONES POR MOTIVO', 'DEVOLUCIONJD', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE IF NOT EXISTS `sede` (
  `id_sed` int(11) NOT NULL AUTO_INCREMENT,
  `nom_sed` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cod_sed` char(7) COLLATE utf8_spanish_ci NOT NULL,
  `id_parroq` int(11) NOT NULL,
  `id_org` int(11) NOT NULL,
  `status` char(1) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_sed`),
  KEY `sede_parroquia_idx` (`id_parroq`),
  KEY `sede_organizacion_idx` (`id_org`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `sede`
--

INSERT INTO `sede` (`id_sed`, `nom_sed`, `cod_sed`, `id_parroq`, `id_org`, `status`) VALUES
(1, 'SUB DELEGACION ACARIGUA', '058', 1, 1, '1'),
(2, 'DELEGACION GUANARE', '057', 2, 1, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesionuser`
--

CREATE TABLE IF NOT EXISTS `sesionuser` (
  `id_sesionUser` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `dir_ip` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `dir_mac` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `fecha_fin` date NOT NULL,
  `hora_fin` time NOT NULL,
  `nom_pc` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nom_remoto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `so` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `navegador` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_sesionUser`),
  KEY `sesionUser_usuario_idx` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=132 ;

--
-- Volcar la base de datos para la tabla `sesionuser`
--

INSERT INTO `sesionuser` (`id_sesionUser`, `id_usuario`, `dir_ip`, `dir_mac`, `fecha_inicio`, `hora_inicio`, `fecha_fin`, `hora_fin`, `nom_pc`, `nom_remoto`, `so`, `navegador`) VALUES
(131, 1, '::1', 'e8-de-27-37-70-58', '2016-03-19', '16:25:47', '0000-00-00', '00:00:00', 'Rhod-PC', 'Rhod-PC', 'windows', 'Google Chrome');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sistema`
--

CREATE TABLE IF NOT EXISTS `sistema` (
  `id_sistema` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_sed` int(11) NOT NULL,
  `quienes_somos` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `mision` text COLLATE utf8_spanish_ci,
  `vision` text COLLATE utf8_spanish_ci,
  `obj_general` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `obj_especifico` varchar(2555) COLLATE utf8_spanish_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `max_intentos_access` tinyint(1) DEFAULT NULL,
  `max_intentos_preg` tinyint(1) DEFAULT NULL,
  `abreviatura_sede` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rif` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` char(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `correo` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ultimo_periodo` date DEFAULT NULL,
  PRIMARY KEY (`id_sistema`),
  KEY `sistema_usuario_idx` (`id_usuario`),
  KEY `sistema_sede_idx` (`id_sed`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `sistema`
--

INSERT INTO `sistema` (`id_sistema`, `id_usuario`, `id_sed`, `quienes_somos`, `mision`, `vision`, `obj_general`, `obj_especifico`, `logo`, `max_intentos_access`, `max_intentos_preg`, `abreviatura_sede`, `rif`, `telefono`, `direccion`, `correo`, `ultimo_periodo`) VALUES
(4, 1, 2, 'A FINALES DEL SIGLO XX, EL PAÃS SE VE INMERSO EN UN PROCESO DE REVOLUCIÃ“N DEMOCRÃTICA, PARTICIPATIVA Y PROTAGÃ“NICA ORIENTADA EN EL PRINCIPIO DE CORRESPONSABILIDAD DE LOS CIUDADANOS, LIDERADO POR EL COMANDANTE EN JEFE HUGO RAFAEL CHÃVEZ FRÃAS, QUIEN ', 'EL CUERPO DE INVESTIGACIONES CIENTÃFICAS, PENALES Y CRIMINALÃSTICAS ES UNA INSTITUCIÃ“N QUE GARANTIZA LA EFICIENCIA EN LA INVESTIGACIÃ“N DEL DELITO, MEDIANTE SU DETERMINACIÃ“N CIENTÃFICA, ASEGURANDO EL EJERCICIO DE LA ACCIÃ“N PENAL QUE CONDUZCA A UNA SANA ADMINISTRACIÃ“N DE JUSTICIA.', 'SER LA INSTITUCIÃ“N INDISPENSABLE, POR SU RECONOCIDA CAPACIDAD CIENTÃFICA Y MÃXIMA EXCELENCIA DE SUS RECURSOS, CON LA FINALIDAD DE ALCANZAR EL MÃS ALTO NIVEL DE CREDIBILIDAD NACIONAL E INTERNACIONAL EN LA INVESTIGACIÃ“N DEL FENÃ“MENO DELICTIVO ORGANIZADO Y CRIMINALIDAD VIOLENTA.', 'OPTIMIZAR LAS ACCIONES DE INVESTIGACIÃ“N CRIMINAL TENDENTES A LOGRAR EL ESCLARECIMIENTO DE LOS HECHOS DELICTIVOS. CAPACITAR EL CAPITAL HUMANO INTEGRADO A LA INSTITUCIÃ“N, CON EL FIN DE ALCANZAR UN ALTO NIVEL DE EFICACIA Y EFICIENCIA.', 'ELEVAR EL SENTIDO DE PERTENENCIA INSTITUCIONAL, VINCULADO A LA DINÃMICA CIENTÃFICA Y TECNOLÃ“GICA, A TRAVÃ‰S DE LA PRÃCTICA DE LOS VALORES DEL CICPC.\n\nGARANTIZAR LAS ACCIONES Y MEDIOS TENDENTES A MEJORAR LA CALIDAD DE VIDA DE SUS MIEMBROS, EN EL ASPECTO EDUCATIVO, CULTURAL, DEPORTIVO, SOCIAL Y ECONÃ“MICO.', NULL, NULL, NULL, 'CICPC', 'J-2323-0', '02555-343434', 'AV 5 CALLE 6 ', 'CICPCAGUANARE600@GMAIL.COM', '2014-12-31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `motivo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `status` char(1) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_status`),
  KEY `status_usuario_idx` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=15 ;

--
-- Volcar la base de datos para la tabla `status`
--

INSERT INTO `status` (`id_status`, `id_usuario`, `motivo`, `status`) VALUES
(1, 1, 'MAXIMO DE INTENTOS FALLIDOS PREGUNTA DE SEGURIDAD', 'D'),
(2, 2, 'DISPONOBLE', 'D'),
(3, 3, 'DISPONIBLE', 'D'),
(4, 4, '', 'D'),
(5, 5, '', 'B'),
(6, 6, '', 'B'),
(7, 7, 'DISPONIBLE', 'N'),
(8, 8, 'NUEVO', 'N'),
(9, 9, '', 'B'),
(10, 10, 'DISPONIBLE', 'D'),
(11, 11, 'DISPONIBLE', 'D'),
(12, 12, 'NUEVO', 'N'),
(13, 13, 'DISPONIBLE', 'D'),
(14, 14, 'DISPONIBLE', 'D');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_bien`
--

CREATE TABLE IF NOT EXISTS `tipo_bien` (
  `id_tbien` int(11) NOT NULL AUTO_INCREMENT,
  `cod_tbien` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `des_tbien` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `status` char(1) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_tbien`),
  KEY `tipo_bien_categoria_idx` (`id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `tipo_bien`
--

INSERT INTO `tipo_bien` (`id_tbien`, `cod_tbien`, `des_tbien`, `id_categoria`, `status`) VALUES
(1, '20010', 'COMPUTADORES', 2, '1'),
(2, '20010', 'TELEFONOS', 2, '1'),
(3, '20020', 'FILTROS', 1, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_movimiento`
--

CREATE TABLE IF NOT EXISTS `tipo_movimiento` (
  `id_tipo_mov` int(11) NOT NULL AUTO_INCREMENT,
  `cod_tipo_mov` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `nom_tipo_mov` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_mov` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `status` char(1) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_tipo_mov`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `tipo_movimiento`
--

INSERT INTO `tipo_movimiento` (`id_tipo_mov`, `cod_tipo_mov`, `nom_tipo_mov`, `tipo_mov`, `status`) VALUES
(1, '21', 'INCORPORACION DE BIEN', '1', '1'),
(2, '21', 'INCORPORACION DE BIEN', '2', '1'),
(3, '11', 'DEVOLUCION', '3', '1'),
(4, '51', 'DETERIORO', '4', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `login` char(12) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `pass_anterior` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `intentos` tinyint(1) NOT NULL,
  `intentos_preg1` tinyint(1) NOT NULL,
  `intentos_preg2` tinyint(1) NOT NULL,
  `fecha_creacion` date NOT NULL,
  `hora_logeo` time NOT NULL,
  `fecha_logeo` date NOT NULL,
  `id_perfil` int(11) NOT NULL,
  `id_per` int(11) NOT NULL,
  `sesion_iniciada` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `status_user` char(1) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `usuario_personal1_idx` (`id_per`),
  KEY `usuario_perfil_idx` (`id_perfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=15 ;

--
-- Volcar la base de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `login`, `pass`, `pass_anterior`, `intentos`, `intentos_preg1`, `intentos_preg2`, `fecha_creacion`, `hora_logeo`, `fecha_logeo`, `id_perfil`, `id_per`, `sesion_iniciada`, `status_user`) VALUES
(1, '23052336', '23052336', '$2y$10$9u.GqHmrTjD0J4F8EAV.yuPK4weTSTEtJ1K8cjSRB7iH0pVIVL8NK', 0, 0, 0, '2015-10-10', '16:25:48', '2016-03-19', 1, 2, '1', '1'),
(2, '17650483', '$2y$10$AZrxtkqMiZsCnim2GWQvOO58FIG3So3U1j1uC6WR5ks3oFDMRUZ9u', '$2y$10$AZrxtkqMiZsCnim2GWQvOO58FIG3So3U1j1uC6WR5ks3oFDMRUZ9u', 0, 0, 0, '0000-00-00', '05:16:41', '2015-05-22', 2, 3, '0', '1'),
(3, '24019450', '$2y$10$uE2I3tiZaouqKB4UbPodz.Ttx.r412v69AUVM28QlUBUwcAew3dxO', '$2y$10$uE2I3tiZaouqKB4UbPodz.Ttx.r412v69AUVM28QlUBUwcAew3dxO', 0, 0, 0, '0000-00-00', '05:18:56', '2015-05-22', 3, 4, '0', '1'),
(4, '5949569', '$2y$10$qLSAOrJB3beHKEb1mMnIsuQZJML/RLv7W27yNL.1rj4KilzTi7uOm', '$2y$10$qLSAOrJB3beHKEb1mMnIsuQZJML/RLv7W27yNL.1rj4KilzTi7uOm', 0, 0, 0, '0000-00-00', '01:56:07', '2015-05-17', 3, 5, '0', '1'),
(5, '12566019', '$2y$10$Iuk/BxydNJnV4xPkEpCoP.GkW2FUNYBqsZILatWeHN.Tjekh9Mylu', '$2y$10$Iuk/BxydNJnV4xPkEpCoP.GkW2FUNYBqsZILatWeHN.Tjekh9Mylu', 0, 0, 0, '0000-00-00', '14:15:43', '2015-05-13', 3, 1, '0', '1'),
(6, 'andres', '$2y$10$dLf1QQJ38NNIXH8LKNHdZu/hbDobjq5Iploqk7jmUJEYLltbtqVwK', '$2y$10$dLf1QQJ38NNIXH8LKNHdZu/hbDobjq5Iploqk7jmUJEYLltbtqVwK', 0, 0, 0, '0000-00-00', '02:54:35', '2015-05-17', 3, 6, '0', '1'),
(7, '1234567', '$2y$10$arjVvW5fkYUbLAfWqDtoeunxdv4Rbt2fGbJjXiFJ38IwlGdzVNrFy', '$2y$10$arjVvW5fkYUbLAfWqDtoeunxdv4Rbt2fGbJjXiFJ38IwlGdzVNrFy', 0, 0, 0, '0000-00-00', '12:56:33', '2015-05-17', 3, 7, '0', '1'),
(8, '12345678', '$2y$10$uj9WSzIvbXYR6vDWv/bkY.1q6yCUtBHnk5v9.IP9bezIPu3dq0hR.', '$2y$10$uj9WSzIvbXYR6vDWv/bkY.1q6yCUtBHnk5v9.IP9bezIPu3dq0hR.', 0, 0, 0, '0000-00-00', '21:24:00', '2015-05-17', 3, 8, '0', '1'),
(9, '50505050', '$2y$10$G0O5cXEJWxeIQsL9wuVLAeZU6jC0bOqGLjxn6JtLp4VEDQ9GODvzu', '$2y$10$PS5NryFIyhxrTRqbpKGijOEpiEaa1eTrm4AC8YZek4/x4On9CdGj2', 0, 0, 0, '0000-00-00', '15:15:57', '2015-05-17', 3, 9, '0', '1'),
(10, '5555555', '1234', '1234', 0, 0, 0, '0000-00-00', '16:57:32', '2015-05-17', 3, 10, '0', '1'),
(11, '12264598', '$2y$10$WJxXf9BHpRwmLZFDqKJb8.dxJdj.ywfHMDfj4hsZL4FqieJ.TGus2', '$2y$10$biL.lda0oV.3VZBqydaRo.1X.MB3xO7zzV74MkCpOAyeQ2a/xuLiK', 0, 0, 0, '0000-00-00', '17:22:36', '2015-05-17', 2, 11, '0', '1'),
(12, '11111111', '$2y$10$3fPxnswQUAIhyXmYQNp2O.PUQ1v1VGKX7NVzUhxI0kwauLsTqI99K', '$2y$10$3fPxnswQUAIhyXmYQNp2O.PUQ1v1VGKX7NVzUhxI0kwauLsTqI99K', 0, 0, 0, '2015-05-22', '11:54:29', '2015-05-22', 3, 12, '0', '1'),
(13, '585858', '$2y$10$rADpyIyFAjLVtUBCdfjpeOa8xaJp3S5UyZju9DIBmrh26h0O8OK5G', '$2y$10$xMpRZ9UMFWNfPdp8MiR2muQc0zTYW7NMyzC80zBbTS4zWZBYerbLu', 0, 0, 0, '2015-05-23', '01:41:31', '2015-05-23', 2, 13, '0', '1'),
(14, '565656', '$2y$10$dxfSPQA0SXk7Y9SHnfX1XOMlE7XVXwIRlfWF93O50MMDsfriPi7FK', '$2y$10$RKASM4NNk/PnQ1zFSInsyOGC/4sZlsGchpvIyqvEfhM6YC/wftv.C', 0, 0, 0, '2015-05-23', '01:36:15', '2015-05-23', 3, 14, '0', '1');

--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `bien_nacional`
--
ALTER TABLE `bien_nacional`
  ADD CONSTRAINT `bien_nacional_condicion` FOREIGN KEY (`id_cond`) REFERENCES `condicion` (`id_cond`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `bien_nacional_marca` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id_marca`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `bien_nacional_tipo_bien` FOREIGN KEY (`id_tbien`) REFERENCES `tipo_bien` (`id_tbien`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `departamento_sede` FOREIGN KEY (`id_sed`) REFERENCES `sede` (`id_sed`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_movimiento`
--
ALTER TABLE `detalle_movimiento`
  ADD CONSTRAINT `detalle_movimiento_bien_nacional` FOREIGN KEY (`id_bien`) REFERENCES `bien_nacional` (`id_bien`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `detalle_movimiento_movimiento` FOREIGN KEY (`id_mov`) REFERENCES `movimiento` (`id_mov`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD CONSTRAINT `movimiento_departamento` FOREIGN KEY (`id_dep`) REFERENCES `departamento` (`id_dep`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `movimiento_motivo_movimiento` FOREIGN KEY (`id_motivo_mov`) REFERENCES `motivo_movimiento` (`id_motivo_mov`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `movimiento_periodo` FOREIGN KEY (`id_periodo`) REFERENCES `periodo` (`id_periodo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `movimiento_personal` FOREIGN KEY (`id_per`) REFERENCES `personal` (`id_per`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `movimiento_proveedor` FOREIGN KEY (`id_prov`) REFERENCES `proveedor` (`id_prov`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `movimiento_tipo_movimiento` FOREIGN KEY (`id_tipo_mov`) REFERENCES `tipo_movimiento` (`id_tipo_mov`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `movimiento_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `municipio_estado` FOREIGN KEY (`id_est`) REFERENCES `estado` (`id_est`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `parroquia`
--
ALTER TABLE `parroquia`
  ADD CONSTRAINT `parroquia_municipio` FOREIGN KEY (`id_mun`) REFERENCES `municipio` (`id_mun`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `personal_cargo` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_car`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `personal_departamento` FOREIGN KEY (`id_dep`) REFERENCES `departamento` (`id_dep`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `preguntaseguridad`
--
ALTER TABLE `preguntaseguridad`
  ADD CONSTRAINT `preguntaSeguridad_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sede`
--
ALTER TABLE `sede`
  ADD CONSTRAINT `sede_organizacion` FOREIGN KEY (`id_org`) REFERENCES `organizacion` (`id_org`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sede_parroquia` FOREIGN KEY (`id_parroq`) REFERENCES `parroquia` (`id_parroq`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sesionuser`
--
ALTER TABLE `sesionuser`
  ADD CONSTRAINT `sesionUser_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sistema`
--
ALTER TABLE `sistema`
  ADD CONSTRAINT `sistema_sede` FOREIGN KEY (`id_sed`) REFERENCES `sede` (`id_sed`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sistema_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `status`
--
ALTER TABLE `status`
  ADD CONSTRAINT `status_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tipo_bien`
--
ALTER TABLE `tipo_bien`
  ADD CONSTRAINT `tipo_bien_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_perfil` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`idperfil`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuario_personal1` FOREIGN KEY (`id_per`) REFERENCES `personal` (`id_per`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
