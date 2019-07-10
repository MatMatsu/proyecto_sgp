-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-07-2019 a las 02:09:54
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_sgp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `despacho_pzas`
--

CREATE TABLE `despacho_pzas` (
  `id_despacho` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `cant_despacho` int(11) NOT NULL,
  `fecha_despacho` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_pzas`
--

CREATE TABLE `pedido_pzas` (
  `id_pedido` int(11) NOT NULL,
  `cod_pza` varchar(10) NOT NULL,
  `cant_pedido` int(11) NOT NULL,
  `fecha_pedido` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `piezas`
--

CREATE TABLE `piezas` (
  `cod_pza` varchar(10) NOT NULL,
  `tipo_pza` varchar(50) NOT NULL,
  `desc_pza` varchar(50) NOT NULL,
  `med_pza` varchar(30) NOT NULL,
  `peso_pza` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `piezas`
--

INSERT INTO `piezas` (`cod_pza`, `tipo_pza`, `desc_pza`, `med_pza`, `peso_pza`) VALUES
('0001/01', 'Goma', 'Copa base', '10 x 15', '150'),
('0001/02', 'Goma', 'Copa intermedia', '15 x 15', '150'),
('0001/03', 'Goma', 'Copa Juego 1 base + 4 intermedias', '10 x 15', '750'),
('0004/01', 'Metal', 'Bomba', '110 x 120 x 10', '1234'),
('0009/01', 'goma', 'Diafragma', '150 x 120 x 100', '150'),
('0009/02', 'goma', 'Diafragma', '150 x 120 x 100', '150'),
('1234/01', 'Goma', 'O\'ring', '10 x 10 x 10', '15'),
('1234/02', 'Metal', 'O\'ring', '10 x 10 x 10', '30'),
('2345/01', 'Goma', 'Valvula', '10 x 10', '25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recepcion_pzas`
--

CREATE TABLE `recepcion_pzas` (
  `id_recepcion` int(11) NOT NULL,
  `cod_pza` varchar(10) NOT NULL,
  `cant_recibida` int(11) NOT NULL,
  `fecha_recepcion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `legajo` int(11) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `legajo`, `rol`) VALUES
(1, 1, 'admin'),
(5, 140, 'mezclado'),
(6, 90, 'laboratorio'),
(7, 123, 'produccion'),
(8, 124, 'matriceria'),
(9, 135, 'gerente'),
(10, 2, 'gerente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock_pzas`
--

CREATE TABLE `stock_pzas` (
  `id_stock` int(11) NOT NULL,
  `cod_pza` varchar(10) NOT NULL,
  `cant_stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `legajo` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`legajo`, `name`, `password`) VALUES
(1, 'admin', '$2y$10$fmDCbyGlECWeoLDKgNKxKedImMeEQmY9n.TglzVNY6CTyCGmy/TDC'),
(2, 'gerente', '$2y$10$lh11J.yq33SMuz5b7i2dEOcNm7QMhmC7S0y8cFTD8JPf5fj01nKBG'),
(90, 'Pepe', '$2y$10$O.s3KcQ7QrVTPTo2NlOciOP6P4Te./.aqBP3ojOGN5rVOp05ZyeOG'),
(123, 'Pipi', '$2y$10$dRWfaaFzHqcB6q3CtynfCudc4/rNq7bzXIe.2aalt8Jaz97v9APJW'),
(124, 'Popo', '$2y$10$9QNz1gdpywAVy8OvtwGSquxN4DR1JZwZf7jTGK9bjB52E7adyTgUK'),
(135, 'Pupu', '$2y$10$1T0QllVwAj/bMk8t8gxE2OQR5JRyLE3XBWmcZqzBhLbq/xGWFtNfC'),
(140, 'Matias', '$2y$10$l7gzoQIXUjOZrwvWuV5ETen84Hz/hagsp8MlMu04cHmI5vbEA3R4C');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `despacho_pzas`
--
ALTER TABLE `despacho_pzas`
  ADD PRIMARY KEY (`id_despacho`),
  ADD KEY `FK_id_pedido` (`id_pedido`);

--
-- Indices de la tabla `pedido_pzas`
--
ALTER TABLE `pedido_pzas`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `FK_cod_pza` (`cod_pza`);

--
-- Indices de la tabla `piezas`
--
ALTER TABLE `piezas`
  ADD PRIMARY KEY (`cod_pza`);

--
-- Indices de la tabla `recepcion_pzas`
--
ALTER TABLE `recepcion_pzas`
  ADD PRIMARY KEY (`id_recepcion`),
  ADD KEY `cod_pza` (`cod_pza`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`),
  ADD UNIQUE KEY `legajo` (`legajo`);

--
-- Indices de la tabla `stock_pzas`
--
ALTER TABLE `stock_pzas`
  ADD PRIMARY KEY (`id_stock`),
  ADD KEY `cod_pza` (`cod_pza`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`legajo`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `despacho_pzas`
--
ALTER TABLE `despacho_pzas`
  ADD CONSTRAINT `FK_id_pedido` FOREIGN KEY (`id_pedido`) REFERENCES `pedido_pzas` (`id_pedido`);

--
-- Filtros para la tabla `pedido_pzas`
--
ALTER TABLE `pedido_pzas`
  ADD CONSTRAINT `FK_cod_pza` FOREIGN KEY (`cod_pza`) REFERENCES `piezas` (`cod_pza`);

--
-- Filtros para la tabla `recepcion_pzas`
--
ALTER TABLE `recepcion_pzas`
  ADD CONSTRAINT `recepcion_pzas_ibfk_1` FOREIGN KEY (`cod_pza`) REFERENCES `piezas` (`cod_pza`);

--
-- Filtros para la tabla `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `FK_legajo` FOREIGN KEY (`legajo`) REFERENCES `users` (`legajo`) ON DELETE CASCADE;

--
-- Filtros para la tabla `stock_pzas`
--
ALTER TABLE `stock_pzas`
  ADD CONSTRAINT `stock_pzas_ibfk_1` FOREIGN KEY (`cod_pza`) REFERENCES `piezas` (`cod_pza`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
