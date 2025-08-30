           <head>
               <style>
                   .error {
                       color: #dc3545;
                       font-size: 0.875rem;
                       margin-top: 0.25rem;
                       display: none;
                   }

                   .form-control.error-field {
                       border-color: #dc3545;
                   }
               </style>
           </head>
           <!-- Modal -->
           <div class="modal fade" id="formModalVer" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
               <div class="modal-dialog modal-dialog-centered">
                   <div class="modal-content" style="border-radius: 12px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.15);">
                       <div class="modal-header" style="background: linear-gradient(135deg, #112355ff 0%, #2575fc 100%); color: white; border: none;">
                           <h5 class="modal-title" id="modalLabel" style="font-weight: 600;">
                               <i class="fas fa-laptop me-2"></i>Registro de Dispositivos
                           </h5>
                           <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                       </div>
                       <div class="modal-body" style="background-color: #f8f9fa;">
                           <form method="POST" action="../controller_php/controller_createDispositvo.php" id="formulario-equipos">
                               <div class="row">
                                   <div class="col-md-6">
                                       <div class="mb-3">
                                           <label for="nequipo" class="form-label fw-medium" style="color: #495057;">Nombre Equipo</label>
                                           <input type="text" class="form-control" id="nequipo" name="nequipo"
                                               style="border-radius: 8px; border: 1px solid #ced4da; padding: 10px;"
                                               placeholder="Ej: Computadora Principal">
                                       </div>
                                       <p id="error-nequipo" class="error"></p>
                                   </div>
                                   <div class="col-md-6">
                                       <div class="mb-3">
                                           <label for="dptoequipo" class="form-label fw-medium" style="color: #495057;">Departamento</label>
                                           <input type="text" class="form-control" id="dptoequipo" name="dptoequipo"
                                               style="border-radius: 8px; border: 1px solid #ced4da; padding: 10px;"
                                               placeholder="Ej: Recursos Humanos">
                                       </div>
                                       <p id="error-dptoequipo" class="error"></p>
                                   </div>
                               </div>

                               <div class="row">
                                   <div class="col-md-6">
                                       <div class="mb-3">
                                           <label for="marcaequipo" class="form-label fw-medium" style="color: #495057;">Marca</label>
                                           <input type="text" class="form-control" id="marcaequipo" name="marcaequipo"
                                               style="border-radius: 8px; border: 1px solid #ced4da; padding: 10px;"
                                               placeholder="Ej: Dell, HP, etc.">
                                       </div>
                                       <p id="error-marcaequipo" class="error"></p>
                                   </div>
                                   <div class="col-md-6">
                                       <div class="mb-3">
                                           <label for="macequipo" class="form-label fw-medium" style="color: #495057;">
                                               <i class="fas fa-network-wired me-1"></i>Dirección MAC
                                           </label>
                                           <div class="input-group">
                                               <input type="text" class="form-control" id="macequipo" name="macequipo"
                                                   style="border-radius: 8px 0 0 8px; border: 1px solid #ced4da; padding: 10px;"
                                                   placeholder="Ej: 00:1A:2B:3C:4D:5E">
                                               <button class="btn btn-outline-secondary" type="button" id="btn"
                                                   texContent style="border-radius: 0 8px 8px 0; background-color: #e9ecef;">
                                                   <i class="fas fa-sync-alt"></i>
                                               </button>
                                               <p id="error-macequipo" class="error"></p>
                                           </div>
                                           <small class="form-text text-muted">Haga clic en el botón para obtener automáticamente la MAC</small>
                                       </div>
                                   </div>
                               </div>
                               <div>
                                   <p id="result"></p>
                               </div>
                               <div class="d-grid gap-2 mt-4">
                                   <button type="submit" class="btn btn-primary py-2 fw-medium"
                                       style="border-radius: 8px; background: linear-gradient(135deg, #112355ff 0%, #2575fc 100%); color: white; border: none;">
                                       <i class="fas fa-save me-2"></i>Registrar Dispositivo
                                   </button>
                               </div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>

           <!-- Incluir Font Awesome para los iconos -->
           <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
           <script>
               document.addEventListener("DOMContentLoaded", function() {
                   const formulario = document.getElementById("formulario-equipos");

                   const obtenerMac = document.getElementById('btn');

                   obtenerMac.addEventListener("click", mac);

                   function mac() {
                       const info = {
                           mac: document.querySelector('input[name="macequipo"]').value,
                       }

                       fetch('../AJAX/AJAX_Seguridad/obtenerMacEquipos.php', {
                               method: 'POST',
                               headers: {
                                   Accept: 'application/json',
                                   'Content-Type': 'application/json'
                               },
                               body: JSON.stringify(info)
                           })
                           .then(resp => resp.json())
                           .then(data => {
                               let campo = document.getElementById('macequipo').value;
                               let valor = (data.succes != "") ? data.succes : data.error;
                               document.getElementById('macequipo').value = valor;
                               obtenerMac.disabled = true;
                           })
                           .catch(error => {
                               console.log('Error! ' + error);
                           });
                   }

                   // Agregar manejador de evento para el envío del formulario
                   formulario.addEventListener('submit', function(e) {
                       e.preventDefault();
                       validarFormulario();
                   });

                   // Función para validar el formulario
                   function validarFormulario() {
                       let formularioValido = true;

                       // Campos a validar
                       const campos = [{
                               id: 'nequipo',
                               nombre: 'Nombre del equipo'
                           },
                           {
                               id: 'dptoequipo',
                               nombre: 'Departamento'
                           },
                           {
                               id: 'marcaequipo',
                               nombre: 'Marca'
                           },
                           {
                               id: 'macequipo',
                               nombre: 'Dirección MAC'
                           }
                       ];

                       // Validar cada campo
                       campos.forEach(campo => {
                           const input = document.getElementById(campo.id);
                           const errorElement = document.getElementById(`error-${campo.id}`);

                           if (input.value.trim() === '') {
                               // Mostrar error
                               mostrarError(errorElement, `El campo ${campo.nombre} es obligatorio`);
                               input.classList.add('error-field');
                               formularioValido = false;
                           } else {
                               // Limpiar error
                               limpiarError(errorElement);
                               input.classList.remove('error-field');
                           }
                       });


                       // Si el formulario es válido, enviarlo
                       if (formularioValido) {
                           alert('Formulario válido. Enviando datos...');
                           formulario.submit(); // Descomenta esta línea en producción
                       }
                   }

                   // Función para mostrar error
                   function mostrarError(elemento, mensaje) {
                       elemento.textContent = mensaje;
                       elemento.style.display = 'block';
                   }

                   // Función para limpiar error
                   function limpiarError(elemento) {
                       elemento.textContent = '';
                       elemento.style.display = 'none';
                   }
               })
           </script>