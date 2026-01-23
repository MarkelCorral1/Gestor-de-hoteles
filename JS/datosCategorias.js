// nombres bootstrap de los iconos de servicios (balcon, yakushi, spa, mayordomo, limusina, helicoptero)
iconosServicios = {
    balcon: 'bi-building',
    yakushi: 'bi-droplet-half',
    spa: 'bi-flower2',
    mayordomo: 'bi-person-bounding-box',
    limusina: 'bi-car-front',
    helicoptero: 'bi-airplane'
}
document.addEventListener('DOMContentLoaded', () => {
    const categorias = document.querySelectorAll('.categorie-item');

    categorias.forEach(item => {
        item.addEventListener('click', (ev) => {
            const catNombre = ev.target.getAttribute('data-categoria');
            

            categorias.forEach(c => c.classList.remove('active'));
            ev.target.classList.add('active');
            
            // Llamada Fetch
            fetchCategoria(catNombre);
        });
    });
});

function fetchCategoria(catNombre) {
    fetch(`../PHP/getCategoriaHabitacion.php?categoria=${encodeURIComponent(catNombre)}`)
        .then(res => res.json())
        .then(data => {
            if(data.status === 'success') {
                console.log(data);
                
                // 1. Actualizar Imágenes
                const imgElements = document.querySelectorAll('.img-categoria img');
                imgElements.forEach((img, index) => {
                        img.src =  `../images/habitaciones/${data.nombre}_${index + 1}.png`;
                        img.alt = `${data.nombre}_img_${index + 1}`;
                });

                document.getElementById('cat-titulo').innerText = data.nombre;
                document.getElementById('cat-precio').innerText = data.precio;
                document.getElementById('cat-metros').innerText = data.metros;
                document.getElementById('cat-camas').innerText = data.camas;

                // Actualizarlo en el modal de reserva
                document.getElementById('reserva-id-categoria').value = data.id;
                volverAPaso1();

                let servicios  = document.getElementById('servicios-lista');
                // Wifi, Parking, Desayuno, Piscina, Gimnasio, Cine, Sala conferencias, Sala juegos, casino incluidos
                servicios.innerHTML = '<div class="servicio-item servicio-item d-flex align-items-center bg-danger bg-gradient rounded p-1"><span>Wifi</span><i class="ms-2 fs-4 bi bi-wifi"></i></div>' +
                                     '<div class="servicio-item servicio-item d-flex align-items-center bg-danger bg-gradient rounded p-1"><span>Parking</span><i class="ms-2 fs-4 bi bi-p-square"></i></div>' +
                                     '<div class="servicio-item servicio-item d-flex align-items-center bg-danger bg-gradient rounded p-1"><span>Desayuno</span><i class="ms-2 fs-4 bi bi-cup-straw"></i></div>' +
                                     '<div class="servicio-item servicio-item d-flex align-items-center bg-danger bg-gradient rounded p-1"><span>Piscina</span><i class="ms-2 fs-4 bi bi-water"></i></div>' +
                                     '<div class="servicio-item servicio-item d-flex align-items-center bg-danger bg-gradient rounded p-1"><span>Gimnasio</span><i class="ms-2 fs-4 bi bi-lightning-charge"></i></div>' +
                                     '<div class="servicio-item servicio-item d-flex align-items-center bg-danger bg-gradient rounded p-1"><span>Cine</span><i class="ms-2 fs-4 bi bi-film"></i></div>' +
                                     '<div class="servicio-item servicio-item d-flex align-items-center bg-danger bg-gradient rounded p-1"><span>Sala conferencias</span><i class="ms-2 fs-4 bi bi-easel"></i></div>' +
                                     '<div class="servicio-item servicio-item d-flex align-items-center bg-danger bg-gradient rounded p-1"><span>Sala juegos</span><i class="ms-2 fs-4 bi bi-controller"></i></div>' +
                                     '<div class="servicio-item servicio-item d-flex align-items-center bg-danger bg-gradient rounded p-1"><span>Casino</span><i class="ms-2 fs-4 bi bi-dice-6"></i></div>';

                // Recorrer todos los servicios y sus valores
                Object.entries(data.servicios).forEach(([nombre, tiene]) => {
                    console.log(`${nombre} : ${tiene}`);
                    if (tiene) {
                        // pasar a innerHTML
                        servicios.innerHTML +=
                            `<div class="servicio-item servicio-item d-flex align-items-center bg-danger bg-gradient rounded p-1"><span>${nombre}</span><i class="ms-2 fs-4 bi ${iconosServicios[nombre]}"></i></div>`;
                    }
                });
            } else {
                console.error('Error:', data.message);
            }
    });
}

fetchCategoria('stroll');