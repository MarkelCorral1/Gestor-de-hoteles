<?php 
// 1. Cargamos la configuración y el bootstrap desde la raíz
require_once dirname(__DIR__) . '/config/config.php';
require_once dirname(__DIR__) . '/bootstrap.php';

// 2. Cargamos la clase Contacto desde su ubicación real: PHP/Clases/
require_once dirname(__DIR__) . '/PHP/Clases/Contacto.php';

// 3. Obtenemos los mensajes usando el EntityManager de Doctrine
$mensajes = $entityManager->getRepository('Contacto')->findBy([], ['fecha_envio' => 'DESC']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control | Mensajes Schumacher</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= CSS_URL ?>">
    <style>
        .table-container { background: white; border-radius: 15px; padding: 20px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .header-admin { background: #212529; color: white; padding: 20px 0; margin-bottom: 30px; }
        .btn-delete { color: #dc3545; transition: 0.3s; }
        .btn-delete:hover { color: #a71d2a; }
    </style>
</head>
<body class="min-vh-100">

    <div class="header-admin text-center">
        <h1>Gestión de Contactos</h1>
        <p>Buzón de entrada - Hotel Schumacher</p>
    </div>

    <div class="container">
        
        <?php if (isset($_GET['deleted'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Éxito:</strong> El mensaje ha sido eliminado definitivamente.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="table-container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="m-0">Mensajes Recibidos</h3>
                <a href="contacto.php" class="btn btn-outline-dark btn-sm">Volver a la web</a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Mensaje</th>
                            <th>Fecha</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($mensajes)): ?>
                            <tr>
                                <td colspan="6" class="text-center py-4">No hay mensajes en la base de datos.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($mensajes as $m): ?>
                            <tr>
                                <td><strong><?= htmlspecialchars($m->getNombre()) ?></strong></td>
                                <td><a href="mailto:<?= htmlspecialchars($m->getEmail()) ?>" class="text-decoration-none text-dark"><?= htmlspecialchars($m->getEmail()) ?></a></td>
                                <td><?= htmlspecialchars($m->getTelefono() ?? 'N/A') ?></td>
                                <td><small><?= nl2br(htmlspecialchars($m->getMensaje())) ?></small></td>
                                <td><small class="text-muted"><?= $m->getFechaEnvio()->format('d/m/Y H:i') ?></small></td>
                                <td class="text-center">
                                    <a href="../PHP/eliminar_contacto.php?id=<?= $m->getIdContacto() ?>" 
                                        class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('¿Estás seguro de que deseas borrar este mensaje?');">
                                        Borrar
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>