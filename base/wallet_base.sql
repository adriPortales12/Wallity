SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `categorias` (
  `id` int(5) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `color` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;



INSERT INTO `categorias` (`id`, `nombre`, `color`) VALUES
(1, 'comida', '#DE1F59'),
(2, 'hogar', '#DE1FAA'),
(3, 'ropa', '#B01FDE'),
(4, 'Juegos', '#681FDE'),
(5, 'Viajes', '#1FAADE');


CREATE TABLE `gastos` (
  `id` int(20) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


INSERT INTO `gastos` (`id`, `titulo`, `id_categoria`, `cantidad`, `fecha`, `id_usuario`) VALUES
(1, 'prueba', 3, 12, '2020-03-21', 5),
(2, 'starbucks', 1, 60, '2020-03-21', 5),
(4, 'Regalo de cumpleaños mamá', 2, 1200, '2020-03-22', 5),
(5, 'Nintendo Switch', 4, 4600, '2020-03-26', 5),
(6, 'Viaje a Nueva York', 5, 20000, '2020-01-25', 5),
(7, 'Chocolates Ferrero', 1, 140, '2020-03-27', 5),
(10, 'sdsdsd', 1, 2323, '2020-04-03', 5),
(11, 'sadas', 1, 232, '2020-04-03', 5),
(12, 'sadas', 3, 11, '2020-04-03', 5),
(13, 'sdsd', 5, 23, '2020-04-03', 5),
(14, 'sdsd', 5, 23, '2020-04-03', 5),
(19, 'Chilis', 1, 300, '2020-01-01', 5),
(20, 'juego de Halo', 4, 1100, '2020-04-04', 5),
(21, 'Uñas', 3, 200, '2020-04-09', 6),
(23, 'pastillas para la tos', 2, 21, '2020-06-06', 5),
(24, 'Ropa nueva', 3, 300, '2020-06-04', 5),
(25, 'juego Nintendo', 2, 200, '2020-07-12', 5);

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'admin'),
(2, 'cliente');

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(255) DEFAULT NULL,
  `contraseña` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `usuarios` (`id`, `nombre_usuario`, `contraseña`, `nombre`, `id_rol`) VALUES
(5, 'marcos', '$2y$10$0aOmd1LTFHtBLCEtDrJgy.xxs7FArnOlzHXLrviwP85LWS.XbxsNO', 'Marcos Rivas', NULL),
(6, 'lena', '$2y$10$C/MX.IRvzrNuMyo4pk5uU.bCD20hSWChoCM1bp4n3kEzO2TYamSI.', 'Lenis', NULL),
(7, 'omar', '$2y$10$2YzZ9yzk2rSLbcbfBGkcIuWZ1HzjcNT8lTcgeidTiYbq2yzcNVxuq', 'El Pozos', NULL);

ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `gastos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user_expense` (`id_usuario`),
  ADD KEY `id_category_expense` (`id_categoria`);

ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`nombre_usuario`),
  ADD KEY `fk_rol` (`id_rol`);

ALTER TABLE `categorias`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `gastos`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `gastos`
  ADD CONSTRAINT `id_category_expense` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `id_user_expense` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_rol` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`);
COMMIT;
