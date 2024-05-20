let lista = document.getElementById('jsonDatos').value;
const datos = JSON.parse(lista);
const categorias = [];

// Itera sobre cada objeto en el JSON
datos.forEach(elemento => {
    const categoria = elemento.nombre_categoria;
    // Verifica si la categoría ya está en el array
    if (!categorias.includes(categoria)) {
        // Si no está, agrégala
        categorias.push(categoria);
    }
});

const dineroPorCategoria = {};

// Itera sobre cada objeto en el JSON
datos.forEach(elemento => {
    const categoria = elemento.nombre_categoria;
    const cantidad = parseFloat(elemento.cantidad); // Convertir la cantidad a número flotante
    // Sumar la cantidad de dinero al objeto dineroPorCategoria, utilizando la categoría como clave
    if (dineroPorCategoria[categoria]) {
        dineroPorCategoria[categoria] += cantidad;
    } else {
        dineroPorCategoria[categoria] = cantidad;
    }
});

const data = {
    labels: categorias,
    datasets: [{
        label: 'Gastos en esta categoria',
        data: categorias.map(categoria => dineroPorCategoria[categoria]),
        backgroundColor: [
            'rgba(255, 99, 132, 0.5)',
            'rgba(54, 162, 235, 0.5)',
            'rgba(75, 192, 192, 0.5)',
            'rgba(255, 206, 86, 0.5)',
            'rgba(153, 102, 255, 0.5)',
            'rgba(255, 159, 64, 0.5)'
        ],
        borderColor: [
            'rgba(255, 99, 132, 0.5)',
            'rgba(54, 162, 235, 0.5)',
            'rgba(75, 192, 192, 0.5)',
            'rgba(255, 206, 86, 0.5)',
            'rgba(153, 102, 255, 0.5)',
            'rgba(255, 159, 64, 0.5)'
        ],
        borderWidth: 1
    }]
};

// Configuración del gráfico de pastel
const config = {
    type: 'pie',
    data: data,
};

// Crear el gráfico de pastel
const ctx = document.getElementById('grafico').getContext('2d');
new Chart(ctx, config);