<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validación de Dispositivo</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background: #f5f5f5;
        }
        
        .container {
            width: 100%;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: #4285f4;
        }
        
        .spinner-container {
            position: relative;
            width: 200px;
            height: 200px;
            margin-bottom: 20px;
        }
        
        .spinner {
            width: 100%;
            height: 100%;
            border: 7px solid rgba(255, 255, 255, 0.3);
            border-top-color: #fff;
            border-radius: 50%;
            animation: spinner 0.7s linear infinite;
        }
        
        .logo-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 150px;
            height: 150px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: white;
            border-radius: 50%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        .logo-container img {
            max-width: 80%;
            max-height: 80%;
            object-fit: contain;
        }
        
        .status-message {
            color: white;
            text-align: center;
            margin-top: 20px;
            min-height: 60px;
            padding: 0 20px;
        }
        
        .btn {
            margin-top: 20px;
            padding: 10px 20px;
            background: white;
            color: #4285f4;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
            display: none;
        }
        
        .btn:hover {
            background: #f0f0f0;
        }
        
        @keyframes spinner {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }
        
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="spinner-container">
            <div class="spinner"></div>
            <div class="logo-container">
                <img src="../imgs/logo_sin_fondo.png" alt="Logo">
            </div>
        </div>
        
        <div class="status-message" id="statusMessage">
            Validando dispositivo, por favor espere...
        </div>
        
        <button class="btn" id="retryBtn">Reintentar</button>
    </div>

    <!-- Incluir la librería FingerprintJS -->
    <script src="https://cdn.jsdelivr.net/npm/@fingerprintjs/fingerprintjs@3/dist/fp.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const spinner = document.querySelector('.spinner');
            const statusMessage = document.getElementById('statusMessage');
            const retryBtn = document.getElementById('retryBtn');
            
            // Función para validar el dispositivo
            function validateDevice() {
                // Reiniciar estado visual
                spinner.style.animationPlayState = 'running';
                spinner.style.borderColor = 'rgba(255, 255, 255, 0.3)';
                spinner.style.borderTopColor = '#fff';
                statusMessage.textContent = 'Validando dispositivo, por favor espere...';
                statusMessage.style.color = 'white';
                retryBtn.style.display = 'none';
                
                // Simular un tiempo de carga antes de la validación real
                setTimeout(() => {
                    // Inicializar fingerprint
                    FingerprintJS.load().then(fp => {
                        fp.get().then(result => {
                            const visitorId = result.visitorId;
                            console.log("Fingerprint:", visitorId);

                            // Llamada al servidor para validar o registrar
                            fetch("../AJAX/AJAX_Seguridad/valida_dispositivo.php", {
                                method: "POST",
                                headers: {
                                    "Content-Type": "application/json"
                                },
                                body: JSON.stringify({
                                    device_id: visitorId,
                                    user_id: 5  // el ID del usuario autenticado
                                })
                            })
                            .then(res => res.json())
                            .then(data => {
                                console.log(data);
                                if (data.status === "ok") {
                                    statusMessage.textContent = "¡Dispositivo validado con éxito! Redirigiendo...";
                                    statusMessage.style.color = '#e0ffe0';
                                    
                                    // Simular un breve retraso antes de redirigir
                                    setTimeout(() => {
                                        window.location.href = "Logear.php"; // Cambia por tu URL de destino
                                    }, 1500);
                                } else {
                                    // Acceso denegado
                                    spinner.style.animationPlayState = 'paused';
                                    spinner.style.borderColor = '#ff6b6b';
                                    statusMessage.textContent = "Acceso denegado al dispositivo. Contacte al administrador.";
                                    statusMessage.style.color = '#ffebee';
                                    retryBtn.style.display = 'block';
                                }
                            })
                            .catch(error => {
                                console.error("Error en la validación:", error);
                                spinner.style.animationPlayState = 'paused';
                                spinner.style.borderColor = '#ff6b6b';
                                statusMessage.textContent = "Error de conexión. Por favor, intente nuevamente.";
                                statusMessage.style.color = '#ffebee';
                                retryBtn.style.display = 'block';
                            });
                        });
                    }).catch(error => {
                        console.error("Error con FingerprintJS:", error);
                        spinner.style.animationPlayState = 'paused';
                        spinner.style.borderColor = '#ff6b6b';
                        statusMessage.textContent = "Error técnico. Por favor, intente nuevamente.";
                        statusMessage.style.color = '#ffebee';
                        retryBtn.style.display = 'block';
                    });
                }, 2000); // Simular 2 segundos de "carga"
            }
            
            // Iniciar la validación cuando la página cargue
            validateDevice();
            
            // Configurar el botón de reintento
            retryBtn.addEventListener('click', validateDevice);
        });
    </script>
</body>
</html>