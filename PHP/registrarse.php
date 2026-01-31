<?php
require_once '../config/config.php';

require_once '../bootstrap.php';
require_once '../PHP/Clases/Usuario.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $email = $_POST['email'] ?? '';

    $yaExiste = $entityManager->createQuery('SELECT u FROM usuario u WHERE u.username = :username OR u.email = :email')
        ->setParameter('username', $username)
        ->setParameter('email', $email)
        ->getResult();

    // Comprobar si el usuario ya existe
    if ($yaExiste) {
        echo json_encode(['estado' => 'error', 'mensaje' => 'Ya existe un usuario con ese nombre o email.']);
        exit();
    }

    $usuario = new Usuario();
    $usuario->setUsername($username);
    $usuario->setPassword_hash($password);
    $usuario->setEmail($email);
    $usuario->setTipo('normal');
    $entityManager->persist($usuario);
    $entityManager->flush();

    echo json_encode(['estado' => 'correcto', 'redireccion' => '../webpages/inicioSesion.php']);
    exit();
}