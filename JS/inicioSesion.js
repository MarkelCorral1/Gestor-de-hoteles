let respuestaForm = document.getElementById('respuesta-form');

let inputUsername = document.getElementById('username');
let inputPassword = document.getElementById('password');

document.getElementById('sessionStart').addEventListener('submit', (e) => {
    e.preventDefault();
    
    let username = encodeURIComponent(inputUsername.value);
    let password = encodeURIComponent(inputPassword.value);

    fetch('../PHP/iniciarSesion.php', {
            method: 'POST',
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: `username=${username}&password=${password}`
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            
            if (data.estado === 'error') {
                respuestaForm.innerHTML = data.mensaje;
                respuestaForm.classList.add('text-danger', 'bg-danger', 'border-danger', 'mt-3', 'p-2', 'border');
                
                setTimeout(() => {
                    respuestaForm.innerHTML = '';
                    respuestaForm.classList.remove('text-danger', 'bg-danger', 'border-danger', 'mt-3', 'p-2', 'border');
                }, 3000);
            } else if (data.estado === 'correcto') {
                window.location.href = data.redireccion;
            }
        })
});