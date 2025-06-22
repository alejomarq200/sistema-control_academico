 document.getElementById('txtFiltarr').addEventListener('input', function () {
            const filtro = this.value.toLowerCase(); // Texto del filtro en minúsculas
            const filas = document.querySelectorAll('tbody tr'); // Todas las filas de la tabla

            filas.forEach(fila => {
                const textoFila = fila.textContent.toLowerCase(); // Texto de la fila en minúsculas
                if (textoFila.includes(filtro)) {
                    fila.style.display = ''; // Muestra la fila si coincide
                } else {
                    fila.style.display = 'none'; // Oculta la fila si no coincide
                }
            });
        });