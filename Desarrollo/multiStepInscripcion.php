<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Inscripción</title>
    <!-- <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT"
      crossorigin="anonymous">-->
    <link rel="stylesheet" href="inscripcion.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <style>

    </style>
</head>

<body>
    <div class="formbold-main-wrapper">
        <div class="formbold-form-wrapper">
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
                        <label for="anioEscolar" class="form-label">Año Escolar</label>
                        <input type="text" class="form-control" id="anioEscolar" name="anioEscolar" readonly>
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
                            <input type="text" name="f_nacimientoEst" id="f_nacimientoEst" title="Fecha de nacimiento"
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
                                <select name="gradoEst" id="gradoEst" class="formbold-form-input">
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Obtener el año actual
        const añoActual = new Date().getFullYear();
        // Calcular el año siguiente
        const añoSiguiente = añoActual + 1;
        // Formatear como "2024-2025"
        const añoEscolar = `${añoActual}-${añoSiguiente}`;

        // Asignar el valor al input
        document.getElementById('anioEscolar').value = añoEscolar;
    });
    // Elementos del formulario multistep
    const stepMenuOne = document.querySelector('.formbold-step-menu1');
    const stepMenuTwo = document.querySelector('.formbold-step-menu2');
    const stepMenuThree = document.querySelector('.formbold-step-menu3');

    const stepOne = document.querySelector('.formbold-form-step-1');
    const stepTwo = document.querySelector('.formbold-form-step-2');
    const stepThree = document.querySelector('.formbold-form-step-3');

    const formSubmitBtn = document.querySelector('.formbold-btn');
    const formBackBtn = document.querySelector('.formbold-back-btn');

    // Reglas de validación
    const dniRules = [{
        condition: (value) => /^[V|E|J|P][0-9]{7,9}$/.test(value),
        message: 'Por favor, introduce una cédula válido'
    }];

    const nombreRules = [{
        condition: (value) => /^[A-Za-zÑñÁÉÍÓÚáéíóú\s'-]+$/.test(value),
        message: 'Por favor, introduce un nombre válido'
    }];

    const emailRules = [{
        condition: (value) => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value),
        message: 'Por favor, introduce un correo válido.'
    }];

    const fechaRules = [{
        condition: (value) => /^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{4}$/.test(value),
        message: 'Por favor, introduce una fecha . Ej: DD/MM/AAAA'
    }];

    const nroRules = [{
        condition: (value) => /^(0414|0424|0412|0416|0426)[0-9]{7}$/.test(value),
        message: 'Por favor, introduce un número telefónico válido'
    }];

    const edadRules = [{
        condition: (value) => /^[0-9]{1,2}$/.test(value),
        message: 'Por favor, introduce una edad válida'
    }];

    const sexoRules = [{
        condition: (value) => /^(M|F)$/i.test(value),
        message: 'Por favor, introduce una opción válida'
    }];

    const turnoRules = [{
        condition: (value) => /^(Mañana)$/i.test(value),
        message: 'Por favor, introduce una opción válida'
    }];

    const trabajaRules = [{
        condition: (value) => /^(Sí|No)$/i.test(value),
        message: 'Por favor, introduce una opción válida'
    }];

    const textoRules = [{
        condition: (value) => /^.{10,}$/.test(value),
        message: 'Por favor, introduce una texto válido'
    }];


    // Cargar grados cuando el documento esté listo
    $(document).ready(function () {
        cargarGrados();
    });

    function cargarGrados() {
        $.ajax({
            url: "../AJAX/AJAX_Inscripcion/searchGradosInscr.php",
            type: "POST",
            data: { action: 'cargar_grados' }, // Enviamos una acción específica
            success: function (resultado) {
                $("#gradoEst").html('<option value="Seleccionar" selected>Seleccionar</option>' + resultado);
            },
            error: function (xhr, status, error) {
                console.error("Error en la solicitud AJAX:", error);
                $("#gradoEst").html('<option value="Error">Error al cargar grados</option>');
            }
        });
    }

    // Configuración de validación en tiempo real
    function setupValidation(inputElement, feedbackElement, validationRules) {
        inputElement.addEventListener('input', () => {
            const value = inputElement.value.trim();

            if (value === '') {
                feedbackElement.textContent = 'El campo no puede estar vacío.';
                feedbackElement.className = 'error';
                inputElement.classList.add('error-border');
                return;
            }

            for (const rule of validationRules) {
                if (!rule.condition(value)) {
                    feedbackElement.textContent = rule.message;
                    feedbackElement.className = 'error';
                    inputElement.classList.add('error-border');
                    return;
                }
            }

            feedbackElement.textContent = 'Entrada válida.';
            feedbackElement.className = 'success';
            inputElement.classList.remove('error-border');
        });
    }

    // Función para validar un paso completo
    function validateStep(stepNumber) {
        let isValid = true;
        const fieldsToValidate = [];
        var selectC = document.getElementById('trabajaC');

        if (stepNumber === 1) {

            // Campos del estudiante (todos requeridos)
            fieldsToValidate.push(
                'nombresEst', 'apellidosEst',
                'sexoEst', 'f_nacimientoEst', 'edadEst', 'direccionEst', 'lugarNacEst',
                'colegioAntEst', 'nivelacionEst', 'motivoREst', 'explicacionEst', 'turnoEst',
                'vacunasEst', 'enfermedadEst'
            );

            if (document.querySelector('input[value="síDniEst"]').checked) {
                fieldsToValidate.push(
                    'cedulaEst'
                );
            }

            if (document.querySelector('input[value="siProblRespEst"]').checked) {
                fieldsToValidate.push(
                    'problemasRespEst'
                );
            }
            if (document.querySelector('input[value="siAlergEst"]').checked) {
                fieldsToValidate.push(
                    'alergiasEst'
                );
            }

        } else if (stepNumber === 2) {
            // Campos de madre (solo si está presente)
            if (document.querySelector('input[value="síM"]').checked) {
                fieldsToValidate.push(
                    'cedulaM',
                    'nombresM',
                    'apellidosM',
                    'f_nacimientoM',
                    'emailM',
                    'direccionM',
                    'n_telefonoM',
                    'graoInstM',
                    'profesionM',
                    'trabajaM'
                );
            }

            // Campos de padre (solo si está presente)
            if (document.querySelector('input[value="síP"]').checked) {
                fieldsToValidate.push(
                    'cedulaP',
                    'nombresP',
                    'apellidosP',
                    'f_nacimientoP',
                    'emailP',
                    'direccionP',
                    'n_telefonoP',
                    'graoInstP',
                    'profesionP',
                    'trabajaP',
                );
            }

            if (trabajaP.value === "Sí") {
                fieldsToValidate.push(
                    'nombreEmpresaP',
                    'tlfnEmepresaP',
                    'direccionEmpresaP'
                );
            }

            if (trabajaM.value === "Sí") {
                fieldsToValidate.push(
                    'nombreEmpresaM',
                    'tlfnEmepresaM',
                    'direccionEmpresaM'
                );
            }

        } else if (stepNumber === 3) {

            if (document.querySelector('input[value="padre"]').checked) {
                fieldsToValidate.push(
                    'cedulaC',
                    'nombresC',
                    'apellidosC',
                    'direccionC',
                    'telefonoC',
                    'correoC',
                    'graoInstC',
                    'profesionC',
                    'trabajaC',
                    'nombreEmpresaC',
                    'tlfnEmepresaC',
                    'direccionEmpresaC',
                );
            }

            if (document.querySelector('input[value="madre"]').checked) {
                fieldsToValidate.push(
                    'cedulaC',
                    'nombresC',
                    'apellidosC',
                    'direccionC',
                    'telefonoC',
                    'correoC',
                    'graoInstC',
                    'profesionC',
                    'trabajaC',
                    'nombreEmpresaC',
                    'tlfnEmepresaC',
                    'direccionEmpresaC',
                );
            }
            // Campos de pago contacto (solo si está seleccionado)
            if (document.querySelector('input[value="otro"]').checked) {
                fieldsToValidate.push(
                    'cedulaC',
                    'nombresC',
                    'apellidosC',
                    'direccionC',
                    'telefonoC',
                    'correoC',
                    'graoInstC',
                    'profesionC',
                    'trabajaC',
                );
            }

            if (selectC.value === "Sí") {
                fieldsToValidate.push(
                    'nombreEmpresaC',
                    'tlfnEmepresaC',
                    'direccionEmpresaC'
                );
            }
        }

        fieldsToValidate.forEach(fieldId => {
            const input = document.getElementById(fieldId);
            const feedback = document.getElementById(fieldId + 'Feedback');

            if (input) {
                const value = input.value.trim();

                if (value === '') {
                    feedback.textContent = 'El campo no puede estar vacío.';
                    feedback.className = 'error';
                    input.classList.add('error-border');
                    isValid = false;
                    return;
                }

                // Aplicar reglas de validación específicas
                let rules;
                if (fieldId.includes('cedula')) {
                    rules = dniRules;
                } else if (fieldId.includes('nombres') || fieldId.includes('apellidos') || fieldId.includes('direccion') || fieldId.includes('problemasRespEst') || fieldId.includes('alergiasEst') || fieldId.includes('lugarNacEst') || fieldId.includes('enfermedadEst')) {
                    rules = nombreRules;
                } else if (fieldId.includes('email')) {
                    rules = emailRules;
                } else if (fieldId.includes('f_nacimiento')) {
                    rules = fechaRules;
                } else if (fieldId.includes('n_telefono')) {
                    rules = nroRules;
                } else if (fieldId.includes('cedulaEst')) {
                    rules = dniRules;
                } else if (fieldId.includes('edad')) {
                    rules = edadRules;
                } else if (fieldId.includes('direccionEst')) {
                    rules = nombreRules;
                } else if (fieldId.includes('turnoEst')) {
                    rules = turnoRules;
                }

                if (rules) {
                    for (const rule of rules) {
                        if (!rule.condition(value)) {
                            feedback.textContent = rule.message;
                            feedback.className = 'error';
                            input.classList.add('error-border');
                            isValid = false;
                            break;
                        }
                    }
                }
            }
        });
        return isValid;
    }

    // Función para habilitar/deshabilitar secciones de padres
    function validar(el) {
        const camposMadre = [
            'cedulaM', 'nombresM', 'apellidosM', 'f_nacimientoM', 'emailM',
            'direccionM', 'n_telefonoM', 'graoInstM', 'profesionM', 'trabajaM',
            'nombreEmpresaM', 'tlfnEmepresaM', 'direccionEmpresaM'
        ];

        const camposPadre = [
            'cedulaP', 'nombresP', 'apellidosP', 'f_nacimientoP', 'emailP',
            'direccionP', 'n_telefonoP', 'graoInstP', 'profesionP', 'trabajaP',
            'nombreEmpresaP', 'tlfnEmepresaP', 'direccionEmpresaP'
        ];

        // Determinar qué checkbox fue activado
        if (el.id === 'padreSi') {
            limpiarCampos(camposPadre);
        } else if (el.id === 'madreSi') {
            limpiarCampos(camposMadre);
        }

        const className = el.value === "síM" ? "formbold-form-inputM" : "formbold-form-inputP";
        const elements = document.getElementsByClassName(className);

        for (let i = 0; i < elements.length; i++) {

            if (el.checked) {
                elements[i].disabled = false;
                elements[i].style.backgroundColor = "#FFFFFF";
            } else {
                elements[i].disabled = true;
                elements[i].style.backgroundColor = "#c8c7c7";
            }
        }
    }

    function limpiarCampos(campos) {
        campos.forEach(campo => {
            const input = document.getElementById(campo);
            if (input) input.value = '';

            const feedback = document.getElementById(campo + 'Feedback');
            if (feedback) feedback.textContent = '';
        });
    }


    // Función para habilitar/deshabilitar campos individuales
    function validarTrabaja(select, campo1, campo2, campo3) {
        const ids = [campo1, campo2, campo3];

        if (select.value === "No") {
            // Deshabilitar todos los campos
            ids.forEach(id => {
                const campo = document.getElementById(id);
                const feedback = document.getElementById(id + 'Feedback');
                if (campo) {
                    campo.disabled = true;
                    campo.value = ''; // Opcional: limpiar el valor
                    campo.style.backgroundColor = "#c8c7c7";
                    campo.textContent = '';
                    feedback.textContent = '';
                }
            });
        } else if (select.value === "Sí") {
            // Habilitar todos los campos si se selecciona "Sí"
            ids.forEach(id => {
                const campo = document.getElementById(id);
                if (campo) {
                    campo.disabled = false;
                    campo.style.backgroundColor = "white";
                }
            });
        }
    }

    // Función para habilitar/deshabilitar campos individuales
    function chequear(checkbox, idCampo) {
        const campo = document.getElementById(idCampo);
        const feedback = document.getElementById(idCampo + 'Feedback');
        if (checkbox.checked) {
            campo.disabled = false;
            campo.style.borderColor = "black";
        } else {
            campo.disabled = true;
            campo.style.borderColor = "#DDE3EC";
            feedback.textContent = '';
        }
    }

    // Configurar validación para todos los campos
    // Estudiante
    setupValidation(document.getElementById('cedulaEst'), document.getElementById('cedulaEstFeedback'), dniRules);
    setupValidation(document.getElementById('nombresEst'), document.getElementById('nombresEstFeedback'), nombreRules);
    setupValidation(document.getElementById('apellidosEst'), document.getElementById('apellidosEstFeedback'), nombreRules);
    setupValidation(document.getElementById('f_nacimientoEst'), document.getElementById('f_nacimientoEstFeedback'), fechaRules);
    setupValidation(document.getElementById('edadEst'), document.getElementById('edadEstFeedback'), edadRules);
    setupValidation(document.getElementById('sexoEst'), document.getElementById('sexoEstFeedback'), sexoRules);
    setupValidation(document.getElementById('direccionEst'), document.getElementById('direccionEstFeedback'), textoRules);
    setupValidation(document.getElementById('lugarNacEst'), document.getElementById('lugarNacEstFeedback'), textoRules);

    //INFORMACIÓN DEL EST ACADÉMICA
    setupValidation(document.getElementById('colegioAntEst'), document.getElementById('colegioAntEstFeedback'), textoRules);
    setupValidation(document.getElementById('nivelacionEst'), document.getElementById('nivelacionEstFeedback'), textoRules);
    setupValidation(document.getElementById('explicacionEst'), document.getElementById('explicacionEstFeedback'), textoRules);
    setupValidation(document.getElementById('motivoREst'), document.getElementById('motivoREstFeedback'), textoRules);
    setupValidation(document.getElementById('turnoEst'), document.getElementById('turnoEstFeedback'), turnoRules);

    //INFORMACIÓN DE SALUD EST
    setupValidation(document.getElementById('vacunasEst'), document.getElementById('vacunasEstFeedback'), textoRules);
    setupValidation(document.getElementById('enfermedadEst'), document.getElementById('enfermedadEstFeedback'), textoRules);
    setupValidation(document.getElementById('problemasRespEst'), document.getElementById('problemasRespEstFeedback'), textoRules);
    setupValidation(document.getElementById('alergiasEst'), document.getElementById('alergiasEstFeedback'), textoRules);

    // Madre
    setupValidation(document.getElementById('cedulaM'), document.getElementById('cedulaMFeedback'), dniRules);
    setupValidation(document.getElementById('nombresM'), document.getElementById('nombresMFeedback'), nombreRules);
    setupValidation(document.getElementById('apellidosM'), document.getElementById('apellidosMFeedback'), nombreRules);
    setupValidation(document.getElementById('f_nacimientoM'), document.getElementById('f_nacimientoMFeedback'), fechaRules);
    setupValidation(document.getElementById('emailM'), document.getElementById('emailMFeedback'), emailRules);
    setupValidation(document.getElementById('direccionM'), document.getElementById('direccionMFeedback'), textoRules);
    setupValidation(document.getElementById('n_telefonoM'), document.getElementById('n_telefonoMFeedback'), nroRules);
    //INFORMACIÓN ACADÉMICA DE LA MADRE
    setupValidation(document.getElementById('graoInstM'), document.getElementById('graoInstMFeedback'), textoRules);
    setupValidation(document.getElementById('profesionM'), document.getElementById('profesionMFeedback'), textoRules);
    //INFORMACIÓN LABORAL DE LA MADRE
    setupValidation(document.getElementById('trabajaM'), document.getElementById('trabajaMFeedback'), trabajaRules);
    setupValidation(document.getElementById('nombreEmpresaM'), document.getElementById('nombreEmpresaMFeedback'), nombreRules);
    setupValidation(document.getElementById('tlfnEmepresaM'), document.getElementById('tlfnEmepresaMFeedback'), nroRules);
    setupValidation(document.getElementById('direccionEmpresaM'), document.getElementById('direccionEmpresaMFeedback'), textoRules);

    // Padre
    setupValidation(document.getElementById('cedulaP'), document.getElementById('cedulaPFeedback'), dniRules);
    setupValidation(document.getElementById('nombresP'), document.getElementById('nombresPFeedback'), nombreRules);
    setupValidation(document.getElementById('apellidosP'), document.getElementById('apellidosPFeedback'), nombreRules);
    setupValidation(document.getElementById('f_nacimientoP'), document.getElementById('f_nacimientoPFeedback'), fechaRules);
    setupValidation(document.getElementById('emailP'), document.getElementById('emailPFeedback'), emailRules);
    setupValidation(document.getElementById('direccionP'), document.getElementById('direccionPFeedback'), textoRules);
    setupValidation(document.getElementById('n_telefonoP'), document.getElementById('n_telefonoPFeedback'), nroRules);
    //INFORMACIÓN ACADÉMICA DEL PADRE
    setupValidation(document.getElementById('graoInstP'), document.getElementById('graoInstPFeedback'), textoRules);
    setupValidation(document.getElementById('profesionP'), document.getElementById('profesionPFeedback'), textoRules);
    //INFORMACIÓN LABORAL DEL PADRE
    setupValidation(document.getElementById('trabajaP'), document.getElementById('trabajaPFeedback'), trabajaRules);
    setupValidation(document.getElementById('nombreEmpresaP'), document.getElementById('nombreEmpresaPFeedback'), textoRules);
    setupValidation(document.getElementById('tlfnEmepresaP'), document.getElementById('tlfnEmepresaPFeedback'), nroRules);
    setupValidation(document.getElementById('direccionEmpresaP'), document.getElementById('direccionEmpresaPFeedback'), textoRules);


    //CONTACTO DE PAGO
    setupValidation(document.getElementById('cedulaC'), document.getElementById('cedulaCFeedback'), dniRules);
    setupValidation(document.getElementById('nombresC'), document.getElementById('nombresCFeedback'), nombreRules);
    setupValidation(document.getElementById('apellidosC'), document.getElementById('apellidosCFeedback'), nombreRules);
    setupValidation(document.getElementById('direccionC'), document.getElementById('direccionCFeedback'), textoRules);
    setupValidation(document.getElementById('telefonoC'), document.getElementById('telefonoCFeedback'), nroRules);
    setupValidation(document.getElementById('correoC'), document.getElementById('correoCFeedback'), emailRules);
    setupValidation(document.getElementById('graoInstC'), document.getElementById('graoInstCFeedback'), textoRules);
    //INFORMACIÓN ACADÉMICA CONTACTO
    setupValidation(document.getElementById('profesionC'), document.getElementById('profesionCFeedback'), textoRules);
    setupValidation(document.getElementById('trabajaC'), document.getElementById('trabajaCFeedback'), trabajaRules);
    //INFORMACIÓN LABORAL DEL CONTACTO
    setupValidation(document.getElementById('nombreEmpresaC'), document.getElementById('nombreEmpresaCFeedback'), textoRules);
    setupValidation(document.getElementById('tlfnEmepresaC'), document.getElementById('tlfnEmepresaCFeedback'), nroRules);
    setupValidation(document.getElementById('direccionEmpresaC'), document.getElementById('direccionEmpresaCFeedback'), textoRules);


    function existeEstudiante() {
        $.ajax({
            url: "../AJAX/AJAX_Inscripcion/searchDniEstInscr.php",
            type: "POST",
            data: $("#form").serialize(),
            success: function (resultado) {
                $("#cedulaEstFeedback").html(resultado);

                const error = document.getElementById('cedulaEstFeedback').textContent;

                if (error.trim() === "") {
                    stepMenuOne.classList.remove('active');
                    stepMenuTwo.classList.add('active');
                    stepOne.classList.remove('active');
                    stepTwo.classList.add('active');
                    formBackBtn.classList.add('active');
                    formSubmitBtn.textContent = 'Siguiente';
                } else {
                    console.log("Error en la validación: ", error);
                }


            },
            error: function (xhr, status, error) {
                console.error("Error en la solicitud AJAX:", status, error);
            }
        });
    }

    // Navegación entre pasos
    formSubmitBtn.addEventListener("click", function (event) {
        event.preventDefault();

        if (stepMenuOne.className.includes('active')) {
            // Validar paso 1 antes de continuar
            if (!validateStep(1)) {
                alert('Por favor, corrige los errores en los campos antes de continuar.');
                return;
            } else {
                existeEstudiante();
            }
        } else if (stepMenuTwo.className.includes('active')) {
            // Validar paso 2 antes de continuar
            const checkboxMadre = document.querySelector('input[value="síM"]');
            const checkboxPadre = document.querySelector('input[value="síP"]');

            // Verificar si al menos uno está seleccionado
            if ((checkboxMadre && checkboxMadre.checked) || (checkboxPadre && checkboxPadre.checked)) {
                if (!validateStep(2)) {
                    alert('Por favor, corrige los errores en los campos de los representantes antes de continuar.');
                    return;
                }
            } else {
                alert('Para continuar debe ingresar la información de al menos un representante (madre o padre). Verifique.');
                return;
            }

            stepMenuTwo.classList.remove('active');
            stepMenuThree.classList.add('active');
            stepTwo.classList.remove('active');
            stepThree.classList.add('active');
            formSubmitBtn.textContent = 'Enviar';

        } else if (stepMenuThree.className.includes('active')) {

            if (!validateStep(3)) {
                alert('Por favor, corrige los errores en los campos del reponsable del pago antes de continuar.');
                //return;
            } else {
                document.querySelector('form').submit();
            }
        }
    });

    function trabaja(event) {

        var trabajaM = document.getElementById('trabajaM');
        var trabajaP = document.getElementById('trabajaP');

        // Obtener todos los campos de contacto
        var camposContacto = document.querySelectorAll('.formbold-form-inputC');
        var mensajeError = document.querySelectorAll('.error');

        // Verificar primero qué representante está seleccionado
        var representanteSeleccionado = document.querySelector('input[name="representante"]:checked');

        if (representanteSeleccionado.value === "") {
            alert("Por favor, seleccione un representante");
            return;
        }

        if (representanteSeleccionado.value === "madre") {
            camposContacto.forEach(campo => {
                campo.readOnly = true;
                campo.value = '';
            });

            if (trabajaM.value == "Sí") {
                mensajeError.forEach(error => {
                    error.textContent = '';
                });

                /* IGUALAR CAMPOS CON INFORMACIÓN DE MADRE*/
                var cedulaM = document.getElementById('cedulaM').value.trim();
                var nombresM = document.getElementById('nombresM').value.trim();
                var apellidosM = document.getElementById('apellidosM').value.trim();
                var emailM = document.getElementById('emailM').value.trim();
                var direccionM = document.getElementById('direccionM').value.trim();
                var n_telefonoM = document.getElementById('n_telefonoM').value.trim();
                var graoInstM = document.getElementById('graoInstM').value.trim();
                var profesionM = document.getElementById('profesionM').value.trim();
                var trabajaM = document.getElementById('trabajaM').value.trim();
                var nombreEmpresaM = document.getElementById('nombreEmpresaM').value.trim();
                var tlfnEmepresa = document.getElementById('tlfnEmepresaM').value.trim();
                var direccionEmpresaM = document.getElementById('direccionEmpresaM').value.trim();

                document.getElementById('cedulaC').value = cedulaM;
                document.getElementById('nombresC').value = nombresM;
                document.getElementById('apellidosC').value = apellidosM;
                document.getElementById('direccionC').value = direccionM;
                document.getElementById('telefonoC').value = n_telefonoM;
                document.getElementById('correoC').value = emailM;
                document.getElementById('graoInstC').value = graoInstM;
                document.getElementById('profesionC').value = profesionM;
                document.getElementById('trabajaC').value = trabajaM;
                document.getElementById('nombreEmpresaC').value = nombreEmpresaM;
                document.getElementById('tlfnEmepresaC').value = tlfnEmepresa;
                document.getElementById('direccionEmpresaC').value = direccionEmpresaM;
            } else {
                alert("Atención. La madre no trabaja. No puede seleccionarla como responsable del pago");
                return;
            }
        } else if (representanteSeleccionado.value === "padre") {

            camposContacto.forEach(campo => {
                campo.readOnly = true;
                campo.value = '';
            });

            if (trabajaP.value == "Sí") {
                mensajeError.forEach(error => {
                    error.textContent = '';
                });
                var cedulaP = document.getElementById('cedulaP').value.trim();
                var nombresP = document.getElementById('nombresP').value.trim();
                var apellidosP = document.getElementById('apellidosP').value.trim();
                var emailP = document.getElementById('emailP').value.trim();
                var direccionP = document.getElementById('direccionP').value.trim();
                var n_telefonoP = document.getElementById('n_telefonoP').value.trim();
                var graoInstP = document.getElementById('graoInstP').value.trim();
                var profesionP = document.getElementById('profesionP').value.trim();
                var trabajaP = document.getElementById('trabajaP').value.trim();
                var nombreEmpresaP = document.getElementById('nombreEmpresaP').value.trim();
                var tlfnEmepresP = document.getElementById('tlfnEmepresaP').value.trim();
                var direccionEmpresaP = document.getElementById('direccionEmpresaP').value.trim();

                /* IGUALAR CAMPOS CON INFORMACIÓN DEL PADRE*/
                document.getElementById('cedulaC').value = cedulaP;
                document.getElementById('nombresC').value = nombresP;
                document.getElementById('apellidosC').value = apellidosP;
                document.getElementById('direccionC').value = direccionP; // Corregido
                document.getElementById('telefonoC').value = n_telefonoP; // Corregido
                document.getElementById('correoC').value = emailP; // Corregido
                document.getElementById('graoInstC').value = graoInstP;
                document.getElementById('profesionC').value = profesionP;
                document.getElementById('trabajaC').value = trabajaP;
                document.getElementById('nombreEmpresaC').value = nombreEmpresaP;
                document.getElementById('tlfnEmepresaC').value = tlfnEmepresP;
                document.getElementById('direccionEmpresaC').value = direccionEmpresaP;
            } else {
                alert("Atención. El padre no trabaja. No puede seleccionarlo como responsable del pago");
                return;
            }
        } else if (representanteSeleccionado.value === "otro") {

            // Remover readonly y cambiar estilo para todos los campos de contacto
            camposContacto.forEach(campo => {
                campo.readOnly = false;
                campo.style.backgroundColor = "#ffffff"; // Fondo blanco para campos editables

                campo.value = '';
            });

        } else {
            camposContacto.forEach(campo => {
                campo.readOnly = true;
            });
        }
    }
    // Manejar botón Atrás
    formBackBtn.addEventListener("click", function (event) {
        event.preventDefault();

        if (stepMenuThree.className.includes('active')) {
            stepMenuThree.classList.remove('active');
            stepMenuTwo.classList.add('active');
            stepThree.classList.remove('active');
            stepTwo.classList.add('active');
            formSubmitBtn.textContent = 'Siguiente';
        } else if (stepMenuTwo.className.includes('active')) {
            stepMenuTwo.classList.remove('active');
            stepMenuOne.classList.add('active');
            stepTwo.classList.remove('active');
            stepOne.classList.add('active');
            formBackBtn.classList.remove('active');
        }
    });
</script>

</html>