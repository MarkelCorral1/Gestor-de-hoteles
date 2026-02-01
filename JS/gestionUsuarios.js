// Variable global para almacenar los usuarios
let listaUsuarios;

document.addEventListener('DOMContentLoaded', () => {
    // Cargar los usuarios cuando se carga la página
    cargarUsuarios();

    // Envio del formulario de edicion
    document.getElementById('editarUsuarioForm').addEventListener('submit', editarUsuario);

    // Agregar event listeners a los filtros
    document.getElementById('filtroTipo').addEventListener('change', aplicarFiltros);
    document.getElementById('filtroUsername').addEventListener('input', aplicarFiltros);
    document.getElementById('filtroEmail').addEventListener('input', aplicarFiltros);
});

function cargarUsuarios() {
    fetch('../PHP/getUsuarios.php')
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

            // Almacenar todos los usuarios
            listaUsuarios = data.usuarios;

            // Mostrar los usuarios
            mostrarUsuarios(data.usuarios);
        })
        .catch(error => {
            console.error('Error:', error);
            mostrarError('Error al cargar los usuarios');
        });
}

function mostrarUsuarios(usuarios) {
    const container = document.getElementById('usuariosContainer');
    container.innerHTML = '';

    let html = '';

    usuarios.forEach(usuario => {
        const tipoClass = usuario.tipo === 'admin' ? 'admin-user' : 'normal-user';
        html += `
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="gestion-card ${tipoClass}">
                    <h5>${usuario.username}</h5>
                    <div class="h-100">
                        <p class="px-3 text-break"><strong>Email:</strong> ${usuario.email}</p>
                        <p class="px-3"><strong>Tipo:</strong> ${usuario.tipo}</p>
                    </div>
                    <div class="d-flex gestion-botones gap-2 mt-3">
                        <button
                            class="btn btn-editar w-50"
                            data-bs-toggle="modal"
                            data-bs-target="#editarUsuarioModal"
                            data-id="${usuario.id_usuario}"
                            data-username="${usuario.username}"
                            data-email="${usuario.email}"
                            data-tipo="${usuario.tipo}">
                            Editar
                        </button>
                        
                        <button
                            class="btn btn-eliminar w-50"
                            onclick="eliminarUsuario(${usuario.id_usuario})">
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

function aplicarFiltros() {
    const tipoSeleccionado = document.getElementById('filtroTipo').value;
    const username = document.getElementById('filtroUsername').value;
    const email = document.getElementById('filtroEmail').value;
    
    let usuariosFiltrados = listaUsuarios;
    
    // Filtrar por tipo
    if (tipoSeleccionado) {
        usuariosFiltrados = usuariosFiltrados.filter(u => u.tipo === tipoSeleccionado);
    }

    // Filtrar por usuario
    if (username) {
        usuariosFiltrados = usuariosFiltrados.filter(u => u.username.includes(username));
    }
    
    // Filtrar por precio minimo
    if (email) {
        usuariosFiltrados = usuariosFiltrados.filter(u => u.email.includes(email));
    }

    if (usuariosFiltrados.length === 0) { // Si no hay usuarios
        document.getElementById('usuariosContainer').innerHTML = '';
        document.getElementById('mensajeVacio').innerHTML = '<h5>No hay usuarios que coincidan con los filtros aplicados.</h5>';
        document.getElementById('mensajeVacio').style.display = 'block';
    } else {
        document.getElementById('mensajeVacio').style.display = 'none';
        mostrarUsuarios(usuariosFiltrados);
    }
}

function eliminarUsuario(id_usuario) {
    if (confirm('Se borraran todas las reservas asociadas al usuario, ¿Estás seguro de que deseas eliminar este usuario?')) {
        fetch(`../PHP/eliminarUsuario.php`, {
            method: 'POST',
            headers: {"Content-Type": "application/x-www-form-urlencoded"},
            body: `id_usuario=${encodeURIComponent(id_usuario)}`
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

                cargarUsuarios();
            })
            .catch(error => {
                console.error('Error:', error);
                mostrarError('Error al eliminar el usuario');
            });
    }
}

function editarUsuario(e) {
    e.preventDefault();
    
    const formularioUsuario = document.getElementById('editarUsuarioForm');

    if (!formularioUsuario.reportValidity()) { // Si los datos no son correctos
        return;
    }
    
    const formData = new FormData(formularioUsuario);

    fetch('../PHP/editarUsuario.php', {
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
            bootstrap.Modal.getInstance(document.getElementById('editarUsuarioModal')).hide();

            // Recargar los usuarios
            cargarUsuarios();
        })
        .catch(error => {
            console.error('Error:', error);
            mostrarError('Error al editar el usuario');
        });
}