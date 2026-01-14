<?php
require_once '../bootstrap.php';
require_once '../PHP/Clases/Usuario.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $usuario = $entityManager->createQuery('SELECT u FROM usuario u WHERE u.username = :username')
        ->setParameter('username', $username)
        ->getResult();
    
    
    if (!$usuario) {
        // echo "Usuario no encontrado.";
        header('Location: ../webpages/inicioSesion.php');
        exit();
    }
    if (password_verify($password, $usuario[0]->getPassword_hash())) {
        setcookie("usuario", $usuario[0]->getUsername(), time() + 86400 * 30, "/");
    
        // echo "Contraseña correcta. Cookie: " . $_COOKIE["usuario"];
        header('Location: ../webpages/index.html');
        exit();
    } else {
        // echo "Contraseña incorrecta.";
        header('Location: ../webpages/inicioSesion.php');
        exit();
    }
}