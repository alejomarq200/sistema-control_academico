-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-07-2025 a las 22:35:50
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
(36, '2025-2026', 'Caligrafía', 'Sigue el patrón en la escritura mayúscula en cuaderno doble línea.', 111, 1, 47, 2);

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
(290, '2025-2026', 1, 'Lapso Único', 47, 111, 8, 'MB', 30, '', 0.00),
(291, '2025-2026', 1, 'Lapso Único', 47, 111, 4, 'EX', 30, '', 0.00),
(292, '2025-2026', 1, 'Lapso Único', 47, 111, 3, 'EX', 30, '', 0.00),
(293, '2025-2026', 1, 'Lapso Único', 47, 111, 2, 'MB', 30, '', 0.00),
(294, '2025-2026', 1, 'Lapso Único', 47, 111, 1, 'DM', 30, '', 0.00),
(349, '2025-2026', 1, 'Lapso Único', 47, 111, 1, 'EX', 35, 'Caligrafía', 0.00),
(378, '2025-2026', 7, '1er Lapso', 43, 99, 5, '14', NULL, NULL, 14.50),
(379, '2025-2026', 7, '1er Lapso', 43, 99, 5, '15', NULL, NULL, 14.50),
(380, '2025-2026', 7, '1er Lapso', 43, 99, 7, '15', NULL, NULL, 15.50),
(381, '2025-2026', 7, '1er Lapso', 43, 99, 7, '16', NULL, NULL, 15.50),
(382, '2025-2026', 7, '1er Lapso', 43, 99, 9, '20', NULL, NULL, 18.00),
(383, '2025-2026', 7, '1er Lapso', 43, 99, 9, '16', NULL, NULL, 18.00),
(384, '2025-2026', 7, '2do Lapso', 43, 99, 9, '1', NULL, NULL, 1.50),
(385, '2025-2026', 7, '2do Lapso', 43, 99, 9, '2', NULL, NULL, 1.50),
(386, '2025-2026', 7, '2do Lapso', 43, 99, 7, '20', NULL, NULL, 3.50),
(387, '2025-2026', 7, '2do Lapso', 43, 99, 7, '20', NULL, NULL, 3.50),
(388, '2025-2026', 7, '2do Lapso', 43, 99, 5, '11', NULL, NULL, 13.00),
(389, '2025-2026', 7, '2do Lapso', 43, 99, 5, '15', NULL, NULL, 13.00),
(392, '2025-2026', 7, '3er Lapso', 43, 99, 5, '2', NULL, NULL, 2.50),
(393, '2025-2026', 7, '3er Lapso', 43, 99, 5, '3', NULL, NULL, 2.50),
(408, '2025-2026', 7, '3er Lapso', 43, 99, 7, '2', NULL, NULL, 2.50),
(409, '2025-2026', 7, '3er Lapso', 43, 99, 7, '3', NULL, NULL, 2.50),
(410, '2025-2026', 7, '3er Lapso', 43, 99, 9, '20', NULL, NULL, 2.50),
(411, '2025-2026', 7, '3er Lapso', 43, 99, 9, '20', NULL, NULL, 2.50),
(412, '2025-2026', 7, '1er Lapso', 41, 106, 5, '14', NULL, NULL, 15.00),
(413, '2025-2026', 7, '1er Lapso', 41, 106, 5, '15', NULL, NULL, 15.00),
(414, '2025-2026', 7, '1er Lapso', 41, 106, 5, '16', NULL, NULL, 15.00),
(415, '2025-2026', 7, '1er Lapso', 41, 106, 7, '12', NULL, NULL, 14.00),
(416, '2025-2026', 7, '1er Lapso', 41, 106, 7, '14', NULL, NULL, 14.00),
(417, '2025-2026', 7, '1er Lapso', 41, 106, 7, '16', NULL, NULL, 14.00),
(418, '2025-2026', 7, '1er Lapso', 41, 106, 9, '15', NULL, NULL, 16.33),
(419, '2025-2026', 7, '1er Lapso', 41, 106, 9, '16', NULL, NULL, 16.33),
(420, '2025-2026', 7, '1er Lapso', 41, 106, 9, '18', NULL, NULL, 16.33),
(421, '2025-2026', 7, '2do Lapso', 41, 106, 5, '15', NULL, NULL, 13.50),
(422, '2025-2026', 7, '2do Lapso', 41, 106, 5, '12', NULL, NULL, 13.50),
(423, '2025-2026', 7, '2do Lapso', 41, 106, 7, '16', NULL, NULL, 14.00),
(424, '2025-2026', 7, '2do Lapso', 41, 106, 7, '12', NULL, NULL, 14.00),
(425, '2025-2026', 7, '2do Lapso', 41, 106, 9, '15', NULL, NULL, 15.50),
(426, '2025-2026', 7, '2do Lapso', 41, 106, 9, '16', NULL, NULL, 15.50),
(427, '2025-2026', 7, '3er Lapso', 41, 106, 9, '20', NULL, NULL, 20.00),
(428, '2025-2026', 7, '3er Lapso', 41, 106, 9, '20', NULL, NULL, 20.00),
(429, '2025-2026', 7, '3er Lapso', 41, 106, 7, '5', NULL, NULL, 3.50),
(430, '2025-2026', 7, '3er Lapso', 41, 106, 7, '2', NULL, NULL, 3.50),
(431, '2025-2026', 7, '3er Lapso', 41, 106, 5, '10', NULL, NULL, 11.00),
(432, '2025-2026', 7, '3er Lapso', 41, 106, 5, '12', NULL, NULL, 11.00),
(433, '2025-2026', 7, '1er Lapso', 39, 104, 5, '14', NULL, NULL, 15.00),
(434, '2025-2026', 7, '1er Lapso', 39, 104, 5, '15', NULL, NULL, 15.00),
(435, '2025-2026', 7, '1er Lapso', 39, 104, 5, '16', NULL, NULL, 15.00),
(436, '2025-2026', 7, '1er Lapso', 39, 104, 7, '12', NULL, NULL, 14.00),
(437, '2025-2026', 7, '1er Lapso', 39, 104, 7, '14', NULL, NULL, 14.00),
(438, '2025-2026', 7, '1er Lapso', 39, 104, 7, '16', NULL, NULL, 14.00),
(439, '2025-2026', 7, '1er Lapso', 39, 104, 9, '20', NULL, NULL, 15.67),
(440, '2025-2026', 7, '1er Lapso', 39, 104, 9, '15', NULL, NULL, 15.67),
(441, '2025-2026', 7, '1er Lapso', 39, 104, 9, '12', NULL, NULL, 15.67),
(442, '2025-2026', 7, '2do Lapso', 39, 104, 5, '15', NULL, NULL, 14.33),
(443, '2025-2026', 7, '2do Lapso', 39, 104, 5, '16', NULL, NULL, 14.33),
(444, '2025-2026', 7, '2do Lapso', 39, 104, 5, '12', NULL, NULL, 14.33),
(445, '2025-2026', 7, '2do Lapso', 39, 104, 7, '1', NULL, NULL, 2.00),
(446, '2025-2026', 7, '2do Lapso', 39, 104, 7, '2', NULL, NULL, 2.00),
(447, '2025-2026', 7, '2do Lapso', 39, 104, 7, '3', NULL, NULL, 2.00),
(448, '2025-2026', 7, '2do Lapso', 39, 104, 9, '2', NULL, NULL, 3.00),
(449, '2025-2026', 7, '2do Lapso', 39, 104, 9, '3', NULL, NULL, 3.00),
(450, '2025-2026', 7, '2do Lapso', 39, 104, 9, '4', NULL, NULL, 3.00),
(451, '2025-2026', 7, '3er Lapso', 39, 104, 9, '12', NULL, NULL, 14.00),
(452, '2025-2026', 7, '3er Lapso', 39, 104, 9, '16', NULL, NULL, 14.00),
(453, '2025-2026', 7, '3er Lapso', 39, 104, 7, '18', NULL, NULL, 17.00),
(454, '2025-2026', 7, '3er Lapso', 39, 104, 7, '16', NULL, NULL, 17.00),
(455, '2025-2026', 7, '3er Lapso', 39, 104, 5, '12', NULL, NULL, 13.50),
(456, '2025-2026', 7, '3er Lapso', 39, 104, 5, '15', NULL, NULL, 13.50),
(457, '2025-2026', 7, '1er Lapso', 36, 107, 9, '14', NULL, NULL, 15.00),
(458, '2025-2026', 7, '1er Lapso', 36, 107, 9, '16', NULL, NULL, 15.00),
(459, '2025-2026', 7, '1er Lapso', 36, 107, 7, '12', NULL, NULL, 13.50),
(460, '2025-2026', 7, '1er Lapso', 36, 107, 7, '15', NULL, NULL, 13.50),
(461, '2025-2026', 7, '1er Lapso', 36, 107, 5, '12', NULL, NULL, 13.50),
(462, '2025-2026', 7, '1er Lapso', 36, 107, 5, '15', NULL, NULL, 13.50),
(463, '2025-2026', 7, '2do Lapso', 36, 107, 5, '12', NULL, NULL, 8.33),
(464, '2025-2026', 7, '2do Lapso', 36, 107, 5, '12', NULL, NULL, 8.33),
(465, '2025-2026', 7, '2do Lapso', 36, 107, 5, '1', NULL, NULL, 8.33),
(466, '2025-2026', 7, '2do Lapso', 36, 107, 7, '16', NULL, NULL, 3.33),
(467, '2025-2026', 7, '2do Lapso', 36, 107, 7, '14', NULL, NULL, 3.33),
(468, '2025-2026', 7, '2do Lapso', 36, 107, 7, '15', NULL, NULL, 3.33),
(469, '2025-2026', 7, '2do Lapso', 36, 107, 9, '7', NULL, NULL, 2.67),
(470, '2025-2026', 7, '2do Lapso', 36, 107, 9, '6', NULL, NULL, 2.67),
(471, '2025-2026', 7, '2do Lapso', 36, 107, 9, '2', NULL, NULL, 2.67),
(472, '2025-2026', 7, '3er Lapso', 36, 107, 5, '14', NULL, NULL, 14.50),
(473, '2025-2026', 7, '3er Lapso', 36, 107, 5, '15', NULL, NULL, 14.50),
(474, '2025-2026', 7, '3er Lapso', 36, 107, 7, '15', NULL, NULL, 2.00),
(475, '2025-2026', 7, '3er Lapso', 36, 107, 7, '16', NULL, NULL, 2.00),
(476, '2025-2026', 7, '3er Lapso', 36, 107, 9, '6', NULL, NULL, 2.50),
(477, '2025-2026', 7, '3er Lapso', 36, 107, 9, '6', NULL, NULL, 2.50),
(478, '2025-2026', 7, '1er Lapso', 38, 108, 5, '12', NULL, NULL, 13.00),
(479, '2025-2026', 7, '1er Lapso', 38, 108, 5, '14', NULL, NULL, 13.00),
(480, '2025-2026', 7, '1er Lapso', 38, 108, 9, '12', NULL, NULL, 13.50),
(481, '2025-2026', 7, '1er Lapso', 38, 108, 9, '15', NULL, NULL, 13.50),
(482, '2025-2026', 7, '1er Lapso', 38, 108, 7, '12', NULL, NULL, 13.00),
(483, '2025-2026', 7, '1er Lapso', 38, 108, 7, '14', NULL, NULL, 13.00),
(484, '2025-2026', 7, '2do Lapso', 38, 108, 5, '5', NULL, NULL, 8.00),
(485, '2025-2026', 7, '2do Lapso', 38, 108, 5, '3', NULL, NULL, 8.00),
(486, '2025-2026', 7, '2do Lapso', 38, 108, 5, '16', NULL, NULL, 8.00),
(487, '2025-2026', 7, '2do Lapso', 38, 108, 7, '1', NULL, NULL, 3.00),
(488, '2025-2026', 7, '2do Lapso', 38, 108, 7, '6', NULL, NULL, 3.00),
(489, '2025-2026', 7, '2do Lapso', 38, 108, 7, '2', NULL, NULL, 3.00),
(490, '2025-2026', 7, '2do Lapso', 38, 108, 9, '1', NULL, NULL, 3.00),
(491, '2025-2026', 7, '2do Lapso', 38, 108, 9, '3', NULL, NULL, 3.00),
(492, '2025-2026', 7, '2do Lapso', 38, 108, 9, '5', NULL, NULL, 3.00),
(493, '2025-2026', 7, '3er Lapso', 38, 108, 9, '1', NULL, NULL, 2.00),
(494, '2025-2026', 7, '3er Lapso', 38, 108, 9, '2', NULL, NULL, 2.00),
(495, '2025-2026', 7, '3er Lapso', 38, 108, 9, '3', NULL, NULL, 2.00),
(496, '2025-2026', 7, '3er Lapso', 38, 108, 7, '2', NULL, NULL, 2.00),
(497, '2025-2026', 7, '3er Lapso', 38, 108, 7, '3', NULL, NULL, 2.00),
(498, '2025-2026', 7, '3er Lapso', 38, 108, 7, '1', NULL, NULL, 2.00),
(499, '2025-2026', 7, '3er Lapso', 38, 108, 5, '14', NULL, NULL, 15.00),
(500, '2025-2026', 7, '3er Lapso', 38, 108, 5, '15', NULL, NULL, 15.00),
(501, '2025-2026', 7, '3er Lapso', 38, 108, 5, '16', NULL, NULL, 15.00),
(502, '2025-2026', 7, '1er Lapso', 40, 102, 5, '14', NULL, NULL, 14.50),
(503, '2025-2026', 7, '1er Lapso', 40, 102, 5, '15', NULL, NULL, 14.50),
(504, '2025-2026', 7, '1er Lapso', 40, 102, 7, '12', NULL, NULL, 14.00),
(505, '2025-2026', 7, '1er Lapso', 40, 102, 7, '16', NULL, NULL, 14.00),
(506, '2025-2026', 7, '1er Lapso', 40, 102, 9, '14', NULL, NULL, 14.50),
(507, '2025-2026', 7, '1er Lapso', 40, 102, 9, '15', NULL, NULL, 14.50),
(508, '2025-2026', 7, '2do Lapso', 40, 102, 9, '10', NULL, NULL, 10.00),
(509, '2025-2026', 7, '2do Lapso', 40, 102, 9, '10', NULL, NULL, 10.00),
(510, '2025-2026', 7, '2do Lapso', 40, 102, 9, '10', NULL, NULL, 10.00),
(511, '2025-2026', 7, '2do Lapso', 40, 102, 7, '16', NULL, NULL, 14.67),
(512, '2025-2026', 7, '2do Lapso', 40, 102, 7, '12', NULL, NULL, 14.67),
(513, '2025-2026', 7, '2do Lapso', 40, 102, 7, '16', NULL, NULL, 14.67),
(514, '2025-2026', 7, '2do Lapso', 40, 102, 5, '16', NULL, NULL, 14.33),
(515, '2025-2026', 7, '2do Lapso', 40, 102, 5, '12', NULL, NULL, 14.33),
(516, '2025-2026', 7, '2do Lapso', 40, 102, 5, '15', NULL, NULL, 14.33),
(517, '2025-2026', 7, '3er Lapso', 40, 102, 9, '1', NULL, NULL, 2.00),
(518, '2025-2026', 7, '3er Lapso', 40, 102, 9, '3', NULL, NULL, 2.00),
(519, '2025-2026', 7, '3er Lapso', 40, 102, 7, '5', NULL, NULL, 8.00),
(520, '2025-2026', 7, '3er Lapso', 40, 102, 7, '11', NULL, NULL, 8.00),
(521, '2025-2026', 7, '3er Lapso', 40, 102, 5, '1', NULL, NULL, 8.50),
(522, '2025-2026', 7, '3er Lapso', 40, 102, 5, '16', NULL, NULL, 8.50);

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
(33, 'V51263321', 'Zoraida', 'Mejias', 'Barquisimeto Lara', '04245211000', 'zoraida@gmail.com', 'Bachillerato', 'Ninguna registrada', 'Sí', 'Lidotel Bqto', '04125632100', 'Circunvalacion');

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
(9, 'V21001212', 'Mery', 'Sanchez', 'F', '14/12/2013', 15, 'Barquisimeto', 'Barquisimeto', 'Colegio 24 de Junio', 'Retiro formal', 'Ninguno aun', 'Ninguno aun', 7, 'Mañana', '', '', 'Ninguno aun', 'Ninguno aun');

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
(75, 1, 115);

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
(1, 1, 1, '2025-2026', 7, '2025-06-22', 27),
(2, 2, 2, '2025-2026', 7, '2025-06-22', 28),
(3, 3, 3, '2025-2026', 7, '2025-06-22', 29),
(4, 3, 4, '2025-2026', 7, '2025-06-22', 29),
(5, 3, 5, '2025-2026', 7, '2025-06-22', 30),
(6, 3, 5, '2025-2026', 7, '2025-06-22', 30),
(7, 4, 6, '2025-2026', 7, '2025-06-22', 31),
(8, 4, 7, '2025-2026', 7, '2025-06-22', 31),
(9, 7, 1, '2025-2026', 7, '2025-06-26', 27),
(10, 8, 5, '2025-2026', 7, '2025-06-26', 33),
(11, 9, 1, '2025-2026', 7, '2025-06-26', 27);

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
(115, 'Primaria', 'INDICADORES GENERALES', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias_pendientes`
--

CREATE TABLE `materias_pendientes` (
  `id` int(12) NOT NULL,
  `id_estudiante` int(8) NOT NULL,
  `id_materia` int(5) NOT NULL,
  `id_grado` int(5) NOT NULL,
  `anio_escolar` varchar(20) NOT NULL,
  `promedio_final` decimal(5,2) NOT NULL,
  `estado` enum('pendiente','recuperada','repetida') NOT NULL DEFAULT 'pendiente',
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_actualizacion` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materias_pendientes`
--

INSERT INTO `materias_pendientes` (`id`, `id_estudiante`, `id_materia`, `id_grado`, `anio_escolar`, `promedio_final`, `estado`, `fecha_registro`, `fecha_actualizacion`) VALUES
(14, 9, 107, 7, '2025-2026', 6.14, 'pendiente', '2025-07-17 02:54:57', '2025-07-17 02:54:57'),
(15, 9, 108, 7, '2025-2026', 5.25, 'pendiente', '2025-07-17 02:57:32', '2025-07-17 02:57:32'),
(16, 7, 108, 7, '2025-2026', 5.13, 'pendiente', '2025-07-17 02:57:34', '2025-07-17 02:57:34'),
(21, 9, 102, 7, '', 9.00, 'pendiente', '2025-07-19 16:09:53', NULL);

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
(24, 47, 115, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `representantes`
--

CREATE TABLE `representantes` (
  `id` int(5) NOT NULL,
  `cedula` varchar(15) DEFAULT NULL,
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

INSERT INTO `representantes` (`id`, `cedula`, `nombres`, `apellidos`, `fecha_nac`, `correo`, `direccion`, `nro_telefono`, `grado_inst`, `profesion`, `trabaja`, `nombre_empr`, `telefono_empr`, `direccion_empr`) VALUES
(1, 'V142563210', 'Mariales', 'Solis', '24/05/1980', 'mariales@gmail.com', 'Barquisimeto Lara', '04245632100', 'Universitario', 'Ninguna registrada', 'Sí', 'Benzemos Lara', '04244112204', 'Circunvalacion'),
(2, 'V14256310', 'Rafael', 'Ramos', '08/12/1995', 'rafael@gmail.com', 'Barquisimeto Lara', '04245663100', 'Primariaaaaa', 'NingunaAAA', 'Sí', 'Soluciones MYT', '04125632100', 'Barquisimeto'),
(3, 'V14145631', 'Maria', 'Ramos', '25/06/1995', 'mariar@gmail.com', 'Agua Viva Cabudare', '04141112056', 'Bachillerato', 'Ninguno aun', 'Sí', 'Benzemos Lara', '04245633210', 'Circunvalacion'),
(4, 'V14552103', 'Fabian', 'Andrade', '03/08/2000', 'andrade@gmail.com', 'Avenida Los Leones', '04241211121', 'Bachillerato', 'Ningunaaaa', 'No', '', '', ''),
(5, 'V51263321', 'Sofia', 'madre', '14/05/1980', 'madre@gmail.com', 'Ninguno aun', '04125632102', 'ASDADSASDASDA', 'Ninguno aun', 'No', '', '', ''),
(6, 'V14111210', 'Valeria', 'Solis', '14/06/2000', 'Valerias@gmail.com', 'Barquisimeto Lara', '04241115210', 'Bachillerato', 'Ninguna registrada', 'No', '', '', ''),
(7, 'V14511101', 'Fabian', 'Solis', '24/06/1998', 'fabian@gmail.com', 'Barquisimeto Lara', '04241156321', 'Bachillerato', 'Ingeniero Sistemas', 'Sí', 'Sistemas GRUCAS', '04241115631', 'Avenida Los Leones'),
(8, 'V12345678', 'Mariaca', 'Solis', '24/06/2024', 'madre@gmail.com', 'Barquisimeto Lara', '04245211000', 'Bachillerato', 'Ninguna registrada', 'Sí', 'Benzemos Lara', '04241115621', 'Circunvalacion');

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
  ADD KEY `id_grado` (`id_grado`);

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
  MODIFY `id_actividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=523;

--
-- AUTO_INCREMENT de la tabla `contacto_pago`
--
ALTER TABLE `contacto_pago`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `grados`
--
ALTER TABLE `grados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `grado_materia`
--
ALTER TABLE `grado_materia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  MODIFY `id_inscripcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT de la tabla `materias_pendientes`
--
ALTER TABLE `materias_pendientes`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `representantes`
--
ALTER TABLE `representantes`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  ADD CONSTRAINT `materias_pendientes_ibfk_3` FOREIGN KEY (`id_grado`) REFERENCES `grados` (`id`);

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
