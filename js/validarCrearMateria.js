document.addEventListener("DOMContentLoaded", function() {
    var isSubmitting = false;

    document.getElementById("form-RegisterMateria").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevenir el envío del formulario

        let isSubmitting = true;
        var nombre = document.getElementById("nombreCreateM").value.trim();
        var nivelMateria = document.getElementById("nivelCreateM").value.trim();
        const regexName = /^.{10,}$/;

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