let formModal = document.getElementById("reserva-reserva-index")

let inputIdHotel = document.getElementById('reserva-id-hotel')
let inputIdCategoria = document.getElementById('reserva-id-categoria')
let inputFechaInicio = document.getElementById('reserva-fecha-inicio')
let inputFechaFinal = document.getElementById('reserva-fecha-final')
let inputPersonas = document.getElementById('reserva-personas')



let datosReserva = {}
if (sessionStorage.getItem("datos-reserva")) {
    datosReserva = JSON.parse(sessionStorage.getItem("datos-reserva"))
    console.log("datosReserva:", datosReserva);

    inputFechaInicio.value = datosReserva.fechaEntrada
    inputFechaFinal.value = datosReserva.fechaSalida
    inputPersonas.value = datosReserva.personas
} else {
    datosReserva = {
        destino: '',
        fechaEntrada: '',
        fechaSalida: '',
        categoria: 'stroll',
        personas: 1
    }
}

// Establecer la fecha mínima como la fecha actual
inputFechaInicio.setAttribute("min", new Date().toISOString().slice(0, 10))
inputFechaFinal.setAttribute("min", new Date().toISOString().slice(0, 10))


// Actualizar las fechas al cambiar la otra fecha
inputFechaInicio.addEventListener('change', () => fechaSalidaMinima())
inputFechaFinal.addEventListener('change', () => fechaEntradaMaxima())

fechaSalidaMinima()
fechaEntradaMaxima()

function fechaSalidaMinima() {
    let fechaEntrada = new Date(inputFechaInicio.value)
    fechaEntrada.setDate(fechaEntrada.getDate() + 1)
    
    inputFechaFinal.setAttribute("min", fechaEntrada.toISOString().slice(0, 10))
}
function fechaEntradaMaxima() {
    let fechaSalida = new Date(inputFechaFinal.value)
    fechaSalida.setDate(fechaSalida.getDate() - 1)
    
    inputFechaInicio.setAttribute("max", fechaSalida.toISOString().slice(0, 10))
}

document.getElementById('form-reserva').addEventListener('submit', (e) => {
    e.preventDefault()
    fetchDisponibilidad()
})

function fetchDisponibilidad() {
    let id_hotel = encodeURIComponent(inputIdHotel.value)
    let id_categoria = encodeURIComponent(inputIdCategoria.value)
    let fecha_inicio = encodeURIComponent(inputFechaInicio.value)
    let fecha_final = encodeURIComponent(inputFechaFinal.value)
    let numero_personas = encodeURIComponent(inputPersonas.value)

    fetch(`../PHP/comprobarDisponibilidad.php?id_hotel=${id_hotel}&id_categoria=${id_categoria}&fecha_inicio=${fecha_inicio}&fecha_final=${fecha_final}&numero_personas=${numero_personas}`)
        .then(res => res.json())
        .then(data => {
            console.log(data);

            let respuestaForm = document.getElementById('respuesta-reserva');

            if (data.estado === 'error') {
                respuestaForm.innerHTML = data.mensaje;
                respuestaForm.classList.add('bg-danger', 'border-danger', 'mt-3', 'p-2', 'border', 'rounded');
                
                setTimeout(() => {
                    respuestaForm.innerHTML = '';
                    respuestaForm.classList.remove('bg-danger', 'border-danger', 'mt-3', 'p-2', 'border', 'rounded');
                }, 5000);
            } else {
                document.getElementById('reserva-paso-1').style.display = 'none';
                document.getElementById('reserva-paso-2').style.display = 'block';

                document.getElementById('resumen-fecha-inicio').innerText = data.reserva.fecha_inicio;
                document.getElementById('resumen-fecha-fin').innerText = data.reserva.fecha_final;
                document.getElementById('resumen-personas').innerText = data.reserva.numero_personas;
                document.getElementById('resumen-precio-total').innerText = data.reserva.precio_total;
            }
        })
}

// Volver al paso 1
function volverAPaso1() {
    document.getElementById('reserva-paso-1').style.display = 'block';
    document.getElementById('reserva-paso-2').style.display = 'none';
}