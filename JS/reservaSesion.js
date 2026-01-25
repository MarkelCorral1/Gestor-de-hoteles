if (!sessionStorage.getItem("datos-reserva")) {
    // hoy + 7 dias
    let fechaEntrada = new Date()
    fechaEntrada.setDate(fechaEntrada.getDate() + 7)
    let fechaSalida = new Date(fechaEntrada)
    fechaSalida.setDate(fechaSalida.getDate() + 7)

    datosReserva = {
        destino: '1',
        fechaEntrada: fechaEntrada.toISOString().slice(0, 10),
        fechaSalida: fechaSalida.toISOString().slice(0, 10),
        personas: 1
    }

    sessionStorage.setItem("datos-reserva", JSON.stringify(datosReserva))
}