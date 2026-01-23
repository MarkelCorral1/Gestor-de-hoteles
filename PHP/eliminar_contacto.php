<?php
// 1. Cargamos configuración y bootstrap para tener el EntityManager
require_once dirname(__DIR__) . '/config/config.php';
require_once dirname(__DIR__) . '/bootstrap.php';

// 2. Cargamos la entidad (ubicación real según tu estructura)
require_once __DIR__ . '/Clases/Contacto.php';

if (isset($_GET['id'])) {
    try {
        $id = $_GET['id'];
        
        // Buscamos el objeto en la BD
        $contacto = $entityManager->find('Contacto', $id);

        if ($contacto) {
            $entityManager->remove($contacto);
            $entityManager->flush();
            
            // Redirección de éxito
            header("Location: " . PAGINAS_URL . "/admin_contacto.php?deleted=1");
            exit;
        }
    } catch (Exception $e) {
        die("Error de Doctrine: " . $e->getMessage());
    }
}

// Si no hay ID o falla, volvemos al panel
header("Location: " . PAGINAS_URL . "/admin_contacto.php");
exit;