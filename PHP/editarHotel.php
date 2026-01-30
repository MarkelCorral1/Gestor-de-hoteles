<?php
require_once '../config/config.php';

require_once "../bootstrap.php";
require_once '../PHP/Clases/Hotel.php';
require_once '../PHP/Clases/HotelRepository.php';

header('Content-Type: application/json');

try {
    $id = $_POST['id_hotel'] ?? '';
    $pais = $_POST['pais'] ?? '';
    $ciudad = $_POST['ciudad'] ?? '';
    $descripcion = $_POST['descripcion'] ?? '';

    if (!$id || !$pais || !$ciudad || !$descripcion) {
        echo json_encode(['estado' => 'error', 'mensaje' => 'Faltan datos requeridos']);
        exit();
    }

    // No cambiar a un hotel ya existente si no es el mismo
    $existe = $entityManager->getRepository('Hotel')->findBy(['pais' => $pais, 'ciudad' => $ciudad]);
    if ($existe && $existe[0]->getId_hotel() != $id) {
        echo json_encode(['estado' => 'error', 'mensaje' => 'Ya existe un hotel con ese país y ciudad']);
        exit();
    }

    $hotel = $entityManager->find('Hotel', $id);

    if (!$hotel) {
        echo json_encode(['estado' => 'error', 'mensaje' => 'Hotel no encontrado']);
        exit();
    }

    $hotel->setPais($pais);
    $hotel->setCiudad($ciudad);
    $hotel->setDescripcion($descripcion);

    $entityManager->flush();

    echo json_encode(['estado' => 'success', 'mensaje' => 'Hotel actualizado correctamente']);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['estado' => 'error', 'mensaje' => 'Error al actualizar el hotel: ' . $e->getMessage()]);
}
?>