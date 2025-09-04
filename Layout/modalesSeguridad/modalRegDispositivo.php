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
                           <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" id="formulario-equipos">
                               <div class="row">
                                   <div class="mb-3">
                                       <label for="usuario_equipo" class="form-label fw-medium" style="color: #495057;">Seleccione el usuario</label>
                                       <select class="form-select" name="usuario_equipo" id="usuario_equipo" style="height: 40px; border-radius:8px;">
                                           <?php
                                            // Consulta SQL
                                            include("../Configuration/Configuration.php");
                                            function obtenerUsuarios($pdo)
                                            {

                                                try {
                                                    $sql = "SELECT id, nombres FROM users WHERE id_rol = 1 OR id_rol = 2 AND id_estado = 2";
                                                    $stmt = $pdo->prepare($sql);
                                                    $stmt->execute();
                                                    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                } catch (PDOException $e) {
                                                    die("Error en la consulta: " . $e->getMessage());
                                                }
                                                if (count($resultados) > 0) {
                                                    foreach ($resultados as $fila) {
                                                        echo "<option value='" . $fila['id'] . "'>" . $fila['nombres'] . "</option>";
                                                    }
                                                } else {
                                                    echo "<option value=''>No hay opciones disponibles</option>";
                                                }
                                            }
                                            obtenerUsuarios($pdo);
                                            ?>
                                       </select>
                                   </div>
                                   <p id="error-usuario_equipo" class="error"></p>
                                   <div class="mb-3">
                                       <label for="nequipo" class="form-label fw-medium" style="color: #495057;">Nombre Equipo</label>
                                       <input type="text" class="form-control" id="nequipo" name="nequipo"
                                           style="border-radius: 8px; border: 1px solid #ced4da; padding: 10px;"
                                           placeholder="Ej: Computadora Principal">
                                   </div>
                                   <p id="error-nequipo" class="error"></p>
                                   <div class="mb-3">
                                       <label for="dptoequipo" class="form-label fw-medium" style="color: #495057;">Departamento</label>
                                       <input type="text" class="form-control" id="dptoequipo" name="dptoequipo"
                                           style="border-radius: 8px; border: 1px solid #ced4da; padding: 10px;"
                                           placeholder="Ej: Recursos Humanos">
                                   </div>
                                   <p id="error-dptoequipo" class="error"></p>
                               </div>
                               <div id="mensaje">

                               </div>
                               <div class="d-grid gap-2 mt-4">
                                   <button type="submit" class="btn btn-primary py-2 fw-medium" id="btnRegistrar"
                                       style="border-radius: 8px; background: linear-gradient(135deg, #112355ff 0%, #2575fc 100%); color: white; border: none;">
                                       <i class="fas fa-save me-2"></i>Registrar Dispositivo
                                   </button>
                               </div>
                       </div>
                       </form>
                   </div>
               </div>
           </div>
           </div>

           <!-- Incluir Font Awesome para los iconos -->
           <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
           <!-- FingerprintJS -->
           <script src="https://cdn.jsdelivr.net/npm/@fingerprintjs/fingerprintjs@3/dist/fp.min.js"></script>
           <script>
               document.addEventListener("DOMContentLoaded", function() {
                   const formulario = document.getElementById("formulario-equipos");

                   FingerprintJS.load().then(fp => {
                       fp.get().then(result => {
                           visitorId = result.visitorId;
                           document.querySelector("#btnRegistrar").disabled = false;
                       });
                   });

                   function registrarDispositivo() {
                       if (!visitorId) {
                           console.error("El visitorId aún no está listo 🚫");
                           return;
                       }

                       // Inicializar fingerprint
                       FingerprintJS.load().then(fp => {
                           fp.get().then(result => {
                               const visitorId = result.visitorId;
                               const mensaje = document.getElementById('mensaje');
                               let usuario = document.getElementById('usuario_equipo').value;
                               const id_token = document.getElementById('id_equipo');
                               const nequipo  = document.getElementById('nequipo').value;
                               const dptoequipo = document.getElementById('dptoequipo').value;

                               console.log("Fingerprint:", visitorId);


                               // Llamada al servidor para validar o registrar
                               fetch("../AJAX/AJAX_Seguridad/registrar_dispositivos.php", {
                                       method: "POST",
                                       headers: {
                                           "Content-Type": "application/json"
                                       },
                                       body: JSON.stringify({
                                           device_id: visitorId,
                                           usuario: usuario,
                                           nombre_equipo: nequipo,
                                           dpto_equipo: dptoequipo
                                       })
                                   })
                                   .then(res => res.json())
                                   .then(data => {
                                       console.log(data);
                                       if (data.status === "ok") {
                                           if (data.source === "exist_device") {
                                               mensaje.style.color = '#a30b0bff';
                                               mensaje.textContent = 'Solo puede registrar un dispositivo en este equipo. Contacte al administrador';

                                           } else if (data.source === 'new_device_registered') {
                                               mensaje.style.color = '#0f8f0fff';
                                               mensaje.textContent = 'Se registró el dispositivo con éxito';
                                               // Simular un breve retraso antes de redirigir
                                               setTimeout(() => {
                                                   formulario.reset();
                                               }, 1500);
                                           }
                                       } else {
                                           if (data.source === "exist_user") {
                                               mensaje.style.color = '#a30b0bff';
                                               mensaje.textContent = 'El usuario ya posee un equipo con acceso al sistema. Verifique';
                                           }
                                       }
                                   })
                                   .catch(error => {
                                       console.error("Error en la validación:", error);
                                   });
                           });
                       }).catch(error => {
                           console.error("Error con FingerprintJS:", error);
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
                               id: 'usuario_equipo',
                               nombre: 'Usuario del equipo',
                           },
                           {
                               id: 'nequipo',
                               nombre: 'Nombre del equipo'
                           },
                           {
                               id: 'dptoequipo',
                               nombre: 'Departamento'
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
                           registrarDispositivo();
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