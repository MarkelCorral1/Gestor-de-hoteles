<?php
// PHP/get_hoteles_publico.php

// 1. Subimos solo UN nivel
require_once '../config/config.php';
require_once '../bootstrap.php';

// 2. Importante: Para las clases, como están en la subcarpeta Clases
require_once 'Clases/Hotel.php'; 
require_once 'Clases/HotelRepository.php';

header('Content-Type: application/json');

try {
    $repository = $entityManager->getRepository(Hotel::class);
    $hoteles = $repository->findAll();

    $data = [];
    foreach ($hoteles as $hotel) {
        $data[] = [
            'id_hotel'    => $hotel->getId_hotel(),
            'pais'        => $hotel->getPais(),
            'ciudad'      => $hotel->getCiudad(),
            'descripcion' => $hotel->getDescripcion()
        ];
    }

    echo json_encode([
        'estado' => 'success',
        'hoteles' => $data
    ]);

} catch (Exception $e) {
    echo json_encode(['estado' => 'error', 'mensaje' => $e->getMessage()]);
}