document.addEventListener('DOMContentLoaded', function() {


    document.getElementById('logout').addEventListener('click', function(event) {
        let confirmacion = window.confirm('¿Quieres cerrar sesión?');
        if (!confirmacion) {
            event.preventDefault();
        }
    });

    // Filtrar por categoría
    document.getElementById('searchInput').addEventListener('keyup', function() {
        const searchTerm = this.value.toLowerCase();
        const rows = document.querySelectorAll('#expensesTable tbody tr');
        let hasVisibleRow = false;
        rows.forEach(row => {
            const category = row.cells[0].textContent.toLowerCase();
            if (category.includes(searchTerm)) {
                row.style.display = '';
                hasVisibleRow = true;
            } else {
                row.style.display = 'none';
            }
        });
        document.getElementById('noResultsMessage').style.display = hasVisibleRow ? 'none' : 'block';
    });

    // Ordenar columnas
    function sortTable(columnIndex) {
        const table = document.getElementById('expensesTable');
        const rows = Array.from(table.rows).slice(1);
        const isAscending = table.rows[0].cells[columnIndex].classList.toggle('asc');

        rows.sort((a, b) => {
            const aText = a.cells[columnIndex].textContent.trim();
            const bText = b.cells[columnIndex].textContent.trim();
            return isAscending
                ? aText.localeCompare(bText, undefined, { numeric: true })
                : bText.localeCompare(aText, undefined, { numeric: true });
        });

        rows.forEach(row => table.appendChild(row));
    }

    // Resaltar filas con cambios significativos
    document.addEventListener('DOMContentLoaded', function() {
        const rows = document.querySelectorAll('#expensesTable tbody tr');
        rows.forEach(row => {
            const diffText = row.cells[3].textContent;
            if (diffText.includes('más')) {
                row.classList.add('highlight-positive');
            } else if (diffText.includes('menos')) {
                row.classList.add('highlight-negative');
            }
        });
    });


});
