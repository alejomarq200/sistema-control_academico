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
    <link rel="stylesheet" href="../css/moduloInscripcion.css">

    <title>Inscripción</title>
</head>
<!-- DIV PARA TRABAJAR CON EL MENÚ Y EL FORMULARIO RESPECTIVO  -->
<div class="wrapper">
    <?php
    error_reporting(0);
    session_start();
    include("menu_1.php");
    ?>
    <!-- CUERPO DEL HTML ESPACIO PARA TRABAJAR YA INCLUIDA LA BARRA  -->
    <div class="main p-3">
        <div class="text-center">
            <?php
            include("../Layout/mensajes.php");
            ?>

            <body>
                <div class="formbold-main-wrapper">
                    <div class="formbold-form-wrapper">
                        <h1>Planilla de Inscripción</h1>
                        <form action="../controller_php/controller_FormInscripcion.php" method="POST" id="form">
                            <div class="formbold-steps">
                                <ul>
                                    <li class="formbold-step-menu1 active">
                                        <span>1</span>
                                        Inf. del Estudiante
                                    </li>
                                    <li class="formbold-step-menu2">
                                        <span>2</span>
                                        Inf. del Representante
                                    </li>
                                    <li class="formbold-step-menu3">
                                        <span>3</span>
                                        Inf. Pago
                                    </li>
                                </ul>
                            </div>

                            <!--INICIO DE LOS CAMPOS ESTUDIANTES-->
                            <div class="formbold-form-step-1 active">
                                <div class="mb-3">
                                    <label for="cantidad" class="formbold-form-label"></label>
                                    <span id="cantidad" class="formbold-form-label"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="anioEscolar" class="formbold-form-label">Año Escolar</label>
                                    <input type="text" class="formbold-form-input" id="anioEscolar" name="anioEscolar" readonly>
                                </div>
                                <div>
                                    <label for="cedulaEst" class="formbold-form-label">Cédula</label>
                                    <div class="checkDni">
                                        <input type="checkbox" name="checkDniEst" id="checkDniEst" class="form-DniEst"
                                            onchange="chequear(this, 'cedulaEst');" value="síDniEst">
                                        <input type="text" name="cedulaEst" id="cedulaEst" placeholder="Cedula del Estudiante"
                                            disabled />
                                    </div>
                                    <span id="cedulaEstFeedback" class="error"></span>
                                </div>
                                <div class="formbold-input-flex">
                                    <div>
                                        <label for="nombresEst" class="formbold-form-label"> Nombres
                                        </label>
                                        <input type="text" name="nombresEst" placeholder="Nombres" id="nombresEst"
                                            class="formbold-form-input" />
                                        <span id="nombresEstFeedback" class="error"></span>
                                    </div>
                                    <div>
                                        <label for="apellidosEst" class="formbold-form-label"> Apellidos
                                        </label>
                                        <input type="text" name="apellidosEst" placeholder="Apellidos" id="apellidosEst"
                                            class="formbold-form-input" />
                                        <span id="apellidosEstFeedback" class="error"></span>
                                    </div>
                                    <div>
                                        <label for="sexoEst" class="formbold-form-label"> Sexo
                                        </label>
                                        <select name="sexoEst" id="sexoEst" class="formbold-form-input">
                                            <option value="Seleccionar" selected>Seleccionar</option>
                                            <option value="M">M</option>
                                            <option value="F">F</option>
                                        </select>
                                        <span id="sexoEstFeedback" class="error"></span>
                                    </div>
                                </div>
                                <div class="formbold-input-flex">
                                    <div>
                                        <label for="f_nacimientoEst" class="formbold-form-label"> Fecha de nacimiento </label>
                                        <input type="text" name="f_nacimientoEst" id="f_nacimientoEst" title="Fecha de nacimiento" placeholder="dd/mm/YY"
                                            class="formbold-form-input" />
                                        <span id="f_nacimientoEstFeedback" class="error"></span>
                                    </div>
                                    <div>
                                        <label for="edadEst" class="formbold-form-label"> Edad
                                        </label>
                                        <input type="number" name="edadEst" placeholder="Edad" id="edadEst"
                                            class="formbold-form-input" />
                                        <span id="edadEstFeedback" class="error"></span>
                                    </div>
                                    <div>
                                        <label for="direccionEst" class="formbold-form-label"> Dirección
                                        </label>
                                        <input type="text" name="direccionEst" placeholder="Dirección" id="direccionEst"
                                            class="formbold-form-input" />
                                        <span id="direccionEstFeedback" class="error"></span>
                                    </div>
                                </div>
                                <div>
                                    <label for="lugarNacEst" class="formbold-form-label"> Lugar de Nacimiento
                                    </label>
                                    <input type="text" name="lugarNacEst" placeholder="Lugar de Nacimiento" id="lugarNacEst"
                                        class="formbold-form-input" />
                                    <span id="lugarNacEstFeedback" class="error"></span>
                                </div>
                                <h5>Datos de referencia Educativa</h5>
                                <div class="formbold-input-flex">
                                    <div>
                                        <label for="colegioAntEst" class="formbold-form-label"> Colegio Anterior
                                        </label>
                                        <input type="text" name="colegioAntEst" placeholder="Colegio Anterior" id="colegioAntEst"
                                            class="formbold-form-input" />
                                        <span id="colegioAntEstFeedback" class="error"></span>
                                    </div>
                                    <div>
                                        <label for="nivelacionEst" class="formbold-form-label"> Motivo de Retiro
                                        </label>
                                        <input type="text" name="motivoREst" placeholder="Motivo" id="motivoREst"
                                            class="formbold-form-input" />
                                        <span id="motivoREstFeedback" class="error"></span>
                                    </div>
                                </div>
                                <div class="formbold-input-flex">
                                    <div>
                                        <label for="nivelacionEst" class="formbold-form-label"> Nivelacion
                                        </label>
                                        <input type="text" name="nivelacionEst" placeholder="Nivelacion" id="nivelacionEst"
                                            class="formbold-form-input" />
                                        <span id="nivelacionEstFeedback" class="error"></span>
                                    </div>
                                    <div>
                                        <label for="explicacionEst" class="formbold-form-label"> Explicación
                                        </label>
                                        <input type="text" name="explicacionEst" placeholder="Explicación" id="explicacionEst"
                                            class="formbold-form-input" />
                                        <span id="explicacionEstFeedback" class="error"></span>
                                    </div>
                                </div>
                                <div class="formbold-input-flex">
                                    <div>
                                        <div>
                                            <label for="gradoEst" class="formbold-form-label">Grado a cursar</label>
                                            <select name="gradoEst" id="gradoEst" class="formbold-form-input" onchange="cargarAulas()">
                                                <option value="Seleccionar" selected>Seleccionar</option>
                                            </select>
                                            <span id="gradoEstFeedback" class="error"></span>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="turnoEst" class="formbold-form-label"> Turno
                                        </label>
                                        <select name="turnoEst" id="turnoEst" class="formbold-form-input">
                                            <option value="Seleccionar" selected>Seleccionar</option>
                                            <option value="Mañana">Mañana</option>
                                        </select>
                                        <span id="turnoEstFeedback" class="error"></span>
                                    </div>
                                </div>
                                <h5>Datos salud del Estudiante</h5>
                                <div class="formbold-input-flex">
                                    <div>
                                        <label for="problemasRespEst" class="formbold-form-label1"> Seleccione </label>
                                        <input type="checkbox" name="check" id="check" class="formbold-form-input1"
                                            value="siProblRespEst" onchange="chequear(this, 'problemasRespEst')">
                                    </div>
                                    <div>
                                        <label for="problemasRespEst" class="formbold-form-label">Problemas Respiratorios </label>
                                        <input type="text" name="problemasRespEst" id="problemasRespEst"
                                            placeholder="Problemas Respiratorios" class="formbold-form-input" disabled />
                                        <span id="problemasRespEstFeedback" class="error"></span>
                                    </div>
                                </div>
                                <div class="formbold-input-flex">
                                    <div>
                                        <label for="alergiasEst" class="formbold-form-label1"> Seleccione </label>
                                        <input type="checkbox" name="check1" id="check1" class="formbold-form-input1"
                                            onchange="chequear(this, 'alergiasEst')" value="siAlergEst">
                                    </div>
                                    <div>
                                        <label for="alergiasEst" class="formbold-form-label"> Alergias </label>
                                        <input type="text" name="alergiasEst" id="alergiasEst" placeholder="Alergias"
                                            class="formbold-form-input" disabled />
                                        <span id="alergiasEstFeedback" class="error"></span>
                                    </div>
                                </div>
                                <div class="formbold-input-flex">
                                    <div>
                                        <label for="vacunasEst" class="formbold-form-label">Control de Vacunas
                                        </label>
                                        <input type="text" name="vacunasEst" placeholder="Vacunas" id="vacunasEst"
                                            class="formbold-form-input" />
                                        <span id="vacunasEstFeedback" class="error"></span>
                                    </div>
                                    <div>
                                        <label for="enfermedadEst" class="formbold-form-label"> Enfermedad o Padecimiento
                                        </label>
                                        <input type="text" name="enfermedadEst" placeholder="Enfermedad o Padecimiento"
                                            id="enfermedadEst" class="formbold-form-input" />
                                        <span id="enfermedadEstFeedback" class="error"></span>
                                    </div>
                                </div>
                            </div>
                            <!--FIN DE LOS CAMPOS ESTUDIANTES-->

                            <!--INFORMACIÓN DEL REPRESENTANTE: MADRE -->

                            <div class="formbold-form-step-2">
                                <div>
                                    <label for="madreSi" class="labelCheck">Información de la
                                        Madre</label>
                                    <input type="checkbox" name="madreSi" id="madreSi" class="checkRepresentante"
                                        onchange="validar(this);" value="síM">
                                </div>
                                <div>
                                    <label for="cedulaM" class="formbold-form-label"> Cédula
                                    </label>
                                    <input type="text" name="cedulaM" placeholder="Cedula" id="cedulaM" class="formbold-form-inputM"
                                        disabled />
                                    <span id="cedulaMFeedback" class="error"></span>

                                </div>
                                <div class="formbold-input-flex">
                                    <div>
                                        <label for="nombresM" class="formbold-form-label"> Nombres
                                        </label>
                                        <input type="text" name="nombresM" placeholder="Nombres" id="nombresM"
                                            class="formbold-form-inputM" disabled />
                                        <span id="nombresMFeedback" class="error"></span>

                                    </div>
                                    <div>
                                        <label for="ApellidosM" class="formbold-form-label"> Apellidos
                                        </label>
                                        <input type="text" name="apellidosM" placeholder="Apellidos" id="apellidosM"
                                            class="formbold-form-inputM" disabled />
                                        <span id="apellidosMFeedback" class="error"></span>
                                    </div>
                                </div>

                                <div class="formbold-input-flex">
                                    <div>
                                        <label for="f_nacimientoM" class="formbold-form-label"> Fecha de
                                            nacimiento </label>
                                        <input type="text" name="f_nacimientoM" id="f_nacimientoM" placeholder="Fecha de nacimiento"
                                            class="formbold-form-inputM" disabled />
                                        <span id="f_nacimientoMFeedback" class="error"></span>

                                    </div>
                                    <div>
                                        <label for="emailM" class="formbold-form-label"> Correo
                                            Electrónico
                                        </label>
                                        <input type="email" name="emailM" placeholder="example@mail.com" id="emailM"
                                            class="formbold-form-inputM" disabled />
                                        <span id="emailMFeedback" class="error"></span>

                                    </div>
                                </div>
                                <div>
                                    <label for="direccionM" class="formbold-form-label"> Dirección
                                    </label>
                                    <input type="text" name="direccionM" id="direccionM" placeholder="Direccion"
                                        class="formbold-form-inputM" disabled />
                                    <span id="direccionMFeedback" class="error"></span>
                                </div>
                                <div>
                                    <label for="n_telefonoM" class="formbold-form-label"> Numero
                                        telefonico
                                    </label>
                                    <input type="text" name="n_telefonoM" id="n_telefonoM" placeholder="Numero telefonico"
                                        class="formbold-form-inputM" disabled />
                                    <span id="n_telefonoMFeedback" class="error"></span>
                                </div>
                                <h5>Datos de referencia Educativa</h5>
                                <div class="formbold-input-flex">
                                    <div>
                                        <label for="graoInstM" class="formbold-form-label"> Grado de instrucción </label>
                                        <input type="text" name="graoInstM" id="graoInstM" placeholder="Grado"
                                            class="formbold-form-inputM" disabled />
                                        <span id="graoInstMFeedback" class="error"></span>
                                    </div>
                                    <div>
                                        <label for="profesionM" class="formbold-form-label"> Profesión
                                        </label>
                                        <input type="text" name="profesionM" placeholder="Profesión" id="profesionM"
                                            class="formbold-form-inputM" disabled />
                                        <span id="profesionMFeedback" class="error"></span>
                                    </div>
                                    <div>
                                        <label for="trabajaM" class="formbold-form-label"> Trabaja </label>
                                        <select name="trabajaM" id="trabajaM" class="formbold-form-inputM" disabled
                                            onclick="validarTrabaja(this, 'nombreEmpresaM', 'tlfnEmepresaM', 'direccionEmpresaM')">
                                            <option value="Seleccionar" selected>Seleccionar</option>
                                            <option value="Sí">Sí</option>
                                            <option value="No">No</option>
                                        </select>
                                        <span id="trabajaMFeedback" class="error"></span>
                                    </div>
                                </div>
                                <h5>Datos de referencia Trabajo</h5>
                                <div class="formbold-input-flex">
                                    <div>
                                        <label for="nombreEmpresaM" class="formbold-form-label"> Nombre Empresa </label>
                                        <input type="text" name="nombreEmpresaM" id="nombreEmpresaM" placeholder="Empresa"
                                            class="formbold-form-inputM" disabled />
                                        <span id="nombreEmpresaMFeedback" class="error"></span>
                                    </div>
                                    <div>
                                        <label for="tlfnEmepresaM" class="formbold-form-label"> Teléfono Empresa
                                        </label>
                                        <input type="text" name="tlfnEmepresaM" placeholder="Teléfono" id="tlfnEmepresaM"
                                            class="formbold-form-inputM" disabled />
                                        <span id="tlfnEmepresaMFeedback" class="error"></span>
                                    </div>
                                    <div>
                                        <label for="direccionEmpresaM" class="formbold-form-label"> Dirección Empresa </label>
                                        <input type="text" name="direccionEmpresaM" placeholder="Dirección" id="direccionEmpresaM"
                                            class="formbold-form-inputM" disabled />
                                        <span id="direccionEmpresaMFeedback" class="error"></span>
                                    </div>
                                </div>
                                <!--INFORMACIÓN DEL REPRESENTANTE: PADRE -->

                                <div>
                                    <div>
                                        <label for="padreSi" class="labelCheck">Información del
                                            Padre</label>
                                        <input type="checkbox" name="padreSi" id="padreSi" class="checkRepresentante"
                                            onchange="validar(this);" value="síP">
                                    </div>
                                    <label for="cedulaP" class="formbold-form-label"> Cedula
                                    </label>
                                    <input type="text" name="cedulaP" placeholder="Cedula" id="cedulaP" class="formbold-form-inputP"
                                        disabled />
                                    <span id="cedulaPFeedback" class="error"></span>
                                </div>
                                <div class="formbold-input-flex">
                                    <div>
                                        <label for="nombresP" class="formbold-form-label"> Nombres
                                        </label>
                                        <input type="text" name="nombresP" placeholder="Nombres" id="nombresP"
                                            class="formbold-form-inputP" disabled />
                                        <span id="nombresPFeedback" class="error"></span>
                                    </div>
                                    <div>
                                        <label for="ApellidosP" class="formbold-form-label"> Apellidos
                                        </label>
                                        <input type="text" name="apellidosP" placeholder="Apellidos" id="apellidosP"
                                            class="formbold-form-inputP" disabled />
                                        <span id="apellidosPFeedback" class="error"></span>
                                    </div>
                                </div>

                                <div class="formbold-input-flex">
                                    <div>
                                        <label for="f_nacimientoP" class="formbold-form-label"> Fecha de
                                            nacimiento </label>
                                        <input type="text" name="f_nacimientoP" id="f_nacimientoP" placeholder="Fecha de nacimiento"
                                            class="formbold-form-inputP" disabled />
                                        <span id="f_nacimientoPFeedback" class="error"></span>
                                    </div>
                                    <div>
                                        <label for="emailP" class="formbold-form-label"> Correo
                                            Electronico
                                        </label>
                                        <input type="email" name="emailP" placeholder="example@mail.com" id="emailP"
                                            class="formbold-form-inputP" disabled />
                                        <span id="emailPFeedback" class="error"></span>
                                    </div>
                                </div>
                                <div>
                                    <label for="direccionP" class="formbold-form-label"> Direccion
                                    </label>
                                    <input type="text" name="direccionP" id="direccionP" placeholder="Direccion"
                                        class="formbold-form-inputP" disabled />
                                    <span id="direccionPFeedback" class="error"></span>
                                </div>
                                <div>
                                    <label for="n_telefonoP" class="formbold-form-label"> Numero
                                        telefonico
                                    </label>
                                    <input type="text" name="n_telefonoP" id="n_telefonoP" placeholder="Numero telefonico"
                                        class="formbold-form-inputP" disabled />
                                    <span id="n_telefonoPFeedback" class="error"></span>
                                </div>
                                <h5>Datos de referencia Educativa</h5>
                                <div class="formbold-input-flex">
                                    <div>
                                        <label for="graoInstP" class="formbold-form-label"> Grado de instrucción </label>
                                        <input type="text" name="graoInstP" id="graoInstP" placeholder="Grado"
                                            class="formbold-form-inputP" disabled />
                                        <span id="graoInstPFeedback" class="error"></span>
                                    </div>
                                    <div>
                                        <label for="profesionP" class="formbold-form-label"> Profesión
                                        </label>
                                        <input type="text" name="profesionP" placeholder="Profesión" id="profesionP"
                                            class="formbold-form-inputP" disabled />
                                        <span id="profesionPFeedback" class="error"></span>
                                    </div>
                                    <div>
                                        <label for="trabajaP" class="formbold-form-label"> Trabaja </label>
                                        <select name="trabajaP" id="trabajaP" class="formbold-form-inputP" disabled
                                            onclick="validarTrabaja(this, 'nombreEmpresaP', 'tlfnEmepresaP', 'direccionEmpresaP')">
                                            <option value="Seleccionar" selected>Seleccionar</option>
                                            <option value="Sí">Sí</option>
                                            <option value="No">No</option>
                                        </select>
                                        <span id="trabajaPFeedback" class="error"></span>
                                    </div>
                                </div>
                                <h5>Datos de referencia Trabajo</h5>
                                <div class="formbold-input-flex">
                                    <div>
                                        <label for="nombreEmpresaP" class="formbold-form-label"> Nombre Empresa </label>
                                        <input type="text" name="nombreEmpresaP" id="nombreEmpresaP" placeholder="Empresa"
                                            class="formbold-form-inputP" disabled />
                                        <span id="nombreEmpresaPFeedback" class="error"></span>
                                    </div>
                                    <div>
                                        <label for="tlfnEmepresaP" class="formbold-form-label"> Teléfono Empresa
                                        </label>
                                        <input type="text" name="tlfnEmepresaP" placeholder="Teléfono" id="tlfnEmepresaP"
                                            class="formbold-form-inputP" disabled />
                                        <span id="tlfnEmepresaPFeedback" class="error"></span>
                                    </div>
                                    <div>
                                        <label for="direccionEmpresaP" class="formbold-form-label"> Dirección Empresa </label>
                                        <input type="text" name="direccionEmpresaP" placeholder="Dirección" id="direccionEmpresaP"
                                            class="formbold-form-inputP" disabled />
                                        <span id="direccionEmpresaPFeedback" class="error"></span>
                                    </div>
                                </div>
                            </div>
                            <!--FIN DE LOS CAMPOS REPRESENTANES-->

                            <div class="formbold-form-step-3">
                                <div class="formbold-form-confirm">
                                    <h5>Conctacto y responsable del pago</h5>
                                    <input type="radio" name="representante" value="madre" id="representanteMadre"
                                        onclick="trabaja(event)">
                                    <label for="representanteMadre">Madre</label>

                                    <input type="radio" name="representante" value="padre" id="representantePadre"
                                        onclick="trabaja(event)">
                                    <label for="representantePadre">Padre</label>

                                    <input type="radio" name="representante" value="otro" id="representanteOtro"
                                        onclick="trabaja(event)" checked>
                                    <label for="representanteOtro">Otro</label>
                                    <div class="formbold-input-flex">
                                        <div>
                                            <label for="cedulaC" class="formbold-form-label"> Cédula contacto
                                            </label>
                                            <input type="text" name="cedulaC" placeholder="Cédula contacto" id="cedulaC"
                                                class="formbold-form-inputC" readonly />
                                            <span id="cedulaCFeedback" class="error"></span>
                                        </div>
                                        <div>
                                            <label for="nombresC" class="formbold-form-label"> Nombres contacto
                                            </label>
                                            <input type="text" name="nombresC" placeholder="Nombres contacto" id="nombresC"
                                                class="formbold-form-inputC" readonly />
                                            <span id="nombresCFeedback" class="error"></span>
                                        </div>
                                        <div>
                                            <label for="apellidosC" class="formbold-form-label"> Apellidos contacto
                                            </label>
                                            <input type="text" name="apellidosC" placeholder="Apellidos contacto" id="apellidosC"
                                                class="formbold-form-inputC" readonly />
                                            <span id="apellidosCFeedback" class="error"></span>
                                        </div>
                                    </div>
                                    <div class="formbold-input-flex">
                                        <div>
                                            <label for="direccionC" class="formbold-form-label"> Dirección contacto </label>
                                            <input type="text" name="direccionC" id="direccionC" placeholder="Dirección contacto"
                                                class="formbold-form-inputC" readonly />
                                            <span id="direccionCFeedback" class="error"></span>
                                        </div>
                                        <div>
                                            <label for="telefonoC" class="formbold-form-label"> Teléfono Contacto
                                            </label>
                                            <input type="number" name="telefonoC" placeholder="Teléfono" id="telefonoC"
                                                class="formbold-form-inputC" readonly />
                                            <span id="telefonoCFeedback" class="error"></span>
                                        </div>
                                        <div>
                                            <label for="correoC" class="formbold-form-label"> Correo contacto </label>
                                            <input type="email" name="correoC" id="correoC" placeholder="Correo contacto"
                                                class="formbold-form-inputC" readonly />
                                            <span id="correoCFeedback" class="error"></span>
                                        </div>
                                    </div>
                                    <h5>Datos de referencia Educativa</h5>
                                    <div class="formbold-input-flex">
                                        <div>
                                            <label for="graoInstC" class="formbold-form-label"> Grado de instrucción </label>
                                            <input type="text" name="graoInstC" id="graoInstC" placeholder="Grado"
                                                class="formbold-form-inputC" readonly />
                                            <span id="graoInstCFeedback" class="error"></span>
                                        </div>
                                        <div>
                                            <label for="profesionC" class="formbold-form-label"> Profesión
                                            </label>
                                            <input type="text" name="profesionC" placeholder="Profesión" id="profesionC"
                                                class="formbold-form-inputC" readonly />
                                            <span id="profesionCFeedback" class="error"></span>
                                        </div>
                                        <div>
                                            <label for="trabajaC" class="formbold-form-label"> Trabaja </label>
                                            <select name="trabajaC" id="trabajaC" class="formbold-form-inputC" readonly
                                                onclick="validarTrabaja(this, 'nombreEmpresaC', 'tlfnEmepresaC', 'direccionEmpresaC')">
                                                <option value="Sí">Sí</option>
                                                <option value="No">No</option>
                                            </select>
                                            <span id="trabajaCFeedback" class="error"></span>
                                        </div>
                                    </div>
                                </div>
                                <h5>Datos de referencia Trabajo</h5>
                                <div class="formbold-input-flex">
                                    <div>
                                        <label for="nombreEmpresaC" class="formbold-form-label"> Nombre Empresa </label>
                                        <input type="text" name="nombreEmpresaC" id="nombreEmpresaC" placeholder="Empresa"
                                            class="formbold-form-inputC" readonly />
                                        <span id="nombreEmpresaCFeedback" class="error"></span>
                                    </div>
                                    <div>
                                        <label for="tlfnEmepresaC" class="formbold-form-label"> Teléfono Empresa
                                        </label>
                                        <input type="text" name="tlfnEmepresaC" placeholder="Teléfono" id="tlfnEmepresaC"
                                            class="formbold-form-inputC" readonly />
                                        <span id="tlfnEmepresaCFeedback" class="error"></span>
                                    </div>
                                    <div>
                                        <label for="direccionEmpresaC" class="formbold-form-label"> Dirección Empresa </label>
                                        <input type="text" name="direccionEmpresaC" placeholder="Dirección" id="direccionEmpresaC"
                                            class="formbold-form-inputC" readonly />
                                        <span id="direccionEmpresaCFeedback" class="error"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="formbold-form-btn-wrapper">
                                <button class="formbold-back-btn">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_1675_1807)">
                                            <path
                                                d="M5.21863 7.33312L8.79463 3.75712L7.85196 2.81445L2.66663 7.99979L7.85196 13.1851L8.79463 12.2425L5.21863 8.66645H13.3333V7.33312H5.21863Z"
                                                fill="white" />
                                        </g>
                                        <defs>
                                            <clippath id="clip0_1675_1807">
                                                <rect width="16" height="16" fill="white" />
                                            </clippath>
                                        </defs>
                                    </svg>
                                    Volver
                                </button>
                                <button class="formbold-btn">
                                    Siguiente
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_1675_1807)">
                                            <path
                                                d="M10.7814 7.33312L7.20541 3.75712L8.14808 2.81445L13.3334 7.99979L8.14808 13.1851L7.20541 12.2425L10.7814 8.66645H2.66675V7.33312H10.7814Z"
                                                fill="white" />
                                        </g>
                                        <defs>
                                            <clippath id="clip0_1675_1807">
                                                <rect width="16" height="16" fill="white" />
                                            </clippath>
                                        </defs>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </body>
        </div>
    </div>
</div>

</html>
<script src="../js/validarInscripcion.js"></script>

</html>