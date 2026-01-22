<?php
require_once '../config/config.php';

require_once "../bootstrap.php";
require_once '../PHP/Clases/Hotel.php';
require_once '../PHP/Clases/HotelRepository.php';


$id = $_POST['id_hotel'] ?? '';

$hotel = $entityManager->find('Hotel', $id);

$entityManager->remove($hotel);
$entityManager->flush();

header('Location: ' . PAGINAS_URL . '/gestionHoteles.php');
exit();