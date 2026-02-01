// Variable global para almacenar las reservas
let listaReservas;

document.addEventListener('DOMContentLoaded', () => {
    // Cargar las reservas cuando se carga la página
    cargarReservas();

    // Envio del formulario de edicion
    document.getElementById('editarReservaForm').addEventListener('submit', editarReserva);

    // Agregar event listeners a los filtros
    document.getElementById('filtroCiudad').addEventListener('change', aplicarFiltros);
    document.getElementById('filtroUsuario').addEventListener('input', aplicarFiltros);
    document.getElementById('filtroPrecioMinimo').addEventListener('input', aplicarFiltros);
    document.getElementById('filtroPrecioMaximo').addEventListener('input', aplicarFiltros);
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
            if (data.estado === 'error') {
                mostrarError(data.mensaje);
                return;
            }

            // Almacenar todas las reservas
            listaReservas = data.reservas;

            // Rellenar los filtros
            rellenarFiltros(data.reservas);

            // Mostrar las reservas
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
        html += `
                    <div class="col-lg-6 col-md-12 mb-4">
                        <div class="card reserva-card h-100">
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
                                    <div class="col-6">
                                        <p class="reserva-label mb-2">Precio Total:</p>
                                        <p class="reserva-precio">${reserva.precio_total} €</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="reserva-label mb-2">Usuario:</p>
                                        <p class="reserva-usuario">${reserva.usuario}</p>
                                    </div>
                                </div>

                            </div>
                            <div class="d-flex gestion-botones gap-2 card-footer">
                                <button
                                    class="btn btn-editar w-50"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editarReservaModal"
                                    data-id="${reserva.id_reserva}"
                                    data-fecha_inicio="${reserva.fecha_inicio}"
                                    data-fecha_fin="${reserva.fecha_final}"
                                    data-precio_total="${reserva.precio_total}">
                                    Editar
                                </button>
                                <button type="button" class="btn btn-cancelar w-50" onclick="cancelarReserva(${reserva.id_reserva})">
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
    if (errorDiv) {
        errorDiv.textContent = mensaje;
        errorDiv.style.display = 'block';
        
        setTimeout(() => {
            errorDiv.textContent = '';
            errorDiv.style.display = 'none';
        }, 5000);
    }
}

function rellenarFiltros(reservas) {
    // --- Filtro de ciudad --- //
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
    const usuario = document.getElementById('filtroUsuario').value;
    const precioMinimo = document.getElementById('filtroPrecioMinimo').value;
    const precioMaximo = document.getElementById('filtroPrecioMaximo').value;
    
    let reservasFiltradas = listaReservas;
    
    // Filtrar por ciudad
    if (ciudadSeleccionada) {
        reservasFiltradas = reservasFiltradas.filter(r => r.hotel_ciudad === ciudadSeleccionada);
    }

    // Filtrar por usuario
    if (usuario) {
        reservasFiltradas = reservasFiltradas.filter(r => r.usuario.includes(usuario));
    }
    
    // Filtrar por precio minimo
    if (precioMinimo) {
        reservasFiltradas = reservasFiltradas.filter(r => r.precio_total >= precioMinimo);
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
    if (confirm('¿Estás seguro de que deseas eliminar esta reserva?')) {
        fetch(`../PHP/eliminarReserva.php`, {
            method: 'POST',
            headers: {"Content-Type": "application/x-www-form-urlencoded"},
            body: `id_reserva=${encodeURIComponent(id_reserva)}`
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                if (data.estado === 'error') {
                    mostrarError(data.mensaje);
                    return;
                }

                cargarReservas();
            })
            .catch(error => {
                console.error('Error:', error);
                mostrarError('Error al eliminar la reserva');
            });
    }
}

function editarReserva(e) {
    e.preventDefault();
    
    const formularioReserva = document.getElementById('editarReservaForm');

    if (!formularioReserva.reportValidity()) { // Si los datos no son correctos
        return;
    }
    
    // El objeto FormData funciona como si obtuvieramos los valores 1 a 1
    // y los pusieramos luego en el body del fetch, pero es menos tedioso
    // y acaba siendo menos propenso a errores.
    // https://developer.mozilla.org/en-US/docs/Web/API/XMLHttpRequest_API/Using_FormData_Objects
    const formData = new FormData(formularioReserva);

    fetch('../PHP/editarReserva.php', {
        method: 'POST',
        body: formData  
    })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            if (data.estado === 'error') {
                mostrarError(data.mensaje);
                return;
            }

            // Cerrar el modal
            bootstrap.Modal.getInstance(document.getElementById('editarReservaModal')).hide();

            // Recargar las reservas
            cargarReservas();
        })
        .catch(error => {
            console.error('Error:', error);
            mostrarError('Error al editar la reserva');
        });
}