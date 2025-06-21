<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/modalesMaterias/modalCreateM.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        /* Estilos para los mensajes de error */
        #ModalFormM .error1 {
            text-align: left;
            padding-left: 0;
            color: red;
            font-size: 0.85rem;
            margin-top: 0.1rem;
            margin-bottom: 0.5rem;
        }
    </style>
</head>

<body>
    <div class="modal fade" id="ModalFormM" tabindex="-1" aria-labelledby="ModalFormLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-area">
                        <h1 class="text-center">Agregar Asignaturas</h1>
                        <form action="../controller_php/controller_CreateMateria.php" method="POST" id="form-RegisterMateria">
                            <div class="mb-1">
                                <label for="nombre" class="form-label">Nombre de la asignaturas</label>
                                <input type="text" class="form-control" name="nombreCreateM" id="nombreCreateM">
                            </div>
                            <p class="error1" id="nombreErrorCreateM"></p>
                            <div class="mb-1">
                                <label for="nombre" class="form-label">Nivel de la Asignatura</label>
                                <select name="nivelCreateM" id="nivelCreateM">
                                    <option value="Seleccionar" selected>Seleccionar</option>
                                    <option value="Primaria">Primaria</option>
                                    <option value="Secundaria">Secundaria</option>
                                </select>
                            </div>
                            <p class="error1" id="nivelErrorCreateM"></p>
                            <button type="submit" class="btn btn-light mt-2">Crear</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SCRIPT-->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
    var isSubmitting = false;

    document.getElementById("form-RegisterMateria").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevenir el envío del formulario

        let isSubmitting = true;
        var nombre = document.getElementById("nombreCreateM").value.trim();
        var nivelMateria = document.getElementById("nivelCreateM").value.trim();
        const regexName = /^[A-Za-zÑñÁÉÍÓÚáéíóú\s'-]+$/;

        if (!nombre) {
            document.getElementById("nombreErrorCreateM").textContent = "El nombre de la materia es obligatorio";
            isSubmitting = false;
       
        } else if (!regexName.test(nombre)) {
            document.getElementById("nombreErrorCreateM").textContent = "Formato inválido: Ingrese solo letras con espacios";
            isSubmitting = false;
        } else{ 
            document.getElementById("nombreErrorCreateM").textContent = "";
        }

        if (!nivelMateria) {
            document.getElementById("nivelErrorCreateM").textContent = "Seleccione un nivel de materia correcto";
            isSubmitting = false;
          
        } else if (nivelMateria == "Seleccionar") {
            document.getElementById("nivelErrorCreateM").textContent = "Seleccione un nivel de materia correcto";
            isSubmitting = false; 
        } else {
            document.getElementById("nivelErrorCreateM").textContent = "";
            
        }

        if(isSubmitting){
            $.ajax({
            url: "../AJAX/AJAX_Materias/searchNombreMateria.php",
            type: "POST",
            data: $("#form-RegisterMateria").serialize(),
            success: function(resultado) {
                $("#nombreErrorCreateM").html(resultado);

                var errores = document.getElementById("nombreErrorCreateM").textContent;

                if (errores.trim() === "") {
                    $("#form-RegisterMateria")[0].submit(); // Enviar formulario una sola vez
                } else {
                    console.log("Error en la validación: ", errores);
                    isSubmitting = false; // Restablecer bandera
                }
            },
            error: function(xhr, status, error) {
                console.error("Error en la solicitud AJAX:", status, error);
                isSubmitting = false;
            }
        });
        }

       
    });
});

// Ocultar mensajes de error y limpiar el formulario al cerrar la modal
document
    .getElementById("ModalFormM")
    .addEventListener("hidden.bs.modal", function() {
        // Ocultar todos los mensajes de error
        let errors = document.querySelectorAll(".error1");
        errors.forEach(function(error) {
            error.textContent = '';
        });

        // Limpiar los campos del formulario
        document.getElementById("form-RegisterMateria").reset();
    });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>
</body>

</html>