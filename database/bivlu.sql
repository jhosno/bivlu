-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-01-2018 a las 14:30:06
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bivlu`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authors`
--

CREATE TABLE `authors` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `authors`
--

INSERT INTO `authors` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'JULIO VERNE', NULL, NULL),
(2, 'GABRIEL GARCIA MARQUEZ', NULL, NULL),
(3, 'MIGUEL DE CERVANES', NULL, NULL),
(4, 'DESCONOCIDO', NULL, NULL),
(5, 'CLIVE BARKER', NULL, NULL),
(6, 'TOM CORMEN', '2017-11-22 17:06:02', '2017-11-22 17:06:02'),
(7, 'JHOSNOIRLIT HERNANDEZ', '2017-11-22 17:09:12', '2017-11-22 17:09:12'),
(8, 'JOSE PEREZ', '2017-11-22 18:38:50', '2017-11-22 18:38:50'),
(9, '', '2017-12-05 01:01:32', '2017-12-05 01:01:32'),
(10, 'FERMÍN MÁRMOL LEÓN', '2018-01-16 06:24:35', '2018-01-16 06:24:35'),
(11, 'MAYBA', '2018-01-16 22:51:20', '2018-01-16 22:51:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `author_book`
--

CREATE TABLE `author_book` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `author_book`
--

INSERT INTO `author_book` (`id`, `author_id`, `book_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 3, NULL, NULL),
(4, 3, 4, NULL, NULL),
(5, 4, 5, NULL, NULL),
(6, 5, 6, NULL, NULL),
(7, 6, 7, '2017-11-22 17:06:02', '2017-11-22 17:06:02'),
(9, 8, 9, '2017-11-22 18:38:50', '2017-11-22 18:38:50'),
(10, 7, 8, '2017-12-05 01:01:32', '2017-12-05 01:01:32'),
(11, 9, 8, '2017-12-05 01:01:32', '2017-12-05 01:01:32'),
(17, 2, 2, '2018-01-16 02:32:05', '2018-01-16 02:32:05'),
(18, 9, 2, '2018-01-16 02:32:05', '2018-01-16 02:32:05'),
(19, 9, 2, '2018-01-16 02:32:05', '2018-01-16 02:32:05'),
(20, 9, 2, '2018-01-16 02:32:05', '2018-01-16 02:32:05'),
(21, 10, 10, '2018-01-16 06:24:35', '2018-01-16 06:24:35'),
(22, 11, 11, '2018-01-16 22:51:20', '2018-01-16 22:51:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `books`
--

CREATE TABLE `books` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anio_edicion` int(11) NOT NULL,
  `numero_paginas` int(11) NOT NULL,
  `portada` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sala` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idioma` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resumen` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_incorporacion` date DEFAULT NULL,
  `fecha_desincorporacion` date DEFAULT NULL,
  `publisher_id` int(11) NOT NULL,
  `speciality_id` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clasificacion` int(11) NOT NULL DEFAULT '2',
  `subclasificacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `veces` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `books`
--

INSERT INTO `books` (`id`, `tipo`, `titulo`, `anio_edicion`, `numero_paginas`, `portada`, `sala`, `idioma`, `resumen`, `fecha_incorporacion`, `fecha_desincorporacion`, `publisher_id`, `speciality_id`, `url`, `clasificacion`, `subclasificacion`, `veces`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'LIBRO', '20 000 Leguas de Viaje Submarino', 2010, 123, 'TAPA BLANDA', '1', 'ESPAÑOL', 'Viaje a lo largo del mundo en un submarino, de la mano fuurisa de Julio Verne. Sumergee en una avenura replea de pasion y peligros.', '2011-01-07', NULL, 1, 1, NULL, 2, '', 0, '2018-01-10 21:36:28', NULL, '2018-01-10 21:36:28'),
(2, 'LIBRO', '100 años de soledad', 1998, 123, 'TAPA DURA', '1', 'ESPAÑOL', 'Una saga multigeneracional, que nos adenra en la familia Buendia y la fundacion de Macondo, una poblacion ficicia surgida de la imaginacion ganadora de un Nobel de Lieraura.', '2018-01-15', NULL, 1, 1, NULL, 2, '', 0, NULL, NULL, '2018-01-16 02:32:04'),
(3, 'LIBRO', 'Viaje al Centro de la Tierra', 2010, 123, 'TAPA BLANDA', '1', 'ESPAÑOL', 'Una ripulacion emeraria se avenura a indagar en lo mas hondo del planea para hallar el cenro del planea.', '2015-09-27', NULL, 1, 1, NULL, 2, '', 0, '2018-01-10 20:20:15', NULL, '2018-01-10 20:20:15'),
(4, 'LIBRO', 'Don Quijoe de la Mancha', 1500, 1269, 'TAPA BLANDA', '1', 'ESPAÑOL', 'Un avido hidalgo lecor de novelas de caballeria ermina por ceder a la locura en medio de su voraz apeio por las hisorias de epica.', '2015-09-27', NULL, 1, 1, NULL, 2, '', 0, NULL, NULL, NULL),
(5, 'LIBRO', 'Mago de Oz', 1900, 123, 'TAPA BLANDA', '1', 'ESPAÑOL', 'Un leon sin valor, un espanapajaros sin cerebro, un robo sin corazon y una nina sin oficio.', '2015-09-27', NULL, 1, 1, NULL, 2, '', 0, NULL, NULL, NULL),
(6, 'LIBRO', 'The Hellbound Heart', 1900, 50, 'TAPA BLANDA', '1', 'ENGLISH', 'Deep inside he human hear, he sickes passions and desires live wihin. An arifac, called he Lemarchand Box, promises o he seekers a whole new world of feelings, involving pleny of pleasure... or pain?', '2015-09-27', NULL, 1, 1, NULL, 2, '', 0, NULL, NULL, NULL),
(7, '', 'INTRODUCCIÓN A ALGORITMOS', 2006, 1202, '', '1', 'ESPAÑOL', 'Introducción detalla y prática sobre algoritmos', '2017-11-22', NULL, 1, 1, 'a88ce6515f9985f5c232863be15b9b97.pdf', 1, '', 7, NULL, '2017-11-22 17:06:02', '2018-01-16 22:26:40'),
(8, 'LIBRO', 'APLICACIÓN WEB PARA EL MANEJO DE LOS PROCESOS ADMINISTRATIVOS Y SERVICIOS DE LA BIBLIOTECA MIGUEL ANGEL PEREZ RODRIGUEZ DE LA UPT ARAGUA', 2017, 150, 'N/A', '1', 'ESPAÑOL', 'Aplicación web para la gestión de los procesos administrativos y servicios de la biblioteca', '2017-12-04', NULL, 1, 1, 'df12195462117aeda5282f8f26f078a5.pdf', 3, 'Pregrado PNF', 7, '2018-01-08 16:10:33', '2017-11-22 17:09:12', '2018-01-08 16:10:33'),
(9, '', 'PROGRAMA EN CLIPS, MEDICINA', 2010, 123, '', '1', 'ESPAÑOL', 'programa expero para el diagnosico de pacienes', '2017-11-22', NULL, 1, 1, '14f53c90e4af5532a3208cc0f77a3357.pdf', 3, 'Trabajos de Ascenso', 4, NULL, '2017-11-22 18:38:50', '2018-01-16 22:27:05'),
(10, '', '4 CRIMENES, 4 PODERES', 1973, 200, 'TAPA DURA', '1', 'ESPAÑOL', 'Entre octubre de 1961 y febrero de 1973 cuatro casos impactaron a la opinión pública; la violación y asesinato de la hermana de un sacerdote, la extraña muerte en un ascensor de la esposa de un oficial de la aviación, el terrible asesinato de la esposa de un diputado al Congreso de la República y el secuestro y homicidio de un adolescente en el este de Caracas. Un hilo conductor unía a estos 4 sucesos: La intervención de poderes fácticos que obstaculizaron la aplicación de la justicia', '2018-01-16', NULL, 1, 1, NULL, 2, '', 0, NULL, '2018-01-16 06:24:35', '2018-01-16 06:24:35'),
(11, '', 'MECANICA', 1993, 123, 'TAPA DURA', '1', 'ESPAÑOL', 'resumen', '2018-01-16', NULL, 1, 1, NULL, 2, '', 0, NULL, '2018-01-16 22:51:20', '2018-01-16 22:51:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `book_tag`
--

CREATE TABLE `book_tag` (
  `id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `book_tag`
--

INSERT INTO `book_tag` (`id`, `tag_id`, `book_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, NULL, NULL),
(4, 2, 3, NULL, NULL),
(5, 2, 4, NULL, NULL),
(6, 2, 5, NULL, NULL),
(7, 2, 6, NULL, NULL),
(8, 3, 7, '2017-11-22 17:06:02', '2017-11-22 17:06:02'),
(13, 8, 9, '2017-11-22 18:38:50', '2017-11-22 18:38:50'),
(14, 4, 8, '2017-12-05 01:01:31', '2017-12-05 01:01:31'),
(15, 5, 8, '2017-12-05 01:01:32', '2017-12-05 01:01:32'),
(16, 6, 8, '2017-12-05 01:01:32', '2017-12-05 01:01:32'),
(17, 7, 8, '2017-12-05 01:01:32', '2017-12-05 01:01:32'),
(18, 9, 8, '2017-12-05 01:01:32', '2017-12-05 01:01:32'),
(26, 1, 2, '2018-01-16 02:32:04', '2018-01-16 02:32:04'),
(27, 2, 2, '2018-01-16 02:32:05', '2018-01-16 02:32:05'),
(28, 9, 2, '2018-01-16 02:32:05', '2018-01-16 02:32:05'),
(29, 9, 2, '2018-01-16 02:32:05', '2018-01-16 02:32:05'),
(30, 9, 2, '2018-01-16 02:32:05', '2018-01-16 02:32:05'),
(31, 10, 10, '2018-01-16 06:24:35', '2018-01-16 06:24:35'),
(32, 11, 10, '2018-01-16 06:24:35', '2018-01-16 06:24:35'),
(33, 12, 11, '2018-01-16 22:51:20', '2018-01-16 22:51:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detalles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad_asistentes` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nombre_responsable` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_responsable` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_finalizacion` datetime DEFAULT NULL,
  `confirmado` tinyint(1) NOT NULL DEFAULT '1',
  `observaciones` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `events`
--

INSERT INTO `events` (`id`, `nombre`, `detalles`, `cantidad_asistentes`, `user_id`, `nombre_responsable`, `telefono_responsable`, `fecha_inicio`, `fecha_finalizacion`, `confirmado`, `observaciones`, `created_at`, `updated_at`) VALUES
(1, 'FDFDF', 'DFDFDF', 34, NULL, 'SDDFDF', '04141231234', '2017-11-28 03:27:00', '2017-11-28 03:28:00', 1, '', '2017-11-20 23:28:06', '2017-11-22 17:55:33'),
(2, 'EVENTO', 'EVENTO', 142, 2, 'Heider Daniel Sanchez', '04124373630', '2017-11-29 09:52:00', '2017-11-29 09:53:00', 1, '', '2017-11-22 17:52:08', '2017-11-22 17:55:28'),
(3, 'OTRO EVENTO', 'ADFSADS', 20, 2, 'Heider Daniel Sanchez', '04124373630', '2017-11-30 09:52:00', '2017-11-30 09:53:00', 1, '', '2017-11-22 17:52:28', '2017-11-22 17:55:39'),
(4, 'WEDSDA', 'ASDASDASDASD', 100, NULL, 'ALGUIEN', '0414132132', '2018-01-17 06:58:00', '2028-01-17 06:59:00', 1, '', '2018-01-10 18:58:55', '2018-01-10 19:28:55'),
(5, 'ADSDASD', 'ADADSADSAS', 50, NULL, 'ALGUIEN', '04121231231', '2018-01-17 10:59:00', '2018-01-17 11:00:00', 1, '', '2018-01-10 19:00:12', '2018-01-10 19:50:42'),
(7, 'ADASDASD', 'DWQDADASDASDAS', 120, NULL, 'ASDAS', '0416457524', '2018-01-25 06:30:00', '2018-01-25 06:31:00', 1, '', '2018-01-16 02:30:49', '2018-01-16 02:30:49'),
(8, 'DEFENSA DE PROYECTO', 'DEFENSA DE PROYECTO DE 3ER AÑO', 30, 2, 'Heider Daniel Sanchez', '04124373630', '2018-01-25 09:47:00', '2018-01-25 09:48:00', 0, '', '2018-01-16 17:47:28', '2018-01-16 17:47:28'),
(9, 'DEFENZA', 'PROYECO', 20, 2, 'Heider Daniel Sanchez', '04124373630', '2018-01-31 02:31:00', '2018-01-31 02:32:00', 1, '', '2018-01-16 22:31:23', '2018-01-16 22:32:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `humans`
--

CREATE TABLE `humans` (
  `id` int(10) UNSIGNED NOT NULL,
  `cedula` int(11) NOT NULL,
  `nombres` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `humans`
--

INSERT INTO `humans` (`id`, `cedula`, `nombres`, `apellidos`, `numero_telefono`, `created_at`, `updated_at`) VALUES
(1, 12345678, 'Jhosnoirlit Gabriela', 'Hernandez Castillo', '04124373630', '2017-11-20 23:19:10', '2017-11-20 23:19:10'),
(2, 23456789, 'Heider Daniel', 'Sanchez', '04124373630', '2017-11-20 23:19:10', '2017-11-20 23:19:10'),
(3, 3456789, 'Geovanny Jesus', 'Abbinante', '04124373630', '2017-11-20 23:19:10', '2017-11-20 23:19:10'),
(4, 4567890, 'Jesús Omar', 'Guevara Rivas', '04124373630', '2017-11-20 23:19:10', '2017-11-20 23:19:10'),
(5, 8765432, 'Esperanza', 'Castellano', '04124373630', '2017-11-20 23:19:10', '2017-11-20 23:19:10'),
(6, 121212, 'Saori', 'Kido', '04124373630', '2017-11-20 23:19:10', '2017-11-20 23:19:10'),
(7, 21026444, 'Mariana', 'Castellanos', '04120001111', '2018-01-08 09:00:00', '2018-01-08 09:00:00'),
(8, 21026888, 'José Antonio', 'Hernández', '04123568753', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `internos`
--

CREATE TABLE `internos` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `modulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detalles` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `internos`
--

INSERT INTO `internos` (`id`, `user_id`, `modulo`, `tipo`, `detalles`, `created_at`, `updated_at`) VALUES
(1, 2, 'Inicio', 'Entrada', 'El usuario Heider Daniel Sanchez ha iniciado sesión', '2017-11-20 23:19:25', '2017-11-20 23:19:25'),
(2, 2, 'Inicio', 'Salida', 'El usuario Heider Daniel Sanchez ha cerrado sesión', '2017-11-20 23:20:10', '2017-11-20 23:20:10'),
(3, 2, 'Inicio', 'Entrada', 'El usuario Heider Daniel Sanchez ha iniciado sesión', '2017-11-20 23:20:29', '2017-11-20 23:20:29'),
(4, 2, 'Inicio', 'Salida', 'El usuario Heider Daniel Sanchez ha cerrado sesión', '2017-11-20 23:23:20', '2017-11-20 23:23:20'),
(5, 2, 'Inicio', 'Entrada', 'El usuario Heider Daniel Sanchez ha iniciado sesión', '2017-11-20 23:23:38', '2017-11-20 23:23:38'),
(6, 2, 'Inicio', 'Salida', 'El usuario Heider Daniel Sanchez ha cerrado sesión', '2017-11-20 23:23:42', '2017-11-20 23:23:42'),
(7, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2017-11-20 23:24:13', '2017-11-20 23:24:13'),
(8, 1, 'Inicio', 'Salida', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha cerrado sesión', '2017-11-20 23:24:24', '2017-11-20 23:24:24'),
(9, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2017-11-21 01:42:38', '2017-11-21 01:42:38'),
(10, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2017-11-21 01:45:25', '2017-11-21 01:45:25'),
(11, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2017-11-21 01:51:30', '2017-11-21 01:51:30'),
(12, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2017-11-22 16:22:49', '2017-11-22 16:22:49'),
(13, 1, 'Inicio', 'Salida', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha cerrado sesión', '2017-11-22 16:28:12', '2017-11-22 16:28:12'),
(14, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2017-11-22 16:32:20', '2017-11-22 16:32:20'),
(15, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2017-11-22 17:04:14', '2017-11-22 17:04:14'),
(16, 1, 'Inicio', 'Salida', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha cerrado sesión', '2017-11-22 17:49:21', '2017-11-22 17:49:21'),
(17, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2017-11-22 17:50:04', '2017-11-22 17:50:04'),
(18, 1, 'Inicio', 'Salida', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha cerrado sesión', '2017-11-22 17:50:13', '2017-11-22 17:50:13'),
(19, 2, 'Inicio', 'Entrada', 'El usuario Heider Daniel Sanchez ha iniciado sesión', '2017-11-22 17:51:48', '2017-11-22 17:51:48'),
(20, 2, 'Inicio', 'Prestamos', 'El usuario Heider Daniel Sanchez ha almacenado el préstamo # 1', '2017-11-22 17:52:43', '2017-11-22 17:52:43'),
(21, 2, 'Inicio', 'Prestamos', 'El usuario Heider Daniel Sanchez ha almacenado el préstamo # 2', '2017-11-22 17:52:47', '2017-11-22 17:52:47'),
(22, 2, 'Inicio', 'Prestamos', 'El usuario Heider Daniel Sanchez ha almacenado el préstamo # 3', '2017-11-22 17:52:52', '2017-11-22 17:52:52'),
(23, 2, 'Inicio', 'Salida', 'El usuario Heider Daniel Sanchez ha cerrado sesión', '2017-11-22 17:52:58', '2017-11-22 17:52:58'),
(24, 3, 'Inicio', 'Entrada', 'El usuario Geovanny Jesus Abbinante ha iniciado sesión', '2017-11-22 17:53:11', '2017-11-22 17:53:11'),
(25, 3, 'Inicio', 'Prestamos', 'El usuario Geovanny Jesus Abbinante ha almacenado el préstamo # 4', '2017-11-22 17:53:17', '2017-11-22 17:53:17'),
(26, 3, 'Inicio', 'Prestamos', 'El usuario Geovanny Jesus Abbinante ha almacenado el préstamo # 5', '2017-11-22 17:53:19', '2017-11-22 17:53:19'),
(27, 3, 'Inicio', 'Salida', 'El usuario Geovanny Jesus Abbinante ha cerrado sesión', '2017-11-22 17:53:24', '2017-11-22 17:53:24'),
(28, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2017-11-22 17:53:49', '2017-11-22 17:53:49'),
(29, 1, 'Inicio', 'Prestamos', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha confirmado el préstamo # 5', '2017-11-22 17:54:03', '2017-11-22 17:54:03'),
(30, 1, 'Inicio', 'Prestamos', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha finalizado el préstamo # 5', '2017-11-22 17:54:12', '2017-11-22 17:54:12'),
(31, 1, 'Inicio', 'Prestamos', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha confirmado el préstamo # 4', '2017-11-22 17:54:21', '2017-11-22 17:54:21'),
(32, 1, 'Inicio', 'Prestamos', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha confirmado el préstamo # 1', '2017-11-22 17:54:30', '2017-11-22 17:54:30'),
(33, 1, 'Inicio', 'Prestamos', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha confirmado el préstamo # 3', '2017-11-22 17:54:40', '2017-11-22 17:54:40'),
(34, 1, 'Inicio', 'Prestamos', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha confirmado el préstamo # 2', '2017-11-22 17:54:49', '2017-11-22 17:54:49'),
(35, 1, 'Inicio', 'Prestamos', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha finalizado el préstamo # 1', '2017-11-22 17:55:03', '2017-11-22 17:55:03'),
(36, 1, 'Inicio', 'Prestamos', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha finalizado el préstamo # 2', '2017-11-22 17:55:12', '2017-11-22 17:55:12'),
(37, 1, 'Inicio', 'Prestamos', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha finalizado el préstamo # 3', '2017-11-22 17:55:18', '2017-11-22 17:55:18'),
(38, 1, 'Inicio', 'Eventos', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha almacenado el préstamo # 2', '2017-11-22 17:55:28', '2017-11-22 17:55:28'),
(39, 1, 'Inicio', 'Eventos', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha almacenado el préstamo # 1', '2017-11-22 17:55:33', '2017-11-22 17:55:33'),
(40, 1, 'Inicio', 'Eventos', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha almacenado el préstamo # 3', '2017-11-22 17:55:39', '2017-11-22 17:55:39'),
(41, 2, 'Inicio', 'Entrada', 'El usuario Heider Daniel Sanchez ha iniciado sesión', '2017-11-22 18:34:51', '2017-11-22 18:34:51'),
(42, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2017-11-22 18:35:35', '2017-11-22 18:35:35'),
(43, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2017-11-22 19:12:14', '2017-11-22 19:12:14'),
(44, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2017-11-27 22:15:08', '2017-11-27 22:15:08'),
(45, 2, 'Inicio', 'Entrada', 'El usuario Heider Daniel Sanchez ha iniciado sesión', '2017-11-27 22:15:13', '2017-11-27 22:15:13'),
(46, 1, 'Inicio', 'Salida', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha cerrado sesión', '2017-11-27 22:40:22', '2017-11-27 22:40:22'),
(47, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2017-11-27 22:41:37', '2017-11-27 22:41:37'),
(48, 1, 'Inicio', 'Salida', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha cerrado sesión', '2017-11-27 22:41:52', '2017-11-27 22:41:52'),
(49, 7, 'Inicio', 'Entrada', 'El usuario Saori Kido ha iniciado sesión', '2017-11-27 22:44:41', '2017-11-27 22:44:41'),
(50, 7, 'Inicio', 'Salida', 'El usuario Saori Kido ha cerrado sesión', '2017-11-27 22:44:52', '2017-11-27 22:44:52'),
(51, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2017-11-27 22:45:09', '2017-11-27 22:45:09'),
(52, 2, 'Inicio', 'Salida', 'El usuario Heider Daniel Sanchez ha cerrado sesión', '2017-11-27 22:45:47', '2017-11-27 22:45:47'),
(53, 7, 'Inicio', 'Entrada', 'El usuario Saori Kido ha iniciado sesión', '2017-11-27 22:45:58', '2017-11-27 22:45:58'),
(54, 7, 'Inicio', 'Salida', 'El usuario Saori Kido ha cerrado sesión', '2017-11-27 22:47:20', '2017-11-27 22:47:20'),
(55, 2, 'Inicio', 'Entrada', 'El usuario Heider Daniel Sanchez ha iniciado sesión', '2017-11-27 22:47:46', '2017-11-27 22:47:46'),
(56, 2, 'Inicio', 'Salida', 'El usuario Heider Daniel Sanchez ha cerrado sesión', '2017-11-27 22:48:48', '2017-11-27 22:48:48'),
(57, 3, 'Inicio', 'Entrada', 'El usuario Geovanny Jesus Abbinante ha iniciado sesión', '2017-11-27 22:49:23', '2017-11-27 22:49:23'),
(58, 3, 'Inicio', 'Salida', 'El usuario Geovanny Jesus Abbinante ha cerrado sesión', '2017-11-27 22:50:23', '2017-11-27 22:50:23'),
(59, 4, 'Inicio', 'Entrada', 'El usuario Jesús Omar Guevara Rivas ha iniciado sesión', '2017-11-27 22:50:32', '2017-11-27 22:50:32'),
(60, 1, 'Inicio', 'Salida', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha cerrado sesión', '2017-11-27 23:04:07', '2017-11-27 23:04:07'),
(61, 4, 'Inicio', 'Salida', 'El usuario Jesús Omar Guevara Rivas ha cerrado sesión', '2017-11-27 23:23:25', '2017-11-27 23:23:25'),
(62, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2017-12-05 01:01:04', '2017-12-05 01:01:04'),
(63, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2017-12-05 06:16:00', '2017-12-05 06:16:00'),
(64, 1, 'Inicio', 'Salida', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha cerrado sesión', '2017-12-05 06:18:04', '2017-12-05 06:18:04'),
(65, 7, 'Inicio', 'Entrada', 'El usuario Saori Kido ha iniciado sesión', '2017-12-05 06:18:18', '2017-12-05 06:18:18'),
(66, 7, 'Inicio', 'Salida', 'El usuario Saori Kido ha cerrado sesión', '2017-12-05 06:18:55', '2017-12-05 06:18:55'),
(67, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2017-12-05 06:19:11', '2017-12-05 06:19:11'),
(68, 1, 'Inicio', 'Salida', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha cerrado sesión', '2017-12-05 06:20:18', '2017-12-05 06:20:18'),
(69, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2017-12-08 00:13:01', '2017-12-08 00:13:01'),
(70, 1, 'Inicio', 'Salida', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha cerrado sesión', '2017-12-08 04:26:55', '2017-12-08 04:26:55'),
(71, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2018-01-05 05:07:16', '2018-01-05 05:07:16'),
(72, 1, 'Inicio', 'Salida', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha cerrado sesión', '2018-01-05 05:45:25', '2018-01-05 05:45:25'),
(73, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2018-01-05 13:32:22', '2018-01-05 13:32:22'),
(74, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2018-01-08 06:00:35', '2018-01-08 06:00:35'),
(75, 1, 'Inicio', 'Salida', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha cerrado sesión', '2018-01-08 06:01:00', '2018-01-08 06:01:00'),
(76, 3, 'Inicio', 'Entrada', 'El usuario Geovanny Jesus Abbinante ha iniciado sesión', '2018-01-08 06:01:14', '2018-01-08 06:01:14'),
(77, 3, 'Inicio', 'Salida', 'El usuario Geovanny Jesus Abbinante ha cerrado sesión', '2018-01-08 06:01:38', '2018-01-08 06:01:38'),
(78, 2, 'Inicio', 'Entrada', 'El usuario Heider Daniel Sanchez ha iniciado sesión', '2018-01-08 06:01:45', '2018-01-08 06:01:45'),
(79, 2, 'Inicio', 'Salida', 'El usuario Heider Daniel Sanchez ha cerrado sesión', '2018-01-08 05:57:01', '2018-01-08 05:57:01'),
(80, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2018-01-08 09:57:18', '2018-01-08 09:57:18'),
(81, 1, 'Inicio', 'Salida', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha cerrado sesión', '2018-01-08 10:01:11', '2018-01-08 10:01:11'),
(82, 3, 'Inicio', 'Entrada', 'El usuario Geovanny Jesus Abbinante ha iniciado sesión', '2018-01-08 10:01:26', '2018-01-08 10:01:26'),
(83, 3, 'Inicio', 'Prestamos', 'El usuario Geovanny Jesus Abbinante ha almacenado el préstamo # 6', '2018-01-08 10:01:33', '2018-01-08 10:01:33'),
(84, 3, 'Inicio', 'Prestamos', 'El usuario Geovanny Jesus Abbinante ha almacenado el préstamo # 7', '2018-01-08 10:01:41', '2018-01-08 10:01:41'),
(85, 3, 'Inicio', 'Salida', 'El usuario Geovanny Jesus Abbinante ha cerrado sesión', '2018-01-08 10:01:45', '2018-01-08 10:01:45'),
(86, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2018-01-08 10:01:53', '2018-01-08 10:01:53'),
(87, 1, 'Inicio', 'Salida', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha cerrado sesión', '2018-01-08 10:10:52', '2018-01-08 10:10:52'),
(88, 7, 'Inicio', 'Entrada', 'El usuario Saori Kido ha iniciado sesión', '2018-01-08 10:35:11', '2018-01-08 10:35:11'),
(89, 7, 'Inicio', 'Salida', 'El usuario Saori Kido ha cerrado sesión', '2018-01-08 09:40:01', '2018-01-08 09:40:01'),
(90, 3, 'Inicio', 'Entrada', 'El usuario Geovanny Jesus Abbinante ha iniciado sesión', '2018-01-08 09:40:09', '2018-01-08 09:40:09'),
(91, 3, 'Inicio', 'Salida', 'El usuario Geovanny Jesus Abbinante ha cerrado sesión', '2018-01-08 09:44:19', '2018-01-08 09:44:19'),
(92, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2018-01-08 09:44:33', '2018-01-08 09:44:33'),
(93, 1, 'Inicio', 'Salida', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha cerrado sesión', '2018-01-08 09:44:58', '2018-01-08 09:44:58'),
(94, 3, 'Inicio', 'Entrada', 'El usuario Geovanny Jesus Abbinante ha iniciado sesión', '2018-01-08 09:45:06', '2018-01-08 09:45:06'),
(95, 3, 'Inicio', 'Salida', 'El usuario Geovanny Jesus Abbinante ha cerrado sesión', '2018-01-08 09:45:16', '2018-01-08 09:45:16'),
(96, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2018-01-08 09:45:34', '2018-01-08 09:45:34'),
(97, 1, 'Inicio', 'Salida', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha cerrado sesión', '2018-01-08 09:45:55', '2018-01-08 09:45:55'),
(98, 7, 'Inicio', 'Entrada', 'El usuario Saori Kido ha iniciado sesión', '2018-01-08 09:46:05', '2018-01-08 09:46:05'),
(99, 7, 'Inicio', 'Salida', 'El usuario Saori Kido ha cerrado sesión', '2018-01-08 09:46:11', '2018-01-08 09:46:11'),
(100, 3, 'Inicio', 'Entrada', 'El usuario Geovanny Jesus Abbinante ha iniciado sesión', '2018-01-08 09:46:17', '2018-01-08 09:46:17'),
(101, 3, 'Inicio', 'Salida', 'El usuario Geovanny Jesus Abbinante ha cerrado sesión', '2018-01-08 11:03:06', '2018-01-08 11:03:06'),
(102, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2018-01-08 11:03:14', '2018-01-08 11:03:14'),
(103, 1, 'Inicio', 'Salida', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha cerrado sesión', '2018-01-08 12:32:47', '2018-01-08 12:32:47'),
(104, 8, 'Inicio', 'Entrada', 'El usuario Mariana Castellanos ha iniciado sesión', '2018-01-08 12:40:18', '2018-01-08 12:40:18'),
(105, 8, 'Inicio', 'Salida', 'El usuario Mariana Castellanos ha cerrado sesión', '2018-01-08 12:41:21', '2018-01-08 12:41:21'),
(106, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2018-01-08 12:41:59', '2018-01-08 12:41:59'),
(107, 1, 'Inicio', 'Salida', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha cerrado sesión', '2018-01-08 12:45:34', '2018-01-08 12:45:34'),
(108, 7, 'Inicio', 'Entrada', 'El usuario Saori Kido ha iniciado sesión', '2018-01-08 12:45:41', '2018-01-08 12:45:41'),
(109, 7, 'Inicio', 'Salida', 'El usuario Saori Kido ha cerrado sesión', '2018-01-08 12:46:37', '2018-01-08 12:46:37'),
(110, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2018-01-08 12:46:44', '2018-01-08 12:46:44'),
(111, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2018-01-08 14:08:05', '2018-01-08 14:08:05'),
(112, 1, 'Inicio', 'Salida', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha cerrado sesión', '2018-01-08 14:08:24', '2018-01-08 14:08:24'),
(113, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2018-01-08 14:11:21', '2018-01-08 14:11:21'),
(114, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2018-01-08 13:35:52', '2018-01-08 13:35:52'),
(115, 1, 'Inicio', 'Salida', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha cerrado sesión', '2018-01-08 13:37:21', '2018-01-08 13:37:21'),
(116, 8, 'Inicio', 'Entrada', 'El usuario Mariana Castellanos ha iniciado sesión', '2018-01-08 13:37:49', '2018-01-08 13:37:49'),
(117, 8, 'Inicio', 'Salida', 'El usuario Mariana Castellanos ha cerrado sesión', '2018-01-08 13:38:52', '2018-01-08 13:38:52'),
(118, 8, 'Inicio', 'Entrada', 'El usuario Mariana Castellanos ha iniciado sesión', '2018-01-08 13:39:03', '2018-01-08 13:39:03'),
(119, 8, 'Inicio', 'Salida', 'El usuario Mariana Castellanos ha cerrado sesión', '2018-01-08 13:46:51', '2018-01-08 13:46:51'),
(120, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2018-01-08 13:50:24', '2018-01-08 13:50:24'),
(121, 1, 'Inicio', 'Salida', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha cerrado sesión', '2018-01-08 14:11:20', '2018-01-08 14:11:20'),
(122, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2018-01-08 14:15:36', '2018-01-08 14:15:36'),
(123, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2018-01-08 13:24:25', '2018-01-08 13:24:25'),
(124, 1, 'Inicio', 'Salida', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha cerrado sesión', '2018-01-08 14:26:57', '2018-01-08 14:26:57'),
(125, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2018-01-08 14:54:24', '2018-01-08 14:54:24'),
(126, 1, 'Inicio', 'Salida', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha cerrado sesión', '2018-01-08 15:01:35', '2018-01-08 15:01:35'),
(127, 3, 'Inicio', 'Entrada', 'El usuario Geovanny Jesus Abbinante ha iniciado sesión', '2018-01-08 15:01:44', '2018-01-08 15:01:44'),
(128, 3, 'Inicio', 'Salida', 'El usuario Geovanny Jesus Abbinante ha cerrado sesión', '2018-01-08 15:04:09', '2018-01-08 15:04:09'),
(129, 8, 'Inicio', 'Entrada', 'El usuario Mariana Castellanos ha iniciado sesión', '2018-01-08 15:04:16', '2018-01-08 15:04:16'),
(130, 8, 'Inicio', 'Salida', 'El usuario Mariana Castellanos ha cerrado sesión', '2018-01-08 15:04:43', '2018-01-08 15:04:43'),
(131, 3, 'Inicio', 'Entrada', 'El usuario Geovanny Jesus Abbinante ha iniciado sesión', '2018-01-08 15:04:51', '2018-01-08 15:04:51'),
(132, 3, 'Inicio', 'Salida', 'El usuario Geovanny Jesus Abbinante ha cerrado sesión', '2018-01-08 15:06:35', '2018-01-08 15:06:35'),
(133, 3, 'Inicio', 'Salida', 'El usuario Geovanny Jesus Abbinante ha cerrado sesión', '2018-01-08 15:06:40', '2018-01-08 15:06:40'),
(134, 2, 'Inicio', 'Entrada', 'El usuario Heider Daniel Sanchez ha iniciado sesión', '2018-01-08 15:06:47', '2018-01-08 15:06:47'),
(135, 2, 'Inicio', 'Salida', 'El usuario Heider Daniel Sanchez ha cerrado sesión', '2018-01-08 15:12:55', '2018-01-08 15:12:55'),
(136, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2018-01-08 15:18:21', '2018-01-08 15:18:21'),
(137, 1, 'Inicio', 'Salida', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha cerrado sesión', '2018-01-08 15:18:26', '2018-01-08 15:18:26'),
(138, 2, 'Inicio', 'Entrada', 'El usuario Heider Daniel Sanchez ha iniciado sesión', '2018-01-08 15:18:33', '2018-01-08 15:18:33'),
(139, 2, 'Inicio', 'Salida', 'El usuario Heider Daniel Sanchez ha cerrado sesión', '2018-01-08 15:42:54', '2018-01-08 15:42:54'),
(140, 3, 'Inicio', 'Entrada', 'El usuario Geovanny Jesus Abbinante ha iniciado sesión', '2018-01-08 15:43:05', '2018-01-08 15:43:05'),
(141, 3, 'Inicio', 'Salida', 'El usuario Geovanny Jesus Abbinante ha cerrado sesión', '2018-01-08 15:54:09', '2018-01-08 15:54:09'),
(142, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2018-01-08 15:54:20', '2018-01-08 15:54:20'),
(143, 1, 'Inicio', 'Salida', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha cerrado sesión', '2018-01-08 16:17:45', '2018-01-08 16:17:45'),
(144, 2, 'Inicio', 'Entrada', 'El usuario Heider Daniel Sanchez ha iniciado sesión', '2018-01-08 16:17:54', '2018-01-08 16:17:54'),
(145, 2, 'Inicio', 'Prestamos', 'El usuario Heider Daniel Sanchez ha almacenado el préstamo # 8', '2018-01-08 16:17:58', '2018-01-08 16:17:58'),
(146, 2, 'Inicio', 'Salida', 'El usuario Heider Daniel Sanchez ha cerrado sesión', '2018-01-08 16:33:07', '2018-01-08 16:33:07'),
(147, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2018-01-08 16:33:13', '2018-01-08 16:33:13'),
(148, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2018-01-10 06:00:13', '2018-01-10 06:00:13'),
(149, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2028-01-12 02:53:06', '2028-01-12 02:53:06'),
(150, 1, 'Inicio', 'Salida', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha cerrado sesión', '2028-01-12 02:55:47', '2028-01-12 02:55:47'),
(151, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2018-01-10 19:00:21', '2018-01-10 19:00:21'),
(152, 1, 'Inicio', 'Eventos', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha almacenado el préstamo # 5', '2018-01-10 19:28:49', '2018-01-10 19:28:49'),
(153, 1, 'Inicio', 'Eventos', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha almacenado el préstamo # 4', '2018-01-10 19:28:56', '2018-01-10 19:28:56'),
(154, 1, 'Inicio', 'Eventos', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha almacenado el préstamo # 5', '2018-01-10 19:35:40', '2018-01-10 19:35:40'),
(155, 1, 'Inicio', 'Eventos', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha almacenado el préstamo # 5', '2018-01-10 19:50:42', '2018-01-10 19:50:42'),
(156, 1, 'Inicio', 'Salida', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha cerrado sesión', '2018-01-10 19:55:05', '2018-01-10 19:55:05'),
(157, 2, 'Inicio', 'Entrada', 'El usuario Heider Daniel Sanchez ha iniciado sesión', '2018-01-10 19:55:20', '2018-01-10 19:55:20'),
(158, 2, 'Inicio', 'Salida', 'El usuario Heider Daniel Sanchez ha cerrado sesión', '2018-01-10 19:57:01', '2018-01-10 19:57:01'),
(159, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2018-01-10 19:57:12', '2018-01-10 19:57:12'),
(160, 1, 'Inicio', 'Prestamos', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha almacenado el préstamo # 9', '2018-01-10 20:10:20', '2018-01-10 20:10:20'),
(161, 1, 'Inicio', 'Prestamos', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha almacenado el préstamo # 10', '2018-01-10 20:18:37', '2018-01-10 20:18:37'),
(162, 1, 'Inicio', 'Salida', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha cerrado sesión', '2018-01-10 20:24:17', '2018-01-10 20:24:17'),
(163, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2018-01-10 20:24:23', '2018-01-10 20:24:23'),
(164, 1, 'Inicio', 'Salida', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha cerrado sesión', '2018-01-10 21:22:45', '2018-01-10 21:22:45'),
(165, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2018-01-10 21:23:26', '2018-01-10 21:23:26'),
(166, 1, 'Inicio', 'Salida', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha cerrado sesión', '2018-01-10 21:26:40', '2018-01-10 21:26:40'),
(167, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2018-01-10 21:27:45', '2018-01-10 21:27:45'),
(168, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2018-01-10 21:32:59', '2018-01-10 21:32:59'),
(169, 1, 'Inicio', 'Salida', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha cerrado sesión', '2018-01-10 21:33:10', '2018-01-10 21:33:10'),
(170, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2018-01-10 21:33:20', '2018-01-10 21:33:20'),
(171, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2018-01-11 00:30:11', '2018-01-11 00:30:11'),
(172, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2018-01-13 00:20:11', '2018-01-13 00:20:11'),
(173, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2018-01-15 15:24:05', '2018-01-15 15:24:05'),
(174, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2028-01-15 15:45:02', '2028-01-15 15:45:02'),
(175, 1, 'Inicio', 'Salida', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha cerrado sesión', '2028-01-15 15:54:08', '2028-01-15 15:54:08'),
(176, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2028-01-15 15:54:15', '2028-01-15 15:54:15'),
(177, 1, 'Inicio', 'Salida', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha cerrado sesión', '2028-01-15 15:54:31', '2028-01-15 15:54:31'),
(178, 2, 'Inicio', 'Entrada', 'El usuario Heider Daniel Sanchez ha iniciado sesión', '2028-01-15 15:54:41', '2028-01-15 15:54:41'),
(179, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2028-01-15 15:59:51', '2028-01-15 15:59:51'),
(180, 1, 'Inicio', 'Salida', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha cerrado sesión', '2028-01-15 16:29:37', '2028-01-15 16:29:37'),
(181, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2028-01-15 16:35:49', '2028-01-15 16:35:49'),
(182, 1, 'Inicio', 'Salida', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha cerrado sesión', '2028-01-15 16:37:51', '2028-01-15 16:37:51'),
(183, 7, 'Inicio', 'Entrada', 'El usuario Saori Kido ha iniciado sesión', '2018-01-16 02:13:57', '2018-01-16 02:13:57'),
(184, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2018-01-16 02:15:54', '2018-01-16 02:15:54'),
(185, 1, 'Inicio', 'Prestamos', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha confirmado el préstamo # 6', '2018-01-16 02:29:06', '2018-01-16 02:29:06'),
(186, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2018-01-16 06:22:28', '2018-01-16 06:22:28'),
(187, 1, 'Inicio', 'Salida', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha cerrado sesión', '2018-01-16 06:24:43', '2018-01-16 06:24:43'),
(188, 2, 'Inicio', 'Entrada', 'El usuario Heider Daniel Sanchez ha iniciado sesión', '2018-01-16 06:24:52', '2018-01-16 06:24:52'),
(189, 2, 'Inicio', 'Entrada', 'El usuario Heider Daniel Sanchez ha iniciado sesión', '2018-01-16 17:46:36', '2018-01-16 17:46:36'),
(190, 2, 'Inicio', 'Salida', 'El usuario Heider Daniel Sanchez ha cerrado sesión', '2018-01-16 17:52:21', '2018-01-16 17:52:21'),
(191, 5, 'Inicio', 'Salida', 'El usuario Esperanza Castellano ha cerrado sesión', '2018-01-16 17:55:03', '2018-01-16 17:55:03'),
(192, 5, 'Inicio', 'Entrada', 'El usuario Esperanza Castellano ha iniciado sesión', '2018-01-16 17:55:15', '2018-01-16 17:55:15'),
(193, 5, 'Inicio', 'Salida', 'El usuario Esperanza Castellano ha cerrado sesión', '2018-01-16 17:56:50', '2018-01-16 17:56:50'),
(194, 4, 'Inicio', 'Entrada', 'El usuario Jesús Omar Guevara Rivas ha iniciado sesión', '2018-01-16 18:36:22', '2018-01-16 18:36:22'),
(195, 4, 'Inicio', 'Prestamos', 'El usuario Jesús Omar Guevara Rivas ha almacenado el préstamo # 11', '2018-01-16 18:36:30', '2018-01-16 18:36:30'),
(196, 4, 'Inicio', 'Salida', 'El usuario Jesús Omar Guevara Rivas ha cerrado sesión', '2018-01-16 18:36:39', '2018-01-16 18:36:39'),
(197, 7, 'Inicio', 'Entrada', 'El usuario Saori Kido ha iniciado sesión', '2018-01-16 18:36:49', '2018-01-16 18:36:49'),
(198, 7, 'Inicio', 'Salida', 'El usuario Saori Kido ha cerrado sesión', '2018-01-16 18:36:56', '2018-01-16 18:36:56'),
(199, 8, 'Inicio', 'Entrada', 'El usuario Mariana Castellanos ha iniciado sesión', '2018-01-16 18:37:03', '2018-01-16 18:37:03'),
(200, 8, 'Inicio', 'Salida', 'El usuario Mariana Castellanos ha cerrado sesión', '2018-01-16 18:37:12', '2018-01-16 18:37:12'),
(201, 2, 'Inicio', 'Entrada', 'El usuario Heider Daniel Sanchez ha iniciado sesión', '2018-01-16 18:46:49', '2018-01-16 18:46:49'),
(202, 2, 'Inicio', 'Salida', 'El usuario Heider Daniel Sanchez ha cerrado sesión', '2018-01-16 18:50:50', '2018-01-16 18:50:50'),
(203, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2018-01-16 18:50:58', '2018-01-16 18:50:58'),
(204, 1, 'Inicio', 'Salida', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha cerrado sesión', '2018-01-16 18:53:54', '2018-01-16 18:53:54'),
(205, 3, 'Inicio', 'Entrada', 'El usuario Geovanny Jesus Abbinante ha iniciado sesión', '2018-01-16 18:54:03', '2018-01-16 18:54:03'),
(206, 3, 'Inicio', 'Salida', 'El usuario Geovanny Jesus Abbinante ha cerrado sesión', '2018-01-16 18:54:09', '2018-01-16 18:54:09'),
(207, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2018-01-16 19:50:48', '2018-01-16 19:50:48'),
(208, 2, 'Inicio', 'Entrada', 'El usuario Heider Daniel Sanchez ha iniciado sesión', '2018-01-16 22:27:29', '2018-01-16 22:27:29'),
(209, 2, 'Inicio', 'Prestamos', 'El usuario Heider Daniel Sanchez ha almacenado el préstamo # 12', '2018-01-16 22:27:34', '2018-01-16 22:27:34'),
(210, 2, 'Inicio', 'Prestamos', 'El usuario Heider Daniel Sanchez ha cancelado el préstamo # 12', '2018-01-16 22:28:07', '2018-01-16 22:28:07'),
(211, 1, 'Inicio', 'Entrada', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha iniciado sesión', '2018-01-16 22:28:40', '2018-01-16 22:28:40'),
(212, 1, 'Inicio', 'Prestamos', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha descartado el préstamo # 12', '2018-01-16 22:29:07', '2018-01-16 22:29:07'),
(213, 1, 'Inicio', 'Prestamos', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha confirmado el préstamo # 8', '2018-01-16 22:29:18', '2018-01-16 22:29:18'),
(214, 1, 'Inicio', 'Prestamos', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha finalizado el préstamo # 10', '2018-01-16 22:30:08', '2018-01-16 22:30:08'),
(215, 1, 'Inicio', 'Eventos', 'El usuario Jhosnoirlit Gabriela Hernandez Castillo ha almacenado el préstamo # 9', '2018-01-16 22:32:06', '2018-01-16 22:32:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_id` int(11) NOT NULL,
  `estado_item` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DISPONIBLE',
  `correlativo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `items`
--

INSERT INTO `items` (`id`, `book_id`, `estado_item`, `correlativo`, `created_at`, `updated_at`) VALUES
(1, 1, 'DISPONIBLE', '1', NULL, NULL),
(2, 2, 'AUSENTE', '1', NULL, '2018-01-16 02:29:06'),
(3, 2, 'DISPONIBLE', '2', NULL, '2018-01-16 22:29:07'),
(4, 2, 'DISPONIBLE', '3', NULL, NULL),
(5, 3, 'DISPONIBLE', '1', NULL, '2017-11-22 17:55:12'),
(6, 3, 'DISPONIBLE', '2', NULL, NULL),
(7, 3, 'DISPONIBLE', '3', NULL, NULL),
(8, 4, 'DISPONIBLE', '1', NULL, '2018-01-16 22:30:08'),
(9, 4, 'DISPONIBLE', '2', NULL, NULL),
(10, 4, 'DISPONIBLE', '3', NULL, NULL),
(11, 5, 'DISPONIBLE', '1', NULL, '2018-01-16 02:29:03'),
(12, 5, 'AUSENTE', '2', NULL, '2018-01-16 22:29:18'),
(13, 5, 'DISPONIBLE', '3', NULL, NULL),
(14, 5, 'DISPONIBLE', '4', NULL, NULL),
(15, 6, 'AUSENTE', '1', NULL, '2017-11-22 17:54:21'),
(16, 6, 'DISPONIBLE', '2', NULL, NULL),
(17, 6, 'DISPONIBLE', '3', NULL, NULL),
(18, 7, 'DISPONIBLE', '5146541', '2017-11-22 17:06:02', '2017-11-22 17:06:02'),
(19, 8, 'DISPONIBLE', '1278728', '2017-11-22 17:09:12', '2017-11-22 17:09:12'),
(20, 9, 'DISPONIBLE', '32312', '2017-11-22 18:38:50', '2017-11-22 18:38:50'),
(21, 2, 'DISPONIBLE', '4147254524', '2018-01-16 02:32:48', '2018-01-16 02:32:48'),
(22, 10, 'SOLICITADO', '1513215', '2018-01-16 06:24:35', '2018-01-16 18:36:30'),
(23, 10, 'DISPONIBLE', '215151', '2018-01-16 17:50:34', '2018-01-16 17:50:34'),
(24, 10, 'DISPONIBLE', '42545245', '2018-01-16 17:51:16', '2018-01-16 17:51:16'),
(25, 10, 'DISPONIBLE', '42425', '2018-01-16 17:51:23', '2018-01-16 17:51:23'),
(26, 11, 'DISPONIBLE', '3456754', '2018-01-16 22:51:20', '2018-01-16 22:51:20'),
(27, 2, 'DISPONIBLE', '34567897', '2018-01-16 22:52:38', '2018-01-16 22:52:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `loans`
--

CREATE TABLE `loans` (
  `id` int(10) UNSIGNED NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nombre_responsable` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_responsable` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_retirado` datetime DEFAULT NULL,
  `fecha_expiracion` datetime DEFAULT NULL,
  `fecha_devuelto` datetime DEFAULT NULL,
  `confirmado` tinyint(1) NOT NULL DEFAULT '1',
  `observaciones` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `loans`
--

INSERT INTO `loans` (`id`, `estado`, `item_id`, `user_id`, `nombre_responsable`, `telefono_responsable`, `fecha_retirado`, `fecha_expiracion`, `fecha_devuelto`, `confirmado`, `observaciones`, `created_at`, `updated_at`) VALUES
(1, 'DEVUELTO', 2, 2, NULL, NULL, NULL, '2017-11-29 00:00:00', '2017-11-22 01:55:02', 1, '', '2017-11-22 17:52:43', '2017-11-22 17:55:02'),
(2, 'DEVUELTO', 5, 2, NULL, NULL, NULL, '2017-11-29 00:00:00', '2017-11-22 01:55:12', 1, '', '2017-11-22 17:52:47', '2017-11-22 17:55:12'),
(3, 'DEVUELTO', 8, 2, NULL, NULL, NULL, '2017-11-29 00:00:00', '2017-11-22 01:55:18', 1, '', '2017-11-22 17:52:52', '2017-11-22 17:55:18'),
(4, 'SIN DEVOLVER', 15, 3, NULL, NULL, NULL, '2017-11-29 00:00:00', NULL, 1, '', '2017-11-22 17:53:16', '2017-11-22 17:54:21'),
(5, 'DEVUELTO', 11, 3, NULL, NULL, NULL, '2017-11-29 00:00:00', '2017-11-22 01:54:12', 1, '', '2017-11-22 17:53:19', '2017-11-22 17:54:12'),
(6, 'SIN DEVOLVER', 2, 3, NULL, NULL, NULL, '2018-01-20 00:00:00', NULL, 1, '', '2018-01-08 10:01:33', '2018-01-16 02:29:06'),
(7, 'SIN RETIRAR', 11, 3, NULL, NULL, NULL, '2018-01-11 00:00:00', NULL, 1, '', '2018-01-08 10:01:40', '2018-01-08 10:01:40'),
(8, 'SIN DEVOLVER', 12, 2, NULL, NULL, NULL, '2018-01-23 00:00:00', NULL, 1, '', '2018-01-08 16:17:57', '2018-01-16 22:29:17'),
(10, 'DEVUELTO', 8, 7, NULL, NULL, NULL, '2018-01-17 00:00:00', '2018-01-16 06:30:07', 1, 'rayas', '2018-01-10 20:18:37', '2018-01-16 22:30:07'),
(11, 'SIN RETIRAR', 22, 4, NULL, NULL, NULL, '2018-01-19 00:00:00', NULL, 1, '', '2018-01-16 18:36:30', '2018-01-16 18:36:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(552, '2014_10_12_000000_create_users_table', 1),
(553, '2014_10_12_100000_create_password_resets_table', 1),
(554, '2017_07_05_160001_create_books_table', 1),
(555, '2017_07_05_160010_create_loans_table', 1),
(556, '2017_07_05_160021_create_events_table', 1),
(557, '2017_07_05_160035_create_items_table', 1),
(558, '2017_07_05_160337_author_book', 1),
(559, '2017_07_05_160346_book_tag', 1),
(560, '2017_07_05_214316_create_authors_table', 1),
(561, '2017_07_05_214627_create_tags_table', 1),
(562, '2017_07_05_214644_create_humans_table', 1),
(563, '2017_07_05_214658_create_specialities_table', 1),
(564, '2017_07_05_214709_create_students_table', 1),
(565, '2017_07_06_042339_create_notifications_table', 1),
(566, '2017_07_08_163948_create_queries_table', 1),
(567, '2017_09_17_131406_create_internos_table', 1),
(568, '2017_11_16_112952_create_privilegios_table', 1),
(569, '2017_11_18_193359_create_teachers_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `loan_request_id` int(11) DEFAULT NULL,
  `visto` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `event_id`, `loan_request_id`, `visto`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, 1, '2017-11-20 23:28:06', '2017-11-21 01:42:51'),
(2, 1, 2, NULL, 1, '2017-11-22 17:52:08', '2017-11-22 17:55:23'),
(3, 1, 3, NULL, 1, '2017-11-22 17:52:28', '2017-11-22 17:55:23'),
(4, 1, NULL, 1, 1, '2017-11-22 17:52:43', '2017-11-22 17:53:57'),
(5, 1, NULL, 2, 1, '2017-11-22 17:52:47', '2017-11-22 17:53:57'),
(6, 1, NULL, 3, 1, '2017-11-22 17:52:52', '2017-11-22 17:53:57'),
(7, 1, NULL, 4, 1, '2017-11-22 17:53:16', '2017-11-22 17:53:57'),
(8, 1, NULL, 5, 1, '2017-11-22 17:53:19', '2017-11-22 17:53:57'),
(9, 1, 4, NULL, 1, '2018-01-05 13:26:58', '2018-01-08 11:03:31'),
(10, 1, NULL, 6, 1, '2018-01-08 10:01:33', '2018-01-08 11:03:28'),
(11, 1, NULL, 7, 1, '2018-01-08 10:01:41', '2018-01-08 11:03:28'),
(12, 1, NULL, 8, 1, '2018-01-08 16:17:58', '2018-01-10 20:10:21'),
(13, 1, 4, NULL, 1, '2018-01-10 18:58:56', '2018-01-10 19:00:34'),
(14, 1, 5, NULL, 1, '2018-01-10 19:00:12', '2018-01-10 19:00:34'),
(15, 1, 6, NULL, 1, '2018-01-13 00:55:24', '2018-01-13 00:55:31'),
(16, 1, 8, NULL, 1, '2018-01-16 17:47:28', '2018-01-16 22:31:31'),
(17, 1, NULL, 11, 1, '2018-01-16 18:36:30', '2018-01-16 22:28:54'),
(18, 1, NULL, 12, 1, '2018-01-16 22:27:34', '2018-01-16 22:28:54'),
(19, 1, 9, NULL, 1, '2018-01-16 22:31:23', '2018-01-16 22:31:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegios`
--

CREATE TABLE `privilegios` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `modulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_privilegio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `privilegios`
--

INSERT INTO `privilegios` (`id`, `user_id`, `modulo`, `accion`, `url_privilegio`, `created_at`, `updated_at`) VALUES
(5, 5, 'Registro', 'Agregar', '', '2017-11-22 16:57:53', '2017-11-22 16:57:53'),
(6, 5, 'Registro', 'Modificar', '', '2017-11-22 16:57:53', '2017-11-22 16:57:53'),
(7, 5, 'Registro', 'Eliminar', '', '2017-11-22 16:57:53', '2017-11-22 16:57:53'),
(8, 5, 'Registro', 'Agregar Ejemplar', '', '2017-11-22 16:57:53', '2017-11-22 16:57:53'),
(9, 5, 'Prestamos', 'Solicitud', 'http://localhost/bivlu/public/virtuales', '2017-11-22 16:57:53', '2017-11-22 16:57:53'),
(10, 5, 'Prestamos', 'Devoluciones', 'http://localhost/bivlu/public/prestamos', '2017-11-22 16:57:53', '2017-11-22 16:57:53'),
(11, 5, 'Eventos', 'Propuestas', 'http://localhost/bivlu/public/reservaciones', '2017-11-22 16:57:53', '2017-11-22 16:57:53'),
(12, 5, 'Eventos', 'Pendientes', 'http://localhost/bivlu/public/eventos', '2017-11-22 16:57:53', '2017-11-22 16:57:53'),
(13, 5, 'Actividades', NULL, 'http://localhost/bivlu/public/actividades', '2017-11-22 16:57:53', '2017-11-22 16:57:53'),
(14, 5, 'Consultas', 'Individuales', 'http://localhost/bivlu/public/consultas', '2017-11-22 16:57:53', '2017-11-22 16:57:53'),
(15, 5, 'Consultas', 'Solventes y Morosos', 'http://localhost/bivlu/public/reportes', '2017-11-22 16:57:53', '2017-11-22 16:57:53'),
(16, 5, 'Consultas', 'Estadisticas', 'http://localhost/bivlu/public/estadisticas', '2017-11-22 16:57:53', '2017-11-22 16:57:53'),
(17, 5, 'Mantenimiento', 'Usuarios', 'http://localhost/bivlu/public/usuarios', '2017-11-22 16:57:53', '2017-11-22 16:57:53'),
(18, 5, 'Mantenimiento', 'Respaldo', 'http://localhost/bivlu/public/respaldo', '2017-11-22 16:57:53', '2017-11-22 16:57:53'),
(19, 5, 'Mantenimiento', 'Restauracion', 'http://localhost/bivlu/public/restauracion', '2017-11-22 16:57:53', '2017-11-22 16:57:53'),
(20, 5, 'Mantenimiento', 'Bitacora', 'http://localhost/bivlu/public/bitacora', '2017-11-22 16:57:53', '2017-11-22 16:57:53'),
(29, 6, 'Libros', 'Mis Solicitudes', 'http://localhost/bivlu/public/virtuales', '2017-11-27 22:17:55', '2017-11-27 22:17:55'),
(30, 6, 'Libros', 'Mis Préstamos', 'http://localhost/bivlu/public/prestamos', '2017-11-27 22:17:55', '2017-11-27 22:17:55'),
(31, 6, 'Libros', 'Histórico de Préstamos', 'http://localhost/bivlu/public/historial', '2017-11-27 22:17:55', '2017-11-27 22:17:55'),
(32, 6, 'Actividades', NULL, 'http://localhost/bivlu/public/actividades', '2017-11-27 22:17:55', '2017-11-27 22:17:55'),
(77, 4, 'Libros', 'Mis Solicitudes', 'http://localhost/bivlu/public/virtuales', '2017-11-27 22:50:55', '2017-11-27 22:50:55'),
(78, 4, 'Libros', 'Mis Préstamos', 'http://localhost/bivlu/public/prestamos', '2017-11-27 22:50:55', '2017-11-27 22:50:55'),
(79, 4, 'Libros', 'Histórico de Préstamos', 'http://localhost/bivlu/public/historial', '2017-11-27 22:50:55', '2017-11-27 22:50:55'),
(80, 4, 'Actividades', NULL, 'http://localhost/bivlu/public/actividades', '2017-11-27 22:50:55', '2017-11-27 22:50:55'),
(81, 4, 'Consultas', 'Solventes y Morosos', 'http://localhost/bivlu/public/reportes', '2017-11-27 22:50:55', '2017-11-27 22:50:55'),
(82, 4, 'Consultas', 'Estadisticas', 'http://localhost/bivlu/public/estadisticas', '2017-11-27 22:50:55', '2017-11-27 22:50:55'),
(83, 1, 'Registro', 'Agregar', '', '2018-01-08 06:00:23', '2018-01-08 06:00:23'),
(84, 1, 'Registro', 'Modificar', '', '2018-01-08 06:00:23', '2018-01-08 06:00:23'),
(85, 1, 'Registro', 'Eliminar', '', '2018-01-08 06:00:23', '2018-01-08 06:00:23'),
(86, 1, 'Registro', 'Agregar Ejemplar', '', '2018-01-08 06:00:23', '2018-01-08 06:00:23'),
(87, 1, 'Libros', 'Mis Solicitudes', 'http://localhost/bivlu/public/virtuales', '2018-01-08 06:00:23', '2018-01-08 06:00:23'),
(88, 1, 'Libros', 'Mis Préstamos', 'http://localhost/bivlu/public/prestamos', '2018-01-08 06:00:23', '2018-01-08 06:00:23'),
(89, 1, 'Libros', 'Histórico de Préstamos', 'http://localhost/bivlu/public/historial', '2018-01-08 06:00:24', '2018-01-08 06:00:24'),
(90, 1, 'Prestamos', 'Solicitud', 'http://localhost/bivlu/public/virtuales', '2018-01-08 06:00:24', '2018-01-08 06:00:24'),
(91, 1, 'Prestamos', 'Devoluciones', 'http://localhost/bivlu/public/prestamos', '2018-01-08 06:00:24', '2018-01-08 06:00:24'),
(92, 1, 'Eventos', 'Propuestas', 'http://localhost/bivlu/public/reservaciones', '2018-01-08 06:00:24', '2018-01-08 06:00:24'),
(93, 1, 'Eventos', 'Pendientes', 'http://localhost/bivlu/public/eventos', '2018-01-08 06:00:24', '2018-01-08 06:00:24'),
(94, 1, 'Consultas', 'Individuales', 'http://localhost/bivlu/public/consultas', '2018-01-08 06:00:24', '2018-01-08 06:00:24'),
(95, 1, 'Consultas', 'Solventes y Morosos', 'http://localhost/bivlu/public/reportes', '2018-01-08 06:00:24', '2018-01-08 06:00:24'),
(96, 1, 'Consultas', 'Estadisticas', 'http://localhost/bivlu/public/estadisticas', '2018-01-08 06:00:24', '2018-01-08 06:00:24'),
(97, 1, 'Mantenimiento', 'Usuarios', 'http://localhost/bivlu/public/usuarios', '2018-01-08 06:00:24', '2018-01-08 06:00:24'),
(98, 1, 'Mantenimiento', 'Respaldo', 'http://localhost/bivlu/public/respaldo', '2018-01-08 06:00:24', '2018-01-08 06:00:24'),
(99, 1, 'Mantenimiento', 'Restauracion', 'http://localhost/bivlu/public/restauracion', '2018-01-08 06:00:24', '2018-01-08 06:00:24'),
(100, 1, 'Mantenimiento', 'Bitacora', 'http://localhost/bivlu/public/bitacora', '2018-01-08 06:00:24', '2018-01-08 06:00:24'),
(111, 3, 'Libros', 'Mis Solicitudes', 'http://localhost/bivlu/public/virtuales', '2018-01-08 09:45:51', '2018-01-08 09:45:51'),
(112, 3, 'Libros', 'Mis Préstamos', 'http://localhost/bivlu/public/prestamos', '2018-01-08 09:45:51', '2018-01-08 09:45:51'),
(113, 3, 'Libros', 'Histórico de Préstamos', 'http://localhost/bivlu/public/historial', '2018-01-08 09:45:51', '2018-01-08 09:45:51'),
(114, 3, 'Actividades', NULL, 'http://localhost/bivlu/public/actividades', '2018-01-08 09:45:51', '2018-01-08 09:45:51'),
(115, 8, 'Libros', 'Mis Solicitudes', 'http://localhost/bivlu/public/virtuales', '2018-01-08 12:39:26', '2018-01-08 12:39:26'),
(116, 8, 'Libros', 'Mis Préstamos', 'http://localhost/bivlu/public/prestamos', '2018-01-08 12:39:26', '2018-01-08 12:39:26'),
(117, 8, 'Libros', 'Histórico de Préstamos', 'http://localhost/bivlu/public/historial', '2018-01-08 12:39:26', '2018-01-08 12:39:26'),
(118, 8, 'Actividades', NULL, 'http://localhost/bivlu/public/actividades', '2018-01-08 12:39:27', '2018-01-08 12:39:27'),
(127, 7, 'Registro', 'Agregar', '', '2028-01-15 16:01:24', '2028-01-15 16:01:24'),
(128, 7, 'Registro', 'Modificar', '', '2028-01-15 16:01:24', '2028-01-15 16:01:24'),
(129, 7, 'Registro', 'Eliminar', '', '2028-01-15 16:01:24', '2028-01-15 16:01:24'),
(130, 7, 'Registro', 'Agregar Ejemplar', '', '2028-01-15 16:01:24', '2028-01-15 16:01:24'),
(131, 7, 'Libros', 'Mis Solicitudes', 'http://localhost/bivlu/public/virtuales', '2028-01-15 16:01:24', '2028-01-15 16:01:24'),
(132, 7, 'Libros', 'Mis Préstamos', 'http://localhost/bivlu/public/prestamos', '2028-01-15 16:01:24', '2028-01-15 16:01:24'),
(133, 7, 'Libros', 'Histórico de Préstamos', 'http://localhost/bivlu/public/historial', '2028-01-15 16:01:24', '2028-01-15 16:01:24'),
(134, 7, 'Prestamos', 'Solicitud', 'http://localhost/bivlu/public/virtuales', '2028-01-15 16:01:24', '2028-01-15 16:01:24'),
(135, 7, 'Actividades', NULL, 'http://localhost/bivlu/public/actividades', '2028-01-15 16:01:24', '2028-01-15 16:01:24'),
(136, 9, 'Libros', 'Mis Solicitudes', 'http://localhost/bivlu/public/virtuales', '2018-01-16 22:47:20', '2018-01-16 22:47:20'),
(137, 9, 'Libros', 'Mis Préstamos', 'http://localhost/bivlu/public/prestamos', '2018-01-16 22:47:20', '2018-01-16 22:47:20'),
(138, 9, 'Libros', 'Histórico de Préstamos', 'http://localhost/bivlu/public/historial', '2018-01-16 22:47:20', '2018-01-16 22:47:20'),
(139, 9, 'Actividades', NULL, 'http://localhost/bivlu/public/actividades', '2018-01-16 22:47:20', '2018-01-16 22:47:20'),
(149, 2, 'Libros', 'Mis Solicitudes', 'http://localhost/bivlu/public/virtuales', '2018-01-16 22:48:25', '2018-01-16 22:48:25'),
(150, 2, 'Libros', 'Mis Préstamos', 'http://localhost/bivlu/public/prestamos', '2018-01-16 22:48:25', '2018-01-16 22:48:25'),
(151, 2, 'Libros', 'Histórico de Préstamos', 'http://localhost/bivlu/public/historial', '2018-01-16 22:48:25', '2018-01-16 22:48:25'),
(152, 2, 'Eventos', 'Propuestas', 'http://localhost/bivlu/public/reservaciones', '2018-01-16 22:48:25', '2018-01-16 22:48:25'),
(153, 2, 'Eventos', 'Pendientes', 'http://localhost/bivlu/public/eventos', '2018-01-16 22:48:25', '2018-01-16 22:48:25'),
(154, 2, 'Actividades', NULL, 'http://localhost/bivlu/public/actividades', '2018-01-16 22:48:25', '2018-01-16 22:48:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `queries`
--

CREATE TABLE `queries` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `queried_resource` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `queries`
--

INSERT INTO `queries` (`id`, `user_id`, `queried_resource`, `created_at`, `updated_at`) VALUES
(1, 2, 'carnet', '2017-11-22 18:56:34', '2017-11-22 18:56:34'),
(2, 2, 'carnet', '2017-11-22 18:58:07', '2017-11-22 18:58:07'),
(3, 2, 'carnet', '2017-11-22 18:58:35', '2017-11-22 18:58:35'),
(4, 2, 'carnet', '2017-11-22 18:58:49', '2017-11-22 18:58:49'),
(5, 2, 'carnet', '2017-11-22 18:59:00', '2017-11-22 18:59:00'),
(6, 2, 'solvencia', '2017-11-27 22:55:38', '2017-11-27 22:55:38'),
(7, 2, 'solvencia', '2017-11-27 22:55:39', '2017-11-27 22:55:39'),
(8, 8, 'carnet', '2018-01-08 12:42:15', '2018-01-08 12:42:15'),
(9, 8, 'carnet', '2018-01-08 12:42:17', '2018-01-08 12:42:17'),
(10, 8, 'carnet', '2018-01-08 12:42:22', '2018-01-08 12:42:22'),
(11, 8, 'solvencia', '2018-01-08 12:42:25', '2018-01-08 12:42:25'),
(12, 8, 'solvencia', '2018-01-08 12:42:27', '2018-01-08 12:42:27'),
(13, 8, 'carnet', '2018-01-08 12:42:54', '2018-01-08 12:42:54'),
(14, 8, 'carnet', '2018-01-08 12:42:56', '2018-01-08 12:42:56'),
(15, 8, 'carnet', '2018-01-08 12:42:59', '2018-01-08 12:42:59'),
(16, 8, 'carnet', '2018-01-08 12:42:59', '2018-01-08 12:42:59'),
(17, 8, 'carnet', '2018-01-08 12:44:06', '2018-01-08 12:44:06'),
(18, 7, 'carnet', '2018-01-08 12:45:30', '2018-01-08 12:45:30'),
(19, 7, 'carnet', '2018-01-08 12:46:53', '2018-01-08 12:46:53'),
(20, 8, 'carnet', '2018-01-08 12:50:01', '2018-01-08 12:50:01'),
(21, 8, 'carnet', '2018-01-08 12:51:48', '2018-01-08 12:51:48'),
(22, 7, 'carnet', '2018-01-08 12:52:18', '2018-01-08 12:52:18'),
(23, 7, 'carnet', '2018-01-08 12:52:46', '2018-01-08 12:52:46'),
(24, 7, 'carnet', '2018-01-08 12:52:50', '2018-01-08 12:52:50'),
(25, 8, 'carnet', '2018-01-08 12:53:07', '2018-01-08 12:53:07'),
(26, 7, 'carnet', '2018-01-08 12:53:24', '2018-01-08 12:53:24'),
(27, 2, 'carnet', '2018-01-08 15:18:57', '2018-01-08 15:18:57'),
(28, 7, 'carnet', '2028-01-15 16:07:20', '2028-01-15 16:07:20'),
(29, 7, 'carnet', '2028-01-15 16:08:25', '2028-01-15 16:08:25'),
(30, 2, 'carnet', '2028-01-15 16:08:51', '2028-01-15 16:08:51'),
(31, 3, 'carnet', '2028-01-15 16:09:09', '2028-01-15 16:09:09'),
(32, 8, 'carnet', '2028-01-15 16:10:33', '2028-01-15 16:10:33'),
(33, 8, 'carnet', '2018-01-16 02:31:07', '2018-01-16 02:31:07'),
(34, 8, 'solvencia', '2018-01-16 02:31:11', '2018-01-16 02:31:11'),
(35, 8, 'solvencia', '2018-01-16 02:31:13', '2018-01-16 02:31:13'),
(36, 8, 'solvencia', '2018-01-16 02:31:14', '2018-01-16 02:31:14'),
(37, 8, 'solvencia', '2018-01-16 02:31:14', '2018-01-16 02:31:14'),
(38, 8, 'carnet', '2018-01-16 17:47:46', '2018-01-16 17:47:46'),
(39, 8, 'solvencia', '2018-01-16 17:47:53', '2018-01-16 17:47:53'),
(40, 8, 'solvencia', '2018-01-16 17:47:55', '2018-01-16 17:47:55'),
(41, 8, 'solvencia', '2018-01-16 17:47:57', '2018-01-16 17:47:57'),
(42, 8, 'solvencia', '2018-01-16 17:47:58', '2018-01-16 17:47:58'),
(43, 8, 'carnet', '2018-01-16 22:37:08', '2018-01-16 22:37:08'),
(44, 7, 'carnet', '2018-01-16 22:38:55', '2018-01-16 22:38:55'),
(45, 7, 'solvencia', '2018-01-16 22:39:40', '2018-01-16 22:39:40'),
(46, 7, 'solvencia', '2018-01-16 22:39:41', '2018-01-16 22:39:41'),
(47, 2, 'solvencia', '2018-01-16 22:40:38', '2018-01-16 22:40:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `specialities`
--

CREATE TABLE `specialities` (
  `id` int(10) UNSIGNED NOT NULL,
  `especialidad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `specialities`
--

INSERT INTO `specialities` (`id`, `especialidad`, `area`, `created_at`, `updated_at`) VALUES
(1, 'Informatica', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `speciality_id` int(11) NOT NULL,
  `human_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `students`
--

INSERT INTO `students` (`id`, `speciality_id`, `human_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2017-11-20 23:19:10', '2017-11-20 23:19:10'),
(2, 1, 3, '2017-11-20 23:19:10', '2017-11-20 23:19:10'),
(3, 1, 6, '2017-11-20 23:19:10', '2017-11-20 23:19:10'),
(4, 1, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `palabras` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tags`
--

INSERT INTO `tags` (`id`, `palabras`, `created_at`, `updated_at`) VALUES
(1, 'ROMANCE', NULL, NULL),
(2, 'AVENTURA', NULL, NULL),
(3, 'CIENCIA DE COMPUTACIÓN', '2017-11-22 17:06:02', '2017-11-22 17:06:02'),
(4, 'PHP', '2017-11-22 17:09:12', '2017-11-22 17:09:12'),
(5, 'LARAVEL', '2017-11-22 17:09:12', '2017-11-22 17:09:12'),
(6, 'INFORMATICA', '2017-11-22 17:09:12', '2017-11-22 17:09:12'),
(7, 'TRAYECTO 3', '2017-11-22 17:09:12', '2017-11-22 17:09:12'),
(8, 'AI', '2017-11-22 18:38:50', '2017-11-22 18:38:50'),
(9, '', '2017-12-05 01:01:32', '2017-12-05 01:01:32'),
(10, 'INTRIGA', '2018-01-16 06:24:35', '2018-01-16 06:24:35'),
(11, 'POLICIACO', '2018-01-16 06:24:35', '2018-01-16 06:24:35'),
(12, 'BASICO', '2018-01-16 22:51:20', '2018-01-16 22:51:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `domanda_di_securida` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Nombre de la mascota',
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `human_id` int(11) NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `user_level`, `password`, `domanda_di_securida`, `answer`, `human_id`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jhosnoirlit', 'jhosno@gmail.com', 'admin', '$2y$10$i6boBViEJDlDQyLyiqNAA.FgQKJVKq5JcwKsa7uX/RxH/4516BPx.', 'Nombre de su software', '8bde8092064e49750622cda3e74191a9', 1, 'f54ecfd098dad8ab9fefd278e18c7395.jpg', 'ufeYBU9nsL05BXrm7hXFVELvsspsIc6nps1qg948a0Kr4XWcxyfAcZubUSXr', '2017-11-20 23:19:11', '2018-01-08 12:35:50'),
(2, 'Daniel', 'daniel@gmail.com', 'estudiante', '$2y$10$EXE2zd1LJxeZDeJjKk3pC..IYRuiVTTeuEOHU.JQvBl.YjqDpSFYC', 'Nombre de la mascota', '8BDE8092064E49750622CDA3E74191A9', 2, 'f2ace89313c1d6b2c14a473b1039f3fa.jpg', 'eukhIB9cUUlJMSWaTEO4I1lQUBG0Et6issImauJ2h7kPhYFawhwM642rrcPl', '2017-11-20 23:19:11', '2018-01-08 15:07:21'),
(3, 'Geovanny', 'geovanny@gmail.com', 'estudiante', '$2y$10$/7INmhRFQg7.BJvwOxfZau4j5xgK0Sc2p2aAxpnffEPUlm5VkOWci', 'Nombre de la mascota', '8BDE8092064E49750622CDA3E74191A9', 3, '', 'TNB08P894HZfzwfS7myH3UALv4xk6Ek9g0OE8OpXK4CYGMmb48lJW0JKA7OJ', '2017-11-20 23:19:11', '2017-11-20 23:19:11'),
(4, 'Jesús', 'yisus@gmail.com', 'profesor', '$2y$10$oAj2E7ICncXJmAtffjZp4uUmpHL.WV7HIA7kQjHDIGnUVKNZmEHgy', 'Nombre de la mascota', '8BDE8092064E49750622CDA3E74191A9', 4, 'b2650aaa26715ae1be98e5796b4d7d8f.jpg', 'dyRf0DqEKhEDZkVElsQPVzBv1OoKP6EGFTODSppH8LN8fglYAtK0vV4T3HFB', '2017-11-20 23:19:11', '2017-11-27 22:53:04'),
(5, 'Esperanza', 'ecastellanos@gmail.com', 'jefe', '$2y$10$7w04MpIgbjJ/k9BCAUP1yOjS7i0TD/aPPE.aL3yUr1ctN53qoUoKa', 'Nombre de la mascota', '8BDE8092064E49750622CDA3E74191A9', 5, '', 'ISAckG4s6XNDL7BIT8qcXiREECMT417qCN81DbDLhqTTHULWFy8cwJjuWycr', '2017-11-20 23:19:12', '2017-11-20 23:19:12'),
(7, 'Saori', 'skido@gmail.com', 'estudiante', '$2y$10$npjzByWNyC3JdfAuPJCDb.res/MGv7K9to05zPjMLU.i31uXMvotC', 'Nombre de la mascota', '8BDE8092064E49750622CDA3E74191A9', 6, '4f688764695372cbad1503a3aeee58c4.jpg', 'lqFTtAZhwVaYIcY2B9KYuvzKjYxZSSaSBhRWYrNzAbop5QZkvQFtfsG6Qi0M', '2017-11-27 22:44:25', '2018-01-08 12:46:30'),
(8, 'Mariana', 'mcastellanos@gmail.com', 'estudiante', '$2y$10$33tZHm9/Anef1f0NpgUTCuIU.kJtDyu.kww54aae5/jSyl9lPyBau', 'Nombre de la mascota', '8BDE8092064E49750622CDA3E74191A9', 7, '9166420a673e9fa3393df831d91f14db.png', 'kAuZNI05RwFsjc3qzI05WZsYPaJJOIYI9eflR8GwgHkpav2Fpog3KwbG4RM5', '2018-01-08 12:39:26', '2018-01-08 12:41:16'),
(9, 'José Antonio', 'josan@gmail.com', 'estudiante', '$2y$10$kdLDk23fvhdCvqoroZzUL.W5Gjppcxjn0I9uP9sKhhZDD1EJ8B1J6', 'Nombre de la mascota', '', 8, '', NULL, '2018-01-16 22:47:20', '2018-01-16 22:47:20');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `author_book`
--
ALTER TABLE `author_book`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `book_tag`
--
ALTER TABLE `book_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `humans`
--
ALTER TABLE `humans`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `internos`
--
ALTER TABLE `internos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `privilegios`
--
ALTER TABLE `privilegios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `specialities`
--
ALTER TABLE `specialities`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `author_book`
--
ALTER TABLE `author_book`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `book_tag`
--
ALTER TABLE `book_tag`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT de la tabla `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `humans`
--
ALTER TABLE `humans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `internos`
--
ALTER TABLE `internos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;
--
-- AUTO_INCREMENT de la tabla `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `loans`
--
ALTER TABLE `loans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=570;
--
-- AUTO_INCREMENT de la tabla `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `privilegios`
--
ALTER TABLE `privilegios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;
--
-- AUTO_INCREMENT de la tabla `queries`
--
ALTER TABLE `queries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT de la tabla `specialities`
--
ALTER TABLE `specialities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
