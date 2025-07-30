-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-07-2025 a las 12:22:55
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
(58, '2025-2026', 'Contenidos', 'Presenta pulcritud en sus trabajos.', 115, 1, 47, 2),
(100, '2025-2026', 'Lectura', 'Lee en voz alta textos cortos con fluidez y entonación adecuada.', 111, 2, 51, 2),
(101, '2025-2026', 'Escritura', 'Escribe oraciones completas usando correctamente mayúsculas y punto final.', 111, 2, 51, 2),
(102, '2025-2026', 'Ortografía', 'Identifica y corrige errores ortográficos en palabras de uso frecuente.', 111, 2, 51, 2),
(103, '2025-2026', 'Comprensión', 'Responde preguntas sobre un cuento leído en clase.', 111, 2, 51, 2),
(104, '2025-2026', 'Vocabulario', 'Amplía su vocabulario mediante la identificación de sinónimos y antónimos.', 111, 2, 51, 2),
(105, '2025-2026', 'Efemérides', 'Investiga y presenta sobre el Día de la Resistencia Indígena.', 112, 2, 51, 2),
(106, '2025-2026', 'Geografía', 'Identifica y dibuja los símbolos naturales de Venezuela.', 112, 2, 51, 2),
(107, '2025-2026', 'Historia', 'Elabora una línea del tiempo sencilla de su vida personal.', 112, 2, 51, 2),
(108, '2025-2026', 'Cívica', 'Describe las normas de convivencia en el aula y su importancia.', 112, 2, 51, 2),
(109, '2025-2026', 'Investigación', 'Realiza un dibujo sobre las tradiciones de su localidad.', 112, 2, 51, 2),
(110, '2025-2026', 'Habilidades', 'Realiza ejercicios de coordinación motriz gruesa (saltar, correr, gatear).', 113, 2, 51, 2),
(111, '2025-2026', 'Juegos', 'Participa en juegos tradicionales venezolanos (la ere, el gurrufío).', 113, 2, 51, 2),
(112, '2025-2026', 'Equipo', 'Trabaja en equipo en actividades deportivas cooperativas.', 113, 2, 51, 2),
(113, '2025-2026', 'Salud', 'Identifica hábitos de higiene personal relacionados con la actividad física.', 113, 2, 51, 2),
(114, '2025-2026', 'Destreza', 'Desarrolla habilidades básicas de lanzamiento y recepción.', 113, 2, 51, 2),
(115, '2025-2026', 'Organización', 'Mantiene ordenado su espacio de trabajo durante las actividades.', 114, 2, 51, 2),
(116, '2025-2026', 'Responsabilidad', 'Cumple con las tareas asignadas para el hogar.', 114, 2, 51, 2),
(117, '2025-2026', 'Participación', 'Interviene activamente en las discusiones de clase.', 114, 2, 51, 2),
(118, '2025-2026', 'Creatividad', 'Propone ideas originales para resolver problemas planteados.', 114, 2, 51, 2),
(119, '2025-2026', 'Autonomía', 'Realiza actividades escolares con mínima supervisión.', 114, 2, 51, 2),
(120, '2025-2026', 'Disciplina', 'Sigue instrucciones y normas de convivencia en el aula.', 115, 2, 51, 2),
(121, '2025-2026', 'Puntualidad', 'Entrega trabajos en el tiempo establecido.', 115, 2, 51, 2),
(122, '2025-2026', 'Presentación', 'Mantiene sus cuadernos y materiales en buen estado.', 115, 2, 51, 2),
(123, '2025-2026', 'Esfuerzo', 'Muestra interés por mejorar en áreas de dificultad.', 115, 2, 51, 2),
(124, '2025-2026', 'Colaboración', 'Ayuda a sus compañeros cuando lo necesitan.', 115, 2, 51, 2),
(125, '2025-2026', 'Creatividad', 'Elabora un móvil con figuras geométricas usando materiales reciclados.', 116, 2, 51, 2),
(126, '2025-2026', 'Motricidad', 'Recorta y pega figuras con precisión siguiendo un patrón.', 116, 2, 51, 2),
(127, '2025-2026', 'Técnica', 'Pinta un dibujo usando la técnica del estampado con vegetales.', 116, 2, 51, 2),
(128, '2025-2026', 'Tradición', 'Construye un juguete tradicional venezolano (como un papagayo sencillo).', 116, 2, 51, 2),
(129, '2025-2026', 'Expresión', 'Crea una máscara representando un personaje folklórico.', 116, 2, 51, 2),
(130, '2025-2026', 'Lectura', 'Lee textos narrativos cortos y identifica personajes principales.', 111, 3, 52, 2),
(131, '2025-2026', 'Escritura', 'Redacta un párrafo descriptivo sobre un animal de su preferencia.', 111, 3, 52, 2),
(132, '2025-2026', 'Gramática', 'Clasifica palabras según su acento (agudas, graves, esdrújulas).', 111, 3, 52, 2),
(133, '2025-2026', 'Comprensión', 'Resume el contenido de una lectura en 3 oraciones clave.', 111, 3, 52, 2),
(134, '2025-2026', 'Expresión', 'Dramatiza un diálogo sencillo con entonación adecuada.', 111, 3, 52, 2),
(135, '2025-2026', 'Historia', 'Investiga sobre los pueblos originarios de su región.', 112, 3, 52, 2),
(136, '2025-2026', 'Geografía', 'Elabora un croquis sencillo de su comunidad.', 112, 3, 52, 2),
(137, '2025-2026', 'Cívica', 'Explica los deberes y derechos de los niños.', 112, 3, 52, 2),
(138, '2025-2026', 'Efemérides', 'Realiza una línea de tiempo sobre la vida de Simón Bolívar.', 112, 3, 52, 2),
(139, '2025-2026', 'Investigación', 'Presenta un trabajo sobre los símbolos patrios.', 112, 3, 52, 2),
(140, '2025-2026', 'Habilidades', 'Ejecuta ejercicios de equilibrio y coordinación en circuito.', 113, 3, 52, 2),
(141, '2025-2026', 'Juegos', 'Participa en juegos predeportivos (mini voleibol, mini baloncesto).', 113, 3, 52, 2),
(142, '2025-2026', 'Salud', 'Identifica alimentos saludables para antes y después del ejercicio.', 113, 3, 52, 2),
(143, '2025-2026', 'Destreza', 'Practica lanzamientos con precisión a diferentes distancias.', 113, 3, 52, 2),
(144, '2025-2026', 'Equipo', 'Participa en juegos cooperativos respetando las reglas.', 113, 3, 52, 2),
(145, '2025-2026', 'Organización', 'Planifica su tiempo para cumplir con múltiples tareas.', 114, 3, 52, 2),
(146, '2025-2026', 'Responsabilidad', 'Asume roles específicos en trabajos grupales.', 114, 3, 52, 2),
(147, '2025-2026', 'Participación', 'Expresa sus ideas con claridad en discusiones grupales.', 114, 3, 52, 2),
(148, '2025-2026', 'Creatividad', 'Propone soluciones alternativas a problemas planteados.', 114, 3, 52, 2),
(149, '2025-2026', 'Autonomía', 'Realiza investigaciones sencillas con orientación mínima.', 114, 3, 52, 2),
(150, '2025-2026', 'Disciplina', 'Respeta turnos de palabra y opiniones de los demás.', 115, 3, 52, 2),
(151, '2025-2026', 'Puntualidad', 'Llega a tiempo con los materiales necesarios para cada clase.', 115, 3, 52, 2),
(152, '2025-2026', 'Presentación', 'Mantiene sus trabajos limpios y ordenados.', 115, 3, 52, 2),
(153, '2025-2026', 'Esfuerzo', 'Persiste en actividades desafiantes sin frustrarse fácilmente.', 115, 3, 52, 2),
(154, '2025-2026', 'Colaboración', 'Comparte materiales y conocimientos con sus compañeros.', 115, 3, 52, 2),
(155, '2025-2026', 'Creatividad', 'Construye un títere representando un personaje histórico.', 116, 3, 52, 2),
(156, '2025-2026', 'Motricidad', 'Realiza un collage con diferentes texturas y materiales.', 116, 3, 52, 2),
(157, '2025-2026', 'Técnica', 'Pinta un paisaje usando la técnica del puntillismo.', 116, 3, 52, 2),
(158, '2025-2026', 'Tradición', 'Elabora una artesanía típica de su región.', 116, 3, 52, 2),
(159, '2025-2026', 'Expresión', 'Crea un móvil con elementos representativos de Venezuela.', 116, 3, 52, 2),
(160, '2025-2026', 'Lectura', 'Identifica idea principal y secundarias en textos expositivos.', 111, 4, 50, 2),
(161, '2025-2026', 'Escritura', 'Redacta una carta formal con su estructura adecuada.', 111, 4, 50, 2),
(162, '2025-2026', 'Gramática', 'Reconoce y clasifica sustantivos, adjetivos y verbos en oraciones.', 111, 4, 50, 2),
(163, '2025-2026', 'Comprensión', 'Elabora un mapa conceptual a partir de una lectura.', 111, 4, 50, 2),
(164, '2025-2026', 'Expresión', 'Prepara y presenta un noticiero escolar breve.', 111, 4, 50, 2),
(165, '2025-2026', 'Historia', 'Investiga sobre la colonización en Venezuela y sus consecuencias.', 112, 4, 50, 2),
(166, '2025-2026', 'Geografía', 'Elabora un mapa físico de Venezuela señalando sus principales ríos.', 112, 4, 50, 2),
(167, '2025-2026', 'Cívica', 'Analiza artículos seleccionados de la LOPNA.', 112, 4, 50, 2),
(168, '2025-2026', 'Efemérides', 'Realiza una biografía ilustrada de un prócer venezolano.', 112, 4, 50, 2),
(169, '2025-2026', 'Investigación', 'Presenta un trabajo sobre los recursos naturales de su estado.', 112, 4, 50, 2),
(170, '2025-2026', 'Habilidades', 'Ejecuta ejercicios combinados de fuerza y resistencia.', 113, 4, 50, 2),
(171, '2025-2026', 'Juegos', 'Participa en juegos deportivos adaptados con reglas simplificadas.', 113, 4, 50, 2),
(172, '2025-2026', 'Salud', 'Elabora un menú saludable para un día considerando actividad física.', 113, 4, 50, 2),
(173, '2025-2026', 'Destreza', 'Practica fundamentos técnicos básicos de algún deporte específico.', 113, 4, 50, 2),
(174, '2025-2026', 'Equipo', 'Participa en torneos internos aplicando valores deportivos.', 113, 4, 50, 2),
(175, '2025-2026', 'Organización', 'Utiliza agenda escolar para registrar y planificar sus tareas.', 114, 4, 50, 2),
(176, '2025-2026', 'Responsabilidad', 'Asume liderazgo en proyectos grupales asignados.', 114, 4, 50, 2),
(177, '2025-2026', 'Participación', 'Modera discusiones grupales sobre temas asignados.', 114, 4, 50, 2),
(178, '2025-2026', 'Creatividad', 'Diseña proyectos originales para resolver problemas comunitarios.', 114, 4, 50, 2),
(179, '2025-2026', 'Autonomía', 'Realiza investigaciones usando múltiples fuentes de información.', 114, 4, 50, 2),
(180, '2025-2026', 'Disciplina', 'Cumple con las normas establecidas en diferentes espacios escolares.', 115, 4, 50, 2),
(181, '2025-2026', 'Puntualidad', 'Entrega trabajos con calidad en los plazos establecidos.', 115, 4, 50, 2),
(182, '2025-2026', 'Presentación', 'Organiza su portafolio de evidencias de aprendizaje.', 115, 4, 50, 2),
(183, '2025-2026', 'Esfuerzo', 'Supera dificultades buscando alternativas de solución.', 115, 4, 50, 2),
(184, '2025-2026', 'Colaboración', 'Organiza equipos de trabajo considerando habilidades diversas.', 115, 4, 50, 2),
(185, '2025-2026', 'Creatividad', 'Diseña y construye una maqueta de un ecosistema venezolano.', 116, 4, 50, 2),
(186, '2025-2026', 'Motricidad', 'Elabora un libro artesanal con técnicas de encuadernación básica.', 116, 4, 50, 2),
(187, '2025-2026', 'Técnica', 'Realiza una pintura usando la técnica de acuarela.', 116, 4, 50, 2),
(188, '2025-2026', 'Tradición', 'Confecciona un instrumento musical típico venezolano.', 116, 4, 50, 2),
(189, '2025-2026', 'Expresión', 'Crea una historieta gráfica sobre un tema histórico.', 116, 4, 50, 2),
(190, '2025-2026', 'Lectura', 'Analiza textos literarios identificando género, personajes y ambiente.', 111, 5, 54, 2),
(191, '2025-2026', 'Escritura', 'Redacta un cuento corto con estructura narrativa completa.', 111, 5, 54, 2),
(192, '2025-2026', 'Gramática', 'Reconoce y utiliza correctamente los tiempos verbales en contextos.', 111, 5, 54, 2),
(193, '2025-2026', 'Comprensión', 'Compara información de dos textos sobre un mismo tema.', 111, 5, 54, 2),
(194, '2025-2026', 'Expresión', 'Prepara y presenta una exposición oral con apoyo visual.', 111, 5, 54, 2),
(195, '2025-2026', 'Historia', 'Investiga sobre la independencia de Venezuela y sus protagonistas.', 112, 5, 54, 2),
(196, '2025-2026', 'Geografía', 'Elabora un mapa político de América del Sur con sus capitales.', 112, 5, 54, 2),
(197, '2025-2026', 'Cívica', 'Analiza la estructura básica de la Constitución Nacional.', 112, 5, 54, 2),
(198, '2025-2026', 'Efemérides', 'Realiza una línea de tiempo sobre los hechos importantes del siglo XIX.', 112, 5, 54, 2),
(199, '2025-2026', 'Investigación', 'Presenta un trabajo sobre los problemas ambientales de su comunidad.', 112, 5, 54, 2),
(200, '2025-2026', 'Habilidades', 'Ejecuta circuitos de entrenamiento básico con estaciones variadas.', 113, 5, 54, 2),
(201, '2025-2026', 'Juegos', 'Participa en torneos deportivos internos aplicando reglamentos.', 113, 5, 54, 2),
(202, '2025-2026', 'Salud', 'Elabora un plan de acondicionamiento físico personalizado.', 113, 5, 54, 2),
(203, '2025-2026', 'Destreza', 'Domina fundamentos técnicos de al menos un deporte específico.', 113, 5, 54, 2),
(204, '2025-2026', 'Equipo', 'Organiza y participa en actividades deportivas como juez/árbitro.', 113, 5, 54, 2),
(205, '2025-2026', 'Organización', 'Planifica proyectos a mediano plazo con metas y plazos.', 114, 5, 54, 2),
(206, '2025-2026', 'Responsabilidad', 'Asume roles de liderazgo en actividades escolares.', 114, 5, 54, 2),
(207, '2025-2026', 'Participación', 'Coordina equipos de trabajo para proyectos interdisciplinarios.', 114, 5, 54, 2),
(208, '2025-2026', 'Creatividad', 'Diseña soluciones innovadoras a problemas comunitarios.', 114, 5, 54, 2),
(209, '2025-2026', 'Autonomía', 'Desarrolla proyectos de investigación con metodología básica.', 114, 5, 54, 2),
(210, '2025-2026', 'Disciplina', 'Ejemplifica conductas positivas para sus compañeros.', 115, 5, 54, 2),
(211, '2025-2026', 'Puntualidad', 'Administra su tiempo para cumplir con múltiples responsabilidades.', 115, 5, 54, 2),
(212, '2025-2026', 'Presentación', 'Mantiene un portafolio organizado con evidencias de aprendizaje.', 115, 5, 54, 2),
(213, '2025-2026', 'Esfuerzo', 'Persiste en actividades desafiantes mostrando resiliencia.', 115, 5, 54, 2),
(214, '2025-2026', 'Colaboración', 'Media en conflictos entre compañeros buscando soluciones.', 115, 5, 54, 2),
(215, '2025-2026', 'Creatividad', 'Diseña y construye una maqueta de un sistema solar.', 116, 5, 54, 2),
(216, '2025-2026', 'Motricidad', 'Elabora un tejido básico usando técnicas manuales.', 116, 5, 54, 2),
(217, '2025-2026', 'Técnica', 'Realiza una escultura en arcilla sobre un tema histórico.', 116, 5, 54, 2),
(218, '2025-2026', 'Tradición', 'Confecciona un traje típico venezolano en miniatura.', 116, 5, 54, 2),
(219, '2025-2026', 'Expresión', 'Crea una historieta sobre valores ciudadanos.', 116, 5, 54, 2),
(220, '2025-2026', 'Lectura', 'Analiza textos argumentativos identificando tesis y argumentos.', 111, 6, 53, 2),
(221, '2025-2026', 'Escritura', 'Redacta un ensayo breve sobre un tema de interés social.', 111, 6, 53, 2),
(222, '2025-2026', 'Gramática', 'Reconoce y utiliza correctamente nexos en textos argumentativos.', 111, 6, 53, 2),
(223, '2025-2026', 'Comprensión', 'Sintetiza información de múltiples fuentes en un organizador gráfico.', 111, 6, 53, 2),
(224, '2025-2026', 'Expresión', 'Prepara y defiende una posición en un debate formal.', 111, 6, 53, 2),
(225, '2025-2026', 'Historia', 'Investiga sobre la democracia en Venezuela y sus características.', 112, 6, 53, 2),
(226, '2025-2026', 'Geografía', 'Elabora un mapa temático sobre los recursos económicos de Venezuela.', 112, 6, 53, 2),
(227, '2025-2026', 'Cívica', 'Analiza la estructura del Estado venezolano y sus poderes.', 112, 6, 53, 2),
(228, '2025-2026', 'Efemérides', 'Realiza una investigación sobre los hitos del siglo XX en Venezuela.', 112, 6, 53, 2),
(229, '2025-2026', 'Investigación', 'Presenta un proyecto sobre desarrollo sostenible en su comunidad.', 112, 6, 53, 2),
(230, '2025-2026', 'Habilidades', 'Ejecuta circuitos de entrenamiento con énfasis en resistencia.', 113, 6, 53, 2),
(231, '2025-2026', 'Juegos', 'Participa en torneos deportivos aplicando estrategias básicas.', 113, 6, 53, 2),
(232, '2025-2026', 'Salud', 'Elabora un plan de vida saludable considerando alimentación y ejercicio.', 113, 6, 53, 2),
(233, '2025-2026', 'Destreza', 'Domina fundamentos técnicos y tácticos de un deporte específico.', 113, 6, 53, 2),
(234, '2025-2026', 'Equipo', 'Organiza eventos deportivos asumiendo roles organizativos.', 113, 6, 53, 2),
(235, '2025-2026', 'Organización', 'Planifica y ejecuta proyectos a largo plazo con evaluación incluida.', 114, 6, 53, 2),
(236, '2025-2026', 'Responsabilidad', 'Asume roles de liderazgo en la organización escolar.', 114, 6, 53, 2),
(237, '2025-2026', 'Participación', 'Representa a su grado en actividades intergrado.', 114, 6, 53, 2),
(238, '2025-2026', 'Creatividad', 'Diseña e implementa soluciones innovadoras a problemas reales.', 114, 6, 53, 2),
(239, '2025-2026', 'Autonomía', 'Desarrolla proyectos de investigación con metodología adecuada.', 114, 6, 53, 2),
(240, '2025-2026', 'Disciplina', 'Ejerce autodisciplina y es modelo para grados inferiores.', 115, 6, 53, 2),
(241, '2025-2026', 'Puntualidad', 'Gestiona su tiempo eficientemente para múltiples responsabilidades.', 115, 6, 53, 2),
(242, '2025-2026', 'Presentación', 'Mantiene un portafolio completo y bien organizado.', 115, 6, 53, 2),
(243, '2025-2026', 'Esfuerzo', 'Enfrenta desafíos académicos con perseverancia y estrategias.', 115, 6, 53, 2),
(244, '2025-2026', 'Colaboración', 'Lidera equipos de trabajo promoviendo la inclusión.', 115, 6, 53, 2),
(245, '2025-2026', 'Creatividad', 'Diseña y construye una maqueta de un proyecto comunitario.', 116, 6, 53, 2),
(246, '2025-2026', 'Motricidad', 'Elabora un proyecto de arte usando técnicas mixtas.', 116, 6, 53, 2),
(247, '2025-2026', 'Técnica', 'Realiza una exposición artística con un tema social.', 116, 6, 53, 2),
(248, '2025-2026', 'Tradición', 'Confecciona una pieza de arte que represente la identidad nacional.', 116, 6, 53, 2),
(249, '2025-2026', 'Expresión', 'Crea un mural colectivo sobre valores para la convivencia.', 116, 6, 53, 2);

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
(1, '2025-2026', 1, 'Lapso Único', 47, 111, 60, 'EX', 30, 'Contenidos', NULL),
(2, '2025-2026', 1, 'Lapso Único', 47, 111, 59, 'EX', 30, 'Contenidos', NULL),
(3, '2025-2026', 1, 'Lapso Único', 47, 111, 58, 'EX', 30, 'Contenidos', NULL),
(4, '2025-2026', 1, 'Lapso Único', 47, 111, 57, 'EX', 30, 'Contenidos', NULL),
(5, '2025-2026', 1, 'Lapso Único', 47, 111, 56, 'EX', 30, 'Contenidos', NULL),
(6, '2025-2026', 1, 'Lapso Único', 47, 111, 55, 'EX', 30, 'Contenidos', NULL),
(7, '2025-2026', 1, 'Lapso Único', 47, 111, 54, 'EX', 30, 'Contenidos', NULL),
(8, '2025-2026', 1, 'Lapso Único', 47, 111, 53, 'EX', 30, 'Contenidos', NULL),
(9, '2025-2026', 1, 'Lapso Único', 47, 111, 52, 'EX', 30, 'Contenidos', NULL),
(10, '2025-2026', 1, 'Lapso Único', 47, 111, 51, 'EX', 30, 'Contenidos', NULL),
(11, '2025-2026', 1, 'Lapso Único', 47, 111, 51, 'MB', 35, 'Caligrafía', NULL),
(12, '2025-2026', 1, 'Lapso Único', 47, 111, 52, 'MB', 35, 'Caligrafía', NULL),
(13, '2025-2026', 1, 'Lapso Único', 47, 111, 60, 'MB', 35, 'Caligrafía', NULL),
(14, '2025-2026', 1, 'Lapso Único', 47, 111, 59, 'MB', 35, 'Caligrafía', NULL),
(15, '2025-2026', 1, 'Lapso Único', 47, 111, 58, 'MB', 35, 'Caligrafía', NULL),
(16, '2025-2026', 1, 'Lapso Único', 47, 111, 57, 'MB', 35, 'Caligrafía', NULL),
(17, '2025-2026', 1, 'Lapso Único', 47, 111, 56, 'MB', 35, 'Caligrafía', NULL),
(18, '2025-2026', 1, 'Lapso Único', 47, 111, 55, 'MB', 35, 'Caligrafía', NULL),
(19, '2025-2026', 1, 'Lapso Único', 47, 111, 54, 'MB', 35, 'Caligrafía', NULL),
(20, '2025-2026', 1, 'Lapso Único', 47, 111, 53, 'MB', 35, 'Caligrafía', NULL),
(21, '2025-2026', 1, 'Lapso Único', 47, 111, 60, 'B', 36, 'Caligrafía', NULL),
(22, '2025-2026', 1, 'Lapso Único', 47, 111, 59, 'B', 36, 'Caligrafía', NULL),
(23, '2025-2026', 1, 'Lapso Único', 47, 111, 58, 'B', 36, 'Caligrafía', NULL),
(24, '2025-2026', 1, 'Lapso Único', 47, 111, 57, 'B', 36, 'Caligrafía', NULL),
(25, '2025-2026', 1, 'Lapso Único', 47, 111, 56, 'B', 36, 'Caligrafía', NULL),
(26, '2025-2026', 1, 'Lapso Único', 47, 111, 55, 'B', 36, 'Caligrafía', NULL),
(27, '2025-2026', 1, 'Lapso Único', 47, 111, 54, 'B', 36, 'Caligrafía', NULL),
(28, '2025-2026', 1, 'Lapso Único', 47, 111, 53, 'B', 36, 'Caligrafía', NULL),
(29, '2025-2026', 1, 'Lapso Único', 47, 111, 52, 'B', 36, 'Caligrafía', NULL),
(30, '2025-2026', 1, 'Lapso Único', 47, 111, 51, 'B', 36, 'Caligrafía', NULL),
(31, '2025-2026', 1, 'Lapso Único', 47, 111, 51, 'MB', 38, 'Escritura', NULL),
(32, '2025-2026', 1, 'Lapso Único', 47, 111, 52, 'MB', 38, 'Escritura', NULL),
(33, '2025-2026', 1, 'Lapso Único', 47, 111, 53, 'MB', 38, 'Escritura', NULL),
(34, '2025-2026', 1, 'Lapso Único', 47, 111, 54, 'MB', 38, 'Escritura', NULL),
(35, '2025-2026', 1, 'Lapso Único', 47, 111, 55, 'MB', 38, 'Escritura', NULL),
(36, '2025-2026', 1, 'Lapso Único', 47, 111, 56, 'MB', 38, 'Escritura', NULL),
(37, '2025-2026', 1, 'Lapso Único', 47, 111, 57, 'MB', 38, 'Escritura', NULL),
(38, '2025-2026', 1, 'Lapso Único', 47, 111, 58, 'MB', 38, 'Escritura', NULL),
(39, '2025-2026', 1, 'Lapso Único', 47, 111, 59, 'MB', 38, 'Escritura', NULL),
(40, '2025-2026', 1, 'Lapso Único', 47, 111, 60, 'MB', 38, 'Escritura', NULL),
(41, '2025-2026', 1, 'Lapso Único', 47, 111, 51, 'EX', 37, 'Escritura', NULL),
(42, '2025-2026', 1, 'Lapso Único', 47, 111, 52, 'EX', 37, 'Escritura', NULL),
(43, '2025-2026', 1, 'Lapso Único', 47, 111, 53, 'EX', 37, 'Escritura', NULL),
(44, '2025-2026', 1, 'Lapso Único', 47, 111, 60, 'MB', 37, 'Escritura', NULL),
(45, '2025-2026', 1, 'Lapso Único', 47, 111, 59, 'MB', 37, 'Escritura', NULL),
(46, '2025-2026', 1, 'Lapso Único', 47, 111, 58, 'EX', 37, 'Escritura', NULL),
(47, '2025-2026', 1, 'Lapso Único', 47, 111, 57, 'EX', 37, 'Escritura', NULL),
(48, '2025-2026', 1, 'Lapso Único', 47, 111, 56, 'EX', 37, 'Escritura', NULL),
(49, '2025-2026', 1, 'Lapso Único', 47, 111, 55, 'EX', 37, 'Escritura', NULL),
(50, '2025-2026', 1, 'Lapso Único', 47, 111, 54, 'EX', 37, 'Escritura', NULL),
(51, '2025-2026', 1, 'Lapso Único', 47, 111, 51, 'EX', 40, 'Escritura', NULL),
(52, '2025-2026', 1, 'Lapso Único', 47, 111, 52, 'EX', 40, 'Escritura', NULL),
(53, '2025-2026', 1, 'Lapso Único', 47, 111, 53, 'EX', 40, 'Escritura', NULL),
(54, '2025-2026', 1, 'Lapso Único', 47, 111, 54, 'EX', 40, 'Escritura', NULL),
(55, '2025-2026', 1, 'Lapso Único', 47, 111, 55, 'EX', 40, 'Escritura', NULL),
(56, '2025-2026', 1, 'Lapso Único', 47, 111, 56, 'EX', 40, 'Escritura', NULL),
(57, '2025-2026', 1, 'Lapso Único', 47, 111, 57, 'EX', 40, 'Escritura', NULL),
(58, '2025-2026', 1, 'Lapso Único', 47, 111, 58, 'EX', 40, 'Escritura', NULL),
(59, '2025-2026', 1, 'Lapso Único', 47, 111, 59, 'EX', 40, 'Escritura', NULL),
(60, '2025-2026', 1, 'Lapso Único', 47, 111, 60, 'EX', 40, 'Escritura', NULL),
(61, '2025-2026', 1, 'Lapso Único', 47, 112, 60, 'EX', 41, 'Contenidos', NULL),
(62, '2025-2026', 1, 'Lapso Único', 47, 112, 59, 'EX', 41, 'Contenidos', NULL),
(63, '2025-2026', 1, 'Lapso Único', 47, 112, 58, 'EX', 41, 'Contenidos', NULL),
(64, '2025-2026', 1, 'Lapso Único', 47, 112, 57, 'EX', 41, 'Contenidos', NULL),
(65, '2025-2026', 1, 'Lapso Único', 47, 112, 56, 'EX', 41, 'Contenidos', NULL),
(66, '2025-2026', 1, 'Lapso Único', 47, 112, 55, 'EX', 41, 'Contenidos', NULL),
(67, '2025-2026', 1, 'Lapso Único', 47, 112, 54, 'EX', 41, 'Contenidos', NULL),
(68, '2025-2026', 1, 'Lapso Único', 47, 112, 53, 'EX', 41, 'Contenidos', NULL),
(69, '2025-2026', 1, 'Lapso Único', 47, 112, 52, 'EX', 41, 'Contenidos', NULL),
(70, '2025-2026', 1, 'Lapso Único', 47, 112, 51, 'EX', 41, 'Contenidos', NULL),
(71, '2025-2026', 1, 'Lapso Único', 47, 112, 60, 'MB', 42, 'Contenidos', NULL),
(72, '2025-2026', 1, 'Lapso Único', 47, 112, 59, 'MB', 42, 'Contenidos', NULL),
(73, '2025-2026', 1, 'Lapso Único', 47, 112, 58, 'MB', 42, 'Contenidos', NULL),
(74, '2025-2026', 1, 'Lapso Único', 47, 112, 57, 'MB', 42, 'Contenidos', NULL),
(75, '2025-2026', 1, 'Lapso Único', 47, 112, 56, 'MB', 42, 'Contenidos', NULL),
(76, '2025-2026', 1, 'Lapso Único', 47, 112, 55, 'MB', 42, 'Contenidos', NULL),
(77, '2025-2026', 1, 'Lapso Único', 47, 112, 54, 'MB', 42, 'Contenidos', NULL),
(78, '2025-2026', 1, 'Lapso Único', 47, 112, 53, 'MB', 42, 'Contenidos', NULL),
(79, '2025-2026', 1, 'Lapso Único', 47, 112, 52, 'MB', 42, 'Contenidos', NULL),
(80, '2025-2026', 1, 'Lapso Único', 47, 112, 51, 'MB', 42, 'Contenidos', NULL),
(81, '2025-2026', 1, 'Lapso Único', 47, 112, 60, 'MB', 43, 'Contenidos', NULL),
(82, '2025-2026', 1, 'Lapso Único', 47, 112, 59, 'MB', 43, 'Contenidos', NULL),
(83, '2025-2026', 1, 'Lapso Único', 47, 112, 58, 'MB', 43, 'Contenidos', NULL),
(84, '2025-2026', 1, 'Lapso Único', 47, 112, 57, 'MB', 43, 'Contenidos', NULL),
(85, '2025-2026', 1, 'Lapso Único', 47, 112, 56, 'MB', 43, 'Contenidos', NULL),
(86, '2025-2026', 1, 'Lapso Único', 47, 112, 55, 'MB', 43, 'Contenidos', NULL),
(87, '2025-2026', 1, 'Lapso Único', 47, 112, 54, 'MB', 43, 'Contenidos', NULL),
(88, '2025-2026', 1, 'Lapso Único', 47, 112, 53, 'MB', 43, 'Contenidos', NULL),
(89, '2025-2026', 1, 'Lapso Único', 47, 112, 52, 'MB', 43, 'Contenidos', NULL),
(90, '2025-2026', 1, 'Lapso Único', 47, 112, 51, 'MB', 43, 'Contenidos', NULL),
(91, '2025-2026', 1, 'Lapso Único', 47, 112, 60, 'B', 44, 'Contenidos', NULL),
(92, '2025-2026', 1, 'Lapso Único', 47, 112, 59, 'B', 44, 'Contenidos', NULL),
(93, '2025-2026', 1, 'Lapso Único', 47, 112, 58, 'B', 44, 'Contenidos', NULL),
(94, '2025-2026', 1, 'Lapso Único', 47, 112, 57, 'B', 44, 'Contenidos', NULL),
(95, '2025-2026', 1, 'Lapso Único', 47, 112, 56, 'B', 44, 'Contenidos', NULL),
(96, '2025-2026', 1, 'Lapso Único', 47, 112, 55, 'B', 44, 'Contenidos', NULL),
(97, '2025-2026', 1, 'Lapso Único', 47, 112, 54, 'B', 44, 'Contenidos', NULL),
(98, '2025-2026', 1, 'Lapso Único', 47, 112, 53, 'B', 44, 'Contenidos', NULL),
(99, '2025-2026', 1, 'Lapso Único', 47, 112, 52, 'B', 44, 'Contenidos', NULL),
(100, '2025-2026', 1, 'Lapso Único', 47, 112, 51, 'B', 44, 'Contenidos', NULL),
(101, '2025-2026', 1, 'Lapso Único', 47, 112, 60, 'MB', 105, 'Efemérides', NULL),
(102, '2025-2026', 1, 'Lapso Único', 47, 112, 59, 'MB', 105, 'Efemérides', NULL),
(103, '2025-2026', 1, 'Lapso Único', 47, 112, 58, 'MB', 105, 'Efemérides', NULL),
(104, '2025-2026', 1, 'Lapso Único', 47, 112, 57, 'MB', 105, 'Efemérides', NULL),
(105, '2025-2026', 1, 'Lapso Único', 47, 112, 56, 'MB', 105, 'Efemérides', NULL),
(106, '2025-2026', 1, 'Lapso Único', 47, 112, 55, 'MB', 105, 'Efemérides', NULL),
(107, '2025-2026', 1, 'Lapso Único', 47, 112, 54, 'MB', 105, 'Efemérides', NULL),
(108, '2025-2026', 1, 'Lapso Único', 47, 112, 53, 'MB', 105, 'Efemérides', NULL),
(109, '2025-2026', 1, 'Lapso Único', 47, 112, 52, 'MB', 105, 'Efemérides', NULL),
(110, '2025-2026', 1, 'Lapso Único', 47, 112, 51, 'MB', 105, 'Efemérides', NULL),
(111, '2025-2026', 1, 'Lapso Único', 47, 113, 60, 'B', 110, 'Habilidades', NULL),
(112, '2025-2026', 1, 'Lapso Único', 47, 113, 59, 'B', 110, 'Habilidades', NULL),
(113, '2025-2026', 1, 'Lapso Único', 47, 113, 58, 'B', 110, 'Habilidades', NULL),
(114, '2025-2026', 1, 'Lapso Único', 47, 113, 57, 'B', 110, 'Habilidades', NULL),
(115, '2025-2026', 1, 'Lapso Único', 47, 113, 56, 'B', 110, 'Habilidades', NULL),
(116, '2025-2026', 1, 'Lapso Único', 47, 113, 55, 'B', 110, 'Habilidades', NULL),
(117, '2025-2026', 1, 'Lapso Único', 47, 113, 54, 'B', 110, 'Habilidades', NULL),
(118, '2025-2026', 1, 'Lapso Único', 47, 113, 53, 'B', 110, 'Habilidades', NULL),
(119, '2025-2026', 1, 'Lapso Único', 47, 113, 52, 'B', 110, 'Habilidades', NULL),
(120, '2025-2026', 1, 'Lapso Único', 47, 113, 51, 'B', 110, 'Habilidades', NULL),
(121, '2025-2026', 1, 'Lapso Único', 47, 113, 60, 'B', 111, 'Juegos', NULL),
(122, '2025-2026', 1, 'Lapso Único', 47, 113, 59, 'B', 111, 'Juegos', NULL),
(123, '2025-2026', 1, 'Lapso Único', 47, 113, 58, 'B', 111, 'Juegos', NULL),
(124, '2025-2026', 1, 'Lapso Único', 47, 113, 57, 'B', 111, 'Juegos', NULL),
(125, '2025-2026', 1, 'Lapso Único', 47, 113, 56, 'B', 111, 'Juegos', NULL),
(126, '2025-2026', 1, 'Lapso Único', 47, 113, 55, 'B', 111, 'Juegos', NULL),
(127, '2025-2026', 1, 'Lapso Único', 47, 113, 54, 'B', 111, 'Juegos', NULL),
(128, '2025-2026', 1, 'Lapso Único', 47, 113, 53, 'B', 111, 'Juegos', NULL),
(129, '2025-2026', 1, 'Lapso Único', 47, 113, 52, 'B', 111, 'Juegos', NULL),
(130, '2025-2026', 1, 'Lapso Único', 47, 113, 51, 'B', 111, 'Juegos', NULL),
(131, '2025-2026', 1, 'Lapso Único', 47, 113, 60, 'B', 112, 'Equipo', NULL),
(132, '2025-2026', 1, 'Lapso Único', 47, 113, 59, 'B', 112, 'Equipo', NULL),
(133, '2025-2026', 1, 'Lapso Único', 47, 113, 58, 'B', 112, 'Equipo', NULL),
(134, '2025-2026', 1, 'Lapso Único', 47, 113, 57, 'B', 112, 'Equipo', NULL),
(135, '2025-2026', 1, 'Lapso Único', 47, 113, 56, 'B', 112, 'Equipo', NULL),
(136, '2025-2026', 1, 'Lapso Único', 47, 113, 55, 'B', 112, 'Equipo', NULL),
(137, '2025-2026', 1, 'Lapso Único', 47, 113, 54, 'B', 112, 'Equipo', NULL),
(138, '2025-2026', 1, 'Lapso Único', 47, 113, 53, 'B', 112, 'Equipo', NULL),
(139, '2025-2026', 1, 'Lapso Único', 47, 113, 52, 'B', 112, 'Equipo', NULL),
(140, '2025-2026', 1, 'Lapso Único', 47, 113, 51, 'B', 112, 'Equipo', NULL),
(141, '2025-2026', 1, 'Lapso Único', 47, 113, 51, 'MB', 141, 'Juegos', NULL),
(142, '2025-2026', 1, 'Lapso Único', 47, 113, 52, 'MB', 141, 'Juegos', NULL),
(143, '2025-2026', 1, 'Lapso Único', 47, 113, 53, 'MB', 141, 'Juegos', NULL),
(144, '2025-2026', 1, 'Lapso Único', 47, 113, 54, 'MB', 141, 'Juegos', NULL),
(145, '2025-2026', 1, 'Lapso Único', 47, 113, 55, 'MB', 141, 'Juegos', NULL),
(146, '2025-2026', 1, 'Lapso Único', 47, 113, 56, 'MB', 141, 'Juegos', NULL),
(147, '2025-2026', 1, 'Lapso Único', 47, 113, 57, 'MB', 141, 'Juegos', NULL),
(148, '2025-2026', 1, 'Lapso Único', 47, 113, 58, 'MB', 141, 'Juegos', NULL),
(149, '2025-2026', 1, 'Lapso Único', 47, 113, 59, 'MB', 141, 'Juegos', NULL),
(150, '2025-2026', 1, 'Lapso Único', 47, 113, 60, 'MB', 141, 'Juegos', NULL),
(151, '2025-2026', 1, 'Lapso Único', 47, 114, 51, 'EX', 45, 'Contenidos', NULL),
(152, '2025-2026', 1, 'Lapso Único', 47, 114, 52, 'EX', 45, 'Contenidos', NULL),
(153, '2025-2026', 1, 'Lapso Único', 47, 114, 53, 'EX', 45, 'Contenidos', NULL),
(154, '2025-2026', 1, 'Lapso Único', 47, 114, 54, 'EX', 45, 'Contenidos', NULL),
(155, '2025-2026', 1, 'Lapso Único', 47, 114, 55, 'EX', 45, 'Contenidos', NULL),
(156, '2025-2026', 1, 'Lapso Único', 47, 114, 56, 'EX', 45, 'Contenidos', NULL),
(157, '2025-2026', 1, 'Lapso Único', 47, 114, 57, 'EX', 45, 'Contenidos', NULL),
(158, '2025-2026', 1, 'Lapso Único', 47, 114, 58, 'EX', 45, 'Contenidos', NULL),
(159, '2025-2026', 1, 'Lapso Único', 47, 114, 59, 'EX', 45, 'Contenidos', NULL),
(160, '2025-2026', 1, 'Lapso Único', 47, 114, 60, 'EX', 45, 'Contenidos', NULL),
(161, '2025-2026', 1, 'Lapso Único', 47, 114, 60, 'B', 46, 'Contenidos', NULL),
(162, '2025-2026', 1, 'Lapso Único', 47, 114, 59, 'B', 46, 'Contenidos', NULL),
(163, '2025-2026', 1, 'Lapso Único', 47, 114, 58, 'B', 46, 'Contenidos', NULL),
(164, '2025-2026', 1, 'Lapso Único', 47, 114, 57, 'B', 46, 'Contenidos', NULL),
(165, '2025-2026', 1, 'Lapso Único', 47, 114, 56, 'B', 46, 'Contenidos', NULL),
(166, '2025-2026', 1, 'Lapso Único', 47, 114, 55, 'B', 46, 'Contenidos', NULL),
(167, '2025-2026', 1, 'Lapso Único', 47, 114, 54, 'B', 46, 'Contenidos', NULL),
(168, '2025-2026', 1, 'Lapso Único', 47, 114, 53, 'B', 46, 'Contenidos', NULL),
(169, '2025-2026', 1, 'Lapso Único', 47, 114, 52, 'B', 46, 'Contenidos', NULL),
(170, '2025-2026', 1, 'Lapso Único', 47, 114, 51, 'B', 46, 'Contenidos', NULL),
(171, '2025-2026', 1, 'Lapso Único', 47, 114, 60, 'MB', 117, 'Participación', NULL),
(172, '2025-2026', 1, 'Lapso Único', 47, 114, 59, 'MB', 117, 'Participación', NULL),
(173, '2025-2026', 1, 'Lapso Único', 47, 114, 58, 'MB', 117, 'Participación', NULL),
(174, '2025-2026', 1, 'Lapso Único', 47, 114, 57, 'MB', 117, 'Participación', NULL),
(175, '2025-2026', 1, 'Lapso Único', 47, 114, 56, 'MB', 117, 'Participación', NULL),
(176, '2025-2026', 1, 'Lapso Único', 47, 114, 55, 'MB', 117, 'Participación', NULL),
(177, '2025-2026', 1, 'Lapso Único', 47, 114, 54, 'MB', 117, 'Participación', NULL),
(178, '2025-2026', 1, 'Lapso Único', 47, 114, 53, 'MB', 117, 'Participación', NULL),
(179, '2025-2026', 1, 'Lapso Único', 47, 114, 52, 'MB', 117, 'Participación', NULL),
(180, '2025-2026', 1, 'Lapso Único', 47, 114, 51, 'MB', 117, 'Participación', NULL),
(181, '2025-2026', 1, 'Lapso Único', 47, 116, 51, 'EX', 54, 'Contenidos', NULL),
(182, '2025-2026', 1, 'Lapso Único', 47, 116, 52, 'EX', 54, 'Contenidos', NULL),
(183, '2025-2026', 1, 'Lapso Único', 47, 116, 53, 'EX', 54, 'Contenidos', NULL),
(184, '2025-2026', 1, 'Lapso Único', 47, 116, 59, 'EX', 54, 'Contenidos', NULL),
(185, '2025-2026', 1, 'Lapso Único', 47, 116, 60, 'EX', 54, 'Contenidos', NULL),
(186, '2025-2026', 1, 'Lapso Único', 47, 116, 58, 'EX', 54, 'Contenidos', NULL),
(187, '2025-2026', 1, 'Lapso Único', 47, 116, 57, 'EX', 54, 'Contenidos', NULL),
(188, '2025-2026', 1, 'Lapso Único', 47, 116, 56, 'EX', 54, 'Contenidos', NULL),
(189, '2025-2026', 1, 'Lapso Único', 47, 116, 55, 'EX', 54, 'Contenidos', NULL),
(190, '2025-2026', 1, 'Lapso Único', 47, 116, 54, 'EX', 54, 'Contenidos', NULL),
(191, '2025-2026', 2, 'Lapso Único', 51, 111, 70, 'EX', 100, 'Lectura', NULL),
(192, '2025-2026', 2, 'Lapso Único', 51, 111, 69, 'EX', 100, 'Lectura', NULL),
(193, '2025-2026', 2, 'Lapso Único', 51, 111, 68, 'EX', 100, 'Lectura', NULL),
(194, '2025-2026', 2, 'Lapso Único', 51, 111, 67, 'EX', 100, 'Lectura', NULL),
(195, '2025-2026', 2, 'Lapso Único', 51, 111, 66, 'EX', 100, 'Lectura', NULL),
(196, '2025-2026', 2, 'Lapso Único', 51, 111, 65, 'EX', 100, 'Lectura', NULL),
(197, '2025-2026', 2, 'Lapso Único', 51, 111, 64, 'EX', 100, 'Lectura', NULL),
(198, '2025-2026', 2, 'Lapso Único', 51, 111, 63, 'EX', 100, 'Lectura', NULL),
(199, '2025-2026', 2, 'Lapso Único', 51, 111, 62, 'EX', 100, 'Lectura', NULL),
(200, '2025-2026', 2, 'Lapso Único', 51, 111, 61, 'EX', 100, 'Lectura', NULL),
(201, '2025-2026', 2, 'Lapso Único', 51, 111, 70, 'MB', 101, 'Escritura', NULL),
(202, '2025-2026', 2, 'Lapso Único', 51, 111, 69, 'MB', 101, 'Escritura', NULL),
(203, '2025-2026', 2, 'Lapso Único', 51, 111, 68, 'MB', 101, 'Escritura', NULL),
(204, '2025-2026', 2, 'Lapso Único', 51, 111, 67, 'MB', 101, 'Escritura', NULL),
(205, '2025-2026', 2, 'Lapso Único', 51, 111, 66, 'MB', 101, 'Escritura', NULL),
(206, '2025-2026', 2, 'Lapso Único', 51, 111, 65, 'MB', 101, 'Escritura', NULL),
(207, '2025-2026', 2, 'Lapso Único', 51, 111, 64, 'MB', 101, 'Escritura', NULL),
(208, '2025-2026', 2, 'Lapso Único', 51, 111, 63, 'MB', 101, 'Escritura', NULL),
(209, '2025-2026', 2, 'Lapso Único', 51, 111, 62, 'MB', 101, 'Escritura', NULL),
(210, '2025-2026', 2, 'Lapso Único', 51, 111, 61, 'MB', 101, 'Escritura', NULL),
(211, '2025-2026', 2, 'Lapso Único', 51, 111, 70, 'B', 102, 'Ortografía', NULL),
(212, '2025-2026', 2, 'Lapso Único', 51, 111, 69, 'B', 102, 'Ortografía', NULL),
(213, '2025-2026', 2, 'Lapso Único', 51, 111, 68, 'B', 102, 'Ortografía', NULL),
(214, '2025-2026', 2, 'Lapso Único', 51, 111, 67, 'B', 102, 'Ortografía', NULL),
(215, '2025-2026', 2, 'Lapso Único', 51, 111, 66, 'B', 102, 'Ortografía', NULL),
(216, '2025-2026', 2, 'Lapso Único', 51, 111, 65, 'B', 102, 'Ortografía', NULL),
(217, '2025-2026', 2, 'Lapso Único', 51, 111, 64, 'B', 102, 'Ortografía', NULL),
(218, '2025-2026', 2, 'Lapso Único', 51, 111, 63, 'B', 102, 'Ortografía', NULL),
(219, '2025-2026', 2, 'Lapso Único', 51, 111, 62, 'B', 102, 'Ortografía', NULL),
(220, '2025-2026', 2, 'Lapso Único', 51, 111, 61, 'B', 102, 'Ortografía', NULL),
(221, '2025-2026', 2, 'Lapso Único', 51, 112, 61, 'EX', 105, 'Efemérides', NULL),
(222, '2025-2026', 2, 'Lapso Único', 51, 112, 62, 'EX', 105, 'Efemérides', NULL),
(223, '2025-2026', 2, 'Lapso Único', 51, 112, 63, 'EX', 105, 'Efemérides', NULL),
(224, '2025-2026', 2, 'Lapso Único', 51, 112, 64, 'EX', 105, 'Efemérides', NULL),
(225, '2025-2026', 2, 'Lapso Único', 51, 112, 65, 'EX', 105, 'Efemérides', NULL),
(226, '2025-2026', 2, 'Lapso Único', 51, 112, 66, 'EX', 105, 'Efemérides', NULL),
(227, '2025-2026', 2, 'Lapso Único', 51, 112, 67, 'EX', 105, 'Efemérides', NULL),
(228, '2025-2026', 2, 'Lapso Único', 51, 112, 68, 'EX', 105, 'Efemérides', NULL),
(229, '2025-2026', 2, 'Lapso Único', 51, 112, 69, 'EX', 105, 'Efemérides', NULL),
(230, '2025-2026', 2, 'Lapso Único', 51, 112, 70, 'EX', 105, 'Efemérides', NULL),
(231, '2025-2026', 2, 'Lapso Único', 51, 112, 70, 'MB', 106, 'Geografía', NULL),
(232, '2025-2026', 2, 'Lapso Único', 51, 112, 69, 'MB', 106, 'Geografía', NULL),
(233, '2025-2026', 2, 'Lapso Único', 51, 112, 68, 'MB', 106, 'Geografía', NULL),
(234, '2025-2026', 2, 'Lapso Único', 51, 112, 67, 'MB', 106, 'Geografía', NULL),
(235, '2025-2026', 2, 'Lapso Único', 51, 112, 66, 'MB', 106, 'Geografía', NULL),
(236, '2025-2026', 2, 'Lapso Único', 51, 112, 65, 'MB', 106, 'Geografía', NULL),
(237, '2025-2026', 2, 'Lapso Único', 51, 112, 64, 'MB', 106, 'Geografía', NULL),
(238, '2025-2026', 2, 'Lapso Único', 51, 112, 63, 'MB', 106, 'Geografía', NULL),
(239, '2025-2026', 2, 'Lapso Único', 51, 112, 62, 'MB', 106, 'Geografía', NULL),
(240, '2025-2026', 2, 'Lapso Único', 51, 112, 61, 'MB', 106, 'Geografía', NULL),
(241, '2025-2026', 2, 'Lapso Único', 51, 112, 61, 'MB', 107, 'Historia', NULL),
(242, '2025-2026', 2, 'Lapso Único', 51, 112, 70, 'MB', 107, 'Historia', NULL),
(243, '2025-2026', 2, 'Lapso Único', 51, 112, 69, 'MB', 107, 'Historia', NULL),
(244, '2025-2026', 2, 'Lapso Único', 51, 112, 68, 'MB', 107, 'Historia', NULL),
(245, '2025-2026', 2, 'Lapso Único', 51, 112, 67, 'MB', 107, 'Historia', NULL),
(246, '2025-2026', 2, 'Lapso Único', 51, 112, 66, 'MB', 107, 'Historia', NULL),
(247, '2025-2026', 2, 'Lapso Único', 51, 112, 65, 'MB', 107, 'Historia', NULL),
(248, '2025-2026', 2, 'Lapso Único', 51, 112, 64, 'MB', 107, 'Historia', NULL),
(249, '2025-2026', 2, 'Lapso Único', 51, 112, 63, 'MB', 107, 'Historia', NULL),
(250, '2025-2026', 2, 'Lapso Único', 51, 112, 62, 'MB', 107, 'Historia', NULL),
(251, '2025-2026', 2, 'Lapso Único', 51, 113, 70, 'MB', 110, 'Habilidades', NULL),
(252, '2025-2026', 2, 'Lapso Único', 51, 113, 69, 'MB', 110, 'Habilidades', NULL),
(253, '2025-2026', 2, 'Lapso Único', 51, 113, 68, 'MB', 110, 'Habilidades', NULL),
(254, '2025-2026', 2, 'Lapso Único', 51, 113, 67, 'MB', 110, 'Habilidades', NULL),
(255, '2025-2026', 2, 'Lapso Único', 51, 113, 66, 'MB', 110, 'Habilidades', NULL),
(256, '2025-2026', 2, 'Lapso Único', 51, 113, 65, 'MB', 110, 'Habilidades', NULL),
(257, '2025-2026', 2, 'Lapso Único', 51, 113, 64, 'MB', 110, 'Habilidades', NULL),
(258, '2025-2026', 2, 'Lapso Único', 51, 113, 63, 'MB', 110, 'Habilidades', NULL),
(259, '2025-2026', 2, 'Lapso Único', 51, 113, 62, 'MB', 110, 'Habilidades', NULL),
(260, '2025-2026', 2, 'Lapso Único', 51, 113, 61, 'MB', 110, 'Habilidades', NULL),
(261, '2025-2026', 2, 'Lapso Único', 51, 113, 70, 'MB', 113, 'Salud', NULL),
(262, '2025-2026', 2, 'Lapso Único', 51, 113, 69, 'MB', 113, 'Salud', NULL),
(263, '2025-2026', 2, 'Lapso Único', 51, 113, 68, 'MB', 113, 'Salud', NULL),
(264, '2025-2026', 2, 'Lapso Único', 51, 113, 67, 'MB', 113, 'Salud', NULL),
(265, '2025-2026', 2, 'Lapso Único', 51, 113, 66, 'MB', 113, 'Salud', NULL),
(266, '2025-2026', 2, 'Lapso Único', 51, 113, 65, 'MB', 113, 'Salud', NULL),
(267, '2025-2026', 2, 'Lapso Único', 51, 113, 64, 'MB', 113, 'Salud', NULL),
(268, '2025-2026', 2, 'Lapso Único', 51, 113, 63, 'MB', 113, 'Salud', NULL),
(269, '2025-2026', 2, 'Lapso Único', 51, 113, 62, 'MB', 113, 'Salud', NULL),
(270, '2025-2026', 2, 'Lapso Único', 51, 113, 61, 'MB', 113, 'Salud', NULL),
(271, '2025-2026', 2, 'Lapso Único', 51, 114, 70, 'B', 115, 'Organización', NULL),
(272, '2025-2026', 2, 'Lapso Único', 51, 114, 69, 'B', 115, 'Organización', NULL),
(273, '2025-2026', 2, 'Lapso Único', 51, 114, 68, 'B', 115, 'Organización', NULL),
(274, '2025-2026', 2, 'Lapso Único', 51, 114, 67, 'B', 115, 'Organización', NULL),
(275, '2025-2026', 2, 'Lapso Único', 51, 114, 66, 'B', 115, 'Organización', NULL),
(276, '2025-2026', 2, 'Lapso Único', 51, 114, 65, 'B', 115, 'Organización', NULL),
(277, '2025-2026', 2, 'Lapso Único', 51, 114, 64, 'B', 115, 'Organización', NULL),
(278, '2025-2026', 2, 'Lapso Único', 51, 114, 63, 'B', 115, 'Organización', NULL),
(279, '2025-2026', 2, 'Lapso Único', 51, 114, 62, 'B', 115, 'Organización', NULL),
(280, '2025-2026', 2, 'Lapso Único', 51, 114, 61, 'B', 115, 'Organización', NULL),
(281, '2025-2026', 2, 'Lapso Único', 51, 114, 70, 'MB', 116, 'Responsabilidad', NULL),
(282, '2025-2026', 2, 'Lapso Único', 51, 114, 69, 'MB', 116, 'Responsabilidad', NULL),
(283, '2025-2026', 2, 'Lapso Único', 51, 114, 68, 'MB', 116, 'Responsabilidad', NULL),
(284, '2025-2026', 2, 'Lapso Único', 51, 114, 67, 'MB', 116, 'Responsabilidad', NULL),
(285, '2025-2026', 2, 'Lapso Único', 51, 114, 66, 'MB', 116, 'Responsabilidad', NULL),
(286, '2025-2026', 2, 'Lapso Único', 51, 114, 65, 'MB', 116, 'Responsabilidad', NULL),
(287, '2025-2026', 2, 'Lapso Único', 51, 114, 64, 'MB', 116, 'Responsabilidad', NULL),
(288, '2025-2026', 2, 'Lapso Único', 51, 114, 63, 'MB', 116, 'Responsabilidad', NULL),
(289, '2025-2026', 2, 'Lapso Único', 51, 114, 62, 'MB', 116, 'Responsabilidad', NULL),
(290, '2025-2026', 2, 'Lapso Único', 51, 114, 61, 'MB', 116, 'Responsabilidad', NULL),
(291, '2025-2026', 2, 'Lapso Único', 51, 114, 70, 'B', 117, 'Participación', NULL),
(292, '2025-2026', 2, 'Lapso Único', 51, 114, 69, 'B', 117, 'Participación', NULL),
(293, '2025-2026', 2, 'Lapso Único', 51, 114, 68, 'B', 117, 'Participación', NULL),
(294, '2025-2026', 2, 'Lapso Único', 51, 114, 67, 'B', 117, 'Participación', NULL),
(295, '2025-2026', 2, 'Lapso Único', 51, 114, 66, 'B', 117, 'Participación', NULL),
(296, '2025-2026', 2, 'Lapso Único', 51, 114, 65, 'B', 117, 'Participación', NULL),
(297, '2025-2026', 2, 'Lapso Único', 51, 114, 64, 'B', 117, 'Participación', NULL),
(298, '2025-2026', 2, 'Lapso Único', 51, 114, 63, 'B', 117, 'Participación', NULL),
(299, '2025-2026', 2, 'Lapso Único', 51, 114, 62, 'B', 117, 'Participación', NULL),
(300, '2025-2026', 2, 'Lapso Único', 51, 114, 61, 'B', 117, 'Participación', NULL),
(301, '2025-2026', 2, 'Lapso Único', 51, 115, 70, 'EX', 120, 'Disciplina', NULL),
(302, '2025-2026', 2, 'Lapso Único', 51, 115, 69, 'EX', 120, 'Disciplina', NULL),
(303, '2025-2026', 2, 'Lapso Único', 51, 115, 68, 'EX', 120, 'Disciplina', NULL),
(304, '2025-2026', 2, 'Lapso Único', 51, 115, 67, 'EX', 120, 'Disciplina', NULL),
(305, '2025-2026', 2, 'Lapso Único', 51, 115, 66, 'EX', 120, 'Disciplina', NULL),
(306, '2025-2026', 2, 'Lapso Único', 51, 115, 65, 'EX', 120, 'Disciplina', NULL),
(307, '2025-2026', 2, 'Lapso Único', 51, 115, 64, 'EX', 120, 'Disciplina', NULL),
(308, '2025-2026', 2, 'Lapso Único', 51, 115, 63, 'EX', 120, 'Disciplina', NULL),
(309, '2025-2026', 2, 'Lapso Único', 51, 115, 62, 'EX', 120, 'Disciplina', NULL),
(310, '2025-2026', 2, 'Lapso Único', 51, 115, 61, 'EX', 120, 'Disciplina', NULL),
(311, '2025-2026', 2, 'Lapso Único', 51, 115, 70, 'EX', 122, 'Presentación', NULL),
(312, '2025-2026', 2, 'Lapso Único', 51, 115, 69, 'EX', 122, 'Presentación', NULL),
(313, '2025-2026', 2, 'Lapso Único', 51, 115, 68, 'EX', 122, 'Presentación', NULL),
(314, '2025-2026', 2, 'Lapso Único', 51, 115, 67, 'EX', 122, 'Presentación', NULL),
(315, '2025-2026', 2, 'Lapso Único', 51, 115, 66, 'EX', 122, 'Presentación', NULL),
(316, '2025-2026', 2, 'Lapso Único', 51, 115, 65, 'EX', 122, 'Presentación', NULL),
(317, '2025-2026', 2, 'Lapso Único', 51, 115, 64, 'EX', 122, 'Presentación', NULL),
(318, '2025-2026', 2, 'Lapso Único', 51, 115, 63, 'EX', 122, 'Presentación', NULL),
(319, '2025-2026', 2, 'Lapso Único', 51, 115, 62, 'EX', 122, 'Presentación', NULL),
(320, '2025-2026', 2, 'Lapso Único', 51, 115, 61, 'EX', 122, 'Presentación', NULL),
(321, '2025-2026', 2, 'Lapso Único', 51, 115, 70, 'B', 124, 'Colaboración', NULL),
(322, '2025-2026', 2, 'Lapso Único', 51, 115, 69, 'B', 124, 'Colaboración', NULL),
(323, '2025-2026', 2, 'Lapso Único', 51, 115, 68, 'B', 124, 'Colaboración', NULL),
(324, '2025-2026', 2, 'Lapso Único', 51, 115, 67, 'B', 124, 'Colaboración', NULL),
(325, '2025-2026', 2, 'Lapso Único', 51, 115, 66, 'B', 124, 'Colaboración', NULL),
(326, '2025-2026', 2, 'Lapso Único', 51, 115, 65, 'B', 124, 'Colaboración', NULL),
(327, '2025-2026', 2, 'Lapso Único', 51, 115, 64, 'B', 124, 'Colaboración', NULL),
(328, '2025-2026', 2, 'Lapso Único', 51, 115, 63, 'B', 124, 'Colaboración', NULL),
(329, '2025-2026', 2, 'Lapso Único', 51, 115, 62, 'B', 124, 'Colaboración', NULL),
(330, '2025-2026', 2, 'Lapso Único', 51, 115, 61, 'B', 124, 'Colaboración', NULL),
(331, '2025-2026', 2, 'Lapso Único', 51, 116, 70, 'MB', 125, 'Creatividad', NULL),
(332, '2025-2026', 2, 'Lapso Único', 51, 116, 69, 'MB', 125, 'Creatividad', NULL),
(333, '2025-2026', 2, 'Lapso Único', 51, 116, 68, 'MB', 125, 'Creatividad', NULL),
(334, '2025-2026', 2, 'Lapso Único', 51, 116, 70, 'B', 126, 'Motricidad', NULL),
(335, '2025-2026', 2, 'Lapso Único', 51, 116, 69, 'B', 126, 'Motricidad', NULL),
(336, '2025-2026', 2, 'Lapso Único', 51, 116, 68, 'B', 126, 'Motricidad', NULL),
(337, '2025-2026', 2, 'Lapso Único', 51, 116, 67, 'B', 126, 'Motricidad', NULL),
(338, '2025-2026', 2, 'Lapso Único', 51, 116, 66, 'B', 126, 'Motricidad', NULL),
(339, '2025-2026', 2, 'Lapso Único', 51, 116, 65, 'B', 126, 'Motricidad', NULL),
(340, '2025-2026', 2, 'Lapso Único', 51, 116, 64, 'B', 126, 'Motricidad', NULL),
(341, '2025-2026', 2, 'Lapso Único', 51, 116, 63, 'B', 126, 'Motricidad', NULL),
(342, '2025-2026', 2, 'Lapso Único', 51, 116, 62, 'B', 126, 'Motricidad', NULL),
(343, '2025-2026', 2, 'Lapso Único', 51, 116, 61, 'B', 126, 'Motricidad', NULL),
(344, '2025-2026', 7, '1er Lapso', 43, 99, 1, '15', NULL, NULL, 15.00),
(345, '2025-2026', 7, '1er Lapso', 43, 99, 10, '14', NULL, NULL, 14.00),
(346, '2025-2026', 7, '1er Lapso', 43, 99, 9, '12', NULL, NULL, 12.00),
(347, '2025-2026', 7, '1er Lapso', 43, 99, 8, '20', NULL, NULL, 20.00),
(348, '2025-2026', 7, '1er Lapso', 43, 99, 7, '15', NULL, NULL, 15.00),
(349, '2025-2026', 7, '1er Lapso', 43, 99, 6, '12', NULL, NULL, 12.00),
(350, '2025-2026', 7, '1er Lapso', 43, 99, 5, '15', NULL, NULL, 15.00),
(351, '2025-2026', 7, '1er Lapso', 43, 99, 4, '14', NULL, NULL, 14.00),
(352, '2025-2026', 7, '1er Lapso', 43, 99, 3, '16', NULL, NULL, 16.00),
(353, '2025-2026', 7, '1er Lapso', 43, 99, 2, '12', NULL, NULL, 12.00),
(354, '2025-2026', 7, '2do Lapso', 43, 99, 1, '20', NULL, NULL, 20.00),
(355, '2025-2026', 7, '2do Lapso', 43, 99, 10, '19', NULL, NULL, 19.00),
(356, '2025-2026', 7, '2do Lapso', 43, 99, 9, '18', NULL, NULL, 18.00),
(357, '2025-2026', 7, '2do Lapso', 43, 99, 8, '14', NULL, NULL, 14.00),
(358, '2025-2026', 7, '2do Lapso', 43, 99, 7, '15', NULL, NULL, 15.00),
(359, '2025-2026', 7, '2do Lapso', 43, 99, 6, '14', NULL, NULL, 14.00),
(360, '2025-2026', 7, '2do Lapso', 43, 99, 5, '12', NULL, NULL, 12.00),
(361, '2025-2026', 7, '2do Lapso', 43, 99, 4, '16', NULL, NULL, 16.00),
(362, '2025-2026', 7, '2do Lapso', 43, 99, 3, '12', NULL, NULL, 12.00),
(363, '2025-2026', 7, '2do Lapso', 43, 99, 2, '14', NULL, NULL, 14.00),
(364, '2025-2026', 7, '3er Lapso', 43, 99, 1, '20', NULL, NULL, 20.00),
(365, '2025-2026', 7, '3er Lapso', 43, 99, 2, '14', NULL, NULL, 14.00),
(366, '2025-2026', 7, '3er Lapso', 43, 99, 3, '15', NULL, NULL, 15.00),
(367, '2025-2026', 7, '3er Lapso', 43, 99, 4, '16', NULL, NULL, 16.00),
(368, '2025-2026', 7, '3er Lapso', 43, 99, 5, '18', NULL, NULL, 18.00),
(369, '2025-2026', 7, '3er Lapso', 43, 99, 6, '19', NULL, NULL, 19.00),
(370, '2025-2026', 7, '3er Lapso', 43, 99, 7, '14', NULL, NULL, 14.00),
(371, '2025-2026', 7, '3er Lapso', 43, 99, 8, '16', NULL, NULL, 16.00),
(372, '2025-2026', 7, '3er Lapso', 43, 99, 9, '18', NULL, NULL, 18.00),
(373, '2025-2026', 7, '3er Lapso', 43, 99, 10, '19', NULL, NULL, 19.00),
(374, '2025-2026', 7, '1er Lapso', 41, 106, 1, '14', NULL, NULL, 14.00),
(375, '2025-2026', 7, '1er Lapso', 41, 106, 2, '16', NULL, NULL, 16.00),
(376, '2025-2026', 7, '1er Lapso', 41, 106, 3, '18', NULL, NULL, 18.00),
(377, '2025-2026', 7, '1er Lapso', 41, 106, 4, '16', NULL, NULL, 16.00),
(378, '2025-2026', 7, '1er Lapso', 41, 106, 5, '14', NULL, NULL, 14.00),
(379, '2025-2026', 7, '1er Lapso', 41, 106, 7, '19', NULL, NULL, 19.00),
(380, '2025-2026', 7, '1er Lapso', 41, 106, 6, '18', NULL, NULL, 18.00),
(381, '2025-2026', 7, '1er Lapso', 41, 106, 8, '20', NULL, NULL, 20.00),
(382, '2025-2026', 7, '1er Lapso', 41, 106, 9, '20', NULL, NULL, 20.00),
(383, '2025-2026', 7, '1er Lapso', 41, 106, 10, '14', NULL, NULL, 14.00),
(384, '2025-2026', 7, '2do Lapso', 41, 106, 1, '20', NULL, NULL, 20.00),
(385, '2025-2026', 7, '2do Lapso', 41, 106, 2, '14', NULL, NULL, 14.00),
(386, '2025-2026', 7, '2do Lapso', 41, 106, 3, '15', NULL, NULL, 15.00),
(387, '2025-2026', 7, '2do Lapso', 41, 106, 4, '16', NULL, NULL, 16.00),
(388, '2025-2026', 7, '2do Lapso', 41, 106, 6, '14', NULL, NULL, 14.00),
(389, '2025-2026', 7, '2do Lapso', 41, 106, 5, '14', NULL, NULL, 14.00),
(390, '2025-2026', 7, '2do Lapso', 41, 106, 7, '12', NULL, NULL, 12.00),
(391, '2025-2026', 7, '2do Lapso', 41, 106, 8, '15', NULL, NULL, 15.00),
(392, '2025-2026', 7, '2do Lapso', 41, 106, 9, '16', NULL, NULL, 16.00),
(393, '2025-2026', 7, '2do Lapso', 41, 106, 10, '14', NULL, NULL, 14.00),
(394, '2025-2026', 7, '3er Lapso', 41, 106, 10, '12', NULL, NULL, 12.00),
(395, '2025-2026', 7, '3er Lapso', 41, 106, 9, '17', NULL, NULL, 17.00),
(396, '2025-2026', 7, '3er Lapso', 41, 106, 8, '14', NULL, NULL, 14.00),
(397, '2025-2026', 7, '3er Lapso', 41, 106, 7, '19', NULL, NULL, 19.00),
(398, '2025-2026', 7, '3er Lapso', 41, 106, 6, '18', NULL, NULL, 18.00),
(399, '2025-2026', 7, '3er Lapso', 41, 106, 5, '14', NULL, NULL, 14.00),
(400, '2025-2026', 7, '3er Lapso', 41, 106, 4, '16', NULL, NULL, 16.00),
(401, '2025-2026', 7, '3er Lapso', 41, 106, 3, '15', NULL, NULL, 15.00),
(402, '2025-2026', 7, '3er Lapso', 41, 106, 2, '14', NULL, NULL, 14.00),
(403, '2025-2026', 7, '3er Lapso', 41, 106, 1, '20', NULL, NULL, 20.00),
(404, '2025-2026', 7, '1er Lapso', 39, 104, 1, '20', NULL, NULL, 20.00),
(405, '2025-2026', 7, '1er Lapso', 39, 104, 2, '14', NULL, NULL, 14.00),
(406, '2025-2026', 7, '1er Lapso', 39, 104, 3, '16', NULL, NULL, 16.00),
(407, '2025-2026', 7, '1er Lapso', 39, 104, 4, '14', NULL, NULL, 14.00),
(408, '2025-2026', 7, '1er Lapso', 39, 104, 5, '12', NULL, NULL, 12.00),
(409, '2025-2026', 7, '1er Lapso', 39, 104, 6, '18', NULL, NULL, 18.00),
(410, '2025-2026', 7, '1er Lapso', 39, 104, 7, '16', NULL, NULL, 16.00),
(411, '2025-2026', 7, '1er Lapso', 39, 104, 8, '14', NULL, NULL, 14.00),
(412, '2025-2026', 7, '1er Lapso', 39, 104, 9, '18', NULL, NULL, 18.00),
(413, '2025-2026', 7, '1er Lapso', 39, 104, 10, '16', NULL, NULL, 16.00),
(414, '2025-2026', 7, '2do Lapso', 39, 104, 1, '20', NULL, NULL, 20.00),
(415, '2025-2026', 7, '2do Lapso', 39, 104, 2, '12', NULL, NULL, 12.00),
(416, '2025-2026', 7, '2do Lapso', 39, 104, 3, '14', NULL, NULL, 14.00),
(417, '2025-2026', 7, '2do Lapso', 39, 104, 4, '16', NULL, NULL, 16.00),
(418, '2025-2026', 7, '2do Lapso', 39, 104, 5, '14', NULL, NULL, 14.00),
(419, '2025-2026', 7, '2do Lapso', 39, 104, 6, '16', NULL, NULL, 16.00),
(420, '2025-2026', 7, '2do Lapso', 39, 104, 7, '18', NULL, NULL, 18.00),
(421, '2025-2026', 7, '2do Lapso', 39, 104, 8, '19', NULL, NULL, 19.00),
(422, '2025-2026', 7, '2do Lapso', 39, 104, 9, '20', NULL, NULL, 20.00),
(423, '2025-2026', 7, '2do Lapso', 39, 104, 10, '14', NULL, NULL, 14.00),
(424, '2025-2026', 7, '3er Lapso', 39, 104, 1, '20', NULL, NULL, 20.00),
(425, '2025-2026', 7, '3er Lapso', 39, 104, 2, '14', NULL, NULL, 14.00),
(426, '2025-2026', 7, '3er Lapso', 39, 104, 3, '16', NULL, NULL, 16.00),
(427, '2025-2026', 7, '3er Lapso', 39, 104, 4, '14', NULL, NULL, 14.00),
(428, '2025-2026', 7, '3er Lapso', 39, 104, 5, '15', NULL, NULL, 15.00),
(429, '2025-2026', 7, '3er Lapso', 39, 104, 6, '20', NULL, NULL, 20.00),
(430, '2025-2026', 7, '3er Lapso', 39, 104, 8, '20', NULL, NULL, 20.00),
(431, '2025-2026', 7, '3er Lapso', 39, 104, 7, '20', NULL, NULL, 20.00),
(432, '2025-2026', 7, '3er Lapso', 39, 104, 9, '14', NULL, NULL, 14.00),
(433, '2025-2026', 7, '3er Lapso', 39, 104, 10, '16', NULL, NULL, 16.00),
(434, '2025-2026', 7, '1er Lapso', 36, 107, 1, '20', NULL, NULL, 20.00),
(435, '2025-2026', 7, '1er Lapso', 36, 107, 2, '14', NULL, NULL, 14.00),
(436, '2025-2026', 7, '1er Lapso', 36, 107, 3, '16', NULL, NULL, 16.00),
(437, '2025-2026', 7, '1er Lapso', 36, 107, 5, '16', NULL, NULL, 16.00),
(438, '2025-2026', 7, '1er Lapso', 36, 107, 4, '14', NULL, NULL, 14.00),
(439, '2025-2026', 7, '1er Lapso', 36, 107, 6, '18', NULL, NULL, 18.00),
(440, '2025-2026', 7, '1er Lapso', 36, 107, 7, '19', NULL, NULL, 19.00),
(441, '2025-2026', 7, '1er Lapso', 36, 107, 8, '14', NULL, NULL, 14.00),
(442, '2025-2026', 7, '1er Lapso', 36, 107, 9, '16', NULL, NULL, 16.00),
(443, '2025-2026', 7, '1er Lapso', 36, 107, 10, '12', NULL, NULL, 12.00),
(444, '2025-2026', 7, '2do Lapso', 36, 107, 1, '20', NULL, NULL, 20.00),
(445, '2025-2026', 7, '2do Lapso', 36, 107, 2, '14', NULL, NULL, 14.00),
(446, '2025-2026', 7, '2do Lapso', 36, 107, 3, '16', NULL, NULL, 16.00),
(447, '2025-2026', 7, '2do Lapso', 36, 107, 4, '12', NULL, NULL, 12.00),
(448, '2025-2026', 7, '2do Lapso', 36, 107, 5, '20', NULL, NULL, 20.00),
(449, '2025-2026', 7, '2do Lapso', 36, 107, 6, '12', NULL, NULL, 12.00),
(450, '2025-2026', 7, '2do Lapso', 36, 107, 7, '14', NULL, NULL, 14.00),
(451, '2025-2026', 7, '2do Lapso', 36, 107, 8, '16', NULL, NULL, 16.00),
(452, '2025-2026', 7, '2do Lapso', 36, 107, 9, '14', NULL, NULL, 14.00),
(453, '2025-2026', 7, '2do Lapso', 36, 107, 10, '18', NULL, NULL, 18.00),
(454, '2025-2026', 7, '3er Lapso', 36, 107, 10, '11', NULL, NULL, 11.00),
(455, '2025-2026', 7, '3er Lapso', 36, 107, 9, '20', NULL, NULL, 20.00),
(456, '2025-2026', 7, '3er Lapso', 36, 107, 8, '16', NULL, NULL, 16.00),
(457, '2025-2026', 7, '3er Lapso', 36, 107, 7, '14', NULL, NULL, 14.00),
(458, '2025-2026', 7, '3er Lapso', 36, 107, 6, '18', NULL, NULL, 18.00),
(459, '2025-2026', 7, '3er Lapso', 36, 107, 4, '16', NULL, NULL, 16.00),
(460, '2025-2026', 7, '3er Lapso', 36, 107, 3, '11', NULL, NULL, 11.00),
(461, '2025-2026', 7, '3er Lapso', 36, 107, 2, '14', NULL, NULL, 14.00),
(462, '2025-2026', 7, '3er Lapso', 36, 107, 1, '20', NULL, NULL, 20.00),
(463, '2025-2026', 7, '1er Lapso', 38, 108, 10, '16', NULL, NULL, 16.00),
(464, '2025-2026', 7, '1er Lapso', 38, 108, 9, '15', NULL, NULL, 15.00),
(465, '2025-2026', 7, '1er Lapso', 38, 108, 8, '15', NULL, NULL, 15.00),
(466, '2025-2026', 7, '1er Lapso', 38, 108, 7, '16', NULL, NULL, 16.00),
(467, '2025-2026', 7, '1er Lapso', 38, 108, 6, '16', NULL, NULL, 16.00),
(468, '2025-2026', 7, '1er Lapso', 38, 108, 5, '15', NULL, NULL, 15.00),
(469, '2025-2026', 7, '1er Lapso', 38, 108, 4, '12', NULL, NULL, 12.00),
(470, '2025-2026', 7, '1er Lapso', 38, 108, 3, '16', NULL, NULL, 16.00),
(471, '2025-2026', 7, '1er Lapso', 38, 108, 2, '15', NULL, NULL, 15.00),
(472, '2025-2026', 7, '1er Lapso', 38, 108, 1, '12', NULL, NULL, 12.00),
(473, '2025-2026', 7, '2do Lapso', 38, 108, 10, '10', NULL, NULL, 10.00),
(474, '2025-2026', 7, '2do Lapso', 38, 108, 9, '12', NULL, NULL, 12.00),
(475, '2025-2026', 7, '2do Lapso', 38, 108, 8, '16', NULL, NULL, 16.00),
(476, '2025-2026', 7, '2do Lapso', 38, 108, 7, '14', NULL, NULL, 14.00),
(477, '2025-2026', 7, '2do Lapso', 38, 108, 6, '16', NULL, NULL, 16.00),
(478, '2025-2026', 7, '2do Lapso', 38, 108, 5, '18', NULL, NULL, 18.00),
(479, '2025-2026', 7, '2do Lapso', 38, 108, 4, '14', NULL, NULL, 14.00),
(480, '2025-2026', 7, '2do Lapso', 38, 108, 3, '16', NULL, NULL, 16.00),
(481, '2025-2026', 7, '2do Lapso', 38, 108, 1, '20', NULL, NULL, 20.00),
(482, '2025-2026', 7, '2do Lapso', 38, 108, 2, '14', NULL, NULL, 14.00),
(483, '2025-2026', 7, '1er Lapso', 40, 102, 10, '4', NULL, NULL, 4.00),
(484, '2025-2026', 7, '1er Lapso', 40, 102, 9, '11', NULL, NULL, 11.00),
(485, '2025-2026', 7, '1er Lapso', 40, 102, 8, '10', NULL, NULL, 10.00),
(486, '2025-2026', 7, '1er Lapso', 40, 102, 7, '12', NULL, NULL, 12.00),
(487, '2025-2026', 7, '1er Lapso', 40, 102, 6, '14', NULL, NULL, 14.00),
(488, '2025-2026', 7, '1er Lapso', 40, 102, 5, '15', NULL, NULL, 15.00),
(489, '2025-2026', 7, '1er Lapso', 40, 102, 4, '16', NULL, NULL, 16.00),
(490, '2025-2026', 7, '1er Lapso', 40, 102, 3, '20', NULL, NULL, 20.00),
(491, '2025-2026', 7, '1er Lapso', 40, 102, 2, '12', NULL, NULL, 12.00),
(492, '2025-2026', 7, '1er Lapso', 40, 102, 1, '14', NULL, NULL, 14.00),
(493, '2025-2026', 7, '2do Lapso', 40, 102, 1, '20', NULL, NULL, 20.00),
(494, '2025-2026', 7, '2do Lapso', 40, 102, 3, '16', NULL, NULL, 16.00),
(495, '2025-2026', 7, '2do Lapso', 40, 102, 2, '14', NULL, NULL, 14.00),
(496, '2025-2026', 7, '2do Lapso', 40, 102, 4, '18', NULL, NULL, 18.00),
(497, '2025-2026', 7, '2do Lapso', 40, 102, 5, '16', NULL, NULL, 16.00),
(498, '2025-2026', 7, '2do Lapso', 40, 102, 6, '14', NULL, NULL, 14.00),
(499, '2025-2026', 7, '2do Lapso', 40, 102, 7, '18', NULL, NULL, 18.00),
(500, '2025-2026', 7, '2do Lapso', 40, 102, 8, '12', NULL, NULL, 12.00),
(501, '2025-2026', 7, '2do Lapso', 40, 102, 9, '12', NULL, NULL, 12.00),
(502, '2025-2026', 7, '2do Lapso', 40, 102, 10, '10', NULL, NULL, 10.00),
(503, '2025-2026', 7, '3er Lapso', 40, 102, 1, '20', NULL, NULL, 20.00),
(504, '2025-2026', 7, '3er Lapso', 40, 102, 2, '14', NULL, NULL, 14.00),
(505, '2025-2026', 7, '3er Lapso', 40, 102, 4, '12', NULL, NULL, 12.00),
(506, '2025-2026', 7, '3er Lapso', 40, 102, 5, '12', NULL, NULL, 12.00),
(507, '2025-2026', 7, '3er Lapso', 40, 102, 6, '14', NULL, NULL, 14.00),
(508, '2025-2026', 7, '3er Lapso', 40, 102, 7, '16', NULL, NULL, 16.00),
(509, '2025-2026', 7, '3er Lapso', 40, 102, 8, '18', NULL, NULL, 18.00),
(510, '2025-2026', 7, '3er Lapso', 40, 102, 9, '19', NULL, NULL, 19.00),
(511, '2025-2026', 7, '3er Lapso', 40, 102, 10, '20', NULL, NULL, 20.00),
(512, '2025-2026', 7, '1er Lapso', 37, 105, 1, '16', NULL, NULL, 16.00),
(513, '2025-2026', 7, '1er Lapso', 37, 105, 2, '0', NULL, NULL, 0.00),
(514, '2025-2026', 7, '1er Lapso', 37, 105, 3, '0', NULL, NULL, 0.00),
(515, '2025-2026', 7, '1er Lapso', 37, 105, 4, '0', NULL, NULL, 0.00),
(516, '2025-2026', 7, '1er Lapso', 37, 105, 5, '0', NULL, NULL, 0.00),
(517, '2025-2026', 7, '1er Lapso', 37, 105, 6, '0', NULL, NULL, 0.00),
(518, '2025-2026', 7, '1er Lapso', 37, 105, 7, '0', NULL, NULL, 0.00),
(519, '2025-2026', 7, '1er Lapso', 37, 105, 8, '0', NULL, NULL, 0.00),
(520, '2025-2026', 7, '1er Lapso', 37, 105, 9, '0', NULL, NULL, 0.00),
(521, '2025-2026', 7, '1er Lapso', 37, 105, 10, '0', NULL, NULL, 0.00),
(522, '2025-2026', 7, '2do Lapso', 37, 105, 1, '20', NULL, NULL, 20.00),
(523, '2025-2026', 7, '2do Lapso', 37, 105, 2, '14', NULL, NULL, 14.00),
(524, '2025-2026', 7, '2do Lapso', 37, 105, 3, '16', NULL, NULL, 16.00),
(525, '2025-2026', 7, '2do Lapso', 37, 105, 4, '12', NULL, NULL, 12.00),
(526, '2025-2026', 7, '2do Lapso', 37, 105, 5, '14', NULL, NULL, 14.00),
(527, '2025-2026', 7, '2do Lapso', 37, 105, 6, '16', NULL, NULL, 16.00),
(528, '2025-2026', 7, '2do Lapso', 37, 105, 7, '18', NULL, NULL, 18.00),
(529, '2025-2026', 7, '2do Lapso', 37, 105, 8, '11', NULL, NULL, 11.00),
(530, '2025-2026', 7, '2do Lapso', 37, 105, 9, '20', NULL, NULL, 20.00),
(531, '2025-2026', 7, '2do Lapso', 37, 105, 10, '20', NULL, NULL, 20.00),
(532, '2025-2026', 7, '3er Lapso', 37, 105, 1, '16', NULL, NULL, 16.00),
(533, '2025-2026', 7, '3er Lapso', 37, 105, 2, '12', NULL, NULL, 12.00),
(534, '2025-2026', 7, '3er Lapso', 37, 105, 3, '14', NULL, NULL, 14.00),
(535, '2025-2026', 7, '3er Lapso', 37, 105, 4, '15', NULL, NULL, 15.00),
(536, '2025-2026', 7, '3er Lapso', 37, 105, 5, '18', NULL, NULL, 18.00),
(537, '2025-2026', 7, '3er Lapso', 37, 105, 7, '17', NULL, NULL, 17.00),
(538, '2025-2026', 7, '3er Lapso', 37, 105, 8, '14', NULL, NULL, 14.00),
(539, '2025-2026', 7, '3er Lapso', 37, 105, 9, '17', NULL, NULL, 17.00),
(540, '2025-2026', 7, '3er Lapso', 37, 105, 10, '16', NULL, NULL, 16.00),
(541, '2025-2026', 7, '1er Lapso', 42, 103, 10, '20', NULL, NULL, 20.00),
(542, '2025-2026', 7, '1er Lapso', 42, 103, 9, '20', NULL, NULL, 20.00),
(543, '2025-2026', 7, '1er Lapso', 42, 103, 8, '12', NULL, NULL, 12.00),
(544, '2025-2026', 7, '1er Lapso', 42, 103, 7, '14', NULL, NULL, 14.00),
(545, '2025-2026', 7, '1er Lapso', 42, 103, 6, '16', NULL, NULL, 16.00),
(546, '2025-2026', 7, '1er Lapso', 42, 103, 5, '18', NULL, NULL, 18.00),
(547, '2025-2026', 7, '1er Lapso', 42, 103, 4, '16', NULL, NULL, 16.00),
(548, '2025-2026', 7, '1er Lapso', 42, 103, 3, '14', NULL, NULL, 14.00),
(549, '2025-2026', 7, '1er Lapso', 42, 103, 2, '12', NULL, NULL, 12.00),
(550, '2025-2026', 7, '1er Lapso', 42, 103, 1, '20', NULL, NULL, 20.00),
(551, '2025-2026', 7, '2do Lapso', 42, 103, 1, '20', NULL, NULL, 20.00),
(552, '2025-2026', 7, '2do Lapso', 42, 103, 2, '12', NULL, NULL, 12.00),
(553, '2025-2026', 7, '2do Lapso', 42, 103, 3, '4', NULL, NULL, 4.00),
(554, '2025-2026', 7, '2do Lapso', 42, 103, 4, '14', NULL, NULL, 14.00),
(555, '2025-2026', 7, '2do Lapso', 42, 103, 5, '16', NULL, NULL, 16.00),
(556, '2025-2026', 7, '2do Lapso', 42, 103, 6, '12', NULL, NULL, 12.00),
(557, '2025-2026', 7, '2do Lapso', 42, 103, 7, '12', NULL, NULL, 12.00),
(558, '2025-2026', 7, '2do Lapso', 42, 103, 8, '12', NULL, NULL, 12.00),
(559, '2025-2026', 7, '2do Lapso', 42, 103, 9, '20', NULL, NULL, 20.00),
(560, '2025-2026', 7, '2do Lapso', 42, 103, 10, '11', NULL, NULL, 11.00),
(561, '2025-2026', 7, '3er Lapso', 42, 103, 1, '20', NULL, NULL, 20.00),
(562, '2025-2026', 7, '3er Lapso', 42, 103, 2, '14', NULL, NULL, 14.00),
(563, '2025-2026', 7, '3er Lapso', 42, 103, 3, '16', NULL, NULL, 16.00),
(564, '2025-2026', 7, '3er Lapso', 42, 103, 4, '12', NULL, NULL, 12.00),
(565, '2025-2026', 7, '3er Lapso', 42, 103, 5, '15', NULL, NULL, 15.00),
(566, '2025-2026', 7, '3er Lapso', 42, 103, 6, '14', NULL, NULL, 14.00),
(567, '2025-2026', 7, '3er Lapso', 42, 103, 7, '16', NULL, NULL, 16.00),
(568, '2025-2026', 7, '3er Lapso', 42, 103, 8, '12', NULL, NULL, 12.00),
(569, '2025-2026', 7, '3er Lapso', 42, 103, 9, '12', NULL, NULL, 12.00),
(570, '2025-2026', 7, '3er Lapso', 42, 103, 10, '20', NULL, NULL, 20.00),
(571, '2025-2026', 8, '1er Lapso', 43, 99, 11, '20', NULL, NULL, 20.00),
(572, '2025-2026', 8, '1er Lapso', 43, 99, 12, '12', NULL, NULL, 12.00),
(573, '2025-2026', 8, '1er Lapso', 43, 99, 13, '16', NULL, NULL, 16.00),
(574, '2025-2026', 8, '1er Lapso', 43, 99, 14, '14', NULL, NULL, 14.00),
(575, '2025-2026', 8, '1er Lapso', 43, 99, 15, '15', NULL, NULL, 15.00),
(576, '2025-2026', 8, '1er Lapso', 43, 99, 16, '16', NULL, NULL, 16.00),
(577, '2025-2026', 8, '1er Lapso', 43, 99, 18, '14', NULL, NULL, 14.00),
(578, '2025-2026', 8, '1er Lapso', 43, 99, 19, '16', NULL, NULL, 16.00),
(579, '2025-2026', 8, '1er Lapso', 43, 99, 20, '18', NULL, NULL, 18.00),
(580, '2025-2026', 8, '2do Lapso', 43, 99, 11, '20', NULL, NULL, 20.00),
(581, '2025-2026', 8, '2do Lapso', 43, 99, 12, '14', NULL, NULL, 14.00),
(582, '2025-2026', 8, '2do Lapso', 43, 99, 13, '16', NULL, NULL, 16.00),
(583, '2025-2026', 8, '2do Lapso', 43, 99, 14, '12', NULL, NULL, 12.00),
(584, '2025-2026', 8, '2do Lapso', 43, 99, 15, '5', NULL, NULL, 5.00),
(585, '2025-2026', 8, '2do Lapso', 43, 99, 16, '14', NULL, NULL, 14.00),
(586, '2025-2026', 8, '2do Lapso', 43, 99, 17, '16', NULL, NULL, 16.00),
(587, '2025-2026', 8, '2do Lapso', 43, 99, 18, '18', NULL, NULL, 18.00),
(588, '2025-2026', 8, '2do Lapso', 43, 99, 19, '19', NULL, NULL, 19.00),
(589, '2025-2026', 8, '2do Lapso', 43, 99, 20, '14', NULL, NULL, 14.00),
(590, '2025-2026', 8, '3er Lapso', 43, 99, 11, '20', NULL, NULL, 20.00),
(591, '2025-2026', 8, '3er Lapso', 43, 99, 12, '14', NULL, NULL, 14.00),
(592, '2025-2026', 8, '3er Lapso', 43, 99, 13, '16', NULL, NULL, 16.00),
(593, '2025-2026', 8, '3er Lapso', 43, 99, 14, '18', NULL, NULL, 18.00),
(594, '2025-2026', 8, '3er Lapso', 43, 99, 15, '19', NULL, NULL, 19.00),
(595, '2025-2026', 8, '3er Lapso', 43, 99, 16, '20', NULL, NULL, 20.00),
(596, '2025-2026', 8, '3er Lapso', 43, 99, 17, '14', NULL, NULL, 14.00),
(597, '2025-2026', 8, '3er Lapso', 43, 99, 18, '15', NULL, NULL, 15.00),
(598, '2025-2026', 8, '3er Lapso', 43, 99, 19, '16', NULL, NULL, 16.00),
(599, '2025-2026', 8, '3er Lapso', 43, 99, 20, '12', NULL, NULL, 12.00),
(600, '2025-2026', 8, '3er Lapso', 41, 106, 11, '20', NULL, NULL, 20.00),
(601, '2025-2026', 8, '1er Lapso', 41, 106, 11, '20', NULL, NULL, 20.00),
(602, '2025-2026', 8, '1er Lapso', 41, 106, 12, '12', NULL, NULL, 12.00),
(603, '2025-2026', 8, '1er Lapso', 41, 106, 13, '15', NULL, NULL, 15.00),
(604, '2025-2026', 8, '1er Lapso', 41, 106, 14, '15', NULL, NULL, 15.00),
(605, '2025-2026', 8, '1er Lapso', 41, 106, 15, '16', NULL, NULL, 16.00),
(606, '2025-2026', 8, '1er Lapso', 41, 106, 16, '12', NULL, NULL, 12.00),
(607, '2025-2026', 8, '1er Lapso', 41, 106, 17, '12', NULL, NULL, 12.00),
(608, '2025-2026', 8, '1er Lapso', 41, 106, 18, '11', NULL, NULL, 11.00),
(609, '2025-2026', 8, '1er Lapso', 41, 106, 19, '10', NULL, NULL, 10.00),
(610, '2025-2026', 8, '1er Lapso', 41, 106, 20, '20', NULL, NULL, 20.00),
(611, '2025-2026', 8, '2do Lapso', 41, 106, 11, '20', NULL, NULL, 20.00),
(612, '2025-2026', 8, '2do Lapso', 41, 106, 12, '14', NULL, NULL, 14.00),
(613, '2025-2026', 8, '2do Lapso', 41, 106, 13, '16', NULL, NULL, 16.00),
(614, '2025-2026', 8, '2do Lapso', 41, 106, 15, '15', NULL, NULL, 15.00),
(615, '2025-2026', 8, '2do Lapso', 41, 106, 14, '12', NULL, NULL, 12.00),
(616, '2025-2026', 8, '2do Lapso', 41, 106, 16, '12', NULL, NULL, 12.00),
(617, '2025-2026', 8, '2do Lapso', 41, 106, 17, '14', NULL, NULL, 14.00),
(618, '2025-2026', 8, '2do Lapso', 41, 106, 18, '16', NULL, NULL, 16.00),
(619, '2025-2026', 8, '2do Lapso', 41, 106, 19, '18', NULL, NULL, 18.00),
(620, '2025-2026', 8, '2do Lapso', 41, 106, 20, '16', NULL, NULL, 16.00),
(621, '2025-2026', 8, '3er Lapso', 41, 106, 12, '14', NULL, NULL, 14.00),
(622, '2025-2026', 8, '3er Lapso', 41, 106, 13, '16', NULL, NULL, 16.00),
(623, '2025-2026', 8, '3er Lapso', 41, 106, 14, '12', NULL, NULL, 12.00),
(624, '2025-2026', 8, '3er Lapso', 41, 106, 15, '5', NULL, NULL, 5.00),
(625, '2025-2026', 8, '3er Lapso', 41, 106, 16, '14', NULL, NULL, 14.00),
(626, '2025-2026', 8, '3er Lapso', 41, 106, 17, '16', NULL, NULL, 16.00),
(627, '2025-2026', 8, '3er Lapso', 41, 106, 18, '12', NULL, NULL, 12.00),
(628, '2025-2026', 8, '3er Lapso', 41, 106, 19, '14', NULL, NULL, 14.00),
(629, '2025-2026', 8, '3er Lapso', 41, 106, 20, '16', NULL, NULL, 16.00),
(630, '2025-2026', 8, '1er Lapso', 39, 104, 11, '20', NULL, NULL, 20.00),
(631, '2025-2026', 8, '1er Lapso', 39, 104, 12, '14', NULL, NULL, 14.00),
(632, '2025-2026', 8, '1er Lapso', 39, 104, 13, '16', NULL, NULL, 16.00),
(633, '2025-2026', 8, '1er Lapso', 39, 104, 14, '18', NULL, NULL, 18.00),
(634, '2025-2026', 8, '1er Lapso', 39, 104, 15, '9', NULL, NULL, 9.00),
(635, '2025-2026', 8, '1er Lapso', 39, 104, 16, '12', NULL, NULL, 12.00),
(636, '2025-2026', 8, '1er Lapso', 39, 104, 17, '15', NULL, NULL, 15.00),
(637, '2025-2026', 8, '1er Lapso', 39, 104, 18, '17', NULL, NULL, 17.00),
(638, '2025-2026', 8, '1er Lapso', 39, 104, 19, '15', NULL, NULL, 15.00),
(639, '2025-2026', 8, '1er Lapso', 39, 104, 20, '16', NULL, NULL, 16.00),
(640, '2025-2026', 8, '2do Lapso', 39, 104, 11, '14', NULL, NULL, 14.00),
(641, '2025-2026', 8, '2do Lapso', 39, 104, 12, '16', NULL, NULL, 16.00),
(642, '2025-2026', 8, '2do Lapso', 39, 104, 13, '18', NULL, NULL, 18.00),
(643, '2025-2026', 8, '2do Lapso', 39, 104, 14, '19', NULL, NULL, 19.00),
(644, '2025-2026', 8, '2do Lapso', 39, 104, 15, '14', NULL, NULL, 14.00),
(645, '2025-2026', 8, '2do Lapso', 39, 104, 16, '16', NULL, NULL, 16.00),
(646, '2025-2026', 8, '2do Lapso', 39, 104, 17, '12', NULL, NULL, 12.00),
(647, '2025-2026', 8, '2do Lapso', 39, 104, 18, '15', NULL, NULL, 15.00),
(648, '2025-2026', 8, '2do Lapso', 39, 104, 19, '20', NULL, NULL, 20.00),
(649, '2025-2026', 8, '2do Lapso', 39, 104, 20, '14', NULL, NULL, 14.00),
(650, '2025-2026', 8, '3er Lapso', 39, 104, 11, '20', NULL, NULL, 20.00),
(651, '2025-2026', 8, '3er Lapso', 39, 104, 12, '14', NULL, NULL, 14.00),
(652, '2025-2026', 8, '3er Lapso', 39, 104, 13, '16', NULL, NULL, 16.00),
(653, '2025-2026', 8, '3er Lapso', 39, 104, 14, '18', NULL, NULL, 18.00),
(654, '2025-2026', 8, '3er Lapso', 39, 104, 15, '9', NULL, NULL, 9.00),
(655, '2025-2026', 8, '3er Lapso', 39, 104, 16, '15', NULL, NULL, 15.00),
(656, '2025-2026', 8, '3er Lapso', 39, 104, 17, '12', NULL, NULL, 12.00),
(657, '2025-2026', 8, '3er Lapso', 39, 104, 18, '14', NULL, NULL, 14.00),
(658, '2025-2026', 8, '3er Lapso', 39, 104, 19, '12', NULL, NULL, 12.00),
(659, '2025-2026', 8, '3er Lapso', 39, 104, 20, '16', NULL, NULL, 16.00),
(660, '2025-2026', 8, '1er Lapso', 36, 107, 11, '20', NULL, NULL, 20.00),
(661, '2025-2026', 8, '1er Lapso', 36, 107, 13, '16', NULL, NULL, 16.00),
(662, '2025-2026', 8, '1er Lapso', 36, 107, 12, '15', NULL, NULL, 15.00),
(663, '2025-2026', 8, '1er Lapso', 36, 107, 14, '14', NULL, NULL, 14.00);
INSERT INTO `calificaciones` (`id`, `anio_escolar`, `id_grado`, `lapso_academico`, `id_profesor`, `id_materia`, `id_estudiante`, `calificacion`, `actividad`, `tipo_actividad`, `promedio`) VALUES
(664, '2025-2026', 8, '1er Lapso', 36, 107, 15, '18', NULL, NULL, 18.00),
(665, '2025-2026', 8, '1er Lapso', 36, 107, 16, '16', NULL, NULL, 16.00),
(666, '2025-2026', 8, '1er Lapso', 36, 107, 17, '19', NULL, NULL, 19.00),
(667, '2025-2026', 8, '1er Lapso', 36, 107, 18, '12', NULL, NULL, 12.00),
(668, '2025-2026', 8, '1er Lapso', 36, 107, 19, '14', NULL, NULL, 14.00),
(669, '2025-2026', 8, '1er Lapso', 36, 107, 20, '16', NULL, NULL, 16.00),
(670, '2025-2026', 8, '2do Lapso', 36, 107, 11, '14', NULL, NULL, 14.00),
(671, '2025-2026', 8, '2do Lapso', 36, 107, 12, '16', NULL, NULL, 16.00),
(672, '2025-2026', 8, '2do Lapso', 36, 107, 13, '18', NULL, NULL, 18.00),
(673, '2025-2026', 8, '2do Lapso', 36, 107, 14, '19', NULL, NULL, 19.00),
(674, '2025-2026', 8, '2do Lapso', 36, 107, 15, '20', NULL, NULL, 20.00),
(675, '2025-2026', 8, '2do Lapso', 36, 107, 16, '14', NULL, NULL, 14.00),
(676, '2025-2026', 8, '2do Lapso', 36, 107, 17, '16', NULL, NULL, 16.00),
(677, '2025-2026', 8, '2do Lapso', 36, 107, 18, '18', NULL, NULL, 18.00),
(678, '2025-2026', 8, '2do Lapso', 36, 107, 19, '15', NULL, NULL, 15.00),
(679, '2025-2026', 8, '2do Lapso', 36, 107, 20, '12', NULL, NULL, 12.00),
(680, '2025-2026', 8, '3er Lapso', 36, 107, 11, '20', NULL, NULL, 20.00),
(681, '2025-2026', 8, '3er Lapso', 36, 107, 12, '14', NULL, NULL, 14.00),
(682, '2025-2026', 8, '3er Lapso', 36, 107, 13, '16', NULL, NULL, 16.00),
(683, '2025-2026', 8, '3er Lapso', 36, 107, 14, '18', NULL, NULL, 18.00),
(684, '2025-2026', 8, '3er Lapso', 36, 107, 15, '19', NULL, NULL, 19.00),
(685, '2025-2026', 8, '3er Lapso', 36, 107, 16, '15', NULL, NULL, 15.00),
(686, '2025-2026', 8, '3er Lapso', 36, 107, 17, '16', NULL, NULL, 16.00),
(687, '2025-2026', 8, '3er Lapso', 36, 107, 18, '12', NULL, NULL, 12.00),
(688, '2025-2026', 8, '3er Lapso', 36, 107, 19, '11', NULL, NULL, 11.00),
(689, '2025-2026', 8, '3er Lapso', 36, 107, 20, '20', NULL, NULL, 20.00),
(690, '2025-2026', 8, '1er Lapso', 38, 108, 11, '20', NULL, NULL, 20.00),
(691, '2025-2026', 8, '1er Lapso', 38, 108, 12, '15', NULL, NULL, 15.00),
(692, '2025-2026', 8, '1er Lapso', 38, 108, 13, '16', NULL, NULL, 16.00),
(693, '2025-2026', 8, '1er Lapso', 38, 108, 14, '14', NULL, NULL, 14.00),
(694, '2025-2026', 8, '1er Lapso', 38, 108, 15, '11', NULL, NULL, 11.00),
(695, '2025-2026', 8, '1er Lapso', 38, 108, 16, '19', NULL, NULL, 19.00),
(696, '2025-2026', 8, '1er Lapso', 38, 108, 17, '16', NULL, NULL, 16.00),
(697, '2025-2026', 8, '1er Lapso', 38, 108, 18, '14', NULL, NULL, 14.00),
(698, '2025-2026', 8, '1er Lapso', 38, 108, 19, '12', NULL, NULL, 12.00),
(699, '2025-2026', 8, '1er Lapso', 38, 108, 20, '11', NULL, NULL, 11.00),
(700, '2025-2026', 8, '2do Lapso', 38, 108, 11, '20', NULL, NULL, 20.00),
(701, '2025-2026', 8, '2do Lapso', 38, 108, 12, '15', NULL, NULL, 15.00),
(702, '2025-2026', 8, '2do Lapso', 38, 108, 13, '14', NULL, NULL, 14.00),
(703, '2025-2026', 8, '2do Lapso', 38, 108, 14, '16', NULL, NULL, 16.00),
(704, '2025-2026', 8, '2do Lapso', 38, 108, 15, '9', NULL, NULL, 9.00),
(705, '2025-2026', 8, '2do Lapso', 38, 108, 16, '20', NULL, NULL, 20.00),
(706, '2025-2026', 8, '2do Lapso', 38, 108, 17, '14', NULL, NULL, 14.00),
(707, '2025-2026', 8, '2do Lapso', 38, 108, 18, '6', NULL, NULL, 6.00),
(708, '2025-2026', 8, '2do Lapso', 38, 108, 19, '14', NULL, NULL, 14.00),
(709, '2025-2026', 8, '2do Lapso', 38, 108, 20, '18', NULL, NULL, 18.00),
(710, '2025-2026', 7, '3er Lapso', 38, 108, 10, '16', NULL, NULL, 16.00),
(711, '2025-2026', 7, '3er Lapso', 38, 108, 9, '14', NULL, NULL, 14.00),
(712, '2025-2026', 7, '3er Lapso', 38, 108, 8, '12', NULL, NULL, 12.00),
(713, '2025-2026', 7, '3er Lapso', 38, 108, 7, '19', NULL, NULL, 19.00),
(714, '2025-2026', 7, '3er Lapso', 38, 108, 6, '18', NULL, NULL, 18.00),
(715, '2025-2026', 7, '3er Lapso', 38, 108, 5, '14', NULL, NULL, 14.00),
(716, '2025-2026', 7, '3er Lapso', 38, 108, 4, '12', NULL, NULL, 12.00),
(717, '2025-2026', 7, '3er Lapso', 38, 108, 3, '16', NULL, NULL, 16.00),
(718, '2025-2026', 7, '3er Lapso', 38, 108, 2, '14', NULL, NULL, 14.00),
(719, '2025-2026', 7, '3er Lapso', 38, 108, 1, '20', NULL, NULL, 20.00),
(720, '2025-2026', 8, '2do Lapso', 37, 105, 11, '20', NULL, NULL, 20.00),
(721, '2025-2026', 8, '2do Lapso', 37, 105, 12, '14', NULL, NULL, 14.00),
(722, '2025-2026', 8, '2do Lapso', 37, 105, 13, '16', NULL, NULL, 16.00),
(723, '2025-2026', 8, '2do Lapso', 37, 105, 14, '12', NULL, NULL, 12.00),
(724, '2025-2026', 8, '2do Lapso', 37, 105, 15, '15', NULL, NULL, 15.00),
(725, '2025-2026', 8, '2do Lapso', 37, 105, 16, '20', NULL, NULL, 20.00),
(726, '2025-2026', 8, '2do Lapso', 37, 105, 17, '11', NULL, NULL, 11.00),
(727, '2025-2026', 8, '2do Lapso', 37, 105, 18, '16', NULL, NULL, 16.00),
(728, '2025-2026', 8, '2do Lapso', 37, 105, 19, '12', NULL, NULL, 12.00),
(729, '2025-2026', 8, '2do Lapso', 37, 105, 20, '15', NULL, NULL, 15.00),
(730, '2025-2026', 8, '3er Lapso', 37, 105, 11, '20', NULL, NULL, 20.00),
(731, '2025-2026', 8, '3er Lapso', 37, 105, 12, '14', NULL, NULL, 14.00),
(732, '2025-2026', 8, '3er Lapso', 37, 105, 13, '16', NULL, NULL, 16.00),
(733, '2025-2026', 8, '3er Lapso', 37, 105, 15, '15', NULL, NULL, 15.00),
(734, '2025-2026', 8, '3er Lapso', 37, 105, 16, '14', NULL, NULL, 14.00),
(735, '2025-2026', 8, '3er Lapso', 37, 105, 17, '16', NULL, NULL, 16.00),
(736, '2025-2026', 8, '3er Lapso', 37, 105, 18, '18', NULL, NULL, 18.00),
(737, '2025-2026', 8, '3er Lapso', 37, 105, 19, '19', NULL, NULL, 19.00),
(738, '2025-2026', 8, '3er Lapso', 37, 105, 20, '10', NULL, NULL, 10.00),
(739, '2025-2026', 8, '1er Lapso', 37, 105, 11, '20', NULL, NULL, 20.00),
(740, '2025-2026', 8, '1er Lapso', 37, 105, 12, '14', NULL, NULL, 14.00),
(741, '2025-2026', 8, '1er Lapso', 37, 105, 13, '15', NULL, NULL, 15.00),
(742, '2025-2026', 8, '1er Lapso', 37, 105, 14, '16', NULL, NULL, 16.00),
(743, '2025-2026', 8, '1er Lapso', 37, 105, 15, '12', NULL, NULL, 12.00),
(744, '2025-2026', 8, '1er Lapso', 37, 105, 16, '12', NULL, NULL, 12.00),
(745, '2025-2026', 8, '1er Lapso', 37, 105, 17, '11', NULL, NULL, 11.00),
(746, '2025-2026', 8, '1er Lapso', 37, 105, 18, '10', NULL, NULL, 10.00),
(747, '2025-2026', 8, '1er Lapso', 37, 105, 19, '20', NULL, NULL, 20.00),
(748, '2025-2026', 8, '1er Lapso', 37, 105, 20, '22', NULL, NULL, 22.00),
(749, '2025-2026', 8, '3er Lapso', 37, 105, 14, '18', NULL, NULL, 18.00),
(750, '2025-2026', 8, '1er Lapso', 42, 103, 11, '20', NULL, NULL, 20.00),
(751, '2025-2026', 8, '1er Lapso', 42, 103, 12, '14', NULL, NULL, 14.00),
(752, '2025-2026', 8, '1er Lapso', 42, 103, 13, '16', NULL, NULL, 16.00),
(753, '2025-2026', 8, '1er Lapso', 42, 103, 14, '12', NULL, NULL, 12.00),
(754, '2025-2026', 8, '1er Lapso', 42, 103, 15, '15', NULL, NULL, 15.00),
(755, '2025-2026', 8, '1er Lapso', 42, 103, 16, '14', NULL, NULL, 14.00),
(756, '2025-2026', 8, '1er Lapso', 42, 103, 17, '16', NULL, NULL, 16.00),
(757, '2025-2026', 8, '1er Lapso', 42, 103, 18, '20', NULL, NULL, 20.00),
(758, '2025-2026', 8, '1er Lapso', 42, 103, 19, '15', NULL, NULL, 15.00),
(759, '2025-2026', 8, '1er Lapso', 42, 103, 20, '16', NULL, NULL, 16.00),
(760, '2025-2026', 8, '2do Lapso', 42, 103, 11, '20', NULL, NULL, 20.00),
(761, '2025-2026', 8, '2do Lapso', 42, 103, 12, '14', NULL, NULL, 14.00),
(762, '2025-2026', 8, '2do Lapso', 42, 103, 13, '16', NULL, NULL, 16.00),
(763, '2025-2026', 8, '2do Lapso', 42, 103, 14, '18', NULL, NULL, 18.00),
(764, '2025-2026', 8, '2do Lapso', 42, 103, 15, '16', NULL, NULL, 16.00),
(765, '2025-2026', 8, '2do Lapso', 42, 103, 16, '12', NULL, NULL, 12.00),
(766, '2025-2026', 8, '2do Lapso', 42, 103, 17, '11', NULL, NULL, 11.00),
(767, '2025-2026', 8, '2do Lapso', 42, 103, 18, '10', NULL, NULL, 10.00),
(768, '2025-2026', 8, '2do Lapso', 42, 103, 19, '20', NULL, NULL, 20.00),
(769, '2025-2026', 8, '2do Lapso', 42, 103, 20, '20', NULL, NULL, 20.00),
(770, '2025-2026', 8, '3er Lapso', 42, 103, 11, '20', NULL, NULL, 20.00),
(771, '2025-2026', 8, '3er Lapso', 42, 103, 12, '14', NULL, NULL, 14.00),
(772, '2025-2026', 8, '3er Lapso', 42, 103, 13, '16', NULL, NULL, 16.00),
(773, '2025-2026', 8, '3er Lapso', 42, 103, 14, '18', NULL, NULL, 18.00),
(774, '2025-2026', 8, '3er Lapso', 42, 103, 15, '16', NULL, NULL, 16.00),
(775, '2025-2026', 8, '3er Lapso', 42, 103, 16, '9', NULL, NULL, 9.00),
(776, '2025-2026', 8, '3er Lapso', 42, 103, 17, '19', NULL, NULL, 19.00),
(777, '2025-2026', 8, '3er Lapso', 42, 103, 18, '20', NULL, NULL, 20.00),
(778, '2025-2026', 8, '3er Lapso', 42, 103, 19, '11', NULL, NULL, 11.00),
(779, '2025-2026', 8, '3er Lapso', 42, 103, 20, '20', NULL, NULL, 20.00);

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
(79, 2, 114),
(80, 2, 113),
(81, 2, 111),
(82, 2, 112),
(83, 2, 115),
(84, 2, 116),
(85, 3, 114),
(86, 3, 113),
(87, 3, 111),
(88, 3, 112),
(89, 3, 115),
(90, 3, 116),
(91, 4, 114),
(92, 4, 113),
(93, 4, 111),
(94, 4, 112),
(95, 4, 115),
(96, 4, 116),
(97, 5, 114),
(98, 5, 113),
(99, 5, 111),
(100, 5, 112),
(101, 5, 115),
(102, 5, 116),
(103, 6, 114),
(104, 6, 113),
(105, 6, 111),
(106, 6, 112),
(107, 6, 115),
(108, 6, 116),
(109, 8, 99),
(110, 9, 99),
(111, 8, 106),
(112, 9, 106),
(113, 8, 104),
(114, 9, 104),
(115, 8, 107),
(116, 9, 107),
(117, 8, 108),
(118, 9, 108),
(119, 8, 102),
(120, 9, 102),
(121, 8, 105),
(122, 9, 105),
(123, 8, 103),
(124, 8, 100),
(125, 8, 101),
(126, 9, 103),
(127, 9, 100),
(128, 9, 101);

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
(28, 2, 105, 7, 37, '2025-2026', 8.67, 'pendiente', '30-07-2025', NULL),
(29, 4, 105, 7, 37, '2025-2026', 9.00, 'pendiente', '30-07-2025', NULL),
(30, 8, 105, 7, 37, '2025-2026', 8.33, 'pendiente', '30-07-2025', NULL);

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
(48, 'V1452424', 'Alejandro Marquina', 'Primaria', '04141255631', 2),
(50, 'V85141441', 'Miranda Sarate', 'Primaria', '04121452141', 2),
(51, 'V7888541', 'Yovanna Sofia', 'Primaria', '04122422214', 2),
(52, 'V74441221', 'Angelica Benavides', 'Primaria', '04121452144', 2),
(53, 'V17854111', 'Benjamin Mendoza', 'Primaria', '04121425114', 2),
(54, 'V5266664', 'Alfredo Serrano', 'Primaria', '04144145114', 2);

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
(80, 48, 1),
(81, 51, 2),
(82, 52, 3),
(83, 50, 4),
(84, 54, 5),
(85, 53, 6),
(86, 43, 8),
(87, 41, 8),
(88, 39, 8),
(89, 36, 8),
(90, 38, 8),
(91, 40, 8),
(92, 37, 8),
(93, 42, 8),
(94, 43, 9),
(95, 41, 9),
(96, 39, 9),
(97, 36, 9),
(98, 38, 9),
(99, 40, 9),
(100, 37, 9),
(101, 42, 9);

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
(50, 36, 107, 8),
(16, 37, 105, 7),
(53, 37, 105, 8),
(14, 38, 108, 7),
(51, 38, 108, 8),
(12, 39, 104, 7),
(49, 39, 104, 8),
(15, 40, 102, 7),
(52, 40, 108, 8),
(11, 41, 106, 7),
(48, 41, 106, 8),
(18, 42, 100, 7),
(19, 42, 101, 7),
(17, 42, 103, 7),
(54, 42, 103, 8),
(10, 43, 99, 7),
(47, 43, 99, 8),
(22, 47, 111, 1),
(23, 47, 112, 1),
(21, 47, 113, 1),
(20, 47, 114, 1),
(24, 47, 115, 1),
(25, 47, 116, 1),
(28, 48, 116, 1),
(43, 50, 111, 4),
(44, 50, 112, 4),
(42, 50, 113, 4),
(41, 50, 114, 4),
(45, 50, 115, 4),
(46, 50, 116, 4),
(31, 51, 111, 2),
(32, 51, 112, 2),
(30, 51, 113, 2),
(29, 51, 114, 2),
(33, 51, 115, 2),
(34, 51, 116, 2),
(37, 52, 111, 3),
(38, 52, 112, 3),
(36, 52, 113, 3),
(35, 52, 114, 3),
(39, 52, 115, 3),
(40, 52, 116, 3);

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
  MODIFY `id_actividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT de la tabla `aulas`
--
ALTER TABLE `aulas`
  MODIFY `id_aula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=780;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

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
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id_profesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `profesor_grado`
--
ALTER TABLE `profesor_grado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT de la tabla `profesor_materia_grado`
--
ALTER TABLE `profesor_materia_grado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

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
