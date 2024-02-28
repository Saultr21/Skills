-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-02-2024 a las 20:37:33
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reservas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `sala` int(11) NOT NULL,
  `nombre_reserva` varchar(255) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `nombre_evento` varchar(255) NOT NULL,
  `invitados` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`sala`, `nombre_reserva`, `fecha`, `nombre_evento`, `invitados`) VALUES
(1, 'Pedro', '2024-02-28 19:10:18', 'Cumpleaños', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salas`
--

CREATE TABLE `salas` (
  `sala` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `aforo` int(11) NOT NULL,
  `minimo` int(11) NOT NULL,
  `imagen1` varchar(255) NOT NULL,
  `imagen2` varchar(255) NOT NULL,
  `imagen3` varchar(255) NOT NULL,
  `reservado` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `salas`
--

INSERT INTO `salas` (`sala`, `nombre`, `aforo`, `minimo`, `imagen1`, `imagen2`, `imagen3`, `reservado`) VALUES
(1, 'Carpa Jilorio', 50, 10, 'sala1/affair-1238428_640.jpg', 'sala1/affair-1238429_640.jpg', 'sala1/plano.PNG', 0),
(2, 'Salón Sancocho', 62, 50, 'sala2/dinner-547217_640.jpg', 'sala2/dinner-547219_640.jpg', 'sala2/plano.PNG', 0),
(3, 'Terraza Solajero', 56, 40, 'sala3/banquet-2945619_640.jpg', 'sala3/plano.PNG', '', 0),
(4, 'Pabellón Chascar', 64, 46, 'sala4/events-2609526_640.jpg', 'sala4/plano.png', '', 0),
(5, 'Jardín Abollao', 116, 80, 'sala5/table-188980_640.jpg', 'sala5/table-188982_640.jpg', '', 0),
(6, 'Recinto Belingo', 260, 140, 'sala6/banquet-453799_640.jpg', '', '', 0),
(7, 'Sala Empalicar', 54, 38, 'sala7/party-1343043_640.jpg', '', '', 0),
(8, 'Zagúan Enyugar', 144, 100, 'sala8/party-hall-342202_640.jpg', '', '', 0),
(9, 'Palacio Canchanchán', 200, 120, 'sala9/wedding-4290293_640.jpg', '', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `correo` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `palabra_secreta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `correo`, `usuario`, `palabra_secreta`) VALUES
(1, 'Carpa Jilorio', '102', '70'),
(2, 'Salón Sancocho', '62', '50'),
(3, 'Terraza Solajero', '56', '40'),
(4, 'Pabellón Chascar', '64', '46'),
(5, 'skill2@gmail.com', 'skill', '$2y$10$Jsxf9tjVMdmV0KH0cCIrhO9SCZrxdcN37oFc.wGhH9x/0KsvYGGYm'),
(6, 'Nombre de la Sala', 'Aforo', 'Mínimo'),
(7, 's@gmail.com', 'skill2@gmail.com', '$2y$10$/W922ZiZRiekfKc1/hcRVuraTbzvFIX.xMG3HWHxiioaU.myJArVi');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`sala`);

--
-- Indices de la tabla `salas`
--
ALTER TABLE `salas`
  ADD PRIMARY KEY (`sala`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `salas`
--
ALTER TABLE `salas`
  MODIFY `sala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
