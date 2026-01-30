<?php
require_once '../config/config.php';

require_once "../bootstrap.php";
require_once '../PHP/Clases/Usuario.php';
require_once '../PHP/Clases/UsuarioRepository.php';

header('Content-Type: application/json');

try {
    $id = $_POST['id_usuario'] ?? '';

    if (!$id) {
        echo json_encode(['estado' => 'error', 'mensaje' => 'ID de usuario no proporcionado']);
        exit();
    }

    $usuario = $entityManager->find('Usuario', $id);

    if (!$usuario) {
        echo json_encode(['estado' => 'error', 'mensaje' => 'Usuario no encontrado']);
        exit();
    }

    $entityManager->remove($usuario);
    $entityManager->flush();

    echo json_encode(['estado' => 'success', 'mensaje' => 'Usuario eliminado correctamente']);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['estado' => 'error', 'mensaje' => 'Error al eliminar el usuario: ' . $e->getMessage()]);
}
?>