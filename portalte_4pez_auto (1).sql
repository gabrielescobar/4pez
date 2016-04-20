-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tiempo de generación: 20-04-2016 a las 14:38:03
-- Versión del servidor: 5.6.29
-- Versión de PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `portalte_4pez_auto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p4_cliente`
--

CREATE TABLE `p4_cliente` (
  `id` int(11) NOT NULL,
  `codigo` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `nombre` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `apellido_paterno` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `apellido_materno` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `rut` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `mail_contacto` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tipo_pago` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `salt` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `estado_cuenta` varchar(256) CHARACTER SET ucs2 COLLATE ucs2_spanish_ci NOT NULL,
  `fecha_registro` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_modificacion` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `p4_cliente`
--

INSERT INTO `p4_cliente` (`id`, `codigo`, `id_empresa`, `nombre`, `apellido_paterno`, `apellido_materno`, `rut`, `mail_contacto`, `telefono`, `tipo_pago`, `salt`, `password`, `estado_cuenta`, `fecha_registro`, `fecha_modificacion`) VALUES
(33, '1368ebddb', NULL, 'Bradley', '85158', '9758', 'kFAbHpoz', 'lucas2d44@gmail.com', 'QqzkQxofZjLYqNcAXxC', '', 'a16e32a6d', '7c174440fa069f7903786e34eb1f59f94697cab7', 'inactiva', '2015-10-21 20:56:41', ''),
(35, 'bdf7d9fbd', NULL, 'Miguel', 'Maura', 'Herbozo', '14548383-2', 'miguel.maura@airmatek.com', '12345678', '', 'c691f9f08', 'b53218c2a9ba07c70a2c84260760bd0891552867', 'inactiva', '2015-11-16 06:46:51', ''),
(32, 'e86d49811', NULL, 'Igal', 'Rovner', 'Berant', '15376743-2', 'igalrovner@gmail.com', '93189811', '', '1529a1e0f', '4c1a644dd7790008e2eb45762d6eb4cd48855178', 'inactiva', '2015-10-02 15:28:13', ''),
(38, 'c50c4069a', NULL, 'Alexander', 'Blancheteau', 'Vera', '23966048-7', 'alexander.b@airmatek.com', '72920666', '', '28cde9653', '335f3d04b12da26b3955d7a9c7a12b2bb5d4a9cc', 'inactiva', '2016-02-19 12:05:34', ''),
(36, '7eddf33ce', NULL, 'jaimar', 'rocca', 'fuentes', '25019058-1', 'jaimar.rocca@gmail.com', '71926075', '', '602b3f527', 'a899ba9c3c06567491c3050d7bf9e7de9965e9d5', 'inactiva', '2016-01-07 07:02:04', ''),
(37, '39874afd2', NULL, 'Mark', '59444', '21250', 'cQEhQThhUUZNDvNmop', 'mark357177@hotmail.com', 'rMMrlfRQfRHQSgwrX', '', '7c1526431', '887022d05227ae7cd2f4fc5b26abcab7d3288d69', 'inactiva', '2016-01-30 06:03:24', ''),
(39, '42068c18d', NULL, 'Jonathan', 'González', 'Michelena', '88888888-8', 'jon@jon.com', '789456', '', '60eb441ea', '02d374cdb7296f8748e00c332112acc32c5b81eb', 'inactiva', '2016-03-07 13:57:56', ''),
(40, 'c690941ee', NULL, 'ewqe', 'wqe', 'qwe', '15085396-6', 'gabo9690@gmail.com', '4324324', '', '434188fd2', '7e940423fc3f1f495eb78ba3f3d3046437b33c43', 'inactiva', '2016-04-04 10:38:07', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p4_contenido`
--

CREATE TABLE `p4_contenido` (
  `id` int(11) NOT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `link` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `logo` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `template` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `orden` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_productos` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `palabras_claves` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `aviso` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `monto` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tipo_formulario` int(11) NOT NULL,
  `estado` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_registro` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_modificacion` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `p4_contenido`
--

INSERT INTO `p4_contenido` (`id`, `id_empresa`, `link`, `logo`, `template`, `orden`, `descripcion_productos`, `palabras_claves`, `aviso`, `monto`, `tipo_formulario`, `estado`, `fecha_registro`, `fecha_modificacion`) VALUES
(32, 14, 'Airmatek', '', '6', '5', 'Consultoría de Marketing Digital<br>El marketing digital es la aplicación de las estrategias de comercialización llevadas a cabo en los medios digitales. Todas las técnicas del mundo off-line son imitadas y traducidas a un nuevo mundo, el mundo online. En ', '', '', 'Necesito una orientacion', 2, 'pendiente', '2016-02-17 07:10:27', '2016-02-17 07:45:46'),
(37, 20, 'querty', '3520160309072021.png', '14', '4', 'Aqui están mis productos', '', '', 'Necesito una orientacion', 2, 'pendiente', '2016-03-09 07:20:21', '2016-03-16 07:41:59'),
(36, 23, 'mipagina', '3920160307135928.JPG', '1', '1', 'Esta es mi pagina', '', '', 'Necesito una orientacion', 1, 'pendiente', '2016-03-07 13:59:28', '2016-03-07 14:01:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p4_empresa`
--

CREATE TABLE `p4_empresa` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `rut` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `razon_social` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `mail_contacto` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `telefono2` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_registro` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_modificacion` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `p4_empresa`
--

INSERT INTO `p4_empresa` (`id`, `id_cliente`, `nombre`, `rut`, `razon_social`, `direccion`, `mail_contacto`, `telefono`, `telefono2`, `fecha_registro`, `fecha_modificacion`) VALUES
(20, 35, 'Empresa Pepito', '14548383-2', 'mmm', 'adasd', 'mimail@yo.com', '11111111', '', '2016-01-06 08:13:16', '2016-01-08 08:48:21'),
(21, 36, 'Airmatek', '25019058-1', 'Airmatek', 'tobalaba', 'jaimar.rocca@airmatek.com', '71926075', '', '2016-01-07 07:26:50', ''),
(14, 32, 'Airmatek', '76080565-3', 'Marketing y Tecnología AIR', 'Nueva Providencia 1860 of 162', 'info@airmatek.com', '22330590', '', '2015-10-02 15:34:00', ''),
(22, 38, 'Airmatek', '23966048-7', 'Tecnologia Air', 'Providencia 1860', 'alexander.b@airmatek.com', '72920666', '', '2016-02-19 12:08:25', ''),
(23, 39, 'PruebaEmpresa', '88888888-8', 'dfdsfds', 'fsdlkfjs', 'jon@jon.com', '123456', '', '2016-03-07 13:59:15', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p4_formulario`
--

CREATE TABLE `p4_formulario` (
  `id` int(11) NOT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `tipo_form` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `rut` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `mensaje` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_registro` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_modificacion` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `p4_formulario`
--

INSERT INTO `p4_formulario` (`id`, `id_empresa`, `tipo_form`, `nombre`, `rut`, `email`, `telefono`, `direccion`, `mensaje`, `fecha_registro`, `fecha_modificacion`) VALUES
(16, 20, '', '', '', 'miguel.maura@airmatek.com', '', '', 'asdadadasdasdasd', '2016-01-11 09:23:23', ''),
(15, 20, '', 'Juan Perez', '', 'miguel.maura@airmatek.com', '12345678', '', 'Test', '2016-01-07 08:02:21', ''),
(14, 7, '', 'miguel', '', 'q@a.cl', '123654', '', 'Quiero tus servicios ahora!', '2015-04-28 14:16:19', ''),
(13, 6, '', '', '', 'mi email', '', '', 'aqui lo que necesito', '2015-04-24 16:39:57', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p4_intranet`
--

CREATE TABLE `p4_intranet` (
  `id` int(11) NOT NULL,
  `nombre` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `apellido_paterno` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `apellido_materno` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `rut` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `mail` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `salt` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_registro` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `p4_intranet`
--

INSERT INTO `p4_intranet` (`id`, `nombre`, `apellido_paterno`, `apellido_materno`, `rut`, `mail`, `salt`, `password`, `fecha_registro`) VALUES
(1, 'Miguel', 'Maura', '', '14548383-2', '', '41136ce67', '0ce00f6fd6a0741e661f501d8fd2e42851ad25a9', ''),
(2, 'Airmatek', 'Airmatek', 'Airmatek', 'Airmatek', '', '7cdb75015', '1ff6e8bc216bdb326948e8a06a73b40ee09dd3cc', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `p4_cliente`
--
ALTER TABLE `p4_cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `p4_contenido`
--
ALTER TABLE `p4_contenido`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `p4_empresa`
--
ALTER TABLE `p4_empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `p4_formulario`
--
ALTER TABLE `p4_formulario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `p4_intranet`
--
ALTER TABLE `p4_intranet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `p4_cliente`
--
ALTER TABLE `p4_cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT de la tabla `p4_contenido`
--
ALTER TABLE `p4_contenido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT de la tabla `p4_empresa`
--
ALTER TABLE `p4_empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `p4_formulario`
--
ALTER TABLE `p4_formulario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `p4_intranet`
--
ALTER TABLE `p4_intranet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
