-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-07-2025 a las 03:19:55
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
(30, '2025-2026', 'Contenidos', 'Realiza actividad escrita de la letra Aa hasta la Hh.', 111, 1, 47, 2),
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
  `ubicacion` varchar(100) NOT NULL,
  `id_grado` int(11) NOT NULL,
  `anio_escolar` varchar(20) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(553, '2025-2026', 7, '1er Lapso', 43, 99, 5, '15', NULL, NULL, 15.00),
(554, '2025-2026', 7, '1er Lapso', 43, 99, 7, '12', NULL, NULL, 12.00),
(555, '2025-2026', 7, '1er Lapso', 43, 99, 9, '15.5', NULL, NULL, 15.50),
(556, '2025-2026', 7, '2do Lapso', 43, 99, 5, '15', NULL, NULL, 15.50),
(557, '2025-2026', 7, '2do Lapso', 43, 99, 5, '16', NULL, NULL, 15.50),
(558, '2025-2026', 7, '2do Lapso', 43, 99, 7, '5', NULL, NULL, 3.50),
(559, '2025-2026', 7, '2do Lapso', 43, 99, 7, '2', NULL, NULL, 3.50),
(560, '2025-2026', 7, '2do Lapso', 43, 99, 9, '15.5', NULL, NULL, 15.50),
(561, '2025-2026', 7, '2do Lapso', 43, 99, 9, '15.5', NULL, NULL, 15.50),
(562, '2025-2026', 7, '3er Lapso', 43, 99, 5, '15', NULL, NULL, 14.33),
(563, '2025-2026', 7, '3er Lapso', 43, 99, 5, '12', NULL, NULL, 14.33),
(564, '2025-2026', 7, '3er Lapso', 43, 99, 5, '16', NULL, NULL, 14.33),
(565, '2025-2026', 7, '3er Lapso', 43, 99, 7, '5', NULL, NULL, 7.00),
(566, '2025-2026', 7, '3er Lapso', 43, 99, 7, '10', NULL, NULL, 7.00),
(567, '2025-2026', 7, '3er Lapso', 43, 99, 7, '6', NULL, NULL, 7.00),
(568, '2025-2026', 7, '3er Lapso', 43, 99, 9, '15.5', NULL, NULL, 15.50),
(569, '2025-2026', 7, '3er Lapso', 43, 99, 9, '15.5', NULL, NULL, 15.50),
(570, '2025-2026', 7, '3er Lapso', 43, 99, 9, '15.5', NULL, NULL, 15.50),
(571, '2025-2026', 7, '1er Lapso', 41, 106, 5, '15', NULL, NULL, 15.00),
(572, '2025-2026', 7, '1er Lapso', 41, 106, 7, '13.5', NULL, NULL, 13.50),
(573, '2025-2026', 7, '1er Lapso', 41, 106, 9, '13', NULL, NULL, 13.00),
(574, '2025-2026', 7, '2do Lapso', 41, 106, 5, '12', NULL, NULL, 8.50),
(575, '2025-2026', 7, '2do Lapso', 41, 106, 5, '5', NULL, NULL, 8.50),
(576, '2025-2026', 7, '2do Lapso', 41, 106, 7, '13.5', NULL, NULL, 13.50),
(577, '2025-2026', 7, '2do Lapso', 41, 106, 7, '13.5', NULL, NULL, 13.50),
(578, '2025-2026', 7, '2do Lapso', 41, 106, 9, '5', NULL, NULL, 5.50),
(579, '2025-2026', 7, '2do Lapso', 41, 106, 9, '6', NULL, NULL, 5.50),
(580, '2025-2026', 7, '3er Lapso', 41, 106, 5, '12', NULL, NULL, 12.33),
(581, '2025-2026', 7, '3er Lapso', 41, 106, 5, '15', NULL, NULL, 12.33),
(582, '2025-2026', 7, '3er Lapso', 41, 106, 5, '10', NULL, NULL, 12.33),
(583, '2025-2026', 7, '3er Lapso', 41, 106, 7, '13.5', NULL, NULL, 13.50),
(584, '2025-2026', 7, '3er Lapso', 41, 106, 7, '13.5', NULL, NULL, 13.50),
(585, '2025-2026', 7, '3er Lapso', 41, 106, 7, '13.5', NULL, NULL, 13.50),
(586, '2025-2026', 7, '3er Lapso', 41, 106, 9, '7', NULL, NULL, 6.00),
(587, '2025-2026', 7, '3er Lapso', 41, 106, 9, '5', NULL, NULL, 6.00),
(588, '2025-2026', 7, '3er Lapso', 41, 106, 9, '6', NULL, NULL, 6.00),
(594, '2025-2026', 1, 'Lapso Único', 47, 111, 1, 'EX', 30, 'Contenidos', NULL),
(595, '2025-2026', 1, 'Lapso Único', 47, 111, 2, 'EX', 30, 'Contenidos', NULL),
(596, '2025-2026', 1, 'Lapso Único', 47, 111, 3, 'EX', 30, 'Contenidos', NULL),
(597, '2025-2026', 1, 'Lapso Único', 47, 111, 4, 'MB', 30, 'Contenidos', NULL),
(598, '2025-2026', 1, 'Lapso Único', 47, 111, 8, 'MB', 30, 'Contenidos', NULL),
(599, '2025-2026', 1, 'Lapso Único', 47, 111, 1, 'EX', 32, 'Contenidos', NULL),
(600, '2025-2026', 1, 'Lapso Único', 47, 111, 2, 'EX', 32, 'Contenidos', NULL),
(601, '2025-2026', 1, 'Lapso Único', 47, 111, 3, 'EX', 32, 'Contenidos', NULL),
(602, '2025-2026', 1, 'Lapso Único', 47, 111, 4, 'MB', 32, 'Contenidos', NULL),
(603, '2025-2026', 1, 'Lapso Único', 47, 111, 8, 'MB', 32, 'Contenidos', NULL),
(604, '2025-2026', 1, 'Lapso Único', 47, 111, 1, 'EX', 35, 'Caligrafía', NULL),
(605, '2025-2026', 1, 'Lapso Único', 47, 111, 2, 'EX', 35, 'Caligrafía', NULL),
(606, '2025-2026', 1, 'Lapso Único', 47, 111, 4, 'EX', 35, 'Caligrafía', NULL),
(607, '2025-2026', 1, 'Lapso Único', 47, 111, 3, 'EX', 35, 'Caligrafía', NULL),
(608, '2025-2026', 1, 'Lapso Único', 47, 111, 8, 'EX', 35, 'Caligrafía', NULL),
(609, '2025-2026', 1, 'Lapso Único', 47, 111, 1, 'EX', 36, 'Caligrafía', NULL),
(610, '2025-2026', 1, 'Lapso Único', 47, 111, 2, 'EX', 36, 'Caligrafía', NULL),
(611, '2025-2026', 1, 'Lapso Único', 47, 111, 3, 'EX', 36, 'Caligrafía', NULL),
(612, '2025-2026', 1, 'Lapso Único', 47, 111, 4, 'EX', 36, 'Caligrafía', NULL),
(613, '2025-2026', 1, 'Lapso Único', 47, 111, 8, 'EX', 36, 'Caligrafía', NULL),
(614, '2025-2026', 1, 'Lapso Único', 47, 111, 1, 'EX', 37, 'Escritura', NULL),
(615, '2025-2026', 1, 'Lapso Único', 47, 111, 2, 'EX', 37, 'Escritura', NULL),
(616, '2025-2026', 1, 'Lapso Único', 47, 111, 3, 'EX', 37, 'Escritura', NULL),
(617, '2025-2026', 1, 'Lapso Único', 47, 111, 4, 'EX', 37, 'Escritura', NULL),
(618, '2025-2026', 1, 'Lapso Único', 47, 111, 8, 'EX', 37, 'Escritura', NULL),
(619, '2025-2026', 1, 'Lapso Único', 47, 111, 8, 'EX', 38, 'Escritura', NULL),
(620, '2025-2026', 1, 'Lapso Único', 47, 111, 4, 'EX', 38, 'Escritura', NULL),
(621, '2025-2026', 1, 'Lapso Único', 47, 111, 3, 'EX', 38, 'Escritura', NULL),
(622, '2025-2026', 1, 'Lapso Único', 47, 111, 2, 'EX', 38, 'Escritura', NULL),
(623, '2025-2026', 1, 'Lapso Único', 47, 111, 1, 'EX', 38, 'Escritura', NULL),
(624, '2025-2026', 1, 'Lapso Único', 47, 111, 1, 'EX', 39, 'Escritura', NULL),
(625, '2025-2026', 1, 'Lapso Único', 47, 111, 2, 'EX', 39, 'Escritura', NULL),
(626, '2025-2026', 1, 'Lapso Único', 47, 111, 3, 'EX', 39, 'Escritura', NULL),
(627, '2025-2026', 1, 'Lapso Único', 47, 111, 4, 'EX', 39, 'Escritura', NULL),
(628, '2025-2026', 1, 'Lapso Único', 47, 111, 8, 'EX', 39, 'Escritura', NULL),
(629, '2025-2026', 1, 'Lapso Único', 47, 111, 1, 'EX', 40, 'Escritura', NULL),
(630, '2025-2026', 1, 'Lapso Único', 47, 111, 2, 'EX', 40, 'Escritura', NULL),
(631, '2025-2026', 1, 'Lapso Único', 47, 111, 3, 'EX', 40, 'Escritura', NULL),
(632, '2025-2026', 1, 'Lapso Único', 47, 111, 4, 'EX', 40, 'Escritura', NULL),
(633, '2025-2026', 1, 'Lapso Único', 47, 111, 8, 'EX', 40, 'Escritura', NULL),
(634, '2025-2026', 1, 'Lapso Único', 47, 112, 1, 'EX', 41, 'Contenidos', NULL),
(635, '2025-2026', 1, 'Lapso Único', 47, 112, 2, 'EX', 41, 'Contenidos', NULL),
(636, '2025-2026', 1, 'Lapso Único', 47, 112, 3, 'EX', 41, 'Contenidos', NULL),
(637, '2025-2026', 1, 'Lapso Único', 47, 112, 4, 'EX', 41, 'Contenidos', NULL),
(638, '2025-2026', 1, 'Lapso Único', 47, 112, 8, 'EX', 41, 'Contenidos', NULL),
(639, '2025-2026', 1, 'Lapso Único', 47, 112, 1, 'EX', 42, 'Contenidos', NULL),
(640, '2025-2026', 1, 'Lapso Único', 47, 112, 2, 'MB', 42, 'Contenidos', NULL),
(641, '2025-2026', 1, 'Lapso Único', 47, 112, 3, 'MB', 42, 'Contenidos', NULL),
(642, '2025-2026', 1, 'Lapso Único', 47, 112, 4, 'MB', 42, 'Contenidos', NULL),
(643, '2025-2026', 1, 'Lapso Único', 47, 112, 8, 'MB', 42, 'Contenidos', NULL),
(644, '2025-2026', 1, 'Lapso Único', 47, 112, 8, 'B', 43, 'Contenidos', NULL),
(645, '2025-2026', 1, 'Lapso Único', 47, 112, 4, 'B', 43, 'Contenidos', NULL),
(646, '2025-2026', 1, 'Lapso Único', 47, 112, 3, 'EX', 43, 'Contenidos', NULL),
(647, '2025-2026', 1, 'Lapso Único', 47, 112, 2, 'EX', 43, 'Contenidos', NULL),
(648, '2025-2026', 1, 'Lapso Único', 47, 112, 1, 'EX', 43, 'Contenidos', NULL),
(649, '2025-2026', 1, 'Lapso Único', 47, 112, 8, 'MB', 44, 'Contenidos', NULL),
(650, '2025-2026', 1, 'Lapso Único', 47, 112, 4, 'MB', 44, 'Contenidos', NULL),
(651, '2025-2026', 1, 'Lapso Único', 47, 112, 3, 'MB', 44, 'Contenidos', NULL),
(652, '2025-2026', 1, 'Lapso Único', 47, 112, 2, 'EX', 44, 'Contenidos', NULL),
(653, '2025-2026', 1, 'Lapso Único', 47, 112, 1, 'EX', 44, 'Contenidos', NULL),
(654, '2025-2026', 1, 'Lapso Único', 47, 113, 1, 'MB', 49, 'Contenidos', NULL),
(655, '2025-2026', 1, 'Lapso Único', 47, 113, 2, 'MB', 49, 'Contenidos', NULL),
(656, '2025-2026', 1, 'Lapso Único', 47, 113, 3, 'MB', 49, 'Contenidos', NULL),
(657, '2025-2026', 1, 'Lapso Único', 47, 113, 4, 'MB', 49, 'Contenidos', NULL),
(658, '2025-2026', 1, 'Lapso Único', 47, 113, 8, 'MB', 49, 'Contenidos', NULL),
(659, '2025-2026', 1, 'Lapso Único', 47, 113, 8, 'B', 50, 'Contenidos', NULL),
(660, '2025-2026', 1, 'Lapso Único', 47, 113, 4, 'B', 50, 'Contenidos', NULL),
(661, '2025-2026', 1, 'Lapso Único', 47, 113, 3, 'B', 50, 'Contenidos', NULL),
(662, '2025-2026', 1, 'Lapso Único', 47, 113, 2, 'B', 50, 'Contenidos', NULL),
(663, '2025-2026', 1, 'Lapso Único', 47, 113, 1, 'B', 50, 'Contenidos', NULL),
(664, '2025-2026', 1, 'Lapso Único', 47, 114, 8, 'EX', 45, 'Contenidos', NULL),
(665, '2025-2026', 1, 'Lapso Único', 47, 114, 4, 'EX', 45, 'Contenidos', NULL),
(666, '2025-2026', 1, 'Lapso Único', 47, 114, 3, 'EX', 45, 'Contenidos', NULL),
(667, '2025-2026', 1, 'Lapso Único', 47, 114, 2, 'EX', 45, 'Contenidos', NULL),
(668, '2025-2026', 1, 'Lapso Único', 47, 114, 1, 'EX', 45, 'Contenidos', NULL),
(669, '2025-2026', 1, 'Lapso Único', 47, 114, 8, 'MB', 46, 'Contenidos', NULL),
(670, '2025-2026', 1, 'Lapso Único', 47, 114, 4, 'MB', 46, 'Contenidos', NULL),
(671, '2025-2026', 1, 'Lapso Único', 47, 114, 3, 'MB', 46, 'Contenidos', NULL),
(672, '2025-2026', 1, 'Lapso Único', 47, 114, 2, 'MB', 46, 'Contenidos', NULL),
(673, '2025-2026', 1, 'Lapso Único', 47, 114, 1, 'MB', 46, 'Contenidos', NULL),
(674, '2025-2026', 1, 'Lapso Único', 47, 114, 8, 'MB', 47, 'Contenidos', NULL),
(675, '2025-2026', 1, 'Lapso Único', 47, 114, 4, 'MB', 47, 'Contenidos', NULL),
(676, '2025-2026', 1, 'Lapso Único', 47, 114, 3, 'MB', 47, 'Contenidos', NULL),
(677, '2025-2026', 1, 'Lapso Único', 47, 114, 2, 'MB', 47, 'Contenidos', NULL),
(678, '2025-2026', 1, 'Lapso Único', 47, 114, 1, 'MB', 47, 'Contenidos', NULL),
(679, '2025-2026', 1, 'Lapso Único', 47, 114, 1, 'EX', 48, 'Contenidos', NULL),
(680, '2025-2026', 1, 'Lapso Único', 47, 114, 2, 'MB', 48, 'Contenidos', NULL),
(681, '2025-2026', 1, 'Lapso Único', 47, 114, 3, 'MB', 48, 'Contenidos', NULL),
(682, '2025-2026', 1, 'Lapso Único', 47, 114, 4, 'MB', 48, 'Contenidos', NULL),
(683, '2025-2026', 1, 'Lapso Único', 47, 114, 8, 'MB', 48, 'Contenidos', NULL),
(684, '2025-2026', 1, 'Lapso Único', 47, 115, 1, 'EX', 51, 'Contenidos', NULL),
(685, '2025-2026', 1, 'Lapso Único', 47, 115, 2, 'EX', 51, 'Contenidos', NULL),
(686, '2025-2026', 1, 'Lapso Único', 47, 115, 3, 'EX', 51, 'Contenidos', NULL),
(687, '2025-2026', 1, 'Lapso Único', 47, 115, 4, 'EX', 51, 'Contenidos', NULL),
(688, '2025-2026', 1, 'Lapso Único', 47, 115, 8, 'EX', 51, 'Contenidos', NULL),
(689, '2025-2026', 1, 'Lapso Único', 47, 115, 8, 'MB', 55, 'Contenidos', NULL),
(690, '2025-2026', 1, 'Lapso Único', 47, 115, 4, 'MB', 55, 'Contenidos', NULL),
(691, '2025-2026', 1, 'Lapso Único', 47, 115, 3, 'MB', 55, 'Contenidos', NULL),
(692, '2025-2026', 1, 'Lapso Único', 47, 115, 2, 'MB', 55, 'Contenidos', NULL),
(693, '2025-2026', 1, 'Lapso Único', 47, 115, 1, 'MB', 55, 'Contenidos', NULL),
(694, '2025-2026', 1, 'Lapso Único', 47, 115, 1, 'EX', 56, 'Contenidos', NULL),
(695, '2025-2026', 1, 'Lapso Único', 47, 115, 2, 'EX', 56, 'Contenidos', NULL),
(696, '2025-2026', 1, 'Lapso Único', 47, 115, 3, 'EX', 56, 'Contenidos', NULL),
(697, '2025-2026', 1, 'Lapso Único', 47, 115, 4, 'MB', 56, 'Contenidos', NULL),
(698, '2025-2026', 1, 'Lapso Único', 47, 115, 8, 'MB', 56, 'Contenidos', NULL),
(699, '2025-2026', 1, 'Lapso Único', 47, 115, 8, 'MB', 57, 'Contenidos', NULL),
(700, '2025-2026', 1, 'Lapso Único', 47, 115, 4, 'MB', 57, 'Contenidos', NULL),
(701, '2025-2026', 1, 'Lapso Único', 47, 115, 3, 'MB', 57, 'Contenidos', NULL),
(702, '2025-2026', 1, 'Lapso Único', 47, 115, 2, 'EX', 57, 'Contenidos', NULL),
(703, '2025-2026', 1, 'Lapso Único', 47, 115, 1, 'EX', 57, 'Contenidos', NULL),
(704, '2025-2026', 1, 'Lapso Único', 47, 115, 8, 'B', 58, 'Contenidos', NULL),
(705, '2025-2026', 1, 'Lapso Único', 47, 115, 4, 'MB', 58, 'Contenidos', NULL),
(706, '2025-2026', 1, 'Lapso Único', 47, 115, 3, 'MB', 58, 'Contenidos', NULL),
(707, '2025-2026', 1, 'Lapso Único', 47, 115, 2, 'MB', 58, 'Contenidos', NULL),
(708, '2025-2026', 1, 'Lapso Único', 47, 115, 1, 'MB', 58, 'Contenidos', NULL),
(709, '2025-2026', 1, 'Lapso Único', 47, 116, 8, 'MB', 52, 'Contenidos', NULL),
(710, '2025-2026', 1, 'Lapso Único', 47, 116, 4, 'MB', 52, 'Contenidos', NULL),
(711, '2025-2026', 1, 'Lapso Único', 47, 116, 3, 'MB', 52, 'Contenidos', NULL),
(712, '2025-2026', 1, 'Lapso Único', 47, 116, 2, 'MB', 52, 'Contenidos', NULL),
(713, '2025-2026', 1, 'Lapso Único', 47, 116, 1, 'EX', 52, 'Contenidos', NULL),
(714, '2025-2026', 1, 'Lapso Único', 47, 116, 1, 'EX', 53, 'Contenidos', NULL),
(715, '2025-2026', 1, 'Lapso Único', 47, 116, 2, 'EX', 53, 'Contenidos', NULL),
(716, '2025-2026', 1, 'Lapso Único', 47, 116, 3, 'MB', 53, 'Contenidos', NULL),
(717, '2025-2026', 1, 'Lapso Único', 47, 116, 4, 'MB', 53, 'Contenidos', NULL),
(718, '2025-2026', 1, 'Lapso Único', 47, 116, 8, 'MB', 53, 'Contenidos', NULL),
(719, '2025-2026', 1, 'Lapso Único', 47, 116, 8, 'EX', 54, 'Contenidos', NULL),
(720, '2025-2026', 1, 'Lapso Único', 47, 116, 4, 'MB', 54, 'Contenidos', NULL),
(721, '2025-2026', 1, 'Lapso Único', 47, 116, 3, 'MB', 54, 'Contenidos', NULL),
(722, '2025-2026', 1, 'Lapso Único', 47, 116, 2, 'MB', 54, 'Contenidos', NULL),
(723, '2025-2026', 1, 'Lapso Único', 47, 116, 1, 'MB', 54, 'Contenidos', NULL);

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
(27, 'V142563210', 'Mariales', 'Solis', 'Barquisimeto Lara', '04245632101', 'mariales@gmail.com', 'Universitario', 'Ninguna registrada', 'Sí', 'Seguros Salud', '04245663100', 'Avenida Lara'),
(28, 'V142563211', 'Rafael', 'Ramos', 'Barquisimeto', '04244156300', 'contactoprueba@gmail.com', 'Primariaaaaa', 'NingunaAAA', 'Sí', 'Soluciones MYT', '04121111422', 'Barquisimeto'),
(29, 'V14445145', 'Adriana', 'Salas', 'Caracas Venezuela', '04125896311', 'adrianas@gmail.com', 'Ninguno aún', 'NingunaAAA', 'No', '', '', ''),
(30, 'V147414122', 'contacto', 'contacto', 'Barquisimeto Lara', '04244152102', 'contactoprueba@gmail.com', 'Bachillerato', 'Ingeniero Sistemas', 'Sí', 'Seguros Qualita', '04241111111', 'Avenida Venezula'),
(31, 'V14511101', 'Fabian', 'Solis', 'Barquisimeto Lara', '04241156321', 'fabian@gmail.com', 'Bachillerato', 'Ingeniero Sistemas', 'Sí', 'Sistemas GRUCAS', '04241115631', 'Avenida Los Leones'),
(32, 'V12345678', 'Mariaca', 'Solis', 'Barquisimeto Lara', '04245211000', 'madre@gmail.com', 'Bachillerato', 'Ninguna registrada', 'Sí', 'Benzemos Lara', '04241115621', 'Circunvalacion'),
(33, 'V51263321', 'Zoraida', 'Mejias', 'Barquisimeto Lara', '04245211000', 'zoraida@gmail.com', 'Bachillerato', 'Ninguna registrada', 'Sí', 'Lidotel Bqto', '04125632100', 'Circunvalacion'),
(34, 'V12121101', 'Mariela', 'Suarez', 'Barquisimeto', '04241121210', 'mariela@gmail.com', 'Bachillerato', 'Licenciada', 'Sí', 'Seguros Lara', '04241010101', 'Cabudare Centro'),
(35, 'V14441210', 'Andres', 'Mendoza', 'Barquisimeto', '04241010100', 'andres@gmail.com', 'Bachillerato', 'Ninguna activa', 'Sí', 'TGS Solutions', '04241124251', 'Barquisimeto'),
(36, 'V15666631', 'Yovan', 'Silva', 'Barquisimeto', '04241442421', 'yovans@gmail.com', 'Bachillerato', 'Ninguna activa', 'Sí', 'Mercados Lara', '04245563110', 'Barquisimeto'),
(37, 'V17789854', 'Marcial', 'Solorzano', 'Barquisimeto', '04124452101', 'marcials@gmail.com', 'Licenciado', 'Ninguna activa', 'Sí', 'Bencemos Lara', '04241121210', 'Barquisimeto'),
(38, 'V77741210', 'Enrique', 'Mendoza', 'Barquisimeto', '04241156221', 'enrique@gmail.com', 'Lincenciatura', 'Ninguna activa', 'Sí', 'GT Nascars', '04241244211', 'Barquisimeto'),
(39, 'V7777851', 'Alfredo', 'Mejias', 'Barquisimeto', '04241010100', 'mejias1@gmail.com', 'Bachillerato', 'Ninguna activa', 'Sí', 'TGS Solutions', '04241244211', 'Barquisimeto'),
(40, 'V7785211', 'Margot', 'Robbie', 'Barquisimeto', '04245599981', 'margot@gmail.com', 'Ninguna aun', 'Ninguna aún', 'Sí', 'Seguros Lara', '04241010101', 'Cabudare Centro'),
(41, 'V7741663', 'Enrique', 'Bonilla', 'Barquisimeto', '04241010100', 'enrique@gmail.com', 'Lincenciatura', 'Ninguna activa', 'Sí', 'Mercados Lara', '04245563110', 'Barquisimeto'),
(42, 'V89333121', 'Jairo', 'Menendez', 'Barquisimeto', '04241442421', 'jairo@gmail.com', 'Bachillerato', 'Ninguna activa', 'Sí', 'Mercados Lara', '04241124251', 'Barquisimeto');

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
(1, 'V14256321', 'Arianna', 'Solis', 'F', '14/12/2013', 12, 'Barquisimeto', 'Barquisimeto', 'Colegio Dioscesano', 'Retiro formal', 'Ninguno aun', 'Ninguna aun', 1, 'Mañana', 'No', 'No', 'Ninguno aun', 'Ninguno aun'),
(2, 'V14521000', 'Adrian', 'Salcedo', 'M', '14/06/2010', 15, 'Barrio Union', 'Barquisimeto', 'Colegio Alfredo', 'Ninguno aun', 'Ninguno aun', 'Ninguno aun', 1, 'Mañana', '', '', 'Ninguno aun', 'Ninguno aun'),
(3, '', 'Valeria', 'Salcedo', 'F', '12/05/2012', 13, 'Avenida Cristobal C', 'Barquisimeto', 'Colegio 24 de Junio', 'Ninguno aun', 'Ninguno aun', 'Ninguno aun', 1, 'Mañana', '', '', 'Ninguno aun', 'Ninguno aun'),
(4, 'V1411210', 'Merwin', 'Mendoza', 'M', '14/06/2011', 14, 'Barquisimeto', 'Barquisimeto', 'Colegio Prados del Norte', 'Ninguno aun', 'Ninguno aun', 'Ninguno aun', 1, 'Mañana', '', '', 'Ninguna aun', 'Ninguno aun'),
(5, 'V14256311', 'Fabian Enrique', 'Salsedo', 'M', '14/12/2013', 13, 'Barquisimeto', 'Barquisimeto', 'Colegio Dioscesano', 'Ninguno aun', 'Ninguno aun', 'Ninguno aun', 7, 'Mañana', '', '', 'Ninguno aun', 'Ninguno aun'),
(7, 'V1201000', 'Yovana', 'Sarate', 'F', '08/02/2012', 13, 'Barquisimeto', 'Barquisimeto', 'Colegio Dioscesano', 'Ninguno aun', 'Ninguno aun', 'Ninguno aun', 7, 'Mañana', '', '', 'Ninguno aun', 'Ninguno aun'),
(8, 'V1212100', 'Sofia', 'Gonzales', 'F', '14/12/2013', 15, 'Barquisimeto', 'Barquisimeto', 'Colegio 24 de Junio', 'Ninguno aun', 'Ninguno aun', 'Ninguno aun', 1, 'Mañana', '', '', 'Ninguno aun', 'Ninguno aun'),
(9, 'V21001212', 'Mery', 'Sanchez', 'F', '14/12/2013', 15, 'Barquisimeto', 'Barquisimeto', 'Colegio 24 de Junio', 'Retiro formal', 'Ninguno aun', 'Ninguno aun', 7, 'Mañana', '', '', 'Ninguno aun', 'Ninguno aun'),
(10, 'V1421210', 'Marian', 'López', 'F', '14/06/2008', 17, 'Barquisimeto', 'Barquisimeto', 'Colegio Los Ilustres', 'Salida Formal', 'Igualación segundo grado', 'Retiro formal', 7, 'Mañana', '', '', 'No posee vacunas', 'No tiene enfermedades'),
(11, 'V25633210', 'Andres', 'Menendez', 'M', '14/10/2009', 16, 'Barquisimeto', 'Barquisimeto', 'Colegio Las Americas', 'Salida Formal', 'Igualación segundo grado', 'Retiro formal', 7, 'Mañana', '', '', 'No posee vacunas', 'No tiene enfermedades'),
(12, 'V14424211', 'Enrique', 'Castañeda', 'M', '08/08/2010', 15, 'Barquisimeto', 'Barquisimeto', 'Colegio Los Ilustres', 'Salida Formal', 'Igualación segundo grado', 'Retiro formal', 7, 'Mañana', '', '', 'No posee vacunas', 'No tiene enfermedades'),
(13, 'V12421210', 'Maria Victoria', 'Serrano', 'F', '14/10/2010', 15, 'Barquisimeto', 'Barquisimeto', 'Colegio Las Americas', 'Salida Formal', 'Igualación segundo grado', 'Retiro formal', 7, 'Mañana', '', '', 'No posee vacunas', 'No tiene enfermedades'),
(14, 'V14455210', 'Fabian', 'Salazar', 'F', '14/06/2012', 13, 'Barquisimeto', 'Barquisimeto', 'Colegio Las Americas', 'Retiro formal', 'Igualación segundo grado', 'Ninguna aún', 7, 'Mañana', 'Ningun registro', 'Ningun registro', 'No posee vacunas', 'No tiene enfermedades'),
(15, 'V1888889', 'Pedro', 'Pascal', 'M', '14/06/2013', 13, 'Barquisimeto', 'Barquisimeto', 'Colegio Las Americas', 'Retiro formal', 'Igualación segundo grado', 'Retiro formal', 7, 'Mañana', '', '', 'No posee vacunas', 'No tiene enfermedades'),
(16, 'V7841120', 'Verónica', 'Leiva', 'F', '14/06/2012', 13, 'Barquisimeto', 'Barquisimeto', 'Colegio Las Americas', 'Retiro formal', 'Igualación segundo grado', 'Ninguna aún', 7, 'Mañana', '', '', 'No posee vacunas', 'No tiene enfermedades'),
(17, 'V28999654', 'Veronica', 'Serrano', 'F', '14/07/2013', 12, 'Barquisimeto', 'Barquisimeto', 'Colegio Las Americas', 'Salida Formal', 'Igualación segundo grado', 'Ninguna aún', 7, 'Mañana', '', '', 'No posee vacunas', 'No tiene enfermedades');

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
(76, 1, 116);

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
(24, 16, 19, '2025-2026', 7, '2025-07-25', 41),
(25, 16, 20, '2025-2026', 7, '2025-07-25', 41),
(26, 17, 21, '2025-2026', 7, '2025-07-25', 42),
(27, 17, 22, '2025-2026', 7, '2025-07-25', 42);

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
(116, 'Primaria', 'MANUALIDADES', 2);

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

--
-- Volcado de datos para la tabla `materias_pendientes`
--

INSERT INTO `materias_pendientes` (`id`, `id_estudiante`, `id_materia`, `id_grado`, `id_profesor`, `anio_escolar`, `promedio_final`, `estado`, `fecha_registro`, `fecha_actualizacion`) VALUES
(24, 7, 99, 7, 43, '2025-2026', 5.00, 'repetida', '20-07-2025', '2025-07-19 21:40:52'),
(25, 9, 99, 7, 43, '2025-2026', 15.50, 'repetida', '20-07-2025', '2025-07-19 21:59:28'),
(26, 7, 106, 7, 41, '2025-2026', 13.50, 'recuperada', '20-07-2025', '2025-07-19 21:59:10'),
(27, 9, 106, 7, 41, '2025-2026', 7.00, 'repetida', '20-07-2025', '2025-07-19 21:59:28');

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
(47, 'V15226331', 'Yhoiber Leon', 'Primaria', '04241425632', 2);

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
(78, 47, 1);

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
(22, 47, 111, 1),
(23, 47, 112, 1),
(21, 47, 113, 1),
(20, 47, 114, 1),
(24, 47, 115, 1),
(25, 47, 116, 1);

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
(19, 'V15632778', 'madre', 'Miriangel', 'Lopez', '14/12/1988', 'miriangel@gmail.com', 'Barquisimeto', '04241115931', 'Bachillerato', 'Ninguna aún', 'No', '', '', ''),
(20, 'V7741663', 'padre', 'Enrique', 'Bonilla', '18/06/1996', 'enrique@gmail.com', 'Barquisimeto', '04241010100', 'Lincenciatura', 'Ninguna activa', 'Sí', 'Mercados Lara', '04245563110', 'Barquisimeto'),
(21, 'V88896240', 'madre', 'Giovanna', 'Sarate', '18/09/2000', 'giovanna@gmail.com', 'Barquisimeto', '04241121210', 'Bachillerato', 'Ninguna aún', 'No', '', '', ''),
(22, 'V89333121', 'padre', 'Jairo', 'Menendez', '28/06/1996', 'jairo@gmail.com', 'Barquisimeto', '04241442421', 'Bachillerato', 'Ninguna activa', 'Sí', 'Mercados Lara', '04241124251', 'Barquisimeto');

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
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=724;

--
-- AUTO_INCREMENT de la tabla `contacto_pago`
--
ALTER TABLE `contacto_pago`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `grados`
--
ALTER TABLE `grados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `grado_materia`
--
ALTER TABLE `grado_materia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  MODIFY `id_inscripcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT de la tabla `materias_pendientes`
--
ALTER TABLE `materias_pendientes`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id_profesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `profesor_grado`
--
ALTER TABLE `profesor_grado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `profesor_materia_grado`
--
ALTER TABLE `profesor_materia_grado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `representantes`
--
ALTER TABLE `representantes`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
