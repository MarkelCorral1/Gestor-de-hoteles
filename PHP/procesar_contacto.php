<?php
// 1. Cargar la configuración para que existan las constantes como PAGINAS_URL
require_once dirname(__DIR__) . '/config/config.php'; 

// 2. Cargar el bootstrap de Doctrine
require_once dirname(__DIR__) . '/bootstrap.php'; 

// 3. Cargar la clase desde su ubicación real (según tu imagen)
require_once __DIR__ . '/Clases/Contacto.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $contacto = new Contacto();
        $contacto->setNombre($_POST['nombre']);
        $contacto->setEmail($_POST['email']);
        $contacto->setTelefono($_POST['phone'] ?? null);
        $contacto->setMensaje($_POST['cuentanos']);

        $entityManager->persist($contacto);
        $entityManager->flush();

        // Ahora PAGINAS_URL ya estará definida
        header("Location: " . PAGINAS_URL . "/contacto.php?status=success");
        exit;
    } catch (Exception $e) {
        die("Error: " . $e->getMessage());
    }
}