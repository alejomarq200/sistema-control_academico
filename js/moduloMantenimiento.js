  document.addEventListener('DOMContentLoaded', function() {
        const restoreForm = document.getElementById('restore-form');
        const fileInput = document.getElementById('backup_file');
        const fileError = document.getElementById('file-error');

        // Validación antes de enviar el formulario de restore
        restoreForm.addEventListener('submit', function(e) {
            if (!fileInput.files.length) {
                e.preventDefault();
                showError('Por favor, seleccione un archivo de backup');
                return;
            }

            const file = fileInput.files[0];
            const fileName = file.name;
            const fileExt = fileName.split('.').pop().toLowerCase();

            if (fileExt !== 'sql') {
                e.preventDefault();
                showError('El archivo debe tener extensión .sql');
                return;
            }

            if (file.size > 10 * 1024 * 1024) { // 10MB máximo
                e.preventDefault();
                showError('El archivo es demasiado grande (máximo 10MB)');
                return;
            }
        });

        // Validación en tiempo real del archivo seleccionado
        fileInput.addEventListener('change', function() {
            if (this.files.length) {
                const file = this.files[0];
                const fileName = file.name;
                const fileExt = fileName.split('.').pop().toLowerCase();

                if (fileExt !== 'sql') {
                    showError('Solo se permiten archivos .sql');
                    this.value = ''; // Limpiar el input
                } else if (file.size > 10 * 1024 * 1024) {
                    showError('El archivo es demasiado grande (máximo 10MB)');
                    this.value = ''; // Limpiar el input
                } else {
                    hideError();
                }
            }
        });

        function showError(message) {
            fileError.textContent = message;
            fileError.style.display = 'block';
        }

        function hideError() {
            fileError.style.display = 'none';
        }
    });