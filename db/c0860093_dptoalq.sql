-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-04-2018 a las 18:19:22
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `c0860093_dptoalq`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda_clientes`
--

CREATE TABLE `agenda_clientes` (
  `id_agenda` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `corregido` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` varchar(150) NOT NULL,
  `facebook` varchar(50) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL COMMENT 'Pagina similar a la que le gustaría tener',
  `n1_id` int(11) NOT NULL,
  `n2_id` int(11) NOT NULL,
  `n3_id` int(11) NOT NULL,
  `fecha_creado` datetime NOT NULL,
  `fecha_modificado` datetime NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `agenda_clientes`
--

INSERT INTO `agenda_clientes` (`id_agenda`, `nombre`, `corregido`, `email`, `telefono`, `facebook`, `check_in`, `check_out`, `n1_id`, `n2_id`, `n3_id`, `fecha_creado`, `fecha_modificado`, `tipo`) VALUES
(1, '', '', '', '', '', '0000-00-00', '0000-00-00', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(2, 'Allevato Juan', 'allevato-juan', 'email', '15 4047 3368', 'sadasd as', '2018-02-01', '2018-03-01', 2, 3, 3, '0000-00-00 00:00:00', '2018-02-26 19:21:58', 3),
(3, 'Andres Pedro Manuel', 'andres-pedro-manuel', 'mariacavalo@yahoo.com.ar', '4228-5237', 'sdf', '2018-02-09', '2018-02-24', 11, 15, 21, '0000-00-00 00:00:00', '2018-02-09 09:46:50', 3),
(4, 'Bartel Martín', 'meb_sumo@hotmail.com', 'meb_sumo@hotmail.com', '4205-0885', '', '0000-00-00', '0000-00-00', 0, 33442418, 19880726, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3),
(103, 'MeeM1234', 'meem1234', 'abutatilourdes@gmail.com', '123 123 12', 'asdasdasdas.facebok.com', '1212-12-12', '1010-10-10', 11, 10, 13, '2018-01-03 22:42:26', '2018-01-03 23:15:53', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda_representantes`
--

CREATE TABLE `agenda_representantes` (
  `id_agenda_representantes` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `corregido` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` varchar(150) NOT NULL,
  `facebook` varchar(50) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL COMMENT 'Pagina similar a la que le gustaría tener',
  `n1_id` int(11) NOT NULL,
  `n2_id` int(11) NOT NULL,
  `n3_id` int(11) NOT NULL,
  `fecha_creado` datetime NOT NULL,
  `fecha_modificado` datetime NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `agenda_representantes`
--

INSERT INTO `agenda_representantes` (`id_agenda_representantes`, `nombre`, `corregido`, `email`, `telefono`, `facebook`, `check_in`, `check_out`, `n1_id`, `n2_id`, `n3_id`, `fecha_creado`, `fecha_modificado`, `tipo`) VALUES
(1, '', '', '', '', '', '0000-00-00', '0000-00-00', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(2, 'Alejandro Pais', 'alejandro-pais', 'alejandro_562@hotmail.com', '1133300950', 'https://www.facebook.com/alejandro.j.pais', '2018-02-01', '2018-03-01', 0, 2, 2, '0000-00-00 00:00:00', '2018-02-26 19:21:58', 3),
(3, 'Andres Pedro Manuel', 'andres-pedro-manuel', 'mariacavalo@yahoo.com.ar', '4228-5237', 'sdf', '2018-02-09', '2018-02-24', 11, 15, 21, '0000-00-00 00:00:00', '2018-02-09 09:46:50', 3),
(4, 'Bartel Martín', 'meb_sumo@hotmail.com', 'meb_sumo@hotmail.com', '4205-0885', '', '0000-00-00', '0000-00-00', 0, 33442418, 19880726, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3),
(103, 'MeeM1234', 'meem1234', 'abutatilourdes@gmail.com', '123 123 12', 'asdasdasdas.facebok.com', '1212-12-12', '1010-10-10', 11, 10, 13, '2018-01-03 22:42:26', '2018-01-03 23:15:53', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda_representantes_relaciones`
--

CREATE TABLE `agenda_representantes_relaciones` (
  `id_relacion` int(11) NOT NULL,
  `id_agenda_representantes` int(11) NOT NULL,
  `n1_id` int(11) NOT NULL,
  `n2_id` int(11) NOT NULL,
  `n3_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `agenda_representantes_relaciones`
--

INSERT INTO `agenda_representantes_relaciones` (`id_relacion`, `id_agenda_representantes`, `n1_id`, `n2_id`, `n3_id`) VALUES
(2, 2, 2, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivo`
--

CREATE TABLE `archivo` (
  `id_archivo` int(11) NOT NULL,
  `carpeta` varchar(100) NOT NULL,
  `archivo` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `tabla_asociada` varchar(100) NOT NULL,
  `identificador_tabla` varchar(100) NOT NULL,
  `id_elemento` int(11) NOT NULL,
  `orden` int(11) NOT NULL,
  `creado` datetime NOT NULL,
  `modificado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `archivo`
--

INSERT INTO `archivo` (`id_archivo`, `carpeta`, `archivo`, `nombre`, `descripcion`, `tipo`, `categoria`, `tabla_asociada`, `identificador_tabla`, `id_elemento`, `orden`, `creado`, `modificado`) VALUES
(1, 'interfaz/', 'logo.png', '', '', 'imagen', 'logo', 'usuario', 'id', 1, 1, '2018-02-10 18:10:32', '2018-02-10 19:43:26'),
(2, 'interfaz/', 'favicon.png', '', '', 'imagen', 'favicon', 'usuario', 'id', 1, 1, '2018-02-10 18:10:37', '2018-02-10 19:43:29'),
(3, 'interfaz/departamento_nivel_1/2/', 'buenos-aires-argentina1.jpg', '', '', 'imagen', 'imagenes', 'nivel_1', 'n1_id', 2, 1, '2018-02-10 19:49:55', '2018-02-24 15:47:46'),
(4, 'interfaz/departamento_nivel_1/3/', 'mendoza-argentina1.jpg', '', '', 'imagen', 'imagenes', 'nivel_1', 'n1_id', 3, 1, '2018-02-10 19:47:12', '2018-02-24 15:47:50'),
(5, 'interfaz/departamento_nivel_2/2/', 'palermo-soho-801x5631.jpg', '', '', 'imagen', 'imagenes', 'nivel_2', 'n2_id', 2, 1, '2018-02-10 20:30:34', '2018-02-24 15:47:56'),
(6, 'interfaz/departamento_nivel_2/3/', 'iglesia-del-pilar-buenos-aires1.jpg', '', '', 'imagen', 'imagenes', 'nivel_2', 'n2_id', 3, 1, '2018-02-10 20:40:03', '2018-02-24 15:47:59'),
(7, 'interfaz/departamento_nivel_2/4/', 'las-canitas-11.png', '', '', 'imagen', 'imagenes', 'nivel_2', 'n2_id', 4, 1, '2018-02-11 15:46:51', '2018-02-24 15:48:02'),
(8, 'interfaz/departamento_nivel_2/5/', 'mendoza_capital1.jpg', '', '', 'imagen', 'imagenes', 'nivel_2', 'n2_id', 5, 1, '2018-02-11 15:48:44', '2018-02-24 15:48:05'),
(9, 'interfaz/departamento_nivel_3/2/imagenes/', '1.jpeg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 2, 2, '2018-02-11 20:13:10', '2018-03-17 20:03:13'),
(10, 'interfaz/departamento_nivel_3/2/imagenes/', '2.jpeg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 2, 3, '2018-02-11 20:13:10', '2018-03-17 20:03:13'),
(11, 'interfaz/departamento_nivel_3/2/imagenes/', '3.jpeg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 2, 4, '2018-02-11 20:13:10', '2018-03-17 20:03:14'),
(12, 'interfaz/departamento_nivel_3/2/imagenes/', '4.jpeg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 2, 1, '2018-02-11 20:13:10', '2018-03-17 20:03:13'),
(13, 'interfaz/departamento_nivel_3/2/imagenes/', '5.jpeg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 2, 5, '2018-02-11 20:13:10', '2018-03-17 20:03:14'),
(14, 'interfaz/departamento_nivel_3/2/imagenes/', '6.jpeg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 2, 6, '2018-02-11 20:13:10', '2018-03-17 20:03:14'),
(15, 'interfaz/departamento_nivel_3/2/imagenes/', '7.jpeg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 2, 7, '2018-02-11 20:13:10', '2018-03-17 20:03:14'),
(16, 'interfaz/departamento_nivel_3/2/imagenes/', '8.jpeg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 2, 8, '2018-02-11 20:13:10', '2018-03-17 20:03:14'),
(17, 'interfaz/departamento_nivel_3/2/imagenes/', '9.jpeg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 2, 9, '2018-02-11 20:13:10', '2018-03-17 20:03:14'),
(18, 'interfaz/departamento_nivel_3/2/imagenes/', '10.jpeg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 2, 10, '2018-02-11 20:13:10', '2018-03-17 20:03:14'),
(19, 'interfaz/departamento_nivel_3/2/imagenes/', '11.jpeg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 2, 11, '2018-02-11 20:13:10', '2018-03-17 20:03:14'),
(20, 'interfaz/departamento_nivel_3/2/imagenes/', '12.jpeg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 2, 12, '2018-02-11 20:13:10', '2018-03-17 20:03:14'),
(21, 'interfaz/departamento_nivel_3/2/imagenes/', '13.jpeg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 2, 13, '2018-02-11 20:13:10', '2018-03-17 20:03:14'),
(22, 'interfaz/departamento_nivel_3/2/imagenes/', '14.jpeg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 2, 14, '2018-02-11 20:13:11', '2018-03-17 20:03:14'),
(23, 'interfaz/departamento_nivel_3/2/imagenes/', '15.jpeg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 2, 15, '2018-02-11 20:13:11', '2018-03-17 20:03:14'),
(24, 'interfaz/departamento_nivel_3/2/imagenes/', '16.jpeg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 2, 16, '2018-02-11 20:13:11', '2018-03-17 20:03:14'),
(26, 'interfaz/departamento_nivel_3/3/imagenes/', '1.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 3, 1, '2018-02-12 15:26:13', '2018-03-10 19:10:53'),
(27, 'interfaz/departamento_nivel_3/3/imagenes/', '2.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 3, 2, '2018-02-12 15:26:13', '2018-03-10 19:10:53'),
(28, 'interfaz/departamento_nivel_3/3/imagenes/', '3.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 3, 3, '2018-02-12 15:26:13', '2018-03-10 19:10:53'),
(29, 'interfaz/departamento_nivel_3/3/imagenes/', '4.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 3, 4, '2018-02-12 15:26:13', '2018-03-10 19:10:53'),
(30, 'interfaz/departamento_nivel_3/3/imagenes/', '5.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 3, 5, '2018-02-12 15:26:13', '2018-03-10 19:10:53'),
(31, 'interfaz/departamento_nivel_3/3/imagenes/', '6.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 3, 6, '2018-02-12 15:26:13', '2018-03-10 19:10:53'),
(32, 'interfaz/departamento_nivel_3/3/imagenes/', '7.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 3, 7, '2018-02-12 15:26:13', '2018-03-10 19:10:53'),
(33, 'interfaz/departamento_nivel_3/3/imagenes/', '8.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 3, 8, '2018-02-12 15:26:14', '2018-03-10 19:10:53'),
(34, 'interfaz/departamento_nivel_3/3/imagenes/', '9.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 3, 9, '2018-02-12 15:26:14', '2018-03-10 19:10:53'),
(35, 'interfaz/departamento_nivel_3/3/imagenes/', '10.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 3, 10, '2018-02-12 15:26:14', '2018-03-10 19:10:53'),
(36, 'interfaz/departamento_nivel_3/3/imagenes/', '11.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 3, 11, '2018-02-12 15:26:14', '2018-03-10 19:10:53'),
(37, 'interfaz/departamento_nivel_3/3/imagenes/', '12.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 3, 12, '2018-02-12 15:26:14', '2018-03-10 19:10:53'),
(38, 'interfaz/departamento_nivel_3/3/imagenes/', '13.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 3, 13, '2018-02-12 15:26:14', '2018-03-10 19:10:53'),
(39, 'interfaz/departamento_nivel_3/4/imagenes/', '1.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 4, 1, '2018-02-12 15:35:25', '2018-02-24 15:57:38'),
(40, 'interfaz/departamento_nivel_3/4/imagenes/', '2.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 4, 2, '2018-02-12 15:35:25', '2018-02-24 15:57:38'),
(41, 'interfaz/departamento_nivel_3/4/imagenes/', '3.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 4, 3, '2018-02-12 15:35:25', '2018-02-24 15:57:38'),
(42, 'interfaz/departamento_nivel_3/4/imagenes/', '4.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 4, 4, '2018-02-12 15:35:26', '2018-02-24 15:57:38'),
(43, 'interfaz/departamento_nivel_3/4/imagenes/', '5.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 4, 5, '2018-02-12 15:35:26', '2018-02-24 15:57:38'),
(44, 'interfaz/departamento_nivel_3/4/imagenes/', '6.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 4, 6, '2018-02-12 15:35:26', '2018-02-24 15:57:38'),
(45, 'interfaz/departamento_nivel_3/4/imagenes/', '7.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 4, 7, '2018-02-12 15:35:26', '2018-02-24 15:57:38'),
(46, 'interfaz/departamento_nivel_3/4/imagenes/', '8.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 4, 8, '2018-02-12 15:35:26', '2018-02-24 15:57:38'),
(47, 'interfaz/departamento_nivel_3/4/imagenes/', '9.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 4, 9, '2018-02-12 15:35:26', '2018-02-24 15:57:38'),
(48, 'interfaz/departamento_nivel_3/4/imagenes/', '10.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 4, 10, '2018-02-12 15:35:26', '2018-02-24 15:57:38'),
(49, 'interfaz/departamento_nivel_3/4/imagenes/', '11.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 4, 11, '2018-02-12 15:35:26', '2018-02-24 15:57:38'),
(50, 'interfaz/departamento_nivel_3/4/imagenes/', '12.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 4, 12, '2018-02-12 15:35:26', '2018-02-24 15:57:38'),
(51, 'interfaz/departamento_nivel_3/4/imagenes/', '13.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 4, 13, '2018-02-12 15:35:26', '2018-02-24 15:57:38'),
(52, 'interfaz/departamento_nivel_3/4/imagenes/', '14.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 4, 14, '2018-02-12 15:35:26', '2018-02-24 15:57:38'),
(53, 'interfaz/departamento_nivel_3/5/imagenes/', '1.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 5, 1, '2018-02-12 15:38:16', '2018-02-24 15:57:48'),
(54, 'interfaz/departamento_nivel_3/5/imagenes/', '2.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 5, 2, '2018-02-12 15:38:16', '2018-02-24 15:57:48'),
(55, 'interfaz/departamento_nivel_3/5/imagenes/', '3.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 5, 3, '2018-02-12 15:38:16', '2018-02-24 15:57:48'),
(56, 'interfaz/departamento_nivel_3/5/imagenes/', '4.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 5, 4, '2018-02-12 15:38:16', '2018-02-24 15:57:48'),
(57, 'interfaz/departamento_nivel_3/5/imagenes/', '5.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 5, 5, '2018-02-12 15:38:16', '2018-02-24 15:57:48'),
(58, 'interfaz/departamento_nivel_3/5/imagenes/', '6.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 5, 6, '2018-02-12 15:38:16', '2018-02-24 15:57:48'),
(59, 'interfaz/departamento_nivel_3/5/imagenes/', '7.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 5, 7, '2018-02-12 15:38:16', '2018-02-24 15:57:48'),
(60, 'interfaz/departamento_nivel_3/5/imagenes/', '8.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 5, 8, '2018-02-12 15:38:16', '2018-02-24 15:57:48'),
(61, 'interfaz/departamento_nivel_3/5/imagenes/', '9.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 5, 9, '2018-02-12 15:38:16', '2018-02-24 15:57:48'),
(62, 'interfaz/departamento_nivel_3/5/imagenes/', '10.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 5, 10, '2018-02-12 15:38:16', '2018-02-24 15:57:48'),
(63, 'interfaz/departamento_nivel_3/5/imagenes/', '11.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 5, 11, '2018-02-12 15:38:16', '2018-02-24 15:57:48'),
(64, 'interfaz/departamento_nivel_3/5/imagenes/', '12.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 5, 12, '2018-02-12 15:38:16', '2018-02-24 15:57:48'),
(65, 'interfaz/departamento_nivel_3/5/imagenes/', '13.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 5, 13, '2018-02-12 15:38:16', '2018-02-24 15:57:48'),
(66, 'interfaz/departamento_nivel_3/5/imagenes/', '14.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 5, 14, '2018-02-12 15:38:16', '2018-02-24 15:57:48'),
(67, 'interfaz/departamento_nivel_3/6/imagenes/', '1.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 6, 1, '2018-02-12 15:47:55', '2018-02-24 15:58:00'),
(68, 'interfaz/departamento_nivel_3/6/imagenes/', '2.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 6, 2, '2018-02-12 15:47:55', '2018-02-24 15:58:00'),
(69, 'interfaz/departamento_nivel_3/6/imagenes/', '3.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 6, 3, '2018-02-12 15:47:55', '2018-02-24 15:58:00'),
(70, 'interfaz/departamento_nivel_3/6/imagenes/', '4.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 6, 4, '2018-02-12 15:47:55', '2018-02-24 15:58:00'),
(71, 'interfaz/departamento_nivel_3/6/imagenes/', '5.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 6, 5, '2018-02-12 15:47:55', '2018-02-24 15:58:00'),
(72, 'interfaz/departamento_nivel_3/6/imagenes/', '6.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 6, 6, '2018-02-12 15:47:55', '2018-02-24 15:58:00'),
(73, 'interfaz/departamento_nivel_3/6/imagenes/', '7.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 6, 7, '2018-02-12 15:47:55', '2018-02-24 15:58:00'),
(74, 'interfaz/departamento_nivel_3/6/imagenes/', '8.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 6, 8, '2018-02-12 15:47:55', '2018-02-24 15:58:00'),
(75, 'interfaz/departamento_nivel_3/6/imagenes/', '9.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 6, 9, '2018-02-12 15:47:56', '2018-02-24 15:58:00'),
(76, 'interfaz/departamento_nivel_3/6/imagenes/', '10.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 6, 10, '2018-02-12 15:47:56', '2018-02-24 15:58:00'),
(77, 'interfaz/departamento_nivel_3/6/imagenes/', '11.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 6, 11, '2018-02-12 15:47:56', '2018-02-24 15:58:00'),
(78, 'interfaz/departamento_nivel_3/6/imagenes/', '12.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 6, 12, '2018-02-12 15:47:56', '2018-02-24 15:58:00'),
(79, 'interfaz/departamento_nivel_3/6/imagenes/', '13.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 6, 13, '2018-02-12 15:47:56', '2018-02-24 15:58:00'),
(80, 'interfaz/departamento_nivel_3/6/imagenes/', '14.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 6, 14, '2018-02-12 15:47:56', '2018-02-24 15:58:00'),
(81, 'interfaz/pagina/2/imagenes/', '1.jpeg', '', '', 'imagen', 'imagenes', 'pagina', 'id_pagina', 2, 1, '2018-02-12 16:48:11', '2018-04-05 19:22:20'),
(83, 'interfaz/pagina/2/imagenes/', '2.jpg', '', '', 'imagen', 'imagenes', 'pagina', 'id_pagina', 2, 2, '2018-02-12 16:48:11', '2018-04-05 19:22:20'),
(84, 'interfaz/pagina/2/imagenes/', '3.jpg', '', '', 'imagen', 'imagenes', 'pagina', 'id_pagina', 2, 3, '2018-02-12 16:48:11', '2018-04-05 19:22:20'),
(85, 'interfaz/pagina/2/imagenes/', '4.jpg', '', '', 'imagen', 'imagenes', 'pagina', 'id_pagina', 2, 4, '2018-02-12 16:48:12', '2018-04-05 19:22:20'),
(86, 'interfaz/pagina/2/imagenes/', '5.jpg', '', '', 'imagen', 'imagenes', 'pagina', 'id_pagina', 2, 5, '2018-02-12 16:48:12', '2018-04-05 19:22:20'),
(87, 'interfaz/pagina/2/imagenes/', '6.jpg', '', '', 'imagen', 'imagenes', 'pagina', 'id_pagina', 2, 6, '2018-02-12 16:48:12', '2018-04-05 19:22:20'),
(88, 'interfaz/pagina/2/imagenes/', '7.jpg', '', '', 'imagen', 'imagenes', 'pagina', 'id_pagina', 2, 7, '2018-02-12 16:48:12', '2018-04-05 19:22:20'),
(89, 'interfaz/pagina/2/fondo/', 'fondo_index.jpg', '', '', 'imagen', 'fondo', 'pagina', 'id_pagina', 2, 1, '2018-02-12 17:12:32', '2018-02-12 17:16:49'),
(90, 'interfaz/pagina/2/fondo/', 'fondo_index.jpg', '', '', 'imagen', 'fondo', 'pagina', 'id_pagina', 2, 1, '2018-02-12 17:17:00', '2018-02-12 17:17:03'),
(91, 'interfaz/pagina/2/fondo/', 'fondo_index.jpg', '', '', 'imagen', 'fondo', 'pagina', 'id_pagina', 2, 1, '2018-02-12 17:18:50', '2018-02-12 17:18:54'),
(94, 'interfaz/pagina/2/fondo/', 'fondo_index.jpg', '', '', 'imagen', 'fondo', 'pagina', 'id_pagina', 2, 1, '2018-02-12 17:24:43', '2018-04-05 19:22:20'),
(95, 'interfaz/blog_nivel_1/4/', 'c12.png', '', '', 'imagen', 'imagenes', 'nivel_1', 'n1_id', 4, 1, '2018-02-24 14:13:52', '2018-02-24 15:01:13'),
(96, 'interfaz/blog_nivel_1/5/', 'c1.png', '', '', 'imagen', 'imagenes', 'nivel_1', 'n1_id', 5, 1, '2018-02-24 14:16:08', '2018-02-24 15:01:16'),
(97, 'interfaz/blog_nivel_1/6/', 'c18.png', '', '', 'imagen', 'imagenes', 'nivel_1', 'n1_id', 6, 1, '2018-02-24 14:16:36', '2018-02-24 15:01:20'),
(98, 'interfaz/blog_nivel_2/6/', 'restaurante1.jpg', '', '', 'imagen', 'imagenes', 'nivel_2', 'n2_id', 6, 1, '2018-02-24 14:43:08', '2018-02-24 15:01:23'),
(99, 'interfaz/blog_nivel_2/7/', 'descarga1.jpg', '', '', 'imagen', 'imagenes', 'nivel_2', 'n2_id', 7, 1, '2018-02-24 14:50:15', '2018-02-24 15:01:27'),
(100, 'interfaz/blog_nivel_3/7/imagenes/', 'logo_ill_gatto1.png', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 7, 1, '2018-02-24 15:46:39', '2018-02-24 19:45:40'),
(101, 'interfaz/blog_nivel_3/7/imagenes/', '13735573_910130655780992_8124110596763554313_o1.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 7, 2, '2018-02-24 15:46:48', '2018-02-24 19:45:40'),
(102, 'interfaz/blog_nivel_3/8/imagenes/', 'el-cul1.png', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 8, 1, '2018-02-24 16:02:23', '2018-02-24 19:45:12'),
(103, 'interfaz/blog_nivel_3/8/imagenes/', 'centroculturalsanmartin1.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 8, 2, '2018-02-24 16:02:38', '2018-02-24 19:45:12'),
(104, 'interfaz/blog_nivel_3/9/imagenes/', 'home-es_r2_c21.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 9, 1, '2018-02-24 16:07:04', '2018-02-24 19:42:47'),
(105, 'interfaz/blog_nivel_3/9/imagenes/', 'gourmet-portenio-1948-42f55c20-3652-e890-f30d-55e84aea6b981.jpg', '', '', 'imagen', 'imagenes', 'nivel_3', 'n3_id', 9, 2, '2018-02-24 16:07:14', '2018-02-24 19:42:47'),
(109, 'interfaz/blog_nivel_4/2/imagenes/', '3.jpg', '', '', 'imagen', 'imagenes', 'nivel_4', 'n4_id', 2, 3, '2018-02-26 18:25:48', '2018-02-26 19:03:34'),
(110, 'interfaz/blog_nivel_4/2/imagenes/', '4.jpg', '', '', 'imagen', 'imagenes', 'nivel_4', 'n4_id', 2, 1, '2018-02-26 18:25:49', '2018-02-26 19:03:34'),
(111, 'interfaz/blog_nivel_4/2/imagenes/', '16.jpg', '', '', 'imagen', 'imagenes', 'nivel_4', 'n4_id', 2, 2, '2018-02-26 18:28:46', '2018-02-26 19:03:34'),
(112, 'interfaz/agenda_representantes/2/', 'centroculturalsanmartin2.jpg', '', '', 'imagen', 'imagenes', 'agenda_representantes', 'id_agenda_representantes', 2, 1, '2018-03-05 18:19:41', '2018-03-10 18:13:46'),
(113, 'interfaz/agenda_representantes/2/', 'perfil.jpg', '', '', 'imagen', 'imagenes', 'agenda_representantes', 'id_agenda_representantes', 2, 1, '2018-03-10 18:14:35', '2018-04-07 18:48:47');

--
-- Disparadores `archivo`
--
DELIMITER $$
CREATE TRIGGER `tg_archivo_creado` BEFORE INSERT ON `archivo` FOR EACH ROW BEGIN
	SET NEW.creado = CURRENT_TIMESTAMP;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tg_archivo_modificado` BEFORE UPDATE ON `archivo` FOR EACH ROW BEGIN
	SET NEW.modificado = CURRENT_TIMESTAMP;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id` int(11) NOT NULL,
  `empresa` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `inicio_fecha` date NOT NULL,
  `inicio_hora` time NOT NULL,
  `fin_fecha` date NOT NULL,
  `fin_hora` time NOT NULL,
  `asunto` tinyint(4) NOT NULL,
  `consulta` text NOT NULL,
  `creado` datetime NOT NULL,
  `visto` datetime NOT NULL,
  `respondido` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id`, `empresa`, `nombre`, `email`, `telefono`, `inicio_fecha`, `inicio_hora`, `fin_fecha`, `fin_hora`, `asunto`, `consulta`, `creado`, `visto`, `respondido`) VALUES
(1, '', 'Alejo Pais', '', '1533300950', '2010-01-01', '01:01:00', '0000-00-00', '00:00:00', 8, 'Consutla de prueba', '2017-08-19 20:25:53', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '', 'MeeM1234', '', '1533300950', '2112-01-01', '01:01:00', '0000-00-00', '00:00:00', 8, 'asdf sdaf sdafa sdfdsa fsd fas', '2017-08-19 20:33:11', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '', '', '', '', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 8, 'sddsdsdssd', '2017-08-19 20:33:53', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '', '', '', '', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 8, 'asdasd', '2017-08-19 20:41:09', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '', '', '', '', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 8, 'asdasd', '2017-08-19 20:43:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, '', 'Alejo Pais', '', '1533300950', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 8, 'asdasdasd asd asd as', '2017-08-19 20:47:39', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, '', 'Alejandro', '', '1533300950', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 8, 'asd asd as dasd asdsa', '2017-08-30 20:08:37', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, '', 'MeeM1234', '', '', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 8, 'asdasdasd', '2017-08-30 20:10:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, '', 'MeeM1234', '', '', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 8, 'asd das dasd ', '2017-08-30 20:16:24', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, '', 'asdasdas', '', '', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 8, 'aasdasdas', '2017-08-30 20:16:40', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, '', 'nombre', '', 'tel', '2017-08-15', '02:22:00', '0000-00-00', '00:00:00', 8, 'cxvxcvxcv', '2017-08-31 20:13:44', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, '', 'Martin Lopez', '', '1111-1111', '2017-08-15', '01:00:00', '0000-00-00', '00:00:00', 8, 'sdfdsf', '2017-08-31 20:18:12', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, '', 'martin', '', '', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 8, 'asdasd', '2017-09-02 14:47:23', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, '', 'Martin Lopez', '', '21321', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 8, 'dsafsdf', '2017-09-02 14:56:08', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, '', 'Martin Lopez', '', '1212', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 8, 'sdf dsxcvxc', '2017-09-02 14:57:52', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Empresa', 'Martin', '', 'tel', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 10, 'Consulta', '2017-10-18 16:12:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, '', '', '', '', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 8, '', '2017-10-18 16:12:28', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'Empresa', 'Martin Lopez', '', 'tel', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 8, 'askjdlaksjd', '2017-10-18 16:16:37', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, '', '', '', '', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 8, '', '2017-10-18 16:16:38', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Disparadores `contacto`
--
DELIMITER $$
CREATE TRIGGER `tg_contacto_creado` BEFORE INSERT ON `contacto` FOR EACH ROW BEGIN
	SET NEW.creado = CURRENT_TIMESTAMP;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diseño`
--

CREATE TABLE `diseño` (
  `id_diseño` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `descripcion` text NOT NULL,
  `estructura` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `diseño`
--

INSERT INTO `diseño` (`id_diseño`, `nombre`, `descripcion`, `estructura`) VALUES
(1, 'Diseño 1', '', '						<div class=\"seccion_g2 \" id=\"slides\"> 								<div style=\"background-image:url(interfaz/diseno/galeria_imagenes/galeria2.png); height:100%;\" class=\"img-responsive\"/></div> 								<div style=\"background-image:url(interfaz/diseno/galeria_imagenes/galeria1.png); height:100%;\" class=\"img-responsive\"/></div> 								<a href=\"#\" class=\"slidesjs-previous slidesjs-navigation\"><i class=\"icon-chevron-left icon-large\"></i></a> 				<a href=\"#\" class=\"slidesjs-next slidesjs-navigation\"><i class=\"icon-chevron-right icon-large\"></i></a> 			</div>'),
(2, 'Diseño 2', '', ''),
(3, 'Diseño 3', '', ''),
(4, 'Diseño 4', '', ''),
(5, 'Diseño 5', '', ''),
(6, 'Diseño 6', '', ''),
(7, 'Diseño 7', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `general`
--

CREATE TABLE `general` (
  `id` int(11) NOT NULL,
  `tabla_asociada` varchar(40) NOT NULL,
  `identificador_tabla` varchar(40) NOT NULL,
  `id_elemento` tinyint(6) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `contenido` text NOT NULL,
  `tipo` varchar(40) NOT NULL,
  `orden` tinyint(4) NOT NULL,
  `creado` datetime NOT NULL,
  `modificado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `general`
--

INSERT INTO `general` (`id`, `tabla_asociada`, `identificador_tabla`, `id_elemento`, `nombre`, `contenido`, `tipo`, `orden`, `creado`, `modificado`) VALUES
(1, 'usuario', 'id', 1, 'facebook', 'www.facebook.com/Alquiler-de-Departamentos-Temporarios-1783975585242029/', 'redes_sociales', 0, '2018-01-20 19:04:09', '2018-02-10 19:35:53'),
(2, 'usuario', 'id', 1, 'twitter', 'twitter.com/AlqDeptoTemp', 'redes_sociales', 0, '2018-01-20 19:04:09', '2018-02-10 19:35:53'),
(3, 'usuario', 'id', 1, 'linkedin', '', 'redes_sociales', 0, '2018-01-20 19:04:09', '2018-02-10 19:35:53'),
(4, 'usuario', 'id', 1, 'blogspot', '', 'redes_sociales', 0, '2018-01-20 19:04:09', '2018-02-10 19:35:53'),
(5, 'usuario', 'id', 1, 'youtube', '', 'redes_sociales', 0, '2018-01-20 19:04:09', '2018-02-10 19:35:53'),
(6, 'usuario', 'id', 1, 'mercadolibre', '', 'redes_sociales', 0, '2018-01-20 19:04:09', '2018-02-10 19:35:53'),
(7, 'usuario', 'id', 1, 'google', '', 'redes_sociales', 0, '2018-01-20 19:04:09', '2018-02-10 19:35:53'),
(8, 'usuario', 'id', 1, 'wikipedia', '', 'redes_sociales', 0, '2018-01-20 19:04:09', '2018-02-10 19:35:54'),
(9, 'usuario', 'id', 1, 'whatsapp', 'api.whatsapp.com/send?phone=541163782439&text=Hola%2C%20deseo%20adquirir%20informacion%20sobre%20los', 'redes_sociales', 0, '2018-01-20 19:04:36', '2018-02-10 19:35:53'),
(10, 'usuario', 'id', 1, 'instagram', 'www.instagram.com/alquilerdedepartamento/', 'redes_sociales', 0, '2018-02-10 19:35:53', '0000-00-00 00:00:00'),
(11, 'nivel_3', 'n3_id', 2, 'precio', '90', 'extra_departamento', 0, '2018-02-11 18:32:37', '2018-03-17 20:03:13'),
(12, 'nivel_3', 'n3_id', 2, 'direccion_casa', 'Fray Justo Sta. María de Oro 2400', 'extra_departamento', 0, '2018-02-11 18:32:37', '2018-02-12 15:50:34'),
(13, 'nivel_3', 'n3_id', 2, 'descripcion_corta', 'Departamento en Alquiler temporario, en Argentina Palermo. Departamento en alquiler Capital Federal, Palermo Soho', 'extra_departamento', 0, '2018-02-12 14:48:36', '2018-02-12 15:50:33'),
(14, 'nivel_3', 'n3_id', 2, 'ambientes', '1', 'extra_departamento', 0, '2018-02-12 15:21:49', '0000-00-00 00:00:00'),
(15, 'nivel_3', 'n3_id', 3, 'ambientes', '1', 'extra_departamento', 0, '2018-02-12 15:26:20', '0000-00-00 00:00:00'),
(16, 'nivel_3', 'n3_id', 3, 'direccion_casa', 'Ayacucho 1096', 'extra_departamento', 0, '2018-02-12 15:26:20', '0000-00-00 00:00:00'),
(17, 'nivel_3', 'n3_id', 3, 'precio', '90 u$u', 'extra_departamento', 0, '2018-02-12 15:30:29', '2018-02-12 15:52:04'),
(18, 'nivel_3', 'n3_id', 4, 'descripcion_corta', 'Departamento en Alquiler temporario, en argentina Palermo. Departamento en alquiler Buenos Aires, Las Cañitas', 'extra_departamento', 0, '2018-02-12 15:35:34', '0000-00-00 00:00:00'),
(19, 'nivel_3', 'n3_id', 4, 'ambientes', '1', 'extra_departamento', 0, '2018-02-12 15:35:34', '0000-00-00 00:00:00'),
(20, 'nivel_3', 'n3_id', 4, 'precio', '90 u$u', 'extra_departamento', 0, '2018-02-12 15:35:34', '2018-02-12 15:52:45'),
(21, 'nivel_3', 'n3_id', 5, 'descripcion_corta', 'Departamento en Alquiler temporario, en Mendoza, argentina ', 'extra_departamento', 0, '2018-02-12 15:39:20', '0000-00-00 00:00:00'),
(22, 'nivel_3', 'n3_id', 5, 'ambientes', '2', 'extra_departamento', 0, '2018-02-12 15:39:20', '0000-00-00 00:00:00'),
(23, 'nivel_3', 'n3_id', 5, 'precio', '60 u$u', 'extra_departamento', 0, '2018-02-12 15:39:20', '2018-02-12 15:53:07'),
(24, 'nivel_3', 'n3_id', 6, 'descripcion_corta', 'Departamento en Alquiler temporario, en Mendoza, argentina ', 'extra_departamento', 0, '2018-02-12 15:48:37', '0000-00-00 00:00:00'),
(25, 'nivel_3', 'n3_id', 6, 'ambientes', '2', 'extra_departamento', 0, '2018-02-12 15:48:37', '0000-00-00 00:00:00'),
(26, 'nivel_3', 'n3_id', 6, 'precio', '80 u$u por dia', 'extra_departamento', 0, '2018-02-12 15:48:37', '0000-00-00 00:00:00'),
(27, 'nivel_3', 'n3_id', 6, 'direccion_casa', 'Av. San Martín 807', 'extra_departamento', 0, '2018-02-12 15:48:37', '0000-00-00 00:00:00'),
(28, 'nivel_3', 'n3_id', 3, 'descripcion_corta', 'Departamento en Alquiler temporario, en Argentina Palermo. Departamento en alquiler Capital Federal, Recoleta', 'extra_departamento', 0, '2018-02-12 15:52:04', '0000-00-00 00:00:00'),
(29, 'nivel_3', 'n3_id', 4, 'direccion_casa', 'Av. Gral. Indalecio Chenaut 1967', 'extra_departamento', 0, '2018-02-12 15:52:45', '0000-00-00 00:00:00'),
(30, 'nivel_3', 'n3_id', 5, 'direccion_casa', 'Av. San Martín 807', 'extra_departamento', 0, '2018-02-12 15:53:07', '0000-00-00 00:00:00'),
(31, 'nivel_3', 'n3_id', 7, 'telefono', '011 4382-6322', 'extra_blog', 0, '2018-02-24 15:42:32', '0000-00-00 00:00:00'),
(32, 'nivel_3', 'n3_id', 7, 'direccion', 'Av. Corrientes 1269', 'extra_blog', 0, '2018-02-24 15:42:59', '0000-00-00 00:00:00'),
(33, 'nivel_3', 'n3_id', 7, 'provincia', 'CABA', 'extra_blog', 0, '2018-02-24 15:42:59', '0000-00-00 00:00:00'),
(34, 'nivel_3', 'n3_id', 7, 'pagina_web', 'http://www.ilgatto.com.ar/', 'extra_blog', 0, '2018-02-24 15:42:59', '0000-00-00 00:00:00'),
(35, 'nivel_3', 'n3_id', 7, 'email', 'info@ilgatto.com.ar', 'extra_blog', 0, '2018-02-24 15:42:59', '0000-00-00 00:00:00'),
(36, 'nivel_3', 'n3_id', 7, 'horario', '08 a 02', 'extra_blog', 0, '2018-02-24 15:43:00', '0000-00-00 00:00:00'),
(37, 'nivel_3', 'n3_id', 7, 'url_googlemaps', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4644.270054977001!2d-58.387087693807764!3d-34.60429174791272!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bccac5dc5b3c0b%3A0x431881adbc88fd3f!2sIl+Gatto+Sucursal+Tribunales!5e0!3m2!1ses-419!2sar!4v1516051203660\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'extra_blog', 0, '2018-02-24 15:43:00', '0000-00-00 00:00:00'),
(38, 'nivel_3', 'n3_id', 8, 'direccion', 'Sarmiento 1562', 'extra_blog', 0, '2018-02-24 16:05:33', '0000-00-00 00:00:00'),
(39, 'nivel_3', 'n3_id', 8, 'provincia', 'CABA', 'extra_blog', 0, '2018-02-24 16:05:33', '0000-00-00 00:00:00'),
(40, 'nivel_3', 'n3_id', 8, 'pagina_web', 'http://www.elculturalsanmartin.org/', 'extra_blog', 0, '2018-02-24 16:05:33', '0000-00-00 00:00:00'),
(41, 'nivel_3', 'n3_id', 8, 'email', 'info@elculturalsanmartin.org', 'extra_blog', 0, '2018-02-24 16:05:33', '0000-00-00 00:00:00'),
(42, 'nivel_3', 'n3_id', 8, 'horario', '10 a 24', 'extra_blog', 0, '2018-02-24 16:05:34', '0000-00-00 00:00:00'),
(43, 'nivel_3', 'n3_id', 8, 'url_googlemaps', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13135.828827199566!2d-58.3885697!3d-34.6052436!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x60d7d8df428bd5b2!2sCentro+Cultural+San+Mart%C3%ADn!5e0!3m2!1ses-419!2sar!4v1516052057592\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'extra_blog', 0, '2018-02-24 16:05:34', '0000-00-00 00:00:00'),
(44, 'nivel_3', 'n3_id', 9, 'telefono', ' 011 4312-3021', 'extra_blog', 0, '2018-02-24 16:06:45', '0000-00-00 00:00:00'),
(45, 'nivel_3', 'n3_id', 9, 'direccion', 'Av. Alicia Moreau de Justo 1942', 'extra_blog', 0, '2018-02-24 16:06:45', '0000-00-00 00:00:00'),
(46, 'nivel_3', 'n3_id', 9, 'provincia', 'CABA', 'extra_blog', 0, '2018-02-24 16:06:45', '0000-00-00 00:00:00'),
(47, 'nivel_3', 'n3_id', 9, 'pagina_web', ' http://gourmetporteno.com.ar', 'extra_blog', 0, '2018-02-24 16:06:45', '0000-00-00 00:00:00'),
(48, 'nivel_3', 'n3_id', 9, 'email', 'info@gourmetporteno.com.ar', 'extra_blog', 0, '2018-02-24 16:06:45', '0000-00-00 00:00:00'),
(49, 'nivel_3', 'n3_id', 9, 'horario', '10:00 a 15:00 / 20:00 a 24:00', 'extra_blog', 0, '2018-02-24 16:06:45', '0000-00-00 00:00:00'),
(50, 'nivel_3', 'n3_id', 9, 'url_googlemaps', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6566.621687902781!2d-58.36925758045654!3d-34.62158426411146!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x5f3e139f3e52d655!2sGourmet+Porte%C3%B1o!5e0!3m2!1ses-419!2sar!4v1516051002053\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'extra_blog', 0, '2018-02-24 16:06:46', '0000-00-00 00:00:00'),
(57, 'agenda_representantes', 'id_agenda', 2, 'client_id_mercadopago', '511810804293642', 'extra_agenda_representantes', 0, '2018-03-10 16:27:12', '2018-03-10 20:30:15'),
(58, 'agenda_representantes', 'id_agenda', 2, 'client_secret_mercadopago', 'H63MtQOzSrNCH6JqIaswQ4EF4Zfi5r2w', 'extra_agenda_representantes', 0, '2018-03-10 16:27:12', '0000-00-00 00:00:00'),
(59, 'agenda_representantes', 'id_agenda', 2, 'nro_comercio_todo_pago', '147012', 'extra_agenda_representantes', 0, '2018-03-10 17:26:57', '2018-04-07 18:48:46'),
(60, 'agenda_representantes', 'id_agenda', 2, 'credencial_todo_pago', 'TODOPAGO 5919fe15ecfb4db78c67a18b38eca01a', 'extra_agenda_representantes', 0, '2018-03-10 17:26:57', '2018-04-07 18:48:38'),
(61, 'agenda_representantes', 'id_agenda', 2, 'representante_cbu', '0150502301000129027026', 'extra_agenda_representantes', 0, '2018-03-10 18:13:46', '0000-00-00 00:00:00'),
(62, 'agenda_representantes', 'id_agenda', 2, 'representante_cuil', '20-34224518-9', 'extra_agenda_representantes', 0, '2018-03-10 18:13:46', '0000-00-00 00:00:00'),
(63, 'nivel_3', 'n3_id', 3, 'clave_wifi', '1234', 'extra_departamento', 0, '2018-03-10 19:10:53', '0000-00-00 00:00:00');

--
-- Disparadores `general`
--
DELIMITER $$
CREATE TRIGGER `tg_general_creado` BEFORE INSERT ON `general` FOR EACH ROW BEGIN
	SET NEW.creado = CURRENT_TIMESTAMP;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tg_general_modificado` BEFORE UPDATE ON `general` FOR EACH ROW BEGIN
	SET NEW.modificado = CURRENT_TIMESTAMP;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel_1`
--

CREATE TABLE `nivel_1` (
  `n1_id` int(11) NOT NULL,
  `n1_nombre` varchar(100) NOT NULL,
  `n1_corregido` varchar(100) NOT NULL COMMENT 'Nombre corregido. Sirve como url.',
  `n1_descripcion` text NOT NULL,
  `n1_tipo` varchar(30) NOT NULL COMMENT 'tipo de dato cargado (ej:categoria_producto)',
  `n1_orden` tinyint(6) DEFAULT NULL,
  `n1_inicio` date NOT NULL,
  `n1_fin` date NOT NULL,
  `n1_creado` datetime NOT NULL COMMENT 'Fecha de creación del campo',
  `n1_modificado` datetime NOT NULL COMMENT 'Fecha de modificacion del campo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `nivel_1`
--

INSERT INTO `nivel_1` (`n1_id`, `n1_nombre`, `n1_corregido`, `n1_descripcion`, `n1_tipo`, `n1_orden`, `n1_inicio`, `n1_fin`, `n1_creado`, `n1_modificado`) VALUES
(1, '', '', '', '', NULL, '0000-00-00', '0000-00-00', '2018-02-03 17:55:59', '0000-00-00 00:00:00'),
(2, 'Buenos Aires, Argentina', 'buenos-aires-argentina', '<p><strong>Buenos Aires</strong>, denominada oficialmente&nbsp;<strong>Ciudad Aut&oacute;noma de Buenos Aires</strong>,<sup class=\"reference separada\"><a href=\"https://es.wikipedia.org/wiki/Buenos_Aires#cite_note-5\">5</a></sup></p>\r\n<p>es la capital de la&nbsp;Rep&uacute;blica Argentina&nbsp;y el principal n&uacute;cleo urbano del pa&iacute;s. Est&aacute; situada en la regi&oacute;n centroeste del pa&iacute;s, sobre la orilla occidental del&nbsp;R&iacute;o de la Plata, en la&nbsp;llanura pampeana.</p>\r\n<p>Argentina&nbsp;es el pa&iacute;s m&aacute;s visitado de todo Sudam&eacute;rica y a su vez, Buenos Aires el destino preferido de los extranjeros con unas 4 millones de visitas al a&ntilde;o. Buenos Aires es una ciudad populosa y se encuentra entre los 20 destinos preferidos en todo el mundo.246</p>\r\n<p>&nbsp;<br />Los lugares tur&iacute;sticos m&aacute;s importantes se encuentran en el casco hist&oacute;rico de la ciudad, sector formado pr&aacute;cticamente por los barrios de&nbsp;Monserrat&nbsp;y&nbsp;San Telmo. &nbsp;Al este de la Plaza puede observarse la&nbsp;Casa Rosada, Hacia el norte de la Plaza se encuentra la&nbsp;Catedral Metropolitana, que ocupa el mismo lugar desde la colonia, y el edificio del&nbsp;Banco de la Naci&oacute;n Argentina, cuya parcela era en un principio propiedad de&nbsp;Juan de Garay.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;<br />La&nbsp;Avenida de Mayo,&nbsp;por esta avenida pueden observarse algunos edificios de gran inter&eacute;s cultural, arquitect&oacute;nico e hist&oacute;rico: se encuentran instalados la&nbsp;Casa de la Cultura, el&nbsp;Palacio Barolo&nbsp;y el&nbsp;Caf&eacute; Tortoni, entre otros.&nbsp;Al llegar al final de la arteria, &nbsp;se encuentra una copia firmada de&nbsp;El pensador&nbsp;de&nbsp;Rodin, el&nbsp;Palacio del Congreso&nbsp;y el edificio de la Confiter&iacute;a El Molino.</p>\r\n<p>En el Casco Hist&oacute;rico se puede visitar, adem&aacute;s, la&nbsp;Manzana de las Luces. All&iacute; se encuentran alojados varios edificios con gran valor hist&oacute;rico, como la Iglesia San Ignacio y la sede del&nbsp;Colegio Nacional de Buenos Aires. En la manzana pueden observarse los t&uacute;neles ocultos que recorr&iacute;an la ciudad durante la &eacute;poca colonial y puede recorrerse adem&aacute;s el edificio donde funcion&oacute; el Concejo Deliberante desde 1894 a 1931.</p>\r\n<p>En la zona de&nbsp;San Telmo&nbsp;puede visitarse la&nbsp;Plaza Dorrego, en donde todos los domingos se instala la famosa Feria de Antig&uuml;edades. Adem&aacute;s en sus cercan&iacute;as se ubican varios comercios de anticuarios y un complejo jesuita formado por la iglesia de Nuestra Se&ntilde;ora de Bethlem, la Parroquia de San Pedro Telmo y el Museo Penitenciario \"Antonio Ballve\". En la zona se encuentran adem&aacute;s el&nbsp;Museo Hist&oacute;rico Nacional&nbsp;y el&nbsp;Parque Lezama, donde fueron alojadas varias esculturas y monumentos.</p>\r\n<p>En el barrio de&nbsp;Recoleta&nbsp;se encuentran una gran cantidad de sitios tur&iacute;sticos y muchos que adem&aacute;s tienen un gran valor cultural. All&iacute; pueden encontrarse la sede principal del&nbsp;Museo Nacional de Bellas Artes, la&nbsp;Biblioteca Nacional, la&nbsp;floralis gen&eacute;rica, entre otros.</p>', 'departamento_nivel_1', 0, '0000-00-00', '0000-00-00', '2018-02-10 19:34:47', '0000-00-00 00:00:00'),
(3, 'Mendoza, Argentina', 'mendoza-argentina', '<p><strong>Mendoza Capital.</strong></p>\r\n<p>Mendoza es una de las ciudades m&aacute;s atractivas de Argentina, caracterizada por sus parques, paseos y su gastronom&iacute;a cosmopolita. Desde Mendoza, una de las capitales mundiales del vino, podemos visitar el exquisito circuito de bodegas argentinas o llegar hasta los faldeos del imponente cerro Aconcagua, en uno de los techos del mundo, la cordillera de Los andes. Mendoza es apacible, amigable y distinguida.</p>\r\n<p>Mendoza is one of the most attractive cities in Argentina, characterized by its parks and walks and its cosmopolitan gastronomy. From the city, one of the world capitals of the wine, we can visit the exquisite circuit of Argentine wineries or we can reach the slopes of the Aconcagua Mountain in one of the worlds roofs,&nbsp; la &ldquo;cordillera de Los Andes&rdquo;. Mendoza is&nbsp; friendly and distinguished.</p>', 'departamento_nivel_1', 0, '0000-00-00', '0000-00-00', '2018-02-10 19:47:14', '0000-00-00 00:00:00'),
(4, 'Gastronomía', 'gastronomia', '', 'blog_nivel_1', 0, '0000-00-00', '0000-00-00', '2018-02-24 14:14:37', '0000-00-00 00:00:00'),
(5, 'Cine', 'cine', '', 'blog_nivel_1', 0, '0000-00-00', '0000-00-00', '2018-02-24 14:16:10', '0000-00-00 00:00:00'),
(6, 'Teatro', 'teatro', '', 'blog_nivel_1', 0, '0000-00-00', '0000-00-00', '2018-02-24 14:16:41', '0000-00-00 00:00:00');

--
-- Disparadores `nivel_1`
--
DELIMITER $$
CREATE TRIGGER `tg_nivel_1_creado` BEFORE INSERT ON `nivel_1` FOR EACH ROW BEGIN
	SET NEW.n1_creado = CURRENT_TIMESTAMP;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel_2`
--

CREATE TABLE `nivel_2` (
  `n2_id` int(11) NOT NULL,
  `n2_nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `n2_corregido` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre corregido. Sirve como url.',
  `n2_descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `n1_id` smallint(6) NOT NULL,
  `n2_tipo` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `n2_orden` tinyint(6) NOT NULL,
  `n2_inicio` date NOT NULL,
  `n2_fin` date NOT NULL,
  `n2_creado` datetime NOT NULL,
  `n2_modificado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `nivel_2`
--

INSERT INTO `nivel_2` (`n2_id`, `n2_nombre`, `n2_corregido`, `n2_descripcion`, `n1_id`, `n2_tipo`, `n2_orden`, `n2_inicio`, `n2_fin`, `n2_creado`, `n2_modificado`) VALUES
(1, '', '', '', 0, '', 0, '0000-00-00', '0000-00-00', '2018-02-03 17:56:13', '0000-00-00 00:00:00'),
(2, 'Palermo Soho', 'palermo-soho', '<p><strong>Palermo Soho</strong></p>\r\n<p>Palermo es un extenso barrio residencial de Buenos Aires que se destaca por sus bellas avenidas arboladas y sus elegantes viviendas. Dentro del mismo encontramos el distrito \"Palermo Soho\",&nbsp; llamado as&iacute; por su estilo art&iacute;stico y bohemio. Sus viejos edificios han sido reciclados y convertidos en modernas instalaciones que mantienen su estilo original, especialmente en las fachadas. Las viejas casas se han convertido en restaurantes, bares, boutiques, galer&iacute;as de arte, bed and breafasts y acogedores hostales juveniles. Es considerado el centro del dise&ntilde;o de la Ciudad por la gran cantidad de tiendas de indumentarias de estilo que funcionan en la zona,&nbsp; tambi&eacute;n es un centro gourmet donde funcionan innumerables restaurantes que ofrecen una gastronom&iacute;a autoctona y de clase mundial. En Palermo Soho es el lugar ideal para un after office en sus numerosas terrazas donde a menudo hay shows de folk, jazz y tango.</p>\r\n<p>Palermo is an extensive residential neighborhood of Buenos Aires that stands out for its beautiful tree-lined avenues and elegant homes. Inside we find the district \"Palermo Soho\", named for its artistic and bohemian style. Its old buildings have been recycled and converted into modern facilities that maintain their original style, especially in the facades. The old houses have been converted into restaurants, bars, boutiques, art galleries, bed and breafasts and cozy youth hostels. It is considered the center of the design of the City by the large number of clothing stores of style that work in the area, it is also a gourmet center where innumerable restaurants that offer an autochthonous and world-class cuisine work. In Palermo Soho is the ideal place for an after office in its numerous terraces where there are often folk, jazz and tango shows</p>', 2, 'departamento_nivel_2', 0, '0000-00-00', '0000-00-00', '2018-02-10 20:30:41', '0000-00-00 00:00:00'),
(3, 'Recoleta', 'recoleta', '<p><strong>Recoleta</strong></p>\r\n<p>Recoleta es uno de los barrios m&aacute;s elegantes y aristocr&aacute;ticos de Buenos Aires. Es una zona de amplio inter&eacute;s hist&oacute;rico y arquitect&oacute;nico que se caracteriza por sus monumentos, paseos y su cementerio.&nbsp; Es un barrio poblado de galer&iacute;as de arte, locales de marcas afamadas, centros de dise&ntilde;o y exquisitos restaurantes</p>\r\n<p>Recoleta Recoleta is one of the most elegant and aristocratic neighborhoods of Buenos Aires. It is an area of broad historical and architectural interest, characterized by its monuments, walks and the cemetery . Recoleta has a lot of&nbsp; art galleries, famous brands, design centers and exquisite restaurants.</p>', 2, 'departamento_nivel_2', 0, '0000-00-00', '0000-00-00', '2018-02-10 20:40:06', '0000-00-00 00:00:00'),
(4, 'Las Cañitas', 'las-canitas', '<p><strong>Las Ca&ntilde;itas</strong>&nbsp;es la denominaci&oacute;n informal y no oficial de un sector de unas 20 manzanas dentro del barrio de&nbsp;<a title=\"Palermo (Buenos Aires)\" href=\"https://es.wikipedia.org/wiki/Palermo_(Buenos_Aires)\">Palermo</a>&nbsp;en la&nbsp;<a class=\"mw-redirect\" title=\"Ciudad Aut&oacute;noma de Buenos Aires\" href=\"https://es.wikipedia.org/wiki/Ciudad_Aut%C3%B3noma_de_Buenos_Aires\">Ciudad Aut&oacute;noma de Buenos Aires</a>.</p>\r\n<h2><span id=\"Origen_del_nombre\" class=\"mw-headline\">Origen del nombre</span></h2>\r\n<p>El nombre de Las Ca&ntilde;itas proviene del hecho que en el actual predio del barrio exist&iacute;a una&nbsp;<a title=\"Quinta\" href=\"https://es.wikipedia.org/wiki/Quinta\">quinta</a>&nbsp;llamada Las Ca&ntilde;itas, la misma estaba ubicada entre la actual&nbsp;<a title=\"Avenida Luis Mar&iacute;a Campos\" href=\"https://es.wikipedia.org/wiki/Avenida_Luis_Mar%C3%ADa_Campos\">Avenida Luis Mar&iacute;a Campos</a>, y la&nbsp;<a title=\"Avenida del Libertador\" href=\"https://es.wikipedia.org/wiki/Avenida_del_Libertador\">Avenida del Libertador</a>. La quinta existi&oacute; hasta principios del&nbsp;<a title=\"Siglo XX\" href=\"https://es.wikipedia.org/wiki/Siglo_XX\">siglo XX</a>. Se llama as&iacute; a la quinta por el ca&ntilde;averal que hab&iacute;a en los bajos del&nbsp;<a title=\"Arroyo Maldonado\" href=\"https://es.wikipedia.org/wiki/Arroyo_Maldonado\">arroyo Maldonado</a>.</p>\r\n<p>Al costado de esta quinta exist&iacute;a un camino llamado popularmente El Camino de las Ca&ntilde;itas, dicho camino con los a&ntilde;os se transform&oacute; en una avenida manteniendo el nombre originario, cambiando de nombre a Avenida Luis Mar&iacute;a Campos a trav&eacute;s de una&nbsp;<a class=\"new\" title=\"Ordenanza Municipal (a&uacute;n no redactado)\" href=\"https://es.wikipedia.org/w/index.php?title=Ordenanza_Municipal&amp;action=edit&amp;redlink=1\">ordenanza municipal</a>&nbsp;del a&ntilde;o 1914, nombre que mantiene actualmente.</p>\r\n<h2><span id=\"Ubicaci.C3.B3n\"></span><span id=\"Ubicaci&oacute;n\" class=\"mw-headline\">Ubicaci&oacute;n</span></h2>\r\n<p>Aunque los l&iacute;mites de esta zona no est&aacute;n exactamente marcados, puede decirse que Las Ca&ntilde;itas est&aacute; situado entre las avenidas&nbsp;<a title=\"Avenida Luis Mar&iacute;a Campos\" href=\"https://es.wikipedia.org/wiki/Avenida_Luis_Mar%C3%ADa_Campos\">Luis Mar&iacute;a Campos</a>,&nbsp;<a title=\"Avenida Dorrego\" href=\"https://es.wikipedia.org/wiki/Avenida_Dorrego\">Dorrego</a>,&nbsp;<a title=\"Avenida del Libertador\" href=\"https://es.wikipedia.org/wiki/Avenida_del_Libertador\">Del Libertador</a>&nbsp;y la calle Matienzo, rodeando el Campo H&iacute;pico Militar y limitando con el sector llamado&nbsp;<a title=\"La Imprenta (Buenos Aires)\" href=\"https://es.wikipedia.org/wiki/La_Imprenta_(Buenos_Aires)\">La Imprenta</a>&nbsp;que se extiende a partir de la calle Benjam&iacute;n Matienzo.</p>\r\n<h2><span id=\"Nuevos_edificios_en_el_barrio\" class=\"mw-headline\">Nuevos edificios en el barrio</span></h2>\r\n<p>En la segunda d&eacute;cada del siglo XXI Las Ca&ntilde;itas, al igual que La Imprenta, han venido experimentando una explosi&oacute;n de construcci&oacute;n de edificios de alta categor&iacute;a y grandes torres, esto es debido al crecimiento econ&oacute;mico del pa&iacute;s y a que la zona es de alto poder adquisitivo.</p>', 2, 'departamento_nivel_2', 0, '0000-00-00', '0000-00-00', '2018-02-11 15:46:33', '0000-00-00 00:00:00'),
(5, 'Mendoza Capital.', 'mendoza-capital', '<p><strong>Mendoza Capital.</strong></p>\r\n<p>Mendoza es una de las ciudades m&aacute;s atractivas de Argentina, caracterizada por sus parques, paseos y su gastronom&iacute;a cosmopolita. Desde Mendoza, una de las capitales mundiales del vino, podemos visitar el exquisito circuito de bodegas argentinas o llegar hasta los faldeos del imponente cerro Aconcagua, en uno de los techos del mundo, la cordillera de Los andes. Mendoza es apacible, amigable y distinguida.</p>\r\n<p>Mendoza is one of the most attractive cities in Argentina, characterized by its parks and walks and its cosmopolitan gastronomy. From the city, one of the world capitals of the wine, we can visit the exquisite circuit of Argentine wineries or we can reach the slopes of the Aconcagua Mountain in one of the worlds roofs,&nbsp; la &ldquo;cordillera de Los Andes&rdquo;. Mendoza is&nbsp; friendly and distinguished.</p>', 3, 'departamento_nivel_2', 0, '0000-00-00', '0000-00-00', '2018-02-11 15:48:52', '0000-00-00 00:00:00'),
(6, 'Restaurantes', 'restaurantes', '', 4, 'blog_nivel_2', 0, '0000-00-00', '0000-00-00', '2018-02-24 14:43:33', '0000-00-00 00:00:00'),
(7, 'Ciclos', 'ciclos', '', 5, 'blog_nivel_2', 0, '0000-00-00', '0000-00-00', '2018-02-24 14:53:32', '0000-00-00 00:00:00');

--
-- Disparadores `nivel_2`
--
DELIMITER $$
CREATE TRIGGER `tg_nivel_2_creado` BEFORE INSERT ON `nivel_2` FOR EACH ROW BEGIN
	SET NEW.n2_creado = CURRENT_TIMESTAMP;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel_3`
--

CREATE TABLE `nivel_3` (
  `n3_id` int(11) NOT NULL,
  `n3_nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `n3_corregido` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre corregido. Sirve como url.',
  `n3_descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `n1_id` smallint(6) NOT NULL,
  `n2_id` smallint(6) NOT NULL,
  `n3_tipo` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `n3_orden` smallint(6) NOT NULL,
  `n3_inicio` date NOT NULL,
  `n3_fin` date NOT NULL,
  `n3_creado` datetime NOT NULL,
  `n3_modificado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `nivel_3`
--

INSERT INTO `nivel_3` (`n3_id`, `n3_nombre`, `n3_corregido`, `n3_descripcion`, `n1_id`, `n2_id`, `n3_tipo`, `n3_orden`, `n3_inicio`, `n3_fin`, `n3_creado`, `n3_modificado`) VALUES
(1, '', '', '', 0, 0, '', 0, '0000-00-00', '0000-00-00', '2018-02-03 17:58:10', '0000-00-00 00:00:00'),
(2, 'Palermo 1', 'palermo-1', '<div data-reactid=\"537\">&nbsp;<strong>Palermo Soho</strong></div>\r\n<div class=\"row row-condensed\" data-reactid=\"543\">\r\n<div class=\"col-12\" data-reactid=\"544\">\r\n<div data-reactid=\"545\">\r\n<div class=\"react-expandable expanded\" data-reactid=\"546\">\r\n<div class=\"expandable-content\" tabindex=\"-1\" data-reactid=\"547\">\r\n<div data-reactid=\"564\">\r\n<div data-reactid=\"568\">\r\n<div class=\"simple-format-container\" data-reactid=\"569\">\r\n<div class=\"\" data-reactid=\"747\">\r\n<div data-reactid=\"748\">\r\n<div class=\"bottom-spacing-negative-2\" data-reactid=\"753\">\r\n<div class=\"row\" data-reactid=\"754\">\r\n<p>Palermo es un extenso barrio residencial de Buenos Aires que se destaca por sus bellas avenidas arboladas y sus elegantes viviendas. Dentro del mismo encontramos el distrito \"Palermo Soho\",&nbsp; llamado as&iacute; por su estilo art&iacute;stico y bohemio. Sus viejos edificios han sido reciclados y convertidos en modernas instalaciones que mantienen su estilo original, especialmente en las fachadas. Las viejas casas se han convertido en restaurantes, bares, boutiques, galer&iacute;as de arte, bed and breafasts y acogedores hostales juveniles. Es considerado el centro del dise&ntilde;o de la Ciudad por la gran cantidad de tiendas de indumentarias de estilo que funcionan en la zona,&nbsp; tambi&eacute;n es un centro gourmet donde funcionan innumerables restaurantes que ofrecen una gastronom&iacute;a autoctona y de clase mundial. En Palermo Soho es el lugar ideal para un after office en sus numerosas terrazas donde a menudo hay shows de folk, jazz y tango.</p>\r\n<p>Palermo is an extensive residential neighborhood of Buenos Aires that stands out for its beautiful tree-lined avenues and elegant homes. Inside we find the district \"Palermo Soho\", named for its artistic and bohemian style. Its old buildings have been recycled and converted into modern facilities that maintain their original style, especially in the facades. The old houses have been converted into restaurants, bars, boutiques, art galleries, bed and breafasts and cozy youth hostels. It is considered the center of the design of the City by the large number of clothing stores of style that work in the area, it is also a gourmet center where innumerable restaurants that offer an autochthonous and world-class cuisine work. In Palermo Soho is the ideal place for an after office in its numerous terraces where there are often folk, jazz and tango shows</p>\r\n<p>Departamento en alquiler Capital Federal, Palermo Soho&nbsp;<strong>$90 d&oacute;lares por dia</strong></p>\r\n<p><a href=\"../contacto\">Consultar por promoci&oacute;n</a>&nbsp;Fin de semana, (viernes, s&aacute;bado y domingo) y fines de semana largos.</p>\r\n<p>Mas datos sobre la ubicaci&oacute;n:</p>\r\n<p>&ldquo;V&iacute;a Baires&rdquo; en Palermo Soho te ofrece un espacio amplio, luminoso, confortable y acogedor. Muy bien ubicado en zona de malls (&ldquo;Distrito los Arcos&rdquo; y&nbsp; &ldquo;Alto Palermo&rdquo;), restaurantes y pubs. Cercan&iacute;a con predio de la&nbsp; Sociedad Rural y Embajada E.E.U.U. Recomendado para dos o&nbsp;&nbsp; cuatro hu&eacute;spedes.</p>\r\n<p>El departamento cuenta con:</p>\r\n<p>Cama matrimonial y sof&aacute; cama doble (capacidad total 4 personas).</p>\r\n<p>Dos pantallas de TV y equipo de audio.</p>\r\n<p>Aire acondicionado frio/calo.,&nbsp;</p>\r\n<p>Tel&eacute;fono de l&iacute;nea, cable, wifi.</p>\r\n<p>Cocina con horno, heladera con freezer, cafetera, tostadora, tetera el&eacute;ctrica y equipamiento de utensilios completo.</p>\r\n<p>Ba&ntilde;o completo con bid&eacute; y ba&ntilde;era.</p>\r\n<p>Cerramiento con grandes ventanales, mucha luz y aire.</p>\r\n<p>Posibilidad de contratar cochera en forma particular, a menos de 100 metros, del departamento.</p>\r\n<p>La limpieza se realiza semanalmente con posibilidad de pagar extra un servicio de limpieza diario.</p>\r\n<p>No se permiten mascotas y no se permiten realizar fiestas.</p>\r\n<p>Respetar c&oacute;digo de convivencia y reglamento de copropiedad</p>\r\n<p><strong>Tabla de precios:</strong></p>\r\n<p><strong>90&nbsp;d&oacute;lares</strong>&nbsp;por d&iacute;a.</p>\r\n<p><a href=\"../contacto\">Consultar por promoci&oacute;n</a>&nbsp;Fin de semana, (viernes, s&aacute;bado y domingo) y fines de semana largos.</p>\r\n<p class=\"bottom-spacing-2 col-md-6\" data-reactid=\"756\">&nbsp;</p>\r\n<p>Formas de pagos:</p>\r\n<p>Contado, Todo Pago, tarjeta de cr&eacute;dito o transferencia bancaria.&emsp;</p>\r\n<p>&nbsp;</p>\r\n<p><strong>BUENOS AIRES</strong></p>\r\n<p><strong>Palermo Soho</strong></p>\r\n<p>Apartment for rent Capital Federal, Palermo Soho&nbsp;<strong>90 d&oacute;lares</strong></p>\r\n<p><a href=\"../contacto\">Consult by promotions Weekend,</a>&nbsp;(Friday, Saturday and Sunday) and long weekends.</p>\r\n<p>More information about the location:</p>\r\n<p>Via Baires in Palermo Soho offers a spacious, bright, comfortable and welcoming space. Very well located in the area of shopping centers, restaurants and pubs. Cercania with property of the Rural Society and Embassy E.E.U.U.Recommended for two or four guests,.</p>\r\n<p>The state has:</p>\r\n<p>Double bed and double sofa bed. (Capacity&nbsp;4 people)</p>\r\n<p>Two TV screens and audio equipment.</p>\r\n<p>Air conditioning cold / hot,</p>\r\n<p>Telephone line, cable, wifi.</p>\r\n<p>Kitchen with oven, refrigerator with freezer, coffee maker, toaster, electric kettle full equipment utensils.</p>\r\n<p>Full bathroom with bidet and bathtub.</p>\r\n<p>Enclosure with large windows, lots of light and air.</p>\r\n<p>Possibility of hiring parking space / garage in a private way, less than 100 meters from the apartment.</p>\r\n<p>The cleaning is done without problems with the possibility of paying extra a daily cleaning service.</p>\r\n<p>Pets and parties are not allowed.</p>\r\n<p>Respect code of coexistence and co-ownership regulations</p>\r\n<p><strong>Table of prices:</strong></p>\r\n<p><strong>90 dolares</strong>, day.</p>\r\n<p><a href=\"../contacto\">Consult by promotions</a>&nbsp;Weekend, (Friday, Saturday and Sunday) and long weekends.</p>\r\n<p>Forms of payment:</p>\r\n<p>Counted, All Payment, credit card or bank transfer.</p>\r\n<p class=\"bottom-spacing-2 col-md-6\" data-reactid=\"756\"><strong data-reactid=\"758\">&nbsp;</strong></p>\r\n<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.937144248328!2d-58.42768668431262!3d-34.58045696377554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb584d41aeb39%3A0x27ac167d899050b2!2sFray+Justo+Sta.+Maria+de+Oro+2400%2C+Buenos+Aires%2C+Argentina!5e0!3m2!1ses!2sar!4v1506026549853\" width=\"100%\" height=\"450\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\"></iframe>\r\n<div class=\"bottom-spacing-2 col-md-6\" data-reactid=\"756\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 2, 2, 'departamento_nivel_3', 0, '0000-00-00', '0000-00-00', '2018-02-11 18:32:37', '0000-00-00 00:00:00'),
(3, 'Recoleta 1', 'recoleta-1', '<p>Recoleta</p>\r\n<p>Recoleta es uno de los barrios m&aacute;s elegantes y aristocr&aacute;ticos de Buenos Aires. Es una zona de amplio inter&eacute;s hist&oacute;rico y arquitect&oacute;nico que se caracteriza por sus monumentos, paseos y su cementerio.&nbsp; Es un barrio poblado de galer&iacute;as de arte, locales de marcas afamadas, centros de dise&ntilde;o y exquisitos restaurantes</p>\r\n<p>Recoleta Recoleta is one of the most elegant and aristocratic neighborhoods of Buenos Aires. It is an area of broad historical and architectural interest, characterized by its monuments, walks and the cemetery . Recoleta has a lot of&nbsp; art galleries, famous brands, design centers and exquisite restaurants.</p>\r\n<p>Recoleta</p>\r\n<p>Excelente departamento, sobre Av. Santa Fe, te amplio, luminoso, confortable y acogedor. Muy bien ubicado entre el centro de la ciudad y Palermo. Con cercan&iacute;a a shoppings, restaurantes y paseos.</p>\r\n<p>&nbsp;El departamento cuenta con:</p>\r\n<p>Cama matrimonial, mas 2 sofa cama plaza y media (capacidad&nbsp;4 personas), placares c&oacute;modos.&nbsp;</p>\r\n<p>Cocina con equipamiento completo de utensilios.&nbsp;</p>\r\n<p>Cocina con 4 hornallas con horno, heladera, cafetera, tostadora, tetera el&eacute;ctrica, micro ondas.</p>\r\n<p>Ba&ntilde;o completo, con ba&ntilde;era y bidet.</p>\r\n<p>Cama matrimonial, mas 2 sof&aacute; cama plaza y media.&nbsp;</p>\r\n<p>TV y Wi Fi.</p>\r\n<p>&nbsp;Aire acondicionado frio y calor.</p>\r\n<p>&nbsp;Grandes ventanales, mucha luz y aire, balcon corrido sobre Santa Fe, 10&ordm; piso.</p>\r\n<p>&nbsp;La limpieza se realiza semanalmente con posibilidad de pagar extra un servicio de limpieza diario.</p>\r\n<p>&nbsp;No se permiten mascotas y no se permiten realizar fiestas.</p>\r\n<p>&nbsp;Respetar c&oacute;digo de convivencia y reglamento de copropiedad</p>\r\n<p><strong>Tabla de precios:</strong></p>\r\n<p><strong>90 d&oacute;lares&nbsp;por d&iacute;a</strong></p>\r\n<p><a href=\"../contacto\">Consultar por promoci&oacute;nes</a>&nbsp;Fin de semana, (viernes, s&aacute;bado y domingo) y fines de semana largos.</p>\r\n<p>&nbsp;</p>\r\n<p>Formas de pagos:</p>\r\n<p>Contado o Transferencia bancaria.</p>\r\n<p>Recoleta&nbsp;</p>\r\n<p>Excellent apartment, in Av. Santa Fe, you spacious, bright and comfortable. Very well located between the center of the city and Palermo. With proximity to shopping malls, restaurants and walks.</p>\r\n<p>&nbsp;</p>\r\n<p>The apartment has:&nbsp;</p>\r\n<p>Double bed, 2 sofa beds (sleeps&nbsp;4 people), comfortable closets.</p>\r\n<p>&nbsp;Kitchen with full equipment utensils.</p>\r\n<p>Kitchen with oven, refrigerator, coffee maker, toaster, electric kettle full equipment utensils.</p>\r\n<p>&nbsp;TV and Wi Fi.&nbsp;</p>\r\n<p>Air conditioning</p>\r\n<p>Full bathroom with bidet and bathtub.</p>\r\n<p>Respect code of coexistence and co-ownership regulations&nbsp;</p>\r\n<p>Enclosure with windows, lots of light and air,&nbsp;balcony run over Santa Fe, 10th floor.</p>\r\n<p>Pets and parties are not allowed.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Table of prices:&nbsp;</p>\r\n<p><strong>90 d&oacute;lares</strong>&nbsp;day.&nbsp;</p>\r\n<p><a href=\"../contacto\">Consult by promotions</a>&nbsp;Weekend, (Friday, Saturday and Sunday) and long weekends.</p>\r\n<p>&nbsp;Forms of payment:</p>\r\n<p>&nbsp;Counted, or bank transfer.</p>\r\n<p><iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.3255908511715!2d-58.39836258477055!3d-34.595927480461405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcca966db11ab3%3A0xc4ad6e3b5ad235d!2sAyacucho+1096%2C+C1111AAF+CABA!5e0!3m2!1ses!2sar!4v1505498886011\" width=\"100%\" height=\"450\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\"></iframe></p>\r\n<p>&nbsp;</p>', 2, 3, 'departamento_nivel_3', 0, '0000-00-00', '0000-00-00', '2018-02-12 15:26:20', '0000-00-00 00:00:00'),
(4, 'Las Cañitas 1', 'las-canitas-1', '<div data-reactid=\"537\"><span style=\"color: #000000;\"><strong>Las Ca&ntilde;itas</strong></span></div>\r\n<div class=\"row row-condensed\" data-reactid=\"543\">\r\n<div class=\"col-12\" data-reactid=\"544\">\r\n<div data-reactid=\"545\">\r\n<div class=\"react-expandable expanded\" data-reactid=\"546\">\r\n<div class=\"expandable-content\" tabindex=\"-1\" data-reactid=\"547\">\r\n<div data-reactid=\"564\">\r\n<div data-reactid=\"568\">\r\n<div class=\"simple-format-container\" data-reactid=\"569\">\r\n<div class=\"\" data-reactid=\"747\">\r\n<div data-reactid=\"748\">\r\n<div class=\"bottom-spacing-negative-2\" data-reactid=\"753\">\r\n<div class=\"row\" data-reactid=\"754\">\r\n<p><span style=\"color: #000000;\">Palermo es un extenso barrio residencial de Buenos Aires que se destaca por sus bellas avenidas arboladas y sus elegantes viviendas. Dentro del mismo encontramos el distrito \"Palermo Soho\",&nbsp; llamado as&iacute; por su estilo art&iacute;stico y bohemio. Sus viejos edificios han sido reciclados y convertidos en modernas instalaciones que mantienen su estilo original, especialmente en las fachadas. Las viejas casas se han convertido en restaurantes, bares, boutiques, galer&iacute;as de arte, bed and breafasts y acogedores hostales juveniles. Es considerado el centro del dise&ntilde;o de la Ciudad por la gran cantidad de tiendas de indumentarias de estilo que funcionan en la zona,&nbsp; tambi&eacute;n es un centro gourmet donde funcionan innumerables restaurantes que ofrecen una gastronom&iacute;a autoctona y de clase mundial. En Palermo Soho es el lugar ideal para un after office en sus numerosas terrazas donde a menudo hay shows de folk, jazz y tango.</span></p>\r\n<p><span style=\"color: #000000;\">Palermo is an extensive residential neighborhood of Buenos Aires that stands out for its beautiful tree-lined avenues and elegant homes. Inside we find the district \"Palermo Soho\", named for its artistic and bohemian style. Its old buildings have been recycled and converted into modern facilities that maintain their original style, especially in the facades. The old houses have been converted into restaurants, bars, boutiques, art galleries, bed and breafasts and cozy youth hostels. It is considered the center of the design of the City by the large number of clothing stores of style that work in the area, it is also a gourmet center where innumerable restaurants that offer an autochthonous and world-class cuisine work. In Palermo Soho is the ideal place for an after office in its numerous terraces where there are often folk, jazz and tango shows</span></p>\r\n<p><span style=\"color: #000000;\">&nbsp;</span></p>\r\n<p><span style=\"color: #000000;\">&nbsp;</span></p>\r\n<p><span style=\"color: #000000;\">Departamento en alquiler&nbsp;Capital Federal, Palermo Soho&nbsp;<strong>$90 d&oacute;lares por dia</strong></span></p>\r\n<p><span style=\"color: #000000;\"><a style=\"color: #000000;\" href=\"../buenos-aires-argentina/contacto\">Consultar por promoci&oacute;n</a>&nbsp;Fin de semana, (viernes, s&aacute;bado y domingo) y fines de semana largos.</span></p>\r\n<p><span style=\"color: #000000;\">Mas datos sobre la ubicaci&oacute;n:</span></p>\r\n<p><span style=\"color: #000000;\">&ldquo;V&iacute;a Baires&rdquo; en Palermo Soho te ofrece un espacio amplio, luminoso, confortable y acogedor. Muy bien ubicado en zona de malls (&ldquo;Distrito los Arcos&rdquo; y&nbsp; &ldquo;Alto Palermo&rdquo;), restaurantes y pubs. Cercan&iacute;a con predio de la&nbsp; Sociedad Rural y Embajada E.E.U.U. Recomendado para dos o&nbsp;&nbsp; cuatro hu&eacute;spedes.</span></p>\r\n<p><span style=\"color: #000000;\">El departamento cuenta con:</span></p>\r\n<p><span style=\"color: #000000;\">Cama matrimonial y sof&aacute; cama doble (capacidad total 4 personas).</span></p>\r\n<p><span style=\"color: #000000;\">Dos pantallas de TV y equipo de audio.</span></p>\r\n<p><span style=\"color: #000000;\">Aire acondicionado frio/calo.,&nbsp;</span></p>\r\n<p><span style=\"color: #000000;\">Tel&eacute;fono de l&iacute;nea, cable, wifi.</span></p>\r\n<p><span style=\"color: #000000;\">Cocina con horno, heladera con freezer, cafetera, tostadora, tetera el&eacute;ctrica y equipamiento de utensilios completo.</span></p>\r\n<p><span style=\"color: #000000;\">Ba&ntilde;o completo con bid&eacute; y ba&ntilde;era.</span></p>\r\n<p><span style=\"color: #000000;\">Cerramiento con grandes ventanales, mucha luz y aire.</span></p>\r\n<p><span style=\"color: #000000;\">Posibilidad de contratar cochera en forma particular, a menos de 100 metros, del departamento.</span></p>\r\n<p><span style=\"color: #000000;\">La limpieza se realiza semanalmente con posibilidad de pagar extra un servicio de limpieza diario.</span></p>\r\n<p><span style=\"color: #000000;\">No se permiten mascotas y no se permiten realizar fiestas.</span></p>\r\n<p><span style=\"color: #000000;\">Respetar c&oacute;digo de convivencia y reglamento de copropiedad</span></p>\r\n<p><span style=\"color: #000000;\"><strong>Tabla de precios:</strong></span></p>\r\n<p><span style=\"color: #000000;\"><strong>90&nbsp;d&oacute;lares</strong>&nbsp;por d&iacute;a.</span></p>\r\n<p><span style=\"color: #000000;\"><a style=\"color: #000000;\" href=\"../buenos-aires-argentina/contacto\">Consultar por promoci&oacute;n</a>&nbsp;Fin de semana, (viernes, s&aacute;bado y domingo) y fines de semana largos.</span></p>\r\n<p class=\"bottom-spacing-2 col-md-6\" data-reactid=\"756\"><span style=\"color: #000000;\">&nbsp;</span></p>\r\n<p><span style=\"color: #000000;\">Formas de pagos:</span></p>\r\n<p><span style=\"color: #000000;\">Contado, Todo Pago, tarjeta de cr&eacute;dito o transferencia bancaria.&emsp;</span></p>\r\n<p><span style=\"color: #000000;\">&nbsp;</span></p>\r\n<p><span style=\"color: #000000;\"><strong>BUENOS AIRES</strong></span></p>\r\n<p><span style=\"color: #000000;\"><strong>Las ca&ntilde;itas</strong></span></p>\r\n<p><span style=\"color: #000000;\">Apartment for rent&nbsp;Capital Federal, Palermo Soho&nbsp;<strong>90 d&oacute;lares</strong></span></p>\r\n<p><span style=\"color: #000000;\"><a style=\"color: #000000;\" href=\"../buenos-aires-argentina/contacto\">Consult by promotions Weekend,</a>&nbsp;(Friday, Saturday and Sunday) and long weekends.</span></p>\r\n<p><span style=\"color: #000000;\">More information about the location:</span></p>\r\n<p><span style=\"color: #000000;\">Via Baires in Palermo Soho offers a spacious, bright, comfortable and welcoming space. Very well located in the area of shopping centers, restaurants and pubs. Cercania with property of the Rural Society and Embassy E.E.U.U.Recommended for two or four guests,.</span></p>\r\n<p><span style=\"color: #000000;\">The state has:</span></p>\r\n<p><span style=\"color: #000000;\">Double bed and double sofa bed. (Capacity&nbsp;4 people)</span></p>\r\n<p><span style=\"color: #000000;\">Two TV screens and audio equipment.</span></p>\r\n<p><span style=\"color: #000000;\">Air conditioning cold / hot,</span></p>\r\n<p><span style=\"color: #000000;\">Telephone line, cable, wifi.</span></p>\r\n<p><span style=\"color: #000000;\">Kitchen with oven, refrigerator with freezer, coffee maker, toaster, electric kettle full equipment utensils.</span></p>\r\n<p><span style=\"color: #000000;\">Full bathroom with bidet and bathtub.</span></p>\r\n<p><span style=\"color: #000000;\">Enclosure with large windows, lots of light and air.</span></p>\r\n<p><span style=\"color: #000000;\">Possibility of hiring parking space / garage in a private way, less than 100 meters from the apartment.</span></p>\r\n<p><span style=\"color: #000000;\">The cleaning is done without problems with the possibility of paying extra a daily cleaning service.</span></p>\r\n<p><span style=\"color: #000000;\">Pets and parties are not allowed.</span></p>\r\n<p><span style=\"color: #000000;\">Respect code of coexistence and co-ownership regulations</span></p>\r\n<p><span style=\"color: #000000;\"><strong>Table of prices:</strong></span></p>\r\n<p><span style=\"color: #000000;\"><strong>90 dolares</strong>, day.</span></p>\r\n<p><span style=\"color: #000000;\"><a style=\"color: #000000;\" href=\"../buenos-aires-argentina/contacto\">Consult by promotions</a>&nbsp;Weekend, (Friday, Saturday and Sunday) and long weekends.</span></p>\r\n<p><span style=\"color: #000000;\">Forms of payment:</span></p>\r\n<p><span style=\"color: #000000;\">Counted, All Payment, credit card or bank transfer.</span></p>\r\n<p>&nbsp;</p>\r\n<p><iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3285.263455037641!2d-58.43300939168897!3d-34.57219977315496!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb5bdf4b7a399%3A0xa25f7146c067f76f!2sAv.+Gral.+Indalecio+Chenaut+1967%2C+Buenos+Aires!5e0!3m2!1ses-419!2sar!4v1518180024363\" width=\"100%\" height=\"450\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\"></iframe></p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 2, 4, 'departamento_nivel_3', 0, '0000-00-00', '0000-00-00', '2018-02-12 15:35:34', '0000-00-00 00:00:00'),
(5, 'Mendoza 1', 'mendoza-1', '<p><strong>MENDOZA</strong></p>\r\n<p><strong>Mendoza Capital.</strong></p>\r\n<p>Mendoza es una de las ciudades m&aacute;s atractivas de Argentina, caracterizada por sus parques, paseos y su gastronom&iacute;a cosmopolita. Desde Mendoza, una de las capitales mundiales del vino, podemos visitar el exquisito circuito de bodegas argentinas o llegar hasta los faldeos del imponente cerro Aconcagua, en uno de los techos del mundo, la cordillera de Los andes. Mendoza es apacible, amigable y distinguida.&nbsp;</p>\r\n<p>Mendoza is one of the most attractive cities in Argentina, characterized by its parks and walks and its cosmopolitan gastronomy. From the city, one of the world capitals of the wine, we can visit the exquisite circuit of Argentine wineries or we can reach the slopes of the Aconcagua Mountain in one of the world s roofs,&nbsp; la&nbsp; \"<strong>cordillera de Los Andes\"</strong>. Mendoza is&nbsp; friendly and distinguished.</p>\r\n<p>Mendoza</p>\r\n<p>Departamento en Alquiler temporario, en Mendoza Argentina . 60 u$u por dia.</p>\r\n<p>Mas datos sobre la ubicaci&oacute;n:</p>\r\n<p>VIA BLANCA se encuentra ubicado en la arbolada Av. Sn Mart&iacute;n. En el medio del shopping de cielo abierto mas grande del pa&iacute;s. Una zona donde podemos vincularnos con facilidad con el mas importante centro de negocios de la regi&oacute;n y de f&aacute;cil acceso al aeropuerto internacional y otros centros de transporte.</p>\r\n<p>More information about the location:</p>\r\n<p>VIA BLANCA is located in the tree-lined Av. Sn Mart&iacute;n. In the middle of the largest open-air mall in the country. An area where we can easily connect with the most important business center of the regi&oacute;n.&nbsp; The city has an easy access to the international airport and other transportation centers.</p>\r\n<p>El departamento cuenta con:</p>\r\n<p>Capacidad&nbsp;4 personas</p>\r\n<p>1&nbsp;dormitorio</p>\r\n<p>1&nbsp;ba&ntilde;o</p>\r\n<p>1&nbsp;aire acondicionado frio - calor</p>\r\n<p>Cocina con equipamiento de utensilios completo.</p>\r\n<p>TV y WI FI</p>\r\n<p>Cochera en forma particular, a menos de 100 metros, del departamento.</p>\r\n<p>La limpieza se realiza semanalmente con posibilidad de pagar extra un servicio de limpieza diario.</p>\r\n<p>No se permiten mascotas y no se permiten realizar fiestas.</p>\r\n<p>Se deben respetar el c&oacute;digo de convivencia y reglamento de copropiedad</p>\r\n<p><strong>Tabla de precios:</strong></p>\r\n<p><strong>60 d&oacute;lares por dia</strong></p>\r\n<p><a href=\"../contacto\">Consultar por promoci&oacute;nes Fin de semana</a>, (viernes, s&aacute;bado y domingo) y fines de semana largos.</p>\r\n<p>Formas de pagos:</p>\r\n<p>transferencia bancaria.</p>\r\n<p>&nbsp;</p>\r\n<p>The department has:</p>\r\n<p>Capacity&nbsp;4 people</p>\r\n<p>One&nbsp;bedroom</p>\r\n<p>One&nbsp;bathroom</p>\r\n<p>One&nbsp;hot and cold air conditioner</p>\r\n<p>kitchen with full utensils equipment.</p>\r\n<p>TV and WI FI</p>\r\n<p>Possibility of hiring parking space / garage in a private way, less than 100 meters from the apartment.</p>\r\n<p>The cleaning is done weekly with the possibility of paying extra a daily cleaning service.</p>\r\n<p>Pets are not allowed and parties are not allowed.</p>\r\n<p>The code of coexistence and co-ownership regulations must be respected</p>\r\n<p>Table of prices:</p>\r\n<p><strong>60 d&oacute;lares</strong>&nbsp;day.</p>\r\n<p><a href=\"../contacto\">Consult by promotions Weekend</a>, (Friday, Saturday and Sunday) and long weekends.</p>\r\n<p>Forms of payment: bank transfer.</p>\r\n<p><iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3350.1635259319496!2d-68.84242788446828!3d-32.8938444809368!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0917484b4969%3A0x88bf5b0852bb6618!2sAv.+San+Mart%C3%ADn+807%2C+M5500EOE+Mendoza!5e0!3m2!1ses!2sar!4v1508859987645\" width=\"100%\" height=\"450\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\"></iframe></p>', 3, 5, 'departamento_nivel_3', 0, '0000-00-00', '0000-00-00', '2018-02-12 15:39:19', '0000-00-00 00:00:00'),
(6, 'Mendoza 2', 'mendoza-2', '<p><strong>MENDOZA</strong></p>\r\n<p><strong>Mendoza Capital.</strong></p>\r\n<p>Mendoza es una de las ciudades m&aacute;s atractivas de Argentina, caracterizada por sus parques, paseos y su gastronom&iacute;a cosmopolita. Desde Mendoza, una de las capitales mundiales del vino, podemos visitar el exquisito circuito de bodegas argentinas o llegar hasta los faldeos del imponente cerro Aconcagua, en uno de los techos del mundo, la cordillera de Los andes. Mendoza es apacible, amigable y distinguida.&nbsp;</p>\r\n<p>Mendoza is one of the most attractive cities in Argentina, characterized by its parks and walks and its cosmopolitan gastronomy. From the city, one of the world capitals of the wine, we can visit the exquisite circuit of Argentine wineries or we can reach the slopes of the Aconcagua Mountain in one of the world s roofs,&nbsp; la&nbsp; \"<strong>cordillera de Los Andes\"</strong>. Mendoza is&nbsp; friendly and distinguished.</p>\r\n<p>Mendoza</p>\r\n<p>Departamento en Alquiler temporario, en Mendoza Argentina .&nbsp;<strong>80 u$u por dia</strong></p>\r\n<p>Mas datos sobre la ubicaci&oacute;n:</p>\r\n<p>VIA BLANCA se encuentra ubicado en la arbolada Av. Sn Mart&iacute;n. En el medio del shopping de cielo abierto mas grande del pa&iacute;s. Una zona donde podemos vincularnos con facilidad con el mas importante centro de negocios de la regi&oacute;n y de f&aacute;cil acceso al aeropuerto internacional y otros centros de transporte.</p>\r\n<p>More information about the location:</p>\r\n<p>VIA BLANCA is located in the tree-lined Av. Sn Mart&iacute;n. In the middle of the largest open-air mall in the country. An area where we can easily connect with the most important business center of the regi&oacute;n.&nbsp; The city has an easy access to the international airport and other transportation centers.</p>\r\n<p>El departamento cuenta con:</p>\r\n<p>Capacidad 5 personas</p>\r\n<p>Dos dormitorios</p>\r\n<p>Dos ba&ntilde;os</p>\r\n<p>Dos aire acondicionados frio - calor</p>\r\n<p>Cocina completa con equipamiento de utensilios completo.</p>\r\n<p>TV y WI FI</p>\r\n<p>Cochera en forma particular, a menos de 100 metros, del departamento.</p>\r\n<p>La limpieza se realiza semanalmente con posibilidad de pagar extra un servicio de limpieza diario.</p>\r\n<p>No se permiten mascotas y no se permiten realizar fiestas.</p>\r\n<p>Se deben respetar el c&oacute;digo de convivencia y reglamento de copropiedad</p>\r\n<p>Tabla de precios:</p>\r\n<p><strong>&nbsp;80 d&oacute;lares por d&iacute;a</strong></p>\r\n<p><a href=\"../contacto\">Consultar por promoci&oacute;nes</a>&nbsp;Fin de semana, (viernes, s&aacute;bado y domingo) y fines de semana largos.</p>\r\n<p>Formas de pagos:</p>\r\n<p>transferencia bancaria.</p>\r\n<p>&nbsp;</p>\r\n<p>The department has:</p>\r\n<p>Capacity 5 people</p>\r\n<p>Two bedrooms</p>\r\n<p>Two bathrooms</p>\r\n<p>Two hot and cold air conditioners</p>\r\n<p>Full kitchen with full utensils equipment.</p>\r\n<p>TV and WI FI</p>\r\n<p>Possibility of hiring parking space / garage in a private way, less than 100 meters from the apartment.</p>\r\n<p>The cleaning is done weekly with the possibility of paying extra a daily cleaning service.</p>\r\n<p>Pets are not allowed and parties are not allowed.</p>\r\n<p>The code of coexistence and co-ownership regulations must be respected</p>\r\n<p>Table of prices:</p>\r\n<p><strong>80 d&oacute;lares</strong>&nbsp; day.</p>\r\n<p><a href=\"../contacto\">Consult by promotions Weekend</a>, (Friday, Saturday and Sunday) and long weekends.</p>\r\n<p>Forms of payment:&nbsp; bank transfer.</p>\r\n<p><iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3350.1635259319496!2d-68.84242788446828!3d-32.8938444809368!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0917484b4969%3A0x88bf5b0852bb6618!2sAv.+San+Mart%C3%ADn+807%2C+M5500EOE+Mendoza!5e0!3m2!1ses!2sar!4v1508859987645\" width=\"100%\" height=\"450\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\"></iframe></p>', 3, 5, 'departamento_nivel_3', 0, '0000-00-00', '0000-00-00', '2018-02-12 15:48:37', '0000-00-00 00:00:00'),
(7, 'Il Gato', 'il-gato', '<h2 class=\"ppb_title\"><span class=\"ppb_title_first\">Nuestra Historia</span></h2>\r\n<div class=\"ppb_subtitle\">A comienzos de 1982, se inaugur&oacute; la primera Trattor&iacute;a IL GATTO. El objetivo fue desarrollar un restaurante que recreara el esp&iacute;ritu de las t&iacute;picas trattor&iacute;as italianas y cuyo atractivo central fuesen las pastas y las pizzas. Para lograrlo se trajeron especialmente de Italia recetas de platos tradicionales de las distintas regiones, las que, con la colaboraci&oacute;n de experimentados chefs, se adaptaron al paladar de los argentinos hasta lograr el particular sabor que identifica a la cocina de Il Gatto Trattor&iacute;as.</div>', 4, 6, 'blog_nivel_3', 0, '0000-00-00', '0000-00-00', '2018-02-24 15:39:49', '0000-00-00 00:00:00'),
(8, 'El cultural San Martin', 'el-cultural-san-martin', '<h5>hoy en el cultural</h5>\r\n<div class=\"h7\">23 de diciembre de 2017</div>\r\n<h6>artes visuales</h6>\r\n<p>senderowicz, fot&oacute;grafo y pintora</p>\r\n<hr />\r\n<p>&ldquo;figuras entrelazadas&rdquo; de libero badii</p>\r\n<hr />\r\n<p>soliloquio, la ruina</p>\r\n<hr />\r\n<p>catch, el ocaso de los &iacute;dolos</p>\r\n<hr />\r\n<p>el d&iacute;a que fue inmenso</p>\r\n<hr />\r\n<p>convocatoria artes visuales 2018</p>', 5, 7, 'blog_nivel_3', 0, '0000-00-00', '0000-00-00', '2018-02-24 16:01:25', '0000-00-00 00:00:00'),
(9, 'Gourmet Porteño', 'gourmet-porteno', '<p>En Gourmet PORTE&Ntilde;O Puerto Madero, se puede disfrutar, en un c&aacute;lido ambiente, el mejor sistema de Cocina Abierta y Sin L&iacute;mites &mdash; combinado con la magn&iacute;fica carne argentina y la incomparable cordialidad Porte&ntilde;a. Esta cualidad que se traduce en la posibilidad de degustar sin l&iacute;mite la carne de la m&aacute;s alta calidad con una atenci&oacute;n esmerada, es fruto de la experiencia de quienes con el mismo nivel poseen otros locales similares y de alt&iacute;simo prestigio en Buenos Aires.&nbsp;</p>', 4, 6, 'blog_nivel_3', 0, '0000-00-00', '0000-00-00', '2018-02-24 16:06:45', '0000-00-00 00:00:00');

--
-- Disparadores `nivel_3`
--
DELIMITER $$
CREATE TRIGGER `tg_nivel_3_creado` BEFORE INSERT ON `nivel_3` FOR EACH ROW BEGIN
	SET NEW.n3_creado = CURRENT_TIMESTAMP;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel_4`
--

CREATE TABLE `nivel_4` (
  `n4_id` int(11) NOT NULL,
  `n4_nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `n4_corregido` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre corregido. Sirve como url.',
  `n4_descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `n1_id` smallint(6) NOT NULL,
  `n2_id` smallint(6) NOT NULL,
  `n3_id` int(11) NOT NULL,
  `n4_tipo` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `n4_orden` tinyint(6) NOT NULL,
  `n4_creado` datetime NOT NULL,
  `n4_modificado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nivel_4`
--

INSERT INTO `nivel_4` (`n4_id`, `n4_nombre`, `n4_corregido`, `n4_descripcion`, `n1_id`, `n2_id`, `n3_id`, `n4_tipo`, `n4_orden`, `n4_creado`, `n4_modificado`) VALUES
(1, '', '', '', 0, 0, 0, '', 0, '2018-02-03 17:57:52', '0000-00-00 00:00:00'),
(2, '1 21 x 214 124', '1-21-x-214-124', '<p>La promo n&deg;123123123123 12</p>', 4, 6, 9, 'blog_nivel_4', 0, '2018-02-26 18:23:00', '0000-00-00 00:00:00');

--
-- Disparadores `nivel_4`
--
DELIMITER $$
CREATE TRIGGER `tg_nivel_4_creado` BEFORE INSERT ON `nivel_4` FOR EACH ROW BEGIN
	SET NEW.n4_creado = CURRENT_TIMESTAMP;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagina`
--

CREATE TABLE `pagina` (
  `id_pagina` int(11) NOT NULL,
  `nombre_pagina` varchar(50) NOT NULL,
  `corregido_pagina` varchar(50) NOT NULL,
  `titulo_pagina` varchar(65) NOT NULL,
  `descripcion_pagina` varchar(145) NOT NULL,
  `fondo_tipo` varchar(10) NOT NULL,
  `fondo_valor` varchar(50) NOT NULL,
  `fondo_rgba` varchar(20) NOT NULL,
  `galeria_imagenes` varchar(20) NOT NULL,
  `contenido` text NOT NULL,
  `creado` datetime NOT NULL,
  `modificado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `pagina`
--

INSERT INTO `pagina` (`id_pagina`, `nombre_pagina`, `corregido_pagina`, `titulo_pagina`, `descripcion_pagina`, `fondo_tipo`, `fondo_valor`, `fondo_rgba`, `galeria_imagenes`, `contenido`, `creado`, `modificado`) VALUES
(1, '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'index', 'index.php', 'Inicio - Departamentos en alquiler', 'Pagina de inicio de Departamentos en alquiler', 'imagen', '94', '#000000', 'si', '<p>Rentamos &nbsp;departamentos con altos est&aacute;ndares de confort y excelente ubicaci&oacute;n en las &nbsp;ciudades de Buenos Aires y Mendoza. Los mismos pueden se rentados por dia, semana o por mes.&nbsp;</p>\r\n<p>Todos los departamentos se encuentran amoblados y equipados para hacer su estad&iacute;a confortable y placentera.&nbsp;</p>\r\n<p>Disponemos de promociones para fines de semanas largos, feriados y estad&iacute;as de negocios.</p>\r\n<p>Consulte tarifas &nbsp;corporativas y estad&iacute;as especiales. Las promociones se encuentran detalladas en &nbsp;cada departamento, observelas antes de hacer su reserva.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>We have apartments with high standards of comfort and excellent location in the cities of Buenos Aires and Mendoza. They can be rented by day, week or month.</p>\r\n<p>All the apartments are furnished and equipped to make your stay comfortable and pleasant.</p>\r\n<p>We have promotions for long weekends, holidays and business stays.</p>\r\n<p>Check corporate rates and special stays. The promotions are detailed in each department, observe them before making your reservation.</p>', '2018-04-05 19:22:20', '2018-01-23 00:27:51');

--
-- Disparadores `pagina`
--
DELIMITER $$
CREATE TRIGGER `tg_pagina_creado` BEFORE INSERT ON `pagina` FOR EACH ROW BEGIN
	SET NEW.creado = CURRENT_TIMESTAMP;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tg_pagina_modificado` BEFORE UPDATE ON `pagina` FOR EACH ROW BEGIN
	SET NEW.creado = CURRENT_TIMESTAMP;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagina_seccion`
--

CREATE TABLE `pagina_seccion` (
  `id_elemento` int(11) NOT NULL,
  `id_pagina` int(11) NOT NULL,
  `id_seccion` int(11) NOT NULL,
  `orden` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `pagina_seccion`
--

INSERT INTO `pagina_seccion` (`id_elemento`, `id_pagina`, `id_seccion`, `orden`) VALUES
(185, 2, 2, 1),
(186, 2, 4, 2),
(187, 2, 6, 3),
(188, 2, 7, 4),
(189, 2, 8, 5),
(190, 2, 9, 6),
(191, 2, 10, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relaciones`
--

CREATE TABLE `relaciones` (
  `id_relacion` int(11) NOT NULL,
  `n1_id` int(11) NOT NULL,
  `n2_id` int(11) NOT NULL,
  `n3_id` int(11) NOT NULL,
  `n1_id_blog` int(11) NOT NULL,
  `n2_id_blog` int(11) NOT NULL,
  `n3_id_blog` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `relaciones`
--

INSERT INTO `relaciones` (`id_relacion`, `n1_id`, `n2_id`, `n3_id`, `n1_id_blog`, `n2_id_blog`, `n3_id_blog`) VALUES
(3, 2, 2, 2, 4, 6, 9),
(4, 2, 3, 3, 4, 6, 9),
(5, 2, 2, 2, 5, 7, 8),
(6, 2, 3, 3, 4, 6, 7),
(7, 2, 3, 3, 5, 7, 8),
(8, 2, 2, 2, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `medio_pago` varchar(50) NOT NULL,
  `check_in_fecha` date NOT NULL,
  `in_hora` time NOT NULL,
  `check_out_fecha` date NOT NULL,
  `out_hora` time NOT NULL,
  `estado` varchar(20) NOT NULL,
  `consulta` text NOT NULL,
  `fecha_contacto` datetime NOT NULL,
  `fecha_visto` datetime NOT NULL,
  `fecha_respuesta` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `id_departamento`, `nombre`, `apellido`, `telefono`, `email`, `medio_pago`, `check_in_fecha`, `in_hora`, `check_out_fecha`, `out_hora`, `estado`, `consulta`, `fecha_contacto`, `fecha_visto`, `fecha_respuesta`) VALUES
(1, 2, 'Martin Lopez', 'Lopez', '1231321', 'martin@mercadoempresa.com', 'local', '2018-02-02', '13:00:00', '2018-02-04', '00:00:00', '', 'kjhbkjh kjkh jk', '2017-08-15 18:02:46', '2017-09-09 19:03:32', '0000-00-00 00:00:00'),
(2, 2, 'Alejandro', 'Pais', '1533300950', 'alejandro@mercadoempresa.com', 'local', '2018-02-05', '00:00:00', '2018-02-15', '01:01:00', '', 'asdf asdf sdaf ', '2017-09-09 16:36:12', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 2, 'Alejandro', 'Pais', '1533300950', 'alejandro@mercadoempresa.com', 'local', '2018-02-16', '00:00:00', '2018-02-20', '01:01:00', '', 'sdaa as dasd s', '2017-09-09 16:37:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 13, 'Alejandro', 'Pais', '1533300950', 'alejandro@mercadoempresa.com', 'local', '0001-01-01', '00:00:00', '0000-00-00', '01:01:00', '', 'sdaa as dasd s', '2017-09-09 16:39:41', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 13, 'Alejandro', 'Pais', '1533300950', 'alejandro@mercadoempresa.com', 'local', '0001-01-01', '01:01:00', '0000-00-00', '01:10:00', '', 'dasd asd', '2017-09-09 16:43:18', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 13, 'Alejandro', 'Pais', '1533300950', 'alejandro@mercadoempresa.com', 'local', '0001-01-01', '01:01:00', '0000-00-00', '01:10:00', '', 'dasd asd', '2017-09-09 16:43:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 13, 'Alejandro', 'pais', '1533300950', 'alejandro@mercadoempresa.com', 'local', '0000-00-00', '01:01:00', '1010-01-01', '01:01:00', '', 'sd kjdfas fjlasdk faskldh fasdjf glsaz asdf', '2017-09-09 16:48:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 15, 'juan ken', ' castell', '4965435668', 'sw@hotmail.com', '', '2018-01-25', '10:00:00', '2018-02-02', '13:30:00', '', 'Se puede reservar ya', '2018-01-23 20:33:59', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 17, 'dsf', 'sdf', 'sdf', 'sdf@asda.com', 'local', '2018-02-13', '01:00:00', '2018-02-13', '00:00:00', '', 'mm', '2018-02-06 12:35:56', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

CREATE TABLE `seccion` (
  `id_seccion` int(11) NOT NULL,
  `nombre_seccion` varchar(75) NOT NULL,
  `corregido_seccion` varchar(50) NOT NULL,
  `titulo_seccion` varchar(75) NOT NULL,
  `titulo_pag` varchar(65) NOT NULL,
  `descripcion_pag` varchar(145) NOT NULL,
  `fondo_tipo` varchar(10) NOT NULL,
  `fondo_valor` varchar(50) NOT NULL,
  `fondo_rgba` varchar(20) NOT NULL,
  `lista_imagen` varchar(2) NOT NULL,
  `lista_nombre` varchar(2) NOT NULL,
  `lista_descripcion` varchar(2) NOT NULL,
  `contenido` text NOT NULL,
  `id_diseño` int(11) NOT NULL,
  `columna1_posicion` varchar(6) NOT NULL,
  `columna1_ancho` int(11) NOT NULL,
  `columna2_posicion` varchar(6) NOT NULL,
  `columna2_ancho` int(11) NOT NULL,
  `creado` datetime NOT NULL,
  `modificado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `seccion`
--

INSERT INTO `seccion` (`id_seccion`, `nombre_seccion`, `corregido_seccion`, `titulo_seccion`, `titulo_pag`, `descripcion_pag`, `fondo_tipo`, `fondo_valor`, `fondo_rgba`, `lista_imagen`, `lista_nombre`, `lista_descripcion`, `contenido`, `id_diseño`, `columna1_posicion`, `columna1_ancho`, `columna2_posicion`, `columna2_ancho`, `creado`, `modificado`) VALUES
(1, '', '', '', '', '', 'color', '#FFFFFF', '', 'no', 'no', 'no', '', 0, 'left', 50, 'right', 50, '2018-02-03 17:59:15', '2018-02-05 10:15:51'),
(2, 'Galeria', '', '', '', '', 'color', '#000000', '', 'no', 'no', 'no', '', 1, 'left', 0, 'right', 100, '2018-02-03 18:11:02', '2018-02-05 19:57:08'),
(4, 'Inicio', 'semeniuk-montajes-y-servicios-srl', 'SEMENIUK MONTAJES Y SERVICIOS SRL', '', '', 'color', '#00a0b1', '', 'no', 'no', 'no', '<p>Es una empresa especializada en el desarrollo electromec&aacute;nico, automatizaci&oacute;n, mantenimiento y montajes industriales. Conformada por un grupo de profesionales altamente capacitados con m&aacute;s de 20 a&ntilde;os en el mercado.</p>\r\n<p>Priorizamos la flexibilidad, calidad, seguridad e innovaci&oacute;n para satisfacer las necesidades de todos nuestros clientes. Contamos con los recursos t&eacute;cnicos, de infraestructura y econ&oacute;micos necesarios para llevar adelante todos los proyectos.</p>\r\n<p>La calidad y seguridad en el trabajo son nuestros valores fundamentales en todas nuestras obras.</p>', 2, 'left', 66, 'right', 34, '2018-02-03 18:45:32', '2018-02-05 12:14:01'),
(6, 'Empresa', 'empresa', 'EMPRESA', '', '', 'color', '#ffffff', '', 'no', 'no', 'no', '<h2>HISTORIA</h2>\r\n<p>Comenzamos en el a&ntilde;o 1995 como una peque&ntilde;a empresa de servicios orientada a proveer instalaciones el&eacute;ctricas. Gracias a la confianza que depositaron nuestros clientes nos capacitamos en otras &aacute;reas para brincarles una soluci&oacute;n integral.</p>\r\n<p>En un constante crecimiento y un proceso de mejora continuo participamos de proyectos de gran importancia, lo que nos permiti&oacute; bajar costos, recursos y por ende ser m&aacute;s competitivos. Con el reconocimiento de clientes, proveedores y personal sostuvimos dicho proceso durante los &uacute;ltimos a&ntilde;os, avanzando en alianzas estrat&eacute;gicas para la distribuci&oacute;n mayorista de materiales e incorporaci&oacute;n de veh&iacute;culos industriales a nuestra flota.</p>\r\n<p>&nbsp;</p>\r\n<h2>VISION</h2>\r\n<p>Conservar el conste crecimiento y liderazgo en el mercado siendo referentes de calidad y excelencia en todo el pa&iacute;s. Estar en continua sinton&iacute;a con los cambios en materia tecnol&oacute;gica y de seguridad a nivel mundial, para poder brindar un servicio actualizado.</p>\r\n<p>&nbsp;</p>\r\n<h2>VALORES</h2>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li>CONSTANTE B&Uacute;SQUEDA DE LA EXCELENCIA.</li>\r\n<li>VOCACI&Oacute;N DE SERVICIO PARA SATISFACER LAS NECESIDADES DE NUESTROS CLIENTES</li>\r\n</ul>', 3, 'left', 70, 'right', 30, '2018-02-03 18:48:31', '2018-02-05 20:14:34'),
(7, 'Politica', 'politica-de-seguridad-higiene-y-salud-ocupacional', 'POLITICA DE SEGURIDAD, HIGIENE Y SALUD OCUPACIONAL', '', '', 'color', '#000000', '', 'no', 'no', 'no', '<div class=\"columna_1 left min-height_2 margin_top20 min-height_1 diseno_2_bottom\"><!--  -->\r\n<p>En SEMENIUK MOTNAJES Y SERVICIOS SRL consideramos que la prevenci&oacute;n de accidentes y cuidar la salud y seguridad de nuestros trabajadores es prioridad, por tal motivo el compromiso es total para que al desarrollar todas nuestras actividades en nuestras instalaciones y la de nuestros clientes, las mismas sean ejecutadas de forma segura y garantices la integridad f&iacute;sica de todos los operarios.</p>\r\n<p>&nbsp;</p>\r\n<h2>PARA CUMPLIR EL COMPROMISO DEBEMOS</h2>\r\n<hr />\r\n<div class=\"columna_2 left CT_VERDE_OSCURO\">\r\n<p>1 &bull; Cumplir con la normativa vigente en materia de Higiene y Seguridad Laboral, y cada una de las normativas internas impuestas por cada uno de los clientes.</p>\r\n<p>2 &bull; Investigar, controlar y reportar de manera abierta el desempe&ntilde;o de la empresa en materia de higiene y seguridad. Cada una de las personas que forma parte de la empresa es responsable de demostrar comportamientos de seguridad y salud adecuados, informando sobre los posibles riesgos de cada tarea y/o instalaciones presentes para ellos y para los dem&aacute;s.</p>\r\n<p>3 &bull; Establecer circuitos fluidos de comunicaci&oacute;n, abiertos y efectivos con nuestros empleados, contratistas, clientes y toda persona que trabaje con nosotros.</p>\r\n</div>\r\n<div class=\"columna_2 right CT_VERDE_OSCURO\">\r\n<p>4 &bull; Brindar los recursos necesarios para la instrucci&oacute;n, la capacitaci&oacute;n y supervisi&oacute;n que pueden garantizar la seguridad y salud de cada uno de los trabajadores en su jornada laboral.</p>\r\n<p>5 &bull; Brindarle al trabajador un espacio de laboral seguro y saludable, mediante la implementaci&oacute;n y mantenimiento de sistemas que prevengan y minimicen al m&aacute;ximo los tiesos de cada una de las actividades.</p>\r\n<p>6 &bull; SEMENIUK MONTAES Y SERVICIOS SRL se compromete a colocar la seguridad y salud de sus trabajadores en primer lugar y adoptar una cultura de trabajo seguro acompa&ntilde;ado de una mejora cont&iacute;nua.</p>\r\n</div>\r\n</div>', 1, 'left', 100, 'right', 0, '2018-02-03 19:17:31', '2018-02-03 19:18:06'),
(8, 'SERVICIOS', 'servicios', 'SERVICIOS', '', '', 'color', '#00a0b1', '', 'no', 'no', 'no', '<h2>MONTAJES INDUSTRIALES</h2>\r\n<ul>\r\n<li>Montajes de equipos de proceso.</li>\r\n<li>Sistema de iluminaci&oacute;n interior y exterior.</li>\r\n<li>Montajes de sistemas de iluminaci&oacute;n de energ&iacute;a.</li>\r\n<li>Dise&ntilde;o y construcci&oacute;n de tableros de potencia, control y puesta en marcha.</li>\r\n<li>Modificaci&oacute;n de Lay-out.</li>\r\n<li>Generaci&oacute;n y distribuci&oacute;n de aire comprimido.</li>\r\n<li>Desmontajes industriales.</li>\r\n<li>Construcciones y fabricaciones industriales.</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<h2>MANTENIMIENTO</h2>\r\n<ul>\r\n<li>Mantenimiento preventivo y correctivo de instalaciones el&eacute;ctricas.</li>\r\n<li>Medici&oacute;n de puesta a tierra.</li>\r\n<li>Mantenimiento de tableros de distribuci&oacute;n el&eacute;ctrica.</li>\r\n<li>Mantenimiento de sistemas de iluminaci&oacute;n de planta.</li>\r\n<li>Mantenimiento de servicios industriales.</li>\r\n<li>Sistemas productivos y dispositivos.</li>\r\n<li>Mantenimiento de construcciones industriales.</li>\r\n<li>Mantenimiento de Piping.</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<h2>DESARROLLO ELECTROMEC&Aacute;NICO</h2>\r\n<ul>\r\n<li>Automatizaci&oacute;n Industrial.</li>\r\n<li>Dise&ntilde;o y construcci&oacute;n de tableros de control y automatizaci&oacute;n.</li>\r\n<li>Automatizaci&oacute;n de procesos: l&iacute;neas de producci&oacute;n, log&iacute;stica interna de&nbsp;<br />materiales y piezas, llamadores y contadores de recorrido.</li>\r\n<li>Fabricaci&oacute;n e instalaci&oacute;n de dispositivos, motores y bombas.</li>\r\n<li>Instalaci&oacute;n de Blindo-Barras y Plug.</li>\r\n<li>Montaje de l&iacute;neas de producci&oacute;n y sus servicios perif&eacute;ricos.</li>\r\n</ul>', 5, 'left', 50, 'right', 50, '2018-02-03 19:19:17', '2018-02-05 12:18:11'),
(9, 'Clientes', 'clientes', 'CLIENTEs', '', '', 'color', '#ffffff', '', 'si', 'si', 'no', '', 6, 'right', 50, 'left', 50, '2018-02-03 19:20:16', '2018-02-05 11:36:10'),
(10, 'contacto', 'contacto', 'CONTACTO', '', '', 'color', '#ffffff', '', 'si', 'si', 'si', '', 7, 'left', 50, 'right', 50, '2018-02-03 19:41:28', '2018-02-03 19:51:26');

--
-- Disparadores `seccion`
--
DELIMITER $$
CREATE TRIGGER `tg_seccion_creado` BEFORE INSERT ON `seccion` FOR EACH ROW BEGIN
	SET NEW.creado = CURRENT_TIMESTAMP;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tg_seccion_modificado` BEFORE UPDATE ON `seccion` FOR EACH ROW BEGIN
	SET NEW.modificado = CURRENT_TIMESTAMP;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `empresa` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `horario` varchar(100) NOT NULL,
  `creado` datetime NOT NULL,
  `modificado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `empresa`, `nombre`, `email`, `password`, `telefono`, `direccion`, `horario`, `creado`, `modificado`) VALUES
(1, '', 'Departamentos en Alquiler Temporario', 'info@departamentosenalquiler.com.ar', '1234', '+54 9 15 6378-2439', '', '24hs disponible', '0000-00-00 00:00:00', '2018-03-31 17:44:08'),
(2, '', 'MeeM1234', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Disparadores `usuario`
--
DELIMITER $$
CREATE TRIGGER `tg_usuario_modificado` BEFORE UPDATE ON `usuario` FOR EACH ROW BEGIN
	SET NEW.modificado = CURRENT_TIMESTAMP;
END
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agenda_clientes`
--
ALTER TABLE `agenda_clientes`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indices de la tabla `agenda_representantes`
--
ALTER TABLE `agenda_representantes`
  ADD PRIMARY KEY (`id_agenda_representantes`);

--
-- Indices de la tabla `agenda_representantes_relaciones`
--
ALTER TABLE `agenda_representantes_relaciones`
  ADD PRIMARY KEY (`id_relacion`);

--
-- Indices de la tabla `archivo`
--
ALTER TABLE `archivo`
  ADD PRIMARY KEY (`id_archivo`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `diseño`
--
ALTER TABLE `diseño`
  ADD PRIMARY KEY (`id_diseño`);

--
-- Indices de la tabla `general`
--
ALTER TABLE `general`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `nivel_1`
--
ALTER TABLE `nivel_1`
  ADD PRIMARY KEY (`n1_id`);

--
-- Indices de la tabla `nivel_2`
--
ALTER TABLE `nivel_2`
  ADD PRIMARY KEY (`n2_id`);

--
-- Indices de la tabla `nivel_3`
--
ALTER TABLE `nivel_3`
  ADD PRIMARY KEY (`n3_id`);

--
-- Indices de la tabla `nivel_4`
--
ALTER TABLE `nivel_4`
  ADD PRIMARY KEY (`n4_id`);

--
-- Indices de la tabla `pagina`
--
ALTER TABLE `pagina`
  ADD PRIMARY KEY (`id_pagina`),
  ADD KEY `id_pag` (`id_pagina`);

--
-- Indices de la tabla `pagina_seccion`
--
ALTER TABLE `pagina_seccion`
  ADD PRIMARY KEY (`id_elemento`),
  ADD KEY `id_pag` (`id_elemento`);

--
-- Indices de la tabla `relaciones`
--
ALTER TABLE `relaciones`
  ADD PRIMARY KEY (`id_relacion`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`);

--
-- Indices de la tabla `seccion`
--
ALTER TABLE `seccion`
  ADD PRIMARY KEY (`id_seccion`),
  ADD KEY `id_pag` (`id_seccion`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agenda_clientes`
--
ALTER TABLE `agenda_clientes`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT de la tabla `agenda_representantes`
--
ALTER TABLE `agenda_representantes`
  MODIFY `id_agenda_representantes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT de la tabla `agenda_representantes_relaciones`
--
ALTER TABLE `agenda_representantes_relaciones`
  MODIFY `id_relacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `archivo`
--
ALTER TABLE `archivo`
  MODIFY `id_archivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `diseño`
--
ALTER TABLE `diseño`
  MODIFY `id_diseño` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `general`
--
ALTER TABLE `general`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `nivel_1`
--
ALTER TABLE `nivel_1`
  MODIFY `n1_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `nivel_2`
--
ALTER TABLE `nivel_2`
  MODIFY `n2_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `nivel_3`
--
ALTER TABLE `nivel_3`
  MODIFY `n3_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `nivel_4`
--
ALTER TABLE `nivel_4`
  MODIFY `n4_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pagina`
--
ALTER TABLE `pagina`
  MODIFY `id_pagina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pagina_seccion`
--
ALTER TABLE `pagina_seccion`
  MODIFY `id_elemento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT de la tabla `relaciones`
--
ALTER TABLE `relaciones`
  MODIFY `id_relacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `seccion`
--
ALTER TABLE `seccion`
  MODIFY `id_seccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
