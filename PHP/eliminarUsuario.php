<?php
require_once '../config/config.php';

require_once "../bootstrap.php";
require_once '../PHP/Clases/Usuario.php';
require_once '../PHP/Clases/UsuarioRepository.php';


$id = $_POST['id_usuario'] ?? '';

$usuario = $entityManager->find('Usuario', $id);

$entityManager->remove($usuario);
$entityManager->flush();

header('Location: ' . PAGINAS_URL . '/gestionUsuarios.php');
exit();