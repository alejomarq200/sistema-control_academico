<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../css/calificacion_2.css">
    <title>Consultar Calificaciones</title>
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
                ?>
                <h1 class="my-3" id="titulo">Módulo de Calificaciones</h1>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <!-- Filtro con lupa (a la derecha) -->
                    <div class="filtro-container d-flex align-items-center">
                        <input type="text" id="txtFiltarr" class="filtro-input form-control" placeholder="Buscar...">
                        <span class="lupa-icon ms-2">&#128269;</span> <!-- Icono de lupa -->
                    </div>
                </div>
                <div class="contenedor-calificaciones">
                    <form action="../Desarrollo/calificacion_1.php" method="POST">
                        <input type="hidden" name="gradoCalificacion" id="gradoCalificacion"
                            value="<?php echo $_POST['gradoCalificacion'] ?>">
                        <button type="submit" class="back">Volver</button>
                    </form>
                </div>
                <div class="custom-table">
                    <?php
                    include("../Configuration/functions_php/functionsCRUDEstudiantes.php");
                    include("../Configuration/functions_php/functionsCRUDMaterias.php");
                    include("../Configuration/functions_php/functionsCRUDProfesor.php");
                    include("../Layout/modalesCalificaciones/modallDescargarC.php");
                    include("../Layout/modalesCalificaciones/modalEditarC.php");

                    // Obtener el ID del estudiante desde POST o GET
                    $idEstudiante = $_POST['idEstudiante'] ?? $_GET['idEstudiante'] ?? null;

                    // Obtener el ID del grado si es necesario
                    $idGrado = $_POST['gradoCalificacion'];

                    // Obtener las calificaciones
                    $datos = obtenerCalificacionesAgrupadas($pdo, $idEstudiante/* $idGrado*/);
                    $calificaciones = $datos['calificaciones'];
                    $maxCalifs = $datos['max_califs'];
                    function retornarNombreGrado($pdo, array $grado)
                    {
                        try {
                            // Verificar que el rol exista en el array del usuario
                            if (!isset($grado['id_grado'])) {
                                return 'IdGrado no definido';
                            }

                            $stmt = $pdo->prepare("SELECT id_grado FROM grados WHERE id = :id");
                            $stmt->bindValue(':id', $grado['id_grado']);
                            $stmt->execute();

                            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
                            return $resultado ? $resultado['id_grado'] : 'Grado no encontrado';
                        } catch (PDOException $e) {
                            error_log("Error en retornarNombreEst: " . $e->getMessage());
                            return 'Error al obtener rol';
                        }
                    }
                    ?>

                    <input type="hidden" name="idEstudiante" value="<?= htmlspecialchars($idEstudiante ?? '') ?>">
                    <div class="tabla-calificaciones-container">
                        <div class="table-responsive">
                            <table class="calificaciones-table" id="calificaciones-table">
                                <thead>
                                    <tr>
                                        <th>Año</th>
                                        <th>Grado</th>
                                        <th>Lapso</th>
                                        <th>Profesor</th>
                                        <th>Materia</th>
                                        <th>Estudiante</th>
                                        <?php for ($i = 1; $i <= $maxCalifs; $i++): ?>
                                            <th class="calificacion-header">C<?= $i ?></th>
                                        <?php endfor; ?>
                                        <th class="total-header">Total</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($calificaciones)): ?>
                                        <?php foreach ($calificaciones as $calif): ?>
                                            <tr>
                                                <td><?= $calif['año_escolar'] ?></td>
                                                <td><?= retornarNombreGrado($pdo, $calif); ?><input type="hidden" id="grado"
                                                        name="grado" value="<?= $calif['id_grado'] ?>"></td>
                                                <td><?= $calif['lapso_academico'] ?></td>
                                                <td class="profesor-cell">
                                                    <?= retornarNombreProfesor($pdo, $calif); ?>
                                                    <input type="hidden" id="profesor" name="profesor"
                                                        value="<?= $calif['id_profesor'] ?>">
                                                </td>
                                                <td class="materia-cell">
                                                    <?= $materia = retornarNombreMateria($pdo, $calif); ?>
                                                    <input type="hidden" name="materia" id="materia"
                                                        value="<?= $calif['id_materia'] ?>">
                                                </td>
                                                <td class="estudiante-cell">
                                                    <strong><?= $idEst = retornarNombreEstudiante($pdo, $calif); ?></strong>
                                                    <input type="hidden" id="idEstudante" name="idEstudiante"
                                                        value="<?= $calif['id_estudiante'] ?>">
                                                </td>
                                                <?php foreach ($calif['calificaciones'] as $nota): ?>
                                                    <td class="nota-cell <?= ($nota['valor'] < 10) ? 'nota-baja' : 'nota-alta' ?>">
                                                        <span data-id="<?= $nota['id'] ?>"><?= $nota['valor'] ?></span>
                                                    </td>
                                                <?php endforeach; ?>
                                                <?php for ($i = count($calif['calificaciones']); $i < $maxCalifs; $i++): ?>
                                                    <td class="nota-vacia">-</td>
                                                <?php endfor; ?>
                                                <td class="total-cell"><?= $calif['total_calificacion'] ?></td>
                                                <td class="acciones-cell">
                                                    <button class="btn-editar" data-est="<?= $calif['id_estudiante'] ?>"
                                                        data-mat="<?= $calif['id_materia'] ?>"
                                                        data-ids='<?= json_encode(array_column($calif["calificaciones"], "id")) ?>'
                                                        data-valores='<?= json_encode(array_column($calif["calificaciones"], "valor")) ?>'>
                                                        <i class="bi bi-pencil"></i> Editar
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr class="no-data-row">
                                            <td colspan="<?= 6 + $maxCalifs + 2 ?>">
                                                <div class="no-data-content">
                                                    <i class="bi bi-exclamation-circle-fill"></i>
                                                    <p>No hay calificaciones registradas</p>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="<?= 6 + $maxCalifs + 2 ?>">
                                            <div class="tfoot-content">
                                                <div style="display: flex; align-items: center; gap: 8px;">
                                                    <label for="contador" class="label-contador">Total de
                                                        registros:</label>
                                                    <input type="text" id="contador" class="input-contador" readonly>
                                                    <input type="hidden" id="total" class="input-contador" readonly>
                                                    <input type="hidden" name="totalMaterias" id="totalMaterias"
                                                        value="<?= materiasPorGrado($pdo, $idGrado); ?>">
                                                </div>
                                                <button class="btn-descargar" data-bs-toggle="modal"
                                                    data-bs-target="#formModalDescargarC">
                                                    <i class="bi bi-download"></i> Descargar Reporte</button>
                                                <button class="btn-promover" id="btn-promover"
                                                    onclick="mostrarAlerta(this)" disabled>
                                                    <i class="bi bi-box-arrow-in-up"></i>Promover estudiante</button>
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    </main>
                    <script src="../js/filtrarLupa.js"></script>
                    <script>
                        // Cambia el nombre de la función alert para evitar conflictos
                        contarFilasTbody();

                        compararValores();

                        function compararValores() {
                            const contador = parseInt(document.getElementById('contador').value.trim()) || 0;
                            const totalMaterias = parseInt(document.getElementById('totalMaterias').value.trim()) || 0;

                            const btnPromover = document.getElementById('btn-promover');
                            const total = document.getElementById('total').value = totalMaterias * 3;

                            /*if (total === contador) {
                              btnPromover.disabled = false;
                              alert("Botón habilitado");
                              
                              } else {
                              btnPromover.disabled = true;
                              alert("Botón inhabilitado");
                            
                              }*/
                             }
                        function contarFilasTbody() {
                            const tabla = document.getElementById('calificaciones-table');
                            const tbody = tabla.getElementsByTagName('tbody')[0];
                            const numeroFilasTbody = tbody.rows.length;
                            document.getElementById('contador').value = numeroFilasTbody;
                        }
                    </script>
                 </body>
               </div>
            </main>
