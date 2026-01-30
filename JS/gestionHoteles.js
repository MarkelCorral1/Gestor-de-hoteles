// Variable global para almacenar los hoteles
let listaHoteles;

document.addEventListener('DOMContentLoaded', () => {
    // Cargar los hoteles cuando se carga la página
    cargarHoteles();

    // Envio del formulario de edicion
    document.getElementById('editarHotelForm').addEventListener('submit', editarHotel);
});

function cargarHoteles() {
    fetch('../PHP/getHoteles.php')
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

            // Almacenar todos los hoteles
            listaHoteles = data.hoteles;

            // Mostrar los hoteles
            mostrarHoteles(data.hoteles);
        })
        .catch(error => {
            console.error('Error:', error);
            mostrarError('Error al cargar los hoteles');
        });
}

function mostrarHoteles(hoteles) {
    const container = document.getElementById('hotelesContainer');
    container.innerHTML = '';

    let html = '';

    hoteles.forEach(hotel => {
        html += `
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="gestion-card">
                    <h5>${hotel.ciudad}, ${hotel.pais}</h5>
                    <p class="descripcion">${hotel.descripcion}</p>

                    <div class="d-flex gestion-botones gap-2 mt-3">
                        <button
                            class="btn btn-editar w-50"
                            data-bs-toggle="modal"
                            data-bs-target="#editarHotelModal"
                            data-id="${hotel.id_hotel}"
                            data-pais="${hotel.pais}"
                            data-ciudad="${hotel.ciudad}"
                            data-descripcion="${hotel.descripcion}">
                            Editar
                        </button>
                        
                        <button
                            class="btn btn-eliminar w-50"
                            onclick="eliminarHotel(${hotel.id_hotel})">
                            Eliminar
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

function eliminarHotel(id_hotel) {
    if (confirm('Se borraran todas las reservas asociadas al hotel, ¿Estás seguro de que deseas eliminar este hotel?')) {
        fetch(`../PHP/eliminarHotel.php`, {
            method: 'POST',
            headers: {"Content-Type": "application/x-www-form-urlencoded"},
            body: `id_hotel=${encodeURIComponent(id_hotel)}`
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

                cargarHoteles();
            })
            .catch(error => {
                console.error('Error:', error);
                mostrarError('Error al eliminar el hotel');
            });
    }
}

function editarHotel(e) {
    e.preventDefault();
    
    const formularioHotel = document.getElementById('editarHotelForm');

    if (!formularioHotel.reportValidity()) { // Si los datos no son correctos
        return;
    }
    
    // El objeto FormData funciona como si obtuvieramos los valores 1 a 1
    // y los pusieramos luego en el body del fetch, pero es menos tedioso
    // y acaba siendo menos propenso a errores.
    // https://developer.mozilla.org/en-US/docs/Web/API/XMLHttpRequest_API/Using_FormData_Objects
    const formData = new FormData(formularioHotel);

    fetch('../PHP/editarHotel.php', {
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
            bootstrap.Modal.getInstance(document.getElementById('editarHotelModal')).hide();

            // Recargar los hoteles
            cargarHoteles();
        })
        .catch(error => {
            console.error('Error:', error);
            mostrarError('Error al editar el hotel');
        });
}
