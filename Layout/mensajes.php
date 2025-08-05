<?php
session_start();
error_reporting(0);

//Validamos si la sesión errónea existe par así lanzar su respectivo mensaje
if (isset($_SESSION['mensaje']) && isset($_SESSION['icono'])) {
  $mensaje = $_SESSION['mensaje'];
  $icono = $_SESSION['icono'];
  $titulo = $_SESSION['titulo'];
?>
  <script>
    Swal.fire({
      position: "top-center",
      icon: "<?php echo $icono; ?>",
      title: "<?php echo $titulo; ?>",
      text: "<?php echo $mensaje; ?>",
      showConfirmButton: false,
      timer: 3500
    });
  </script>
<?php
  unset($_SESSION['titulo']);
  unset($_SESSION['mensaje']);
  unset($_SESSION['icono']);
}

if (isset($_SESSION['mensaje'])) {
?>
  <script>
    let timerInterval;
    Swal.fire({
      title: '<span style="font-size: 1.5em; color: #6c757d;">⏳</span>',
      html: `
                        <div style="font-size: 1.1em; margin: 1em 0;">
                        La ventana de carga se cerrará en <b style="color: #ff6b6b;"></b> milliseconds
                        </div>
                        <div style="margin: 1em 0; font-style: italic; color: #6c757d;">
                        ${getRandomFunMessage()}
                        </div>
                    `,
      timer: 2000,
      timerProgressBar: true,
      showConfirmButton: false,
      allowOutsideClick: false,
      didOpen: () => {
        Swal.showLoading();
        const timer = Swal.getPopup().querySelector("b");
        timerInterval = setInterval(() => {
          const timeLeft = Swal.getTimerLeft();
          timer.textContent = timeLeft;

          // Change color as time runs out
          if (timeLeft < 500) {
            timer.style.color = '#6c757d';
            timer.style.fontWeight = 'bold';
          } else if (timeLeft < 1000) {
            timer.style.color = '#6c757d';
          }
        }, 50);
      },
      willClose: () => {
        clearInterval(timerInterval);
      }
    }).then((result) => {
      if (result.dismiss === Swal.DismissReason.timer) {
        Swal.fire({
          title: 'Planilla registrada',
          text: 'Información almacenada exitosamente',
          icon: 'success',
          confirmButtonColor: '#4a6baf',
          showCancelButton: false,
          confirmButtonText: 'Aceptar',
          allowOutsideClick: false
        }).then((result) => {
          if (result.isConfirmed || result.dismiss === Swal.DismissReason.close) {
            // Abrir primero en nueva pestaña
            window.open('../reportes/emitirConstancia.php', '_blank');

            // Redirigir con pequeño retraso
            setTimeout(() => {
              window.location.href = '../reportes/emitirPlanilla.php';
            }, 100);
          }
        });
      }
    });

    function getRandomFunMessage() {
      const messages = [
        "¡Se está procesando la inscripción!",
        "¡La planilla de registró se está guardando!",
        "¡La información de la inscripción se está almacenando!",
        "Espera un poco mientras se almacena la información"
      ];
      return messages[Math.floor(Math.random() * messages.length)];
    }
  </script>
<?php
  unset($_SESSION['mensaje']);
}

if (isset($_SESSION['tittle']) && isset($_SESSION['text'])) {
  $titulo = $_SESSION['tittle'];
  $texto = $_SESSION['text'];

?>
  <script>
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: "btn btn-success",
        cancelButton: "btn btn-danger"
      },
      buttonsStyling: false
    });
    swalWithBootstrapButtons.fire({
      title: "<?php echo $titulo; ?>",
      text: "<?php echo $texto; ?>",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Sí, editar!",
      cancelButtonText: "No, cancelar!",
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        swalWithBootstrapButtons.fire({
          title: "",
          text: "Your file has been deleted.",
          icon: "success"
        }).then(() => {
          window.location.href = "../Configuration/functions_php/callEdit.php"; // Redirigir después de mostrar el mensaje
        });
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire({
          title: "Cancelled",
          text: "Your imaginary file is safe :)",
          icon: "error"
        });
      }
    });
  </script>
<?php
  unset($_SESSION['tittle']);
  unset($_SESSION['text']);
  unset($_SESSION['icon']);
}
