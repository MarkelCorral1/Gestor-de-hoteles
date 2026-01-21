const modalHotel = document.getElementById('editarHotelModal');

modalHotel.addEventListener('show.bs.modal', event => {
    const botonEditar = event.relatedTarget;

    console.log(event);
    

    document.getElementById('id_hotel').value = botonEditar.getAttribute('data-id');
    document.getElementById('edit-pais').value = botonEditar.getAttribute('data-pais');
    document.getElementById('edit-ciudad').value = botonEditar.getAttribute('data-ciudad');
    document.getElementById('edit-descripcion').value = botonEditar.getAttribute('data-descripcion');
});