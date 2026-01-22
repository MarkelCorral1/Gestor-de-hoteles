<?php
require_once '../config/config.php';

require_once "../bootstrap.php";
require_once '../PHP/Clases/Hotel.php';
require_once '../PHP/Clases/HotelRepository.php';


$id = $_POST['id_hotel'] ?? '';
$pais = $_POST['pais'] ?? '';
$ciudad = $_POST['ciudad'] ?? '';
$descripcion = $_POST['descripcion'] ?? '';

// No cambiar a un hotel ya existente si no es el mismo usuario
$existe = $entityManager->getRepository('Hotel')->findBy(['pais' => $pais, 'ciudad' => $ciudad]);
if ($existe && $existe[0]->getId_hotel() != $id) {
    header('Location: ' . PAGINAS_URL . '/gestionHoteles.php');
    exit();
}

$hotel = $entityManager->find('Hotel', $id);
$hotel->setPais($pais);
$hotel->setCiudad($ciudad);
$hotel->setDescripcion($descripcion);

$entityManager->flush();

header('Location: ' . PAGINAS_URL . '/gestionHoteles.php');
exit();