<?php
require_once '../config/config.php';

require_once '../bootstrap.php';
require_once '../PHP/Clases/Usuario.php';
require_once '../PHP/Clases/UsuarioRepository.php';
require_once '../PHP/Clases/Reserva.php';
require_once '../PHP/Clases/ReservaRepository.php';
require_once '../PHP/Clases/Habitacion.php';
require_once '../PHP/Clases/HabitacionRepository.php';
require_once '../PHP/Clases/Hotel.php';
require_once '../PHP/Clases/HotelRepository.php';
require_once '../PHP/Clases/Categoria.php';
require_once '../PHP/Clases/CategoriaRepository.php';

header('Content-Type: application/json');

try {
    // Obtener el usuario
    $usuario = $entityManager->getRepository(Usuario::class)->findOneBy(['username' => $_COOKIE['usuario']]);
    
    if (!$usuario) {
        http_response_code(404);
        echo json_encode(['estado' => 'error', 'mensaje' => 'Usuario no encontrado']);
        exit();
    }

    // Obtener todas las reservas del usuario
    $reservas = $entityManager->getRepository(Reserva::class)->findBy(['id_usuario' => $usuario->getId_usuario()]);

    $data = [];
    foreach ($reservas as $reserva) {
        $habitacion = $reserva->getId_habitacion();
        $hotel = $habitacion->getId_hotel();
        $categoria = $habitacion->getId_categoria();

        array_push($data, [
            'id_reserva' => $reserva->getId_reserva(),
            'hotel_ciudad' => $hotel->getCiudad(),
            'categoria_nombre' => $categoria->getNombre(),
            'id_habitacion' => $habitacion->getId_habitacion(),
            'fecha_inicio' => $reserva->getFecha_inicio()->format('Y-m-d'),
            'fecha_final' => $reserva->getFecha_final()->format('Y-m-d'),
            'numero_personas' => $reserva->getNumero_personas(),
            'precio_total' => $reserva->getPrecio_total(),
            'dias' => $reserva->getFecha_final()->diff($reserva->getFecha_inicio())->days
        ]);
    }

    echo json_encode([
        'estado' => 'success',
        'reservas' => $data
    ]);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['estado' => 'error', 'mensaje' => 'Error al obtener las reservas: ' . $e->getMessage()]);
}
?>
