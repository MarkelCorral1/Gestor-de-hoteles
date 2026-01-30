<?php
require_once '../config/config.php';

require_once "../bootstrap.php";
require_once '../PHP/Clases/Usuario.php';
require_once '../PHP/Clases/UsuarioRepository.php';
require_once '../PHP/Clases/Hotel.php';
require_once '../PHP/Clases/HotelRepository.php';

header('Content-Type: application/json');

try {
    // Verificar que el usuario es admin
    $usuario = $entityManager->getRepository(Usuario::class)->findOneBy([
        'username' => $_COOKIE['usuario'],
        'tipo' => 'admin'
    ]);
    
    if (!$usuario) {
        echo json_encode(['estado' => 'error', 'mensaje' => 'Acceso denegado']);
        exit();
    }

    $id = $_POST['id_hotel'] ?? '';

    if (!$id) {
        echo json_encode(['estado' => 'error', 'mensaje' => 'ID de hotel no proporcionado']);
        exit();
    }

    $hotel = $entityManager->find('Hotel', $id);

    if (!$hotel) {
        echo json_encode(['estado' => 'error', 'mensaje' => 'Hotel no encontrado']);
        exit();
    }

    $entityManager->remove($hotel);
    $entityManager->flush();

    echo json_encode(['estado' => 'success', 'mensaje' => 'Hotel eliminado correctamente']);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['estado' => 'error', 'mensaje' => 'Error al eliminar el hotel: ' . $e->getMessage()]);
}
?>