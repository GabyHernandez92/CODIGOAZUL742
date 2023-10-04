-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 02-10-2023 a las 18:25:43
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_codigo_azul`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

DROP TABLE IF EXISTS `area`;
CREATE TABLE IF NOT EXISTS `area` (
  `id_area` int NOT NULL AUTO_INCREMENT,
  `nombre_area` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_area`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`id_area`, `nombre_area`) VALUES
(1, 'Quirófano'),
(2, 'Pediatría'),
(3, 'Guardia'),
(5, 'Ginecologia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `llamado`
--

DROP TABLE IF EXISTS `llamado`;
CREATE TABLE IF NOT EXISTS `llamado` (
  `id_llamado` int NOT NULL,
  `dni_paciente` int NOT NULL,
  `dni_usuario` int NOT NULL,
  `id_area` int NOT NULL,
  `tipo_llamado` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_hora_ingreso` datetime NOT NULL,
  `fecha_hora_atencion` datetime NOT NULL,
  `origen` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `estado` varchar(20) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no atendido',
  PRIMARY KEY (`id_llamado`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

DROP TABLE IF EXISTS `paciente`;
CREATE TABLE IF NOT EXISTS `paciente` (
  `dni` int NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `obra_social` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `telefono` int NOT NULL,
  `grupo_sanguineo` varchar(4) COLLATE utf8mb4_general_ci NOT NULL,
  `alergias` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `patologias_previas` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `cirugias` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`dni`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`dni`, `nombre`, `apellido`, `obra_social`, `telefono`, `grupo_sanguineo`, `alergias`, `patologias_previas`, `cirugias`) VALUES
(364521982, 'berni', 'jorgensen', 'seros', 297845892, 'A+', 'ninguna', 'ninguna', 'ninguna'),
(16548950, 'Andrés', 'Soto', 'Seros', 2147483647, '0+', 'Pólen', 'Ninguna', 'Ninguna'),
(248569535, 'Max', 'Power', 'Seros', 2147483647, '0+', 'Ninguna', 'Ninguna', 'Ninguna'),
(19542630, 'Liliana', 'Silva', 'Seros', 2147483647, 'A+', 'Ninguna', 'Ninguna', 'Ninguna'),
(25849623, 'Cynthia', 'Pons', 'Seros', 2147483647, 'A+', 'Ninguna', 'Ninguna', 'Ninguna'),
(26458965, 'Elsa', 'Perez', 'Seros', 2147483647, '0+', 'Tierra', 'Ninguna', 'Ninguna'),
(15946852, 'Pablo', 'Gomez', 'Seros', 2147483647, 'A+', 'Tierra', 'Ninguna', 'Ninguna');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `dni` int NOT NULL,
  `nombre` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `apellido` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `usuario` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `clave` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `correo` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tipo_usuario` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'generico'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`dni`, `nombre`, `apellido`, `usuario`, `clave`, `correo`, `tipo_usuario`) VALUES
(0, 'swag', '2134', 'Jessi', '123', 'jessi@gmail.com', ''),
(0, 'hernan', '2134', 'Gaby', '123', 'gaby@gmail.com', ''),
(2134, 'jessi', 'swag', 'Jessi', '123', 'jessi@gmail.com', ''),
(36458952, 'gaby', 'hernan', 'Gaby', '123', 'gaby@gmail.com', ''),
(15426, '[milla]', '[pai]', '[milla]', '[123]', '[milla@gmail.com]', '[admin]'),
(364582, 'milla', 'paila', 'milla', '123', 'milla@gmail.com', 'admin'),
(0, '', '', '', '', '', ''),
(0, 'ggrt', '', '', '', '', ''),
(123, 'tania', 'antieco', 'tani', '123', 'tania@gmail.com', 'generico'),
(36452369, 'Virginia', 'Reyes', 'virgi', '123', 'virgi@gmail.com', 'enfermero');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
