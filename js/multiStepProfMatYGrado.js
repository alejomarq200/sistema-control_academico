document.addEventListener('DOMContentLoaded', function() {
        var form1 = document.getElementById("form1-gestionPr");
        var form2 = document.getElementById("form2-gestionPr");
        var back1 = document.getElementById("back1-gestionPr");
        var progress = document.getElementById("progress-gestionPr");

        // Mostrar el primer formulario al cargar la página
        if (form1 && form2 && back1 && progress) {
            form1.classList.add("active");
            progress.style.width = "50.00%";

            // Delegación de eventos para botones dinámicos
            document.addEventListener("click", function(event) {
                if (event.target.closest(".next1-gestionPr")) {

                    var button = event.target.closest(".next1-gestionPr");

                    var cedula = button.getAttribute("data-cedula");
                    var nombre = button.getAttribute("data-nombre");
                    var nivelPr = button.getAttribute("data-nivelProfesor");

                    document.getElementById("cedulaProfesorG").value = cedula;
                    document.getElementById("nombreProfesorG").value = nombre;
                    document.getElementById("nivelProfesorG").value = nivelPr;

                    form1.classList.remove("active");
                    form2.classList.add("active");
                    progress.style.width = "100.00%";
                    cargarSelectGrados();
                }
            });
            back1.onclick = function() {
                const errorElements = document.querySelectorAll("#form2-gestionPr .errorFormMultiPr");
                errorElements.forEach((el) => {
                    el.textContent = "";
                });
                form2.classList.remove("active");
                form1.classList.add("active");
                progress.style.width = "50.00%";
            };
        } else {
            console.error("No se encontraron todos los elementos necesarios");
        }
    });

    function cargarSelectGrados() {
        $.ajax({
            type: "POST",
            url: "../AJAX/AJAX_Profesores/searchGradosxProfG.php",
            data: $("#form2-gestionPr").serialize(),
            success: function(data) {
                $("#gradosG").html(data);

            },
        });
    }

    function cargarSelectMateriasxProfesor() {
        $.ajax({
            type: "POST",
            url: "../AJAX/AJAX_Profesores/searchMateriasxProfesor.php",
            data: $("#form2-gestionPr").serialize(),
            success: function(data) {
                $("#materiasG").html(data);
            },
        });
    }

    function validarExisteProfesorG() {
        $.ajax({
            type: "POST",
            url: "../AJAX/AJAX_Profesores/searchExisteProfesorG.php",
            data: $("#form2-gestionPr").serialize(),
            success: function(data) {
                $("#errorMateriasG").html(data);
                var errores = document.getElementById("errorMateriasG").textContent;

                if (errores.trim() === "") {
                    document.getElementById("form2-gestionPr").submit();
                } else {
                    console.log("Error en la validación: ", errores);
                }
            },
        });
    }

    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("form2-gestionPr").addEventListener("submit", function(event) {
            event.preventDefault();
            const errorElements = document.querySelectorAll(".errorFormMultiPr");
            errorElements.forEach((el) => {
                el.textContent = "";
            });

            const regexName = /^[A-Za-zñÑáéíóúÁÉÍÓÚ]{3,}(?: [A-Za-zñÑáéíóúÁÉÍÓÚ]{2,})?$/;
            let isValid = true;

            let cedula = document.getElementById("cedulaProfesorG").value.trim();
            let nombre = document.getElementById("nombreProfesorG").value.trim();
            let nivel = document.getElementById("nivelProfesorG").value.trim();
            let grado = document.getElementById("gradosG").value.trim();
            let materia = document.getElementById("materiasG").value.trim();

            if (grado == "Seleccionar" || grado == "No asignado") {
                isValid = false;
                document.getElementById("errorGradosG").textContent = "Seleccione un grado del profesor correcto";
            }

            if (materia == "Seleccionar" || materia == "No asignado") {
                isValid = false;
                document.getElementById("errorMateriasG").textContent = "Seleccione una materia del profesor correcto";
            }

            if (isValid) {
                //document.getElementById("form2-gestionPr").submit();
                validarExisteProfesorG();
            }
        });

        // Resetear modal al abrir
        document.getElementById('btn-modal-gestionPr').addEventListener('change', function() {
            if (this.checked) {
                form2.classList.remove("active");
                form1.classList.add("active");
                progress.style.width = "50.00%";

                const errorElements = document.querySelectorAll(".errorFormMultiPr");
                errorElements.forEach((el) => {
                    el.textContent = "";
                });
            }
        });
    });