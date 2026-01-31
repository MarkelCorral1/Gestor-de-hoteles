const modalUsuario = document.getElementById('editarUsuarioModal');

modalUsuario.addEventListener('show.bs.modal', event => {
    const botonEditar = event.relatedTarget;

    document.getElementById('id_usuario').value = botonEditar.getAttribute('data-id');
    document.getElementById('edit-username').value = botonEditar.getAttribute('data-username');
    document.getElementById('edit-email').value = botonEditar.getAttribute('data-email');
    document.getElementById('edit-tipo').value = botonEditar.getAttribute('data-tipo');
});