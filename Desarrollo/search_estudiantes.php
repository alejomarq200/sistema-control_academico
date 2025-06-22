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
    <title>Consultar Estudiantes</title>
    <style>
        .filtro-container {
            position: relative;
            width: 100%;
            max-width: 300px;
            margin-bottom: 20px;
            margin-left: 55px;
        }

        .filtro-input {
            width: 100%;
            padding: 10px 40px 10px 15px;
            border: 1px solid #ccc;
            border-radius: 40px;
            font-size: 16px;
            outline: none;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .filtro-input:focus {
            border-color: #007bff;
            box-shadow: 0 2px 8px rgba(0, 123, 255, 0.3);
        }

        .lupa-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #777;
            pointer-events: none;
        }

        .custom-table-Estudiantes {
            margin: 0 auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            border: 1px solid #dee2e6;
            width: 100%;
        }

        .custom-table-Estudiantes thead {
            background-color: rgb(37, 64, 90);
            color: #fff;
        }

        .custom-table-Estudiantes th,
        .custom-table-Estudiantes td {
            padding: 2rem;
            vertical-align: middle;
            border-color: #dee2e6;
        }

        .custom-table-Estudiantes tbody tr {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .custom-table-Estudiantes tbody tr:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #f8f9fa;
        }

        .filters-container {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            margin: 2rem auto;
            max-width: 900px;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .filters-wrapper {
            display: flex;
            gap: 1.5rem;
            align-items: flex-end;
        }

        .filter-group {
            flex: 1;
            min-width: 200px;
        }

        .filter-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #495057;
            font-size: 0.9rem;
        }

        .filter-select {
            border-radius: 8px;
            border: 1px solid #ced4da;
            padding: 0.65rem 1rem;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.03);
        }

        .filter-select:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
            outline: none;
        }

        /* Efecto hover para los selects */
        .filter-select:hover {
            border-color: #adb5bd;
        }

        /* Iconos */
        .bi {
            margin-right: 8px;
            font-size: 1.1em;
            vertical-align: middle;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .filters-wrapper {
                flex-direction: column;
                gap: 1rem;
            }

            .filter-group {
                width: 100%;
            }
        }
    </style>
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

            <div class="d-flex justify-content-between align-items-center">
                <!-- Filtro con lupa (a la derecha) -->
                <div class="filtro-container d-flex align-items-center">
                    <input type="text" id="txtFiltarr" class="filtro-input form-control" placeholder="Buscar...">
                    <span class="lupa-icon ms-2">&#128269;</span> <!-- Icono de lupa -->
                </div>
            </div>
            <!-- CONTENEDOR CENTRADO CON ESTILOS MEJORADOS -->
            <div class="filters-container">
                <!-- FILTROS CON DISEÑO MODERNO -->
                <div class="filters-wrapper">
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
                            <th scope="col">Grado</th>
                            <th scope="col">Turno</th>
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
                                    <td data-grado-id="<?php echo $estudiante['grado_est']; ?>">
                                        <?php echo ($estudiante['id_grado']); ?>
                                    </td>
                                    <td><?php echo ($estudiante['turno_est']); ?></td>
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
                            echo "<tr><td colspan='8'>No se encontraron usuarios.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            </main>
        </div>
    </div>
    <script>
        const filtroGrado = document.getElementById('filtroGrado');
        const filtroGenero = document.getElementById('filtroGenero');
        const filas = document.querySelectorAll('#tablaEstudiantes tr');

        function filtrarTabla() {
            const gradoSeleccionado = filtroGrado.value.toLowerCase();
            const generoSeleccionado = filtroGenero.value.toLowerCase();

            filas.forEach(fila => {
                const grado = fila.querySelector('.grado')?.textContent.toLowerCase();
                const genero = fila.querySelector('.genero')?.textContent.toLowerCase();

                const coincideGrado = !gradoSeleccionado || grado === gradoSeleccionado;
                const coincideGenero = !generoSeleccionado || genero === generoSeleccionado;

                fila.style.display = (coincideGrado && coincideGenero) ? '' : 'none';
            });
        }

        filtroGrado.addEventListener('change', filtrarTabla);
        filtroGenero.addEventListener('change', filtrarTabla);
        function filtrarTabla() {
            const gradoSeleccionado = filtroGrado.value; // No usar toLowerCase()
            const generoSeleccionado = filtroGenero.value.toLowerCase();

            filas.forEach(fila => {
                // Obtener el ID del grado desde el data attribute
                const gradoId = fila.querySelector('td[data-grado-id]')?.getAttribute('data-grado-id');
                const genero = fila.querySelector('.genero')?.textContent.toLowerCase();

                const coincideGrado = !gradoSeleccionado || gradoId === gradoSeleccionado;
                const coincideGenero = !generoSeleccionado || genero === generoSeleccionado;

                fila.style.display = (coincideGrado && coincideGenero) ? '' : 'none';
            });
        }
    </script>

</html>