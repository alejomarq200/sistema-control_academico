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
) ENGINE=InnoDB AUTO_INCREMENT=251 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `actividades` VALUES("30","2025-2026","Contenidos","Realiza actividad escrita de la letra Aa hasta la Hh.","111","1","47","1");
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
INSERT INTO `actividades` VALUES("100","2025-2026","Lectura","Lee en voz alta textos cortos con fluidez y entonación adecuada.","111","2","51","2");
INSERT INTO `actividades` VALUES("101","2025-2026","Escritura","Escribe oraciones completas usando correctamente mayúsculas y punto final.","111","2","51","2");
INSERT INTO `actividades` VALUES("102","2025-2026","Ortografía","Identifica y corrige errores ortográficos en palabras de uso frecuente.","111","2","51","2");
INSERT INTO `actividades` VALUES("103","2025-2026","Comprensión","Responde preguntas sobre un cuento leído en clase.","111","2","51","2");
INSERT INTO `actividades` VALUES("104","2025-2026","Vocabulario","Amplía su vocabulario mediante la identificación de sinónimos y antónimos.","111","2","51","2");
INSERT INTO `actividades` VALUES("105","2025-2026","Efemérides","Investiga y presenta sobre el Día de la Resistencia Indígena.","112","2","51","2");
INSERT INTO `actividades` VALUES("106","2025-2026","Geografía","Identifica y dibuja los símbolos naturales de Venezuela.","112","2","51","2");
INSERT INTO `actividades` VALUES("107","2025-2026","Historia","Elabora una línea del tiempo sencilla de su vida personal.","112","2","51","2");
INSERT INTO `actividades` VALUES("108","2025-2026","Cívica","Describe las normas de convivencia en el aula y su importancia.","112","2","51","2");
INSERT INTO `actividades` VALUES("109","2025-2026","Investigación","Realiza un dibujo sobre las tradiciones de su localidad.","112","2","51","2");
INSERT INTO `actividades` VALUES("110","2025-2026","Habilidades","Realiza ejercicios de coordinación motriz gruesa (saltar, correr, gatear).","113","2","51","2");
INSERT INTO `actividades` VALUES("111","2025-2026","Juegos","Participa en juegos tradicionales venezolanos (la ere, el gurrufío).","113","2","51","2");
INSERT INTO `actividades` VALUES("112","2025-2026","Equipo","Trabaja en equipo en actividades deportivas cooperativas.","113","2","51","2");
INSERT INTO `actividades` VALUES("113","2025-2026","Salud","Identifica hábitos de higiene personal relacionados con la actividad física.","113","2","51","2");
INSERT INTO `actividades` VALUES("114","2025-2026","Destreza","Desarrolla habilidades básicas de lanzamiento y recepción.","113","2","51","2");
INSERT INTO `actividades` VALUES("115","2025-2026","Organización","Mantiene ordenado su espacio de trabajo durante las actividades.","114","2","51","2");
INSERT INTO `actividades` VALUES("116","2025-2026","Responsabilidad","Cumple con las tareas asignadas para el hogar.","114","2","51","2");
INSERT INTO `actividades` VALUES("117","2025-2026","Participación","Interviene activamente en las discusiones de clase.","114","2","51","2");
INSERT INTO `actividades` VALUES("118","2025-2026","Creatividad","Propone ideas originales para resolver problemas planteados.","114","2","51","2");
INSERT INTO `actividades` VALUES("119","2025-2026","Autonomía","Realiza actividades escolares con mínima supervisión.","114","2","51","2");
INSERT INTO `actividades` VALUES("120","2025-2026","Disciplina","Sigue instrucciones y normas de convivencia en el aula.","115","2","51","2");
INSERT INTO `actividades` VALUES("121","2025-2026","Puntualidad","Entrega trabajos en el tiempo establecido.","115","2","51","2");
INSERT INTO `actividades` VALUES("122","2025-2026","Presentación","Mantiene sus cuadernos y materiales en buen estado.","115","2","51","2");
INSERT INTO `actividades` VALUES("123","2025-2026","Esfuerzo","Muestra interés por mejorar en áreas de dificultad.","115","2","51","2");
INSERT INTO `actividades` VALUES("124","2025-2026","Colaboración","Ayuda a sus compañeros cuando lo necesitan.","115","2","51","2");
INSERT INTO `actividades` VALUES("125","2025-2026","Creatividad","Elabora un móvil con figuras geométricas usando materiales reciclados.","116","2","51","2");
INSERT INTO `actividades` VALUES("126","2025-2026","Motricidad","Recorta y pega figuras con precisión siguiendo un patrón.","116","2","51","2");
INSERT INTO `actividades` VALUES("127","2025-2026","Técnica","Pinta un dibujo usando la técnica del estampado con vegetales.","116","2","51","2");
INSERT INTO `actividades` VALUES("128","2025-2026","Tradición","Construye un juguete tradicional venezolano (como un papagayo sencillo).","116","2","51","2");
INSERT INTO `actividades` VALUES("129","2025-2026","Expresión","Crea una máscara representando un personaje folklórico.","116","2","51","2");
INSERT INTO `actividades` VALUES("130","2025-2026","Lectura","Lee textos narrativos cortos y identifica personajes principales.","111","3","52","2");
INSERT INTO `actividades` VALUES("131","2025-2026","Escritura","Redacta un párrafo descriptivo sobre un animal de su preferencia.","111","3","52","2");
INSERT INTO `actividades` VALUES("132","2025-2026","Gramática","Clasifica palabras según su acento (agudas, graves, esdrújulas).","111","3","52","2");
INSERT INTO `actividades` VALUES("133","2025-2026","Comprensión","Resume el contenido de una lectura en 3 oraciones clave.","111","3","52","2");
INSERT INTO `actividades` VALUES("134","2025-2026","Expresión","Dramatiza un diálogo sencillo con entonación adecuada.","111","3","52","2");
INSERT INTO `actividades` VALUES("135","2025-2026","Historia","Investiga sobre los pueblos originarios de su región.","112","3","52","2");
INSERT INTO `actividades` VALUES("136","2025-2026","Geografía","Elabora un croquis sencillo de su comunidad.","112","3","52","2");
INSERT INTO `actividades` VALUES("137","2025-2026","Cívica","Explica los deberes y derechos de los niños.","112","3","52","2");
INSERT INTO `actividades` VALUES("138","2025-2026","Efemérides","Realiza una línea de tiempo sobre la vida de Simón Bolívar.","112","3","52","2");
INSERT INTO `actividades` VALUES("139","2025-2026","Investigación","Presenta un trabajo sobre los símbolos patrios.","112","3","52","2");
INSERT INTO `actividades` VALUES("140","2025-2026","Habilidades","Ejecuta ejercicios de equilibrio y coordinación en circuito.","113","3","52","2");
INSERT INTO `actividades` VALUES("141","2025-2026","Juegos","Participa en juegos predeportivos (mini voleibol, mini baloncesto).","113","3","52","2");
INSERT INTO `actividades` VALUES("142","2025-2026","Salud","Identifica alimentos saludables para antes y después del ejercicio.","113","3","52","2");
INSERT INTO `actividades` VALUES("143","2025-2026","Destreza","Practica lanzamientos con precisión a diferentes distancias.","113","3","52","2");
INSERT INTO `actividades` VALUES("144","2025-2026","Equipo","Participa en juegos cooperativos respetando las reglas.","113","3","52","2");
INSERT INTO `actividades` VALUES("145","2025-2026","Organización","Planifica su tiempo para cumplir con múltiples tareas.","114","3","52","2");
INSERT INTO `actividades` VALUES("146","2025-2026","Responsabilidad","Asume roles específicos en trabajos grupales.","114","3","52","2");
INSERT INTO `actividades` VALUES("147","2025-2026","Participación","Expresa sus ideas con claridad en discusiones grupales.","114","3","52","2");
INSERT INTO `actividades` VALUES("148","2025-2026","Creatividad","Propone soluciones alternativas a problemas planteados.","114","3","52","2");
INSERT INTO `actividades` VALUES("149","2025-2026","Autonomía","Realiza investigaciones sencillas con orientación mínima.","114","3","52","2");
INSERT INTO `actividades` VALUES("150","2025-2026","Disciplina","Respeta turnos de palabra y opiniones de los demás.","115","3","52","2");
INSERT INTO `actividades` VALUES("151","2025-2026","Puntualidad","Llega a tiempo con los materiales necesarios para cada clase.","115","3","52","2");
INSERT INTO `actividades` VALUES("152","2025-2026","Presentación","Mantiene sus trabajos limpios y ordenados.","115","3","52","2");
INSERT INTO `actividades` VALUES("153","2025-2026","Esfuerzo","Persiste en actividades desafiantes sin frustrarse fácilmente.","115","3","52","2");
INSERT INTO `actividades` VALUES("154","2025-2026","Colaboración","Comparte materiales y conocimientos con sus compañeros.","115","3","52","2");
INSERT INTO `actividades` VALUES("155","2025-2026","Creatividad","Construye un títere representando un personaje histórico.","116","3","52","2");
INSERT INTO `actividades` VALUES("156","2025-2026","Motricidad","Realiza un collage con diferentes texturas y materiales.","116","3","52","2");
INSERT INTO `actividades` VALUES("157","2025-2026","Técnica","Pinta un paisaje usando la técnica del puntillismo.","116","3","52","2");
INSERT INTO `actividades` VALUES("158","2025-2026","Tradición","Elabora una artesanía típica de su región.","116","3","52","2");
INSERT INTO `actividades` VALUES("159","2025-2026","Expresión","Crea un móvil con elementos representativos de Venezuela.","116","3","52","2");
INSERT INTO `actividades` VALUES("160","2025-2026","Lectura","Identifica idea principal y secundarias en textos expositivos.","111","4","50","2");
INSERT INTO `actividades` VALUES("161","2025-2026","Escritura","Redacta una carta formal con su estructura adecuada.","111","4","50","2");
INSERT INTO `actividades` VALUES("162","2025-2026","Gramática","Reconoce y clasifica sustantivos, adjetivos y verbos en oraciones.","111","4","50","2");
INSERT INTO `actividades` VALUES("163","2025-2026","Comprensión","Elabora un mapa conceptual a partir de una lectura.","111","4","50","2");
INSERT INTO `actividades` VALUES("164","2025-2026","Expresión","Prepara y presenta un noticiero escolar breve.","111","4","50","2");
INSERT INTO `actividades` VALUES("165","2025-2026","Historia","Investiga sobre la colonización en Venezuela y sus consecuencias.","112","4","50","2");
INSERT INTO `actividades` VALUES("166","2025-2026","Geografía","Elabora un mapa físico de Venezuela señalando sus principales ríos.","112","4","50","2");
INSERT INTO `actividades` VALUES("167","2025-2026","Cívica","Analiza artículos seleccionados de la LOPNA.","112","4","50","2");
INSERT INTO `actividades` VALUES("168","2025-2026","Efemérides","Realiza una biografía ilustrada de un prócer venezolano.","112","4","50","2");
INSERT INTO `actividades` VALUES("169","2025-2026","Investigación","Presenta un trabajo sobre los recursos naturales de su estado.","112","4","50","2");
INSERT INTO `actividades` VALUES("170","2025-2026","Habilidades","Ejecuta ejercicios combinados de fuerza y resistencia.","113","4","50","2");
INSERT INTO `actividades` VALUES("171","2025-2026","Juegos","Participa en juegos deportivos adaptados con reglas simplificadas.","113","4","50","2");
INSERT INTO `actividades` VALUES("172","2025-2026","Salud","Elabora un menú saludable para un día considerando actividad física.","113","4","50","2");
INSERT INTO `actividades` VALUES("173","2025-2026","Destreza","Practica fundamentos técnicos básicos de algún deporte específico.","113","4","50","2");
INSERT INTO `actividades` VALUES("174","2025-2026","Equipo","Participa en torneos internos aplicando valores deportivos.","113","4","50","2");
INSERT INTO `actividades` VALUES("175","2025-2026","Organización","Utiliza agenda escolar para registrar y planificar sus tareas.","114","4","50","2");
INSERT INTO `actividades` VALUES("176","2025-2026","Responsabilidad","Asume liderazgo en proyectos grupales asignados.","114","4","50","2");
INSERT INTO `actividades` VALUES("177","2025-2026","Participación","Modera discusiones grupales sobre temas asignados.","114","4","50","2");
INSERT INTO `actividades` VALUES("178","2025-2026","Creatividad","Diseña proyectos originales para resolver problemas comunitarios.","114","4","50","2");
INSERT INTO `actividades` VALUES("179","2025-2026","Autonomía","Realiza investigaciones usando múltiples fuentes de información.","114","4","50","2");
INSERT INTO `actividades` VALUES("180","2025-2026","Disciplina","Cumple con las normas establecidas en diferentes espacios escolares.","115","4","50","2");
INSERT INTO `actividades` VALUES("181","2025-2026","Puntualidad","Entrega trabajos con calidad en los plazos establecidos.","115","4","50","2");
INSERT INTO `actividades` VALUES("182","2025-2026","Presentación","Organiza su portafolio de evidencias de aprendizaje.","115","4","50","2");
INSERT INTO `actividades` VALUES("183","2025-2026","Esfuerzo","Supera dificultades buscando alternativas de solución.","115","4","50","2");
INSERT INTO `actividades` VALUES("184","2025-2026","Colaboración","Organiza equipos de trabajo considerando habilidades diversas.","115","4","50","2");
INSERT INTO `actividades` VALUES("185","2025-2026","Creatividad","Diseña y construye una maqueta de un ecosistema venezolano.","116","4","50","2");
INSERT INTO `actividades` VALUES("186","2025-2026","Motricidad","Elabora un libro artesanal con técnicas de encuadernación básica.","116","4","50","2");
INSERT INTO `actividades` VALUES("187","2025-2026","Técnica","Realiza una pintura usando la técnica de acuarela.","116","4","50","2");
INSERT INTO `actividades` VALUES("188","2025-2026","Tradición","Confecciona un instrumento musical típico venezolano.","116","4","50","2");
INSERT INTO `actividades` VALUES("189","2025-2026","Expresión","Crea una historieta gráfica sobre un tema histórico.","116","4","50","2");
INSERT INTO `actividades` VALUES("190","2025-2026","Lectura","Analiza textos literarios identificando género, personajes y ambiente.","111","5","54","2");
INSERT INTO `actividades` VALUES("191","2025-2026","Escritura","Redacta un cuento corto con estructura narrativa completa.","111","5","54","2");
INSERT INTO `actividades` VALUES("192","2025-2026","Gramática","Reconoce y utiliza correctamente los tiempos verbales en contextos.","111","5","54","2");
INSERT INTO `actividades` VALUES("193","2025-2026","Comprensión","Compara información de dos textos sobre un mismo tema.","111","5","54","2");
INSERT INTO `actividades` VALUES("194","2025-2026","Expresión","Prepara y presenta una exposición oral con apoyo visual.","111","5","54","2");
INSERT INTO `actividades` VALUES("195","2025-2026","Historia","Investiga sobre la independencia de Venezuela y sus protagonistas.","112","5","54","2");
INSERT INTO `actividades` VALUES("196","2025-2026","Geografía","Elabora un mapa político de América del Sur con sus capitales.","112","5","54","2");
INSERT INTO `actividades` VALUES("197","2025-2026","Cívica","Analiza la estructura básica de la Constitución Nacional.","112","5","54","2");
INSERT INTO `actividades` VALUES("198","2025-2026","Efemérides","Realiza una línea de tiempo sobre los hechos importantes del siglo XIX.","112","5","54","2");
INSERT INTO `actividades` VALUES("199","2025-2026","Investigación","Presenta un trabajo sobre los problemas ambientales de su comunidad.","112","5","54","2");
INSERT INTO `actividades` VALUES("200","2025-2026","Habilidades","Ejecuta circuitos de entrenamiento básico con estaciones variadas.","113","5","54","2");
INSERT INTO `actividades` VALUES("201","2025-2026","Juegos","Participa en torneos deportivos internos aplicando reglamentos.","113","5","54","2");
INSERT INTO `actividades` VALUES("202","2025-2026","Salud","Elabora un plan de acondicionamiento físico personalizado.","113","5","54","2");
INSERT INTO `actividades` VALUES("203","2025-2026","Destreza","Domina fundamentos técnicos de al menos un deporte específico.","113","5","54","2");
INSERT INTO `actividades` VALUES("204","2025-2026","Equipo","Organiza y participa en actividades deportivas como juez/árbitro.","113","5","54","2");
INSERT INTO `actividades` VALUES("205","2025-2026","Organización","Planifica proyectos a mediano plazo con metas y plazos.","114","5","54","2");
INSERT INTO `actividades` VALUES("206","2025-2026","Responsabilidad","Asume roles de liderazgo en actividades escolares.","114","5","54","2");
INSERT INTO `actividades` VALUES("207","2025-2026","Participación","Coordina equipos de trabajo para proyectos interdisciplinarios.","114","5","54","2");
INSERT INTO `actividades` VALUES("208","2025-2026","Creatividad","Diseña soluciones innovadoras a problemas comunitarios.","114","5","54","2");
INSERT INTO `actividades` VALUES("209","2025-2026","Autonomía","Desarrolla proyectos de investigación con metodología básica.","114","5","54","2");
INSERT INTO `actividades` VALUES("210","2025-2026","Disciplina","Ejemplifica conductas positivas para sus compañeros.","115","5","54","2");
INSERT INTO `actividades` VALUES("211","2025-2026","Puntualidad","Administra su tiempo para cumplir con múltiples responsabilidades.","115","5","54","2");
INSERT INTO `actividades` VALUES("212","2025-2026","Presentación","Mantiene un portafolio organizado con evidencias de aprendizaje.","115","5","54","2");
INSERT INTO `actividades` VALUES("213","2025-2026","Esfuerzo","Persiste en actividades desafiantes mostrando resiliencia.","115","5","54","2");
INSERT INTO `actividades` VALUES("214","2025-2026","Colaboración","Media en conflictos entre compañeros buscando soluciones.","115","5","54","2");
INSERT INTO `actividades` VALUES("215","2025-2026","Creatividad","Diseña y construye una maqueta de un sistema solar.","116","5","54","2");
INSERT INTO `actividades` VALUES("216","2025-2026","Motricidad","Elabora un tejido básico usando técnicas manuales.","116","5","54","2");
INSERT INTO `actividades` VALUES("217","2025-2026","Técnica","Realiza una escultura en arcilla sobre un tema histórico.","116","5","54","2");
INSERT INTO `actividades` VALUES("218","2025-2026","Tradición","Confecciona un traje típico venezolano en miniatura.","116","5","54","2");
INSERT INTO `actividades` VALUES("219","2025-2026","Expresión","Crea una historieta sobre valores ciudadanos.","116","5","54","2");
INSERT INTO `actividades` VALUES("220","2025-2026","Lectura","Analiza textos argumentativos identificando tesis y argumentos.","111","6","53","2");
INSERT INTO `actividades` VALUES("221","2025-2026","Escritura","Redacta un ensayo breve sobre un tema de interés social.","111","6","53","2");
INSERT INTO `actividades` VALUES("222","2025-2026","Gramática","Reconoce y utiliza correctamente nexos en textos argumentativos.","111","6","53","2");
INSERT INTO `actividades` VALUES("223","2025-2026","Comprensión","Sintetiza información de múltiples fuentes en un organizador gráfico.","111","6","53","2");
INSERT INTO `actividades` VALUES("224","2025-2026","Expresión","Prepara y defiende una posición en un debate formal.","111","6","53","2");
INSERT INTO `actividades` VALUES("225","2025-2026","Historia","Investiga sobre la democracia en Venezuela y sus características.","112","6","53","2");
INSERT INTO `actividades` VALUES("226","2025-2026","Geografía","Elabora un mapa temático sobre los recursos económicos de Venezuela.","112","6","53","2");
INSERT INTO `actividades` VALUES("227","2025-2026","Cívica","Analiza la estructura del Estado venezolano y sus poderes.","112","6","53","2");
INSERT INTO `actividades` VALUES("228","2025-2026","Efemérides","Realiza una investigación sobre los hitos del siglo XX en Venezuela.","112","6","53","2");
INSERT INTO `actividades` VALUES("229","2025-2026","Investigación","Presenta un proyecto sobre desarrollo sostenible en su comunidad.","112","6","53","2");
INSERT INTO `actividades` VALUES("230","2025-2026","Habilidades","Ejecuta circuitos de entrenamiento con énfasis en resistencia.","113","6","53","2");
INSERT INTO `actividades` VALUES("231","2025-2026","Juegos","Participa en torneos deportivos aplicando estrategias básicas.","113","6","53","2");
INSERT INTO `actividades` VALUES("232","2025-2026","Salud","Elabora un plan de vida saludable considerando alimentación y ejercicio.","113","6","53","2");
INSERT INTO `actividades` VALUES("233","2025-2026","Destreza","Domina fundamentos técnicos y tácticos de un deporte específico.","113","6","53","2");
INSERT INTO `actividades` VALUES("234","2025-2026","Equipo","Organiza eventos deportivos asumiendo roles organizativos.","113","6","53","2");
INSERT INTO `actividades` VALUES("235","2025-2026","Organización","Planifica y ejecuta proyectos a largo plazo con evaluación incluida.","114","6","53","2");
INSERT INTO `actividades` VALUES("236","2025-2026","Responsabilidad","Asume roles de liderazgo en la organización escolar.","114","6","53","2");
INSERT INTO `actividades` VALUES("237","2025-2026","Participación","Representa a su grado en actividades intergrado.","114","6","53","2");
INSERT INTO `actividades` VALUES("238","2025-2026","Creatividad","Diseña e implementa soluciones innovadoras a problemas reales.","114","6","53","2");
INSERT INTO `actividades` VALUES("239","2025-2026","Autonomía","Desarrolla proyectos de investigación con metodología adecuada.","114","6","53","2");
INSERT INTO `actividades` VALUES("240","2025-2026","Disciplina","Ejerce autodisciplina y es modelo para grados inferiores.","115","6","53","2");
INSERT INTO `actividades` VALUES("241","2025-2026","Puntualidad","Gestiona su tiempo eficientemente para múltiples responsabilidades.","115","6","53","2");
INSERT INTO `actividades` VALUES("242","2025-2026","Presentación","Mantiene un portafolio completo y bien organizado.","115","6","53","2");
INSERT INTO `actividades` VALUES("243","2025-2026","Esfuerzo","Enfrenta desafíos académicos con perseverancia y estrategias.","115","6","53","2");
INSERT INTO `actividades` VALUES("244","2025-2026","Colaboración","Lidera equipos de trabajo promoviendo la inclusión.","115","6","53","2");
INSERT INTO `actividades` VALUES("245","2025-2026","Creatividad","Diseña y construye una maqueta de un proyecto comunitario.","116","6","53","2");
INSERT INTO `actividades` VALUES("246","2025-2026","Motricidad","Elabora un proyecto de arte usando técnicas mixtas.","116","6","53","2");
INSERT INTO `actividades` VALUES("247","2025-2026","Técnica","Realiza una exposición artística con un tema social.","116","6","53","2");
INSERT INTO `actividades` VALUES("248","2025-2026","Tradición","Confecciona una pieza de arte que represente la identidad nacional.","116","6","53","2");
INSERT INTO `actividades` VALUES("249","2025-2026","Expresión","Crea un mural colectivo sobre valores para la convivencia.","116","6","53","2");
INSERT INTO `actividades` VALUES("250","2025-2026","LITERATURA","El estudiante desarrolló un cuento de 1 página sobre la historia de Venezuela","111","2","51","2");

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
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `aulas` VALUES("38","AULA 12","29","1","2025-2026","2");
INSERT INTO `aulas` VALUES("39","Aula 15","16","2","2025-2026","2");
INSERT INTO `aulas` VALUES("40","AULA 11","16","2","2025-2026","2");
INSERT INTO `aulas` VALUES("41","Aula 18","16","2","2025-2026","2");
INSERT INTO `aulas` VALUES("42","Aula 189","20","7","2025-2026","2");
INSERT INTO `aulas` VALUES("43","Aula 29","16","3","2025-2026","2");
INSERT INTO `aulas` VALUES("44","Aula 32","20","4","2025-2026","2");
INSERT INTO `aulas` VALUES("45","Aula 08","25","5","2025-2026","2");
INSERT INTO `aulas` VALUES("46","Aula 09","29","6","2025-2026","2");
INSERT INTO `aulas` VALUES("47","Aula 06","29","8","2025-2026","2");
INSERT INTO `aulas` VALUES("48","Aula 07","29","9","2025-2026","2");
INSERT INTO `aulas` VALUES("49","Aula 04","16","10","2025-2026","2");
INSERT INTO `aulas` VALUES("50","Aula 03","29","11","2025-2026","2");
INSERT INTO `aulas` VALUES("51","AULA 01","29","1","2025-2026","2");

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
) ENGINE=InnoDB AUTO_INCREMENT=780 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `calificaciones` VALUES("1","2025-2026","1","Lapso Único","47","111","60","EX","30","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("2","2025-2026","1","Lapso Único","47","111","59","EX","30","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("3","2025-2026","1","Lapso Único","47","111","58","EX","30","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("4","2025-2026","1","Lapso Único","47","111","57","EX","30","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("5","2025-2026","1","Lapso Único","47","111","56","EX","30","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("6","2025-2026","1","Lapso Único","47","111","55","EX","30","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("7","2025-2026","1","Lapso Único","47","111","54","EX","30","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("8","2025-2026","1","Lapso Único","47","111","53","EX","30","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("9","2025-2026","1","Lapso Único","47","111","52","EX","30","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("10","2025-2026","1","Lapso Único","47","111","51","EX","30","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("11","2025-2026","1","Lapso Único","47","111","51","MB","35","Caligrafía",NULL);
INSERT INTO `calificaciones` VALUES("12","2025-2026","1","Lapso Único","47","111","52","MB","35","Caligrafía",NULL);
INSERT INTO `calificaciones` VALUES("13","2025-2026","1","Lapso Único","47","111","60","MB","35","Caligrafía",NULL);
INSERT INTO `calificaciones` VALUES("14","2025-2026","1","Lapso Único","47","111","59","MB","35","Caligrafía",NULL);
INSERT INTO `calificaciones` VALUES("15","2025-2026","1","Lapso Único","47","111","58","MB","35","Caligrafía",NULL);
INSERT INTO `calificaciones` VALUES("16","2025-2026","1","Lapso Único","47","111","57","MB","35","Caligrafía",NULL);
INSERT INTO `calificaciones` VALUES("17","2025-2026","1","Lapso Único","47","111","56","MB","35","Caligrafía",NULL);
INSERT INTO `calificaciones` VALUES("18","2025-2026","1","Lapso Único","47","111","55","MB","35","Caligrafía",NULL);
INSERT INTO `calificaciones` VALUES("19","2025-2026","1","Lapso Único","47","111","54","MB","35","Caligrafía",NULL);
INSERT INTO `calificaciones` VALUES("20","2025-2026","1","Lapso Único","47","111","53","MB","35","Caligrafía",NULL);
INSERT INTO `calificaciones` VALUES("21","2025-2026","1","Lapso Único","47","111","60","B","36","Caligrafía",NULL);
INSERT INTO `calificaciones` VALUES("22","2025-2026","1","Lapso Único","47","111","59","B","36","Caligrafía",NULL);
INSERT INTO `calificaciones` VALUES("23","2025-2026","1","Lapso Único","47","111","58","B","36","Caligrafía",NULL);
INSERT INTO `calificaciones` VALUES("24","2025-2026","1","Lapso Único","47","111","57","B","36","Caligrafía",NULL);
INSERT INTO `calificaciones` VALUES("25","2025-2026","1","Lapso Único","47","111","56","B","36","Caligrafía",NULL);
INSERT INTO `calificaciones` VALUES("26","2025-2026","1","Lapso Único","47","111","55","B","36","Caligrafía",NULL);
INSERT INTO `calificaciones` VALUES("27","2025-2026","1","Lapso Único","47","111","54","B","36","Caligrafía",NULL);
INSERT INTO `calificaciones` VALUES("28","2025-2026","1","Lapso Único","47","111","53","B","36","Caligrafía",NULL);
INSERT INTO `calificaciones` VALUES("29","2025-2026","1","Lapso Único","47","111","52","B","36","Caligrafía",NULL);
INSERT INTO `calificaciones` VALUES("30","2025-2026","1","Lapso Único","47","111","51","B","36","Caligrafía",NULL);
INSERT INTO `calificaciones` VALUES("31","2025-2026","1","Lapso Único","47","111","51","MB","38","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("32","2025-2026","1","Lapso Único","47","111","52","MB","38","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("33","2025-2026","1","Lapso Único","47","111","53","MB","38","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("34","2025-2026","1","Lapso Único","47","111","54","MB","38","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("35","2025-2026","1","Lapso Único","47","111","55","MB","38","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("36","2025-2026","1","Lapso Único","47","111","56","MB","38","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("37","2025-2026","1","Lapso Único","47","111","57","MB","38","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("38","2025-2026","1","Lapso Único","47","111","58","MB","38","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("39","2025-2026","1","Lapso Único","47","111","59","MB","38","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("40","2025-2026","1","Lapso Único","47","111","60","MB","38","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("41","2025-2026","1","Lapso Único","47","111","51","EX","37","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("42","2025-2026","1","Lapso Único","47","111","52","EX","37","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("43","2025-2026","1","Lapso Único","47","111","53","EX","37","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("44","2025-2026","1","Lapso Único","47","111","60","MB","37","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("45","2025-2026","1","Lapso Único","47","111","59","MB","37","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("46","2025-2026","1","Lapso Único","47","111","58","EX","37","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("47","2025-2026","1","Lapso Único","47","111","57","EX","37","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("48","2025-2026","1","Lapso Único","47","111","56","EX","37","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("49","2025-2026","1","Lapso Único","47","111","55","EX","37","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("50","2025-2026","1","Lapso Único","47","111","54","EX","37","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("51","2025-2026","1","Lapso Único","47","111","51","EX","40","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("52","2025-2026","1","Lapso Único","47","111","52","EX","40","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("53","2025-2026","1","Lapso Único","47","111","53","EX","40","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("54","2025-2026","1","Lapso Único","47","111","54","EX","40","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("55","2025-2026","1","Lapso Único","47","111","55","EX","40","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("56","2025-2026","1","Lapso Único","47","111","56","EX","40","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("57","2025-2026","1","Lapso Único","47","111","57","EX","40","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("58","2025-2026","1","Lapso Único","47","111","58","EX","40","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("59","2025-2026","1","Lapso Único","47","111","59","EX","40","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("60","2025-2026","1","Lapso Único","47","111","60","EX","40","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("61","2025-2026","1","Lapso Único","47","112","60","EX","41","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("62","2025-2026","1","Lapso Único","47","112","59","EX","41","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("63","2025-2026","1","Lapso Único","47","112","58","EX","41","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("64","2025-2026","1","Lapso Único","47","112","57","EX","41","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("65","2025-2026","1","Lapso Único","47","112","56","EX","41","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("66","2025-2026","1","Lapso Único","47","112","55","EX","41","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("67","2025-2026","1","Lapso Único","47","112","54","EX","41","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("68","2025-2026","1","Lapso Único","47","112","53","EX","41","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("69","2025-2026","1","Lapso Único","47","112","52","EX","41","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("70","2025-2026","1","Lapso Único","47","112","51","EX","41","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("71","2025-2026","1","Lapso Único","47","112","60","MB","42","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("72","2025-2026","1","Lapso Único","47","112","59","MB","42","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("73","2025-2026","1","Lapso Único","47","112","58","MB","42","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("74","2025-2026","1","Lapso Único","47","112","57","MB","42","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("75","2025-2026","1","Lapso Único","47","112","56","MB","42","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("76","2025-2026","1","Lapso Único","47","112","55","MB","42","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("77","2025-2026","1","Lapso Único","47","112","54","MB","42","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("78","2025-2026","1","Lapso Único","47","112","53","MB","42","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("79","2025-2026","1","Lapso Único","47","112","52","MB","42","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("80","2025-2026","1","Lapso Único","47","112","51","MB","42","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("81","2025-2026","1","Lapso Único","47","112","60","MB","43","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("82","2025-2026","1","Lapso Único","47","112","59","MB","43","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("83","2025-2026","1","Lapso Único","47","112","58","MB","43","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("84","2025-2026","1","Lapso Único","47","112","57","MB","43","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("85","2025-2026","1","Lapso Único","47","112","56","MB","43","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("86","2025-2026","1","Lapso Único","47","112","55","MB","43","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("87","2025-2026","1","Lapso Único","47","112","54","MB","43","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("88","2025-2026","1","Lapso Único","47","112","53","MB","43","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("89","2025-2026","1","Lapso Único","47","112","52","MB","43","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("90","2025-2026","1","Lapso Único","47","112","51","MB","43","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("91","2025-2026","1","Lapso Único","47","112","60","B","44","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("92","2025-2026","1","Lapso Único","47","112","59","B","44","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("93","2025-2026","1","Lapso Único","47","112","58","B","44","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("94","2025-2026","1","Lapso Único","47","112","57","B","44","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("95","2025-2026","1","Lapso Único","47","112","56","B","44","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("96","2025-2026","1","Lapso Único","47","112","55","B","44","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("97","2025-2026","1","Lapso Único","47","112","54","B","44","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("98","2025-2026","1","Lapso Único","47","112","53","B","44","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("99","2025-2026","1","Lapso Único","47","112","52","B","44","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("100","2025-2026","1","Lapso Único","47","112","51","B","44","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("101","2025-2026","1","Lapso Único","47","112","60","MB","105","Efemérides",NULL);
INSERT INTO `calificaciones` VALUES("102","2025-2026","1","Lapso Único","47","112","59","MB","105","Efemérides",NULL);
INSERT INTO `calificaciones` VALUES("103","2025-2026","1","Lapso Único","47","112","58","MB","105","Efemérides",NULL);
INSERT INTO `calificaciones` VALUES("104","2025-2026","1","Lapso Único","47","112","57","MB","105","Efemérides",NULL);
INSERT INTO `calificaciones` VALUES("105","2025-2026","1","Lapso Único","47","112","56","MB","105","Efemérides",NULL);
INSERT INTO `calificaciones` VALUES("106","2025-2026","1","Lapso Único","47","112","55","MB","105","Efemérides",NULL);
INSERT INTO `calificaciones` VALUES("107","2025-2026","1","Lapso Único","47","112","54","MB","105","Efemérides",NULL);
INSERT INTO `calificaciones` VALUES("108","2025-2026","1","Lapso Único","47","112","53","MB","105","Efemérides",NULL);
INSERT INTO `calificaciones` VALUES("109","2025-2026","1","Lapso Único","47","112","52","MB","105","Efemérides",NULL);
INSERT INTO `calificaciones` VALUES("110","2025-2026","1","Lapso Único","47","112","51","MB","105","Efemérides",NULL);
INSERT INTO `calificaciones` VALUES("111","2025-2026","1","Lapso Único","47","113","60","B","110","Habilidades",NULL);
INSERT INTO `calificaciones` VALUES("112","2025-2026","1","Lapso Único","47","113","59","B","110","Habilidades",NULL);
INSERT INTO `calificaciones` VALUES("113","2025-2026","1","Lapso Único","47","113","58","B","110","Habilidades",NULL);
INSERT INTO `calificaciones` VALUES("114","2025-2026","1","Lapso Único","47","113","57","B","110","Habilidades",NULL);
INSERT INTO `calificaciones` VALUES("115","2025-2026","1","Lapso Único","47","113","56","B","110","Habilidades",NULL);
INSERT INTO `calificaciones` VALUES("116","2025-2026","1","Lapso Único","47","113","55","B","110","Habilidades",NULL);
INSERT INTO `calificaciones` VALUES("117","2025-2026","1","Lapso Único","47","113","54","B","110","Habilidades",NULL);
INSERT INTO `calificaciones` VALUES("118","2025-2026","1","Lapso Único","47","113","53","B","110","Habilidades",NULL);
INSERT INTO `calificaciones` VALUES("119","2025-2026","1","Lapso Único","47","113","52","B","110","Habilidades",NULL);
INSERT INTO `calificaciones` VALUES("120","2025-2026","1","Lapso Único","47","113","51","B","110","Habilidades",NULL);
INSERT INTO `calificaciones` VALUES("121","2025-2026","1","Lapso Único","47","113","60","B","111","Juegos",NULL);
INSERT INTO `calificaciones` VALUES("122","2025-2026","1","Lapso Único","47","113","59","B","111","Juegos",NULL);
INSERT INTO `calificaciones` VALUES("123","2025-2026","1","Lapso Único","47","113","58","B","111","Juegos",NULL);
INSERT INTO `calificaciones` VALUES("124","2025-2026","1","Lapso Único","47","113","57","B","111","Juegos",NULL);
INSERT INTO `calificaciones` VALUES("125","2025-2026","1","Lapso Único","47","113","56","B","111","Juegos",NULL);
INSERT INTO `calificaciones` VALUES("126","2025-2026","1","Lapso Único","47","113","55","B","111","Juegos",NULL);
INSERT INTO `calificaciones` VALUES("127","2025-2026","1","Lapso Único","47","113","54","B","111","Juegos",NULL);
INSERT INTO `calificaciones` VALUES("128","2025-2026","1","Lapso Único","47","113","53","B","111","Juegos",NULL);
INSERT INTO `calificaciones` VALUES("129","2025-2026","1","Lapso Único","47","113","52","B","111","Juegos",NULL);
INSERT INTO `calificaciones` VALUES("130","2025-2026","1","Lapso Único","47","113","51","B","111","Juegos",NULL);
INSERT INTO `calificaciones` VALUES("131","2025-2026","1","Lapso Único","47","113","60","B","112","Equipo",NULL);
INSERT INTO `calificaciones` VALUES("132","2025-2026","1","Lapso Único","47","113","59","B","112","Equipo",NULL);
INSERT INTO `calificaciones` VALUES("133","2025-2026","1","Lapso Único","47","113","58","B","112","Equipo",NULL);
INSERT INTO `calificaciones` VALUES("134","2025-2026","1","Lapso Único","47","113","57","B","112","Equipo",NULL);
INSERT INTO `calificaciones` VALUES("135","2025-2026","1","Lapso Único","47","113","56","B","112","Equipo",NULL);
INSERT INTO `calificaciones` VALUES("136","2025-2026","1","Lapso Único","47","113","55","B","112","Equipo",NULL);
INSERT INTO `calificaciones` VALUES("137","2025-2026","1","Lapso Único","47","113","54","B","112","Equipo",NULL);
INSERT INTO `calificaciones` VALUES("138","2025-2026","1","Lapso Único","47","113","53","B","112","Equipo",NULL);
INSERT INTO `calificaciones` VALUES("139","2025-2026","1","Lapso Único","47","113","52","B","112","Equipo",NULL);
INSERT INTO `calificaciones` VALUES("140","2025-2026","1","Lapso Único","47","113","51","B","112","Equipo",NULL);
INSERT INTO `calificaciones` VALUES("141","2025-2026","1","Lapso Único","47","113","51","MB","141","Juegos",NULL);
INSERT INTO `calificaciones` VALUES("142","2025-2026","1","Lapso Único","47","113","52","MB","141","Juegos",NULL);
INSERT INTO `calificaciones` VALUES("143","2025-2026","1","Lapso Único","47","113","53","MB","141","Juegos",NULL);
INSERT INTO `calificaciones` VALUES("144","2025-2026","1","Lapso Único","47","113","54","MB","141","Juegos",NULL);
INSERT INTO `calificaciones` VALUES("145","2025-2026","1","Lapso Único","47","113","55","MB","141","Juegos",NULL);
INSERT INTO `calificaciones` VALUES("146","2025-2026","1","Lapso Único","47","113","56","MB","141","Juegos",NULL);
INSERT INTO `calificaciones` VALUES("147","2025-2026","1","Lapso Único","47","113","57","MB","141","Juegos",NULL);
INSERT INTO `calificaciones` VALUES("148","2025-2026","1","Lapso Único","47","113","58","MB","141","Juegos",NULL);
INSERT INTO `calificaciones` VALUES("149","2025-2026","1","Lapso Único","47","113","59","MB","141","Juegos",NULL);
INSERT INTO `calificaciones` VALUES("150","2025-2026","1","Lapso Único","47","113","60","MB","141","Juegos",NULL);
INSERT INTO `calificaciones` VALUES("151","2025-2026","1","Lapso Único","47","114","51","EX","45","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("152","2025-2026","1","Lapso Único","47","114","52","EX","45","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("153","2025-2026","1","Lapso Único","47","114","53","EX","45","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("154","2025-2026","1","Lapso Único","47","114","54","EX","45","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("155","2025-2026","1","Lapso Único","47","114","55","EX","45","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("156","2025-2026","1","Lapso Único","47","114","56","EX","45","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("157","2025-2026","1","Lapso Único","47","114","57","EX","45","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("158","2025-2026","1","Lapso Único","47","114","58","EX","45","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("159","2025-2026","1","Lapso Único","47","114","59","EX","45","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("160","2025-2026","1","Lapso Único","47","114","60","EX","45","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("161","2025-2026","1","Lapso Único","47","114","60","B","46","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("162","2025-2026","1","Lapso Único","47","114","59","B","46","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("163","2025-2026","1","Lapso Único","47","114","58","B","46","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("164","2025-2026","1","Lapso Único","47","114","57","B","46","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("165","2025-2026","1","Lapso Único","47","114","56","B","46","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("166","2025-2026","1","Lapso Único","47","114","55","B","46","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("167","2025-2026","1","Lapso Único","47","114","54","B","46","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("168","2025-2026","1","Lapso Único","47","114","53","B","46","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("169","2025-2026","1","Lapso Único","47","114","52","B","46","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("170","2025-2026","1","Lapso Único","47","114","51","B","46","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("171","2025-2026","1","Lapso Único","47","114","60","MB","117","Participación",NULL);
INSERT INTO `calificaciones` VALUES("172","2025-2026","1","Lapso Único","47","114","59","MB","117","Participación",NULL);
INSERT INTO `calificaciones` VALUES("173","2025-2026","1","Lapso Único","47","114","58","MB","117","Participación",NULL);
INSERT INTO `calificaciones` VALUES("174","2025-2026","1","Lapso Único","47","114","57","MB","117","Participación",NULL);
INSERT INTO `calificaciones` VALUES("175","2025-2026","1","Lapso Único","47","114","56","MB","117","Participación",NULL);
INSERT INTO `calificaciones` VALUES("176","2025-2026","1","Lapso Único","47","114","55","MB","117","Participación",NULL);
INSERT INTO `calificaciones` VALUES("177","2025-2026","1","Lapso Único","47","114","54","MB","117","Participación",NULL);
INSERT INTO `calificaciones` VALUES("178","2025-2026","1","Lapso Único","47","114","53","MB","117","Participación",NULL);
INSERT INTO `calificaciones` VALUES("179","2025-2026","1","Lapso Único","47","114","52","MB","117","Participación",NULL);
INSERT INTO `calificaciones` VALUES("180","2025-2026","1","Lapso Único","47","114","51","MB","117","Participación",NULL);
INSERT INTO `calificaciones` VALUES("181","2025-2026","1","Lapso Único","47","116","51","EX","54","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("182","2025-2026","1","Lapso Único","47","116","52","EX","54","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("183","2025-2026","1","Lapso Único","47","116","53","EX","54","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("184","2025-2026","1","Lapso Único","47","116","59","EX","54","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("185","2025-2026","1","Lapso Único","47","116","60","EX","54","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("186","2025-2026","1","Lapso Único","47","116","58","EX","54","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("187","2025-2026","1","Lapso Único","47","116","57","EX","54","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("188","2025-2026","1","Lapso Único","47","116","56","EX","54","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("189","2025-2026","1","Lapso Único","47","116","55","EX","54","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("190","2025-2026","1","Lapso Único","47","116","54","EX","54","Contenidos",NULL);
INSERT INTO `calificaciones` VALUES("191","2025-2026","2","Lapso Único","51","111","70","EX","100","Lectura",NULL);
INSERT INTO `calificaciones` VALUES("192","2025-2026","2","Lapso Único","51","111","69","EX","100","Lectura",NULL);
INSERT INTO `calificaciones` VALUES("193","2025-2026","2","Lapso Único","51","111","68","EX","100","Lectura",NULL);
INSERT INTO `calificaciones` VALUES("194","2025-2026","2","Lapso Único","51","111","67","EX","100","Lectura",NULL);
INSERT INTO `calificaciones` VALUES("195","2025-2026","2","Lapso Único","51","111","66","EX","100","Lectura",NULL);
INSERT INTO `calificaciones` VALUES("196","2025-2026","2","Lapso Único","51","111","65","EX","100","Lectura",NULL);
INSERT INTO `calificaciones` VALUES("197","2025-2026","2","Lapso Único","51","111","64","EX","100","Lectura",NULL);
INSERT INTO `calificaciones` VALUES("198","2025-2026","2","Lapso Único","51","111","63","EX","100","Lectura",NULL);
INSERT INTO `calificaciones` VALUES("199","2025-2026","2","Lapso Único","51","111","62","EX","100","Lectura",NULL);
INSERT INTO `calificaciones` VALUES("200","2025-2026","2","Lapso Único","51","111","61","EX","100","Lectura",NULL);
INSERT INTO `calificaciones` VALUES("201","2025-2026","2","Lapso Único","51","111","70","MB","101","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("202","2025-2026","2","Lapso Único","51","111","69","MB","101","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("203","2025-2026","2","Lapso Único","51","111","68","MB","101","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("204","2025-2026","2","Lapso Único","51","111","67","MB","101","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("205","2025-2026","2","Lapso Único","51","111","66","MB","101","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("206","2025-2026","2","Lapso Único","51","111","65","MB","101","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("207","2025-2026","2","Lapso Único","51","111","64","MB","101","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("208","2025-2026","2","Lapso Único","51","111","63","MB","101","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("209","2025-2026","2","Lapso Único","51","111","62","MB","101","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("210","2025-2026","2","Lapso Único","51","111","61","MB","101","Escritura",NULL);
INSERT INTO `calificaciones` VALUES("211","2025-2026","2","Lapso Único","51","111","70","B","102","Ortografía",NULL);
INSERT INTO `calificaciones` VALUES("212","2025-2026","2","Lapso Único","51","111","69","B","102","Ortografía",NULL);
INSERT INTO `calificaciones` VALUES("213","2025-2026","2","Lapso Único","51","111","68","B","102","Ortografía",NULL);
INSERT INTO `calificaciones` VALUES("214","2025-2026","2","Lapso Único","51","111","67","B","102","Ortografía",NULL);
INSERT INTO `calificaciones` VALUES("215","2025-2026","2","Lapso Único","51","111","66","B","102","Ortografía",NULL);
INSERT INTO `calificaciones` VALUES("216","2025-2026","2","Lapso Único","51","111","65","B","102","Ortografía",NULL);
INSERT INTO `calificaciones` VALUES("217","2025-2026","2","Lapso Único","51","111","64","B","102","Ortografía",NULL);
INSERT INTO `calificaciones` VALUES("218","2025-2026","2","Lapso Único","51","111","63","B","102","Ortografía",NULL);
INSERT INTO `calificaciones` VALUES("219","2025-2026","2","Lapso Único","51","111","62","B","102","Ortografía",NULL);
INSERT INTO `calificaciones` VALUES("220","2025-2026","2","Lapso Único","51","111","61","EX","102","Ortografía",NULL);
INSERT INTO `calificaciones` VALUES("221","2025-2026","2","Lapso Único","51","112","61","EX","105","Efemérides",NULL);
INSERT INTO `calificaciones` VALUES("222","2025-2026","2","Lapso Único","51","112","62","EX","105","Efemérides",NULL);
INSERT INTO `calificaciones` VALUES("223","2025-2026","2","Lapso Único","51","112","63","EX","105","Efemérides",NULL);
INSERT INTO `calificaciones` VALUES("224","2025-2026","2","Lapso Único","51","112","64","EX","105","Efemérides",NULL);
INSERT INTO `calificaciones` VALUES("225","2025-2026","2","Lapso Único","51","112","65","EX","105","Efemérides",NULL);
INSERT INTO `calificaciones` VALUES("226","2025-2026","2","Lapso Único","51","112","66","EX","105","Efemérides",NULL);
INSERT INTO `calificaciones` VALUES("227","2025-2026","2","Lapso Único","51","112","67","EX","105","Efemérides",NULL);
INSERT INTO `calificaciones` VALUES("228","2025-2026","2","Lapso Único","51","112","68","EX","105","Efemérides",NULL);
INSERT INTO `calificaciones` VALUES("229","2025-2026","2","Lapso Único","51","112","69","EX","105","Efemérides",NULL);
INSERT INTO `calificaciones` VALUES("230","2025-2026","2","Lapso Único","51","112","70","EX","105","Efemérides",NULL);
INSERT INTO `calificaciones` VALUES("231","2025-2026","2","Lapso Único","51","112","70","MB","106","Geografía",NULL);
INSERT INTO `calificaciones` VALUES("232","2025-2026","2","Lapso Único","51","112","69","MB","106","Geografía",NULL);
INSERT INTO `calificaciones` VALUES("233","2025-2026","2","Lapso Único","51","112","68","MB","106","Geografía",NULL);
INSERT INTO `calificaciones` VALUES("234","2025-2026","2","Lapso Único","51","112","67","MB","106","Geografía",NULL);
INSERT INTO `calificaciones` VALUES("235","2025-2026","2","Lapso Único","51","112","66","MB","106","Geografía",NULL);
INSERT INTO `calificaciones` VALUES("236","2025-2026","2","Lapso Único","51","112","65","MB","106","Geografía",NULL);
INSERT INTO `calificaciones` VALUES("237","2025-2026","2","Lapso Único","51","112","64","MB","106","Geografía",NULL);
INSERT INTO `calificaciones` VALUES("238","2025-2026","2","Lapso Único","51","112","63","MB","106","Geografía",NULL);
INSERT INTO `calificaciones` VALUES("239","2025-2026","2","Lapso Único","51","112","62","MB","106","Geografía",NULL);
INSERT INTO `calificaciones` VALUES("240","2025-2026","2","Lapso Único","51","112","61","MB","106","Geografía",NULL);
INSERT INTO `calificaciones` VALUES("241","2025-2026","2","Lapso Único","51","112","61","MB","107","Historia",NULL);
INSERT INTO `calificaciones` VALUES("242","2025-2026","2","Lapso Único","51","112","70","MB","107","Historia",NULL);
INSERT INTO `calificaciones` VALUES("243","2025-2026","2","Lapso Único","51","112","69","MB","107","Historia",NULL);
INSERT INTO `calificaciones` VALUES("244","2025-2026","2","Lapso Único","51","112","68","MB","107","Historia",NULL);
INSERT INTO `calificaciones` VALUES("245","2025-2026","2","Lapso Único","51","112","67","MB","107","Historia",NULL);
INSERT INTO `calificaciones` VALUES("246","2025-2026","2","Lapso Único","51","112","66","MB","107","Historia",NULL);
INSERT INTO `calificaciones` VALUES("247","2025-2026","2","Lapso Único","51","112","65","MB","107","Historia",NULL);
INSERT INTO `calificaciones` VALUES("248","2025-2026","2","Lapso Único","51","112","64","MB","107","Historia",NULL);
INSERT INTO `calificaciones` VALUES("249","2025-2026","2","Lapso Único","51","112","63","MB","107","Historia",NULL);
INSERT INTO `calificaciones` VALUES("250","2025-2026","2","Lapso Único","51","112","62","MB","107","Historia",NULL);
INSERT INTO `calificaciones` VALUES("251","2025-2026","2","Lapso Único","51","113","70","MB","110","Habilidades",NULL);
INSERT INTO `calificaciones` VALUES("252","2025-2026","2","Lapso Único","51","113","69","MB","110","Habilidades",NULL);
INSERT INTO `calificaciones` VALUES("253","2025-2026","2","Lapso Único","51","113","68","MB","110","Habilidades",NULL);
INSERT INTO `calificaciones` VALUES("254","2025-2026","2","Lapso Único","51","113","67","MB","110","Habilidades",NULL);
INSERT INTO `calificaciones` VALUES("255","2025-2026","2","Lapso Único","51","113","66","MB","110","Habilidades",NULL);
INSERT INTO `calificaciones` VALUES("256","2025-2026","2","Lapso Único","51","113","65","MB","110","Habilidades",NULL);
INSERT INTO `calificaciones` VALUES("257","2025-2026","2","Lapso Único","51","113","64","MB","110","Habilidades",NULL);
INSERT INTO `calificaciones` VALUES("258","2025-2026","2","Lapso Único","51","113","63","MB","110","Habilidades",NULL);
INSERT INTO `calificaciones` VALUES("259","2025-2026","2","Lapso Único","51","113","62","MB","110","Habilidades",NULL);
INSERT INTO `calificaciones` VALUES("260","2025-2026","2","Lapso Único","51","113","61","MB","110","Habilidades",NULL);
INSERT INTO `calificaciones` VALUES("261","2025-2026","2","Lapso Único","51","113","70","MB","113","Salud",NULL);
INSERT INTO `calificaciones` VALUES("262","2025-2026","2","Lapso Único","51","113","69","MB","113","Salud",NULL);
INSERT INTO `calificaciones` VALUES("263","2025-2026","2","Lapso Único","51","113","68","MB","113","Salud",NULL);
INSERT INTO `calificaciones` VALUES("264","2025-2026","2","Lapso Único","51","113","67","MB","113","Salud",NULL);
INSERT INTO `calificaciones` VALUES("265","2025-2026","2","Lapso Único","51","113","66","MB","113","Salud",NULL);
INSERT INTO `calificaciones` VALUES("266","2025-2026","2","Lapso Único","51","113","65","MB","113","Salud",NULL);
INSERT INTO `calificaciones` VALUES("267","2025-2026","2","Lapso Único","51","113","64","MB","113","Salud",NULL);
INSERT INTO `calificaciones` VALUES("268","2025-2026","2","Lapso Único","51","113","63","MB","113","Salud",NULL);
INSERT INTO `calificaciones` VALUES("269","2025-2026","2","Lapso Único","51","113","62","MB","113","Salud",NULL);
INSERT INTO `calificaciones` VALUES("270","2025-2026","2","Lapso Único","51","113","61","MB","113","Salud",NULL);
INSERT INTO `calificaciones` VALUES("271","2025-2026","2","Lapso Único","51","114","70","B","115","Organización",NULL);
INSERT INTO `calificaciones` VALUES("272","2025-2026","2","Lapso Único","51","114","69","B","115","Organización",NULL);
INSERT INTO `calificaciones` VALUES("273","2025-2026","2","Lapso Único","51","114","68","B","115","Organización",NULL);
INSERT INTO `calificaciones` VALUES("274","2025-2026","2","Lapso Único","51","114","67","B","115","Organización",NULL);
INSERT INTO `calificaciones` VALUES("275","2025-2026","2","Lapso Único","51","114","66","B","115","Organización",NULL);
INSERT INTO `calificaciones` VALUES("276","2025-2026","2","Lapso Único","51","114","65","B","115","Organización",NULL);
INSERT INTO `calificaciones` VALUES("277","2025-2026","2","Lapso Único","51","114","64","B","115","Organización",NULL);
INSERT INTO `calificaciones` VALUES("278","2025-2026","2","Lapso Único","51","114","63","B","115","Organización",NULL);
INSERT INTO `calificaciones` VALUES("279","2025-2026","2","Lapso Único","51","114","62","B","115","Organización",NULL);
INSERT INTO `calificaciones` VALUES("280","2025-2026","2","Lapso Único","51","114","61","B","115","Organización",NULL);
INSERT INTO `calificaciones` VALUES("281","2025-2026","2","Lapso Único","51","114","70","MB","116","Responsabilidad",NULL);
INSERT INTO `calificaciones` VALUES("282","2025-2026","2","Lapso Único","51","114","69","MB","116","Responsabilidad",NULL);
INSERT INTO `calificaciones` VALUES("283","2025-2026","2","Lapso Único","51","114","68","MB","116","Responsabilidad",NULL);
INSERT INTO `calificaciones` VALUES("284","2025-2026","2","Lapso Único","51","114","67","MB","116","Responsabilidad",NULL);
INSERT INTO `calificaciones` VALUES("285","2025-2026","2","Lapso Único","51","114","66","MB","116","Responsabilidad",NULL);
INSERT INTO `calificaciones` VALUES("286","2025-2026","2","Lapso Único","51","114","65","MB","116","Responsabilidad",NULL);
INSERT INTO `calificaciones` VALUES("287","2025-2026","2","Lapso Único","51","114","64","MB","116","Responsabilidad",NULL);
INSERT INTO `calificaciones` VALUES("288","2025-2026","2","Lapso Único","51","114","63","MB","116","Responsabilidad",NULL);
INSERT INTO `calificaciones` VALUES("289","2025-2026","2","Lapso Único","51","114","62","MB","116","Responsabilidad",NULL);
INSERT INTO `calificaciones` VALUES("290","2025-2026","2","Lapso Único","51","114","61","MB","116","Responsabilidad",NULL);
INSERT INTO `calificaciones` VALUES("291","2025-2026","2","Lapso Único","51","114","70","B","117","Participación",NULL);
INSERT INTO `calificaciones` VALUES("292","2025-2026","2","Lapso Único","51","114","69","B","117","Participación",NULL);
INSERT INTO `calificaciones` VALUES("293","2025-2026","2","Lapso Único","51","114","68","B","117","Participación",NULL);
INSERT INTO `calificaciones` VALUES("294","2025-2026","2","Lapso Único","51","114","67","B","117","Participación",NULL);
INSERT INTO `calificaciones` VALUES("295","2025-2026","2","Lapso Único","51","114","66","B","117","Participación",NULL);
INSERT INTO `calificaciones` VALUES("296","2025-2026","2","Lapso Único","51","114","65","B","117","Participación",NULL);
INSERT INTO `calificaciones` VALUES("297","2025-2026","2","Lapso Único","51","114","64","B","117","Participación",NULL);
INSERT INTO `calificaciones` VALUES("298","2025-2026","2","Lapso Único","51","114","63","B","117","Participación",NULL);
INSERT INTO `calificaciones` VALUES("299","2025-2026","2","Lapso Único","51","114","62","B","117","Participación",NULL);
INSERT INTO `calificaciones` VALUES("300","2025-2026","2","Lapso Único","51","114","61","B","117","Participación",NULL);
INSERT INTO `calificaciones` VALUES("301","2025-2026","2","Lapso Único","51","115","70","EX","120","Disciplina",NULL);
INSERT INTO `calificaciones` VALUES("302","2025-2026","2","Lapso Único","51","115","69","EX","120","Disciplina",NULL);
INSERT INTO `calificaciones` VALUES("303","2025-2026","2","Lapso Único","51","115","68","EX","120","Disciplina",NULL);
INSERT INTO `calificaciones` VALUES("304","2025-2026","2","Lapso Único","51","115","67","EX","120","Disciplina",NULL);
INSERT INTO `calificaciones` VALUES("305","2025-2026","2","Lapso Único","51","115","66","EX","120","Disciplina",NULL);
INSERT INTO `calificaciones` VALUES("306","2025-2026","2","Lapso Único","51","115","65","EX","120","Disciplina",NULL);
INSERT INTO `calificaciones` VALUES("307","2025-2026","2","Lapso Único","51","115","64","EX","120","Disciplina",NULL);
INSERT INTO `calificaciones` VALUES("308","2025-2026","2","Lapso Único","51","115","63","EX","120","Disciplina",NULL);
INSERT INTO `calificaciones` VALUES("309","2025-2026","2","Lapso Único","51","115","62","EX","120","Disciplina",NULL);
INSERT INTO `calificaciones` VALUES("310","2025-2026","2","Lapso Único","51","115","61","EX","120","Disciplina",NULL);
INSERT INTO `calificaciones` VALUES("311","2025-2026","2","Lapso Único","51","115","70","EX","122","Presentación",NULL);
INSERT INTO `calificaciones` VALUES("312","2025-2026","2","Lapso Único","51","115","69","EX","122","Presentación",NULL);
INSERT INTO `calificaciones` VALUES("313","2025-2026","2","Lapso Único","51","115","68","EX","122","Presentación",NULL);
INSERT INTO `calificaciones` VALUES("314","2025-2026","2","Lapso Único","51","115","67","EX","122","Presentación",NULL);
INSERT INTO `calificaciones` VALUES("315","2025-2026","2","Lapso Único","51","115","66","EX","122","Presentación",NULL);
INSERT INTO `calificaciones` VALUES("316","2025-2026","2","Lapso Único","51","115","65","EX","122","Presentación",NULL);
INSERT INTO `calificaciones` VALUES("317","2025-2026","2","Lapso Único","51","115","64","EX","122","Presentación",NULL);
INSERT INTO `calificaciones` VALUES("318","2025-2026","2","Lapso Único","51","115","63","EX","122","Presentación",NULL);
INSERT INTO `calificaciones` VALUES("319","2025-2026","2","Lapso Único","51","115","62","EX","122","Presentación",NULL);
INSERT INTO `calificaciones` VALUES("320","2025-2026","2","Lapso Único","51","115","61","EX","122","Presentación",NULL);
INSERT INTO `calificaciones` VALUES("321","2025-2026","2","Lapso Único","51","115","70","B","124","Colaboración",NULL);
INSERT INTO `calificaciones` VALUES("322","2025-2026","2","Lapso Único","51","115","69","B","124","Colaboración",NULL);
INSERT INTO `calificaciones` VALUES("323","2025-2026","2","Lapso Único","51","115","68","B","124","Colaboración",NULL);
INSERT INTO `calificaciones` VALUES("324","2025-2026","2","Lapso Único","51","115","67","B","124","Colaboración",NULL);
INSERT INTO `calificaciones` VALUES("325","2025-2026","2","Lapso Único","51","115","66","B","124","Colaboración",NULL);
INSERT INTO `calificaciones` VALUES("326","2025-2026","2","Lapso Único","51","115","65","B","124","Colaboración",NULL);
INSERT INTO `calificaciones` VALUES("327","2025-2026","2","Lapso Único","51","115","64","B","124","Colaboración",NULL);
INSERT INTO `calificaciones` VALUES("328","2025-2026","2","Lapso Único","51","115","63","B","124","Colaboración",NULL);
INSERT INTO `calificaciones` VALUES("329","2025-2026","2","Lapso Único","51","115","62","B","124","Colaboración",NULL);
INSERT INTO `calificaciones` VALUES("330","2025-2026","2","Lapso Único","51","115","61","B","124","Colaboración",NULL);
INSERT INTO `calificaciones` VALUES("331","2025-2026","2","Lapso Único","51","116","70","MB","125","Creatividad",NULL);
INSERT INTO `calificaciones` VALUES("332","2025-2026","2","Lapso Único","51","116","69","MB","125","Creatividad",NULL);
INSERT INTO `calificaciones` VALUES("333","2025-2026","2","Lapso Único","51","116","68","MB","125","Creatividad",NULL);
INSERT INTO `calificaciones` VALUES("334","2025-2026","2","Lapso Único","51","116","70","B","126","Motricidad",NULL);
INSERT INTO `calificaciones` VALUES("335","2025-2026","2","Lapso Único","51","116","69","B","126","Motricidad",NULL);
INSERT INTO `calificaciones` VALUES("336","2025-2026","2","Lapso Único","51","116","68","B","126","Motricidad",NULL);
INSERT INTO `calificaciones` VALUES("337","2025-2026","2","Lapso Único","51","116","67","B","126","Motricidad",NULL);
INSERT INTO `calificaciones` VALUES("338","2025-2026","2","Lapso Único","51","116","66","B","126","Motricidad",NULL);
INSERT INTO `calificaciones` VALUES("339","2025-2026","2","Lapso Único","51","116","65","B","126","Motricidad",NULL);
INSERT INTO `calificaciones` VALUES("340","2025-2026","2","Lapso Único","51","116","64","B","126","Motricidad",NULL);
INSERT INTO `calificaciones` VALUES("341","2025-2026","2","Lapso Único","51","116","63","B","126","Motricidad",NULL);
INSERT INTO `calificaciones` VALUES("342","2025-2026","2","Lapso Único","51","116","62","B","126","Motricidad",NULL);
INSERT INTO `calificaciones` VALUES("343","2025-2026","2","Lapso Único","51","116","61","B","126","Motricidad",NULL);
INSERT INTO `calificaciones` VALUES("344","2025-2026","7","1er Lapso","43","99","1","15",NULL,NULL,"15.00");
INSERT INTO `calificaciones` VALUES("345","2025-2026","7","1er Lapso","43","99","10","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("346","2025-2026","7","1er Lapso","43","99","9","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("347","2025-2026","7","1er Lapso","43","99","8","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("348","2025-2026","7","1er Lapso","43","99","7","15",NULL,NULL,"15.00");
INSERT INTO `calificaciones` VALUES("349","2025-2026","7","1er Lapso","43","99","6","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("350","2025-2026","7","1er Lapso","43","99","5","15",NULL,NULL,"15.00");
INSERT INTO `calificaciones` VALUES("351","2025-2026","7","1er Lapso","43","99","4","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("352","2025-2026","7","1er Lapso","43","99","3","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("353","2025-2026","7","1er Lapso","43","99","2","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("354","2025-2026","7","2do Lapso","43","99","1","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("355","2025-2026","7","2do Lapso","43","99","10","19",NULL,NULL,"19.00");
INSERT INTO `calificaciones` VALUES("356","2025-2026","7","2do Lapso","43","99","9","18",NULL,NULL,"18.00");
INSERT INTO `calificaciones` VALUES("357","2025-2026","7","2do Lapso","43","99","8","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("358","2025-2026","7","2do Lapso","43","99","7","15",NULL,NULL,"15.00");
INSERT INTO `calificaciones` VALUES("359","2025-2026","7","2do Lapso","43","99","6","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("360","2025-2026","7","2do Lapso","43","99","5","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("361","2025-2026","7","2do Lapso","43","99","4","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("362","2025-2026","7","2do Lapso","43","99","3","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("363","2025-2026","7","2do Lapso","43","99","2","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("364","2025-2026","7","3er Lapso","43","99","1","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("365","2025-2026","7","3er Lapso","43","99","2","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("366","2025-2026","7","3er Lapso","43","99","3","15",NULL,NULL,"15.00");
INSERT INTO `calificaciones` VALUES("367","2025-2026","7","3er Lapso","43","99","4","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("368","2025-2026","7","3er Lapso","43","99","5","18",NULL,NULL,"18.00");
INSERT INTO `calificaciones` VALUES("369","2025-2026","7","3er Lapso","43","99","6","19",NULL,NULL,"19.00");
INSERT INTO `calificaciones` VALUES("370","2025-2026","7","3er Lapso","43","99","7","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("371","2025-2026","7","3er Lapso","43","99","8","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("372","2025-2026","7","3er Lapso","43","99","9","18",NULL,NULL,"18.00");
INSERT INTO `calificaciones` VALUES("373","2025-2026","7","3er Lapso","43","99","10","19",NULL,NULL,"19.00");
INSERT INTO `calificaciones` VALUES("374","2025-2026","7","1er Lapso","41","106","1","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("375","2025-2026","7","1er Lapso","41","106","2","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("376","2025-2026","7","1er Lapso","41","106","3","18",NULL,NULL,"18.00");
INSERT INTO `calificaciones` VALUES("377","2025-2026","7","1er Lapso","41","106","4","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("378","2025-2026","7","1er Lapso","41","106","5","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("379","2025-2026","7","1er Lapso","41","106","7","19",NULL,NULL,"19.00");
INSERT INTO `calificaciones` VALUES("380","2025-2026","7","1er Lapso","41","106","6","18",NULL,NULL,"18.00");
INSERT INTO `calificaciones` VALUES("381","2025-2026","7","1er Lapso","41","106","8","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("382","2025-2026","7","1er Lapso","41","106","9","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("383","2025-2026","7","1er Lapso","41","106","10","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("384","2025-2026","7","2do Lapso","41","106","1","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("385","2025-2026","7","2do Lapso","41","106","2","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("386","2025-2026","7","2do Lapso","41","106","3","15",NULL,NULL,"15.00");
INSERT INTO `calificaciones` VALUES("387","2025-2026","7","2do Lapso","41","106","4","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("388","2025-2026","7","2do Lapso","41","106","6","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("389","2025-2026","7","2do Lapso","41","106","5","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("390","2025-2026","7","2do Lapso","41","106","7","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("391","2025-2026","7","2do Lapso","41","106","8","15",NULL,NULL,"15.00");
INSERT INTO `calificaciones` VALUES("392","2025-2026","7","2do Lapso","41","106","9","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("393","2025-2026","7","2do Lapso","41","106","10","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("394","2025-2026","7","3er Lapso","41","106","10","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("395","2025-2026","7","3er Lapso","41","106","9","17",NULL,NULL,"17.00");
INSERT INTO `calificaciones` VALUES("396","2025-2026","7","3er Lapso","41","106","8","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("397","2025-2026","7","3er Lapso","41","106","7","19",NULL,NULL,"19.00");
INSERT INTO `calificaciones` VALUES("398","2025-2026","7","3er Lapso","41","106","6","18",NULL,NULL,"18.00");
INSERT INTO `calificaciones` VALUES("399","2025-2026","7","3er Lapso","41","106","5","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("400","2025-2026","7","3er Lapso","41","106","4","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("401","2025-2026","7","3er Lapso","41","106","3","15",NULL,NULL,"15.00");
INSERT INTO `calificaciones` VALUES("402","2025-2026","7","3er Lapso","41","106","2","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("403","2025-2026","7","3er Lapso","41","106","1","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("404","2025-2026","7","1er Lapso","39","104","1","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("405","2025-2026","7","1er Lapso","39","104","2","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("406","2025-2026","7","1er Lapso","39","104","3","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("407","2025-2026","7","1er Lapso","39","104","4","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("408","2025-2026","7","1er Lapso","39","104","5","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("409","2025-2026","7","1er Lapso","39","104","6","18",NULL,NULL,"18.00");
INSERT INTO `calificaciones` VALUES("410","2025-2026","7","1er Lapso","39","104","7","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("411","2025-2026","7","1er Lapso","39","104","8","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("412","2025-2026","7","1er Lapso","39","104","9","18",NULL,NULL,"18.00");
INSERT INTO `calificaciones` VALUES("413","2025-2026","7","1er Lapso","39","104","10","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("414","2025-2026","7","2do Lapso","39","104","1","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("415","2025-2026","7","2do Lapso","39","104","2","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("416","2025-2026","7","2do Lapso","39","104","3","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("417","2025-2026","7","2do Lapso","39","104","4","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("418","2025-2026","7","2do Lapso","39","104","5","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("419","2025-2026","7","2do Lapso","39","104","6","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("420","2025-2026","7","2do Lapso","39","104","7","18",NULL,NULL,"18.00");
INSERT INTO `calificaciones` VALUES("421","2025-2026","7","2do Lapso","39","104","8","19",NULL,NULL,"19.00");
INSERT INTO `calificaciones` VALUES("422","2025-2026","7","2do Lapso","39","104","9","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("423","2025-2026","7","2do Lapso","39","104","10","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("424","2025-2026","7","3er Lapso","39","104","1","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("425","2025-2026","7","3er Lapso","39","104","2","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("426","2025-2026","7","3er Lapso","39","104","3","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("427","2025-2026","7","3er Lapso","39","104","4","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("428","2025-2026","7","3er Lapso","39","104","5","15",NULL,NULL,"15.00");
INSERT INTO `calificaciones` VALUES("429","2025-2026","7","3er Lapso","39","104","6","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("430","2025-2026","7","3er Lapso","39","104","8","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("431","2025-2026","7","3er Lapso","39","104","7","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("432","2025-2026","7","3er Lapso","39","104","9","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("433","2025-2026","7","3er Lapso","39","104","10","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("434","2025-2026","7","1er Lapso","36","107","1","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("435","2025-2026","7","1er Lapso","36","107","2","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("436","2025-2026","7","1er Lapso","36","107","3","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("437","2025-2026","7","1er Lapso","36","107","5","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("438","2025-2026","7","1er Lapso","36","107","4","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("439","2025-2026","7","1er Lapso","36","107","6","18",NULL,NULL,"18.00");
INSERT INTO `calificaciones` VALUES("440","2025-2026","7","1er Lapso","36","107","7","19",NULL,NULL,"19.00");
INSERT INTO `calificaciones` VALUES("441","2025-2026","7","1er Lapso","36","107","8","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("442","2025-2026","7","1er Lapso","36","107","9","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("443","2025-2026","7","1er Lapso","36","107","10","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("444","2025-2026","7","2do Lapso","36","107","1","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("445","2025-2026","7","2do Lapso","36","107","2","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("446","2025-2026","7","2do Lapso","36","107","3","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("447","2025-2026","7","2do Lapso","36","107","4","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("448","2025-2026","7","2do Lapso","36","107","5","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("449","2025-2026","7","2do Lapso","36","107","6","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("450","2025-2026","7","2do Lapso","36","107","7","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("451","2025-2026","7","2do Lapso","36","107","8","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("452","2025-2026","7","2do Lapso","36","107","9","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("453","2025-2026","7","2do Lapso","36","107","10","18",NULL,NULL,"18.00");
INSERT INTO `calificaciones` VALUES("454","2025-2026","7","3er Lapso","36","107","10","11",NULL,NULL,"11.00");
INSERT INTO `calificaciones` VALUES("455","2025-2026","7","3er Lapso","36","107","9","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("456","2025-2026","7","3er Lapso","36","107","8","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("457","2025-2026","7","3er Lapso","36","107","7","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("458","2025-2026","7","3er Lapso","36","107","6","18",NULL,NULL,"18.00");
INSERT INTO `calificaciones` VALUES("459","2025-2026","7","3er Lapso","36","107","4","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("460","2025-2026","7","3er Lapso","36","107","3","11",NULL,NULL,"11.00");
INSERT INTO `calificaciones` VALUES("461","2025-2026","7","3er Lapso","36","107","2","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("462","2025-2026","7","3er Lapso","36","107","1","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("463","2025-2026","7","1er Lapso","38","108","10","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("464","2025-2026","7","1er Lapso","38","108","9","15",NULL,NULL,"15.00");
INSERT INTO `calificaciones` VALUES("465","2025-2026","7","1er Lapso","38","108","8","15",NULL,NULL,"15.00");
INSERT INTO `calificaciones` VALUES("466","2025-2026","7","1er Lapso","38","108","7","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("467","2025-2026","7","1er Lapso","38","108","6","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("468","2025-2026","7","1er Lapso","38","108","5","15",NULL,NULL,"15.00");
INSERT INTO `calificaciones` VALUES("469","2025-2026","7","1er Lapso","38","108","4","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("470","2025-2026","7","1er Lapso","38","108","3","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("471","2025-2026","7","1er Lapso","38","108","2","15",NULL,NULL,"15.00");
INSERT INTO `calificaciones` VALUES("472","2025-2026","7","1er Lapso","38","108","1","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("473","2025-2026","7","2do Lapso","38","108","10","10",NULL,NULL,"10.00");
INSERT INTO `calificaciones` VALUES("474","2025-2026","7","2do Lapso","38","108","9","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("475","2025-2026","7","2do Lapso","38","108","8","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("476","2025-2026","7","2do Lapso","38","108","7","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("477","2025-2026","7","2do Lapso","38","108","6","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("478","2025-2026","7","2do Lapso","38","108","5","18",NULL,NULL,"18.00");
INSERT INTO `calificaciones` VALUES("479","2025-2026","7","2do Lapso","38","108","4","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("480","2025-2026","7","2do Lapso","38","108","3","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("481","2025-2026","7","2do Lapso","38","108","1","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("482","2025-2026","7","2do Lapso","38","108","2","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("483","2025-2026","7","1er Lapso","40","102","10","4",NULL,NULL,"4.00");
INSERT INTO `calificaciones` VALUES("484","2025-2026","7","1er Lapso","40","102","9","11",NULL,NULL,"11.00");
INSERT INTO `calificaciones` VALUES("485","2025-2026","7","1er Lapso","40","102","8","10",NULL,NULL,"10.00");
INSERT INTO `calificaciones` VALUES("486","2025-2026","7","1er Lapso","40","102","7","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("487","2025-2026","7","1er Lapso","40","102","6","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("488","2025-2026","7","1er Lapso","40","102","5","15",NULL,NULL,"15.00");
INSERT INTO `calificaciones` VALUES("489","2025-2026","7","1er Lapso","40","102","4","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("490","2025-2026","7","1er Lapso","40","102","3","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("491","2025-2026","7","1er Lapso","40","102","2","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("492","2025-2026","7","1er Lapso","40","102","1","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("493","2025-2026","7","2do Lapso","40","102","1","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("494","2025-2026","7","2do Lapso","40","102","3","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("495","2025-2026","7","2do Lapso","40","102","2","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("496","2025-2026","7","2do Lapso","40","102","4","18",NULL,NULL,"18.00");
INSERT INTO `calificaciones` VALUES("497","2025-2026","7","2do Lapso","40","102","5","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("498","2025-2026","7","2do Lapso","40","102","6","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("499","2025-2026","7","2do Lapso","40","102","7","18",NULL,NULL,"18.00");
INSERT INTO `calificaciones` VALUES("500","2025-2026","7","2do Lapso","40","102","8","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("501","2025-2026","7","2do Lapso","40","102","9","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("502","2025-2026","7","2do Lapso","40","102","10","10",NULL,NULL,"10.00");
INSERT INTO `calificaciones` VALUES("503","2025-2026","7","3er Lapso","40","102","1","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("504","2025-2026","7","3er Lapso","40","102","2","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("505","2025-2026","7","3er Lapso","40","102","4","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("506","2025-2026","7","3er Lapso","40","102","5","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("507","2025-2026","7","3er Lapso","40","102","6","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("508","2025-2026","7","3er Lapso","40","102","7","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("509","2025-2026","7","3er Lapso","40","102","8","18",NULL,NULL,"18.00");
INSERT INTO `calificaciones` VALUES("510","2025-2026","7","3er Lapso","40","102","9","19",NULL,NULL,"19.00");
INSERT INTO `calificaciones` VALUES("511","2025-2026","7","3er Lapso","40","102","10","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("512","2025-2026","7","1er Lapso","37","105","1","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("513","2025-2026","7","1er Lapso","37","105","2","0",NULL,NULL,"0.00");
INSERT INTO `calificaciones` VALUES("514","2025-2026","7","1er Lapso","37","105","3","0",NULL,NULL,"0.00");
INSERT INTO `calificaciones` VALUES("515","2025-2026","7","1er Lapso","37","105","4","0",NULL,NULL,"0.00");
INSERT INTO `calificaciones` VALUES("516","2025-2026","7","1er Lapso","37","105","5","0",NULL,NULL,"0.00");
INSERT INTO `calificaciones` VALUES("517","2025-2026","7","1er Lapso","37","105","6","0",NULL,NULL,"0.00");
INSERT INTO `calificaciones` VALUES("518","2025-2026","7","1er Lapso","37","105","7","0",NULL,NULL,"0.00");
INSERT INTO `calificaciones` VALUES("519","2025-2026","7","1er Lapso","37","105","8","0",NULL,NULL,"0.00");
INSERT INTO `calificaciones` VALUES("520","2025-2026","7","1er Lapso","37","105","9","0",NULL,NULL,"0.00");
INSERT INTO `calificaciones` VALUES("521","2025-2026","7","1er Lapso","37","105","10","0",NULL,NULL,"0.00");
INSERT INTO `calificaciones` VALUES("522","2025-2026","7","2do Lapso","37","105","1","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("523","2025-2026","7","2do Lapso","37","105","2","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("524","2025-2026","7","2do Lapso","37","105","3","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("525","2025-2026","7","2do Lapso","37","105","4","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("526","2025-2026","7","2do Lapso","37","105","5","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("527","2025-2026","7","2do Lapso","37","105","6","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("528","2025-2026","7","2do Lapso","37","105","7","18",NULL,NULL,"18.00");
INSERT INTO `calificaciones` VALUES("529","2025-2026","7","2do Lapso","37","105","8","11",NULL,NULL,"11.00");
INSERT INTO `calificaciones` VALUES("530","2025-2026","7","2do Lapso","37","105","9","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("531","2025-2026","7","2do Lapso","37","105","10","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("532","2025-2026","7","3er Lapso","37","105","1","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("533","2025-2026","7","3er Lapso","37","105","2","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("534","2025-2026","7","3er Lapso","37","105","3","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("535","2025-2026","7","3er Lapso","37","105","4","15",NULL,NULL,"15.00");
INSERT INTO `calificaciones` VALUES("536","2025-2026","7","3er Lapso","37","105","5","18",NULL,NULL,"18.00");
INSERT INTO `calificaciones` VALUES("537","2025-2026","7","3er Lapso","37","105","7","17",NULL,NULL,"17.00");
INSERT INTO `calificaciones` VALUES("538","2025-2026","7","3er Lapso","37","105","8","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("539","2025-2026","7","3er Lapso","37","105","9","17",NULL,NULL,"17.00");
INSERT INTO `calificaciones` VALUES("540","2025-2026","7","3er Lapso","37","105","10","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("541","2025-2026","7","1er Lapso","42","103","10","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("542","2025-2026","7","1er Lapso","42","103","9","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("543","2025-2026","7","1er Lapso","42","103","8","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("544","2025-2026","7","1er Lapso","42","103","7","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("545","2025-2026","7","1er Lapso","42","103","6","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("546","2025-2026","7","1er Lapso","42","103","5","18",NULL,NULL,"18.00");
INSERT INTO `calificaciones` VALUES("547","2025-2026","7","1er Lapso","42","103","4","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("548","2025-2026","7","1er Lapso","42","103","3","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("549","2025-2026","7","1er Lapso","42","103","2","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("550","2025-2026","7","1er Lapso","42","103","1","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("551","2025-2026","7","2do Lapso","42","103","1","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("552","2025-2026","7","2do Lapso","42","103","2","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("553","2025-2026","7","2do Lapso","42","103","3","4",NULL,NULL,"4.00");
INSERT INTO `calificaciones` VALUES("554","2025-2026","7","2do Lapso","42","103","4","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("555","2025-2026","7","2do Lapso","42","103","5","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("556","2025-2026","7","2do Lapso","42","103","6","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("557","2025-2026","7","2do Lapso","42","103","7","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("558","2025-2026","7","2do Lapso","42","103","8","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("559","2025-2026","7","2do Lapso","42","103","9","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("560","2025-2026","7","2do Lapso","42","103","10","11",NULL,NULL,"11.00");
INSERT INTO `calificaciones` VALUES("561","2025-2026","7","3er Lapso","42","103","1","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("562","2025-2026","7","3er Lapso","42","103","2","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("563","2025-2026","7","3er Lapso","42","103","3","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("564","2025-2026","7","3er Lapso","42","103","4","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("565","2025-2026","7","3er Lapso","42","103","5","15",NULL,NULL,"15.00");
INSERT INTO `calificaciones` VALUES("566","2025-2026","7","3er Lapso","42","103","6","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("567","2025-2026","7","3er Lapso","42","103","7","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("568","2025-2026","7","3er Lapso","42","103","8","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("569","2025-2026","7","3er Lapso","42","103","9","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("570","2025-2026","7","3er Lapso","42","103","10","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("571","2025-2026","8","1er Lapso","43","99","11","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("572","2025-2026","8","1er Lapso","43","99","12","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("573","2025-2026","8","1er Lapso","43","99","13","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("574","2025-2026","8","1er Lapso","43","99","14","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("575","2025-2026","8","1er Lapso","43","99","15","15",NULL,NULL,"15.00");
INSERT INTO `calificaciones` VALUES("576","2025-2026","8","1er Lapso","43","99","16","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("577","2025-2026","8","1er Lapso","43","99","18","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("578","2025-2026","8","1er Lapso","43","99","19","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("579","2025-2026","8","1er Lapso","43","99","20","18",NULL,NULL,"18.00");
INSERT INTO `calificaciones` VALUES("580","2025-2026","8","2do Lapso","43","99","11","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("581","2025-2026","8","2do Lapso","43","99","12","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("582","2025-2026","8","2do Lapso","43","99","13","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("583","2025-2026","8","2do Lapso","43","99","14","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("584","2025-2026","8","2do Lapso","43","99","15","5",NULL,NULL,"5.00");
INSERT INTO `calificaciones` VALUES("585","2025-2026","8","2do Lapso","43","99","16","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("586","2025-2026","8","2do Lapso","43","99","17","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("587","2025-2026","8","2do Lapso","43","99","18","18",NULL,NULL,"18.00");
INSERT INTO `calificaciones` VALUES("588","2025-2026","8","2do Lapso","43","99","19","19",NULL,NULL,"19.00");
INSERT INTO `calificaciones` VALUES("589","2025-2026","8","2do Lapso","43","99","20","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("590","2025-2026","8","3er Lapso","43","99","11","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("591","2025-2026","8","3er Lapso","43","99","12","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("592","2025-2026","8","3er Lapso","43","99","13","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("593","2025-2026","8","3er Lapso","43","99","14","18",NULL,NULL,"18.00");
INSERT INTO `calificaciones` VALUES("594","2025-2026","8","3er Lapso","43","99","15","19",NULL,NULL,"19.00");
INSERT INTO `calificaciones` VALUES("595","2025-2026","8","3er Lapso","43","99","16","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("596","2025-2026","8","3er Lapso","43","99","17","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("597","2025-2026","8","3er Lapso","43","99","18","15",NULL,NULL,"15.00");
INSERT INTO `calificaciones` VALUES("598","2025-2026","8","3er Lapso","43","99","19","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("599","2025-2026","8","3er Lapso","43","99","20","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("600","2025-2026","8","3er Lapso","41","106","11","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("601","2025-2026","8","1er Lapso","41","106","11","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("602","2025-2026","8","1er Lapso","41","106","12","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("603","2025-2026","8","1er Lapso","41","106","13","15",NULL,NULL,"15.00");
INSERT INTO `calificaciones` VALUES("604","2025-2026","8","1er Lapso","41","106","14","15",NULL,NULL,"15.00");
INSERT INTO `calificaciones` VALUES("605","2025-2026","8","1er Lapso","41","106","15","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("606","2025-2026","8","1er Lapso","41","106","16","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("607","2025-2026","8","1er Lapso","41","106","17","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("608","2025-2026","8","1er Lapso","41","106","18","11",NULL,NULL,"11.00");
INSERT INTO `calificaciones` VALUES("609","2025-2026","8","1er Lapso","41","106","19","10",NULL,NULL,"10.00");
INSERT INTO `calificaciones` VALUES("610","2025-2026","8","1er Lapso","41","106","20","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("611","2025-2026","8","2do Lapso","41","106","11","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("612","2025-2026","8","2do Lapso","41","106","12","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("613","2025-2026","8","2do Lapso","41","106","13","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("614","2025-2026","8","2do Lapso","41","106","15","15",NULL,NULL,"15.00");
INSERT INTO `calificaciones` VALUES("615","2025-2026","8","2do Lapso","41","106","14","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("616","2025-2026","8","2do Lapso","41","106","16","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("617","2025-2026","8","2do Lapso","41","106","17","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("618","2025-2026","8","2do Lapso","41","106","18","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("619","2025-2026","8","2do Lapso","41","106","19","18",NULL,NULL,"18.00");
INSERT INTO `calificaciones` VALUES("620","2025-2026","8","2do Lapso","41","106","20","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("621","2025-2026","8","3er Lapso","41","106","12","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("622","2025-2026","8","3er Lapso","41","106","13","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("623","2025-2026","8","3er Lapso","41","106","14","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("624","2025-2026","8","3er Lapso","41","106","15","5",NULL,NULL,"5.00");
INSERT INTO `calificaciones` VALUES("625","2025-2026","8","3er Lapso","41","106","16","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("626","2025-2026","8","3er Lapso","41","106","17","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("627","2025-2026","8","3er Lapso","41","106","18","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("628","2025-2026","8","3er Lapso","41","106","19","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("629","2025-2026","8","3er Lapso","41","106","20","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("630","2025-2026","8","1er Lapso","39","104","11","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("631","2025-2026","8","1er Lapso","39","104","12","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("632","2025-2026","8","1er Lapso","39","104","13","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("633","2025-2026","8","1er Lapso","39","104","14","18",NULL,NULL,"18.00");
INSERT INTO `calificaciones` VALUES("634","2025-2026","8","1er Lapso","39","104","15","9",NULL,NULL,"9.00");
INSERT INTO `calificaciones` VALUES("635","2025-2026","8","1er Lapso","39","104","16","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("636","2025-2026","8","1er Lapso","39","104","17","15",NULL,NULL,"15.00");
INSERT INTO `calificaciones` VALUES("637","2025-2026","8","1er Lapso","39","104","18","17",NULL,NULL,"17.00");
INSERT INTO `calificaciones` VALUES("638","2025-2026","8","1er Lapso","39","104","19","15",NULL,NULL,"15.00");
INSERT INTO `calificaciones` VALUES("639","2025-2026","8","1er Lapso","39","104","20","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("640","2025-2026","8","2do Lapso","39","104","11","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("641","2025-2026","8","2do Lapso","39","104","12","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("642","2025-2026","8","2do Lapso","39","104","13","18",NULL,NULL,"18.00");
INSERT INTO `calificaciones` VALUES("643","2025-2026","8","2do Lapso","39","104","14","19",NULL,NULL,"19.00");
INSERT INTO `calificaciones` VALUES("644","2025-2026","8","2do Lapso","39","104","15","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("645","2025-2026","8","2do Lapso","39","104","16","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("646","2025-2026","8","2do Lapso","39","104","17","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("647","2025-2026","8","2do Lapso","39","104","18","15",NULL,NULL,"15.00");
INSERT INTO `calificaciones` VALUES("648","2025-2026","8","2do Lapso","39","104","19","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("649","2025-2026","8","2do Lapso","39","104","20","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("650","2025-2026","8","3er Lapso","39","104","11","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("651","2025-2026","8","3er Lapso","39","104","12","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("652","2025-2026","8","3er Lapso","39","104","13","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("653","2025-2026","8","3er Lapso","39","104","14","18",NULL,NULL,"18.00");
INSERT INTO `calificaciones` VALUES("654","2025-2026","8","3er Lapso","39","104","15","9",NULL,NULL,"9.00");
INSERT INTO `calificaciones` VALUES("655","2025-2026","8","3er Lapso","39","104","16","15",NULL,NULL,"15.00");
INSERT INTO `calificaciones` VALUES("656","2025-2026","8","3er Lapso","39","104","17","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("657","2025-2026","8","3er Lapso","39","104","18","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("658","2025-2026","8","3er Lapso","39","104","19","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("659","2025-2026","8","3er Lapso","39","104","20","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("660","2025-2026","8","1er Lapso","36","107","11","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("661","2025-2026","8","1er Lapso","36","107","13","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("662","2025-2026","8","1er Lapso","36","107","12","15",NULL,NULL,"15.00");
INSERT INTO `calificaciones` VALUES("663","2025-2026","8","1er Lapso","36","107","14","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("664","2025-2026","8","1er Lapso","36","107","15","18",NULL,NULL,"18.00");
INSERT INTO `calificaciones` VALUES("665","2025-2026","8","1er Lapso","36","107","16","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("666","2025-2026","8","1er Lapso","36","107","17","19",NULL,NULL,"19.00");
INSERT INTO `calificaciones` VALUES("667","2025-2026","8","1er Lapso","36","107","18","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("668","2025-2026","8","1er Lapso","36","107","19","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("669","2025-2026","8","1er Lapso","36","107","20","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("670","2025-2026","8","2do Lapso","36","107","11","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("671","2025-2026","8","2do Lapso","36","107","12","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("672","2025-2026","8","2do Lapso","36","107","13","18",NULL,NULL,"18.00");
INSERT INTO `calificaciones` VALUES("673","2025-2026","8","2do Lapso","36","107","14","19",NULL,NULL,"19.00");
INSERT INTO `calificaciones` VALUES("674","2025-2026","8","2do Lapso","36","107","15","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("675","2025-2026","8","2do Lapso","36","107","16","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("676","2025-2026","8","2do Lapso","36","107","17","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("677","2025-2026","8","2do Lapso","36","107","18","18",NULL,NULL,"18.00");
INSERT INTO `calificaciones` VALUES("678","2025-2026","8","2do Lapso","36","107","19","15",NULL,NULL,"15.00");
INSERT INTO `calificaciones` VALUES("679","2025-2026","8","2do Lapso","36","107","20","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("680","2025-2026","8","3er Lapso","36","107","11","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("681","2025-2026","8","3er Lapso","36","107","12","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("682","2025-2026","8","3er Lapso","36","107","13","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("683","2025-2026","8","3er Lapso","36","107","14","18",NULL,NULL,"18.00");
INSERT INTO `calificaciones` VALUES("684","2025-2026","8","3er Lapso","36","107","15","19",NULL,NULL,"19.00");
INSERT INTO `calificaciones` VALUES("685","2025-2026","8","3er Lapso","36","107","16","15",NULL,NULL,"15.00");
INSERT INTO `calificaciones` VALUES("686","2025-2026","8","3er Lapso","36","107","17","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("687","2025-2026","8","3er Lapso","36","107","18","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("688","2025-2026","8","3er Lapso","36","107","19","11",NULL,NULL,"11.00");
INSERT INTO `calificaciones` VALUES("689","2025-2026","8","3er Lapso","36","107","20","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("690","2025-2026","8","1er Lapso","38","108","11","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("691","2025-2026","8","1er Lapso","38","108","12","15",NULL,NULL,"15.00");
INSERT INTO `calificaciones` VALUES("692","2025-2026","8","1er Lapso","38","108","13","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("693","2025-2026","8","1er Lapso","38","108","14","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("694","2025-2026","8","1er Lapso","38","108","15","11",NULL,NULL,"11.00");
INSERT INTO `calificaciones` VALUES("695","2025-2026","8","1er Lapso","38","108","16","19",NULL,NULL,"19.00");
INSERT INTO `calificaciones` VALUES("696","2025-2026","8","1er Lapso","38","108","17","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("697","2025-2026","8","1er Lapso","38","108","18","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("698","2025-2026","8","1er Lapso","38","108","19","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("699","2025-2026","8","1er Lapso","38","108","20","11",NULL,NULL,"11.00");
INSERT INTO `calificaciones` VALUES("700","2025-2026","8","2do Lapso","38","108","11","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("701","2025-2026","8","2do Lapso","38","108","12","15",NULL,NULL,"15.00");
INSERT INTO `calificaciones` VALUES("702","2025-2026","8","2do Lapso","38","108","13","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("703","2025-2026","8","2do Lapso","38","108","14","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("704","2025-2026","8","2do Lapso","38","108","15","9",NULL,NULL,"9.00");
INSERT INTO `calificaciones` VALUES("705","2025-2026","8","2do Lapso","38","108","16","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("706","2025-2026","8","2do Lapso","38","108","17","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("707","2025-2026","8","2do Lapso","38","108","18","6",NULL,NULL,"6.00");
INSERT INTO `calificaciones` VALUES("708","2025-2026","8","2do Lapso","38","108","19","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("709","2025-2026","8","2do Lapso","38","108","20","18",NULL,NULL,"18.00");
INSERT INTO `calificaciones` VALUES("710","2025-2026","7","3er Lapso","38","108","10","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("711","2025-2026","7","3er Lapso","38","108","9","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("712","2025-2026","7","3er Lapso","38","108","8","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("713","2025-2026","7","3er Lapso","38","108","7","19",NULL,NULL,"19.00");
INSERT INTO `calificaciones` VALUES("714","2025-2026","7","3er Lapso","38","108","6","18",NULL,NULL,"18.00");
INSERT INTO `calificaciones` VALUES("715","2025-2026","7","3er Lapso","38","108","5","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("716","2025-2026","7","3er Lapso","38","108","4","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("717","2025-2026","7","3er Lapso","38","108","3","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("718","2025-2026","7","3er Lapso","38","108","2","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("719","2025-2026","7","3er Lapso","38","108","1","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("720","2025-2026","8","2do Lapso","37","105","11","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("721","2025-2026","8","2do Lapso","37","105","12","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("722","2025-2026","8","2do Lapso","37","105","13","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("723","2025-2026","8","2do Lapso","37","105","14","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("724","2025-2026","8","2do Lapso","37","105","15","15",NULL,NULL,"15.00");
INSERT INTO `calificaciones` VALUES("725","2025-2026","8","2do Lapso","37","105","16","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("726","2025-2026","8","2do Lapso","37","105","17","11",NULL,NULL,"11.00");
INSERT INTO `calificaciones` VALUES("727","2025-2026","8","2do Lapso","37","105","18","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("728","2025-2026","8","2do Lapso","37","105","19","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("729","2025-2026","8","2do Lapso","37","105","20","15",NULL,NULL,"15.00");
INSERT INTO `calificaciones` VALUES("730","2025-2026","8","3er Lapso","37","105","11","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("731","2025-2026","8","3er Lapso","37","105","12","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("732","2025-2026","8","3er Lapso","37","105","13","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("733","2025-2026","8","3er Lapso","37","105","15","15",NULL,NULL,"15.00");
INSERT INTO `calificaciones` VALUES("734","2025-2026","8","3er Lapso","37","105","16","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("735","2025-2026","8","3er Lapso","37","105","17","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("736","2025-2026","8","3er Lapso","37","105","18","18",NULL,NULL,"18.00");
INSERT INTO `calificaciones` VALUES("737","2025-2026","8","3er Lapso","37","105","19","19",NULL,NULL,"19.00");
INSERT INTO `calificaciones` VALUES("738","2025-2026","8","3er Lapso","37","105","20","10",NULL,NULL,"10.00");
INSERT INTO `calificaciones` VALUES("739","2025-2026","8","1er Lapso","37","105","11","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("740","2025-2026","8","1er Lapso","37","105","12","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("741","2025-2026","8","1er Lapso","37","105","13","15",NULL,NULL,"15.00");
INSERT INTO `calificaciones` VALUES("742","2025-2026","8","1er Lapso","37","105","14","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("743","2025-2026","8","1er Lapso","37","105","15","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("744","2025-2026","8","1er Lapso","37","105","16","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("745","2025-2026","8","1er Lapso","37","105","17","11",NULL,NULL,"11.00");
INSERT INTO `calificaciones` VALUES("746","2025-2026","8","1er Lapso","37","105","18","10",NULL,NULL,"10.00");
INSERT INTO `calificaciones` VALUES("747","2025-2026","8","1er Lapso","37","105","19","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("748","2025-2026","8","1er Lapso","37","105","20","22",NULL,NULL,"22.00");
INSERT INTO `calificaciones` VALUES("749","2025-2026","8","3er Lapso","37","105","14","18",NULL,NULL,"18.00");
INSERT INTO `calificaciones` VALUES("750","2025-2026","8","1er Lapso","42","103","11","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("751","2025-2026","8","1er Lapso","42","103","12","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("752","2025-2026","8","1er Lapso","42","103","13","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("753","2025-2026","8","1er Lapso","42","103","14","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("754","2025-2026","8","1er Lapso","42","103","15","15",NULL,NULL,"15.00");
INSERT INTO `calificaciones` VALUES("755","2025-2026","8","1er Lapso","42","103","16","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("756","2025-2026","8","1er Lapso","42","103","17","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("757","2025-2026","8","1er Lapso","42","103","18","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("758","2025-2026","8","1er Lapso","42","103","19","15",NULL,NULL,"15.00");
INSERT INTO `calificaciones` VALUES("759","2025-2026","8","1er Lapso","42","103","20","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("760","2025-2026","8","2do Lapso","42","103","11","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("761","2025-2026","8","2do Lapso","42","103","12","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("762","2025-2026","8","2do Lapso","42","103","13","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("763","2025-2026","8","2do Lapso","42","103","14","18",NULL,NULL,"18.00");
INSERT INTO `calificaciones` VALUES("764","2025-2026","8","2do Lapso","42","103","15","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("765","2025-2026","8","2do Lapso","42","103","16","12",NULL,NULL,"12.00");
INSERT INTO `calificaciones` VALUES("766","2025-2026","8","2do Lapso","42","103","17","11",NULL,NULL,"11.00");
INSERT INTO `calificaciones` VALUES("767","2025-2026","8","2do Lapso","42","103","18","10",NULL,NULL,"10.00");
INSERT INTO `calificaciones` VALUES("768","2025-2026","8","2do Lapso","42","103","19","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("769","2025-2026","8","2do Lapso","42","103","20","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("770","2025-2026","8","3er Lapso","42","103","11","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("771","2025-2026","8","3er Lapso","42","103","12","14",NULL,NULL,"14.00");
INSERT INTO `calificaciones` VALUES("772","2025-2026","8","3er Lapso","42","103","13","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("773","2025-2026","8","3er Lapso","42","103","14","18",NULL,NULL,"18.00");
INSERT INTO `calificaciones` VALUES("774","2025-2026","8","3er Lapso","42","103","15","16",NULL,NULL,"16.00");
INSERT INTO `calificaciones` VALUES("775","2025-2026","8","3er Lapso","42","103","16","9",NULL,NULL,"9.00");
INSERT INTO `calificaciones` VALUES("776","2025-2026","8","3er Lapso","42","103","17","19",NULL,NULL,"19.00");
INSERT INTO `calificaciones` VALUES("777","2025-2026","8","3er Lapso","42","103","18","20",NULL,NULL,"20.00");
INSERT INTO `calificaciones` VALUES("778","2025-2026","8","3er Lapso","42","103","19","11",NULL,NULL,"11.00");
INSERT INTO `calificaciones` VALUES("779","2025-2026","8","3er Lapso","42","103","20","20",NULL,NULL,"20.00");

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `contacto_pago` VALUES("1","V12345678","María","González","Av. Principal #123","04141234567","maria.gonzalez@email.com","Universitario","Ingeniero","Sí","Tech Solutions","04245551231","Zona Industrial");
INSERT INTO `contacto_pago` VALUES("2","V23456789","Carlos","Pérez","Calle 2 #45-67","04142345678","carlos.perez@email.com","Universitario","Médico","Sí","Hospital Central","04245551231","Centro Médico");
INSERT INTO `contacto_pago` VALUES("3","V98765432","Luisa","Morales","Urbanización Los Jardines","04149876543","luisa.morales@email.com","Universitario","Administrador","Sí","Empresa Logística","04125552141","Zona Industrial");
INSERT INTO `contacto_pago` VALUES("4","V87654321","Alberto","Rojas","Calle 7 #89-10","04148765432","alberto.rojas@email.com","Técnico Superior","Técnico","Sí","Taller Mecánico","04162586311","Zona Industrial");
INSERT INTO `contacto_pago` VALUES("5","V76543210","Marta","Silva","Av. Bolívar #100","04147654321","marta.silva@email.com","Bachiller","Comerciante","Sí","Tienda Marta","04125698541","Centro Comercial");
INSERT INTO `contacto_pago` VALUES("6","V65432109","Javier","Ortega","Residencias El Valle","04146543210","javier.ortega@email.com","Universitario","Ingeniero","Sí","Constructora Ortega","04168526931","Zona Norte");
INSERT INTO `contacto_pago` VALUES("7","V54321098","Carolina","Guzmán","Calle 12 #34-56","04145432109","carolina.guzman@email.com","Universitario","Abogado","Sí","Bufete Legal","04248527412","Centro Ciudad");
INSERT INTO `contacto_pago` VALUES("8","V43210987","Oscar","Navarro","Urbanización Los Naranjos","04144321098","oscar.navarro@email.com","Técnico Medio","Electricista","Sí","Servicios Eléctricos","04269638527","Zona Este");
INSERT INTO `contacto_pago` VALUES("9","V32109876","Daniela","Peña","Av. Sucre #78","04143210987","daniela.pena@email.com","Universitario","Contador","Sí","Asesoría Financiera","04268523691","Centro Financiero");
INSERT INTO `contacto_pago` VALUES("10","V21098765","Raúl","Méndez","Calle 20 #11-22","04142109876","raul.mendez@email.com","Universitario","Médico","Sí","Clínica Méndez","04268524135","Sector Salud");
INSERT INTO `contacto_pago` VALUES("11","V12121212","Rosa","Blanco","Av. Las Acacias #45","04141212121","rosa.blanco@email.com","Universitario","Psicólogo","Sí","Centro Psicológico","04248852145","Centro Ciudad");
INSERT INTO `contacto_pago` VALUES("12","V13131313","Alberto","Morales","Calle 13 #13-13","04141313131","alberto.morales@email.com","Técnico Superior","Electricista","Sí","ElectroSol","04248521463","Zona Industrial");
INSERT INTO `contacto_pago` VALUES("13","V22222222","Elena","Rojas","Urbanización Los Girasoles","04142222222","elena.rojas@email.com","Universitario","Administrador","Sí","Empresa Logística","0416125741","Zona Industrial");
INSERT INTO `contacto_pago` VALUES("14","V23232323","Félix","Pérez","Calle 23 #23-23","04142323232","felix.perez@email.com","Técnico Superior","Técnico","Sí","Taller Mecánico","04242323231","Zona Industrial");
INSERT INTO `contacto_pago` VALUES("15","V24242424","Diana","García","Av. Bolívar #240","04142424242","diana.garcia@email.com","Bachiller","Comerciante","Sí","Tienda Diana","04245551597","Centro Comercial");
INSERT INTO `contacto_pago` VALUES("16","V78121414","Tobias","Mendoza","Zona Norte","04241156221","tobias@gmail.com","Bachillerato","Ninguna activa","Sí","Mi super Barquisimeto","04241244211","Barquisimeto");

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
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `estudiantes` VALUES("1","E12345678","Juan","González Pérez","M","12/06/2012","13","Av. Principal #123","Caracas","Escuela Básica Los Arcos","Cambio de residencia","No","Cambio de residencia","7","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("2","V23456789","Ana","Pérez Rodríguez","F","12/06/2012","13","Calle 2 #45-67","Valencia","Colegio Santa María","Finalización de ciclo","No","Cambio de residencia","7","Mañana","Ninguno","Polvo","Completas","Asma");
INSERT INTO `estudiantes` VALUES("3","E34567890","Carlos","Rodríguez Martínez","M","24/07/2012","13","Urbanización Las Flores","Maracay","Escuela Básica Bolivariana","Cambio de institución","No","Cambio de residencia","7","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("4","V45678901","María","Martínez López","F","24/07/2012","13","Residencias El Paraíso","Barquisimeto","Colegio Los Próceres","Mejor educación","No","Cambio de residencia","7","Mañana","Ninguno","Mariscos","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("5","E56789012","Pedro","López Hernández","M","24/07/2012","13","Calle 5 #12-34","Caracas","Escuela Básica Andrés Bello","Cambio de residencia","No","Cambio de residencia","7","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("6","V67890123","Laura","Hernández Díaz","F","24/07/2012","13","Av. Bolívar #78","Valencia","Colegio San José","Finalización de ciclo","No","Cambio de residencia","7","Mañana","Ninguno","Polen","Completas","Rinitis alérgica");
INSERT INTO `estudiantes` VALUES("7","V78901234","Diego","Díaz García","M","06/08/2012","13","Urbanización Los Pinos","Maracay","Escuela Básica Simón Bolívar","Cambio de institución","No","Cambio de residencia","7","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("8","E89012345","Sofía","García Fernández","F","06/08/2012","13","Calle 8 #23-45","Barquisimeto","Colegio La Salle","Mejor educación","No","Zona más cercana","7","Mañana","Ninguno","Lácteos","Completas","Intolerancia a la lactosa");
INSERT INTO `estudiantes` VALUES("9","E90123456","Andrés","Fernández Sánchez","M","12/12/2012","13","Residencias El Recreo","Caracas","Escuela Básica República de Chile","Cambio de residencia","No","Zona más cercana","7","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("10","V01234567","Valentina","Sánchez Ramírez","F","12/12/2012","13","Av. Libertador #56","Valencia","Colegio San Ignacio","Finalización de ciclo","No","Zona más cercana","7","Mañana","Ninguno","Nueces","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("11","V11223344","Miguel","Ramírez Torres","M","06/12/2011","14","Calle 10 #11-12","Maracay","Colegio Santa Rosa","Cambio de residencia","No","Zona más cercana","8","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("12","V22334455","Camila","Torres Mendoza","F","06/12/2011","14","Urbanización Brisas","Barquisimeto","Escuela Básica Los Samanes","Finalización de ciclo","No","Zona más cercana","8","Mañana","Ninguno","Polvo","Completas","Asma");
INSERT INTO `estudiantes` VALUES("13","V33445566","Javier","Mendoza Vargas","M","18/10/2011","14","Av. Principal #200","Caracas","Colegio San Martín","Cambio de institución","No","Zona más cercana","8","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("14","V44556677","Isabella","Vargas Castro","F","18/10/2011","14","Calle 15 #33-44","Valencia","Escuela Básica Juan Pablo II","Mejor educación","No","Zona más cercana","8","Mañana","Ninguno","Mariscos","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("15","V55667788","Daniel","Castro Rojas","M","18/10/2011","14","Residencias Altamira","Maracay","Colegio La Concordia","Cambio de residencia","No","Zona más cercana","8","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("16","V66778899","Gabriela","Rojas Silva","F","24/08/2011","14","Av. Bolívar #100","Barquisimeto","Escuela Básica República Argentina","Finalización de ciclo","No","Zona más cercana","8","Mañana","Ninguno","Polen","Completas","Rinitis alérgica");
INSERT INTO `estudiantes` VALUES("17","E77889900","Alejandro","Silva Ortega","M","24/08/2011","14","Calle 7 #89-10","Caracas","Colegio San Francisco","Cambio de institución","No","Motivos personales","8","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("18","E88990011","Mariana","Ortega Guzmán","F","24/08/2011","14","Residencias El Valle","Valencia","Escuela Básica República del Perú","Mejor educación","No","Motivos personales","8","Mañana","Ninguno","Lácteos","Completas","Intolerancia a la lactosa");
INSERT INTO `estudiantes` VALUES("19","E99001122","Ricardo","Guzmán Navarro","M","01/10/2011","14","Calle 12 #34-56","Maracay","Colegio San Agustín","Cambio de residencia","No","Motivos personales","8","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("20","E00112233","Natalia","Navarro Peña","F","01/10/2011","14","Urbanización Los Naranjos","Barquisimeto","Escuela Básica República de Colombia","Finalización de ciclo","No","Motivos personales","8","Mañana","Ninguno","Nueces","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("21","V99887766","Luis","Peña Méndez","M","16/10/2010","15","Av. Sucre #78","Caracas","Colegio Santo Tomás","Cambio de residencia","No","Motivos personales","9","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("22","V88776655","Paula","Méndez Morales","F","16/10/2010","15","Calle 20 #11-22","Valencia","Escuela Básica República de México","Finalización de ciclo","No","Motivos personales","9","Mañana","Ninguno","Polvo","Completas","Asma");
INSERT INTO `estudiantes` VALUES("23","V77665544","José","Morales Rojas","M","20/10/2010","15","Urbanización Los Jardines","Maracay","Colegio San Vicente","Cambio de institución","No","Motivos personales","9","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("24","V66554433","Lucía","Rojas Silva","F","20/10/2010","15","Av. Bolívar #100","Barquisimeto","Escuela Básica República de Chile","Mejor educación","No","Motivos personales","9","Mañana","Ninguno","Mariscos","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("25","E55443322","Felipe","Silva Ortega","M","20/10/2010","15","Residencias El Valle","Caracas","Colegio La Salle","Cambio de residencia","No","Motivos personales","9","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("26","V44332211","Daniela","Ortega Guzmán","F","20/10/2010","15","Calle 12 #34-56","Valencia","Escuela Básica Andrés Bello","Finalización de ciclo","No","Retiro Formal","9","Mañana","Ninguno","Polen","Completas","Rinitis alérgica");
INSERT INTO `estudiantes` VALUES("27","V33221100","David","Guzmán Navarro","M","20/11/2010","15","Urbanización Los Naranjos","Maracay","Colegio San Ignacio","Cambio de institución","No","Retiro Formal","9","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("28","V22110099","Valeria","Navarro Peña","F","20/11/2010","15","Av. Sucre #78","Barquisimeto","Escuela Básica Simón Bolívar","Mejor educación","No","Retiro Formal","9","Mañana","Ninguno","Lácteos","Completas","Intolerancia a la lactosa");
INSERT INTO `estudiantes` VALUES("29","E11009988","Samuel","Peña Méndez","M","12/12/2010","15","Calle 20 #11-22","Caracas","Colegio San José","Cambio de residencia","No","Retiro Formal","9","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("30","E00998877","Emma","Méndez Morales","F","12/12/2010","15","Urbanización Los Jardines","Valencia","Escuela Básica Juan Pablo II","Finalización de ciclo","No","Retiro Formal","9","Mañana","Ninguno","Nueces","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("31","E10203040","Mateo","González Pérez","M","06/11/2009","16","Av. Principal #123","Maracay","Colegio Santa María","Cambio de residencia","No","Retiro Formal","10","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("32","V20304050","Sara","Pérez Rodríguez","F","06/11/2009","16","Calle 2 #45-67","Barquisimeto","Escuela Básica Los Arcos","Finalización de ciclo","No","Retiro Formal","10","Mañana","Ninguno","Polvo","Completas","Asma");
INSERT INTO `estudiantes` VALUES("33","E30405060","Adrián","Rodríguez Martínez","M","09/07/2009","16","Urbanización Las Flores","Caracas","Colegio Los Próceres","Cambio de institución","No","Retiro Formal","10","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("34","V40506070","Claudia","Martínez López","F","09/07/2009","16","Residencias El Paraíso","Valencia","Escuela Básica Bolivariana","Mejor educación","No","Retiro Formal","10","Mañana","Ninguno","Mariscos","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("35","E50607080","Hugo","López Hernández","M","09/07/2009","16","Calle 5 #12-34","Maracay","Colegio San Ignacio","Cambio de residencia","No","Retiro Formal","10","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("36","E60708090","Elena","Hernández Díaz","F","15/08/2009","16","Av. Bolívar #78","Barquisimeto","Escuela Básica Andrés Bello","Finalización de ciclo","No","Retiro Formal","10","Mañana","Ninguno","Polen","Completas","Rinitis alérgica");
INSERT INTO `estudiantes` VALUES("37","E70809010","Raúl","Díaz García","M","15/08/2009","16","Urbanización Los Pinos","Caracas","Colegio La Salle","Cambio de institución","No","Retiro Formal","10","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("38","V80901020","Carla","García Fernández","F","15/08/2009","16","Calle 8 #23-45","Valencia","Escuela Básica Simón Bolívar","Mejor educación","No","Retiro Formal","10","Mañana","Ninguno","Lácteos","Completas","Intolerancia a la lactosa");
INSERT INTO `estudiantes` VALUES("39","E91020304","Jorge","Fernández Sánchez","M","18/08/2009","16","Residencias El Recreo","Maracay","Colegio San José","Cambio de residencia","No","Retiro Formal","10","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("40","V01020304","Renata","Sánchez Ramírez","F","18/08/2009","16","Av. Libertador #56","Barquisimeto","Escuela Básica República de Chile","Finalización de ciclo","No","Retiro Formal","10","Mañana","Ninguno","Nueces","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("41","V11223344","Bruno","Ramírez Torres","M","18/10/2008","17","Calle 10 #11-12","Caracas","Colegio Santa Rosa","Cambio de residencia","No","Retiro Formal","11","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("42","V22334455","Olivia","Torres Mendoza","F","18/10/2008","17","Urbanización Brisas","Valencia","Escuela Básica Los Samanes","Finalización de ciclo","No","Retiro Formal","11","Mañana","Ninguno","Polvo","Completas","Asma");
INSERT INTO `estudiantes` VALUES("43","V33445566","Martín","Mendoza Vargas","M","18/10/2008","17","Av. Principal #200","Maracay","Colegio San Martín","Cambio de institución","No","Retiro Formal","11","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("44","V44556677","Victoria","Vargas Castro","F","01/09/2008","17","Calle 15 #33-44","Barquisimeto","Escuela Básica Juan Pablo II","Mejor educación","No","Retiro Formal","11","Mañana","Ninguno","Mariscos","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("45","E55667788","Emilio","Castro Rojas","M","01/09/2008","17","Residencias Altamira","Caracas","Colegio La Concordia","Cambio de residencia","No","Retiro Formal","11","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("46","V66778899","Antonella","Rojas Silva","F","09/12/2008","17","Av. Bolívar #100","Valencia","Escuela Básica República Argentina","Finalización de ciclo","No","Retiro Formal","11","Mañana","Ninguno","Polen","Completas","Rinitis alérgica");
INSERT INTO `estudiantes` VALUES("47","V77889900","Sebastián","Silva Ortega","M","09/12/2008","17","Calle 7 #89-10","Maracay","Colegio San Francisco","Cambio de institución","No","Retiro Formal","11","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("48","E88990011","Florencia","Ortega Guzmán","F","09/12/2008","17","Residencias El Valle","Barquisimeto","Escuela Básica República del Perú","Mejor educación","No","Retiro Formal","11","Mañana","Ninguno","Lácteos","Completas","Intolerancia a la lactosa");
INSERT INTO `estudiantes` VALUES("49","V99001122","Gonzalo","Guzmán Navarro","M","11/12/2008","17","Calle 12 #34-56","Caracas","Colegio San Agustín","Cambio de residencia","No","Retiro Formal","11","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("50","E00112233","Julieta","Navarro Peña","F","11/12/2008","17","Urbanización Los Naranjos","Valencia","Escuela Básica República de Colombia","Finalización de ciclo","No","Retiro Formal","11","Mañana","Ninguno","Nueces","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("51","RB1000001","Santiago","Blanco Morales","M","15/10/2018","6","Av. Las Acacias #45","Caracas","Jardín de Infancia","Edad escolar","No","Cambio de residencia","1","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("52","AM2000002","Valentina","Morales Rivas","F","15/10/2018","6","Calle 13 #13-13","Valencia","Guardería Mi Pequeño Mundo","Edad escolar","No","Cambio de residencia","1","Mañana","Ninguno","Polvo","Completas","Asma");
INSERT INTO `estudiantes` VALUES("53","GR3000003","Matías","Rivas Gómez","M","15/10/2018","6","Urbanización Los Mangos","Maracay","Jardín Alegría","Edad escolar","No","Cambio de residencia","1","Tarde","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("54","FG4000004","Emma","Gómez Suárez","F","15/10/2018","6","Av. Intercomunal #78","Barquisimeto","Centro Infantil","Edad escolar","No","Cambio de residencia","1","Mañana","Ninguno","Mariscos","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("55","V1234567","Thiago","Suárez Paredes","M","15/10/2018","6","Residencias El Bosque","Caracas","Jardín de Infancia","Edad escolar","No","Cambio de residencia","1","Tarde","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("56","V2345678","Isabella","Paredes Quintero","F","20/11/2018","6","Calle 17 #17-17","Valencia","Guardería Mi Pequeño Mundo","Edad escolar","No","Cambio de residencia","1","Mañana","Ninguno","Polen","Completas","Rinitis alérgica");
INSERT INTO `estudiantes` VALUES("57","V3456789","Benjamín","Quintero Mendoza","M","20/11/2018","6","Urbanización Los Robles","Maracay","Jardín Alegría","Edad escolar","No","Cambio de residencia","1","Tarde","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("58","V4567890","Mía","Mendoza Campos","F","20/11/2018","6","Av. Bolívar #191","Barquisimeto","Centro Infantil","Edad escolar","No","Cambio de residencia","1","Mañana","Ninguno","Lácteos","Completas","Intolerancia a la lactosa");
INSERT INTO `estudiantes` VALUES("59","V5678901","Lucas","Campos Núñez","M","20/11/2018","6","Calle 20 #20-20","Caracas","Jardín de Infancia","Edad escolar","No","Cambio de residencia","1","Tarde","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("60","V6789012","Sofía","Núñez Blanco","F","20/11/2018","6","Residencias El Jardín","Valencia","Guardería Mi Pequeño Mundo","Edad escolar","No","Cambio de residencia","1","Mañana","Ninguno","Nueces","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("61","RB5000005","Mateo","Blanco Rivas","M","11/11/2017","7","Av. Las Acacias #45","Maracay","Escuela Básica Los Arcos","Cambio de institución","No","Cambio de residencia","2","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("62","AM6000006","Valeria","Morales Gómez","F","11/11/2017","7","Calle 13 #13-13","Barquisimeto","Colegio Santa María","Finalización de ciclo","No","Cambio de residencia","2","Tarde","Ninguno","Polvo","Completas","Asma");
INSERT INTO `estudiantes` VALUES("63","GR7000007","Samuel","Rivas Suárez","M","11/11/2017","7","Urbanización Los Mangos","Caracas","Escuela Básica Bolivariana","Cambio de residencia","No","Cambio de residencia","2","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("64","FG8000008","Martina","Gómez Paredes","F","11/11/2017","7","Av. Intercomunal #78","Valencia","Colegio Los Próceres","Mejor educación","No","Cambio de residencia","2","Tarde","Ninguno","Mariscos","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("65","V7890123","Diego","Suárez Quintero","M","11/11/2017","7","Residencias El Bosque","Maracay","Escuela Básica Andrés Bello","Cambio de residencia","No","Cambio de residencia","2","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("66","V8901234","Emilia","Paredes Mendoza","F","25/10/2017","7","Calle 17 #17-17","Barquisimeto","Colegio San José","Finalización de ciclo","No","Cambio de residencia","2","Tarde","Ninguno","Polen","Completas","Rinitis alérgica");
INSERT INTO `estudiantes` VALUES("67","V9012345","Nicolás","Quintero Campos","M","25/10/2017","7","Urbanización Los Robles","Caracas","Escuela Básica Simón Bolívar","Cambio de institución","No","Cambio de residencia","2","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("68","V0123456","Lucía","Mendoza Núñez","F","25/10/2017","7","Av. Bolívar #191","Valencia","Colegio La Salle","Mejor educación","No","Cambio de residencia","2","Tarde","Ninguno","Lácteos","Completas","Intolerancia a la lactosa");
INSERT INTO `estudiantes` VALUES("69","V1234560","Joaquín","Campos Blanco","M","25/10/2017","7","Calle 20 #20-20","Maracay","Escuela Básica República de Chile","Cambio de residencia","No","Cambio de residencia","2","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("70","V2345601","Renata","Núñez Morales","F","25/10/2017","7","Residencias El Jardín","Barquisimeto","Colegio San Ignacio","Finalización de ciclo","No","Cambio de residencia","2","Tarde","Ninguno","Nueces","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("71","RB9000009","Alejandro","Blanco Gómez","M","25/10/2016","8","Av. Las Acacias #45","Caracas","Escuela Básica Los Arcos","Cambio de residencia","No","Cambio de residencia","3","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("72","AM0000010","Victoria","Morales Suárez","F","25/10/2016","8","Calle 13 #13-13","Valencia","Colegio Santa María","Finalización de ciclo","No","Cambio de residencia","3","Tarde","Ninguno","Polvo","Completas","Asma");
INSERT INTO `estudiantes` VALUES("73","GR1000011","Daniel","Rivas Paredes","M","25/10/2016","8","Urbanización Los Mangos","Maracay","Escuela Básica Bolivariana","Cambio de institución","No","Cambio de residencia","3","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("74","FG2000012","Antonella","Gómez Quintero","F","25/10/2016","8","Av. Intercomunal #78","Barquisimeto","Colegio Los Próceres","Mejor educación","No","Cambio de residencia","3","Tarde","Ninguno","Mariscos","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("75","V3456012","Emiliano","Suárez Mendoza","M","25/10/2016","8","Residencias El Bosque","Caracas","Escuela Básica Andrés Bello","Cambio de residencia","No","Cambio de residencia","3","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("76","V4560123","Catalina","Paredes Campos","F","14/09/2016","8","Calle 17 #17-17","Valencia","Colegio San José","Finalización de ciclo","No","Cambio de residencia","3","Tarde","Ninguno","Polen","Completas","Rinitis alérgica");
INSERT INTO `estudiantes` VALUES("77","V5601234","Juan Pablo","Quintero Núñez","M","14/09/2016","8","Urbanización Los Robles","Maracay","Escuela Básica Simón Bolívar","Cambio de institución","No","Cambio de residencia","3","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("78","V6012345","Julieta","Mendoza Blanco","F","14/09/2016","8","Av. Bolívar #191","Barquisimeto","Colegio La Salle","Mejor educación","No","Cambio de residencia","3","Tarde","Ninguno","Lácteos","Completas","Intolerancia a la lactosa");
INSERT INTO `estudiantes` VALUES("79","V0123450","Felipe","Campos Morales","M","14/09/2016","8","Calle 20 #20-20","Caracas","Escuela Básica República de Chile","Cambio de residencia","No","Cambio de residencia","3","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("80","V1234501","Florencia","Núñez Rivas","F","14/09/2016","8","Residencias El Jardín","Valencia","Colegio San Ignacio","Finalización de ciclo","No","Cambio de residencia","3","Tarde","Ninguno","Nueces","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("81","RB3000013","Maximiliano","Blanco Suárez","M","11/09/2015","9","Av. Las Acacias #45","Maracay","Escuela Básica Los Arcos","Cambio de residencia","No","Cambio de institucion","4","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("82","AM4000014","Abril","Morales Paredes","F","11/09/2015","9","Calle 13 #13-13","Barquisimeto","Colegio Santa María","Finalización de ciclo","No","Cambio de institucion","4","Tarde","Ninguno","Polvo","Completas","Asma");
INSERT INTO `estudiantes` VALUES("83","GR5000015","Emilio","Rivas Quintero","M","11/09/2015","9","Urbanización Los Mangos","Caracas","Escuela Básica Bolivariana","Cambio de institución","No","Cambio de institucion","4","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("84","FG6000016","Agustina","Gómez Mendoza","F","11/09/2015","9","Av. Intercomunal #78","Valencia","Colegio Los Próceres","Mejor educación","No","Cambio de institucion","4","Tarde","Ninguno","Mariscos","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("85","V2345012","Thiago","Suárez Campos","M","11/09/2015","9","Residencias El Bosque","Maracay","Escuela Básica Andrés Bello","Cambio de residencia","No","Cambio de institucion","4","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("86","V3450123","Isidora","Paredes Núñez","F","11/11/2015","9","Calle 17 #17-17","Caracas","Colegio San José","Finalización de ciclo","No","Cambio de institucion","4","Tarde","Ninguno","Polen","Completas","Rinitis alérgica");
INSERT INTO `estudiantes` VALUES("87","V4501234","Benicio","Quintero Blanco","M","11/11/2015","9","Urbanización Los Robles","Valencia","Escuela Básica Simón Bolívar","Cambio de institución","No","Cambio de institucion","4","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("88","V5012345","Maite","Mendoza Morales","F","11/11/2015","9","Av. Bolívar #191","Barquisimeto","Colegio La Salle","Mejor educación","No","Cambio de institucion","4","Tarde","Ninguno","Lácteos","Completas","Intolerancia a la lactosa");
INSERT INTO `estudiantes` VALUES("89","V0123401","Santino","Campos Rivas","M","11/11/2015","9","Calle 20 #20-20","Maracay","Escuela Básica República de Chile","Cambio de residencia","No","Cambio de institucion","4","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("90","V1234012","Alma","Núñez Gómez","F","11/11/2015","9","Residencias El Jardín","Caracas","Colegio San Ignacio","Finalización de ciclo","No","Cambio de institucion","4","Tarde","Ninguno","Nueces","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("91","RB7000017","Bautista","Blanco Paredes","M","20/11/2014","10","Av. Las Acacias #45","Valencia","Escuela Básica Los Arcos","Cambio de residencia","No","Cambio de institucion","5","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("92","AM8000018","Mía","Morales Quintero","F","20/11/2014","10","Calle 13 #13-13","Maracay","Colegio Santa María","Finalización de ciclo","No","Cambio de institucion","5","Tarde","Ninguno","Polvo","Completas","Asma");
INSERT INTO `estudiantes` VALUES("93","GR9000019","Vicente","Rivas Mendoza","M","20/11/2014","10","Urbanización Los Mangos","Barquisimeto","Escuela Básica Bolivariana","Cambio de institución","No","Cambio de institucion","5","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("94","FG0000020","Valentina","Gómez Campos","F","20/11/2014","10","Av. Intercomunal #78","Caracas","Colegio Los Próceres","Mejor educación","No","Cambio de institucion","5","Tarde","Ninguno","Mariscos","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("95","V1234010","Luciano","Suárez Núñez","M","20/11/2014","10","Residencias El Bosque","Valencia","Escuela Básica Andrés Bello","Cambio de residencia","No","Cambio de institucion","5","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("96","V2340101","Amanda","Paredes Blanco","F","14/12/2014","10","Calle 17 #17-17","Maracay","Colegio San José","Finalización de ciclo","No","Cambio de institucion","5","Tarde","Ninguno","Polen","Completas","Rinitis alérgica");
INSERT INTO `estudiantes` VALUES("97","V3401012","Simón","Quintero Morales","M","14/12/2014","10","Urbanización Los Robles","Barquisimeto","Escuela Básica Simón Bolívar","Cambio de institución","No","Cambio de institucion","5","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("98","V4010123","Antonia","Mendoza Rivas","F","14/12/2014","10","Av. Bolívar #191","Caracas","Colegio La Salle","Mejor educación","No","Cambio de institucion","5","Tarde","Ninguno","Lácteos","Completas","Intolerancia a la lactosa");
INSERT INTO `estudiantes` VALUES("99","V0101234","Tobías","Campos Gómez","M","14/12/2014","10","Calle 20 #20-20","Valencia","Escuela Básica República de Chile","Cambio de residencia","No","Cambio de institucion","5","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("100","V1012340","Juliana","Núñez Suárez","F","14/12/2014","10","Residencias El Jardín","Maracay","Colegio San Ignacio","Finalización de ciclo","No","Cambio de institucion","5","Tarde","Ninguno","Nueces","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("101","RB1000021","Ignacio","Blanco Quintero","M","18/12/2014","11","Av. Las Acacias #45","Barquisimeto","Escuela Básica Los Arcos","Cambio de residencia","No","Cambio de institucion","6","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("102","AM2000022","Emilia","Morales Mendoza","F","18/12/2014","11","Calle 13 #13-13","Caracas","Colegio Santa María","Finalización de ciclo","No","Cambio de institucion","6","Tarde","Ninguno","Polvo","Completas","Asma");
INSERT INTO `estudiantes` VALUES("103","GR3000023","Juan Martín","Rivas Campos","M","18/12/2014","11","Urbanización Los Mangos","Valencia","Escuela Básica Bolivariana","Cambio de institución","No","Cambio de institucion","6","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("104","FG4000024","Catalina","Gómez Núñez","F","18/12/2014","11","Av. Intercomunal #78","Maracay","Colegio Los Próceres","Mejor educación","No","Cambio de institucion","6","Tarde","Ninguno","Mariscos","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("105","V1012345","Facundo","Suárez Blanco","M","18/12/2014","11","Residencias El Bosque","Barquisimeto","Escuela Básica Andrés Bello","Cambio de residencia","No","Cambio de institucion","6","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("106","V0123451","Clara","Paredes Morales","F","08/11/2014","11","Calle 17 #17-17","Caracas","Colegio San José","Finalización de ciclo","No","Cambio de institucion","6","Tarde","Ninguno","Polen","Completas","Rinitis alérgica");
INSERT INTO `estudiantes` VALUES("107","V1234510","Lautaro","Quintero Rivas","M","08/11/2014","11","Urbanización Los Robles","Valencia","Escuela Básica Simón Bolívar","Cambio de institución","No","Cambio de institucion","6","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("108","V2345101","Juana","Mendoza Gómez","F","08/11/2014","11","Av. Bolívar #191","Maracay","Colegio La Salle","Mejor educación","No","Cambio de institucion","6","Tarde","Ninguno","Lácteos","Completas","Intolerancia a la lactosa");
INSERT INTO `estudiantes` VALUES("109","V3451012","Tomás","Campos Suárez","M","08/11/2014","11","Calle 20 #20-20","Barquisimeto","Escuela Básica República de Chile","Cambio de residencia","No","Cambio de institucion","6","Mañana","Ninguno","Ninguna","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("110","V4510123","Sara","Núñez Paredes","F","08/11/2014","11","Residencias El Jardín","Caracas","Colegio San Ignacio","Finalización de ciclo","No","Cambio de institucion","6","Tarde","Ninguno","Nueces","Completas","Ninguna");
INSERT INTO `estudiantes` VALUES("111","V14441151","Samuel Jose","Tobias","M","04/06/2013","12","Barquisimeto","Zona Norte Bqto","Colegio 24 Junio","Salida Formal","Salida Formal","Ninguna aún","1","Mañana","","","No posee vacunas","No tiene enfermedades");

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
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
INSERT INTO `grado_materia` VALUES("79","2","114");
INSERT INTO `grado_materia` VALUES("80","2","113");
INSERT INTO `grado_materia` VALUES("81","2","111");
INSERT INTO `grado_materia` VALUES("82","2","112");
INSERT INTO `grado_materia` VALUES("83","2","115");
INSERT INTO `grado_materia` VALUES("84","2","116");
INSERT INTO `grado_materia` VALUES("85","3","114");
INSERT INTO `grado_materia` VALUES("86","3","113");
INSERT INTO `grado_materia` VALUES("87","3","111");
INSERT INTO `grado_materia` VALUES("88","3","112");
INSERT INTO `grado_materia` VALUES("89","3","115");
INSERT INTO `grado_materia` VALUES("90","3","116");
INSERT INTO `grado_materia` VALUES("91","4","114");
INSERT INTO `grado_materia` VALUES("92","4","113");
INSERT INTO `grado_materia` VALUES("93","4","111");
INSERT INTO `grado_materia` VALUES("94","4","112");
INSERT INTO `grado_materia` VALUES("95","4","115");
INSERT INTO `grado_materia` VALUES("96","4","116");
INSERT INTO `grado_materia` VALUES("97","5","114");
INSERT INTO `grado_materia` VALUES("98","5","113");
INSERT INTO `grado_materia` VALUES("99","5","111");
INSERT INTO `grado_materia` VALUES("100","5","112");
INSERT INTO `grado_materia` VALUES("101","5","115");
INSERT INTO `grado_materia` VALUES("102","5","116");
INSERT INTO `grado_materia` VALUES("103","6","114");
INSERT INTO `grado_materia` VALUES("104","6","113");
INSERT INTO `grado_materia` VALUES("105","6","111");
INSERT INTO `grado_materia` VALUES("106","6","112");
INSERT INTO `grado_materia` VALUES("107","6","115");
INSERT INTO `grado_materia` VALUES("108","6","116");
INSERT INTO `grado_materia` VALUES("109","8","99");
INSERT INTO `grado_materia` VALUES("110","9","99");
INSERT INTO `grado_materia` VALUES("111","8","106");
INSERT INTO `grado_materia` VALUES("112","9","106");
INSERT INTO `grado_materia` VALUES("113","8","104");
INSERT INTO `grado_materia` VALUES("114","9","104");
INSERT INTO `grado_materia` VALUES("115","8","107");
INSERT INTO `grado_materia` VALUES("116","9","107");
INSERT INTO `grado_materia` VALUES("117","8","108");
INSERT INTO `grado_materia` VALUES("118","9","108");
INSERT INTO `grado_materia` VALUES("119","8","102");
INSERT INTO `grado_materia` VALUES("120","9","102");
INSERT INTO `grado_materia` VALUES("121","8","105");
INSERT INTO `grado_materia` VALUES("122","9","105");
INSERT INTO `grado_materia` VALUES("123","8","103");
INSERT INTO `grado_materia` VALUES("124","8","100");
INSERT INTO `grado_materia` VALUES("125","8","101");
INSERT INTO `grado_materia` VALUES("126","9","103");
INSERT INTO `grado_materia` VALUES("127","9","100");
INSERT INTO `grado_materia` VALUES("128","9","101");

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
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `horarios` VALUES("101","1","51","113","47","1","07:30:00","08:00:00","2025-2026");
INSERT INTO `horarios` VALUES("102","1","51","111","47","1","08:00:00","09:30:00","2025-2026");
INSERT INTO `horarios` VALUES("103","1","51","115","47","1","09:30:00","11:00:00","2025-2026");
INSERT INTO `horarios` VALUES("104","1","51","116","47","1","11:00:00","12:00:00","2025-2026");

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
) ENGINE=InnoDB AUTO_INCREMENT=223 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `inscripciones` VALUES("1","1","1","2025-2026","7","29-07-2025","1");
INSERT INTO `inscripciones` VALUES("2","1","2","2025-2026","7","29-07-2025","1");
INSERT INTO `inscripciones` VALUES("3","2","3","2025-2026","7","29-07-2025","3");
INSERT INTO `inscripciones` VALUES("4","2","4","2025-2026","7","29-07-2025","3");
INSERT INTO `inscripciones` VALUES("5","3","5","2025-2026","7","29-07-2025","5");
INSERT INTO `inscripciones` VALUES("6","3","6","2025-2026","7","29-07-2025","5");
INSERT INTO `inscripciones` VALUES("7","4","7","2025-2026","7","29-07-2025","7");
INSERT INTO `inscripciones` VALUES("8","4","8","2025-2026","7","29-07-2025","7");
INSERT INTO `inscripciones` VALUES("9","5","9","2025-2026","7","29-07-2025","9");
INSERT INTO `inscripciones` VALUES("10","5","10","2025-2026","7","29-07-2025","9");
INSERT INTO `inscripciones` VALUES("11","6","1","2025-2026","7","29-07-2025","1");
INSERT INTO `inscripciones` VALUES("12","6","2","2025-2026","7","29-07-2025","1");
INSERT INTO `inscripciones` VALUES("13","7","3","2025-2026","7","29-07-2025","3");
INSERT INTO `inscripciones` VALUES("14","7","4","2025-2026","7","29-07-2025","3");
INSERT INTO `inscripciones` VALUES("15","8","5","2025-2026","7","29-07-2025","5");
INSERT INTO `inscripciones` VALUES("16","8","6","2025-2026","7","29-07-2025","5");
INSERT INTO `inscripciones` VALUES("17","9","7","2025-2026","7","29-07-2025","7");
INSERT INTO `inscripciones` VALUES("18","9","8","2025-2026","7","29-07-2025","7");
INSERT INTO `inscripciones` VALUES("19","10","9","2025-2026","7","29-07-2025","9");
INSERT INTO `inscripciones` VALUES("20","10","10","2025-2026","7","29-07-2025","9");
INSERT INTO `inscripciones` VALUES("21","11","11","2025-2026","8","29-07-2025","1");
INSERT INTO `inscripciones` VALUES("22","11","12","2025-2026","8","29-07-2025","1");
INSERT INTO `inscripciones` VALUES("23","12","13","2025-2026","8","29-07-2025","3");
INSERT INTO `inscripciones` VALUES("24","12","14","2025-2026","8","29-07-2025","3");
INSERT INTO `inscripciones` VALUES("25","13","15","2025-2026","8","29-07-2025","5");
INSERT INTO `inscripciones` VALUES("26","13","1","2025-2026","8","29-07-2025","5");
INSERT INTO `inscripciones` VALUES("27","14","2","2025-2026","8","29-07-2025","7");
INSERT INTO `inscripciones` VALUES("28","14","3","2025-2026","8","29-07-2025","7");
INSERT INTO `inscripciones` VALUES("29","15","4","2025-2026","8","29-07-2025","9");
INSERT INTO `inscripciones` VALUES("30","15","5","2025-2026","8","29-07-2025","9");
INSERT INTO `inscripciones` VALUES("31","16","6","2025-2026","8","29-07-2025","1");
INSERT INTO `inscripciones` VALUES("32","16","7","2025-2026","8","29-07-2025","1");
INSERT INTO `inscripciones` VALUES("33","17","8","2025-2026","8","29-07-2025","3");
INSERT INTO `inscripciones` VALUES("34","17","9","2025-2026","8","29-07-2025","3");
INSERT INTO `inscripciones` VALUES("35","18","10","2025-2026","8","29-07-2025","5");
INSERT INTO `inscripciones` VALUES("36","18","11","2025-2026","8","29-07-2025","5");
INSERT INTO `inscripciones` VALUES("37","19","12","2025-2026","8","29-07-2025","7");
INSERT INTO `inscripciones` VALUES("38","19","13","2025-2026","8","29-07-2025","7");
INSERT INTO `inscripciones` VALUES("39","20","14","2025-2026","8","29-07-2025","9");
INSERT INTO `inscripciones` VALUES("40","20","15","2025-2026","8","29-07-2025","9");
INSERT INTO `inscripciones` VALUES("41","21","1","2025-2026","9","29-07-2025","1");
INSERT INTO `inscripciones` VALUES("42","21","2","2025-2026","9","29-07-2025","1");
INSERT INTO `inscripciones` VALUES("43","22","3","2025-2026","9","29-07-2025","3");
INSERT INTO `inscripciones` VALUES("44","22","4","2025-2026","9","29-07-2025","3");
INSERT INTO `inscripciones` VALUES("45","23","5","2025-2026","9","29-07-2025","5");
INSERT INTO `inscripciones` VALUES("46","23","6","2025-2026","9","29-07-2025","5");
INSERT INTO `inscripciones` VALUES("47","24","7","2025-2026","9","29-07-2025","7");
INSERT INTO `inscripciones` VALUES("48","24","8","2025-2026","9","29-07-2025","7");
INSERT INTO `inscripciones` VALUES("49","25","9","2025-2026","9","29-07-2025","9");
INSERT INTO `inscripciones` VALUES("50","25","10","2025-2026","9","29-07-2025","9");
INSERT INTO `inscripciones` VALUES("51","26","11","2025-2026","9","29-07-2025","1");
INSERT INTO `inscripciones` VALUES("52","26","12","2025-2026","9","29-07-2025","1");
INSERT INTO `inscripciones` VALUES("53","27","13","2025-2026","9","29-07-2025","3");
INSERT INTO `inscripciones` VALUES("54","27","14","2025-2026","9","29-07-2025","3");
INSERT INTO `inscripciones` VALUES("55","28","15","2025-2026","9","29-07-2025","5");
INSERT INTO `inscripciones` VALUES("56","28","1","2025-2026","9","29-07-2025","5");
INSERT INTO `inscripciones` VALUES("57","29","2","2025-2026","9","29-07-2025","7");
INSERT INTO `inscripciones` VALUES("58","29","3","2025-2026","9","29-07-2025","7");
INSERT INTO `inscripciones` VALUES("59","30","4","2025-2026","9","29-07-2025","9");
INSERT INTO `inscripciones` VALUES("60","30","5","2025-2026","9","29-07-2025","9");
INSERT INTO `inscripciones` VALUES("61","31","6","2025-2026","10","29-07-2025","1");
INSERT INTO `inscripciones` VALUES("62","31","7","2025-2026","10","29-07-2025","1");
INSERT INTO `inscripciones` VALUES("63","32","8","2025-2026","10","29-07-2025","3");
INSERT INTO `inscripciones` VALUES("64","32","9","2025-2026","10","29-07-2025","3");
INSERT INTO `inscripciones` VALUES("65","33","10","2025-2026","10","29-07-2025","5");
INSERT INTO `inscripciones` VALUES("66","33","11","2025-2026","10","29-07-2025","5");
INSERT INTO `inscripciones` VALUES("67","34","12","2025-2026","10","29-07-2025","7");
INSERT INTO `inscripciones` VALUES("68","34","13","2025-2026","10","29-07-2025","7");
INSERT INTO `inscripciones` VALUES("69","35","14","2025-2026","10","29-07-2025","9");
INSERT INTO `inscripciones` VALUES("70","35","15","2025-2026","10","29-07-2025","9");
INSERT INTO `inscripciones` VALUES("71","36","1","2025-2026","10","29-07-2025","1");
INSERT INTO `inscripciones` VALUES("72","36","2","2025-2026","10","29-07-2025","1");
INSERT INTO `inscripciones` VALUES("73","37","3","2025-2026","10","29-07-2025","3");
INSERT INTO `inscripciones` VALUES("74","37","4","2025-2026","10","29-07-2025","3");
INSERT INTO `inscripciones` VALUES("75","38","5","2025-2026","10","29-07-2025","5");
INSERT INTO `inscripciones` VALUES("76","38","6","2025-2026","10","29-07-2025","5");
INSERT INTO `inscripciones` VALUES("77","39","7","2025-2026","10","29-07-2025","7");
INSERT INTO `inscripciones` VALUES("78","39","8","2025-2026","10","29-07-2025","7");
INSERT INTO `inscripciones` VALUES("79","40","9","2025-2026","10","29-07-2025","9");
INSERT INTO `inscripciones` VALUES("80","40","10","2025-2026","10","29-07-2025","9");
INSERT INTO `inscripciones` VALUES("81","41","11","2025-2026","11","29-07-2025","1");
INSERT INTO `inscripciones` VALUES("82","41","12","2025-2026","11","29-07-2025","1");
INSERT INTO `inscripciones` VALUES("83","42","13","2025-2026","11","29-07-2025","3");
INSERT INTO `inscripciones` VALUES("84","42","14","2025-2026","11","29-07-2025","3");
INSERT INTO `inscripciones` VALUES("85","43","15","2025-2026","11","29-07-2025","5");
INSERT INTO `inscripciones` VALUES("86","43","1","2025-2026","11","29-07-2025","5");
INSERT INTO `inscripciones` VALUES("87","44","2","2025-2026","11","29-07-2025","7");
INSERT INTO `inscripciones` VALUES("88","44","3","2025-2026","11","29-07-2025","7");
INSERT INTO `inscripciones` VALUES("89","45","4","2025-2026","11","29-07-2025","9");
INSERT INTO `inscripciones` VALUES("90","45","5","2025-2026","11","29-07-2025","9");
INSERT INTO `inscripciones` VALUES("91","46","6","2025-2026","11","29-07-2025","1");
INSERT INTO `inscripciones` VALUES("92","46","7","2025-2026","11","29-07-2025","1");
INSERT INTO `inscripciones` VALUES("93","47","8","2025-2026","11","29-07-2025","3");
INSERT INTO `inscripciones` VALUES("94","47","9","2025-2026","11","29-07-2025","3");
INSERT INTO `inscripciones` VALUES("95","48","10","2025-2026","11","29-07-2025","5");
INSERT INTO `inscripciones` VALUES("96","48","11","2025-2026","11","29-07-2025","5");
INSERT INTO `inscripciones` VALUES("97","49","12","2025-2026","11","29-07-2025","7");
INSERT INTO `inscripciones` VALUES("98","49","13","2025-2026","11","29-07-2025","7");
INSERT INTO `inscripciones` VALUES("99","50","14","2025-2026","11","29-07-2025","9");
INSERT INTO `inscripciones` VALUES("100","50","15","2025-2026","11","29-07-2025","9");
INSERT INTO `inscripciones` VALUES("101","51","16","2025-2026","1","29-07-2025","11");
INSERT INTO `inscripciones` VALUES("102","51","17","2025-2026","1","29-07-2025","11");
INSERT INTO `inscripciones` VALUES("103","52","18","2025-2026","1","29-07-2025","12");
INSERT INTO `inscripciones` VALUES("104","52","19","2025-2026","1","29-07-2025","12");
INSERT INTO `inscripciones` VALUES("105","53","20","2025-2026","1","29-07-2025","13");
INSERT INTO `inscripciones` VALUES("106","53","21","2025-2026","1","29-07-2025","13");
INSERT INTO `inscripciones` VALUES("107","54","22","2025-2026","1","29-07-2025","14");
INSERT INTO `inscripciones` VALUES("108","54","23","2025-2026","1","29-07-2025","14");
INSERT INTO `inscripciones` VALUES("109","55","24","2025-2026","1","29-07-2025","15");
INSERT INTO `inscripciones` VALUES("110","55","25","2025-2026","1","29-07-2025","15");
INSERT INTO `inscripciones` VALUES("111","56","16","2025-2026","1","29-07-2025","11");
INSERT INTO `inscripciones` VALUES("112","56","17","2025-2026","1","29-07-2025","11");
INSERT INTO `inscripciones` VALUES("113","57","18","2025-2026","1","29-07-2025","12");
INSERT INTO `inscripciones` VALUES("114","57","19","2025-2026","1","29-07-2025","12");
INSERT INTO `inscripciones` VALUES("115","58","20","2025-2026","1","29-07-2025","13");
INSERT INTO `inscripciones` VALUES("116","58","21","2025-2026","1","29-07-2025","13");
INSERT INTO `inscripciones` VALUES("117","59","22","2025-2026","1","29-07-2025","14");
INSERT INTO `inscripciones` VALUES("118","59","23","2025-2026","1","29-07-2025","14");
INSERT INTO `inscripciones` VALUES("119","60","24","2025-2026","1","29-07-2025","15");
INSERT INTO `inscripciones` VALUES("120","60","25","2025-2026","1","29-07-2025","15");
INSERT INTO `inscripciones` VALUES("121","61","16","2025-2026","2","29-07-2025","11");
INSERT INTO `inscripciones` VALUES("122","61","17","2025-2026","2","29-07-2025","11");
INSERT INTO `inscripciones` VALUES("123","62","18","2025-2026","2","29-07-2025","12");
INSERT INTO `inscripciones` VALUES("124","62","19","2025-2026","2","29-07-2025","12");
INSERT INTO `inscripciones` VALUES("125","63","20","2025-2026","2","29-07-2025","13");
INSERT INTO `inscripciones` VALUES("126","63","21","2025-2026","2","29-07-2025","13");
INSERT INTO `inscripciones` VALUES("127","64","22","2025-2026","2","29-07-2025","14");
INSERT INTO `inscripciones` VALUES("128","64","23","2025-2026","2","29-07-2025","14");
INSERT INTO `inscripciones` VALUES("129","65","24","2025-2026","2","29-07-2025","15");
INSERT INTO `inscripciones` VALUES("130","65","25","2025-2026","2","29-07-2025","15");
INSERT INTO `inscripciones` VALUES("131","66","16","2025-2026","2","29-07-2025","11");
INSERT INTO `inscripciones` VALUES("132","66","17","2025-2026","2","29-07-2025","11");
INSERT INTO `inscripciones` VALUES("133","67","18","2025-2026","2","29-07-2025","12");
INSERT INTO `inscripciones` VALUES("134","67","19","2025-2026","2","29-07-2025","12");
INSERT INTO `inscripciones` VALUES("135","68","20","2025-2026","2","29-07-2025","13");
INSERT INTO `inscripciones` VALUES("136","68","21","2025-2026","2","29-07-2025","13");
INSERT INTO `inscripciones` VALUES("137","69","22","2025-2026","2","29-07-2025","14");
INSERT INTO `inscripciones` VALUES("138","69","23","2025-2026","2","29-07-2025","14");
INSERT INTO `inscripciones` VALUES("139","70","24","2025-2026","2","29-07-2025","15");
INSERT INTO `inscripciones` VALUES("140","70","25","2025-2026","2","29-07-2025","15");
INSERT INTO `inscripciones` VALUES("141","71","16","2025-2026","3","29-07-2025","11");
INSERT INTO `inscripciones` VALUES("142","71","17","2025-2026","3","29-07-2025","11");
INSERT INTO `inscripciones` VALUES("143","72","18","2025-2026","3","29-07-2025","12");
INSERT INTO `inscripciones` VALUES("144","72","19","2025-2026","3","29-07-2025","12");
INSERT INTO `inscripciones` VALUES("145","73","20","2025-2026","3","29-07-2025","13");
INSERT INTO `inscripciones` VALUES("146","73","21","2025-2026","3","29-07-2025","13");
INSERT INTO `inscripciones` VALUES("147","74","22","2025-2026","3","29-07-2025","14");
INSERT INTO `inscripciones` VALUES("148","74","23","2025-2026","3","29-07-2025","14");
INSERT INTO `inscripciones` VALUES("149","75","24","2025-2026","3","29-07-2025","15");
INSERT INTO `inscripciones` VALUES("150","75","25","2025-2026","3","29-07-2025","15");
INSERT INTO `inscripciones` VALUES("151","76","16","2025-2026","3","29-07-2025","11");
INSERT INTO `inscripciones` VALUES("152","76","17","2025-2026","3","29-07-2025","11");
INSERT INTO `inscripciones` VALUES("153","77","18","2025-2026","3","29-07-2025","12");
INSERT INTO `inscripciones` VALUES("154","77","19","2025-2026","3","29-07-2025","12");
INSERT INTO `inscripciones` VALUES("155","78","20","2025-2026","3","29-07-2025","13");
INSERT INTO `inscripciones` VALUES("156","78","21","2025-2026","3","29-07-2025","13");
INSERT INTO `inscripciones` VALUES("157","79","22","2025-2026","3","29-07-2025","14");
INSERT INTO `inscripciones` VALUES("158","79","23","2025-2026","3","29-07-2025","14");
INSERT INTO `inscripciones` VALUES("159","80","24","2025-2026","3","29-07-2025","15");
INSERT INTO `inscripciones` VALUES("160","80","25","2025-2026","3","29-07-2025","15");
INSERT INTO `inscripciones` VALUES("161","81","16","2025-2026","4","29-07-2025","11");
INSERT INTO `inscripciones` VALUES("162","81","17","2025-2026","4","29-07-2025","11");
INSERT INTO `inscripciones` VALUES("163","82","18","2025-2026","4","29-07-2025","12");
INSERT INTO `inscripciones` VALUES("164","82","19","2025-2026","4","29-07-2025","12");
INSERT INTO `inscripciones` VALUES("165","83","20","2025-2026","4","29-07-2025","13");
INSERT INTO `inscripciones` VALUES("166","83","21","2025-2026","4","29-07-2025","13");
INSERT INTO `inscripciones` VALUES("167","84","22","2025-2026","4","29-07-2025","14");
INSERT INTO `inscripciones` VALUES("168","84","23","2025-2026","4","29-07-2025","14");
INSERT INTO `inscripciones` VALUES("169","85","24","2025-2026","4","29-07-2025","15");
INSERT INTO `inscripciones` VALUES("170","85","25","2025-2026","4","29-07-2025","15");
INSERT INTO `inscripciones` VALUES("171","86","16","2025-2026","4","29-07-2025","11");
INSERT INTO `inscripciones` VALUES("172","86","17","2025-2026","4","29-07-2025","11");
INSERT INTO `inscripciones` VALUES("173","87","18","2025-2026","4","29-07-2025","12");
INSERT INTO `inscripciones` VALUES("174","87","19","2025-2026","4","29-07-2025","12");
INSERT INTO `inscripciones` VALUES("175","88","20","2025-2026","4","29-07-2025","13");
INSERT INTO `inscripciones` VALUES("176","88","21","2025-2026","4","29-07-2025","13");
INSERT INTO `inscripciones` VALUES("177","89","22","2025-2026","4","29-07-2025","14");
INSERT INTO `inscripciones` VALUES("178","89","23","2025-2026","4","29-07-2025","14");
INSERT INTO `inscripciones` VALUES("179","90","24","2025-2026","4","29-07-2025","15");
INSERT INTO `inscripciones` VALUES("180","90","25","2025-2026","4","29-07-2025","15");
INSERT INTO `inscripciones` VALUES("181","91","16","2025-2026","5","29-07-2025","11");
INSERT INTO `inscripciones` VALUES("182","91","17","2025-2026","5","29-07-2025","11");
INSERT INTO `inscripciones` VALUES("183","92","18","2025-2026","5","29-07-2025","12");
INSERT INTO `inscripciones` VALUES("184","92","19","2025-2026","5","29-07-2025","12");
INSERT INTO `inscripciones` VALUES("185","93","20","2025-2026","5","29-07-2025","13");
INSERT INTO `inscripciones` VALUES("186","93","21","2025-2026","5","29-07-2025","13");
INSERT INTO `inscripciones` VALUES("187","94","22","2025-2026","5","29-07-2025","14");
INSERT INTO `inscripciones` VALUES("188","94","23","2025-2026","5","29-07-2025","14");
INSERT INTO `inscripciones` VALUES("189","95","24","2025-2026","5","29-07-2025","15");
INSERT INTO `inscripciones` VALUES("190","95","25","2025-2026","5","29-07-2025","15");
INSERT INTO `inscripciones` VALUES("191","96","16","2025-2026","5","29-07-2025","11");
INSERT INTO `inscripciones` VALUES("192","96","17","2025-2026","5","29-07-2025","11");
INSERT INTO `inscripciones` VALUES("193","97","18","2025-2026","5","29-07-2025","12");
INSERT INTO `inscripciones` VALUES("194","97","19","2025-2026","5","29-07-2025","12");
INSERT INTO `inscripciones` VALUES("195","98","20","2025-2026","5","29-07-2025","13");
INSERT INTO `inscripciones` VALUES("196","98","21","2025-2026","5","29-07-2025","13");
INSERT INTO `inscripciones` VALUES("197","99","22","2025-2026","5","29-07-2025","14");
INSERT INTO `inscripciones` VALUES("198","99","23","2025-2026","5","29-07-2025","14");
INSERT INTO `inscripciones` VALUES("199","100","24","2025-2026","5","29-07-2025","15");
INSERT INTO `inscripciones` VALUES("200","100","25","2025-2026","5","29-07-2025","15");
INSERT INTO `inscripciones` VALUES("201","101","16","2025-2026","6","29-07-2025","11");
INSERT INTO `inscripciones` VALUES("202","101","17","2025-2026","6","29-07-2025","11");
INSERT INTO `inscripciones` VALUES("203","102","18","2025-2026","6","29-07-2025","12");
INSERT INTO `inscripciones` VALUES("204","102","19","2025-2026","6","29-07-2025","12");
INSERT INTO `inscripciones` VALUES("205","103","20","2025-2026","6","29-07-2025","13");
INSERT INTO `inscripciones` VALUES("206","103","21","2025-2026","6","29-07-2025","13");
INSERT INTO `inscripciones` VALUES("207","104","22","2025-2026","6","29-07-2025","14");
INSERT INTO `inscripciones` VALUES("208","104","23","2025-2026","6","29-07-2025","14");
INSERT INTO `inscripciones` VALUES("209","105","24","2025-2026","6","29-07-2025","15");
INSERT INTO `inscripciones` VALUES("210","105","25","2025-2026","6","29-07-2025","15");
INSERT INTO `inscripciones` VALUES("211","106","16","2025-2026","6","29-07-2025","11");
INSERT INTO `inscripciones` VALUES("212","106","17","2025-2026","6","29-07-2025","11");
INSERT INTO `inscripciones` VALUES("213","107","18","2025-2026","6","29-07-2025","12");
INSERT INTO `inscripciones` VALUES("214","107","19","2025-2026","6","29-07-2025","12");
INSERT INTO `inscripciones` VALUES("215","108","20","2025-2026","6","29-07-2025","13");
INSERT INTO `inscripciones` VALUES("216","108","21","2025-2026","6","29-07-2025","13");
INSERT INTO `inscripciones` VALUES("217","109","22","2025-2026","6","29-07-2025","14");
INSERT INTO `inscripciones` VALUES("218","109","23","2025-2026","6","29-07-2025","14");
INSERT INTO `inscripciones` VALUES("219","110","24","2025-2026","6","29-07-2025","15");
INSERT INTO `inscripciones` VALUES("220","110","25","2025-2026","6","29-07-2025","15");
INSERT INTO `inscripciones` VALUES("221","111","26","2025-2026","1","30-07-2025","16");
INSERT INTO `inscripciones` VALUES("222","111","27","2025-2026","1","30-07-2025","16");

DROP TABLE IF EXISTS `materias`;
CREATE TABLE `materias` (
  `id_materia` int(11) NOT NULL AUTO_INCREMENT,
  `nivel_materia` text NOT NULL,
  `nombre` varchar(35) NOT NULL,
  `id_estado` int(11) NOT NULL,
  PRIMARY KEY (`id_materia`),
  KEY `id_estado` (`id_estado`),
  CONSTRAINT `materias_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `materias_pendientes` VALUES("28","2","105","7","37","2025-2026","8.67","pendiente","30-07-2025",NULL);
INSERT INTO `materias_pendientes` VALUES("29","4","105","7","37","2025-2026","9.00","pendiente","30-07-2025",NULL);
INSERT INTO `materias_pendientes` VALUES("30","8","105","7","37","2025-2026","8.33","pendiente","30-07-2025",NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `profesor_grado` VALUES("70","43","7");
INSERT INTO `profesor_grado` VALUES("71","41","7");
INSERT INTO `profesor_grado` VALUES("72","39","7");
INSERT INTO `profesor_grado` VALUES("73","36","7");
INSERT INTO `profesor_grado` VALUES("74","38","7");
INSERT INTO `profesor_grado` VALUES("75","40","7");
INSERT INTO `profesor_grado` VALUES("76","37","7");
INSERT INTO `profesor_grado` VALUES("77","42","7");
INSERT INTO `profesor_grado` VALUES("78","47","1");
INSERT INTO `profesor_grado` VALUES("79","46","1");
INSERT INTO `profesor_grado` VALUES("80","48","1");
INSERT INTO `profesor_grado` VALUES("81","51","2");
INSERT INTO `profesor_grado` VALUES("82","52","3");
INSERT INTO `profesor_grado` VALUES("83","50","4");
INSERT INTO `profesor_grado` VALUES("84","54","5");
INSERT INTO `profesor_grado` VALUES("85","53","6");
INSERT INTO `profesor_grado` VALUES("86","43","8");
INSERT INTO `profesor_grado` VALUES("87","41","8");
INSERT INTO `profesor_grado` VALUES("88","39","8");
INSERT INTO `profesor_grado` VALUES("89","36","8");
INSERT INTO `profesor_grado` VALUES("90","38","8");
INSERT INTO `profesor_grado` VALUES("91","40","8");
INSERT INTO `profesor_grado` VALUES("92","37","8");
INSERT INTO `profesor_grado` VALUES("93","42","8");
INSERT INTO `profesor_grado` VALUES("94","43","9");
INSERT INTO `profesor_grado` VALUES("95","41","9");
INSERT INTO `profesor_grado` VALUES("96","39","9");
INSERT INTO `profesor_grado` VALUES("97","36","9");
INSERT INTO `profesor_grado` VALUES("98","38","9");
INSERT INTO `profesor_grado` VALUES("99","40","9");
INSERT INTO `profesor_grado` VALUES("100","37","9");
INSERT INTO `profesor_grado` VALUES("101","42","9");
INSERT INTO `profesor_grado` VALUES("102","48","2");

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
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `profesor_materia_grado` VALUES("13","36","107","7");
INSERT INTO `profesor_materia_grado` VALUES("50","36","107","8");
INSERT INTO `profesor_materia_grado` VALUES("16","37","105","7");
INSERT INTO `profesor_materia_grado` VALUES("53","37","105","8");
INSERT INTO `profesor_materia_grado` VALUES("14","38","108","7");
INSERT INTO `profesor_materia_grado` VALUES("51","38","108","8");
INSERT INTO `profesor_materia_grado` VALUES("12","39","104","7");
INSERT INTO `profesor_materia_grado` VALUES("49","39","104","8");
INSERT INTO `profesor_materia_grado` VALUES("15","40","102","7");
INSERT INTO `profesor_materia_grado` VALUES("52","40","108","8");
INSERT INTO `profesor_materia_grado` VALUES("11","41","106","7");
INSERT INTO `profesor_materia_grado` VALUES("48","41","106","8");
INSERT INTO `profesor_materia_grado` VALUES("18","42","100","7");
INSERT INTO `profesor_materia_grado` VALUES("19","42","101","7");
INSERT INTO `profesor_materia_grado` VALUES("17","42","103","7");
INSERT INTO `profesor_materia_grado` VALUES("54","42","103","8");
INSERT INTO `profesor_materia_grado` VALUES("10","43","99","7");
INSERT INTO `profesor_materia_grado` VALUES("47","43","99","8");
INSERT INTO `profesor_materia_grado` VALUES("22","47","111","1");
INSERT INTO `profesor_materia_grado` VALUES("23","47","112","1");
INSERT INTO `profesor_materia_grado` VALUES("21","47","113","1");
INSERT INTO `profesor_materia_grado` VALUES("20","47","114","1");
INSERT INTO `profesor_materia_grado` VALUES("24","47","115","1");
INSERT INTO `profesor_materia_grado` VALUES("25","47","116","1");
INSERT INTO `profesor_materia_grado` VALUES("55","48","112","2");
INSERT INTO `profesor_materia_grado` VALUES("28","48","116","1");
INSERT INTO `profesor_materia_grado` VALUES("43","50","111","4");
INSERT INTO `profesor_materia_grado` VALUES("44","50","112","4");
INSERT INTO `profesor_materia_grado` VALUES("42","50","113","4");
INSERT INTO `profesor_materia_grado` VALUES("41","50","114","4");
INSERT INTO `profesor_materia_grado` VALUES("45","50","115","4");
INSERT INTO `profesor_materia_grado` VALUES("46","50","116","4");
INSERT INTO `profesor_materia_grado` VALUES("31","51","111","2");
INSERT INTO `profesor_materia_grado` VALUES("32","51","112","2");
INSERT INTO `profesor_materia_grado` VALUES("30","51","113","2");
INSERT INTO `profesor_materia_grado` VALUES("29","51","114","2");
INSERT INTO `profesor_materia_grado` VALUES("33","51","115","2");
INSERT INTO `profesor_materia_grado` VALUES("34","51","116","2");
INSERT INTO `profesor_materia_grado` VALUES("37","52","111","3");
INSERT INTO `profesor_materia_grado` VALUES("38","52","112","3");
INSERT INTO `profesor_materia_grado` VALUES("36","52","113","3");
INSERT INTO `profesor_materia_grado` VALUES("35","52","114","3");
INSERT INTO `profesor_materia_grado` VALUES("39","52","115","3");
INSERT INTO `profesor_materia_grado` VALUES("40","52","116","3");

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
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
INSERT INTO `profesores` VALUES("48","V1452424","Alejandro Marquina","Primaria","04141255631","2");
INSERT INTO `profesores` VALUES("50","V85141441","Miranda Sarate","Primaria","04121452141","2");
INSERT INTO `profesores` VALUES("51","V7888541","Yovanna Sofia","Primaria","04122422214","2");
INSERT INTO `profesores` VALUES("52","V74441221","Angelica Benavides","Primaria","04121452144","2");
INSERT INTO `profesores` VALUES("53","V17854111","Benjamin Mendoza","Primaria","04121425114","2");
INSERT INTO `profesores` VALUES("54","V5266664","Alfredo Serrano","Primaria","04144145114","2");

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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `representantes` VALUES("1","V12345678","madre","María","González","26/02/1999","maria.gonzalez@email.com","Av. Principal #123","04141234567","Universitario","Ingeniero","Sí","Tech Solutions","04245551231","Zona Industrial");
INSERT INTO `representantes` VALUES("2","V23456789","padre","Carlos","Pérez","26/02/1999","carlos.perez@email.com","Calle 2 #45-67","04142345678","Universitario","Médico","Sí","Hospital Central","04245551231","Centro Médico");
INSERT INTO `representantes` VALUES("3","V34567890","madre","Ana","Rodríguez","12/08/1991","ana.rodriguez@email.com","Urbanización Las Flores","04143456789","Técnico Superior","Docente","Sí","Escuela Básica","04248895511","Sector Educativo");
INSERT INTO `representantes` VALUES("4","V45678901","padre","Luis","Martínez","12/08/1991","luis.martinez@email.com","Residencias El Paraíso","04144567890","Universitario","Abogado","Sí","Bufete Legal","04248895511","Centro Ciudad");
INSERT INTO `representantes` VALUES("5","V56789012","madre","Patricia","López","12/08/1991","patricia.lopez@email.com","Calle 5 #12-34","04145678901","Bachiller","Comerciante","Sí","Tienda Patricia","04126695511","Local Comercial");
INSERT INTO `representantes` VALUES("6","V67890123","padre","Jorge","Hernández","10/02/1986","jorge.hernandez@email.com","Av. Bolívar #78","04146789012","Técnico Medio","Mecánico","Sí","Taller Automotriz","04126695511","Zona Industrial");
INSERT INTO `representantes` VALUES("7","V78901234","madre","Carmen","Díaz","10/02/1986","carmen.diaz@email.com","Urbanización Los Pinos","04147890123","Universitario","Arquitecto","Sí","Constructora Díaz","04126695511","Oficina Central");
INSERT INTO `representantes` VALUES("8","V89012345","padre","Pedro","García","10/02/1986","pedro.garcia@email.com","Calle 8 #23-45","04148901234","Universitario","Ingeniero","Sí","Empresa Tecnológica","04261485241","Parque Tecnológico");
INSERT INTO `representantes` VALUES("9","V90123456","madre","Laura","Fernández","21/05/1994","laura.fernandez@email.com","Residencias El Recreo","04149012345","Técnico Superior","Enfermera","Sí","Clínica Santa María","04261485241","Sector Salud");
INSERT INTO `representantes` VALUES("10","V01234567","padre","Ricardo","Sánchez","21/05/1994","ricardo.sanchez@email.com","Av. Libertador #56","04140123456","Universitario","Economista","Sí","Banco Nacional","04165219854","Centro Financiero");
INSERT INTO `representantes` VALUES("11","V11223344","madre","Isabel","Ramírez","21/05/1994","isabel.ramirez@email.com","Calle 10 #11-12","04141122334","Universitario","Psicólogo","Sí","Consultorio Psicológico","04165219854","Centro Ciudad");
INSERT INTO `representantes` VALUES("12","V22334455","padre","Fernando","Torres","17/06/1993","fernando.torres@email.com","Urbanización Brisas","04142233445","Técnico Superior","Electricista","Sí","Servicios Eléctricos","04165219854","Zona Industrial");
INSERT INTO `representantes` VALUES("13","V33445566","madre","Gabriela","Mendoza","17/06/1993","gabriela.mendoza@email.com","Av. Principal #200","04143344556","Bachiller","Ama de Casa","No",NULL,NULL,NULL);
INSERT INTO `representantes` VALUES("14","V44556677","padre","Roberto","Vargas","17/06/1993","roberto.vargas@email.com","Calle 15 #33-44","04144455667","Universitario","Contador","Sí","Auditoría Vargas","04126938541","Centro Financiero");
INSERT INTO `representantes` VALUES("15","V55667788","madre","Sofía","Castro","17/06/1993","sofia.castro@email.com","Residencias Altamira","04145566778","Universitario","Diseñador Gráfico","Sí","Agencia Creativa","04241115268","Zona Creativa");
INSERT INTO `representantes` VALUES("16","V12121212","madre","Rosa","Blanco","01/07/1965","rosa.blanco@email.com","Av. Las Acacias #45","04141212121","Universitario","Psicólogo","Si","Centro Psicológico","04145214521","Centro Ciudad");
INSERT INTO `representantes` VALUES("17","V13131313","padre","Alberto","Morales","02/09/1986","alberto.morales@email.com","Calle 13 #13-13","04141313131","Técnico Superior","Electricista","Si","ElectroSol","04248965213","Zona Industrial");
INSERT INTO `representantes` VALUES("18","V14141414","madre","Gladys","Rivas","01/09/1991","gladys.rivas@email.com","Urbanización Los Mangos","04141414141","Bachiller","Ama de Casa","No",NULL,NULL,NULL);
INSERT INTO `representantes` VALUES("19","V15151515","padre","Francisco","Gómez","04/06/1985","francisco.gomez@email.com","Av. Intercomunal #78","04141515151","Universitario","Contador","Si","Auditoría Gómez","04248541451","Centro Financiero");
INSERT INTO `representantes` VALUES("20","V16161616","madre","Beatriz","Suárez","05/12/1978","beatriz.suarez@email.com","Residencias El Bosque","04141616161","Universitario","Diseñador","Si","Creativos SA","04268214511","Zona Creativa");
INSERT INTO `representantes` VALUES("21","V17171717","padre","Oswaldo","Paredes","04/07/1992","oswaldo.paredes@email.com","Calle 17 #17-17","04141717171","Técnico Medio","Mecánico","Si","Taller Paredes","04125241254","Zona Industrial");
INSERT INTO `representantes` VALUES("22","V18181818","madre","Teresa","Quintero","08/08/1995","teresa.quintero@email.com","Urbanización Los Robles","04141818181","Universitario","Enfermera","Si","Clínica San José","04167452145","Sector Salud");
INSERT INTO `representantes` VALUES("23","V19191919","padre","Gregorio","Mendoza","04/06/1999","gregorio.mendoza@email.com","Av. Bolívar #191","04141919191","Universitario","Ingeniero","Si","Ingeniería Mendoza","04245558411","Parque Industrial");
INSERT INTO `representantes` VALUES("24","V20202020","madre","Luisa","Campos","15/12/1988","luisa.campos@email.com","Calle 20 #20-20","04142020202","Técnico Superior","Docente","Si","Escuela Básica","04242020201","Sector Educativo");
INSERT INTO `representantes` VALUES("25","V21212121","padre","Humberto","Núñez","12/12/1995","humberto.nunez@email.com","Residencias El Jardín","04142121212","Universitario","Abogado","Si","Bufete Núñez","0412212121","Centro Ciudad");
INSERT INTO `representantes` VALUES("26","V12121101","madre","Sofia","Vergara","18/06/1996","sofia@gmail.com","Zona Norte","04241585211","Bachillerato","Ninguna aún","No","","","");
INSERT INTO `representantes` VALUES("27","V78121414","padre","Tobias","Mendoza","14/06/1995","tobias@gmail.com","Zona Norte","04241156221","Bachillerato","Ninguna activa","Sí","Mi super Barquisimeto","04241244211","Barquisimeto");

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
