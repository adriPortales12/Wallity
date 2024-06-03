-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 03-06-2024 a las 10:49:58
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `virtualwalletspending`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(5) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'comida'),
(2, 'hogar'),
(3, 'ropa'),
(4, 'Juegos'),
(5, 'Viajes'),
(6, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

CREATE TABLE `gastos` (
  `id` int(20) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `cantidad` decimal(11,0) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `gastos`
--

INSERT INTO `gastos` (`id`, `titulo`, `id_categoria`, `cantidad`, `fecha`, `id_usuario`) VALUES
(90, 'Tele', 2, 1000, '2023-08-11', 40),
(105, 'x', 1, 100, '2024-05-20', 40),
(106, 'x', 4, 20, '2024-04-18', 40),
(107, 'Compra semanal', 2, 135, '2024-05-20', 40),
(108, 'gasto1', 5, 200, '2024-05-20', 40),
(109, 'xaa', 6, 200, '2024-05-20', 40),
(120, 'mespassdo1', 3, 130, '2024-04-18', 40),
(121, 'mespassdo2', 6, 22, '2024-04-14', 40),
(122, 'rdr2', 4, 70, '2024-05-25', 40),
(123, 'x', 3, 20, '2024-05-30', 40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id_usuario` int(11) NOT NULL,
  `limite_comida` decimal(10,2) DEFAULT NULL,
  `limite_hogar` decimal(10,2) DEFAULT NULL,
  `limite_ropa` decimal(10,2) DEFAULT NULL,
  `limite_juegos` decimal(10,2) DEFAULT NULL,
  `limite_viajes` decimal(10,2) DEFAULT NULL,
  `limite_otros` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`id_usuario`, `limite_comida`, `limite_hogar`, `limite_ropa`, `limite_juegos`, `limite_viajes`, `limite_otros`) VALUES
(40, 1.00, 1.00, 1.00, 1.00, 199.00, 10000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'admin'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(255) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `limite` int(11) NOT NULL DEFAULT 1000
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_usuario`, `contrasena`, `nombre`, `id_rol`, `limite`) VALUES
(8, 'admin', '$2y$10$7KeCZaUXaAGEsUFFG3p4VeWWvOV7Q7cxCtCbfTcobYnnW9tCBb4X6', 'admin1', 1, 0),
(40, 'usuario1', '$2y$10$0NPBDv6V6RgbohHqYSz0u.FXDNEQkHzBmyVAwXsdUZH9bzf5uNGUq', 'usuario', 2, 1000),
(48, 'afd3432', '$2y$10$5KVcyNAPhrZOsl2kV0w6.eTRKj4txEkeAFt8sBfXU2adlKHHED2cK', 'Adrian', 2, 1000);

--
-- Disparadores `usuarios`
--
DELIMITER $$
CREATE TRIGGER `insert_notification` AFTER INSERT ON `usuarios` FOR EACH ROW INSERT INTO notificaciones (id_usuario, limite_comida, limite_hogar, limite_ropa, limite_juegos, limite_viajes, limite_otros)
VALUES (NEW.id, 0, 0, 0, 0, 0, 0)
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user_expense` (`id_usuario`),
  ADD KEY `id_category_expense` (`id_categoria`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`nombre_usuario`),
  ADD KEY `fk_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `gastos`
--
ALTER TABLE `gastos`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD CONSTRAINT `id_category_expense` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `id_user_expense` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `notificaciones_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_rol` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
