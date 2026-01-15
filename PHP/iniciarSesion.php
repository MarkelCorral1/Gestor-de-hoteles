<?php
require_once '../bootstrap.php';
require_once '../PHP/Clases/Usuario.php';

    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $usuario = $entityManager->createQuery('SELECT u FROM usuario u WHERE u.username = :username')
        ->setParameter('username', $username)
        ->getResult();
    
    
    if (!$usuario) {
        echo json_encode(['estado' => 'error', 'mensaje' => 'Usuario no encontrado']);
        exit();
    }
    if (password_verify($password, $usuario[0]->getPassword_hash())) {
        setcookie("usuario", $usuario[0]->getUsername(), time() + 86400 * 30, "/");

        echo json_encode(['estado' => 'correcto', 'redireccion' => '../webpages/index.php']);
        exit();
    } else {
        echo json_encode(['estado' => 'error', 'mensaje' => 'Contraseña incorrecta']);
        exit();
    }