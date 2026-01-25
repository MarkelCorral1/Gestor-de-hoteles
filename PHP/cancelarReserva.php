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

    $id_reserva = $_GET['id_reserva'] ?? '';
    $reserva = $entityManager->getRepository(Reserva::class)
        ->findOneBy(['id_reserva' => $id_reserva, 'id_usuario' => $usuario->getId_usuario()]);
    
    if (!$reserva) {
        http_response_code(404);
        echo json_encode(['estado' => 'error', 'mensaje' => 'Reserva del usuario no encontrada']);
        exit();
    }

    $entityManager->remove($reserva);
    $entityManager->flush();

    echo json_encode([
        'estado' => 'success',
        'mensaje' => 'Reserva eliminada con exito'
    ]);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['estado' => 'error', 'mensaje' => 'Error al eliminar la reserva: ' . $e->getMessage()]);
}
?>
