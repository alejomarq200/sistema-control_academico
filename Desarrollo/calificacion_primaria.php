<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo Calificaciones: Primaria</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/regCalificacionPrimaria.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Bundle JS (incluye Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <!-- DIV PARA TRABAJAR CON EL MENÚ Y EL FORMULARIO RESPECTIVO  -->
    <div class="wrapper">
        <?php
        error_reporting(0);
        session_start();
        include("menu.php");
        ?>
        <!-- CUERPO DEL HTML ESPACIO PARA TRABAJAR YA INCLUIDA LA BARRA  -->
        <div class="main p-3">
            <div class="text-center">
                <?php
                include("../Layout/mensajes.php");
                /* CUERPO DEL MENÚ */
                ?>
                <main class="student-module">
                    <!-- Sección de Información de la Institución -->
                    <section class="institution-info">
                        <h2><i class="fas fa-school"></i>UNIDAD EDUCATIVA COLEGIO “PRADO DEL NORTE”	</h2>
                        <div class="info-grid">
                            <div class="info-item">
                                <i class="fas fa-id-card"></i>
                                <span>Cód.DEA: PD00361303</span>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>AV. INTERCOMUNAL TAMACA EL CUJI KM. 08 VÍA DUACA</span>
                            </div>
                          
                            <div class="info-item">
                                <i class="fas fa-phone"></i>
                                <span>0251-8145640</span>
                            </div>
                        </div>
                    </section>
                    <!-- Filtros de Búsqueda -->
                    <form action method="POST" id="infoEstudiante">
                        <section class="search-filters">
                            <div class="search-bar">
                                <input type="text" placeholder="Buscar estudiante..." class="search-input"
                                    name="busquedaEstudiante">

                                <input type="text" class="filter-input" placeholder="Año escolar" id="anio_escolar"
                                    style="margin-left: 15px; text-align:center;outline:none;" name="anio_escolar"
                                    readonly>
                                <input type="hidden" id="selectLapso" name="selectLapso"
                                    value="<?php echo $_POST['lapso']; ?>" required>
                                     <input type="hidden" id="tcontent" name="tcontent"
                                    value="<?php echo $_POST['tipocontenido']; ?>">
                            </div>
                            <div class="filter-inputs">
                                <select class="filter-input" id="categoriaGrado" name="categoriaGrado"
                                    onchange="buscarGradodeMaterias()" required>
                                    <option>Nivel</option>
                                    <option value="Primaria">Primaria</option>
                                </select>
                                <select class="filter-input" name="nombreGrado" id="nombreGrado"
                                    onchange="cargarSelectMateriasxProfesor()" required>
                                    <option value>Grados</option>
                                </select>
                                <select class="filter-input" id="lapso" name="lapso">
                                    <option value="Lapso Único" selected>Lapso Único</option>
                                </select>
                                <select class="filter-input" name="docente" id="docente"
                                    onchange="cargarProfesorxGrado()" required>
                                    <option value>Docente</option>
                                </select>
                                <select class="filter-input" id="materias" name="materias"
                                    onchange="buscarActividadxAsignatura()" required>
                                    <option value=>Asignaturas</option>
                                </select>
                                <input type="hidden" name="tipocontenido" id="tipocontenido" readonly>
                                <button class="filter-btn">Filtrar</button>
                            </div>
                            <div class="search-bar" style="margin-top: 15px;">
                                <select class="search-input" name="contenidos" id="contenidos" required>
                                    <option value="Seleccionar">Contenido</option>
                                </select>
                            </div>
                        </section>
                    </form>
                    <!-- Tabla de Estudiantes -->
                    <section class="student-table">
                        <?php
                        include("../Configuration/Configuration.php");
                        include("../Configuration/functions_php/functionsCRUDEstudiantes.php");
                        include("../Layout/modalesCalificaciones/modallDescargarC.php");
                        include("../Layout/modalesCalificaciones/modalEditarC.php");

                        $idGrado = $_POST['nombreGrado'] ?? null;
                        $lapso = $_POST['lapso'] ?? null;
                        $materia = $_POST['materias'] ?? null;
                        $docente = $_POST['docente'] ?? null;
                        $anioEscolar = $_POST['anio_escolar'] ?? null;
                        $busquedaEstudiante = $_POST['busquedaEstudiante'] ?? null;
                        $contenido = $_POST['contenidos'];

                        //función genérica para retornar valores específicos y sencillos
                        $nombreProfesor = obtenerValorUnico($pdo, 'profesores', 'nombre', 'id_profesor', $docente);
                        $nombreGrado = obtenerValorUnico($pdo, 'grados', 'id_grado', 'id', $idGrado);
                        $nombreMateria = obtenerValorUnico($pdo, 'materias', 'nombre', 'id_materia', $materia);
                        $descrpContenido = obtenerValorUnico($pdo, 'actividades', 'contenido', 'id_actividad', $contenido);
                        ?>
                        <div class="filtros-aplicados-inline">
                            <strong>Filtros aplicados:</strong>

                            <?php if ($busquedaEstudiante): ?>
                                <span class="filtro-tag">Búsqueda: <?= htmlspecialchars($busquedaEstudiante) ?></span>
                            <?php endif; ?>

                            <?php if ($$nombreGrado): ?>
                                <span class="filtro-tag">Grado: <?= htmlspecialchars($$nombreGrado) ?></span>
                            <?php endif; ?>

                            <?php if ($lapso): ?>
                                <span class="filtro-tag">Lapso: <?= htmlspecialchars($lapso) ?></span>
                            <?php endif; ?>

                            <?php if ($nombreMateria): ?>
                                <span class="filtro-tag">Materia: <?= htmlspecialchars($nombreMateria) ?></span>
                            <?php endif; ?>

                            <?php if ($nombreProfesor): ?>
                                <span class="filtro-tag">Docente: <?= htmlspecialchars($nombreProfesor) ?></span>
                            <?php endif; ?>

                            <?php if ($anioEscolar): ?>
                                <span class="filtro-tag">Año escolar: <?= htmlspecialchars($anioEscolar) ?></span>
                            <?php endif; ?>

                            <?php if ($descrpContenido): ?>
                                <span class="filtro-tag" id="contenido" data-valor="<?= htmlspecialchars($contenido) ?>">
                                    Contenidos: <?= htmlspecialchars($descrpContenido) ?>
                                </span>
                            <?php endif; ?>

                            <?php if (!$busquedaEstudiante && !$idGrado && !$lapso && !$materia && !$docente && !$anioEscolar && !$contenido): ?>
                                <span class="filtro-tag">Sin filtros aplicados.</span>
                            <?php endif; ?>
                        </div>
                        <div class="tabla-calificaciones-container">
                            <div class="table-responsive">
                                <table class="calificaciones-table" id="calificaciones-table">
                                    <thead>
                                        <tr>
                                            <th>Cédula Estudiante</th>
                                            <th>Nombre Estudiante</th>
                                            <th>Apellido Estudiante</th>
                                            <th colspan="4">Calificación</th>
                                            <!-- colspan="4" para abarcar las 4 subcolumnas -->
                                            <th class="acciones-col">Acciones</th>
                                        </tr>
                                        <tr>
                                            <th colspan="3"></th> <!-- Celdas vacías para las primeras 3 columnas -->
                                            <th>EX</th>
                                            <th>MB</th>
                                            <th>B</th>
                                            <th>DM</th>
                                            <th></th> <!-- Celda vacía para acciones -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $idProfesor = $_POST['docente'] ?? null;
                                        $idMateria = $_POST['materias'] ?? null;
                                        $idGrado = $_POST['nombreGrado'] ?? null;

                                        if ($idProfesor && $idMateria && $idGrado) {

                                            $sql = "SELECT e.id, e.cedula_est, e.nombres_est, e.apellidos_est
                                            FROM estudiantes e
                                            JOIN profesor_materia_grado pmg ON pmg.id_grado = e.grado_est
                                            WHERE pmg.id_profesor = ?
                                            AND pmg.id_materia = ?
                                            AND pmg.id_grado = ?";

                                            $stmt = $pdo->prepare($sql);
                                            $stmt->execute([$idProfesor, $idMateria, $idGrado]);
                                            $estudiantes = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                            if ($estudiantes) {
                                                foreach ($estudiantes as $estudiante) {
                                                    ?>
                                                    <tr data-estudiante-id="<?= htmlspecialchars($estudiante['id']) ?>"
                                                        data-grado-id="<?= htmlspecialchars($idGrado) ?>"
                                                        data-materia-id="<?= htmlspecialchars($idMateria) ?>"
                                                        data-profesor-id="<?= htmlspecialchars($idProfesor) ?>">
                                                        <td><?= htmlspecialchars($estudiante['cedula_est']) ?></td>
                                                        <td><?= htmlspecialchars($estudiante['nombres_est']) ?></td>
                                                        <td><?= htmlspecialchars($estudiante['apellidos_est']) ?></td>
                                                        <td><input type="text" class="input-table nota-ex"
                                                                onblur="validarNota(this, 'EX')"
                                                                onkeyup="this.value = this.value.toUpperCase();" data-columna="EX">
                                                        </td>
                                                        <td><input type="text" class="input-table nota-mb"
                                                                onblur="validarNota(this, 'MB')"
                                                                onkeyup="this.value = this.value.toUpperCase();" data-columna="MB">
                                                        </td>
                                                        <td><input type="text" class="input-table nota-b"
                                                                onblur="validarNota(this, 'B')"
                                                                onkeyup="this.value = this.value.toUpperCase();" data-columna="B">
                                                        </td>
                                                        <td><input type="text" class="input-table nota-dm"
                                                                onblur="validarNota(this, 'DM')"
                                                                onkeyup="this.value = this.value.toUpperCase();" data-columna="DM">
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-success btn-guardar">
                                                                <i class="bi bi-save"></i> Guardar
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            } else {
                                                echo "<tr><td colspan='5'>No se encontraron estudiantes para los filtros seleccionados.</td></tr>";
                                            }

                                        } else {
                                            echo "<tr><td colspan='5'>Por favor, selecciona profesor, materia y grado.</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </section>
            </div>
        </div>
        </main>
    </div>
    </div>
    </div>
</body>
<script>
    document.getElementById("infoEstudiante").addEventListener("submit", function (event) {
        event.preventDefault();

        // Array con todos los campos a validar
        const campos = [
            { id: 'categoriaGrado', nombre: 'Nivel' },
            { id: 'nombreGrado', nombre: 'Grado' },
            { id: 'docente', nombre: 'Docente' },
            { id: 'materias', nombre: 'Asignatura' },
            { id: 'contenidos', nombre: 'Contenido' }
        ];

        let camposInvalidos = [];
        let primerCampoInvalido = null;

        // Validar cada campo
        campos.forEach(campo => {
            const elemento = document.getElementById(campo.id);
            const valor = elemento ? elemento.value.trim() : '';

            if (!valor || valor === "Seleccionar") {
                camposInvalidos.push(campo.nombre);

                // Resaltar campo inválido
                elemento.style.borderColor = '#ff9800';
                elemento.style.boxShadow = '0 0 0 2px rgba(255, 152, 0, 0.2)';

                // Guardar el primer campo inválido para enfocarlo
                if (!primerCampoInvalido) {
                    primerCampoInvalido = elemento;
                }
            } else {
                // Restablecer estilos si es válido
                elemento.style.borderColor = '';
                elemento.style.boxShadow = '';
            }
        });

        // Si hay campos inválidos
        if (camposInvalidos.length > 0) {
            if (primerCampoInvalido) {
                primerCampoInvalido.focus();
            }

            Swal.fire({
                icon: 'warning',
                title: 'Campos requeridos',
                html: `Los siguientes campos son obligatorios:<br><br>- ${camposInvalidos.join('<br>- ')}`,
                confirmButtonColor: '#f0ad4e'
            });
            return false;
        }

        // Si todo está válido, enviar el formulario
        this.submit();
    });

    function validarNota(inputElement, valorPermitido) {
        const valorIngresado = inputElement.value.trim().toUpperCase();
        const fila = inputElement.closest('tr');
        const inputsFila = fila.querySelectorAll('.input-table');

        // Validación del valor permitido
        if (valorIngresado === valorPermitido) {
            inputElement.style.borderColor = "green";
            inputElement.setCustomValidity("");

            // Deshabilitar otros inputs si este tiene valor
            if (valorIngresado !== "") {
                inputsFila.forEach(input => {
                    if (input !== inputElement) {
                        input.disabled = true;
                        input.value = ""; // Limpiar otros campos
                        input.style.borderColor = ""; // Resetear borde
                    }
                });
            } else {
                // Si se borra, habilitar todos
                inputsFila.forEach(input => {
                    input.disabled = false;
                });
            }

            return true;
        } else if (valorIngresado === "") {
            // Si está vacío, habilitar todos
            inputsFila.forEach(input => {
                input.disabled = false;
                input.style.borderColor = "";
            });
            return false;
        } else {
            // Valor incorrecto
            inputElement.style.borderColor = "red";
            inputElement.setCustomValidity(`Solo se permite: ${valorPermitido}`);
            inputElement.reportValidity();
            return false;
        }
    }

    $(document).ready(function () {
        // Calcular y asignar el año escolar
        const añoActual = new Date().getFullYear();
        $('#anio_escolar').val(`${añoActual}-${añoActual + 1}`);

        $(document).on('click', '.btn-guardar', function () {
            const $tr = $(this).closest('tr');
            const $btn = $(this);
            //$btn.prop('disabled', true).html('<i class="bi bi-hourglass"></i> Procesando...');

            // Obtener datos de la fila
            const estudianteId = $tr.data('estudiante-id');
            const gradoId = $tr.data('grado-id');
            const materiaId = $tr.data('materia-id');
            const profesorId = $tr.data('profesor-id');
            const lapso = $('#selectLapso').val();
            const anioEscolar = $('#anio_escolar').val();
            const actividad = document.getElementById('contenido').dataset.valor;

            // Obtener la calificación seleccionada
            let calificacion = '';
            let columnaSeleccionada = '';

            // Asegurarse que sea un número
            if (!/^\d+$/.test(actividad)) {
                Swal.fire('Error', 'El contenido debe ser un número válido', 'error');
                return;
            }

            // Buscar qué input tiene valor en esta fila
            $tr.find('.input-table').each(function () {
                const valor = $(this).val().trim();
                if (valor !== '') {
                    calificacion = valor;
                    columnaSeleccionada = $(this).data('columna'); // EX, MB, B o DM
                }
            });

            // Validar que se haya seleccionado una calificación
            if (calificacion === '') {
                Swal.fire('Error', 'Debe seleccionar una calificación para el estudiante', 'error');
                $btn.prop('disabled', false).html('<i class="bi bi-save"></i> Guardar');
                return;
            }

            // Validar que la calificación coincida con la columna
            if (calificacion !== columnaSeleccionada) {
                Swal.fire('Error', `La calificación debe ser exactamente "${columnaSeleccionada}" para esta columna`, 'error');
                $btn.prop('disabled', false).html('<i class="bi bi-save"></i> Guardar');
                return;
            }

            // Verifica que el input existe y tiene valor
            const tipoContenidoInput = $('#tcontent');
            if (!tipoContenidoInput.length) {
                console.error('Input #tipoContenido no encontrado');
                return;
            }

            const tipoContenido = tipoContenidoInput.val();
            console.log('Valor de tipoContenido:', tipoContenido); // Verifica en consola

            // Preparar datos para enviar
            const datos = {
                estudiante_id: estudianteId,
                grado_id: gradoId,
                materia_id: materiaId,
                profesor_id: profesorId,
                lapso: lapso,
                anio_escolar: anioEscolar,
                calificacion: calificacion,
                actividad: actividad,
                tipoContenido: tipoContenido,
                accion: 'guardar_calificacion'
            };

            $.ajax({
                url: '../AJAX/AJAX_Calificaciones/guardarNota.php',
                type: 'POST',
                data: datos,
                dataType: 'json',
                success: function (response) {
                    if (response.type === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: response.message,
                            timer: 2000,
                            showConfirmButton: false
                        });
                        // Opcional: Limpiar campos después de guardar
                        $tr.find('.input-table').val('').prop('disabled', false).css('border-color', '');
                    }
                    else if (response.type === 'warning') {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Advertencia',
                            text: response.message,
                            showConfirmButton: true,
                            confirmButtonText: 'Entendido'
                        });
                    }
                    else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.message,
                            showConfirmButton: true
                        });
                    }
                },
                error: function (xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error de conexión',
                        text: 'No se pudo contactar al servidor: ' + xhr.statusText,
                        showConfirmButton: true
                    });
                }
            });
        });
    });


    function buscarGradodeMaterias() {
        const categoriaGrado = document.getElementById('categoriaGrado').value.trim();
        $.ajax({
            url: "../AJAX/AJAX_Grados/searchGradoxMateria.php",
            type: "POST",
            data: $("#infoEstudiante").serialize(),
            success: function (resultado) {
                $("#nombreGrado").html(resultado);
            },
            error: function (xhr, status, error) {
                console.error("Error en la solicitud AJAX:", error);
            }
        });
    }

    function cargarSelectMateriasxProfesor() {
        $.ajax({
            type: "POST",
            url: "../AJAX/AJAX_Calificaciones/consultarPrCalificacion.php",
            data: $("#infoEstudiante").serialize(),
            success: function (resultado) {
                $("#docente").html(resultado);
                cargarProfesorxGrado();
            },
            error: function (xhr, status, error) {
                console.error("Error en la solicitud AJAX:", error);
            }
        });
    }

    function cargarProfesorxGrado() {
        $.ajax({
            type: "POST",
            url: "../AJAX/AJAX_Calificaciones/consultarPrDocente.php",
            data: $("#infoEstudiante").serialize(),
            success: function (resultado) {
                $("#materias").html(resultado);
            },
            error: function (xhr, status, error) {
                console.error("Error en la solicitud AJAX:", error);
            }
        });
    }

    function buscarActividadxAsignatura() {
        $.ajax({
            url: "../AJAX/AJAX_Calificaciones/actividadxAsignatura.php",
            type: "POST",
            data: $("#infoEstudiante").serialize(),
            success: function (resultado) {
                $("#contenidos").html(resultado);
                buscarTipoContenidoxContenido();
            },
            error: function (xhr, status, error) {
                console.error("Error en la solicitud AJAX:", error);
            }
        });
    }

    function buscarTipoContenidoxContenido() {
        $(document).ready(function () {
            // Asumiendo que el evento se dispara al cambiar un select con id="contenidos"
            $('#contenidos').change(function () {
                var contenido = $(this).val();

                if (contenido) {
                    $.ajax({
                        url: '../AJAX/AJAX_Calificaciones/tipoContenidoxContenido.php', // Mismo archivo que contiene el código PHP
                        type: 'POST',
                        dataType: 'json',
                        data: { contenidos: contenido },
                        success: function (response) {
                            if (response.success) {
                                // Asigna el valor al input deseado
                                $('#tipocontenido').val(response.tipo_contenido);
                            } else {
                                console.log(response.message);
                                // Opcional: mostrar mensaje de error al usuario
                                alert(response.message);
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error("Error en la solicitud AJAX:", error);
                        }
                    });
                }
            });
        });
    }
</script>

</html>