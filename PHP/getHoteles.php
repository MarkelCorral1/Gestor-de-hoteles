<?php
require_once '../config/config.php';
require_once '../bootstrap.php';
require_once '../PHP/Clases/Usuario.php';
require_once '../PHP/Clases/UsuarioRepository.php';
require_once '../PHP/Clases/Hotel.php';
require_once '../PHP/Clases/HotelRepository.php';

header('Content-Type: application/json');

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['estado' => 'error', 'mensaje' => 'Método HTTP no permitido']);
    exit();
}

try {
    // Verificar que el usuario es admin
    $usuario = $entityManager->getRepository(Usuario::class)->findOneBy([
        'username' => $_COOKIE['usuario'],
        'tipo' => 'admin'
    ]);
    
    if (!$usuario) {
        http_response_code(403);
        echo json_encode(['estado' => 'error', 'mensaje' => 'Acceso denegado']);
        exit();
    }

    // Obtener todos los hoteles
    $hoteles = $entityManager->getRepository(Hotel::class)->findAll();

    $data = [];
    foreach ($hoteles as $hotel) {
        array_push($data, [
            'id_hotel' => $hotel->getId_hotel(),
            'pais' => $hotel->getPais(),
            'ciudad' => $hotel->getCiudad(),
            'descripcion' => $hotel->getDescripcion()
        ]);
    }

    echo json_encode([
        'estado' => 'success',
        'hoteles' => $data
    ]);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['estado' => 'error', 'mensaje' => 'Error al obtener los hoteles: ' . $e->getMessage()]);
}
?>
