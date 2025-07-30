-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-07-2025 a las 09:55:53
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id_actividad` int(11) NOT NULL,
  `anio_escolar` varchar(25) NOT NULL,
  `tipo_contenido` varchar(55) DEFAULT NULL,
  `contenido` varchar(255) NOT NULL,
  `id_materia` int(10) NOT NULL,
  `id_grado` int(10) NOT NULL,
  `id_profesor` int(10) NOT NULL,
  `id_estado` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id_actividad`, `anio_escolar`, `tipo_contenido`, `contenido`, `id_materia`, `id_grado`, `id_profesor`, `id_estado`) VALUES
(30, '2025-2026', 'Contenidos', 'Realiza actividad escrita de la letra Aa hasta la Hh.', 111, 1, 47, 1),
(32, '2025-2026', 'Contenidos', 'Realiza actividad escrita de la letra Ii hasta Rr.', 111, 1, 47, 2),
(35, '2025-2026', 'Caligrafía', 'Realiza caligrafías programadas.', 111, 1, 47, 2),
(36, '2025-2026', 'Caligrafía', 'Sigue el patrón en la escritura mayúscula en cuaderno doble línea.', 111, 1, 47, 2),
(37, '2025-2026', 'Escritura', 'Modela la letra según el patrón recomendado (modelo palmer estándar cursiva ).', 111, 1, 47, 2),
(38, '2025-2026', 'Escritura', 'Modela  letras mayusculas según el patrón dado. (Tamaño, línea completa).', 111, 1, 47, 2),
(39, '2025-2026', 'Escritura', 'Modela  letras minusculas según el patrón dado.(Tamaño, línea pequeña).', 111, 1, 47, 2),
(40, '2025-2026', 'Escritura', 'Se le facilita la escritura cursiva de letras mayúsculas.', 111, 1, 47, 2),
(41, '2025-2026', 'Contenidos', 'Realiza actividad efeméride de 14 de septiembre con su dibujo.', 112, 1, 47, 2),
(42, '2025-2026', 'Contenidos', 'Realiza actividad efeméride de 12 de 0tubre  con su dibujo.', 112, 1, 47, 2),
(43, '2025-2026', 'Contenidos', 'Realiza actividad efeméride de Día de la alimentación  con su dibujo.', 112, 1, 47, 2),
(44, '2025-2026', 'Contenidos', 'Realiza actividad efeméride  de Simón Rodríguez  con su dibujo.', 112, 1, 47, 2),
(45, '2025-2026', 'Contenidos', 'Asistió a la actividad', 114, 1, 47, 2),
(46, '2025-2026', 'Contenidos', 'Realizó los ejercicios pautados según lo asignado para la casa.', 114, 1, 47, 2),
(47, '2025-2026', 'Contenidos', 'Mostró seguridad al realizar las actividades', 114, 1, 47, 2),
(48, '2025-2026', 'Contenidos', 'Identificó que las actividades eran los contenidos  enviados a casa.', 114, 1, 47, 2),
(49, '2025-2026', 'Contenidos', 'Realizó las actividades de deporte enviadas a casa', 113, 1, 47, 2),
(50, '2025-2026', 'Contenidos', 'Mostró  coordinación corporal en actividad de bienvenida en aula.', 113, 1, 47, 2),
(51, '2025-2026', 'Contenidos', 'Realizó flor de papel.', 115, 1, 47, 2),
(52, '2025-2026', 'Contenidos', 'Realizó angel navideño.', 116, 1, 47, 2),
(53, '2025-2026', 'Contenidos', 'Realizó estrella de navidad.', 116, 1, 47, 2),
(54, '2025-2026', 'Contenidos', 'Participó el niño en su construccion.', 116, 1, 47, 2),
(55, '2025-2026', 'Contenidos', 'Cumple con las asignaciones y ejercicios.', 115, 1, 47, 2),
(56, '2025-2026', 'Contenidos', 'Atiende instrucciones en las actividades presenciales.', 115, 1, 47, 2),
(57, '2025-2026', 'Contenidos', 'Trabaja en orden  siguiendo patrones.', 115, 1, 47, 2),
(58, '2025-2026', 'Contenidos', 'Presenta pulcritud en sus trabajos.', 115, 1, 47, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aulas`
--

CREATE TABLE `aulas` (
  `id_aula` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `capacidad` int(11) NOT NULL,
  `id_grado` int(11) NOT NULL,
  `anio_escolar` varchar(20) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `aulas`
--

INSERT INTO `aulas` (`id_aula`, `nombre`, `capacidad`, `id_grado`, `anio_escolar`, `estado`) VALUES
(38, 'AULA 12', 29, 1, '2025-2026', 2),
(39, 'Aula 15', 16, 2, '2025-2026', 2),
(40, 'AULA 11', 16, 2, '2025-2026', 2),
(41, 'Aula 18', 16, 2, '2025-2026', 2),
(42, 'Aula 189', 20, 7, '2025-2026', 2),
(43, 'Aula 29', 16, 3, '2025-2026', 2),
(44, 'Aula 32', 20, 4, '2025-2026', 2),
(45, 'Aula 08', 25, 5, '2025-2026', 2),
(46, 'Aula 09', 29, 6, '2025-2026', 2),
(47, 'Aula 06', 29, 8, '2025-2026', 2),
(48, 'Aula 07', 29, 9, '2025-2026', 2),
(49, 'Aula 04', 16, 10, '2025-2026', 2),
(50, 'Aula 03', 29, 11, '2025-2026', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `id` int(12) NOT NULL,
  `anio_escolar` varchar(20) NOT NULL,
  `id_grado` int(5) NOT NULL,
  `lapso_academico` varchar(20) NOT NULL,
  `id_profesor` int(5) NOT NULL,
  `id_materia` int(5) NOT NULL,
  `id_estudiante` int(5) NOT NULL,
  `calificacion` varchar(10) NOT NULL,
  `actividad` int(11) DEFAULT NULL,
  `tipo_actividad` varchar(55) DEFAULT NULL,
  `promedio` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`id`, `anio_escolar`, `id_grado`, `lapso_academico`, `id_profesor`, `id_materia`, `id_estudiante`, `calificacion`, `actividad`, `tipo_actividad`, `promedio`) VALUES
(596, '2025-2026', 1, 'Lapso Único', 47, 111, 3, 'EX', 30, 'Contenidos', NULL),
(597, '2025-2026', 1, 'Lapso Único', 47, 111, 4, 'MB', 30, 'Contenidos', NULL),
(598, '2025-2026', 1, 'Lapso Único', 47, 111, 8, 'MB', 30, 'Contenidos', NULL),
(601, '2025-2026', 1, 'Lapso Único', 47, 111, 3, 'EX', 32, 'Contenidos', NULL),
(602, '2025-2026', 1, 'Lapso Único', 47, 111, 4, 'MB', 32, 'Contenidos', NULL),
(603, '2025-2026', 1, 'Lapso Único', 47, 111, 8, 'MB', 32, 'Contenidos', NULL),
(606, '2025-2026', 1, 'Lapso Único', 47, 111, 4, 'EX', 35, 'Caligrafía', NULL),
(607, '2025-2026', 1, 'Lapso Único', 47, 111, 3, 'EX', 35, 'Caligrafía', NULL),
(608, '2025-2026', 1, 'Lapso Único', 47, 111, 8, 'EX', 35, 'Caligrafía', NULL),
(611, '2025-2026', 1, 'Lapso Único', 47, 111, 3, 'EX', 36, 'Caligrafía', NULL),
(612, '2025-2026', 1, 'Lapso Único', 47, 111, 4, 'EX', 36, 'Caligrafía', NULL),
(613, '2025-2026', 1, 'Lapso Único', 47, 111, 8, 'EX', 36, 'Caligrafía', NULL),
(616, '2025-2026', 1, 'Lapso Único', 47, 111, 3, 'EX', 37, 'Escritura', NULL),
(617, '2025-2026', 1, 'Lapso Único', 47, 111, 4, 'EX', 37, 'Escritura', NULL),
(618, '2025-2026', 1, 'Lapso Único', 47, 111, 8, 'EX', 37, 'Escritura', NULL),
(619, '2025-2026', 1, 'Lapso Único', 47, 111, 8, 'EX', 38, 'Escritura', NULL),
(620, '2025-2026', 1, 'Lapso Único', 47, 111, 4, 'EX', 38, 'Escritura', NULL),
(621, '2025-2026', 1, 'Lapso Único', 47, 111, 3, 'EX', 38, 'Escritura', NULL),
(626, '2025-2026', 1, 'Lapso Único', 47, 111, 3, 'EX', 39, 'Escritura', NULL),
(627, '2025-2026', 1, 'Lapso Único', 47, 111, 4, 'EX', 39, 'Escritura', NULL),
(628, '2025-2026', 1, 'Lapso Único', 47, 111, 8, 'EX', 39, 'Escritura', NULL),
(631, '2025-2026', 1, 'Lapso Único', 47, 111, 3, 'EX', 40, 'Escritura', NULL),
(632, '2025-2026', 1, 'Lapso Único', 47, 111, 4, 'EX', 40, 'Escritura', NULL),
(633, '2025-2026', 1, 'Lapso Único', 47, 111, 8, 'EX', 40, 'Escritura', NULL),
(636, '2025-2026', 1, 'Lapso Único', 47, 112, 3, 'EX', 41, 'Contenidos', NULL),
(637, '2025-2026', 1, 'Lapso Único', 47, 112, 4, 'EX', 41, 'Contenidos', NULL),
(638, '2025-2026', 1, 'Lapso Único', 47, 112, 8, 'EX', 41, 'Contenidos', NULL),
(641, '2025-2026', 1, 'Lapso Único', 47, 112, 3, 'MB', 42, 'Contenidos', NULL),
(642, '2025-2026', 1, 'Lapso Único', 47, 112, 4, 'MB', 42, 'Contenidos', NULL),
(643, '2025-2026', 1, 'Lapso Único', 47, 112, 8, 'MB', 42, 'Contenidos', NULL),
(644, '2025-2026', 1, 'Lapso Único', 47, 112, 8, 'B', 43, 'Contenidos', NULL),
(645, '2025-2026', 1, 'Lapso Único', 47, 112, 4, 'B', 43, 'Contenidos', NULL),
(646, '2025-2026', 1, 'Lapso Único', 47, 112, 3, 'EX', 43, 'Contenidos', NULL),
(649, '2025-2026', 1, 'Lapso Único', 47, 112, 8, 'MB', 44, 'Contenidos', NULL),
(650, '2025-2026', 1, 'Lapso Único', 47, 112, 4, 'MB', 44, 'Contenidos', NULL),
(651, '2025-2026', 1, 'Lapso Único', 47, 112, 3, 'MB', 44, 'Contenidos', NULL),
(656, '2025-2026', 1, 'Lapso Único', 47, 113, 3, 'MB', 49, 'Contenidos', NULL),
(657, '2025-2026', 1, 'Lapso Único', 47, 113, 4, 'MB', 49, 'Contenidos', NULL),
(658, '2025-2026', 1, 'Lapso Único', 47, 113, 8, 'MB', 49, 'Contenidos', NULL),
(659, '2025-2026', 1, 'Lapso Único', 47, 113, 8, 'B', 50, 'Contenidos', NULL),
(660, '2025-2026', 1, 'Lapso Único', 47, 113, 4, 'B', 50, 'Contenidos', NULL),
(661, '2025-2026', 1, 'Lapso Único', 47, 113, 3, 'B', 50, 'Contenidos', NULL),
(664, '2025-2026', 1, 'Lapso Único', 47, 114, 8, 'EX', 45, 'Contenidos', NULL),
(665, '2025-2026', 1, 'Lapso Único', 47, 114, 4, 'EX', 45, 'Contenidos', NULL),
(666, '2025-2026', 1, 'Lapso Único', 47, 114, 3, 'EX', 45, 'Contenidos', NULL),
(669, '2025-2026', 1, 'Lapso Único', 47, 114, 8, 'MB', 46, 'Contenidos', NULL),
(670, '2025-2026', 1, 'Lapso Único', 47, 114, 4, 'MB', 46, 'Contenidos', NULL),
(671, '2025-2026', 1, 'Lapso Único', 47, 114, 3, 'MB', 46, 'Contenidos', NULL),
(674, '2025-2026', 1, 'Lapso Único', 47, 114, 8, 'MB', 47, 'Contenidos', NULL),
(675, '2025-2026', 1, 'Lapso Único', 47, 114, 4, 'MB', 47, 'Contenidos', NULL),
(676, '2025-2026', 1, 'Lapso Único', 47, 114, 3, 'MB', 47, 'Contenidos', NULL),
(681, '2025-2026', 1, 'Lapso Único', 47, 114, 3, 'MB', 48, 'Contenidos', NULL),
(682, '2025-2026', 1, 'Lapso Único', 47, 114, 4, 'MB', 48, 'Contenidos', NULL),
(683, '2025-2026', 1, 'Lapso Único', 47, 114, 8, 'MB', 48, 'Contenidos', NULL),
(686, '2025-2026', 1, 'Lapso Único', 47, 115, 3, 'EX', 51, 'Contenidos', NULL),
(687, '2025-2026', 1, 'Lapso Único', 47, 115, 4, 'EX', 51, 'Contenidos', NULL),
(688, '2025-2026', 1, 'Lapso Único', 47, 115, 8, 'EX', 51, 'Contenidos', NULL),
(689, '2025-2026', 1, 'Lapso Único', 47, 115, 8, 'MB', 55, 'Contenidos', NULL),
(690, '2025-2026', 1, 'Lapso Único', 47, 115, 4, 'MB', 55, 'Contenidos', NULL),
(691, '2025-2026', 1, 'Lapso Único', 47, 115, 3, 'MB', 55, 'Contenidos', NULL),
(696, '2025-2026', 1, 'Lapso Único', 47, 115, 3, 'EX', 56, 'Contenidos', NULL),
(697, '2025-2026', 1, 'Lapso Único', 47, 115, 4, 'MB', 56, 'Contenidos', NULL),
(698, '2025-2026', 1, 'Lapso Único', 47, 115, 8, 'MB', 56, 'Contenidos', NULL),
(699, '2025-2026', 1, 'Lapso Único', 47, 115, 8, 'MB', 57, 'Contenidos', NULL),
(700, '2025-2026', 1, 'Lapso Único', 47, 115, 4, 'MB', 57, 'Contenidos', NULL),
(701, '2025-2026', 1, 'Lapso Único', 47, 115, 3, 'MB', 57, 'Contenidos', NULL),
(704, '2025-2026', 1, 'Lapso Único', 47, 115, 8, 'B', 58, 'Contenidos', NULL),
(705, '2025-2026', 1, 'Lapso Único', 47, 115, 4, 'MB', 58, 'Contenidos', NULL),
(706, '2025-2026', 1, 'Lapso Único', 47, 115, 3, 'MB', 58, 'Contenidos', NULL),
(709, '2025-2026', 1, 'Lapso Único', 47, 116, 8, 'MB', 52, 'Contenidos', NULL),
(710, '2025-2026', 1, 'Lapso Único', 47, 116, 4, 'MB', 52, 'Contenidos', NULL),
(711, '2025-2026', 1, 'Lapso Único', 47, 116, 3, 'MB', 52, 'Contenidos', NULL),
(716, '2025-2026', 1, 'Lapso Único', 47, 116, 3, 'MB', 53, 'Contenidos', NULL),
(717, '2025-2026', 1, 'Lapso Único', 47, 116, 4, 'MB', 53, 'Contenidos', NULL),
(718, '2025-2026', 1, 'Lapso Único', 47, 116, 8, 'MB', 53, 'Contenidos', NULL),
(719, '2025-2026', 1, 'Lapso Único', 47, 116, 8, 'EX', 54, 'Contenidos', NULL),
(720, '2025-2026', 1, 'Lapso Único', 47, 116, 4, 'MB', 54, 'Contenidos', NULL),
(721, '2025-2026', 1, 'Lapso Único', 47, 116, 3, 'MB', 54, 'Contenidos', NULL),
(724, '2025-2026', 1, 'Lapso Único', 47, 111, 18, 'EX', 30, 'Contenidos', NULL),
(725, '2025-2026', 1, 'Lapso Único', 47, 111, 18, 'EX', 32, 'Contenidos', NULL),
(726, '2025-2026', 1, 'Lapso Único', 47, 111, 18, 'EX', 35, 'Caligrafía', NULL),
(727, '2025-2026', 1, 'Lapso Único', 47, 111, 18, 'EX', 36, 'Caligrafía', NULL),
(728, '2025-2026', 1, 'Lapso Único', 47, 112, 18, 'EX', 41, 'Contenidos', NULL),
(729, '2025-2026', 1, 'Lapso Único', 47, 112, 18, 'MB', 42, 'Contenidos', NULL),
(730, '2025-2026', 1, 'Lapso Único', 47, 113, 18, 'EX', 49, 'Contenidos', NULL),
(827, '2025-2026', 7, '1er lapso', 43, 99, 7, '17', NULL, NULL, 17.33),
(828, '2025-2026', 7, '1er lapso', 43, 99, 7, '17', NULL, NULL, 17.33),
(829, '2025-2026', 7, '1er lapso', 43, 99, 7, '17', NULL, NULL, 17.33),
(863, '2025-2026', 7, '1er lapso', 41, 106, 7, '16', NULL, NULL, 16.33),
(864, '2025-2026', 7, '1er lapso', 41, 106, 7, '17', NULL, NULL, 16.33),
(865, '2025-2026', 7, '1er lapso', 41, 106, 7, '16', NULL, NULL, 16.33),
(866, '2025-2026', 7, '1er lapso', 39, 104, 7, '15', NULL, NULL, 15.33),
(867, '2025-2026', 7, '1er lapso', 39, 104, 7, '16', NULL, NULL, 15.33),
(868, '2025-2026', 7, '1er lapso', 39, 104, 7, '15', NULL, NULL, 15.33),
(869, '2025-2026', 7, '1er lapso', 36, 107, 7, '19', NULL, NULL, 18.67),
(870, '2025-2026', 7, '1er lapso', 36, 107, 7, '18', NULL, NULL, 18.67),
(871, '2025-2026', 7, '1er lapso', 36, 107, 7, '19', NULL, NULL, 18.67),
(872, '2025-2026', 7, '1er lapso', 38, 108, 7, '17', NULL, NULL, 17.00),
(873, '2025-2026', 7, '1er lapso', 38, 108, 7, '17', NULL, NULL, 17.00),
(874, '2025-2026', 7, '1er lapso', 38, 108, 7, '17', NULL, NULL, 17.00),
(875, '2025-2026', 7, '1er lapso', 40, 102, 7, '18', NULL, NULL, 18.33),
(876, '2025-2026', 7, '1er lapso', 40, 102, 7, '19', NULL, NULL, 18.33),
(877, '2025-2026', 7, '1er lapso', 40, 102, 7, '18', NULL, NULL, 18.33),
(878, '2025-2026', 7, '1er lapso', 37, 105, 7, '16', NULL, NULL, 16.33),
(879, '2025-2026', 7, '1er lapso', 37, 105, 7, '17', NULL, NULL, 16.33),
(880, '2025-2026', 7, '1er lapso', 37, 105, 7, '16', NULL, NULL, 16.33),
(881, '2025-2026', 7, '1er lapso', 42, 103, 7, '19', NULL, NULL, 18.33),
(884, '2025-2026', 7, '1er lapso', 42, 100, 7, '14', NULL, NULL, 14.67),
(885, '2025-2026', 7, '1er lapso', 42, 100, 7, '15', NULL, NULL, 14.67),
(886, '2025-2026', 7, '1er lapso', 42, 100, 7, '15', NULL, NULL, 14.67),
(887, '2025-2026', 7, '1er lapso', 42, 101, 7, '17', NULL, NULL, 17.33),
(888, '2025-2026', 7, '1er lapso', 42, 101, 7, '17', NULL, NULL, 17.33),
(889, '2025-2026', 7, '1er lapso', 42, 101, 7, '18', NULL, NULL, 17.33),
(890, '2025-2026', 7, '1er lapso', 43, 99, 5, '16', NULL, NULL, 15.00),
(891, '2025-2026', 7, '1er lapso', 43, 99, 5, '17', NULL, NULL, 15.00),
(892, '2025-2026', 7, '1er lapso', 43, 99, 5, '12', NULL, NULL, 15.00),
(893, '2025-2026', 7, '1er lapso', 41, 106, 5, '18', NULL, NULL, 18.33),
(894, '2025-2026', 7, '1er lapso', 41, 106, 5, '19', NULL, NULL, 18.33),
(895, '2025-2026', 7, '1er lapso', 41, 106, 5, '18', NULL, NULL, 18.33),
(896, '2025-2026', 7, '1er lapso', 39, 104, 5, '15', NULL, NULL, 14.67),
(897, '2025-2026', 7, '1er lapso', 39, 104, 5, '14', NULL, NULL, 14.67),
(898, '2025-2026', 7, '1er lapso', 39, 104, 5, '15', NULL, NULL, 14.67),
(899, '2025-2026', 7, '1er lapso', 36, 107, 5, '20', NULL, NULL, 19.33),
(900, '2025-2026', 7, '1er lapso', 36, 107, 5, '19', NULL, NULL, 19.33),
(901, '2025-2026', 7, '1er lapso', 36, 107, 5, '19', NULL, NULL, 19.33),
(902, '2025-2026', 7, '1er lapso', 38, 108, 5, '13', NULL, NULL, 13.67),
(903, '2025-2026', 7, '1er lapso', 38, 108, 5, '14', NULL, NULL, 13.67),
(904, '2025-2026', 7, '1er lapso', 38, 108, 5, '14', NULL, NULL, 13.67),
(905, '2025-2026', 7, '1er lapso', 40, 102, 5, '17', NULL, NULL, 17.00),
(906, '2025-2026', 7, '1er lapso', 40, 102, 5, '17', NULL, NULL, 17.00),
(907, '2025-2026', 7, '1er lapso', 40, 102, 5, '17', NULL, NULL, 17.00),
(908, '2025-2026', 7, '1er lapso', 37, 105, 5, '16', NULL, NULL, 16.00),
(909, '2025-2026', 7, '1er lapso', 37, 105, 5, '16', NULL, NULL, 16.00),
(910, '2025-2026', 7, '1er lapso', 37, 105, 5, '16', NULL, NULL, 16.00),
(911, '2025-2026', 7, '1er lapso', 42, 103, 5, '18', NULL, NULL, 17.33),
(912, '2025-2026', 7, '1er lapso', 42, 103, 5, '17', NULL, NULL, 17.33),
(913, '2025-2026', 7, '1er lapso', 42, 103, 5, '17', NULL, NULL, 17.33),
(914, '2025-2026', 7, '1er lapso', 42, 100, 5, '15', NULL, NULL, 15.67),
(915, '2025-2026', 7, '1er lapso', 42, 100, 5, '16', NULL, NULL, 15.67),
(916, '2025-2026', 7, '1er lapso', 42, 100, 5, '16', NULL, NULL, 15.67),
(917, '2025-2026', 7, '1er lapso', 42, 101, 5, '17', NULL, NULL, 17.67),
(918, '2025-2026', 7, '1er lapso', 42, 101, 5, '18', NULL, NULL, 17.67),
(919, '2025-2026', 7, '1er lapso', 42, 101, 5, '18', NULL, NULL, 17.67),
(920, '2025-2026', 7, '2do lapso', 43, 99, 5, '16', NULL, NULL, 16.33),
(921, '2025-2026', 7, '2do lapso', 43, 99, 5, '17', NULL, NULL, 16.33),
(922, '2025-2026', 7, '2do lapso', 43, 99, 5, '16', NULL, NULL, 16.33),
(923, '2025-2026', 7, '2do lapso', 41, 106, 5, '18', NULL, NULL, 18.33),
(924, '2025-2026', 7, '2do lapso', 41, 106, 5, '19', NULL, NULL, 18.33),
(925, '2025-2026', 7, '2do lapso', 41, 106, 5, '18', NULL, NULL, 18.33),
(926, '2025-2026', 7, '2do lapso', 39, 104, 5, '15', NULL, NULL, 14.67),
(927, '2025-2026', 7, '2do lapso', 39, 104, 5, '14', NULL, NULL, 14.67),
(928, '2025-2026', 7, '2do lapso', 39, 104, 5, '15', NULL, NULL, 14.67),
(929, '2025-2026', 7, '2do lapso', 36, 107, 5, '20', NULL, NULL, 19.33),
(930, '2025-2026', 7, '2do lapso', 36, 107, 5, '19', NULL, NULL, 19.33),
(931, '2025-2026', 7, '2do lapso', 36, 107, 5, '19', NULL, NULL, 19.33),
(932, '2025-2026', 7, '1er lapso', 38, 108, 5, '13', NULL, NULL, 13.67),
(933, '2025-2026', 7, '1er lapso', 38, 108, 5, '14', NULL, NULL, 13.67),
(934, '2025-2026', 7, '1er lapso', 38, 108, 5, '14', NULL, NULL, 13.67),
(935, '2025-2026', 7, '2do lapso', 40, 102, 5, '17', NULL, NULL, 17.00),
(936, '2025-2026', 7, '2do lapso', 40, 102, 5, '17', NULL, NULL, 17.00),
(937, '2025-2026', 7, '2do lapso', 40, 102, 5, '17', NULL, NULL, 17.00),
(938, '2025-2026', 7, '2do lapso', 37, 105, 5, '16', NULL, NULL, 16.00),
(939, '2025-2026', 7, '2do lapso', 37, 105, 5, '16', NULL, NULL, 16.00),
(940, '2025-2026', 7, '2do lapso', 37, 105, 5, '16', NULL, NULL, 16.00),
(941, '2025-2026', 7, '2do lapso', 42, 103, 5, '18', NULL, NULL, 17.33),
(942, '2025-2026', 7, '2do lapso', 42, 103, 5, '17', NULL, NULL, 17.33),
(943, '2025-2026', 7, '2do lapso', 42, 103, 5, '17', NULL, NULL, 17.33),
(944, '2025-2026', 7, '2do lapso', 42, 100, 5, '15', NULL, NULL, 15.67),
(945, '2025-2026', 7, '2do lapso', 42, 100, 5, '16', NULL, NULL, 15.67),
(946, '2025-2026', 7, '2do lapso', 42, 100, 5, '16', NULL, NULL, 15.67),
(947, '2025-2026', 7, '2do lapso', 42, 101, 5, '17', NULL, NULL, 17.67),
(948, '2025-2026', 7, '2do lapso', 42, 101, 5, '18', NULL, NULL, 17.67),
(949, '2025-2026', 7, '2do lapso', 42, 101, 5, '18', NULL, NULL, 17.67),
(950, '2025-2026', 7, '3er lapso', 43, 99, 5, '16', NULL, NULL, 16.33),
(951, '2025-2026', 7, '3er lapso', 43, 99, 5, '17', NULL, NULL, 16.33),
(952, '2025-2026', 7, '3er lapso', 43, 99, 5, '16', NULL, NULL, 16.33),
(953, '2025-2026', 7, '3er lapso', 41, 106, 5, '18', NULL, NULL, 18.33),
(954, '2025-2026', 7, '3er lapso', 41, 106, 5, '19', NULL, NULL, 18.33),
(955, '2025-2026', 7, '3er lapso', 41, 106, 5, '18', NULL, NULL, 18.33),
(956, '2025-2026', 7, '3er lapso', 39, 104, 5, '15', NULL, NULL, 14.67),
(957, '2025-2026', 7, '3er lapso', 39, 104, 5, '14', NULL, NULL, 14.67),
(958, '2025-2026', 7, '3er lapso', 39, 104, 5, '15', NULL, NULL, 14.67),
(959, '2025-2026', 7, '3er lapso', 36, 107, 5, '20', NULL, NULL, 19.33),
(960, '2025-2026', 7, '3er lapso', 36, 107, 5, '19', NULL, NULL, 19.33),
(961, '2025-2026', 7, '3er lapso', 36, 107, 5, '19', NULL, NULL, 19.33),
(962, '2025-2026', 7, '3er lapso', 38, 108, 5, '13', NULL, NULL, 13.67),
(963, '2025-2026', 7, '3er lapso', 38, 108, 5, '14', NULL, NULL, 13.67),
(964, '2025-2026', 7, '3er lapso', 38, 108, 5, '14', NULL, NULL, 13.67),
(965, '2025-2026', 7, '3er lapso', 40, 102, 5, '17', NULL, NULL, 17.00),
(966, '2025-2026', 7, '3er lapso', 40, 102, 5, '17', NULL, NULL, 17.00),
(967, '2025-2026', 7, '3er lapso', 40, 102, 5, '17', NULL, NULL, 17.00),
(968, '2025-2026', 7, '3er lapso', 37, 105, 5, '16', NULL, NULL, 16.00),
(969, '2025-2026', 7, '3er lapso', 37, 105, 5, '16', NULL, NULL, 16.00),
(970, '2025-2026', 7, '3er lapso', 37, 105, 5, '16', NULL, NULL, 16.00),
(971, '2025-2026', 7, '3er lapso', 42, 103, 5, '18', NULL, NULL, 17.33),
(972, '2025-2026', 7, '3er lapso', 42, 103, 5, '17', NULL, NULL, 17.33),
(973, '2025-2026', 7, '3er lapso', 42, 103, 5, '17', NULL, NULL, 17.33),
(974, '2025-2026', 7, '3er lapso', 42, 100, 5, '15', NULL, NULL, 15.67),
(975, '2025-2026', 7, '3er lapso', 42, 100, 5, '16', NULL, NULL, 15.67),
(976, '2025-2026', 7, '3er lapso', 42, 100, 5, '16', NULL, NULL, 15.67),
(977, '2025-2026', 7, '3er lapso', 42, 101, 5, '17', NULL, NULL, 17.67),
(978, '2025-2026', 7, '3er lapso', 42, 101, 5, '18', NULL, NULL, 17.67),
(979, '2025-2026', 7, '3er lapso', 42, 101, 5, '18', NULL, NULL, 17.67),
(980, '2025-2026', 7, '1er lapso', 43, 99, 10, '16', NULL, NULL, 16.33),
(981, '2025-2026', 7, '1er lapso', 43, 99, 10, '17', NULL, NULL, 16.33),
(982, '2025-2026', 7, '1er lapso', 43, 99, 10, '16', NULL, NULL, 16.33),
(983, '2025-2026', 7, '1er lapso', 41, 106, 10, '18', NULL, NULL, 18.33),
(984, '2025-2026', 7, '1er lapso', 41, 106, 10, '19', NULL, NULL, 18.33),
(985, '2025-2026', 7, '1er lapso', 41, 106, 10, '18', NULL, NULL, 18.33),
(986, '2025-2026', 7, '1er lapso', 39, 104, 10, '15', NULL, NULL, 14.67),
(987, '2025-2026', 7, '1er lapso', 39, 104, 10, '14', NULL, NULL, 14.67),
(988, '2025-2026', 7, '1er lapso', 39, 104, 10, '15', NULL, NULL, 14.67),
(989, '2025-2026', 7, '1er lapso', 36, 107, 10, '20', NULL, NULL, 19.33),
(990, '2025-2026', 7, '1er lapso', 36, 107, 10, '19', NULL, NULL, 19.33),
(991, '2025-2026', 7, '1er lapso', 36, 107, 10, '19', NULL, NULL, 19.33),
(992, '2025-2026', 7, '1er lapso', 38, 108, 10, '13', NULL, NULL, 13.67),
(993, '2025-2026', 7, '1er lapso', 38, 108, 10, '14', NULL, NULL, 13.67),
(994, '2025-2026', 7, '1er lapso', 38, 108, 10, '14', NULL, NULL, 13.67),
(995, '2025-2026', 7, '1er lapso', 40, 102, 10, '17', NULL, NULL, 17.00),
(996, '2025-2026', 7, '1er lapso', 40, 102, 10, '17', NULL, NULL, 17.00),
(997, '2025-2026', 7, '1er lapso', 40, 102, 10, '17', NULL, NULL, 17.00),
(998, '2025-2026', 7, '1er lapso', 37, 105, 10, '16', NULL, NULL, 16.00),
(999, '2025-2026', 7, '1er lapso', 37, 105, 10, '16', NULL, NULL, 16.00),
(1000, '2025-2026', 7, '1er lapso', 37, 105, 10, '16', NULL, NULL, 16.00),
(1001, '2025-2026', 7, '1er lapso', 42, 103, 10, '18', NULL, NULL, 17.33),
(1002, '2025-2026', 7, '1er lapso', 42, 103, 10, '17', NULL, NULL, 17.33),
(1003, '2025-2026', 7, '1er lapso', 42, 103, 10, '17', NULL, NULL, 17.33),
(1004, '2025-2026', 7, '1er lapso', 42, 100, 10, '15', NULL, NULL, 15.67),
(1005, '2025-2026', 7, '1er lapso', 42, 100, 10, '16', NULL, NULL, 15.67),
(1006, '2025-2026', 7, '1er lapso', 42, 100, 10, '16', NULL, NULL, 15.67),
(1007, '2025-2026', 7, '1er lapso', 42, 101, 10, '17', NULL, NULL, 17.67),
(1008, '2025-2026', 7, '1er lapso', 42, 101, 10, '18', NULL, NULL, 17.67),
(1009, '2025-2026', 7, '1er lapso', 42, 101, 10, '18', NULL, NULL, 17.67),
(1010, '2025-2026', 7, '2do lapso', 43, 99, 10, '16', NULL, NULL, 16.33),
(1011, '2025-2026', 7, '2do lapso', 43, 99, 10, '17', NULL, NULL, 16.33),
(1012, '2025-2026', 7, '2do lapso', 43, 99, 10, '16', NULL, NULL, 16.33),
(1013, '2025-2026', 7, '2do lapso', 41, 106, 10, '18', NULL, NULL, 18.33),
(1014, '2025-2026', 7, '2do lapso', 41, 106, 10, '19', NULL, NULL, 18.33),
(1015, '2025-2026', 7, '2do lapso', 41, 106, 10, '18', NULL, NULL, 18.33),
(1016, '2025-2026', 7, '2do lapso', 39, 104, 10, '15', NULL, NULL, 14.67),
(1017, '2025-2026', 7, '2do lapso', 39, 104, 10, '14', NULL, NULL, 14.67),
(1018, '2025-2026', 7, '2do lapso', 39, 104, 10, '15', NULL, NULL, 14.67),
(1019, '2025-2026', 7, '2do lapso', 36, 107, 10, '20', NULL, NULL, 19.33),
(1020, '2025-2026', 7, '2do lapso', 36, 107, 10, '19', NULL, NULL, 19.33),
(1021, '2025-2026', 7, '2do lapso', 36, 107, 10, '19', NULL, NULL, 19.33),
(1022, '2025-2026', 7, '2do lapso', 38, 108, 10, '13', NULL, NULL, 13.67),
(1023, '2025-2026', 7, '2do lapso', 38, 108, 10, '14', NULL, NULL, 13.67),
(1024, '2025-2026', 7, '2do lapso', 38, 108, 10, '14', NULL, NULL, 13.67),
(1025, '2025-2026', 7, '2do lapso', 40, 102, 10, '17', NULL, NULL, 17.00),
(1026, '2025-2026', 7, '2do lapso', 40, 102, 10, '17', NULL, NULL, 17.00),
(1027, '2025-2026', 7, '2do lapso', 40, 102, 10, '17', NULL, NULL, 17.00),
(1028, '2025-2026', 7, '2do lapso', 37, 105, 10, '16', NULL, NULL, 16.00),
(1029, '2025-2026', 7, '2do lapso', 37, 105, 10, '16', NULL, NULL, 16.00),
(1030, '2025-2026', 7, '2do lapso', 37, 105, 10, '16', NULL, NULL, 16.00),
(1031, '2025-2026', 7, '2do lapso', 42, 103, 10, '18', NULL, NULL, 17.33),
(1032, '2025-2026', 7, '2do lapso', 42, 103, 10, '17', NULL, NULL, 17.33),
(1033, '2025-2026', 7, '2do lapso', 42, 103, 10, '17', NULL, NULL, 17.33),
(1034, '2025-2026', 7, '2do lapso', 42, 100, 10, '15', NULL, NULL, 15.67),
(1035, '2025-2026', 7, '2do lapso', 42, 100, 10, '16', NULL, NULL, 15.67),
(1036, '2025-2026', 7, '2do lapso', 42, 100, 10, '16', NULL, NULL, 15.67),
(1037, '2025-2026', 7, '2do lapso', 42, 101, 10, '17', NULL, NULL, 17.67),
(1038, '2025-2026', 7, '2do lapso', 42, 101, 10, '18', NULL, NULL, 17.67),
(1039, '2025-2026', 7, '2do lapso', 42, 101, 10, '18', NULL, NULL, 17.67),
(1040, '2025-2026', 7, '3er lapso', 43, 99, 10, '16', NULL, NULL, 16.33),
(1041, '2025-2026', 7, '3er lapso', 43, 99, 10, '17', NULL, NULL, 16.33),
(1042, '2025-2026', 7, '3er lapso', 43, 99, 10, '16', NULL, NULL, 16.33),
(1043, '2025-2026', 7, '3er lapso', 41, 106, 10, '18', NULL, NULL, 18.33),
(1044, '2025-2026', 7, '3er lapso', 41, 106, 10, '19', NULL, NULL, 18.33),
(1045, '2025-2026', 7, '3er lapso', 41, 106, 10, '18', NULL, NULL, 18.33),
(1046, '2025-2026', 7, '3er lapso', 39, 104, 10, '15', NULL, NULL, 14.67),
(1047, '2025-2026', 7, '3er lapso', 39, 104, 10, '14', NULL, NULL, 14.67),
(1048, '2025-2026', 7, '3er lapso', 39, 104, 10, '15', NULL, NULL, 14.67),
(1049, '2025-2026', 7, '3er lapso', 36, 107, 10, '20', NULL, NULL, 19.33),
(1050, '2025-2026', 7, '3er lapso', 36, 107, 10, '19', NULL, NULL, 19.33),
(1051, '2025-2026', 7, '3er lapso', 36, 107, 10, '19', NULL, NULL, 19.33),
(1052, '2025-2026', 7, '3er lapso', 38, 108, 10, '13', NULL, NULL, 13.67),
(1053, '2025-2026', 7, '3er lapso', 38, 108, 10, '14', NULL, NULL, 13.67),
(1054, '2025-2026', 7, '3er lapso', 38, 108, 10, '14', NULL, NULL, 13.67),
(1055, '2025-2026', 7, '3er lapso', 40, 102, 10, '17', NULL, NULL, 17.00),
(1056, '2025-2026', 7, '3er lapso', 40, 102, 10, '17', NULL, NULL, 17.00),
(1057, '2025-2026', 7, '3er lapso', 40, 102, 10, '17', NULL, NULL, 17.00),
(1058, '2025-2026', 7, '3er lapso', 37, 105, 10, '16', NULL, NULL, 16.00),
(1059, '2025-2026', 7, '3er lapso', 37, 105, 10, '16', NULL, NULL, 16.00),
(1060, '2025-2026', 7, '3er lapso', 37, 105, 10, '16', NULL, NULL, 16.00),
(1061, '2025-2026', 7, '3er lapso', 42, 103, 10, '18', NULL, NULL, 17.33),
(1062, '2025-2026', 7, '3er lapso', 42, 103, 10, '17', NULL, NULL, 17.33),
(1063, '2025-2026', 7, '3er lapso', 42, 103, 10, '17', NULL, NULL, 17.33),
(1064, '2025-2026', 7, '3er lapso', 42, 100, 10, '15', NULL, NULL, 15.67),
(1065, '2025-2026', 7, '3er lapso', 42, 100, 10, '16', NULL, NULL, 15.67),
(1066, '2025-2026', 7, '3er lapso', 42, 100, 10, '16', NULL, NULL, 15.67),
(1070, '2025-2026', 8, '1er lapso', 43, 99, 10, '16', NULL, NULL, 16.33),
(1071, '2025-2026', 8, '1er lapso', 43, 99, 10, '17', NULL, NULL, 16.33),
(1072, '2025-2026', 8, '1er lapso', 43, 99, 10, '16', NULL, NULL, 16.33),
(1073, '2025-2026', 8, '1er lapso', 41, 106, 10, '18', NULL, NULL, 18.33),
(1074, '2025-2026', 8, '1er lapso', 41, 106, 10, '19', NULL, NULL, 18.33),
(1075, '2025-2026', 8, '1er lapso', 41, 106, 10, '18', NULL, NULL, 18.33),
(1076, '2025-2026', 8, '1er lapso', 39, 104, 10, '15', NULL, NULL, 14.67),
(1077, '2025-2026', 8, '1er lapso', 39, 104, 10, '14', NULL, NULL, 14.67),
(1078, '2025-2026', 8, '1er lapso', 39, 104, 10, '15', NULL, NULL, 14.67),
(1079, '2025-2026', 8, '1er lapso', 36, 107, 10, '20', NULL, NULL, 19.33),
(1080, '2025-2026', 8, '1er lapso', 36, 107, 10, '19', NULL, NULL, 19.33),
(1081, '2025-2026', 8, '1er lapso', 36, 107, 10, '19', NULL, NULL, 19.33),
(1082, '2025-2026', 8, '1er lapso', 38, 108, 10, '13', NULL, NULL, 13.67),
(1083, '2025-2026', 8, '1er lapso', 38, 108, 10, '14', NULL, NULL, 13.67),
(1084, '2025-2026', 8, '1er lapso', 38, 108, 10, '14', NULL, NULL, 13.67),
(1085, '2025-2026', 8, '1er lapso', 40, 102, 10, '17', NULL, NULL, 17.00),
(1086, '2025-2026', 8, '1er lapso', 40, 102, 10, '17', NULL, NULL, 17.00),
(1087, '2025-2026', 8, '1er lapso', 40, 102, 10, '17', NULL, NULL, 17.00),
(1088, '2025-2026', 8, '1er lapso', 37, 105, 10, '16', NULL, NULL, 16.00),
(1089, '2025-2026', 8, '1er lapso', 37, 105, 10, '16', NULL, NULL, 16.00),
(1090, '2025-2026', 8, '1er lapso', 37, 105, 10, '16', NULL, NULL, 16.00),
(1091, '2025-2026', 8, '1er lapso', 42, 103, 10, '18', NULL, NULL, 17.33),
(1092, '2025-2026', 8, '1er lapso', 42, 103, 10, '17', NULL, NULL, 17.33),
(1093, '2025-2026', 8, '1er lapso', 42, 103, 10, '17', NULL, NULL, 17.33),
(1094, '2025-2026', 8, '1er lapso', 42, 100, 10, '15', NULL, NULL, 15.67),
(1095, '2025-2026', 8, '1er lapso', 42, 100, 10, '16', NULL, NULL, 15.67),
(1096, '2025-2026', 8, '1er lapso', 42, 100, 10, '16', NULL, NULL, 15.67),
(1097, '2025-2026', 8, '1er lapso', 42, 101, 10, '17', NULL, NULL, 17.67),
(1098, '2025-2026', 8, '1er lapso', 42, 101, 10, '18', NULL, NULL, 17.67),
(1099, '2025-2026', 8, '1er lapso', 42, 101, 10, '18', NULL, NULL, 17.67),
(1100, '2025-2026', 8, '2do lapso', 43, 99, 10, '16', NULL, NULL, 16.33),
(1101, '2025-2026', 8, '2do lapso', 43, 99, 10, '17', NULL, NULL, 16.33),
(1102, '2025-2026', 8, '2do lapso', 43, 99, 10, '16', NULL, NULL, 16.33),
(1103, '2025-2026', 8, '2do lapso', 41, 106, 10, '18', NULL, NULL, 18.33),
(1104, '2025-2026', 8, '2do lapso', 41, 106, 10, '19', NULL, NULL, 18.33),
(1105, '2025-2026', 8, '2do lapso', 41, 106, 10, '18', NULL, NULL, 18.33),
(1106, '2025-2026', 8, '2do lapso', 39, 104, 10, '15', NULL, NULL, 14.67),
(1107, '2025-2026', 8, '2do lapso', 39, 104, 10, '14', NULL, NULL, 14.67),
(1108, '2025-2026', 8, '2do lapso', 39, 104, 10, '15', NULL, NULL, 14.67),
(1109, '2025-2026', 8, '2do lapso', 36, 107, 10, '20', NULL, NULL, 19.33),
(1110, '2025-2026', 8, '2do lapso', 36, 107, 10, '19', NULL, NULL, 19.33),
(1111, '2025-2026', 8, '2do lapso', 36, 107, 10, '19', NULL, NULL, 19.33),
(1112, '2025-2026', 8, '2do lapso', 38, 108, 10, '13', NULL, NULL, 13.67),
(1113, '2025-2026', 8, '2do lapso', 38, 108, 10, '14', NULL, NULL, 13.67),
(1114, '2025-2026', 8, '2do lapso', 38, 108, 10, '14', NULL, NULL, 13.67),
(1115, '2025-2026', 8, '2do lapso', 40, 102, 10, '17', NULL, NULL, 17.00),
(1116, '2025-2026', 8, '2do lapso', 40, 102, 10, '17', NULL, NULL, 17.00),
(1117, '2025-2026', 8, '2do lapso', 40, 102, 10, '17', NULL, NULL, 17.00),
(1118, '2025-2026', 8, '2do lapso', 37, 105, 10, '16', NULL, NULL, 16.00),
(1119, '2025-2026', 8, '2do lapso', 37, 105, 10, '16', NULL, NULL, 16.00),
(1120, '2025-2026', 8, '2do lapso', 37, 105, 10, '16', NULL, NULL, 16.00),
(1121, '2025-2026', 8, '2do lapso', 42, 103, 10, '18', NULL, NULL, 17.33),
(1122, '2025-2026', 8, '2do lapso', 42, 103, 10, '17', NULL, NULL, 17.33),
(1123, '2025-2026', 8, '2do lapso', 42, 103, 10, '17', NULL, NULL, 17.33),
(1124, '2025-2026', 8, '2do lapso', 42, 100, 10, '15', NULL, NULL, 15.67),
(1125, '2025-2026', 8, '2do lapso', 42, 100, 10, '16', NULL, NULL, 15.67),
(1126, '2025-2026', 8, '2do lapso', 42, 100, 10, '16', NULL, NULL, 15.67),
(1127, '2025-2026', 8, '2do lapso', 42, 101, 10, '17', NULL, NULL, 17.67),
(1128, '2025-2026', 8, '2do lapso', 42, 101, 10, '18', NULL, NULL, 17.67),
(1129, '2025-2026', 8, '2do lapso', 42, 101, 10, '18', NULL, NULL, 17.67),
(1130, '2025-2026', 8, '3er lapso', 43, 99, 10, '16', NULL, NULL, 16.33),
(1131, '2025-2026', 8, '3er lapso', 43, 99, 10, '17', NULL, NULL, 16.33),
(1132, '2025-2026', 8, '3er lapso', 43, 99, 10, '16', NULL, NULL, 16.33),
(1133, '2025-2026', 8, '3er lapso', 41, 106, 10, '18', NULL, NULL, 18.33),
(1134, '2025-2026', 8, '3er lapso', 41, 106, 10, '19', NULL, NULL, 18.33),
(1135, '2025-2026', 8, '3er lapso', 41, 106, 10, '18', NULL, NULL, 18.33),
(1136, '2025-2026', 8, '3er lapso', 39, 104, 10, '15', NULL, NULL, 14.67),
(1137, '2025-2026', 8, '3er lapso', 39, 104, 10, '14', NULL, NULL, 14.67),
(1138, '2025-2026', 8, '3er lapso', 39, 104, 10, '15', NULL, NULL, 14.67),
(1139, '2025-2026', 8, '3er lapso', 36, 107, 10, '20', NULL, NULL, 19.33),
(1140, '2025-2026', 8, '3er lapso', 36, 107, 10, '19', NULL, NULL, 19.33),
(1141, '2025-2026', 8, '3er lapso', 36, 107, 10, '19', NULL, NULL, 19.33),
(1142, '2025-2026', 8, '3er lapso', 38, 108, 10, '13', NULL, NULL, 13.67),
(1143, '2025-2026', 8, '3er lapso', 38, 108, 10, '14', NULL, NULL, 13.67),
(1144, '2025-2026', 8, '3er lapso', 38, 108, 10, '14', NULL, NULL, 13.67),
(1145, '2025-2026', 8, '3er lapso', 40, 102, 10, '17', NULL, NULL, 17.00),
(1146, '2025-2026', 8, '3er lapso', 40, 102, 10, '17', NULL, NULL, 17.00),
(1147, '2025-2026', 8, '3er lapso', 40, 102, 10, '17', NULL, NULL, 17.00),
(1148, '2025-2026', 8, '3er lapso', 37, 105, 10, '16', NULL, NULL, 16.00),
(1149, '2025-2026', 8, '3er lapso', 37, 105, 10, '16', NULL, NULL, 16.00),
(1150, '2025-2026', 8, '3er lapso', 37, 105, 10, '16', NULL, NULL, 16.00),
(1151, '2025-2026', 8, '3er lapso', 42, 103, 10, '18', NULL, NULL, 17.33),
(1152, '2025-2026', 8, '3er lapso', 42, 103, 10, '17', NULL, NULL, 17.33),
(1153, '2025-2026', 8, '3er lapso', 42, 103, 10, '17', NULL, NULL, 17.33),
(1154, '2025-2026', 8, '3er lapso', 42, 100, 10, '15', NULL, NULL, 15.67),
(1155, '2025-2026', 8, '3er lapso', 42, 100, 10, '16', NULL, NULL, 15.67),
(1156, '2025-2026', 8, '3er lapso', 42, 100, 10, '16', NULL, NULL, 15.67);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto_pago`
--

CREATE TABLE `contacto_pago` (
  `id` int(5) NOT NULL,
  `cedula` varchar(12) NOT NULL,
  `nombres` text NOT NULL,
  `apellidos` text NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `grado_inst` varchar(30) NOT NULL,
  `profesion` text NOT NULL,
  `trabaja` text NOT NULL,
  `nombre_empresa` varchar(30) NOT NULL,
  `telefono_empresa` varchar(20) NOT NULL,
  `direccion_empresa` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contacto_pago`
--

INSERT INTO `contacto_pago` (`id`, `cedula`, `nombres`, `apellidos`, `direccion`, `telefono`, `correo`, `grado_inst`, `profesion`, `trabaja`, `nombre_empresa`, `telefono_empresa`, `direccion_empresa`) VALUES
(1, 'V12345678', 'María', 'González', 'Av. Principal #123', '04141234567', 'maria.gonzalez@email.com', 'Universitario', 'Ingeniero', 'Sí', 'Tech Solutions', '04245551231', 'Zona Industrial'),
(2, 'V23456789', 'Carlos', 'Pérez', 'Calle 2 #45-67', '04142345678', 'carlos.perez@email.com', 'Universitario', 'Médico', 'Sí', 'Hospital Central', '04245551231', 'Centro Médico'),
(3, 'V98765432', 'Luisa', 'Morales', 'Urbanización Los Jardines', '04149876543', 'luisa.morales@email.com', 'Universitario', 'Administrador', 'Sí', 'Empresa Logística', '04125552141', 'Zona Industrial'),
(4, 'V87654321', 'Alberto', 'Rojas', 'Calle 7 #89-10', '04148765432', 'alberto.rojas@email.com', 'Técnico Superior', 'Técnico', 'Sí', 'Taller Mecánico', '04162586311', 'Zona Industrial'),
(5, 'V76543210', 'Marta', 'Silva', 'Av. Bolívar #100', '04147654321', 'marta.silva@email.com', 'Bachiller', 'Comerciante', 'Sí', 'Tienda Marta', '04125698541', 'Centro Comercial'),
(6, 'V65432109', 'Javier', 'Ortega', 'Residencias El Valle', '04146543210', 'javier.ortega@email.com', 'Universitario', 'Ingeniero', 'Sí', 'Constructora Ortega', '04168526931', 'Zona Norte'),
(7, 'V54321098', 'Carolina', 'Guzmán', 'Calle 12 #34-56', '04145432109', 'carolina.guzman@email.com', 'Universitario', 'Abogado', 'Sí', 'Bufete Legal', '04248527412', 'Centro Ciudad'),
(8, 'V43210987', 'Oscar', 'Navarro', 'Urbanización Los Naranjos', '04144321098', 'oscar.navarro@email.com', 'Técnico Medio', 'Electricista', 'Sí', 'Servicios Eléctricos', '04269638527', 'Zona Este'),
(9, 'V32109876', 'Daniela', 'Peña', 'Av. Sucre #78', '04143210987', 'daniela.pena@email.com', 'Universitario', 'Contador', 'Sí', 'Asesoría Financiera', '04268523691', 'Centro Financiero'),
(10, 'V21098765', 'Raúl', 'Méndez', 'Calle 20 #11-22', '04142109876', 'raul.mendez@email.com', 'Universitario', 'Médico', 'Sí', 'Clínica Méndez', '04268524135', 'Sector Salud'),
(11, 'V12121212', 'Rosa', 'Blanco', 'Av. Las Acacias #45', '04141212121', 'rosa.blanco@email.com', 'Universitario', 'Psicólogo', 'Sí', 'Centro Psicológico', '04248852145', 'Centro Ciudad'),
(12, 'V13131313', 'Alberto', 'Morales', 'Calle 13 #13-13', '04141313131', 'alberto.morales@email.com', 'Técnico Superior', 'Electricista', 'Sí', 'ElectroSol', '04248521463', 'Zona Industrial'),
(13, 'V22222222', 'Elena', 'Rojas', 'Urbanización Los Girasoles', '04142222222', 'elena.rojas@email.com', 'Universitario', 'Administrador', 'Sí', 'Empresa Logística', '0416125741', 'Zona Industrial'),
(14, 'V23232323', 'Félix', 'Pérez', 'Calle 23 #23-23', '04142323232', 'felix.perez@email.com', 'Técnico Superior', 'Técnico', 'Sí', 'Taller Mecánico', '04242323231', 'Zona Industrial'),
(15, 'V24242424', 'Diana', 'García', 'Av. Bolívar #240', '04142424242', 'diana.garcia@email.com', 'Bachiller', 'Comerciante', 'Sí', 'Tienda Diana', '04245551597', 'Centro Comercial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `estado` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `estado`) VALUES
(1, 'Inactivo'),
(2, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id` int(8) NOT NULL,
  `cedula_est` varchar(20) DEFAULT NULL,
  `nombres_est` text NOT NULL,
  `apellidos_est` text NOT NULL,
  `sexo` text NOT NULL,
  `f_nacimiento_est` varchar(30) NOT NULL,
  `edad_est` int(50) NOT NULL,
  `direccion_est` varchar(50) NOT NULL,
  `lugar_nac_est` varchar(50) NOT NULL,
  `colegio_ant_est` varchar(50) NOT NULL,
  `motivo_ret_est` text NOT NULL,
  `nivelacion_est` text NOT NULL,
  `explicacion_est` text NOT NULL,
  `grado_est` int(5) NOT NULL,
  `turno_est` text NOT NULL,
  `problem_resp_est` text DEFAULT NULL,
  `alergias_est` text DEFAULT NULL,
  `vacunas_est` text NOT NULL,
  `enfermedad_est` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id`, `cedula_est`, `nombres_est`, `apellidos_est`, `sexo`, `f_nacimiento_est`, `edad_est`, `direccion_est`, `lugar_nac_est`, `colegio_ant_est`, `motivo_ret_est`, `nivelacion_est`, `explicacion_est`, `grado_est`, `turno_est`, `problem_resp_est`, `alergias_est`, `vacunas_est`, `enfermedad_est`) VALUES
(1, 'E12345678', 'Juan', 'González Pérez', 'M', '12/06/2012', 13, 'Av. Principal #123', 'Caracas', 'Escuela Básica Los Arcos', 'Cambio de residencia', 'No', 'Cambio de residencia', 7, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(2, 'V23456789', 'Ana', 'Pérez Rodríguez', 'F', '12/06/2012', 13, 'Calle 2 #45-67', 'Valencia', 'Colegio Santa María', 'Finalización de ciclo', 'No', 'Cambio de residencia', 7, 'Mañana', 'Ninguno', 'Polvo', 'Completas', 'Asma'),
(3, 'E34567890', 'Carlos', 'Rodríguez Martínez', 'M', '24/07/2012', 13, 'Urbanización Las Flores', 'Maracay', 'Escuela Básica Bolivariana', 'Cambio de institución', 'No', 'Cambio de residencia', 7, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(4, 'V45678901', 'María', 'Martínez López', 'F', '24/07/2012', 13, 'Residencias El Paraíso', 'Barquisimeto', 'Colegio Los Próceres', 'Mejor educación', 'No', 'Cambio de residencia', 7, 'Mañana', 'Ninguno', 'Mariscos', 'Completas', 'Ninguna'),
(5, 'E56789012', 'Pedro', 'López Hernández', 'M', '24/07/2012', 13, 'Calle 5 #12-34', 'Caracas', 'Escuela Básica Andrés Bello', 'Cambio de residencia', 'No', 'Cambio de residencia', 7, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(6, 'V67890123', 'Laura', 'Hernández Díaz', 'F', '24/07/2012', 13, 'Av. Bolívar #78', 'Valencia', 'Colegio San José', 'Finalización de ciclo', 'No', 'Cambio de residencia', 7, 'Mañana', 'Ninguno', 'Polen', 'Completas', 'Rinitis alérgica'),
(7, 'V78901234', 'Diego', 'Díaz García', 'M', '06/08/2012', 13, 'Urbanización Los Pinos', 'Maracay', 'Escuela Básica Simón Bolívar', 'Cambio de institución', 'No', 'Cambio de residencia', 7, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(8, 'E89012345', 'Sofía', 'García Fernández', 'F', '06/08/2012', 13, 'Calle 8 #23-45', 'Barquisimeto', 'Colegio La Salle', 'Mejor educación', 'No', 'Zona más cercana', 7, 'Mañana', 'Ninguno', 'Lácteos', 'Completas', 'Intolerancia a la lactosa'),
(9, 'E90123456', 'Andrés', 'Fernández Sánchez', 'M', '12/12/2012', 13, 'Residencias El Recreo', 'Caracas', 'Escuela Básica República de Chile', 'Cambio de residencia', 'No', 'Zona más cercana', 7, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(10, 'V01234567', 'Valentina', 'Sánchez Ramírez', 'F', '12/12/2012', 13, 'Av. Libertador #56', 'Valencia', 'Colegio San Ignacio', 'Finalización de ciclo', 'No', 'Zona más cercana', 7, 'Mañana', 'Ninguno', 'Nueces', 'Completas', 'Ninguna'),
(11, 'V11223344', 'Miguel', 'Ramírez Torres', 'M', '06/12/2011', 14, 'Calle 10 #11-12', 'Maracay', 'Colegio Santa Rosa', 'Cambio de residencia', 'No', 'Zona más cercana', 8, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(12, 'V22334455', 'Camila', 'Torres Mendoza', 'F', '06/12/2011', 14, 'Urbanización Brisas', 'Barquisimeto', 'Escuela Básica Los Samanes', 'Finalización de ciclo', 'No', 'Zona más cercana', 8, 'Mañana', 'Ninguno', 'Polvo', 'Completas', 'Asma'),
(13, 'V33445566', 'Javier', 'Mendoza Vargas', 'M', '18/10/2011', 14, 'Av. Principal #200', 'Caracas', 'Colegio San Martín', 'Cambio de institución', 'No', 'Zona más cercana', 8, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(14, 'V44556677', 'Isabella', 'Vargas Castro', 'F', '18/10/2011', 14, 'Calle 15 #33-44', 'Valencia', 'Escuela Básica Juan Pablo II', 'Mejor educación', 'No', 'Zona más cercana', 8, 'Mañana', 'Ninguno', 'Mariscos', 'Completas', 'Ninguna'),
(15, 'V55667788', 'Daniel', 'Castro Rojas', 'M', '18/10/2011', 14, 'Residencias Altamira', 'Maracay', 'Colegio La Concordia', 'Cambio de residencia', 'No', 'Zona más cercana', 8, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(16, 'V66778899', 'Gabriela', 'Rojas Silva', 'F', '24/08/2011', 14, 'Av. Bolívar #100', 'Barquisimeto', 'Escuela Básica República Argentina', 'Finalización de ciclo', 'No', 'Zona más cercana', 8, 'Mañana', 'Ninguno', 'Polen', 'Completas', 'Rinitis alérgica'),
(17, 'E77889900', 'Alejandro', 'Silva Ortega', 'M', '24/08/2011', 14, 'Calle 7 #89-10', 'Caracas', 'Colegio San Francisco', 'Cambio de institución', 'No', 'Motivos personales', 8, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(18, 'E88990011', 'Mariana', 'Ortega Guzmán', 'F', '24/08/2011', 14, 'Residencias El Valle', 'Valencia', 'Escuela Básica República del Perú', 'Mejor educación', 'No', 'Motivos personales', 8, 'Mañana', 'Ninguno', 'Lácteos', 'Completas', 'Intolerancia a la lactosa'),
(19, 'E99001122', 'Ricardo', 'Guzmán Navarro', 'M', '01/10/2011', 14, 'Calle 12 #34-56', 'Maracay', 'Colegio San Agustín', 'Cambio de residencia', 'No', 'Motivos personales', 8, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(20, 'E00112233', 'Natalia', 'Navarro Peña', 'F', '01/10/2011', 14, 'Urbanización Los Naranjos', 'Barquisimeto', 'Escuela Básica República de Colombia', 'Finalización de ciclo', 'No', 'Motivos personales', 8, 'Mañana', 'Ninguno', 'Nueces', 'Completas', 'Ninguna'),
(21, 'V99887766', 'Luis', 'Peña Méndez', 'M', '16/10/2010', 15, 'Av. Sucre #78', 'Caracas', 'Colegio Santo Tomás', 'Cambio de residencia', 'No', 'Motivos personales', 9, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(22, 'V88776655', 'Paula', 'Méndez Morales', 'F', '16/10/2010', 15, 'Calle 20 #11-22', 'Valencia', 'Escuela Básica República de México', 'Finalización de ciclo', 'No', 'Motivos personales', 9, 'Mañana', 'Ninguno', 'Polvo', 'Completas', 'Asma'),
(23, 'V77665544', 'José', 'Morales Rojas', 'M', '20/10/2010', 15, 'Urbanización Los Jardines', 'Maracay', 'Colegio San Vicente', 'Cambio de institución', 'No', 'Motivos personales', 9, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(24, 'V66554433', 'Lucía', 'Rojas Silva', 'F', '20/10/2010', 15, 'Av. Bolívar #100', 'Barquisimeto', 'Escuela Básica República de Chile', 'Mejor educación', 'No', 'Motivos personales', 9, 'Mañana', 'Ninguno', 'Mariscos', 'Completas', 'Ninguna'),
(25, 'E55443322', 'Felipe', 'Silva Ortega', 'M', '20/10/2010', 15, 'Residencias El Valle', 'Caracas', 'Colegio La Salle', 'Cambio de residencia', 'No', 'Motivos personales', 9, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(26, 'V44332211', 'Daniela', 'Ortega Guzmán', 'F', '20/10/2010', 15, 'Calle 12 #34-56', 'Valencia', 'Escuela Básica Andrés Bello', 'Finalización de ciclo', 'No', 'Retiro Formal', 9, 'Mañana', 'Ninguno', 'Polen', 'Completas', 'Rinitis alérgica'),
(27, 'V33221100', 'David', 'Guzmán Navarro', 'M', '20/11/2010', 15, 'Urbanización Los Naranjos', 'Maracay', 'Colegio San Ignacio', 'Cambio de institución', 'No', 'Retiro Formal', 9, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(28, 'V22110099', 'Valeria', 'Navarro Peña', 'F', '20/11/2010', 15, 'Av. Sucre #78', 'Barquisimeto', 'Escuela Básica Simón Bolívar', 'Mejor educación', 'No', 'Retiro Formal', 9, 'Mañana', 'Ninguno', 'Lácteos', 'Completas', 'Intolerancia a la lactosa'),
(29, 'E11009988', 'Samuel', 'Peña Méndez', 'M', '12/12/2010', 15, 'Calle 20 #11-22', 'Caracas', 'Colegio San José', 'Cambio de residencia', 'No', 'Retiro Formal', 9, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(30, 'E00998877', 'Emma', 'Méndez Morales', 'F', '12/12/2010', 15, 'Urbanización Los Jardines', 'Valencia', 'Escuela Básica Juan Pablo II', 'Finalización de ciclo', 'No', 'Retiro Formal', 9, 'Mañana', 'Ninguno', 'Nueces', 'Completas', 'Ninguna'),
(31, 'E10203040', 'Mateo', 'González Pérez', 'M', '06/11/2009', 16, 'Av. Principal #123', 'Maracay', 'Colegio Santa María', 'Cambio de residencia', 'No', 'Retiro Formal', 10, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(32, 'V20304050', 'Sara', 'Pérez Rodríguez', 'F', '06/11/2009', 16, 'Calle 2 #45-67', 'Barquisimeto', 'Escuela Básica Los Arcos', 'Finalización de ciclo', 'No', 'Retiro Formal', 10, 'Mañana', 'Ninguno', 'Polvo', 'Completas', 'Asma'),
(33, 'E30405060', 'Adrián', 'Rodríguez Martínez', 'M', '09/07/2009', 16, 'Urbanización Las Flores', 'Caracas', 'Colegio Los Próceres', 'Cambio de institución', 'No', 'Retiro Formal', 10, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(34, 'V40506070', 'Claudia', 'Martínez López', 'F', '09/07/2009', 16, 'Residencias El Paraíso', 'Valencia', 'Escuela Básica Bolivariana', 'Mejor educación', 'No', 'Retiro Formal', 10, 'Mañana', 'Ninguno', 'Mariscos', 'Completas', 'Ninguna'),
(35, 'E50607080', 'Hugo', 'López Hernández', 'M', '09/07/2009', 16, 'Calle 5 #12-34', 'Maracay', 'Colegio San Ignacio', 'Cambio de residencia', 'No', 'Retiro Formal', 10, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(36, 'E60708090', 'Elena', 'Hernández Díaz', 'F', '15/08/2009', 16, 'Av. Bolívar #78', 'Barquisimeto', 'Escuela Básica Andrés Bello', 'Finalización de ciclo', 'No', 'Retiro Formal', 10, 'Mañana', 'Ninguno', 'Polen', 'Completas', 'Rinitis alérgica'),
(37, 'E70809010', 'Raúl', 'Díaz García', 'M', '15/08/2009', 16, 'Urbanización Los Pinos', 'Caracas', 'Colegio La Salle', 'Cambio de institución', 'No', 'Retiro Formal', 10, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(38, 'V80901020', 'Carla', 'García Fernández', 'F', '15/08/2009', 16, 'Calle 8 #23-45', 'Valencia', 'Escuela Básica Simón Bolívar', 'Mejor educación', 'No', 'Retiro Formal', 10, 'Mañana', 'Ninguno', 'Lácteos', 'Completas', 'Intolerancia a la lactosa'),
(39, 'E91020304', 'Jorge', 'Fernández Sánchez', 'M', '18/08/2009', 16, 'Residencias El Recreo', 'Maracay', 'Colegio San José', 'Cambio de residencia', 'No', 'Retiro Formal', 10, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(40, 'V01020304', 'Renata', 'Sánchez Ramírez', 'F', '18/08/2009', 16, 'Av. Libertador #56', 'Barquisimeto', 'Escuela Básica República de Chile', 'Finalización de ciclo', 'No', 'Retiro Formal', 10, 'Mañana', 'Ninguno', 'Nueces', 'Completas', 'Ninguna'),
(41, 'V11223344', 'Bruno', 'Ramírez Torres', 'M', '18/10/2008', 17, 'Calle 10 #11-12', 'Caracas', 'Colegio Santa Rosa', 'Cambio de residencia', 'No', 'Retiro Formal', 11, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(42, 'V22334455', 'Olivia', 'Torres Mendoza', 'F', '18/10/2008', 17, 'Urbanización Brisas', 'Valencia', 'Escuela Básica Los Samanes', 'Finalización de ciclo', 'No', 'Retiro Formal', 11, 'Mañana', 'Ninguno', 'Polvo', 'Completas', 'Asma'),
(43, 'V33445566', 'Martín', 'Mendoza Vargas', 'M', '18/10/2008', 17, 'Av. Principal #200', 'Maracay', 'Colegio San Martín', 'Cambio de institución', 'No', 'Retiro Formal', 11, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(44, 'V44556677', 'Victoria', 'Vargas Castro', 'F', '01/09/2008', 17, 'Calle 15 #33-44', 'Barquisimeto', 'Escuela Básica Juan Pablo II', 'Mejor educación', 'No', 'Retiro Formal', 11, 'Mañana', 'Ninguno', 'Mariscos', 'Completas', 'Ninguna'),
(45, 'E55667788', 'Emilio', 'Castro Rojas', 'M', '01/09/2008', 17, 'Residencias Altamira', 'Caracas', 'Colegio La Concordia', 'Cambio de residencia', 'No', 'Retiro Formal', 11, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(46, 'V66778899', 'Antonella', 'Rojas Silva', 'F', '09/12/2008', 17, 'Av. Bolívar #100', 'Valencia', 'Escuela Básica República Argentina', 'Finalización de ciclo', 'No', 'Retiro Formal', 11, 'Mañana', 'Ninguno', 'Polen', 'Completas', 'Rinitis alérgica'),
(47, 'V77889900', 'Sebastián', 'Silva Ortega', 'M', '09/12/2008', 17, 'Calle 7 #89-10', 'Maracay', 'Colegio San Francisco', 'Cambio de institución', 'No', 'Retiro Formal', 11, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(48, 'E88990011', 'Florencia', 'Ortega Guzmán', 'F', '09/12/2008', 17, 'Residencias El Valle', 'Barquisimeto', 'Escuela Básica República del Perú', 'Mejor educación', 'No', 'Retiro Formal', 11, 'Mañana', 'Ninguno', 'Lácteos', 'Completas', 'Intolerancia a la lactosa'),
(49, 'V99001122', 'Gonzalo', 'Guzmán Navarro', 'M', '11/12/2008', 17, 'Calle 12 #34-56', 'Caracas', 'Colegio San Agustín', 'Cambio de residencia', 'No', 'Retiro Formal', 11, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(50, 'E00112233', 'Julieta', 'Navarro Peña', 'F', '11/12/2008', 17, 'Urbanización Los Naranjos', 'Valencia', 'Escuela Básica República de Colombia', 'Finalización de ciclo', 'No', 'Retiro Formal', 11, 'Mañana', 'Ninguno', 'Nueces', 'Completas', 'Ninguna'),
(51, 'RB1000001', 'Santiago', 'Blanco Morales', 'M', '15/10/2018', 6, 'Av. Las Acacias #45', 'Caracas', 'Jardín de Infancia', 'Edad escolar', 'No', 'Cambio de residencia', 1, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(52, 'AM2000002', 'Valentina', 'Morales Rivas', 'F', '15/10/2018', 6, 'Calle 13 #13-13', 'Valencia', 'Guardería Mi Pequeño Mundo', 'Edad escolar', 'No', 'Cambio de residencia', 1, 'Mañana', 'Ninguno', 'Polvo', 'Completas', 'Asma'),
(53, 'GR3000003', 'Matías', 'Rivas Gómez', 'M', '15/10/2018', 6, 'Urbanización Los Mangos', 'Maracay', 'Jardín Alegría', 'Edad escolar', 'No', 'Cambio de residencia', 1, 'Tarde', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(54, 'FG4000004', 'Emma', 'Gómez Suárez', 'F', '15/10/2018', 6, 'Av. Intercomunal #78', 'Barquisimeto', 'Centro Infantil', 'Edad escolar', 'No', 'Cambio de residencia', 1, 'Mañana', 'Ninguno', 'Mariscos', 'Completas', 'Ninguna'),
(55, 'V1234567', 'Thiago', 'Suárez Paredes', 'M', '15/10/2018', 6, 'Residencias El Bosque', 'Caracas', 'Jardín de Infancia', 'Edad escolar', 'No', 'Cambio de residencia', 1, 'Tarde', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(56, 'V2345678', 'Isabella', 'Paredes Quintero', 'F', '20/11/2018', 6, 'Calle 17 #17-17', 'Valencia', 'Guardería Mi Pequeño Mundo', 'Edad escolar', 'No', 'Cambio de residencia', 1, 'Mañana', 'Ninguno', 'Polen', 'Completas', 'Rinitis alérgica'),
(57, 'V3456789', 'Benjamín', 'Quintero Mendoza', 'M', '20/11/2018', 6, 'Urbanización Los Robles', 'Maracay', 'Jardín Alegría', 'Edad escolar', 'No', 'Cambio de residencia', 1, 'Tarde', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(58, 'V4567890', 'Mía', 'Mendoza Campos', 'F', '20/11/2018', 6, 'Av. Bolívar #191', 'Barquisimeto', 'Centro Infantil', 'Edad escolar', 'No', 'Cambio de residencia', 1, 'Mañana', 'Ninguno', 'Lácteos', 'Completas', 'Intolerancia a la lactosa'),
(59, 'V5678901', 'Lucas', 'Campos Núñez', 'M', '20/11/2018', 6, 'Calle 20 #20-20', 'Caracas', 'Jardín de Infancia', 'Edad escolar', 'No', 'Cambio de residencia', 1, 'Tarde', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(60, 'V6789012', 'Sofía', 'Núñez Blanco', 'F', '20/11/2018', 6, 'Residencias El Jardín', 'Valencia', 'Guardería Mi Pequeño Mundo', 'Edad escolar', 'No', 'Cambio de residencia', 1, 'Mañana', 'Ninguno', 'Nueces', 'Completas', 'Ninguna'),
(61, 'RB5000005', 'Mateo', 'Blanco Rivas', 'M', '11/11/2017', 7, 'Av. Las Acacias #45', 'Maracay', 'Escuela Básica Los Arcos', 'Cambio de institución', 'No', 'Cambio de residencia', 2, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(62, 'AM6000006', 'Valeria', 'Morales Gómez', 'F', '11/11/2017', 7, 'Calle 13 #13-13', 'Barquisimeto', 'Colegio Santa María', 'Finalización de ciclo', 'No', 'Cambio de residencia', 2, 'Tarde', 'Ninguno', 'Polvo', 'Completas', 'Asma'),
(63, 'GR7000007', 'Samuel', 'Rivas Suárez', 'M', '11/11/2017', 7, 'Urbanización Los Mangos', 'Caracas', 'Escuela Básica Bolivariana', 'Cambio de residencia', 'No', 'Cambio de residencia', 2, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(64, 'FG8000008', 'Martina', 'Gómez Paredes', 'F', '11/11/2017', 7, 'Av. Intercomunal #78', 'Valencia', 'Colegio Los Próceres', 'Mejor educación', 'No', 'Cambio de residencia', 2, 'Tarde', 'Ninguno', 'Mariscos', 'Completas', 'Ninguna'),
(65, 'V7890123', 'Diego', 'Suárez Quintero', 'M', '11/11/2017', 7, 'Residencias El Bosque', 'Maracay', 'Escuela Básica Andrés Bello', 'Cambio de residencia', 'No', 'Cambio de residencia', 2, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(66, 'V8901234', 'Emilia', 'Paredes Mendoza', 'F', '25/10/2017', 7, 'Calle 17 #17-17', 'Barquisimeto', 'Colegio San José', 'Finalización de ciclo', 'No', 'Cambio de residencia', 2, 'Tarde', 'Ninguno', 'Polen', 'Completas', 'Rinitis alérgica'),
(67, 'V9012345', 'Nicolás', 'Quintero Campos', 'M', '25/10/2017', 7, 'Urbanización Los Robles', 'Caracas', 'Escuela Básica Simón Bolívar', 'Cambio de institución', 'No', 'Cambio de residencia', 2, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(68, 'V0123456', 'Lucía', 'Mendoza Núñez', 'F', '25/10/2017', 7, 'Av. Bolívar #191', 'Valencia', 'Colegio La Salle', 'Mejor educación', 'No', 'Cambio de residencia', 2, 'Tarde', 'Ninguno', 'Lácteos', 'Completas', 'Intolerancia a la lactosa'),
(69, 'V1234560', 'Joaquín', 'Campos Blanco', 'M', '25/10/2017', 7, 'Calle 20 #20-20', 'Maracay', 'Escuela Básica República de Chile', 'Cambio de residencia', 'No', 'Cambio de residencia', 2, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(70, 'V2345601', 'Renata', 'Núñez Morales', 'F', '25/10/2017', 7, 'Residencias El Jardín', 'Barquisimeto', 'Colegio San Ignacio', 'Finalización de ciclo', 'No', 'Cambio de residencia', 2, 'Tarde', 'Ninguno', 'Nueces', 'Completas', 'Ninguna'),
(71, 'RB9000009', 'Alejandro', 'Blanco Gómez', 'M', '25/10/2016', 8, 'Av. Las Acacias #45', 'Caracas', 'Escuela Básica Los Arcos', 'Cambio de residencia', 'No', 'Cambio de residencia', 3, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(72, 'AM0000010', 'Victoria', 'Morales Suárez', 'F', '25/10/2016', 8, 'Calle 13 #13-13', 'Valencia', 'Colegio Santa María', 'Finalización de ciclo', 'No', 'Cambio de residencia', 3, 'Tarde', 'Ninguno', 'Polvo', 'Completas', 'Asma'),
(73, 'GR1000011', 'Daniel', 'Rivas Paredes', 'M', '25/10/2016', 8, 'Urbanización Los Mangos', 'Maracay', 'Escuela Básica Bolivariana', 'Cambio de institución', 'No', 'Cambio de residencia', 3, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(74, 'FG2000012', 'Antonella', 'Gómez Quintero', 'F', '25/10/2016', 8, 'Av. Intercomunal #78', 'Barquisimeto', 'Colegio Los Próceres', 'Mejor educación', 'No', 'Cambio de residencia', 3, 'Tarde', 'Ninguno', 'Mariscos', 'Completas', 'Ninguna'),
(75, 'V3456012', 'Emiliano', 'Suárez Mendoza', 'M', '25/10/2016', 8, 'Residencias El Bosque', 'Caracas', 'Escuela Básica Andrés Bello', 'Cambio de residencia', 'No', 'Cambio de residencia', 3, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(76, 'V4560123', 'Catalina', 'Paredes Campos', 'F', '14/09/2016', 8, 'Calle 17 #17-17', 'Valencia', 'Colegio San José', 'Finalización de ciclo', 'No', 'Cambio de residencia', 3, 'Tarde', 'Ninguno', 'Polen', 'Completas', 'Rinitis alérgica'),
(77, 'V5601234', 'Juan Pablo', 'Quintero Núñez', 'M', '14/09/2016', 8, 'Urbanización Los Robles', 'Maracay', 'Escuela Básica Simón Bolívar', 'Cambio de institución', 'No', 'Cambio de residencia', 3, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(78, 'V6012345', 'Julieta', 'Mendoza Blanco', 'F', '14/09/2016', 8, 'Av. Bolívar #191', 'Barquisimeto', 'Colegio La Salle', 'Mejor educación', 'No', 'Cambio de residencia', 3, 'Tarde', 'Ninguno', 'Lácteos', 'Completas', 'Intolerancia a la lactosa'),
(79, 'V0123450', 'Felipe', 'Campos Morales', 'M', '14/09/2016', 8, 'Calle 20 #20-20', 'Caracas', 'Escuela Básica República de Chile', 'Cambio de residencia', 'No', 'Cambio de residencia', 3, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(80, 'V1234501', 'Florencia', 'Núñez Rivas', 'F', '14/09/2016', 8, 'Residencias El Jardín', 'Valencia', 'Colegio San Ignacio', 'Finalización de ciclo', 'No', 'Cambio de residencia', 3, 'Tarde', 'Ninguno', 'Nueces', 'Completas', 'Ninguna'),
(81, 'RB3000013', 'Maximiliano', 'Blanco Suárez', 'M', '11/09/2015', 9, 'Av. Las Acacias #45', 'Maracay', 'Escuela Básica Los Arcos', 'Cambio de residencia', 'No', 'Cambio de institucion', 4, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(82, 'AM4000014', 'Abril', 'Morales Paredes', 'F', '11/09/2015', 9, 'Calle 13 #13-13', 'Barquisimeto', 'Colegio Santa María', 'Finalización de ciclo', 'No', 'Cambio de institucion', 4, 'Tarde', 'Ninguno', 'Polvo', 'Completas', 'Asma'),
(83, 'GR5000015', 'Emilio', 'Rivas Quintero', 'M', '11/09/2015', 9, 'Urbanización Los Mangos', 'Caracas', 'Escuela Básica Bolivariana', 'Cambio de institución', 'No', 'Cambio de institucion', 4, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(84, 'FG6000016', 'Agustina', 'Gómez Mendoza', 'F', '11/09/2015', 9, 'Av. Intercomunal #78', 'Valencia', 'Colegio Los Próceres', 'Mejor educación', 'No', 'Cambio de institucion', 4, 'Tarde', 'Ninguno', 'Mariscos', 'Completas', 'Ninguna'),
(85, 'V2345012', 'Thiago', 'Suárez Campos', 'M', '11/09/2015', 9, 'Residencias El Bosque', 'Maracay', 'Escuela Básica Andrés Bello', 'Cambio de residencia', 'No', 'Cambio de institucion', 4, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(86, 'V3450123', 'Isidora', 'Paredes Núñez', 'F', '11/11/2015', 9, 'Calle 17 #17-17', 'Caracas', 'Colegio San José', 'Finalización de ciclo', 'No', 'Cambio de institucion', 4, 'Tarde', 'Ninguno', 'Polen', 'Completas', 'Rinitis alérgica'),
(87, 'V4501234', 'Benicio', 'Quintero Blanco', 'M', '11/11/2015', 9, 'Urbanización Los Robles', 'Valencia', 'Escuela Básica Simón Bolívar', 'Cambio de institución', 'No', 'Cambio de institucion', 4, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(88, 'V5012345', 'Maite', 'Mendoza Morales', 'F', '11/11/2015', 9, 'Av. Bolívar #191', 'Barquisimeto', 'Colegio La Salle', 'Mejor educación', 'No', 'Cambio de institucion', 4, 'Tarde', 'Ninguno', 'Lácteos', 'Completas', 'Intolerancia a la lactosa'),
(89, 'V0123401', 'Santino', 'Campos Rivas', 'M', '11/11/2015', 9, 'Calle 20 #20-20', 'Maracay', 'Escuela Básica República de Chile', 'Cambio de residencia', 'No', 'Cambio de institucion', 4, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(90, 'V1234012', 'Alma', 'Núñez Gómez', 'F', '11/11/2015', 9, 'Residencias El Jardín', 'Caracas', 'Colegio San Ignacio', 'Finalización de ciclo', 'No', 'Cambio de institucion', 4, 'Tarde', 'Ninguno', 'Nueces', 'Completas', 'Ninguna'),
(91, 'RB7000017', 'Bautista', 'Blanco Paredes', 'M', '20/11/2014', 10, 'Av. Las Acacias #45', 'Valencia', 'Escuela Básica Los Arcos', 'Cambio de residencia', 'No', 'Cambio de institucion', 5, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(92, 'AM8000018', 'Mía', 'Morales Quintero', 'F', '20/11/2014', 10, 'Calle 13 #13-13', 'Maracay', 'Colegio Santa María', 'Finalización de ciclo', 'No', 'Cambio de institucion', 5, 'Tarde', 'Ninguno', 'Polvo', 'Completas', 'Asma'),
(93, 'GR9000019', 'Vicente', 'Rivas Mendoza', 'M', '20/11/2014', 10, 'Urbanización Los Mangos', 'Barquisimeto', 'Escuela Básica Bolivariana', 'Cambio de institución', 'No', 'Cambio de institucion', 5, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(94, 'FG0000020', 'Valentina', 'Gómez Campos', 'F', '20/11/2014', 10, 'Av. Intercomunal #78', 'Caracas', 'Colegio Los Próceres', 'Mejor educación', 'No', 'Cambio de institucion', 5, 'Tarde', 'Ninguno', 'Mariscos', 'Completas', 'Ninguna'),
(95, 'V1234010', 'Luciano', 'Suárez Núñez', 'M', '20/11/2014', 10, 'Residencias El Bosque', 'Valencia', 'Escuela Básica Andrés Bello', 'Cambio de residencia', 'No', 'Cambio de institucion', 5, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(96, 'V2340101', 'Amanda', 'Paredes Blanco', 'F', '14/12/2014', 10, 'Calle 17 #17-17', 'Maracay', 'Colegio San José', 'Finalización de ciclo', 'No', 'Cambio de institucion', 5, 'Tarde', 'Ninguno', 'Polen', 'Completas', 'Rinitis alérgica'),
(97, 'V3401012', 'Simón', 'Quintero Morales', 'M', '14/12/2014', 10, 'Urbanización Los Robles', 'Barquisimeto', 'Escuela Básica Simón Bolívar', 'Cambio de institución', 'No', 'Cambio de institucion', 5, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(98, 'V4010123', 'Antonia', 'Mendoza Rivas', 'F', '14/12/2014', 10, 'Av. Bolívar #191', 'Caracas', 'Colegio La Salle', 'Mejor educación', 'No', 'Cambio de institucion', 5, 'Tarde', 'Ninguno', 'Lácteos', 'Completas', 'Intolerancia a la lactosa'),
(99, 'V0101234', 'Tobías', 'Campos Gómez', 'M', '14/12/2014', 10, 'Calle 20 #20-20', 'Valencia', 'Escuela Básica República de Chile', 'Cambio de residencia', 'No', 'Cambio de institucion', 5, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(100, 'V1012340', 'Juliana', 'Núñez Suárez', 'F', '14/12/2014', 10, 'Residencias El Jardín', 'Maracay', 'Colegio San Ignacio', 'Finalización de ciclo', 'No', 'Cambio de institucion', 5, 'Tarde', 'Ninguno', 'Nueces', 'Completas', 'Ninguna'),
(101, 'RB1000021', 'Ignacio', 'Blanco Quintero', 'M', '18/12/2014', 11, 'Av. Las Acacias #45', 'Barquisimeto', 'Escuela Básica Los Arcos', 'Cambio de residencia', 'No', 'Cambio de institucion', 6, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(102, 'AM2000022', 'Emilia', 'Morales Mendoza', 'F', '18/12/2014', 11, 'Calle 13 #13-13', 'Caracas', 'Colegio Santa María', 'Finalización de ciclo', 'No', 'Cambio de institucion', 6, 'Tarde', 'Ninguno', 'Polvo', 'Completas', 'Asma'),
(103, 'GR3000023', 'Juan Martín', 'Rivas Campos', 'M', '18/12/2014', 11, 'Urbanización Los Mangos', 'Valencia', 'Escuela Básica Bolivariana', 'Cambio de institución', 'No', 'Cambio de institucion', 6, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(104, 'FG4000024', 'Catalina', 'Gómez Núñez', 'F', '18/12/2014', 11, 'Av. Intercomunal #78', 'Maracay', 'Colegio Los Próceres', 'Mejor educación', 'No', 'Cambio de institucion', 6, 'Tarde', 'Ninguno', 'Mariscos', 'Completas', 'Ninguna'),
(105, 'V1012345', 'Facundo', 'Suárez Blanco', 'M', '18/12/2014', 11, 'Residencias El Bosque', 'Barquisimeto', 'Escuela Básica Andrés Bello', 'Cambio de residencia', 'No', 'Cambio de institucion', 6, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(106, 'V0123451', 'Clara', 'Paredes Morales', 'F', '08/11/2014', 11, 'Calle 17 #17-17', 'Caracas', 'Colegio San José', 'Finalización de ciclo', 'No', 'Cambio de institucion', 6, 'Tarde', 'Ninguno', 'Polen', 'Completas', 'Rinitis alérgica'),
(107, 'V1234510', 'Lautaro', 'Quintero Rivas', 'M', '08/11/2014', 11, 'Urbanización Los Robles', 'Valencia', 'Escuela Básica Simón Bolívar', 'Cambio de institución', 'No', 'Cambio de institucion', 6, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(108, 'V2345101', 'Juana', 'Mendoza Gómez', 'F', '08/11/2014', 11, 'Av. Bolívar #191', 'Maracay', 'Colegio La Salle', 'Mejor educación', 'No', 'Cambio de institucion', 6, 'Tarde', 'Ninguno', 'Lácteos', 'Completas', 'Intolerancia a la lactosa'),
(109, 'V3451012', 'Tomás', 'Campos Suárez', 'M', '08/11/2014', 11, 'Calle 20 #20-20', 'Barquisimeto', 'Escuela Básica República de Chile', 'Cambio de residencia', 'No', 'Cambio de institucion', 6, 'Mañana', 'Ninguno', 'Ninguna', 'Completas', 'Ninguna'),
(110, 'V4510123', 'Sara', 'Núñez Paredes', 'F', '08/11/2014', 11, 'Residencias El Jardín', 'Caracas', 'Colegio San Ignacio', 'Finalización de ciclo', 'No', 'Cambio de institucion', 6, 'Tarde', 'Ninguno', 'Nueces', 'Completas', 'Ninguna');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados`
--

CREATE TABLE `grados` (
  `id` int(11) NOT NULL,
  `categoria_grado` varchar(30) NOT NULL,
  `id_grado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grados`
--

INSERT INTO `grados` (`id`, `categoria_grado`, `id_grado`) VALUES
(1, 'Primaria', '1er grado'),
(2, 'Primaria', '2do grado'),
(3, 'Primaria', '3er grado'),
(4, 'Primaria', '4to grado'),
(5, 'Primaria', '5to grado'),
(6, 'Primaria', '6to grado'),
(7, 'Secundaria', '1er año'),
(8, 'Secundaria', '2do año'),
(9, 'Secundaria', '3er año'),
(10, 'Secundaria', '4to año'),
(11, 'Secundaria', '5to año');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado_materia`
--

CREATE TABLE `grado_materia` (
  `id` int(11) NOT NULL,
  `id_grado` int(5) NOT NULL,
  `id_materia` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grado_materia`
--

INSERT INTO `grado_materia` (`id`, `id_grado`, `id_materia`) VALUES
(61, 7, 99),
(62, 7, 106),
(63, 7, 104),
(64, 7, 107),
(65, 7, 108),
(66, 7, 102),
(67, 7, 105),
(68, 7, 103),
(69, 7, 100),
(70, 7, 101),
(71, 1, 114),
(72, 1, 113),
(73, 1, 111),
(74, 1, 112),
(75, 1, 115),
(76, 1, 116),
(78, 7, 119);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id_horario` int(11) NOT NULL,
  `id_grado` int(11) NOT NULL,
  `id_aula` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `dia_semana` varchar(15) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `anio_escolar` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id_horario`, `id_grado`, `id_aula`, `id_materia`, `id_profesor`, `dia_semana`, `hora_inicio`, `hora_fin`, `anio_escolar`) VALUES
(76, 7, 7, 107, 36, '1', '07:00:00', '08:00:00', '2025-2026'),
(77, 7, 7, 106, 41, '1', '08:00:00', '09:00:00', '2025-2026'),
(78, 7, 7, 104, 39, '1', '09:00:00', '10:00:00', '2025-2026'),
(79, 7, 7, 107, 36, '1', '10:00:00', '11:00:00', '2025-2026'),
(80, 7, 7, 102, 40, '1', '11:00:00', '12:00:00', '2025-2026'),
(81, 7, 7, 104, 39, '2', '07:00:00', '08:00:00', '2025-2026'),
(82, 7, 7, 108, 38, '2', '08:00:00', '09:00:00', '2025-2026'),
(83, 7, 7, 102, 40, '2', '09:00:00', '10:00:00', '2025-2026'),
(84, 7, 7, 103, 42, '2', '10:00:00', '11:00:00', '2025-2026'),
(85, 7, 7, 107, 36, '2', '11:00:00', '12:00:00', '2025-2026'),
(86, 7, 7, 103, 42, '3', '07:00:00', '10:00:00', '2025-2026'),
(87, 7, 7, 100, 42, '3', '10:00:00', '11:00:00', '2025-2026'),
(88, 7, 7, 100, 42, '3', '11:00:00', '12:00:00', '2025-2026'),
(89, 7, 7, 102, 40, '4', '07:00:00', '08:00:00', '2025-2026'),
(90, 7, 7, 102, 40, '4', '08:00:00', '10:00:00', '2025-2026'),
(91, 7, 7, 108, 38, '4', '10:00:00', '12:00:00', '2025-2026'),
(92, 7, 7, 108, 38, '5', '07:00:00', '08:00:00', '2025-2026'),
(93, 7, 7, 106, 41, '5', '08:00:00', '09:00:00', '2025-2026'),
(94, 7, 7, 103, 42, '5', '09:00:00', '10:00:00', '2025-2026'),
(95, 7, 7, 102, 40, '5', '10:00:00', '12:00:00', '2025-2026'),
(96, 1, 5, 113, 47, '1', '07:00:00', '08:00:00', '2025-2026'),
(97, 1, 5, 114, 47, '1', '08:00:00', '09:00:00', '2025-2026'),
(98, 1, 5, 112, 47, '1', '09:00:00', '10:00:00', '2025-2026'),
(99, 1, 5, 111, 47, '1', '10:00:00', '11:00:00', '2025-2026'),
(100, 1, 5, 116, 47, '1', '11:00:00', '12:00:00', '2025-2026');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones`
--

CREATE TABLE `inscripciones` (
  `id_inscripcion` int(11) NOT NULL,
  `id_estudiante` int(11) DEFAULT NULL,
  `id_representante` int(11) DEFAULT NULL,
  `anio_escolar` varchar(20) DEFAULT NULL,
  `grado` int(50) DEFAULT NULL,
  `fecha_inscripcion` varchar(50) DEFAULT NULL,
  `responsable_pago` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inscripciones`
--

INSERT INTO `inscripciones` (`id_inscripcion`, `id_estudiante`, `id_representante`, `anio_escolar`, `grado`, `fecha_inscripcion`, `responsable_pago`) VALUES
(1, 1, 1, '2025-2026', 7, '29-07-2025', 1),
(2, 1, 2, '2025-2026', 7, '29-07-2025', 1),
(3, 2, 3, '2025-2026', 7, '29-07-2025', 3),
(4, 2, 4, '2025-2026', 7, '29-07-2025', 3),
(5, 3, 5, '2025-2026', 7, '29-07-2025', 5),
(6, 3, 6, '2025-2026', 7, '29-07-2025', 5),
(7, 4, 7, '2025-2026', 7, '29-07-2025', 7),
(8, 4, 8, '2025-2026', 7, '29-07-2025', 7),
(9, 5, 9, '2025-2026', 7, '29-07-2025', 9),
(10, 5, 10, '2025-2026', 7, '29-07-2025', 9),
(11, 6, 1, '2025-2026', 7, '29-07-2025', 1),
(12, 6, 2, '2025-2026', 7, '29-07-2025', 1),
(13, 7, 3, '2025-2026', 7, '29-07-2025', 3),
(14, 7, 4, '2025-2026', 7, '29-07-2025', 3),
(15, 8, 5, '2025-2026', 7, '29-07-2025', 5),
(16, 8, 6, '2025-2026', 7, '29-07-2025', 5),
(17, 9, 7, '2025-2026', 7, '29-07-2025', 7),
(18, 9, 8, '2025-2026', 7, '29-07-2025', 7),
(19, 10, 9, '2025-2026', 7, '29-07-2025', 9),
(20, 10, 10, '2025-2026', 7, '29-07-2025', 9),
(21, 11, 11, '2025-2026', 8, '29-07-2025', 1),
(22, 11, 12, '2025-2026', 8, '29-07-2025', 1),
(23, 12, 13, '2025-2026', 8, '29-07-2025', 3),
(24, 12, 14, '2025-2026', 8, '29-07-2025', 3),
(25, 13, 15, '2025-2026', 8, '29-07-2025', 5),
(26, 13, 1, '2025-2026', 8, '29-07-2025', 5),
(27, 14, 2, '2025-2026', 8, '29-07-2025', 7),
(28, 14, 3, '2025-2026', 8, '29-07-2025', 7),
(29, 15, 4, '2025-2026', 8, '29-07-2025', 9),
(30, 15, 5, '2025-2026', 8, '29-07-2025', 9),
(31, 16, 6, '2025-2026', 8, '29-07-2025', 1),
(32, 16, 7, '2025-2026', 8, '29-07-2025', 1),
(33, 17, 8, '2025-2026', 8, '29-07-2025', 3),
(34, 17, 9, '2025-2026', 8, '29-07-2025', 3),
(35, 18, 10, '2025-2026', 8, '29-07-2025', 5),
(36, 18, 11, '2025-2026', 8, '29-07-2025', 5),
(37, 19, 12, '2025-2026', 8, '29-07-2025', 7),
(38, 19, 13, '2025-2026', 8, '29-07-2025', 7),
(39, 20, 14, '2025-2026', 8, '29-07-2025', 9),
(40, 20, 15, '2025-2026', 8, '29-07-2025', 9),
(41, 21, 1, '2025-2026', 9, '29-07-2025', 1),
(42, 21, 2, '2025-2026', 9, '29-07-2025', 1),
(43, 22, 3, '2025-2026', 9, '29-07-2025', 3),
(44, 22, 4, '2025-2026', 9, '29-07-2025', 3),
(45, 23, 5, '2025-2026', 9, '29-07-2025', 5),
(46, 23, 6, '2025-2026', 9, '29-07-2025', 5),
(47, 24, 7, '2025-2026', 9, '29-07-2025', 7),
(48, 24, 8, '2025-2026', 9, '29-07-2025', 7),
(49, 25, 9, '2025-2026', 9, '29-07-2025', 9),
(50, 25, 10, '2025-2026', 9, '29-07-2025', 9),
(51, 26, 11, '2025-2026', 9, '29-07-2025', 1),
(52, 26, 12, '2025-2026', 9, '29-07-2025', 1),
(53, 27, 13, '2025-2026', 9, '29-07-2025', 3),
(54, 27, 14, '2025-2026', 9, '29-07-2025', 3),
(55, 28, 15, '2025-2026', 9, '29-07-2025', 5),
(56, 28, 1, '2025-2026', 9, '29-07-2025', 5),
(57, 29, 2, '2025-2026', 9, '29-07-2025', 7),
(58, 29, 3, '2025-2026', 9, '29-07-2025', 7),
(59, 30, 4, '2025-2026', 9, '29-07-2025', 9),
(60, 30, 5, '2025-2026', 9, '29-07-2025', 9),
(61, 31, 6, '2025-2026', 10, '29-07-2025', 1),
(62, 31, 7, '2025-2026', 10, '29-07-2025', 1),
(63, 32, 8, '2025-2026', 10, '29-07-2025', 3),
(64, 32, 9, '2025-2026', 10, '29-07-2025', 3),
(65, 33, 10, '2025-2026', 10, '29-07-2025', 5),
(66, 33, 11, '2025-2026', 10, '29-07-2025', 5),
(67, 34, 12, '2025-2026', 10, '29-07-2025', 7),
(68, 34, 13, '2025-2026', 10, '29-07-2025', 7),
(69, 35, 14, '2025-2026', 10, '29-07-2025', 9),
(70, 35, 15, '2025-2026', 10, '29-07-2025', 9),
(71, 36, 1, '2025-2026', 10, '29-07-2025', 1),
(72, 36, 2, '2025-2026', 10, '29-07-2025', 1),
(73, 37, 3, '2025-2026', 10, '29-07-2025', 3),
(74, 37, 4, '2025-2026', 10, '29-07-2025', 3),
(75, 38, 5, '2025-2026', 10, '29-07-2025', 5),
(76, 38, 6, '2025-2026', 10, '29-07-2025', 5),
(77, 39, 7, '2025-2026', 10, '29-07-2025', 7),
(78, 39, 8, '2025-2026', 10, '29-07-2025', 7),
(79, 40, 9, '2025-2026', 10, '29-07-2025', 9),
(80, 40, 10, '2025-2026', 10, '29-07-2025', 9),
(81, 41, 11, '2025-2026', 11, '29-07-2025', 1),
(82, 41, 12, '2025-2026', 11, '29-07-2025', 1),
(83, 42, 13, '2025-2026', 11, '29-07-2025', 3),
(84, 42, 14, '2025-2026', 11, '29-07-2025', 3),
(85, 43, 15, '2025-2026', 11, '29-07-2025', 5),
(86, 43, 1, '2025-2026', 11, '29-07-2025', 5),
(87, 44, 2, '2025-2026', 11, '29-07-2025', 7),
(88, 44, 3, '2025-2026', 11, '29-07-2025', 7),
(89, 45, 4, '2025-2026', 11, '29-07-2025', 9),
(90, 45, 5, '2025-2026', 11, '29-07-2025', 9),
(91, 46, 6, '2025-2026', 11, '29-07-2025', 1),
(92, 46, 7, '2025-2026', 11, '29-07-2025', 1),
(93, 47, 8, '2025-2026', 11, '29-07-2025', 3),
(94, 47, 9, '2025-2026', 11, '29-07-2025', 3),
(95, 48, 10, '2025-2026', 11, '29-07-2025', 5),
(96, 48, 11, '2025-2026', 11, '29-07-2025', 5),
(97, 49, 12, '2025-2026', 11, '29-07-2025', 7),
(98, 49, 13, '2025-2026', 11, '29-07-2025', 7),
(99, 50, 14, '2025-2026', 11, '29-07-2025', 9),
(100, 50, 15, '2025-2026', 11, '29-07-2025', 9),
(101, 51, 16, '2025-2026', 1, '29-07-2025', 11),
(102, 51, 17, '2025-2026', 1, '29-07-2025', 11),
(103, 52, 18, '2025-2026', 1, '29-07-2025', 12),
(104, 52, 19, '2025-2026', 1, '29-07-2025', 12),
(105, 53, 20, '2025-2026', 1, '29-07-2025', 13),
(106, 53, 21, '2025-2026', 1, '29-07-2025', 13),
(107, 54, 22, '2025-2026', 1, '29-07-2025', 14),
(108, 54, 23, '2025-2026', 1, '29-07-2025', 14),
(109, 55, 24, '2025-2026', 1, '29-07-2025', 15),
(110, 55, 25, '2025-2026', 1, '29-07-2025', 15),
(111, 56, 16, '2025-2026', 1, '29-07-2025', 11),
(112, 56, 17, '2025-2026', 1, '29-07-2025', 11),
(113, 57, 18, '2025-2026', 1, '29-07-2025', 12),
(114, 57, 19, '2025-2026', 1, '29-07-2025', 12),
(115, 58, 20, '2025-2026', 1, '29-07-2025', 13),
(116, 58, 21, '2025-2026', 1, '29-07-2025', 13),
(117, 59, 22, '2025-2026', 1, '29-07-2025', 14),
(118, 59, 23, '2025-2026', 1, '29-07-2025', 14),
(119, 60, 24, '2025-2026', 1, '29-07-2025', 15),
(120, 60, 25, '2025-2026', 1, '29-07-2025', 15),
(121, 61, 16, '2025-2026', 2, '29-07-2025', 11),
(122, 61, 17, '2025-2026', 2, '29-07-2025', 11),
(123, 62, 18, '2025-2026', 2, '29-07-2025', 12),
(124, 62, 19, '2025-2026', 2, '29-07-2025', 12),
(125, 63, 20, '2025-2026', 2, '29-07-2025', 13),
(126, 63, 21, '2025-2026', 2, '29-07-2025', 13),
(127, 64, 22, '2025-2026', 2, '29-07-2025', 14),
(128, 64, 23, '2025-2026', 2, '29-07-2025', 14),
(129, 65, 24, '2025-2026', 2, '29-07-2025', 15),
(130, 65, 25, '2025-2026', 2, '29-07-2025', 15),
(131, 66, 16, '2025-2026', 2, '29-07-2025', 11),
(132, 66, 17, '2025-2026', 2, '29-07-2025', 11),
(133, 67, 18, '2025-2026', 2, '29-07-2025', 12),
(134, 67, 19, '2025-2026', 2, '29-07-2025', 12),
(135, 68, 20, '2025-2026', 2, '29-07-2025', 13),
(136, 68, 21, '2025-2026', 2, '29-07-2025', 13),
(137, 69, 22, '2025-2026', 2, '29-07-2025', 14),
(138, 69, 23, '2025-2026', 2, '29-07-2025', 14),
(139, 70, 24, '2025-2026', 2, '29-07-2025', 15),
(140, 70, 25, '2025-2026', 2, '29-07-2025', 15),
(141, 71, 16, '2025-2026', 3, '29-07-2025', 11),
(142, 71, 17, '2025-2026', 3, '29-07-2025', 11),
(143, 72, 18, '2025-2026', 3, '29-07-2025', 12),
(144, 72, 19, '2025-2026', 3, '29-07-2025', 12),
(145, 73, 20, '2025-2026', 3, '29-07-2025', 13),
(146, 73, 21, '2025-2026', 3, '29-07-2025', 13),
(147, 74, 22, '2025-2026', 3, '29-07-2025', 14),
(148, 74, 23, '2025-2026', 3, '29-07-2025', 14),
(149, 75, 24, '2025-2026', 3, '29-07-2025', 15),
(150, 75, 25, '2025-2026', 3, '29-07-2025', 15),
(151, 76, 16, '2025-2026', 3, '29-07-2025', 11),
(152, 76, 17, '2025-2026', 3, '29-07-2025', 11),
(153, 77, 18, '2025-2026', 3, '29-07-2025', 12),
(154, 77, 19, '2025-2026', 3, '29-07-2025', 12),
(155, 78, 20, '2025-2026', 3, '29-07-2025', 13),
(156, 78, 21, '2025-2026', 3, '29-07-2025', 13),
(157, 79, 22, '2025-2026', 3, '29-07-2025', 14),
(158, 79, 23, '2025-2026', 3, '29-07-2025', 14),
(159, 80, 24, '2025-2026', 3, '29-07-2025', 15),
(160, 80, 25, '2025-2026', 3, '29-07-2025', 15),
(161, 81, 16, '2025-2026', 4, '29-07-2025', 11),
(162, 81, 17, '2025-2026', 4, '29-07-2025', 11),
(163, 82, 18, '2025-2026', 4, '29-07-2025', 12),
(164, 82, 19, '2025-2026', 4, '29-07-2025', 12),
(165, 83, 20, '2025-2026', 4, '29-07-2025', 13),
(166, 83, 21, '2025-2026', 4, '29-07-2025', 13),
(167, 84, 22, '2025-2026', 4, '29-07-2025', 14),
(168, 84, 23, '2025-2026', 4, '29-07-2025', 14),
(169, 85, 24, '2025-2026', 4, '29-07-2025', 15),
(170, 85, 25, '2025-2026', 4, '29-07-2025', 15),
(171, 86, 16, '2025-2026', 4, '29-07-2025', 11),
(172, 86, 17, '2025-2026', 4, '29-07-2025', 11),
(173, 87, 18, '2025-2026', 4, '29-07-2025', 12),
(174, 87, 19, '2025-2026', 4, '29-07-2025', 12),
(175, 88, 20, '2025-2026', 4, '29-07-2025', 13),
(176, 88, 21, '2025-2026', 4, '29-07-2025', 13),
(177, 89, 22, '2025-2026', 4, '29-07-2025', 14),
(178, 89, 23, '2025-2026', 4, '29-07-2025', 14),
(179, 90, 24, '2025-2026', 4, '29-07-2025', 15),
(180, 90, 25, '2025-2026', 4, '29-07-2025', 15),
(181, 91, 16, '2025-2026', 5, '29-07-2025', 11),
(182, 91, 17, '2025-2026', 5, '29-07-2025', 11),
(183, 92, 18, '2025-2026', 5, '29-07-2025', 12),
(184, 92, 19, '2025-2026', 5, '29-07-2025', 12),
(185, 93, 20, '2025-2026', 5, '29-07-2025', 13),
(186, 93, 21, '2025-2026', 5, '29-07-2025', 13),
(187, 94, 22, '2025-2026', 5, '29-07-2025', 14),
(188, 94, 23, '2025-2026', 5, '29-07-2025', 14),
(189, 95, 24, '2025-2026', 5, '29-07-2025', 15),
(190, 95, 25, '2025-2026', 5, '29-07-2025', 15),
(191, 96, 16, '2025-2026', 5, '29-07-2025', 11),
(192, 96, 17, '2025-2026', 5, '29-07-2025', 11),
(193, 97, 18, '2025-2026', 5, '29-07-2025', 12),
(194, 97, 19, '2025-2026', 5, '29-07-2025', 12),
(195, 98, 20, '2025-2026', 5, '29-07-2025', 13),
(196, 98, 21, '2025-2026', 5, '29-07-2025', 13),
(197, 99, 22, '2025-2026', 5, '29-07-2025', 14),
(198, 99, 23, '2025-2026', 5, '29-07-2025', 14),
(199, 100, 24, '2025-2026', 5, '29-07-2025', 15),
(200, 100, 25, '2025-2026', 5, '29-07-2025', 15),
(201, 101, 16, '2025-2026', 6, '29-07-2025', 11),
(202, 101, 17, '2025-2026', 6, '29-07-2025', 11),
(203, 102, 18, '2025-2026', 6, '29-07-2025', 12),
(204, 102, 19, '2025-2026', 6, '29-07-2025', 12),
(205, 103, 20, '2025-2026', 6, '29-07-2025', 13),
(206, 103, 21, '2025-2026', 6, '29-07-2025', 13),
(207, 104, 22, '2025-2026', 6, '29-07-2025', 14),
(208, 104, 23, '2025-2026', 6, '29-07-2025', 14),
(209, 105, 24, '2025-2026', 6, '29-07-2025', 15),
(210, 105, 25, '2025-2026', 6, '29-07-2025', 15),
(211, 106, 16, '2025-2026', 6, '29-07-2025', 11),
(212, 106, 17, '2025-2026', 6, '29-07-2025', 11),
(213, 107, 18, '2025-2026', 6, '29-07-2025', 12),
(214, 107, 19, '2025-2026', 6, '29-07-2025', 12),
(215, 108, 20, '2025-2026', 6, '29-07-2025', 13),
(216, 108, 21, '2025-2026', 6, '29-07-2025', 13),
(217, 109, 22, '2025-2026', 6, '29-07-2025', 14),
(218, 109, 23, '2025-2026', 6, '29-07-2025', 14),
(219, 110, 24, '2025-2026', 6, '29-07-2025', 15),
(220, 110, 25, '2025-2026', 6, '29-07-2025', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id_materia` int(11) NOT NULL,
  `nivel_materia` text NOT NULL,
  `nombre` varchar(35) NOT NULL,
  `id_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id_materia`, `nivel_materia`, `nombre`, `id_estado`) VALUES
(99, 'Secundaria', 'CASTELLANO Y LITERATURA', 2),
(100, 'Secundaria', 'INGLÉS', 2),
(101, 'Secundaria', 'MATEMÁTICA', 2),
(102, 'Secundaria', 'ESTUDIOS DE LA NATURALEZA', 2),
(103, 'Secundaria', 'HISTORIA DE VENEZUELA', 2),
(104, 'Secundaria', 'EDUCACIÓN FAMILIAR Y CIUDADANA', 2),
(105, 'Secundaria', 'GEOGRAFIA GENERAL', 2),
(106, 'Secundaria', 'EDUCACIÓN ARTÍSTICA', 2),
(107, 'Secundaria', 'EDUCACIÓN FÍSICA Y DEPORTE', 2),
(108, 'Secundaria', 'EDUCACIÓN PARA EL TRABAJO', 2),
(111, 'Primaria', 'AREA LENGUAJE', 2),
(112, 'Primaria', 'AREA SOCIALES', 2),
(113, 'Primaria', 'AREA DEPORTES', 2),
(114, 'Primaria', 'ACTIVIDAD COMPLEMENTARIA EN AULA', 2),
(115, 'Primaria', 'INDICADORES GENERALES', 2),
(116, 'Primaria', 'MANUALIDADES', 2),
(119, 'Secundaria', 'ASIGNATURA PRUEBA', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias_pendientes`
--

CREATE TABLE `materias_pendientes` (
  `id` int(12) NOT NULL,
  `id_estudiante` int(8) NOT NULL,
  `id_materia` int(5) NOT NULL,
  `id_grado` int(5) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `anio_escolar` varchar(20) NOT NULL,
  `promedio_final` decimal(5,2) NOT NULL,
  `estado` enum('pendiente','recuperada','repetida') NOT NULL DEFAULT 'pendiente',
  `fecha_registro` varchar(15) NOT NULL DEFAULT current_timestamp(),
  `fecha_actualizacion` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `id_profesor` int(11) NOT NULL,
  `cedula` varchar(12) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `nivel_grado` text NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `estado` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id_profesor`, `cedula`, `nombre`, `nivel_grado`, `telefono`, `estado`) VALUES
(36, 'V12345678', 'Leon López', 'Secundaria', '04121256666', 2),
(37, 'V14589321', 'Sofia Sarate', 'Secundaria', '04142563212', 2),
(38, 'V258965111', 'Manual Casas', 'Secundaria', '04242563310', 2),
(39, 'V25896110', 'Laura Mendoza', 'Secundaria', '04161145211', 2),
(40, 'V25614521', 'Miranda Ladino', 'Secundaria', '04241212155', 2),
(41, 'V87954122', 'José Quero', 'Secundaria', '04241212111', 2),
(42, 'V14521364', 'Yovana Salas', 'Secundaria', '04241111111', 2),
(43, 'V6998211', 'Gio Ledezma', 'Secundaria', '04121212111', 2),
(45, 'V142563210', 'Cecilia Miraflores', 'Primaria', '04121425632', 1),
(46, 'V14265211', 'Merino Manuel', 'Primaria', '04141725632', 2),
(47, 'V15226331', 'Yhoiber Leon', 'Primaria', '04241425632', 2),
(48, 'V1452424', 'Alejandro Marquina', 'Primaria', '04141255631', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor_grado`
--

CREATE TABLE `profesor_grado` (
  `id` int(11) NOT NULL,
  `id_profesor` int(8) NOT NULL,
  `id_grado` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `profesor_grado`
--

INSERT INTO `profesor_grado` (`id`, `id_profesor`, `id_grado`) VALUES
(70, 43, 7),
(71, 41, 7),
(72, 39, 7),
(73, 36, 7),
(74, 38, 7),
(75, 40, 7),
(76, 37, 7),
(77, 42, 7),
(78, 47, 1),
(79, 46, 1),
(80, 48, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor_materia_grado`
--

CREATE TABLE `profesor_materia_grado` (
  `id` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `id_grado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `profesor_materia_grado`
--

INSERT INTO `profesor_materia_grado` (`id`, `id_profesor`, `id_materia`, `id_grado`) VALUES
(13, 36, 107, 7),
(16, 37, 105, 7),
(14, 38, 108, 7),
(12, 39, 104, 7),
(15, 40, 102, 7),
(11, 41, 106, 7),
(18, 42, 100, 7),
(19, 42, 101, 7),
(17, 42, 103, 7),
(10, 43, 99, 7),
(27, 43, 119, 7),
(22, 47, 111, 1),
(23, 47, 112, 1),
(21, 47, 113, 1),
(20, 47, 114, 1),
(24, 47, 115, 1),
(25, 47, 116, 1),
(28, 48, 116, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `representantes`
--

CREATE TABLE `representantes` (
  `id` int(5) NOT NULL,
  `cedula` varchar(15) DEFAULT NULL,
  `parentesco` varchar(25) NOT NULL,
  `nombres` text DEFAULT NULL,
  `apellidos` text DEFAULT NULL,
  `fecha_nac` varchar(20) DEFAULT NULL,
  `correo` varchar(30) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `nro_telefono` varchar(20) DEFAULT NULL,
  `grado_inst` varchar(20) DEFAULT NULL,
  `profesion` varchar(20) DEFAULT NULL,
  `trabaja` text DEFAULT NULL,
  `nombre_empr` varchar(50) DEFAULT NULL,
  `telefono_empr` varchar(20) DEFAULT NULL,
  `direccion_empr` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `representantes`
--

INSERT INTO `representantes` (`id`, `cedula`, `parentesco`, `nombres`, `apellidos`, `fecha_nac`, `correo`, `direccion`, `nro_telefono`, `grado_inst`, `profesion`, `trabaja`, `nombre_empr`, `telefono_empr`, `direccion_empr`) VALUES
(1, 'V12345678', 'madre', 'María', 'González', '26/02/1999', 'maria.gonzalez@email.com', 'Av. Principal #123', '04141234567', 'Universitario', 'Ingeniero', 'Sí', 'Tech Solutions', '04245551231', 'Zona Industrial'),
(2, 'V23456789', 'padre', 'Carlos', 'Pérez', '26/02/1999', 'carlos.perez@email.com', 'Calle 2 #45-67', '04142345678', 'Universitario', 'Médico', 'Sí', 'Hospital Central', '04245551231', 'Centro Médico'),
(3, 'V34567890', 'madre', 'Ana', 'Rodríguez', '12/08/1991', 'ana.rodriguez@email.com', 'Urbanización Las Flores', '04143456789', 'Técnico Superior', 'Docente', 'Sí', 'Escuela Básica', '04248895511', 'Sector Educativo'),
(4, 'V45678901', 'padre', 'Luis', 'Martínez', '12/08/1991', 'luis.martinez@email.com', 'Residencias El Paraíso', '04144567890', 'Universitario', 'Abogado', 'Sí', 'Bufete Legal', '04248895511', 'Centro Ciudad'),
(5, 'V56789012', 'madre', 'Patricia', 'López', '12/08/1991', 'patricia.lopez@email.com', 'Calle 5 #12-34', '04145678901', 'Bachiller', 'Comerciante', 'Sí', 'Tienda Patricia', '04126695511', 'Local Comercial'),
(6, 'V67890123', 'padre', 'Jorge', 'Hernández', '10/02/1986', 'jorge.hernandez@email.com', 'Av. Bolívar #78', '04146789012', 'Técnico Medio', 'Mecánico', 'Sí', 'Taller Automotriz', '04126695511', 'Zona Industrial'),
(7, 'V78901234', 'madre', 'Carmen', 'Díaz', '10/02/1986', 'carmen.diaz@email.com', 'Urbanización Los Pinos', '04147890123', 'Universitario', 'Arquitecto', 'Sí', 'Constructora Díaz', '04126695511', 'Oficina Central'),
(8, 'V89012345', 'padre', 'Pedro', 'García', '10/02/1986', 'pedro.garcia@email.com', 'Calle 8 #23-45', '04148901234', 'Universitario', 'Ingeniero', 'Sí', 'Empresa Tecnológica', '04261485241', 'Parque Tecnológico'),
(9, 'V90123456', 'madre', 'Laura', 'Fernández', '21/05/1994', 'laura.fernandez@email.com', 'Residencias El Recreo', '04149012345', 'Técnico Superior', 'Enfermera', 'Sí', 'Clínica Santa María', '04261485241', 'Sector Salud'),
(10, 'V01234567', 'padre', 'Ricardo', 'Sánchez', '21/05/1994', 'ricardo.sanchez@email.com', 'Av. Libertador #56', '04140123456', 'Universitario', 'Economista', 'Sí', 'Banco Nacional', '04165219854', 'Centro Financiero'),
(11, 'V11223344', 'madre', 'Isabel', 'Ramírez', '21/05/1994', 'isabel.ramirez@email.com', 'Calle 10 #11-12', '04141122334', 'Universitario', 'Psicólogo', 'Sí', 'Consultorio Psicológico', '04165219854', 'Centro Ciudad'),
(12, 'V22334455', 'padre', 'Fernando', 'Torres', '17/06/1993', 'fernando.torres@email.com', 'Urbanización Brisas', '04142233445', 'Técnico Superior', 'Electricista', 'Sí', 'Servicios Eléctricos', '04165219854', 'Zona Industrial'),
(13, 'V33445566', 'madre', 'Gabriela', 'Mendoza', '17/06/1993', 'gabriela.mendoza@email.com', 'Av. Principal #200', '04143344556', 'Bachiller', 'Ama de Casa', 'No', NULL, NULL, NULL),
(14, 'V44556677', 'padre', 'Roberto', 'Vargas', '17/06/1993', 'roberto.vargas@email.com', 'Calle 15 #33-44', '04144455667', 'Universitario', 'Contador', 'Sí', 'Auditoría Vargas', '04126938541', 'Centro Financiero'),
(15, 'V55667788', 'madre', 'Sofía', 'Castro', '17/06/1993', 'sofia.castro@email.com', 'Residencias Altamira', '04145566778', 'Universitario', 'Diseñador Gráfico', 'Sí', 'Agencia Creativa', '04241115268', 'Zona Creativa'),
(16, 'V12121212', 'madre', 'Rosa', 'Blanco', '01/07/1965', 'rosa.blanco@email.com', 'Av. Las Acacias #45', '04141212121', 'Universitario', 'Psicólogo', 'Si', 'Centro Psicológico', '04145214521', 'Centro Ciudad'),
(17, 'V13131313', 'padre', 'Alberto', 'Morales', '02/09/1986', 'alberto.morales@email.com', 'Calle 13 #13-13', '04141313131', 'Técnico Superior', 'Electricista', 'Si', 'ElectroSol', '04248965213', 'Zona Industrial'),
(18, 'V14141414', 'madre', 'Gladys', 'Rivas', '01/09/1991', 'gladys.rivas@email.com', 'Urbanización Los Mangos', '04141414141', 'Bachiller', 'Ama de Casa', 'No', NULL, NULL, NULL),
(19, 'V15151515', 'padre', 'Francisco', 'Gómez', '04/06/1985', 'francisco.gomez@email.com', 'Av. Intercomunal #78', '04141515151', 'Universitario', 'Contador', 'Si', 'Auditoría Gómez', '04248541451', 'Centro Financiero'),
(20, 'V16161616', 'madre', 'Beatriz', 'Suárez', '05/12/1978', 'beatriz.suarez@email.com', 'Residencias El Bosque', '04141616161', 'Universitario', 'Diseñador', 'Si', 'Creativos SA', '04268214511', 'Zona Creativa'),
(21, 'V17171717', 'padre', 'Oswaldo', 'Paredes', '04/07/1992', 'oswaldo.paredes@email.com', 'Calle 17 #17-17', '04141717171', 'Técnico Medio', 'Mecánico', 'Si', 'Taller Paredes', '04125241254', 'Zona Industrial'),
(22, 'V18181818', 'madre', 'Teresa', 'Quintero', '08/08/1995', 'teresa.quintero@email.com', 'Urbanización Los Robles', '04141818181', 'Universitario', 'Enfermera', 'Si', 'Clínica San José', '04167452145', 'Sector Salud'),
(23, 'V19191919', 'padre', 'Gregorio', 'Mendoza', '04/06/1999', 'gregorio.mendoza@email.com', 'Av. Bolívar #191', '04141919191', 'Universitario', 'Ingeniero', 'Si', 'Ingeniería Mendoza', '04245558411', 'Parque Industrial'),
(24, 'V20202020', 'madre', 'Luisa', 'Campos', '15/12/1988', 'luisa.campos@email.com', 'Calle 20 #20-20', '04142020202', 'Técnico Superior', 'Docente', 'Si', 'Escuela Básica', '04242020201', 'Sector Educativo'),
(25, 'V21212121', 'padre', 'Humberto', 'Núñez', '12/12/1995', 'humberto.nunez@email.com', 'Residencias El Jardín', '04142121212', 'Universitario', 'Abogado', 'Si', 'Bufete Núñez', '0412212121', 'Centro Ciudad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `cedula` varchar(50) NOT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `cedula`, `nombres`, `correo`, `telefono`, `contrasena`, `id_rol`, `id_estado`) VALUES
(1, 'V123456740', 'Alejandro Marquina', 'josemarq656@gmail.com', '04262918818', 'Prueba12.', 1, 2),
(9, 'V1233325', 'Michelle Mendoza', 'Jsemarq25@gmail.com', '04124334925', '1as21SA21A.', 2, 1),
(22, 'V1256324', 'Sofia Vergara', 'sofia145@gmail.com', '04121522412', 'ASkslas20.', 2, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id_actividad`),
  ADD KEY `id_grado` (`id_grado`),
  ADD KEY `id_profesor` (`id_profesor`),
  ADD KEY `id_estado` (`id_estado`),
  ADD KEY `id_materia` (`id_materia`);

--
-- Indices de la tabla `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`id_aula`),
  ADD KEY `id_grado` (`id_grado`),
  ADD KEY `estado` (`estado`);

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_grado` (`id_grado`,`id_profesor`,`id_materia`,`id_estudiante`),
  ADD KEY `actividad` (`actividad`),
  ADD KEY `id_estudiante` (`id_estudiante`),
  ADD KEY `id_profesor` (`id_profesor`),
  ADD KEY `id_materia` (`id_materia`);

--
-- Indices de la tabla `contacto_pago`
--
ALTER TABLE `contacto_pago`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grado_est` (`grado_est`);

--
-- Indices de la tabla `grados`
--
ALTER TABLE `grados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grado_materia`
--
ALTER TABLE `grado_materia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_grado` (`id_grado`),
  ADD KEY `id_materia` (`id_materia`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id_horario`),
  ADD KEY `id_grado` (`id_grado`),
  ADD KEY `id_aula` (`id_aula`),
  ADD KEY `id_materia` (`id_materia`),
  ADD KEY `id_profesor` (`id_profesor`);

--
-- Indices de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD PRIMARY KEY (`id_inscripcion`),
  ADD KEY `id_estudiante` (`id_estudiante`),
  ADD KEY `id_representante` (`id_representante`),
  ADD KEY `grado` (`grado`),
  ADD KEY `responsable_pago` (`responsable_pago`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id_materia`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `materias_pendientes`
--
ALTER TABLE `materias_pendientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_estudiante` (`id_estudiante`),
  ADD KEY `id_materia` (`id_materia`),
  ADD KEY `id_grado` (`id_grado`),
  ADD KEY `id_profesor` (`id_profesor`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`id_profesor`),
  ADD KEY `estado` (`estado`);

--
-- Indices de la tabla `profesor_grado`
--
ALTER TABLE `profesor_grado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_profesor` (`id_profesor`),
  ADD KEY `id_grado` (`id_grado`);

--
-- Indices de la tabla `profesor_materia_grado`
--
ALTER TABLE `profesor_materia_grado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_profesor` (`id_profesor`,`id_materia`,`id_grado`),
  ADD KEY `id_grado` (`id_grado`),
  ADD KEY `id_materia` (`id_materia`);

--
-- Indices de la tabla `representantes`
--
ALTER TABLE `representantes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_estado` (`id_estado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id_actividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `aulas`
--
ALTER TABLE `aulas`
  MODIFY `id_aula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1160;

--
-- AUTO_INCREMENT de la tabla `contacto_pago`
--
ALTER TABLE `contacto_pago`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT de la tabla `grados`
--
ALTER TABLE `grados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `grado_materia`
--
ALTER TABLE `grado_materia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  MODIFY `id_inscripcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT de la tabla `materias_pendientes`
--
ALTER TABLE `materias_pendientes`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id_profesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `profesor_grado`
--
ALTER TABLE `profesor_grado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT de la tabla `profesor_materia_grado`
--
ALTER TABLE `profesor_materia_grado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `representantes`
--
ALTER TABLE `representantes`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD CONSTRAINT `actividades_ibfk_2` FOREIGN KEY (`id_grado`) REFERENCES `grados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `actividades_ibfk_3` FOREIGN KEY (`id_profesor`) REFERENCES `profesores` (`id_profesor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `actividades_ibfk_4` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `actividades_ibfk_5` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `aulas`
--
ALTER TABLE `aulas`
  ADD CONSTRAINT `aulas_ibfk_1` FOREIGN KEY (`id_grado`) REFERENCES `grados` (`id`),
  ADD CONSTRAINT `aulas_ibfk_2` FOREIGN KEY (`estado`) REFERENCES `estado` (`id_estado`);

--
-- Filtros para la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `calificaciones_ibfk_1` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiantes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `calificaciones_ibfk_2` FOREIGN KEY (`actividad`) REFERENCES `actividades` (`id_actividad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `calificaciones_ibfk_3` FOREIGN KEY (`id_grado`) REFERENCES `grados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `calificaciones_ibfk_4` FOREIGN KEY (`id_profesor`) REFERENCES `profesores` (`id_profesor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `calificaciones_ibfk_5` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `estudiantes_ibfk_1` FOREIGN KEY (`grado_est`) REFERENCES `grados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `grado_materia`
--
ALTER TABLE `grado_materia`
  ADD CONSTRAINT `grado_materia_ibfk_1` FOREIGN KEY (`id_grado`) REFERENCES `grados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grado_materia_ibfk_2` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `horarios_ibfk_1` FOREIGN KEY (`id_grado`) REFERENCES `grados` (`id`),
  ADD CONSTRAINT `horarios_ibfk_2` FOREIGN KEY (`id_aula`) REFERENCES `aulas` (`id_aula`),
  ADD CONSTRAINT `horarios_ibfk_3` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`),
  ADD CONSTRAINT `horarios_ibfk_4` FOREIGN KEY (`id_profesor`) REFERENCES `profesores` (`id_profesor`);

--
-- Filtros para la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD CONSTRAINT `inscripciones_ibfk_1` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiantes` (`id`),
  ADD CONSTRAINT `inscripciones_ibfk_2` FOREIGN KEY (`id_representante`) REFERENCES `representantes` (`id`),
  ADD CONSTRAINT `inscripciones_ibfk_3` FOREIGN KEY (`responsable_pago`) REFERENCES `contacto_pago` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inscripciones_ibfk_4` FOREIGN KEY (`grado`) REFERENCES `grados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `materias`
--
ALTER TABLE `materias`
  ADD CONSTRAINT `materias_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `materias_pendientes`
--
ALTER TABLE `materias_pendientes`
  ADD CONSTRAINT `materias_pendientes_ibfk_1` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiantes` (`id`),
  ADD CONSTRAINT `materias_pendientes_ibfk_2` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`),
  ADD CONSTRAINT `materias_pendientes_ibfk_3` FOREIGN KEY (`id_grado`) REFERENCES `grados` (`id`),
  ADD CONSTRAINT `materias_pendientes_ibfk_4` FOREIGN KEY (`id_profesor`) REFERENCES `profesores` (`id_profesor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD CONSTRAINT `profesores_ibfk_1` FOREIGN KEY (`estado`) REFERENCES `estado` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `profesor_grado`
--
ALTER TABLE `profesor_grado`
  ADD CONSTRAINT `profesor_grado_ibfk_1` FOREIGN KEY (`id_profesor`) REFERENCES `profesores` (`id_profesor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `profesor_grado_ibfk_2` FOREIGN KEY (`id_grado`) REFERENCES `grados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `profesor_materia_grado`
--
ALTER TABLE `profesor_materia_grado`
  ADD CONSTRAINT `profesor_materia_grado_ibfk_1` FOREIGN KEY (`id_grado`) REFERENCES `grados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `profesor_materia_grado_ibfk_2` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `profesor_materia_grado_ibfk_3` FOREIGN KEY (`id_profesor`) REFERENCES `profesores` (`id_profesor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
