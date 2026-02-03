<?php
error_reporting(0); // Suppress warnings/errors in production
ini_set('display_errors', 0);

require_once "../bootstrap.php";

require_once 'Clases/Categoria.php';
require_once 'Clases/CategoriaRepository.php';

header('Content-Type: application/json');

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['estado' => 'error', 'mensaje' => 'Método HTTP no permitido']);
    exit();
}

try {
    $nombreCategoria = $_GET['categoria'] ?? 'stroll';

    // Buscamos los datos de la categoría por su nombre
    $categoriaRepo = $entityManager->getRepository('Categoria');
    $categoria = $categoriaRepo->findOneBy(['nombre' => $nombreCategoria]);

    if ($categoria) {
        $data = [
            'status' => 'success',
            'id' => $categoria->getId_categoria(),
            'nombre' => $categoria->getNombre(),
            'metros' => $categoria->getMetros_cuadrados(),
            'camas' => $categoria->getCamas(),
            'precio' => $categoria->getPrecio_base(),
            'servicios' => [
                'balcon' => $categoria->getBalcon(),
                'yakushi' => $categoria->getYakushi(),
                'spa' => $categoria->getSpa(),
                'mayordomo' => $categoria->getMayordomo(),
                'limusina' => $categoria->getLimusina(),
                'helicoptero' => $categoria->getHelicoptero(),
            ],
        ];

        echo json_encode($data);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Categoría no encontrada']);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => 'Error del servidor.']);
}