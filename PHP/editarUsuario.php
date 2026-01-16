<?php
require_once '../config/config.php';

require_once "../bootstrap.php";
require_once '../PHP/Clases/Usuario.php';
require_once '../PHP/Clases/UsuarioRepository.php';


$id = $_POST['id_usuario'] ?? '';
$username = $_POST['username'] ?? '';
$tipo = $_POST['tipo'] ?? '';

// No cambiar a un username ya existente si no es el mismo usuario
$existe = $entityManager->getRepository('Usuario')->findBy(['username' => $username]);
if ($existe && $existe[0]->getId_Usuario() != $id) {
    header('Location: ' . PAGINAS_URL . '/gestionUsuarios.php');
    exit();
}

$usuario = $entityManager->find('Usuario', $id);
$usuario->setUsername($username);
$usuario->setTipo($tipo);

$entityManager->flush();

header('Location: ' . PAGINAS_URL . '/gestionUsuarios.php');
exit();