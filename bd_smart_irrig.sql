-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 14-08-2024 a las 03:08:38
-- Versión del servidor: 10.11.8-MariaDB-cll-lve
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u562010244_bd_smart_irrig`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_cargo`
--

CREATE TABLE `tabla_cargo` (
  `id` int(11) NOT NULL,
  `tipo_cargo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tabla_cargo`
--

INSERT INTO `tabla_cargo` (`id`, `tipo_cargo`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_datos_luminosidad`
--

CREATE TABLE `tabla_datos_luminosidad` (
  `ID` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sensor` text NOT NULL,
  `luminosidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tabla_datos_luminosidad`
--

INSERT INTO `tabla_datos_luminosidad` (`ID`, `fecha`, `sensor`, `luminosidad`) VALUES

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_usuarios`
--

CREATE TABLE `tabla_usuarios` (
  `codigo_usuario` int(11) NOT NULL,
  `usuario_apellido` text NOT NULL,
  `usuario_nombre` text NOT NULL,
  `usuario_correo` text NOT NULL,
  `usuario_clave` varchar(50) NOT NULL,
  `fecha_ingreso` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_estado` text NOT NULL,
  `tipo_cargo` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tabla_usuarios`
--

INSERT INTO `tabla_usuarios` (`codigo_usuario`, `usuario_apellido`, `usuario_nombre`, `usuario_correo`, `usuario_clave`, `fecha_ingreso`, `usuario_estado`, `tipo_cargo`) VALUES
(17, 'Suarez', 'Jackson', 'Jacksonsuarez64@gmail.com', 'jack123', '2024-05-14 20:52:57', 'I', 1),
(18, 'Ramirez', 'Tomas', 'Tomasramirez@gmail.com', 'tomas2020*', '2024-02-08 13:50:08', 'I', 1),
(20, 'Gomez ', 'Diana', 'degq1998@gmail.com', 'Diana123', '2024-05-14 21:05:10', 'I', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tabla_cargo`
--
ALTER TABLE `tabla_cargo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tabla_datos_luminosidad`
--
ALTER TABLE `tabla_datos_luminosidad`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tabla_humedad_ambiente`
--
ALTER TABLE `tabla_humedad_ambiente`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tabla_humedad_suelo`
--
ALTER TABLE `tabla_humedad_suelo`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tabla_sensores`
--
ALTER TABLE `tabla_sensores`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tabla_temperatura_ambiente`
--
ALTER TABLE `tabla_temperatura_ambiente`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tabla_usuarios`
--
ALTER TABLE `tabla_usuarios`
  ADD PRIMARY KEY (`codigo_usuario`),
  ADD KEY `tipo_cargo` (`tipo_cargo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tabla_cargo`
--
ALTER TABLE `tabla_cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tabla_datos_luminosidad`
--
ALTER TABLE `tabla_datos_luminosidad`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146699;

--
-- AUTO_INCREMENT de la tabla `tabla_humedad_ambiente`
--
ALTER TABLE `tabla_humedad_ambiente`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=265845;

--
-- AUTO_INCREMENT de la tabla `tabla_humedad_suelo`
--
ALTER TABLE `tabla_humedad_suelo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=517835;

--
-- AUTO_INCREMENT de la tabla `tabla_sensores`
--
ALTER TABLE `tabla_sensores`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `tabla_temperatura_ambiente`
--
ALTER TABLE `tabla_temperatura_ambiente`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=265839;

--
-- AUTO_INCREMENT de la tabla `tabla_usuarios`
--
ALTER TABLE `tabla_usuarios`
  MODIFY `codigo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tabla_usuarios`
--
ALTER TABLE `tabla_usuarios`
  ADD CONSTRAINT `tabla_usuarios_ibfk_1` FOREIGN KEY (`tipo_cargo`) REFERENCES `tabla_cargo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
