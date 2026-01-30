// Variable global para almacenar los usuarios
let listaUsuarios;

document.addEventListener('DOMContentLoaded', () => {
    // Cargar los usuarios cuando se carga la página
    cargarUsuarios();

    // Envio del formulario de edicion
    document.getElementById('editarUsuarioForm').addEventListener('submit', editarUsuario);
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
                <div class="gestion-hotel-card ${tipoClass}">
                    <h5>${usuario.username}</h5>
                    <p class="px-3"><strong>Tipo:</strong> ${usuario.tipo}</p>
                    <div class="d-flex gestion-hoteles-botones gap-2 mt-3">
                        <button
                            class="btn btn-editar w-50"
                            data-bs-toggle="modal"
                            data-bs-target="#editarUsuarioModal"
                            data-id="${usuario.id_usuario}"
                            data-username="${usuario.username}"
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