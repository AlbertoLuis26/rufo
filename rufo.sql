-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-03-2021 a las 01:17:16
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rufo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id_curso` int(9) NOT NULL,
  `Curso` varchar(80) NOT NULL,
  `Precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id_curso`, `Curso`, `Precio`) VALUES
(1, 'Matematica', '20.00'),
(2, 'Fisica', '25.00'),
(3, 'Informatica', '20.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso_matricula`
--

CREATE TABLE `curso_matricula` (
  `id_usuario` int(9) NOT NULL,
  `id_curso` int(9) NOT NULL,
  `Curso` varchar(60) NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `curso_matricula`
--

INSERT INTO `curso_matricula` (`id_usuario`, `id_curso`, `Curso`, `precio`) VALUES
(26, 1, 'Matematica', '20.00'),
(26, 2, 'Fisica', '25.00'),
(26, 3, 'Informatica', '20.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `id_matricula` int(9) NOT NULL,
  `id_usuario` int(9) NOT NULL,
  `Nombre` varchar(150) NOT NULL,
  `Apellido` varchar(150) NOT NULL,
  `Cedula` varchar(50) NOT NULL,
  `Grado` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Letra` varchar(5) NOT NULL,
  `Club` varchar(60) NOT NULL,
  `Total_matricula` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `matricula`
--

INSERT INTO `matricula` (`id_matricula`, `id_usuario`, `Nombre`, `Apellido`, `Cedula`, `Grado`, `Letra`, `Club`, `Total_matricula`) VALUES
(26, 26, 'Alberto Luis', 'Hurtado Ortiz', '3738229', 'Primer AÃ±o', 'D', 'Club de Padres de Familia', '75.50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `id_permiso` int(9) NOT NULL,
  `Permiso` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`id_permiso`, `Permiso`) VALUES
(1, 'Administrador'),
(2, 'Estudiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(9) NOT NULL,
  `Nombre` varchar(150) NOT NULL,
  `Apellido` varchar(150) NOT NULL,
  `Cedula` varchar(60) NOT NULL,
  `Contrasena` varchar(80) NOT NULL,
  `id_permiso` int(9) NOT NULL,
  `Grado` varchar(25) NOT NULL,
  `Telefono` varchar(60) NOT NULL,
  `id_matricula` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `Nombre`, `Apellido`, `Cedula`, `Contrasena`, `id_permiso`, `Grado`, `Telefono`, `id_matricula`) VALUES
(26, 'Alberto Luis', 'Hurtado Ortiz', '3738229', 'gordo-26', 2, 'Primer AÃ±o', '67502268', 0),
(33, 'djdjjd', 'shshsh', '37382299', 'gordo-26', 1, 'Segundo AÃ±o', '393934', 0),
(34, 'Luis Alberto', 'Hurtado Ortiz', '37254', 'luis-17', 2, 'Segundo AÃ±o', '67502268', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`id_matricula`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`id_permiso`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `Cedula` (`Cedula`),
  ADD KEY `id_permiso` (`id_permiso`),
  ADD KEY `id_permiso_2` (`id_permiso`),
  ADD KEY `id_matricula` (`id_matricula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `matricula`
--
ALTER TABLE `matricula`
  MODIFY `id_matricula` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `id_permiso` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_permiso`) REFERENCES `permiso` (`id_permiso`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
