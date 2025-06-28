<div class="modal fade" id="formModalDescargarC" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Información Estudiante</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../controller_php/controladorDescargarCalificacion.php" method="POST"
                    id="formCalificacion">
                    <div class="mb-3">
                        <label for="vacunas_est" class="form-label">Año Escolar</label>
                        <input type="text" class="form-control" id="añoEscolar" name="añoEscolar" readonly>
                        <p class="error" id="añoEscolarCalfError"></p>
                    </div>
                    <div class="mb-3">
                        <label for="enfermedad_est" class="form-label">Enfermedades</label>
                        <select class="form-control" name="lapsos" id="lapsos">
                            <option value="Seleccionar">Seleccionar</option>
                            <option value="1er Lapso">1er Lapso</option>
                            <option value="2do Lapso">2do Lapso</option>
                            <option value="3er Lapso">3er Lapso</option>
                            <option value="All">Todas las las calificaciones</option>
                        </select>
                        <p class="error" id="lapsosCalfError"></p>
                    </div>
                    <input type="hidden" id="formatoDescarga" name="formatoDescarga" value="">
                    <button type="button" class="btn btn-success" style="width: 100%;" id="btnGenerarReporte">Generar
                        Reporte</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Obtener el año actual
        const añoActual = new Date().getFullYear();
        // Calcular el año siguiente
        const añoSiguiente = añoActual + 1;
        // Formatear como "2024-2025"
        const añoEscolar = `${añoActual}-${añoSiguiente}`;

        // Asignar el valor al input
        document.getElementById('añoEscolar').value = añoEscolar;

        const btnGenerarReporte = document.getElementById('btnGenerarReporte');
        const formCalificacion = document.getElementById('formCalificacion');
        const formatoDescarga = document.getElementById('formatoDescarga');

        btnGenerarReporte.addEventListener('click', function (e) {
            let isValid = true;

            // Validar campo vacunas
            if (!document.getElementById('añoEscolar').value.trim()) {
                document.getElementById('añoEscolarCalfError').textContent = 'Este campo es requerido';
                isValid = false;
            } else {
                document.getElementById('añoEscolarCalfError').textContent = '';
            }

            // Validar lapsos
            let lapsos = document.getElementById('lapsos').value.trim();
            if (lapsos !== "1er Lapso" && lapsos !== "2do Lapso" && lapsos !== "3er Lapso" && lapsos !== "All") {
                document.getElementById('lapsosCalfError').textContent = 'Este campo es requerido';
                isValid = false;
            } else {
                document.getElementById('lapsosCalfError').textContent = '';
            }

            if (!isValid) {
                e.preventDefault();
            } else {
                Swal.fire({
                title: 'Descargar reporte',
                text: 'Seleccione el formato de descarga',
                icon: 'info',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'PDF',
                denyButtonText: 'Excel',
                cancelButtonText: 'Cancelar',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Seleccionó PDF
                    formatoDescarga.value = 'pdf';
                    formCalificacion.submit();
                } else if (result.isDenied) {
                    // Seleccionó Excel
                    formatoDescarga.value = 'excel';
                    formCalificacion.submit();
                }
                // Si cancela, no hacemos nada
            });
            }
            
        });
});
</script>