const modalReserva = document.getElementById('editarReservaModal');

modalReserva.addEventListener('show.bs.modal', event => {
    const botonEditar = event.relatedTarget;

    console.log(event);
    

    document.getElementById('id_reserva').value = botonEditar.getAttribute('data-id');
    document.getElementById('edit-fecha_inicio').value = botonEditar.getAttribute('data-fecha_inicio');
    document.getElementById('edit-fecha_fin').value = botonEditar.getAttribute('data-fecha_fin');
    document.getElementById('edit-precio_total').value = botonEditar.getAttribute('data-precio_total');
});