-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-03-2025 a las 04:08:09
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
-- Base de datos: `liceo`
--
CREATE DATABASE IF NOT EXISTS `liceo` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `liceo`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `años`
--

CREATE TABLE `años` (
  `id_año` int(11) NOT NULL,
  `año` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `años`
--

INSERT INTO `años` (`id_año`, `año`) VALUES
(1, '1er.'),
(2, '2do.'),
(3, '3er.'),
(4, '4to.'),
(5, '5to.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `cedula` varchar(20) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `cedula_escolar` varchar(20) DEFAULT NULL,
  `genero` enum('Masculino','Femenino','Otro') DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `lugar_nacimiento` varchar(100) DEFAULT NULL,
  `parroquia` varchar(100) DEFAULT NULL,
  `pais_nacimiento` varchar(100) DEFAULT NULL,
  `peso` decimal(5,2) DEFAULT NULL,
  `talla` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id`, `nombre`, `apellido`, `cedula`, `direccion`, `telefono`, `cedula_escolar`, `genero`, `fecha_nacimiento`, `lugar_nacimiento`, `parroquia`, `pais_nacimiento`, `peso`, `talla`) VALUES
(1, 'Luis', 'Pirela', '12345678', 'La Limpia, calle 15 Av. 25', '04125698745', '12345687989-25', 'Masculino', '0000-00-00', 'Cabimas', 'Bolivar', 'Venezuela', 54.00, 154.00),
(2, 'Carlos', 'ROmero', '25362325', 'San Francisco', '04145454548', '12345678*85', 'Masculino', '2025-03-25', 'Maracaibo', 'Chiquinquira', 'Venezuela', 61.00, 175.00),
(3, 'Maria', 'Gonzalez', '4343423', 'San Jacinto', '04125412547', '52635632', 'Femenino', '2025-02-11', 'Maraciabo', 'Sana Lucia', 'Vzla', 52.00, 152.00),
(4, 'Luis', 'Salas', '30345676', 'La Limpi', '041233333333', '12312', 'Masculino', '2025-03-02', 'Maracaibo', 'Carraciolo Parra Leòn', 'Venezuela', 45.00, 135.00),
(5, 'Josè', 'Linares', '4343344', 'San Francisco', '34324', '23432', 'Masculino', '2025-02-23', 'sdfsaf', 'sdfsf', 'sdfdsf', 999.99, 124.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lapsos`
--

CREATE TABLE `lapsos` (
  `id_lapso` int(11) NOT NULL,
  `nombre_lapso` varchar(50) NOT NULL,
  `id_año` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id_materia` int(11) NOT NULL,
  `nombre_materia` varchar(100) NOT NULL,
  `id_docente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia_seccion`
--

CREATE TABLE `materia_seccion` (
  `id_materia_seccion` int(11) NOT NULL,
  `id_materia` int(11) DEFAULT NULL,
  `id_seccion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id_nota` int(11) NOT NULL,
  `id_estudiante` int(11) DEFAULT NULL,
  `id_materia` int(11) DEFAULT NULL,
  `id_lapso` int(11) DEFAULT NULL,
  `calificacion` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `cedula` varchar(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `direccion` varchar(100) NOT NULL,
  `genero` char(10) NOT NULL,
  `fecha_nacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id`, `nombre`, `apellido`, `cedula`, `email`, `telefono`, `direccion`, `genero`, `fecha_nacimiento`) VALUES
(1, 'asdasd', 'asdsad', '3131232', 'fsf@gmail.com', '234324', 'fasdf', 'Masculino', '2025-02-24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `id_seccion` int(11) NOT NULL,
  `nombre_seccion` varchar(50) NOT NULL,
  `id_año` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `contrasena` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `usuario`, `contrasena`) VALUES
(1, 'YENBDRI', 'VILLALOBOS', 'yendri', '8cb2237d0679ca88db6464eac60da96345513964');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `años`
--
ALTER TABLE `años`
  ADD PRIMARY KEY (`id_año`),
  ADD UNIQUE KEY `año` (`año`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cedula` (`cedula`);

--
-- Indices de la tabla `lapsos`
--
ALTER TABLE `lapsos`
  ADD PRIMARY KEY (`id_lapso`),
  ADD KEY `id_año` (`id_año`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id_materia`),
  ADD KEY `id_docente` (`id_docente`);

--
-- Indices de la tabla `materia_seccion`
--
ALTER TABLE `materia_seccion`
  ADD PRIMARY KEY (`id_materia_seccion`),
  ADD KEY `id_materia` (`id_materia`),
  ADD KEY `id_seccion` (`id_seccion`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id_nota`),
  ADD KEY `id_estudiante` (`id_estudiante`),
  ADD KEY `id_materia` (`id_materia`),
  ADD KEY `id_lapso` (`id_lapso`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cedula` (`cedula`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`id_seccion`),
  ADD KEY `id_año` (`id_año`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `años`
--
ALTER TABLE `años`
  MODIFY `id_año` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `lapsos`
--
ALTER TABLE `lapsos`
  MODIFY `id_lapso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `materia_seccion`
--
ALTER TABLE `materia_seccion`
  MODIFY `id_materia_seccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `id_seccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `lapsos`
--
ALTER TABLE `lapsos`
  ADD CONSTRAINT `lapsos_ibfk_1` FOREIGN KEY (`id_año`) REFERENCES `años` (`id_año`);

--
-- Filtros para la tabla `materias`
--
ALTER TABLE `materias`
  ADD CONSTRAINT `materias_ibfk_1` FOREIGN KEY (`id_docente`) REFERENCES `profesores` (`id`);

--
-- Filtros para la tabla `materia_seccion`
--
ALTER TABLE `materia_seccion`
  ADD CONSTRAINT `materia_seccion_ibfk_1` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`),
  ADD CONSTRAINT `materia_seccion_ibfk_2` FOREIGN KEY (`id_seccion`) REFERENCES `secciones` (`id_seccion`);

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_ibfk_3` FOREIGN KEY (`id_lapso`) REFERENCES `lapsos` (`id_lapso`);

--
-- Filtros para la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD CONSTRAINT `secciones_ibfk_1` FOREIGN KEY (`id_año`) REFERENCES `años` (`id_año`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
