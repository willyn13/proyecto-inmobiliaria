-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-10-2015 a las 16:32:37
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

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

CREATE TABLE IF NOT EXISTS `alquileres` (
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

CREATE TABLE IF NOT EXISTS `clientes` (
  `dni_cliente` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE IF NOT EXISTS `imagenes` (
  `idcasa` int(3) NOT NULL,
  `direcion_imagen` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmuebles`
--

CREATE TABLE IF NOT EXISTS `inmuebles` (
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidades`
--

CREATE TABLE IF NOT EXISTS `localidades` (
  `idlocalidad` int(3) NOT NULL,
  `idprovincia` int(3) NOT NULL,
  `localidad` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE IF NOT EXISTS `provincias` (
  `idprovincia` int(3) NOT NULL,
  `provincia` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `dni_usuario` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `idzona` int(3) NOT NULL,
  `nombre` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `cargo` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE IF NOT EXISTS `ventas` (
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
  ADD KEY `dni_propietario` (`dni_propietario`);

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
  MODIFY `idcasa` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `localidades`
--
ALTER TABLE `localidades`
  MODIFY `idlocalidad` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
  MODIFY `idprovincia` int(3) NOT NULL AUTO_INCREMENT;
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
