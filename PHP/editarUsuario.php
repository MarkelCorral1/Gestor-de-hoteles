<?php
require_once '../config/config.php';

require_once "../bootstrap.php";
require_once '../PHP/Clases/Usuario.php';
require_once '../PHP/Clases/UsuarioRepository.php';

header('Content-Type: application/json');

try {
    // Verificar que el usuario es admin
    $usuario_admin = $entityManager->getRepository(Usuario::class)->findOneBy([
        'username' => $_COOKIE['usuario'],
        'tipo' => 'admin'
    ]);
    
    if (!$usuario_admin) {
        echo json_encode(['estado' => 'error', 'mensaje' => 'Acceso denegado']);
        exit();
    }

    $id = $_POST['id_usuario'] ?? '';
    $username = $_POST['username'] ?? '';
    $tipo = $_POST['tipo'] ?? '';

    if (!$id || !$username || !$tipo) {
        echo json_encode(['estado' => 'error', 'mensaje' => 'Faltan datos requeridos']);
        exit();
    }

    // No cambiar a un username ya existente si no es el mismo usuario
    $existe = $entityManager->getRepository('Usuario')->findBy(['username' => $username]);
    if ($existe && $existe[0]->getId_usuario() != $id) {
        echo json_encode(['estado' => 'error', 'mensaje' => 'El nombre de usuario ya existe']);
        exit();
    }

    $usuario = $entityManager->find('Usuario', $id);

    if (!$usuario) {
        echo json_encode(['estado' => 'error', 'mensaje' => 'Usuario no encontrado']);
        exit();
    }

    $usuario->setUsername($username);
    $usuario->setTipo($tipo);

    $entityManager->flush();

    echo json_encode(['estado' => 'success', 'mensaje' => 'Usuario actualizado correctamente']);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['estado' => 'error', 'mensaje' => 'Error al actualizar el usuario: ' . $e->getMessage()]);
}
?>