// Variable global para almacenar las reservas
let listaReservas;

document.addEventListener('DOMContentLoaded', () => {
    // Cargar las reservas cuando se carga la página
    cargarReservas();
    
    // Agregar event listeners a los filtros
    document.getElementById('filtroCiudad').addEventListener('change', aplicarFiltros);
    document.getElementById('filtroPrecio').addEventListener('input', aplicarFiltros);
});

function cargarReservas() {
    fetch('../PHP/getReservas.php')
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            if (data.error) {
                mostrarError(data.error);
                return;
            }

            // Almacenar todas las reservas
            listaReservas = data.reservas;

            if (data.reservas.length === 0) {
                document.getElementById('mensajeVacio').style.display = 'block';
            }

            // Rellenar los filtros
            rellenarFiltros(data.reservas);
            
            mostrarReservas(data.reservas);
        })
        .catch(error => {
            console.error('Error:', error);
            mostrarError('Error al cargar las reservas');
        });
}

function mostrarReservas(reservas) {
    const container = document.getElementById('reservasContainer');
    container.innerHTML = '';

    let html = '';

    reservas.forEach(reserva => {
        const fechaInicio = new Date(reserva.fecha_inicio.split('/').reverse().join('-'));
        const esPasada = new Date() > fechaInicio;
        const clasesPasada = esPasada ? 'reserva-pasada' : '';
        const estadoTexto = esPasada ? '(Pasada)' : '';

        html += `
                    <div class="col-lg-6 col-md-12 mb-4">
                        <div class="card reserva-card h-100 ${clasesPasada}">
                            <div class="card-header">
                                <h5 class="reserva-ciudad mb-0">${reserva.hotel_ciudad}</h5>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <p class="reserva-label mb-2">Habitación:</p>
                                        <p class="reserva-dato">${reserva.categoria_nombre} #${reserva.id_habitacion}</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="reserva-label mb-2">ID Reserva:</p>
                                        <p class="reserva-dato">${reserva.id_reserva}</p>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <p class="reserva-label mb-2">Entrada:</p>
                                        <p class="reserva-dato">${reserva.fecha_inicio}</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="reserva-label mb-2">Salida:</p>
                                        <p class="reserva-dato">${reserva.fecha_final}</p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-6">
                                        <p class="reserva-label mb-2">Duración:</p>
                                        <p class="reserva-dato">${reserva.dias} noches</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="reserva-label mb-2">Personas:</p>
                                        <p class="reserva-dato">${reserva.numero_personas}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <p class="reserva-label mb-2">Precio Total:</p>
                                        <p class="reserva-precio">${reserva.precio_total} €</p>
                                    </div>
                                </div>

                                <p class="reserva-estado">${estadoTexto}</p>
                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-cancelar" onclick="cancelarReserva(${reserva.id_reserva})">
                                    Cancelar reserva
                                </button>
                            </div>
                        </div>
                    </div>
                `;
    });

    container.innerHTML = html;
}

function mostrarError(mensaje) {
    const errorDiv = document.getElementById('mensajeError');
    errorDiv.textContent = mensaje;
    errorDiv.style.display = 'block';
    
    setTimeout(() => {
        errorDiv.textContent = '';
        errorDiv.style.display = 'none';
    }, 5000);
}

function rellenarFiltros(reservas) {
    const selectCiudad = document.getElementById('filtroCiudad');
    selectCiudad.innerHTML = `<option value="">Todas las ciudades</option>`

    // Obtener ciudades únicas
    const ciudades = new Set(reservas.map(r => r.hotel_ciudad));
    
    // Añadir las ciudades al filtro
    ciudades.forEach(ciudad => {
        const option = document.createElement('option');
        option.value = ciudad;
        option.textContent = ciudad;
        selectCiudad.appendChild(option);
    });
}

function aplicarFiltros() {
    const ciudadSeleccionada = document.getElementById('filtroCiudad').value;
    const precioMaximo = document.getElementById('filtroPrecio').value;
    
    let reservasFiltradas = listaReservas;
    
    // Filtrar por ciudad
    if (ciudadSeleccionada) {
        reservasFiltradas = reservasFiltradas.filter(r => r.hotel_ciudad === ciudadSeleccionada);
    }
    
    // Filtrar por precio maximo
    if (precioMaximo) {
        reservasFiltradas = reservasFiltradas.filter(r => r.precio_total <= precioMaximo);
    }
    
    if (reservasFiltradas.length === 0) { // Si no hay reservas
        document.getElementById('reservasContainer').innerHTML = '';
        document.getElementById('mensajeVacio').innerHTML = '<h5>No hay reservas que coincidan con los filtros aplicados.</h5>';
        document.getElementById('mensajeVacio').style.display = 'block';
    } else {
        document.getElementById('mensajeVacio').style.display = 'none';
        mostrarReservas(reservasFiltradas);
    }
}

function cancelarReserva(id_reserva) {
    if (confirm('¿Estás seguro de que deseas cancelar esta reserva?')) {
        fetch(`../PHP/cancelarReserva.php?id_reserva=${encodeURIComponent(id_reserva)}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                console.log(data);

                if (data.estado === 'error') {
                    mostrarError(data.mensaje);
                    return;
                }

                cargarReservas();
            })
            .catch(error => {
                console.error('Error:', error);
                mostrarError('Error al cargar las reservas');
            });
    }
}
