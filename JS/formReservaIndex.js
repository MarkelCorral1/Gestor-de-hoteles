let form = document.querySelector('.search-box > form')

let inputDestino = document.getElementById('form-destino')
let inputFechaEntrada = document.getElementById('form-fecha-entrada')
let inputFechaSalida = document.getElementById('form-fecha-salida')
let inputPersonas = document.getElementById('form-personas')

// Rellenar automaticamente los datos si existen en sessionStorage
if (sessionStorage.getItem("datos-reserva")) {
    let datos = JSON.parse(sessionStorage.getItem("datos-reserva"))

    inputDestino.value = datos.destino
    inputFechaEntrada.value = datos.fechaEntrada
    inputFechaSalida.value = datos.fechaSalida
    inputPersonas.value = datos.personas
}

// Establecer la fecha mínima como la fecha actual
inputFechaEntrada.setAttribute("min", new Date().toISOString().slice(0, 10))
inputFechaSalida.setAttribute("min", new Date().toISOString().slice(0, 10))

//JSON con los datos de la reserva
let datosReserva = {}
if (!sessionStorage.getItem("datos-reserva")) {
    datosReserva = {
        destino: '',
        fechaEntrada: '',
        fechaSalida: '',
        categoria: 'stroll',
        personas: 1
    }

    sessionStorage.setItem("datos-reserva", JSON.stringify(datosReserva))

} else {
    datosReserva = JSON.parse(sessionStorage.getItem("datos-reserva"))
}

// Actualizar los datos de la reserva al enviar el formulario
form.addEventListener('submit', (e) => {
    e.preventDefault()

    datosReserva.destino = inputDestino.value
    datosReserva.fechaEntrada = inputFechaEntrada.value
    datosReserva.fechaSalida = inputFechaSalida.value
    datosReserva.personas = inputPersonas.value

    sessionStorage.setItem("datos-reserva", JSON.stringify(datosReserva))

    window.location.href = `listaHabitaciones.php?id_hotel=${datosReserva.destino}`
})


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
