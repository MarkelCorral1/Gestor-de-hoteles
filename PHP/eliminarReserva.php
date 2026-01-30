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

header('Content-Type: application/json');

try {
    $id = $_POST['id_reserva'] ?? '';

    if (!$id) {
        echo json_encode(['estado' => 'error', 'mensaje' => 'ID de reserva no proporcionado']);
        exit();
    }

    $reserva = $entityManager->find('Reserva', $id);

    if (!$reserva) {
        echo json_encode(['estado' => 'error', 'mensaje' => 'Reserva no encontrada']);
        exit();
    }

    $entityManager->remove($reserva);
    $entityManager->flush();

    echo json_encode(['estado' => 'success', 'mensaje' => 'Reserva eliminada correctamente']);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['estado' => 'error', 'mensaje' => 'Error al eliminar la reserva: ' . $e->getMessage()]);
}
?>