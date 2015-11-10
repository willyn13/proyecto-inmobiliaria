-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2015 a las 15:05:39
-- Versión del servidor: 10.0.17-MariaDB
-- Versión de PHP: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inmobiliaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alquileres`
--

CREATE TABLE `alquileres` (
  `idcasa` int(3) NOT NULL,
  `dni_inquilino` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `dni_usuario` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `precio_final` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `dni_cliente` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`dni_cliente`, `nombre`, `apellidos`, `telefono`, `email`) VALUES
('23453676A', 'Maria', 'CarrascoPedroche', '625986523', 'mariacarrascopedroche@hotmail.com'),
('34569674B', 'Jaime', 'Velasco Martin', '654987421', 'jaimevelascomartin@hotmail.com'),
('43257452D', 'Alfredo', 'Marin Bargas', '675873456', 'alfredomarinbargas@hotmail.com'),
('65728475L', 'Claudia', 'Millan Torres', '698347623', 'claudiamillantorres@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `idcasa` int(3) NOT NULL,
  `direcion_imagen` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmuebles`
--

CREATE TABLE `inmuebles` (
  `idcasa` int(3) NOT NULL,
  `idlocalidad` int(3) NOT NULL,
  `dni_propietario` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `venta` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `alquiler` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `habitaciones` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `m2` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `banios` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `terraza` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `trastero` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `piscina` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `garaje` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `precio_venta` int(8) NOT NULL,
  `precio_alquiler` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `inmuebles`
--

INSERT INTO `inmuebles` (`idcasa`, `idlocalidad`, `dni_propietario`, `venta`, `alquiler`, `habitaciones`, `m2`, `banios`, `terraza`, `trastero`, `piscina`, `garaje`, `direccion`, `precio_venta`, `precio_alquiler`) VALUES
(1, 1, '23453676A', 'S', 'S', '3', '123', '3', 'S', 'N', 'N', 'S', 'C/Uruguay Nº23 4ºC', 189, 750),
(2, 4, '34569674B', 'N', 'S', '3', '87', '1', 'N', 'N', 'N', 'N', 'C/Bolivia Nº2 7ªA', 0, 650),
(3, 7, '43257452D', 'S', 'N', '4', '104', '2', 'S', 'S', 'S', 'S', 'C/Peru Nª47 11ªB', 245, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidades`
--

CREATE TABLE `localidades` (
  `idlocalidad` int(3) NOT NULL,
  `idprovincia` int(3) NOT NULL,
  `localidad` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `localidades`
--

INSERT INTO `localidades` (`idlocalidad`, `idprovincia`, `localidad`) VALUES
(1, 1, 'Coslada'),
(2, 1, 'San Fernando de Henares'),
(3, 2, 'Hospitalet de Llobregat'),
(4, 2, 'Badalona'),
(5, 3, 'Benidorm'),
(6, 3, 'Denia'),
(7, 4, 'San Sebastián'),
(8, 4, 'Irún '),
(9, 5, 'Marbella'),
(10, 5, 'Mijas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `idprovincia` int(3) NOT NULL,
  `provincia` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`idprovincia`, `provincia`) VALUES
(1, 'Madrid'),
(2, 'Barcelona'),
(3, 'Valencia'),
(4, 'Guipuzcoa'),
(5, 'Malaga');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `dni_usuario` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `idzona` int(3) NOT NULL,
  `nombre` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `cargo` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`dni_usuario`, `idzona`, `nombre`, `apellidos`, `cargo`, `password`) VALUES
('12345678G', 2, 'Guillermo', 'Domínguez Garrido', 'Comercial', '1234'),
('12345678J', 3, 'Javier', 'Rodríguez Pellejero', 'Comercial', '1234'),
('12345678S', 1, 'Sebastián', 'Horcajo Ortega', 'admin', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `idcasa` int(3) NOT NULL,
  `dni_comprador` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `dni_usuario` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_compra` date NOT NULL,
  `precio_final` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alquileres`
--
ALTER TABLE `alquileres`
  ADD PRIMARY KEY (`idcasa`,`fecha_inicio`,`fecha_fin`),
  ADD KEY `dni_inquilino` (`dni_inquilino`),
  ADD KEY `dni_usuario` (`dni_usuario`),
  ADD KEY `idcasa` (`idcasa`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`dni_cliente`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD KEY `idcasa` (`idcasa`);

--
-- Indices de la tabla `inmuebles`
--
ALTER TABLE `inmuebles`
  ADD PRIMARY KEY (`idcasa`),
  ADD KEY `idlocalidad` (`idlocalidad`),
  ADD KEY `dni_propietario` (`dni_propietario`),
  ADD KEY `idlocalidad_2` (`idlocalidad`),
  ADD KEY `idlocalidad_3` (`idlocalidad`);

--
-- Indices de la tabla `localidades`
--
ALTER TABLE `localidades`
  ADD PRIMARY KEY (`idlocalidad`),
  ADD KEY `idprovincia` (`idprovincia`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`idprovincia`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`dni_usuario`),
  ADD KEY `idlocalidad` (`idzona`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`idcasa`,`dni_comprador`,`fecha_compra`),
  ADD KEY `dni_comprador` (`dni_comprador`),
  ADD KEY `dni_usuario` (`dni_usuario`),
  ADD KEY `idcasa` (`idcasa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `inmuebles`
--
ALTER TABLE `inmuebles`
  MODIFY `idcasa` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `localidades`
--
ALTER TABLE `localidades`
  MODIFY `idlocalidad` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
  MODIFY `idprovincia` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alquileres`
--
ALTER TABLE `alquileres`
  ADD CONSTRAINT `alquileres_ibfk_1` FOREIGN KEY (`idcasa`) REFERENCES `inmuebles` (`idcasa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alquileres_ibfk_2` FOREIGN KEY (`dni_inquilino`) REFERENCES `clientes` (`dni_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alquileres_ibfk_3` FOREIGN KEY (`dni_usuario`) REFERENCES `usuarios` (`dni_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `imagenes_ibfk_1` FOREIGN KEY (`idcasa`) REFERENCES `inmuebles` (`idcasa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `inmuebles`
--
ALTER TABLE `inmuebles`
  ADD CONSTRAINT `inmuebles_ibfk_1` FOREIGN KEY (`dni_propietario`) REFERENCES `clientes` (`dni_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inmuebles_ibfk_2` FOREIGN KEY (`idlocalidad`) REFERENCES `localidades` (`idlocalidad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `localidades`
--
ALTER TABLE `localidades`
  ADD CONSTRAINT `localidades_ibfk_1` FOREIGN KEY (`idprovincia`) REFERENCES `provincias` (`idprovincia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idzona`) REFERENCES `localidades` (`idlocalidad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`idcasa`) REFERENCES `inmuebles` (`idcasa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`dni_comprador`) REFERENCES `clientes` (`dni_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ventas_ibfk_3` FOREIGN KEY (`dni_usuario`) REFERENCES `usuarios` (`dni_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
