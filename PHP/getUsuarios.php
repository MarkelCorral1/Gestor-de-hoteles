<?php
require_once '../config/config.php';

require_once '../bootstrap.php';
require_once '../PHP/Clases/Usuario.php';
require_once '../PHP/Clases/UsuarioRepository.php';

header('Content-Type: application/json');

try {
    // Verificar que el usuario es admin
    $usuario = $entityManager->getRepository(Usuario::class)->findOneBy(
        ['username' => $_COOKIE['usuario'], 'tipo' => 'admin']);
    
    if (!$usuario) {
        echo json_encode(['estado' => 'error', 'mensaje' => 'Acceso denegado']);
        exit();
    }

    // Obtener todos los usuarios
    $usuarios = $entityManager->getRepository(Usuario::class)->findAll();

    $data = [];
    foreach ($usuarios as $usuario) {
        array_push($data, [
            'id_usuario' => $usuario->getId_usuario(),
            'username' => $usuario->getUsername(),
            'tipo' => $usuario->getTipo()
        ]);
    }

    echo json_encode([
        'estado' => 'success',
        'usuarios' => $data
    ]);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['estado' => 'error', 'mensaje' => 'Error al obtener los usuarios: ' . $e->getMessage()]);
}
?>