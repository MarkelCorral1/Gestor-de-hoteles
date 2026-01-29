// Variable global para almacenar los hoteles
let listaHoteles;

document.addEventListener('DOMContentLoaded', () => {
    // Cargar los hoteles cuando se carga la página
    cargarHoteles();
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
                <div class="gestion-hotel-card">
                    <h5>${hotel.ciudad}, ${hotel.pais}</h5>
                    <p class="descripcion">${hotel.descripcion}</p>

                    <div class="d-flex gestion-hoteles-botones gap-2 mt-3">
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
    if (confirm('¿Estás seguro de que deseas eliminar este hotel?')) {
        fetch(`../PHP/eliminarHotel.php?id_hotel=${encodeURIComponent(id_hotel)}`, {
            method: 'POST'
        })
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

                cargarHoteles();
            })
            .catch(error => {
                console.error('Error:', error);
                mostrarError('Error al eliminar el hotel');
            });
    }
}
