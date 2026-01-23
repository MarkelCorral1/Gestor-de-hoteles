export function fechaSalidaMinima(inputFechaEntrada, inputFechaSalida) {
    let fechaEntrada = new Date(inputFechaEntrada.value)
    fechaEntrada.setDate(fechaEntrada.getDate() + 1)
    
    inputFechaSalida.setAttribute("min", fechaEntrada.toISOString().slice(0, 10))
}
export function fechaEntradaMaxima( inputFechaEntrada, inputFechaSalida) {
    let fechaSalida = new Date(inputFechaSalida.value)
    fechaSalida.setDate(fechaSalida.getDate() - 1)
    
    inputFechaEntrada.setAttribute("max", fechaSalida.toISOString().slice(0, 10))
}
