let respuestaForm = document.getElementById('respuesta-form');

let inputUsername = document.getElementById('username');
let inputPassword1 = document.getElementById('password-1');
let inputPassword2 = document.getElementById('password-2');

document.getElementById('sessionStart').addEventListener('submit', (e) => {
    e.preventDefault();
    
    let username = encodeURIComponent(inputUsername.value);
    let password1 = encodeURIComponent(inputPassword1.value);
    let password2 = encodeURIComponent(inputPassword2.value);

    if (password1 !== password2) {
        respuestaForm.innerHTML = 'Las contraseñas no coinciden.';
        respuestaForm.classList.add('text-danger', 'bg-danger', 'border-danger', 'mt-3', 'p-2', 'border');
        
        setTimeout(() => {
            respuestaForm.innerHTML = '';
            respuestaForm.classList.remove('text-danger', 'bg-danger', 'border-danger', 'mt-3', 'p-2', 'border');
        }, 3000);

        return;
    }

    fetch('../PHP/registrarse.php', {
            method: 'POST',
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: `username=${username}&password=${password1}`
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