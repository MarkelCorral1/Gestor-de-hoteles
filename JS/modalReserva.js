let formModal = document.getElementById("reserva-reserva-index")

let inputIdHotel = document.getElementById('reserva-id-hotel')
let inputIdCategoria = document.getElementById('reserva-id-categoria')
let inputFechaEntrada = document.getElementById('reserva-fecha-entrada')
let inputFechaSalida = document.getElementById('reserva-fecha-salida')
let inputPersonas = document.getElementById('reserva-personas')



let datosReserva = {}
if (sessionStorage.getItem("datos-reserva")) {
    datosReserva = JSON.parse(sessionStorage.getItem("datos-reserva"))
    console.log("datosReserva:", datosReserva);

    inputFechaEntrada.value = datosReserva.fechaEntrada
    inputFechaSalida.value = datosReserva.fechaSalida
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
inputFechaEntrada.setAttribute("min", new Date().toISOString().slice(0, 10))
inputFechaSalida.setAttribute("min", new Date().toISOString().slice(0, 10))


// Actualizar las fechas al cambiar la otra fecha
inputFechaEntrada.addEventListener('change', () => fechaSalidaMinima())
inputFechaSalida.addEventListener('change', () => fechaEntradaMaxima())

fechaSalidaMinima()
fechaEntradaMaxima()

function fechaSalidaMinima() {
    let fechaEntrada = new Date(inputFechaEntrada.value)
    fechaEntrada.setDate(fechaEntrada.getDate() + 1)
    
    inputFechaSalida.setAttribute("min", fechaEntrada.toISOString().slice(0, 10))
}
function fechaEntradaMaxima() {
    let fechaSalida = new Date(inputFechaSalida.value)
    fechaSalida.setDate(fechaSalida.getDate() - 1)
    
    inputFechaEntrada.setAttribute("max", fechaSalida.toISOString().slice(0, 10))
}

document.getElementById('form-reserva').addEventListener('submit', (e) => {
    e.preventDefault()
    fetchDisponibilidad()
})

function fetchDisponibilidad() {
    let id_hotel = encodeURIComponent(inputIdHotel.value)
    let id_categoria = encodeURIComponent(inputIdCategoria.value)
    let fecha_entrada = encodeURIComponent(inputFechaEntrada.value)
    let fecha_salida = encodeURIComponent(inputFechaSalida.value)
    let numero_personas = encodeURIComponent(inputPersonas.value)

    fetch(`../PHP/comprobarDisponibilidad.php?id_hotel=${id_hotel}&id_categoria=${id_categoria}&fecha_entrada=${fecha_entrada}&fecha_salida=${fecha_salida}&numero_personas=${numero_personas}`)
        .then(res => res.json())
        .then(data => {
            console.log(data);
        })
}