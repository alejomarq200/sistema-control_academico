    document.addEventListener('DOMContentLoaded', function() {
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
    $(document).ready(function() {
        cargarGrados();
    });

    function cargarGrados() {
        $.ajax({
            url: "../AJAX/AJAX_Inscripcion/searchGradosInscr.php",
            type: "POST",
            data: {
                action: 'cargar_grados'
            }, // Enviamos una acción específica
            success: function(resultado) {
                $("#gradoEst").html('<option value="Seleccionar" selected>Seleccionar</option>' + resultado);
            },
            error: function(xhr, status, error) {
                console.error("Error en la solicitud AJAX:", error);
                $("#gradoEst").html('<option value="Error">Error al cargar grados</option>');
            }
        });
    }

    function cargarAulas() {
        let gradoSeleccionado = document.getElementById('gradoEst').value;
        let anioSeleccionado = document.getElementById('anioEscolar').value;

        $.ajax({
            url: "../AJAX/AJAX_Inscripcion/cargarCantxAula.php",
            type: "POST",
            data: {
                action: 'cargar_aulas',
                idgrado: gradoSeleccionado,
                anio: anioSeleccionado
            },
            success: function(resultado) {
                // resultado será algo como "15 / 30"
                $("#cantidad").html(resultado);
            },
            error: function(xhr, status, error) {
                console.error("Error en la solicitud AJAX:", error);
                $("#cantidad").html("Error al obtener datos");
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
    setupValidation(document.getElementById('nombreEmpresaM'), document.getElementById('nombreEmpresaMFeedback'), textoRules);
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
            success: function(resultado) {
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
            error: function(xhr, status, error) {
                console.error("Error en la solicitud AJAX:", status, error);
            }
        });
    }

    // Navegación entre pasos
    formSubmitBtn.addEventListener("click", function(event) {
        event.preventDefault();
        const cantidad = document.getElementById('cantidad').textContent;

        if (stepMenuOne.className.includes('active')) {
            // Validar paso 1 antes de continuar
            if (!validateStep(1)) {
                alert('Por favor, corrige los errores en los campos antes de continuar.');
                return;
            } else {
                // Obtener el texto del span
                const textoCantidad = document.getElementById('cantidad').textContent;

                // Extraer los dos números del texto con RegExp
                const numeros = textoCantidad.match(/\d+/g); // Busca todos los números

                if (numeros && numeros.length >= 2) {
                    const cantidad = parseInt(numeros[0]); // Cantidad actual de estudiantes (ej. 2)
                    const capacidad = parseInt(numeros[1]); // Capacidad del grado (ej. 15)

                    if (cantidad >= capacidad) {
                        alert("No se puede inscribir: el aula ya está llena.");
                        return;
                    } else {
                        // Aquí puedes continuar
                        existeEstudiante(); // o lo que corresponda
                    }
                } else {
                    alert("No se pudo validar la capacidad del aula. Verifica el formato del texto.");
                    return;
                }
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
    formBackBtn.addEventListener("click", function(event) {
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