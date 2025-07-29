SET foreign_key_checks = 0;

DROP TABLE IF EXISTS `actividades`;
CREATE TABLE `actividades` (
  `id_actividad` int(11) NOT NULL AUTO_INCREMENT,
  `anio_escolar` varchar(25) NOT NULL,
  `tipo_contenido` varchar(55) DEFAULT NULL,
  `contenido` varchar(255) NOT NULL,
  `id_materia` int(10) NOT NULL,
  `id_grado` int(10) NOT NULL,
  `id_profesor` int(10) NOT NULL,
  `id_estado` int(10) NOT NULL,
  PRIMARY KEY (`id_actividad`),
  KEY `id_grado` (`id_grado`),
  KEY `id_profesor` (`id_profesor`),
  KEY `id_estado` (`id_estado`),
  KEY `id_materia` (`id_materia`),
  CONSTRAINT `actividades_ibfk_2` FOREIGN KEY (`id_grado`) REFERENCES `grados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `actividades_ibfk_3` FOREIGN KEY (`id_profesor`) REFERENCES `profesores` (`id_profesor`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `actividades_ibfk_4` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `actividades_ibfk_5` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `actividades` VALUES("30","2025-2026","Contenidos","Realiza actividad escrita de la letra Aa hasta la Hh.","111","1","47","2");
INSERT INTO `actividades` VALUES("32","2025-2026","Contenidos","Realiza actividad escrita de la letra Ii hasta Rr.","111","1","47","2");
INSERT INTO `actividades` VALUES("35","2025-2026","Caligrafía","Realiza caligrafías programadas.","111","1","47","2");
INSERT INTO `actividades` VALUES("36","2025-2026","Caligrafía","Sigue el patrón en la escritura mayúscula en cuaderno doble línea.","111","1","47","2");
INSERT INTO `actividades` VALUES("37","2025-2026","Escritura","Modela la letra según el patrón recomendado (modelo palmer estándar cursiva ).","111","1","47","2");
INSERT INTO `actividades` VALUES("38","2025-2026","Escritura","Modela  letras mayusculas según el patrón dado. (Tamaño, línea completa).","111","1","47","2");
INSERT INTO `actividades` VALUES("39","2025-2026","Escritura","Modela  letras minusculas según el patrón dado.(Tamaño, línea pequeña).","111","1","47","2");
INSERT INTO `actividades` VALUES("40","2025-2026","Escritura","Se le facilita la escritura cursiva de letras mayúsculas.","111","1","47","2");
INSERT INTO `actividades` VALUES("41","2025-2026","Contenidos","Realiza actividad efeméride de 14 de septiembre con su dibujo.","112","1","47","2");
INSERT INTO `actividades` VALUES("42","2025-2026","Contenidos","Realiza actividad efeméride de 12 de 0tubre  con su dibujo.","112","1","47","2");
INSERT INTO `actividades` VALUES("43","2025-2026","Contenidos","Realiza actividad efeméride de Día de la alimentación  con su dibujo.","112","1","47","2");
INSERT INTO `actividades` VALUES("44","2025-2026","Contenidos","Realiza actividad efeméride  de Simón Rodríguez  con su dibujo.","112","1","47","2");
INSERT INTO `actividades` VALUES("45","2025-2026","Contenidos","Asistió a la actividad","114","1","47","2");
INSERT INTO `actividades` VALUES("46","2025-2026","Contenidos","Realizó los ejercicios pautados según lo asignado para la casa.","114","1","47","2");
INSERT INTO `actividades` VALUES("47","2025-2026","Contenidos","Mostró seguridad al realizar las actividades","114","1","47","2");
INSERT INTO `actividades` VALUES("48","2025-2026","Contenidos","Identificó que las actividades eran los contenidos  enviados a casa.","114","1","47","2");
INSERT INTO `actividades` VALUES("49","2025-2026","Contenidos","Realizó las actividades de deporte enviadas a casa","113","1","47","2");
INSERT INTO `actividades` VALUES("50","2025-2026","Contenidos","Mostró  coordinación corporal en actividad de bienvenida en aula.","113","1","47","2");
INSERT INTO `actividades` VALUES("51","2025-2026","Contenidos","Realizó flor de papel.","115","1","47","2");
INSERT INTO `actividades` VALUES("52","2025-2026","Contenidos","Realizó angel navideño.","116","1","47","2");
INSERT INTO `actividades` VALUES("53","2025-2026","Contenidos","Realizó estrella de navidad.","116","1","47","2");
INSERT INTO `actividades` VALUES("54","2025-2026","Contenidos","Participó el niño en su construccion.","116","1","47","2");
INSERT INTO `actividades` VALUES("55","2025-2026","Contenidos","Cumple con las asignaciones y ejercicios.","115","1","47","2");
INSERT INTO `actividades` VALUES("56","2025-2026","Contenidos","Atiende instrucciones en las actividades presenciales.","115","1","47","2");
INSERT INTO `actividades` VALUES("57","2025-2026","Contenidos","Trabaja en orden  siguiendo patrones.","115","1","47","2");
INSERT INTO `actividades` VALUES("58","2025-2026","Contenidos","Presenta pulcritud en sus trabajos.","115","1","47","2");

DROP TABLE IF EXISTS `aulas`;
CREATE TABLE `aulas` (
  `id_aula` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `capacidad` int(11) NOT NULL,
  `id_grado` int(11) NOT NULL,
  `anio_escolar` varchar(20) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id_aula`),
  KEY `id_grado` (`id_grado`),
  KEY `estado` (`estado`),
  CONSTRAINT `aulas_ibfk_1` FOREIGN KEY (`id_grado`) REFERENCES `grados` (`id`),
  CONSTRAINT `aulas_ibfk_2` FOREIGN KEY (`estado`) REFERENCES `estado` (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `aulas` VALUES("5","Aula 45","45","2","2025-2026","1");
INSERT INTO `aulas` VALUES("6","Aula 18","12","2","2025-2026","2");
INSERT INTO `aulas` VALUES("7","Aula 20","16","7","2025-2026","1");
INSERT INTO `aulas` VALUES("8","Aula 15","20","8","2025-2026","2");
INSERT INTO `aulas` VALUES("9","Aula 19","25","9","2025-2026","2");
INSERT INTO `aulas` VALUES("10","Aula 401","25","3","2025-2026","2");
INSERT INTO `aulas` VALUES("11","Aula 402","25","6","2025-2026","2");
INSERT INTO `aulas` VALUES("12","Aula 29","14","1","2025-2026","2");
INSERT INTO `aulas` VALUES("13","Aula 31","16","1","2025-2026","2");
INSERT INTO `aulas` VALUES("14","Aula 25","13","1","2025-2026","2");

DROP TABLE IF EXISTS `calificaciones`;
CREATE TABLE `calificaciones` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `anio_escolar` varchar(20) NOT NULL,
  `id_grado` int(5) NOT NULL,
  `lapso_academico` varchar(20) NOT NULL,
  `id_profesor` int(5) NOT NULL,
  `id_materia` int(5) NOT NULL,
  `id_estudiante` int(5) NOT NULL,
  `calificacion` varchar(10) NOT NULL,
  `actividad` int(11) DEFAULT NULL,
  `tipo_actividad` varchar(55) DEFAULT NULL,
  `promedio` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_grado` (`id_grado`,`id_profesor`,`id_materia`,`id_estudiante`),
  KEY `actividad` (`actividad`),
  KEY `id_estudiante` (`id_estudiante`),
  KEY `id_profesor` (`id_profesor`),
  KEY `id_materia` (`id_materia`),
  CONSTRAINT `calificaciones_ibfk_1` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiantes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `calificaciones_ibfk_2` FOREIGN KEY (`actividad`) REFERENCES `actividades` (`id_actividad`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `calificaciones_ibfk_3` FOREIGN KEY (`id_grado`) REFERENCES `grados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `calificaciones_ibfk_4` FOREIGN KEY (`id_profesor`) REFERENCES `profesores` (`id_profesor`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `calificaciones_ibfk_5` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1160 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `calificaciones` VALUES("594","2025-2026","1","Lapso Único","47","111","1","EX","30","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("595","2025-2026","1","Lapso Único","47","111","2","EX","30","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("596","2025-2026","1","Lapso Único","47","111","3","EX","30","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("597","2025-2026","1","Lapso Único","47","111","4","MB","30","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("598","2025-2026","1","Lapso Único","47","111","8","MB","30","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("599","2025-2026","1","Lapso Único","47","111","1","EX","32","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("600","2025-2026","1","Lapso Único","47","111","2","EX","32","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("601","2025-2026","1","Lapso Único","47","111","3","EX","32","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("602","2025-2026","1","Lapso Único","47","111","4","MB","32","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("603","2025-2026","1","Lapso Único","47","111","8","MB","32","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("604","2025-2026","1","Lapso Único","47","111","1","EX","35","Caligrafía",NULL);
INSERT INTO `calificaciones` VALUES("605","2025-2026","1","Lapso Único","47","111","2","EX","35","Caligrafía",NULL);
INSERT INTO `calificaciones` VALUES("606","2025-2026","1","Lapso Único","47","111","4","EX","35","Caligrafía",NULL);
INSERT INTO `calificaciones` VALUES("607","2025-2026","1","Lapso Único","47","111","3","EX","35","Caligrafía",NULL);
INSERT INTO `calificaciones` VALUES("608","2025-2026","1","Lapso Único","47","111","8","EX","35","Caligrafía",NULL);
INSERT INTO `calificaciones` VALUES("609","2025-2026","1","Lapso Único","47","111","1","EX","36","Caligrafía",NULL);
INSERT INTO `calificaciones` VALUES("610","2025-2026","1","Lapso Único","47","111","2","EX","36","Caligrafía",NULL);
INSERT INTO `calificaciones` VALUES("611","2025-2026","1","Lapso Único","47","111","3","EX","36","Caligrafía",NULL);
INSERT INTO `calificaciones` VALUES("612","2025-2026","1","Lapso Único","47","111","4","EX","36","Caligrafía",NULL);
INSERT INTO `calificaciones` VALUES("613","2025-2026","1","Lapso Único","47","111","8","EX","36","Caligrafía",NULL);
INSERT INTO `calificaciones` VALUES("614","2025-2026","1","Lapso Único","47","111","1","EX","37","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("615","2025-2026","1","Lapso Único","47","111","2","EX","37","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("616","2025-2026","1","Lapso Único","47","111","3","EX","37","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("617","2025-2026","1","Lapso Único","47","111","4","EX","37","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("618","2025-2026","1","Lapso Único","47","111","8","EX","37","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("619","2025-2026","1","Lapso Único","47","111","8","EX","38","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("620","2025-2026","1","Lapso Único","47","111","4","EX","38","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("621","2025-2026","1","Lapso Único","47","111","3","EX","38","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("622","2025-2026","1","Lapso Único","47","111","2","EX","38","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("623","2025-2026","1","Lapso Único","47","111","1","EX","38","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("624","2025-2026","1","Lapso Único","47","111","1","EX","39","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("625","2025-2026","1","Lapso Único","47","111","2","EX","39","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("626","2025-2026","1","Lapso Único","47","111","3","EX","39","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("627","2025-2026","1","Lapso Único","47","111","4","EX","39","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("628","2025-2026","1","Lapso Único","47","111","8","EX","39","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("629","2025-2026","1","Lapso Único","47","111","1","EX","40","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("630","2025-2026","1","Lapso Único","47","111","2","EX","40","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("631","2025-2026","1","Lapso Único","47","111","3","EX","40","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("632","2025-2026","1","Lapso Único","47","111","4","EX","40","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("633","2025-2026","1","Lapso Único","47","111","8","EX","40","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("634","2025-2026","1","Lapso Único","47","112","1","EX","41","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("635","2025-2026","1","Lapso Único","47","112","2","EX","41","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("636","2025-2026","1","Lapso Único","47","112","3","EX","41","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("637","2025-2026","1","Lapso Único","47","112","4","EX","41","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("638","2025-2026","1","Lapso Único","47","112","8","EX","41","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("639","2025-2026","1","Lapso Único","47","112","1","EX","42","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("640","2025-2026","1","Lapso Único","47","112","2","MB","42","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("641","2025-2026","1","Lapso Único","47","112","3","MB","42","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("642","2025-2026","1","Lapso Único","47","112","4","MB","42","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("643","2025-2026","1","Lapso Único","47","112","8","MB","42","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("644","2025-2026","1","Lapso Único","47","112","8","B","43","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("645","2025-2026","1","Lapso Único","47","112","4","B","43","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("646","2025-2026","1","Lapso Único","47","112","3","EX","43","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("647","2025-2026","1","Lapso Único","47","112","2","EX","43","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("648","2025-2026","1","Lapso Único","47","112","1","EX","43","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("649","2025-2026","1","Lapso Único","47","112","8","MB","44","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("650","2025-2026","1","Lapso Único","47","112","4","MB","44","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("651","2025-2026","1","Lapso Único","47","112","3","MB","44","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("652","2025-2026","1","Lapso Único","47","112","2","EX","44","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("653","2025-2026","1","Lapso Único","47","112","1","EX","44","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("654","2025-2026","1","Lapso Único","47","113","1","MB","49","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("655","2025-2026","1","Lapso Único","47","113","2","MB","49","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("656","2025-2026","1","Lapso Único","47","113","3","MB","49","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("657","2025-2026","1","Lapso Único","47","113","4","MB","49","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("658","2025-2026","1","Lapso Único","47","113","8","MB","49","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("659","2025-2026","1","Lapso Único","47","113","8","B","50","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("660","2025-2026","1","Lapso Único","47","113","4","B","50","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("661","2025-2026","1","Lapso Único","47","113","3","B","50","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("662","2025-2026","1","Lapso Único","47","113","2","B","50","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("663","2025-2026","1","Lapso Único","47","113","1","B","50","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("664","2025-2026","1","Lapso Único","47","114","8","EX","45","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("665","2025-2026","1","Lapso Único","47","114","4","EX","45","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("666","2025-2026","1","Lapso Único","47","114","3","EX","45","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("667","2025-2026","1","Lapso Único","47","114","2","EX","45","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("668","2025-2026","1","Lapso Único","47","114","1","EX","45","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("669","2025-2026","1","Lapso Único","47","114","8","MB","46","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("670","2025-2026","1","Lapso Único","47","114","4","MB","46","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("671","2025-2026","1","Lapso Único","47","114","3","MB","46","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("672","2025-2026","1","Lapso Único","47","114","2","MB","46","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("673","2025-2026","1","Lapso Único","47","114","1","MB","46","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("674","2025-2026","1","Lapso Único","47","114","8","MB","47","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("675","2025-2026","1","Lapso Único","47","114","4","MB","47","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("676","2025-2026","1","Lapso Único","47","114","3","MB","47","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("677","2025-2026","1","Lapso Único","47","114","2","MB","47","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("678","2025-2026","1","Lapso Único","47","114","1","MB","47","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("679","2025-2026","1","Lapso Único","47","114","1","EX","48","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("680","2025-2026","1","Lapso Único","47","114","2","MB","48","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("681","2025-2026","1","Lapso Único","47","114","3","MB","48","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("682","2025-2026","1","Lapso Único","47","114","4","MB","48","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("683","2025-2026","1","Lapso Único","47","114","8","MB","48","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("684","2025-2026","1","Lapso Único","47","115","1","EX","51","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("685","2025-2026","1","Lapso Único","47","115","2","EX","51","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("686","2025-2026","1","Lapso Único","47","115","3","EX","51","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("687","2025-2026","1","Lapso Único","47","115","4","EX","51","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("688","2025-2026","1","Lapso Único","47","115","8","EX","51","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("689","2025-2026","1","Lapso Único","47","115","8","MB","55","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("690","2025-2026","1","Lapso Único","47","115","4","MB","55","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("691","2025-2026","1","Lapso Único","47","115","3","MB","55","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("692","2025-2026","1","Lapso Único","47","115","2","MB","55","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("693","2025-2026","1","Lapso Único","47","115","1","MB","55","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("694","2025-2026","1","Lapso Único","47","115","1","EX","56","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("695","2025-2026","1","Lapso Único","47","115","2","EX","56","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("696","2025-2026","1","Lapso Único","47","115","3","EX","56","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("697","2025-2026","1","Lapso Único","47","115","4","MB","56","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("698","2025-2026","1","Lapso Único","47","115","8","MB","56","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("699","2025-2026","1","Lapso Único","47","115","8","MB","57","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("700","2025-2026","1","Lapso Único","47","115","4","MB","57","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("701","2025-2026","1","Lapso Único","47","115","3","MB","57","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("702","2025-2026","1","Lapso Único","47","115","2","EX","57","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("703","2025-2026","1","Lapso Único","47","115","1","EX","57","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("704","2025-2026","1","Lapso Único","47","115","8","B","58","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("705","2025-2026","1","Lapso Único","47","115","4","MB","58","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("706","2025-2026","1","Lapso Único","47","115","3","MB","58","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("707","2025-2026","1","Lapso Único","47","115","2","MB","58","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("708","2025-2026","1","Lapso Único","47","115","1","MB","58","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("709","2025-2026","1","Lapso Único","47","116","8","MB","52","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("710","2025-2026","1","Lapso Único","47","116","4","MB","52","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("711","2025-2026","1","Lapso Único","47","116","3","MB","52","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("712","2025-2026","1","Lapso Único","47","116","2","MB","52","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("713","2025-2026","1","Lapso Único","47","116","1","EX","52","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("714","2025-2026","1","Lapso Único","47","116","1","EX","53","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("715","2025-2026","1","Lapso Único","47","116","2","EX","53","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("716","2025-2026","1","Lapso Único","47","116","3","MB","53","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("717","2025-2026","1","Lapso Único","47","116","4","MB","53","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("718","2025-2026","1","Lapso Único","47","116","8","MB","53","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("719","2025-2026","1","Lapso Único","47","116","8","EX","54","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("720","2025-2026","1","Lapso Único","47","116","4","MB","54","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("721","2025-2026","1","Lapso Único","47","116","3","MB","54","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("722","2025-2026","1","Lapso Único","47","116","2","MB","54","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("723","2025-2026","1","Lapso Único","47","116","1","MB","54","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("724","2025-2026","1","Lapso Único","47","111","18","EX","30","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("725","2025-2026","1","Lapso Único","47","111","18","EX","32","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("726","2025-2026","1","Lapso Único","47","111","18","EX","35","Caligrafía",NULL);
INSERT INTO `calificaciones` VALUES("727","2025-2026","1","Lapso Único","47","111","18","EX","36","Caligrafía",NULL);
INSERT INTO `calificaciones` VALUES("728","2025-2026","1","Lapso Único","47","112","18","EX","41","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("729","2025-2026","1","Lapso Único","47","112","18","MB","42","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("730","2025-2026","1","Lapso Único","47","113","18","EX","49","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("827","2025-2026","7","1er lapso","43","99","7","17",NULL,NULL,"17.33");
INSERT INTO `calificaciones` VALUES("828","2025-2026","7","1er lapso","43","99","7","17",NULL,NULL,"17.33");
INSERT INTO `calificaciones` VALUES("829","2025-2026","7","1er lapso","43","99","7","17",NULL,NULL,"17.33");
INSERT INTO `calificaciones` VALUES("863","2025-2026","7","1er lapso","41","106","7","16",NULL,NULL,"16.33");
INSERT INTO `calificaciones` VALUES("864","2025-2026","7","1er lapso","41","106","7","17",NULL,NULL,"16.33");
INSERT INTO `calificaciones` VALUES("865","2025-2026","7","1er lapso","41","106","7","16",NULL,NULL,"16.33");
INSERT INTO `calificaciones` VALUES("866","2025-2026","7","1er lapso","39","104","7","15",NULL,NULL,"15.33");
INSERT INTO `calificaciones` VALUES("867","2025-2026","7","1er lapso","39","104","7","16",NULL,NULL,"15.33");
INSERT INTO `calificaciones` VALUES("868","2025-2026","7","1er lapso","39","104","7","15",NULL,NULL,"15.33");
INSERT INTO `calificaciones` VALUES("869","2025-2026","7","1er lapso","36","107","7","19",NULL,NULL,"18.67");
INSERT INTO `calificaciones` VALUES("870","2025-2026","7","1er lapso","36","107","7","18",NULL,NULL,"18.67");
INSERT INTO `calificaciones` VALUES("871","2025-2026","7","1er lapso","36","107","7","19",NULL,NULL,"18.67");
INSERT INTO `calificaciones` VALUES("872","2025-2026","7","1er lapso","38","108","7","17",NULL,NULL,"17.00");
INSERT INTO `calificaciones` VALUES("873","2025-2026","7","1er lapso","38","108","7","17",NULL,NULL,"17.00");
INSERT INTO `calificaciones` VALUES("874","2025-2026","7","1er lapso","38","108","7","17",NULL,NULL,"17.00");
INSERT INTO `calificaciones` VALUES("875","2025-2026","7","1er lapso","40","102","7","18",NULL,NULL,"18.33");
INSERT INTO `calificaciones` VALUES("876","2025-2026","7","1er lapso","40","102","7","19",NULL,NULL,"18.33");
INSERT INTO `calificaciones` VALUES("877","2025-2026","7","1er lapso","40","102","7","18",NULL,NULL,"18.33");
INSERT INTO `calificaciones` VALUES("878","2025-2026","7","1er lapso","37","105","7","16",NULL,NULL,"16.33");
INSERT INTO `calificaciones` VALUES("879","2025-2026","7","1er lapso","37","105","7","17",NULL,NULL,"16.33");
INSERT INTO `calificaciones` VALUES("880","2025-2026","7","1er lapso","37","105","7","16",NULL,NULL,"16.33");
INSERT INTO `calificaciones` VALUES("881","2025-2026","7","1er lapso","42","103","7","19",NULL,NULL,"18.33");
INSERT INTO `calificaciones` VALUES("884","2025-2026","7","1er lapso","42","100","7","14",NULL,NULL,"14.67");
INSERT INTO `calificaciones` VALUES("885","2025-2026","7","1er lapso","42","100","7","15",NULL,NULL,"14.67");
INSERT INTO `calificaciones` VALUES("886","2025-2026","7","1er lapso","42","100","7","15",NULL,NULL,"14.67");
INSERT INTO `calificaciones` VALUES("887","2025-2026","7","1er lapso","42","101","7","17",NULL,NULL,"17.33");
INSERT INTO `calificaciones` VALUES("888","2025-2026","7","1er lapso","42","101","7","17",NULL,NULL,"17.33");
INSERT INTO `calificaciones` VALUES("889","2025-2026","7","1er lapso","42","101","7","18",NULL,NULL,"17.33");
INSERT INTO `calificaciones` VALUES("890","2025-2026","7","1er lapso","43","99","5","16",NULL,NULL,"16.33");
INSERT INTO `calificaciones` VALUES("891","2025-2026","7","1er lapso","43","99","5","17",NULL,NULL,"16.33");
INSERT INTO `calificaciones` VALUES("892","2025-2026","7","1er lapso","43","99","5","16",NULL,NULL,"16.33");
INSERT INTO `calificaciones` VALUES("893","2025-2026","7","1er lapso","41","106","5","18",NULL,NULL,"18.33");
INSERT INTO `calificaciones` VALUES("894","2025-2026","7","1er lapso","41","106","5","19",NULL,NULL,"18.33");
INSERT INTO `calificaciones` VALUES("895","2025-2026","7","1er lapso","41","106","5","18",NULL,NULL,"18.33");
INSERT INTO `calificaciones` VALUES("896","2025-2026","7","1er lapso","39","104","5","15",NULL,NULL,"14.67");
INSERT INTO `calificaciones` VALUES("897","2025-2026","7","1er lapso","39","104","5","14",NULL,NULL,"14.67");
INSERT INTO `calificaciones` VALUES("898","2025-2026","7","1er lapso","39","104","5","15",NULL,NULL,"14.67");
INSERT INTO `calificaciones` VALUES("899","2025-2026","7","1er lapso","36","107","5","20",NULL,NULL,"19.33");
INSERT INTO `calificaciones` VALUES("900","2025-2026","7","1er lapso","36","107","5","19",NULL,NULL,"19.33");
INSERT INTO `calificaciones` VALUES("901","2025-2026","7","1er lapso","36","107","5","19",NULL,NULL,"19.33");
INSERT INTO `calificaciones` VALUES("902","2025-2026","7","1er lapso","38","108","5","13",NULL,NULL,"13.67");
INSERT INTO `calificaciones` VALUES("903","2025-2026","7","1er lapso","38","108","5","14",NULL,NULL,"13.67");
INSERT INTO `calificaciones` VALUES("904","2025-2026","7","1er lapso","38","108","5","14",NULL,NULL,"13.67");
INSERT INTO `calificaciones` VALUES("905","2025-2026","7","1er lapso","40","102","5","17",NULL,NULL,"17.00");
INSERT INTO `calificaciones` VALUES("906","2025-2026","7","1er lapso","40","102","5","17",NULL,NULL,"17.00");
INSERT INTO `calificaciones` VALUES("907","2025-2026","7","1er lapso","40","102","5","17",NULL,NULL,"17.00");
INSERT INTO `calificaciones` VALUES("908","2025-2026","7","1er lapso","37","105","5","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("909","2025-2026","7","1er lapso","37","105","5","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("910","2025-2026","7","1er lapso","37","105","5","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("911","2025-2026","7","1er lapso","42","103","5","18",NULL,NULL,"17.33");
INSERT INTO `calificaciones` VALUES("912","2025-2026","7","1er lapso","42","103","5","17",NULL,NULL,"17.33");
INSERT INTO `calificaciones` VALUES("913","2025-2026","7","1er lapso","42","103","5","17",NULL,NULL,"17.33");
INSERT INTO `calificaciones` VALUES("914","2025-2026","7","1er lapso","42","100","5","15",NULL,NULL,"15.67");
INSERT INTO `calificaciones` VALUES("915","2025-2026","7","1er lapso","42","100","5","16",NULL,NULL,"15.67");
INSERT INTO `calificaciones` VALUES("916","2025-2026","7","1er lapso","42","100","5","16",NULL,NULL,"15.67");
INSERT INTO `calificaciones` VALUES("917","2025-2026","7","1er lapso","42","101","5","17",NULL,NULL,"17.67");
INSERT INTO `calificaciones` VALUES("918","2025-2026","7","1er lapso","42","101","5","18",NULL,NULL,"17.67");
INSERT INTO `calificaciones` VALUES("919","2025-2026","7","1er lapso","42","101","5","18",NULL,NULL,"17.67");
INSERT INTO `calificaciones` VALUES("920","2025-2026","7","2do lapso","43","99","5","16",NULL,NULL,"16.33");
INSERT INTO `calificaciones` VALUES("921","2025-2026","7","2do lapso","43","99","5","17",NULL,NULL,"16.33");
INSERT INTO `calificaciones` VALUES("922","2025-2026","7","2do lapso","43","99","5","16",NULL,NULL,"16.33");
INSERT INTO `calificaciones` VALUES("923","2025-2026","7","2do lapso","41","106","5","18",NULL,NULL,"18.33");
INSERT INTO `calificaciones` VALUES("924","2025-2026","7","2do lapso","41","106","5","19",NULL,NULL,"18.33");
INSERT INTO `calificaciones` VALUES("925","2025-2026","7","2do lapso","41","106","5","18",NULL,NULL,"18.33");
INSERT INTO `calificaciones` VALUES("926","2025-2026","7","2do lapso","39","104","5","15",NULL,NULL,"14.67");
INSERT INTO `calificaciones` VALUES("927","2025-2026","7","2do lapso","39","104","5","14",NULL,NULL,"14.67");
INSERT INTO `calificaciones` VALUES("928","2025-2026","7","2do lapso","39","104","5","15",NULL,NULL,"14.67");
INSERT INTO `calificaciones` VALUES("929","2025-2026","7","2do lapso","36","107","5","20",NULL,NULL,"19.33");
INSERT INTO `calificaciones` VALUES("930","2025-2026","7","2do lapso","36","107","5","19",NULL,NULL,"19.33");
INSERT INTO `calificaciones` VALUES("931","2025-2026","7","2do lapso","36","107","5","19",NULL,NULL,"19.33");
INSERT INTO `calificaciones` VALUES("932","2025-2026","7","1er lapso","38","108","5","13",NULL,NULL,"13.67");
INSERT INTO `calificaciones` VALUES("933","2025-2026","7","1er lapso","38","108","5","14",NULL,NULL,"13.67");
INSERT INTO `calificaciones` VALUES("934","2025-2026","7","1er lapso","38","108","5","14",NULL,NULL,"13.67");
INSERT INTO `calificaciones` VALUES("935","2025-2026","7","2do lapso","40","102","5","17",NULL,NULL,"17.00");
INSERT INTO `calificaciones` VALUES("936","2025-2026","7","2do lapso","40","102","5","17",NULL,NULL,"17.00");
INSERT INTO `calificaciones` VALUES("937","2025-2026","7","2do lapso","40","102","5","17",NULL,NULL,"17.00");
INSERT INTO `calificaciones` VALUES("938","2025-2026","7","2do lapso","37","105","5","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("939","2025-2026","7","2do lapso","37","105","5","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("940","2025-2026","7","2do lapso","37","105","5","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("941","2025-2026","7","2do lapso","42","103","5","18",NULL,NULL,"17.33");
INSERT INTO `calificaciones` VALUES("942","2025-2026","7","2do lapso","42","103","5","17",NULL,NULL,"17.33");
INSERT INTO `calificaciones` VALUES("943","2025-2026","7","2do lapso","42","103","5","17",NULL,NULL,"17.33");
INSERT INTO `calificaciones` VALUES("944","2025-2026","7","2do lapso","42","100","5","15",NULL,NULL,"15.67");
INSERT INTO `calificaciones` VALUES("945","2025-2026","7","2do lapso","42","100","5","16",NULL,NULL,"15.67");
INSERT INTO `calificaciones` VALUES("946","2025-2026","7","2do lapso","42","100","5","16",NULL,NULL,"15.67");
INSERT INTO `calificaciones` VALUES("947","2025-2026","7","2do lapso","42","101","5","17",NULL,NULL,"17.67");
INSERT INTO `calificaciones` VALUES("948","2025-2026","7","2do lapso","42","101","5","18",NULL,NULL,"17.67");
INSERT INTO `calificaciones` VALUES("949","2025-2026","7","2do lapso","42","101","5","18",NULL,NULL,"17.67");
INSERT INTO `calificaciones` VALUES("950","2025-2026","7","3er lapso","43","99","5","16",NULL,NULL,"16.33");
INSERT INTO `calificaciones` VALUES("951","2025-2026","7","3er lapso","43","99","5","17",NULL,NULL,"16.33");
INSERT INTO `calificaciones` VALUES("952","2025-2026","7","3er lapso","43","99","5","16",NULL,NULL,"16.33");
INSERT INTO `calificaciones` VALUES("953","2025-2026","7","3er lapso","41","106","5","18",NULL,NULL,"18.33");
INSERT INTO `calificaciones` VALUES("954","2025-2026","7","3er lapso","41","106","5","19",NULL,NULL,"18.33");
INSERT INTO `calificaciones` VALUES("955","2025-2026","7","3er lapso","41","106","5","18",NULL,NULL,"18.33");
INSERT INTO `calificaciones` VALUES("956","2025-2026","7","3er lapso","39","104","5","15",NULL,NULL,"14.67");
INSERT INTO `calificaciones` VALUES("957","2025-2026","7","3er lapso","39","104","5","14",NULL,NULL,"14.67");
INSERT INTO `calificaciones` VALUES("958","2025-2026","7","3er lapso","39","104","5","15",NULL,NULL,"14.67");
INSERT INTO `calificaciones` VALUES("959","2025-2026","7","3er lapso","36","107","5","20",NULL,NULL,"19.33");
INSERT INTO `calificaciones` VALUES("960","2025-2026","7","3er lapso","36","107","5","19",NULL,NULL,"19.33");
INSERT INTO `calificaciones` VALUES("961","2025-2026","7","3er lapso","36","107","5","19",NULL,NULL,"19.33");
INSERT INTO `calificaciones` VALUES("962","2025-2026","7","3er lapso","38","108","5","13",NULL,NULL,"13.67");
INSERT INTO `calificaciones` VALUES("963","2025-2026","7","3er lapso","38","108","5","14",NULL,NULL,"13.67");
INSERT INTO `calificaciones` VALUES("964","2025-2026","7","3er lapso","38","108","5","14",NULL,NULL,"13.67");
INSERT INTO `calificaciones` VALUES("965","2025-2026","7","3er lapso","40","102","5","17",NULL,NULL,"17.00");
INSERT INTO `calificaciones` VALUES("966","2025-2026","7","3er lapso","40","102","5","17",NULL,NULL,"17.00");
INSERT INTO `calificaciones` VALUES("967","2025-2026","7","3er lapso","40","102","5","17",NULL,NULL,"17.00");
INSERT INTO `calificaciones` VALUES("968","2025-2026","7","3er lapso","37","105","5","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("969","2025-2026","7","3er lapso","37","105","5","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("970","2025-2026","7","3er lapso","37","105","5","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("971","2025-2026","7","3er lapso","42","103","5","18",NULL,NULL,"17.33");
INSERT INTO `calificaciones` VALUES("972","2025-2026","7","3er lapso","42","103","5","17",NULL,NULL,"17.33");
INSERT INTO `calificaciones` VALUES("973","2025-2026","7","3er lapso","42","103","5","17",NULL,NULL,"17.33");
INSERT INTO `calificaciones` VALUES("974","2025-2026","7","3er lapso","42","100","5","15",NULL,NULL,"15.67");
INSERT INTO `calificaciones` VALUES("975","2025-2026","7","3er lapso","42","100","5","16",NULL,NULL,"15.67");
INSERT INTO `calificaciones` VALUES("976","2025-2026","7","3er lapso","42","100","5","16",NULL,NULL,"15.67");
INSERT INTO `calificaciones` VALUES("977","2025-2026","7","3er lapso","42","101","5","17",NULL,NULL,"17.67");
INSERT INTO `calificaciones` VALUES("978","2025-2026","7","3er lapso","42","101","5","18",NULL,NULL,"17.67");
INSERT INTO `calificaciones` VALUES("979","2025-2026","7","3er lapso","42","101","5","18",NULL,NULL,"17.67");
INSERT INTO `calificaciones` VALUES("980","2025-2026","7","1er lapso","43","99","10","16",NULL,NULL,"16.33");
INSERT INTO `calificaciones` VALUES("981","2025-2026","7","1er lapso","43","99","10","17",NULL,NULL,"16.33");
INSERT INTO `calificaciones` VALUES("982","2025-2026","7","1er lapso","43","99","10","16",NULL,NULL,"16.33");
INSERT INTO `calificaciones` VALUES("983","2025-2026","7","1er lapso","41","106","10","18",NULL,NULL,"18.33");
INSERT INTO `calificaciones` VALUES("984","2025-2026","7","1er lapso","41","106","10","19",NULL,NULL,"18.33");
INSERT INTO `calificaciones` VALUES("985","2025-2026","7","1er lapso","41","106","10","18",NULL,NULL,"18.33");
INSERT INTO `calificaciones` VALUES("986","2025-2026","7","1er lapso","39","104","10","15",NULL,NULL,"14.67");
INSERT INTO `calificaciones` VALUES("987","2025-2026","7","1er lapso","39","104","10","14",NULL,NULL,"14.67");
INSERT INTO `calificaciones` VALUES("988","2025-2026","7","1er lapso","39","104","10","15",NULL,NULL,"14.67");
INSERT INTO `calificaciones` VALUES("989","2025-2026","7","1er lapso","36","107","10","20",NULL,NULL,"19.33");
INSERT INTO `calificaciones` VALUES("990","2025-2026","7","1er lapso","36","107","10","19",NULL,NULL,"19.33");
INSERT INTO `calificaciones` VALUES("991","2025-2026","7","1er lapso","36","107","10","19",NULL,NULL,"19.33");
INSERT INTO `calificaciones` VALUES("992","2025-2026","7","1er lapso","38","108","10","13",NULL,NULL,"13.67");
INSERT INTO `calificaciones` VALUES("993","2025-2026","7","1er lapso","38","108","10","14",NULL,NULL,"13.67");
INSERT INTO `calificaciones` VALUES("994","2025-2026","7","1er lapso","38","108","10","14",NULL,NULL,"13.67");
INSERT INTO `calificaciones` VALUES("995","2025-2026","7","1er lapso","40","102","10","17",NULL,NULL,"17.00");
INSERT INTO `calificaciones` VALUES("996","2025-2026","7","1er lapso","40","102","10","17",NULL,NULL,"17.00");
INSERT INTO `calificaciones` VALUES("997","2025-2026","7","1er lapso","40","102","10","17",NULL,NULL,"17.00");
INSERT INTO `calificaciones` VALUES("998","2025-2026","7","1er lapso","37","105","10","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("999","2025-2026","7","1er lapso","37","105","10","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("1000","2025-2026","7","1er lapso","37","105","10","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("1001","2025-2026","7","1er lapso","42","103","10","18",NULL,NULL,"17.33");
INSERT INTO `calificaciones` VALUES("1002","2025-2026","7","1er lapso","42","103","10","17",NULL,NULL,"17.33");
INSERT INTO `calificaciones` VALUES("1003","2025-2026","7","1er lapso","42","103","10","17",NULL,NULL,"17.33");
INSERT INTO `calificaciones` VALUES("1004","2025-2026","7","1er lapso","42","100","10","15",NULL,NULL,"15.67");
INSERT INTO `calificaciones` VALUES("1005","2025-2026","7","1er lapso","42","100","10","16",NULL,NULL,"15.67");
INSERT INTO `calificaciones` VALUES("1006","2025-2026","7","1er lapso","42","100","10","16",NULL,NULL,"15.67");
INSERT INTO `calificaciones` VALUES("1007","2025-2026","7","1er lapso","42","101","10","17",NULL,NULL,"17.67");
INSERT INTO `calificaciones` VALUES("1008","2025-2026","7","1er lapso","42","101","10","18",NULL,NULL,"17.67");
INSERT INTO `calificaciones` VALUES("1009","2025-2026","7","1er lapso","42","101","10","18",NULL,NULL,"17.67");
INSERT INTO `calificaciones` VALUES("1010","2025-2026","7","2do lapso","43","99","10","16",NULL,NULL,"16.33");
INSERT INTO `calificaciones` VALUES("1011","2025-2026","7","2do lapso","43","99","10","17",NULL,NULL,"16.33");
INSERT INTO `calificaciones` VALUES("1012","2025-2026","7","2do lapso","43","99","10","16",NULL,NULL,"16.33");
INSERT INTO `calificaciones` VALUES("1013","2025-2026","7","2do lapso","41","106","10","18",NULL,NULL,"18.33");
INSERT INTO `calificaciones` VALUES("1014","2025-2026","7","2do lapso","41","106","10","19",NULL,NULL,"18.33");
INSERT INTO `calificaciones` VALUES("1015","2025-2026","7","2do lapso","41","106","10","18",NULL,NULL,"18.33");
INSERT INTO `calificaciones` VALUES("1016","2025-2026","7","2do lapso","39","104","10","15",NULL,NULL,"14.67");
INSERT INTO `calificaciones` VALUES("1017","2025-2026","7","2do lapso","39","104","10","14",NULL,NULL,"14.67");
INSERT INTO `calificaciones` VALUES("1018","2025-2026","7","2do lapso","39","104","10","15",NULL,NULL,"14.67");
INSERT INTO `calificaciones` VALUES("1019","2025-2026","7","2do lapso","36","107","10","20",NULL,NULL,"19.33");
INSERT INTO `calificaciones` VALUES("1020","2025-2026","7","2do lapso","36","107","10","19",NULL,NULL,"19.33");
INSERT INTO `calificaciones` VALUES("1021","2025-2026","7","2do lapso","36","107","10","19",NULL,NULL,"19.33");
INSERT INTO `calificaciones` VALUES("1022","2025-2026","7","2do lapso","38","108","10","13",NULL,NULL,"13.67");
INSERT INTO `calificaciones` VALUES("1023","2025-2026","7","2do lapso","38","108","10","14",NULL,NULL,"13.67");
INSERT INTO `calificaciones` VALUES("1024","2025-2026","7","2do lapso","38","108","10","14",NULL,NULL,"13.67");
INSERT INTO `calificaciones` VALUES("1025","2025-2026","7","2do lapso","40","102","10","17",NULL,NULL,"17.00");
INSERT INTO `calificaciones` VALUES("1026","2025-2026","7","2do lapso","40","102","10","17",NULL,NULL,"17.00");
INSERT INTO `calificaciones` VALUES("1027","2025-2026","7","2do lapso","40","102","10","17",NULL,NULL,"17.00");
INSERT INTO `calificaciones` VALUES("1028","2025-2026","7","2do lapso","37","105","10","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("1029","2025-2026","7","2do lapso","37","105","10","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("1030","2025-2026","7","2do lapso","37","105","10","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("1031","2025-2026","7","2do lapso","42","103","10","18",NULL,NULL,"17.33");
INSERT INTO `calificaciones` VALUES("1032","2025-2026","7","2do lapso","42","103","10","17",NULL,NULL,"17.33");
INSERT INTO `calificaciones` VALUES("1033","2025-2026","7","2do lapso","42","103","10","17",NULL,NULL,"17.33");
INSERT INTO `calificaciones` VALUES("1034","2025-2026","7","2do lapso","42","100","10","15",NULL,NULL,"15.67");
INSERT INTO `calificaciones` VALUES("1035","2025-2026","7","2do lapso","42","100","10","16",NULL,NULL,"15.67");
INSERT INTO `calificaciones` VALUES("1036","2025-2026","7","2do lapso","42","100","10","16",NULL,NULL,"15.67");
INSERT INTO `calificaciones` VALUES("1037","2025-2026","7","2do lapso","42","101","10","17",NULL,NULL,"17.67");
INSERT INTO `calificaciones` VALUES("1038","2025-2026","7","2do lapso","42","101","10","18",NULL,NULL,"17.67");
INSERT INTO `calificaciones` VALUES("1039","2025-2026","7","2do lapso","42","101","10","18",NULL,NULL,"17.67");
INSERT INTO `calificaciones` VALUES("1040","2025-2026","7","3er lapso","43","99","10","16",NULL,NULL,"16.33");
INSERT INTO `calificaciones` VALUES("1041","2025-2026","7","3er lapso","43","99","10","17",NULL,NULL,"16.33");
INSERT INTO `calificaciones` VALUES("1042","2025-2026","7","3er lapso","43","99","10","16",NULL,NULL,"16.33");
INSERT INTO `calificaciones` VALUES("1043","2025-2026","7","3er lapso","41","106","10","18",NULL,NULL,"18.33");
INSERT INTO `calificaciones` VALUES("1044","2025-2026","7","3er lapso","41","106","10","19",NULL,NULL,"18.33");
INSERT INTO `calificaciones` VALUES("1045","2025-2026","7","3er lapso","41","106","10","18",NULL,NULL,"18.33");
INSERT INTO `calificaciones` VALUES("1046","2025-2026","7","3er lapso","39","104","10","15",NULL,NULL,"14.67");
INSERT INTO `calificaciones` VALUES("1047","2025-2026","7","3er lapso","39","104","10","14",NULL,NULL,"14.67");
INSERT INTO `calificaciones` VALUES("1048","2025-2026","7","3er lapso","39","104","10","15",NULL,NULL,"14.67");
INSERT INTO `calificaciones` VALUES("1049","2025-2026","7","3er lapso","36","107","10","20",NULL,NULL,"19.33");
INSERT INTO `calificaciones` VALUES("1050","2025-2026","7","3er lapso","36","107","10","19",NULL,NULL,"19.33");
INSERT INTO `calificaciones` VALUES("1051","2025-2026","7","3er lapso","36","107","10","19",NULL,NULL,"19.33");
INSERT INTO `calificaciones` VALUES("1052","2025-2026","7","3er lapso","38","108","10","13",NULL,NULL,"13.67");
INSERT INTO `calificaciones` VALUES("1053","2025-2026","7","3er lapso","38","108","10","14",NULL,NULL,"13.67");
INSERT INTO `calificaciones` VALUES("1054","2025-2026","7","3er lapso","38","108","10","14",NULL,NULL,"13.67");
INSERT INTO `calificaciones` VALUES("1055","2025-2026","7","3er lapso","40","102","10","17",NULL,NULL,"17.00");
INSERT INTO `calificaciones` VALUES("1056","2025-2026","7","3er lapso","40","102","10","17",NULL,NULL,"17.00");
INSERT INTO `calificaciones` VALUES("1057","2025-2026","7","3er lapso","40","102","10","17",NULL,NULL,"17.00");
INSERT INTO `calificaciones` VALUES("1058","2025-2026","7","3er lapso","37","105","10","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("1059","2025-2026","7","3er lapso","37","105","10","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("1060","2025-2026","7","3er lapso","37","105","10","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("1061","2025-2026","7","3er lapso","42","103","10","18",NULL,NULL,"17.33");
INSERT INTO `calificaciones` VALUES("1062","2025-2026","7","3er lapso","42","103","10","17",NULL,NULL,"17.33");
INSERT INTO `calificaciones` VALUES("1063","2025-2026","7","3er lapso","42","103","10","17",NULL,NULL,"17.33");
INSERT INTO `calificaciones` VALUES("1064","2025-2026","7","3er lapso","42","100","10","15",NULL,NULL,"15.67");
INSERT INTO `calificaciones` VALUES("1065","2025-2026","7","3er lapso","42","100","10","16",NULL,NULL,"15.67");
INSERT INTO `calificaciones` VALUES("1066","2025-2026","7","3er lapso","42","100","10","16",NULL,NULL,"15.67");
INSERT INTO `calificaciones` VALUES("1067","2025-2026","7","3er lapso","42","101","1","17",NULL,NULL,"17.67");
INSERT INTO `calificaciones` VALUES("1068","2025-2026","7","3er lapso","42","101","1","18",NULL,NULL,"17.67");
INSERT INTO `calificaciones` VALUES("1069","2025-2026","7","3er lapso","42","101","1","18",NULL,NULL,"17.67");
INSERT INTO `calificaciones` VALUES("1070","2025-2026","8","1er lapso","43","99","10","16",NULL,NULL,"16.33");
INSERT INTO `calificaciones` VALUES("1071","2025-2026","8","1er lapso","43","99","10","17",NULL,NULL,"16.33");
INSERT INTO `calificaciones` VALUES("1072","2025-2026","8","1er lapso","43","99","10","16",NULL,NULL,"16.33");
INSERT INTO `calificaciones` VALUES("1073","2025-2026","8","1er lapso","41","106","10","18",NULL,NULL,"18.33");
INSERT INTO `calificaciones` VALUES("1074","2025-2026","8","1er lapso","41","106","10","19",NULL,NULL,"18.33");
INSERT INTO `calificaciones` VALUES("1075","2025-2026","8","1er lapso","41","106","10","18",NULL,NULL,"18.33");
INSERT INTO `calificaciones` VALUES("1076","2025-2026","8","1er lapso","39","104","10","15",NULL,NULL,"14.67");
INSERT INTO `calificaciones` VALUES("1077","2025-2026","8","1er lapso","39","104","10","14",NULL,NULL,"14.67");
INSERT INTO `calificaciones` VALUES("1078","2025-2026","8","1er lapso","39","104","10","15",NULL,NULL,"14.67");
INSERT INTO `calificaciones` VALUES("1079","2025-2026","8","1er lapso","36","107","10","20",NULL,NULL,"19.33");
INSERT INTO `calificaciones` VALUES("1080","2025-2026","8","1er lapso","36","107","10","19",NULL,NULL,"19.33");
INSERT INTO `calificaciones` VALUES("1081","2025-2026","8","1er lapso","36","107","10","19",NULL,NULL,"19.33");
INSERT INTO `calificaciones` VALUES("1082","2025-2026","8","1er lapso","38","108","10","13",NULL,NULL,"13.67");
INSERT INTO `calificaciones` VALUES("1083","2025-2026","8","1er lapso","38","108","10","14",NULL,NULL,"13.67");
INSERT INTO `calificaciones` VALUES("1084","2025-2026","8","1er lapso","38","108","10","14",NULL,NULL,"13.67");
INSERT INTO `calificaciones` VALUES("1085","2025-2026","8","1er lapso","40","102","10","17",NULL,NULL,"17.00");
INSERT INTO `calificaciones` VALUES("1086","2025-2026","8","1er lapso","40","102","10","17",NULL,NULL,"17.00");
INSERT INTO `calificaciones` VALUES("1087","2025-2026","8","1er lapso","40","102","10","17",NULL,NULL,"17.00");
INSERT INTO `calificaciones` VALUES("1088","2025-2026","8","1er lapso","37","105","10","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("1089","2025-2026","8","1er lapso","37","105","10","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("1090","2025-2026","8","1er lapso","37","105","10","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("1091","2025-2026","8","1er lapso","42","103","10","18",NULL,NULL,"17.33");
INSERT INTO `calificaciones` VALUES("1092","2025-2026","8","1er lapso","42","103","10","17",NULL,NULL,"17.33");
INSERT INTO `calificaciones` VALUES("1093","2025-2026","8","1er lapso","42","103","10","17",NULL,NULL,"17.33");
INSERT INTO `calificaciones` VALUES("1094","2025-2026","8","1er lapso","42","100","10","15",NULL,NULL,"15.67");
INSERT INTO `calificaciones` VALUES("1095","2025-2026","8","1er lapso","42","100","10","16",NULL,NULL,"15.67");
INSERT INTO `calificaciones` VALUES("1096","2025-2026","8","1er lapso","42","100","10","16",NULL,NULL,"15.67");
INSERT INTO `calificaciones` VALUES("1097","2025-2026","8","1er lapso","42","101","10","17",NULL,NULL,"17.67");
INSERT INTO `calificaciones` VALUES("1098","2025-2026","8","1er lapso","42","101","10","18",NULL,NULL,"17.67");
INSERT INTO `calificaciones` VALUES("1099","2025-2026","8","1er lapso","42","101","10","18",NULL,NULL,"17.67");
INSERT INTO `calificaciones` VALUES("1100","2025-2026","8","2do lapso","43","99","10","16",NULL,NULL,"16.33");
INSERT INTO `calificaciones` VALUES("1101","2025-2026","8","2do lapso","43","99","10","17",NULL,NULL,"16.33");
INSERT INTO `calificaciones` VALUES("1102","2025-2026","8","2do lapso","43","99","10","16",NULL,NULL,"16.33");
INSERT INTO `calificaciones` VALUES("1103","2025-2026","8","2do lapso","41","106","10","18",NULL,NULL,"18.33");
INSERT INTO `calificaciones` VALUES("1104","2025-2026","8","2do lapso","41","106","10","19",NULL,NULL,"18.33");
INSERT INTO `calificaciones` VALUES("1105","2025-2026","8","2do lapso","41","106","10","18",NULL,NULL,"18.33");
INSERT INTO `calificaciones` VALUES("1106","2025-2026","8","2do lapso","39","104","10","15",NULL,NULL,"14.67");
INSERT INTO `calificaciones` VALUES("1107","2025-2026","8","2do lapso","39","104","10","14",NULL,NULL,"14.67");
INSERT INTO `calificaciones` VALUES("1108","2025-2026","8","2do lapso","39","104","10","15",NULL,NULL,"14.67");
INSERT INTO `calificaciones` VALUES("1109","2025-2026","8","2do lapso","36","107","10","20",NULL,NULL,"19.33");
INSERT INTO `calificaciones` VALUES("1110","2025-2026","8","2do lapso","36","107","10","19",NULL,NULL,"19.33");
INSERT INTO `calificaciones` VALUES("1111","2025-2026","8","2do lapso","36","107","10","19",NULL,NULL,"19.33");
INSERT INTO `calificaciones` VALUES("1112","2025-2026","8","2do lapso","38","108","10","13",NULL,NULL,"13.67");
INSERT INTO `calificaciones` VALUES("1113","2025-2026","8","2do lapso","38","108","10","14",NULL,NULL,"13.67");
INSERT INTO `calificaciones` VALUES("1114","2025-2026","8","2do lapso","38","108","10","14",NULL,NULL,"13.67");
INSERT INTO `calificaciones` VALUES("1115","2025-2026","8","2do lapso","40","102","10","17",NULL,NULL,"17.00");
INSERT INTO `calificaciones` VALUES("1116","2025-2026","8","2do lapso","40","102","10","17",NULL,NULL,"17.00");
INSERT INTO `calificaciones` VALUES("1117","2025-2026","8","2do lapso","40","102","10","17",NULL,NULL,"17.00");
INSERT INTO `calificaciones` VALUES("1118","2025-2026","8","2do lapso","37","105","10","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("1119","2025-2026","8","2do lapso","37","105","10","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("1120","2025-2026","8","2do lapso","37","105","10","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("1121","2025-2026","8","2do lapso","42","103","10","18",NULL,NULL,"17.33");
INSERT INTO `calificaciones` VALUES("1122","2025-2026","8","2do lapso","42","103","10","17",NULL,NULL,"17.33");
INSERT INTO `calificaciones` VALUES("1123","2025-2026","8","2do lapso","42","103","10","17",NULL,NULL,"17.33");
INSERT INTO `calificaciones` VALUES("1124","2025-2026","8","2do lapso","42","100","10","15",NULL,NULL,"15.67");
INSERT INTO `calificaciones` VALUES("1125","2025-2026","8","2do lapso","42","100","10","16",NULL,NULL,"15.67");
INSERT INTO `calificaciones` VALUES("1126","2025-2026","8","2do lapso","42","100","10","16",NULL,NULL,"15.67");
INSERT INTO `calificaciones` VALUES("1127","2025-2026","8","2do lapso","42","101","10","17",NULL,NULL,"17.67");
INSERT INTO `calificaciones` VALUES("1128","2025-2026","8","2do lapso","42","101","10","18",NULL,NULL,"17.67");
INSERT INTO `calificaciones` VALUES("1129","2025-2026","8","2do lapso","42","101","10","18",NULL,NULL,"17.67");
INSERT INTO `calificaciones` VALUES("1130","2025-2026","8","3er lapso","43","99","10","16",NULL,NULL,"16.33");
INSERT INTO `calificaciones` VALUES("1131","2025-2026","8","3er lapso","43","99","10","17",NULL,NULL,"16.33");
INSERT INTO `calificaciones` VALUES("1132","2025-2026","8","3er lapso","43","99","10","16",NULL,NULL,"16.33");
INSERT INTO `calificaciones` VALUES("1133","2025-2026","8","3er lapso","41","106","10","18",NULL,NULL,"18.33");
INSERT INTO `calificaciones` VALUES("1134","2025-2026","8","3er lapso","41","106","10","19",NULL,NULL,"18.33");
INSERT INTO `calificaciones` VALUES("1135","2025-2026","8","3er lapso","41","106","10","18",NULL,NULL,"18.33");
INSERT INTO `calificaciones` VALUES("1136","2025-2026","8","3er lapso","39","104","10","15",NULL,NULL,"14.67");
INSERT INTO `calificaciones` VALUES("1137","2025-2026","8","3er lapso","39","104","10","14",NULL,NULL,"14.67");
INSERT INTO `calificaciones` VALUES("1138","2025-2026","8","3er lapso","39","104","10","15",NULL,NULL,"14.67");
INSERT INTO `calificaciones` VALUES("1139","2025-2026","8","3er lapso","36","107","10","20",NULL,NULL,"19.33");
INSERT INTO `calificaciones` VALUES("1140","2025-2026","8","3er lapso","36","107","10","19",NULL,NULL,"19.33");
INSERT INTO `calificaciones` VALUES("1141","2025-2026","8","3er lapso","36","107","10","19",NULL,NULL,"19.33");
INSERT INTO `calificaciones` VALUES("1142","2025-2026","8","3er lapso","38","108","10","13",NULL,NULL,"13.67");
INSERT INTO `calificaciones` VALUES("1143","2025-2026","8","3er lapso","38","108","10","14",NULL,NULL,"13.67");
INSERT INTO `calificaciones` VALUES("1144","2025-2026","8","3er lapso","38","108","10","14",NULL,NULL,"13.67");
INSERT INTO `calificaciones` VALUES("1145","2025-2026","8","3er lapso","40","102","10","17",NULL,NULL,"17.00");
INSERT INTO `calificaciones` VALUES("1146","2025-2026","8","3er lapso","40","102","10","17",NULL,NULL,"17.00");
INSERT INTO `calificaciones` VALUES("1147","2025-2026","8","3er lapso","40","102","10","17",NULL,NULL,"17.00");
INSERT INTO `calificaciones` VALUES("1148","2025-2026","8","3er lapso","37","105","10","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("1149","2025-2026","8","3er lapso","37","105","10","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("1150","2025-2026","8","3er lapso","37","105","10","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("1151","2025-2026","8","3er lapso","42","103","10","18",NULL,NULL,"17.33");
INSERT INTO `calificaciones` VALUES("1152","2025-2026","8","3er lapso","42","103","10","17",NULL,NULL,"17.33");
INSERT INTO `calificaciones` VALUES("1153","2025-2026","8","3er lapso","42","103","10","17",NULL,NULL,"17.33");
INSERT INTO `calificaciones` VALUES("1154","2025-2026","8","3er lapso","42","100","10","15",NULL,NULL,"15.67");
INSERT INTO `calificaciones` VALUES("1155","2025-2026","8","3er lapso","42","100","10","16",NULL,NULL,"15.67");
INSERT INTO `calificaciones` VALUES("1156","2025-2026","8","3er lapso","42","100","10","16",NULL,NULL,"15.67");
INSERT INTO `calificaciones` VALUES("1157","2025-2026","8","3er lapso","42","101","1","17",NULL,NULL,"17.67");
INSERT INTO `calificaciones` VALUES("1158","2025-2026","8","3er lapso","42","101","1","18",NULL,NULL,"17.67");
INSERT INTO `calificaciones` VALUES("1159","2025-2026","8","3er lapso","42","101","1","18",NULL,NULL,"17.67");

DROP TABLE IF EXISTS `contacto_pago`;
CREATE TABLE `contacto_pago` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
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
  `direccion_empresa` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `contacto_pago` VALUES("27","V142563210","Mariales","Solis","Barquisimeto Lara","04245632101","mariales@gmail.com","Universitario","Ninguna registrada","Sí","Seguros Salud","04245663100","Avenida Lara");
INSERT INTO `contacto_pago` VALUES("28","V142563211","Rafael","Ramos","Barquisimeto","04244156300","contactoprueba@gmail.com","Primariaaaaa","NingunaAAA","Sí","Soluciones MYT","04121111422","Barquisimeto");
INSERT INTO `contacto_pago` VALUES("29","V14445145","Adriana","Salas","Caracas Venezuela","04125896311","adrianas@gmail.com","Ninguno aún","NingunaAAA","No","","","");
INSERT INTO `contacto_pago` VALUES("30","V147414122","contacto","contacto","Barquisimeto Lara","04244152102","contactoprueba@gmail.com","Bachillerato","Ingeniero Sistemas","Sí","Seguros Qualita","04241111111","Avenida Venezula");
INSERT INTO `contacto_pago` VALUES("31","V14511101","Fabian","Solis","Barquisimeto Lara","04241156321","fabian@gmail.com","Bachillerato","Ingeniero Sistemas","Sí","Sistemas GRUCAS","04241115631","Avenida Los Leones");
INSERT INTO `contacto_pago` VALUES("32","V12345678","Mariaca","Solis","Barquisimeto Lara","04245211000","madre@gmail.com","Bachillerato","Ninguna registrada","Sí","Benzemos Lara","04241115621","Circunvalacion");
INSERT INTO `contacto_pago` VALUES("33","V51263321","Zoraida","Mejias","Barquisimeto Lara","04245211000","zoraida@gmail.com","Bachillerato","Ninguna registrada","Sí","Lidotel Bqto","04125632100","Circunvalacion");
INSERT INTO `contacto_pago` VALUES("34","V12121101","Mariela","Suarez","Barquisimeto","04241121210","mariela@gmail.com","Bachillerato","Licenciada","Sí","Seguros Lara","04241010101","Cabudare Centro");
INSERT INTO `contacto_pago` VALUES("35","V14441210","Andres","Mendoza","Barquisimeto","04241010100","andres@gmail.com","Bachillerato","Ninguna activa","Sí","TGS Solutions","04241124251","Barquisimeto");
INSERT INTO `contacto_pago` VALUES("36","V15666631","Yovan","Silva","Barquisimeto","04241442421","yovans@gmail.com","Bachillerato","Ninguna activa","Sí","Mercados Lara","04245563110","Barquisimeto");
INSERT INTO `contacto_pago` VALUES("37","V17789854","Marcial","Solorzano","Barquisimeto","04124452101","marcials@gmail.com","Licenciado","Ninguna activa","Sí","Bencemos Lara","04241121210","Barquisimeto");
INSERT INTO `contacto_pago` VALUES("38","V77741210","Enrique","Mendoza","Barquisimeto","04241156221","enrique@gmail.com","Lincenciatura","Ninguna activa","Sí","GT Nascars","04241244211","Barquisimeto");
INSERT INTO `contacto_pago` VALUES("39","V7777851","Alfredo","Mejias","Barquisimeto","04241010100","mejias1@gmail.com","Bachillerato","Ninguna activa","Sí","TGS Solutions","04241244211","Barquisimeto");
INSERT INTO `contacto_pago` VALUES("40","V7785211","Margot","Robbie","Barquisimeto","04245599981","margot@gmail.com","Ninguna aun","Ninguna aún","Sí","Seguros Lara","04241010101","Cabudare Centro");
INSERT INTO `contacto_pago` VALUES("41","V7741663","Enrique","Bonilla","Barquisimeto","04241010100","enrique@gmail.com","Lincenciatura","Ninguna activa","Sí","Mercados Lara","04245563110","Barquisimeto");
INSERT INTO `contacto_pago` VALUES("42","V89333121","Jairo","Menendez","Barquisimeto","04241442421","jairo@gmail.com","Bachillerato","Ninguna activa","Sí","Mercados Lara","04241124251","Barquisimeto");
INSERT INTO `contacto_pago` VALUES("43","V17884411","Elena","Castro","Barquisimeto","04245596321","elena@gmail.com","Lincenciatura","Ninguna aún","Sí","Empresa Ejempl","04241145210","Barquisimeto");

DROP TABLE IF EXISTS `estado`;
CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `estado` VALUES("1","Inactivo");
INSERT INTO `estado` VALUES("2","Activo");

DROP TABLE IF EXISTS `estudiantes`;
CREATE TABLE `estudiantes` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
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
  `enfermedad_est` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `grado_est` (`grado_est`),
  CONSTRAINT `estudiantes_ibfk_1` FOREIGN KEY (`grado_est`) REFERENCES `grados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `estudiantes` VALUES("1","V14256321","Arianna","Solis","F","14/12/2013","12","Barquisimeto","Barquisimeto","Colegio Dioscesano","Retiro formal","Ninguno aun","Ninguna aun","1","Mañana","No","No","Ninguno aun","Ninguno aun");
INSERT INTO `estudiantes` VALUES("2","V14521000","Adrian","Salcedo","M","14/06/2010","15","Barrio Union","Barquisimeto","Colegio Alfredo","Ninguno aun","Ninguno aun","Ninguno aun","1","Mañana","","","Ninguno aun","Ninguno aun");
INSERT INTO `estudiantes` VALUES("3","","Valeria","Salcedo","F","12/05/2012","13","Avenida Cristobal C","Barquisimeto","Colegio 24 de Junio","Ninguno aun","Ninguno aun","Ninguno aun","1","Mañana","","","Ninguno aun","Ninguno aun");
INSERT INTO `estudiantes` VALUES("4","V1411210","Merwin","Mendoza","M","14/06/2011","14","Barquisimeto","Barquisimeto","Colegio Prados del Norte","Ninguno aun","Ninguno aun","Ninguno aun","1","Mañana","","","Ninguna aun","Ninguno aun");
INSERT INTO `estudiantes` VALUES("5","V14256311","Fabian Enrique","Salsedo","M","14/12/2013","13","Barquisimeto","Barquisimeto","Colegio Dioscesano","Ninguno aun","Ninguno aun","Ninguno aun","7","Mañana","","","Ninguno aun","Ninguno aun");
INSERT INTO `estudiantes` VALUES("7","V1201000","Yovana","Sarate","F","08/02/2012","13","Barquisimeto","Barquisimeto","Colegio Dioscesano","Ninguno aun","Ninguno aun","Ninguno aun","7","Mañana","","","Ninguno aun","Ninguno aun");
INSERT INTO `estudiantes` VALUES("8","V1212100","Sofia","Gonzales","F","14/12/2013","15","Barquisimeto","Barquisimeto","Colegio 24 de Junio","Ninguno aun","Ninguno aun","Ninguno aun","1","Mañana","","","Ninguno aun","Ninguno aun");
INSERT INTO `estudiantes` VALUES("9","V21001212","Mery","Sanchez","F","14/12/2013","15","Barquisimeto","Barquisimeto","Colegio 24 de Junio","Retiro formal","Ninguno aun","Ninguno aun","7","Mañana","","","Ninguno aun","Ninguno aun");
INSERT INTO `estudiantes` VALUES("10","V1421210","Marian","López","F","14/06/2008","17","Barquisimeto","Barquisimeto","Colegio Los Ilustres","Salida Formal","Igualación segundo grado","Retiro formal","8","Mañana","","","No posee vacunas","No tiene enfermedades");
INSERT INTO `estudiantes` VALUES("11","V25633210","Andres","Menendez","M","14/10/2009","16","Barquisimeto","Barquisimeto","Colegio Las Americas","Salida Formal","Igualación segundo grado","Retiro formal","7","Mañana","","","No posee vacunas","No tiene enfermedades");
INSERT INTO `estudiantes` VALUES("12","V14424211","Enrique","Castañeda","M","08/08/2010","15","Barquisimeto","Barquisimeto","Colegio Los Ilustres","Salida Formal","Igualación segundo grado","Retiro formal","7","Mañana","","","No posee vacunas","No tiene enfermedades");
INSERT INTO `estudiantes` VALUES("13","V12421210","Maria Victoria","Serrano","F","14/10/2010","15","Barquisimeto","Barquisimeto","Colegio Las Americas","Salida Formal","Igualación segundo grado","Retiro formal","7","Mañana","","","No posee vacunas","No tiene enfermedades");
INSERT INTO `estudiantes` VALUES("14","V14455210","Fabian","Salazar","F","14/06/2012","13","Barquisimeto","Barquisimeto","Colegio Las Americas","Retiro formal","Igualación segundo grado","Ninguna aún","7","Mañana","Ningun registro","Ningun registro","No posee vacunas","No tiene enfermedades");
INSERT INTO `estudiantes` VALUES("15","V1888889","Pedro","Pascal","M","14/06/2013","13","Barquisimeto","Barquisimeto","Colegio Las Americas","Retiro formal","Igualación segundo grado","Retiro formal","7","Mañana","","","No posee vacunas","No tiene enfermedades");
INSERT INTO `estudiantes` VALUES("16","V7841120","Verónica","Leiva","F","14/06/2012","13","Barquisimeto","Barquisimeto","Colegio Las Americas","Retiro formal","Igualación segundo grado","Ninguna aún","7","Mañana","","","No posee vacunas","No tiene enfermedades");
INSERT INTO `estudiantes` VALUES("17","V28999654","Veronica","Serrano","F","14/07/2013","12","Barquisimeto","Barquisimeto","Colegio Las Americas","Salida Formal","Igualación segundo grado","Ninguna aún","7","Mañana","","","No posee vacunas","No tiene enfermedades");
INSERT INTO `estudiantes` VALUES("18","V1775754","Antonella","Lara","F","14/06/2013","12","Barquisimeto","Barquisimeto","Colegio Las Americas","Retiro formal","Nivel de Primaria","Ninguna aún","1","Mañana","Ningun registro","Ningun registro","No posee vacunas","No tiene enfermedades");

DROP TABLE IF EXISTS `grado_materia`;
CREATE TABLE `grado_materia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_grado` int(5) NOT NULL,
  `id_materia` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_grado` (`id_grado`),
  KEY `id_materia` (`id_materia`),
  CONSTRAINT `grado_materia_ibfk_1` FOREIGN KEY (`id_grado`) REFERENCES `grados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `grado_materia_ibfk_2` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `grado_materia` VALUES("61","7","99");
INSERT INTO `grado_materia` VALUES("62","7","106");
INSERT INTO `grado_materia` VALUES("63","7","104");
INSERT INTO `grado_materia` VALUES("64","7","107");
INSERT INTO `grado_materia` VALUES("65","7","108");
INSERT INTO `grado_materia` VALUES("66","7","102");
INSERT INTO `grado_materia` VALUES("67","7","105");
INSERT INTO `grado_materia` VALUES("68","7","103");
INSERT INTO `grado_materia` VALUES("69","7","100");
INSERT INTO `grado_materia` VALUES("70","7","101");
INSERT INTO `grado_materia` VALUES("71","1","114");
INSERT INTO `grado_materia` VALUES("72","1","113");
INSERT INTO `grado_materia` VALUES("73","1","111");
INSERT INTO `grado_materia` VALUES("74","1","112");
INSERT INTO `grado_materia` VALUES("75","1","115");
INSERT INTO `grado_materia` VALUES("76","1","116");

DROP TABLE IF EXISTS `grados`;
CREATE TABLE `grados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria_grado` varchar(30) NOT NULL,
  `id_grado` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `grados` VALUES("1","Primaria","1er grado");
INSERT INTO `grados` VALUES("2","Primaria","2do grado");
INSERT INTO `grados` VALUES("3","Primaria","3er grado");
INSERT INTO `grados` VALUES("4","Primaria","4to grado");
INSERT INTO `grados` VALUES("5","Primaria","5to grado");
INSERT INTO `grados` VALUES("6","Primaria","6to grado");
INSERT INTO `grados` VALUES("7","Secundaria","1er año");
INSERT INTO `grados` VALUES("8","Secundaria","2do año");
INSERT INTO `grados` VALUES("9","Secundaria","3er año");
INSERT INTO `grados` VALUES("10","Secundaria","4to año");
INSERT INTO `grados` VALUES("11","Secundaria","5to año");

DROP TABLE IF EXISTS `horarios`;
CREATE TABLE `horarios` (
  `id_horario` int(11) NOT NULL AUTO_INCREMENT,
  `id_grado` int(11) NOT NULL,
  `id_aula` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `dia_semana` varchar(15) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `anio_escolar` varchar(20) NOT NULL,
  PRIMARY KEY (`id_horario`),
  KEY `id_grado` (`id_grado`),
  KEY `id_aula` (`id_aula`),
  KEY `id_materia` (`id_materia`),
  KEY `id_profesor` (`id_profesor`),
  CONSTRAINT `horarios_ibfk_1` FOREIGN KEY (`id_grado`) REFERENCES `grados` (`id`),
  CONSTRAINT `horarios_ibfk_2` FOREIGN KEY (`id_aula`) REFERENCES `aulas` (`id_aula`),
  CONSTRAINT `horarios_ibfk_3` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`),
  CONSTRAINT `horarios_ibfk_4` FOREIGN KEY (`id_profesor`) REFERENCES `profesores` (`id_profesor`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `horarios` VALUES("76","7","7","107","36","1","07:00:00","08:00:00","2025-2026");
INSERT INTO `horarios` VALUES("77","7","7","106","41","1","08:00:00","09:00:00","2025-2026");
INSERT INTO `horarios` VALUES("78","7","7","104","39","1","09:00:00","10:00:00","2025-2026");
INSERT INTO `horarios` VALUES("79","7","7","107","36","1","10:00:00","11:00:00","2025-2026");
INSERT INTO `horarios` VALUES("80","7","7","102","40","1","11:00:00","12:00:00","2025-2026");
INSERT INTO `horarios` VALUES("81","7","7","104","39","2","07:00:00","08:00:00","2025-2026");
INSERT INTO `horarios` VALUES("82","7","7","108","38","2","08:00:00","09:00:00","2025-2026");
INSERT INTO `horarios` VALUES("83","7","7","102","40","2","09:00:00","10:00:00","2025-2026");
INSERT INTO `horarios` VALUES("84","7","7","103","42","2","10:00:00","11:00:00","2025-2026");
INSERT INTO `horarios` VALUES("85","7","7","107","36","2","11:00:00","12:00:00","2025-2026");
INSERT INTO `horarios` VALUES("86","7","7","103","42","3","07:00:00","10:00:00","2025-2026");
INSERT INTO `horarios` VALUES("87","7","7","100","42","3","10:00:00","11:00:00","2025-2026");
INSERT INTO `horarios` VALUES("88","7","7","100","42","3","11:00:00","12:00:00","2025-2026");
INSERT INTO `horarios` VALUES("89","7","7","102","40","4","07:00:00","08:00:00","2025-2026");
INSERT INTO `horarios` VALUES("90","7","7","102","40","4","08:00:00","10:00:00","2025-2026");
INSERT INTO `horarios` VALUES("91","7","7","108","38","4","10:00:00","12:00:00","2025-2026");
INSERT INTO `horarios` VALUES("92","7","7","108","38","5","07:00:00","08:00:00","2025-2026");
INSERT INTO `horarios` VALUES("93","7","7","106","41","5","08:00:00","09:00:00","2025-2026");
INSERT INTO `horarios` VALUES("94","7","7","103","42","5","09:00:00","10:00:00","2025-2026");
INSERT INTO `horarios` VALUES("95","7","7","102","40","5","10:00:00","12:00:00","2025-2026");
INSERT INTO `horarios` VALUES("96","1","5","113","47","1","07:00:00","08:00:00","2025-2026");
INSERT INTO `horarios` VALUES("97","1","5","114","47","1","08:00:00","09:00:00","2025-2026");
INSERT INTO `horarios` VALUES("98","1","5","112","47","1","09:00:00","10:00:00","2025-2026");
INSERT INTO `horarios` VALUES("99","1","5","111","47","1","10:00:00","11:00:00","2025-2026");
INSERT INTO `horarios` VALUES("100","1","5","116","47","1","11:00:00","12:00:00","2025-2026");

DROP TABLE IF EXISTS `inscripciones`;
CREATE TABLE `inscripciones` (
  `id_inscripcion` int(11) NOT NULL AUTO_INCREMENT,
  `id_estudiante` int(11) DEFAULT NULL,
  `id_representante` int(11) DEFAULT NULL,
  `anio_escolar` varchar(20) DEFAULT NULL,
  `grado` int(50) DEFAULT NULL,
  `fecha_inscripcion` varchar(50) DEFAULT NULL,
  `responsable_pago` int(5) DEFAULT NULL,
  PRIMARY KEY (`id_inscripcion`),
  KEY `id_estudiante` (`id_estudiante`),
  KEY `id_representante` (`id_representante`),
  KEY `grado` (`grado`),
  KEY `responsable_pago` (`responsable_pago`),
  CONSTRAINT `inscripciones_ibfk_1` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiantes` (`id`),
  CONSTRAINT `inscripciones_ibfk_2` FOREIGN KEY (`id_representante`) REFERENCES `representantes` (`id`),
  CONSTRAINT `inscripciones_ibfk_3` FOREIGN KEY (`responsable_pago`) REFERENCES `contacto_pago` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `inscripciones_ibfk_4` FOREIGN KEY (`grado`) REFERENCES `grados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `inscripciones` VALUES("24","16","19","2025-2026","7","2025-07-25","41");
INSERT INTO `inscripciones` VALUES("25","16","20","2025-2026","7","2025-07-25","41");
INSERT INTO `inscripciones` VALUES("26","17","21","2025-2026","7","2025-07-25","42");
INSERT INTO `inscripciones` VALUES("27","17","22","2025-2026","7","2025-07-25","42");
INSERT INTO `inscripciones` VALUES("28","18","23","2025-2026","1","2025-07-25","43");
INSERT INTO `inscripciones` VALUES("29","18","24","2025-2026","1","2025-07-25","43");

DROP TABLE IF EXISTS `materias`;
CREATE TABLE `materias` (
  `id_materia` int(11) NOT NULL AUTO_INCREMENT,
  `nivel_materia` text NOT NULL,
  `nombre` varchar(35) NOT NULL,
  `id_estado` int(11) NOT NULL,
  PRIMARY KEY (`id_materia`),
  KEY `id_estado` (`id_estado`),
  CONSTRAINT `materias_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `materias` VALUES("99","Secundaria","CASTELLANO Y LITERATURA","2");
INSERT INTO `materias` VALUES("100","Secundaria","INGLÉS","2");
INSERT INTO `materias` VALUES("101","Secundaria","MATEMÁTICA","2");
INSERT INTO `materias` VALUES("102","Secundaria","ESTUDIOS DE LA NATURALEZA","2");
INSERT INTO `materias` VALUES("103","Secundaria","HISTORIA DE VENEZUELA","2");
INSERT INTO `materias` VALUES("104","Secundaria","EDUCACIÓN FAMILIAR Y CIUDADANA","2");
INSERT INTO `materias` VALUES("105","Secundaria","GEOGRAFIA GENERAL","2");
INSERT INTO `materias` VALUES("106","Secundaria","EDUCACIÓN ARTÍSTICA","2");
INSERT INTO `materias` VALUES("107","Secundaria","EDUCACIÓN FÍSICA Y DEPORTE","2");
INSERT INTO `materias` VALUES("108","Secundaria","EDUCACIÓN PARA EL TRABAJO","2");
INSERT INTO `materias` VALUES("111","Primaria","AREA LENGUAJE","2");
INSERT INTO `materias` VALUES("112","Primaria","AREA SOCIALES","2");
INSERT INTO `materias` VALUES("113","Primaria","AREA DEPORTES","2");
INSERT INTO `materias` VALUES("114","Primaria","ACTIVIDAD COMPLEMENTARIA EN AULA","2");
INSERT INTO `materias` VALUES("115","Primaria","INDICADORES GENERALES","2");
INSERT INTO `materias` VALUES("116","Primaria","MANUALIDADES","2");

DROP TABLE IF EXISTS `materias_pendientes`;
CREATE TABLE `materias_pendientes` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `id_estudiante` int(8) NOT NULL,
  `id_materia` int(5) NOT NULL,
  `id_grado` int(5) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `anio_escolar` varchar(20) NOT NULL,
  `promedio_final` decimal(5,2) NOT NULL,
  `estado` enum('pendiente','recuperada','repetida') NOT NULL DEFAULT 'pendiente',
  `fecha_registro` varchar(15) NOT NULL DEFAULT current_timestamp(),
  `fecha_actualizacion` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `id_estudiante` (`id_estudiante`),
  KEY `id_materia` (`id_materia`),
  KEY `id_grado` (`id_grado`),
  KEY `id_profesor` (`id_profesor`),
  CONSTRAINT `materias_pendientes_ibfk_1` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiantes` (`id`),
  CONSTRAINT `materias_pendientes_ibfk_2` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`),
  CONSTRAINT `materias_pendientes_ibfk_3` FOREIGN KEY (`id_grado`) REFERENCES `grados` (`id`),
  CONSTRAINT `materias_pendientes_ibfk_4` FOREIGN KEY (`id_profesor`) REFERENCES `profesores` (`id_profesor`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `profesor_grado`;
CREATE TABLE `profesor_grado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_profesor` int(8) NOT NULL,
  `id_grado` int(8) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_profesor` (`id_profesor`),
  KEY `id_grado` (`id_grado`),
  CONSTRAINT `profesor_grado_ibfk_1` FOREIGN KEY (`id_profesor`) REFERENCES `profesores` (`id_profesor`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `profesor_grado_ibfk_2` FOREIGN KEY (`id_grado`) REFERENCES `grados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `profesor_grado` VALUES("70","43","7");
INSERT INTO `profesor_grado` VALUES("71","41","7");
INSERT INTO `profesor_grado` VALUES("72","39","7");
INSERT INTO `profesor_grado` VALUES("73","36","7");
INSERT INTO `profesor_grado` VALUES("74","38","7");
INSERT INTO `profesor_grado` VALUES("75","40","7");
INSERT INTO `profesor_grado` VALUES("76","37","7");
INSERT INTO `profesor_grado` VALUES("77","42","7");
INSERT INTO `profesor_grado` VALUES("78","47","1");

DROP TABLE IF EXISTS `profesor_materia_grado`;
CREATE TABLE `profesor_materia_grado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_profesor` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `id_grado` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_profesor` (`id_profesor`,`id_materia`,`id_grado`),
  KEY `id_grado` (`id_grado`),
  KEY `id_materia` (`id_materia`),
  CONSTRAINT `profesor_materia_grado_ibfk_1` FOREIGN KEY (`id_grado`) REFERENCES `grados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `profesor_materia_grado_ibfk_2` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `profesor_materia_grado_ibfk_3` FOREIGN KEY (`id_profesor`) REFERENCES `profesores` (`id_profesor`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `profesor_materia_grado` VALUES("13","36","107","7");
INSERT INTO `profesor_materia_grado` VALUES("16","37","105","7");
INSERT INTO `profesor_materia_grado` VALUES("14","38","108","7");
INSERT INTO `profesor_materia_grado` VALUES("12","39","104","7");
INSERT INTO `profesor_materia_grado` VALUES("15","40","102","7");
INSERT INTO `profesor_materia_grado` VALUES("11","41","106","7");
INSERT INTO `profesor_materia_grado` VALUES("18","42","100","7");
INSERT INTO `profesor_materia_grado` VALUES("19","42","101","7");
INSERT INTO `profesor_materia_grado` VALUES("17","42","103","7");
INSERT INTO `profesor_materia_grado` VALUES("10","43","99","7");
INSERT INTO `profesor_materia_grado` VALUES("22","47","111","1");
INSERT INTO `profesor_materia_grado` VALUES("23","47","112","1");
INSERT INTO `profesor_materia_grado` VALUES("21","47","113","1");
INSERT INTO `profesor_materia_grado` VALUES("20","47","114","1");
INSERT INTO `profesor_materia_grado` VALUES("24","47","115","1");
INSERT INTO `profesor_materia_grado` VALUES("25","47","116","1");

DROP TABLE IF EXISTS `profesores`;
CREATE TABLE `profesores` (
  `id_profesor` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` varchar(12) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `nivel_grado` text NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `estado` int(20) NOT NULL,
  PRIMARY KEY (`id_profesor`),
  KEY `estado` (`estado`),
  CONSTRAINT `profesores_ibfk_1` FOREIGN KEY (`estado`) REFERENCES `estado` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `profesores` VALUES("36","V12345678","Leon López","Secundaria","04121256666","2");
INSERT INTO `profesores` VALUES("37","V14589321","Sofia Sarate","Secundaria","04142563212","2");
INSERT INTO `profesores` VALUES("38","V258965111","Manual Casas","Secundaria","04242563310","2");
INSERT INTO `profesores` VALUES("39","V25896110","Laura Mendoza","Secundaria","04161145211","2");
INSERT INTO `profesores` VALUES("40","V25614521","Miranda Ladino","Secundaria","04241212155","2");
INSERT INTO `profesores` VALUES("41","V87954122","José Quero","Secundaria","04241212111","2");
INSERT INTO `profesores` VALUES("42","V14521364","Yovana Salas","Secundaria","04241111111","2");
INSERT INTO `profesores` VALUES("43","V6998211","Gio Ledezma","Secundaria","04121212111","2");
INSERT INTO `profesores` VALUES("45","V142563210","Cecilia Miraflores","Primaria","04121425632","1");
INSERT INTO `profesores` VALUES("46","V14265211","Merino Manuel","Primaria","04141725632","2");
INSERT INTO `profesores` VALUES("47","V15226331","Yhoiber Leon","Primaria","04241425632","2");

DROP TABLE IF EXISTS `representantes`;
CREATE TABLE `representantes` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
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
  `direccion_empr` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `representantes` VALUES("19","V15632778","madre","Miriangel","Lopez","14/12/1988","miriangel@gmail.com","Barquisimeto","04241115931","Bachillerato","Ninguna aún","No","","","");
INSERT INTO `representantes` VALUES("20","V7741663","padre","Enrique","Bonilla","18/06/1996","enrique@gmail.com","Barquisimeto","04241010100","Lincenciatura","Ninguna activa","Sí","Mercados Lara","04245563110","Barquisimeto");
INSERT INTO `representantes` VALUES("21","V88896240","madre","Giovanna","Sarate","18/09/2000","giovanna@gmail.com","Barquisimeto","04241121210","Bachillerato","Ninguna aún","No","","","");
INSERT INTO `representantes` VALUES("22","V89333121","padre","Jairo","Menendez","28/06/1996","jairo@gmail.com","Barquisimeto","04241442421","Bachillerato","Ninguna activa","Sí","Mercados Lara","04241124251","Barquisimeto");
INSERT INTO `representantes` VALUES("23","V17884411","madre","Elena","Castro","08/06/1998","elena@gmail.com","Barquisimeto","04245596321","Lincenciatura","Ninguna aún","Sí","Empresa Ejempl","04241145210","Barquisimeto");
INSERT INTO `representantes` VALUES("24","V17785241","padre","Fernando","Solaris","08/06/1996","fernando@gmail.com","Barquisimeto","04241254242","Ningun rgistro","Ninguna activa","No","","","");

DROP TABLE IF EXISTS `rol`;
CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `rol` VALUES("1","Administrador");
INSERT INTO `rol` VALUES("2","Usuario");

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` varchar(50) NOT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_rol` (`id_rol`),
  KEY `id_estado` (`id_estado`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`),
  CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `users` VALUES("1","V123456740","Alejandro Marquina","josemarq656@gmail.com","04262918818","Prueba12.","1","2");
INSERT INTO `users` VALUES("9","V1233325","Michelle Mendoza","Jsemarq25@gmail.com","04124334925","1as21SA21A.","2","1");
INSERT INTO `users` VALUES("22","V1256324","Sofia Vergara","sofia145@gmail.com","04121522412","ASkslas20.","2","2");

SET foreign_key_checks = 1;
