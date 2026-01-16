const modal = document.getElementById('editarUsuarioModal');

modal.addEventListener('show.bs.modal', event => {
    const botonEditar = event.relatedTarget;

    document.getElementById('edit-id').value = botonEditar.getAttribute('data-id');
    document.getElementById('edit-username').value = botonEditar.getAttribute('data-username');
    document.getElementById('edit-tipo').value = botonEditar.getAttribute('data-tipo');
});