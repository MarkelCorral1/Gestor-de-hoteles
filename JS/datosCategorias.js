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

                // Recorrer todos los servicios y sus valores
                Object.entries(data.servicios).forEach(([nombre, tiene]) => {
                    console.log(`${nombre} : ${tiene}`);
                });
            } else {
                console.error('Error:', data.message);
            }
    });
}

fetchCategoria('stroll');