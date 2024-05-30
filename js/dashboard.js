document.addEventListener('DOMContentLoaded', function () {

    avisoLimite();
    avisoLimite2();



    const openPopupBtn = document.getElementById('openPopupBtn');
    const popupModal = new bootstrap.Modal(document.getElementById('popupModal'));


    // Agrega un evento de clic al botón para abrir el modal
    openPopupBtn.addEventListener('click', function () {
        popupModal.show(); // Muestra el modal cuando se hace clic en el botón
    });

    function esCantidadValida(cantidad) { // valida un número entero o decimal con hasta dos decimales
        let validacion = /^[0-9]+(\.[0-9]{1,2})?$/;
        return validacion.test(cantidad.trim());
    }

    document.getElementById('formularioGasto').addEventListener('submit', function (event) {
        // Evitar el envío del formulario por defecto
        event.preventDefault();

        // Capturar los valores de los campos del formulario
        var titulo = document.getElementById('titulo').value;
        var cantidad = document.getElementById('cantidad').value;

        // Validar los campos del formulario
        var errores = false;

        if (titulo.trim() === '') {
            Swal.fire({
                title: 'Error',
                text: 'Mejor escribe algo en el título',
                icon: 'warning',
                confirmButtonText: 'Vale'
            });
            errores = true;
        }

        if (!esCantidadValida(cantidad)) {
            Swal.fire({
                title: 'Error',
                text: 'Eso no es un número válido',
                icon: 'warning',
                confirmButtonText: 'Vale'
            });
            errores = true;
        }
        // Si hay errores, no enviar el formulario
        if (errores) {
            return;
        }

        // Si no hay errores, enviar el formulario
        Swal.fire({
            title: '¡Muy bien!',
            text: 'Gasto añadido',
            icon: 'success',
            showConfirmButton: false,
            allowOutsideClick: false,
            allowEscapeKey: false,
            timer: 1500,
            timerProgressBar: true
        });

        setTimeout(() => {
            this.submit();
        }, 1500);
    });

    document.getElementById('logout').addEventListener('click', function (event) {
        event.preventDefault();  // Previene la acción por defecto del botón de logout

        Swal.fire({
            title: '¿Seguro que quieres cerrar sesión?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, cerrar sesión',
            cancelButtonText: 'No, cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Si se confirma, continúa con la acción de logout
                window.location.href = this.href;  // Redirige al href del enlace de logout
            } else {
                // Si se cancela, no hace nada
                // Esto se puede omitir ya que el preventDefault evita la acción por defecto
            }
        });
    });

    function avisoLimite() {
        let params = new URLSearchParams(window.location.search);

        let limite = params.get('limite');
        console.log('limite:', limite);

        const gastosSumaElement = document.getElementById('gastosSumaValue');

        const gastosSumaText = gastosSumaElement.textContent;

        const totalGastos = parseFloat(gastosSumaText.split('€')[0]);

        if (totalGastos > limite) {
            Swal.fire({
                title: 'Vaya...',
                text: 'Ya has superado el límite, ten cuidado',
                icon: 'warning',
                confirmButtonText: 'Entendido'
            });
            gastosSumaElement.style.color = 'red';
            gastosSumaElement.textContent += ' - Has superado el límite de dinero total (' + limite + '€)';
        }
    }

    function avisoLimite2() {
        // Obtener los límites de cada categoría
        let limiteComida = parseFloat(document.querySelector('input[name="limite_comida"]').value);
        let limiteHogar = parseFloat(document.querySelector('input[name="limite_hogar"]').value);
        let limiteRopa = parseFloat(document.querySelector('input[name="limite_ropa"]').value);
        let limiteJuegos = parseFloat(document.querySelector('input[name="limite_juegos"]').value);
        let limiteViajes = parseFloat(document.querySelector('input[name="limite_viajes"]').value);
        let limiteOtros = parseFloat(document.querySelector('input[name="limite_otros"]').value);
    
        // Obtener los datos de gastos por categoría del gráfico
        const categorias = [];
        const dineroPorCategoria = {};

        
    
        // Iterar sobre cada objeto en los datos
        datos.forEach(elemento => {
            const categoria = elemento.nombre_categoria;
            const cantidad = parseFloat(elemento.cantidad); // Convertir la cantidad a número flotante
            
            // Verificar si la categoría ya está en el array
            if (!categorias.includes(categoria)) {
                categorias.push(categoria);
                dineroPorCategoria[categoria] = cantidad; // Inicializar el gasto para esta categoría
            } else {
                dineroPorCategoria[categoria] += cantidad; // Sumar el gasto para esta categoría
            }
        });
        console.log(categorias)
    
        // Array para almacenar las categorías en las que se ha superado el límite
        const categoriasSuperadas = [];
        
        // Iterar sobre las categorías y comparar los gastos con los límites correspondientes
        categorias.forEach(categoria => {
            const gastoCategoria = dineroPorCategoria[categoria];
            switch (categoria) {
                case 'comida':
                    if (gastoCategoria > limiteComida) {
                        categoriasSuperadas.push('Comida');
                    }
                    break;
                case 'hogar':
                    if (gastoCategoria > limiteHogar) {
                        categoriasSuperadas.push('Hogar');
                    }
                    break;
                case 'ropa':
                    if (gastoCategoria > limiteRopa) {
                        categoriasSuperadas.push('Ropa');
                    }
                    break;
                case 'Juegos':
                    if (gastoCategoria > limiteJuegos) {
                        categoriasSuperadas.push('Juegos');
                    }
                    break;
                case 'Viajes':
                    if (gastoCategoria > limiteViajes) {
                        categoriasSuperadas.push('Viajes');
                    }
                    break;
                case 'Otros':
                    if (gastoCategoria > limiteOtros) {
                        categoriasSuperadas.push('Otros');
                    }
                    break;
                default:
                    break;
            }
        });
    
        // Si hay categorías superadas, mostrar la notificación
        if (categoriasSuperadas.length > 0) {
            const mensaje = `Has superado el límite de gastos en las siguientes categorías: ${categoriasSuperadas.join(', ')}`;
            mostrarNotificacion(mensaje);
        }
    }
    
    // Funciones mostrarNotificacion y marcarLimiteSuperado no cambian y se mantienen como en el ejemplo anterior
    
    
    function mostrarNotificacion(mensaje) {
        Swal.fire({
            title: 'Vaya...',
            text: mensaje,
            icon: 'warning',
            confirmButtonText: 'Entendido'
        });
    }

    

});
