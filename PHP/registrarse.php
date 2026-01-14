<?php
require_once '../bootstrap.php';
require_once '../PHP/Clases/Usuario.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $yaExiste = $entityManager->createQuery('SELECT u FROM usuario u WHERE u.username = :username')
        ->setParameter('username', $username)
        ->getResult();

    // Comprobar si el usuario ya existe
    if ($yaExiste) {
        echo json_encode(['estado' => 'error', 'mensaje' => 'Ya exieste un usuario con ese nombre.']);
        exit();
    }

    $usuario = new Usuario();
    $usuario->setUsername($username);
    $usuario->setPassword_hash($password);
    $usuario->setTipo('normal');
    $entityManager->persist($usuario);
    $entityManager->flush();

    echo json_encode(['estado' => 'correcto', 'redireccion' => '../webpages/inicioSesion.php']);
    exit();
}