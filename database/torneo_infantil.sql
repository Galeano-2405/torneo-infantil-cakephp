-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-10-2026 a las 02:13:41
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
-- Base de datos: `torneo_infantil`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `modified` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id`, `nombre`, `created`, `modified`) VALUES
(1, 'FC Barcelona', '2026-10-01 17:26:28', '2026-10-01 17:26:28'),
(2, 'Real Madrid', '2026-10-01 17:26:57', '2026-10-01 17:26:57'),
(3, 'Manchester City', '2026-10-01 17:27:10', '2026-10-01 17:27:10'),
(4, 'FC Bayern', '2026-10-01 17:27:23', '2026-10-01 17:27:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `goles`
--

CREATE TABLE `goles` (
  `id` int(11) NOT NULL,
  `jugador_id` int(11) NOT NULL,
  `jornada_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT 0,
  `created` datetime DEFAULT current_timestamp(),
  `modified` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `goles`
--

INSERT INTO `goles` (`id`, `jugador_id`, `jornada_id`, `cantidad`, `created`, `modified`) VALUES
(1, 1, 1, 2, '2026-10-02 03:36:52', '2026-10-02 03:40:27'),
(2, 2, 1, 3, '2026-10-08 04:05:21', '2026-10-08 04:05:21'),
(3, 2, 2, 6, '2026-10-08 04:05:29', '2026-10-08 04:05:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE `incidencias` (
  `id` int(11) NOT NULL,
  `jugador_id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `tipo_tarjeta` enum('Amarilla','Roja') NOT NULL,
  `fecha_incidencia` date NOT NULL,
  `fecha_suspension` date DEFAULT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `modified` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `incidencias`
--

INSERT INTO `incidencias` (`id`, `jugador_id`, `descripcion`, `tipo_tarjeta`, `fecha_incidencia`, `fecha_suspension`, `created`, `modified`) VALUES
(1, 1, 'Por falta leve', 'Amarilla', '2026-10-03', NULL, '2026-10-01 18:21:27', '2026-10-01 18:21:27'),
(2, 1, 'Falta Grave', 'Roja', '2026-10-03', '2026-10-10', '2026-10-01 18:23:38', '2026-10-02 04:42:10'),
(3, 1, 'Falta Grave', 'Roja', '2026-10-10', '2026-10-10', '2026-10-02 04:50:17', '2026-10-02 04:50:17'),
(4, 2, 'FALTA GRAVE', 'Roja', '2026-10-10', '2026-10-17', '2026-10-08 04:07:13', '2026-10-08 04:07:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornadas`
--

CREATE TABLE `jornadas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `modified` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `jornadas`
--

INSERT INTO `jornadas` (`id`, `nombre`, `fecha`, `created`, `modified`) VALUES
(1, 'Jornada 1', '2026-10-03', '2026-10-01 17:27:45', '2026-10-01 17:27:45'),
(2, 'Jornada 2', '2026-10-10', '2026-10-01 17:27:59', '2026-10-01 17:27:59'),
(3, 'Jornada 3', '2026-10-17', '2026-10-01 17:28:12', '2026-10-01 17:28:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE `jugadores` (
  `id` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `fotografia` varchar(255) DEFAULT NULL,
  `equipo_id` int(11) NOT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `modified` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`id`, `nombres`, `apellidos`, `fecha_nacimiento`, `fotografia`, `equipo_id`, `created`, `modified`) VALUES
(1, 'Angel Emanuel', 'Messi Jong', '2005-05-24', '1790877990_WhatsApp Image 2026-10-01 at 11.50.19.jpeg', 1, '2026-10-01 17:50:39', '2026-10-01 18:06:30'),
(2, 'Laura Maria', 'Calvillo Salazar', '2003-08-03', '1791432298_WhatsApp Image 2026-10-07 at 22.04.29.jpeg', 2, '2026-10-08 04:04:27', '2026-10-08 04:04:58');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `goles`
--
ALTER TABLE `goles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_gol_jugador` (`jugador_id`),
  ADD KEY `fk_gol_jornada` (`jornada_id`);

--
-- Indices de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_incidencia_jugador` (`jugador_id`);

--
-- Indices de la tabla `jornadas`
--
ALTER TABLE `jornadas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jugador_equipo` (`equipo_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `goles`
--
ALTER TABLE `goles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `jornadas`
--
ALTER TABLE `jornadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `goles`
--
ALTER TABLE `goles`
  ADD CONSTRAINT `fk_gol_jornada` FOREIGN KEY (`jornada_id`) REFERENCES `jornadas` (`id`),
  ADD CONSTRAINT `fk_gol_jugador` FOREIGN KEY (`jugador_id`) REFERENCES `jugadores` (`id`);

--
-- Filtros para la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD CONSTRAINT `fk_incidencia_jugador` FOREIGN KEY (`jugador_id`) REFERENCES `jugadores` (`id`);

--
-- Filtros para la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD CONSTRAINT `fk_jugador_equipo` FOREIGN KEY (`equipo_id`) REFERENCES `equipos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
