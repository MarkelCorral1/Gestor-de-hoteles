<?php
require_once '../config/config.php';

require_once "../bootstrap.php";
require_once '../PHP/Clases/Habitacion.php';
require_once '../PHP/Clases/HabitacionRepository.php';
require_once '../PHP/Clases/Usuario.php';
require_once '../PHP/Clases/UsuarioRepository.php';
require_once '../PHP/Clases/Hotel.php';
require_once '../PHP/Clases/HotelRepository.php';
require_once '../PHP/Clases/Categoria.php';
require_once '../PHP/Clases/CategoriaRepository.php';
require_once '../PHP/Clases/Reserva.php';
require_once '../PHP/Clases/ReservaRepository.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id_hotel = $_GET['id_hotel'] ?? '';
    $id_categoria = $_GET['id_categoria'] ?? '';
    $fecha_inicio = $_GET['fecha_inicio'] ?? '';
    $fecha_final = $_GET['fecha_final'] ?? '';
    $numero_personas = $_GET['numero_personas'] ?? '1';

    // Pasar fechas a formato DateTime
    $fecha_inicio = new DateTime($fecha_inicio);
    $fecha_final = new DateTime($fecha_final);
    // Comprobar que la fecha de inicio es anterior a la fecha final
    if ($fecha_inicio >= $fecha_final) {
        echo json_encode(['estado' => 'error', 'mensaje' => 'La fecha de salida debe ser posterior a la fecha de entrada.']);
        exit();
    }

    // Comprobar si la habitacion ya esta reservada en esas fechas
    $habitacionDisponible = $entityManager->getRepository(Reserva::class)
        ->obtenerHabitacionDisponible($fecha_inicio->format('Y-m-d'), $fecha_final->format('Y-m-d'), $id_hotel, $id_categoria);

    if (!$habitacionDisponible) {
        echo json_encode(['estado' => 'error', 'mensaje' => 'Reserva no disponible en las fechas seleccionadas.']);
        exit();
    }

    // Comprobar que hay suficientes camas en la habitacion
    if ($numero_personas > $habitacionDisponible->getId_categoria()->getCamas()) {
        echo json_encode(['estado' => 'error', 'mensaje' => 'Número de personas mayor a capacidad de la habitación.']);
        exit();
    }

    $precio_total = $habitacionDisponible->getId_categoria()->getPrecio_base()
        * $fecha_inicio->diff($fecha_final)->days;

    setcookie("id_habitacion", $habitacionDisponible->getId_habitacion(), time() + 86400 * 30, "/");
    setcookie("fecha_inicio", $fecha_inicio->format('Y-m-d'), time() + 86400 * 30, "/");
    setcookie("fecha_final", $fecha_final->format('Y-m-d'), time() + 86400 * 30, "/");
    setcookie("numero_personas", $numero_personas, time() + 86400 * 30, "/");

    echo json_encode(['estado' => 'success',
                            'mensaje' => 'Reserva disponible.',
                            'reserva' => [
                                'fecha_inicio' => $fecha_inicio->format('Y-m-d'),
                                'fecha_final' => $fecha_final->format('Y-m-d'),
                                'numero_personas' => $numero_personas,
                                'precio_total' => $precio_total
                                ]
                            ]);
    exit();
}