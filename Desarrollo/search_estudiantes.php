<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="../css/moduloEstudiantes.css">
    <title>Consultar Estudiantes</title>
</head>

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
            <h1 class="my-3" id="titulo">Módulo de Estudiantes</h1>
            <!-- CONTENEDOR CENTRADO CON ESTILOS MEJORADOS -->
            <div class="filters-container">
                <!-- FILTROS CON DISEÑO MODERNO -->
                <div class="filters-wrapper">
                    <div class="filtro-container d-flex align-items-center">
                        <input type="text" id="txtFiltarr" class="filtro-input form-control" placeholder="Buscar...">
                        <span class="lupa-icon ms-2">&#128269;</span> <!-- Icono de lupa -->
                    </div>
                    <!-- Filtro de Grado con estilo mejorado -->
                    <div class="filter-group">
                        <label for="filtroGrado" class="filter-label">
                            <i class="bi bi-book-half"></i> Grado Académico
                        </label>
                        <select id="filtroGrado" class="form-select filter-select">
                            <option value="">Todos los grados</option>
                            <option value="1">1er grado</option>
                            <option value="2">2do grado</option>
                            <option value="3">3er grado</option>
                            <option value="4">4to grado</option>
                            <option value="5">5to grado</option>
                            <option value="6">6to grado</option>
                            <option value="7">1er año</option>
                            <option value="8">2do año</option>
                            <option value="9">3er año</option>
                            <option value="10">4to año</option>
                            <option value="11">5to año</option>
                        </select>
                    </div>

                    <!-- Filtro de Género con estilo mejorado -->
                    <div class="filter-group">
                        <label for="filtroGenero" class="filter-label">
                            <i class="bi bi-gender-ambiguous"></i> Género
                        </label>
                        <select id="filtroGenero" class="form-select filter-select">
                            <option value="">Todos los géneros</option>
                            <option value="F">Femenino</option>
                            <option value="M">Masculino</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="custom-table-Estudiantes">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Cédula</th>
                            <th scope="col">Nombres</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Edad</th>
                            <th scope="col" class="grado" style="display:block">Grado</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tablaEstudiantes">
                        <?php
                        include("../Configuration/functions_php/functionsCRUDEstudiantes.php");
                        include("../Layout/modalesEstudiantes/modalEditEstudiante.php");
                        include("../Layout/modalesEstudiantes/modalVerEst.php");

                        $estudiantes = consultarEstudiantes($pdo); // Obtener los representantes
                        
                        if (!empty($estudiantes)) {
                            foreach ($estudiantes as $estudiante) { // Iterar sobre cada usuario
                                ?>
                                <tr>
                                    <td><?php echo ($estudiante['cedula_est'] == null ? "No aplica" : $estudiante['cedula_est']); ?>
                                    </td>
                                    <td><?php echo ($estudiante['nombres_est']); ?>
                                    <td><?php echo ($estudiante['apellidos_est']); ?></td>
                                    <td><?php echo ($estudiante['edad_est']); ?>
                                    <td class="grado1" style="display: block;"
                                        data-grado-id="<?php echo $estudiante['grado_est']; ?>">
                                        <?php echo ($estudiante['id_grado']); ?>
                                    </td>
                                    <td class="genero" style="display:none;"><?php echo $estudiante['sexo']; ?></td>
                                    <!-- Género oculto para filtro -->
                                    <td>
                                        <a href="#formModalEditEst" class="btn btn-dark" data-bs-toggle="modal"
                                            data-bs-target="#formModalEditEst" data-id="<?php echo $estudiante['id']; ?>"
                                            data-cedula_est="<?php echo $estudiante['cedula_est']; ?>"
                                            data-nombres_est="<?php echo $estudiante['nombres_est'] ?>"
                                            data-apellidos_est="<?php echo $estudiante['apellidos_est']; ?>"
                                            data-sexo="<?php echo $estudiante['sexo']; ?>"
                                            data-f_nacimiento_est="<?php echo $estudiante['f_nacimiento_est']; ?>"
                                            data-edad_est="<?php echo $estudiante['edad_est']; ?>"
                                            data-direccion_est="<?php echo $estudiante['direccion_est']; ?>"
                                            data-lugar_nac_est="<?php echo $estudiante['lugar_nac_est']; ?>"
                                            data-colegio_ant_est="<?php echo $estudiante['colegio_ant_est']; ?>"
                                            data-motivo_ret_est="<?php echo $estudiante['motivo_ret_est'] ?>"
                                            data-nivelacion_est="<?php echo $estudiante['nivelacion_est']; ?>"
                                            data-explicacion_est="<?php echo $estudiante['explicacion_est']; ?>"
                                            data-grado_est="<?php echo ($estudiante['id_grado']); ?>"
                                            data-turno_est="<?php echo $estudiante['turno_est']; ?>"
                                            data-problem_resp_est="<?php echo $estudiante['problem_resp_est']; ?>"
                                            data-alergias_est="<?php echo $estudiante['alergias_est']; ?>"
                                            data-vacunas_est="<?php echo $estudiante['vacunas_est']; ?>"
                                            data-enfermedad_est="<?php echo $estudiante['enfermedad_est']; ?>">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <button type="button" class="btn btn-danger">
                                            <i class="bi bi-download"></i>
                                        </button>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo "<tr><td colspan='8'>No se encontraron estudiantes.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            </main>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const filtroGrado = document.getElementById('filtroGrado');
            const filtroGenero = document.getElementById('filtroGenero');
            const filas = document.querySelectorAll('#tablaEstudiantes tr');
            const columnaGradoHeader = document.querySelector('th.grado');
            const columnasGrado = document.querySelectorAll('td.grado1');

            function aplicarFiltros() {
                const gradoSeleccionado = filtroGrado.value;
                const generoSeleccionado = filtroGenero.value.toLowerCase();

                // Solo recargar si ambos filtros están vacíos
                if (gradoSeleccionado === "" && generoSeleccionado === "") {
                    window.location.href = "search_estudiantes.php";
                    return;
                }

                // Control de visibilidad de columna grado
                if (gradoSeleccionado === "") {
                    // Mostrar columna grado si no hay filtro de grado
                    columnaGradoHeader.style.display = '';
                    columnasGrado.forEach(col => col.style.display = '');
                } else {
                    // Ocultar columna grado si hay filtro de grado
                    columnaGradoHeader.style.display = 'none';
                    columnasGrado.forEach(col => col.style.display = 'none');
                }

                // Aplicar filtros
                filas.forEach(fila => {
                    if (fila.cells.length <= 1) return; // Saltar filas especiales

                    const gradoId = fila.querySelector('.grado1')?.getAttribute('data-grado-id');
                    const genero = fila.querySelector('.genero')?.textContent.toLowerCase();

                    const coincideGrado = gradoSeleccionado === "" || gradoId === gradoSeleccionado;
                    const coincideGenero = generoSeleccionado === "" || genero === generoSeleccionado;

                    fila.style.display = (coincideGrado && coincideGenero) ? '' : 'none';
                });

                // Mostrar mensaje si no hay resultados
                const filasVisibles = Array.from(filas).some(fila =>
                    fila.style.display !== 'none' && fila.cells.length > 1
                );

                if (!filasVisibles) {
                    // Limpiar mensajes anteriores
                    document.querySelectorAll('#tablaEstudiantes tr.mensaje-no-resultados').forEach(el => el.remove());

                    const mensaje = document.createElement('tr');
                    mensaje.className = 'mensaje-no-resultados';
                    mensaje.innerHTML = '<td colspan="6">No se encontraron estudiantes con los filtros seleccionados.</td>';
                    document.getElementById('tablaEstudiantes').appendChild(mensaje);
                }
            }

            // Aplicar filtros al cambiar selección
            filtroGrado.addEventListener('change', aplicarFiltros);
            filtroGenero.addEventListener('change', aplicarFiltros);

            // Estado inicial
            if (filtroGrado.value === "" && filtroGenero.value === "") {
                columnaGradoHeader.style.display = '';
                columnasGrado.forEach(col => col.style.display = '');
            } else {
                aplicarFiltros(); // Aplicar filtros si hay valores al cargar
            }
        });


        document.getElementById('txtFiltarr').addEventListener('input', function () {
            const filtro = this.value.toLowerCase(); // Texto del filtro en minúsculas
            const filas = document.querySelectorAll('tbody tr'); // Todas las filas de la tabla

            filas.forEach(fila => {
                const textoFila = fila.textContent.toLowerCase(); // Texto de la fila en minúsculas
                if (textoFila.includes(filtro)) {
                    fila.style.display = ''; // Muestra la fila si coincide
                } else {
                    fila.style.display = 'none'; // Oculta la fila si no coincide
                }
            });
        });
    </script>

</html>